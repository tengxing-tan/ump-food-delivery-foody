<?php
$conn = mysqli_connect("localhost", "root", "");

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

mysqli_select_db($conn, "foodydb") or die("Could not open profile database");

date_default_timezone_set('Asia/Kuala_Lumpur');