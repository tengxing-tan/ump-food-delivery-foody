<?php
include("../connecttest.php");


$query = "SELECT * FROM complaintlist";
$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html lang="en-US">

<head>
    <title>View Complaint for Admin</title>
    <meta charset="utf-8" />

    <link rel="stylesheet" href="../../css/viewcomplaint.css" type="text/css">
    <link rel="stylesheet" href="../../css/main.css" type="text/css" />
    <script src="https://kit.fontawesome.com/06b2bd9377.js" crossorigin="anonymous"></script>

    <style>
        table {
        margin-left: auto;
        margin-right: auto;
        }
    </style>
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
                <li><a class="nav-link" href="../../../admin/AdminHomepage.php">Dashboard</a></li>
                <li><a class="nav-link" href="../../../admin/AdminProfile.php">Admin Profile</a></li>
                <li><a class="nav-link" href="../../../admin/UserList.php">User List</a></li>
                <li><a class="nav-link" href="../../../admin/UserReport.php">User Report</a></li>
                <li><a class="nav-link active" href="viewcomplaint.php">Complaint Menu</a></li>
                <li><a class="nav-link" href="report.php">Complaint Report</a></li>
            </ul>
            <a href="../../../logout.php" class="nav-link" style="text-decoration: underline;">
                Logout
                <i class="fa fa-sign-out" aria-hidden="true" style></i>
            </a>
        </nav>

        

        <!--main content-->
        <div id="main-content">
            <h2>List For Complaint Cases</h2> <br><br>

            <!--POST method form with several filter complaint options-->
            <form action="viewcomplaintafterfiltering.php" method="post">
            <br>
            <div class="searchComplaint" style="background-color:pink;width:100%;">
            <br><p style="font-family:Arial;color:black;text-align:center;font-size:110%;"><b>SEARCH COMPLAINT</b></p><br>
            <table>
            <tr>
                <td>SEARCH FROM : <input type="date" name="start" style="width:auto;font-family:Arial;"></td>
                <td>TO : <input type="date" name="end"></td>
                <td><select required name = "complaintType" style="font-family:Arial;width:auto;">
                    <option selected disabled value="">COMPLAINT TYPE</option>
                    <option>Late Delivery</option>
                    <option>Damaged Food</option>
                    <option>Driver Attitude</option>
                    <option>Wrong Order</option>
                    </select>
                </td>
                <td><select required name = "complaintStatus" style="font-family:Arial;width:auto;">
                    <option selected disabled value="">COMPLAINT STATUS</option>
                    <option>IN INVESTIGATION</option>
                    <option>RESOLVED</option>
                    </select>
                </td>
                <td><input style="font-family:Arial;width:auto;font-weight: bold; "type="submit" value="SEARCH" name="searchComplaint"></td>
            </tr>
            </table>
            <br>
            </div>
            </form>
            <br><br>

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
                            <button class="otherbtn" name="complaint_status" value="$complaint_status"><?php echo $complaint_status; ?></button><br>
                            <br>
                            <a href="adminform.php?id=<?php echo $complaint_id; ?>"><button class="btn" name="update">Update</button></a>
                            <a href="delete.php?id=<?php echo $complaint_id; ?>"><button class="btn" name="delete">Delete</button></a>
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