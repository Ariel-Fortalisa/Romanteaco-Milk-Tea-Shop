<?php
    if($_SESSION["level"] !== "user"){
        header("Location: login-user.php");
        exit();
    }
?>