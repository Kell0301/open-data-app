-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 12, 2012 at 05:37 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kell0301`
--

-- --------------------------------------------------------

--
-- Table structure for table `comgardens`
--

CREATE TABLE IF NOT EXISTS `comgardens` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `long` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `lat` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`,`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `comgardens`
--

INSERT INTO `comgardens` (`id`, `name`, `address`, `long`, `lat`) VALUES
(1, 'Michael Lindon Gardens', '631 Pancake Lane, Ottawa Ontario', '45 25 0 N ', '75 42 0 W'),
(2, 'St. Mary''s Community Gardens', '45 Church St. Ottawa, Ontario', '45 25 0 N ', '75 42 0 W'),
(3, 'Bell Community Garden', '555 Bell Ave. Ottawa, Ontario', '45 25 0 N ', '75 42 0 W'),
(4, 'Walter Street Garden ', '75 Walter St. Ottawa, Ontario', '45 25 0 N ', '75 42 0 W'),
(5, 'Shanghai Community Centre Garden', 'Somerset St. Ottawa, Ontario', '45 25 0 N ', '75 42 0 W'),
(6, 'Jerry''s Garden', 'Hollington Ave. Ottawa, Ontario', '45 25 0 N ', '75 42 0 W'),
(7, 'Jardin de Vachon ', 'Rue Marie. Ottawa, Ontario', '45 25 0 N ', '75 42 0 W'),
(8, 'Red Tomato Community Garden', '22 Lindan Lane. Ottawa, Ontario', '45 25 0 N ', '75 42 0 W'),
(9, 'St. Bart''s Community Garden', '34 Fakey Rd. Ottawa, Ontario', '45 25 0 N ', '75 42 0 W'),
(10, 'Owen Peaks Gardens ', '91 Peters St. Ottawa, Ontario', '45 25 0 N ', '75 42 0 W'),
(11, 'Greens Gardens', '239 Greeley Ave. Ottawa, Ontario', '45 25 0 N ', '75 42 0 W'),
(12, 'Booyakasha Community Gardens', '420 Shizzle Ave. Ottawa, Ontario', '45 25 0 N ', '75 42 0 W');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
