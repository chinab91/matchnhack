-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 23, 2012 at 06:55 PM
-- Server version: 5.1.61
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `jubliaor_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `announ`
--

DROP TABLE IF EXISTS `announ`;
CREATE TABLE IF NOT EXISTS `announ` (
  `id_announ` int(11) NOT NULL AUTO_INCREMENT,
  `text` text NOT NULL,
  PRIMARY KEY (`id_announ`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `announ`
--

INSERT INTO `announ` (`id_announ`, `text`) VALUES
(1, 'Welcome come to enJOyalBe. For further information, please visit jublia.com'),
(2, 'Our next activity will be held in september.');

-- --------------------------------------------------------

--
-- Table structure for table `COMPANY`
--

DROP TABLE IF EXISTS `COMPANY`;
CREATE TABLE IF NOT EXISTS `COMPANY` (
  `ID_COMPANY` int(100) NOT NULL AUTO_INCREMENT,
  `FNAME` varchar(50) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `LNAME` varchar(50) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `INFO` text NOT NULL,
  `PHONE` int(10) NOT NULL,
  `COMPANYNAME` varchar(100) NOT NULL,
  `TECHSKILLS` varchar(200) NOT NULL,
  `HACKATHON` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID_COMPANY`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `COMPANY`
--

INSERT INTO `COMPANY` (`ID_COMPANY`, `FNAME`, `LNAME`, `EMAIL`, `INFO`, `PHONE`, `COMPANYNAME`, `TECHSKILLS`, `HACKATHON`) VALUES
(1, 'Scirocco', '', 'stefan.wilhelmsson@scirocco.se', 'Scirocco AB manufactures automatic identification systems for large and valuable objects in demanding environments. Applications include transportation logistics, vehicle access control/tracking and factory automation. The identification objects are typically cars, trucks, trains, containers and manufacturing items in factory flow-lines. \r\n\r\nWe help our customers to reduce captial tie-up in logistics processes, to increase the security in their operations and to make access control for vehicles much more convenient. Thanks to simple installation, high functionality and robust operation of our systems, the payback period is short. \r\n\r\nScirocco AB is headquartered in the heart of the ’wireless city’, Stockholm-Kista, Sweden, and serves the end users through a global network of carefully selected marketing partners.', 0, '', '0', 0),
(2, 'Diamorph', '', 'erik@diamorph.com', 'Diamorph is an advanced materials company originating from the world leading department of Materials Chemistry at Stockholm University. The company works with materials such as ceramics, metals and unique combinations of the two.', 0, '', '0', 0),
(3, 'Innovation Pioneers', '', 'takim.islam@innovationpioneers.net', 'Our clients are companies with growth and increased performance ambitions, that seek to excel in their industries. Represented by individuals whom are passionate about business development and the performance of the organization you act within, you are curious and often courageous.\r\n\r\nWith a focus on achieving tangible results, we are involved in the process of structuring and sometimes un-structuring the way you operate, so that your Innovation Capabilities are increased.', 0, '', '0', 0),
(4, 'Wrapp', '', 'magnus@wrapp.com', 'Wrapp is a social gift giving service for celebrating your friends with gift cards using mobile devices or the web. Wrapp allows friends to give and contribute to free and paid gift cards provided by attractive brands, making it as easy to send a gift of real value, as it is to send a greeting. Many retailers actually offer a limited amount of free gift cards everyday.', 0, '', '0', 0),
(5, 'Rebtel', '', 'andreas.bernstrom@rebtel.com', 'Rebtel is a company with a mission: take the phony out of mobile telephony, and create the first genuinely good, honest, and trustworthy global mobile telecommunications service that saves people money.', 0, '', '0', 0),
(6, 'Izettle', '', 'marten@izettle.com', 'iZettle, the social payments company, creates services for person-to-person and business-to-consumer commerce. iZettle services are fantastically convenient and secure, simple to set up and use, and make it easy for users to share purchases with friends. iZettle’s first service includes a free iPhone or iPad app and a mini chip-card reader that lets anyone make or take payments anytime, anywhere. Founded in 2010 by a team of serial entrepreneurs, with funds by Index Ventures and Creandum, iZettle is based in Stockholm.', 0, '', '0', 0),
(7, 'Mosync', '', 'alex@mosync.com', 'The MoSync Software Development Kit makes it possible for you to develop mobile applications for all the major mobile platforms from a single code base. It runs on Windows and OS X and includes a fully featured Eclipse-based IDE.', 0, '', '0', 0),
(8, 'Spotify', '', 'jonax@spotify.com', 'Spotify is a new way to listen to music. Millions of tracks, any time you like. Just search for it in Spotify, then play it. Just help yourself to whatever you want, whenever you want it.', 0, '', '0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `COMPANYCHOOSE`
--

DROP TABLE IF EXISTS `COMPANYCHOOSE`;
CREATE TABLE IF NOT EXISTS `COMPANYCHOOSE` (
  `ID_COMPANYCHOOSE` int(11) NOT NULL AUTO_INCREMENT,
  `ID_COMPANY` int(11) NOT NULL,
  `ID_USER` int(11) NOT NULL,
  PRIMARY KEY (`ID_COMPANYCHOOSE`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `COMPANYCHOOSE`
--

INSERT INTO `COMPANYCHOOSE` (`ID_COMPANYCHOOSE`, `ID_COMPANY`, `ID_USER`) VALUES
(1, 1, 2),
(2, 1, 4),
(3, 2, 6),
(4, 2, 4),
(5, 3, 5),
(6, 3, 1),
(7, 4, 1),
(8, 5, 6),
(9, 5, 7),
(10, 5, 8),
(11, 6, 2),
(12, 7, 3),
(13, 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `TIME`
--

DROP TABLE IF EXISTS `TIME`;
CREATE TABLE IF NOT EXISTS `TIME` (
  `ID_TIME` int(11) NOT NULL AUTO_INCREMENT,
  `TIMESLOT` varchar(100) NOT NULL,
  PRIMARY KEY (`ID_TIME`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `TIME`
--

INSERT INTO `TIME` (`ID_TIME`, `TIMESLOT`) VALUES
(1, '08:00 - 08:15'),
(2, '08:15 - 08:30'),
(3, '08:30 - 08:45'),
(4, '08:45 - 09:00'),
(5, '09:00 - 09:15'),
(6, '09:15 - 09:30'),
(7, '09:30 - 09:45');

-- --------------------------------------------------------

--
-- Table structure for table `TIMETABLE`
--

DROP TABLE IF EXISTS `TIMETABLE`;
CREATE TABLE IF NOT EXISTS `TIMETABLE` (
  `ID_TIMETABLE` int(11) NOT NULL AUTO_INCREMENT,
  `ID_TIME` int(11) NOT NULL,
  `ID_COMPANY` int(11) NOT NULL,
  `ID_USER` int(11) NOT NULL,
  PRIMARY KEY (`ID_TIMETABLE`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=61 ;

--
-- Dumping data for table `TIMETABLE`
--

INSERT INTO `TIMETABLE` (`ID_TIMETABLE`, `ID_TIME`, `ID_COMPANY`, `ID_USER`) VALUES
(1, 1, 1, 4),
(2, 1, 2, 5),
(3, 1, 4, 7),
(4, 1, 7, 8),
(5, 2, 4, 2),
(7, 3, 1, 2),
(8, 4, 2, 4),
(9, 5, 6, 10),
(10, 4, 3, 9),
(54, 5, 7, 1),
(57, 2, 1, 1),
(58, 3, 6, 1),
(55, 4, 4, 1),
(59, 7, 2, 1),
(60, 6, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `USER`
--

DROP TABLE IF EXISTS `USER`;
CREATE TABLE IF NOT EXISTS `USER` (
  `ID_USER` int(100) NOT NULL AUTO_INCREMENT,
  `FNAME` varchar(100) NOT NULL,
  `LNAME` varchar(100) NOT NULL,
  `NAME` varchar(100) NOT NULL,
  `EMAIL` varchar(200) NOT NULL,
  `TECHSKILL` text NOT NULL,
  `PHONE` varchar(20) NOT NULL,
  `PASSWORD` varchar(100) NOT NULL,
  `INFO` text NOT NULL,
  `HACKATHON` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID_USER`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `USER`
--

INSERT INTO `USER` (`ID_USER`, `FNAME`, `LNAME`, `NAME`, `EMAIL`, `TECHSKILL`, `PHONE`, `PASSWORD`, `INFO`, `HACKATHON`) VALUES
(1, 'Errol', 'Lim', 'user1', 'errol.lim@gmail.com', 'Front-End, Mobile Development, IT Architecture', '46-0704270180', '123123', '', 0),
(2, '', '', 'user2', 'user2@gmail', '2try', '222256789', '123123', '', 0),
(3, 'test', 'test', 'user3', 'mynam@gg', 'testing', 'a1111', '123123', '', 0),
(4, '', '', 'user4', '4', '4try', '34567777', '123123', '', 0),
(5, '', '', 'user5', '5try', '55', '987654456', '123123', '', 0),
(6, '', '', '6', '66', '666', '34568765', '123123', '', 0),
(7, '', '', '777', '7', '77', '34569876', '123123', '', 0),
(8, '', '', '88', '8', '88', '', '123123', '', 0),
(9, '', '', '9', '99', '999', '', '123123', '', 0),
(10, '', '', '10', '10try', '10tryy', '', '123123', '', 0),
(12, 'a', 'a', '', '', '', '', '', '', 0),
(13, 'a', 'a', '', '', '', '', '', '', 0),
(14, 'a', 'a', '', '', '', '', '', '', 0),
(15, 'a', '', '', '', '', '', '', '', 0),
(16, '', '', '', '', '', '', '', '', 0),
(17, '', '', '', '', '', '', '', '', 0),
(18, '', '', '', '', '', '', '', '', 0),
(19, '', '', '', '', '', '', '', '', 0),
(20, '', '', '', '', '', '', '', '', 0),
(21, '', '', '', '', '', '', '', '', 0),
(22, '', '', '', '', '', '', '', '', 0),
(23, '', '', '', '', '', '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `USERRANK`
--

DROP TABLE IF EXISTS `USERRANK`;
CREATE TABLE IF NOT EXISTS `USERRANK` (
  `ID_USERRANK` int(11) NOT NULL AUTO_INCREMENT,
  `ID_USER` int(11) NOT NULL,
  `ID_COMPANY` int(11) NOT NULL,
  `RANK` int(1) NOT NULL,
  `TIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID_USERRANK`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `USERRANK`
--

INSERT INTO `USERRANK` (`ID_USERRANK`, `ID_USER`, `ID_COMPANY`, `RANK`, `TIMESTAMP`) VALUES
(1, 1, 1, 5, '2012-02-27 00:18:59'),
(2, 2, 4, 3, '2012-02-27 00:18:59'),
(3, 3, 4, 7, '2012-02-27 03:18:59'),
(4, 4, 6, 1, '2012-02-27 00:18:59'),
(5, 5, 1, 2, '2012-02-27 00:18:59'),
(6, 2, 1, 1, '2012-03-16 20:59:23');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
