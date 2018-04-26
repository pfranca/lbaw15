DROP INDEX IF EXISTS textsearch_idx CASCADE;
DROP INDEX IF EXISTS idx_idtopicquestion CASCADE;
DROP INDEX IF EXISTS idx_iddisabledquestion CASCADE;
DROP INDEX IF EXISTS idx_authoridquestion CASCADE;
DROP INDEX IF EXISTS usersearch_idx CASCADE;
DROP TYPE IF EXISTS notification_message CASCADE;
DROP TYPE IF EXISTS user_type CASCADE;
DROP TABLE IF EXISTS badge CASCADE;
DROP TABLE IF EXISTS userBadge CASCADE;
DROP TABLE IF EXISTS topicTag CASCADE;
DROP TABLE IF EXISTS questionTag CASCADE;
DROP TABLE IF EXISTS tag CASCADE;
DROP TABLE IF EXISTS notification CASCADE;
DROP TABLE IF EXISTS vote CASCADE;
DROP TABLE IF EXISTS followQuestion CASCADE;
DROP TABLE IF EXISTS followTopic CASCADE;
DROP TABLE IF EXISTS report CASCADE;
DROP TABLE IF EXISTS answer CASCADE;
DROP TABLE IF EXISTS question CASCADE;
DROP TABLE IF EXISTS topic CASCADE;
DROP TABLE IF EXISTS "user" CASCADE;


CREATE TYPE user_type AS ENUM ('NORMAL', 'MOD', 'ADMIN');
CREATE TYPE notification_message AS ENUM ('A question you are following has new activity', 'Your question has a new answer');

CREATE TABLE "user"(
  id SERIAL UNIQUE,
  username VARCHAR(30) NOT NULL UNIQUE,
  email TEXT NOT NULL UNIQUE,
  name TEXT NOT NULL,
  img TEXT NOT NULL,
  bio TEXT,
  disabled BOOLEAN DEFAULT FALSE NOT NULL,
  type user_type DEFAULT 'NORMAL' NOT NULL,
  id_google TEXT,
  remember_token TEXT,
  PRIMARY KEY(id)
);

CREATE TABLE topic(
  id SERIAL UNIQUE,
  name VARCHAR(30) NOT NULL UNIQUE,
  img TEXT NOT NULL,
  disabled BOOLEAN DEFAULT FALSE NOT NULL,
  PRIMARY KEY(id)
);

CREATE TABLE question(
  id SERIAL UNIQUE,
  "date" TIMESTAMP WITH TIME ZONE DEFAULT now() NOT NULL,
  karma INTEGER DEFAULT 0 NOT NULL,
  short_message TEXT NOT NULL,
  long_message TEXT ,
  id_author INTEGER NOT NULL REFERENCES "user"(id) ON UPDATE CASCADE,
  id_topic INTEGER NOT NULL REFERENCES topic(id) ON UPDATE CASCADE,
  disabled BOOLEAN DEFAULT FALSE NOT NULL,
  PRIMARY KEY(id)
);

CREATE TABLE answer(
  id SERIAL UNIQUE,
  "date" TIMESTAMP WITH TIME ZONE DEFAULT now() NOT NULL,
  karma INTEGER DEFAULT 0 NOT NULL,
  message TEXT NOT NULL,
  id_author INTEGER NOT NULL REFERENCES "user"(id) ON UPDATE CASCADE,
  id_question INTEGER NOT NULL REFERENCES question(id) ON UPDATE CASCADE,
  disabled BOOLEAN DEFAULT FALSE NOT NULL,
  PRIMARY KEY(id)
);

CREATE TABLE report(
  id SERIAL UNIQUE,
  reason TEXT NOT NULL,
  id_reporting_user INTEGER NOT NULL REFERENCES "user"(id) ON UPDATE CASCADE,
  id_reported_question INTEGER REFERENCES question(id) ON UPDATE CASCADE,
  id_reported_answer INTEGER  REFERENCES answer(id) ON UPDATE CASCADE,
  PRIMARY KEY(id),
  CONSTRAINT "only one" CHECK ((((id_reported_answer IS NULL) AND (id_reported_question IS NOT NULL)) OR ((id_reported_answer IS NOT NULL) AND (id_reported_question IS NULL))))
);

