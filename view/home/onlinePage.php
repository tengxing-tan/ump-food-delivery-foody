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
    <link rel="stylesheet" href="../../styles/onlinePage.css">
    
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
            <li><a id="home" class="nav-link" href="#">Home</a></li>
            <li><a class="nav-link" href="../commission/commissionWeekly.php">Commission</a></li>
            <li><a class="nav-link" href="../delivery record/deliveryRecord.php">Delivery Record</a></li>
            <li><a id="complaint" class="nav-link" href="../user complaint/complaint.php">User's Complaint</a></li>
            <li><a class="nav-link" href="../report/report.php">Report</a></li>
        </ul>
            <a href="index.php" class="nav-link" style="text-decoration: underline;">
                Logout
                <i class="fa fa-sign-out" aria-hidden="true" style></i>
            </a>
        </nav>
    
        <!--Pass rider id and update rider id in order table-->
    <?php 
            
            include '../connectDB.php';
            if(isset($_GET["i"])){
                $order = $_GET["i"];
                $_SESSION["order"] = $order;
            }
            
            $id =  $_SESSION["order"];
            $rider = '1';

            $check = "SELECT order_ID, order_status FROM `order` WHERE `order_ID` = '$id'";
            $result = mysqli_query($link, $check);
   
            $data = mysqli_fetch_assoc($result);
   
            if($data['order_status'] == "Prepared")
            {
            $sql = "UPDATE `order` SET rider_ID = '$rider', order_status = 'Accepted' WHERE `order_ID` = '$id'";
            mysqli_query($link, $sql);
            }
             
        ?>
        <!-- main content (right side) -->
        <div id="main-content">
            <div id="topBtn">
      
               <button id="onlineBtn" >Online</button>
               <button id="dNotesBtn" onclick="window.location.href='deliveryNotes.php'">Delivery Notes</button>
               
              <!--Update order status when click -->
            </div>
            <div class="order-list-container">
                <div class="order-status-menu">
                    <ul>
                        <li onclick="window.location.href='pickedUp.php'"><i class="fa fa-hand-paper-o" style="margin-right: 0.5rem"></i>Picked Up</li>
                        <li onclick="window.location.href='delivering.php'"><i class="fa-solid fa-paper-plane" style="margin-right: 0.5rem"></i>Delivering</li>
                        <li onclick="window.location.href='arrived.php'"><i class="fa fa-map-marker" style="margin-right: 0.5rem"></i>Arrived</li>
                        <li onclick="window.location.href='QRcode.php'"><i class="fa-solid fa-check" style="margin-right: 0.5rem"></i>Delivered</li>
                    </ul>
                </div>
           <div class="map">
                   <iframe width="1000" height="350" id="gmap" src="https://maps.google.com/maps?q=ump%20pekan%20pahang&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0">
                   </iframe>
                   <br>
                </style>
               </div>            
        </div>
        <!--Pop up confirmation before offline-->
        <div class="container" id="container">
               <div class="deliveryDetail "id="deliveryDetail">
                
                <div id="middleContainer">
                    <h3>Confirm to offline before complete the order?</h3>
                </div>
           </div>
                <div id="bottomBtn">
                    <button id="cancelBtn">Cancel</button>
                    <button id="acceptBtn" onclick="window.location.href='offlinePage.php'">Confirm</button>
                </div>

        </div>
    </div>
    <script src="../../function/onlinePage.js"></script>
</body>
</html>
