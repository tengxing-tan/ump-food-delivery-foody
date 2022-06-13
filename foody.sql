-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 13, 2022 at 03:20 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `foodydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `orderedfood`
--

CREATE TABLE `orderedfood` (
  `orderedFood_ID` int(10) NOT NULL,
  `order_ID` int(10) NOT NULL,
  `food_ID` int(10) NOT NULL,
  `food_quantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderedfood`
--

INSERT INTO `orderedfood` (`orderedFood_ID`, `order_ID`, `food_ID`, `food_quantity`) VALUES
(1, 1, 13, 1),
(2, 1, 14, 2),
(3, 1, 15, 3),
(4, 2, 13, 1),
(5, 2, 14, 2),
(6, 2, 15, 3),
(7, 3, 13, 1),
(8, 3, 14, 2),
(9, 3, 15, 3),
(10, 4, 13, 1),
(11, 4, 14, 2),
(12, 4, 15, 3),
(13, 6, 13, 1),
(14, 6, 14, 2),
(15, 6, 15, 3),
(16, 7, 16, 0),
(17, 7, 17, 2),
(18, 7, 18, 3),
(19, 8, 13, 3),
(20, 8, 14, 6),
(21, 8, 15, 9),
(22, 9, 13, 2),
(23, 10, 16, 1),
(24, 10, 17, 2),
(25, 10, 18, 3),
(26, 11, 16, 1),
(27, 11, 17, 2),
(28, 11, 18, 3),
(29, 12, 16, 1),
(30, 12, 17, 1),
(31, 12, 18, 1),
(32, 13, 16, 1),
(33, 13, 17, 1),
(34, 13, 18, 2),
(35, 14, 13, 3),
(36, 14, 14, 6),
(37, 14, 15, 9),
(38, 15, 13, 3),
(39, 15, 14, 5),
(40, 15, 15, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orderedfood`
--
ALTER TABLE `orderedfood`
  ADD PRIMARY KEY (`orderedFood_ID`),
  ADD KEY `order_ID` (`order_ID`),
  ADD KEY `food_ID` (`food_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orderedfood`
--
ALTER TABLE `orderedfood`
  MODIFY `orderedFood_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;
