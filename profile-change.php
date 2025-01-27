<?php
   session_start();

   include("./connection.php");
    $db = new Database();

    
   if(isset($_POST['but_upload'])){
      $profile = "`avatar`";

      if($_FILES["file"]["name"] !== ""){
         $name = ($_FILES['file']['name']);
         $target_dir = "user_profile/";
         $target_file = $target_dir . basename($_FILES["file"]["name"]);
         // Select file type
         $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
   
         // Valid file extensions
         $extensions_arr = array("jpg","jpeg","png","gif");
   
         // Check extension
         if( in_array($imageFileType,$extensions_arr) ){
            // Upload file
            move_uploaded_file($_FILES['file']['tmp_name'],$target_file);
         }
         $profile = "'".$target_dir."".$name."'";
      }
         
      $id = $_POST["id"];
      $fname = $_POST["fname"];
      $lname = $_POST["lname"];
      $age = $_POST["age"];
      $address = $_POST["address"];
      $username = $_POST["username"];
      $email = $_POST["email"];
      $new_pass = $_POST["new_pass"] !== "" ? "'".password_hash($_POST["new_pass"], PASSWORD_BCRYPT)."'" : "`password`";
      $confirm_pass = $_POST["confirm_pass"];


      if($_POST["new_pass"] == $_POST["confirm_pass"]){

         $query = "UPDATE `user_account` 
         SET `fname`='$fname',
         `lname`='$lname',
         `age`='$age',
         `address`='$address',
         `name`='$username',
         `email`='$email',
         `password`=$new_pass,
         `avatar`=$profile
         WHERE Id = '$id'";


         $db->sql($query);
         $_SESSION["email"] = $email;
         $_SESSION["message"] = "profile-updated";
        
      }
      else{
        $_SESSION["message"] = "confirm-password-not-matched";
      }
      

      
  }
  header("Location: user_profile_update.php");
  exit();

  
  
?>