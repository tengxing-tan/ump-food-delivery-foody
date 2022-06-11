<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foody | UMP Food Delivery System</title>

    <!-- external stylesheet -->
    <link rel="stylesheet" href="../../styles/main.css">
    <link rel="stylesheet" href="../../styles/riderReport.css">

    <!-- icon library | font awesome -->
    <script src="https://kit.fontawesome.com/06b2bd9377.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
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
            <li><a class="nav-link" href="../delivery record/deliveryRecord.php">Delivery Record</a></li>
            <li><a id="complaint" class="nav-link" href="../user complaint/complaint.php">User's Complaint</a></li>
            <li><a id="report" class="nav-link" href="#">Report</a></li>
        </ul>
            <a href="index.php" class="nav-link" style="text-decoration: underline;">
                Logout
                <i class="fa fa-sign-out" aria-hidden="true" style></i>
            </a>
        </nav>
    
        <!-- main content (right side) -->
        <div id="main-content">
        <?php
           include '../connectDB.php';
           session_start();
           $rider = $_SESSION["rider"] = '1';
            $sql = "SELECT COUNT(`order_date`), `order_date`, WEEK(`order_date`), `order_status` FROM `order` WHERE rider_ID = '$rider' AND order_status = 'Completed' GROUP BY WEEK(`order_date`)";
            $sql2 = "SELECT COUNT(`order_date`), `order_date`, MONTHNAME(`order_date`), `order_status` FROM `order` WHERE rider_ID = '$rider' AND order_status = 'Completed' GROUP BY MONTH(`order_date`)";
            $sql3 = "SELECT COUNT(`order_date`), `order_date`, YEAR(`order_date`), `order_status` FROM `order` WHERE rider_ID = '$rider' AND order_status = 'Completed' GROUP BY YEAR(`order_date`)";
            $result = mysqli_query($link, $sql);
            $result2 = mysqli_query($link, $sql2);
            $result3 = mysqli_query($link, $sql3);
            $num_row = mysqli_num_rows($result);
            $num_row2 = mysqli_num_rows($result2);
            $num_row3 = mysqli_num_rows($result3);
            $rate = 5;
             $totalComm = array();
             $week = array();
             $totalCommM = array();
             $month = array();
             $totalCommY = array();
             $year = array();
             
        //weekly commission bar graph 
             for($i=0; $i<$num_row; $i++){
                            while($row = mysqli_fetch_array($result, 1)) 
                            {
                            
                                array_push($week, $row['WEEK(`order_date`)']);
                                array_push($totalComm, $row['COUNT(`order_date`)']*$rate);

                            }
                    } 
            //monthly commission bar graph 
            for($x=0; $x<$num_row2; $x++){
                        while($row = mysqli_fetch_array($result2, 1)) 
                        {
                        
                            array_push($month, $row['MONTHNAME(`order_date`)']);
                            array_push($totalCommM, $row['COUNT(`order_date`)']*$rate);

                        }
                } 
            //Year or total commission bar graph 
            for($y=0; $y<$num_row3; $y++){
                    while($row = mysqli_fetch_array($result3, 1)) 
                    {
                    
                        array_push($year, $row['YEAR(`order_date`)']);
                        array_push($totalCommY, $row['COUNT(`order_date`)']*$rate);

                    }
            } 
                    ?>
                    <div id="graph">
                        <div>
                            <canvas id="myChart" style="width:100%;max-width:600px"></canvas>
                        </div>
                          <div id="second">
                              <canvas id="myChart2" style="width:100%;max-width:600px"></canvas> 
                          </div>
                          <div id="third">
                              <canvas id="myChart3" style="width:100%;max-width:600px"></canvas> 
                          </div>
                        
                    </div>
        </div>
        </div>
        
        <script type="text/javascript">
    var xValues = <?php echo json_encode($week);?>;
    var yValues = <?php echo json_encode($totalComm);?>;
    var barColors = "#6C5A8A";

    new Chart("myChart", {
  
        type: "bar",
        data: {
            labels:xValues,
            datasets: [{
                backgroundColor: barColors,
                data: yValues,
            }]
        },
        options: {
            legend: {display: false},
            title: {
                display: true,
                text: "Your Weekly Comission in RM"
            },
            scales: {
                yAxes: [{
                ticks: {beginAtZero: true},
                display: true,
                scaleLabel: {
                    display: true,
                    labelString: "Commission",
                }
            }],
            
            xAxes: [{
                scaleLabel: {
                    display: true,
                    labelString: "Week",
                }
                }],
            
            } 
            }
    });
</script>
<script type="text/javascript">
    var xValues = <?php echo json_encode($month);?>;
    var yValues = <?php echo json_encode($totalCommM);?>;
    var barColors = "#6C5A8A";

    new Chart("myChart2", {

        type: "bar",
        data: {
            labels:xValues,
            datasets: [{
                backgroundColor: barColors,
                data: yValues,
            }]
        },
        options: {
            legend: {display: false},
            title: {
                display: true,
                text: "Your Monthly Comission in RM"
            },
            scales: {
                yAxes: [{
                ticks: {beginAtZero: true},
                display: true,
                scaleLabel: {
                    display: true,
                    labelString: "Commission",
                }
            }],
            
            xAxes: [{
                scaleLabel: {
                    display: true,
                    labelString: "Month",
                }
                }],
            
            } 
            }
    });
</script>

<script type="text/javascript">
    var xValues = <?php echo json_encode($year);?>;
    var yValues = <?php echo json_encode($totalCommY);?>;
    var barColors = "#6C5A8A";

    new Chart("myChart3", {
 
        type: "bar",
        data: {
            labels:xValues,
            datasets: [{
                backgroundColor: barColors,
                data: yValues,
            }]
        },
        options: {
            legend: {display: false},
            title: {
                display: true,
                text: "Your Yearly Comission in RM"
            },
            
            scales: {
            yAxes: [{
                ticks: {beginAtZero: true},
                display: true,
                scaleLabel: {
                    display: true,
                    labelString: "Commission",
                }
            }],
            
            xAxes: [{
                scaleLabel: {
                    display: true,
                    labelString: "Year",
                }
                }],
            
            } 
            }

        
    });
</script>
</body>
</html>
