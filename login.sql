-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2017 at 07:23 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `login`
--

-- --------------------------------------------------------

--
-- Table structure for table `alogin`
--

CREATE TABLE IF NOT EXISTS `alogin` (
  `Admin_Id` varchar(50) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alogin`
--

INSERT INTO `alogin` (`Admin_Id`, `password`) VALUES
('admin@nit', 'admin@#12');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE IF NOT EXISTS `attendance` (
  `SemId` int(11) NOT NULL,
  `SubCode` varchar(50) NOT NULL,
  `RegID` int(11) NOT NULL,
  `Attendance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`SemId`, `SubCode`, `RegID`, `Attendance`) VALUES
(1, 'CS11101', 2, 8),
(1, 'CS11101', 1, 10);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
`CourseId` int(11) NOT NULL,
  `CourseName` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`CourseId`, `CourseName`) VALUES
(1, 'Computer Science and Engineering'),
(2, 'Electrical and Electronics Engineering'),
(3, 'Electronics and Communication Engineering');

-- --------------------------------------------------------

--
-- Table structure for table `flogin`
--

CREATE TABLE IF NOT EXISTS `flogin` (
`Faculty_Id` int(11) NOT NULL,
  `FEmail_Id` varchar(40) NOT NULL,
  `password` varchar(50) NOT NULL,
  `FName` text NOT NULL,
  `FaName` text NOT NULL,
  `Address` varchar(40) NOT NULL,
  `Gender` text NOT NULL,
  `JDate` date NOT NULL,
  `City` text NOT NULL,
  `PhNo` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `flogin`
--

INSERT INTO `flogin` (`Faculty_Id`, `FEmail_Id`, `password`, `FName`, `FaName`, `Address`, `Gender`, `JDate`, `City`, `PhNo`) VALUES
(3, 'shubhanshu@gmail.com', 'iloveshubho', 'subhanshu', 'C B Tripathi', 'fatehpur', 'Male', '2017-10-03', 'allahabad', '8436838503'),
(4, 'subham@gupta', 'subham', '', '', '', '', '0000-00-00', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `gquery`
--

CREATE TABLE IF NOT EXISTS `gquery` (
  `GEmail_Id` varchar(40) NOT NULL,
  `Query` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gquery`
--

INSERT INTO `gquery` (`GEmail_Id`, `Query`) VALUES
('sarugupta@yahoo.in', 'how n why'),
('kajolgupta@yahoo.in', 'how and why'),
('trishu@gupta', 'how n why');

-- --------------------------------------------------------

--
-- Table structure for table `guest`
--

CREATE TABLE IF NOT EXISTS `guest` (
`GuEid` int(11) NOT NULL,
  `Gname` text NOT NULL,
  `GEmail_Id` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guest`
--

INSERT INTO `guest` (`GuEid`, `Gname`, `GEmail_Id`) VALUES
(3, 'abhishek', ''),
(5, 'trishu', ''),
(6, 'kajol gupta', ''),
(7, 'saru', 'sarugupta@yahoo.in'),
(8, 'kajol gupta', 'kajolgupta@yahoo.in'),
(9, 'trishu', 'trishu@gupta');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `Email_Id` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `FirstName` text NOT NULL,
  `LastName` text NOT NULL,
`RegID` int(11) NOT NULL,
  `FaName` text NOT NULL,
  `SemId` int(11) NOT NULL,
  `CourseId` int(11) NOT NULL,
  `DOB` date NOT NULL,
  `Address` varchar(40) NOT NULL,
  `Gender` text NOT NULL,
  `PhNo` varchar(30) NOT NULL,
  `Isactive` tinyint(1) NOT NULL DEFAULT '1',
  `Isconfirm` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`Email_Id`, `password`, `FirstName`, `LastName`, `RegID`, `FaName`, `SemId`, `CourseId`, `DOB`, `Address`, `Gender`, `PhNo`, `Isactive`, `Isconfirm`) VALUES
('trishnagupta56@gmail.com', 'trishu@#12', 'trishna', 'gupta', 1, 'sachin gupta', 1, 1, '2017-10-18', 'ballia', 'Female', '8436838503', 1, 1),
('shubhanshu@gmail.com', 'subho@#12', 'subhanshu', 'tripathi', 2, 'C B Tripathi', 2, 2, '2017-10-01', 'fatehpur', '', '9593978435', 1, 1),
('saritagupta400@yahoo.in', 'sarita@#12', 'sarita', 'gupta', 3, 'birendra gupta', 2, 1, '2017-10-04', 'ballia', 'Male', '8436838503', 1, 1),
('Trishna@gmail.com', '12345', 'Trishna', 'Gupta', 6, 'Sachin Gupta', 0, 1, '1993-12-22', 'chennai', 'Female', '9679778401', 1, 1),
('shubha77nshu@gmail.com', 'iloveshubho', 'Shubh', 'werty', 7, 'dfghjk', 2, 2, '2009-12-22', 'erty', 'Male', '4567896789', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `query`
--

CREATE TABLE IF NOT EXISTS `query` (
`Qid` int(11) NOT NULL,
  `Eid` int(11) NOT NULL,
  `Query` text NOT NULL,
  `Ans` text NOT NULL,
  `Isactive` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `query`
--

INSERT INTO `query` (`Qid`, `Eid`, `Query`, `Ans`, `Isactive`) VALUES
(4, 1, '							how does mirage phenomena occurs ', '													', 0),
(10, 1, '							how does mirage phenomena occur ', '					sdsfdfsdfs								', 1),
(11, 1, 'asdasdasd', '', 1),
(13, 1, 'asasdasdasdasdasdas', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE IF NOT EXISTS `result` (
`RsID` int(11) NOT NULL,
  `RegID` int(11) NOT NULL,
  `SemId` int(11) NOT NULL,
  `SubCode` varchar(50) NOT NULL,
  `Marks` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`RsID`, `RegID`, `SemId`, `SubCode`, `Marks`) VALUES
(65, 1, 1, 'CS11101', 23),
(66, 1, 1, 'CS11201', 65),
(67, 1, 1, 'HS11101', 6),
(68, 1, 1, 'HS11102', 88),
(69, 1, 1, 'MA11101', 54),
(70, 1, 1, 'ME11101', 56),
(71, 1, 1, 'PH11101', 55),
(72, 1, 1, 'PH11201', 88),
(73, 1, 1, 'ZZ11201', 99),
(74, 1, 1, 'ZZ11203', 23);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE IF NOT EXISTS `subjects` (
`SubId` int(11) NOT NULL,
  `SubCode` varchar(50) NOT NULL,
  `SubjectName` varchar(100) NOT NULL,
  `CourseId` int(11) NOT NULL,
  `SemId` int(11) NOT NULL,
  `IsElective` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=344 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`SubId`, `SubCode`, `SubjectName`, `CourseId`, `SemId`, `IsElective`) VALUES
(1, 'CS11101', 'Computer Programming', 1, 1, 0),
(2, 'CS11201', 'Computer Programming Laboratory', 1, 1, 0),
(3, 'HS11101', 'English Language and Composition', 1, 1, 0),
(4, 'HS11102', 'Professional Ethics & Value Education ', 1, 1, 0),
(5, 'MA11101', 'Mathematics-I', 1, 1, 1),
(6, 'ME11101', 'Engineering Mechanics', 1, 1, 0),
(7, 'PH11101', 'Physics', 1, 1, 0),
(8, 'PH11201', 'Physics Laboratory', 1, 1, 0),
(9, 'ZZ11201', 'Workshop Practice-I ( CE & ME)', 1, 1, 0),
(10, 'ZZ11203', 'Physical Education/ Sports/ NSS ', 1, 1, 0),
(11, 'CS11101', 'Computer Programming', 2, 1, 0),
(12, 'sasda', 'asds', 1, 1, 0),
(13, 'sasda', 'asds', 1, 1, 0),
(343, 'sdf', 'sdfsdf', 2, 3, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alogin`
--
ALTER TABLE `alogin`
 ADD PRIMARY KEY (`Admin_Id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
 ADD PRIMARY KEY (`CourseId`), ADD KEY `CourseId` (`CourseId`);

--
-- Indexes for table `flogin`
--
ALTER TABLE `flogin`
 ADD PRIMARY KEY (`Faculty_Id`), ADD UNIQUE KEY `FEmail_Id` (`FEmail_Id`);

--
-- Indexes for table `guest`
--
ALTER TABLE `guest`
 ADD PRIMARY KEY (`GuEid`), ADD KEY `GuEid` (`GuEid`), ADD KEY `GuEid_2` (`GuEid`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
 ADD PRIMARY KEY (`RegID`), ADD UNIQUE KEY `Email_Id` (`Email_Id`), ADD KEY `CourseId` (`CourseId`);

--
-- Indexes for table `query`
--
ALTER TABLE `query`
 ADD PRIMARY KEY (`Qid`), ADD KEY `Eid` (`Eid`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
 ADD PRIMARY KEY (`RsID`), ADD UNIQUE KEY `RsID_2` (`RsID`), ADD KEY `Eno` (`SemId`), ADD KEY `SubCode` (`SubCode`), ADD KEY `RegID` (`RegID`), ADD KEY `RsID` (`RsID`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
 ADD PRIMARY KEY (`SubId`), ADD KEY `SubCode` (`SubCode`), ADD KEY `CourseId` (`CourseId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
MODIFY `CourseId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `flogin`
--
ALTER TABLE `flogin`
MODIFY `Faculty_Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `guest`
--
ALTER TABLE `guest`
MODIFY `GuEid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
MODIFY `RegID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `query`
--
ALTER TABLE `query`
MODIFY `Qid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
MODIFY `RsID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=75;
--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
MODIFY `SubId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=344;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `login`
--
ALTER TABLE `login`
ADD CONSTRAINT `fk_user_Course` FOREIGN KEY (`CourseId`) REFERENCES `courses` (`CourseId`);

--
-- Constraints for table `query`
--
ALTER TABLE `query`
ADD CONSTRAINT `query_ibfk_1` FOREIGN KEY (`Eid`) REFERENCES `login` (`RegID`);

--
-- Constraints for table `subjects`
--
ALTER TABLE `subjects`
ADD CONSTRAINT `fk_sub_course` FOREIGN KEY (`CourseId`) REFERENCES `courses` (`CourseId`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
