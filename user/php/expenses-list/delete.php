<?php
session_start();
include('../connect-database.php');

$expenses_ID=$_GET['a'];

$query="DELETE FROM expensesrecord WHERE expenses_ID='$expenses_ID'";

if(mysqli_query($conn, $query)){
    $_SESSION['result'] = "EXPENSES RECORD DELETED";
}
else{
    $_SESSION['result']= mysqli_error($conn);
}
header("location: ../../View/expenses-list/index.php");
?>