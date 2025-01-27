<?php
include("connection/connect.php");  //include connection file
error_reporting(0);  // using to hide undefine undex errors
session_start(); //start temp session until logout/browser closed

include("./checkLoginSession.php");

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the product_id from the form
    $product_id = $_POST["product_id"];
    
    // Loop through the submitted price data
    foreach ($_POST["size_name"] as $key => $size_name) {
        // Sanitize and retrieve the other form fields
        $price = $_POST["price"][$key];
        $status = $_POST["status"][$key];

        // Update the price data in the database based on product_id and size_name
        // Replace "your_table_name" with the actual name of your price table
        $updateQuery = "UPDATE price SET price='$price', status='$status' WHERE product_id='$product_id' AND size_name='$size_name'";
        
        // Execute the update query
        $result = mysqli_query($db, $updateQuery);

        if (!$result) {
            // Handle the database update error
            echo "Error updating price: " . mysqli_error($db);
        }
    }

    // Redirect to a confirmation page or back to the product details page
    // Example:
   header("Location: products_milkteas.php?product_id=$product_id");
 exit();
}
?>
