-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 08, 2026 at 01:08 PM
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
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8mb3;

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
(52, 'Purchase docs', 'yes', NULL, 'folder_category', NULL, 1, 1782814369, '1782814369_1'),
(53, 'HDFC', 'yes', NULL, 'bank_account', NULL, 1, 1783425606, '1783425606_1'),
(54, 'SBI', 'yes', NULL, 'bank_account', NULL, 1, 1783425610, '1783425610_1');

-- --------------------------------------------------------

--
-- Table structure for table `boms`
--

DROP TABLE IF EXISTS `boms`;
CREATE TABLE IF NOT EXISTS `boms` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product` int NOT NULL,
  `notes` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `status` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `auth_user` int NOT NULL,
  `updated` int NOT NULL,
  `created` varchar(35) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bom_costs`
--

DROP TABLE IF EXISTS `bom_costs`;
CREATE TABLE IF NOT EXISTS `bom_costs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `cost_type` varchar(30) COLLATE utf8mb3_unicode_ci NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `bom` int NOT NULL,
  `auth_user` int NOT NULL,
  `updated` int NOT NULL,
  `created` varchar(35) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bom_items`
--

DROP TABLE IF EXISTS `bom_items`;
CREATE TABLE IF NOT EXISTS `bom_items` (
  `id` int NOT NULL AUTO_INCREMENT,
  `raw_material` int NOT NULL,
  `quantity` decimal(10,2) NOT NULL,
  `wastage_quantity` decimal(10,2) NOT NULL,
  `bom` int NOT NULL,
  `rate` decimal(10,2) DEFAULT NULL,
  `auth_user` int NOT NULL,
  `updated` int NOT NULL,
  `created` varchar(35) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

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
  `notes` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `auth_user` int DEFAULT NULL,
  `updated` int DEFAULT NULL,
  `created` varchar(35) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

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
  `gst_type` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `price_allotment` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `active` varchar(5) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `auth_user` int NOT NULL,
  `updated` int DEFAULT NULL,
  `created` varchar(35) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

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
  `xxxinvoice` int NOT NULL,
  `auth_user` int NOT NULL,
  `updated` int NOT NULL,
  `created` varchar(35) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

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
  `discount` decimal(10,2) NOT NULL,
  `igst` decimal(10,2) DEFAULT NULL,
  `cgst` decimal(10,2) DEFAULT NULL,
  `sgst` decimal(10,2) DEFAULT NULL,
  `order_id` int NOT NULL,
  `auth_user` int NOT NULL,
  `updated` int NOT NULL,
  `created` varchar(35) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
CREATE TABLE IF NOT EXISTS `payments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `type` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `notes` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `status` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `purchase` int DEFAULT NULL,
  `vendor` int DEFAULT NULL,
  `customer` int NOT NULL,
  `invoice` int NOT NULL,
  `payment_mode` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `reference_no` varchar(200) COLLATE utf8mb3_unicode_ci NOT NULL,
  `bank_account` varchar(100) COLLATE utf8mb3_unicode_ci NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `payment_date` int DEFAULT NULL,
  `transaction_type` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `attachment` int NOT NULL,
  `auth_user` int NOT NULL,
  `updated` int NOT NULL,
  `created` varchar(35) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

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
  `igst` float DEFAULT NULL,
  `cgst` float DEFAULT NULL,
  `sgst` float DEFAULT NULL,
  `auth_user` int NOT NULL,
  `updated` int NOT NULL,
  `created` varchar(35) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=91 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product`, `code`, `description`, `category`, `image`, `quality`, `type`, `pieces`, `igst`, `cgst`, `sgst`, `auth_user`, `updated`, `created`) VALUES
