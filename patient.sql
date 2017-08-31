-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 31, 2017 at 07:20 AM
-- Server version: 5.7.11
-- PHP Version: 5.6.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `digital_health`
--

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `patientID` varchar(14) NOT NULL,
  `idNumber` varchar(14) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `Surname` varchar(50) NOT NULL,
  `Gender` varchar(50) NOT NULL,
  `HomeAddress` varchar(70) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `CellNumber` varchar(50) NOT NULL,
  `createDate` varchar(10) DEFAULT NULL,
  `username` varchar(12) NOT NULL,
  `password` varchar(10) NOT NULL,
  `kinName` varchar(30) DEFAULT NULL,
  `kinCell` varchar(11) NOT NULL,
  `Role` varchar(50) NOT NULL DEFAULT 'Patient',
  `active` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`patientID`, `idNumber`, `FirstName`, `Surname`, `Gender`, `HomeAddress`, `Email`, `CellNumber`, `createDate`, `username`, `password`, `kinName`, `kinCell`, `Role`, `active`) VALUES
('299083', '9105295299083', 'cebo', 'Shezi', 'Male', '2685', 'dludlec.b@gmail.com', '834271834', '2017-08-31', '910529', '9083', 'cebo', '0834271834', 'Patient', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
