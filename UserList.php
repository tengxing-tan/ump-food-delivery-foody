<?php
    include_once 'C:\xampp\htdocs\ump-food-delivery-foody\dbconnection.php';
    session_start();

    if(isset($_POST["Add User"])){
        header ("Location: AddUser.php");
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
    <link rel="stylesheet" href="style/styles.css">
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
            <li><a class="nav-link" href="login.php">Logout</a></li>
        </ul>
        </nav>
    
        <!-- main content (right side) -->
        <div id="main-content">
    <div class="flexbox1">
        <div class="title"><h1>User List</h1></div> <br>

        <form action="" method="post">
            <div class="dropdownMenu">    
                    <select name="userType" id="user">

                        <option disable selected value>Choose User Type</option>
                        <option value="User">General User</option>
                        <option value="Rider">Rider</option>
                        <option value="Restaurant Owner">Restaurant Owner</option>

                    </select>  
                    
                    <input name="Next" type="submit" value="Next" class="button"> <br><br>  
            </div>
        </form>
    </div>

        <form action="AddUser.php">
            <button type="submit" name="send" value="Edit" class="button">Add New User</button> <br><br>
        </form>

        <form action="AddRider.php">
            <button type="submit" name="send" value="Edit" class="button">Add New Rider</button> <br><br>
        </form>

        <form action="AddRestaurantOwner.php">
            <button type="submit" name="send" value="Edit" class="button">Add New Restaurant Owner</button> <br><br>
        </form>
    <hr><br>

            <?php 
                if(isset($_POST['Next'])){
                    $getType = mysqli_real_escape_string($con, $_POST['userType']);
        
                    if($getType === "User"){
                        $query1 = "SELECT * FROM user";
                        $result = mysqli_query($con, $query1);
            ?>

                        <table border="1px" style="width: 70%; line-height:30px;">
                            <tr>
                                <th colspan=6><h2>User Account</h2></th>
                            </tr>

                            <t>
                                <th>ID</th>
                                <th>Password</th>
                                <th>Name</th>
                                <th>Phone Number</th>
                                <th>Address</th>
                               
                            </t>

                            <?php
                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    while($row = $result->fetch_assoc()) {
                                        $id = $row['user_ID'];
                                        $pass = $row['user_password'];
                                        $name = $row['user_name'];
                                        $phone = $row['user_phoneNum'];
                                        $address = $row['user_address'];
                                        
                                        echo 
                                        '<tr>
                                            <td style="padding: 0 1rem">'.$id.'</td>
                                            <td style="padding: 0 1rem">'.$pass.'</td>
                                            <td style="padding: 0 1rem">'.$name.'</td>
                                            <td style="padding: 0 1rem">'.$phone.'</td>
                                            <td style="padding: 0 1rem">'.$address.'</td>
                                            <td style="padding: 0 1rem">
                                                <button><a href= "UpdateUserProfile.php?viewid='.$id.'">Update</a></button>
                                                <button><a href= "DeleteUser.php?viewid='.$id.'">Delete</a></button>
                                            </td>
                                        </tr>';
                                    }
                                }
                            ?>

                        </table><br><br>

            <?php
                    }else if($getType === "Rider"){
                        $query = "SELECT * FROM rider";
                        $result = mysqli_query($con, $query);
            ?>

                        <table border="1px" style="width: 70%; line-height:30px;">
                            <tr>
                                <th colspan=6><h2>Rider Account</h2></th>
                            </tr>

                            <t>
                                <th>ID</th>
                                <th>Password</th>
                                <th>Name</th>
                                <th>Phone Number</th>
                                <th>Address</th>
                                
                            </t>

                            <?php
                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    while($row = $result->fetch_assoc()) {
                                        $id = $row['rider_ID'];
                                        $pass = $row['rider_password'];
                                        $name = $row['rider_name'];
                                        $phone = $row['rider_phoneNum'];
                                        $address = $row['rider_address'];
                                        
                                        echo
                                        '<tr>
                                            <td style="padding: 0 1rem">'.$id.'</td>
                                            <td style="padding: 0 1rem">'.$pass.'</td>
                                            <td style="padding: 0 1rem">'.$name.'</td>
                                            <td style="padding: 0 1rem">'.$phone.'</td>
                                            <td style="padding: 0 1rem">'.$address.'</td>
                                            <td style="padding: 0 1rem">
                                                <button><a href= "UpdateRiderProfile.php?viewid='.$id.'">Update</a></button>
                                                <button><a href= "DeleteRider.php?viewid='.$id.'">Delete</a></button>
                                            </td>
                                        </tr>';
                                    }
                                }
                            ?>

                        </table><br><br>

            <?php
                    }else if($getType === "Restaurant Owner"){
                        $query = "SELECT * FROM restaurantowner";
                        $result = mysqli_query($con, $query);
            ?>
                        <table border="1px" style="width: 70%; line-height:30px;">
                            <tr>
                                <th colspan=7><h2>Restaurant Owner Account</h2></th>
                            </tr>

                            <t>
                                <th>ID</th>
                                <th>Password</th>
                                <th>Name</th>
                                <th>Phone Number</th>
                                <th>Email</th>
                                <th>Address</th>
                                
                            </t>

                            <?php
                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    while($row = $result->fetch_assoc()) {
                                        $id = $row['ro_ID'];
                                        $pass = $row['ro_password'];
                                        $name = $row['ro_name'];
                                        $phone = $row['ro_phoneNum'];
                                        $email = $row['ro_email'];
                                        $address = $row['ro_address'];
                                        
                                        echo
                                        '<tr>
                                            <td style="padding: 0 1rem">'.$id.'</td>
                                            <td style="padding: 0 1rem">'.$pass.'</td>
                                            <td style="padding: 0 1rem">'.$name.'</td>
                                            <td style="padding: 0 1rem">'.$phone.'</td>
                                            <td style="padding: 0 1rem">'.$email.'</td>
                                            <td style="padding: 0 1rem">'.$address.'</td>
                                            <td style="padding: 0 1rem">
                                                <button><a href= "UpdateRoProfile.php?viewid='.$id.'">Update</a></button>
                                                <button><a href= "DeleteRestaurantOwner.php?viewid='.$id.'">Delete</a></button>
                                            </td>
                                        </tr>';
                                    }
                                }
                            ?>

                        </table><br><br>
            <?php
                    }
                }
            ?>
    </div>
</body>
</html>
