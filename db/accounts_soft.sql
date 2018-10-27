-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2018 at 01:46 PM
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
(1, 1, 1, 'c_enty', '2018-10-08 18:00:00', 56, 'ok', 'd', 'admin', 'admin', '2018-10-08 18:00:00', '2018-10-08 18:00:00'),
(2, 1, 1, 'c_enty', '2018-10-01 18:00:00', 5000000, 'rent', 'a', 'admin', 'admin', '2018-10-08 18:00:00', '2018-10-08 18:00:00'),
(3, 0, 1, 'payment', '2018-10-08 18:00:00', 5800, 'payment update', 'd', 'admin', 'admin', '2018-10-08 18:00:00', '2018-10-08 18:00:00'),
(4, 1, 1, 'other_income', '2018-10-01 18:00:00', 5000, 'demo update', 'd', 'admin', 'admin', '2018-10-08 18:00:00', '2018-10-08 18:00:00'),
(5, 0, 1, 'payment', '2018-10-08 18:00:00', 1000000, 'fdgdfg', 'a', 'admin', 'admin', '2018-10-10 18:00:00', '2018-10-10 18:00:00'),
(6, 0, 3, 'payment', '2018-10-10 18:00:00', 5000, 'okk', 'a', 'admin', 'admin', '2018-10-10 18:00:00', '2018-10-10 18:00:00'),
(7, 0, 3, 'payment', '2018-10-04 18:00:00', 500, 'arup', 'a', 'admin', 'admin', '2018-10-12 18:00:00', '2018-10-14 18:00:00'),
(8, 1, 4, 'other_income', '2018-10-20 18:00:00', 56, 'ffg', 'a', 'admin', 'admin', '2018-10-20 18:00:00', '2018-10-20 18:00:00');

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

--
-- Dumping data for table `collections`
--

INSERT INTO `collections` (`id`, `cus_id`, `order_no`, `lc_id`, `date`, `amount`, `description`, `type`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 4, 8, 1, '2018-10-09 18:00:00', 15000, 'cash', 'receive', 'd', 'admin', 'admin', '2018-10-10 07:36:06', '2018-10-10 07:36:06'),
(2, 1, 4, 1, '2018-10-09 18:00:00', 2000, 'okk', 'receive', 'a', 'admin', 'admin', '2018-10-10 07:40:25', '2018-10-09 18:00:00'),
(3, 4, 8, 1, '2018-10-09 18:00:00', 50000, '', 'receive', 'a', 'admin', 'admin', '2018-10-10 09:57:42', '2018-10-10 09:57:42'),
(4, 4, 8, 3, '2018-10-09 18:00:00', 20000, 'cash', 'receive', 'a', 'admin', 'admin', '2018-10-10 10:06:14', '2018-10-10 10:06:14'),
(5, 1, 3, 3, '2018-10-10 18:00:00', 2000, 'in cash', 'receive', 'a', 'admin', 'admin', '2018-10-11 03:55:45', '2018-10-11 03:55:45'),
(6, 1, 3, 3, '2018-10-10 18:00:00', 2000, 'cash', 'receive', 'a', 'admin', 'admin', '2018-10-11 03:57:41', '2018-10-11 03:57:41'),
(7, 1, 3, 3, '2018-10-10 18:00:00', 79880, 'bank', 'receive', 'a', 'admin', 'admin', '2018-10-11 04:02:34', '2018-10-11 04:02:34'),
(8, 1, 3, 3, '2018-10-10 18:00:00', 79880, 'bank', 'receive', 'a', 'admin', 'admin', '2018-10-11 04:02:42', '2018-10-11 04:02:42'),
(9, 1, 3, 3, '2018-10-10 18:00:00', 79880, 'bank', 'receive', 'a', 'admin', 'admin', '2018-10-11 04:02:44', '2018-10-11 04:02:44'),
(10, 1, 3, 3, '2018-10-10 18:00:00', 79880, 'bank', 'receive', 'a', 'admin', 'admin', '2018-10-11 04:02:44', '2018-10-11 04:02:44'),
(11, 1, 3, 3, '2018-10-10 18:00:00', 79880, 'bank', 'receive', 'a', 'admin', 'admin', '2018-10-11 04:02:45', '2018-10-11 04:02:45'),
(12, 1, 3, 3, '2018-10-10 18:00:00', 79880, 'bank', 'receive', 'a', 'admin', 'admin', '2018-10-11 04:02:45', '2018-10-11 04:02:45'),
(13, 1, 3, 3, '2018-10-10 18:00:00', 2000, '', 'receive', 'a', 'admin', 'admin', '2018-10-11 04:13:34', '2018-10-11 04:13:34'),
(14, 4, 8, 3, '2018-10-10 18:00:00', 5000, 'ok', 'receive', 'a', 'admin', 'admin', '2018-10-11 04:21:55', '2018-10-10 18:00:00'),
(15, 5, 10, 4, '2018-10-12 18:00:00', 60000, 'check', 'receive', 'a', 'admin', 'admin', '2018-10-13 10:02:27', '2018-10-12 18:00:00'),
(16, 5, 10, 4, '2018-10-10 18:00:00', 900000, 'cash', 'receive', 'a', 'admin', 'admin', '2018-10-13 10:03:24', '2018-10-13 10:03:24'),
(17, 5, 10, 4, '2018-10-15 18:00:00', 200, '22', 'receive', 'a', 'admin', 'admin', '2018-10-16 11:06:08', '2018-10-16 11:06:08');

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
(6, 'arup_bose', 'e10adc3949ba59abbe56e057f20f883e', 'arup@gmail.com', '01731909035', 'mirpur', '0', 'd'),
(7, 'new_admin', 'e10adc3949ba59abbe56e057f20f883e', 'newadmin@gmail.com', '01235455644444', 'no', '14549566825bc1c4498c146.jpg', 'a');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(20) UNSIGNED NOT NULL,
  `cus_code` varchar(100) NOT NULL,
  `cus_name` varchar(250) NOT NULL,
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

