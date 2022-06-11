<!--To update data of viewcomplaint.php into database.-->
<?php
include("connecttest.php");

extract($_POST);

$complaint_date = date("Y-m-d", time());
$complaint_time = date("H:i:s", time());



$query = "UPDATE complaintlist SET complaint_date = '$complaint_date', complaint_time = '$complaint_time', complaint_type = '$complaint_type', complaint_comment = '$complaint_comment', complaint_status = '$complaint_status' WHERE complaint_id = '$id'";

$result = mysqli_query($conn, $query) or die("Could not execute query in adminform.php");
if ($result) {
    echo "<script type = 'text/javascript'> window.location='viewcomplaint.php' </script>";
}
?>