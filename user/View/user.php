<?php
session_start();
include("../php/connect-database.php");
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
    <link rel="stylesheet" href="../styles/main.css">
    <link rel="stylesheet" href="../styles/user.css">

    <!-- icon library | font awesome -->
    <script src="https://kit.fontawesome.com/06b2bd9377.js" crossorigin="anonymous"></script>

    <!--Javacript-->
    <script src="./js/main.js"></script>
</head>
<body>
    <!-- title bar -->
    <div id="title-bar">
        <!-- foody logo -->
        <a id="foody-link" class="icon-link" href="./index.php">Foody</a>

        <!-- user profile -->
        <div>
            <a class="icon-link" href="../View/restaurant/order-list.php">
                Order List
                <i class="fa-solid fa-cart-shopping"></i>
            </a>
            <a class="icon-link" href="#">
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
            <li><a class="nav-link active" href="./index.php">Home</a></li>
            <li><a class="nav-link" href="./expenses-list/index.php">Expenses List</a></li>
            <li><a class="nav-link" href="./calculate-average-expenses/index.php">Calculate Average Expenses</a></li>
            <li><a class="nav-link" href="../../complaint/foody-complaint/user/complaintlistmain.php">Complaint List</a></li>
        </ul>
        <a href="../../logout.php" class="nav-link" style="text-decoration: underline;">
            Logout
             <i class="fa fa-sign-out" aria-hidden="true" style></i>
         </a>
        </nav>
    
        <!-- main content (right side) -->
        <div id="main-content">
        <div id="userInfo">
            <h3>User Profile</h3>
            <ul>
            <?php
            $result=mysqli_query($conn, "SELECT * FROM user WHERE user_ID=$user_ID");

            //display user information
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_array($result, 1)) 
                {
            ?>
            <table>
                <tr>
                    <th>
                        Name
                    </th>
                    <td>
                        <p><?php echo $row['user_name']; ?></p>
                    </td>
                </tr>
                <tr>
                    <th>
                        Email Adress
                    </th>
                    <td>
                        <p><?php echo $row['user_email']; ?></p>
                    </td>
                </tr>
                <tr>
                    <th>
                        Phone Number
                    </th>
                    <td>
                        <p><?php echo $row['user_phoneNum']; ?></p>
                    </td>
                </tr>
                <tr>
                    <th>
                        Adress
                    </th>
                    <td>
                        <p><?php echo $row['user_address']; ?></p>
                    </td>
                </tr>
            </table>

            <?php }} ?>
        </div>
        </div>
    </div>
</body>
</html>
