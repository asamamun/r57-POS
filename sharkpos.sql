-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2024 at 07:02 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sharkpos`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `account_number` varchar(50) NOT NULL,
  `balance` decimal(20,2) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `name`, `account_number`, `balance`, `created`, `deleted`) VALUES
(1, 'Cash', '01629999666', 4237.00, '2022-06-26 09:11:10', NULL),
(2, 'Rocket', '01629999666', -790596.00, '2022-06-26 09:11:28', NULL),
(3, 'DBBL', '2161030284757', -2176037930.00, '2022-06-26 09:12:15', NULL),
(4, 'Bkash', '', -2621739789.00, '2022-06-29 10:31:14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created`, `deleted`) VALUES
(1, 'Fruits', '2022-06-20 20:19:39', NULL),
(2, 'Kids', '2022-06-20 20:19:39', NULL),
(3, 'Grocery', '2022-06-27 11:10:23', NULL),
(4, 'Electronics', '2022-07-23 11:04:59', NULL),
(5, 'Footwear', '2022-07-23 11:05:12', NULL),
(6, 'Eyewear', '2022-07-23 11:05:16', NULL),
(7, 'Accessories', '2022-07-23 11:05:49', NULL),
(8, 'Art&Draft', '2022-07-23 11:06:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(150) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `expense` decimal(20,2) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `mobile`, `address`, `expense`, `created`, `deleted`) VALUES
(1, 'Adnan', 'adnan@gmail.com', '01812345678', 'Mirpur', 0.00, '2022-06-19 21:08:52', NULL),
(2, 'Tamimul Islam', 'tamimislam732@gmail.com', '01911151732', 'Savar, Dhaka', 0.00, '2022-06-19 21:08:52', NULL),
(3, 'Syed Zayed Hosssain', 'php.zayed@gmail.com', '01629999666', 'Manikdi, Dhaka Cantonment, Dhaka-1206', 0.00, '2022-06-19 21:10:34', NULL),
(4, 'Tasnim Al Rahman', 'tasnim333@gmail.com', '01712345678', 'Mirpur, Dhaka-1216', 0.00, '2022-06-19 21:10:34', NULL),
(5, 'Al-Amin', 'alamin@gmail.com', '01912345678', 'Mirpur', 0.00, '2022-06-20 16:38:47', NULL),
(7, 'Dider', 'Dider@gmail.com', '01670270102', 'Cumilla', 0.00, '2022-07-23 12:51:23', NULL),
(8, 'Shahadat', 'shahadat@gmail.com', '01670270987', 'Cumilla,Cantonment', 0.00, '2022-07-23 12:52:55', NULL),
(9, 'Sarwar', 'sarwar@gmail.com', '01670270156', 'Burichong, Cumilla', 10.00, '2022-07-23 12:54:14', NULL),
(10, 'Siam', 'siam@gmail.com', '01370270198', 'Mirpur 6', 0.00, '2022-07-23 12:55:11', NULL),
(11, 'Mufazzal', 'mufazzal@gmai.com', '01570270122', 'Kandirpar, Cumilla', 0.00, '2022-07-23 12:56:33', NULL),
(12, 'Tuhin', 'tuhin@gmail.com', '0163302654', 'mizdi, noakhali', 0.00, '2022-07-23 12:57:22', NULL),
(14, 'Tanzil', 'tanzil@gmail.com', '01770270880', 'mizdi, noakhali', 0.00, '2022-07-23 12:58:12', NULL),
(15, 'Imran', 'imran@gmail.com', '0156987456', 'Cumilla', 0.00, '2022-07-23 12:59:06', NULL),
(16, 'shoruv', 'shoruv@gmail.com', '01570270521', 'chapapur, cumilla', 0.00, '2022-07-23 13:02:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `eid` int(11) NOT NULL,
  `frist_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `contact` varchar(11) NOT NULL,
  `address` varchar(150) NOT NULL,
  `join_date` date NOT NULL,
  `post` varchar(30) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `salary` float NOT NULL,
  `delete_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `payment_type` int(2) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `name`, `amount`, `payment_type`, `created`, `deleted`) VALUES
(1, 'Breakfast', 185.00, 1, '2022-06-20 21:52:01', NULL),
(2, 'Lunch', 430.00, 1, '2022-06-20 21:52:15', NULL),
(3, 'Labour Cost', 1500.00, 3, '2022-06-20 21:52:25', NULL),
(4, 'Transport Cost', 3200.00, 2, '2022-06-20 21:52:52', NULL),
(5, 'Dinner', 340.00, 3, '2022-07-04 19:35:30', NULL),
(6, 'Breakfast', 220.00, 0, '2022-07-04 19:39:29', NULL),
(7, 'Repair cost', 250.00, 1, '2022-07-23 11:09:46', NULL),
(8, 'Light Cost', 200.00, 4, '2022-07-23 11:10:38', NULL),
(9, 'Rent', 50000.00, 3, '2022-07-23 12:27:59', NULL),
(10, 'Payroll', 20000.00, 4, '2022-07-23 12:28:29', NULL),
(11, 'Property taxes', 12000.00, 4, '2022-07-23 12:29:02', NULL),
(12, 'Utility costs', 4444.00, 4, '2022-07-23 12:29:25', NULL),
(13, 'Office supplies', 5000.00, 4, '2022-07-23 12:29:47', NULL),
(14, 'Advertising', 3000.00, 4, '2022-07-23 12:30:07', NULL),
(15, 'Travel costs', 6000.00, 4, '2022-07-23 12:30:37', NULL),
(16, 'Store fixtures', 15000.00, 4, '2022-07-23 12:31:15', NULL),
(17, 'Equipment and technology', 30000.00, 4, '2022-07-23 12:31:39', NULL),
(18, 'Internet Bill', 1000.00, 1, '2022-07-23 12:32:16', NULL),
(19, 'Business insurance', 5000.00, 3, '2022-07-23 12:32:39', NULL),
(20, 'Janitorial supplies and services.', 1800.00, 4, '2022-07-23 12:33:16', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `total_tax` decimal(8,2) DEFAULT NULL,
  `discount` decimal(10,2) NOT NULL,
  `pay_amount` decimal(10,2) NOT NULL,
  `comment` varchar(512) NOT NULL,
  `payment_type` int(2) NOT NULL,
  `trxid` varchar(30) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `customer_id`, `total`, `total_tax`, `discount`, `pay_amount`, `comment`, `payment_type`, `trxid`, `created`, `updated`) VALUES
(159, 1, 300.00, 15.00, 0.00, 315.00, 'wwwwwwwwww', 4, 'wwwwwwwwwww', '2024-02-21 19:23:04', NULL),
(160, 1, 145.00, 7.25, 0.00, 152.00, '', 1, '', '2024-02-21 19:44:38', NULL),
(161, 1, 1000.00, 50.00, 10.50, 1040.00, '', 1, '', '2024-02-21 20:21:47', NULL),
(162, 1, 60.00, 3.00, 0.00, 63.00, '', 1, '', '2024-02-22 03:50:09', NULL),
(163, 1, 180.00, 9.00, 0.00, 189.00, '', 1, '', '2024-02-22 03:52:21', NULL),
(164, 1, 270.00, 13.50, 0.00, 284.00, '', 1, '', '2024-02-22 04:10:34', NULL),
(165, 1, 270.00, 13.50, 0.00, 284.00, '', 1, '', '2024-02-22 05:53:39', NULL),
(166, 1, 270.00, 13.50, 0.00, 284.00, '', 1, '', '2024-02-22 06:13:08', NULL),
(167, 1, 90.00, 4.50, 0.00, 95.00, '', 1, '', '2024-02-22 06:18:02', NULL),
(168, 1, 90.00, 4.50, 0.00, 95.00, '', 1, '', '2024-02-22 06:18:11', NULL),
(169, 1, 90.00, 4.50, 0.00, 95.00, '', 1, '', '2024-02-22 06:18:25', NULL),
(170, 1, 180.00, 9.00, 0.00, 189.00, '', 1, '', '2024-02-22 06:21:25', NULL),
(171, 1, 180.00, 9.00, 0.00, 189.00, '', 1, '', '2024-02-22 06:21:30', NULL),
(172, 1, 360.00, 18.00, 0.00, 378.00, '', 1, '', '2024-02-22 06:28:11', NULL),
(173, 1, 360.00, 18.00, 0.00, 378.00, '', 1, '', '2024-02-22 06:29:53', NULL),
(174, 1, 360.00, 18.00, 0.00, 378.00, '', 1, '', '2024-02-22 06:30:26', NULL),
(175, 1, 180.00, 9.00, 0.00, 189.00, '', 1, '', '2024-02-22 06:30:41', NULL),
(176, 1, 180.00, 9.00, 0.00, 189.00, '', 1, '', '2024-02-22 06:30:57', NULL),
(177, 1, 90.00, 4.50, 0.00, 95.00, '', 1, '', '2024-02-22 06:31:41', NULL),
(178, 1, 180.00, 9.00, 0.00, 189.00, '', 1, '', '2024-02-22 06:31:53', NULL),
(179, 1, 90.00, 4.50, 0.00, 95.00, '', 1, '', '2024-02-22 06:32:32', NULL),
(180, 1, 180.00, 9.00, 0.00, 189.00, '', 1, '', '2024-02-22 06:32:41', NULL),
(181, 1, 90.00, 4.50, 0.00, 95.00, '', 1, '', '2024-02-22 06:33:02', NULL),
(182, 1, 180.00, 9.00, 0.00, 189.00, '', 1, '', '2024-02-22 06:41:59', NULL),
(183, 1, 180.00, 9.00, 0.00, 189.00, '', 1, '', '2024-02-22 06:42:46', NULL),
(184, 1, 180.00, 9.00, 0.00, 189.00, '', 1, '', '2024-02-22 06:46:35', NULL),
(185, 1, 360.00, 18.00, 0.00, 378.00, '', 1, '', '2024-02-22 06:47:44', NULL),
(186, 1, 180.00, 9.00, 0.00, 189.00, '', 1, '', '2024-02-22 06:48:23', NULL),
(187, 1, 180.00, 9.00, 0.00, 189.00, '', 1, '', '2024-02-22 07:10:28', NULL),
(188, 1, 506.00, 25.30, 0.00, 531.00, '', 1, '', '2024-02-22 07:19:40', NULL),
(189, 1, 300.00, 15.00, 0.00, 315.00, '', 1, '', '2024-02-24 06:01:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `invoicedetails`
--

CREATE TABLE `invoicedetails` (
  `id` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` decimal(5,2) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `invoicedetails`
--

INSERT INTO `invoicedetails` (`id`, `invoice_id`, `product_id`, `quantity`, `price`, `total`, `created`) VALUES
(167, 159, 1, 5.00, 60.00, 300.00, '2024-02-21 19:23:04'),
(168, 160, 6, 1.00, 145.00, 145.00, '2024-02-21 19:44:38'),
(169, 161, 11, 1.00, 1000.00, 1000.00, '2024-02-21 20:21:47'),
(170, 162, 1, 1.00, 60.00, 60.00, '2024-02-22 03:50:09'),
(171, 163, 1, 1.00, 60.00, 60.00, '2024-02-22 03:52:21'),
(172, 163, 1, 1.00, 60.00, 60.00, '2024-02-22 03:52:21'),
(173, 163, 1, 1.00, 60.00, 60.00, '2024-02-22 03:52:21'),
(174, 164, 2, 1.00, 90.00, 90.00, '2024-02-22 04:10:34'),
(175, 164, 2, 1.00, 90.00, 90.00, '2024-02-22 04:10:34'),
(176, 164, 2, 1.00, 90.00, 90.00, '2024-02-22 04:10:34'),
(177, 165, 2, 1.00, 90.00, 90.00, '2024-02-22 05:53:39'),
(178, 165, 2, 1.00, 90.00, 90.00, '2024-02-22 05:53:39'),
(179, 165, 2, 1.00, 90.00, 90.00, '2024-02-22 05:53:39'),
(180, 166, 2, 1.00, 90.00, 90.00, '2024-02-22 06:13:08'),
(181, 166, 2, 1.00, 90.00, 90.00, '2024-02-22 06:13:08'),
(182, 166, 2, 1.00, 90.00, 90.00, '2024-02-22 06:13:08'),
(183, 167, 2, 1.00, 90.00, 90.00, '2024-02-22 06:18:02'),
(184, 168, 2, 1.00, 90.00, 90.00, '2024-02-22 06:18:11'),
(185, 169, 2, 1.00, 90.00, 90.00, '2024-02-22 06:18:26'),
(186, 170, 2, 2.00, 90.00, 180.00, '2024-02-22 06:21:25'),
(187, 171, 2, 2.00, 90.00, 180.00, '2024-02-22 06:21:30'),
(188, 172, 2, 1.00, 90.00, 90.00, '2024-02-22 06:28:11'),
(189, 172, 2, 1.00, 90.00, 90.00, '2024-02-22 06:28:11'),
(190, 172, 2, 1.00, 90.00, 90.00, '2024-02-22 06:28:11'),
(191, 172, 2, 1.00, 90.00, 90.00, '2024-02-22 06:28:11'),
(192, 173, 2, 4.00, 90.00, 360.00, '2024-02-22 06:29:53'),
(193, 174, 2, 1.00, 90.00, 90.00, '2024-02-22 06:30:26'),
(194, 174, 2, 1.00, 90.00, 90.00, '2024-02-22 06:30:26'),
(195, 174, 2, 1.00, 90.00, 90.00, '2024-02-22 06:30:26'),
(196, 174, 2, 1.00, 90.00, 90.00, '2024-02-22 06:30:26'),
(197, 175, 2, 1.00, 90.00, 90.00, '2024-02-22 06:30:41'),
(198, 175, 2, 1.00, 90.00, 90.00, '2024-02-22 06:30:41'),
(199, 176, 2, 2.00, 90.00, 180.00, '2024-02-22 06:30:57'),
(200, 177, 2, 1.00, 90.00, 90.00, '2024-02-22 06:31:41'),
(201, 178, 2, 1.00, 90.00, 90.00, '2024-02-22 06:31:53'),
(202, 178, 2, 1.00, 90.00, 90.00, '2024-02-22 06:31:53'),
(203, 179, 2, 1.00, 90.00, 90.00, '2024-02-22 06:32:32'),
(204, 180, 2, 2.00, 90.00, 180.00, '2024-02-22 06:32:41'),
(205, 181, 2, 1.00, 90.00, 90.00, '2024-02-22 06:33:02'),
(206, 182, 2, 1.00, 90.00, 90.00, '2024-02-22 06:41:59'),
(207, 182, 2, 1.00, 90.00, 90.00, '2024-02-22 06:41:59'),
(208, 183, 2, 1.00, 90.00, 90.00, '2024-02-22 06:42:46'),
(209, 183, 2, 1.00, 90.00, 90.00, '2024-02-22 06:42:46'),
(210, 184, 2, 1.00, 90.00, 90.00, '2024-02-22 06:46:35'),
(211, 184, 2, 1.00, 90.00, 90.00, '2024-02-22 06:46:35'),
(212, 185, 2, 1.00, 90.00, 90.00, '2024-02-22 06:47:44'),
(213, 185, 2, 1.00, 90.00, 90.00, '2024-02-22 06:47:44'),
(214, 185, 2, 1.00, 90.00, 90.00, '2024-02-22 06:47:44'),
(215, 185, 2, 1.00, 90.00, 90.00, '2024-02-22 06:47:44'),
(216, 186, 2, 1.00, 90.00, 90.00, '2024-02-22 06:48:23'),
(217, 186, 2, 1.00, 90.00, 90.00, '2024-02-22 06:48:23'),
(218, 187, 2, 2.00, 90.00, 180.00, '2024-02-22 07:10:28'),
(219, 188, 2, 1.00, 90.00, 90.00, '2024-02-22 07:19:40'),
(220, 188, 3, 1.00, 96.00, 96.00, '2024-02-22 07:19:40'),
(221, 188, 4, 1.00, 320.00, 320.00, '2024-02-22 07:19:40'),
(222, 189, 1, 4.00, 60.00, 240.00, '2024-02-24 06:01:09'),
(223, 189, 1, 1.00, 60.00, 60.00, '2024-02-24 06:01:09');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` decimal(5,2) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `nettotal` decimal(10,2) NOT NULL,
  `discount` decimal(10,2) NOT NULL,
  `grandtotal` decimal(10,2) NOT NULL,
  `comment` varchar(512) NOT NULL,
  `payment_type` int(2) NOT NULL,
  `trxid` varchar(30) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `barcode` varchar(30) NOT NULL,
  `name` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `wholesale_price` decimal(20,2) NOT NULL,
  `retail_price` decimal(20,2) NOT NULL,
  `purchase_price` decimal(20,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `description` varchar(500) NOT NULL,
  `tax` decimal(5,2) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `barcode`, `name`, `company_name`, `category_id`, `supplier_id`, `wholesale_price`, `retail_price`, `purchase_price`, `quantity`, `description`, `tax`, `created`, `deleted`) VALUES
(1, '1111', 'Lengra Mango (kg)', 'AZ Agro Ltd.', 1, 1, 50.00, 60.00, 35.00, 95, 'Fresh fruits', 0.00, '2022-06-20 20:48:55', NULL),
(2, '1222', 'Himsagar Mango (kg)', 'Confident Mart Ltd.', 1, 4, 75.00, 90.00, 50.00, 5025, 'Fresh Fruits', 5.00, '2022-06-20 20:48:55', NULL),
(3, '3333', 'Teer 1 Litre pack soyabin oil', 'Teer', 3, 5, 90.00, 96.00, 85.00, 1877, 'lorem ipsum', 0.00, '2022-06-27 11:12:02', NULL),
(4, '2222', 'Aarong Ghee (200gm)', 'Aarong', 3, 4, 280.00, 320.00, 260.00, 2380, 'Aarong ghee', 0.00, '2022-07-04 18:45:26', NULL),
(5, '9833224', 'Fresh Soyabin Oil Poly Pack 1ltr', 'Fresh', 3, 5, 185.00, 197.00, 170.00, 6226, 'Fresh Soyabin Oil Poly', 0.00, '2022-07-04 18:46:43', NULL),
(6, '8593133', 'Kishwan Mustard Oil (500ml)', 'Kishwan', 3, 1, 136.00, 145.00, 120.00, 8348, 'Kishwan Mustard Oil', 0.00, '2022-07-04 18:48:00', NULL),
(7, '666655', 'Rayban Sunglass', 'Rayban', 6, 7, 2100.00, 2200.00, 1700.00, 1949, 'Super Quality', 7.50, '2022-07-23 11:15:15', NULL),
(8, '001122', 'Police Sunglass', 'Police', 6, 7, 2500.00, 2000.00, 3000.00, 95, 'Good Product', 7.50, '2022-07-23 11:16:05', NULL),
(9, '555511', 'Parada Sunglass', 'Parada', 6, 7, 1500.00, 1600.00, 1300.00, 1492, 'Nice', 7.50, '2022-07-23 11:16:40', NULL),
(10, '666633', 'Gucci Sunglass', 'Gucci', 6, 7, 1700.00, 1800.00, 1500.00, 120, 'Super', 7.50, '2022-07-23 11:17:36', NULL),
(11, '4567893', 'Footwear', 'Levo', 5, 13, 1500.00, 1000.00, 2000.00, 2244, 'Good', 4.00, '2022-07-23 11:18:30', NULL),
(12, '00112322', 'Electronics', 'Iphone', 4, 6, 120000.00, 125000.00, 150000.00, 37820, '', 15.00, '2022-07-23 12:17:26', NULL),
(13, '6666660', 'Orange', 'Orange', 1, 8, 300.00, 250.00, 220.00, 180571, 'Fresh', 2.00, '2022-07-23 12:24:20', NULL),
(14, '5555551', 'Footwear', 'Sachi', 5, 11, 2400.00, 2500.00, 2200.00, 689, '', 4.00, '2022-07-23 12:25:22', NULL),
(15, '2012364', 'Electronics', 'Nokia', 4, 9, 18000.00, 15000.00, 14000.00, 10, '', 7.50, '2022-07-23 12:26:34', NULL),
(17, '63455988', 'Papaya', 'Habib', 1, 3, 200.00, 380.00, 300.00, 16500, '', 0.00, '2022-07-23 12:28:10', NULL),
(18, '5555552', 'Electronics', 'Anker', 4, 6, 7000.00, 5000.00, 4000.00, 10, '', 7.50, '2022-07-23 12:28:12', NULL),
(19, '7543567', 'Guava', 'nasir', 1, 11, 400.00, 480.00, 450.00, 97920, '', 0.00, '2022-07-23 12:29:40', NULL),
(20, '1236656498', 'aquafina', 'pran', 1, 8, 15.00, 20.00, 12.00, 117, 'add some details', 10.00, '2022-07-23 12:33:33', NULL),
(21, '5635', 'Grape', 'jakir', 1, 12, 700.00, 900.00, 670.00, 814936, '', 0.00, '2022-07-23 12:34:48', NULL),
(22, '4565465', 'Banana', 'Belal', 1, 8, 100.00, 150.00, 90.00, 5890, '', 0.00, '2022-07-23 12:37:57', NULL),
(23, '4576456', 'TV', 'Tarikh', 4, 8, 50000.00, 108000.00, 45000.00, 70, '', 0.00, '2022-07-23 12:40:19', NULL),
(24, '67537642                      ', 'PC', 'Parvez', 4, 1, 1100000.00, 1244000.00, 550000.00, 29, '', 0.00, '2022-07-23 12:49:21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(150) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `email`, `mobile`, `address`, `created`, `deleted`) VALUES
(1, 'Arif Khan', 'arif@gmail.com', '01911223344', 'Manikdi, Dhaka Cantonment', '2022-06-20 19:33:48', '2022-07-23 11:11:34'),
(2, 'Md Jony', 'jony@gmail.com', '01911151733', 'Matikata, Dhaka Cantonment', '2022-06-20 19:33:48', '2022-07-23 11:11:40'),
(3, 'Akib Khan', 'akib@gmail.com', '01711223311', 'Chittagong', '2022-06-20 19:56:16', '2022-07-23 11:11:30'),
(4, 'Rony Hossain', 'rony@gmail.com', '01987654312', 'Mohakhali', '2022-06-20 19:58:52', '2022-07-23 11:11:45'),
(5, 'Tamim Hossain', 'tamim@gmail.com', '01988383332', 'Dhaka', '2022-06-20 21:22:27', NULL),
(6, 'Mohsin', 'mohsin@gmail.com', '01733026660', 'Ecb', '2022-07-23 11:06:48', NULL),
(7, 'Bahar', 'bahar@gmail.com', '01670270122', 'Mirpur', '2022-07-23 11:07:22', NULL),
(8, 'Zayed Molla', 'mollazayed@gmail.com', '01670270666', 'Manikdi', '2022-07-23 11:07:59', NULL),
(9, 'Irin Akter Kajol', 'kajol_irin@gmailo.com', '01670270554', 'Pollobi', '2022-07-23 11:09:12', NULL),
(10, 'Shariful Islam', 'shariful@gmail.com', '01670270321', 'Mirpur', '2022-07-23 11:10:29', NULL),
(11, 'Ibrahim ', 'Ibrahim@gmail.com', '01670270222', 'Kazipara', '2022-07-23 11:11:00', NULL),
(12, 'Adnan Hossine', 'adnan@gmail.com', '01670270250', 'Malibag', '2022-07-23 11:12:34', NULL),
(13, 'Apple Mahammud Umer', 'apple@gmail.com', '016702700029', 'Shewrapara', '2022-07-23 11:13:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` tinyint(4) NOT NULL DEFAULT 1,
  `branch_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `branch_id`, `created_at`, `deleted_at`) VALUES
(24, 'mr admin', 'admin@gmail.com', '$2y$10$C2xP/6vlwfm4lc7H49Bhvuq3RbdluThyiibODwM.bNDr2YhQ.PCz2', 2, NULL, '2024-02-21 20:14:04', NULL),
(25, 'mr.  user', 'user@gmail.com', '$2y$10$5hY3xUIVRZ/ivjV24T.PKOx7mD/uQ/8QJxHyxmSvOOdBR8680IaRi', 1, NULL, '2024-02-21 20:14:31', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mobile` (`mobile`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`eid`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoicedetails`
--
ALTER TABLE `invoicedetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `barcode` (`barcode`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `supplier_id` (`supplier_id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `eid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=190;

--
-- AUTO_INCREMENT for table `invoicedetails`
--
ALTER TABLE `invoicedetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=224;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
