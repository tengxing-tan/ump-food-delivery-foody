<?php
    include_once 'C:\xampp\htdocs\ump-food-delivery-foody\dbconnection.php';
    session_start();

    if(isset($_POST["Login"]))
    {
        $type = $_POST['type'];
        $email = mysqli_real_escape_string($con, $_POST["email"]);
        $password = mysqli_real_escape_string($con, $_POST["password"]);

        if($type === 'Admin'){

            $login = mysqli_query($con, "SELECT admin_email FROM admin WHERE admin_email='$email' limit 1");
            //echo mysqli_num_rows($login);

            if (mysqli_num_rows($login) > 0) {

                $row = mysqli_fetch_array($login);

                $_SESSION["adminLogin"] = $row['admin_email'];

                header("Location: AdminHomepage.php");
            }
            else{
                echo "<script>alert('Login details for admin is incorrect. Please try again.');</script>";
            }
            
        }else if($type === 'General User'){

            $login = mysqli_query($con, "SELECT user_name FROM user WHERE user_name = '$name' limit 1 ");

            if (mysqli_num_rows($login) > 0) {

                $row = mysqli_fetch_assoc($login);

                $_SESSION["user_ID"] = $row['user_name'];

                header("Location: UserHomepage.php");
            }
            else{
                echo "<script>alert('Login details is incorrect. Please try again.');</script>";
            }
        }else if($type === 'Rider'){

            $login = mysqli_query($con, "SELECT rider_name FROM rider WHERE rider_name = '$name' limit 1 ");

            if (mysqli_num_rows($login) > 0) {

                $row = mysqli_fetch_assoc($login);

                $_SESSION["rider_ID"] = $row['rider_name'];

                header("Location: RiderHomepage.php");
            }
            else{
                echo "<script>alert('Login details is incorrect. Please try again.');</script>";
            }
        }else if($type === 'Restaurant Owner'){

            $login = mysqli_query($con, "SELECT ro_name FROM restaurantowner WHERE ro_name = '$name' limit 1 ");

            if (mysqli_num_rows($login) > 0) {

                $row = mysqli_fetch_assoc($login);

                $_SESSION["ro_ID"] = $row['ro_name'];

                header("Location: RestaurantOwnerHomepage.php");
            }
            else{
                echo "<script>alert('Login details is incorrect. Please try again.');</script>";
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
    <title>Login Page</title>
</head>
<body>

<h1>Foody</h1>  
<h2>Welcome back!</h2>
    <form action="#" method="post">

          <label for="email">Email:</label>  
          <input type="email" name="email" id="email" ><br><br>
    
          <label for="fpassword">Password:</label>   
        <input type="password" name="password" id="fpassword" ><br><br>

        <select name="type">
            <option disable selected value>Choose User Type</option>
            <option value="General User">User</option>
            <option value="Admin">Administrator</option>
            <option value="Rider">Rider</option>
            <option value="Restaurant Owner">Restaurant Owner</option>
        </select>
      
       
          <button type="submit" name="Login" value = "Login" >Submit</button>                 
    </form>
    
</body>
</html>