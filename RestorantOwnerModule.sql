-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 17, 2022 at 12:02 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `foody`
--

-- --------------------------------------------------------

--
-- Table structure for table `Food`
--

CREATE TABLE `Food` (
  `food_ID` varchar(10) NOT NULL,
  `restaurant_ID` varchar(10) NOT NULL,
  `food_title` varchar(30) NOT NULL,
  `food_description` text DEFAULT NULL,
  `food_price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `Restaurant`
--

CREATE TABLE `Restaurant` (
  `restaurant_ID` varchar(10) NOT NULL,
  `ro_ID` varchar(10) NOT NULL,
  `restaurant_name` varchar(30) NOT NULL,
  `restaurant_description` text DEFAULT NULL,
  `restaurant_address` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `RestaurantOwner`
--

CREATE TABLE `RestaurantOwner` (
  `ro_ID` varchar(10) NOT NULL,
  `ro_name` varchar(30) NOT NULL,
  `ro_email` varchar(30) NOT NULL,
  `ro_phoneNum` varchar(15) NOT NULL,
  `ro_password` varchar(20) NOT NULL,
  `ro_address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Food`
--
ALTER TABLE `Food`
  ADD PRIMARY KEY (`food_ID`),
  ADD KEY `restaurant_ID` (`restaurant_ID`);

--
-- Indexes for table `Restaurant`
--
ALTER TABLE `Restaurant`
  ADD PRIMARY KEY (`restaurant_ID`),
  ADD KEY `ro_ID` (`ro_ID`);

--
-- Indexes for table `RestaurantOwner`
--
ALTER TABLE `RestaurantOwner`
  ADD PRIMARY KEY (`ro_ID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Food`
--
ALTER TABLE `Food`
  ADD CONSTRAINT `Food_ibfk_1` FOREIGN KEY (`restaurant_ID`) REFERENCES `Restaurant` (`restaurant_ID`);

--
-- Constraints for table `Restaurant`
--
ALTER TABLE `Restaurant`
  ADD CONSTRAINT `Restaurant_ibfk_1` FOREIGN KEY (`ro_ID`) REFERENCES `RestaurantOwner` (`ro_ID`);
COMMIT;