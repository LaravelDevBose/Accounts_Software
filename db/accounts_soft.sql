-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2018 at 02:03 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `accounts_soft`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(20) UNSIGNED NOT NULL,
  `enty_type` tinyint(1) DEFAULT NULL,
  `ie_head` int(20) DEFAULT NULL,
  `account_type` varchar(20) DEFAULT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `amount` int(10) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `status` char(5) DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `enty_type`, `ie_head`, `account_type`, `date`, `amount`, `description`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 5, 'other_income', '2018-11-05 18:00:00', 5000, '', 'a', 'admin', 'admin', '2018-11-10 18:00:00', '2018-11-10 18:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `admin_access`
--

CREATE TABLE `admin_access` (
  `id` int(20) UNSIGNED NOT NULL,
  `admin_id` tinyint(1) DEFAULT NULL,
  `sale_module` tinyint(1) DEFAULT '0',
  `customer_order` tinyint(1) DEFAULT '0',
  `order_entry` tinyint(1) DEFAULT '0',
  `all_order_list` tinyint(1) DEFAULT '0',
  `pending_order_list` tinyint(1) DEFAULT '0',
  `process_order_list` tinyint(1) DEFAULT '0',
  `ready_car_sale` tinyint(1) DEFAULT '0',
  `customer_entry` tinyint(1) DEFAULT '0',
  `customer_list` tinyint(1) DEFAULT '0',
  `purchase_module` tinyint(1) DEFAULT '0',
  `purchase_entry` tinyint(1) DEFAULT '0',
  `purchase_list` tinyint(1) DEFAULT '0',
  `pricing_entry` tinyint(1) DEFAULT '0',
  `pricing_list` tinyint(1) DEFAULT '0',
  `transport_status` tinyint(1) DEFAULT '0',
  `supplier` tinyint(1) DEFAULT '0',
  `transport_head` tinyint(1) DEFAULT '0',
  `account_module` tinyint(1) DEFAULT '0',
  `collection` tinyint(1) DEFAULT '0',
  `payment` tinyint(1) DEFAULT '0',
  `ofice_payment` tinyint(1) DEFAULT '0',
  `other_income` tinyint(1) DEFAULT '0',
  `bank_trans` tinyint(1) DEFAULT '0',
  `balance_sheet` tinyint(1) DEFAULT '0',
  `check_option` tinyint(1) DEFAULT '0',
  `check_entry` tinyint(1) DEFAULT '0',
  `pending_check_list` tinyint(1) DEFAULT '0',
  `reminder_check_list` tinyint(1) DEFAULT '0',
  `paid_check_list` tinyint(1) DEFAULT '0',
  `hr_module` tinyint(1) DEFAULT '0',
  `sallay_payment` tinyint(1) DEFAULT '0',
  `employee_list` tinyint(1) DEFAULT '0',
  `employee_entry` tinyint(1) DEFAULT '0',
  `monthe_entry` tinyint(1) DEFAULT '0',
  `report_module` tinyint(1) DEFAULT '0',
  `stock_report` tinyint(1) DEFAULT '0',
  `car_full_report` tinyint(1) DEFAULT '0',
  `car_coll_report` tinyint(1) DEFAULT '0',
  `cus_due_report` tinyint(1) DEFAULT '0',
  `cus_order_report` tinyint(1) DEFAULT '0',
  `deliv_order_report` tinyint(1) DEFAULT '0',
  `lc_order_report` tinyint(1) DEFAULT '0',
  `collection_report` tinyint(1) DEFAULT '0',
  `cus_coll_report` tinyint(1) DEFAULT '0',
  `date_payment_report` tinyint(1) DEFAULT '0',
  `supplier_payment_report` tinyint(1) DEFAULT '0',
  `office_payment_report` tinyint(1) DEFAULT '0',
  `sallary_report` tinyint(1) DEFAULT '0',
  `emp_sallary_report` tinyint(1) DEFAULT '0',
  `lc_list_report` tinyint(1) DEFAULT '0',
  `cus_list_report` tinyint(1) DEFAULT '0',
  `administration` tinyint(1) DEFAULT '0',
  `lc_info` tinyint(1) DEFAULT '0',
  `lc_entry` tinyint(1) DEFAULT '0',
  `lc_list` tinyint(1) DEFAULT '0',
  `expense_head_entry` tinyint(1) DEFAULT '0',
  `company_info` tinyint(1) DEFAULT '0',
  `admin` tinyint(1) DEFAULT '0',
  `admin_entry` tinyint(1) DEFAULT '0',
  `admin_list` tinyint(1) DEFAULT '0',
  `admin_access` tinyint(1) DEFAULT '0',
  `edit_access` tinyint(1) DEFAULT '0',
  `delete_access` tinyint(1) DEFAULT '0',
  `created_by` varchar(100) DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_access`
--

INSERT INTO `admin_access` (`id`, `admin_id`, `sale_module`, `customer_order`, `order_entry`, `all_order_list`, `pending_order_list`, `process_order_list`, `ready_car_sale`, `customer_entry`, `customer_list`, `purchase_module`, `purchase_entry`, `purchase_list`, `pricing_entry`, `pricing_list`, `transport_status`, `supplier`, `transport_head`, `account_module`, `collection`, `payment`, `ofice_payment`, `other_income`, `bank_trans`, `balance_sheet`, `check_option`, `check_entry`, `pending_check_list`, `reminder_check_list`, `paid_check_list`, `hr_module`, `sallay_payment`, `employee_list`, `employee_entry`, `monthe_entry`, `report_module`, `stock_report`, `car_full_report`, `car_coll_report`, `cus_due_report`, `cus_order_report`, `deliv_order_report`, `lc_order_report`, `collection_report`, `cus_coll_report`, `date_payment_report`, `supplier_payment_report`, `office_payment_report`, `sallary_report`, `emp_sallary_report`, `lc_list_report`, `cus_list_report`, `administration`, `lc_info`, `lc_entry`, `lc_list`, `expense_head_entry`, `company_info`, `admin`, `admin_entry`, `admin_list`, `admin_access`, `edit_access`, `delete_access`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 5, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, NULL, 'admin', '2018-10-31 10:05:24', '2018-11-11 10:18:20'),
(3, 12, 1, 1, 1, 1, 1, 1, 0, 1, 1, 1, 1, 1, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, NULL, NULL, '2018-11-01 05:53:50', '2018-11-01 05:53:50'),
(4, 14, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, NULL, NULL, '2018-11-11 06:55:12', '2018-11-11 06:55:12');

-- --------------------------------------------------------

--
-- Table structure for table `agents`
--

CREATE TABLE `agents` (
  `id` int(20) UNSIGNED NOT NULL,
  `agent_code` varchar(100) NOT NULL,
  `agent_name` varchar(255) NOT NULL,
  `agent_phone` varchar(100) DEFAULT NULL,
  `agent_email` varchar(100) DEFAULT NULL,
  `agent_address` text,
  `status` char(5) DEFAULT 'a',
  `created_by` varchar(150) DEFAULT NULL,
  `updated_by` varchar(1500) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `agents`
--

INSERT INTO `agents` (`id`, `agent_code`, `agent_name`, `agent_phone`, `agent_email`, `agent_address`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'A00001', 'Japan Express', '985468751', 'japanexpress@gmail.com', 'japan', 'a', 'admin', 'admin', '2018-11-10 18:00:00', '2018-11-10 18:00:00'),
(2, 'A00002', 'chu huwang', '9876541587', 'chuhuwang@yehoo.com', 'japan', 'a', 'admin', 'admin', '2018-11-10 18:00:00', '2018-11-10 18:00:00'),
(3, 'A00003', 'Marto Fande', '336548744', 'fande@gmail.com', 'China', 'a', 'admin', 'admin', '2018-11-10 18:00:00', '2018-11-10 18:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `id` smallint(10) UNSIGNED NOT NULL,
  `bank_name` varchar(250) NOT NULL,
  `branch_name` varchar(250) NOT NULL,
  `account_no` varchar(250) NOT NULL,
  `opening_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `current_balance` int(20) NOT NULL,
  `status` char(5) DEFAULT 'a',
  `created_by` varchar(250) DEFAULT NULL,
  `updated_by` varchar(250) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`id`, `bank_name`, `branch_name`, `account_no`, `opening_date`, `current_balance`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'DBBL', 'Mirpur 10', '123456789', '2016-03-01 18:00:00', 50000, 'a', 'admin', 'admin', '2018-11-11 06:42:31', '2018-11-11 06:42:31'),
