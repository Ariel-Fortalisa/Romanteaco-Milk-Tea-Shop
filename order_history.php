<?php require_once "controllerUserData.php"; ?>
<?php
include("./checkLoginSession.php");
include("./checkUserSession.php");
include ("connection.php");
$db= new Database();
?>

<?php require_once "controllerUserData.php"; ?>
<?php 
$email = $_SESSION['email'];
$password = $_SESSION['password'];
if($email != false && $password != false){
    $sql = "SELECT * FROM user_account WHERE email = '$email'";
    $run_Sql = mysqli_query($conn, $sql);
    if($run_Sql){
        $fetch_info = mysqli_fetch_assoc($run_Sql);
        $status = $fetch_info['status'];
        $code = $fetch_info['code'];
        if($status == "verified"){
            if($code != 0){
                header('Location: reset-code.php');
            }
        }else{
            //header('Location: user-otp.php');
        }
    }
}else{
    header('Location: login-user.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order History</title>
 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"/>
 
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
 
    <!-- custom css file link  -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="animations.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    
    <!--Jquery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>

</head>
<style>
   .update-profile{
      animation: transitionIn-Y-bottom 2.3s;
   }
</style>
<body>
<?php 
$pageLocation = "order_history.php";
include ("header.php"); ?>
<?php include ("alert-message.php"); ?>   
<div class="loader">
   <img src="images/loading.gif" alt="">
</div>
  <section class="orderHistory">
  <a href="home.php"></br></br></br></br></br><button type="button" class="back" style="float: left; background-color: #fed033; color: #000; border-radius: .5rem; padding: 1rem 1rem; font-size: 1.8rem">Go Back</button></a>
   <h2 class="title"></br></br>Order History</h2>
   

<?php
    //loop for orders_list
    $orders = $db->sql("
    SELECT *
    FROM order_list
    WHERE `user_id` = '".$_SESSION['Account_ID']."' 
    ORDER BY date DESC, time DESC
    ");
    while($row = $orders->fetch_assoc()){
        if($row["status"] === "1"){
            $statusText = '<span class="text-blue" style="font-size: 13px">
                <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11" fill="royalblue" class="bi bi-circle-fill" viewBox="0 0 16 16">
                    <circle cx="7" cy="7" r="7"/>
                </svg>&nbsp;Pending</span>';
        }
        elseif($row["status"] === "2"){
            $statusText = '<span class="text-yellow" style="font-size: 13px">
                <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11" fill="#fec400" class="bi bi-circle-fill" viewBox="0 0 16 16">
                    <circle cx="7" cy="7" r="7"/>
                </svg>&nbsp;In Progress</span>';
        }
        elseif($row["status"] === "3"){
            $statusText = '<span class="text-orange" style="font-size: 13px">
                <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11" fill="#f58216" class="bi bi-circle-fill" viewBox="0 0 16 16">
                    <circle cx="7" cy="7" r="7"/>
                </svg>&nbsp;Prepared</span>';
        }
        elseif($row["status"] === "4"){
            $statusText = '<span class="text-green" style="font-size: 13px">
                <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11" fill="#76a004" class="bi bi-circle-fill" viewBox="0 0 16 16">
                    <circle cx="7" cy="7" r="7"/>
                </svg>&nbsp;Completed</span>';
        }
        elseif($row["status"] === "5"){
            $statusText = '<span class="text-red" style="font-size: 13px">
                <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11" fill="#fe5461" class="bi bi-circle-fill" viewBox="0 0 16 16">
                    <circle cx="7" cy="7" r="7"/>
                </svg>&nbsp;Cancelled</span>';
        }
        else{
            $statusText = '<span class="text-gray" style="font-size: 13px">
                <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11" fill="gray" class="bi bi-circle-fill" viewBox="0 0 16 16">
                    <circle cx="7" cy="7" r="7"/>
                </svg>&nbsp;Unclaimed</span>';
        }


        if($row["payment_method"] === "GCash"){
            $pmText = '<img src="assets/img/gcashlogo.png" alt="GCash Image" style="height: 30px; width: 60px; object-fit: contain;">';
        }
        else{
            $pmText = 'Cash';
        }

        if($row["dining_option"] === "Dine-in"){
            $doText = '<span class="text-black" style="font-size: 15px"><img src="images/dine-in.png" alt="" style="height: 18px; width: 18px; object-fit: contain;">
                            Dine-In
                        </span>';
        }else{
            $doText = '<span class="text-black" style="font-size: 15px"><img src="images/take-away.png" alt="" style="height: 18px; width: 18px; object-fit: contain;">
                            Take-Out
                        </span>';
        }

        if(empty($row["estimated_arrival"])){
            $eaText = '<span class="text-black" style="font-size: 15px">
                            Normal Order
                        </span>';
        }else{
            $eaText = '<span class="text-green" style="font-size: 15px">
                            Advance Order
                        </span>';
        }

        $imageBtn = '';
        // Check if payment method is GCash, and display the button accordingly
        if ($row['payment_method'] === 'GCash') {
            $imageBtn = '
                $("#imageButton").css("display", "block");
                $("#screenshotImg").attr("src", "'.$row["screenshot"].'");
            ';
        }
        else{
            $imageBtn = '
                $("#imageButton").css("display", "none");
                $("#screenshotImg").attr("src", "'.$row["screenshot"].'");
            ';
        }


        //loop for orders_item
        $orderItems = $db->sql("
        SELECT *
        FROM order_item
        WHERE `order_id` = '".$row["order_id"]."' 
        ORDER BY order_name ASC
        ");
        $ord_item = "";
        while($row2 = $orderItems->fetch_assoc()){
            $ord_item .= '
                <tr>
                    <td>'.$row2["order_name"].'</td>
                    <td style="text-align: center">'.number_format($row2['quantity']).'</td>
                    <td style="text-align: center">₱&nbsp;'.number_format($row2['subtotal'], 2).'</td>
                </tr>
            ';
        }
        echo '
            <div class="order-list-row">               
                <div class="row">
                    <div class="col text-left">
                        <small class="text-muted">Order Number</small>
                        <h3>'.$row["order_id"].'</h3>
                    </div>
                    <div class="col text-left">
                        <small class="text-muted">Order Type</small>
                        <h5>'.$eaText.'</h5>
                    </div>
                    <div class="col text-left">
                        <small class="text-muted">Dining Option</small>
                        <h5>'.$doText.'</h5>
                    </div>
                    <div class="col">
                    
                        <div class="dropdown" style="float: right">
                            <button class="btn-white dropdown" id="view'.$row["order_id"].'" data-toggle="modal" data-target="#orders" style="background-color: #e4eccd; color: #76a004; width: 40px; height: 40px; border-radius: 50%; padding:1rem 1rem; font-size: 1.5rem">
                                <i class="fa-regular fa-eye"></i>
                            </button>

                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                        </div>
                        
                    </div>
                </div>
                
                <br>

                <div class="row">
                    <div class="col text-left">
                        <small class="text-muted">Status</small>
                        <h5>'.$statusText.'</h5>
                    </div>
                    <div class="col text-left">
                        <small class="text-muted">Payment Method</small>
                        <h3>'.$pmText.'</h3>
                    </div>
                    <div class="col text-left">
                        <small class="text-muted">Total Amount</small>
                        <h3>₱'.number_format($row['total'], 2).'</h3>
                    </div>
                    <div class="col text-left">
                        <small class="text-muted">Ordered On</small>
                        <h5>'.date("M. j, Y", strtotime($row["date"])).'<br>'.date("h:i A", strtotime($row["time"])).'</h5>
                    </div>
                        
                        
                    
                    
                </div>
                
            </div>

            

            <script>
                $("#view'.$row["order_id"].'").click(function(){
                    $("#pendingNumber").html(`Order #&nbsp;'.$row["order_id"].'`);
                    $("#itemsTable tbody").html(`'.$ord_item.'`);
                    '.$imageBtn.'
                });
            </script>
        ';
    }
?>


</section>



<?php include ("footer.php"); ?>

<?php include("ordering_modal.php"); ?>



<!-- Modal -->
<div class="modal fade" id="orders" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content" style="max-width: 80%; height: 300px; border-radius: 1rem;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      <h2 class="history-title" id="pendingNumber" style="text-align: left; margin-top: 1.3rem; padding: 0 1rem; width: 100%"><b></b></h2> 
      <div class="modal-body" style="padding-top: 1rem; font-size: 1.5rem; overflow: auto;">
        <table class="table table-sm" id="itemsTable">
            <thead>
                <tr style="background-color: #e4eccd;">
                    <th>PRODUCT NAME</th>
                    <th style="text-align: center">QTY.</th>
                    <th style="text-align: center">SUBTOTAL</th>
                </tr>
            </thead>
            <tbody>
                
            </tbody>
        </table>
      </div>
      <div class="modal-footer">
            <button id="imageButton" type="button" class="btn btn-primary" data-toggle="modal" data-target="#imageModal" style="font-size: 1.5rem; display: none">GCash Payment</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal" style="font-size: 1.5rem;">Close</button>
        </div>
    </div>
  </div>
</div>

<!-- Image Modal -->
<div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content" style="background: transparent; border: none; padding: 0">
            
            <div class="modal-body p-0">
                <!-- Display the image from the "screenshots" folder -->
                <img id="screenshotImg" src="" alt="Product Image" style="height: 600px; width: 100%; object-fit: contain; border-radius: 10px">
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

<script src="script.js"></script>
<script>
function showPassword(){
   var a = document.getElementById('new_password');
   var b = document.getElementById('eye');
   var c = document.getElementById('eye-slash');

   if(a.type === "password"){
      a.type = "text"
      b.style.opacity = "0";
      c.style.opacity = "1";

   }else {
      a.type = "password"
      b.style.opacity = "1";
      c.style.opacity = "0";
   }

}
function showPassword2(){
   var a = document.getElementById('new_password2');
   var b = document.getElementById('eye2');
   var c = document.getElementById('eye-slash2');

   if(a.type === "password"){
      a.type = "text"
      b.style.opacity = "0";
      c.style.opacity = "1";

   }else {
      a.type = "password"
      b.style.opacity = "1";
      c.style.opacity = "0";
   }

}
</script>
</body>
</html>