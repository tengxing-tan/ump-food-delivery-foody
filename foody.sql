-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 09, 2022 at 05:11 AM
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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_ID` int(10) NOT NULL,
  `user_ID` varchar(10) NOT NULL,
  `admin_name` varchar(30) NOT NULL,
  `admin_email` varchar(30) NOT NULL,
  `admin_password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_ID`, `user_ID`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'tengxing', 'Teng Xing', 'tengxing@email.com', 'mypwd');

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

--
-- Dumping data for table `complaintlist`
--

INSERT INTO `complaintlist` (`complaint_id`, `order_id`, `complaint_name`, `complaint_date`, `complaint_time`, `complaint_type`, `complaint_comment`, `complaint_status`) VALUES
(1, 1, 'Food had eaten', '2022-06-07', '10:42:25', 'rider', 'the rider ate my roti canai😡', 'ok');

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

--
-- Dumping data for table `expensesrecord`
--

INSERT INTO `expensesrecord` (`expenses_ID`, `user_ID`, `expenses_title`, `expenses_description`, `expenses_date`, `expenses_amount`) VALUES
(8, 1, 'dinner', 'fdsaf', '2022-06-09', 12),
(9, 1, 'fdasf', 'fdsaf', '2022-06-08', 12);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(10) NOT NULL,
  `complaint_id` int(10) NOT NULL,
  `feedback_info` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `complaint_id`, `feedback_info`) VALUES
(1, 1, 'sorry lo');

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
  `food_price` float NOT NULL,
  `food_availability` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`food_ID`, `restaurant_ID`, `food_title`, `food_category_ID`, `food_description`, `food_image`, `food_price`, `food_availability`) VALUES
(1, 1, 'Sushi', 1, 'Sushi', 'sushi.jpg', 12, 0),
(2, 1, 'Udon', 1, 'Made with hand-made udon noodles', 'udon.jpg', 12, 0),
(3, 1, 'Tempura', 2, 'Fresh fry tempura', 'tempura.jpg', 6, 1),
(4, 2, 'Mc Chicken', 1, 'Mc Chicken, fresh chicken meat with tomato, lettuce, and cabbage', 'Mc Chicken.jpg', 13, 1),
(5, 2, 'Coca Cola', 3, 'coca cola', 'coca cola.jpg', 3, 1),
(6, 2, 'Fry Chicken', 2, 'Spicy fry chicken', 'fry chicken.jpg', 5, 1),
(7, 1, 'Asam Laksa', 1, '', 'asam_laksa.jpg', 9, 1),
(8, 1, 'Cendol', 2, 'update x2', 'cendol.jpg', 40, 1),
(9, 1, 'Fried Chicken', 2, '1px only', 'fried_chicken.jpg', 4, 1),
(10, 1, 'Nasi Kerabu', 1, '', 'nasi_kerabu.jpg', 10, 1),
(11, 1, 'Mee Sup', 1, '', 'mee_sup.jpg', 5, 1),
(12, 1, 'Milo Ais', 3, '', 'milo_ais.jpg', 2.5, 1),
(13, 1, 'Nasi Kerabu', 1, '', 'nasi_kerabu.jpg', 7.5, 1),
(14, 1, 'Nasi Lemak', 1, '', 'nasi_lemak.jpg', 5.5, 1),
(15, 1, 'Roti Canai', 2, '', 'roti_canai.jpg', 1.2, 1),
(16, 1, 'Roti Telur', 2, '', 'roti_telur.jpg', 2.5, 1),
(17, 1, 'Teh Tarik', 3, '', 'teh_tarik.jpg', 2, 1);

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
  `order_date` date NOT NULL,
  `order_time` time NOT NULL,
  `total_amount` int(11) NOT NULL,
  `order_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_ID`, `restaurant_ID`, `rider_ID`, `user_ID`, `order_date`, `order_time`, `total_amount`, `order_status`) VALUES
(1, 1, 1, 1, '2022-06-04', '17:10:56', 12, 'Ordered'),
(2, 2, 1, 1, '2022-06-04', '23:32:05', 39, 'Ordered'),
(3, 2, 1, 1, '2022-06-04', '23:35:16', 39, 'Ordered'),
(4, 1, 1, 1, '2022-06-04', '23:35:34', 54, 'Ordered'),
(5, 1, 1, 1, '2022-06-04', '23:38:24', 54, 'Ordered'),
(6, 1, 1, 1, '2022-06-04', '23:41:08', 54, 'Ordered'),
(7, 2, 1, 1, '2022-06-04', '23:52:55', 21, 'Ordered'),
(8, 1, 1, 1, '2022-06-05', '17:48:23', 162, 'Ordered'),
(9, 1, 1, 1, '2022-06-05', '17:48:23', 162, 'Ordered'),
(10, 1, 1, 1, '2022-05-15', '10:28:38', 24, 'Ordered');

-- --------------------------------------------------------

--
-- Table structure for table `orderedfood`
--

CREATE TABLE `orderedfood` (
  `order_ID` int(10) NOT NULL,
  `food_ID` int(10) NOT NULL,
  `food_quantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderedfood`
--

INSERT INTO `orderedfood` (`order_ID`, `food_ID`, `food_quantity`) VALUES
(6, 13, 1),
(6, 14, 2),
(6, 15, 3),
(7, 16, 0),
(7, 17, 2),
(7, 18, 3),
(8, 13, 3),
(8, 14, 6),
(8, 15, 9),
(9, 13, 2);

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `restaurant_ID` int(10) NOT NULL,
  `ro_ID` varchar(10) NOT NULL,
  `restaurant_name` varchar(30) NOT NULL,
  `restaurantType_ID` int(10) NOT NULL,
  `contact` varchar(20) NOT NULL,
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
(1, '1', 'Sushi Mentai', 1, '016-9998888', '9, Jalan Apa, Taman Apa, 65500 Pekan, Pahang', '08:00:00', '20:00:00', 'Sushi Restaurant', '../src/img/sushi-mentai.jpg'),
(2, '1', 'MCD', 2, '012-3334455', '43, Persiaran Muda Musa, 65500 Pekan, Pahang', '00:00:00', '23:59:00', 'fast food , selling burgers, fries, nuggets, soft drinks', '../src/img/McDonald.jpg');

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
-- Table structure for table `rider`
--

CREATE TABLE `rider` (
  `rider_ID` int(10) NOT NULL,
  `rider_name` varchar(30) DEFAULT NULL,
  `rider_email` varchar(30) DEFAULT NULL,
  `rider_phoneNum` varchar(11) DEFAULT NULL,
  `rider_password` varchar(20) DEFAULT NULL,
  `rider_address` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rider`
