<?php
include("connecttest.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foody | UMP Food Delivery System</title>

    <!-- external stylesheet -->
    <link rel="stylesheet" href="css/main.css">

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
        <a id="foody-link" class="icon-link" href="../index.html">Foody</a>

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
                <li><a class="nav-link" href="#">Home</a></li>
                <li><a class="nav-link" href="viewcomplaint.php">Complaint Menu</a></li>
                <li><a class="nav-link active" href="report.php">Complaint Report</a></li>
            </ul>
        </nav>

        <!-- main content (right side) -->
        <div id="main-content">
            <div class="report">
                <canvas id="chart" class="chart"></canvas>
                <div class="QRCode-section">
                    <div class="QR-background">
                        <div id="QRCode"></div>
                    </div>
                    <h4 style='text-align:center;'><br>Scan QR Code To View The Report.</h4>
                </div>
            </div>

        </div>
    </div>

    <script type="text/javascript">
    var qrcode = new QRCode(document.getElementById("QRCode"), {
        text: "http://localhost/web_test/report.php",
        width: 128,
        height: 128,
        colorDark: "#6C5A8A",
        colorLight: "#ffffff",
        correctLevel: QRCode.CorrectLevel.H
    });
    </script>
</body>

</html>