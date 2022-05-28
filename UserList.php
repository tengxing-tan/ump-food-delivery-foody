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
    <title>User List</title>
</head>
<body>
     <!--Navigation-->
     <?php include "index.php" ?>



    <button type="submit" name="Add Usert" value = "Add User" >Submit</button> 
    
</body>
</html>