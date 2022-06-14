<?php
include 'db_connect.php';

$restaurantID = $_SESSION['restaurantID'];

/**
 * read food detail
 */
$sql = "SELECT F.*, FC.category_name FROM `food` F INNER JOIN `foodcategory` FC WHERE F.food_category_ID = FC.food_category_ID AND F.restaurant_ID = $restaurantID";
$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
// echo $sql;

/**
 * read food detail
 */
$sql = "SELECT * FROM `foodcategory`";
$resultFc = mysqli_query($conn, $sql) or die(mysqli_error($conn));
// echo $sql;
