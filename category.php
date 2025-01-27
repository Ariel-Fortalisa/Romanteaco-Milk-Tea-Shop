<?php
include("connection/connect.php");  //include connection file
//error_reporting(0);  // using to hide undefine undex errors
session_start(); //start temp session until logout/browser closed

include("./checkLoginSession.php");
include("./checkAdminSession.php");
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Sleek Dashboard - Free Bootstrap 4 Admin Dashboard Template and UI Kit. It is very powerful bootstrap admin dashboard, which allows you to build products like admin panels, content management systems and CRMs etc.">
  
    <title>Category</title>
    
    <!-- GOOGLE FONTS -->
    
    <link href="https://cdn.materialdesignicons.com/4.4.95/css/materialdesignicons.min.css" rel="stylesheet" />
  
    <!-- PLUGINS CSS STYLE -->
    <link href="assets/plugins/nprogress/nprogress.css" rel="stylesheet" />
  
    <!-- No Extra plugin used -->
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
    
    <style>
       .matcha-background {
      
        color: #1b223c;
      }
     
      #tuko{
        border: none;
        
      }
      #tukos{
        border: none;
        font-weight: normal;
        color: gray;
      }
      #searchmoto{
      
        width: 200px;
       
        
      }
      .th{
      
        color: #495057;
      
        
      }
      #kamay{
        margin-right: -20px;
      }
      #kamay:hover{
        color: #4c84ff;
        
      }
      
 .content{
      animation: transitionIn-Y-bottom 1s;
   }

   .center {
  display: block;
  margin-left: auto;
  margin-right: auto;
  margin-top: 1rem;
  width: 50%;
}
    
    
      </style>

      <!-- Javascript -->
    <script src="assets/plugins/jquery/jquery.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script>
   document.addEventListener("DOMContentLoaded", function() {
       const searchInput = document.getElementById("searchInputa");
       const tableRows = document.querySelectorAll(".table tbody tr");

       searchInput.addEventListener("input", function() {
           const searchText = searchInput.value.toLowerCase();

           tableRows.forEach(function(row) {
               const rowData = row.textContent.toLowerCase();
               if (rowData.includes(searchText)) {
                   row.style.display = "";
               } else {
                   row.style.display = "none";
               }
           });
       });
   });
</script>
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
        $subpage = "category";
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

<div class="row">



<div class="col-12">
    <div class="card card-default">
        <div class="card-header card-header-border-bottom d-flex justify-content-between">
            <h2>Category</h2>

            
        </div>

        <div class="card-body">
          
          
            

        <?php
// Function to delete the product and associated price
function deleteProductAndPrice($db, $category_id) {
    // Delete the category from the 'category' table
    $deleteCategoryQuery = "DELETE FROM category WHERE category_id = $category_id";

    // Perform the deletion operation
    if (mysqli_query($db, $deleteCategoryQuery)) {
        return true; // Deletion successful
    } else {
        return false; // Deletion failed
    }
}

// Check if the "category_id" parameter is present in the request
if (isset($_POST['category_id'])) {
    $category_id = $_POST['category_id'];

    // Check if the "confirmDelete" parameter is set to "yes"
    if (isset($_POST['confirmDelete']) && $_POST['confirmDelete'] === 'yes') {
        // Attempt to delete the category
        if (deleteProductAndPrice($db, $category_id)) {
            // Deletion was successful
            echo "<script>window.location = 'category.php';</script>";
    exit();
            
        } else {
            // Deletion failed
            echo 'Failed to delete material. Please try again.';
        }
    }
}




