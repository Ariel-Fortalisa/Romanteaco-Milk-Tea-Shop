<?php
   //system_settings
   $email = $db->sql("SELECT `email` FROM `system_settings`")->fetch_assoc()["email"];
   $hours = $db->sql("SELECT `opening_hours` FROM `system_settings`")->fetch_assoc()["opening_hours"];
   $address = $db->sql("SELECT `address` FROM `system_settings`")->fetch_assoc()["address"];
   $number = $db->sql("SELECT `contact_number` FROM `system_settings`")->fetch_assoc()["contact_number"]; 
?>
<footer class="footer">

    <section class="box-container">
 
       <div class="box">
          <img src="images/email-icon.png" alt="">
          <h3>our email</h3>
          <a style="text-transform: none"><?=$email ?></a>
       </div>
 
       <div class="box">
          <img src="images/clock-icon.png" alt="">
          <h3>opening hours</h3>
          <a style="text-transform: none"><?=$hours ?></a>
       </div>
 
       <div class="box">
          <img src="images/map-icon.png" alt="">
          <h3>our address</h3>
          <a><?=$address ?></a>
       </div>
 
       <div class="box">
          <img src="images/phone-icon.png" alt="">
          <h3>our number</h3>
          <a><?=$number ?></a>
       </div>
 
    </section>

   <div class="credit">&copy; copyright @ 2023 by <span>Romanteaco milk tea shop</span> | all rights reserved!</div>

</footer>