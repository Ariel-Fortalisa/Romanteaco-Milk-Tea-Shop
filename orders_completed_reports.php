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
            $subpage = "comp";
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
                <form action="./orders_completed_reports_print.php" method="get">
                    <div class="content">
                        <div class="row">
                            <div class="col-12">
                                <div class="card card-default">
                                    <div class="card-header card-header-border-bottom d-flex justify-content-between">
                                        <h2>Completed Orders</h2>
                                        <button type="submit" class="btn" style="background-color: #76a004; color: #fff;"><i class="mdi mdi-printer"></i> Print</button>
                                    </div>
                                    <div class="card-body">
                                        <div class="row mb-5">
                                            <div class="col">
                                                <label for="paymentMethod">Payment Method:</label>
                                                <select class="form-control" name="paymentMethod" id="paymentMethod">
                                                    <option value="ALL">All</option>
                                                    <option value="CASH">Cash</option>
                                                    <option value="GCASH">GCash</option>
                                                </select>
                                            </div>
                                            <div class="col">
                                                <label for="startDateFilter">From:</label>
                                                <input type="date" class="dateInput form-control" name="startDate" id="startDateFilter">
                                            </div>
                                            <div class="col">
                                                <label for="endDateFilter">To:</label>
                                                <input type="date" class="dateInput form-control" name="endDate" id="endDateFilter">
                                            </div>
                                            <div class="col d-flex align-items-end">
                                                <label for="">&emsp;</label><br>
                                                <button type="button" onclick="filterTable()" class="btn btn-primary mx-2">Apply Filter</button>
                                                <button type="button" onclick="resetTable()" class="btn btn-secondary mx-2">Reset</button>
                                            </div>
                                        </div>
                                        
                                        <table class="table" id="orderTable">
                                            <thead class="th" style="background-color: #e4eccd">
                                                <th class="text-center" scope="col" style="color:#1b223c">#</th>
                                                <th class="text-center" scope="col" style="color:#1b223c">USERNAME</th>
                                                <th class="text-center" scope="col" style="color:#1b223c">DINING OPT.</th>
                                                <th class="text-center" scope="col" style="color:#1b223c">ITEMS</th>
                                                <th class="text-center" scope="col" style="color:#1b223c">METHOD</th>
                                                <th class="text-center" scope="col" style="color:#1b223c">DATE</th>
                                                <th class="text-center" scope="col" style="color:#1b223c">TIME</th>
                                                <th class="text-center" scope="col" style="color:#1b223c">TOTAL</th>
                                            </thead>
                                            <tbody>
                                            
                                            </tbody>
                                        </table>

                                        
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
    getReportsTable('ALL', '', '');

    function getReportsTable(paymentMethod, start, end){
        $.post("./orders_complete_printAjax.php",
            {payment: paymentMethod, start_date: start, end_date: end},
            function(data){
                $("#orderTable tbody").html(data);
            }
        );
    }

    function filterTable() {
        var paymentMethod = $('#paymentMethod').val();
        var startDate = $('#startDateFilter').val();
        var endDate = $('#endDateFilter').val();
        //$('#header').html(`List of Completed Orders During ${startDate} To ${endDate}`);
        getReportsTable(paymentMethod, startDate, endDate);
    }



    function resetTable() {
        $('#paymentMethod').val('ALL');
        $('#startDateFilter').val('');
        $('#endDateFilter').val('');
        getReportsTable('ALL', '', '');
    }
</script>

