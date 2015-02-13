-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2015 at 02:30 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
(00000018, 950, 516, 2, 00000020),
(00000019, 950, 516, 2, 00000019),
(00000020, 1000, 667, 2, 00000021),
(00000021, 880, 660, 3, 00000025),
(00000022, 614, 554, 2, 00000023),
(00000023, 640, 396, 2, 00000024),
(00000024, 459, 391, 2, 00000026),
(00000025, 300, 168, 2, 00000027),
(00000026, 1280, 720, 2, 00000028),
(00000027, 300, 400, 2, 00000029),
(00000033, 276, 182, 2, 00000030),
(00000034, 312, 269, 2, 00000022),
(00000035, 1067, 1600, 2, 00000031),
(00000037, 250, 202, 2, 00000032),
(00000044, 800, 622, 2, 00000034),
(00000045, 379, 284, 2, 00000035),
(00000048, 3264, 2448, 2, 00000036),
(00000049, 3264, 2448, 2, 00000037),
(00000050, 3264, 2448, 2, 00000038);

-- --------------------------------------------------------

--
-- Table structure for table `fotoentrada`
--

CREATE TABLE IF NOT EXISTS `fotoentrada` (
  `id` mediumint(8) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `deporte` tinyint(3) unsigned NOT NULL,
  `nivel` tinyint(3) unsigned NOT NULL,
  `tag3` varchar(40) NOT NULL,
  `tag4` varchar(40) NOT NULL,
  `tag5` varchar(40) NOT NULL,
  `tiempo` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `comentario` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `fotoentrada`
--

INSERT INTO `fotoentrada` (`id`, `deporte`, `nivel`, `tag3`, `tag4`, `tag5`, `tiempo`, `comentario`) VALUES
(00000001, 0, 0, 'donqueando', 'Mayaguez', 'Colegio', '2014-08-13 12:39:22', 'Practicando me sale este donqueo, en el juego no es tan facil.'),
(00000002, 0, 1, 'Copa 3 pa 3', 'Barrio Pozas', 'Moca', '2014-08-13 13:08:08', 'El equipo de Pozas pudo ganar hoy su primer juego.'),
(00000003, 0, 2, 'Little Lads', 'Canovanas', 'Juncos', '2014-08-13 13:11:09', 'El equipo 13U de Canovanas seguimos invictos. El Lunes pa Ponce.'),
(00000004, 0, 3, 'Copa Little Lads del Caribe', 'U15', 'Panama', '2014-08-13 13:14:20', 'Este era uno de los juegos mas dificiles, y pudimos ganar.'),
(00000005, 1, 0, 'Toques', '11 y 12', 'Yankees', '2014-08-13 13:18:54', 'La practica de toques no es la favorita de ellos, pero es importante.'),
(00000006, 1, 1, 'Liga Samaritana', 'San Lorenzo', '5 y 6', '2014-08-13 13:22:34', 'Ready y loco por empezar nuestro nuevo torneo local.'),
(00000007, 1, 2, 'Coqui', 'Humacao', 'Caguas', '2014-08-13 13:25:41', 'Pa la final del Torneo Estatal  Categoria Coqui.'),
(00000008, 1, 3, 'Little League World Series', 'Sabana Grande', 'Pre Major', '2014-08-13 13:25:54', 'Vamos pal Little League World Series ... ahi, pa ti !'),
(00000009, 2, 0, 'Manejo y Control de Balon', 'Coordinacion', 'Entrenamiento Individual', '2014-08-13 13:28:34', 'Trabajando con los fundamentos, esta es una inversion que vale la pena.'),
(00000010, 2, 1, 'Leones Futbol', 'Torneo de Otono', 'Juego Amistoso', '2014-08-13 13:38:12', 'Durante el segundo juego de nuestra temporada del torneo de otono.'),
(00000011, 2, 2, 'WeSOL', 'Asociacion del Oeste de Balompie', 'Copa de Campeones InterLiga', '2014-08-13 13:41:21', 'Hoy se decidio por penales, asi es que me gusta a mi.'),
(00000012, 2, 3, 'Copa Internacional de Futbol Infantiil', 'Boca Junior', 'Republica Dominicana', '2014-08-13 13:43:25', 'Buen nivel de futbol en el cariba.  Necesitamos mas iniciativas como esta.'),
(00000013, 3, 0, 'Quileando', 'Division A - 12Under', 'Nenas Yaucanas', '2014-08-13 13:48:47', 'Practicando los quileos... , hoy salieron casi todos.'),
(00000014, 3, 1, 'Lares', 'Torneo Entre Escuelas', '4to Grado', '2014-08-13 13:50:33', 'El que quiera ganarnos, que siga practicando ...'),
(00000015, 3, 2, 'Borinquen', 'Caguas Criollas', 'CNVPR', '2014-08-13 13:53:32', 'Resultado del juego Division Oro 14U.'),
(00000016, 3, 3, 'Cien Fuegos, Cuba', 'Arecibo PR', 'Copa de Voleibol del Caribe', '2014-08-13 13:53:46', 'Pa demostrar, hoy le ganamos a Cuba, ya veras.'),
(00000017, 0, 3, 'FIBA Americas', 'U17', '@ Dubai Emiratos Arabes', '2014-08-13 14:00:09', 'Ayer le ganamos a Espana y hoy a Italia, ni el cambio de hora nos detiene.'),
(00000018, 0, 2, 'cat sub 15', 'ponce', 'lares', '2015-02-13 00:08:09', NULL),
(00000019, 3, 0, 'boleo', '8vo grado', 'Copa Municipal entre Escuelas', '2014-08-13 14:02:32', 'Estamos preparandonos pal torneo municipal en el pueblo de Luquillo. Las nenas de 8vo grado de la escuela Hostos empezaron en el verano a practicar.'),
(00000020, 3, 0, 'bompeo', 'Jayuya', 'Liga Jayuyana', '2015-02-13 00:04:54', NULL),
(00000021, 0, 3, 'FIBA Americas', 'U17', '@ Dubai Emeiratos Arabes', '2014-08-16 22:48:59', 'Con Egipto, ya en la etapa de cruces, pasamos un susto. GraciAS A Dios GANAMOS y estamos en los mejores 8 equipos U17 del mundo. Quien sera  proximo !'),
(00000022, 1, 0, 'bateo', 'fundamentos', 'toque', '2014-09-06 12:17:50', NULL),
(00000023, 0, 1, 'Yauco', 'Torneo de Colores', '11 y 12', '2014-08-16 22:52:58', 'Hoy hubo 4 juegos en el torneo local de nuestra liga en Yauco.'),
(00000024, 2, 2, 'U15', 'Wesol', 'Sosol', '2014-08-16 22:53:20', NULL),
(00000025, 0, 0, 'donqueo', 'bebe', 'en pampers', '2014-09-06 12:20:17', NULL),
(00000026, 2, 0, 'femenino', 'fogueo', 'en la escuela', '2014-09-06 12:36:05', NULL),
(00000027, 2, 0, 'practicando', 'en el patio', 'manejo balon', '2014-09-06 12:38:28', NULL),
(00000028, 2, 0, 'manejo balon', 'en grupo', 'conos', '2014-09-06 12:38:56', NULL),
(00000029, 2, 0, 'pre escolar', 'edad 5', 'controlando balon', '2014-09-06 12:39:28', NULL),
(00000030, 1, 0, 'fundamentos', 'fieldeo', 'coqui', '2014-09-06 12:39:57', NULL),
(00000031, 1, 0, 'relajo', 'tripeo', 'diversion', '2015-02-13 00:04:30', 'Jugando y divirtiendose.'),
(00000032, 0, 0, 'dribleo', 'Mayaguez', 'clase de universidad', '2014-09-06 12:40:43', NULL),
(00000033, 0, 2, 'cat sub 15', 'ponce', 'lares', '2015-02-12 23:44:35', 'Este post lo escribo para dejarles saber que Lares le gano a Ponce, por 12.'),
(00000034, 0, 2, 'Hostos Mayaguez', 'Benites Canovanas', 'Cat 16 under', '2015-02-13 00:03:55', NULL),
(00000035, 0, 2, 'Santa Margarita Caguas', 'Perpetuo Soccoro Maricao', 'Sub 16', '2015-02-13 00:03:30', NULL),
(00000036, 0, 0, 'viso perez', 'diego perez', 'carlos arroyo "el arroyato"', '2014-09-06 23:39:56', 'Frente al Roberto Clemente, despues de una de las practicas pal FIBA 2014.  Vimos al Arroyato y aprovechamos.'),
(00000037, 0, 0, 'viso perez', 'diego perez', 'jose juan barea', '2014-09-07 09:12:04', 'viso el gigante con barea el enano'),
(00000038, 0, 0, 'viso perez', 'diego perez', 'el felo filiberto rivera', '2015-02-12 23:46:39', 'los nenes con filiberto rivera, tocayo de felo su abuelo');

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
