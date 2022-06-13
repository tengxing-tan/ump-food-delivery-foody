<?php
    include_once 'C:\xampp\htdocs\ump-food-delivery-foody\dbconnection.php';
    session_start();

    if(isset($_POST["Login"]))
    {
        $type = $_POST['type'];
        $email = mysqli_real_escape_string($con, $_POST["email"]);
        $password = mysqli_real_escape_string($con, $_POST["password"]);

        if($type === 'Admin'){

            $login = mysqli_query($con, "SELECT admin_email, admin_ID, admin_password FROM admin WHERE admin_email='$email' AND admin_password ='$password' limit 1");
            //echo mysqli_num_rows($login);

            if (mysqli_num_rows($login) > 0) {

                $row = mysqli_fetch_array($login);

                $_SESSION["adminLogin"] = $row['admin_ID'];

                header("Location: AdminHomepage.php");
            }
            else{
                echo "<script>alert('Login details for admin is incorrect. Please try again.');</script>";
            }
            
        }else if($type === 'General User'){

            $login = mysqli_query($con, "SELECT user_name, user_ID, user_password FROM user WHERE user_name = '$name' AND user_password = '$password' limit 1 ");

            if (mysqli_num_rows($login) > 0) {

                $row = mysqli_fetch_assoc($login);

                $_SESSION["user_ID"] = $row['user_ID'];

                header("Location: UserHomepage.php");
            }
            else{
                echo "<script>alert('Login details is incorrect. Please try again.');</script>";
            }
        }else if($type === 'Rider'){

            $login = mysqli_query($con, "SELECT rider_name, rider_ID, rider_password FROM rider WHERE rider_name = '$name' AND rider_password='$password' limit 1 ");

            if (mysqli_num_rows($login) > 0) {

                $row = mysqli_fetch_assoc($login);

                $_SESSION["rider_ID"] = $row['rider_ID'];

                header("Location: RiderHomepage.php");
            }
            else{
                echo "<script>alert('Login details is incorrect. Please try again.');</script>";
            }
        }else if($type === 'Restaurant Owner'){

            $login = mysqli_query($con, "SELECT ro_name, ro_ID, ro_password FROM restaurantowner WHERE ro_name = '$name' AND ro_password='$password' limit 1 ");

            if (mysqli_num_rows($login) > 0) {

                $row = mysqli_fetch_assoc($login);

                $_SESSION["ro_ID"] = $row['ro_ID'];

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
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            padding: 0;
            margin: 0;
            background: rgb(108, 90, 138);
            background: radial-gradient(circle, rgba(86, 195, 203, 0.4) 0%, rgba(108, 90, 138, 0.7) 80%);
        }

        .login-form {
            display: flex;
            flex-direction: column;
            align-items: stretch;

            background-color: whitesmoke;
            width: 20rem;
            padding: 3rem;
            border-radius: 24px;
            font: 14px sans-serif;
            z-index: 10;
            box-shadow: rgba(0, 0, 0, 0.16) 0px 10px 36px 0px, rgba(0, 0, 0, 0.06) 0px 0px 0px 1px;
        }

        label {
            color: #4e4e4e;
            font-weight: bold;
            display: inline-block;
            width: 7rem;
            margin-bottom: 0.25rem;
        }

        .input {
            display: block;
            padding: 0.5rem 1.25rem;
            margin-bottom: 1rem;
            border-radius: 8px;
            border: 2px solid #e8e8e8;
            font: inherit;
            outline-width: 2px;
        }

        .input:focus {
            outline: #555 solid 2px;
        }

        button[type=submit] {
            display: block;
            appearance: none;
            background-color: #6C5A8A;
            color: white;
            padding: 0.75rem 0;
            margin-top: 1.5rem;
            border-radius: 8px;
            font: bold 1rem sans-serif;
        }

        #illustration-delivery {
            position: absolute;
            width: 350px;
            height: 150px;
            right: 10%;
            top: 55%;
        }
    </style>
</head>

<body>
    <img id="illustration-delivery" src="assets/img/undraw1.png">

    <form class="login-form" action="#" method="post">
        <div>
            <h1 style="text-align: center;">Foody Login</h1>
            <h2 style="text-align: center; color: #4a4a4a; font-size: 1.15rem;">Welcome back!</h2>
        </div>
        <label for="email">Email:</label>
        <input class="input" type="email" name="email" id="email" autocomplete="email" placeholder="Email address">

        <label for="fpassword">Password:</label>
        <input class="input" type="password" name="password" id="fpassword" autocomplete="password" placeholder="Password">

        <select class="input" name="type">
            <option disable selected value>Choose User Type</option>
            <option value="General User">User</option>
            <option value="Admin">Administrator</option>
            <option value="Rider">Rider</option>
            <option value="Restaurant Owner">Restaurant Owner</option>
        </select>

        <button class="btn" type="submit" name="Login" value="Login">Login</button>
    </form>

</body>

</html>