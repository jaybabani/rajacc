-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 10, 2026 at 01:18 PM
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
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8mb3;

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
(49, 'Goods receipt note (GR No.)', 'yes', NULL, 'document_type', NULL, 1, 1783586835, '1782734612_1'),
(50, 'Delivery Challan', 'yes', NULL, 'document_type', NULL, 1, 1782734626, '1782734626_1'),
(51, 'Eway Bill', 'yes', NULL, 'document_type', NULL, 1, 1782734648, '1782734648_1'),
(52, 'Legal Documents', 'yes', NULL, 'folder_category', NULL, 1, 1783667818, '1782814369_1'),
(53, 'HDFC', 'yes', NULL, 'bank_account', NULL, 1, 1783425606, '1783425606_1'),
(54, 'SBI', 'yes', NULL, 'bank_account', NULL, 1, 1783425610, '1783425610_1'),
(55, 'Lorry Receipt (LR No.)', 'yes', NULL, 'document_type', NULL, 1, 1783586855, '1783586855_1'),
(56, 'Railway Receipt (RR No.)', 'yes', NULL, 'document_type', NULL, 1, 1783586877, '1783586877_1'),
(57, 'Bill of Lading (B/L)', 'yes', NULL, 'document_type', NULL, 1, 1783586885, '1783586885_1'),
(58, 'Air Waybill (AWB)', 'yes', NULL, 'document_type', NULL, 1, 1783586892, '1783586892_1'),
(59, 'Daily Expenses', 'yes', NULL, 'folder_category', NULL, 1, 1783667837, '1783667837_1');

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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `boms`
--

INSERT INTO `boms` (`id`, `product`, `notes`, `status`, `auth_user`, `updated`, `created`) VALUES
(4, 34, '', 'active', 1, 1783669606, '1783669606_1');

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
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `bom_costs`
--

INSERT INTO `bom_costs` (`id`, `cost_type`, `amount`, `bom`, `auth_user`, `updated`, `created`) VALUES
(1, 'labour', 20.00, 1, 1, 1783522657, '1783522657_1'),
(2, 'electricity', 5.00, 1, 1, 1783522657, '1783522657_1'),
(3, 'machining', 20.00, 1, 1, 1783522657, '1783522657_1'),
(4, 'electricity', 20.00, 2, 1, 1783668078, '1783668078_1'),
(5, 'labour', 50.00, 2, 1, 1783668078, '1783668078_1'),
(6, 'machining', 10.00, 2, 1, 1783668078, '1783668078_1'),
(7, 'overhead', 50.00, 2, 1, 1783668078, '1783668078_1'),
(8, 'machining', 11.00, 3, 1, 1783668591, '1783668591_1'),
(9, 'transport', 22.00, 3, 1, 1783668591, '1783668591_1'),
(10, 'electricity', 10.00, 4, 1, 1783669696, '1783669696_1'),
(11, 'labour', 20.00, 4, 1, 1783669696, '1783669696_1'),
(12, 'machining', 25.00, 4, 1, 1783669696, '1783669696_1'),
(13, 'packaging', 5.00, 4, 1, 1783669696, '1783669696_1');

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
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `bom_items`
--

