<?php require_once "controller.php"; ?>
<?php
   //system_settings
   $logo = $db->query("SELECT `logo` FROM `system_settings`")->fetch_assoc()["logo"]; 
?>
<?php 
$email = $_SESSION['email'];
if($email == false){
  header('Location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Create a New Password</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style1.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
<div class="wrapper">
        <div class="container main">
            <div class="row">
                <div class="col-md-6 side-image" style="background-image: url(<?=$logo ?>)"></div>
                <div class="col-md-6 right">
                    <div class="input-box">
                <form action="new-password.php" method="POST" autocomplete="off">
                    <h3 class="text-center">New Password</h3>
                    <?php 
                    if(isset($_SESSION['info'])){
                        ?>
                        <div class="alert alert-success text-center">
                            <?php echo $_SESSION['info']; ?>
                        </div>
                        <?php
                    }
                    ?>
                    <?php
                    if(count($errors) > 0){
                        ?>
                        <div class="alert alert-danger text-center" id="alert" style="position: absolute; top: -22px; left: 0; right: 0">
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
                    <div class="input-field">
                        <input type="password" name="password" placeholder="Create new password" id="newpassword" required>
                        <i class="fas fa-lock"></i>
                        <div class="eye-area">
                                <div class="eye-box" onclick="myNewPassword()">
                                    <i class="fas fa-eye-slash" id="eye-slash"></i>
                                    <i class="fas fa-eye" id="eye"></i>
                                </div>
                            </div>
                    </div>
                    <div class="input-field">
                        <input type="password" name="cpassword" placeholder="Confirm your password" id="newpassword2" required>
                        <i class="fas fa-lock"></i>
                        <div class="eye-area">
                                <div class="eye-box" onclick="myNewPassword2()">
                                    <i class="fas fa-eye-slash" id="eye-slash2"></i>
                                    <i class="fas fa-eye" id="eye2"></i>
                                </div>
                            </div>
                    </div>
                    <div class="input-field">
                        <input class="submit" type="submit" name="change-password" value="Confirm">
                    </div>
                </form>
            </div>
        </div>
    </div>
        </div>  
</div>
    <script src="script.js"></script>  
<script>
    $("#alert").delay(2000).slideUp(200, function() {
        $(this).alert('close');
    }); 
</script>
</body>
</html>