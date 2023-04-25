-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2023 at 01:02 PM
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
(1, 'D1 Islamic', 4);

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
(1, '3357467403', 'admin', '$2y$12$Y2x9LNctpwXFv5yaAQbonOntXJQi3wn6NsvGj4JFan98VXe3V99X2', 0, '2023-03-29 19:46:23'),
(2, '03357467403', 'vendoryousuf', '$2y$12$pcp6QQjLinxAaTuzMFIJDelhzoP6ID7OCgG8f9HbZdDD0wteVsOb.', 2, '2023-03-18 18:19:01'),
(3, '03357467402', 'yousuf', '$2y$12$Y2x9LNctpwXFv5yaAQbonOntXJQi3wn6NsvGj4JFan98VXe3V99X2', 2, '2023-04-01 21:34:20'),
(4, '03357467403', 'vendor', '$2y$12$uww5TSX74riu7IvjvIRoPukjjjBsdRwqba9vKWsjalmOWh67DEKdG', 2, '2023-03-22 20:30:11'),
(5, '03357568402', 'salmanvendor', '$2y$12$QAL3E/OfvK31FUyEuxtfqOY5iHj4IqcV.7uVcuH105QnncynNahta', 2, '2023-03-31 21:41:50');

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
(55, 88, 3),
(56, 89, 3),
(57, 90, 3),
(58, 91, 3),
(59, 92, 3),
(60, 93, 3),
(61, 95, 3),
(62, 96, 3),
(63, 97, 3),
(64, 98, 3),
(65, 99, 3),
(66, 100, 3),
(67, 101, 3),
(68, 102, 3),
(69, 103, 3),
(70, 104, 3),
(71, 105, 3),
(72, 106, 3),
(73, 114, 3),
(74, 113, 3),
(75, 112, 3),
(76, 111, 3),
(77, 109, 3),
(78, 110, 3),
(79, 108, 3),
(80, 107, 3),
(81, 115, 3),
(82, 119, 3),
(83, 120, 3),
(84, 118, 3),
(85, 117, 3),
(86, 116, 3),
(87, 124, 3),
(88, 127, 3),
(89, 123, 3),
(90, 125, 3),
(91, 128, 3),
(92, 129, 3),
(93, 132, 3),
(94, 136, 3),
(95, 135, 3),
(96, 134, 3),
(97, 133, 3),
(98, 131, 3),
(99, 130, 3),
(100, 137, 3),
(101, 140, 3),
(102, 140, 3),
(103, 140, 3),
(104, 141, 3),
(105, 142, 3),
(106, 143, 3),
(107, 144, 3),
(108, 145, 3),
(109, 146, 3),
(110, 147, 3),
(111, 148, 3),
(112, 149, 3),
(113, 150, 3),
(114, 151, 3),
(115, 152, 3),
(116, 154, 3),
(117, 153, 3),
(118, 155, 3),
(119, 156, 3),
(120, 157, 2),
(121, 158, 2),
(122, 158, 3),
(123, 159, 2),
(124, 164, 3),
(125, 160, 2),
(126, 170, 2),
(127, 169, 3),
(128, 168, 2),
(129, 167, 3),
(130, 166, 2),
(131, 161, 3),
(132, 163, 2),
(133, 165, 2),
(134, 162, 2),
(135, 171, 2),
(136, 172, 2),
(137, 173, 2),
(138, 174, 2),
(139, 193, 2),
(140, 179, 3),
(141, 180, 2),
(142, 181, 2),
(143, 182, 3),
(144, 183, 2),
(145, 184, 2),
(146, 185, 2),
(147, 186, 2),
(148, 189, 3),
(149, 188, 2),
(150, 187, 2),
(151, 192, 2),
(152, 190, 3),
(153, 198, 3),
(154, 197, 3),
(155, 195, 3),
(156, 196, 3),
(157, 214, 3),
(158, 221, 2),
(159, 219, 3),
(160, 200, 3),
(161, 222, 4),
(162, 218, 4),
(163, 223, 2),
(164, 224, 4),
(165, 225, 4),
(166, 226, 4),
(167, 230, 4),
(168, 229, 4),
(169, 231, 4),
(170, 233, 3),
(171, 234, 3),
(172, 201, 4),
(173, 232, 4),
(174, 228, 4),
(175, 227, 4),
(176, 206, 4),
(177, 207, 4),
(178, 217, 3),
(179, 208, 3),
(180, 209, 3),
(181, 236, 4),
(182, 235, 4),
(183, 216, 3),
(184, 215, 4),
(185, 213, 4),
(186, 212, 4),
(187, 237, 3),
(188, 238, 4),
(189, 239, 4),
(190, 240, 3),
(191, 241, 3),
(192, 242, 2),
(193, 244, 4),
(194, 247, 3),
(195, 246, 4),
(196, 245, 3),
(197, 249, 4),
(198, 248, 3),
(199, 250, 4),
(200, 251, 4),
(201, 1, 4),
(202, 2, 4),
(203, 3, 4),
(204, 4, 4),
(205, 5, 4),
(206, 6, 3),
(207, 8, 2),
(208, 7, 2),
(209, 9, 4),
(210, 10, 4),
(211, 12, 3),
(212, 13, 4),
(213, 14, 4),
(214, 16, 4),
(215, 15, 4),
(216, 17, 4),
(217, 18, 2),
(218, 1, 3),
(219, 4, 2),
(220, 6, 4),
(221, 7, 4),
(222, 8, 4),
(223, 11, 2);

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
  `ip_add` varchar(255) NOT NULL,
  `cartadmin_ad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `userId`, `productID`, `userType`, `qty`, `price`, `ip_add`, `cartadmin_ad`) VALUES
(1221, 4, 14, 'Reg', '1', '100', '::1', 0),
(1222, 4, 15, 'Reg', '1', '100', '::1', 0),
(1223, 4, 16, 'Reg', '1', '250', '::1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `couponcodes`
--

CREATE TABLE `couponcodes` (
  `id` int(11) NOT NULL,
  `coupon_code` varchar(255) NOT NULL,
  `max_discount` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `min_cart_value` int(11) NOT NULL,
  `discount_type` enum('perc','value','deliveryoff') NOT NULL,
  `coupon_status` int(11) NOT NULL,
  `added_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `added_on` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `busy` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `deliveryboy`
