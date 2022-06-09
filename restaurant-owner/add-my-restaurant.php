<!DOCTYPE html>
<?php

/**
 * Session
 */
session_start();

$restaurantID = $_SESSION['restaurantID'];
// $restaurantID = 1;
include 'actions/read_restaurant.php';
?>

<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Foody | UMP Food Delivery System</title>

  <!-- external stylesheet -->
  <link rel="stylesheet" href="../styles/main.css">
  <link rel="stylesheet" href="./styles/manage_menu_item.css">
  <link rel="stylesheet" href="./styles/restaurant_owner.css">
  <!-- javascript -->
  <script src="./scripts/Preview.js" type="text/javascript"></script>
  <!-- icon library | font awesome -->
  <script src="https://kit.fontawesome.com/06b2bd9377.js" crossorigin="anonymous"></script>
</head>

<body>
  <header>
    <?php include 'assets/reusable/header.php' ?>
  </header>

  <!-- content -->
  <div id="content-wrapper">
    <?php include 'assets/reusable/navbar.php' ?>

    <!-- main content (right side) -->
    <div id="main-content">
      <form class="user-input-form" action="actions/create_restaurant.php" method="post" enctype="multipart/form-data">
        <!-- Restaurant name -->
        <label class="bold-label required-input" for="restaurantName">Restaurant name</label>
        <input class="text-input" type="text" name="restaurantName" placeholder="Enter restaurant name" required>
        <!-- Restaurant type -->
        <label class="bold-label" for="restaurantType">Restaurant type</label>
        <!--
          Show drop down by query table: restaurant type
         -->
        <select class="text-input required-input" name="restaurantTypeID" required>
          <?php
          while ($row_rt = mysqli_fetch_assoc($result_rt)) {
            $restaurantType_ID = $row_rt['restaurantType_ID'];
          ?>
            <option value="<?php echo $restaurantType_ID; ?>">
              <?php echo $row_rt['restaurantType_name']; ?>
            </option>
          <?php
          } // close while mysqli fetch
          ?>
        </select>

        <!-- Contact number -->
        <label class="bold-label required-input" for="contact">Contact</label>
        <input class="text-input" type="tel" name="contact" placeholder="010-7775555" pattern="[0-9]{3}-*[0-9]{7,8}" required>
        <!-- Restaurant address -->
        <label class="bold-label required-input" for="restaurantAddress">Restaurant address</label>
        <textarea class="text-input" name="restaurantAddress" rows="5" cols="80">Enter restaurant address</textarea>
        <!-- Operating hour -->
        <label class="bold-label required-input" for="operatingHour">Operating hour</label>
        <div style="display: flex;">
          <input class="text-input" type="time" name="operatingHourOpen" value="08:00" required style="margin-right: 1rem;">
          <input class="text-input" type="time" name="operatingHourClose" value="20:00" required>
        </div>
        <!-- Restaurant description -->
        <label class="bold-label" for="restaurantDescription">Restaurant description</label>
        <textarea class="text-input" name="restaurantDescription" rows="5" cols="80">Enter restaurant description</textarea>
        <!-- Restaurant picture -->
        <label class="bold-label" for="restaurantImage">Restaurant picture</label>
        <!-- remember to add inside form: enctype="multipart/form-data" -->
        <div style="display: inline-flex; flex-direction: column; align-items: start; width: 14rem;">
          <input type="file" id="restaurantImage" name="restaurantImage" accept="image/*" onchange="updateImageDisplay()" style="margin-bottom: 1rem;">
          <img id="preview" class="preview" src="" alt="Preview">
        </div>

        <!-- Add button -->
        <button class="btn submit-button" type="submit" name="submit" value="add-restaurant">Add</button>
      </form>
    </div>
  </div>
</body>

</html>