INSERT INTO `bom_items` (`id`, `raw_material`, `quantity`, `wastage_quantity`, `bom`, `rate`, `auth_user`, `updated`, `created`) VALUES
(1, 6, 0.30, 0.00, 1, NULL, 1, 1783522615, '1783522364_1'),
(2, 7, 0.10, 0.00, 1, NULL, 1, 1783522597, '1783522364_1'),
(3, 32, 0.20, 0.00, 1, NULL, 1, 1783522585, '1783522364_1'),
(4, 6, 0.20, 0.00, 2, NULL, 1, 1783668032, '1783668032_1'),
(5, 11, 0.30, 0.00, 2, NULL, 1, 1783668032, '1783668032_1'),
(6, 41, 0.50, 0.00, 2, NULL, 1, 1783668418, '1783668032_1'),
(7, 6, 1.00, 0.00, 3, NULL, 1, 1783668576, '1783668576_1'),
(8, 10, 1.00, 0.00, 3, NULL, 1, 1783668576, '1783668576_1'),
(9, 6, 0.20, 0.00, 4, NULL, 1, 1783669652, '1783669652_1'),
(10, 14, 0.30, 0.00, 4, NULL, 1, 1783669652, '1783669652_1'),
(11, 32, 0.10, 0.00, 4, NULL, 1, 1783669652, '1783669652_1');

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
) ENGINE=MyISAM AUTO_INCREMENT=172 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

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
(65, 'purchases', 1, 'payment_status', 'pending', NULL, 1, 1783527917, '1783527917'),
(66, 'invoice_items', 5, 'rate', '100', NULL, 1, 1783592740, '1783592740'),
(67, 'dispatchs', 3, 'status', 'new', NULL, 1, 1783600998, '1783600998'),
(68, 'dispatch_items', 9, 'quantity', '3', NULL, 1, 1783601016, '1783601016'),
(69, 'dispatch_items', 10, 'quantity', '5', NULL, 1, 1783601016, '1783601016'),
(70, 'dispatch_items', 11, 'quantity', '5', NULL, 1, 1783601016, '1783601016'),
(71, 'dispatch_items', 12, 'quantity', '5', NULL, 1, 1783601030, '1783601030'),
(72, 'invoices', 3, 'status', 'draft', NULL, 1, 1783601040, '1783601040'),
(73, 'invoice_items', 6, 'rate', '97', NULL, 1, 1783601066, '1783601066'),
(74, 'invoice_items', 6, 'discount', '5', NULL, 1, 1783601066, '1783601066'),
(75, 'invoice_items', 7, 'rate', '100', NULL, 1, 1783601066, '1783601066'),
(76, 'invoice_items', 7, 'discount', '10', NULL, 1, 1783601066, '1783601066'),
(77, 'invoice_items', 8, 'rate', '500', NULL, 1, 1783601066, '1783601066'),
(78, 'invoice_items', 8, 'discount', '15', NULL, 1, 1783601066, '1783601066'),
(79, 'dispatchs', 3, 'status', 'invoice_generated', '', 1, 1783601066, '1783601066'),
(80, 'invoices', 3, 'status', 'generated', '', 1, 1783601066, '1783601066'),
(81, 'dispatchs', 4, 'status', 'new', NULL, 1, 1783664690, '1783664690'),
(82, 'order_items', 5, 'quantity', '100', NULL, 1, 1783664728, '1783664728'),
(83, 'order_items', 6, 'quantity', '50', NULL, 1, 1783664821, '1783664821'),
(84, 'purchases', 2, 'status', 'order_placed', NULL, 1, 1783666445, '1783666445'),
(85, 'purchases', 2, 'payment_status', 'pending', NULL, 1, 1783666445, '1783666445'),
(86, 'purchases', 2, 'status', 'fully_received', NULL, 1, 1783666582, '1783666582'),
(87, 'raw_material_lots', 1, 'status', 'order_placed', NULL, 1, 1783666795, '1783666795'),
(88, 'raw_material_lots', 1, 'status', 'received', NULL, 1, 1783666819, '1783666819'),
(89, 'raw_material_lots', 1, 'status', 'under_process', NULL, 1, 1783666848, '1783666848'),
(90, 'raw_material_lots', 1, 'status', 'ready', NULL, 1, 1783666859, '1783666859'),
(91, 'product_lots', 5, 'status', 'order_placed', NULL, 1, 1783667062, '1783667062'),
(92, 'product_lots', 6, 'status', 'new', NULL, 1, 1783667456, '1783667456'),
(93, 'product_lots', 6, 'status', 'ready', NULL, 1, 1783667474, '1783667474'),
(94, 'boms', 2, 'status', 'draft', NULL, 1, 1783667965, '1783667965'),
(95, 'bom_items', 4, 'quantity', '0.2', NULL, 1, 1783668032, '1783668032'),
(96, 'bom_items', 4, 'wastage_quantity', '0', NULL, 1, 1783668032, '1783668032'),
(97, 'bom_items', 5, 'quantity', '0.3', NULL, 1, 1783668032, '1783668032'),
(98, 'bom_items', 5, 'wastage_quantity', '0', NULL, 1, 1783668032, '1783668032'),
(99, 'bom_items', 6, 'quantity', '0.5', NULL, 1, 1783668032, '1783668032'),
(100, 'bom_items', 6, 'wastage_quantity', '0', NULL, 1, 1783668032, '1783668032'),
(101, 'bom_costs', 4, 'amount', '20', NULL, 1, 1783668078, '1783668078'),
(102, 'bom_costs', 5, 'amount', '50', NULL, 1, 1783668078, '1783668078'),
(103, 'bom_costs', 6, 'amount', '10', NULL, 1, 1783668078, '1783668078'),
(104, 'bom_costs', 7, 'amount', '50', NULL, 1, 1783668078, '1783668078'),
(105, 'raw_material_rates', 3, 'rate', '50', NULL, 1, 1783668280, '1783668280'),
(106, 'raw_material_rates', 3, 'effective_date', '20260710', NULL, 1, 1783668280, '1783668280'),
(107, 'boms', 2, 'status', 'active', NULL, 1, 1783668366, '1783668366'),
(108, 'boms', 3, 'status', 'active', NULL, 1, 1783668550, '1783668550'),
(109, 'bom_items', 7, 'quantity', '1', NULL, 1, 1783668576, '1783668576'),
(110, 'bom_items', 7, 'wastage_quantity', '0', NULL, 1, 1783668576, '1783668576'),
(111, 'bom_items', 8, 'quantity', '1', NULL, 1, 1783668576, '1783668576'),
(112, 'bom_items', 8, 'wastage_quantity', '0', NULL, 1, 1783668576, '1783668576'),
(113, 'bom_costs', 8, 'amount', '11', NULL, 1, 1783668591, '1783668591'),
(114, 'bom_costs', 9, 'amount', '22', NULL, 1, 1783668591, '1783668591'),
(115, 'raw_material_lots', 2, 'status', 'received', NULL, 1, 1783669380, '1783669380'),
(116, 'raw_material_lots', 2, 'status', 'ready', NULL, 1, 1783669412, '1783669412'),
(117, 'boms', 4, 'status', 'active', NULL, 1, 1783669606, '1783669606'),
(118, 'bom_items', 9, 'quantity', '0.2', NULL, 1, 1783669652, '1783669652'),
(119, 'bom_items', 9, 'wastage_quantity', '0', NULL, 1, 1783669652, '1783669652'),
(120, 'bom_items', 10, 'quantity', '0.3', NULL, 1, 1783669652, '1783669652'),
(121, 'bom_items', 10, 'wastage_quantity', '0', NULL, 1, 1783669652, '1783669652'),
(122, 'bom_items', 11, 'quantity', '0.1', NULL, 1, 1783669652, '1783669652'),
(123, 'bom_items', 11, 'wastage_quantity', '0', NULL, 1, 1783669652, '1783669652'),
(124, 'bom_costs', 10, 'amount', '10', NULL, 1, 1783669696, '1783669696'),
(125, 'bom_costs', 11, 'amount', '20', NULL, 1, 1783669696, '1783669696'),
(126, 'bom_costs', 12, 'amount', '25', NULL, 1, 1783669696, '1783669696'),
(127, 'bom_costs', 13, 'amount', '5', NULL, 1, 1783669696, '1783669696'),
(128, 'raw_material_rates', 3, 'rate', '60.00', NULL, 1, 1783669862, '1783669862'),
(129, 'raw_material_rates', 4, 'rate', '80', NULL, 1, 1783670043, '1783670043'),
(130, 'raw_material_rates', 4, 'effective_date', '20260710', NULL, 1, 1783670043, '1783670043'),
(131, 'raw_material_rates', 5, 'rate', '10', NULL, 1, 1783670065, '1783670065'),
(132, 'raw_material_rates', 5, 'effective_date', '20260710', NULL, 1, 1783670065, '1783670065'),
(133, 'product_lots', 7, 'status', 'ready', NULL, 1, 1783670201, '1783670201'),
(134, 'orders', 2, 'status', 'order_placed', NULL, 1, 1783670292, '1783670292'),
(135, 'orders', 2, 'payment_status', 'pending', NULL, 1, 1783670292, '1783670292'),
(136, 'order_items', 7, 'quantity', '20', NULL, 1, 1783670315, '1783670315'),
(137, 'order_items', 8, 'quantity', '20', NULL, 1, 1783670354, '1783670354'),
(138, 'order_items', 8, 'quantity', '40.00', NULL, 1, 1783670367, '1783670367'),
(139, 'dispatchs', 5, 'status', 'new', NULL, 1, 1783670401, '1783670401'),
(140, 'dispatch_items', 13, 'quantity', '20', NULL, 1, 1783670447, '1783670447'),
(141, 'dispatch_items', 14, 'quantity', '10', NULL, 1, 1783670484, '1783670484'),
(142, 'dispatchs', 5, 'status', 'packed_and_ready', NULL, 1, 1783670598, '1783670598'),
(143, 'invoices', 4, 'status', 'draft', NULL, 1, 1783670617, '1783670617'),
(144, 'invoice_items', 9, 'rate', '137', NULL, 1, 1783670649, '1783670649'),
(145, 'invoice_items', 9, 'discount', '1', NULL, 1, 1783670649, '1783670649'),
(146, 'dispatchs', 5, 'status', 'invoice_generated', '', 1, 1783670649, '1783670649'),
(147, 'invoices', 4, 'status', 'generated', '', 1, 1783670649, '1783670649'),
(148, 'dispatchs', 5, 'status', 'dispatched', NULL, 1, 1783670777, '1783670777'),
(149, 'payments', 2, 'status', 'completed', NULL, 1, 1783670866, '1783670866'),
(150, 'payments', 3, 'status', 'completed', NULL, 1, 1783670887, '1783670887'),
(151, 'orders', 2, 'payment_status', 'fully_paid', NULL, 1, 1783670959, '1783670959'),
(152, 'orders', 2, 'status', 'completed', NULL, 1, 1783670962, '1783670962'),
(153, 'purchases', 4, 'status', 'partially_received', NULL, 1, 1783671134, '1783671134'),
(154, 'purchases', 4, 'payment_status', 'on_hold', NULL, 1, 1783671134, '1783671134'),
(155, 'production_items', 7, 'quantity', '21', NULL, 1, 1783680720, '1783680720'),
(156, 'production_items', 7, 'quantity', '22', NULL, 1, 1783680732, '1783680732'),
(157, 'production_items', 9, 'quantity', '10', NULL, 1, 1783680755, '1783680755'),
(158, 'production_items', 10, 'quantity', '20', NULL, 1, 1783680755, '1783680755'),
(159, 'production_items', 11, 'quantity', '30', NULL, 1, 1783680755, '1783680755'),
(160, 'productions', 3, 'status', 'production_placed', NULL, 1, 1783681559, '1783681559'),
(161, 'productions', 3, 'status', 'production_started', NULL, 1, 1783681829, '1783681829'),
(162, 'production_items', 12, 'quantity', '100', NULL, 1, 1783681898, '1783681898'),
(163, 'production_items', 13, 'quantity', '100', NULL, 1, 1783681898, '1783681898'),
(164, 'production_items', 14, 'quantity', '200', NULL, 1, 1783682104, '1783682104'),
(165, 'production_items', 15, 'quantity', '100', NULL, 1, 1783682104, '1783682104'),
(166, 'dispatchs', 6, 'status', 'new', NULL, 1, 1783683861, '1783683861'),
(167, 'production_batchs', 7, 'status', 'new', NULL, 1, 1783686910, '1783686910'),
(168, 'production_batchs', 7, 'status', 'production_ready', NULL, 1, 1783687051, '1783687051'),
(169, 'raw_material_lots', 3, 'status', 'received', NULL, 1, 1783689036, '1783689036'),
(170, 'raw_material_lots', 3, 'status', 'ready', NULL, 1, 1783689058, '1783689058'),
(171, 'raw_material_lots', 4, 'status', 'ready', NULL, 1, 1783689118, '1783689118');

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
  `gst_state` varchar(5) COLLATE utf8mb3_unicode_ci NOT NULL,
  `price_allotment` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `active` varchar(5) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `auth_user` int NOT NULL,
  `updated` int DEFAULT NULL,
  `created` varchar(35) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `firm_name`, `firm_email`, `firm_phone`, `firm_address`, `image`, `owner_name`, `owner_email`, `owner_phone`, `zone`, `gst`, `category`, `gst_type`, `gst_state`, `price_allotment`, `active`, `auth_user`, `updated`, `created`) VALUES
