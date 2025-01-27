<?php
    include("connection/connect.php");  //include connection file
    //error_reporting(0);  // using to hide undefine undex errors
    session_start(); //start temp session until logout/browser closed

    $type = $_POST["type"];

    if($type == 1){     //if selected type is materials

        //for good materials
        $result = $db->query("SELECT * FROM materials WHERE expiration_status = 'GOOD' OR expiration_status = 'N/A' ORDER BY expiration_date DESC");
        $goodTableRows = "";
        if($result->num_rows > 0){
            $rowCount = 1;
            while($row = $result->fetch_assoc()){
                if ($row['expiration_status'] === 'N/A') {
                    $backgroundColor = "#4d5561";
                } elseif ($row['expiration_status'] === 'GOOD') {
                    $backgroundColor = "#76a004";
                }

                $expDate = !empty($row["expiration_date"]) ? date("M d Y", strtotime($row["expiration_date"])) : "N/A";

                $goodTableRows .= '
                    <tr>
                        <th>'.$rowCount.'</th>
                        <td>'.$row["material_name"].'</td>
                        <td>'.number_format($row["quantity"]).'</td>
                        <td>₱ '.number_format($row["cost"], 2).'</td>
                        <td class="text-center">'.$expDate.'</td>
                        <td class="text-center"><span style="background-color: '. $backgroundColor .'; border-radius: 5px; padding: 5px; text-transform: uppercase; color: white; font-size: 85%; font-weight: 500;">'.$row["expiration_status"].'</span></td>
                    </tr>
                ';
                $rowCount++;
            }
        }
        else{
            $goodTableRows .= '
                <tr>
                    <td class="text-center" colspan="6">There are no good products in inventory</td>
                </tr>
            ';
        }
        
        echo '
            <h3 class="mb-3">Good Materials</h3>
            <table class="table mb-5">
                <thead style="background-color: #e4eccd">
                    <th>#</th>
                    <th>MATERIAL NAME</th>
                    <th>QUANTITY</th>
                    <th>COST</th>
                    <th>EXPIRATION DATE</th>
                    <th>EXPIRATION STATUS</th>
                </thead>
                <tbody>
                    '.$goodTableRows.'
                </tbody>
            </table>
        ';



        //for expiring materials
        $result = $db->query("SELECT * FROM materials WHERE expiration_status = 'NEARLY EXPIRED' OR expiration_status = 'EXPIRED' ORDER BY expiration_date ASC");
        $expiringTableRows = "";
        if($result->num_rows > 0){
            $rowCount = 1;
            while($row = $result->fetch_assoc()){
                if ($row['expiration_status'] === 'EXPIRED') {
                    $backgroundColor = "#fe5461";
                } elseif ($row['expiration_status'] === 'NEARLY EXPIRED') {
                    $backgroundColor = "orange";
                }

                $expiringTableRows .= '
                    <tr>
                        <th>'.$rowCount.'</th>
                        <td>'.$row["material_name"].'</td>
                        <td>'.number_format($row["quantity"]).'</td>
                        <td>₱ '.number_format($row["cost"], 2).'</td>
                        <td class="text-center">'.date("M d Y", strtotime($row["expiration_date"])).'</td>
                        <td class="text-center"><span style="background-color: ' . $backgroundColor . '; border-radius: 5px; padding: 5px; text-transform: uppercase; color: white; font-size: 85%; font-weight: 500;">'.$row["expiration_status"].'</span></td>
                    </tr>
                ';
                $rowCount++;
            }
        }
        else{
            $expiringTableRows .= '
                <tr>
                    <td class="text-center" colspan="6">There are no good products in inventory</td>
                </tr>
            ';
        }
        
        echo '
            <h3 class="mb-3">Expiring Materials</h3>
            <table class="table mb-5">
                <thead style="background-color: #e4eccd">
                    <th>#</th>
                    <th>MATERIAL NAME</th>
                    <th>QUANTITY</th>
                    <th>COST</th>
                    <th>EXPIRATION DATE</th>
                    <th>EXPIRATION STATUS</th>
                </thead>
                <tbody>
                    '.$expiringTableRows.'
                </tbody>
            </table>
        ';



        //for unavailable materials
        $result = $db->query("SELECT * FROM materials WHERE status = 'unavailable' ORDER BY material_name ASC");
        $unavailableTableRows = "";
        if($result->num_rows > 0){
            $rowCount = 1;
            while($row = $result->fetch_assoc()){
                $expDate = !empty($row["expiration_date"]) ? date("M d Y", strtotime($row["expiration_date"])) : "N/A";
                $unavailableTableRows .= '
                    <tr>
                        <th>'.$rowCount.'</th>
                        <td>'.$row["material_name"].'</td>
                        <td>'.number_format($row["quantity"]).'</td>
                        <td>₱ '.number_format($row["cost"], 2).'</td>
                        <td class="text-center">'.$expDate.'</td>
                    </tr>
                ';
                $rowCount++;
            }
        }
        else{
            $unavailableTableRows .= '
                <tr>
                    <td class="text-center" colspan="6">There are no unavailable products in inventory</td>
                </tr>
            ';
        }
        
        echo '
            <h3 class="mb-3">Unavailable Materials</h3>
            <table class="table mb-5">
                <thead style="background-color: #e4eccd">
                    <th>#</th>
                    <th>MATERIAL NAME</th>
                    <th>QUANTITY</th>
                    <th>COST</th>
                    <th>EXPIRATION DATE</th>
                </thead>
                <tbody>
                    '.$unavailableTableRows.'
                </tbody>
            </table>
        ';
    }
    elseif($type == 2){     //if selected type is flavor

        //for good flavor
        $result = $db->query("SELECT * FROM flavorings WHERE expiration_status = 'GOOD' OR expiration_status = 'N/A' ORDER BY expiration_date DESC");
        $goodTableRows = "";
        if($result->num_rows > 0){
            $rowCount = 1;
            while($row = $result->fetch_assoc()){
                if ($row['expiration_status'] === 'N/A') {
                    $backgroundColor = "#4d5561";
                } elseif ($row['expiration_status'] === 'GOOD') {
                    $backgroundColor = "#76a004";
                }

                $expDate = !empty($row["expiration_date"]) ? date("M d Y", strtotime($row["expiration_date"])) : "N/A";

                $goodTableRows .= '
                    <tr>
                        <th>'.$rowCount.'</th>
                        <td>'.$row["flavor_name"].'</td>
                        <td>'.number_format($row["quantity"]).'</td>
                        <td>₱ '.number_format($row["cost"], 2).'</td>
                        <td class="text-center">'.$expDate.'</td>
                        <td class="text-center"><span style="background-color: '. $backgroundColor .'; border-radius: 5px; padding: 5px; text-transform: uppercase; color: white; font-size: 85%; font-weight: 500;">'.$row["expiration_status"].'</span></td>
                    </tr>
                ';
                $rowCount++;
            }
        }
        else{
            $goodTableRows .= '
                <tr>
                    <td class="text-center" colspan="6">There are no good products in inventory</td>
                </tr>
            ';
        }
        
        echo '
            <h3 class="mb-3">Good Flavors</h3>
            <table class="table mb-5">
                <thead style="background-color: #e4eccd">
                    <th>#</th>
                    <th>FLAVOR NAME</th>
                    <th>QUANTITY</th>
                    <th>COST</th>
                    <th>EXPIRATION DATE</th>
                    <th>EXPIRATION STATUS</th>
                </thead>
                <tbody>
                    '.$goodTableRows.'
                </tbody>
            </table>
        ';



        //for expiring materials
        $result = $db->query("SELECT * FROM flavorings WHERE expiration_status = 'NEARLY EXPIRED' OR expiration_status = 'EXPIRED' ORDER BY expiration_date ASC");
        $expiringTableRows = "";
        if($result->num_rows > 0){
            $rowCount = 1;
            while($row = $result->fetch_assoc()){
                if ($row['expiration_status'] === 'EXPIRED') {
                    $backgroundColor = "#fe5461";
                } elseif ($row['expiration_status'] === 'NEARLY EXPIRED') {
                    $backgroundColor = "orange";
                }

                $expiringTableRows .= '
                    <tr>
                        <th>'.$rowCount.'</th>
                        <td>'.$row["flavor_name"].'</td>
                        <td>'.number_format($row["quantity"]).'</td>
                        <td>₱ '.number_format($row["cost"], 2).'</td>
                        <td class="text-center">'.date("M d Y", strtotime($row["expiration_date"])).'</td>
                        <td class="text-center"><span style="background-color: ' . $backgroundColor . '; border-radius: 5px; padding: 5px; text-transform: uppercase; color: white; font-size: 85%; font-weight: 500;">'.$row["expiration_status"].'</span></td>
                    </tr>
                ';
                $rowCount++;
            }
        }
        else{
            $expiringTableRows .= '
                <tr>
                    <td class="text-center" colspan="6">There are no expiring flavors in inventory</td>
                </tr>
            ';
        }
        
        echo '
            <h3 class="mb-3">Expiring Flavors</h3>
            <table class="table mb-5">
                <thead style="background-color: #e4eccd">
                    <th>#</th>
                    <th>FLAVOR NAME</th>
                    <th>QUANTITY</th>
                    <th>COST</th>
                    <th>EXPIRATION DATE</th>
                    <th>EXPIRATION STATUS</th>
                </thead>
                <tbody>
                    '.$expiringTableRows.'
                </tbody>
            </table>
        ';



        //for unavailable materials
        $result = $db->query("SELECT * FROM flavorings WHERE status = 'unavailable' ORDER BY flavor_name ASC");
        $unavailableTableRows = "";
        if($result->num_rows > 0){
            $rowCount = 1;
            while($row = $result->fetch_assoc()){
                $expDate = !empty($row["expiration_date"]) ? date("M d Y", strtotime($row["expiration_date"])) : "N/A";
                $unavailableTableRows .= '
                    <tr>
                        <th>'.$rowCount.'</th>
                        <td>'.$row["flavor_name"].'</td>
                        <td>'.number_format($row["quantity"]).'</td>
                        <td>₱ '.number_format($row["cost"], 2).'</td>
                        <td class="text-center">'.$expDate.'</td>
                    </tr>
                ';
                $rowCount++;
            }
        }
        else{
            $unavailableTableRows .= '
                <tr>
                    <td class="text-center" colspan="6">There are no unavailable flavors in inventory</td>
                </tr>
            ';
        }
        
        echo '
            <h3 class="mb-3">Unavailable Flavors</h3>
            <table class="table mb-5">
                <thead style="background-color: #e4eccd">
                    <th>#</th>
                    <th>FLAVOR NAME</th>
                    <th>QUANTITY</th>
                    <th>COST</th>
                    <th>EXPIRATION DATE</th>
                </thead>
                <tbody>
                    '.$unavailableTableRows.'
                </tbody>
            </table>
        ';
    }
    elseif($type == 3){     //if selected type is flavor

        //for good materials
        $result = $db->query("SELECT * FROM add_ons1 WHERE expiration_status = 'GOOD' OR expiration_status = 'N/A' ORDER BY expiration_date DESC");
        $goodTableRows = "";
        if($result->num_rows > 0){
            $rowCount = 1;
            while($row = $result->fetch_assoc()){
                if ($row['expiration_status'] === 'N/A') {
                    $backgroundColor = "#4d5561";
                } elseif ($row['expiration_status'] === 'GOOD') {
                    $backgroundColor = "#76a004";
                }

                $expDate = !empty($row["expiration_date"]) ? date("M d Y", strtotime($row["expiration_date"])) : "N/A";

                $goodTableRows .= '
                    <tr>
                        <th>'.$rowCount.'</th>
                        <td>'.$row["name"].'</td>
                        <td>'.number_format($row["quantity"]).'</td>
                        <td>₱ '.number_format($row["cost"], 2).'</td>
                        <td class="text-center">'.$expDate.'</td>
                        <td class="text-center"><span style="background-color: '. $backgroundColor .'; border-radius: 5px; padding: 5px; text-transform: uppercase; color: white; font-size: 85%; font-weight: 500;">'.$row["expiration_status"].'</span></td>
                    </tr>
                ';
                $rowCount++;
            }
        }
        else{
            $goodTableRows .= '
                <tr>
                    <td class="text-center" colspan="6">There are no good addons in inventory</td>
                </tr>
            ';
        }
        
        echo '
            <h3 class="mb-3">Good Addons</h3>
            <table class="table mb-5">
                <thead style="background-color: #e4eccd">
                    <th>#</th>
                    <th>FLAVOR NAME</th>
                    <th>QUANTITY</th>
                    <th>COST</th>
                    <th>EXPIRATION DATE</th>
                    <th>EXPIRATION STATUS</th>
                </thead>
                <tbody>
                    '.$goodTableRows.'
                </tbody>
            </table>
        ';



        //for expiring materials
        $result = $db->query("SELECT * FROM add_ons1 WHERE expiration_status = 'NEARLY EXPIRED' OR expiration_status = 'EXPIRED' ORDER BY expiration_date ASC");
        $expiringTableRows = "";
        if($result->num_rows > 0){
            $rowCount = 1;
            while($row = $result->fetch_assoc()){
                if ($row['expiration_status'] === 'EXPIRED') {
                    $backgroundColor = "#fe5461";
                } elseif ($row['expiration_status'] === 'NEARLY EXPIRED') {
                    $backgroundColor = "orange";
                }

                $expiringTableRows .= '
                    <tr>
                        <th>'.$rowCount.'</th>
                        <td>'.$row["name"].'</td>
                        <td>'.number_format($row["quantity"]).'</td>
                        <td>₱ '.number_format($row["cost"], 2).'</td>
                        <td class="text-center">'.date("M d Y", strtotime($row["expiration_date"])).'</td>
                        <td class="text-center"><span style="background-color: ' . $backgroundColor . '; border-radius: 5px; padding: 5px; text-transform: uppercase; color: white; font-size: 85%; font-weight: 500;">'.$row["expiration_status"].'</span></td>
                    </tr>
                ';
                $rowCount++;
            }
        }
        else{
            $expiringTableRows .= '
                <tr>
                    <td class="text-center" colspan="6">There are no expiring addons in inventory</td>
                </tr>
            ';
        }
        
        echo '
            <h3 class="mb-3">Expiring Addons</h3>
            <table class="table mb-5">
                <thead style="background-color: #e4eccd">
                    <th>#</th>
                    <th>FLAVOR NAME</th>
                    <th>QUANTITY</th>
                    <th>COST</th>
                    <th>EXPIRATION DATE</th>
                    <th>EXPIRATION STATUS</th>
                </thead>
                <tbody>
                    '.$expiringTableRows.'
                </tbody>
            </table>
        ';



        //for unavailable materials
        $result = $db->query("SELECT * FROM add_ons1 WHERE status = 'unavailable' ORDER BY name ASC");
        $unavailableTableRows = "";
        if($result->num_rows > 0){
            $rowCount = 1;
            while($row = $result->fetch_assoc()){
                $expDate = !empty($row["expiration_date"]) ? date("M d Y", strtotime($row["expiration_date"])) : "N/A";
                $unavailableTableRows .= '
                    <tr>
                        <th>'.$rowCount.'</th>
                        <td>'.$row["name"].'</td>
                        <td>'.number_format($row["quantity"]).'</td>
                        <td>₱ '.number_format($row["cost"], 2).'</td>
                        <td class="text-center">'.$expDate.'</td>
                    </tr>
                ';
                $rowCount++;
            }
        }
        else{
            $unavailableTableRows .= '
                <tr>
                    <td class="text-center" colspan="6">There are no unavailable addons in inventory</td>
                </tr>
            ';
        }
        
        echo '
            <h3 class="mb-3">Unavailable Addons</h3>
            <table class="table mb-5">
                <thead style="background-color: #e4eccd">
                    <th>#</th>
                    <th>FLAVOR NAME</th>
                    <th>QUANTITY</th>
                    <th>COST</th>
                    <th>EXPIRATION DATE</th>
                </thead>
                <tbody>
                    '.$unavailableTableRows.'
                </tbody>
            </table>
        ';
    }
?>
