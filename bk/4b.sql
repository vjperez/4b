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
    deporte smallint NOT NULL,
    area smallint NOT NULL,
    tag3 character varying(40) NOT NULL,
    tag4 character varying(40) NOT NULL,
    tag5 character varying(40) NOT NULL,
    tiempo timestamp without time zone DEFAULT now() NOT NULL,
    comentario character varying(150) DEFAULT NULL::character varying,
    ver smallint DEFAULT 1 NOT NULL,
    CONSTRAINT entrada_area_check CHECK ((area >= 0)),
    CONSTRAINT entrada_deporte_check CHECK ((deporte >= 0)),
    CONSTRAINT entrada_id_check CHECK ((id >= 0)),
    CONSTRAINT entrada_ver_check CHECK ((ver >= 0))
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
    entradaid integer NOT NULL,
    CONSTRAINT foto_alto_check CHECK ((alto >= 0)),
    CONSTRAINT foto_ancho_check CHECK ((ancho >= 0)),
    CONSTRAINT foto_entradaid_check CHECK ((entradaid >= 0)),
    CONSTRAINT foto_id_check CHECK ((id >= 0)),
    CONSTRAINT foto_tipo_check CHECK ((tipo >= 0))
);


ALTER TABLE public.foto OWNER TO victor;

--
-- Name: foto_id_seq; Type: SEQUENCE; Schema: public; Owner: victor
--

CREATE SEQUENCE foto_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.foto_id_seq OWNER TO victor;

--
-- Name: foto_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: victor
--

ALTER SEQUENCE foto_id_seq OWNED BY foto.id;


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: victor
--

