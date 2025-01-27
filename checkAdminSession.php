<?php
    if($_SESSION["level"] !== "admin"){
        header("Location: login-user.php");
        exit();
    }
?>