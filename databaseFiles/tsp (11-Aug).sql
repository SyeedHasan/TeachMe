-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 11, 2018 at 07:12 PM
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
-- Database: `tsp`
--

-- --------------------------------------------------------

--
-- Table structure for table `classrooms`
--

CREATE TABLE `classrooms` (
  `classroomId` int(11) NOT NULL,
  `className` varchar(50) NOT NULL,
  `numStudents` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classrooms`
--

INSERT INTO `classrooms` (`classroomId`, `className`, `numStudents`) VALUES
(1, 'Syeds Class', 0),
(17, 'Aj ki class', 0),
(18, '17', 0),
(19, '17', 0),
(20, 'Meri class hai bey', 0),
(21, 'Chemistry Class XII', 0),
(22, 'New Class', 0),
(25, 'Another class', 0);

-- --------------------------------------------------------

--
-- Table structure for table `classstudents`
--

CREATE TABLE `classstudents` (
  `studentId` int(11) NOT NULL,
  `classroomId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classstudents`
--

INSERT INTO `classstudents` (`studentId`, `classroomId`) VALUES
(9, 1),
(9, 17),
(9, 20);

-- --------------------------------------------------------

--
-- Table structure for table `commentpost`
--

CREATE TABLE `commentpost` (
  `commentId` int(11) NOT NULL,
  `postId` int(11) NOT NULL,
  `userId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `commentpost`
--

INSERT INTO `commentpost` (`commentId`, `postId`, `userId`) VALUES
(5, 17, 9),
(6, 25, 8);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `commentId` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `commentBody` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`commentId`, `date`, `commentBody`) VALUES
(5, '2018-08-09 11:42:24', 'I can comment something too!'),
(6, '2018-08-11 22:04:21', 'I commented!');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `likeId` int(11) NOT NULL,
  `postId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`likeId`, `postId`) VALUES
(21, 17);

-- --------------------------------------------------------

--
-- Table structure for table `likeuser`
--

CREATE TABLE `likeuser` (
  `likeId` int(11) NOT NULL,
  `userId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `likeuser`
--

INSERT INTO `likeuser` (`likeId`, `userId`) VALUES
(21, 9);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `messageId` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `messageBody` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`messageId`, `date`, `messageBody`) VALUES
(1, '2018-07-31 23:27:59', 'Hi'),
(2, '2018-07-31 23:36:48', 'Hi'),
(3, '2018-07-31 23:37:45', 'Hi'),
(4, '2018-07-31 23:38:08', 'Hi'),
(5, '2018-07-31 23:41:59', 'Hi'),
(6, '2018-07-31 23:42:51', 'Hi'),
(7, '2018-08-04 10:57:17', 'Another message is sent'),
(8, '2018-08-04 10:59:18', 'Another message is sent'),
(9, '2018-08-04 11:25:08', 'My name is hasan!'),
(10, '2018-08-04 11:29:50', 'My name is hasan!'),
(11, '2018-08-04 11:30:17', 'My name is hasan!'),
(12, '2018-08-04 11:32:35', 'My name is hasan!'),
(13, '2018-08-04 11:34:47', 'My name is hasan!'),
(14, '2018-08-04 11:35:12', 'My name is hasan!'),
(15, '2018-08-04 11:35:28', 'My name is hasan!'),
(16, '2018-08-04 11:35:40', 'My name is hasan!'),
(17, '2018-08-04 11:39:04', 'My name is NilaNi!'),
(18, '2018-08-04 11:39:34', 'My name is NilaNi!'),
(19, '2018-08-04 11:39:54', 'I did send this message to myself'),
(20, '2018-08-04 11:40:01', 'Did you receive it?'),
(21, '2018-08-04 15:43:43', 'Hi'),
(22, '2018-08-04 15:43:55', 'Hi Nila!'),
(23, '2018-08-04 16:02:21', 'Are you Nila?'),
(24, '2018-08-04 16:27:52', 'Are you Nila?'),
(25, '2018-08-04 16:28:40', 'Are you Nila?'),
(26, '2018-08-04 16:29:15', 'Are you Nila?'),
(27, '2018-08-04 16:29:25', 'Are you Nila?'),
(28, '2018-08-04 16:29:55', 'Are you Nila?'),
(29, '2018-08-04 16:30:16', 'Are you Nila?'),
(30, '2018-08-04 16:30:49', 'HI Syed!'),
(31, '2018-08-04 16:42:00', 'My name is hasan too'),
(32, '2018-08-07 22:12:22', 'I did'),
(33, '2018-08-08 23:34:02', 'Hi');