ALTER TABLE ONLY entrada ALTER COLUMN id SET DEFAULT nextval('entrada_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: victor
--

ALTER TABLE ONLY foto ALTER COLUMN id SET DEFAULT nextval('foto_id_seq'::regclass);


--
-- Data for Name: entrada; Type: TABLE DATA; Schema: public; Owner: victor
--

INSERT INTO entrada VALUES (2, 0, 1, 'Copa 3 pa 3', 'Barrio San Anton', 'Ponce', '2015-02-23 02:54:45', 'El equipo de San Anton pudo ganar hoy su primer juego.', 1);
INSERT INTO entrada VALUES (3, 0, 2, 'Little Lads', 'Aguadilla', 'Isabela', '2015-02-23 02:54:45', 'El equipo 13U de Isabela seguimos invictos. El Lunes pa Ponce.', 1);
INSERT INTO entrada VALUES (4, 0, 3, 'Copa Little Lads del Caribe', 'U15', 'Panama', '2015-03-14 23:30:03', 'Este era uno de los juegos mas dificiles, pero Canovanas representando a Puerto Rico,  pudo ganar.', 1);
INSERT INTO entrada VALUES (5, 1, 0, 'Toques', '11 y 12', 'Yankees', '2015-02-23 02:54:45', 'La practica de toques no es la favorita de ellos, pero aqui en la liga de Arecibo, se practican.', 1);
INSERT INTO entrada VALUES (6, 1, 1, 'Liga Coamo', 'Maratonistas', '5 y 6', '2015-02-23 02:54:45', 'Ready y loco por empezar nuestro nuevo torneo local.', 1);
INSERT INTO entrada VALUES (7, 1, 2, 'Coqui', 'Lares', 'San Sebastian', '2015-02-23 02:54:45', 'Pa la final del Torneo Estatal  Categoria Coqui.', 1);
INSERT INTO entrada VALUES (8, 1, 3, 'Little League World Series', 'Loiza', 'Pre Major', '2015-02-23 02:54:45', 'En el Little League World Series ... hoy le ganamos a Costa Rica .... ahi, pa ti !', 1);
INSERT INTO entrada VALUES (9, 2, 0, 'Manejo y Control de Balon', 'Bayamon Baby Soccer', 'Entrenamiento Individual', '2015-02-23 02:54:45', 'Trabajando con los fundamentos, esta es una inversion que vale la pena.', 1);
INSERT INTO entrada VALUES (10, 2, 1, 'Leones Futbol', 'Torneo de Otono', 'Juego Amistoso', '2015-02-23 02:54:45', 'Durante el segundo juego de nuestra temporada del torneo de otono.', 1);
INSERT INTO entrada VALUES (11, 2, 2, 'WeSOL', 'Asociacion del Oeste de Balompie', 'Copa de Campeones InterLiga', '2015-02-23 02:54:45', 'Hoy se decidio por penales, asi es que me gusta a mi.', 1);
INSERT INTO entrada VALUES (12, 2, 3, 'Copa Internacional de Futbol Infantiil', 'Fajardo Soccer Kids', 'Republica Dominicana', '2015-02-23 02:54:45', 'Buen nivel de futbol en el caribe.  Necesitamos mas iniciativas como esta.', 1);
INSERT INTO entrada VALUES (13, 3, 1, 'Quileando', 'Division A - 12Under', 'Nenas Yaucanas', '2015-02-23 02:54:45', 'Practicando los quileos... , hoy salieron casi todos.', 1);
INSERT INTO entrada VALUES (14, 3, 2, 'Lares', 'Torneo Entre Escuelas', '4to Grado', '2015-02-23 02:54:45', 'El que quiera ganarnos, que siga practicando ...', 1);
INSERT INTO entrada VALUES (15, 3, 3, 'Rio Grande', 'Caguas Criollas', 'CNVPR', '2015-02-23 02:54:45', 'Resultado del juego Division Oro 14U.', 1);
INSERT INTO entrada VALUES (16, 3, 0, 'Cien Fuegos, Cuba', 'Arecibo PR', 'Copa de Voleibol del Caribe', '2015-02-23 02:54:45', 'Pa demostrar, hoy le ganamos a Cuba, ya veras.', 1);
INSERT INTO entrada VALUES (17, 0, 3, 'FIBA Americas', 'U17', '@ Dubai Emiratos Arabes', '2014-08-13 14:00:09', 'Ayer le ganamos a Espana y hoy a Italia, ni el cambio de hora nos detiene.', 0);
INSERT INTO entrada VALUES (19, 3, 0, 'boleo', '8vo grado', 'Copa Municipal entre Escuelas', '2014-08-13 14:02:32', 'Estamos preparandonos pal torneo municipal en el pueblo de Luquillo. Las nenas de 8vo grado de la escuela Hostos empezaron en el verano a practicar.', 0);
INSERT INTO entrada VALUES (21, 0, 3, 'FIBA Americas', 'U17', '@ Dubai Emeiratos Arabes', '2014-08-16 22:48:59', 'Con Egipto, ya en la etapa de cruces, pasamos un susto. GraciAS A Dios GANAMOS y estamos en los mejores 8 equipos U17 del mundo. Quien sera  proximo !', 0);
INSERT INTO entrada VALUES (23, 0, 1, 'Yauco', 'Torneo de Colores', '11 y 12', '2014-08-16 22:52:58', 'Hoy hubo 4 juegos en el torneo local de nuestra liga en Yauco.', 0);
INSERT INTO entrada VALUES (31, 1, 0, 'relajo', 'tripeo', 'diversion', '2015-02-24 17:09:14', 'Jugando y divirtiendose.', 0);
INSERT INTO entrada VALUES (33, 0, 2, 'cat sub 15', 'ponce', 'lares', '2015-02-12 23:44:35', 'Este post lo escribo para dejarles saber que Lares le gano a Ponce, por 12.', 0);
INSERT INTO entrada VALUES (36, 0, 2, 'viso perez', 'diego perez', 'carlos arroyo "el arroyato"', '2015-02-24 17:10:45', 'Aqui frente al Roberto Clemente, despues de una de las practicas pal FIBA 2014.  Vimos al Arroyato y aprovechamos.', 1);
INSERT INTO entrada VALUES (37, 0, 2, 'viso perez', 'diego perez', 'jose juan barea', '2015-02-23 02:55:31', 'viso el gigante con barea el enano', 1);
INSERT INTO entrada VALUES (38, 0, 2, 'viso perez', 'diego perez', 'el felo filiberto rivera', '2015-02-24 16:27:55', 'los nenes con filiberto rivera, tocayo de felo su abuelo', 1);
INSERT INTO entrada VALUES (18, 2, 2, 'Rincon', 'Baby Soccer 8U', 'Leones vs Lobos', '2015-02-23 03:26:16', 'Resultado de un  juego de soccer en Rincon.', 1);
INSERT INTO entrada VALUES (20, 3, 0, 'bompeo', 'Jayuya', 'Liga Jayuyana', '2015-02-22 23:35:19', NULL, 0);
INSERT INTO entrada VALUES (22, 1, 0, 'bateo', 'fundamentos', 'toque', '2015-02-22 23:35:19', NULL, 0);
INSERT INTO entrada VALUES (24, 2, 2, 'U15', 'Wesol', 'Sosol', '2015-02-22 23:35:19', NULL, 0);
INSERT INTO entrada VALUES (25, 0, 0, 'donqueo', 'bebe', 'en pampers', '2015-02-22 23:35:19', NULL, 0);
INSERT INTO entrada VALUES (26, 2, 0, 'femenino', 'fogueo', 'en la escuela', '2015-02-22 23:35:19', NULL, 0);
INSERT INTO entrada VALUES (27, 2, 0, 'practicando', 'en el patio', 'manejo balon', '2015-02-22 23:35:19', NULL, 0);
INSERT INTO entrada VALUES (28, 2, 0, 'manejo balon', 'en grupo', 'conos', '2015-02-22 23:35:19', NULL, 0);
INSERT INTO entrada VALUES (29, 2, 0, 'pre escolar', 'edad 5', 'controlando balon', '2015-02-22 23:35:19', NULL, 0);
INSERT INTO entrada VALUES (30, 1, 0, 'fundamentos', 'fieldeo', 'coqui', '2015-02-22 23:35:19', NULL, 0);
INSERT INTO entrada VALUES (32, 0, 0, 'dribleo', 'Mayaguez', 'clase de universidad', '2015-02-22 23:35:19', NULL, 0);
INSERT INTO entrada VALUES (34, 0, 2, 'Hostos Mayaguez', 'Benites Canovanas', 'Cat 16 under', '2015-02-22 23:35:19', NULL, 0);
INSERT INTO entrada VALUES (35, 0, 2, 'HACKER TEST :: Santa Margarita Caguas', 'Perpetuo Soccoro Maricao', 'Sub 16', '2015-02-27 20:07:25', NULL, 0);
INSERT INTO entrada VALUES (1, 0, 0, 'donqueando', 'Carolina', 'en el caserio', '2015-04-02 07:21:55.75336', 'Practicando me sale este donqueo, en el juego no es tan facil.', 1);


--
-- Name: entrada_id_seq; Type: SEQUENCE SET; Schema: public; Owner: victor
--

SELECT pg_catalog.setval('entrada_id_seq', 38, true);


--
-- Data for Name: foto; Type: TABLE DATA; Schema: public; Owner: victor
--

INSERT INTO foto VALUES (1, 1080, 810, 2, 1);
INSERT INTO foto VALUES (2, 615, 312, 2, 2);
INSERT INTO foto VALUES (3, 700, 464, 2, 3);
INSERT INTO foto VALUES (4, 950, 633, 2, 4);
INSERT INTO foto VALUES (5, 300, 295, 2, 5);
INSERT INTO foto VALUES (6, 559, 480, 2, 6);
INSERT INTO foto VALUES (7, 492, 328, 2, 7);
INSERT INTO foto VALUES (8, 1000, 666, 2, 8);
INSERT INTO foto VALUES (9, 259, 194, 2, 9);
INSERT INTO foto VALUES (10, 450, 408, 2, 10);
INSERT INTO foto VALUES (11, 600, 400, 2, 11);
INSERT INTO foto VALUES (12, 400, 294, 2, 12);
INSERT INTO foto VALUES (13, 698, 850, 2, 13);
INSERT INTO foto VALUES (14, 950, 827, 2, 14);
INSERT INTO foto VALUES (15, 640, 461, 2, 15);
INSERT INTO foto VALUES (16, 662, 700, 2, 16);
INSERT INTO foto VALUES (17, 1000, 667, 2, 17);
INSERT INTO foto VALUES (18, 950, 516, 2, 19);
INSERT INTO foto VALUES (19, 950, 516, 2, 20);
INSERT INTO foto VALUES (20, 1000, 667, 2, 21);
INSERT INTO foto VALUES (21, 312, 269, 2, 22);
INSERT INTO foto VALUES (22, 614, 554, 2, 23);
INSERT INTO foto VALUES (23, 640, 396, 2, 24);
INSERT INTO foto VALUES (24, 880, 660, 3, 25);
INSERT INTO foto VALUES (25, 459, 391, 2, 26);
INSERT INTO foto VALUES (26, 300, 168, 2, 27);
INSERT INTO foto VALUES (27, 1280, 720, 2, 28);
INSERT INTO foto VALUES (28, 300, 400, 2, 29);
INSERT INTO foto VALUES (29, 276, 182, 2, 30);
INSERT INTO foto VALUES (30, 1067, 1600, 2, 31);
INSERT INTO foto VALUES (31, 250, 202, 2, 32);
INSERT INTO foto VALUES (32, 800, 622, 2, 34);
INSERT INTO foto VALUES (33, 379, 284, 2, 35);
INSERT INTO foto VALUES (34, 3264, 2448, 2, 36);
INSERT INTO foto VALUES (35, 3264, 2448, 2, 37);
INSERT INTO foto VALUES (36, 3264, 2448, 2, 38);


--
-- Name: foto_id_seq; Type: SEQUENCE SET; Schema: public; Owner: victor
--

SELECT pg_catalog.setval('foto_id_seq', 36, true);


--
-- Name: entrada_pkey; Type: CONSTRAINT; Schema: public; Owner: victor; Tablespace: 
--

ALTER TABLE ONLY entrada
    ADD CONSTRAINT entrada_pkey PRIMARY KEY (id);


--
-- Name: foto_entradaid_key; Type: CONSTRAINT; Schema: public; Owner: victor; Tablespace: 
--

ALTER TABLE ONLY foto
    ADD CONSTRAINT foto_entradaid_key UNIQUE (entradaid);


--
-- Name: foto_pkey; Type: CONSTRAINT; Schema: public; Owner: victor; Tablespace: 
--

ALTER TABLE ONLY foto
    ADD CONSTRAINT foto_pkey PRIMARY KEY (id);


--
-- Name: foto_entradaid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: victor
--

ALTER TABLE ONLY foto
    ADD CONSTRAINT foto_entradaid_fkey FOREIGN KEY (entradaid) REFERENCES entrada(id) ON DELETE CASCADE;


--
-- Name: public; Type: ACL; Schema: -; Owner: victor
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM victor;
GRANT ALL ON SCHEMA public TO victor;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- PostgreSQL database dump complete
--

