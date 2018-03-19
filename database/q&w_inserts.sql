

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


INSERT INTO "question" (karma,short_message,long_message,author_id,id_topic,disable) VALUES 

	(0,'Who is the greatest tennis player of all time?', 'dont know, help me guys!!',5,1,false)


# ----- Insert Answer -----

INSERT INTO "answer" (karma,message,author_id,id_question,disable) VALUES

	(2,'The greatest tennins player is Roger Federer!!! Check it on google mate.',6,1,false);

INSERT INTO "answer" (karma,message,author_id,id_question,disable) VALUES

	(2,'Roger Federer aahah',4,1,false)

# ----- Insert Vote ------

INSERT INTO "vote" (author_id,id_answer,vote) VALUES
	
	(6,1,true)
	