CREATE TABLE followTopic(
  id_user INTEGER NOT NULL REFERENCES "user"(id) ON UPDATE CASCADE,
  id_topic INTEGER NOT NULL REFERENCES topic(id) ON UPDATE CASCADE,
  PRIMARY KEY(id_user, id_topic)
);

CREATE TABLE followQuestion(
 id_user INTEGER NOT NULL REFERENCES "user"(id) ON UPDATE CASCADE,
 id_question INTEGER NOT NULL REFERENCES question(id) ON UPDATE CASCADE,
  PRIMARY KEY(id_user, id_question)
);

CREATE TABLE vote(
    id SERIAL UNIQUE,
    id_user INTEGER NOT NULL REFERENCES "user"(id) ON UPDATE CASCADE,
    vote BOOLEAN NOT NULL,
    id_answer INTEGER  REFERENCES answer(id) ON UPDATE CASCADE,
    id_question INTEGER  REFERENCES question(id) ON UPDATE CASCADE,
    PRIMARY KEY(id),
    CONSTRAINT "only one" CHECK ((((id_answer IS NULL) AND (id_question IS NOT NULL)) OR ((id_answer IS NOT NULL) AND (id_question IS NULL))))
);
CREATE TABLE notification(
  id SERIAL UNIQUE,
  notificated_user INTEGER NOT NULL REFERENCES "user"(id) ON UPDATE CASCADE,
  id_question INTEGER NOT NULL REFERENCES question(id) ON UPDATE CASCADE,
  message TEXT  NOT NULL,
  seen BOOLEAN DEFAULT FALSE NOT NULL,
  "date" TIMESTAMP WITH TIME ZONE DEFAULT now() NOT NULL
);


CREATE TABLE tag(
    id SERIAL UNIQUE,
    tagName VARCHAR(20) NOT NULL,
    PRIMARY KEY(id)
);

CREATE TABLE questionTag(
  id_question INTEGER NOT NULL REFERENCES question(id) ON UPDATE CASCADE,
  id_tag INTEGER NOT NULL REFERENCES tag(id) ON UPDATE CASCADE,
  PRIMARY KEY(id_question, id_tag)
);

CREATE TABLE topicTag(
  id_topic INTEGER NOT NULL REFERENCES topic(id) ON UPDATE CASCADE,
 id_tag INTEGER NOT NULL REFERENCES tag(id) ON UPDATE CASCADE,
  PRIMARY KEY(id_topic, id_tag)
);

CREATE TABLE badge(
  id SERIAL UNIQUE,
  name TEXT NOT NULL,
  img TEXT NOT NULL,
  disable BOOLEAN DEFAULT FALSE NOT NULL,
  PRIMARY KEY(id)
);

CREATE TABLE userBadge(
  id_user INTEGER NOT NULL REFERENCES "user"(id) ON UPDATE CASCADE,
  id_badge INTEGER NOT NULL REFERENCES badge(id) ON UPDATE CASCADE,
  PRIMARY KEY(id_user, id_badge)
);

------------------------------------------------------------------------
-----------------------TRIGGERS and UDFs--------------------------------
------------------------------------------------------------------------
--TRIGGER01
--TRIGER PARA CERTEFICAR QUE UM USER SÓ PODE FAZER UM UP/DOWNVOTE POR PERGUNTA/RESPOSTA
CREATE OR REPLACE FUNCTION only_one_vote() RETURNS TRIGGER AS
$BODY$
BEGIN
    IF EXISTS (SELECT * FROM vote WHERE NEW.id_user = id_user AND (NEW.id_answer = id_answer OR NEW.id_question = id_question ) ) THEN
    RAISE EXCEPTION 'you can only vote once.';
    END IF;
    RETURN NEW;
END;
$BODY$
LANGUAGE plpgsql;
CREATE TRIGGER only_one_vote
    BEFORE INSERT ON vote
    FOR EACH ROW
        EXECUTE PROCEDURE only_one_vote();

--TRIGGER02
--triger after insert on vote update karma question
CREATE OR REPLACE FUNCTION update_karma_question() RETURNS TRIGGER AS
$BODY$
BEGIN
    IF NEW.vote = TRUE THEN
        UPDATE question SET karma = karma + 1
        WHERE id = NEW.id_question;
        RETURN NEW;
    ELSE
        UPDATE question SET karma = karma - 1
        WHERE id = NEW.id_question;
        RETURN NEW;
    END IF;
