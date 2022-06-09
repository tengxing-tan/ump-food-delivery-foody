<?php

include 'db_connect.php';

$orderID = $_GET['id'];
$orderStatus = $_GET['status'];
// echo $orderID.' // '.$orderStatus;

/**
 * update order status
 */
$sql = "UPDATE `order` SET `order_status` = '$orderStatus' WHERE `order_ID` = $orderID";
// echo $sql;

$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
// print_r($result);

header('location: ../index.php');
