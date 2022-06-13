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
        <!-- Rider can search for history delivery record -->
        <div id="main-content">
            <div id="topPart">
                <form action="searchRecord.php" method="get">
                    <input type="date" id="date" name="date">
                     <input type="submit" id="button" value="Search">
                </form>
                
            </div>

            <div id="recordDetail">
            <div id="topD">
                    <div id="item1" class="item1"><h3 id="topic1">Date</h3>
                    </div>
                    <div id="item2" class="item2"><h3 id="topic2">Order ID</h3>
                    </div>
                    <div id="item3" class="item3"><h3 id="topic3">From</h3>
                    </div>
                    <div id="item4" class="item4"><h3 id="topic4">To</h3>
                    </div>
                    <div id="item4" class="item4"><h3 id="topic5">Action</h3>
                    </div> 
                </div>
                <!-- Show delivery record within a month (current month)-->
        <?php
                $transdate = date('m-d-Y', time());

                $d = date_parse_from_format("m-d-y",$transdate);

               $month = $d["month"];
                
            session_start();
            $rider = $_SESSION["rider"];
           include '../connectDB.php';
   
           $sql = "SELECT o.order_ID, r.restaurant_address, u.user_address, o.order_date FROM `order` o 
           INNER JOIN `restaurant` r ON o.restaurant_ID = r.restaurant_ID
           INNER JOIN `user` u ON u.user_ID = o.user_ID
           WHERE o.rider_ID = '$rider' AND o.order_status = 'Completed' AND MONTH(o.order_date) = '$month' ORDER BY o.order_date DESC"; 
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
                            <p class='restaurantID' style='height: fit-content;'>".$row['restaurant_address']."</p>
                            <p class='userID' style='height: fit-content;'>".$row['user_address']."</p>
                            <p class='action'><a class='fa fa-eye' aria-hidden='true' style='text-decoration: none' href='specificRecord.php?i=$row[order_ID]'></a>
                        </li>";
                            }
                    } else {
                        echo "<p class='noresult'>0 results</p>";
                    }
                    
                    ?>            
                    </ul>
                </div>
           
             </div>
    </div>
</body>
</html>
