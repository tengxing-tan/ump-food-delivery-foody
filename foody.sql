
CREATE TABLE `rider` (
  `rider_ID` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `rider_name` varchar(30) DEFAULT NULL,
  `rider_email` varchar(30) DEFAULT NULL,
  `rider_phoneNum` varchar(11) DEFAULT NULL,
  `rider_password` varchar(20) DEFAULT NULL,
  `rider_address` varchar(30) DEFAULT NULL
) 


CREATE TABLE `Admin` (
  `admin_ID` int(10) NOT NULL,
  `user_ID` varchar(10) NOT NULL,
  `admin_name` varchar(30) NOT NULL,
  `admin_email` varchar(30) NOT NULL,
  `admin_password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `User` (
  `user_ID` int(10) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `user_email` varchar(30) NOT NULL,
  `user_phoneNum` varchar(11) NOT NULL,
  `user_password` varchar(20) NOT NULL,
  `user_address` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `expensesrecord` (
  `expenses_ID` int(10) NOT NULL,
  `user_ID` int(10) NOT NULL,
  `expenses_title` varchar(50) NOT NULL,
  `expenses_description` varchar(200) NOT NULL,
  `expenses_date` date NOT NULL,
  `expenses_amount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `order` (
  `order_ID` int(10) NOT NULL,
  `restaurant_ID` int(10) NOT NULL,
  `rider_ID` int(11) NOT NULL,
  `user_ID` int(10) NOT NULL,
  `extra_note` varchar(100) NOT NULL,
  `order_date` date NOT NULL,
  `total_amount` int(11) NOT NULL,
  `order_status` varchar(20) NOT NULL,
  `order_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `orderedfood` (
  `order_ID` int(10) NOT NULL,
  `restaurant_ID` int(10) NOT NULL,
  `food_ID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `restaurant` (
  `restaurant_ID` int(10) NOT NULL,
  `ro_ID` varchar(10) NOT NULL,
  `restaurant_name` varchar(30) NOT NULL,
  `restaurant_image` varchar(255) NOT NULL,
  `restaurantType_ID` int(10) NOT NULL,
  `restaurant_descripton` text NOT NULL,
  `restaurant_address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `restauranttype` (
  `restaurantType_ID` int(10) NOT NULL,
  `restaurantType_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




ALTER TABLE `Admin`
  ADD PRIMARY KEY (`admin_ID`),
  ADD KEY `user_ID` (`user_ID`);

ALTER TABLE `User`
  ADD PRIMARY KEY (`user_ID`);

ALTER TABLE `expensesrecord`
  ADD PRIMARY KEY (`expenses_ID`),
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

ALTER TABLE `Admin`
  ADD CONSTRAINT `Admin_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `User` (`user_ID`);
  
  ALTER TABLE `expensesrecord`
  MODIFY `expenses_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

COMMIT;

CREATE TABLE `Food` (
  `food_ID` int(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `restaurant_ID` int(10) NOT NULL,
  `food_title` varchar(30) NOT NULL,
  `food_category_ID` int(10) NOT NULL,
  `food_description` text NOT NULL,
  `food_image` varchar(255) NOT NULL,
  `food_price` float NOT NULL,
   CONSTRAINT FK_RestaurantFood FOREIGN KEY (`restaurant_ID`) REFERENCES Restaurant(`restaurant_ID`),
   CONSTRAINT FK_FoodCategoryFood FOREIGN KEY (`food_category_ID`) REFERENCES FoodCategory(`food_category_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Table structure for table `FoodCategory`
--

CREATE TABLE `FoodCategory` (
  `food_category_ID` int(10) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `category_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Table structure for table `Restaurant`
--

CREATE TABLE `Restaurant` (
  `restaurant_ID` int(10) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `ro_ID` int(10) NOT NULL   REFERENCES RestaurantOwner(`ro_ID`),
  `restaurant_name` varchar(100) NOT NULL,
  `restaurant_imgae` varchar(255) NOT NULL,
  `restaurant_description` text NOT NULL,
  `restaurant_address` varchar(100) NOT NULL,
  CONSTRAINT FK_RestaurantOwnerRestaurant FOREIGN KEY (`ro_ID`) REFERENCES RestaurantOwner(`ro_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Table structure for table `RestaurantOwner`
--

CREATE TABLE `RestaurantOwner` (
  `ro_ID` int(10) NOT NULL PRIMARY KEY,
  `ro_name` varchar(30) NOT NULL,
  `ro_email` varchar(30) NOT NULL,
  `ro_phoneNum` varchar(15) NOT NULL,
  `ro_password` varchar(20) NOT NULL,
  `ro_address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



--
-- Dumping data for table `Food`
--

INSERT INTO `Food` (`food_ID`, `restaurant_ID`, `food_title`, `food_category_ID`, `food_description`, `food_image`, `food_price`) VALUES
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
-- Dumping data for table `FoodCategory`
--

INSERT INTO `FoodCategory` (`food_category_ID`, `category_name`) VALUES
(1, 'Main Dishes'),
(2, 'Side Dishes'),
(3, 'Drinks');

-- --------------------------------------------------------

--
-- Dumping data for table `Restaurant`
--

INSERT INTO `Restaurant` (`restaurant_ID`, `ro_ID`, `restaurant_name`, `restaurant_imgae`, `restaurant_description`, `restaurant_address`) VALUES
(1, 1, 'hotdog', '../assets/tempura.png', 'no food', 'tan teng xing\r\ntan teng xing\r\ntan teng xing');

-- --------------------------------------------------------

--
-- Dumping data for table `RestaurantOwner`
--

INSERT INTO `RestaurantOwner` (`ro_ID`, `ro_name`, `ro_email`, `ro_phoneNum`, `ro_password`, `ro_address`) VALUES
(1, 'tan teng xing', 'tengxing@@gmail.com', '123456', 'tan', 'tan teng xing\r\ntan teng xing\r\ntan teng xing');
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `restaurant_ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `restauranttype`
--
ALTER TABLE `restauranttype`
  MODIFY `restaurantType_ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `expensesrecord`
--
ALTER TABLE `expensesrecord`
  ADD CONSTRAINT `user_ID` FOREIGN KEY (`user_ID`) REFERENCES `user` (`user_ID`);

--
-- Constraints for table `orderedfood`
--
ALTER TABLE `orderedfood`
  ADD CONSTRAINT `order_ID` FOREIGN KEY (`order_ID`) REFERENCES `order` (`order_ID`);

--
-- Constraints for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD CONSTRAINT `restaurantType_ID` FOREIGN KEY (`restaurantType_ID`) REFERENCES `restauranttype` (`restaurantType_ID`);
COMMIT;

COMMIT;
