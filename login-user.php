<?php require_once "controllerUserData.php"; ?>
<?php
   //system_settings
   $logo = $conn->query("SELECT `logo` FROM `system_settings`")->fetch_assoc()["logo"];
   $storeName = $conn->query("SELECT `store_name` FROM `system_settings`")->fetch_assoc()["store_name"];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Log in</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
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
                <form class="user-form" action="login-user.php" method="POST" autocomplete="">
                  <div class="logo" >
                    <img src="<?=$logo ?>" alt="easyclass" />
                    <h4><?=$storeName ?></h4>
                  </div>

              <div class="heading">
                <h2>Welcome Back</h2>
                <h6>Not registred yet?</h6>
                <a href="signup-user.php" class="toggle">Sign up</a>
              </div>
              <?php
                if (count($errors) > 0) {
                  ?>
                  <div class="alert alert-danger text-center" id="alert" style="position: absolute; width: 80%; top: 40px; left: 0; right: 0; margin: auto">
                     <?php
                        foreach ($errors as $showerror) {
                          echo $showerror;
                        }
                      ?>
                    </div>
                  <?php
                }
                            
              ?>
              <div class="actual-form">
                <div class="input-wrap">
                  <input
                    type="email"
                    name="email"
                    class="input-field"

                    required
                  />
                  <label><i class="fas fa-envelope"></i> Email Address</label>
                </div>

                <div class="input-wrap">
                  <input
                    type="password"
                    name="password"
                    id="password"
                    class="input-field"
                    required
                  />
                  <label><i class="fas fa-lock"></i> Password
                </label>
                <div class="eye-area">
                  <div class="eye-box" onclick="showPassword()">
                    <i class="far fa-eye-slash" id="eye"></i>
                    <i class="far fa-eye" id="eye-slash"></i>
                  </div>
                </div>
                </div>

                <input type="submit" name="login" value="Sign In" class="sign-btn" style="font-weight: 600"/>

                <p class="text">
                  <a href="forgot-password.php">Forgot password?</a>
                </p>
                <div class="login-admin" onclick="location.href='login.php';" style="cursor: pointer;float:right">
                    <img src="images/admin-user.png" alt="" style="height: 50px; width: 62px; object-fit: contain;">
              </div>
              </div>
            </form>

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
   var a = document.getElementById('password');
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
</script>
  </body>
</html>
