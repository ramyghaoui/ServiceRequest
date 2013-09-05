-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 01, 2013 at 02:05 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `servicerequests`
--
CREATE DATABASE IF NOT EXISTS `servicerequests` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `servicerequests`;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE IF NOT EXISTS `departments` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Department` varchar(20) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`ID`, `Department`) VALUES
(1, 'IT'),
(2, 'Accounts'),
(3, 'Human Resources'),
(4, 'Production'),
(5, 'Purchasing'),
(6, 'Sales and marketing'),
(7, 'Management');

-- --------------------------------------------------------

--
-- Table structure for table `servicerequests`
--

CREATE TABLE IF NOT EXISTS `servicerequests` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Requested_by` varchar(11) NOT NULL,
  `Urgency` varchar(6) NOT NULL,
  `ServiceType` varchar(30) NOT NULL,
  `Problem` varchar(255) NOT NULL,
  `Status` varchar(11) NOT NULL,
  `Solution` varchar(255) NOT NULL,
  `SubmittedDate` varchar(20) NOT NULL,
  `TimeCost` varchar(20) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=63 ;

-- --------------------------------------------------------

--
-- Table structure for table `servicetypes`
--

CREATE TABLE IF NOT EXISTS `servicetypes` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ServiceType` varchar(30) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `servicetypes`
--

INSERT INTO `servicetypes` (`ID`, `ServiceType`) VALUES
(1, 'Data Recovery'),
(2, 'E-mail support'),
(3, 'Hardware'),
(4, 'Network Connection'),
(5, 'Other'),
(6, 'Printer/Scanner/Multifunction'),
(7, 'Shared Folder'),
(8, 'Software support'),
(9, 'System Support');

-- --------------------------------------------------------

--
-- Table structure for table `titles`
--

CREATE TABLE IF NOT EXISTS `titles` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(20) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `titles`
--

INSERT INTO `titles` (`ID`, `Title`) VALUES
(1, 'CEO'),
(2, 'IT Administrator'),
(3, 'Managing Director'),
(4, 'Operator');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(32) NOT NULL,
  `FirstName` varchar(20) NOT NULL,
  `LastName` varchar(20) NOT NULL,
  `E-mail` varchar(20) NOT NULL,
  `Department` varchar(20) NOT NULL,
  `Title` varchar(20) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `Username`, `Password`, `FirstName`, `LastName`, `E-mail`, `Department`, `Title`) VALUES
(1, 'ramy', '32250170a0dca92d53ec9624f336ca24', 'Ramy', 'El-GHAOUI', 'ramy@domain.com', 'IT', 'IT Administrator');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