if (isset($_POST['update_category'])) {
    $category_id = $_POST['category_id'];
    $newCategoryName = $_POST['category_name'];
    
    // Initialize the image_path
    $image_path = "";

    // Check if an image file was uploaded
    if (!empty($_FILES['image']['name'])) {
        $image_name = $_FILES['image']['name'];
        $image_size = $_FILES['image']['size'];
        $image_tmp = $_FILES['image']['tmp_name'];

        // Specify the folder name where the image will be saved
        $folder_name = "images";

        // Create the complete image path with the folder name
        $image_path = $folder_name . '/' . $image_name;

        // Move the uploaded file to the specified folder
        if (!move_uploaded_file($image_tmp, $image_path)) {
            // Image upload failed
            $errorMessage = 'Failed to upload the image. Please try again.';
            // You may want to exit here or handle the error differently
        }
    }

    // Perform the database update operation
    if (!empty($image_path)) {
        $updateQuery = "UPDATE category SET category_name = '$newCategoryName', category_logo = '$image_path' WHERE category_id = $category_id";
    } else {
        $updateQuery = "UPDATE category SET category_name = '$newCategoryName' WHERE category_id = $category_id";
    }

    if (mysqli_query($db, $updateQuery)) {
        // Update successful, you can redirect or display a success message
        // For example, you can redirect to the same page:


        $subCategoryId = $_POST["subCategoryId"];
        $subCategoryName = $_POST["subCategory"];

        $ids = "";
        for($i = 0; $i < count($subCategoryId); $i++){
            $ids .= "AND sub_category_id != ".$subCategoryId[$i]." ";
        }


        $db->query("
            DELETE FROM `sub_category` WHERE `category_id` = '$category_id' $ids
        ");

        for($x=0; $x < count($subCategoryName); $x++){
            $scN = $subCategoryName[$x];
            if($x < count($subCategoryId)){
                $scId = $subCategoryId[$x];
                $db->query("
                    UPDATE `sub_category` SET `sub_category_name` = '$scN' WHERE `sub_category_id` = $scId
                ");
            }
            else{
                $db->query("
                    INSERT INTO `sub_category`(`category_id`, `sub_category_name`) VALUES ('$category_id','$scN')
                ");
            }

        
        }


        echo "<script>window.location = 'category.php';</script>";
        exit;
    } else {
        // Update failed, you can display an error message
        // For example:
        $errorMessage = 'Failed to update material. Please try again.';
    }

    
}



if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["addCategory"])) {
        // Retrieve form data
        $categoryName = $_POST["category_name"];

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

        // SQL query to insert data into the "category" table with the "category_logo" column
        $sql = "INSERT INTO category (category_name, category_logo) VALUES (?, ?)";
        $stmt = mysqli_prepare($db, $sql);

        if ($stmt) {
            // Bind parameters and execute the statement
            mysqli_stmt_bind_param($stmt, "ss", $categoryName, $image_path);

            if (mysqli_stmt_execute($stmt)) {
                // Category inserted successfully

                $maxCategoryId = $db->query("SELECT MAX(category_id) AS category_id FROM category")->fetch_assoc()["category_id"];

                $subCategory = $_POST["subCategory"];
                echo count($_POST["subCategory"]);
                for($i = 0; $i < count($subCategory); $i++){
                    $subCategoryName = $subCategory[$i];
                    echo "<script> console.log('".$subCategoryName."'); </script>";
                    $db->query("INSERT INTO `sub_category`(`category_id`, `sub_category_name`) VALUES ('$maxCategoryId','$subCategoryName')");
                    
                }

                echo "<script>window.location = 'category.php';</script>";
                exit(); // Make sure to exit after the JavaScript code to prevent further script execution
            } else {
                // Error occurred while inserting data
                echo "Error: " . mysqli_stmt_error($stmt);
            }

            // Close the statement
            mysqli_stmt_close($stmt);

            
        } else {
            // Error in preparing the statement
            echo "Error: " . mysqli_error($db);
        }

        
    }
}




// Optional: Fetch data into an associative array for further processing
$productData = array();
$query = "SELECT * FROM category"; // Refresh the original query
$result = mysqli_query($db, $query);
while ($row = mysqli_fetch_assoc($result)) {
    $productData[] = $row;
}

?>


               <button class="btn btn-primary" data-toggle="modal" data-target="#addCategoryModal"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
</svg>&nbsp;Category</button>


<style>
    #expendable-data-table th{
        font-weight: 600;
    }
    
