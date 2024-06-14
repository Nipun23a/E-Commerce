-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2024 at 02:11 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webvivadb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `code` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `code`) VALUES
(1, 'i.chapa10070@gmail.com', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `name`, `status_id`) VALUES
(1, 'Apple', 1),
(2, 'Samsung', 1),
(3, 'Vivo', 1),
(4, 'Sony', 1),
(5, 'HTC', 1),
(6, 'Huawei', 1),
(7, 'Nokia', 1),
(8, 'One Plus', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `product_id`, `user_email`, `qty`) VALUES
(40, 31, 'wijayapasindu475@gmail.com', 1),
(41, 32, 'wijayapasindu475@gmail.com', 1),
(42, 32, 'wijayapasindu475@gmail.com', 1),
(43, 29, 'wijayapasindu475@gmail.com', 1),
(44, 30, 'wijayapasindu475@gmail.com', 1),
(45, 30, 'nipunakaweya@gmail.com', 1),
(46, 31, 'nipunakaweya@gmail.com', 1),
(48, 52, 'i.chapa10070@gmail.com', 1),
(49, 30, 'i.chapa10070@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `status_id`) VALUES
(1, 'Cell Phones & Accessories', 1),
(2, 'Computer & Tablets', 1),
(3, 'Cameras', 1),
(4, 'Camera Drones', 2),
(5, 'Video Game Console', 1),
(6, 'Microphones', 2),
(7, 'Batteries', 1),
(8, 'aa', 2),
(9, 'pc', 2);

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `district_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `name`, `district_id`) VALUES
(1, 'Colombo', 1),
(2, 'Kesbew', 1),
(3, 'Mathugama', 2),
(4, 'Katugasthota', 3);

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

CREATE TABLE `color` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `color`
--

INSERT INTO `color` (`id`, `name`, `status_id`) VALUES
(1, 'Rose Gold', 1),
(2, 'Ocean Blue', 1),
(3, 'Dark Gray', 1);

-- --------------------------------------------------------

--
-- Table structure for table `condition`
--

CREATE TABLE `condition` (
  `id` int(11) NOT NULL,
  `name` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `condition`
--

INSERT INTO `condition` (`id`, `name`) VALUES
(0, 'Brandnew'),
(1, 'Used');

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `province_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`id`, `name`, `province_id`) VALUES
(1, 'Colombo', 9),
(2, 'Kaluthara', 9),
(3, 'Kandy', 1);

-- --------------------------------------------------------

--
-- Table structure for table `gender`
--

CREATE TABLE `gender` (
  `id` int(11) NOT NULL,
  `gender_name` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `gender`
--

INSERT INTO `gender` (`id`, `gender_name`) VALUES
(0, 'Male'),
(1, 'Female');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `code` varchar(256) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`code`, `product_id`) VALUES
('resources/product_images/sony.jpg', 19),
('resources/product_images/sony.webp', 20),
('resources/product_images/apple-iphone-12-pro-max.jpg', 29),
('resources/product_images/apple-iphone-7-plus-red.jpg', 30),
('resources/product_images/apple 11--1571916185.jpg', 31),
('resources/product_images/htc.jpg	', 32),
('resources/product_images/666a792e46a3f4.06656847.jpeg', 52);

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(11) NOT NULL,
  `order_id` varchar(50) DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `users_email` varchar(100) NOT NULL,
  `buyer_email` varchar(100) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `total` double DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `order_id`, `product_id`, `users_email`, `buyer_email`, `date`, `total`, `qty`, `status`) VALUES
(12, '666addd78394b', 30, 'wijayapasindu475@gmail.com', 'i.chapa10070@gmail.com', '2024-06-13 17:23:59', 50000, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `from` varchar(100) DEFAULT NULL,
  `to` varchar(100) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `date_time` datetime DEFAULT NULL,
  `status` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `from`, `to`, `content`, `date_time`, `status`) VALUES
