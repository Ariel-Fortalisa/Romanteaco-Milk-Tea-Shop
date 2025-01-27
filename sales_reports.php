<?php
    include("connection/connect.php");  //include connection file
    //error_reporting(0);  // using to hide undefine undex errors
    session_start(); //start temp session until logout/browser closed

    include("./checkLoginSession.php");
    include("./checkAdminSession.php");

    date_default_timezone_set('Asia/Manila');
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Sleek Dashboard - Free Bootstrap 4 Admin Dashboard Template and UI Kit. It is very powerful bootstrap admin dashboard, which allows you to build products like admin panels, content management systems and CRMs etc.">

    <title>Sales Reports</title>
    
    <!-- GOOGLE FONTS -->

    <link href="https://cdn.materialdesignicons.com/4.4.95/css/materialdesignicons.min.css" rel="stylesheet" />

    <!-- PLUGINS CSS STYLE -->
    <link href="assets/plugins/nprogress/nprogress.css" rel="stylesheet" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="animations.css">
    
    <link href='assets/plugins/data-tables/datatables.bootstrap4.min.css' rel='stylesheet'>
    
    <link href='assets/plugins/data-tables/jquery.datatables.min.css' rel='stylesheet'>

    <!-- SLEEK CSS -->
    <link id="sleek-css" rel="stylesheet" href="assets/css/sleek.css" />

    <!-- FAVICON -->
    <link href="assets/img/favicon.png" rel="shortcut icon" />

    <!--
    HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries
    -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="assets/plugins/nprogress/nprogress.js"></script>

    
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


    <!-- Javascript -->
    <script src="https://kit.fontawesome.com/193997d5c5.js" crossorigin="anonymous"></script>
    <script src="assets/plugins/jquery/jquery.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
 
    <script src="assets/js/sleek.js"></script>
    <style>
        .matcha-background {
            color: #1b223c;
        }
        #tuko{
            border: none;
            
        }
        #tukos{
            border: none;
            font-weight: normal;
            color: gray;
        }
        #searchmoto{
            margin-top: 20px;
            width: 200px;
        }
        .th{
            color: #495057;
        }
        .content{
            animation: transitionIn-Y-bottom 1s;
        }
    </style>
</head>

