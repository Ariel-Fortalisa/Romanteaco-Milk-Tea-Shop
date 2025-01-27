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
  
    <title>System Settings</title>
    
    <!-- GOOGLE FONTS -->
    <link href="https://cdn.materialdesignicons.com/4.4.95/css/materialdesignicons.min.css" rel="stylesheet" />
  
    <!-- PLUGINS CSS STYLE -->
    <link href="assets/plugins/nprogress/nprogress.css" rel="stylesheet" />
  
    <!-- No Extra plugin used -->
    
    <link href='assets/plugins/daterangepicker/daterangepicker.css' rel='stylesheet'>
    <link rel="stylesheet" href="animations.css">
    
    
    
    
    
    
    
    

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
   




        <!-- ====================================
          ——— LEFT SIDEBAR WITH OUT FOOTER
        ===================================== -->
        <?php
        $page = "config";
        $subpage = "settings";
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





<div class="bg-white border rounded">
  <div class="row no-gutters">
    <div class="col-lg-4 col-xl-3">
      <div class="profile-content-left profile-left-spacing pt-5 pb-3 px-3 px-xl-5">
        <div class="card text-center widget-profile px-0 border-0">
        <div class="card-img mx-auto rounded-circle">
    <?php
    $query = "SELECT * FROM system_settings";
    $result = mysqli_query($db, $query);

    // Check if the query was successful
    if ($result) {
        // Fetch data into an associative array
        $productData = mysqli_fetch_assoc($result);

        // Check if there is a valid image URL in the database
        if (!empty($productData['logo'])) {
            $imageURL = $productData['logo'];
            echo '<img src="' . $imageURL . '" alt="Product Image" style="height: 95px; width: 95px;">';
        } else {
            echo 'No image found.';
        }

        // Remember to free the result set
        mysqli_free_result($result);
    } else {
        echo 'Database query failed.';
    }
    ?>
</div>

<?php
// Assuming you have already established a database connection ($db) here.

$query = "SELECT store_name, email, opening_hours, address, contact_number FROM system_settings";
$result = mysqli_query($db, $query);

// Fetch data into an associative array
$userData = array();
while ($row = mysqli_fetch_assoc($result)) {
    $userData[] = $row;
}
?>

