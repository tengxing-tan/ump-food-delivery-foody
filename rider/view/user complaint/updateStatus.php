<?php 
     include '../connectDB.php';

         $i = $_GET["i"];

         $check = "SELECT feedback_info FROM feedback WHERE complaint_ID = '$i'";
         $result = mysqli_query($link, $check);

         $data = mysqli_fetch_assoc($result);

         if($data['feedback_info'] == "")
         {
            header("Location:complaint.php");
            exit();       
         }
         else{
             $upd = "UPDATE feedback SET feedback_status = 'Resolved' WHERE complaint_ID = '$i'";
              mysqli_query($link, $upd);
              header("Location:complaint.php");
            exit();                  
         }
                                          
            mysqli_close($link);
?>