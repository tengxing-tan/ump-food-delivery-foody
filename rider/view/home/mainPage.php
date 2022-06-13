<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foody | UMP Food Delivery System</title>

    <!-- external stylesheet -->
    <link rel="stylesheet" href="../../styles/main.css">
    <link rel="stylesheet" href="../../styles/mainPage.css">
    <link rel="stylesheet" href="../../styles/deliveryNotes.css">
    <!--<script src="../../function/mainPage.js" defer></script>
     icon library | font awesome -->
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
            <a href="../../../logout.php" class="nav-link" style="text-decoration: underline;">
                Logout
                <i class="fa fa-sign-out" aria-hidden="true" style></i>
            </a>
        </nav>
    
        <!-- main content offline page-->
        <div id="main-content">
            <button id="onlineBtn" onclick="window.location.href='viewOrder.php'">Offline</button>
           <div class="map">
                   <iframe width="1000" height="350" id="gmap" src="https://maps.google.com/maps?q=ump%20pekan%20pahang&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0">
                   </iframe>
                   <br>
                </style>
               </div>
            
            </div>
        </div>
</body>
</html>
