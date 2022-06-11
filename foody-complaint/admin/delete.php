<!-- buang.php -->
<!-- To delete one particular data. -->

<?php

include ("connecttest.php");

$idURL = $_GET['id'];

$query = "DELETE FROM complaintlist WHERE complaint_id = '$idURL'";
$result = mysqli_query($conn,$query) or die ("Could not execute query in manage.php");

if($result){
echo "<script type= 'text/javascript'> window.location='viewcomplaint.php'</script>";
}
?>