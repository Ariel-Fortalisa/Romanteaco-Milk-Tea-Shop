<?php
    session_start();
    $userID = $_SESSION["Account_ID"];

    include("./connection.php");
    $db = new Database();

    $data = $db->select("cart", "*", "user_id = '$userID'");
    $total = 0;
    while($row = $data->fetch_assoc()) {
        echo $row["order_name"].' '.$row["quantity"].'x '.$row["subtotal"].'<br>';
        $total += $row["subtotal"];
    }
    echo $total;
?>