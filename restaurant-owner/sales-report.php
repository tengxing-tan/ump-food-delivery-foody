<!DOCTYPE html>
<?php
/* session */
session_start();

// read data for charts
include 'actions/read_insight_info.php';
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foody | UMP Food Delivery System</title>

    <!-- external stylesheet -->
    <link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="styles/restaurant_owner.css">
    <link rel="stylesheet" href="styles/report.css">

    <!-- javascript -->
    <script src="scripts/RestaurantOwner.js" charset="utf-8"></script>
    <!-- qr code generator -->
    <script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>

    <!-- js chart -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.8.0/dist/chart.min.js"></script>

    <!-- icon library | font awesome -->
    <script src="https://kit.fontawesome.com/06b2bd9377.js" crossorigin="anonymous"></script>

    <script type="text/javascript">
        function init() {
            const barColors = "#6C5A8A";
            /**
             * Chart payment last month
             */
            const xPaymentLastMonth = ["Week 1", "Week 2", "Week 3", "Week 4"];
            const yPaymentLastMonth = <?php echo json_encode($sum) ?>;
            document.getElementById('maxPayment').innerHTML = Math.max(...yPaymentLastMonth);
            document.getElementById('minPayment').innerHTML = Math.min(...yPaymentLastMonth);
            chartPaymentLastMonth();

            /**
             * Chart Total Order
             */
            const xTotalOrder = <?php echo json_encode($orderDate); ?>;
            const yTotalOrder = <?php echo json_encode($totalOrder); ?>;
            // console.log(yTotalOrder);
            chartTotalOrder();

            /**
             * Chart Acummalated payment since join foody
             */
            const xAccumPay = <?php echo json_encode($year); ?>;
            let yAccumPay = <?php echo json_encode($accumPay); ?>.map(x => parseInt(x));
            yAccumPay = yAccumPay.map((x, i, arr) => ((i === 0) ? x : x + arr[i - 1]));

            chartAccumPay();

            /**
             * Chart payment last month
             */
            function chartPaymentLastMonth() {
                new Chart("chartPaymentLastMonth", {
                    type: "bar",
                    data: {
                        labels: xPaymentLastMonth,
                        datasets: [{
                            backgroundColor: barColors,
                            data: yPaymentLastMonth
                        }]
                    },
                    options: {
                        plugins: {
                            legend: {
                                display: false
                            }
                        },
                        title: {
                            display: false,
                            text: "Collected Payment Last Month"
                        },
                        scales: {
                            x: {
                                display: true,
                                title: {
                                    display: true,
                                    text: 'Week',
                                }
                            },
                            y: {
                                beginAtZero: true,
                                title: {
                                    display: true,
                                    text: 'RM',
                                }
                            }
                        }
                    }
                });
            }

            /**
             * Chart Total Order
             */
            function chartTotalOrder() {
                new Chart("chartTotalOrder", {
                    type: "line",
                    data: {
                        labels: xTotalOrder,
                        datasets: [{
                            fill: true,
                            backgroundColor: '#5C4F711A',
                            borderColor: barColors,
                            data: yTotalOrder
                        }]
                    },
                    options: {
                        plugins: {
                            legend: {
                                display: false
                            }
                        },
                        title: {
                            display: false,
                            text: "Number Of Orders Last Month"
                        },
                        scales: {
                            x: {
                                title: {
                                    display: true,
                                    text: 'Date',
                                }
                            },
                            y: {
                                beginAtZero: true,
                                title: {
                                    display: true,
                                    text: 'Number of orders',
                                }
                            }
                        }
                    }
                });
            }
            /**
             * Chart Acummalated payment since join foody
             */
            function chartAccumPay() {
                new Chart("chartAccumPay", {
                    type: 'bar',
                    data: {
                        labels: xAccumPay,
                        datasets: [{
                            data: yAccumPay,
                            backgroundColor: barColors
                        }]
                    },
                    options: {
                        plugins: {
                            legend: {
                                display: false
                            }
                        },
                        responsive: true,
                        scales: {
                            x: {
                                title: {
                                    display: true,
                                    text: 'Year',
                                }
                            },
                            y: {
                                beginAtZero: true,
                                title: {
                                    display: true,
                                    text: 'RM',
                                }
                            }
                        }
                    }
                });
            }
        }
    </script>
</head>

<body onload="init(); activeNav('5')">
    <header>
        <?php include 'assets/reusable/header.php'; ?>
    </header>

    <!-- content -->
    <div id="content-wrapper">
        <?php include 'assets/reusable/navbar.php'; ?>

        <!-- main content (right side) -->
        <div id="main-content">
        <div class="white-card">
            <!-- 
                QR code
             -->
                <div id="QRCode"></div>
                <p style="margin-top: 1rem; font-weight: bold; color: var(--primary-bg);">View in mobile phone</p>
                <script type="text/javascript">
                    var qrcode = new QRCode(document.getElementById("QRCode"), {
                        text: "https://foody-g1-1b-2122.herokuapp.com/restaurant-owner/view-charts.php?id=<?php echo $restaurantID; ?>",
                        width: 128,
                        height: 128,
                        colorDark: "#6C5A8A",
                        colorLight: "#ffffff",
                        correctLevel: QRCode.CorrectLevel.H
                    });
                </script>
            </div>
            <!-- 
                Last payment (lowest and highest)
            -->
            <div class="white-card">
                <h3 style="margin-bottom: 2.5rem;">Collected Payment Last Month</h3>
                <canvas id="chartPaymentLastMonth" style="width:100%;max-width:700px"></canvas>

                <div style="width: 100%; display: flex; flex-direction: column; justify-content: start;">
                    <p style="margin-top: 1rem;">Highest : RM <span id="maxPayment"></span></p>
                    <p style="margin-top: 0.25em;">Lowest : RM <span id="minPayment"></span></p>
                </div>
            </div>

            <!-- 
                Total order
            -->
            <div class="white-card">
                <h3 style="margin-bottom: 2.5rem;">Number Of Orders Last Month</h3>
                <canvas id="chartTotalOrder" style="width:100%;max-width:700px"></canvas>
            </div>

            <!-- 
                Accumulated payment
            -->
            <div class="white-card">
                <h3 style="margin-bottom: 2.5rem;">Accumalated Received Payment Since Joined Foody</h3>
                <canvas id="chartAccumPay" style="width:100%;max-width:700px"></canvas>
            </div>

        </div>
    </div>
</body>

</html>