END;
$BODY$
LANGUAGE plpgsql;
CREATE TRIGGER update_karma_question
    BEFORE INSERT OR UPDATE ON vote
    FOR EACH ROW
        EXECUTE PROCEDURE update_karma_question();


--TRIGGER03
--triger after insert on vote update karma answer
CREATE OR REPLACE FUNCTION update_karma_answer() RETURNS TRIGGER AS
$BODY$
BEGIN
    IF NEW.vote = TRUE THEN
        UPDATE answer SET karma = karma + 1
        WHERE id = NEW.id_answer;
        RETURN NEW;
    ELSE
        UPDATE answer SET karma = karma - 1
        WHERE id = NEW.id_answer;
        RETURN NEW;
    END IF;
END;
$BODY$
LANGUAGE plpgsql;
CREATE TRIGGER update_karma_answer
    BEFORE INSERT OR UPDATE ON vote
    FOR EACH ROW
        EXECUTE PROCEDURE update_karma_answer();


--TRIGGER04
--trigger apra ver se ja tas a adar follow a um topic
CREATE OR REPLACE FUNCTION only_one_follow_topic() RETURNS TRIGGER AS
$BODY$
BEGIN
    IF EXISTS (SELECT * FROM followTopic WHERE NEW.id_user = id_user AND NEW.id_topic = id_topic  ) THEN
    RAISE EXCEPTION 'You are already following that topic.';
    END IF;
    RETURN NEW;
END;
$BODY$
LANGUAGE plpgsql;
CREATE TRIGGER only_one_follow_topic
    BEFORE INSERT ON followTopic
    FOR EACH ROW
        EXECUTE PROCEDURE only_one_follow_topic();

/*
--TRIGGER05
--trigger para ver se ja das follow a uma questao
CREATE OR REPLACE FUNCTION only_one_follow_question() RETURNS TRIGGER AS
$BODY$
BEGIN
    IF EXISTS (SELECT * FROM followQuestion WHERE NEW.id_question = id_user AND NEW.id_question = id_question ) THEN
    RAISE EXCEPTION 'You are already following that Question.';
    END IF;
    RETURN NEW;
END;
$BODY$
LANGUAGE plpgsql;
CREATE TRIGGER only_one_follow_question
    BEFORE INSERT ON followQuestion
    FOR EACH ROW
        EXECUTE PROCEDURE only_one_follow_question();
*/
--TRIGGER06
--trigger para gerar notificacao quando pergunta que user segue tem uma nova resposta
CREATE OR REPLACE FUNCTION generate_notification_follow() RETURNS TRIGGER AS
$BODY$
BEGIN
    INSERT INTO notification(notificated_user,id_question,message) 
      (SELECT id_user, NEW.id_question, 'A question you are following has new activity' FROM followQuestion WHERE NEW.id_question = followQuestion.id_question );
    RETURN NEW;
END;
$BODY$
LANGUAGE plpgsql;
CREATE TRIGGER generate_notification_follow
    AFTER INSERT OR UPDATE ON answer
    FOR EACH ROW
        EXECUTE PROCEDURE generate_notification_follow();

--TRIGGER07
--trigger para gerar notificacao quando propria pergunta tem uma nova resposta
CREATE OR REPLACE FUNCTION generate_notification_owner() RETURNS TRIGGER AS
$BODY$
BEGIN
    INSERT INTO notification(notificated_user,id_question,message) 
      (SELECT id_author, NEW.id_question, 'Your question has a new answer' FROM question WHERE id= NEW.id_question );
    RETURN NEW;
END;
$BODY$
LANGUAGE plpgsql;
CREATE TRIGGER generate_notification_owner
    AFTER INSERT OR UPDATE ON answer
    FOR EACH ROW
        EXECUTE PROCEDURE generate_notification_owner();


--INDEXES
CREATE INDEX idx_idtopicquestion ON "question" USING hash(id_topic);
CREATE INDEX idx_iddisabledquestion ON "question" USING  hash(id_topic);

ALTER TABLE "question" ADD COLUMN textsearchable_index_col tsvector;
UPDATE "question" SET textsearchable_index_col =
 to_tsvector('english', coalesce(short_message,'')||' '|| coalesce(long_message,''));

