-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 20, 2026 at 12:44 PM
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
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `ipadd`
--

INSERT INTO `ipadd` (`id`, `ip`, `mac`, `userId`, `logged_on`, `loggedout_on`, `sessionid`, `accounttype`) VALUES
(25, '::1', '', 1, '2026-06-20 11:45:48', '2026-06-20 12:17:33', 'f3ln87nbgi9iae5pt5o4qe800m', ''),
(26, '::1', '', 1, '2026-06-20 12:17:37', '', 'f3ln87nbgi9iae5pt5o4qe800m', '');

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
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `symbol_sector_link`
--

INSERT INTO `symbol_sector_link` (`id`, `symbol`, `sector`) VALUES
(6, 73, 2),
(5, 73, 1),
(18, 80, 4),
(17, 80, 1);

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
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(75) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `password` varchar(32) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `active` varchar(3) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `name` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `image` varchar(200) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
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
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `active`, `name`, `image`, `email`, `phone`, `aadhaar`, `address`, `user_roles`, `department`, `usertype`, `created_on`, `updated`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'yes', 'Admin', NULL, 'jay290489@gmail.com', NULL, NULL, NULL, NULL, NULL, 'admin', '', 0),
(2, '', '', 'yes', 'Jay', NULL, 'jbsofts.net@gmail.com', NULL, NULL, NULL, '6', NULL, '', '', 1781959372);

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
(6, 'Developer', 1781959388);

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
) ENGINE=MyISAM AUTO_INCREMENT=67 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `user_role_permission_link`
--

INSERT INTO `user_role_permission_link` (`id`, `user_role`, `permission`) VALUES
(34, 5, 'users-read'),
(33, 5, 'symbols-delete'),
(32, 5, 'symbols-create'),
(31, 5, 'symbols-update'),
(30, 5, 'index'),
(23, 4, 'user_roles-delete'),
(22, 4, 'user_roles-update'),
(21, 4, 'users-create'),
(20, 4, 'symbols-read'),
(19, 4, 'index'),
(64, 6, 'user_roles-update'),
(63, 6, 'user_roles-read'),
(62, 6, 'users-delete'),
(61, 6, 'users-create'),
(60, 6, 'users-update'),
(59, 6, 'users-read'),
(58, 6, 'symbols-delete'),
(57, 6, 'symbols-create'),
(56, 6, 'symbols-update'),
(55, 6, 'symbols-read'),
(54, 6, 'index'),
(65, 6, 'user_roles-create'),
(66, 6, 'user_roles-delete');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
