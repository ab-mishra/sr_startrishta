-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 08, 2016 at 07:53 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `startrishta`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_tokens`
--

CREATE TABLE IF NOT EXISTS `auth_tokens` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `selector` char(12) DEFAULT NULL,
  `token` char(64) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `expires` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `auth_tokens`
--

INSERT INTO `auth_tokens` (`id`, `selector`, `token`, `user_id`, `expires`) VALUES
(1, 'UXhWd1pZb3Bs', 'ff3eccb43a49ca2434db7cfab4ce4b43b077955fb24bf85e746e96a7960c2d5e', 50, '2016-11-04 13:18:17'),
(2, 'WkdySFNMdmVz', 'ce5b938d34aa837ca46578089ed69d631ef89aaa283633ea2b08a8f3d1afd529', 94, '2016-11-06 22:26:57'),
(3, 'S3BBR0NTZlNx', '0f0d51391006e86716f92ba951965f9d2d30e98dd933ac0c697fb79ddb46b1f1', 5, '2016-11-04 13:27:37'),
(4, 'eEd4eUhnZWZl', '648596d7bc40651e60368ad05d618a44495cdce4cd10be73ac0c4cd0b8a5748b', 103, '2016-11-05 12:05:06'),
(5, 'd2IzQ2VSd2Vr', 'c00119f04785a7d59e000b0b18896bd2a43a3abdd79640410bde0e1a51c7d7bd', 6, '2016-11-07 11:30:56'),
(6, 'c0tiTTltcmd4', '61db4f3e32803a7781bcaf37083a05b284fa37100c27a6287645a7f64f3326b3', 107, '2016-11-07 11:08:11'),
(7, 'Vk5kOXduVElG', 'ee334ccd58109be8f06c780d1c602aa24f536232b01ad1f49dfb28fb76e2940c', 109, '2016-11-06 10:32:40'),
(8, 'aWljaEhXWW9s', '05e2a5241ac45be40843ceb13599b6207465aa8752c887d60d10551772816050', 113, '2016-11-05 16:25:50'),
(9, 'MXY4dUswblJL', 'f44772557b84b2f42e8bc6fbbb483d01bef5863ac1d08478bed73af92ce7ec40', 1, '2016-11-18 10:45:18');

-- --------------------------------------------------------

--
-- Table structure for table `sr_admin`
--

CREATE TABLE IF NOT EXISTS `sr_admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `email_id` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_on` datetime NOT NULL,
  `last_login` datetime NOT NULL,
  `is_online` tinyint(4) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `sr_admin`
--

INSERT INTO `sr_admin` (`admin_id`, `email_id`, `password`, `first_name`, `last_name`, `role_id`, `created_by`, `created_on`, `updated_by`, `updated_on`, `last_login`, `is_online`, `status`) VALUES
(1, 'admin@startrishta.com', '827ccb0eea8a706c4c34a16891f84e7b', 'demoadmin', 'user', 2, 1, '2016-07-17 16:04:22', 1, '2016-11-01 12:15:12', '2016-07-17 16:04:27', 1, 1),
(3, 'imran@startrishta.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Imran', 'Mage', 2, 1, '2016-09-20 12:04:16', 1, '2016-10-29 15:28:53', '0000-00-00 00:00:00', 0, 1),
(4, 'superadmin@st.com', 'e10adc3949ba59abbe56e057f20f883e', 'shilpi', 'singh', 1, 1, '2016-11-01 11:43:17', 1, '2016-11-01 11:43:17', '0000-00-00 00:00:00', 0, 1),
(5, 'nisith@st.com', 'e10adc3949ba59abbe56e057f20f883e', 'Nisith', 'Srivastava', 2, 1, '2016-11-01 12:16:01', 1, '2016-11-01 12:16:01', '0000-00-00 00:00:00', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sr_admin_login_history`
--

CREATE TABLE IF NOT EXISTS `sr_admin_login_history` (
  `login_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_id` int(11) NOT NULL,
  `login_time` datetime NOT NULL,
  `logout_time` datetime NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`login_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=63 ;

--
-- Dumping data for table `sr_admin_login_history`
--

INSERT INTO `sr_admin_login_history` (`login_id`, `admin_id`, `login_time`, `logout_time`, `status`) VALUES
(1, 1, '2016-07-19 12:58:51', '0000-00-00 00:00:00', 1),
(2, 1, '2016-07-28 13:19:15', '0000-00-00 00:00:00', 1),
(3, 1, '2016-07-29 16:38:32', '0000-00-00 00:00:00', 1),
(4, 1, '2016-08-05 10:14:15', '0000-00-00 00:00:00', 1),
(5, 1, '2016-08-16 07:09:46', '0000-00-00 00:00:00', 1),
(6, 1, '2016-08-18 01:57:08', '0000-00-00 00:00:00', 1),
(7, 1, '2016-08-20 12:24:24', '0000-00-00 00:00:00', 1),
(8, 1, '2016-08-20 15:22:17', '0000-00-00 00:00:00', 1),
(9, 1, '2016-08-22 11:11:57', '0000-00-00 00:00:00', 1),
(10, 1, '2016-08-23 12:20:49', '0000-00-00 00:00:00', 1),
(11, 1, '2016-08-23 13:05:12', '0000-00-00 00:00:00', 1),
(12, 1, '2016-08-23 13:08:15', '0000-00-00 00:00:00', 1),
(13, 1, '2016-08-27 10:28:42', '0000-00-00 00:00:00', 1),
(14, 1, '2016-08-30 01:38:40', '0000-00-00 00:00:00', 1),
(15, 1, '2016-08-30 10:26:51', '0000-00-00 00:00:00', 1),
(16, 1, '2016-09-02 10:27:22', '0000-00-00 00:00:00', 1),
(17, 1, '2016-09-02 11:24:14', '0000-00-00 00:00:00', 1),
(18, 1, '2016-09-03 14:58:32', '0000-00-00 00:00:00', 1),
(19, 1, '2016-09-05 07:56:30', '0000-00-00 00:00:00', 1),
(20, 1, '2016-09-05 18:47:28', '0000-00-00 00:00:00', 1),
(21, 1, '2016-09-06 10:32:11', '0000-00-00 00:00:00', 1),
(22, 1, '2016-09-06 10:49:52', '0000-00-00 00:00:00', 1),
(23, 1, '2016-09-06 11:44:31', '0000-00-00 00:00:00', 1),
(24, 1, '2016-09-06 11:57:43', '0000-00-00 00:00:00', 1),
(25, 1, '2016-09-06 13:08:25', '0000-00-00 00:00:00', 1),
(26, 1, '2016-09-06 21:36:31', '2016-09-06 21:39:44', 1),
(28, 1, '2016-09-09 12:45:00', '0000-00-00 00:00:00', 1),
(29, 1, '2016-09-10 11:54:44', '0000-00-00 00:00:00', 1),
(30, 1, '2016-09-10 15:20:50', '0000-00-00 00:00:00', 1),
(31, 1, '2016-09-10 17:12:53', '0000-00-00 00:00:00', 1),
(32, 1, '2016-09-12 02:11:58', '0000-00-00 00:00:00', 1),
(33, 1, '2016-09-12 02:26:15', '0000-00-00 00:00:00', 1),
(34, 1, '2016-09-13 11:54:38', '0000-00-00 00:00:00', 1),
(35, 1, '2016-09-15 21:30:54', '0000-00-00 00:00:00', 1),
(36, 1, '2016-09-16 22:05:59', '2016-09-17 00:18:40', 1),
(37, 1, '2016-09-17 16:42:17', '0000-00-00 00:00:00', 1),
(38, 1, '2016-09-17 21:55:13', '0000-00-00 00:00:00', 1),
(39, 1, '2016-09-20 00:54:07', '0000-00-00 00:00:00', 1),
(40, 1, '2016-09-21 00:28:36', '0000-00-00 00:00:00', 1),
(41, 1, '2016-09-21 01:31:33', '0000-00-00 00:00:00', 1),
(42, 1, '2016-09-26 14:35:36', '0000-00-00 00:00:00', 1),
(43, 1, '2016-09-26 14:35:36', '0000-00-00 00:00:00', 1),
(44, 1, '2016-09-26 14:35:38', '0000-00-00 00:00:00', 1),
(45, 1, '2016-09-26 14:35:39', '0000-00-00 00:00:00', 1),
(46, 1, '2016-09-26 14:35:39', '0000-00-00 00:00:00', 1),
(47, 1, '2016-09-26 14:35:41', '2016-09-26 14:45:53', 1),
(50, 1, '2016-10-03 12:58:55', '0000-00-00 00:00:00', 1),
(51, 1, '2016-10-04 03:16:24', '0000-00-00 00:00:00', 1),
(52, 1, '2016-10-05 02:58:34', '0000-00-00 00:00:00', 1),
(53, 1, '2016-10-05 03:56:25', '0000-00-00 00:00:00', 1),
(54, 1, '2016-10-07 03:28:11', '0000-00-00 00:00:00', 1),
(55, 1, '2016-10-12 01:57:02', '0000-00-00 00:00:00', 1),
(56, 1, '2016-10-12 10:38:22', '0000-00-00 00:00:00', 1),
(57, 1, '2016-10-26 16:37:33', '0000-00-00 00:00:00', 1),
(58, 1, '2016-10-29 16:01:11', '0000-00-00 00:00:00', 1),
(59, 1, '2016-10-29 16:46:25', '2016-10-29 17:06:18', 1),
(60, 1, '2016-10-29 17:06:29', '0000-00-00 00:00:00', 1),
(61, 1, '2016-11-01 11:13:06', '0000-00-00 00:00:00', 1),
(62, 1, '2016-11-08 10:49:27', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sr_admin_user_timestamp`
--

CREATE TABLE IF NOT EXISTS `sr_admin_user_timestamp` (
  `admin_activity_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `activity` varchar(255) NOT NULL,
  `report_id` int(11) NOT NULL,
  `photo_id` int(11) NOT NULL,
  `interest_id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`admin_activity_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=69 ;

--
-- Dumping data for table `sr_admin_user_timestamp`
--

INSERT INTO `sr_admin_user_timestamp` (`admin_activity_id`, `user_id`, `admin_id`, `activity`, `report_id`, `photo_id`, `interest_id`, `timestamp`, `status`) VALUES
(1, 1, 1, 'Viewed Message History', 0, 0, 0, '2016-07-18 21:56:40', 1),
(2, 1, 1, 'Viewed Message History', 0, 0, 0, '2016-07-18 22:07:01', 1),
(3, 1, 1, 'Viewed Message History', 0, 0, 0, '2016-07-18 22:22:48', 1),
(4, 1, 1, 'Viewed Message History', 0, 0, 0, '2016-07-18 22:47:19', 1),
(5, 1, 1, 'Viewed Message History', 0, 0, 0, '2016-07-18 22:47:28', 1),
(6, 20, 1, 'Read Abuse Report', 1, 0, 0, '2016-08-17 13:28:34', 1),
(7, 56, 1, 'Read Abuse Report', 2, 0, 0, '2016-08-17 13:28:35', 1),
(8, 1, 1, 'Approve Photo', 0, 177, 0, '2016-08-17 13:29:43', 1),
(9, 1, 1, 'Approve Photo', 0, 170, 0, '2016-08-17 13:29:50', 1),
(10, 4, 1, 'Suspanded User', 0, 0, 0, '2016-08-21 22:59:39', 1),
(11, 0, 1, 'Update Interest', 0, 0, 15, '2016-08-21 23:00:52', 1),
(12, 0, 1, 'Disapprove Interest', 0, 0, 14, '2016-08-21 23:01:00', 1),
(13, 1, 1, 'Approve Photo', 0, 176, 0, '2016-08-26 22:55:11', 1),
(14, 1, 1, 'Approve Photo', 0, 187, 0, '2016-08-26 22:55:15', 1),
(15, 1, 1, 'Approve Photo', 0, 184, 0, '2016-08-30 00:36:24', 1),
(16, 20, 1, 'Disapprove User Interest', 0, 0, 14, '2016-08-30 00:36:41', 1),
(17, 20, 1, 'Update User Interest', 0, 0, 1, '2016-08-30 00:36:49', 1),
(18, 0, 1, 'Update Interest', 0, 0, 1, '2016-08-30 00:37:01', 1),
(19, 1, 1, 'Approve Photo', 0, 183, 0, '2016-09-04 20:08:42', 1),
(20, 0, 1, 'Disapproved Photo', 0, 185, 0, '2016-09-05 23:14:47', 1),
(21, 0, 1, 'Approve Interest', 0, 0, 31, '2016-09-05 23:15:19', 1),
(22, 0, 1, 'Approve Interest', 0, 0, 30, '2016-09-05 23:15:33', 1),
(23, 1, 1, 'Suspanded User', 0, 0, 0, '2016-09-05 23:29:28', 1),
(24, 1, 1, 'Unsuspanded User', 0, 0, 0, '2016-09-05 23:43:22', 1),
(25, 1, 1, 'Suspanded User', 0, 0, 0, '2016-09-05 23:44:58', 1),
(26, 1, 1, 'Unsuspanded User', 0, 0, 0, '2016-09-05 23:49:29', 1),
(27, 1, 1, 'Suspanded User', 0, 0, 0, '2016-09-05 23:50:36', 1),
(28, 1, 1, 'Unsuspanded User', 0, 0, 0, '2016-09-06 00:39:23', 1),
(29, 1, 1, 'Unsuspanded User', 0, 0, 0, '2016-09-06 00:39:37', 1),
(30, 1, 1, 'Suspanded User', 0, 0, 0, '2016-09-06 00:40:14', 1),
(31, 1, 1, 'Unsuspanded User', 0, 0, 0, '2016-09-06 00:40:53', 1),
(32, 1, 1, 'Suspanded User', 0, 0, 0, '2016-09-09 00:16:24', 1),
(33, 1, 1, 'Unsuspanded User', 0, 0, 0, '2016-09-09 00:17:54', 1),
(34, 1, 1, 'Suspanded User', 0, 0, 0, '2016-09-09 00:18:32', 1),
(35, 0, 1, 'Disapprove Interest', 0, 0, 32, '2016-09-10 04:40:21', 1),
(36, 4, 1, 'Read Photo Report', 1, 0, 0, '2016-09-10 04:41:20', 1),
(37, 4, 1, 'Read Photo Report', 2, 0, 0, '2016-09-10 04:41:22', 1),
(38, 4, 1, 'Read Photo Report', 3, 0, 0, '2016-09-10 04:41:23', 1),
(39, 10, 1, 'Read Photo Report', 4, 0, 0, '2016-09-10 04:41:27', 1),
(40, 31, 1, 'Viewed Message History', 0, 0, 0, '2016-09-10 04:44:25', 1),
(41, 0, 1, 'Update Interest', 0, 0, 1, '2016-09-11 14:16:34', 1),
(42, 0, 1, 'Update Interest', 0, 0, 2, '2016-09-11 14:16:57', 1),
(43, 0, 1, 'Disapprove Interest', 0, 0, 1, '2016-09-11 14:17:44', 1),
(44, 0, 1, 'Update Interest', 0, 0, 4, '2016-09-11 14:18:18', 1),
(45, 27, 1, 'Read Photo Report', 6, 0, 0, '2016-09-12 23:37:57', 1),
(46, 23, 1, 'Read Photo Report', 8, 0, 0, '2016-09-12 23:38:00', 1),
(47, 0, 1, 'Approve Interest', 0, 0, 17, '2016-09-12 23:38:22', 1),
(48, 0, 1, 'Disapprove Interest', 0, 0, 19, '2016-09-15 11:43:48', 1),
(49, 0, 1, 'Disapprove Interest', 0, 0, 2, '2016-09-16 10:03:52', 1),
(50, 0, 1, 'Disapprove Interest', 0, 0, 20, '2016-09-16 10:04:38', 1),
(51, 0, 1, 'Approve Interest', 0, 0, 18, '2016-09-16 11:17:36', 1),
(52, 0, 1, 'Update Interest', 0, 0, 3, '2016-09-16 11:17:53', 1),
(53, 0, 1, 'Approve Interest', 0, 0, 23, '2016-09-26 02:11:11', 1),
(54, 0, 1, 'Disapprove Interest', 0, 0, 22, '2016-09-26 02:12:02', 1),
(55, 31, 1, 'Viewed Message History', 0, 0, 0, '2016-10-04 15:26:58', 1),
(56, 113, 1, 'Disapproved Photo', 0, 302, 0, '2016-10-26 05:46:02', 1),
(57, 103, 1, 'Disapproved Photo', 0, 280, 0, '2016-10-26 05:46:05', 1),
(58, 103, 1, 'Disapproved Photo', 0, 285, 0, '2016-10-26 05:46:06', 1),
(59, 100, 1, 'Read Abuse Report', 0, 0, 0, '2016-11-01 12:32:11', 1),
(60, 100, 1, 'Read Abuse Report', 0, 0, 0, '2016-11-01 12:32:14', 1),
(61, 0, 1, 'Dismiss Abuse Report', 3, 0, 0, '2016-11-01 13:01:59', 1),
(62, 0, 1, 'Dismiss Abuse Report', 4, 0, 0, '2016-11-08 11:39:14', 1),
(63, 99, 1, 'Dismiss Abuse Report', 5, 0, 0, '2016-11-08 11:40:13', 1),
(64, 1, 0, 'Suspanded User', 0, 0, 0, '2016-11-08 11:40:36', 1),
(65, 94, 1, 'Dismiss Abuse Report', 7, 0, 0, '2016-11-08 11:59:03', 1),
(66, 4, 1, 'Photo Approved', 0, 0, 0, '2016-11-08 12:58:04', 1),
(67, 4, 1, 'Photo Approved', 1, 0, 0, '2016-11-08 13:02:22', 1),
(68, 4, 1, 'Photo Deleted', 2, 0, 0, '2016-11-08 13:22:41', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sr_body_type`
--

CREATE TABLE IF NOT EXISTS `sr_body_type` (
  `bodytype_id` int(11) NOT NULL AUTO_INCREMENT,
  `body_type` varchar(20) NOT NULL,
  `status` int(11) NOT NULL COMMENT '1:active,0:inactive',
  PRIMARY KEY (`bodytype_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `sr_body_type`
--

INSERT INTO `sr_body_type` (`bodytype_id`, `body_type`, `status`) VALUES
(1, 'Average', 1),
(2, 'Slim', 1),
(3, 'Atheletic', 1),
(4, 'Cuddly', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sr_cms`
--

CREATE TABLE IF NOT EXISTS `sr_cms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `page` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `sr_cms`
--

INSERT INTO `sr_cms` (`id`, `title`, `description`, `page`, `status`, `created_on`, `created_by`, `updated_on`, `updated_by`) VALUES
(3, 'Terms of Use', 'Introduction\r\n<p>Revised on 21/02/2014</p>\r\n\r\n<p>These Terms and Conditions apply to the entire contents&#39; of the present website.</p>\r\n\r\n<p>If you are a Startrishta.com member please note the legal entity you are entering into a contract with is:</p>\r\n\r\n<p>Startrishta.com Ltd, a private limited company incorporated in England and Wales with registered company number 8897921 whose postal address is BM Startrishta.com, London, WC1N 3XX and whose registered office is at 145-157 St John Street, London, EC1V 4PW.</p>\r\n\r\n<p>These terms and conditions are binding documents which govern your use of our services and our provision of the service to you. You are advised to read these terms and conditions carefully. This will help ensure that they contain everything you want and that there is nothing within them that you are not prepared to agree to. If they contain anything that you are not willing to agree with then your only course of redress is not to use any of the services offered by any of our brands.</p>\r\n1. Definitions and Interpretations\r\n\r\n<p>The following words shall have the followings meaning in these Terms &amp; Conditions:</p>\r\n\r\n<p><strong>Agreement &mdash;</strong>&nbsp;shall mean these Terms and Conditions;</p>\r\n\r\n<p><strong>Subscription &mdash;</strong>&nbsp;refers to a paid fixed rate giving unlimited access to our paid Services, as required, for a limited period that can be 1 month, 3 months and 6 months, renewable after the purchased period where the subscription has been purchased using a bank card or any other method of payment listed on our website and allowing continuing debits to be made;</p>\r\n\r\n<p><strong>Service(s) &mdash;</strong>&nbsp;refers to the entirety of the Services available to you via any of our sites our Members, whether paid or unpaid;</p>\r\n\r\n<p><strong>Paid Services &mdash;&nbsp;</strong>refers to all Services accessible, at rates quoted, by this site to Members with a valid subscription.</p>\r\n\r\n<p><strong>Member(s) &mdash;&nbsp;</strong>refers to any or all valid registered users of our Service, whether they access Services or Paid Services.</p>\r\n\r\n<p><strong>Member Content &mdash;&nbsp;</strong>refers to the information contained in the Member&#39;s profile, created by the Member and displayed on any of our site(s) from time to time.</p>\r\n\r\n<p>The terms us, we, our refers to all brands owned and operated by Startrishta.com Ltd for the purposes of this Agreement.</p>\r\n2. Registration\r\n\r\n<p>To become a Member of our site you must be at least Sixteen (16) years old.</p>\r\n\r\n<p>You must complete all of the fields on the registration form(s).</p>\r\n\r\n<p>You should not have been convicted of any offence, or subject to any court order, relating to assault, violence, sexual misconduct or harassment. You are advised that a breach of this clause constitutes a serious breach of this Agreement;</p>\r\n\r\n<p>Should you wish to sign up a friend to our Services; you must have obtained the prior consent of this friend in order for us to process their data and provide the Service to them via yourself.</p>\r\n3. Your right to cancel under the Distance Selling Regulations\r\n\r\n<p>This section applies to you only if you are a consumer as defined in the Consumer Protection (Distance Selling) Regulations 2000 and resident within the EU. You may cancel your order for the Services by giving us written notice within seven working days of placing your order. Within 30 days of your notice we will provide a refund. However, this right of cancellation does not apply once you have started to use the relevant Services.</p>\r\n4. Use of the Services\r\n\r\n<p>Password(s) and any other information used to identify a Member are strictly private and confidential and must not be passed on or shared with any third parties.</p>\r\n\r\n<p>To access the Services you will need a computer, laptop and or smart mobile phone. It is your responsibility to ensure that you have (and continue to have) one of these devices including the cost of using these devices.</p>\r\n\r\n<p>We may deactivate accounts of Members who have not used the Services for six months or more and for whom no pass remains valid. In the case of paying Members, this six month period begins on the date that the last Pass expired.</p>\r\n5. Your Safety and Security\r\n\r\n<p>It is important that you understand that we cannot advise on or broker marriage or long-term relationships; the onus still remains on you to decide who is right for you; we just provide the options.</p>\r\n\r\n<p>Furthermore; we do not have a contractual obligation nor moral or ethically responsibility or the technical means to verify the identity of persons who register as Members or use our Services; or to verify or monitor Member Content (although we do reserve the right to monitor if we think it appropriate).</p>\r\n\r\n<p>As a Member you are advised not to assume that any Member Content is accurate. A person may not be who he or she claims to be. You should at all times exercise the same caution you would normally when you meet people. We cannot be liable for false or misleading statements by Members.</p>\r\n\r\n<p>As a Member you at all times remain solely responsible (and liable) for the use of your identification information by third parties or for the actions or statements made through your Member&#39;s account, whether these be fraudulent or not.</p>\r\n\r\n<p>When arranging to meet another person through use of the Services, you must take appropriate precautions. Any such meetings are at your own risk and are not our responsibility.</p>\r\n\r\n<p>You are responsible for the acts or omissions of any third parties who use your identification information or account, whether fraudulent or not. You agree to indemnify us against any claims of this kind. For the avoidance of all doubt; we shall not be liable if your identity is used by someone else.</p>\r\n\r\n<p>If you feel or suspect that there has been a breach (of any kind) of your account and or the information displayed on your profile then you must immediately notify us. Furthermore; you should also amend your password.</p>\r\n6. Member Obligation\r\n\r\n<p>As a Member you agree not to:</p>\r\n\r\n<ul>\r\n	<li>in connection with the Services breach any applicable law, regulation or code of conduct;</li>\r\n	<li>make comments, broadcast or publish in any form whatsoever Member content or any other content that infringes the rights of others or that is defamatory, injurious, obscene, offensive, violent or can/does incite violence, or is any way shape or form racist or xenophobic;</li>\r\n	<li>in general; not to make any comment (whether in writing or verbally) that is contrary to the purpose of any of our sites&#39; current rules and laws in force or acceptable norms and standards;</li>\r\n	<li>upload photographs, videos and any other information in terms of data or files supplied by a Member that are indecent. Photographs, videos and other information in terms of data or files supplied must refer exclusively to the Member or to a third party from whom the Member has expressly obtained consent and are the sole responsibility of the Member concerned;</li>\r\n	<li>provide email addresses to us of other persons or publish or send any Member Content referring to other persons without having obtained their prior consent;</li>\r\n	<li>reveal through the Services any information that enables you to be personally identified or contacted other than through the Services including last name, postal / email address or telephone number; or and</li>\r\n	<li>you agree not to use the Services for junk mail, spam and pyramid or similar or fraudulent schemes.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n7. Member Content\r\n\r\n<p>At Startrishta.com; we put you the Member in control; therefore for the avoidance of all doubt it is your responsibility to decide which information to publish or send as Member Content. Startrishta.com Ltd cannot be held liable for any misuse thereof by any other user or third party.</p>\r\n\r\n<p>The information supplied by a Member must be accurate and conform to the reality. The consequences of disclosing information on the life of the Member or of other Members are the sole responsibility of the Member concerned.</p>\r\n\r\n<p>Consequently, he/she waives all recourse against Startrishta.com Ltd, notably on the basis of any possible damage to the Member&#39;s right to his/her image, the Member&#39;s honour and reputation, or the Member&#39;s privacy, resulting from the dissemination or revelation of information concerning the Member under the conditions foreseen by this agreement since the Member has given his/her prior, free and express consent to such revelation through his/her registering with the Service and in application of this Agreement.</p>\r\n\r\n<p>We reserve the right not to accept or to suspend or remove from our Services all or part of any profile, personal ad or any other Member Content for any reason we deem fit.</p>\r\n\r\n<p>We are not liable for Member Content or other activities of Members which may breach the rights of other Users or third parties.</p>\r\n\r\n<p>Members are urged to notify us of inappropriate Member Content. You acknowledge that such notification may take place and that we may take steps outlined in this Agreement in respect of such information which comes to our attention.</p>\r\n\r\n<p>We reserve the right not to accept or to suspend or remove from our Services all or part of any profile, personal ad or any other Member Content for any reason we deem fit.</p>\r\n\r\n<p>We reserve the right to irretrievably delete messages and other Member Content after any period of time if we exercise any right of termination under this agreement.</p>\r\n8. Payment Terms\r\n\r\n<p>The use of the Paid Services assumes that the Member has a subscription or has purchased Credits on a one of basis. Members can acquire a subscription/ purchase credits by payment methods proposed by this site.</p>\r\n\r\n<p>The prices and the terms of payment for the different Paid Services are displayed at all times on this site, including at the point when the member chooses to make a purchase.</p>\r\n\r\n<p>The activation of a subscription or adding additional credits on a member&#39;s account occurs as soon as, or a few moments after a valid transaction has been completed (successful online transaction).</p>\r\n\r\n<p>The Member can contact the site at any time to cancel their subscription. The cancellation will take effect from the expiry date given for the active pass, in accordance with&nbsp;<strong>Article 15, &#39;Termination&#39;</strong>, below.</p>\r\n\r\n<p>All subscriptions will be automatically renewed. Unless, the Member notifies us of their wish to terminate their subscription at least 48 hours before the subscription&#39;s expiration date. The renewal shall be performed in accordance with the manner of payment originally chosen by the Member, at the price rate of the subscription to which the Member originally subscribed. For the avoidance of all doubt Members can avoid having their subscription auto-renewed if they contact us 48 hours before their subscription expiration date to terminate their subscription.</p>\r\n\r\n<p>Members can also subscribe to smartphone applications. These applications can be provided by other service providers (such as iTunes or mobile services providers) and therefore may be subject to other payment conditions than those used and available to Members on any of our sites. Any such applicable terms will only be apply to one-off purchases and all relevant terms and conditions associated with these payments will be brought to the attention of the Member prior to purchase.</p>\r\n\r\n<p>Purchase of a subscription to a smartphone application or other mobile service(s) not enable the Member to use Paid Services on our sites.</p>\r\n9. Personal privacy and protection of Member data\r\n\r\n<p>We uphold the strictest of standards with respect to protection of privacy and of personal information, and has made a notification to the UK Information Commissioner, under the no. xxxxxxx. Please see our Privacy Policy for full details on how we store and use the information you provide to us.</p>\r\n10. Intellectual Property\r\n\r\n<p>The trademarks, logos, graphics, photographs, animations, videos and texts featured on the this website and all affiliate websites, are the intellectual property of Startrishta.com Ltdor its partners and may not be reproduced, used or represented without the express permission of Startrishta.com Ltd or its partners, under threat of legal action.</p>\r\n\r\n<p>The rights of use granted by ourselves to the Member are strictly limited to accessing, downloading, printing and reproduction on all media (hard disk, floppy disk, CD-ROM, etc.) and to use of these documents for private and personal purposes in the scope of and for the duration for of the Member&#39;s membership. Any other use by the Member is prohibited without the express authorisation of Startrishta.com Ltd.</p>\r\n\r\n<p>In particular, the Member is prohibited from modifying, copying, reproducing, disseminating, transmitting, exploiting for commercial gain and/or distributing in any form whatsoever the Services, from all of our website pages or software codes for elements comprising the any element of Services and website.</p>\r\n11. Liabilities and Warranties\r\n\r\n<p>This section (and any other clause excluding or restricting our liability) applies to our directors, officers, employees, subcontractors, agents and affiliated companies (who may enforce this clause under the Contracts (Rights of Third Parties, Act 1999) as well as to us. Nothing in this agreement in any way limits or excludes our liability for negligence causing death or personal injury or for fraudulent misrepresentation or for anything which may not legally be excluded or limited.</p>\r\n\r\n<p>You must give us a reasonable opportunity to remedy any matter for which we are liable before you incur any costs remedying the matter yourself. If you do not, we shall have no liability to you for that matter.</p>\r\n\r\n<p>We shall not be liable for any damage to a Member caused or contributed to by that Member, for example by not complying with this Agreement.</p>\r\n\r\n<p>Our liability of any kind (including our own negligence) with respect to the Services for any one event or series of related events is limited to five times the total fees payable by you in the 12 months before the event(s) complained of or the sum of &pound;1,000 whichever is higher.</p>\r\n\r\n<p>In no event (including our own negligence) will we be liable for any:</p>\r\n\r\n<ul>\r\n	<li>economic losses (including, without limit, loss of revenues, profits, contracts, business or anticipated savings);</li>\r\n	<li>loss of goodwill or reputation;</li>\r\n	<li>special, indirect or consequential losses; or and</li>\r\n	<li>damage to or loss of data (even if we have been advised of the possibility of such losses).</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n12. Indemnity\r\n\r\n<p>You agree to indemnify us (including our directors, officers, employees, subcontractors, agents and affiliated companies) against all third party claims and liabilities related to your breach of this agreement and/or to your use of the Services.</p>\r\n13. Functioning of the website and Services\r\n\r\n<p>To use the Services, the Member must have the necessary hardware equipment and software and the necessary parameters required to properly use the website i.e. access to the internet. Members are also advised to JavaScript functions enabled, cookies enabled, and pop-ups enabled.</p>\r\n\r\n<p>The Member must have the skills, hardware and software required to use the Internet or, as appropriate, Internet, and telephone services, and acknowledges that the characteristics and constraints of the Internet mean that the security, availability and integrity of Internet data transmissions cannot be guaranteed.</p>\r\n\r\n<p>We do not guarantee that the Services will function if the Member activates a pop-up killing tool. In this case, the function should be deactivated before using the Service.</p>\r\n\r\n<p>We do not guarantee that the Services will be usable if the Member&#39;s internet service provider is unable to provide its services properly. In this context, we cannot be held responsible for the non-functioning, unavailability or adverse conditions of usage of the website resulting from incorrect hardware, problems experienced by the Member&#39;s internet service provider or blockages on the Internet networks or for all other reasons outside our sphere of influence. Moreover, due amongst other things to the specifics of their Internet browser, Members connecting through AOL may encounter problems making our sites function properly. Furthermore, smartphone applications are only available to our Members in possession of the smartphone handset and internet access is required.</p>\r\n\r\n<p>Under these conditions, we do not guarantee that the Services shall function without interruption or error. In particular, the use of the our website may be interrupted at any time for the purposes of maintenance, updates or technical improvements, or to develop its content and/or presentation. Whenever possible, we shall inform its Members prior to maintenance work or updates.</p>\r\n\r\n<p>Apple users must use Internet Explorer &mdash; we do not guarantee optimal functioning of the website when using SAFARI or OPERA browsers.</p>\r\n\r\n<p>Please note that up-to-date Adobe Flash software is required for this website to function properly (download from:&nbsp;<a href=\\"http://vibescomm.in/wip_projects/development/start-rishta/www.adobe.com\\" target=\\"_blank\\">www.adobe.com</a>). Depending on your network configuration (if protected behind a firewall or proxy), connection to our Messenger service may not be possible.</p>\r\n14. Third party websites\r\n\r\n<p>We or third parties may provide links on our Site to third party websites. You use them at your own risk. We do not review such sites. We do not recommend or endorse such sites nor are we responsible for the content of those sites or any goods or services offered thereon. If in the course of performing a search on our site you encounter any third party website the use of which would violate applicable law, you must immediately cease use of such website.</p>\r\n15. Termination\r\n\r\n<p>A Member may at any time and without the need to provide any reason end his/her registration with us by requesting the closure of his/her account in the area of the website designated for such purposes. Such request shall be deemed effective from the first working day after receipt by us of the request for closure of the account concerned. Such a request does not trigger reimbursement of, if appropriate, any time remaining on the Member&#39;s subscription.</p>\r\n\r\n<p>Termination of a subscription, by a Member, shall be effective on the applicable subscription&#39;s expiration date provided; the Member has contacted us at least 48 hours before their subscription expiration date in order to terminate the subscription.</p>\r\n\r\n<p>Without prejudice to the other provisions hereof, where the Member commits a serious breach, we will terminate the Member&#39;s account without prior notification or warning. Such termination shall have the same effects as a termination by the Member.</p>\r\n\r\n<p>Without prejudice to the other provisions hereof, where the Member commits a breach, we will terminate the Member&#39;s account seven (7) days after having sent to the Member an email requesting unsuccessfully that he or she comply with these Terms of Use.</p>\r\n\r\n<p>Such termination shall take effect without prejudice to any damages that we might claim from the Member or his/her beneficiaries and legal representatives, in compensation of the harm suffered as a result of such breaches.</p>\r\n\r\n<p>The Member will be informed by email of the termination, or the confirmation of the termination, of his/her account. Data relating to the Member will be destroyed at his/her request or upon expiration of the legal time period following the termination of the Member&#39;s account.</p>\r\n\r\n<p>As noted in herein, Members can also subscribe to smartphone application. Smartphone applications can be provided by other service providers and therefore may be subject to other termination requirements and provisions. Members are urged to consult their Smartphone application for full details.</p>\r\n16. Entire Agreement\r\n\r\n<p>This Agreement and the pages on this website to which these terms refer, constitute a contract that governs the relationship between the Member and Startrishta.com Ltd.</p>\r\n\r\n<p>If any of the provisions of these Terms of Use is declared void in application of a law, a regulation, or a final decision of a court having proper jurisdiction, all other provisions shall remain fully in effect. Furthermore, failure by a Party to take action in respect of the breach by the other Party of any provisions of these Terms of Use, shall not be interpreted as constituting a waiver by said first Party of the right to take action in future in respect of such a breach.</p>\r\n17. Amendments\r\n\r\n<p>We may modify these Terms and Conditions at any time. The Member will be informed of the nature of these modifications as soon as they are posted on the website. The modifications shall take effect 14 days after their posting on the website. For Members registered after any modifications have been put online, these modifications shall be immediately applicable, as the Member will have expressly accepted them when the account was opened.</p>\r\n18. Jurisdiction and Applicable Law\r\n\r\n<p>This contract shall be governed by English law and any disputes will be decided only by the English courts.</p>\r\n\r\n<p>For any questions you wish to ask, you may contact us by completing the contact form.</p>\r\n', 'Terms', 1, '2015-08-10 13:21:56', 7, '2015-08-10 13:21:56', 7),
(4, 'Privacy Policy', '<p>This privacy policy applies to Startrishta.com Ltd and its affiliate companies and brands. The terms &lsquo;us&rsquo;, &lsquo;we&rsquo;, &lsquo;our&rsquo; refers to all brands owned and operated by Startrishta.com Ltd for the purposes of this Agreement. We uphold the strictest of standards with respect to protection of privacy and of personal information. Our technical teams do their utmost to ensure the safety of our sites. Internet security is a complex issue and no system can be considered 100% secure. Should a security breach occur Startrishta.com will endeavour to act as fast as possible to remedy the problem. Some information, comments or content (photographs or video) that the Member optionally provides may possibly, under the responsibility and on the initiative of the Member concerned, reveal the ethnic origin of the Member, his/her nationality, religion and/or sexual orientation. By providing such optional information, the Member concerned manifests his/her intention and, consequently, expressly consents to, and takes sole and exclusive responsibility for, the processing of this mentioned &quot;sensitive&quot; data by Startrishta.com Ltd. Each Member can access or request access to information concerning him/her in order to have it modified, deleted or to forbid any further use by us. Members can submit such requests for access by mailing their requests to the following address: BM Startrishta.com, London, WC1N 3XX or by filling out the contact form, and each Member shall carefully identify the sender&#39;s personal information. Each Member can, at the time of registration or at any time thereafter, request to receive and, subsequently, request without charge via startrishta.com to cease to receive, our newsletters and/or promotional offers sent to her/him by email or to mobile phone from Startrishta.com Ltd and/or its partners. The rights and warranties of startrishta.com Members respect in particular the UK Data Protection Act of 1998 implementing the EU Directive 95/46/EC dated 24 October 1995 on the protection of personal data and privacy within the European Union; and The Electronic Commerce Regulations of 2002 and the Privacy and Electronic Communications Regulations of 2003 implementing the EU Directive 2000/31/EC dated 8 June 2000 on electronic commerce and EU Directive 2002/58/EC dated 12 July 2002 on the protection of personal data and privacy in electronic communications.</p>\r\n1. When and why do we gather information about you?\r\n\r\n<p>The Member is asked to supply information about himself/herself when he/she registers with the Service, participates in a contest, responds to a survey, participates in a chat or acquires a subscription. Certain items of information are mandatory in order to gain access to Services. We have the ability to retain your contact details should you input them on our website even if you do not complete your registration.</p>\r\n2. What sort of information do we gather?\r\n\r\n<p>Personal information gathered by startrishta.com can include your name, mailing and/or email address, fixed line and/or mobile telephone numbers, bank information, information about your physical appearance, photographs, voice recording, video, personal values, religion, interests, and your use of the Service. Furthermore, certain non-personal information are also gathered, such as the version of the Member&#39;s and any other visitor&#39;s web browser (Netscape, Internet Explorer, etc.), the operating system (Windows 98, Mac Os, etc.) and the IP address of the computer from which they are visiting. Finally, startrishta.com uses cookies, designed to store information used to identify the Member while he/she is browsing on our websites, in order to allow the Member to continue browsing without having to re-enter this information for each new page. The Member always has the option of preventing the use of cookies by modifying the options of his/her web browser. See section 4 Cookies Policy for further information.</p>\r\n3. Who has access to your information?\r\n\r\n<p>The information gathered about you when you register with startrishta.com and subscribe to our Services is used to offer you our different Services. All precautions have been taken on our databases to archive your information in a secure environment. Only a small number of our employees have access to your information, which is only accessible in case of necessity. The personal information you provide at the time of registration which does not comprise your personal ad and your profile will not be accessible by third parties, nor passed on, sold or exchanged, except in the cases named below and subject to your prior information and agreement, or in assumption of your non opposition hereto. We may send you promotional offers from some of our partners, subject to your explicit and informed consent given during registration, unless you choose not to be contacted during your registration or unless you change your mind at any moment thereafter. If you do not wish to receive any special offers from startrishta.com or from another partners companies, let us know when you subscribe, or alternatively at any time by going to &quot;My Account&quot; on the startrishta.com website, or contact us by mail. Startrishta.com may occasionally share general socio-demographic information that does not include names with selected partners to allow them to target their announcements (by age category, gender, etc.). In this case, we will not send these partners any information that would allow them to identify you. The information contained in your personal ad, your search criteria and your profile can be accessed on startrishta.com, on the web, by email (newsletters), by mobile telephone.In addition, these information may be broadcasted directly by startrishta.com or via our partners to persons interested in startrishta.com, through newsletters or third-party websites, or by all other electronic (email, text messaging, etc.) or audiovisual (radio, television, etc.) communication tools, or by written press (newspapers, magazines, etc.), in order to increase your chances of meeting someone by promoting your person ads, search criteria and profile. Consequently, the Member explicitly authorises startrishta.com to reproduce and broadcast the information contained in his/her personal ad, search criteria or profile (personal information, description, images, videos, etc.) on all or part of the startrishta.com Services (on the website, on the Internet, by email) and/or in a general manner, on all distribution media, in particular audiovisual communication (press, radio, analogue television, digital television, cable or satellite) or electronic communication (email, Internet), throughout the entire world and for the length of time established in these Terms of Use between the Member and one of our websites. For the purpose of applicable data protection legislation in the European Economic Area (&quot;EEA&quot;), the data controller of startrishta.com is Startrishta.com Ltd (postal address: BM Startrishta.com, London, WC1N 3XX, registered office: 145-157 St John Street, London, EC1V 4PW &amp; registered number 8897921). The Member explicitly authorises Startrishta.com Ltd to transfer the information you provided to startrishta.com and the benefits of the above mentioned rights to its partners and eventual successors of startrishta.com. If you no longer wish for startrishta.com or its partners to reproduce or broadcast the information comprised in your personal ad, your search criteria, or your profile, you can terminate your startrishta.com account following the conditions foreseen in the Article &quot;Termination&quot;. Since this information is comprised of your personal ad, your search criteria and your profile, the termination will only take effect upon the next update or version of these communications (printed, press, audiovisual, or electronic) containing your personal ad, your search criteria and your profile information.</p>\r\n4. Cookies Policy\r\n\r\n<p>Cookies are small text files that are placed on your computer by websites that you visit or certain emails you open. They are widely used in order to make websites work, or work more efficiently, as well as to provide business and marketing information to the owners of the site. They contain information about the use of your computer but don&#39;t include personal information about you (they don&#39;t store your name, for instance). For more detailed information about cookies visit&nbsp;<a href=\\"http://www.allaboutcookies.org/\\" target=\\"_blank\\">http://www.allaboutcookies.org</a>&nbsp;This policy explains how cookies are used on Startrishta.com in general - and, below, how you can control the cookies that may be used on this site (not all of them are used on every site). About this Cookie policy This Cookie Policy applies to all of our websites and our mobile applications (&quot;the Website&quot;). In this Cookie Policy, when we refer to any of our Websites, we mean any website or mobile application operated by or on behalf of Startrishta.com Ltd or its subsidiaries and affiliates, regardless of how you access the network. This Cookie Policy forms part of and is incorporated into our Website Terms and Conditions. By accessing the Website, you agree that this Cookie Policy will apply whenever you access the Website on any device. Any changes to this policy will be posted here. We reserve the right to vary this Cookie Policy from time to time and such changes shall become effective as soon as they are posted. Your continued use of the Website constitutes your agreement to all such changes. Our use of cookies We may collect information automatically when you visit the Website, using cookies. The cookies allow us to identify your computer and find out details about your last visit. You can choose, below, not to allow cookies. If you do, we can&#39;t guarantee that your experience with the Website will be as good as if you do allow cookies. The information collected by cookies does not personally identify you; it includes general information about your computer settings, your connection to the Internet e.g. operating system and platform, IP address, your browsing patterns and timings of browsing on the Website and your location. Most internet browsers accept cookies automatically, but you can change the settings of your browser to erase cookies or prevent automatic acceptance if you prefer. These links explain how you can control cookies via your browser - remember that if you turn off cookies in your browser then these settings apply to all websites not just this one:</p>\r\n\r\n<ul>\r\n	<li>1. Internet Explorer&nbsp;<a href=\\"http://support.microsoft.com/kb/278835\\" target=\\"_blank\\">http://support.microsoft.com/kb/278835</a>&nbsp;(this page links to further information for different versions of IE - the mobile version is at&nbsp;<a href=\\"http://www.microsoft.com/windowsphone/en-us/howto/wp7/web/%20changing-privacyand-other-bro%20wser-settings.aspx\\" target=\\"_blank\\">http://www.microsoft.com/windowsphone/en-us/howto/wp7/web/ changing-privacyand-other-bro wser-settings.aspx.</a></li>\r\n	<li>2. Chrome:&nbsp;<a href=\\"http://support.google.com/chrome/bin/answer.py?hl=en-GB&amp;answer=95647\\" target=\\"_blank\\">http://support.google.com/chrome/bin/answer.py?hl=en-GB&amp;answer=95647</a></li>\r\n	<li>3. Safari:&nbsp;<a href=\\"http://support.apple.com/kb/HT1677\\" target=\\"_blank\\">(or http://support.apple.com/kb/HT1677 for mobile versions)</a></li>\r\n	<li>4. Firefox:&nbsp;<a href=\\"http://support.mozilla.org/en-US/kb/Enabling%20and%20disabling%20cookies\\" target=\\"_blank\\">http://support.mozilla.org/en-US/kb/Enabling%20and%20disabling%20cookies</a></li>\r\n	<li>5. Blackberries:<a href=\\"http://docs.blackberry.com/en/smartphone_users/deliverables/32004/Turn_off_cookies_in_the_browser_60_1072866_11.jsp\\" target=\\"_blank\\">http://docs.blackberry.com/en/smartphone_users/deliverables/32004/Turn_off_cookies_in_the_browser_60_1072866_11.jsp</a></li>\r\n	<li>6. Android:<a href=\\"http://support.google.com/mobile/bin/answer.py?hl=en&amp;answer=169022\\" target=\\"_blank\\">http://support.google.com/mobile/bin/answer.py?hl=en&amp;answer=169022</a></li>\r\n	<li>7. Opera:&nbsp;<a href=\\"http://www.opera.com/browser/tutorials/security/privacy/1\\" target=\\"_blank\\">http://www.opera.com/browser/tutorials/security/privacy/1</a></li>\r\n</ul>\r\n\r\n<p>Types of cookie that may be used during your visit to the Website: The following types of cookie are used on this site. We don&#39;t list every single cookie used by name - but for each type of cookie we tell you how you can control its use.</p>\r\nAnalytics cookies\r\n\r\n<p>These monitor how visitors move around the Website and how they reached it. This is used so that we can see total (not individual) figures on which types of content users enjoy most, for instance. You can opt out of these if you want:</p>\r\n\r\n<ul>\r\n	<li>1.Omniture:&nbsp;<a href=\\"http://www.omniture.com/en/privacy/2o7#optout\\" target=\\"_blank\\">http://www.omniture.com/en/privacy/2o7#optout</a></li>\r\n	<li>2. Google:<a href=\\"https://tools.google.com/dlpage/gaoptout\\" target=\\"_blank\\">&nbsp;https://tools.google.com/dlpage/gaoptout</a></li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\nThird-party service cookies\r\n\r\n<p>he social sharing services we offer are run by other companies. These companies may drop cookies on your computer when you use them on our site or if you are already logged in to them. Here is a list of places where you can find out more about specific services that we may use and their use of cookies:</p>\r\n\r\n<ul>\r\n	<li>Facebook&#39;s data use policy :&nbsp;<a href=\\"http://www.facebook.com/about/privacy/your-info-on-other\\" target=\\"_blank\\">http://www.facebook.com/about/privacy/your-info-on-other</a></li>\r\n	<li>Twitter&#39;s privacy policy :&nbsp;<a href=\\"https://twitter.com/privacy\\" target=\\"_blank\\">https://twitter.com/privacy</a></li>\r\n</ul>\r\nOur own ad serving and management cookies\r\n\r\n<p>We sell space on some of our websites to advertisers - they pay for the content that you enjoy for free. As part of this, we use several services to help us and advertisers understand what adverts you might be interested in. These cookies hold information about the computer - they don&#39;t hold personal information about you (ie it&#39;s not linked to you as an individual). But they might hold a record of what other websites you&#39;ve looked at - so we could show you a car advert if you&#39;ve previously visited a motoring website. These are the services we use and how you can control those cookies.</p>\r\n\r\n<ul>\r\n	<li>1. Emediate (Ad-serving Technology): Privacy policy and opt out via<a href=\\"http://www.emediate.com/143/\\" target=\\"_blank\\">&nbsp;http://www.emediate.com/143/</a></li>\r\n	<li>2. Connextra (Ad-serving Technology): Privacy policy and opt out via<a href=\\"http://connextra.net/privacy_policy.htm\\" target=\\"_blank\\">&nbsp;http://connextra.net/privacy_policy.htm</a></li>\r\n	<li>3. Doubleclick (Ad-serving Technolocy): Privacy policy at&nbsp;<a href=\\"http://www.google.com/doubleclick/privacy/\\" target=\\"_blank\\">http://www.google.com/doubleclick/privacy/&nbsp;</a>and opt out via</li>\r\n	<li>4. Smart Ad-server (Ad-serving Technology): Privacy policy and opt out via http://smartadserver.com/privacy-policy Please note that turning off advertising cookies will not mean that you are not served any advertising but merely that it will not be tailored to your interests.</li>\r\n</ul>\r\nOther ad management cookies\r\n\r\n<p>Some advertisements on the Website are provided by other organisations. Our advertising partners will serve advertisements that they believe are most likely to be of interest to you, based on information about your visit to the Website and other websites. In order to do this, our advertising partner may need to place a cookie on your computer. These cookies hold information about the computer - they don&#39;t hold personal information about you (ie it&#39;s not linked to you as an individual).</p>\r\n\r\n<ul>\r\n	<li>1. AdJug (Advertising Partner): Privacy policy and opt out via<a href=\\"http://www.adjug.com/info/privacy.asp\\" target=\\"_blank\\">&nbsp;http://www.adjug.com/info/privacy.asp</a></li>\r\n	<li>2. Specific Media (Advertising Partner): Privacy policy and opt out via<a href=\\"http://www.specificmedia.co.uk/privacy\\" target=\\"_blank\\">&nbsp;http://www.specificmedia.co.uk/privacy</a></li>\r\n	<li>3. Criteo UK (Advertising Partner): Privacy policy and opt out via&nbsp;<a href=\\"http://www.criteo.com/us/privacy-policy\\" target=\\"_blank\\">http://www.criteo.com/us/privacy-policy</a></li>\r\n	<li>4. Xaxis UK (Advertising Partner): Privacy policy and opt out via&nbsp;<a href=\\"http://www.xaxis.com/uk/page/privacy-policy\\" target=\\"_blank\\">http://www.xaxis.com/uk/page/privacy-policy</a></li>\r\n	<li>5. YOC Performance (Mobile Advertising Partner): Privacy policy and opt out via&nbsp;<a href=\\"https://www.yoc-performance.com/company_privacy.html\\" target=\\"_blank\\">https://www.yoc-performance.com/company_privacy.html&nbsp;</a><a href=\\"https://www.yoc-performance.com/company_privacy.html\\" target=\\"_blank\\">https://www.yoc-performance.com/company_privacy.html</a></li>\r\n	<li>6. AOL Advertising (Advertising Partner) - Privacy policy available at<a href=\\"http://privacy.aol.co.uk/\\" target=\\"_blank\\">&nbsp;http://privacy.aol.co.uk&nbsp;</a>and opt-out at<a href=\\"http://www.youronlinechoices.com/uk/your-adchoices\\" target=\\"_blank\\">http://www.youronlinechoices.com/uk/your-adchoices&nbsp;</a>Rubicon (Ad-serving Technology). More information on Rubicon Project and how it helps both website operators and their site users may be obtained here:&nbsp;<a href=\\"http://www.rubiconproject.com/whoweare\\" target=\\"_blank\\">http://www.rubiconproject.com/whoweare&nbsp;</a>You can control Rubicon Project cookies and opt out of them altogether, if you wish, here:&nbsp;<a href=\\"http://www.rubiconproject.com/privacy/consumer-online-profile-and-opt-out\\" target=\\"_blank\\">http://www.rubiconproject.com/privacy/consumer-online-profile-and-opt-out</a>Further information on the use of personal data and use of the Online Behavioural Advertising (OBA) &lsquo;AdChoices&rsquo; icon for online advertising is provided by the Interactive Advertising Bureau (IAB).</li>\r\n</ul>\r\nEurope\r\n\r\n<ul>\r\n	<li>1. EU countries:&nbsp;<a href=\\"http://www.youronlinechoices.eu/\\" target=\\"_blank\\">http://www.youronlinechoices.eu</a></li>\r\n	<li>2. UK:&nbsp;<a href=\\"http://www.youronlinechoices.com/uk\\" target=\\"_blank\\">http://www.youronlinechoices.com/uk</a></li>\r\n	<li>3. UK opt-outs:&nbsp;<a href=\\"http://www.youronlinechoices.com/uk/your-ad-choices\\" target=\\"_blank\\">http://www.youronlinechoices.com/uk/your-ad-choices</a></li>\r\n</ul>\r\nSite users in the United States should visit:\r\n\r\n<ul>\r\n	<li>1. NAI (Network Advertising Initiative):&nbsp;<a href=\\"http://www.networkadvertising.org/managing/opt_out.asp\\" target=\\"_blank\\">http://www.networkadvertising.org/managing/opt_out.asp</a></li>\r\n	<li>2. DAA (Digital Advertising Alliance) About Ads:&nbsp;<a href=\\"http://www.aboutads.info/choices/\\" target=\\"_blank\\">http://www.aboutads.info/choices/&nbsp;</a>You can also opt out of all advertising-related cookies on the above sites. Please note that turning off advertising cookies will not mean that you are not served any advertising but merely that it will not be tailored to your interests.</li>\r\n</ul>\r\nSite management cookies\r\n\r\n<p>These are used to maintain your identity or session on the Website. For instance, where our websites run on more than one server, we use a cookie to ensure that you are sent information by one specific server (otherwise you may log in or out unexpectedly). We may use similar cookies when you vote in opinion polls to ensure that you can only vote once. These cookies cannot be turned off individually but you could change your browser setting to refuse all cookies (see above) if you do not wish to accept them.</p>\r\n', 'privacy', 1, '2015-08-10 13:23:50', 7, '2015-08-10 13:23:50', 7),
(5, 'About us', '<p>Founded in 2015, Startrishta is a growing community dedicated to helping you find the right person near you - be it for matrimony, friendship, sharing interests or anything in-between! We are continually developing new &amp; useful features to ensure the fun never stops.</p>\r\n\r\n<p>We hope you will enjoy the site and find success on it.</p>\r\n', 'about', 1, '2015-08-12 19:51:30', 7, '2015-08-12 19:51:30', 7);

-- --------------------------------------------------------

--
-- Table structure for table `sr_comment_reply`
--

CREATE TABLE IF NOT EXISTS `sr_comment_reply` (
  `reply_id` int(11) NOT NULL AUTO_INCREMENT,
  `com_id` int(11) NOT NULL,
  `photo_id` int(11) NOT NULL,
  `text` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `reply_by` int(11) NOT NULL,
  `reply_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL,
  PRIMARY KEY (`reply_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=68 ;

--
-- Dumping data for table `sr_comment_reply`
--

INSERT INTO `sr_comment_reply` (`reply_id`, `com_id`, `photo_id`, `text`, `status`, `reply_by`, `reply_on`, `updated_on`) VALUES
(1, 31, 15, 'Greetings sir', 1, 6, '2016-01-18 02:40:14', '2016-01-18 02:40:14'),
(20, 38, 86, ':) Hi', 1, 1, '2016-01-27 11:36:37', '2016-01-27 11:36:37'),
(21, 39, 87, '(:', 1, 1, '2016-02-05 10:25:20', '2016-02-05 10:25:20'),
(22, 39, 87, '(:', 1, 1, '2016-02-05 10:25:33', '2016-02-05 10:25:33'),
(23, 39, 87, '(:', 1, 1, '2016-02-05 10:25:38', '2016-02-05 10:25:38'),
(24, 39, 87, '(:', 1, 1, '2016-02-05 10:25:52', '2016-02-05 10:25:52'),
(25, 41, 87, 'dcasdhf', 1, 1, '2016-02-06 11:51:48', '2016-02-06 11:51:48'),
(26, 41, 87, 'dffjk', 1, 1, '2016-02-06 11:51:51', '2016-02-06 11:51:51'),
(28, 38, 86, 'svsv', 1, 1, '2016-02-06 11:53:05', '2016-02-06 11:53:05'),
(29, 38, 86, '(:3', 1, 1, '2016-02-06 11:53:10', '2016-02-06 11:53:10'),
(33, 41, 87, 'hello', 1, 6, '2016-02-08 11:17:39', '2016-02-08 11:17:39'),
(38, 39, 87, 'hello...', 1, 50, '2016-02-09 11:15:24', '2016-02-09 11:15:24'),
(39, 39, 87, 'helllOOOOOOoo', 1, 50, '2016-02-09 11:16:48', '2016-02-09 11:16:48'),
(40, 46, 78, '(:', 1, 38, '2016-02-09 14:42:48', '2016-02-09 14:42:48'),
(42, 47, 122, 'Greetings to you sir', 1, 6, '2016-02-11 12:28:42', '2016-02-11 12:28:42'),
(43, 44, 86, 'hi', 1, 6, '2016-02-20 18:07:07', '2016-02-20 18:07:07'),
(44, 43, 86, 'yo', 1, 6, '2016-02-20 18:07:14', '2016-02-20 18:07:14'),
(45, 66, 170, 'hello', 1, 20, '2016-04-23 18:45:16', '2016-04-23 18:45:16'),
(46, 67, 175, ':)', 1, 1, '2016-04-25 15:35:04', '2016-04-25 15:35:04'),
(47, 66, 170, 'hei', 1, 1, '2016-04-25 16:00:15', '2016-04-25 16:00:15'),
(48, 69, 162, 'he', 1, 1, '2016-04-25 16:00:44', '2016-04-25 16:00:44'),
(49, 74, 94, 'he', 1, 1, '2016-04-25 17:22:40', '2016-04-25 17:22:40'),
(52, 79, 85, 'How R u', 1, 36, '2016-06-04 17:09:37', '2016-06-04 17:09:37'),
(53, 84, 245, 'thanks', 1, 92, '2016-07-22 11:45:44', '2016-07-22 11:45:44'),
(58, 63, 11, 'Hi bro', 1, 6, '2016-08-16 14:09:13', '2016-08-16 14:09:13'),
(59, 75, 131, 'yes it is', 1, 6, '2016-08-16 14:09:54', '2016-08-16 14:09:54'),
(60, 90, 97, 'sdfsdfsdfsfsd', 1, 6, '2016-08-16 19:21:39', '2016-08-16 19:21:39'),
(61, 90, 97, 'sdsdasda', 1, 6, '2016-08-16 19:26:12', '2016-08-16 19:26:12'),
(62, 90, 97, 'sdfsdfsfs', 1, 6, '2016-08-16 19:26:15', '2016-08-16 19:26:15'),
(63, 59, 132, 'sup bro', 1, 6, '2016-08-16 19:29:04', '2016-08-16 19:29:04'),
(64, 91, 132, 'greetings', 1, 6, '2016-08-16 19:29:37', '2016-08-16 19:29:37'),
(65, 85, 192, 'Kaise hai aap', 1, 36, '2016-09-05 16:16:28', '2016-09-05 16:16:28'),
(66, 93, 24, 'hi', 1, 94, '2016-10-12 18:04:04', '2016-10-12 18:04:04'),
(67, 107, 289, 'whats the good word', 1, 6, '2016-10-26 15:59:55', '2016-10-26 15:59:55');

-- --------------------------------------------------------

--
-- Table structure for table `sr_complexion`
--

CREATE TABLE IF NOT EXISTS `sr_complexion` (
  `complexion_id` int(11) NOT NULL AUTO_INCREMENT,
  `complexion` varchar(20) NOT NULL,
  `status` int(11) NOT NULL COMMENT '1:active,0:inactive',
  PRIMARY KEY (`complexion_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `sr_complexion`
--

INSERT INTO `sr_complexion` (`complexion_id`, `complexion`, `status`) VALUES
(1, 'Very Fair', 1),
(2, 'Fair', 1),
(3, 'Olive', 1),
(4, 'Dark', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sr_contact_attachment`
--

CREATE TABLE IF NOT EXISTS `sr_contact_attachment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contact_id` int(11) NOT NULL,
  `attachment` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `sr_contact_attachment`
--

INSERT INTO `sr_contact_attachment` (`id`, `contact_id`, `attachment`) VALUES
(1, 1, ''),
(2, 2, 'Koala.jpg'),
(3, 2, 'Lighthouse.jpg'),
(4, 2, 'Penguins.jpg'),
(5, 3, ''),
(6, 4, 'robert.png'),
(7, 5, ''),
(8, 6, ''),
(9, 7, ''),
(10, 8, ''),
(11, 9, ''),
(12, 10, ''),
(13, 11, ''),
(14, 12, 'fan1.png'),
(15, 13, ''),
(16, 14, ''),
(17, 15, ''),
(18, 16, ''),
(19, 17, 'about.jpg'),
(20, 18, ''),
(21, 19, 'newpwd.jpg'),
(22, 20, 'LeftNav.jpg'),
(23, 20, 'Login.jpg'),
(24, 20, 'Registration.jpg'),
(25, 20, 'Reset.jpg'),
(26, 21, ''),
(27, 22, ''),
(28, 23, ''),
(29, 24, ''),
(30, 25, ''),
(31, 26, 'images_(3).jpg'),
(32, 26, 'images_(4).jpg'),
(33, 27, 'download_(1).jpg'),
(34, 27, 'images_(3).jpg'),
(35, 28, ''),
(36, 29, '');

-- --------------------------------------------------------

--
-- Table structure for table `sr_contact_us`
--

CREATE TABLE IF NOT EXISTS `sr_contact_us` (
  `contact_id` int(11) NOT NULL AUTO_INCREMENT,
  `contact_type` int(11) NOT NULL COMMENT '1:General,2:Billing,3:bug,4:Feature',
  `contact_name` varchar(255) NOT NULL,
  `contact_email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `payment_type` varchar(50) NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `payment_date` date NOT NULL,
  `bug_type` varchar(50) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`contact_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `sr_contact_us`
--

INSERT INTO `sr_contact_us` (`contact_id`, `contact_type`, `contact_name`, `contact_email`, `message`, `payment_type`, `payment_method`, `payment_date`, `bug_type`, `created_on`) VALUES
(1, 1, '', '', '', '', '', '0000-00-00', '', '2015-08-12 18:17:39'),
(2, 1, 'Devendra', 'devendratiwari643@gmail.com', 'test', '', '', '0000-00-00', '', '2015-08-12 18:21:38'),
(3, 1, '', '', '', '', '', '0000-00-00', '', '2015-09-21 09:49:38'),
(4, 4, 'Devendra', 'devendratiwari643@gmail.com', 'test', '', '', '0000-00-00', '', '2015-09-21 11:49:55'),
(5, 1, '', '', '', '', '', '0000-00-00', '', '2015-09-21 16:33:20'),
(6, 1, 'Devendra', 'devendratiwari643@gmail.com', 'test mail', '', '', '0000-00-00', '', '2015-09-21 16:43:59'),
(7, 1, 'klk', 'lkmlk@aka.com', 'sdfkldadalskdaksklkda;skd;lasd;laks;dka;lsdk;askd;lakd;la;lkd;lakd;laskd;lakd;laskd;kd;laskda\r\naklsddaskldja\r\nalksdjjalksda\r\njajadljaljdlasjdlasjkskkkkkkkkkkkkkkkkkkkkkkkkkkaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiieeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeesssssssssssssss', '', '', '0000-00-00', '', '2016-04-16 14:55:00'),
(8, 1, 'oi', 'imran@startrishta.com', 'k', '', '', '0000-00-00', '', '2016-04-16 15:03:45'),
(9, 3, 'Imran Chaudry', 'iachaudry@gmail.com', 'jkljlk', '', '', '0000-00-00', '', '2016-04-16 15:20:25'),
(10, 4, 'Imran Chaudry', 'iachaudry@gmail.com', 'kmkl', '', '', '0000-00-00', '', '2016-04-16 15:20:46'),
(11, 1, 'gulshan Kumar', 'gulshancac@gmail.com', 'Please add as much detail as possible and we’ll get in touch as soon as we can.', '', '', '0000-00-00', '', '2016-05-20 13:07:05'),
(12, 1, 'Gulshan Kumar', 'gulshan.kumar@vibescom.in', 'Testing from Vibes Team', '', '', '0000-00-00', '', '2016-05-20 14:46:05'),
(13, 1, 'gulshan Kumar', 'gulshancac@gmail.com', 'dgdfgdfgdfgdffffffffgggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggghghgggggggggggggggggggggggggggggggggggggggggggggggggggdgdfgdfgdfgdffffffffgggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggghghgggggggggggggggggggggggggggggggggggggggggggggggggggdgdfgdfgdfgdffffffffgggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggghghgggggggggggggggggggggggggggggggggggggggggggggggggggdgdfgdfgdfgdffffffffgggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggghghgggggggggggggggggggggggggggggggggggggggggggggggggggdgdfgdfgdfgdffffffffgggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggghghgggggggggggggggggggggggggggggggggggggggggggggggggggdgdfgdfgdfgdffffffffgggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggghghgggggggggggggggggggggggggggggggggggggggggggggggggggdgdfgdfgdfgdffffffffgggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggghghgggggggggggggggggggggggggggggggggggggggggggggggggggdgdsds', '', '', '0000-00-00', '', '2016-05-20 16:14:29'),
(14, 1, 'Dharm', 'dharm.dev@vibescom.in', 'Testing By Vibescom', '', '', '0000-00-00', '', '2016-06-04 16:02:19'),
(15, 1, 'Dharm Dev', 'dharm.dev@vibescom.in', 'testing by Vibescom', '', '', '0000-00-00', '', '2016-06-04 16:15:57'),
(16, 1, 'Shilpi', 'shilpisingh064@gmail.com', 'hello', '', '', '0000-00-00', '', '2016-06-10 11:29:49'),
(17, 1, 'dharm dev', 'dharm.dev@vibescom.in', 'Testing by Vibescom', '', '', '0000-00-00', '', '2016-07-12 15:20:24'),
(18, 3, 'Dharm', 'dharm.dev@vibescom.in', 'Testing By Vibescom-Report a bug.', '', '', '0000-00-00', '', '2016-07-12 16:23:21'),
(19, 4, 'Dharm', 'dharm.dev@vibescom.in', 'testing by vibescom - suggest a feature', '', '', '0000-00-00', '', '2016-07-12 16:35:23'),
(20, 3, 'dharm dev', 'dharm.dev@vibescom.in', 'Testing By Vibescom', '', '', '0000-00-00', '', '2016-07-12 17:23:39'),
(21, 1, 'bfhfdghfdg', 'fghfghfhfdgh@fdgdf.iuj', 'ghdfhdfhgdfghdfhdfghdfghdf', '', '', '0000-00-00', '', '2016-08-08 16:24:12'),
(22, 1, 'kjn', 'sjdfszsdfssdfs@hf.om', 'sdfsd', '', '', '0000-00-00', '', '2016-08-17 20:34:08'),
(23, 1, 'dasdas', 'sdffs@g.com', 'asdasdasda', '', '', '0000-00-00', '', '2016-08-17 21:04:30'),
(24, 1, 'aasdasdas', 'asda@gmail.com', 'asda', '', '', '0000-00-00', '', '2016-08-17 21:08:29'),
(25, 1, 'fbdfg', 'bvnbvn@gmail.com', 'dggdgsdgd', '', '', '0000-00-00', '', '2016-09-30 17:44:50'),
(26, 1, 'shilpi', 'shilpi.singh@vibescom.in', 'sjhajfkbsd', '', '', '0000-00-00', '', '2016-10-06 13:50:55'),
(27, 1, 'Shilpi Singh', 'shilpisingh1990@gmail.comz', 'ajhsj', '', '', '0000-00-00', '', '2016-10-06 13:51:38'),
(28, 4, 'Chandrika', 'chandrika.aggarwal@vibescom.in', 'Testing mail from vibes', '', '', '0000-00-00', '', '2016-10-13 11:27:03'),
(29, 1, 'Chandrika', 'chandrika.aggarwal@vibescom.in', 'General questions test mail ...', '', '', '0000-00-00', '', '2016-10-13 11:45:16');

-- --------------------------------------------------------

--
-- Table structure for table `sr_countries`
--

CREATE TABLE IF NOT EXISTS `sr_countries` (
  `country_id` int(11) NOT NULL AUTO_INCREMENT,
  `country_name` varchar(100) NOT NULL,
  `alpha_2` varchar(2) NOT NULL DEFAULT '',
  `alpha_3` varchar(3) NOT NULL DEFAULT '',
  `country_code` varchar(10) NOT NULL,
  PRIMARY KEY (`country_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=250 ;

--
-- Dumping data for table `sr_countries`
--

INSERT INTO `sr_countries` (`country_id`, `country_name`, `alpha_2`, `alpha_3`, `country_code`) VALUES
(1, 'Afghanistan', 'af', 'afg', '93'),
(2, 'Aland Islands', 'ax', 'ala', '358'),
(3, 'Albania', 'al', 'alb', '355'),
(4, 'Algeria', 'dz', 'dza', '213'),
(5, 'American Samoa', 'as', 'asm', '1684'),
(6, 'Andorra', 'ad', 'and', '376'),
(7, 'Angola', 'ao', 'ago', '244'),
(8, 'Anguilla', 'ai', 'aia', '1264'),
(9, 'Antarctica', 'aq', '', '672'),
(10, 'Antigua and Barbuda', 'ag', 'atg', '1268'),
(11, 'Argentina', 'ar', 'arg', '54'),
(12, 'Armenia', 'am', 'arm', '374'),
(13, 'Aruba', 'aw', 'abw', '297'),
(14, 'Australia', 'au', 'aus', '61'),
(15, 'Austria', 'at', 'aut', '43'),
(16, 'Azerbaijan', 'az', 'aze', '994'),
(17, 'Bahamas', 'bs', 'bhs', '1242'),
(18, 'Bahrain', 'bh', 'bhr', '973'),
(19, 'Bangladesh', 'bd', 'bgd', '880'),
(20, 'Barbados', 'bb', 'brb', '1246'),
(21, 'Belarus', 'by', 'blr', '375'),
(22, 'Belgium', 'be', 'bel', '32'),
(23, 'Belize', 'bz', 'blz', '501'),
(24, 'Benin', 'bj', 'ben', '229'),
(25, 'Bermuda', 'bm', 'bmu', '1441'),
(26, 'Bhutan', 'bt', 'btn', '975'),
(27, 'Bolivia, Plurinational State of', 'bo', 'bol', '591'),
(28, 'Bonaire, Sint Eustatius and Saba', 'bq', 'bes', '599'),
(29, 'Bosnia and Herzegovina', 'ba', 'bih', '387'),
(30, 'Botswana', 'bw', 'bwa', '267'),
(31, 'Bouvet Island', 'bv', '', ''),
(32, 'Brazil', 'br', 'bra', '55'),
(33, 'British Indian Ocean Territory', 'io', '', '246'),
(34, 'Brunei Darussalam', 'bn', 'brn', '673'),
(35, 'Bulgaria', 'bg', 'bgr', '359'),
(36, 'Burkina Faso', 'bf', 'bfa', '226'),
(37, 'Burundi', 'bi', 'bdi', '257'),
(38, 'Cambodia', 'kh', 'khm', '855'),
(39, 'Cameroon', 'cm', 'cmr', '237'),
(40, 'Canada', 'ca', 'can', '1'),
(41, 'Cape Verde', 'cv', 'cpv', '238'),
(42, 'Cayman Islands', 'ky', 'cym', '1345'),
(43, 'Central African Republic', 'cf', 'caf', '236'),
(44, 'Chad', 'td', 'tcd', '235'),
(45, 'Chile', 'cl', 'chl', '56'),
(46, 'China', 'cn', 'chn', '86'),
(47, 'Christmas Island', 'cx', '', '61'),
(48, 'Cocos (Keeling) Islands', 'cc', '', '61'),
(49, 'Colombia', 'co', 'col', '57'),
(50, 'Comoros', 'km', 'com', '269'),
(51, 'Congo', 'cg', 'cog', '242'),
(52, 'Congo, The Democratic Republic of the', 'cd', 'cod', '243'),
(53, 'Cook Islands', 'ck', 'cok', '682'),
(54, 'Costa Rica', 'cr', 'cri', '506'),
(55, 'Cote d''Ivoire', 'ci', 'civ', '225'),
(56, 'Croatia', 'hr', 'hrv', '385'),
(57, 'Cuba', 'cu', 'cub', '53'),
(58, 'Curacao', 'cw', 'cuw', '599'),
(59, 'Cyprus', 'cy', 'cyp', '357'),
(60, 'Czech Republic', 'cz', 'cze', '420'),
(61, 'Denmark', 'dk', 'dnk', '45'),
(62, 'Djibouti', 'dj', 'dji', '253'),
(63, 'Dominica', 'dm', 'dma', '1767'),
(64, 'Dominican Republic', 'do', 'dom', '1809'),
(65, 'Ecuador', 'ec', 'ecu', '593'),
(66, 'Egypt', 'eg', 'egy', '20'),
(67, 'El Salvador', 'sv', 'slv', '503'),
(68, 'Equatorial Guinea', 'gq', 'gnq', '240'),
(69, 'Eritrea', 'er', 'eri', '291'),
(70, 'Estonia', 'ee', 'est', '372'),
(71, 'Ethiopia', 'et', 'eth', '251'),
(72, 'Falkland Islands (Malvinas)', 'fk', 'flk', '500'),
(73, 'Faroe Islands', 'fo', 'fro', '298'),
(74, 'Fiji', 'fj', 'fji', '679'),
(75, 'Finland', 'fi', 'fin', '358'),
(76, 'France', 'fr', 'fra', '33'),
(77, 'French Guiana', 'gf', 'guf', '594'),
(78, 'French Polynesia', 'pf', 'pyf', '689'),
(79, 'French Southern Territories', 'tf', '', ''),
(80, 'Gabon', 'ga', 'gab', '241'),
(81, 'Gambia', 'gm', 'gmb', '220'),
(82, 'Georgia', 'ge', 'geo', '995'),
(83, 'Germany', 'de', 'deu', '49'),
(84, 'Ghana', 'gh', 'gha', '233'),
(85, 'Gibraltar', 'gi', 'gib', '350'),
(86, 'Greece', 'gr', 'grc', '30'),
(87, 'Greenland', 'gl', 'grl', '299'),
(88, 'Grenada', 'gd', 'grd', '1473'),
(89, 'Guadeloupe', 'gp', 'glp', '590'),
(90, 'Guam', 'gu', 'gum', '1671'),
(91, 'Guatemala', 'gt', 'gtm', '502'),
(92, 'Guernsey', 'gg', 'ggy', '44'),
(93, 'Guinea', 'gn', 'gin', '224'),
(94, 'Guinea-Bissau', 'gw', 'gnb', '245'),
(95, 'Guyana', 'gy', 'guy', '592'),
(96, 'Haiti', 'ht', 'hti', '509'),
(97, 'Heard Island and McDonald Islands', 'hm', '', ''),
(98, 'Holy See (Vatican City State)', 'va', 'vat', '39'),
(99, 'Honduras', 'hn', 'hnd', '504'),
(100, 'Hong Kong', 'hk', 'hkg', '852'),
(101, 'Hungary', 'hu', 'hun', '36'),
(102, 'Iceland', 'is', 'isl', '354'),
(103, 'India', 'in', 'ind', '91'),
(104, 'Indonesia', 'id', 'idn', '62'),
(105, 'Iran, Islamic Republic of', 'ir', 'irn', '98'),
(106, 'Iraq', 'iq', 'irq', '964'),
(107, 'Ireland', 'ie', 'irl', '353'),
(108, 'Isle of Man', 'im', 'imn', '44'),
(109, 'Israel', 'il', 'isr', '972'),
(110, 'Italy', 'it', 'ita', '39'),
(111, 'Jamaica', 'jm', 'jam', '1876'),
(112, 'Japan', 'jp', 'jpn', '81'),
(113, 'Jersey', 'je', 'jey', '44'),
(114, 'Jordan', 'jo', 'jor', '962'),
(115, 'Kazakhstan', 'kz', 'kaz', '7'),
(116, 'Kenya', 'ke', 'ken', '254'),
(117, 'Kiribati', 'ki', 'kir', '686'),
(118, 'Korea, Democratic People''s Republic of', 'kp', 'prk', '850'),
(119, 'Korea, Republic of', 'kr', 'kor', '82'),
(120, 'Kuwait', 'kw', 'kwt', '965'),
(121, 'Kyrgyzstan', 'kg', 'kgz', '996'),
(122, 'Lao People''s Democratic Republic', 'la', 'lao', '856'),
(123, 'Latvia', 'lv', 'lva', '371'),
(124, 'Lebanon', 'lb', 'lbn', '961'),
(125, 'Lesotho', 'ls', 'lso', '266'),
(126, 'Liberia', 'lr', 'lbr', '231'),
(127, 'Libyan Arab Jamahiriya', 'ly', 'lby', '218'),
(128, 'Liechtenstein', 'li', 'lie', '423'),
(129, 'Lithuania', 'lt', 'ltu', '370'),
(130, 'Luxembourg', 'lu', 'lux', '352'),
(131, 'Macao', 'mo', 'mac', '853'),
(132, 'Macedonia, The former Yugoslav Republic of', 'mk', 'mkd', '389'),
(133, 'Madagascar', 'mg', 'mdg', '261'),
(134, 'Malawi', 'mw', 'mwi', '265'),
(135, 'Malaysia', 'my', 'mys', '60'),
(136, 'Maldives', 'mv', 'mdv', '960'),
(137, 'Mali', 'ml', 'mli', '223'),
(138, 'Malta', 'mt', 'mlt', '356'),
(139, 'Marshall Islands', 'mh', 'mhl', '692'),
(140, 'Martinique', 'mq', 'mtq', '596'),
(141, 'Mauritania', 'mr', 'mrt', '222'),
(142, 'Mauritius', 'mu', 'mus', '230'),
(143, 'Mayotte', 'yt', 'myt', '262'),
(144, 'Mexico', 'mx', 'mex', '52'),
(145, 'Micronesia, Federated States of', 'fm', 'fsm', '691'),
(146, 'Moldova, Republic of', 'md', 'mda', '373'),
(147, 'Monaco', 'mc', 'mco', '377'),
(148, 'Mongolia', 'mn', 'mng', '976'),
(149, 'Montenegro', 'me', 'mne', '382'),
(150, 'Montserrat', 'ms', 'msr', '1664'),
(151, 'Morocco', 'ma', 'mar', '212'),
(152, 'Mozambique', 'mz', 'moz', '258'),
(153, 'Myanmar', 'mm', 'mmr', '95'),
(154, 'Namibia', 'na', 'nam', '264'),
(155, 'Nauru', 'nr', 'nru', '674'),
(156, 'Nepal', 'np', 'npl', '977'),
(157, 'Netherlands', 'nl', 'nld', '31'),
(158, 'New Caledonia', 'nc', 'ncl', '687'),
(159, 'New Zealand', 'nz', 'nzl', '64'),
(160, 'Nicaragua', 'ni', 'nic', '505'),
(161, 'Niger', 'ne', 'ner', '227'),
(162, 'Nigeria', 'ng', 'nga', '234'),
(163, 'Niue', 'nu', 'niu', '683'),
(164, 'Norfolk Island', 'nf', 'nfk', '672'),
(165, 'Northern Mariana Islands', 'mp', 'mnp', '1670'),
(166, 'Norway', 'no', 'nor', '47'),
(167, 'Oman', 'om', 'omn', '968'),
(168, 'Pakistan', 'pk', 'pak', '92'),
(169, 'Palau', 'pw', 'plw', '680'),
(170, 'Palestinian Territory, Occupied', 'ps', 'pse', '970'),
(171, 'Panama', 'pa', 'pan', '507'),
(172, 'Papua New Guinea', 'pg', 'png', '675'),
(173, 'Paraguay', 'py', 'pry', '595'),
(174, 'Peru', 'pe', 'per', '51'),
(175, 'Philippines', 'ph', 'phl', '63'),
(176, 'Pitcairn', 'pn', 'pcn', '870'),
(177, 'Poland', 'pl', 'pol', '48'),
(178, 'Portugal', 'pt', 'prt', '351'),
(179, 'Puerto Rico', 'pr', 'pri', '1'),
(180, 'Qatar', 'qa', 'qat', '974'),
(181, 'Reunion', 're', 'reu', '262'),
(182, 'Romania', 'ro', 'rou', '40'),
(183, 'Russian Federation', 'ru', 'rus', '7'),
(184, 'Rwanda', 'rw', 'rwa', '250'),
(185, 'Saint Barthelemy', 'bl', 'blm', '590'),
(186, 'Saint Helena, Ascension and Tristan Da Cunha', 'sh', 'shn', '290'),
(187, 'Saint Kitts and Nevis', 'kn', 'kna', '1869'),
(188, 'Saint Lucia', 'lc', 'lca', '1758'),
(189, 'Saint Martin (French Part)', 'mf', 'maf', '1599'),
(190, 'Saint Pierre and Miquelon', 'pm', 'spm', '508'),
(191, 'Saint Vincent and The Grenadines', 'vc', 'vct', '1784'),
(192, 'Samoa', 'ws', 'wsm', '685'),
(193, 'San Marino', 'sm', 'smr', '378'),
(194, 'Sao Tome and Principe', 'st', 'stp', '239'),
(195, 'Saudi Arabia', 'sa', 'sau', '966'),
(196, 'Senegal', 'sn', 'sen', '221'),
(197, 'Serbia', 'rs', 'srb', '381'),
(198, 'Seychelles', 'sc', 'syc', '248'),
(199, 'Sierra Leone', 'sl', 'sle', '232'),
(200, 'Singapore', 'sg', 'sgp', '65'),
(201, 'Sint Maarten (Dutch Part)', 'sx', 'sxm', '1599'),
(202, 'Slovakia', 'sk', 'svk', '421'),
(203, 'Slovenia', 'si', 'svn', '386'),
(204, 'Solomon Islands', 'sb', 'slb', '677'),
(205, 'Somalia', 'so', 'som', '252'),
(206, 'South Africa', 'za', 'zaf', '27'),
(207, 'South Georgia and The South Sandwich Islands', 'gs', '', ''),
(208, 'South Sudan', 'ss', 'ssd', '211'),
(209, 'Spain', 'es', 'esp', '34'),
(210, 'Sri Lanka', 'lk', 'lka', '94'),
(211, 'Sudan', 'sd', 'sdn', '249'),
(212, 'Suriname', 'sr', 'sur', '597'),
(213, 'Svalbard and Jan Mayen', 'sj', 'sjm', '47'),
(214, 'Swaziland', 'sz', 'swz', '268'),
(215, 'Sweden', 'se', 'swe', '46'),
(216, 'Switzerland', 'ch', 'che', '41'),
(217, 'Syrian Arab Republic', 'sy', 'syr', '963'),
(218, 'Taiwan, Province of China', 'tw', '', '886'),
(219, 'Tajikistan', 'tj', 'tjk', '992'),
(220, 'Tanzania, United Republic of', 'tz', 'tza', '255'),
(221, 'Thailand', 'th', 'tha', '66'),
(222, 'Timor-Leste', 'tl', 'tls', '670'),
(223, 'Togo', 'tg', 'tgo', '228'),
(224, 'Tokelau', 'tk', 'tkl', '690'),
(225, 'Tonga', 'to', 'ton', '676'),
(226, 'Trinidad and Tobago', 'tt', 'tto', '1868'),
(227, 'Tunisia', 'tn', 'tun', '216'),
(228, 'Turkey', 'tr', 'tur', '90'),
(229, 'Turkmenistan', 'tm', 'tkm', '993'),
(230, 'Turks and Caicos Islands', 'tc', 'tca', '1649'),
(231, 'Tuvalu', 'tv', 'tuv', '688'),
(232, 'Uganda', 'ug', 'uga', '256'),
(233, 'Ukraine', 'ua', 'ukr', '380'),
(234, 'United Arab Emirates', 'ae', 'are', '971'),
(235, 'United Kingdom', 'gb', 'gbr', '44'),
(236, 'United States', 'us', 'usa', '1'),
(237, 'United States Minor Outlying Islands', 'um', '', ''),
(238, 'Uruguay', 'uy', 'ury', '598'),
(239, 'Uzbekistan', 'uz', 'uzb', '998'),
(240, 'Vanuatu', 'vu', 'vut', '678'),
(241, 'Venezuela, Bolivarian Republic of', 've', 'ven', '58'),
(242, 'Viet Nam', 'vn', 'vnm', '84'),
(243, 'Virgin Islands, British', 'vg', 'vgb', '1284'),
(244, 'Virgin Islands, U.S.', 'vi', 'vir', '1340'),
(245, 'Wallis and Futuna', 'wf', 'wlf', '681'),
(246, 'Western Sahara', 'eh', 'esh', '212'),
(247, 'Yemen', 'ye', 'yem', '967'),
(248, 'Zambia', 'zm', 'zmb', '260'),
(249, 'Zimbabwe', 'zw', 'zwe', '263');

-- --------------------------------------------------------

--
-- Table structure for table `sr_credits`
--

CREATE TABLE IF NOT EXISTS `sr_credits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `credit` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1' COMMENT '0:inactive,1:active',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `sr_credits`
--

INSERT INTO `sr_credits` (`id`, `credit`, `status`) VALUES
(1, 100, 1),
(2, 550, 1),
(3, 1250, 1),
(4, 2750, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sr_credit_fee`
--

CREATE TABLE IF NOT EXISTS `sr_credit_fee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `price` varchar(100) NOT NULL,
  `currency` int(11) NOT NULL,
  `credit` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1' COMMENT '0:inactive,1:active',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `sr_credit_fee`
--

INSERT INTO `sr_credit_fee` (`id`, `price`, `currency`, `credit`, `status`) VALUES
(1, '1.50', 1, 1, 1),
(2, '7.49', 1, 2, 1),
(3, '14.99', 1, 3, 1),
(4, '29.99', 1, 4, 1),
(5, '1.99', 2, 1, 1),
(6, '9.99', 2, 2, 1),
(7, '19.99', 2, 3, 1),
(8, '39.99', 2, 4, 1),
(9, '2.50', 3, 1, 1),
(10, '12.49', 3, 2, 1),
(11, '24.99', 3, 3, 1),
(12, '49.99', 3, 4, 1),
(13, '199', 4, 1, 1),
(14, '749', 4, 2, 1),
(15, '1499', 4, 3, 1),
(16, '2999', 4, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sr_currency`
--

CREATE TABLE IF NOT EXISTS `sr_currency` (
  `currency_id` int(11) NOT NULL AUTO_INCREMENT,
  `currency_name` varchar(20) NOT NULL,
  `currency` varchar(10) NOT NULL,
  `icon` varchar(10) NOT NULL,
  `status` int(1) NOT NULL COMMENT '1:active,0:inactive',
  PRIMARY KEY (`currency_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `sr_currency`
--

INSERT INTO `sr_currency` (`currency_id`, `currency_name`, `currency`, `icon`, `status`) VALUES
(1, 'GB Pound', 'GBP', '&#163;', 1),
(2, 'Euro', 'EUR', '&#8364;', 1),
(3, 'US Dollars', 'USD', '&#36;', 1),
(4, 'Indian Rupee', 'INR', '&#x20a8;', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sr_customize_profile`
--

CREATE TABLE IF NOT EXISTS `sr_customize_profile` (
  `theme_id` int(11) NOT NULL AUTO_INCREMENT,
  `theme_name` varchar(100) NOT NULL,
  `theme_small_image` varchar(100) NOT NULL,
  `theme_large_image` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`theme_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `sr_customize_profile`
--

INSERT INTO `sr_customize_profile` (`theme_id`, `theme_name`, `theme_small_image`, `theme_large_image`, `status`) VALUES
(1, 'pattern1', 'p1-small.png', 'p1-large.png', 1),
(2, 'pattern2', 'p2-small.png', 'p2-large.png', 1),
(3, 'pattern3', 'p3-small.png', 'p3-large.png', 1),
(4, 'pattern4', 'p4-small.png', 'p4-large.png', 1),
(5, 'pattern5', 'p5-small.png', 'p5-large.png', 1),
(6, 'pattern6', 'p6-small.png', 'p6-large.png', 1),
(7, 'pattern7', 'p7-small.png', 'p7-large.png', 1),
(8, 'pattern8', 'p8-small.png', 'p8-large.png', 1),
(9, 'pattern9', 'p9-small.png', 'p9-large.png', 1),
(10, 'pattern10', 'p10-small.png', 'p10-large.png', 1),
(11, 'pattern11', 'p11-small.png', 'p11-large.png', 1),
(12, 'pattern12', 'p12-small.png', 'p12-large.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sr_delete_profile`
--

CREATE TABLE IF NOT EXISTS `sr_delete_profile` (
  `delete_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `reason` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `deleted_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_by` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`delete_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `sr_delete_profile`
--

INSERT INTO `sr_delete_profile` (`delete_id`, `user_id`, `reason`, `description`, `deleted_on`, `deleted_by`, `status`) VALUES
(1, 70, 'I\\''m in a relationship', 'I get knocked down but i get up again, ain\\''t anybody that can keep me down...', '2016-08-17 16:16:31', 70, 1),
(2, 70, 'I don\\''t want to pay for Startrishta', '', '2016-08-17 17:57:50', 70, 1),
(3, 99, 'I don\\''t want to pay for Startrishta', '', '2016-08-17 20:25:43', 99, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sr_education`
--

CREATE TABLE IF NOT EXISTS `sr_education` (
  `education_id` int(11) NOT NULL AUTO_INCREMENT,
  `education` varchar(20) NOT NULL,
  `status` int(11) NOT NULL COMMENT '1:active,0:inactive',
  PRIMARY KEY (`education_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `sr_education`
--

INSERT INTO `sr_education` (`education_id`, `education`, `status`) VALUES
(1, 'High School', 1),
(2, 'Diploma', 1),
(3, 'Degree', 1),
(4, 'Masters', 1),
(5, 'PHD', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sr_email_notification`
--

CREATE TABLE IF NOT EXISTS `sr_email_notification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `message_comment` tinyint(4) NOT NULL DEFAULT '0' COMMENT '1:on,0:off',
  `profile_visitor` tinyint(4) NOT NULL DEFAULT '0' COMMENT '1:on,0:off',
  `like_you` tinyint(4) NOT NULL DEFAULT '0' COMMENT '1:on,0:off',
  `new_match` tinyint(4) NOT NULL DEFAULT '0' COMMENT '1:on,0:off',
  `startrishta_new` tinyint(4) NOT NULL DEFAULT '0' COMMENT '1:on,0:off',
  `alert` tinyint(4) NOT NULL DEFAULT '0' COMMENT '1:on,0:off',
  `gift` tinyint(4) NOT NULL DEFAULT '0' COMMENT '1:on,0:off',
  `favorite_you` tinyint(4) NOT NULL DEFAULT '0' COMMENT '1:on,0:off',
  `photo_rating` tinyint(4) NOT NULL DEFAULT '0' COMMENT '1:on,0:off',
  `created_on` date NOT NULL,
  `updated_on` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `sr_email_notification`
--

INSERT INTO `sr_email_notification` (`id`, `user_id`, `message_comment`, `profile_visitor`, `like_you`, `new_match`, `startrishta_new`, `alert`, `gift`, `favorite_you`, `photo_rating`, `created_on`, `updated_on`) VALUES
(1, 94, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2016-08-19', '2016-08-19'),
(2, 103, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2016-10-01', '2016-10-01'),
(4, 50, 0, 1, 1, 1, 1, 1, 1, 1, 1, '2016-10-12', '2016-10-12');

-- --------------------------------------------------------

--
-- Table structure for table `sr_eye_color`
--

CREATE TABLE IF NOT EXISTS `sr_eye_color` (
  `eye_color_id` int(11) NOT NULL AUTO_INCREMENT,
  `eye_color` varchar(20) NOT NULL,
  `status` int(11) NOT NULL COMMENT '1:active,0:inactive',
  PRIMARY KEY (`eye_color_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `sr_eye_color`
--

INSERT INTO `sr_eye_color` (`eye_color_id`, `eye_color`, `status`) VALUES
(1, 'Brown', 1),
(2, 'Black', 1),
(3, 'Blue', 1),
(4, 'Gray', 1),
(5, 'Green', 1),
(6, 'Hazel', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sr_fame_reel`
--

CREATE TABLE IF NOT EXISTS `sr_fame_reel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1' COMMENT '1:active,0:inactive',
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `sr_fame_reel`
--

INSERT INTO `sr_fame_reel` (`id`, `user_id`, `status`, `created_on`, `updated_on`) VALUES
(1, 20, 1, '2015-12-30 16:00:00', '2015-12-30 16:00:00'),
(2, 1, 1, '2015-12-30 16:01:17', '2015-12-30 16:01:17'),
(3, 38, 1, '2015-12-30 16:02:04', '2015-12-30 16:02:04'),
(4, 4, 1, '2015-12-30 16:03:01', '2015-12-30 16:03:01'),
(5, 27, 1, '2015-12-30 16:04:42', '2015-12-30 16:04:47'),
(6, 6, 1, '2015-12-30 16:05:58', '2015-12-30 16:06:01'),
(7, 36, 1, '2015-12-30 16:11:45', '2015-12-30 16:11:48'),
(8, 37, 1, '2015-12-30 16:11:38', '2015-12-30 16:11:42'),
(9, 38, 1, '2015-12-30 16:11:45', '2015-12-30 16:11:48'),
(10, 40, 1, '2015-12-30 16:11:38', '2015-12-30 16:11:42');

-- --------------------------------------------------------

--
-- Table structure for table `sr_faq`
--

CREATE TABLE IF NOT EXISTS `sr_faq` (
  `faq_id` int(11) NOT NULL AUTO_INCREMENT,
  `faq_type_id` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` int(11) NOT NULL,
  PRIMARY KEY (`faq_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=49 ;

--
-- Dumping data for table `sr_faq`
--

INSERT INTO `sr_faq` (`faq_id`, `faq_type_id`, `question`, `answer`, `status`, `created_on`, `created_by`, `updated_on`, `updated_by`) VALUES
(1, 1, 'What is Startrishta?', 'Startrisha.com is an amazing website where you can meet new people. We represent a natural evolution of all those ‘other’ traditional matrimony sites you have been using until now (you know which ones!).Startrishta.com makes it easy for you to get together and meet new people, whether for friendship, dating or marriage — thousands of people are already meeting up face to face. Go-on, start your rishta today!', 1, '2016-07-27 23:48:58', 1, '2016-07-27 23:48:58', 1),
(2, 1, 'How do I join?', 'Navigate to our homepage and in the ‘Start Here’ box, enter your details and click ‘Let the Fun Begin’. Alternatively, you can sign up using your Facebook details by clicking on the appropriate icon in the sign-up box.', 1, '2016-07-27 23:48:58', 1, '2016-07-27 23:48:58', 1),
(3, 1, 'What is the minimum age I can join?', 'All users must be at least eighteen (18) years of age before they can join. Please don’t misrepresent your age, it’s really lame and not worth it.', 1, '2016-07-27 23:48:58', 1, '2016-07-27 23:48:58', 1),
(4, 1, 'Do I need to pay to join?', 'No, it’s totally free to join! You do of course have the option to purchase credits or a monthly subscription to take advantage all the great features Startrishta.com has to offer. Trust us – it’s worth it!', 1, '2016-07-27 23:48:58', 1, '2016-07-27 23:48:58', 1),
(5, 1, 'Are there rules to follow?', 'We encourage all our users to have fun and stay safe at all times. In the interest of keeping Startrishta an awesome and safe community for all users, we have would like to remind all users to keep in mind our Community Guidelines.', 1, '2016-07-27 23:48:58', 1, '2016-07-27 23:48:58', 1),
(6, 2, 'How do I access my Profile?', 'You can access your profile by logging into to Startrishta.com from the homepage, which will take you to your profile by default. You can also easily navigate back to your profile from anywhere the site by clicking on the profile icon at the top of the page.', 1, '2016-07-27 23:48:58', 1, '2016-07-27 23:48:58', 1),
(7, 2, 'How do I customise my Profile?', 'You can customise your profile background in the Settings tab. This can be found by clicking on your mini profile picture at the top right of your screen. Click Account Setting, then Customise Profile tab. You can update your interests; change your mood, location and your personal info in no time at all.', 1, '2016-07-27 23:48:58', 1, '2016-07-27 23:48:58', 1),
(8, 2, 'How I can I edit my Profile?', 'You can edit your profile by clicking on the edit links next to the text fields on your profile.', 1, '2016-07-27 23:48:58', 1, '2016-07-27 23:48:58', 1),
(9, 2, 'How can I restrict my Profile', 'You can restrict your profile to other users by going to your Account Settings, and clicking on the Restrict Profile tab', 1, '2016-07-27 23:48:58', 1, '2016-07-27 23:48:58', 1),
(10, 2, 'How can I boost my profile popularity?', 'The quickest way to boost your popularity is to promote your profile, and having your picture appear more often in searches', 1, '2016-07-27 23:48:58', 1, '2016-07-27 23:48:58', 1),
(11, 2, 'How do I change my email on Startrishta?', 'Go to Account Settings and click on Change Password/Email tab.', 1, '2016-07-27 23:48:58', 1, '2016-07-27 23:48:58', 1),
(12, 2, 'How can I get ‘Verified Status’?', 'Add a mobile number or link your Startrishta account with Facebook account in the side Verification box on your profile page. Becoming verified helps prove you are real, and more people will probably want to talk to you then! Don’t have enough details to get verified? Send us a message on our Contact Page and we will look into the matter for you.', 1, '2016-07-27 23:48:58', 1, '2016-07-27 23:48:58', 1),
(13, 2, 'What is stealth mode?', 'Stealth mode allows you to view other people’s profiles discreetly. It can be switched on in your Account Settings tab. Please note, this is a premium pay monthly feature.', 1, '2016-07-27 23:48:58', 1, '2016-07-27 23:48:58', 1),
(14, 2, 'How do I report abuse?', 'You can quickly report abuse by clicking on the Report Abuse button that you will when browsing other peoples pictures or in the My Messages app. This will take you\r\nto a form you can fill out; we will review your complaint and will aim to respond to you within 24 hours.', 1, '2016-07-27 23:48:58', 1, '2016-07-27 23:48:58', 1),
(15, 3, 'How do I add/delete photos or videos on my profile?', 'On your profile page, click on manage albums to take add or delete individual photos or videos.', 1, '2016-07-27 23:48:58', 1, '2016-07-27 23:48:58', 1),
(16, 3, 'How can I create an ‘Album’', 'On your profile page, click on manage albums to create a new album. Albums are a great way of categorising your photos or videos.', 1, '2016-07-27 23:48:58', 1, '2016-07-27 23:48:58', 1),
(17, 3, 'Can I restrict access to my Albums?', 'Your albums are visible to all users by default; if you want to restrict an album you can create a ‘private album’ under manage albums on your profile page.', 1, '2016-07-27 23:48:58', 1, '2016-07-27 23:48:58', 1),
(18, 3, 'Are there any limits to how many photos or videos I can add?', 'Yes. 500 photos per album and 5 videos.', 1, '2016-07-27 23:48:58', 1, '2016-07-27 23:48:58', 1),
(19, 3, 'What are the size guidelines for uploading photos or videos?', 'Here are the guidelines: JPG, PNG, AVI and MPEG files only. The file size limit is 12MB for individual photos, and their dimension must be at least 300 x 300 pixels.Videos must be less than 100MB in size and between 10 seconds and 30 minutes in length. Users are restricted to YouTube links as Videos on their profile. Each user has a combined 8 GB limit for posting photos and videos.', 1, '2016-07-27 23:48:58', 1, '2016-07-27 23:48:58', 1),
(20, 3, 'What sort of photos or videos (‘Content’) am I not allowed to upload or post?', 'When you are using Startrishta you may not post or send any Content which:\r\ni. contains expletives or language which could be deemed offensive or is likely to harass, upset, embarrass, alarm or annoy any other person;\r\nii. is obscene, pornographic or otherwise may offend human dignity;\r\niii. is abusive, insulting or threatening, or which promotes or encourages racism, sexism, hatred or bigotry;\r\niv. encourages any illegal activity including, without limitation, terrorism, inciting racial hatred or the submission of which in itself constitutes committing a criminal offence;\r\nv. is defamatory;\r\nvi. relates to commercial activities (including, without limitation, sales,\r\ncompetitions and advertising, links to other websites or premium line telephone numbers);\r\nvii. involves the transmission of “junk” mail or “spam”;\r\nviii. contains any spy ware, adware, viruses, corrupt files, worm programmes or other malicious code designed to interrupt, damage or limit the functionality of or disrupt any software, hardware, telecommunications, networks, servers or other equipment, Trojan horse or any other material designed to damage, interfere with, wrongly intercept or expropriate any data or personal information whether from Startrisha.com or otherwise; or itself, or the posting of which, infringes any third party’s rights (including, without limitation, intellectual property rights and privacy rights).\r\nPlease use your common sense when picking the Content that you choose to post on or send via Startrishta.com because you are solely responsible for,\r\nand bear all liability in relation to, such Content.', 1, '2016-07-27 23:48:58', 1, '2016-07-27 23:48:58', 1),
(21, 3, 'How do I rate photos?', 'You can visit the ‘Rate Photos’ page which you can access via the your own photo ratings page on the left hand side bar.', 1, '2016-07-27 23:48:58', 1, '2016-07-27 23:48:58', 1),
(22, 3, 'How do I comment on photos?', 'Fill out the text box below the photo or album.', 1, '2016-07-27 23:48:58', 1, '2016-07-27 23:48:58', 1),
(23, 3, 'Can I delete comments on my photos or albums?', 'Yes of course you can. Hover over the comment and an ‘x’ will appear in the corner of the box, click it and the comment is deleted.', 1, '2016-07-27 23:48:58', 1, '2016-07-27 23:48:58', 1),
(24, 4, 'What is Kismat Connection?', 'Kismat Connection is fun game where you can choose new people to chat to or meet in a randomised way who all have something in common with you. Many people have met their future love on this page! Give it a try and see if you do too!', 1, '2016-07-27 23:48:58', 1, '2016-07-27 23:48:58', 1),
(25, 4, 'What does Kismat mean?', 'Kismat is a Hindi word meaning ‘fate’ or ‘destiny’.', 1, '2016-07-27 23:48:58', 1, '2016-07-27 23:48:58', 1),
(26, 4, 'How can I find out who wants to meet me?', 'On your profile page there is a list of notifications on your right hand side which lists the people who want to meet you.', 1, '2016-07-27 23:48:58', 1, '2016-07-27 23:48:58', 1),
(27, 4, 'How can I appear more often in Kismet Connection?', 'You can purchase credits to have your profile picture appear more often in Kismet Connection to give you a better chance of being found by someone playing the game. Please go to our Credits Page to find out more.', 1, '2016-07-27 23:48:58', 1, '2016-07-27 23:48:58', 1),
(28, 5, 'How do I search for new people?', 'You can search for new people by clicking the search icon at the top of your screen. This will open up the search page.', 1, '2016-07-27 23:48:58', 1, '2016-07-27 23:48:58', 1),
(29, 5, 'What is the difference between basic search and advanced search?', 'Basic search has three criteria: Sex, Age and Location. Advanced search allows you 13 more criteria to narrow your search –remember though, if you become too picky no one ends up picking you either ;)', 1, '2016-07-27 23:48:58', 1, '2016-07-27 23:48:58', 1),
(30, 6, 'What is the difference between credits and monthly membership?', 'Credits allow you to boost your profile popularity whenever you want, and whatever your membership status. Monthly membership allows you unlock awesome new features on the website allowing you to do things such as chat first with popular members, view advanced search results, get your messages read first and be stealthy like a ninja! For more details, and costs head over to our Credits page.', 1, '2016-07-27 23:48:58', 1, '2016-07-27 23:48:58', 1),
(31, 6, 'What are payment settings?', 'The payment settings tab is found in Account Settings. It lets you control your auto-renewal settings for your credits or VIP Membership.', 1, '2016-07-27 23:48:58', 1, '2016-07-27 23:48:58', 1),
(32, 6, 'How does Auto-renewal for monthly membership work?', 'We automatically renew your membership 5 working days before it expires for the same period you originally subscribed for.', 1, '2016-07-27 23:48:58', 1, '2016-07-27 23:48:58', 1),
(33, 6, 'What payments methods do you use?', 'Currently we only use Paypal. We are looking to implements more payment options soon.', 1, '2016-07-27 23:48:58', 1, '2016-07-27 23:48:58', 1),
(34, 6, 'Who do I contact if I get a billing error?', 'Please go to our Contact Us page and leave a comment. Our team will aim to get back to you with 24 hours.', 1, '2016-07-27 23:48:58', 1, '2016-07-27 23:48:58', 1),
(35, 7, 'What is the difference between credits and monthly membership?', 'Credits allow you to boost your profile popularity whenever you want, and whatever your membership status. Monthly membership allows you unlock awesome new features on the website allowing you to do things such as chat first with popular members, view advanced search results, get your messages read first and be stealthy like a ninja! For more details, and costs head over to our Credits page.', 1, '2016-07-27 23:48:58', 1, '2016-07-27 23:48:58', 1),
(36, 7, 'Do my credits last indefinitely if not used?', 'No. We reserve the right to expire any unused credits 6 months after purchase. If you delete your account or if your account is terminated by us due to breach of our Terms &amp; Conditions, you will lose any accumulated credits. If you receive free or promotional credits, we may expire them at any time without any notification.Credits are not redeemable for any sum of money or monetary value from us.', 1, '2016-07-27 23:48:58', 1, '2016-07-27 23:48:58', 1),
(37, 7, 'What are payment settings?', 'The payment settings tab is found in Account Settings. It lets you control your auto-renewal settings for your credits or VIP Membership.', 1, '2016-07-27 23:48:58', 1, '2016-07-27 23:48:58', 1),
(38, 7, 'How does Automatic top-up work for credits?', 'When you use your last 100 credits, your credits top up automatically by the last amount you manually paid for.', 1, '2016-07-27 23:48:58', 1, '2016-07-27 23:48:58', 1),
(39, 7, 'What payments methods do you use?', 'Currently we only use Paypal. We are looking to implements more payment options soon.', 1, '2016-07-27 23:48:58', 1, '2016-07-27 23:48:58', 1),
(40, 7, 'Who do I contact if I get a billing error?', 'Please go to our Contact Us page and leave a comment. Our team will aim to get back to you with 24 hours.', 1, '2016-07-27 23:48:58', 1, '2016-07-27 23:48:58', 1),
(41, 8, 'How do I sign into Startrishta', 'Click the Log-in box at the top of the homepage and enter your login details. You can also log in via your Facebook account.', 1, '2016-07-27 23:48:58', 1, '2016-07-27 23:48:58', 1),
(42, 8, 'Forgotten password, what do I do?', 'Click the Log-in box and hit the ‘Forgotten Credentials’ Link, this will take you to a new page where you can reset your details.', 1, '2016-07-27 23:48:58', 1, '2016-07-27 23:48:58', 1),
(43, 8, 'What are notifications and how do I change their settings?', 'Notifications allow you to stay on top of your hectic online activities on Startrishta! You can control what notifications you receive by going to Account Settings and clicking on General Settings.', 1, '2016-07-27 23:48:58', 1, '2016-07-27 23:48:58', 1),
(44, 8, 'How do I control my privacy?', 'Go to Account Settings, Click on General Settings and you have several options to control who sees your profile.', 1, '2016-07-27 23:48:58', 1, '2016-07-27 23:48:58', 1),
(45, 8, 'How do I change my email address?', 'Go to Account Settings and click on Change Password/Email tab.', 1, '2016-07-27 23:48:58', 1, '2016-07-27 23:48:58', 1),
(46, 8, 'How do I delete my profile?', 'Head over to Account Settings and click on the Delete my Account. We really hope\r\n\r\nyou don’t ever have to do this though :)', 1, '2016-07-27 23:48:58', 1, '2016-07-27 23:48:58', 1),
(47, 8, 'How do I stay safe online?', 'You can stay safe online by taking sensible precautions and not revealing your home address to people you don’t know. For a guide to stay safe online (and offline) head over to our Guide to Online Safety page.', 1, '2016-07-27 23:48:58', 1, '2016-07-27 23:48:58', 1),
(48, 8, 'How do I report abuse?', 'You can report any abuse or complain about Content on Startrishta by contacting us via our Contact Us page, outlining the abuse and or complaint. You can also report a user directly from a profile, by clicking the ‘Report Abuse’ link on their profile, choosing the reason for the complaint and providing us with any additional information you think fit.', 1, '2016-07-27 23:48:58', 1, '2016-07-27 23:48:58', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sr_faq_type`
--

CREATE TABLE IF NOT EXISTS `sr_faq_type` (
  `faq_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `faq_type` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0:inactive;1:IsActive',
  PRIMARY KEY (`faq_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `sr_faq_type`
--

INSERT INTO `sr_faq_type` (`faq_type_id`, `faq_type`, `status`) VALUES
(1, 'Common Questions', 1),
(2, 'Profile', 1),
(3, 'Photos', 1),
(4, 'Kismat Connection', 1),
(5, 'Search', 1),
(6, 'VIP Membership', 1),
(7, 'Credits', 1),
(8, 'Setting & Privacy', 1),
(9, 'Community Guidelines', 1),
(10, 'Online Safety', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sr_gifts`
--

CREATE TABLE IF NOT EXISTS `sr_gifts` (
  `gift_id` int(11) NOT NULL AUTO_INCREMENT,
  `gift` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`gift_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `sr_gifts`
--

INSERT INTO `sr_gifts` (`gift_id`, `gift`, `status`) VALUES
(1, 'gift1.png', 0),
(2, 'gift2.jpg', 1),
(3, 'gift3.jpg', 1),
(4, 'gift4.jpg', 1),
(5, 'gift5.jpg', 1),
(6, 'gift6.jpg', 1),
(7, 'gift7.jpg', 1),
(8, 'gift8.jpg', 1),
(9, 'gift9.jpg', 1),
(10, 'gift10.jpg', 1),
(11, 'gift11.jpg', 1),
(12, 'gift12.jpg', 1),
(13, 'gift13.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sr_hair_color`
--

CREATE TABLE IF NOT EXISTS `sr_hair_color` (
  `hair_color_id` int(11) NOT NULL AUTO_INCREMENT,
  `hair_color` varchar(20) NOT NULL,
  `status` int(11) NOT NULL COMMENT '1:active,0:inactive',
  PRIMARY KEY (`hair_color_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `sr_hair_color`
--

INSERT INTO `sr_hair_color` (`hair_color_id`, `hair_color`, `status`) VALUES
(1, 'Brown', 1),
(2, 'Black', 1),
(3, 'Blonde', 1),
(4, 'Red', 1),
(5, 'Gray', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sr_here_to`
--

CREATE TABLE IF NOT EXISTS `sr_here_to` (
  `here_to_id` int(11) NOT NULL AUTO_INCREMENT,
  `here_to` varchar(50) NOT NULL,
  `icon` varchar(20) NOT NULL,
  `html_icon` varchar(20) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`here_to_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `sr_here_to`
--

INSERT INTO `sr_here_to` (`here_to_id`, `here_to`, `icon`, `html_icon`, `status`) VALUES
(1, 'Explore Marriage Options', 'heart.png', '&nbsp; &#xf004;', 1),
(2, 'Make New Friends', 'user.png', '&nbsp; &#xf007;', 1),
(3, 'Chat', 'chat.png', '&nbsp; &#xf075;', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sr_inbox_user`
--

CREATE TABLE IF NOT EXISTS `sr_inbox_user` (
  `inbox_uid` int(11) NOT NULL AUTO_INCREMENT,
  `added_uid` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `added_on` datetime NOT NULL,
  PRIMARY KEY (`inbox_uid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=100 ;

--
-- Dumping data for table `sr_inbox_user`
--

INSERT INTO `sr_inbox_user` (`inbox_uid`, `added_uid`, `user_id`, `added_on`) VALUES
(1, 4, 1, '2016-02-09 18:53:33'),
(2, 10, 0, '2016-02-11 19:52:30'),
(3, 12, 20, '2015-10-26 19:16:55'),
(4, 12, 10, '2015-10-23 15:19:39'),
(5, 30, 5, '2015-10-20 13:19:52'),
(6, 4, 31, '2015-10-20 18:06:45'),
(7, 1, 27, '2015-12-22 12:09:09'),
(8, 54, 4, '2016-04-21 15:23:12'),
(9, 1, 32, '2015-10-28 02:57:17'),
(10, 31, 33, '2015-10-29 12:30:56'),
(11, 54, 4, '2016-04-21 15:23:12'),
(12, 22, 6, '2016-08-16 18:36:42'),
(13, 3, 9, '2015-10-31 17:21:44'),
(14, 33, 34, '2016-02-22 18:20:50'),
(15, 12, 35, '2015-11-02 18:21:00'),
(16, 95, 36, '2016-09-26 15:16:19'),
(17, 5, 37, '2015-11-06 15:36:53'),
(18, 14, 38, '2016-02-19 16:21:59'),
(19, 8, 16, '2015-11-09 16:04:40'),
(20, 24, 39, '2015-11-17 13:30:53'),
(21, 32, 40, '2015-11-18 12:55:06'),
(22, 3, 41, '2015-11-25 20:57:20'),
(23, 28, 42, '2015-12-08 12:11:28'),
(24, 41, 43, '2015-12-08 12:46:46'),
(25, 27, 44, '2016-01-07 15:00:55'),
(26, 5, 45, '2016-01-07 15:42:14'),
(27, 29, 46, '2016-01-07 18:36:28'),
(28, 43, 47, '2016-01-08 21:11:41'),
(29, 10, 48, '2016-01-14 11:11:45'),
(30, 40, 49, '2016-01-15 05:29:37'),
(31, 41, 50, '2016-02-11 13:39:34'),
(32, 41, 51, '2016-02-11 13:32:20'),
(33, 1, 52, '2016-01-16 13:56:33'),
(34, 32, 53, '2016-01-18 02:44:45'),
(35, 14, 54, '2016-01-21 11:38:29'),
(36, 30, 28, '2016-01-26 03:19:16'),
(37, 46, 55, '2016-01-27 15:10:52'),
(38, 24, 56, '2016-02-04 20:15:24'),
(39, 3, 57, '2016-02-16 16:59:35'),
(40, 4, 58, '2016-02-23 11:03:09'),
(41, 22, 59, '2016-03-11 13:29:02'),
(42, 54, 60, '2016-03-11 14:52:00'),
(43, 22, 61, '2016-03-11 15:57:11'),
(44, 55, 62, '2016-03-11 16:02:19'),
(45, 22, 63, '2016-03-11 16:16:06'),
(46, 55, 64, '2016-03-11 16:18:14'),
(47, 37, 65, '2016-03-11 17:07:01'),
(48, 27, 66, '2016-03-11 17:21:25'),
(49, 5, 67, '2016-04-07 10:27:17'),
(50, 6, 8, '2016-04-18 11:33:00'),
(51, 33, 68, '2016-04-16 15:23:58'),
(52, 33, 69, '2016-05-10 17:23:00'),
(53, 43, 22, '2016-04-28 16:19:06'),
(54, 54, 24, '2016-04-28 18:53:44'),
(55, 10, 70, '2016-05-22 21:22:56'),
(56, 37, 71, '2016-05-27 17:34:36'),
(57, 12, 2, '2016-06-03 15:00:17'),
(58, 36, 72, '2016-06-04 16:18:18'),
(59, 24, 73, '2016-06-04 17:13:37'),
(60, 46, 74, '2016-06-04 17:47:53'),
(61, 54, 75, '2016-06-04 17:56:18'),
(62, 31, 76, '2016-06-04 18:03:03'),
(63, 21, 77, '2016-06-04 18:12:12'),
(64, 42, 78, '2016-06-04 18:15:27'),
(65, 3, 79, '2016-06-06 12:47:13'),
(66, 21, 80, '2016-06-10 13:03:01'),
(67, 22, 81, '2016-06-06 13:20:40'),
(68, 24, 82, '2016-06-06 13:22:45'),
(69, 40, 83, '2016-06-11 15:10:55'),
(70, 2, 84, '2016-06-22 19:33:49'),
(71, 74, 85, '2016-07-02 12:10:14'),
(72, 70, 86, '2016-07-05 11:35:13'),
(73, 75, 87, '2016-07-13 14:40:33'),
(74, 55, 88, '2016-07-13 16:58:35'),
(75, 27, 89, '2016-07-13 17:07:44'),
(76, 51, 90, '2016-07-14 14:43:51'),
(77, 79, 91, '2016-07-14 15:11:46'),
(78, 12, 92, '2016-07-22 11:27:02'),
(79, 82, 93, '2016-07-25 10:42:39'),
(80, 112, 94, '2016-10-25 13:26:29'),
(81, 55, 95, '2016-07-28 10:23:26'),
(82, 70, 96, '2016-08-08 02:29:49'),
(83, 28, 97, '2016-08-08 03:08:42'),
(84, 4, 98, '2016-08-14 21:47:42'),
(85, 23, 99, '2016-08-18 15:01:06'),
(86, 34, 100, '2016-08-17 20:20:20'),
(87, 32, 101, '2016-08-25 16:07:24'),
(88, 54, 102, '2016-09-02 12:04:57'),
(89, 89, 103, '2016-10-12 17:53:06'),
(90, 54, 104, '2016-10-13 15:14:29'),
(91, 79, 105, '2016-10-13 16:29:21'),
(92, 29, 106, '2016-10-14 17:13:55'),
(93, 12, 107, '2016-10-27 10:38:11'),
(94, 91, 108, '2016-10-17 15:40:15'),
(95, 66, 109, '2016-10-17 16:02:00'),
(96, 36, 110, '2016-10-19 12:49:40'),
(97, 38, 111, '2016-10-20 11:47:58'),
(98, 80, 112, '2016-10-20 11:54:41'),
(99, 89, 113, '2016-10-26 14:27:51');

-- --------------------------------------------------------

--
-- Table structure for table `sr_income`
--

CREATE TABLE IF NOT EXISTS `sr_income` (
  `income_id` int(11) NOT NULL AUTO_INCREMENT,
  `income` varchar(20) NOT NULL,
  `status` int(11) NOT NULL COMMENT '1:active,0:inactive',
  PRIMARY KEY (`income_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `sr_income`
--

INSERT INTO `sr_income` (`income_id`, `income`, `status`) VALUES
(1, 'None', 1),
(2, 'Reasonable', 1),
(3, 'High', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sr_interest`
--

CREATE TABLE IF NOT EXISTS `sr_interest` (
  `interest_id` int(11) NOT NULL AUTO_INCREMENT,
  `interest` varchar(100) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `added_by` int(11) NOT NULL,
  `added_on` datetime NOT NULL,
  `approved_by` int(11) NOT NULL,
  `approved_on` datetime NOT NULL,
  PRIMARY KEY (`interest_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `sr_interest`
--

INSERT INTO `sr_interest` (`interest_id`, `interest`, `icon`, `status`, `cat_id`, `added_by`, `added_on`, `approved_by`, `approved_on`) VALUES
(1, 'Animal', 'animal', 2, 1, 0, '2015-09-10 13:32:35', 0, '2015-09-10 13:32:38'),
(2, 'Religion plox', 'religion', 2, 2, 0, '2015-09-10 13:32:35', 0, '2015-09-10 13:32:35'),
(3, 'Music', 'music', 1, 3, 0, '2015-09-10 13:32:35', 0, '2015-09-10 13:32:35'),
(4, 'TV & Movies', 'tv-movies', 1, 3, 0, '2015-09-10 13:32:35', 0, '2015-09-10 13:32:35'),
(5, 'Sport & Fitness', 'sportz-fitness', 1, 5, 0, '2015-09-10 13:32:35', 0, '2015-09-10 13:32:35'),
(6, 'Travel', 'travel', 1, 6, 0, '2015-09-10 13:32:35', 0, '2015-09-10 13:32:35'),
(7, 'Hobbies & Games', 'hobbies-games', 1, 7, 0, '2015-09-10 13:32:35', 0, '2015-09-10 13:32:35'),
(8, 'Books', 'books', 1, 8, 0, '2015-09-10 13:32:35', 0, '2015-09-10 13:32:35'),
(9, 'Art & Culture', 'art-culture', 1, 9, 0, '2015-09-10 13:32:35', 0, '2015-09-10 13:32:35'),
(10, 'Profession', 'profession', 1, 10, 0, '2015-09-10 13:32:35', 0, '2015-09-10 13:32:35'),
(11, 'Others', 'others', 1, 11, 0, '2015-09-10 13:36:50', 0, '2015-09-10 13:36:54'),
(14, 'Reading Book', 'books', 2, 8, 1, '2015-09-12 15:11:20', 0, '0000-00-00 00:00:00'),
(15, 'hindusm', 'religion', 1, 2, 1, '2015-09-12 15:24:37', 0, '0000-00-00 00:00:00'),
(17, 'surfing', 'hobbies-games', 1, 7, 4, '2015-09-25 11:17:09', 0, '0000-00-00 00:00:00'),
(18, 'surfing', 'hobbies-games', 1, 7, 4, '2015-09-25 11:20:04', 0, '0000-00-00 00:00:00'),
(19, 'internet', 'profession', 2, 10, 4, '2015-09-26 11:46:22', 0, '0000-00-00 00:00:00'),
(20, 'Nachos', 'food-drinks', 2, 11, 6, '2016-01-09 16:36:30', 0, '0000-00-00 00:00:00'),
(21, 'massive attack', 'music', 0, 3, 6, '2016-01-16 17:07:47', 0, '0000-00-00 00:00:00'),
(22, 'massive attack', 'music', 2, 3, 6, '2016-01-20 11:38:46', 0, '0000-00-00 00:00:00'),
(23, 'guitar', 'music', 1, 3, 6, '2016-02-19 20:25:11', 0, '0000-00-00 00:00:00'),
(24, 'dating', 'others', 0, 12, 86, '2016-07-05 12:18:55', 0, '0000-00-00 00:00:00'),
(25, 'dancing', 'music', 0, 3, 92, '2016-07-22 12:00:15', 0, '0000-00-00 00:00:00'),
(26, 'dog', 'animal', 0, 1, 97, '2016-08-08 03:22:07', 0, '0000-00-00 00:00:00'),
(27, 'photography', 'others', 0, 12, 36, '2016-08-08 17:25:37', 0, '0000-00-00 00:00:00'),
(28, 'driving', 'others', 0, 12, 36, '2016-08-08 17:26:03', 0, '0000-00-00 00:00:00'),
(29, 'Dogs', 'animal', 0, 1, 6, '2016-08-09 01:45:56', 0, '0000-00-00 00:00:00'),
(30, 'video', 'tv-movies', 1, 4, 6, '2016-08-10 21:30:00', 0, '0000-00-00 00:00:00'),
(31, 'Cinema', 'tv-movies', 1, 4, 99, '2016-08-16 14:22:20', 0, '0000-00-00 00:00:00'),
(32, 'Salad chef', 'food-drinks', 2, 11, 6, '2016-09-10 17:09:39', 0, '0000-00-00 00:00:00'),
(33, 'programming', 'others', 0, 12, 103, '2016-10-01 12:14:50', 0, '0000-00-00 00:00:00'),
(34, 'programm', 'others', 0, 12, 103, '2016-10-01 12:50:52', 0, '0000-00-00 00:00:00'),
(35, 'Photography', 'others', 0, 12, 109, '2016-10-19 10:41:54', 0, '0000-00-00 00:00:00'),
(36, 'animals', 'animal', 0, 1, 107, '2016-10-24 16:11:13', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `sr_interest_category`
--

CREATE TABLE IF NOT EXISTS `sr_interest_category` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(100) NOT NULL,
  `icon` varchar(100) NOT NULL,
  `status` tinyint(4) NOT NULL COMMENT '1:active,0:inactive',
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `sr_interest_category`
--

INSERT INTO `sr_interest_category` (`cat_id`, `category`, `icon`, `status`) VALUES
(1, 'Animal', 'animal', 1),
(2, 'Religion', 'religion', 1),
(3, 'Music', 'music', 1),
(4, 'TV & Movies', 'tv-movies', 1),
(5, 'Sport & Fitness', 'sportz-fitness', 1),
(6, 'Travel', 'travel', 1),
(7, 'Hobbies & Games', 'hobbies-games', 1),
(8, 'Books', 'books', 1),
(9, 'Art & Culture', 'art-culture', 1),
(10, 'Profession', 'profession', 1),
(11, 'Food & Drinks', 'food-drinks', 1),
(12, 'Others', 'others', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sr_language`
--

CREATE TABLE IF NOT EXISTS `sr_language` (
  `language_id` int(11) NOT NULL AUTO_INCREMENT,
  `language` varchar(20) NOT NULL,
  `status` int(11) NOT NULL COMMENT '1:active,0:inactive',
  PRIMARY KEY (`language_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=110 ;

--
-- Dumping data for table `sr_language`
--

INSERT INTO `sr_language` (`language_id`, `language`, `status`) VALUES
(1, 'English', 1),
(2, 'Hindi', 1),
(3, 'Arabic', 1),
(4, 'Bengali', 1),
(5, 'Malay', 1),
(6, 'Marathi', 1),
(7, 'Tamil', 1),
(8, 'Perisan', 1),
(9, 'Turkish', 1),
(10, 'Urdu', 1),
(11, 'Telugu', 1),
(12, 'Gujarati', 1),
(13, 'Kannada', 1),
(14, 'Punjabi', 1),
(15, 'Malayalam', 1),
(16, 'Oriya', 1),
(17, 'Maithili', 1),
(18, 'Assamese', 1),
(19, 'Santali', 1),
(20, 'Kashmiri', 1),
(21, 'Konkani', 1),
(22, 'Nepali', 1),
(23, 'Sindhi', 1),
(24, 'Dogri', 1),
(25, 'Manipuri', 1),
(26, 'Bodo', 1),
(27, 'Mandarin', 1),
(28, 'Spanish', 1),
(29, 'Portuguese', 1),
(30, 'Russian', 1),
(31, 'Japanese', 1),
(32, 'German', 1),
(33, 'Javanese', 1),
(34, 'Wu', 1),
(35, 'Vietnamese', 1),
(36, 'Korean', 1),
(37, 'French', 1),
(38, 'Italian', 1),
(39, 'Cantonese', 1),
(40, 'Thai', 1),
(41, 'Jin', 1),
(42, 'Min Nan', 1),
(43, 'Polish', 1),
(44, 'Pashto', 1),
(45, 'Xiang', 1),
(46, 'Sundanese', 1),
(47, 'Hausa', 1),
(48, 'Oriya', 1),
(49, 'Burmese', 1),
(50, 'Hakka', 1),
(51, 'Ukrainian', 1),
(52, 'Bhojpuri', 1),
(53, 'Tagalog', 1),
(54, 'Yoruba', 1),
(55, 'Maithili', 1),
(56, 'Swahili', 1),
(57, 'Uzbek', 1),
(58, 'Amharic', 1),
(59, 'Fula', 1),
(60, 'Romanian', 1),
(61, 'Oromo', 1),
(62, 'Igbo', 1),
(63, 'Azerbaijani', 1),
(64, 'Awadhi', 1),
(65, 'Gan', 1),
(66, 'Cebuano', 1),
(67, 'Dutch', 1),
(68, 'Kurdish', 1),
(69, 'Serbo-Croatian', 1),
(70, 'Malagasy', 1),
(71, 'Saraiki', 1),
(72, 'Sinhalese', 1),
(73, 'Chittagonian', 1),
(74, 'Zhuang', 1),
(75, 'Khmer', 1),
(76, 'Assamese', 1),
(77, 'Madurese', 1),
(78, 'Somali', 1),
(79, 'Marwari', 1),
(80, 'Magahi', 1),
(81, 'Haryanvi', 1),
(82, 'Hungarian', 1),
(83, 'Chhattisgarhi', 1),
(84, 'Greek', 1),
(85, 'Chewa', 1),
(86, 'Deccan', 1),
(87, 'Akan', 1),
(88, 'Kazakh', 1),
(89, 'Min Bei', 1),
(90, 'Sylheti', 1),
(91, 'Zulu', 1),
(92, 'Czech', 1),
(93, 'Kinyarwanda', 1),
(94, 'Dhundhari', 1),
(95, 'Haitian Creole', 1),
(96, 'Min Dong', 1),
(97, 'Ilokano', 1),
(98, 'Quechua', 1),
(99, 'Kirundi', 1),
(100, 'Swedish', 1),
(101, 'Hmong', 1),
(102, 'Shona', 1),
(103, 'Uyghur', 1),
(104, 'Hiligaynon', 1),
(105, 'Mossi', 1),
(106, 'Xhosa', 1),
(107, 'Belarusian', 1),
(108, 'Balochi', 1),
(109, 'Konkani', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sr_login_history`
--

CREATE TABLE IF NOT EXISTS `sr_login_history` (
  `login_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `login_time` datetime NOT NULL,
  `logout_time` datetime NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`login_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=964 ;

--
-- Dumping data for table `sr_login_history`
--

INSERT INTO `sr_login_history` (`login_id`, `user_id`, `login_time`, `logout_time`, `status`) VALUES
(1, 20, '2015-10-08 17:59:41', '2015-10-08 18:07:47', 1),
(2, 5, '2015-10-08 18:08:04', '0000-00-00 00:00:00', 1),
(3, 20, '2015-10-09 10:15:20', '2015-10-09 10:16:00', 1),
(4, 1, '2015-10-09 10:16:19', '0000-00-00 00:00:00', 1),
(5, 20, '2015-10-09 19:29:12', '2015-10-09 19:29:19', 1),
(6, 1, '2015-10-09 19:29:26', '0000-00-00 00:00:00', 1),
(7, 4, '2015-10-09 19:38:08', '0000-00-00 00:00:00', 1),
(8, 20, '2015-10-13 13:46:37', '0000-00-00 00:00:00', 1),
(9, 20, '2015-10-13 15:35:40', '2015-10-13 15:36:19', 1),
(10, 20, '2015-10-13 15:38:01', '0000-00-00 00:00:00', 1),
(11, 1, '2015-10-13 15:52:54', '0000-00-00 00:00:00', 1),
(12, 4, '2015-10-13 18:25:06', '2015-10-13 18:42:11', 1),
(13, 9, '2015-10-13 18:42:34', '2015-10-13 18:55:30', 1),
(14, 4, '2015-10-13 18:55:38', '0000-00-00 00:00:00', 1),
(15, 1, '2015-10-14 10:17:38', '0000-00-00 00:00:00', 1),
(16, 8, '2015-10-14 10:22:11', '0000-00-00 00:00:00', 1),
(17, 10, '2015-10-14 13:49:57', '0000-00-00 00:00:00', 1),
(18, 20, '2015-10-14 16:40:31', '0000-00-00 00:00:00', 1),
(19, 4, '2015-10-15 11:50:27', '0000-00-00 00:00:00', 1),
(20, 1, '2015-10-15 15:57:27', '0000-00-00 00:00:00', 1),
(21, 1, '2015-10-15 17:04:29', '2015-10-15 17:08:51', 1),
(22, 1, '2015-10-15 17:08:55', '0000-00-00 00:00:00', 1),
(23, 20, '2015-10-15 17:12:48', '2015-10-15 17:49:18', 1),
(24, 8, '2015-10-15 17:44:34', '0000-00-00 00:00:00', 1),
(25, 20, '2015-10-15 17:49:32', '2015-10-15 18:13:02', 1),
(26, 1, '2015-10-15 18:13:31', '0000-00-00 00:00:00', 1),
(27, 20, '2015-10-16 10:36:25', '2015-10-16 10:36:48', 1),
(28, 1, '2015-10-16 10:36:56', '2015-10-16 11:04:10', 1),
(29, 1, '2015-10-16 10:59:27', '2015-10-16 15:20:28', 1),
(30, 10, '2015-10-16 11:05:22', '0000-00-00 00:00:00', 1),
(31, 1, '2015-10-16 15:46:53', '0000-00-00 00:00:00', 1),
(32, 1, '2015-10-16 19:14:08', '2015-10-16 19:14:57', 1),
(33, 20, '2015-10-16 19:15:10', '0000-00-00 00:00:00', 1),
(34, 1, '2015-10-17 10:28:31', '0000-00-00 00:00:00', 1),
(35, 20, '2015-10-17 13:41:49', '0000-00-00 00:00:00', 1),
(36, 1, '2015-10-17 16:36:34', '0000-00-00 00:00:00', 1),
(37, 1, '2015-10-17 19:08:12', '0000-00-00 00:00:00', 1),
(38, 1, '2015-10-19 11:11:43', '0000-00-00 00:00:00', 1),
(39, 10, '2015-10-19 14:28:42', '0000-00-00 00:00:00', 1),
(40, 20, '2015-10-19 15:37:12', '0000-00-00 00:00:00', 1),
(41, 10, '2015-10-19 15:40:29', '0000-00-00 00:00:00', 1),
(42, 20, '2015-10-19 15:42:00', '0000-00-00 00:00:00', 1),
(43, 20, '2015-10-20 11:15:39', '0000-00-00 00:00:00', 1),
(44, 1, '2015-10-20 13:09:36', '2015-10-20 13:16:01', 1),
(45, 4, '2015-10-20 13:17:03', '2015-10-20 13:19:33', 1),
(46, 5, '2015-10-20 13:19:51', '2015-10-20 13:22:18', 1),
(47, 20, '2015-10-20 13:24:07', '0000-00-00 00:00:00', 1),
(48, 20, '2015-10-20 14:17:52', '0000-00-00 00:00:00', 1),
(49, 10, '2015-10-20 15:20:51', '0000-00-00 00:00:00', 1),
(50, 1, '2015-10-20 15:59:34', '0000-00-00 00:00:00', 1),
(51, 10, '2015-10-20 16:43:10', '0000-00-00 00:00:00', 1),
(52, 10, '2015-10-20 16:48:42', '0000-00-00 00:00:00', 1),
(53, 10, '2015-10-20 17:59:53', '2015-10-20 18:05:37', 1),
(54, 10, '2015-10-20 18:32:23', '0000-00-00 00:00:00', 1),
(55, 20, '2015-10-21 10:21:06', '0000-00-00 00:00:00', 1),
(56, 20, '2015-10-21 10:29:58', '0000-00-00 00:00:00', 1),
(57, 10, '2015-10-21 10:58:35', '0000-00-00 00:00:00', 1),
(58, 27, '2015-10-21 11:19:43', '0000-00-00 00:00:00', 1),
(59, 20, '2015-10-21 11:32:57', '0000-00-00 00:00:00', 1),
(60, 10, '2015-10-21 11:48:24', '0000-00-00 00:00:00', 1),
(61, 1, '2015-10-21 13:17:42', '0000-00-00 00:00:00', 1),
(62, 10, '2015-10-21 13:35:54', '0000-00-00 00:00:00', 1),
(63, 20, '2015-10-21 16:39:13', '0000-00-00 00:00:00', 1),
(64, 20, '2015-10-21 17:56:55', '0000-00-00 00:00:00', 1),
(65, 20, '2015-10-23 11:39:28', '0000-00-00 00:00:00', 1),
(66, 20, '2015-10-23 11:49:27', '0000-00-00 00:00:00', 1),
(67, 20, '2015-10-23 12:54:14', '0000-00-00 00:00:00', 1),
(68, 20, '2015-10-23 14:29:39', '2015-10-23 14:52:35', 1),
(69, 1, '2015-10-23 14:52:54', '0000-00-00 00:00:00', 1),
(70, 20, '2015-10-23 16:48:01', '2015-10-23 17:13:41', 1),
(71, 1, '2015-10-23 17:14:02', '0000-00-00 00:00:00', 1),
(72, 20, '2015-10-23 17:25:20', '2015-10-23 17:28:35', 1),
(73, 20, '2015-10-23 17:32:46', '2015-10-23 17:43:27', 1),
(74, 1, '2015-10-23 17:43:51', '0000-00-00 00:00:00', 1),
(75, 10, '2015-10-23 18:05:18', '0000-00-00 00:00:00', 1),
(76, 10, '2015-10-23 18:09:39', '0000-00-00 00:00:00', 1),
(77, 1, '2015-10-23 18:47:57', '2015-10-23 18:50:15', 1),
(78, 5, '2015-10-23 18:50:37', '0000-00-00 00:00:00', 1),
(79, 1, '2015-10-24 10:19:46', '0000-00-00 00:00:00', 1),
(80, 10, '2015-10-24 10:41:23', '0000-00-00 00:00:00', 1),
(81, 10, '2015-10-24 13:12:55', '0000-00-00 00:00:00', 1),
(82, 1, '2015-10-24 14:18:24', '0000-00-00 00:00:00', 1),
(83, 4, '2015-10-24 14:19:58', '0000-00-00 00:00:00', 1),
(84, 10, '2015-10-24 15:50:39', '0000-00-00 00:00:00', 1),
(85, 10, '2015-10-24 17:02:10', '0000-00-00 00:00:00', 1),
(86, 1, '2015-10-24 17:08:01', '2015-10-24 17:59:13', 1),
(87, 4, '2015-10-24 17:59:48', '2015-10-24 18:22:51', 1),
(88, 1, '2015-10-24 18:23:19', '0000-00-00 00:00:00', 1),
(89, 20, '2015-10-24 19:15:14', '0000-00-00 00:00:00', 1),
(90, 10, '2015-10-26 10:30:58', '0000-00-00 00:00:00', 1),
(91, 10, '2015-10-26 12:20:18', '0000-00-00 00:00:00', 1),
(92, 10, '2015-10-26 12:47:20', '0000-00-00 00:00:00', 1),
(93, 10, '2015-10-26 16:31:47', '0000-00-00 00:00:00', 1),
(94, 20, '2015-10-26 18:58:02', '2015-10-26 19:17:21', 1),
(95, 1, '2015-10-26 19:17:38', '0000-00-00 00:00:00', 1),
(96, 10, '2015-10-27 16:36:31', '0000-00-00 00:00:00', 1),
(97, 10, '2015-10-27 16:44:43', '0000-00-00 00:00:00', 1),
(98, 10, '2015-10-27 19:37:07', '0000-00-00 00:00:00', 1),
(99, 10, '2015-10-28 10:33:21', '2015-10-28 10:33:37', 1),
(100, 4, '2015-10-28 10:34:09', '2015-10-28 10:49:59', 1),
(101, 10, '2015-10-28 10:40:31', '0000-00-00 00:00:00', 1),
(102, 10, '2015-10-28 10:50:08', '2015-10-28 12:08:43', 1),
(103, 4, '2015-10-28 12:09:06', '0000-00-00 00:00:00', 1),
(104, 10, '2015-10-28 12:57:36', '0000-00-00 00:00:00', 1),
(105, 4, '2015-10-28 16:53:42', '0000-00-00 00:00:00', 1),
(106, 20, '2015-10-28 17:13:39', '2015-10-28 18:07:17', 1),
(107, 4, '2015-10-28 17:35:19', '0000-00-00 00:00:00', 1),
(108, 1, '2015-10-28 18:14:03', '0000-00-00 00:00:00', 1),
(109, 10, '2015-10-29 10:14:43', '0000-00-00 00:00:00', 1),
(110, 10, '2015-10-29 11:55:50', '2015-10-29 11:56:08', 1),
(111, 4, '2015-10-29 11:56:19', '0000-00-00 00:00:00', 1),
(112, 10, '2015-10-29 12:07:12', '2015-10-29 12:28:50', 1),
(113, 10, '2015-10-29 12:40:21', '0000-00-00 00:00:00', 1),
(114, 10, '2015-10-30 12:41:31', '0000-00-00 00:00:00', 1),
(115, 20, '2015-10-30 16:00:28', '0000-00-00 00:00:00', 1),
(116, 4, '2015-10-30 16:20:56', '0000-00-00 00:00:00', 1),
(117, 4, '2015-10-31 09:40:59', '2015-10-31 11:13:44', 1),
(118, 20, '2015-10-31 10:37:01', '0000-00-00 00:00:00', 1),
(119, 10, '2015-10-31 11:13:52', '0000-00-00 00:00:00', 1),
(120, 10, '2015-10-31 11:40:26', '0000-00-00 00:00:00', 1),
(121, 10, '2015-10-31 11:50:23', '2015-10-31 11:52:46', 1),
(122, 4, '2015-10-31 11:53:05', '0000-00-00 00:00:00', 1),
(123, 6, '2015-10-31 16:44:29', '0000-00-00 00:00:00', 1),
(124, 6, '2015-10-31 16:44:30', '0000-00-00 00:00:00', 1),
(125, 6, '2015-10-31 16:44:30', '0000-00-00 00:00:00', 1),
(126, 6, '2015-10-31 16:44:31', '0000-00-00 00:00:00', 1),
(127, 6, '2015-10-31 16:44:31', '0000-00-00 00:00:00', 1),
(128, 6, '2015-10-31 16:44:36', '0000-00-00 00:00:00', 1),
(129, 6, '2015-10-31 16:44:36', '0000-00-00 00:00:00', 1),
(130, 6, '2015-10-31 16:44:36', '0000-00-00 00:00:00', 1),
(131, 6, '2015-10-31 16:44:37', '0000-00-00 00:00:00', 1),
(132, 6, '2015-10-31 16:44:37', '0000-00-00 00:00:00', 1),
(133, 6, '2015-10-31 16:44:37', '0000-00-00 00:00:00', 1),
(134, 6, '2015-10-31 16:49:35', '2015-10-31 16:51:02', 1),
(135, 10, '2015-10-31 17:08:56', '2015-10-31 17:14:00', 1),
(136, 1, '2015-10-31 17:14:28', '2015-10-31 17:19:44', 1),
(137, 4, '2015-10-31 17:19:58', '2015-10-31 17:20:40', 1),
(138, 9, '2015-10-31 17:21:44', '2015-10-31 17:23:03', 1),
(139, 5, '2015-10-31 17:24:23', '0000-00-00 00:00:00', 1),
(140, 6, '2015-11-02 03:03:26', '0000-00-00 00:00:00', 1),
(141, 5, '2015-11-02 10:21:22', '0000-00-00 00:00:00', 1),
(142, 20, '2015-11-02 15:56:35', '0000-00-00 00:00:00', 1),
(143, 5, '2015-11-02 16:43:23', '0000-00-00 00:00:00', 1),
(144, 5, '2015-11-02 16:43:24', '0000-00-00 00:00:00', 1),
(145, 5, '2015-11-02 16:43:26', '0000-00-00 00:00:00', 1),
(146, 5, '2015-11-02 16:43:27', '0000-00-00 00:00:00', 1),
(147, 5, '2015-11-02 16:43:29', '0000-00-00 00:00:00', 1),
(148, 5, '2015-11-02 16:43:29', '0000-00-00 00:00:00', 1),
(149, 5, '2015-11-02 16:43:30', '0000-00-00 00:00:00', 1),
(150, 5, '2015-11-02 16:43:32', '0000-00-00 00:00:00', 1),
(151, 5, '2015-11-02 16:43:33', '0000-00-00 00:00:00', 1),
(152, 5, '2015-11-02 16:43:33', '0000-00-00 00:00:00', 1),
(153, 5, '2015-11-02 16:53:24', '0000-00-00 00:00:00', 1),
(154, 5, '2015-11-02 16:53:25', '0000-00-00 00:00:00', 1),
(155, 5, '2015-11-02 16:53:27', '0000-00-00 00:00:00', 1),
(156, 5, '2015-11-02 16:54:07', '0000-00-00 00:00:00', 1),
(157, 5, '2015-11-02 16:54:08', '0000-00-00 00:00:00', 1),
(158, 5, '2015-11-02 16:54:09', '0000-00-00 00:00:00', 1),
(159, 5, '2015-11-02 16:57:51', '0000-00-00 00:00:00', 1),
(160, 5, '2015-11-02 16:57:52', '0000-00-00 00:00:00', 1),
(161, 5, '2015-11-02 16:57:52', '0000-00-00 00:00:00', 1),
(162, 5, '2015-11-02 16:57:53', '2015-11-02 17:05:38', 1),
(163, 5, '2015-11-02 17:05:46', '2015-11-02 17:05:54', 1),
(164, 5, '2015-11-02 17:06:19', '0000-00-00 00:00:00', 1),
(165, 5, '2015-11-02 17:06:48', '2015-11-02 17:07:25', 1),
(166, 5, '2015-11-02 17:07:35', '2015-11-02 17:08:24', 1),
(167, 5, '2015-11-02 17:08:35', '0000-00-00 00:00:00', 1),
(168, 5, '2015-11-02 17:08:40', '2015-11-02 17:08:48', 1),
(169, 20, '2015-11-02 17:09:17', '0000-00-00 00:00:00', 1),
(170, 5, '2015-11-02 17:09:28', '2015-11-02 17:10:23', 1),
(171, 5, '2015-11-02 17:12:12', '2015-11-02 17:21:29', 1),
(172, 34, '2015-11-02 17:55:49', '2015-11-02 18:08:39', 1),
(173, 5, '2015-11-02 18:08:54', '2015-11-02 18:09:02', 1),
(174, 20, '2015-11-03 09:46:03', '2015-11-03 10:04:00', 1),
(175, 20, '2015-11-03 11:02:05', '0000-00-00 00:00:00', 1),
(176, 20, '2015-11-03 13:33:15', '2015-11-03 16:29:17', 1),
(177, 36, '2015-11-03 16:43:34', '2015-11-03 17:22:48', 1),
(178, 36, '2015-11-03 17:47:33', '2015-11-03 18:27:04', 1),
(179, 20, '2015-11-04 10:34:10', '2015-11-04 10:35:01', 1),
(180, 1, '2015-11-04 10:35:09', '0000-00-00 00:00:00', 1),
(181, 20, '2015-11-04 10:54:14', '0000-00-00 00:00:00', 1),
(182, 6, '2015-11-04 11:20:00', '0000-00-00 00:00:00', 1),
(183, 27, '2015-11-06 07:45:56', '0000-00-00 00:00:00', 1),
(184, 4, '2015-11-06 14:08:24', '0000-00-00 00:00:00', 1),
(185, 20, '2015-11-06 14:20:47', '2015-11-06 14:31:27', 1),
(186, 20, '2015-11-06 14:35:54', '0000-00-00 00:00:00', 1),
(187, 36, '2015-11-06 16:18:59', '2015-11-06 17:14:19', 1),
(188, 36, '2015-11-06 17:15:17', '0000-00-00 00:00:00', 1),
(189, 36, '2015-11-07 11:42:03', '0000-00-00 00:00:00', 1),
(190, 6, '2015-11-07 15:39:20', '0000-00-00 00:00:00', 1),
(191, 36, '2015-11-09 14:28:10', '2015-11-09 15:33:25', 1),
(192, 6, '2015-11-14 15:52:50', '0000-00-00 00:00:00', 1),
(193, 6, '2015-11-17 03:48:55', '0000-00-00 00:00:00', 1),
(194, 20, '2015-11-17 10:45:57', '0000-00-00 00:00:00', 1),
(195, 27, '2015-11-17 11:52:54', '0000-00-00 00:00:00', 1),
(196, 36, '2015-11-17 12:39:21', '2015-11-17 12:39:42', 1),
(197, 20, '2015-11-18 15:40:10', '0000-00-00 00:00:00', 1),
(198, 40, '2015-11-19 15:55:03', '2015-11-19 15:57:39', 1),
(199, 40, '2015-11-19 16:28:13', '0000-00-00 00:00:00', 1),
(200, 6, '2015-11-24 11:57:00', '0000-00-00 00:00:00', 1),
(201, 6, '2015-11-26 15:09:54', '2015-11-26 22:04:57', 1),
(202, 6, '2015-11-26 22:05:20', '0000-00-00 00:00:00', 1),
(203, 20, '2015-11-27 12:14:03', '0000-00-00 00:00:00', 1),
(204, 20, '2015-11-27 12:14:17', '2015-11-27 12:16:06', 1),
(205, 27, '2015-11-27 13:25:49', '2015-11-27 13:40:38', 1),
(206, 27, '2015-11-27 13:41:10', '0000-00-00 00:00:00', 1),
(207, 4, '2015-11-27 15:40:19', '0000-00-00 00:00:00', 1),
(208, 6, '2015-11-29 19:31:17', '2015-11-29 19:34:23', 1),
(209, 6, '2015-11-29 19:37:17', '2015-11-29 20:38:28', 1),
(210, 6, '2015-11-29 20:39:22', '2015-11-29 20:44:30', 1),
(211, 6, '2015-11-29 20:46:36', '2015-11-29 21:01:36', 1),
(212, 6, '2015-11-29 21:07:00', '0000-00-00 00:00:00', 1),
(213, 6, '2015-11-30 16:09:10', '0000-00-00 00:00:00', 1),
(214, 20, '2015-12-01 11:45:51', '0000-00-00 00:00:00', 1),
(215, 27, '2015-12-01 11:50:57', '2015-12-01 11:57:22', 1),
(216, 27, '2015-12-01 19:18:59', '0000-00-00 00:00:00', 1),
(217, 20, '2015-12-02 11:22:09', '2015-12-02 18:42:45', 1),
(218, 6, '2015-12-02 11:54:50', '0000-00-00 00:00:00', 1),
(219, 27, '2015-12-06 14:40:22', '0000-00-00 00:00:00', 1),
(220, 6, '2015-12-07 03:23:12', '0000-00-00 00:00:00', 1),
(221, 6, '2015-12-07 03:30:01', '0000-00-00 00:00:00', 1),
(222, 6, '2015-12-07 22:03:26', '0000-00-00 00:00:00', 1),
(223, 4, '2015-12-10 15:02:49', '0000-00-00 00:00:00', 1),
(224, 20, '2015-12-10 15:06:18', '0000-00-00 00:00:00', 1),
(225, 43, '2015-12-11 12:14:11', '0000-00-00 00:00:00', 1),
(226, 6, '2015-12-12 16:21:53', '2015-12-12 17:17:47', 1),
(227, 6, '2015-12-12 17:45:54', '0000-00-00 00:00:00', 1),
(228, 27, '2015-12-14 11:46:36', '2015-12-14 13:08:40', 1),
(229, 6, '2015-12-14 15:58:24', '2015-12-14 16:02:38', 1),
(230, 36, '2015-12-15 10:22:23', '2015-12-15 10:23:08', 1),
(231, 38, '2015-12-15 10:24:38', '2015-12-15 11:00:56', 1),
(232, 20, '2015-12-15 11:40:28', '2015-12-15 12:21:22', 1),
(233, 6, '2015-12-15 12:03:45', '0000-00-00 00:00:00', 1),
(234, 38, '2015-12-15 12:23:04', '0000-00-00 00:00:00', 1),
(235, 38, '2015-12-15 12:26:57', '0000-00-00 00:00:00', 1),
(236, 20, '2015-12-15 15:07:49', '0000-00-00 00:00:00', 1),
(237, 20, '2015-12-15 17:45:35', '0000-00-00 00:00:00', 1),
(238, 20, '2015-12-16 09:02:59', '0000-00-00 00:00:00', 1),
(239, 6, '2015-12-16 11:55:14', '0000-00-00 00:00:00', 1),
(240, 20, '2015-12-16 15:44:31', '0000-00-00 00:00:00', 1),
(241, 20, '2015-12-16 16:23:53', '0000-00-00 00:00:00', 1),
(242, 27, '2015-12-16 22:55:05', '0000-00-00 00:00:00', 1),
(243, 20, '2015-12-17 11:45:58', '0000-00-00 00:00:00', 1),
(244, 6, '2015-12-17 11:57:11', '0000-00-00 00:00:00', 1),
(245, 6, '2015-12-17 12:20:45', '0000-00-00 00:00:00', 1),
(246, 27, '2015-12-17 15:35:24', '0000-00-00 00:00:00', 1),
(247, 4, '2015-12-17 15:49:47', '0000-00-00 00:00:00', 1),
(248, 27, '2015-12-17 15:50:59', '0000-00-00 00:00:00', 1),
(249, 27, '2015-12-17 15:52:25', '2015-12-17 15:54:27', 1),
(250, 4, '2015-12-17 15:56:35', '0000-00-00 00:00:00', 1),
(251, 20, '2015-12-17 16:48:24', '2015-12-17 17:29:28', 1),
(252, 20, '2015-12-17 16:55:16', '0000-00-00 00:00:00', 1),
(253, 20, '2015-12-17 17:15:57', '0000-00-00 00:00:00', 1),
(254, 1, '2015-12-17 17:32:28', '0000-00-00 00:00:00', 1),
(255, 20, '2015-12-18 10:53:04', '2015-12-18 11:07:57', 1),
(256, 38, '2015-12-18 11:11:23', '2015-12-18 11:13:35', 1),
(257, 38, '2015-12-18 11:41:17', '2015-12-18 12:16:57', 1),
(258, 27, '2015-12-18 11:55:54', '0000-00-00 00:00:00', 1),
(259, 1, '2015-12-18 12:17:12', '0000-00-00 00:00:00', 1),
(260, 20, '2015-12-18 14:51:08', '0000-00-00 00:00:00', 1),
(261, 20, '2015-12-18 16:58:19', '0000-00-00 00:00:00', 1),
(262, 6, '2015-12-19 03:13:58', '2015-12-19 03:14:43', 1),
(263, 6, '2015-12-19 03:15:55', '0000-00-00 00:00:00', 1),
(264, 20, '2015-12-19 11:27:16', '2015-12-19 11:27:24', 1),
(265, 1, '2015-12-19 11:48:11', '2015-12-19 11:51:42', 1),
(266, 4, '2015-12-19 12:08:02', '2015-12-19 12:50:53', 1),
(267, 1, '2015-12-19 12:51:24', '2015-12-19 13:03:34', 1),
(268, 6, '2015-12-19 16:05:30', '0000-00-00 00:00:00', 1),
(269, 6, '2015-12-19 16:09:42', '0000-00-00 00:00:00', 1),
(270, 6, '2015-12-19 16:47:06', '0000-00-00 00:00:00', 1),
(271, 1, '2015-12-19 17:06:07', '2015-12-19 17:28:57', 1),
(272, 5, '2015-12-19 17:31:00', '2015-12-19 17:31:16', 1),
(273, 5, '2015-12-19 17:31:33', '2015-12-19 17:31:39', 1),
(274, 6, '2015-12-19 17:51:06', '0000-00-00 00:00:00', 1),
(275, 20, '2015-12-21 09:42:08', '0000-00-00 00:00:00', 1),
(276, 1, '2015-12-21 11:34:22', '0000-00-00 00:00:00', 1),
(277, 27, '2015-12-21 18:16:25', '0000-00-00 00:00:00', 1),
(278, 6, '2015-12-21 20:29:13', '0000-00-00 00:00:00', 1),
(279, 27, '2015-12-22 12:09:08', '0000-00-00 00:00:00', 1),
(280, 6, '2015-12-22 16:03:41', '0000-00-00 00:00:00', 1),
(281, 6, '2015-12-22 16:04:01', '0000-00-00 00:00:00', 1),
(282, 20, '2015-12-22 19:12:29', '0000-00-00 00:00:00', 1),
(283, 6, '2015-12-23 02:50:27', '0000-00-00 00:00:00', 1),
(284, 6, '2015-12-23 02:52:38', '2015-12-23 02:55:14', 1),
(285, 20, '2015-12-23 10:02:55', '0000-00-00 00:00:00', 1),
(286, 1, '2015-12-23 11:39:33', '0000-00-00 00:00:00', 1),
(287, 20, '2015-12-23 15:18:07', '0000-00-00 00:00:00', 1),
(288, 6, '2015-12-23 20:44:11', '0000-00-00 00:00:00', 1),
(289, 1, '2015-12-24 18:57:35', '0000-00-00 00:00:00', 1),
(290, 6, '2015-12-25 02:26:43', '2015-12-25 02:27:12', 1),
(291, 27, '2015-12-25 07:28:09', '0000-00-00 00:00:00', 1),
(292, 6, '2015-12-25 19:22:17', '0000-00-00 00:00:00', 1),
(293, 1, '2015-12-26 10:12:43', '0000-00-00 00:00:00', 1),
(294, 20, '2015-12-26 18:52:16', '0000-00-00 00:00:00', 1),
(295, 6, '2015-12-27 21:46:02', '0000-00-00 00:00:00', 1),
(296, 20, '2015-12-29 11:00:17', '0000-00-00 00:00:00', 1),
(297, 20, '2015-12-30 13:44:37', '2015-12-30 16:00:59', 1),
(298, 36, '2015-12-30 13:57:05', '0000-00-00 00:00:00', 1),
(299, 1, '2015-12-30 16:01:06', '2015-12-30 16:01:32', 1),
(300, 38, '2015-12-30 16:01:54', '2015-12-30 16:02:25', 1),
(301, 38, '2015-12-30 16:01:54', '2015-12-30 16:02:25', 1),
(302, 38, '2015-12-30 16:01:54', '2015-12-30 16:02:25', 1),
(303, 38, '2015-12-30 16:01:54', '2015-12-30 16:02:25', 1),
(304, 4, '2015-12-30 16:02:36', '2015-12-30 16:03:13', 1),
(305, 1, '2015-12-30 16:06:12', '0000-00-00 00:00:00', 1),
(306, 1, '2015-12-30 16:13:53', '0000-00-00 00:00:00', 1),
(307, 20, '2015-12-30 17:54:30', '0000-00-00 00:00:00', 1),
(308, 20, '2015-12-31 10:59:57', '2015-12-31 12:30:35', 1),
(309, 4, '2015-12-31 12:30:25', '2015-12-31 12:31:27', 1),
(310, 1, '2015-12-31 12:30:55', '2015-12-31 12:32:58', 1),
(311, 4, '2015-12-31 12:31:47', '0000-00-00 00:00:00', 1),
(312, 1, '2015-12-31 12:33:07', '2015-12-31 12:45:19', 1),
(313, 20, '2015-12-31 18:04:26', '0000-00-00 00:00:00', 1),
(314, 27, '2015-12-31 21:35:14', '0000-00-00 00:00:00', 1),
(315, 20, '2016-01-02 12:21:57', '2016-01-02 12:22:07', 1),
(316, 1, '2016-01-02 12:23:29', '0000-00-00 00:00:00', 1),
(317, 1, '2016-01-04 10:12:50', '2016-01-04 18:18:02', 1),
(318, 6, '2016-01-04 11:55:58', '0000-00-00 00:00:00', 1),
(319, 4, '2016-01-04 15:35:28', '0000-00-00 00:00:00', 1),
(320, 6, '2016-01-04 17:29:33', '0000-00-00 00:00:00', 1),
(321, 6, '2016-01-04 22:20:23', '0000-00-00 00:00:00', 1),
(322, 6, '2016-01-05 03:40:48', '0000-00-00 00:00:00', 1),
(323, 1, '2016-01-05 14:23:25', '2016-01-05 14:37:11', 1),
(324, 1, '2016-01-07 11:28:25', '0000-00-00 00:00:00', 1),
(325, 1, '2016-01-08 13:41:21', '0000-00-00 00:00:00', 1),
(326, 6, '2016-01-08 21:20:48', '0000-00-00 00:00:00', 1),
(327, 6, '2016-01-09 16:35:18', '2016-01-09 16:54:15', 1),
(328, 1, '2016-01-11 10:23:47', '0000-00-00 00:00:00', 1),
(329, 4, '2016-01-11 10:29:07', '0000-00-00 00:00:00', 1),
(330, 4, '2016-01-11 15:54:44', '0000-00-00 00:00:00', 1),
(331, 6, '2016-01-12 11:49:17', '0000-00-00 00:00:00', 1),
(332, 27, '2016-01-12 11:54:08', '0000-00-00 00:00:00', 1),
(333, 1, '2016-01-12 15:37:32', '0000-00-00 00:00:00', 1),
(334, 1, '2016-01-13 11:04:10', '0000-00-00 00:00:00', 1),
(335, 1, '2016-01-13 11:12:15', '0000-00-00 00:00:00', 1),
(336, 1, '2016-01-13 14:39:28', '0000-00-00 00:00:00', 1),
(337, 6, '2016-01-14 03:44:17', '0000-00-00 00:00:00', 1),
(338, 1, '2016-01-14 15:14:37', '0000-00-00 00:00:00', 1),
(339, 1, '2016-01-14 16:43:15', '0000-00-00 00:00:00', 1),
(340, 6, '2016-01-14 22:27:50', '0000-00-00 00:00:00', 1),
(341, 1, '2016-01-15 11:06:53', '2016-01-15 11:12:39', 1),
(342, 1, '2016-01-15 11:16:35', '0000-00-00 00:00:00', 1),
(343, 6, '2016-01-15 11:53:17', '0000-00-00 00:00:00', 1),
(344, 6, '2016-01-15 12:03:35', '0000-00-00 00:00:00', 1),
(345, 1, '2016-01-16 10:15:43', '2016-01-16 12:55:21', 1),
(346, 6, '2016-01-16 16:48:42', '0000-00-00 00:00:00', 1),
(347, 6, '2016-01-17 02:33:01', '0000-00-00 00:00:00', 1),
(348, 50, '2016-01-17 12:09:01', '0000-00-00 00:00:00', 1),
(349, 6, '2016-01-18 02:26:55', '2016-01-18 02:41:49', 1),
(350, 1, '2016-01-18 09:45:11', '2016-01-18 09:48:13', 1),
(351, 1, '2016-01-18 10:31:22', '0000-00-00 00:00:00', 1),
(352, 50, '2016-01-18 12:15:03', '0000-00-00 00:00:00', 1),
(353, 1, '2016-01-18 14:57:28', '0000-00-00 00:00:00', 1),
(354, 1, '2016-01-19 11:03:14', '0000-00-00 00:00:00', 1),
(355, 1, '2016-01-19 13:24:45', '2016-01-19 17:58:46', 1),
(356, 1, '2016-01-19 17:04:49', '0000-00-00 00:00:00', 1),
(357, 50, '2016-01-19 17:59:07', '0000-00-00 00:00:00', 1),
(358, 50, '2016-01-19 17:59:10', '2016-01-19 18:00:33', 1),
(359, 6, '2016-01-19 20:47:18', '0000-00-00 00:00:00', 1),
(360, 6, '2016-01-19 21:23:53', '0000-00-00 00:00:00', 1),
(361, 6, '2016-01-19 22:14:02', '2016-01-19 22:26:02', 1),
(362, 6, '2016-01-19 22:26:47', '0000-00-00 00:00:00', 1),
(363, 1, '2016-01-20 09:36:09', '0000-00-00 00:00:00', 1),
(364, 6, '2016-01-20 11:36:27', '0000-00-00 00:00:00', 1),
(365, 6, '2016-01-20 21:42:33', '2016-01-20 21:45:01', 1),
(366, 50, '2016-01-21 12:28:07', '0000-00-00 00:00:00', 1),
(367, 1, '2016-01-21 12:29:13', '0000-00-00 00:00:00', 1),
(368, 1, '2016-01-21 12:29:15', '0000-00-00 00:00:00', 1),
(369, 50, '2016-01-21 18:34:59', '2016-01-21 18:38:46', 1),
(370, 50, '2016-01-21 18:48:10', '0000-00-00 00:00:00', 1),
(371, 50, '2016-01-22 09:58:29', '0000-00-00 00:00:00', 1),
(372, 50, '2016-01-22 15:58:38', '2016-01-22 16:53:01', 1),
(373, 50, '2016-01-22 16:53:06', '0000-00-00 00:00:00', 1),
(374, 1, '2016-01-22 18:52:35', '0000-00-00 00:00:00', 1),
(375, 6, '2016-01-22 19:54:31', '0000-00-00 00:00:00', 1),
(376, 6, '2016-01-22 21:43:20', '0000-00-00 00:00:00', 1),
(377, 6, '2016-01-23 02:08:42', '0000-00-00 00:00:00', 1),
(378, 6, '2016-01-23 04:46:27', '0000-00-00 00:00:00', 1),
(379, 50, '2016-01-23 10:18:02', '0000-00-00 00:00:00', 1),
(380, 1, '2016-01-23 11:45:14', '0000-00-00 00:00:00', 1),
(381, 1, '2016-01-23 12:44:24', '0000-00-00 00:00:00', 1),
(382, 6, '2016-01-25 03:37:46', '0000-00-00 00:00:00', 1),
(383, 6, '2016-01-25 03:37:47', '0000-00-00 00:00:00', 1),
(384, 6, '2016-01-25 04:15:36', '0000-00-00 00:00:00', 1),
(385, 50, '2016-01-25 10:45:39', '2016-01-25 10:53:14', 1),
(386, 50, '2016-01-25 11:20:53', '2016-01-25 11:40:37', 1),
(387, 27, '2016-01-25 11:38:18', '0000-00-00 00:00:00', 1),
(388, 50, '2016-01-25 11:46:57', '2016-01-25 12:13:22', 1),
(389, 50, '2016-01-25 12:25:46', '2016-01-25 12:25:54', 1),
(390, 50, '2016-01-25 12:37:16', '2016-01-25 12:37:25', 1),
(391, 50, '2016-01-25 12:43:43', '2016-01-25 14:34:00', 1),
(392, 50, '2016-01-25 14:35:04', '0000-00-00 00:00:00', 1),
(393, 6, '2016-01-26 03:16:24', '0000-00-00 00:00:00', 1),
(394, 6, '2016-01-26 11:57:14', '0000-00-00 00:00:00', 1),
(395, 6, '2016-01-26 20:28:43', '0000-00-00 00:00:00', 1),
(396, 6, '2016-01-27 03:40:26', '0000-00-00 00:00:00', 1),
(397, 1, '2016-01-27 10:14:11', '0000-00-00 00:00:00', 1),
(398, 1, '2016-01-27 11:30:23', '0000-00-00 00:00:00', 1),
(399, 6, '2016-01-27 12:13:59', '0000-00-00 00:00:00', 1),
(400, 1, '2016-01-28 10:32:12', '0000-00-00 00:00:00', 1),
(401, 1, '2016-01-28 17:25:31', '0000-00-00 00:00:00', 1),
(402, 1, '2016-01-29 10:10:26', '0000-00-00 00:00:00', 1),
(403, 1, '2016-01-29 15:00:35', '0000-00-00 00:00:00', 1),
(404, 1, '2016-01-29 15:00:36', '0000-00-00 00:00:00', 1),
(405, 1, '2016-01-29 15:00:37', '0000-00-00 00:00:00', 1),
(406, 1, '2016-01-29 15:12:41', '0000-00-00 00:00:00', 1),
(407, 1, '2016-01-29 15:37:10', '0000-00-00 00:00:00', 1),
(408, 1, '2016-01-29 15:38:07', '0000-00-00 00:00:00', 1),
(409, 6, '2016-01-29 22:26:32', '0000-00-00 00:00:00', 1),
(410, 6, '2016-01-31 16:09:56', '0000-00-00 00:00:00', 1),
(411, 6, '2016-01-31 23:21:53', '0000-00-00 00:00:00', 1),
(412, 6, '2016-02-01 11:26:00', '0000-00-00 00:00:00', 1),
(413, 27, '2016-02-01 11:45:26', '0000-00-00 00:00:00', 1),
(414, 6, '2016-02-02 01:48:53', '0000-00-00 00:00:00', 1),
(415, 6, '2016-02-02 11:18:04', '0000-00-00 00:00:00', 1),
(416, 6, '2016-02-03 20:30:25', '0000-00-00 00:00:00', 1),
(417, 6, '2016-02-03 21:03:42', '0000-00-00 00:00:00', 1),
(418, 6, '2016-02-03 23:24:26', '0000-00-00 00:00:00', 1),
(419, 6, '2016-02-03 23:24:26', '0000-00-00 00:00:00', 1),
(420, 6, '2016-02-04 15:37:40', '0000-00-00 00:00:00', 1),
(421, 6, '2016-02-04 18:54:21', '0000-00-00 00:00:00', 1),
(422, 1, '2016-02-05 10:23:06', '0000-00-00 00:00:00', 1),
(423, 6, '2016-02-05 15:50:41', '0000-00-00 00:00:00', 1),
(424, 56, '2016-02-05 15:51:35', '0000-00-00 00:00:00', 1),
(425, 1, '2016-02-06 11:50:42', '0000-00-00 00:00:00', 1),
(426, 6, '2016-02-08 03:38:32', '0000-00-00 00:00:00', 1),
(427, 6, '2016-02-08 11:07:53', '0000-00-00 00:00:00', 1),
(428, 50, '2016-02-08 11:23:48', '0000-00-00 00:00:00', 1),
(429, 1, '2016-02-08 15:54:26', '0000-00-00 00:00:00', 1),
(430, 1, '2016-02-08 15:54:27', '2016-02-08 18:56:21', 1),
(431, 4, '2016-02-08 18:56:49', '2016-02-08 19:19:24', 1),
(432, 50, '2016-02-09 10:02:00', '0000-00-00 00:00:00', 1),
(433, 6, '2016-02-09 11:38:04', '0000-00-00 00:00:00', 1),
(434, 38, '2016-02-09 14:23:40', '0000-00-00 00:00:00', 1),
(435, 50, '2016-02-10 10:33:46', '0000-00-00 00:00:00', 1),
(436, 1, '2016-02-10 11:11:28', '2016-02-10 14:48:23', 1),
(437, 1, '2016-02-10 14:48:30', '2016-02-10 17:12:56', 1),
(438, 4, '2016-02-10 17:13:09', '0000-00-00 00:00:00', 1),
(439, 4, '2016-02-10 17:13:11', '2016-02-10 18:21:35', 1),
(440, 50, '2016-02-10 18:49:45', '0000-00-00 00:00:00', 1),
(441, 50, '2016-02-10 18:56:35', '2016-02-10 18:56:56', 1),
(442, 50, '2016-02-10 18:56:35', '2016-02-10 18:56:56', 1),
(443, 50, '2016-02-11 10:23:53', '2016-02-11 12:13:04', 1),
(444, 6, '2016-02-11 11:34:43', '0000-00-00 00:00:00', 1),
(445, 1, '2016-02-11 12:11:52', '0000-00-00 00:00:00', 1),
(446, 50, '2016-02-11 13:39:34', '2016-02-11 13:45:23', 1),
(447, 50, '2016-02-11 13:58:58', '0000-00-00 00:00:00', 1),
(448, 38, '2016-02-11 19:25:17', '0000-00-00 00:00:00', 1),
(449, 6, '2016-02-12 03:03:05', '0000-00-00 00:00:00', 1),
(450, 38, '2016-02-12 09:58:55', '0000-00-00 00:00:00', 1),
(451, 6, '2016-02-12 11:39:00', '0000-00-00 00:00:00', 1),
(452, 4, '2016-02-12 11:57:37', '2016-02-12 12:35:33', 1),
(453, 4, '2016-02-12 12:36:57', '0000-00-00 00:00:00', 1),
(454, 1, '2016-02-12 13:22:44', '2016-02-12 15:29:03', 1),
(455, 38, '2016-02-12 15:29:21', '2016-02-12 15:42:17', 1),
(456, 4, '2016-02-12 15:42:24', '2016-02-12 16:08:34', 1),
(457, 38, '2016-02-12 16:08:38', '2016-02-12 16:09:36', 1),
(458, 38, '2016-02-12 16:15:37', '2016-02-12 16:17:45', 1),
(459, 4, '2016-02-12 16:17:55', '2016-02-12 16:35:24', 1),
(460, 38, '2016-02-12 16:35:28', '0000-00-00 00:00:00', 1),
(461, 6, '2016-02-13 15:35:32', '0000-00-00 00:00:00', 1),
(462, 6, '2016-02-13 16:37:42', '0000-00-00 00:00:00', 1),
(463, 38, '2016-02-15 11:22:49', '2016-02-15 11:40:40', 1),
(464, 6, '2016-02-15 12:20:46', '0000-00-00 00:00:00', 1),
(465, 4, '2016-02-15 16:10:38', '0000-00-00 00:00:00', 1),
(466, 6, '2016-02-15 17:03:51', '0000-00-00 00:00:00', 1),
(467, 6, '2016-02-16 11:43:21', '0000-00-00 00:00:00', 1),
(468, 1, '2016-02-16 16:44:36', '0000-00-00 00:00:00', 1),
(469, 1, '2016-02-16 17:02:12', '2016-02-16 17:04:00', 1),
(470, 6, '2016-02-17 03:10:00', '2016-02-17 03:10:37', 1),
(471, 38, '2016-02-17 10:10:15', '2016-02-17 10:12:37', 1),
(472, 6, '2016-02-17 11:26:26', '0000-00-00 00:00:00', 1),
(473, 38, '2016-02-17 18:20:49', '2016-02-17 18:21:11', 1),
(474, 6, '2016-02-18 11:03:10', '0000-00-00 00:00:00', 1),
(475, 6, '2016-02-19 11:35:22', '0000-00-00 00:00:00', 1),
(476, 38, '2016-02-19 14:53:26', '2016-02-19 14:53:41', 1),
(477, 4, '2016-02-19 14:53:48', '2016-02-19 15:35:29', 1),
(478, 38, '2016-02-19 16:21:59', '0000-00-00 00:00:00', 1),
(479, 38, '2016-02-19 16:22:01', '2016-02-19 16:30:31', 1),
(480, 38, '2016-02-19 17:03:43', '2016-02-19 18:05:18', 1),
(481, 6, '2016-02-19 20:23:06', '0000-00-00 00:00:00', 1),
(482, 6, '2016-02-19 20:23:09', '0000-00-00 00:00:00', 1),
(483, 6, '2016-02-19 20:46:05', '0000-00-00 00:00:00', 1),
(484, 1, '2016-02-20 11:16:01', '0000-00-00 00:00:00', 1),
(485, 1, '2016-02-20 11:16:02', '0000-00-00 00:00:00', 1),
(486, 6, '2016-02-20 16:32:04', '0000-00-00 00:00:00', 1),
(487, 56, '2016-02-20 16:55:27', '0000-00-00 00:00:00', 1),
(488, 4, '2016-02-22 12:03:57', '2016-02-22 12:24:24', 1),
(489, 4, '2016-02-22 12:25:48', '0000-00-00 00:00:00', 1),
(490, 38, '2016-02-22 18:20:27', '2016-02-22 18:20:35', 1),
(491, 6, '2016-02-22 20:17:51', '0000-00-00 00:00:00', 1),
(492, 4, '2016-02-23 06:39:37', '0000-00-00 00:00:00', 1),
(493, 6, '2016-02-23 11:25:48', '0000-00-00 00:00:00', 1),
(494, 6, '2016-02-23 12:17:18', '0000-00-00 00:00:00', 1),
(495, 4, '2016-02-23 17:44:25', '0000-00-00 00:00:00', 1),
(496, 4, '2016-02-24 13:02:45', '0000-00-00 00:00:00', 1),
(497, 1, '2016-02-24 13:18:16', '0000-00-00 00:00:00', 1),
(498, 6, '2016-02-29 02:41:46', '0000-00-00 00:00:00', 1),
(499, 1, '2016-03-04 18:29:01', '0000-00-00 00:00:00', 1),
(500, 6, '2016-03-04 22:20:03', '0000-00-00 00:00:00', 1),
(501, 1, '2016-03-07 15:53:57', '0000-00-00 00:00:00', 1),
(502, 6, '2016-03-08 03:38:02', '0000-00-00 00:00:00', 1),
(503, 6, '2016-03-09 02:52:04', '0000-00-00 00:00:00', 1),
(504, 1, '2016-03-10 17:48:42', '0000-00-00 00:00:00', 1),
(505, 1, '2016-03-11 09:54:48', '0000-00-00 00:00:00', 1),
(506, 1, '2016-03-11 12:49:31', '0000-00-00 00:00:00', 1),
(507, 1, '2016-03-11 14:15:22', '0000-00-00 00:00:00', 1),
(508, 1, '2016-03-11 14:52:31', '0000-00-00 00:00:00', 1),
(509, 1, '2016-03-11 16:42:46', '0000-00-00 00:00:00', 1),
(510, 1, '2016-03-11 17:13:54', '0000-00-00 00:00:00', 1),
(511, 65, '2016-03-11 17:14:59', '0000-00-00 00:00:00', 1),
(512, 1, '2016-03-11 17:15:49', '0000-00-00 00:00:00', 1),
(513, 65, '2016-03-11 17:22:43', '0000-00-00 00:00:00', 1),
(514, 1, '2016-03-11 17:24:04', '0000-00-00 00:00:00', 1),
(515, 6, '2016-03-11 18:09:23', '0000-00-00 00:00:00', 1),
(516, 65, '2016-03-11 18:39:00', '0000-00-00 00:00:00', 1),
(517, 1, '2016-03-11 18:40:52', '0000-00-00 00:00:00', 1),
(518, 65, '2016-03-11 18:59:32', '0000-00-00 00:00:00', 1),
(519, 6, '2016-03-11 22:03:28', '0000-00-00 00:00:00', 1),
(520, 6, '2016-03-12 03:21:44', '0000-00-00 00:00:00', 1),
(521, 6, '2016-03-12 13:28:56', '0000-00-00 00:00:00', 1),
(522, 6, '2016-03-12 13:43:55', '0000-00-00 00:00:00', 1),
(523, 6, '2016-03-12 16:24:38', '0000-00-00 00:00:00', 1),
(524, 65, '2016-03-14 10:52:54', '0000-00-00 00:00:00', 1),
(525, 6, '2016-03-14 11:45:36', '0000-00-00 00:00:00', 1),
(526, 6, '2016-03-15 03:13:59', '0000-00-00 00:00:00', 1),
(527, 1, '2016-03-15 10:08:42', '0000-00-00 00:00:00', 1),
(528, 6, '2016-03-15 11:27:28', '0000-00-00 00:00:00', 1),
(529, 6, '2016-03-15 19:29:30', '0000-00-00 00:00:00', 1),
(530, 6, '2016-03-17 11:47:46', '0000-00-00 00:00:00', 1),
(531, 6, '2016-03-18 03:29:44', '0000-00-00 00:00:00', 1),
(532, 6, '2016-03-18 03:49:52', '0000-00-00 00:00:00', 1),
(533, 6, '2016-03-18 11:25:31', '0000-00-00 00:00:00', 1),
(534, 6, '2016-03-18 22:13:36', '0000-00-00 00:00:00', 1),
(535, 6, '2016-03-19 16:35:09', '0000-00-00 00:00:00', 1),
(536, 6, '2016-03-20 16:46:59', '0000-00-00 00:00:00', 1),
(537, 6, '2016-03-21 02:09:51', '0000-00-00 00:00:00', 1),
(538, 6, '2016-03-21 11:42:53', '0000-00-00 00:00:00', 1),
(539, 1, '2016-03-21 11:55:45', '0000-00-00 00:00:00', 1),
(540, 6, '2016-03-22 11:35:42', '0000-00-00 00:00:00', 1),
(541, 6, '2016-03-24 02:46:48', '0000-00-00 00:00:00', 1),
(542, 1, '2016-03-28 12:41:47', '0000-00-00 00:00:00', 1),
(543, 1, '2016-03-28 12:43:16', '0000-00-00 00:00:00', 1),
(544, 6, '2016-03-29 02:13:20', '0000-00-00 00:00:00', 1),
(545, 6, '2016-04-01 19:17:07', '0000-00-00 00:00:00', 1),
(546, 6, '2016-04-02 00:25:32', '0000-00-00 00:00:00', 1),
(547, 6, '2016-04-02 02:29:13', '0000-00-00 00:00:00', 1),
(548, 6, '2016-04-02 13:21:20', '0000-00-00 00:00:00', 1),
(549, 6, '2016-04-02 15:08:26', '0000-00-00 00:00:00', 1),
(550, 6, '2016-04-03 22:09:39', '0000-00-00 00:00:00', 1),
(551, 6, '2016-04-03 22:12:14', '0000-00-00 00:00:00', 1),
(552, 6, '2016-04-04 03:10:22', '0000-00-00 00:00:00', 1),
(553, 6, '2016-04-04 14:53:05', '0000-00-00 00:00:00', 1),
(554, 56, '2016-04-04 14:58:35', '0000-00-00 00:00:00', 1),
(555, 20, '2016-04-04 16:38:02', '0000-00-00 00:00:00', 1),
(556, 6, '2016-04-04 19:26:45', '0000-00-00 00:00:00', 1),
(557, 6, '2016-04-04 20:59:10', '0000-00-00 00:00:00', 1),
(558, 6, '2016-04-05 14:26:39', '0000-00-00 00:00:00', 1),
(559, 6, '2016-04-05 15:56:37', '0000-00-00 00:00:00', 1),
(560, 6, '2016-04-05 18:12:45', '0000-00-00 00:00:00', 1),
(561, 6, '2016-04-06 01:08:22', '0000-00-00 00:00:00', 1),
(562, 6, '2016-04-06 10:47:27', '0000-00-00 00:00:00', 1),
(563, 56, '2016-04-06 10:48:57', '0000-00-00 00:00:00', 1),
(564, 6, '2016-04-06 11:18:42', '0000-00-00 00:00:00', 1),
(565, 6, '2016-04-06 16:25:17', '0000-00-00 00:00:00', 1),
(566, 6, '2016-04-06 20:49:37', '0000-00-00 00:00:00', 1),
(567, 6, '2016-04-07 02:19:05', '0000-00-00 00:00:00', 1),
(568, 27, '2016-04-07 10:47:56', '0000-00-00 00:00:00', 1),
(569, 1, '2016-04-07 11:05:17', '0000-00-00 00:00:00', 1),
(570, 1, '2016-04-07 11:06:20', '0000-00-00 00:00:00', 1),
(571, 20, '2016-04-07 11:08:48', '0000-00-00 00:00:00', 1),
(572, 27, '2016-04-07 11:09:47', '0000-00-00 00:00:00', 1),
(573, 27, '2016-04-07 11:11:28', '0000-00-00 00:00:00', 1),
(574, 6, '2016-04-07 14:26:21', '0000-00-00 00:00:00', 1),
(575, 6, '2016-04-07 16:25:13', '0000-00-00 00:00:00', 1),
(576, 6, '2016-04-07 16:27:33', '0000-00-00 00:00:00', 1),
(577, 27, '2016-04-08 19:13:53', '0000-00-00 00:00:00', 1),
(578, 9, '2016-04-11 10:54:23', '0000-00-00 00:00:00', 1),
(579, 4, '2016-04-11 10:56:39', '0000-00-00 00:00:00', 1),
(580, 20, '2016-04-13 11:34:47', '0000-00-00 00:00:00', 1),
(581, 27, '2016-04-13 12:40:52', '0000-00-00 00:00:00', 1),
(582, 20, '2016-04-16 10:36:52', '0000-00-00 00:00:00', 1),
(583, 8, '2016-04-16 11:25:47', '0000-00-00 00:00:00', 1),
(584, 6, '2016-04-16 14:43:32', '0000-00-00 00:00:00', 1),
(585, 6, '2016-04-16 17:20:56', '0000-00-00 00:00:00', 1),
(586, 6, '2016-04-17 03:38:29', '0000-00-00 00:00:00', 1),
(587, 6, '2016-04-17 10:48:05', '0000-00-00 00:00:00', 1),
(588, 20, '2016-04-18 10:14:28', '0000-00-00 00:00:00', 1),
(589, 8, '2016-04-18 10:29:09', '0000-00-00 00:00:00', 1),
(590, 8, '2016-04-19 11:04:06', '0000-00-00 00:00:00', 1),
(591, 20, '2016-04-19 18:11:58', '0000-00-00 00:00:00', 1),
(592, 1, '2016-04-19 18:41:05', '0000-00-00 00:00:00', 1),
(593, 20, '2016-04-20 11:15:56', '0000-00-00 00:00:00', 1),
(594, 20, '2016-04-20 14:02:34', '0000-00-00 00:00:00', 1),
(595, 8, '2016-04-20 17:48:46', '0000-00-00 00:00:00', 1),
(596, 1, '2016-04-20 17:53:39', '0000-00-00 00:00:00', 1),
(597, 20, '2016-04-20 18:20:06', '0000-00-00 00:00:00', 1),
(598, 1, '2016-04-20 18:20:51', '0000-00-00 00:00:00', 1),
(599, 9, '2016-04-20 18:25:47', '0000-00-00 00:00:00', 1),
(600, 20, '2016-04-21 14:53:05', '0000-00-00 00:00:00', 1),
(601, 20, '2016-04-21 15:17:30', '0000-00-00 00:00:00', 1),
(602, 4, '2016-04-21 15:23:12', '0000-00-00 00:00:00', 1),
(603, 1, '2016-04-22 10:24:19', '0000-00-00 00:00:00', 1),
(604, 20, '2016-04-23 13:50:45', '0000-00-00 00:00:00', 1),
(605, 20, '2016-04-25 10:37:16', '0000-00-00 00:00:00', 1),
(606, 1, '2016-04-25 11:22:59', '0000-00-00 00:00:00', 1),
(607, 20, '2016-04-25 16:50:01', '0000-00-00 00:00:00', 1),
(608, 20, '2016-04-26 10:01:03', '0000-00-00 00:00:00', 1),
(609, 4, '2016-04-26 16:33:40', '0000-00-00 00:00:00', 1),
(610, 69, '2016-04-27 11:35:02', '0000-00-00 00:00:00', 1),
(611, 69, '2016-04-27 15:40:40', '0000-00-00 00:00:00', 1),
(612, 20, '2016-04-28 14:35:16', '0000-00-00 00:00:00', 1),
(613, 20, '2016-04-28 18:45:01', '0000-00-00 00:00:00', 1),
(614, 1, '2016-04-28 18:52:55', '0000-00-00 00:00:00', 1),
(615, 1, '2016-04-28 19:01:04', '0000-00-00 00:00:00', 1),
(616, 1, '2016-04-28 19:06:49', '0000-00-00 00:00:00', 1),
(617, 20, '2016-04-29 10:13:28', '0000-00-00 00:00:00', 1),
(618, 20, '2016-04-30 11:27:33', '0000-00-00 00:00:00', 1),
(619, 20, '2016-04-30 15:40:49', '0000-00-00 00:00:00', 1),
(620, 69, '2016-05-10 17:16:56', '0000-00-00 00:00:00', 1),
(621, 4, '2016-05-10 18:14:32', '0000-00-00 00:00:00', 1),
(622, 6, '2016-05-11 02:31:40', '0000-00-00 00:00:00', 1),
(623, 1, '2016-05-11 12:45:59', '0000-00-00 00:00:00', 1),
(624, 1, '2016-05-12 10:05:21', '0000-00-00 00:00:00', 1),
(625, 20, '2016-05-12 10:21:09', '0000-00-00 00:00:00', 1),
(626, 1, '2016-05-12 10:27:32', '0000-00-00 00:00:00', 1),
(627, 1, '2016-05-12 17:00:28', '0000-00-00 00:00:00', 1),
(628, 6, '2016-05-12 17:52:19', '0000-00-00 00:00:00', 1),
(629, 1, '2016-05-13 16:30:10', '0000-00-00 00:00:00', 1),
(630, 1, '2016-05-13 16:30:10', '0000-00-00 00:00:00', 1),
(631, 1, '2016-05-13 16:30:11', '0000-00-00 00:00:00', 1),
(632, 1, '2016-05-14 16:43:19', '0000-00-00 00:00:00', 1),
(633, 6, '2016-05-15 20:49:56', '0000-00-00 00:00:00', 1),
(634, 6, '2016-05-15 20:53:46', '0000-00-00 00:00:00', 1),
(635, 1, '2016-05-17 11:56:27', '0000-00-00 00:00:00', 1),
(636, 6, '2016-05-19 13:03:32', '0000-00-00 00:00:00', 1),
(637, 1, '2016-05-20 12:54:55', '0000-00-00 00:00:00', 1),
(638, 6, '2016-05-20 16:41:06', '0000-00-00 00:00:00', 1),
(639, 6, '2016-05-20 20:23:20', '0000-00-00 00:00:00', 1),
(640, 6, '2016-05-22 21:11:29', '0000-00-00 00:00:00', 1),
(641, 69, '2016-05-27 15:15:59', '0000-00-00 00:00:00', 1),
(642, 36, '2016-05-27 15:43:57', '0000-00-00 00:00:00', 1),
(643, 69, '2016-05-27 16:27:56', '0000-00-00 00:00:00', 1),
(644, 6, '2016-05-28 03:34:52', '0000-00-00 00:00:00', 1),
(645, 69, '2016-05-28 12:41:48', '0000-00-00 00:00:00', 1),
(646, 69, '2016-05-28 12:41:49', '0000-00-00 00:00:00', 1),
(647, 69, '2016-05-28 15:39:24', '0000-00-00 00:00:00', 1),
(648, 36, '2016-05-30 11:17:39', '0000-00-00 00:00:00', 1),
(649, 36, '2016-05-30 11:34:38', '0000-00-00 00:00:00', 1),
(650, 1, '2016-05-31 11:02:41', '0000-00-00 00:00:00', 1),
(651, 69, '2016-06-01 11:58:18', '0000-00-00 00:00:00', 1),
(652, 36, '2016-06-01 12:19:43', '0000-00-00 00:00:00', 1),
(653, 69, '2016-06-01 12:36:03', '0000-00-00 00:00:00', 1),
(654, 36, '2016-06-01 12:38:03', '0000-00-00 00:00:00', 1),
(655, 69, '2016-06-01 13:02:55', '0000-00-00 00:00:00', 1),
(656, 36, '2016-06-01 14:13:28', '0000-00-00 00:00:00', 1),
(657, 69, '2016-06-01 14:39:07', '0000-00-00 00:00:00', 1),
(658, 6, '2016-06-01 14:57:52', '0000-00-00 00:00:00', 1),
(659, 36, '2016-06-01 15:59:04', '0000-00-00 00:00:00', 1),
(660, 69, '2016-06-01 16:03:36', '0000-00-00 00:00:00', 1),
(661, 6, '2016-06-03 02:42:12', '0000-00-00 00:00:00', 1),
(662, 36, '2016-06-03 11:27:20', '0000-00-00 00:00:00', 1),
(663, 69, '2016-06-03 11:37:34', '0000-00-00 00:00:00', 1),
(664, 69, '2016-06-03 12:09:37', '0000-00-00 00:00:00', 1),
(665, 36, '2016-06-03 12:30:43', '0000-00-00 00:00:00', 1),
(666, 36, '2016-06-03 14:51:59', '0000-00-00 00:00:00', 1),
(667, 36, '2016-06-04 16:29:02', '0000-00-00 00:00:00', 1),
(668, 72, '2016-06-04 17:03:56', '0000-00-00 00:00:00', 1),
(669, 36, '2016-06-04 17:08:09', '0000-00-00 00:00:00', 1),
(670, 36, '2016-06-04 17:10:39', '0000-00-00 00:00:00', 1),
(671, 72, '2016-06-04 17:11:15', '0000-00-00 00:00:00', 1),
(672, 1, '2016-06-06 09:58:47', '0000-00-00 00:00:00', 1),
(673, 36, '2016-06-06 12:24:04', '0000-00-00 00:00:00', 1),
(674, 69, '2016-06-06 12:45:46', '0000-00-00 00:00:00', 1),
(675, 36, '2016-06-06 12:56:47', '0000-00-00 00:00:00', 1),
(676, 80, '2016-06-06 13:18:55', '0000-00-00 00:00:00', 1),
(677, 1, '2016-06-08 10:30:25', '0000-00-00 00:00:00', 1),
(678, 1, '2016-06-10 10:37:52', '0000-00-00 00:00:00', 1),
(679, 36, '2016-06-10 11:37:10', '0000-00-00 00:00:00', 1),
(680, 1, '2016-06-10 11:43:39', '0000-00-00 00:00:00', 1),
(681, 1, '2016-06-10 11:53:39', '0000-00-00 00:00:00', 1),
(682, 1, '2016-06-10 13:12:35', '0000-00-00 00:00:00', 1),
(683, 6, '2016-06-11 19:39:25', '0000-00-00 00:00:00', 1),
(684, 1, '2016-06-13 09:20:34', '0000-00-00 00:00:00', 1),
(685, 1, '2016-06-13 10:56:43', '0000-00-00 00:00:00', 1),
(686, 1, '2016-06-15 11:09:27', '0000-00-00 00:00:00', 1),
(687, 1, '2016-06-17 10:07:22', '0000-00-00 00:00:00', 1),
(688, 1, '2016-06-17 10:07:24', '0000-00-00 00:00:00', 1),
(689, 56, '2016-06-21 19:09:34', '0000-00-00 00:00:00', 1),
(690, 1, '2016-06-22 12:03:46', '0000-00-00 00:00:00', 1),
(691, 36, '2016-06-22 12:49:05', '0000-00-00 00:00:00', 1),
(692, 1, '2016-06-22 12:50:24', '0000-00-00 00:00:00', 1),
(693, 36, '2016-06-22 13:09:10', '0000-00-00 00:00:00', 1),
(694, 1, '2016-06-28 10:25:42', '0000-00-00 00:00:00', 1),
(695, 1, '2016-06-28 10:25:42', '0000-00-00 00:00:00', 1),
(696, 1, '2016-06-28 11:37:39', '0000-00-00 00:00:00', 1),
(697, 1, '2016-06-28 11:43:35', '0000-00-00 00:00:00', 1),
(698, 1, '2016-06-30 10:13:37', '0000-00-00 00:00:00', 1),
(699, 6, '2016-06-30 14:57:51', '0000-00-00 00:00:00', 1),
(700, 36, '2016-07-11 15:39:11', '0000-00-00 00:00:00', 1),
(701, 36, '2016-07-11 16:14:36', '0000-00-00 00:00:00', 1),
(702, 9, '2016-07-11 16:52:33', '0000-00-00 00:00:00', 1),
(703, 36, '2016-07-11 17:41:56', '0000-00-00 00:00:00', 1),
(704, 6, '2016-07-12 10:37:36', '0000-00-00 00:00:00', 1),
(705, 36, '2016-07-12 11:00:29', '0000-00-00 00:00:00', 1),
(706, 36, '2016-07-12 11:05:54', '0000-00-00 00:00:00', 1),
(707, 36, '2016-07-12 11:06:37', '0000-00-00 00:00:00', 1),
(708, 36, '2016-07-12 13:08:27', '0000-00-00 00:00:00', 1),
(709, 36, '2016-07-12 13:10:01', '0000-00-00 00:00:00', 1),
(710, 1, '2016-07-12 13:31:20', '0000-00-00 00:00:00', 1),
(711, 87, '2016-07-13 15:49:09', '0000-00-00 00:00:00', 1),
(712, 87, '2016-07-13 16:35:59', '0000-00-00 00:00:00', 1),
(713, 88, '2016-07-13 17:06:17', '0000-00-00 00:00:00', 1),
(714, 1, '2016-07-14 10:34:59', '0000-00-00 00:00:00', 1),
(715, 6, '2016-07-14 10:53:19', '0000-00-00 00:00:00', 1),
(716, 89, '2016-07-14 11:08:15', '0000-00-00 00:00:00', 1),
(717, 6, '2016-07-18 10:16:16', '0000-00-00 00:00:00', 1),
(718, 6, '2016-07-24 02:53:10', '0000-00-00 00:00:00', 1),
(719, 6, '2016-07-25 20:17:28', '0000-00-00 00:00:00', 1),
(720, 36, '2016-07-27 11:30:36', '0000-00-00 00:00:00', 1),
(721, 94, '2016-07-27 14:12:49', '0000-00-00 00:00:00', 1),
(722, 94, '2016-07-28 10:22:33', '0000-00-00 00:00:00', 1),
(723, 95, '2016-07-28 15:11:23', '0000-00-00 00:00:00', 1),
(724, 94, '2016-07-28 17:19:31', '0000-00-00 00:00:00', 1),
(725, 94, '2016-07-28 17:26:15', '0000-00-00 00:00:00', 1),
(726, 94, '2016-07-28 17:27:17', '0000-00-00 00:00:00', 1),
(727, 94, '2016-07-29 11:30:39', '0000-00-00 00:00:00', 1),
(728, 1, '2016-08-01 11:34:27', '0000-00-00 00:00:00', 1),
(729, 6, '2016-08-02 00:49:33', '0000-00-00 00:00:00', 1),
(730, 36, '2016-08-02 15:40:39', '0000-00-00 00:00:00', 1),
(731, 94, '2016-08-02 15:50:54', '0000-00-00 00:00:00', 1),
(732, 94, '2016-08-05 11:07:31', '0000-00-00 00:00:00', 1),
(733, 94, '2016-08-05 16:21:00', '0000-00-00 00:00:00', 1),
(734, 94, '2016-08-06 09:45:10', '0000-00-00 00:00:00', 1),
(735, 36, '2016-08-06 14:33:39', '0000-00-00 00:00:00', 1),
(736, 6, '2016-08-08 10:50:30', '0000-00-00 00:00:00', 1),
(737, 97, '2016-08-08 11:22:52', '0000-00-00 00:00:00', 1),
(738, 36, '2016-08-08 14:35:11', '0000-00-00 00:00:00', 1),
(739, 6, '2016-08-09 01:40:58', '0000-00-00 00:00:00', 1),
(740, 1, '2016-08-09 10:17:35', '0000-00-00 00:00:00', 1),
(741, 94, '2016-08-09 11:31:16', '0000-00-00 00:00:00', 1),
(742, 36, '2016-08-09 14:20:02', '0000-00-00 00:00:00', 1),
(743, 36, '2016-08-10 10:26:32', '0000-00-00 00:00:00', 1),
(744, 94, '2016-08-10 10:49:23', '0000-00-00 00:00:00', 1),
(745, 6, '2016-08-10 21:24:44', '0000-00-00 00:00:00', 1),
(746, 6, '2016-08-15 13:04:28', '0000-00-00 00:00:00', 1),
(747, 6, '2016-08-15 16:28:50', '0000-00-00 00:00:00', 1),
(748, 6, '2016-08-15 16:29:05', '0000-00-00 00:00:00', 1),
(749, 6, '2016-08-15 16:45:51', '0000-00-00 00:00:00', 1),
(750, 6, '2016-08-15 21:46:53', '0000-00-00 00:00:00', 1),
(751, 6, '2016-08-16 00:07:27', '0000-00-00 00:00:00', 1),
(752, 6, '2016-08-16 13:44:31', '0000-00-00 00:00:00', 1),
(753, 6, '2016-08-16 14:24:41', '0000-00-00 00:00:00', 1),
(754, 6, '2016-08-16 15:03:50', '0000-00-00 00:00:00', 1),
(755, 6, '2016-08-16 15:08:40', '0000-00-00 00:00:00', 1),
(756, 99, '2016-08-16 15:53:08', '0000-00-00 00:00:00', 1),
(757, 99, '2016-08-16 22:50:26', '0000-00-00 00:00:00', 1),
(758, 6, '2016-08-17 14:52:37', '0000-00-00 00:00:00', 1),
(759, 42, '2016-08-17 15:13:51', '0000-00-00 00:00:00', 1),
(760, 42, '2016-08-17 15:33:50', '0000-00-00 00:00:00', 1),
(761, 42, '2016-08-17 15:39:30', '0000-00-00 00:00:00', 1),
(762, 6, '2016-08-17 16:03:08', '0000-00-00 00:00:00', 1),
(763, 42, '2016-08-17 18:10:03', '0000-00-00 00:00:00', 1),
(764, 6, '2016-08-17 19:09:40', '0000-00-00 00:00:00', 1),
(765, 99, '2016-08-17 19:47:00', '0000-00-00 00:00:00', 1),
(766, 99, '2016-08-17 20:24:56', '0000-00-00 00:00:00', 1),
(767, 99, '2016-08-17 21:35:49', '0000-00-00 00:00:00', 1),
(768, 6, '2016-08-18 02:09:00', '0000-00-00 00:00:00', 1),
(769, 99, '2016-08-18 02:12:10', '0000-00-00 00:00:00', 1),
(770, 6, '2016-08-18 14:12:15', '0000-00-00 00:00:00', 1),
(771, 99, '2016-08-18 15:01:05', '0000-00-00 00:00:00', 1),
(772, 6, '2016-08-18 16:05:47', '0000-00-00 00:00:00', 1),
(773, 94, '2016-08-19 12:06:16', '0000-00-00 00:00:00', 1),
(774, 94, '2016-08-19 12:43:06', '0000-00-00 00:00:00', 1),
(775, 36, '2016-08-19 12:43:42', '0000-00-00 00:00:00', 1),
(776, 36, '2016-08-20 10:38:04', '0000-00-00 00:00:00', 1),
(777, 94, '2016-08-20 10:38:19', '0000-00-00 00:00:00', 1),
(778, 94, '2016-08-20 11:19:51', '0000-00-00 00:00:00', 1),
(779, 94, '2016-08-20 14:04:47', '0000-00-00 00:00:00', 1),
(780, 94, '2016-08-20 14:06:45', '0000-00-00 00:00:00', 1),
(781, 6, '2016-08-21 00:44:24', '0000-00-00 00:00:00', 1),
(782, 6, '2016-08-21 00:48:35', '0000-00-00 00:00:00', 1),
(783, 94, '2016-08-22 11:30:12', '0000-00-00 00:00:00', 1),
(784, 36, '2016-08-22 11:30:30', '0000-00-00 00:00:00', 1),
(785, 94, '2016-08-23 10:56:37', '0000-00-00 00:00:00', 1),
(786, 36, '2016-08-23 10:56:54', '0000-00-00 00:00:00', 1),
(787, 36, '2016-08-24 11:33:06', '0000-00-00 00:00:00', 1),
(788, 1, '2016-08-30 10:28:01', '0000-00-00 00:00:00', 1),
(789, 6, '2016-08-31 01:34:59', '0000-00-00 00:00:00', 1),
(790, 6, '2016-08-31 01:40:27', '0000-00-00 00:00:00', 1),
(791, 36, '2016-09-05 14:15:39', '0000-00-00 00:00:00', 1),
(792, 36, '2016-09-06 13:02:10', '0000-00-00 00:00:00', 1),
(793, 36, '2016-09-07 11:58:36', '0000-00-00 00:00:00', 1),
(794, 36, '2016-09-08 11:20:41', '0000-00-00 00:00:00', 1),
(795, 36, '2016-09-09 11:43:49', '0000-00-00 00:00:00', 1),
(796, 36, '2016-09-09 14:43:54', '0000-00-00 00:00:00', 1),
(797, 36, '2016-09-10 10:26:35', '0000-00-00 00:00:00', 1),
(798, 6, '2016-09-10 15:39:30', '0000-00-00 00:00:00', 1),
(799, 36, '2016-09-12 13:52:54', '0000-00-00 00:00:00', 1),
(800, 36, '2016-09-12 14:58:33', '0000-00-00 00:00:00', 1),
(801, 36, '2016-09-13 14:36:28', '0000-00-00 00:00:00', 1),
(802, 1, '2016-09-14 11:04:44', '0000-00-00 00:00:00', 1),
(803, 36, '2016-09-14 14:31:45', '0000-00-00 00:00:00', 1),
(804, 36, '2016-09-15 14:17:47', '0000-00-00 00:00:00', 1),
(805, 6, '2016-09-15 22:29:19', '0000-00-00 00:00:00', 1),
(806, 36, '2016-09-16 12:14:54', '0000-00-00 00:00:00', 1),
(807, 36, '2016-09-16 13:51:11', '0000-00-00 00:00:00', 1),
(808, 36, '2016-09-17 10:14:20', '0000-00-00 00:00:00', 1),
(809, 1, '2016-09-17 10:20:05', '0000-00-00 00:00:00', 1),
(810, 31, '2016-09-17 12:18:18', '0000-00-00 00:00:00', 1),
(811, 8, '2016-09-17 13:31:58', '0000-00-00 00:00:00', 1),
(812, 1, '2016-09-20 11:24:34', '0000-00-00 00:00:00', 1),
(813, 36, '2016-09-21 13:43:27', '0000-00-00 00:00:00', 1),
(814, 36, '2016-09-22 11:08:29', '0000-00-00 00:00:00', 1),
(815, 36, '2016-09-23 10:08:55', '0000-00-00 00:00:00', 1),
(816, 1, '2016-09-23 11:45:55', '0000-00-00 00:00:00', 1),
(817, 36, '2016-09-24 14:57:02', '0000-00-00 00:00:00', 1),
(818, 36, '2016-09-26 10:31:23', '0000-00-00 00:00:00', 1),
(819, 1, '2016-09-29 13:03:09', '0000-00-00 00:00:00', 1),
(820, 103, '2016-10-01 10:03:09', '0000-00-00 00:00:00', 1),
(821, 1, '2016-10-01 12:48:51', '0000-00-00 00:00:00', 1),
(822, 103, '2016-10-01 15:32:37', '0000-00-00 00:00:00', 1),
(823, 103, '2016-10-01 15:33:34', '0000-00-00 00:00:00', 1),
(824, 36, '2016-10-01 15:34:52', '0000-00-00 00:00:00', 1),
(825, 103, '2016-10-03 10:23:37', '0000-00-00 00:00:00', 1),
(826, 36, '2016-10-03 10:48:00', '0000-00-00 00:00:00', 1),
(827, 36, '2016-10-03 15:33:21', '0000-00-00 00:00:00', 1),
(828, 36, '2016-10-03 16:45:51', '0000-00-00 00:00:00', 1),
(829, 6, '2016-10-04 02:52:32', '0000-00-00 00:00:00', 1),
(830, 36, '2016-10-04 10:37:32', '0000-00-00 00:00:00', 1),
(831, 6, '2016-10-05 02:18:48', '0000-00-00 00:00:00', 1),
(832, 6, '2016-10-05 03:12:26', '0000-00-00 00:00:00', 1),
(833, 1, '2016-10-06 10:48:16', '0000-00-00 00:00:00', 1),
(834, 103, '2016-10-06 12:51:16', '0000-00-00 00:00:00', 1),
(835, 6, '2016-10-07 02:11:10', '0000-00-00 00:00:00', 1),
(836, 6, '2016-10-07 21:55:31', '0000-00-00 00:00:00', 1),
(837, 1, '2016-10-10 11:06:38', '0000-00-00 00:00:00', 1),
(838, 6, '2016-10-10 14:54:14', '0000-00-00 00:00:00', 1),
(839, 1, '2016-10-10 16:08:09', '0000-00-00 00:00:00', 1),
(840, 1, '2016-10-10 16:24:23', '0000-00-00 00:00:00', 1),
(841, 1, '2016-10-10 16:24:23', '0000-00-00 00:00:00', 1),
(842, 1, '2016-10-10 16:24:23', '0000-00-00 00:00:00', 1),
(843, 1, '2016-10-10 16:24:23', '0000-00-00 00:00:00', 1),
(844, 1, '2016-10-10 16:24:23', '0000-00-00 00:00:00', 1),
(845, 1, '2016-10-10 16:24:23', '0000-00-00 00:00:00', 1),
(846, 1, '2016-10-10 16:24:23', '0000-00-00 00:00:00', 1),
(847, 1, '2016-10-10 16:24:23', '0000-00-00 00:00:00', 1),
(848, 1, '2016-10-10 18:25:34', '0000-00-00 00:00:00', 1),
(849, 6, '2016-10-12 10:44:40', '0000-00-00 00:00:00', 1),
(850, 50, '2016-10-12 10:59:46', '0000-00-00 00:00:00', 1),
(851, 50, '2016-10-12 10:59:47', '0000-00-00 00:00:00', 1),
(852, 6, '2016-10-12 11:27:18', '0000-00-00 00:00:00', 1),
(853, 50, '2016-10-12 12:11:54', '0000-00-00 00:00:00', 1),
(854, 50, '2016-10-12 13:24:57', '0000-00-00 00:00:00', 1),
(855, 1, '2016-10-12 13:26:40', '0000-00-00 00:00:00', 1),
(856, 36, '2016-10-12 14:18:57', '0000-00-00 00:00:00', 1),
(857, 103, '2016-10-12 17:03:43', '0000-00-00 00:00:00', 1),
(858, 103, '2016-10-12 17:05:48', '0000-00-00 00:00:00', 1),
(859, 103, '2016-10-12 17:12:08', '0000-00-00 00:00:00', 1),
(860, 94, '2016-10-12 17:28:10', '0000-00-00 00:00:00', 1),
(861, 36, '2016-10-13 10:15:29', '0000-00-00 00:00:00', 1),
(862, 103, '2016-10-13 11:22:35', '0000-00-00 00:00:00', 1),
(863, 103, '2016-10-13 11:57:07', '0000-00-00 00:00:00', 1),
(864, 103, '2016-10-13 12:43:58', '0000-00-00 00:00:00', 1),
(865, 103, '2016-10-13 12:51:48', '0000-00-00 00:00:00', 1),
(866, 4, '2016-10-13 14:44:41', '0000-00-00 00:00:00', 1),
(867, 103, '2016-10-13 14:46:56', '0000-00-00 00:00:00', 1),
(868, 4, '2016-10-13 14:49:26', '0000-00-00 00:00:00', 1),
(869, 4, '2016-10-13 14:51:44', '0000-00-00 00:00:00', 1),
(870, 94, '2016-10-13 14:58:22', '0000-00-00 00:00:00', 1);
INSERT INTO `sr_login_history` (`login_id`, `user_id`, `login_time`, `logout_time`, `status`) VALUES
(871, 94, '2016-10-13 14:59:00', '0000-00-00 00:00:00', 1),
(872, 103, '2016-10-13 15:05:01', '0000-00-00 00:00:00', 1),
(873, 94, '2016-10-13 15:08:57', '0000-00-00 00:00:00', 1),
(874, 50, '2016-10-13 15:43:48', '0000-00-00 00:00:00', 1),
(875, 94, '2016-10-13 16:10:31', '0000-00-00 00:00:00', 1),
(876, 50, '2016-10-13 16:14:05', '0000-00-00 00:00:00', 1),
(877, 103, '2016-10-13 16:14:52', '0000-00-00 00:00:00', 1),
(878, 4, '2016-10-13 16:18:11', '0000-00-00 00:00:00', 1),
(879, 105, '2016-10-13 16:59:45', '0000-00-00 00:00:00', 1),
(880, 103, '2016-10-13 17:18:22', '0000-00-00 00:00:00', 1),
(881, 50, '2016-10-13 17:19:36', '0000-00-00 00:00:00', 1),
(882, 6, '2016-10-14 02:41:33', '0000-00-00 00:00:00', 1),
(883, 6, '2016-10-14 02:42:56', '0000-00-00 00:00:00', 1),
(884, 50, '2016-10-14 10:08:13', '0000-00-00 00:00:00', 1),
(885, 105, '2016-10-14 12:46:37', '0000-00-00 00:00:00', 1),
(886, 50, '2016-10-14 12:49:43', '0000-00-00 00:00:00', 1),
(887, 50, '2016-10-14 12:57:19', '0000-00-00 00:00:00', 1),
(888, 103, '2016-10-14 13:08:52', '0000-00-00 00:00:00', 1),
(889, 50, '2016-10-14 15:25:38', '0000-00-00 00:00:00', 1),
(890, 50, '2016-10-14 16:40:20', '0000-00-00 00:00:00', 1),
(891, 103, '2016-10-14 16:46:50', '0000-00-00 00:00:00', 1),
(892, 50, '2016-10-14 17:19:05', '0000-00-00 00:00:00', 1),
(893, 50, '2016-10-15 11:17:45', '0000-00-00 00:00:00', 1),
(894, 104, '2016-10-15 11:33:12', '0000-00-00 00:00:00', 1),
(895, 50, '2016-10-15 12:12:03', '0000-00-00 00:00:00', 1),
(896, 50, '2016-10-15 13:33:50', '0000-00-00 00:00:00', 1),
(897, 50, '2016-10-17 11:02:54', '0000-00-00 00:00:00', 1),
(898, 50, '2016-10-17 14:53:06', '0000-00-00 00:00:00', 1),
(899, 50, '2016-10-17 15:47:36', '0000-00-00 00:00:00', 1),
(900, 103, '2016-10-17 16:11:34', '0000-00-00 00:00:00', 1),
(901, 109, '2016-10-17 16:55:36', '0000-00-00 00:00:00', 1),
(902, 50, '2016-10-18 11:43:47', '0000-00-00 00:00:00', 1),
(903, 50, '2016-10-18 11:53:58', '0000-00-00 00:00:00', 1),
(904, 50, '2016-10-18 12:23:10', '0000-00-00 00:00:00', 1),
(905, 6, '2016-10-19 01:46:52', '0000-00-00 00:00:00', 1),
(906, 6, '2016-10-19 01:51:45', '0000-00-00 00:00:00', 1),
(907, 109, '2016-10-19 10:02:26', '0000-00-00 00:00:00', 1),
(908, 6, '2016-10-19 10:02:54', '0000-00-00 00:00:00', 1),
(909, 109, '2016-10-19 10:29:43', '0000-00-00 00:00:00', 1),
(910, 103, '2016-10-19 12:36:54', '0000-00-00 00:00:00', 1),
(911, 50, '2016-10-19 12:38:48', '0000-00-00 00:00:00', 1),
(912, 103, '2016-10-19 12:53:45', '0000-00-00 00:00:00', 1),
(913, 109, '2016-10-19 12:55:00', '0000-00-00 00:00:00', 1),
(914, 103, '2016-10-19 17:01:45', '0000-00-00 00:00:00', 1),
(915, 103, '2016-10-20 10:10:05', '0000-00-00 00:00:00', 1),
(916, 1, '2016-10-20 10:14:56', '0000-00-00 00:00:00', 1),
(917, 109, '2016-10-20 10:30:27', '0000-00-00 00:00:00', 1),
(918, 109, '2016-10-20 11:08:31', '0000-00-00 00:00:00', 1),
(919, 1, '2016-10-20 11:20:51', '0000-00-00 00:00:00', 1),
(920, 109, '2016-10-20 11:33:33', '0000-00-00 00:00:00', 1),
(921, 8, '2016-10-20 11:58:22', '0000-00-00 00:00:00', 1),
(922, 109, '2016-10-20 12:59:12', '0000-00-00 00:00:00', 1),
(923, 109, '2016-10-24 13:04:42', '0000-00-00 00:00:00', 1),
(924, 6, '2016-10-24 13:39:07', '0000-00-00 00:00:00', 1),
(925, 6, '2016-10-24 13:41:11', '0000-00-00 00:00:00', 1),
(926, 109, '2016-10-24 13:56:16', '0000-00-00 00:00:00', 1),
(927, 6, '2016-10-24 14:06:55', '0000-00-00 00:00:00', 1),
(928, 107, '2016-10-24 14:10:09', '0000-00-00 00:00:00', 1),
(929, 107, '2016-10-24 15:05:00', '0000-00-00 00:00:00', 1),
(930, 6, '2016-10-24 15:05:29', '0000-00-00 00:00:00', 1),
(931, 103, '2016-10-24 15:41:34', '0000-00-00 00:00:00', 1),
(932, 36, '2016-10-24 16:37:59', '0000-00-00 00:00:00', 1),
(933, 6, '2016-10-24 20:10:14', '0000-00-00 00:00:00', 1),
(934, 94, '2016-10-24 21:03:14', '0000-00-00 00:00:00', 1),
(935, 109, '2016-10-25 07:55:36', '0000-00-00 00:00:00', 1),
(936, 107, '2016-10-25 10:26:59', '0000-00-00 00:00:00', 1),
(937, 107, '2016-10-25 10:43:55', '0000-00-00 00:00:00', 1),
(938, 107, '2016-10-25 10:51:45', '0000-00-00 00:00:00', 1),
(939, 36, '2016-10-25 11:08:57', '0000-00-00 00:00:00', 1),
(940, 103, '2016-10-25 11:14:49', '0000-00-00 00:00:00', 1),
(941, 109, '2016-10-25 11:20:04', '0000-00-00 00:00:00', 1),
(942, 6, '2016-10-25 11:20:36', '0000-00-00 00:00:00', 1),
(943, 6, '2016-10-25 11:20:37', '0000-00-00 00:00:00', 1),
(944, 50, '2016-10-25 13:18:17', '0000-00-00 00:00:00', 1),
(945, 94, '2016-10-25 13:19:14', '0000-00-00 00:00:00', 1),
(946, 94, '2016-10-25 13:19:15', '0000-00-00 00:00:00', 1),
(947, 50, '2016-10-25 13:25:51', '0000-00-00 00:00:00', 1),
(948, 5, '2016-10-25 13:27:37', '0000-00-00 00:00:00', 1),
(949, 8, '2016-10-25 13:28:18', '0000-00-00 00:00:00', 1),
(950, 103, '2016-10-25 15:29:21', '0000-00-00 00:00:00', 1),
(951, 103, '2016-10-26 12:05:06', '0000-00-00 00:00:00', 1),
(952, 6, '2016-10-26 14:09:28', '0000-00-00 00:00:00', 1),
(953, 107, '2016-10-26 14:11:37', '0000-00-00 00:00:00', 1),
(954, 109, '2016-10-26 14:13:36', '0000-00-00 00:00:00', 1),
(955, 109, '2016-10-26 14:58:58', '0000-00-00 00:00:00', 1),
(956, 113, '2016-10-26 16:25:50', '0000-00-00 00:00:00', 1),
(957, 107, '2016-10-26 16:30:46', '0000-00-00 00:00:00', 1),
(958, 109, '2016-10-27 10:32:40', '0000-00-00 00:00:00', 1),
(959, 107, '2016-10-27 10:33:31', '0000-00-00 00:00:00', 1),
(960, 6, '2016-10-27 10:34:55', '0000-00-00 00:00:00', 1),
(961, 94, '2016-10-27 22:26:57', '0000-00-00 00:00:00', 1),
(962, 94, '2016-10-27 22:26:57', '0000-00-00 00:00:00', 1),
(963, 1, '2016-11-08 10:45:17', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sr_not_interested`
--

CREATE TABLE IF NOT EXISTS `sr_not_interested` (
  `ni_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `not_intereset_user` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL,
  `status` tinyint(4) NOT NULL COMMENT '1:active,0:inactive',
  PRIMARY KEY (`ni_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `sr_not_interested`
--


-- --------------------------------------------------------

--
-- Table structure for table `sr_photo_comment`
--

CREATE TABLE IF NOT EXISTS `sr_photo_comment` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `comment` varchar(500) NOT NULL,
  `photo_id` int(11) NOT NULL,
  `commented_by` int(11) NOT NULL,
  `commented_on` datetime NOT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=112 ;

--
-- Dumping data for table `sr_photo_comment`
--

INSERT INTO `sr_photo_comment` (`comment_id`, `comment`, `photo_id`, `commented_by`, `commented_on`) VALUES
(1, 'nice pic...', 1, 1, '2015-09-02 19:49:36'),
(3, 'nice pic...', 18, 1, '2015-09-03 12:29:14'),
(4, 'comment1', 18, 1, '2015-09-03 19:40:16'),
(5, 'comment2', 17, 1, '2015-09-03 19:40:34'),
(6, 'comment3', 16, 1, '2015-09-03 19:41:07'),
(7, 'comment4', 19, 1, '2015-09-03 19:41:20'),
(8, 'nice', 16, 1, '2015-09-03 19:43:58'),
(11, 'nice pic', 33, 1, '2015-09-05 18:41:07'),
(12, 'hello', 34, 1, '2015-09-07 14:28:09'),
(13, 'Hello Gulshan... nice pics', 11, 4, '2015-09-15 12:57:53'),
(14, 'Hello.... How are you', 35, 4, '2015-09-15 12:59:07'),
(15, 'hello', 33, 4, '2015-09-15 12:59:20'),
(16, 'i want to rate this... how to do it', 33, 4, '2015-09-15 12:59:47'),
(17, 'gfyh', 35, 1, '2015-09-15 18:22:59'),
(19, 'hi\n', 15, 1, '2015-09-17 15:29:03'),
(20, 'hey... what happen to my pic... why it is srinked...', 11, 4, '2015-09-24 13:39:47'),
(21, 'Hello', 24, 4, '2015-09-24 14:49:05'),
(24, 'hello', 29, 4, '2015-09-24 15:31:36'),
(25, 'nice click', 28, 9, '2015-10-13 18:54:08'),
(26, 'good', 28, 9, '2015-10-13 18:54:34'),
(27, 'nice photo\n', 65, 20, '2015-10-23 12:54:48'),
(28, 'nice\n', 36, 10, '2015-10-29 12:46:09'),
(31, 'Hello\n', 15, 4, '2015-12-17 16:11:27'),
(39, '(:', 87, 1, '2016-02-05 10:25:12'),
(40, '(:(:', 87, 1, '2016-02-05 10:27:29'),
(41, '(::', 87, 1, '2016-02-05 10:27:41'),
(43, '5y5rtyr', 86, 1, '2016-02-06 11:54:55'),
(44, 'Hello', 86, 1, '2016-02-06 13:17:29'),
(46, 'Hello', 78, 38, '2016-02-09 14:42:34'),
(47, 'Hello', 122, 38, '2016-02-09 15:08:17'),
(48, 'Yo', 122, 6, '2016-02-13 17:34:41'),
(49, 'hello', 122, 6, '2016-02-13 17:34:47'),
(51, 'dfgfdgf', 122, 6, '2016-02-19 20:33:24'),
(52, 'hello shilpi.....nice pic....', 94, 34, '2016-02-21 02:07:00'),
(53, 'hi how are u.....', 11, 4, '2016-02-24 13:30:57'),
(54, 'greetings...', 15, 4, '2016-02-24 13:31:22'),
(55, 'hi', 24, 4, '2016-02-24 13:31:31'),
(56, 'welcome', 28, 4, '2016-02-24 13:31:43'),
(57, 'hmmm', 29, 4, '2016-02-24 13:31:51'),
(61, 'hey\n\n', 124, 6, '2016-03-21 02:31:40'),
(62, 'hello\n\nhello\n', 124, 6, '2016-03-21 02:31:46'),
(63, 'hi', 11, 4, '2016-04-11 11:48:04'),
(64, '   ', 170, 20, '2016-04-23 18:37:13'),
(65, 'scsdfd', 170, 20, '2016-04-23 18:39:43'),
(66, 'bb', 170, 20, '2016-04-23 18:45:07'),
(67, ':-*', 175, 1, '2016-04-25 15:34:56'),
(68, 'hello', 162, 1, '2016-04-25 15:50:43'),
(69, 'hey', 162, 1, '2016-04-25 16:00:39'),
(70, 'dsfd', 170, 1, '2016-04-25 16:44:12'),
(71, 'jhhh', 178, 20, '2016-04-25 16:51:49'),
(72, 'jjj', 179, 20, '2016-04-25 16:53:04'),
(73, 'h', 162, 1, '2016-04-25 17:20:23'),
(74, 'h', 94, 1, '2016-04-25 17:22:31'),
(75, 'nice pic...', 131, 1, '2016-05-11 12:54:36'),
(78, 'tg', 85, 36, '2016-06-03 13:12:57'),
(79, 'hello DD', 85, 36, '2016-06-04 17:09:05'),
(80, 'Nice Pci', 170, 1, '2016-06-13 12:07:21'),
(81, 'Very Good Pic', 170, 1, '2016-06-13 12:07:43'),
(82, 'looks good', 234, 86, '2016-07-05 12:32:13'),
(83, 'HI', 28, 9, '2016-07-11 17:09:04'),
(84, 'nice pic', 245, 92, '2016-07-22 11:45:29'),
(85, 'Nice Photo', 192, 94, '2016-08-10 14:50:46'),
(90, 'gggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggg', 97, 6, '2016-08-16 19:21:29'),
(91, 'hello', 132, 6, '2016-08-16 19:29:26'),
(92, 'gdgdfsgdfs', 192, 36, '2016-09-05 16:14:20'),
(93, 'nice', 24, 94, '2016-10-12 18:03:48'),
(94, 'nice', 280, 103, '2016-10-13 16:31:47'),
(95, ':D', 77, 103, '2016-10-13 16:33:06'),
(96, 'dddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnndddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddkkkkkkkkkkkkkkkkkkkkkk', 77, 105, '2016-10-13 17:02:29'),
(97, 'Nice', 24, 103, '2016-10-14 13:37:39'),
(98, 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaahhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhddddddddddddddddddddddddddddddddddddddddddddddddddddddddbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk', 122, 104, '2016-10-15 11:35:41'),
(99, 'jkjhgjhgjdsgsdhgkjsdnsjkgkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkknnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnniiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiii', 136, 50, '2016-10-15 12:12:28'),
(100, 'igyttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttt', 233, 50, '2016-10-15 12:42:17'),
(101, 'bvbvcnvcn', 233, 50, '2016-10-15 12:44:29'),
(102, 'nvcnvcvcnvcn jcxvxhjb hjhbvcbhcbcxhb vcbcxnbn nbcnbcxn bncbnbbuhghgkjgygdgpocf jbcbhygbnj', 233, 50, '2016-10-15 12:44:45'),
(103, 'jfjgfjgfjgfjgf', 136, 50, '2016-10-15 13:30:49'),
(104, 'hgfhgfgfioht,ngfhhfjhfgnhfgnhibfdhgdfngffugdcjjhugfdngigfmfbgfdudgbmnmfhdugdgndfgjuoidgdndhyundhjotihjhoihoithnkjtthtyh', 136, 50, '2016-10-15 13:31:03'),
(105, 'ggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvv', 111, 50, '2016-10-15 13:34:51'),
(106, 'hello', 289, 6, '2016-10-26 15:57:52'),
(107, 'guitar man', 289, 6, '2016-10-26 15:58:01'),
(108, 'nice..', 97, 107, '2016-10-26 15:58:11'),
(109, 'Hey', 97, 107, '2016-10-26 16:00:10'),
(110, 'great pic', 97, 107, '2016-10-26 16:00:20'),
(111, 'Nice pic!', 97, 6, '2016-10-26 16:07:31');

-- --------------------------------------------------------

--
-- Table structure for table `sr_photo_rating`
--

CREATE TABLE IF NOT EXISTS `sr_photo_rating` (
  `rating_id` int(11) NOT NULL AUTO_INCREMENT,
  `photo_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `rated_by` int(11) NOT NULL,
  `rated_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL,
  PRIMARY KEY (`rating_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=407 ;

--
-- Dumping data for table `sr_photo_rating`
--

INSERT INTO `sr_photo_rating` (`rating_id`, `photo_id`, `rating`, `rated_by`, `rated_on`, `updated_on`) VALUES
(1, 15, 4, 1, '2015-09-25 12:27:52', '2016-06-13 11:28:20'),
(2, 40, 4, 1, '2015-09-25 12:30:52', '2016-06-13 11:29:12'),
(3, 33, 9, 4, '2015-09-25 12:31:17', '2015-09-25 12:31:17'),
(4, 34, 6, 4, '2015-09-25 12:31:22', '2015-09-25 12:31:22'),
(5, 33, 10, 8, '2015-09-25 12:31:24', '2015-09-25 12:31:24'),
(6, 35, 9, 4, '2015-09-25 12:31:26', '2015-09-25 12:31:26'),
(7, 36, 8, 4, '2015-09-25 12:31:30', '2015-09-25 12:31:30'),
(8, 45, 6, 1, '2015-09-25 12:46:22', '2015-09-25 12:46:22'),
(9, 46, 7, 1, '2015-09-25 12:46:28', '2015-09-25 12:46:28'),
(10, 47, 3, 1, '2015-09-25 12:46:36', '2015-09-25 12:46:36'),
(11, 48, 10, 1, '2015-09-25 12:46:51', '2015-09-25 12:46:51'),
(12, 49, 7, 1, '2015-09-25 12:47:03', '2015-09-25 12:47:03'),
(13, 50, 4, 1, '2015-09-25 12:47:13', '2015-09-25 12:47:13'),
(14, 51, 10, 1, '2015-09-25 12:47:19', '2015-09-25 12:47:19'),
(15, 52, 10, 1, '2015-09-25 12:47:23', '2015-09-25 12:47:23'),
(16, 40, 10, 8, '2015-09-25 12:51:17', '2015-09-25 12:51:17'),
(17, 45, 9, 8, '2015-09-25 12:51:56', '2015-09-25 12:51:56'),
(18, 15, 6, 5, '2015-09-25 12:54:05', '2015-09-25 12:54:05'),
(19, 33, 5, 5, '2015-09-25 12:54:13', '2015-09-25 12:54:13'),
(20, 34, 3, 5, '2015-09-25 12:54:20', '2015-09-25 12:54:20'),
(21, 35, 8, 5, '2015-09-25 12:54:26', '2015-09-25 12:54:26'),
(22, 36, 4, 5, '2015-09-25 12:54:36', '2015-09-25 12:54:36'),
(23, 40, 5, 5, '2015-09-25 12:54:41', '2015-09-25 12:54:41'),
(24, 45, 10, 5, '2015-09-25 12:54:46', '2015-09-25 12:54:46'),
(25, 46, 3, 5, '2015-09-25 12:54:54', '2015-09-25 12:54:54'),
(26, 47, 2, 5, '2015-09-25 12:55:04', '2015-09-25 12:55:04'),
(27, 48, 8, 5, '2015-09-25 12:55:10', '2015-09-25 12:55:10'),
(28, 49, 8, 5, '2015-09-25 12:55:23', '2015-09-25 12:55:23'),
(29, 50, 5, 5, '2015-09-25 12:55:27', '2015-09-25 12:55:27'),
(30, 51, 10, 5, '2015-09-25 12:55:38', '2015-09-25 12:55:38'),
(31, 52, 6, 5, '2015-09-25 12:55:48', '2015-09-25 12:55:48'),
(32, 12, 5, 1, '2015-09-25 12:56:52', '2015-09-25 12:56:52'),
(33, 12, 7, 4, '2015-09-25 13:03:05', '2015-09-25 13:03:05'),
(34, 12, 8, 9, '2015-10-13 18:49:56', '2015-10-13 18:49:56'),
(35, 15, 8, 9, '2015-10-13 18:50:03', '2015-10-13 18:50:03'),
(36, 33, 9, 9, '2015-10-13 18:50:07', '2015-10-13 18:50:07'),
(37, 34, 6, 9, '2015-10-13 18:50:12', '2015-10-13 18:50:12'),
(38, 35, 8, 9, '2015-10-13 18:50:17', '2015-10-13 18:50:17'),
(39, 36, 7, 9, '2015-10-13 18:51:09', '2015-10-13 18:51:09'),
(40, 40, 10, 9, '2015-10-13 18:51:17', '2015-10-13 18:51:17'),
(41, 45, 10, 9, '2015-10-13 18:51:23', '2015-10-13 18:51:23'),
(42, 46, 8, 9, '2015-10-13 18:51:33', '2015-10-13 18:51:33'),
(43, 47, 4, 9, '2015-10-13 18:51:40', '2015-10-13 18:51:40'),
(44, 48, 10, 9, '2015-10-13 18:51:47', '2015-10-13 18:51:47'),
(45, 49, 6, 9, '2015-10-13 18:51:58', '2015-10-13 18:51:58'),
(46, 50, 7, 9, '2015-10-13 18:52:10', '2015-10-13 18:52:10'),
(47, 51, 9, 9, '2015-10-13 18:52:18', '2015-10-13 18:52:18'),
(48, 52, 6, 9, '2015-10-13 18:52:26', '2015-10-13 18:52:26'),
(49, 64, 8, 4, '2015-10-13 18:56:13', '2015-10-13 18:56:13'),
(50, 12, 8, 20, '2015-10-30 16:11:47', '2015-10-30 16:11:47'),
(51, 15, 6, 20, '2015-10-30 16:12:16', '2015-10-30 16:12:16'),
(52, 33, 8, 20, '2015-10-30 16:12:28', '2015-10-30 16:12:28'),
(53, 33, 9, 36, '2015-11-03 16:53:06', '2015-11-03 16:53:06'),
(54, 12, 7, 27, '2015-11-06 07:47:19', '2015-11-06 07:47:19'),
(55, 15, 9, 27, '2015-11-06 07:47:22', '2015-11-06 07:47:22'),
(56, 33, 9, 27, '2015-11-06 07:47:24', '2015-11-06 07:47:24'),
(57, 34, 9, 27, '2015-11-06 07:47:26', '2015-11-06 07:47:26'),
(58, 35, 9, 27, '2015-11-06 07:47:28', '2015-11-06 07:47:28'),
(59, 36, 9, 27, '2015-11-06 07:47:30', '2015-11-06 07:47:30'),
(60, 40, 8, 27, '2015-11-06 07:47:33', '2015-11-06 07:47:33'),
(61, 45, 8, 27, '2015-11-06 07:47:35', '2015-11-06 07:47:35'),
(62, 46, 8, 27, '2015-11-06 07:47:38', '2015-11-06 07:47:38'),
(63, 47, 8, 27, '2015-11-06 07:47:42', '2015-11-06 07:47:42'),
(64, 48, 9, 27, '2015-11-06 07:47:51', '2015-11-06 07:47:51'),
(65, 49, 6, 27, '2015-11-06 07:47:57', '2015-11-06 07:47:57'),
(66, 50, 9, 27, '2015-11-06 07:48:00', '2015-11-06 07:48:00'),
(67, 51, 10, 27, '2015-11-06 07:48:02', '2015-11-06 07:48:02'),
(68, 52, 10, 27, '2015-11-06 07:48:04', '2015-11-06 07:48:04'),
(69, 64, 8, 27, '2015-11-06 07:48:43', '2015-11-06 07:48:43'),
(70, 69, 9, 4, '2015-11-06 14:14:26', '2015-11-06 14:14:26'),
(71, 71, 6, 4, '2015-11-06 14:14:35', '2015-11-06 14:14:35'),
(72, 70, 4, 4, '2015-11-06 14:14:41', '2015-11-06 14:14:41'),
(73, 72, 4, 4, '2015-11-06 14:14:59', '2015-11-06 14:14:59'),
(74, 83, 10, 4, '2015-11-06 14:15:39', '2016-02-12 12:08:24'),
(75, 40, 6, 20, '2015-11-06 14:21:52', '2015-11-06 14:21:52'),
(76, 12, 10, 6, '2015-11-14 18:08:16', '2015-11-14 18:08:16'),
(77, 15, 10, 6, '2015-11-14 18:08:34', '2015-11-14 18:08:34'),
(78, 33, 6, 6, '2015-11-14 18:09:03', '2015-11-14 18:09:03'),
(79, 54, 1, 27, '2015-12-17 16:07:40', '2015-12-17 16:07:40'),
(80, 71, 3, 27, '2015-12-17 16:07:42', '2015-12-17 16:07:42'),
(81, 72, 8, 27, '2015-12-17 16:08:09', '2015-12-17 16:08:09'),
(82, 69, 6, 27, '2015-12-17 16:08:17', '2015-12-17 16:08:17'),
(83, 70, 6, 27, '2015-12-17 16:08:21', '2015-12-17 16:08:21'),
(84, 87, 10, 4, '2015-12-17 18:34:01', '2015-12-17 18:34:01'),
(85, 69, 10, 6, '2016-02-03 21:23:17', '2016-02-03 21:23:17'),
(86, 40, 10, 6, '2016-02-03 21:23:57', '2016-02-03 21:23:57'),
(87, 45, 10, 6, '2016-02-03 21:25:22', '2016-02-03 21:25:22'),
(88, 12, 10, 56, '2016-02-04 21:15:22', '2016-02-04 21:15:22'),
(89, 15, 10, 56, '2016-02-04 21:15:29', '2016-02-04 21:15:29'),
(90, 40, 10, 56, '2016-02-04 21:15:41', '2016-02-04 21:15:41'),
(91, 45, 10, 56, '2016-02-04 21:15:50', '2016-02-04 21:15:50'),
(92, 46, 10, 56, '2016-02-04 21:15:57', '2016-02-04 21:15:57'),
(93, 47, 10, 56, '2016-02-04 21:16:02', '2016-02-04 21:16:02'),
(94, 48, 10, 56, '2016-02-04 21:16:07', '2016-02-04 21:16:07'),
(95, 49, 10, 56, '2016-02-04 21:16:14', '2016-02-04 21:16:14'),
(96, 50, 10, 56, '2016-02-04 21:16:23', '2016-02-04 21:16:23'),
(97, 51, 10, 56, '2016-02-04 21:16:29', '2016-02-04 21:16:29'),
(98, 46, 10, 6, '2016-02-04 21:21:49', '2016-02-04 21:21:49'),
(99, 47, 10, 6, '2016-02-04 21:21:56', '2016-02-04 21:21:56'),
(100, 48, 10, 6, '2016-02-04 21:22:01', '2016-02-04 21:22:01'),
(101, 49, 10, 6, '2016-02-04 21:22:09', '2016-02-04 21:22:09'),
(102, 50, 10, 6, '2016-02-04 21:22:55', '2016-02-04 21:22:55'),
(103, 51, 10, 6, '2016-02-04 21:23:04', '2016-02-04 21:23:04'),
(104, 52, 10, 6, '2016-02-04 21:23:13', '2016-02-04 21:23:13'),
(105, 115, 10, 6, '2016-02-04 21:23:30', '2016-02-04 21:23:30'),
(106, 12, 10, 38, '2016-02-09 14:44:19', '2016-02-09 14:44:19'),
(107, 15, 6, 38, '2016-02-09 14:44:31', '2016-02-09 14:44:31'),
(108, 40, 7, 38, '2016-02-09 14:44:42', '2016-02-09 14:44:42'),
(109, 45, 8, 38, '2016-02-09 14:44:54', '2016-02-09 14:44:54'),
(110, 46, 10, 38, '2016-02-09 14:45:05', '2016-02-09 14:45:05'),
(111, 47, 7, 38, '2016-02-09 14:45:56', '2016-02-09 14:45:56'),
(112, 48, 10, 38, '2016-02-09 14:46:13', '2016-02-09 14:46:13'),
(113, 49, 5, 38, '2016-02-09 14:46:20', '2016-02-09 14:46:20'),
(114, 50, 10, 38, '2016-02-09 14:46:38', '2016-02-09 14:46:38'),
(115, 51, 6, 38, '2016-02-09 14:46:45', '2016-02-09 14:46:45'),
(116, 52, 10, 38, '2016-02-09 14:47:06', '2016-02-09 14:47:06'),
(117, 54, 6, 38, '2016-02-09 14:47:20', '2016-02-09 14:47:20'),
(118, 64, 6, 38, '2016-02-09 14:48:04', '2016-02-09 14:48:04'),
(119, 71, 7, 38, '2016-02-09 14:55:06', '2016-02-09 14:55:06'),
(120, 69, 7, 38, '2016-02-09 14:55:12', '2016-02-09 14:55:12'),
(121, 70, 7, 38, '2016-02-09 14:55:33', '2016-02-09 14:55:33'),
(122, 72, 7, 38, '2016-02-09 14:55:39', '2016-02-09 14:55:39'),
(123, 83, 10, 38, '2016-02-09 14:55:57', '2016-02-09 14:55:57'),
(124, 87, 10, 38, '2016-02-09 14:56:04', '2016-02-09 14:56:04'),
(125, 115, 8, 38, '2016-02-09 14:56:22', '2016-02-09 14:56:22'),
(126, 115, 5, 4, '2016-02-12 12:08:33', '2016-02-12 12:08:33'),
(127, 139, 10, 4, '2016-02-12 12:08:39', '2016-02-12 12:08:39'),
(128, 140, 10, 4, '2016-02-12 12:08:43', '2016-02-12 12:08:43'),
(129, 50, 10, 34, '2016-02-20 10:33:25', '2016-02-20 10:33:25'),
(130, 83, 10, 34, '2016-02-20 10:34:38', '2016-02-20 10:34:38'),
(131, 12, 3, 34, '2016-02-25 10:57:55', '2016-02-25 10:57:55'),
(132, 15, 4, 34, '2016-02-25 10:58:00', '2016-02-25 10:58:00'),
(133, 40, 1, 34, '2016-02-25 10:58:04', '2016-02-25 10:58:04'),
(134, 45, 4, 34, '2016-02-25 10:58:12', '2016-02-25 10:58:12'),
(135, 46, 4, 34, '2016-02-25 11:00:03', '2016-02-25 11:00:03'),
(136, 47, 1, 34, '2016-02-25 11:00:11', '2016-02-25 11:00:11'),
(137, 48, 5, 34, '2016-02-25 11:00:19', '2016-02-25 11:00:19'),
(138, 49, 3, 34, '2016-02-25 11:00:26', '2016-02-25 11:00:26'),
(139, 51, 4, 34, '2016-02-25 11:01:33', '2016-02-25 11:01:33'),
(140, 52, 8, 34, '2016-02-25 11:26:00', '2016-02-25 11:26:00'),
(141, 54, 2, 34, '2016-02-25 11:26:11', '2016-02-25 11:26:11'),
(142, 64, 4, 34, '2016-02-25 11:26:20', '2016-02-25 11:26:20'),
(143, 69, 4, 34, '2016-02-25 11:26:29', '2016-02-25 11:26:29'),
(144, 71, 5, 34, '2016-02-25 11:26:33', '2016-02-25 11:26:33'),
(145, 70, 4, 34, '2016-02-25 11:26:38', '2016-02-25 11:26:38'),
(146, 72, 4, 34, '2016-02-25 11:26:44', '2016-02-25 11:26:44'),
(147, 87, 10, 34, '2016-02-25 11:26:49', '2016-02-25 11:26:49'),
(148, 115, 8, 34, '2016-02-25 11:26:57', '2016-02-25 11:26:57'),
(149, 139, 6, 34, '2016-02-25 11:27:45', '2016-02-25 11:27:45'),
(150, 140, 9, 34, '2016-02-25 11:28:01', '2016-02-25 11:28:01'),
(151, 54, 10, 6, '2016-02-29 02:48:41', '2016-02-29 02:48:41'),
(152, 64, 10, 6, '2016-03-12 17:51:49', '2016-03-12 17:51:49'),
(153, 12, 6, 55, '2016-04-07 10:57:30', '2016-04-07 10:57:30'),
(154, 40, 7, 55, '2016-04-07 10:57:43', '2016-04-07 10:57:43'),
(155, 15, 8, 55, '2016-04-07 10:57:46', '2016-04-07 10:57:46'),
(156, 45, 7, 55, '2016-04-07 10:57:54', '2016-04-07 10:57:54'),
(157, 115, 10, 27, '2016-04-08 19:18:47', '2016-04-08 19:18:47'),
(158, 139, 7, 27, '2016-04-08 19:18:53', '2016-04-08 19:18:53'),
(159, 140, 8, 27, '2016-04-08 19:18:58', '2016-04-08 19:18:58'),
(160, 156, 7, 4, '2016-04-11 11:26:50', '2016-04-11 11:26:50'),
(161, 159, 7, 4, '2016-04-11 11:26:57', '2016-04-11 11:26:57'),
(162, 45, 4, 20, '2016-04-23 16:26:27', '2016-04-23 16:26:27'),
(163, 156, 10, 6, '2016-05-11 02:33:15', '2016-05-11 02:33:15'),
(164, 159, 10, 6, '2016-05-11 02:33:17', '2016-05-11 02:33:17'),
(165, 138, 8, 36, '2016-06-03 11:33:26', '2016-06-03 12:55:36'),
(166, 69, 4, 36, '2016-06-03 11:33:38', '2016-06-06 12:28:38'),
(167, 164, 10, 36, '2016-06-03 12:50:19', '2016-06-03 12:50:19'),
(168, 115, 6, 36, '2016-06-03 12:50:27', '2016-06-04 16:33:08'),
(169, 156, 8, 36, '2016-06-03 12:50:45', '2016-06-03 12:50:45'),
(170, 159, 9, 36, '2016-06-03 12:50:56', '2016-06-03 12:50:56'),
(171, 12, 6, 36, '2016-06-03 12:51:10', '2016-06-06 12:36:00'),
(172, 15, 6, 36, '2016-06-03 12:51:15', '2016-06-06 12:36:39'),
(173, 40, 1, 36, '2016-06-03 12:51:19', '2016-06-06 12:37:28'),
(174, 45, 8, 36, '2016-06-03 12:51:27', '2016-06-06 12:38:13'),
(175, 46, 7, 36, '2016-06-03 12:51:40', '2016-06-06 12:38:23'),
(176, 47, 7, 36, '2016-06-03 12:51:45', '2016-06-06 12:38:32'),
(177, 48, 8, 36, '2016-06-03 12:51:54', '2016-06-06 12:38:43'),
(178, 49, 8, 36, '2016-06-03 12:51:59', '2016-06-06 12:38:54'),
(179, 50, 8, 36, '2016-06-03 12:52:03', '2016-06-06 12:39:08'),
(180, 51, 9, 36, '2016-06-03 12:52:06', '2016-06-03 12:52:06'),
(181, 52, 2, 36, '2016-06-03 12:52:12', '2016-06-03 12:52:12'),
(182, 54, 3, 36, '2016-06-03 12:52:16', '2016-06-03 12:52:16'),
(183, 64, 8, 36, '2016-06-03 12:52:22', '2016-06-03 12:52:22'),
(184, 71, 8, 36, '2016-06-03 12:52:31', '2016-06-03 12:52:31'),
(185, 72, 1, 36, '2016-06-03 12:52:37', '2016-06-03 12:52:37'),
(186, 70, 7, 36, '2016-06-03 12:52:49', '2016-06-06 12:30:24'),
(187, 83, 10, 36, '2016-06-03 12:52:54', '2016-06-03 12:52:54'),
(188, 87, 8, 36, '2016-06-03 12:53:01', '2016-06-03 12:53:01'),
(189, 139, 9, 36, '2016-06-03 12:53:06', '2016-06-03 12:53:06'),
(190, 140, 9, 36, '2016-06-03 12:53:10', '2016-06-03 12:53:10'),
(191, 111, 6, 36, '2016-06-03 12:54:20', '2016-06-03 12:54:20'),
(192, 137, 8, 36, '2016-06-03 12:55:00', '2016-06-03 12:55:00'),
(193, 136, 1, 36, '2016-06-03 12:55:57', '2016-06-03 12:55:57'),
(194, 176, 9, 36, '2016-06-03 12:56:32', '2016-06-03 12:56:32'),
(195, 200, 7, 36, '2016-06-04 16:32:02', '2016-06-04 16:32:02'),
(196, 113, 3, 36, '2016-06-04 16:32:32', '2016-06-04 16:32:32'),
(197, 114, 4, 36, '2016-06-04 16:32:53', '2016-06-04 16:32:53'),
(198, 125, 6, 36, '2016-06-04 16:33:25', '2016-06-04 16:33:25'),
(199, 126, 6, 36, '2016-06-04 16:33:42', '2016-06-04 16:33:42'),
(200, 127, 6, 36, '2016-06-04 16:33:52', '2016-06-04 16:33:52'),
(201, 128, 9, 36, '2016-06-04 16:34:03', '2016-06-04 16:34:03'),
(202, 129, 7, 36, '2016-06-04 16:34:18', '2016-06-04 16:34:18'),
(203, 130, 7, 36, '2016-06-04 16:34:34', '2016-06-04 16:34:34'),
(204, 94, 6, 36, '2016-06-04 16:35:18', '2016-06-04 16:35:18'),
(205, 77, 7, 36, '2016-06-04 16:35:36', '2016-06-04 16:35:36'),
(206, 175, 8, 36, '2016-06-04 16:35:57', '2016-06-04 16:35:57'),
(207, 178, 7, 36, '2016-06-04 16:36:08', '2016-06-04 16:36:08'),
(208, 59, 8, 36, '2016-06-04 16:39:45', '2016-06-06 12:28:25'),
(209, 62, 7, 36, '2016-06-04 16:41:29', '2016-06-04 16:41:29'),
(210, 63, 7, 36, '2016-06-04 16:42:01', '2016-06-04 16:42:28'),
(211, 73, 6, 36, '2016-06-04 16:42:46', '2016-06-04 16:42:46'),
(212, 24, 6, 36, '2016-06-04 16:43:29', '2016-06-06 12:36:50'),
(213, 28, 7, 36, '2016-06-04 16:43:50', '2016-06-06 12:37:02'),
(214, 26, 6, 36, '2016-06-04 16:44:12', '2016-06-06 12:37:13'),
(215, 42, 5, 36, '2016-06-04 16:44:37', '2016-06-06 12:37:40'),
(216, 43, 7, 36, '2016-06-04 16:45:01', '2016-06-06 12:37:53'),
(217, 44, 6, 36, '2016-06-04 16:45:17', '2016-06-06 12:38:03'),
(218, 196, 10, 72, '2016-06-04 17:05:31', '2016-06-04 17:05:31'),
(219, 192, 10, 72, '2016-06-04 17:05:44', '2016-06-04 17:05:44'),
(220, 85, 10, 72, '2016-06-04 17:05:57', '2016-06-04 17:05:57'),
(221, 193, 10, 72, '2016-06-04 17:06:08', '2016-06-04 17:06:08'),
(222, 196, 10, 73, '2016-06-04 17:34:51', '2016-06-04 17:34:51'),
(223, 192, 10, 73, '2016-06-04 17:35:08', '2016-06-04 17:35:08'),
(224, 85, 10, 73, '2016-06-04 17:35:26', '2016-06-04 17:35:26'),
(225, 193, 10, 73, '2016-06-04 17:35:43', '2016-06-04 17:35:43'),
(226, 12, 6, 73, '2016-06-04 17:36:18', '2016-06-04 17:36:18'),
(227, 15, 6, 73, '2016-06-04 17:36:23', '2016-06-04 17:36:23'),
(228, 40, 6, 73, '2016-06-04 17:36:28', '2016-06-04 17:36:28'),
(229, 45, 6, 73, '2016-06-04 17:36:43', '2016-06-04 17:36:43'),
(230, 46, 6, 73, '2016-06-04 17:36:58', '2016-06-04 17:36:58'),
(231, 47, 6, 73, '2016-06-04 17:37:12', '2016-06-04 17:37:12'),
(232, 48, 6, 73, '2016-06-04 17:37:23', '2016-06-04 17:37:23'),
(233, 49, 6, 73, '2016-06-04 17:37:33', '2016-06-04 17:37:33'),
(234, 50, 7, 73, '2016-06-04 17:38:26', '2016-06-04 17:38:30'),
(235, 51, 7, 73, '2016-06-04 17:38:35', '2016-06-04 17:38:36'),
(236, 52, 7, 73, '2016-06-04 17:38:42', '2016-06-04 17:38:42'),
(237, 54, 7, 73, '2016-06-04 17:38:49', '2016-06-04 17:38:50'),
(238, 64, 7, 73, '2016-06-04 17:38:55', '2016-06-04 17:38:55'),
(239, 69, 7, 73, '2016-06-04 17:39:05', '2016-06-04 17:39:06'),
(240, 71, 7, 73, '2016-06-04 17:39:17', '2016-06-04 17:39:19'),
(241, 70, 7, 73, '2016-06-04 17:39:25', '2016-06-04 17:39:25'),
(242, 72, 7, 73, '2016-06-04 17:39:34', '2016-06-04 17:39:34'),
(243, 83, 7, 73, '2016-06-04 17:39:41', '2016-06-04 17:39:41'),
(244, 87, 7, 73, '2016-06-04 17:39:57', '2016-06-04 17:39:57'),
(245, 115, 7, 73, '2016-06-04 17:40:03', '2016-06-04 17:40:03'),
(246, 139, 7, 73, '2016-06-04 17:40:13', '2016-06-04 17:40:14'),
(247, 140, 7, 73, '2016-06-04 17:40:21', '2016-06-04 17:40:21'),
(248, 156, 7, 73, '2016-06-04 17:40:30', '2016-06-04 17:40:30'),
(249, 159, 7, 73, '2016-06-04 17:40:39', '2016-06-04 17:40:39'),
(250, 88, 5, 73, '2016-06-04 17:41:15', '2016-06-04 17:41:15'),
(251, 209, 10, 73, '2016-06-04 17:46:00', '2016-06-04 17:46:00'),
(252, 196, 10, 74, '2016-06-04 17:52:16', '2016-06-04 17:52:16'),
(253, 192, 10, 74, '2016-06-04 17:52:32', '2016-06-04 17:52:32'),
(254, 85, 10, 74, '2016-06-04 17:52:48', '2016-06-04 17:52:48'),
(255, 193, 10, 74, '2016-06-04 17:53:06', '2016-06-04 17:53:06'),
(256, 209, 10, 74, '2016-06-04 17:53:23', '2016-06-04 17:53:25'),
(257, 196, 10, 75, '2016-06-04 18:00:24', '2016-06-04 18:00:24'),
(258, 192, 10, 75, '2016-06-04 18:00:38', '2016-06-04 18:00:38'),
(259, 85, 10, 75, '2016-06-04 18:00:53', '2016-06-04 18:00:53'),
(260, 193, 10, 75, '2016-06-04 18:01:08', '2016-06-04 18:01:08'),
(261, 209, 10, 75, '2016-06-04 18:01:24', '2016-06-04 18:01:24'),
(262, 196, 10, 76, '2016-06-04 18:11:25', '2016-06-04 18:11:25'),
(263, 201, 8, 36, '2016-06-06 12:27:13', '2016-06-06 12:27:13'),
(264, 206, 8, 36, '2016-06-06 12:27:17', '2016-06-06 12:27:17'),
(265, 207, 8, 36, '2016-06-06 12:27:21', '2016-06-06 12:27:21'),
(266, 208, 8, 36, '2016-06-06 12:27:25', '2016-06-06 12:27:25'),
(267, 202, 8, 36, '2016-06-06 12:27:39', '2016-06-06 12:27:39'),
(268, 203, 8, 36, '2016-06-06 12:27:50', '2016-06-06 12:27:50'),
(269, 65, 7, 36, '2016-06-06 12:29:25', '2016-06-06 12:29:25'),
(270, 66, 7, 36, '2016-06-06 12:29:38', '2016-06-06 12:29:38'),
(271, 67, 7, 36, '2016-06-06 12:30:01', '2016-06-06 12:30:01'),
(272, 68, 7, 36, '2016-06-06 12:30:14', '2016-06-06 12:30:14'),
(273, 11, 6, 36, '2016-06-06 12:35:46', '2016-06-06 12:35:46'),
(274, 74, 10, 36, '2016-06-06 12:36:10', '2016-06-06 12:36:10'),
(275, 113, 3, 1, '2016-06-13 11:15:30', '2016-06-13 11:15:30'),
(276, 54, 3, 1, '2016-06-13 11:15:34', '2016-06-13 11:15:34'),
(277, 64, 3, 1, '2016-06-13 11:15:39', '2016-06-13 11:15:39'),
(278, 69, 3, 1, '2016-06-13 11:15:44', '2016-06-13 11:15:44'),
(279, 71, 3, 1, '2016-06-13 11:15:48', '2016-06-13 11:15:49'),
(280, 70, 3, 1, '2016-06-13 11:15:53', '2016-06-13 11:15:53'),
(281, 72, 3, 1, '2016-06-13 11:15:57', '2016-06-13 11:15:57'),
(282, 83, 3, 1, '2016-06-13 11:16:02', '2016-06-13 11:16:02'),
(283, 85, 3, 1, '2016-06-13 11:16:07', '2016-06-13 11:16:07'),
(284, 87, 3, 1, '2016-06-13 11:16:12', '2016-06-13 11:16:12'),
(285, 115, 4, 1, '2016-06-13 11:16:16', '2016-06-13 11:22:22'),
(286, 140, 4, 1, '2016-06-13 11:18:32', '2016-06-13 11:18:32'),
(287, 139, 3, 1, '2016-06-13 11:18:39', '2016-06-13 11:18:39'),
(288, 156, 3, 1, '2016-06-13 11:18:49', '2016-06-13 11:18:49'),
(289, 159, 3, 1, '2016-06-13 11:18:55', '2016-06-13 11:18:55'),
(290, 192, 4, 1, '2016-06-13 11:19:01', '2016-06-13 11:19:01'),
(291, 193, 4, 1, '2016-06-13 11:19:07', '2016-06-13 11:19:07'),
(292, 206, 4, 1, '2016-06-13 11:19:13', '2016-06-13 11:19:13'),
(293, 207, 4, 1, '2016-06-13 11:19:20', '2016-06-13 11:19:20'),
(294, 208, 4, 1, '2016-06-13 11:19:27', '2016-06-13 11:19:27'),
(295, 209, 4, 1, '2016-06-13 11:19:32', '2016-06-13 11:19:32'),
(296, 125, 3, 1, '2016-06-13 11:25:16', '2016-06-13 11:25:16'),
(297, 24, 3, 1, '2016-06-13 11:28:31', '2016-06-13 11:28:31'),
(298, 28, 4, 1, '2016-06-13 11:28:44', '2016-06-13 11:28:44'),
(299, 26, 4, 1, '2016-06-13 11:28:57', '2016-06-13 11:28:57'),
(300, 42, 8, 1, '2016-06-13 11:29:23', '2016-06-13 11:29:50'),
(301, 43, 5, 1, '2016-06-13 11:30:23', '2016-06-13 11:30:23'),
(302, 44, 6, 1, '2016-06-13 11:30:29', '2016-06-13 11:30:29'),
(303, 170, 1, 80, '2016-06-13 11:59:49', '2016-06-13 12:00:40'),
(304, 12, 1, 80, '2016-06-13 11:59:56', '2016-06-13 11:59:56'),
(305, 15, 1, 80, '2016-06-13 12:00:46', '2016-06-13 12:00:46'),
(306, 176, 1, 80, '2016-06-13 12:01:05', '2016-06-13 12:01:05'),
(307, 12, 7, 86, '2016-07-05 13:59:16', '2016-07-05 13:59:16'),
(308, 15, 8, 86, '2016-07-05 13:59:25', '2016-07-05 13:59:25'),
(309, 40, 8, 86, '2016-07-05 13:59:34', '2016-07-05 13:59:34'),
(310, 45, 8, 86, '2016-07-05 13:59:52', '2016-07-05 13:59:52'),
(311, 46, 8, 86, '2016-07-05 14:04:46', '2016-07-05 14:04:46'),
(312, 185, 9, 36, '2016-07-11 15:41:01', '2016-07-11 15:41:01'),
(313, 187, 9, 36, '2016-07-11 15:41:06', '2016-07-11 15:41:06'),
(314, 54, 4, 9, '2016-07-11 17:02:29', '2016-07-11 17:02:29'),
(315, 69, 5, 9, '2016-07-11 17:02:43', '2016-07-11 17:02:43'),
(316, 71, 7, 9, '2016-07-11 17:02:54', '2016-07-11 17:02:54'),
(317, 70, 9, 9, '2016-07-11 17:02:58', '2016-07-11 17:02:58'),
(318, 72, 5, 9, '2016-07-11 17:03:03', '2016-07-11 17:03:03'),
(319, 83, 10, 9, '2016-07-11 17:03:11', '2016-07-11 17:03:11'),
(320, 85, 10, 9, '2016-07-11 17:03:15', '2016-07-11 17:03:15'),
(321, 87, 10, 9, '2016-07-11 17:03:20', '2016-07-11 17:03:20'),
(322, 115, 10, 9, '2016-07-11 17:03:28', '2016-07-11 17:03:28'),
(323, 139, 10, 9, '2016-07-11 17:03:35', '2016-07-11 17:03:35'),
(324, 140, 10, 9, '2016-07-11 17:03:40', '2016-07-11 17:03:40'),
(325, 156, 7, 9, '2016-07-11 17:03:44', '2016-07-11 17:03:44'),
(326, 159, 8, 9, '2016-07-11 17:03:48', '2016-07-11 17:03:48'),
(327, 185, 6, 9, '2016-07-11 17:03:52', '2016-07-11 17:03:52'),
(328, 187, 8, 9, '2016-07-11 17:03:57', '2016-07-11 17:03:57'),
(329, 192, 10, 9, '2016-07-11 17:04:09', '2016-07-11 17:04:09'),
(330, 193, 9, 9, '2016-07-11 17:04:14', '2016-07-11 17:04:14'),
(331, 206, 7, 9, '2016-07-11 17:04:36', '2016-07-11 17:04:36'),
(332, 207, 8, 9, '2016-07-11 17:04:42', '2016-07-11 17:04:42'),
(333, 208, 10, 9, '2016-07-11 17:04:49', '2016-07-11 17:04:49'),
(334, 209, 7, 9, '2016-07-11 17:04:53', '2016-07-11 17:04:53'),
(335, 12, 10, 97, '2016-08-08 03:32:22', '2016-08-08 03:32:22'),
(336, 15, 3, 97, '2016-08-08 03:35:18', '2016-08-08 03:35:18'),
(337, 196, 1, 94, '2016-08-10 14:31:49', '2016-08-10 14:31:49'),
(338, 233, 9, 6, '2016-08-16 00:07:50', '2016-08-16 00:07:50'),
(339, 162, 7, 6, '2016-08-16 14:11:11', '2016-08-16 14:11:11'),
(340, 161, 10, 6, '2016-08-16 23:44:45', '2016-08-16 23:44:45'),
(341, 12, 10, 94, '2016-08-19 14:44:27', '2016-08-19 14:44:27'),
(342, 15, 10, 94, '2016-08-19 14:44:34', '2016-08-19 14:44:34'),
(343, 40, 10, 94, '2016-08-19 14:44:39', '2016-08-19 14:44:39'),
(344, 45, 10, 94, '2016-08-19 14:44:43', '2016-08-19 14:44:43'),
(345, 46, 10, 94, '2016-08-19 14:44:47', '2016-08-19 14:44:47'),
(346, 47, 10, 94, '2016-08-19 14:44:53', '2016-08-19 14:44:53'),
(347, 48, 8, 94, '2016-08-19 14:45:05', '2016-08-19 14:45:05'),
(348, 49, 9, 94, '2016-08-19 14:45:11', '2016-08-19 14:45:11'),
(349, 50, 7, 94, '2016-08-19 14:45:16', '2016-08-19 14:45:16'),
(350, 51, 1, 94, '2016-08-19 14:45:20', '2016-08-19 14:45:20'),
(351, 52, 4, 94, '2016-08-19 14:45:25', '2016-08-19 14:45:25'),
(352, 54, 6, 94, '2016-08-19 14:45:29', '2016-08-19 14:45:29'),
(353, 63, 7, 94, '2016-08-19 14:45:34', '2016-08-19 14:45:34'),
(354, 64, 7, 94, '2016-08-19 14:46:12', '2016-08-19 14:46:12'),
(355, 69, 9, 94, '2016-08-19 14:46:19', '2016-08-19 14:46:19'),
(356, 71, 8, 94, '2016-08-19 14:46:23', '2016-08-19 14:46:23'),
(357, 70, 8, 94, '2016-08-19 14:46:31', '2016-08-19 14:46:31'),
(358, 72, 10, 94, '2016-08-19 14:46:34', '2016-08-19 14:46:34'),
(359, 73, 9, 94, '2016-08-19 14:46:44', '2016-08-19 14:46:44'),
(360, 83, 8, 94, '2016-08-19 14:46:50', '2016-08-19 14:46:50'),
(361, 85, 8, 94, '2016-08-19 14:46:55', '2016-08-19 14:46:55'),
(362, 87, 7, 94, '2016-08-19 14:46:59', '2016-08-19 14:46:59'),
(363, 115, 4, 94, '2016-08-19 14:47:15', '2016-08-19 14:47:15'),
(364, 124, 5, 94, '2016-08-19 14:47:19', '2016-08-19 14:47:19'),
(365, 139, 9, 94, '2016-08-19 14:47:28', '2016-08-19 14:47:28'),
(366, 140, 10, 94, '2016-08-19 14:47:33', '2016-08-19 14:47:33'),
(367, 156, 7, 94, '2016-08-19 14:47:36', '2016-08-19 14:47:36'),
(368, 159, 8, 94, '2016-08-19 14:47:40', '2016-08-19 14:47:40'),
(369, 192, 8, 94, '2016-08-19 14:47:44', '2016-08-19 14:47:44'),
(370, 206, 6, 94, '2016-08-19 14:47:50', '2016-08-19 14:47:50'),
(371, 249, 10, 36, '2016-08-19 16:10:59', '2016-08-19 16:10:59'),
(372, 258, 10, 36, '2016-08-19 16:11:25', '2016-08-19 16:11:25'),
(373, 257, 10, 36, '2016-08-19 16:11:40', '2016-08-19 16:11:40'),
(374, 260, 7, 36, '2016-08-19 16:12:00', '2016-08-19 16:12:00'),
(375, 187, 10, 6, '2016-09-15 23:18:15', '2016-09-15 23:18:15'),
(376, 63, 7, 6, '2016-10-05 03:12:51', '2016-10-05 03:12:51'),
(377, 71, 8, 6, '2016-10-05 03:12:54', '2016-10-05 03:12:54'),
(378, 70, 5, 6, '2016-10-05 03:12:57', '2016-10-05 03:12:57'),
(379, 15, 9, 103, '2016-10-14 13:35:38', '2016-10-14 13:35:38'),
(380, 72, 10, 6, '2016-10-26 14:59:20', '2016-10-26 14:59:20'),
(381, 73, 10, 6, '2016-10-26 15:00:33', '2016-10-26 15:00:33'),
(382, 83, 9, 6, '2016-10-26 15:00:41', '2016-10-26 15:00:41'),
(383, 85, 10, 6, '2016-10-26 15:00:44', '2016-10-26 15:00:44'),
(384, 87, 10, 6, '2016-10-26 15:00:47', '2016-10-26 15:00:47'),
(385, 15, 7, 109, '2016-10-26 15:01:10', '2016-10-26 15:01:10'),
(386, 12, 8, 109, '2016-10-26 15:02:49', '2016-10-26 15:02:49'),
(387, 45, 6, 109, '2016-10-26 15:40:51', '2016-10-26 15:40:51'),
(388, 40, 6, 109, '2016-10-26 15:40:55', '2016-10-26 15:40:55'),
(389, 46, 6, 109, '2016-10-26 15:42:41', '2016-10-26 15:42:41'),
(390, 47, 2, 109, '2016-10-26 15:42:52', '2016-10-26 15:42:52'),
(391, 48, 5, 109, '2016-10-26 15:43:01', '2016-10-26 15:43:01'),
(392, 139, 9, 6, '2016-10-26 15:43:12', '2016-10-26 15:43:12'),
(393, 140, 10, 6, '2016-10-26 15:43:18', '2016-10-26 15:43:18'),
(394, 49, 8, 109, '2016-10-26 15:43:21', '2016-10-26 15:43:21'),
(395, 50, 6, 109, '2016-10-26 15:43:30', '2016-10-26 15:43:30'),
(396, 192, 10, 6, '2016-10-26 15:43:32', '2016-10-26 15:43:32'),
(397, 51, 9, 109, '2016-10-26 15:45:12', '2016-10-26 15:45:12'),
(398, 206, 10, 6, '2016-10-26 15:47:53', '2016-10-26 15:47:53'),
(399, 207, 10, 6, '2016-10-26 15:47:57', '2016-10-26 15:47:57'),
(400, 208, 10, 6, '2016-10-26 15:47:59', '2016-10-26 15:47:59'),
(401, 209, 10, 6, '2016-10-26 15:48:01', '2016-10-26 15:48:01'),
(402, 249, 10, 6, '2016-10-26 15:48:03', '2016-10-26 15:48:03'),
(403, 253, 10, 6, '2016-10-26 15:48:16', '2016-10-26 15:48:16'),
(404, 257, 10, 6, '2016-10-26 15:48:18', '2016-10-26 15:48:18'),
(405, 260, 10, 6, '2016-10-26 15:48:21', '2016-10-26 15:48:21'),
(406, 295, 10, 6, '2016-10-26 15:48:24', '2016-10-26 15:48:24');

-- --------------------------------------------------------

--
-- Table structure for table `sr_photo_report`
--

CREATE TABLE IF NOT EXISTS `sr_photo_report` (
  `photo_report_id` int(11) NOT NULL AUTO_INCREMENT,
  `photo_id` int(11) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `reported_by` int(11) NOT NULL,
  `reported_on` datetime NOT NULL,
  `status` int(11) NOT NULL,
  `is_read` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0:no,1:yes',
  `disapprove_by_admin` tinyint(4) NOT NULL DEFAULT '0' COMMENT '1:new photo disapprove by admin',
  `admin_id` int(11) NOT NULL,
  `admin_action` tinyint(4) NOT NULL COMMENT ' 0:none,1:keep,2:delete',
  `action_date` datetime NOT NULL,
  PRIMARY KEY (`photo_report_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `sr_photo_report`
--

INSERT INTO `sr_photo_report` (`photo_report_id`, `photo_id`, `reason`, `description`, `reported_by`, `reported_on`, `status`, `is_read`, `disapprove_by_admin`, `admin_id`, `admin_action`, `action_date`) VALUES
(1, 40, 'Other', 'Inappropriate Photo', 1, '2015-11-04 14:51:15', 0, 1, 0, 1, 1, '2016-11-08 13:02:22'),
(2, 50, 'Other', 'jhkjn', 1, '2015-11-04 14:54:11', 1, 1, 0, 1, 2, '2016-11-08 13:22:41'),
(3, 40, 'Threatening behaviour', '', 1, '2015-11-04 14:55:20', 1, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(4, 66, 'Other', 'Reporting', 6, '2015-12-21 20:46:22', 1, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(5, 53, 'Inappropriate Photo', '', 6, '2015-12-23 02:51:56', 1, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(6, 87, 'Celebrity/ Imposter Photo', '', 1, '2016-02-08 18:19:31', 1, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(7, 72, 'Inappropriate Photo', '', 50, '2016-02-09 12:12:01', 1, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(8, 72, 'Other', 'jjjjjjj', 50, '2016-02-09 12:12:19', 1, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(9, 139, 'Inappropriate Photo', '', 6, '2016-02-20 18:04:52', 1, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(10, 72, ' ', '', 6, '2016-04-07 16:30:25', 1, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(11, 72, ' ', '', 6, '2016-04-07 16:30:48', 1, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(12, 170, 'Other', 'report photo..................', 20, '2016-04-23 18:12:12', 1, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(13, 176, 'Inappropriate Photo', '', 20, '2016-04-30 14:09:32', 1, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(14, 192, 'Celebrity/ Imposter Photo', '', 94, '2016-08-10 14:47:29', 1, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(15, 237, 'Other', 'OMG', 6, '2016-08-15 17:45:11', 1, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(16, 37, 'Celebrity/ Imposter Photo', 'GEre', 6, '2016-08-16 00:11:41', 1, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(17, 12, 'Threatening behaviour', '', 43, '2016-08-16 19:14:59', 1, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(18, 85, 'Celebrity/ Imposter Photo', '', 99, '2016-08-17 21:44:28', 1, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(19, 185, 'Inappropriate', '', 0, '2016-09-05 23:14:47', 1, 0, 1, 0, 0, '0000-00-00 00:00:00'),
(20, 52, 'Threatening behaviour', '', 109, '2016-10-26 15:47:16', 1, 0, 0, 0, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `sr_profile_visitors`
--

CREATE TABLE IF NOT EXISTS `sr_profile_visitors` (
  `visit_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `visitor_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0:inactive,1:active',
  `visited_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL,
  PRIMARY KEY (`visit_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=426 ;

--
-- Dumping data for table `sr_profile_visitors`
--

INSERT INTO `sr_profile_visitors` (`visit_id`, `user_id`, `visitor_id`, `status`, `visited_on`, `updated_on`) VALUES
(1, 8, 1, 0, '0000-00-00 00:00:00', '2016-06-28 11:43:23'),
(2, 9, 1, 1, '0000-00-00 00:00:00', '2016-06-28 11:42:02'),
(3, 9, 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 1, 1, 0, '0000-00-00 00:00:00', '2016-04-22 13:14:46'),
(5, 5, 1, 1, '0000-00-00 00:00:00', '2016-06-28 11:42:04'),
(6, 0, 1, 1, '2015-08-27 11:56:48', '2016-04-25 17:20:56'),
(7, 1, 4, 0, '2015-08-27 14:08:49', '2016-04-21 16:59:07'),
(8, 0, 0, 1, '2015-08-28 10:37:32', '2015-08-28 10:37:32'),
(9, 5, 6, 1, '2015-08-30 22:20:00', '2016-08-16 16:44:33'),
(10, 1, 6, 0, '2015-08-30 22:21:13', '2016-08-16 14:10:18'),
(11, 4, 6, 1, '2015-08-30 22:21:58', '2016-08-17 00:32:20'),
(13, 9, 9, 1, '2015-08-31 17:23:28', '2015-08-31 17:23:28'),
(15, 9, 4, 1, '2015-09-15 12:56:41', '2015-09-15 12:56:41'),
(16, 5, 4, 1, '2015-09-15 12:57:24', '2016-02-22 12:12:03'),
(17, 4, 1, 1, '2015-09-17 14:53:15', '2016-06-28 11:42:03'),
(18, 1, 0, 0, '2015-09-17 19:27:44', '2016-04-30 15:19:26'),
(19, 9, 6, 1, '2015-09-21 00:57:33', '2015-09-21 00:57:33'),
(21, 0, 4, 1, '2015-09-24 13:42:58', '2015-09-24 13:42:58'),
(22, 4, 4, 1, '2015-09-24 13:45:03', '2016-04-21 16:13:54'),
(24, 4, 5, 1, '2015-09-24 16:17:05', '2015-09-24 16:17:05'),
(25, 4, 8, 1, '2015-09-24 16:25:09', '2016-04-18 17:02:14'),
(26, 8, 4, 0, '2015-09-24 16:29:24', '2016-04-21 16:14:06'),
(27, 12, 4, 1, '2015-09-25 10:47:08', '2015-09-25 10:47:08'),
(28, 12, 8, 1, '2015-09-25 11:40:53', '2015-09-25 11:40:53'),
(30, 1, 10, 0, '2015-09-25 12:19:05', '2015-09-25 12:19:05'),
(31, 8, 8, 0, '2015-09-25 12:22:36', '2015-09-25 12:22:36'),
(32, 0, 5, 1, '2015-09-25 12:25:20', '2015-09-25 12:25:20'),
(33, 1, 13, 0, '2015-09-25 12:42:26', '2015-09-25 12:42:26'),
(34, 10, 8, 1, '2015-09-25 12:44:32', '2015-09-25 12:44:32'),
(35, 10, 4, 1, '2015-09-25 13:04:32', '2015-09-25 13:04:32'),
(36, 10, 1, 1, '2015-09-25 14:06:18', '2015-09-25 14:06:18'),
(37, 4, 0, 1, '2015-09-26 11:22:21', '2015-09-26 11:22:21'),
(38, 1, 12, 0, '2015-09-26 12:12:54', '2015-09-26 12:12:54'),
(40, 5, 0, 1, '2015-09-26 12:17:30', '2015-09-26 12:17:30'),
(41, 4, 19, 1, '2015-09-28 15:27:44', '2015-09-28 15:27:44'),
(42, 21, 5, 1, '2015-09-29 15:20:39', '2015-09-29 15:20:39'),
(43, 10, 22, 1, '2015-09-29 15:22:01', '2015-09-29 15:22:01'),
(44, 0, 22, 1, '2015-09-29 15:24:49', '2015-09-29 15:24:49'),
(45, 1, 21, 0, '2015-09-29 15:25:54', '2015-09-29 15:25:54'),
(46, 9, 23, 1, '2015-09-29 15:27:30', '2015-09-29 15:27:30'),
(47, 1, 24, 0, '2015-09-29 15:29:27', '2015-09-29 15:29:27'),
(48, 20, 22, 0, '2015-09-29 15:35:39', '2015-09-29 15:35:39'),
(49, 8, 21, 0, '2015-09-29 15:53:26', '2015-09-29 15:53:26'),
(50, 0, 20, 1, '2015-09-29 16:46:43', '2015-09-29 16:46:43'),
(51, 21, 4, 1, '2015-10-05 15:05:12', '2015-10-05 15:05:12'),
(52, 22, 4, 1, '2015-10-05 15:06:02', '2015-10-05 15:06:02'),
(53, 14, 4, 1, '2015-10-05 15:14:47', '2015-10-05 15:14:47'),
(54, 3, 4, 1, '2015-10-05 15:18:41', '2015-10-05 15:18:41'),
(55, 9, 10, 1, '2015-10-05 15:32:25', '2015-10-05 15:32:25'),
(56, 5, 10, 1, '2015-10-05 15:33:34', '2015-10-05 15:33:34'),
(57, 14, 10, 1, '2015-10-05 15:34:00', '2015-10-05 15:34:00'),
(58, 21, 10, 1, '2015-10-05 15:34:20', '2015-10-05 15:34:20'),
(59, 22, 10, 1, '2015-10-05 15:34:50', '2015-10-05 15:34:50'),
(60, 21, 20, 1, '2015-10-05 15:37:11', '2015-10-05 15:37:11'),
(61, 1, 20, 0, '2015-10-05 15:59:27', '2016-05-12 10:26:22'),
(63, 20, 4, 0, '2015-10-05 17:01:31', '2015-10-05 17:01:31'),
(64, 20, 5, 0, '2015-10-05 17:14:45', '2015-10-05 17:14:45'),
(65, 5, 8, 1, '2015-10-05 18:31:27', '2015-10-05 18:31:27'),
(66, 23, 8, 1, '2015-10-05 18:51:44', '2015-10-05 18:51:44'),
(67, 20, 0, 0, '2015-10-06 12:53:55', '2016-02-22 15:41:39'),
(68, 1, 8, 0, '2015-10-06 18:45:21', '2015-10-06 18:45:21'),
(69, 22, 8, 1, '2015-10-06 18:46:37', '2015-10-06 18:46:37'),
(70, 14, 6, 1, '2015-10-07 15:26:36', '2015-10-07 15:26:36'),
(71, 27, 4, 0, '2015-10-07 16:32:16', '2016-04-11 11:49:07'),
(72, 24, 4, 1, '2015-10-07 17:38:20', '2015-10-07 17:38:20'),
(74, 29, 8, 1, '2015-10-14 10:33:49', '2015-10-14 10:33:49'),
(76, 10, 0, 1, '2015-10-15 17:04:25', '2015-10-15 17:04:25'),
(77, 21, 1, 1, '2015-10-15 17:15:38', '2015-10-15 17:15:38'),
(78, 10, 20, 1, '2015-10-19 15:38:54', '2015-10-19 15:38:54'),
(79, 20, 10, 0, '2015-10-19 15:41:18', '2015-10-19 15:41:18'),
(80, 0, 10, 1, '2015-10-20 15:38:07', '2015-10-20 15:38:07'),
(81, 20, 1, 0, '2015-10-20 16:00:02', '2016-10-10 18:38:14'),
(82, 29, 1, 1, '2015-10-20 16:00:30', '2016-06-28 11:42:11'),
(84, 10, 27, 1, '2015-10-21 11:26:35', '2015-10-21 11:26:35'),
(85, 1, 27, 0, '2015-10-21 11:28:26', '2015-10-21 11:28:26'),
(87, 28, 4, 1, '2015-10-28 18:06:20', '2015-10-28 18:06:20'),
(88, 31, 1, 1, '2015-10-28 18:18:48', '2015-10-28 18:18:48'),
(89, 8, 10, 0, '2015-10-29 12:06:24', '2015-10-29 12:06:24'),
(90, 3, 10, 1, '2015-10-29 12:15:08', '2015-10-29 12:15:08'),
(91, 23, 10, 1, '2015-10-29 12:40:52', '2015-10-29 12:40:52'),
(92, 29, 4, 1, '2015-10-30 17:52:10', '2015-10-30 17:52:10'),
(93, 20, 6, 0, '2015-11-02 03:15:11', '2016-03-29 10:33:28'),
(94, 12, 34, 1, '2015-11-02 18:01:21', '2016-02-25 10:54:17'),
(95, 33, 20, 1, '2015-11-03 13:34:11', '2015-11-03 13:34:11'),
(96, 22, 20, 1, '2015-11-03 14:33:07', '2015-11-03 14:33:07'),
(97, 1, 36, 0, '2015-11-03 16:49:04', '2016-06-10 11:43:06'),
(99, 36, 1, 0, '2015-11-04 11:56:12', '2016-06-28 11:43:24'),
(100, 5, 27, 1, '2015-11-06 07:46:46', '2015-11-06 07:46:46'),
(101, 33, 6, 1, '2015-11-14 18:21:09', '2015-11-14 18:21:09'),
(102, 29, 6, 1, '2015-11-17 03:49:52', '2016-02-16 12:22:12'),
(103, 23, 27, 1, '2015-11-17 11:53:53', '2015-11-17 11:53:53'),
(104, 27, 6, 0, '2015-11-26 19:53:39', '2016-03-12 16:32:10'),
(105, 23, 6, 1, '2015-11-29 20:15:06', '2016-08-16 17:06:03'),
(106, 22, 6, 1, '2015-11-29 20:15:39', '2015-11-29 20:15:39'),
(107, 12, 27, 1, '2015-12-01 19:20:56', '2015-12-01 19:20:56'),
(108, 10, 6, 1, '2015-12-02 12:10:57', '2015-12-02 12:10:57'),
(110, 21, 6, 1, '2015-12-15 12:09:25', '2015-12-15 12:09:25'),
(111, 22, 27, 1, '2015-12-16 22:56:13', '2015-12-16 22:56:13'),
(112, 20, 27, 0, '2015-12-17 15:54:09', '2015-12-17 15:54:09'),
(113, 22, 1, 1, '2015-12-18 12:19:04', '2016-06-28 11:43:22'),
(114, 5, 20, 1, '2015-12-18 17:44:06', '2015-12-18 17:44:06'),
(115, 24, 6, 1, '2015-12-22 16:18:15', '2015-12-22 16:18:15'),
(116, 36, 6, 0, '2015-12-22 16:46:45', '2016-08-16 00:36:30'),
(117, 27, 0, 0, '2015-12-23 02:46:54', '2016-02-06 13:10:17'),
(118, 34, 6, 0, '2015-12-23 03:00:15', '2015-12-23 03:00:15'),
(119, 36, 20, 0, '2015-12-23 14:59:40', '2015-12-23 14:59:40'),
(120, 38, 6, 1, '2015-12-23 20:47:36', '2016-04-04 19:58:59'),
(121, 0, 6, 1, '2015-12-25 19:24:48', '2016-02-20 18:09:38'),
(122, 38, 1, 1, '2015-12-26 10:24:19', '2016-06-13 11:08:07'),
(123, 27, 1, 0, '2015-12-26 10:24:46', '2016-06-28 11:42:16'),
(124, 34, 1, 0, '2015-12-26 10:24:50', '2016-06-28 11:42:24'),
(125, 23, 1, 1, '2015-12-26 10:25:13', '2016-06-28 11:43:20'),
(126, 38, 36, 1, '2015-12-30 13:58:15', '2016-06-06 12:43:24'),
(127, 20, 20, 0, '2015-12-30 19:07:13', '2016-04-30 13:28:32'),
(128, 1, 44, 0, '2016-01-07 15:26:36', '2016-01-07 15:26:36'),
(129, 40, 6, 1, '2016-01-08 21:22:37', '2016-03-09 11:34:38'),
(130, 4, 42, 1, '2016-01-18 02:21:45', '2016-01-18 02:21:45'),
(131, 20, 42, 0, '2016-01-18 02:22:12', '2016-01-18 02:23:10'),
(133, 24, 1, 1, '2016-01-18 17:29:04', '2016-01-18 17:29:04'),
(134, 37, 1, 1, '2016-01-19 13:38:09', '2016-06-28 11:43:14'),
(135, 37, 6, 1, '2016-01-20 12:31:02', '2016-01-20 12:31:02'),
(136, 52, 6, 1, '2016-01-20 12:38:57', '2016-01-20 12:41:03'),
(137, 27, 50, 0, '2016-01-25 10:45:53', '2016-02-09 16:47:09'),
(138, 4, 50, 1, '2016-01-25 11:53:02', '2016-01-25 11:53:02'),
(139, 28, 6, 1, '2016-01-26 03:20:40', '2016-01-26 03:20:40'),
(140, 43, 6, 1, '2016-01-26 03:21:27', '2016-01-26 03:21:27'),
(141, 31, 28, 1, '2016-01-26 03:34:13', '2016-01-26 03:34:13'),
(143, 38, 0, 1, '2016-01-27 11:29:48', '2016-01-27 11:29:48'),
(144, 1, 55, 0, '2016-01-27 15:13:48', '2016-01-27 15:13:48'),
(145, 4, 55, 1, '2016-01-27 15:14:09', '2016-04-07 10:58:10'),
(147, 56, 6, 0, '2016-02-04 20:24:34', '2016-08-16 16:50:45'),
(149, 38, 38, 1, '2016-02-09 14:31:18', '2016-02-09 14:31:18'),
(150, 20, 38, 0, '2016-02-09 14:34:20', '2016-02-09 17:49:24'),
(151, 36, 38, 0, '2016-02-09 14:41:22', '2016-02-11 19:25:49'),
(152, 0, 38, 1, '2016-02-09 14:41:47', '2016-02-09 14:41:47'),
(153, 40, 38, 1, '2016-02-09 14:57:17', '2016-02-09 14:57:17'),
(154, 27, 38, 0, '2016-02-09 15:23:17', '2016-02-11 19:29:36'),
(155, 20, 50, 0, '2016-02-09 16:47:22', '2016-02-09 16:48:27'),
(156, 42, 56, 1, '2016-02-11 11:58:47', '2016-02-11 11:58:47'),
(157, 0, 56, 1, '2016-02-11 11:59:19', '2016-02-11 11:59:19'),
(158, 1, 38, 0, '2016-02-11 19:29:48', '2016-02-11 19:53:38'),
(161, 4, 34, 1, '2016-02-12 10:32:01', '2016-03-10 17:46:01'),
(162, 37, 34, 1, '2016-02-12 11:18:45', '2016-02-25 10:52:30'),
(163, 1, 34, 0, '2016-02-12 11:31:45', '2016-02-25 10:52:58'),
(164, 40, 4, 1, '2016-02-12 12:05:39', '2016-02-23 06:49:27'),
(165, 40, 56, 1, '2016-02-20 17:40:12', '2016-02-20 17:40:12'),
(166, 20, 34, 0, '2016-02-21 02:05:48', '2016-02-25 10:54:57'),
(167, 34, 4, 0, '2016-02-23 17:45:15', '2016-02-23 17:45:15'),
(168, 27, 34, 0, '2016-02-24 11:42:11', '2016-02-25 10:55:46'),
(169, 0, 34, 1, '2016-02-24 11:43:43', '2016-02-24 11:43:43'),
(170, 38, 34, 1, '2016-02-24 11:57:46', '2016-02-25 10:52:23'),
(171, 36, 34, 0, '2016-02-24 11:57:56', '2016-02-25 10:52:27'),
(172, 40, 34, 1, '2016-02-25 10:52:19', '2016-02-25 10:52:19'),
(173, 2, 34, 1, '2016-02-25 10:52:53', '2016-02-25 10:52:53'),
(174, 3, 34, 1, '2016-02-25 10:53:04', '2016-02-25 10:53:04'),
(175, 5, 34, 1, '2016-02-25 10:53:10', '2016-02-25 10:53:10'),
(176, 7, 34, 1, '2016-02-25 10:53:30', '2016-02-25 10:53:30'),
(177, 8, 34, 0, '2016-02-25 10:53:40', '2016-02-25 10:53:40'),
(178, 9, 34, 1, '2016-02-25 10:53:44', '2016-02-25 10:53:44'),
(179, 10, 34, 1, '2016-02-25 10:53:50', '2016-02-25 10:54:08'),
(180, 11, 34, 1, '2016-02-25 10:54:04', '2016-02-25 10:54:04'),
(181, 13, 34, 1, '2016-02-25 10:54:14', '2016-02-25 10:54:14'),
(182, 14, 34, 1, '2016-02-25 10:54:22', '2016-02-25 10:54:48'),
(183, 15, 34, 1, '2016-02-25 10:54:26', '2016-02-25 10:54:26'),
(184, 17, 34, 1, '2016-02-25 10:54:32', '2016-02-25 10:54:32'),
(185, 18, 34, 1, '2016-02-25 10:54:38', '2016-02-25 10:54:38'),
(186, 19, 34, 1, '2016-02-25 10:54:44', '2016-02-25 10:54:44'),
(187, 21, 34, 1, '2016-02-25 10:55:01', '2016-02-25 10:55:01'),
(188, 22, 34, 1, '2016-02-25 10:55:08', '2016-02-25 10:55:08'),
(189, 23, 34, 1, '2016-02-25 10:55:15', '2016-02-25 10:55:15'),
(190, 24, 34, 1, '2016-02-25 10:55:18', '2016-02-25 10:55:43'),
(191, 25, 34, 1, '2016-02-25 10:55:30', '2016-02-25 10:55:30'),
(192, 26, 34, 1, '2016-02-25 10:55:39', '2016-02-25 10:55:39'),
(193, 28, 34, 1, '2016-02-25 10:55:51', '2016-02-25 10:55:51'),
(194, 29, 34, 1, '2016-02-25 10:55:54', '2016-02-25 10:55:54'),
(195, 30, 34, 1, '2016-02-25 10:56:18', '2016-02-25 10:56:18'),
(196, 54, 6, 1, '2016-03-04 22:20:56', '2016-03-04 22:20:56'),
(197, 66, 1, 1, '2016-03-11 17:33:31', '2016-06-13 11:12:26'),
(198, 1, 66, 0, '2016-03-11 18:37:47', '2016-03-11 18:37:47'),
(199, 20, 65, 0, '2016-03-11 18:39:57', '2016-03-14 12:13:27'),
(200, 1, 65, 0, '2016-03-11 18:40:01', '2016-03-14 13:45:25'),
(201, 3, 6, 1, '2016-03-12 13:46:20', '2016-03-12 13:46:20'),
(202, 24, 65, 1, '2016-03-14 12:14:37', '2016-03-14 12:14:37'),
(203, 27, 65, 0, '2016-03-14 12:15:32', '2016-03-14 12:16:58'),
(204, 65, 65, 1, '2016-03-14 13:45:21', '2016-03-14 13:45:21'),
(205, 28, 56, 1, '2016-04-06 10:51:13', '2016-04-06 10:51:13'),
(206, 40, 55, 1, '2016-04-07 10:56:29', '2016-05-31 17:11:08'),
(208, 4, 27, 1, '2016-04-08 19:16:31', '2016-04-08 19:16:31'),
(209, 34, 9, 1, '2016-04-20 18:42:05', '2016-07-11 17:10:10'),
(210, 37, 4, 1, '2016-04-21 16:03:37', '2016-04-21 17:02:14'),
(211, 55, 4, 0, '2016-04-21 16:14:19', '2016-04-21 16:14:19'),
(212, 37, 0, 1, '2016-04-21 17:19:27', '2016-04-21 17:19:27'),
(213, 4, 69, 1, '2016-04-26 17:35:01', '2016-06-01 13:16:11'),
(214, 4, 24, 1, '2016-04-28 19:05:44', '2016-04-28 19:05:52'),
(215, 37, 69, 1, '2016-05-10 17:33:56', '2016-06-01 13:17:59'),
(216, 46, 6, 1, '2016-05-20 20:24:40', '2016-05-20 20:25:00'),
(217, 8, 6, 1, '2016-05-22 21:17:29', '2016-08-16 00:11:24'),
(218, 5, 69, 1, '2016-06-01 13:15:18', '2016-06-01 13:15:18'),
(219, 50, 36, 1, '2016-06-01 15:53:20', '2016-08-19 12:45:34'),
(220, 14, 36, 1, '2016-06-03 11:31:24', '2016-06-06 12:43:25'),
(221, 66, 36, 1, '2016-06-03 11:33:54', '2016-06-06 12:43:43'),
(222, 65, 36, 1, '2016-06-03 11:52:07', '2016-08-08 17:29:31'),
(223, 51, 36, 1, '2016-06-03 12:58:05', '2016-06-06 12:43:44'),
(224, 34, 36, 1, '2016-06-03 13:01:00', '2016-06-06 12:40:48'),
(225, 29, 36, 1, '2016-06-03 13:02:24', '2016-06-06 12:39:29'),
(226, 33, 36, 1, '2016-06-03 13:02:36', '2016-06-06 12:39:27'),
(227, 56, 36, 1, '2016-06-03 13:02:38', '2016-06-06 12:40:02'),
(228, 20, 36, 1, '2016-06-03 13:02:39', '2016-06-06 12:40:44'),
(229, 52, 36, 1, '2016-06-03 13:02:41', '2016-06-06 12:40:46'),
(230, 24, 36, 1, '2016-06-03 13:03:26', '2016-06-06 12:25:34'),
(231, 21, 36, 1, '2016-06-03 13:03:27', '2016-06-06 13:27:01'),
(232, 5, 36, 1, '2016-06-03 13:05:18', '2016-06-06 12:34:27'),
(233, 27, 36, 1, '2016-06-03 13:05:21', '2016-06-06 13:28:11'),
(234, 9, 36, 1, '2016-06-03 13:06:11', '2016-06-06 12:34:25'),
(235, 4, 36, 1, '2016-06-03 13:06:12', '2016-10-03 17:08:10'),
(236, 3, 36, 1, '2016-06-03 13:06:14', '2016-06-06 12:34:38'),
(237, 54, 36, 1, '2016-06-03 13:06:19', '2016-06-06 14:47:06'),
(238, 70, 36, 0, '2016-06-03 13:06:20', '2016-06-06 13:54:09'),
(239, 12, 36, 1, '2016-06-03 13:06:25', '2016-06-06 12:40:52'),
(240, 55, 36, 1, '2016-06-03 13:06:26', '2016-06-06 12:40:11'),
(241, 69, 36, 1, '2016-06-03 13:07:28', '2016-06-06 12:41:18'),
(242, 40, 36, 1, '2016-06-03 13:07:29', '2016-06-10 13:11:56'),
(243, 42, 36, 1, '2016-06-03 13:08:39', '2016-06-06 12:25:16'),
(244, 28, 36, 1, '2016-06-03 13:08:40', '2016-06-06 12:25:31'),
(245, 46, 36, 1, '2016-06-03 13:09:02', '2016-06-06 12:41:55'),
(246, 37, 36, 1, '2016-06-03 13:09:04', '2016-06-06 12:41:56'),
(247, 23, 36, 1, '2016-06-03 13:09:05', '2016-06-06 12:42:00'),
(248, 53, 36, 1, '2016-06-03 13:09:06', '2016-06-06 12:42:30'),
(249, 36, 2, 0, '2016-06-03 15:12:59', '2016-06-03 16:09:23'),
(250, 2, 36, 1, '2016-06-03 16:31:37', '2016-06-06 12:39:28'),
(251, 9, 72, 1, '2016-06-04 16:22:42', '2016-06-04 16:22:57'),
(252, 4, 72, 1, '2016-06-04 16:22:44', '2016-06-04 16:23:28'),
(253, 36, 72, 0, '2016-06-04 16:22:48', '2016-06-04 17:11:41'),
(254, 5, 72, 1, '2016-06-04 16:22:51', '2016-06-04 16:24:16'),
(255, 70, 72, 0, '2016-06-04 16:24:59', '2016-06-04 16:25:10'),
(256, 33, 72, 1, '2016-06-04 16:25:01', '2016-06-04 16:25:50'),
(257, 3, 72, 1, '2016-06-04 16:25:04', '2016-06-04 16:25:04'),
(258, 29, 72, 1, '2016-06-04 16:25:06', '2016-06-04 16:25:06'),
(259, 72, 36, 1, '2016-06-04 16:41:13', '2016-06-10 11:41:59'),
(260, 10, 36, 1, '2016-06-04 16:49:44', '2016-06-06 12:25:32'),
(261, 22, 36, 1, '2016-06-04 16:52:48', '2016-06-06 12:42:34'),
(262, 8, 36, 1, '2016-06-04 16:52:49', '2016-06-06 12:42:37'),
(263, 45, 36, 1, '2016-06-04 16:52:50', '2016-06-06 12:43:02'),
(265, 41, 36, 1, '2016-06-04 16:54:06', '2016-06-06 12:43:03'),
(266, 43, 36, 1, '2016-06-04 16:54:08', '2016-06-06 12:43:04'),
(267, 39, 36, 1, '2016-06-04 16:57:02', '2016-06-06 12:55:06'),
(268, 36, 73, 0, '2016-06-04 17:26:55', '2016-06-04 17:45:45'),
(269, 40, 73, 1, '2016-06-04 17:40:57', '2016-06-04 17:40:57'),
(270, 30, 73, 1, '2016-06-04 17:43:57', '2016-06-04 17:43:57'),
(271, 36, 74, 0, '2016-06-04 17:49:35', '2016-06-04 17:51:56'),
(272, 36, 75, 0, '2016-06-04 17:57:35', '2016-06-04 18:00:04'),
(273, 36, 76, 0, '2016-06-04 18:08:06', '2016-06-04 18:10:45'),
(274, 36, 77, 0, '2016-06-04 18:13:28', '2016-06-04 18:14:42'),
(275, 36, 78, 0, '2016-06-04 18:16:49', '2016-06-04 18:18:10'),
(276, 75, 36, 1, '2016-06-06 12:41:58', '2016-06-06 14:48:35'),
(277, 73, 36, 1, '2016-06-06 12:42:30', '2016-06-06 12:44:55'),
(278, 36, 69, 0, '2016-06-06 12:46:18', '2016-06-06 12:46:25'),
(279, 36, 79, 0, '2016-06-06 12:50:06', '2016-06-06 12:50:13'),
(280, 79, 36, 1, '2016-06-06 13:18:06', '2016-06-06 13:18:11'),
(281, 36, 80, 0, '2016-06-06 13:19:05', '2016-06-10 11:38:09'),
(282, 80, 36, 1, '2016-06-06 13:19:25', '2016-06-06 13:19:30'),
(283, 36, 81, 0, '2016-06-06 13:21:49', '2016-06-06 13:21:49'),
(284, 81, 36, 1, '2016-06-06 13:22:07', '2016-06-06 13:22:12'),
(285, 40, 82, 1, '2016-06-06 13:23:57', '2016-06-06 13:23:57'),
(286, 36, 82, 0, '2016-06-06 13:24:02', '2016-06-06 13:24:02'),
(287, 82, 36, 1, '2016-06-06 13:24:21', '2016-09-17 11:12:49'),
(288, 72, 80, 1, '2016-06-10 13:08:53', '2016-06-10 13:08:53'),
(289, 46, 1, 1, '2016-06-13 11:05:49', '2016-06-28 11:43:13'),
(290, 75, 1, 1, '2016-06-13 11:05:51', '2016-06-28 11:43:16'),
(291, 83, 1, 1, '2016-06-13 11:05:53', '2016-06-28 11:43:15'),
(292, 53, 1, 1, '2016-06-13 11:06:33', '2016-06-28 11:44:09'),
(293, 73, 1, 1, '2016-06-13 11:06:33', '2016-06-28 11:43:21'),
(294, 45, 1, 1, '2016-06-13 11:07:13', '2016-06-28 11:43:25'),
(295, 41, 1, 1, '2016-06-13 11:07:47', '2016-06-13 11:07:57'),
(296, 43, 1, 1, '2016-06-13 11:07:48', '2016-06-13 11:08:02'),
(297, 14, 1, 1, '2016-06-13 11:07:49', '2016-06-13 11:08:11'),
(298, 65, 1, 1, '2016-06-13 11:12:24', '2016-06-13 11:12:24'),
(299, 50, 1, 1, '2016-06-13 11:12:25', '2016-06-13 11:12:25'),
(300, 51, 1, 1, '2016-06-13 11:12:26', '2016-06-13 11:12:26'),
(301, 82, 1, 1, '2016-06-13 11:12:29', '2016-06-13 11:12:29'),
(302, 81, 1, 1, '2016-06-13 11:12:35', '2016-06-13 11:12:35'),
(303, 3, 1, 1, '2016-06-13 11:13:51', '2016-06-28 11:42:05'),
(304, 33, 1, 1, '2016-06-13 11:13:52', '2016-06-28 11:42:10'),
(305, 2, 1, 1, '2016-06-13 11:13:52', '2016-06-13 12:18:04'),
(306, 70, 1, 0, '2016-06-13 11:13:58', '2016-06-28 11:42:13'),
(307, 55, 1, 1, '2016-06-13 11:13:59', '2016-06-28 11:42:16'),
(308, 56, 1, 1, '2016-06-13 11:14:00', '2016-06-28 11:42:28'),
(309, 1, 80, 1, '2016-06-13 11:59:13', '2016-06-13 11:59:13'),
(310, 80, 1, 1, '2016-06-13 12:19:00', '2016-06-28 11:42:09'),
(311, 54, 1, 1, '2016-06-28 11:42:13', '2016-06-28 11:42:13'),
(312, 69, 1, 1, '2016-06-28 11:42:25', '2016-06-28 11:42:25'),
(313, 12, 1, 1, '2016-06-28 11:42:29', '2016-06-28 11:42:29'),
(314, 52, 1, 1, '2016-06-28 11:42:32', '2016-06-28 11:42:32'),
(315, 40, 1, 1, '2016-06-28 11:42:33', '2016-06-28 11:42:33'),
(316, 4, 86, 1, '2016-07-05 14:04:56', '2016-07-05 14:04:56'),
(317, 31, 9, 1, '2016-07-11 17:05:25', '2016-07-11 17:07:03'),
(318, 1, 92, 1, '2016-07-22 12:04:16', '2016-07-22 12:04:16'),
(319, 20, 92, 1, '2016-07-22 12:08:01', '2016-07-22 12:09:12'),
(320, 91, 97, 1, '2016-08-08 03:13:06', '2016-08-08 03:13:37'),
(321, 50, 97, 1, '2016-08-08 03:28:59', '2016-08-08 03:29:13'),
(322, 86, 6, 1, '2016-08-08 11:02:08', '2016-10-19 01:52:18'),
(323, 36, 94, 0, '2016-08-09 14:35:30', '2016-08-20 15:45:44'),
(324, 37, 94, 1, '2016-08-09 16:28:32', '2016-08-22 14:48:21'),
(325, 4, 94, 1, '2016-08-09 16:28:42', '2016-10-12 18:17:23'),
(326, 4, 70, 1, '2016-08-15 20:48:25', '2016-08-15 20:48:25'),
(327, 92, 70, 1, '2016-08-15 20:48:48', '2016-08-15 20:48:48'),
(328, 80, 70, 1, '2016-08-15 20:49:19', '2016-08-15 20:49:19'),
(329, 46, 43, 1, '2016-08-15 20:51:08', '2016-08-15 20:51:25'),
(330, 86, 43, 1, '2016-08-15 20:51:35', '2016-08-16 00:41:03'),
(331, 94, 43, 1, '2016-08-15 20:51:43', '2016-08-15 20:52:56'),
(332, 89, 43, 1, '2016-08-15 20:52:18', '2016-08-15 21:05:08'),
(333, 37, 43, 1, '2016-08-15 20:52:30', '2016-08-15 20:52:30'),
(334, 83, 43, 1, '2016-08-15 20:52:37', '2016-08-15 20:52:37'),
(335, 75, 43, 1, '2016-08-15 20:52:44', '2016-08-15 20:52:44'),
(336, 23, 43, 1, '2016-08-15 20:52:50', '2016-08-15 20:52:50'),
(337, 53, 43, 1, '2016-08-15 20:53:03', '2016-08-15 20:53:03'),
(338, 73, 43, 1, '2016-08-15 20:53:14', '2016-08-15 20:53:46'),
(339, 22, 43, 1, '2016-08-15 20:57:54', '2016-08-16 00:04:57'),
(340, 8, 43, 1, '2016-08-15 20:58:02', '2016-08-15 20:58:02'),
(341, 36, 43, 0, '2016-08-15 20:58:13', '2016-08-15 20:58:13'),
(342, 95, 43, 1, '2016-08-15 20:59:06', '2016-08-15 20:59:06'),
(343, 45, 43, 1, '2016-08-15 20:59:19', '2016-08-15 20:59:19'),
(345, 14, 43, 1, '2016-08-15 21:01:16', '2016-08-15 21:01:16'),
(346, 41, 43, 1, '2016-08-15 21:01:23', '2016-08-15 21:01:23'),
(347, 38, 43, 1, '2016-08-15 21:01:56', '2016-08-15 21:01:56'),
(348, 65, 43, 1, '2016-08-15 21:02:06', '2016-08-15 21:02:06'),
(349, 50, 43, 1, '2016-08-15 21:02:17', '2016-08-15 21:02:17'),
(350, 91, 43, 1, '2016-08-15 21:02:35', '2016-08-15 21:02:35'),
(351, 1, 43, 1, '2016-08-15 21:02:54', '2016-08-15 21:02:54'),
(352, 51, 43, 1, '2016-08-15 21:03:16', '2016-08-15 21:03:16'),
(353, 66, 43, 1, '2016-08-15 21:03:45', '2016-08-15 21:03:45'),
(354, 81, 43, 1, '2016-08-15 21:04:03', '2016-08-15 21:04:03'),
(355, 85, 43, 1, '2016-08-15 21:04:11', '2016-08-15 21:04:48'),
(356, 97, 43, 1, '2016-08-15 21:04:57', '2016-08-15 21:04:57'),
(357, 82, 43, 1, '2016-08-15 21:05:20', '2016-08-15 21:05:20'),
(358, 42, 43, 1, '2016-08-15 21:07:00', '2016-08-17 15:42:31'),
(359, 1, 70, 1, '2016-08-16 15:15:50', '2016-08-16 15:15:50'),
(361, 70, 6, 0, '2016-08-16 15:29:15', '2016-08-16 19:18:23'),
(362, 30, 99, 1, '2016-08-16 16:36:10', '2016-08-16 16:36:25'),
(363, 50, 6, 1, '2016-08-16 16:54:41', '2016-08-16 16:54:41'),
(365, 36, 99, 0, '2016-08-16 17:01:35', '2016-08-17 23:26:03'),
(366, 99, 6, 0, '2016-08-16 19:18:18', '2016-08-16 19:18:18'),
(367, 73, 6, 1, '2016-08-16 19:32:44', '2016-08-16 19:32:44'),
(368, 99, 70, 0, '2016-08-17 16:28:36', '2016-08-17 16:28:36'),
(369, 99, 43, 0, '2016-08-17 19:47:47', '2016-08-17 19:47:47'),
(370, 41, 99, 1, '2016-08-17 20:05:00', '2016-08-17 20:18:44'),
(371, 43, 99, 1, '2016-08-17 20:19:13', '2016-08-17 20:19:13'),
(372, 6, 99, 0, '2016-08-17 20:19:24', '2016-08-18 02:50:31'),
(373, 99, 100, 0, '2016-08-17 20:22:37', '2016-08-17 20:22:37'),
(374, 94, 36, 1, '2016-08-19 12:58:53', '2016-09-21 15:03:41'),
(375, 30, 94, 1, '2016-08-19 14:05:16', '2016-08-19 14:29:36'),
(376, 12, 94, 1, '2016-08-19 14:05:50', '2016-08-19 14:06:03'),
(377, 14, 94, 1, '2016-08-19 14:06:08', '2016-08-19 14:06:50'),
(378, 21, 94, 1, '2016-08-19 14:17:54', '2016-08-19 14:17:54'),
(379, 22, 94, 1, '2016-08-19 14:26:44', '2016-10-13 16:12:55'),
(380, 23, 94, 1, '2016-08-19 14:27:00', '2016-08-19 14:27:00'),
(381, 24, 94, 1, '2016-08-19 14:27:09', '2016-08-19 14:28:43'),
(382, 27, 94, 1, '2016-08-19 14:28:54', '2016-08-19 14:28:54'),
(383, 28, 94, 1, '2016-08-19 14:29:21', '2016-08-19 14:29:21'),
(384, 29, 94, 1, '2016-08-19 14:29:30', '2016-08-19 14:29:30'),
(385, 31, 94, 1, '2016-08-19 14:29:42', '2016-08-19 14:29:42'),
(386, 32, 94, 1, '2016-08-19 14:29:49', '2016-08-19 14:29:49'),
(387, 33, 94, 1, '2016-08-19 14:29:57', '2016-08-19 14:29:57'),
(388, 34, 94, 1, '2016-08-19 14:30:03', '2016-08-19 14:30:03'),
(389, 38, 94, 1, '2016-08-19 14:41:44', '2016-08-19 14:41:44'),
(390, 39, 94, 1, '2016-08-19 14:41:53', '2016-08-19 14:41:53'),
(391, 40, 94, 1, '2016-08-19 14:42:05', '2016-08-19 14:42:05'),
(392, 41, 94, 1, '2016-08-19 14:42:14', '2016-08-19 14:42:14'),
(393, 42, 94, 1, '2016-08-19 14:42:20', '2016-08-19 14:42:20'),
(394, 43, 94, 1, '2016-08-19 14:42:27', '2016-08-19 14:42:27'),
(395, 45, 94, 1, '2016-08-19 14:42:41', '2016-08-19 14:42:41'),
(396, 46, 94, 1, '2016-08-19 14:42:48', '2016-08-19 14:42:48'),
(397, 50, 94, 1, '2016-08-19 14:43:12', '2016-08-19 14:43:12'),
(398, 51, 94, 1, '2016-08-19 14:43:33', '2016-08-19 14:43:33'),
(399, 52, 94, 1, '2016-08-19 14:43:41', '2016-08-19 14:43:41'),
(400, 53, 94, 1, '2016-08-19 14:43:48', '2016-08-19 14:43:48'),
(401, 54, 94, 1, '2016-08-19 14:43:56', '2016-08-19 14:43:56'),
(402, 6, 94, 0, '2016-08-19 14:48:23', '2016-08-20 11:43:09'),
(403, 94, 6, 1, '2016-08-31 01:37:34', '2016-09-10 17:08:03'),
(404, 6, 36, 1, '2016-09-15 16:31:35', '2016-09-15 16:34:45'),
(405, 5, 103, 1, '2016-10-01 16:44:08', '2016-10-06 13:09:31'),
(406, 46, 103, 1, '2016-10-12 17:08:45', '2016-10-12 17:08:45'),
(407, 50, 103, 1, '2016-10-12 17:24:48', '2016-10-12 17:24:48'),
(408, 103, 94, 0, '2016-10-12 18:09:29', '2016-10-12 18:13:37'),
(409, 6, 104, 1, '2016-10-13 15:56:52', '2016-10-15 12:49:21'),
(410, 36, 104, 1, '2016-10-13 15:57:18', '2016-10-13 15:57:18'),
(411, 20, 103, 1, '2016-10-13 16:18:20', '2016-10-13 16:27:48'),
(412, 46, 50, 1, '2016-10-14 10:08:43', '2016-10-15 14:54:11'),
(413, 4, 103, 1, '2016-10-14 13:32:55', '2016-10-17 17:43:00'),
(414, 86, 50, 1, '2016-10-15 12:41:13', '2016-10-15 14:54:54'),
(415, 103, 110, 1, '2016-10-19 12:51:45', '2016-10-19 17:04:14'),
(416, 4, 111, 1, '2016-10-20 11:49:23', '2016-10-20 11:49:23'),
(417, 6, 111, 1, '2016-10-20 11:50:14', '2016-10-20 11:50:14'),
(418, 6, 107, 1, '2016-10-24 15:48:33', '2016-10-26 16:00:36'),
(419, 4, 107, 1, '2016-10-24 16:05:09', '2016-10-24 16:08:20'),
(420, 109, 107, 1, '2016-10-25 11:08:52', '2016-10-25 11:12:32'),
(421, 107, 109, 0, '2016-10-25 11:21:05', '2016-10-26 15:54:18'),
(422, 107, 6, 0, '2016-10-25 11:22:36', '2016-10-26 15:54:38'),
(423, 110, 103, 1, '2016-10-26 11:46:24', '2016-10-26 11:46:24'),
(424, 113, 6, 0, '2016-10-26 14:39:04', '2016-10-26 14:39:29'),
(425, 109, 6, 1, '2016-10-26 15:57:17', '2016-10-26 15:59:00');

-- --------------------------------------------------------

--
-- Table structure for table `sr_relationship_status`
--

CREATE TABLE IF NOT EXISTS `sr_relationship_status` (
  `relationship_id` int(11) NOT NULL AUTO_INCREMENT,
  `relationship_status` varchar(20) NOT NULL,
  `status` tinyint(4) NOT NULL COMMENT '1:active,0:inactive',
  PRIMARY KEY (`relationship_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `sr_relationship_status`
--

INSERT INTO `sr_relationship_status` (`relationship_id`, `relationship_status`, `status`) VALUES
(1, 'Taken', 1),
(2, 'Single', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sr_restricted_name`
--

CREATE TABLE IF NOT EXISTS `sr_restricted_name` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_on` datetime NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `sr_restricted_name`
--

INSERT INTO `sr_restricted_name` (`id`, `user_name`, `created_by`, `created_on`, `updated_by`, `updated_on`, `status`) VALUES
(1, 'nn', 1, '2016-07-19 10:39:32', 1, '2016-07-19 10:39:32', 1),
(2, 'nish', 1, '2016-07-19 10:40:01', 1, '2016-07-19 10:40:01', 1),
(4, 'Hello', 1, '2016-07-19 11:23:33', 1, '2016-07-19 11:23:33', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sr_rewards`
--

CREATE TABLE IF NOT EXISTS `sr_rewards` (
  `reward_id` int(11) NOT NULL AUTO_INCREMENT,
  `reward_title` varchar(100) NOT NULL,
  `reward_icon` varchar(100) NOT NULL,
  `reward_text` varchar(100) NOT NULL,
  `reward_desc` varchar(100) NOT NULL,
  `status` int(3) NOT NULL DEFAULT '1' COMMENT '1:active,0:inactive',
  PRIMARY KEY (`reward_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `sr_rewards`
--

INSERT INTO `sr_rewards` (`reward_id`, `reward_title`, `reward_icon`, `reward_text`, `reward_desc`, `status`) VALUES
(1, 'People Watcher', 'most-watcher.png', 'Visit 30 Profiles Today', 'One of the most active people of the day', 1),
(2, 'Voting Machine', 'voting-machine.png', 'Rate 30 Photos Today', 'One of the best photo raters of the day', 1),
(3, 'Cheeky Monkey', 'cheeky-monkey.png', 'Like 15 Profiles Today', 'One of the biggest flirts of the day', 1),
(4, 'Top Messenger', 'top-messenger.png', 'Message 6 New People Today', 'One of chattiest people of the day', 1),
(5, 'Hottest Reputation', 'hottest-repo.png', 'Get to top of the Fame Reel Today', 'One of the hottest profiles of the day', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sr_role`
--

CREATE TABLE IF NOT EXISTS `sr_role` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(50) NOT NULL,
  `role_description` varchar(255) NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `sr_role`
--

INSERT INTO `sr_role` (`role_id`, `role_name`, `role_description`) VALUES
(1, 'Superadmin', ''),
(2, 'Admin', ''),
(3, 'Master', ''),
(4, 'User', '');

-- --------------------------------------------------------

--
-- Table structure for table `sr_sexuality`
--

CREATE TABLE IF NOT EXISTS `sr_sexuality` (
  `sexuality_id` int(11) NOT NULL AUTO_INCREMENT,
  `sexuality` varchar(20) NOT NULL,
  `status` int(11) NOT NULL COMMENT '1:active,0:inactive',
  PRIMARY KEY (`sexuality_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `sr_sexuality`
--

INSERT INTO `sr_sexuality` (`sexuality_id`, `sexuality`, `status`) VALUES
(1, 'Straight', 1),
(2, 'Gay', 1),
(3, 'Bisexual', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sr_star_sign`
--

CREATE TABLE IF NOT EXISTS `sr_star_sign` (
  `sign_id` int(11) NOT NULL AUTO_INCREMENT,
  `star_sign` varchar(20) NOT NULL,
  `status` int(11) NOT NULL COMMENT '1:active,0:inactive',
  PRIMARY KEY (`sign_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `sr_star_sign`
--

INSERT INTO `sr_star_sign` (`sign_id`, `star_sign`, `status`) VALUES
(1, 'Aries', 1),
(2, 'Taurus', 1),
(3, 'Gemini', 1),
(4, 'Cancer', 1),
(5, 'Leo', 1),
(6, 'Virgo', 1),
(7, 'Libra', 1),
(8, 'Scorpio', 1),
(9, 'Sagittarius', 1),
(10, 'Capricorn', 1),
(11, 'Aquarius', 1),
(12, 'Pisces', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sr_stickers`
--

CREATE TABLE IF NOT EXISTS `sr_stickers` (
  `sticker_id` int(11) NOT NULL AUTO_INCREMENT,
  `sticker_title` varchar(255) NOT NULL,
  `sticker_icon` varchar(255) NOT NULL,
  `sticker_text` varchar(255) NOT NULL,
  `status` int(3) NOT NULL DEFAULT '1' COMMENT '1:active,0:inactive',
  PRIMARY KEY (`sticker_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `sr_stickers`
--

INSERT INTO `sr_stickers` (`sticker_id`, `sticker_title`, `sticker_icon`, `sticker_text`, `status`) VALUES
(1, 'Hottest Reputation', 'hottest-repo.png', 'One of the hottest profiles of the week', 1),
(2, 'Most Viewed', 'most-viewed.png', 'One of the most checked out people of the week', 1),
(3, 'In Demand', 'in-demand.png', 'One of the most liked people of the week', 1),
(4, 'Most Hospitable', 'most-hospitable.png', 'One of the most friendly people on Startrishta', 1),
(5, 'Profile Ninja', 'ninja.png', 'One of the most complete profiles of the week', 1),
(6, 'Most Generous', 'generous.png', 'One of the most generous people of the week', 1),
(7, 'Very Active', 'very-active.png', 'One of the most active people of the week', 1),
(8, 'Super Talkative', 'super-talkactive.png', 'One of the most talkative people of the week', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sr_users`
--

CREATE TABLE IF NOT EXISTS `sr_users` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `gender` tinyint(4) NOT NULL COMMENT '1:Male,2:Female',
  `dob` date NOT NULL,
  `mobile_number` varchar(50) NOT NULL,
  `profile_image` varchar(255) NOT NULL,
  `location` varchar(200) NOT NULL,
  `city` varchar(200) NOT NULL,
  `country` varchar(200) NOT NULL,
  `location_lat` varchar(50) NOT NULL,
  `location_lon` varchar(50) NOT NULL,
  `relationship_status` tinyint(4) NOT NULL,
  `sexuality` tinyint(4) NOT NULL,
  `star_sign` tinyint(4) NOT NULL,
  `body_type` tinyint(4) NOT NULL,
  `complexion` tinyint(4) NOT NULL,
  `height` int(10) NOT NULL,
  `height_in` int(1) NOT NULL COMMENT '1:cm,2:foot',
  `eye_color` tinyint(4) NOT NULL,
  `hair_color` tinyint(4) NOT NULL,
  `language` tinyint(4) NOT NULL,
  `smoking` tinyint(4) NOT NULL COMMENT '0:no,1:yes',
  `drinking` tinyint(4) NOT NULL COMMENT '0:no,1:yes',
  `kids` tinyint(4) NOT NULL COMMENT '1:yes,2:no',
  `education` tinyint(4) NOT NULL,
  `work` varchar(255) NOT NULL,
  `income` tinyint(4) NOT NULL,
  `company` varchar(200) NOT NULL,
  `about_me` varchar(1000) NOT NULL,
  `looking_for` varchar(1000) NOT NULL,
  `here_to` tinyint(4) NOT NULL,
  `here_with_guy` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0:no,1:yes',
  `here_with_girl` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0:no,1:yes',
  `here_age_min` int(11) NOT NULL,
  `here_age_max` int(11) NOT NULL,
  `profile_customize_id` int(11) NOT NULL,
  `photo_preference` tinyint(4) NOT NULL COMMENT '1:girl,2:guy,3:both',
  `tut_status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '1:not show,0:tutorial show',
  `is_online` tinyint(4) NOT NULL DEFAULT '0' COMMENT '1:online,0:offline',
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0' COMMENT '1:yes,0:no',
  `is_verified` tinyint(4) NOT NULL DEFAULT '0' COMMENT '1:yes,0:no',
  `is_suspended` tinyint(4) NOT NULL DEFAULT '0' COMMENT '1:yes,0:no',
  `is_erase` tinyint(4) NOT NULL DEFAULT '0' COMMENT '1:yes,0:no',
  `is_mobileVerified` tinyint(4) NOT NULL DEFAULT '0' COMMENT '1:verified',
  `show_online` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1:yes,0:no',
  `show_distance` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1:yes,0:no',
  `view_profile` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1:members only,0:anyone',
  `photo_comment` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0:members only,1:nobody',
  `hide_presence` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0:no,1:yes',
  `hide_vip` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0:no,1:yes',
  `is_account_freeze` tinyint(4) NOT NULL COMMENT '1:yes,0:no',
  `msg_plan` varchar(2) NOT NULL COMMENT '0: Delete all 1: Block user 2: Decide on',
  `dob_update` int(1) NOT NULL COMMENT '0:not updated',
  `location_service` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0:off;1:on',
  `mobile_otp` varchar(10) NOT NULL,
  `otp_expire` datetime NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=102 ;

--
-- Dumping data for table `sr_users`
--

INSERT INTO `sr_users` (`uid`, `user_id`, `user_name`, `gender`, `dob`, `mobile_number`, `profile_image`, `location`, `city`, `country`, `location_lat`, `location_lon`, `relationship_status`, `sexuality`, `star_sign`, `body_type`, `complexion`, `height`, `height_in`, `eye_color`, `hair_color`, `language`, `smoking`, `drinking`, `kids`, `education`, `work`, `income`, `company`, `about_me`, `looking_for`, `here_to`, `here_with_guy`, `here_with_girl`, `here_age_min`, `here_age_max`, `profile_customize_id`, `photo_preference`, `tut_status`, `is_online`, `is_deleted`, `is_verified`, `is_suspended`, `is_erase`, `is_mobileVerified`, `show_online`, `show_distance`, `view_profile`, `photo_comment`, `hide_presence`, `hide_vip`, `is_account_freeze`, `msg_plan`, `dob_update`, `location_service`, `mobile_otp`, `otp_expire`, `created_on`, `updated_on`) VALUES
(1, 1, 'Shilpi Singh', 2, '1991-01-21', '919958225820', '1476096948_download_(1).jpg', 'Gorakhpur, Uttar Pradesh, India', 'Gorakhpur', 'India', '26.76055449999999', '83.37316750000002', 1, 1, 11, 4, 3, 68, 0, 4, 4, 0, 1, 1, 1, 4, 'Software Engg', 2, 'Vibes Comm Pvt. Ltd.', 'helloOOOOOOOOOOOOOOOO aksuyfrgsej aFGEWW UWGF DJASGB DS,BAJFUISEBD GRUIGES DVSUDYGHR DIUDRGHD', '', 2, 1, 1, 18, 72, 8, 0, 1, 1, 0, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, '', 15, 1, '3405', '2016-09-14 12:50:31', '0000-00-00 00:00:00', '2016-10-10 16:25:57'),
(3, 8, 'Devendra', 1, '1989-01-25', '919958225820', '1460980570_download_(1).jpg', 'Noida, Uttar Pradesh, India', 'Noida', 'India', '28.5355161', '77.39102649999995', 0, 0, 0, 0, 0, 165, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 'Vibes communication ', '', '', 1, 1, 1, 18, 45, 0, 2, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, '492935', '2016-09-17 13:33:56', '2015-10-15 00:00:00', '2016-04-18 17:26:16'),
(4, 9, 'Abhay', 1, '1983-08-29', '', '1446292362_1440081198_IMG_20150101_173403.jpg', 'Delhi, India', 'New Delhi', 'India', '28.6139391', '77.20902120000005', 2, 1, 5, 3, 2, 400, 0, 2, 2, 0, 1, 1, 2, 4, '', 0, '', 'Hello Every one,,, i am here for making friends..... ', 'looking for the best match for my adventure trip in US......', 3, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2015-08-20 20:03:18'),
(5, 5, 'Gulshan', 1, '1986-08-15', '', '1446292489_1443521484_12033027_892071174164107_1445108986438483993_n.jpg', 'Delhi', '', '', '', '', 1, 1, 12, 1, 3, 170, 0, 1, 1, 2, 1, 1, 2, 4, 'Manager', 2, 'Vibes Comm Pvt Ltd', '', '', 2, 1, 1, 21, 36, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2015-10-31 17:24:49'),
(7, 4, 'ABHAY', 1, '1983-08-29', '', '1443158307_14fd3fb.jpg', 'Noida, Uttar Pradesh, India', 'Noida', 'India', '28.5355161', '77.39102649999995', 2, 1, 1, 1, 2, 170, 0, 2, 2, 1, 1, 0, 1, 4, 'Manager', 3, 'Vibes Communications', 'Hello Everyone.... i am here to make friend and chat.... lets share our thoughts... hope to see someone with great humor.', 'someone for chat... who have good sense of humor and listen others.', 2, 1, 1, 13, 63, 0, 3, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, '', '0000-00-00 00:00:00', '2015-08-27 13:55:49', '2015-08-27 13:55:58'),
(8, 6, 'Rami Malek', 1, '1981-02-25', '447793960336', '1454669667_dreamstime_xs_32361825.jpg', 'Noida, Uttar Pradesh, India', 'Noida', 'India', '28.5355161', '77.39102649999995', 1, 1, 7, 1, 3, 161, 0, 3, 3, 0, 1, 1, 2, 1, 'Manager', 1, 'CQG LLC', '', '', 2, 1, 1, 18, 80, 0, 2, 1, 1, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, '', 18, 1, '682499', '2016-10-07 21:57:26', '2015-08-30 22:18:43', '2016-08-18 14:18:02'),
(9, 12, 'satvendra singh', 1, '1989-05-05', '', '', 'Bijnor, Uttar Pradesh, India', 'Bijnor', 'India', '29.3724422', '78.13584719999994', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '', '', '', 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, '', '0000-00-00 00:00:00', '2015-09-25 10:23:08', '2015-09-25 10:23:08'),
(10, 10, 'Pawan', 1, '1989-09-12', '', '1443163573_1912197_847603851925056_1636885097142150644_n.jpg', 'New Delhi, Delhi, India', 'New Delhi', 'India', '28.6139391', '77.20902120000005', 2, 1, 6, 1, 4, 180, 0, 2, 2, 0, 0, 0, 2, 3, 'Sr Web Design', 2, 'not decided yet', 'will tell you later', 'kuch bhi', 3, 1, 1, 18, 80, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, '', '0000-00-00 00:00:00', '2015-09-25 12:15:29', '2015-09-25 12:16:13'),
(11, 14, 'Monalisha Singh', 2, '1986-09-18', '', '', 'Noida, Uttar Pradesh, India', 'Noida', 'India', '28.5355161', '77.39102649999995', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '', '', '', 1, 0, 0, 0, 0, 0, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, '', '0000-00-00 00:00:00', '2015-09-26 14:09:49', '2015-09-26 14:09:49'),
(13, 20, 'Shilpi Singh', 2, '1991-08-29', '', '1450674406_11046625_1564294640500643_2783801732771841737_nqsaw.jpg', 'Gorakhpur, Uttar Pradesh, India', 'Gorakhpur', 'India', '26.7605545', '83.37316750000002', 2, 1, 11, 2, 2, 171, 0, 1, 1, 2, 0, 0, 2, 4, 'Software Developer', 2, 'Vibes Comm Pvt Ltd', 'helloOOOOOOOOOOOOOOOOooooooooooooooo !!!!!!!!!!!!!!!!!!!!!!!!1 :)', 'helloOOOOOOOOOOOOOOOOooooooooooooooo !!!!!!!!!!!!!!!!!!!!!!!!1 :)', 2, 1, 1, 32, 57, 0, 2, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 2, 0, '', '0000-00-00 00:00:00', '2015-09-28 16:59:27', '2015-12-29 11:01:22'),
(14, 21, 'Rinku', 2, '1986-03-15', '', '1443521934_IMG_20150711_133513.jpg', 'Noida, Uttar Pradesh, India', 'Noida', 'India', '28.5355161', '77.39102649999995', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '', '', '', 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, '', '0000-00-00 00:00:00', '2015-09-29 15:14:55', '2015-09-29 15:14:55'),
(15, 22, 'Deepak Singh', 1, '1990-02-20', '', '1443521364_ice_cream.jpg', 'Delhi, India', 'New Delhi', 'India', '28.6139391', '77.20902120000005', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '', '', '', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, '', '0000-00-00 00:00:00', '2015-09-29 15:17:37', '2015-09-29 15:39:24'),
(16, 23, 'Ashish', 1, '1991-03-03', '', '1443520628_images.jpg', 'Delhi, India', 'New Delhi', 'India', '28.6139391', '77.20902120000005', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '', '', '', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, '', '0000-00-00 00:00:00', '2015-09-29 15:23:55', '2015-09-29 15:23:55'),
(17, 24, 'Rajlakshmi', 2, '1989-05-17', '', '', 'Noida, Uttar Pradesh, India', 'Noida', 'India', '28.5355161', '77.39102649999995', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '', '', '', 3, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, '', '0000-00-00 00:00:00', '2015-09-29 15:25:37', '2015-09-29 15:25:37'),
(18, 3, 'Gulshan KUmar', 1, '1988-04-08', '', '', 'Noida Extension, Noida, Uttar Pradesh, India', 'Noida', 'India', '28.5318691', '77.40080009999997', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '', '', '', 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, '', '0000-00-00 00:00:00', '2015-09-29 15:38:53', '2015-09-29 15:41:34'),
(21, 27, 'Nishith Srivastava', 1, '1986-11-18', '', '1447741666_DSC_0217.jpg', 'India', 'Khandwa', 'India', '20.593684', '78.96288000000004', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '', '', '', 2, 1, 1, 21, 79, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 1, 0, '', '0000-00-00 00:00:00', '2015-09-29 19:22:21', '2015-12-25 07:31:00'),
(23, 28, 'Imran', 1, '1982-05-07', '', '', 'London, United Kingdom', 'London', 'United Kingdom', '51.5073509', '-0.12775829999998223', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '', '', '', 3, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, '', '0000-00-00 00:00:00', '2015-09-30 01:40:54', '2015-09-30 01:40:54'),
(24, 29, 'Gulshana Kahlon', 2, '1991-09-04', '', '', 'Jaipur, Rajasthan, India', 'Jaipur', 'India', '26.9124336', '75.78727090000007', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '', '', '', 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, '', '0000-00-00 00:00:00', '2015-10-09 16:39:48', '2015-10-09 16:42:18'),
(25, 30, 'testuser', 1, '2015-10-01', '', '', 'Delhi, India', 'New Delhi', 'India', '28.6139391', '77.20902120000005', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '', '', '', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, '', '0000-00-00 00:00:00', '2015-10-09 22:04:18', '2015-10-09 22:04:18'),
(26, 31, 'Parss', 1, '2015-10-11', '919958225820', '', 'Delhi, India', 'New Delhi', 'India', '28.6139391', '77.20902120000005', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '', '', '', 3, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, '910322', '2016-09-17 12:41:56', '2015-10-20 18:07:48', '2015-10-20 18:08:18'),
(27, 32, 'Imran', 2, '1999-04-26', '', '', 'Oxford Street, London, United Kingdom', 'London', 'United Kingdom', '51.51530899999999', '-0.14128890000006322', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '', '', '', 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, '', '0000-00-00 00:00:00', '2015-10-28 03:47:26', '2015-10-28 03:47:26'),
(28, 33, 'Mani', 2, '1992-03-05', '', '', 'Delhi, India', 'New Delhi', 'India', '28.6139391', '77.20902120000005', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '', '', '', 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, '', '0000-00-00 00:00:00', '2015-10-29 15:59:51', '2015-10-29 15:59:51'),
(29, 34, 'Shruti', 2, '1994-01-01', '919958225820', '1456125484_11046625_1564294640500643_2783801732771841737_nqsaw.jpg', 'Patna, Bihar, India', 'Patna', 'India', '25.5940947', '85.13756450000005', 1, 1, 12, 1, 2, 0, 0, 1, 1, 0, 0, 0, 2, 4, '', 0, '', '', '', 2, 1, 1, 18, 80, 0, 3, 1, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, '285813', '2016-09-17 12:16:14', '2015-11-02 17:30:46', '2016-02-22 12:48:04'),
(31, 36, 'Dharm Dev Gangwar', 1, '1979-01-26', '919868346518', '1465042540_amrood.jpg', 'Noida, Uttar Pradesh, India', 'Noida', 'India', '28.5355161', '77.39102649999995', 1, 1, 9, 1, 3, 159, 0, 2, 2, 0, 0, 0, 1, 4, 'Tester', 2, 'Vibes', '', '', 1, 1, 1, 18, 80, 0, 3, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, '', 3, 0, '221395', '2016-10-12 18:11:56', '2015-11-03 16:46:53', '2016-08-08 15:51:54'),
(32, 37, 'Aleem Javed', 1, '1994-01-19', '', '1446804891_logo.png', 'Noida, Uttar Pradesh, India', 'Noida', 'India', '28.5355161', '77.39102649999995', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '', '', '', 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, '', '0000-00-00 00:00:00', '2015-11-06 15:44:22', '2015-11-06 15:44:51'),
(33, 38, 'Ishtiyaque Ansari', 1, '1984-08-10', '', '1447070487_Md-Ishtiyaque-Ansari.jpg', 'Siwan, Bihar, India', 'Jasauli Pakauli', 'India', '26.1689087', '84.39625350000006', 1, 1, 5, 1, 3, 173, 0, 2, 2, 0, 0, 0, 1, 2, '', 2, '', '', 'Friends', 1, 1, 1, 18, 32, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, '', '0000-00-00 00:00:00', '2015-11-09 16:00:14', '2015-11-09 17:31:27'),
(34, 39, 'testing', 1, '1915-11-17', '', '', 'Delhi, India', 'New Delhi', 'India', '28.6139391', '77.20902120000005', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '', '', '', 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, '', '0000-00-00 00:00:00', '2015-11-17 13:39:10', '2015-11-17 13:39:10'),
(35, 40, 'Varun Kumar', 1, '1994-01-26', '', '1447836615_varun2.jpg', 'Delhi, India', 'New Delhi', 'India', '28.6139391', '77.20902120000005', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '', '', '', 2, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, '', '0000-00-00 00:00:00', '2015-11-18 13:08:49', '2015-11-18 14:20:15'),
(36, 41, 'Imran', 1, '1990-10-17', '', '', 'Oxford Street, London, United Kingdom', 'London', 'United Kingdom', '51.51530899999999', '-0.14128890000006322', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '', '', '', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, '', '0000-00-00 00:00:00', '2015-11-25 21:04:54', '2015-11-25 21:04:54'),
(37, 42, 'Asif ', 1, '1982-05-05', '', '', 'Cambridge, United Kingdom', 'Cambridge', 'United Kingdom', '52.205337', '0.12181699999996454', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '', '', '', 3, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '', 0, 0, '', '0000-00-00 00:00:00', '2015-12-08 12:20:35', '2015-12-08 12:20:35'),
(38, 43, 'Imran', 1, '1982-03-03', '', '1471274485_dreamstime_xs_21180961_-_Copy.jpg', 'London, United Kingdom', 'London', 'United Kingdom', '51.5073509', '-0.12775829999998223', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '', '', '', 1, 1, 1, 18, 80, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '', 0, 0, '', '0000-00-00 00:00:00', '2015-12-11 12:15:11', '2016-08-15 20:51:25'),
(44, 45, 'GULSHAN', 1, '1988-07-01', '', '', 'Gurgaon, Haryana, India', 'Gurgaon', 'India', '28.4594965', '77.02663830000006', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '', '', '', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, '', '0000-00-00 00:00:00', '2016-01-07 15:42:47', '2016-01-07 15:42:47'),
(45, 46, 'abc', 1, '1990-01-01', '', '', 'Pakistan', '', 'Pakistan', '30.375321', '69.34511599999996', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '', '', '', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, '', '0000-00-00 00:00:00', '2016-01-07 18:36:54', '2016-01-07 18:36:54'),
(47, 50, 'shilpi', 2, '1990-01-01', '917827483091', '1453207682_download.jpg', 'Kanpur, Uttar Pradesh, India', 'Kanpur', 'India', '26.449923', '80.3318736', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '', '', '', 1, 1, 1, 18, 72, 0, 0, 1, 0, 0, 0, 0, 0, 1, 1, 0, 0, 1, 0, 0, 0, '', 2, 1, '127195', '2016-10-12 11:04:28', '2016-01-16 12:56:27', '2016-01-23 11:11:36'),
(48, 51, 'shilpisingh', 2, '1991-01-01', '', '', 'Lucknow, Uttar Pradesh, India', 'Lucknow', 'India', '26.8466937', '80.94616599999995', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '', '', '', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, '', '0000-00-00 00:00:00', '2016-01-16 13:10:02', '2016-01-16 13:10:02'),
(49, 52, 'shilpi211991', 2, '1992-01-01', '', '', 'Gujarat, India', 'Tajpar', 'India', '22.258652', '71.19238050000001', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '', '', '', 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, '', '0000-00-00 00:00:00', '2016-01-16 13:57:46', '2016-01-16 13:57:46'),
(50, 53, 'chaudr0039.uso', 1, '1981-10-22', '', '', 'Germany', 'Niederdorla', 'Germany', '51.165691', '10.451526000000058', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '', '', '', 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, '', '0000-00-00 00:00:00', '2016-01-18 02:46:10', '2016-01-18 02:46:10'),
(51, 54, 'Nish', 1, '1986-11-18', '8586932863', '', 'Delhi, India', 'New Delhi', 'India', '28.6139391', '77.20902120000005', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '', '', '', 2, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, '229244', '2016-10-12 10:59:20', '2016-01-21 11:39:31', '2016-01-21 11:39:31'),
(52, 55, 'Pawan ', 1, '1989-01-01', '', '1453887789_21418-200.png', 'Delhi, India', 'New Delhi', 'India', '28.6139391', '77.20902120000005', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '', '', '', 2, 1, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 1, 0, '', '0000-00-00 00:00:00', '2016-01-27 15:12:02', '2016-05-31 17:13:13'),
(53, 56, 'Pia B', 2, '1988-05-10', '', '1454670312_dreamstime_xs_31966650.jpg', 'Mumbai, Maharashtra, India', 'Mumbai', 'India', '19.0759837', '72.87765590000004', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '', '', '', 2, 1, 0, 18, 80, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 1, '', '0000-00-00 00:00:00', '2016-02-04 20:16:11', '2016-02-04 20:17:04'),
(55, 65, 'Priyanka', 2, '1996-01-01', '', '1457701829_Penguins.jpg', 'Gorakhpur, Uttar Pradesh, India', 'Gorakhpur', 'India', '26.76055449999999', '83.37316750000002', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '', '', '', 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, '', '0000-00-00 00:00:00', '2016-03-11 17:23:15', '2016-03-11 18:40:29'),
(56, 66, 'Sudha', 2, '1992-05-01', '', '', 'Gorakhpur, Uttar Pradesh, India', 'Gorakhpur', 'India', '26.76055449999999', '83.37316750000002', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '', '', '', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, '', '0000-00-00 00:00:00', '2016-03-11 17:23:53', '2016-03-11 17:23:53'),
(57, 68, 'Manisha Sen', 2, '1990-07-04', '', '1460800524_dreamstime_xs_2316986.jpg', 'Glasgow, United Kingdom', 'Glasgow', 'United Kingdom', '55.864237', '-4.251805999999988', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '', '', '', 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, '', '0000-00-00 00:00:00', '2016-04-16 15:24:45', '2016-04-16 15:25:24'),
(58, 69, 'v', 1, '1970-01-01', '', '1464935224_collaboration-B2B.jpg', 'New Delhi, Delhi, India', 'New Delhi', 'India', '28.6139391', '77.20902120000005', 1, 1, 4, 1, 2, 0, 0, 1, 2, 0, 0, 0, 1, 3, '', 2, '', '', 'friends', 2, 1, 1, 18, 80, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 14, 0, '', '0000-00-00 00:00:00', '2016-04-26 17:18:45', '2016-06-03 11:57:04'),
(59, 70, 'mr fantastic', 1, '1990-03-01', '', '1471272811_dreamstime_xs_37874624.jpg', 'London, United Kingdom', 'London', 'United Kingdom', '51.5073509', '-0.12775829999998223', 0, 0, 0, 0, 0, 173, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '', '', '', 1, 0, 1, 18, 80, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, '', 4, 0, '', '0000-00-00 00:00:00', '2016-05-22 21:23:18', '2016-08-17 16:27:48'),
(60, 71, 'dan', 1, '1991-01-01', '', '', 'Delhi, India', 'New Delhi', 'India', '28.6139391', '77.20902120000005', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, '', '0000-00-00 00:00:00', '2016-05-27 17:41:20', '2016-05-27 17:41:20'),
(61, 2, 'Neha', 2, '1995-01-26', '', '1464946379_under.jpg', 'New Delhi, Delhi, India', 'New Delhi', 'India', '28.6139391', '77.20902120000005', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '', '', '', 2, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, '', '0000-00-00 00:00:00', '2016-06-03 15:01:05', '2016-06-03 15:03:05'),
(62, 72, 'Abhay', 1, '1995-07-05', '', '1465037417_Abhay_Yadav.jpg', 'New Delhi, Delhi, India', 'New Delhi', 'India', '28.6139391', '77.20902120000005', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '', '', '', 3, 1, 1, 18, 80, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 1, 0, '', '0000-00-00 00:00:00', '2016-06-04 16:19:54', '2016-06-04 16:28:09'),
(63, 73, 'ddg', 1, '1990-01-30', '', '1465040760_dd_-_Copy.jpg', 'New Delhi, Delhi, India', 'New Delhi', 'India', '28.6139391', '77.20902120000005', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '', '', '', 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, '', '0000-00-00 00:00:00', '2016-06-04 17:15:46', '2016-06-04 17:16:18'),
(64, 74, 'Ratnesh', 1, '1990-01-31', '', '1465042801_ratnesh.jpg', 'New Delhi, Delhi, India', 'New Delhi', 'India', '28.6139391', '77.20902120000005', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, '', '0000-00-00 00:00:00', '2016-06-04 17:48:33', '2016-06-04 17:50:01'),
(65, 75, 'Anuj Kumar', 2, '1990-01-30', '', '1465043287_amrood.jpg', 'New Delhi, Delhi, India', 'New Delhi', 'India', '28.6139391', '77.20902120000005', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '', '', '', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, '', '0000-00-00 00:00:00', '2016-06-04 17:56:47', '2016-06-04 17:58:07'),
(66, 76, 'Mona', 2, '1990-01-30', '', '1465043920_female.png', 'New Delhi, Delhi, India', 'New Delhi', 'India', '28.6139391', '77.20902120000005', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, '', '0000-00-00 00:00:00', '2016-06-04 18:03:32', '2016-06-04 18:08:40'),
(67, 77, 'Sujata', 2, '1990-01-30', '', '1465044233_female.png', 'New Delhi, Delhi, India', 'New Delhi', 'India', '28.6139391', '77.20902120000005', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, '', '0000-00-00 00:00:00', '2016-06-04 18:12:56', '2016-06-04 18:13:53'),
(68, 78, 'Vijay', 1, '1990-01-30', '', '1465044471_pradeep.jpg', 'New Delhi, Delhi, India', 'New Delhi', 'India', '28.6139391', '77.20902120000005', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, '', '0000-00-00 00:00:00', '2016-06-04 18:15:55', '2016-06-04 18:17:51'),
(69, 79, 'Test', 2, '1985-07-03', '', '1465197504_abhay.jpg', 'New Delhi, Delhi, India', 'New Delhi', 'India', '28.6139391', '77.20902120000005', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '', '', '', 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, '', '0000-00-00 00:00:00', '2016-06-06 12:47:58', '2016-06-06 12:48:39'),
(70, 80, 'Jitendra', 2, '1990-01-30', '', '1465198259_football2735.jpg', 'New Delhi, Delhi, India', 'New Delhi', 'India', '28.6139391', '77.20902120000005', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '', '', '', 2, 0, 1, 18, 80, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, '', '0000-00-00 00:00:00', '2016-06-06 13:00:47', '2016-06-06 13:01:10'),
(71, 81, 'Sudha', 2, '1988-02-14', '', '1465199492_female.png', 'New Delhi, Delhi, India', 'New Delhi', 'India', '28.6139391', '77.20902120000005', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '', '', '', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, '', '0000-00-00 00:00:00', '2016-06-06 13:21:24', '2016-06-06 13:21:41'),
(72, 82, 'Vivek Kumar', 1, '1988-01-04', '', '1465199613_suv1.jpg', 'New Delhi, Delhi, India', 'New Delhi', 'India', '28.6139391', '77.20902120000005', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '', 'Loram Ipsum Text; Loram Ipsum Text; Loram Ipsum Text; Loram Ipsum Tex', '', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, '', '0000-00-00 00:00:00', '2016-06-06 13:23:17', '2016-06-06 13:23:46'),
(73, 83, 'Anubhav Saroha', 1, '1988-02-09', '', '', 'Noida, Uttar Pradesh, India', 'Noida', 'India', '28.5355161', '77.39102649999995', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '', '', '', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, '', '0000-00-00 00:00:00', '2016-06-11 15:11:44', '2016-06-11 15:11:44'),
(74, 84, 'cduffy9500', 1, '1989-06-08', '', '', 'Manchester, United Kingdom', '', 'United Kingdom', '53.4807593', '-2.2426305000000184', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '', '', '', 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, '', '0000-00-00 00:00:00', '2016-06-22 19:34:51', '2016-06-22 19:34:51'),
(75, 85, 'Surabhi', 2, '1984-09-20', '', '', 'Delhi, India', 'New Delhi', 'India', '28.6139391', '77.20902120000005', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '', '', '', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, '', '0000-00-00 00:00:00', '2016-07-02 12:11:06', '2016-07-02 12:11:21'),
(76, 86, 'Abhay Yadav', 1, '1983-08-29', '', '1467701030_ABHAY_YADAV.jpg', 'Noida, Uttar Pradesh, India', 'Noida', 'India', '28.5355161', '77.39102649999995', 2, 1, 6, 3, 3, 0, 0, 2, 1, 0, 1, 1, 1, 4, '', 2, 'Vibes Communications Pvt. Ltd.', '', 'looking for someone who loves Traveling and enjoys exploring new places. looking for someonw who respects and care about my views.', 1, 0, 1, 18, 26, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, '', '0000-00-00 00:00:00', '2016-07-05 11:35:57', '2016-07-05 11:35:57'),
(77, 87, 'Dharm Dev Gangwar', 1, '1980-04-06', '', '1468401101_dharm.jpg', 'Noida, Uttar Pradesh, India', 'Noida', 'India', '28.5355161', '77.39102649999995', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 3, 0, '', '0000-00-00 00:00:00', '2016-07-13 14:41:25', '2016-07-13 16:55:26'),
(78, 88, 'Dharm New', 1, '1980-04-06', '', '', 'Delhi, India', 'New Delhi', 'India', '28.7040592', '77.10249019999992', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, '', '0000-00-00 00:00:00', '2016-07-13 16:59:19', '2016-07-13 16:59:19'),
(79, 89, 'Abhay Yadav', 1, '1983-05-05', '', '1468409936_abhay.jpg', 'Noida, Uttar Pradesh, India', 'Noida', 'India', '28.5355161', '77.39102649999995', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '', '', '', 1, 0, 0, 0, 0, 0, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, '', '0000-00-00 00:00:00', '2016-07-13 17:08:25', '2016-07-13 17:09:10'),
(80, 90, 'dha.rm dev', 1, '1990-01-30', '', '1468488068_dharm.jpg', 'Noida, Uttar Pradesh, India', 'Noida', 'India', '28.5355161', '77.39102649999995', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '', '', '', 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, '', '0000-00-00 00:00:00', '2016-07-14 14:45:46', '2016-07-14 14:51:16'),
(81, 91, 'Ratnesh', 1, '1990-01-30', '', '1468489344_ratnesh.jpg', 'Noida, Uttar Pradesh, India', 'Noida', 'India', '28.5355161', '77.39102649999995', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '', '', '', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, '', '0000-00-00 00:00:00', '2016-07-14 15:12:12', '2016-07-14 15:12:32'),
(82, 92, 'Charu Pandey', 2, '1990-07-13', '', '1469168550_13177770_440806836116252_269850917191901111_n.png', 'Gorakhpur Junction, Gorakhpur, Uttar Pradesh, India', 'Gorakhpur', 'India', '26.7595215', '83.38175469999999', 2, 1, 11, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '', 'hello sakhg sadcsegf sjkf fhehjfn eelfrj fldewf ,wd,we flew,jf wejhfgjwenf lewfvdd', '', 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, '', '0000-00-00 00:00:00', '2016-07-22 11:34:57', '2016-07-22 11:35:34'),
(83, 94, 'Ashwani', 1, '1993-09-01', '', '1470819632_titan1a.jpg', 'Noida, Uttar Pradesh, India', 'Noida', 'India', '28.5355161', '77.39102649999995', 2, 1, 1, 2, 4, 178, 0, 5, 4, 0, 0, 0, 2, 3, 'Network Admin', 2, 'Vibes Communications', 'Myself Ashwani, I am a Network Admin in Vibes Communication Pvt. Ltd., Noida.', 'Persons Who Working in Information Technology field, & Fun Loving guys.', 1, 1, 1, 18, 25, 0, 0, 1, 1, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0, 0, 0, '', 1, 0, '', '0000-00-00 00:00:00', '2016-07-27 13:00:15', '2016-10-24 21:04:48'),
(84, 95, 'dsfgdfgdfgdfg', 2, '1990-02-01', '', '', 'dfsgdfsgsdfgdfgd', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '', '', '', 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, '', '0000-00-00 00:00:00', '2016-07-28 10:30:21', '2016-07-28 10:30:21'),
(85, 96, 'Sonia S', 2, '1987-06-02', '', '1470604016_dreamstime_xs_3218896.jpg', 'London, United Kingdom', 'London', 'United Kingdom', '51.5073509', '-0.12775829999998223', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '', '', '', 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, '', '0000-00-00 00:00:00', '2016-08-08 02:30:48', '2016-08-08 02:30:48'),
(86, 97, 'Vidya D', 2, '1987-03-09', '', '1470606073_dreamstime_xs_6710426.jpg', 'Chennai, Tamil Nadu, India', 'Chennai', 'India', '13.0826802', '80.27071840000008', 1, 1, 2, 3, 1, 168, 0, 1, 2, 0, 0, 0, 1, 2, 'Middle school teacher', 2, 'Enterprise inc', 'I am fun outgoing, i like to go to the cinema alot', 'I would like to look for someone who enjoys nature walks and bollywood films', 1, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, '', '0000-00-00 00:00:00', '2016-08-08 03:10:58', '2016-08-08 03:11:24'),
(87, 99, 'Meera Shah', 2, '1991-07-07', '', '1471445325_dreamstime_xs_6794951.jpg', 'Noida, Uttar Pradesh, India', 'Noida', 'India', '28.5355161', '77.39102649999995', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'The tea girl', 2, 'Google inc', 'I enjoy making cakes and eating out. i love the cinema, my favorite band is chumbawumba', '', 1, 1, 1, 18, 80, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, '', 0, 0, '', '0000-00-00 00:00:00', '2016-08-16 14:17:12', '2016-08-17 20:18:44'),
(88, 100, 'Shahrukh', 1, '1985-02-05', '', '1471445474_dreamstime_xs_18399392.jpg', 'London, United Kingdom', 'London', 'United Kingdom', '51.5073509', '-0.12775829999998223', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '', '', '', 1, 0, 1, 18, 80, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, '', '0000-00-00 00:00:00', '2016-08-17 20:20:58', '2016-08-17 20:21:19'),
(89, 101, 'assad', 1, '1960-03-09', '', '', 'Dubai - United Arab Emirates', 'Dubai', 'United Arab Emirates', '25.2048493', '55.270782800000006', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, '', '0000-00-00 00:00:00', '2016-08-25 16:08:59', '2016-08-25 16:08:59'),
(90, 102, 'Dummy Singh', 1, '1986-11-18', '', '', 'Noida, Uttar Pradesh, India', 'Noida', 'India', '28.5355161', '77.39102649999995', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '', '', '', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, '', '0000-00-00 00:00:00', '2016-09-02 12:09:27', '2016-09-02 12:09:27'),
(91, 103, 'Chandrika', 2, '1990-11-30', '918447211728', '1475302771_dfghfgh.jpg', 'Chandigarh, India', 'Chandigarh', 'India', '30.7333148', '76.7794179', 1, 1, 9, 1, 0, 153, 0, 2, 0, 0, 0, 0, 0, 0, '', 0, '', 'PHP Developer', '', 2, 0, 1, 18, 70, 0, 0, 1, 1, 0, 0, 0, 0, 1, 1, 0, 0, 1, 0, 0, 0, '0', 4, 0, '628353', '2016-10-25 13:30:09', '2016-09-30 17:56:48', '2016-10-01 13:01:35'),
(92, 104, 'Upendra', 1, '1990-10-17', '', '', 'Noida, Uttar Pradesh, India', 'Noida', 'India', '28.5355161', '77.39102649999995', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1, 0, 0, 0, '', 0, 0, '', '0000-00-00 00:00:00', '2016-10-13 15:15:09', '2016-10-13 15:15:09'),
(93, 105, 'rawat', 1, '1991-09-29', '', '', 'Noida, Uttar Pradesh, India', 'Noida', 'India', '28.5355161', '77.39102649999995', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1, 0, 0, 0, '', 0, 0, '', '0000-00-00 00:00:00', '2016-10-13 16:30:50', '2016-10-13 16:30:50'),
(94, 106, 'mani', 2, '1992-09-05', '', '', 'Noida, Uttar Pradesh, India', 'Noida', 'India', '28.5355161', '77.39102649999995', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1, 0, 0, 0, '', 0, 0, '', '0000-00-00 00:00:00', '2016-10-14 17:16:21', '2016-10-14 17:16:21'),
(95, 107, 'Prashant Mishra', 1, '1981-06-22', '918285812991', '1477302648_13015156_1186266661392211_2138553562166932681_n.jpg', 'Noida, Uttar Pradesh, India', 'Noida', 'India', '28.5355161', '77.39102649999995', 2, 1, 8, 0, 2, 170, 0, 1, 2, 0, 0, 0, 2, 4, 'Manager', 2, 'XYZ LLC', '', '', 2, 1, 1, 18, 80, 0, 0, 1, 1, 0, 0, 0, 0, 1, 0, 1, 0, 1, 0, 0, 0, '', 0, 0, '686272', '2016-10-25 11:04:57', '2016-10-17 10:31:02', '2016-10-24 14:13:26'),
(96, 108, 'kapil', 1, '1992-04-03', '', '', 'Delhi, India', 'New Delhi', 'India', '28.6618976', '77.22739580000007', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1, 0, 0, 0, '', 0, 0, '', '0000-00-00 00:00:00', '2016-10-17 15:41:46', '2016-10-17 15:41:46'),
(97, 109, 'Vedansh ', 1, '1990-03-17', '918586932863', '1091476700563.jpg', 'New Delhi, Delhi, India', 'New Delhi', 'India', '28.6139391', '77.20902120000005', 2, 1, 8, 1, 2, 172, 0, 2, 1, 0, 0, 0, 2, 4, 'Manager', 2, 'Vibes Communications', '', '', 2, 0, 1, 18, 34, 0, 0, 1, 1, 0, 0, 0, 0, 0, 1, 1, 1, 1, 0, 0, 0, '', 1, 0, '752211', '2016-10-17 16:49:15', '2016-10-17 16:03:43', '2016-10-17 16:29:36'),
(98, 110, 'Chandrika', 2, '1990-11-28', '', '1476861765_passport_size_copy.jpg', 'Noida, Uttar Pradesh, India', 'Noida', 'India', '28.5355161', '77.39102649999995', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '', '', '', 2, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1, 0, 0, 0, '', 0, 0, '', '0000-00-00 00:00:00', '2016-10-19 12:50:15', '2016-10-19 12:52:45'),
(99, 111, 'Meena', 2, '1996-01-01', '', '1476944333_download_(1).jpg', 'Noida, Uttar Pradesh, India', 'Noida', 'India', '28.5355161', '77.39102649999995', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '', '', '', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1, 0, 0, 0, '', 0, 0, '', '0000-00-00 00:00:00', '2016-10-20 11:48:27', '2016-10-20 11:48:59'),
(100, 112, 'Nidhi', 2, '1990-11-28', '', '1476944832_passport_size_copy.jpg', 'Noida, Uttar Pradesh, India', 'Noida', 'India', '28.5355161', '77.39102649999995', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '', '', '', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1, 0, 0, 0, '', 0, 0, '', '0000-00-00 00:00:00', '2016-10-20 11:56:32', '2016-10-20 11:57:12'),
(101, 113, 'Dummy S', 2, '1991-03-15', '', '1477473349_Koala.jpg', 'Lucknow, Uttar Pradesh, India', 'Lucknow', 'India', '26.8466937', '80.94616599999995', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '', '', '', 2, 1, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1, 0, 0, 0, '', 0, 0, '', '0000-00-00 00:00:00', '2016-10-26 14:28:38', '2016-10-26 14:45:49');

-- --------------------------------------------------------

--
-- Table structure for table `sr_user_block`
--

CREATE TABLE IF NOT EXISTS `sr_user_block` (
  `block_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `block_by` int(11) NOT NULL,
  `status` int(2) NOT NULL COMMENT '1:block,0:unblock',
  `block_on` datetime NOT NULL,
  PRIMARY KEY (`block_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=61 ;

--
-- Dumping data for table `sr_user_block`
--

INSERT INTO `sr_user_block` (`block_id`, `user_id`, `block_by`, `status`, `block_on`) VALUES
(1, 1, 10, 1, '2015-10-16 17:04:03'),
(9, 55, 1, 1, '2016-02-10 14:53:21'),
(23, 34, 9, 1, '2016-04-20 18:35:47'),
(24, 8, 4, 1, '2016-04-21 15:24:20'),
(25, 55, 4, 1, '2016-04-21 15:33:22'),
(37, 5, 1, 1, '2016-06-22 12:57:08'),
(38, 30, 99, 1, '2016-08-16 16:36:20'),
(42, 100, 99, 1, '2016-08-17 22:49:34'),
(43, 99, 36, 1, '2016-09-17 11:05:59'),
(44, 82, 36, 1, '2016-09-17 11:06:09'),
(45, 79, 36, 1, '2016-09-17 11:06:25'),
(55, 8, 109, 1, '2016-10-19 10:54:35'),
(58, 89, 103, 1, '2016-10-25 17:28:02'),
(59, 6, 109, 1, '2016-10-26 16:08:26'),
(60, 6, 107, 1, '2016-10-26 16:09:04');

-- --------------------------------------------------------

--
-- Table structure for table `sr_user_credit`
--

CREATE TABLE IF NOT EXISTS `sr_user_credit` (
  `credit_id` int(11) NOT NULL AUTO_INCREMENT,
  `credit` varchar(50) NOT NULL,
  `price` varchar(100) NOT NULL,
  `currency` varchar(50) NOT NULL,
  `used_credit` varchar(100) NOT NULL DEFAULT '0',
  `expired_credit` varchar(100) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1:rreceived by user;0:not received by user',
  `by_admin` tinyint(4) NOT NULL DEFAULT '0' COMMENT '1:modify by admin',
  `credited_on` datetime NOT NULL,
  `expired_on` datetime NOT NULL,
  PRIMARY KEY (`credit_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `sr_user_credit`
--

INSERT INTO `sr_user_credit` (`credit_id`, `credit`, `price`, `currency`, `used_credit`, `expired_credit`, `user_id`, `status`, `by_admin`, `credited_on`, `expired_on`) VALUES
(1, '100', '2.50', '3', '100', '0', 1, 1, 0, '2016-06-28 11:37:24', '0000-00-00 00:00:00'),
(2, '190', '9.99', '3', '190', '0', 1, 1, 0, '2016-06-28 11:40:38', '0000-00-00 00:00:00'),
(3, '20', '', '', '20', '0', 1, 1, 0, '2016-06-28 11:43:28', '0000-00-00 00:00:00'),
(4, '20', '', '', '20', '0', 1, 1, 0, '2016-06-28 11:46:47', '0000-00-00 00:00:00'),
(5, '100', '2.50', '3', '70', '0', 1, 1, 0, '2016-06-28 11:48:03', '0000-00-00 00:00:00'),
(6, '20', '', '', '0', '0', 43, 1, 0, '2016-08-15 21:07:00', '0000-00-00 00:00:00'),
(7, '20', '', '', '0', '0', 94, 1, 0, '2016-08-19 14:43:56', '0000-00-00 00:00:00'),
(8, '20', '', '', '0', '0', 94, 1, 0, '2016-08-19 14:47:50', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `sr_user_credit_redeem`
--

CREATE TABLE IF NOT EXISTS `sr_user_credit_redeem` (
  `redeem_id` int(11) NOT NULL AUTO_INCREMENT,
  `credit_id` int(11) NOT NULL,
  `credit` varchar(100) NOT NULL,
  `service` int(11) NOT NULL COMMENT '1:get to the top of people search,2:appear more often in kismat connection,3:get seen on the fame reel,4:message 5 more people,5:give virtual gift,6:show you are ready to chat,7:get 150 more votes on kismat connection',
  `redeem_date` datetime NOT NULL,
  PRIMARY KEY (`redeem_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `sr_user_credit_redeem`
--

INSERT INTO `sr_user_credit_redeem` (`redeem_id`, `credit_id`, `credit`, `service`, `redeem_date`) VALUES
(1, 1, '100', 3, '2016-06-28 11:37:24'),
(2, 2, '100', 3, '2016-06-28 11:40:38'),
(3, 2, '90', 3, '2016-06-28 11:46:47'),
(4, 3, '10', 3, '2016-06-28 11:46:47'),
(5, 3, '10', 3, '2016-06-28 11:48:03'),
(6, 4, '20', 3, '2016-06-28 11:48:03'),
(7, 5, '70', 3, '2016-06-28 11:48:03');

-- --------------------------------------------------------

--
-- Table structure for table `sr_user_erased`
--

CREATE TABLE IF NOT EXISTS `sr_user_erased` (
  `erased_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `reason` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `erased_by` int(11) NOT NULL,
  `erased_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`erased_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `sr_user_erased`
--


-- --------------------------------------------------------

--
-- Table structure for table `sr_user_favourites`
--

CREATE TABLE IF NOT EXISTS `sr_user_favourites` (
  `favourite_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `favourite_by` int(11) NOT NULL,
  `status` int(2) NOT NULL COMMENT '1:favourite,0:not favourite',
  `favourite_on` datetime NOT NULL,
  PRIMARY KEY (`favourite_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=71 ;

--
-- Dumping data for table `sr_user_favourites`
--

INSERT INTO `sr_user_favourites` (`favourite_id`, `user_id`, `favourite_by`, `status`, `favourite_on`) VALUES
(1, 1, 4, 1, '2015-09-15 13:00:04'),
(2, 5, 4, 1, '2015-09-24 13:40:53'),
(3, 4, 1, 1, '2015-09-26 12:44:55'),
(4, 10, 4, 1, '2015-09-26 13:18:48'),
(5, 6, 4, 1, '2015-09-28 14:14:34'),
(6, 12, 4, 1, '2015-09-28 14:34:58'),
(7, 20, 4, 1, '2015-10-05 17:08:31'),
(8, 20, 5, 1, '2015-10-05 17:14:55'),
(9, 8, 4, 1, '2015-10-08 14:12:57'),
(11, 1, 10, 1, '2015-10-16 17:03:43'),
(12, 12, 10, 1, '2015-10-28 10:55:11'),
(13, 4, 10, 1, '2015-10-28 11:50:00'),
(14, 6, 20, 1, '2015-11-03 14:12:14'),
(20, 10, 1, 1, '2016-01-02 12:32:40'),
(21, 38, 1, 1, '2016-01-04 16:07:23'),
(24, 6, 28, 1, '2016-01-26 03:34:37'),
(26, 6, 56, 1, '2016-02-04 20:22:51'),
(30, 34, 1, 1, '2016-03-10 17:49:10'),
(31, 66, 1, 1, '2016-03-11 18:30:09'),
(32, 1, 66, 1, '2016-03-11 18:38:10'),
(33, 1, 65, 1, '2016-03-11 18:40:05'),
(38, 65, 36, 1, '2016-06-03 11:52:18'),
(39, 36, 2, 1, '2016-06-03 15:48:58'),
(40, 36, 72, 1, '2016-06-04 17:06:48'),
(41, 36, 74, 1, '2016-06-04 17:50:40'),
(42, 36, 75, 1, '2016-06-04 17:58:24'),
(43, 36, 76, 1, '2016-06-04 18:10:42'),
(44, 36, 77, 1, '2016-06-04 18:14:39'),
(45, 36, 78, 1, '2016-06-04 18:18:07'),
(47, 6, 99, 1, '2016-08-16 17:00:07'),
(49, 99, 6, 1, '2016-08-18 02:33:53'),
(50, 36, 94, 1, '2016-08-19 12:20:45'),
(51, 94, 36, 1, '2016-08-19 12:58:59'),
(53, 94, 6, 1, '2016-09-10 17:08:00'),
(54, 6, 36, 1, '2016-09-15 16:34:42'),
(55, 22, 6, 1, '2016-10-05 02:20:24'),
(57, 5, 103, 1, '2016-10-06 13:09:10'),
(58, 70, 6, 1, '2016-10-07 02:11:48'),
(59, 20, 6, 1, '2016-10-12 10:50:00'),
(60, 1, 6, 1, '2016-10-12 11:28:43'),
(61, 1, 50, 1, '2016-10-12 11:35:55'),
(62, 36, 1, 1, '2016-10-12 13:27:52'),
(63, 31, 103, 1, '2016-10-12 17:27:02'),
(64, 103, 50, 1, '2016-10-13 15:57:52'),
(65, 8, 109, 1, '2016-10-19 10:53:04'),
(66, 107, 6, 1, '2016-10-26 15:50:04'),
(67, 107, 109, 1, '2016-10-26 15:53:23'),
(68, 109, 107, 1, '2016-10-26 15:54:44'),
(70, 109, 6, 1, '2016-10-26 15:57:40');

-- --------------------------------------------------------

--
-- Table structure for table `sr_user_friends`
--

CREATE TABLE IF NOT EXISTS `sr_user_friends` (
  `user_friend_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `friend_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `date` datetime NOT NULL,
  PRIMARY KEY (`user_friend_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `sr_user_friends`
--

INSERT INTO `sr_user_friends` (`user_friend_id`, `user_id`, `friend_id`, `status`, `date`) VALUES
(1, 1, 65, 1, '2016-03-11 17:07:01'),
(2, 1, 66, 1, '2016-03-11 17:21:24');

-- --------------------------------------------------------

--
-- Table structure for table `sr_user_gift`
--

CREATE TABLE IF NOT EXISTS `sr_user_gift` (
  `user_gift_id` int(11) NOT NULL AUTO_INCREMENT,
  `gift_id` int(50) NOT NULL,
  `message` varchar(255) NOT NULL,
  `private` tinyint(4) NOT NULL COMMENT '0:no,1:yes',
  `user_id` int(11) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '1' COMMENT '1:active , 0:inactive',
  `gifted_by` int(11) NOT NULL,
  `gifted_on` datetime NOT NULL,
  PRIMARY KEY (`user_gift_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `sr_user_gift`
--

INSERT INTO `sr_user_gift` (`user_gift_id`, `gift_id`, `message`, `private`, `user_id`, `status`, `gifted_by`, `gifted_on`) VALUES
(1, 2, 'hello":)', 1, 1, 1, 8, '2015-09-13 19:13:07'),
(2, 3, 'gg', 1, 1, 1, 8, '2015-09-13 19:19:02'),
(3, 7, 'heelloooooooooooooooo', 1, 1, 1, 8, '2015-09-13 19:20:25'),
(4, 5, 'Helllooooo', 1, 8, 1, 1, '2015-09-13 23:34:15'),
(5, 4, 'hey there', 1, 5, 1, 6, '2015-09-21 00:39:58'),
(6, 9, '', 1, 1, 1, 4, '2015-09-24 13:45:21'),
(7, 2, 'hello', 1, 1, 1, 4, '2015-09-24 16:01:49'),
(8, 9, 'hello..:)', 1, 6, 1, 5, '2015-09-24 16:14:30'),
(9, 4, 'hello', 1, 12, 1, 4, '2015-09-25 10:47:29'),
(10, 9, 'hello sir...:)\nspecial gift for u....', 1, 4, 1, 1, '2015-09-26 11:31:14'),
(11, 2, 'hello pawan....', 1, 9, 1, 1, '2015-09-26 11:32:09'),
(12, 4, 'hello......', 1, 1, 1, 4, '2015-09-26 11:47:52'),
(13, 8, 'private gift...', 1, 4, 1, 1, '2015-09-26 12:45:37'),
(14, 9, 'hello mam...:)', 1, 21, 1, 5, '2015-09-29 15:21:02'),
(15, 4, '', 1, 1, 1, 21, '2015-09-29 15:26:28'),
(16, 7, '', 1, 20, 1, 22, '2015-09-29 15:41:16'),
(17, 12, 'Hellooo', 1, 1, 1, 4, '2015-10-05 14:21:54'),
(18, 7, 'heeeeeeeeeeelloooo', 1, 0, 1, 1, '2015-10-09 19:30:25'),
(19, 8, '', 1, 4, 1, 9, '2015-10-13 18:45:04'),
(20, 9, 'hello....', 1, 10, 1, 1, '2015-10-15 16:16:57'),
(21, 9, 'hello....', 1, 10, 1, 1, '2015-10-15 16:17:15'),
(22, 9, 'hello....', 1, 10, 1, 1, '2015-10-15 16:17:40'),
(23, 8, 'xzCdsdvdfbfhft', 1, 4, 1, 10, '2015-10-28 11:48:27'),
(24, 13, 'hellOOOOOOOOOOOO', 1, 4, 1, 10, '2015-10-28 11:50:24'),
(25, 2, 'hello shilpi', 1, 20, 1, 4, '2015-10-28 17:58:17'),
(26, 10, 'hello', 0, 1, 1, 10, '2015-10-29 12:48:42'),
(27, 4, '', 0, 20, 1, 6, '2015-11-02 03:16:40'),
(28, 8, '', 0, 32, 1, 6, '2015-11-14 18:14:47'),
(29, 3, '', 0, 1, 1, 6, '2015-11-26 22:04:34'),
(30, 2, '', 0, 12, 0, 27, '2015-12-06 14:44:07'),
(31, 10, '', 1, 33, 0, 27, '2015-12-17 15:42:23'),
(32, 2, 'hello', 1, 20, 1, 1, '2016-01-02 12:25:55'),
(33, 7, 'Hello Devendra', 0, 8, 1, 4, '2016-01-04 15:46:16'),
(34, 3, 'Pancakes make a great breakfast', 0, 52, 1, 6, '2016-01-20 12:40:50'),
(35, 2, '', 0, 10, 0, 1, '2016-01-27 15:01:21'),
(36, 3, '', 0, 20, 1, 1, '2016-01-27 15:02:33'),
(37, 7, '', 0, 5, 1, 6, '2016-02-12 03:25:27'),
(38, 4, '', 0, 4, 1, 6, '2016-02-20 17:48:25');

-- --------------------------------------------------------

--
-- Table structure for table `sr_user_interest`
--

CREATE TABLE IF NOT EXISTS `sr_user_interest` (
  `user_interest_id` int(11) NOT NULL AUTO_INCREMENT,
  `interest_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1' COMMENT '0:inactive,1:active',
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL,
  PRIMARY KEY (`user_interest_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=107 ;

--
-- Dumping data for table `sr_user_interest`
--

INSERT INTO `sr_user_interest` (`user_interest_id`, `interest_id`, `user_id`, `status`, `created_on`, `updated_on`) VALUES
(10, 1, 4, 1, '2015-09-15 12:56:06', '2015-09-15 12:56:06'),
(11, 3, 4, 1, '2015-09-15 12:56:06', '2015-09-15 12:56:06'),
(12, 7, 4, 1, '2015-09-15 12:56:06', '2015-09-15 12:56:06'),
(14, 14, 4, 0, '2015-09-25 11:20:08', '2015-09-25 11:20:08'),
(15, 4, 4, 1, '2015-09-25 11:20:08', '2015-09-25 11:20:08'),
(16, 10, 4, 1, '2015-09-25 11:20:08', '2015-09-25 11:20:08'),
(17, 2, 4, 1, '2015-09-25 11:20:08', '2015-09-25 11:20:08'),
(18, 9, 4, 1, '2015-09-25 11:20:08', '2015-09-25 11:20:08'),
(22, 8, 8, 1, '2015-09-25 12:20:25', '2015-09-25 12:20:25'),
(28, 1, 20, 1, '2015-10-05 16:38:40', '2015-10-05 16:38:40'),
(29, 2, 20, 1, '2015-10-05 16:38:40', '2015-10-05 16:38:40'),
(31, 14, 9, 0, '2015-10-13 18:43:49', '2015-10-13 18:43:49'),
(32, 1, 10, 1, '2015-10-20 15:30:21', '2015-10-20 15:30:21'),
(33, 4, 10, 1, '2015-10-20 15:30:21', '2015-10-20 15:30:21'),
(34, 9, 10, 1, '2015-10-20 15:30:21', '2015-10-20 15:30:21'),
(35, 8, 10, 1, '2015-10-20 15:30:21', '2015-10-20 15:30:21'),
(36, 3, 10, 1, '2015-10-20 15:30:21', '2015-10-20 15:30:21'),
(37, 6, 20, 1, '2015-12-30 13:46:00', '2015-12-30 13:46:00'),
(38, 14, 20, 0, '2015-12-30 19:09:59', '2015-12-30 19:09:59'),
(39, 6, 6, 1, '2016-01-16 17:08:07', '2016-01-16 17:08:07'),
(40, 7, 6, 1, '2016-01-16 17:34:31', '2016-01-16 17:34:31'),
(41, 5, 6, 1, '2016-01-16 17:34:31', '2016-01-16 17:34:31'),
(42, 2, 6, 1, '2016-01-16 17:34:31', '2016-01-16 17:34:31'),
(43, 1, 6, 1, '2016-01-16 17:34:31', '2016-01-16 17:34:31'),
(44, 11, 6, 1, '2016-01-16 17:34:31', '2016-01-16 17:34:31'),
(56, 3, 38, 1, '2016-02-12 10:05:22', '2016-02-12 10:05:22'),
(57, 1, 1, 1, '2016-04-20 18:06:34', '2016-04-20 18:06:34'),
(58, 14, 1, 0, '2016-04-20 18:07:20', '2016-04-20 18:07:20'),
(59, 6, 1, 1, '2016-04-20 18:07:20', '2016-04-20 18:07:20'),
(60, 9, 1, 1, '2016-04-20 18:07:20', '2016-04-20 18:07:20'),
(62, 1, 69, 1, '2016-06-03 12:20:53', '2016-06-03 12:20:53'),
(63, 11, 69, 1, '2016-06-03 12:20:53', '2016-06-03 12:20:53'),
(64, 4, 69, 1, '2016-06-03 12:20:53', '2016-06-03 12:20:53'),
(65, 3, 69, 1, '2016-06-03 12:20:53', '2016-06-03 12:20:53'),
(66, 6, 69, 1, '2016-06-03 12:20:53', '2016-06-03 12:20:53'),
(67, 5, 69, 1, '2016-06-03 12:20:53', '2016-06-03 12:20:53'),
(68, 14, 69, 0, '2016-06-03 12:20:53', '2016-06-03 12:20:53'),
(69, 1, 69, 1, '2016-06-03 12:20:54', '2016-06-03 12:20:54'),
(70, 11, 69, 1, '2016-06-03 12:20:54', '2016-06-03 12:20:54'),
(71, 4, 69, 1, '2016-06-03 12:20:54', '2016-06-03 12:20:54'),
(72, 3, 69, 1, '2016-06-03 12:20:54', '2016-06-03 12:20:54'),
(73, 6, 69, 1, '2016-06-03 12:20:54', '2016-06-03 12:20:54'),
(74, 5, 69, 1, '2016-06-03 12:20:54', '2016-06-03 12:20:54'),
(75, 14, 69, 0, '2016-06-03 12:20:54', '2016-06-03 12:20:54'),
(76, 1, 92, 1, '2016-07-22 11:58:18', '2016-07-22 11:58:18'),
(77, 14, 94, 0, '2016-08-10 11:06:09', '2016-08-10 11:06:09'),
(78, 6, 94, 1, '2016-08-10 11:06:09', '2016-08-10 11:06:09'),
(79, 3, 94, 1, '2016-08-10 11:06:09', '2016-08-10 11:06:09'),
(80, 9, 70, 1, '2016-08-16 15:16:38', '2016-08-16 15:16:38'),
(81, 6, 70, 1, '2016-08-16 15:16:38', '2016-08-16 15:16:38'),
(82, 14, 70, 0, '2016-08-16 15:16:38', '2016-08-16 15:16:38'),
(83, 3, 99, 1, '2016-08-18 02:44:33', '2016-08-18 02:44:33'),
(84, 1, 99, 1, '2016-08-18 02:44:33', '2016-08-18 02:44:33'),
(85, 3, 36, 1, '2016-08-19 13:58:47', '2016-08-19 13:58:47'),
(86, 6, 36, 1, '2016-08-19 13:58:47', '2016-08-19 13:58:47'),
(87, 14, 36, 0, '2016-08-19 13:58:47', '2016-08-19 13:58:47'),
(88, 7, 36, 1, '2016-08-23 16:21:30', '2016-08-23 16:21:30'),
(89, 9, 36, 1, '2016-08-23 16:21:30', '2016-08-23 16:21:30'),
(90, 1, 36, 1, '2016-08-23 16:21:30', '2016-08-23 16:21:30'),
(91, 1, 94, 1, '2016-08-23 16:22:43', '2016-08-23 16:22:43'),
(92, 6, 103, 1, '2016-10-01 12:09:00', '2016-10-01 12:09:00'),
(94, 3, 103, 1, '2016-10-01 12:15:02', '2016-10-01 12:15:02'),
(96, 3, 109, 1, '2016-10-17 16:39:49', '2016-10-17 16:39:49'),
(100, 3, 107, 1, '2016-10-24 14:11:55', '2016-10-24 14:11:55'),
(101, 8, 107, 1, '2016-10-24 16:11:23', '2016-10-24 16:11:23'),
(102, 6, 107, 1, '2016-10-24 16:11:23', '2016-10-24 16:11:23'),
(103, 4, 107, 1, '2016-10-24 16:11:58', '2016-10-24 16:11:58'),
(104, 5, 107, 1, '2016-10-24 16:11:58', '2016-10-24 16:11:58'),
(105, 11, 107, 1, '2016-10-24 16:11:58', '2016-10-24 16:11:58'),
(106, 30, 107, 1, '2016-10-24 16:11:58', '2016-10-24 16:11:58');

-- --------------------------------------------------------

--
-- Table structure for table `sr_user_language`
--

CREATE TABLE IF NOT EXISTS `sr_user_language` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=124 ;

--
-- Dumping data for table `sr_user_language`
--

INSERT INTO `sr_user_language` (`id`, `user_id`, `language_id`) VALUES
(38, 50, 1),
(39, 50, 2),
(40, 50, 3),
(41, 50, 7),
(66, 38, 1),
(67, 38, 2),
(68, 38, 3),
(69, 38, 10),
(71, 34, 0),
(72, 69, 0),
(73, 1, 1),
(74, 1, 2),
(75, 1, 3),
(76, 1, 4),
(77, 1, 5),
(78, 86, 0),
(79, 9, 0),
(80, 92, 0),
(92, 97, 3),
(93, 97, 4),
(94, 97, 6),
(95, 97, 26),
(96, 97, 27),
(101, 36, 0),
(102, 6, 4),
(103, 6, 5),
(104, 6, 20),
(105, 6, 21),
(106, 6, 22),
(107, 70, 0),
(109, 99, 0),
(114, 103, 0),
(115, 94, 0),
(118, 109, 0),
(122, 107, 1),
(123, 107, 2);

-- --------------------------------------------------------

--
-- Table structure for table `sr_user_like`
--

CREATE TABLE IF NOT EXISTS `sr_user_like` (
  `like_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `liked_by` int(11) NOT NULL,
  `from_kc` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0:from profile page ;1:from kismat connection',
  `status` int(2) NOT NULL COMMENT '1:like,0:unlike',
  `liked_on` datetime NOT NULL,
  PRIMARY KEY (`like_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=214 ;

--
-- Dumping data for table `sr_user_like`
--

INSERT INTO `sr_user_like` (`like_id`, `user_id`, `liked_by`, `from_kc`, `status`, `liked_on`) VALUES
(1, 4, 6, 0, 1, '2015-09-16 03:19:22'),
(4, 5, 6, 0, 0, '2015-09-21 00:39:38'),
(6, 4, 5, 0, 1, '2015-09-24 16:18:01'),
(7, 1, 4, 0, 1, '2015-09-24 16:18:14'),
(8, 8, 4, 0, 1, '2015-09-24 16:29:27'),
(9, 1, 10, 0, 1, '2015-09-25 12:19:46'),
(10, 12, 4, 0, 1, '2015-09-25 13:58:18'),
(11, 1, 21, 0, 1, '2015-09-29 15:56:51'),
(12, 20, 4, 0, 1, '2015-10-05 17:07:57'),
(13, 20, 5, 0, 1, '2015-10-05 17:14:49'),
(14, 27, 4, 0, 1, '2015-10-07 16:34:08'),
(15, 1, 20, 0, 1, '2015-10-21 16:43:12'),
(18, 9, 20, 1, 1, '2015-10-23 14:45:35'),
(19, 10, 20, 1, 0, '2015-10-23 14:45:39'),
(26, 1, 5, 1, 1, '2015-10-23 19:02:23'),
(27, 4, 10, 0, 0, '2015-10-28 11:55:38'),
(28, 9, 4, 1, 1, '2015-10-28 17:12:37'),
(29, 29, 4, 1, 1, '2015-10-28 17:15:45'),
(30, 20, 6, 0, 1, '2015-11-02 03:15:27'),
(31, 1, 38, 0, 1, '2015-12-15 10:25:20'),
(51, 5, 1, 0, 1, '2015-12-26 10:25:01'),
(52, 9, 1, 0, 1, '2015-12-26 10:25:07'),
(53, 27, 1, 0, 1, '2015-12-26 10:25:22'),
(54, 1, 6, 0, 1, '2015-12-27 21:51:02'),
(55, 4, 1, 0, 0, '2016-01-27 15:59:47'),
(56, 10, 6, 1, 1, '2016-02-02 12:14:48'),
(57, 21, 6, 0, 1, '2016-02-11 11:37:49'),
(58, 56, 6, 0, 1, '2016-02-11 11:38:31'),
(59, 9, 6, 1, 1, '2016-02-12 03:12:19'),
(60, 27, 6, 1, 1, '2016-02-12 03:13:41'),
(61, 34, 6, 0, 1, '2016-02-12 03:13:51'),
(62, 22, 6, 1, 1, '2016-02-20 16:40:37'),
(63, 5, 4, 0, 1, '2016-02-24 13:17:28'),
(64, 66, 1, 0, 1, '2016-03-11 18:27:39'),
(65, 1, 65, 0, 1, '2016-03-11 18:40:35'),
(66, 10, 56, 1, 1, '2016-04-06 10:50:58'),
(67, 21, 56, 1, 1, '2016-04-06 10:51:01'),
(69, 40, 1, 0, 1, '2016-04-22 14:00:27'),
(70, 4, 20, 1, 1, '2016-04-30 11:51:24'),
(71, 46, 6, 0, 1, '2016-05-20 20:24:59'),
(72, 8, 6, 0, 1, '2016-05-22 21:17:36'),
(73, 40, 55, 0, 1, '2016-05-31 17:11:08'),
(74, 65, 36, 1, 1, '2016-06-01 14:24:53'),
(75, 14, 36, 0, 1, '2016-06-03 12:46:02'),
(76, 50, 36, 0, 1, '2016-06-03 12:53:33'),
(77, 1, 36, 0, 1, '2016-06-03 12:56:12'),
(78, 51, 36, 0, 1, '2016-06-03 12:58:12'),
(79, 66, 36, 0, 1, '2016-06-03 12:58:59'),
(80, 34, 36, 0, 1, '2016-06-03 13:01:20'),
(81, 29, 36, 0, 1, '2016-06-03 13:02:31'),
(82, 33, 36, 0, 1, '2016-06-03 13:02:48'),
(83, 56, 36, 0, 1, '2016-06-03 13:02:56'),
(84, 20, 36, 0, 1, '2016-06-03 13:03:02'),
(85, 52, 36, 0, 1, '2016-06-03 13:03:07'),
(86, 24, 36, 0, 1, '2016-06-03 13:03:33'),
(87, 21, 36, 0, 1, '2016-06-03 13:03:38'),
(88, 9, 36, 0, 1, '2016-06-03 13:05:01'),
(89, 5, 36, 0, 1, '2016-06-03 13:05:25'),
(90, 27, 36, 0, 1, '2016-06-03 13:05:30'),
(91, 36, 2, 0, 1, '2016-06-03 15:13:06'),
(92, 2, 36, 0, 1, '2016-06-03 16:32:00'),
(93, 9, 72, 0, 1, '2016-06-04 16:22:56'),
(94, 4, 72, 0, 1, '2016-06-04 16:23:28'),
(95, 36, 72, 0, 1, '2016-06-04 16:23:51'),
(96, 5, 72, 0, 1, '2016-06-04 16:24:16'),
(97, 70, 72, 0, 1, '2016-06-04 16:25:10'),
(98, 33, 72, 0, 1, '2016-06-04 16:25:49'),
(99, 46, 36, 0, 1, '2016-06-04 16:51:32'),
(100, 53, 36, 0, 1, '2016-06-04 16:51:38'),
(101, 37, 36, 0, 1, '2016-06-04 16:51:53'),
(102, 23, 36, 0, 1, '2016-06-04 16:52:26'),
(103, 22, 36, 0, 1, '2016-06-04 16:52:58'),
(104, 8, 36, 0, 1, '2016-06-04 16:53:05'),
(106, 45, 36, 0, 1, '2016-06-04 16:53:55'),
(107, 41, 36, 0, 1, '2016-06-04 16:54:20'),
(108, 38, 36, 0, 1, '2016-06-04 16:54:41'),
(109, 43, 36, 0, 1, '2016-06-04 16:54:48'),
(110, 39, 36, 0, 1, '2016-06-04 16:57:10'),
(111, 42, 36, 0, 1, '2016-06-04 16:58:34'),
(112, 28, 36, 0, 1, '2016-06-04 16:58:46'),
(113, 10, 36, 0, 1, '2016-06-04 16:58:52'),
(114, 36, 73, 0, 1, '2016-06-04 17:27:01'),
(115, 36, 74, 0, 1, '2016-06-04 17:50:09'),
(116, 36, 75, 0, 1, '2016-06-04 17:58:15'),
(117, 36, 76, 0, 1, '2016-06-04 18:08:48'),
(118, 36, 77, 0, 1, '2016-06-04 18:14:02'),
(119, 36, 78, 0, 1, '2016-06-04 18:17:58'),
(120, 72, 36, 0, 1, '2016-06-06 12:26:58'),
(121, 3, 36, 0, 1, '2016-06-06 12:34:38'),
(122, 4, 36, 0, 1, '2016-06-06 12:36:26'),
(123, 70, 36, 0, 1, '2016-06-06 12:39:53'),
(124, 55, 36, 0, 1, '2016-06-06 12:40:09'),
(125, 54, 36, 0, 1, '2016-06-06 12:40:23'),
(126, 12, 36, 0, 1, '2016-06-06 12:40:50'),
(127, 69, 36, 0, 1, '2016-06-06 12:41:17'),
(128, 40, 36, 0, 1, '2016-06-06 12:41:23'),
(129, 75, 36, 0, 1, '2016-06-06 12:42:16'),
(130, 73, 36, 0, 1, '2016-06-06 12:42:48'),
(131, 36, 69, 0, 1, '2016-06-06 12:46:25'),
(132, 36, 79, 0, 1, '2016-06-06 12:50:13'),
(133, 79, 36, 0, 1, '2016-06-06 13:18:11'),
(134, 80, 36, 0, 1, '2016-06-06 13:19:30'),
(135, 81, 36, 0, 1, '2016-06-06 13:22:12'),
(136, 82, 36, 0, 1, '2016-06-06 13:24:26'),
(137, 36, 80, 0, 1, '2016-06-10 11:35:31'),
(138, 65, 1, 0, 0, '2016-06-10 11:49:46'),
(139, 36, 1, 0, 1, '2016-06-10 11:49:51'),
(140, 46, 1, 0, 1, '2016-06-13 11:06:00'),
(141, 37, 1, 0, 1, '2016-06-13 11:06:09'),
(142, 83, 1, 0, 1, '2016-06-13 11:06:17'),
(143, 75, 1, 0, 1, '2016-06-13 11:06:24'),
(144, 23, 1, 0, 1, '2016-06-13 11:06:44'),
(145, 53, 1, 0, 1, '2016-06-13 11:06:50'),
(146, 73, 1, 0, 1, '2016-06-13 11:06:57'),
(147, 22, 1, 0, 1, '2016-06-13 11:07:03'),
(148, 8, 1, 0, 1, '2016-06-13 11:07:23'),
(149, 45, 1, 0, 1, '2016-06-13 11:07:33'),
(151, 41, 1, 0, 1, '2016-06-13 11:07:56'),
(152, 43, 1, 0, 1, '2016-06-13 11:08:02'),
(153, 38, 1, 0, 1, '2016-06-13 11:08:06'),
(154, 14, 1, 0, 1, '2016-06-13 11:08:11'),
(155, 20, 1, 0, 1, '2016-06-13 12:38:20'),
(156, 34, 1, 1, 1, '2016-06-15 12:40:03'),
(157, 9, 56, 1, 1, '2016-06-21 19:15:54'),
(158, 5, 56, 1, 1, '2016-06-21 19:16:01'),
(159, 4, 56, 1, 1, '2016-06-21 19:16:10'),
(160, 23, 6, 1, 1, '2016-08-15 22:48:17'),
(161, 36, 6, 1, 1, '2016-08-15 22:48:25'),
(162, 37, 6, 1, 1, '2016-08-15 22:56:55'),
(163, 38, 6, 1, 1, '2016-08-15 22:56:57'),
(164, 50, 6, 1, 1, '2016-08-15 22:57:02'),
(165, 65, 6, 1, 1, '2016-08-15 22:57:05'),
(166, 73, 6, 1, 1, '2016-08-15 22:57:15'),
(167, 9, 43, 1, 1, '2016-08-15 23:19:58'),
(168, 70, 6, 1, 1, '2016-08-17 19:35:19'),
(169, 75, 6, 1, 1, '2016-08-17 19:35:24'),
(170, 81, 6, 1, 1, '2016-08-17 19:35:29'),
(171, 82, 6, 1, 1, '2016-08-17 19:35:31'),
(172, 86, 6, 1, 1, '2016-08-17 19:35:34'),
(173, 89, 6, 1, 1, '2016-08-17 19:35:38'),
(174, 91, 6, 1, 1, '2016-08-17 19:35:42'),
(175, 94, 6, 1, 1, '2016-08-17 19:35:46'),
(176, 97, 6, 1, 1, '2016-08-17 19:35:51'),
(177, 1, 100, 1, 1, '2016-08-17 20:23:50'),
(178, 8, 100, 1, 1, '2016-08-17 20:23:55'),
(179, 6, 100, 1, 1, '2016-08-17 20:23:59'),
(180, 22, 100, 1, 1, '2016-08-17 20:24:02'),
(181, 23, 100, 1, 1, '2016-08-17 20:24:06'),
(182, 50, 100, 1, 1, '2016-08-17 20:24:16'),
(183, 65, 100, 1, 1, '2016-08-17 20:24:21'),
(184, 75, 100, 1, 1, '2016-08-17 20:24:24'),
(185, 81, 100, 1, 1, '2016-08-17 20:24:27'),
(186, 97, 100, 1, 1, '2016-08-17 20:24:33'),
(187, 99, 100, 1, 1, '2016-08-17 20:24:38'),
(188, 43, 6, 1, 1, '2016-08-18 02:49:29'),
(189, 99, 6, 1, 1, '2016-08-18 02:49:32'),
(190, 100, 6, 1, 1, '2016-08-18 02:49:34'),
(191, 1, 99, 1, 1, '2016-08-18 02:51:02'),
(192, 8, 99, 1, 1, '2016-08-18 02:51:10'),
(193, 6, 99, 1, 1, '2016-08-18 02:51:16'),
(194, 4, 94, 0, 1, '2016-08-20 11:35:37'),
(195, 6, 94, 0, 0, '2016-08-20 11:36:11'),
(196, 6, 36, 1, 1, '2016-09-07 17:41:44'),
(197, 8, 50, 1, 1, '2016-10-14 13:02:29'),
(198, 22, 50, 1, 1, '2016-10-14 13:03:55'),
(199, 37, 50, 1, 1, '2016-10-14 13:05:27'),
(200, 23, 50, 1, 1, '2016-10-14 13:06:36'),
(201, 38, 50, 1, 1, '2016-10-14 13:06:47'),
(202, 111, 6, 1, 1, '2016-10-24 15:17:14'),
(203, 1, 107, 1, 1, '2016-10-24 15:21:03'),
(204, 1, 109, 1, 1, '2016-10-24 15:32:03'),
(205, 20, 109, 1, 0, '2016-10-24 15:32:35'),
(206, 112, 6, 1, 1, '2016-10-24 15:32:44'),
(207, 107, 6, 1, 1, '2016-10-24 15:35:02'),
(208, 6, 107, 0, 1, '2016-10-24 15:49:05'),
(209, 5, 107, 1, 1, '2016-10-24 15:59:27'),
(210, 4, 107, 0, 1, '2016-10-24 16:06:03'),
(211, 109, 107, 0, 1, '2016-10-25 11:12:01'),
(212, 113, 6, 0, 1, '2016-10-26 14:39:29'),
(213, 107, 109, 0, 1, '2016-10-26 15:54:18');

-- --------------------------------------------------------

--
-- Table structure for table `sr_user_login`
--

CREATE TABLE IF NOT EXISTS `sr_user_login` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `email_id` varchar(100) NOT NULL,
  `password` varchar(32) NOT NULL,
  `role_id` int(3) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '0' COMMENT '0:inactive,1:active',
  `verify_code` varchar(255) NOT NULL,
  `fb_id` varchar(50) NOT NULL,
  `oauth_uid` varchar(255) NOT NULL,
  `oauth_provider` varchar(255) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=114 ;

--
-- Dumping data for table `sr_user_login`
--

INSERT INTO `sr_user_login` (`user_id`, `email_id`, `password`, `role_id`, `status`, `verify_code`, `fb_id`, `oauth_uid`, `oauth_provider`, `created_on`, `updated_on`) VALUES
(1, 'shilpisingh1990@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 4, 1, '1976864641', 'shilpisingh1990@gmail.com', '933839563317761', 'facebook', '2015-07-24 17:06:22', '2015-07-24 17:06:22'),
(2, 'nishith.srivastava@vibescom.in', '8a59bb639853e007aa5140861aa1ecad', 4, 1, '535774853', '', '10209546937572653', 'facebook', '2015-07-25 11:33:53', '2015-07-25 11:33:53'),
(3, 'gulshan.kumar@vibescom.in', '161ebd7d45089b3446ee4e0d86dbcf92', 4, 1, '1993561709', '', '', '', '2015-07-25 12:02:09', '2015-07-25 12:02:09'),
(4, 'abhay.yadav@vibescom.in', '9515e0f30082faa89c356fda68800226', 4, 1, '476092701', '', '', '', '2015-07-25 12:08:55', '2015-07-25 12:08:55'),
(5, 'gulshancac@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 4, 1, '1189473302', '', '', '', '2015-07-25 12:10:14', '2015-07-25 12:10:14'),
(6, 'iachaudry@gmail.com', 'b56dd99550b8e43dbdc4fbd166a05814', 4, 1, '1099365402', 'social@startrishta.com', '1831190297108782', 'facebook', '2015-07-26 00:28:30', '2015-07-26 00:28:30'),
(7, 'admin@startrishta.com', '827ccb0eea8a706c4c34a16891f84e7b', 4, 1, '', '', '', '', '2015-08-07 17:23:23', '2015-08-07 17:23:28'),
(8, 'devendra.tiwari@vibescom.in', '827ccb0eea8a706c4c34a16891f84e7b', 4, 1, '1529424077', '', '', '', '2015-08-07 17:56:50', '2015-08-07 17:56:50'),
(9, 'yadavabhay@gmail.com', 'd0468fd58f7b00562c2df5c67ca1774d', 4, 1, '1466731833', '', '', '', '2015-08-20 19:59:28', '2015-08-20 19:59:28'),
(10, 'pawan.verma@vibescom.in', '14776cef6207f671e67dd433c1f05723', 4, 1, '468907766', '', '', '', '2015-09-17 11:51:35', '2015-09-17 11:51:35'),
(11, 'satvendrasingn85@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 4, 0, '161786972', '', '', '', '2015-09-25 10:17:16', '2015-09-25 10:17:16'),
(12, 'satvendrasingh85@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 4, 1, '596538019', '', '', '', '2015-09-25 10:20:03', '2015-09-25 10:20:03'),
(13, 'creative.varun@outlook.com', 'd89cd9ba8a18cabc30a1cadcfcb9dcc9', 4, 1, '621623795', '', '', '', '2015-09-25 11:30:07', '2015-09-25 11:30:07'),
(14, 'monalishachauhan@gmail.com', '728ee263db3e3fb8ea7cfd9857a177b2', 4, 1, '1555678497', '', '', '', '2015-09-26 13:52:11', '2015-09-26 13:52:11'),
(15, 'ftqt100@gmail.com', 'b979b7437d434f973f99d123d03be861', 4, 0, '1416855982', '', '', '', '2015-09-28 02:35:59', '2015-09-28 02:35:59'),
(16, 'f1qt100@gmail.com', 'b979b7437d434f973f99d123d03be861', 4, 0, '594003627', '', '', '', '2015-09-28 02:37:56', '2015-09-28 02:37:56'),
(17, 'nishith.srivastava@gmail.com', '31191ced7af4da004c0ba017923a3118', 4, 0, '1679167459', '', '', '', '2015-09-28 10:44:13', '2015-09-28 10:44:13'),
(20, 'shilpi.singh1@vibescom.in', '5a8ceb35d7ebb9a14cf4ac301dc42b2a', 4, 1, '149818660', '', '', '', '2015-09-18 16:58:17', '2015-09-18 16:58:17'),
(21, 'rinklu.kumari@vibescom.in', '5ee889968cd109fe0d37591a4c855a9f', 4, 0, '1730896118', '', '', '', '2015-09-29 15:12:01', '2015-09-29 15:12:01'),
(22, 'shilpi211992@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 4, 0, '1812750273', '', '', '', '2015-09-29 15:12:30', '2015-09-29 15:12:30'),
(23, 'ashish.kumar@vibescom.in', 'edb533dcce30c224150fec768a4a120a', 4, 0, '1558809068', '', '', '', '2015-09-29 15:22:09', '2015-09-29 15:22:09'),
(24, 'rajlakshmi@vibescom.in', 'e10adc3949ba59abbe56e057f20f883e', 4, 0, '2023368017', '', '', '', '2015-09-29 15:23:44', '2015-09-29 15:23:44'),
(27, 'nishith.communifix@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 4, 1, '1910474670', '', '', '', '2015-09-29 19:19:48', '2015-09-29 19:19:48'),
(28, 'ftqt101@gmail.com', '02e3f1e7d572307c4e55edffa2186024', 4, 0, '1284942257', '', '', '', '2015-09-30 01:39:52', '2015-09-30 01:39:52'),
(29, 'gulshana491991@gmail.com', '0b8fa5868b08ccc3c44fb9cd31638d7f', 4, 1, '971217933', '', '', '', '2015-10-09 16:38:45', '2015-10-09 16:38:45'),
(30, 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 4, 0, '2125804279', '', '', '', '2015-10-09 22:02:59', '2015-10-09 22:02:59'),
(31, 'paras.pawan@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 4, 1, '1493061413', '', '', '', '2015-10-20 18:06:34', '2015-10-20 18:06:34'),
(32, 'ftqt102@gmail.com', '02e3f1e7d572307c4e55edffa2186024', 4, 0, '1263828422', '', '', '', '2015-10-28 02:57:14', '2015-10-28 02:57:14'),
(33, 'bindeshwari.singh@vibescom.in', '07cd55c7b42715ec44c133a6a165e8d2', 4, 0, '1403555125', '', '', '', '2015-10-29 12:30:53', '2015-10-29 12:30:53'),
(34, 'shilpi1@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 4, 0, '1193265185', '', '', '', '2015-11-02 17:29:46', '2015-11-02 17:29:46'),
(36, 'dharm.dev@vibescom.in', 'e0d36189931c8fafcad14c49ae0f40a9', 4, 1, '373817352', 'dharmdev2002@yahoo.co.in', '1044454775607924', 'facebook', '2015-11-03 11:18:23', '2015-11-03 11:18:23'),
(37, 'aleem.javed@vibescom.in', 'e0d36189931c8fafcad14c49ae0f40a9', 4, 0, '2109567809', '', '', '', '2015-11-06 15:36:53', '2015-11-06 15:36:53'),
(38, 'ishtiyaque.ansari@vibescom.in', '25f9e794323b453885f5181f1b624d0b', 4, 1, '1436676190', '', '', '', '2015-11-09 15:48:34', '2015-11-09 15:48:34'),
(39, 'dfghfd@gmail.com', '0cc175b9c0f1b6a831c399e269772661', 4, 0, '1570166492', '', '', '', '2015-11-17 13:30:53', '2015-11-17 13:30:53'),
(40, 'varun.kumar@vibescom.in', 'e0d36189931c8fafcad14c49ae0f40a9', 4, 1, '41629975', '', '', '', '2015-11-18 12:55:06', '2015-11-18 12:55:06'),
(41, 'f1qt102@gmail.com', '02e3f1e7d572307c4e55edffa2186024', 4, 0, '224534960', '', '', '', '2015-11-25 20:57:20', '2015-11-25 20:57:20'),
(42, 'f1qt103@gmail.com', '49cbaa76d99296dd817de0504bcd13c5', 4, 1, '782125744', '', '', '', '2015-12-08 12:11:28', '2015-12-08 12:11:28'),
(43, 'f1qt105@gmail.com', 'b979b7437d434f973f99d123d03be861', 4, 0, '1964945984', '', '', '', '2015-12-08 12:46:45', '2015-12-08 12:46:45'),
(45, 'gulshan.kumar@vibescom.in', '', 4, 1, '', '', '1707574962795010', 'facebook', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(46, 'saurabh.prakash777@gmail.com', '', 4, 1, '', '', '724974094270779', 'facebook', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(49, 'uszmukrczn_1426606023@tfbnw.net', '', 4, 1, '', '', '10149999336042566', 'facebook', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(50, 'shilpisingh064@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 4, 1, '1285093659', '', '897089870398131', 'facebook', '2016-01-16 12:55:44', '2016-01-16 12:55:44'),
(51, 'shilpisingh@gmail.com', '', 4, 1, '', '', '933839563317761', 'facebook', '2016-01-16 13:09:28', '2016-01-16 13:09:28'),
(52, 'shilpi21011992@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 4, 0, '1199438785', '', '', '', '2016-01-16 13:56:32', '2016-01-16 13:56:32'),
(53, 'f1qt106@gmail.com', 'b979b7437d434f973f99d123d03be861', 4, 0, '1671150173', '', '', '', '2016-01-18 02:44:45', '2016-01-18 02:44:45'),
(54, 'nishith_18nov86@yahoo.com', '35f0d133e4b60bd0fe9d707681ffc668', 4, 1, '1164503976', 'nishith_18nov86@yahoo.com', '1320199291332280', 'facebook', '2016-01-21 11:38:29', '2016-01-21 11:38:29'),
(55, 'pawan.parss@gmail.com', '14776cef6207f671e67dd433c1f05723', 4, 0, '1150494863', '', '', '', '2016-01-27 15:10:51', '2016-01-27 15:10:51'),
(56, 'f1qt500@gmail.com', 'b979b7437d434f973f99d123d03be861', 4, 1, '1101558638', '', '', '', '2016-02-04 20:15:23', '2016-02-04 20:15:23'),
(58, 'trust.portal@trust.com', '711ae3d0fcf72b1e6af83ae4b0f53158', 4, 0, '451112503', '', '', '', '2016-02-23 11:03:09', '2016-02-23 11:03:09'),
(65, 'shilpisingh@vibescom.in', '25f9e794323b453885f5181f1b624d0b', 4, 0, '1520310918', '', '', '', '2016-03-11 17:07:01', '2016-03-11 17:07:01'),
(66, 'sudha.katiyar258@gmail.com', '', 4, 1, '', 'sudha.katiyar258@gmail.com', '543300725831617', 'facebook', '2016-03-11 17:21:24', '2016-03-11 17:21:24'),
(67, 'bindeshwarisingh011@gmail.com', '25f9e794323b453885f5181f1b624d0b', 4, 0, '1123739678', '', '', '', '2016-04-07 10:27:17', '2016-04-07 10:27:17'),
(68, 'f1qt502@gmail.com', 'b979b7437d434f973f99d123d03be861', 4, 0, '412399059', '', '', '', '2016-04-16 15:23:58', '2016-04-16 15:23:58'),
(69, 'syed.danish@vibescom.in', '8a59bb639853e007aa5140861aa1ecad', 4, 1, '1638399107', '', '', '', '2016-04-26 17:17:41', '2016-04-26 17:17:41'),
(70, 'f1qt504@gmail.com', 'b979b7437d434f973f99d123d03be861', 4, 0, '786084935', '', '', '', '2016-05-22 21:22:55', '2016-05-22 21:22:55'),
(71, 's.yeddanish101@gmail.com', '8a59bb639853e007aa5140861aa1ecad', 4, 0, '1233922447', '', '', '', '2016-05-27 17:34:36', '2016-05-27 17:34:36'),
(72, 'dharmdevg@rediffmail.com', 'e0d36189931c8fafcad14c49ae0f40a9', 4, 0, '14261167', '', '', '', '2016-06-04 16:18:17', '2016-06-04 16:18:17'),
(73, 'dharmdevg@gmail.com', 'e0d36189931c8fafcad14c49ae0f40a9', 4, 0, '1355466475', '', '', '', '2016-06-04 17:13:36', '2016-06-04 17:13:36'),
(74, 'ratnesh@vibescom.in', 'e0d36189931c8fafcad14c49ae0f40a9', 4, 1, '444917475', '', '', '', '2016-06-04 17:47:53', '2016-06-04 17:47:53'),
(75, 'anuj.kumar@vibescom.in', 'e0d36189931c8fafcad14c49ae0f40a9', 4, 0, '318278288', '', '', '', '2016-06-04 17:56:17', '2016-06-04 17:56:17'),
(76, 'monalisa.singh@vibescom.in', 'e0d36189931c8fafcad14c49ae0f40a9', 4, 0, '1035677446', '', '', '', '2016-06-04 18:03:02', '2016-06-04 18:03:02'),
(77, 'sujata.sharma@vibescom.in', 'e0d36189931c8fafcad14c49ae0f40a9', 4, 0, '1849904990', '', '', '', '2016-06-04 18:12:11', '2016-06-04 18:12:11'),
(78, 'vijayadwings@gmail.com', 'e0d36189931c8fafcad14c49ae0f40a9', 4, 0, '678085909', '', '', '', '2016-06-04 18:15:26', '2016-06-04 18:15:26'),
(79, 'Testing@test.com', 'e0d36189931c8fafcad14c49ae0f40a9', 4, 0, '182290178', '', '', '', '2016-06-06 12:47:13', '2016-06-06 12:47:13'),
(80, 'jitendra@vibescom.in', 'e0d36189931c8fafcad14c49ae0f40a9', 4, 0, '1122651572', '', '', '', '2016-06-06 13:00:11', '2016-06-06 13:00:11'),
(81, 'sudha.katiyar@vibescom.in', 'e0d36189931c8fafcad14c49ae0f40a9', 4, 0, '311271871', '', '', '', '2016-06-06 13:20:40', '2016-06-06 13:20:40'),
(82, 'vivek.kumar@vibescom.in', 'e0d36189931c8fafcad14c49ae0f40a9', 4, 0, '1161628482', '', '', '', '2016-06-06 13:22:45', '2016-06-06 13:22:45'),
(83, 'anubhav.smarty1104@gmail.com', '', 4, 1, '', 'anubhav.smarty1104@gmail.com', '1022877924462993', 'facebook', '2016-06-11 15:10:54', '2016-06-11 15:10:54'),
(84, 'cduffy9500@outlook.com', '9be40402f45736bcb9502225fad5ec9b', 4, 0, '101685981', '', '', '', '2016-06-22 19:33:48', '2016-06-22 19:33:48'),
(85, 'surabhibaijal@gmail.com', '', 4, 1, '', 'surabhibaijal@gmail.com', '10157119046170611', 'facebook', '2016-07-02 12:10:13', '2016-07-02 12:10:13'),
(86, 'abhai.infotech@gmail.com', '', 4, 1, '', 'abhai.infotech@gmail.com', '10155576864207837', 'facebook', '2016-07-05 11:35:13', '2016-07-05 11:35:13'),
(87, 'dharm.devg@gmail.com', 'e0d36189931c8fafcad14c49ae0f40a9', 4, 1, '2113990937', '', '', '', '2016-07-13 14:40:33', '2016-07-13 14:40:33'),
(88, 'd.harmdevg@gmail.com', 'e0d36189931c8fafcad14c49ae0f40a9', 4, 0, '1811839644', '', '', '', '2016-07-13 16:58:34', '2016-07-13 16:58:34'),
(89, 'dh.armdevg@gmail.com', 'e0d36189931c8fafcad14c49ae0f40a9', 4, 0, '432518133', '', '', '', '2016-07-13 17:07:44', '2016-07-13 17:07:44'),
(90, 'dha.rmdevg@gmail.com', 'e0d36189931c8fafcad14c49ae0f40a9', 4, 1, '792394728', '', '', '', '2016-07-14 14:43:51', '2016-07-14 14:43:51'),
(91, 'dhar.mdevg@gmail.com', 'e0d36189931c8fafcad14c49ae0f40a9', 4, 0, '707416280', '', '', '', '2016-07-14 15:11:45', '2016-07-14 15:11:45'),
(92, 'shilpi.singh@vibescom.in', '3f0e62adc3b7399bcbafe9675564972b', 4, 0, '1551530681', '', '', '', '2016-07-22 11:27:01', '2016-07-22 11:27:01'),
(93, 'vijay.adwings@gmail.com', '', 4, 1, '', 'vijay.adwings@gmail.com', '1624223264554763', 'facebook', '2016-07-25 10:42:39', '2016-07-25 10:42:39'),
(94, 'ashwani.kumar@vibescom.in', 'e0d36189931c8fafcad14c49ae0f40a9', 4, 1, '2133826447', '', '', '', '2016-07-27 11:36:18', '2016-07-27 11:36:18'),
(95, 'testing@gmail.com', '25d55ad283aa400af464c76d713c07ad', 4, 0, '1478872730', '', '', '', '2016-07-28 10:23:26', '2016-07-28 10:23:26'),
(96, 'f1qt503@gmail.com', 'b979b7437d434f973f99d123d03be861', 4, 0, '1363928813', '', '', '', '2016-08-08 02:29:49', '2016-08-08 02:29:49'),
(97, 'f1qt505@gmail.com', '49cbaa76d99296dd817de0504bcd13c5', 4, 1, '49720003', '', '', '', '2016-08-08 03:08:41', '2016-08-08 03:08:41'),
(98, 'assad.chaudry@denovoca.com', 'b6409a2e690ca945bb38d143d76ef7fc', 4, 0, '347851878', '', '', '', '2016-08-14 21:47:42', '2016-08-14 21:47:42'),
(99, 'f1qt507@gmail.com', 'b979b7437d434f973f99d123d03be861', 4, 0, '1561747983', '', '', '', '2016-08-16 14:16:30', '2016-08-16 14:16:30'),
(100, 'f1qt107@gmail.com', 'b979b7437d434f973f99d123d03be861', 4, 0, '110811476', '', '', '', '2016-08-17 20:20:20', '2016-08-17 20:20:20'),
(101, 'assadchaudry@hotmail.com', '', 4, 1, '', 'assadchaudry@hotmail.com', '10154357228283614', 'facebook', '2016-08-25 16:07:23', '2016-08-25 16:07:23'),
(102, 'dummyvibes@gmail.com', '8a59bb639853e007aa5140861aa1ecad', 4, 0, '1950275324', '', '', '', '2016-09-02 12:04:57', '2016-09-02 12:04:57'),
(103, 'chandrika.aggarwal@vibescom.in', '568d2ba65e9e6600da54dd3a27f6d65e', 4, 1, '1260638543', '', '', '', '2016-09-30 17:53:05', '2016-09-30 17:53:05'),
(104, 'upendra.singh@vibescom.in', 'e10adc3949ba59abbe56e057f20f883e', 4, 1, '1838008869', '', '', '', '2016-10-13 15:14:29', '2016-10-13 15:14:29'),
(105, 'upendra@vibescom.in', '25f9e794323b453885f5181f1b624d0b', 4, 0, '297054607', '', '', '', '2016-10-13 16:29:21', '2016-10-13 16:29:21'),
(106, 'singh02mani@gmail.com', '3e9489b02b9b582247fc9c2feeb03a8b', 4, 0, '348751246', '', '', '', '2016-10-14 17:13:55', '2016-10-14 17:13:55'),
(107, 'lifemobilitysolution@gmail.com', '8a59bb639853e007aa5140861aa1ecad', 4, 1, '513961116', 'lifemobilitysolution@gmail.com', '100201933789795', 'facebook', '2016-10-17 10:29:47', '2016-10-17 10:29:47'),
(108, 'chauhan.kapil301@gmail.com', 'f321132a680938216cd7bb152d8765fa', 4, 0, '685218711', '', '', '', '2016-10-17 15:40:14', '2016-10-17 15:40:14'),
(109, 'vedanshabhishek@gmail.com', '8a59bb639853e007aa5140861aa1ecad', 4, 1, '295521282', '', '', '', '2016-10-17 16:02:00', '2016-10-17 16:02:00'),
(110, 'chandrika.aggarwa.l@vibescom.in', '568d2ba65e9e6600da54dd3a27f6d65e', 4, 0, '37356291', '', '', '', '2016-10-19 12:49:40', '2016-10-19 12:49:40'),
(111, 'meena@gmail.com', '25f9e794323b453885f5181f1b624d0b', 4, 0, '1172207704', '', '', '', '2016-10-20 11:47:58', '2016-10-20 11:47:58'),
(112, 'chandrika.aggarw.al@vibescom.in', '25f9e794323b453885f5181f1b624d0b', 4, 0, '1283032810', '', '', '', '2016-10-20 11:54:41', '2016-10-20 11:54:41'),
(113, 'dummysingh@gmail.com', '8a59bb639853e007aa5140861aa1ecad', 4, 0, '730252921', '', '', '', '2016-10-26 14:27:51', '2016-10-26 14:27:51');

-- --------------------------------------------------------

--
-- Table structure for table `sr_user_message`
--

CREATE TABLE IF NOT EXISTS `sr_user_message` (
  `msg_id` int(11) NOT NULL AUTO_INCREMENT,
  `msg` text NOT NULL,
  `msg_upload` varchar(255) NOT NULL,
  `sent_to` int(11) NOT NULL,
  `sent_by` int(11) NOT NULL,
  `sent_date` datetime NOT NULL,
  `receive_date` datetime NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0:inactive,1:active',
  `is_read` tinyint(4) NOT NULL DEFAULT '0' COMMENT '1:read,0:unread',
  `is_deletebyfrom` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0:no,1:yes',
  `is_deletebyto` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0:no,1:yes',
  `notify_status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0:not notify;1:notify',
  PRIMARY KEY (`msg_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=209 ;

--
-- Dumping data for table `sr_user_message`
--

INSERT INTO `sr_user_message` (`msg_id`, `msg`, `msg_upload`, `sent_to`, `sent_by`, `sent_date`, `receive_date`, `status`, `is_read`, `is_deletebyfrom`, `is_deletebyto`, `notify_status`) VALUES
(1, 'sdgehj', '1446272631Penguins.jpg', 3, 4, '2015-10-30 11:53:51', '0000-00-00 00:00:00', 1, 0, 0, 0, 0),
(2, 'rgjerhgbikj', '', 3, 4, '2015-10-31 12:12:12', '0000-00-00 00:00:00', 1, 0, 0, 0, 0),
(3, 'Hi', '', 20, 6, '2015-11-02 03:16:01', '2016-04-30 14:39:50', 1, 1, 1, 0, 1),
(4, 'testing messaging functionality', '', 20, 6, '2015-11-02 03:16:16', '2016-04-30 14:39:50', 1, 1, 1, 0, 1),
(5, 'hello', '', 6, 20, '2015-11-02 15:57:13', '2016-10-24 15:38:23', 1, 1, 0, 1, 1),
(6, 'Hi Shilpi,', '', 1, 36, '2015-11-03 17:20:32', '2016-10-12 13:27:54', 1, 1, 0, 0, 1),
(7, 'How are you...', '', 1, 36, '2015-11-03 17:20:46', '2016-10-12 13:27:54', 1, 1, 0, 0, 1),
(8, 'whats the weather like today', '', 20, 6, '2015-11-04 11:21:11', '2016-04-30 14:39:50', 1, 1, 1, 0, 1),
(9, 'Hey how are you ', '', 32, 6, '2015-11-14 18:14:04', '2016-01-26 12:01:42', 1, 1, 1, 0, 0),
(10, 'the weather is great', '', 32, 6, '2015-11-14 18:14:33', '2016-01-26 12:01:42', 1, 1, 1, 0, 0),
(11, 'greetings', '', 1, 6, '2015-11-26 22:04:12', '2016-10-12 13:30:38', 1, 1, 1, 0, 1),
(12, 'hello', '', 14, 6, '2015-11-29 20:48:50', '0000-00-00 00:00:00', 1, 0, 1, 0, 0),
(13, 'hello', '', 14, 6, '2015-11-29 20:49:06', '0000-00-00 00:00:00', 1, 0, 1, 0, 0),
(14, 'hello sir', '', 36, 1, '2015-12-17 17:33:18', '2016-08-20 17:51:05', 1, 1, 0, 0, 1),
(15, 'Hello', '', 27, 6, '2015-12-19 16:33:40', '2016-04-07 11:12:09', 1, 1, 1, 0, 0),
(16, 'Hello', '', 1, 6, '2015-12-25 19:24:37', '2016-10-12 13:30:38', 1, 1, 1, 0, 1),
(17, 'hello imran..', '', 6, 1, '2015-12-26 11:13:38', '2016-10-14 02:42:10', 1, 1, 0, 1, 1),
(18, 'hello', '', 1, 6, '2015-12-27 21:53:48', '2016-10-12 13:30:38', 1, 1, 1, 0, 1),
(19, 'test', '', 1, 6, '2015-12-27 21:53:57', '2016-10-12 13:30:38', 1, 1, 1, 0, 1),
(20, 'dfgdfg', '', 1, 6, '2015-12-27 21:54:05', '2016-10-12 13:30:38', 1, 1, 1, 0, 1),
(21, 'hello', '', 20, 1, '2016-01-02 12:28:34', '2016-04-30 13:08:49', 1, 1, 1, 0, 0),
(22, 'HELLO', '', 1, 50, '2016-01-19 18:18:24', '2016-06-17 13:03:03', 1, 1, 0, 0, 1),
(23, 'HEII', '', 50, 1, '2016-01-19 18:19:14', '2016-10-19 12:40:24', 1, 1, 0, 0, 1),
(24, 'hel', '', 50, 1, '2016-01-19 18:24:23', '2016-10-19 12:40:24', 1, 1, 0, 0, 1),
(25, 'hhh', '', 50, 1, '2016-01-19 18:25:12', '2016-10-19 12:40:24', 1, 1, 0, 0, 1),
(26, 'yo', '', 34, 6, '2016-01-19 22:22:06', '2016-02-25 18:14:00', 1, 1, 1, 0, 1),
(27, 'yo', '', 34, 6, '2016-01-19 22:22:11', '2016-02-25 18:14:00', 1, 1, 1, 0, 1),
(28, '(:', '', 36, 1, '2016-01-27 14:55:16', '2016-08-20 17:51:05', 1, 1, 0, 0, 1),
(29, 'We proudly say that we received the Brand Achievers Awards - 2015 of Dental Care Experts in Delhi-Ncr. National Dental Excellence Award 2015 for Best Dental and Oral Health Treatments Center In Noida. National Dental Excellence Award 2014 for best cosmetic dentist in noida Best Dental Experts in Delhi- Ncr by Brand Achievers', '', 36, 1, '2016-01-27 15:54:58', '2016-08-20 17:51:05', 1, 1, 0, 0, 1),
(30, 'hey dude', '', 43, 6, '2016-01-29 22:28:05', '2016-08-16 15:13:30', 1, 1, 1, 0, 1),
(31, 'whats happening', '', 43, 6, '2016-01-29 22:28:10', '2016-08-16 15:13:30', 1, 1, 1, 0, 1),
(32, 'hello', '', 21, 6, '2016-02-04 17:08:20', '0000-00-00 00:00:00', 1, 0, 1, 0, 0),
(33, 'hi', '', 27, 6, '2016-02-04 18:59:28', '2016-04-07 11:12:09', 1, 1, 1, 0, 0),
(34, 'hey whats up', '', 6, 56, '2016-02-04 20:31:37', '2016-10-24 14:11:08', 1, 1, 0, 1, 1),
(35, 'hello!', '', 56, 6, '2016-02-05 22:30:45', '2016-06-21 19:10:05', 1, 1, 1, 0, 1),
(36, 'so whats happening', '', 6, 56, '2016-02-05 22:31:44', '2016-10-24 14:11:08', 1, 1, 0, 1, 1),
(37, 'oh not much', '', 56, 6, '2016-02-05 22:32:50', '2016-06-21 19:10:05', 1, 1, 1, 0, 1),
(38, 'just hanging out with my friends', '', 56, 6, '2016-02-05 22:33:02', '2016-06-21 19:10:05', 1, 1, 1, 0, 1),
(39, 'what about you', '', 56, 6, '2016-02-05 22:33:20', '2016-06-21 19:10:05', 1, 1, 1, 0, 1),
(40, 'me? i am a secret agent', '', 6, 56, '2016-02-05 22:34:07', '2016-10-24 14:11:08', 1, 1, 0, 1, 1),
(41, 'and i\\''m on a mission', '', 6, 56, '2016-02-05 22:34:14', '2016-10-24 14:11:08', 1, 1, 0, 1, 1),
(42, 'Hello (:', '', 20, 38, '2016-02-09 14:38:40', '2016-04-13 11:36:18', 1, 1, 0, 0, 0),
(43, 'Hello Friend ', '', 36, 38, '2016-02-09 14:40:12', '2016-05-30 13:02:54', 1, 1, 0, 0, 1),
(44, 'i sometimes eat pizza without cheese', '', 6, 56, '2016-02-11 11:42:05', '2016-10-24 14:11:08', 1, 1, 0, 1, 1),
(45, 'it\\''s called keema nan', '', 6, 56, '2016-02-11 11:42:15', '2016-10-24 14:11:08', 1, 1, 0, 1, 1),
(46, 'interesting', '', 56, 6, '2016-02-11 11:43:41', '2016-06-21 19:10:05', 1, 1, 1, 0, 1),
(47, 'hello', '', 6, 34, '2016-02-11 12:15:43', '2016-08-18 02:36:26', 1, 1, 0, 1, 1),
(48, 'greetings', '', 34, 6, '2016-02-11 12:17:25', '2016-02-25 18:14:00', 1, 1, 1, 0, 1),
(49, 'Hello (:', '', 29, 38, '2016-02-11 19:42:25', '0000-00-00 00:00:00', 1, 0, 0, 0, 0),
(50, 'Hello (:', '', 50, 38, '2016-02-11 19:43:45', '2016-10-19 12:40:23', 1, 1, 0, 0, 1),
(51, 'Hello', '', 27, 38, '2016-02-11 19:44:32', '2016-04-13 12:41:56', 1, 1, 0, 0, 0),
(52, 'Hello (:', '', 1, 38, '2016-02-11 19:45:01', '2016-10-12 13:30:00', 1, 1, 0, 0, 1),
(53, 'hello', '', 38, 1, '2016-02-12 15:06:31', '2016-02-12 18:52:30', 1, 1, 0, 0, 0),
(54, 'hey', '', 56, 6, '2016-02-16 12:21:57', '2016-06-21 19:10:05', 1, 1, 1, 0, 1),
(55, 'hello .....&lt;img alt=&quot;ðŸ˜€&quot; class=&quot;emojione-1F600&quot; src=&quot;data:image/gif;base64,R0lGODlhAQABAJH/AP///wAAAMDAwAAAACH5BAEAAAIALAAAAAABAAEAAAICVAEAOw==&quot;&gt;', '', 6, 34, '2016-02-22 12:48:38', '2016-08-18 02:36:26', 1, 1, 0, 1, 1),
(56, '&lt;img alt=&quot;ðŸŒ±&quot; class=&quot;emojione-1F331&quot; src=&quot;data:image/gif;base64,R0lGODlhAQABAJH/AP///wAAAMDAwAAAACH5BAEAAAIALAAAAAABAAEAAAICVAEAOw==&quot;&gt;&lt;img alt=&quot;ðŸ…&quot; class=&quot;emojione-1F345&quot; src=&quot;data:image/gif;base64,R0lGODlhAQABAJH/AP///wAAAMDAwAAAACH5BAEAAAIALAAAAAABAAEAAAICVAEAOw==&quot;&gt;&lt;img alt=&quot;ðŸŽƒ&quot; class=&quot;emojione-1F383&quot; src=&quot;data:image/gif;base64,R0lGODlhAQABAJH/AP///wAAAMDAwAAAACH5BAEAAAIALAAAAAABAAEAAAICVAEAOw==&quot;&gt;&lt;img alt=&quot;ðŸƒ&quot; class=&quot;emojione-1F3C3&quot; src=&quot;data:image/gif;base64,R0lGODlhAQABAJH/AP///wAAAMDAwAAAACH5BAEAAAIALAAAAAABAAEAAAICVAEAOw==&quot;&gt;&lt;img alt=&quot;ðŸšƒ&quot; class=&quot;emojione-1F683&quot; src=&quot;data:image/gif;base64,R0lGODlhAQABAJH/AP///wAAAMDAwAAAACH5BAEAAAIALAAAAAABAAEAAAICVAEAOw==&quot;&gt;&lt;img alt=&quot;âŒš&quot; class=&quot;emojione-231A&quot; src=&quot;data:image/gif;base64,R0lGODlhAQABAJH/AP///wAAAMDAwAAAACH5BAEAAAIALAAAAAABAAEAAAICVAEAOw==&quot;&gt;&lt;img alt=&quot;ðŸ‡®ðŸ‡³&quot; class=&quot;emojione-1F1EE-1F1F3&quot; src=&quot;data:image/gif;base64,R0lGODlhAQABAJH/AP///wAAAMDAwAAAACH5BAEAAAIALAAAAAABAAEAAAICVAEAOw==&quot;&gt;', '', 6, 34, '2016-02-22 12:49:11', '2016-08-18 02:36:26', 1, 1, 0, 1, 1),
(57, '&lt;img alt=&quot;ðŸŽƒ&quot; class=&quot;emojione-1F383&quot; src=&quot;data:image/gif;base64,R0lGODlhAQABAJH/AP///wAAAMDAwAAAACH5BAEAAAIALAAAAAABAAEAAAICVAEAOw==&quot;&gt;&lt;img alt=&quot;ðŸ•&quot; class=&quot;emojione-1F355&quot; src=&quot;data:image/gif;base64,R0lGODlhAQABAJH/AP///wAAAMDAwAAAACH5BAEAAAIALAAAAAABAAEAAAICVAEAOw==&quot;&gt;&lt;img alt=&quot;ðŸ•&quot; class=&quot;emojione-1F355&quot; src=&quot;data:image/gif;base64,R0lGODlhAQABAJH/AP///wAAAMDAwAAAACH5BAEAAAIALAAAAAABAAEAAAICVAEAOw==&quot;&gt;&lt;img alt=&quot;ðŸ&quot; class=&quot;emojione-1F35D&quot; src=&quot;data:image/gif;base64,R0lGODlhAQABAJH/AP///wAAAMDAwAAAACH5BAEAAAIALAAAAAABAAEAAAICVAEAOw==&quot;&gt;&lt;img alt=&quot;ðŸŸ&quot; class=&quot;emojione-1F35F&quot; src=&quot;data:image/gif;base64,R0lGODlhAQABAJH/AP///wAAAMDAwAAAACH5BAEAAAIALAAAAAABAAEAAAICVAEAOw==&quot;&gt;&lt;img alt=&quot;ðŸ&quot; class=&quot;emojione-1F350&quot; src=&quot;data:image/gif;base64,R0lGODlhAQABAJH/AP///wAAAMDAwAAAACH5BAEAAAIALAAAAAABAAEAAAICVAEAOw==&quot;&gt;&lt;img alt=&quot;ðŸ‡ºðŸ‡¸&quot; class=&quot;emojione-1F1FA-1F1F8&quot; src=&quot;data:image/gif;base64,R0lGODlhAQABAJH/AP///wAAAMDAwAAAACH5BAEAAAIALAAAAAABAAEAAAICVAEAOw==&quot;&gt;&lt;img alt=&quot;ðŸ‡ºðŸ‡¸&quot; class=&quot;emojione-1F1FA-1F1F8&quot; src=&quot;data:image/gif;base64,R0lGODlhAQABAJH/AP///wAAAMDAwAAAACH5BAEAAAIALAAAAAABAAEAAAICVAEAOw==&quot;&gt;&lt;img alt=&quot;ðŸ‡ºðŸ‡¸&quot; class=&quot;emojione-1F1FA-1F1F8&quot; src=&quot;data:image/gif;base64,R0lGODlhAQABAJH/AP///wAAAMDAwAAAACH5BAEAAAIALAAAAAABAAEAAAICVAEAOw==&quot;&gt;&lt;img alt=&quot;ðŸ‡ºðŸ‡¸&quot; class=&quot;emojione-1F1FA-1F1F8&quot; src=&quot;data:image/gif;base64,R0lGODlhAQABAJH/AP///wAAAMDAwAAAACH5BAEAAAIALAAAAAABAAEAAAICVAEAOw==&quot;&gt;&lt;img alt=&quot;ðŸ‡ºðŸ‡¸&quot; class=&quot;emojione-1F1FA-1F1F8&quot; src=&quot;data:image/gif;base64,R0lGODlhAQABAJH/AP///wAAAMDAwAAAACH5BAEAAAIALAAAAAABAAEAAAICVAEAOw==&quot;&gt;', '', 34, 6, '2016-02-22 20:19:19', '2016-02-25 18:14:00', 1, 1, 1, 0, 1),
(58, 'hello gulshan how are you...&lt;br&gt;', '', 5, 4, '2016-02-24 13:14:28', '0000-00-00 00:00:00', 1, 0, 0, 0, 0),
(59, 'hello&lt;img alt=&quot;ðŸ˜€&quot; class=&quot;emojione-1F600&quot; src=&quot;data:image/gif;base64,R0lGODlhAQABAJH/AP///wAAAMDAwAAAACH5BAEAAAIALAAAAAABAAEAAAICVAEAOw==&quot;&gt;', '', 4, 1, '2016-02-24 13:34:56', '2016-04-21 15:58:18', 1, 1, 0, 0, 0),
(60, 'hello', '', 27, 4, '2016-02-24 13:41:33', '2016-04-07 11:11:26', 1, 1, 0, 0, 0),
(61, 'hi', '', 1, 4, '2016-02-24 13:47:00', '2016-10-12 13:29:21', 1, 1, 0, 0, 1),
(62, 'hello...', '', 33, 34, '2016-02-25 18:07:44', '0000-00-00 00:00:00', 1, 0, 0, 0, 0),
(63, '&lt;img alt=&quot;ðŸ˜€&quot; class=&quot;emojione-1F600&quot; src=&quot;data:image/gif;base64,R0lGODlhAQABAJH/AP///wAAAMDAwAAAACH5BAEAAAIALAAAAAABAAEAAAICVAEAOw==&quot;&gt;', '', 33, 34, '2016-02-25 18:51:09', '0000-00-00 00:00:00', 1, 0, 0, 0, 0),
(64, 'hello burbak mam&lt;div&gt;&lt;br&gt;&lt;/div&gt;', '', 1, 34, '2016-03-11 15:15:28', '2016-06-22 12:23:03', 1, 1, 0, 0, 1),
(65, 'hello shaithan', '', 34, 1, '2016-03-11 15:16:21', '2016-03-11 15:22:22', 1, 1, 0, 0, 1),
(66, 'hello&amp;nbsp;&lt;div&gt;&lt;br&gt;&lt;/div&gt;', '', 1, 34, '2016-03-11 15:16:54', '2016-06-22 12:23:03', 1, 1, 0, 0, 1),
(67, 'hewejgk', '', 34, 1, '2016-03-11 15:17:08', '2016-03-11 15:22:22', 1, 1, 0, 0, 1),
(68, 'good work&lt;div&gt;&lt;br&gt;&lt;/div&gt;', '', 1, 34, '2016-03-11 15:17:48', '2016-06-22 12:23:03', 1, 1, 0, 0, 1),
(69, 'no sound', '', 1, 34, '2016-03-11 15:18:25', '2016-06-22 12:23:03', 1, 1, 0, 0, 1),
(70, '&lt;img alt=&quot;ðŸ‰&quot; class=&quot;emojione-1F349&quot; src=&quot;data:image/gif;base64,R0lGODlhAQABAJH/AP///wAAAMDAwAAAACH5BAEAAAIALAAAAAABAAEAAAICVAEAOw==&quot;&gt;&lt;img alt=&quot;ðŸ˜‹&quot; class=&quot;emojione-1F60B&quot; src=&quot;data:image/gif;base64,R0lGODlhAQABAJH/AP///wAAAMDAwAAAACH5BAEAAAIALAAAAAABAAEAAAICVAEAOw==&quot;&gt;', '', 1, 34, '2016-03-11 15:18:51', '2016-06-22 12:23:03', 1, 1, 0, 0, 1),
(71, 'nocjbdjbvjbvjvb', '', 34, 1, '2016-03-11 15:19:19', '2016-03-11 15:22:22', 1, 1, 0, 0, 1),
(72, 'this .that', '', 1, 34, '2016-03-11 15:19:43', '2016-06-22 12:23:03', 1, 1, 0, 0, 1),
(73, 'beh tabah mat kijiyae', '', 1, 34, '2016-03-11 15:22:42', '2016-06-22 12:23:03', 1, 1, 0, 0, 1),
(74, 'had tabahi hai bhai', '', 1, 34, '2016-03-11 15:24:44', '2016-06-22 12:23:03', 1, 1, 0, 0, 1),
(75, 'dhat teri ki', '', 1, 34, '2016-03-11 16:07:04', '2016-06-22 12:23:03', 1, 1, 0, 0, 1),
(76, 'hey whats up&lt;div&gt;ok&amp;nbsp;&lt;/div&gt;', '', 56, 6, '2016-03-12 17:49:40', '2016-06-21 19:10:05', 1, 1, 1, 0, 1),
(77, 'hi nishith&lt;br&gt;', '', 27, 4, '2016-04-11 11:48:57', '0000-00-00 00:00:00', 1, 0, 0, 0, 0),
(78, '&lt;img alt=&quot;ðŸŽ&quot; class=&quot;emojione-1F381&quot; src=&quot;data:image/gif;base64,R0lGODlhAQABAJH/AP///wAAAMDAwAAAACH5BAEAAAIALAAAAAABAAEAAAICVAEAOw==&quot;&gt;', '', 6, 1, '2016-04-28 19:03:33', '2016-10-14 02:42:10', 1, 1, 0, 1, 1),
(79, 'hello&lt;div&gt;&lt;br&gt;&lt;/div&gt;', '', 1, 6, '2016-05-11 02:32:17', '2016-10-12 13:30:38', 1, 1, 1, 0, 1),
(80, 'dfdfg', '', 4, 1, '2016-05-20 13:20:07', '0000-00-00 00:00:00', 1, 0, 0, 0, 0),
(81, 'hi', '', 46, 6, '2016-05-20 20:25:27', '0000-00-00 00:00:00', 1, 0, 1, 0, 0),
(82, 'heeelo&lt;div&gt;&lt;img alt=&quot;ðŸ˜&quot; class=&quot;emojione-1F60F&quot; src=&quot;data:image/gif;base64,R0lGODlhAQABAJH/AP///wAAAMDAwAAAACH5BAEAAAIALAAAAAABAAEAAAICVAEAOw==&quot;&gt;&lt;br&gt;&lt;/div&gt;', '', 56, 6, '2016-05-22 21:16:27', '2016-06-21 19:10:05', 1, 1, 1, 0, 1),
(83, 'hello', '', 1, 36, '2016-05-30 11:37:21', '2016-10-12 13:27:54', 1, 1, 0, 0, 1),
(84, '&lt;img alt=&quot;ðŸ˜Š&quot; class=&quot;emojione-1F60A&quot; src=&quot;data:image/gif;base64,R0lGODlhAQABAJH/AP///wAAAMDAwAAAACH5BAEAAAIALAAAAAABAAEAAAICVAEAOw==&quot;&gt;&lt;img alt=&quot;ðŸ˜Š&quot; class=&quot;emojione-1F60A&quot; src=&quot;data:image/gif;base64,R0lGODlhAQABAJH/AP///wAAAMDAwAAAACH5BAEAAAIALAAAAAABAAEAAAICVAEAOw==&quot;&gt;', '', 1, 36, '2016-05-30 13:10:24', '2016-10-12 13:27:54', 1, 1, 0, 0, 1),
(85, 'hi shilpi..&lt;div&gt;&lt;br&gt;&lt;/div&gt;', '', 1, 36, '2016-06-03 11:37:53', '2016-10-12 13:27:54', 1, 1, 0, 0, 1),
(86, 'Hello', '', 1, 36, '2016-06-03 11:44:02', '2016-10-12 13:27:54', 1, 1, 0, 0, 1),
(87, 'Hi Mona', '', 14, 36, '2016-06-03 12:49:15', '0000-00-00 00:00:00', 1, 0, 0, 0, 0),
(88, 'hello shilpi', '', 50, 36, '2016-06-03 12:53:53', '2016-10-19 12:40:07', 1, 1, 0, 0, 1),
(89, 'hi', '', 1, 36, '2016-06-03 12:57:03', '2016-10-12 13:27:54', 1, 1, 0, 0, 1),
(90, 'hi Ma''am&lt;div&gt;&lt;br&gt;&lt;/div&gt;', '', 51, 36, '2016-06-03 12:58:31', '0000-00-00 00:00:00', 1, 0, 0, 0, 0),
(91, 'hi sudha', '', 66, 36, '2016-06-03 12:59:26', '0000-00-00 00:00:00', 1, 0, 0, 0, 0),
(92, 'Hi Abhay', '', 9, 72, '2016-06-04 16:23:10', '2016-07-11 17:11:31', 1, 1, 0, 0, 1),
(93, 'hello again', '', 4, 72, '2016-06-04 16:23:46', '0000-00-00 00:00:00', 1, 0, 0, 0, 0),
(94, 'hi dharnm', '', 36, 72, '2016-06-04 16:24:07', '2016-06-06 14:18:55', 1, 1, 0, 0, 1),
(95, 'sir jai hind', '', 5, 72, '2016-06-04 16:24:32', '0000-00-00 00:00:00', 1, 0, 0, 0, 0),
(96, 'hello', '', 70, 72, '2016-06-04 16:25:34', '2016-08-15 20:23:59', 1, 1, 0, 0, 1),
(97, 'hello', '', 29, 36, '2016-06-04 16:29:59', '0000-00-00 00:00:00', 1, 0, 0, 0, 0),
(98, 'hi', '', 33, 36, '2016-06-04 16:30:17', '0000-00-00 00:00:00', 1, 0, 0, 0, 0),
(99, 'hey', '', 2, 36, '2016-06-04 16:30:25', '0000-00-00 00:00:00', 1, 0, 0, 0, 0),
(100, 'buddy&lt;div&gt;&lt;br&gt;&lt;/div&gt;', '', 56, 36, '2016-06-04 16:30:38', '2016-06-21 19:11:05', 1, 1, 0, 0, 1),
(101, 'Manager Sir&lt;div&gt;&lt;br&gt;&lt;/div&gt;', '', 20, 36, '2016-06-04 16:30:59', '0000-00-00 00:00:00', 1, 0, 0, 0, 0),
(102, 'hi', '', 36, 72, '2016-06-04 17:06:27', '2016-06-06 14:18:55', 1, 1, 0, 0, 1),
(103, 'Hello Dharm&lt;br&gt;', '', 36, 74, '2016-06-04 17:50:30', '2016-06-06 14:19:59', 1, 1, 0, 0, 1),
(104, 'hi Sir&lt;br&gt;', '', 36, 75, '2016-06-04 17:58:47', '2016-08-20 17:50:57', 1, 1, 0, 0, 1),
(105, 'Hello Asif', '', 42, 36, '2016-06-06 12:26:43', '2016-08-17 14:53:37', 1, 1, 0, 0, 1),
(106, 'Hi', '', 72, 36, '2016-06-06 12:28:12', '0000-00-00 00:00:00', 1, 0, 0, 0, 0),
(107, 'hello', '', 21, 36, '2016-06-06 12:28:57', '0000-00-00 00:00:00', 1, 0, 0, 0, 0),
(108, 'Hi Raj', '', 24, 36, '2016-06-06 12:29:09', '0000-00-00 00:00:00', 1, 0, 0, 0, 0),
(109, 'hello', '', 10, 36, '2016-06-06 12:30:56', '0000-00-00 00:00:00', 1, 0, 0, 0, 0),
(110, 'hello', '', 21, 36, '2016-06-06 13:27:14', '0000-00-00 00:00:00', 1, 0, 0, 0, 0),
(111, 'hello Sir', '', 36, 80, '2016-06-10 11:38:22', '2016-08-20 17:51:02', 1, 1, 0, 0, 1),
(112, 'zafsehed', '', 1, 36, '2016-06-10 11:43:24', '2016-10-12 13:27:54', 1, 1, 0, 0, 1),
(113, 'hello', '', 2, 1, '2016-06-10 12:21:09', '0000-00-00 00:00:00', 1, 0, 0, 0, 0),
(114, 'yo&lt;div&gt;&lt;br&gt;&lt;/div&gt;', '', 56, 6, '2016-06-11 19:40:43', '2016-06-21 19:10:05', 1, 1, 1, 0, 1),
(115, 'yo&lt;div&gt;&lt;br&gt;&lt;/div&gt;', '', 56, 6, '2016-06-11 19:40:54', '2016-06-21 19:10:05', 1, 1, 1, 0, 1),
(116, 'hello', '', 56, 6, '2016-06-11 19:41:02', '2016-06-21 19:10:05', 1, 1, 1, 0, 1),
(117, '', '', 36, 56, '2016-06-21 19:11:08', '2016-08-20 17:50:48', 1, 1, 0, 0, 1),
(118, '', '', 72, 9, '2016-07-11 16:53:38', '0000-00-00 00:00:00', 1, 0, 0, 0, 0),
(119, '', '', 72, 9, '2016-07-11 17:01:06', '0000-00-00 00:00:00', 1, 0, 0, 0, 0),
(120, 'TEST MESSAGE.. PLEASE RESPOND&lt;br&gt;', '', 31, 9, '2016-07-11 17:07:27', '0000-00-00 00:00:00', 1, 0, 0, 0, 0),
(121, 'HELLO', '', 72, 9, '2016-07-11 17:11:40', '0000-00-00 00:00:00', 1, 0, 0, 0, 0),
(122, 'Hi&amp;nbsp;&lt;div&gt;&lt;br&gt;&lt;/div&gt;', '', 78, 96, '2016-08-08 02:49:56', '0000-00-00 00:00:00', 1, 0, 0, 0, 0),
(123, 'Hey dude', '', 91, 97, '2016-08-08 03:13:24', '0000-00-00 00:00:00', 1, 0, 0, 0, 0),
(124, 'Hi, please add your interest', '', 65, 36, '2016-08-08 17:30:13', '0000-00-00 00:00:00', 1, 0, 0, 0, 0),
(125, 'hello', '', 20, 6, '2016-08-10 21:27:24', '0000-00-00 00:00:00', 1, 0, 1, 0, 0),
(126, '&lt;img alt=&quot;ðŸ˜ƒ&quot; class=&quot;emojione-1F603&quot; src=&quot;data:image/gif;base64,R0lGODlhAQABAJH/AP///wAAAMDAwAAAACH5BAEAAAIALAAAAAABAAEAAAICVAEAOw==&quot;&gt;', '', 20, 6, '2016-08-15 21:50:30', '0000-00-00 00:00:00', 1, 0, 1, 0, 0),
(127, '&lt;img alt=&quot;ðŸ„&quot; class=&quot;emojione-1F344&quot; src=&quot;data:image/gif;base64,R0lGODlhAQABAJH/AP///wAAAMDAwAAAACH5BAEAAAIALAAAAAABAAEAAAICVAEAOw==&quot;&gt;', '', 20, 6, '2016-08-15 21:50:37', '0000-00-00 00:00:00', 1, 0, 1, 0, 0),
(128, 'hey bro&lt;div&gt;&lt;br&gt;&lt;/div&gt;', '', 6, 43, '2016-08-16 15:11:49', '2016-08-18 02:51:51', 1, 1, 0, 1, 1),
(129, 'yo', '', 43, 6, '2016-08-16 15:12:54', '2016-08-16 15:13:30', 1, 1, 1, 0, 1),
(130, 'hi vivek', '', 82, 99, '2016-08-17 23:21:07', '0000-00-00 00:00:00', 1, 0, 0, 0, 0),
(131, '&lt;img alt=&quot;ðŸ•&quot; class=&quot;emojione-1F355&quot; src=&quot;data:image/gif;base64,R0lGODlhAQABAJH/AP///wAAAMDAwAAAACH5BAEAAAIALAAAAAABAAEAAAICVAEAOw==&quot;&gt;', '1471456299dreamstime_xs_18399392.jpg', 82, 99, '2016-08-17 23:21:39', '0000-00-00 00:00:00', 1, 0, 0, 0, 0),
(132, 'hfg', '1471456318dreamstime_xs_17716945 - Copy.jpg', 82, 99, '2016-08-17 23:21:58', '0000-00-00 00:00:00', 1, 0, 0, 0, 0),
(133, 'hi vidya', '', 97, 99, '2016-08-17 23:30:44', '0000-00-00 00:00:00', 1, 0, 0, 0, 0),
(134, 'what is happening', '', 97, 99, '2016-08-17 23:30:53', '0000-00-00 00:00:00', 1, 0, 0, 0, 0),
(135, 'hi vidya', '', 97, 99, '2016-08-17 23:31:00', '0000-00-00 00:00:00', 1, 0, 0, 0, 0),
(136, 'hello', '', 97, 99, '2016-08-17 23:31:06', '0000-00-00 00:00:00', 1, 0, 0, 0, 0),
(137, 'hey bro&lt;div&gt;&lt;br&gt;&lt;/div&gt;', '', 6, 99, '2016-08-18 02:12:44', '2016-08-18 03:09:09', 1, 1, 0, 1, 1),
(138, 'how are you', '', 6, 99, '2016-08-18 02:14:47', '2016-08-18 03:09:09', 1, 1, 0, 1, 1),
(139, 'hi Meera', '', 99, 6, '2016-08-18 02:15:54', '2016-08-18 02:16:33', 1, 1, 1, 0, 1),
(140, 'whats are you doing', '', 6, 99, '2016-08-18 02:16:32', '2016-08-18 03:09:09', 1, 1, 0, 1, 1),
(141, 'oh, nothing, just relaxing', '', 99, 6, '2016-08-18 02:16:50', '2016-08-18 02:17:18', 1, 1, 1, 0, 1),
(142, 'oh right', '', 6, 99, '2016-08-18 02:17:18', '2016-08-18 03:09:09', 1, 1, 0, 1, 1),
(143, 'dsfa', '1471468004dreamstime_xs_18399392.jpg', 34, 6, '2016-08-18 02:36:44', '0000-00-00 00:00:00', 1, 0, 1, 0, 1),
(144, 'hey you there', '', 6, 99, '2016-08-18 02:44:52', '2016-08-18 03:09:09', 1, 1, 0, 1, 1),
(145, 'HEllo Priyanka&lt;div&gt;&lt;br&gt;&lt;/div&gt;', '', 65, 94, '2016-08-19 16:24:04', '0000-00-00 00:00:00', 1, 0, 0, 0, 0),
(146, 'Ashwani here', '', 65, 94, '2016-08-19 16:25:36', '0000-00-00 00:00:00', 1, 0, 0, 0, 0),
(147, 'What Are you Doing', '', 65, 94, '2016-08-19 16:25:50', '0000-00-00 00:00:00', 1, 0, 0, 0, 0),
(148, 'Hello Sir', '', 36, 94, '2016-08-19 16:26:43', '2016-09-12 16:14:13', 1, 1, 1, 0, 1),
(149, 'hi Ashwani&lt;br&gt;', '', 94, 36, '2016-08-19 16:28:18', '2016-10-13 16:11:22', 1, 1, 0, 1, 1),
(150, 'Hi Sir', '', 36, 94, '2016-08-19 16:57:39', '2016-09-12 16:14:13', 1, 1, 1, 0, 1),
(151, 'Hi Si r&lt;br&gt;', '', 94, 36, '2016-08-19 16:58:11', '2016-10-13 16:11:22', 1, 1, 0, 1, 1),
(152, 'A B C D E F G H', '', 36, 94, '2016-08-19 17:20:20', '2016-09-12 16:14:13', 1, 1, 1, 0, 1),
(153, 'AB CD EF', '', 36, 94, '2016-08-19 17:20:41', '2016-09-12 16:14:13', 1, 1, 1, 0, 1),
(154, 'Hi Ashwani&lt;br&gt;&lt;br&gt;', '', 94, 36, '2016-08-20 12:11:15', '2016-10-13 16:11:22', 1, 1, 0, 1, 1),
(155, 'Hello&lt;br&gt;&lt;br&gt;', '', 94, 36, '2016-08-20 12:24:32', '2016-10-13 16:11:22', 1, 1, 0, 1, 1),
(156, 'hi Ashwani&lt;br&gt;', '', 94, 36, '2016-08-20 17:20:50', '2016-10-13 16:11:22', 1, 1, 0, 1, 1),
(157, 'How are you&lt;br&gt;&lt;br&gt;', '', 94, 36, '2016-08-20 17:20:57', '2016-10-13 16:11:22', 1, 1, 0, 1, 1),
(158, '&lt;img alt=&quot;ðŸ˜‚&quot; class=&quot;emojione-1F602&quot; src=&quot;data:image/gif;base64,R0lGODlhAQABAJH/AP///wAAAMDAwAAAACH5BAEAAAIALAAAAAABAAEAAAICVAEAOw==&quot;&gt;', '', 94, 36, '2016-08-20 17:21:07', '2016-10-13 16:11:22', 1, 1, 0, 1, 1),
(159, 'Hello', '1471693930PAN.jpg', 94, 36, '2016-08-20 17:22:10', '2016-10-13 16:11:22', 1, 1, 0, 1, 1),
(160, 'hello&lt;div&gt;&lt;br&gt;&lt;/div&gt;', '', 75, 94, '2016-08-20 17:50:32', '0000-00-00 00:00:00', 1, 0, 0, 0, 0),
(161, 'Hi Ashwani&lt;div&gt;&lt;br&gt;&lt;/div&gt;', '', 94, 6, '2016-08-31 01:36:59', '2016-10-13 16:11:24', 1, 1, 0, 0, 1),
(162, 'hey&amp;nbsp;&lt;div&gt;what is happening&lt;/div&gt;', '', 94, 6, '2016-09-10 17:06:55', '2016-10-13 16:11:24', 1, 1, 0, 0, 1),
(163, 'hi deepak', '', 22, 6, '2016-09-10 17:08:52', '0000-00-00 00:00:00', 1, 0, 1, 0, 0),
(164, 'hello', '', 20, 6, '2016-10-04 02:55:29', '0000-00-00 00:00:00', 1, 0, 0, 0, 0),
(165, 'whats up geezer&lt;div&gt;&lt;br&gt;&lt;/div&gt;', '', 70, 6, '2016-10-07 02:11:42', '0000-00-00 00:00:00', 1, 0, 0, 0, 0),
(166, 'Hey how are you', '', 1, 6, '2016-10-12 11:28:06', '2016-10-12 13:30:38', 1, 1, 0, 0, 1),
(167, 'whats going on', '', 1, 6, '2016-10-12 11:28:29', '2016-10-12 13:30:38', 1, 1, 0, 0, 1),
(168, 'test', '', 1, 6, '2016-10-12 11:28:36', '2016-10-12 13:30:38', 1, 1, 0, 0, 1),
(169, 'hello', '', 6, 1, '2016-10-12 13:27:02', '2016-10-14 02:42:10', 1, 1, 0, 0, 1),
(170, 'Hi', '', 50, 103, '2016-10-12 17:25:28', '2016-10-19 12:40:11', 1, 1, 1, 1, 1),
(171, '', '', 103, 50, '2016-10-13 15:52:54', '2016-10-25 17:48:47', 1, 1, 1, 1, 1),
(172, 'solved??', '', 103, 50, '2016-10-13 15:53:51', '2016-10-25 17:48:47', 1, 1, 1, 1, 1),
(173, 'Yes &lt;img alt=&quot;ðŸ˜€&quot; class=&quot;emojione-1F600&quot; src=&quot;data:image/gif;base64,R0lGODlhAQABAJH/AP///wAAAMDAwAAAACH5BAEAAAIALAAAAAABAAEAAAICVAEAOw==&quot;&gt;&lt;br&gt;', '', 50, 103, '2016-10-13 16:15:49', '2016-10-19 12:40:11', 1, 1, 1, 1, 1),
(174, 'Hi', '', 38, 50, '2016-10-14 10:18:36', '0000-00-00 00:00:00', 1, 0, 0, 0, 0),
(175, 'hi', '', 103, 50, '2016-10-19 12:40:17', '2016-10-25 17:48:47', 1, 1, 1, 0, 1),
(176, 'Hello', '', 103, 110, '2016-10-19 12:53:02', '2016-10-19 17:02:11', 1, 1, 0, 0, 1),
(177, 'Hello&lt;br&gt;', '', 1, 110, '2016-10-19 17:05:45', '2016-10-20 11:22:06', 1, 1, 0, 0, 1),
(178, 'Hello', '', 1, 103, '2016-10-20 10:11:30', '2016-10-20 10:16:25', 1, 1, 0, 0, 1),
(179, 'Hi&lt;br&gt;', '', 27, 103, '2016-10-20 11:13:56', '0000-00-00 00:00:00', 1, 0, 0, 0, 0),
(180, 'Helloo', '', 1, 109, '2016-10-20 11:36:34', '2016-10-20 11:36:54', 1, 1, 0, 0, 1),
(181, 'hfghghn', '', 109, 1, '2016-10-20 11:37:07', '2016-10-24 13:54:15', 1, 1, 0, 0, 1),
(182, 'safsd', '', 4, 111, '2016-10-20 11:50:02', '0000-00-00 00:00:00', 1, 0, 0, 0, 0),
(183, 'destgdrf', '', 6, 111, '2016-10-20 11:50:33', '2016-10-24 13:39:27', 1, 1, 0, 0, 1),
(184, 'hello vedansh&lt;br&gt;', '', 109, 111, '2016-10-20 11:51:25', '2016-10-24 13:54:18', 1, 1, 0, 0, 1),
(185, 'hello devendra&lt;br&gt;', '', 8, 111, '2016-10-20 11:55:16', '2016-10-20 12:00:46', 1, 1, 0, 0, 1),
(186, 'yo&lt;div&gt;&lt;br&gt;&lt;/div&gt;', '', 111, 6, '2016-10-24 13:39:37', '0000-00-00 00:00:00', 1, 0, 0, 0, 0),
(187, 'Hello&lt;div&gt;&lt;br&gt;&lt;/div&gt;', '', 107, 6, '2016-10-24 14:12:24', '2016-10-26 16:17:26', 1, 1, 0, 0, 1),
(188, 'Hey&lt;div&gt;&lt;br&gt;&lt;/div&gt;', '', 6, 107, '2016-10-24 14:15:24', '2016-10-26 16:09:27', 1, 1, 0, 0, 1),
(189, '&lt;img alt=&quot;ðŸ˜ƒ&quot; class=&quot;emojione-1F603&quot; src=&quot;data:image/gif;base64,R0lGODlhAQABAJH/AP///wAAAMDAwAAAACH5BAEAAAIALAAAAAABAAEAAAICVAEAOw==&quot;&gt;&lt;img alt=&quot;ðŸ˜„&quot; class=&quot;emojione-1F604&quot; src=&quot;data:image/gif;base64,R0lGODlhAQABAJH/AP///wAAAMDAwAAAACH5BAEAAAIALAAAAAABAAEAAAICVAEAOw==&quot;&gt;&lt;img alt=&quot;ðŸ˜“&quot; class=&quot;emojione-1F613&quot; src=&quot;data:image/gif;base64,R0lGODlhAQABAJH/AP///wAAAMDAwAAAACH5BAEAAAIALAAAAAABAAEAAAICVAEAOw==&quot;&gt;&lt;img alt=&quot;ðŸ˜–&quot; class=&quot;emojione-1F616&quot; src=&quot;data:image/gif;base64,R0lGODlhAQABAJH/AP///wAAAMDAwAAAACH5BAEAAAIALAAAAAABAAEAAAICVAEAOw==&quot;&gt;&lt;img alt=&quot;ðŸ‘¿&quot; class=&quot;emojione-1F47F&quot; src=&quot;data:image/gif;base64,R0lGODlhAQABAJH/AP///wAAAMDAwAAAACH5BAEAAAIALAAAAAABAAEAAAICVAEAOw==&quot;&gt;&lt;img alt=&quot;ðŸ˜ˆ&quot; class=&quot;emojione-1F608&quot; src=&quot;data:image/gif;base64,R0lGODlhAQABAJH/AP///wAAAMDAwAAAACH5BAEAAAIALAAAAAABAAEAAAICVAEAOw==&quot;&gt;', '', 107, 6, '2016-10-24 14:15:49', '2016-10-26 16:17:26', 1, 1, 0, 0, 1),
(190, '&lt;img alt=&quot;ðŸ±&quot; class=&quot;emojione-1F431&quot; src=&quot;data:image/gif;base64,R0lGODlhAQABAJH/AP///wAAAMDAwAAAACH5BAEAAAIALAAAAAABAAEAAAICVAEAOw==&quot;&gt;', '', 6, 107, '2016-10-24 14:16:17', '2016-10-26 16:09:27', 1, 1, 0, 0, 1),
(191, 'Chat is going smooth', '147729890512278717_1094778460541032_3436073532889507705_n.jpg', 6, 107, '2016-10-24 14:18:25', '2016-10-26 16:09:27', 1, 1, 0, 0, 1),
(192, 'sending pic', '1477298964418778_480708485281369_1700393919_n.jpg', 6, 107, '2016-10-24 14:19:24', '2016-10-26 16:09:27', 1, 1, 0, 0, 1),
(193, 'image', '14772993111512702_712704358748446_2024017524_n.jpg', 6, 107, '2016-10-24 14:25:11', '2016-10-26 16:09:27', 1, 1, 0, 0, 1),
(194, 'hey', '', 6, 107, '2016-10-24 14:25:50', '2016-10-26 16:09:27', 1, 1, 0, 0, 1),
(195, 'img', '14772994141533771_712697332082482_468031992_n.jpg', 6, 107, '2016-10-24 14:26:54', '2016-10-26 16:09:27', 1, 1, 0, 0, 1),
(196, 'hi how are you doing ?', '', 6, 107, '2016-10-24 14:27:25', '2016-10-26 16:09:27', 1, 1, 0, 0, 1),
(197, 'to', '', 6, 107, '2016-10-24 14:27:34', '2016-10-26 16:09:27', 1, 1, 0, 0, 1),
(198, 'home', '', 6, 107, '2016-10-24 14:27:39', '2016-10-26 16:09:27', 1, 1, 0, 0, 1),
(199, 'hello prashant&lt;div&gt;&lt;br&gt;&lt;/div&gt;', '', 107, 6, '2016-10-24 14:28:21', '2016-10-26 16:17:26', 1, 1, 0, 0, 1),
(200, 'Hi&amp;nbsp;', '', 6, 113, '2016-10-26 14:51:17', '2016-10-26 16:26:05', 1, 1, 0, 0, 1),
(201, 'Thanks for visiting my profile', '', 6, 113, '2016-10-26 14:51:32', '2016-10-26 16:26:05', 1, 1, 0, 0, 1),
(202, 'received&lt;div&gt;your&lt;/div&gt;&lt;div&gt;message&lt;/div&gt;', '', 113, 6, '2016-10-26 14:52:07', '2016-10-26 16:26:50', 1, 1, 0, 0, 1),
(203, 'hello', '', 107, 6, '2016-10-26 16:09:33', '2016-10-26 16:17:26', 1, 1, 0, 0, 1),
(204, 'how are you&lt;div&gt;&lt;br&gt;&lt;/div&gt;', '', 107, 6, '2016-10-26 16:14:26', '2016-10-26 16:17:26', 1, 1, 0, 0, 1),
(205, 'hopefully this will get to you', '', 107, 6, '2016-10-26 16:16:30', '2016-10-26 16:17:26', 1, 1, 0, 0, 1),
(206, 'hello', '', 113, 6, '2016-10-26 16:26:11', '2016-10-26 16:26:50', 1, 1, 0, 0, 1),
(207, 'hello', '', 113, 6, '2016-10-26 16:26:16', '2016-10-26 16:26:50', 1, 1, 0, 0, 1),
(208, 'hello', '', 113, 6, '2016-10-26 16:26:23', '2016-10-26 16:26:50', 1, 1, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sr_user_notify`
--

CREATE TABLE IF NOT EXISTS `sr_user_notify` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email_id` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `datetime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `sr_user_notify`
--

INSERT INTO `sr_user_notify` (`id`, `email_id`, `country`, `gender`, `datetime`) VALUES
(1, 'shilpisingh1990@gmail.com', 'INDIA', '', '2015-07-29 10:24:24'),
(2, 'shilpi.singh@vibescom.in', '', '', '2015-08-07 13:13:55'),
(3, 'shilpi@gmail.com', 'AI: Anguilla', '', '2015-08-07 13:19:31'),
(4, 'shilpi123@ymail.com', 'United Kingdom', '', '2015-08-07 17:12:26'),
(5, 'shilpisingh064@gmail.com', 'Armenia', '', '2015-08-20 12:32:37'),
(6, 'rajdesignden@gmail.com', 'Ghana', '', '2015-08-31 12:46:50'),
(7, 'shilpisingh64@gmail.com', 'Bahrain', '', '2015-08-31 17:19:54'),
(8, 'shilpisingh1991@gmail.com', 'India', 'Female', '2015-10-28 13:13:33'),
(9, 'shilpisingh@gmail.com', 'India', 'Female', '2015-10-28 13:22:25');

-- --------------------------------------------------------

--
-- Table structure for table `sr_user_photo`
--

CREATE TABLE IF NOT EXISTS `sr_user_photo` (
  `photo_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `caption` varchar(255) NOT NULL,
  `status` int(3) NOT NULL DEFAULT '1' COMMENT '1:active,0:inactive',
  `private` int(3) NOT NULL DEFAULT '0' COMMENT '1:private',
  `photo_type` int(3) NOT NULL COMMENT '1:photos of you;2:photos you and friends',
  `rate_status` tinyint(4) NOT NULL COMMENT '0:inactive,1:active',
  `is_profileImage` tinyint(4) NOT NULL DEFAULT '0' COMMENT '1:yes,0:no',
  `from_facebook` int(1) NOT NULL DEFAULT '0' COMMENT '1:yes,0:no',
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_on` datetime NOT NULL,
  PRIMARY KEY (`photo_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=306 ;

--
-- Dumping data for table `sr_user_photo`
--

INSERT INTO `sr_user_photo` (`photo_id`, `user_id`, `photo`, `caption`, `status`, `private`, `photo_type`, `rate_status`, `is_profileImage`, `from_facebook`, `created_on`, `created_by`, `updated_by`, `updated_on`) VALUES
(113, 56, '1454597224_dreamstime_xs_2102701.jpg', '', 1, 0, 1, 0, 0, 0, '2016-02-04 20:17:04', 56, 56, '2016-02-04 20:17:04'),
(111, 50, '1453207682_download.jpg', '', 1, 0, 1, 0, 1, 0, '2016-01-19 18:18:02', 50, 50, '2016-01-19 18:18:02'),
(7, 8, '1440079524_image2.png', '', 1, 0, 1, 0, 0, 0, '2015-08-20 19:35:24', 8, 8, '2015-08-20 19:35:24'),
(9, 8, '1440424249_slid-1.jpg', '', 1, 0, 1, 0, 0, 0, '2015-08-24 19:20:49', 8, 8, '2015-08-24 19:20:49'),
(10, 8, '1440424336_img1.jpg', '', 1, 1, 1, 0, 0, 0, '2015-08-24 19:22:16', 8, 8, '2015-08-24 19:22:16'),
(11, 5, '1440478047_download_(1).jpg', '', 1, 0, 1, 0, 0, 0, '2015-08-25 10:17:27', 5, 5, '2015-08-25 10:17:27'),
(12, 5, '1440478060_download.jpg', '', 1, 0, 1, 1, 0, 0, '2015-08-25 10:17:40', 5, 5, '2015-08-25 10:17:40'),
(15, 4, '1440671318_IMG-20150502-WA004.jpg', '', 1, 0, 1, 1, 0, 0, '2015-08-27 15:58:38', 4, 4, '2015-08-27 15:58:38'),
(107, 51, '511452949210.jpg', '', 1, 0, 1, 0, 0, 1, '2016-01-16 18:30:10', 51, 51, '2016-01-16 18:30:10'),
(112, 55, '1453887789_21418-200.png', '', 1, 0, 1, 0, 1, 0, '2016-01-27 15:13:09', 55, 55, '2016-01-27 15:13:09'),
(106, 51, '511452949176.jpg', '', 1, 0, 1, 0, 0, 1, '2016-01-16 18:29:36', 51, 51, '2016-01-16 18:29:36'),
(24, 4, '1441346029_IMG-20150505-WA002.jpg', '', 1, 0, 2, 0, 0, 0, '2015-09-04 11:23:49', 4, 4, '2015-09-04 11:23:49'),
(28, 4, '1441346362_IMG-20150502-WA003.jpg', '', 1, 0, 2, 0, 0, 0, '2015-09-04 11:29:22', 4, 4, '2015-09-04 11:29:22'),
(26, 4, '1441346232_IMG-20150502-WA005.jpg', '', 1, 0, 2, 0, 0, 0, '2015-09-04 11:27:12', 4, 4, '2015-09-04 11:27:12'),
(29, 4, '1441346498_IMG-20150506-WA002.jpg', '', 1, 1, 0, 0, 0, 0, '2015-09-04 11:31:38', 4, 4, '2015-09-04 11:31:38'),
(105, 51, '511452949160.jpg', '', 1, 0, 1, 0, 0, 1, '2016-01-16 18:29:20', 51, 51, '2016-01-16 18:29:20'),
(37, 8, '1442815436_photo4rate.png', 'devendra', 1, 0, 1, 0, 0, 0, '2015-09-21 11:33:56', 8, 8, '2015-09-21 11:33:56'),
(38, 8, '1442815748_my-photo3.jpg', '', 1, 0, 2, 0, 0, 0, '2015-09-21 11:39:08', 8, 8, '2015-09-21 11:39:08'),
(39, 8, '1442815783_usersSpotlightMan4.png', '', 1, 1, 0, 0, 0, 0, '2015-09-21 11:39:43', 8, 8, '2015-09-21 11:39:43'),
(40, 4, '1443158307_14fd3fb.jpg', '', 1, 0, 1, 1, 1, 0, '2015-09-25 10:48:27', 4, 4, '2015-09-25 10:48:27'),
(42, 4, '1443160519_IMG_20141128_200024.jpg', '', 1, 0, 2, 0, 0, 0, '2015-09-25 11:25:19', 4, 4, '2015-09-25 11:25:19'),
(43, 4, '1443160607_IMG_20150101_173222.jpg', '', 1, 0, 2, 0, 0, 0, '2015-09-25 11:26:47', 4, 4, '2015-09-25 11:26:47'),
(44, 4, '1443160653_IMG_20150101_165755.jpg', '', 1, 0, 2, 0, 0, 0, '2015-09-25 11:27:33', 4, 4, '2015-09-25 11:27:33'),
(45, 4, '1443164404_IMG_20150101_173211.jpg', '', 1, 0, 1, 1, 0, 0, '2015-09-25 12:30:05', 4, 4, '2015-09-25 12:30:05'),
(46, 4, '1443164463_IMG_20150101_165817.jpg', '', 1, 0, 1, 1, 0, 0, '2015-09-25 12:31:03', 4, 4, '2015-09-25 12:31:03'),
(47, 4, '1443164588_IMG_20141031_195855.jpg', '', 1, 0, 1, 1, 0, 0, '2015-09-25 12:33:08', 4, 4, '2015-09-25 12:33:08'),
(48, 4, '1443164668_IMG_20150101_173742.jpg', '', 1, 0, 1, 1, 0, 0, '2015-09-25 12:34:28', 4, 4, '2015-09-25 12:34:28'),
(49, 4, '1443164726_IMG_20150126_095035.jpg', '', 1, 0, 1, 1, 0, 0, '2015-09-25 12:35:26', 4, 4, '2015-09-25 12:35:26'),
(50, 4, '1443165178_IMG-20150609-WA002.jpg', '', 2, 0, 1, 1, 0, 0, '2015-09-25 12:42:58', 4, 4, '2015-09-25 12:42:58'),
(51, 4, '1443165222_IMG-20140927-WA000.jpg', '', 1, 0, 1, 1, 0, 0, '2015-09-25 12:43:42', 4, 4, '2015-09-25 12:43:42'),
(52, 4, '1443165248_IMG-20150502-WA013.jpg', '', 1, 0, 1, 1, 0, 0, '2015-09-25 12:44:08', 4, 4, '2015-09-25 12:44:08'),
(54, 4, '1443264523_IMG-20150502-WA012.jpg', '', 1, 0, 1, 1, 0, 0, '2015-09-26 16:18:43', 4, 4, '2015-09-26 16:18:43'),
(57, 23, '1443520628_images.jpg', '', 1, 0, 1, 0, 0, 0, '2015-09-29 15:27:08', 23, 23, '2015-09-29 15:27:08'),
(58, 22, '1443521077_25-random-awesome-wallpapers-13.jpg', '', 1, 0, 1, 0, 0, 0, '2015-09-29 15:34:37', 22, 22, '2015-09-29 15:34:37'),
(59, 21, '1443521934_IMG_20150711_133513.jpg', '', 1, 0, 1, 0, 0, 0, '2015-09-29 15:48:54', 21, 21, '2015-09-29 15:48:54'),
(62, 9, '1444742289_IMG-20150531-WA010.jpg', '', 1, 0, 1, 0, 0, 0, '2015-10-13 18:48:09', 9, 9, '2015-10-13 18:48:09'),
(63, 9, '1444742319_IMG-20150531-WA011.jpg', '', 1, 0, 1, 1, 0, 0, '2015-10-13 18:48:39', 9, 9, '2015-10-13 18:48:39'),
(64, 9, '1444742362_IMG-20150531-WA008.jpg', '', 1, 0, 1, 1, 0, 0, '2015-10-13 18:49:22', 9, 9, '2015-10-13 18:49:22'),
(65, 10, '1445334741_url5.jpg', '', 1, 0, 1, 0, 0, 0, '2015-10-20 15:22:21', 10, 10, '2015-10-20 15:22:21'),
(66, 10, '1445334769_cute-eiffel-tower-wallpaper-background-wallpapers-other-picture-cute-wallpaper.jpg', '', 1, 0, 1, 0, 0, 0, '2015-10-20 15:22:49', 10, 10, '2015-10-20 15:22:49'),
(67, 10, '1445334789_cute-eiffel-tower-wallpaper-background-wallpapers-other-picture-cute-wallpaper.jpg', '', 1, 0, 1, 0, 0, 0, '2015-10-20 15:23:09', 10, 10, '2015-10-20 15:23:09'),
(68, 10, '1445344242_new-wallpaper-2.jpeg', '', 1, 0, 1, 0, 0, 0, '2015-10-20 18:00:42', 10, 10, '2015-10-20 18:00:42'),
(69, 21, '1443521934_IMG_20150711_133513.jpg', '', 1, 0, 1, 1, 1, 0, '2015-10-30 16:50:55', 21, 21, '2015-10-30 16:51:08'),
(70, 10, '1443163573_1912197_847603851925056_1636885097142150644_n.jpg', '', 1, 0, 1, 1, 1, 0, '2015-10-30 16:51:51', 10, 10, '2015-10-30 16:51:57'),
(71, 22, '1443521364_ice_cream.jpg', '', 1, 0, 1, 1, 1, 0, '2015-10-30 16:50:55', 22, 22, '2015-10-30 16:51:08'),
(72, 23, '1443520628_images.jpg', '', 1, 0, 1, 1, 1, 0, '2015-10-30 16:51:51', 23, 23, '2015-10-30 16:51:57'),
(73, 9, '1446292362_1440081198_IMG_20150101_173403.jpg', '', 1, 0, 1, 1, 1, 0, '2015-10-31 17:22:42', 9, 9, '2015-10-31 17:22:42'),
(74, 5, '1446292489_1443521484_12033027_892071174164107_1445108986438483993_n.jpg', '', 1, 0, 1, 0, 1, 0, '2015-10-31 17:24:49', 5, 5, '2015-10-31 17:24:49'),
(94, 20, '1450674406_11046625_1564294640500643_2783801732771841737_nqsaw.jpg', '', 1, 0, 1, 0, 1, 0, '2015-12-21 10:36:46', 20, 20, '2015-12-21 10:36:46'),
(150, 34, '1455886891_Lighthouse.jpg', '', 1, 0, 1, 0, 0, 0, '2016-02-19 18:31:31', 34, 34, '2016-02-19 18:31:31'),
(77, 20, '1446542835_11071516_1566328036963970_4243752730811539511_n.jpg', '', 1, 0, 1, 0, 0, 0, '2015-11-03 14:57:15', 20, 20, '2015-11-03 14:57:15'),
(196, 36, '1464940016_Abhay_Yadav.jpg', '', 1, 0, 2, 0, 0, 0, '2016-06-03 13:16:56', 36, 36, '2016-06-03 13:16:56'),
(201, 72, '1465037417_Abhay_Yadav.jpg', '', 1, 0, 1, 0, 0, 0, '2016-06-04 16:20:26', 72, 72, '2016-06-04 16:20:26'),
(192, 36, '1464783846_dd.jpg', '', 1, 0, 1, 1, 0, 0, '2016-06-01 17:54:06', 36, 36, '2016-06-01 17:54:06'),
(83, 27, '1446776224_10353547_998801016814960_3854327152565928860_n.jpg', '', 1, 0, 1, 1, 0, 0, '2015-11-06 07:47:04', 27, 27, '2016-01-25 11:39:45'),
(84, 37, '1446804891_logo.png', '', 1, 0, 1, 0, 1, 0, '2015-11-06 15:44:51', 37, 37, '2015-11-06 15:44:51'),
(85, 36, '1447061208_d6.jpg', '', 1, 0, 1, 1, 0, 0, '2015-11-09 14:56:48', 36, 36, '2015-11-09 14:56:48'),
(86, 38, '1447070487_Md-Ishtiyaque-Ansari.jpg', '', 1, 0, 1, 0, 1, 0, '2015-11-09 17:31:27', 38, 38, '2015-11-09 17:31:27'),
(87, 27, '1447741666_DSC_0217.jpg', '', 1, 0, 1, 1, 1, 0, '2015-11-17 11:57:46', 27, 27, '2016-01-25 11:40:24'),
(88, 40, '1447836615_varun2.jpg', '', 1, 0, 1, 0, 1, 0, '2015-11-18 14:20:15', 40, 40, '2015-11-18 14:20:15'),
(97, 6, '1446414218_IMG_1875.jpg', '', 1, 0, 0, 0, 0, 0, '2015-12-30 16:07:47', 6, 6, '2016-03-21 02:14:29'),
(96, 27, '1451008793_DSC_3482-edited-me.jpg', '', 1, 0, 1, 0, 0, 0, '2015-12-25 07:29:53', 27, 27, '2016-01-25 11:40:00'),
(95, 27, '1451008765_DSC_3482-edited-me.jpg', '', 1, 0, 1, 0, 0, 0, '2015-12-25 07:29:25', 27, 27, '2015-12-25 07:29:25'),
(104, 51, '511452949122.jpg', '', 1, 0, 1, 0, 0, 1, '2016-01-16 18:28:42', 51, 51, '2016-01-16 18:28:42'),
(103, 51, '511452949107.jpg', '', 1, 0, 1, 0, 0, 1, '2016-01-16 18:28:27', 51, 51, '2016-01-16 18:28:27'),
(102, 51, '511452948712.jpg', '', 1, 0, 1, 0, 0, 1, '2016-01-16 18:21:52', 51, 51, '2016-01-16 18:21:52'),
(152, 34, '1455887644_Chrysanthemum.jpg', '', 1, 0, 1, 0, 0, 0, '2016-02-19 18:44:04', 34, 34, '2016-02-19 18:44:04'),
(114, 56, '1454597315_dreamstime_xs_2102649.jpg', '', 1, 0, 1, 0, 0, 0, '2016-02-04 20:18:35', 56, 56, '2016-02-04 20:18:35'),
(115, 56, '1454597361_dreamstime_xs_1701252.jpg', '', 1, 0, 1, 1, 0, 0, '2016-02-04 20:19:21', 56, 56, '2016-02-04 20:19:56'),
(131, 6, '1454907046_18325133-Happy-Group-Of-Young-Friends-Playing-Video-Games-At-Home--Stock-Photo.jpg', '', 1, 1, 2, 0, 0, 0, '2016-02-08 10:20:46', 6, 6, '2016-02-08 10:20:46'),
(122, 6, '1454669772_dreamstime_xs_32362483.jpg', '', 1, 0, 1, 0, 0, 0, '2016-02-05 16:26:12', 6, 6, '2016-03-18 03:30:51'),
(117, 6, '1454668614_dreamstime_xs_23953921.jpg', '', 1, 0, 1, 0, 0, 0, '2016-02-05 16:06:54', 6, 6, '2016-02-05 16:06:54'),
(118, 6, '1454668642_dreamstime_xs_31571556.jpg', '', 1, 0, 1, 0, 0, 0, '2016-02-05 16:07:22', 6, 6, '2016-02-29 02:42:30'),
(119, 6, '1454668698_dreamstime_xs_5725013_-_Copy.jpg', '', 1, 0, 1, 0, 0, 0, '2016-02-05 16:08:18', 6, 6, '2016-02-12 03:10:09'),
(120, 6, '1454669606_dreamstime_xs_7924598_-_Copy.jpg', '', 1, 0, 1, 0, 0, 0, '2016-02-05 16:23:26', 6, 6, '2016-02-05 16:23:26'),
(121, 6, '1454669667_dreamstime_xs_32361825.jpg', '', 1, 0, 1, 0, 1, 0, '2016-02-05 16:24:27', 6, 6, '2016-08-15 16:46:31'),
(123, 6, '1454669805_dreamstime_xs_7175495_-_Copy.jpg', '', 1, 0, 1, 1, 0, 0, '2016-02-05 16:26:45', 6, 6, '2016-02-05 16:26:45'),
(124, 6, '1454669829_dreamstime_xs_7175628_-_Copy.jpg', '', 1, 0, 1, 1, 0, 0, '2016-02-05 16:27:09', 6, 6, '2016-03-08 03:42:37'),
(125, 56, '1454670195_dreamstime_xs_6218858.jpg', '', 1, 0, 1, 0, 0, 0, '2016-02-05 16:33:15', 56, 56, '2016-02-05 16:33:15'),
(126, 56, '1454670216_dreamstime_xs_22215057.jpg', '', 1, 0, 1, 0, 0, 0, '2016-02-05 16:33:36', 56, 56, '2016-02-05 16:33:36'),
(127, 56, '1454670242_dreamstime_xs_22709724.jpg', '', 1, 0, 1, 0, 0, 0, '2016-02-05 16:34:02', 56, 56, '2016-02-05 16:34:02'),
(128, 56, '1454670268_dreamstime_xs_5498634.jpg', '', 1, 0, 1, 0, 0, 0, '2016-02-05 16:34:28', 56, 56, '2016-02-05 16:34:28'),
(129, 56, '1454670312_dreamstime_xs_31966650.jpg', '', 1, 0, 1, 0, 1, 0, '2016-02-05 16:35:12', 56, 56, '2016-02-05 16:43:01'),
(130, 56, '1454670770_dreamstime_xs_21059907.jpg', '', 1, 0, 1, 0, 0, 0, '2016-02-05 16:42:50', 56, 56, '2016-02-05 16:42:50'),
(151, 34, '1455887583_Chrysanthemum.jpg', '', 1, 0, 1, 0, 0, 0, '2016-02-19 18:43:03', 34, 34, '2016-02-19 18:43:03'),
(132, 6, '1454907059_12918491.jpg', '', 1, 0, 2, 0, 0, 0, '2016-02-08 10:20:59', 6, 6, '2016-02-08 10:20:59'),
(133, 6, '1454907073_group-friends-having-fun-beach-summer-holidays-vacation-happy-people-concept-34394694.jpg', 'My wonder years', 1, 0, 2, 0, 0, 0, '2016-02-08 10:21:13', 6, 6, '2016-02-08 10:21:13'),
(134, 6, '1454907185_14008257-group-of-friends-smiling-isolated-over-a-white-background.jpg', '', 1, 1, 0, 0, 0, 0, '2016-02-08 10:23:05', 6, 6, '2016-02-08 10:23:05'),
(135, 6, '1454907223_dreamstime_xs_19325012_-_Copy.jpg', '', 1, 1, 0, 0, 0, 0, '2016-02-08 10:23:43', 6, 6, '2016-02-08 10:23:43'),
(136, 50, '1454997208_Capture.png', '', 1, 0, 1, 0, 0, 0, '2016-02-09 11:23:28', 50, 50, '2016-02-09 11:23:28'),
(137, 50, '1455001186_dehk.JPG.jpg', '', 1, 0, 1, 0, 0, 0, '2016-02-09 12:29:46', 50, 50, '2016-02-09 12:29:46'),
(138, 50, '1455001223_dehk.JPG.jpg', '', 1, 0, 1, 0, 0, 0, '2016-02-09 12:30:23', 50, 50, '2016-02-09 12:30:23'),
(139, 38, '1455008408_11152685_1628479710723184_3985532193400611126_n.jpg', '', 1, 0, 1, 1, 0, 0, '2016-02-09 14:30:08', 38, 38, '2016-02-09 14:30:08'),
(140, 38, '1455008504_1380218_511575082286070_796541052_n.jpg', '', 1, 0, 1, 1, 0, 0, '2016-02-09 14:31:44', 38, 38, '2016-02-09 14:31:44'),
(148, 34, '1455886262_Lighthouse.jpg', '', 1, 0, 1, 0, 0, 0, '2016-02-19 18:21:02', 34, 34, '2016-02-19 18:21:02'),
(160, 4, '1456300476_IMG_20141120_114425.jpg', '', 1, 0, 1, 0, 0, 0, '2016-02-24 13:24:36', 4, 4, '2016-02-24 13:24:36'),
(153, 34, '1455887707_Chrysanthemum.jpg', '', 1, 0, 1, 0, 0, 0, '2016-02-19 18:45:07', 34, 34, '2016-02-19 18:45:07'),
(154, 34, '1455944481_Chrysanthemum.jpg', '', 1, 0, 1, 0, 0, 0, '2016-02-20 10:31:21', 34, 34, '2016-02-20 10:31:21'),
(156, 34, '1456125388_Penguins.jpg', '', 1, 0, 1, 1, 0, 0, '2016-02-22 12:46:28', 34, 34, '2016-02-22 12:46:28'),
(157, 34, '1456125422_Penguins.jpg', '', 1, 0, 2, 0, 0, 0, '2016-02-22 12:47:02', 34, 34, '2016-02-22 12:47:02'),
(158, 34, '1456125442_Tulips.jpg', '', 1, 1, 0, 0, 0, 0, '2016-02-22 12:47:22', 34, 34, '2016-02-22 12:47:22'),
(159, 34, '1456125484_11046625_1564294640500643_2783801732771841737_nqsaw.jpg', '', 1, 0, 1, 1, 1, 0, '2016-02-22 12:48:04', 34, 34, '2016-02-22 12:48:04'),
(161, 4, '1456300527_IMG_20141120_114432.jpg', '', 1, 0, 1, 0, 0, 0, '2016-02-24 13:25:27', 4, 4, '2016-02-24 13:25:27'),
(162, 1, '1457689418_Chrysanthemum.jpg', '', 1, 0, 1, 0, 0, 0, '2016-03-11 15:13:38', 1, 1, '2016-03-11 15:13:52'),
(253, 36, '1470653567_DSC_4281.jpg', 'Dharm', 1, 0, 1, 1, 0, 0, '2016-08-08 16:22:47', 36, 36, '2016-09-05 15:45:03'),
(170, 1, '1459776537_images_(2).jpg', '', 1, 0, 1, 0, 0, 0, '2016-04-04 18:58:57', 1, 1, '2016-04-04 18:58:57'),
(164, 65, '1457701829_Penguins.jpg', '', 1, 0, 1, 0, 1, 0, '2016-03-11 18:40:29', 65, 65, '2016-03-11 18:40:29'),
(171, 68, '1460800524_dreamstime_xs_2316986.jpg', '', 1, 0, 1, 0, 1, 0, '2016-04-16 15:25:24', 68, 68, '2016-04-16 15:25:24'),
(174, 8, '1460980570_download_(1).jpg', '', 1, 0, 1, 0, 1, 0, '2016-04-18 17:26:16', 8, 8, '2016-04-18 17:26:16'),
(175, 20, '1461408615_12991071_718993201572665_9201191173633412655_n.jpg', '', 1, 0, 1, 0, 0, 0, '2016-04-23 16:20:15', 20, 20, '2016-04-23 16:20:15'),
(176, 1, '1461575536_Up_ellie_and_carl.png', '', 1, 0, 2, 0, 0, 0, '2016-04-25 14:42:16', 1, 1, '2016-04-25 14:42:16'),
(177, 1, '1461583037_Up-Picnic-Still.jpg', '', 1, 1, 0, 0, 0, 0, '2016-04-25 16:47:17', 1, 1, '2016-04-25 16:47:17'),
(178, 20, '1461583246_13010692_718993301572655_2722025084508185903_n.jpg', '', 1, 0, 2, 0, 0, 0, '2016-04-25 16:50:46', 20, 20, '2016-04-25 16:50:46'),
(179, 20, '1461583366_13001189_718993234905995_6450798575379786701_n.jpg', '', 1, 1, 0, 0, 0, 0, '2016-04-25 16:52:46', 20, 20, '2016-04-25 16:52:46'),
(182, 1, '1461585110_11888029_945858045481772_6991150048386253663_n.jpg', '', 1, 0, 1, 0, 0, 0, '2016-04-25 17:21:50', 1, 1, '2016-05-12 10:27:59'),
(183, 1, '1461585199_12963639_718992981572687_4866437895950373470_n.jpg', '', 1, 0, 1, 0, 0, 0, '2016-04-25 17:23:19', 1, 1, '2016-04-25 17:23:19'),
(184, 1, '1461589935_Chrysanthemum.jpg', '', 1, 0, 1, 0, 0, 0, '2016-04-25 18:42:15', 1, 1, '2016-04-25 18:42:15'),
(185, 1, '1461590132_Chrysanthemum.jpg', '', 3, 0, 1, 1, 0, 0, '2016-04-25 18:45:32', 1, 1, '2016-04-25 18:45:32'),
(195, 69, '1464935224_collaboration-B2B.jpg', '', 1, 0, 1, 0, 1, 0, '2016-06-03 11:57:04', 69, 69, '2016-06-03 11:57:04'),
(187, 1, '1463028234_math-teacher.png', '', 1, 0, 1, 1, 0, 0, '2016-05-12 10:13:54', 1, 1, '2016-05-12 10:15:10'),
(194, 36, '1464934630_abhay.jpg', '', 1, 1, 0, 0, 0, 0, '2016-06-03 11:47:10', 36, 36, '2016-06-03 11:47:10'),
(202, 72, '1465037417_Abhay_Yadav.jpg', '', 1, 0, 1, 0, 1, 0, '2016-06-04 16:28:09', 72, 72, '2016-06-04 16:28:09'),
(200, 2, '1464946379_under.jpg', '', 1, 0, 1, 0, 1, 0, '2016-06-03 15:03:05', 2, 2, '2016-06-03 15:03:05'),
(203, 72, '1465040119_gulshan.jpg', '', 1, 0, 1, 0, 0, 0, '2016-06-04 17:05:19', 72, 72, '2016-06-04 17:05:19'),
(204, 73, '1465040760_dd_-_Copy.jpg', '', 1, 0, 1, 0, 1, 0, '2016-06-04 17:16:18', 73, 73, '2016-06-04 17:16:18'),
(205, 73, '1465041645_anubhav.jpg', '', 1, 0, 1, 0, 0, 0, '2016-06-04 17:30:45', 73, 73, '2016-06-04 17:30:45'),
(206, 73, '1465041717_aerobics.jpg', '', 1, 0, 1, 1, 0, 0, '2016-06-04 17:31:57', 73, 73, '2016-06-04 17:31:57'),
(207, 73, '1465041770_amrood.jpg', '', 1, 0, 1, 1, 0, 0, '2016-06-04 17:32:50', 73, 73, '2016-06-04 17:32:50'),
(208, 73, '1465041821_ashish.jpg', '', 1, 0, 1, 1, 0, 0, '2016-06-04 17:33:41', 73, 73, '2016-06-04 17:33:41'),
(209, 36, '1465042540_amrood.jpg', '', 1, 0, 1, 1, 1, 0, '2016-06-04 17:45:40', 36, 36, '2016-09-05 15:45:54'),
(210, 74, '1465042801_ratnesh.jpg', '', 1, 0, 1, 0, 1, 0, '2016-06-04 17:50:01', 74, 74, '2016-06-04 17:50:01'),
(211, 74, '1465042888_shail.jpg', '', 1, 0, 1, 0, 0, 0, '2016-06-04 17:51:28', 74, 74, '2016-06-04 17:51:28'),
(212, 74, '1465042915_anubhav.jpg', '', 1, 0, 1, 0, 0, 0, '2016-06-04 17:51:55', 74, 74, '2016-06-04 17:51:55'),
(213, 75, '', '', 1, 0, 1, 0, 0, 0, '2016-06-04 17:57:23', 75, 75, '2016-06-04 17:57:23'),
(214, 75, '1465043287_amrood.jpg', '', 1, 0, 1, 0, 1, 0, '2016-06-04 17:58:07', 75, 75, '2016-06-04 17:58:07'),
(215, 75, '1465043403_anubhav.jpg', '', 1, 0, 1, 0, 0, 0, '2016-06-04 18:00:03', 75, 75, '2016-06-04 18:00:03'),
(216, 76, '1465043920_female.png', '', 1, 0, 1, 0, 1, 0, '2016-06-04 18:08:40', 76, 76, '2016-06-04 18:08:40'),
(217, 76, '1465043999_anubhav.jpg', '', 1, 0, 1, 0, 0, 0, '2016-06-04 18:09:59', 76, 76, '2016-06-04 18:09:59'),
(218, 76, '1465044033_gulshan.jpg', '', 1, 0, 1, 0, 0, 0, '2016-06-04 18:10:33', 76, 76, '2016-06-04 18:10:33'),
(219, 77, '', '', 1, 0, 1, 0, 0, 0, '2016-06-04 18:13:16', 77, 77, '2016-06-04 18:13:16'),
(220, 77, '1465044233_female.png', '', 1, 0, 1, 0, 1, 0, '2016-06-04 18:13:53', 77, 77, '2016-06-04 18:13:53'),
(221, 78, '', '', 1, 0, 1, 0, 0, 0, '2016-06-04 18:15:58', 78, 78, '2016-06-04 18:15:58'),
(222, 78, '', '', 1, 0, 1, 0, 0, 0, '2016-06-04 18:16:32', 78, 78, '2016-06-04 18:16:32'),
(223, 78, '1465044471_pradeep.jpg', '', 1, 0, 1, 0, 1, 0, '2016-06-04 18:17:51', 78, 78, '2016-06-04 18:17:51'),
(224, 79, '1465197504_abhay.jpg', '', 1, 0, 1, 0, 1, 0, '2016-06-06 12:48:39', 79, 79, '2016-06-06 12:48:39'),
(225, 79, '1465197781_as2.jpg', '', 1, 0, 1, 0, 0, 0, '2016-06-06 12:53:01', 79, 79, '2016-06-06 12:53:01'),
(226, 79, '1465198071_female.png', '', 1, 0, 1, 0, 0, 0, '2016-06-06 12:57:51', 79, 79, '2016-06-06 12:57:51'),
(227, 79, '1465198096_football2735.jpg', '', 1, 0, 1, 0, 0, 0, '2016-06-06 12:58:16', 79, 79, '2016-06-06 12:58:16'),
(228, 80, '1465198259_football2735.jpg', '', 1, 0, 1, 0, 1, 0, '2016-06-06 13:01:10', 80, 80, '2016-06-06 13:01:10'),
(229, 81, '1465199492_female.png', '', 1, 0, 1, 0, 1, 0, '2016-06-06 13:21:41', 81, 81, '2016-06-06 13:21:41'),
(230, 82, '1465199613_suv1.jpg', '', 1, 0, 1, 0, 1, 0, '2016-06-06 13:23:46', 82, 82, '2016-06-06 13:23:46'),
(231, 85, '', '', 1, 0, 1, 0, 1, 0, '2016-07-02 12:11:21', 85, 85, '2016-07-02 12:11:21'),
(232, 86, '1467701030_ABHAY_YADAV.jpg', '', 1, 0, 1, 0, 1, 0, '2016-07-05 12:13:50', 86, 86, '2016-07-05 12:14:04'),
(233, 86, '1467701230_14fd3fb.jpg', '', 1, 0, 1, 0, 0, 0, '2016-07-05 12:17:10', 86, 86, '2016-07-05 12:17:10'),
(234, 86, '1467701916_IMG_20160327_163557.jpg', '', 1, 0, 2, 0, 0, 0, '2016-07-05 12:28:36', 86, 86, '2016-07-05 12:28:36'),
(236, 86, '1467704981_IMG_20151022_130338.jpg', '', 1, 0, 2, 0, 0, 0, '2016-07-05 13:19:41', 86, 86, '2016-07-05 13:19:41'),
(237, 86, '1467705132_IMG_20151022_130346.jpg', '', 1, 0, 2, 0, 0, 0, '2016-07-05 13:22:12', 86, 86, '2016-07-05 13:22:12'),
(241, 88, '1468409815_dharm.jpg', '', 1, 0, 1, 0, 0, 0, '2016-07-13 17:06:55', 88, 88, '2016-07-13 17:06:55'),
(239, 87, '1468401101_dharm.jpg', '', 1, 0, 1, 0, 1, 0, '2016-07-13 15:01:58', 87, 87, '2016-07-13 15:01:58'),
(242, 89, '1468409936_abhay.jpg', '', 1, 0, 1, 0, 1, 0, '2016-07-13 17:09:10', 89, 89, '2016-07-13 17:09:10'),
(243, 90, '1468488068_dharm.jpg', '', 1, 0, 1, 0, 1, 0, '2016-07-14 14:51:16', 90, 90, '2016-07-14 14:51:16'),
(244, 91, '1468489344_ratnesh.jpg', '', 1, 0, 1, 0, 1, 0, '2016-07-14 15:12:32', 91, 91, '2016-07-14 15:12:32'),
(245, 92, '1469167521_brush_twice_in_a_day.jpg', '', 1, 0, 1, 0, 0, 0, '2016-07-22 11:35:34', 92, 92, '2016-07-22 11:35:34'),
(246, 92, '1469168256_13001189_718993234905995_6450798575379786701_n.jpg', '', 1, 0, 2, 0, 0, 0, '2016-07-22 11:47:36', 92, 92, '2016-07-22 11:47:36'),
(247, 92, '1469168550_13177770_440806836116252_269850917191901111_n.png', '', 1, 0, 1, 0, 1, 0, '2016-07-22 11:52:30', 92, 92, '2016-07-22 11:53:11'),
(259, 94, '1470819393_plant3.jpg', '', 1, 1, 0, 0, 0, 0, '2016-08-10 14:26:33', 94, 94, '2016-08-10 14:26:33'),
(249, 94, '1469784522_dd.jpg', '', 1, 0, 1, 1, 0, 0, '2016-07-29 14:59:04', 94, 94, '2016-07-29 14:59:04'),
(250, 96, '1470604007_dreamstime_xs_4624434.jpg', '', 1, 0, 1, 0, 0, 0, '2016-08-08 02:36:47', 96, 96, '2016-08-08 02:36:47'),
(251, 96, '1470604016_dreamstime_xs_3218896.jpg', '', 1, 0, 1, 0, 1, 0, '2016-08-08 02:36:56', 96, 96, '2016-08-08 03:02:42'),
(252, 97, '1470606073_dreamstime_xs_6710426.jpg', '', 1, 0, 1, 0, 1, 0, '2016-08-08 03:11:24', 97, 97, '2016-08-08 03:11:24'),
(258, 94, '1470819371_footbal10101.jpg', '', 1, 0, 2, 0, 0, 0, '2016-08-10 14:26:11', 94, 94, '2016-08-10 14:26:11'),
(257, 94, '1470819303_plant1.jpg', '', 1, 0, 1, 1, 0, 0, '2016-08-10 14:25:03', 94, 94, '2016-08-10 14:25:03'),
(260, 94, '1470819632_titan1a.jpg', '', 1, 0, 1, 1, 1, 0, '2016-08-10 14:30:32', 94, 94, '2016-08-23 18:00:06'),
(261, 70, '1471272811_dreamstime_xs_37874624.jpg', '', 1, 0, 1, 0, 1, 0, '2016-08-15 20:23:31', 70, 70, '2016-08-15 20:23:39'),
(262, 43, '1471274485_dreamstime_xs_21180961_-_Copy.jpg', 'Me looking Hench', 1, 0, 1, 0, 1, 0, '2016-08-15 20:51:25', 43, 43, '2016-08-15 20:51:25'),
(267, 100, '1471445474_dreamstime_xs_18399392.jpg', '', 1, 0, 1, 0, 1, 0, '2016-08-17 20:21:19', 100, 100, '2016-08-17 20:21:19'),
(266, 99, '1471445325_dreamstime_xs_6794951.jpg', '', 1, 0, 1, 0, 1, 0, '2016-08-17 20:18:44', 99, 99, '2016-08-17 20:18:44'),
(268, 6, '1473502242_dreamstime_xs_8467358_-_Copy.jpg', '', 1, 0, 1, 1, 0, 0, '2016-09-10 15:40:42', 6, 6, '2016-09-10 15:40:42'),
(269, 36, '1474450893_anubhav.jpg', '', 1, 0, 1, 0, 0, 0, '2016-09-21 15:11:33', 36, 36, '2016-09-21 15:11:33'),
(280, 103, '1475307396_index.jpg', '', 0, 0, 1, 0, 0, 0, '2016-10-01 13:06:36', 103, 103, '2016-10-01 13:06:36'),
(285, 103, '1475738578_rtrter.jpg', '', 0, 0, 2, 0, 0, 0, '2016-10-06 12:52:58', 103, 103, '2016-10-06 12:52:58'),
(273, 103, '1475302484_passport_size_copy.jpg', '', 0, 0, 1, 0, 0, 0, '2016-10-01 11:44:44', 103, 103, '2016-10-01 11:44:44'),
(274, 103, '1475302771_dfghfgh.jpg', '', 1, 0, 1, 0, 1, 0, '2016-10-01 11:49:31', 103, 103, '2016-10-01 13:03:43'),
(286, 1, '11476096189.jpg', '', 1, 0, 1, 0, 0, 1, '2016-10-10 16:13:09', 1, 1, '2016-10-10 16:13:09'),
(283, 103, '1475311313_sgdgfd.jpg', '', 0, 0, 2, 0, 0, 0, '2016-10-01 14:11:53', 103, 103, '2016-10-01 14:11:53'),
(287, 1, '1476096948_download_(1).jpg', '', 1, 0, 1, 0, 1, 0, '2016-10-10 16:25:57', 1, 1, '2016-10-10 16:25:57'),
(288, 103, '1476430772_passport_size_copy.jpg', '', 0, 0, 1, 0, 0, 0, '2016-10-14 13:09:32', 103, 103, '2016-10-14 13:09:32'),
(289, 109, '1091476700563.jpg', '', 1, 0, 1, 0, 1, 1, '2016-10-17 16:06:03', 109, 109, '2016-10-24 13:05:09'),
(290, 109, '1091476700577.jpg', '', 1, 0, 1, 0, 0, 1, '2016-10-17 16:06:17', 109, 109, '2016-10-17 16:06:17'),
(291, 109, '1091476700591.jpg', '', 1, 0, 1, 0, 0, 1, '2016-10-17 16:06:31', 109, 109, '2016-10-17 16:06:31'),
(292, 109, '1091476700730.jpg', '', 1, 0, 1, 0, 0, 1, '2016-10-17 16:08:50', 109, 109, '2016-10-17 16:08:50'),
(293, 109, '1091476700740.jpg', '', 1, 0, 1, 0, 0, 1, '2016-10-17 16:09:00', 109, 109, '2016-10-17 16:09:00'),
(294, 109, '1091476700749.jpg', '', 1, 0, 1, 0, 0, 1, '2016-10-17 16:09:09', 109, 109, '2016-10-17 16:09:09'),
(295, 109, '1091476700759.jpg', '', 1, 0, 1, 1, 0, 1, '2016-10-17 16:09:19', 109, 109, '2016-10-17 16:09:19'),
(296, 110, '1476861765_passport_size_copy.jpg', '', 0, 0, 1, 0, 1, 0, '2016-10-19 12:52:45', 110, 110, '2016-10-19 12:52:45'),
(297, 111, '1476944333_download_(1).jpg', '', 1, 0, 1, 0, 1, 0, '2016-10-20 11:48:59', 111, 111, '2016-10-20 11:48:59'),
(298, 112, '1476944832_passport_size_copy.jpg', '', 0, 0, 1, 0, 1, 0, '2016-10-20 11:57:12', 112, 112, '2016-10-20 11:57:12'),
(303, 107, '1477474348_1476633_1115252328493645_8797261528517450222_n.jpg', '', 0, 0, 1, 0, 0, 0, '2016-10-26 15:02:28', 107, 107, '2016-10-26 15:02:28'),
(302, 113, '1477473349_Koala.jpg', '', 0, 0, 1, 0, 1, 0, '2016-10-26 14:45:49', 113, 113, '2016-10-26 14:45:49'),
(301, 107, '1477302648_13015156_1186266661392211_2138553562166932681_n.jpg', '', 0, 0, 1, 0, 1, 0, '2016-10-24 15:20:48', 107, 107, '2016-10-24 15:52:52'),
(304, 107, '1477474538_1533771_712697332082482_468031992_n.jpg', '', 0, 0, 1, 0, 0, 0, '2016-10-26 15:05:38', 107, 107, '2016-10-26 15:05:38'),
(305, 107, '1477477761_3695_503556839663200_1434436795_n.jpg', '', 0, 0, 1, 0, 0, 0, '2016-10-26 15:59:21', 107, 107, '2016-10-26 15:59:21');

-- --------------------------------------------------------

--
-- Table structure for table `sr_user_report`
--

CREATE TABLE IF NOT EXISTS `sr_user_report` (
  `user_report_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `reported_by` int(11) NOT NULL,
  `reported_on` datetime NOT NULL,
  `status` int(11) NOT NULL,
  `is_read` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0:no,1:yes',
  `admin_action` tinyint(4) NOT NULL COMMENT '0:none,1:suspend,2:dismiss',
  `admin_id` int(11) NOT NULL,
  `action_date` datetime NOT NULL,
  PRIMARY KEY (`user_report_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `sr_user_report`
--

INSERT INTO `sr_user_report` (`user_report_id`, `user_id`, `reason`, `description`, `reported_by`, `reported_on`, `status`, `is_read`, `admin_action`, `admin_id`, `action_date`) VALUES
(1, 20, 'Personal abuse', 'per', 1, '2016-01-02 12:26:12', 1, 1, 0, 0, '0000-00-00 00:00:00'),
(2, 56, 'Inappropriate photo', '', 6, '2016-04-07 16:37:42', 1, 1, 0, 0, '0000-00-00 00:00:00'),
(3, 100, 'Personal abuse', '', 99, '2016-08-17 21:48:30', 1, 1, 2, 1, '2016-11-01 13:01:58'),
(4, 100, 'Inappropriate photo', '', 99, '2016-08-17 22:49:34', 1, 1, 2, 1, '2016-11-08 11:39:14'),
(5, 99, 'Inappropriate photo', '', 6, '2016-08-18 02:49:12', 1, 1, 2, 1, '2016-11-08 11:40:13'),
(6, 6, 'Inappropriate photo', '', 99, '2016-08-18 15:48:33', 1, 0, 0, 0, '0000-00-00 00:00:00'),
(7, 94, 'Personal abuse', '', 6, '2016-08-31 01:36:32', 1, 1, 2, 1, '2016-11-08 11:59:03'),
(8, 94, 'Inappropriate photo', '', 6, '2016-08-31 01:36:44', 1, 0, 0, 0, '0000-00-00 00:00:00'),
(9, 1, 'Personal abuse', '', 6, '2016-10-10 14:54:32', 1, 1, 1, 1, '2016-11-08 11:40:35'),
(10, 6, 'Personal abuse', 'etc etc', 113, '2016-10-26 14:49:16', 1, 0, 0, 0, '0000-00-00 00:00:00'),
(11, 6, 'Inappropriate photo', '', 113, '2016-10-26 14:49:38', 1, 0, 0, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `sr_user_reputation`
--

CREATE TABLE IF NOT EXISTS `sr_user_reputation` (
  `reputation_id` int(11) NOT NULL AUTO_INCREMENT,
  `reputation` int(11) NOT NULL,
  `reputation_type` int(11) NOT NULL COMMENT '1:Personal info,2:About me,3:Looking for,4:Photo reel,5:People search ,6:Kismat connection,7:Profile visitor,8:Like me,9:Favorite me',
  `status` int(2) NOT NULL DEFAULT '1' COMMENT '1:active , 0:inactive',
  `user_id` int(11) NOT NULL,
  `datetime` datetime NOT NULL,
  PRIMARY KEY (`reputation_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=703 ;

--
-- Dumping data for table `sr_user_reputation`
--

INSERT INTO `sr_user_reputation` (`reputation_id`, `reputation`, `reputation_type`, `status`, `user_id`, `datetime`) VALUES
(4, 10, 2, 1, 4, '2015-08-27 14:07:37'),
(5, 5, 3, 1, 4, '2015-09-04 11:45:20'),
(7, 1, 7, 0, 6, '2015-09-21 00:57:33'),
(8, 10, 9, 0, 8, '2015-09-21 11:24:10'),
(9, 1, 7, 0, 1, '2015-09-21 17:22:53'),
(10, 10, 9, 0, 5, '2015-09-24 13:40:53'),
(11, 1, 7, 0, 4, '2015-09-24 13:42:58'),
(12, 1, 7, 0, 4, '2015-09-24 13:45:03'),
(13, 1, 7, 0, 5, '2015-09-24 16:14:10'),
(14, 1, 7, 0, 5, '2015-09-24 16:17:05'),
(15, 10, 9, 0, 4, '2015-09-24 16:18:01'),
(16, 10, 9, 0, 1, '2015-09-24 16:18:14'),
(17, 1, 7, 0, 8, '2015-09-24 16:25:09'),
(18, 1, 7, 0, 4, '2015-09-24 16:29:24'),
(19, 10, 9, 0, 8, '2015-09-24 16:29:27'),
(20, 1, 7, 0, 4, '2015-09-25 10:47:08'),
(21, 1, 7, 0, 8, '2015-09-25 11:40:53'),
(22, 1, 7, 0, 10, '2015-09-25 12:16:30'),
(23, 1, 7, 0, 10, '2015-09-25 12:19:05'),
(24, 10, 9, 0, 1, '2015-09-25 12:19:46'),
(25, 1, 7, 0, 8, '2015-09-25 12:22:36'),
(26, 1, 7, 0, 5, '2015-09-25 12:25:20'),
(27, 1, 7, 0, 13, '2015-09-25 12:42:26'),
(28, 1, 7, 0, 8, '2015-09-25 12:44:32'),
(29, 1, 7, 0, 4, '2015-09-25 13:04:32'),
(30, 10, 9, 0, 12, '2015-09-25 13:58:18'),
(31, 1, 7, 0, 1, '2015-09-25 14:06:18'),
(32, 1, 7, 0, 0, '2015-09-26 11:22:21'),
(33, 1, 7, 0, 12, '2015-09-26 12:12:54'),
(34, 1, 7, 0, 12, '2015-09-26 12:13:03'),
(35, 1, 7, 0, 0, '2015-09-26 12:17:30'),
(36, 10, 9, 0, 4, '2015-09-26 12:44:55'),
(37, 10, 9, 0, 10, '2015-09-26 13:18:48'),
(38, 10, 9, 0, 6, '2015-09-28 14:14:34'),
(39, 10, 9, 0, 12, '2015-09-28 14:34:58'),
(40, 1, 7, 0, 19, '2015-09-28 15:27:44'),
(41, 1, 7, 0, 5, '2015-09-29 15:20:39'),
(42, 1, 7, 0, 22, '2015-09-29 15:22:01'),
(43, 1, 7, 0, 22, '2015-09-29 15:24:49'),
(44, 1, 7, 0, 21, '2015-09-29 15:25:54'),
(45, 1, 7, 0, 23, '2015-09-29 15:27:30'),
(46, 1, 7, 0, 24, '2015-09-29 15:29:27'),
(47, 1, 7, 0, 22, '2015-09-29 15:35:39'),
(48, 1, 7, 0, 21, '2015-09-29 15:53:26'),
(49, 10, 9, 0, 1, '2015-09-29 15:56:51'),
(50, 1, 7, 0, 20, '2015-09-29 16:46:43'),
(51, 1, 7, 0, 4, '2015-10-05 15:05:12'),
(52, 1, 7, 0, 4, '2015-10-05 15:06:02'),
(53, 1, 7, 0, 4, '2015-10-05 15:14:47'),
(54, 1, 7, 0, 4, '2015-10-05 15:18:41'),
(55, 1, 7, 0, 20, '2015-10-05 15:37:11'),
(56, 1, 7, 0, 20, '2015-10-05 15:59:27'),
(58, 1, 7, 0, 20, '2015-10-05 17:01:31'),
(59, 10, 9, 0, 20, '2015-10-05 17:07:57'),
(60, 10, 9, 0, 20, '2015-10-05 17:08:31'),
(61, 10, 2, 1, 20, '2015-10-05 17:09:26'),
(62, 5, 3, 1, 20, '2015-10-05 17:11:56'),
(63, 5, 1, 1, 20, '2015-10-05 17:13:23'),
(64, 1, 7, 0, 20, '2015-10-05 17:14:45'),
(65, 10, 9, 0, 20, '2015-10-05 17:14:49'),
(66, 10, 9, 0, 20, '2015-10-05 17:14:55'),
(67, 1, 7, 0, 5, '2015-10-05 18:31:27'),
(68, 1, 7, 0, 23, '2015-10-05 18:51:44'),
(69, 1, 7, 0, 20, '2015-10-06 12:53:55'),
(70, 1, 7, 0, 1, '2015-10-06 18:45:21'),
(71, 1, 7, 0, 22, '2015-10-06 18:46:37'),
(72, 1, 7, 0, 14, '2015-10-07 15:26:36'),
(73, 1, 7, 0, 27, '2015-10-07 16:32:16'),
(74, 10, 9, 0, 27, '2015-10-07 16:34:08'),
(75, 1, 7, 0, 24, '2015-10-07 17:38:20'),
(76, 10, 9, 0, 8, '2015-10-08 14:12:57'),
(77, 10, 9, 0, 20, '2015-10-09 19:30:00'),
(78, 1, 7, 0, 4, '2015-10-13 18:44:48'),
(79, 5, 3, 1, 9, '2015-10-13 18:46:39'),
(80, 1, 7, 0, 29, '2015-10-14 10:33:49'),
(81, 1, 7, 0, 4, '2015-10-14 16:47:43'),
(82, 1, 7, 0, 10, '2015-10-15 17:04:25'),
(83, 1, 7, 0, 21, '2015-10-15 17:15:38'),
(84, 10, 9, 0, 1, '2015-10-16 17:03:43'),
(85, 1, 7, 0, 10, '2015-10-19 15:38:54'),
(86, 1, 7, 0, 20, '2015-10-19 15:41:18'),
(87, 5, 1, 1, 1, '2015-10-20 13:15:44'),
(88, 5, 1, 1, 4, '2015-10-20 13:18:42'),
(89, 5, 1, 1, 5, '2015-10-20 13:22:03'),
(90, 5, 1, 1, 10, '2015-10-20 15:36:25'),
(91, 1, 7, 0, 0, '2015-10-20 15:38:07'),
(92, 1, 7, 0, 20, '2015-10-20 16:00:02'),
(93, 1, 7, 0, 29, '2015-10-20 16:00:30'),
(94, 1, 7, 0, 6, '2015-10-21 10:22:52'),
(95, 1, 7, 0, 10, '2015-10-21 11:26:35'),
(96, 1, 7, 0, 1, '2015-10-21 11:28:26'),
(97, 10, 9, 0, 1, '2015-10-21 16:43:12'),
(98, 10, 9, 0, 9, '2015-10-23 14:36:30'),
(99, 10, 9, 0, 9, '2015-10-23 14:39:10'),
(100, 10, 9, 0, 9, '2015-10-23 14:45:35'),
(101, 10, 9, 0, 9, '2015-10-23 18:48:24'),
(102, 10, 9, 0, 8, '2015-10-23 18:49:27'),
(103, 10, 9, 0, 5, '2015-10-23 18:49:37'),
(104, 10, 9, 0, 22, '2015-10-23 18:49:48'),
(105, 10, 9, 0, 1, '2015-10-23 18:51:22'),
(106, 10, 9, 0, 1, '2015-10-23 19:00:57'),
(107, 10, 9, 0, 1, '2015-10-23 19:02:23'),
(108, 1, 7, 0, 6, '2015-10-28 03:49:54'),
(109, 10, 9, 0, 12, '2015-10-28 10:55:11'),
(110, 10, 9, 0, 4, '2015-10-28 11:50:00'),
(111, 10, 9, 0, 9, '2015-10-28 17:12:37'),
(112, 10, 9, 0, 29, '2015-10-28 17:15:45'),
(113, 1, 7, 0, 28, '2015-10-28 18:06:20'),
(114, 1, 7, 0, 31, '2015-10-28 18:18:48'),
(115, 1, 7, 0, 8, '2015-10-29 12:06:24'),
(116, 1, 7, 0, 3, '2015-10-29 12:15:08'),
(117, 1, 7, 0, 23, '2015-10-29 12:40:52'),
(118, 1, 7, 0, 29, '2015-10-30 17:52:10'),
(119, 5, 1, 1, 6, '2015-11-02 03:06:43'),
(120, 1, 7, 0, 20, '2015-11-02 03:15:11'),
(121, 10, 9, 0, 20, '2015-11-02 03:15:27'),
(122, 1, 7, 0, 12, '2015-11-02 18:01:21'),
(123, 1, 7, 0, 33, '2015-11-03 13:34:11'),
(124, 10, 9, 0, 6, '2015-11-03 14:12:14'),
(125, 1, 7, 0, 22, '2015-11-03 14:33:07'),
(126, 1, 7, 0, 1, '2015-11-03 16:49:04'),
(127, 1, 7, 0, 4, '2015-11-03 17:03:49'),
(128, 5, 1, 1, 36, '2015-11-03 18:01:23'),
(129, 1, 7, 0, 36, '2015-11-04 11:56:12'),
(130, 1, 7, 0, 5, '2015-11-06 07:46:46'),
(132, 1, 7, 0, 33, '2015-11-14 18:21:09'),
(133, 1, 7, 0, 29, '2015-11-17 03:49:52'),
(134, 1, 7, 0, 23, '2015-11-17 11:53:53'),
(135, 1, 7, 0, 27, '2015-11-26 19:53:39'),
(136, 1, 7, 0, 23, '2015-11-29 20:15:06'),
(137, 10, 9, 0, 23, '2015-11-29 20:15:22'),
(138, 1, 7, 0, 22, '2015-11-29 20:15:39'),
(139, 10, 9, 0, 22, '2015-11-29 20:15:57'),
(140, 10, 9, 0, 27, '2015-11-29 20:51:30'),
(141, 1, 7, 0, 12, '2015-12-01 19:20:56'),
(142, 1, 7, 0, 10, '2015-12-02 12:10:57'),
(143, 1, 7, 0, 6, '2015-12-06 14:45:37'),
(144, 10, 9, 0, 1, '2015-12-15 10:25:20'),
(145, 1, 7, 0, 21, '2015-12-15 12:09:25'),
(146, 10, 9, 0, 14, '2015-12-16 12:12:22'),
(147, 1, 7, 0, 22, '2015-12-16 22:56:13'),
(148, 1, 7, 0, 20, '2015-12-17 15:54:09'),
(149, 10, 9, 0, 1, '2015-12-17 16:54:31'),
(150, 10, 9, 0, 38, '2015-12-17 18:19:21'),
(151, 10, 9, 0, 4, '2015-12-17 18:20:00'),
(152, 10, 9, 0, 5, '2015-12-17 18:52:04'),
(153, 10, 9, 0, 20, '2015-12-17 18:53:02'),
(154, 10, 9, 0, 5, '2015-12-17 18:56:09'),
(155, 10, 9, 0, 38, '2015-12-17 18:57:04'),
(156, 10, 9, 0, 20, '2015-12-17 18:58:17'),
(157, 10, 9, 0, 4, '2015-12-17 19:00:05'),
(158, 10, 9, 0, 21, '2015-12-17 19:00:56'),
(159, 10, 9, 0, 10, '2015-12-17 19:09:38'),
(160, 10, 9, 0, 20, '2015-12-17 19:16:01'),
(161, 1, 7, 0, 22, '2015-12-18 12:19:04'),
(162, 1, 7, 0, 5, '2015-12-18 17:44:06'),
(163, 1, 7, 0, 24, '2015-12-22 16:18:15'),
(164, 1, 7, 0, 36, '2015-12-22 16:46:45'),
(165, 1, 7, 0, 27, '2015-12-23 02:46:54'),
(166, 1, 7, 0, 34, '2015-12-23 03:00:15'),
(167, 1, 7, 0, 36, '2015-12-23 14:59:40'),
(168, 1, 7, 0, 38, '2015-12-23 20:47:36'),
(169, 1, 7, 0, 0, '2015-12-25 19:24:48'),
(170, 1, 7, 0, 38, '2015-12-26 10:24:19'),
(171, 1, 7, 0, 27, '2015-12-26 10:24:46'),
(172, 1, 7, 0, 34, '2015-12-26 10:24:50'),
(173, 10, 9, 0, 5, '2015-12-26 10:25:01'),
(174, 10, 9, 0, 9, '2015-12-26 10:25:07'),
(175, 1, 7, 0, 23, '2015-12-26 10:25:13'),
(176, 10, 9, 0, 27, '2015-12-26 10:25:22'),
(177, 10, 9, 0, 1, '2015-12-27 21:51:02'),
(178, 1, 7, 0, 38, '2015-12-30 13:58:15'),
(179, 1, 7, 0, 20, '2015-12-30 19:07:13'),
(180, 10, 9, 0, 10, '2016-01-02 12:32:40'),
(181, 10, 9, 0, 38, '2016-01-04 16:07:23'),
(182, 1, 7, 0, 1, '2016-01-07 15:26:36'),
(183, 1, 7, 0, 40, '2016-01-08 21:22:37'),
(185, 1, 7, 0, 4, '2016-01-18 02:21:45'),
(186, 1, 7, 0, 20, '2016-01-18 02:22:12'),
(187, 1, 7, 0, 6, '2016-01-18 02:22:52'),
(188, 1, 7, 0, 24, '2016-01-18 17:29:04'),
(189, 1, 7, 0, 37, '2016-01-19 13:38:09'),
(190, 1, 7, 0, 37, '2016-01-20 12:31:02'),
(191, 1, 7, 0, 52, '2016-01-20 12:38:57'),
(192, 1, 7, 0, 27, '2016-01-25 10:45:53'),
(193, 1, 7, 0, 4, '2016-01-25 11:53:02'),
(194, 1, 7, 0, 28, '2016-01-26 03:20:40'),
(195, 10, 9, 0, 28, '2016-01-26 03:20:49'),
(196, 1, 7, 0, 43, '2016-01-26 03:21:27'),
(197, 10, 9, 0, 43, '2016-01-26 03:21:35'),
(198, 1, 7, 0, 31, '2016-01-26 03:34:13'),
(199, 1, 7, 0, 6, '2016-01-26 03:34:28'),
(200, 10, 9, 0, 6, '2016-01-26 03:34:37'),
(201, 1, 7, 0, 38, '2016-01-27 11:29:48'),
(202, 1, 7, 0, 1, '2016-01-27 15:13:48'),
(203, 1, 7, 0, 4, '2016-01-27 15:14:09'),
(204, 10, 9, 0, 1, '2016-01-29 22:27:21'),
(205, 10, 9, 0, 10, '2016-02-02 12:14:48'),
(206, 1, 7, 0, 6, '2016-02-04 20:22:40'),
(207, 10, 9, 0, 6, '2016-02-04 20:22:51'),
(208, 1, 7, 0, 56, '2016-02-04 20:24:34'),
(209, 10, 9, 0, 56, '2016-02-04 20:31:16'),
(212, 1, 7, 0, 6, '2016-02-09 14:30:31'),
(213, 1, 7, 0, 38, '2016-02-09 14:31:18'),
(214, 1, 7, 0, 20, '2016-02-09 14:34:20'),
(215, 1, 7, 0, 36, '2016-02-09 14:41:22'),
(216, 1, 7, 0, 0, '2016-02-09 14:41:47'),
(217, 1, 7, 0, 40, '2016-02-09 14:57:17'),
(218, 1, 7, 0, 27, '2016-02-09 15:23:17'),
(219, 1, 7, 0, 20, '2016-02-09 16:47:22'),
(220, 10, 9, 0, 21, '2016-02-11 11:37:49'),
(221, 10, 9, 0, 56, '2016-02-11 11:38:31'),
(222, 1, 7, 0, 42, '2016-02-11 11:58:47'),
(223, 1, 7, 0, 0, '2016-02-11 11:59:19'),
(224, 1, 7, 0, 1, '2016-02-11 19:29:48'),
(225, 10, 9, 0, 9, '2016-02-12 03:12:19'),
(226, 10, 9, 0, 27, '2016-02-12 03:13:41'),
(227, 10, 9, 0, 34, '2016-02-12 03:13:51'),
(228, 10, 9, 0, 42, '2016-02-12 03:21:34'),
(229, 1, 7, 0, 6, '2016-02-12 03:24:57'),
(230, 1, 7, 0, 6, '2016-02-12 10:12:37'),
(231, 1, 7, 0, 4, '2016-02-12 10:32:01'),
(232, 1, 7, 0, 37, '2016-02-12 11:18:45'),
(233, 1, 7, 0, 1, '2016-02-12 11:31:45'),
(234, 1, 7, 0, 40, '2016-02-12 12:05:39'),
(235, 10, 9, 0, 22, '2016-02-20 16:40:37'),
(236, 1, 7, 0, 40, '2016-02-20 17:40:12'),
(237, 1, 7, 0, 20, '2016-02-21 02:05:48'),
(238, 10, 9, 0, 34, '2016-02-22 20:20:11'),
(239, 1, 7, 0, 34, '2016-02-23 17:45:15'),
(240, 1, 7, 0, 27, '2016-02-24 11:42:11'),
(241, 1, 7, 0, 0, '2016-02-24 11:43:43'),
(242, 1, 7, 0, 38, '2016-02-24 11:57:46'),
(243, 1, 7, 0, 36, '2016-02-24 11:57:56'),
(244, 10, 9, 0, 5, '2016-02-24 13:17:28'),
(245, 1, 7, 0, 40, '2016-02-25 10:52:19'),
(246, 1, 7, 0, 2, '2016-02-25 10:52:53'),
(247, 1, 7, 0, 3, '2016-02-25 10:53:04'),
(248, 1, 7, 0, 5, '2016-02-25 10:53:10'),
(249, 1, 7, 0, 7, '2016-02-25 10:53:30'),
(250, 1, 7, 0, 8, '2016-02-25 10:53:40'),
(251, 1, 7, 0, 9, '2016-02-25 10:53:44'),
(252, 1, 7, 0, 10, '2016-02-25 10:53:50'),
(253, 1, 7, 0, 11, '2016-02-25 10:54:04'),
(254, 1, 7, 0, 13, '2016-02-25 10:54:14'),
(255, 1, 7, 0, 14, '2016-02-25 10:54:22'),
(256, 1, 7, 0, 15, '2016-02-25 10:54:26'),
(257, 1, 7, 0, 17, '2016-02-25 10:54:32'),
(258, 1, 7, 0, 18, '2016-02-25 10:54:38'),
(259, 1, 7, 0, 19, '2016-02-25 10:54:44'),
(260, 1, 7, 0, 21, '2016-02-25 10:55:01'),
(261, 1, 7, 0, 22, '2016-02-25 10:55:08'),
(262, 1, 7, 0, 23, '2016-02-25 10:55:15'),
(263, 1, 7, 0, 24, '2016-02-25 10:55:18'),
(264, 1, 7, 0, 25, '2016-02-25 10:55:30'),
(265, 1, 7, 0, 26, '2016-02-25 10:55:39'),
(266, 1, 7, 0, 28, '2016-02-25 10:55:51'),
(267, 1, 7, 0, 29, '2016-02-25 10:55:54'),
(268, 1, 7, 0, 30, '2016-02-25 10:56:18'),
(269, 1, 7, 0, 54, '2016-03-04 22:20:56'),
(270, 10, 9, 0, 34, '2016-03-10 17:49:10'),
(271, 1, 7, 0, 66, '2016-03-11 17:33:31'),
(272, 10, 9, 0, 66, '2016-03-11 18:27:39'),
(273, 10, 9, 0, 66, '2016-03-11 18:30:09'),
(274, 1, 7, 0, 1, '2016-03-11 18:37:47'),
(275, 10, 9, 0, 1, '2016-03-11 18:38:10'),
(276, 1, 7, 0, 20, '2016-03-11 18:39:57'),
(277, 1, 7, 0, 1, '2016-03-11 18:40:01'),
(278, 10, 9, 0, 1, '2016-03-11 18:40:05'),
(279, 10, 9, 0, 1, '2016-03-11 18:40:35'),
(280, 1, 7, 0, 3, '2016-03-12 13:46:20'),
(281, 1, 7, 0, 24, '2016-03-14 12:14:37'),
(282, 1, 7, 0, 27, '2016-03-14 12:15:32'),
(283, 1, 7, 0, 65, '2016-03-14 13:45:21'),
(284, 10, 9, 0, 10, '2016-04-06 10:50:58'),
(285, 10, 9, 0, 21, '2016-04-06 10:51:01'),
(286, 1, 7, 0, 28, '2016-04-06 10:51:13'),
(287, 10, 9, 0, 6, '2016-04-06 10:52:08'),
(288, 1, 7, 0, 40, '2016-04-07 10:56:29'),
(289, 1, 7, 0, 6, '2016-04-07 10:59:13'),
(290, 10, 9, 0, 55, '2016-04-07 16:50:23'),
(291, 1, 7, 0, 4, '2016-04-08 19:16:31'),
(292, 1, 7, 0, 34, '2016-04-20 18:42:05'),
(293, 1, 7, 0, 37, '2016-04-21 16:03:37'),
(294, 1, 7, 0, 55, '2016-04-21 16:14:19'),
(295, 1, 7, 0, 37, '2016-04-21 17:19:27'),
(296, 10, 9, 0, 20, '2016-04-22 12:00:09'),
(297, 10, 9, 0, 20, '2016-04-22 13:12:39'),
(298, 10, 9, 0, 20, '2016-04-22 13:13:43'),
(299, 10, 9, 0, 40, '2016-04-22 14:00:27'),
(300, 1, 7, 0, 4, '2016-04-26 17:35:01'),
(301, 1, 7, 0, 4, '2016-04-28 19:05:44'),
(302, 10, 9, 0, 4, '2016-04-30 11:51:24'),
(303, 1, 7, 0, 37, '2016-05-10 17:33:56'),
(304, 1, 7, 0, 46, '2016-05-20 20:24:40'),
(305, 10, 9, 0, 46, '2016-05-20 20:24:59'),
(306, 1, 7, 0, 8, '2016-05-22 21:17:29'),
(307, 10, 9, 0, 8, '2016-05-22 21:17:36'),
(308, 10, 9, 0, 40, '2016-05-31 17:11:08'),
(309, 1, 7, 0, 5, '2016-06-01 13:15:18'),
(310, 10, 9, 0, 65, '2016-06-01 14:24:53'),
(311, 1, 7, 0, 50, '2016-06-01 15:53:20'),
(312, 1, 7, 0, 14, '2016-06-03 11:31:24'),
(313, 1, 7, 0, 66, '2016-06-03 11:33:54'),
(314, 1, 7, 0, 65, '2016-06-03 11:52:07'),
(315, 10, 9, 0, 65, '2016-06-03 11:52:18'),
(316, 10, 9, 0, 14, '2016-06-03 12:46:02'),
(317, 10, 9, 0, 50, '2016-06-03 12:53:33'),
(318, 10, 9, 0, 1, '2016-06-03 12:56:12'),
(319, 1, 7, 0, 51, '2016-06-03 12:58:05'),
(320, 10, 9, 0, 51, '2016-06-03 12:58:12'),
(321, 10, 9, 0, 66, '2016-06-03 12:58:59'),
(322, 1, 7, 0, 34, '2016-06-03 13:01:00'),
(323, 10, 9, 0, 34, '2016-06-03 13:01:20'),
(324, 1, 7, 0, 29, '2016-06-03 13:02:24'),
(325, 10, 9, 0, 29, '2016-06-03 13:02:31'),
(326, 1, 7, 0, 33, '2016-06-03 13:02:36'),
(327, 1, 7, 0, 56, '2016-06-03 13:02:38'),
(328, 1, 7, 0, 20, '2016-06-03 13:02:39'),
(329, 1, 7, 0, 52, '2016-06-03 13:02:41'),
(330, 10, 9, 0, 33, '2016-06-03 13:02:48'),
(331, 10, 9, 0, 56, '2016-06-03 13:02:56'),
(332, 10, 9, 0, 20, '2016-06-03 13:03:02'),
(333, 10, 9, 0, 52, '2016-06-03 13:03:07'),
(334, 1, 7, 0, 24, '2016-06-03 13:03:26'),
(335, 1, 7, 0, 21, '2016-06-03 13:03:27'),
(336, 10, 9, 0, 24, '2016-06-03 13:03:33'),
(337, 10, 9, 0, 21, '2016-06-03 13:03:38'),
(338, 10, 9, 0, 9, '2016-06-03 13:05:01'),
(339, 1, 7, 0, 5, '2016-06-03 13:05:18'),
(340, 1, 7, 0, 27, '2016-06-03 13:05:21'),
(341, 10, 9, 0, 5, '2016-06-03 13:05:25'),
(342, 10, 9, 0, 27, '2016-06-03 13:05:30'),
(343, 1, 7, 0, 9, '2016-06-03 13:06:11'),
(344, 1, 7, 0, 4, '2016-06-03 13:06:12'),
(345, 1, 7, 0, 3, '2016-06-03 13:06:14'),
(346, 1, 7, 0, 54, '2016-06-03 13:06:19'),
(347, 1, 7, 0, 70, '2016-06-03 13:06:20'),
(348, 1, 7, 0, 12, '2016-06-03 13:06:25'),
(349, 1, 7, 0, 55, '2016-06-03 13:06:26'),
(350, 1, 7, 0, 69, '2016-06-03 13:07:28'),
(351, 1, 7, 0, 40, '2016-06-03 13:07:29'),
(352, 1, 7, 0, 42, '2016-06-03 13:08:39'),
(353, 1, 7, 0, 28, '2016-06-03 13:08:40'),
(354, 1, 7, 0, 46, '2016-06-03 13:09:02'),
(355, 1, 7, 0, 37, '2016-06-03 13:09:04'),
(356, 1, 7, 0, 23, '2016-06-03 13:09:05'),
(357, 1, 7, 0, 53, '2016-06-03 13:09:06'),
(358, 1, 7, 0, 36, '2016-06-03 15:12:59'),
(359, 10, 9, 0, 36, '2016-06-03 15:13:06'),
(360, 10, 9, 0, 36, '2016-06-03 15:48:58'),
(361, 1, 7, 0, 2, '2016-06-03 16:31:37'),
(362, 10, 9, 0, 2, '2016-06-03 16:32:00'),
(363, 1, 7, 0, 9, '2016-06-04 16:22:42'),
(364, 1, 7, 0, 4, '2016-06-04 16:22:44'),
(365, 1, 7, 0, 36, '2016-06-04 16:22:48'),
(366, 1, 7, 0, 5, '2016-06-04 16:22:51'),
(367, 10, 9, 0, 9, '2016-06-04 16:22:56'),
(368, 10, 9, 0, 4, '2016-06-04 16:23:28'),
(369, 10, 9, 0, 36, '2016-06-04 16:23:51'),
(370, 10, 9, 0, 5, '2016-06-04 16:24:16'),
(371, 1, 7, 0, 70, '2016-06-04 16:24:59'),
(372, 1, 7, 0, 33, '2016-06-04 16:25:01'),
(373, 1, 7, 0, 3, '2016-06-04 16:25:04'),
(374, 1, 7, 0, 29, '2016-06-04 16:25:06'),
(375, 10, 9, 0, 70, '2016-06-04 16:25:10'),
(376, 10, 9, 0, 33, '2016-06-04 16:25:49'),
(377, 1, 7, 0, 72, '2016-06-04 16:41:13'),
(378, 1, 7, 0, 10, '2016-06-04 16:49:44'),
(379, 10, 9, 0, 46, '2016-06-04 16:51:32'),
(380, 10, 9, 0, 53, '2016-06-04 16:51:38'),
(381, 10, 9, 0, 37, '2016-06-04 16:51:53'),
(382, 10, 9, 0, 23, '2016-06-04 16:52:26'),
(383, 1, 7, 0, 22, '2016-06-04 16:52:48'),
(384, 1, 7, 0, 8, '2016-06-04 16:52:49'),
(385, 1, 7, 0, 45, '2016-06-04 16:52:50'),
(386, 1, 7, 0, 6, '2016-06-04 16:52:51'),
(387, 10, 9, 0, 22, '2016-06-04 16:52:58'),
(388, 10, 9, 0, 8, '2016-06-04 16:53:05'),
(389, 10, 9, 0, 6, '2016-06-04 16:53:32'),
(390, 10, 9, 0, 45, '2016-06-04 16:53:55'),
(391, 1, 7, 0, 41, '2016-06-04 16:54:06'),
(392, 1, 7, 0, 43, '2016-06-04 16:54:08'),
(393, 10, 9, 0, 41, '2016-06-04 16:54:20'),
(394, 10, 9, 0, 38, '2016-06-04 16:54:41'),
(395, 10, 9, 0, 43, '2016-06-04 16:54:48'),
(396, 1, 7, 0, 39, '2016-06-04 16:57:02'),
(397, 10, 9, 0, 39, '2016-06-04 16:57:10'),
(398, 10, 9, 0, 42, '2016-06-04 16:58:34'),
(399, 10, 9, 0, 28, '2016-06-04 16:58:46'),
(400, 10, 9, 0, 10, '2016-06-04 16:58:52'),
(401, 10, 9, 0, 36, '2016-06-04 17:06:48'),
(402, 1, 7, 0, 36, '2016-06-04 17:26:55'),
(403, 10, 9, 0, 36, '2016-06-04 17:27:01'),
(404, 1, 7, 0, 40, '2016-06-04 17:40:57'),
(405, 1, 7, 0, 30, '2016-06-04 17:43:57'),
(406, 1, 7, 0, 36, '2016-06-04 17:49:35'),
(407, 10, 9, 0, 36, '2016-06-04 17:50:09'),
(408, 10, 9, 0, 36, '2016-06-04 17:50:40'),
(409, 1, 7, 0, 36, '2016-06-04 17:57:35'),
(410, 10, 9, 0, 36, '2016-06-04 17:58:15'),
(411, 10, 9, 0, 36, '2016-06-04 17:58:24'),
(412, 1, 7, 0, 36, '2016-06-04 18:08:06'),
(413, 10, 9, 0, 36, '2016-06-04 18:08:48'),
(414, 10, 9, 0, 36, '2016-06-04 18:10:42'),
(415, 1, 7, 0, 36, '2016-06-04 18:13:28'),
(416, 10, 9, 0, 36, '2016-06-04 18:14:02'),
(417, 10, 9, 0, 36, '2016-06-04 18:14:39'),
(418, 1, 7, 0, 36, '2016-06-04 18:16:49'),
(419, 10, 9, 0, 36, '2016-06-04 18:17:58'),
(420, 10, 9, 0, 36, '2016-06-04 18:18:07'),
(421, 10, 9, 0, 72, '2016-06-06 12:26:58'),
(422, 10, 9, 0, 3, '2016-06-06 12:34:38'),
(423, 10, 9, 0, 4, '2016-06-06 12:36:26'),
(424, 10, 9, 0, 70, '2016-06-06 12:39:53'),
(425, 10, 9, 0, 55, '2016-06-06 12:40:09'),
(426, 10, 9, 0, 54, '2016-06-06 12:40:23'),
(427, 10, 9, 0, 12, '2016-06-06 12:40:50'),
(428, 10, 9, 0, 69, '2016-06-06 12:41:17'),
(429, 10, 9, 0, 40, '2016-06-06 12:41:23'),
(430, 1, 7, 0, 75, '2016-06-06 12:41:58'),
(431, 10, 9, 0, 75, '2016-06-06 12:42:16'),
(432, 1, 7, 0, 73, '2016-06-06 12:42:30'),
(433, 10, 9, 0, 73, '2016-06-06 12:42:48'),
(434, 1, 7, 0, 36, '2016-06-06 12:46:18'),
(435, 10, 9, 0, 36, '2016-06-06 12:46:25'),
(436, 1, 7, 0, 36, '2016-06-06 12:50:06'),
(437, 10, 9, 0, 36, '2016-06-06 12:50:13'),
(438, 1, 7, 0, 79, '2016-06-06 13:18:06'),
(439, 10, 9, 0, 79, '2016-06-06 13:18:11'),
(440, 1, 7, 0, 36, '2016-06-06 13:19:05'),
(441, 1, 7, 0, 80, '2016-06-06 13:19:25'),
(442, 10, 9, 0, 80, '2016-06-06 13:19:30'),
(443, 1, 7, 0, 36, '2016-06-06 13:21:49'),
(444, 1, 7, 0, 81, '2016-06-06 13:22:07'),
(445, 10, 9, 0, 81, '2016-06-06 13:22:12'),
(446, 1, 7, 0, 40, '2016-06-06 13:23:57'),
(447, 1, 7, 0, 36, '2016-06-06 13:24:02'),
(448, 1, 7, 0, 82, '2016-06-06 13:24:21'),
(449, 10, 9, 0, 82, '2016-06-06 13:24:26'),
(450, 10, 2, 1, 82, '2016-06-06 14:51:24'),
(451, 10, 9, 0, 82, '2016-06-06 14:52:45'),
(452, 10, 9, 0, 36, '2016-06-10 11:35:31'),
(453, 10, 9, 0, 36, '2016-06-10 11:49:51'),
(454, 1, 7, 0, 72, '2016-06-10 13:08:53'),
(455, 1, 7, 0, 46, '2016-06-13 11:05:49'),
(456, 1, 7, 0, 75, '2016-06-13 11:05:51'),
(457, 1, 7, 0, 83, '2016-06-13 11:05:53'),
(458, 10, 9, 0, 46, '2016-06-13 11:06:00'),
(459, 10, 9, 0, 37, '2016-06-13 11:06:09'),
(460, 10, 9, 0, 83, '2016-06-13 11:06:17'),
(461, 10, 9, 0, 75, '2016-06-13 11:06:24'),
(462, 1, 7, 0, 53, '2016-06-13 11:06:33'),
(463, 1, 7, 0, 73, '2016-06-13 11:06:33'),
(464, 10, 9, 0, 23, '2016-06-13 11:06:44'),
(465, 10, 9, 0, 53, '2016-06-13 11:06:50'),
(466, 10, 9, 0, 73, '2016-06-13 11:06:57'),
(467, 10, 9, 0, 22, '2016-06-13 11:07:03'),
(468, 1, 7, 0, 45, '2016-06-13 11:07:13'),
(469, 10, 9, 0, 8, '2016-06-13 11:07:23'),
(470, 10, 9, 0, 45, '2016-06-13 11:07:33'),
(471, 10, 9, 0, 6, '2016-06-13 11:07:39'),
(472, 1, 7, 0, 41, '2016-06-13 11:07:47'),
(473, 1, 7, 0, 43, '2016-06-13 11:07:48'),
(474, 1, 7, 0, 14, '2016-06-13 11:07:49'),
(475, 10, 9, 0, 41, '2016-06-13 11:07:56'),
(476, 10, 9, 0, 43, '2016-06-13 11:08:02'),
(477, 10, 9, 0, 38, '2016-06-13 11:08:06'),
(478, 10, 9, 0, 14, '2016-06-13 11:08:11'),
(479, 1, 7, 0, 65, '2016-06-13 11:12:24'),
(480, 1, 7, 0, 50, '2016-06-13 11:12:25'),
(481, 1, 7, 0, 51, '2016-06-13 11:12:26'),
(482, 1, 7, 0, 82, '2016-06-13 11:12:29'),
(483, 1, 7, 0, 81, '2016-06-13 11:12:35'),
(484, 1, 7, 0, 3, '2016-06-13 11:13:51'),
(485, 1, 7, 0, 33, '2016-06-13 11:13:52'),
(486, 1, 7, 0, 2, '2016-06-13 11:13:52'),
(487, 1, 7, 0, 70, '2016-06-13 11:13:58'),
(488, 1, 7, 0, 55, '2016-06-13 11:13:59'),
(489, 1, 7, 0, 56, '2016-06-13 11:14:00'),
(490, 1, 7, 0, 1, '2016-06-13 11:59:13'),
(491, 1, 7, 0, 80, '2016-06-13 12:19:00'),
(492, 10, 9, 0, 20, '2016-06-13 12:38:20'),
(493, 10, 9, 0, 34, '2016-06-15 12:40:03'),
(494, 10, 9, 0, 9, '2016-06-21 19:15:54'),
(495, 10, 9, 0, 5, '2016-06-21 19:16:01'),
(496, 10, 9, 0, 4, '2016-06-21 19:16:10'),
(497, 10, 2, 1, 1, '2016-06-22 12:58:42'),
(498, 1, 7, 0, 54, '2016-06-28 11:42:13'),
(499, 1, 7, 0, 69, '2016-06-28 11:42:25'),
(500, 1, 7, 0, 12, '2016-06-28 11:42:29'),
(501, 1, 7, 0, 52, '2016-06-28 11:42:32'),
(502, 1, 7, 0, 40, '2016-06-28 11:42:33'),
(503, 5, 3, 1, 86, '2016-07-05 12:21:31'),
(504, 1, 7, 0, 4, '2016-07-05 14:04:56'),
(505, 1, 7, 0, 31, '2016-07-11 17:05:25'),
(506, 1, 7, 0, 1, '2016-07-22 12:04:16'),
(507, 1, 7, 0, 20, '2016-07-22 12:08:01'),
(508, 10, 2, 1, 92, '2016-07-22 12:09:09'),
(509, 1, 7, 0, 91, '2016-08-08 03:13:06'),
(510, 5, 1, 1, 97, '2016-08-08 03:20:52'),
(511, 5, 3, 1, 97, '2016-08-08 03:21:28'),
(512, 10, 2, 1, 97, '2016-08-08 03:21:46'),
(513, 1, 7, 0, 50, '2016-08-08 03:28:59'),
(514, 1, 7, 0, 86, '2016-08-08 11:02:08'),
(515, 1, 7, 0, 36, '2016-08-09 14:35:30'),
(516, 1, 7, 0, 37, '2016-08-09 16:28:32'),
(517, 1, 7, 0, 4, '2016-08-09 16:28:42'),
(518, 10, 2, 1, 94, '2016-08-10 11:07:25'),
(519, 5, 3, 1, 94, '2016-08-10 11:08:04'),
(520, 5, 1, 1, 94, '2016-08-10 11:09:50'),
(521, 1, 7, 0, 4, '2016-08-15 20:48:25'),
(522, 1, 7, 0, 92, '2016-08-15 20:48:48'),
(523, 1, 7, 0, 80, '2016-08-15 20:49:19'),
(524, 1, 7, 0, 46, '2016-08-15 20:51:08'),
(525, 1, 7, 0, 86, '2016-08-15 20:51:35'),
(526, 1, 7, 0, 94, '2016-08-15 20:51:43'),
(527, 1, 7, 0, 89, '2016-08-15 20:52:18'),
(528, 1, 7, 0, 37, '2016-08-15 20:52:30'),
(529, 1, 7, 0, 83, '2016-08-15 20:52:37'),
(530, 1, 7, 0, 75, '2016-08-15 20:52:44'),
(531, 1, 7, 0, 23, '2016-08-15 20:52:50'),
(532, 1, 7, 0, 53, '2016-08-15 20:53:03'),
(533, 1, 7, 0, 73, '2016-08-15 20:53:14'),
(534, 1, 7, 0, 22, '2016-08-15 20:57:54'),
(535, 1, 7, 0, 8, '2016-08-15 20:58:02'),
(536, 1, 7, 0, 36, '2016-08-15 20:58:13'),
(537, 1, 7, 0, 95, '2016-08-15 20:59:06'),
(538, 1, 7, 0, 45, '2016-08-15 20:59:19'),
(539, 1, 7, 0, 6, '2016-08-15 20:59:29'),
(540, 1, 7, 0, 14, '2016-08-15 21:01:16'),
(541, 1, 7, 0, 41, '2016-08-15 21:01:23'),
(542, 1, 7, 0, 38, '2016-08-15 21:01:56'),
(543, 1, 7, 0, 65, '2016-08-15 21:02:06'),
(544, 1, 7, 0, 50, '2016-08-15 21:02:17'),
(545, 1, 7, 0, 91, '2016-08-15 21:02:35'),
(546, 1, 7, 0, 1, '2016-08-15 21:02:54'),
(547, 1, 7, 0, 51, '2016-08-15 21:03:16'),
(548, 1, 7, 0, 66, '2016-08-15 21:03:45'),
(549, 1, 7, 0, 81, '2016-08-15 21:04:03'),
(550, 1, 7, 0, 85, '2016-08-15 21:04:11'),
(551, 1, 7, 0, 97, '2016-08-15 21:04:57'),
(552, 1, 7, 0, 82, '2016-08-15 21:05:20'),
(553, 1, 7, 0, 42, '2016-08-15 21:07:00'),
(554, 10, 9, 0, 23, '2016-08-15 22:48:17'),
(555, 10, 9, 0, 36, '2016-08-15 22:48:25'),
(556, 10, 9, 0, 37, '2016-08-15 22:56:55'),
(557, 10, 9, 0, 38, '2016-08-15 22:56:57'),
(558, 10, 9, 0, 50, '2016-08-15 22:57:02'),
(559, 10, 9, 0, 65, '2016-08-15 22:57:05'),
(560, 10, 9, 0, 73, '2016-08-15 22:57:15'),
(561, 10, 9, 0, 9, '2016-08-15 23:19:58'),
(562, 1, 7, 0, 1, '2016-08-16 15:15:50'),
(563, 1, 7, 0, 6, '2016-08-16 15:28:12'),
(564, 1, 7, 0, 70, '2016-08-16 15:29:15'),
(565, 1, 7, 0, 30, '2016-08-16 16:36:10'),
(566, 1, 7, 0, 50, '2016-08-16 16:54:41'),
(568, 1, 7, 0, 6, '2016-08-16 16:57:46'),
(569, 10, 2, 1, 99, '2016-08-16 16:58:56'),
(570, 10, 9, 0, 6, '2016-08-16 17:00:07'),
(571, 1, 7, 0, 36, '2016-08-16 17:01:35'),
(572, 10, 9, 0, 23, '2016-08-16 17:06:01'),
(573, 1, 7, 0, 99, '2016-08-16 19:18:18'),
(574, 1, 7, 0, 73, '2016-08-16 19:32:44'),
(575, 1, 7, 0, 99, '2016-08-17 16:28:36'),
(576, 10, 9, 0, 70, '2016-08-17 19:35:19'),
(577, 10, 9, 0, 75, '2016-08-17 19:35:24'),
(578, 10, 9, 0, 81, '2016-08-17 19:35:29'),
(579, 10, 9, 0, 82, '2016-08-17 19:35:31'),
(580, 10, 9, 0, 86, '2016-08-17 19:35:34'),
(581, 10, 9, 0, 89, '2016-08-17 19:35:38'),
(582, 10, 9, 0, 91, '2016-08-17 19:35:42'),
(583, 10, 9, 0, 94, '2016-08-17 19:35:46'),
(584, 10, 9, 0, 97, '2016-08-17 19:35:51'),
(585, 1, 7, 0, 99, '2016-08-17 19:47:47'),
(586, 1, 7, 0, 41, '2016-08-17 20:05:00'),
(587, 1, 7, 0, 43, '2016-08-17 20:19:13'),
(588, 1, 7, 0, 6, '2016-08-17 20:19:24'),
(589, 1, 7, 0, 99, '2016-08-17 20:22:37'),
(590, 10, 9, 0, 1, '2016-08-17 20:23:50'),
(591, 10, 9, 0, 8, '2016-08-17 20:23:55'),
(592, 10, 9, 0, 6, '2016-08-17 20:23:59'),
(593, 10, 9, 0, 22, '2016-08-17 20:24:02'),
(594, 10, 9, 0, 23, '2016-08-17 20:24:06'),
(595, 10, 9, 0, 50, '2016-08-17 20:24:16'),
(596, 10, 9, 0, 65, '2016-08-17 20:24:21'),
(597, 10, 9, 0, 75, '2016-08-17 20:24:24'),
(598, 10, 9, 0, 81, '2016-08-17 20:24:27'),
(599, 10, 9, 0, 97, '2016-08-17 20:24:33'),
(600, 10, 9, 0, 99, '2016-08-17 20:24:38'),
(601, 10, 9, 0, 99, '2016-08-18 02:33:53'),
(602, 10, 9, 0, 43, '2016-08-18 02:49:29'),
(603, 10, 9, 0, 99, '2016-08-18 02:49:32'),
(604, 10, 9, 0, 100, '2016-08-18 02:49:34'),
(605, 10, 9, 0, 1, '2016-08-18 02:51:02'),
(606, 10, 9, 0, 8, '2016-08-18 02:51:10'),
(607, 10, 9, 0, 6, '2016-08-18 02:51:16'),
(608, 10, 9, 0, 36, '2016-08-19 12:20:45'),
(609, 1, 7, 0, 94, '2016-08-19 12:58:53'),
(610, 10, 9, 0, 94, '2016-08-19 12:58:59'),
(611, 1, 7, 0, 30, '2016-08-19 14:05:16'),
(612, 1, 7, 0, 12, '2016-08-19 14:05:50'),
(613, 1, 7, 0, 14, '2016-08-19 14:06:08'),
(614, 1, 7, 0, 21, '2016-08-19 14:17:54'),
(615, 1, 7, 0, 22, '2016-08-19 14:26:44'),
(616, 1, 7, 0, 23, '2016-08-19 14:27:00'),
(617, 1, 7, 0, 24, '2016-08-19 14:27:09'),
(618, 1, 7, 0, 27, '2016-08-19 14:28:54'),
(619, 1, 7, 0, 28, '2016-08-19 14:29:21'),
(620, 1, 7, 0, 29, '2016-08-19 14:29:30'),
(621, 1, 7, 0, 31, '2016-08-19 14:29:42'),
(622, 1, 7, 0, 32, '2016-08-19 14:29:49'),
(623, 1, 7, 0, 33, '2016-08-19 14:29:57'),
(624, 1, 7, 0, 34, '2016-08-19 14:30:03'),
(625, 1, 7, 0, 38, '2016-08-19 14:41:44'),
(626, 1, 7, 0, 39, '2016-08-19 14:41:53'),
(627, 1, 7, 0, 40, '2016-08-19 14:42:05'),
(628, 1, 7, 0, 41, '2016-08-19 14:42:14'),
(629, 1, 7, 0, 42, '2016-08-19 14:42:20'),
(630, 1, 7, 0, 43, '2016-08-19 14:42:27'),
(631, 1, 7, 0, 45, '2016-08-19 14:42:41'),
(632, 1, 7, 0, 46, '2016-08-19 14:42:48'),
(633, 1, 7, 0, 50, '2016-08-19 14:43:12'),
(634, 1, 7, 0, 51, '2016-08-19 14:43:33'),
(635, 1, 7, 0, 52, '2016-08-19 14:43:41'),
(636, 1, 7, 0, 53, '2016-08-19 14:43:48'),
(637, 1, 7, 0, 54, '2016-08-19 14:43:56'),
(638, 1, 7, 0, 6, '2016-08-19 14:48:23'),
(639, 10, 9, 0, 4, '2016-08-20 11:35:37'),
(640, 1, 7, 0, 94, '2016-08-31 01:37:34'),
(641, 10, 9, 0, 6, '2016-09-07 17:41:44'),
(642, 10, 9, 0, 94, '2016-09-10 17:07:10'),
(643, 10, 9, 0, 94, '2016-09-10 17:08:00'),
(644, 1, 7, 0, 6, '2016-09-15 16:31:35'),
(645, 10, 9, 0, 6, '2016-09-15 16:34:42'),
(646, 1, 7, 0, 5, '2016-10-01 16:44:08'),
(647, 10, 9, 0, 22, '2016-10-05 02:20:24'),
(648, 10, 9, 0, 103, '2016-10-06 10:50:55'),
(649, 10, 9, 0, 5, '2016-10-06 13:09:10'),
(650, 10, 9, 0, 70, '2016-10-07 02:11:48'),
(651, 10, 9, 0, 20, '2016-10-12 10:50:00'),
(652, 10, 9, 0, 1, '2016-10-12 11:28:43'),
(653, 10, 9, 0, 1, '2016-10-12 11:35:55'),
(654, 10, 9, 0, 36, '2016-10-12 13:27:52'),
(655, 1, 7, 0, 46, '2016-10-12 17:08:45'),
(656, 1, 7, 0, 50, '2016-10-12 17:24:48'),
(657, 10, 9, 0, 31, '2016-10-12 17:27:02'),
(658, 1, 7, 0, 103, '2016-10-12 18:09:29'),
(659, 1, 7, 0, 6, '2016-10-13 15:56:52'),
(660, 1, 7, 0, 36, '2016-10-13 15:57:18'),
(661, 10, 9, 0, 103, '2016-10-13 15:57:52'),
(662, 1, 7, 0, 20, '2016-10-13 16:18:20'),
(663, 1, 7, 0, 46, '2016-10-14 10:08:43'),
(664, 10, 9, 0, 8, '2016-10-14 13:02:29'),
(665, 10, 9, 0, 22, '2016-10-14 13:03:55'),
(666, 10, 9, 0, 37, '2016-10-14 13:05:27'),
(667, 10, 9, 0, 23, '2016-10-14 13:06:36'),
(668, 10, 9, 0, 38, '2016-10-14 13:06:47'),
(669, 1, 7, 0, 4, '2016-10-14 13:32:55'),
(670, 1, 7, 0, 86, '2016-10-15 12:41:13'),
(673, 5, 1, 1, 109, '2016-10-19 10:33:14'),
(674, 10, 9, 0, 8, '2016-10-19 10:53:04'),
(675, 1, 7, 0, 103, '2016-10-19 12:51:45'),
(676, 1, 7, 0, 4, '2016-10-20 11:49:23'),
(677, 1, 7, 0, 6, '2016-10-20 11:50:14'),
(678, 10, 9, 0, 111, '2016-10-24 15:17:14'),
(679, 10, 9, 0, 1, '2016-10-24 15:21:03'),
(680, 10, 9, 0, 1, '2016-10-24 15:32:03'),
(681, 10, 9, 0, 112, '2016-10-24 15:32:44'),
(682, 10, 9, 0, 107, '2016-10-24 15:35:02'),
(683, 1, 7, 0, 6, '2016-10-24 15:48:33'),
(684, 10, 9, 0, 6, '2016-10-24 15:49:05'),
(685, 10, 9, 0, 5, '2016-10-24 15:59:27'),
(686, 1, 7, 0, 4, '2016-10-24 16:05:09'),
(687, 10, 9, 0, 4, '2016-10-24 16:06:03'),
(688, 5, 1, 1, 107, '2016-10-24 16:08:08'),
(689, 1, 7, 0, 109, '2016-10-25 11:08:52'),
(690, 10, 9, 0, 109, '2016-10-25 11:12:01'),
(691, 1, 7, 0, 107, '2016-10-25 11:21:05'),
(692, 1, 7, 0, 107, '2016-10-25 11:22:36'),
(693, 1, 7, 0, 110, '2016-10-26 11:46:24'),
(694, 1, 7, 0, 113, '2016-10-26 14:39:04'),
(695, 10, 9, 0, 113, '2016-10-26 14:39:29'),
(696, 10, 9, 0, 107, '2016-10-26 15:50:04'),
(697, 10, 9, 0, 107, '2016-10-26 15:53:23'),
(698, 10, 9, 0, 107, '2016-10-26 15:54:18'),
(699, 10, 9, 0, 109, '2016-10-26 15:54:44'),
(700, 1, 7, 0, 109, '2016-10-26 15:57:17'),
(701, 10, 9, 0, 109, '2016-10-26 15:57:21'),
(702, 10, 9, 0, 109, '2016-10-26 15:57:40');

-- --------------------------------------------------------

--
-- Table structure for table `sr_user_reward`
--

CREATE TABLE IF NOT EXISTS `sr_user_reward` (
  `user_reward_id` int(11) NOT NULL AUTO_INCREMENT,
  `reward_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `awarded_on` datetime NOT NULL,
  `is_received` int(1) NOT NULL DEFAULT '0' COMMENT '1:yes,0:no',
  `is_latest` int(1) NOT NULL COMMENT '0:latest,1:old',
  PRIMARY KEY (`user_reward_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `sr_user_reward`
--

INSERT INTO `sr_user_reward` (`user_reward_id`, `reward_id`, `user_id`, `awarded_on`, `is_received`, `is_latest`) VALUES
(1, 1, 34, '2016-02-25 10:55:39', 0, 1),
(2, 5, 34, '2016-03-10 16:13:42', 0, 1),
(3, 2, 36, '2016-06-03 12:56:32', 0, 0),
(4, 3, 36, '2016-06-03 13:05:25', 0, 0),
(5, 1, 36, '2016-06-03 13:09:05', 0, 0),
(6, 2, 36, '2016-06-04 16:47:23', 0, 0),
(7, 1, 36, '2016-06-04 16:54:08', 0, 0),
(8, 5, 36, '2016-06-04 16:55:33', 0, 0),
(9, 3, 36, '2016-06-04 16:58:52', 0, 0),
(10, 2, 73, '2016-06-04 17:46:00', 0, 1),
(11, 2, 36, '2016-06-06 12:39:06', 0, 1),
(12, 1, 36, '2016-06-06 12:42:30', 0, 1),
(13, 3, 36, '2016-06-06 13:24:26', 0, 1),
(14, 5, 36, '2016-06-06 13:28:34', 0, 1),
(15, 3, 1, '2016-06-13 11:08:11', 0, 1),
(16, 1, 1, '2016-06-13 11:13:58', 0, 0),
(17, 2, 1, '2016-06-13 11:30:29', 0, 1),
(18, 1, 1, '2016-06-28 11:43:28', 0, 1),
(19, 5, 1, '2016-06-28 11:46:47', 0, 1),
(20, 1, 43, '2016-08-15 21:07:00', 0, 1),
(21, 1, 94, '2016-08-19 14:43:56', 0, 1),
(22, 2, 94, '2016-08-19 14:47:50', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sr_user_sticker`
--

CREATE TABLE IF NOT EXISTS `sr_user_sticker` (
  `user_sticker_id` int(11) NOT NULL AUTO_INCREMENT,
  `sticker_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `awarded_on` datetime NOT NULL,
  PRIMARY KEY (`user_sticker_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `sr_user_sticker`
--

INSERT INTO `sr_user_sticker` (`user_sticker_id`, `sticker_id`, `user_id`, `awarded_on`) VALUES
(1, 5, 1, '2015-09-25 13:48:23'),
(2, 6, 1, '2015-09-26 11:32:09'),
(3, 5, 4, '2015-09-26 11:44:55'),
(4, 6, 4, '2015-09-26 11:47:52'),
(5, 5, 10, '2015-09-26 11:55:19'),
(6, 6, 5, '2015-09-29 15:21:02'),
(7, 5, 20, '2015-10-05 17:11:56'),
(8, 5, 9, '2015-10-13 18:46:39'),
(9, 6, 10, '2015-10-28 11:50:24');

-- --------------------------------------------------------

--
-- Table structure for table `sr_user_suspend`
--

CREATE TABLE IF NOT EXISTS `sr_user_suspend` (
  `suspend_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `reason` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `suspended_by` int(11) NOT NULL,
  `suspended_on` datetime NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`suspend_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `sr_user_suspend`
--

INSERT INTO `sr_user_suspend` (`suspend_id`, `user_id`, `reason`, `description`, `suspended_by`, `suspended_on`, `status`) VALUES
(1, 4, 'Other', 'Having too much fun', 1, '2016-08-21 22:59:39', 1),
(2, 1, 'Personal Abuse', '', 1, '2016-09-05 23:29:28', 0),
(3, 1, 'Personal Abuse', '', 1, '2016-09-05 23:44:58', 0),
(4, 1, 'Inappropiate Photos', '', 1, '2016-09-05 23:50:36', 0),
(5, 1, 'Personal Abuse', '', 1, '2016-09-06 00:40:14', 0),
(6, 1, 'Personal Abuse', '', 1, '2016-09-09 00:16:24', 0),
(7, 1, 'Personal Abuse', '', 1, '2016-09-09 00:18:32', 1),
(8, 1, '', '', 0, '2016-11-08 11:40:36', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sr_vip_duration`
--

CREATE TABLE IF NOT EXISTS `sr_vip_duration` (
  `duration_id` int(11) NOT NULL AUTO_INCREMENT,
  `duration` varchar(20) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1' COMMENT '1:active,0:inactive',
  PRIMARY KEY (`duration_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `sr_vip_duration`
--

INSERT INTO `sr_vip_duration` (`duration_id`, `duration`, `status`) VALUES
(1, '1 Week', 1),
(2, '1 Month', 1),
(3, '3 Months', 1),
(4, '6 Months', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sr_vip_fee`
--

CREATE TABLE IF NOT EXISTS `sr_vip_fee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `price` varchar(50) NOT NULL,
  `currency` int(11) NOT NULL,
  `duration` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `sr_vip_fee`
--

INSERT INTO `sr_vip_fee` (`id`, `price`, `currency`, `duration`) VALUES
(1, '2.49', 1, 1),
(2, '3.99', 2, 1),
(3, '4.99', 3, 1),
(4, '249', 4, 1),
(5, '8.49', 1, 2),
(6, '11.49', 2, 2),
(7, '14.99', 3, 2),
(8, '849', 4, 2),
(9, '19.99', 1, 3),
(10, '26.99', 2, 3),
(11, '34.99', 3, 3),
(12, '1999', 4, 3),
(13, '29.99', 1, 4),
(14, '39.99', 2, 4),
(15, '49.99', 3, 4),
(16, '2999', 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `sr_vip_user`
--

CREATE TABLE IF NOT EXISTS `sr_vip_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vip_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1:active,0:inactive',
  `is_received` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1:received by user,0:not recevied',
  `by_admin` tinyint(4) NOT NULL DEFAULT '0' COMMENT '1:upgrade by admin',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `sr_vip_user`
--

INSERT INTO `sr_vip_user` (`id`, `vip_id`, `user_id`, `start_date`, `end_date`, `status`, `is_received`, `by_admin`) VALUES
(1, 0, 1, '2015-10-16 11:02:40', '2016-01-16 11:02:40', 0, 1, 0),
(2, 0, 6, '2015-11-02 03:15:40', '2016-02-02 03:15:40', 0, 1, 0),
(3, 0, 38, '2016-02-09 14:37:35', '2016-05-09 14:37:35', 0, 1, 0),
(4, 3, 34, '2016-02-19 14:42:27', '2016-02-26 14:42:27', 0, 1, 0),
(5, 3, 4, '2016-02-19 14:54:42', '2016-02-26 14:54:42', 0, 1, 0),
(10, 0, 1, '2016-03-11 17:07:01', '2016-07-21 17:07:01', 0, 1, 0),
(11, 0, 70, '2016-08-17 16:18:05', '2016-08-20 16:18:05', 0, 1, 0),
(12, 0, 99, '2016-08-17 20:25:46', '2016-08-20 20:25:46', 0, 1, 0);
