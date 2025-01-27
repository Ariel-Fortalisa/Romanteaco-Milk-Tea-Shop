<?php
    //function for showing alert box
    function alertMessage($color, $message){
        echo '
            <div 
                id="alert-box"
                class="alert alert-'.$color.' alert-dismissible fade show shadow-lg" role="alert" 
                style="
                    position: fixed;
                    z-index: 1000;
                    width: 300px;
                    font-size: 1.5rem;
                    font-color: #222;
                    font-weight: 600;
                    top: 30%;
                    left: 50%;
                    margin-top: -150px; /* Negative half of height. */
                    margin-left: -150px; /* Negative half of width. */
                    text-align: center;
                    animation: transitionIn-Y-over 1s;
                ">
                '.$message.'
                <button type="button success" class="close" id="alert-msg" data-dismiss="alert" aria-label="Close">
                    <div class="fas fa-check fa-lg"></div>
                </button>
            </div>

            <script>
                $("#alert-box").fadeTo(2800, 700).slideUp(700, function(){
                    $("#alert-box").slideUp(500);
                });
            </script>
        ';
    }

    $message = isset($_SESSION["message"]) ? $_SESSION["message"] : "";
    if($message == "cart-added"){
        alertMessage("success", "Item Added Successfully");
    }
    elseif($message == "remove-item"){
        alertMessage("success", "Remove Item Successfully");
    }
    elseif($message == "clear-all-item"){
        alertMessage("success", "Delete All Item Successfully");
    }
    elseif($message == "placed-order"){
        alertMessage("success", "Congratulations! <br>Your Order Has Been Placed");
    }
    elseif($message == "profile-updated"){
        alertMessage("success", "Update Profile Successfully");
    }
    elseif($message == "confirm-password-not-matched"){
        alertMessage("danger", "Confirm password not matched");
        echo '<script>
                $("#alert-msg").css("display", "none");
              </script>';
    }

    $message = "";
    $_SESSION["message"] = "";

    if(isset($_SESSION["error"])){
        $_SESSION["error"] = "";
    }
    
    
?>

