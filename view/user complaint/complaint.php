<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foody | UMP Food Delivery System</title>

    <!-- external stylesheet -->
    <link rel="stylesheet" href="../../styles/main.css">
    <link rel="stylesheet" href="../../styles/complaint.css">
    <script src="../../function/detailRecord.js"></script>
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
            <li><a id="report" class="nav-link" href="../report/report.php">Report</a></li>
            
        </ul>
            <a href="index.php" class="nav-link" style="text-decoration: underline;">
                Logout
                <i class="fa fa-sign-out" aria-hidden="true" style></i>
            </a>
        </nav>
    
        <!-- main content (right side) -->
        <div id="main-content">
        <!--List all complaints from user -->
        <?php
           include '../connectDB.php';
           session_start();
           $rider = $_SESSION["rider"] = '1';

            $sql = "SELECT order_ID, complaint_ID, complaint_date, complaint_type, complaint_comment, complaint_status FROM `complaintlist` WHERE order_ID IN(SELECT order_ID FROM `order` WHERE rider_ID = '$rider') ORDER BY complaint_date DESC";
            $result = mysqli_query($link, $sql);?>

            <div id="compDetail">
                <div id="topD">
                    <div id="item1" class="item1"><h3 id="topic1">Complaint's ID</h3>
                    </div>
                    <div id="item2" class="item2"><h3 id="topic2">Date</h3>
                    </div>
                    <div id="item3" class="item3"><h3 id="topic3">Complaint</h3>
                    </div>
                    <div id="item4" class="item4"><h3 id="topic4">Feedback</h3>
                    </div>
                    <div id="item5" class="item5"><h3 id="topic5">Status</h3>
                    </div>
                    <div id="item6" class="item6"><h3 id="topic6">Action</h3>
                    </div>
                </div>
                <div id="middleD">
                    <ul>
                    <?php

                        if (mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_assoc($result)) 
                            {
                            echo "
                        <li><p class='compID'>".$row['order_ID']."</p>
                            <p class='compDate'>".$row['complaint_date']."</p>
                            <p class='compDesc'>".$row['complaint_comment']."</p>
                            <p class='feedback'>".$rider."</p>
                            <p class='status'>".$row['complaint_status']."</p>
                            <p class='action'><a id='view' class='fa fa-eye' aria-hidden='true' style='text-decoration: none' href='viewFeedback.php?i=$row[complaint_ID]'><span class='tips'>View</span></a><a id='add' class='fa fa-plus-square-o' aria-hidden='true' style='text-decoration: none' href='addFeedback.php?i=$row[complaint_ID]'><span class='tips'>Add</span></a><a id='edit' class='fa fa-pencil-square-o' aria-hidden='true' style='text-decoration: none' href='updateFeedback.php?i=$row[complaint_ID]'><span class='tips'>Update</span></a><a id='del' class='fa fa-trash-o' aria-hidden='true' style='text-decoration: none; color:red;' href='deletedFeedback.php?i=$row[complaint_ID]'><span class='tips'>Delete</span></a></p>
                        </li>";

                        

                            }
                    } else {
                        echo "<p id='noOrder'>No complaint!</p>";
                    }
                    
                    ?>
                                             
                    </ul>
                </div>
            </div>
             </div>
    </div>
</body>
</html>
