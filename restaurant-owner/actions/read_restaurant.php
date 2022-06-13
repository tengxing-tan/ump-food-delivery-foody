<?php
include 'db_connect.php';
/**
 * Session
 */
session_start();
$roID = $_SESSION['roID'];

// if want to read restaurant details
if (isset($_SESSION['restaurantID'])) {
    $restaurantID = $_SESSION['restaurantID'];
    /**
     * read restaurant details
     */
    $sql = "SELECT R.*, RT.restaurantType_name FROM `restaurant` R INNER JOIN `restauranttype` RT WHERE R.restaurant_ID = '$restaurantID' AND R.restaurantType_ID = RT.restaurantType_ID";
} else {
    // if only want restaurant id for this owner
    $sql = "SELECT `restaurant_ID` FROM `restaurant` WHERE `ro_ID` = $roID";
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