<body class="header-fixed sidebar-fixed sidebar-dark header-light" id="body">
    <script>
        NProgress.configure({ showSpinner: false });
        NProgress.start();
    </script>

    <!-- WRAPPER -->
    <div class="wrapper">
        <!-- Github Link -->
        <defs>
            <linearGradient id="grad1" x1="0%" y1="75%" x2="100%" y2="0%">
                <stop offset="0%" style="stop-color:#896def;stop-opacity:1" />
                <stop offset="100%" style="stop-color:#482271;stop-opacity:1" />
            </linearGradient>
        </defs>

        <!-- LEFT SIDEBAR WITH OUT FOOTER -->
        <?php
            $page = "report1";
            $subpage = "sales";
            include("./sidebar.php");
        ?>
        <!-- PAGE WRAPPER -->
        <div class="page-wrapper">
            <!-- Header -->
            <header class="main-header " id="header">
                <nav class="navbar navbar-static-top navbar-expand-lg">
                    <!-- Sidebar toggle button -->
                    <button id="sidebar-toggler" class="sidebar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                    </button>
                    <!-- search form -->
                    <div class="search-form d-none d-lg-inline-block">
                        
                    </div>

                    <div class="navbar-right ">
                        <ul class="nav navbar-nav">
                    
                            <!-- User Account -->
                        
                            <li class="dropdown user-menu">
                                <button href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                                    <?php
                                        $query = "SELECT * FROM admin_user";
                                        $result = mysqli_query($db, $query);

                                        // Check if the query was successful
                                        if ($result) {
                                            // Fetch data into an associative array
                                            $userData = mysqli_fetch_assoc($result);

                                            // Check if there is a valid image URL in the database
                                            if (!empty($userData['image'])) {
                                                $imageURL = $userData['image'];
                                                echo '<img src="' . $imageURL . '" alt="User Image" style="height: 43px; width: 43px; border-radius: 50%;">';
                                            } else {
                                                echo 'No image found.';
                                            }

                                            // Display the user's first name and last name
                                            echo '<span class="d-none d-lg-inline-block">' . $userData['fname'] . ' ' . $userData['lname'] . '</span>';

                                            // Remember to free the result set
                                            mysqli_free_result($result);
                                        } else {
                                            echo 'Database query failed.';
                                        }
                                    ?>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <!-- User image and name -->
                                    <li class="dropdown-header">
                                        <?php
                                            // Display the user's image again
                                            if (!empty($userData['image'])) {
                                                echo '<img src="' . $imageURL . '" alt="User Image" style="height: 50px; width: 50px; border-radius: 50%;">';
                                            } else {
                                                echo 'No image found.';
                                            }
                                        ?>
                                        <div class="d-inline-block">
                                            <?php
                                            // Display the user's first name and last name
                                            echo $userData['fname'] . ' ' . $userData['lname'];
                                            ?>
                                            <small class="pt-1"><?php echo $userData['email']; ?></small>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="user-profile.php">
                                            <i class="mdi mdi-account"></i> My Profile
                                        </a>
                                    </li>
                                    <li class="dropdown-footer">
                                        <a href="admin-dashboard.php"> <i class="mdi mdi-logout"></i> Log Out </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>

          
            <!-- CONTENT WRAPPER -->
            <div class="content-wrapper">

                <!--Content Goes Here-->
                <form action="./sales_reports_print.php" method="get">
                    <div class="content">
                        <div class="row">
                            <div class="col-12">
                                <div class="card card-default">
                                    <div class="card-header card-header-border-bottom d-flex justify-content-between">
                                        <h2>Sales Reports</h2>
                                        <button type="submit" class="btn" style="background-color: #76a004; color: #fff;"><i class="mdi mdi-printer"></i> Print</button>
                                    </div>
                                    <div class="card-body">
                                        
                                        <div class="row">
                                            <div class="col col-sm-8">

                                                <!-- Row for Data Previews -->
                                                <?php
                                                    //get the total number of items from inventory
                                                    $totalSales = $db->query("SELECT SUM(total) AS total_sales FROM order_list WHERE status = 4")->fetch_assoc()["total_sales"];
                                                    $ongoingOrders = $db->query("SELECT COUNT(*) AS ongoing_count FROM order_list WHERE status != 4")->fetch_assoc()["ongoing_count"];
                                                    $completedOrders = $db->query("SELECT COUNT(*) AS completed_count FROM order_list WHERE status = 4")->fetch_assoc()["completed_count"];
                                                ?>
                                                <div class="row px-3">
                                                    <div class="col">
                                                        <div class="media-body media-text-right p-3 border rounded shadow-md">
                                                            <h3 class="mb-1">
                                                                ₱ <?=number_format($totalSales, 2)?>
                                                            </h3>
                                                            <p class="m-b-0">Total Sales</p>
                                                            
                                                            <img src="images/sales.png" alt="" style="width: 100%; height: 5rem; margin-top: 1rem; object-fit: contain;">
                                                
                                                        </div>
                                                    </div>

                                                    <div class="col">
                                                        <div class="media-body media-text-right p-3 border rounded shadow-md">
                                                            <h3 class="mb-1">
                                                                <?=number_format($ongoingOrders)?>
                                                            </h3>
                                                            <p class="m-b-0">In-Progress Orders</p>

                                                            <img src="images/in-progress.png" alt="" style="width: 100%; height: 5rem; margin-top: 1rem; object-fit: contain;">

                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col">
                                                        <div class="media-body media-text-right p-3 border rounded shadow-md">
                                                            <h3 class="mb-1">
                                                                <?=number_format($completedOrders)?>
                                                            </h3>
                                                            <p class="m-b-0">Completed Orders</p>

                                                            <img src="images/completed.png" alt="" style="width: 100%; height: 5rem; margin-top: 1rem; object-fit: contain;">

                                                        </div>
                                                    </div>

                                                </div>

                                                <!--Row for table filtering-->
                                                <div class="row p-3 w-75">
                                                    <div class="col-4">
                                                        <select class="form-control" id="chartType" name="salesType" onchange="generateSalesChartData('replace')">
                                                            <option value="Daily">Daily</option>
                                                            <option value="Weekly">Weekly</option>
                                                            <option value="Monthly">Monthly</option>
                                                            <option value="Yearly">Yearly</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-4">
                                                        <select class="form-control" id="year" name="year" onchange="generateSalesChartData('replace')">
                                                            <?php
                                                                $minYear = $db->query("SELECT YEAR(MIN(date)) AS min_year FROM order_list")->fetch_assoc()["min_year"];
                                                                for($x = $minYear; $x <= date("Y"); $x++){
                                                                    echo '<option value="'.$x.'">'.$x.'</option>';
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-4">
                                                        <select class="form-control" id="month"  name="month" onchange="generateSalesChartData('replace')">
                                                            <option value="1">Jan</option>
                                                            <option value="2">Feb</option>
                                                            <option value="3">Mar</option>
                                                            <option value="4">Apr</option>
                                                            <option value="5">May</option>
                                                            <option value="6">Jun</option>
                                                            <option value="7">Jul</option>
                                                            <option value="8">Aug</option>
                                                            <option value="9">Sep</option>
                                                            <option value="10">Oct</option>
                                                            <option value="11">Nov</option>
                                                            <option value="12">Dec</option>
                                                        </select>
                                                    </div>
                                                    
                                                </div>
                                                <hr>
                                                <!--Div for charts-->
                                                <div id="chartsDiv" class="row" style="height: 330px; width: 100%; margin-bottom: 50px">
                                                    <h5 id="chartHeader">Daily Sales</h5>
                                                    <canvas id="myChart"></canvas>
                                                </div>

                                            </div>

                                            <div class="col col-sm-4 pl-0 border-left">
                                                <h4 class="p-3 border-bottom text-dark" style="background-color: #e4eccd">Top Selling Products</h4>
                                                <div class="materialUsageList">
                                                        
                                                    <?php
                                                        $result = $db->query("
                                                            SELECT p.product_name, SUM(oi.subtotal) AS subtotal
                                                            FROM order_item oi
                                                                INNER JOIN product p ON oi.product_id = p.product_id
                                                                INNER JOIN order_list ol ON oi.order_id = ol.order_id
                                                            WHERE ol.status = 4
                                                            GROUP BY oi.product_id
                                                            ORDER BY subtotal DESC
                                                            LIMIT 10
                                                        ");

                                                        $prdLabel = array();
                                                        $prdSales = array();

                                                        while($row = $result->fetch_assoc()){
                                                            array_push($prdLabel, $row["product_name"]);
                                                            array_push($prdSales, $row["subtotal"]);
                                                        }
                                                        
                                                    ?>
                                                    <canvas class="p-2" id="topChart" style="height: 600px"></canvas>
                                                </div>
                                                
                                            </div>
                                        </div>

                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </form>
            </div> 
            <!-- End Content Wrapper -->
    

            <!-- Footer -->
            <footer class="footer mt-auto">
                <div class="copyright bg-white">
       
                </div>
                <script>
                    var d = new Date();
                    var year = d.getFullYear();
                    document.getElementById("copy-year").innerHTML = year;
                </script>
            </footer>

        </div>
        <!-- End Page Wrapper -->
    </div>
    <!-- End Wrapper -->

    <div id="sDiv">
        
    </div>


</body>
</html>


<script>
    $("#month").val(<?=date("m")?>);
    $("#year").val(<?=date("Y")?>);

    generateSalesChartData('apply');

    function generateSalesChartData(mode){
        var type = $("#chartType").val();
        var y = $("#year").val();
        var m = $("#month").val();
        $.post("./ajax-salesReport.php", 
            {
                method: mode,
                salesType: type,
                year: y,
                month: m
            }, 
            function(data) {
                $("#sDiv").html(data);
                console.log(data);
            }
        
        );
    }

    $("#chartType").change(function(){
        var type = $(this).val();
        if(type === "Monthly"){
            $("#month").attr("readonly", true);
            $("#year").attr("readonly", false);

            $("#month").css("display", "none");
            $("#year").css("display", "block");
        } else if(type === "Yearly"){
            $("#month").attr("readonly", true);
            $("#year").attr("readonly", true);

            $("#month").css("display", "none");
            $("#year").css("display", "none");
        }
        else{
            $("#month").attr("readonly", false);
            $("#year").attr("readonly", false);

            $("#month").css("display", "block");
            $("#year").css("display", "block");
        }
    });



    var tCtx = document.getElementById('topChart');

    var topChart = new Chart(tCtx, {
    type: 'doughnut',
    data: {
        labels: <?=json_encode($prdLabel)?>,
        datasets: [{
        label: 'Total Product Sales',
        data: <?=json_encode($prdSales)?>,
        borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                position: 'bottom',
                align: 'start',
                labels: {
                    font: {
                        size: 20
                    }
                },
            }
        },
        layout: {
            padding: 20
        }
    }
    });
</script>

