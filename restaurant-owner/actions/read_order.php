<?php
include 'db_connect.php';

$restaurantID = $_SESSION['restaurantID'];

/**
 * read food detail
 */
$id = (isset($_GET['id'])) ? $_GET['id'] : 0;

switch ($_GET['id']) {
    case 1:
        $durationType = 'Date';
        $sql = "SELECT COUNT(`order_ID`), `order_date`, SUM(`total_amount`) FROM `order` WHERE `restaurant_ID` = $restaurantID AND order_date = '" . $_POST['searchDate'] . "'";
        break;
    case 2:
        $durationType = 'Week';
        $sql = "SELECT COUNT(`order_ID`), WEEK(`order_date`), SUM(`total_amount`) FROM `order` WHERE `restaurant_ID` = $restaurantID GROUP BY WEEK(`order_date`) ORDER BY `order_date` DESC";
        break;
    case 3:
        $durationType = 'Month';
        $sql = "SELECT COUNT(`order_ID`), MONTHNAME(`order_date`), SUM(`total_amount`) FROM `order` WHERE `restaurant_ID` = $restaurantID GROUP BY MONTH(`order_date`) ORDER BY `order_date` DESC";
        break;
    default:
        $durationType = 'Day';
        $sql = "SELECT COUNT(`order_ID`), `order_date`, SUM(`total_amount`) FROM `order` WHERE `restaurant_ID` = $restaurantID GROUP BY `order_date` ORDER BY `order_date` DESC";
}

// echo $sql;
$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