--

INSERT INTO `deliveryboy` (`id`, `mobile`, `username`, `location`, `password`, `added_on`, `busy`, `status`) VALUES
(1, '923357467403', 'sarfaraz', '67.11000,24.9214', '$2y$12$Y2x9LNctpwXFv5yaAQbonOntXJQi3wn6NsvGj4JFan98VXe3V99X2', '2023-03-25 22:06:05', '1', 1),
(2, '92331234567', 'samad', NULL, '$2y$12$Y2x9LNctpwXFv5yaAQbonOntXJQi3wn6NsvGj4JFan98VXe3V99X2', '2023-03-23 17:51:20', '0', 1),
(3, '92331234567', 'yousufride', NULL, '$2y$12$Y2x9LNctpwXFv5yaAQbonOntXJQi3wn6NsvGj4JFan98VXe3V99X2', '2023-04-03 18:38:09', '0', 1),
(4, '03357467403', 'fahim', NULL, '$2y$12$WWGfkb4nCTySxCPvE4UQ7.adMICiDXrCOckAfcnKzfUXh3asQPr.O', '2023-04-06 19:31:08', '0', 1),
(6, '03357467345', 'riders', NULL, '$2y$12$gg2QqqG4mIbf2sG3qHP26.N5IOllHcz6tbG/HQIISye5yXM62y12u', '2023-04-06 18:10:18', '0', 1),
(7, '03357467403', 'ridersNew', NULL, '$2y$12$vGKmVlVeqJIN1F7bpxpoIepkjNVHsW3tZTHZbiEHdCvhcBTca9fBu', '2023-04-06 19:31:32', '0', 1);

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
  `orderqty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderdetail`
--

