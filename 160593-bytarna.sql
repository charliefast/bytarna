-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 14, 2012 at 10:06 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `160593-bytarna`
--
CREATE DATABASE `160593-bytarna` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `160593-bytarna`;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `zip` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `sign_up_date` date DEFAULT NULL,
  `last_active` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `account_type` int(11) DEFAULT '0',
  `activation_key` varchar(255) NOT NULL,
  `email_activated` enum('0','1') DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `username`, `firstname`, `lastname`, `country`, `city`, `zip`, `phone`, `email`, `password`, `sign_up_date`, `last_active`, `account_type`, `activation_key`, `email_activated`) VALUES
(2, 'jane', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ead6c09483683d7f0e9d77331e379424bbb50073', NULL, '2012-09-06 07:51:42', 0, '0', '0'),
(4, 'bob', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ead6c09483683d7f0e9d77331e379424bbb50073', NULL, '2012-09-13 07:42:28', 0, '0', '0'),
(5, 'Barbrobäst', 'Barbro', 'Ekholm', '', '', '', '', 'barbro@hotmail.com', 'hej', NULL, '2012-09-14 07:08:58', 0, '0', '0'),
(6, 'eva', 'Eva', 'Eva', '', '', '', '', 'eva@hotmail.com', 'eva', NULL, '2012-09-13 08:01:21', 0, '0', '0'),
(9, 'evaaa', 'Eva', 'Eva', '', '', '', '', 'evaaaa@hotmail.com', 'eva', NULL, '2012-09-13 08:04:00', 0, '0', '0'),
(10, 'anna', 'anna', 'anna', '', '', '', '', 'anna@hotmail.com', 'dsffds', NULL, '2012-09-13 10:12:31', 0, '0', '0'),
(11, 'alan', 'Arne', 'a', '', '', '', '', 'carina.mollbrink@gmail.com', '', NULL, '2012-09-13 11:32:43', 0, '0', '0'),
(17, 'bengan', 'bengt', 'bengtsson', '', '', '', '', 'bengt@gmail.com', 'c031ff13c9cfdb651a7246af7ff646e861c71723', NULL, '2012-09-14 09:30:23', 0, 'RaMcTsm14Yg6PFlkYZjQrrNcXtXr2AD5ipOAAuijaP4BnT0WEs', '0'),
(18, 'Amaagaaad', 'alf', 'göran', '', '', '', '', 'alf@hotmail.com', 'f0d8809064fc0a1d86ddff7b2b27334cbc894e5a', NULL, '2012-09-14 09:31:33', 0, 'tbAGO25NPaWqCbYjHnhigIKFqGofUGpjzq1y7Hlte7UAZj9qsX', '0'),
(19, 'jannes', 'janne', 'janson', '', '', '', '', 'janne@live.com', 'ead6c09483683d7f0e9d77331e379424bbb50073', NULL, '2012-09-14 09:33:29', 0, 'WHS6GNvkdHBbY27OkrB8ECt1apo6mKGkTiRuDC0UMUxE5B9MTz', '0');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `headline` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `date_added` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
