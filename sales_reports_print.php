<?php
    include("connection/connect.php");  //include connection file
    //error_reporting(0);  // using to hide undefine undex errors
    session_start(); //start temp session until logout/browser closed

    include("./checkLoginSession.php");
    include("./checkAdminSession.php");

    //system_settings
    $logo = $db->query("SELECT `logo` FROM `system_settings`")->fetch_assoc()["logo"]; 
    $storeName = $db->query("SELECT `store_name` FROM `system_settings`")->fetch_assoc()["store_name"];
    $contact = $db->query("SELECT `contact_number` FROM `system_settings`")->fetch_assoc()["contact_number"]; 
    $address = $db->query("SELECT `address` FROM `system_settings`")->fetch_assoc()["address"];
    $email = $db->query("SELECT `email` FROM `system_settings`")->fetch_assoc()["email"];
    $fname = $db->query("SELECT `fname` FROM `admin_user`")->fetch_assoc()["fname"];
    $lname = $db->query("SELECT `lname` FROM `admin_user`")->fetch_assoc()["lname"];
?>


<?php
    $type = $_GET["salesType"];
    $year = $_GET["year"];
    $month = $_GET["month"];

    //overview data
    $totalSales = 0;
    $totalTransactions = 0;



    //charts data
    $label = array();
    $data = array();
    $data2 = array();

    $chartHeader = "";


    if($type == "Daily"){
        $maxDate = ($year == (int)date("Y") and $month == (int)date("m")) ? (int)date("d") : (int)date("t", strtotime("$year-$month-01"));
        
        for($x = 1; $x <= $maxDate; $x++){
            $date = date("M d Y", strtotime("$year-$month-$x"));

            $result = $db->query("
                SELECT SUM(`total`) AS `total`, COUNT(*) AS `order_count`
                FROM `order_list`
                WHERE YEAR(`date`) = '$year' AND MONTH(`date`) = '$month' AND DAY(`date`) = $x AND `status`='4'
            ");

            $total = 0;
            $orders = 0;
            while($row = $result->fetch_assoc()){
                $total += $row["total"];
                $orders += $row["order_count"];
            }
            array_push($data, $total);
            array_push($data2, $orders);
            array_push($label, $date);
            
    
        }
        

        $chartHeader = "Daily Sales During ".date("F Y", strtotime("$year-$month-01"));
    }
    elseif($type == "Weekly"){
        $days = array(0, 7, 14, 21, 28);
        
        for($x = 0; $x < 4; $x++){
            $date = "Week ".$x+1;

            $result = $db->query("
                SELECT SUM(`total`) AS `total`, COUNT(*) AS `order_count`
                FROM `order_list`
                WHERE YEAR(`date`) = '$year' AND MONTH(`date`) = '$month' AND DAY(`date`) BETWEEN ".($days[$x]+1)." AND ".($days[$x+1])." AND `status`='4'
            ");

            $total = 0;
            $orders = 0;
            while($row = $result->fetch_assoc()){
                $total += $row["total"];
                $orders += $row["order_count"];
            }
            array_push($data, $total);
            array_push($data2, $orders);
            array_push($label, $date);
    
        }

        $chartHeader = "Weekly Sales During ".date("F Y", strtotime("$year-$month-01"));
    }
    elseif($type == "Monthly"){
        $maxDate = $year === (int)date("Y") ? (int)date("m") : 12;
        
        for($x = 1; $x <= $maxDate; $x++){
            $date = date("M Y", strtotime("$year-$x-01"));

            $result = $db->query("
                SELECT SUM(`total`) AS `total`, COUNT(*) AS `order_count`
                FROM `order_list`
                WHERE YEAR(`date`) = '$year' AND MONTH(`date`) = $x AND `status`='4'
            ");

            $total = 0;
            $orders = 0;
            while($row = $result->fetch_assoc()){
                $total += $row["total"];
                $orders += $row["order_count"];
            }
            array_push($data, $total);
            array_push($data2, $orders);
            array_push($label, $date);
    
        }

        $chartHeader = "Monthly Sales During ".date("Y", strtotime("$year-$month-01"));
    }
    elseif($type == "Yearly"){
        $minYear = $db->query("SELECT YEAR(MIN(date)) AS min_year FROM order_list")->fetch_assoc()["min_year"];
        $maxDate  = $db->query("SELECT YEAR(MAX(date)) AS max_year FROM order_list")->fetch_assoc()["max_year"];
        for($x = $minYear; $x <= $maxDate; $x++){
            $date = date("Y", strtotime("$x-01-01"));

            $result = $db->query("
                SELECT SUM(`total`) AS `total`, COUNT(*) AS `order_count`
                FROM `order_list`
                WHERE YEAR(`date`) = '$x' AND `status` = 4
            ");

            $total = 0;
            $orders = 0;
            while($row = $result->fetch_assoc()){
                $total += $row["total"];
                $orders += $row["order_count"];
            }
            array_push($data, $total);
            array_push($data2, $orders);
            array_push($label, $date);
    
        }

        $chartHeader = "Yearly Sales";
    }
?>



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
  
    <!-- No Extra plugin used -->
    <!-- SLEEK CSS -->
    <link id="sleek-css" rel="stylesheet" href="assets/css/sleek.css" />
    <!-- FAVICON -->
    <link href="assets/img/favicon.png" rel="shortcut icon" />
    <script src="assets/plugins/nprogress/nprogress.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="assets/plugins/jquery/jquery.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

</head>

<style>
    *{
        color: black;
    }
    p{
        padding: 0;
        margin: 0;
    }
        
    @page {
        size: A4;
        margin: 10.16mm;
    }
    @media print {
        html, body {
            width: 210mm;
            height: 297mm;        
        }
        .page {
            margin: 0;
            border: initial;
            border-radius: initial;
            width: initial;
            min-height: initial;
            box-shadow: initial;
            background: initial;
            page-break-after: always;
        }
    }
    table{
        font-size: 14px;
    }
    .table th, .table td{
        vertical-align: middle;
        padding: 10px 5px;
    }
</style>

<body>
    <div id="buttonDiv" style="margin: 30px; auto; display: flex; justify-content: end">
        <a href="./sales_reports.php"><button type="button" class="btn btn-secondary m-3">Back</button></a>
        <button type="button" class="btn btn-primary m-3" onclick="hideButtons()">Print</button>
    </div>


    <div class="main-div" id="main-div" style="width: 215.9mm; margin: auto">
        <div class="header mb-5">
            <img src="<?=$logo ?>" alt="Product Image" style="width: 100%; height: 6rem; object-fit: contain;">
            <h5 class="text-center"><?=$storeName ?><br>Milktea Shop</h5>
            <br>
            <center>
                <h2>Sales Report</h2>
            </center>
        </div>


        <div class="mt-5 mb-5 page">
            <h3 class="mb-3"><?=$chartHeader?></h3>
            <table class="table mb-5">
                <thead style="background-color: #e4eccd">
                    <th>#</th>
                    <th class="text-center">DATE</th>
                    <th class="text-center">TOTAL SALES</th>
                    <th class="text-center">COMPLETED ORDERS</th>
                </thead>
                <tbody>
                    <?php
                        for($i = 0; $i < count($data); $i++){
                            echo '
                                <tr>
                                    <th>'.($i+1).'</th>
                                    <td class="text-center">'.$label[$i].'</td>
                                    <td class="text-right">₱ '.number_format($data[$i], 2).'</td>
                                    <td class="text-right">'.number_format($data2[$i]).'</td>
                                </tr>                            
                            ';
                        }
                    ?>
                </tbody>
            </table>

            <br>

            
            <h6><b>Prepared By:<br><br>
            <?=strtoupper($fname.' '.$lname)?></br>
</b>Administrator</h6>
        </div>







        <div class="mt-5 mb-5 page">
            <div class="header mb-5">
                <img src="<?=$logo ?>" alt="Product Image" style="width: 100%; height: 6rem; object-fit: contain;">
                <h5 class="text-center"><?=$storeName ?><br>Milktea Shop</h5>
                <br>
                <center>
                    <h2>Product Sales</h2>
                </center>
            </div>
            
            <table class="table mb-5">
                <thead style="background-color: #e4eccd">
                    <th>#</th>
                    <th class="text-center">PRODUCT NAME</th>
                    <th class="text-center">TOTAL SALES</th>
                    <th class="text-center">QUANTITY SOLD</th>
                </thead>
                <tbody>
                    <?php
                        $result = $db->query("
                            SELECT p.product_name, SUM(oi.subtotal) AS subtotal, SUM(oi.quantity) AS quantity_sold
                            FROM order_item oi
                                INNER JOIN product p ON oi.product_id = p.product_id
                                INNER JOIN order_list ol ON oi.order_id = ol.order_id
                            WHERE ol.status = 4
                            GROUP BY oi.product_id
                            ORDER BY subtotal DESC
                        ");

                        $rowCount = 1;
                        while($row = $result->fetch_assoc()){
                            echo '
                                <tr>
                                    <th class="text-center">'.$rowCount.'</th>
                                    <td class="text-left">'.$row["product_name"].'</td>
                                    <td class="text-right">₱ '.number_format($row["subtotal"], 2).'</td>
                                    <td class="text-right">'.number_format($row["quantity_sold"]).'</td>
                                </tr>
                            ';
                            $rowCount++;
                        }

                        
                    ?>
                </tbody>
            </table>

            <br>

            <h6><b>Prepared By:<br><br>
            <?=strtoupper($fname.' '.$lname)?></br>
</b>Administrator</h6>
        </div>
        

    </div>
</body>

<script src="./js/chart.js"></script>
<script>

    function hideButtons(){
        $("#buttonDiv").css("display", "none");
        window.print();
        $("#buttonDiv").css("display", "flex");
    }

    /*const tCtx = document.getElementById('topChart');

    new Chart(tCtx, {
        type: 'doughnut',
        data: {
            labels: <?= $salesRankLabel ?>,
            datasets: [{
                label: 'Average product sold per day',
                data: <?= $salesRankData ?>,
                borderWidth: 1,
                backgroundColor: ['#0275d8', '#5cb85c', '#5bc0de', '#f0ad4e', '#d9534f'],
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'bottom',
                    align: 'start',
                    labels: {
                        font: {
                            size: 25
                        }
                    },
                }
            },
            layout: {
                padding: 20
            }
        }
    });*/
</script>

