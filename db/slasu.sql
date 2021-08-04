-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 04, 2021 at 11:14 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 5.6.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `slasu`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `adminId` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(50) NOT NULL,
  `secondName` varchar(50) DEFAULT NULL,
  `userName` varchar(50) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `mobile` varchar(10) DEFAULT NULL,
  `nic` varchar(15) NOT NULL,
  `password` varchar(40) NOT NULL,
  `role` varchar(6) NOT NULL,
  PRIMARY KEY (`nic`,`adminId`),
  KEY `adminId` (`adminId`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `athlete`
--

CREATE TABLE IF NOT EXISTS `athlete` (
  `athleteId` int(11) NOT NULL AUTO_INCREMENT,
  `athleteCode` varchar(12) NOT NULL DEFAULT 'SLASU/A/00',
  `regType` int(1) NOT NULL,
  `clubId` int(11) DEFAULT NULL,
  `affiliationCat` int(1) NOT NULL,
  `athleteName` varchar(100) NOT NULL,
  `gender` int(1) NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(200) NOT NULL,
  `phone1` varchar(10) NOT NULL,
  `phone2` varchar(10) DEFAULT NULL,
  `whatsapp` varchar(10) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `nameForCert` varchar(100) NOT NULL,
  `bbNo` varchar(20) NOT NULL,
  `bbDistrict` varchar(25) NOT NULL,
  `bbDate` date NOT NULL,
  `bbPhoto` longblob NOT NULL,
  `postalId` varchar(20) DEFAULT NULL,
  `nic` varchar(12) DEFAULT NULL,
  `ppNo` varchar(20) DEFAULT NULL,
  `paymentStatus` int(11) DEFAULT '0',
  `paymentRef` int(11) DEFAULT NULL,
  PRIMARY KEY (`athleteId`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `club`
--

CREATE TABLE IF NOT EXISTS `club` (
  `clubId` int(11) NOT NULL AUTO_INCREMENT,
  `clubCode` varchar(11) NOT NULL DEFAULT 'SLASU/CL/00',
  `clubType` int(1) NOT NULL,
  `clubName` varchar(100) NOT NULL,
  `district` varchar(25) NOT NULL,
  `operatorName` varchar(100) NOT NULL,
  `operatorEmail` varchar(100) NOT NULL,
  `operatorMobile` varchar(10) NOT NULL,
  `operatorPassword` varchar(45) NOT NULL,
  `operatorWhatsapp` varchar(10) DEFAULT NULL,
  `operatorNic` varchar(12) NOT NULL,
  `regType` int(1) NOT NULL,
  `requestLetter` longblob,
  `affiliationCat` int(1) NOT NULL,
  `postalAddress` varchar(150) NOT NULL,
  `clubContactOne` varchar(10) NOT NULL,
  `clubContactTwo` varchar(10) DEFAULT NULL,
  `clubEmailOne` varchar(100) DEFAULT NULL,
  `clubEmailTwo` varchar(100) DEFAULT NULL,
  `inchargeName` varchar(100) NOT NULL,
  `inchargeMobile` varchar(10) NOT NULL,
  `inchargeEmail` varchar(100) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `affiliationFeeStatus` int(11) NOT NULL DEFAULT '0',
  `enrollmentFeeStatus` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`clubId`,`operatorMobile`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `coach`
--

CREATE TABLE IF NOT EXISTS `coach` (
  `coachId` int(11) NOT NULL AUTO_INCREMENT,
  `coachCode` varchar(12) NOT NULL DEFAULT 'SLASU/C/00',
  `regType` int(1) NOT NULL,
  `clubId` int(11) NOT NULL,
  `affiliationCat` int(1) NOT NULL,
  `coachName` varchar(100) NOT NULL,
  `gender` int(1) NOT NULL,
  `coachMobileOne` varchar(10) NOT NULL,
  `coachMobileTwo` varchar(10) DEFAULT NULL,
  `coachWhatsapp` varchar(10) DEFAULT NULL,
  `coachEmail` varchar(100) DEFAULT NULL,
  `coachNameForId` varchar(100) NOT NULL,
  `photoForId` blob NOT NULL,
  `application` longblob,
  `dob` date NOT NULL,
  `homeAddress` varchar(200) NOT NULL,
  `designation` varchar(100) DEFAULT NULL,
  `nic` varchar(12) NOT NULL,
  `nicPhoto` blob NOT NULL,
  `qualifications` varchar(1000) DEFAULT NULL,
  `ppNo` varchar(20) DEFAULT NULL,
  `paymentStatus` int(11) DEFAULT '0',
  `paymentRef` int(11) DEFAULT NULL,
  PRIMARY KEY (`coachId`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `paymentId` int(11) NOT NULL AUTO_INCREMENT,
  `paymentCode` varchar(10) NOT NULL DEFAULT 'SLASU/P/00',
  `clubId` int(11) DEFAULT NULL,
  `amount` double NOT NULL,
  `notes` varchar(300) DEFAULT NULL,
  `athleteList` mediumtext,
  `coachList` mediumtext,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '1',
  `adminComment` varchar(300) DEFAULT NULL,
  `affiliationFeeStatus` int(1) DEFAULT NULL,
  `enrollmentFeeStatus` int(1) DEFAULT NULL,
  `chequeNo` varchar(30) DEFAULT NULL,
  `paymentMode` int(1) DEFAULT NULL,
  PRIMARY KEY (`paymentId`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
