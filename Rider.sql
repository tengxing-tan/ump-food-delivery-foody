-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2022 at 03:12 PM
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
-- Database: `rider`
--

-- --------------------------------------------------------

--
-- Table structure for table `commission`
--

CREATE TABLE `commission` (
  `commission_ID` varchar(10) NOT NULL,
  `commission_date` date DEFAULT NULL,
  `commission_amount` int(11) DEFAULT NULL,
  `commission_total` int(11) DEFAULT NULL,
  `total_time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `deliverynotes`
--

CREATE TABLE `deliverynotes` (
  `deliveryNotes_ID` varchar(10) NOT NULL,
  `user_ID` varchar(10) NOT NULL,
  `restaurant_ID` varchar(10) NOT NULL,
  `payment_ID` varchar(10) NOT NULL,
  `qr_code` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `deliveryrecord`
--

CREATE TABLE `deliveryrecord` (
  `deliveryRecord_ID` varchar(10) NOT NULL,
  `deliveryNotes_ID` varchar(10) NOT NULL,
  `feedback_ID` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_ID` varchar(10) NOT NULL,
  `user_ID` varchar(10) NOT NULL,
  `feedback_info` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rider`
--

CREATE TABLE `rider` (
  `rider_ID` varchar(10) NOT NULL,
  `rider_name` varchar(30) DEFAULT NULL,
  `rider_email` varchar(30) DEFAULT NULL,
  `rider_phoneNum` varchar(11) DEFAULT NULL,
  `rider_password` varchar(20) DEFAULT NULL,
  `rider_address` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `riderreport`
--

CREATE TABLE `riderreport` (
  `riderReport_ID` varchar(10) NOT NULL,
  `deliveryNotes_ID` varchar(10) NOT NULL,
  `commission_ID` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `commission`
--
ALTER TABLE `commission`
  ADD PRIMARY KEY (`commission_ID`);

--
-- Indexes for table `deliverynotes`
--
ALTER TABLE `deliverynotes`
  ADD PRIMARY KEY (`deliveryNotes_ID`);

--
-- Indexes for table `deliveryrecord`
--
ALTER TABLE `deliveryrecord`
  ADD PRIMARY KEY (`deliveryRecord_ID`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_ID`);

--
-- Indexes for table `rider`
--
ALTER TABLE `rider`
  ADD PRIMARY KEY (`rider_ID`);

--
-- Indexes for table `riderreport`
--
ALTER TABLE `riderreport`
  ADD PRIMARY KEY (`riderReport_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
