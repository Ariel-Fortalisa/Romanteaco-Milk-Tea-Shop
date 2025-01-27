<?php
    session_start();
    
    include("./connection.php");
    $db = new Database();
    
    if(isset($_POST['but_upload'])){
 
        $name = ($_FILES['file']['name']);
        $target_dir = "screenshots/";
        $target_file = $target_dir . basename($_FILES["file"]["name"]);
        // Select file type
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
        // Valid file extensions
        $extensions_arr = array("jpg","jpeg","png","gif");
    
        // Check extension
        if( in_array($imageFileType,$extensions_arr) ){
             // Upload file
             move_uploaded_file($_FILES['file']['tmp_name'],$target_file);
        }
     
    }

    $payment = $_POST["pay_method"];
    $diningOption = $_POST["dnto"];
    $userId = $_SESSION["Account_ID"];
    $userName = "";
    $userEmail = "";
    $res = $db->select("user_account", "*", "id = '$userId'");
    while($row = $res->fetch_assoc()) {
        $userName = $row["name"];
        $userEmail = $row["email"];
    }
    date_default_timezone_set('Asia/Manila');
    $dateToday = date("Y-m-d");
    $timeToday = date("H:i:s");
    $total = $_POST["total"];
    $status = 1;

    //order items
    $productId = $_POST["product_id"];
    $sizeId = $_POST["size_id"];
    $orderName = $_POST["order_name"];
    $quantity = $_POST["quantity"];
    $subtotal = $_POST["subtotal"];
    $screenshot = $target_dir."".$name;

    $estimatedArrival = isset($_POST["estimatedArrival"]) ? "'".$_POST["estimatedArrival"]."'" : "NULL";
    
    //insert data to order_list table
    $db->sql("
        INSERT INTO `order_list`(
            `order_id`, `user_id`, `user_name`, `email`, 
            `dining_option`, `total`, `payment_method`, 
            `screenshot`, `estimated_arrival`, `status`, `date`, `time`, `notif`
        ) VALUES (
            '0','$userId','$userName','$userEmail','$diningOption',
            '$total','$payment','$screenshot', $estimatedArrival, '$status','$dateToday','$timeToday', '0')
    ");



    //get the order id
    $orderId = "";
    $res = $db->selectOrder("order_list", "*", "1", "order_id DESC");
    while($row = $res->fetch_assoc()){
        $orderId = $row["order_id"];
        break;
    }
    
    //insert order items on database
    for($i = 0; $i < count($orderName); $i++){
        $db->insert("order_item", 
        "`order_id`, `product_id`, `size_id`, `order_name`, `quantity`, `subtotal`", 
        "'$orderId', '".$productId[$i]."', '".$sizeId[$i]."', '".$orderName[$i]."', '".$quantity[$i]."', '".$subtotal[$i]."'");
    }
    
    //insert data to order_list1 table
    $db->sql("
        INSERT INTO `order_list1`(
            `id`, `name`, `date`, `time`
        ) VALUES (
            '0','customer','$dateToday','$timeToday')
    ");

    //delete all items on cart
    $db->delete(
    "cart", "user_id = $userId"
    );

    
    $_SESSION["message"] = "placed-order";

    header("Location: home.php");
    exit();
?>
