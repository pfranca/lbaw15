CREATE TABLE answer (
    id integer NOT NULL,
    date timestamp without time zone DEFAULT now() NOT NULL,
    karma integer DEFAULT 0 NOT NULL,
    message text NOT NULL,
    id_user integer,
    id_question integer
);


CREATE TABLE followquestion (
    id_user integer NOT NULL,
    id_question integer NOT NULL
);


CREATE TABLE followtopic (
    id_user integer NOT NULL,
    id_topic integer NOT NULL
);



CREATE TABLE notification (
    id integer NOT NULL,
    id_user integer NOT NULL,
    id_question integer
);



CREATE TABLE question (
    id integer NOT NULL,
    date timestamp with time zone DEFAULT now() NOT NULL,
    karma integer DEFAULT 0 NOT NULL,
    short_message text NOT NULL,
    long_message text,
    id_user integer,
    id_topic integer
);


CREATE TABLE report (
    id integer NOT NULL,
    reason text NOT NULL,
    id_user integer,
    id_answer integer,
    id_question integer,
    id_notification integer,
    CONSTRAINT only_one CHECK ((((id_answer IS NULL) AND (id_question IS NOT NULL)) OR ((id_answer IS NOT NULL) AND (id_question IS NULL))))
);



CREATE TABLE topic (
    id integer NOT NULL,
    name character varying(30) NOT NULL,
    img text NOT NULL
);



CREATE TABLE "user" (
    id integer NOT NULL,
    username character varying(30) NOT NULL,
    email text NOT NULL,
    name text NOT NULL,
    img text NOT NULL,
    bio text,
    disable boolean NOT NULL,
    type text NOT NULL,
    CONSTRAINT type CHECK ((type = ANY (ARRAY['Normal'::text, 'Moderator'::text, 'Administrator'::text])))
);


CREATE TABLE vote (
    id integer NOT NULL,
    id_user integer,
    vote integer NOT NULL,
    id_answer integer,
    id_question integer,
    CONSTRAINT "only one" CHECK ((((id_answer IS NULL) AND (id_question IS NOT NULL)) OR ((id_answer IS NOT NULL) AND (id_question IS NULL)))),
    CONSTRAINT vote_vote_check CHECK (((vote >= (-1)) AND (vote <= 1)))
);


ALTER TABLE vote OWNER TO lbaw1715;


ALTER TABLE vote_id_seq OWNER TO lbaw1715;


ALTER TABLE ONLY answer ALTER COLUMN id SET DEFAULT nextval('answer_id_seq'::regclass);


ALTER TABLE ONLY notification ALTER COLUMN id SET DEFAULT nextval('notification_id_seq'::regclass);


ALTER TABLE ONLY question ALTER COLUMN id SET DEFAULT nextval('question_id_seq'::regclass);


ALTER TABLE ONLY report ALTER COLUMN id SET DEFAULT nextval('report_id_seq'::regclass);


ALTER TABLE ONLY topic ALTER COLUMN id SET DEFAULT nextval('topic_id_seq'::regclass);


ALTER TABLE ONLY "user" ALTER COLUMN id SET DEFAULT nextval('user_id_seq'::regclass);


ALTER TABLE ONLY vote ALTER COLUMN id SET DEFAULT nextval('vote_id_seq'::regclass);



ALTER TABLE ONLY answer
    ADD CONSTRAINT answer_pkey PRIMARY KEY (id);



ALTER TABLE ONLY followquestion
    ADD CONSTRAINT followquestion_pkey PRIMARY KEY (id_user, id_question);



ALTER TABLE ONLY followtopic
    ADD CONSTRAINT followtopic_pkey PRIMARY KEY (id_user, id_topic);


ALTER TABLE ONLY notification
    ADD CONSTRAINT notification_pkey PRIMARY KEY (id);

ALTER TABLE ONLY question
    ADD CONSTRAINT question_pkey PRIMARY KEY (id);


ALTER TABLE ONLY report
    ADD CONSTRAINT report_pkey PRIMARY KEY (id);


ALTER TABLE ONLY topic
    ADD CONSTRAINT topic_name_key UNIQUE (name);


ALTER TABLE ONLY topic
    ADD CONSTRAINT topic_pkey PRIMARY KEY (id);


ALTER TABLE ONLY "user"
    ADD CONSTRAINT user_email_key UNIQUE (email);



ALTER TABLE ONLY "user"
    ADD CONSTRAINT user_pkey PRIMARY KEY (id);

ALTER TABLE ONLY "user"
    ADD CONSTRAINT user_username_key UNIQUE (username);


ALTER TABLE ONLY vote
    ADD CONSTRAINT vote_pkey PRIMARY KEY (id);


ALTER TABLE ONLY answer
    ADD CONSTRAINT answer_id_question_fkey FOREIGN KEY (id_question) REFERENCES question(id);

ALTER TABLE ONLY answer
    ADD CONSTRAINT answer_id_user_fkey FOREIGN KEY (id_user) REFERENCES "user"(id);


ALTER TABLE ONLY followquestion
    ADD CONSTRAINT followquestion_id_question_fkey FOREIGN KEY (id_question) REFERENCES question(id);



ALTER TABLE ONLY followquestion
    ADD CONSTRAINT followquestion_id_user_fkey FOREIGN KEY (id_user) REFERENCES "user"(id);


ALTER TABLE ONLY followtopic
    ADD CONSTRAINT followtopic_id_topic_fkey FOREIGN KEY (id_topic) REFERENCES topic(id);


ALTER TABLE ONLY followtopic
    ADD CONSTRAINT followtopic_id_user_fkey FOREIGN KEY (id_user) REFERENCES "user"(id);


ALTER TABLE ONLY notification
    ADD CONSTRAINT notification_id_question_fkey FOREIGN KEY (id_question) REFERENCES question(id);


ALTER TABLE ONLY notification
    ADD CONSTRAINT notification_id_user_fkey FOREIGN KEY (id_user) REFERENCES "user"(id);


ALTER TABLE ONLY question
    ADD CONSTRAINT question_id_topic_fkey FOREIGN KEY (id_topic) REFERENCES topic(id);



ALTER TABLE ONLY question
    ADD CONSTRAINT question_id_user_fkey FOREIGN KEY (id_user) REFERENCES "user"(id);


ALTER TABLE ONLY report
    ADD CONSTRAINT report_id_answer_fkey FOREIGN KEY (id_answer) REFERENCES answer(id);


ALTER TABLE ONLY report
    ADD CONSTRAINT report_id_notification_fkey FOREIGN KEY (id_notification) REFERENCES notification(id);


ALTER TABLE ONLY report
    ADD CONSTRAINT report_id_question_fkey FOREIGN KEY (id_question) REFERENCES question(id);

ALTER TABLE ONLY report
    ADD CONSTRAINT report_id_user_fkey FOREIGN KEY (id_user) REFERENCES "user"(id);



ALTER TABLE ONLY vote
    ADD CONSTRAINT vote_id_answer_fkey FOREIGN KEY (id_answer) REFERENCES answer(id);


ALTER TABLE ONLY vote
    ADD CONSTRAINT vote_id_question_fkey FOREIGN KEY (id_question) REFERENCES question(id);


ALTER TABLE ONLY vote
    ADD CONSTRAINT vote_id_user_fkey FOREIGN KEY (id_user) REFERENCES "user"(id);

