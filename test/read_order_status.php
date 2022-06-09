<?php

// include 'db_connect.php';

/**
 * Establish database
 * db name: 'foodydb'
 */
$conn = mysqli_connect("localhost", "root", NULL, "foodydb", "3306") or die(mysqli_connect_error());


/**
 * read order
 */
// $sql = "SELECT `order_ID`, `order_date`, `order_time`, `order_status`, `total_amount` FROM `order` WHERE `restaurant_ID` = '$restaurantID' ORDER BY `order_date`";
// // echo $sql;

// $result_order = mysqli_query($conn, $sql) or die(mysqli_error($conn));

/**
 * read ordered food
 */
$sql = "SELECT O.order_ID, F.food_title, OFOOD.food_quantity FROM ((`orderedfood` OFOOD INNER JOIN `order` O ON O.order_ID = OFOOD.order_ID) INNER JOIN `food` F ON F.food_ID = OFOOD.food_ID) WHERE O.restaurant_ID = 1";
// $sql = "SELECT O.order_id, OFOOD.food_id, F.food_title FROM `order` O, `food` F INNER JOIN  `orderedfood` OFOOD WHERE O.order_ID = OFOOD.order_ID AND O.restaurant_ID = 1 AND O.order_ID = 1";
echo $sql;
$result_ordered_food = mysqli_query($conn, $sql) or die(mysqli_error($conn));
print_r($result_ordered_food);

while ($row = mysqli_fetch_assoc($result_ordered_food)) {
    echo $row['order_ID'].' => ';
    echo $row['food_title'].' x';
    echo $row['food_quantity'].'<br>';
}