(1, 'Side Guard [2\" Patta]', 'SGM-004', '', '24', 0, '30', '2\" Patta', 2, 18, 9, 9, 1, 1783510626, '1783510626_1'),
(2, 'Side Guard [3\" Patta]', 'SGM-005', '', '24', 0, '30', '3\" Patta', 2, 18, 9, 9, 1, 1783510626, '1783510626_1'),
(3, 'Side Guard [V Design, Patta]', 'SGM-006', '', '24', 0, '30', 'V Design, Patta', 2, 18, 9, 9, 1, 1783510626, '1783510626_1'),
(4, 'Rear Guard [V Design, Patta]', 'RGM-001', '', '24', 0, '30', 'V Design, Patta', 1, 18, 9, 9, 1, 1783510626, '1783510626_1'),
(5, 'Front Guard [Channel]', 'FGM-004', '', '25', 0, '30', 'Channel', 1, 18, 9, 9, 1, 1783510626, '1783510626_1'),
(6, 'Side Guard [Double channel]', 'SGM-001', '', '25', 0, '30', 'Double channel', 2, 18, 9, 9, 1, 1783510626, '1783510626_1'),
(7, 'Rear Guard [Angle, Colour]', 'RGM-004', '', '26', 0, '30', 'Angle, Colour', 1, 18, 9, 9, 1, 1783510626, '1783510626_1'),
(8, 'Side Guard [Triple channel]', 'SGM-003', '', '25', 0, '30', 'Triple channel', 2, 18, 9, 9, 1, 1783510626, '1783510626_1'),
(9, 'Side Guard [Double channel, Design]', 'SGM-002', '', '25', 0, '30', 'Double channel, Design', 2, 18, 9, 9, 1, 1783510626, '1783510626_1'),
(10, 'Front Guard [Raj (Paris)]', 'FGM-001', '', '23', 0, '30', 'Raj (Paris)', 1, 18, 9, 9, 1, 1783510626, '1783510626_1'),
(11, 'Front Guard [Activa Type]', 'FGM-002', '', '23', 0, '30', 'Activa Type', 1, 18, 9, 9, 1, 1783510626, '1783510626_1'),
(12, 'Front Guard [Nose Type (Old Model)]', 'FGM-003', '', '23', 0, '30', 'Nose Type (Old Model)', 1, 18, 9, 9, 1, 1783510626, '1783510626_1'),
(13, 'Front Guard [Half]', 'FGM-005', '', '23', 0, '30', 'Half', 1, 18, 9, 9, 1, 1783510626, '1783510626_1'),
(14, 'Front Guard [Raj, Heavy (Rajkot)]', 'FGM-006', '', '23', 0, '30', 'Raj, Heavy (Rajkot)', 1, 18, 9, 9, 1, 1783510626, '1783510626_1'),
(15, 'Front Guard [Fancy]', 'FGM-007', '', '23', 0, '30', 'Fancy', 1, 18, 9, 9, 1, 1783510626, '1783510626_1'),
(16, 'Side Guard [1\", Hockey]', 'SGM-007', '', '23', 0, '30', '1\", Hockey', 2, 18, 9, 9, 1, 1783510626, '1783510626_1'),
(17, 'Side Guard [1\" Hockey, With Gola]', 'SGM-008', '', '23', 0, '30', '1\" Hockey, With Gola', 2, 18, 9, 9, 1, 1783510626, '1783510626_1'),
(18, 'Side Guard [7/8, Pipe]', 'SGM-009', '', '23', 0, '30', '7/8, Pipe', 2, 18, 9, 9, 1, 1783510626, '1783510626_1'),
(19, 'Side Guard [1\", Pipe]', 'SGM-010', '', '23', 0, '30', '1\", Pipe', 2, 18, 9, 9, 1, 1783510626, '1783510626_1'),
(20, 'Side Guard [1.25\", Pipe]', 'SGM-011', '', '23', 0, '30', '1.25\", Pipe', 2, 18, 9, 9, 1, 1783510626, '1783510626_1'),
(21, 'Side Guard [1.25\" Fancy]', 'SGM-012', '', '23', 0, '30', '1.25\" Fancy', 2, 18, 9, 9, 1, 1783510626, '1783510626_1'),
(22, 'Side Guard [Three Pipe, Flower]', 'SGM-013', '', '23', 0, '30', 'Three Pipe, Flower', 2, 18, 9, 9, 1, 1783510626, '1783510626_1'),
(23, 'Rear Guard [1.25\"]', 'RGM-006', '', '23', 0, '30', '1.25\"', 1, 18, 9, 9, 1, 1783510626, '1783510626_1'),
(24, 'Rear Guard [1.25\" Fancy]', 'RGM-007', '', '23', 0, '30', '1.25\" Fancy', 1, 18, 9, 9, 1, 1783510626, '1783510626_1'),
(25, 'Rear Guard [1.5\"]', 'RGM-008', '', '23', 0, '30', '1.5\"', 1, 18, 9, 9, 1, 1783510626, '1783510626_1'),
(26, 'Head Light Grill [2010]', 'HLGM-001', '', '23', 0, '30', '2010', 2, 18, 9, 9, 1, 1783510626, '1783510626_1'),
(27, 'Head Light Grill [Compact]', 'HLGM-002', '', '23', 0, '30', 'Compact', 2, 18, 9, 9, 1, 1783510626, '1783510626_1'),
(28, 'No Entry [Oval Pipe]', 'NEM-003', '', '23', 0, '30', 'Oval Pipe', 1, 18, 9, 9, 1, 1783510626, '1783510626_1'),
(29, 'Front Guard [Optima/Maxima]', 'MOFGM-001', '', '23', 0, '30', 'Optima/Maxima', 1, 18, 9, 9, 1, 1783510626, '1783510626_1'),
(30, 'Side Guard [0.75\", Optima/Maxima]', 'MOSGM-001', '', '23', 0, '30', '0.75\", Optima/Maxima', 2, 18, 9, 9, 1, 1783510626, '1783510626_1'),
(31, 'Head Light Grill [Optima/Maxima]', 'MOHGM-001', '', '23', 0, '30', 'Optima/Maxima', 2, 18, 9, 9, 1, 1783510626, '1783510626_1'),
(32, 'Front Indicator Grill [Optima/Maxima]', 'MOFIGM-001', '', '23', 0, '30', 'Optima/Maxima', 2, 18, 9, 9, 1, 1783510626, '1783510626_1'),
(33, 'Front Guard [5/8, Ape]', 'AFGM-001', '', '23', 0, '30', '5/8, Ape', 1, 18, 9, 9, 1, 1783510626, '1783510626_1'),
(34, 'Front Guard [0.75\", Ape, Heavy]', 'AFGM-002', '', '23', 0, '30', '0.75\", Ape, Heavy', 1, 18, 9, 9, 1, 1783510626, '1783510626_1'),
(35, 'Head Light Grill [Ape, Pipe]', 'AHGM-002', '', '23', 0, '30', 'Ape, Pipe', 2, 18, 9, 9, 1, 1783510626, '1783510626_1'),
(36, 'Front Guard [Ape City]', 'ACFGM-001', '', '23', 0, '30', 'Ape City', 1, 18, 9, 9, 1, 1783510626, '1783510626_1'),
(37, 'Head Light Grill [Ape City]', 'ACHGM-001', '', '23', 0, '30', 'Ape City', 2, 18, 9, 9, 1, 1783510626, '1783510626_1'),
(38, 'Break Light Grill [Ape City]', 'ACBGM-001', '', '23', 0, '30', 'Ape City', 2, 18, 9, 9, 1, 1783510626, '1783510626_1'),
(39, 'Head Light Grill [Atul]', 'ATHGM-001', '', '23', 0, '30', 'Atul', 2, 18, 9, 9, 1, 1783510626, '1783510626_1'),
(40, 'Head Light Grill [Alpha (Mahindra)]', 'ALHGM-001', '', '23', 0, '30', 'Alpha (Mahindra)', 2, 18, 9, 9, 1, 1783510626, '1783510626_1'),
(41, 'Handle [0.75\", Design, 7\"]', '', '', '23', 0, '30', '0.75\", Design, 7\"', 3, 18, 9, 9, 1, 1783510626, '1783510626_1'),
(42, 'Handle [1\", Design, 7\"]', '', '', '23', 0, '30', '1\", Design, 7\"', 2, 18, 9, 9, 1, 1783510626, '1783510626_1'),
(43, 'Rear Guard [Angle, Chrome]', 'RGM-005', '', '26', 0, '30', 'Angle, Chrome', 1, 18, 9, 9, 1, 1783510626, '1783510626_1'),
(44, 'No Entry [Angle, Chrome]', 'NEM-002', '', '26', 0, '30', 'Angle, Chrome', 1, 18, 9, 9, 1, 1783510626, '1783510626_1'),
(45, 'No Entry [Ape, Angle, Chrome]', 'ANEM-001', '', '26', 0, '30', 'Ape, Angle, Chrome', 1, 18, 9, 9, 1, 1783510626, '1783510626_1'),
(46, 'Mud Flap Fitting [Angle, Heavy, Small]', 'MFFM-003', '', '26', 0, '30', 'Angle, Heavy, Small', 2, 18, 9, 9, 1, 1783510626, '1783510626_1'),
(47, 'Mud Flap Fitting [Angle, Heavy, Big]', 'MFFM-004', '', '26', 0, '30', 'Angle, Heavy, Big', 2, 18, 9, 9, 1, 1783510626, '1783510626_1'),
(48, 'Front Indicator Grill [Compact, Round Saliya]', 'FIGM-001', '', '27', 0, '30', 'Compact, Round Saliya', 2, 18, 9, 9, 1, 1783510626, '1783510626_1'),
(49, 'Front Indicator Grill [Old Model, Square Saliya]', 'FIGM-002', '', '27', 0, '30', 'Old Model, Square Saliya', 2, 18, 9, 9, 1, 1783510626, '1783510626_1'),
(50, 'Front Indicator Grill [Compact, Square Saliya]', 'FIGM-003', '', '27', 0, '30', 'Compact, Square Saliya', 2, 18, 9, 9, 1, 1783510626, '1783510626_1'),
(51, 'Back Indicator Grill [Compact, Round Saliya]', 'BIGM-001', '', '27', 0, '30', 'Compact, Round Saliya', 2, 18, 9, 9, 1, 1783510626, '1783510626_1'),
(52, 'Back Indicator Grill [Old Model, Square Saliya]', 'BIGM-002', '', '27', 0, '30', 'Old Model, Square Saliya', 2, 18, 9, 9, 1, 1783510626, '1783510626_1'),
(53, 'Back Indicator Grill [Compact, Square Saliya]', 'BIGM-003', '', '27', 0, '30', 'Compact, Square Saliya', 2, 18, 9, 9, 1, 1783510626, '1783510626_1'),
(54, 'Head Light Grill [APE, Salia]', 'AHGM-001', '', '27', 0, '30', 'APE, Salia', 2, 18, 9, 9, 1, 1783510626, '1783510626_1'),
(55, 'Front Guard [Half]', 'FGS-005', '', '29', 0, '31', 'Half', 1, 18, 9, 9, 1, 1783510626, '1783510626_1'),
(56, 'Front Guard [Raj, Heavy (Rajkot)]', 'FGS-006', '', '29', 0, '31', 'Raj, Heavy (Rajkot)', 1, 18, 9, 9, 1, 1783510626, '1783510626_1'),
(57, 'Front Guard [Fancy]', 'FGS-007', '', '29', 0, '31', 'Fancy', 1, 18, 9, 9, 1, 1783510626, '1783510626_1'),
(58, 'Side Guard [1\", Hockey]', 'SGS-007', '', '29', 0, '31', '1\", Hockey', 2, 18, 9, 9, 1, 1783510626, '1783510626_1'),
(59, 'Side Guard [1\", Hockey, With Gola]', 'SGS-008', '', '29', 0, '31', '1\", Hockey, With Gola', 2, 18, 9, 9, 1, 1783510626, '1783510626_1'),
(60, 'Side Guard [7/8, Pipe]', 'SGS-009', '', '29', 0, '31', '7/8, Pipe', 2, 18, 9, 9, 1, 1783510626, '1783510626_1'),
(61, 'Side Guard [1\", Pipe]', 'SGS-010', '', '29', 0, '31', '1\", Pipe', 2, 18, 9, 9, 1, 1783510626, '1783510626_1'),
(62, 'Side Guard [1.25\", Pipe]', 'SGS-011', '', '29', 0, '31', '1.25\", Pipe', 2, 18, 9, 9, 1, 1783510626, '1783510626_1'),
(63, 'Side Guard [1.25\", Fancy]', 'SGS-012', '', '29', 0, '31', '1.25\", Fancy', 2, 18, 9, 9, 1, 1783510626, '1783510626_1'),
(64, 'Side Guard [Double pipe, Fancy]', 'SGS-014', '', '29', 0, '31', 'Double pipe, Fancy', 2, 18, 9, 9, 1, 1783510626, '1783510626_1'),
(65, 'Rear Guard [1.25\", Pipe]', 'RGS-006', '', '29', 0, '31', '1.25\", Pipe', 1, 18, 9, 9, 1, 1783510626, '1783510626_1'),
(66, 'Rear Guard [1.25\" Fancy]', 'RGS-007', '', '29', 0, '31', '1.25\" Fancy', 1, 18, 9, 9, 1, 1783510626, '1783510626_1'),
(67, 'Rear Guard [1.50\", Pipe]', 'RGS-008', '', '29', 0, '31', '1.50\", Pipe', 1, 18, 9, 9, 1, 1783510626, '1783510626_1'),
(68, 'Rear Guard [Double pipe, Fancy]', 'RGS-009', '', '29', 0, '31', 'Double pipe, Fancy', 1, 18, 9, 9, 1, 1783510626, '1783510626_1'),
(69, 'Rear Guard [2\", Pipe]', 'RGS-010', '', '29', 0, '31', '2\", Pipe', 1, 18, 9, 9, 1, 1783510626, '1783510626_1'),
(70, 'Rear Guard [Square, Pipe]', 'RGS-011', '', '29', 0, '31', 'Square, Pipe', 1, 18, 9, 9, 1, 1783510626, '1783510626_1'),
(71, 'No Entry [Oval Pipe]', 'NES-003', '', '29', 0, '31', 'Oval Pipe', 1, 18, 9, 9, 1, 1783510626, '1783510626_1'),
(72, 'Front Guard [Optima/Maxima]', 'MOFGS-001', '', '29', 0, '31', 'Optima/Maxima', 1, 18, 9, 9, 1, 1783510626, '1783510626_1'),
(73, 'Head light Grill [Optima/Maxima]', 'MOHGS-001', '', '29', 0, '31', 'Optima/Maxima', 2, 18, 9, 9, 1, 1783510626, '1783510626_1'),
(74, 'Front Indicator Grill [Optima/Maxima]', 'MOFIGS-001', '', '29', 0, '31', 'Optima/Maxima', 2, 18, 9, 9, 1, 1783510626, '1783510626_1'),
(75, 'Break Indicator Grill [Optima/Maxima]', 'MOBGS-001', '', '29', 0, '31', 'Optima/Maxima', 2, 18, 9, 9, 1, 1783510626, '1783510626_1'),
(76, 'Side Guard [Optima/Maxima]', 'MOSGS-001', '', '29', 0, '31', 'Optima/Maxima', 2, 18, 9, 9, 1, 1783510626, '1783510626_1'),
(77, 'Rear Guard [Optima/Maxima]', 'MORGS-001', '', '29', 0, '31', 'Optima/Maxima', 1, 18, 9, 9, 1, 1783510626, '1783510626_1'),
(78, 'Break Indicator Grill [Ape, Pipe]', 'ABGS-001', '', '29', 0, '31', 'Ape, Pipe', 2, 18, 9, 9, 1, 1783510626, '1783510626_1'),
(79, 'Front Guard [Ape City]', 'ACFGS-001', '', '29', 0, '31', 'Ape City', 1, 18, 9, 9, 1, 1783510626, '1783510626_1'),
(80, 'Head light Grill [Ape City]', 'ACHGS-001', '', '29', 0, '31', 'Ape City', 2, 18, 9, 9, 1, 1783510626, '1783510626_1'),
(81, 'Break light Grill [Ape City]', 'ACBGS-001', '', '29', 0, '31', 'Ape City', 2, 18, 9, 9, 1, 1783510626, '1783510626_1'),
(82, 'Side Guard [Ape City]', 'ACSGS-001', '', '29', 0, '31', 'Ape City', 2, 18, 9, 9, 1, 1783510626, '1783510626_1'),
(83, 'Front Guard [TVS]', '', '', '29', 0, '31', 'TVS', 1, 18, 9, 9, 1, 1783510626, '1783510626_1'),
(84, 'Head Light Grill [TVS, Saliya, Pipe]', '', '', '29', 0, '31', 'TVS, Saliya, Pipe', 2, 18, 9, 9, 1, 1783510626, '1783510626_1'),
(85, 'Front Indicator Grill [Compact, Round Saliya]', 'FIGS-001', '', '28', 0, '31', 'Compact, Round Saliya', 2, 18, 9, 9, 1, 1783510626, '1783510626_1'),
(86, 'Front Indicator Grill [Compact, Square Saliya]', 'FIGS-003', '', '28', 0, '31', 'Compact, Square Saliya', 2, 18, 9, 9, 1, 1783510626, '1783510626_1'),
(87, 'Front Indicator Grill [Compact, Round Saliya, Heavy]', 'FIGS-004', '', '28', 0, '31', 'Compact, Round Saliya, Heavy', 2, 18, 9, 9, 1, 1783510626, '1783510626_1'),
(88, 'Back Indicator Grill [Compact, Round Saliya]', 'BIGS-001', '', '28', 0, '31', 'Compact, Round Saliya', 2, 18, 9, 9, 1, 1783510626, '1783510626_1'),
(89, 'Back Indicator Grill [Compact, Square Saliya]', 'BIGS-003', '', '28', 0, '31', 'Compact, Square Saliya', 2, 18, 9, 9, 1, 1783510626, '1783510626_1'),
(90, 'Back Indicator Grill [Compact, Round Saliya, Heavy]', 'BIGS-004', '', '28', 0, '31', 'Compact, Round Saliya, Heavy', 2, 18, 9, 9, 1, 1783510626, '1783510626_1');

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

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
) ENGINE=MyISAM AUTO_INCREMENT=67 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `raw_materials`
--

