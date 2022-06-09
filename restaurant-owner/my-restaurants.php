<!DOCTYPE html>
<?php
// Establish MySQL connection
include 'db_connect.php';

/**
 * SESSION
 */
session_start();
$restaurantID = $_SESSION['restaurantID'];
// $restaurantID = 1;

// show alert message if user manage a menu item
include 'actions/alert_menu_status.php';

// read menu item from database
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
    <link rel="stylesheet" href="./styles/restaurant_owner.css">
    <link rel="stylesheet" href="./styles/report.css">
    <!-- javascript -->
    <script src="scripts/RestaurantOwner.js" type="text/javascript"></script>
    <!-- icon library | font awesome -->
    <script src="https://kit.fontawesome.com/06b2bd9377.js" crossorigin="anonymous"></script>
</head>

<body onload="activeNav('6')">
    <header>
        <?php include 'assets/reusable/header.php'; ?>
    </header>

    <!-- content -->
    <div id="content-wrapper">
        <?php include 'assets/reusable/navbar.php'; ?>

        <!-- main content (right side) -->
        <div id="main-content">
            <div class="report-table">
                <?php
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $restaurantImagePath = "assets/restaurant/$restaurantID/" . $row['restaurant_image'];
                        //print each row
                ?>
                        <a class="report-row" href="view-my-restaurant.php?id=<?php echo $row['restaurant_ID']; ?>" style="grid-template-columns: max-content 1fr 4rem;">
                            <div style="display: flex; align-items: center; width: 100%;">
                                <img class="preview" src="<?php echo (file_exists($restaurantImagePath)) ? $restaurantImagePath : 'assets/image/food_picture.png'; ?>" alt="Restaurant Picture" />
                                <!-- Restaurant name -->
                                <p style="margin-left: 1rem; font-weight: bold;"><?php echo $row['restaurant_name']; ?></p>
                            </div>
                            <p><?php echo $row['restaurantType_name']; ?></p>
                            <i class="fas fa-angle-right"></i>
                        </a>
                <?php
                    } // close while
                } // close if
                ?>
            </div>
            <a href="add-my-restaurant.php"><button class="add-button" type="button">
                    <i class="fas fa-plus"></i>
                </button></a>
        </div>
    </div>
</body>

</html>