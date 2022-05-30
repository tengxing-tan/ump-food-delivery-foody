
CREATE TABLE `commission` (
  `commission_ID` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `commission_date` date DEFAULT NULL,
  `commission_amount` float(11) DEFAULT NULL,
  `commission_total` float(11) DEFAULT NULL,
  `total_time` time DEFAULT NULL
) 


CREATE TABLE `rider` (
  `rider_ID` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `rider_name` varchar(30) DEFAULT NULL,
  `rider_email` varchar(30) DEFAULT NULL,
  `rider_phoneNum` varchar(11) DEFAULT NULL,
  `rider_password` varchar(20) DEFAULT NULL,
  `rider_address` varchar(30) DEFAULT NULL
) 


CREATE TABLE `riderreport` (
  `riderReport_ID` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `commission_ID` int(11) NOT NULL,
  FOREIGN KEY (`commission_ID`) REFERENCES commission(`commission_ID`)
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

ALTER TABLE `Admin`
  ADD PRIMARY KEY (`admin_ID`),
  ADD KEY `user_ID` (`user_ID`);

ALTER TABLE `User`
  ADD PRIMARY KEY (`user_ID`);


ALTER TABLE `Admin`
  ADD CONSTRAINT `Admin_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `User` (`user_ID`);

COMMIT;