INSERT INTO `raw_materials` (`id`, `raw_material`, `code`, `unit`, `description`, `category`, `image`, `auth_user`, `updated`, `created`) VALUES
(1, 'MS Pipe (3/8, 19 Guage)', '', 'Kg', '', '12', NULL, 1, 1783514011, '1783514011_1'),
(2, 'MS Pipe (5/8, 19 Guage)', '', 'Kg', '', '12', NULL, 1, 1783514011, '1783514011_1'),
(3, 'MS Pipe (5/8, 21 Guage)', '', 'Kg', '', '12', NULL, 1, 1783514011, '1783514011_1'),
(4, 'MS Pipe (7/8, 19 Guage)', '', 'Kg', '', '12', NULL, 1, 1783514011, '1783514011_1'),
(5, 'MS Pipe (7/8, 21 Guage)', '', 'Kg', '', '12', NULL, 1, 1783514011, '1783514011_1'),
(6, 'MS Pipe (0.75\", 19 Guage)', '', 'Kg', '', '12', NULL, 1, 1783514011, '1783514011_1'),
(7, 'MS Pipe (0.75\", 21 Guage)', '', 'Kg', '', '12', NULL, 1, 1783514011, '1783514011_1'),
(8, 'MS Pipe (1\", 19 Guage)', '', 'Kg', '', '12', NULL, 1, 1783514011, '1783514011_1'),
(9, 'MS Pipe (1\", 21 Guage)', '', 'Kg', '', '12', NULL, 1, 1783514011, '1783514011_1'),
(10, 'MS Pipe (1.25\", 19 Guage)', '', 'Kg', '', '12', NULL, 1, 1783514011, '1783514011_1'),
(11, 'MS Pipe (1.25\", 21 Guage)', '', 'Kg', '', '12', NULL, 1, 1783514011, '1783514011_1'),
(12, 'MS Pipe (1.50\", 19 Guage)', '', 'Kg', '', '12', NULL, 1, 1783514011, '1783514011_1'),
(13, 'MS Pipe (1.50\", 21 Guage)', '', 'Kg', '', '12', NULL, 1, 1783514011, '1783514011_1'),
(14, 'MS Pipe (33/13, 19 Guage)', '', 'Kg', '', '12', NULL, 1, 1783514011, '1783514011_1'),
(15, 'SS Pipe (3/8, 21 Guage)', '', 'Kg', '', '13', NULL, 1, 1783514011, '1783514011_1'),
(16, 'SS Pipe (5/8, 21 Guage)', '', 'Kg', '', '13', NULL, 1, 1783514011, '1783514011_1'),
(17, 'SS Pipe (5/8, 23 Guage)', '', 'Kg', '', '13', NULL, 1, 1783514011, '1783514011_1'),
(18, 'SS Pipe (7/8, 21 Guage)', '', 'Kg', '', '13', NULL, 1, 1783514011, '1783514011_1'),
(19, 'SS Pipe (7/8, 23 Guage)', '', 'Kg', '', '13', NULL, 1, 1783514011, '1783514011_1'),
(20, 'SS Pipe (0.75\", 21 Guage)', '', 'Kg', '', '13', NULL, 1, 1783514011, '1783514011_1'),
(21, 'SS Pipe (0.75\", 23 Guage)', '', 'Kg', '', '13', NULL, 1, 1783514011, '1783514011_1'),
(22, 'SS Pipe (1\", 21 Guage)', '', 'Kg', '', '13', NULL, 1, 1783514011, '1783514011_1'),
(23, 'SS Pipe (1\", 23 Guage)', '', 'Kg', '', '13', NULL, 1, 1783514011, '1783514011_1'),
(24, 'SS Pipe (1.25\", 21 Guage)', '', 'Kg', '', '13', NULL, 1, 1783514011, '1783514011_1'),
(25, 'SS Pipe (1.25\", 23 Guage)', '', 'Kg', '', '13', NULL, 1, 1783514011, '1783514011_1'),
(26, 'SS Pipe (1.50\", 21 Guage)', '', 'Kg', '', '13', NULL, 1, 1783514011, '1783514011_1'),
(27, 'SS Pipe (1.50\", 23 Guage)', '', 'Kg', '', '13', NULL, 1, 1783514011, '1783514011_1'),
(28, 'SS Pipe (2\", 21 Guage)', '', 'Kg', '', '13', NULL, 1, 1783514011, '1783514011_1'),
(29, 'SS Pipe (2\", 23 Guage)', '', 'Kg', '', '13', NULL, 1, 1783514011, '1783514011_1'),
(30, 'SS Pipe (33/13, 21 Guage)', '', 'Kg', '', '13', NULL, 1, 1783514011, '1783514011_1'),
(31, 'SS Pipe (2x4, Square, 23 Guage)', '', 'Kg', '', '13', NULL, 1, 1783514011, '1783514011_1'),
(32, 'Patti (0.75)', '', 'Kg', '', '14', NULL, 1, 1783514011, '1783514011_1'),
(33, 'Patti (1\")', '', 'Kg', '', '14', NULL, 1, 1783514011, '1783514011_1'),
(34, 'Patti (1.25\")', '', 'Kg', '', '14', NULL, 1, 1783514011, '1783514011_1'),
(35, 'Sheet (10 Guage (3mm))', '', 'Kg', '', '15', NULL, 1, 1783514011, '1783514011_1'),
(36, 'Sheet (14 Guage (2mm))', '', 'Kg', '', '15', NULL, 1, 1783514011, '1783514011_1'),
(37, 'Sheet (22 Guage (0.7mm))', '', 'Kg', '', '15', NULL, 1, 1783514011, '1783514011_1'),
(38, 'Angle (29x2)', '', 'Kg', '', '16', NULL, 1, 1783514011, '1783514011_1'),
(39, 'Saliya (4mm, Square, M.S)', '', 'Kg', '', '17', NULL, 1, 1783514011, '1783514011_1'),
(40, 'Saliya (6mm, Square, M.S)', '', 'Kg', '', '17', NULL, 1, 1783514011, '1783514011_1'),
(41, 'Saliya (1mm, Round, M.S)', '', 'Kg', '', '17', NULL, 1, 1783514011, '1783514011_1'),
(42, 'Saliya (4mm, Round, M.S)', '', 'Kg', '', '17', NULL, 1, 1783514011, '1783514011_1'),
(43, 'Saliya (6mm, Round, M.S)', '', 'Kg', '', '17', NULL, 1, 1783514011, '1783514011_1'),
(44, 'Saliya (4mm, Square, S.S)', '', 'Kg', '', '17', NULL, 1, 1783514011, '1783514011_1'),
(45, 'Saliya (6mm, Square, S.S)', '', 'Kg', '', '17', NULL, 1, 1783514011, '1783514011_1'),
(46, 'Saliya (4mm, Round, S.S)', '', 'Kg', '', '17', NULL, 1, 1783514011, '1783514011_1'),
(47, 'Saliya (6mm, Round, S.S)', '', 'Kg', '', '17', NULL, 1, 1783514011, '1783514011_1'),
(48, 'C channel (19 / 2)', '', 'Kg', '', '18', NULL, 1, 1783514011, '1783514011_1'),
(49, '0.75\" Katori M.S', '', 'Kg', '', '19', NULL, 1, 1783514011, '1783514011_1'),
(50, '1\" Katori M.S', '', 'Kg', '', '19', NULL, 1, 1783514011, '1783514011_1'),
(51, '1.25\" Katori M.S', '', 'Kg', '', '19', NULL, 1, 1783514011, '1783514011_1'),
(52, '1.50\" Katori M.S', '', 'Kg', '', '19', NULL, 1, 1783514011, '1783514011_1'),
(53, '0.75\" Katori S.S', '', 'Kg', '', '19', NULL, 1, 1783514011, '1783514011_1'),
(54, '1\" Katori S.S', '', 'Kg', '', '19', NULL, 1, 1783514011, '1783514011_1'),
(55, '1.25\" Katori S.S', '', 'Kg', '', '19', NULL, 1, 1783514011, '1783514011_1'),
(56, '1.50\" Katori S.S', '', 'Kg', '', '19', NULL, 1, 1783514011, '1783514011_1'),
(57, 'Small Gola, S.S', '', 'Pc', '', '19', NULL, 1, 1783514011, '1783514011_1'),
(58, 'Medium Gola S.S', '', 'Pc', '', '19', NULL, 1, 1783514011, '1783514011_1'),
(59, 'Big Gola S.S', '', 'Pc', '', '19', NULL, 1, 1783514011, '1783514011_1'),
(60, 'Weilding Rods (M.S)', '', 'Pkt', '', '22', NULL, 1, 1783514011, '1783514011_1'),
(61, 'Weilding Rods (S.S)', '', 'Pkt', '', '22', NULL, 1, 1783514011, '1783514011_1'),
(62, 'Weilding Rolls (M.S)', '', 'Pc', '', '21', NULL, 1, 1783514011, '1783514011_1'),
(63, 'Weilding Rolls (S.S)', '', 'Pc', '', '21', NULL, 1, 1783514011, '1783514011_1'),
(64, 'Gas (Co2)', '', 'Nos.', '', '20', NULL, 1, 1783514011, '1783514011_1'),
(65, 'Gas (Oxygen)', '', 'Nos.', '', '20', NULL, 1, 1783514011, '1783514011_1'),
(66, 'Gas (Aargun)', '', 'Nos.', '', '20', NULL, 1, 1783514011, '1783514011_1');

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `raw_material_rates`
--

