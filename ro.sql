-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 29, 2022 at 08:21 AM
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
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `food_ID` int(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `restaurant_ID` int(10) NOT NULL,
  `food_title` varchar(30) NOT NULL,
  `food_category_ID` int(10) NOT NULL,
  `food_description` text NOT NULL,
  `food_image` varchar(255) NOT NULL,
  `food_price` float NOT NULL,
   CONSTRAINT FK_RestaurantFood FOREIGN KEY (`restaurant_ID`) REFERENCES Restaurant(`restaurant_ID`),
   CONSTRAINT FK_foodcategoryFood FOREIGN KEY (`food_category_ID`) REFERENCES foodcategory(`food_category_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Table structure for table `foodcategory`
--

CREATE TABLE `foodcategory` (
  `food_category_ID` int(10) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `category_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Table structure for table `restaurant`
--


CREATE TABLE `restaurant` (
  `restaurant_ID` int(10) NOT NULL,
  `ro_ID` varchar(10) NOT NULL,
  `restaurant_name` varchar(30) NOT NULL,
  `restaurantType_ID` int(10) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `restaurant_address` varchar(100) NOT NULL
  `operating_hour_open` time NOT NULL,
  `operating_hour_close` time NOT NULL,
  `restaurant_descripton` text NOT NULL,
  `restaurant_image` varchar(255) NOT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Table structure for table `restaurantowner`
--

CREATE TABLE `restaurantowner` (
  `ro_ID` int(10) NOT NULL PRIMARY KEY,
  `ro_name` varchar(30) NOT NULL,
  `ro_email` varchar(30) NOT NULL,
  `ro_phoneNum` varchar(15) NOT NULL,
  `ro_password` varchar(20) NOT NULL,
  `ro_address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



--
-- Dumping data for table `food`
--

INSERT INTO `food` (`food_ID`, `restaurant_ID`, `food_title`, `food_category_ID`, `food_description`, `food_image`, `food_price`) VALUES
(NULL, 1, 'Asam Laksa', 1, '', 'asam_laksa.jpg', 9),
(NULL, 1, 'Cendol', 2, 'update x2', 'cendol.jpg', 40),
(NULL, 1, 'Fried Chicken', 2, '1px only', 'fried_chicken.jpg', 4),
(NULL, 1, 'Nasi Kerabu', 1, '', 'nasi_kerabu.jpg', 10),
(NULL, 1, 'Mee Sup', 1, '', 'mee_sup.jpg', 5),
(NULL, 1, 'Milo Ais', 3, '', 'milo_ais.jpg', 2.5),
(NULL, 1, 'Nasi Kerabu', 1, '', 'nasi_kerabu.jpg', 7.5),
(NULL, 1, 'Nasi Lemak', 1, '', 'nasi_lemak.jpg', 5.5),
(NULL, 1, 'Roti Canai', 2, '', 'roti_canai.jpg', 1.2),
(NULL, 1, 'Roti Telur', 2, '', 'roti_telur.jpg', 2.5),
(NULL, 1, 'Teh Tarik', 3, '', 'teh_tarik.jpg', 2),
(NULL, 1, 'tempura', 2, '', 'tempura.png', 9.99);

-- --------------------------------------------------------

--
-- Dumping data for table `foodcategory`
--

INSERT INTO `foodcategory` (`food_category_ID`, `category_name`) VALUES
(1, 'Main Dishes'),
(2, 'Side Dishes'),
(3, 'Drinks');

-- --------------------------------------------------------

--
-- Dumping data for table `restaurant`
--

CREATE TABLE `restaurant` (
  `restaurant_ID` int(10) NOT NULL,
  `ro_ID` int(10) NOT NULL,
  `restaurant_name` varchar(30) NOT NULL,
  `restaurantType_ID` int(10) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `restaurant_address` varchar(100) NOT NULL,
  `operating_hour_open` time NOT NULL,
  `operating_hour_close` time NOT NULL,
  `restaurant_description` text NOT NULL,
  `restaurant_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`restaurant_ID`, `ro_ID`, `restaurant_name`, `restaurantType_ID`, `contact`, `restaurant_address`, `operating_hour_open`, `operating_hour_close`, `restaurant_description`, `restaurant_image`) VALUES
(1, 1, 'Sushi Mentai', 2, '016-778 9999', '9, Jalan Apa, Taman Apa, 65500 Pekan, Pahang', '08:37:46', '08:37:46', 'Sushi Restaurant', '../src/img/sushi-mentai.jpg');


-- --------------------------------------------------------

--
-- Dumping data for table `restaurantowner`
--

INSERT INTO `restaurantowner` (`ro_ID`, `ro_name`, `ro_email`, `ro_phoneNum`, `ro_password`, `ro_address`) VALUES
(1, 'tan teng xing', 'tengxing@@gmail.com', '123456', 'tan', 'tan teng xing\r\ntan teng xing\r\ntan teng xing');
