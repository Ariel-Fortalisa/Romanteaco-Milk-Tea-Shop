<?php
include("connection/connect.php");  //include connection file
error_reporting(0);  // using to hide undefine undex errors
session_start(); //start temp session until logout/browser closed

include("./checkLoginSession.php");
?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the values from the form
    $priceId = $_POST["product_id"];
    $sizeName = $_POST["size_name"];
    $price = $_POST["price"];
    $status = $_POST["status"];
    
    // Prepare an SQL UPDATE statement
    $updateQuery = "UPDATE price SET size_name = ?, price = ?, status = ? WHERE product_id = ?";

    // Prepare and bind the statement
    if ($stmt = mysqli_prepare($db, $updateQuery)) {
        mysqli_stmt_bind_param($stmt, "sssi", $sizeName, $price, $status, $priceId);
        
        // Execute the statement
        if (mysqli_stmt_execute($stmt)) {
            // Update successful
            echo "Price updated successfully.";
        } else {
            // Update failed
            echo "Error updating price: " . mysqli_error($db);
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        // Statement preparation failed
        echo "Error preparing statement: " . mysqli_error($db);
    }
    
    // Close the database connection
    mysqli_close($db);
} else {
    // Handle non-POST requests or direct script access
    echo "Invalid request.";
}
?>
