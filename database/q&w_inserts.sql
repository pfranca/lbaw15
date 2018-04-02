# ---- Insert User -----

INSERT INTO user (username,email,name,img,bio,disable,type) VALUES 
    ('tiagoAlmeida', 'tiago@gmail.com','tiago','img1.png','Im a programer',false,'Normal')

INSERT INTO user (username,email,name,img,bio,disable,type) VALUES 
    ('DiogoaCunha', 'diogoalmeida@gmail.com','diogo','img2.png','Im fine',false,'Normal')

INSERT INTO user (username,email,name,img,bio,disable,type) VALUES 
    ('afonsoCruz', 'afonso@gmail.com','afonso','img3.png','Im always ok!!',false,'Normal')

# ---- Insert Topic ------ OK

INSERT INTO topic (name,img,disable) VALUES
    ('sports','sports.png',false)

INSERT INTO topic (name,img,disable) VALUES
    ('music','music.png',false)

INSERT INTO topic (name,img,disable) VALUES
    ('dance','dance.png',false)

INSERT INTO topic (name,img,disable) VALUES
    ('rock','rock.png',false)

INSERT INTO topic (name,img,disable) VALUES
    ('random','random.png',false)


# ---- Insert Question ----- OK

INSERT INTO "question" (date,karma,short_message,long_message,author_id,id_topic,disable) VALUES

    (now(),0,'Who is the greatest tennis player of all time?', 'dont know, help me guys!!',1,1,false)


INSERT INTO "question" (karma,short_message,long_message,author_id,id_topic,disable) VALUES

    (now(),0,'Do you know how to dance? Any club?', 'Ive been trying to learn how to dance, really wanna know guys!!!',2,2,false)


INSERT INTO "question" (karma,short_message,long_message,author_id,id_topic,disable) VALUES 
    
    (0,'Who is the greatest handball player of all time?', 'I play for almost 5 years and I wanna see some videos on youtube!!',5,1,false)


# ----- Insert Answer ----- OK

INSERT INTO "answer" (karma,message,id_user,id_question,disable) VALUES

    (2,'The greatest tennins player is Roger Federer!!! Check it on google mate.',6,1,false);

INSERT INTO "answer" (karma,message,id_user,id_question,disable) VALUES

    (2,'Roger Federer aahah',1,1,false)

    INSERT INTO "answer" (karma,message,id_user,id_question,disable) VALUES (2,'Yes i know, i am at the dance club in Porto!',6,2,false)

# ----- Insert Vote ------ OK

INSERT INTO "vote" (author_id,id_answer,vote) VALUES
    
    (6,1,true)
    

# ----- Insert FollowQuestion

INSERT INTO followQuestion (id_user,id_question) VALUES ('tiagoAlmeida',2)

INSERT INTO followQuestion (id_user,id_question) VALUES ('tiagoAlmeida',1)



# ------ Insert FollowTopic

INSERT INTO followTopic (id_user,id_topic) VALUES ('DiogoaCunha','dance')

INSERT INTO followTopic (id_user,id_topic) VALUES ('DiogoaCunha','sports')


# ----- Insert notificationAnser

INSERT INTO notificationanswer(id_user,id_question,message,seen,date)
    VALUES (1,4,'I following in love!!!',false,now())

# ------ Insert notificationFollow

INSERT INTO notificationfollow(id_user,id_question,message,seen,date)
    VALUES (1,4,'asweome',false,now())

# ------ Insert reportAnswer

INSERT INTO reportanswer(reason,id_user,id_answer)
    VALUES ("Ok, dont understand!",1,2)

# ------- Insert reportQuestion

INSERT INTO reportquestion(reason,id_user,id_question)
    VALUES ("dont know this!! wrong question!!",1,1)
------------------SELECT------------------ Marta
---select all answers of a specific question
select * from answer, question where question.id=$question_id and answer.id_question=question.id

---select all information of a specific question
select * from question where question.id= $question_id


---select all questions from a topic that are followed by a user
select distinct * from question, topic, followtopic 
where topic.id=question.id_topic 
and topic.id=followtopic.id_topic
and followtopic.id_user=$user_id

--select all questions that are followed by the user
select * from question, followquestion
where question.id = followquestion.id_question 
and followquestion.id_user = $user_id


--select all question that the user created
select * from question where author_id = $user_id

--FALTA BACKGROUND IMAGE ON DATABASE

--select all user
select * from "user"

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


