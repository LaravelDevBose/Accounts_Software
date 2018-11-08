-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2018 at 01:11 PM
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
  `customer_entry` tinyint(1) DEFAULT '0',
  `customer_list` tinyint(1) DEFAULT '0',
  `purchase_module` tinyint(1) DEFAULT '0',
  `purchase_entry` tinyint(1) DEFAULT '0',
  `purchase_list` tinyint(1) DEFAULT '0',
  `transport_status` tinyint(1) DEFAULT '0',
  `supplier` tinyint(1) DEFAULT '0',
  `transport_head` tinyint(1) DEFAULT '0',
  `account_module` tinyint(1) DEFAULT '0',
  `collection` tinyint(1) DEFAULT '0',
  `payment` tinyint(1) DEFAULT '0',
  `ofice_payment` tinyint(1) DEFAULT '0',
  `other_income` tinyint(1) DEFAULT '0',
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
  `lc_entry` tinyint(1) DEFAULT '0',
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

INSERT INTO `admin_access` (`id`, `admin_id`, `sale_module`, `customer_order`, `order_entry`, `all_order_list`, `pending_order_list`, `process_order_list`, `customer_entry`, `customer_list`, `purchase_module`, `purchase_entry`, `purchase_list`, `transport_status`, `supplier`, `transport_head`, `account_module`, `collection`, `payment`, `ofice_payment`, `other_income`, `check_option`, `check_entry`, `pending_check_list`, `reminder_check_list`, `paid_check_list`, `hr_module`, `sallay_payment`, `employee_list`, `employee_entry`, `monthe_entry`, `report_module`, `stock_report`, `car_full_report`, `car_coll_report`, `cus_due_report`, `cus_order_report`, `deliv_order_report`, `lc_order_report`, `collection_report`, `cus_coll_report`, `date_payment_report`, `supplier_payment_report`, `office_payment_report`, `sallary_report`, `emp_sallary_report`, `lc_list_report`, `cus_list_report`, `administration`, `lc_entry`, `expense_head_entry`, `company_info`, `admin`, `admin_entry`, `admin_list`, `admin_access`, `edit_access`, `delete_access`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 5, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, NULL, NULL, '2018-10-31 10:05:24', '2018-10-31 10:05:24'),
(3, 12, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, NULL, NULL, '2018-11-01 05:53:50', '2018-11-01 05:53:50');

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
(1, 'A00001', 'New Agent', '0123456789', 'agent@gmail.com', 'Mirpur', 'a', 'admin', 'admin', '2018-11-02 18:00:00', '2018-11-02 18:00:00');

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
  `cus_id` int(20) UNSIGNED NOT NULL,
  `order_no` int(20) UNSIGNED DEFAULT NULL,
  `lc_id` int(20) UNSIGNED DEFAULT NULL,
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
(1, 'Link Up', '01111111111111111', 'link@gmail.com', 'mirpur', NULL, 'a', 'admin', 'admin', '2018-11-02 18:00:00', '2018-11-02 18:00:00');

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
(12, 'maven Auto', 'e10adc3949ba59abbe56e057f20f883e', 'maven@gmail.com', '12345678910', 'maven auto', '0', 'a'),
(13, 'maven Auto admin', 'e10adc3949ba59abbe56e057f20f883e', 'maven@gmail.com', '12345678910', 'maven auto', '0', 'a');

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
(1, 'C00001', 'Arup', 'Link Up', '01731909035', '01571721910', '2018-11-05 18:00:00', 'arup@gmail.com', 'Mirpur 11', '', 'libs/upload_pic/cus_image/18017224965bd9595006305.jpg', 'libs/upload_pic/cus_image/20743173695bd9595027d31.jpg', 'a', 'admin', 'admin', '2018-10-30 18:00:00', '2018-10-30 18:00:00'),
(2, 'C00002', 'arup bose', 'link up', '1234567895320', '', '2018-10-31 18:00:00', 'sdkfjd@fjkd.com', 'fdgfg', '', 'libs/upload_pic/cus_image/16496143055bdae84d8c6e5.jpg', 'libs/upload_pic/cus_image/3601753815bdae84dae487.jpg', 'a', 'admin', 'admin', '2018-10-31 18:00:00', '2018-10-31 18:00:00');

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
(1, 'fdf', 'O', 'a', 'admin', 'admin', '2018-11-04 18:00:00', '2018-11-04 18:00:00');

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
(2, 2, 5, 2, 1, 8000, 2000, 10000, 'a');

-- --------------------------------------------------------

--
-- Table structure for table `months`
--

