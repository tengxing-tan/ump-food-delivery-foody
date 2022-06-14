<?php
    include_once 'dbconnection.php';
    session_start();

    if(!isset($_SESSION["adminLogin"])){
        header("Location: ../");
    }else{
        if(isset($_POST['update'])){

            $id = mysqli_real_escape_string($con, $_POST['adminID']);
            $name = mysqli_real_escape_string($con, $_POST['adminName']);
            $password = mysqli_real_escape_string($con, $_POST['adminPassword']);
            $email = mysqli_real_escape_string($con, $_POST['adminEmail']);

            $query = "UPDATE admin SET admin_name = '$name', admin_password = '$password'  WHERE admin_ID = '{$_SESSION["adminLogin"]}' ";
            $result = mysqli_query($con, $query);

            if($result){
                echo 
                "
                    <script>
                    alert('Update Success');
                    window.location = 'AdminProfile.php';
                    </script>
                ";
            }else{
                echo 
                "
                    <script>
                    alert('Update FAILED');
                    </script>
                ";
    
                echo $con->error;
            }
        }
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
            <li><a class="nav-link" href="../complaint/foody-complaint/admin/viewcomplaint.php">Complaint Menu</a></li>
                <li><a class="nav-link" href="../complaint/foody-complaint/admin/report.php">Complaint Report</a></li>
                    </ul>
        <a href="../logout.php" class="nav-link" style="text-decoration: underline;">
            Logout
            <i class="fa fa-sign-out" aria-hidden="true" style></i>
        </a>
        </nav>
    
        <!-- main content (right side) -->
        <div id="main-content">

                <h1>Update Administrator Profile</h1>

                <?php 
                    $query = "SELECT * FROM admin WHERE admin_ID = '{$_SESSION['adminLogin']}'";
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
                            <input type = "text" id = "admin_ID" name="adminID" value ="<?php echo $row['admin_ID'] ?>" ><br><br>
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
                            <input type = "text" id = "admin_name" name="adminName" value ="<?php echo $row['admin_name'] ?>" ><br><br>
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
                            <input type = "email" id="admin_email" name= "adminEmail" value="<?php echo $row['admin_email'] ?>" disabled required><br><br>
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
                            <input type = "text" id = "admin_password" name="adminPassword" value ="<?php echo $row['admin_password'] ?>" ><br><br>
                            </td>
                        </tr>
                        </div>
                    </div> 

                    <?php
                        }
                    }

                ?>
                <tr>
            <td>
                <button type ="submit" name="update" value="update" class= "button">Update</button>
                </td>
                </tr>
                </form>
            

            
                    
                </table>
                
        </div>
    </div>
</body>
</html>
