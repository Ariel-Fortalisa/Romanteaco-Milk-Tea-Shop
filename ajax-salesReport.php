<?php
    session_start();
    include("connection/connect.php");
    date_default_timezone_set('Asia/Manila');

    $type = $_POST["salesType"];
    $method = $_POST["method"];
    $year = $_POST["year"];
    $month = $_POST["month"];

    $destroy = "";
    if($method == "replace"){
        $destroy = 'myChart.destroy();';
    }


    //overview data
    $totalSales = 0;
    $totalTransactions = 0;



    //charts data
    $label = "";
    $data = "";


    $chartHeader = "";


    if($type == "Daily"){
        $maxDate = ($year == (int)date("Y") and $month == (int)date("m")) ? (int)date("d") : (int)date("t", strtotime("$year-$month-01"));
        
        for($x = 1; $x <= $maxDate; $x++){
            $date = date("M d Y", strtotime("$year-$month-$x"));

            $result = $db->query("
                SELECT SUM(`total`) AS `total`
                FROM `order_list`
                WHERE YEAR(`date`) = '$year' AND MONTH(`date`) = '$month' AND DAY(`date`) = $x AND `status`='4'
            ");

            $total = 0;
            while($row = $result->fetch_assoc()){
                $total += $row["total"];
            }
            $data .= $total;
            $label .= '"'.$date.'"';

            if($x <= $maxDate){
                $data .= ", ";
                $label .= ", ";
                
            }
    
        }
        

        $chartHeader = "Daily Sales During ".date("F Y", strtotime("$year-$month-01"));
    }
    elseif($type == "Weekly"){
        $days = array(0, 7, 14, 21, 28);
        
        for($x = 0; $x < 4; $x++){
            $date = "Week ".$x+1;

            $result = $db->query("
                SELECT SUM(`total`) AS `total`
                FROM `order_list`
                WHERE YEAR(`date`) = '$year' AND MONTH(`date`) = '$month' AND DAY(`date`) BETWEEN ".($days[$x]+1)." AND ".($days[$x+1])." AND `status`='4'
            ");

            $total = 0;
            while($row = $result->fetch_assoc()){
                $total += $row["total"];
            }
            $data .= $total;
            $label .= '"'.$date.'"';

            if($x <= 4){
                $data .= ", ";
                $label .= ", ";
                
            }
    
        }

        $chartHeader = "Weekly Sales During ".date("F Y", strtotime("$year-$month-01"));
    }
    elseif($type == "Monthly"){
        $maxDate = $year === (int)date("Y") ? (int)date("m") : 12;
        
        for($x = 1; $x <= $maxDate; $x++){
            $date = date("M Y", strtotime("$year-$x-01"));

            $result = $db->query("
                SELECT SUM(`total`) AS `total`
                FROM `order_list`
                WHERE YEAR(`date`) = '$year' AND MONTH(`date`) = $x AND `status`='4'
            ");

            $total = 0;
            while($row = $result->fetch_assoc()){
                $total += $row["total"];
            }
            $data .= $total;
            $label .= '"'.$date.'"';

            if($x <= $maxDate){
                $data .= ", ";
                $label .= ", ";
                
            }
    
        }

        $chartHeader = "Monthly Sales During ".date("Y", strtotime("$year-$month-01"));
    }
    elseif($type == "Yearly"){
        $minYear = $db->query("SELECT YEAR(MIN(date)) AS min_year FROM order_list")->fetch_assoc()["min_year"];
        $maxDate  = $db->query("SELECT YEAR(MAX(date)) AS max_year FROM order_list")->fetch_assoc()["max_year"];
        for($x = $minYear; $x <= $maxDate; $x++){
            $date = date("Y", strtotime("$x-01-01"));

            $result = $db->query("
                SELECT SUM(`total`) AS `total`
                FROM `order_list`
                WHERE YEAR(`date`) = '$x' AND `status` = 4
            ");

            $total = 0;
            while($row = $result->fetch_assoc()){
                $total += $row["total"];
            }
            $data .= $total;
            $label .= '"'.$date.'"';

            if($x <= $maxDate){
                $data .= ", ";
                $label .= ", ";
                
            }
    
        }

        $chartHeader = "Yearly Sales";
    }

    
?>

<script>
    var ctx = document.getElementById("myChart");

    <?=$destroy?>
    
    
    var myChart = new Chart(ctx, {
    type: "line",
    data: {
        labels: [<?=$label?>],
        datasets: [{
        label: "Total Sales",
        data: [<?=$data?>],
        borderWidth: 3
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
            y: {
                beginAtZero: true
            }
        },
        plugins: {
            tooltip: {
                callbacks: {
                label: function(context) {
                    let label = context.dataset.label || '';

                    if (label) {
                    label += ': ';
                    }
                    if (context.parsed.y !== null) {
                    label += new Intl.NumberFormat('en-US', {
                        style: 'currency',
                        currency: 'PHP'
                    }).format(context.parsed.y);
                    }
                    return label;
                }
                }
            }
        }
    }
    });

    $("#chartHeader").html('<?=$chartHeader?>');
</script>