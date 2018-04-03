# ---- Insert User -----

INSERT INTO user (id,username,email,name,img,bio,disable,type) VALUES (1,'DiogoaCunha', 'diogoalmeida@gmail.com','diogo','diogo.png','Im fine',false,'ADMIN');
INSERT INTO user (id,username,email,name,img,bio,disable,type) VALUES (2,'martaTorgal', 'marta@gmail.com','Marta Torgal','marta.png','Im always ok!!',false,'ADMIN');
INSERT INTO user (id,username,email,name,img,bio,disable,type) VALUES (3,'tibas', 'tibas94@gmail.com','Jose Marques','tibas.png','I like to eat icecream with my forehead',false,'ADMIN');
INSERT INTO user (id,username,email,name,img,bio,disable,type) VALUES (4,'franza', 'pedro.franca.1994@gmail.com','Pedro Franca','franza.png','if I answered your question it\'s prolly wrong',false,'ADMIN');
INSERT INTO user (id,username,email,name,img,bio,disable,type) VALUES (5,'jeff', 'jeff98@gmail.com','Jeff Erson','default.png','MY NAME\'S JEFFF',false,'NORMAL');
INSERT INTO user (id,username,email,name,img,bio,disable,type) VALUES (6,'potus', 'therealdonaldtrump@gmail.com','Donald Trump','potus.png','Imma build a wall',false,'NORMAL');
INSERT INTO user (id,username,email,name,img,bio,disable,type) VALUES (7,'johnSnow85', 'yoyo@gmail.com','MANEL','default.png','winter\'s comming,false',false,'NORMAL');
INSERT INTO user (id,username,email,name,img,bio,disable,type) VALUES (8,'throwaway1223312', 'esum@burro.com','o anonimo','default.png','',false,'NORMAL');
INSERT INTO user (id,username,email,name,img,bio,disable,type) VALUES (9,'quinhas', 'maria@gmail.com','Quinhas POmba','default.png','Universidade da vida',false,'NORMAL');
INSERT INTO user (id,username,email,name,img,bio,disable,type) VALUES (10,'Max', 'maxc@gmail.com','Max Caulfield','lis.png','Life is... weird',false,'NORMAL');

# ---- Insert Topic ------ OK

INSERT INTO topic (id,name,img,disable) VALUES (1,'Sports','1.jpg',false);
INSERT INTO topic (id,name,img,disable) VALUES (2,'Music','2.jpeg',false);
INSERT INTO topic (id,name,img,disable) VALUES (3,'Fashion','3.jpeg',false);
INSERT INTO topic (id,name,img,disable) VALUES (4,'IT','4.jpg',false);
INSERT INTO topic (id,name,img,disable) VALUES (5,'Math&Science','5.jpg',false);
INSERT INTO topic (id,name,img,disable) VALUES (6,'Food&Nutricion','6.jpg',false);
INSERT INTO topic (id,name,img,disable) VALUES (7,'History','7.jpg',false);
INSERT INTO topic (id,name,img,disable) VALUES (8,'Random','8.png',false);


# ---- Insert Question ----- OK

