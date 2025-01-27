<?php
    include("./connection.php");
    $db = new Database();
    $orderId = $_POST["orderId"];

    $db->sql("
    
        UPDATE `order_list` 
        SET `notif`='1' 
        WHERE `order_id` = '$orderId'
    ")
?>