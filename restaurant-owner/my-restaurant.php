<?php
session_start();
if (isset($_SESSION['restaurantID'])) {
    header('location: view-my-restaurant.php');
    // echo $_SESSION['restaurantID'];
} else {
    header('location: add-my-restaurant.php');
}
exit();
