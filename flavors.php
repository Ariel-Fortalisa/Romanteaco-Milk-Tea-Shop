<?php
include("connection/connect.php");  //include connection file
//error_reporting(0);  // using to hide undefine undex errors
session_start(); //start temp session until logout/browser closed

include("./checkLoginSession.php");
include("./setFlavorStatus.php");
include("./checkAdminSession.php");

// Set the timezone to Philippines (Asia/Manila)
date_default_timezone_set('Asia/Manila');
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Sleek Dashboard - Free Bootstrap 4 Admin Dashboard Template and UI Kit. It is very powerful bootstrap admin dashboard, which allows you to build products like admin panels, content management systems and CRMs etc.">
  
    <title>Flavors</title>
    
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
        $subpage = "flavors";
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
            <h2>Flavors</h2>

            <button id="showModalBtn" data-toggle="modal" data-target="#myModal" style="margin-left: 10px;"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="#76a004" class="bi bi-info-circle" viewBox="0 0 16 16">
  <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
  <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
</svg></button> 
         
        </div>

        <div class="card-body">
          
          
            

      
        <?php

function deleteProductAndPrice($db, $flavor_num) {
  // Retrieve the details of the flavoring before deletion
  $selectQuery = "SELECT flavor_name, quantity, measurement FROM flavorings WHERE flavor_num = $flavor_num";
  $result = mysqli_query($db, $selectQuery);
  $row = mysqli_fetch_assoc($result);

  // Delete the product from the 'flavorings' table
  $deleteProductQuery = "DELETE FROM flavorings WHERE flavor_num = $flavor_num";

  // Perform the deletion operation
  if (mysqli_query($db, $deleteProductQuery)) {
      // Log the deletion activity
      $activity = "Admin permanently deleted {$row['quantity']} pack of {$row['flavor_name']} with a measurement of {$row['measurement']}";
      $activityLogsSql = "INSERT INTO activity_logs (activity, date, time) VALUES (?,?,?)";
      $activityLogsStmt = mysqli_prepare($db, $activityLogsSql);

      if ($activityLogsStmt) {
            $dt = date("Y-m-d");
            $tm = date("H:i:s");
          // Bind parameter and execute the statement for activity logs
          mysqli_stmt_bind_param($activityLogsStmt, "sss", $activity, $dt, $tm);

          if (mysqli_stmt_execute($activityLogsStmt)) {
              // Activity log inserted successfully
              mysqli_stmt_close($activityLogsStmt); // Close the statement here
              return true;
          } else {
              // Error occurred while inserting activity log
              mysqli_stmt_close($activityLogsStmt); // Close the statement here on error
              return false;
          }
      } else {
          // Error in preparing the activity logs statement
          return false;
      }
  } else {
      return false;
  }
}

// ... Rest of your code for adding materials remains the same


// Check if the "productId" parameter is present in the request
if (isset($_POST['flavor_num'])) {
  $flavor_num = $_POST['flavor_num'];

  // Check if the "confirmDelete" parameter is set to "yes"
  if (isset($_POST['confirmDelete']) && $_POST['confirmDelete'] === 'yes') {
      // Attempt to delete the product and associated price
      if (deleteProductAndPrice($db, $flavor_num)) {
          // Deletion was successful
          
      } else {
          // Deletion failed
          echo 'Failed to delete material. Please try again.';
      }
  }
}
        


