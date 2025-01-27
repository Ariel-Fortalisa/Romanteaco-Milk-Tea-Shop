<?php require_once "controllerUserData.php"; ?>
<?php
   //system_settings
   $logo = $conn->query("SELECT `logo` FROM `system_settings`")->fetch_assoc()["logo"];
   $storeName = $conn->query("SELECT `store_name` FROM `system_settings`")->fetch_assoc()["store_name"];
?>
<?php 
$email = $_SESSION['email'];
if($email == false){
  header('Location: login-user.php');
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Create a New Password</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="user_account.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  </head>
  <body>
    <div class="wrapper">
        <div class="container main">
          <div class="box">
            <div class="inner-box">
              <div class="forms-wrap">
                <form action="new-pass.php" method="POST" autocomplete="off">
                  <div class="logo" >
                    <img src="<?=$logo ?>" alt="easyclass" />
                    <h4><?=$storeName ?></h4>
                  </div>

              <div class="heading">
                <h4 style="text-align: center">New Password</h4>
              </div>
              <?php 
                    if(isset($_SESSION['info'])){
                        ?>
                        <div class="alert-success" style="font-size: .8rem; background-color: #d4edda; color: #466d43; text-align: center; border-radius: 5px; padding: 1rem">
                            <?php echo $_SESSION['info']; ?>
                        </div>
                        <?php
                    }
                    ?>
                    <?php
                    if(count($errors) > 0){
                        ?>
                        <div class="alert alert-danger text-center" id="alert" style="position: absolute; width: 80%; top: 40px; left: 0; right: 0; margin: auto">
                            <?php
                            foreach($errors as $showerror){
                                echo $showerror;
                                
                            }
                            ?>
                        </div>
                        <script>
                            $(".alert-success").css("display", "none");
                        </script>
                        <?php
                    }
                    ?>
                    <br>
              <div class="actual-form">
                <div class="input-wrap">
                  <input
                    type="password"
                    name="password" 
                    id="npassword"
                    class="input-field"
                    required
                  />
                  <label style="text-align: center"><i class="fas fa-lock"></i> Create new password</label>
                  <div class="eye-area">
                  <div class="eye-box" onclick="showPassword()">
                    <i class="far fa-eye-slash" id="eye"></i>
                    <i class="far fa-eye" id="eye-slash"></i>
                  </div>
                </div>
                </div>
                <div class="actual-form">
                <div class="input-wrap">
                  <input
                    type="password"
                    name="cpassword" 
                    id="cpassword"
                    class="input-field"
                    required
                  />
                  <label style="text-align: center"><i class="fas fa-lock"></i> Confirm your password</label>
                  <div class="eye-area">
                  <div class="eye-box" onclick="showPassword2()">
                    <i class="far fa-eye-slash" id="eye2"></i>
                    <i class="far fa-eye" id="eye-slash2"></i>
                  </div>
                </div>
                </div>

                <input type="submit" name="change-password" value="Confirm" class="sign-btn" style="font-weight: 600;"/>
              </div>
            </form>
            </div>
          </div>

          <div class="carousel">
          </div>
          </div>
        </div>
      </div>
      <div>
</div>

    <!-- Javascript file -->
    <script src="login.js"></script>
    <script src="script.js"></script>
<script>
    $("#alert").delay(2000).slideUp(200, function() {
        $(this).alert('close');
    }); 

  function showPassword(){
   var a = document.getElementById('npassword');
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
   var a = document.getElementById('cpassword');
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
