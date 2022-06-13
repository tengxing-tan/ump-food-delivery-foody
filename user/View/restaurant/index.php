<?php
session_start();
include("../../php/connect-database.php");

$restaurant_ID=$_GET['a'];

if(isset($_SESSION['ERROR_MSG'])){
    echo '<script>alert("'.$_SESSION['ERROR_MSG'].'")</script>';
    $_SESSION['ERROR_MSG']=null;
}
$result=mysqli_query($conn, "SELECT food_ID FROM food WHERE restaurant_ID='$restaurant_ID' limit 1");
$row=mysqli_fetch_array($result, 1);
$id=$row['food_ID'];
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
    <link rel="stylesheet" href="../../styles/restaurant/restaurant-details.css">
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
            <li><a class="nav-link" href="../../../complaint/foody-complaint/user/complaintlistmain.php">Complaint List</a></li>
        </ul>
        <a href="../../../logout.php" class="nav-link" style="text-decoration: underline;">
            Logout
             <i class="fa fa-sign-out" aria-hidden="true" style></i>
         </a>
        </nav>
    
        <!-- main content (right side) -->
        <div id="main-content">
            <div id="restaurant">
                <?php
                $result=mysqli_query($conn, "SELECT * FROM restaurant WHERE restaurant_ID='$restaurant_ID'");
                while($row=mysqli_fetch_array($result, 1)){ $_SESSION['restaurant_name']=$row['restaurant_name'];
                ?>
                <div id="restaurant-image"><img src="../<?php echo $row['restaurant_image']?>"/></div>   
                <div id="restaurant-info">
                    <h4 id="restaurant-name"><?php echo $row['restaurant_name']?></h4>
                    <p id="restaurant-address"><?php echo $row['restaurant_address']?></p><br>
                    <p id="restaurant-intro"><?php echo $row['restaurant_description']?></p>
                </div>
                <?php } ?>
            </div>

            <form method="POST" action="../restaurant/order-list.php?id=<?php echo $id;?>">
                <div id="food-list">
                    <?php
                    $result=mysqli_query($conn, "SELECT * FROM food WHERE restaurant_ID='$restaurant_ID' && food_availability=1");
                        if(isset($_SESSION['order'])){
                            $foodQuantity=$_SESSION['order'];
                        }
                    if(mysqli_num_rows($result)>0){ $i=0;
                        while($row=mysqli_fetch_array($result, 1)){ 
                    ?>
                    <div class="food-card">
                        <div class="food-image">
                            <img src="../../src/img/<?php echo $row['food_image'];?>"/>                    
                        </div>
                        <div class="food-details">
                            <h3><?php echo $row['food_title'];?></h3>
                            <p><?php echo $row['food_description'];?></p><br>
                            <p>RM <?php echo $row['food_price'];?></p>
                        </div>
                        <div class="food-quantity-section">
                            <button type="button" class="dec-button" name="minus">-</button>
                            <input type="text" class="food-quantity" value=<?php if(isset($_SESSION['order']) && $_SESSION['restaurant_ID']==$restaurant_ID && reset($foodQuantity)!=0){echo reset($foodQuantity); array_shift($foodQuantity);}else{echo "0";}?> id=<?php echo $i;$i=$i+1;?> name="<?php echo $row['food_ID']?>"/>
                            <button type="button" class="inc-button" name="plus">+</button>
                        </div>
                    </div>
                    <?php }} 
                    $_SESSION['restaurant_ID']=$restaurant_ID;
                    ?>
                </div>
                <div class="button-section">
                    <a href="../index.php"><button type="button" id="back-button">Back</button></a>
                    <button type="submit" id="checkout-button">Checkout</button>
                </div>
            </form>
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
            })
        }

        for(var i=0; i<dec.length; i++){
            var button = dec[i];
            button.addEventListener('click',function(event){

                var buttonClicked = event.target;

                var input = buttonClicked.parentElement.children[1];

                var inputValue = input.value;
                
                var newValue = parseInt(inputValue) - 1;
                if(newValue>=0){
                    input.value=newValue;
                }else{
                    input.value=0;
                }
            })
        }
    </script>
</body>
</html>
