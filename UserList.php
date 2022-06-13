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
        <h1>User List</h1>
            <form action="#" method="post">
                <select name="type">
                    <option disable selected value>Choose User Type</option>
                    <option value="General User">User</option>
                    <option value="Rider">Rider</option>
                    <option value="Restaurant Owner">Restaurant Owner</option>
                </select>

                <button type="submit" name="next" value = "Add User" >Next</button>  
            </form>

            
            <div style="display:flex; justify-content: space-between width: 200px" >
            <a href="AddUser.php"><button class = 'btn'>Add User</button></a>

            <a href="AddRider.php"><button class = 'btn'>Add Rider</button></a>

            <a href="AddRestaurantOwner.php"><button class = 'btn'>Add Restaurant Owner</button></a>


            </div> 



            <?php
                if(isset($_POST['next'])){
                    $getType = mysqli_real_escape_string($con, $_POST['type']);

                    if($getType === "General User"){
                        $query1 = "SELECT * FROM user";
                        $result = mysqli_query($con, $query1);
            ?>

                     
                    <table  border = "1px" style = "width: 70%; line-height:30px;">
                    
                    <tr>
                        <th colspan =7><h2>User Account</h2></th>
                    </tr> 

                    <t>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Password</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Address</th>
                        <th>Menu</th>
                    </t>

                    <?php
                        if ($result->num_rows > 0){
                            while($row =  $result->fetch_assoc()){
                                $id = $row['user_ID'];
                                $name = $row['user_name'];
                                $pass = $row['user_password'];
                                $email = $row['user_email'];
                                $phoneNum = $row['user_phoneNum'];
                                $address = $row['user_address'];

                                echo
                                '<tr>
                                <td style = "padding: 0 1rem">'.$id.'</td>
                                <td style = "padding: 0 1rem">'.$name.'</td>
                                <td style = "padding: 0 1rem">'.$pass.'</td>
                                <td style = "padding: 0 1rem">'.$email.'</td>
                                <td style = "padding: 0 1rem">'.$phoneNum.'</td>
                                <td style = "padding: 0 1rem">'.$address.'</td>
                                <td style = "padding: 0 1rem">
                                <button><a href= "UpdateUserProfile.php?viewid= '.$id.'">Update</a></button>
                                <button><a href= "DeleteUser.php?viewid= '.$id.'">Delete</a></button>
                                </td>
                                </tr>';
                            }
                        }

                    ?>

                    </table>

            <?php
                    }else if ($getType === "Rider"){
                        $query1 = "SELECT * FROM rider";
                        $result = mysqli_query($con, $query1);
            ?>

                    <table border = "1px" style = "width: 70%; line-height:30px;">
                    <tr>
                        <th colspan =7><h2>Rider Account</h2></th>
                    </tr> 

                    <t>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Password</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Address</th>
                        <th>Menu</th>
                    </t>

                    <?php
                        if ($result->num_rows > 0){
                            while($row =  $result->fetch_assoc()){
                                $id = $row['rider_ID'];
                                $name = $row['rider_name'];
                                $pass = $row['rider_password'];
                                $email = $row['rider_email'];
                                $phoneNum = $row['rider_phoneNum'];
                                $address = $row['rider_address'];

                                echo
                                '<tr>
                                <td style = "padding: 0 1rem">'.$id.'</td>
                                <td style = "padding: 0 1rem">'.$name.'</td>
                                <td style = "padding: 0 1rem">'.$pass.'</td>
                                <td style = "padding: 0 1rem">'.$email.'</td>
                                <td style = "padding: 0 1rem">'.$phoneNum.'</td>
                                <td style = "padding: 0 1rem">'.$address.'</td>
                                <td style = "padding: 0 1rem">
                                <button><a href= "UpdateRiderProfile.php?viewid= '.$id.'">Update</a></button>
                                <button><a href= "DeleteRider.php?viewid= '.$id.'">Delete</a></button>
                                </td>
                                </tr>';
                            }
                        }

                    ?>

                    </table>
            <?php
                    }else if($getType === "Restaurant Owner"){
                        $query1 = "SELECT * FROM restaurantowner";
                        $result = mysqli_query($con, $query1);
            ?>

                    <table border = "1px" style = "width: 70%; line-height:30px;">
                    <tr>
                        <th colspan =7><h2>Restaurant Owner Account</h2></th>
                    </tr> 

                    <t>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Password</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Address</th>
                        <th>Menu</th>
                    </t>

                    <?php
                        if ($result->num_rows > 0){
                            while($row =  $result->fetch_assoc()){
                                $id = $row['ro_ID'];
                                $name = $row['ro_name'];
                                $pass = $row['ro_password'];
                                $email = $row['ro_email'];
                                $phoneNum = $row['ro_phoneNum'];
                                $address = $row['ro_address'];

                                echo
                                '<tr>
                                <td style = "padding: 0 1rem">'.$id.'</td>
                                <td style = "padding: 0 1rem">'.$name.'</td>
                                <td style = "padding: 0 1rem">'.$pass.'</td>
                                <td style = "padding: 0 1rem">'.$email.'</td>
                                <td style = "padding: 0 1rem">'.$phoneNum.'</td>
                                <td style = "padding: 0 1rem">'.$address.'</td>
                                <td style = "padding: 0 1rem">
                                <button><a href= "UpdateRoProfile.php?viewid= '.$id.'">Update</a></button>
                                <button><a href= "DeleteRestaurantOwner.php?viewid= '.$id.'">Delete</a></button>
                                </td>
                                </tr>';
                            }
                        }

                    ?>

                <?php 
                        }
                    }
                ?>

        </div>
    </div>
</body>
</html>
