<?php
session_start();
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
    <link rel="stylesheet" href="../../styles/deliveryNotes.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="../../function/feedback.js" defer></script>
    <!-- icon library | font awesome -->
    <script src="https://kit.fontawesome.com/06b2bd9377.js" crossorigin="anonymous"></script>
</head>
<body>
    <!-- title bar -->
    <div id="title-bar">
        <!-- foody logo -->
        <a id="foody-link" class="icon-link" href="#index.html">Foody</a>

        <!-- user profile -->
       <div>
          <a class="icon-link" href="#">
            <p onclick="window.location.href='../riderprofile.php'">Rider</p>
            <i class="fa-solid fa-user"></i>
          </a>
        </div>
    </div>


    <!-- content -->
    <div id="content-wrapper">
        <!-- navigation bar (left side) -->
        <nav id="nav-bar">
        <ul>
            <li><a id="home" class="nav-link" href="../home/mainPage.php">Home</a></li>
            <li><a class="nav-link" href="../commission/commissionWeekly.php">Commission</a></li>
            <li><a id="deliveryRecord" class="nav-link" href="../delivery record/deliveryRecord.php">Delivery Record</a></li>
            <li><a id="complaint" class="nav-link" href="../user complaint/complaint.php">User's Complaint</a></li>
            <li><a class="nav-link" href="../report/report.php">Report</a></li>
        </ul>
            <a href="../../../logout.php" class="nav-link" style="text-decoration: underline;">
                Logout
                <i class="fa fa-sign-out" aria-hidden="true" style></i>
            </a>
        </nav>
   
        <!-- main content (right side) -->
        <div id="main-content">
            
           <!--Show delivery notes -->
           
           <?php 
            include '../connectDB.php';

           $order = $_SESSION["order"]; 
           $restaurant = "SELECT restaurant_name, restaurant_address FROM restaurant WHERE restaurant_ID IN(SELECT restaurant_ID FROM `order` WHERE order_ID = '$order')";
           $userInfo = "SELECT user_name, user_address, user_phoneNum FROM `user` WHERE user_ID IN(SELECT user_ID FROM `order` WHERE order_ID = '$order')";
           $orderInfo = "SELECT order_date FROM `order` WHERE order_ID = '$order'";
           //$foodInfo = "SELECT food_ID, food_title, food_price, SUM(`food_price`) FROM `food` WHERE food_ID IN(SELECT food_ID FROM `orderedfood` WHERE order_ID = '$order')";
           $foodInfo = "SELECT f.food_ID, f.food_title, f.food_price, o.food_quantity FROM `food` f
           INNER JOIN `orderedfood` o ON o.food_ID = f.food_ID
            WHERE o.order_ID = '$order'";
           $resultUser = mysqli_query($link, $userInfo);
           $viewUser = mysqli_fetch_assoc($resultUser);
           $resultRest = mysqli_query($link, $restaurant);
           $viewRest = mysqli_fetch_assoc($resultRest);
           $resultOrder = mysqli_query($link, $orderInfo);
           $viewOrder = mysqli_fetch_assoc($resultOrder);
           $resultFood = mysqli_query($link, $foodInfo);
          
           ?>
          <div id="top">
                <form action="onlinePage.php" method="get">
                <h3>Delivery Notes</h3>
                <a href="onlinePage.php"><i class="fa" id="arrowB">&#xf177;</i></a>
                </form>
                
            </div>
           <div id="deliveryDetail">
                <div id="firstD">
                    <div id="leftTD" class="item1"><h3>From</h3><p class="addName"><?php echo $viewRest['restaurant_name'];?></p>
                        <p class="address">
                        <?php echo $viewRest['restaurant_address'];?></p>
                    </div>
                    
                    <div class="item2"><i class="fa" id="arrowTo">&#xf178;</i></div>
                    
                    <div id="rightTD" class="item3"><h3>To</h3><p class="addName"><?php echo $viewUser['user_name'];?></p>
                        <p class="address">
                        <?php echo $viewUser['user_address'];?></p>
                    </div>
                </div>
                <hr>
                <div id="secondD">
                    <h3>Order Contents</h3>
                    <?php 
                    $totalPrice = 0;
                    if (mysqli_num_rows($resultFood) > 0) {
                        while($row = mysqli_fetch_assoc($resultFood)) 
                        {
                            $price = $row['food_quantity']*$row['food_price'];
                            $totalPrice += $price; 
                            echo "
                    <ul>
                        <li><p class='foodName'>".$row['food_title']."</p><p class='foodQuantity'>x".$row['food_quantity']."</p><p class='foodPrice'>RM".$price."</p></li>
                          </ul> 
                          ";  }
                        }?>
                    <div id="total"><p>Total Amount: RM <?php echo $totalPrice?></p></div>
                </div>
                <hr>
              <div id="thirdD">
                    <h3>Customer phone number</h3>
                    <p id="notes"><?php echo $viewUser['user_phoneNum'];?></p>
                </div>
                <hr>
        
              <!--  <div id="fifthD">
                    <h3>Extra Notes</h3>
                    <p id="notes">
                        <?php //if($viewOrder['extra_note'] == '')
                    //{echo "None";}
                    //else{echo $viewOrder['extra_note'];}?></p>
                </div>
                <hr>
                    -->
                <div id="sixthD">
                    <h3>Date</h3>
                    <p id="date"><?php echo $viewOrder['order_date'];?></p>
                </div>
               
        </div>
        
        </div>
    </div>
</body>
</html>
