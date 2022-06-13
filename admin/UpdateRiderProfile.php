<?php
    include_once 'dbconnection.php';
    session_start();

    if(!isset($_SESSION["adminLogin"])){
        header("Location: login.php");
    }else{
        $id = $_GET['viewid'];

        if(isset($_POST['update'])){

            $id = mysqli_real_escape_string($con, $_POST['riderID']);
            $name = mysqli_real_escape_string($con, $_POST['riderName']);
            $password = mysqli_real_escape_string($con, $_POST['riderPassword']);
            $email = mysqli_real_escape_string($con, $_POST['riderEmail']);

            $query = "UPDATE rider SET rider_name = '$name', rider_password = '$password'  WHERE rider_ID = '$id' ";
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
    <title>Update Rider Profile</title>

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

                <h1>Update Rider Profile</h1>

                <?php 
                if(isset($_GET['viewid'])){
                    $id = $_GET['viewid'];

                    $query = "SELECT * FROM rider WHERE rider_ID = '$id'";
                    $result = mysqli_query($con, $query);

                    if(mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_assoc($result)){

                ?>
                <table>
                <form action="" method="post">
                <tr>
                    <td width="200">
                    <div class= "userProfile">
                        <div class = "inputBox">
                            <span class = "details" >Rider ID: </span>
                            </td>
                        <td>
                            <br>
                            <input type = "text" id = "rider_ID" name="riderID" value ="<?php echo $row['rider_ID'] ?>" ><br><br>
                        </div>
                        </td>
                      </tr>
                   <tr>
                        <td>

                        <div class = "inputBox">
                            <span class = "details" >Rider Name: </span>
                            </td>
                        <td>
                            <br>
                            <input type = "text" id = "rider_name" name="riderName" value =" <?php echo $row['rider_name'] ?>" ><br><br>
                            </div>
                            </td>
                            </tr>
                            <tr>
                                <td>
                        <div class="inputBox">
                            <span class= "details">Rider Email:</span>
                            </td>
                        <td>
                            <br>
                            <input type = "email" id="rider_email" name= "riderEmail" value=" <?php echo $row['rider_email'] ?>" disabled required><br><br>
                        </div>
                        </td>
                            </tr>
                            <tr>
                                <td>
                        <div class = "inputBox">
                            <span class = "details" >Rider Password: </span>
                            </td>
                        <td>
                            <br>
                            <input type = "text" id = "rider_password" name="riderPassword" value =" <?php echo $row['rider_password'] ?>" ><br><br>
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