(2, 'Standard Chartered', 'Mirpur 11', '25879123', '2017-07-05 18:00:00', 100000, 'a', 'admin', 'admin', '2018-11-11 06:44:12', '2018-11-11 06:44:12'),
(3, 'EBL', 'Mirpur 10', '456951357', '2018-01-31 18:00:00', 60000, 'a', 'admin', 'admin', '2018-11-11 06:44:45', '2018-11-11 06:44:45');

-- --------------------------------------------------------

--
-- Table structure for table `bank_trans`
--

CREATE TABLE `bank_trans` (
  `id` int(20) UNSIGNED NOT NULL,
  `trans_id` varchar(100) NOT NULL,
  `trans_type` char(5) NOT NULL,
  `bank_id` int(20) NOT NULL COMMENT 'banks tbl id',
  `trans_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `amount` int(10) NOT NULL,
  `note` varchar(250) DEFAULT NULL,
  `status` char(5) DEFAULT 'a',
  `created_by` varchar(250) DEFAULT NULL,
  `updated_by` varchar(250) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `car_images`
--

CREATE TABLE `car_images` (
  `id` int(30) UNSIGNED NOT NULL,
  `pus_id` int(20) NOT NULL,
  `image_path` text NOT NULL,
  `status` char(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `car_images`
--

INSERT INTO `car_images` (`id`, `pus_id`, `image_path`, `status`) VALUES
(1, 6, 'libs/upload_pic/car_image/788526025beac5688268b.jpg', 'a'),
(2, 6, 'libs/upload_pic/car_image/14721785295beac568a2f59.jpg', 'a'),
(3, 6, 'libs/upload_pic/car_image/9527851355beac568bac67.jpg', 'a');

-- --------------------------------------------------------

--
-- Table structure for table `checks`
--

CREATE TABLE `checks` (
  `id` int(20) UNSIGNED NOT NULL,
  `cus_id` int(20) DEFAULT NULL,
  `bank_name` varchar(250) DEFAULT NULL,
  `branch_name` varchar(250) DEFAULT NULL,
  `check_no` varchar(250) DEFAULT NULL,
  `check_amount` int(10) DEFAULT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `check_date` timestamp NULL DEFAULT NULL,
  `remid_date` timestamp NULL DEFAULT NULL,
  `sub_date` timestamp NULL DEFAULT NULL,
  `note` varchar(250) DEFAULT NULL,
  `check_status` char(5) DEFAULT 'Pe' COMMENT 'Pe =Pending, Pa = Paid',
  `status` char(5) NOT NULL DEFAULT 'a',
  `created_by` varchar(250) DEFAULT NULL,
  `updated_by` varchar(250) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `collections`
--

CREATE TABLE `collections` (
  `id` int(20) UNSIGNED NOT NULL,
  `coll_sl` varchar(100) NOT NULL,
  `cus_id` int(20) UNSIGNED NOT NULL,
  `order_no` int(20) UNSIGNED DEFAULT NULL,
  `collection_type` tinyint(4) NOT NULL,
  `cheque_no` varchar(150) DEFAULT NULL,
  `bank_name` varchar(150) DEFAULT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `amount` int(10) UNSIGNED DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `type` char(50) DEFAULT NULL,
  `status` char(5) DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `collections`
--

INSERT INTO `collections` (`id`, `coll_sl`, `cus_id`, `order_no`, `collection_type`, `cheque_no`, `bank_name`, `date`, `amount`, `description`, `type`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'MC-00001', 2, 2, 1, NULL, NULL, '2018-11-10 18:00:00', 50000, '', 'receive', 'a', 'admin', 'admin', '2018-11-11 10:40:59', '2018-11-11 10:40:59'),
(2, 'MC-00002', 2, 2, 2, NULL, NULL, '2018-11-10 18:00:00', 5000, '', 'receive', 'a', 'admin', 'admin', '2018-11-11 10:42:12', '2018-11-11 10:59:05'),
(3, 'MC-00003', 2, 2, 4, '12345678958', 'DBBL', '2018-11-06 18:00:00', 100000, 'by maven auto', 'receive', 'a', 'admin', 'admin', '2018-11-13 08:30:12', '2018-11-13 08:30:12'),
(4, 'MC-00004', 2, 2, 4, '5544', 'dds', '2018-11-12 18:00:00', 10000, '', 'receive', 'a', 'admin', 'admin', '2018-11-13 08:33:52', '2018-11-13 08:33:52'),
(5, 'MC-00005', 2, 2, 1, '', '', '2018-11-12 18:00:00', 50000, '', 'receive', 'a', 'admin', 'admin', '2018-11-13 08:36:51', '2018-11-13 08:36:51'),
(6, 'MC-00006', 2, 2, 4, '55555', 'ffff', '2018-11-12 18:00:00', 10000, 'gdfgdfgdfg', 'receive', 'a', 'admin', 'admin', '2018-11-13 08:38:02', '2018-11-13 08:38:02'),
(7, 'MC-00007', 2, 2, 4, '45454', 'jkjkj', '2018-11-12 18:00:00', 10000, '', 'receive', 'a', 'admin', 'admin', '2018-11-13 08:41:34', '2018-11-13 08:41:34'),
(8, 'MC-00008', 2, 6, 4, '10000', 'hhhhh', '2018-11-12 18:00:00', 9999, '', 'receive', 'a', 'admin', 'admin', '2018-11-13 09:27:21', '2018-11-13 09:27:21'),
(9, 'MC-00009', 3, 4, 2, '', '', '2018-11-12 18:00:00', 343434, '', 'receive', 'a', 'admin', 'admin', '2018-11-13 09:28:53', '2018-11-13 09:28:53'),
(10, 'MC-00010', 3, 5, 1, '', '', '2018-11-12 18:00:00', 543434, '', 'receive', 'a', 'admin', 'admin', '2018-11-13 09:29:50', '2018-11-13 09:29:50'),
(11, 'MC-00011', 3, 5, 1, '', '', '2018-11-12 18:00:00', 45454, '', 'receive', 'a', 'admin', 'admin', '2018-11-13 09:31:01', '2018-11-13 09:31:01'),
(12, 'MC-00012', 3, 5, 1, '', '', '2018-11-12 18:00:00', 53434, '', 'receive', 'a', 'admin', 'admin', '2018-11-13 09:31:57', '2018-11-13 09:31:57'),
(13, 'MC-00013', 3, 5, 1, '', '', '2018-11-12 18:00:00', 4343, '', 'receive', 'a', 'admin', 'admin', '2018-11-13 09:32:21', '2018-11-13 09:32:21'),
(14, 'MC-00014', 2, 6, 2, '', '', '2018-11-12 18:00:00', 453343, '', 'receive', 'a', 'admin', 'admin', '2018-11-13 09:34:21', '2018-11-13 09:34:21'),
(15, 'MC-00015', 3, 5, 2, '', '', '2018-11-12 18:00:00', 34343434, '', 'receive', 'a', 'admin', 'admin', '2018-11-13 09:36:01', '2018-11-13 09:36:01'),
(16, 'MC-00016', 2, 2, 2, '', '', '2018-11-12 18:00:00', 44545, '', 'receive', 'a', 'admin', 'admin', '2018-11-13 09:40:14', '2018-11-13 09:40:14'),
(17, 'MC-00017', 2, 6, 3, '', '', '2018-11-12 18:00:00', 433434, '', 'receive', 'a', 'admin', 'admin', '2018-11-13 09:41:03', '2018-11-13 09:41:03'),
(18, 'MC-00018', 3, 5, 1, '', '', '2018-11-12 18:00:00', 43434, '', 'receive', 'a', 'admin', 'admin', '2018-11-13 09:42:29', '2018-11-13 09:42:29'),
(19, 'MC-00019', 3, 5, 2, '', '', '2018-11-12 18:00:00', 34343, '', 'receive', 'a', 'admin', 'admin', '2018-11-13 09:42:58', '2018-11-13 09:42:58'),
(20, 'MC-00020', 3, 4, 1, '', '', '2018-11-12 18:00:00', 3324324, '', 'receive', 'a', 'admin', 'admin', '2018-11-13 09:43:44', '2018-11-13 09:43:44'),
(21, 'MC-00021', 3, 5, 1, '', '', '2018-11-12 18:00:00', 343434, '', 'receive', 'a', 'admin', 'admin', '2018-11-13 09:44:41', '2018-11-13 09:44:41'),
(22, 'MC-00022', 2, 6, 2, '', '', '2018-11-12 18:00:00', 4234234, '', 'receive', 'a', 'admin', 'admin', '2018-11-13 09:45:37', '2018-11-13 09:45:37'),
(23, 'MC-00023', 3, 4, 2, '', '', '2018-11-12 18:00:00', 4343434, '', 'receive', 'a', 'admin', 'admin', '2018-11-13 09:47:40', '2018-11-13 09:47:40'),
(24, 'MC-00024', 3, 5, 3, '', '', '2018-11-12 18:00:00', 4343, '', 'receive', 'a', 'admin', 'admin', '2018-11-13 09:49:04', '2018-11-13 09:49:04'),
(25, 'MC-00025', 3, 5, 3, '', '', '2018-11-12 18:00:00', 33333, '', 'receive', 'a', 'admin', 'admin', '2018-11-13 09:50:54', '2018-11-13 09:50:54'),
(26, 'MC-00026', 3, 5, 1, '', '', '2018-11-12 18:00:00', 343434, '', 'receive', 'a', 'admin', 'admin', '2018-11-13 09:52:22', '2018-11-13 09:52:22'),
(27, 'MC-00027', 2, 2, 1, '', '', '2018-11-12 18:00:00', 43434, '', 'receive', 'a', 'admin', 'admin', '2018-11-13 09:53:33', '2018-11-13 09:53:33'),
(28, 'MC-00028', 1, 1, 4, '445454545', 'dddbl', '2018-11-12 18:00:00', 50000, 'okk', 'receive', 'a', 'admin', 'admin', '2018-11-13 09:55:02', '2018-11-13 09:55:02'),
(29, 'MC-00029', 3, 5, 2, '', '', '2018-11-12 18:00:00', 4343434, '', 'receive', 'a', 'admin', 'admin', '2018-11-13 09:56:03', '2018-11-13 09:56:03'),
(30, 'MC-00030', 2, 2, 1, '', '', '2018-11-12 18:00:00', 34343434, '', 'receive', 'a', 'admin', 'admin', '2018-11-13 09:56:25', '2018-11-13 09:56:25'),
(31, 'MC-00031', 3, 5, 1, '', '', '2018-11-12 18:00:00', 4294967295, '', 'receive', 'a', 'admin', 'admin', '2018-11-13 09:56:58', '2018-11-13 09:56:58'),
(32, 'MC-00032', 2, 2, 3, '', '', '2018-11-12 18:00:00', 343, '44', 'receive', 'a', 'admin', 'admin', '2018-11-13 09:57:17', '2018-11-13 10:28:29');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` int(20) UNSIGNED NOT NULL,
  `comp_name` varchar(255) NOT NULL,
  `comp_phone` varchar(200) NOT NULL,
  `comp_email` varchar(150) NOT NULL,
  `comp_address` text,
  `comp_logo` text,
  `status` char(2) DEFAULT 'a',
  `created_by` varchar(150) DEFAULT NULL,
  `updated_by` varchar(150) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `comp_name`, `comp_phone`, `comp_email`, `comp_address`, `comp_logo`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Maven Auto Main', '01790117777', 'mavenautos@gmail.com', 'www.maven-autos.com', NULL, 'a', 'admin', 'admin', '2018-11-10 18:00:00', '2018-11-11 06:53:12'),
(2, 'Maven Auto Shop 1', '01790117777', 'mavenautos@gmail.com', 'www.maven-autos.com', NULL, 'a', 'admin', 'admin', '2018-11-10 18:00:00', '2018-11-11 06:53:20'),
(3, 'Maven Auto Shop 3', '01790117777', 'mavenautos@gmail.com', 'www.maven-autos.com', NULL, 'd', 'admin', 'admin', '2018-11-10 18:00:00', '2018-11-10 18:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `create_admin`
--

CREATE TABLE `create_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_username` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `admin_password` text,
  `admin_email` varchar(100) DEFAULT NULL,
  `admin_phone` varchar(20) DEFAULT NULL,
  `admin_address` text,
  `admin_image` varchar(255) DEFAULT NULL,
  `admin_type` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `create_admin`
--

INSERT INTO `create_admin` (`admin_id`, `admin_username`, `admin_password`, `admin_email`, `admin_phone`, `admin_address`, `admin_image`, `admin_type`) VALUES
(5, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'admin@gmail.com', '018888888888', 'mirpur 10', '20330798845bcefe5a930d9.jpg', 's'),
(12, 'maven Auto', 'e10adc3949ba59abbe56e057f20f883e', 'maven@gmail.com', '12345678910', 'maven auto', '0', 'd'),
(13, 'maven Auto admin', 'e10adc3949ba59abbe56e057f20f883e', 'maven@gmail.com', '12345678910', 'maven auto', '0', 'd'),
(14, 'maven_auto', '88108848af3780c04bd574875cfb2cf2', 'mavenautos@gmail.com', '01790117777', 'www.maven-autos.com', '17746909285be7d27242b04.jpg', 'a');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(20) UNSIGNED NOT NULL,
  `cus_code` varchar(100) NOT NULL,
  `cus_name` varchar(250) NOT NULL,
  `org_name` varchar(255) DEFAULT NULL,
  `cus_contact_no` varchar(150) DEFAULT NULL,
  `alt_contact_no` varchar(150) DEFAULT NULL,
  `cus_entry_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cus_email` varchar(150) DEFAULT NULL,
  `cus_address` text,
  `cus_fb` text,
  `cus_image` text,
  `cus_bus_card` text,
  `cus_status` char(5) NOT NULL DEFAULT 'a',
  `created_by` varchar(250) DEFAULT NULL,
  `updated_by` varchar(250) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `cus_code`, `cus_name`, `org_name`, `cus_contact_no`, `alt_contact_no`, `cus_entry_date`, `cus_email`, `cus_address`, `cus_fb`, `cus_image`, `cus_bus_card`, `cus_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'C00001', 'Arup Bose', 'Link up', '012365455', '00455458744', '2018-11-04 18:00:00', 'arup@gmail.com', 'mirpur 10', '', 'libs/upload_pic/cus_image/19979317705be7e7c734ac8.jpg', 'libs/upload_pic/cus_image/10826192595be7e7c74f8be.jpg', 'a', 'admin', 'admin', '2018-11-10 18:00:00', '2018-11-11 08:27:28'),
(2, 'C00002', 'Joy Bose', 'Link Up', '001215452254', '0241542545', '2018-11-09 18:00:00', 'joy@gmail.com', 'mirpur', '', 'libs/upload_pic/cus_image/13602111655be7ec79bf8d8.jpg', 'libs/upload_pic/cus_image/16271929815be7ec79c546b.jpg', 'a', 'admin', 'admin', '2018-11-10 18:00:00', '2018-11-10 18:00:00'),
(3, 'C00003', 'new Customer', 'new', '111111111111', '', '2018-11-11 18:00:00', '', 'okkk', '', NULL, NULL, 'a', 'admin', 'admin', '2018-11-11 18:00:00', '2018-11-11 18:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(20) UNSIGNED NOT NULL,
  `emp_name` varchar(250) NOT NULL,
  `emp_dob` varchar(200) DEFAULT NULL,
  `emp_nid` varchar(200) DEFAULT NULL,
  `emp_phone` varchar(100) DEFAULT NULL,
  `emp_email` varchar(100) DEFAULT NULL,
  `emp_join_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `pre_address` text,
  `par_address` text,
  `emp_sallary` int(20) DEFAULT NULL,
  `status` char(5) DEFAULT NULL,
  `created_by` varchar(150) DEFAULT NULL,
  `updated_by` varchar(150) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `emp_name`, `emp_dob`, `emp_nid`, `emp_phone`, `emp_email`, `emp_join_date`, `pre_address`, `par_address`, `emp_sallary`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Sohan', '1994-07-06', '12345678978785', '0123456789', 'sohan@gmail.com', '2018-11-10 18:00:00', 'shawrapara, mirpur 10', 'shawrapara, mirpur 10', 30000, 'a', 'admin', 'admin', '2018-11-10 18:00:00', '2018-11-11 07:10:41'),
(2, 'Otish SutroDhar', '2017-08-01', '15512544121', '1251154141', 'otish@gmail.com', '2017-06-30 18:00:00', 'Framgate', 'fani', 150000, 'a', 'admin', 'admin', '2018-11-10 18:00:00', '2018-11-10 18:00:00'),
(3, 'Arup Kumer bose', '1994-06-23', '12512511124654', '01731909035', 'arup@gmail.com', '2018-07-14 18:00:00', 'mirpur 11', 'sherpur', 7000, 'a', 'admin', 'admin', '2018-11-10 18:00:00', '2018-11-10 18:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `ie_heads`
--

CREATE TABLE `ie_heads` (
  `id` int(20) UNSIGNED NOT NULL,
  `head_title` varchar(250) NOT NULL,
  `head_type` varchar(1) NOT NULL,
  `status` char(5) DEFAULT 'a',
  `created_by` varchar(200) DEFAULT NULL,
  `updated_by` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ie_heads`
--

INSERT INTO `ie_heads` (`id`, `head_title`, `head_type`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Shipping Cost', 'C', 'a', 'admin', 'admin', '2018-11-10 18:00:00', '2018-11-10 18:00:00'),
(2, 'Maintains ', '', 'd', 'admin', 'admin', '2018-11-10 18:00:00', '2018-11-10 18:00:00'),
(3, 'Maintains', 'C', 'a', 'admin', 'admin', '2018-11-10 18:00:00', '2018-11-10 18:00:00'),
(4, 'Goduan Rent', '', 'd', 'admin', 'admin', '2018-11-10 18:00:00', '2018-11-10 18:00:00'),
(5, 'Goduan Rent', 'C', 'a', 'admin', 'admin', '2018-11-10 18:00:00', '2018-11-10 18:00:00'),
(6, 'Current Bill', 'O', 'a', 'admin', 'admin', '2018-11-10 18:00:00', '2018-11-10 18:00:00'),
(7, 'Tea bill', 'O', 'a', 'admin', 'admin', '2018-11-10 18:00:00', '2018-11-10 18:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `lc_details`
--

CREATE TABLE `lc_details` (
  `id` int(20) UNSIGNED NOT NULL,
  `lc_id` int(20) UNSIGNED DEFAULT '0',
  `pus_id` int(20) UNSIGNED NOT NULL,
  `cus_id` int(20) UNSIGNED DEFAULT '0',
  `order_id` int(20) UNSIGNED DEFAULT '0',
  `car_value` int(10) UNSIGNED NOT NULL,
  `fright_value` int(10) UNSIGNED NOT NULL,
  `total` int(15) UNSIGNED NOT NULL,
  `status` char(5) DEFAULT 'a'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lc_details`
--

INSERT INTO `lc_details` (`id`, `lc_id`, `pus_id`, `cus_id`, `order_id`, `car_value`, `fright_value`, `total`, `status`) VALUES
(1, 1, 1, 1, 1, 40000, 10000, 50000, 'a'),
(2, 2, 4, 0, 0, 20000, 10000, 30000, 'd'),
(3, 2, 3, 0, 0, 25000, 5000, 30000, 'a'),
(4, 2, 2, 2, 2, 20000, 10000, 30000, 'a');

-- --------------------------------------------------------

--
-- Table structure for table `months`
--

CREATE TABLE `months` (
  `id` int(3) UNSIGNED NOT NULL,
  `month_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `months`
--

INSERT INTO `months` (`id`, `month_name`) VALUES
(1, 'January'),
(2, 'February'),
(3, 'March'),
(4, 'April'),
(5, 'May'),
(6, 'June'),
(7, 'July'),
(8, 'August'),
(9, 'September'),
(10, 'October'),
(11, 'November'),
(12, 'December');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(20) UNSIGNED NOT NULL,
  `cus_id` int(20) UNSIGNED NOT NULL COMMENT 'customer Tabel primary id',
  `ord_lc_no` int(20) DEFAULT NULL COMMENT 'lc table primary key',
  `pus_id` int(20) UNSIGNED DEFAULT NULL,
  `ord_car_model` varchar(200) DEFAULT NULL,
  `ord_color` varchar(200) DEFAULT NULL,
  `ord_engine_no` varchar(200) DEFAULT NULL,
  `ord_chassis_no` varchar(200) DEFAULT NULL,
  `order_no` varchar(200) DEFAULT NULL,
  `ord_other_tirm` text,
  `ord_make_model` varchar(200) DEFAULT NULL,
  `ord_grade` varchar(200) DEFAULT NULL,
  `ord_type` varchar(200) DEFAULT NULL,
  `ord_year` varchar(200) DEFAULT NULL,
  `ord_mileage` varchar(200) DEFAULT NULL,
  `ord_budget_range` int(20) DEFAULT NULL,
  `ord_advance` int(10) DEFAULT NULL,
  `order_status` char(10) DEFAULT NULL COMMENT 'a= Active, p=Pending , c= Delivery',
  `delivery_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` char(5) DEFAULT NULL,
  `created_by` varchar(250) DEFAULT NULL,
  `updated_by` varchar(250) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `cus_id`, `ord_lc_no`, `pus_id`, `ord_car_model`, `ord_color`, `ord_engine_no`, `ord_chassis_no`, `order_no`, `ord_other_tirm`, `ord_make_model`, `ord_grade`, `ord_type`, `ord_year`, `ord_mileage`, `ord_budget_range`, `ord_advance`, `order_status`, `delivery_date`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 'Corola', 'black', '123456789', '123456789', 'M-00001', 'na', 'make', 'A', 'A', '2010', '100000', 5684211, 50000, 'a', '2018-11-11 08:29:08', 'a', 'admin', 'admin', '2018-11-10 18:00:00', '2018-11-11 08:29:54'),
(2, 2, 2, 2, 'Honda-0001', 'Gray', '5060708090', '5060708090', 'M-00002', 'na', 'okk', 'B', 'B', '2011', '100000', 800000, 100000, 'a', '2018-11-11 08:46:49', 'a', 'admin', 'admin', '2018-11-10 18:00:00', '2018-11-11 08:53:00'),
(3, 1, 0, 4, 'model', 'color', '306090704010', '104070306090', 'M-00003', 'na', 'okk', 'A', 'A', '2040', '20444000', 5000000, 600000, 'a', '2018-11-11 09:09:15', 'a', 'admin', 'admin', '2018-11-10 18:00:00', '2018-11-10 18:00:00'),
(4, 3, 0, 3, 'demo', 'blue', '8090704050', '8090706050', 'M-00004', 'na', 'ok', 'A', 'A', '2100', '200000', 0, 50000, 'a', '2018-11-12 10:50:26', 'a', 'admin', 'admin', '2018-11-11 18:00:00', '2018-11-11 18:00:00'),
(5, 3, 0, 6, 'okkkk', 'jkdjfkjdsf', '55555555555', '666666666666', 'M-00005', 'sdfhsk', 'jkdjf', 'jsdkjk', 'dkfjsdk', 'jdkfjdkf', '54010000', 0, 50000, 'a', '2018-11-12 11:16:15', 'a', 'admin', 'admin', '2018-11-11 18:00:00', '2018-11-11 18:00:00'),
(6, 2, 0, 0, 'dfgdfg', 'dfgdfg', '', '', 'M-00006', 'sdgdfg', 'dfgdfg', '', 'dsf', 'gdfg', 'dsfgdsfg', 0, 3434344, 'p', '2018-11-12 11:23:55', 'a', 'admin', 'admin', '2018-11-11 18:00:00', '2018-11-11 18:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(20) UNSIGNED NOT NULL,
  `payment_code` varchar(100) NOT NULL,
  `payment_type` char(5) NOT NULL,
  `supplier_id` int(20) DEFAULT NULL,
  `order_id` int(20) DEFAULT NULL,
  `lc_id` int(20) DEFAULT NULL,
  `head_id` int(20) DEFAULT NULL,
  `payment_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `payment_amount` int(10) NOT NULL,
  `note` varchar(200) DEFAULT NULL,
  `status` char(5) DEFAULT NULL,
  `created_by` varchar(150) DEFAULT NULL,
  `updated_by` varchar(150) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `payment_code`, `payment_type`, `supplier_id`, `order_id`, `lc_id`, `head_id`, `payment_date`, `payment_amount`, `note`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'CP-00001', 'CP', 2, 2, 2, 3, '2018-11-10 18:00:00', 50000, '', 'a', 'admin', 'admin', '2018-11-11 11:00:13', '2018-11-11 11:00:13'),
(2, 'OP-00001', 'OP', NULL, NULL, NULL, 7, '2018-11-10 18:00:00', 500, '', 'a', 'admin', 'admin', '2018-11-11 11:00:58', '2018-11-11 11:00:58'),
(3, 'OP-00002', 'OP', NULL, NULL, NULL, 6, '2018-11-11 18:00:00', 2000, 'arup', 'a', 'admin', 'admin', '2018-11-12 04:09:51', '2018-11-12 04:09:51');

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `id` int(20) UNSIGNED NOT NULL,
  `pus_sl` varchar(100) NOT NULL,
  `supplier_id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(20) UNSIGNED DEFAULT NULL,
  `order_id` int(20) UNSIGNED DEFAULT NULL,
  `puc_lc_id` int(20) UNSIGNED NOT NULL DEFAULT '0',
  `puc_car_model` varchar(200) DEFAULT NULL,
  `puc_color` varchar(200) DEFAULT NULL,
  `puc_engine_no` varchar(200) DEFAULT NULL,
  `puc_chassis_no` varchar(200) DEFAULT NULL,
  `puc_make` varchar(200) DEFAULT NULL,
  `puc_grade` varchar(200) DEFAULT NULL,
  `puc_type` varchar(200) DEFAULT NULL,
  `puc_year` varchar(200) DEFAULT NULL,
  `puc_mileage` varchar(200) DEFAULT NULL,
  `puc_other_tirm` text,
  `total_price` int(10) UNSIGNED DEFAULT '0',
  `transport_id` int(20) UNSIGNED DEFAULT NULL COMMENT 'transport table last id',
  `car_status` smallint(6) UNSIGNED DEFAULT NULL COMMENT '1= Deliver 0= Undelivered',
  `status` char(5) DEFAULT NULL,
  `created_by` varchar(150) DEFAULT NULL,
  `updated_by` varchar(150) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`id`, `pus_sl`, `supplier_id`, `customer_id`, `order_id`, `puc_lc_id`, `puc_car_model`, `puc_color`, `puc_engine_no`, `puc_chassis_no`, `puc_make`, `puc_grade`, `puc_type`, `puc_year`, `puc_mileage`, `puc_other_tirm`, `total_price`, `transport_id`, `car_status`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'P-00001', 2, 1, 1, 1, 'Corola', 'balck', '123456789', '123456789', 'make', 'A', 'A', '2010', '100000', 'na', 12844858, 1, 0, 'a', 'admin', 'admin', '2018-11-10 18:00:00', '2018-11-11 08:23:02'),
(2, 'P-00002', 1, 2, 2, 2, 'Honda-0001', 'Gray', '5060708090', '5060708090', 'okk', 'B', 'B', '2011', '100000', 'na', 324657, NULL, 0, 'a', 'admin', 'admin', '2018-11-10 18:00:00', '2018-11-10 18:00:00'),
(3, 'P-00003', 1, 3, 4, 2, 'demo', 'blue', '8090704050', '8090706050', 'ok', 'A', 'A', '2100', '200000', 'na', 41994, NULL, 0, 'a', 'admin', 'admin', '2018-11-10 18:00:00', '2018-11-10 18:00:00'),
(4, 'P-00004', 2, 1, 3, 0, 'model', 'color', '306090704010', '104070306090', 'okk', 'A', 'A', '2040', '20444000', 'na', 12262, NULL, 0, 'a', 'admin', 'admin', '2018-11-10 18:00:00', '2018-11-10 18:00:00'),
(5, 'P-00005', 2, 0, 0, 0, 'ffgdfs', '', '', '', 'fdg', 'fg', 'fdgdf', '', '', '', 0, NULL, 0, 'a', 'admin', 'admin', '2018-11-11 18:00:00', '2018-11-12 09:44:58'),
(6, 'P-00006', 1, 3, 5, 0, 'okkkk', 'jkdjfkjdsf', '55555555555', '666666666666', 'jkdjf', 'jsdkjk', 'dkfjsdk', 'jdkfjdkf', '54010000', 'sdfhsk', 0, NULL, 0, 'a', 'admin', 'admin', '2018-11-11 18:00:00', '2018-11-11 18:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_pricing`
--

CREATE TABLE `purchase_pricing` (
  `id` int(30) UNSIGNED NOT NULL,
  `pus_id` int(20) UNSIGNED NOT NULL,
  `lc_value` int(10) UNSIGNED DEFAULT NULL,
  `obc_value` int(10) UNSIGNED DEFAULT NULL,
  `insurance_charge` int(10) UNSIGNED DEFAULT NULL,
  `final_dosis` int(10) UNSIGNED DEFAULT NULL,
  `custom_value` int(10) UNSIGNED DEFAULT NULL,
  `cf_agent` int(10) UNSIGNED DEFAULT NULL,
  `cuharf_value` int(10) UNSIGNED DEFAULT NULL,
  `s_charge` int(10) UNSIGNED DEFAULT NULL,
  `regi_charge` int(10) UNSIGNED DEFAULT NULL,
  `first_party_insu` int(10) UNSIGNED DEFAULT NULL,
  `third_party_insu` int(10) UNSIGNED DEFAULT NULL,
  `workshop_bill` int(10) UNSIGNED DEFAULT NULL,
  `decuration_bill` int(10) UNSIGNED DEFAULT NULL,
  `other_exp` int(10) UNSIGNED DEFAULT NULL,
  `status` char(5) DEFAULT 'a',
  `created_by` varchar(100) DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `purchase_pricing`
--

INSERT INTO `purchase_pricing` (`id`, `pus_id`, `lc_value`, `obc_value`, `insurance_charge`, `final_dosis`, `custom_value`, `cf_agent`, `cuharf_value`, `s_charge`, `regi_charge`, `first_party_insu`, `third_party_insu`, `workshop_bill`, `decuration_bill`, `other_exp`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 1000, 500, 50, 5, 80, 5, 900, 10000, 6400, 8975645, 65845, 20000, 65874, 3698554, 'a', 'admin', 'admin', '2018-11-11 08:24:53', '2018-11-11 08:25:24'),
(2, 2, 50000, 60000, 80, 0, 0, 56987, 5000, 90000, 50, 12540, 0, 0, 50000, 0, 'a', 'admin', 'admin', '2018-11-11 08:53:55', '2018-11-11 08:53:55'),
(3, 4, 333, 34, 4343, 343, 0, 0, 0, 0, 3434, 3432, 343, 0, 0, 0, 'a', 'admin', 'admin', '2018-11-12 10:14:25', '2018-11-12 10:14:25'),
(4, 3, 333, 333, 333, 3333, 0, 0, 0, 333, 333, 3333, 333, 0, 33330, 0, 'a', 'admin', 'admin', '2018-11-12 10:20:39', '2018-11-12 10:20:39');

-- --------------------------------------------------------

--
-- Table structure for table `salaries`
--

CREATE TABLE `salaries` (
  `id` int(20) UNSIGNED NOT NULL,
  `emp_id` int(20) NOT NULL,
  `month_id` int(20) NOT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `payment_amount` int(10) NOT NULL,
  `due_amount` int(10) DEFAULT NULL,
  `status` char(5) DEFAULT NULL,
  `created_by` varchar(200) DEFAULT NULL,
  `updated_by` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `salaries`
--

INSERT INTO `salaries` (`id`, `emp_id`, `month_id`, `date`, `payment_amount`, `due_amount`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2018-11-06 18:00:00', 10000, 20000, 'a', 'admin', 'admin', '2018-11-10 18:00:00', '2018-11-10 18:00:00'),
(2, 2, 1, '2018-11-07 18:00:00', 10000, 5000, 'a', 'admin', 'admin', '2018-11-10 18:00:00', '2018-11-10 18:00:00'),
(3, 3, 1, '2018-11-10 18:00:00', 6000, 1000, 'a', 'admin', 'admin', '2018-11-10 18:00:00', '2018-11-11 07:15:58');

-- --------------------------------------------------------

--
-- Table structure for table `sallay_months`
--

CREATE TABLE `sallay_months` (
  `id` int(20) UNSIGNED NOT NULL,
  `year` int(5) NOT NULL,
  `month_id` int(3) NOT NULL,
  `note` text,
  `status` char(5) DEFAULT NULL,
  `created_by` varchar(150) DEFAULT NULL,
  `updated_by` varchar(150) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sallay_months`
--

INSERT INTO `sallay_months` (`id`, `year`, `month_id`, `note`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 2018, 10, '', 'a', 'admin', 'admin', '2018-11-10 18:00:00', '2018-11-10 18:00:00'),
(2, 2018, 11, '', 'a', 'admin', 'admin', '2018-11-10 18:00:00', '2018-11-10 18:00:00'),
(3, 2018, 6, 'june sallary', 'a', 'admin', 'admin', '2018-11-10 18:00:00', '2018-11-11 06:57:22');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(20) UNSIGNED NOT NULL,
  `field_name` varchar(200) DEFAULT NULL,
  `value` text,
  `created_by` varchar(200) DEFAULT NULL,
  `updated_by` varchar(200) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `field_name`, `value`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'logo', 'libs/upload_pic/comp_image/3429869725be7cd18ad1fa.jpg', 'admin', 'admin', '2018-11-11 06:32:56', '2018-11-11 06:32:56'),
(2, 'cmp_name', 'Maven Autos', 'admin', 'admin', '2018-11-11 06:32:56', '2018-11-11 06:32:56'),
(3, 'cmp_adds', 'Hosaf Convention Center, Malibag Mor\r\nDhaka, Bangladesh', 'admin', 'admin', '2018-11-11 06:32:56', '2018-11-11 06:32:56'),
(4, 'cmp_phn', '01790-117777', 'admin', 'admin', '2018-11-11 06:32:56', '2018-11-11 06:32:56'),
(5, 'cmp_eml', 'www.maven-autos.com', 'admin', 'admin', '2018-11-11 06:32:57', '2018-11-11 06:32:57');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(20) UNSIGNED NOT NULL,
  `sup_code` varchar(100) NOT NULL,
  `sup_name` varchar(255) NOT NULL,
  `sup_phone` varchar(255) DEFAULT NULL,
  `sup_email` varchar(150) DEFAULT NULL,
  `sup_ent_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sup_ref` varchar(150) DEFAULT NULL,
  `sup_address` text,
  `status` char(5) DEFAULT 'a',
  `created_by` varchar(200) DEFAULT NULL,
  `updated_by` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `sup_code`, `sup_name`, `sup_phone`, `sup_email`, `sup_ent_date`, `sup_ref`, `sup_address`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'S00001', 'Japan International', '3300454751', 'japan@gmail.com', '2018-01-02 18:00:00', 'Momen', 'Japan', 'a', 'admin', 'admin', '2018-11-10 18:00:00', '2018-11-10 18:00:00'),
(2, 'S00002', 'Car International Ltd.', '5274145721412', 'carltd@gmail.com', '2017-03-01 18:00:00', '', 'japan', 'a', 'admin', 'admin', '2018-11-10 18:00:00', '2018-11-10 18:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lcs`
--

CREATE TABLE `tbl_lcs` (
  `id` int(20) UNSIGNED NOT NULL,
  `lc_no` varchar(255) NOT NULL,
  `lc_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lc_amount` int(10) UNSIGNED NOT NULL,
  `car_qty` int(5) UNSIGNED NOT NULL DEFAULT '1',
  `bank_name` varchar(255) NOT NULL,
  `branch_name` varchar(200) DEFAULT NULL,
  `lc_insur` varchar(200) DEFAULT NULL,
  `comp_id` int(20) UNSIGNED NOT NULL,
  `supplier_id` int(20) UNSIGNED NOT NULL,
  `agent_id` int(10) UNSIGNED DEFAULT NULL,
  `ship_name` varchar(200) DEFAULT NULL,
  `arriv_date` timestamp NULL DEFAULT NULL,
  `port_name` varchar(200) DEFAULT NULL,
  `note` text,
  `status` char(5) DEFAULT 'a',
  `created_by` varchar(200) DEFAULT NULL,
  `updated_by` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_lcs`
--

INSERT INTO `tbl_lcs` (`id`, `lc_no`, `lc_date`, `lc_amount`, `car_qty`, `bank_name`, `branch_name`, `lc_insur`, `comp_id`, `supplier_id`, `agent_id`, `ship_name`, `arriv_date`, `port_name`, `note`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, '1020304050', '2018-11-10 18:00:00', 50000, 1, 'DBBL', 'Mirpur 10', '', 1, 2, 1, '', '2018-11-10 18:00:00', '', '', 'a', 'admin', 'admin', '2018-11-10 18:00:00', '2018-11-10 18:00:00'),
(2, 'LC-10211000', '2018-11-10 18:00:00', 60000, 2, 'EBL', 'Mirpur 10', '', 1, 2, 1, '', '2018-11-10 18:00:00', '', '', 'a', 'admin', 'admin', '2018-11-10 18:00:00', '2018-11-11 09:07:41');

-- --------------------------------------------------------

--
-- Table structure for table `transports`
--

CREATE TABLE `transports` (
  `id` int(20) UNSIGNED NOT NULL,
  `purchase_id` int(20) UNSIGNED NOT NULL,
  `trans_head_id` int(10) UNSIGNED NOT NULL,
  `trans_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(200) DEFAULT NULL,
  `updated_by` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transports`
--

INSERT INTO `transports` (`id`, `purchase_id`, `trans_head_id`, `trans_date`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '2018-11-10 18:00:00', 'admin', 'admin', '2018-11-10 18:00:00', '2018-11-11 08:25:51');

-- --------------------------------------------------------

--
-- Table structure for table `trans_heads`
--

CREATE TABLE `trans_heads` (
  `id` int(10) UNSIGNED NOT NULL,
  `head_name` varchar(200) DEFAULT NULL,
  `status` char(5) DEFAULT 'a'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `trans_heads`
--

INSERT INTO `trans_heads` (`id`, `head_name`, `status`) VALUES
(1, 'Japan', 'a'),
(2, 'Japan Port', 'a'),
(3, 'In Ship', 'a'),
(4, 'Chitagong Port', 'a'),
(5, 'Mongla Port', 'a'),
(6, 'Dhaka', 'a');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_access`
--
ALTER TABLE `admin_access`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `agents`
--
ALTER TABLE `agents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank_trans`
--
ALTER TABLE `bank_trans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `car_images`
--
ALTER TABLE `car_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `checks`
--
ALTER TABLE `checks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `collections`
--
ALTER TABLE `collections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `create_admin`
--
ALTER TABLE `create_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ie_heads`
--
ALTER TABLE `ie_heads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lc_details`
--
ALTER TABLE `lc_details`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `months`
--
ALTER TABLE `months`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_pricing`
--
ALTER TABLE `purchase_pricing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salaries`
--
ALTER TABLE `salaries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sallay_months`
--
ALTER TABLE `sallay_months`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_lcs`
--
ALTER TABLE `tbl_lcs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transports`
--
ALTER TABLE `transports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trans_heads`
--
ALTER TABLE `trans_heads`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_access`
--
ALTER TABLE `admin_access`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `agents`
--
ALTER TABLE `agents`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` smallint(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bank_trans`
--
ALTER TABLE `bank_trans`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `car_images`
--
ALTER TABLE `car_images`
  MODIFY `id` int(30) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `checks`
--
ALTER TABLE `checks`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `collections`
--
ALTER TABLE `collections`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `create_admin`
--
ALTER TABLE `create_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ie_heads`
--
ALTER TABLE `ie_heads`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `lc_details`
--
ALTER TABLE `lc_details`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `months`
--
ALTER TABLE `months`
  MODIFY `id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `purchase_pricing`
--
ALTER TABLE `purchase_pricing`
  MODIFY `id` int(30) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `salaries`
--
ALTER TABLE `salaries`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sallay_months`
--
ALTER TABLE `sallay_months`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_lcs`
--
ALTER TABLE `tbl_lcs`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transports`
--
ALTER TABLE `transports`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `trans_heads`
--
ALTER TABLE `trans_heads`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
