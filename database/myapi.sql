-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2023 at 06:21 AM
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

CREATE TABLE IF NOT EXISTS `address` (
  `id_address` int(11) NOT NULL AUTO_INCREMENT,
  `address` varchar(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  PRIMARY KEY (id_address)

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `address`
--



-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE IF NOT EXISTS`admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mobile` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` text DEFAULT NULL,
  `role` int(11) NOT NULL,
  `added_on` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
    PRIMARY KEY (id)

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `mobile`, `username`, `password`, `role`, `added_on`) VALUES
(1, '3357467403', 'admin', '$2y$12$Y2x9LNctpwXFv5yaAQbonOntXJQi3wn6NsvGj4JFan98VXe3V99X2', 0, '2023-03-06 15:43:03');

-- --------------------------------------------------------

--
-- Table structure for table `apikey`
--

CREATE TABLE IF NOT EXISTS `apikey` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `apikey` varchar(255) DEFAULT NULL,
  `hit` varchar(255) DEFAULT NULL,
  `hitlimit` varchar(255) DEFAULT NULL,
  `expirydate` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `status` varchar(255) DEFAULT NULL,
    PRIMARY KEY (id)

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

CREATE TABLE IF NOT EXISTS `assignorder` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) DEFAULT NULL,
  `deliveryboyid` int(11) DEFAULT NULL,
    PRIMARY KEY (id)

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
(160, 200, 3);

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE IF NOT EXISTS`carts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) DEFAULT NULL,
  `productID` int(11) DEFAULT NULL,
  `userType` varchar(255) DEFAULT NULL,
  `qty` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `ip_add` varchar(255) NOT NULL,
    PRIMARY KEY (id)

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `userId`, `productID`, `userType`, `qty`, `price`, `ip_add`) VALUES
(818, 4, 8, 'Reg', '1', '100', '::1'),
(819, 4, 4, 'Reg', '1', '50', '::1'),
(820, 4, 6, 'Reg', '1', '100', '::1'),
(821, 4, 7, 'Reg', '1', '100', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `couponcodes`
--

CREATE TABLE IF NOT EXISTS `couponcodes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `coupon_code` varchar(255) NOT NULL,
  `max_discount` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `min_cart_value` int(11) NOT NULL,
  `discount_type` enum('perc','value','deliveryoff') NOT NULL,
  `coupon_status` int(11) NOT NULL,
  `added_on` datetime NOT NULL DEFAULT current_timestamp(),
    PRIMARY KEY (id)

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `couponcodes`
--



-- --------------------------------------------------------

--
-- Table structure for table `deliveryboy`
--

CREATE TABLE  IF NOT EXISTS`deliveryboy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mobile` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `added_on` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `busy` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
    PRIMARY KEY (id)

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `deliveryboy`
--

INSERT INTO `deliveryboy` (`id`, `mobile`, `username`, `location`, `password`, `added_on`, `busy`, `status`) VALUES
(1, '923357467403', 'sarfaraz', '67.11000,24.9214', 'sarfaraz', '2023-03-09 20:31:28', '1', 1),
(2, '92331234567', 'samad', NULL, 'samad', '2023-03-08 23:46:07', '0', 1),
(3, '92331234567', 'yousuf', NULL, 'yousuf', '2023-03-09 20:31:26', '0', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orderdetail`
--

CREATE TABLE IF NOT EXISTS `orderdetail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `qtyorder` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL,
  `orderqty` int(11) NOT NULL,
  `orderDetailStatus` int(255) NOT NULL DEFAULT 1,
    PRIMARY KEY (id)

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderdetail`
--

INSERT INTO `orderdetail` (`id`, `product_id`, `qtyorder`, `price`, `user_id`, `order_id`, `orderqty`, `orderDetailStatus`) VALUES
(424, 7, 2, 100, 2, 149, 2, 1),
(425, 8, 2, 100, 2, 149, 2, 1),
(427, 10, 2, 300, 2, 149, 2, 1),
(428, 6, 2, 100, 2, 149, 2, 1),
(431, 4, 2, 50, 2, 150, 2, 1),
(434, 4, 2, 50, 2, 151, 2, 1),
(435, 6, 2, 100, 2, 151, 2, 1),
(436, 7, 2, 100, 2, 151, 2, 1),
(437, 8, 2, 100, 2, 151, 2, 1),
(439, 10, 2, 300, 2, 151, 2, 1),
(440, 11, 2, 280, 2, 151, 2, 1),
(442, 9, 2, 1200, 2, 152, 2, 1),
(445, 4, 2, 50, 2, 153, 2, 1),
(446, 6, 2, 100, 2, 153, 2, 1),
(447, 7, 2, 100, 2, 153, 2, 1),
(448, 8, 1, 100, 2, 153, 1, 1),
(449, 9, 2, 1200, 2, 153, 2, 1),
(452, 4, 1, 50, 2, 154, 1, 1),
(453, 6, 1, 100, 2, 154, 1, 1),
(454, 7, 1, 100, 2, 154, 1, 1),
(455, 8, 1, 100, 2, 154, 1, 1),
(456, 9, 1, 1200, 2, 154, 1, 1),
(457, 10, 1, 300, 2, 154, 1, 1),
(458, 11, 1, 280, 2, 154, 1, 1),
(461, 4, 2, 50, 2, 155, 2, 1),
(462, 6, 2, 100, 2, 155, 2, 1),
(463, 7, 1, 100, 2, 155, 1, 1),
(464, 8, 2, 100, 2, 155, 2, 1),
(467, 9, 1, 1200, 2, 157, 1, 1),
(469, 9, 1, 1200, 2, 158, 1, 1),
(471, 9, 1, 1200, 2, 159, 1, 1),
(473, 3, 2, 120, 2, 160, 2, 1),
(474, 4, 2, 50, 2, 160, 2, 1),
(475, 6, 2, 100, 2, 160, 2, 1),
(477, 3, 2, 120, 2, 161, 2, 1),
(478, 9, 2, 1200, 2, 161, 2, 1),
(479, 11, 2, 280, 2, 161, 2, 1),
(480, 4, 2, 50, 2, 161, 2, 1),
(481, 6, 2, 100, 2, 161, 2, 1),
(482, 8, 2, 100, 2, 161, 2, 1),
(483, 10, 2, 300, 2, 161, 2, 1),
(484, 7, 2, 100, 2, 161, 2, 1),
(485, 6, 1, 100, 2, 162, 1, 1),
(486, 4, 1, 50, 2, 162, 1, 1),
(487, 7, 1, 100, 2, 162, 1, 1),
(488, 8, 1, 100, 2, 162, 1, 1),
(489, 10, 1, 300, 2, 162, 1, 1),
(490, 11, 1, 280, 2, 162, 1, 1),
(492, 11, 2, 280, 2, 163, 2, 1),
(494, 3, 1, 120, 2, 163, 1, 1),
(495, 7, 1, 100, 2, 163, 1, 1),
(496, 6, 1, 100, 2, 163, 1, 1),
(497, 4, 1, 50, 2, 163, 1, 1),
(498, 9, 1, 1200, 2, 163, 1, 1),
(499, 4, 2, 50, 2, 164, 2, 1),
(500, 6, 2, 100, 2, 164, 2, 1),
(501, 8, 3, 100, 2, 164, 3, 1),
(502, 6, 1, 100, 2, 165, 1, 1),
(503, 8, 1, 100, 2, 165, 1, 1),
(505, 3, 1, 120, 2, 166, 1, 1),
(506, 9, 1, 1200, 2, 166, 1, 1),
(507, 4, 1, 50, 2, 167, 1, 1),
(508, 6, 1, 100, 2, 167, 1, 1),
(509, 9, 1, 1200, 2, 167, 1, 1),
(510, 3, 2, 120, 2, 168, 2, 1),
(511, 6, 2, 100, 2, 168, 2, 1),
(512, 4, 2, 50, 2, 168, 2, 1),
(514, 11, 1, 280, 2, 168, 1, 1),
(515, 4, 1, 50, 2, 169, 1, 1),
(516, 3, 1, 120, 2, 169, 1, 1),
(518, 3, 1, 120, 4, 170, 1, 1),
(519, 7, 1, 100, 4, 170, 1, 1),
(520, 9, 1, 1200, 4, 170, 1, 1),
(521, 7, 1, 100, 4, 171, 1, 1),
(522, 8, 1, 100, 4, 171, 1, 1),
(523, 6, 1, 100, 4, 171, 1, 1),
(524, 9, 1, 1200, 4, 171, 1, 1),
(525, 10, 1, 300, 4, 171, 1, 1),
(526, 4, 2, 50, 4, 171, 2, 1),
(527, 3, 3, 120, 4, 171, 3, 1),
(528, 6, 2, 100, 4, 172, 2, 1),
(529, 4, 1, 50, 4, 172, 1, 1),
(530, 8, 1, 100, 4, 172, 1, 1),
(531, 3, 1, 120, 4, 173, 1, 1),
(532, 4, 1, 50, 4, 173, 1, 1),
(534, 6, 1, 100, 4, 173, 1, 1),
(535, 8, 1, 100, 4, 173, 1, 1),
(536, 9, 1, 1200, 4, 173, 1, 1),
(537, 10, 1, 300, 4, 173, 1, 1),
(538, 8, 1, 100, 4, 174, 1, 1),
(539, 9, 1, 1200, 4, 174, 1, 1),
(540, 3, 1, 120, 4, 175, 0, 1),
(541, 6, 1, 100, 4, 175, 0, 1),
(542, 7, 1, 100, 4, 175, 0, 1),
(543, 4, 1, 50, 4, 176, 0, 1),
(544, 7, 1, 100, 4, 176, 0, 1),
(545, 8, 1, 100, 4, 176, 0, 1),
(546, 9, 1, 1200, 4, 176, 0, 1),
(547, 3, 2, 120, 4, 177, 0, 1),
(548, 4, 1, 50, 4, 177, 0, 1),
(549, 6, 1, 100, 4, 177, 0, 1),
(550, 3, 3, 120, 4, 178, 0, 1),
(551, 4, 3, 50, 4, 178, 0, 1),
(552, 6, 2, 100, 4, 178, 0, 1),
(553, 3, 1, 120, 4, 179, 1, 1),
(554, 4, 1, 50, 4, 179, 1, 1),
(555, 6, 1, 100, 4, 179, 1, 1),
(556, 3, 1, 120, 4, 180, 1, 1),
(557, 4, 1, 50, 4, 180, 1, 1),
(558, 6, 1, 100, 4, 180, 1, 1),
(559, 3, 1, 120, 4, 181, 1, 1),
(560, 6, 1, 100, 4, 181, 1, 1),
(561, 7, 1, 100, 4, 181, 1, 1),
(562, 3, 1, 120, 4, 182, 1, 1),
(563, 9, 1, 1200, 4, 182, 1, 1),
(565, 4, 1, 50, 4, 182, 1, 1),
(566, 3, 1, 120, 4, 183, 1, 1),
(568, 4, 1, 50, 4, 183, 1, 1),
(569, 4, 2, 50, 4, 184, 2, 1),
(570, 3, 2, 120, 4, 184, 2, 1),
(571, 4, 1, 50, 4, 185, 1, 1),
(572, 6, 1, 100, 4, 185, 1, 1),
(573, 7, 1, 100, 4, 185, 1, 1),
(574, 6, 1, 100, 4, 186, 1, 1),
(576, 3, 1, 120, 4, 186, 1, 1),
(577, 8, 1, 100, 4, 186, 1, 1),
(578, 9, 1, 1200, 4, 186, 1, 1),
(579, 7, 1, 100, 4, 187, 1, 1),
(580, 8, 1, 100, 4, 187, 1, 1),
(581, 9, 1, 1200, 4, 187, 1, 1),
(583, 3, 2, 120, 4, 188, 2, 1),
(584, 6, 2, 100, 4, 188, 2, 1),
(585, 9, 2, 1200, 4, 188, 2, 1),
(586, 3, 1, 120, 4, 189, 1, 1),
(587, 4, 1, 50, 4, 189, 1, 1),
(588, 6, 1, 100, 4, 189, 1, 1),
(589, 7, 1, 100, 4, 189, 1, 1),
(590, 9, 1, 1200, 4, 189, 1, 1),
(591, 3, 1, 120, 4, 190, 1, 1),
(592, 4, 1, 50, 4, 190, 1, 1),
(593, 6, 1, 100, 4, 190, 1, 1),
(594, 8, 1, 100, 4, 190, 1, 1),
(595, 9, 1, 1200, 4, 190, 1, 1),
(596, 9, 1, 1200, 4, 191, 0, 1),
(597, 10, 1, 300, 4, 191, 0, 1),
(598, 11, 1, 280, 4, 191, 0, 1),
(599, 9, 1, 1200, 4, 192, 0, 1),
(600, 10, 1, 300, 4, 192, 0, 1),
(601, 11, 1, 280, 4, 192, 0, 1),
(602, 3, 1, 120, 4, 193, 1, 1),
(603, 9, 1, 1200, 4, 193, 1, 1),
(604, 3, 1, 120, 4, 194, 0, 1),
(605, 6, 1, 100, 4, 194, 0, 1),
(606, 9, 1, 1200, 4, 194, 0, 1),
(607, 9, 2, 1200, 4, 195, 2, 1),
(608, 10, 1, 300, 4, 195, 1, 1),
(609, 11, 1, 280, 4, 195, 1, 1),
(611, 3, 1, 120, 4, 196, 1, 1),
(612, 4, 1, 50, 4, 196, 1, 1),
(613, 6, 1, 100, 4, 196, 1, 1),
(614, 7, 1, 100, 4, 196, 1, 1),
(615, 8, 1, 100, 4, 196, 1, 1),
(616, 9, 1, 1200, 4, 196, 1, 1),
(617, 6, 1, 100, 4, 197, 1, 1),
(618, 7, 1, 100, 4, 197, 1, 1),
(619, 9, 2, 1200, 4, 197, 2, 1),
(620, 11, 1, 280, 4, 197, 1, 1),
(621, 10, 1, 300, 4, 197, 1, 1),
(622, 8, 1, 100, 4, 197, 1, 1),
(623, 4, 1, 50, 4, 197, 1, 1),
(624, 3, 3, 120, 4, 197, 3, 1),
(625, 6, 2, 100, 4, 198, 2, 1),
(626, 4, 1, 50, 4, 198, 1, 1),
(627, 9, 2, 1200, 4, 198, 2, 1),
(629, 3, 1, 120, 4, 198, 1, 1),
(630, 6, 2, 100, 4, 199, 0, 1),
(631, 9, 1, 1200, 4, 199, 0, 1),
(632, 9, 1, 1200, 4, 200, 1, 1),
(633, 10, 1, 300, 4, 200, 1, 1),
(635, 3, 1, 120, 4, 201, 0, 1),
(636, 4, 1, 50, 4, 201, 0, 1),
(637, 9, 2, 1200, 4, 201, 0, 1),
(639, 3, 2, 120, 4, 202, 0, 1),
(640, 4, 2, 50, 4, 202, 0, 1),
(641, 6, 1, 100, 4, 202, 0, 1),
(642, 7, 2, 100, 4, 202, 0, 1),
(643, 8, 1, 100, 4, 202, 0, 1),
(644, 9, 1, 1200, 4, 202, 0, 1),
(645, 10, 1, 300, 4, 202, 0, 1),
(646, 11, 1, 280, 4, 202, 0, 1),
(647, 6, 1, 100, 4, 203, 0, 1),
(648, 7, 1, 100, 4, 203, 0, 1),
(649, 8, 1, 100, 4, 203, 0, 1),
(650, 9, 1, 1200, 4, 203, 0, 1),
(651, 3, 1, 120, 4, 204, 0, 1),
(652, 4, 1, 50, 4, 204, 0, 1),
(653, 9, 1, 1200, 4, 204, 0, 1),
(654, 3, 1, 120, 4, 205, 0, 1),
(655, 4, 1, 50, 4, 205, 0, 1),
(656, 9, 1, 1200, 4, 205, 0, 1),
(658, 9, 1, 1200, 4, 206, 0, 1),
(659, 3, 1, 120, 4, 207, 0, 1),
(660, 4, 1, 50, 4, 207, 0, 1),
(661, 6, 1, 100, 4, 207, 0, 1),
(662, 7, 1, 100, 4, 207, 0, 1),
(663, 8, 1, 100, 4, 207, 0, 1),
(664, 9, 1, 1200, 4, 207, 0, 1),
(665, 3, 1, 120, 4, 208, 0, 1),
(666, 4, 1, 50, 4, 208, 0, 1),
(667, 6, 1, 100, 4, 208, 0, 1),
(668, 7, 1, 100, 4, 208, 0, 1),
(669, 8, 1, 100, 4, 208, 0, 1),
(670, 9, 1, 1200, 4, 208, 0, 1),
(671, 9, 2, 1200, 4, 209, 0, 1),
(672, 10, 2, 300, 4, 209, 0, 1),
(673, 11, 2, 280, 4, 209, 0, 1),
(674, 8, 2, 100, 4, 209, 0, 1),
(675, 9, 2, 1200, 4, 210, 0, 1),
(676, 10, 2, 300, 4, 210, 0, 1),
(677, 11, 2, 280, 4, 210, 0, 1),
(678, 8, 2, 100, 4, 210, 0, 1),
(679, 10, 1, 300, 4, 211, 0, 1),
(680, 11, 1, 280, 4, 211, 0, 1),
(681, 9, 1, 1200, 4, 211, 0, 1),
(682, 3, 1, 120, 4, 212, 0, 1),
(683, 4, 1, 50, 4, 212, 0, 1),
(684, 6, 1, 100, 4, 212, 0, 1),
(685, 7, 2, 100, 4, 212, 0, 1),
(686, 8, 2, 100, 4, 212, 0, 1),
(687, 9, 2, 1200, 4, 212, 0, 1),
(688, 9, 2, 1200, 4, 213, 0, 1),
(689, 11, 2, 280, 4, 213, 0, 1),
(690, 10, 2, 300, 4, 213, 0, 1),
(691, 4, 2, 50, 4, 214, 2, 1),
(692, 6, 2, 100, 4, 214, 2, 1),
(693, 7, 1, 100, 4, 214, 1, 1),
(694, 8, 1, 100, 4, 214, 1, 1),
(695, 9, 2, 1200, 4, 214, 2, 1),
(696, 3, 3, 120, 4, 215, 0, 1),
(698, 9, 2, 1200, 4, 215, 0, 1),
(699, 4, 1, 50, 4, 216, 0, 1),
(700, 6, 1, 100, 4, 216, 0, 1),
(701, 7, 1, 100, 4, 216, 0, 1),
(702, 8, 1, 100, 4, 216, 0, 1),
(703, 9, 1, 1200, 4, 216, 0, 1),
(704, 11, 1, 280, 4, 217, 0, 1),
(705, 3, 1, 120, 4, 217, 0, 1),
(706, 6, 1, 100, 4, 217, 0, 1),
(707, 4, 1, 50, 4, 218, 0, 1),
(708, 6, 1, 100, 4, 218, 0, 1),
(709, 7, 1, 100, 4, 218, 0, 1),
(710, 8, 1, 100, 4, 218, 0, 1),
(711, 9, 1, 1200, 4, 218, 0, 1),
(712, 10, 1, 300, 4, 218, 0, 1),
(713, 11, 1, 280, 4, 218, 0, 1),
(714, 3, 1, 120, 4, 218, 0, 1),
(715, 4, 2, 50, 4, 219, 2, 1),
(716, 6, 2, 100, 4, 219, 2, 1),
(717, 9, 1, 1200, 4, 219, 1, 1),
(718, 11, 1, 280, 4, 219, 1, 1),
(719, 10, 1, 300, 4, 219, 1, 1),
(720, 8, 1, 100, 4, 219, 1, 1),
(722, 4, 1, 50, 4, 220, 0, 1),
(723, 6, 1, 100, 4, 220, 0, 1),
(724, 7, 2, 100, 4, 220, 0, 1),
(725, 7, 2, 100, 4, 221, 2, 1),
(726, 8, 2, 100, 4, 221, 2, 1),
(727, 9, 2, 1200, 4, 221, 2, 1),
(728, 3, 2, 120, 4, 221, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orderscustomer`
--

CREATE TABLE IF NOT EXISTS`orderscustomer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `gstperc` int(11) NOT NULL,
      PRIMARY KEY (id)

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderscustomer`
--

INSERT INTO `orderscustomer` (`id`, `userId`, `gst`, `totalAmount`, `cartTotal`, `paymentStatus`, `orderStatus`, `deliveryboyid`, `deliverat`, `acceptat`, `deliveryCharge`, `paymentmethod`, `discount`, `couponCode`, `deliveryAddress`, `totalItem`, `orderDate`, `deliverygst`, `gstperc`) VALUES
(149, 2, '81', '911', '630', '1', 5, 3, NULL, NULL, '200', 'cash', '1010', 'FIRST ORDER', 'd1 islamic arcade main university road', '6', '2023-03-07 00:10:39', 0, 13),
(150, 2, '215', '1955', '1540', '1', 5, 3, NULL, NULL, '200', 'cash', '0', 'No Coupon Code Applied', 'd1 islamic arcade main university road', '3', '2023-03-07 00:23:19', 0, 13),
(151, 2, '350', '2610', '2060', '1', 5, 3, NULL, NULL, '200', 'cash', '0', 'No Coupon Code Applied', 'd1 islamic arcade main university road', '7', '2023-03-07 17:41:43', 0, 17),
(152, 2, '408', '3008', '2400', '1', 5, 3, NULL, NULL, '200', 'cash', '0', 'No Coupon Code Applied', 'd1 islamic arcade main university road', '1', '2023-03-07 17:42:58', 0, 17),
(153, 2, '585', '4225', '3440', '1', 5, 3, NULL, NULL, '200', 'cash', '0', 'No Coupon Code Applied', 'd1 islamic arcade main university road', '7', '2023-03-07 18:24:42', 0, 17),
(154, 2, '400', '2950', '2350', '1', 5, 3, NULL, NULL, '200', 'cash', '0', 'No Coupon Code Applied', 'd1 islamic arcade main university road', '9', '2023-03-07 18:24:35', 0, 17),
(155, 2, '128', '1128', '800', '1', 5, 3, NULL, NULL, '200', 'cash', '0', 'No Coupon Code Applied', 'd1 islamic arcade main university road', '5', '2023-03-07 18:30:25', 0, 16),
(156, 2, '32', '432', '200', '1', 6, 3, NULL, NULL, '200', 'cash', '0', 'No Coupon Code Applied', 'd1 islamic arcade main university road', '1', '2023-03-07 19:15:58', 0, 16),
(157, 2, '208', '1708', '1300', '1', 5, 2, NULL, NULL, '200', 'cash', '0', 'No Coupon Code Applied', 'd1 islamic arcade main university road', '2', '2023-03-07 19:23:12', 0, 16),
(158, 2, '224', '1824', '1400', '1', 5, 3, NULL, NULL, '200', 'cash', '0', 'No Coupon Code Applied', 'd1 islamic arcade main university road', '2', '2023-03-07 20:13:29', 0, 16),
(159, 2, '192', '1592', '1200', '1', 5, 2, NULL, NULL, '200', 'cash', '0', 'No Coupon Code Applied', 'd1 islamic arcade main university road', '1', '2023-03-07 20:16:00', 0, 16),
(160, 2, '135', '1175', '840', '1', 5, 2, NULL, NULL, '200', 'cash', '0', 'No Coupon Code Applied', 'd1 islamic arcade main university road', '4', '2023-03-08 21:41:06', 0, 16),
(161, 2, '752', '5652', '4700', '1', 5, 3, NULL, NULL, '200', 'cash', '0', 'No Coupon Code Applied', 'd1 islamic arcade main university road', '9', '2023-03-08 21:44:29', 0, 16),
(162, 2, '165', '1395', '1030', '1', 5, 2, NULL, NULL, '200', 'cash', '0', 'No Coupon Code Applied', 'd1 islamic arcade main university road', '7', '2023-03-08 21:44:20', 0, 16),
(163, 2, '357', '2787', '2230', '1', 5, 2, NULL, NULL, '200', 'cash', '0', 'No Coupon Code Applied', 'd1 islamic arcade main university road', '7', '2023-03-08 21:43:54', 0, 16),
(164, 2, '96', '896', '600', '1', 5, 3, NULL, NULL, '200', 'cash', '0', 'No Coupon Code Applied', 'd1 islamic arcade main university road', '3', '2023-03-08 19:10:26', 0, 16),
(165, 2, '32', '432', '200', '1', 5, 2, NULL, NULL, '200', 'cash', '0', 'No Coupon Code Applied', 'd1 islamic arcade main university road', '2', '2023-03-08 21:44:07', 0, 16),
(166, 2, '228', '1848', '1420', '1', 5, 2, NULL, NULL, '200', 'cash', '0', 'No Coupon Code Applied', 'd1 islamic arcade main university road', '3', '2023-03-08 21:43:34', 0, 16),
(167, 2, '216', '1766', '1350', '1', 5, 3, NULL, NULL, '200', 'cash', '0', 'No Coupon Code Applied', 'd1 islamic arcade main university road', '3', '2023-03-08 21:43:19', 0, 16),
(168, 2, '164', '1384', '1020', '1', 5, 2, NULL, NULL, '200', 'cash', '0', 'No Coupon Code Applied', 'd1 islamic arcade main university road', '5', '2023-03-08 21:43:12', 0, 16),
(169, 2, '44', '514', '270', '1', 5, 3, NULL, NULL, '200', 'cash', '0', 'No Coupon Code Applied', 'd1 islamic arcade main university road', '3', '2023-03-08 21:42:35', 0, 16),
(170, 4, '171', '1436', '1065', '1', 5, 2, NULL, NULL, '200', 'cash', '355', 'FIRST ORDER', '', '3', '2023-03-08 21:42:27', 0, 16),
(171, 4, '362', '2822', '2260', '1', 5, 2, NULL, NULL, '200', 'cash', '0', 'No Coupon Code Applied', '', '7', '2023-03-08 23:42:34', 0, 16),
(172, 4, '56', '606', '350', '1', 5, 2, NULL, NULL, '200', 'cash', '0', 'No Coupon Code Applied', '', '3', '2023-03-08 23:42:43', 0, 16),
(173, 4, '316', '2486', '1970', '1', 5, 2, NULL, NULL, '200', 'cash', '0', 'No Coupon Code Applied', '', '7', '2023-03-08 23:42:56', 0, 16),
(174, 4, '208', '1708', '1300', '1', 5, 2, NULL, NULL, '200', 'cash', '0', 'No Coupon Code Applied', '', '2', '2023-03-08 23:43:09', 0, 16),
(175, 4, '52', '572', '320', '1', 6, 0, NULL, NULL, '200', 'cash', '0', 'No Coupon Code Applied', '', '3', '2023-03-08 23:43:29', 0, 16),
(176, 4, '232', '1882', '1450', '1', 6, 0, NULL, NULL, '200', 'cash', '0', 'No Coupon Code Applied', '', '4', '2023-03-08 23:43:36', 0, 16),
(177, 4, '63', '653', '390', '1', 6, 0, NULL, NULL, '200', 'cash', '0', 'No Coupon Code Applied', '', '3', '2023-03-08 23:43:44', 0, 16),
(178, 4, '114', '1024', '710', '1', 6, 0, NULL, NULL, '200', 'cash', '0', 'No Coupon Code Applied', '', '3', '2023-03-08 23:43:54', 0, 16),
(179, 4, '44', '514', '270', '1', 5, 3, NULL, NULL, '200', 'cash', '0', 'No Coupon Code Applied', '', '3', '2023-03-08 23:44:05', 0, 16),
(180, 4, '44', '514', '270', '1', 5, 2, NULL, NULL, '200', 'cash', '0', 'No Coupon Code Applied', '', '3', '2023-03-08 23:44:15', 0, 16),
(181, 4, '52', '572', '320', '1', 5, 2, NULL, NULL, '200', 'cash', '0', 'No Coupon Code Applied', '', '3', '2023-03-08 23:44:23', 0, 16),
(182, 4, '236', '1906', '1470', '1', 5, 3, NULL, NULL, '200', 'cash', '0', 'No Coupon Code Applied', '', '4', '2023-03-08 23:44:37', 0, 16),
(183, 4, '60', '630', '370', '1', 5, 2, NULL, NULL, '200', 'cash', '0', 'No Coupon Code Applied', '', '3', '2023-03-08 23:44:48', 0, 16),
(184, 4, '55', '595', '340', '1', 5, 2, NULL, NULL, '200', 'cash', '0', 'No Coupon Code Applied', '', '2', '2023-03-08 23:45:00', 0, 16),
(185, 4, '40', '490', '250', '1', 5, 2, NULL, NULL, '200', 'cash', '0', 'No Coupon Code Applied', '', '3', '2023-03-08 23:45:11', 0, 16),
(186, 4, '260', '2080', '1620', '1', 5, 2, NULL, NULL, '200', 'cash', '0', 'No Coupon Code Applied', '', '5', '2023-03-08 23:45:39', 0, 16),
(187, 4, '224', '1824', '1400', '1', 5, 2, NULL, NULL, '200', 'cash', '0', 'No Coupon Code Applied', '', '3', '2023-03-08 23:46:13', 0, 16),
(188, 4, '487', '3727', '3040', '1', 5, 2, NULL, NULL, '200', 'cash', '0', 'No Coupon Code Applied', '', '4', '2023-03-08 23:46:07', 0, 16),
(189, 4, '252', '2022', '1570', '1', 5, 3, NULL, NULL, '200', 'cash', '0', 'No Coupon Code Applied', '', '5', '2023-03-08 23:45:51', 0, 16),
(190, 4, '252', '2022', '1570', '1', 5, 3, NULL, NULL, '200', 'cash', '0', 'No Coupon Code Applied', '', '5', '2023-03-08 23:46:45', 0, 16),
(191, 4, '285', '2265', '1780', '1', 6, 0, NULL, NULL, '200', 'cash', '0', 'No Coupon Code Applied', '', '3', '2023-03-08 23:46:29', 0, 16),
(192, 4, '285', '2265', '1780', '1', 6, 2, NULL, NULL, '200', 'cash', '0', 'No Coupon Code Applied', '', '3', '2023-03-08 23:46:22', 0, 16),
(193, 4, '212', '1732', '1320', '1', 5, 2, NULL, NULL, '200', 'cash', '0', 'No Coupon Code Applied', '', '2', '2023-03-08 23:43:20', 0, 16),
(194, 4, '228', '1848', '1420', '1', 6, 0, NULL, NULL, '200', 'cash', '0', 'No Coupon Code Applied', '', '3', '2023-03-10 18:10:30', 0, 16),
(195, 4, '493', '3773', '3080', '1', 5, 3, NULL, NULL, '200', 'cash', '0', 'No Coupon Code Applied', '', '4', '2023-03-10 18:10:39', 0, 16),
(196, 4, '301', '2171', '1670', '1', 5, 3, NULL, NULL, '200', 'cash', '0', 'No Coupon Code Applied', '', '6', '2023-03-10 18:10:52', 0, 18),
(197, 4, '665', '4555', '3690', '1', 5, 3, NULL, NULL, '200', 'cash', '0', 'No Coupon Code Applied', '', '8', '2023-03-09 20:39:05', 0, 18),
(198, 4, '517', '3587', '2870', '1', 5, 3, NULL, NULL, '200', 'cash', '0', 'No Coupon Code Applied', '', '5', '2023-03-09 19:09:20', 0, 18),
(199, 4, '252', '1852', '1400', '1', 1, 0, NULL, NULL, '200', 'cash', '0', 'No Coupon Code Applied', '', '2', '2023-03-09 19:11:09', 0, 18),
(200, 4, '306', '2206', '1700', '1', 5, 3, NULL, NULL, '200', 'cash', '0', 'No Coupon Code Applied', '', '3', '2023-03-11 18:16:05', 0, 18),
(201, 4, '463', '3233', '2570', '1', 1, 0, NULL, NULL, '200', 'cash', '0', 'No Coupon Code Applied', '', '3', '2023-03-09 19:18:29', 0, 18),
(202, 4, '490', '3410', '2720', '1', 1, 0, NULL, NULL, '200', 'cash', '0', 'No Coupon Code Applied', '', '9', '2023-03-09 19:26:02', 0, 18),
(203, 4, '270', '1970', '1500', '1', 1, 0, NULL, NULL, '200', 'cash', '0', 'No Coupon Code Applied', '', '4', '2023-03-09 20:22:46', 0, 18),
(204, 4, '247', '1817', '1370', '1', 1, 0, NULL, NULL, '200', 'cash', '0', 'No Coupon Code Applied', '', '3', '2023-03-09 20:27:16', 0, 18),
(205, 4, '247', '1817', '1370', '1', 1, 0, NULL, NULL, '200', 'cash', '0', 'No Coupon Code Applied', '', '3', '2023-03-09 20:27:17', 0, 18),
(206, 4, '216', '1616', '1200', '1', 1, 0, NULL, NULL, '200', 'cash', '0', 'No Coupon Code Applied', '', '1', '2023-03-11 18:16:14', 0, 18),
(207, 4, '301', '2171', '1670', '1', 1, 0, NULL, NULL, '200', 'cash', '0', 'No Coupon Code Applied', '', '6', '2023-03-09 20:33:14', 0, 18),
(208, 4, '301', '2171', '1670', '1', 1, 0, NULL, NULL, '200', 'cash', '0', 'No Coupon Code Applied', '', '6', '2023-03-09 20:33:15', 0, 18),
(209, 4, '677', '4637', '3760', '1', 1, 0, NULL, NULL, '200', 'cash', '0', 'No Coupon Code Applied', '', '4', '2023-03-09 20:38:15', 0, 18),
(210, 4, '677', '4637', '3760', '1', 1, 0, NULL, NULL, '200', 'cash', '0', 'No Coupon Code Applied', '', '4', '2023-03-09 20:38:18', 0, 18),
(211, 4, '321', '2301', '1780', '1', 1, 0, NULL, NULL, '200', 'cash', '0', 'No Coupon Code Applied', '', '3', '2023-03-09 21:13:10', 0, 18),
(212, 4, '553', '3823', '3070', '1', 1, 0, NULL, NULL, '200', 'cash', '0', 'No Coupon Code Applied', '', '6', '2023-03-10 18:05:13', 0, 18),
(213, 4, '641', '4401', '3560', '1', 1, 0, NULL, NULL, '200', 'cash', '0', 'No Coupon Code Applied', '', '3', '2023-03-10 18:07:55', 0, 18),
(214, 4, '522', '3622', '2900', '1', 5, 3, NULL, NULL, '200', 'cash', '0', 'No Coupon Code Applied', '', '5', '2023-03-10 18:11:06', 0, 18),
(215, 4, '515', '3575', '2860', '1', 1, 0, NULL, NULL, '200', 'cash', '0', 'No Coupon Code Applied', '', '3', '2023-03-10 19:24:25', 0, 18),
(216, 4, '279', '2029', '1550', '1', 1, 0, NULL, NULL, '200', 'cash', '0', 'No Coupon Code Applied', '', '5', '2023-03-10 21:12:03', 0, 18),
(217, 4, '90', '790', '500', '1', 1, 0, NULL, NULL, '200', 'cash', '0', 'No Coupon Code Applied', '', '3', '2023-03-10 22:26:26', 0, 18),
(218, 4, '405', '2855', '2250', '1', 1, 0, NULL, NULL, '200', 'cash', '0', 'No Coupon Code Applied', '', '8', '2023-03-10 22:30:29', 0, 18),
(219, 4, '411', '2891', '2280', '1', 5, 3, NULL, NULL, '200', 'cash', '0', 'No Coupon Code Applied', '', '7', '2023-03-11 18:15:54', 0, 18),
(220, 4, '63', '613', '350', '1', 6, 0, NULL, NULL, '200', 'cash', '0', 'No Coupon Code Applied', '', '3', '2023-03-11 18:15:45', 0, 18),
(221, 4, '548', '3788', '3040', '1', 5, 2, NULL, NULL, '200', 'cash', '0', 'No Coupon Code Applied', '', '4', '2023-03-11 18:15:38', 0, 18);

-- --------------------------------------------------------

--
-- Table structure for table `productrating`
--

CREATE TABLE IF NOT EXISTS `productrating` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rating` int(11) DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `comment` varchar(255) NOT NULL,
      PRIMARY KEY (id)

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

CREATE TABLE IF NOT EXISTS`products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `productName` varchar(255) DEFAULT NULL,
  `productqty` varchar(255) DEFAULT NULL,
  `keyword` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `status` enum('1','0') DEFAULT NULL,
  `added_on` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `image` varchar(255) NOT NULL,
      PRIMARY KEY (id)

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `productName`, `productqty`, `keyword`, `price`, `status`, `added_on`, `image`) VALUES
(2, 'Potato', '173', 'Potato', '100', '0', '2023-03-11 18:15:22', 'productImage/potato.png'),
(3, 'Cabbage', '100', 'Cabbage', '120', '1', '2023-03-06 01:34:48', 'productImage/1676095070.png'),
(4, 'Carrot', '100', 'Carrot', '50', '1', '2023-03-07 00:11:17', 'productImage/1676095337.png'),
(6, 'Spanish', '253', 'Spanish', '100', '1', '2023-03-04 21:25:01', 'productImage/1677990301.jpg'),
(7, 'Cauliflower', '178', 'Cauliflower', '100', '1', '2023-03-06 01:38:19', 'productImage/1676097285.jpg'),
(8, 'Onion', '100', 'Onion', '100', '1', '2023-03-03 20:29:37', 'productImage/1676961159.png'),
(9, 'Millac', '100', 'Millac', '1200', '1', '2023-03-04 21:11:33', 'productImage/1677989493.jpg'),
(10, 'Masoor', '100', 'Masoor', '300', '1', '2023-03-04 21:14:33', 'productImage/1677989673.jpg'),
(11, 'Chana Daal', '100', 'Chana Daal', '280', '1', '2023-03-07 12:51:39', 'productImage/1677989801.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE IF NOT EXISTS `reviews` (
      `id` INT AUTO_INCREMENT,
  `deliveryboyid` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `review` varchar(255) DEFAULT NULL,
  `order_id` varchar(255) DEFAULT NULL,
  `review_date` datetime DEFAULT NULL ON UPDATE current_timestamp(),
      primary key(id)

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `riderrating`
--

CREATE TABLE IF NOT EXISTS `riderrating` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rating` int(11) DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL,
  `rider_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `date_rate` datetime NOT NULL DEFAULT current_timestamp(),
      PRIMARY KEY (id)

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

CREATE TABLE IF NOT EXISTS `setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `company_linkend` varchar(255) NOT NULL,
      PRIMARY KEY (id)

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `deliveryCharge`, `webSiteStatus`, `gst`, `minOrder`, `deliverygst`, `company_mobile`, `company_email`, `comapny_twitter`, `comapny_facebook`, `comapny_instragram`, `company_linkend`) VALUES
(1, '200', '0', '18', 200, 0, '3357467403', 'abdulsamadahsan@gmail.com', 'https://twitter.com/', 'https://facebook.com', 'https://instagram.com/', 'https://linkedin.com/');

-- --------------------------------------------------------

--
-- Table structure for table `statusorder`
--

CREATE TABLE IF NOT EXISTS `statusorder` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status_id` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
      PRIMARY KEY (id)
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

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `password` text DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `status` enum('1','0') DEFAULT NULL,
  `added_on` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `otp` int(11) NOT NULL,
  `otp_verify` int(11) NOT NULL,
      PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `mobile`, `password`, `email`, `status`, `added_on`, `otp`, `otp_verify`) VALUES
(1, 'Waqar', '923323565866', '$2y$12$XjfNg5NtFNIFb9yvHnjWj.DYhfe/Hkiqg1jACDPHnuVCJslptn6ti', 'waqar@gmail.com', '0', '2023-02-28 22:20:53', 0, 0),
(2, 'Asif', '923111234567', '$2y$12$vk7oiev9uNZyalIM2A3kw.91qmDtMOs877EG4dUVqpA1aSNiVgXKu', 'asif@gmail.com', '0', '2023-03-10 18:03:00', 0, 0),
(3, 'Naseem', '923323565866', '$2y$12$nwe9ioJ14wNeJpdogG75c.rsYoSc57s235Ct7Wy1biNvc2J4B2lC6', 'ep19102077.naseem@gmail.com', '0', '2023-03-10 18:16:01', 0, 0),
(4, 'Samad', '9234321462082', '$2y$12$WE4t32YSZwjzseH1q2LzXe/87gkz/V4.Y16h9YWcH2lLMtN6fngHm', 'abdulsamadahsan@gmail.com', '1', '2023-03-11 18:18:06', 0, 1),
(5, 'ali', '9234321462092', '$2y$12$66pzbMzpfenwz94otnzLLuFodNccsQvAH30mDlA4RCwBLKFWAyaF6', 'ali@gmail.com', '0', '2023-02-28 22:24:42', 0, 0);

CREATE TABLE `vendor_earning` (`vendor_id` INT NOT NULL ,  `amount` INT NOT NULL , `order_data` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ) ENGINE = InnoDB;