if ($_SERVER["REQUEST_METHOD"] === "POST") {
  if (isset($_POST["addMaterial"])) {
      // Retrieve form data
      $materialName = $_POST["flavor_name"];
      $quantity = $_POST["quantity"];
      $cost = $_POST["cost"];
      $measurement = $_POST["measurement"];
      $expirationDate = !empty($_POST["date"]) ? $_POST["date"]: NULL;

      // SQL query to insert data into the "flavorings" table
      $flavoringsSql = "INSERT INTO flavorings (flavor_name, quantity, cost, measurement, expiration_date, expiration_status) VALUES (?, ?, ?, ?, ?, ?)";
      $flavoringsStmt = mysqli_prepare($db, $flavoringsSql);

      if ($flavoringsStmt) {
          // Bind parameters and execute the statement
          $goodPlaceholder = "GOOD";
          mysqli_stmt_bind_param($flavoringsStmt, "sddsss", $materialName, $quantity, $cost, $measurement, $expirationDate, $goodPlaceholder);

          if (mysqli_stmt_execute($flavoringsStmt)) {
              // Data inserted successfully into "flavorings" table

              // Now, insert a log into the "activity_logs" table
              $activity = "Admin added $quantity pack of $materialName $measurement";
              $activityLogsSql = "INSERT INTO activity_logs (activity, date, time) VALUES (?,?,?)";
              $activityLogsStmt = mysqli_prepare($db, $activityLogsSql);

              if ($activityLogsStmt) {
                $dt = date("Y-m-d");
                $tm = date("H:i:s");
                  // Bind parameter and execute the statement for activity logs
                  mysqli_stmt_bind_param($activityLogsStmt, "sss", $activity, $dt, $tm);

                  if (mysqli_stmt_execute($activityLogsStmt)) {
                      // Activity log inserted successfully
                      echo "<script>window.location = 'flavors.php';</script>";
                      exit();
                  } else {
                      // Error occurred while inserting activity log
                      echo "Error: " . mysqli_stmt_error($activityLogsStmt);
                  }

                  // Close the activity logs statement
                  mysqli_stmt_close($activityLogsStmt);
              } else {
                  // Error in preparing the activity logs statement
                  echo "Error: " . mysqli_error($db);
              }
          } else {
              // Error occurred while inserting data into "flavorings" table
              echo "Error: " . mysqli_stmt_error($flavoringsStmt);
          }

          // Close the flavorings statement
          mysqli_stmt_close($flavoringsStmt);
      } else {
          // Error in preparing the flavorings statement
          echo "Error: " . mysqli_error($db);
      }
  }
}



function updateFlavor($db, $flavorNum, $flavorName, $quantity, $cost, $measurement, $expirationDate) {
    $expDt = str_replace("'", "", $expirationDate);
    
  $flavorName = mysqli_real_escape_string($db, $flavorName);

  // Retrieve the existing flavor name, quantity, measurement, and expiration date for logging
  $queryGetFlavorData = "SELECT flavor_name, quantity, cost, measurement, expiration_date FROM flavorings WHERE flavor_num = $flavorNum";
  $resultGetFlavorData = mysqli_query($db, $queryGetFlavorData);
  $rowGetFlavorData = mysqli_fetch_assoc($resultGetFlavorData);
  $existingFlavorName = $rowGetFlavorData['flavor_name'];
  $existingQuantity = $rowGetFlavorData['quantity'];
  $existingCost = $rowGetFlavorData['cost'];
  $existingMeasurement = $rowGetFlavorData['measurement'];
  $existingExpirationDate = $rowGetFlavorData['expiration_date'];
  $existingExpirationFormat = $existingExpirationDate ? date("M. d, Y", strtotime($existingExpirationDate)) : "N/A";
  $expirationDateFormat = $expirationDate !== "NULL" ? date("M. d, Y", strtotime($expDt)) : "N/A";

  $query = "UPDATE flavorings SET flavor_name = '$flavorName', quantity = '$quantity', cost = '$cost', measurement = '$measurement', expiration_date = $expirationDate WHERE flavor_num = $flavorNum";
  $result = mysqli_query($db, $query);

  if ($result) {
      // Log the update activity
      $activity = "";

      
      if ($existingQuantity !== $quantity) {
          // Admin updated the quantity
          $activity .= "Admin updated the quantity of $flavorName from $existingQuantity to $quantity";
      }

      if ($existingCost !== $cost) {
        // Admin updated the quantity
        $activity .= "Admin updated the cost of $flavorName from $existingCost to $cost";
    }

      if ($existingMeasurement !== $measurement) {
          // Admin updated the measurement
          if (!empty($activity)) {
              $activity .= " and ";
          }
          $activity .= "Admin updated the description of $flavorName from $existingMeasurement to $measurement";
      }

      $ex = $existingExpirationDate == "" ? "NULL" : $existingExpirationDate;
      if ($ex !== $expDt) {
          // Admin updated the expiration date
          if (!empty($activity)) {
              $activity .= " and ";
          }
          $activity .= "Admin updated the expiration date of $flavorName from $existingExpirationFormat to $expirationDateFormat";
      }

      if (!empty($activity)) {
          $activityLogsSql = "INSERT INTO activity_logs (activity, date, time) VALUES (?,?,?)";
          $activityLogsStmt = mysqli_prepare($db, $activityLogsSql);

          if ($activityLogsStmt) {
              $dt = date("Y-m-d");
              $tm = date("H:i:s");
              // Bind parameter and execute the statement for activity logs
              mysqli_stmt_bind_param($activityLogsStmt, "sss", $activity, $dt, $tm);

              if (mysqli_stmt_execute($activityLogsStmt)) {
                  // Activity log inserted successfully
                  mysqli_stmt_close($activityLogsStmt); // Close the statement here
              }
          }
      }

      return true; // Update successful
  } else {
      return false; // Update failed
  }
}


