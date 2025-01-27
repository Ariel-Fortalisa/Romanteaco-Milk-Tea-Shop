<?php require_once "controllerUserData.php"; ?>
<?php 

//include("./checkLoginSession.php");
//include("./checkUserSession.php");

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
<?php
include ("connection.php");
             
$db= new Database();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to the Romanteaco</title>
 
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
   .category{
      animation: transitionIn-Y-bottom 2.3s;
   }
   .home{
      animation: transitionIn-Y-bottom 2.3s;
   }
</style>
<body> 
<?php 
$pageLocation = "home.php";
include ("header.php"); ?>
<?php include ("alert-message.php"); ?>
<div class="loader">
   <img src="images/loading.gif" alt="">
</div>
<section class="home" style="background-color: #e4eccd; margin-top: 10rem; border-radius: 4rem">

   <div class="swiper home-slider">

      <div class="swiper-wrapper">

         <div class="swiper-slide slide">
            <?php
               $result = $db->sql("
               SELECT 
                  `product`.`product_id`, 
                  `product`.`product_name`, 
                  `product`.`category_id`, 
                  `category`.`category_name`,
                  `product`.`image_name`
                  FROM `product`
                  INNER JOIN `category` ON `product`.`category_id` = `category`.`category_id`
                  WHERE `product`.`product_id` = '41'
               ")->fetch_assoc();
            echo '
               <div class="content">
                  <span>order online</span>
                  <h3>'.$result["product_name"].'</h3>
                  <a href="order-products.php?category_id='.$result["category_id"].'&category_name='.$result["category_name"].'" class="btn">View menu</a>
               </div>
               <div class="image1">
                  <img src='.$result["image_name"].' alt="">
               </div>';
            ?>
         </div>

         <div class="swiper-slide slide">
            <?php
               $result = $db->sql("
               SELECT 
                  `product`.`product_id`, 
                  `product`.`product_name`, 
                  `product`.`category_id`, 
                  `category`.`category_name`,
                  `product`.`image_name`
                  FROM `product`
                  INNER JOIN `category` ON `product`.`category_id` = `category`.`category_id`
                  WHERE `product`.`product_id` = '8'
               ")->fetch_assoc();
            echo '
               <div class="content">
                  <span>order online</span>
                  <h3>'.$result["product_name"].'</h3>
                  <a href="order-products.php?category_id='.$result["category_id"].'&category_name='.$result["category_name"].'" class="btn">View menu</a>
               </div>
               <div class="image1">
                  <img src='.$result["image_name"].' alt="">
               </div>';
            ?>
         </div>

         <div class="swiper-slide slide">
            <?php
               $result = $db->sql("
               SELECT 
                  `product`.`product_id`, 
                  `product`.`product_name`, 
                  `product`.`category_id`, 
                  `category`.`category_name`,
                  `product`.`image_name`
                  FROM `product`
                  INNER JOIN `category` ON `product`.`category_id` = `category`.`category_id`
                  WHERE `product`.`product_id` = '26'
               ")->fetch_assoc();
            echo '
               <div class="content">
                  <span>order online</span>
                  <h3>'.$result["product_name"].'</h3>
                  <a href="order-products.php?category_id='.$result["category_id"].'&category_name='.$result["category_name"].'" class="btn">View menu</a>
               </div>
               <div class="image1">
                  <img src='.$result["image_name"].' alt="">
               </div>';
            ?>
         </div>

         <div class="swiper-slide slide">
         <?php
               $result = $db->sql("
               SELECT 
                  `product`.`product_id`, 
                  `product`.`product_name`, 
                  `product`.`category_id`, 
                  `category`.`category_name`,
                  `product`.`image_name`
                  FROM `product`
                  INNER JOIN `category` ON `product`.`category_id` = `category`.`category_id`
                  WHERE `product`.`product_id` = '29'
               ")->fetch_assoc();
            echo '
               <div class="content">
                  <span>order online</span>
                  <h3>'.$result["product_name"].'</h3>
                  <a href="order-products.php?category_id='.$result["category_id"].'&category_name='.$result["category_name"].'" class="btn">View menu</a>
               </div>
               <div class="image1">
                  <img src='.$result["image_name"].' alt="">
               </div>';
            ?>
         </div>

      </div>

      <div class="swiper-pagination"></div>
      <div class="swiper-button-next" style="color: #76a004; padding-left: 5rem"></div>
    <div class="swiper-button-prev" style="color: #76a004; padding-right: 5rem"></div>

   </div>

</section>

<section class="category">

   <h1 class="title">food category</h1>

   <div class="box-container">
      <?php
         $result = $db->sql("
            SELECT * FROM `category` WHERE 1
         ");
         while($row = $result->fetch_assoc()){
            echo '
               <a href="order-products.php?category_id='.$row["category_id"].'&category_name='.$row["category_name"].'" class="box">
                  <img src="'.$row["category_logo"].'" alt="">
                  <h3>'.$row["category_name"].'</h3>
               </a>
            ';
         }
      ?>

   </div>

</section>
<?php include ("footer.php"); ?>

<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

<script src="script.js"></script>
<script>

var swiper = new Swiper(".home-slider", {
   loop:true,
   grabCursor:true,
   effect: "flip",
   navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
   pagination: {
      el: ".swiper-pagination",
      dynamicBullets: true,
      clickable:true,
   },
   autoplay: {
    delay: 4000,
    disableOnInteraction: false,
    pauseOnMouseClick: true,
  },
});

</script>
<script>
    $("#alert-message")
    .show()
    .delay(3500)
    .queue(function(n){
        $(this).hide();
        n();
    });
  </script>
</body>
</html>