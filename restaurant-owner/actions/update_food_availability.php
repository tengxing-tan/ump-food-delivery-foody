<!DOCTYPE html>
<?php
include 'db_connect.php';
/**
 * Session
 */
session_start();

// $restaurantID = $_SESSION['restaurantID'];
$restaurantID = 1;

// get values
$foodID = $_GET['id'];
$foodAvailability = ($_GET['a']) ? 0 : 1;
// echo "$foodID // $foodAvailability";


$sql = "UPDATE `food` SET `food_availability`=$foodAvailability WHERE `food_ID`='$foodID'";
$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
// print_r($result);

header('location: ../menu-list.php');
exit();
