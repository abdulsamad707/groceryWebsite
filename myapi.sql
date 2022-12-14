-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 13, 2022 at 05:33 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

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
-- Table structure for table `admins`
--

CREATE TABLE if not Exists `admins` (
  `id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `apikey`
--

CREATE TABLE if not Exists`apikey` (
  `id` int(11) NOT NULL,
  `apikey` varchar(255) NOT NULL,
  `hitlimit` varchar(255) DEFAULT NULL,
  `hit` varchar(255) DEFAULT NULL,
  `create_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` enum('0','1') DEFAULT NULL,
  `expirydate` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `apikey`
--

INSERT INTO `apikey` (`id`, `apikey`, `hitlimit`, `hit`, `create_at`, `status`, `expirydate`) VALUES
(1, '6CU1qSJfcs', '1000', '523', '2022-08-12 21:55:12', '1', '2022-09-29 01:35:14'),
(4, 'tcs123D1', '100', '10', '2022-06-05 17:00:34', '1', '2022-06-03 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(11) NOT NULL,
  `customerID` int(11) DEFAULT NULL,
  `productid` varchar(255) DEFAULT NULL,
  `qty` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `deliveryboys`
--

CREATE TABLE if not Exists`deliveryboys` (
  `id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `rider_latitude` varchar(255) NOT NULL,
  `rider_longitude` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `verified` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `LoginAt` datetime NOT NULL,
  `LogoutAt` datetime NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deliveryboys`
--

INSERT INTO `deliveryboys` (`id`, `email`, `password`, `username`, `rider_latitude`, `rider_longitude`, `status`, `verified`, `image`, `mobile`, `LoginAt`, `LogoutAt`, `created_at`) VALUES
(1, 'ali@gmail.com', 'ali123', 'Ali', '24.9077', '67.0739', '1', '1', 'pic-1.png', '03357467403', '2022-07-30 15:13:58', '2022-07-30 21:37:57', '2022-07-03 11:05:33'),
(2, 'usmanbay@gmail.com', 'Usman', 'Usman', '', '', '1', '1', '', '03111234567', '2022-07-28 00:00:00', '2022-07-28 01:16:00', '2022-06-27 11:05:33'),
(3, 'Waqaahmedali@gmail.com', 'Ali124', 'Waqar', '', '', '1', '1', '', '03111234566', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2022-07-31 11:05:33');

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE `expense` (
  `Id` int(11) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Amount` int(255) NOT NULL,
  `ExpenseDATE` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expense`
--

INSERT INTO `expense` (`Id`, `Description`, `Amount`, `ExpenseDATE`) VALUES
(1, 'Bill Payment', 1500, '2022-06-14'),
(2, 'Package paid to rider', 150, '2022-07-06'),
(3, 'Package expense', 75, '2022-06-10'),
(4, 'Package paid to rider', 150, '2023-05-23'),
(5, 'Package expense', 75, '2022-07-11'),
(6, 'Package', 500, '2023-06-12'),
(7, 'Balance expense', 100, '2022-02-15'),
(0, 'Rider balance', 1000, '2022-08-10');

-- --------------------------------------------------------

--
-- Table structure for table `ordercancelled`
--

CREATE TABLE `ordercancelled` (
  `id` int(11) NOT NULL,
  `Riderid` int(255) NOT NULL,
  `OrderId` int(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ordercancelled`
--

INSERT INTO `ordercancelled` (`id`, `Riderid`, `OrderId`) VALUES
(2, 2, 1),
(4, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `orderscustomers`
--

CREATE TABLE if not Exists`orderscustomers` (
  `id` int(11) NOT NULL,
  `order_amount` int(255) DEFAULT NULL,
  `order_discount` int(255) DEFAULT NULL,
  `ordergst` int(255) DEFAULT NULL,
  `paymentMethod` varchar(255) DEFAULT NULL,
  `orderStatus` varchar(255) DEFAULT NULL,
  `deliveryboyid` varchar(255) DEFAULT NULL,
  `couponCode` varchar(255) DEFAULT NULL,
  `customerID` int(11) DEFAULT NULL,
  `expected_delivery` datetime DEFAULT NULL,
  `TotalItem` varchar(255) DEFAULT NULL,
  `orderDATE` datetime DEFAULT current_timestamp(),
  `cartTotal` int(255) NOT NULL,
  `deliveryCharge` int(255) NOT NULL,
  `delivery_address` varchar(255) NOT NULL,
  `delivery_latitude` varchar(255) NOT NULL,
  `delivery_longitude` varchar(255) NOT NULL,
  `rider_longitude` varchar(255) NOT NULL,
  `rider_latitude` varchar(255) NOT NULL,
  `deliver_at` datetime NOT NULL,
  `accepted_at` datetime NOT NULL,
  `riderassignat` datetime DEFAULT NULL,
  `Warehouse` int(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderscustomers`
--

INSERT INTO `orderscustomers` (`id`, `order_amount`, `order_discount`, `ordergst`, `paymentMethod`, `orderStatus`, `deliveryboyid`, `couponCode`, `customerID`, `expected_delivery`, `TotalItem`, `orderDATE`, `cartTotal`, `deliveryCharge`, `delivery_address`, `delivery_latitude`, `delivery_longitude`, `rider_longitude`, `rider_latitude`, `deliver_at`, `accepted_at`, `riderassignat`, `Warehouse`) VALUES
(1, 2575, 500, 325, 'cash', '5', '1', 'aboveequal100', 4, '2022-06-05 07:00:00', '3', '2022-06-05 06:15:00', 2500, 250, 'd1 islamic arcade ', '24.9283', '67.1111', '67.1154', '24.9455', '2022-06-05 07:00:00', '2022-06-05 06:24:00', '2022-06-05 06:34:00', 1),
(2, 2700, 300, 250, 'cash', '7', '1', 'aboveequal100', 4, '2022-06-06 20:15:00', '7', '2022-06-06 19:30:00', 2500, 250, 'd1 islamic arcade', '24.9455', '67.1154', ' 67.1230', '24.9133', '2022-06-06 20:35:00', '2022-06-06 19:44:00', '2022-06-06 19:54:00', 0),
(3, 2000, 100, 200, 'cash', '5', '1', 'aboveequal100', 4, '2022-06-06 00:45:00', '1', '2022-06-06 00:00:00', 2000, 200, 'bismillah ', '24.9125', '67.0825', '67.1111', '24.9283', '2022-06-06 00:45:00', '2022-06-06 00:05:00', '2022-06-06 00:15:00', 0),
(4, 2000, 100, 100, 'cash', '5', '1', 'aboveequal100', 6, '2022-06-07 00:45:00', '1', '2022-06-07 00:00:00', 2000, 200, 'd1 islamic', '24.9283', '67.1111', '67.3456', '24.9283', '2022-06-07 00:45:00', '2022-06-07 00:05:00', '2022-06-07 00:15:00', 0),
(5, 290, 0, 20, 'cash', '5', '2', 'No Code Applied ', 4, '2022-07-20 00:45:00', '2', '2022-07-20 00:00:00', 200, 70, 'D1 noman grand city', '24.9283', '67.1111', '24.9283', '67.1111', '2022-07-20 00:45:00', '2022-07-20 00:05:00', '2022-07-20 00:15:00', 0),
(6, 560, 0, 60, 'cash', '5', '2', 'No Code Applied ', 4, '2022-07-21 00:45:00', '7', '2022-07-21 00:00:00', 300, 200, '', '24.9283', '67.1111', '24.9283', '67.1111', '2022-07-21 00:45:00', '2022-07-21 00:05:00', '2022-07-21 00:15:00', 0),
(7, 720, 10, 30, 'cash', '5', '2', '10off ', 6, '2023-06-28 00:45:00', '6', '2023-06-28 00:00:00', 500, 200, '', '', '', '', '', '2023-06-28 00:45:00', '2023-06-28 00:05:00', '2023-06-28 00:15:00', 0),
(9, 550, 10, 60, 'cash', '5', '1', '10off ', 4, '2022-02-16 00:45:00', '3', '2022-02-16 00:00:00', 300, 200, '', '24.9283', '67.1111', '67.1111', '24.8236', '2022-02-16 00:45:00', '2022-02-16 00:05:00', '2022-02-16 00:15:00', 0),
(10, 500, 100, 20, 'cash', '5', '2', 'aboveequal100', 6, '2022-02-01 22:13:44', '7', '2022-02-01 21:28:44', 500, 100, '', '', '', '', '', '2022-02-01 22:13:44', '2022-02-01 21:33:44', '2022-02-01 21:43:44', 0),
(11, 600, 150, 50, 'cash', '5', '1', 'aboveequal100', 6, '2023-05-16 18:24:30', '5', '2023-05-16 17:39:30', 500, 200, '', '', '', '', '', '2023-05-16 18:24:30', '2023-05-16 17:44:30', '2023-05-16 17:54:30', 0),
(12, 500, 250, 50, 'cash', '7', '2', '250off', 4, '2022-07-26 17:58:46', '7', '2022-07-26 17:13:46', 500, 200, '', '', '', '', '', '2022-07-26 18:18:46', '2022-07-26 17:40:46', '2022-07-26 17:50:46', 0),
(13, 2500, 0, 200, 'cash', '5', '1', 'No code applied', 4, '2022-08-18 00:00:00', '4', '2022-08-17 23:15:00', 2000, 200, '', '', '', '', '', '2022-08-17 23:15:45', '2022-07-28 18:15:44', '2022-07-28 18:25:44', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ordersdetail`
--

CREATE TABLE if not Exists`ordersdetail` (
  `id` int(11) NOT NULL,
  `orderid` int(11) DEFAULT NULL,
  `customerID` int(11) DEFAULT NULL,
  `productid` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ordersdetail`
--

INSERT INTO `ordersdetail` (`id`, `orderid`, `customerID`, `productid`, `qty`, `price`, `created_at`) VALUES
(1, 1, 1, 1, 3, '250', '2022-06-05 15:34:37'),
(2, 2, 1, 1, 3, '250', '2022-06-06 15:36:40'),
(3, 3, 1, 1, 4, '250', '2022-06-06 15:36:40'),
(6, 5, 1, 2, 10, '250', '2022-07-20 06:02:34'),
(5, 4, 1, 1, 2, '250', '2022-06-07 00:00:00'),
(7, 6, 1, 1, 2, '250', '2022-07-21 06:03:05'),
(8, 7, 3, 2, 10, '50', '2023-06-28 00:00:00'),
(10, 9, 1, 2, 3, '250', '2022-02-24 00:00:00'),
(12, 10, 4, 2, 10, '250', '2022-07-26 17:25:37'),
(13, 11, 4, 1, 10, '250', '2022-07-26 17:27:11'),
(14, 12, 6, 6, 10, '250', '2022-07-26 17:27:11');

-- --------------------------------------------------------

--
-- Table structure for table `ordersstatus`
--

CREATE TABLE if not Exists `ordersstatus` (
  `id` int(11) NOT NULL,
  `orderStatus` varchar(255) DEFAULT NULL,
  `orderstatuscode` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ordersstatus`
--

INSERT INTO `ordersstatus` (`id`, `orderStatus`, `orderstatuscode`) VALUES
(1, 'Pending', '1'),
(2, 'Completed', '5'),
(3, 'Accepted', '2'),
(4, 'Packed', '3'),
(5, 'Rider Assigned', '4'),
(6, 'On a way to delivery', '6'),
(7, 'late delivery ', '7'),
(8, 'Customer cancelled', '8\r\n'),
(9, 'Admin Cancelled', '9'),
(10, 'Order till one hour ', '10');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE if not Exists`payments` (
  `Id` int(11) NOT NULL,
  `FromTrans` varchar(255) NOT NULL,
  `ToTrans` varchar(255) NOT NULL,
  `Amount` int(255) NOT NULL,
  `Status` int(255) NOT NULL,
  `PayDate` datetime NOT NULL,
  `consumerid` int(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`Id`, `FromTrans`, `ToTrans`, `Amount`, `Status`, `PayDate`, `consumerid`) VALUES
(1, 'Rider', 'Admin', 11500, 1, '2022-08-01 17:00:42', 1),
(2, 'Rider', 'Admin', 1000, 1, '2022-08-01 17:06:51', 2),
(3, 'Rider', 'Admin', 1000, 1, '2022-08-01 17:06:51', 2);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE if not Exists `products` (
  `id` int(11) NOT NULL,
  `productsName` varchar(255) DEFAULT NULL,
  `productsPrice` varchar(255) DEFAULT NULL,
  `productsGst` varchar(255) DEFAULT NULL,
  `productsDiscount` varchar(255) DEFAULT NULL,
  `productsMrp` varchar(255) DEFAULT NULL,
  `productsQty` varchar(255) DEFAULT NULL,
  `productKeyWord` varchar(255) DEFAULT NULL,
  `productStatus` varchar(255) DEFAULT NULL,
  `productImage` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `productsName`, `productsPrice`, `productsGst`, `productsDiscount`, `productsMrp`, `productsQty`, `productKeyWord`, `productStatus`, `productImage`) VALUES
(1, 'Onion 1/2 kg', '35', '40', '2', '42', '150', 'onions,onion,vegetable,sabzi,pyaz', '1', 'product-2.png'),
(2, 'potato 1/2 kg', '20', '4', '2', '26', '150', 'aloo,potato,vegetable', '1', 'product-5.png'),
(3, 'guava 1/2 kg', '80', '16', '8', '86', '150', 'guava,fruits,fruit', '1', 'guava.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `riderrating`
--

CREATE TABLE if not Exists `riderrating` (
  `id` int(11) NOT NULL,
  `RiderRating` int(255) NOT NULL,
  `RiderId` int(254) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `riderrating`
--

INSERT INTO `riderrating` (`id`, `RiderRating`, `RiderId`) VALUES
(1, 4, 2),
(2, 5, 2),
(3, 3, 1),
(4, 4, 1),
(5, 5, 1),
(6, 5, 2);

-- --------------------------------------------------------

--
-- Table structure for table `riderwallet`
--

CREATE TABLE if not Exists`riderwallet` (
  `Id` int(11) NOT NULL,
  `TransType` varchar(244) NOT NULL,
  `Amount` int(255) NOT NULL,
  `RiderId` int(255) NOT NULL,
  `TransDate` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `riderwallet`
--

INSERT INTO `riderwallet` (`Id`, `TransType`, `Amount`, `RiderId`, `TransDate`) VALUES
(1, 'In', 200, 2, '2022-08-01 16:18:34'),
(2, 'In', 300, 2, '2022-08-01 16:18:34'),
(3, 'Out', 50, 2, '2022-08-01 16:21:01'),
(4, 'In', 500, 1, '2022-08-01 16:21:01'),
(5, 'Out', 0, 1, '2022-08-01 16:33:39'),
(6, 'Out', 0, 1, '2022-08-01 16:33:39');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE if not Exists `setting` (
  `id` int(11) NOT NULL,
  `perKm` varchar(255) DEFAULT NULL,
  `perMin` varchar(255) DEFAULT NULL,
  `baseFare` varchar(255) DEFAULT NULL,
  `webstatus` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE if not Exists `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `mobile` varchar(255) NOT NULL,
  `verified` enum('0','1') DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `str_rand` varchar(255) null,
  `mobile_verify` varchar(255) null,
  `otp` varchar(255)  NULL) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `created_at`, `mobile`, `verified`, `status`, `password`) VALUES
(4, 'Waqar', 'Waqar@gmail.com', '2022-08-13 20:28:49', '923323565866', '1', '1', '$2y$12$NcJ8aNbvnz4nFXY9xsjJNO3SqfAZxhOh7KbFi9duD6BbrPaCaGJcm'),
(6, 'Asif', 'Asif@gmail.com', '2022-08-13 20:27:34', '923111234567', '1', '1', '$2y$12$tUJEx3pu63WtPt2iEBb.LOubanlKwjWs9E.MZ8KOgLuOp4zg5EN1K'),
(7, 'Naseem', 'Naseem@gmail.com', '2022-08-13 20:25:15', '923323565866', '1', '1', ' $2y$12$FiA0RDCAfNPqkCJYWFBMp.QMiDlqB6e38GCX4HST3fstMWsyHhSI'),
(18, 'Samad', 'abdulsamadahsan@gmail.com', '2022-08-13 20:25:55', '9234321462082', '0', '1', '$2y$12$OmhJ.RJYX5.kstCzGR2/xOBaVZaJBkGJ9ndjDeQw2YgALjRp9P6kW'),
(16, 'Samad', 'abdulsamadahsan@gmail.com', '2022-08-13 20:19:12', '923421462082', '0', '1', '$2y$12$2ggp83yv160X8ojW0K7SE.iJCfWmekMtof0QJ4QjVkjO.q8pXaZXy');

-- --------------------------------------------------------

--
-- Table structure for table `warehouses`
--

CREATE TABLE if not Exists`warehouses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `latitude` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `completeAddress` varchar(255) DEFAULT NULL,
  `NameWarehouse` varchar(244) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `workmonitor`
--

CREATE TABLE if not Exists `workmonitor` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `RiderId` int(255) NOT NULL,
  `Workduration` int(255) NOT NULL,
  `OnlineDuration` int(255) NOT NULL,
  `DateOnline` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `workmonitor`
--

INSERT INTO `workmonitor` (`Id`, `RiderId`, `Workduration`, `OnlineDuration`, `DateOnline`) VALUES
(3, 2, 20, 200, '2022-07-20'),
(4, 1, 0, 80, '2022-07-28'),
(5, 2, 90, 190, '2022-07-26');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customerID` (`customerID`);

--
-- Indexes for table `deliveryboys`
--
ALTER TABLE `deliveryboys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `ordercancelled`
--
ALTER TABLE `ordercancelled`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderscustomers`
--
ALTER TABLE `orderscustomers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customerID` (`customerID`);

--
-- Indexes for table `ordersdetail`
--
ALTER TABLE `ordersdetail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orderid` (`orderid`),
  ADD KEY `customerID` (`customerID`);

--
-- Indexes for table `ordersstatus`
--
ALTER TABLE `ordersstatus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`Id`);

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
-- Indexes for table `riderwallet`
--
ALTER TABLE `riderwallet`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `warehouses`
--
ALTER TABLE `warehouses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `workmonitor`
--
ALTER TABLE `workmonitor`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `apikey`
--
ALTER TABLE `apikey`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `deliveryboys`
--
ALTER TABLE `deliveryboys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=415;

--
-- AUTO_INCREMENT for table `ordercancelled`
--
ALTER TABLE `ordercancelled`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orderscustomers`
--
ALTER TABLE `orderscustomers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `ordersdetail`
--
ALTER TABLE `ordersdetail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `ordersstatus`
--
ALTER TABLE `ordersstatus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `riderrating`
--
ALTER TABLE `riderrating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `riderwallet`
--
ALTER TABLE `riderwallet`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `workmonitor`
--
ALTER TABLE `workmonitor`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