--update username,name bio, image, background?????
update "user" set username = $user_username, name = $user_name, img = $user_id, bio=$user_bio, email=$user_email where id = $user_id

INSERT INTO vote (id_user, vote, id_answer) VALUES ($userID, $vote, $answerID);
--OU
INSERT INTO vote (id_user, vote, id_question) VALUES ($userID, $vote, $questionID);

--INSERT
--New User
INSERT INTO user (username,email,name,img,bio,disable,type) VALUES ($username,$email,$nickname,$img,$bio,$disable,$type);

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
-- reportquestion
INSERT INTO reportquestion(reason,id_user,id_question)
    VALUES ($reason,$user_id,$question_id)

INSERT  INTO tag (tagname) values ($tagname)

INSERT INTO topictag (id_topic, id_tag) values ($topicId,$tagId)

INSERT INTO questiontag (id_question, id_tag) values ($questionId,$tagId)
--select all topics that are associated with a tag
select * from topictag, topic where topictag.id_topic = topic.id and topictag.id_tag = $tagId

--selec all questions that are associated with a tag
select * from questiontag,question where question.id=questiontag.id_question and id_tag=$tagId

----Select all information of a question that belongs to a topic with a specific tag
select question.id, karma,short_message, long_message, id_user, question.disable, question.date
from topictag, topic, question 
where topictag.id_topic = topic.id and topictag.id_tag = $tagId and question.id_topic = topictag.id_topic




-----SELECT 

--select all topics
select * from topic

--update karma
update question set karma = $karma where id = $questionId


--update disable on question if owner 
update question set disable=true where id = $question_id and author_id=$user_id

--update karma on answer
update answer set karma = $karma where id = $answerId

--update followtopic of an user
update followtopic set id_topic=$topic where id_user=$userId

--update followquestion of an user
update followquestion set id_question=$question where id_user=$userId

--delete followquestion that an user stop following
delete from followquestion where id_user=$userId and id_question=$questionId

--delete followtopic that an user stop following
delete from followtopic where id_user=$userId and id_topic=$topicId

--update disable reportanswer
update reportanswer set disable= $disableReport where id = $reportId

--update disable reportanswer
update reportquestion set disable= TRUE where id = $reportId

--select all information from an answer that belong to a specific report
select * from reportanswer, answer where id_answer=answer.id and reportanswer.id=$reportId

--select all information from a question that belong to a specific report
select * from reportquestion, question where id_question=question.id and reportquestion.id= $reportId

-------------------------------FRANZA---------------------------------------

------------SELECTS---------------

--SELECT
--My notifications

SELECT id_question, message
FROM notificationanswer
WHERE seen = FALSE AND id_user = $userId
ORDER BY date;


--SELECT 
--Best Answer
--QUE LUXO DE QUE QUERY
--TESTAR xD
SELECT date, karma, message, user
FROM answer
WHERE id_question = $questionID AND disable = FALSE 
	AND karma = (SELECT max(karma) FROM answer WHERE id_question = $questionID);




------------INSERTS-------------------

--INSERT
--New Question
INSERT INTO question (short_message, long_message, author_id , id_topic)
VALUES ($question, $description, $authorID, $topicID);

--INSERT
--New Answer
INSERT INTO answer (message,author_id,id_question)
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





-----------UPDATES-------------------

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
--Disable Question
--ATENCAO!! FAZER TRIGER PARA UPDATE EM question!!! TEM DE SER OWNER, MOD OU ADMIN!!!
UPDATE question
SET disable = $disableQuestion
WHERE id = $questionID;

--UPDATE
--Disable Answer
--ATENCAO!! FAZER TRIGER PARA UPDATE EM FIELD disable DE answer!!! TEM DE SER OWNER, MOD OU ADMIN!!!
UPDATE answer
SET disable = $disableAnswer
WHERE id = $answerID;

--UPDATE
--Disable User
--ATENCAO!! FAZER TRIGER PARA UPDATE EM FIELD disable DE user!!! TEM DE SER O PROPRIO OU ADMIN!!!
--TRIGGER PARA CRIAR NOTIFICACAO SE O USER FOR DISABLED(?????)
UPDATE "user"
SET disable = $disableUser
WHERE id = $userID;

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
--Edit Vote
--ATENÇAO!! FAZER TRIGER PARA UPDATE EM vote!! 
UPDATE vote
SET vote.vote = $vote
WHERE id = $voteID;





