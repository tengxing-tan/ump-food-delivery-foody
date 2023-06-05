<!DOCTYPE html>
<html lang="en-US">

<head>
    <title>Complaint Search and Filter Result for Admin</title>
    <meta charset="utf-8" />

    <link rel="stylesheet" href="../../css/viewcomplaint.css" type="text/css">
    <link rel="stylesheet" href="../../css/main.css" type="text/css" />
    <script src="https://kit.fontawesome.com/06b2bd9377.js" crossorigin="anonymous"></script>

    <style>
    table, th, td {
        border: 2px solid black;
        border-collapse: collapse;
        padding: 10px 10px;
    }

    th {
        background-color: pink;
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
    <!-- Display Complaint Filter Result -->
    <h2>Complaint Filter Result</h2> <br><br>

    <?php
        include("../connecttest.php");
        if(isset($_POST['searchComplaint']))
        {
            $printStart=$_POST['start'];
            $printEnd=$_POST['end'];

            extract($_POST);

            $sql = "SELECT * FROM complaintlist WHERE (complaint_date BETWEEN '$printStart' AND '$printEnd') AND complaint_type='$complaintType'AND complaint_status='$complaintStatus' ";

            $result = mysqli_query($conn,$sql) or die(mysqli_error());

            echo "<table>";
                echo "<tr>" . "<th>ComplaintID</th>" . "<th>order_ID</th>" . "<th>ComplaintType</th>" . "<th>Description</th>" . "<th>Date</th>". "<th>Time</th>". "<th>Status</th>"."<th></th>". "</tr>";
                if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)){

                        $idURL = $row["complaint_id"];
                        $length = 5;
                        $string = substr(str_repeat(0, $length).$idURL,-$length);
                        
                        echo "<tr><td>". 
                        "CP". $string . "</td><td>" .  
                        $row['order_id'] . "</td><td>" . 
                        $row['complaint_type'] . "</td><td>" .
                        $row['complaint_comment'] . "</td><td>" .
                        $row['complaint_date'] . "</td><td>" .
                        $row['complaint_time'] . "</td><td>" .
                        $row['complaint_status'] . "</td><td>" .
                        "<a href='adminform.php?id=$idURL'>" .
                        '<button style="font-family:Courier New;margin-left:10%;font-weight: bold; "type="submit" name="updateComplaint">UPDATE</button>' .
                        '</a>' .
                        "<a href='delete.php?id=$idURL'>" .
                        '<button style="font-family:Courier New;margin-left:10%;font-weight: bold; "type="submit" name="deleteComplaint">DELETE</button>' .
                        '</a>'.
                        "</td></tr>";
                    }
                }
                else {
                    echo "No result found.";
                }
                echo "</table>";
        }
    ?> 

    <br><br>
    <div class="otherButton" style="display:flex;align-items:center">
        
        <a href="viewcomplaint.php">
        <button style="font-family:Courier New;font-weight: bold; "type="submit" name="backToSearch">BACK</button>
        </a>
    </div>

</div>




</body>

</html>