<!-- Display user data -->
<div class="card-body" style="padding-left: 0; padding-right: 0;">
    <?php foreach ($userData as $user) { ?>
        <h3 class="py-2 text-dark"><?php echo $user['store_name'] ?></h3>
        <p style="padding: 0px 25px"><?php echo $user['email']; ?></p>
        
  
</div>

        </div>

        

        <hr class="w-100">

         <div class="contact-info pt-4">
          <h5 class="text-dark mb-1">Contact Information</h5>
         
          <p class="text-dark font-weight-medium pt-4 mb-2">Phone Number</p>
          <p><?php echo $user['contact_number']; ?></p>
          <p class="text-dark font-weight-medium pt-4 mb-2">Address</p>
          <p><?php echo $user['address']; ?></p>
          <p class="text-dark font-weight-medium pt-4 mb-2">Opening Hrs.</p>
          <p><?php echo $user['opening_hours']; ?></p>
          <p class="text-dark font-weight-medium pt-4 mb-2" style="text-align: center;">QR Code</p>
          
          <div class="qr" style="text-align: center;">
        <?php
    $query = "SELECT * FROM system_settings";
    $result = mysqli_query($db, $query);

    // Check if the query was successful
    if ($result) {
        // Fetch data into an associative array
        $productData = mysqli_fetch_assoc($result);

        // Check if there is a valid image URL in the database
        if (!empty($productData['gcash_qr'])) {
            $imageURL = $productData['gcash_qr'];
            echo '<img src="' . $imageURL . '" alt="Product Image" style="height: 95px; width: 95px;">';
        } else {
            echo 'No image found.';
        }

        // Remember to free the result set
        mysqli_free_result($result);
    } else {
        echo 'Database query failed.';
    }
    ?>
        </div>
          
          <?php } ?>
         
          
        </div>
        
      </div>
    </div>

    <div class="col-lg-8 col-xl-9">
      <div class="profile-content-right profile-right-spacing py-5">
        <ul class="nav nav-tabs px-3 px-xl-5 nav-style-border" id="myTab" role="tablist">
        


          <li class="nav-item">
            <a class="nav-link active" id="settings-tab" data-toggle="tab" href="#settings" role="tab" aria-controls="settings" aria-selected="false"><h4 style="color: #76a004;">System Settings</h4></a>
          </li>
        </ul>

        <div class="tab-content px-3 px-xl-5" id="myTabContent">
       

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["updateProfile"])) {
    // Retrieve user input
    $id = $_POST["id"];
    $store_name = $_POST["store_name"];
    $address = $_POST["address"];
    $contact_number = $_POST["contact_number"];
    $email = $_POST["email"];
    $opening_hours = $_POST["opening_hours"];
    $gcash_number = $_POST["gcash_number"];

    // Hash the password
    $encpass = password_hash($password, PASSWORD_BCRYPT);

    // Initialize variables for image and GCash QR code paths
    $image_path = "";
    $gcash_qr_path = "";

    // Check if an image is uploaded
    if (!empty($_FILES['image']['name'])) {
        $image_name = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];

        // Specify the folder name where the image will be saved
        $folder_name = "images";

        // Create the complete image path with the folder name
        $image_path = $folder_name . '/' . $image_name;

        // Move the uploaded file to the specified folder
        move_uploaded_file($image_tmp, $image_path);
    }

    // Check if a GCash QR code is uploaded
    if (!empty($_FILES['gcash_qr']['name'])) {
        $gcash_qr_name = $_FILES['gcash_qr']['name'];
        $gcash_qr_tmp = $_FILES['gcash_qr']['tmp_name'];

        // Specify the folder name where the GCash QR code will be saved
        $gcash_qr_folder_name = "images"; // Adjust the folder name as needed

        // Create the complete GCash QR code path with the folder name
        $gcash_qr_path = $gcash_qr_folder_name . '/' . $gcash_qr_name;

        // Move the uploaded GCash QR code file to the specified folder
        move_uploaded_file($gcash_qr_tmp, $gcash_qr_path);
    }

    // Build the SQL query based on whether an image or GCash QR code is uploaded
    if (!empty($image_path) && !empty($gcash_qr_path)) {
        // Update all fields, including the image and hashed password
        $updateQuery = "UPDATE system_settings SET store_name=?, gcash_number=?, address=?, contact_number=?, email=?, opening_hours=?, logo=?, gcash_qr=? WHERE id=?";
        $stmt = mysqli_prepare($db, $updateQuery);

        // Bind parameters and execute the statement
        mysqli_stmt_bind_param($stmt, "ssssssssi", $store_name, $gcash_number, $address, $contact_number, $email, $opening_hours, $image_path, $gcash_qr_path, $id);
    } elseif (!empty($image_path)) {
        // Update all fields with the image, excluding GCash QR code and hashed password
        $updateQuery = "UPDATE system_settings SET store_name=?, gcash_number=?, address=?, contact_number=?, email=?, opening_hours=?, logo=? WHERE id=?";
        $stmt = mysqli_prepare($db, $updateQuery);

        // Bind parameters and execute the statement
        mysqli_stmt_bind_param($stmt, "sssssssi", $store_name, $gcash_number, $address, $contact_number, $email, $opening_hours, $image_path, $id);
    } elseif (!empty($gcash_qr_path)) {
        // Update all fields with the GCash QR code, excluding image and hashed password
        $updateQuery = "UPDATE system_settings SET store_name=?, gcash_number=?, address=?, contact_number=?, email=?, opening_hours=?, gcash_qr=? WHERE id=?";
        $stmt = mysqli_prepare($db, $updateQuery);

        // Bind parameters and execute the statement
        mysqli_stmt_bind_param($stmt, "sssssssi", $store_name, $gcash_number, $address, $contact_number, $email, $opening_hours, $gcash_qr_path, $id);
    } else {
        // Update only fname, lname, email, phone, and hashed password when no image or GCash QR code is uploaded
        $updateQuery = "UPDATE system_settings SET store_name=?, gcash_number=?, address=?, contact_number=?, email=?, opening_hours=? WHERE id=?";
        $stmt = mysqli_prepare($db, $updateQuery);

        // Bind parameters and execute the statement
        mysqli_stmt_bind_param($stmt, "ssssssi", $store_name, $gcash_number, $address, $contact_number, $email, $opening_hours, $id);
    }

    if (mysqli_stmt_execute($stmt)) {
        // Profile update successful
        // You can add a success message here
       

        // Redirect to another page using JavaScript immediately
        echo '<script>window.location.href = "system_settings.php";</script>';
        exit; // Make sure to exit to prevent further execution of the script
    }

    // Close the database connection
}



// Fetch data from the "admin_user" table
$query = "SELECT id, store_name, email, contact_number, opening_hours, gcash_number, address FROM system_settings WHERE id=?";
$stmt = mysqli_prepare($db, $query);

// Replace $id with the actual ID you want to fetch
$id = 1; // Replace with the actual user's ID

mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if ($row = mysqli_fetch_assoc($result)) {
    $id = $row['id'];
    $store_name = $row['store_name'];
    $address = $row['address'];
    $email = $row['email'];
    $contact_number = $row['contact_number'];
    $opening_hours = $row['opening_hours'];
    $gcash_number = $row['gcash_number'];
   
}

// Close the prepared statement
mysqli_stmt_close($stmt);
?>

<div class="tab-pane fade show active" id="settings" role="tabpanel" aria-labelledby="settings-tab">
    <div class="tab-pane-content mt-5" style="z-index: 10;">
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
            <!-- User Image input -->
            <div class="form-group row mb-6">
                <label for="coverImage" class="col-sm-4 col-lg-2 col-form-label">Store Logo</label>
                <div class="col-sm-8 col-lg-10">
                    <div class="custom-file mb-1">
                        <label for="choosefile" class="custom-file-label" id="file-label">Choose File</label>
                        <input id="choosefile" type="file" accept="image/*" name="image" style="display: none;"
                            onchange="updateFileName(this)">
                    </div>
                </div>
            </div>

            <!-- First Name input -->
            <div class="form-group mb-4">
                <label for="store_name">Store Name</label>
                <input type="text" class="form-control" id="store_name" name="store_name" placeholder="Update Store Name" value="<?php echo $store_name; ?>">
            </div>

            

             <div class="form-group mb-4">
                <label for="gcash_number">gcash number</label><span class="text-left" style="font-size:.9rem;position:absolute;margin-left: 1rem"><i class="text-muted">*e.g. 09XXXXXXXXX</i></span>
                <input type="number" class="form-control" 
                oninput="javascript: if (this.value.length > 
                this.maxLength) this.value = this.value.slice(0, this.maxLength);" 
                maxlength="11" id="gcash_number" name="gcash_number" placeholder="Update Gcash Number"
                value="<?php echo $gcash_number; ?>">
            </div>

            

            <div class="form-group row mb-6">
    <label for="gcash_qr" class="col-sm-4 col-lg-2 col-form-label">GCash QR</label>
    <div class="col-sm-8 col-lg-10">
        <div class="custom-file mb-1">
            <label for="chooseGcashQR" class="custom-file-label" id="gcash-qr-label">Update GCash QR</label>
            <input id="chooseGcashQR" type="file" accept="image/*" name="gcash_qr" style="display: none;" onchange="updateFileName(this, 'gcash-qr-label')">
        </div>
    </div>
</div>

            <!-- Email input -->
            <div class="form-group mb-4">
                <label for="address">Address</label>
                <input type="text" class="form-control" id="address" name="address" placeholder="Update Address" value="<?php echo $address; ?>">
            </div>

            <div class="form-group mb-4">
                <label for="contact_number">Phone</label><span class="text-left" style="font-size:.9rem;position:absolute;margin-left: 1rem"><i class="text-muted">*e.g. 09XXXXXXXXX</i></span>
                <input type="number" class="form-control" 
                oninput="javascript: if (this.value.length > 
                this.maxLength) this.value = this.value.slice(0, this.maxLength);" 
                maxlength="11" id="contact_number" name="contact_number" placeholder="Update Phone Number"
                value="<?php echo $contact_number; ?>">
            </div>

            <!-- Email input -->
            <div class="form-group mb-4">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Update Email" value="<?php echo $email; ?>">
            </div>

            <div class="form-group mb-4">
                <label for="opening_hours">Opening Hours</label>
                <input type="text" class="form-control" id="opening_hours" name="opening_hours" placeholder="Update Opening Hours" value="<?php echo $opening_hours; ?>">
            </div>


            <!-- Password input -->
           


            <!-- Hidden ID input -->
            <input type="hidden" name="id" value="<?php echo $id; ?>">

            <div class="d-flex justify-content-end mt-5">
                <button type="submit" class="btn mb-2 btn-pill" name="updateProfile" style="background-color: #76a004; color: #fff; border-radius: .3rem">Update Settings</button>
            </div>
        </form>
    </div>
</div>

<script>
function updateFileName(input) {
    const fileLabel = document.getElementById("file-label");
    if (input.files.length > 0) {
        fileLabel.textContent = input.files[0].name;
    } else {
        fileLabel.textContent = "Choose File";
    }
}
</script>



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
 
    
    

    
    

    
    
    

    <script src='assets/plugins/daterangepicker/moment.min.js'></script>
    <script src='assets/plugins/daterangepicker/daterangepicker.js'></script>
    <script src='assets/js/date-range.js'></script>

    

    
    
    
    

    

    

    
    
    

    
    

    

    <script src="assets/js/sleek.js"></script>
</body>
</html>

