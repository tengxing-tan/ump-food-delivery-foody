<?php
session_start();
include ('../../php/connect-database.php');
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
    <link rel="stylesheet" href="../../styles/expenses-list/index.css">
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
            <li><a class="nav-link active" href="../expenses-list/index.php">Expenses List</a></li>
            <li><a class="nav-link" href="../calculate-average-expenses/index.php">Calculate Average Expenses</a></li>
            <li><a class="nav-link" href="../../../complaint/foody-complaint/user/complaintlistmain.php">Complaint List</a></li>
        </ul>
        <a href="../../../logout.php" class="nav-link" style="text-decoration: underline;">
            Logout
             <i class="fa fa-sign-out" aria-hidden="true" style></i>
         </a>
        </nav>
    
        <!-- main content (right side) -->
        <div id="main-content">

            <?php
            if(isset($_SESSION['result'])){
            echo "<p id='hide'>". $_SESSION['result']."<p/>"; 
            $_SESSION['result']=null;
            }
            ?>

            <form method="POST">
                <div id="search-section">
                    <input type="text" name="search-expenses" id="search-bar" placeholder="Enter expenses title, ex:dinner"/>
                    <button type="submit" class="btn" name="search">Search</button>
                </div>
            </form>

            <?php


            if(isset($_POST['search'])){
                $input=$_POST['search-expenses'];
                $search_result=mysqli_query($conn, "SELECT * FROM expensesrecord WHERE user_ID='$user_ID' AND expenses_title LIKE '%$input%' OR expenses_date LIKE '%$input%'");

                if(mysqli_num_rows($search_result)==0){
                    echo "<p style='color: var(--primary-bg);'>No result found</p>";
                }
                else{
                    while($row = mysqli_fetch_array($search_result, 1)){
            ?>
                        <div class="detail">
                        <div class="title-and-date">
                            <h4><?php echo $row['expenses_title']?></h4>
                            <p><?php echo $row['expenses_date']?></p>
                        </div>
                        <div class="order-list">
                            <p><?php echo $row['expenses_description']?></p>
                        </div>
                        <div class="total-price">
                            <p><?php echo "RM ".$row['expenses_amount']?></p>
                        </div>
                        <div class="buttons-section">
                            <a href="../../php/expenses-list/delete.php?a=<?php echo $row['expenses_ID']?>"><button type="button" class="delete-button">Delete</button></a>
                            <a href="../../php/expenses-list/update.php?a=<?php echo $row['expenses_ID']?>"><button type="button" class="update-button">Update</button></a>
                        </div>
                    </div>

            <?php
                    }}}
                    else{
            ?>
                <?php
                $result=mysqli_query($conn, "SELECT * FROM expensesrecord WHERE user_ID=$user_ID");

                if(mysqli_num_rows($result)>0){
                    while($row = mysqli_fetch_array($result, 1)){
                ?>
                            <div class="detail">
                                <div class="title-and-date">
                                    <h4><?php echo $row['expenses_title']?></h4>
                                    <p><?php echo $row['expenses_date']?></p>
                                </div>
                                <div class="order-list">
                                    <p><?php echo $row['expenses_description']?></p>
                                </div>
                                <div class="total-price">
                                    <p><?php echo "RM ".$row['expenses_amount']?></p>
                                </div>
                                <div class="buttons-section">
                                    <a href="../../php/expenses-list/delete.php?a=<?php echo $row['expenses_ID']?>"><button type="button" class="delete-button">Delete</button></a>
                                    <a href="../../php/expenses-list/update.php?a=<?php echo $row['expenses_ID']?>"><button type="button" class="update-button">Update</button></a>
                                </div>
                            </div>
                <?php
                    }
                }
                else{
                    echo "<i class='fa-solid fa-folder-open' style='color:var(--primary-bg); text-align:center; font-size: 80px; width: 100%;'></i>";
                    echo "<p style='color: var(--primary-bg);text-align: center;'>Currently expenses record is empty, add new record by pressing 'Add Expenses' button.</p>";
                }
            }
                ?>

                <a href="add-expenses.php"><button type="button" id="add-expenses-button">Add Expenses</button></a>
        </div>
    </div>
</body>
</html>
