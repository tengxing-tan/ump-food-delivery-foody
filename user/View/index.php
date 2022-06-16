<?php
session_start();
include("../php/connect-database.php");

$_SESSION['user_ID']=1;
if(isset($_SESSION['ERROR_MSG'])){
    echo '<script>alert("'.$_SESSION['ERROR_MSG'].'")</script>';
    $_SESSION['ERROR_MSG']=null;
}
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
    <link rel="stylesheet" href="../styles/user-main.css">

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
            <a class="icon-link" href="./user.php">
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
        <a href="index.php" class="nav-link" style="text-decoration: underline;">
            Logout
             <i class="fa fa-sign-out" aria-hidden="true" style></i>
         </a>
        </nav>
    
        <!-- main content (right side) -->
        <div id="main-content">
            <!--search section-->
            <div id="search-section">
                <form method="POST" action="#">
                    <input type="text" name="search-restaurant" id="search-bar" placeholder="Enter Restaurant Name Here"/>
                    <select id="categorize" class="btn" name="categorize">
                        <option value="none" class="btn" selected disable hidden>Categorized By<i class="fa-solid fa-circle-chevron-down"></i></option>
                        <option value="" class="btn"></option>
                        <option value="1" >Local Restaurant</option>
                        <option value="2" >Western Restaurant</option>
                        <option value="3" >Vegeterian Restaurant</option>
                    </select>
                    <button type="submit" class="btn" id="search-button" name="search">Search</button>
                </form>
            </div>

            <!--Popular Restaurant Section-->
            <br/><br/>
            <h3>Restaurant List</h3>
            <br/>

            <div id="popular-restaurant" class="restaurant-list">

                <?php
                if(isset($_POST['search'])){
                    $restaurantType=(int)$_POST['categorize'];
                    $input=$_POST['search-restaurant'];

                    if($input==''){
                        if($restaurantType>0){
                        $result=mysqli_query($conn, "SELECT * FROM restaurant WHERE restaurantType_ID=$restaurantType");
                            if(mysqli_num_rows($result)==0){
                                echo "<p style='color: var(--primary-bg);'>No result found</p>";
                            }
                            while($row=mysqli_fetch_array($result, 1)){
                ?>

                <div class="restaurant">
                    <a href="./restaurant/index.php?a=<?php echo $row['restaurant_ID']?>"><img src="<?php echo $row['restaurant_image']?>"/><?php echo $row['restaurant_name']?></a>
                </div>

                <?php }}
                        else if($restaurantType==0){
                            $result=mysqli_query($conn, "SELECT * FROM restaurant");
                            if(mysqli_num_rows($result)==0){
                                echo "<p style='color: var(--primary-bg);'>No result found</p>";
                            }
                            while($row=mysqli_fetch_array($result, 1)){
                ?>
                <div class="restaurant">
                    <a href="./restaurant/index.php?a=<?php echo $row['restaurant_ID']?>"><img src="<?php echo $row['restaurant_image']?>"/><?php echo $row['restaurant_name']?></a>
                </div>
                <?php
                        }}} else {
                        $result=mysqli_query($conn, "SELECT * FROM restaurant WHERE restaurantType_ID=$restaurantType OR restaurant_name LIKE '%$input%'");

                        if(mysqli_num_rows($result)>0){
                        while($row=mysqli_fetch_array($result, 1)){
                ?>
                   
                    <div class="restaurant">
                        <a href="./restaurant/index.php?a=<?php echo $row['restaurant_ID']?>"><img src="<?php echo $row['restaurant_image']?>"/><?php echo $row['restaurant_name']?></a>
                    </div>

                <?php }}}} else {?>
               
                <?php
                $result=mysqli_query($conn, "SELECT * FROM restaurant");
                if(mysqli_num_rows($result)==0){
                    echo "<p style='color: var(--primary-bg);'>No result found</p>";
                }
                while($row=mysqli_fetch_array($result, 1)){
                ?>
                    <div class="restaurant">
                        <a href="./restaurant/index.php?a=<?php echo $row['restaurant_ID']?>"><img src="<?php echo $row['restaurant_image']?>"/><?php echo $row['restaurant_name']?></a>
                    </div>
                <?php }} ?>
            </div>
        </div>
    </div>
</body>
</html>
