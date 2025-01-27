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
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="user_account.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  <style>
    ul {
      --icon-space: 1.3em;
      list-style: none;
      padding: 0;
    }

    li {
      padding-left: var(--icon-space);
    }

    li:before {
      content: "\f00c"; /* FontAwesome Unicode */
      font-family: FontAwesome;
      color: #76a004;
      display: inline-block;
      margin-left: calc( var(--icon-space) * -1 );
      width: var(--icon-space);
    }
    .modal-dialog,
    .modal-content {
        /* 80% of window height */
        height: 75%;
    }

    .modal-body {
        /* 100% = dialog height, 120px = header + footer */
        max-height: calc(100% - 120px);
        overflow-y: scroll;
    }
    .privacy{
      display: block;
      margin-left: auto;
      margin-right: auto;
      width: 50%;
    }
  </style>
  </head>
  <body>
    <div class="wrapper">
        <div class="container main">
          <div class="box">
            <div class="inner-box">
              <div class="forms-wrap">
                <form class="user-form" action="signup-user.php" method="POST" autocomplete="">
                  <div class="logo" >
                    <img src="<?=$logo ?>" alt="" />
                    <h4><?=$storeName ?></h4>
                  </div>

              <div class="heading">
                <h2>Get Started</h2>
                <h6>Already have an account?</h6>
                <a href="login-user.php" class="toggle">Sign in</a>
              </div>
              <?php
                 if (count($errors) == 1) {
                      ?>
                        <div class="alert alert-danger text-center" id="alert" style="position: absolute; width: 80%; top: 40px; left: 0; right: 0; margin: auto">
                            <?php
                              foreach ($errors as $showerror) {
                                  echo $showerror;
                              }
                            ?>
                        </div>
                        <?php
                          } elseif (count($errors) > 1) {
                        ?>
                        <div class="alert alert-danger" id="alert" style="position: absolute; width: 80%; top: 40px; left: 0; right: 0; margin: auto">
                        <?php
                          foreach ($errors as $showerror) {
                            ?>
                            <li>
                                <?php echo $showerror; ?>
                            </li>
                            <?php
                          }
                            ?>
                         </div>
                   <?php
                 }
               ?>

              <div class="actual-form" style="display: flex; flex-direction: row;">
              <div class="input-wrap2" style="margin-right: 1rem">
                  <input
                    type="text"
                    name="fname"
                    class="input-field"
                    required
                  />
                  <label>Firstname</label>
                </div>
                  <div class="input-wrap2">
                  <input
                    type="text"
                    name="lname"
                    class="input-field"
                    required
                  />
                  <label>Lastname</label>
                </div>
                </div>

              <div class="actual-form" style="display: flex; flex-direction: row;">
              <div class="input-wrap2" style="width:20%;margin-right: 1rem">
                  <input
                    type="number"
                    name="age"
                    class="input-field"
                    oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                    maxlength="2" 
                    style="text-align: center"
                    required
                  />
                  <label>Age</label>
                </div>
                  <div class="input-wrap2" style="width: 100%">
                  <input
                    type="text"
                    name="address"
                    class="input-field"
                    required
                  />
                  <label>Address</label>
                </div>
                </div>
              
              
              <div class="actual-form">
                <div class="input-wrap">
                  <input
                    type="text"
                    name="name"
                    class="input-field"

                    required
                  />
                  <label><i class="fas fa-user"></i> Username</label>
              </div>

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

              <div class="actual-form">
                <div class="input-wrap">
                  <input
                    type="password"
                    name="cpassword"
                    id="cpassword"
                    class="input-field"

                    required
                  />
                  <label><i class="fas fa-lock"></i> Confirm Password</label>
                  <div class="eye-area">
                  <div class="eye-box" onclick="showPassword2()">
                    <i class="far fa-eye-slash" id="eye2"></i>
                    <i class="far fa-eye" id="eye-slash2"></i>
                  </div>
                </div>
                </div>

                <input type="submit" name="signup" value="Sign Up" class="sign-btn" style="font-weight: 600"/>
                <!-- Button trigger modal -->
                <a href="#staticBackdrop" data-toggle="modal" data-target="#staticBackdrop" style="text-decoration: none; display: flex; float: right; color: #76a004; font-size: .9rem">Data Privacy Agreement 
                  <img src="images/agreement.png" alt="" class="privacy" style="height: 40px; width: 40px; object-fit: contain;">
                </a>

          
              </div>
              </div>
              </div>
            </form>
            
          </div>

          <div class="carousel">
          </div>
          </div>
        </div>
      </div>
      <!-- Modal -->
      <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header text-center" style="display: flex; flex-direction: column;">
              <img src="images/data-privacy.png" alt="" class="privacy" style="height: 40px; width: 40px; object-fit: contain;">
              <h5 class="modal-title w-100" id="staticBackdropLabel">Data Privacy Policy</h5>
            </div>
            <div class="modal-body" style="text-align: justify;">
              <h6 style="font-size: .8rem">
              We, at Romanteaco Milk Tea Shop, are committed to protecting your privacy and ensuring that customer, do experience and enjoy our 
              offered services, in a secure and safe manner. The Company developed this Privacy Policy with the objective of ensuring compliance 
              with the applicable privacy laws, rules and regulations of the Republic of the Philippines, including but not limited to Republic 
              Act No. 10173, otherwise known as the Data Privacy Act of 2012 (the “Data Privacy Act”), its implementing rules and regulations and 
              rules, regulations and the relevant issuances of the National Privacy Commission of the Philippines (“NPC”).
              </h6>
              <h5 style="color: #76a004; font-size: .9rem">Consent</h5>
              <h6 style="font-size: .8rem">By using our web application, you hereby consent to our Privacy Policy and agree to its terms.</h6>
              <h5 style="color: #76a004; font-size: .9rem;">Information we Collect</h5>
              <h6 style="font-size: .8rem; margin-bottom: .5rem">The personal information that you are asked to provide, and the reasons why you are asked to provide it, 
              will be made clear to you at the point we ask you to provide your personal information.</h6>
              <h6 style="font-size: .8rem; margin-bottom: .5rem">If you contact us directly, we may receive additional information about you such as your name, email address, phone number, the contents 
              of the message and/or attachments you may send us, and any other information you may choose to provide.</h6>
              <h6 style="font-size: .8rem">When you register for an Account, we may ask for your contact information, including items such as name, company name, address, email address, 
              facebook account and contact numbers.
            </h6>
            <h5 style="color: #76a004; font-size: .9rem; margin-bottom: .8rem">How we use your information</h5>
            <h6 style="font-size: .8rem; margin-bottom: .5rem">
              We use the information we collect in various ways, including to:
            </h6>
            <ul style="padding-left: 1rem; font-size: .8rem;">
              <li>Provide, operate, and maintain our web application</li>
              <li>Improve, personalize, and expand our web application</li>
              <li>Understand and analyze how you use our web application</li>
              <li>Develop new products, services, features, and functionality</li>
              <li>Send you emails</li>
              <li>To prevent fraudulent activities (phishing scams, identity theft, identity spoofing etc.)</li>
              <li>To be able to respond to web application, internet, connection and communication issues</li>
            </ul>
            </div>
            <div class="modal-footer">
              <a href="login-user.php">
                <button type="button" class="btn" style="background-color: #fe5461; color: #fff">Decline</button>
              </a>
              <button type="button" class="btn" data-dismiss="modal" style="background-color: #76a004; color: #fff">Accept</button>
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
<script type="text/javascript">
    $(window).on('load', function() {
        $('#staticBackdrop').modal('show');
    });
</script>
  </body>
</html>
