-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 08, 2026 at 04:31 PM
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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `boms`
--

INSERT INTO `boms` (`id`, `product`, `notes`, `status`, `auth_user`, `updated`, `created`) VALUES
(1, 30, '', 'active', 1, 1783522305, '1783522305_1');

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
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `bom_costs`
--

INSERT INTO `bom_costs` (`id`, `cost_type`, `amount`, `bom`, `auth_user`, `updated`, `created`) VALUES
(1, 'labour', 20.00, 1, 1, 1783522657, '1783522657_1'),
(2, 'electricity', 5.00, 1, 1, 1783522657, '1783522657_1'),
(3, 'machining', 20.00, 1, 1, 1783522657, '1783522657_1');

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
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `bom_items`
--

INSERT INTO `bom_items` (`id`, `raw_material`, `quantity`, `wastage_quantity`, `bom`, `rate`, `auth_user`, `updated`, `created`) VALUES
(1, 6, 0.30, 0.00, 1, NULL, 1, 1783522615, '1783522364_1'),
(2, 7, 0.10, 0.00, 1, NULL, 1, 1783522597, '1783522364_1'),
(3, 32, 0.20, 0.00, 1, NULL, 1, 1783522585, '1783522364_1');

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
) ENGINE=MyISAM AUTO_INCREMENT=66 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `column_history`
--

INSERT INTO `column_history` (`id`, `table_name`, `row_id`, `column_name`, `value`, `notes`, `auth_user`, `updated`, `created`) VALUES
(1, 'orders', 1, 'status', 'order_placed', NULL, 1, 1783518855, '1783518855'),
(2, 'orders', 1, 'payment_status', 'pending', NULL, 1, 1783518855, '1783518855'),
(3, 'order_items', 1, 'quantity', '25', NULL, 1, 1783519064, '1783519064'),
(4, 'order_items', 2, 'quantity', '25', NULL, 1, 1783519064, '1783519064'),
(5, 'order_items', 3, 'quantity', '10', NULL, 1, 1783519064, '1783519064'),
(6, 'order_items', 4, 'quantity', '10', NULL, 1, 1783519064, '1783519064'),
(7, 'dispatchs', 1, 'status', 'new', NULL, 1, 1783520110, '1783520110'),
(8, 'product_lots', 1, 'status', 'ready', NULL, 1, 1783521095, '1783521095'),
(9, 'product_lots', 2, 'status', 'ready', NULL, 1, 1783521194, '1783521194'),
(10, 'product_lots', 3, 'status', 'ready', NULL, 1, 1783521234, '1783521234'),
(11, 'product_lots', 3, 'status', 'under_packaging', NULL, 1, 1783521252, '1783521252'),
(12, 'product_lots', 3, 'status', 'ready', NULL, 1, 1783521271, '1783521271'),
(13, 'product_lots', 4, 'status', 'ready', NULL, 1, 1783521320, '1783521320'),
(14, 'dispatch_items', 1, 'quantity', '5', NULL, 1, 1783521422, '1783521422'),
(15, 'dispatch_items', 2, 'quantity', '10', NULL, 1, 1783521422, '1783521422'),
(16, 'dispatch_items', 3, 'quantity', '10', NULL, 1, 1783521422, '1783521422'),
(17, 'dispatch_items', 4, 'quantity', '5', NULL, 1, 1783521539, '1783521539'),
(18, 'dispatch_items', 5, 'quantity', '10', NULL, 1, 1783521539, '1783521539'),
(19, 'dispatch_items', 6, 'quantity', '5', NULL, 1, 1783521539, '1783521539'),
(20, 'dispatch_items', 7, 'quantity', '5', NULL, 1, 1783521539, '1783521539'),
(21, 'dispatchs', 1, 'status', 'packed_and_ready', NULL, 1, 1783521603, '1783521603'),
(22, 'invoices', 1, 'status', 'draft', NULL, 1, 1783521624, '1783521624'),
(23, 'invoice_items', 1, 'rate', '355', NULL, 1, 1783521819, '1783521819'),
(24, 'invoice_items', 1, 'discount', '1', NULL, 1, 1783521819, '1783521819'),
(25, 'invoice_items', 2, 'rate', '270', NULL, 1, 1783521819, '1783521819'),
(26, 'invoice_items', 2, 'discount', '2', NULL, 1, 1783521819, '1783521819'),
(27, 'invoice_items', 3, 'rate', '165', NULL, 1, 1783521819, '1783521819'),
(28, 'invoice_items', 3, 'discount', '3', NULL, 1, 1783521819, '1783521819'),
(29, 'invoice_items', 4, 'rate', '130', NULL, 1, 1783521819, '1783521819'),
(30, 'invoice_items', 4, 'discount', '4', NULL, 1, 1783521819, '1783521819'),
(31, 'dispatchs', 1, 'status', 'invoice_generated', '', 1, 1783521819, '1783521819'),
(32, 'invoices', 1, 'status', 'generated', '', 1, 1783521819, '1783521819'),
(33, 'invoice_items', 1, 'rate', '356', NULL, 1, 1783521874, '1783521874'),
(34, 'dispatchs', 1, 'status', 'dispatched', NULL, 1, 1783521978, '1783521978'),
(35, 'dispatchs', 2, 'status', 'new', NULL, 1, 1783522059, '1783522059'),
(36, 'boms', 1, 'status', 'active', NULL, 1, 1783522305, '1783522305'),
(37, 'bom_items', 1, 'quantity', '1', NULL, 1, 1783522364, '1783522364'),
(38, 'bom_items', 1, 'wastage_quantity', '0', NULL, 1, 1783522364, '1783522364'),
(39, 'bom_items', 2, 'quantity', '1', NULL, 1, 1783522364, '1783522364'),
(40, 'bom_items', 2, 'wastage_quantity', '0', NULL, 1, 1783522364, '1783522364'),
(41, 'bom_items', 3, 'quantity', '1', NULL, 1, 1783522364, '1783522364'),
(42, 'bom_items', 3, 'wastage_quantity', '0', NULL, 1, 1783522364, '1783522364'),
(43, 'bom_items', 3, 'quantity', '1.11', NULL, 1, 1783522541, '1783522541'),
(44, 'bom_items', 3, 'quantity', '11.156', NULL, 1, 1783522549, '1783522549'),
(45, 'bom_items', 3, 'quantity', '11.56845', NULL, 1, 1783522559, '1783522559'),
(46, 'bom_items', 3, 'quantity', '0.20', NULL, 1, 1783522585, '1783522585'),
(47, 'bom_items', 2, 'quantity', '.1', NULL, 1, 1783522597, '1783522597'),
(48, 'bom_items', 1, 'quantity', '0.3', NULL, 1, 1783522615, '1783522615'),
(49, 'bom_costs', 1, 'amount', '20', NULL, 1, 1783522657, '1783522657'),
(50, 'bom_costs', 2, 'amount', '5', NULL, 1, 1783522657, '1783522657'),
(51, 'bom_costs', 3, 'amount', '20', NULL, 1, 1783522657, '1783522657'),
(52, 'dispatch_items', 8, 'quantity', '2', NULL, 1, 1783522699, '1783522699'),
(53, 'invoices', 2, 'status', 'draft', NULL, 1, 1783522717, '1783522717'),
(54, 'raw_material_rates', 30, 'rate', '50', NULL, 1, 1783523375, '1783523375'),
(55, 'raw_material_rates', 1, 'rate', '50', NULL, 1, 1783525606, '1783525606'),
(56, 'raw_material_rates', 1, 'effective_date', '20260708', NULL, 1, 1783525606, '1783525606'),
(57, 'raw_material_rates', 2, 'rate', '20', NULL, 1, 1783525656, '1783525656'),
(58, 'raw_material_rates', 2, 'effective_date', '20260708', NULL, 1, 1783525656, '1783525656'),
(59, 'invoice_items', 5, 'rate', '97', NULL, 1, 1783526413, '1783526413'),
(60, 'invoice_items', 5, 'discount', '1', NULL, 1, 1783526413, '1783526413'),
(61, 'dispatchs', 2, 'status', 'invoice_generated', '', 1, 1783526413, '1783526413'),
(62, 'invoices', 2, 'status', 'generated', '', 1, 1783526413, '1783526413'),
(63, 'payments', 1, 'status', 'completed', NULL, 1, 1783527271, '1783527271'),
(64, 'purchases', 1, 'status', 'order_placed', NULL, 1, 1783527917, '1783527917'),
(65, 'purchases', 1, 'payment_status', 'pending', NULL, 1, 1783527917, '1783527917');

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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `firm_name`, `firm_email`, `firm_phone`, `firm_address`, `image`, `owner_name`, `owner_email`, `owner_phone`, `zone`, `gst`, `category`, `gst_type`, `price_allotment`, `active`, `auth_user`, `updated`, `created`) VALUES
(1, 'New Roshan Auto Parts', '', '0731-4057805, 9302466555', '318, University compound, Opp. Hotel Sunder, Indore', NULL, 'New Roshan Auto Parts', '', '9302466555', 'MP', '23AKEPP6393D1Z5', '3', 'outer', '', 'yes', 1, 1783518803, '1783518791_1');

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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `dispatchs`
--

