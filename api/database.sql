-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 13, 2022 at 05:33 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19
-- Table Structure for admin table
CREATE TABLE IF NOT EXISTS `admins`(
`id` INT AUTO_INCREMENT,
`mobile` VARCHAR(255) NOT NULL,
`username` VARCHAR(255) NOT NULL,
`password` TEXT ,
`added_on` DATETIME on update CURRENT_TIMESTAMP,
primary key (id)
);
CREATE  TABLE  IF NOT EXISTS `apikey`(
  `id` INT,
  `apikey` VARCHAR(255),
  `hit` VARCHAR(255),
  `hitlimit` VARCHAR(255),
  `expirydate` DATETIME on update CURRENT_TIMESTAMP,
  `status` VARCHAR(255)
);
-- Table Structure for users table 
CREATE TABLE IF NOT EXISTS `users`(
   `id` INT AUTO_INCREMENT,
   `username` VARCHAR(255) NOT NULL,
   `mobile` VARCHAR(255) NOT NULL,
   `password` TEXT ,
   `email` VARCHAR(255),
   `status` ENUM('1','0'),
   `added_on` DATETIME on update CURRENT_TIMESTAMP,
PRIMARY KEY (id)
);
-- Table Structure for product
CREATE table if NOT EXISTS `products`(
`id` INT AUTO_INCRement,
`productName` VARCHAR(255),
`qty` VARCHAR(255),
`keyword` VARCHAR (255),
`price` VARCHAR (255),
`status` ENUM('1','0'),
`image` VARCHAR(255),
`added_on`DATETIME on update CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
) ;
-- Table Structure for cart
Create table if not exists carts (
    `id` INT AUTO_INCRement,
    `userId` INT ,
    `productID`INT,
    `userType` VARCHAR(255),
    `qty` VARCHAR(255),
    `price` VARCHAR(255),
    FOREIGN KEY (userId) REFERENCES users(id) ON UPDATE CASCADE ON DELETE CASCADE,
    FOREIGN key (productID) REFERENCES products(id) ON UPDATE CASCADE ON DELETE CASCADE,
    PRIMARY KEY (id)
);
-- Table Structure for order
CREATE TABLE IF NOT EXISTS `ordersCustomer`(
 `id`  INT AUTO_INCRement,
  `userId` INT,
  `gst` VARCHAR(255),
  `totalAmount` VARCHAR(255),
  `cartTotal`VarCHar(255),
  `paymentStatus` ENUM('0','1'),
  `orderStatus` INT ,
   `deliveryboyid` INT ,
   `deliverat` DATETIME,
   `acceptat` DATETIME,
   `deliveryCharge` VARCHAR(255),
   `paymentmethod` VARCHAR(255),
   `discount` VARCHAR(255),
   `couponCode` VARCHAR(255),
   `deliveryAddress` VARCHAR(255),
   `totalItem`VARCHAR(255),
  `orderDate` DATETIME on update CURRENT_TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
PRIMARY KEY(id)
);
-- Table Structure for delivery boy
Create TABle if not EXISTS `deliveryboy`(
 `id`  INT AUTO_INCRement,
 `mobile` VARCHAR(255),
 `username` VARCHAR(255),
 `location` VARCHAR(255),
 `password` VARCHAR(255),
 `added_on`DATETIME on update CURRENT_TIMESTAMP,
  PRIMARY key (id)
);
-- Table Structure for assign order
CREATE TABLE if not Exists `assignOrder`(
 `id`  INT AUTO_INCRement,
 `order_id` INT,
 `deliveryboyid` INT,
 primary key(id)
);
-- Table Structure for rider rating
CREATE Table if not exists `riderrating`(
`id` INT AUTO_INCRement ,
`rating` INT,
`order_id` INT,
`rider_id` INT,
`user_id` INT,
primary key(id)
);
CREATE Table if not exists `productrating`(
`id` INT AUTO_INCRement ,
`rating` INT,
`order_id` INT,
`product_id` INT,
`user_id` INT,
primary key(id)
);
-- Table Structure for order detail
CREATE Table if not exists `orderdetail`(
`id` INT AUTO_INCRement ,
`product_id` INT,
`order_id` INT,
`qty` INT,
`price`INT,
`user_id` INT,
primary key(id)
);
-- Table structure for reviews 
CREATE TABLE if not EXISTS `reviews`(
`deliveryboyid` INT ,
`user_id` INT,
`review` VARCHAR(255),
`order_id` VARCHAR(255),
`review_date` DATETIME ON update CURRENT_TIMESTAMP
);
CREATE TABLE if not EXISTS `StatusOrder`(
`id` INT AUTO_INCREMENT ,
`status_id` INT,
`status` VARCHAR(255),
PRIMARY KEY (id)
);
CREATE TABLE IF NOT EXISTS `setting`(
  `id` INT AUTO_INCREMENT,
  `deliveryCharge` VARCHAR(255),
  `gst` VARCHAR(255),
  `webSiteStatus` ENUM('1','0','2'),
PRIMARY KEY (id)
);
CREATE TABLE IF NOT EXISTS `couponcodes` (`coupon_id` INT NOT NULL AUTO_INCREMENT , `coupon_code` VARCHAR(255) NOT NULL , `max_discount` INT NOT NULL , `discount` INT NOT NULL , `min_cart_value` INT NOT NULL , `discount_type` ENUM("perc","value") NOT NULL ,
 PRIMARY KEY (`coupon_id`)) ENGINE = InnoDB;

ALTER TABLE orderdetail ADD FOREIGN KEY (user_id) REFERENCES users(id);
ALTER TABLE orderdetail ADD FOREIGN KEY (order_id) REFERENCES orderscustomer(id);
SELECT count(*),orderdetail.price,product_id,SUM(orderdetail.qty)as qty_sold,sum(orderdetail.qty)*orderdetail.price as revenue,products.productName,products.image
FROM `orderdetail` LEFT JOIN products ON orderdetail.product_id=products.id GROUP by product_id order by qty_sold DESC limit 3;