CREATE TABLE user(
  id SERIAL PRIMARY KEY,
  username VARCHAR(30) NOT NULL UNIQUE,
  email TEXT NOT NULL UNIQUE,
  name TEXT NOT NULL,
  img TEXT NOT NULL,
  bio TEXT,
  disable NOT NULL,
  type TEXT NOT NULL CHECK ((type=ANY(ARRAY['NORMAL'::text, 'MOD'::text, 'ADMIN'::text])))
);

CREATE TABLE topic(
  id SERIAL PRIMARY KEY,
  name VARCHAR(30) NOT NULL UNIQUE,
  img TEXT NOT NULL
);

CREATE TABLE question(
  id SERIAL PRIMARY KEY,
  "date" TIMESTAMP DEFAULT CURRENT TIMESTAMP NOT NULL,
  karma INTEGER NOT NULL DEFAULT 0,
  short_message TEXT NOT NULL,
  long_message TEXT ,
  id_user FOREIGN KEY REFERENCES user(id),
  id_topic FOREIGN KEY REFERENCES topic(id)
);

CREATE TABLE answer(
  id SERIAL PRIMARY KEY,
  "date" TIMESTAMP DEFAULT now() NOT NULL,
  karma INTEGER NOT NULL DEFAULT 0,
  message TEXT NOT NULL,
  id_user FOREIGN KEY REFERENCES user(id),
  id_question FOREIGN KEY REFERENCES question(id)
);

CREATE TABLE report(
  id SERIAL PRIMARY KEY,
  reason TEXT NOT NULL,
  id_user FOREIGN KEY REFERENCES user(id),
  id_answer REFERENCES answer(id),
  id_question REFERENCES question(id),
  CONSTRAINT only_one CHECK (id_answer IS NULL AND id_question IS NOT NULL) OR (id_answer IS NOT NULL AND id_question IS NULL)
);

CREATE TABLE followTopic(
  id_user FOREIGN KEY REFERENCES user(id),
  id_topic FOREIGN KEY REFERENCES topic(id),
  PRIMARY KEY(id_user, id_topic)
);

CREATE TABLE followQuestion(
  id_user FOREIGN KEY REFERENCES user(id),
  id_question FOREIGN KEY REFERENCES question(id),
  PRIMARY KEY(id_user, id_question)
);