INSERT INTO `orderdetail` (`id`, `product_id`, `qtyorder`, `price`, `user_id`, `order_id`, `orderqty`) VALUES
(1, 6, 1, 100, 4, 1, 1),
(2, 4, 1, 50, 4, 1, 1),
(3, 3, 1, 120, 4, 1, 1),
(4, 7, 1, 100, 4, 1, 1),
(5, 8, 1, 100, 4, 1, 1),
(6, 4, 1, 50, 4, 2, 1),
(7, 3, 1, 120, 4, 2, 1),
(8, 6, 1, 100, 4, 2, 1),
(9, 7, 1, 100, 4, 2, 1),
(10, 8, 1, 100, 4, 2, 1),
(11, 9, 1, 1275, 4, 2, 1),
(12, 10, 1, 300, 4, 2, 1),
(13, 11, 1, 280, 4, 2, 1),
(15, 13, 1, 70, 4, 2, 1),
(16, 14, 1, 100, 4, 2, 1),
(17, 15, 1, 100, 4, 2, 1),
(18, 16, 1, 250, 4, 2, 1),
(19, 2, 1, 30, 4, 2, 1),
(20, 4, 1, 50, 4, 3, 0),
(21, 3, 1, 120, 4, 3, 0),
(22, 6, 1, 100, 4, 3, 0),
(23, 7, 1, 100, 4, 3, 0),
(24, 2, 1, 30, 4, 4, 1),
(25, 3, 1, 120, 4, 4, 1),
(26, 7, 1, 100, 4, 4, 1),
(27, 6, 1, 100, 4, 4, 1),
(28, 11, 1, 280, 4, 5, 1),
(29, 10, 1, 300, 4, 5, 1),
(30, 9, 1, 1275, 4, 5, 1),
(32, 2, 1, 30, 4, 6, 1),
(33, 3, 1, 120, 4, 6, 1),
(34, 4, 1, 50, 4, 6, 1),
(35, 3, 2, 120, 4, 7, 2),
(36, 4, 2, 50, 4, 7, 2),
(37, 6, 2, 100, 4, 7, 2),
(38, 7, 2, 100, 4, 7, 2),
(39, 8, 2, 100, 4, 7, 2),
(40, 9, 2, 1275, 4, 7, 2),
(41, 10, 2, 300, 4, 7, 2),
(42, 11, 2, 280, 4, 7, 2),
(43, 12, 2, 40, 4, 7, 2),
(44, 13, 2, 70, 4, 7, 2),
(45, 14, 2, 100, 4, 7, 2),
(46, 15, 2, 100, 4, 7, 2),
(47, 16, 2, 250, 4, 7, 2),
(48, 2, 2, 30, 4, 7, 2),
(49, 9, 1, 1275, 4, 8, 1),
(50, 10, 1, 300, 4, 8, 1),
(51, 17, 1, 550, 4, 9, 1),
(52, 16, 1, 250, 4, 9, 1),
(53, 15, 1, 100, 4, 9, 1),
(54, 11, 2, 280, 4, 10, 2),
(55, 12, 2, 40, 4, 10, 2),
(56, 14, 2, 100, 4, 10, 2),
(57, 13, 2, 70, 4, 10, 2),
(58, 15, 3, 100, 4, 10, 3),
(59, 16, 2, 250, 4, 10, 2),
(60, 17, 2, 550, 4, 10, 2),
(61, 6, 3, 100, 4, 11, 3),
(62, 7, 3, 100, 4, 11, 3),
(63, 4, 3, 50, 4, 11, 3);

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
  `deliverygst` int(11) NOT NULL,
  `gstperc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderscustomer`
--

