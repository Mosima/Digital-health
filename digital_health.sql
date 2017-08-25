-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 25, 2017 at 06:13 PM
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
-- Stand-in structure for view `allpatient_view`
--
CREATE TABLE `allpatient_view` (
`patientID` varchar(14)
,`FirstName` varchar(50)
,`Surname` varchar(50)
,`Gender` varchar(50)
,`HomeAddress` varchar(70)
,`Email` varchar(50)
,`CellNumber` varchar(50)
,`createDate` varchar(10)
,`kinName` varchar(30)
,`kinCell` varchar(11)
,`Role` varchar(50)
);

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `patientID` varchar(14) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `Surname` varchar(50) NOT NULL,
  `Gender` varchar(50) NOT NULL,
  `HomeAddress` varchar(70) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `CellNumber` varchar(50) NOT NULL,
  `createDate` varchar(10) DEFAULT NULL,
  `kinName` varchar(30) DEFAULT NULL,
  `kinCell` varchar(11) NOT NULL,
  `Role` varchar(50) NOT NULL DEFAULT 'Patient'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`patientID`, `FirstName`, `Surname`, `Gender`, `HomeAddress`, `Email`, `CellNumber`, `createDate`, `kinName`, `kinCell`, `Role`) VALUES
('9105295299083', 'cebo', 'shez', 'Male', '0', 'dludlec.b@gmail.com', '834271834', '2017-08-24', 'sfiso', '0834284215', 'Patient');

-- --------------------------------------------------------

--
-- Table structure for table `patienthistory`
--

CREATE TABLE `patienthistory` (
  `patientID` varchar(50) NOT NULL,
  `medicalEvent` varchar(25) NOT NULL,
  `dateOfEvent` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `patientmedicine`
--

CREATE TABLE `patientmedicine` (
  `patientID` varchar(50) NOT NULL,
  `presDate` varchar(10) NOT NULL,
  `presCode` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `patienttreatment`
--

CREATE TABLE `patienttreatment` (
  `treatID` int(11) NOT NULL,
  `patientID` varchar(50) NOT NULL,
  `doctorID` varchar(20) NOT NULL,
  `treatmentDate` varchar(20) NOT NULL,
  `Description` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `patientvisit`
--

CREATE TABLE `patientvisit` (
  `patientID` varchar(50) NOT NULL,
  `comments` varchar(100) DEFAULT NULL,
  `visitDate` varchar(20) NOT NULL,
  `Diagnosis` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE `prescription` (
  `presCode` varchar(10) NOT NULL,
  `description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `staffmember`
--

CREATE TABLE `staffmember` (
  `staffID` varchar(15) NOT NULL,
  `name` varchar(25) NOT NULL,
  `Surname` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(10) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staffmember`
--

INSERT INTO `staffmember` (`staffID`, `name`, `Surname`, `email`, `username`, `password`, `role`) VALUES
('AD9105295299083', 'cebo', 'admin', 'admin@gmail.com', 'admin', 'admin', 'Admin');

-- --------------------------------------------------------

--
-- Structure for view `allpatient_view`
--
DROP TABLE IF EXISTS `allpatient_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `allpatient_view`  AS  select `patient`.`patientID` AS `patientID`,`patient`.`FirstName` AS `FirstName`,`patient`.`Surname` AS `Surname`,`patient`.`Gender` AS `Gender`,`patient`.`HomeAddress` AS `HomeAddress`,`patient`.`Email` AS `Email`,`patient`.`CellNumber` AS `CellNumber`,`patient`.`createDate` AS `createDate`,`patient`.`kinName` AS `kinName`,`patient`.`kinCell` AS `kinCell`,`patient`.`Role` AS `Role` from `patient` order by `patient`.`Email` ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
