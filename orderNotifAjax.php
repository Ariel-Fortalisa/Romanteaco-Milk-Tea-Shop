<?php
    include("./connection.php");
    $db = new Database();
    $userId = $_POST["userId"];
    
    $result = $db->sql("SELECT * FROM `order_list` WHERE `user_id` = '$userId' AND `status` = 3 AND `notif` = 0 ORDER BY `time` DESC, `date` DESC");
    $admin = $db->sql("SELECT `image` FROM `admin_user`")->fetch_assoc()["image"];

    $newNotif = "";
    $markReadScript = "";
    $markReadOldScript = "";
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $newNotif .= '
                <tr style="box-shadow: 0 .2rem 1.5rem rgba(0,0,0,.1); text-align:left;">
                    <td style="padding: 1.3rem 0rem;"><img src="'.$admin.'" style="height: 4rem; width: 4rem; border-radius:50%"></td>
                    <td style="text-align: left;padding: 1.3rem .3rem;">Order #:<br>'.$row["order_id"].'<br>Total: ₱'.number_format($row['total'], 2).'</td>
                    <td style="padding: 1.3rem 0rem; 1.3rem 2rem"><span style="font-weight:600;">Your order is already prepared!</span><span style="text-transform: none"><br> You can go to the counter to get your order.</span>
                        <i><span style="font-size:.9rem;text-transform: none"><br>Copy of orders are also sent on your email account.</span></i>
                        <br>'.date("M. j, Y", strtotime($row["date"])).' <span style="text-transform: none"> at '.date("h:i a", strtotime($row["time"])).'</span>
                        </td>
                    <td style="padding: 1.3rem 1rem;">
                        <button id="markRead'.$row["order_id"].'" style="background-color: #fff; color: #76a004; width: 100%">
                            <i class="fas fa-check-double fa-xl"></i>
                        </button>
                    </td>
                </tr>
            ';

            $markReadScript .= '
                $("#markRead'.$row["order_id"].'").click(function(){
                    $.post("orderReadAjax.php", 
                        {orderId: "'.$row["order_id"].'"},
                        function(data, status){
                            orderNotifAjax();
                        }
                    );
                });
            ';
        }
    }
    else{
        $newNotif .= '<div class="zero_notif">
                        <img src="images/empty-notif.png" alt="" style="height: 20%; width: 10%; object-fit: contain;">
                            <h5 style="padding-top: 1rem; color: #666; text-transform: none;">No new notifications!</h5>
                      </div>';
    }
    



    $result2 = $db->sql("SELECT * FROM `order_list` WHERE `user_id` = '$userId' AND `notif` = 1 ORDER BY `time` DESC, `date` DESC");
    $oldNotif = "";
    if($result2->num_rows > 0){
        while($row = $result2->fetch_assoc()){
            $oldNotif .= '
                <tr style="box-shadow: 0 .2rem 1.5rem rgba(0,0,0,.1); text-align:left;">
                    <td style="padding: 1.3rem 0rem;"><img src="'.$admin.'" style="height: 4rem; width: 4rem; border-radius:50%"></td>
                    <td style="text-align: left;padding: 1.3rem 0rem;">Order #:<br>'.$row["order_id"].'<br>Total: ₱'.number_format($row['total'], 2).'</td>
                    <td style="padding: 1.3rem 0rem; 1.3rem 2rem"><span style="font-weight:600;">Your order is already prepared!</span><span style="text-transform: none"><br> You can go to the counter to get your order.</span>
                        <i><span style="font-size:.9rem;text-transform: none"><br>Copy of orders are also sent on your email account.</span></i>
                        <br>'.date("M. j, Y", strtotime($row["date"])).' <span style="text-transform: none"> at '.date("h:i a", strtotime($row["time"])).'</span>
                        </td>
                    <td style="padding: 1.3rem 1rem;">
                        <button id="markRead'.$row["order_id"].'" style="background-color: #fff; color: #f35a36; width: 100%">
                            <i class="fas fa-xmark fa-xl"></i>
                        </button>
                    </td>
                </tr>
            ';

            $markReadOldScript .= '
                $("#markRead'.$row["order_id"].'").click(function(){
                    $.post("orderReadOldAjax.php", 
                        {orderId: "'.$row["order_id"].'"},
                        function(data, status){
                            orderNotifAjax();
                        }
                    );
                });
            ';
        }
    }
    else{
        $oldNotif .= '<div class="zero_notif">
                        <img src="images/empty-notif.png" alt="" style="height: 20%; width: 10%; object-fit: contain;">
                            <h5 style="padding-top: 1rem; color: #666; text-transform: none;">No old notifications!</h5>
                      </div>';
    }
    
    
    if($result->num_rows > 0 or $result2->num_rows > 0){
        echo '
            </br>
            <h4 class="text-muted" style="text-align: left"><b>New</b></h4>
            <table style="width: 100%;">
                <tbody style="padding-top: 5rem;">
                    '.$newNotif.'
                </tbody>
            <table>
            <br>
            <br>
            <h4 class="text-muted" style="text-align: left"><b>Earlier</b></h4>
            <table style="width: 100%;">
                <tbody style="padding-top: 5rem;">
                    '.$oldNotif.'
                </tbody>
            <table>

            <script>
                '.($result->num_rows == 0 ? '$("#notif_count").css("opacity", "0");' : '$("#notif_count").css("opacity", "1");').'

                $("#notif_count").html("'. $result->num_rows.'");
                '.$markReadScript.'
                '.$markReadOldScript.'
            </script>
        ';
    }
    else{
        echo '<div class="zero_notif" style="padding-top: 8rem">
                <img src="images/empty-notif.png" alt="" style="height: 40%; width: 30%; object-fit: contain;">
                    <h3 style="text-transform: none;"><br>Your Notification is <span style="color: #ff0000">Empty!</span></h3>
                    <h5 style="padding-top: 2rem; color: #666; text-transform: none;">You must placed an order first.</h5>
              </div>';
        echo '
        <script>
        $("#notif_count").css("opacity", "0");
        </script>
        ';
    }
    
?>