CREATE TABLE `months` (
  `id` int(3) UNSIGNED NOT NULL,
  `month_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(1, 2, 2, 5, 'fdgfdg', 'fgfg', '5555555555555', '66666666666666', 'M-00001', 'fdgfdg', 'gfg', '454', '454', '545', '4545454545', 2147483647, 454545454, 'a', '2018-11-01 11:49:33', 'a', 'admin', 'admin', '2018-10-31 18:00:00', '2018-11-07 10:50:08'),
(2, 1, 0, 2, 'dfdsfds', 'dfdsfdsf', '', '', 'M-00002', 'dfdsf', 'dsfsdf', 'dfdf', 'dsfdsf', 'dsfdsf', 'dsfdsf', 5656565, 4545, 'p', '2018-11-04 11:14:36', 'a', 'admin', 'admin', '2018-11-03 18:00:00', '2018-11-03 18:00:00'),
(3, 2, 0, 3, 'dfgdfgfg', 'fgfgfg', '', '', 'M-00003', 'fgfdgdfg', 'dfgfdg', 'fgdf', 'gfdg', 'fdgdfg', 'fdgdf', 3433434, 2147483647, 'p', '2018-11-04 11:16:55', 'd', 'admin', 'admin', '2018-11-03 18:00:00', '2018-11-03 18:00:00');

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

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `id` int(20) UNSIGNED NOT NULL,
  `supplier_id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(20) UNSIGNED DEFAULT NULL,
  `order_id` int(20) UNSIGNED DEFAULT NULL,
  `puc_lc_id` int(20) UNSIGNED DEFAULT '0',
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

INSERT INTO `purchase` (`id`, `supplier_id`, `customer_id`, `order_id`, `puc_lc_id`, `puc_car_model`, `puc_color`, `puc_engine_no`, `puc_chassis_no`, `puc_make`, `puc_grade`, `puc_type`, `puc_year`, `puc_mileage`, `puc_other_tirm`, `total_price`, `transport_id`, `car_status`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 1, 0, 'fdgfdg', 'fgfg', '1000000000000', '25323333222', 'gfg', '454', '454', '545', '4545454545', 'fdgfdg', 0, NULL, 0, 'd', 'admin', 'admin', '2018-11-03 18:00:00', '2018-11-03 18:00:00'),
(2, 1, 1, 2, 0, 'dfdsfds', 'dfdsfdsf', '5424571214', '46512045475', 'dsfsdf', 'dfdf', 'dsfdsf', 'dsfdsf', 'dsfdsf', 'dfdsf', 4294967295, NULL, 0, 'a', 'admin', 'admin', '2018-11-03 18:00:00', '2018-11-03 18:00:00'),
(3, 1, 2, 0, 0, 'dfgdfgfg', 'fgfgfg', '333333333333', '333333333333', 'dfgfdg', 'fgdf', 'gfdg', 'fdgdfg', 'fdgdf', 'fgfdgdfg', 5103700, NULL, 0, 'a', 'admin', 'admin', '2018-11-03 18:00:00', '2018-11-03 18:00:00'),
(5, 1, 2, 1, 2, 'fdgfdg', 'fgfg', '5555555555555', '66666666666666', 'gfg', '454', '454', '545', '4545454545', 'fdgfdg', 17979222, NULL, 0, 'a', 'admin', 'admin', '2018-11-06 18:00:00', '2018-11-06 18:00:00');

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
(1, 3, 10000, 50000, 0, 6000, 1000, 0, 0, 0, 0, 20000, 3000, 50000, 50000, 21000, 'd', 'admin', 'admin', '2018-11-06 10:48:57', '2018-11-06 10:48:57'),
(2, 3, 50000, 254100, 254100, 5500, 545, 0, 0, 5000, 6845, 9000, 3500, 20000, 50000, 10000, 'd', 'admin', 'admin', '2018-11-06 10:50:41', '2018-11-07 05:52:42'),
(3, 3, 5000, 4424, 5444, 0, 42424, 0, 0, 2001, 0, 77741, 4542424, 0, 424242, 0, 'a', 'admin', 'admin', '2018-11-07 06:24:17', '2018-11-07 11:11:21'),
(4, 5, 50000, 0, 600000, 4540000, 0, 50000, 70000, 0, 7477000, 4740000, 440000, 0, 4445, 7777, 'a', 'admin', 'admin', '2018-11-07 11:30:40', '2018-11-07 11:30:40'),
(5, 2, 55252, 4242, 0, 21102, 0, 0, 0, 758752, 0, 4294967295, 0, 224420120, 0, 0, 'a', 'admin', 'admin', '2018-11-07 12:07:43', '2018-11-07 12:07:43');

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
(1, 'logo', 'libs/upload_pic/comp_image/4717049165bcea823e5b1c.jpg', 'admin', 'admin', '2018-10-23 04:26:54', '2018-10-23 04:48:36'),
(2, 'cmp_name', 'Maven Auto', 'admin', 'admin', '2018-10-23 04:26:55', '2018-10-23 04:53:01'),
(3, 'cmp_adds', 'Hosaf Convention Center, Malibag Mor\r\nDhaka, Bangladesh 1217', 'admin', 'admin', '2018-10-23 04:26:55', '2018-10-23 04:53:02'),
(4, 'cmp_phn', '01790-117777', 'admin', 'admin', '2018-10-23 04:26:55', '2018-10-23 04:53:02'),
(5, 'cmp_eml', 'mavenautos@gmail.com', 'admin', 'admin', '2018-10-23 04:26:55', '2018-10-23 04:53:02');

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
(1, 'S00001', 'New Supplier', '0123456789', 'supplier@gmail.com', '2018-11-03 18:00:00', 'new', 'mirpur', 'a', 'admin', 'admin', '2018-11-03 18:00:00', '2018-11-03 18:00:00');

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
(2, '777777777777', '2018-11-05 18:00:00', 10000, 1, 'fff', 'fddfg', 'dfgfg', 1, 1, 1, '', '2018-11-06 18:00:00', '', '', 'a', 'admin', 'admin', '2018-11-06 18:00:00', '2018-11-06 18:00:00');

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
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin_access`
--
ALTER TABLE `admin_access`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `agents`
--
ALTER TABLE `agents`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `checks`
--
ALTER TABLE `checks`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `collections`
--
ALTER TABLE `collections`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `create_admin`
--
ALTER TABLE `create_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ie_heads`
--
ALTER TABLE `ie_heads`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lc_details`
--
ALTER TABLE `lc_details`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `months`
--
ALTER TABLE `months`
  MODIFY `id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `purchase_pricing`
--
ALTER TABLE `purchase_pricing`
  MODIFY `id` int(30) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `salaries`
--
ALTER TABLE `salaries`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sallay_months`
--
ALTER TABLE `sallay_months`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_lcs`
--
ALTER TABLE `tbl_lcs`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transports`
--
ALTER TABLE `transports`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trans_heads`
--
ALTER TABLE `trans_heads`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
