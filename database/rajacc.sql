-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 04, 2026 at 08:54 AM
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
-- Table structure for table `attributes`
--

DROP TABLE IF EXISTS `attributes`;
CREATE TABLE IF NOT EXISTS `attributes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `attribute` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `active` varchar(5) DEFAULT NULL,
  `code` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `category` varchar(200) NOT NULL,
  `color` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `auth_user` int NOT NULL,
  `updated` int DEFAULT NULL,
  `created` varchar(35) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `attributes`
--

INSERT INTO `attributes` (`id`, `attribute`, `active`, `code`, `category`, `color`, `auth_user`, `updated`, `created`) VALUES
(2, 'Whole Seller', 'yes', 'whole_seller', 'customer_category', NULL, 0, 1782196049, '0'),
(3, 'Bulk Buyer', 'yes', 'bulk_buyer', 'customer_category', NULL, 0, 1782196049, '0'),
(4, 'Auto rickshaw Dealer', 'yes', 'auto_rickshaw_dealer', 'customer_category', NULL, 0, 1782196049, '0'),
(5, 'Expoter', 'yes', 'exporter', 'customer_category', NULL, 0, 1782196049, '0'),
(6, 'Retailer', 'yes', 'retailer', 'customer_category', NULL, 0, 1782196049, '0'),
(7, 'Raw Material', 'yes', 'raw_material', 'vendor_category', NULL, 0, 1782196049, '0'),
(8, 'Packing Material', 'yes', 'packing_material', 'vendor_category', NULL, 0, 1782196049, '0'),
(9, 'Consumables', 'yes', 'consumables', 'vendor_category', NULL, 0, 1782196049, '0'),
(10, 'Machine & Tools', 'yes', 'machine_tools', 'vendor_category', NULL, 0, 1782196049, '0'),
(11, 'Service Provider', 'yes', 'service_provider', 'vendor_category', NULL, 0, 1782196049, '0'),
(12, 'M.S Pipes', 'yes', 'ms_pipes', 'raw_material_category', NULL, 0, 1782196049, '0'),
(13, 'S.S Pipes', 'yes', 'ss_pipes', 'raw_material_category', NULL, 0, 1782196049, '0'),
(14, 'Patti', 'yes', 'patti', 'raw_material_category', NULL, 0, 1782196049, '0'),
(15, 'Sheets', 'yes', 'sheets', 'raw_material_category', NULL, 0, 1782196049, '0'),
(16, 'Angles', 'yes', 'angles', 'raw_material_category', NULL, 0, 1782196049, '0'),
(17, 'Saliyas', 'yes', 'saliyas', 'raw_material_category', NULL, 0, 1782196049, '0'),
(18, 'C Channel', 'yes', 'c_channel', 'raw_material_category', NULL, 0, 1782196049, '0'),
(19, 'Other Items', 'yes', 'other_items', 'raw_material_category', NULL, 0, 1782196049, '0'),
(20, 'Gas', 'yes', 'gas', 'raw_material_category', NULL, 0, 1782196049, '0'),
(21, 'Welding Rolls', 'yes', 'welding_rolls', 'raw_material_category', NULL, 0, 1782196049, '0'),
(22, 'Weilding Rods', 'yes', 'welding_rods', 'raw_material_category', NULL, 0, 1782196049, '0'),
(23, 'Pipe Items', 'yes', 'pipes', 'product_category', NULL, 0, 1782196049, '0'),
(24, 'Patra Items', 'yes', 'patra', 'product_category', NULL, 0, 1782196049, '0'),
(25, 'Channel Items', 'yes', 'channel', 'product_category', NULL, 0, 1782196049, '0'),
(26, 'Angle Items', 'yes', 'angle', 'product_category', NULL, 1, 1782972720, '0'),
(27, 'Saliya Items', 'yes', 'saliya', 'product_category', NULL, 0, 1782196049, '0'),
(28, 'SS Saliya Items', 'yes', 'ss_saliya', 'product_category', NULL, 0, 1782196049, '0'),
(29, 'SS Pipes', 'yes', 'ss_pipes', 'product_category', NULL, 0, 1782202749, '0'),
(30, 'MS', 'yes', 'ms', 'product_quality', NULL, 0, 1782196049, '0'),
(31, 'SS', 'yes', 'ss', 'product_quality', NULL, 0, 1782209476, '0'),
(48, 'Vendor Invoice', 'yes', NULL, 'document_type', NULL, 1, 1782734571, '1782734571_1'),
(49, 'Goods receipt note (GRN)', 'yes', NULL, 'document_type', NULL, 1, 1782734612, '1782734612_1'),
(50, 'Delivery Challan', 'yes', NULL, 'document_type', NULL, 1, 1782734626, '1782734626_1'),
(51, 'Eway Bill', 'yes', NULL, 'document_type', NULL, 1, 1782734648, '1782734648_1'),
(52, 'Purchase docs', 'yes', NULL, 'folder_category', NULL, 1, 1782814369, '1782814369_1');

-- --------------------------------------------------------

--
-- Table structure for table `column_history`
--

DROP TABLE IF EXISTS `column_history`;
CREATE TABLE IF NOT EXISTS `column_history` (
  `id` int NOT NULL AUTO_INCREMENT,
  `table_name` varchar(150) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `row_id` int DEFAULT NULL,
  `column_name` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `value` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `auth_user` int DEFAULT NULL,
  `updated` int DEFAULT NULL,
  `created` varchar(35) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=229 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `column_history`
--

INSERT INTO `column_history` (`id`, `table_name`, `row_id`, `column_name`, `value`, `auth_user`, `updated`, `created`) VALUES
(1, 'raw_material_lots', 6, 'status', 'received', 1, 1782296488, '0'),
(2, 'raw_material_lots', 6, 'quantity', '33331', 1, 1782296488, '0'),
(3, 'raw_material_lots', 6, 'status', 'received', 1, 1782296511, '0'),
(4, 'raw_material_lots', 6, 'quantity', '33331', 1, 1782296511, '0'),
(5, 'raw_material_lots', 6, 'status', 'under_process', 1, 1782296544, '0'),
(6, 'raw_material_lots', 6, 'status', 'received', 1, 1782296557, '0'),
(7, 'raw_material_lots', 3, 'status', 'received', 1, 1782301473, '0'),
(8, 'raw_material_lots', 3, 'status', 'under_process', 1, 1782301488, '0'),
(9, 'raw_material_lots', 3, 'status', 'ready', 1, 1782301549, '0'),
(10, 'product_lots', 6, 'status', 'order_placed', 1, 1782303320, '0'),
(11, 'product_lots', 6, 'status', 'received', 1, 1782303722, '0'),
(12, 'product_lots', 6, 'status', 'under_process', 1, 1782303751, '0'),
(13, 'product_lots', 6, 'status', 'ready', 1, 1782303754, '0'),
(14, 'product_lots', 0, 'status', 'received', 1, 1782303873, '0'),
(15, 'product_lots', 7, 'status', 'under_process', 1, 1782303923, '0'),
(16, 'product_lots', 8, 'status', 'order_placed', 1, 1782304076, '0'),
(17, 'product_lots', 9, 'status', 'under_process', 1, 1782304127, '0'),
(18, 'product_lots', 10, 'status', 'new', 1, 1782306903, '0'),
(19, 'product_lots', 11, 'status', 'order_placed', 1, 1782307050, '0'),
(20, 'product_lots', 11, 'status', 'received', 1, 1782307595, '0'),
(21, 'purchases', 7, 'status', 'draft', 1, 1782389921, '1782389921'),
(22, 'purchases', 8, 'status', 'fully_received', 1, 1782389982, '1782389982'),
(23, 'purchases', 7, 'status', 'order_placed', 1, 1782391476, '1782391476'),
(24, 'purchases', 7, 'payment_status', 'on_hold', 1, 1782391476, '1782391476'),
(25, 'purchases', 20, 'status', 'draft', 1, 1782722621, '1782722621'),
(26, 'purchases', 20, 'payment_status', 'fully_paid', 1, 1782722621, '1782722621'),
(27, 'product_lots', 12, 'status', 'order_placed', 1, 1782810960, '1782810960'),
(28, 'product_lots', 12, 'status', 'ready', 1, 1782811007, '1782811007'),
(29, 'product_lots', 13, 'status', 'production_complete', 1, 1782811112, '1782811112'),
(30, 'orders', 7, 'status', 'order_placed', 1, 1782890964, '1782890964'),
(31, 'orders', 7, 'payment_status', 'pending', 1, 1782890964, '1782890964'),
(32, 'orders', 7, 'payment_status', 'on_hold', 1, 1782891299, '1782891299'),
(33, 'orders', 7, 'status', 'order_confirmed', 1, 1782891948, '1782891948'),
(34, 'orders', 7, 'status', 'order_placed', 1, 1782903748, '1782903748'),
(35, 'orders', 7, 'status', 'partially_dispatch', 1, 1782903758, '1782903758'),
(36, 'orders', 8, 'status', 'order_placed', 1, 1782903859, '1782903859'),
(37, 'orders', 8, 'payment_status', 'pending', 1, 1782903859, '1782903859'),
(38, 'orders', 7, 'status', 'partially_dispatched', 1, 1782904107, '1782904107'),
(39, 'orders', 9, 'status', 'order_confirmed', 1, 1782909361, '1782909361'),
(40, 'orders', 9, 'payment_status', 'on_hold', 1, 1782909361, '1782909361'),
(41, 'order_items', 15, 'rate', '100', 1, 1782973101, '1782973101'),
(42, 'order_items', 15, 'quantity', '10', 1, 1782973101, '1782973101'),
(43, 'order_items', 15, 'rate', '101', 1, 1782973165, '1782973165'),
(44, 'order_items', 11, 'rate', '20', 1, 1782974270, '1782974270'),
(45, 'order_items', 11, 'quantity', '101', 1, 1782974747, '1782974747'),
(46, 'order_items', 11, 'quantity', '102', 1, 1782974760, '1782974760'),
(47, 'order_items', 11, 'rate', '21', 1, 1782974773, '1782974773'),
(48, 'order_items', 21, 'rate', '21', 1, 1782974973, '1782974973'),
(49, 'order_items', 30, 'rate', '11', 1, 1782976378, '1782976378'),
(50, 'order_items', 30, 'quantity', '111', 1, 1782976378, '1782976378'),
(51, 'order_items', 31, 'rate', '1', 1, 1782976471, '1782976471'),
(52, 'order_items', 31, 'quantity', '111', 1, 1782976471, '1782976471'),
(53, 'order_items', 32, 'rate', '2', 1, 1782976471, '1782976471'),
(54, 'order_items', 32, 'quantity', '222', 1, 1782976471, '1782976471'),
(55, 'order_items', 33, 'rate', '3', 1, 1782976471, '1782976471'),
(56, 'order_items', 33, 'quantity', '333', 1, 1782976471, '1782976471'),
(57, 'order_items', 33, 'rate', '6', 1, 1782976693, '1782976693'),
(58, 'order_items', 33, 'quantity', '336', 1, 1782976693, '1782976693'),
(59, 'order_items', 33, 'rate', '6', 1, 1782976710, '1782976710'),
(60, 'order_items', 33, 'quantity', '336', 1, 1782976710, '1782976710'),
(61, 'order_items', 33, 'rate', '10', 1, 1782976723, '1782976723'),
(62, 'order_items', 33, 'quantity', '400', 1, 1782976723, '1782976723'),
(63, 'order_items', 34, 'rate', '200', 1, 1782977033, '1782977033'),
(64, 'order_items', 34, 'quantity', '20', 1, 1782977033, '1782977033'),
(65, 'order_items', 35, 'rate', '500', 1, 1782977108, '1782977108'),
(66, 'order_items', 35, 'quantity', '5', 1, 1782977108, '1782977108'),
(67, 'order_items', 36, 'rate', '111', 1, 1782977901, '1782977901'),
(68, 'order_items', 36, 'quantity', '1', 1, 1782977901, '1782977901'),
(69, 'dispatch_orders', 10, 'status', 'new', 1, 1782980506, '1782980506'),
(70, 'dispatch_orders', 10, 'status', 'ready_for_dispatch', 1, 1782980804, '1782980804'),
(71, 'dispatch_orders', 10, 'status', 'dispatched', 1, 1782980832, '1782980832'),
(72, 'dispatch_orders', 10, 'status', 'cancelled', 1, 1782980850, '1782980850'),
(73, 'dispatch_orders', 10, 'status', 'new', 1, 1782980855, '1782980855'),
(74, 'dispatch_orders', 11, 'status', 'new', 1, 1782980902, '1782980902'),
(75, 'dispatch_orders', 12, 'status', 'ready_for_dispatch', 1, 1782980913, '1782980913'),
(76, 'dispatchs', 13, 'status', 'new', 1, 1782981439, '1782981439'),
(77, 'product_lots', 14, 'status', 'ready', 1, 1782984941, '1782984941'),
(78, 'product_lots', 15, 'status', 'ready', 1, 1782984999, '1782984999'),
(79, 'product_lots', 16, 'status', 'ready', 1, 1782985060, '1782985060'),
(80, 'product_lots', 17, 'status', 'ready', 1, 1782985096, '1782985096'),
(81, 'product_lots', 18, 'status', 'ready', 1, 1782985194, '1782985194'),
(82, 'purchases', 21, 'status', 'order_placed', 1, 1782985343, '1782985343'),
(83, 'purchases', 21, 'payment_status', 'pending', 1, 1782985343, '1782985343'),
(84, 'purchases', 21, 'status', 'fully_received', 1, 1782985406, '1782985406'),
(85, 'orders', 10, 'status', 'order_placed', 1, 1782985519, '1782985519'),
(86, 'orders', 10, 'payment_status', 'pending', 1, 1782985519, '1782985519'),
(87, 'order_items', 37, 'rate', '50', 1, 1782985568, '1782985568'),
(88, 'order_items', 37, 'quantity', '500', 1, 1782985568, '1782985568'),
(89, 'order_items', 38, 'rate', '150', 1, 1782985568, '1782985568'),
(90, 'order_items', 38, 'quantity', '200', 1, 1782985568, '1782985568'),
(91, 'order_items', 39, 'rate', '30', 1, 1782985568, '1782985568'),
(92, 'order_items', 39, 'quantity', '100', 1, 1782985568, '1782985568'),
(93, 'orders', 10, 'status', 'order_confirmed', 1, 1782985656, '1782985656'),
(94, 'dispatchs', 14, 'status', 'new', 1, 1782985688, '1782985688'),
(95, 'order_items', 40, 'rate', '50', 1, 1782986545, '1782986545'),
(96, 'order_items', 40, 'quantity', '100', 1, 1782986545, '1782986545'),
(97, 'dispatch_items', 41, 'reserve_quantity', '100', 1, 1782994674, '1782994674'),
(98, 'dispatch_items', 42, 'reserve_quantity', '50', 1, 1782994674, '1782994674'),
(99, 'dispatch_items', 43, 'reserve_quantity', '40', 1, 1782994674, '1782994674'),
(100, 'dispatch_items', 44, 'reserve_quantity', '30', 1, 1782994674, '1782994674'),
(101, 'dispatch_items', 45, 'reserve_quantity', '20', 1, 1782994674, '1782994674'),
(102, 'dispatch_items', 46, 'reserve_quantity', '100', 1, 1782994741, '1782994741'),
(103, 'dispatch_items', 47, 'reserve_quantity', '80', 1, 1782994741, '1782994741'),
(104, 'dispatch_items', 48, 'reserve_quantity', '60', 1, 1782994741, '1782994741'),
(105, 'dispatch_items', 49, 'reserve_quantity', '40', 1, 1782994741, '1782994741'),
(106, 'dispatch_items', 50, 'reserve_quantity', '20', 1, 1782994741, '1782994741'),
(107, 'dispatch_items', 51, 'reserve_quantity', '1', 1, 1782994954, '1782994954'),
(108, 'dispatch_items', 52, 'reserve_quantity', '2', 1, 1782994954, '1782994954'),
(109, 'dispatch_items', 53, 'reserve_quantity', '3', 1, 1782994954, '1782994954'),
(110, 'dispatch_items', 54, 'reserve_quantity', '4', 1, 1782994954, '1782994954'),
(111, 'dispatch_items', 55, 'reserve_quantity', '5', 1, 1782994954, '1782994954'),
(112, 'dispatch_items', 56, 'reserve_quantity', '1', 1, 1782995012, '1782995012'),
(113, 'dispatch_items', 57, 'reserve_quantity', '2', 1, 1782995012, '1782995012'),
(114, 'dispatch_items', 58, 'reserve_quantity', '3', 1, 1782995012, '1782995012'),
(115, 'dispatch_items', 59, 'reserve_quantity', '4', 1, 1782995012, '1782995012'),
(116, 'dispatch_items', 60, 'reserve_quantity', '5', 1, 1782995012, '1782995012'),
(117, 'dispatch_items', 61, 'reserve_quantity', '1', 1, 1782995033, '1782995033'),
(118, 'dispatch_items', 62, 'reserve_quantity', '2', 1, 1782995033, '1782995033'),
(119, 'dispatch_items', 63, 'reserve_quantity', '3', 1, 1782995033, '1782995033'),
(120, 'dispatch_items', 64, 'reserve_quantity', '4', 1, 1782995033, '1782995033'),
(121, 'dispatch_items', 65, 'reserve_quantity', '5', 1, 1782995033, '1782995033'),
(122, 'dispatch_items', 66, 'reserve_quantity', '100', 1, 1782995475, '1782995475'),
(123, 'dispatch_items', 67, 'reserve_quantity', '200', 1, 1782995475, '1782995475'),
(124, 'dispatch_items', 68, 'reserve_quantity', '300', 1, 1782995475, '1782995475'),
(125, 'dispatch_items', 69, 'reserve_quantity', '400', 1, 1782995475, '1782995475'),
(126, 'dispatch_items', 70, 'reserve_quantity', '500', 1, 1782995475, '1782995475'),
(127, 'dispatch_items', 79, 'reserve_quantity', '11', 1, 1783004036, '1783004036'),
(128, 'dispatch_items', 80, 'reserve_quantity', '22', 1, 1783004036, '1783004036'),
(129, 'dispatch_items', 81, 'reserve_quantity', '33', 1, 1783004036, '1783004036'),
(130, 'dispatch_items', 82, 'reserve_quantity', '44', 1, 1783004036, '1783004036'),
(131, 'dispatch_items', 83, 'reserve_quantity', '55', 1, 1783004036, '1783004036'),
(132, 'dispatch_items', 84, 'reserve_quantity', '136', 1, 1783004925, '1783004925'),
(133, 'dispatch_items', 85, 'reserve_quantity', '58', 1, 1783004925, '1783004925'),
(134, 'dispatch_items', 86, 'reserve_quantity', '67', 1, 1783004925, '1783004925'),
(135, 'dispatch_items', 87, 'reserve_quantity', '56', 1, 1783004925, '1783004925'),
(136, 'dispatch_items', 88, 'reserve_quantity', '45', 1, 1783004925, '1783004925'),
(137, 'dispatch_items', 89, 'reserve_quantity', '42', 1, 1783004994, '1783004994'),
(138, 'dispatch_items', 90, 'reserve_quantity', '30', 1, 1783006295, '1783006295'),
(139, 'dispatch_items', 91, 'reserve_quantity', '34', 1, 1783006295, '1783006295'),
(140, 'dispatch_items', 92, 'reserve_quantity', '150', 1, 1783006445, '1783006445'),
(141, 'dispatch_items', 93, 'reserve_quantity', '66', 1, 1783006445, '1783006445'),
(142, 'dispatch_items', 94, 'reserve_quantity', '17', 1, 1783006445, '1783006445'),
(143, 'dispatch_items', 95, 'reserve_quantity', '10', 1, 1783006445, '1783006445'),
(144, 'dispatch_items', 96, 'reserve_quantity', '15', 1, 1783006445, '1783006445'),
(145, 'dispatch_items', 97, 'quantity', '33', 1, 1783061253, '1783061253'),
(146, 'dispatch_items', 98, 'quantity', '22', 1, 1783061253, '1783061253'),
(147, 'dispatch_items', 99, 'quantity', '83', 1, 1783061253, '1783061253'),
(148, 'dispatch_items', 100, 'quantity', '90', 1, 1783061253, '1783061253'),
(149, 'dispatch_items', 101, 'quantity', '85', 1, 1783061253, '1783061253'),
(150, 'dispatch_items', 102, 'quantity', '33', 1, 1783061388, '1783061388'),
(151, 'order_items', 41, 'rate', '50', 1, 1783061563, '1783061563'),
(152, 'order_items', 41, 'quantity', '10', 1, 1783061563, '1783061563'),
(153, 'order_items', 42, 'rate', '200', 1, 1783061563, '1783061563'),
(154, 'order_items', 42, 'quantity', '10', 1, 1783061563, '1783061563'),
(155, 'order_items', 43, 'rate', '150', 1, 1783061563, '1783061563'),
(156, 'order_items', 43, 'quantity', '10', 1, 1783061563, '1783061563'),
(157, 'order_items', 44, 'rate', '50', 1, 1783061910, '1783061910'),
(158, 'order_items', 44, 'quantity', '20', 1, 1783061910, '1783061910'),
(159, 'order_items', 45, 'rate', '200', 1, 1783061910, '1783061910'),
(160, 'order_items', 45, 'quantity', '20', 1, 1783061910, '1783061910'),
(161, 'order_items', 46, 'rate', '150', 1, 1783061910, '1783061910'),
(162, 'order_items', 46, 'quantity', '20', 1, 1783061910, '1783061910'),
(163, 'dispatch_items', 103, 'quantity', '40', 1, 1783062016, '1783062016'),
(164, 'dispatch_items', 104, 'quantity', '35', 1, 1783062016, '1783062016'),
(165, 'dispatch_items', 105, 'quantity', '4', 1, 1783062016, '1783062016'),
(166, 'dispatch_items', 106, 'quantity', '3', 1, 1783062016, '1783062016'),
(167, 'dispatch_items', 107, 'quantity', '5', 1, 1783062016, '1783062016'),
(168, 'dispatchs', 14, 'status', 'ready_for_dispatch', 1, 1783070665, '1783070665'),
(169, 'dispatchs', 14, 'status', 'ready_for_dispatch', 1, 1783070882, '1783070882'),
(170, 'invoices', 15, 'status', 'draft', 1, 1783078688, '1783078688'),
(171, 'dispatchs', 14, 'status', 'ready_for_dispatch', 1, 1783079321, '1783079321'),
(172, 'invoice_items', 108, 'quantity', '130', 1, 1783081754, '1783081754'),
(173, 'invoice_items', 108, 'rate', '100', 1, 1783081754, '1783081754'),
(174, 'invoice_items', 109, 'quantity', '177', 1, 1783081754, '1783081754'),
(175, 'invoice_items', 109, 'rate', '200', 1, 1783081754, '1783081754'),
(176, 'invoice_items', 110, 'quantity', '90', 1, 1783081754, '1783081754'),
(177, 'invoice_items', 110, 'rate', '300', 1, 1783081754, '1783081754'),
(178, 'invoice_items', 111, 'quantity', '130', 1, 1783081910, '1783081910'),
(179, 'invoice_items', 111, 'rate', '100', 1, 1783081910, '1783081910'),
(180, 'invoice_items', 112, 'quantity', '177', 1, 1783081910, '1783081910'),
(181, 'invoice_items', 112, 'rate', '200', 1, 1783081910, '1783081910'),
(182, 'invoice_items', 113, 'quantity', '90', 1, 1783081910, '1783081910'),
(183, 'invoice_items', 113, 'rate', '300', 1, 1783081910, '1783081910'),
(184, 'invoice_items', 108, 'rate', '101', 1, 1783091478, '1783091478'),
(185, 'invoice_items', 109, 'rate', '201', 1, 1783091478, '1783091478'),
(186, 'invoice_items', 110, 'rate', '301', 1, 1783091478, '1783091478'),
(187, 'invoice_items', 108, 'rate', '103', 1, 1783092129, '1783092129'),
(188, 'invoice_items', 109, 'rate', '203', 1, 1783092129, '1783092129'),
(189, 'invoice_items', 110, 'rate', '303', 1, 1783092129, '1783092129'),
(190, 'invoice_items', 114, 'rate', '100', 1, 1783150212, '1783150212'),
(191, 'invoice_items', 115, 'rate', '200', 1, 1783150212, '1783150212'),
(192, 'invoice_items', 116, 'rate', '300', 1, 1783150212, '1783150212'),
(193, 'dispatchs', 14, 'status', 'packed_and_ready', 1, 1783150635, '1783150635'),
(194, 'invoice_items', 117, 'rate', '100', 1, 1783150681, '1783150681'),
(195, 'invoice_items', 118, 'rate', '200', 1, 1783150681, '1783150681'),
(196, 'invoice_items', 119, 'rate', '300', 1, 1783150681, '1783150681'),
(197, 'invoice_items', 120, 'rate', '100', 1, 1783150735, '1783150735'),
(198, 'invoice_items', 121, 'rate', '200', 1, 1783150735, '1783150735'),
(199, 'invoice_items', 122, 'rate', '300', 1, 1783150735, '1783150735'),
(200, 'dispatchs', 14, 'status', 'packed_and_ready', 1, 1783151162, '1783151162'),
(201, 'invoice_items', 123, 'rate', '100', 1, 1783151189, '1783151189'),
(202, 'invoice_items', 124, 'rate', '200', 1, 1783151189, '1783151189'),
(203, 'invoice_items', 125, 'rate', '300', 1, 1783151189, '1783151189'),
(204, 'dispatchs', 14, 'status', 'invoice_generated', 1, 1783151189, '1783151189'),
(205, 'dispatchs', 14, 'status', 'new', 1, 1783151263, '1783151263'),
(206, 'invoice_items', 126, 'rate', '100', 1, 1783151288, '1783151288'),
(207, 'invoice_items', 127, 'rate', '200', 1, 1783151288, '1783151288'),
(208, 'invoice_items', 128, 'rate', '300', 1, 1783151288, '1783151288'),
(209, 'dispatchs', 14, 'status', 'invoice_generated', 1, 1783151288, '1783151288'),
(210, 'dispatchs', 14, 'status', 'packed_and_ready', 1, 1783152008, '1783152008'),
(211, 'invoice_items', 129, 'rate', '100', 1, 1783152046, '1783152046'),
(212, 'invoice_items', 130, 'rate', '200', 1, 1783152046, '1783152046'),
(213, 'invoice_items', 131, 'rate', '300', 1, 1783152046, '1783152046'),
(214, 'dispatchs', 14, 'status', 'invoice_generated', 1, 1783152046, '1783152046'),
(215, 'invoices', 15, 'status', 'generated', 1, 1783152046, '1783152046'),
(216, 'invoice_items', 132, 'rate', '10', 1, 1783152121, '1783152121'),
(217, 'invoice_items', 133, 'rate', '20', 1, 1783152121, '1783152121'),
(218, 'invoice_items', 134, 'rate', '30', 1, 1783152121, '1783152121'),
(219, 'dispatchs', 14, 'status', 'invoice_generated', 1, 1783152121, '1783152121'),
(220, 'invoices', 15, 'status', 'generated', 1, 1783152121, '1783152121'),
(221, 'invoice_items', 132, 'rate', '11', 1, 1783152139, '1783152139'),
(222, 'invoice_items', 133, 'rate', '21', 1, 1783152139, '1783152139'),
(223, 'invoice_items', 134, 'rate', '31', 1, 1783152139, '1783152139'),
(224, 'invoice_items', 132, 'rate', '12', 1, 1783152159, '1783152159'),
(225, 'invoice_items', 133, 'rate', '22', 1, 1783152159, '1783152159'),
(226, 'invoice_items', 134, 'rate', '32', 1, 1783152159, '1783152159'),
(227, 'dispatchs', 14, 'status', 'packed_and_ready', 1, 1783153361, '1783153361'),
(228, 'dispatchs', 14, 'status', 'invoice_generated', 1, 1783153370, '1783153370');

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
  `owner_name` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `owner_email` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `owner_phone` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `zone` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `gst` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `category` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `price_allotment` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `active` varchar(5) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `auth_user` int NOT NULL,
  `updated` int DEFAULT NULL,
  `created` varchar(35) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `firm_name`, `firm_email`, `firm_phone`, `firm_address`, `image`, `owner_name`, `owner_email`, `owner_phone`, `zone`, `gst`, `category`, `price_allotment`, `active`, `auth_user`, `updated`, `created`) VALUES
(5, 'Activa', 'e', '33333,\r\n444', 'aa  aa', 7, 'on', 'oe', '6666,\r\n55555,', 'Ahd', 'axip333232', '3', '90', 'yes', 1, 1782985481, '0'),
(6, 'Ape', '', '', '', 8, 'ape owner', '', '', 'Ahd', 'axip333232', '4', '', 'yes', 1, 1782985464, '0');

-- --------------------------------------------------------

--
-- Table structure for table `dispatchs`
--

DROP TABLE IF EXISTS `dispatchs`;
CREATE TABLE IF NOT EXISTS `dispatchs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `order_id` int NOT NULL,
  `notes` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `status` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `created_on_date` int NOT NULL,
  `invoice` int NOT NULL,
  `auth_user` int NOT NULL,
  `updated` int NOT NULL,
  `created` varchar(35) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `dispatchs`
