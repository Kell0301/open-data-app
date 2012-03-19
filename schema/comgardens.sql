-- phpMyAdmin SQL Dump
-- version 3.5.0-beta1
-- http://www.phpmyadmin.net
--
-- Host: mysql-shared-02.phpfog.com
-- Generation Time: Mar 19, 2012 at 04:01 PM
-- Server version: 5.5.12-log
-- PHP Version: 5.3.2-1ubuntu4.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gardensphere_phpfogapp_com`
--

-- --------------------------------------------------------

--
-- Table structure for table `comgardens`
--

CREATE TABLE IF NOT EXISTS `comgardens` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `street_address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `longitude` float NOT NULL,
  `latitude` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=32 ;

--
-- Dumping data for table `comgardens`
--

INSERT INTO `comgardens` (`id`, `name`, `street_address`, `longitude`, `latitude`) VALUES
(1, 'Bethany Church Community Garden', '382 Centrepointe Dr.', -75.7734, 45.3455),
(2, 'Bytown Urban Gardens (BUGs) CG', '75 Glendale Ave.', -75.6988, 45.405),
(3, 'Carlington Community Garden', '900 Merivale Rd.', -75.7346, 45.3828),
(4, 'Centretown Community Garden', '461 Lisgar St.', -75.7017, 45.4152),
(5, 'Chateau Donald Community Garden', '251 Donald St.', -75.6577, 45.4293),
(6, 'Children''s Garden', '321 Main St.', -75.676, 45.4061),
(7, 'Debra Dynes Family House Community Garden', '955 Debra Ave.', -75.706, 45.3681),
(8, 'Friendship Community Garden', '1240/1244 Donald St.', -75.6362, 45.4274),
(9, 'Gloucester Allotment Gardens', 'N/A Corner of Weir and Anderson', -75.5677, 45.4206),
(10, 'GO-VEG (Glebe Organic Vegetable Garden) / Corpus-Christi Children''s Garden', '185 Fifth Ave.', -75.692, 45.4013),
(11, 'Go Green Community Garden', '110 Laurier Ave.', -75.6893, 45.4211),
(12, 'Jardin Arrowsmith Thyme-Less Community Garden', '2040 Arrowsmith Drive', -75.5954, 45.4386),
(13, 'Jardin Communautaire Orleans Community Garden', '3350 St Joseph Blvd.', -75.4989, 45.4838),
(14, 'Jardin Communautaire Vanier Community Garden', '300 des Peres Blancs.', -75.6586, 45.4437),
(15, 'Kilborn Allotment Garden', '1909/1975 Kilborn Ave.', -75.6388, 45.3908),
(16, 'Leslie Park Community Garden', '31 Abingdon Dr.', -75.7879, 45.3341),
(17, 'Lowertown/Basseville Community Garden', '40 Cobourg st.', -75.6818, 45.4348),
(18, 'Michele Heights Community Garden', '2955 Michelle Dr.', -75.8006, 45.3552),
(19, 'Nanny Goat Hill Community Garden', '575/551 Laurier Ave. West', -75.7075, 45.4153),
(20, 'Nepean Allotment Garden', '230 Viewmont', -75.718, 45.3465),
(21, 'Operation Go Home Community Garden', '179 Murray St.', -75.6908, 45.4311),
(22, 'Ottawa East Community Garden', '249/223/175 Main St.', -75.6756, 45.4081),
(23, 'Rochester Heights Children''s Garden', '299 Rochester St.', -75.7084, 45.4045),
(24, 'Sandy Hill CG', '3 Hurdman Rd.', -75.668, 45.4199),
(25, 'Somali CG', '1975 Kilborn Ave.', -75.6392, 45.3896),
(26, 'Strathcona Heights Community Garden', '3 Hurdman Rd.', -75.6694, 45.4187),
(27, 'Sweet Willow Community Garden', '31 Rochester St.', -75.7134, 45.4118),
(28, 'Van Lang CG', '295 Churchill Ave.', -75.7556, 45.3957),
(29, 'Viscount Alexander CG', '55 Mann Ave.', -75.6747, 45.4203),
(30, 'West Barrhaven Community Garden', '3058 Jockvale Rd.', -75.7577, 45.271),
(31, 'twetrasdf', 'asdf', 23, 23);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