(3, 'Roshan', '', '', '', NULL, 'Roshan ', '', '', '', '23AKEPP6393D1Z5', '3', 'outer', '23', '', 'yes', 1, 1783670262, '1783670254_1');

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
  `packing_cost` decimal(10,2) NOT NULL,
  `loading_cost` decimal(10,2) NOT NULL,
  `transport_cost` decimal(10,2) NOT NULL,
  `other_cost` decimal(10,2) NOT NULL,
  `transporter_name` varchar(200) COLLATE utf8mb3_unicode_ci NOT NULL,
  `vehicle_no` varchar(50) COLLATE utf8mb3_unicode_ci NOT NULL,
  `transport_document_no` varchar(50) COLLATE utf8mb3_unicode_ci NOT NULL,
  `xxxinvoice` int NOT NULL,
  `auth_user` int NOT NULL,
  `updated` int NOT NULL,
  `created` varchar(35) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `dispatchs`
--

INSERT INTO `dispatchs` (`id`, `order_id`, `notes`, `status`, `created_on_date`, `packing_cost`, `loading_cost`, `transport_cost`, `other_cost`, `transporter_name`, `vehicle_no`, `transport_document_no`, `xxxinvoice`, `auth_user`, `updated`, `created`) VALUES
(6, 2, '', 'new', 20260710, 100.00, 100.00, 100.00, 100.00, 'Trans company', 'gj3405343', 'trans233', 0, 1, 1783683861, '1783683861_1'),
(5, 2, '', 'dispatched', 20260710, 0.00, 0.00, 0.00, 0.00, '', '', '', 0, 1, 1783670777, '1783670401_1');

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
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

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
(8, 2, 30, 2.00, 1, 2, 1, 1783522699, '1783522699_1'),
(9, 3, 30, 3.00, 1, 2, 1, 1783601016, '1783601016_1'),
(10, 3, 38, 5.00, 1, 3, 1, 1783601016, '1783601016_1'),
(11, 3, 72, 5.00, 1, 4, 1, 1783601016, '1783601016_1'),
(12, 3, 38, 5.00, 1, 3, 1, 1783601030, '1783601030_1'),
(13, 5, 34, 20.00, 2, 7, 1, 1783670447, '1783670447_1'),
(14, 5, 34, 10.00, 2, 7, 1, 1783670484, '1783670484_1');

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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `dispatch`, `notes`, `status`, `created_on_date`, `auth_user`, `updated`, `created`) VALUES
(4, 5, '', 'generated', 20260710, 1, 1783670649, '1783670617_1');

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
  `hsn_sac` varchar(20) COLLATE utf8mb3_unicode_ci NOT NULL,
  `order_id` int NOT NULL,
  `auth_user` int NOT NULL,
  `updated` int NOT NULL,
  `created` varchar(35) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `invoice_items`
--

INSERT INTO `invoice_items` (`id`, `invoice`, `dispatch`, `product`, `quantity`, `rate`, `discount`, `igst`, `cgst`, `sgst`, `hsn_sac`, `order_id`, `auth_user`, `updated`, `created`) VALUES
(1, 1, 1, 2, 10.00, 356.00, 1.00, 18.00, 9.00, 9.00, '', 1, 1, 1783521874, '1783521819_1'),
(2, 1, 1, 30, 20.00, 270.00, 2.00, 18.00, 9.00, 9.00, '', 1, 1, 1783521874, '1783521819_1'),
(3, 1, 1, 38, 15.00, 165.00, 3.00, 18.00, 9.00, 9.00, '', 1, 1, 1783521874, '1783521819_1'),
(4, 1, 1, 72, 5.00, 130.00, 4.00, 18.00, 9.00, 9.00, '', 1, 1, 1783521874, '1783521819_1'),
(5, 2, 2, 30, 2.00, 100.00, 1.00, 18.00, 9.00, 9.00, '', 1, 1, 1783592740, '1783526413_1'),
(6, 3, 3, 30, 3.00, 97.00, 5.00, 18.00, 9.00, 9.00, '8708', 1, 1, 1783601066, '1783601066_1'),
(7, 3, 3, 38, 10.00, 100.00, 10.00, 18.00, 9.00, 9.00, '8708', 1, 1, 1783601066, '1783601066_1'),
(8, 3, 3, 72, 5.00, 500.00, 15.00, 18.00, 9.00, 9.00, '8708', 1, 1, 1783601066, '1783601066_1'),
(9, 4, 5, 34, 30.00, 137.00, 1.00, 18.00, 9.00, 9.00, '8708', 2, 1, 1783670649, '1783670649_1');

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
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `ipadd`
--

