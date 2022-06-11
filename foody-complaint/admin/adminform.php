<!-- Interface of update data. -->

<?php
include("connecttest.php");



$idURL = $_GET['id'];

$query = "SELECT * FROM complaintlist WHERE complaint_id = '$idURL'";
$result = mysqli_query($conn, $query) or die("Could not execute query in adminform.php");
$row = mysqli_fetch_assoc($result);

$complaint_type = $row['complaint_type'];
$complaint_comment = $row['complaint_comment'];
$complaint_status = $row['complaint_status'];

//@mysql_free_result($result);
?>


<html>

<head>
    <title>Edit comment</title>
    <link rel='stylesheet' href='css/main.css' type='text/css' />
    <script src="https://kit.fontawesome.com/06b2bd9377.js" crossorigin="anonymous"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>

<body>

    <div id="title-bar">
        <!-- foody logo -->
        <a id="foody-link" class="icon-link" href="#index.html">Foody</a>

        <!-- user profile -->
        <div>
            <a class="icon-link" href="#">
                Admin
                <i class="fa-solid fa-user"></i>
            </a>
        </div>
    </div>

    <div id="content-wrapper">
        <!-- navigation bar (left side) -->
        <nav id="nav-bar">
            <ul>
                <li><a class="nav-link" href="#">Order History</a></li>
                <li><a class="nav-link" href="#">Expenses List</a></li>
                <li><a class="nav-link" href="#">Calculate Average Expenses</a></li>
                <li><a class="nav-link active" href="viewcomplaint.php">Complaint List</a></li>
            </ul>
        </nav>

        <div id='main-content'>
            <form method="post" action="manage.php">


                <label for="complaint_status" class="required">Complaint Status: </label>
                <select name="complaint_status" id="complaint_status" required="required"
                    value="<?php echo $complaint_status; ?>">
                    <option> In investigation </option>
                    <option> Resolved </option>

                </select>
                <br><br>

                <label for="complaint_type" class="required">Complaint Type: </label>
                <select name="complaint_type" id="complaint_type" required="required"
                    value="<?php echo $complaint_type; ?>">
                    <option> Late Delivery </option>
                    <option> Damaged Food </option>
                    <option> Wrong Order </option>
                    <option> Driver Attitude </option>
                </select>
                <br><br>

                Comment Description:
                <textarea name="complaint_comment" cols="30"><?php echo $complaint_comment; ?></textarea>
                <br>

                <input type="hidden" name="id" value="<?php echo $idURL; ?>">
                <button class='btn' type='submit' name='update'>Update</button>



                <br>
            </form>
        </div>
    </div>

</body>

</html>