--

INSERT INTO `dispatchs` (`id`, `order_id`, `notes`, `status`, `created_on_date`, `invoice`, `auth_user`, `updated`, `created`) VALUES
(14, 10, '', 'invoice_generated', 20260702, 15, 1, 1783153370, '1782985688_1');

-- --------------------------------------------------------

--
-- Table structure for table `dispatch_items`
--

DROP TABLE IF EXISTS `dispatch_items`;
CREATE TABLE IF NOT EXISTS `dispatch_items` (
  `id` int NOT NULL AUTO_INCREMENT,
  `dispatch` int NOT NULL,
  `product` int NOT NULL,
  `quantity` decimal(10,2) NOT NULL,
  `order_id` int NOT NULL,
  `product_lot` int NOT NULL,
  `auth_user` int NOT NULL,
  `updated` int NOT NULL,
  `created` varchar(35) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=108 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `dispatch_items`
--

INSERT INTO `dispatch_items` (`id`, `dispatch`, `product`, `quantity`, `order_id`, `product_lot`, `auth_user`, `updated`, `created`) VALUES
(107, 14, 17, 5.00, 10, 18, 1, 1783062016, '1783062016_1'),
(105, 14, 16, 4.00, 10, 15, 1, 1783062016, '1783062016_1'),
(104, 14, 15, 35.00, 10, 14, 1, 1783062016, '1783062016_1'),
(103, 14, 15, 40.00, 10, 16, 1, 1783062016, '1783062016_1'),
(101, 14, 17, 85.00, 10, 18, 1, 1783061253, '1783061253_1'),
(100, 14, 16, 90.00, 10, 17, 1, 1783061253, '1783061253_1'),
(99, 14, 16, 83.00, 10, 15, 1, 1783061253, '1783061253_1'),
(98, 14, 15, 22.00, 10, 14, 1, 1783061253, '1783061253_1'),
(102, 14, 15, 33.00, 10, 16, 1, 1783061388, '1783061388_1');

-- --------------------------------------------------------

--
-- Table structure for table `folders`
--

DROP TABLE IF EXISTS `folders`;
CREATE TABLE IF NOT EXISTS `folders` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `notes` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `category` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `auth_user` int NOT NULL,
  `updated` int NOT NULL,
  `created` varchar(35) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `folders`
--

INSERT INTO `folders` (`id`, `title`, `notes`, `category`, `auth_user`, `updated`, `created`) VALUES
(21, 'Red', 'red folder', '52', 1, 1782814375, '1782813914_1');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

DROP TABLE IF EXISTS `invoices`;
CREATE TABLE IF NOT EXISTS `invoices` (
  `id` int NOT NULL AUTO_INCREMENT,
  `dispatch` int NOT NULL,
  `notes` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `status` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `created_on_date` int NOT NULL,
  `auth_user` int NOT NULL,
  `updated` int NOT NULL,
  `created` varchar(35) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `dispatch`, `notes`, `status`, `created_on_date`, `auth_user`, `updated`, `created`) VALUES
(15, 14, 'test', 'generated', 20260703, 1, 1783152121, '1783078688_1');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_items`
--

DROP TABLE IF EXISTS `invoice_items`;
CREATE TABLE IF NOT EXISTS `invoice_items` (
  `id` int NOT NULL AUTO_INCREMENT,
  `invoice` int NOT NULL,
  `dispatch` int NOT NULL,
  `product` int NOT NULL,
  `quantity` decimal(10,2) NOT NULL,
  `rate` decimal(10,2) NOT NULL,
  `order_id` int NOT NULL,
  `auth_user` int NOT NULL,
  `updated` int NOT NULL,
  `created` varchar(35) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=135 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `invoice_items`
--

INSERT INTO `invoice_items` (`id`, `invoice`, `dispatch`, `product`, `quantity`, `rate`, `order_id`, `auth_user`, `updated`, `created`) VALUES
(134, 15, 14, 17, 90.00, 32.00, 10, 1, 1783152159, '1783152121_1'),
(133, 15, 14, 16, 177.00, 22.00, 10, 1, 1783152159, '1783152121_1'),
(132, 15, 14, 15, 130.00, 12.00, 10, 1, 1783152159, '1783152121_1');

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
) ENGINE=MyISAM AUTO_INCREMENT=93 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `ipadd`
--

INSERT INTO `ipadd` (`id`, `ip`, `mac`, `userId`, `logged_on`, `loggedout_on`, `sessionid`, `accounttype`) VALUES
(48, '::1', '', 1, '2026-06-22 10:53:36', '2026-07-03 11:46:49', 'f3ln87nbgi9iae5pt5o4qe800m', ''),
(47, '::1', '', 1, '2026-06-22 10:53:32', '2026-07-03 11:46:49', 'f3ln87nbgi9iae5pt5o4qe800m', ''),
(46, '::1', '', 1, '2026-06-22 10:53:22', '2026-07-03 11:46:49', 'f3ln87nbgi9iae5pt5o4qe800m', ''),
(45, '::1', '', 1, '2026-06-22 10:52:19', '2026-07-03 11:46:49', 'f3ln87nbgi9iae5pt5o4qe800m', ''),
(44, '::1', '', 1, '2026-06-22 10:50:46', '2026-07-03 11:46:49', 'f3ln87nbgi9iae5pt5o4qe800m', ''),
(43, '::1', '', 1, '2026-06-22 10:50:37', '2026-07-03 11:46:49', 'f3ln87nbgi9iae5pt5o4qe800m', ''),
(42, '::1', '', 1, '2026-06-22 10:50:20', '2026-07-03 11:46:49', 'f3ln87nbgi9iae5pt5o4qe800m', ''),
(41, '::1', '', 1, '2026-06-22 10:50:05', '2026-07-03 11:46:49', 'f3ln87nbgi9iae5pt5o4qe800m', ''),
(40, '::1', '', 1, '2026-06-22 10:46:54', '2026-07-03 11:46:49', 'f3ln87nbgi9iae5pt5o4qe800m', ''),
(39, '::1', '', 1, '2026-06-22 10:46:51', '2026-07-03 11:46:49', 'f3ln87nbgi9iae5pt5o4qe800m', ''),
(38, '::1', '', 1, '2026-06-22 10:46:15', '2026-07-03 11:46:49', 'f3ln87nbgi9iae5pt5o4qe800m', ''),
(37, '::1', '', 1, '2026-06-22 10:45:02', '2026-07-03 11:46:49', 'f3ln87nbgi9iae5pt5o4qe800m', ''),
(36, '::1', '', 1, '2026-06-22 10:44:38', '2026-07-03 11:46:49', 'f3ln87nbgi9iae5pt5o4qe800m', ''),
(35, '::1', '', 1, '2026-06-22 10:43:53', '2026-07-03 11:46:49', 'f3ln87nbgi9iae5pt5o4qe800m', ''),
(34, '::1', '', 1, '2026-06-22 10:42:20', '2026-07-03 11:46:49', 'f3ln87nbgi9iae5pt5o4qe800m', ''),
(33, '::1', '', 1, '2026-06-22 10:41:39', '2026-07-03 11:46:49', 'f3ln87nbgi9iae5pt5o4qe800m', ''),
(32, '::1', '', 1, '2026-06-22 10:41:26', '2026-07-03 11:46:49', 'f3ln87nbgi9iae5pt5o4qe800m', ''),
(31, '::1', '', 1, '2026-06-22 10:40:16', '2026-07-03 11:46:49', 'f3ln87nbgi9iae5pt5o4qe800m', ''),
(30, '::1', '', 1, '2026-06-22 16:09:56', '2026-07-03 11:46:49', 'f3ln87nbgi9iae5pt5o4qe800m', ''),
(29, '::1', '', 1, '2026-06-22 10:39:05', '2026-07-03 11:46:49', 'f3ln87nbgi9iae5pt5o4qe800m', ''),
(28, '::1', '', 1, '2026-06-22 07:03:28', '2026-07-03 11:46:49', 'f3ln87nbgi9iae5pt5o4qe800m', ''),
(27, '::1', '', 1, '2026-06-22 03:02:47', '2026-07-03 11:46:49', 'f3ln87nbgi9iae5pt5o4qe800m', ''),
(25, '::1', '', 1, '2026-06-20 11:45:48', '2026-07-03 11:46:49', 'f3ln87nbgi9iae5pt5o4qe800m', ''),
(26, '::1', '', 1, '2026-06-20 12:17:37', '2026-07-03 11:46:49', 'f3ln87nbgi9iae5pt5o4qe800m', ''),
(49, '::1', '', 1, '2026-06-22 10:54:12', '2026-07-03 11:46:49', 'f3ln87nbgi9iae5pt5o4qe800m', ''),
(50, '::1', '', 1, '2026-06-22 10:54:46', '2026-07-03 11:46:49', 'f3ln87nbgi9iae5pt5o4qe800m', ''),
(51, '::1', '', 1, '2026-06-22 11:09:21', '2026-07-03 11:46:49', 'f3ln87nbgi9iae5pt5o4qe800m', ''),
(52, '::1', '', 1, '2026-06-22 11:11:02', '2026-07-03 11:46:49', 'f3ln87nbgi9iae5pt5o4qe800m', ''),
(53, '::1', '', 1, '2026-06-22 11:11:17', '2026-07-03 11:46:49', 'f3ln87nbgi9iae5pt5o4qe800m', ''),
(54, '::1', '', 1, '2026-06-22 11:36:12', '2026-07-03 11:46:49', 'f3ln87nbgi9iae5pt5o4qe800m', ''),
(55, '::1', '', 1, '2026-06-22 11:37:47', '2026-07-03 11:46:49', 'f3ln87nbgi9iae5pt5o4qe800m', ''),
(56, '::1', '', 1, '2026-06-22 11:37:54', '2026-07-03 11:46:49', 'f3ln87nbgi9iae5pt5o4qe800m', ''),
(57, '::1', '', 1, '2026-06-22 11:38:06', '2026-07-03 11:46:49', 'f3ln87nbgi9iae5pt5o4qe800m', ''),
(58, '::1', '', 1, '2026-06-22 11:38:17', '2026-07-03 11:46:49', 'f3ln87nbgi9iae5pt5o4qe800m', ''),
(59, '::1', '', 1, '2026-06-22 11:38:23', '2026-07-03 11:46:49', 'f3ln87nbgi9iae5pt5o4qe800m', ''),
(60, '::1', '', 1, '2026-06-22 11:38:28', '2026-07-03 11:46:49', 'f3ln87nbgi9iae5pt5o4qe800m', ''),
(61, '::1', '', 1, '2026-06-22 12:14:38', '2026-07-03 11:46:49', 'f3ln87nbgi9iae5pt5o4qe800m', ''),
(62, '::1', '', 1, '2026-06-22 12:51:24', '2026-07-03 11:46:49', 'f3ln87nbgi9iae5pt5o4qe800m', ''),
(63, '::1', '', 1, '2026-06-23 05:01:00', '2026-07-03 11:46:49', 'f3ln87nbgi9iae5pt5o4qe800m', ''),
(64, '::1', '', 1, '2026-06-23 05:27:08', '2026-07-03 11:46:49', 'f3ln87nbgi9iae5pt5o4qe800m', ''),
(65, '::1', '', 1, '2026-06-23 06:17:12', '2026-07-03 11:46:49', 'f3ln87nbgi9iae5pt5o4qe800m', ''),
(66, '::1', '', 1, '2026-06-23 14:09:03', '2026-07-03 15:43:11', 'j7hqruivd767m89j9sk0t6i6tp', ''),
(67, '::1', '', 1, '2026-06-23 14:25:51', '2026-07-03 15:43:11', 'j7hqruivd767m89j9sk0t6i6tp', ''),
(68, '::1', '', 1, '2026-06-24 04:36:01', '2026-07-03 11:46:49', 'f3ln87nbgi9iae5pt5o4qe800m', ''),
(69, '::1', '', 1, '2026-06-24 12:13:41', '2026-07-03 11:46:49', 'f3ln87nbgi9iae5pt5o4qe800m', ''),
(70, '::1', '', 1, '2026-06-25 08:23:18', '2026-07-03 11:46:49', 'f3ln87nbgi9iae5pt5o4qe800m', ''),
(71, '::1', '', 1, '2026-06-25 11:49:02', '2026-07-03 11:46:49', 'f3ln87nbgi9iae5pt5o4qe800m', ''),
(72, '::1', '', 1, '2026-06-29 06:46:24', '2026-07-03 11:46:49', 'f3ln87nbgi9iae5pt5o4qe800m', ''),
(73, '::1', '', 1, '2026-06-30 05:25:25', '2026-07-03 11:46:49', 'f3ln87nbgi9iae5pt5o4qe800m', ''),
(74, '::1', '', 1, '2026-06-30 05:25:56', '2026-07-03 11:46:49', 'f3ln87nbgi9iae5pt5o4qe800m', ''),
(75, '::1', '', 1, '2026-06-30 10:04:18', '2026-07-03 11:46:49', 'f3ln87nbgi9iae5pt5o4qe800m', ''),
(76, '::1', '', 1, '2026-07-01 07:02:37', '2026-07-03 15:43:11', 'j7hqruivd767m89j9sk0t6i6tp', ''),
(77, '::1', '', 1, '2026-07-01 10:41:01', '2026-07-03 11:46:49', 'f3ln87nbgi9iae5pt5o4qe800m', ''),
(78, '::1', '', 1, '2026-07-01 11:51:28', '2026-07-03 11:46:49', 'f3ln87nbgi9iae5pt5o4qe800m', ''),
(79, '::1', '', 1, '2026-07-01 12:05:01', '2026-07-03 11:46:49', 'f3ln87nbgi9iae5pt5o4qe800m', ''),
(80, '::1', '', 1, '2026-07-02 05:58:37', '2026-07-03 11:46:49', 'f3ln87nbgi9iae5pt5o4qe800m', ''),
(81, '::1', '', 1, '2026-07-02 08:12:24', '2026-07-03 11:46:49', 'f3ln87nbgi9iae5pt5o4qe800m', ''),
(82, '::1', '', 1, '2026-07-02 08:37:03', '2026-07-03 11:46:49', 'f3ln87nbgi9iae5pt5o4qe800m', ''),
(83, '::1', '', 1, '2026-07-02 13:55:32', '2026-07-03 15:43:11', 'j7hqruivd767m89j9sk0t6i6tp', ''),
(84, '127.0.0.1', '', 1, '2026-07-02 14:06:02', '', 'vocgmugsv28g60c1avqec34j4v', ''),
(85, '::1', '', 1, '2026-07-03 05:51:44', '2026-07-03 11:46:49', 'f3ln87nbgi9iae5pt5o4qe800m', ''),
(86, '::1', '', 1, '2026-07-03 08:03:49', '2026-07-03 11:46:49', 'f3ln87nbgi9iae5pt5o4qe800m', ''),
(87, '::1', '', 1, '2026-07-03 11:12:34', '2026-07-03 11:46:49', 'f3ln87nbgi9iae5pt5o4qe800m', ''),
(88, '::1', '', 1, '2026-07-03 11:46:52', '', 'f3ln87nbgi9iae5pt5o4qe800m', ''),
(89, '::1', '', 1, '2026-07-03 14:16:33', '2026-07-03 15:43:11', 'j7hqruivd767m89j9sk0t6i6tp', ''),
(90, '::1', '', 1, '2026-07-03 15:43:03', '2026-07-03 15:43:11', 'j7hqruivd767m89j9sk0t6i6tp', ''),
(91, '::1', '', 1, '2026-07-03 15:43:37', '', 'j7hqruivd767m89j9sk0t6i6tp', ''),
(92, '::1', '', 1, '2026-07-04 07:10:32', '', 'f3ln87nbgi9iae5pt5o4qe800m', '');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int NOT NULL AUTO_INCREMENT,
  `customer` int NOT NULL,
  `notes` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `status` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `user` int NOT NULL,
  `order_date` int NOT NULL,
  `delivery_due_date` int NOT NULL,
  `payment_status` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `auth_user` int NOT NULL,
  `updated` int NOT NULL,
  `created` varchar(35) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer`, `notes`, `status`, `user`, `order_date`, `delivery_due_date`, `payment_status`, `auth_user`, `updated`, `created`) VALUES
