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
    <title>Code Verification</title>
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
                <form class="reset-verification-form" action="code-verification.php" method="POST" autocomplete="off">
                    <h3 class="text-center">Code Verification</h3>
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
                        <input type="number" name="otp" placeholder="Enter code" 
                        oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                        maxlength="6" 
                        style="text-align: center"
                        required>
                        <i class="fas fa-key"></i>
                    </div>               
                    <div class="input-field">
                        <input class="submit" type="submit" name="check-reset-otp" value="Submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
<script>
    $("#alert").delay(2000).slideUp(200, function() {
        $(this).alert('close');
    }); 
</script>   
</body>
</html>