-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2018 at 05:23 PM
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
-- Database: `projectportal`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `post_body` text NOT NULL,
  `posted_by` varchar(60) NOT NULL,
  `posted_to` varchar(60) NOT NULL,
  `date_added` datetime NOT NULL,
  `removed` varchar(3) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_body`, `posted_by`, `posted_to`, `date_added`, `removed`, `post_id`) VALUES
(7, 'This is a good post, you can say what you want bro!', 'syed_hameez', 'syed_hameez', '2018-06-07 18:10:34', 'no', 85),
(8, 'Ho', 'syed_ahsan', 'syed_hameez', '2018-06-11 17:07:56', 'no', 93),
(9, 'jo', 'syed_ahsan', 'syed_hameez', '2018-06-11 17:13:11', 'no', 98);

-- --------------------------------------------------------

--
-- Table structure for table `friend_requests`
--

CREATE TABLE `friend_requests` (
  `id` int(11) NOT NULL,
  `user_to` varchar(50) NOT NULL,
  `user_from` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `username` varchar(60) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `username`, `post_id`) VALUES
(1, 'syed_ahsan', 93),
(3, 'syed_ahsan', 89),
(4, 'syed_ahsan', 95),
(5, 'syed_ahsan', 98);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `user_to` varchar(50) NOT NULL,
  `user_from` varchar(50) NOT NULL,
  `body` text NOT NULL,
  `date` datetime NOT NULL,
  `opened` varchar(3) NOT NULL,
  `viewed` varchar(3) NOT NULL,
  `deleted` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `user_to`, `user_from`, `body`, `date`, `opened`, `viewed`, `deleted`) VALUES
(1, 'syed_ahsan', 'syed_hameez', 'Hi', '2018-06-08 18:41:47', 'yes', 'yes', 'no'),
(2, 'syed_ahsan', 'syed_hameez', 'Did this send?', '2018-06-08 18:42:10', 'yes', 'yes', 'no'),
(3, 'syed_ahsan', 'syed_hameez', 'Hi there ahsan', '2018-06-08 20:10:13', 'yes', 'yes', 'no'),
(4, 'syed_hameez', 'syed_ahsan', 'I sent this!', '2018-06-08 20:10:47', 'yes', 'yes', 'no'),
(5, 'syed_hameez', 'syed_ahsan', 'Hahahaha', '2018-06-08 20:13:09', 'yes', 'yes', 'no'),
(6, 'syed_hameez', 'syed_ahsan', 'I liked your message!', '2018-06-08 20:13:15', 'yes', 'yes', 'no'),
(7, 'syed_hameez', 'syed_ahsan', 'Did you send it?', '2018-06-08 20:13:18', 'yes', 'yes', 'no'),
(8, 'syed_hameez', 'syed_ahsan', 'Hi', '2018-06-08 20:14:53', 'yes', 'yes', 'no'),
(9, 'syed_hameez', 'syed_ahsan', 'Hi', '2018-06-08 20:14:55', 'yes', 'yes', 'no'),
(10, 'syed_hameez', 'syed_ahsan', 'Hiii\r\n', '2018-06-08 20:14:57', 'yes', 'yes', 'no'),
(11, 'syed_hameez', 'syed_ahsan', 'I sent\r\n', '2018-06-08 20:15:01', 'yes', 'yes', 'no'),
(12, 'syed_hameez', 'syed_ahsan', 'But you didn;t say', '2018-06-08 20:15:08', 'yes', 'yes', 'no'),
(13, 'syed_hameez', 'syed_ahsan', 'But you didn;t say', '2018-06-08 20:15:14', 'yes', 'yes', 'no'),
(14, 'syed_hameez', 'syed_ahsan', 'But you didn;t say', '2018-06-08 20:15:35', 'yes', 'yes', 'no'),
(15, 'syed_hameez', 'syed_ahsan', 'Hi', '2018-06-08 20:15:38', 'yes', 'yes', 'no'),
(16, 'syed_hameez', 'syed_ahsan', 'Hi', '2018-06-08 20:35:11', 'yes', 'yes', 'no'),
(17, 'syed_hameez', 'syed_ahsan', 'Hi', '2018-06-08 20:36:00', 'yes', 'yes', 'no'),
(18, 'syed_hameez', 'syed_ahsan', 'Fine', '2018-06-08 20:42:12', 'yes', 'yes', 'no'),
(19, 'syed_hameez', 'syed_ahsan', 'FineFineFineFineFineFineFineFineFineFineFineFine', '2018-06-08 20:43:51', 'yes', 'yes', 'no'),
(20, 'syed_hameez', 'syed_ahsan', 'FineFineFineFineFineFineFineFineFineFineFineFine', '2018-06-08 21:39:18', 'yes', 'yes', 'no'),
(21, '', 'syed_ahsan', 'Hi', '2018-06-08 23:07:30', 'no', 'no', 'no'),
(22, 'syed_hameez', 'syed_ahsan', 'This works', '2018-06-08 23:24:58', 'yes', 'yes', 'no'),
(23, 'syed_hameez', 'syed_ahsan', 'Hgi', '2018-06-08 23:28:42', 'yes', 'yes', 'no'),
(24, 'syed_hameez', 'syed_ahsan', 'Hgi', '2018-06-08 23:32:24', 'yes', 'yes', 'no'),
(25, 'syed_hameez', 'syed_ahsan', 'Hi bro!', '2018-06-08 23:32:29', 'yes', 'yes', 'no'),
(26, 'syed_hameez', 'syed_ahsan', 'Hi hi', '2018-06-11 16:08:18', 'yes', 'yes', 'no'),
(27, 'syed_ahsan', 'syed_hameez', 'Haha okay bro!\r\n', '2018-06-11 16:44:17', 'yes', 'yes', 'no'),
(28, 'syed_ahsan', 'syed_hameez', 'Haha okay bro!\r\n', '2018-06-11 16:46:53', 'yes', 'yes', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `user_to` varchar(50) NOT NULL,
  `user_from` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `link` varchar(100) NOT NULL,
  `datetime` datetime NOT NULL,
  `opened` varchar(3) NOT NULL,
  `viewed` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `user_to`, `user_from`, `message`, `link`, `datetime`, `opened`, `viewed`) VALUES
(1, 'syed_ahsan', 'syed_hameez', 'Syed Hameez posted on your post', 'post.php?id=98', '2018-06-11 00:00:00', 'no', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `body` text NOT NULL,
  `added_by` varchar(60) NOT NULL,
  `user_to` text NOT NULL,
  `date_added` datetime NOT NULL,
  `user_closed` varchar(3) NOT NULL,
  `deleted` varchar(3) NOT NULL,
  `likes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `body`, `added_by`, `user_to`, `date_added`, `user_closed`, `deleted`, `likes`) VALUES
