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
    <link rel="stylesheet" href="../../styles/calculate-average-expenses/index.css">
    <!-- icon library | font awesome -->
    <script src="https://kit.fontawesome.com/06b2bd9377.js" crossorigin="anonymous"></script>
    <script src="./js/main.js"></script>
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
        <a href="../../../logout.php" class="nav-link" style="text-decoration: underline;">
            Logout
             <i class="fa fa-sign-out" aria-hidden="true" style></i>
         </a>
        </nav>
    
        <!-- main content (right side) -->
        <div id="main-content">

            <div class="button-section">
                <div class="calculate-button">
                <form method="POST" action="../../php/calculate-average-expenses/set-date.php">
                    <select name="month" class="month-selection">
                        <option value="select-month">SELECT MONTH</option>
                        <option value="Jan" class="option">January</option>
                        <option value="Feb" class="option">February</option>
                        <option value="March" class="option">March</option>
                        <option value="Apr" class="option">April</option>
                        <option value="May" class="option">May</option>
                        <option value="June" class="option">June</option>
                        <option value="July" class="option">July</option>
                        <option value="Aug" class="option">August</option>
                        <option value="Sep" class="option">September</option>
                        <option value="Oct" class="option">October</option>
                        <option value="Nov" class="option">November</option>
                        <option value="Dec" class="option">December</option>
                    </select>
                    <select name="week" class="week-selection">
                        <option value="select-week">SELECT WEEK</option>
                        <option value="Week 1" class="option">Week 1</option>
                        <option value="Week 2" class="option">Week 2</option>
                        <option value="Week 3" class="option">Week 3</option>
                        <option value="Week 4" class="option">Week 4</option>
                        <option value="Week 5" class="option">Week 5</option>
                    </select>
                    <button type="submit" name="calculate">Calculate</button>
                    </form>
                </div>
                    <a href="./report.php"><button class="generate-report">Total Expenses Of Each Month</button></a>
            </div>


            <div class="output">
                <div class="header">
                    <h4 class="title">Title</h4>
                    <h4 class="date">Date</h4>
                    <h4 class="amount">Expenses Amount</h4>
                </div>

                <br/>
                <hr/>
                <br/>
                <div class="content">

            <?php
            if(isset($_SESSION['start-date']) && isset($_SESSION['end-date'])){
            $startDate=$_SESSION['start-date'];
            $endDate=$_SESSION['end-date'];

            $query="SELECT expenses_title, expenses_date, expenses_amount FROM expensesrecord WHERE user_ID=$user_ID AND expenses_date BETWEEN '$startDate' AND '$endDate' ";
            $result=mysqli_query($conn, $query);

            while($row=mysqli_fetch_array($result, 1)){
            ?>
                    <div class="row">
                        <p class="title"><?php echo $row['expenses_title'] ?></p>
                        <p class="date"><?php echo $row['expenses_date'] ?></p>
                        <p class="amount"><?php echo number_format((float)$row['expenses_amount'], 2, '.', '') ?></p>
                    </div>
            <?php }} ?>
                </div>

                <hr/>

                <div class="average-expenses">
                    <h4>Average Expenses</h4>

            <?php
            if(isset($_SESSION['start-date']) && isset($_SESSION['end-date'])){
            $result=mysqli_query($conn, "SELECT AVG(expenses_amount) AS average FROM expensesrecord WHERE user_ID=$user_ID AND expenses_date BETWEEN '$startDate' AND '$endDate'");
            $row=mysqli_fetch_array($result);
            ?>

                    <h4>RM <?php echo number_format((float)$row['average'], 2, '.', '')?></h4>
                </div>
            </div>

            <?php }?>
        </div>
    </div>
</body>
</html>
