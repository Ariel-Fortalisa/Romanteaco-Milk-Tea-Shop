<?php
    session_start();
    $pageName = $_POST["page_name"];
    $remove_cart = $_POST["remove"];

    include("./connection.php");
    $db = new Database();

    $db->delete(
    "cart", "cart_id = $remove_cart"
    );

    $_SESSION["message"] = "remove-item";

    header("Location: $pageName");
    exit();
?>