(84, 'sda', 'asdfsd', 'asdfsdaf', '2018-06-07 18:09:48', 'no', 'no', 0),
(85, 'I have something to say!', 'syed_hameez', 'none', '2018-06-07 18:09:48', 'no', 'no', 0),
(86, 'sda', 'asdfsd', 'asdfsdaf', '2018-06-07 18:10:17', 'no', 'no', 0),
(87, 'sda', 'asdfsd', 'asdfsdaf', '2018-06-07 18:10:18', 'no', 'no', 0),
(88, 'sda', 'asdfsd', 'asdfsdaf', '2018-06-07 18:10:47', 'no', 'no', 0),
(89, 'Did', 'syed_hameez', 'none', '2018-06-07 18:10:47', 'no', 'no', 1),
(90, 'sda', 'asdfsd', 'asdfsdaf', '2018-06-07 18:12:00', 'no', 'no', 0),
(91, 'Hi Ahsan!', 'syed_hameez', 'syed_ahsan', '2018-06-07 18:12:00', 'no', 'no', 0),
(92, 'sda', 'asdfsd', 'asdfsdaf', '2018-06-08 18:32:52', 'no', 'no', 0),
(93, 'HI brother!', 'syed_hameez', 'syed_ahsan', '2018-06-08 18:32:52', 'no', 'no', 1),
(94, 'sda', 'asdfsd', 'asdfsdaf', '2018-06-08 23:05:05', 'no', 'no', 0),
(95, 'Ho', 'syed_ahsan', 'none', '2018-06-08 23:05:05', 'no', 'yes', 1),
(96, 'sda', 'asdfsd', 'asdfsdaf', '2018-06-11 16:08:37', 'no', 'no', 0),
(97, 'sda', 'asdfsd', 'asdfsdaf', '2018-06-11 17:09:20', 'no', 'no', 0),
(98, 'I posted!\r\n', 'syed_hameez', 'syed_ahsan', '2018-06-11 17:09:21', 'no', 'no', 1),
(99, 'sda', 'asdfsd', 'asdfsdaf', '2018-06-13 18:59:48', 'no', 'no', 0),
(100, '<br><iframe width=\'420\' height=\'315\' src=\'https://www.youtube.com/embed/gTa9qY0wmIk\'></iframe><br>', 'syed_hameez', 'none', '2018-06-13 18:59:48', 'no', 'no', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `signup_date` date NOT NULL,
  `profile_pic` varchar(255) NOT NULL,
  `num_posts` int(11) NOT NULL,
  `num_likes` int(11) NOT NULL,
  `user_closed` varchar(3) NOT NULL,
  `friend_array` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `email`, `password`, `signup_date`, `profile_pic`, `num_posts`, `num_likes`, `user_closed`, `friend_array`) VALUES
(11, 'Syed', 'Ahsan', 'syed_ahsan', 'N@na.com', 'f690d3b8d4b51c1f189d886b7bab26b7', '2018-06-04', 'assets/images/profile_pics/defaults/pic.png', 1, 1, 'no', ',syed_hasan,syed_ahsan,');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `friend_requests`
--
ALTER TABLE `friend_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `friend_requests`
--
ALTER TABLE `friend_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
