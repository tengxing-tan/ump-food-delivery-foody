<?php

include ("connecttest.php");

$output = '';
//collect

if(isset($_POST['search'])) {

    $searchq = $_POST['search'];
    $searchq = preg_replace("#[^0-9a-z]#i","",$searchq);

    $query = "SELECT * FROM complaintlist WHERE complaint_type LIKE '%$searchq%'";

    $query_run = mysqli_query($conn,$query);
    $count = mysqli_num_rows($query_run);

    if($count ==0){
        $output ='There was no search results!';
    }
    else{
        while($row = mysqli_fetch_array($query_run)){
            $complaint_type = $row['complaint_type'];
            $complaint_comment = $row['complaint_comment'];

            $output .= '<div>' .$complaint_type. '<br>' .$complaint_comment. '</div><br>'; 
        }
    }

}


?>


<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel='stylesheet' href='css/complaintlistmain.css'>
    <link rel='stylesheet' href='css/main.css' type='text/css' />
    <script src="https://kit.fontawesome.com/06b2bd9377.js" crossorigin="anonymous"></script>
    <title>Search</title>
</head>

<body>

    <div id="title-bar">
        <!-- foody logo -->
        <a id="foody-link" class="icon-link" href="#index.html">Foody</a>

        <!-- user profile -->
        <div>
            <a class="icon-link" href="#">
                User
                <i class="fa-solid fa-user"></i>
            </a>
        </div>
    </div>


    <div id="content-wrapper">
        <!-- navigation bar (left side) -->
        <nav id="nav-bar">
            <ul>
            <li><a class="nav-link" href="../../../user/View/index.php">Home</a></li>
                <li><a class="nav-link" href="../../../user/View/expenses-list/index.php">Expenses List</a></li>
                <li><a class="nav-link" href="../../../user/View/calculate-average-expenses/index.php">Calculate Average Expenses</a></li>
                <li><a class="nav-link active" href="complaintlistmain.php">Complaint List</a></li>
            </ul>
        </nav>


        <div id='main-content'>
            <form class='form' action='searchtype.php' method="post">


                <button class='btn' type='submit' name='search' style='margin-right: 2rem;'>Search</button>

                <input id='search-bar' type="text" name="search" placeholder="Search for Complaint Type">



            </form>

            <?php print("$output");?>

        </div>
    </div>

</body>

</html>