INSERT INTO `dispatchs` (`id`, `order_id`, `notes`, `status`, `created_on_date`, `xxxinvoice`, `auth_user`, `updated`, `created`) VALUES
(1, 1, '', 'dispatched', 20260708, 0, 1, 1783521978, '1783520110_1'),
(2, 1, '', 'invoice_generated', 20260708, 0, 1, 1783526413, '1783522059_1');

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
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `dispatch_items`
--

INSERT INTO `dispatch_items` (`id`, `dispatch`, `product`, `quantity`, `order_id`, `product_lot`, `auth_user`, `updated`, `created`) VALUES
(1, 1, 2, 5.00, 1, 1, 1, 1783521422, '1783521422_1'),
(2, 1, 30, 10.00, 1, 2, 1, 1783521422, '1783521422_1'),
(3, 1, 38, 10.00, 1, 3, 1, 1783521422, '1783521422_1'),
(4, 1, 2, 5.00, 1, 1, 1, 1783521539, '1783521539_1'),
(5, 1, 30, 10.00, 1, 2, 1, 1783521539, '1783521539_1'),
(6, 1, 38, 5.00, 1, 3, 1, 1783521539, '1783521539_1'),
(7, 1, 72, 5.00, 1, 4, 1, 1783521539, '1783521539_1'),
(8, 2, 30, 2.00, 1, 2, 1, 1783522699, '1783522699_1');

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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `folders`
--

INSERT INTO `folders` (`id`, `title`, `notes`, `category`, `auth_user`, `updated`, `created`) VALUES
(1, 'Legal files', '', '52', 1, 1783527427, '1783527352_1');

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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `dispatch`, `notes`, `status`, `created_on_date`, `auth_user`, `updated`, `created`) VALUES
(1, 1, '', 'generated', 20260708, 1, 1783521819, '1783521624_1'),
(2, 2, '', 'generated', 20260708, 1, 1783526413, '1783522717_1');

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
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `invoice_items`
--