</style>
             
            <div class="expendable-data-table">
                <br>
                <table id="expendable-data-table" class="table display nowrap" style="width:100%">
               <thead style="background-color: #e4eccd">
                    <tr>
                        
                            <th scope="col" style="padding-left: 1.5rem">#</th>
                           
                            <th scope="col">CATEGORY NAME</th>
                           
                           
                            <th scope="col" style="padding-left: 1.5rem">IMAGE</th>
                          
                            
                           
                            <th scope="col"></th>
                           
                        </tr>
                    </thead>
                   <tbody>
                       <?php $rowCount = 1; foreach ($productData as $product): ?>
                           <tr>
                          


                               <td style="color:#6c757d;padding-left: 1.5rem;vertical-align: middle;"><?php echo $rowCount; ?></td>
                               <td style="vertical-align: middle;"><?php echo $product['category_name']; ?></td>
                               <td style="padding: 4px 0px; vertical-align: top;"><img src="<?php echo $product['category_logo']; ?>" alt="Product Image" style="width: 30%; height: 3rem; object-fit: contain;"></td>
                             
                             
                              


                              
                               <td style="text-align: right;">
                                    <div class="dropdown show d-inline-block widget-dropdown">
                                        <a class="dropdown-toggle icon-burger-mini" href="#" role="button" id="dropdown-recent-order1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static"></a>
                                        <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-recent-order1">
                                            <li class="dropdown-item">
                                                <a href="#" data-toggle="modal" data-target="#editModal_<?php echo $product['category_id']; ?>"><i class="fas fa-edit fa-sm" aria-hidden="true" name="clear"></i>&emsp;Edit</a>
                                            </li>
                                            <li class="dropdown-item">
                                                <!-- Trigger the Bootstrap modal -->
                                                <a href="#" data-toggle="modal" data-target="#confirmDeleteModal_<?php echo $product['category_id']; ?>"><i class="fas fa-trash fa-sm" aria-hidden="true" name="clear"></i>&emsp;Remove</a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>

                            
                           </tr>

                    <?php
                        $rowCount++;
                        endforeach; 
                    ?>
                   </tbody>
               </table>
               </div>
             
               
<!-- Bootstrap Modal for Confirmation Dialog -->
<?php foreach ($productData as $product): ?>
    <div class="modal fade" id="confirmDeleteModal_<?php echo $product['category_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel_<?php echo $product['category_id']; ?>" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmDeleteModalLabel_<?php echo $product['category_id']; ?>"><svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="orange" class="bi bi-exclamation-triangle-fill" viewBox="0 0 16 16">
  <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
</svg> &nbsp;Confirm Deletion</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this category?</p><br>
                    <p style="font-size: 13px;">
                    Warning: Clicking "Yes" will result to permanent deletion and this action cannot be undone.
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <form method="POST">
                        <input type="hidden" name="category_id" value="<?php echo $product['category_id']; ?>">
                        <input type="hidden" name="confirmDelete" value="yes">
                        <button type="submit" class="btn btn-danger">Yes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>


<!-- Add Category Modal -->
<div class="modal fade" id="addCategoryModal" tabindex="-1" role="dialog" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addCategoryModalLabel">Add Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form to add category data with image upload -->
                <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
                    <input type="hidden" name="action" value="add">
                    <div class="form-group">
                        <label for="addCategoryName">Category Name</label>
                        <input type="text" class="form-control" id="addCategoryName" name="category_name" required>
                    </div>
                    <div class="form-group">
                    <label for="addSubCategory">Sub Category</label>  &nbsp; &nbsp;<button type="button" class="addSubCategory" id="addSubCategory-add"><svg xmlns="http://www.w3.org/2000/svg" style="margin-top: -5px;" width="20" height="20" fill="#76a004" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
                    </svg></button>
                        <div class="subcategory" id="add-sub-category">
                            <div class="row mb-3 subCategoryInput-add">
                                <div class="col-7">
                                    <input type="text" class="form-control" placeholder="Sub Category" value="Classic" name="subCategory[]" style="width: 110%;" required>
                                </div>

                                <div class="col-1">
                                    <button type="button" class="btn" style="background-color: #eee; border-color: #f35a36; color: #f35a36" onclick="removeRow(this, 'add');">
                                        <i class="fas fa-xmark fa-lg" aria-hidden="true" name="clear"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="image">Choose Image</label>
                        <input type="file" class="form-control-file" id="image" accept="image/*" name="image" onchange="readURL(this, 'image_area')" required>
                        <img src="./images/no-image.png" class="center" alt="Product Image" id="image_area" style="width: 80px; height: 80px; object-fit: contain;">
                    </div>

                    <div class="text-danger"><?php if (isset($addErrorMessage)) echo $addErrorMessage; ?></div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" style="float: right;" name="addCategory">Add Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

               
