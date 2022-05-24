-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2022 at 06:56 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foody`
--

-- --------------------------------------------------------

--
-- Table structure for table `expensesrecord`
--

CREATE TABLE `expensesrecord` (
  `expense_ID` varchar(10) NOT NULL,
  `user_ID` varchar(10) NOT NULL,
  `expenses_title` varchar(50) NOT NULL,
  `expenses_description` varchar(200) NOT NULL,
  `expenses_date` date NOT NULL,
  `expenses_amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_ID` varchar(10) NOT NULL,
  `restaurant_ID` varchar(10) NOT NULL,
  `rider_ID` varchar(10) NOT NULL,
  `user_ID` varchar(10) NOT NULL,
  `extra_note` varchar(100) NOT NULL,
  `order_date` date NOT NULL,
  `total_amount` int(11) NOT NULL,
  `order_status` varchar(20) NOT NULL,
  `order_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orderedfood`
--

CREATE TABLE `orderedfood` (
  `order_ID` varchar(10) NOT NULL,
  `restaurant_ID` varchar(10) NOT NULL,
  `food_ID` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `restaurant_ID` varchar(10) NOT NULL,
  `ro_ID` varchar(10) NOT NULL,
  `restaurant_name` varchar(30) NOT NULL,
  `restaurant_image` varchar(255) NOT NULL,
  `restaurantType_ID` varchar(10) NOT NULL,
  `restaurant_descripton` text NOT NULL,
  `restaurant_address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `restauranttype`
--

CREATE TABLE `restauranttype` (
  `restaurantType_ID` varchar(10) NOT NULL,
  `restaurantType_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_ID` varchar(10) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `user_email` varchar(30) NOT NULL,
  `user_phoneNum` varchar(11) NOT NULL,
  `user_password` varchar(20) NOT NULL,
  `user_address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `expensesrecord`
--
ALTER TABLE `expensesrecord`
  ADD KEY `user_ID` (`user_ID`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_ID`);

--
-- Indexes for table `orderedfood`
--
ALTER TABLE `orderedfood`
  ADD KEY `order_ID` (`order_ID`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`restaurant_ID`),
  ADD KEY `restaurantType_ID` (`restaurantType_ID`);

--
-- Indexes for table `restauranttype`
--
ALTER TABLE `restauranttype`
  ADD PRIMARY KEY (`restaurantType_ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_ID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `expensesrecord`
--
ALTER TABLE `expensesrecord`
  ADD CONSTRAINT `expensesrecord_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `user` (`user_ID`);

--
-- Constraints for table `orderedfood`
--
ALTER TABLE `orderedfood`
  ADD CONSTRAINT `orderedfood_ibfk_1` FOREIGN KEY (`order_ID`) REFERENCES `order` (`order_ID`);

--
-- Constraints for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD CONSTRAINT `restaurant_ibfk_1` FOREIGN KEY (`restaurantType_ID`) REFERENCES `restauranttype` (`restaurantType_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