CREATE INDEX textsearch_idx ON "question" USING GIN (textsearchable_index_col);

ALTER TABLE "user" ADD COLUMN usersearchable_index_col tsvector;
UPDATE "user" SET usersearchable_index_col =
     to_tsvector('english', coalesce(name,'') || ' ' || coalesce(username,''));

CREATE INDEX usersearch_idx ON "user" USING GIN (usersearchable_index_col);

ALTER TABLE "answer" ADD COLUMN textsearchanswer_index_col tsvector;
UPDATE "answer" SET textsearchanswer_index_col =
     to_tsvector('english', coalesce(message,''));

CREATE INDEX textsearch_answer_idx ON "answer" USING GIN (textsearchanswer_index_col);



INSERT INTO "user"(username,email,name,img,bio,type) VALUES ('DiogoaCunha', 'mailfalso@gmail.com','diogo','diogo.png','Im fine','ADMIN');
INSERT INTO "user"(username,email,name,img,bio,type) VALUES ('martaTorgal', 'mailmarta@gmail.com','Marta Torgal','marta.png','Im always ok!!','ADMIN');
INSERT INTO "user"(username,email,name,img,bio,type) VALUES ('tibas', 'mailtibas94@gmail.com','Jose Marques','tibas.png','I like to eat icecream with my forehead','ADMIN');
INSERT INTO "user"(username,email,name,img,bio,type) VALUES ('franza', 'pop@gmail.com','Pedro Franca','franza.png','if I answered your question it is prolly wrong','ADMIN');
INSERT INTO "user"(username,email,name,img,bio) VALUES ('jeff', 'jeff98@gmail.com','Jeff Erson','default.png','MY NAME IS JEFFF');
INSERT INTO "user"(username,email,name,img,bio,type) VALUES ('potus', 'therealdonaldtrump@gmail.com','Donald Trump','potus.png','Imma build a wall','NORMAL');
INSERT INTO "user"(username,email,name,img,bio,type) VALUES ('johnSnow85', 'yoyo@gmail.com','MANEL','default.png','winter is comming,false','NORMAL');
INSERT INTO "user"(username,email,name,img,bio,type) VALUES ('throwaway1223312', 'esum@burro.com','o anonimo','default.png','','NORMAL');
INSERT INTO "user"(username,email,name,img,bio,type) VALUES ('quinhas', 'maria@gmail.com','Quinhas POmba','default.png','Universidade da vida','NORMAL');
INSERT INTO "user"(username,email,name,img,bio,type) VALUES ('Max', 'maxc@gmail.com','Max Caulfield','lis.png','Life is... weird','NORMAL');

---- Insert Topic 

INSERT INTO topic(id,name,img) VALUES (1,'Sports','1.jpg');
INSERT INTO topic(id,name,img) VALUES (2,'Music','2.jpeg');
INSERT INTO topic(id,name,img) VALUES (3,'Fashion','3.jpeg');
INSERT INTO topic(id,name,img) VALUES (4,'IT','4.jpg');
INSERT INTO topic(id,name,img) VALUES (5,'Math&Science','5.jpg');
INSERT INTO topic(id,name,img) VALUES (6,'Food&Nutricion','6.jpg');
INSERT INTO topic(id,name,img) VALUES (7,'History','7.jpg');
INSERT INTO topic(id,name,img) VALUES (8,'Random','8.png');


---- Insert Question 