INSERT INTO `ipadd` (`id`, `ip`, `mac`, `userId`, `logged_on`, `loggedout_on`, `sessionid`, `accounttype`) VALUES
(1, '::1', '', 1, '2026-07-09 05:21:09', '2026-07-10 12:17:46', 'f3ln87nbgi9iae5pt5o4qe800m', ''),
(2, '::1', '', 1, '2026-07-09 08:17:56', '2026-07-10 12:17:46', 'f3ln87nbgi9iae5pt5o4qe800m', ''),
(3, '::1', '', 1, '2026-07-09 08:18:24', '2026-07-10 12:17:46', 'f3ln87nbgi9iae5pt5o4qe800m', ''),
(4, '::1', '', 1, '2026-07-09 08:19:16', '2026-07-10 12:17:46', 'f3ln87nbgi9iae5pt5o4qe800m', ''),
(5, '::1', '', 1, '2026-07-09 08:19:27', '2026-07-10 12:17:46', 'f3ln87nbgi9iae5pt5o4qe800m', ''),
(6, '::1', '', 1, '2026-07-09 09:21:07', '2026-07-10 12:17:46', 'f3ln87nbgi9iae5pt5o4qe800m', ''),
(7, '::1', '', 1, '2026-07-09 09:39:23', '2026-07-10 12:17:46', 'f3ln87nbgi9iae5pt5o4qe800m', ''),
(8, '::1', '', 1, '2026-07-09 12:00:28', '2026-07-10 12:17:46', 'f3ln87nbgi9iae5pt5o4qe800m', ''),
(9, '::1', '', 1, '2026-07-09 12:02:27', '2026-07-10 12:17:46', 'f3ln87nbgi9iae5pt5o4qe800m', ''),
(10, '::1', '', 1, '2026-07-09 12:03:00', '2026-07-10 12:17:46', 'f3ln87nbgi9iae5pt5o4qe800m', ''),
(11, '::1', '', 1, '2026-07-10 06:19:44', '2026-07-10 12:17:46', 'f3ln87nbgi9iae5pt5o4qe800m', ''),
(12, '::1', '', 1, '2026-07-10 06:19:54', '2026-07-10 12:17:46', 'f3ln87nbgi9iae5pt5o4qe800m', ''),
(13, '::1', '', 1, '2026-07-10 06:20:18', '2026-07-10 12:17:46', 'f3ln87nbgi9iae5pt5o4qe800m', ''),
(14, '::1', '', 1, '2026-07-10 10:41:50', '2026-07-10 12:17:46', 'f3ln87nbgi9iae5pt5o4qe800m', ''),
(15, '::1', '', 1, '2026-07-10 11:33:56', '2026-07-10 12:17:46', 'f3ln87nbgi9iae5pt5o4qe800m', ''),
(16, '::1', '', 1, '2026-07-10 12:17:50', '', 'f3ln87nbgi9iae5pt5o4qe800m', '');

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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer`, `notes`, `status`, `user`, `order_date`, `delivery_due_date`, `payment_status`, `auth_user`, `updated`, `created`) VALUES
(2, 3, '', 'completed', 4, 20260710, 20260720, 'fully_paid', 1, 1783670962, '1783670292_1');

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
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `product`, `quantity`, `order_id`, `rate`, `auth_user`, `updated`, `created`) VALUES
(1, 38, 25.00, 1, NULL, 1, 1783519064, '1783519064_1'),
(2, 30, 25.00, 1, NULL, 1, 1783519064, '1783519064_1'),
(3, 2, 10.00, 1, NULL, 1, 1783519064, '1783519064_1'),
(4, 72, 10.00, 1, NULL, 1, 1783519064, '1783519064_1'),
(7, 34, 20.00, 2, NULL, 1, 1783670315, '1783670315_1'),
(6, 2, 50.00, 1, NULL, 1, 1783664821, '1783664821_1'),
(8, 34, 40.00, 2, NULL, 1, 1783670367, '1783670354_1');

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
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `type`, `notes`, `status`, `purchase`, `vendor`, `customer`, `invoice`, `payment_mode`, `reference_no`, `bank_account`, `amount`, `payment_date`, `transaction_type`, `attachment`, `auth_user`, `updated`, `created`) VALUES
(2, 'received', '', 'completed', NULL, NULL, 3, 4, 'bank_transfer', '4rerer', '53', 2000.00, 20260710, 'regular', 0, 1, 1783670934, '1783670866_1'),
(3, 'received', '', 'completed', NULL, NULL, 3, 4, 'bank_transfer', '', '54', 2400.00, 0, 'regular', 0, 1, 1783670887, '1783670887_1');

-- --------------------------------------------------------

--
-- Table structure for table `productions`
--

DROP TABLE IF EXISTS `productions`;
CREATE TABLE IF NOT EXISTS `productions` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `notes` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `status` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `production_date` int NOT NULL,
  `delivery_due_date` int NOT NULL,
  `auth_user` int NOT NULL,
  `updated` int NOT NULL,
  `created` varchar(35) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `productions`
--

INSERT INTO `productions` (`id`, `title`, `notes`, `status`, `production_date`, `delivery_due_date`, `auth_user`, `updated`, `created`) VALUES
(3, 'test11', 'tset test', 'production_started', 20260710, 20260717, 1, 1783681829, '1783681559_1');

-- --------------------------------------------------------

--
-- Table structure for table `production_batchs`
--

DROP TABLE IF EXISTS `production_batchs`;
CREATE TABLE IF NOT EXISTS `production_batchs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `production` int NOT NULL,
  `notes` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `status` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `created_on_date` int NOT NULL,
  `auth_user` int NOT NULL,
  `updated` int NOT NULL,
  `created` varchar(35) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `production_batchs`
--

INSERT INTO `production_batchs` (`id`, `production`, `notes`, `status`, `created_on_date`, `auth_user`, `updated`, `created`) VALUES
(7, 3, '', 'production_ready', 20260710, 1, 1783687051, '1783686910_1');

-- --------------------------------------------------------

--
-- Table structure for table `production_batch_items`
--

DROP TABLE IF EXISTS `production_batch_items`;
CREATE TABLE IF NOT EXISTS `production_batch_items` (
  `id` int NOT NULL AUTO_INCREMENT,
  `production_batch` int NOT NULL,
  `raw_material` int NOT NULL,
  `quantity` decimal(10,2) NOT NULL,
  `production` int NOT NULL,
  `raw_material_lot` int NOT NULL,
  `auth_user` int NOT NULL,
  `updated` int NOT NULL,
  `created` varchar(35) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `production_batch_items`
--

INSERT INTO `production_batch_items` (`id`, `production_batch`, `raw_material`, `quantity`, `production`, `raw_material_lot`, `auth_user`, `updated`, `created`) VALUES
(1, 1, 2, 5.00, 1, 1, 1, 1783521422, '1783521422_1'),
(2, 1, 30, 10.00, 1, 2, 1, 1783521422, '1783521422_1'),
(3, 1, 38, 10.00, 1, 3, 1, 1783521422, '1783521422_1'),
(4, 1, 2, 5.00, 1, 1, 1, 1783521539, '1783521539_1'),
(5, 1, 30, 10.00, 1, 2, 1, 1783521539, '1783521539_1'),
(6, 1, 38, 5.00, 1, 3, 1, 1783521539, '1783521539_1'),
(7, 1, 72, 5.00, 1, 4, 1, 1783521539, '1783521539_1'),
(8, 2, 30, 2.00, 1, 2, 1, 1783522699, '1783522699_1'),
(9, 3, 30, 3.00, 1, 2, 1, 1783601016, '1783601016_1'),
(10, 3, 38, 5.00, 1, 3, 1, 1783601016, '1783601016_1'),
(11, 3, 72, 5.00, 1, 4, 1, 1783601016, '1783601016_1'),
(12, 3, 38, 5.00, 1, 3, 1, 1783601030, '1783601030_1'),
(13, 5, 34, 20.00, 2, 7, 1, 1783670447, '1783670447_1'),
(14, 5, 34, 10.00, 2, 7, 1, 1783670484, '1783670484_1');

-- --------------------------------------------------------

--
-- Table structure for table `production_items`
--

DROP TABLE IF EXISTS `production_items`;
CREATE TABLE IF NOT EXISTS `production_items` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product` int NOT NULL,
  `quantity` decimal(10,2) NOT NULL,
  `production` int NOT NULL,
  `rate` decimal(10,2) DEFAULT NULL,
  `auth_user` int NOT NULL,
  `updated` int NOT NULL,
  `created` varchar(35) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `production_items`
--

INSERT INTO `production_items` (`id`, `product`, `quantity`, `production`, `rate`, `auth_user`, `updated`, `created`) VALUES
(15, 51, 100.00, 3, NULL, 1, 1783682238, '1783682104_1'),
(14, 34, 200.00, 3, NULL, 1, 1783682104, '1783682104_1');

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
  `hsn_sac` varchar(20) COLLATE utf8mb3_unicode_ci NOT NULL,
  `markup_percent` decimal(10,2) NOT NULL,
  `auth_user` int NOT NULL,
  `updated` int NOT NULL,
  `created` varchar(35) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=91 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product`, `code`, `description`, `category`, `image`, `quality`, `type`, `pieces`, `igst`, `cgst`, `sgst`, `hsn_sac`, `markup_percent`, `auth_user`, `updated`, `created`) VALUES
