-- phpMyAdmin SQL Dump
-- version 3.5.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 20, 2013 at 10:43 PM
-- Server version: 5.5.29
-- PHP Version: 5.4.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `forum`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `thread_id` int(11) NOT NULL,
  `comment_text` text NOT NULL,
  `comment_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `sec_id` int(11) NOT NULL AUTO_INCREMENT,
  `sec_name` varchar(50) NOT NULL,
  `sec_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`sec_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`sec_id`, `sec_name`, `sec_date`) VALUES
(1, 'Programming', '2013-04-19 02:34:52'),
(2, 'Algorithms', '2013-04-19 02:34:52');

-- --------------------------------------------------------

--
-- Table structure for table `thread`
--

CREATE TABLE `thread` (
  `thread_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `thread_name` varchar(100) NOT NULL,
  `thread_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`thread_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `topic`
--

CREATE TABLE `topic` (
  `topic_id` int(11) NOT NULL AUTO_INCREMENT,
  `sec_id` int(11) NOT NULL,
  `topic_name` varchar(50) NOT NULL,
  `topic_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `topic_desc` text NOT NULL,
  PRIMARY KEY (`topic_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `topic`
--

INSERT INTO `topic` (`topic_id`, `sec_id`, `topic_name`, `topic_date`, `topic_desc`) VALUES
(1, 1, 'C/++', '2013-04-19 03:19:46', 'Discuss anything related to the C or C++ programming language. Do not discuss anything other programming languages.'),
(2, 1, 'Java', '2013-04-19 03:22:59', 'Discuss anything related to the Java programming language. Do not discuss anything other programming languages.'),
(3, 2, 'Sorting', '2013-04-19 03:30:28', 'Discuss anything related to sorting algorithms, such as, bubble sort, insertion sort, merge sort, quicksort, radix sort, etc. Share any new ideas for sorting algorithms!'),
(4, 2, 'Searching', '2013-04-19 03:30:57', 'Discuss anything related to sorting algorithms, such as, linear search, binery search, etc. Share any new ideas for sorting algorithms!');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(25) NOT NULL,
  `user_pass` varchar(100) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_level` int(11) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_name` (`user_name`),
  UNIQUE KEY `user_email` (`user_email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_pass`, `user_email`, `user_date`, `user_level`) VALUES
(1, 'admin', '338661deb376e88fb62ccb4ffb91a07b0d938d42', 'thenewemail@email.com', '2013-04-20 19:13:51', 0),
(2, 'trevor', 'abd3c59d96f41eecb2a7ab33862bdb18c8aa6345', 'new@emails.com', '2013-04-20 19:23:52', 0),
(6, 'asd', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 'sc@email.co', '2013-04-20 19:59:59', 0),
(32, 'usernnn', '7f88bb68e14d386d89af3cf317f6f7af1d39246c', 'n@mail.com', '2013-04-20 20:23:50', 0),
(33, 'trev', '6c55803d6f1d7a177a0db3eb4b343b0d50f9c111', 'new@emails.asdadasdasaacom', '2013-04-20 20:36:38', 0),
(34, 'johhnu', '403926033d001b5279df37cbbe5287b7c7c267fa', 'thenewEMail@lo.com', '2013-04-20 20:39:55', 0);
