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
include 'actions/read_ro_profile.php';
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foody | UMP Food Delivery System</title>

    <!-- external stylesheet -->
    <link rel="stylesheet" href="../styles/main.css">
    <link rel="stylesheet" href="styles/ro_profile.css">
    <!-- javascript -->
    <script src="scripts/MenuList.js" charset="utf-8"></script>
    <!-- icon library | font awesome -->
    <script src="https://kit.fontawesome.com/06b2bd9377.js" crossorigin="anonymous"></script>
</head>

<body onload="init()">
    <header>
        <?php include 'assets/reusable/header.php'; ?>
    </header>

    <!-- content -->
    <div id="content-wrapper">
        <?php include 'assets/reusable/navbar.php'; ?>

        <!-- main content (right side) -->
        <div id="main-content">

            <!-- main content (right side) -->
            <div id="main-content">
                <div id="riderInfo">
                    <h3>Restaurant Owner Profile</h3>
                    <ul>
                        <?php

                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "
                        <li>Name <p>:</p><p>" . $row['ro_name'] . "</p></li>
                        <li>Email Address <p>:</p><p>" . $row['ro_email'] . "</p></li>
                        <li>Phone No <p>:</p><p>" . $row['ro_phoneNum'] . "</p></li>
                        <li>Address <p>:</p><p>" . $row['ro_address'] . "</p></li> ";
                            }
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</body>

</html>