<!DOCTYPE html>
<?php
/**
 * SESSION
 */
session_start();
$_SESSION['restaurantID'] = 1;
// $restaurantID = 1;

/**
 * read order from database
 */
include 'actions/read_order_status.php';
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
    <link rel="stylesheet" href="styles/menu_list.css">
    <link rel="stylesheet" href="styles/order_list.css">
    <!-- javascript -->
    <script src="scripts/RestaurantOwner.js" charset="utf-8"></script>
    <script src="scripts/OrderStatusList.js" charset="utf-8"></script>
    <!-- icon library | font awesome -->
    <script src="https://kit.fontawesome.com/06b2bd9377.js" crossorigin="anonymous"></script>
</head>

<body onload="activeNav('3'); filterOrderStatus('ordered');">
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
                    <button class="filter btn" onclick="filterOrderStatus(this.value)" value="ordered"><i class="fa-solid fa-clipboard" style="margin-right: 0.5rem"></i>ordered</button>
                    <button class="filter btn" onclick="filterOrderStatus(this.value)" value="preparing"><i class="fa-solid fa-clock" style="margin-right: 0.5rem"></i>preparing</button>
                    <button class="filter btn" onclick="filterOrderStatus(this.value)" value="prepared"><i class="fa-solid fa-paper-plane" style="margin-right: 0.5rem"></i>prepared</button>
                    <button class="filter btn" onclick="filterOrderStatus(this.value)" value="completed"><i class="fa-solid fa-check" style="margin-right: 0.5rem"></i>completed</button>
                    <button class="filter btn" onclick="filterOrderStatus(this.value)" value="cancelled"><i class="fa-solid fa-xmark" style="margin-right: 0.5rem"></i>cancelled</button>
                </div>
            </div>

            <div class="order-list">
                <?php
                while ($row = mysqli_fetch_assoc($result_order)) {
                ?>
                    <div class="order-details-card">
                        <div class="order-title">
                            <div>
                                <span class="order-id"><?php echo $row['order_ID']; ?></span>
                                <p class="order-status"><?php echo $row['order_status']; ?></p>
                            </div>
                            <span class="order-date"><?php echo $row['order_date'] . ' ' . $row['order_time']; ?></span>
                        </div>

                        <div class="order-details">

                            <?php
                            /**
                             * read ordered food
                             */
                            $sql = "SELECT O.order_ID, F.food_title, OFOOD.food_quantity FROM ((`orderedfood` OFOOD INNER JOIN `order` O ON O.order_ID = OFOOD.order_ID) INNER JOIN `food` F ON F.food_ID = OFOOD.food_ID) WHERE O.restaurant_ID = '$restaurantID' AND O.order_ID = ".$row['order_ID'];
                            // echo $sql;

                            $result_ordered_food = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                            while ($row_ordered_food = mysqli_fetch_assoc($result_ordered_food)) {

                                if ($row_ordered_food['order_ID'] == $row['order_ID']) {
                                    echo "<p>" . $row_ordered_food['food_title'] . "  x" . $row_ordered_food['food_quantity'] . "</p>";
                                }
                            } // close while
                            ?>
                        </div>

                        <br />

                        <!-- 
                                Total amount
                             -->
                        <p>Total: <span class="food-price"><?php echo ' ' . $row['total_amount']; ?></span></p>

                        <!-- 
                                update order status
                             -->
                        <div class="order-action">
                            <?php
                            $actionButton = '';
                            switch (strtolower($row['order_status'])) {
                                case 'ordered':
                                    echo '<a href="actions/update_order_status.php?id=' . $row['order_ID'] . '&status=cancelled"><button type="button" class="order-button cancel-order-button">Cancel</button></a>';
                                    $actionButton = 'preparing';
                                    break;
                                case 'preparing':
                                    echo '<a href="actions/update_order_status.php?id=' . $row['order_ID'] . '&status=cancelled"><button type="button" class="order-button cancel-order-button">Cancel</button></a>';
                                    $actionButton = 'prepared';
                                    break;
                                default:
                                    unset($actionButton);
                                    break;
                            }
                            if (isset($actionButton)) {
                                echo '<a href="actions/update_order_status.php?id=' . $row['order_ID'] . '&status=' . $actionButton . '"><button type="button" class="order-button complete-order-button">' . $actionButton . '</button></a>';
                            }
                            ?>
                        </div>
                    </div>
                <?php
                } // close while
                ?>
            </div>
        </div>
    </div>
</body>

</html>