-- --------------------------------------------------------

--
-- Table structure for table `messageinfo`
--

CREATE TABLE `messageinfo` (
  `messageId` int(11) NOT NULL,
  `senderId` int(11) NOT NULL,
  `receiverId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messageinfo`
--

INSERT INTO `messageinfo` (`messageId`, `senderId`, `receiverId`) VALUES
(1, 9, 7),
(2, 9, 7),
(3, 9, 7),
(4, 9, 7),
(5, 9, 7),
(6, 9, 7),
(7, 9, 7),
(8, 9, 7),
(9, 9, 7),
(10, 9, 7),
(11, 9, 7),
(12, 9, 7),
(13, 9, 7),
(14, 9, 7),
(15, 9, 7),
(16, 9, 7),
(17, 7, 7),
(18, 7, 7),
(19, 7, 9),
(20, 7, 9),
(21, 8, 8),
(22, 8, 7),
(23, 8, 7),
(24, 8, 7),
(25, 8, 7),
(26, 8, 7),
(27, 8, 7),
(28, 8, 7),
(29, 8, 7),
(31, 8, 8),
(32, 9, 7);

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `optionID` int(11) NOT NULL,
  `opt1` varchar(25) NOT NULL,
  `opt2` varchar(25) NOT NULL,
  `opt3` varchar(25) NOT NULL,
  `corrAns` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`optionID`, `opt1`, `opt2`, `opt3`, `corrAns`) VALUES
(1, 'Mole', 'Molar', '', 'Molecule'),
(2, 'Particle', 'Wave', '', 'Particle'),
(3, 'Chemist', 'Physicist', '', 'Scientist'),
(4, 'Mole', 'Molar', 'Molecule', 'Molecule'),
(5, 'Particle', 'Wave', 'Sound', 'Particle'),
(6, 'Chemist', 'Physicist', 'Scientist', 'Scientist');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `postId` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `postBody` text NOT NULL,
  `likes` int(11) NOT NULL,
  `comments` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`postId`, `date`, `postBody`, `likes`, `comments`) VALUES
