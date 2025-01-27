<?php
include("connection/connect.php");  //include connection file
error_reporting(0);  // using to hide undefine undex errors
session_start(); //start temp session until logout/browser closed

include("./checkLoginSession.php");
?>

<?php


// Query to check for new orders
$sql = "SELECT COUNT(*) AS newOrderCount FROM order_list1";
$result = $db->query($sql);

$response = array('newOrder' => false);

// Check if the query was successful
if ($result) {
  $row = $result->fetch_assoc();
  $newOrderCount = $row['newOrderCount'];
  
  if ($newOrderCount > 0) {
    $response['newOrder'] = true;
  }
}

// Close the database connection

// Send the JSON response
header('Content-Type: application/json');
echo json_encode($response);
?>

