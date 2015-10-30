--
-- PostgreSQL database dump
--

SET statement_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = off;
SET check_function_bodies = false;
SET client_min_messages = warning;
SET escape_string_warning = off;

--
-- Name: topic; Type: SCHEMA; Schema: -; Owner: -
--

CREATE SCHEMA topic;


SET search_path = topic, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: top_topic; Type: TABLE; Schema: topic; Owner: -; Tablespace: 
--

CREATE TABLE top_topic (
    sn uuid NOT NULL,
    topic_sn uuid
);


--
-- Name: TABLE top_topic; Type: COMMENT; Schema: topic; Owner: -
--

COMMENT ON TABLE top_topic IS '置顶帖子';


--
-- Name: topic; Type: TABLE; Schema: topic; Owner: -; Tablespace: 
--

CREATE TABLE topic (
    sn uuid NOT NULL,
    belong_to uuid,
    passport_sn uuid,
    passport_email character varying(30),
    create_time timestamp without time zone DEFAULT now() NOT NULL,
    content text NOT NULL,
    is_deleted integer DEFAULT 0 NOT NULL,
    is_unread integer DEFAULT 1 NOT NULL,
    tags character varying(10)[],
    is_locked integer DEFAULT 0 NOT NULL,
    reply_count integer DEFAULT 0 NOT NULL,
    subject character varying(100) NOT NULL,
    from_admin integer DEFAULT 0 NOT NULL
);


--
-- Name: COLUMN topic.belong_to; Type: COMMENT; Schema: topic; Owner: -
--

COMMENT ON COLUMN topic.belong_to IS '父贴编号';


--
-- Name: COLUMN topic.passport_sn; Type: COMMENT; Schema: topic; Owner: -
--

COMMENT ON COLUMN topic.passport_sn IS '发贴人';


--
-- Name: COLUMN topic.content; Type: COMMENT; Schema: topic; Owner: -
--

COMMENT ON COLUMN topic.content IS '内容';


--
-- Name: COLUMN topic.is_deleted; Type: COMMENT; Schema: topic; Owner: -
--

COMMENT ON COLUMN topic.is_deleted IS '标记删除';


--
-- Name: COLUMN topic.is_unread; Type: COMMENT; Schema: topic; Owner: -
--

COMMENT ON COLUMN topic.is_unread IS '管理员未读标记';


--
-- Name: COLUMN topic.tags; Type: COMMENT; Schema: topic; Owner: -
--

COMMENT ON COLUMN topic.tags IS '标签列表';


--
-- Name: COLUMN topic.is_locked; Type: COMMENT; Schema: topic; Owner: -
--

COMMENT ON COLUMN topic.is_locked IS '标记锁定';


--
-- Name: COLUMN topic.reply_count; Type: COMMENT; Schema: topic; Owner: -
--

COMMENT ON COLUMN topic.reply_count IS '回帖数量';


--
-- Name: COLUMN topic.subject; Type: COMMENT; Schema: topic; Owner: -
--

COMMENT ON COLUMN topic.subject IS '标题';


--
-- Name: COLUMN topic.from_admin; Type: COMMENT; Schema: topic; Owner: -
--

COMMENT ON COLUMN topic.from_admin IS '来自管理员';


--
-- Name: topic_notes; Type: TABLE; Schema: topic; Owner: -; Tablespace: 
--

CREATE TABLE topic_notes (
    sn uuid NOT NULL,
    topic_sn uuid NOT NULL,
    content character varying(255) NOT NULL,
    create_time timestamp without time zone DEFAULT now() NOT NULL
);


--
-- Name: COLUMN topic_notes.topic_sn; Type: COMMENT; Schema: topic; Owner: -
--

COMMENT ON COLUMN topic_notes.topic_sn IS '帖子编号';


--
-- Name: COLUMN topic_notes.content; Type: COMMENT; Schema: topic; Owner: -
--

COMMENT ON COLUMN topic_notes.content IS '备注内容';


--
-- Name: top_topic_pkey; Type: CONSTRAINT; Schema: topic; Owner: -; Tablespace: 
--

ALTER TABLE ONLY top_topic
    ADD CONSTRAINT top_topic_pkey PRIMARY KEY (sn);


--
-- Name: topic_notes_pkey; Type: CONSTRAINT; Schema: topic; Owner: -; Tablespace: 
--

ALTER TABLE ONLY topic_notes
    ADD CONSTRAINT topic_notes_pkey PRIMARY KEY (sn);


--
-- Name: topic_pkey; Type: CONSTRAINT; Schema: topic; Owner: -; Tablespace: 
--

ALTER TABLE ONLY topic
    ADD CONSTRAINT topic_pkey PRIMARY KEY (sn);


--
-- Name: ix_topic_belong_to; Type: INDEX; Schema: topic; Owner: -; Tablespace: 
--

CREATE INDEX ix_topic_belong_to ON topic USING btree (belong_to);


--
-- Name: ix_topic_passport_sn; Type: INDEX; Schema: topic; Owner: -; Tablespace: 
--

CREATE INDEX ix_topic_passport_sn ON topic USING btree (passport_sn);


--
-- Name: ix_topic_tags; Type: INDEX; Schema: topic; Owner: -; Tablespace: 
--

CREATE INDEX ix_topic_tags ON topic USING btree (tags);


--
-- Name: ix_tp_no_topic_sn; Type: INDEX; Schema: topic; Owner: -; Tablespace: 
--

CREATE INDEX ix_tp_no_topic_sn ON topic_notes USING btree (topic_sn);


--
-- PostgreSQL database dump complete
--

