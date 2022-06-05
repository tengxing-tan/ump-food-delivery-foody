<?php
session_start();

include("../../php/connect-database.php");

$year=date('Y');
$week=$_POST['week'];

if(strcmp($_POST['month'], "Jan")==0){
    $month=1;
}
else if(strcmp($_POST['month'], "Fe")==0){
    $month=2;
}
else if(strcmp($_POST['month'], "March")==0){
    $months=3;
}
else if(strcmp($_POST['month'], "Apr")==0){
    $month=4;
}
else if(strcmp($_POST['month'], "May")==0){
    $month=5;
}
else if(strcmp($_POST['month'], "June")==0){
    $month=6;
}
else if(strcmp($_POST['month'], "July")==0){
    $month=7;
}
else if(strcmp($_POST['month'], "Aug")==0){
    $month=8;
}
else if(strcmp($_POST['month'], "Sep")==0){
    $month=9;
}
else if(strcmp($_POST['month'], "Oct")==0){
    $month=10;
}
else if(strcmp($_POST['month'], "Nov")==0){
    $month=11;
}
else if(strcmp($_POST['month'], "Dec")==0){
    $month=12;
}

if(strcmp($week, "Week 1")==0){
    $start_date=1;
    $end_date=7;
}
else if(strcmp($week, "Week 2")==0){
    $start_date=8;
    $end_date=14;
}
else if(strcmp($week, "Week 3")==0){
    $start_date=15;
    $end_date=21;
}
else if(strcmp($week, "Week 4")==0){
    $start_date=22;
    $end_date=28;
}
else if(strcmp($week, "Week 5")==0){
    $start_date=29;
    $end_date=31;
}
else{
    $start_date=1;
    $end_date=31;
}


$_SESSION['start-date']="$year-$month-$start_date";
$_SESSION['end-date']="$year-$month-$end_date";
header("location: ../../View/calculate-average-expenses/index.php");
?>