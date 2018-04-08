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
