<!DOCTYPE html>
<?php
/* session */
session_start();

// read food
include 'actions/read_menu_item.php';
?>

<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Foody | UMP Food Delivery System</title>

  <!-- external stylesheet -->
  <link rel="stylesheet" href="styles/main.css">
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
      <form class="user-input-form" action="actions/apply_discount.php" method="post" enctype="multipart/form-data">
        <!-- Food title -->
        <label class="bold-label required-input" for="foodTitle">Food title</label>
        <input class="text-input" type="text" name="foodTitle" placeholder="Enter food title" required>
        <!-- Price -->
        <label class="bold-label required-input" for="foodPrice">Price (RM)</label>
        <input class="text-input" type="number" name="foodPrice" value="0" step=0.01 required>
        <!-- discounted price -->
        <label class="bold-label required-input" for="discountedPrice">Discounted price</label>
        <input class="text-input" type="number" name="discountedPrice" value="0" step=0.01 required>
        <!-- Start & end date -->
        <label class="bold-label required-input" for="start">Start: </label>
        <input class="text-input" type="date" name="start" value="0" step=0.01 required>
        <label class="bold-label required-input" for="end">End: </label>
        <input class="text-input" type="date" name="end" value="0" step=0.01 required>
         <!-- Max order -->
         <label class="bold-label required-input" for="max_quantity_per_order">Max quantity per order: </label>
        <input class="text-input" type="number" name="max_quantity_per_order" value="0" step=0.01 required>
        <!-- Add button -->
        <button class="btn submit-button" type="submit" name="submit" value="add-menu">Add</button>
      </form>
    </div>
  </div>
</body>

</html>
