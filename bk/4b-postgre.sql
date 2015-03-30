--
-- PostgreSQL database dump
--

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: entrada; Type: TABLE; Schema: public; Owner: victor; Tablespace: 
--

CREATE TABLE entrada (
    id integer NOT NULL,
    fotoid integer NOT NULL,
    deporte smallint NOT NULL,
    nivel smallint NOT NULL,
    tag3 character varying(40) NOT NULL,
    tag4 character varying(40) NOT NULL,
    tag5 character varying(40) NOT NULL,
    tiempo timestamp without time zone DEFAULT now() NOT NULL,
    comentario character varying(150) DEFAULT NULL::character varying
);


ALTER TABLE public.entrada OWNER TO victor;

--
-- Name: entrada_id_seq; Type: SEQUENCE; Schema: public; Owner: victor
--

CREATE SEQUENCE entrada_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.entrada_id_seq OWNER TO victor;

--
-- Name: entrada_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: victor
--

ALTER SEQUENCE entrada_id_seq OWNED BY entrada.id;


--
-- Name: foto; Type: TABLE; Schema: public; Owner: victor; Tablespace: 
--

CREATE TABLE foto (
    id integer NOT NULL,
    ancho smallint NOT NULL,
    alto smallint NOT NULL,
    tipo smallint NOT NULL,
    CONSTRAINT foto_alto_check CHECK ((alto > 0)),
    CONSTRAINT foto_ancho_check CHECK ((ancho > 0)),
    CONSTRAINT foto_tipo_check CHECK ((tipo > 0))
);


ALTER TABLE public.foto OWNER TO victor;

--
-- Name: id; Type: DEFAULT; Schema: public; Owner: victor
--

ALTER TABLE ONLY entrada ALTER COLUMN id SET DEFAULT nextval('entrada_id_seq'::regclass);


--
-- Data for Name: entrada; Type: TABLE DATA; Schema: public; Owner: victor
--



--
-- Name: entrada_id_seq; Type: SEQUENCE SET; Schema: public; Owner: victor
--

SELECT pg_catalog.setval('entrada_id_seq', 1, false);


--
-- Data for Name: foto; Type: TABLE DATA; Schema: public; Owner: victor
--



--
-- Name: entrada_pkey; Type: CONSTRAINT; Schema: public; Owner: victor; Tablespace: 
--

ALTER TABLE ONLY entrada
    ADD CONSTRAINT entrada_pkey PRIMARY KEY (id);


--
-- Name: foto_pkey; Type: CONSTRAINT; Schema: public; Owner: victor; Tablespace: 
--

ALTER TABLE ONLY foto
    ADD CONSTRAINT foto_pkey PRIMARY KEY (id);


--
-- Name: public; Type: ACL; Schema: -; Owner: victor
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM victor;
GRANT ALL ON SCHEMA public TO victor;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- PostgreSQL database dump complete
--

