
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
