<?php
session_start();

include '../connect-database.php'; 

$title=$_POST['expenses-title'];
$date=$_POST['date'];
$description=$_POST['expenses-description'];
$amount=$_POST['expenses-amount'];
$user_ID=$_SESSION['user_ID'];

$err_flag=false;

if($title==''){
    $error_msg[] = "title cannot be empty.";
    $err_flag=true;
}
if($date==''){
    $error_msg[] = "date cannot be empty.";
    $err_flag=true;
}
list($y, $m, $d) = array_pad(explode('-', $date, 3), 3, 0);

if ($date!='' && (ctype_digit("$y$m$d") && checkdate($m, $d, $y))==0){
    $error_msg[] = "invalid date format.";
    $err_flag=true;
}
if($amount==''){
    $error_msg[] = "expenses amount cannot be empty.";
    $err_flag=true;;
}
if($amount!='' && (is_numeric($amount)==0)){
    $error_msg[] = "expenses amount must be numbers.";
    $err_flag=true;
}


if($err_flag){
    $_SESSION['ERROR_MESSAGE']= $error_msg;
    header("location: ../../View/expenses-list/add-expenses.php");
    $_error_msg[]=array();
    exit();
}

$query="INSERT INTO expensesrecord (user_ID, expenses_title, expenses_description, expenses_date, expenses_amount) VALUES ($user_ID, '$title', '$description', '$date', $amount)";

if(mysqli_query($conn, $query)){
    $_SESSION['result']= "EXPENSES RECORD ADDED";
}
else{
    $_SESSION['result']= mysqli_error($conn);
}
header("location: ../../View/expenses-list/index.php");
?>