INSERT INTO question(date,karma,short_message,long_message,id_author,id_topic) VALUES (now(),8,'Who is the greatest tennis player of all time?', 'The one who has the most titles',1,1);
INSERT INTO question(date,karma,short_message,long_message,id_author,id_topic) VALUES (now(),1,'Can I own an airsoft replica?', 'What are the airsoft laws in Portugal?',4,1);
INSERT INTO question(date,karma,short_message,long_message,id_author,id_topic) VALUES (now(),4,'Why do people like soccer so much?', 'it is a stupid sport, a bunch of guys running arround a ball, what is the magic to it?',5,1);
INSERT INTO question(date,karma,short_message,long_message,id_author,id_topic) VALUES (now(),8,'Who is the greatest tennis player of all time?', 'The one who has the most titles',5,1);
INSERT INTO question(date,karma,short_message,long_message,id_author,id_topic) VALUES (now(),15,'Who sing hit me baby one more time?', '',3,2);
INSERT INTO question(date,karma,short_message,long_message,id_author,id_topic) VALUES (now(),0,'Eletro song that goes like...', 'what is the nome of that song that goes piri priri bam bum badadadadadad bish bash bosh',3,2);
INSERT INTO question(date,karma,short_message,long_message,id_author,id_topic) VALUES (now(),3,'who, in your opinion is the most fashion savy US president?', '',6,3);
INSERT INTO question(date,karma,short_message,long_message,id_author,id_topic) VALUES (now(),9000,'How do you create database indexes?', 'PLEASE HELP ME',4,4);
INSERT INTO question(date,karma,short_message,long_message,id_author,id_topic) VALUES (now(),7,'What programing lenguage is the best to start?', '',9,4);
INSERT INTO question(date,karma,short_message,long_message,id_author,id_topic) VALUES (now(),2,'I deleted SYSTEM32 HELP!!', 'Some guy in the inetrnet told me that my computer would run faste if i deleted system 32, now my computer wont turn on, what should i do? ',8,4);
INSERT INTO question(date,karma,short_message,long_message,id_author,id_topic) VALUES (now(),10,'2+2?', '',6,5);
INSERT INTO question(date,karma,short_message,long_message,id_author,id_topic) VALUES (now(),0,'How yo integrate?', 'I have my math exam tomorrow and need to know to to integrate,thanks.',4,5);
INSERT INTO question(date,karma,short_message,long_message,id_author,id_topic) VALUES (now(),4,'If I look to a folar will I be out of ketosys?', '',4,6);
INSERT INTO question(date,karma,short_message,long_message,id_author,id_topic) VALUES (now(),5,'In your opinio what is the best food ever?', '',10,6);
INSERT INTO question(date,karma,short_message,long_message,id_author,id_topic) VALUES (now(),4,'ShouLD i DRINK BLEACH?', 'I am playing this blue whale game and...' ,8,8);
INSERT INTO question(date,karma,short_message,long_message,id_author,id_topic) VALUES (now(),10,'Best video game you ever played?', '' ,5,8);
INSERT INTO question(date,karma,short_message,long_message,id_author,id_topic) VALUES (now(),7,'What is your favorite household item?', '' ,2,8);
INSERT INTO question(date,karma,short_message,long_message,id_author,id_topic) VALUES (now(),500,'If a girafe could talk what would it say?', '' ,3,8);
INSERT INTO question(date,karma,short_message,long_message,id_author,id_topic) VALUES (now(),28,'What is the best pick up line you know?', '' ,9,8);
INSERT INTO question(date,karma,short_message,long_message,id_author,id_topic) VALUES (now(),50,'mais uma de desporto?', 'bue cenas',7,1);
INSERT INTO question(date,karma,short_message,long_message,id_author,id_topic) VALUES (now(),5,'mais uma de desporto?', 'bue cenas',1,1);
INSERT INTO question(date,karma,short_message,long_message,id_author,id_topic) VALUES (now(),530,'mais uma de desporto?', 'bue cenas',7,1);
INSERT INTO question(date,karma,short_message,long_message,id_author,id_topic) VALUES (now(),23,'mais uma de desporto?', 'bue cenas',2,1);
INSERT INTO question(date,karma,short_message,long_message,id_author,id_topic) VALUES (now(),4323,'mais uma de desporto?', 'bue cenas',7,1);
----- Insert FollowQuestion



