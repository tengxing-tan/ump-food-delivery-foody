<?php
$name  = "localhost";
$uname = "root";
$password = "";
$db_name = "foody";

$con = mysqli_connect($name, $uname, $password, $db_name);

if(!$con){
    echo "Connection Failed";
}
?>