
<?php require_once "controllerUserData.php";
date_default_timezone_set('Asia/Manila');
?>
<?php
   //system_settings
   $storeName = $db->sql("SELECT `store_name` FROM `system_settings`")->fetch_assoc()["store_name"];
   $logo = $db->sql("SELECT `logo` FROM `system_settings`")->fetch_assoc()["logo"];
   $gcash_qr = $db->sql("SELECT `gcash_qr` FROM `system_settings`")->fetch_assoc()["gcash_qr"];
   $gcash_number = $db->sql("SELECT `gcash_number` FROM `system_settings`")->fetch_assoc()["gcash_number"]; 
?>
<?php 

if(isset($_SESSION["level"])){
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
               header('Location: user-otp.php');
         }
      }
   }else{
      header('Location: login-user.php');
   }
}
?>
   <!-- modal checkout  -->
   <form action="add_order.php" method="post" enctype="multipart/form-data">
   <div id="checkout-btn" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content" style="max-width: 90%; height: 500px; border-radius: 1rem; margin: auto;"> 
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="font-size: 4rem">
                     <span aria-hidden="true">
                        <div class="fas fa-xmark fa-2xs" style="color: #000;"></div>
                     </span>
                     </button>
                    <h1 class="checkout-title" style="text-align: center; margin-top: 1.3rem"><b>Checkout</b></h1> 
                    <div class="modal-body" style="padding-top: 1rem; width: 100%; overflow: auto; padding: 0; margin: 0">
                    <button type="button" id="order_from" class="border border-primary" style="border-radius: .5rem; padding: 1.5rem 0 1.5rem 1.5rem; display: flex; align-items: center; width: 90%; margin: auto; text-align: left;" onclick="orderFrom()">
                    <div style="display: flex; flex-direction: column; flex: 10">
                    <h3 style="color: black"><b><?php echo $fetch_info['name'] ?></b></h3>
                    <h4 style="text-transform: none"><?php echo $fetch_info['email'] ?></h4>
                    </div>
                    <img src="images/next.png" alt="" style="height: 15px; width: 10%; object-fit: contain; float: right; top: 1rem; flex: 1">
                  </button>
                    <h3 class="payment" style="display: flex; justify-content: space-between; margin-top: 2rem; font-weight: 600; padding-left: 1rem">Order Details
                    <p id="dnto_text" style="font-size: 1.5rem; padding-right: 2rem; color: #76a004">Dine-in</p></h3>

                    
                    <?php
                        $userID = isset($_SESSION["Account_ID"]) ? $_SESSION["Account_ID"] : "";

                        $data = $db->select("cart", "*", "user_id = '$userID'");
                        $total = 0;
                        while($row = $data->fetch_assoc()) {
                           echo '<div class="details" style="border-radius: .5rem; background-color: #eee; display: flex; padding: 1rem; width: 90%; margin: auto">
                           <img src="'.$row["image"].'" style="height: 7rem; width: 20%; object-fit: contain;">'.' 
                              <div style="display: flex; flex-direction: column; flex: 5; justify-content: space-between; font-size: 1.5rem; align-items: start; padding-left: 1rem">'.$row["order_name"].'
                              <div style="font-size: 1.5rem; padding-left: 1rem"><b>₱ '.number_format($row["subtotal"], 2).'</b></div></div>
                           <div class="align-text-bottom" style="font-size: 1.5rem; position: relative; flex: 1">
                           <p style="position: absolute; text-align: center; right: 0; bottom: 0"><b>Qty: '.$row["quantity"].'</b></p></div></div><br>';
                           
                           echo '<input type="hidden" name="product_id[]" value="'.$row["product_id"].'">';
                           echo '<input type="hidden" name="size_id[]" value="'.$row["size_id"].'">';
                           echo '<input type="hidden" name="order_name[]" value="'.$row["order_name"].'">';
                           echo '<input type="hidden" name="quantity[]" value="'.$row["quantity"].'">';
                           echo '<input type="hidden" name="subtotal[]" value="'.$row["subtotal"].'">';

                           $total += $row["subtotal"];
                        }
                     ?>
                     
                     <div class="adv_order" id="adv_order_time" style="padding: 2rem; width: 100%; text-align: center">
                        <!--Time input here-->
                     </div>

                     <h3 class="payment" style="margin-top: 2rem; font-weight: 600; padding-left: 1rem">Payment Method</h3>
                     <div class="pay-method" style="text-align: center; margin: auto; padding-bottom: 1rem">
                     <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        
                        <label class="btn btn-outline-warning active prefer_1" id="prefer_1_label" style="font-size: 2rem; color: black; margin: 1.7rem; padding: 1rem; border-radius: .5rem" onclick="payMethod('GCash')">
                        <input class="radio prefer_1" type="radio" name="options" id="prefer_1" autocomplete="off" value="GCash" checked>
                        <img class="prefer_1" src="images/g-cash.png" alt="" style="height: 75px; width: 80px; object-fit: contain;"><b>GCash</b></label>

                        <label class="btn btn-outline-warning prefer_2" style="font-size: 2rem; color: black; margin: 1.7rem; padding: 1rem; border-radius: .5rem" onclick="payMethod('Cash')">
                        <input class="radio prefer_2" type="radio" name="options" id="prefer_2" autocomplete="off" value="Cash">
                        <img class="prefer_2" src="images/cash.png" alt="" style="height: 75px; width: 100px; object-fit: contain;"><b>Cash</b></label>
                     </div>
                     </div>
                     <div class="proof-payment" style="position: relative">
                     <br>
                     <div class="pay" id="pay">
                     <div class="border border-primary" id="gcash-method" style="font-size: 1.8rem; width: 70%; margin: auto; text-align: center; padding: 1rem; border-radius: .5rem">
                     <br>
                     <b style="text-transform: uppercase;">Scan to pay here</b>
                     <img src="<?=$gcash_qr ?>" style="height: 18rem; width: 100%; object-fit: contain; padding-top: 1rem; padding-bottom: 2rem">
                     <p style="line-height: normal; text-transform: capitalize; font-size: 1.3rem;"><b>Or copy<br>gcash number</b></p>
                     <div class="copy-text" style="text-align: center">
                        <input type="text" size="10" class="text" value="<?=$gcash_number ?>" readonly>
                        <br>
                        <button type="button"><i class="far fa-copy" ></i></button>
                     </div>
                     </div>                  
                        <br>
                        <br>
                           <div class="proof-receipt" id="ss-image">
                           <label style="font-size: 1.5rem">Screenshot
                           <div class="bs-example">
                              <p><button type="button" id="trm" class="btn btn-lg" data-toggle="popover" title="Screenshot Reminder:" data-placement="top" data-content="Please provide a screenshot of your GCash payment receipt.">
                                 <i class="fa-solid fa-question fa-lg"></i></button></p>
                           </div>
                        </label><br>
                        </div>
                        <br>
               <!-- User Image input -->
                  <div class="form-group" id="upload-ss">
                     <input type="file" name="file" id="file" accept="image/*" class="input-file" required>
                     <label for="file" class="btn btn-tertiary js-labelFile" style="color: #000;background-color:#eee;border: 1px solid #555;width: 220px;border-radius:.5rem;line-height: 30px;padding: .5rem;margin: auto;display: block;">
                        <i class="icon fa fa-check"></i>
                        <span class="js-fileName" style="text-transform: none; font-size: 1.2rem"> Choose a file</span>
                     </label>
                  </div>

                        <br>  
                        <br>  
                        <div class="checkbox" id="check-terms">
                           <label class="customcheck">By clicking, you are confirming that you have read, understood and agree to Romanteaco 
                           <input type="checkbox" id="check" required>
                           <a class="terms-btn" id="terms" data-toggle="modal" data-target="#terms-btn" style="text-decoration: none; color: #76a004"><strong>Terms and Condition.</strong></a>
                           <?php include("terms-condition.php"); ?>
                              <span class="checkmark"></span>
                           </label>
                        </div>                
                     </div>
                     <div class="border border-primary" id="cash-method" style="position: absolute; z-index: -1; top: 20%; font-size: 1.5rem; width: 80%; left: 0; right: 0; margin: auto; text-align: center; padding: 1rem; border-radius: .5rem; opacity: 0.0001">
                        <img src="images/cash-counter.png" alt="" style="height: 19rem; width: 100%; object-fit: contain; padding-top: 1rem; padding-bottom: 2rem"><br><b style="text-transform: none">Note: Your name will call at  <br>the counter for your order payment<br> before we approved your order.</b></div>
                     </div>
                     </div>
                    <div class="modal-footer" style="display: flex; flex-direction: column; padding: 1rem">
                        <h2 class="checkout-price" id="total-checkout" style="width: 100%;"><span style="font-size: 1.8rem;">Total: </span><b><span style="float:right;"> ₱ <?php echo number_format($total, 2); ?></span></b></h2>
                        
                        <!--Hidden Inputs-->
                        <input type="hidden" id="dnto" name="dnto" value="Dine-in">
                        <input type="hidden" id="pay_method" name="pay_method" value="GCash">
                        <input type="hidden" id="total" name="total" value="<?php echo $total; ?>">
                        <button type="submit" class="order" value="Save name" name="but_upload" style="border-radius: .5rem; width: 100%; font-size: 2rem; font-weight: 600;">Place Order</button>    

                     </div>     
                  </div>
                  </div>
               </div>
         </form>

   <header class="header">
      <a href="home.php" class="logo" style="color: #76a004"><?php echo $storeName?>.</a>

      <?php
         //session_start();
         $userId = isset($_SESSION["Account_ID"]) ? $_SESSION["Account_ID"] : "0";
   
         //mysql for cart list
         $data = $db->sql("SELECT * FROM `cart` WHERE `user_id` = '$userId'");
      ?>
      
      <div class="icons">
      <?php if(isset($_SESSION["Account_ID"])) { ?>
         <div class="fas fa-bell" id="notif-btn">
            
            <span id="notif_count" class="position-absolute top-0 start-100 translate-middle badge ms-5" style="padding: .3rem .5rem; background-color: #76a004; color: #fff">
               0
            </span>
         </div>
         <div class="fas fa-shopping-cart" id="cart-btn">
            <?=
               $data->num_rows > 0 ? 
               '<span id="cart_count" class="position-absolute top-0 start-100 translate-middle badge ms-5" style="padding: .3rem .5rem; background-color: #f35a36; color: #fff">
                  '.$data->num_rows.'
               </span>' : 
               ''
            ?>
            
         </div>
         <?php } ?>
         <div class="fas fa-user" id="account-btn"></div>
      </div>
      
      <div class="profile">
      <?php if(isset($_SESSION["Account_ID"])) {?>
         <img src="<?php echo $fetch_info['avatar'] ?>" alt="">
         <p><?php echo $fetch_info['name'] ?></p>
         <a href="user_profile_update.php" class="btn"><i class="fa-solid fa-user"></i>&nbsp;update profile</a>
         <a href="order_history.php" class="btn" style="background-color: #6b94b2;"><i class="fa-solid fa-clock-rotate-left"></i>&nbsp;Order History</a>
         <button type="button" class="logout-btn" data-toggle="modal" data-target="#user_logout"><i class="fa-solid fa-right-from-bracket"></i>&nbsp;Logout</button>
         <?php }else{?>
            <img src="images/profile.png" alt="">
            <p></p>
            <a href="login-user.php" class="btn">Login</a>
            <div class="separator text-muted pt-3">or</div>
            <a href="signup-user.php" class="btn" style="background-color: #fff; color: #76a004; border: 2px solid #76a004">Sign Up</a>
         <?php }?>
      </div>

      <div class="notif">
      <div class="notif-header d-flex justify-content-between">
      <h2 style="text-align: left; font-weight: 900; padding-right: 7rem; padding-top: .5rem">Notifications</h2>
      </div>
  
      <div id="notif-body" class="notif-body">
         
         
      </div>
      </div>

      <div class="cart">
      <div class="cart-header justify-content-between">
      <h2 style="text-align: left; font-weight: 900; padding-right: 1rem; padding-top: .5rem">My <br>Order</h2>
      <div class="btn-group btn-group-toggle" data-toggle="buttons" id="dnto_button" style="width: 60%; margin: 0; padding: 0">
         <label class="btn btn-outline-warning active" style="font-size: 1.4rem; color: black;" onclick="dnto('dine-in')">
         <input class="radio" type="radio" name="options" id="prefer_1" autocomplete="off" value="Dine-in" checked>
         <img src="images/dine-in.png" alt="" class="dinein" style="height: 18px; width: 18px; object-fit: contain;"> Dine-in</label>

         <label class="btn btn-outline-warning" style="font-size: 1.4rem; color: black;" onclick="dnto('take-out')">
         <input class="radio" type="radio" name="options" id="prefer_2" autocomplete="off" value="Take-out">
         <img src="images/take-away.png" alt="" class="takeout" style="height: 18px; width: 18px; object-fit: contain;"> Take-out</label>
      </div>
      <form action="./deletecart.php" method="post">
      <input type="hidden" name="page_name" value="<?=$pageLocation ?>">
      <div class="delete_all">
         <button id="delete_all_button" type="submit" class="btn btn-danger" style="padding: 1rem 1.2rem; font-weight: 600; letter-spacing: .2rem; background-color: #f35a36; border-color: #f35a36; color: #fff">
            <i class="fas fa-trash-can fa-lg" aria-hidden="true" name="delete_all"></i></button>
         </div>
      </form>
      </div>
      <div class="orders">
      <table style="width: 100%">
            <tbody id="cart-body" style="padding-top: 5rem;">
               
            </tbody>
         </table>
      </div>   
      <div class="cart-footer">
         <h2 class="order-price" id="cart_total"><p>Total:</p><b>₱0.00</b></h2>
            <div class="checkbox" id="adv_checkbox">
               <label class="checkbox-wrapper">
                  <input type="checkbox" class="checkbox-input" id="adv_order" onchange="AdvanceOrder(this)"/>
                  <span class="checkbox-tile">
                     <span class="checkbox-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-check" viewBox="0 0 16 16"> <path d="M11.354 6.354a.5.5 0 0 0-.708-.708L8 8.293 6.854 7.146a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z"/> 
                           <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/> 
                        </svg>
                     </span>
                     <span class="checkbox-label">Advance <br>Order</span>
                  </span>
               </label>
            </div>
         <button type="button" class="checkout-btn" id="checkout_cart" data-toggle="modal" data-target="#checkout-btn" style="font-size: 1.8rem">Checkout
            <img src="images/next.png" alt="" style="height: 25px; width: 10%; object-fit: contain; float: right;"></button>
      </div>
      </div>
         <script>
            function AdvanceOrder(e){
               let date = new Date();
               let hour = date.getHours();
               let min = date.getMinutes();

               if(hour == 23){
                  hour = 0;
               }
               else{
                  hour++;
               }

               if(hour < 10){
                  hour = "0"+hour;
               }
               if(min < 10){
                  min = "0"+min;
               }

               var minTime = "";
               if(hour < 9){
                  minTime = "09:00";
                  
                  //minTime = hour+":"+min;
               }
               else{
                  
                  minTime = hour+":"+min;
               }
               //alert(minTime);


               // max="20:00"

               if(e.checked) {
                  //$("#prefer_2").prop("checked", false);
                  $("#prefer_1").click();
                  $(".prefer_2").css("display", "none");
                  
                  $("#adv_order_time").html(`
                  <h3 class="adv" style="margin-top: 2rem; font-weight: 600; float: left; padding-bottom: 1rem">Advance Order</h3>
                     <div class="adv_order" style="border-radius: .5rem; background-color: #e4eccd; display: flex; padding: 1.3rem; width: 90%; margin: auto">
                        <h4 style="text-transform: none; color: #000"><img src="images/note.png" alt="" style="height: 5rem; width: 100%; object-fit: contain; padding-bottom: 1rem">Estimed time must be <span style="color: #76a004;"><strong>1 hour</strong></span> ahead based on the current time of the customers order.
                        </h4>
                     </div>
                     <br>
                     <input type="time" name="estimatedArrival" value="${hour}:${min}" min="${minTime}" max="20:00" style="text-transform: none; font-weight: 600" required/>
                  `);
               } else{
                  //$("#prefer_2").prop("checked", false);
                  $("#prefer_1").click();
                  $(".prefer_2").css("display", "inline");
                  $("#adv_order_time").html("");
               }
            };
         </script>
      <?php
         
         $cartCount = 0;
         $sub_total = 0;
         $htmlOutput = '';
         $cartEmpty = '';
         if ($data->num_rows > 0) {
            // output data of each row
            while($row = $data->fetch_assoc()) {
               $htmlOutput .= '
                  <tr style="border-bottom: 1px solid gray;">
                     <td><img src="'.$row["image"].'" style="height: 7rem; width: 100%; object-fit: contain;"></td>
                     <td style="font-size: 13px; width: 30%;">'.$row["order_name"].'</td>
                     <td style="font-size: 13px">&emsp;'.$row["quantity"].'×</td>
                     <td style="font-size: 13px; width: 80px;">&emsp;₱ '.number_format($row["subtotal"],2).'</td>
                     <td>
                        
                        <form action="./removecart.php" method="post">
                        <input type="hidden" name="page_name" value="'.$pageLocation.'" >
                        <button type="submit" class="btn" id="cart_remove'.$row["cart_id"].'" name="remove" value="'.$row["cart_id"].'" 
                           style="background-color: #eee; border-color: #f35a36; color: #f35a36">
                              <i class="fas fa-xmark fa-xl" aria-hidden="true" name="clear"></i>
                        </button>
                        </form>
                     </td>
                  </tr>
               ';
               $cartCount += 1;
               $sub_total += $row["subtotal"];
               $total = number_format($sub_total, 2);
               
            }
            echo '
                  <script>
                     $("#cart-body").append(`'.$htmlOutput.'`);
                     $("#cart_total").html("<p>Total:</p><b>₱'.$total.'</b>");
                  </script>
               ';
         }
         else{
            $cartEmpty .= '
            <div class="zero_cart" style="padding-top: 2rem">
               <img src="images/empty-cart.png" alt="" style="height: 50%; width: 40%; object-fit: contain;">
                  <h3 style="text-transform: none;">Your Cart is <span style="color: #ff0000">Empty!</span></h3>
                  <h5 style="padding-top: 2rem; color: #666; text-transform: none;">Must add items on the cart </br>before you proceed to checkout.</h5>
            </div>
            ';
            echo '
               <script>
                  $("#cart-body").append(`'.$cartEmpty.'`);
                  $("#dnto_button").css("visibility", "hidden");
                  $("#delete_all_button").css("visibility", "hidden");
                  $("#adv_checkbox").css("visibility", "hidden");
                  $("#checkout_cart").prop("disabled", true)
               </script>
            ';
         }
      ?>   
  </header>
  <div id="user_logout" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog  modal-dialog-centered" role="document">
                <div class="modal-content">   
                    <div class="modal-body">
                    <div class="logout-image">
                        <img src="images/close.png" alt="">
                     </div>
                     <div class="logout" style="padding: 1.5rem .7rem; text-align: center;">
                        <h1 style="text-transform: none">Are you sure, <br>you want to logout?</h1>
                     </div>
                    <div class="modal-footer justify-content-around">
                        <button type="button" class="logout-no" data-dismiss="modal">Cancel</button>
                        <button onclick="location.href='logout-user.php'"type="button" class="logout-yes">Yes, Logout</button>
                    </div>
                </div>
            </div>
        </div>
   </div>

   <script>
      
      function orderNotifAjax(){
         $.post("orderNotifAjax.php", 
            {userId: "<?=isset($_SESSION["Account_ID"]) ? $_SESSION["Account_ID"] : "0"?>"},
            function(data, status){
               $("#notif-body").html(data);
            }
         );
      }
      orderNotifAjax();
      setInterval(function(){orderNotifAjax()}, 10000);

      let profile = document.querySelector('.profile');
      document.querySelector('#account-btn').onclick = () =>{
         profile.classList.toggle('active');
         cart.classList.remove('active');
         notif.classList.remove('active');
      }
      <?php if(isset($_SESSION["Account_ID"])) { ?>
      
      let cart = document.querySelector('.cart');

      document.querySelector('#cart-btn').onclick = () =>{
         cart.classList.toggle('active');
         profile.classList.remove('active');
         notif.classList.remove('active');
      }

      let notif = document.querySelector('.notif');

      document.querySelector('#notif-btn').onclick = () =>{
         notif.classList.toggle('active');
         cart.classList.remove('active');
         profile.classList.remove('active');
      }
      <?php } ?>
   </script>
   