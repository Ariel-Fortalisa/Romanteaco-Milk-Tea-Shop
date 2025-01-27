<?php
    include("connection/connect.php");  //include connection file
    //error_reporting(0);  // using to hide undefine undex errors
    session_start(); //start temp session until logout/browser closed

    include("./checkLoginSession.php");
    include("./checkAdminSession.php");

    $id = $_GET["id"];

    $store = $db->query("SELECT * FROM system_settings WHERE id = 1")->fetch_assoc();
    $storeName = $store["store_name"];
    $address = $store["address"];
    $email = $store["email"];
    $contact = $store["contact_number"];
    $logo = $store["logo"];


    $total = $db->query("SELECT total FROM order_list WHERE order_id = $id")->fetch_assoc()["total"];

    $transactionItemsRow = "";
    $transactionItems = $db->query("
        SELECT * FROM order_item WHERE order_id = $id
    ");

    while($row = $transactionItems->fetch_assoc()){
        $transactionItemsRow .= '
            <tr>
                <td>'.wordwrap($row["order_name"],15,"<br>\n").'</td>
                <td style="text-align: right">&times;'.number_format($row["quantity"]).'</td>
                <td style="text-align: right">₱ '.number_format($row["subtotal"], 2).'</td>
            </tr>
        ';
    }



    
?>

<head>

    <title>Receipt</title>
    
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<style>
    *{
        margin: 0;
        padding: 0;
        font-size: 15px;
        color: black;
        font-family: sans-serif;
    }
    hr {
        border: 2px solid black;
        margin: 5px 0px;
    }
    th, td{
        border-bottom: 1px solid black;
    }
    table{
        width: 100%
    }
    .transactionDetails{
        display: flex;
    }
    .transactionDetails h5{
        width: 100%
    }
    .button-back{
        background-color: #6C757D; 
        color: white; 
    }
    .button-print{
        background-color: #0275d8; 
        color: white; 
    }
    button{
        cursor: pointer;
        padding: 5px 10px; 
        border: none; 
        border-radius: 10px;
        margin: 10px
    }

    #details td {
        border: none;
    }
</style>
<div class="receiptDiv" style="margin: auto; width: 57mm;">
    <center>
        <img src="<?=$logo?>" alt="" style="width: 80px;"><br><br>
        <span><?=$storeName?></span><br>
        <span><?=$address?></span><br>
        <span><?=$email?></span><br>
        <span><?=$contact?></span><br>

        <br><br>
        <hr>
        <span>Transaction #<?=$id?></span><br>
        <hr>
        <table style="height: 100px">
            <thead>
                <th style="text-align: center">Order</th>
                <th style="text-align: center">Qty</th>
                <th style="text-align: center">Subtotal</th>
            </thead>
            <tbody>
                <?=$transactionItemsRow?>
            </tbody>
        </table>
        
        
    </center>
    <table>
        
        <tbody id="details">
            <tr>
                <td style="text-align: right;">Total:&emsp;₱ <?=number_format($total, 2)?></td>
            </tr>
        </tbody>
    </table>
</div>
<div id="buttonDiv" style="margin: 30px; auto; display: flex; justify-content: center">
    <a href="./orders_completed.php"><button type="button" class="button-back">Back</button></a>
    <button type="button" class="button-print" onclick="hideButtons()">Print</button>
</div>


<script>
    function hideButtons(){
        $("#buttonDiv").css("display", "none");
        window.print();
        $("#buttonDiv").css("display", "flex");
    }

</script>