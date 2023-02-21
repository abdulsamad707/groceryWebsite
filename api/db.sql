-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2023 at 04:14 AM
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
-- Database: `grocerystore`
--
CREATE DATABASE IF NOT EXISTS `grocerystore` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `grocerystore`;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `registerDate` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `role` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `assignorder`
--

CREATE TABLE `assignorder` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `deliveryid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assignorder`
--

INSERT INTO `assignorder` (`id`, `order_id`, `deliveryid`) VALUES
(1, 1, 1),
(2, 2, 1),
(5, 5, 2),
(6, 3, 1),
(7, 6, 3),
(8, 7, 3);

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
  `price` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `deliveryboy`
--

CREATE TABLE `deliveryboy` (
  `id` int(11) NOT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `added_on` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `deliveryboy`
--

INSERT INTO `deliveryboy` (`id`, `mobile`, `location`, `password`, `added_on`, `username`) VALUES
(1, '923357467403', '67.11000,24.9214', 'sarfaraz', '2023-01-30 21:08:21', 'sarfarz'),
(2, '92331234567', NULL, 'samad', '2023-01-11 20:49:26', 'samad'),
(3, '92331234567', NULL, NULL, '2023-01-11 20:49:33', 'yousuf');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetail`
--

CREATE TABLE `orderdetail` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL,
  `price` int(11) NOT NULL,
  `qty` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `orderStatus` varchar(11) DEFAULT NULL,
  `deliveryboyid` int(11) DEFAULT NULL,
  `deliverat` datetime DEFAULT NULL,
  `acceptat` datetime DEFAULT NULL,
  `paymentmethod` varchar(255) DEFAULT NULL,
  `discount` varchar(255) DEFAULT NULL,
  `couponCode` varchar(255) DEFAULT NULL,
  `deliveryCharge` int(11) NOT NULL,
  `deliveryAddress` varchar(255) DEFAULT NULL,
  `totalItem` varchar(255) DEFAULT NULL,
  `orderDate` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderscustomer`
--

INSERT INTO `orderscustomer` (`id`, `userId`, `gst`, `totalAmount`, `cartTotal`, `paymentStatus`, `orderStatus`, `deliveryboyid`, `deliverat`, `acceptat`, `paymentmethod`, `discount`, `couponCode`, `deliveryCharge`, `deliveryAddress`, `totalItem`, `orderDate`) VALUES
(1, 1, '500', '5700', '5000', '1', '5', 1, '2023-01-24 20:42:24', '2023-01-03 20:12:24', 'cash', '0', NULL, 200, 'd1 islmaic arcade', '7', '2023-01-03 20:48:33'),
(2, 1, '500', '5500', '5000', '1', '5', 1, '2023-01-03 20:57:44', '2023-01-03 20:51:31', 'cash', '200', 'OFF200', 200, 'd1 islamic arcade', '5', '2023-01-03 21:30:25'),
(3, 1, '400', '4550', '4000', '1', '5', 3, '2022-12-31 20:48:45', '2022-12-31 20:48:45', 'cash', '50', 'off50', 200, 'd1 islamic arcade', '4', '2023-01-11 20:48:19'),
(5, 1, '500', '5300', '5000            ', '1', '5', 1, '2022-02-23 20:57:19', '2022-02-23 20:57:19', 'cash', '400', 'OFF400', 200, 'd2 islamic arcade', '6', '2023-01-05 20:26:33'),
(6, 1, '500', '5500', '5000', '1', '5', 3, '2022-12-30 22:45:54', '2022-12-31 22:45:54', 'cash', '200', NULL, 200, 'd1 islamic arcade', '7', '2023-01-11 20:48:11'),
(7, 1, '600', '6800', '6000', '1', '5', 2, '2022-12-31 19:18:40', '2022-12-31 19:18:40', 'cash', '0', NULL, 200, 'd1 islamic aracde', '7', '2023-01-11 20:40:52'),
(8, 1, '700', '7700', '7000', '1', '5', 4, '2023-01-05 20:20:07', '2023-01-05 20:20:07', 'cash', '200', 'off200', 200, 'd1 islamic arcade main university road', '7', '2023-01-11 20:44:43');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `productName` varchar(255) DEFAULT NULL,
  `qty` varchar(255) DEFAULT NULL,
  `keyword` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `status` enum('1','0') DEFAULT NULL,
  `added_on` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `productName`, `qty`, `keyword`, `price`, `status`, `added_on`) VALUES
(1, 'onion ', '3', 'onion,pyaz', '200', '1', '2023-01-27 19:59:20');

-- --------------------------------------------------------

--
-- Table structure for table `riderrating`
--

CREATE TABLE `riderrating` (
  `id` int(11) NOT NULL,
  `rating` int(11) DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL,
  `rider_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `riderrating`
--

INSERT INTO `riderrating` (`id`, `rating`, `order_id`, `rider_id`, `user_id`) VALUES
(1, 4, 3, 1, 1),
(2, 5, 2, 1, 1),
(3, 5, 5, 2, 1),
(4, 4, 6, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` enum('1','0') DEFAULT NULL,
  `password` text DEFAULT NULL,
  `added_on` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `status`, `password`, `added_on`) VALUES
(1, 'ali', 'ali@gmail.com', '1', 'ali@gmail.com', '2023-01-31 19:59:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
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
-- Indexes for table `deliveryboy`
--
ALTER TABLE `deliveryboy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `orderscustomer`
--
ALTER TABLE `orderscustomer`
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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `assignorder`
--
ALTER TABLE `assignorder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `deliveryboy`
--
ALTER TABLE `deliveryboy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orderdetail`
--
ALTER TABLE `orderdetail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orderscustomer`
--
ALTER TABLE `orderscustomer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `riderrating`
--
ALTER TABLE `riderrating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  ADD CONSTRAINT `orderdetail_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