INSERT INTO `invoice_items` (`id`, `invoice`, `dispatch`, `product`, `quantity`, `rate`, `discount`, `igst`, `cgst`, `sgst`, `order_id`, `auth_user`, `updated`, `created`) VALUES
(1, 1, 1, 2, 10.00, 356.00, 1.00, 18.00, 9.00, 9.00, 1, 1, 1783521874, '1783521819_1'),
(2, 1, 1, 30, 20.00, 270.00, 2.00, 18.00, 9.00, 9.00, 1, 1, 1783521874, '1783521819_1'),
(3, 1, 1, 38, 15.00, 165.00, 3.00, 18.00, 9.00, 9.00, 1, 1, 1783521874, '1783521819_1'),
(4, 1, 1, 72, 5.00, 130.00, 4.00, 18.00, 9.00, 9.00, 1, 1, 1783521874, '1783521819_1'),
(5, 2, 2, 30, 2.00, 97.00, 1.00, 18.00, 9.00, 9.00, 1, 1, 1783526413, '1783526413_1');

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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer`, `notes`, `status`, `user`, `order_date`, `delivery_due_date`, `payment_status`, `auth_user`, `updated`, `created`) VALUES
(1, 1, '', 'order_placed', 4, 20260708, 20260715, 'pending', 1, 1783518855, '1783518855_1');

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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `product`, `quantity`, `order_id`, `rate`, `auth_user`, `updated`, `created`) VALUES
(1, 38, 25.00, 1, NULL, 1, 1783519064, '1783519064_1'),
(2, 30, 25.00, 1, NULL, 1, 1783519064, '1783519064_1'),
(3, 2, 10.00, 1, NULL, 1, 1783519064, '1783519064_1'),
(4, 72, 10.00, 1, NULL, 1, 1783519064, '1783519064_1');

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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `type`, `notes`, `status`, `purchase`, `vendor`, `customer`, `invoice`, `payment_mode`, `reference_no`, `bank_account`, `amount`, `payment_date`, `transaction_type`, `attachment`, `auth_user`, `updated`, `created`) VALUES
(1, 'received', '', 'completed', NULL, NULL, 1, 2, 'bank_transfer', '34553432424322', '53', 5000.00, 20260708, 'regular', 1, 1, 1783527271, '1783527271_1');

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
  `markup_percent` decimal(10,2) NOT NULL,
  `auth_user` int NOT NULL,
  `updated` int NOT NULL,
  `created` varchar(35) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=91 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product`, `code`, `description`, `category`, `image`, `quality`, `type`, `pieces`, `igst`, `cgst`, `sgst`, `markup_percent`, `auth_user`, `updated`, `created`) VALUES
