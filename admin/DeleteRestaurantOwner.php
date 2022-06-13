<?php
    include_once 'dbconnection.php';
    session_start();

    if(isset($_GET['viewid'])){
        $id = $_GET['viewid'];

        $query = "DELETE FROM restaurantowner WHERE ro_ID = '$id'";
        $result = mysqli_query($con, $query);

        if($result){
            echo 
            "
                <script>
                alert('Delete Success');
                window.location = 'UserList.php';
                </script>
            ";
        }else{
            echo 
            "
                <script>
                alert('Delete FAILED');
                </script>
            ";

            echo $con->error;
        }
    }
?>