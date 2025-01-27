<?php require_once "controller.php"; ?>
<?php
   //system_settings
   $logo = $db->query("SELECT `logo` FROM `system_settings`")->fetch_assoc()["logo"]; 
?>
<?php
if($_SESSION['info'] == false){
    header('Location: login.php');  
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style1.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>
<body>
<div class="wrapper">
    <div class="container main">
        <div class="row">
        <div class="col-md-6 side-image" style="background-image: url(<?=$logo ?>)"></div>
                <div class="col-md-6 right">
                    <div class="input-box">
            <?php 
            if(isset($_SESSION['info'])){
                ?>
                <div class="alert alert-success text-center">
                <?php echo $_SESSION['info']; ?>
                </div>
                <?php
            }
            ?>
                <form action="login.php" method="POST">
                    <div class="input-field">
                        <input class="submit" type="submit" name="login-now" value="Log Now">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>    
</body>
</html>