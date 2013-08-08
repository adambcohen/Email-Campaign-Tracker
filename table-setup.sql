-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: internal-db.s126012.gridserver.com
-- Generation Time: Apr 24, 2013 at 10:42 AM
-- Server version: 5.1.26-rc-5.1.26rc-log
-- PHP Version: 5.3.15

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db126012_spoil`
--

-- --------------------------------------------------------

--
-- Table structure for table `trckr_data`
--

DROP TABLE IF EXISTS `trckr_data`;
CREATE TABLE IF NOT EXISTS `trckr_data` (
  `uid` int(100) NOT NULL,
  `timestamp` int(11) NOT NULL,
  `id` varchar(40) NOT NULL,
  `type` int(3) NOT NULL,
  `email` varchar(200) NOT NULL,
  `ip` varchar(50) NOT NULL,
  `browser` longtext NOT NULL,
  PRIMARY KEY (`uid`),
  UNIQUE KEY `uid` (`uid`),
  UNIQUE KEY `uid_2` (`uid`),
  KEY `uid_3` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `trckr_gen`
--

DROP TABLE IF EXISTS `trckr_gen`;
CREATE TABLE IF NOT EXISTS `trckr_gen` (
  `uid` varchar(40) NOT NULL,
  `timestamp` int(11) NOT NULL,
  `id` varchar(40) NOT NULL,
  `type` int(2) NOT NULL,
  `info` longtext NOT NULL,
  `user` varchar(100) NOT NULL,
  UNIQUE KEY `uid` (`uid`),
  KEY `uid_2` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
