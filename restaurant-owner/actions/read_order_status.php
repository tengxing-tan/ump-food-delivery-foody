<?php

include 'db_connect.php';
/**
 * Session
 */
session_start();

$restaurantID = $_SESSION['restaurantID'];

/**
 * read order
 */
$sql = "SELECT `order_ID`, `order_date`, `order_time`, `order_status`, `total_amount` FROM `order` WHERE `restaurant_ID` = '$restaurantID' ORDER BY `order_date`";
// echo $sql;

$result_order = mysqli_query($conn, $sql) or die(mysqli_error($conn));
