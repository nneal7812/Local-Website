-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2025 at 08:45 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student_space`
--
CREATE DATABASE IF NOT EXISTS `student_space` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `student_space`;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE `customer` (
  `cc_no` decimal(16,0) NOT NULL,
  `exp_mo` decimal(2,0) NOT NULL,
  `exp_yr` decimal(4,0) NOT NULL,
  `name_first` varchar(20) NOT NULL,
  `name_last` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `address1` varchar(50) NOT NULL,
  `address2` varchar(50) DEFAULT NULL,
  `city` varchar(20) NOT NULL,
  `state` varchar(2) NOT NULL,
  `zip` decimal(5,0) NOT NULL,
  `country` varchar(20) DEFAULT NULL,
  `phone` varchar(15) NOT NULL,
  `fax` varchar(15) NOT NULL,
  `mail_list` decimal(1,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cc_no`, `exp_mo`, `exp_yr`, `name_first`, `name_last`, `email`, `address1`, `address2`, `city`, `state`, `zip`, `country`, `phone`, `fax`, `mail_list`) VALUES
(9230840329843290, 11, 2034, 'Caden', 'Sibert', 'abc@aol.com', 'idekanymore ave', '', 'town and city', 'ar', 39398, 'United States', '2348972812', '9234808271', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders1`
--

DROP TABLE IF EXISTS `orders1`;
CREATE TABLE `orders1` (
  `CustomerNo` decimal(16,0) NOT NULL,
  `ItemNo` decimal(4,0) NOT NULL,
  `Quantity` decimal(3,0) NOT NULL,
  `Date_Sold` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders1`
--

INSERT INTO `orders1` (`CustomerNo`, `ItemNo`, `Quantity`, `Date_Sold`) VALUES
(9230840329843290, 1, 5, '2024-04-22');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `item_no` decimal(4,0) NOT NULL,
  `ebook_name` varchar(30) NOT NULL,
  `description` varchar(200) NOT NULL,
  `image` varchar(30) NOT NULL,
  `price` decimal(9,2) NOT NULL,
  `inventory` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`item_no`, `ebook_name`, `description`, `image`, `price`, `inventory`) VALUES
(1, 'The Daniel Plan', 'The Tried and Tested Dietary Plan to Change Your Life.', 'e-books/health/healthPlan.jpg', 2.99, 0),
(2, 'The Exercise Cure', 'A Doctor\'s All Natural Solution to Better Health and a Longer Life', 'e-books/health/NoExercise.jpg', 1.99, 5),
(3, 'Hands Free Mama', 'Become a Multi-Tasking Mama with Less Stress', 'e-books/parenting/Mama.jpg', 0.99, 5),
(4, 'Soul Healing', 'A Guide to a Happy and Healthy Life by Basic Lifestyle Changes', 'e-books/health/Soul.jpg', 1.99, 5),
(5, 'Talk to Kids', 'A Guide to Communicating with Your Children', 'e-books/parenting/talk.jpg', 2.99, 5),
(6, 'The First Year', 'A Health and Exercise Guide for mothers in their First Year.', 'e-books/parenting/expect1.jpg', 1.99, 5),
(7, 'What To Expect', 'A Health and Exercise Guide for Expecting Mothers', 'e-books/parenting/expect.jpg', 3.99, 5),
(8, 'Wheat Belly', 'Wheat - The Real Wonder Food for the 21st Century', 'e-books/health/WheatBelly.jpg', 0.99, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cc_no`);

--
-- Indexes for table `orders1`
--
ALTER TABLE `orders1`
  ADD PRIMARY KEY (`CustomerNo`,`ItemNo`),
  ADD KEY `Orders1_itemNo_fk` (`ItemNo`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`item_no`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders1`
--
ALTER TABLE `orders1`
  ADD CONSTRAINT `Orders1_customerNo_fk` FOREIGN KEY (`CustomerNo`) REFERENCES `customer` (`cc_no`),
  ADD CONSTRAINT `Orders1_itemNo_fk` FOREIGN KEY (`ItemNo`) REFERENCES `product` (`item_no`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
