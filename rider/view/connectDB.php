<?php
// $link = mysqli_connect("localhost", "root", "");

// mysqli_select_db($link, "foodydb") or die(mysqli_connect_error());

/**
 * Get Heroku ClearDB connection information
 */
$cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
$cleardb_server = $cleardb_url["host"];
$cleardb_username = $cleardb_url["user"];
$cleardb_password = $cleardb_url["pass"];
$cleardb_db = substr($cleardb_url["path"],1);
$active_group = 'default';
$query_builder = TRUE;
/* Connect to DB */
$link = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);

?>