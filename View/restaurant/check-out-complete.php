<?php
session_start();
include("../../php/connect-database.php");
date_default_timezone_set("Asia/Singapore");

$restaurant_ID=$_SESSION['restaurant_ID'];
$total=$_SESSION['total'];
$date=date('Y-m-d H:i:s');
$status="Ordered";
// $time=date('h:i:sa');

$query="INSERT INTO `order` (order_ID, restaurant_ID, rider_ID, user_ID, order_date, total_amount, order_status) VALUES (NULL, $restaurant_ID, 1, 1, '$date', $total, '$status')";

if(mysqli_query($conn, $query)){
    echo '<script>alert("Order Completed")</script>';
}
else{
    echo mysqli_error($conn);
}

$result=mysqli_query($conn, "SELECT order_ID from `order` WHERE order_date='$date'");
$row=mysqli_fetch_array($result, 1);
$orderID=$row['order_ID'];

foreach($_SESSION['order'] as $id => $quantity){
    if($quantity!=0){
    $foodQuery="INSERT INTO orderedfood (order_ID, food_ID, food_quantity) VALUES ('$orderID', '$id', '$quantity')";
    mysqli_query($conn, $foodQuery);
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foody | UMP Food Delivery System</title>

    <!-- external stylesheet -->
    <link rel="stylesheet" href="../../styles/main.css">
    <link rel="stylesheet" href="../../styles/restaurant/checkout-complete.css">
    <!-- icon library | font awesome -->
    <script src="https://kit.fontawesome.com/06b2bd9377.js" crossorigin="anonymous"></script>
</head>
<body>
    <!-- title bar -->
    <div id="title-bar">
        <!-- foody logo -->
        <a id="foody-link" class="icon-link" href="../index.php">Foody</a>

        <!-- user profile -->
        <div>
            <a class="icon-link" href="../restaurant/order-list.php">
                Order List
                <i class="fa-solid fa-cart-shopping"></i>
            </a>
          <a class="icon-link" href="../user.php">
            User
            <i class="fa-solid fa-user"></i>
          </a>
        </div>
    </div>

    <!-- content -->
    <div id="content-wrapper">
        <!-- navigation bar (left side) -->
        <nav id="nav-bar">
        <ul>
            <li><a class="nav-link active" href="../index.php">Home</a></li>
            <li><a class="nav-link" href="../expenses-list/index.php">Expenses List</a></li>
            <li><a class="nav-link" href="../calculate-average-expenses/index.php">Calculate Average Expenses</a></li>
            <li><a class="nav-link" href="#">Complaint List</a></li>
        </ul>
        <a href="index.php" class="nav-link" style="text-decoration: underline;">
            Logout
             <i class="fa fa-sign-out" aria-hidden="true" style></i>
         </a>
        </nav>
    
        <!-- main content (right side) -->
        <div id="main-content">
            <div id="checkout-details">
                <div id="header">
                    <i class="fa-solid fa-circle-check fa-5x" id="complete-logo"></i>
                    <br/>
                    <h4>Checkout Complete!</h4>
                    <br>
                    <h4>Your order will be delivered soon.</h4><br/>
                    <h4>You can click "Make Complaint" to make complaint on this order after you received your food.</h4>
                </div>
                <hr/>
                <div id="details">
                    <div id="order-time">
                        <p>Order status: Ordered</p>
                        <p>Order Time: <?php echo $date?></p>
                    </div>
                    <div id="delivery-address">
                        <p>Delivery adress:</p>
                        <?php
                        if(isset($_POST['address'])){
                        ?>
                        <p><?php echo $_POST['address'];}?></p>
                    </div>
                </div>
                <div id="button">
                    <a href="#"><button type="button" class="button">Make Complaint</button></a>
                    <a href="../index.php"><button type="button" class="button">Order received, back to homepage</button></a>
                </div>
            </div>
        </div>
    </div>
    <?php session_destroy(); ?>
</body>
</html>
