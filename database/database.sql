-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2023 at 02:34 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myapi`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `id_address` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `user_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`id_address`, `address`, `user_id`) VALUES
(1, 'd1 islamic arcade main university road', 2);

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` text DEFAULT NULL,
  `role` int(11) NOT NULL,
  `added_on` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `mobile`, `username`, `password`, `role`, `added_on`) VALUES
(1, '3357467403', 'admin', 'admin', 1, '2023-01-26 21:46:36'),
(2, '923357467403', 'samad', 'samad', 1, '2023-01-26 23:03:52');

-- --------------------------------------------------------

--
-- Table structure for table `apikey`
--

CREATE TABLE `apikey` (
  `id` int(11) NOT NULL,
  `apikey` varchar(255) DEFAULT NULL,
  `hit` varchar(255) DEFAULT NULL,
  `hitlimit` varchar(255) DEFAULT NULL,
  `expirydate` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `apikey`
--

INSERT INTO `apikey` (`id`, `apikey`, `hit`, `hitlimit`, `expirydate`, `status`) VALUES
(1, 'avdfheuw23', '23', '120', '2032-01-01 21:26:32', '1');

-- --------------------------------------------------------

--
-- Table structure for table `assignorder`
--

CREATE TABLE `assignorder` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `deliveryboyid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assignorder`
--

INSERT INTO `assignorder` (`id`, `order_id`, `deliveryboyid`) VALUES
(1, 1, 1),
(2, 2, 1),
(5, 5, 2),
(6, 3, 3),
(7, 6, 1),
(8, 7, 1),
(9, 8, 1),
(10, 4, 1),
(11, 20, 1),
(12, 35, 1),
(13, 36, 3),
(14, 37, 1),
(15, 39, 2),
(16, 41, 2),
(17, 42, 2),
(18, 40, 2),
(19, 43, 2),
(20, 45, 2),
(21, 53, 2),
(22, 53, 3),
(23, 54, 3),
(24, 56, 3),
(25, 57, 3),
(26, 58, 3),
(27, 59, 3),
(28, 60, 3),
(29, 61, 3),
(30, 62, 3),
(31, 63, 3),
(32, 64, 3),
(33, 65, 3),
(34, 67, 3),
(35, 68, 3),
(36, 72, 3),
(37, 71, 3),
(38, 69, 3),
(39, 70, 3),
(40, 73, 3),
(41, 75, 3),
(42, 74, 3),
(43, 76, 3),
(44, 82, 3),
(45, 81, 3),
(46, 80, 3),
(47, 79, 3),
(48, 78, 3),
(49, 77, 3),
(50, 84, 3),
(51, 83, 3),
(52, 85, 3),
(53, 86, 3),
(54, 87, 3),
(55, 88, 3);

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `productID` int(11) DEFAULT NULL,
  `userType` varchar(255) DEFAULT NULL,
  `qty` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `ip_add` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `couponcodes`
--

CREATE TABLE `couponcodes` (
  `coupon_id` int(11) NOT NULL,
  `coupon_code` varchar(255) NOT NULL,
  `max_discount` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `min_cart_value` int(11) NOT NULL,
  `discount_type` enum('perc','value','deliveryoff') NOT NULL,
  `coupon_status` int(11) NOT NULL,
  `added_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `couponcodes`
--

INSERT INTO `couponcodes` (`coupon_id`, `coupon_code`, `max_discount`, `discount`, `min_cart_value`, `discount_type`, `coupon_status`, `added_on`) VALUES
(1, '50OFF', 220, 50, 400, 'perc', 1, '2023-02-26 18:30:17'),
(2, '200OFF', 1000, 200, 100, 'value', 1, '2023-02-26 18:30:17'),
(3, 'FEULSAVE', 220, 220, 200, 'deliveryoff', 1, '2023-02-27 19:19:39'),
(4, 'NOFEUL', 0, 0, 500, 'deliveryoff', 1, '2023-02-27 22:49:36'),
(5, 'NOPETROL', 0, 0, 200, 'deliveryoff', 1, '2023-02-27 23:02:45'),
(6, 'BIGSAVE', 600, 35, 1000, 'perc', 1, '2023-02-27 23:11:42'),
(7, 'SAVEFEUL', 0, 0, 400, 'perc', 1, '2023-02-27 23:13:24'),
(8, 'PETROLBACHAT', 0, 0, 0, 'deliveryoff', 1, '2023-02-27 23:18:23');

