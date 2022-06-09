<?php
$link = mysqli_connect("localhost", "root", "");

mysqli_select_db($link, "rider") or die(mysqli_connect_error());
?>