(1, 'Side Guard [2\" Patta] (MS)', 'SGM-004', '', '24', 0, '30', '2\" Patta', 2, 18, 9, 9, '8708', 40.00, 1, 1783510626, '1783510626_1'),
(2, 'Side Guard [3\" Patta] (MS)', 'SGM-005', '', '24', 0, '30', '3\" Patta', 2, 18, 9, 9, '8708', 40.00, 1, 1783510626, '1783510626_1'),
(3, 'Side Guard [V Design, Patta] (MS)', 'SGM-006', '', '24', 0, '30', 'V Design, Patta', 2, 18, 9, 9, '8708', 40.00, 1, 1783510626, '1783510626_1'),
(4, 'Rear Guard [V Design, Patta] (MS)', 'RGM-001', '', '24', 0, '30', 'V Design, Patta', 1, 18, 9, 9, '8708', 40.00, 1, 1783510626, '1783510626_1'),
(5, 'Front Guard [Channel] (MS)', 'FGM-004', '', '25', 0, '30', 'Channel', 1, 18, 9, 9, '8708', 40.00, 1, 1783510626, '1783510626_1'),
(6, 'Side Guard [Double channel] (MS)', 'SGM-001', '', '25', 0, '30', 'Double channel', 2, 18, 9, 9, '8708', 40.00, 1, 1783510626, '1783510626_1'),
(7, 'Rear Guard [Angle, Colour] (MS)', 'RGM-004', '', '26', 0, '30', 'Angle, Colour', 1, 18, 9, 9, '8708', 40.00, 1, 1783510626, '1783510626_1'),
(8, 'Side Guard [Triple channel] (MS)', 'SGM-003', '', '25', 0, '30', 'Triple channel', 2, 18, 9, 9, '8708', 40.00, 1, 1783510626, '1783510626_1'),
(9, 'Side Guard [Double channel, Design] (MS)', 'SGM-002', '', '25', 0, '30', 'Double channel, Design', 2, 18, 9, 9, '8708', 40.00, 1, 1783510626, '1783510626_1'),
(10, 'Front Guard [Raj (Paris)] (MS)', 'FGM-001', '', '23', 0, '30', 'Raj (Paris)', 1, 18, 9, 9, '8708', 40.00, 1, 1783510626, '1783510626_1'),
(11, 'Front Guard [Activa Type] (MS)', 'FGM-002', '', '23', 0, '30', 'Activa Type', 1, 18, 9, 9, '8708', 40.00, 1, 1783510626, '1783510626_1'),
(12, 'Front Guard [Nose Type (Old Model)] (MS)', 'FGM-003', '', '23', 0, '30', 'Nose Type (Old Model)', 1, 18, 9, 9, '8708', 40.00, 1, 1783510626, '1783510626_1'),
(13, 'Front Guard [Half] (MS)', 'FGM-005', '', '23', 0, '30', 'Half', 1, 18, 9, 9, '8708', 40.00, 1, 1783510626, '1783510626_1'),
(14, 'Front Guard [Raj, Heavy (Rajkot)] (MS)', 'FGM-006', '', '23', 0, '30', 'Raj, Heavy (Rajkot)', 1, 18, 9, 9, '8708', 40.00, 1, 1783510626, '1783510626_1'),
(15, 'Front Guard [Fancy] (MS)', 'FGM-007', '', '23', 0, '30', 'Fancy', 1, 18, 9, 9, '8708', 40.00, 1, 1783510626, '1783510626_1'),
(16, 'Side Guard [1\", Hockey] (MS)', 'SGM-007', '', '23', 0, '30', '1\", Hockey', 2, 18, 9, 9, '8708', 40.00, 1, 1783510626, '1783510626_1'),
(17, 'Side Guard [1\" Hockey, With Gola] (MS)', 'SGM-008', '', '23', 0, '30', '1\" Hockey, With Gola', 2, 18, 9, 9, '8708', 40.00, 1, 1783510626, '1783510626_1'),
(18, 'Side Guard [7/8, Pipe] (MS)', 'SGM-009', '', '23', 0, '30', '7/8, Pipe', 2, 18, 9, 9, '8708', 40.00, 1, 1783510626, '1783510626_1'),
(19, 'Side Guard [1\", Pipe] (MS)', 'SGM-010', '', '23', 0, '30', '1\", Pipe', 2, 18, 9, 9, '8708', 40.00, 1, 1783510626, '1783510626_1'),
(20, 'Side Guard [1.25\", Pipe] (MS)', 'SGM-011', '', '23', 0, '30', '1.25\", Pipe', 2, 18, 9, 9, '8708', 40.00, 1, 1783510626, '1783510626_1'),
(21, 'Side Guard [1.25\" Fancy] (MS)', 'SGM-012', '', '23', 0, '30', '1.25\" Fancy', 2, 18, 9, 9, '8708', 40.00, 1, 1783510626, '1783510626_1'),
(22, 'Side Guard [Three Pipe, Flower] (MS)', 'SGM-013', '', '23', 0, '30', 'Three Pipe, Flower', 2, 18, 9, 9, '8708', 40.00, 1, 1783510626, '1783510626_1'),
(23, 'Rear Guard [1.25\"] (MS)', 'RGM-006', '', '23', 0, '30', '1.25\"', 1, 18, 9, 9, '8708', 40.00, 1, 1783510626, '1783510626_1'),
(24, 'Rear Guard [1.25\" Fancy] (MS)', 'RGM-007', '', '23', 0, '30', '1.25\" Fancy', 1, 18, 9, 9, '8708', 40.00, 1, 1783510626, '1783510626_1'),
(25, 'Rear Guard [1.5\"] (MS)', 'RGM-008', '', '23', 0, '30', '1.5\"', 1, 18, 9, 9, '8708', 40.00, 1, 1783510626, '1783510626_1'),
(26, 'Head Light Grill [2010] (MS)', 'HLGM-001', '', '23', 0, '30', '2010', 2, 18, 9, 9, '8708', 40.00, 1, 1783510626, '1783510626_1'),
(27, 'Head Light Grill [Compact] (MS)', 'HLGM-002', '', '23', 0, '30', 'Compact', 2, 18, 9, 9, '8708', 40.00, 1, 1783510626, '1783510626_1'),
(28, 'No Entry [Oval Pipe] (MS)', 'NEM-003', '', '23', 0, '30', 'Oval Pipe', 1, 18, 9, 9, '8708', 40.00, 1, 1783510626, '1783510626_1'),
(29, 'Front Guard [Optima/Maxima] (MS)', 'MOFGM-001', '', '23', 0, '30', 'Optima/Maxima', 1, 18, 9, 9, '8708', 40.00, 1, 1783510626, '1783510626_1'),
(30, 'Side Guard [0.75\", Optima/Maxima] (MS)', 'MOSGM-001', '', '23', 0, '30', '0.75\", Optima/Maxima', 2, 18, 9, 9, '8708', 40.00, 1, 1783510626, '1783510626_1'),
(31, 'Head Light Grill [Optima/Maxima] (MS)', 'MOHGM-001', '', '23', 0, '30', 'Optima/Maxima', 2, 18, 9, 9, '8708', 40.00, 1, 1783510626, '1783510626_1'),
(32, 'Front Indicator Grill [Optima/Maxima] (MS)', 'MOFIGM-001', '', '23', 0, '30', 'Optima/Maxima', 2, 18, 9, 9, '8708', 40.00, 1, 1783510626, '1783510626_1'),
(33, 'Front Guard [5/8, Ape] (MS)', 'AFGM-001', '', '23', 0, '30', '5/8, Ape', 1, 18, 9, 9, '8708', 40.00, 1, 1783510626, '1783510626_1'),
(34, 'Front Guard [0.75\", Ape, Heavy] (MS)', 'AFGM-002', '', '23', 0, '30', '0.75\", Ape, Heavy', 1, 18, 9, 9, '8708', 50.00, 1, 1783669814, '1783510626_1'),
(35, 'Head Light Grill [Ape, Pipe] (MS)', 'AHGM-002', '', '23', 0, '30', 'Ape, Pipe', 2, 18, 9, 9, '8708', 40.00, 1, 1783510626, '1783510626_1'),
(36, 'Front Guard [Ape City] (MS)', 'ACFGM-001', '', '23', 0, '30', 'Ape City', 1, 18, 9, 9, '8708', 40.00, 1, 1783510626, '1783510626_1'),
(37, 'Head Light Grill [Ape City] (MS)', 'ACHGM-001', '', '23', 0, '30', 'Ape City', 2, 18, 9, 9, '8708', 40.00, 1, 1783510626, '1783510626_1'),
(38, 'Brake Light Grill [Ape City] (MS)', 'ACBGM-001', '', '23', 0, '30', 'Ape City', 2, 18, 9, 9, '8708', 40.00, 1, 1783510626, '1783510626_1'),
(39, 'Head Light Grill [Atul] (MS)', 'ATHGM-001', '', '23', 0, '30', 'Atul', 2, 18, 9, 9, '8708', 40.00, 1, 1783510626, '1783510626_1'),
(40, 'Head Light Grill [Alpha (Mahindra)] (MS)', 'ALHGM-001', '', '23', 0, '30', 'Alpha (Mahindra)', 2, 18, 9, 9, '8708', 40.00, 1, 1783510626, '1783510626_1'),
(41, 'Handle [0.75\", Design, 7\"] (MS)', '', '', '23', 0, '30', '0.75\", Design, 7\"', 3, 18, 9, 9, '8708', 40.00, 1, 1783510626, '1783510626_1'),
(42, 'Handle [1\", Design, 7\"] (MS)', '', '', '23', 0, '30', '1\", Design, 7\"', 2, 18, 9, 9, '8708', 40.00, 1, 1783510626, '1783510626_1'),
(43, 'Rear Guard [Angle, Chrome] (MS)', 'RGM-005', '', '26', 0, '30', 'Angle, Chrome', 1, 18, 9, 9, '8708', 40.00, 1, 1783510626, '1783510626_1'),
(44, 'No Entry [Angle, Chrome] (MS)', 'NEM-002', '', '26', 0, '30', 'Angle, Chrome', 1, 18, 9, 9, '8708', 40.00, 1, 1783510626, '1783510626_1'),
(45, 'No Entry [Ape, Angle, Chrome] (MS)', 'ANEM-001', '', '26', 0, '30', 'Ape, Angle, Chrome', 1, 18, 9, 9, '8708', 40.00, 1, 1783510626, '1783510626_1'),
(46, 'Mud Flap Fitting [Angle, Heavy, Small] (MS)', 'MFFM-003', '', '26', 0, '30', 'Angle, Heavy, Small', 2, 18, 9, 9, '8708', 40.00, 1, 1783510626, '1783510626_1'),
(47, 'Mud Flap Fitting [Angle, Heavy, Big] (MS)', 'MFFM-004', '', '26', 0, '30', 'Angle, Heavy, Big', 2, 18, 9, 9, '8708', 40.00, 1, 1783510626, '1783510626_1'),
(48, 'Front Indicator Grill [Compact, Round Saliya] (MS)', 'FIGM-001', '', '27', 0, '30', 'Compact, Round Saliya', 2, 18, 9, 9, '8708', 40.00, 1, 1783510626, '1783510626_1'),
(49, 'Front Indicator Grill [Old Model, Square Saliya] (MS)', 'FIGM-002', '', '27', 0, '30', 'Old Model, Square Saliya', 2, 18, 9, 9, '8708', 40.00, 1, 1783510626, '1783510626_1'),
(50, 'Front Indicator Grill [Compact, Square Saliya] (MS)', 'FIGM-003', '', '27', 0, '30', 'Compact, Square Saliya', 2, 18, 9, 9, '8708', 40.00, 1, 1783510626, '1783510626_1'),
(51, 'Back Indicator Grill [Compact, Round Saliya] (MS)', 'BIGM-001', '', '27', 0, '30', 'Compact, Round Saliya', 2, 18, 9, 9, '8708', 40.00, 1, 1783510626, '1783510626_1'),
(52, 'Back Indicator Grill [Old Model, Square Saliya] (MS)', 'BIGM-002', '', '27', 0, '30', 'Old Model, Square Saliya', 2, 18, 9, 9, '8708', 40.00, 1, 1783510626, '1783510626_1'),
(53, 'Back Indicator Grill [Compact, Square Saliya] (MS)', 'BIGM-003', '', '27', 0, '30', 'Compact, Square Saliya', 2, 18, 9, 9, '8708', 40.00, 1, 1783510626, '1783510626_1'),
(54, 'Head Light Grill [APE, Salia] (MS)', 'AHGM-001', '', '27', 0, '30', 'APE, Salia', 2, 18, 9, 9, '8708', 40.00, 1, 1783510626, '1783510626_1'),
(55, 'Front Guard [Half] (SS)', 'FGS-005', '', '29', 0, '31', 'Half', 1, 18, 9, 9, '8708', 40.00, 1, 1783510626, '1783510626_1'),
(56, 'Front Guard [Raj, Heavy (Rajkot)] (SS)', 'FGS-006', '', '29', 0, '31', 'Raj, Heavy (Rajkot)', 1, 18, 9, 9, '8708', 40.00, 1, 1783510626, '1783510626_1'),
(57, 'Front Guard [Fancy] (SS)', 'FGS-007', '', '29', 0, '31', 'Fancy', 1, 18, 9, 9, '8708', 40.00, 1, 1783510626, '1783510626_1'),
(58, 'Side Guard [1\", Hockey] (SS)', 'SGS-007', '', '29', 0, '31', '1\", Hockey', 2, 18, 9, 9, '8708', 40.00, 1, 1783510626, '1783510626_1'),
(59, 'Side Guard [1\", Hockey, With Gola] (SS)', 'SGS-008', '', '29', 0, '31', '1\", Hockey, With Gola', 2, 18, 9, 9, '8708', 40.00, 1, 1783510626, '1783510626_1'),
(60, 'Side Guard [7/8, Pipe] (SS)', 'SGS-009', '', '29', 0, '31', '7/8, Pipe', 2, 18, 9, 9, '8708', 40.00, 1, 1783510626, '1783510626_1'),
(61, 'Side Guard [1\", Pipe] (SS)', 'SGS-010', '', '29', 0, '31', '1\", Pipe', 2, 18, 9, 9, '8708', 40.00, 1, 1783510626, '1783510626_1'),
(62, 'Side Guard [1.25\", Pipe] (SS)', 'SGS-011', '', '29', 0, '31', '1.25\", Pipe', 2, 18, 9, 9, '8708', 40.00, 1, 1783510626, '1783510626_1'),
(63, 'Side Guard [1.25\", Fancy] (SS)', 'SGS-012', '', '29', 0, '31', '1.25\", Fancy', 2, 18, 9, 9, '8708', 40.00, 1, 1783510626, '1783510626_1'),
(64, 'Side Guard [Double pipe, Fancy] (SS)', 'SGS-014', '', '29', 0, '31', 'Double pipe, Fancy', 2, 18, 9, 9, '8708', 40.00, 1, 1783510626, '1783510626_1'),
(65, 'Rear Guard [1.25\", Pipe] (SS)', 'RGS-006', '', '29', 0, '31', '1.25\", Pipe', 1, 18, 9, 9, '8708', 40.00, 1, 1783510626, '1783510626_1'),
(66, 'Rear Guard [1.25\" Fancy] (SS)', 'RGS-007', '', '29', 0, '31', '1.25\" Fancy', 1, 18, 9, 9, '8708', 40.00, 1, 1783510626, '1783510626_1'),
(67, 'Rear Guard [1.50\", Pipe] (SS)', 'RGS-008', '', '29', 0, '31', '1.50\", Pipe', 1, 18, 9, 9, '8708', 40.00, 1, 1783510626, '1783510626_1'),
(68, 'Rear Guard [Double pipe, Fancy] (SS)', 'RGS-009', '', '29', 0, '31', 'Double pipe, Fancy', 1, 18, 9, 9, '8708', 40.00, 1, 1783510626, '1783510626_1'),
(69, 'Rear Guard [2\", Pipe] (SS)', 'RGS-010', '', '29', 0, '31', '2\", Pipe', 1, 18, 9, 9, '8708', 40.00, 1, 1783510626, '1783510626_1'),
(70, 'Rear Guard [Square, Pipe] (SS)', 'RGS-011', '', '29', 0, '31', 'Square, Pipe', 1, 18, 9, 9, '8708', 40.00, 1, 1783510626, '1783510626_1'),
(71, 'No Entry [Oval Pipe] (SS)', 'NES-003', '', '29', 0, '31', 'Oval Pipe', 1, 18, 9, 9, '8708', 40.00, 1, 1783510626, '1783510626_1'),
(72, 'Front Guard [Optima/Maxima] (SS)', 'MOFGS-001', '', '29', 0, '31', 'Optima/Maxima', 1, 18, 9, 9, '8708', 40.00, 1, 1783510626, '1783510626_1'),
(73, 'Head light Grill [Optima/Maxima] (SS)', 'MOHGS-001', '', '29', 0, '31', 'Optima/Maxima', 2, 18, 9, 9, '8708', 40.00, 1, 1783510626, '1783510626_1'),
(74, 'Front Indicator Grill [Optima/Maxima] (SS)', 'MOFIGS-001', '', '29', 0, '31', 'Optima/Maxima', 2, 18, 9, 9, '8708', 40.00, 1, 1783510626, '1783510626_1'),
(75, 'Brake Indicator Grill [Optima/Maxima] (SS)', 'MOBGS-001', '', '29', 0, '31', 'Optima/Maxima', 2, 18, 9, 9, '8708', 40.00, 1, 1783510626, '1783510626_1'),
(76, 'Side Guard [Optima/Maxima] (SS)', 'MOSGS-001', '', '29', 0, '31', 'Optima/Maxima', 2, 18, 9, 9, '8708', 40.00, 1, 1783510626, '1783510626_1'),
(77, 'Rear Guard [Optima/Maxima] (SS)', 'MORGS-001', '', '29', 0, '31', 'Optima/Maxima', 1, 18, 9, 9, '8708', 40.00, 1, 1783510626, '1783510626_1'),
(78, 'Brake Indicator Grill [Ape, Pipe] (SS)', 'ABGS-001', '', '29', 0, '31', 'Ape, Pipe', 2, 18, 9, 9, '8708', 40.00, 1, 1783510626, '1783510626_1'),
(79, 'Front Guard [Ape City] (SS)', 'ACFGS-001', '', '29', 0, '31', 'Ape City', 1, 18, 9, 9, '8708', 40.00, 1, 1783510626, '1783510626_1'),
(80, 'Head light Grill [Ape City] (SS)', 'ACHGS-001', '', '29', 0, '31', 'Ape City', 2, 18, 9, 9, '8708', 40.00, 1, 1783510626, '1783510626_1'),
(81, 'Brake light Grill [Ape City] (SS)', 'ACBGS-001', '', '29', 0, '31', 'Ape City', 2, 18, 9, 9, '8708', 40.00, 1, 1783510626, '1783510626_1'),
(82, 'Side Guard [Ape City] (SS)', 'ACSGS-001', '', '29', 0, '31', 'Ape City', 2, 18, 9, 9, '8708', 40.00, 1, 1783510626, '1783510626_1'),
(83, 'Front Guard [TVS] (SS)', '', '', '29', 0, '31', 'TVS', 1, 18, 9, 9, '8708', 40.00, 1, 1783510626, '1783510626_1'),
(84, 'Head Light Grill [TVS, Saliya, Pipe] (SS)', '', '', '29', 0, '31', 'TVS, Saliya, Pipe', 2, 18, 9, 9, '8708', 40.00, 1, 1783510626, '1783510626_1'),
(85, 'Front Indicator Grill [Compact, Round Saliya] (SS)', 'FIGS-001', '', '28', 0, '31', 'Compact, Round Saliya', 2, 18, 9, 9, '8708', 40.00, 1, 1783510626, '1783510626_1'),
(86, 'Front Indicator Grill [Compact, Square Saliya] (SS)', 'FIGS-003', '', '28', 0, '31', 'Compact, Square Saliya', 2, 18, 9, 9, '8708', 40.00, 1, 1783510626, '1783510626_1'),
(87, 'Front Indicator Grill [Compact, Round Saliya, Heavy] (SS)', 'FIGS-004', '', '28', 0, '31', 'Compact, Round Saliya, Heavy', 2, 18, 9, 9, '8708', 40.00, 1, 1783510626, '1783510626_1'),
(88, 'Back Indicator Grill [Compact, Round Saliya] (SS)', 'BIGS-001', '', '28', 0, '31', 'Compact, Round Saliya', 2, 18, 9, 9, '8708', 40.00, 1, 1783510626, '1783510626_1'),
(89, 'Back Indicator Grill [Compact, Square Saliya] (SS)', 'BIGS-003', '', '28', 0, '31', 'Compact, Square Saliya', 2, 18, 9, 9, '8708', 40.00, 1, 1783510626, '1783510626_1'),
(90, 'Back Indicator Grill [Compact, Round Saliya, Heavy] (SS)', 'BIGS-004', '', '28', 0, '31', 'Compact, Round Saliya, Heavy', 2, 18, 9, 9, '8708', 40.00, 1, 1783600900, '1783510626_1');

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
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `product_lots`
--

