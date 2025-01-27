<?php
    if(!isset($_SESSION["level"])){
        header("Location: ./login-user.php");
        exit();
      }
?>