<?php
include("../connecttest.php");
//track which user do complaint
session_start();


if(isset($_GET['a'])){
    $idURL = $_GET['a'];
}else{
    if(isset($_SESSION['user_ID'])){
        $idURL = $_SESSION['user_ID'];
    }
}
$query = "SELECT * FROM complaintlist WHERE order_id = '$idURL'";
$result = mysqli_query($conn, $query) or die("Could not execute query in adminform.php");

?>

<!DOCTYPE html>
<html lang="en-US">

<head>
    <title>Create new complaint</title>
    <meta charset="utf-8" />

    <link rel='stylesheet' href='../../css/userform.css'>
    <link rel='stylesheet' href='../../css/main.css' type='text/css' />
    <link rel='stylesheet' href='../../css/upload.css' type='text/css' />
    <script src="https://kit.fontawesome.com/06b2bd9377.js" crossorigin="anonymous"></script>
    <script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
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
        </nav>

        <div id="main-content">

            <h3>Create A New Complaint</h3>
            <br><br>
            <form action="insertdata.php?a=<?php echo $idURL ?>" method="post" id="complaintform">


                <label for="complaint_name" class="required">Name:</label>
                <input type="text" name="complaint_name" id="complaint_name" value="" tabindex="1" required="required">
                <br><br>

                <label for="complaint_date" class="required">Complaint Date:</label>
                <input type="date" name="complaint_date" id="complaint_date" value="" tabindex="2" required="required">
                <br><br>

                <label for="complaint_time" class="required">Complaint Time:</label>
                <input type="time" name="complaint_time" id="complaint_time" value="" tabindex="2" required="required">
                <br><br>


                <label for="complaint_type" class="required">Complaint Type: </label>
                <select name="complaint_type" id="complaint_type" required="required">
                    <option> Late Delivery </option>
                    <option> Damaged Food </option>
                    <option> Wrong Order </option>
                    <option> Driver Attitude </option>
                </select>
                <br><br>


                <label for="complaint_comment" class="required">Complaint Description: </label>
                <textarea name="complaint_comment" id="complaint_comment" rows="10" tabindex="4"
                    required="required"></textarea><br>

                <label for="complaint_upload">Upload The Photo Here:</label>
                <div class="body-container">
                    <div id="uploads"></div>
                    <div class="dropzone" id="dropzone">
                        Drop files here to upload
                    </div>
                </div>
                <script src="upload.js" type="text/javascript"></script>


                <br><br>

                <input type="hidden" name="id" value="<?php echo $idURL; ?>">

                <button class='btn' type='submit' name='submit' style="margin-left: 60vw;">Submit</button>


            </form>

        </div>
    </div>
</body>

</html>