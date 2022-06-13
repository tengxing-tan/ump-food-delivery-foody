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
    <link rel="stylesheet" href="../../styles/viewFeedback.css">
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
    <div id='main-content'>
        <?php 
            session_start();
            $id = $_SESSION["complaint"];
            include '../connectDB.php';
            
            $feedbackText = $_GET["feedbackText"];
            
           //validate when rider add feedback (rider cannot add empty feedback)

            if ($feedbackText == "") {  
               
            echo " <div class='container' id='container'>
                        <form id='feedbackF' action='complaint.php' method='get'>
                            <div id='topic'>
                                <h3>Error! You have to give some feedback!</h3>
                                <p></p>
                                    <input type='submit' value='Back' id='Btn'>
                                </div>
                            
                        </form>
                    </div> ";
            } 
            //validate when rider add feedback (rider cannot eimply type number to add feedback)
            else if (preg_match ("/^[0-9]*$/", $feedbackText)) {  
               
                echo " <div class='container' id='container'>
                            <form id='feedbackF' action='complaint.php' method='get'>
                                <div id='topic'>
                                    <h3>Error! You enter wrong format! It is not a text!</h3>
                                    <p></p>
                                        <input type='submit' value='Back' id='Btn'>
                                    </div>
                                
                            </form>
                        </div> ";
                }
                else {  
      
                $sql = "INSERT INTO `feedback`(`feedback_ID`, `complaint_ID`, `feedback_info`) VALUES (NULL ,'$id', '$feedbackText')";
                $status = "UPDATE complaintlist SET complaint_status = 'Resolved' WHERE complaint_ID = '$id'";
                mysqli_query($link, $sql);
                mysqli_query($link, $status);
            echo"  
                
                
                <div class='container' id='container'>
                        <form id='feedbackF' action='complaint.php' method='post'>
                            <div id='topic'>
                                <h3>Feedback Added!</h3>
                                <p></p>
                                    <input type='submit' value='Back' id='Btn'>
                                </div>
                            
                        </form>
                    </div>
                </div>";
            }  
            mysqli_close($link);
            //$sql = "INSERT INTO feedback (user_ID, feedback_info) VALUES ('4', '$feedbackText')";

        
        ?>
        
        </div>
    </div>
</body>
</html>
