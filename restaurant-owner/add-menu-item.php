<!DOCTYPE html>
<?php

/**
 * Session
 */
session_start();

$restaurantID = $_SESSION['restaurantID'];
// $restaurantID = 1;
include 'actions/read_menu_item.php';
?>

<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Foody | UMP Food Delivery System</title>

  <!-- external stylesheet -->
  <link rel="stylesheet" href="../styles/main.css">
  <link rel="stylesheet" href="styles/restaurant_owner.css">
  <link rel="stylesheet" href="styles/manage_menu_item.css">
  <!-- javascript -->
  <script src="./scripts/Preview.js" type="text/javascript"></script>
  <!-- icon library | font awesome -->
  <script src="https://kit.fontawesome.com/06b2bd9377.js" crossorigin="anonymous"></script>
</head>

<body>
  <header>
    <?php include 'assets/reusable/header.php'; ?>
  </header>

  <!-- content -->
  <div id="content-wrapper">
    <?php include 'assets/reusable/navbar.php'; ?>

    <!-- main content (right side) -->
    <div id="main-content">
      <form class="user-input-form" action="actions/create_menu_item.php" method="post" enctype="multipart/form-data">
        <!-- Food title -->
        <label class="bold-label required-input" for="foodTitle">Food title</label>
        <input class="text-input" type="text" name="foodTitle" placeholder="Enter food title" required>
        <!-- Food category -->
        <label class="bold-label required-input" for="foodCategory">Food category</label>
        <select class="text-input" name="foodCategory" required>
          <?php
          while ($row_fc = mysqli_fetch_assoc($result_fc)) {
            $foodCategoryID = $row_fc['food_category_ID'];
          ?>
            <option value="<?php echo $foodCategoryID; ?>">
              <?php echo $row_fc['category_name']; ?>
            </option>
          <?php
          } // close while mysqli fetch
          ?>
        </select>
        <!-- Food description -->
        <label class="bold-label" for="foodDescription">Food description</label>
        <textarea class="text-input" name="foodDescription" rows="5" cols="80">None</textarea>
        <!-- Price -->
        <label class="bold-label required-input" for="foodPrice">Price (RM)</label>
        <input class="text-input" type="number" name="foodPrice" value="0" step=0.01 required>
        <!-- Food picture -->
        <label class="bold-label required-input" for="foodImage">Food picture</label>
        <!-- upload food picture -->
        <!-- remember to add inside form: enctype="multipart/form-data" -->
        <div style="display: inline-flex; flex-direction: column; align-items: start; width: 14rem;">
          <input type="file" id="input-food-image" name="foodImage" accept="image/*" onchange="updateImageDisplay()" style="margin-bottom: 1rem;">
          <img id="preview" class="food-picture preview" src="" alt="Preview">
        </div>
        <!-- Add button -->
        <button class="btn submit-button" type="submit" name="submit" value="add-menu">Add</button>
      </form>
    </div>
  </div>
</body>

</html>
