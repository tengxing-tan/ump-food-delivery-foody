<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foody | UMP Food Delivery System</title>

    <!-- external stylesheet -->
    <link rel="stylesheet" href="../../styles/main.css">
    <link rel="stylesheet" href="../../styles/deliveryRecord.css">
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
            <li><a class="nav-link" href="../commission/commissionWeekly.php">Commissio</a></li>
            <li><a id="deliveryRecord" class="nav-link" href="#">Delivery Record</a></li>
            <li><a id="complaint" class="nav-link" href="../user complaint/complaint.php">User's Complaint</a></li>
            <li><a id="report" class="nav-link" href="../report/report.php">Report</a></li>
        </ul>
            <a href="../../../logout.php" class="nav-link" style="text-decoration: underline;">
                Logout
                <i class="fa fa-sign-out" aria-hidden="true" style></i>
            </a>
        </nav>
    
        <!-- main content (right side) -->
        <div id="main-content">
            <div id="arrow">
            <a href="deliveryRecord.php"><i class="fa" id="arrowB">&#xf177;</i></a>
                
            </div>

            <div id="recordDetail">
            <div id="topD">
                    <div id="item1" class="item1"><h3 id="topic1">Date</h3>
                    </div>
                    <div id="item2" class="item2"><h3 id="topic2">Order ID</h3>
                    </div>
                    <div id="item3" class="item3"><h3 id="topic3">Restaurant ID</h3>
                    </div>
                    <div id="item4" class="item4"><h3 id="topic4">User ID</h3>
                    </div>
                    <div id="item5" class="item5"><h3 id="topic5">Action</h3>
                    </div>
                </div>
        <?php
           include '../connectDB.php';
           session_start();
            $date = $_GET['date'];
            $rider = $_SESSION["rider"];

            $sql = "SELECT order_ID, restaurant_ID, rider_ID, user_ID, order_date FROM `order` WHERE order_date = '$date' AND rider_ID = '$rider'";
            $result = mysqli_query($link, $sql);
            ?>

                <div id="middleD">
                    <ul> 
                        <?php
                        if (mysqli_num_rows($result) > 0){
                            while($row = mysqli_fetch_assoc($result)) 
                            {
                            echo "
                        <li><p class='orderDate'>".$row['order_date']."</p>
                            <p class='orserID'>".$row['order_ID']."</p>
                            <p class='restaurantID'>".$row['restaurant_ID']."</p>
                            <p class='userID'>".$row['user_ID']."</p>
                            <p class='action'><a class='fa fa-eye' aria-hidden='true' style='text-decoration: none' href='specificRecord.php?i=$row[order_ID]&r=$row[restaurant_ID]&u=$row[user_ID]'></a>
                        </li> ";
                       
                            }
                    } else {
                        header("Location:noResult.php");
                         exit(); 
                    }
                    
                    ?>            
                    </ul>
                
            </div>
             </div>
    </div>
</body>
</html>
