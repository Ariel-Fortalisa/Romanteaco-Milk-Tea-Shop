<?php
    include("connection/connect.php");  //include connection file
    //error_reporting(0);  // using to hide undefine undex errors
    session_start(); //start temp session until logout/browser closed

    include("./checkLoginSession.php");
    include("./checkAdminSession.php");
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Sleek Dashboard - Free Bootstrap 4 Admin Dashboard Template and UI Kit. It is very powerful bootstrap admin dashboard, which allows you to build products like admin panels, content management systems and CRMs etc.">

    <title>Inventory Reports</title>
    
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

        .materialUsageList{
            max-height: 800px;
            overflow-y: auto
        }
        .materialUsageList ul{
            border: none;
        }
        .materialUsageList li{
            border-top: none;
            border-right: none;
            border-left: none;
        }


        #tablesDiv{
            max-height: 500px;
            overflow-y: auto;
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
            $subpage = "inv";
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
                <div class="content">
                    <div class="card card-default">
                        <div class="card-header card-header-border-bottom d-flex justify-content-between">
                            <h2>Inventory Reports</h2>
                            <a href="inventory_reports_print.php"><button class="btn" style="background-color: #76a004; color: #fff;"><i class="mdi mdi-printer"></i> Print</button></a>
                        </div>
                        <div class="card-body p-0">


                            <div class="row">
                                <div class="col col-sm-8">

                                    <!-- Row for Data Previews -->
                                    <?php
                                        //get the total number of items from inventory
                                        $materialCount = $db->query("SELECT COUNT(*) AS material_count FROM materials")->fetch_assoc()["material_count"];
                                        $flavorCount = $db->query("SELECT COUNT(*) AS flavor_count FROM flavorings")->fetch_assoc()["flavor_count"];
                                        $addonsCount = $db->query("SELECT COUNT(*) AS addons_count FROM add_ons1")->fetch_assoc()["addons_count"];
                                        $totalItemCount = $materialCount + $flavorCount + $addonsCount;

                                        //get the total value of inventory based on cost
                                        $materialCost = $db->query("SELECT SUM(cost * quantity) AS material_cost FROM materials")->fetch_assoc()["material_cost"];
                                        $flavorCost = $db->query("SELECT SUM(cost * quantity) AS flavor_cost FROM flavorings")->fetch_assoc()["flavor_cost"];
                                        $addonsCost = $db->query("SELECT SUM(cost * quantity) AS addons_cost FROM add_ons1")->fetch_assoc()["addons_cost"];
                                        $totalInvValue = $materialCost + $flavorCost + $addonsCost;

                                        //get the total number of expiring items in inventory
                                        $materialExpiring = $db->query("SELECT COUNT(*) AS material_expiring FROM materials WHERE expiration_status = 'NEARLY EXPIRED' OR expiration_status = 'EXPIRED'")->fetch_assoc()["material_expiring"];
                                        $flavorExpiring = $db->query("SELECT COUNT(*) AS flavor_expiring FROM flavorings WHERE expiration_status = 'NEARLY EXPIRED' OR expiration_status = 'EXPIRED'")->fetch_assoc()["flavor_expiring"];
                                        $addonsExpiring = $db->query("SELECT COUNT(*) AS addons_expiring FROM add_ons1 WHERE expiration_status = 'NEARLY EXPIRED' OR expiration_status = 'EXPIRED'")->fetch_assoc()["addons_expiring"];
                                        $totalExpiring = $materialExpiring + $flavorExpiring + $addonsExpiring;

                                        //get the total number of unavailable items
                                        $materialCritical = $db->query("SELECT COUNT(*) AS material_critical FROM materials WHERE status = 'unavailable'")->fetch_assoc()["material_critical"];
                                        $flavorCritical = $db->query("SELECT COUNT(*) AS flavor_critical FROM flavorings WHERE status = 'unavailable'")->fetch_assoc()["flavor_critical"];
                                        $addonsCritical = $db->query("SELECT COUNT(*) AS addons_critical FROM add_ons1 WHERE status = 'unavailable'")->fetch_assoc()["addons_critical"];
                                        $totalCritical = $materialCritical + $flavorCritical + $addonsCritical;
                                    ?>
                                    <div class="row p-3">
                                        <div class="col">
                                            <div class="media-body media-text-right p-3 border rounded shadow-md">
                                                <h3 class="mb-1">
                                                    <?=number_format($totalItemCount)?>
                                                </h3>
                                                <p class="m-b-0">Total Inventory Items</p>
                                                
                                                <img src="images/inventory_items.png" alt="" style="width: 100%; height: 5rem; margin-top: 1rem; object-fit: contain;">
                                    
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="media-body media-text-right p-3 border rounded shadow-md">
                                                <h3 class="mb-1">
                                                    ₱ <?=number_format($totalInvValue)?>
                                                </h3>
                                                <p class="m-b-0">Total Inventory Value</p>

                                                <img src="images/cost.png" alt="" style="width: 100%; height: 5rem; margin-top: 1rem; object-fit: contain;">

                                            </div>
                                        </div>
                                        
                                        <div class="col">
                                            <div class="media-body media-text-right p-3 border rounded shadow-md">
                                                <h3 class="mb-1">
                                                    <?=number_format($totalExpiring)?>
                                                </h3>
                                                <p class="m-b-0">Expiring<br>Items</p>

                                                <img src="images/expiring.png" alt="" style="width: 100%; height: 5rem; margin-top: 1rem; object-fit: contain;">

                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="media-body media-text-right p-3 border rounded shadow-md">
                                                <h3 class="mb-1">
                                                    <?=number_format($totalCritical)?>
                                                </h3>
                                                <p class="m-b-0">Unavailable<br>Items</p>

                                                <img src="images/out-of-stock.png" alt="" style="width: 100%; height: 5rem; margin-top: 1rem; object-fit: contain;">

                                            </div>
                                        </div>

                                    </div>

                                    <!--Row for table filtering-->
                                    <div class="row p-3">
                                        <div class="col-4">
                                            <select id="itemType" class="form-control">
                                                <option value="1">Materials</option>
                                                <option value="2">Flavors</option>
                                                <option value="3">Addons</option>
                                            </select>
                                        </div>
                                    </div>
                                    <hr>
                                    <!--Div for items table-->
                                    <div id="tablesDiv" class="row p-4">
                                        
                                    </div>

                                </div>

                                <div class="col col-sm-4 pl-0 border-left">
                                    <h4 class="p-3 border-bottom text-dark" style="background-color: #e4eccd">Materials Usage Today</h4>
                                    <div class="materialUsageList">
                                        <ul class="list-group">
                                            
                                            <?php
                                                $result = $db->query("
                                                    SELECT SUM(mu.qty) AS qty, mt.material_name, ol.order_id, ol.date, ol.time
                                                    FROM material_usage mu
                                                        INNER JOIN materials mt ON mu.material_id = mt.material_id
                                                        INNER JOIN order_item oi ON mu.order_item_id = oi.id
                                                        INNER JOIN order_list ol ON oi.order_id = ol.order_id
                                                    WHERE ol.date = '".date("Y-m-d")."'
                                                    GROUP BY mu.material_id
                                                    ORDER BY date DESC, time DESC, mt.material_name ASC
                                                ");

                                                if($result->num_rows > 0){
                                                    while($row = $result->fetch_assoc()){
                                                        echo '
                                                            <li class="list-group-item">
                                                                <div class="row p-0">
                                                                    <div class="col-5">'.$row["material_name"].'</div>
                                                                    <div class="col-3 text-danger text-right">'.$row["qty"].' pcs</div>
                                                                    <div class="col-4 text-right">
                                                                        <small class="text-muted">#'.$row["order_id"].'</small><br>
                                                                        <small class="text-muted">'.date("h:i a", strtotime($row["time"])).'</small>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        ';
                                                        
                                                    }
                                                }
                                                else{
                                                    echo '
                                                        <li class="list-group-item">There are no used materials</li>
                                                    ';
                                                }
                                            ?>
                                        </ul>
                                    </div>
                                    
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    
                </div>
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

    <!-- 
    <script type="module">
        import 'https://cdn.jsdelivr.net/npm/@pwabuilder/pwaupdate';

        const el = document.createElement('pwa-update');
        document.body.appendChild(el);
    </script>
    -->

    <!-- Javascript -->
    <script src="https://kit.fontawesome.com/193997d5c5.js" crossorigin="anonymous"></script>
    <script src="assets/plugins/jquery/jquery.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
 


    <script src='assets/plugins/data-tables/jquery.datatables.min.js'></script>
    <script src='assets/plugins/data-tables/datatables.bootstrap4.min.js'></script>

    <script src="assets/js/sleek.js"></script>
</body>
</html>


<script>
    function getInventoryTable(itemType){
        $.post(
            "ajax-invReportsTable.php", 
            {type: itemType},
            function(data){
                $("#tablesDiv").html(data);
            }
        );
    }

    $("#itemType").change(function(){
        var itemType = $(this).val();
        getInventoryTable(itemType)
    });

    getInventoryTable(1);
</script>