INSERT INTO `product_lots` (`id`, `product`, `ordered_quantity`, `received_quantity`, `accepted_quantity`, `rejected_quantity`, `available_quantity`, `reserved_quantity`, `consumed_quantity`, `notes`, `source`, `status`, `purchase`, `buy_price`, `auth_user`, `updated`, `created`) VALUES
(7, 34, 100, 95, 90, 5, 60, 0, 30, '', 'produced', 'ready', NULL, NULL, 1, 1783670777, '1783670201_1');

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
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

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
(15, 1, 30, 2, 2, 2, 'reserve', 1783522699, 1, 1783522699, '1783522699_1'),
(16, 1, 30, 2, 3, 3, 'reserve', 1783601016, 1, 1783601016, '1783601016_1'),
(17, 1, 38, 3, 3, 5, 'reserve', 1783601016, 1, 1783601016, '1783601016_1'),
(18, 1, 72, 4, 3, 5, 'reserve', 1783601016, 1, 1783601016, '1783601016_1'),
(19, 1, 38, 3, 3, 5, 'reserve', 1783601030, 1, 1783601030, '1783601030_1'),
(20, 2, 34, 7, 5, 20, 'reserve', 1783670447, 1, 1783670447, '1783670447_1'),
(21, 2, 34, 7, 5, 10, 'reserve', 1783670484, 1, 1783670484, '1783670484_1'),
(22, 2, 34, 7, 5, 20, 'consume', 1783670777, 1, 1783670777, '1783670777_1'),
(23, 2, 34, 7, 5, 10, 'consume', 1783670777, 1, 1783670777, '1783670777_1');

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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `title`, `payment_status`, `notes`, `status`, `purchase_invoice`, `vendor`, `sub_total`, `gst`, `tax`, `discount`, `grand_total`, `order_date`, `expected_delivery_date`, `first_received_date`, `fully_received_date`, `cancel_date`, `auth_user`, `updated`, `created`) VALUES
(4, 'MS pipes', 'on_hold', '', 'partially_received', 17, 0, 1000.00, 0.00, 50.00, 50.00, 1100.00, 0, 0, 0, 0, 0, 1, 1783671134, '1783671134_1'),
(3, 'MS pipes', 'pending', '', 'order_placed', 16, 1, 1000.00, 0.00, 50.00, 50.00, 1100.00, 20260710, 0, 0, 0, 0, 1, 1783671119, '1783671119_1');

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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `raw_material_lots`
--