DROP TABLE IF EXISTS `raw_material_rates`;
CREATE TABLE IF NOT EXISTS `raw_material_rates` (
  `id` int NOT NULL AUTO_INCREMENT,
  `entity` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `rate` decimal(10,2) NOT NULL,
  `effective_date` int NOT NULL,
  `auth_user` int NOT NULL,
  `updated` int NOT NULL,
  `created` varchar(35) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `raw_material_rate_groups`
--

DROP TABLE IF EXISTS `raw_material_rate_groups`;
CREATE TABLE IF NOT EXISTS `raw_material_rate_groups` (
  `id` int NOT NULL AUTO_INCREMENT,
  `raw_material_rate_group` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `auth_user` int NOT NULL,
  `updated` int NOT NULL,
  `created` varchar(35) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `raw_material_rate_group_link`
--

DROP TABLE IF EXISTS `raw_material_rate_group_link`;
CREATE TABLE IF NOT EXISTS `raw_material_rate_group_link` (
  `id` int NOT NULL AUTO_INCREMENT,
  `raw_material_rate_group` int NOT NULL,
  `raw_material` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

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
(23, 4, 'user_roles-delete'),
(22, 4, 'user_roles-update'),
(21, 4, 'users-create'),
(20, 4, 'symbols-read');

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