-- --------------------------------------------------------

--
-- Table structure for table `deliveryboy`
--

CREATE TABLE `deliveryboy` (
  `id` int(11) NOT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `added_on` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `busy` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `deliveryboy`
--

INSERT INTO `deliveryboy` (`id`, `mobile`, `username`, `location`, `password`, `added_on`, `busy`) VALUES
(1, '923357467403', 'sarfaraz', '67.11000,24.9214', 'sarfaraz', '2023-02-18 20:36:02', '1'),
(2, '92331234567', 'samad', NULL, 'samad', '2023-02-20 23:56:33', '1'),
(3, '92331234567', 'yousuf', NULL, 'yousuf', '2023-02-20 23:57:07', '0');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `depart_name` varchar(255) DEFAULT NULL,
  `added_on` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `depart_name`, `added_on`) VALUES
(1, 'IT', '2023-01-18 18:30:19'),
(2, 'HR', '2023-01-18 18:39:36'),
(3, 'Finance', '2023-01-18 18:39:36');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `dateofbirth` date DEFAULT NULL,
  `register_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `name`, `mobile`, `dateofbirth`, `register_date`) VALUES
(1, 'ali', '3357467403', '1999-11-08', '2023-01-18 20:54:30'),
(2, 'Waseem', '3357467975', '1992-10-06', '2023-01-18 21:07:51'),
(3, 'Naseem', '332357467403', '1993-01-05', '2023-01-18 21:00:05'),
(4, 'Hassan', '923357467489', '1993-01-05', '2023-01-18 21:00:05'),
(5, 'Safaraz', '923421462012', '1992-12-09', '2023-01-18 21:04:54'),
(6, 'Ahmed', '923357467403', '1992-12-17', '2023-01-18 21:07:32'),
(7, 'Rizwan', '3231462082', '1992-08-05', '2023-01-18 21:07:32'),
(8, 'Babar', '923357467301', '1997-11-27', '2023-01-18 21:08:58'),
(9, 'riaz', '3421462084', '1999-11-01', '2023-01-18 21:12:49'),
(10, 'wahab', '3421462027', '1992-12-02', '2023-01-18 21:12:49'),
(11, 'rameez', '3357467978', '1992-12-01', '2023-01-18 21:13:53'),
(12, 'raja', '3357467978', '1992-12-01', '2023-01-18 21:14:14'),
(13, 'waqar', '342146209', '1963-01-01', '2023-01-18 23:04:16');

-- --------------------------------------------------------

--
-- Table structure for table `emp_salary`
--

CREATE TABLE `emp_salary` (
  `id` int(11) NOT NULL,
  `department_id` int(11) DEFAULT NULL,
  `employee_id` int(11) NOT NULL,
  `salary` varchar(255) DEFAULT NULL,
  `salary_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `emp_salary`
--

INSERT INTO `emp_salary` (`id`, `department_id`, `employee_id`, `salary`, `salary_date`) VALUES
(1, 1, 1, '1000000', '2020-01-01'),
(2, 1, 1, '2000000', '2021-01-20'),
(3, 1, 2, '3000000', '2022-01-20'),
(4, 1, 2, '7000000', '2023-01-20'),
(5, 2, 3, '100000', '2020-01-15'),
(6, 2, 3, '400000', '2021-01-20'),
(7, 2, 4, '1400000', '2022-01-20'),
(8, 2, 4, '5000000', '2023-01-20'),
(9, 3, 5, '300000', '2020-01-15'),
(10, 3, 5, '400000', '2021-01-20'),
(11, 3, 6, '600000', '2022-01-20'),
(12, 3, 6, '900000', '2023-01-20');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetail`
--

CREATE TABLE `orderdetail` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `qtyorder` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL,
  `orderqty` int(11) NOT NULL,
  `orderDetailStatus` int(255) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderdetail`
--

