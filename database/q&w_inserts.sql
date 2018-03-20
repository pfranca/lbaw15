

# ---- Insert User -----

INSERT INTO "user" (username,email,name,img,bio,disable,type) VALUES 
	('tiagoAlmeida', 'tiago@gmail.com','tiago','img1.png','Im a programer',false,'Normal')

INSERT INTO "user" (username,email,name,img,bio,disable,type) VALUES 
	('DiogoaCunha', 'diogoalmeida@gmail.com','diogo','img2.png','Im fine',false,'Normal')

INSERT INTO "user" (username,email,name,img,bio,disable,type) VALUES 
	('afonsoCruz', 'afonso@gmail.com','afonso','img3.png','Im always ok!!',false,'Normal')

# ---- Insert Topic ------

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


# ---- Insert Question -----

INSERT INTO "question" (karma,short_message,long_message,author_id,id_topic,disable) VALUES 

	(0,'Who is the greatest tennis player of all time?', 'dont know, help me guys!!',5,1,false)


INSERT INTO "question" (karma,short_message,long_message,author_id,id_topic,disable) VALUES 

	(0,'Do you know how to dance? Any club?', 'Ive been trying to learn how to dance, really wanna know guys!!!',6,2,false)


INSERT INTO "question" (karma,short_message,long_message,author_id,id_topic,disable) VALUES (0,'Who is the greatest handball player of all time?', 'I play for almost 5 years and I wanna see some videos on youtube!!',5,1,false)


# ----- Insert Answer -----

INSERT INTO "answer" (karma,message,author_id,id_question,disable) VALUES

	(2,'The greatest tennins player is Roger Federer!!! Check it on google mate.',6,1,false);

INSERT INTO "answer" (karma,message,author_id,id_question,disable) VALUES

	(2,'Roger Federer aahah',4,1,false)

	INSERT INTO "answer" (karma,message,author_id,id_question,disable) VALUES (2,'Yes i know, i am at the dance club in Porto!',6,2,false)

# ----- Insert Vote ------

INSERT INTO "vote" (author_id,id_answer,vote) VALUES
	
	(6,1,true)
	


------------------SELECT------------------ Marta
---select all answers of a specific question
select * from answer, question where question.id='1'and answer.id_question=question.id

---select all information of a specific question
select * from question where question.id='2'


---select all questions from a topic that are followed by a user
select distinct * from question, topic, followtopic 
where topic.id=question.id_topic 
and topic.id=followtopic.id_topic
and followtopic.id_user=4

--select all questions that are followed by the user
select * from question, followquestion
where question.id = followquestion.id_question 
and followquestion.id_user = 4


--select all question that the user created
select * from question where author_id = 5

--FALTA BACKGROUND IMAGE ON DATABASE

--select all user
select * from user

--update user
--update username
update "user" set username = 'tiaguinhoAlmeida' where id =4

--update email
update "user" set email = 'tiagoAlmeida@gmail.com' where id =4

--update name
update "user" set name = 'Tiago Almeida' where id =4

--update img
update "user" set img= 'img51.png' where id =4

--update bio
update "user" set bio= 'i am cool' where id =4


--update username,name bio, image, background?????
update "user" set username = 'tiagoAlmeida', name = 'Tiago Bernardes Almeida', img = 'img3.png', bio='ohhhh', email='tiagobernardes@gmail.com' where id =4


-----SELECT DIOGO

--select all topics
select * from topic

--update karma
update question set karma=1 where id = 1

--update disable on question if owner 
update question set disable=true where id = 1 and author_id=6

