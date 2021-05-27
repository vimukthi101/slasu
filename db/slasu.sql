-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2021 at 07:25 AM
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
-- Table structure for table `athlete`
--

CREATE TABLE `athlete` (
  `athleteId` int(11) NOT NULL,
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
  `bbPhoto` blob NOT NULL,
  `postalId` varchar(20) DEFAULT NULL,
  `nic` varchar(12) DEFAULT NULL,
  `ppNo` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `athlete`
--

INSERT INTO `athlete` (`athleteId`, `regType`, `clubId`, `affiliationCat`, `athleteName`, `gender`, `dob`, `address`, `phone1`, `phone2`, `whatsapp`, `email`, `nameForCert`, `bbNo`, `bbDistrict`, `bbDate`, `bbPhoto`, `postalId`, `nic`, `ppNo`) VALUES
(1, 1, 2, 3, 'vimukthi saranga', 2, '2021-04-25', 'ssssasdasd, piliyanal', '0711790372', '0711790372', '0711790372', 'v@g.lk', 'vimukthi saranga', '1161616492d', 'Galle', '2021-05-13', 0x4a6f62204465736372697074696f6e2e706466, '233213123f', '931340034v', '486258x');

-- --------------------------------------------------------

--
-- Table structure for table `club`
--

CREATE TABLE `club` (
  `clubId` int(11) NOT NULL,
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
  `requestLetter` blob,
  `affiliationCat` int(1) NOT NULL,
  `postalAddress` varchar(150) NOT NULL,
  `clubContactOne` varchar(10) NOT NULL,
  `clubContactTwo` varchar(10) DEFAULT NULL,
  `clubEmailOne` varchar(100) DEFAULT NULL,
  `clubEmailTwo` varchar(100) DEFAULT NULL,
  `inchargeName` varchar(100) NOT NULL,
  `inchargeMobile` varchar(10) NOT NULL,
  `inchargeEmail` varchar(100) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `club`
--

INSERT INTO `club` (`clubId`, `clubType`, `clubName`, `district`, `operatorName`, `operatorEmail`, `operatorMobile`, `operatorPassword`, `operatorWhatsapp`, `operatorNic`, `regType`, `requestLetter`, `affiliationCat`, `postalAddress`, `clubContactOne`, `clubContactTwo`, `clubEmailOne`, `clubEmailTwo`, `inchargeName`, `inchargeMobile`, `inchargeEmail`, `status`) VALUES
(2, 1, 'ananda college', 'Galle', 'vimukthi saranga', 'v@gmail.com', '0711790372', '660055', '0711790372', '931340034v', 1, 0x47656e6572616c2d436c65726963616c2d436f7665722d4c65747465722e646f6378, 2, 'ssssqq', '', '0711790372', 'v@gmail.com', 'v@gmail.com', 'kumudu daya', '0112608198', 'v@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `coach`
--

CREATE TABLE `coach` (
  `coachId` int(11) NOT NULL,
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
  `application` blob,
  `dob` date NOT NULL,
  `homeAddress` varchar(200) NOT NULL,
  `designation` varchar(100) DEFAULT NULL,
  `nic` varchar(12) NOT NULL,
  `nicPhoto` blob NOT NULL,
  `qualifications` varchar(1000) DEFAULT NULL,
  `ppNo` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coach`
--

INSERT INTO `coach` (`coachId`, `regType`, `clubId`, `affiliationCat`, `coachName`, `gender`, `coachMobileOne`, `coachMobileTwo`, `coachWhatsapp`, `coachEmail`, `coachNameForId`, `photoForId`, `application`, `dob`, `homeAddress`, `designation`, `nic`, `nicPhoto`, `qualifications`, `ppNo`) VALUES
(1, 1, 1, 1, 'vimukthi saranga', 2, '0711790372', '0711790372', '0711790372', 'v@g.lk', 'vimukthi saranga', 0x74682e6a7067, 0x47656e6572616c2d436c65726963616c2d436f7665722d4c65747465722e646f6378, '2021-05-02', 'ssssqq', 'coach', '931340034v', 0x4a6f62204465736372697074696f6e2e706466, 'hello world\r\nthis is empty', '486258x');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `athlete`
--
ALTER TABLE `athlete`
  ADD PRIMARY KEY (`athleteId`);

--
-- Indexes for table `club`
--
ALTER TABLE `club`
  ADD PRIMARY KEY (`clubId`,`operatorMobile`);

--
-- Indexes for table `coach`
--
ALTER TABLE `coach`
  ADD PRIMARY KEY (`coachId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `athlete`
--
ALTER TABLE `athlete`
  MODIFY `athleteId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `club`
--
ALTER TABLE `club`
  MODIFY `clubId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `coach`
--
ALTER TABLE `coach`
  MODIFY `coachId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
