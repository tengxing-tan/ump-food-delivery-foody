<?php
session_start();
include("../connecttest.php");

$user_ID=$_SESSION['user_ID'];

$query = "SELECT * FROM complaintlist WHERE order_ID in (SELECT order_ID FROM `order` WHERE user_ID = '$user_ID')";
$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html lang='en-US'>

<head>
    <title>Complaint List Main</title>
    <meta charset='utf-8' />

    <link rel='stylesheet' href='../../css/complaintlistmain.css'>
    <link rel='stylesheet' href='../../css/main.css' type='text/css' />
    <script src="https://kit.fontawesome.com/06b2bd9377.js" crossorigin="anonymous"></script>
</head>

<body>

    <div id="title-bar">
        <!-- foody logo -->
        <a id="foody-link" class="icon-link" href="#index.html">Foody</a>

        <!-- user profile -->
        <div>
            <a class="icon-link" href="../../../user/View/restaurant/order-list.php">
                Order List
                <i class="fa-solid fa-cart-shopping"></i>
            </a>
            <a class="icon-link" href="../../../user/View/user.php">
                User
                <i class="fa-solid fa-user"></i>
            </a>
        </div>
    </div>


    <div id="content-wrapper">
        <!-- navigation bar (left side) -->
        <nav id="nav-bar">
            <ul>
                <li><a class="nav-link" href="../../../user/View/index.php">Home</a></li>
                <li><a class="nav-link" href="../../../user/View/expenses-list/index.php">Expenses List</a></li>
                <li><a class="nav-link" href="../../../user/View/calculate-average-expenses/index.php">Calculate Average
                        Expenses</a></li>
                <li><a class="nav-link active" href="complaintlistmain.php">Complaint List</a></li>
            </ul>
            <a href="../../../logout.php" class="nav-link" style="text-decoration: underline;">
            Logout
             <i class="fa fa-sign-out" aria-hidden="true" style></i>
            </a>
        </nav>

        <div id='main-content'>
            <form class='form' action='searchtype.php' method="post">

                <button class='btn' type='submit' name='search' style='margin-right: 2rem;'>Search</button>
                <input id='search-bar' name='search' type='search' placeholder='Search for Complaint Type'>


            </form>


            <div class='row'>
                <div class='column'>
                    <?php if (mysqli_num_rows($result) > 0) {
                        // output data of each row
                        while ($row = mysqli_fetch_assoc($result)) {
                            $complaint_name = $row["complaint_name"];
                            $complaint_date = $row["complaint_date"];
                            $complaint_time = $row["complaint_time"];
                            $complaint_type = $row["complaint_type"];
                            $complaint_comment = $row["complaint_comment"];
                    ?>
                    <?php echo "$complaint_date || $complaint_time"; ?><br>
                    <?php echo $complaint_type; ?><br>
                    <?php echo $complaint_comment; ?><br>
                    <br><br>
                    <?php
                        }
                    } else {
                        echo "";
                    }
                    ?>
                </div>
            </div>

        </div>


</body>
<html>