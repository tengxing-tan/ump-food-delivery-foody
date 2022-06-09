<!DOCTYPE html>
<?php
/**
 * SESSION
 */
session_start();
$restaurantID = $_SESSION['restaurantID'];
// $restaurantID = 1;

/**
 * read order from database
 */
include 'actions/read_order.php';
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
    <link rel="stylesheet" href="styles/report.css">
    <!-- javascript -->
    <script src="scripts/RestaurantOwner.js" charset="utf-8"></script>
    <script src="scripts/MenuList.js" charset="utf-8"></script>
    <!-- icon library | font awesome -->
    <script src="https://kit.fontawesome.com/06b2bd9377.js" crossorigin="anonymous"></script>
</head>

<body onload="activeNav('4')">
    <header>
        <?php include 'assets/reusable/header.php'; ?>
    </header>

    <!-- content -->
    <div id="content-wrapper">
        <?php include 'assets/reusable/navbar.php'; ?>

        <!-- main content (right side) -->
        <div id="main-content">
            <div class="one-line-form">
                <div>
                    <a href="?id=0"><button class="btn secondary-btn">Days</button></a>
                    <a href="?id=2"><button class="btn secondary-btn">Weeks</button></a>
                    <a href="?id=3"><button class="btn secondary-btn">Months</button></a>
                </div>
                <form action="?id=1" method="post">
                    <input type="date" name="searchDate" class="input-text" />
                    <button type="submit" class="btn">Search</button>
                </form>
            </div>

            <div class="report-table">
                <!-- Header row -->
                <div class="report-header-row report-row" style="grid-template-columns: repeat(5, 1fr);">
                <!-- label of duration -->
                    <label><?php echo $durationType; ?></label>
                    <label>Total Order</label>
                    <label>Total Payment (RM)</label>
                    <label>Total Commission<br />to Foody (RM)</label>
                    <label>Total Commission<br />to Rider (RM)</label>
                </div>

                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    if (isset($row['order_date'])) {
                        $duration = $row['order_date'];
                    } elseif (isset($row['WEEK(`order_date`)'])) {
                        $duration = $row['WEEK(`order_date`)'];
                    } else {
                        // it's month
                        $duration = $row['MONTHNAME(`order_date`)'];
                    }
                ?>
                    <!-- row -->
                    <div class="report-row" style="grid-template-columns: repeat(5, 1fr);">
                        <span><?php echo $duration; ?></span>
                        <span><?php echo $row['COUNT(`order_ID`)']; ?></span>
                        <span><?php echo $row['SUM(`total_amount`)']; ?></span>
                        <span><?php echo $row['COUNT(`order_ID`)'] * 1.50; ?></span>
                        <span><?php echo $row['COUNT(`order_ID`)'] * 5; ?></span>
                    </div>
                <?php
                } // close white
                ?>

                <!-- 
                    HTML example: row
                 -->
                <!-- <div class="report-row"  style="grid-template-columns: repeat(5, 1fr);">
                    <span>2022-05-01</span>
                    <span>2000</span>
                    <span>9000</span>
                    <span>500</span>
                    <span>500</span>
                </div> -->
            </div>
        </div>
    </div>
</body>

</html>