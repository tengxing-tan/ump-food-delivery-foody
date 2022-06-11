<!DOCTYPE html>
<?php
include 'db_connect.php';
/**
 * SESSION
 */
session_start();
// $restaurantID = 3;
$restaurantID = $_SESSION['restaurantID'];
$foodTitle = $_POST['foodTitle'];
$foodCategory = $_POST['foodCategory'];
$foodDescription = $_POST['foodDescription'];
$foodImage = $_FILES['foodImage']['name'];
$foodPrice = $_POST['foodPrice'];

/**
 * Store food image
 */
$target_file = "../assets/menu/$restaurantID/" . $foodImage;
// $target_file = $target_dir . basename($foodImage);
// echo $target_file;

$foodImage = $_FILES["foodImage"]["name"];
$tempname = $_FILES["foodImage"]["tmp_name"];

/**
 * Create folder for new restaurant
 */
if (is_dir("../assets/menu/$restaurantID")) {
  echo 'restaurant folder exist';
} else {
  if (mkdir("../assets/menu/".$restaurantID, 0777, true)) {
    echo 'make directory successfully';
  } else {
    echo "failed. I want to create directory at ../assets/menu/".$restaurantID;
  }
}
$folder = "../assets/menu/$restaurantID/" . $foodImage;


if (is_uploaded_file($foodImage)) {
  echo "<script>console.log('file is here.');</script>";
} else {
  echo "<script>console.log('nothing here.');</script>";
}


// Check file size
if ($_FILES["foodImage"]["size"] > 5000000) { // 5MB
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
$sql = "INSERT INTO `food`(`restaurant_ID`, `food_title`, `food_category_ID`, `food_description`, `food_image`, `food_price`, `food_availability`) " .
  "VALUES ('$restaurantID','$foodTitle','$foodCategory','$foodDescription','$foodImage','$foodPrice', 1)";

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
header('location: ../menu-list.php');
exit();

/**
 * Session => status
 * 0: nothing
 * 1: create
 * 2: update
 * 3: delete
 */
