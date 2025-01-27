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
    <title>Update Profile</title>
 
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
$pageLocation = "user_profile_update.php";
include ("header.php"); ?>
<?php include ("alert-message.php"); ?>   
<div class="loader">
   <img src="images/loading.gif" alt="">
</div>
  <section class="update-profile">

   <h2 class="title"></br></br>update profile</h2>

<?php
 $query = "SELECT * FROM `user_account` WHERE `Id` = '".$_SESSION['Account_ID']."'";
   $id = $db->sql("SELECT `Id` FROM `user_account` WHERE `Id` = '".$_SESSION["Account_ID"]."'")->fetch_assoc()["Id"];
   $fname = $db->sql("SELECT `fname` FROM `user_account` WHERE `Id` = '".$_SESSION["Account_ID"]."'")->fetch_assoc()["fname"];
   $lname= $db->sql("SELECT `lname` FROM `user_account` WHERE `Id` = '".$_SESSION["Account_ID"]."'")->fetch_assoc()["lname"];
   $age= $db->sql("SELECT `age` FROM `user_account` WHERE `Id` = '".$_SESSION["Account_ID"]."'")->fetch_assoc()["age"];
   $address= $db->sql("SELECT `address` FROM `user_account` WHERE `Id` = '".$_SESSION["Account_ID"]."'")->fetch_assoc()["address"];
   $username= $db->sql("SELECT `name` FROM `user_account` WHERE `Id` = '".$_SESSION["Account_ID"]."'")->fetch_assoc()["name"];
   $email= $db->sql("SELECT `email` FROM `user_account` WHERE `Id` = '".$_SESSION["Account_ID"]."'")->fetch_assoc()["email"];
?>


   <form action="profile-change.php" method="POST" enctype="multipart/form-data">
   <input type="hidden" name="id" value="<?php echo $id?>">
      <img src="<?php echo $fetch_info['avatar'] ?>" alt="">
      <div class="flex">
         <div class="inputBox">
            <span>username :</span>
            <input type="text" name="username" value="<?php echo $username;?>" placeholder="Update Username" required class="box">
            <span>First Name :</span>
            <input type="text" name="fname" value="<?php echo $fname;?>" placeholder="Update First Name" required class="box">
            <span style="text-transform: none">Age (y/o):</span>
            <input type="number" name="age" 
               style="width: 50%; text-align: center"
               oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
               maxlength="2"
               value="<?php echo $age;?>" placeholder="Enter Age" required class="box">
            <p class="text-left" style="font-size:.9rem;position:absolute;margin-top:1rem"><i class="text-muted">*Leave blank if you don't want to</i></p>
            <span style="margin-top:1.5rem">new password :</span>
            <input type="password" name="new_pass" id="new_password" placeholder="Enter New Password" class="box" style="text-transform:none">
            <div class="eye-area">
               <div class="eye-box" onclick="showPassword()">
                  <i class="far fa-eye-slash fa-xl" id="eye"></i>
                  <i class="far fa-eye fa-xl" id="eye-slash"></i>
               </div>
            </div>
         </div>
         <div class="inputBox">
            <span>email :</span>
            <input type="email" name="email" value="<?php echo $email;?>" placeholder="Update Email" required class="box" style="text-transform: none">
            <span>Last Name :</span>
            <input type="text" name="lname" value="<?php echo $lname;?>" placeholder="Update Last Name" required class="box">
            <span>Address :</span>
            <input type="text" name="address" value="<?php echo $address;?>" placeholder="Update Address" required class="box">
            <span style="margin-top:1.5rem">confirm password :</span>
            <input type="password" name="confirm_pass" id="new_password2" placeholder="Re-Enter Password" class="box" style="text-transform:none">
            <div class="eye-area">
               <div class="eye-box" onclick="showPassword2()">
                  <i class="far fa-eye-slash fa-xl" id="eye2"></i>
                  <i class="far fa-eye fa-xl" id="eye-slash2"></i>
               </div>
            </div>
         </div>
      </div>
         <div class="inputBox2">
            <span>update pic :</span>
            <input type="file" name="file" accept="image/jpg, image/jpeg, image/png" class="box" style="padding:.9rem 1.4rem;text-transform:none;">
         </div>
      <div class="flex-btn">
         <input type="submit" class="btn" value="update profile" name="but_upload">
         <a href="home.php" class="option-btn">go back</a>
      </div>
   </form>

</section>



<?php include ("footer.php"); ?>

<?php include("ordering_modal.php"); ?>
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