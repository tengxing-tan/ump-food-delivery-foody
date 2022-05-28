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
  `commission_ID` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `commission_date` date DEFAULT NULL,
  `commission_amount` float(11) DEFAULT NULL,
  `commission_total` float(11) DEFAULT NULL,
  `total_time` time DEFAULT NULL
) 

-- --------------------------------------------------------

--
-- Table structure for table `rider`
--
CREATE TABLE `rider` (
  `rider_ID` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `rider_name` varchar(30) DEFAULT NULL,
  `rider_email` varchar(30) DEFAULT NULL,
  `rider_phoneNum` varchar(11) DEFAULT NULL,
  `rider_password` varchar(20) DEFAULT NULL,
  `rider_address` varchar(30) DEFAULT NULL
) 

-- --------------------------------------------------------

--
-- Table structure for table `riderreport`
--
CREATE TABLE `riderreport` (
  `riderReport_ID` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `commission_ID` int(11) NOT NULL,
  FOREIGN KEY (`commission_ID`) REFERENCES commission(`commission_ID`)
)

--
-- Indexes for dumped tables
--

--
-- Indexes for table `commission`
-

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
