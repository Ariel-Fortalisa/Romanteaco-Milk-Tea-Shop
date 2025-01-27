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
    $payment = $_GET["paymentMethod"];
    $start = $_GET["startDate"];
    $end = $_GET["endDate"];

    
    $dateHeader = ( !empty($start) and !empty($end) ) ? "Orders During ".date("M d Y", strtotime($start))." to ".date("M d Y", strtotime($end)) : ""; 
?>



<head>
    
<meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Sleek Dashboard - Free Bootstrap 4 Admin Dashboard Template and UI Kit. It is very powerful bootstrap admin dashboard, which allows you to build products like admin panels, content management systems and CRMs etc.">
  
    <title>Completed Reports</title>
    
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
    p, h1, h2, h3, h4, h5, h6, table, th, td{
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
    *{
        font-size: 15px;
    }
    .table th, .table td{
        vertical-align: middle;
        padding: 10px 5px;
    }
</style>

<body>
    <div id="buttonDiv" style="margin: 30px; auto; display: flex; justify-content: end">
        <a href="./orders_completed_reports.php"><button type="button" class="btn btn-secondary m-3">Back</button></a>
        <button type="button" class="btn btn-primary m-3" onclick="hideButtons()">Print</button>
    </div>


    <div class="main-div" id="main-div" style="width: 215.9mm; margin: auto">
        <div class="header mb-5">
            <img src="<?=$logo ?>" alt="Product Image" style="width: 100%; height: 6rem; object-fit: contain;">
            <h5 class="text-center"><?=$storeName ?><br>Milktea Shop</h5>
            <br>
            <center>
                <h2>Completed Orders</h2>
            </center>
        </div>


        <div class="mt-5 mb-5 page">
            <h4 class="mb-3"><?=$dateHeader?></h4>
            <table class="table mb-5" id="orderTable">
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
                    <?php
                        $total = 0;

                        $condition = "";
                        if($start !== "" and $end !== ""){
                            $condition .= "AND date BETWEEN '$start' AND '$end' ";
                        }
                        
                        if($payment !== 'ALL'){
                            $condition .= "AND payment_method = '$payment' ";
                        }
                        
                        $query = "SELECT * FROM order_list WHERE status = 4 $condition ORDER BY date DESC, time DESC";
                        $result = mysqli_query($db, $query);
                        $rowCount = 1;
                        if($result->num_rows > 0){
                            while ($row = $result->fetch_assoc()) {
                        
                                $itemList = '';
                                $items = $db->query("SELECT * FROM order_item WHERE order_id = ".$row["order_id"]);
                                while($row2 = $items->fetch_assoc()){
                                    $itemList .= "- ".$row2["order_name"]."<br>";
                                }
                                echo '
                                <tr>
                                        <td>'.$rowCount.'</td>
                                        <td>'.$row['user_name'].'</td>
                                        <td style="text-transform: capitalize">'.$row['dining_option'].'</td>
                                        <td>'.$itemList.'</td>
                                        <td>
                                            '.($row['payment_method'] === 'GCash' ? '<img src="assets/img/gcashlogo.png" alt="GCash Image" width="50" height="13">' : '<span style="color: #76a004"><b>Cash</b></span>').'
                                        </td>
                                        
                                        <td>'.date('M. j, Y', strtotime($row['date'])).'</td>
                                        <td>'.date('h:i A', strtotime($row['time'])).'</td>
                                        <td>₱ '.number_format($row['total'], 2).'</td>
                                    </tr>
                                ';
                                
                                $total += $row["total"];
                                $rowCount++;
                            }
                            
                        }
                        else{
                            echo '
                                <tr>
                                    <td class="text-center p-5" colspan="8">No Results</td>
                                </tr>
                            ';
                        }
                    ?>
                    <tr>
                        <td colspan="4" class="text-left">Number of Orders:&emsp;<?=number_format($rowCount-1)?></th>
                        <td colspan="4" class="text-right">Total:&emsp;₱ <?=number_format($total, 2)?></th>
                    </tr>
                </tbody>
            </table>
            <h4 class="text-right mb-5"></h4>
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
</script>

