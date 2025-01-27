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
    <title>Login now</title>
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
                <form action="login-user.php" method="POST">
                  <div class="logo" >
                    <img src="<?=$logo ?>" alt="easyclass" />
                    <h4><?=$storeName ?></h4>
                  </div>

              <div class="heading">
                <img src="images/success.png" alt="easyclass" style="height: 100px; width: 100%; object-fit: contain;"/>
                <h4 style="text-align: center">Your account has been successfully created!</h4>
              </div>
                    <div class="alert-success" style="font-size: .8rem; background-color: #d4edda; color: #466d43; text-align: center; border-radius: 5px; padding: 1rem">
                        Now you can login to your registered account.
                        </div>
                    <br>
                    <br>

                <input type="submit" name="login-now" value="Login Now" class="sign-btn" style="font-weight: 600;"/>
              </div>
            </form>

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
</script>
  </body>
</html>