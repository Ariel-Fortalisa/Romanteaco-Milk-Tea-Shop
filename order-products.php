<?php require_once "controllerUserData.php"; ?>
<?php
//include("./checkLoginSession.php");
//include("./checkUserSession.php");
include ("connection.php");
$db= new Database();

    $category = "";
    $product = "";
    $prd_sections = "";

    $prd_modals = "";
    if(! isset($_GET["category_id"])){
        header("Location: ./home.php");
        exit();
    }
    else{
        $category = $_GET["category_id"];
    }

    $subCategory = $db->sql("
        SELECT * 
        FROM sub_category 
        WHERE category_id = '$category' 
    ");

    //loop for sub categories
    while($row = $subCategory->fetch_assoc()){
        $prd_items = "";
        $prd_sections .= ' 
        <section class="menu">
        <h1 class="title">'.$row["sub_category_name"].'</h1> ';

        //loop for products
        $products = $db->sql("
            SELECT * 
            FROM product 
            WHERE category_id = '$category' AND sub_category_id = '".$row["sub_category_id"]."' AND archive = 0
        ");

        $productEnabled = true;
        while($prd = $products->fetch_assoc()){

            //loop for size/prices
            $price = $db->sql("
                SELECT * 
                FROM price 
                WHERE product_id = '".$prd["product_id"]."'
                ORDER BY status ASC;
            ");

            $priceStatusCount = $db->sql("
                SELECT COUNT(*) AS `priceCount`
                FROM `price` 
                WHERE product_id = '".$prd["product_id"]."' AND `status` = 'available'
            ")->fetch_assoc()["priceCount"];

            $productEnabled = $priceStatusCount > 0 ? true : false;


            $priceModalValue = 0;
            $sizeIdModalValue = "";
            $sizeModalValue = "";
            $sizeSection = "";
            $sizeButtons = "";
            if($price->num_rows > 1){
                $count = 1;
                while($prc = $price->fetch_assoc()){
                    $sizeButtons .= '
                        <option value="'.$prc["size_id"].','.$prc["size_name"].','.$prc["price"].'" '.($prc["status"] == "unavailable" ? "disabled" : "").'>'.$prc["size_name"].'</option>
                    ';

                    if($prc["status"] == "unavailable"){
                        continue;
                    }

                    $priceModalValue = $count == 1 ? $prc["price"] : $priceModalValue;
                    $sizeIdModalValue = $count == 1 ? $prc["size_id"] : $sizeIdModalValue;
                    $sizeModalValue = $count == 1 ? $prc["size_name"] : $sizeModalValue;
                    $count++;
                }
                $sizeSection = '
                    <h3 class="size" style="padding-left: .5rem; padding-top: .8rem; font-size: 1.5rem; ">Size</h3>
                    <select class="form-control" onchange="onchangeSize(this)">
                        '.$sizeButtons.'
                    </select>
                ';
            }
            else{
                while($prc = $price->fetch_assoc()){
                    $sizeIdModalValue = $prc["size_id"];
                    $priceModalValue = $prc["price"];
                    $sizeModalValue = "";
                }
            }

            //loop for flavors
            $flavor = $db->sql("
                SELECT * 
                FROM flavor 
                WHERE product_id = '".$prd["product_id"]."'
                ORDER BY status ASC;
            ");
            $flavorSection = "";
            $flavorButtons = "";
            if($flavor->num_rows > 0){
                while($flv = $flavor->fetch_assoc()){
                    $flavorButtons .= '
                        <option value="'.$flv["flavor_name"].'" '.($flv["status"] == "unavailable" ? "disabled" : "").'>'.$flv["flavor_name"].'</option>     
                    ';
                }
                $flavorSection = '
                    <h3 class="flavor" style="padding-left: .5rem; padding-top: .8rem; font-size: 1.5rem;">Flavor</h3>
                    <select class="form-control" name="flavor">
                        '.$flavorButtons.'
                    </select>
                ';
            }
            
            //loop for add-ons
            $add_ons = $db->sql("
                SELECT * 
                FROM add_ons 
                WHERE product_id = '".$prd["product_id"]."'
                ORDER BY status ASC;
            ");
            $addpriceModalValue = 0;
            $addnameModalValue = "";
            $addonsSmallText = "";
            $addSection = "";
            $addButtons = "";
            if($add_ons->num_rows > 0){
                $count = 1;
                while($add = $add_ons->fetch_assoc()){
                    $addButtons .= '
                        <option value="'.$add["add_ons_name"].','.$add["price"].'" '.($add["status"] == "unavailable" ? "disabled" : "").'>'.$add["add_ons_name"].'&emsp;&emsp;&emsp;+₱'.$add["price"].'</option>
                    ';

                }
                $addSection = '
                    <h3 class="add-ons" style="padding-left: .5rem; padding-top: .8rem; font-size: 1.5rem; ">Add-ons
                    
                    </h3>
                    <select class="form-control" style="column-gap: 30px;" onchange="onchangeAddons(this)" required>
                        <option value="None,0" selected>None</option>
                        '.$addButtons.'
                    </select>
                ';
                $addonsSmallText = "*Add-ons is applied for each quantity.";
            }


            $prd_items .= '
                <div class="box text-center" style="position: relative; '.(!$productEnabled ? 'background-color: #eee;' : '').'">
                '.(!$productEnabled ? '
                    <img src="./assets/img/unavailable.png" style="position: absolute; width: 65%; top: 50%; left: 50%; transform: translate(-50%, -50%);">
                ' : '').'
                <img src='.$prd["image_name"].' alt="">
                <div class="name">'.$prd["product_name"].'</div>
                    <div class="flex">
                        <button type="button" class="order" style="'.(!$productEnabled ? 'background-color: #fed033;' : '').'" id="product-'.$prd["product_id"].'" data-toggle="modal" data-target="#product_modal" '.(!$productEnabled ? 'disabled' : '').'>
                        <div class="fas fa-plus fa-lg" id="order-btn" style="color: #ffffff; vertical-align: middle"></div>
                        </button>
                    </div>
                </div>

                <script>
                    $("#product-'.$prd["product_id"].'").click(function(){
                        $("#product-img").html(`
                            <img src="'.$prd["image_name"].'"/>
                        `);
                        $("#product-name").html(`
                            '.$prd["product_name"].'
                        `);
                        $("#flavor-div").html(`
                            '.$flavorSection.'
                        `);
                        $("#size-div").html(`
                            '.$sizeSection.'
                        `);
                        $("#add-ons-div").html(`                          
                            '.$addSection.'
                        `);
                        $("#addonsSmall").html(`
                            '.$addonsSmallText.'
                        `);
                        $("#subtotalText").html(`
                            ₱ '.number_format($priceModalValue, 2).'
                        `);

                        $("#categoryId").val("'.$_GET["category_id"].'");
                        $("#categoryName").val("'.$_GET["category_name"].'");
                        $("#productId").val("'.$prd["product_id"].'");
                        $("#productName").val("'.$prd["product_name"].'");
                        $("#sizeId").val("'.$sizeIdModalValue.'");
                        $("#size").val("'.$sizeModalValue.'");
                        $("#price").val("'.$priceModalValue.'");
                        $("#addonsName").val("'.$addnameModalValue.'");
                        $("#addonsPrice").val("'.$addpriceModalValue.'");
                        $("#subtotal").val("'.$priceModalValue.'");
                        $("#image").val("'.$prd["image_name"].'");
                    });
                </script>
            ';
            
        }

        $prd_sections .= '
        <div class="box-container">
            '.$prd_items.'
        </div>
        </section>
    ';
    }

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$_GET["category_name"]?></title>
 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"/>
 
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
 
    <!-- custom css file link  -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="animations.css">
    
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    
    <!--Jquery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>

</head>
<style>
   .menu{
      animation: transitionIn-Y-bottom 2.3s;
   }
</style>
<body>
<?php 
$ctgId = $_GET["category_id"];
$ctgName = $_GET["category_name"];
$pageLocation = "order-products.php?category_id=$ctgId&category_name=$ctgName";
include ("header.php"); ?>
<?php include ("alert-message.php"); ?>
<div class="heading">
    <h3>Our Menu</h3>
    <p><a href="home.php">home </a> <span> / menu</span></p>
</div>
<div class="loader">
   <img src="images/loading.gif" alt="">
</div>

<?=$prd_sections?>

<?php include ("footer.php"); ?>


<?php include("ordering_modal.php"); ?>
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

<script src="script.js"></script>


</body>
</html>