INSERT INTO `orderscustomer` (`id`, `userId`, `gst`, `totalAmount`, `cartTotal`, `paymentStatus`, `orderStatus`, `deliveryboyid`, `deliverat`, `acceptat`, `deliveryCharge`, `paymentmethod`, `discount`, `couponCode`, `deliveryAddress`, `totalItem`, `orderDate`, `deliverygst`, `gstperc`) VALUES
(1, 4, '43', '643', '470', '1', 5, 2, NULL, NULL, '130', 'cash', '0', 'No Coupon ', 'D1 Islamic', '5', '2023-03-31 17:02:50', 0, 9),
(2, 4, '263', '3308', '2915', '1', 5, 4, NULL, NULL, '130', 'cash', '0', 'No Coupon Code Applied', 'D1 Islamic', '14', '2023-04-01 23:28:19', 0, 9),
(3, 4, '34', '534', '370', '1', 6, 0, NULL, NULL, '130', 'cash', '0', 'No Coupon Code Applied', 'D1 Islamic', '4', '2023-04-02 16:58:06', 0, 9),
(4, 4, '32', '512', '350', '1', 5, 2, NULL, NULL, '130', 'cash', '0', 'No Coupon Code Applied', 'D1 Islamic', '4', '2023-04-02 16:57:59', 0, 9),
(5, 4, '167', '2152', '1855', '1', 5, 4, NULL, NULL, '130', 'cash', '0', 'No Coupon Code Applied', 'D1 Islamic', '3', '2023-04-02 16:57:49', 0, 9),
(6, 4, '18', '348', '200', '1', 5, 4, NULL, NULL, '130', 'cash', '0', 'No Coupon Code Applied', 'D1 Islamic', '3', '2023-04-02 21:24:26', 0, 9),
(7, 4, '525', '6485', '5830', '1', 5, 4, NULL, NULL, '130', 'cash', '0', 'No Coupon Code Applied', 'D1 Islamic', '14', '2023-02-27 21:29:04', 0, 9),
(8, 4, '142', '1847', '1575', '1', 5, 4, NULL, NULL, '130', 'cash', '0', 'No Coupon Code Applied', 'D1 Islamic', '2', '2023-04-02 22:06:57', 0, 9),
(9, 4, '81', '1111', '900', '1', 5, 4, NULL, NULL, '130', 'cash', '0', 'No Coupon Code Applied', 'D1 Islamic', '3', '2023-04-03 05:27:06', 0, 9),
(10, 4, '260', '3270', '2880', '1', 5, 4, NULL, NULL, '130', 'cash', '0', 'No Coupon Code Applied', 'D1 Islamic', '7', '2023-04-03 16:21:39', 0, 9),
(11, 4, '68', '948', '750', '1', 5, 2, NULL, NULL, '130', 'cash', '0', 'No Coupon Code Applied', 'D1 Islamic', '3', '2023-04-06 18:56:09', 0, 9);

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
  `image` varchar(255) NOT NULL,
  `admin_id` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `productName`, `productqty`, `keyword`, `price`, `status`, `added_on`, `image`, `admin_id`) VALUES
