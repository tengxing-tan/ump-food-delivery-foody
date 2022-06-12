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
    <link rel="stylesheet" href="../../styles/qrcode.css">
    <!-- icon library | font awesome -->
    <script src="https://kit.fontawesome.com/06b2bd9377.js" crossorigin="anonymous"></script>
    <script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>
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
            <li><a class="nav-link" href="../report/report.php">Report</a></li>
        </ul>
            <a href="../../../logout.php" class="nav-link" style="text-decoration: underline;">
                Logout
                <i class="fa fa-sign-out" aria-hidden="true" style></i>
            </a>
        </nav>
    
        <!-- main content (right side) -->
        <div id="main-content">
        <a href="onlinePage.php"><i class="fa" id="arrowB">&#xf177;</i></a>
            <div id="qrcode">
               <!-- <i class="fa fa-qrcode" aria-hidden="true"></i> -->
               
            </div>
            <div><p>QR code for customer to confirm received the order</p></div>
            <div id="orderReceived"><button onclick="window.location.href='complete.php'">Complete</button></div>
        </div>
        </div>
    </div>
</body>
            <script>
                    var qrcode = new QRCode(document.getElementById("qrcode"), {
            text: "http://localhost:3000/Mini%20Project/Code/Rider/view/home/complete.php",
            width: 350,
            height: 350,
            colorDark : "#6C5A8A",
            colorLight : "#ffffff",
            correctLevel : QRCode.CorrectLevel.H
        });
               </script>
</html>
