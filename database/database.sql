-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2023 at 03:17 AM
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
(22, 53, 3);

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

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `userId`, `productID`, `userType`, `qty`, `price`, `ip_add`) VALUES
(63, 1, 3, 'Reg', '3', '120', '::1'),
(64, 1, 4, 'Reg', '3', '50', '::1'),
(65, 1, 6, 'Reg', '1', '100', '::1'),
(67, 2, 2, 'Reg', '2', '100', '::1'),
(68, 2, 4, 'Reg', '3', '50', '::1'),
(69, 2, 7, 'Reg', '3', '100', '::1');

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
  `order_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderdetail`
--

INSERT INTO `orderdetail` (`id`, `product_id`, `qtyorder`, `price`, `user_id`, `order_id`) VALUES
(65, 2, 2, 100, 1, 49),
(72, 3, 1, 120, 1, 53),
(73, 4, 1, 50, 1, 53),
(74, 6, 1, 100, 1, 53),
(75, 2, 1, 100, 1, 53),
(76, 7, 1, 100, 1, 53),
(77, 8, 1, 100, 1, 53);

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
(49, 1, '127', '997', '670', '1', 5, 1, NULL, NULL, '200', 'cash', '0', '', 'delivery', '6', '2023-02-24 19:11:40', 40),
(53, 1, '108', '878', '570', '1', 5, 3, NULL, NULL, '200', 'cash', '0', '', 'delivery', '6', '2023-02-24 19:11:45', 40);

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
(2, 'Potato', '10', 'Potato', '100', '1', '2023-02-20 22:27:53', 'productImage/potato.png'),
(3, 'Cabbage', '10', 'Cabbage', '120', '1', '2023-02-20 22:28:06', 'productImage/1676095070.png'),
(4, 'Carrot', '10', 'Carrot', '50', '1', '2023-02-20 22:28:23', 'productImage/1676095337.png'),
(6, 'Spanish', '10', 'Spanish', '100', '1', '2023-02-20 22:28:36', 'productImage/1676091475.jpg'),
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
  `deliverygst` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `deliveryCharge`, `webSiteStatus`, `gst`, `minOrder`, `deliverygst`) VALUES
(1, '200', '1', '18', 500, 5);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `orderscustomer`
--
ALTER TABLE `orderscustomer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

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
