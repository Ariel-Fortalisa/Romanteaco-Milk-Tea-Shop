<?php
    session_start();
    include("./checkLoginSession.php");
    include("./checkUserSession.php");
    
    $productName = $_POST["product_name"];
    $flavor = isset($_POST["flavor"]) ? $_POST["flavor"] : "";
    $sizeId = isset($_POST["sizeId"]) ? $_POST["sizeId"] : 0;
    $size = isset($_POST["size"]) ? $_POST["size"] : "";
    $add_onsName = isset($_POST["addonsName"]) ? $_POST["addonsName"] : "";

    $productId = $_POST["product_id"];
    $sizeId = isset($_POST["sizeId"]) ? $_POST["sizeId"] : 0;
    $orderName = $productName." ".$flavor." ".$size." ".$add_onsName;
    $quantity = $_POST["quantity"];
    $subtotal = $_POST["subtotal"];
    $image = $_POST["image"];
    $userId = $_SESSION["Account_ID"];
    
    include("./connection.php");
    $db = new Database();

    $cartData = $db->sql("SELECT `order_name` FROM `cart` WHERE `order_name` = '$orderName'");

    if($cartData->num_rows > 0){
        $db->sql("UPDATE `cart` SET `quantity`=`quantity` + $quantity,`subtotal`=`subtotal` + $subtotal WHERE `order_name` = '$orderName' AND `user_id` = '$userId'");
    }
    else{
        $db->sql("
            INSERT INTO `cart`
                (`cart_id`, `user_id`, `product_id`, `size_id`, `order_name`, `quantity`, `subtotal`, `image`) VALUES (
                '0','$userId', '$productId', '$sizeId', '$orderName', '$quantity', '$subtotal', '$image')
        ");
    }
    
    $categoryId = $_POST["categoryId"];
    $categoryName = $_POST["categoryName"];
    $_SESSION["message"] = "cart-added";

    header("Location: ./order-products.php?category_id=$categoryId&category_name=$categoryName");
    exit();
    
?>