<?php
session_start();
include("../../php/connect-database.php");

$restaurant_ID=$_SESSION['restaurant_ID'];

$order=array();
$result=mysqli_query($conn, "SELECT food_ID from food WHERE restaurant_ID='$restaurant_ID'");
while($row=mysqli_fetch_array($result, 1)){
    $id=$row['food_ID'];

    if(isset($_POST[$id]) && $_POST[(String)$id]!=0){
        $order+=[$id => $_POST[(String)$id]];
    }
}

$_SESSION['order']=$order;

if(empty($order)==true){
    $_SESSION['ERROR_MSG']="No Food Selected";
    header("location: ../index.php");
    exit();
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
    <link rel="stylesheet" href="../../styles/restaurant/checkout.css">
    <!-- icon library | font awesome -->
    <script src="https://kit.fontawesome.com/06b2bd9377.js" crossorigin="anonymous"></script>
    <script src="./js/main.js"></script>
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
            <li><a class="nav-link" href="../../../complaint/foody-complaint/user/complaintlistmain.php">Complaint List</a></li>
        </ul>
        <a href="../../../logout.php" class="nav-link" style="text-decoration: underline;">
            Logout
             <i class="fa fa-sign-out" aria-hidden="true" style></i>
         </a>
        </nav>
    
        <!-- main content (right side) -->
        <div id="main-content">
            <form method="POST" action="../restaurant/check-out-complete.php">
                <div id="checkout-details">
                    <div class="address">
                        <p>Delivery Address: </p>
                            <br>
                            <div id="content">
                                <textarea placeholder="Enter your address here" cols="145" rows="6" name="address" required></textarea>
                            </div>
                    </div>
                    <hr/>
                    <?php
                    $total=0;
                    foreach($order as $id => $quantity){
                        $result=mysqli_query($conn, "SELECT food_title FROM food WHERE food_ID='$id'");
                        $row=mysqli_fetch_array($result,1);
                        if($quantity!=0){
                    ?>
                    <div class="order">
                        <div class="food-title">
                            <p><?php echo $row['food_title']?></p>
                        </div>
                        <div class="food-quantity">
                            <p>x <?php echo $quantity;?></p>
                        </div>
                        <div class="food-price">
                            <p><?php echo $_POST['price-'.(String)$id]?></p>
                        </div>
                    </div>
                    <?php } }?>
                    <hr/>
                    <?php
                    foreach($order as $id => $quantity){
                        $price=explode(" ",$_POST['price-'.(String)$id]);
                        $total+=(Int)$price[1];
                    }
                    $_SESSION['total']=$total;
                    ?>
                    <div id="total-amount">
                        <h4>Total amount: </h4>
                        <h4>RM <?php echo $total?></h4>
                    </div>
                    <p style="color:red; font-size: 12px;">*for now we only accept cash payment</p>
                </div>

                <div id="buttons">
                    <a href="./order-list.php?a=<?php echo $restaurant_ID;?>"><button type="button" id="cancel-button">Cancel</button></a>
                    <button type="submit" id="checkout-button">Confirm Checkout</button>
                </div>
            </form>
        </div>
    </div>
    <script>

    </script>
</body>
</html>
