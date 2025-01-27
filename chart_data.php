<?php
include("connection/connect.php");  //include connection file
error_reporting(0);  // using to hide undefine undex errors
session_start(); //start temp session until logout/browser closed

include("./checkLoginSession.php");
?>
<?php

// Query to get data
$query = "SELECT status, COUNT(*) as count FROM order_list GROUP BY status";
$result = $db->query($query);

$data = array();
while ($row = $result->fetch_assoc()) {
    $data[$row["status"]] = $row["count"];
}

$db->close();

header("Content-type: application/json");
echo json_encode($data);
?>
