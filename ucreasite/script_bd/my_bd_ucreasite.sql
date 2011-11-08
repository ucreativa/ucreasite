-- phpMyAdmin SQL Dump
-- version 3.4.3.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 11-08-2011 a las 12:29:34
-- Versión del servidor: 5.1.54
-- Versión de PHP: 5.3.5-1ubuntu7.2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `bd_ucreasite`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_areas`
--

CREATE TABLE IF NOT EXISTS `tbl_areas` (
  `area_id` int(11) NOT NULL AUTO_INCREMENT,
  `area_name` varchar(128) NOT NULL,
  `area_description` varchar(256) NOT NULL,
  `area_status` varchar(1) NOT NULL DEFAULT 'A',
  `area_created` date NOT NULL,
  `area_modified` date NOT NULL,
  PRIMARY KEY (`area_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_careers`
--

CREATE TABLE IF NOT EXISTS `tbl_careers` (
  `career_id` int(11) NOT NULL AUTO_INCREMENT,
  `area_fk` int(11) NOT NULL,
  `career_name` varchar(128) NOT NULL,
  `career_description` varchar(256) NOT NULL,
  `career_text` text NOT NULL,
  `career_status` varchar(1) NOT NULL DEFAULT 'A',
  `career_created` date NOT NULL,
  `career_modified` date NOT NULL,
  PRIMARY KEY (`career_id`),
  KEY `area_fk` (`area_fk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_events`
--

CREATE TABLE IF NOT EXISTS `tbl_events` (
  `event_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `event_title` varchar(128) NOT NULL,
  ` event_description` varchar(1024) NOT NULL,
  `event_url` varchar(128) NOT NULL,
  `event_status` varchar(1) NOT NULL DEFAULT 'A',
  `event_created` date NOT NULL,
  `event_modified` date NOT NULL,
  PRIMARY KEY (`event_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_files`
--

CREATE TABLE IF NOT EXISTS `tbl_files` (
  `file_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `file_name` varchar(64) NOT NULL,
  `file_description` varchar(256) NOT NULL,
  `file_author` varchar(64) NOT NULL,
  `file_date` date NOT NULL,
  `file_type` varchar(16) NOT NULL,
  `file_first` varchar(1) NOT NULL DEFAULT 'N',
  `file_status` varchar(1) NOT NULL DEFAULT 'A',
  `file_created` date NOT NULL,
  `file_modified` date NOT NULL,
  PRIMARY KEY (`file_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_files_careers`
--

CREATE TABLE IF NOT EXISTS `tbl_files_careers` (
  `file_career_id` int(11) NOT NULL AUTO_INCREMENT,
  `file_fk` bigint(20) NOT NULL,
  `career_fk` int(11) NOT NULL,
  PRIMARY KEY (`file_career_id`),
  KEY `file_fk` (`file_fk`),
  KEY `career_fk` (`career_fk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_files_events`
--

CREATE TABLE IF NOT EXISTS `tbl_files_events` (
  `file_event_id` int(11) NOT NULL AUTO_INCREMENT,
  `file_fk` bigint(20) NOT NULL,
  `event_fk` bigint(20) NOT NULL,
  PRIMARY KEY (`file_event_id`),
  KEY `file_fk` (`file_fk`),
  KEY `event_fk` (`event_fk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_files_news`
--

CREATE TABLE IF NOT EXISTS `tbl_files_news` (
  `file_new_id` int(11) NOT NULL AUTO_INCREMENT,
  `file_fk` bigint(20) NOT NULL,
  `new_fk` bigint(20) NOT NULL,
  PRIMARY KEY (`file_new_id`),
  KEY `file_fk` (`file_fk`),
  KEY `new_fk` (`new_fk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_files_sections`
--

CREATE TABLE IF NOT EXISTS `tbl_files_sections` (
  `file_section_id` int(11) NOT NULL AUTO_INCREMENT,
  `file_fk` bigint(20) NOT NULL,
  `section_fk` int(11) NOT NULL,
  PRIMARY KEY (`file_section_id`),
  KEY `file_fk` (`file_fk`),
  KEY `section_fk` (`section_fk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_links`
--

CREATE TABLE IF NOT EXISTS `tbl_links` (
  `link_id` int(11) NOT NULL AUTO_INCREMENT,
  `link_name` varchar(64) NOT NULL,
  `link_url` varchar(256) NOT NULL,
  `link_image` varchar(64) NOT NULL,
  `link_description` varchar(128) NOT NULL,
  `link_status` varchar(1) NOT NULL DEFAULT 'A',
  `link_created` date NOT NULL,
  `link_modified` date NOT NULL,
  PRIMARY KEY (`link_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_news`
--

CREATE TABLE IF NOT EXISTS `tbl_news` (
  `new_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `new_title` varchar(128) NOT NULL,
  `new_subtitle` varchar(128) DEFAULT NULL,
  `new_description` varchar(256) NOT NULL,
  `new_text` text NOT NULL,
  `new_source` varchar(128) NOT NULL,
  `new_author` varchar(64) NOT NULL,
  `new_status` varchar(1) NOT NULL DEFAULT 'A',
  `new_created` date NOT NULL,
  `new_modified` date NOT NULL,
  PRIMARY KEY (`new_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_sections`
--

CREATE TABLE IF NOT EXISTS `tbl_sections` (
  `section_id` int(11) NOT NULL AUTO_INCREMENT,
  `section_key` varchar(16) NOT NULL,
  `section_name` varchar(32) NOT NULL,
  `section_title` varchar(64) NOT NULL,
  `section_subtitle` varchar(64) DEFAULT NULL,
  `section_description` varchar(1024) NOT NULL,
  `section_text` text NOT NULL,
  `section_showflag` varchar(1) NOT NULL DEFAULT '0',
  `section_urlblog` varchar(128) DEFAULT NULL,
  `section_keywords` varchar(128) NOT NULL,
  `section_status` varchar(1) NOT NULL DEFAULT 'A',
  `section_created` date NOT NULL,
  `section_modified` date NOT NULL,
  PRIMARY KEY (`section_id`),
  UNIQUE KEY `section_key` (`section_key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tags`
--

CREATE TABLE IF NOT EXISTS `tbl_tags` (
  `tag_id` int(11) NOT NULL AUTO_INCREMENT,
  `tag_name` varchar(64) NOT NULL,
  `tag_status` varchar(1) NOT NULL DEFAULT 'A',
  `tag_created` date NOT NULL,
  `tag_modified` date NOT NULL,
  PRIMARY KEY (`tag_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tags_careers`
--

CREATE TABLE IF NOT EXISTS `tbl_tags_careers` (
  `tag_career_id` int(11) NOT NULL AUTO_INCREMENT,
  `tag_fk` int(11) NOT NULL,
  `career_fk` int(11) NOT NULL,
  PRIMARY KEY (`tag_career_id`),
  KEY `tag_fk` (`tag_fk`),
  KEY `career_fk` (`career_fk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tags_events`
--

CREATE TABLE IF NOT EXISTS `tbl_tags_events` (
  `tag_event_id` int(11) NOT NULL AUTO_INCREMENT,
  `tag_fk` int(11) NOT NULL,
  `event_fk` bigint(20) NOT NULL,
  PRIMARY KEY (`tag_event_id`),
  KEY `tag_fk` (`tag_fk`),
  KEY `event_fk` (`event_fk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tags_files`
--

CREATE TABLE IF NOT EXISTS `tbl_tags_files` (
  `tag_file_id` int(11) NOT NULL AUTO_INCREMENT,
  `tag_fk` int(11) NOT NULL,
  `file_fk` bigint(20) NOT NULL,
  PRIMARY KEY (`tag_file_id`),
  KEY `tag_fk` (`tag_fk`),
  KEY `file_fk` (`file_fk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tags_news`
--

CREATE TABLE IF NOT EXISTS `tbl_tags_news` (
  `tag_new_id` int(11) NOT NULL AUTO_INCREMENT,
  `tag_fk` int(11) NOT NULL,
  `new_fk` bigint(20) NOT NULL,
  PRIMARY KEY (`tag_new_id`),
  KEY `tag_fk` (`tag_fk`),
  KEY `new_fk` (`new_fk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tags_sections`
--

CREATE TABLE IF NOT EXISTS `tbl_tags_sections` (
  `tag_section_id` int(11) NOT NULL AUTO_INCREMENT,
  `tag_fk` int(11) NOT NULL,
  `section_fk` int(11) NOT NULL,
  PRIMARY KEY (`tag_section_id`),
  KEY `tag_fk` (`tag_fk`),
  KEY `section_fk` (`section_fk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_careers`
--
ALTER TABLE `tbl_careers`
  ADD CONSTRAINT `tbl_careers_area_fk_fkey` FOREIGN KEY (`area_fk`) REFERENCES `tbl_areas` (`area_id`),
  ADD CONSTRAINT `tbl_careers_ibfk_1` FOREIGN KEY (`area_fk`) REFERENCES `tbl_areas` (`area_id`),
  ADD CONSTRAINT `tbl_careers_ibfk_2` FOREIGN KEY (`area_fk`) REFERENCES `tbl_areas` (`area_id`),
  ADD CONSTRAINT `tbl_careers_ibfk_3` FOREIGN KEY (`area_fk`) REFERENCES `tbl_areas` (`area_id`),
  ADD CONSTRAINT `tbl_careers_ibfk_4` FOREIGN KEY (`area_fk`) REFERENCES `tbl_areas` (`area_id`),
  ADD CONSTRAINT `tbl_careers_ibfk_5` FOREIGN KEY (`area_fk`) REFERENCES `tbl_areas` (`area_id`);

--
-- Filtros para la tabla `tbl_files_careers`
--
ALTER TABLE `tbl_files_careers`
  ADD CONSTRAINT `tbl_files_careers_ibfk_2` FOREIGN KEY (`career_fk`) REFERENCES `tbl_careers` (`career_id`),
  ADD CONSTRAINT `tbl_files_careers_ibfk_1` FOREIGN KEY (`file_fk`) REFERENCES `tbl_files` (`file_id`);

--
-- Filtros para la tabla `tbl_files_events`
--
ALTER TABLE `tbl_files_events`
  ADD CONSTRAINT `tbl_files_events_ibfk_2` FOREIGN KEY (`event_fk`) REFERENCES `tbl_events` (`event_id`),
  ADD CONSTRAINT `tbl_files_events_ibfk_1` FOREIGN KEY (`file_fk`) REFERENCES `tbl_files` (`file_id`);

--
-- Filtros para la tabla `tbl_files_news`
--
ALTER TABLE `tbl_files_news`
  ADD CONSTRAINT `tbl_files_news_ibfk_2` FOREIGN KEY (`new_fk`) REFERENCES `tbl_news` (`new_id`),
  ADD CONSTRAINT `tbl_files_news_ibfk_1` FOREIGN KEY (`file_fk`) REFERENCES `tbl_files` (`file_id`);

--
-- Filtros para la tabla `tbl_files_sections`
--
ALTER TABLE `tbl_files_sections`
  ADD CONSTRAINT `tbl_files_sections_ibfk_2` FOREIGN KEY (`section_fk`) REFERENCES `tbl_sections` (`section_id`),
  ADD CONSTRAINT `tbl_files_sections_ibfk_1` FOREIGN KEY (`file_fk`) REFERENCES `tbl_files` (`file_id`);

--
-- Filtros para la tabla `tbl_tags_careers`
--
ALTER TABLE `tbl_tags_careers`
  ADD CONSTRAINT `tbl_tags_careers_ibfk_2` FOREIGN KEY (`career_fk`) REFERENCES `tbl_careers` (`career_id`),
  ADD CONSTRAINT `tbl_tags_careers_ibfk_1` FOREIGN KEY (`tag_fk`) REFERENCES `tbl_tags` (`tag_id`);

--
-- Filtros para la tabla `tbl_tags_events`
--
ALTER TABLE `tbl_tags_events`
  ADD CONSTRAINT `tbl_tags_events_ibfk_3` FOREIGN KEY (`event_fk`) REFERENCES `tbl_events` (`event_id`),
  ADD CONSTRAINT `tbl_tags_events_ibfk_2` FOREIGN KEY (`tag_fk`) REFERENCES `tbl_tags` (`tag_id`);

--
-- Filtros para la tabla `tbl_tags_files`
--
ALTER TABLE `tbl_tags_files`
  ADD CONSTRAINT `tbl_tags_files_ibfk_2` FOREIGN KEY (`file_fk`) REFERENCES `tbl_files` (`file_id`),
  ADD CONSTRAINT `tbl_tags_files_ibfk_1` FOREIGN KEY (`tag_fk`) REFERENCES `tbl_tags` (`tag_id`);

--
-- Filtros para la tabla `tbl_tags_news`
--
ALTER TABLE `tbl_tags_news`
  ADD CONSTRAINT `tbl_tags_news_ibfk_2` FOREIGN KEY (`new_fk`) REFERENCES `tbl_news` (`new_id`),
  ADD CONSTRAINT `tbl_tags_news_ibfk_1` FOREIGN KEY (`tag_fk`) REFERENCES `tbl_tags` (`tag_id`);

--
-- Filtros para la tabla `tbl_tags_sections`
--
ALTER TABLE `tbl_tags_sections`
  ADD CONSTRAINT `tbl_tags_sections_ibfk_2` FOREIGN KEY (`section_fk`) REFERENCES `tbl_sections` (`section_id`),
  ADD CONSTRAINT `tbl_tags_sections_ibfk_1` FOREIGN KEY (`tag_fk`) REFERENCES `tbl_tags` (`tag_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
