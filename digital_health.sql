-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 25, 2017 at 06:17 PM
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
`patientID` varchar(16)
,`idNumber` varchar(14)
,`FirstName` varchar(50)
,`Surname` varchar(50)
,`Gender` varchar(50)
,`HomeAddress` varchar(70)
,`Email` varchar(50)
,`CellNumber` varchar(12)
,`createDate` varchar(10)
,`kinName` varchar(30)
,`kinCell` varchar(11)
,`Role` varchar(50)
,`active` tinyint(1)
,`password` varchar(10)
,`username` varchar(15)
);

-- --------------------------------------------------------

--
-- Table structure for table `hospital`
--

CREATE TABLE `hospital` (
  `Id` int(11) NOT NULL,
  `Hospital_Name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hospital`
--

INSERT INTO `hospital` (`Id`, `Hospital_Name`) VALUES
(1, 'Chris Hani Baragwana'),
(2, 'Steve Biko Academic'),
(3, 'Tshwane District Hospital'),
(4, 'DR Goerge Mukhari');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `patientID` varchar(16) NOT NULL,
  `idNumber` varchar(14) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `Surname` varchar(50) NOT NULL,
  `Gender` varchar(50) NOT NULL,
  `HomeAddress` varchar(70) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `CellNumber` varchar(12) NOT NULL,
  `createDate` varchar(10) DEFAULT NULL,
  `kinName` varchar(30) DEFAULT NULL,
  `kinCell` varchar(11) NOT NULL,
  `Role` varchar(50) NOT NULL DEFAULT 'Patient',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `password` varchar(10) NOT NULL,
  `username` varchar(15) NOT NULL,
  `hospital_Id` int(4) NOT NULL,
  `logged_On` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`patientID`, `idNumber`, `FirstName`, `Surname`, `Gender`, `HomeAddress`, `Email`, `CellNumber`, `createDate`, `kinName`, `kinCell`, `Role`, `active`, `password`, `username`, `hospital_Id`, `logged_On`) VALUES
('299083', '9105295299083', 'cebo', 'Shezi', 'Male', '4', 'dludlec.b@gmail.com', '834271834', '2017-09-22', 'z', '0834198245', 'Patient', 1, '9083', '910529', 0, 0);

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
  `idNumber` varchar(15) NOT NULL,
  `Firstname` varchar(25) NOT NULL,
  `Surname` varchar(35) NOT NULL,
  `Email` varchar(25) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `username` varchar(13) NOT NULL,
  `password` varchar(13) NOT NULL,
  `role` varchar(10) NOT NULL,
  `hospital_Id` int(4) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `logged_On` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staffmember`
--

INSERT INTO `staffmember` (`staffID`, `idNumber`, `Firstname`, `Surname`, `Email`, `Gender`, `username`, `password`, `role`, `hospital_Id`, `active`, `logged_On`) VALUES
('9102653', '653142545', 'admin', 'admin', 'admin', 'admin', 'admin', 'admin', 'Admin', 0, 0, 0),
('DR9529908', '9105295299083', 'n', 'j', 'zaind@kia.co.za', 'Male', '529529', '29908', 'Doctor', 0, 0, 0);

-- --------------------------------------------------------

--
-- Structure for view `allpatient_view`
--
DROP TABLE IF EXISTS `allpatient_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `allpatient_view`  AS  select `patient`.`patientID` AS `patientID`,`patient`.`idNumber` AS `idNumber`,`patient`.`FirstName` AS `FirstName`,`patient`.`Surname` AS `Surname`,`patient`.`Gender` AS `Gender`,`patient`.`HomeAddress` AS `HomeAddress`,`patient`.`Email` AS `Email`,`patient`.`CellNumber` AS `CellNumber`,`patient`.`createDate` AS `createDate`,`patient`.`kinName` AS `kinName`,`patient`.`kinCell` AS `kinCell`,`patient`.`Role` AS `Role`,`patient`.`active` AS `active`,`patient`.`password` AS `password`,`patient`.`username` AS `username` from `patient` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hospital`
--
ALTER TABLE `hospital`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hospital`
--
ALTER TABLE `hospital`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
