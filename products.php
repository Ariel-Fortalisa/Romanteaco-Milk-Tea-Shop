<?php
include("connection/connect.php");  //include connection file
error_reporting(0);  // using to hide undefine undex errors
session_start(); //start temp session until logout/browser closed


include("./checkLoginSession.php");
include("./checkAdminSession.php");


$category = "";
if(isset($_GET["category_id"])){
  $category = $_GET["category_id"];
}
else{
  $category = 1;
}



 //submit add product
 if($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST["addProduct"])){
  //product detals
  $productName = $_POST["addProductName"];
  $categoryId = $_POST["categoryId"];
  $subCategory = $_POST["subCategory"];

  //image details
  $image_path = "";
  // Check if an image is uploaded
  if (!empty($_FILES['image']['name'])) {
      $image_name = $_FILES['image']['name'];
      $image_size = $_FILES['image']['size'];
      $image_tmp = $_FILES['image']['tmp_name'];
      
      // Specify the folder name where the image will be saved
      $folder_name = "images";
      
      // Create the complete image path with the folder name
      $image_path = $folder_name . '/' . $image_name;
      
      // Move the uploaded file to the specified folder
      move_uploaded_file($image_tmp, $image_path);
  } else {
      // If no image is uploaded, you can set a default value or handle it as needed
      $image_path = ""; // Set a default value or handle it differently
  }

  $db->query("
      INSERT INTO `product`(
      `product_id`, `product_name`, 
      `category_id`, `sub_category_id`, `image_name`
      ) VALUES (
          '0','$productName','$categoryId','$subCategory','$image_path')");

  //price and sizes
  $sizeName = $_POST["sizeName"];
  $price = $_POST["priceName"];
  $materialCount = $_POST["materialCount"];
  $start = 1;

  $maxProductId = $db->query("SELECT MAX(`product_id`) AS `product_id` FROM `product`")->fetch_assoc()["product_id"];

  
  for($x=0; $x < count($price); $x++){
      $s = $sizeName[$x];
      $p = $price[$x];

      $db->query("
          INSERT INTO `price`(
              `size_id`, `product_id`, 
              `size_name`, 
              `status`, `price`
          ) VALUES (
              '0','$maxProductId','$s','available','$p')
      ");

      $maxSizeId = $db->query("SELECT MAX(`size_id`) AS `size_id` FROM `price`")->fetch_assoc()["size_id"];
      
      for($y=$start; $y <= $materialCount+1; $y++){
          if(isset($_POST["materials$y"])){
              $materials = $_POST["materials$y"];
              $materialsQty = $_POST["materialsQty$y"];
              

              for($z = 0; $z < count($materials); $z++){
                  if($materialsQty[$z] < 1){
                    continue;
                  }
                  $db->query("
                      INSERT INTO `size_materials`(
                          `s_m_id`, `size_id`, `material_id`, `qty`
                      ) VALUES (
                          '0','$maxSizeId','".$materials[$z]."', '".$materialsQty[$z]."'
                      )
                  ");
              }

              $start = $y+1;
              break;
          }
      }
  }

  //flavor
  if(isset($_POST["flavor"])){
      $flavor = $_POST["flavor"];
      for($x=0; $x < count($flavor); $x++){
          $flavorNum = $flavor[$x];
          $flavorName = $db->query("SELECT `flavor_name` FROM `flavorings` WHERE `flavor_num` = '$flavorNum'")->fetch_assoc()["flavor_name"];
          if((int)$flavorNum > 0){
            $db->query("
              INSERT INTO `flavor`(
                  `flavor_id`, `flavor_num`, `product_id`, 
                  `flavor_name`, `status`
              ) VALUES (
                  '0','$flavorNum','$maxProductId','$flavorName','available')
          ");
          }
          
      }
  }
  





  echo '<script>window.location = "products.php?category_id='.$_GET["category_id"].'";</script>';
}


//submit edit product
if ($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST["editProduct"])) {
  //product details
  $productId = $_POST["productId"];
  $productName = $_POST["productName"];
  $categoryId = $_POST["categoryId"];
  $subCategory = $_POST["subCategory"];

  // Check if an image is uploaded
  if (!empty($_FILES['image']['name'])) {
    // Image upload logic as before
    $image_name = $_FILES['image']['name'];
    $image_size = $_FILES['image']['size'];
    $image_tmp = $_FILES['image']['tmp_name'];
    
    $folder_name = "images";
    $image_path = $folder_name . '/' . $image_name;
    
    move_uploaded_file($image_tmp, $image_path);
  } else {
    // If no new image is uploaded, retrieve the recent image from the database
    $query = $db->query("SELECT `image_name` FROM `product` WHERE `product_id` = '$productId'");
    $result = $query->fetch_assoc();
    
    if ($result) {
      $image_path = $result['image_name'];
    } else {
      // Handle the case where there's no recent image, set a default or handle it as needed
      $image_path = ""; // Set a default value or handle it differently
    }
  }

  $db->query("
    UPDATE `product` SET `product_name`='$productName', `material_id`='0', `category_id`='$categoryId', `sub_category_id`='$subCategory', `image_name`='$image_path' WHERE `product_id` = '$productId'
  ");


  //price and sizes
  $sizeName = $_POST["sizeName"];
  $price = $_POST["priceName"];
  $materialCount = $_POST["materialCount"];
  $start = 1;


  //echo '<script>alert("'.count($price).'");</script>';

  $db->query("
    DELETE FROM `price` WHERE `product_id` = '$productId'
  ");

  for($x=0; $x < count($price); $x++){
      $s = $sizeName[$x];
      $p = $price[$x];

      $db->query("
          INSERT INTO `price`(
              `size_id`, `product_id`, 
              `size_name`, 
              `status`, `price`
          ) VALUES (
              '0','$productId','$s','available','$p')
      ");

      $maxSizeId = $db->query("SELECT MAX(`size_id`) AS `size_id` FROM `price`")->fetch_assoc()["size_id"];
      
      for($y=$start; $y <= $materialCount; $y++){
          if(isset($_POST["materials$y"])){
            $materials = $_POST["materials$y"];
            $materialsQty = $_POST["materialsQty$y"];
            

            for($z = 0; $z < count($materials); $z++){
                if($materialsQty[$z] < 1){
                  continue;
                }
                $db->query("
                    INSERT INTO `size_materials`(
                        `s_m_id`, `size_id`, `material_id`, `qty`
                    ) VALUES (
                        '0','$maxSizeId','".$materials[$z]."', '".$materialsQty[$z]."'
                    )
                ");
            }

              $start = $y+1;
              break;
          }
      }
  }


  //flavor
  if(isset($_POST["flavor"])){
    $db->query("
      DELETE FROM `flavor` WHERE `product_id` = '".$productId."'
    ");
      $flavor = $_POST["flavor"];
      for($x=0; $x < count($flavor); $x++){
          $flavorNum = $flavor[$x];
          $flavorName = $db->query("SELECT `flavor_name` FROM `flavorings` WHERE `flavor_num` = '$flavorNum'")->fetch_assoc()["flavor_name"];
          
          if((int)$flavorNum > 0){
            $db->query("
              INSERT INTO `flavor`(
                  `flavor_id`, `flavor_num`, `product_id`, 
                  `flavor_name`, `status`
              ) VALUES (
                  '0','$flavorNum','$productId','$flavorName','available')
            ");
          }
          
      }
  }
  




  echo '<script>window.location = "products.php?category_id='.$_GET["category_id"].'";</script>';
}





include("./setSizeStatus.php");
include("./setFlavorStatus.php");
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Sleek Dashboard - Free Bootstrap 4 Admin Dashboard Template and UI Kit. It is very powerful bootstrap admin dashboard, which allows you to build products like admin panels, content management systems and CRMs etc.">
  
    <title><?php echo $db->query("SELECT `category_name` FROM `category` WHERE `category_id` = '$category'")->fetch_assoc()["category_name"]; ?></title>
    
    <!-- GOOGLE FONTS -->
    <link href="https://cdn.materialdesignicons.com/4.4.95/css/materialdesignicons.min.css" rel="stylesheet" />
  
    <!-- PLUGINS CSS STYLE -->
    <link href="assets/plugins/nprogress/nprogress.css" rel="stylesheet" />
  
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="animations.css">
    
    
    
    
    
    
    
    <link href='assets/plugins/data-tables/datatables.bootstrap4.min.css' rel='stylesheet'>
    
    <link href='assets/plugins/data-tables/jquery.datatables.min.css' rel='stylesheet'>

    <!-- SLEEK CSS -->
    <link id="sleek-css" rel="stylesheet" href="assets/css/sleek.css" />
  
    <!-- FAVICON -->
    <link href="assets/img/favicon.png" rel="shortcut icon" />
  
    <!--
      HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries
    -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="assets/plugins/nprogress/nprogress.js"></script>

    <script>
      //will be used for the adding of sizes
      var materialCount = 1;
    </script>
    
    <style>
      
      #imahe{
        margin-top: -70px;
        margin-left: 65px;
      }
    
    
      
      
      @keyframes blink {
  0% { opacity: 1; }
  50% { opacity: 0; }
  100% { opacity: 1; }
}

.button-container {
  text-align: center;
}

#stopButton {
  animation: blink 2s infinite;
  background-color: #29cc97;
  color: white;
  padding: 3px;
  border-radius: 2px;
  width: 37px;
 
}
#shake{
  font-weight: 500;
  font-size: 75%;
}
.content{
      animation: transitionIn-Y-bottom 1s;
   }


      </style>
  </head>

  <body class="header-fixed sidebar-fixed sidebar-dark header-light" id="body">
    <script>
      NProgress.configure({ showSpinner: false });
      NProgress.start();
    </script>

    <!-- ====================================
    ——— WRAPPER
    ===================================== -->
    <div class="wrapper">

      <!-- Github Link -->
      
          <defs>
            <linearGradient id="grad1" x1="0%" y1="75%" x2="100%" y2="0%">
              <stop offset="0%" style="stop-color:#896def;stop-opacity:1" />
              <stop offset="100%" style="stop-color:#482271;stop-opacity:1" />
            </linearGradient>
          </defs>
          <path d="M 0,0 L115,115 L115,115 L142,142 L250,250 L250,0 Z" fill="url(#grad1)"></path>
        </svg>
        <i class="mdi mdi-github-circle"></i>
      </a>




        <!-- ====================================
          ——— LEFT SIDEBAR WITH OUT FOOTER
        ===================================== -->
        <?php
        $page = "inventory";
        $subpage = "products";
        $subpage2 = $category;
        include("./sidebar.php");
       ?>

          <!-- ====================================
        ——— PAGE WRAPPER
        ===================================== -->
        <div class="page-wrapper">
          
          <!-- Header -->
          <header class="main-header " id="header">
            <nav class="navbar navbar-static-top navbar-expand-lg">
              <!-- Sidebar toggle button -->
              <button id="sidebar-toggler" class="sidebar-toggle">
                <span class="sr-only">Toggle navigation</span>
              </button>
              <!-- search form -->
              <div class="search-form d-none d-lg-inline-block">
               
              </div>

              <div class="navbar-right ">
                <ul class="nav navbar-nav">
                 
                 
                  <!-- User Account -->
                 
                  <li class="dropdown user-menu">
    <button href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
        <?php
        $query = "SELECT * FROM admin_user";
        $result = mysqli_query($db, $query);

        // Check if the query was successful
        if ($result) {
            // Fetch data into an associative array
            $userData = mysqli_fetch_assoc($result);

            // Check if there is a valid image URL in the database
            if (!empty($userData['image'])) {
                $imageURL = $userData['image'];
                echo '<img src="' . $imageURL . '" alt="User Image" style="height: 43px; width: 43px; border-radius: 50%;">';
            } else {
                echo 'No image found.';
            }

            // Display the user's first name and last name
            echo '<span class="d-none d-lg-inline-block">' . $userData['fname'] . ' ' . $userData['lname'] . '</span>';

            // Remember to free the result set
            mysqli_free_result($result);
        } else {
            echo 'Database query failed.';
        }
        ?>
    </button>
    <ul class="dropdown-menu dropdown-menu-right">
        <!-- User image and name -->
        <li class="dropdown-header">
            <?php
            // Display the user's image again
            if (!empty($userData['image'])) {
                echo '<img src="' . $imageURL . '" alt="User Image" style="height: 50px; width: 50px; border-radius: 50%;">';
            } else {
                echo 'No image found.';
            }
            ?>
            <div class="d-inline-block">
                <?php
                // Display the user's first name and last name
                echo $userData['fname'] . ' ' . $userData['lname'];
                ?>
                <small class="pt-1"><?php echo $userData['email']; ?></small>
            </div>
        </li>
        <li>
            <a href="user-profile.php">
                <i class="mdi mdi-account"></i> My Profile
            </a>
        </li>
        <li class="dropdown-footer">
            <a href="logout.php"> <i class="mdi mdi-logout"></i> Log Out </a>
        </li>
    </ul>
</li>
                </ul>
              </div>
            </nav>
          </header>

          
          <!-- ====================================
          ——— CONTENT WRAPPER
          ===================================== -->
          <div class="content-wrapper">
            <div class="content">





<div class="breadcrumb-wrapper">
	
	
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb p-0">
            <li class="breadcrumb-item">
              <a href="admin-dashboard.php">
                <span class="mdi mdi-home"></span>                
              </a>
            </li>
            <li class="breadcrumb-item">
              Products
            </li>
            <li class="breadcrumb-item" aria-current="page"><?php echo $db->query("SELECT `category_name` FROM `category` WHERE `category_id` = '$category'")->fetch_assoc()["category_name"]; ?></li>
          </ol>
        </nav>

</div>

<div class="row">

<?php

// Function to delete the product and associated price
function deleteProductAndPrice($db, $productId) {
  // Get the category_id of the product before deletion
  $categoryQuery = "SELECT category_id FROM product WHERE product_id = $productId";
  $categoryResult = mysqli_query($db, $categoryQuery);

  if ($categoryResult && $categoryRow = mysqli_fetch_assoc($categoryResult)) {
    $category_id = $categoryRow['category_id'];

    // Delete the product from the 'product' table
    $deleteProductQuery = "UPDATE product SET archive = 1 WHERE product_id = $productId";

    // Delete associated prices from the 'price' table
    //$deletePriceQuery = "DELETE FROM price WHERE product_id = $productId";

    // Perform the deletion operations
    if (mysqli_query($db, $deleteProductQuery) /*&& mysqli_query($db, $deletePriceQuery)*/) {
      return $category_id; // Return the category_id
    }
  }

  return false; // Return false if deletion or category retrieval fails
}

if (isset($_POST['productId'])) {
  $productId = $_POST['productId'];

  if (isset($_POST['confirmDelete']) && $_POST['confirmDelete'] === 'yes') {
    $category_id = deleteProductAndPrice($db, $productId);

    if ($category_id !== false) {
      // Deletion was successful
     
      // Redirect to the 'products.php' page with the category_id
      echo "<script>window.location = 'products.php?category_id=$category_id';</script>";
      exit();
    } else {
      // Deletion failed
      echo 'Failed to delete product. Please try again.';
    }
  }
}



$query = "SELECT * FROM product WHERE category_id = $category AND archive = 0";
$result = mysqli_query($db, $query);

// Fetch data into an associative array
$productData = array();
while ($row = mysqli_fetch_assoc($result)) {
    $productData[] = $row;
}
?>

<script src="assets/plugins/jquery/jquery.min.js"></script>
<!-- Button trigger modal -->


<div class="col-12">
    <div class="card card-default">
    <div class="card-header card-header-border-bottom d-flex justify-content-between">
    <h2><?php echo $db->query("SELECT `category_name` FROM `category` WHERE `category_id` = '$category'")->fetch_assoc()["category_name"]; ?></h2>
   

<button type="button" class="btn btn-primary" id="addProductBtn" data-toggle="modal" data-target="#addModal"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-plus-lg" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
</svg>
  Add Product
</button>
</div>



        <div class="card-body">
            <div class="expendable-data-table">
                <table id="expendable-data-table" class="table" style="width:100%">
                    <!-- ... (table headers) -->
                    <thead style="background-color: #e4eccd">
                        <tr>
                           
                            <th style="font-weight: 600;padding: 0.75rem;">#</th>
                            <th style="font-weight: 600;padding: 0.75rem;">PRODUCT NAME</th>
                            <th style="font-weight: 600;padding: 0.75rem;">IMAGE</th>
                            <th style="font-weight: 600;padding: 0.75rem;">PRICE</th>
                            <th style="text-align: right;"></th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php $rowCount = 1; foreach ($productData as $product): ?>
                            <?php
                            
                            ?>

                            <tr>
                               
                                <td style="color:#6c757d;vertical-align: middle;padding: 0rem 0.75rem;"><?php echo $rowCount; ?></td>
                                <td style="vertical-align: middle;padding: 0rem 0.75rem;"><?php echo $product['product_name']; ?></td>
                                <td style="padding: 4px 0px;padding: 0rem 0.75rem;"><img src="<?php echo $product['image_name']; ?>" alt="Product Image" style="width: 30%; height: 4rem; object-fit: contain;"></td>

                                                      <?php
                      // Retrieve price data from the 'price' table
                      $priceQuery = "SELECT * FROM price WHERE product_id = " . $product['product_id'];
                      $priceResult = mysqli_query($db, $priceQuery);

                      // Create an array to store formatted prices
                      $prices = array();

                      while ($priceData = mysqli_fetch_assoc($priceResult)) {
                          // Format the price with two decimal places and add it editBtn_to the prices array
                          $formattedPrice = '₱' . number_format($priceData['price'], 2);
                          $prices[] = $formattedPrice;  
                      }

                      // Join the formatted prices with a separator (e.g., "|")
                      $priceString = implode(" | ", $prices);
                      ?>

                      <td style="vertical-align: middle;padding: 0rem 0.75rem;"><?php echo $priceString; ?></td>

                                <td class="text-right" style="vertical-align: middle;padding: 0rem 0.75rem;">
                                    <div class="dropdown show d-inline-block widget-dropdown">
                                        <a class="dropdown-toggle icon-burger-mini" href="#" role="button" id="dropdown-recent-order1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static"></a>
                                        <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-recent-order1">
                                            <li class="dropdown-item">
                                                <a href="#" data-toggle="modal" data-target="#productModal_<?php echo $product['product_id']; ?>"><i class="fas fa-eye fa-sm" aria-hidden="true" name="clear"></i>&emsp;View</a>
                                            </li>
                                            <li class="dropdown-item">
                                                <a href="#" class="editProductBtn" id="editBtn_<?php echo $product['product_id']; ?>" data-toggle="modal" data-target="#editModal"><i class="fas fa-edit fa-sm" aria-hidden="true" name="clear"></i>&emsp;Edit</a>
                                            </li>
            <li class="dropdown-item">
                            <!-- Trigger the Bootstrap modal -->
                            <a href="#" data-toggle="modal" data-target="#confirmDeleteModal_<?php echo $product['product_id']; ?>"><i class="fas fa-trash fa-sm" aria-hidden="true" name="clear"></i>&emsp;Remove</a>
                        </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>

                            <!--SCRIPT FOR DROPDOWN FUNCTIONS-->
                            <script>
                              $("#editBtn_<?php echo $product['product_id']; ?>").click(function(){
                                materialCount = 1;

                                $("#editProductId").val("<?=$product["product_id"]?>");
                                $("#editProductName").val("<?=$product["product_name"]?>");
                                $("#editSubCategory").val("<?=$product["sub_category_id"]?>");

                                //clear the size-div and flavor-div first then add all the sizes and flavors of products
                                $("#edit-size-div").html("");
                                $("#edit-flavor-div").html("");
                                  <?php
                                    $price = "SELECT * FROM `price` WHERE `product_id` = '".$product["product_id"]."'";
                                    $priceResult = mysqli_query($db, $price);
                                    $count = 1;
                                    while($row = $priceResult->fetch_assoc()){
                                      $size_id = $row["size_id"];

                                      

                                      $materialCheckbox = "";
                                     
                                      $materials = "SELECT * FROM materials WHERE 1";
                                      $materialsResult = mysqli_query($db, $materials);
                                      
                                      while($row2 = $materialsResult->fetch_assoc()){

                                        $sizeMaterials = $db->query("SELECT * FROM `size_materials` WHERE `size_id` = '$size_id' AND `material_id` = '".$row2["material_id"]."'");
                                        $materialQty = 0;
                                        if($sizeMaterials->num_rows > 0){
                                          while($row3 = $sizeMaterials->fetch_assoc()){
                                            $materialQty = $row3["qty"];
                                          }
                                          
                                        }
                                        else{
                                          $materialQty = 0;
                                        }


                                        
                                          $materialCheckbox .= '
                                            <div class="row py-2">
                                              <div class="col-7">
                                                <input type="hidden" value="'.$row2["material_id"].'" name="materials${materialCount}[]">
                                                '.$row2["material_name"].'
                                              </div>
                                              <div class="col-4">
                                                <input type="number" class="w-100" value="'.$materialQty.'" min="0" name="materialsQty${materialCount}[]"><br>
                                              </div>
                                            </div>
                                        ';
                                      }

                                      echo '
                                        $("#edit-size-div").append(`
                                          <div class="row mb-3">
                                            <div class="col-4">
                                              <input type="text" class="form-control" placeholder="Size name" name="sizeName[]" value="'.$row["size_name"].'" style="width: 110%;">
                                            </div>
                                            <div class="col-3">
                                              <input type="text" class="form-control" placeholder="Price" name="priceName[]" value="'.$row["price"].'" style="width: 120%;" required>
                                            </div>
                                            <div class="col-3">
                                              <div class="dropdown">
                                                <button style="background-color: #D0D0D0; color: #222;" class="btn btn-white dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                                                  Materials
                                                </button>
                                                <div class="dropdown-menu materialsList" style="width: 350px; max-height: 500px; overflow-y: auto; overflow-x: hidden">
                                                  '.$materialCheckbox.'
                                                </div>
                                              </div>
                                            </div>
                                            <div class="col-1">
                                              <button type="button" class="btn" style="background-color: #eee; border-color: #f35a36; color: #f35a36" onclick="this.parentNode.parentNode.remove()">
                                                <i class="fas fa-xmark fa-lg" aria-hidden="true" name="clear"></i>
                                              </button>
                                            </div>
                                          </div>
                                        `);

                                        materialCount++;
                                        
                                      ';
                                      
                                    }

                                    $productFlavor = "SELECT * FROM `flavor` WHERE `product_id` = '".$product['product_id']."'";
                                    $productFlavorResult = mysqli_query($db, $productFlavor);


                                    
                                  
                                    while($row = $productFlavorResult->fetch_assoc()){ 
                                      $flavor_num = $row["flavor_num"];

                                      $flavor = "SELECT * FROM flavorings WHERE 1";
                                      $flavorResult = mysqli_query($db, $flavor);
                                      $flavorOptions = "";
                                      while($row2 = $flavorResult->fetch_assoc()){
                                        $flavorOptions .= '
                                          <option value="'.$row2["flavor_num"].'" '.($flavor_num === $row2["flavor_num"] ? "selected" : "").'>'.$row2["flavor_name"].'</option>
                                        ';
                                      }

                                      echo '
                                        $("#edit-flavor-div").append(`
                                          <div class="row mb-3">
                                            <div class="col">
                                              <select class="form-control" name="flavor[]" value="'.$flavor_num.'">
                                                <option selected>None</option>
                                                  '.$flavorOptions.'
                                              </select>
                                            </div>
                                            <div class="col">
                                              <button type="button" class="btn" style="background-color: #eee; border-color: #f35a36; color: #f35a36" onclick="this.parentNode.parentNode.remove()">
                                                <i class="fas fa-xmark fa-lg" aria-hidden="true" name="clear"></i>
                                              </button>
                                            </div>
                                          </div>
                                        `);
                                      ';
                                    }

                                ?>

                                  $("#editMaterialCount").val(materialCount);
                              });
                            </script>




 <!-- Bootstrap Modal for Confirmation Dialog -->
 <div class="modal fade" id="confirmDeleteModal_<?php echo $product['product_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmDeleteModalLabel">Confirm Deletion</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this product?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <form method="POST">
                        <input type="hidden" name="productId" value="<?php echo $product['product_id']; ?>">
                        <input type="hidden" name="confirmDelete" value="yes">
                        <button type="submit" class="btn" style="background-color: #f35a36; color: #fff">Yes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>





    <script src="assets/plugins/jquery/jquery.min.js"></script>
<!-- Button trigger modal -->  



<!-- Bootstrap 4 Smaller Modal for each product -->
<div class="modal fade" id="productModal_<?php echo $product['product_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="productModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content" style="color: #343a40;">
            <div class="modal-header">
                <h5 class="modal-title" id="productModalLabel"><b><?php echo $product['product_name']; ?></b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <img src="<?php echo $product['image_name']; ?>" alt="Product Image" style="width: 100%; object-fit: contain; height: 140px; width: 200px; margin-left: -5px; padding-right: 15px;">
                    </div>
                    <div class="col-md-6 product-details">
                      <div class="row">
                        <div class="col">
                          <h5><b>Price</b></h5>
                          <br>
                          <?php
                            // Retrieve price data from the 'price' table
                            $priceQuery = "SELECT * FROM price WHERE product_id = " . $product['product_id'];
                            $priceResult = mysqli_query($db, $priceQuery);

                            while ($priceData = mysqli_fetch_assoc($priceResult)) {
                                echo '<div class="price-details">';
                                echo '<p>' . $priceData['size_name'] . '</p>';
                                
                                // Display the status column
                              

                                // Check if the status column is "unavailable"
                                if ($priceData['status'] == 'unavailable') {
                                    // Display an image for unavailable products
                                    echo '<p> ₱ ' . $priceData['price'] . '</p>';
                                    echo '<img id="imahe" src="assets/img/unavailable.png" alt="Unavailable" style="width: 100px;">';
                                } else {
                                    // Display the price for available products
                                    echo '<p> ₱ ' . number_format($priceData['price'], 2) . '</p>';
                                }

                                echo '<br>';
                                echo '</div>';
                            }
                          ?>
                        </div>

                        <div>
                          
                          <?php
// Retrieve flavor names with 'status' set to "unavailable" from the 'flavor' table
$flavorQuery = "SELECT GROUP_CONCAT(flavor_name SEPARATOR ', ') AS unavailable_flavors FROM flavor WHERE product_id = " . $product['product_id'] . " AND status = 'unavailable'";
$flavorResult = mysqli_query($db, $flavorQuery);
$flavorData = mysqli_fetch_assoc($flavorResult);

if ($flavorData['unavailable_flavors']) {
    echo '<div class="price-details1">';
    echo '<p style="color: red; font-size: 12px;">Unavailable Flavor/s: ' . $flavorData['unavailable_flavors'] . '</p>';
   
    echo '</div>';
}
?>



                        </div>
                      </div>
                        
                        
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- End of Bootstrap 4 Smaller Modal -->





                           
                      <?php
                        $rowCount++;
                        endforeach; 
                      ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



	
</div>





							

      </div> <!-- End Content -->
    </div> <!-- End Content Wrapper -->
    
    
    <!-- Footer -->
    <footer class="footer mt-auto">
      <div class="copyright bg-white">
       
      </div>
      <script>
        var d = new Date();
        var year = d.getFullYear();
        document.getElementById("copy-year").innerHTML = year;
        
      </script>
    </footer>

    </div> <!-- End Page Wrapper -->
  </div> <!-- End Wrapper -->


    <!-- <script type="module">
      import 'https://cdn.jsdelivr.net/npm/@pwabuilder/pwaupdate';

      const el = document.createElement('pwa-update');
      document.body.appendChild(el);
    </script> -->

    <!-- Javascript -->
    <script src="assets/plugins/jquery/jquery.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
 
    
    

    
    

    
    
    

    
    
    

    

    
    
    
    

    

    

    
    
    

    <script src='assets/plugins/data-tables/jquery.datatables.min.js'></script>
    <script src='assets/plugins/data-tables/datatables.bootstrap4.min.js'></script>

    

    <script src="assets/js/sleek.js"></script>
</body>
</html>


<script>
  /* Formatting function for row details - modify as you need */
  function format () {
    return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">'+
			'<tr>'+
				'<td>Full name:</td>'+
				'<td>Name...</td>'+
			'</tr>'+
			'<tr>'+
				'<td>Extension number:</td>'+
				'<td>123</td>'+
			'</tr>'+
			'<tr>'+
				'<td>Extra info:</td>'+
				'<td>And any further details here (images etc)...</td>'+
			'</tr>'+
    '</table>';
  }
 
  $(document).ready(function() {
    var table = $('#expendable-data-table').DataTable( {
      "className":      'details-control',
      "order": [[0, 'asc']],
      "aLengthMenu": [[20, 30, 50, 75, -1], [20, 30, 50, 75, "All"]],
      "pageLength": 20,
      "dom": '<"row align-items-center justify-content-between top-information"lf>rt<"row align-items-center justify-content-between bottom-information"ip><"clear">'
    });

    // Add event listener for opening and closing details
    $('#expendable-data-table tbody').on('click', 'td.details-control', function () {
      var tr = $(this).closest('tr');
      var row = table.row( tr );
 
      if ( row.child.isShown() ) {
        // This row is already open - close it
        row.child.hide();
        tr.removeClass('shown');
      }
      else {
        // Open this row
        row.child( format(row.data()) ).show();
        tr.addClass('shown');
      }
    });
  });
</script>








<!--Add Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModal" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addModalLabel">Add Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Add form for adding product data here -->
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']."?category_id=".$_GET["category_id"]; ?>" enctype="multipart/form-data">
          <input type="hidden" id="materialCount" name="materialCount" value="1">
          <input type="hidden" id="categoryId" name="categoryId" value="<?=$category?>">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="addProductName">Product Name</label>
              <input type="text" class="form-control" id="addProductName" name="addProductName" value="" required>
            </div>
            <div class="form-group col-md-6">
              <label for="addSubCategory">Sub Category</label>
              <select class="form-control" name="subCategory" id="addSubCategory">
                <?php
                    $subCategory = "SELECT * FROM sub_category WHERE `category_id` = $category";
                    $subCategoryResult = mysqli_query($db, $subCategory);
                    
                    while($row = $subCategoryResult->fetch_assoc()){
                        echo '
                            <option value="'.$row["sub_category_id"].'">'.$row["sub_category_name"].'</option>
                        ';
                    }
                ?>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label>Choose Image</label><br>
            <input id="choosefile" type="file" accept="image/*" name="image" onchange="readURL(this, 'image_area')" required>
            <img src="./images/no-image.png" alt="Product Image" id="image_area" style="width: 80px; height: 80px; object-fit: contain; margin-left: 1rem">

          </div>
          <div class="form-group">    
            <label for="addProductPrices">Price and Sizes</label>  &nbsp; &nbsp;<button type="button" class="addSize" id="addSize-add"><svg xmlns="http://www.w3.org/2000/svg" style="margin-top: -5px;" width="20" height="20" fill="#76a004" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
            </svg></button>
            <div class="size-div" id="add-size-div">
              <div class="row mb-3">
                <div class="col-4">
                  <input type="text" class="form-control" placeholder="Size name" name="sizeName[]" style="width: 110%;">
                </div>
                <div class="col-3">
                  <input type="text" class="form-control" placeholder="Price" name="priceName[]" style="width: 120%;" required>
                </div>
                <div class="col-3">
                  <div class="dropdown">
                    <button style="background-color: #D0D0D0; color: #222;" class="btn btn-white dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                      Materials
                    </button>
                    <div class="dropdown-menu materialsList" style="width: 350px; max-height: 500px; overflow-y: auto; overflow-x: hidden">
                      <?php
                          $materials = "SELECT * FROM materials WHERE 1";
                          $materialsResult = mysqli_query($db, $materials);
                          
                          while($row = $materialsResult->fetch_assoc()){
                              echo '
                                <div class="row py-2">
                                  <div class="col-7">
                                    <input type="hidden" value="'.$row["material_id"].'" name="materials1[]">
                                    '.$row["material_name"].'
                                  </div>
                                  <div class="col-4">
                                    <input type="number" class="w-100" value="0" min="0" name="materialsQty1[]"><br>
                                  </div>
                                </div>
                              ';
                          }
                      ?>
                    </div>
                  </div>
                </div>
                <div class="col-1">
                  <button type="button" class="btn" style="background-color: #eee; border-color: #f35a36; color: #f35a36" onclick="this.parentNode.parentNode.remove()">
                    <i class="fas fa-xmark fa-lg" aria-hidden="true" name="clear"></i>
                </button>
                </div>
              </div>
            </div>

                
            <label>Flavors</label>  <button type="button" class="btn mt-0 addFlavor" id="add-addFlavor"><svg xmlns="http://www.w3.org/2000/svg" style="margin-top: -6px;" width="20" height="20" fill="#76a004" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
            </svg></button><br>
              <div class="add-flavor-div" id="add-flavor-div">
                <div class="row mb-3">
                  <div class="col">
                    <select class="form-control" name="flavor[]">
                      <option selected>None</option>
                      <?php
                        $flavor = "SELECT * FROM flavorings WHERE 1";
                        $flavorResult = mysqli_query($db, $flavor);
                        
                        while($row = $flavorResult->fetch_assoc()){
                            echo '
                                <option value="'.$row["flavor_num"].'">'.$row["flavor_name"].'</option>
                            ';
                        }
                      ?>
                    </select>
                  </div>
                  <div class="col">
                    <button type="button" class="btn" style="background-color: #eee; border-color: #f35a36; color: #f35a36" onclick="this.parentNode.parentNode.remove()">
                      <i class="fas fa-xmark fa-lg" aria-hidden="true" name="clear"></i>
                  </button>
                  </div>
                </div>
                        
              </div>

            </div>

            <!-- Add other input fields for adding as needed -->
                    
          <button type="submit" class="btn btn-primary" style="float: right;" name="addProduct">Save Changes</button>
        </form>
      </div>

    </div>
  </div>
</div>




<!--Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModal" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Edit form for editing product data here -->
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']."?category_id=".$_GET["category_id"]; ?>" enctype="multipart/form-data">
          <input type="hidden" id="editProductId" name="productId" value="1">
          <input type="hidden" id="editMaterialCount" name="materialCount" value="1">
          <input type="hidden" id="editCategoryId" name="categoryId" value="<?=$category?>">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="editProductName">Product Name</label>
              <input type="text" class="form-control" id="editProductName" name="productName" value="" required>
            </div>
            <div class="form-group col-md-6">
              <label for="editSubCategory">Sub Category</label>
              <select class="form-control" name="subCategory" id="editSubCategory">
                <?php
                    $subCategory = "SELECT * FROM sub_category WHERE `category_id` = $category";
                    $subCategoryResult = mysqli_query($db, $subCategory);
                    
                    while($row = $subCategoryResult->fetch_assoc()){
                        echo '
                          <option value="'.$row["sub_category_id"].'">'.$row["sub_category_name"].'</option>
                        ';
                    }
                ?>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label>Change Image</label><br>
            <input id="editChoosefile" type="file" accept="image/*" name="image" onchange="readURL(this, 'image_area_edit')">
            <img src="./images/no-image.png" alt="Product Image" id="image_area_edit" style="width: 80px; height: 80px; object-fit: contain; margin-left: 1rem">
          </div>
          <div class="form-group">    
            <label for="editProductPrices">Price and Sizes</label>  &nbsp; &nbsp;<button type="button" class="addSize" id="edit-addSize"><svg xmlns="http://www.w3.org/2000/svg" style="margin-top: -5px;" width="20" height="20" fill="#76a004" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
            </svg></button>
            <div class="size-div" id="edit-size-div">
              <!--Sizes will go here-->
            </div>

                
            <label>Flavors</label>  
            <button type="button" class="btn mt-0 addFlavor" id="edit-addFlavor"><svg xmlns="http://www.w3.org/2000/svg" style="margin-top: -6px;" width="20" height="20" fill="#76a004" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
            </svg></button><br>
              <div class="edit-flavor-div" id="edit-flavor-div">
                <!--Flavors will go here-->        
              </div>

            </div>

            <!-- Edit other input fields for editing as needed -->
                    
          <button type="submit" class="btn btn-primary" style="float: right;" name="editProduct">Save Changes</button>
        </form>
      </div>

    </div>
  </div>
</div>





<script>
  //materialCount located at the <head>

  var mode = "";
  
  $("#addProductBtn").click(function(){
    materialCount = 1;
    mode = "add";
  });

  $(".editProductBtn").click(function(){
    mode = "edit";
  });

  $("#edit-addSize").click(function(){
    mode = "edit";
  });

  $("#edit-addFlavor").click(function(){
    mode = "edit";
  });

  $("#add-addFlavor").click(function(){
    mode = "add";
  })

  $("#edit-addFlavor").click(function(){
    mode = "edit";
  })


  $(".addSize").click(function(){
    materialCount++;
    $(`#${mode}MaterialCount`).val(materialCount);
    $(`#${mode}-size-div`).append(`
        <div class="row mb-3">
          <div class="col-4">
            <input type="text" class="form-control" placeholder="Size name" name="sizeName[]" style="width: 110%;">
          </div>
          <div class="col-3">
            <input type="text" class="form-control" placeholder="Price" name="priceName[]" style="width: 120%;" required>
          </div>
          <div class="col-3">
            <div class="dropdown">
              <button style="background-color: #D0D0D0; color: #222;" class="btn btn-white dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                Materials
              </button>
              <div class="dropdown-menu materialsList" style="width: 350px; max-height: 500px; overflow-y: auto; overflow-x: hidden">
                <?php
                    $materials = "SELECT * FROM materials WHERE 1";
                    $materialsResult = mysqli_query($db, $materials);
                    
                    while($row = $materialsResult->fetch_assoc()){
                        echo '
                          <div class="row py-2">
                            <div class="col-7">
                              <input type="hidden" value="'.$row["material_id"].'" name="materials${materialCount}[]">
                              '.$row["material_name"].'
                            </div>
                            <div class="col-4">
                              <input type="number" class="w-100" value="0" min="0" name="materialsQty${materialCount}[]"><br>
                            </div>
                          </div>
                        ';
                    }
                ?>
              </div>
            </div>
          </div>
          <div class="col-1">
            <button type="button" class="btn" style="background-color: #eee; border-color: #f35a36; color: #f35a36" onclick="this.parentNode.parentNode.remove()">
              <i class="fas fa-xmark fa-lg" aria-hidden="true" name="clear"></i>
            </button>
          </div>
        </div>
    `);
  });


  $(".addFlavor").click(function(){
    $(`#${mode}-flavor-div`).append(`
      <div class="row mb-3">
        <div class="col">
          <select class="form-control" name="flavor[]">
            <option selected>None</option>
            <?php
                $flavor = "SELECT * FROM flavorings WHERE 1";
                $flavorResult = mysqli_query($db, $flavor);
                
                while($row = $flavorResult->fetch_assoc()){
                    echo '
                        <option value="'.$row["flavor_num"].'">'.$row["flavor_name"].'</option>
                    ';
                }
            ?>
          </select>
        </div>
        <div class="col">
          <button type="button" class="btn" style="background-color: #eee; border-color: #f35a36; color: #f35a36" onclick="this.parentNode.parentNode.remove()">
            <i class="fas fa-xmark fa-lg" aria-hidden="true" name="clear"></i>
          </button>
        </div>
      </div>
            
    `);
  });

//show image when input file uploaded
function readURL(input, id) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                    $(`#${id}`).attr('src', e.target.result).width(80).height(80);
                    };

                    reader.readAsDataURL(input.files[0]);
                }
                else{
                    $(`#${id}`).attr('src', './images/no-image.png').width(80).height(80);
                }
            }



$(document).on('click', '.materialsList', function (e) {
  e.stopPropagation();
});
</script>