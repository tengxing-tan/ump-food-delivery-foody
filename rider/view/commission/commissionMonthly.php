<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foody | UMP Food Delivery System</title>

    <!-- external stylesheet -->
    <link rel="stylesheet" href="../../styles/main.css">
    <link rel="stylesheet" href="../../styles/commissionMonthly.css">
    <!--  <script src="../../function/commissionCal.js" defer></script>
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
            <li><a id="home" class="nav-link" href="../home/mainPage.php">Home</a></li>
            <li><a id="commission" class="nav-link" href="#">Commission</a></li>
            <li><a class="nav-link" href="../delivery record/deliveryRecord.php">Delivery Record</a></li>
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
            <div id="qrcode">

            </div>
            <div id="topButton">
                <button id="weekly" onclick="window.location.href='commissionWeekly.php'">Weekly Comission</button>
                <button id="monthly">Monthly Comission</button>
                <button id="total" onclick="window.location.href='commissionTotal.php'">Total Comission</button>
            </div>
            <!--Select order and calculate monthly commission (assume commission is RM5 per order) -->
            <?php
           include '../connectDB.php';
           session_start();
           $rider = $_SESSION["rider"];

            $sql = "SELECT COUNT(`order_date`), `order_date`, MONTHNAME(`order_date`), `order_status` FROM `order` WHERE rider_ID = '$rider' AND order_status = 'Completed' GROUP BY MONTH(`order_date`) ORDER BY MONTH(`order_date`) DESC";
            $result = mysqli_query($link, $sql);?>

            <div id="commDetail">
                <div id="topD">
                    <div id="item1" class="item1"><h3 id="topic1">Months</h3>
                    </div>
                    <div id="item2" class="item2"><h3 id="topic2">Total Delivered</h3>
                    </div>
                    <div id="item3" class="item3"><h3 id="topic3">Commission</h3>
                    </div>
                </div>
                <div id="middleD">
                    <ul>
                    <?php   
                        $rate = 5;
                        $total = 0;
                        $month = 0;

                        if (mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_assoc($result)) 
                            {
                            echo "
                        <li><p class='date'>".$row['MONTHNAME(`order_date`)']."</p>
                            <p class='totalDelivered'>".$row['COUNT(`order_date`)']."</p>
                            <p class='commission'>RM".$row['COUNT(`order_date`)']*$rate."</p>
                        </li>";

                        $total += $row['COUNT(`order_date`)']*$rate;
                        $month += 1;


                            }
                    } else {
                        echo "<p class='noresult'>0 results</p>";
                    }
                    $average = $total / $month;
                    $avg = number_format($average, 2);
                    ?>
                                             
                    </ul>
                </div>
           </div>
            <div id="average">
                    <p>Average Monthly Commission : </p><p id="avg">RM <?php echo $avg?></p>
                </div>
        </div>
    </div>
</body>
</html>
