<?php
    //set sizes to unavailable when quantity of material is 0
    $query = "
    SELECT `size_materials`.*, `materials`.`quantity` 
    FROM `size_materials` 
    INNER JOIN `materials` ON `size_materials`.`material_id` = `materials`.`material_id`
    WHERE `quantity` = '0';
    ";


    //set all to available
    $db->query("
    UPDATE `price` SET `status`='available' WHERE 1
    ");

    //then set sizes with 0 material
    $sizeMaterial = mysqli_query($db, $query);
    while($row = $sizeMaterial->fetch_assoc()){
    $sizeId = $row["size_id"];
    $db->query("
    UPDATE `price` SET `status`='unavailable' WHERE `size_id` = '$sizeId'
    ");
    }
?>