<?php
    //set flavor to unavailable when quantity of flavorings is 0
    $query = "
        SELECT `flavor`.*, `flavorings`.`quantity` 
        FROM `flavor` 
            INNER JOIN `flavorings` ON `flavor`.`flavor_num` = `flavorings`.`flavor_num`
        WHERE `flavorings`.`quantity` = 0
    ";


    //set all to available
    $db->query("
        UPDATE `flavor` SET `status`='available' WHERE 1
    ");

    //then set sizes with 0 material to unavailable
    $flavorings = mysqli_query($db, $query);
    while($row = $flavorings->fetch_assoc()){
        $flavorId = $row["flavor_id"];
        $db->query("
            UPDATE `flavor` SET `status`='unavailable' WHERE `flavor_id` = '$flavorId'
        ");
    }
?>