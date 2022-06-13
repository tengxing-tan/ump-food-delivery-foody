<?php
include 'db_connect.php';

if (isset($_GET['id'])) {
    $foodID = $_GET['id'];

    /**
     * read food details
     */
    $sql = "SELECT F.food_title, F.food_category_ID, FC.category_name, F.food_description, F.food_image, F.food_price FROM `food` F " .
        "INNER JOIN `foodcategory` FC " .
        "WHERE F.food_ID = $foodID AND F.food_category_ID = FC.food_category_ID";
    // echo $sql;

    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    $row = mysqli_fetch_assoc($result);
}

/**
 * read food category
 */
$sql_fc = "SELECT * FROM `foodcategory`";
$result_fc = mysqli_query($conn, $sql_fc) or die(mysqli_error($conn));
// print_r($result);
