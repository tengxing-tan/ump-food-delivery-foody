<?php
    include_once 'dbconnection.php';
    session_start();


    if(isset($_POST['Add'])){
        

        $name = mysqli_real_escape_string($con, $_POST['roname']);
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $email = mysqli_real_escape_string($con, $_POST['roemail']);
        $phoneNum  = mysqli_real_escape_string($con, $_POST['phoneNum']);
        $address = mysqli_real_escape_string($con, $_POST['roaddress']);

           
                $query = "INSERT INTO restaurantowner(ro_name, ro_password, ro_email, ro_phoneNum, ro_address) VALUES ('$name', '$password', '$email', '$phoneNum', '$address')";
                $result = mysqli_query($con, $query);

                if($result){
                    echo "
                    <script>
                    alert('Data Added Success!');
                    window.location = 'UserList.php';
                    </script>";

                }else{
                    echo "<script>alert('Data Added FAILED'); <script>";
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
            <li><a class="nav-link" href="ComplaintReport.php">Complaint Report</a></li>
            <li><a class="nav-link" href="login.php">Logout</a></li>
        </ul>
        </nav>
    
        <!-- main content (right side) -->
        <div id="main-content">

    <h1>Registration For Restaurant Owner</h1>  
        <form action="#" method="post">
            

            <br><br>
            <table>
      <tr>
        <td width="200">
            <label for="froname">Name:</label>  
            </td>
        <td>
            <input type="text" name="roname" id="froname" ><br><br>
            </td>
      </tr>
      <tr>
        <td>
            <label for="fpassword">Password:</label>  
            </td>
        <td>
            <input type="text" name="password" id="fpassword" ><br><br>
            </td>
      </tr>
      <tr>
        <td>
            <label for="froemail">Email:</label>   
            </td>
        <td>
            <input type="email" name="roemail" id="froemail" ><br><br>
            </td>
      </tr>
      <tr>
        <td>
            <label for="fphoneNum">Phone Number:</label>  
            </td>
        <td>
            <input type="text" name="phoneNum" id="fphoneNum" ><br><br>
            </td>
      </tr>
      <tr>
        <td>
        <label for="faddress">Address:</label>
           </td>
        <td>
            <textarea name="roaddress" rows="5" cols="40"></textarea><br><br>
            </td>
      </tr>
      <tr>
        <td>
            <button type="submit" name="Add" value = "Add Restaurant Owner" >Add</button>   
            </td>
      </tr>
    </table>
        </form>
        </div>
    </div>
</body>
</html>
