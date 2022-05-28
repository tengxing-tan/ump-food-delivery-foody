<?php
    include_once 'C:\xampp\htdocs\ump-food-delivery-foody\dbconnection.php';
    session_start();

    if(isset($_POST["Add User"])){
        header ("Location: AddUser.php");
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
    <link rel="stylesheet" href="style/main.css">
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
            Admin
            <i class="fa-solid fa-user"></i>
          </a>
        </div>
    </div>

    <!-- content -->
    <div id="content-wrapper">
        <!-- navigation bar (left side) -->
        <nav id="nav-bar">
        <ul>
            <li><a class="nav-link" href="AdminHomepage.php">Dashboard</a></li>
            <li><a class="nav-link" href="AdminProfile.php">Admin Profile</a></li>
            <li><a class="nav-link" href="UserList.php">User List</a></li>
            <li><a class="nav-link" href="UserReport.php">User Report</a></li>
            <li><a class="nav-link" href="ComplaintReport.php">Complaint Report</a></li>
            <li><a class="nav-link" href="login.php">Logout</a></li>
        </ul>
        </nav>
    
        <!-- main content (right side) -->
        <div id="main-content">
        
            <form action="#" method="post">
                <select name="type">
                    <option disable selected value>Choose User Type</option>
                    <option value="General User">User</option>
                    <option value="Rider">Rider</option>
                    <option value="Restaurant Owner">Restaurant Owner</option>
                </select>

                <button type="submit" name="next" value = "Add User" >Next</button>  
                <a href="AddUser.php"><button class = 'btn'>Add data</button></a>
            </form>

            <?php

            ?>

        </div>
    </div>
</body>
</html>
