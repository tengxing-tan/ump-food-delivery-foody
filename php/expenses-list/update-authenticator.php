<?php
session_start();

include '../connect-database.php'; 

$title=$_POST['expenses-title'];
$date=$_POST['date'];
$description=$_POST['expenses-description'];
$amount=$_POST['expenses-amount'];
$expenses_ID=$_GET['a'];
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
    session_write_close();
    header("location: ./update.php?a=".$expenses_ID);
    $_error_msg[]=array();
    exit();
}

$query="UPDATE expensesrecord SET expenses_title='$title', expenses_date='$date', expenses_description='$description', expenses_amount='$amount' WHERE expenses_ID='$expenses_ID'";

if(mysqli_query($conn, $query)){
    $_SESSION['result']= "EXPENSES RECORD UPDATED.";
}
else{
    $_SESSION['result']= mysqli_error($conn);
}
header("location: ../../View/expenses-list/index.php");
?>