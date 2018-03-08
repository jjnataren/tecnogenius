-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-03-2014 a las 05:07:17
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
  `DESCRIPTION` text COLLATE utf8_spanish_ci,
  `ALIAS` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `CONTENT` text COLLATE utf8_spanish_ci,
  `STATUS` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK_REFERENCE_7` (`HIERARCHY_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_document`
--

CREATE TABLE IF NOT EXISTS `tbl_document` (
  `ID` int(11) NOT NULL,
  `COURSE_ID` int(11) DEFAULT NULL,
  `NAME` varchar(300) COLLATE utf8_spanish_ci DEFAULT NULL,
  `DESCRIPTION` varchar(300) COLLATE utf8_spanish_ci DEFAULT NULL,
  `PATH` varchar(300) COLLATE utf8_spanish_ci DEFAULT NULL,
  `SIZE` varchar(300) COLLATE utf8_spanish_ci DEFAULT NULL,
  `THUMBNAIL` varchar(300) COLLATE utf8_spanish_ci DEFAULT NULL,
  `TYPE` smallint(6) DEFAULT NULL,
  `DEL_TYPE` varchar(300) COLLATE utf8_spanish_ci DEFAULT NULL,
  `DEL_URL` varchar(300) COLLATE utf8_spanish_ci DEFAULT NULL,
  `STATUS` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK_REFERENCE_8` (`COURSE_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

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
(3001, 'Data Base Implementation', 'All database managed systems'),
(10001, 'Oracle', 'Principals'),
(10002, 'IBM', 'TEST');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_keyword`
--

CREATE TABLE IF NOT EXISTS `tbl_keyword` (
  `WORD` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `STATUS` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`WORD`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

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
  `STATUS` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK_REFERENCE_4` (`STAFF_ID`),
  KEY `FK_REFERENCE_5` (`LEVEL_NUMBER`),
  KEY `FK_REFERENCE_6` (`PARENT_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `tbl_mentoring_hyerarchy`
--

INSERT INTO `tbl_mentoring_hyerarchy` (`ID`, `STAFF_ID`, `LEVEL_NUMBER`, `PARENT_ID`, `NAME`, `STATUS`) VALUES
(1, 1, 10001, NULL, 'Java', 1),
(2, 1, 10001, 1, 'Java Basico', 1),
(3, 1, 3001, NULL, 'DB2', 1),
(4, 1, 3001, 3, 'DB2 Basics', 1),
(5, 1, 3001, 4, 'Administration', 1);

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
  ADD CONSTRAINT `FK_REFERENCE_3` FOREIGN KEY (`WORD`) REFERENCES `tbl_keyword` (`WORD`),
  ADD CONSTRAINT `FK_REFERENCE_2` FOREIGN KEY (`COURSE_ID`) REFERENCES `tbl_course` (`ID`);

--
-- Filtros para la tabla `tbl_mentoring_hyerarchy`
--
ALTER TABLE `tbl_mentoring_hyerarchy`
  ADD CONSTRAINT `FK_REFERENCE_6` FOREIGN KEY (`PARENT_ID`) REFERENCES `tbl_mentoring_hyerarchy` (`ID`),
  ADD CONSTRAINT `FK_REFERENCE_4` FOREIGN KEY (`STAFF_ID`) REFERENCES `tbl_staff` (`ID`),
  ADD CONSTRAINT `FK_REFERENCE_5` FOREIGN KEY (`LEVEL_NUMBER`) REFERENCES `tbl_hierarchy_level` (`LEVEL_NUMBER`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
