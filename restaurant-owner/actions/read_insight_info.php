<?php
include 'db_connect.php';
/**
 * SESSION
 */
session_start();
// if access by qr code, use get. else use session
$restaurantID = (isset($_GET['id'])) ? $_GET['id'] : $_SESSION['restaurantID'];
// $restaurantID = 1;

/**
 * query last month total amount
 */
$sqlpayLastMonth = "SELECT COUNT(`order_ID`), WEEK(`order_date`), SUM(`total_amount`) FROM `order` WHERE `restaurant_ID` = '$restaurantID' GROUP BY WEEK(`order_date`) ORDER BY `order_date` DESC";
$resultPayLastMonth = mysqli_query($conn, $sqlpayLastMonth) or die(mysqli_error($conn));

$sum = array();
$weekNo = 4;
while ($weekNo-- > 0 and $row = mysqli_fetch_array($resultPayLastMonth)) {
    array_push($sum, $row['SUM(`total_amount`)']);
}

/**
 * query total order
 */
$sqlTotalOrder = "SELECT COUNT(`order_ID`), `order_date`, SUM(`total_amount`) FROM `order` WHERE `restaurant_ID` = '$restaurantID' GROUP BY `order_date` ORDER BY `order_date` DESC";
$resultTotalOrder = mysqli_query($conn, $sqlTotalOrder) or die(mysqli_error($conn));

$totalOrder = array();
$orderDate = array();
$dayNo = 30;
while ($dayNo-- > 0 and $row = mysqli_fetch_array($resultTotalOrder)) {
    // write into array every 7 day
    if ($dayNo % 7 == 0) {
        array_push($orderDate, $row['order_date']);
    } else {
        array_push($orderDate, '');
    }
    array_push($totalOrder, $row['COUNT(`order_ID`)']);
}

/**
 * query accumulated payment
 */
$sqlAccumPay = "SELECT YEAR(`order_date`), SUM(`total_amount`) FROM `order` WHERE `restaurant_ID` = '$restaurantID' GROUP BY YEAR(`order_date`) ORDER BY `order_date` ASC";
$resultAccumPay = mysqli_query($conn, $sqlAccumPay) or die(mysqli_error($conn));
// print_r($resultAccumPay);

$year = array();
$accumPay = array();
while ($row = mysqli_fetch_array($resultAccumPay)) {
    array_push($year, $row['YEAR(`order_date`)']);
    array_push($accumPay, $row['SUM(`total_amount`)']);
}
