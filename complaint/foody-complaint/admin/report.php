<?php
include("../connecttest.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <!-- icon library | font awesome -->
    <script src="https://kit.fontawesome.com/06b2bd9377.js" crossorigin="anonymous"></script>
    <script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin panel dashboard cards</title>
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../css/main.css">
    <link rel="stylesheet" href="../../css/report.css">


</head>

<body>
    <!-- title bar -->
    <div id="title-bar">
        <!-- foody logo -->
        <a id="foody-link" class="icon-link" href="../index.html">Foody</a>

        <!-- user profile -->
        <div>
            <a class="icon-link" href="#">
                Admin
                <i class="fa-solid fa-user"></i>
            </a>
        </div>
    </div>

    <!-- content -->
    <div id="content-wrapper">
        <!-- navigation bar (left side) -->
        <nav id="nav-bar">
            <ul>
                <li><a class="nav-link" href="#">Home</a></li>
                <li><a class="nav-link" href="viewcomplaint.php">Complaint Menu</a></li>
                <li><a class="nav-link active" href="#">Complaint Report</a></li>

            </ul>
        </nav>

        <!-- main content (right side) -->
        <div id="main-content">
            <a href="#">
                <div class="main-part">
                    <div class="cpanel">
                        <small>Complaint New Cases</small>
                        <?php
                        require '../connecttest.php';

                        $query = "SELECT * FROM complaintlist WHERE complaint_status='New' ";
                        $query_run = mysqli_query($conn, $query);
                        $row = mysqli_num_rows($query_run);

                        echo '<p>' . $row . '</p>';
                        ?>
                    </div>

            </a>

            <a href="#">
                <div class="cpanel cpanel-2">
                    <small>Complaint Cases In Investigation</small>
                    <?php
                    require '../connecttest.php';

                    $query = "SELECT * FROM complaintlist WHERE complaint_status='In Investigation' ";
                    $query_run = mysqli_query($conn, $query);
                    $row = mysqli_num_rows($query_run);

                    echo '<p>' . $row . '</p>';
                    ?>

                </div>
            </a>


            <a href="#">
                <div class="cpanel cpanel-3">
                    <small>Complaint Cases Resolved</small>
                    <?php
                    require '../connecttest.php';

                    $query = "SELECT * FROM complaintlist WHERE complaint_status='Resolved' ";
                    $query_run = mysqli_query($conn, $query);
                    $row = mysqli_num_rows($query_run);

                    echo '<p>' . $row . '</p>';
                    ?>
                </div>
            </a>

            <a href="#">
                <div class="cpanel cpanel-4">
                    <small>Total Number of Complaint Cases</small>
                    <?php
                    require '../connecttest.php';

                    $query = "SELECT complaint_id FROM complaintlist ORDER BY complaint_id";
                    $query_run = mysqli_query($conn, $query);
                    $row = mysqli_num_rows($query_run);

                    echo '<p>' . $row . '</p>';
                    ?>

                </div>


                <br><br><br><br><br>
        </div>


        </a>
        <div class="diagramCard">
            <div class="diagram"> <canvas id="myChart" style="max-width:500px;"></canvas> </div> <br><br><br>
            <div class="diagram"> <canvas id="myChart2" style="max-width:500px;"></canvas> </div>
        </div>



        <?php


        $query = "SELECT MONTHNAME(complaint_date) AS month, COUNT(complaint_id) AS complaintid FROM complaintlist GROUP BY MONTH(complaint_date) ORDER BY MONTH(complaint_date)";
        $query_run = mysqli_query($conn, $query);
        $row = mysqli_num_rows($query_run);
        $month = array();
        $complaintid = array();
        for ($i = 0; $i < $row; $i++) {
            while ($num_row = mysqli_fetch_array($query_run, 1)) {
                array_push($month, $num_row['month']);
                array_push($complaintid, $num_row['complaintid']);
            }
        }

        $querynew = "SELECT * from complaintlist WHERE complaint_status='New'";
        $query_run_new = mysqli_query($conn, $querynew);
        $new = mysqli_num_rows($query_run_new);
        $queryinvest = "SELECT * from complaintlist WHERE complaint_status='In Investigation'";
        $query_run_invest = mysqli_query($conn, $queryinvest);
        $invest = mysqli_num_rows($query_run_invest);
        $queryresolved = "SELECT * from complaintlist WHERE complaint_status='Resolved'";
        $query_run_resolved = mysqli_query($conn, $queryresolved);
        $resolved = mysqli_num_rows($query_run_resolved);



        ?>
        <script>
        var yValues = <?php echo json_encode($complaintid) ?>;
        var xValues = <?php echo json_encode($month) ?>;
        var xTypes = ["New", "In Investigation", "Resolved"];
        var yTypes = [<?php echo json_encode($new) ?>, <?php echo json_encode($invest) ?>,
            <?php echo json_encode($resolved) ?>
        ];


        var barColors = "#6C5A8A";

        new Chart("myChart", {
            type: "bar",
            data: {
                labels: xValues,
                datasets: [{

                    backgroundColor: barColors,
                    data: yValues
                }]
            },
            options: {
                legend: {
                    display: false
                },
                title: {
                    display: true,
                    text: "Total Complaint Cases of This Year"
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });



        new Chart("myChart2", {
            type: "bar",
            data: {
                labels: xTypes,
                datasets: [{

                    backgroundColor: barColors,
                    data: yTypes

                }]
            },
            options: {
                legend: {
                    display: false
                },
                title: {
                    display: true,
                    text: "Total Number Type of Complaint Cases"
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
        </script>




    </div>
    </div>

</body>

</html>