// ... Rest of your code remains the same


// Fetch flavor data
$productData = array();
$query = "SELECT * FROM flavorings";
$result = mysqli_query($db, $query);

if ($result) {
  while ($row = mysqli_fetch_assoc($result)) {
      $productData[] = $row;
  }
} else {
  die("Error fetching data: " . mysqli_error($db));
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if(isset($_POST["editFlavorSubmit"])){
        $flavorNum = $_POST["flavor_num"];
        $flavorName = $_POST["flavor_name"];
        $quantity = $_POST["quantity"];
        $cost = $_POST["cost"];
        $measurement = $_POST["measurement"];
        $expirationDate = !empty($_POST["expiration_date"]) ? "'".$_POST["expiration_date"]."'" : "NULL"; // Added this line
        
        if (updateFlavor($db, $flavorNum, $flavorName, $quantity, $cost, $measurement, $expirationDate)) {
            // Flavor updated successfully
            //header("Location: " . $_SERVER['PHP_SELF']);
        } else {
            // Handle update error
            $errorMessage = "Error updating flavor. Please try again.";
        }
    }
  
}

        

// Assuming you've already established a database connection

// Your SQL query to fetch orders with status = 1
$query = "SELECT * FROM flavorings";
$result = mysqli_query($db, $query);

// Update status based on quantity and update the database
while ($row = mysqli_fetch_assoc($result)) {
    if ($row['quantity'] == 0) {
        $newStatus = 'unavailable';
    } else {
        $newStatus = 'available';
    }

    // Update the 'status' column in the database for this row
    $updateQuery = "UPDATE flavorings SET status = '$newStatus' WHERE flavor_num = {$row['flavor_num']}";
    mysqli_query($db, $updateQuery);

    $updateQuery = "UPDATE flavor SET status = '$newStatus' WHERE flavor_num = {$row['flavor_num']}";
    mysqli_query($db, $updateQuery);
}


// Optional: Fetch data into an associative array for further processing
$productData = array();
$query = "SELECT * FROM flavorings"; // Refresh the original query
$result = mysqli_query($db, $query);
while ($row = mysqli_fetch_assoc($result)) {
    $productData[] = $row;
}




?>




         
               <button class="btn btn-primary" data-toggle="modal" data-target="#addMaterialModal"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
</svg>&nbsp;Flavors</button>

