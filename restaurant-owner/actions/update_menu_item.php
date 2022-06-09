<?php

include 'db_connect.php';
/**
 * Session
 */
session_start();

// $restaurantID = $_SESSION['restaurantID'];
$restaurantID = 1;

// get food id
$foodID = $_GET['id'];

// get all variable from post
extract($_POST);

// if no image uploaded, no need update
$foodImage = $_FILES['foodImage']['name'];
$updateFoodImage = (is_uploaded_file($foodImage)) ? "`food_image`='$foodImage'," : "";
    

$sql = "UPDATE `food` SET `food_title`='$foodTitle'," .
    "`food_category_ID`='$foodCategory'," .
    "`food_description`='$foodDescription'," .
    $updateFoodImage .
    "`food_price`='$foodPrice' " .
    "WHERE `food_ID`='$foodID'";
// echo $sql;

$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
if ($result) {
    $_SESSION['status'] = 2;
} else {
    $_SESSION['status'] = 0;
}

header('location: ../menu-list.php');
exit();

/**
* Session => status
* 0: nothing
* 1: create
* 2: update
* 3: delete
*/