(1, 'Side Guard [2\" Patta] (MS)', 'SGM-004', '', '24', 0, '30', '2\" Patta', 2, 18, 9, 9, 40.00, 1, 1783510626, '1783510626_1'),
(2, 'Side Guard [3\" Patta] (MS)', 'SGM-005', '', '24', 0, '30', '3\" Patta', 2, 18, 9, 9, 40.00, 1, 1783510626, '1783510626_1'),
(3, 'Side Guard [V Design, Patta] (MS)', 'SGM-006', '', '24', 0, '30', 'V Design, Patta', 2, 18, 9, 9, 40.00, 1, 1783510626, '1783510626_1'),
(4, 'Rear Guard [V Design, Patta] (MS)', 'RGM-001', '', '24', 0, '30', 'V Design, Patta', 1, 18, 9, 9, 40.00, 1, 1783510626, '1783510626_1'),
(5, 'Front Guard [Channel] (MS)', 'FGM-004', '', '25', 0, '30', 'Channel', 1, 18, 9, 9, 40.00, 1, 1783510626, '1783510626_1'),
(6, 'Side Guard [Double channel] (MS)', 'SGM-001', '', '25', 0, '30', 'Double channel', 2, 18, 9, 9, 40.00, 1, 1783510626, '1783510626_1'),
(7, 'Rear Guard [Angle, Colour] (MS)', 'RGM-004', '', '26', 0, '30', 'Angle, Colour', 1, 18, 9, 9, 40.00, 1, 1783510626, '1783510626_1'),
(8, 'Side Guard [Triple channel] (MS)', 'SGM-003', '', '25', 0, '30', 'Triple channel', 2, 18, 9, 9, 40.00, 1, 1783510626, '1783510626_1'),
(9, 'Side Guard [Double channel, Design] (MS)', 'SGM-002', '', '25', 0, '30', 'Double channel, Design', 2, 18, 9, 9, 40.00, 1, 1783510626, '1783510626_1'),
(10, 'Front Guard [Raj (Paris)] (MS)', 'FGM-001', '', '23', 0, '30', 'Raj (Paris)', 1, 18, 9, 9, 40.00, 1, 1783510626, '1783510626_1'),
(11, 'Front Guard [Activa Type] (MS)', 'FGM-002', '', '23', 0, '30', 'Activa Type', 1, 18, 9, 9, 40.00, 1, 1783510626, '1783510626_1'),
(12, 'Front Guard [Nose Type (Old Model)] (MS)', 'FGM-003', '', '23', 0, '30', 'Nose Type (Old Model)', 1, 18, 9, 9, 40.00, 1, 1783510626, '1783510626_1'),
(13, 'Front Guard [Half] (MS)', 'FGM-005', '', '23', 0, '30', 'Half', 1, 18, 9, 9, 40.00, 1, 1783510626, '1783510626_1'),
(14, 'Front Guard [Raj, Heavy (Rajkot)] (MS)', 'FGM-006', '', '23', 0, '30', 'Raj, Heavy (Rajkot)', 1, 18, 9, 9, 40.00, 1, 1783510626, '1783510626_1'),
(15, 'Front Guard [Fancy] (MS)', 'FGM-007', '', '23', 0, '30', 'Fancy', 1, 18, 9, 9, 40.00, 1, 1783510626, '1783510626_1'),
(16, 'Side Guard [1\", Hockey] (MS)', 'SGM-007', '', '23', 0, '30', '1\", Hockey', 2, 18, 9, 9, 40.00, 1, 1783510626, '1783510626_1'),
(17, 'Side Guard [1\" Hockey, With Gola] (MS)', 'SGM-008', '', '23', 0, '30', '1\" Hockey, With Gola', 2, 18, 9, 9, 40.00, 1, 1783510626, '1783510626_1'),
(18, 'Side Guard [7/8, Pipe] (MS)', 'SGM-009', '', '23', 0, '30', '7/8, Pipe', 2, 18, 9, 9, 40.00, 1, 1783510626, '1783510626_1'),
(19, 'Side Guard [1\", Pipe] (MS)', 'SGM-010', '', '23', 0, '30', '1\", Pipe', 2, 18, 9, 9, 40.00, 1, 1783510626, '1783510626_1'),
(20, 'Side Guard [1.25\", Pipe] (MS)', 'SGM-011', '', '23', 0, '30', '1.25\", Pipe', 2, 18, 9, 9, 40.00, 1, 1783510626, '1783510626_1'),
(21, 'Side Guard [1.25\" Fancy] (MS)', 'SGM-012', '', '23', 0, '30', '1.25\" Fancy', 2, 18, 9, 9, 40.00, 1, 1783510626, '1783510626_1'),
(22, 'Side Guard [Three Pipe, Flower] (MS)', 'SGM-013', '', '23', 0, '30', 'Three Pipe, Flower', 2, 18, 9, 9, 40.00, 1, 1783510626, '1783510626_1'),
(23, 'Rear Guard [1.25\"] (MS)', 'RGM-006', '', '23', 0, '30', '1.25\"', 1, 18, 9, 9, 40.00, 1, 1783510626, '1783510626_1'),
(24, 'Rear Guard [1.25\" Fancy] (MS)', 'RGM-007', '', '23', 0, '30', '1.25\" Fancy', 1, 18, 9, 9, 40.00, 1, 1783510626, '1783510626_1'),
(25, 'Rear Guard [1.5\"] (MS)', 'RGM-008', '', '23', 0, '30', '1.5\"', 1, 18, 9, 9, 40.00, 1, 1783510626, '1783510626_1'),
(26, 'Head Light Grill [2010] (MS)', 'HLGM-001', '', '23', 0, '30', '2010', 2, 18, 9, 9, 40.00, 1, 1783510626, '1783510626_1'),
(27, 'Head Light Grill [Compact] (MS)', 'HLGM-002', '', '23', 0, '30', 'Compact', 2, 18, 9, 9, 40.00, 1, 1783510626, '1783510626_1'),
(28, 'No Entry [Oval Pipe] (MS)', 'NEM-003', '', '23', 0, '30', 'Oval Pipe', 1, 18, 9, 9, 40.00, 1, 1783510626, '1783510626_1'),
(29, 'Front Guard [Optima/Maxima] (MS)', 'MOFGM-001', '', '23', 0, '30', 'Optima/Maxima', 1, 18, 9, 9, 40.00, 1, 1783510626, '1783510626_1'),
(30, 'Side Guard [0.75\", Optima/Maxima] (MS)', 'MOSGM-001', '', '23', 0, '30', '0.75\", Optima/Maxima', 2, 18, 9, 9, 40.00, 1, 1783510626, '1783510626_1'),
(31, 'Head Light Grill [Optima/Maxima] (MS)', 'MOHGM-001', '', '23', 0, '30', 'Optima/Maxima', 2, 18, 9, 9, 40.00, 1, 1783510626, '1783510626_1'),
(32, 'Front Indicator Grill [Optima/Maxima] (MS)', 'MOFIGM-001', '', '23', 0, '30', 'Optima/Maxima', 2, 18, 9, 9, 40.00, 1, 1783510626, '1783510626_1'),
(33, 'Front Guard [5/8, Ape] (MS)', 'AFGM-001', '', '23', 0, '30', '5/8, Ape', 1, 18, 9, 9, 40.00, 1, 1783510626, '1783510626_1'),
(34, 'Front Guard [0.75\", Ape, Heavy] (MS)', 'AFGM-002', '', '23', 0, '30', '0.75\", Ape, Heavy', 1, 18, 9, 9, 40.00, 1, 1783510626, '1783510626_1'),
(35, 'Head Light Grill [Ape, Pipe] (MS)', 'AHGM-002', '', '23', 0, '30', 'Ape, Pipe', 2, 18, 9, 9, 40.00, 1, 1783510626, '1783510626_1'),
(36, 'Front Guard [Ape City] (MS)', 'ACFGM-001', '', '23', 0, '30', 'Ape City', 1, 18, 9, 9, 40.00, 1, 1783510626, '1783510626_1'),
(37, 'Head Light Grill [Ape City] (MS)', 'ACHGM-001', '', '23', 0, '30', 'Ape City', 2, 18, 9, 9, 40.00, 1, 1783510626, '1783510626_1'),
(38, 'Break Light Grill [Ape City] (MS)', 'ACBGM-001', '', '23', 0, '30', 'Ape City', 2, 18, 9, 9, 40.00, 1, 1783510626, '1783510626_1'),
(39, 'Head Light Grill [Atul] (MS)', 'ATHGM-001', '', '23', 0, '30', 'Atul', 2, 18, 9, 9, 40.00, 1, 1783510626, '1783510626_1'),
(40, 'Head Light Grill [Alpha (Mahindra)] (MS)', 'ALHGM-001', '', '23', 0, '30', 'Alpha (Mahindra)', 2, 18, 9, 9, 40.00, 1, 1783510626, '1783510626_1'),
(41, 'Handle [0.75\", Design, 7\"] (MS)', '', '', '23', 0, '30', '0.75\", Design, 7\"', 3, 18, 9, 9, 40.00, 1, 1783510626, '1783510626_1'),
(42, 'Handle [1\", Design, 7\"] (MS)', '', '', '23', 0, '30', '1\", Design, 7\"', 2, 18, 9, 9, 40.00, 1, 1783510626, '1783510626_1'),
(43, 'Rear Guard [Angle, Chrome] (MS)', 'RGM-005', '', '26', 0, '30', 'Angle, Chrome', 1, 18, 9, 9, 40.00, 1, 1783510626, '1783510626_1'),
(44, 'No Entry [Angle, Chrome] (MS)', 'NEM-002', '', '26', 0, '30', 'Angle, Chrome', 1, 18, 9, 9, 40.00, 1, 1783510626, '1783510626_1'),
(45, 'No Entry [Ape, Angle, Chrome] (MS)', 'ANEM-001', '', '26', 0, '30', 'Ape, Angle, Chrome', 1, 18, 9, 9, 40.00, 1, 1783510626, '1783510626_1'),
(46, 'Mud Flap Fitting [Angle, Heavy, Small] (MS)', 'MFFM-003', '', '26', 0, '30', 'Angle, Heavy, Small', 2, 18, 9, 9, 40.00, 1, 1783510626, '1783510626_1'),
(47, 'Mud Flap Fitting [Angle, Heavy, Big] (MS)', 'MFFM-004', '', '26', 0, '30', 'Angle, Heavy, Big', 2, 18, 9, 9, 40.00, 1, 1783510626, '1783510626_1'),
(48, 'Front Indicator Grill [Compact, Round Saliya] (MS)', 'FIGM-001', '', '27', 0, '30', 'Compact, Round Saliya', 2, 18, 9, 9, 40.00, 1, 1783510626, '1783510626_1'),
(49, 'Front Indicator Grill [Old Model, Square Saliya] (MS)', 'FIGM-002', '', '27', 0, '30', 'Old Model, Square Saliya', 2, 18, 9, 9, 40.00, 1, 1783510626, '1783510626_1'),
(50, 'Front Indicator Grill [Compact, Square Saliya] (MS)', 'FIGM-003', '', '27', 0, '30', 'Compact, Square Saliya', 2, 18, 9, 9, 40.00, 1, 1783510626, '1783510626_1'),
(51, 'Back Indicator Grill [Compact, Round Saliya] (MS)', 'BIGM-001', '', '27', 0, '30', 'Compact, Round Saliya', 2, 18, 9, 9, 40.00, 1, 1783510626, '1783510626_1'),
(52, 'Back Indicator Grill [Old Model, Square Saliya] (MS)', 'BIGM-002', '', '27', 0, '30', 'Old Model, Square Saliya', 2, 18, 9, 9, 40.00, 1, 1783510626, '1783510626_1'),
(53, 'Back Indicator Grill [Compact, Square Saliya] (MS)', 'BIGM-003', '', '27', 0, '30', 'Compact, Square Saliya', 2, 18, 9, 9, 40.00, 1, 1783510626, '1783510626_1'),
(54, 'Head Light Grill [APE, Salia] (MS)', 'AHGM-001', '', '27', 0, '30', 'APE, Salia', 2, 18, 9, 9, 40.00, 1, 1783510626, '1783510626_1'),
(55, 'Front Guard [Half] (SS)', 'FGS-005', '', '29', 0, '31', 'Half', 1, 18, 9, 9, 40.00, 1, 1783510626, '1783510626_1'),
(56, 'Front Guard [Raj, Heavy (Rajkot)] (SS)', 'FGS-006', '', '29', 0, '31', 'Raj, Heavy (Rajkot)', 1, 18, 9, 9, 40.00, 1, 1783510626, '1783510626_1'),
(57, 'Front Guard [Fancy] (SS)', 'FGS-007', '', '29', 0, '31', 'Fancy', 1, 18, 9, 9, 40.00, 1, 1783510626, '1783510626_1'),
(58, 'Side Guard [1\", Hockey] (SS)', 'SGS-007', '', '29', 0, '31', '1\", Hockey', 2, 18, 9, 9, 40.00, 1, 1783510626, '1783510626_1'),
(59, 'Side Guard [1\", Hockey, With Gola] (SS)', 'SGS-008', '', '29', 0, '31', '1\", Hockey, With Gola', 2, 18, 9, 9, 40.00, 1, 1783510626, '1783510626_1'),
(60, 'Side Guard [7/8, Pipe] (SS)', 'SGS-009', '', '29', 0, '31', '7/8, Pipe', 2, 18, 9, 9, 40.00, 1, 1783510626, '1783510626_1'),
(61, 'Side Guard [1\", Pipe] (SS)', 'SGS-010', '', '29', 0, '31', '1\", Pipe', 2, 18, 9, 9, 40.00, 1, 1783510626, '1783510626_1'),
(62, 'Side Guard [1.25\", Pipe] (SS)', 'SGS-011', '', '29', 0, '31', '1.25\", Pipe', 2, 18, 9, 9, 40.00, 1, 1783510626, '1783510626_1'),
(63, 'Side Guard [1.25\", Fancy] (SS)', 'SGS-012', '', '29', 0, '31', '1.25\", Fancy', 2, 18, 9, 9, 40.00, 1, 1783510626, '1783510626_1'),
(64, 'Side Guard [Double pipe, Fancy] (SS)', 'SGS-014', '', '29', 0, '31', 'Double pipe, Fancy', 2, 18, 9, 9, 40.00, 1, 1783510626, '1783510626_1'),
(65, 'Rear Guard [1.25\", Pipe] (SS)', 'RGS-006', '', '29', 0, '31', '1.25\", Pipe', 1, 18, 9, 9, 40.00, 1, 1783510626, '1783510626_1'),
(66, 'Rear Guard [1.25\" Fancy] (SS)', 'RGS-007', '', '29', 0, '31', '1.25\" Fancy', 1, 18, 9, 9, 40.00, 1, 1783510626, '1783510626_1'),
(67, 'Rear Guard [1.50\", Pipe] (SS)', 'RGS-008', '', '29', 0, '31', '1.50\", Pipe', 1, 18, 9, 9, 40.00, 1, 1783510626, '1783510626_1'),
(68, 'Rear Guard [Double pipe, Fancy] (SS)', 'RGS-009', '', '29', 0, '31', 'Double pipe, Fancy', 1, 18, 9, 9, 40.00, 1, 1783510626, '1783510626_1'),
(69, 'Rear Guard [2\", Pipe] (SS)', 'RGS-010', '', '29', 0, '31', '2\", Pipe', 1, 18, 9, 9, 40.00, 1, 1783510626, '1783510626_1'),
(70, 'Rear Guard [Square, Pipe] (SS)', 'RGS-011', '', '29', 0, '31', 'Square, Pipe', 1, 18, 9, 9, 40.00, 1, 1783510626, '1783510626_1'),
(71, 'No Entry [Oval Pipe] (SS)', 'NES-003', '', '29', 0, '31', 'Oval Pipe', 1, 18, 9, 9, 40.00, 1, 1783510626, '1783510626_1'),
(72, 'Front Guard [Optima/Maxima] (SS)', 'MOFGS-001', '', '29', 0, '31', 'Optima/Maxima', 1, 18, 9, 9, 40.00, 1, 1783510626, '1783510626_1'),
(73, 'Head light Grill [Optima/Maxima] (SS)', 'MOHGS-001', '', '29', 0, '31', 'Optima/Maxima', 2, 18, 9, 9, 40.00, 1, 1783510626, '1783510626_1'),
(74, 'Front Indicator Grill [Optima/Maxima] (SS)', 'MOFIGS-001', '', '29', 0, '31', 'Optima/Maxima', 2, 18, 9, 9, 40.00, 1, 1783510626, '1783510626_1'),
(75, 'Break Indicator Grill [Optima/Maxima] (SS)', 'MOBGS-001', '', '29', 0, '31', 'Optima/Maxima', 2, 18, 9, 9, 40.00, 1, 1783510626, '1783510626_1'),
(76, 'Side Guard [Optima/Maxima] (SS)', 'MOSGS-001', '', '29', 0, '31', 'Optima/Maxima', 2, 18, 9, 9, 40.00, 1, 1783510626, '1783510626_1'),
(77, 'Rear Guard [Optima/Maxima] (SS)', 'MORGS-001', '', '29', 0, '31', 'Optima/Maxima', 1, 18, 9, 9, 40.00, 1, 1783510626, '1783510626_1'),
(78, 'Break Indicator Grill [Ape, Pipe] (SS)', 'ABGS-001', '', '29', 0, '31', 'Ape, Pipe', 2, 18, 9, 9, 40.00, 1, 1783510626, '1783510626_1'),
(79, 'Front Guard [Ape City] (SS)', 'ACFGS-001', '', '29', 0, '31', 'Ape City', 1, 18, 9, 9, 40.00, 1, 1783510626, '1783510626_1'),
(80, 'Head light Grill [Ape City] (SS)', 'ACHGS-001', '', '29', 0, '31', 'Ape City', 2, 18, 9, 9, 40.00, 1, 1783510626, '1783510626_1'),
(81, 'Break light Grill [Ape City] (SS)', 'ACBGS-001', '', '29', 0, '31', 'Ape City', 2, 18, 9, 9, 40.00, 1, 1783510626, '1783510626_1'),
(82, 'Side Guard [Ape City] (SS)', 'ACSGS-001', '', '29', 0, '31', 'Ape City', 2, 18, 9, 9, 40.00, 1, 1783510626, '1783510626_1'),
(83, 'Front Guard [TVS] (SS)', '', '', '29', 0, '31', 'TVS', 1, 18, 9, 9, 40.00, 1, 1783510626, '1783510626_1'),
(84, 'Head Light Grill [TVS, Saliya, Pipe] (SS)', '', '', '29', 0, '31', 'TVS, Saliya, Pipe', 2, 18, 9, 9, 40.00, 1, 1783510626, '1783510626_1'),
(85, 'Front Indicator Grill [Compact, Round Saliya] (SS)', 'FIGS-001', '', '28', 0, '31', 'Compact, Round Saliya', 2, 18, 9, 9, 40.00, 1, 1783510626, '1783510626_1'),
(86, 'Front Indicator Grill [Compact, Square Saliya] (SS)', 'FIGS-003', '', '28', 0, '31', 'Compact, Square Saliya', 2, 18, 9, 9, 40.00, 1, 1783510626, '1783510626_1'),
(87, 'Front Indicator Grill [Compact, Round Saliya, Heavy] (SS)', 'FIGS-004', '', '28', 0, '31', 'Compact, Round Saliya, Heavy', 2, 18, 9, 9, 40.00, 1, 1783510626, '1783510626_1'),
(88, 'Back Indicator Grill [Compact, Round Saliya] (SS)', 'BIGS-001', '', '28', 0, '31', 'Compact, Round Saliya', 2, 18, 9, 9, 40.00, 1, 1783510626, '1783510626_1'),
(89, 'Back Indicator Grill [Compact, Square Saliya] (SS)', 'BIGS-003', '', '28', 0, '31', 'Compact, Square Saliya', 2, 18, 9, 9, 40.00, 1, 1783510626, '1783510626_1'),
(90, 'Back Indicator Grill [Compact, Round Saliya, Heavy] (SS)', 'BIGS-004', '', '28', 0, '31', 'Compact, Round Saliya, Heavy', 2, 18, 9, 9, 40.00, 1, 1783524593, '1783510626_1');

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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `product_lots`
--