<!-- Edit Material Modal -->
<?php foreach ($productData as $product): ?>
    <div class="modal fade" id="editModal_<?php echo $product['category_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Category Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Form to edit material data -->
                    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
                        <input type="hidden" name="category_id" value="<?php echo $product['category_id']; ?>">
                        <div class="form-group">
                            <label for="editCategoryName">Category Name</label>
                            <input type="text" class="form-control" id="editCategoryName" name="category_name" value="<?php echo $product['category_name']; ?>">
                        </div>
                        <div class="form-group">
                        <label for="editSubCategory">Sub Category</label>  &nbsp; &nbsp;<button type="button" class="addSubCategory" id="addSubCategory-edit-<?=$product["category_id"]?>"><svg xmlns="http://www.w3.org/2000/svg" style="margin-top: -5px;" width="20" height="20" fill="#76a004" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
                        </svg></button>
                            <div class="subcategory" id="edit-sub-category-<?=$product["category_id"]?>">
                                <?php
                                    $scRes = $db->query("
                                    SELECT *, (SELECT COUNT(*) FROM product WHERE sub_category_id = sub_category.sub_category_id AND archive = 0) as productCount
                                    FROM sub_category
                                    WHERE category_id = ".$product["category_id"]
                                    );
                                    while($scr = $scRes->fetch_assoc()){
                                        $disabled = $scr["productCount"] > 0 ? "disabled" : "";
                                        echo '
                                            <div class="row mb-3 subCategoryInput-edit-'.$product["category_id"].'">
                                                <div class="col-7">
                                                    <input type="hidden" name="subCategoryId[]" value="'.$scr["sub_category_id"].'">
                                                    <input type="text" class="form-control" placeholder="Sub Category" value="'.$scr["sub_category_name"].'" name="subCategory[]" style="width: 110%;" required>
                                                </div>
            
                                                <div class="col-1">
                                                    <button type="button" class="btn" style="background-color: #eee; border-color: #f35a36; color: #f35a36" onclick="removeRowEdit(this, \''.$product["category_id"].'\');" '.$disabled.'>
                                                        <i class="fas fa-xmark fa-lg" aria-hidden="true" name="clear"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        ';
                                    }
                                ?>
                                
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="image">Change Image</label>
                            <input type="file" class="form-control-file" id="image" accept="image/*" name="image" onchange="readURL(this, 'image_area_edit')">
                            <img src="./images/no-image.png" class="center" alt="Product Image" id="image_area_edit" style="width: 80px; height: 80px; object-fit: contain;">
                        </div>
                        <div class="text-danger"><?php if (isset($errorMessage)) echo $errorMessage; ?></div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="update_category">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
          $("#addSubCategory-edit-<?=$product["category_id"]?>").click(function(){
            $(`#edit-sub-category-<?=$product["category_id"]?>`).append(`
                <div class="row mb-3 subCategoryInput-edit<?=$product["category_id"]?>">
                    <div class="col-7">
                        <input type="text" class="form-control" placeholder="Sub Category" value="" name="subCategory[]" style="width: 110%;" required>
                    </div>

                    <div class="col-1">
                        <button type="button" class="btn" style="background-color: #eee; border-color: #f35a36; color: #f35a36" onclick="removeRowEdit(this, '<?=$product["category_id"]?>');">
                        <i class="fas fa-xmark fa-lg" aria-hidden="true" name="clear"></i>
                    </button>
                        </div>
                    </div>
                </div>
            `);

            
        });
    </script>
<?php endforeach; ?>
       
           
      
   


<!-- Add this code at the end of the loop, after generating the table -->





   <!-- JavaScript for Search Functionality -->
  

      

       
                   
           
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

    <script src="https://kit.fontawesome.com/193997d5c5.js" crossorigin="anonymous"></script>

    
 
    
    

    
    

    
    
    

    
    
    

    

    
    
    
    

    

    

    
    
    

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
      "className":'details-control',
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

  $("#addSubCategory-add").click(function(){
    $(`#add-sub-category`).append(`
        <div class="row mb-3 subCategoryInput-add">
            <div class="col-7">
                <input type="text" class="form-control" placeholder="Sub Category" value="" name="subCategory[]" style="width: 110%;" required>
            </div>

            <div class="col-1">
                <button type="button" class="btn" style="background-color: #eee; border-color: #f35a36; color: #f35a36" onclick="removeRowAdd(this);">
                <i class="fas fa-xmark fa-lg" aria-hidden="true" name="clear"></i>
            </button>
                </div>
            </div>
        </div>
    `);
  });

  function removeRowAdd(e){
    if($(`.subCategoryInput-add`).length > 1){
        return e.parentNode.parentNode.remove()
    }   
    
  }

  function removeRowEdit(e, id){
        if($(`.subCategoryInput-edit-${id}`).length > 1){
            return e.parentNode.parentNode.remove()
        }   
        
    }

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
</script>

