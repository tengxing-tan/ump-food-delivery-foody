<?php

include 'db_connect.php';

// if update restaurant details
if (isset($_GET['id'])) {
    $restaurantID = $_GET['id'];

    /**
     * read restaurant owner details
     */
    $sql = "SELECT R.*, RT.restaurantType_name FROM `restaurant` R INNER JOIN `restauranttype` RT WHERE R.restaurant_ID = '$restaurantID' AND R.restaurantType_ID = RT.restaurantType_ID";
} else {
    /**
     * get all registered restaurant
     */
    $sql = "SELECT R.*, RT.restaurantType_name FROM `restaurant` R INNER JOIN `restauranttype` RT WHERE R.restaurantType_ID = RT.restaurantType_ID";
}
// echo $sql;

$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
// $row = mysqli_fetch_assoc($result);
// print_r($row);

// just want the restaurant type
$sql = "SELECT * FROM `restauranttype`";
$result_rt = mysqli_query($conn, $sql) or die(mysqli_error($conn));
// $row = mysqli_fetch_assoc($result_rt);
// print_r($result_rt);
