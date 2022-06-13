<?php
    include_once 'C:\xampp\htdocs\ump-food-delivery-foody\dbconnection.php';
    session_start();

    if(!isset($_SESSION["adminLogin"])){
        header("Location: login.php");
    }else{
        $id = $_GET['viewid'];

        if(isset($_POST['update'])){

            $id = mysqli_real_escape_string($con, $_POST['roID']);
            $name = mysqli_real_escape_string($con, $_POST['roName']);
            $password = mysqli_real_escape_string($con, $_POST['roPassword']);
            $email = mysqli_real_escape_string($con, $_POST['roEmail']);

            $query = "UPDATE restaurantowner SET ro_name = '$name', ro_password = '$password'  WHERE ro_ID = '$id' ";
            $result = mysqli_query($con, $query);

            if($result){
                echo 
                "
                    <script>
                    alert('Update Success');
                    window.location = 'UserList.php';
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
    <title>Update Restaurant Owner Profile</title>

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
            Restaurant Owner
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
            <li><a class="nav-link" href="login.php">Logout</a></li>
        </ul>
        </nav>
    
        <!-- main content (right side) -->
        <div id="main-content">

                <h1>Update Restaurant Owner Profile</h1>

                <?php 
                if(isset($_GET['viewid'])){
                    $id = $_GET['viewid'];

                    $query = "SELECT * FROM restaurantowner WHERE ro_ID = '$id'";
                    $result = mysqli_query($con, $query);

                    if(mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_assoc($result)){

                ?>
                <table>
                <form action="" method="post">
                <tr>
                    <td width="200">
                    <div class= "roProfile">
                        <div class = "inputBox">
                            <span class = "details" >Restaurant Owner ID: </span>
                            </td>
                        <td>
                            <br>
                            <input type = "text" id = "ro_ID" name="roID" value ="<?php echo $row['ro_ID'] ?>" ><br><br>
                        </div>
                        </td>
                      </tr>
                   <tr>
                        <td>

                        <div class = "inputBox">
                            <span class = "details" >Restaurant Owner Name: </span>
                            </td>
                        <td>
                            <br>
                            <input type = "text" id = "ro_name" name="roName" value =" <?php echo $row['ro_name'] ?>" ><br><br>
                            </div>
                            </td>
                            </tr>
                            <tr>
                                <td>
                        <div class="inputBox">
                            <span class= "details">Restaurant Owner Email:</span>
                            </td>
                        <td>
                            <br>
                            <input type = "email" id="ro_email" name= "roEmail" value=" <?php echo $row['ro_email'] ?>" disabled required><br><br>
                        </div>
                        </td>
                            </tr>
                            <tr>
                                <td>
                        <div class = "inputBox">
                            <span class = "details" >Restaurant Owner Password: </span>
                            </td>
                        <td>
                            <br>
                            <input type = "text" id = "ro_password" name="roPassword" value =" <?php echo $row['ro_password'] ?>" ><br><br>
                            </td>
                        </tr>
                        </div>
                    </div> 

                    <?php
                        }
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
</body>
</html>