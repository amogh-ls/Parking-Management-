-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 29, 2020 at 05:28 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `nautilus`
--
CREATE DATABASE IF NOT EXISTS `nautilus` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `nautilus`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'Darshan', 'darshan'),
(2, 'root', 'root');

-- --------------------------------------------------------

--
-- Table structure for table `entry_1`
--

CREATE TABLE IF NOT EXISTS `entry_1` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `registration_no` varchar(12) NOT NULL,
  `vehicle_size` varchar(20) NOT NULL,
  `entry_time` time NOT NULL,
  `date` date NOT NULL,
  `parking_lot` varchar(10) DEFAULT NULL,
  `price` int(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `registration_no` (`registration_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `entry_1`
--

INSERT INTO `entry_1` (`id`, `registration_no`, `vehicle_size`, `entry_time`, `date`, `parking_lot`, `price`) VALUES
(1, 'KA47H336', 'SMALL', '10:52:55', '2020-09-29', 'F1-P1', NULL),
(2, 'KA47J336', 'MEDIUM', '10:53:28', '2020-09-29', 'F1-P2', 10),
(3, 'KA47K336', 'SMALL', '10:53:46', '2020-09-29', 'F2-P3', 5),
(4, 'KA47L336', 'LARGE', '10:54:09', '2020-09-29', 'F2-P4', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pricing`
--

CREATE TABLE IF NOT EXISTS `pricing` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `small` int(11) NOT NULL,
  `medium` int(11) NOT NULL,
  `large` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `pricing`
--

INSERT INTO `pricing` (`id`, `small`, `medium`, `large`) VALUES
(1, 5, 10, 20);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
