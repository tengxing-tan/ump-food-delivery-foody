<!-- title bar -->
<div id="title-bar">
    <!-- foody logo -->
    <a id="foody-link" class="icon-link" href="index.php">Foody</a>

    <!-- user profile -->
    <div>
        <a class="icon-link" href="restaurant-owner-profile.php">
            <?php
            session_start();
            $roID = $_SESSION['roID'];
            $roNameHeader = mysqli_query($conn, "SELECT `ro_name` FROM `restaurantowner` WHERE `ro_ID` = $roID");
            echo mysqli_fetch_row($roNameHeader)[0];
            ?>
            <i class="fa-solid fa-user"></i>
        </a>
    </div>
</div>