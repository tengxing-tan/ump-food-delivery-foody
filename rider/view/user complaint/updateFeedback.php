<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foody | UMP Food Delivery System</title>

    <!-- external stylesheet -->
    <link rel="stylesheet" href="../../styles/main.css">
    <link rel="stylesheet" href="../../styles/addedFeedback.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="../../function/feedback.js" defer></script>
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
            <a href="../../../logout.php" class="nav-link" style="text-decoration: underline;">
                Logout
                <i class="fa fa-sign-out" aria-hidden="true" style></i>
            </a>
        </nav>
    
        <!-- main content (right side) -->
        <div id="main-content">
        
            <div id="topDetail">
                 <a href="complaint.php"><i class="fa" id="arrowB">&#xf177;</i></a>
            </div>
             <!--Update Feedback Form-->
           <div class="container" id="container">
           <?php
           session_start();
                include '../connectDB.php';
                $i = $_GET['i'];
                $_SESSION["complaint"] = $i;
                $sql = "SELECT feedback_info FROM feedback WHERE complaint_ID = '$i'";
                $result = mysqli_query($link, $sql);
                $row = mysqli_fetch_assoc($result);
                
            ?>
    
               <form id="feedbackF" action="updatedFeedback.php" method="get">
                   
                       <div id="topic">
                           <h3>Update Your Feedback Here!</h3>
                       </div>
                       
                        <textarea id="feedbackText" name="feedbackText" rows="10" cols="50"><?php echo $row["feedback_info"] ?></textarea>
                        <div>
                            <input type="submit" value="Update" id="Btn">
                        </div>
                       
                   </form>
               </div>
        </div>
        </div>
    </div>
</body>
</html>
