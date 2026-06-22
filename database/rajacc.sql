-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 22, 2026 at 12:57 PM
-- Server version: 8.2.0
-- PHP Version: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rajacc`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `firm_name` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `firm_email` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `firm_phone` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `firm_address` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `image` int DEFAULT NULL,
  `owner_name` varchar(100) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `owner_email` varchar(100) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `owner_phone` varchar(100) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `zone` varchar(100) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `gst` varchar(20) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `category` varchar(30) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `price_allotment` varchar(10) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `active` varchar(5) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `updated` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `firm_name`, `firm_email`, `firm_phone`, `firm_address`, `image`, `owner_name`, `owner_email`, `owner_phone`, `zone`, `gst`, `category`, `price_allotment`, `active`, `updated`) VALUES
(5, 'c', 'e', '33333,\r\n444', 'aa  aa', 7, 'on', 'oe', '6666,\r\n55555,', 'Ahd', 'axip333232', 'auto_rickshaw_dealer', '90', 'yes', 1782130324),
(6, 'a', '', '', '', 8, 'dd', '', '', '', '', 'whole_seller', '', 'yes', 1782130262);

-- --------------------------------------------------------

--
-- Table structure for table `ipadd`
--

DROP TABLE IF EXISTS `ipadd`;
CREATE TABLE IF NOT EXISTS `ipadd` (
  `id` int NOT NULL AUTO_INCREMENT,
  `ip` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `mac` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `userId` int NOT NULL,
  `logged_on` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `loggedout_on` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `sessionid` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `accounttype` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=63 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `ipadd`
--

INSERT INTO `ipadd` (`id`, `ip`, `mac`, `userId`, `logged_on`, `loggedout_on`, `sessionid`, `accounttype`) VALUES
(48, '::1', '', 1, '2026-06-22 10:53:36', '2026-06-22 12:51:21', 'f3ln87nbgi9iae5pt5o4qe800m', ''),
(47, '::1', '', 1, '2026-06-22 10:53:32', '2026-06-22 12:51:21', 'f3ln87nbgi9iae5pt5o4qe800m', ''),
(46, '::1', '', 1, '2026-06-22 10:53:22', '2026-06-22 12:51:21', 'f3ln87nbgi9iae5pt5o4qe800m', ''),
(45, '::1', '', 1, '2026-06-22 10:52:19', '2026-06-22 12:51:21', 'f3ln87nbgi9iae5pt5o4qe800m', ''),
(44, '::1', '', 1, '2026-06-22 10:50:46', '2026-06-22 12:51:21', 'f3ln87nbgi9iae5pt5o4qe800m', ''),
(43, '::1', '', 1, '2026-06-22 10:50:37', '2026-06-22 12:51:21', 'f3ln87nbgi9iae5pt5o4qe800m', ''),
(42, '::1', '', 1, '2026-06-22 10:50:20', '2026-06-22 12:51:21', 'f3ln87nbgi9iae5pt5o4qe800m', ''),
(41, '::1', '', 1, '2026-06-22 10:50:05', '2026-06-22 12:51:21', 'f3ln87nbgi9iae5pt5o4qe800m', ''),
(40, '::1', '', 1, '2026-06-22 10:46:54', '2026-06-22 12:51:21', 'f3ln87nbgi9iae5pt5o4qe800m', ''),
(39, '::1', '', 1, '2026-06-22 10:46:51', '2026-06-22 12:51:21', 'f3ln87nbgi9iae5pt5o4qe800m', ''),
(38, '::1', '', 1, '2026-06-22 10:46:15', '2026-06-22 12:51:21', 'f3ln87nbgi9iae5pt5o4qe800m', ''),
(37, '::1', '', 1, '2026-06-22 10:45:02', '2026-06-22 12:51:21', 'f3ln87nbgi9iae5pt5o4qe800m', ''),
(36, '::1', '', 1, '2026-06-22 10:44:38', '2026-06-22 12:51:21', 'f3ln87nbgi9iae5pt5o4qe800m', ''),
(35, '::1', '', 1, '2026-06-22 10:43:53', '2026-06-22 12:51:21', 'f3ln87nbgi9iae5pt5o4qe800m', ''),
(34, '::1', '', 1, '2026-06-22 10:42:20', '2026-06-22 12:51:21', 'f3ln87nbgi9iae5pt5o4qe800m', ''),
(33, '::1', '', 1, '2026-06-22 10:41:39', '2026-06-22 12:51:21', 'f3ln87nbgi9iae5pt5o4qe800m', ''),
(32, '::1', '', 1, '2026-06-22 10:41:26', '2026-06-22 12:51:21', 'f3ln87nbgi9iae5pt5o4qe800m', ''),
(31, '::1', '', 1, '2026-06-22 10:40:16', '2026-06-22 12:51:21', 'f3ln87nbgi9iae5pt5o4qe800m', ''),
(30, '::1', '', 1, '2026-06-22 16:09:56', '2026-06-22 12:51:21', 'f3ln87nbgi9iae5pt5o4qe800m', ''),
(29, '::1', '', 1, '2026-06-22 10:39:05', '2026-06-22 12:51:21', 'f3ln87nbgi9iae5pt5o4qe800m', ''),
(28, '::1', '', 1, '2026-06-22 07:03:28', '2026-06-22 12:51:21', 'f3ln87nbgi9iae5pt5o4qe800m', ''),
(27, '::1', '', 1, '2026-06-22 03:02:47', '2026-06-22 12:51:21', 'f3ln87nbgi9iae5pt5o4qe800m', ''),
(25, '::1', '', 1, '2026-06-20 11:45:48', '2026-06-22 12:51:21', 'f3ln87nbgi9iae5pt5o4qe800m', ''),
(26, '::1', '', 1, '2026-06-20 12:17:37', '2026-06-22 12:51:21', 'f3ln87nbgi9iae5pt5o4qe800m', ''),
(49, '::1', '', 1, '2026-06-22 10:54:12', '2026-06-22 12:51:21', 'f3ln87nbgi9iae5pt5o4qe800m', ''),
(50, '::1', '', 1, '2026-06-22 10:54:46', '2026-06-22 12:51:21', 'f3ln87nbgi9iae5pt5o4qe800m', ''),
(51, '::1', '', 1, '2026-06-22 11:09:21', '2026-06-22 12:51:21', 'f3ln87nbgi9iae5pt5o4qe800m', ''),
(52, '::1', '', 1, '2026-06-22 11:11:02', '2026-06-22 12:51:21', 'f3ln87nbgi9iae5pt5o4qe800m', ''),
(53, '::1', '', 1, '2026-06-22 11:11:17', '2026-06-22 12:51:21', 'f3ln87nbgi9iae5pt5o4qe800m', ''),
(54, '::1', '', 1, '2026-06-22 11:36:12', '2026-06-22 12:51:21', 'f3ln87nbgi9iae5pt5o4qe800m', ''),
(55, '::1', '', 1, '2026-06-22 11:37:47', '2026-06-22 12:51:21', 'f3ln87nbgi9iae5pt5o4qe800m', ''),
(56, '::1', '', 1, '2026-06-22 11:37:54', '2026-06-22 12:51:21', 'f3ln87nbgi9iae5pt5o4qe800m', ''),
(57, '::1', '', 1, '2026-06-22 11:38:06', '2026-06-22 12:51:21', 'f3ln87nbgi9iae5pt5o4qe800m', ''),
(58, '::1', '', 1, '2026-06-22 11:38:17', '2026-06-22 12:51:21', 'f3ln87nbgi9iae5pt5o4qe800m', ''),
(59, '::1', '', 1, '2026-06-22 11:38:23', '2026-06-22 12:51:21', 'f3ln87nbgi9iae5pt5o4qe800m', ''),
(60, '::1', '', 1, '2026-06-22 11:38:28', '2026-06-22 12:51:21', 'f3ln87nbgi9iae5pt5o4qe800m', ''),
(61, '::1', '', 1, '2026-06-22 12:14:38', '2026-06-22 12:51:21', 'f3ln87nbgi9iae5pt5o4qe800m', ''),
(62, '::1', '', 1, '2026-06-22 12:51:24', '', 'f3ln87nbgi9iae5pt5o4qe800m', '');

-- --------------------------------------------------------

--
-- Table structure for table `raw_materials`
--

DROP TABLE IF EXISTS `raw_materials`;
CREATE TABLE IF NOT EXISTS `raw_materials` (
  `id` int NOT NULL AUTO_INCREMENT,
  `raw_material` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `unit` varchar(20) COLLATE utf8mb3_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb3_unicode_ci NOT NULL,
  `image` int NOT NULL,
  `updated` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `raw_materials`
--

INSERT INTO `raw_materials` (`id`, `raw_material`, `unit`, `description`, `image`, `updated`) VALUES
(6, 'SS Pipes', '', '', 0, 1782126673),
(7, 'MS Pipes', '', '', 0, 1782126673),
(8, 'SS Rods', '', '', 0, 1782126673),
(9, 'MS Rods', '', '', 0, 1782126673),
(10, 'raw m', 'kg', '', 12, 1782132815),
(11, 'raw m1', 'kg', 'fteststets', 15, 1782133007),
(14, '11', '11', '22', 16, 1782133023);

-- --------------------------------------------------------

--
-- Table structure for table `sectors`
--

DROP TABLE IF EXISTS `sectors`;
CREATE TABLE IF NOT EXISTS `sectors` (
  `id` int NOT NULL AUTO_INCREMENT,
  `sector` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `sectors`
--

INSERT INTO `sectors` (`id`, `sector`) VALUES
(1, 'Auto'),
(2, 'IT'),
(3, 'Bank'),
(4, 'Insurance');

-- --------------------------------------------------------

--
-- Table structure for table `symbols`
--

DROP TABLE IF EXISTS `symbols`;
CREATE TABLE IF NOT EXISTS `symbols` (
  `id` int NOT NULL AUTO_INCREMENT,
  `symbol` varchar(100) DEFAULT NULL,
  `active` varchar(5) DEFAULT NULL,
  `counter` bigint DEFAULT NULL,
  `timezone` varchar(10) DEFAULT NULL,
  `strategy` varchar(10) DEFAULT NULL,
  `combination` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `exchange` varchar(10) DEFAULT NULL,
  `tags` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `fetched_price_on` int DEFAULT NULL,
  `generated_trade_on` int DEFAULT NULL,
  `generated_heatmap_on` int DEFAULT NULL,
  `updated` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `symbols`
--

INSERT INTO `symbols` (`id`, `symbol`, `active`, `counter`, `timezone`, `strategy`, `combination`, `exchange`, `tags`, `fetched_price_on`, `generated_trade_on`, `generated_heatmap_on`, `updated`) VALUES
(66, 'INFY_NSE', 'yes', NULL, NULL, '3', 'combination_report_id_341310', 'NSE', NULL, NULL, 20251218, 20251205, 1764593320),
(67, 'INFY_NSE', 'yes', NULL, NULL, '3', 'combination_report_id_341706', 'NSE', NULL, NULL, 20251218, 20251205, 1764593322),
(68, 'INFY_NSE', 'yes', NULL, NULL, '3', 'combination_report_id_324774', 'NSE', NULL, NULL, 20251218, 20251205, 1764593325),
(69, 'INFY_NSE', 'yes', NULL, NULL, '3', 'combination_report_id_324780', 'NSE', NULL, NULL, 20251218, 20251205, 1764593326),
(71, 'INFY_NSE', 'yes', NULL, NULL, '3', 'combination_report_id_324859', 'NSE', NULL, NULL, 20251218, 20251205, 1764593328),
(72, 'INFY_NSE', 'yes', NULL, NULL, '3', 'combination_report_id_324855', 'NSE', NULL, NULL, 20251218, 20251205, 1764593328),
(73, 'Infy nse', 'no', NULL, NULL, '3', 'combination_report_id_341985', 'NSE', '3,4,2', NULL, 20251218, 20251205, 1781938271),
(80, 'test', 'yes', NULL, NULL, NULL, NULL, 'NSE2', '3,1', NULL, NULL, NULL, 1781946475);

-- --------------------------------------------------------

--
-- Table structure for table `symbol_sector_link`
--

DROP TABLE IF EXISTS `symbol_sector_link`;
CREATE TABLE IF NOT EXISTS `symbol_sector_link` (
  `id` int NOT NULL AUTO_INCREMENT,
  `symbol` int NOT NULL,
  `sector` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `symbol_sector_link`
--

INSERT INTO `symbol_sector_link` (`id`, `symbol`, `sector`) VALUES
(6, 73, 2),
(5, 73, 1),
(18, 80, 4),
(17, 80, 1),
(19, 7, 3),
(20, 7, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
CREATE TABLE IF NOT EXISTS `tags` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tag` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `tag`) VALUES
(1, 'Nifty'),
(2, 'Large cap'),
(3, 'ELSS'),
(4, 'FPI');

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