-----Insert Answer
INSERT INTO answer(date,karma,message,id_author,id_question) VALUES (now(),7,'The greatest tennins player is Roger Federer!!! Check it on google mate.',6,1);
INSERT INTO answer(date,karma,message,id_author,id_question) VALUES (now(),0,'your mom',3,1);
INSERT INTO answer(date,karma,message,id_author,id_question) VALUES (now(),2,'You need to be federated and you need to have your replica paint yellow or red.',5,2);
INSERT INTO answer(date,karma,message,id_author,id_question) VALUES (now(),2,'I think it is salavdor sobral',6,5);
INSERT INTO answer(date,karma,message,id_author,id_question) VALUES (now(),7,'daaaaah, it is from ACDC',2,6);
INSERT INTO answer(date,karma,message,id_author,id_question) VALUES (now(),2,'MARCELO REBELO DE SOUSA CRL',6,7);
INSERT INTO answer(date,karma,message,id_author,id_question) VALUES (now(),15,'SAAAAAAAAAAAAME, HELP PLS',6,8);
INSERT INTO answer(date,karma,message,id_author,id_question) VALUES (now(),8,'So ez, n00b',2,8);
INSERT INTO answer(date,karma,message,id_author,id_question) VALUES (now(),0,'You need to read the class slides bro',4,8);
INSERT INTO answer(date,karma,message,id_author,id_question) VALUES (now(),500,':(',9,8);
INSERT INTO answer(date,karma,message,id_author,id_question) VALUES (now(),1,'4',6,11);
INSERT INTO answer(date,karma,message,id_author,id_question) VALUES (now(),68,'5',9,11);
INSERT INTO answer(date,karma,message,id_author,id_question) VALUES (now(),0,'Vegan food 4life',6,14);
INSERT INTO answer(date,karma,message,id_author,id_question) VALUES (now(),10,'T-bone',1,14);
INSERT INTO answer(date,karma,message,id_author,id_question) VALUES (now(),5000,'FRANCESINHA RAÇA MESTRE',2,14);
INSERT INTO answer(date,karma,message,id_author,id_question) VALUES (now(),15,'Pasta',3,14);
INSERT INTO answer(date,karma,message,id_author,id_question) VALUES (now(),8,'Ceaser salad',4,14);
INSERT INTO answer(date,karma,message,id_author,id_question) VALUES (now(),10,'I like eggs ',5,14);

------ Insert FollowTopic

INSERT INTO followTopic(id_user,id_topic) VALUES (1,1);
INSERT INTO followTopic(id_user,id_topic) VALUES (1,4);
INSERT INTO followTopic(id_user,id_topic) VALUES (4,4);
INSERT INTO followTopic(id_user,id_topic) VALUES (4,8);
INSERT INTO followTopic(id_user,id_topic) VALUES (8,3);
INSERT INTO followTopic(id_user,id_topic) VALUES (5,5);

------ Insert tag

INSERT INTO tag(id,tagName) VALUES (1,'Trending');
INSERT INTO tag(id,tagName) VALUES (2,'Serious');
INSERT INTO tag(id,tagName) VALUES (3,'NSFW');
INSERT INTO tag(id,tagName) VALUES (4,'Controversial');


------ Insert questionTag

INSERT INTO questionTag(id_question,id_tag) VALUES (14,4);
INSERT INTO questionTag(id_question,id_tag) VALUES (19,3);
INSERT INTO questionTag(id_question,id_tag) VALUES (16,3);
INSERT INTO questionTag(id_question,id_tag) VALUES (8,1);
INSERT INTO questionTag(id_question,id_tag) VALUES (6,2);
INSERT INTO questionTag(id_question,id_tag) VALUES (7,2);

------------INSERT BADGE

INSERT INTO "badge" (name,img) VALUES ('Frequent Poster', 'badge1.png');
INSERT INTO "badge" (name,img) VALUES ('Great Mind!', 'badge2.png');
INSERT INTO "badge" (name,img) VALUES ('Friendly', 'badge3.png');
INSERT INTO "badge" (name,img) VALUES ('Not so smart', 'badge4.png');
INSERT INTO "badge" (name,img) VALUES ('ADMIN', 'ADMINbadge.png');
INSERT INTO "badge" (name,img) VALUES ('MOD', 'MODbadge.png');

INSERT INTO "report" (reason,id_reporting_user,id_reported_answer) VALUES ('eleifend vitae, erat. Vivamus nisi. Mauris nulla.',1,1);
INSERT INTO "report" (reason,id_reporting_user,id_reported_answer) VALUES ('In scelerisque scelerisque dui.',2,2);
INSERT INTO "report" (reason,id_reporting_user,id_reported_answer) VALUES ('varius. Nam porttitor scelerisque neque. Nullam nisl. Maecenas malesuada',3,3);

INSERT INTO followQuestion(id_user,id_question) VALUES (1,1);
INSERT INTO followQuestion(id_user,id_question) VALUES (3,1);
INSERT INTO followQuestion(id_user,id_question) VALUES (4,1);
INSERT INTO followQuestion(id_user,id_question) VALUES (9,1);
