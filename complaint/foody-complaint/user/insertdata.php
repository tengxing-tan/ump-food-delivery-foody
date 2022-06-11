<?php

include("connecttest.php");

extract($_POST);
$complaint_date = date("Y-m-d", time());
$complaint_time = date("H:i:s", time());
$complaint_status = "New";



if ($complaint_name && $complaint_type && $complaint_comment && $complaint_status) {
    /* Prepare an insert statement */
    $stmt = mysqli_prepare($conn, "INSERT INTO complaintlist (complaint_name,complaint_date,complaint_time,complaint_type,complaint_comment,complaint_status) VALUES (?,?,?,?,?,?)");

    /* Bind variables to parameters */
    mysqli_stmt_bind_param($stmt, 'ssssss', $complaint_name, $complaint_date, $complaint_time, $complaint_type, $complaint_comment, $complaint_status);

    /* Execute the statement */
    $ok = mysqli_stmt_execute($stmt);
}

if ($ok) {

    echo "<script type='text/javascript'> window.location='complaintlistmain.php' </script>";
} else {
    echo "Error: " . $stmt . "<br>" . mysqli_error($conn);
}