(10, 6, '', 'order_confirmed', 4, 20260702, 20260723, 'pending', 1, 1782985656, '1782985519_1');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

DROP TABLE IF EXISTS `order_items`;
CREATE TABLE IF NOT EXISTS `order_items` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product` int NOT NULL,
  `quantity` decimal(10,2) NOT NULL,
  `order_id` int NOT NULL,
  `rate` decimal(10,2) DEFAULT NULL,
  `auth_user` int NOT NULL,
  `updated` int NOT NULL,
  `created` varchar(35) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `product`, `quantity`, `order_id`, `rate`, `auth_user`, `updated`, `created`) VALUES
(33, 8, 400.00, 9, 10.00, 1, 1782976723, '1782976471_1'),
(36, 13, 1.00, 9, 111.00, 1, 1782977901, '1782977901_1'),
(31, 7, 112.00, 9, 2.00, 1, 1782976490, '1782976471_1'),
(30, 7, 111.00, 9, 11.00, 1, 1782976378, '1782976378_1'),
(11, 7, 102.00, 7, 21.00, 1, 1782974773, '1782909237_1'),
(29, 7, 111.00, 9, 1.00, 1, 1782976316, '1782976316_1'),
(27, 6, 200.00, 9, 20.00, 1, 1782976264, '1782976264_1'),
(28, 7, 111.00, 9, 1.00, 1, 1782976302, '1782976302_1'),
(26, 7, 100.00, 9, 10.00, 1, 1782976264, '1782976264_1'),
(37, 15, 500.00, 10, 50.00, 1, 1782985568, '1782985568_1'),
(35, 14, 5.00, 9, 500.00, 1, 1782977108, '1782977108_1'),
(38, 16, 200.00, 10, 150.00, 1, 1782985568, '1782985568_1'),
(39, 17, 100.00, 10, 30.00, 1, 1782985568, '1782985568_1'),
(40, 15, 100.00, 10, 50.00, 1, 1782986545, '1782986545_1'),
(41, 15, 10.00, 10, 50.00, 1, 1783061563, '1783061563_1'),
(42, 16, 10.00, 10, 200.00, 1, 1783061563, '1783061563_1'),
(43, 17, 10.00, 10, 150.00, 1, 1783061563, '1783061563_1'),
(44, 15, 20.00, 10, 50.00, 1, 1783061910, '1783061910_1'),
(45, 16, 20.00, 10, 200.00, 1, 1783061910, '1783061910_1'),
(46, 17, 20.00, 10, 150.00, 1, 1783061910, '1783061910_1');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `code` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `category` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `image` int NOT NULL,
  `quality` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `type` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `pieces` int DEFAULT NULL,
  `auth_user` int NOT NULL,
  `updated` int NOT NULL,
  `created` varchar(35) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product`, `code`, `description`, `category`, `image`, `quality`, `type`, `pieces`, `auth_user`, `updated`, `created`) VALUES
