<!DOCTYPE html>
<?php
include 'db_connect.php';
/**
 * SESSION
 */
session_start();
// $roID = $_SESSION['roID'];
$roID = 1;

extract($_POST);
$restaurantImage = $_FILES['restaurantImage'];


/**
 * Store restaurant image
 */
$target_file = "../assets/restaurant/$restaurantID/" . $restaurantImage;
// $target_file = $target_dir . basename($restaurantImage);
// echo $target_file;

$restaurantImage = $_FILES["restaurantImage"]["name"];
$tempname = $_FILES["restaurantImage"]["tmp_name"];

/**
 * Create folder for new restaurant
 */
if (is_dir("../assets/restaurant/$restaurantID")) {
  echo 'restaurant folder exist';
} else {
  if (mkdir("../assets/restaurant/".$restaurantID, 0777, true)) {
    echo 'make directory successfully';
  } else {
    echo "failed. I want to create directory at ../assets/restaurant/".$restaurantID;
  }
}
$folder = "../assets/restaurant/$restaurantID/" . $restaurantImage;


if (is_uploaded_file($restaurantImage)) {
  echo "<script>console.log('file is here.');</script>";
} else {
  echo "<script>console.log('nothing here.');</script>";
}


// Check file size
if ($_FILES["restaurantImage"]["size"] > 5000000) { // 5MB
  echo "<script>alert('Image file too large. (max 5MB)')</script>";
}

// Now let's move the uploaded image into the folder: image
if (move_uploaded_file($tempname, $folder)) {
  $msg = "Image uploaded successfully";
} else {
  $msg = "Failed to upload image";
}
echo $msg;

/**
 * mysql Qeury
 */
$sql = "INSERT INTO `restaurant` VALUES (NULL,'$roID','$restaurantName','$restaurantTypeID','$contact','$restaurantAddress','$operatingHourOpen','$operatingHourClose','$restaurantDescription','$restaurantImage')";
echo $sql;

$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

if ($result) {
  // echo 'add item ok';
  $_SESSION['status'] = 1;
} else {
  // echo 'filename exists';
  $_SESSION['status'] = 0;
}

/**
 * Jump another page
 */
header('location: ../my-restaurants.php');
exit();

/**
 * Session => status
 * 0: nothing
 * 1: create
 * 2: update
 * 3: delete
 */
