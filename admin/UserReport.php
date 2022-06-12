<?php
    include_once 'dbconnection.php';
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/main.css">
    <link rel="stylesheet" href="styles.css">
    <title>Admin Homepage</title>
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
            <li><a class="nav-link" href="../">Logout</a></li>
        </ul>
        </nav>
    
        <!-- main content (right side) -->
        <div id="main-content">
   
        <div class="flexbox">
        <div class="card">
            <h2 style="text-align:center">Total User</h2>
            <?php
                    $query ="SELECT user_ID FROM user ORDER BY user_ID";
                    $query_run =  mysqli_query($con, $query);
                    $row1 = mysqli_num_rows($query_run);

                    $query ="SELECT rider_ID FROM rider ORDER BY rider_ID";
                    $query_run =  mysqli_query($con, $query);
                    $row2 = mysqli_num_rows($query_run);

                    $query ="SELECT ro_ID FROM restaurantowner ORDER BY ro_ID";
                    $query_run =  mysqli_query($con, $query);
                    $row3 = mysqli_num_rows($query_run);

                    $result = $row1 + $row2 + $row3;
                    echo '<h1 style="text-align:center">'  .$result.'</h1>';
                ?>


        </div>
        </div>

        <div>
            <div class="card"><canvas id="chart"></canvas></div>
        </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.8.0/dist/chart.min.js"></script>
<script src = "graph.js"></script>
</body>
</html>