(15, 'Bumper', 'BUMP', '', '29', 93, '31', 'Fancy', 1, 1, 1782984805, '1782984718_1'),
(17, 'Side mirrors', 'MIR', '', '24', 95, '31', 'Activa', 2, 1, 1782985154, '1782985154_1'),
(16, 'Front guard', 'FG', 'front guard brief', '28', 94, '31', 'Ape', 2, 1, 1782984866, '1782984866_1');

-- --------------------------------------------------------

--
-- Table structure for table `product_lots`
--

DROP TABLE IF EXISTS `product_lots`;
CREATE TABLE IF NOT EXISTS `product_lots` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product` int NOT NULL,
  `ordered_quantity` int NOT NULL,
  `received_quantity` int NOT NULL,
  `accepted_quantity` int NOT NULL,
  `rejected_quantity` int NOT NULL,
  `available_quantity` int NOT NULL,
  `reserved_quantity` int NOT NULL,
  `consumed_quantity` int NOT NULL,
  `notes` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `source` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `purchase` int DEFAULT NULL,
  `buy_price` decimal(10,2) DEFAULT NULL,
  `auth_user` int NOT NULL,
  `updated` int NOT NULL,
  `created` varchar(35) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `product_lots`
--

INSERT INTO `product_lots` (`id`, `product`, `ordered_quantity`, `received_quantity`, `accepted_quantity`, `rejected_quantity`, `available_quantity`, `reserved_quantity`, `consumed_quantity`, `notes`, `source`, `status`, `purchase`, `buy_price`, `auth_user`, `updated`, `created`) VALUES
(15, 16, 2000, 2000, 1900, 100, 1696, 204, 0, 'lot ready', 'produced', 'ready', NULL, NULL, 1, 1783062016, '1782984999_1'),
(16, 15, 1250, 1240, 1200, 40, 760, 440, 0, '', 'produced', 'ready', NULL, NULL, 1, 1783062016, '1782985060_1'),
(14, 15, 1000, 1000, 980, 20, 765, 215, 0, 'Inventory ready', 'produced', 'ready', NULL, NULL, 1, 1783062016, '1782984941_1'),
(17, 16, 550, 550, 500, 50, 300, 200, 0, '', 'produced', 'ready', NULL, NULL, 1, 1783062177, '1782985096_1'),
(18, 17, 1100, 1100, 1000, 100, 795, 205, 0, 'mirror ready', 'purchased', 'ready', 21, 100.00, 1, 1783062016, '1782985194_1');

-- --------------------------------------------------------

--
-- Table structure for table `product_movements`
--

DROP TABLE IF EXISTS `product_movements`;
CREATE TABLE IF NOT EXISTS `product_movements` (
  `id` int NOT NULL AUTO_INCREMENT,
  `order_id` int NOT NULL,
  `product` int NOT NULL,
  `product_lot` int NOT NULL,
  `dispatch` int NOT NULL,
  `quantity` int NOT NULL,
  `action` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `action_date` int NOT NULL,
  `auth_user` int NOT NULL,
  `updated` int NOT NULL,
  `created` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `product_movements`
--

INSERT INTO `product_movements` (`id`, `order_id`, `product`, `product_lot`, `dispatch`, `quantity`, `action`, `action_date`, `auth_user`, `updated`, `created`) VALUES
(42, 10, 16, 17, 14, 3, 'unreserve', 1783062177, 1, 1783062177, '1783062177_1'),
(41, 10, 17, 18, 14, 5, 'reserve', 1783062016, 1, 1783062016, '1783062016_1'),
(40, 10, 16, 17, 14, 3, 'reserve', 1783062016, 1, 1783062016, '1783062016_1'),
(39, 10, 16, 15, 14, 4, 'reserve', 1783062016, 1, 1783062016, '1783062016_1'),
(38, 10, 15, 14, 14, 35, 'reserve', 1783062016, 1, 1783062016, '1783062016_1'),
(37, 10, 15, 16, 14, 40, 'reserve', 1783062016, 1, 1783062016, '1783062016_1'),
(36, 10, 15, 16, 14, 33, 'reserve', 1783061388, 1, 1783061388, '1783061388_1'),
(35, 10, 15, 16, 14, 33, 'unreserve', 1783061320, 1, 1783061320, '1783061320_1'),
(34, 10, 17, 18, 14, 85, 'reserve', 1783061253, 1, 1783061253, '1783061253_1'),
(33, 10, 16, 17, 14, 90, 'reserve', 1783061253, 1, 1783061253, '1783061253_1'),
(32, 10, 16, 15, 14, 83, 'reserve', 1783061253, 1, 1783061253, '1783061253_1'),
(31, 10, 15, 14, 14, 22, 'reserve', 1783061253, 1, 1783061253, '1783061253_1'),
(30, 10, 15, 16, 14, 33, 'reserve', 1783061253, 1, 1783061253, '1783061253_1');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

DROP TABLE IF EXISTS `purchases`;
CREATE TABLE IF NOT EXISTS `purchases` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `payment_status` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `notes` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `status` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `purchase_invoice` int DEFAULT NULL,
  `vendor` int DEFAULT NULL,
  `sub_total` decimal(10,2) DEFAULT NULL,
  `gst` decimal(10,2) NOT NULL,
  `tax` decimal(10,2) NOT NULL,
  `discount` decimal(10,2) NOT NULL,
  `grand_total` decimal(10,2) NOT NULL,
  `order_date` int DEFAULT NULL,
  `expected_delivery_date` int NOT NULL,
  `first_received_date` int NOT NULL,
  `fully_received_date` int NOT NULL,
  `cancel_date` int NOT NULL,
  `auth_user` int NOT NULL,
  `updated` int NOT NULL,
  `created` varchar(35) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `title`, `payment_status`, `notes`, `status`, `purchase_invoice`, `vendor`, `sub_total`, `gst`, `tax`, `discount`, `grand_total`, `order_date`, `expected_delivery_date`, `first_received_date`, `fully_received_date`, `cancel_date`, `auth_user`, `updated`, `created`) VALUES
(21, 'Mirrors', 'pending', '', 'fully_received', 96, 5, 1000.00, 20.00, 20.00, 10.00, 1030.00, 20260701, 20260702, 20260702, 20260702, 0, 1, 1782985406, '1782985343_1');

-- --------------------------------------------------------

--
-- Table structure for table `raw_materials`
--

DROP TABLE IF EXISTS `raw_materials`;
CREATE TABLE IF NOT EXISTS `raw_materials` (
  `id` int NOT NULL AUTO_INCREMENT,
  `raw_material` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `code` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `unit` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `category` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `image` int DEFAULT NULL,
  `auth_user` int DEFAULT NULL,
  `updated` int DEFAULT NULL,
  `created` varchar(35) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `raw_materials`
--

INSERT INTO `raw_materials` (`id`, `raw_material`, `code`, `unit`, `description`, `category`, `image`, `auth_user`, `updated`, `created`) VALUES
(6, 'SS Pipes', '', '', '', NULL, 0, 0, 1782126673, '0'),
(7, 'MS Pipes', '', '', '', NULL, 0, 0, 1782126673, '0'),
(8, 'SS Rods', '', '', '', NULL, 0, 0, 1782126673, '0'),
(10, 'raw m', '', 'kg', '', NULL, 12, 0, 1782132815, '0'),
(11, 'raw m1', '', 'kg', 'fteststets', 'ss_pipes', 18, 0, 1782223927, '0');

-- --------------------------------------------------------

--
-- Table structure for table `raw_material_lots`
--

DROP TABLE IF EXISTS `raw_material_lots`;
CREATE TABLE IF NOT EXISTS `raw_material_lots` (
  `id` int NOT NULL AUTO_INCREMENT,
  `raw_material` int NOT NULL,
  `ordered_quantity` int NOT NULL,
  `received_quantity` int NOT NULL,
  `accepted_quantity` int NOT NULL,
  `rejected_quantity` int NOT NULL,
  `available_quantity` int NOT NULL,
  `reserved_quantity` int NOT NULL,
  `consumed_quantity` int NOT NULL,
  `notes` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `status` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `purchase` int NOT NULL,
  `buy_price` decimal(10,2) DEFAULT NULL,
  `auth_user` int NOT NULL,
  `updated` int NOT NULL,
  `created` varchar(35) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `raw_material_lots`
--

INSERT INTO `raw_material_lots` (`id`, `raw_material`, `ordered_quantity`, `received_quantity`, `accepted_quantity`, `rejected_quantity`, `available_quantity`, `reserved_quantity`, `consumed_quantity`, `notes`, `status`, `purchase`, `buy_price`, `auth_user`, `updated`, `created`) VALUES
(1, 7, 1001, 0, 0, 0, 0, 0, 0, 'test1', 'received', 0, 20.00, 0, 0, '0'),
(3, 6, 111, 100, 90, 10, 80, 10, 0, 'tast12', 'ready', 20, 222.00, 1, 1782803622, '0'),
(4, 7, 34343, 0, 0, 0, 0, 0, 0, '', 'received', 0, 333.00, 0, 1782286889, '0'),
(6, 7, 33331, 0, 0, 0, 0, 0, 0, 'tttt3', 'received', 0, 3333.00, 1, 1782296557, '0');

-- --------------------------------------------------------

--
-- Table structure for table `sectors`
--

DROP TABLE IF EXISTS `sectors`;
CREATE TABLE IF NOT EXISTS `sectors` (
  `id` int NOT NULL AUTO_INCREMENT,
  `sector` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
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
  `auth_user` int NOT NULL,
  `updated` int DEFAULT NULL,
  `created` varchar(35) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `symbols`
--

INSERT INTO `symbols` (`id`, `symbol`, `active`, `counter`, `timezone`, `strategy`, `combination`, `exchange`, `tags`, `fetched_price_on`, `generated_trade_on`, `generated_heatmap_on`, `auth_user`, `updated`, `created`) VALUES
(66, 'INFY_NSE', 'yes', NULL, NULL, '3', 'combination_report_id_341310', 'NSE', NULL, NULL, 20251218, 20251205, 0, 1764593320, '0'),
(67, 'INFY_NSE', 'yes', NULL, NULL, '3', 'combination_report_id_341706', 'NSE', NULL, NULL, 20251218, 20251205, 0, 1764593322, '0'),
(68, 'INFY_NSE', 'yes', NULL, NULL, '3', 'combination_report_id_324774', 'NSE', NULL, NULL, 20251218, 20251205, 0, 1764593325, '0'),
(69, 'INFY_NSE', 'yes', NULL, NULL, '3', 'combination_report_id_324780', 'NSE', NULL, NULL, 20251218, 20251205, 0, 1764593326, '0'),
(71, 'INFY_NSE', 'yes', NULL, NULL, '3', 'combination_report_id_324859', 'NSE', NULL, NULL, 20251218, 20251205, 0, 1764593328, '0'),
(72, 'INFY_NSE', 'yes', NULL, NULL, '3', 'combination_report_id_324855', 'NSE', NULL, NULL, 20251218, 20251205, 0, 1764593328, '0'),
(73, 'Infy nse', 'no', NULL, NULL, '3', 'combination_report_id_341985', 'NSE', '3,4,2', NULL, 20251218, 20251205, 0, 1781938271, '0'),
(80, 'test', 'yes', NULL, NULL, NULL, NULL, 'NSE2', '3,1', NULL, NULL, NULL, 0, 1781946475, '0');

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
  `type` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `size` int DEFAULT NULL,
  `thumb` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `small` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `table_name` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `row_id` int DEFAULT NULL,
  `file_type` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `caption` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `other` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `auth_user` int DEFAULT NULL,
  `updated` int DEFAULT NULL,
  `created` varchar(35) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=99 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `uploads`
--

INSERT INTO `uploads` (`id`, `name`, `title`, `brief`, `module`, `module_id`, `type`, `size`, `thumb`, `small`, `table_name`, `row_id`, `file_type`, `caption`, `other`, `auth_user`, `updated`, `created`) VALUES
(2, 'uploads/872900647-2.png', NULL, NULL, NULL, NULL, 'image/png', 30028, 'uploads/872900647-thumb-2.png', 'uploads/872900647-small-2.png', NULL, NULL, NULL, NULL, NULL, 1, 1782113633, '0'),
(3, 'uploads/1649863808-2.png', NULL, NULL, NULL, NULL, 'image/png', 30028, 'uploads/1649863808-thumb-2.png', 'uploads/1649863808-small-2.png', NULL, NULL, NULL, NULL, NULL, 1, 1782113651, '0'),
(4, 'uploads/2011104342-2.png', NULL, NULL, NULL, NULL, 'image/png', 30028, 'uploads/2011104342-thumb-2.png', 'uploads/2011104342-small-2.png', NULL, NULL, NULL, NULL, NULL, 1, 1782113781, '0'),
(5, 'uploads/376290803-3.png', NULL, NULL, NULL, NULL, 'image/png', 59487, 'uploads/376290803-thumb-3.png', 'uploads/376290803-small-3.png', NULL, NULL, NULL, NULL, NULL, 1, 1782114935, '0'),
(6, 'uploads/908182907-4.png', NULL, NULL, NULL, NULL, 'image/png', 69397, 'uploads/908182907-thumb-4.png', 'uploads/908182907-small-4.png', NULL, NULL, NULL, NULL, NULL, 1, 1782116290, '0'),
(7, 'uploads/1707818140-4.png', NULL, NULL, NULL, NULL, 'image/png', 69397, 'uploads/1707818140-thumb-4.png', 'uploads/1707818140-small-4.png', NULL, NULL, NULL, NULL, NULL, 1, 1782128377, '0'),
(8, 'uploads/411351571-12.png', NULL, NULL, NULL, NULL, 'image/png', 26780, 'uploads/411351571-thumb-12.png', 'uploads/411351571-small-12.png', NULL, NULL, NULL, NULL, NULL, 1, 1782128393, '0'),
(9, 'uploads/712457619-7.png', NULL, NULL, NULL, NULL, 'image/png', 34034, 'uploads/712457619-thumb-7.png', 'uploads/712457619-small-7.png', NULL, NULL, NULL, NULL, NULL, 1, 1782130941, '0'),
(10, 'uploads/1815562786-7.png', NULL, NULL, NULL, NULL, 'image/png', 34034, 'uploads/1815562786-thumb-7.png', 'uploads/1815562786-small-7.png', NULL, NULL, NULL, NULL, NULL, 1, 1782130972, '0'),
(11, 'uploads/1620306270-3.png', NULL, NULL, NULL, NULL, 'image/png', 59487, 'uploads/1620306270-thumb-3.png', 'uploads/1620306270-small-3.png', NULL, NULL, NULL, NULL, NULL, 1, 1782132065, '0'),
(12, 'uploads/1381100136-3.png', NULL, NULL, NULL, NULL, 'image/png', 59487, 'uploads/1381100136-thumb-3.png', 'uploads/1381100136-small-3.png', NULL, NULL, NULL, NULL, NULL, 1, 1782132815, '0'),
(13, 'uploads/1892644299-3.png', NULL, NULL, NULL, NULL, 'image/png', 59487, 'uploads/1892644299-thumb-3.png', 'uploads/1892644299-small-3.png', NULL, NULL, NULL, NULL, NULL, 1, 1782132847, '0'),
(14, 'uploads/278105047-3.png', NULL, NULL, NULL, NULL, 'image/png', 59487, 'uploads/278105047-thumb-3.png', 'uploads/278105047-small-3.png', NULL, NULL, NULL, NULL, NULL, 1, 1782132872, '0'),
(15, 'uploads/1992663147-4.png', NULL, NULL, NULL, NULL, 'image/png', 69397, 'uploads/1992663147-thumb-4.png', 'uploads/1992663147-small-4.png', NULL, NULL, NULL, NULL, NULL, 1, 1782133007, '0'),
(16, 'uploads/1181413689-12.png', NULL, NULL, NULL, NULL, 'image/png', 26780, 'uploads/1181413689-thumb-12.png', 'uploads/1181413689-small-12.png', NULL, NULL, NULL, NULL, NULL, 1, 1782133023, '0'),
(17, 'uploads/1913955719-4.png', NULL, NULL, NULL, NULL, 'image/png', 69397, 'uploads/1913955719-thumb-4.png', 'uploads/1913955719-small-4.png', NULL, NULL, NULL, NULL, NULL, 1, 1782193058, '0'),
(18, 'uploads/1063420079-editmode.png', NULL, NULL, NULL, NULL, 'image/png', 13586, 'uploads/1063420079-thumb-editmode.png', 'uploads/1063420079-small-editmode.png', NULL, NULL, NULL, NULL, NULL, 1, 1782223927, '0'),
(19, 'uploads/805107694-v.png', NULL, NULL, NULL, NULL, 'image/png', 40755, 'uploads/805107694-thumb-v.png', 'uploads/805107694-small-v.png', NULL, NULL, NULL, NULL, NULL, 1, 1782227972, '0'),
(20, 'uploads/1048511331-2.png', NULL, NULL, NULL, NULL, 'image/png', 30028, 'uploads/1048511331-thumb-2.png', 'uploads/1048511331-small-2.png', NULL, NULL, NULL, NULL, NULL, 1, 1782280100, '0'),
(21, 'uploads/417880223-2.png', NULL, NULL, NULL, NULL, 'image/png', 30028, 'uploads/417880223-thumb-2.png', 'uploads/417880223-small-2.png', NULL, NULL, NULL, NULL, NULL, 1, 1782280115, '0'),
(22, 'uploads/459679485-2.png', NULL, NULL, NULL, NULL, 'image/png', 30028, 'uploads/459679485-thumb-2.png', 'uploads/459679485-small-2.png', NULL, NULL, NULL, NULL, NULL, 1, 1782280126, '0'),
(23, 'uploads/476356215-Vadodara Area - all locations.pdf', NULL, NULL, NULL, NULL, 'application/pdf', 46425, 'uploads/476356215-thumb-Vadodara Area - all locations.pdf', 'uploads/476356215-small-Vadodara Area - all locations.pdf', NULL, NULL, NULL, NULL, NULL, 1, 1782280154, '0'),
(24, 'uploads/185943452-Vadodara Area - all locations.pdf', NULL, NULL, NULL, NULL, 'application/pdf', 46425, 'uploads/185943452-thumb-Vadodara Area - all locations.pdf', 'uploads/185943452-small-Vadodara Area - all locations.pdf', NULL, NULL, NULL, NULL, NULL, 1, 1782280198, '0'),
(25, 'uploads/2037800439-Vadodara Area - all locations.pdf', NULL, NULL, NULL, NULL, 'application/pdf', 46425, 'uploads/2037800439-thumb-Vadodara Area - all locations.pdf', 'uploads/2037800439-small-Vadodara Area - all locations.pdf', NULL, NULL, NULL, NULL, NULL, 1, 1782280209, '0'),
(26, 'uploads/849765849-Vadodara Area - all locations.pdf', NULL, NULL, NULL, NULL, 'application/pdf', 46425, 'uploads/849765849-thumb-Vadodara Area - all locations.pdf', 'uploads/849765849-small-Vadodara Area - all locations.pdf', NULL, NULL, NULL, NULL, NULL, 1, 1782280220, '0'),
(27, 'uploads/4737975-AV-Vadodara-June-2026.pdf', NULL, NULL, NULL, NULL, 'application/pdf', 45572, '', '', NULL, NULL, NULL, NULL, NULL, 1, 1782280710, '0'),
(28, 'uploads/1858814656-IMG-20250630-WA0005.jpg', NULL, NULL, NULL, NULL, 'image/jpeg', 158367, 'uploads/1858814656-thumb-IMG-20250630-WA0005.jpg', 'uploads/1858814656-small-IMG-20250630-WA0005.jpg', NULL, NULL, NULL, NULL, NULL, 1, 1782281375, '0'),
(29, 'uploads/1661824733-AV-Vadodara-April-2026.pdf', NULL, NULL, NULL, NULL, 'application/pdf', 46005, '', '', NULL, NULL, NULL, NULL, NULL, 1, 1782281391, '0'),
(30, 'uploads/678204385-combo4.jpg', NULL, NULL, NULL, NULL, 'image/jpeg', 279028, 'uploads/678204385-thumb-combo4.jpg', 'uploads/678204385-small-combo4.jpg', NULL, NULL, NULL, NULL, NULL, 1, 1782282262, '0'),
(31, 'uploads/1117840012-2.png', NULL, NULL, NULL, NULL, 'image/png', 1571022, 'uploads/1117840012-thumb-2.png', 'uploads/1117840012-small-2.png', NULL, NULL, NULL, NULL, NULL, 1, 1782282544, '0'),
(32, 'uploads/664840457-html.svg', NULL, NULL, NULL, NULL, 'image/svg+xml', 2919, '', '', NULL, NULL, NULL, NULL, NULL, 1, 1782284094, '0'),
(33, 'uploads/215116725-Daily WInners - Sheet1.csv', NULL, NULL, NULL, NULL, 'text/csv', 327, '', '', NULL, NULL, NULL, NULL, NULL, 1, 1782284125, '0'),
(34, 'uploads/1474195778-Raj Deatails for Software.xlsx', NULL, NULL, NULL, NULL, 'application/vnd.openxmlformats', 22124, '', '', NULL, NULL, NULL, NULL, NULL, 1, 1782284153, '0'),
(35, 'uploads/138769928-Raj Deatails for Software.xlsx', NULL, NULL, NULL, NULL, 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 22124, '', '', NULL, NULL, NULL, NULL, NULL, 1, 1782284182, '0'),
(36, 'uploads/801012707-WhatsApp Image 2025-07-24 at 11.21.11 PM.jpeg', NULL, NULL, NULL, NULL, 'image/jpeg', 117208, 'uploads/801012707-thumb-WhatsApp Image 2025-07-24 at 11.21.11 PM.jpeg', 'uploads/801012707-small-WhatsApp Image 2025-07-24 at 11.21.11 PM.jpeg', NULL, NULL, NULL, NULL, NULL, 1, 1782284518, '0'),
(37, 'uploads/1041971282-nominalform-2145.pdf', NULL, NULL, NULL, NULL, 'application/pdf', 180916, '', '', NULL, NULL, NULL, NULL, NULL, 1, 1782284573, '0'),
(38, 'uploads/705817082-WhatsApp Image 2025-07-24 at 11.21.11 PM.jpeg', NULL, NULL, NULL, NULL, 'image/jpeg', 117208, 'uploads/705817082-thumb-WhatsApp Image 2025-07-24 at 11.21.11 PM.jpeg', 'uploads/705817082-small-WhatsApp Image 2025-07-24 at 11.21.11 PM.jpeg', NULL, NULL, NULL, NULL, NULL, 1, 1782284583, '0'),
(39, 'uploads/1093409995-Raj Deatails for Software.xlsx', NULL, NULL, NULL, NULL, 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 22124, '', '', NULL, NULL, NULL, NULL, NULL, 1, 1782284647, '0'),
(40, 'uploads/666263857-Raj Deatails for Software.xlsx', NULL, NULL, NULL, NULL, 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 22124, '', '', NULL, NULL, NULL, NULL, NULL, 1, 1782287096, '0'),
(41, 'uploads/1329456996-Raj Deatails for Software.xlsx', NULL, NULL, NULL, NULL, 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 22124, '', '', NULL, NULL, NULL, NULL, NULL, 1, 1782287103, '0'),
(42, 'uploads/1807747742-WhatsApp Image 2025-07-24 at 11.21.11 PM.jpeg', NULL, NULL, NULL, NULL, 'image/jpeg', 117208, 'uploads/1807747742-thumb-WhatsApp Image 2025-07-24 at 11.21.11 PM.jpeg', 'uploads/1807747742-small-WhatsApp Image 2025-07-24 at 11.21.11 PM.jpeg', NULL, NULL, NULL, NULL, NULL, 1, 1782303706, '0'),
(43, 'uploads/1959219978-Sector Data - Sheet1.csv', NULL, NULL, NULL, NULL, 'text/csv', 8681, '', '', NULL, NULL, NULL, NULL, NULL, 1, 1782303873, '0'),
(44, 'uploads/483983341-IMG-20250630-WA0005.jpg', NULL, NULL, NULL, NULL, 'image/jpeg', 158367, 'uploads/483983341-thumb-IMG-20250630-WA0005.jpg', 'uploads/483983341-small-IMG-20250630-WA0005.jpg', NULL, NULL, NULL, NULL, NULL, 1, 1782304076, '0'),
(45, 'uploads/474580647-download-1415972908-1773137224.png', NULL, NULL, NULL, NULL, 'image/png', 377465, 'uploads/474580647-thumb-download-1415972908-1773137224.png', 'uploads/474580647-small-download-1415972908-1773137224.png', NULL, NULL, NULL, NULL, NULL, 1, 1782304127, '0'),
(46, 'uploads/1514278666-WhatsApp Image 2026-03-31 at 10.58.45 AM.jpeg', NULL, NULL, NULL, NULL, 'image/jpeg', 101857, 'uploads/1514278666-thumb-WhatsApp Image 2026-03-31 at 10.58.45 AM.jpeg', 'uploads/1514278666-small-WhatsApp Image 2026-03-31 at 10.58.45 AM.jpeg', NULL, NULL, NULL, NULL, NULL, 1, 1782307050, '0'),
(47, 'uploads/377550191-tinified (5).zip', NULL, NULL, NULL, NULL, 'application/x-zip-compressed', 77884, '', '', NULL, NULL, NULL, NULL, NULL, 1, 1782377645, '0'),
(48, 'uploads/621225725-tinified (5).zip', NULL, NULL, NULL, NULL, 'application/x-zip-compressed', 77884, '', '', NULL, NULL, NULL, NULL, NULL, 1, 1782377656, '0'),
(49, 'uploads/601758969-WhatsApp Image 2025-06-30 at 3.43.03 PM (1).jpeg', NULL, NULL, NULL, NULL, 'image/jpeg', 194314, 'uploads/601758969-thumb-WhatsApp Image 2025-06-30 at 3.43.03 PM (1).jpeg', 'uploads/601758969-small-WhatsApp Image 2025-06-30 at 3.43.03 PM (1).jpeg', NULL, NULL, NULL, NULL, NULL, 1, 1782385760, '0'),
(50, 'uploads/1617118601-WhatsApp Image 2026-03-31 at 10.58.45 AM.jpeg', NULL, NULL, NULL, NULL, 'image/jpeg', 101857, 'uploads/1617118601-thumb-WhatsApp Image 2026-03-31 at 10.58.45 AM.jpeg', 'uploads/1617118601-small-WhatsApp Image 2026-03-31 at 10.58.45 AM.jpeg', NULL, NULL, NULL, NULL, NULL, 1, 1782389959, NULL),
(51, 'uploads/1949113549-WhatsApp Image 2026-03-31 at 10.58.45 AM.jpeg', NULL, NULL, NULL, NULL, 'image/jpeg', 101857, 'uploads/1949113549-thumb-WhatsApp Image 2026-03-31 at 10.58.45 AM.jpeg', 'uploads/1949113549-small-WhatsApp Image 2026-03-31 at 10.58.45 AM.jpeg', NULL, NULL, NULL, NULL, NULL, 1, 1782389982, NULL),
(52, 'uploads/493783106-2. Rack AC Distributoin diagram.png', NULL, NULL, NULL, NULL, 'image/png', 67009, 'uploads/493783106-thumb-2. Rack AC Distributoin diagram.png', 'uploads/493783106-small-2. Rack AC Distributoin diagram.png', NULL, NULL, NULL, NULL, NULL, 1, 1782722082, NULL),
(53, 'uploads/1077930481-3. DC DB diagram - v1.0.png', NULL, NULL, NULL, NULL, 'image/png', 107924, 'uploads/1077930481-thumb-3. DC DB diagram - v1.0.png', 'uploads/1077930481-small-3. DC DB diagram - v1.0.png', NULL, NULL, NULL, NULL, NULL, 1, 1782722082, NULL),
(54, 'uploads/533279733-2. Rack AC Distributoin diagram.png', NULL, NULL, NULL, NULL, 'image/png', 67009, 'uploads/533279733-thumb-2. Rack AC Distributoin diagram.png', 'uploads/533279733-small-2. Rack AC Distributoin diagram.png', NULL, NULL, NULL, NULL, NULL, 1, 1782722086, NULL),
(55, 'uploads/1103918327-3. DC DB diagram - v1.0.png', NULL, NULL, NULL, NULL, 'image/png', 107924, 'uploads/1103918327-thumb-3. DC DB diagram - v1.0.png', 'uploads/1103918327-small-3. DC DB diagram - v1.0.png', NULL, NULL, NULL, NULL, NULL, 1, 1782722086, NULL),
(56, 'uploads/1127154135-2. Rack AC Distributoin diagram.png', NULL, NULL, NULL, NULL, 'image/png', 67009, 'uploads/1127154135-thumb-2. Rack AC Distributoin diagram.png', 'uploads/1127154135-small-2. Rack AC Distributoin diagram.png', 'purchases', 18, 'document', '', 'aaa', 1, 1782722403, NULL),
(57, 'uploads/2051494259-3. DC DB diagram - v1.0.png', NULL, NULL, NULL, NULL, 'image/png', 107924, 'uploads/2051494259-thumb-3. DC DB diagram - v1.0.png', 'uploads/2051494259-small-3. DC DB diagram - v1.0.png', 'purchases', 18, 'document', 'sheets', '', 1, 1782722403, NULL),
(58, 'uploads/677228917-2. Rack AC Distributoin diagram.png', NULL, NULL, NULL, NULL, 'image/png', 67009, 'uploads/677228917-thumb-2. Rack AC Distributoin diagram.png', 'uploads/677228917-small-2. Rack AC Distributoin diagram.png', 'purchases', 19, 'document', '', 'aaa', 1, 1782722482, '1782722481_1'),
(59, 'uploads/1761716800-3. DC DB diagram - v1.0.png', NULL, NULL, NULL, NULL, 'image/png', 107924, 'uploads/1761716800-thumb-3. DC DB diagram - v1.0.png', 'uploads/1761716800-small-3. DC DB diagram - v1.0.png', 'purchases', 19, 'document', 'sheets', '', 1, 1782722482, '1782722481_1'),
(69, 'uploads/1000459001-WhatsApp Image 2026-06-26 at 12.54.11 PM.jpeg', NULL, NULL, NULL, NULL, 'image/jpeg', 102450, 'uploads/1000459001-thumb-WhatsApp Image 2026-06-26 at 12.54.11 PM.jpeg', 'uploads/1000459001-small-WhatsApp Image 2026-06-26 at 12.54.11 PM.jpeg', NULL, NULL, NULL, NULL, NULL, 1, 1782730267, NULL),
(70, 'uploads/2038846874-WhatsApp Image 2026-06-26 at 1.01.47 PM.jpeg', NULL, NULL, NULL, NULL, 'image/jpeg', 94168, 'uploads/2038846874-thumb-WhatsApp Image 2026-06-26 at 1.01.47 PM.jpeg', 'uploads/2038846874-small-WhatsApp Image 2026-06-26 at 1.01.47 PM.jpeg', NULL, NULL, NULL, NULL, NULL, 1, 1782731360, NULL),
(71, 'uploads/1433388973-WhatsApp Image 2026-06-26 at 12.54.12 PM.jpeg', NULL, NULL, NULL, NULL, 'image/jpeg', 96011, 'uploads/1433388973-thumb-WhatsApp Image 2026-06-26 at 12.54.12 PM.jpeg', 'uploads/1433388973-small-WhatsApp Image 2026-06-26 at 12.54.12 PM.jpeg', NULL, NULL, NULL, NULL, NULL, 1, 1782731376, NULL),
(72, 'uploads/208512721-WhatsApp Image 2026-06-26 at 12.54.11 PM.jpeg', NULL, NULL, NULL, NULL, 'image/jpeg', 102450, 'uploads/208512721-thumb-WhatsApp Image 2026-06-26 at 12.54.11 PM.jpeg', 'uploads/208512721-small-WhatsApp Image 2026-06-26 at 12.54.11 PM.jpeg', NULL, NULL, NULL, NULL, NULL, 1, 1782731447, NULL),
(73, 'uploads/1805632886-WhatsApp Image 2026-06-26 at 1.01.47 PM.jpeg', NULL, NULL, NULL, NULL, 'image/jpeg', 94168, 'uploads/1805632886-thumb-WhatsApp Image 2026-06-26 at 1.01.47 PM.jpeg', 'uploads/1805632886-small-WhatsApp Image 2026-06-26 at 1.01.47 PM.jpeg', NULL, NULL, NULL, NULL, NULL, 1, 1782731508, NULL),
(77, 'uploads/25554666-WhatsApp Image 2026-06-26 at 1.01.47 PM.jpeg', NULL, NULL, NULL, NULL, 'image/jpeg', 94168, 'uploads/25554666-thumb-WhatsApp Image 2026-06-26 at 1.01.47 PM.jpeg', 'uploads/25554666-small-WhatsApp Image 2026-06-26 at 1.01.47 PM.jpeg', NULL, NULL, NULL, NULL, NULL, 1, 1782734498, NULL),
(81, 'uploads/1924528156-3. DC DB diagram - v1.0.png', NULL, NULL, NULL, NULL, 'image/png', 107924, 'uploads/1924528156-thumb-3. DC DB diagram - v1.0.png', 'uploads/1924528156-small-3. DC DB diagram - v1.0.png', 'purchases', 20, 'document', '50', 'tests1', 1, 1782734984, '1782734984_1'),
(83, 'uploads/994740260-WhatsApp Image 2026-06-26 at 1.01.47 PM.jpeg', NULL, NULL, NULL, NULL, 'image/jpeg', 94168, 'uploads/994740260-thumb-WhatsApp Image 2026-06-26 at 1.01.47 PM.jpeg', 'uploads/994740260-small-WhatsApp Image 2026-06-26 at 1.01.47 PM.jpeg', NULL, NULL, NULL, NULL, NULL, 1, 1782735168, NULL),
(84, 'uploads/647954286-6. Earthing diagram - v1.0.png', NULL, NULL, NULL, NULL, 'image/png', 27814, 'uploads/647954286-thumb-6. Earthing diagram - v1.0.png', 'uploads/647954286-small-6. Earthing diagram - v1.0.png', 'purchases', 20, 'document', '49', 'earth', 1, 1782735168, '1782735168_1'),
(85, 'uploads/916324188-WhatsApp Image 2026-06-26 at 12.54.11 PM.jpeg', NULL, NULL, NULL, NULL, 'image/jpeg', 102450, 'uploads/916324188-thumb-WhatsApp Image 2026-06-26 at 12.54.11 PM.jpeg', 'uploads/916324188-small-WhatsApp Image 2026-06-26 at 12.54.11 PM.jpeg', NULL, NULL, NULL, NULL, NULL, 1, 1782735192, NULL),
(86, 'uploads/1160306743-combo4.jpg', NULL, NULL, NULL, NULL, 'image/jpeg', 279028, 'uploads/1160306743-thumb-combo4.jpg', 'uploads/1160306743-small-combo4.jpg', 'purchases', 20, 'document', '50', '1', 1, 1782736745, '1782736745_1'),
(87, 'uploads/1750315571-combo3.jpg', NULL, NULL, NULL, NULL, 'image/jpeg', 1508388, 'uploads/1750315571-thumb-combo3.jpg', 'uploads/1750315571-small-combo3.jpg', 'purchases', 20, 'document', '51', '2', 1, 1782736745, '1782736745_1'),
(88, 'uploads/692987208-Factsheet (WSFP).pdf', NULL, NULL, NULL, NULL, 'application/pdf', 325240, '', '', 'customers', 6, 'document', '49', '3', 1, 1782736745, '1782736745_1'),
(89, 'uploads/1003084028-WhatsApp Image 2025-06-30 at 3.43.03 PM (1).jpeg', NULL, NULL, NULL, NULL, 'image/jpeg', 194314, 'uploads/1003084028-thumb-WhatsApp Image 2025-06-30 at 3.43.03 PM (1).jpeg', 'uploads/1003084028-small-WhatsApp Image 2025-06-30 at 3.43.03 PM (1).jpeg', 'folders', 21, 'document', '50', 'f1', 1, 1782813915, '1782813914_1'),
(90, 'uploads/1811551403-WhatsApp Image 2025-07-26 at 6.37.13 PM (2).jpeg', NULL, NULL, NULL, NULL, 'image/jpeg', 594300, 'uploads/1811551403-thumb-WhatsApp Image 2025-07-26 at 6.37.13 PM (2).jpeg', 'uploads/1811551403-small-WhatsApp Image 2025-07-26 at 6.37.13 PM (2).jpeg', 'folders', 21, 'document', '51', 'f2', 1, 1782813915, '1782813914_1'),
(91, 'uploads/591254547-Wealth Seeds Flexi cap introduction.docx', NULL, NULL, NULL, NULL, 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 14347, '', '', 'folders', 21, 'document', '49', 'f3', 1, 1782813915, '1782813914_1'),
(92, 'uploads/873762403-Factsheet (WSFP).pdf', NULL, NULL, NULL, NULL, 'application/pdf', 325240, '', '', 'folders', 21, 'document', '48', 'f4', 1, 1782813915, '1782813914_1'),
(93, 'uploads/121997404-2.png', NULL, NULL, NULL, NULL, 'image/png', 30028, 'uploads/121997404-thumb-2.png', 'uploads/121997404-small-2.png', NULL, NULL, NULL, NULL, NULL, 1, 1782984718, NULL),
(94, 'uploads/292268074-3.png', NULL, NULL, NULL, NULL, 'image/png', 59487, 'uploads/292268074-thumb-3.png', 'uploads/292268074-small-3.png', NULL, NULL, NULL, NULL, NULL, 1, 1782984866, NULL),
(95, 'uploads/2004828393-4.png', NULL, NULL, NULL, NULL, 'image/png', 69397, 'uploads/2004828393-thumb-4.png', 'uploads/2004828393-small-4.png', NULL, NULL, NULL, NULL, NULL, 1, 1782985154, NULL),
(96, 'uploads/1884243746-IMG-20250630-WA0001.jpg', NULL, NULL, NULL, NULL, 'image/jpeg', 198802, 'uploads/1884243746-thumb-IMG-20250630-WA0001.jpg', 'uploads/1884243746-small-IMG-20250630-WA0001.jpg', NULL, NULL, NULL, NULL, NULL, 1, 1782985343, NULL),
(97, 'uploads/1202491184-Wealth Seeds Flexi cap introduction.docx', NULL, NULL, NULL, NULL, 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 14347, '', '', 'purchases', 21, 'document', '50', 'doc1', 1, 1782985343, '1782985343_1'),
(98, 'uploads/1672217156-Factsheet (WSFP).pdf', NULL, NULL, NULL, NULL, 'application/pdf', 325240, '', '', 'purchases', 21, 'document', '51', 'doc2', 1, 1782985343, '1782985343_1');

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
  `phone` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `aadhaar` varchar(12) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `address` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `user_roles` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `department` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `usertype` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `created_on` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `auth_user` int NOT NULL,
  `updated` int DEFAULT NULL,
  `created` varchar(35) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `active`, `name`, `image`, `email`, `phone`, `aadhaar`, `address`, `user_roles`, `department`, `usertype`, `created_on`, `auth_user`, `updated`, `created`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'yes', 'Admin', NULL, 'jay290489@gmail.com', NULL, NULL, NULL, '6', NULL, 'admin', '', 0, 0, '0'),
(2, '', '', 'yes', 'Jay13', 5, 'jbsofts.net@gmail.com', NULL, NULL, NULL, '6', NULL, '', '', 0, 1782114961, '0'),
(4, '', '', 'yes', 'John', 6, 'jay290489@gmail.com', '3334343444,\r\n5353535345345', '333344445555', 'A /2 / 102, Labh Exotica\r\nRadiyatba Road, Gotri Road,', '6', 'Sales', '', '', 0, 1782118388, '0');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

DROP TABLE IF EXISTS `user_roles`;
CREATE TABLE IF NOT EXISTS `user_roles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_role` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `auth_user` int NOT NULL,
  `updated` int NOT NULL,
  `created` varchar(35) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`id`, `user_role`, `auth_user`, `updated`, `created`) VALUES
(6, 'Developer', 0, 1782126673, '0');

-- --------------------------------------------------------

--
-- Table structure for table `user_role_permission_link`
--

DROP TABLE IF EXISTS `user_role_permission_link`;
CREATE TABLE IF NOT EXISTS `user_role_permission_link` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_role` int NOT NULL,
  `permission` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
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
  `auth_user` int NOT NULL,
  `updated` int DEFAULT NULL,
  `created` varchar(35) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `firm_name`, `firm_email`, `firm_phone`, `firm_address`, `image`, `owner_name`, `owner_email`, `owner_phone`, `pan`, `gst`, `category`, `payment_term`, `active`, `auth_user`, `updated`, `created`) VALUES
(5, 'c', 'e', '33333,\r\n444', 'aa  aa', 7, 'on', 'oe', '6666,\r\n55555,', 'Ahd', 'axip333232', 'packing_material', '90', 'yes', 0, 1782131053, '0'),
(6, 'a', '', '', '', 8, 'dd', '', '', '', '', 'machine_tools', '', 'yes', 0, 1782131060, '0'),
(7, 'vvv1', 'jay290489@gmail.com', '33434,4342,', 'a2 2020', 10, 'ownn', 'enem.com', '3434324242,\r\n23423423432', 'yyyyyyyyyy', 'axip333232', 'raw_material', '30 days', 'no', 0, 1782131942, '0'),
(8, 'MS ', '', '', '', 11, 'on', '', '', '', '', '10', '', 'yes', 1, 1782974801, '0');

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
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

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
(28, 8, 6),
(27, 8, 7);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