INSERT INTO `customers` (`id`, `cus_code`, `cus_name`, `cus_contact_no`, `alt_contact_no`, `cus_entry_date`, `cus_email`, `cus_address`, `cus_fb`, `cus_image`, `cus_bus_card`, `cus_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'C00001', 'arup Bose', '01571721310', '01731909035', '2018-10-02 18:00:00', 'arup@#gmail.com', 'mirpur 11', NULL, NULL, NULL, 'a', NULL, NULL, '2018-10-07 08:29:39', '2018-10-07 08:29:39'),
(2, 'C00002', 'Joy', '01357456542', '1425452121', '2018-10-05 18:00:00', 'joy@gmail.com', 'mirpur', NULL, NULL, NULL, 'd', NULL, NULL, '2018-10-07 08:29:39', '2018-10-07 08:29:39'),
(3, 'C00003', 'dsafdf', 'dsfsdf', 'dsfsdf', '2018-10-06 18:00:00', 'sdafsd@dsfsdfs.ccc', 'dsfsdf', NULL, NULL, NULL, 'a', NULL, NULL, '2018-10-07 08:29:39', '2018-10-07 08:29:39'),
(4, 'C00004', 'ddd', 'dddd', 'dddd', '2018-10-08 18:00:00', 'ddd@fffff', 'ddd', NULL, NULL, NULL, 'a', 'admin', 'admin', '2018-10-08 18:00:00', '2018-10-08 18:00:00'),
(5, 'C00005', 'Otish Kumer', '0123456987', '1236459785', '2018-10-12 18:00:00', 'otish@gmail.com', 'Fani', NULL, NULL, NULL, 'a', 'admin', 'admin', '2018-10-12 18:00:00', '2018-10-12 18:00:00'),
(6, 'C00006', 'Dipok', '0123456789', '0123456789', '2018-10-21 18:00:00', '', 'Mirpur 11', 'https://www.facebook.com/aajob.arup', 'libs/upload_pic/cus_image/8673857565bcfe6a9289ef.jpg', 'libs/upload_pic/cus_image/3986150175bcfe6ce243eb.jpg', 'a', 'admin', 'admin', '2018-10-22 18:00:00', '2018-10-23 18:00:00'),
(7, 'C00006', 'Dipok', '0123456789', '0123456789', '2018-10-21 18:00:00', '', 'Mirpur 11', 'https://www.facebook.com/aajob.arup', 'libs/upload_pic/cus_image/13799468315bceecbd3c744.jpg', '0', 'a', 'admin', 'admin', '2018-10-22 18:00:00', '2018-10-22 18:00:00'),
(8, 'C00007', 'new Customer', '111111111111111', '111111111111111111', '2018-10-26 18:00:00', 'c@gmail.com', 'mirpur 10', 'https://www.facebook.com/', 'libs/upload_pic/cus_image/1160783195bd448821937d.jpg', 'libs/upload_pic/cus_image/20247646295bd44882831bb.jpg', 'a', 'admin', 'admin', '2018-10-26 18:00:00', '2018-10-26 18:00:00');

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
(1, 'Arup Kumer Bose', '2018-10-09', '123456789', '01731909035', 'arup@gmail.com', '2018-10-06 18:00:00', 'mirpur 11', 'mirpur 11', 15000, 'a', 'admin', 'admin', '2018-10-06 18:00:00', '2018-10-06 18:00:00'),
(2, 'Sajat', '1986-04-10', '1234567895452', '01071111141', 'sajat@gmail.com', '2018-05-31 18:00:00', 'mirpur 11', 'mirpur 10', 15000, 'a', 'admin', 'admin', '2018-10-12 18:00:00', '2018-10-12 18:00:00');

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
(1, 'Office Rent', 'O', 'a', 'admin', 'admin', '2018-10-06 18:00:00', '2018-10-06 18:00:00'),
(2, 'LC Opening', 'C', 'a', 'admin', 'admin', '2018-10-06 18:00:00', '2018-10-06 18:00:00'),
(3, 'Car Maintenance ', 'C', 'a', 'admin', 'admin', '2018-10-08 18:00:00', '2018-10-08 18:00:00'),
(4, 'Snacks ', 'O', 'a', 'admin', 'admin', '2018-10-12 18:00:00', '2018-10-12 18:00:00'),
(5, 'Godoun', 'C', 'a', 'admin', 'admin', '2018-10-15 18:00:00', '2018-10-15 18:00:00'),
(6, 'okkk', 'C', 'd', 'admin', 'admin', '2018-10-15 18:00:00', '2018-10-15 18:00:00');

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
  `order_status` char(10) DEFAULT NULL,
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
(1, 1, 1, NULL, 'C-1654714', 'dsafsd', 'fsdafs', 'C0001', 'sdfsdf', '', 'sdfsdf', 'sadfsdf', 'sdafsadf', 'sadfsdf', 'sadfsdf', 300000, 500, 'a', '2018-10-13 04:03:27', 'd', NULL, NULL, '2018-10-07 08:30:53', '2018-10-07 08:30:53'),
(3, 1, 3, NULL, 'sadfsdf', 'dsaf', 'dsfsdf', 'C0002', 'sdafsd', 'fdsfsdf', 'f', 'fasdfsda', 'sadfads', 'asdfsdaf', 'sdfsadf', 9088880, 5000, 'a', '2018-10-13 04:03:27', 'a', NULL, NULL, '2018-10-07 08:30:53', '2018-10-07 08:30:53'),
(4, 1, 1, NULL, 'qqqq', 'dsafsd', 'fsdafs', 'C0003', 'sdfsdf', '', 'sdfsdf', 'sadfsdf', 'sdafsadf', 'sadfsdf', 'sadfsdf', 1800000, 4888, 'c', '2018-10-09 18:00:00', 'a', NULL, NULL, '2018-10-07 08:30:53', '2018-10-07 08:30:53'),
(5, 2, 3, NULL, 'asd', 'sadf', 'sadf', 'C0004', 'dsf', '', 'dsf', 'adsf', 'dsf', 'sdf', 'dsaf', 5000000, 89955, 'c', '2018-10-12 18:00:00', 'a', NULL, 'admin', '2018-10-07 08:30:53', '2018-10-08 18:00:00'),
(8, 4, 3, NULL, 'eer', 'Red', '1255874', 'C0005', 'dsfsdf', '', '', '', 'sdfsdf', 'sdfsdf', 'sdf', 100000, 10000, 'c', '2018-10-12 18:00:00', 'a', 'admin', 'admin', '2018-10-09 18:00:00', '2018-10-09 18:00:00'),
(9, 5, 0, NULL, 'Primo', 'black', '', '', 'O-123654', 'Good Quality', '', 'A', 'Classic', '2014', '50000', 500000, 10000, 'p', '2018-10-13 09:40:00', 'a', 'admin', 'admin', '2018-10-12 18:00:00', '2018-10-12 18:00:00'),
(10, 5, 4, NULL, 'X-corola', 'Brown', '6528', '859746513', 'C-0015', '', 'good', 'B', 'Good', '2008', '100000', 2000000, 50000, 'a', '2018-10-13 09:43:08', 'a', 'admin', 'admin', '2018-10-12 18:00:00', '2018-10-12 18:00:00'),
(11, 6, 4, NULL, '', '', '32324', '234234', 'R444444', '', 'rer', 'erer', 'erer', '2010', '10000000', 1800000, 50000, 'a', '2018-10-23 09:40:37', 'a', 'admin', 'admin', '2018-10-22 18:00:00', '2018-10-27 09:35:01'),
(12, 7, 4, 2, '', '', '34324324', '32423432423', 'R444444', '', 'rer', 'erer', 'erer', '2010', '10000000', 1800000, 50000, 'a', '2018-10-23 09:41:17', 'a', 'admin', 'admin', '2018-10-22 18:00:00', '2018-10-25 09:37:01'),
(13, 8, 0, 1, 'fsdf', 'dfdf', '232323', '4442323', 'O-333', '', 'oooo', 'dsfsd', 'fdfdsf', 'dsfsd', 'fdsfdsf', 1500000, 50000, 'c', '2018-10-16 18:00:00', 'a', 'admin', 'admin', '2018-10-26 18:00:00', '2018-10-27 11:29:34'),
(14, 1, 0, 3, 'dsfsdf', 'sdfsd', 'fsdf', '', 'O-3654', '', 'sdfdsf', 'sdf', 'sdfsdf', 'sdfsdf', 'sdf', 5000000, 200000, 'p', '2018-10-27 11:24:19', 'a', 'admin', 'admin', '2018-10-26 18:00:00', '2018-10-27 11:26:45');

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
(1, 'CP-00001', 'CP', 1, 10, 4, 4, '2018-10-15 18:00:00', 10000, 'cash', 'a', 'admin', 'admin', '2018-10-16 09:42:16', '2018-10-16 09:42:16'),
(2, 'CP-00002', 'CP', 2, 3, 3, 4, '2018-10-09 18:00:00', 15454, 'okkk', 'd', 'admin', 'admin', '2018-10-16 09:44:59', '2018-10-21 07:45:16'),
(3, 'OP-00001', 'OP', NULL, NULL, NULL, 4, '2018-10-20 18:00:00', 56556, 'cash', 'a', 'admin', 'admin', '2018-10-21 06:27:35', '2018-10-21 06:27:35'),
(4, 'OP-00002', 'OP', NULL, NULL, NULL, 4, '2018-10-20 18:00:00', 50, 'cash', 'a', 'admin', 'admin', '2018-10-21 06:29:17', '2018-10-21 06:29:17'),
(5, 'OP-00003', 'OP', NULL, NULL, NULL, 4, '2018-10-02 18:00:00', 65, '', 'd', 'admin', 'admin', '2018-10-21 06:30:58', '2018-10-21 06:30:58'),
(6, 'OP-00004', 'OP', NULL, NULL, NULL, 1, '2018-10-08 18:00:00', 50000, 'cash', 'a', 'admin', 'admin', '2018-10-21 06:34:42', '2018-10-21 07:11:43'),
(7, 'CP-00003', 'CP', 2, 10, 4, 3, '2018-10-20 18:00:00', 50000, '', 'a', 'admin', 'admin', '2018-10-21 10:44:31', '2018-10-21 10:44:31');

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `id` int(20) UNSIGNED NOT NULL,
  `supplier_id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(20) UNSIGNED DEFAULT NULL,
  `order_id` int(20) UNSIGNED DEFAULT NULL,
  `puc_lc_id` int(20) UNSIGNED DEFAULT NULL,
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
  `total_price` int(10) UNSIGNED DEFAULT NULL,
  `transport_id` int(20) UNSIGNED DEFAULT NULL COMMENT 'transport table last id',
  `car_status` smallint(6) UNSIGNED DEFAULT NULL,
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
(1, 2, 8, 13, 3, 'fsdf', 'dfdf', '232323', '4442323', NULL, 'dsfsd', 'fdfdsf', 'dsfsd', 'fdsfdsf', 'fdsfsdf', 205000, 2, 1, 'a', 'admin', 'admin', '2018-10-24 18:00:00', '2018-10-24 18:00:00'),
(2, 2, 7, 12, 4, 'dfasdfsf', 'dsfsdf', '34324324', '32423432423', 'gffgf', 'erer', 'erer', '2010', '10000000', 'fgdgdsg', 105, NULL, 0, 'd', 'admin', 'admin', '2018-10-24 18:00:00', '2018-10-25 09:37:01'),
(3, 2, 1, 14, 4, 'dsfsdf', 'sdfsd', 'fsdf', 'sdfsd', 'sdfdsf', 'sdf', 'sdfsdf', 'sdfsdf', 'sdf', 'dsfsdf', 327567, 1, 0, 'a', 'admin', 'admin', '2018-10-26 18:00:00', '2018-10-26 18:00:00'),
(4, 1, 6, 11, 4, 'fgdfgd', 'fdgdfg', '32324', '234234', 'rer', 'erer', 'erer', '2010', '10000000', 'dfdf', 34720201, 3, 0, 'a', 'admin', 'admin', '2018-10-26 18:00:00', '2018-10-26 18:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_pricing`
--

CREATE TABLE `purchase_pricing` (
  `id` int(30) UNSIGNED NOT NULL,
  `purchase_id` int(20) DEFAULT NULL,
  `head_id` int(20) DEFAULT NULL,
  `amount` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `purchase_pricing`
--

INSERT INTO `purchase_pricing` (`id`, `purchase_id`, `head_id`, `amount`) VALUES
(1, 1, 5, 35000),
(2, 1, 3, 40000),
(3, 1, 5, 50000),
(4, 1, 2, 80000),
(10, 2, 2, 45),
(11, 2, 3, 10),
(12, 2, 5, 50),
(13, 3, 5, 324234),
(14, 3, 3, 3333),
(15, 4, 5, 33333),
(16, 4, 3, 343434),
(17, 4, 2, 34343434);

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
(1, 2, 4, '2018-10-14 18:00:00', 5000, 0, 'a', 'admin', 'admin', '2018-10-14 18:00:00', '2018-10-14 18:00:00'),
(2, 2, 4, '2018-10-14 18:00:00', 5000, 0, 'a', 'admin', 'admin', '2018-10-14 18:00:00', '2018-10-14 18:00:00'),
(3, 1, 4, '2018-10-09 18:00:00', 4000, 0, 'a', 'admin', 'admin', '2018-10-14 18:00:00', '2018-10-14 18:00:00'),
(4, 2, 4, '2018-10-14 18:00:00', 1000, 0, 'a', 'admin', 'admin', '2018-10-14 18:00:00', '2018-10-14 18:00:00'),
(5, 2, 4, '2018-10-14 18:00:00', 500, 0, 'a', 'admin', 'admin', '2018-10-14 18:00:00', '2018-10-14 18:00:00'),
(6, 1, 4, '2018-10-12 18:00:00', 5000, 0, 'a', 'admin', 'admin', '2018-10-14 18:00:00', '2018-10-14 18:00:00'),
(7, 1, 4, '2018-10-14 18:00:00', 5000, 0, 'a', 'admin', 'admin', '2018-10-14 18:00:00', '2018-10-14 18:00:00'),
(8, 2, 4, '2018-10-14 18:00:00', 3500, 0, 'd', 'admin', 'admin', '2018-10-14 18:00:00', '2018-10-14 18:00:00'),
(9, 2, 4, '2018-10-01 18:00:00', 3500, 0, 'a', 'admin', 'admin', '2018-10-14 18:00:00', '2018-10-14 18:00:00');

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
(1, 2018, 10, 'note', 'a', 'admin', 'admin', '2018-10-13 18:00:00', '2018-10-13 18:00:00'),
(2, 2018, 11, '', 'a', 'admin', 'admin', '2018-10-13 18:00:00', '2018-10-13 18:00:00'),
(3, 2018, 12, '', 'a', 'admin', 'admin', '2018-10-13 18:00:00', '2018-10-13 18:00:00'),
(4, 2018, 10, 'note', 'a', 'admin', 'admin', '2018-10-13 18:00:00', '2018-10-13 18:00:00'),
(5, 2018, 7, 'note', 'a', 'admin', 'admin', '2018-10-13 18:00:00', '2018-10-13 18:00:00');

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
(1, 'S00001', 'arup', '01731909035', 'arup@gmail.com', '2018-10-09 18:00:00', 'na', 'mirpur 10', 'a', 'admin', 'admin', '2018-10-15 18:00:00', '2018-10-15 18:00:00'),
(2, 'S00002', 'joy', '1111111', '', '2018-10-15 18:00:00', 'no', 'dhaka', 'a', 'admin', 'admin', '2018-10-15 18:00:00', '2018-10-15 18:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lcs`
--

CREATE TABLE `tbl_lcs` (
  `id` int(20) UNSIGNED NOT NULL,
  `lc_no` varchar(250) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `lc_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lc_note` text,
  `status` char(5) DEFAULT NULL,
  `created_by` varchar(250) DEFAULT NULL,
  `updated_by` varchar(250) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_lcs`
--

INSERT INTO `tbl_lcs` (`id`, `lc_no`, `bank_name`, `lc_date`, `lc_note`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, '1212432434', 'DBBL', '2018-10-01 18:00:00', 'new lc', 'a', NULL, NULL, '2018-10-07 08:32:02', '2018-10-07 08:32:02'),
(2, '3543453254', 'Rupaly', '2018-09-30 18:00:00', 'fdgsdfg', 'a', NULL, NULL, '2018-10-07 08:32:02', '2018-10-07 08:32:02'),
(3, '544523453245', 'Sonaly Bank', '2018-09-30 18:00:00', 'fdfddsf', 'a', NULL, NULL, '2018-10-07 08:32:02', '2018-10-07 08:32:02'),
(4, '869543587156', 'Rupaly', '2018-10-09 18:00:00', 'Cash', 'a', 'admin', 'admin', '2018-10-12 18:00:00', '2018-10-12 18:00:00');

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
(1, 3, 1, '2018-10-26 18:00:00', 'admin', 'admin', '2018-10-26 18:00:00', '2018-10-26 18:00:00'),
(2, 1, 1, '2018-10-24 18:00:00', 'admin', 'admin', '2018-10-26 18:00:00', '2018-10-26 18:00:00'),
(3, 4, 1, '2018-10-26 18:00:00', 'admin', 'admin', '2018-10-26 18:00:00', '2018-10-26 18:00:00');

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
(1, 'Dhaka', 'a'),
(2, 'Japan', 'a'),
(3, 'Japan Port', 'a'),
(4, 'In Ship', 'a'),
(5, 'Chittagong Port', 'a'),
(6, 'In Garage', 'a');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `collections`
--
ALTER TABLE `collections`
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
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `collections`
--
ALTER TABLE `collections`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `create_admin`
--
ALTER TABLE `create_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ie_heads`
--
ALTER TABLE `ie_heads`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `months`
--
ALTER TABLE `months`
  MODIFY `id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `purchase_pricing`
--
ALTER TABLE `purchase_pricing`
  MODIFY `id` int(30) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `salaries`
--
ALTER TABLE `salaries`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `sallay_months`
--
ALTER TABLE `sallay_months`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `trans_heads`
--
ALTER TABLE `trans_heads`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
