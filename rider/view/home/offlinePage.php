<?php 
session_start();

     include '../connectDB.php';

         $i = $_SESSION["order"];

             $upd = "UPDATE `order` SET order_status = 'Prepared', rider_ID = NULL WHERE `order_ID` = '$i'";
              mysqli_query($link, $upd);
            
              
                 header("Location:mainPage.php");
                 exit();       
    
?>