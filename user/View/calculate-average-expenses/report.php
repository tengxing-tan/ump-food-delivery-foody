<?php
session_start();
include("../../php/connect-database.php");
$user_ID=$_SESSION['user_ID'];
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
    <link rel="stylesheet" href="../../styles/calculate-average-expenses/report.css">

    <!-- icon library | font awesome -->
    <script src="https://kit.fontawesome.com/06b2bd9377.js" crossorigin="anonymous"></script>
    <script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <script src="../../js/calculate-average-expenses/chart.js"></script>
</head>
<body>
    <!-- title bar -->
    <div id="title-bar">
        <!-- foody logo -->
        <a id="foody-link" class="icon-link" href="../index.php">Foody</a>

        <!-- user profile -->
        <div>
            <a class="icon-link" href="../restaurant/order-list.php">
                Order List
                <i class="fa-solid fa-cart-shopping"></i>
            </a>
          <a class="icon-link" href="../user.php">
            User
            <i class="fa-solid fa-user"></i>
          </a>
        </div>
    </div>

    <!-- content -->
    <div id="content-wrapper">
        <!-- navigation bar (left side) -->
        <nav id="nav-bar">
        <ul>
            <li><a class="nav-link" href="../index.php">Home</a></li>
            <li><a class="nav-link" href="../expenses-list/index.php">Expenses List</a></li>
            <li><a class="nav-link active" href="../calculate-average-expenses/index.php">Calculate Average Expenses</a></li>
            <li><a class="nav-link" href="../../../complaint/foody-complaint/user/complaintlistmain.php">Complaint List</a></li>
        </ul>
        <a href="index.php" class="nav-link" style="text-decoration: underline;">
            Logout
             <i class="fa fa-sign-out" aria-hidden="true" style></i>
         </a>
        </nav>
    
        <!-- main content (right side) -->
        <div id="main-content">
            <div class="report">
                <canvas id="chart" class="chart"></canvas>
                <div class="QRCode-section">
                    <div class="QR-background">
                        <div id="QRCode"></div>
                    </div>
                    <h4>Scan QR Code to view on phone in table form.</h4>
                </div>
            </div>

            <?php
                $query="SELECT MONTHNAME(expenses_date) AS month, SUM(expenses_amount) AS sum FROM expensesrecord WHERE user_ID=$user_ID GROUP BY MONTH(expenses_date)" ;
                $result=mysqli_query($conn, $query);
                $num_row=mysqli_num_rows($result);
                $month=array();
                $sum=array();
                for($i=0; $i<$num_row; $i++){
                while($row = mysqli_fetch_array($result, 1)){
                    array_push($month, $row['month']);
                    array_push($sum, $row['sum']);
                }
                }
                $sum_assoc = array_combine($month, $sum);

            ?>
            <a href="./index.php"><button type="button" class="back-button">Back</button></a>
        </div>
    </div>

    <script type="text/javascript">
        var xValues = <?php echo json_encode($month)?>;
        var yValues = <?php echo json_encode($sum)?>;
        var barColors = "#6C5A8A";

        new Chart("chart", {
        type: "bar",
        data: {
            labels: xValues,
            datasets: [{
            backgroundColor: barColors,
            data: yValues,
            }]
        },
        options: {
        legend: {display: false},
        title: {
        display: true,
        text: "Total Expenses of Each Month in year 2022"},
        scales: {
            yAxes: [{
                ticks: {beginAtZero: true}
            }]
            }  
        }
        });

        var qrcode = new QRCode(document.getElementById("QRCode"), {
            text: "<?php foreach($sum_assoc as $month => $sum){echo $month.' : RM '.$sum.'\r\n';}?>",
            width: 128,
            height: 128,
            colorDark : "#6C5A8A",
            colorLight : "#ffffff",
            correctLevel : QRCode.CorrectLevel.H
        });
    </script>
</body>
</html>
