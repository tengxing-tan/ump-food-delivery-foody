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
    <link rel="stylesheet" href="../../styles/expenses-list/add-expenses.css">
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
            <li><a class="nav-link" href="../index.php">Home</a></li>
            <li><a class="nav-link active" href="../expenses-list/index.php">Expenses List</a></li>
            <li><a class="nav-link" href="../calculate-average-expenses/index.php">Calculate Average Expenses</a></li>
            <li><a class="nav-link" href="../../../complaint/foody-complaint/user/complaintlistmain.php">Complaint List</a></li>
        </ul>
        <a href="index.php" class="nav-link" style="text-decoration: underline;">
            Logout
             <i class="fa fa-sign-out" aria-hidden="true" style></i>
         </a>
        </nav>
    
        <!-- main content (right side) -->
        <div id="main-content">

            <form class="expenses-form" method="post" action="../../php/expenses-list/expenses-authenticator.php">
                <div class="expenses-details">
                    <div class="expenses-title">
                        <input type="text" name="expenses-title" placeholder="Expenses Title, ex: Dinner"/>
                    </div>
      
                    <?php
                    if(isset($_SESSION['ERROR_MESSAGE'])){
                        $i=0;
                    if(in_array("title cannot be empty.", $_SESSION['ERROR_MESSAGE'])){
                        echo "<p style='color:red;font-size:12px;'>*".$_SESSION['ERROR_MESSAGE'][$i]. "</p>";
                        $i+=1;
                    }
                    }
                    ?>

                    <div class="date">
                        <input type="date" name="date" placeholder="Date, ex: 2022-01-01"/>
                    </div>

                    <?php
                    if(isset($_SESSION['ERROR_MESSAGE'])){
                    if(in_array("date cannot be empty.", $_SESSION['ERROR_MESSAGE'])){
                        echo "<p style='color:red;font-size:12px;'>*".$_SESSION['ERROR_MESSAGE'][$i]. "</p>";
                        $i+=1;
                    }
                    if(in_array("invalid date format.", $_SESSION['ERROR_MESSAGE'])){
                        echo "<p style='color:red;font-size:12px;'>*".$_SESSION['ERROR_MESSAGE'][$i]. "</p>";
                        $i+=1;
                    }}
                    ?>

                    <div class="description">
                        <textarea placeholder="Expenses Description" name="expenses-description" cols="130" rows="10"></textarea>
                    </div>

                    <div class="expenses-amount">
                        <input type="text" name="expenses-amount" placeholder="Expenses Amount, ex: 22.10"/>
                    </div> 

                    <?php
                    if(isset($_SESSION['ERROR_MESSAGE'])){
                    if(in_array("expenses amount cannot be empty.", $_SESSION['ERROR_MESSAGE'])){
                        echo "<p style='color:red;font-size:12px;'>*".$_SESSION['ERROR_MESSAGE'][$i]. "</p>";
                        $i+=1;
                    }
                    if(in_array("expenses amount must be numbers.", $_SESSION['ERROR_MESSAGE'])){
                        echo "<p style='color:red;font-size:12px;'>*".$_SESSION['ERROR_MESSAGE'][$i]. "</p>";
                        $i=NULL;
                    }}
                    $_SESSION['ERROR_MESSAGE']=null;
                    ?>

                </div>

                <div class="button-section">
                    <a href="index.php"><button type="button" id="cancel-button">Cancel</button></a>
                    <button type="submit" id="add-button">Add</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