(1, 'aaaa@gmail.com', 'thinuka1@gmail.com', 'dadadada', '2022-07-11 20:06:33', 1),
(5, 'thinuka1@gmail.com', 'aaaa@gmail.com', 'nfgghbkghfc', '2022-07-11 21:59:06', 1),
(6, 'aaaa@gmail.com', 'thinuka1@gmail.com', ',hhv,bjgv', '2022-07-11 21:59:33', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model`
--

CREATE TABLE `model` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `model`
--

INSERT INTO `model` (`id`, `name`, `status_id`) VALUES
(1, 'iPhone 12', 1),
(2, 'iPhone 11', 1),
(3, 'iPhone X', 1),
(4, 'iPhone 8', 1),
(5, 'iPhone 7', 1),
(6, 'HTC', 1),
(7, 'S21 5G', 1),
(8, 'P40 5G', 1),
(9, 'Nova 9 SE 5G', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_brand`
--

CREATE TABLE `model_has_brand` (
  `model_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `model_has_brand`
--

INSERT INTO `model_has_brand` (`model_id`, `brand_id`, `id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(2, 1, 7),
(6, 5, 8),
(6, 5, 9),
(7, 2, 10),
(8, 6, 11),
(9, 6, 12);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `price` double DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `datetime_added` datetime DEFAULT NULL,
  `delivery_fee` double DEFAULT NULL,
  `status_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `model_has_brand_id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL,
  `condition_id` int(11) NOT NULL,
  `users_email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `price`, `qty`, `description`, `title`, `datetime_added`, `delivery_fee`, `status_id`, `category_id`, `model_has_brand_id`, `color_id`, `condition_id`, `users_email`) VALUES
(19, 80000, 1, 'Good Condition', 'Sony Camara', '2022-12-04 06:50:32', 3000, 0, 3, 4, 3, 0, 'kalum@gmail.com'),
(20, 80000, 1, 'Good Condition', 'Sony Camara', '2022-12-04 06:56:45', 3000, 0, 3, 4, 3, 0, 'wijayapasindu475@gmail.com'),
(29, 50000, 10, 'Features 6.7″ display, Apple A14 Bionic chipset, 3687 mAh battery, 512 GB storage, 6 GB RAM', 'iPhone 12 Pro Max', '2023-01-07 09:59:45', 3000, 1, 1, 1, 1, 0, 'wijayapasindu475@gmail.com'),
(30, 50000, 10, 'Features 6.5″ display, Apple A13 Bionic chipset, 3969 mAh battery, 512 GB storage, 4 GB RAM', 'iPhone 11 Pro Max', '2023-01-07 10:03:07', 3000, 1, 1, 1, 1, 0, 'wijayapasindu475@gmail.com'),
(31, 70000, 15, ' iOS 10.0.1, up to iOS 15.7. 32GB/128GB/256GB storage,', 'iPhone 7 Plus', '2023-01-07 10:05:07', 2000, 1, 1, 1, 1, 0, 'kalum@gmail.com'),
(32, 60000, 12, 'Features 6.0″ display, Snapdragon 845 chipset, 3500 mAh battery, 128 GB storage, 6 GB RAM, Corning Gorilla', 'HTC Quantam A', '2023-01-07 10:08:05', 1000, 1, 1, 5, 3, 0, 'kalum@gmail.com'),
(52, 10, 3, 'Good Product', 'ff', '2024-06-13 06:44:30', 101, 1, 1, 1, 1, 0, 'i.chapa10070@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `profile_image`
--
-- Error reading structure for table webvivadb.profile_image: #1932 - Table &#039;webvivadb.profile_image&#039; doesn&#039;t exist in engine
-- Error reading data for table webvivadb.profile_image: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `webvivadb`.`profile_image`&#039; at line 1

-- --------------------------------------------------------

--
-- Table structure for table `province`
--

CREATE TABLE `province` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `province`
--

INSERT INTO `province` (`id`, `name`) VALUES
(1, 'Central'),
(2, 'Eastern'),
(3, 'North Central'),
(4, ' Northern'),
(5, 'North Western'),
(6, ' Sabaragamuwa	'),
(7, ' Southern	'),
(8, 'Uva'),
(9, ' Western');

-- --------------------------------------------------------

--
-- Table structure for table `recent`
--

CREATE TABLE `recent` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `users_email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `name` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `name`) VALUES
(0, 'Deactive'),
(1, 'Active'),
(2, 'Removed');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `fname` varchar(50) DEFAULT NULL,
  `lname` varchar(50) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(20) DEFAULT NULL,
  `mobile` varchar(10) DEFAULT NULL,
  `joined_date` datetime DEFAULT NULL,
  `verification_code` varchar(20) DEFAULT NULL,
  `status_id` int(11) NOT NULL,
  `gender_id` int(11) NOT NULL,
  `user_image` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`fname`, `lname`, `email`, `password`, `mobile`, `joined_date`, `verification_code`, `status_id`, `gender_id`, `user_image`) VALUES
