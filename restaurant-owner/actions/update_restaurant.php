<?php

include 'db_connect.php';
/**
 * Session
 */
session_start();

// $restaurantID = $_SESSION['restaurantID'];

// get restaurant id
$restaurantID = $_GET['id'];

// get all variable from post
extract($_POST);

// if no image uploaded, no need update
$restaurantImage = $_FILES['restaurantImage']['name'];
$updateRestaurantImage = (is_uploaded_file($restaurantImage)) ? "`restaurant_image`='$restaurantImage'," : "";
    

$sql = "UPDATE `restaurant` SET `restaurant_name`='$restaurantName',`restaurantType_ID`='$restaurantTypeID',`contact`='$contact',`restaurant_address`='$restaurantAddress',`operating_hour_open`='$operatingHourOpen',`operating_hour_close`='$operatingHourClose',".$updateRestaurantImage."`restaurant_description`='$restaurantDescription' WHERE `restaurant_ID`='$restaurantID'";
echo $sql;

$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
print_r($result);

if ($result) {
    $_SESSION['status'] = 2;
} else {
    $_SESSION['status'] = 0;
}

header('location: ../my-restaurants.php');
exit();

/**
* Session => status
* 0: nothing
* 1: create
* 2: update
* 3: delete
*/