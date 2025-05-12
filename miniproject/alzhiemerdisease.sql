-- phpMyAdmin SQL Dump
-- version 2.11.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 02, 2024 at 06:30 AM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `alzhiemerdisease`
--

-- --------------------------------------------------------

--
-- Table structure for table `userregister`
--

CREATE TABLE `userregister` (
  `id` int(50) NOT NULL auto_increment,
  `name` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `address` varchar(20) NOT NULL,
  `number` varchar(50) NOT NULL,
  `gender` varchar(25) NOT NULL,
  `bdate` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `lat` varchar(50) NOT NULL,
  `lang` varchar(50) NOT NULL,
  `distance` varchar(200) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `userregister`
--

INSERT INTO `userregister` (`id`, `name`, `username`, `address`, `number`, `gender`, `bdate`, `password`, `lat`, `lang`, `distance`) VALUES
(1, 'joyal', 'joy', 'trichy', '8525811519', 'Male', '3/4/2024', '123', '10.802937', '78.692039', '3'),
(2, 'joyal', 'jo', 'trichy', '8525811519', 'Male', '4/4/2024', '123', '13.0827', '80.2707', '306188');