(2, 'Potato', '173', 'Potato', '30', '1', '2023-04-06 20:51:11', 'productImage/potato.png', 1),
(3, 'Cabbage', '100', 'Cabbage', '120', '1', '2023-03-06 01:34:48', 'productImage/1676095070.png', 1),
(4, 'Carrot', '100', 'Carrot', '50', '1', '2023-03-07 00:11:17', 'productImage/1676095337.png', 1),
(6, 'Spanish', '253', 'Spanish', '100', '1', '2023-03-04 21:25:01', 'productImage/1677990301.jpg', 1),
(7, 'Cauliflower', '178', 'Cauliflower', '100', '1', '2023-03-23 15:44:41', 'productImage/1676097285.jpg', 3),
(8, 'Onion', '100', 'Onion', '100', '1', '2023-03-03 20:29:37', 'productImage/1676961159.png', 1),
(9, 'Millac', '100', 'Millac', '1275', '1', '2023-03-23 15:43:48', 'productImage/1677989493.jpg', 2),
(10, 'Masoor', '100', 'Masoor', '300', '1', '2023-03-20 22:36:05', 'productImage/1677989673.jpg', 2),
(11, 'Chana Daal', '100', 'Chana Daal', '280', '1', '2023-03-07 12:51:39', 'productImage/1677989801.jpg', 1),
(12, 'Tomato', '50', 'Tomato', '40', '1', '2023-03-28 16:03:36', 'productImage/1679380649.jpg', 1),
(13, 'Cocumber', '100', 'Cocumber', '70', '1', '2023-03-23 17:31:51', 'productImage/1679544017.jpg', 1),
(14, 'Peas', '1000', 'Peas', '100', '1', '2023-03-22 22:54:27', 'productImage/1679550867.jpg', 4),
(15, 'Beetroot', '1000', 'Beetroot', '100', '1', '2023-03-23 03:47:45', 'productImage/1679568465.jpg', 4),
(16, 'Moong Daal', '1000', 'Moong Daal', '250', '1', '2023-03-25 22:23:42', 'productImage/1679808222.jpg', 4),
(17, 'Tapal Mixture', '1000', 'Tapal Mixture', '550', '1', '2023-04-06 21:13:16', 'productImage/1680523676.jpg', 5),
(18, 'Eggplant', '50', 'Eggplant', '100', '1', '2023-04-06 23:33:55', 'productImage/1680849234.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
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
  `company_email` varchar(2555) NOT NULL,
  `comapny_twitter` varchar(255) NOT NULL,
  `comapny_facebook` varchar(255) NOT NULL,
  `comapny_instragram` varchar(255) NOT NULL,
  `company_linkend` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `deliveryCharge`, `webSiteStatus`, `gst`, `minOrder`, `deliverygst`, `company_mobile`, `company_email`, `comapny_twitter`, `comapny_facebook`, `comapny_instragram`, `company_linkend`) VALUES
(1, '130', '1', '9', 100, 0, '3357467403', 'abdulsamadahsan@gmail.com', 'https://twitter.com/', 'https://facebook.com', 'https://instagram.com/', 'https://linkedin.com/');

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `password` text DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `status` enum('1','0') DEFAULT NULL,
  `added_on` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `otp` int(11) NOT NULL,
  `otp_verify` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `mobile`, `password`, `email`, `status`, `added_on`, `otp`, `otp_verify`) VALUES
(1, 'Waqar', '923323565866', '$2y$12$XjfNg5NtFNIFb9yvHnjWj.DYhfe/Hkiqg1jACDPHnuVCJslptn6ti', 'waqar@gmail.com', '1', '2023-03-28 16:42:35', 0, 0),
(2, 'Asif', '923111234567', '$2y$12$vk7oiev9uNZyalIM2A3kw.91qmDtMOs877EG4dUVqpA1aSNiVgXKu', 'asif@gmail.com', '1', '2023-03-27 21:26:56', 0, 0),
(3, 'Naseem', '923323565866', '$2y$12$nwe9ioJ14wNeJpdogG75c.rsYoSc57s235Ct7Wy1biNvc2J4B2lC6', 'ep19102077.naseem@gmail.com', '1', '2023-03-18 19:16:03', 0, 0),
(4, 'Samad', '9234321462082', '$2y$12$WE4t32YSZwjzseH1q2LzXe/87gkz/V4.Y16h9YWcH2lLMtN6fngHm', 'abdulsamadahsan@gmail.com', '1', '2023-03-29 15:09:27', 0, 1),
(5, 'ali', '9234321462092', '$2y$12$66pzbMzpfenwz94otnzLLuFodNccsQvAH30mDlA4RCwBLKFWAyaF6', 'ali@gmail.com', '1', '2023-03-18 19:16:09', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `vendor_earning`
--

CREATE TABLE `vendor_earning` (
  `vendor_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `order_data` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `couponcodes`
--
ALTER TABLE `couponcodes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deliveryboy`
--
ALTER TABLE `deliveryboy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `apikey`
--
ALTER TABLE `apikey`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `assignorder`
--
ALTER TABLE `assignorder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=224;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1224;

--
-- AUTO_INCREMENT for table `couponcodes`
--
ALTER TABLE `couponcodes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `deliveryboy`
--
ALTER TABLE `deliveryboy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orderdetail`
--
ALTER TABLE `orderdetail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `orderscustomer`
--
ALTER TABLE `orderscustomer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `productrating`
--
ALTER TABLE `productrating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
