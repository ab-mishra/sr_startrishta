-- phpMyAdmin SQL Dump
-- version 2.11.11.3
-- http://www.phpmyadmin.net
--
-- Host: 166.62.8.3
-- Generation Time: Sep 06, 2016 at 01:28 AM
-- Server version: 5.5.43
-- PHP Version: 5.1.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `startrishta`
--

-- --------------------------------------------------------

--
-- Table structure for table `sr_admin`
--

CREATE TABLE `sr_admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `email_id` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `login_name` varchar(100) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_on` datetime NOT NULL,
  `last_login` datetime NOT NULL,
  `is_online` tinyint(4) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `sr_admin`
--

INSERT INTO `sr_admin` VALUES(1, 'admin@startrishta.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Admin', 'admin', '', 1, 1, '2016-07-17 16:04:22', 1, '2016-07-17 16:04:25', '2016-07-17 16:04:27', 1, 1);
