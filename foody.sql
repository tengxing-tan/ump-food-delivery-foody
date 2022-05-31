-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2022 at 03:11 PM
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
-- Database: `foodydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_ID` int(10) NOT NULL,
  `user_ID` varchar(10) NOT NULL,
  `admin_name` varchar(30) NOT NULL,
  `admin_email` varchar(30) NOT NULL,
  `admin_password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `complaintlist`
--

CREATE TABLE `complaintlist` (
  `complaint_id` int(10) NOT NULL,
  `order_id` int(10) NOT NULL,
  `complaint_name` varchar(50) NOT NULL,
  `complaint_date` date NOT NULL,
  `complaint_time` time NOT NULL,
  `complaint_type` varchar(50) NOT NULL,
  `complaint_comment` varchar(200) NOT NULL,
  `complaint_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `expensesrecord`
--

CREATE TABLE `expensesrecord` (
  `expenses_ID` int(10) NOT NULL,
  `user_ID` int(10) NOT NULL,
  `expenses_title` varchar(50) NOT NULL,
  `expenses_description` varchar(200) NOT NULL,
  `expenses_date` date NOT NULL,
  `expenses_amount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(10) NOT NULL,
  `complaint_id` int(10) NOT NULL,
  `feedback_info` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `food_ID` int(10) NOT NULL,
  `restaurant_ID` int(10) NOT NULL,
  `food_title` varchar(30) NOT NULL,
  `food_category_ID` int(10) NOT NULL,
  `food_description` text NOT NULL,
  `food_image` varchar(255) NOT NULL,
  `food_price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`food_ID`, `restaurant_ID`, `food_title`, `food_category_ID`, `food_description`, `food_image`, `food_price`) VALUES
(13, 1, 'sushi', 1, 'Sushi', '../../src/img/sushi-mentai.jpg', 12);

-- --------------------------------------------------------

--
-- Table structure for table `foodcategory`
--

CREATE TABLE `foodcategory` (
  `food_category_ID` int(10) NOT NULL,
  `category_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `foodcategory`
--

INSERT INTO `foodcategory` (`food_category_ID`, `category_name`) VALUES
(1, 'Main Dishes'),
(2, 'Side Dishes'),
(3, 'Drinks');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_ID` int(10) NOT NULL,
  `restaurant_ID` int(10) NOT NULL,
  `rider_ID` int(10) NOT NULL,
  `user_ID` int(10) NOT NULL,
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
  `order_ID` int(10) NOT NULL,
  `restaurant_ID` int(10) NOT NULL,
  `food_ID` int(10) NOT NULL,
  `food_quantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `restaurant_ID` int(10) NOT NULL,
  `ro_ID` varchar(10) NOT NULL,
  `restaurant_name` varchar(30) NOT NULL,
  `restaurant_image` varchar(255) NOT NULL,
  `restaurantType_ID` int(10) NOT NULL,
  `restaurant_descripton` text NOT NULL,
  `restaurant_address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`restaurant_ID`, `ro_ID`, `restaurant_name`, `restaurant_image`, `restaurantType_ID`, `restaurant_descripton`, `restaurant_address`) VALUES
(1, '1', 'Sushi Mentai', '../src/img/sushi-mentai.jpg', 1, 'Sushi Restaurant', '9, Jalan Apa, Taman Apa, 65500 Pekan, Pahang');

-- --------------------------------------------------------

--
-- Table structure for table `restaurantowner`
--

