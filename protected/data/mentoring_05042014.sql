-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-04-2014 a las 01:05:54
-- Versión del servidor: 5.6.15-log
-- Versión de PHP: 5.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `mentoring`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_course`
--

CREATE TABLE IF NOT EXISTS `tbl_course` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `HIERARCHY_ID` int(11) DEFAULT NULL,
  `NAME` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `RESUME` text COLLATE utf8_spanish_ci,
  `PROFILE` text COLLATE utf8_spanish_ci,
  `DESCRIPTION` text COLLATE utf8_spanish_ci,
  `ALIAS` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `CONTENT` text COLLATE utf8_spanish_ci,
  `RANKING` smallint(6) DEFAULT NULL,
  `STATUS` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK_REFERENCE_7` (`HIERARCHY_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `tbl_course`
--

INSERT INTO `tbl_course` (`ID`, `HIERARCHY_ID`, `NAME`, `RESUME`, `PROFILE`, `DESCRIPTION`, `ALIAS`, `CONTENT`, `RANKING`, `STATUS`) VALUES
(11, 24, 'Servlets a fondo', 'Aprederemos a crear servlets a fondo con este divertido curso. Adaptado especialmente para ti nos enfocaremos en teorias avanzadas del manejo de transporte http y en esatados de una peticion normal de estados como otros', 'Orientado a todo el publico', 'El curso esta distribuido en 40 hrs. 8 hrs por dia, permitiendo terminar rapidamente y  con resultados eficaces.', 'JAVA WEB SERVLETS', '<ol>\r\n	<li><strong>Java Fundamentos</strong>\r\n	<ol>\r\n		<li>Primeros pasos</li>\r\n		<li>Temas de interes en java</li>\r\n	</ol>\r\n	</li>\r\n	<li><strong>Java Intermedio</strong>\r\n	<ol>\r\n		<li>Servlets</li>\r\n	</ol>\r\n	</li>\r\n</ol>\r\n', 4, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_document`
--

CREATE TABLE IF NOT EXISTS `tbl_document` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `COURSE_ID` int(11) DEFAULT NULL,
  `NAME` varchar(300) COLLATE utf8_spanish_ci DEFAULT NULL,
  `DOCUMENT_TYPE` smallint(6) DEFAULT NULL,
  `DESCRIPTION` varchar(300) COLLATE utf8_spanish_ci DEFAULT NULL,
  `PATH` varchar(300) COLLATE utf8_spanish_ci DEFAULT NULL,
  `SIZE` varchar(300) COLLATE utf8_spanish_ci DEFAULT NULL,
  `THUMBNAIL` varchar(300) COLLATE utf8_spanish_ci DEFAULT NULL,
  `TYPE` varchar(300) COLLATE utf8_spanish_ci DEFAULT NULL,
  `DEL_TYPE` varchar(300) COLLATE utf8_spanish_ci DEFAULT NULL,
  `DEL_URL` varchar(300) COLLATE utf8_spanish_ci DEFAULT NULL,
  `STATUS` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK_REFERENCE_8` (`COURSE_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_hierarchy_level`
--

CREATE TABLE IF NOT EXISTS `tbl_hierarchy_level` (
  `LEVEL_NUMBER` int(11) NOT NULL,
  `NAME` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `DESCRIPTION` text COLLATE utf8_spanish_ci,
  PRIMARY KEY (`LEVEL_NUMBER`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_hierarchy_level`
--

INSERT INTO `tbl_hierarchy_level` (`LEVEL_NUMBER`, `NAME`, `DESCRIPTION`) VALUES
(10, 'TECNOLOGÍA', 'Tecnologías  que se utilizaran en los cursos'),
(100, 'BRANCH', 'Ramas principales de las tecnologías'),
(1000, 'CURSO', 'CURSOS Por impartir');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_keyword`
--

CREATE TABLE IF NOT EXISTS `tbl_keyword` (
  `WORD` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `STATUS` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`WORD`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_keyword`
--

INSERT INTO `tbl_keyword` (`WORD`, `STATUS`) VALUES
('java', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_keyword_course`
--

CREATE TABLE IF NOT EXISTS `tbl_keyword_course` (
  `COURSE_ID` int(11) DEFAULT NULL,
  `WORD` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  KEY `FK_REFERENCE_2` (`COURSE_ID`),
  KEY `FK_REFERENCE_3` (`WORD`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_mentoring_hyerarchy`
--

CREATE TABLE IF NOT EXISTS `tbl_mentoring_hyerarchy` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `STAFF_ID` int(11) DEFAULT NULL,
  `LEVEL_NUMBER` int(11) DEFAULT NULL,
  `PARENT_ID` int(11) DEFAULT NULL,
  `NAME` varchar(300) COLLATE utf8_spanish_ci DEFAULT NULL,
  `DESCRIPTION` text COLLATE utf8_spanish_ci,
  `STATUS` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK_REFERENCE_4` (`STAFF_ID`),
  KEY `FK_REFERENCE_5` (`LEVEL_NUMBER`),
  KEY `FK_REFERENCE_6` (`PARENT_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=25 ;

--
-- Volcado de datos para la tabla `tbl_mentoring_hyerarchy`
--

INSERT INTO `tbl_mentoring_hyerarchy` (`ID`, `STAFF_ID`, `LEVEL_NUMBER`, `PARENT_ID`, `NAME`, `DESCRIPTION`, `STATUS`) VALUES
(0, NULL, NULL, NULL, 'ROOT', NULL, 1),
(18, 1, 10, 0, 'JAVA', 'Lenguaje de programacion orientado a objetos', 1),
(19, 1, 10, 0, 'PHP', 'Lenguaje de programacion interpretado', 1),
(20, 1, 10, 0, '.NET', 'Lenguaje de programacion de Microsoft', 1),
(21, 1, 10, 0, 'IBM', 'Tecnologías de IBM', 1),
(22, 1, 100, 18, 'J2EE', 'Java empresarial', 1),
(23, 1, 100, 18, 'J2SE', 'Java Standard edition', 1),
(24, 1, 1000, 22, 'Java web', 'Paginas web con java', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_staff`
--

CREATE TABLE IF NOT EXISTS `tbl_staff` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `GENDER` smallint(6) DEFAULT NULL,
  `DATE_JOINED` date DEFAULT NULL,
  `DATE_LEFT` date DEFAULT NULL,
  `DATE_BIRTH` date DEFAULT NULL,
  `ROLE` smallint(6) DEFAULT NULL,
  `PHOTO_FILENAME` varchar(500) COLLATE utf8_spanish_ci DEFAULT NULL,
  `STATUS` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `tbl_staff`
--

INSERT INTO `tbl_staff` (`ID`, `NAME`, `GENDER`, `DATE_JOINED`, `DATE_LEFT`, `DATE_BIRTH`, `ROLE`, `PHOTO_FILENAME`, `STATUS`) VALUES
(1, 'Jose de Jesus', 1, '2011-01-01', '2011-01-01', '2011-01-01', 1, 'test', 1);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_course`
--
ALTER TABLE `tbl_course`
  ADD CONSTRAINT `FK_REFERENCE_7` FOREIGN KEY (`HIERARCHY_ID`) REFERENCES `tbl_mentoring_hyerarchy` (`ID`);

--
-- Filtros para la tabla `tbl_document`
--
ALTER TABLE `tbl_document`
  ADD CONSTRAINT `FK_REFERENCE_8` FOREIGN KEY (`COURSE_ID`) REFERENCES `tbl_course` (`ID`);

--
-- Filtros para la tabla `tbl_keyword_course`
--
ALTER TABLE `tbl_keyword_course`
  ADD CONSTRAINT `FK_REFERENCE_2` FOREIGN KEY (`COURSE_ID`) REFERENCES `tbl_course` (`ID`),
  ADD CONSTRAINT `FK_REFERENCE_3` FOREIGN KEY (`WORD`) REFERENCES `tbl_keyword` (`WORD`);

--
-- Filtros para la tabla `tbl_mentoring_hyerarchy`
--
ALTER TABLE `tbl_mentoring_hyerarchy`
  ADD CONSTRAINT `FK_REFERENCE_4` FOREIGN KEY (`STAFF_ID`) REFERENCES `tbl_staff` (`ID`),
  ADD CONSTRAINT `FK_REFERENCE_5` FOREIGN KEY (`LEVEL_NUMBER`) REFERENCES `tbl_hierarchy_level` (`LEVEL_NUMBER`),
  ADD CONSTRAINT `FK_REFERENCE_6` FOREIGN KEY (`PARENT_ID`) REFERENCES `tbl_mentoring_hyerarchy` (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