INSERT INTO `raw_material_lots` (`id`, `raw_material`, `ordered_quantity`, `received_quantity`, `accepted_quantity`, `rejected_quantity`, `available_quantity`, `reserved_quantity`, `consumed_quantity`, `notes`, `status`, `purchase`, `buy_price`, `auth_user`, `updated`, `created`) VALUES
(2, 6, 100, 90, 80, 10, 80, 0, 0, '', 'ready', 0, 50.00, 1, 1783669412, '1783669380_1'),
(3, 14, 500, 500, 500, 0, 500, 0, 0, '', 'ready', 4, 50.00, 1, 1783689058, '1783689036_1'),
(4, 14, 400, 400, 400, 0, 400, 0, 0, '', 'ready', 4, 50.00, 1, 1783689118, '1783689118_1');

-- --------------------------------------------------------

--
-- Table structure for table `raw_material_movements`
--

DROP TABLE IF EXISTS `raw_material_movements`;
CREATE TABLE IF NOT EXISTS `raw_material_movements` (
  `id` int NOT NULL AUTO_INCREMENT,
  `production` int NOT NULL,
  `raw_material` int NOT NULL,
  `raw_material_lot` int NOT NULL,
  `production_batch` int NOT NULL,
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
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `raw_material_rates`
--

INSERT INTO `raw_material_rates` (`id`, `entity`, `rate`, `effective_date`, `auth_user`, `updated`, `created`) VALUES
(4, 'RMRG-2', 80.00, 20260710, 1, 1783670043, '1783670043_1'),
(3, 'RMRG-1', 60.00, 20260710, 1, 1783669862, '1783668280_1'),
(5, 'RM-32', 10.00, 20260710, 1, 1783670065, '1783670065_1');

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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `raw_material_rate_groups`
--

INSERT INTO `raw_material_rate_groups` (`id`, `raw_material_rate_group`, `auth_user`, `updated`, `created`) VALUES
(1, 'MS Pipes', 1, 1783668265, '1783525518_1'),
(2, 'SS Pipes', 1, 1783670024, '1783670024_1');

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
) ENGINE=MyISAM AUTO_INCREMENT=60 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `raw_material_rate_group_link`
--