CREATE TABLE `restaurantowner` (
  `ro_ID` int(10) NOT NULL,
  `ro_name` varchar(30) NOT NULL,
  `ro_email` varchar(30) NOT NULL,
  `ro_phoneNum` varchar(15) NOT NULL,
  `ro_password` varchar(20) NOT NULL,
  `ro_address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `restaurantowner`
--

INSERT INTO `restaurantowner` (`ro_ID`, `ro_name`, `ro_email`, `ro_phoneNum`, `ro_password`, `ro_address`) VALUES
(1, 'tan teng xing', 'tengxing@@gmail.com', '123456', 'tan', 'tan teng xing\r\ntan teng xing\r\ntan teng xing');

-- --------------------------------------------------------

--
-- Table structure for table `restauranttype`
--

CREATE TABLE `restauranttype` (
  `restaurantType_ID` int(10) NOT NULL,
  `restaurantType_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `restauranttype`
--

INSERT INTO `restauranttype` (`restaurantType_ID`, `restaurantType_name`) VALUES
(1, 'Local Restaurant'),
(2, 'Western Restaurant'),
(3, 'Vegeterian Restaurant');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_ID` int(10) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `user_email` varchar(30) NOT NULL,
  `user_phoneNum` varchar(11) NOT NULL,
  `user_password` varchar(20) NOT NULL,
  `user_address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_ID`, `user_name`, `user_email`, `user_phoneNum`, `user_password`, `user_address`) VALUES
(1, 'jeremy', 'jeremy@example.com', '010-2520223', 'jeremy', '21, Jalan Melaka, Taman Melaka, 65500 Pekan, Pahan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_ID`),
  ADD KEY `user_ID` (`user_ID`);

--
-- Indexes for table `complaintlist`
--
ALTER TABLE `complaintlist`
  ADD PRIMARY KEY (`complaint_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `expensesrecord`
--
ALTER TABLE `expensesrecord`
  ADD PRIMARY KEY (`expenses_ID`),
  ADD KEY `user_ID` (`user_ID`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`),
  ADD KEY `complaint_id` (`complaint_id`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`food_ID`),
  ADD KEY `FK_RestaurantFood` (`restaurant_ID`),
  ADD KEY `FK_FoodCategoryFood` (`food_category_ID`);

--
-- Indexes for table `foodcategory`
--
ALTER TABLE `foodcategory`
  ADD PRIMARY KEY (`food_category_ID`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_ID`),
  ADD KEY `restaurant_ID` (`restaurant_ID`),
  ADD KEY `user_ID` (`user_ID`);

--
-- Indexes for table `orderedfood`
--
ALTER TABLE `orderedfood`
  ADD KEY `order_ID` (`order_ID`),
  ADD KEY `food_ID` (`food_ID`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`restaurant_ID`),
  ADD KEY `restaurantType_ID` (`restaurantType_ID`);

--
-- Indexes for table `restaurantowner`
--
ALTER TABLE `restaurantowner`
  ADD PRIMARY KEY (`ro_ID`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `complaintlist`
--
ALTER TABLE `complaintlist`
  MODIFY `complaint_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expensesrecord`
--
ALTER TABLE `expensesrecord`
  MODIFY `expenses_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `food_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `foodcategory`
--
ALTER TABLE `foodcategory`
  MODIFY `food_category_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `restaurant_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `restauranttype`
--
ALTER TABLE `restauranttype`
  MODIFY `restaurantType_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `complaintlist`
--
ALTER TABLE `complaintlist`
  ADD CONSTRAINT `complaintlist_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `order` (`order_ID`);

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`complaint_id`) REFERENCES `complaintlist` (`complaint_id`);

--
-- Constraints for table `food`
--
ALTER TABLE `food`
  ADD CONSTRAINT `FK_FoodCategoryFood` FOREIGN KEY (`food_category_ID`) REFERENCES `foodcategory` (`food_category_ID`),
  ADD CONSTRAINT `FK_RestaurantFood` FOREIGN KEY (`restaurant_ID`) REFERENCES `restaurant` (`restaurant_ID`);

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `restaurant_ID` FOREIGN KEY (`restaurant_ID`) REFERENCES `restaurant` (`restaurant_ID`),
  ADD CONSTRAINT `user_ID` FOREIGN KEY (`user_ID`) REFERENCES `user` (`user_ID`);

--
-- Constraints for table `orderedfood`
--
ALTER TABLE `orderedfood`
  ADD CONSTRAINT `food_ID` FOREIGN KEY (`food_ID`) REFERENCES `food` (`food_ID`),
  ADD CONSTRAINT `order_ID` FOREIGN KEY (`order_ID`) REFERENCES `order` (`order_ID`);

--
-- Constraints for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD CONSTRAINT `restaurantType_ID` FOREIGN KEY (`restaurantType_ID`) REFERENCES `restauranttype` (`restaurantType_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
