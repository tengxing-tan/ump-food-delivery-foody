<?php
$conn = mysqli_connect("localhost", "root", "", "foodydb") or die(mysqli_error($conn));

/**
 * Get Heroku ClearDB connection information
 */
// $cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
// $cleardb_server = $cleardb_url["host"];
// $cleardb_username = $cleardb_url["user"];
// $cleardb_password = $cleardb_url["pass"];
// $cleardb_db = substr($cleardb_url["path"],1);
// $active_group = 'default';
// $query_builder = TRUE;
// /* Connect to DB */
// $conn = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);

// if (mysqli_connect_errno()) {
//     echo "Failed to connect to MySQL: " . mysqli_connect_error();
// }

// // mysqli_select_db($conn, "foodydb") or die("Could not open profile database");

// date_default_timezone_set('Asia/Kuala_Lumpur');