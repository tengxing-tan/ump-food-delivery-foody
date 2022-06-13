<?php
include 'db_connect.php';
/**
 * Session
 */
session_start();
$roID = $_SESSION['roID'];
// $roID = 1;

/**
 * read order
 */
$sql = "SELECT `ro_name`, `ro_email`, `ro_phoneNum`, `ro_address` FROM `restaurantowner` WHERE `ro_ID` = '$roID'";
// echo $sql;

$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
