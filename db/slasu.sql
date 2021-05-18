-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2021 at 06:55 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `club`
--

CREATE TABLE `club` (
  `clubId` int(11) NOT NULL,
  `clubType` int(11) NOT NULL,
  `clubName` varchar(100) NOT NULL,
  `district` varchar(25) NOT NULL,
  `operatorName` varchar(100) NOT NULL,
  `operatorEmail` varchar(100) NOT NULL,
  `operatorMobile` varchar(10) NOT NULL,
  `operatorPassword` varchar(45) NOT NULL,
  `operatorWhatsapp` varchar(10) DEFAULT NULL,
  `operatorNic` varchar(10) NOT NULL,
  `regType` int(11) NOT NULL,
  `requestLetter` blob DEFAULT NULL,
  `affiliationCat` varchar(25) NOT NULL,
  `postalAddress` varchar(150) NOT NULL,
  `clubContactOne` varchar(10) NOT NULL,
  `clubContactTwo` varchar(10) DEFAULT NULL,
  `clubEmailOne` varchar(100) DEFAULT NULL,
  `clubEmailTwo` varchar(100) DEFAULT NULL,
  `inchargeName` varchar(100) NOT NULL,
  `inchargeMobile` varchar(10) NOT NULL,
  `inchargeEmail` varchar(100) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `club`
--
ALTER TABLE `club`
  ADD PRIMARY KEY (`clubId`,`operatorMobile`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `club`
--
ALTER TABLE `club`
  MODIFY `clubId` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
