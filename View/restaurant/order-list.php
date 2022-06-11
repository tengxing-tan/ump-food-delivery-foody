<?php
session_start();
include("../../php/connect-database.php");

if(isset($_SESSION['restaurant_name'])){
    $restaurant_name=$_SESSION['restaurant_name'];
}
if(isset($_SESSION['restaurant_ID'])){
    $restaurant_ID=$_SESSION['restaurant_ID'];
}

if(isset($_GET['id'])){
    $result=mysqli_query($conn, "SELECT food_ID from food WHERE restaurant_ID='$restaurant_ID'");
    $order=array();

    while($row=mysqli_fetch_array($result, 1)){
        $id=$row['food_ID'];

        if(isset($_POST[$id]) && $_POST[(String)$id]!=0){
                $order+=[$id => $_POST[(String)$id]];
        }
    }
    
    $_SESSION['order']=$order;

    if(empty($order)==true){
        $_SESSION['ERROR_MSG']="Please select atleast 1 food.";
        header("location: ./index.php?a=".$restaurant_ID);
        exit();
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
    <link rel="stylesheet" href="../../styles/restaurant/order-list.css">

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
            <div class="container">
                <h3><?php if(isset($_SESSION['rsetaurant_name'])){echo $restaurant_name;}else{echo "";}?></h3>
                <hr/>
                <form method="POST" action="../restaurant/checkout.php">
                    <div class="order">
                        <div class="order-list">
                            <div class="food-name">
                                <p>Food Name</p>
                            </div>
                            <div id="food-quantity">
                                <p>Food Quantity</p>
                            </div>
                            <div class="price-per-item">
                                <p>Price Per Item</p>
                            </div>
                            <div class="food-price-section">
                                <p>Total Price</p>
                            </div>
                        </div>
                        <hr/>
                        <?php
                        if(isset($_SESSION['order'])){
                            $result=mysqli_query($conn, "SELECT * FROM food WHERE restaurant_ID='$restaurant_ID'");
                            $foodQuantity=$_SESSION['order'];
                        while($row=mysqli_fetch_array($result, 1)){ 
                            if(reset($foodQuantity)!=0){
                        ?>
                        <div class="order-list">
                            <div class="food-name">
                                <p><?php echo $row['food_title'];?></p>
                            </div>
                            <div id="food-quantity">
                                <button type="button" class="dec-button">-</button>
                                <input type="text" class="food-number" value="<?php echo reset($foodQuantity);?>" name="<?php echo $row['food_ID'];?>"></input>
                                <button type="button" class="inc-button">+</button>
                            </div>
                            <div class="price-per-item">
                                <p><?php echo $row['food_price']?></p>
                            </div>
                            <div class="food-price-section">
                                <input class="food-price" value="RM <?php echo $row['food_price'] * reset($foodQuantity); array_shift($foodQuantity);?>" name="price-<?php echo $row['food_ID'];?>"></input>
                            </div>
                        </div>
                        <?php } }} 
                            else { echo "No order";}
                        ?>
                            
                    </div>
                    <div class="buttons-section">
                        <a href=<?php if(isset($_SESSION['restaurant_ID'])){ echo "'./index.php?a=$restaurant_ID'";}else{echo "'../index.php'";}?>><button type="button" id="cancel-button">Cancel</button></a>
                        <button type="submit" id="checkout-button">Checkout</button></a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        var inc = document.getElementsByClassName('inc-button');
        var dec = document.getElementsByClassName('dec-button');

        for(var i=0; i<inc.length; i++){
            var button = inc[i];
            button.addEventListener('click',function(event){

                var buttonClicked = event.target;

                var input = buttonClicked.parentElement.children[1];

                var inputValue = input.value;
                
                var newValue = parseInt(inputValue) + 1;
                input.value=newValue;

                var value = buttonClicked.parentElement.parentElement.children[3].children[0];
                var item_price = parseInt(buttonClicked.parentElement.parentElement.children[2].children[0].innerHTML);
                console.log(item_price);

                value.value="RM "+ input.value * item_price;

            })
        }

        for(var i=0; i<dec.length; i++){
            var button = dec[i];

            
            button.addEventListener('click',function(event){

                var buttonClicked = event.target;

                var input = buttonClicked.parentElement.children[1];

                var inputValue = input.value;
                
                var newValue = parseInt(inputValue) - 1;
                var value = buttonClicked.parentElement.parentElement.children[3].children[0];
                var item_price = parseInt(buttonClicked.parentElement.parentElement.children[2].children[0].innerHTML);

                if(newValue>=0){
                    input.value=newValue;
                }else{
                    input.value=0;
                }

                console.log(item_price);
                value.value="RM "+ input.value * item_price;
            })
        }
    </script>
</body>
</html>
