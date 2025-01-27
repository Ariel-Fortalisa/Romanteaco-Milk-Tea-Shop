<?php
    session_start();
    $pageName = $_POST["page_name"];
    $userId = $_SESSION["Account_ID"];

    include("./connection.php");
    $db = new Database();

    $db->delete(
    "cart", "user_id = $userId"
    );

    $_SESSION["message"] = "clear-all-item";

    header("Location: $pageName");
    exit();
?>