INSERT INTO `orderdetail` (`id`, `product_id`, `qtyorder`, `price`, `user_id`, `order_id`, `orderqty`, `orderDetailStatus`) VALUES
(143, 2, 3, 100, 2, 68, 3, 1),
(144, 8, 2, 100, 2, 68, 2, 1),
(145, 3, 1, 120, 2, 68, 1, 1),
(146, 4, 1, 50, 2, 68, 1, 1),
(147, 6, 1, 100, 2, 68, 1, 1),
(148, 2, 3, 100, 2, 69, 3, 1),
(149, 8, 2, 100, 2, 69, 2, 1),
(150, 3, 1, 120, 2, 69, 1, 1),
(151, 4, 1, 50, 2, 69, 1, 1),
(152, 6, 1, 100, 2, 69, 1, 1),
(153, 2, 3, 100, 2, 70, 3, 1),
(154, 8, 2, 100, 2, 70, 2, 1),
(155, 3, 1, 120, 2, 70, 1, 1),
(156, 4, 1, 50, 2, 70, 1, 1),
(157, 6, 1, 100, 2, 70, 1, 1),
(158, 2, 4, 100, 2, 71, 0, 1),
(159, 6, 2, 100, 2, 72, 2, 1),
(160, 8, 1, 100, 2, 72, 1, 1),
(161, 3, 1, 120, 2, 72, 1, 1),
(162, 2, 1, 100, 2, 72, 1, 1),
(163, 4, 1, 50, 2, 72, 1, 1),
(164, 3, 2, 120, 2, 73, 2, 1),
(165, 7, 2, 100, 2, 73, 2, 1),
(166, 4, 2, 50, 2, 73, 2, 1),
(167, 6, 2, 100, 2, 73, 2, 1),
(168, 6, 2, 100, 2, 74, 2, 1),
(169, 7, 2, 100, 2, 74, 2, 1),
(170, 2, 1, 100, 2, 75, 1, 1),
(171, 8, 1, 100, 2, 75, 1, 1),
(172, 4, 2, 50, 2, 75, 2, 1),
(173, 3, 2, 120, 2, 75, 2, 1),
(174, 6, 2, 100, 2, 75, 2, 1),
(175, 7, 3, 100, 2, 76, 3, 1),
(176, 4, 2, 50, 2, 76, 2, 1),
(177, 6, 2, 100, 2, 76, 2, 1),
(178, 2, 3, 100, 2, 77, 3, 1),
(179, 4, 1, 50, 2, 77, 1, 1),
(180, 3, 2, 120, 2, 77, 2, 1),
(181, 4, 2, 50, 2, 78, 2, 1),
(182, 3, 2, 120, 2, 78, 2, 1),
(183, 6, 3, 100, 2, 78, 3, 1),
(184, 2, 5, 100, 2, 79, 5, 1),
(185, 4, 1, 50, 2, 79, 1, 1),
(186, 6, 1, 100, 2, 79, 1, 1),
(187, 7, 1, 100, 2, 79, 1, 1),
(188, 3, 2, 120, 2, 80, 2, 1),
(189, 4, 1, 50, 2, 80, 1, 1),
(190, 6, 1, 100, 2, 80, 1, 1),
(191, 7, 1, 100, 2, 80, 1, 1),
(192, 8, 1, 100, 2, 80, 1, 1),
(193, 3, 5, 120, 2, 81, 5, 1),
(194, 4, 1, 50, 2, 81, 1, 1),
(195, 6, 1, 100, 2, 81, 1, 1),
(196, 3, 2, 120, 2, 82, 2, 1),
(197, 4, 2, 50, 2, 82, 2, 1),
(198, 6, 1, 100, 2, 82, 1, 1),
(199, 7, 1, 100, 2, 82, 1, 1),
(200, 3, 1, 120, 2, 83, 1, 1),
(201, 4, 1, 50, 2, 83, 1, 1),
(202, 2, 4, 100, 2, 83, 4, 1),
(203, 3, 3, 120, 2, 84, 3, 1),
(204, 4, 2, 50, 2, 84, 2, 1),
(205, 6, 1, 100, 2, 84, 1, 1),
(206, 2, 1, 100, 2, 84, 1, 1),
(207, 4, 1, 50, 2, 85, 1, 1),
(208, 6, 1, 100, 2, 85, 1, 1),
(209, 3, 1, 120, 2, 85, 1, 1),
(210, 2, 1, 100, 2, 85, 1, 1),
(211, 2, 3, 100, 2, 86, 3, 1),
(212, 3, 2, 120, 2, 86, 2, 1),
(213, 3, 2, 120, 2, 87, 2, 1),
(214, 6, 3, 100, 2, 87, 3, 1),
(215, 2, 1, 100, 2, 88, 1, 1),
(216, 3, 2, 120, 2, 88, 2, 1),
(217, 4, 1, 50, 2, 88, 1, 1),
(218, 6, 2, 100, 2, 88, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orderscustomer`
--

CREATE TABLE `orderscustomer` (
  `id` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `gst` varchar(255) DEFAULT NULL,
  `totalAmount` varchar(255) DEFAULT NULL,
  `cartTotal` varchar(255) DEFAULT NULL,
  `paymentStatus` enum('0','1') DEFAULT NULL,
  `orderStatus` int(11) DEFAULT NULL,
  `deliveryboyid` int(11) DEFAULT NULL,
  `deliverat` datetime DEFAULT NULL,
  `acceptat` datetime DEFAULT NULL,
  `deliveryCharge` varchar(255) DEFAULT NULL,
  `paymentmethod` varchar(255) DEFAULT NULL,
  `discount` varchar(255) DEFAULT NULL,
  `couponCode` varchar(255) DEFAULT NULL,
  `deliveryAddress` varchar(255) DEFAULT NULL,
  `totalItem` varchar(255) DEFAULT NULL,
  `orderDate` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deliverygst` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderscustomer`
--

INSERT INTO `orderscustomer` (`id`, `userId`, `gst`, `totalAmount`, `cartTotal`, `paymentStatus`, `orderStatus`, `deliveryboyid`, `deliverat`, `acceptat`, `deliveryCharge`, `paymentmethod`, `discount`, `couponCode`, `deliveryAddress`, `totalItem`, `orderDate`, `deliverygst`) VALUES
(68, 2, '100', '880', '560', '1', 5, 3, NULL, NULL, '220', 'cash', '210', 'HALF50', 'd1 islamic arcade main university road', '5', '2023-02-26 23:45:51', 20),
(69, 2, '99', '869', '550', '1', 5, 3, NULL, NULL, '220', 'cash', '220', 'HALF50', 'd1 islamic arcade main university road', '5', '2023-02-26 23:53:47', 20),
(70, 2, '99', '869', '550', '1', 5, 3, NULL, NULL, '220', 'cash', '220', 'HALF50', 'd1 islamic arcade main university road', '5', '2023-02-26 23:53:57', 20),
(71, 2, '36', '456', '200', '1', 6, 3, NULL, NULL, '220', 'cash', '200', 'HALF50', 'd1 islamic arcade main university road', '1', '2023-02-26 23:45:42', 20),
(72, 2, '63', '633', '350', '1', 5, 3, NULL, NULL, '220', 'cash', '220', 'HALF50', 'd1 islamic arcade main university road', '5', '2023-02-26 23:57:36', 20),
(73, 2, '97', '857', '540', '1', 5, 3, NULL, NULL, '220', 'cash', '200', '200OFF', 'd1 islamic arcade main university road', '4', '2023-02-27 17:49:55', 20),
(74, 2, '36', '456', '200', '1', 5, 3, NULL, NULL, '220', 'cash', '200', '200OFF', 'd1 islamic arcade main university road', '2', '2023-02-27 18:08:48', 20),
(75, 2, '133', '1093', '740', '1', 5, 3, NULL, NULL, '220', 'cash', '0', 'No Coupon Applied', 'd1 islamic arcade main university road', '5', '2023-02-27 18:05:03', 20),
(76, 2, '108', '928', '600', '1', 5, 3, NULL, NULL, '220', 'cash', '0', 'No Coupon Applied', 'd1 islamic arcade main university road', '3', '2023-02-27 18:31:17', 20),
(77, 2, '106', '916', '590', '1', 5, 3, NULL, NULL, '220', 'cash', '0', 'PETROLBACHAO', 'd1 islamic arcade main university road', '3', '2023-02-27 20:29:04', 20),
(78, 2, '115', '755', '640', '1', 5, 3, NULL, NULL, '0', 'cash', '0', 'PETROLBACHAO', 'd1 islamic arcade main university road', '3', '2023-02-27 20:28:54', 0),
(79, 2, '95', '845', '530', '1', 5, 3, NULL, NULL, '220', 'cash', '220', 'HALF50', 'd1 islamic arcade main university road', '4', '2023-02-27 20:28:43', 20),
(80, 2, '106', '916', '590', '1', 5, 3, NULL, NULL, '220', 'cash', '0', 'PETROLBACHAO', 'd1 islamic arcade main university road', '5', '2023-02-27 20:28:32', 20),
(81, 2, '135', '885', '750', '1', 5, 3, NULL, NULL, '0', 'cash', '0', 'PETROLBACHAO', 'd1 islamic arcade main university road', '3', '2023-02-27 20:28:17', 0),
(82, 2, '97', '637', '540', '1', 5, 3, NULL, NULL, '0', 'cash', '0', 'PETROLBACHAO', 'd1 islamic arcade main university road', '4', '2023-02-27 20:26:46', 0),
(83, 2, '102', '672', '570', '1', 5, 3, NULL, NULL, '0', 'cash', '0', 'PETROLBACHAO', 'd1 islamic arcade main university road', '3', '2023-02-27 20:40:05', 0),
(84, 2, '118', '998', '660', '1', 5, 3, NULL, NULL, '220', 'cash', '0', 'No Coupon Applied', 'd1 islamic arcade main university road', '4', '2023-02-27 20:39:58', 20),
(85, 2, '66', '436', '370', '1', 5, 3, NULL, NULL, '0', 'cash', '0', 'FEULSAVE', 'd1 islamic arcade main university road', '4', '2023-02-28 00:18:20', 0),
(86, 2, '97', '637', '540', '1', 5, 3, NULL, NULL, '0', 'cash', '0', 'FEULSAVE', 'd1 islamic arcade main university road', '2', '2023-02-28 00:44:36', 0),
(87, 2, '57', '597', '320', '1', 5, 3, NULL, NULL, '220', 'cash', '220', '50OFF', 'd1 islamic arcade main university road', '2', '2023-02-28 00:44:49', 20),
(88, 2, '66', '656', '370', '1', 5, 3, NULL, NULL, '220', 'cash', '220', '50OFF', 'd1 islamic arcade main university road', '4', '2023-02-28 00:48:42', 20);

-- --------------------------------------------------------

--
-- Table structure for table `productrating`
--

CREATE TABLE `productrating` (
  `id` int(11) NOT NULL,
  `rating` int(11) DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `comment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `productrating`
--

INSERT INTO `productrating` (`id`, `rating`, `order_id`, `product_id`, `user_id`, `comment`) VALUES
(1, 4, 1, 1, 2, 'Excellent product'),
(2, 3, 2, 1, 2, 'Normal PRODUCTS'),
(3, 4, 3, 2, 2, 'nORMAL pRODUCT'),
(4, 5, 5, 3, 2, 'sUPERB');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `productName` varchar(255) DEFAULT NULL,
  `productqty` varchar(255) DEFAULT NULL,
  `keyword` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `status` enum('1','0') DEFAULT NULL,
  `added_on` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `productName`, `productqty`, `keyword`, `price`, `status`, `added_on`, `image`) VALUES