INSERT INTO `product_lots` (`id`, `product`, `ordered_quantity`, `received_quantity`, `accepted_quantity`, `rejected_quantity`, `available_quantity`, `reserved_quantity`, `consumed_quantity`, `notes`, `source`, `status`, `purchase`, `buy_price`, `auth_user`, `updated`, `created`) VALUES
(1, 2, 100, 100, 90, 10, 80, 0, 10, '', 'produced', 'ready', NULL, NULL, 1, 1783521978, '1783521095_1'),
(2, 30, 50, 45, 40, 5, 18, 2, 20, '', 'produced', 'ready', NULL, NULL, 1, 1783522699, '1783521194_1'),
(3, 38, 50, 48, 48, 0, 33, 0, 15, '', 'produced', 'ready', NULL, NULL, 1, 1783521978, '1783521234_1'),
(4, 72, 100, 90, 85, 5, 80, 0, 5, '', 'produced', 'ready', NULL, NULL, 1, 1783521978, '1783521320_1');

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
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `product_movements`
--

INSERT INTO `product_movements` (`id`, `order_id`, `product`, `product_lot`, `dispatch`, `quantity`, `action`, `action_date`, `auth_user`, `updated`, `created`) VALUES
(1, 1, 2, 1, 1, 5, 'reserve', 1783521422, 1, 1783521422, '1783521422_1'),
(2, 1, 30, 2, 1, 10, 'reserve', 1783521422, 1, 1783521422, '1783521422_1'),
(3, 1, 38, 3, 1, 10, 'reserve', 1783521422, 1, 1783521422, '1783521422_1'),
(4, 1, 2, 1, 1, 5, 'reserve', 1783521539, 1, 1783521539, '1783521539_1'),
(5, 1, 30, 2, 1, 10, 'reserve', 1783521539, 1, 1783521539, '1783521539_1'),
(6, 1, 38, 3, 1, 5, 'reserve', 1783521539, 1, 1783521539, '1783521539_1'),
(7, 1, 72, 4, 1, 5, 'reserve', 1783521539, 1, 1783521539, '1783521539_1'),
(8, 1, 2, 1, 1, 5, 'consume', 1783521978, 1, 1783521978, '1783521978_1'),
(9, 1, 2, 1, 1, 5, 'consume', 1783521978, 1, 1783521978, '1783521978_1'),
(10, 1, 30, 2, 1, 10, 'consume', 1783521978, 1, 1783521978, '1783521978_1'),
(11, 1, 30, 2, 1, 10, 'consume', 1783521978, 1, 1783521978, '1783521978_1'),
(12, 1, 38, 3, 1, 10, 'consume', 1783521978, 1, 1783521978, '1783521978_1'),
(13, 1, 38, 3, 1, 5, 'consume', 1783521978, 1, 1783521978, '1783521978_1'),
(14, 1, 72, 4, 1, 5, 'consume', 1783521978, 1, 1783521978, '1783521978_1'),
(15, 1, 30, 2, 2, 2, 'reserve', 1783522699, 1, 1783522699, '1783522699_1');

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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `title`, `payment_status`, `notes`, `status`, `purchase_invoice`, `vendor`, `sub_total`, `gst`, `tax`, `discount`, `grand_total`, `order_date`, `expected_delivery_date`, `first_received_date`, `fully_received_date`, `cancel_date`, `auth_user`, `updated`, `created`) VALUES
(1, 'Katori', 'pending', '', 'order_placed', 9, 0, 0.00, 0.00, 0.00, 0.00, 5000.00, 20260708, 20260722, 0, 0, 0, 1, 1783527917, '1783527917_1');

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
(38, 'Angle (29x2)', '', 'Kg', '', '16', NULL, 1, 1783526585, '1783514011_1'),
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
(49, '0.75\" Katori M.S', '', 'Kg', '', '19', NULL, 1, 1783527170, '1783514011_1'),
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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `raw_material_rates`
--