INSERT INTO question(id,date,karma,short_message,long_message,id_author,id_topic,disable) VALUES (1,now(),8,'Who is the greatest tennis player of all time?', 'The one who has the most titles',1,1,false);
INSERT INTO question(id,date,karma,short_message,long_message,id_author,id_topic,disable) VALUES (2,now(),1,'Can I own an airsoft replica?', 'What are the airsoft laws in Portugal?',4,1,false);
INSERT INTO question(id,date,karma,short_message,long_message,id_author,id_topic,disable) VALUES (3,now(),4,'Why do people like soccer so much?', 'it\'s a stupid sport, a bunch of guys running arround a ball, what is the magic to it?',5,1,false);
INSERT INTO question(id,date,karma,short_message,long_message,id_author,id_topic,disable) VALUES (4,now(),8,'Who is the greatest tennis player of all time?', 'The one who has the most titles',5,1,false);
INSERT INTO question(id,date,karma,short_message,long_message,id_author,id_topic,disable) VALUES (5,now(),15,'Who sing \'hit me baby one more time\'?', '',3,2,false);
INSERT INTO question(id,date,karma,short_message,long_message,id_author,id_topic,disable) VALUES (6,now(),0,'Eletro song that goes like...', 'what is the nome of that song that goes piri priri bam bum badadadadadad bish bash bosh',3,2,false);
INSERT INTO question(id,date,karma,short_message,long_message,id_author,id_topic,disable) VALUES (7,now(),3,'who, in your opinion is the most fashion savy US president?', '',6,3,false);
INSERT INTO question(id,date,karma,short_message,long_message,id_author,id_topic,disable) VALUES (8,now(),9000,'How do you create database indexes?', 'PLEASE HELP ME',4,4,false);
INSERT INTO question(id,date,karma,short_message,long_message,id_author,id_topic,disable) VALUES (9,now(),7,'What programing lenguage is the best to start?', '',9,4,false);
INSERT INTO question(id,date,karma,short_message,long_message,id_author,id_topic,disable) VALUES (10,now(),2,'I deleted SYSTEM32 HELP!!', 'Some guy in the inetrnet told me that my computer would run faste if i deleted system 32, now my computer wont turn on, what should i do? ',8,4,false);
INSERT INTO question(id,date,karma,short_message,long_message,id_author,id_topic,disable) VALUES (11,now(),10,'2+2?', '',6,5,false);
INSERT INTO question(id,date,karma,short_message,long_message,id_author,id_topic,disable) VALUES (12,now(),0,'How yo integrate?', 'I have my math exam tomorrow and need to know to to integrate,thanks.',4,5,false);
INSERT INTO question(id,date,karma,short_message,long_message,id_author,id_topic,disable) VALUES (13,now(),4,'If I look to a folar will I be out of ketosys?', '',4,6,false);
INSERT INTO question(id,date,karma,short_message,long_message,id_author,id_topic,disable) VALUES (14,now(),5,'In your opinio what is the best food ever?', '',10,6,false);
INSERT INTO question(id,date,karma,short_message,long_message,id_author,id_topic,disable) VALUES (15,now(),4,'ShouLD i DRINK BLEACH?', 'I\'m playing this blue whale game and...' ,8,8,false);
INSERT INTO question(id,date,karma,short_message,long_message,id_author,id_topic,disable) VALUES (16,now(),10,'Best video game you ever played?', '' ,5,8,false);
INSERT INTO question(id,date,karma,short_message,long_message,id_author,id_topic,disable) VALUES (17,now(),7,'What is your favorite household item?', '' ,2,8,false);
INSERT INTO question(id,date,karma,short_message,long_message,id_author,id_topic,disable) VALUES (18,now(),500,'If a girafe could talk what would it say?', '' ,3,8,false);
INSERT INTO question(id,date,karma,short_message,long_message,id_author,id_topic,disable) VALUES (19,now(),28,'What is the best pick up line you know?', '' ,9,8,false);










# ----- Insert Answer ----- OK

