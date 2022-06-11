<?php
include("connecttest.php");


$query = "SELECT * FROM complaintlist";
$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html lang="en-US">

<head>
    <title>View Complaint for Admin</title>
    <meta charset="utf-8" />

    <link rel="stylesheet" href="css/viewcomplaint.css" type="text/css">
    <link rel="stylesheet" href="css/main.css" type="text/css" />
    <script src="https://kit.fontawesome.com/06b2bd9377.js" crossorigin="anonymous"></script>
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
                <li><a class="nav-link" href="#">Home</a></li>
                <li><a class="nav-link active" href="#">Complaint Menu</a></li>
                <li><a class="nav-link" href="qrcode.php">Complaint Report</a></li>
            </ul>
        </nav>


        <!--main content-->
        <div id="main-content">
            <h2>List For Complaint Cases</h2> <br><br>
            <!--output-->
            <div class='row'>
                <div class='column'>
                    <?php if (mysqli_num_rows($result) > 0) {
                        // output data of each row
                        while ($row = mysqli_fetch_assoc($result)) {
                            $complaint_id = $row["complaint_id"];
                            $complaint_name = $row["complaint_name"];
                            $complaint_date = $row["complaint_date"];
                            $complaint_time = $row["complaint_time"];
                            $complaint_type = $row["complaint_type"];
                            $complaint_comment = $row["complaint_comment"];
                            $complaint_status = $row["complaint_status"];
                    ?>


                    <?php echo "$complaint_date || $complaint_time"; ?><br>
                    <?php echo $complaint_type; ?><br>
                    <?php echo $complaint_comment; ?>
                    <button class="otherbtn" name="complaint_status"
                        value="$complaint_status"><?php echo $complaint_status; ?></button><br>
                    <br>
                    <a href="adminform.php?id=<?php echo $complaint_id; ?>"><button class="btn"
                            name="update">Update</button></a>
                    <a href="delete.php?id=<?php echo $complaint_id; ?>"><button class="btn"
                            name="delete">Delete</button></a>
                    <br><br><br>


                    <?php
                        }
                    } else {
                        echo "";
                    }
                    ?>
                </div>
                <!--column-->
            </div>
            <!--row-->

        </div>
    </div>

</body>

</html>