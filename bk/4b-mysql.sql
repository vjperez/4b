-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb2+deb7u1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 28, 2015 at 12:02 PM
-- Server version: 5.5.41
-- PHP Version: 5.4.36-0+deb7u3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `4bolas`
--

-- --------------------------------------------------------

--
-- Table structure for table `foto`
--

CREATE TABLE IF NOT EXISTS `foto` (
  `id` mediumint(8) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `ancho` smallint(4) unsigned NOT NULL,
  `alto` smallint(4) unsigned NOT NULL,
  `tipo` tinyint(3) unsigned NOT NULL,
  `fotoentradaid` mediumint(8) unsigned zerofill NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_fotoentrada` (`fotoentradaid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=51 ;

--
-- Dumping data for table `foto`
--

INSERT INTO `foto` (`id`, `ancho`, `alto`, `tipo`, `fotoentradaid`) VALUES
(00000001, 1080, 810, 2, 00000001),
(00000002, 615, 312, 2, 00000002),
(00000003, 700, 464, 2, 00000003),
(00000004, 950, 633, 2, 00000004),
(00000005, 300, 295, 2, 00000005),
(00000006, 559, 480, 2, 00000006),
(00000007, 492, 328, 2, 00000007),
(00000008, 1000, 666, 2, 00000008),
(00000009, 259, 194, 2, 00000009),
(00000010, 450, 408, 2, 00000010),
(00000011, 600, 400, 2, 00000011),
(00000012, 400, 294, 2, 00000012),
(00000013, 698, 850, 2, 00000013),
(00000014, 950, 827, 2, 00000014),
(00000015, 640, 461, 2, 00000015),
(00000016, 662, 700, 2, 00000016),
(00000017, 1000, 667, 2, 00000017),
(00000018, 950, 516, 2, 00000019),
(00000019, 950, 516, 2, 00000020),
(00000020, 1000, 667, 2, 00000021),
(00000021, 312, 269, 2, 00000022),
(00000022, 614, 554, 2, 00000023),
(00000023, 640, 396, 2, 00000024),
(00000024, 880, 660, 3, 00000025),
(00000025, 459, 391, 2, 00000026),
(00000026, 300, 168, 2, 00000027),
(00000027, 1280, 720, 2, 00000028),
(00000028, 300, 400, 2, 00000029),
(00000029, 276, 182, 2, 00000030),
(00000030, 1067, 1600, 2, 00000031),
(00000031, 250, 202, 2, 00000032),
(00000032, 800, 622, 2, 00000034),
(00000033, 379, 284, 2, 00000035),
(00000034, 3264, 2448, 2, 00000036),
(00000035, 3264, 2448, 2, 00000037),
(00000036, 3264, 2448, 2, 00000038);

-- --------------------------------------------------------

--
-- Table structure for table `fotoentrada`
--

CREATE TABLE IF NOT EXISTS `fotoentrada` (
  `id` mediumint(8) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `deporte` tinyint(3) unsigned NOT NULL,
  `area` tinyint(3) unsigned NOT NULL,
  `tag3` varchar(40) NOT NULL,
  `tag4` varchar(40) NOT NULL,
  `tag5` varchar(40) NOT NULL,
  `tiempo` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `comentario` varchar(150) DEFAULT NULL,
  `ver` tinyint(3) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `fotoentrada`
--

INSERT INTO `fotoentrada` (`id`, `deporte`, `area`, `tag3`, `tag4`, `tag5`, `tiempo`, `comentario`, `ver`) VALUES
(00000001, 0, 0, 'donqueando', 'Carolina', 'en el caserio', '2015-02-24 19:32:44', 'Practicando me sale este donqueo, en el juego no es tan facil.', 1),
(00000002, 0, 1, 'Copa 3 pa 3', 'Barrio San Anton', 'Ponce', '2015-02-23 02:54:45', 'El equipo de San Anton pudo ganar hoy su primer juego.', 1),
(00000003, 0, 2, 'Little Lads', 'Aguadilla', 'Isabela', '2015-02-23 02:54:45', 'El equipo 13U de Isabela seguimos invictos. El Lunes pa Ponce.', 1),
(00000004, 0, 3, 'Copa Little Lads del Caribe', 'U15', 'Panama', '2015-03-14 23:30:03', 'Este era uno de los juegos mas dificiles, pero Canovanas representando a Puerto Rico,  pudo ganar.', 1),
(00000005, 1, 0, 'Toques', '11 y 12', 'Yankees', '2015-02-23 02:54:45', 'La practica de toques no es la favorita de ellos, pero aqui en la liga de Arecibo, se practican.', 1),
(00000006, 1, 1, 'Liga Coamo', 'Maratonistas', '5 y 6', '2015-02-23 02:54:45', 'Ready y loco por empezar nuestro nuevo torneo local.', 1),
(00000007, 1, 2, 'Coqui', 'Lares', 'San Sebastian', '2015-02-23 02:54:45', 'Pa la final del Torneo Estatal  Categoria Coqui.', 1),
(00000008, 1, 3, 'Little League World Series', 'Loiza', 'Pre Major', '2015-02-23 02:54:45', 'En el Little League World Series ... hoy le ganamos a Costa Rica .... ahi, pa ti !', 1),
(00000009, 2, 0, 'Manejo y Control de Balon', 'Bayamon Baby Soccer', 'Entrenamiento Individual', '2015-02-23 02:54:45', 'Trabajando con los fundamentos, esta es una inversion que vale la pena.', 1),
(00000010, 2, 1, 'Leones Futbol', 'Torneo de Otono', 'Juego Amistoso', '2015-02-23 02:54:45', 'Durante el segundo juego de nuestra temporada del torneo de otono.', 1),
(00000011, 2, 2, 'WeSOL', 'Asociacion del Oeste de Balompie', 'Copa de Campeones InterLiga', '2015-02-23 02:54:45', 'Hoy se decidio por penales, asi es que me gusta a mi.', 1),
(00000012, 2, 3, 'Copa Internacional de Futbol Infantiil', 'Fajardo Soccer Kids', 'Republica Dominicana', '2015-02-23 02:54:45', 'Buen nivel de futbol en el caribe.  Necesitamos mas iniciativas como esta.', 1),
(00000013, 3, 1, 'Quileando', 'Division A - 12Under', 'Nenas Yaucanas', '2015-02-23 02:54:45', 'Practicando los quileos... , hoy salieron casi todos.', 1),
(00000014, 3, 2, 'Lares', 'Torneo Entre Escuelas', '4to Grado', '2015-02-23 02:54:45', 'El que quiera ganarnos, que siga practicando ...', 1),
(00000015, 3, 3, 'Rio Grande', 'Caguas Criollas', 'CNVPR', '2015-02-23 02:54:45', 'Resultado del juego Division Oro 14U.', 1),
(00000016, 3, 0, 'Cien Fuegos, Cuba', 'Arecibo PR', 'Copa de Voleibol del Caribe', '2015-02-23 02:54:45', 'Pa demostrar, hoy le ganamos a Cuba, ya veras.', 1),
(00000017, 0, 3, 'FIBA Americas', 'U17', '@ Dubai Emiratos Arabes', '2014-08-13 14:00:09', 'Ayer le ganamos a Espana y hoy a Italia, ni el cambio de hora nos detiene.', 0),
(00000019, 3, 0, 'boleo', '8vo grado', 'Copa Municipal entre Escuelas', '2014-08-13 14:02:32', 'Estamos preparandonos pal torneo municipal en el pueblo de Luquillo. Las nenas de 8vo grado de la escuela Hostos empezaron en el verano a practicar.', 0),
(00000020, 3, 0, 'bompeo', 'Jayuya', 'Liga Jayuyana', '2015-02-22 23:35:19', '', 0),
(00000021, 0, 3, 'FIBA Americas', 'U17', '@ Dubai Emeiratos Arabes', '2014-08-16 22:48:59', 'Con Egipto, ya en la etapa de cruces, pasamos un susto. GraciAS A Dios GANAMOS y estamos en los mejores 8 equipos U17 del mundo. Quien sera  proximo !', 0),
(00000022, 1, 0, 'bateo', 'fundamentos', 'toque', '2015-02-22 23:35:19', '', 0),
(00000023, 0, 1, 'Yauco', 'Torneo de Colores', '11 y 12', '2014-08-16 22:52:58', 'Hoy hubo 4 juegos en el torneo local de nuestra liga en Yauco.', 0),
(00000024, 2, 2, 'U15', 'Wesol', 'Sosol', '2015-02-22 23:35:19', '', 0),
(00000025, 0, 0, 'donqueo', 'bebe', 'en pampers', '2015-02-22 23:35:19', '', 0),
(00000026, 2, 0, 'femenino', 'fogueo', 'en la escuela', '2015-02-22 23:35:19', '', 0),
(00000027, 2, 0, 'practicando', 'en el patio', 'manejo balon', '2015-02-22 23:35:19', '', 0),
(00000028, 2, 0, 'manejo balon', 'en grupo', 'conos', '2015-02-22 23:35:19', '', 0),
(00000029, 2, 0, 'pre escolar', 'edad 5', 'controlando balon', '2015-02-22 23:35:19', '', 0),
(00000030, 1, 0, 'fundamentos', 'fieldeo', 'coqui', '2015-02-22 23:35:19', '', 0),
(00000031, 1, 0, 'relajo', 'tripeo', 'diversion', '2015-02-24 17:09:14', 'Jugando y divirtiendose.', 0),
(00000032, 0, 0, 'dribleo', 'Mayaguez', 'clase de universidad', '2015-02-22 23:35:19', '', 0),
(00000033, 0, 2, 'cat sub 15', 'ponce', 'lares', '2015-02-12 23:44:35', 'Este post lo escribo para dejarles saber que Lares le gano a Ponce, por 12.', 0),
(00000034, 0, 2, 'Hostos Mayaguez', 'Benites Canovanas', 'Cat 16 under', '2015-02-22 23:35:19', '', 0),
(00000035, 0, 2, 'HACKER TEST :: Santa Margarita Caguas', 'Perpetuo Soccoro Maricao', 'Sub 16', '2015-02-27 20:07:25', '', 10),
(00000036, 0, 2, 'viso perez', 'diego perez', 'carlos arroyo "el arroyato"', '2015-02-24 17:10:45', 'Aqui frente al Roberto Clemente, despues de una de las practicas pal FIBA 2014.  Vimos al Arroyato y aprovechamos.', 1),
(00000037, 0, 2, 'viso perez', 'diego perez', 'jose juan barea', '2015-02-23 02:55:31', 'viso el gigante con barea el enano', 1),
(00000038, 0, 2, 'viso perez', 'diego perez', 'el felo filiberto rivera', '2015-02-24 16:27:55', 'los nenes con filiberto rivera, tocayo de felo su abuelo', 1),
(00000018, 2, 2, 'Rincon', 'Baby Soccer 8U', 'Leones vs Lobos', '2015-02-23 03:26:16', 'Resultado de un  juego de soccer en Rincon.', 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `foto`
--
ALTER TABLE `foto`
  ADD CONSTRAINT `FK_fotoentrada` FOREIGN KEY (`fotoentradaid`) REFERENCES `fotoentrada` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
