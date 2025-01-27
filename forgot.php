<?php require_once "controller.php"; ?>
<?php
   //system_settings
   $logo = $db->query("SELECT `logo` FROM `system_settings`")->fetch_assoc()["logo"]; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Forgot Password</title>
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
                <form action="forgot.php" method="POST" autocomplete="">
                    <h3 class="text-center">Retrieve your account</h3>
                    <p class="text-center">Enter your email address</p>
                    <?php
                        if(count($errors) > 0){
                            ?>
                            <div class="alert alert-danger text-center" id="alert" style="position: absolute; top: -22px; left: 0; right: 0">
                                <?php 
                                    foreach($errors as $error){
                                        echo $error;
                                    }
                                ?>
                            </div>
                            <?php
                        }
                    ?>
                    <div class="input-field">
                        <input type="email" name="email" placeholder="Enter email address" required value="<?php echo $email ?>">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div class="input-field">
                        <input class="submit" type="submit" name="check-email" value="Continue">
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