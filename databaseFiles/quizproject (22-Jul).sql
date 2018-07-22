-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2018 at 09:15 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quizproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `aid` int(11) NOT NULL,
  `adname` varchar(20) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aid`, `adname`, `password`) VALUES
(1, 'subrantaker123', '4709b46906c8ca86ca4f6fe57e78dd55');

-- --------------------------------------------------------

--
-- Table structure for table `forum`
--

CREATE TABLE `forum` (
  `fid` int(11) NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `question` text,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum`
--

INSERT INTO `forum` (`fid`, `uid`, `question`, `date`) VALUES
(2, 2, 'how to set path of a application', '2014-07-18'),
(15, 1, 'how to access phpmyadmin', '2014-07-18');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `quid` int(11) NOT NULL,
  `qname` varchar(150) DEFAULT NULL,
  `sid` int(11) DEFAULT NULL,
  `op1` varchar(50) DEFAULT NULL,
  `op2` varchar(50) DEFAULT NULL,
  `op3` varchar(50) DEFAULT NULL,
  `op4` varchar(50) DEFAULT NULL,
  `ans` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`quid`, `qname`, `sid`, `op1`, `op2`, `op3`, `op4`, `ans`) VALUES
(1, 'what type of language is ', 1, 'pop', 'oop', 'obp', 'none of these', 'pop'),
(5, 'what is php?', 7, 'server side language', 'client side language', 'both', 'none of these', 'server side language'),
(6, 'int p; p=10 value of p+++++p?', 6, '22', '20', '21', '19', '22'),
(7, 'what is range  signed char?', 6, '0 to 255', '-128 to 127', '-127 to 128', 'none of these', '-128 to 127');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subid` int(11) NOT NULL,
  `sname` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subid`, `sname`) VALUES
(1, 'java'),
(5, 'c++'),
(6, 'c'),
(7, 'php');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` int(10) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL,
  `phone` bigint(20) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `address` text,
  `picture` varchar(50) DEFAULT NULL,
  `course` varchar(20) DEFAULT NULL,
  `totalMarks` int(10) DEFAULT NULL,
  `marksObt` int(10) DEFAULT NULL,
  `grade` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `username`, `password`, `city`, `phone`, `email`, `date`, `address`, `picture`, `course`, `totalMarks`, `marksObt`, `grade`) VALUES
(1, 'kevin', 'yankyankyank', 'patna', 9987346578, 'keivni@gmail.com', '2014-08-10', '221 avenue', 'images/adminpic.jpg', 'MCA', 600, 200, 'D'),
(2, 'orielly', 'reallyreallyreally', 'patna', 9987557898, 'orielly@gmail.com', '2014-08-11', '22 baker street', 'images/6f4922f45568161a8cdf4ad2299f6d23.jpg', 'BCA', 400, 200, 'B'),
(4, 'robin', 'donutdonutdonut', 'ranchi', 9989461055, 'robin@gmail.com', '2014-09-29', '13 lake street', 'images/aab3238922bcc25a6f606eb525ffdc56.jpg', 'none', 700, 500, 'A'),
(6, 'subir', '1111111111111111', 'patna', 9199102568, 'subir@gmail.com', '2014-07-09', 'jharkhandi', 'images/98f13708210194c475687be6106a3b84.jpg', 'DCA', 600, 400, 'A'),
(9, 'subham', '1234567890', 'ranchi', 9999897812, 'subham@gmail.com', '2014-07-09', 'Nepali', 'images/6ded2136692e13c3b45c454a22be28a3.jpg', 'MCA', 600, 500, 'A'),
(13, 'avik', 'avikavikavikavik', 'ranchi', 9989781234, 'avik@gmail.com', '2014-07-10', 'kolkata', 'images/adminpic.jpg', 'DCA', 700, 600, 'A'),
(14, 'robert', 'robertrobert', 'patna', 9989781234, 'robert@gmail.com', '2014-07-10', 'chandrapur', 'images/adminpic.jpg', 'MCA', 800, 600, 'A'),
(16, 'startrek', 'startrekstartrek', 'patna', 9989781234, 'startrek@gmail.com', '2014-07-10', 'kolkata', 'images/c4ca4238a0b923820dcc509a6f75849b.jpg', 'MCA', 800, 500, 'A'),
(17, 'starcast', 'starcaststarcast', 'ranchi', 9989781234, 'starcast@gmai.com', '2014-07-10', 'ranchi', 'images/adminpic.jpg', 'MCA', 600, 400, 'A'),
(18, 'beckham', 'beckhambeckham', 'patna', 9989781234, 'beckham@gmail.com', '2014-07-10', 'patna', 'images/6512bd43d9caa6e02c990b0a82652dca.jpg', 'MCA', 600, 400, 'A'),
(21, 'milano', 'milanomilanomilano', 'patna', 9989781234, 'milano@gmail.com', '2014-07-11', 'patna', 'images/b097bdf5b3b732a4a377921c9a0d50d6.jpg', 'BCA', 400, 150, 'D'),
(25, 'robben', 'neymarneymarneymar', 'ranchi', 8923456789, 'robben@gmail.com', '2014-07-13', 'ranchi', 'images/adminpic.jpg', 'BCA', 500, 400, 'A'),
(26, 'arjen', 'neymar@gmail.com', 'ranchi', 8923456789, 'neymar@gmail.com', '2014-07-14', 'ranchi', 'images/adminpic.jpg', 'BCA', 800, 500, 'A'),
(27, 'ney', 'neymarneymarneymar', 'ranchi', 8923456789, 'robben@gmail.com', '2014-07-14', 'ranchi', 'images/adminpic.jpg', 'BCA', 600, 300, 'B'),
(28, 'alves', 'alvesalvesalvesalves', 'ranchi', 8923456789, 'alves@gmail.com', '2014-07-14', 'ranchi', 'images/9b39121e7d5084e19190b19d876f8270.jpg', 'MCA', 0, 0, ''),
(29, 'arjun', 'arjunarjunarjun', 'ranchi', 8923456789, 'arjun@gmail.com', '2014-07-14', 'ranchi', 'images/a24f37e79f1f8ad381bae0cd4d04ce14.jpg', 'MCA', 0, 0, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`quid`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `forum`
--
ALTER TABLE `forum`
  MODIFY `fid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `quid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