--

INSERT INTO `rider` (`rider_ID`, `rider_name`, `rider_email`, `rider_phoneNum`, `rider_password`, `rider_address`) VALUES
(1, 'John Lim', 'johnlim@gmail.com', '0112235251', 'john4321', 'Kuantan, Pahang'),
(2, 'Amir', 'amir@gmail,com', '0166669999', 'amir6666', 'Jln 2, Pekan, Pahang'),
(3, 'Shawan', 'shw@gmail.com', '0127789963', 'shwpass', 'Dhuam Pekan, Pahang');

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
(1, 'jeremy', 'jeremy@example.com', '010-2520223', 'jeremy', '21, Jalan Melaka, Taman Melaka, 65500 Pekan, Pahang'),
(2, 'Teng Xing', 'tengxing@email.com', '018-9995000', 'mypwd', '11, Jalan Kerling, Taman Air Panas, Selangor.');

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
  ADD KEY `user_ID` (`user_ID`),
  ADD KEY `rider_ID` (`rider_ID`);

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
-- Indexes for table `rider`
--
ALTER TABLE `rider`
  ADD PRIMARY KEY (`rider_ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `complaintlist`
--
ALTER TABLE `complaintlist`
  MODIFY `complaint_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `expensesrecord`
--
ALTER TABLE `expensesrecord`
  MODIFY `expenses_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `food_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `foodcategory`
--
ALTER TABLE `foodcategory`
  MODIFY `food_category_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `restaurant_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `restauranttype`
--
ALTER TABLE `restauranttype`
  MODIFY `restaurantType_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rider`
--
ALTER TABLE `rider`
  MODIFY `rider_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_ID` int(10) NOT NULL AUTO_INCREMENT;

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
  ADD CONSTRAINT `rider_ID` FOREIGN KEY (`rider_ID`) REFERENCES `rider` (`rider_ID`),
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
