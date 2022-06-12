<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foody | UMP Food Delivery System</title>

    <!-- external stylesheet -->
    <link rel="stylesheet" href="../styles/main.css">
    <link rel="stylesheet" href="../styles/riderprofile.css">
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
            <p>Rider</p>
            <i class="fa-solid fa-user"></i>
          </a>
        </div>
    </div>
    <div id="content-wrapper">
        <!-- navigation bar (left side) -->
        <nav id="nav-bar">
        <ul>
            <li><a  class="nav-link" href="home/mainPage.php">Home</a></li>
            <li><a class="nav-link" href="commission/commissionWeekly.php">Commission</a></li>
            <li><a id="deliveryRecord" class="nav-link" href="delivery record/deliveryRecord.php">Delivery Record</a></li>
            <li><a id="complaint" class="nav-link" href="user complaint/complaint.php">User's Complaint</a></li>
            <li><a class="nav-link" href="report/report.php">Report</a></li>
        </ul>
            <a href="../../../logout.php" class="nav-link" style="text-decoration: underline;">
                Logout
                <i class="fa fa-sign-out" aria-hidden="true" style></i>
            </a>
        </nav>
         
        <?php
           include 'connectDB.php';
           session_start();
           $rider = $_SESSION["rider"];

            //$sql = "SELECT complaint_ID, complaint_date, complaint_description, feedback_info, feedback_status FROM complaintlist";
            $sql = "SELECT rider_name, rider_email, rider_phoneNum, rider_address FROM `rider` WHERE rider_ID = '$rider'";
            $result = mysqli_query($link, $sql);?>
        <!-- main content (right side) -->
        <div id="main-content">
        <div id="riderInfo">
            <h3>Rider Profile</h3>
            <ul>
            <?php

            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) 
                {
                echo "
                        <li>Name <p>:</p><p>".$row['rider_name']."</p></li>
                        <li>Email Address <p>:</p><p>".$row['rider_email']."</p></li>
                        <li>Phone No <p>:</p><p>".$row['rider_phoneNum']."</p></li>
                        <li>Address <p>:</p><p>".$row['rider_address']."</p></li> ";
                        }} 
            ?>
                    </ul>
        </div>
        </div>
        </div>
    </div>
</body>
</html>