<!-- The Bootstrap modal for Activity Logs -->
<div class="modal fade" id="activityLogsModal" tabindex="-1" role="dialog" aria-labelledby="activityLogsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="activityLogsModalLabel">Activity Logs</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="padding-right: 0;">
                <div style="max-height: 400px; overflow-y: auto;">
                    <ul>
                        <?php
                        // Fetch data from the "activity_logs" table ordered by date and time in descending order
                        $query = "SELECT * FROM activity_logs ORDER BY date DESC, time DESC";
                        $result = mysqli_query($db, $query);
                        
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<li style='border-bottom: 1px solid #e5e9f2;'>";
                            echo "<p style='font-size: 11px;'>Log ID " . $row['log_id'] . "</p>";
                            echo "<p style='margin-left: 10px; font-size: 15px;'>" . $row['activity'] . "</p>";
                            
                            // Format date and time
                            $formattedDate = date("M. d, Y", strtotime($row['date']));
                            $formattedTime = date("h:i A", strtotime($row['time']));
                            
                            echo "<p style='text-align: right; font-size: 11px; margin-right: 13px;'> " . $formattedDate . " " . $formattedTime ."</p>";
                            echo "</li><br>";
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Button to trigger the Activity Logs modal -->
<button class="btn btn-secondary" data-toggle="modal" data-target="#activityLogsModal">Activity Logs</button>


              
 <!-- The Bootstrap modal -->
 <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Stock Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="tabingkanan">
                        <ul>
                            <li>
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#76a004" class="bi bi-square-fill" viewBox="0 0 16 16">
                                    <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2z"/>
                                </svg>&nbsp; High stocks - once stocks sets from 21 and above
                            </li>
                            <li>
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="orange" class="bi bi-square-fill" viewBox="0 0 16 16">
                                    <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2z"/>
                                </svg>&nbsp; Low Stock - once stock sets from 1 - 20
                            </li>
                            <li>
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="red" class="bi bi-exclamation-triangle-fill" viewBox="0 0 16 16">
                                    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                </svg>&nbsp; Out of stock - once stocks set to 0 
                                   
                                <br> <br> <p style="font-size: 12px;">Please note: Once the stock quantity downs to 0, the products that contains the following flavor will automatically sets to unavailable.</p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
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
                        <th scope="col"></th>
                            <th scope="col">#</th>
                           
                            <th scope="col">FLAVOR NAME</th>
                            <th scope="col">QUANTITY</th>
                            <th scope="col">COST</th>
                            <th scope="col">DESCRIPTION</th>
                            <th scope="col">EXPIRATION DATE</th>
                            <th scope="col">EXPIRATION STATUS</th>
                           
                            <th scope="col" style="text-align: right;"></th>
                           
                        </tr>
                    </thead>
                   <tbody>
                       <?php $rowCount = 1; foreach ($productData as $product): ?>
                           <tr>
                           <td style="padding-left: .5rem">
    <?php
    $squareFillColor = '#76a004'; // Default color
    $triangleFill = false; // Flag to determine whether to display the triangle fill

    if ($product['quantity'] >= 1 && $product['quantity'] <= 20) {
        $squareFillColor = 'orange'; // Change color to orange for quantities between 1 and 20
    } else if ($product['quantity'] == 0) {
        $triangleFill = true; // Set the flag to display the triangle fill
    }
    ?>

    <?php if (!$triangleFill) { ?>
        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="<?php echo $squareFillColor; ?>" class="bi bi-square-fill" viewBox="0 0 16 16">
            <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2z"/>
        </svg>
    <?php } ?>

    <?php if ($triangleFill) { ?>
        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="red" class="bi bi-exclamation-triangle-fill" viewBox="0 0 16 16">
            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
        </svg>
    <?php } ?>
</td>
                               <td><?php echo $rowCount; ?></td>
                               <td><?php echo $product['flavor_name']; ?></td>
                               <td><?php echo $product['quantity']; ?></td>
                               <td>₱ <?php echo number_format($product['cost'], 2); ?></td>
                               <td><?php echo $product['measurement']; ?></td>
                               <?php
// Assuming you have a database connection established in $db


// Get the current date as a MySQL-compatible timestamp
$currentDate = date('Y-m-d H:i:s');

// Define a threshold of 3 months in seconds
$threshold = 90 * 24 * 60 * 60; // 90 days in seconds

// Calculate the difference between the expiration date and the current date
$expirationTimestamp = strtotime($product['expiration_date']);
$timeDifference = $expirationTimestamp - strtotime($currentDate);

// Determine the expiration status and set the background color
if ($product['expiration_date']==null) {
    $expirationStatus = "N/A";
    $backgroundColor = "#4d5561";
}
elseif ($timeDifference <= 0) {
    $expirationStatus = "EXPIRED";
    $backgroundColor = "#fe5461";
} elseif ($timeDifference <= $threshold) {
    $expirationStatus = "NEARLY EXPIRED";
    $backgroundColor = "orange";
} else {
    $expirationStatus = "GOOD";
    $backgroundColor = "#76a004";
}

// Update the "expiration_status" column in your database
$sql = "UPDATE flavorings SET expiration_status = ? WHERE flavor_num = ?";
$stmt = $db->prepare($sql);
$stmt->execute([$expirationStatus, $product['flavor_num']]);