('I', 'Chapa', 'i.chapa10070@gmail.com', 'chapa123', '0750210996', '2024-05-31 13:55:13', NULL, 1, 1, 'resources/users666ac6f48b636.jpeg'),
('Kalum', 'Lakmal', 'kalum@gmail.com', '123456', '0775656789', '2022-11-28 17:22:36', NULL, 1, 0, NULL),
('Nipuna', 'Kaweya', 'nipunakaweya@gmail.com', 'nipuna1234', '0762901179', '2024-05-29 19:03:06', NULL, 1, 0, NULL),
('Samantha', 'Sanjeewa', 'samantha@gmail.com', '123456', '0773434567', '2022-11-28 17:14:43', NULL, 1, 0, NULL),
('Pasindu', 'Lakshan', 'wijayapasindu475@gmail.com', '123456', '0773434567', '2022-11-28 17:19:44', '66575dbf7c353', 1, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_has_address`
--

CREATE TABLE `user_has_address` (
  `id` int(11) NOT NULL,
  `line1` text DEFAULT NULL,
  `line2` text DEFAULT NULL,
  `users_email` varchar(100) NOT NULL,
  `city_id` int(11) NOT NULL,
  `postal_code` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `user_has_address`
--

INSERT INTO `user_has_address` (`id`, `line1`, `line2`, `users_email`, `city_id`, `postal_code`) VALUES
(1, '210/1,Street1 Lane,Katugathota', '', 'i.chapa10070@gmail.com', 3, '20600');

-- --------------------------------------------------------

--
-- Table structure for table `watchlist`
--

CREATE TABLE `watchlist` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `users_email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `watchlist`
--

INSERT INTO `watchlist` (`id`, `product_id`, `users_email`) VALUES
(3, 32, 'wijayapasindu475@gmail.com'),
(4, 31, 'wijayapasindu475@gmail.com'),
(5, 31, 'i.chapa10070@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_admin_users` (`email`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_brand_status` (`status_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK__product` (`product_id`),
  ADD KEY `FK__users` (`user_email`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_category_status` (`status_id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_city_district1_idx` (`district_id`);

--
-- Indexes for table `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_color_status1_idx` (`status_id`);

--
-- Indexes for table `condition`
--
ALTER TABLE `condition`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_district_province1_idx` (`province_id`);

--
-- Indexes for table `gender`
--
ALTER TABLE `gender`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`code`),
  ADD KEY `fk_images_product1_idx` (`product_id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_invoice_product1_idx` (`product_id`),
  ADD KEY `fk_invoice_users1_idx` (`users_email`),
  ADD KEY `FK_invoice_status` (`status`),
  ADD KEY `FK_invoice_users` (`buyer_email`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_message_users` (`from`),
  ADD KEY `FK_message_users_2` (`to`);

--
-- Indexes for table `model`
--
ALTER TABLE `model`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_model_status` (`status_id`);

--
-- Indexes for table `model_has_brand`
--
ALTER TABLE `model_has_brand`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_model_has_brand_brand1_idx` (`brand_id`),
  ADD KEY `fk_model_has_brand_model1_idx` (`model_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_product_category1_idx` (`category_id`),
  ADD KEY `fk_product_model_has_brand1_idx` (`model_has_brand_id`),
  ADD KEY `fk_product_color1_idx` (`color_id`),
  ADD KEY `fk_product_condition1_idx` (`condition_id`),
  ADD KEY `fk_product_users1_idx` (`users_email`),
  ADD KEY `fk_product_status1_idx` (`status_id`);

--
-- Indexes for table `province`
--
ALTER TABLE `province`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recent`
--
ALTER TABLE `recent`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK__recent_product` (`product_id`),
  ADD KEY `FK__recent_users` (`users_email`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`),
  ADD KEY `fk_users_gender_idx` (`gender_id`),
  ADD KEY `fk_users_status1_idx` (`status_id`);

--
-- Indexes for table `user_has_address`
--
ALTER TABLE `user_has_address`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_has_address_users1_idx` (`users_email`),
  ADD KEY `fk_user_has_address_city1_idx` (`city_id`);

--
-- Indexes for table `watchlist`
--
ALTER TABLE `watchlist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_watchlist_product` (`product_id`),
  ADD KEY `FK_watchlist_users` (`users_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `color`
--
ALTER TABLE `color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `condition`
--
ALTER TABLE `condition`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `gender`
--
ALTER TABLE `gender`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `model`
--
ALTER TABLE `model`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `model_has_brand`
--
ALTER TABLE `model_has_brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `province`
--
ALTER TABLE `province`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `recent`
--
ALTER TABLE `recent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_has_address`
--
ALTER TABLE `user_has_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `watchlist`
--
ALTER TABLE `watchlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `FK_admin_users` FOREIGN KEY (`email`) REFERENCES `users` (`email`) ON UPDATE CASCADE;

--
-- Constraints for table `brand`
--
ALTER TABLE `brand`
  ADD CONSTRAINT `FK_brand_status` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`);

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `FK__product` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `FK__users` FOREIGN KEY (`user_email`) REFERENCES `users` (`email`);

--
-- Constraints for table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `FK_category_status` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`);

--
-- Constraints for table `city`
--
ALTER TABLE `city`
  ADD CONSTRAINT `fk_city_district1` FOREIGN KEY (`district_id`) REFERENCES `district` (`id`);

--
-- Constraints for table `color`
--
ALTER TABLE `color`
  ADD CONSTRAINT `fk_color_status1` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`);

--
-- Constraints for table `district`
--
ALTER TABLE `district`
  ADD CONSTRAINT `fk_district_province1` FOREIGN KEY (`province_id`) REFERENCES `province` (`id`);

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `fk_images_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Constraints for table `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `FK_invoice_status` FOREIGN KEY (`status`) REFERENCES `status` (`id`),
  ADD CONSTRAINT `FK_invoice_users` FOREIGN KEY (`buyer_email`) REFERENCES `users` (`email`),
  ADD CONSTRAINT `fk_invoice_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `fk_invoice_users1` FOREIGN KEY (`users_email`) REFERENCES `users` (`email`);

--
-- Constraints for table `model`
--
ALTER TABLE `model`
  ADD CONSTRAINT `FK_model_status` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