DROP TABLE IF EXISTS `uploads`;
CREATE TABLE IF NOT EXISTS `uploads` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `title` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `brief` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `module` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `module_id` int DEFAULT NULL,
  `type` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `size` int DEFAULT NULL,
  `thumb` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `small` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `auth_user` int DEFAULT NULL,
  `updated` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `uploads`
--

INSERT INTO `uploads` (`id`, `name`, `title`, `brief`, `module`, `module_id`, `type`, `size`, `thumb`, `small`, `auth_user`, `updated`) VALUES
(2, 'uploads/872900647-2.png', NULL, NULL, NULL, NULL, 'image/png', 30028, 'uploads/872900647-thumb-2.png', 'uploads/872900647-small-2.png', 1, 1782113633),
(3, 'uploads/1649863808-2.png', NULL, NULL, NULL, NULL, 'image/png', 30028, 'uploads/1649863808-thumb-2.png', 'uploads/1649863808-small-2.png', 1, 1782113651),
(4, 'uploads/2011104342-2.png', NULL, NULL, NULL, NULL, 'image/png', 30028, 'uploads/2011104342-thumb-2.png', 'uploads/2011104342-small-2.png', 1, 1782113781),
(5, 'uploads/376290803-3.png', NULL, NULL, NULL, NULL, 'image/png', 59487, 'uploads/376290803-thumb-3.png', 'uploads/376290803-small-3.png', 1, 1782114935),
(6, 'uploads/908182907-4.png', NULL, NULL, NULL, NULL, 'image/png', 69397, 'uploads/908182907-thumb-4.png', 'uploads/908182907-small-4.png', 1, 1782116290),
(7, 'uploads/1707818140-4.png', NULL, NULL, NULL, NULL, 'image/png', 69397, 'uploads/1707818140-thumb-4.png', 'uploads/1707818140-small-4.png', 1, 1782128377),
(8, 'uploads/411351571-12.png', NULL, NULL, NULL, NULL, 'image/png', 26780, 'uploads/411351571-thumb-12.png', 'uploads/411351571-small-12.png', 1, 1782128393),
(9, 'uploads/712457619-7.png', NULL, NULL, NULL, NULL, 'image/png', 34034, 'uploads/712457619-thumb-7.png', 'uploads/712457619-small-7.png', 1, 1782130941),
(10, 'uploads/1815562786-7.png', NULL, NULL, NULL, NULL, 'image/png', 34034, 'uploads/1815562786-thumb-7.png', 'uploads/1815562786-small-7.png', 1, 1782130972),
(11, 'uploads/1620306270-3.png', NULL, NULL, NULL, NULL, 'image/png', 59487, 'uploads/1620306270-thumb-3.png', 'uploads/1620306270-small-3.png', 1, 1782132065),
(12, 'uploads/1381100136-3.png', NULL, NULL, NULL, NULL, 'image/png', 59487, 'uploads/1381100136-thumb-3.png', 'uploads/1381100136-small-3.png', 1, 1782132815),
(13, 'uploads/1892644299-3.png', NULL, NULL, NULL, NULL, 'image/png', 59487, 'uploads/1892644299-thumb-3.png', 'uploads/1892644299-small-3.png', 1, 1782132847),
(14, 'uploads/278105047-3.png', NULL, NULL, NULL, NULL, 'image/png', 59487, 'uploads/278105047-thumb-3.png', 'uploads/278105047-small-3.png', 1, 1782132872),
(15, 'uploads/1992663147-4.png', NULL, NULL, NULL, NULL, 'image/png', 69397, 'uploads/1992663147-thumb-4.png', 'uploads/1992663147-small-4.png', 1, 1782133007),
(16, 'uploads/1181413689-12.png', NULL, NULL, NULL, NULL, 'image/png', 26780, 'uploads/1181413689-thumb-12.png', 'uploads/1181413689-small-12.png', 1, 1782133023);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(75) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `password` varchar(32) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `active` varchar(3) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `name` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `image` int DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `phone` varchar(100) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `aadhaar` varchar(12) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb3_unicode_ci,
  `user_roles` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `department` varchar(50) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `usertype` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `created_on` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `updated` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `active`, `name`, `image`, `email`, `phone`, `aadhaar`, `address`, `user_roles`, `department`, `usertype`, `created_on`, `updated`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'yes', 'Admin', NULL, 'jay290489@gmail.com', NULL, NULL, NULL, '6', NULL, 'admin', '', 0),