(2, 'Potato', '100', 'Potato', '100', '1', '2023-02-26 20:33:22', 'productImage/potato.png'),
(3, 'Cabbage', '100', 'Cabbage', '120', '1', '2023-02-26 20:33:31', 'productImage/1676095070.png'),
(4, 'Carrot', '100', 'Carrot', '50', '1', '2023-02-26 20:33:38', 'productImage/1676095337.png'),
(6, 'Spanish', '100', 'Spanish', '100', '1', '2023-02-26 20:33:46', 'productImage/1676091475.jpg'),
(7, 'Cauliflower', '10', 'Cauliflower', '100', '1', '2023-02-20 22:27:20', 'productImage/1676097285.jpg'),
(8, 'Onion', '10', 'onion', '100', '1', '2023-02-20 23:56:09', 'productImage/1676961159.png');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `deliveryboyid` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `review` varchar(255) DEFAULT NULL,
  `order_id` varchar(255) DEFAULT NULL,
  `review_date` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `riderrating`
--

CREATE TABLE `riderrating` (
  `id` int(11) NOT NULL,
  `rating` int(11) DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL,
  `rider_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `date_rate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `riderrating`
--

INSERT INTO `riderrating` (`id`, `rating`, `order_id`, `rider_id`, `user_id`, `date_rate`) VALUES
(1, 5, 3, 1, 1, '2023-01-11 21:20:03'),
(2, 2, 2, 1, 2, '2022-12-31 21:20:03'),
(3, 4, 5, 2, 2, '2023-01-11 21:20:03'),
(4, 5, 6, 1, 1, '2022-12-31 00:00:00'),
(5, 5, 7, 1, 1, '2023-01-11 21:20:03');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `deliveryCharge` varchar(255) DEFAULT NULL,
  `webSiteStatus` enum('1','0','2') DEFAULT NULL,
  `gst` varchar(255) NOT NULL,
  `minOrder` int(11) NOT NULL,
  `deliverygst` int(11) NOT NULL,
  `company_mobile` varchar(255) NOT NULL,
    `company_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `setting`
--
ALTER TABLE `setting` ADD `company_email` VARCHAR(2555) NOT NULL AFTER `company_mobile`, ADD `comapny_twitter` VARCHAR(255) NOT NULL AFTER `company_email`, ADD `comapny_facebook` VARCHAR(255) NOT NULL AFTER `comapny_twitter`, ADD `comapny_instragram` VARCHAR(255) NOT NULL AFTER `comapny_facebook`, ADD `company_linkend` VARCHAR(255) NOT NULL AFTER `comapny_instragram`;

INSERT INTO `setting` (`id`, `deliveryCharge`, `webSiteStatus`, `gst`, `minOrder`, `deliverygst`) VALUES
(1, '200', '1', '18', 200, 10);

-- --------------------------------------------------------

--
-- Table structure for table `statusorder`
--

CREATE TABLE `statusorder` (
  `id` int(11) NOT NULL,
  `status_id` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `statusorder`
--

INSERT INTO `statusorder` (`id`, `status_id`, `status`) VALUES
(1, 1, 'Pending'),
(2, 5, 'Completed'),
(3, 4, 'On the Way'),
(4, 6, 'Canceled'),
(5, 3, 'Assign To Rider'),
(6, 2, 'Packed');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `seatno` varchar(255) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `seatno`, `student_name`, `status`) VALUES
(240, 'eb 19102020', 'dawood emmanuel', 'Repeator'),
(241, 'eb 19102059', 'muhammad bilal sami', 'Repeator'),
(242, 'eb 19102111', 'Sear Mahmood', 'Repeator'),
(243, 'eb 19102069', 'muhammad ibrahim malik', 'Repeator'),
(244, 'eb 19102046', 'mudassar rahman', 'Repeator'),
(245, 'eb 19102132', 'syed shahzaib alam', 'Repeator'),
(246, 'eb 19102001', 'abdul basit', 'Repeator'),
(247, 'eb 19102110', 'salman habib', 'Repeator'),
(248, 'eb 19102098', 'nazia khan', 'Repeator'),
(249, 'eb 19102049', 'mohammad ahsan', 'Repeator'),
(250, 'eb 19102085', 'mohammad siraj shams', 'Improver'),
(251, 'eb 19102054', 'muhammad anas jawaid', 'Repeator'),
(252, 'eb 19102058', 'muhammad basit', 'Repeator'),
(253, 'eb 19102025', 'hamza ahmed', 'Repeator'),
(254, 'eb 19102113', 'shahid mahmood', 'Improver'),
(255, 'eb 19102109', 'Saleh Muhammad Fasih', 'Repeator'),
(256, 'ep 1849102', 'syed abdul samad ahsan', 'Improver');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `password` text DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `status` enum('1','0') DEFAULT NULL,
  `added_on` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

CREATE TABLE `notification` (`notify_id` INT NOT NULL AUTO_INCREMENT , `msg` VARCHAR(255) NOT NULL , `added_on` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`notify_id`)) ENGINE = InnoDB;

INSERT INTO `users` (`id`, `username`, `mobile`, `password`, `email`, `status`, `added_on`) VALUES
(1, 'Waqar', '923323565866', '$2y$12$XjfNg5NtFNIFb9yvHnjWj.DYhfe/Hkiqg1jACDPHnuVCJslptn6ti', 'waqar@gmail.com', '1', '2023-02-23 18:23:58'),
(2, 'Asif', '923111234567', '$2y$12$vk7oiev9uNZyalIM2A3kw.91qmDtMOs877EG4dUVqpA1aSNiVgXKu', 'asif@gmail.com', '1', '2023-02-19 19:54:42'),
(3, 'Naseem', '923323565866', '$2y$12$nwe9ioJ14wNeJpdogG75c.rsYoSc57s235Ct7Wy1biNvc2J4B2lC6', 'naseem@gmail.com', '1', '2023-02-19 19:27:26'),
(4, 'Samad', '9234321462082', '$2y$12$WE4t32YSZwjzseH1q2LzXe/87gkz/V4.Y16h9YWcH2lLMtN6fngHm', 'abdulsamadahsan@gmail.com', '1', '2023-02-18 17:59:51'),
(5, 'ali', '9234321462092', '$2y$12$66pzbMzpfenwz94otnzLLuFodNccsQvAH30mDlA4RCwBLKFWAyaF6', 'ali@gmail.com', '1', '2023-02-18 18:23:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id_address`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `apikey`
--
ALTER TABLE `apikey`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assignorder`
--
ALTER TABLE `assignorder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`),
  ADD KEY `productID` (`productID`);

--
-- Indexes for table `couponcodes`
--
ALTER TABLE `couponcodes`
  ADD PRIMARY KEY (`coupon_id`);

--
-- Indexes for table `deliveryboy`
--
ALTER TABLE `deliveryboy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emp_salary`
--
ALTER TABLE `emp_salary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `orderscustomer`
--
ALTER TABLE `orderscustomer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productrating`
--
ALTER TABLE `productrating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `riderrating`
--
ALTER TABLE `riderrating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statusorder`
--
ALTER TABLE `statusorder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `id_address` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `apikey`
--
ALTER TABLE `apikey`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `assignorder`
--
ALTER TABLE `assignorder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;

--
-- AUTO_INCREMENT for table `couponcodes`
--
ALTER TABLE `couponcodes`
  MODIFY `coupon_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `deliveryboy`
--
ALTER TABLE `deliveryboy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `emp_salary`
--
ALTER TABLE `emp_salary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `orderdetail`
--
ALTER TABLE `orderdetail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=219;

--
-- AUTO_INCREMENT for table `orderscustomer`
--
ALTER TABLE `orderscustomer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `productrating`
--
ALTER TABLE `productrating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `riderrating`
--
ALTER TABLE `riderrating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `statusorder`
--
ALTER TABLE `statusorder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=257;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `carts_ibfk_2` FOREIGN KEY (`productID`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD CONSTRAINT `orderdetail_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `orderdetail_ibfk_10` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `orderdetail_ibfk_11` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `orderdetail_ibfk_12` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `orderdetail_ibfk_13` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `orderdetail_ibfk_14` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `orderdetail_ibfk_15` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `orderdetail_ibfk_16` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `orderdetail_ibfk_17` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `orderdetail_ibfk_18` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `orderdetail_ibfk_19` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `orderdetail_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `orderdetail_ibfk_20` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `orderdetail_ibfk_21` FOREIGN KEY (`order_id`) REFERENCES `orderscustomer` (`id`),
  ADD CONSTRAINT `orderdetail_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `orderdetail_ibfk_4` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `orderdetail_ibfk_5` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `orderdetail_ibfk_6` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `orderdetail_ibfk_7` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `orderdetail_ibfk_8` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `orderdetail_ibfk_9` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