(17, '2018-08-09 11:41:43', 'I posted something', 1, 0),
(18, '2018-08-09 17:07:23', 'I posted something', 0, 0),
(19, '2018-08-11 20:55:55', 'I posted something', 0, 0),
(20, '2018-08-11 21:00:41', 'I posted\r\n', 0, 0),
(21, '2018-08-11 21:03:23', 'I posted!', 0, 0),
(22, '2018-08-11 21:04:47', 'I oste', 0, 0),
(23, '2018-08-11 21:25:01', 'I posted something here!', 0, 0),
(24, '2018-08-11 21:42:59', 'I didnt like what you just said!', 0, 0),
(25, '2018-08-11 21:43:33', 'I didnt like what you just said!', 0, 0),
(26, '2018-08-11 21:43:48', 'Did you say that to ali?', 0, 0),
(27, '2018-08-11 21:44:30', 'My name is Aloy!', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `postuser`
--

CREATE TABLE `postuser` (
  `postId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `classroomId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `postuser`
--

INSERT INTO `postuser` (`postId`, `userId`, `classroomId`) VALUES
(17, 9, 1),
(20, 8, 21),
(21, 8, 21),
(22, 8, 21),
(25, 8, 21),
(19, 8, 25),
(23, 8, 25),
(24, 8, 25),
(26, 8, 25),
(27, 8, 25);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `questionID` int(11) NOT NULL,
  `questionDesc` text NOT NULL,
  `optionID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`questionID`, `questionDesc`, `optionID`) VALUES
(1, '', 1),
(2, '', 2),
(3, '', 3),
(4, 'What is a mole?', 4),
(5, 'What is an atome?', 5),
(6, 'Who is Marie Curie?', 6);

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `quizID` int(11) NOT NULL,
  `quizName` varchar(25) NOT NULL,
  `assignedBy` varchar(25) NOT NULL,
  `time` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`quizID`, `quizName`, `assignedBy`, `time`) VALUES
(3, 'Physics', 'syedhasan010', 60),
(4, 'Chemistry', 'syedhasan010', 20),
(5, 'Chemistry', 'syedhasan010', 20);

-- --------------------------------------------------------

--
-- Table structure for table `quizqs`
--

CREATE TABLE `quizqs` (
  `quizID` int(11) NOT NULL,
  `questionID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quizqs`
--

INSERT INTO `quizqs` (`quizID`, `questionID`) VALUES
(4, 1),
(4, 2),
(4, 3),
(5, 4),
(5, 5),
(5, 6);

-- --------------------------------------------------------

--
-- Table structure for table `quizresults`
--

CREATE TABLE `quizresults` (
  `id` int(11) NOT NULL,
  `studentID` int(11) NOT NULL,
  `quizID` int(11) NOT NULL,
  `stMarks` int(11) NOT NULL,
  `status` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quizresults`
--

INSERT INTO `quizresults` (`id`, `studentID`, `quizID`, `stMarks`, `status`) VALUES
(3, 9, 5, 3, ''),
(4, 9, 5, 3, ''),
(5, 9, 5, 3, 'PASS'),
(6, 9, 5, 1, 'FAIL');

-- --------------------------------------------------------

--
-- Table structure for table `reguser`
--

CREATE TABLE `reguser` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `fName` varchar(25) NOT NULL,
  `lName` varchar(25) NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `phoneNumber` text NOT NULL,
  `pictureLink` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reguser`
--

INSERT INTO `reguser` (`id`, `username`, `fName`, `lName`, `email`, `password`, `phoneNumber`, `pictureLink`) VALUES
(1, 'hasa', 'Syed', 'Hasan', 'N@n.com', 'f690d3b8d4b51c1f189d886b7bab26b7', '0', 'assets/images/profile_pics/defaults/default.png'),
(2, 'al', 'Alish', 'Tas', 'S@s.com', 'f690d3b8d4b51c1f189d886b7bab26b7', '0', 'assets/images/profile_pics/defaults/default.png'),
(3, 'ahahah', 'Syed', 'Hasan', 'Ajaja@hah.com', 'f690d3b8d4b51c1f189d886b7bab26b7', '0', 'assets/images/profile_pics/defaults/default.png'),
(4, 'kwekwek', 'Wlkw', 'Lwelkwel', 'W@dlc.com', '309833b442330aeedd67e9d735307d56', '0', 'assets/images/profile_pics/defaults/default.png'),
(5, 'hwhqwh', 'Qwhqwh', 'Hwkwkjwje', 'Hqh@hs.com', '843265a377b0546b35765123f5d85c77', '0', 'assets/images/profile_pics/defaults/default.png'),
(6, 'kwkwek', 'Syed', 'Hasan', 'I2323i23i@hs.com', '24215feea7d5f05f0ab5568d043dc77a', '0', 'assets/images/profile_pics/defaults/default.png'),
(7, 'NilaNi', 'Sheh', 'Nila', 'Has@has.com', 'f690d3b8d4b51c1f189d886b7bab26b7', '0', 'assets/images/profile_pics/defaults/default.png'),
(8, 'syedhasan010', 'Syed', 'Hasan', 'Naq@ha.com', 'f690d3b8d4b51c1f189d886b7bab26b7', '0', 'assets/images/profile_pics/defaults/default.png'),
(9, 'hahahaha', 'Syed', 'Ahsan', 'ha@haa.com', 'f690d3b8d4b51c1f189d886b7bab26b7', '0343-3562183', 'assets/images/profile_pics/defaults/default.png');

-- --------------------------------------------------------

--
-- Table structure for table `studentinfo`
--

CREATE TABLE `studentinfo` (
  `studentId` int(11) NOT NULL,
  `rollNo` int(11) NOT NULL,
  `batchNo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentinfo`
--

INSERT INTO `studentinfo` (`studentId`, `rollNo`, `batchNo`) VALUES
(3, 23230, 2309293),
(9, 23023, 29393);

-- --------------------------------------------------------

--
-- Table structure for table `teacherclassroom`
--

CREATE TABLE `teacherclassroom` (
  `teacherId` int(11) NOT NULL,
  `classroomId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacherclassroom`
--

INSERT INTO `teacherclassroom` (`teacherId`, `classroomId`) VALUES
(8, 21),
(8, 25);

-- --------------------------------------------------------

--
-- Table structure for table `teacherinfo`
--

CREATE TABLE `teacherinfo` (
  `teacherId` int(11) NOT NULL,
  `instituteName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacherinfo`
--

INSERT INTO `teacherinfo` (`teacherId`, `instituteName`) VALUES
(5, 'NED University'),
(6, 'BED'),
(7, 'Karachi University'),
(8, 'Hasans Uni');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classrooms`
--
ALTER TABLE `classrooms`
  ADD PRIMARY KEY (`classroomId`);

--
-- Indexes for table `classstudents`
--
ALTER TABLE `classstudents`
  ADD PRIMARY KEY (`studentId`,`classroomId`),
  ADD KEY `classroomId` (`classroomId`);

--
-- Indexes for table `commentpost`
--
ALTER TABLE `commentpost`
  ADD PRIMARY KEY (`commentId`),
  ADD KEY `postid` (`postId`),
  ADD KEY `userid` (`userId`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`commentId`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`likeId`),
  ADD KEY `pid` (`postId`);

--
-- Indexes for table `likeuser`
--
ALTER TABLE `likeuser`
  ADD PRIMARY KEY (`likeId`),
  ADD KEY `uid` (`userId`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`messageId`);

--
-- Indexes for table `messageinfo`
--
ALTER TABLE `messageinfo`
  ADD PRIMARY KEY (`messageId`),
  ADD KEY `senderId_FK` (`senderId`),
  ADD KEY `receiverid_FK` (`receiverId`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`optionID`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`postId`);

--
-- Indexes for table `postuser`
--
ALTER TABLE `postuser`
  ADD PRIMARY KEY (`postId`,`userId`),
  ADD KEY `userid_FK` (`userId`),
  ADD KEY `classid` (`classroomId`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`questionID`),
  ADD KEY `optionID_FK` (`optionID`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`quizID`);

--
-- Indexes for table `quizqs`
--
ALTER TABLE `quizqs`
  ADD PRIMARY KEY (`quizID`,`questionID`),
  ADD KEY `qID_FK` (`questionID`);

--
-- Indexes for table `quizresults`
--
ALTER TABLE `quizresults`
  ADD PRIMARY KEY (`id`),
  ADD KEY `studID` (`studentID`),
  ADD KEY `quizID` (`quizID`);

--
-- Indexes for table `reguser`
--
ALTER TABLE `reguser`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studentinfo`
--
ALTER TABLE `studentinfo`
  ADD PRIMARY KEY (`studentId`,`batchNo`);

--
-- Indexes for table `teacherclassroom`
--
ALTER TABLE `teacherclassroom`
  ADD PRIMARY KEY (`teacherId`,`classroomId`),
  ADD KEY `classroomId_FK` (`classroomId`);

--
-- Indexes for table `teacherinfo`
--
ALTER TABLE `teacherinfo`
  ADD PRIMARY KEY (`teacherId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `classrooms`
--
ALTER TABLE `classrooms`
  MODIFY `classroomId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `commentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `likeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `messageId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `optionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `postId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `questionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `quizID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `quizresults`
--
ALTER TABLE `quizresults`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `reguser`
--
ALTER TABLE `reguser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `classstudents`
--
ALTER TABLE `classstudents`
  ADD CONSTRAINT `classroomId` FOREIGN KEY (`classroomId`) REFERENCES `classrooms` (`classroomId`),
  ADD CONSTRAINT `studentId` FOREIGN KEY (`studentId`) REFERENCES `studentinfo` (`studentId`);

--
-- Constraints for table `commentpost`
--
ALTER TABLE `commentpost`
  ADD CONSTRAINT `commentid_FK` FOREIGN KEY (`commentId`) REFERENCES `comments` (`commentId`),
  ADD CONSTRAINT `postid` FOREIGN KEY (`postId`) REFERENCES `post` (`postId`),
  ADD CONSTRAINT `userid` FOREIGN KEY (`userId`) REFERENCES `reguser` (`id`);

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `pid` FOREIGN KEY (`postId`) REFERENCES `post` (`postId`);

--
-- Constraints for table `likeuser`
--
ALTER TABLE `likeuser`
  ADD CONSTRAINT `likeid_FK` FOREIGN KEY (`likeId`) REFERENCES `likes` (`likeId`),
  ADD CONSTRAINT `uid` FOREIGN KEY (`userId`) REFERENCES `reguser` (`id`);

--
-- Constraints for table `messageinfo`
--
ALTER TABLE `messageinfo`
  ADD CONSTRAINT `messageId_FK` FOREIGN KEY (`messageId`) REFERENCES `message` (`messageId`),
  ADD CONSTRAINT `receiverid_FK` FOREIGN KEY (`receiverId`) REFERENCES `reguser` (`id`),
  ADD CONSTRAINT `senderId_FK` FOREIGN KEY (`senderId`) REFERENCES `reguser` (`id`);

--
-- Constraints for table `postuser`
--
ALTER TABLE `postuser`
  ADD CONSTRAINT `classid` FOREIGN KEY (`classroomId`) REFERENCES `classrooms` (`classroomId`),
  ADD CONSTRAINT `postid_FK` FOREIGN KEY (`postId`) REFERENCES `post` (`postId`),
  ADD CONSTRAINT `userid_FK` FOREIGN KEY (`userId`) REFERENCES `reguser` (`id`);

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `optionID_FK` FOREIGN KEY (`optionID`) REFERENCES `options` (`optionID`);

--
-- Constraints for table `quizqs`
--
ALTER TABLE `quizqs`
  ADD CONSTRAINT `qID_FK` FOREIGN KEY (`questionID`) REFERENCES `questions` (`questionID`),
  ADD CONSTRAINT `quizID_FK` FOREIGN KEY (`quizID`) REFERENCES `quiz` (`quizID`);

--
-- Constraints for table `quizresults`
--
ALTER TABLE `quizresults`
  ADD CONSTRAINT `quizID` FOREIGN KEY (`quizID`) REFERENCES `quiz` (`quizID`),
  ADD CONSTRAINT `studID` FOREIGN KEY (`studentID`) REFERENCES `studentinfo` (`studentId`);

--
-- Constraints for table `studentinfo`
--
ALTER TABLE `studentinfo`
  ADD CONSTRAINT `studentId_FK` FOREIGN KEY (`studentId`) REFERENCES `reguser` (`id`);

--
-- Constraints for table `teacherclassroom`
--
ALTER TABLE `teacherclassroom`
  ADD CONSTRAINT `classroomId_FK` FOREIGN KEY (`classroomId`) REFERENCES `classrooms` (`classroomId`),
  ADD CONSTRAINT `teacherId` FOREIGN KEY (`teacherId`) REFERENCES `teacherinfo` (`teacherId`);

--
-- Constraints for table `teacherinfo`
--
ALTER TABLE `teacherinfo`
  ADD CONSTRAINT `teacherId_FK` FOREIGN KEY (`teacherId`) REFERENCES `reguser` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