(2, '', '', 'yes', 'Jay13', 5, 'jbsofts.net@gmail.com', NULL, NULL, NULL, '6', NULL, '', '', 1782114961),
(4, '', '', 'yes', 'John', 6, 'jay290489@gmail.com', '3334343444,\r\n5353535345345', '333344445555', 'A /2 / 102, Labh Exotica\r\nRadiyatba Road, Gotri Road,', '6', 'Sales', '', '', 1782118388);

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

DROP TABLE IF EXISTS `user_roles`;
CREATE TABLE IF NOT EXISTS `user_roles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_role` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `updated` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`id`, `user_role`, `updated`) VALUES
(6, 'Developer', 1782126673);

-- --------------------------------------------------------

--
-- Table structure for table `user_role_permission_link`
--

DROP TABLE IF EXISTS `user_role_permission_link`;
CREATE TABLE IF NOT EXISTS `user_role_permission_link` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_role` int NOT NULL,
  `permission` varchar(100) COLLATE utf8mb3_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=83 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `user_role_permission_link`
--

INSERT INTO `user_role_permission_link` (`id`, `user_role`, `permission`) VALUES
(34, 5, 'users-read'),
(33, 5, 'symbols-delete'),
(32, 5, 'symbols-create'),
(31, 5, 'symbols-update'),
(79, 6, 'customers-read'),
(23, 4, 'user_roles-delete'),
(22, 4, 'user_roles-update'),
(21, 4, 'users-create'),
(20, 4, 'symbols-read'),
(78, 6, 'user_roles-delete'),
(77, 6, 'user_roles-create'),
(76, 6, 'user_roles-update'),
(75, 6, 'user_roles-read'),
(74, 6, 'users-delete'),
(73, 6, 'users-create'),
(72, 6, 'users-update'),
(71, 6, 'users-read'),
(70, 6, 'symbols-delete'),
(69, 6, 'symbols-create'),
(68, 6, 'symbols-update'),
(67, 6, 'symbols-read'),
(80, 6, 'customers-update'),
(81, 6, 'customers-create'),
(82, 6, 'customers-delete');

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

DROP TABLE IF EXISTS `vendors`;
CREATE TABLE IF NOT EXISTS `vendors` (
  `id` int NOT NULL AUTO_INCREMENT,
  `firm_name` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `firm_email` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `firm_phone` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `firm_address` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `image` int DEFAULT NULL,
  `owner_name` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `owner_email` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `owner_phone` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `pan` varchar(15) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `gst` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `category` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `payment_term` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `active` varchar(5) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `updated` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `firm_name`, `firm_email`, `firm_phone`, `firm_address`, `image`, `owner_name`, `owner_email`, `owner_phone`, `pan`, `gst`, `category`, `payment_term`, `active`, `updated`) VALUES
(5, 'c', 'e', '33333,\r\n444', 'aa  aa', 7, 'on', 'oe', '6666,\r\n55555,', 'Ahd', 'axip333232', 'packing_material', '90', 'yes', 1782131053),
(6, 'a', '', '', '', 8, 'dd', '', '', '', '', 'machine_tools', '', 'yes', 1782131060),
(7, 'vvv1', 'jay290489@gmail.com', '33434,4342,', 'a2 2020', 10, 'ownn', 'enem.com', '3434324242,\r\n23423423432', 'yyyyyyyyyy', 'axip333232', 'raw_material', '30 days', 'no', 1782131942),
(8, 'MS ', '', '', '', 11, 'on', '', '', '', '', 'packing_material', '', 'yes', 1782132065);

-- --------------------------------------------------------

--
-- Table structure for table `vendor_raw_material_link`
--

DROP TABLE IF EXISTS `vendor_raw_material_link`;
CREATE TABLE IF NOT EXISTS `vendor_raw_material_link` (
  `id` int NOT NULL AUTO_INCREMENT,
  `vendor` int NOT NULL,
  `raw_material` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `vendor_raw_material_link`
--

INSERT INTO `vendor_raw_material_link` (`id`, `vendor`, `raw_material`) VALUES
(6, 73, 2),
(5, 73, 1),
(18, 80, 4),
(17, 80, 1),
(22, 7, 6),
(21, 7, 9),
(23, 8, 7),
(24, 8, 9);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