INSERT INTO `raw_material_rates` (`id`, `entity`, `rate`, `effective_date`, `auth_user`, `updated`, `created`) VALUES
(1, 'RMRG-1', 50.00, 20260708, 1, 1783525606, '1783525606_1'),
(2, 'RM-32', 20.00, 20260708, 1, 1783525656, '1783525656_1');

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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `raw_material_rate_groups`
--

INSERT INTO `raw_material_rate_groups` (`id`, `raw_material_rate_group`, `auth_user`, `updated`, `created`) VALUES
(1, 'MS Pipe', 1, 1783525518, '1783525518_1');

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
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `raw_material_rate_group_link`
--

INSERT INTO `raw_material_rate_group_link` (`id`, `raw_material_rate_group`, `raw_material`) VALUES
(1, 1, 6),
(2, 1, 7),
(3, 1, 10),
(4, 1, 11),
(5, 1, 12),
(6, 1, 13),
(7, 1, 8),
(8, 1, 9),
(9, 1, 1),
(10, 1, 14),
(11, 1, 2),
(12, 1, 3),
(13, 1, 4),
(14, 1, 5);

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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `uploads`
--

INSERT INTO `uploads` (`id`, `name`, `title`, `brief`, `module`, `module_id`, `type`, `size`, `thumb`, `small`, `table_name`, `row_id`, `file_type`, `caption`, `other`, `auth_user`, `updated`, `created`) VALUES
(1, 'uploads/308904251-IMG-20250630-WA0001.jpg', NULL, NULL, NULL, NULL, 'image/jpeg', 198802, 'uploads/308904251-thumb-IMG-20250630-WA0001.jpg', 'uploads/308904251-small-IMG-20250630-WA0001.jpg', NULL, NULL, NULL, NULL, NULL, 1, 1783527271, NULL),
(2, 'uploads/974419002-Factsheet (WSFP).pdf', NULL, NULL, NULL, NULL, 'application/pdf', 325240, '', '', 'payments', 1, 'document', '50', 'test122', 1, 1783527271, '1783527271_1'),
(3, 'uploads/1816517979-nominalform-2002.pdf', NULL, NULL, NULL, NULL, 'application/pdf', 181203, '', '', 'payments', 1, 'document', '51', 'test12', 1, 1783527271, '1783527271_1'),
(6, 'uploads/1179332614-3d-rendering-money-tree-sm.jpg', NULL, NULL, NULL, NULL, 'image/jpeg', 2285977, 'uploads/1179332614-thumb-3d-rendering-money-tree-sm.jpg', 'uploads/1179332614-small-3d-rendering-money-tree-sm.jpg', 'folders', 1, 'document', '', '', 1, 1783527410, '1783527410_1'),
(7, 'uploads/142288685-download-1415972908-1773137224.png', NULL, NULL, NULL, NULL, 'image/png', 377465, 'uploads/142288685-thumb-download-1415972908-1773137224.png', 'uploads/142288685-small-download-1415972908-1773137224.png', 'folders', 1, 'document', '', '', 1, 1783527422, '1783527421_1'),
(8, 'uploads/732638255-download-857515597-1773137110.png', NULL, NULL, NULL, NULL, 'image/png', 1958148, 'uploads/732638255-thumb-download-857515597-1773137110.png', 'uploads/732638255-small-download-857515597-1773137110.png', 'folders', 1, 'document', '', '', 1, 1783527422, '1783527421_1'),
(9, 'uploads/261280578-Raj Deatails for Software.xlsx', NULL, NULL, NULL, NULL, 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 22124, '', '', NULL, NULL, NULL, NULL, NULL, 1, 1783527917, NULL),
(10, 'uploads/1369640339-WhatsApp Image 2026-03-31 at 10.58.45 AM.jpeg', NULL, NULL, NULL, NULL, 'image/jpeg', 101857, 'uploads/1369640339-thumb-WhatsApp Image 2026-03-31 at 10.58.45 AM.jpeg', 'uploads/1369640339-small-WhatsApp Image 2026-03-31 at 10.58.45 AM.jpeg', 'purchases', 1, 'document', '51', '', 1, 1783527917, '1783527917_1'),
(11, 'uploads/1309044386-3d-rendering-money-tree-sm.jpg', NULL, NULL, NULL, NULL, 'image/jpeg', 2285977, 'uploads/1309044386-thumb-3d-rendering-money-tree-sm.jpg', 'uploads/1309044386-small-3d-rendering-money-tree-sm.jpg', 'purchases', 1, 'document', '48', '', 1, 1783527917, '1783527917_1');

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
(4, '', '', 'yes', 'John', 6, 'jay290489@gmail.com', '3334343444,\r\n5353535345345', '333344445555', 'A /2 / 102, Labh Exotica\r\nRadiyatba Road, Gotri Road,', '7', 'Sales', '', '', 1, 1783527769, '0');

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
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`id`, `user_role`, `auth_user`, `updated`, `created`) VALUES
(7, 'Sales Man', 1, 1783527760, '1783527760_1');

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
) ENGINE=MyISAM AUTO_INCREMENT=91 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

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
(20, 4, 'symbols-read'),
(90, 7, 'order_items-create'),
(89, 7, 'order_items-update'),
(88, 7, 'order_items-read'),
(87, 7, 'orders-create'),
(86, 7, 'orders-update'),
(85, 7, 'orders-read'),
(84, 7, 'product_lots-read'),
(83, 7, 'products-read');

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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `firm_name`, `firm_email`, `firm_phone`, `firm_address`, `image`, `owner_name`, `owner_email`, `owner_phone`, `pan`, `gst`, `category`, `payment_term`, `active`, `auth_user`, `updated`, `created`) VALUES
(1, 'Royal Fabrications', 'royal@gmail.com', '9333444422, 838455764\r\n', 'Royal Fab, Ahd, GJ', NULL, 'Raju', '', '', 'AYEPP6778D', '23AYEPP6778D1Z1', '7', '30 days', 'yes', 1, 1783528039, '1783528039_1');

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
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `vendor_raw_material_link`
--

INSERT INTO `vendor_raw_material_link` (`id`, `vendor`, `raw_material`) VALUES
(1, 1, 6),
(2, 1, 7),
(3, 1, 10),
(4, 1, 11),
(5, 1, 12),
(6, 1, 13),
(7, 1, 8),
(8, 1, 9),
(9, 1, 1),
(10, 1, 14),
(11, 1, 32),
(12, 1, 34),
(13, 1, 33);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
