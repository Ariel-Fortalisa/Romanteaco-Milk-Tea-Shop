<?php
    include("./connection.php");
    $db = new Database();
    $orderId = $_POST["orderId"];

    $db->sql("
    
        UPDATE `order_list` 
        SET `notif`='2' 
        WHERE `order_id` = '$orderId'
    ")
?>