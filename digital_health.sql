-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2017 at 03:04 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
-- (See below for the actual view)
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
,`role` varchar(50)
,`active` tinyint(1)
,`password` varchar(10)
,`username` varchar(15)
,`hospital` varchar(100)
,`logged_On` tinyint(1)
,`assignedTo` varchar(20)
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
  `role` varchar(50) NOT NULL DEFAULT 'Patient',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `password` varchar(10) NOT NULL,
  `username` varchar(15) NOT NULL,
  `hospital` varchar(100) DEFAULT NULL,
  `logged_On` tinyint(1) NOT NULL,
  `assignedTo` varchar(20) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`patientID`, `idNumber`, `FirstName`, `Surname`, `Gender`, `HomeAddress`, `Email`, `CellNumber`, `createDate`, `kinName`, `kinCell`, `role`, `active`, `password`, `username`, `hospital`, `logged_On`, `assignedTo`) VALUES
('299083', '9105295299083', 'D', 'SHEZI', 'Male', '0', 'dludlec.b@gmail.co.za', '0834271800', '2017-10-03', 'D', '0834241728', 'Patient', 1, '9083', '910529', 'Chris Hani Baragwana', 0, 'DR9529908');

-- --------------------------------------------------------

--
-- Table structure for table `patientmedicine`
--

CREATE TABLE `patientmedicine` (
  `patientID` varchar(50) NOT NULL,
  `presDate` varchar(10) NOT NULL,
  `presCode` varchar(20) NOT NULL,
  `comment` varchar(100) NOT NULL,
  `phamId` varchar(16) NOT NULL,
  `placeIssued` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patientmedicine`
--

INSERT INTO `patientmedicine` (`patientID`, `presDate`, `presCode`, `comment`, `phamId`, `placeIssued`) VALUES
('299083', '2017/10/02', '9993', 'he came for aids traetment', 'Pham9529908', 'Tshwane Hospital');

-- --------------------------------------------------------

--
-- Table structure for table `patienttreatment`
--

CREATE TABLE `patienttreatment` (
  `treatID` int(11) NOT NULL,
  `patientID` varchar(50) NOT NULL,
  `doctorID` varchar(20) NOT NULL,
  `treatmentDate` datetime(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `hospital` varchar(50) NOT NULL,
  `Description` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patienttreatment`
--

INSERT INTO `patienttreatment` (`treatID`, `patientID`, `doctorID`, `treatmentDate`, `hospital`, `Description`) VALUES
(1, '299083', 'DR9529908', '2017-10-15 00:00:00.000000', 'Baragwanath Hospital', 'Aids');

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE `prescription` (
  `presCode` int(11) NOT NULL,
  `description` varchar(50) NOT NULL,
  `patientID` varchar(16) NOT NULL,
  `treatID` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prescription`
--

INSERT INTO `prescription` (`presCode`, `description`, `patientID`, `treatID`, `active`) VALUES
(9993, 'flue', '299083', 1, 1);

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
('9102653', '11111111111', 'admin', 'admin', 'admin', 'admin', 'admin', 'admin', 'Admin', 1, 0, 1),
('DR9529908', '11111111111', 'n', 'j', 'zaind@kia.co.za', 'Male', '529529', '29908', 'Doctor', 1, 0, 1),
('Pham9529908', '9105295299083', 'Cebolamadlaba', 'shezi', 'dludlec.b@gmail.com', 'Male', '529529', '29908', 'Pharmacist', 1, 0, 1);

-- --------------------------------------------------------

--
-- Structure for view `allpatient_view`
--
DROP TABLE IF EXISTS `allpatient_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `allpatient_view`  AS  select `patient`.`patientID` AS `patientID`,`patient`.`idNumber` AS `idNumber`,`patient`.`FirstName` AS `FirstName`,`patient`.`Surname` AS `Surname`,`patient`.`Gender` AS `Gender`,`patient`.`HomeAddress` AS `HomeAddress`,`patient`.`Email` AS `Email`,`patient`.`CellNumber` AS `CellNumber`,`patient`.`createDate` AS `createDate`,`patient`.`kinName` AS `kinName`,`patient`.`kinCell` AS `kinCell`,`patient`.`role` AS `role`,`patient`.`active` AS `active`,`patient`.`password` AS `password`,`patient`.`username` AS `username`,`patient`.`hospital` AS `hospital`,`patient`.`logged_On` AS `logged_On`,`patient`.`assignedTo` AS `assignedTo` from `patient` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hospital`
--
ALTER TABLE `hospital`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `patienttreatment`
--
ALTER TABLE `patienttreatment`
  ADD PRIMARY KEY (`treatID`);

--
-- Indexes for table `prescription`
--
ALTER TABLE `prescription`
  ADD PRIMARY KEY (`presCode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hospital`
--
ALTER TABLE `hospital`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `patienttreatment`
--
ALTER TABLE `patienttreatment`
  MODIFY `treatID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `prescription`
--
ALTER TABLE `prescription`
  MODIFY `presCode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9994;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
