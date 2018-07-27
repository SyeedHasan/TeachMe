-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2018 at 07:06 AM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `classrooms`
--

CREATE TABLE `classrooms` (
  `classroomId` int(11) NOT NULL,
  `numStudents` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `classstudents`
--

CREATE TABLE `classstudents` (
  `studentId` int(11) NOT NULL,
  `classroomId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `commentpost`
--

CREATE TABLE `commentpost` (
  `commentId` int(11) NOT NULL,
  `postId` int(11) NOT NULL,
  `userId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `commentId` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `commentBody` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `likeId` int(11) NOT NULL,
  `postId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `likeuser`
--

CREATE TABLE `likeuser` (
  `likeId` int(11) NOT NULL,
  `userId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `messageId` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `messageBody` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `messageinfo`
--

CREATE TABLE `messageinfo` (
  `messageId` int(11) NOT NULL,
  `senderId` int(11) NOT NULL,
  `receiverId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `optionID` int(11) NOT NULL,
  `optA` varchar(25) NOT NULL,
  `optB` varchar(25) NOT NULL,
  `optC` varchar(25) NOT NULL,
  `corrAns` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `postId` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `postBody` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `postuser`
--

CREATE TABLE `postuser` (
  `postId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `classroomId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `questionID` int(11) NOT NULL,
  `questionDesc` text NOT NULL,
  `optionID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `quizID` int(11) NOT NULL,
  `quizName` varchar(25) NOT NULL,
  `assignedBy` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `quizqs`
--

CREATE TABLE `quizqs` (
  `quizID` int(11) NOT NULL,
  `questionID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `quizresults`
--

CREATE TABLE `quizresults` (
  `id` int(11) NOT NULL,
  `studentID` int(11) NOT NULL,
  `quizID` int(11) NOT NULL,
  `stMarks` int(11) NOT NULL,
  `status` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `phoneNumber` int(12) NOT NULL,
  `pictureLink` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `studentinfo`
--

CREATE TABLE `studentinfo` (
  `studentId` int(11) NOT NULL,
  `rollNo` int(11) NOT NULL,
  `batchNo` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `teacherclasroom`
--

CREATE TABLE `teacherclasroom` (
  `teacherId` int(11) NOT NULL,
  `classroomId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `teacherinfo`
--

CREATE TABLE `teacherinfo` (
  `teacherId` int(11) NOT NULL,
  `instituteName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Indexes for table `teacherclasroom`
--
ALTER TABLE `teacherclasroom`
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
  MODIFY `classroomId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `commentId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `likeId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `messageId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `optionID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `postId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `questionID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `quizID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quizresults`
--
ALTER TABLE `quizresults`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reguser`
--
ALTER TABLE `reguser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
  ADD CONSTRAINT `userid` FOREIGN KEY (`userId`) REFERENCES `reguser` (`ID`);

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
  ADD CONSTRAINT `uid` FOREIGN KEY (`userId`) REFERENCES `reguser` (`ID`);

--
-- Constraints for table `messageinfo`
--
ALTER TABLE `messageinfo`
  ADD CONSTRAINT `messageId_FK` FOREIGN KEY (`messageId`) REFERENCES `message` (`messageId`),
  ADD CONSTRAINT `receiverid_FK` FOREIGN KEY (`receiverId`) REFERENCES `reguser` (`ID`),
  ADD CONSTRAINT `senderId_FK` FOREIGN KEY (`senderId`) REFERENCES `reguser` (`ID`);

--
-- Constraints for table `postuser`
--
ALTER TABLE `postuser`
  ADD CONSTRAINT `classid` FOREIGN KEY (`classroomId`) REFERENCES `classrooms` (`classroomId`),
  ADD CONSTRAINT `postid_FK` FOREIGN KEY (`postId`) REFERENCES `post` (`postId`),
  ADD CONSTRAINT `userid_FK` FOREIGN KEY (`userId`) REFERENCES `reguser` (`ID`);

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
  ADD CONSTRAINT `studentId_FK` FOREIGN KEY (`studentId`) REFERENCES `reguser` (`ID`);

--
-- Constraints for table `teacherclasroom`
--
ALTER TABLE `teacherclasroom`
  ADD CONSTRAINT `classroomId_FK` FOREIGN KEY (`classroomId`) REFERENCES `classrooms` (`classroomId`),
  ADD CONSTRAINT `teacherId` FOREIGN KEY (`teacherId`) REFERENCES `teacherinfo` (`teacherId`);

--
-- Constraints for table `teacherinfo`
--
ALTER TABLE `teacherinfo`
  ADD CONSTRAINT `teacherId_FK` FOREIGN KEY (`teacherId`) REFERENCES `reguser` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