INSERT INTO answer(id,date,karma,message,id_author,id_question,disable) VALUES (1,now(),7,'The greatest tennins player is Roger Federer!!! Check it on google mate.',6,1,false);
INSERT INTO answer(id,date,karma,message,id_author,id_question,disable) VALUES (2,now(),0,'your mom',3,1,false);
INSERT INTO answer(id,date,karma,message,id_author,id_question,disable) VALUES (3,now(),2,'You need to be federated and you need to have your replica paint yellow or red.',5,2,false);
INSERT INTO answer(id,date,karma,message,id_author,id_question,disable) VALUES (4,now(),2,'I think it\'s salavdor sobral',6,5,false);
INSERT INTO answer(id,date,karma,message,id_author,id_question,disable) VALUES (5,now(),7,'daaaaah, it\'s from ACDC',2,6,false);
INSERT INTO answer(id,date,karma,message,id_author,id_question,disable) VALUES (6,now(),2,'MARCELO REBELO DE SOUSA CRL',6,7,false);
INSERT INTO answer(id,date,karma,message,id_author,id_question,disable) VALUES (7,now(),15,'SAAAAAAAAAAAAME, HELP PLS',6,8,false);
INSERT INTO answer(id,date,karma,message,id_author,id_question,disable) VALUES (8,now(),8,'So ez, n00b',2,8,false);
INSERT INTO answer(id,date,karma,message,id_author,id_question,disable) VALUES (9,now(),0,'You need to read the class slides bro',4,8,false);
INSERT INTO answer(id,date,karma,message,id_author,id_question,disable) VALUES (10,now(),500,':(',9,8,false);
INSERT INTO answer(id,date,karma,message,id_author,id_question,disable) VALUES (11,now(),1,'4',6,11,false);
INSERT INTO answer(id,date,karma,message,id_author,id_question,disable) VALUES (12,now(),68,'5',9,11,false);
INSERT INTO answer(id,date,karma,message,id_author,id_question,disable) VALUES (13,now(),0,'Vegan food 4life',6,14,false);
INSERT INTO answer(id,date,karma,message,id_author,id_question,disable) VALUES (14,now(),10,'T-bone',1,14,false);
INSERT INTO answer(id,date,karma,message,id_author,id_question,disable) VALUES (15,now(),5000,'FRANCESINHA RAÇA MESTRE',2,14,false);
INSERT INTO answer(id,date,karma,message,id_author,id_question,disable) VALUES (16,now(),15,'Pasta',3,14,false);
INSERT INTO answer(id,date,karma,message,id_author,id_question,disable) VALUES (17,now(),8,'Ceaser salad',4,14,false);
INSERT INTO answer(id,date,karma,message,id_author,id_question,disable) VALUES (18,now(),10,'I like eggs ',5,14,false);


# ----- Insert FollowQuestion

INSERT INTO followQuestion (id_user,id_question) VALUES (1,11);
INSERT INTO followQuestion (id_user,id_question) VALUES (8,15);
INSERT INTO followQuestion (id_user,id_question) VALUES (5,7);
INSERT INTO followQuestion (id_user,id_question) VALUES (6,3);




# ------ Insert FollowTopic

INSERT INTO followTopic(id_user,id_topic) VALUES (1,1);
INSERT INTO followTopic(id_user,id_topic) VALUES (1,4);
INSERT INTO followTopic(id_user,id_topic) VALUES (4,4);
INSERT INTO followTopic(id_user,id_topic) VALUES (4,8);
INSERT INTO followTopic(id_user,id_topic) VALUES (8,3);
INSERT INTO followTopic(id_user,id_topic) VALUES (5,5);


# ------ Insert tag


INSERT INTO tag(id,tagName) VALUES (1,'Trending');
INSERT INTO tag(id,tagName) VALUES (2,'Serious');
INSERT INTO tag(id,tagName) VALUES (3,'NSFW');
INSERT INTO tag(id,tagName) VALUES (4,'Controversial');


# ------ Insert questionTag

