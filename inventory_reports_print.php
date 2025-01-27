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
        <a href="./inventory_reports.php"><button type="button" class="btn btn-secondary m-3">Back</button></a>
        <button type="button" class="btn btn-primary m-3" onclick="hideButtons()">Print</button>
    </div>


    <div class="main-div" id="main-div" style="width: 215.9mm; margin: auto">
        <div class="header mb-5">
            <img src="<?=$logo ?>" alt="Product Image" style="width: 100%; height: 6rem; object-fit: contain;">
            <h5 class="text-center"><?=$storeName ?><br>Milktea Shop</h5>
            <br>
            <center>
                <h2>List of Materials</h2>
            </center>
        </div>


        <div class="mt-5 mb-5 page">
            <h3 class="mb-3">Good Materials</h3>
            <table class="table mb-5">
                <thead style="background-color: #e4eccd">
                    <th>#</th>
                    <th>MATERIAL NAME</th>
                    <th>QUANTITY</th>
                    <th>COST</th>
                    <th>EXPIRATION DATE</th>
                    <th>EXPIRATION STATUS</th>
                </thead>
                <tbody>
                    <?php
                        $result = $db->query("SELECT * FROM materials WHERE expiration_status = 'GOOD' OR expiration_status = 'N/A' ORDER BY expiration_date DESC");
                        if($result->num_rows > 0){
                            $rowCount = 1;
                            while($row = $result->fetch_assoc()){
                                $expDate = !empty($row["expiration_date"]) ? date("M d Y", strtotime($row["expiration_date"])) : "N/A";
                
                                echo '
                                    <tr>
                                        <th>'.$rowCount.'</th>
                                        <td>'.$row["material_name"].'</td>
                                        <td>'.number_format($row["quantity"]).'</td>
                                        <td>₱ '.number_format($row["cost"], 2).'</td>
                                        <td class="text-center">'.$expDate.'</td>
                                        <td class="text-center">'.$row["expiration_status"].'</td>
                                    </tr>
                                ';
                                $rowCount++;
                            }
                        }
                        else{
                             echo '
                                <tr>
                                    <td class="text-center" colspan="6">There are no good materials in inventory</td>
                                </tr>
                            ';
                        }
                    ?>
                </tbody>
            </table>

            <br>

            <h3 class="mb-3">Expiring Materials</h3>
            <table class="table mb-5">
                <thead style="background-color: #e4eccd">
                    <th>#</th>
                    <th>MATERIAL NAME</th>
                    <th>QUANTITY</th>
                    <th>COST</th>
                    <th>EXPIRATION DATE</th>
                    <th>EXPIRATION STATUS</th>
                </thead>
                <tbody>
                    <?php
                        $result = $db->query("SELECT * FROM materials WHERE expiration_status = 'NEARLY EXPIRED' OR expiration_status = 'EXPIRED' ORDER BY expiration_date ASC");
                        if($result->num_rows > 0){
                            $rowCount = 1;
                            while($row = $result->fetch_assoc()){
                                $expDate = !empty($row["expiration_date"]) ? date("M d Y", strtotime($row["expiration_date"])) : "N/A";
                
                                echo '
                                    <tr>
                                        <th>'.$rowCount.'</th>
                                        <td>'.$row["material_name"].'</td>
                                        <td>'.number_format($row["quantity"]).'</td>
                                        <td>₱ '.number_format($row["cost"], 2).'</td>
                                        <td class="text-center">'.$expDate.'</td>
                                        <td class="text-center">'.$row["expiration_status"].'</td>
                                    </tr>
                                ';
                                $rowCount++;
                            }
                        }
                        else{
                             echo '
                                <tr>
                                    <td class="text-center" colspan="6">There are no expiring materials in inventory</td>
                                </tr>
                            ';
                        }
                    ?>
                </tbody>
            </table>
            
            <br>

            <h3 class="mb-3">Unavailable Materials</h3>
            <table class="table mb-5">
                <thead style="background-color: #e4eccd">
                    <th>#</th>
                    <th>MATERIAL NAME</th>
                    <th>QUANTITY</th>
                    <th>COST</th>
                    <th>EXPIRATION DATE</th>
                    <th>EXPIRATION STATUS</th>
                </thead>
                <tbody>
                    <?php
                        $result = $db->query("SELECT * FROM materials WHERE status = 'unavailable' ORDER BY material_name ASC");
                        if($result->num_rows > 0){
                            $rowCount = 1;
                            while($row = $result->fetch_assoc()){
                                $expDate = !empty($row["expiration_date"]) ? date("M d Y", strtotime($row["expiration_date"])) : "N/A";
                
                                echo '
                                    <tr>
                                        <th>'.$rowCount.'</th>
                                        <td>'.$row["material_name"].'</td>
                                        <td>'.number_format($row["quantity"]).'</td>
                                        <td>₱ '.number_format($row["cost"], 2).'</td>
                                        <td class="text-center">'.$expDate.'</td>
                                        <td class="text-center">'.$row["expiration_status"].'</td>
                                    </tr>
                                ';
                                $rowCount++;
                            }
                        }
                        else{
                             echo '
                                <tr>
                                    <td class="text-center" colspan="6">There are no unavailable materials in inventory</td>
                                </tr>
                            ';
                        }
                    ?>
                </tbody>
            </table>

            <br>

            <h3 class="mb-3">Material Usage</h3>
            <table class="table mb-5">
                <thead style="background-color: #e4eccd">
                    <th>#</th>
                    <th>ORDER ID</th>
                    <th>MATERIAL NAME</th>
                    <th>QUANTITY</th>
                    <th>COST</th>
                    <th>DATE</th>
                    <th>TIME</th>
                </thead>
                <tbody>
                    <?php
                        $result = $db->query("
                            SELECT mu.*, mt.material_name, ol.order_id, ol.date, ol.time
                            FROM material_usage mu
                                INNER JOIN materials mt ON mu.material_id = mt.material_id
                                INNER JOIN order_item oi ON mu.order_item_id = oi.id
                                INNER JOIN order_list ol ON oi.order_id = ol.order_id
                            ORDER BY date DESC, time DESC, mt.material_name ASC
                        ");
                        if($result->num_rows > 0){
                            $rowCount = 1;
                            while($row = $result->fetch_assoc()){
                                echo '
                                    <tr>
                                        <th>'.$rowCount.'</th>
                                        <td>#'.$row["order_id"].'</td>
                                        <td>'.$row["material_name"].'</td>
                                        <td>'.number_format($row["qty"]).'</td>
                                        <td>₱ '.number_format($row["cost"], 2).'</td>
                                        <td>'.$row["date"].'</td>
                                        <td>'.$row["time"].'</td>
                                    </tr>
                                ';
                                $rowCount++;
                            }
                        }
                        else{
                             echo '
                                <tr>
                                    <td class="text-center" colspan="6">There are no materials used</td>
                                </tr>
                            ';
                        }
                    ?>
                </tbody>
            </table>
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
                    <h2>List of Flavors</h2>
                </center>
            </div>
            
            <h3 class="mb-3">Good Flavors</h3>
            <table class="table mb-5">
                <thead style="background-color: #e4eccd">
                    <th>#</th>
                    <th>FLAVOR NAME</th>
                    <th>QUANTITY</th>
                    <th>COST</th>
                    <th>EXPIRATION DATE</th>
                    <th>EXPIRATION STATUS</th>
                </thead>
                <tbody>
                    <?php
                        //for good flavor
                        $result = $db->query("SELECT * FROM flavorings WHERE expiration_status = 'GOOD' OR expiration_status = 'N/A' ORDER BY expiration_date DESC");
                        $goodTableRows = "";
                        if($result->num_rows > 0){
                            $rowCount = 1;
                            while($row = $result->fetch_assoc()){
                                $expDate = !empty($row["expiration_date"]) ? date("M d Y", strtotime($row["expiration_date"])) : "N/A";

                                echo '
                                    <tr>
                                        <th>'.$rowCount.'</th>
                                        <td>'.$row["flavor_name"].'</td>
                                        <td>'.number_format($row["quantity"]).'</td>
                                        <td>₱ '.number_format($row["cost"], 2).'</td>
                                        <td class="text-center">'.$expDate.'</td>
                                        <td class="text-center">'.$row["expiration_status"].'</td>
                                    </tr>
                                ';
                                $rowCount++;
                            }
                        }
                        else{
                            echo '
                                <tr>
                                    <td class="text-center" colspan="6">There are no good flavors in inventory</td>
                                </tr>
                            ';
                        }
                    ?>
                </tbody>
            </table>

            <br>

            <h3 class="mb-3">Expiring Flavors</h3>
            <table class="table mb-5">
                <thead style="background-color: #e4eccd">
                    <th>#</th>
                    <th>FLAVOR NAME</th>
                    <th>QUANTITY</th>
                    <th>COST</th>
                    <th>EXPIRATION DATE</th>
                    <th>EXPIRATION STATUS</th>
                </thead>
                <tbody>
                    <?php
                        //for good flavor
                        $result = $db->query("SELECT * FROM flavorings WHERE expiration_status = 'NEARLY EXPIRED' OR expiration_status = 'EXPIRED' ORDER BY expiration_date ASC");
                        $goodTableRows = "";
                        if($result->num_rows > 0){
                            $rowCount = 1;
                            while($row = $result->fetch_assoc()){
                                $expDate = !empty($row["expiration_date"]) ? date("M d Y", strtotime($row["expiration_date"])) : "N/A";

                                echo '
                                    <tr>
                                        <th>'.$rowCount.'</th>
                                        <td>'.$row["flavor_name"].'</td>
                                        <td>'.number_format($row["quantity"]).'</td>
                                        <td>₱ '.number_format($row["cost"], 2).'</td>
                                        <td class="text-center">'.$expDate.'</td>
                                        <td class="text-center">'.$row["expiration_status"].'</td>
                                    </tr>
                                ';
                                $rowCount++;
                            }
                        }
                        else{
                            echo '
                                <tr>
                                    <td class="text-center" colspan="6">There are no expiring flavors in inventory</td>
                                </tr>
                            ';
                        }
                    ?>
                </tbody>
            </table>

            <br>

            <h3 class="mb-3">Unavailable Flavors</h3>
            <table class="table mb-5">
                <thead style="background-color: #e4eccd">
                    <th>#</th>
                    <th>FLAVOR NAME</th>
                    <th>QUANTITY</th>
                    <th>COST</th>
                    <th>EXPIRATION DATE</th>
                    <th>EXPIRATION STATUS</th>
                </thead>
                <tbody>
                    <?php
                        //for good flavor
                        $result = $db->query("SELECT * FROM flavorings WHERE status = 'unavailable' ORDER BY flavor_name ASC");
                        $goodTableRows = "";
                        if($result->num_rows > 0){
                            $rowCount = 1;
                            while($row = $result->fetch_assoc()){
                                $expDate = !empty($row["expiration_date"]) ? date("M d Y", strtotime($row["expiration_date"])) : "N/A";

                                echo '
                                    <tr>
                                        <th>'.$rowCount.'</th>
                                        <td>'.$row["flavor_name"].'</td>
                                        <td>'.number_format($row["quantity"]).'</td>
                                        <td>₱ '.number_format($row["cost"], 2).'</td>
                                        <td class="text-center">'.$expDate.'</td>
                                        <td class="text-center">'.$row["expiration_status"].'</td>
                                    </tr>
                                ';
                                $rowCount++;
                            }
                        }
                        else{
                            echo '
                                <tr>
                                    <td class="text-center" colspan="6">There are no unavailable flavors in inventory</td>
                                </tr>
                            ';
                        }
                    ?>
                </tbody>
            </table>

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
                    <h2>List of Addons</h2>
                </center>
            </div>
            
            <h3 class="mb-3">Good Addons</h3>
            <table class="table mb-5">
                <thead style="background-color: #e4eccd">
                    <th>#</th>
                    <th>ADDON NAME</th>
                    <th>QUANTITY</th>
                    <th>COST</th>
                    <th>EXPIRATION DATE</th>
                    <th>EXPIRATION STATUS</th>
                </thead>
                <tbody>
                    <?php
                        //for good addons
                        $result = $db->query("SELECT * FROM add_ons1 WHERE expiration_status = 'GOOD' OR expiration_status = 'N/A' ORDER BY expiration_date DESC");
                        $goodTableRows = "";
                        if($result->num_rows > 0){
                            $rowCount = 1;
                            while($row = $result->fetch_assoc()){
                                $expDate = !empty($row["expiration_date"]) ? date("M d Y", strtotime($row["expiration_date"])) : "N/A";

                                echo '
                                    <tr>
                                        <th>'.$rowCount.'</th>
                                        <td>'.$row["name"].'</td>
                                        <td>'.number_format($row["quantity"]).'</td>
                                        <td>₱ '.number_format($row["cost"], 2).'</td>
                                        <td class="text-center">'.$expDate.'</td>
                                        <td class="text-center">'.$row["expiration_status"].'</td>
                                    </tr>
                                ';
                                $rowCount++;
                            }
                        }
                        else{
                            echo '
                                <tr>
                                    <td class="text-center" colspan="6">There are no good addons in inventory</td>
                                </tr>
                            ';
                        }
                    ?>
                </tbody>
            </table>

            <br>

            <h3 class="mb-3">Expiring Addons</h3>
            <table class="table mb-5">
                <thead style="background-color: #e4eccd">
                    <th>#</th>
                    <th>ADDON NAME</th>
                    <th>QUANTITY</th>
                    <th>COST</th>
                    <th>EXPIRATION DATE</th>
                    <th>EXPIRATION STATUS</th>
                </thead>
                <tbody>
                    <?php
                        //for good addons
                        $result = $db->query("SELECT * FROM add_ons1 WHERE expiration_status = 'NEARLY EXPIRED' OR expiration_status = 'EXPIRED' ORDER BY expiration_date ASC");
                        $goodTableRows = "";
                        if($result->num_rows > 0){
                            $rowCount = 1;
                            while($row = $result->fetch_assoc()){
                                $expDate = !empty($row["expiration_date"]) ? date("M d Y", strtotime($row["expiration_date"])) : "N/A";

                                echo '
                                    <tr>
                                        <th>'.$rowCount.'</th>
                                        <td>'.$row["name"].'</td>
                                        <td>'.number_format($row["quantity"]).'</td>
                                        <td>₱ '.number_format($row["cost"], 2).'</td>
                                        <td class="text-center">'.$expDate.'</td>
                                        <td class="text-center">'.$row["expiration_status"].'</td>
                                    </tr>
                                ';
                                $rowCount++;
                            }
                        }
                        else{
                            echo '
                                <tr>
                                    <td class="text-center" colspan="6">There are no expiring addons in inventory</td>
                                </tr>
                            ';
                        }
                    ?>
                </tbody>
            </table>

            <br>

            <h3 class="mb-3">Unavailable Addons</h3>
            <table class="table mb-5">
                <thead style="background-color: #e4eccd">
                    <th>#</th>
                    <th>ADDON NAME</th>
                    <th>QUANTITY</th>
                    <th>COST</th>
                    <th>EXPIRATION DATE</th>
                    <th>EXPIRATION STATUS</th>
                </thead>
                <tbody>
                    <?php
                        //for good addons
                        $result = $db->query("SELECT * FROM add_ons1 WHERE status = 'unavailable' ORDER BY name ASC");
                        $goodTableRows = "";
                        if($result->num_rows > 0){
                            $rowCount = 1;
                            while($row = $result->fetch_assoc()){
                                $expDate = !empty($row["expiration_date"]) ? date("M d Y", strtotime($row["expiration_date"])) : "N/A";

                                echo '
                                    <tr>
                                        <th>'.$rowCount.'</th>
                                        <td>'.$row["name"].'</td>
                                        <td>'.number_format($row["quantity"]).'</td>
                                        <td>₱ '.number_format($row["cost"], 2).'</td>
                                        <td class="text-center">'.$expDate.'</td>
                                        <td class="text-center">'.$row["expiration_status"].'</td>
                                    </tr>
                                ';
                                $rowCount++;
                            }
                        }
                        else{
                            echo '
                                <tr>
                                    <td class="text-center" colspan="6">There are no unavailable addons in inventory</td>
                                </tr>
                            ';
                        }
                    ?>
                </tbody>
            </table>

            

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

