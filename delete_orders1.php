
<?php
include("connection/connect.php");  //include connection file
error_reporting(0);  // using to hide undefine undex errors
session_start(); //start temp session until logout/browser closed

?>
<?php


// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

// Delete data from the table
$sql = "DELETE FROM order_list1";
if ($db->query($sql) === TRUE) {
    echo "Data deleted successfully";
} else {
    echo "Error deleting data: " . $db->error;
}

$db->close();
?>