INSERT INTO questionTag(id_question,id_tag) VALUES (14,4);
INSERT INTO questionTag(id_question,id_tag) VALUES (19,3);
INSERT INTO questionTag(id_question,id_tag) VALUES (16,3;
INSERT INTO questionTag(id_question,id_tag) VALUES (8,1);
INSERT INTO questionTag(id_question,id_tag) VALUES (6,2);
INSERT INTO questionTag(id_question,id_tag) VALUES (7,2);

---------------------------------------------------------------------------------
------------------------------- INSERTS GENERICOS -------------------------------
---------------------------------------------------------------------------------


--INSERT
--New Question
INSERT INTO question (short_message, long_message, id_author, id_topic)
VALUES ($question, $description, $authorID, $topicID);

--INSERT
--New Answer
INSERT INTO answer (message,id_author,id_question)
VALUES ($answer, $authorID, $questionID);

--INSERT
--New Topic
--ATENCAO!!!! FAZER TRIGGER PARA INSERT EM topic!!! TEM DE SER ADMIN
INSERT INTO topic (name, img) VALUES ($name, $img_path);

--INSERT
--New Vote
--ATENÇAO!!!! TRIGER PARA VER SE JA EXISTE UM VOTE DAQUELE USER PARA AQUELE ELEMENTO (pergunta/resposta)
--COMO FAZER OS DOIS?
INSERT INTO vote (id_user, vote, id_answer) VALUES ($userID, $vote, $answerID);
--OU
INSERT INTO vote (id_user, vote, id_question) VALUES ($userID, $vote, $questionID);

--INSERTS
--New User
INSERT INTO "user" (username,email,name,img,bio,disable,type) VALUES ($username,$email,$nickname,$img,$bio,$disable,$type);

--INSERT
--new followQuestion
INSERT INTO followQuestion (id_user,id_question) VALUES ($user_id, $question_id)

--INSERT
-- new followTopic
INSERT INTO followTopic (id_user,id_topic) VALUES ($user_id,$topic_id)


--INSERT
-- notificationAnswer
INSERT INTO notificationanswer(id_user,id_question,message,seen,date)
    VALUES ($user_id,$question_id,$message,$seen,$date)

--INSERT
-- notificationFollow
INSERT INTO notificationfollow(id_user,id_question,message,seen,date)
    VALUES ($user_id,$question_id,$message,$seen,$date)


--INSERT
-- reportanswer
INSERT INTO reportanswer(reason,id_user,id_answer)
    VALUES ($reason,$user_id,$answer_id)

--INSERT
-- reportQuestion
INSERT INTO reportquestion(reason,id_user,id_question)
    VALUES ($reason,$user_id,$question_id)

--INSERT
-- tag
INSERT  INTO tag (tagname) values ($tagname)

--INSERT
-- topicTag
INSERT INTO topictag (id_topic, id_tag) values ($topicId,$tagId)

--INSERT
-- questionTag
INSERT INTO questiontag (id_question, id_tag) values ($questionId,$tagId)



--------------------------------------------------------------------------------
------------------------------- SELECTS GENERICOS -------------------------------
---------------------------------------------------------------------------------


--select all topics
select * from topic

select name,img from topic 
	where topic.id = $topicId

--select all user
select * from "user"

-- select user's profile
select  username,email,name, img, bio from "user" 
  where "user".id = $userId; 


---select all answers of a specific question
select * from answer, question where question.id=$question_id and answer.id_question=question.id

---select all questions from a topic 
select distinct * from question, topic 
	where topic.id = question.id_topic 



---select all information of a specific question
select * from question where question.id= $question_id




---select all questions from a topic that are followed by a user
select distinct * from question, topic, followtopic 
	where topic.id = question.id_topic 
	and topic.id = followtopic.id_topic
	and followtopic.id_user = $user_id

--select all questions that are followed by the user
select * from question, followquestion
	where question.id = followquestion.id_question 
	and followquestion.id_user = $user_id



--select all question that the user created
select * from question where author_id = $user_id



--select all topics that are associated with a tag
select * from topictag, topic where topictag.id_topic = topic.id and topictag.id_tag = $tagId



--selec all questions that are associated with a tag
select * from questiontag,question where question.id=questiontag.id_question and id_tag=$tagId



----Select all information of a question that belongs to a topic with a specific tag
select question.id, karma,short_message, long_message, id_user, question.disable, question.date from topictag, topic, question 
	
	where topictag.id_topic = topic.id and topictag.id_tag = $tagId and question.id_topic = topictag.id_topic



--select all information from an answer that belong to a specific report
select * from reportanswer, answer where id_answer=answer.id and reportanswer.id=$reportId



--select all information from a question that belong to a specific report
select * from reportquestion, question where id_question=question.id and reportquestion.id= $reportId


--SELECT
--My notifications

SELECT id_question, message
FROM notification
WHERE seen = FALSE AND id_user = $userID
ORDER BY date;


--SELECT 
--Best Answer
--QUE LUXO DE QUE QUERY
--TESTAR xD
SELECT date, karma, message, id_user
FROM answer
WHERE id_question = $questionID AND disable = FALSE 
	AND karma = (SELECT max(karma) FROM answer WHERE id_question = $questionID);



--select all answers from a question
--quem escreveu isto estava bebado?
--select * from answer, "user" where id_user = 1

--select all notificationanswer of an user
select * from notificationanswer where id_user = $userId

####OK####


--------------------------------------------------------------------------------
------------------------------- UPDATES GENERICOS -------------------------------
---------------------------------------------------------------------------------


--UPDATE
--Give Permissions
--ATENCAO!!!! FAZER TRIGER PARA UPDATE EM FIELD type DE user!!! TEM DE SER ADMIN!
UPDATE "user"
SET type = $type
WHERE id = $userID;

--UPDATE
--Disable Topic
--ATENCAO!! FAZER TRIGER PARA UPDATE EM topic!!! TEM DE SER ADMIN!!!
UPDATE topic
SET disable = $disableTopic
WHERE id = $topicID;

--UPDATE
--Update image topic from Admin Page
UPDATE topic
SET img = $image
WHERE id = $topicID;

--UPDATE
--Update name topic from Admin Page
UPDATE topic
SET name = $name
WHERE id = $topicID;


--UPDATE
--Disable Answer
--ATENCAO!! FAZER TRIGER PARA UPDATE EM FIELD disable DE answer!!! TEM DE SER OWNER, MOD OU ADMIN!!!
UPDATE answer
SET disable = $disableAnswer
WHERE id = $answerID;

--UPDATE 
--Edit answer
--ATENÇAO!! FAZER TRIGER PARA UPDATE EM FIELD message DE answer!! TEM DE SER OWNER!!
--TESTAR O TIMESTAMP
UPDATE answer
SET message = $newMessage, "date" = now()
WHERE id = $answerID;

--UPDATE 
--Edit question
--ATENÇAO!! FAZER TRIGER PARA UPDATE EM FIELD message DE question!! TEM DE SER OWNER!!
--TESTAR O TIMESTAMP
UPDATE question
SET long_message = $newMessage, "date" = now()
WHERE id = $questionID;

--UPDATE
-- short message changed
UPDATE question
SET short_message = $newMessage, "date" = now()
WHERE id = $questionID;


--UPDATE
--Disable Question
--ATENCAO!! FAZER TRIGER PARA UPDATE EM question!!! TEM DE SER OWNER, MOD OU ADMIN!!!
UPDATE question
SET disable = $disableQuestion
WHERE id = $questionID;

--UPDATE 
--Edit Vote
--ATENÇAO!! FAZER TRIGER PARA UPDATE EM vote!! 
UPDATE vote
SET vote.vote = $vote
WHERE id = $voteID;


--update user
--update username
update "user" set username = $user_username where id = $user_id

--update email
update "user" set email = $user.email where id = $user_id

--update name
update "user" set name = $user_name where id = $user_id

--update img
update "user" set img= $user_img where id = $user_id

--update bio
update "user" set bio= $user_bio where id = $user_id

--update disable
update "user" set disable= $disable where id = $user_id

--update username,name bio, image, background?????
update "user" set username = $user_username, name = $user_name, img = $user_id, bio=$user_bio, email=$user_email where id = $user_id


update reportanswer set disable= TRUE where id = $reportId

--update disable reportanswer
update reportquestion set disable= TRUE where id = $reportId


--update disable reportanswer
update reportanswer set disable= $disableReport where id = $reportAnswerId


--update karma
update question set karma = $karma where id = $questionId

--update disable on question if owner 
update question set disable=true where id = $question_id and author_id=$user_id

--update karma on answer
update answer set karma = $karma where id = $answerId

--update seen on notificationanswer
update notificationanswer set seen = $seenUp where id = $id

--update seen on notificationfollow
update notificationfollow set seen = $seenUp where id = $id


--------------------------------------------------------------------------------
------------------------------- DELETES GENERICOS -------------------------------
---------------------------------------------------------------------------------


--delete followquestion that an user stop following
delete from followquestion where id_user=$userId and id_question=$questionId

--delete followtopic that an user stop following
delete from followtopic where id_user=$userId and id_topic=$topicId



--------------------------------------------------------------------------------
------------------------------- INDEX GENERICOS -------------------------------
---------------------------------------------------------------------------------

-- Tags

CREATE INDEX tags_search ON "questiontag" USING hash (email);

-- Email



--------------------------------------------------------------------------------
------------------------------- TRIGGERS GENERICOS -------------------------------
---------------------------------------------------------------------------------