INSERT INTO `raw_material_rate_group_link` (`id`, `raw_material_rate_group`, `raw_material`) VALUES
(42, 1, 5),
(41, 1, 4),
(40, 1, 3),
(39, 1, 2),
(38, 1, 14),
(37, 1, 1),
(36, 1, 9),
(35, 1, 8),
(34, 1, 13),
(33, 1, 12),
(32, 1, 11),
(31, 1, 10),
(30, 1, 7),
(29, 1, 6),
(43, 2, 20),
(44, 2, 21),
(45, 2, 24),
(46, 2, 25),
(47, 2, 26),
(48, 2, 27),
(49, 2, 22),
(50, 2, 23),
(51, 2, 28),
(52, 2, 29),
(53, 2, 31),
(54, 2, 15),
(55, 2, 30),
(56, 2, 16),
(57, 2, 17),
(58, 2, 18),
(59, 2, 19);

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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

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
(11, 'uploads/1309044386-3d-rendering-money-tree-sm.jpg', NULL, NULL, NULL, NULL, 'image/jpeg', 2285977, 'uploads/1309044386-thumb-3d-rendering-money-tree-sm.jpg', 'uploads/1309044386-small-3d-rendering-money-tree-sm.jpg', 'purchases', 1, 'document', '48', '', 1, 1783527917, '1783527917_1'),
(12, 'uploads/2057268432-WhatsApp Image 2026-03-31 at 10.58.45 AM.jpeg', NULL, NULL, NULL, NULL, 'image/jpeg', 101857, 'uploads/2057268432-thumb-WhatsApp Image 2026-03-31 at 10.58.45 AM.jpeg', 'uploads/2057268432-small-WhatsApp Image 2026-03-31 at 10.58.45 AM.jpeg', 'dispatchs', 1, 'document', '58', 'xxx', 1, 1783587844, '1783587844_1'),
(13, 'uploads/1815274417-combo4.jpg', NULL, NULL, NULL, NULL, 'image/jpeg', 279028, 'uploads/1815274417-thumb-combo4.jpg', 'uploads/1815274417-small-combo4.jpg', 'dispatchs', 1, 'document', '55', 'yyy', 1, 1783587844, '1783587844_1'),
(14, 'uploads/454367-WhatsApp Image 2026-03-31 at 10.58.45 AM.jpeg', NULL, NULL, NULL, NULL, 'image/jpeg', 101857, 'uploads/454367-thumb-WhatsApp Image 2026-03-31 at 10.58.45 AM.jpeg', 'uploads/454367-small-WhatsApp Image 2026-03-31 at 10.58.45 AM.jpeg', NULL, NULL, NULL, NULL, NULL, 1, 1783666654, NULL),
(15, 'uploads/538956137-test.pdf', NULL, NULL, NULL, NULL, 'application/pdf', 36551, '', '', 'purchases', 2, 'document', '49', '', 1, 1783666654, '1783666654_1'),
(16, 'uploads/1408428987-test.pdf', NULL, NULL, NULL, NULL, 'application/pdf', 36551, '', '', NULL, NULL, NULL, NULL, NULL, 1, 1783671119, NULL),
(17, 'uploads/1710191304-test.pdf', NULL, NULL, NULL, NULL, 'application/pdf', 36551, '', '', NULL, NULL, NULL, NULL, NULL, 1, 1783671134, NULL);

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
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`id`, `user_role`, `auth_user`, `updated`, `created`) VALUES
(7, 'Sales Man', 1, 1783671304, '1783527760_1'),
(8, 'Inventory manager', 1, 1783671185, '1783671185_1');

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
) ENGINE=MyISAM AUTO_INCREMENT=108 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `user_role_permission_link`
--

INSERT INTO `user_role_permission_link` (`id`, `user_role`, `permission`) VALUES
(34, 5, 'users-read'),
(33, 5, 'symbols-delete'),
(32, 5, 'symbols-create'),
(31, 5, 'symbols-update'),
(93, 8, 'raw_material_lots-create'),
(23, 4, 'user_roles-delete'),
(22, 4, 'user_roles-update'),
(21, 4, 'users-create'),
(20, 4, 'symbols-read'),
(92, 8, 'raw_material_lots-update'),
(91, 8, 'raw_material_lots-read'),
(106, 7, 'order_items-update'),
(105, 7, 'order_items-read'),
(104, 7, 'orders-create'),
(103, 7, 'orders-update'),
(102, 7, 'orders-read'),
(101, 7, 'product_lots-read'),
(100, 7, 'products-costing'),
(99, 7, 'products-read'),
(94, 8, 'raw_material_lots-delete'),
(95, 8, 'products-read'),
(96, 8, 'products-update'),
(97, 8, 'products-create'),
(98, 8, 'products-delete'),
(107, 7, 'order_items-create');

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
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `firm_name`, `firm_email`, `firm_phone`, `firm_address`, `image`, `owner_name`, `owner_email`, `owner_phone`, `pan`, `gst`, `category`, `payment_term`, `active`, `auth_user`, `updated`, `created`) VALUES
(1, 'Royal Fabrications', 'royal@gmail.com', '9333444422, 838455764\r\n', 'Royal Fab, Ahd, GJ', NULL, 'Raju', '', '', 'AYEPP6778D', '23AYEPP6778D1Z1', '7', '30 days', 'yes', 1, 1783528039, '1783528039_1'),
(3, 'Star indus', '', '', '', NULL, 'Star', '', '', '', '23AKEPP6393D1Z5', '10', '', 'yes', 1, 1783671022, '1783671022_1');

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
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

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
(13, 1, 33),
(14, 2, 6),
(15, 2, 7),
(16, 2, 10),
(17, 2, 11),
(18, 2, 12),
(19, 2, 13),
(20, 2, 8),
(21, 2, 9),
(22, 2, 1),
(23, 2, 14),
(24, 2, 2),
(25, 2, 3),
(26, 2, 4),
(27, 2, 5),
(28, 3, 49),
(29, 3, 53),
(30, 3, 51),
(31, 3, 52),
(32, 3, 56),
(33, 3, 59),
(34, 3, 48);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
