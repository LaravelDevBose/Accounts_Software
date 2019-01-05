-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2019 at 12:07 PM
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

-- --------------------------------------------------------

--
-- Table structure for table `account_heads`
--

CREATE TABLE `account_heads` (
  `ah_id` int(20) UNSIGNED NOT NULL,
  `ah_name` varchar(200) NOT NULL,
  `ah_code` varchar(100) NOT NULL,
  `ah_status` char(10) DEFAULT 'A',
  `created_by` varchar(100) DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `account_heads`
--

INSERT INTO `account_heads` (`ah_id`, `ah_name`, `ah_code`, `ah_status`, `created_by`, `updated_by`, `created_at`) VALUES
(1, 'bank', 'AH-00001', 'A', 'admin', NULL, '2018-12-26 06:40:12');

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
(3, 'A00003', 'Marto Fande', '336548744', 'fande@gmail.com', 'China ok', 'a', 'admin', 'admin', '2018-11-10 18:00:00', '2019-01-02 04:35:34');

-- --------------------------------------------------------

--
-- Table structure for table `agent_bill_payments`
--

CREATE TABLE `agent_bill_payments` (
  `bill_id` int(20) UNSIGNED NOT NULL,
  `agent_id` int(20) NOT NULL,
  `entry_code` varchar(100) NOT NULL,
  `bp_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `bill_no` varchar(100) DEFAULT NULL,
  `particulars` varchar(250) NOT NULL,
  `remarks` varchar(250) DEFAULT NULL,
  `bill_amount` int(10) UNSIGNED DEFAULT NULL,
  `paid_amount` int(10) UNSIGNED DEFAULT NULL,
  `entry_type` char(10) DEFAULT NULL COMMENT 'Bill , Pay',
  `bp_status` char(10) DEFAULT 'A',
  `created_by` varchar(100) DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `agent_bill_payments`
--

INSERT INTO `agent_bill_payments` (`bill_id`, `agent_id`, `entry_code`, `bp_date`, `bill_no`, `particulars`, `remarks`, `bill_amount`, `paid_amount`, `entry_type`, `bp_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 3, 'AB00001', '2019-01-01 18:00:00', '5487', 'dsfdf', 'fdsf', 300, NULL, 'Bill', 'A', 'admin', 'admin', '2019-01-02 11:23:12', '2019-01-02 11:24:05'),
(2, 3, 'AP00001', '2019-01-01 18:00:00', NULL, 'full', 'dfdf', NULL, 200, 'Pay', 'D', 'admin', 'admin', '2019-01-02 11:23:31', '2019-01-02 11:24:42');

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
(2, 'Standard Chartered', 'Mirpur 11', '25879123', '2017-07-05 18:00:00', 80100000, 'a', 'admin', 'admin', '2018-11-11 06:44:12', '2018-11-11 06:44:12'),
(3, 'EBL', 'Mirpur 10', '456951357', '2018-01-31 18:00:00', -657000, 'a', 'admin', 'admin', '2018-11-11 06:44:45', '2018-11-11 06:44:45'),
(4, 'NCC', 'Mirpur 10', '123456789', '2018-11-14 18:00:00', 50000, 'a', 'admin', 'admin', '2018-11-15 08:58:58', '2018-11-15 08:58:58');

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
  `type` char(5) DEFAULT 'I',
  `status` char(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `car_images`
--

INSERT INTO `car_images` (`id`, `pus_id`, `image_path`, `type`, `status`) VALUES
(1, 2, 'libs/upload_pic/car_image/425837355c039e3ff0b3d.jpg', 'C', 'a'),
(2, 1, 'libs/upload_pic/car_image/9647682825c039e5a2329c.jpg', 'C', 'a'),
(3, 3, 'libs/upload_pic/car_image/8205113945c03a08fb3654.jpg', 'C', 'a'),
(4, 1, 'libs/upload_pic/car_image/20769350975c03c8c35c55d.jpg', 'I', 'a'),
(5, 1, 'libs/upload_pic/car_image/4628539415c03c8d28fd5d.jpg', 'D', 'a'),
(6, 2, 'libs/upload_pic/car_image/5023605685c04cccae0fbe.jpg', 'C', 'a'),
(7, 2, 'libs/upload_pic/car_image/10260315265c08cbd144f02.jpg', 'I', 'a'),
(8, 2, 'libs/upload_pic/car_image/16933623455c08cbd17a50b.jpg', 'I', 'a'),
(9, 2, 'libs/upload_pic/car_image/9003431535c08cbd1ba32d.jpg', 'I', 'a'),
(10, 5, 'libs/upload_pic/car_image/12588052685c08d2488dd06.jpg', 'C', 'a'),
(12, 11, 'libs/upload_pic/car_image/7652020185c0deb0ca5eb2.jpg', 'C', 'a'),
(13, 14, 'libs/upload_pic/car_image/10956310645c0e1058f206a.jpg', 'I', 'a'),
(14, 14, 'libs/upload_pic/car_image/17865849065c0e10592a830.jpg', 'I', 'a'),
(15, 14, 'libs/upload_pic/car_image/17246424735c0e1059405e6.png', 'I', 'a'),
(16, 14, 'libs/upload_pic/car_image/11579733675c0e10597147f.jpg', 'D', 'a'),
(17, 14, 'libs/upload_pic/car_image/19408460255c0e1059b867f.jpg', 'D', 'a'),
(18, 15, 'libs/upload_pic/car_image/18867915115c0e106f90492.jpg', 'I', 'a'),
(19, 15, 'libs/upload_pic/car_image/9929007115c0e106fbed56.jpg', 'I', 'a'),
(20, 15, 'libs/upload_pic/car_image/11045652905c0e106fcf3c3.png', 'I', 'a'),
(21, 15, 'libs/upload_pic/car_image/171777445c0e106ff1458.jpg', 'D', 'a'),
(22, 15, 'libs/upload_pic/car_image/3341785285c0e107046f5f.jpg', 'D', 'a');

-- --------------------------------------------------------

--
-- Table structure for table `car_registration`
--

CREATE TABLE `car_registration` (
  `id` int(20) UNSIGNED NOT NULL,
  `pus_id` int(20) UNSIGNED NOT NULL,
  `reg_no` varchar(250) NOT NULL,
  `owner_name` varchar(250) DEFAULT NULL,
  `reg_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `reg_area` varchar(250) DEFAULT NULL,
  `status` char(5) DEFAULT 'a',
  `created_by` varchar(250) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` varchar(250) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `car_registration`
--

INSERT INTO `car_registration` (`id`, `pus_id`, `reg_no`, `owner_name`, `reg_date`, `reg_area`, `status`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 2, 'Ka-1005', 'Arup', '2018-12-03 18:00:00', 'Dhaka', 'a', 'admin', '2018-12-05 18:00:00', 'admin', '2018-12-06 07:37:46'),
(2, 5, 'G-54845', 'No name', '2018-11-28 18:00:00', 'Dhaka', 'a', 'admin', '2018-12-06 07:40:37', 'admin', '2018-12-06 07:41:05');

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
  `collection_type` tinyint(4) NOT NULL COMMENT '1=Advance, 2=Part, 3=Full Payment, 4=Cheque',
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
(9, 'MC-00009', 2, 1, 2, '', '', '2018-12-01 18:00:00', 1000, '', 'receive', 'a', 'admin', 'admin', '2018-12-02 05:47:07', '2018-12-02 05:47:07'),
(10, 'MC-00010', 2, 1, 4, '54545', 'dfdf', '2018-12-01 18:00:00', 33333, 'fffff', 'receive', 'a', 'admin', 'admin', '2018-12-02 05:48:30', '2018-12-02 05:48:30'),
(11, 'MC-00011', 2, 1, 2, '', '', '2018-12-01 18:00:00', 30000, 'cash', 'receive', 'a', 'admin', 'admin', '2018-12-02 05:50:02', '2018-12-02 11:58:58'),
(12, 'MC-00012', 2, 1, 4, 'eeee3433', 'ereer', '2018-12-02 18:00:00', 5000, '', 'receive', 'a', 'admin', 'admin', '2018-12-03 06:46:46', '2018-12-03 06:46:46'),
(13, 'MC-00013', 10, 13, 1, '', '', '2018-12-09 18:00:00', 50000, '', 'receive', 'a', 'admin', 'admin', '2018-12-10 06:08:58', '2018-12-10 06:08:58');

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
(2, 'C00002', 'Joy Kumer Bose', 'Link Up ltd.', '001215452254', '0241542545', '2018-11-09 18:00:00', 'joy@gmail.com', 'mirpur', '', 'libs/upload_pic/cus_image/13602111655be7ec79bf8d8.jpg', 'libs/upload_pic/cus_image/16271929815be7ec79c546b.jpg', 'a', 'admin', 'admin', '2018-11-10 18:00:00', '2018-12-02 10:37:12'),
(3, 'C00003', 'new Customer', 'new', '111111111111', '', '2018-11-11 18:00:00', '', 'okkk', '', NULL, NULL, 'a', 'admin', 'admin', '2018-11-11 18:00:00', '2018-11-11 18:00:00'),
(4, 'C00004', 'arup Kumer Bose', 'Link Up LTD.', '123456', '321654', '2018-12-01 18:00:00', 'arup@gmail.com', 'okk', 'http://localhost/Accounts_Software/customer/order/insert', 'libs/upload_pic/cus_image/131450525c03747160312.jpg', 'libs/upload_pic/cus_image/13764305335c03747160949.jpg', 'a', 'admin', 'admin', '2018-12-01 18:00:00', '2018-12-02 10:05:27'),
(5, 'C00005', 'aaa', 'aa', '33434', '34343', '2018-12-01 18:00:00', 'dfd@dfdf.ggg', 'sdfsdf', '', NULL, NULL, 'a', 'admin', 'admin', '2018-12-01 18:00:00', '2018-12-01 18:00:00'),
(6, 'C00006', 'dfsdf', 'sdfdsf', '3434', '3434', '2018-12-01 18:00:00', 'sdsd@dfdf.fgf', 'dfdsfdf', '', NULL, NULL, 'a', 'admin', 'admin', '2018-12-01 18:00:00', '2018-12-01 18:00:00'),
(7, 'C00007', 'demo', 'dddd', '11111', '11111', '2018-12-01 18:00:00', 'afhd@hjaf.coj', 'dfdfdf', '', NULL, NULL, 'a', 'admin', 'admin', '2018-12-01 18:00:00', '2018-12-01 18:00:00'),
(8, 'C00008', 'ne Customer 3', 'dfsdf', '3434343', '343434', '2018-12-01 18:00:00', '', 'sdfsdfdsf', '', NULL, NULL, 'a', 'admin', 'admin', '2018-12-01 18:00:00', '2018-12-01 18:00:00'),
(9, 'C00009', 'Arup New', 'dsfsdf', '334', '3434', '2018-12-02 18:00:00', '', 'dfdfss', '', NULL, NULL, 'a', 'admin', 'admin', '2018-12-02 18:00:00', '2018-12-02 18:00:00'),
(10, 'C00010', 'siam', 'Link Up', '000000', '111235454', '2018-12-09 18:00:00', 'siam@gmail.com', 'mirpur', '', NULL, NULL, 'a', 'admin', 'admin', '2018-12-09 18:00:00', '2018-12-09 18:00:00');

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
(2, 'Otish SutroDhar', '2017-08-01', '15512544121', '1251154141', 'otish@gmail.com', '2017-06-30 18:00:00', 'Framgate', 'fani', 15000, 'a', 'admin', 'admin', '2018-11-10 18:00:00', '2018-11-15 11:52:23'),
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
-- Table structure for table `insurance_bills`
--

CREATE TABLE `insurance_bills` (
  `in_bill_id` int(20) UNSIGNED NOT NULL,
  `in_bill_code` varchar(100) DEFAULT NULL,
  `in_bill_type` char(10) DEFAULT NULL COMMENT 'Bill,Pay',
  `in_bill_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `in_comp_id` int(20) UNSIGNED NOT NULL,
  `mc_crt_no` varchar(200) DEFAULT NULL,
  `cus_id` int(20) UNSIGNED DEFAULT NULL,
  `lc_id` int(20) UNSIGNED DEFAULT NULL,
  `order_id` int(20) UNSIGNED DEFAULT NULL,
  `gross_premium` int(10) UNSIGNED DEFAULT NULL,
  `net_premium` int(10) UNSIGNED DEFAULT NULL,
  `in_bill_vat` int(10) UNSIGNED DEFAULT NULL COMMENT '15%',
  `in_bill_30` int(10) UNSIGNED DEFAULT NULL COMMENT '30%',
  `in_bill_70` int(10) UNSIGNED DEFAULT NULL COMMENT '70%',
  `stamp` int(10) UNSIGNED DEFAULT NULL,
  `bill_amount` int(10) UNSIGNED DEFAULT NULL,
  `payment_amount` int(10) UNSIGNED DEFAULT NULL,
  `remarks` varchar(250) DEFAULT NULL,
  `in_bill_status` char(10) DEFAULT 'A',
  `created_by` varchar(150) DEFAULT NULL,
  `updated_by` varchar(150) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `insurance_bills`
--

INSERT INTO `insurance_bills` (`in_bill_id`, `in_bill_code`, `in_bill_type`, `in_bill_date`, `in_comp_id`, `mc_crt_no`, `cus_id`, `lc_id`, `order_id`, `gross_premium`, `net_premium`, `in_bill_vat`, `in_bill_30`, `in_bill_70`, `stamp`, `bill_amount`, `payment_amount`, `remarks`, `in_bill_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'IB00001', 'Bill', '2019-01-04 18:00:00', 2, NULL, 10, 0, 13, 829442, 721254, 108188, 216376, 504878, 500, 325064, NULL, '', 'D', 'admin', 'admin', '2019-01-05 08:30:45', '2019-01-05 10:05:24'),
(2, 'IB00002', 'Bill', '2019-01-04 18:00:00', 2, NULL, 8, 0, 9, 57500, 50000, 7500, 15000, 35000, 0, 22500, NULL, '', 'A', 'admin', NULL, '2019-01-05 08:33:32', NULL),
(3, 'IB00003', 'Bill', '2019-01-04 18:00:00', 2, 'dsafsdfsdf', 5, 0, 6, 82953, 72133, 10820, 21640, 50493, 0, 32460, NULL, '', 'A', 'admin', NULL, '2019-01-05 08:35:58', NULL),
(4, 'IB00004', 'Bill', '2019-01-04 18:00:00', 2, 'crt-0145', 4, 1, 2, 52529, 45677, 6852, 13703, 31974, 50, 20605, NULL, '', 'A', 'admin', NULL, '2019-01-05 08:37:44', NULL),
(5, 'IB00005', 'Bill', '2019-01-04 18:00:00', 2, 'fgfg', 2, 0, 1, 57500, 50000, 7500, 15000, 35000, 0, 22500, NULL, '', 'A', 'admin', NULL, '2019-01-05 08:49:33', NULL),
(6, 'IB00006', 'Bill', '2019-01-04 18:00:00', 2, 'hghdf', 1, 0, 4, 57500, 50000, 7500, 15000, 35000, 500, 23000, NULL, 'update', 'A', 'admin', 'admin', '2019-01-05 08:50:44', '2019-01-05 10:04:11'),
(7, 'IP00001', 'Pay', '2019-01-05 09:05:21', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 10000, '', 'D', 'admin', 'admin', '2019-01-05 09:05:21', '2019-01-05 10:05:02'),
(8, 'IP00002', 'Pay', '2019-01-05 09:08:48', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 500000, '', 'A', 'admin', NULL, '2019-01-05 09:08:48', NULL),
(9, 'IP00003', 'Pay', '2019-01-05 09:10:00', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 8129, '', 'A', 'admin', NULL, '2019-01-05 09:10:00', NULL),
(10, 'IP00004', 'Pay', '2019-01-05 09:10:45', 2, NULL, NULL, NULL, NULL, 0, NULL, 0, 0, 0, NULL, 0, 3000, '', 'A', 'admin', NULL, '2019-01-05 09:10:45', NULL),
(11, 'IP00005', 'Pay', '2018-12-31 18:00:00', 2, NULL, NULL, NULL, NULL, 0, NULL, 0, 0, 0, NULL, 0, 5000, 'update', 'D', 'admin', 'admin', '2019-01-05 09:41:30', '2019-01-05 10:04:54');

-- --------------------------------------------------------

--
-- Table structure for table `insurance_companies`
--

CREATE TABLE `insurance_companies` (
  `in_comp_id` int(20) UNSIGNED NOT NULL,
  `in_comp_code` varchar(100) DEFAULT NULL,
  `in_comp_name` varchar(150) NOT NULL,
  `owner_name` varchar(150) DEFAULT NULL,
  `in_comp_phone` varchar(100) DEFAULT NULL,
  `in_comp_email` varchar(100) DEFAULT NULL,
  `in_comp_address` varchar(250) DEFAULT NULL,
  `in_comp_status` char(10) DEFAULT 'A',
  `created_by` varchar(100) DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `insurance_companies`
--

INSERT INTO `insurance_companies` (`in_comp_id`, `in_comp_code`, `in_comp_name`, `owner_name`, `in_comp_phone`, `in_comp_email`, `in_comp_address`, `in_comp_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Momen LTD', 'Md Momen', '013715469875', 'momen@co.com', 'mirpur', 'D', 'admin', 'admin', '2019-01-03 05:36:07', '2019-01-03 05:59:21'),
(2, NULL, 'Islam Commercial Insurance Co', 'Islam', '', '', 'Islam', 'A', 'admin', NULL, '2019-01-05 05:30:17', NULL);

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
  `dollar_car_v` int(10) DEFAULT NULL,
  `fright_value` int(10) UNSIGNED NOT NULL,
  `dollar_frt_val` int(10) DEFAULT NULL,
  `total` int(15) UNSIGNED NOT NULL,
  `status` char(5) DEFAULT 'a'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lc_details`
--

INSERT INTO `lc_details` (`id`, `lc_id`, `pus_id`, `cus_id`, `order_id`, `car_value`, `dollar_car_v`, `fright_value`, `dollar_frt_val`, `total`, `status`) VALUES
(1, 1, 2, 4, 2, 30000, NULL, 2000, NULL, 32000, 'a'),
(2, 3, 7, 5, 8, 5000, 400, 5000, 400, 10000, 'a'),
(3, 4, 8, 8, 7, 4444, 5, 33333, 7, 37777, 'a');

-- --------------------------------------------------------

--
-- Table structure for table `lc_documents`
--

CREATE TABLE `lc_documents` (
  `id` int(20) UNSIGNED NOT NULL,
  `lc_id` int(20) UNSIGNED NOT NULL,
  `pus_id` int(20) UNSIGNED NOT NULL,
  `image_path` text,
  `type` char(5) DEFAULT 'D',
  `status` char(5) DEFAULT 'a'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lc_documents`
--

INSERT INTO `lc_documents` (`id`, `lc_id`, `pus_id`, `image_path`, `type`, `status`) VALUES
(2, 1, 2, '0', 'P', 'a'),
(5, 1, 2, '0', 'I', 'a'),
(8, 1, 2, 'libs/upload_pic/lc_document/17969751845c04b8de0729a.pdf', 'P', 'a'),
(9, 1, 2, 'libs/upload_pic/lc_document/15425979415c04bc885af6b.pdf', 'P', 'a'),
(10, 1, 2, 'libs/upload_pic/lc_document/15380758065c04c0e4a1c40.pdf', 'P', 'a'),
(11, 1, 2, 'libs/upload_pic/lc_document/demoform12.pdf', 'P', 'a'),
(12, 1, 2, 'libs/upload_pic/lc_document/3457442955c04c9dc6c019.jpg', 'I', 'a'),
(13, 1, 2, 'libs/upload_pic/lc_document/demoform121.pdf', 'P', 'a');

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
(1, 2, 0, 0, 'Demo', 'red', '', '', 'M-00001', '', 'demo', 'demo', 'demo', 'demo', '100000', 1000000, 0, 'p', '2018-12-03 18:00:00', 'a', 'admin', 'admin', '2018-12-01 18:00:00', '2018-12-10 05:40:39'),
(2, 4, 1, 2, 'okkk', 'done', 'f343434sd', 'fff343434f', 'M-00002', 'na', 'rer', 'erer', 'erer', 'rere', '34334', 343343434, 0, 'a', '2018-12-02 05:58:09', 'a', 'admin', 'admin', '2018-12-01 18:00:00', '2018-12-02 11:36:49'),
(3, 3, NULL, 5, 'sdfdsf', 'sadfsdf', 'ee433434', '4343ddd', 'M-00003', 'sadfsdf', 'dsfsdf', 'dsafsdf', 'sdfsadf', 'sdafsd', '43434', 334343434, 0, 'a', '2018-12-02 06:06:56', 'a', 'admin', 'admin', '2018-12-01 18:00:00', '2018-12-02 10:21:04'),
(4, 1, 0, 4, 'dsfsf', 'sdafsdf', '232wew2323', 'sds2323sds', 'M-00004', 'sdafsadf', 'asdfdsf', 'sdfsd', 'fsdaf', 'dsfsdf34', '34343', 43434343, 0, 'a', '2018-12-02 06:07:18', 'a', 'admin', 'admin', '2018-12-01 18:00:00', '2018-12-02 10:25:45'),
(5, 7, 0, 3, 'gdfgdfg', 'ghgh', 'fg77565', 'cg5656', 'M-00005', 'dsdf', 'dfsdf', 'dsfd', 'dfdf', '3443', '5642454', 100000000, 0, 'a', '2018-12-02 10:11:15', 'a', 'admin', 'admin', '2018-12-01 18:00:00', '2018-12-01 18:00:00'),
(6, 5, NULL, 9, 'dfsdf', 'sadfsdf', 'sdafsdf343434', 'df34343dsfsf', 'M-00006', 'sdfsdf', 'dsaf', 'dasfasdf', 'asf', 'dasfsdf', '3434', 2147483647, 0, 'a', '2018-12-02 10:29:12', 'a', 'admin', 'admin', '2018-12-01 18:00:00', '2018-12-02 10:29:41'),
(7, 8, 4, 8, 'dsfsdf', 'sdfsd', 'dsfsd', 'fsdf', 'M-00007', 'dffdsfdsfdsf', 'sadfsdfsdf', 'fasdfsadfd', 'sdfdsfsda', 'sddfsdf', '34234234', 2147483647, 0, 'a', '2018-12-02 10:32:09', 'a', 'admin', 'admin', '2018-12-01 18:00:00', '2018-12-01 18:00:00'),
(8, 5, 3, 7, 'dsgsdfg', 'sdfgsdfg', 'dsfgdfg', 'sdfgdsfg', 'M-00008', 'dsfsdf', 'fsdgdfsg', 'sdfgdsf', 'gsdfgdfsg', 'sdfgdfg', 'sdfgdsfgdfg', 223300000, 0, 'a', '2018-12-02 10:33:56', 'a', 'admin', 'admin', '2018-12-01 18:00:00', '2018-12-01 18:00:00'),
(9, 8, 0, 6, 'gfdgd', 'gdfgfdg', 'sdafsadf', 'asdfdsaf', 'M-00009', 'fdgfdg', 'fdgdfg', 'fdgdf', 'gfgfdg', 'fdgfdg', '43333333', 2147483647, 0, 'a', '2018-12-02 10:35:30', 'a', 'admin', 'admin', '2018-12-01 18:00:00', '2018-12-02 10:35:42'),
(10, 7, 0, 0, 'fdsdf', 'sdfdsf', '', '', 'M-00010', 'dsfdsf', 'sdfds', 'fdsf', 'dsfdsf', 'dsfdsf', '50000', 2147483647, 0, 'p', '2018-12-03 06:28:03', 'a', 'admin', 'admin', '2018-12-02 18:00:00', '2018-12-02 18:00:00'),
(11, 9, 0, 0, 'sdfsdf', 'dsfdsf', '', '', 'M-00011', 'dsfdsf', 'dsfsdf', 'dsf', 'dsf', 'dsf', 'd54425', 44564545, 0, 'p', '2018-12-03 08:57:36', 'a', 'admin', 'admin', '2018-12-02 18:00:00', '2018-12-02 18:00:00'),
(12, 10, 0, 0, 'hayues', 'black', '', '', 'M-00012', 'na', 'hmm', 'hmm', 'hhh', '1234', '1050000', 50000000, 0, 'p', '2018-12-10 04:17:27', 'a', 'admin', 'admin', '2018-12-10 04:17:27', '2018-12-10 04:17:27'),
(13, 10, 0, 0, 'wwer', 'ddfd', '', '', 'M-00013', 'dfdf', 'dfdf', 'fd', 'df', 'dfdf', '500000', 8000000, 0, 'p', '2018-12-10 04:18:24', 'a', 'admin', 'admin', '2018-12-10 04:18:24', '2018-12-10 04:18:24');

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
  `stock_no` varchar(200) DEFAULT NULL,
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

INSERT INTO `purchase` (`id`, `pus_sl`, `supplier_id`, `customer_id`, `order_id`, `puc_lc_id`, `stock_no`, `puc_car_model`, `puc_color`, `puc_engine_no`, `puc_chassis_no`, `puc_make`, `puc_grade`, `puc_type`, `puc_year`, `puc_mileage`, `puc_other_tirm`, `total_price`, `transport_id`, `car_status`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'P-00001', 2, 0, 0, 0, NULL, 'demo', 'red', 'E-67465842', 'C-4569745', 'ok', 'A', 'A', '1254', '1254000', 'na', 697170, 1, 0, 'a', 'admin', 'admin', '2018-12-01 18:00:00', '2018-12-01 18:00:00'),
(2, 'P-00002', 2, 4, 2, 1, 'S-777323', 'Nova', 'sdfsd', 'f343434sd', 'fff343434f', 'sdfdsf', 'dsfds', 'dsfdsf', '2323', '3434343', 'sdfdsf', 94545, NULL, 0, 'a', 'admin', 'admin', '2018-12-01 18:00:00', '2018-12-02 11:36:48'),
(3, 'P-00003', 1, 7, 5, 0, NULL, 'gdfgdfg', 'ghgh', 'fg77565', 'cg5656', 'dfsdf', 'dsfd', 'dfdf', '3443', '5642454', 'sdfsdsd', 0, NULL, 0, 'a', 'admin', 'admin', '2018-12-01 18:00:00', '2018-12-01 18:00:00'),
(4, 'P-00004', 1, 1, 4, 0, NULL, 'ewewe', 'wewe', '232wew2323', 'sds2323sds', 'ss', 'ssd', 'sd', 'sdsd', '23232323', 'sdsds', 0, NULL, 0, 'a', 'admin', 'admin', '2018-12-01 18:00:00', '2018-12-01 18:00:00'),
(5, 'P-00005', 2, 3, 3, 0, NULL, 'sdfdsf', 'sadfsdf', 'ee433434', '4343ddd', 'dsfsdf', 'dsafsdf', 'sdfsadf', 'sdafsd', '43434', 'sadfsdf', 0, NULL, 0, 'a', 'admin', 'admin', '2018-12-01 18:00:00', '2018-12-01 18:00:00'),
(6, 'P-00006', 2, 8, 9, 0, NULL, 'dfdf', 'dsaf', 'sdafsadf', 'asdfdsaf', 'asdfsadf', 'sfsdaf', 'asdf', 'sadfasd', '34343434', 'asdfasdf', 0, NULL, 0, 'a', 'admin', 'admin', '2018-12-01 18:00:00', '2018-12-01 18:00:00'),
(7, 'P-00007', 1, 5, 8, 3, NULL, 'dsgsdfg', 'sdfgsdfg', 'dsfgdfg', 'sdfgdsfg', 'fsdgdfsg', 'sdfgdsf', 'gsdfgdfsg', 'sdfgdfg', 'sdfgdsfgdfg', 'sfdgdfg', 0, NULL, 0, 'a', 'admin', 'admin', '2018-12-01 18:00:00', '2018-12-01 18:00:00'),
(8, 'P-00008', 1, 8, 7, 4, NULL, 'dsfsdf', 'sdfsd', 'dsfsd', 'fsdf', 'sadfsdfsdf', 'fasdfsadfd', 'sdfdsfsda', 'sddfsdf', '34234234', 'sdfsdfdsfds', 0, NULL, 0, 'a', 'admin', 'admin', '2018-12-01 18:00:00', '2018-12-01 18:00:00'),
(9, 'P-00009', 1, 5, 6, 0, NULL, 'dfsdf', 'sadfsdf', 'sdafsdf343434', 'df34343dsfsf', 'dsaf', 'dasfasdf', 'asf', 'dasfsdf', '3434', 'sdfsdf', 0, NULL, 0, 'a', 'admin', 'admin', '2018-12-01 18:00:00', '2018-12-01 18:00:00'),
(10, 'P-00010', 1, 0, 0, 0, 'S-iiippp', 'fdgdfg', 'dsfgdfg', '2323vreer', 'xcx343', 'sdfsdf', 'sdfsdf', 'sdfsdf', '3434', '10024174', 'dsfdsfsd', 0, NULL, 0, 'a', 'admin', 'admin', '2018-12-10 04:21:03', '2018-12-09 18:00:00'),
(11, 'P-00011', 2, 0, 0, 0, 'S-uuuu', 'dsfdsfd', 'dfdf', '89768745256', 'dd55487', 'hsdfhdh', 'hjhfjsh dhfj', 'hkjfhds', '2010', '10024174', 'dfdsfsdf', 0, NULL, 0, 'a', 'admin', 'admin', '2018-12-10 04:22:43', '2018-12-10 04:22:43'),
(12, 'P-00012', 2, 0, 0, 0, 'new stock', 'new', 'red', 'E-12121332323', 'C-234343434', 'make', 'Grade', 'type', '2018', '1050000', 'na', 0, NULL, 0, 'a', 'admin', 'admin', '2018-12-10 06:52:51', '2018-12-10 06:52:51'),
(13, 'P-00013', 2, 0, 0, 0, 'new stock2', 'new2', 'red2', 'E-89898989', 'C-56565656', 'ok', 'A', 'Hibrid', '2017', '2000000', 'NA', 0, NULL, 0, 'a', 'admin', 'admin', '2018-12-10 06:57:20', '2018-12-10 06:57:20'),
(14, 'P-00014', 2, 0, 0, 0, 'dfsdf', 'sdfsd', 'dfsdf', '34343434', '343434', 'sdfdf', 'sdfsdf', 'sdsdfsf', '334', '343434', 'dsfsf', 0, NULL, 0, 'a', 'admin', 'admin', '2018-12-10 07:06:00', '2018-12-10 07:06:00'),
(15, 'P-00015', 2, 0, 0, 0, 'dfsdf', 'sdfsd', 'dfsdf', '34343434', '343434', 'sdfdf', 'sdfsdf', 'sdsdfsf', '334', '343434', 'dsfsf', 0, NULL, 0, 'a', 'admin', 'admin', '2018-12-10 07:06:23', '2018-12-10 07:06:23');

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
(1, 2, 4545, 90000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'a', 'admin', 'admin', '2018-12-02 06:41:00', '2018-12-02 11:48:57'),
(2, 1, 343434, 0, 343434, 0, 3434, 0, 0, 0, 0, 3434, 0, 0, 3434, 0, 'a', 'admin', 'admin', '2018-12-02 11:57:41', '2018-12-02 11:57:41');

-- --------------------------------------------------------

--
-- Table structure for table `reg_document`
--

CREATE TABLE `reg_document` (
  `id` int(20) UNSIGNED NOT NULL,
  `reg_id` int(20) UNSIGNED NOT NULL,
  `path` text,
  `type` char(5) DEFAULT NULL,
  `status` char(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reg_document`
--

INSERT INTO `reg_document` (`id`, `reg_id`, `path`, `type`, `status`) VALUES
(1, 1, 'libs/upload_pic/reg_doc/11076268745c08d05150537.jpg', 'I', 'a'),
(2, 1, 'libs/upload_pic/reg_doc/13350228025c08d05176c3c.jpg', 'I', 'a'),
(3, 1, 'libs/upload_pic/reg_doc/12238598585c08d061b7c70.jpg', 'I', 'a'),
(4, 1, 'libs/upload_pic/reg_doc/17190368545c08d061ce08a.jpg', 'I', 'd'),
(5, 1, 'libs/upload_pic/reg_doc/demoform11.pdf', 'P', 'a'),
(6, 1, 'libs/upload_pic/reg_doc/demoform121.pdf', 'P', 'd'),
(7, 1, 'libs/upload_pic/reg_doc/demoform12.pdf', 'P', 'a'),
(8, 2, 'libs/upload_pic/reg_doc/12654292495c08d276043f0.jpg', 'I', 'a'),
(9, 2, 'libs/upload_pic/reg_doc/demoform12.pdf', 'P', 'a'),
(10, 2, 'libs/upload_pic/reg_doc/demoform121.pdf', 'P', 'a'),
(11, 2, 'libs/upload_pic/reg_doc/663884785c08d28275f0f.jpg', 'I', 'a'),
(12, 2, 'libs/upload_pic/reg_doc/2765004205c08d29132b59.jpg', 'I', 'a'),
(13, 2, 'libs/upload_pic/reg_doc/6087634055c08d2914f613.jpg', 'I', 'a'),
(14, 2, 'libs/upload_pic/reg_doc/17806120165c08d29161886.jpg', 'I', 'a');

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
(2, 'S00002', 'Car International Ltd.', '01755555555', 'carltd@gmail.com', '2017-03-01 18:00:00', '', 'japan', 'a', 'admin', 'admin', '2018-11-10 18:00:00', '2018-12-02 11:28:28');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lcs`
--

CREATE TABLE `tbl_lcs` (
  `id` int(20) UNSIGNED NOT NULL,
  `lc_no` varchar(255) NOT NULL,
  `lc_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lc_amount` int(10) UNSIGNED NOT NULL,
  `dollar_amount` int(10) DEFAULT NULL,
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

INSERT INTO `tbl_lcs` (`id`, `lc_no`, `lc_date`, `lc_amount`, `dollar_amount`, `car_qty`, `bank_name`, `branch_name`, `lc_insur`, `comp_id`, `supplier_id`, `agent_id`, `ship_name`, `arriv_date`, `port_name`, `note`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, '1020304050', '2018-11-10 18:00:00', 50000, NULL, 2, 'DBBL', 'Mirpur 10', '', 1, 2, 1, '', '2018-11-10 18:00:00', '', '', 'a', 'admin', 'admin', '2018-11-10 18:00:00', '2018-12-03 04:00:16'),
(2, 'LC-10211000', '2018-11-10 18:00:00', 60000, NULL, 2, 'EBL', 'Mirpur 10', '', 1, 2, 1, '', '2018-11-10 18:00:00', '', '', 'a', 'admin', 'admin', '2018-11-10 18:00:00', '2018-11-11 09:07:41'),
(3, 'd3343', '2018-12-02 18:00:00', 500000, 400, 1, 'dfdsfsd', 'dsfdsf', '', 1, 2, 1, '', '2018-12-02 18:00:00', '', '', 'a', 'admin', 'admin', '2018-12-02 18:00:00', '2018-12-02 18:00:00'),
(4, '4345', '2018-12-02 18:00:00', 435435, 444, 4, 'dgf', 'gfdg', '', 1, 2, 2, 'fdg', '2018-12-02 18:00:00', '', '', 'a', 'admin', 'admin', '2018-12-02 18:00:00', '2018-12-02 18:00:00');

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
(1, 1, 2, '2018-11-27 18:00:00', 'admin', 'admin', '2018-12-01 18:00:00', '2018-12-02 04:23:39');

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

-- --------------------------------------------------------

--
-- Table structure for table `vouchers`
--

CREATE TABLE `vouchers` (
  `v_id` int(20) UNSIGNED NOT NULL,
  `v_code` varchar(100) NOT NULL,
  `value_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dr_ah_id` int(20) UNSIGNED NOT NULL,
  `dr_amount` int(10) UNSIGNED NOT NULL,
  `dr_note` text,
  `cr_ah_id` int(20) UNSIGNED NOT NULL,
  `cr_amount` int(10) UNSIGNED NOT NULL,
  `cr_note` text,
  `approve_status` char(10) DEFAULT 'P' COMMENT 'P=pending A=Approved',
  `v_status` char(10) DEFAULT 'A' COMMENT 'A=active D=delete',
  `approved_by` varchar(100) DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vouchers`
--

INSERT INTO `vouchers` (`v_id`, `v_code`, `value_date`, `dr_ah_id`, `dr_amount`, `dr_note`, `cr_ah_id`, `cr_amount`, `cr_note`, `approve_status`, `v_status`, `approved_by`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'V-00001', '2018-12-25 18:00:00', 1, 100, 'fgfdg', 1, 100, 'fdgdfgdf', 'P', 'A', NULL, 'admin', NULL, '2018-12-26 10:58:55', NULL),
(2, 'V-00002', '2018-12-25 18:00:00', 1, 100, 'fgfdg', 1, 100, 'fdgdfgdf', 'P', 'A', NULL, 'admin', NULL, '2018-12-26 11:03:09', NULL),
(3, 'V-00003', '2018-12-25 18:00:00', 1, 100, 'fgfdg', 1, 100, 'fdgdfgdf', 'P', 'A', NULL, 'admin', NULL, '2018-12-26 11:04:47', NULL),
(4, 'V-00004', '2018-12-25 18:00:00', 1, 10, 'kljkl', 1, 10, 'kjljkl', 'P', 'A', NULL, 'admin', NULL, '2018-12-26 11:06:03', NULL),
(5, 'V-00005', '2018-12-25 18:00:00', 1, 10, '5454', 1, 10, '4545', 'P', 'A', NULL, 'admin', NULL, '2018-12-26 11:08:09', NULL),
(6, 'V-00006', '2018-12-25 18:00:00', 1, 45, '45', 1, 45, '45', 'P', 'A', NULL, 'admin', NULL, '2018-12-26 11:10:01', NULL),
(7, 'V-00007', '2018-12-25 18:00:00', 1, 23, 'dfdf', 1, 43, 'fdfdf', 'P', 'A', NULL, 'admin', NULL, '2018-12-26 11:12:15', NULL),
(8, 'V-00008', '2018-12-25 18:00:00', 1, 34, 'fsdf', 1, 343, 'fdf', 'P', 'A', NULL, 'admin', NULL, '2018-12-26 11:12:53', NULL),
(9, 'V-00009', '2018-12-25 18:00:00', 1, 50000, 'dfgf', 1, 50000, 'fdfsd afadf fgsdfds dsfsadf ', 'P', 'A', NULL, 'admin', NULL, '2018-12-26 11:14:44', NULL),
(10, 'V-00010', '2018-12-25 18:00:00', 1, 50000, 'fghdfgdfgfdgdfgfdgfdgdfg', 1, 50000, 'fddfgdfgfdgdfgdfgdfgfdgfdgdfg', 'P', 'A', NULL, 'admin', NULL, '2018-12-26 11:15:58', NULL),
(11, 'V-00011', '2018-12-25 18:00:00', 1, 434234234, 'dffsdfsdf', 1, 234324324, 'fsdfsdfsdf rewr  werwe r', 'P', 'A', NULL, 'admin', NULL, '2018-12-26 11:17:30', NULL),
(12, 'V-00012', '2018-12-25 18:00:00', 1, 4343434, 'dfsdfsdf', 1, 343434, 'dfsfsdfsdf sfsf  sfs f', 'P', 'A', NULL, 'admin', NULL, '2018-12-26 11:18:41', NULL),
(13, 'V-00013', '2018-12-25 18:00:00', 1, 3424234, 'fsdfsf', 1, 434343, 'dfsdf sfsdf sfdf', 'P', 'A', NULL, 'admin', NULL, '2018-12-26 11:19:47', NULL),
(14, 'V-00014', '2018-12-25 18:00:00', 1, 4234324234, 'fsfsdf', 1, 2334324, 'fdsdfsfsdf', 'P', 'A', NULL, 'admin', NULL, '2018-12-26 11:20:18', NULL),
(15, 'V-00015', '2018-12-25 18:00:00', 1, 424234, 'dsdfdsf', 1, 43434, 'dxfdfdf', 'P', 'A', NULL, 'admin', NULL, '2018-12-26 11:22:05', NULL),
(16, 'V-00016', '2018-12-25 18:00:00', 1, 500, 'dfsdf', 1, 200, 'fdgdfg', 'P', 'A', NULL, 'admin', NULL, '2018-12-26 11:23:23', NULL),
(17, 'V-00017', '2018-12-25 18:00:00', 1, 4534, 'ffs', 1, 34343, 'dfsfd', 'P', 'A', NULL, 'admin', NULL, '2018-12-26 11:24:09', NULL),
(18, 'V-00018', '2018-12-25 18:00:00', 1, 3434, 'dfsdf', 1, 34343, 'dfsfsf', 'P', 'A', NULL, 'admin', NULL, '2018-12-26 11:25:44', NULL),
(19, 'V-00019', '2018-12-25 18:00:00', 1, 44, 'fsfs', 1, 3434, 'dfsfdsf', 'P', 'A', NULL, 'admin', NULL, '2018-12-26 11:26:09', NULL),
(20, 'V-00020', '2018-12-25 18:00:00', 1, 57657, '5hhgjghjg', 1, 7856867, 'jggjghj', 'P', 'A', NULL, 'admin', NULL, '2018-12-26 11:27:14', NULL),
(21, 'V-00021', '2018-12-25 18:00:00', 1, 6546456, 'hfgh', 1, 657567, 'fghfg', 'P', 'A', NULL, 'admin', NULL, '2018-12-26 11:27:52', NULL),
(22, 'V-00022', '2018-12-25 18:00:00', 1, 765756, 'bghjg', 1, 7567567, 'jghjg', 'P', 'A', NULL, 'admin', NULL, '2018-12-26 11:28:44', NULL),
(23, 'V-00023', '2018-12-25 18:00:00', 1, 4294967295, 'fghfgh', 1, 567567, 'ghfgh', 'P', 'A', NULL, 'admin', NULL, '2018-12-26 11:30:01', NULL),
(24, 'V-00024', '2018-12-25 18:00:00', 1, 6456456, 'hfghfg', 1, 456456, 'hfghfg', 'P', 'A', NULL, 'admin', NULL, '2018-12-26 11:30:47', NULL),
(25, 'V-00025', '2018-12-25 18:00:00', 1, 6567567, 'ghjgh', 1, 56756, 'jhgj', 'P', 'A', NULL, 'admin', NULL, '2018-12-26 11:31:26', NULL),
(26, 'V-00026', '2018-12-25 18:00:00', 1, 567567, 'gfgh', 1, 567567, 'gfhf', 'P', 'A', NULL, 'admin', NULL, '2018-12-26 11:34:15', NULL),
(27, 'V-00027', '2018-12-25 18:00:00', 1, 546456, 'fghfgh', 1, 565, 'fghfg', 'P', 'A', NULL, 'admin', NULL, '2018-12-26 11:35:13', NULL),
(28, 'V-00028', '2018-12-25 18:00:00', 1, 5675, 'jghj', 1, 65756, 'ghjgh', 'P', 'A', NULL, 'admin', NULL, '2018-12-26 11:35:45', NULL),
(29, 'V-00029', '2018-12-25 18:00:00', 1, 657567, 'jgh', 1, 768678, 'jghj', 'P', 'A', NULL, 'admin', NULL, '2018-12-26 11:36:16', NULL),
(30, 'V-00030', '2018-12-25 18:00:00', 1, 546456, 'fhgf', 1, 756756, 'fghfg', 'P', 'A', NULL, 'admin', NULL, '2018-12-26 11:36:38', NULL),
(31, 'V-00031', '2018-12-25 18:00:00', 1, 75657, 'hgjgh', 1, 678678, 'ghjg', 'P', 'A', NULL, 'admin', NULL, '2018-12-26 11:37:06', NULL),
(32, 'V-00032', '2018-12-25 18:00:00', 1, 54645645, 'gfhfgh', 1, 75675675, 'fghfgh', 'P', 'A', NULL, 'admin', NULL, '2018-12-26 11:38:58', NULL),
(33, 'V-00033', '2018-12-25 18:00:00', 1, 56756567, 'hfghfgh', 1, 568768678, 'fghfgh', 'P', 'A', NULL, 'admin', NULL, '2018-12-26 11:40:44', NULL),
(34, 'V-00034', '2018-12-25 18:00:00', 1, 6545, 'hfgh', 1, 57567, 'fghfgh', 'P', 'A', NULL, 'admin', NULL, '2018-12-26 11:41:06', NULL),
(35, 'V-00035', '2018-12-25 18:00:00', 1, 7657567, 'fghfghf', 1, 7567567, 'fghf', 'P', 'A', NULL, 'admin', NULL, '2018-12-26 11:41:28', NULL),
(36, 'V-00036', '2018-12-25 18:00:00', 1, 567567, 'hgjgh', 1, 567567, 'jghj', 'P', 'A', NULL, 'admin', NULL, '2018-12-26 11:42:23', NULL),
(37, 'V-00037', '2018-12-25 18:00:00', 1, 64564, 'hfhfg', 1, 567567, 'fghfgh', 'P', 'A', NULL, 'admin', NULL, '2018-12-26 11:43:15', NULL),
(38, 'V-00038', '2018-12-25 18:00:00', 1, 675, 'hfhfg', 1, 5675, 'fghf', 'P', 'A', NULL, 'admin', NULL, '2018-12-26 11:43:45', NULL),
(39, 'V-00039', '2018-12-25 18:00:00', 1, 65756756, 'jhgjgh', 1, 677567567, 'jghjghj', 'P', 'A', NULL, 'admin', NULL, '2018-12-26 11:44:34', NULL),
(40, 'V-00040', '2018-12-25 18:00:00', 1, 547567567, 'fghfg', 1, 767567, 'hfghfg', 'P', 'A', NULL, 'admin', NULL, '2018-12-26 11:45:02', NULL),
(41, 'V-00041', '2018-12-25 18:00:00', 1, 3434, 'dsdfsdf', 1, 3443, 'fsdsdf', 'P', 'A', NULL, 'admin', NULL, '2018-12-26 11:46:25', NULL),
(42, 'V-00042', '2018-12-25 18:00:00', 1, 3432, 'dfsdf', 1, 45345, 'fdsfd', 'P', 'A', NULL, 'admin', NULL, '2018-12-26 11:47:03', NULL),
(43, 'V-00043', '2018-12-25 18:00:00', 1, 324234, 'sdfdsf', 1, 34234, 'dfsfds', 'P', 'A', NULL, 'admin', NULL, '2018-12-26 11:47:38', NULL),
(44, 'V-00044', '2018-12-25 18:00:00', 1, 334, 'dsfsfd', 1, 324234, 'dfdfsdf', 'P', 'A', NULL, 'admin', NULL, '2018-12-26 11:48:37', NULL),
(45, 'V-00045', '2018-12-25 18:00:00', 1, 334, 'sdfdsf', 1, 34343, 'dsfsdf', 'P', 'A', NULL, 'admin', NULL, '2018-12-26 11:49:23', NULL),
(46, 'V-00046', '2018-12-25 18:00:00', 1, 3434, 'sdfsdf', 1, 3434, 'dfsdfsdf', 'P', 'D', NULL, 'admin', 'admin', '2018-12-26 11:50:53', '2018-12-27 07:24:47'),
(47, 'V-00047', '2018-12-25 18:00:00', 1, 454, 'dfdsf', 1, 3434, 'dfsdfdsf', 'A', 'A', 'admin', 'admin', 'admin', '2018-12-26 11:51:34', '2018-12-27 07:19:23'),
(48, 'V-00048', '2018-12-25 18:00:00', 1, 3434, 'dsdfdf', 1, 334, 'dsfsdfdsf', 'A', 'A', 'admin', 'admin', 'admin', '2018-12-26 11:51:55', '2018-12-27 06:30:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `account_heads`
--
ALTER TABLE `account_heads`
  ADD PRIMARY KEY (`ah_id`);

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
-- Indexes for table `agent_bill_payments`
--
ALTER TABLE `agent_bill_payments`
  ADD PRIMARY KEY (`bill_id`);

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
-- Indexes for table `car_registration`
--
ALTER TABLE `car_registration`
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
-- Indexes for table `insurance_bills`
--
ALTER TABLE `insurance_bills`
  ADD PRIMARY KEY (`in_bill_id`);

--
-- Indexes for table `insurance_companies`
--
ALTER TABLE `insurance_companies`
  ADD PRIMARY KEY (`in_comp_id`);

--
-- Indexes for table `lc_details`
--
ALTER TABLE `lc_details`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `lc_documents`
--
ALTER TABLE `lc_documents`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `reg_document`
--
ALTER TABLE `reg_document`
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
-- Indexes for table `vouchers`
--
ALTER TABLE `vouchers`
  ADD PRIMARY KEY (`v_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `account_heads`
--
ALTER TABLE `account_heads`
  MODIFY `ah_id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
-- AUTO_INCREMENT for table `agent_bill_payments`
--
ALTER TABLE `agent_bill_payments`
  MODIFY `bill_id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` smallint(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `bank_trans`
--
ALTER TABLE `bank_trans`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `car_images`
--
ALTER TABLE `car_images`
  MODIFY `id` int(30) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `car_registration`
--
ALTER TABLE `car_registration`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `checks`
--
ALTER TABLE `checks`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `collections`
--
ALTER TABLE `collections`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
-- AUTO_INCREMENT for table `insurance_bills`
--
ALTER TABLE `insurance_bills`
  MODIFY `in_bill_id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `insurance_companies`
--
ALTER TABLE `insurance_companies`
  MODIFY `in_comp_id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lc_details`
--
ALTER TABLE `lc_details`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `lc_documents`
--
ALTER TABLE `lc_documents`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `months`
--
ALTER TABLE `months`
  MODIFY `id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `purchase_pricing`
--
ALTER TABLE `purchase_pricing`
  MODIFY `id` int(30) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reg_document`
--
ALTER TABLE `reg_document`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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

--
-- AUTO_INCREMENT for table `vouchers`
--
ALTER TABLE `vouchers`
  MODIFY `v_id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
