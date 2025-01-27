<?php 
// Assuming you've already established a database connection
// Define the image directory variable
    // Replace with your actual image directory

// Your SQL query to fetch orders with status = 1
session_start();
include("connection/connect.php");
include("./checkLoginSession.php");
include("./checkAdminSession.php");

$payment = $_POST["payment"];
$start = $_POST["start_date"];
$end = $_POST["end_date"];

$condition = "";
if($start !== "" and $end !== ""){
    $condition .= "AND date BETWEEN '$start' AND '$end' ";
}

if($payment !== 'ALL'){
    $condition .= "AND payment_method = '$payment' ";
}

$query = "SELECT * FROM order_list WHERE status = 4 $condition ORDER BY date DESC, time DESC";
$result = mysqli_query($db, $query);
$rowCount = 1;
if($result->num_rows > 0){
    while ($row = $result->fetch_assoc()) {

        $itemList = '';
        $items = $db->query("SELECT * FROM order_item WHERE order_id = ".$row["order_id"]);
        while($row2 = $items->fetch_assoc()){
            $itemList .= "- ".$row2["order_name"]."<br>";
        }
        echo '
        <tr>
                <td>'.$rowCount.'</td>
                <td>'.$row['user_name'].'</td>
                <td style="text-transform: capitalize">'.$row['dining_option'].'</td>
                <td>'.$itemList.'</td>
                <td>
                    '.($row['payment_method'] === 'GCash' ? '<img src="assets/img/gcashlogo.png" alt="GCash Image" width="50" height="13">' : '<span style="color: #76a004"><b>Cash</b></span>').'
                </td>
                
                <td>'.date('M. j, Y', strtotime($row['date'])).'</td>
                <td>'.date('h:i A', strtotime($row['time'])).'</td>
                <td>₱ '.number_format($row['total'], 2).'</td>
            </tr>
        ';
    
        $rowCount++;
    }
    
}
else{
    echo '
        <tr>
            <td class="text-center p-5" colspan="8">No Results</td>
        </tr>
    ';
}
