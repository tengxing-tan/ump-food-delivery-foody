<?php
    include_once 'dbconnection.php';
    session_start();

    if(!isset($_SESSION["adminLogin"])){
        header("Location: ../");
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
    <link rel="stylesheet" href="style/main.css">
    <!-- icon library | font awesome -->
    <script src="https://kit.fontawesome.com/06b2bd9377.js" crossorigin="anonymous"></script>
</head>
<body>
    <!-- title bar -->
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

    <!-- content -->
    <div id="content-wrapper">
        <!-- navigation bar (left side) -->
        <nav id="nav-bar">
        <ul>
            <li><a class="nav-link" href="AdminHomepage.php">Dashboard</a></li>
            <li><a class="nav-link" href="AdminProfile.php">Admin Profile</a></li>
            <li><a class="nav-link" href="UserList.php">User List</a></li>
            <li><a class="nav-link" href="UserReport.php">User Report</a></li>
            <li><a class="nav-link" href="ComplaintReport.php">Complaint Report</a></li>
            <li><a class="nav-link" href="../">Logout</a></li>
        </ul>
        </nav>
    
        <!-- main content (right side) -->
        <div id="main-content">

                <h1> Administrator Profile</h1>

                <?php 
                    $query = "SELECT * FROM admin WHERE admin_ID= '{$_SESSION['adminLogin']}'";
                    $result = mysqli_query($con, $query);

                    if(mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_assoc($result)){

                ?>
                <table>
                <form action="" method="post">
               
                <tr>
                    <td width="200">
                    <div class= "adminProfile">
                        <div class = "inputBox">
                            <span class = "details" >Admin ID: </span>
                        </td>
                        <td>
                            <br>
                            <input type = "text" id = "admin_ID" name="adminID" value ="<?php echo $row['admin_ID'] ?>" disabled required><br><br>
                        </div>
                        </td>
                </tr>
                <tr>
                        <td>
                        <div class = "inputBox">
                            <span class = "details" >Admin Name: </span>
                        </td>
                        <td>
                            <br>
                            <input type = "text" id = "admin_name" name="adminName" value =" <?php echo $row['admin_name'] ?>" disabled required><br><br>
                        </div>
                        </td>
                            </tr>
                            <tr>
                                <td>
                        <div class="inputBox">
                            <span class= "details">Admin Email:</span>
                            </td>
                        <td>
                            <br>
                            <input type = "email" id="admin_email" name= "adminEmail" value=" <?php echo $row['admin_email'] ?>" disabled required><br><br>
                        </div>
                        </td>
                            </tr>
                            <tr>
                                <td>
                        <div class = "inputBox">
                            <span class = "details" >Admin Password: </span>
                            </td>
                        <td>
                            <br>
                            <input type = "text" id = "admin_password" name="adminPassword" value =" <?php echo $row['admin_password'] ?>" disabled required><br><br>
                            </td>
                        </tr>
                        </div>
                    </div> 

                    <?php
                        }
                    }

                ?>
            </form>
            <tr>
            <td>
            <a href="UpdateAdminProfile.php"><button type ="submit" class= "button">Edit</button></a>
            </td>
                </tr>
                </table>
        </div>
    </div>
</body>
</html>