// Display the table data with a <span> element and background color
echo '<td>' . ($product["expiration_date"] ? date('M. j, Y', $expirationTimestamp) : "N/A") . '</td>';
echo '<td><span style="background-color: ' . $backgroundColor . '; border-radius: 5px; padding: 5px; text-transform: uppercase; color: white; font-size: 85%; font-weight: 500;">' . $expirationStatus . '</span></td>';
?>


                               
                              
                               
                               <td style="text-align: right;">
                        <div class="dropdown show d-inline-block widget-dropdown" style="margin-top: -10px;">
                            <a class="dropdown-toggle icon-burger-mini" href="#" role="button" id="dropdown-recent-order1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static"></a>
                            <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-recent-order1">
                                <li class="dropdown-item">
                                    <a href="#" data-toggle="modal" data-target="#editModal_<?php echo $product['flavor_num']; ?>"><i class="fas fa-edit fa-sm" aria-hidden="true" name="clear"></i>&emsp;Edit</a>
                                </li>
                                <li class="dropdown-item">
                <!-- Trigger the Bootstrap modal -->
                <a href="#" data-toggle="modal" data-target="#confirmDeleteModal_<?php echo $product['flavor_num']; ?>"><i class="fas fa-trash fa-sm" aria-hidden="true" name="clear"></i>&emsp;Remove</a>
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

               
<!-- Bootstrap Modal for Confirmation Dialog -->
<?php foreach ($productData as $product): ?>
    <div class="modal fade" id="confirmDeleteModal_<?php echo $product['flavor_num']; ?>" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel_<?php echo $product['flavor_num']; ?>" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmDeleteModalLabel_<?php echo $product['flavor_num']; ?>"><svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="orange" class="bi bi-exclamation-triangle-fill" viewBox="0 0 16 16">
  <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
</svg> &nbsp;Confirm Deletion</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p> Are you sure you want to delete this flavor?</p><br>
                    <p style="font-size: 13px;">
                    Warning: Clicking "Yes" will result to permanent deletion and this action cannot be undone.
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <form method="POST">
                        <input type="hidden" name="flavor_num" value="<?php echo $product['flavor_num']; ?>">
                        <input type="hidden" name="confirmDelete" value="yes">
                        <button type="submit" class="btn btn-danger">Yes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
    
 <!-- Add Material Modal -->
<div class="modal fade" id="addMaterialModal" tabindex="-1" role="dialog" aria-labelledby="addMaterialModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addMaterialModalLabel">Add Flavor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form to add material data -->
                <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <input type="hidden" name="action" value="add">
                    <div class="form-group">
                        <label for="addMaterialName">Flavor Name</label>
                        <input type="text" class="form-control" id="addMaterialName" name="flavor_name" required>
                    </div>
                    <div class="form-group">
                        <label for="addQuantity">Quantity</label>
                        <input type="number" class="form-control" id="addQuantity" name="quantity" required>
                    </div>
                    <div class="form-group">
                        <label for="addQuantity">Cost</label>
                        <input type="number" class="form-control" id="addCost" name="cost" required>
                    </div>
                    <div class="form-group">
                        <label for="addMeasurement">Description</label>
                        <input type="text" class="form-control" id="addMeasurement" name="measurement" required>
                    </div>
                    <div class="form-group">
                        <label for="addExpirationDate">Expiration Date</label>
                        <input type="date" class="form-control" id="addExpirationDate" name="expiration_date">
                    </div>

                    <div class="text-danger"><?php if (isset($addErrorMessage)) echo $addErrorMessage; ?></div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" style="float: right;" name="addMaterial">Add Flavor</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
               

               <!-- Edit Flavor Modals -->
    <?php foreach ($productData as $product): ?>
        <div class="modal fade" id="editModal_<?php echo $product['flavor_num']; ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Flavor Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Form to edit flavor data -->
                        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                            <input type="hidden" name="flavor_num" value="<?php echo $product['flavor_num']; ?>">
                            <div class="form-group">
                                <label for="editFlavorName">Flavor Name</label>
                                <input type="text" class="form-control" id="editFlavorName" name="flavor_name" value="<?php echo $product['flavor_name']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="editQuantity">Quantity</label>
                                <input type="number" class="form-control" id="editQuantity" name="quantity" value="<?php echo $product['quantity']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="editCost">Cost</label>
                                <input type="number" class="form-control" id="editCost" name="cost" value="<?php echo $product['cost']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="editMeasurement">Description</label>
                                <input type="text" class="form-control" id="editMeasurement" name="measurement" value="<?php echo $product['measurement']; ?>">
                            </div>
                            <div class="form-group">
    <label for="editExpirationDate">Expiration Date</label>
    <input type="date" class="form-control" id="editExpirationDate" name="expiration_date" value="<?php echo $product['expiration_date']; ?>">
</div>

                            <div class="text-danger"><?php if (isset($errorMessage)) echo $errorMessage; ?></div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" name="editFlavorSubmit">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
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

  
</script>

