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
  
    <title>User Accounts</title>
    
    <!-- GOOGLE FONTS -->
 
    <link href="https://cdn.materialdesignicons.com/4.4.95/css/materialdesignicons.min.css" rel="stylesheet" />
  
    <!-- PLUGINS CSS STYLE -->
    <link href="assets/plugins/nprogress/nprogress.css" rel="stylesheet" />
  
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="animations.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    
    
    
    
    
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
      
      #imahe{
        margin-top: -70px;
        margin-left: 65px;
      }
    
    
      .content{
      animation: transitionIn-Y-bottom 1s;
   }
    .eye-area {
        float: right;
        margin-top: -1.7rem;
        margin-right: 1rem;
    }
    .eye-box {
        display: flex;
        justify-content: center;
        align-items: center;
        position: relative;
    }
    i #eye, #eye-slash {
        position: absolute;
        color: #888;
        cursor: pointer;
    }
    #eye {
        color: #888;
        opacity: 1;
    }
    #eye-slash {
        opacity: 0;
    }

    i #eye2, #eye-slash2 {
        position: absolute;
        color: #888;
        cursor: pointer;
    }
    #eye2 {
        color: #888;
        opacity: 1;
    }
    #eye-slash2 {
        opacity: 0;
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
        $page = "config";
        $subpage = "all_user";
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

<?php
// Check if the "Add User" button is clicked
// Check if the "Add User" button is clicked
if (isset($_POST['addUser'])) {
    // Retrieve user input
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $age = $_POST['age'];
    $address = $_POST['address'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if the email already exists in the database
    $checkEmailQuery = "SELECT COUNT(*) as count FROM user_account WHERE email = '$email'";
    $result = mysqli_query($db, $checkEmailQuery);
    $row = mysqli_fetch_assoc($result);

    if ($row['count'] > 0) {
        // Email already exists, display an error message
        echo '<p id="error-message" style="color: red; font-size: 13px;">Email address already exists. Please use a different email.</p>';
        
        // Add JavaScript to hide the error message after 2 seconds
        echo '<script>
            setTimeout(function() {
                var errorMessage = document.getElementById("error-message");
                errorMessage.style.display = "none";
            }, 3000);
        </script>';
        
        // Redirect to the same page after 2 seconds
        // Replace "your_page.php" with your actual page URL
    } else {
        // Email is unique, proceed with user registration

        // Perform validation and insertion into the 'user_account' table
        if (!empty($name) && !empty($email) && !empty($password)) {
            // Hash the password (you should use a proper password hashing method)
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

            // Set the default status to "verified"
            $status = "verified";
            $avatar = "images/profile.png";

            // Insert the new user into the 'user_account' table with default status
            $insertQuery = "INSERT INTO user_account (avatar, fname, lname, name, age, address, email, password, code, status) VALUES ('$avatar', '$fname', '$lname', '$name', '$age', '$address', '$email', '$hashedPassword', '0', '$status')";

            if (mysqli_query($db, $insertQuery)) {
                // User insertion was successful
                echo '<p id="success-message">User added successfully!</p>';
                
                // Add JavaScript to hide the success message after 2 seconds
                echo '<script>
                    setTimeout(function() {
                        var successMessage = document.getElementById("success-message");
                        successMessage.style.display = "none";
                    }, 2000);
                </script>';
            } else {
                // User insertion failed
                echo 'Failed to add user. Please try again.';
            }
        } else {
            // Handle validation errors here
            echo 'Please fill out all fields.';
        }
    }
}

// Function to delete the product and associated price
function deleteProductAndPrice($db, $id) {
  // Delete the product from the 'product' table
  $deleteProductQuery = "DELETE FROM user_account WHERE id = $id";



  // Perform the deletion operations
  if (mysqli_query($db, $deleteProductQuery)) {
      return true;
  } else {
      return false;
  }
}

// Check if the "productId" parameter is present in the request
if (isset($_POST['id'])) {
  $id = $_POST['id'];

  // Check if the "confirmDelete" parameter is set to "yes"
  if (isset($_POST['confirmDelete']) && $_POST['confirmDelete'] === 'yes') {
      // Attempt to delete the product and associated price
      if (deleteProductAndPrice($db, $id)) {
          // Deletion was successful
          //echo 'user deleted successfully!';
      } else {
          // Deletion failed
          echo 'Failed to delete user. Please try again.';
      }
  }
}





$query = "SELECT * FROM user_account";
$result = mysqli_query($db, $query);

// Fetch data into an associative array
$productData = array();
while ($row = mysqli_fetch_assoc($result)) {
    $productData[] = $row;
}
?>

<div class="col-12">
    <div class="card card-default">
    <div class="card-header card-header-border-bottom d-flex justify-content-between">
    <h2>All Users</h2>
  <!-- Add User Button -->
<button class="btn btn-primary" id="addUserButton" data-toggle="modal" data-target="#addUserModal">
<svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="currentColor" class="bi bi-person-fill-add" viewBox="0 0 16 16">
  <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0Zm-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
  <path d="M2 13c0 1 1 1 1 1h5.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.544-3.393C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Z"/>
</svg>&nbsp; Add User
</button>

</div>

        <style>
            #orderTable th{
                font-weight: 600;
              }
              #orderTable th, td {
                vertical-align: top;
                padding: 12px;
              }
           </style>

        <div class="card-body">
            <div class="expendable-data-table">
                <table class="table" id="orderTable">
                    <!-- ... (table headers) -->
                    <thead style="background-color: #e4eccd;">
                        <tr>
                           
                            <th>#</th>
                            <th>PROFILE</th>
                            <th>FIRSTNAME</th>
                            <th>LASTNAME</th>
                            <th>AGE</th>
                            <th>ADDRESS</th>
                            <th>USERNAME</th>
                            <th>EMAIL</th>
                            <th>STATUS</th>
                           
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php foreach ($productData as $product): ?>
                           

                            <tr>
                               
                                <td><?php echo $product['id']; ?></td>
                                <td style="padding: 4px 8px; vertical-align: top;"><img src="<?php echo $product['avatar']; ?>" alt="" style="height: 2.5rem; width: 2.5rem; border-radius: 50%;"></td>
                                <td style="width: 10%"><?php echo $product['fname']; ?></td>
                                <td style="width: 10%"><?php echo $product['lname']; ?></td>
                                <td><?php echo $product['age']; ?></td>
                                <td style="text-transform: capitalize; width: 100%"><?php echo $product['address']; ?></td>
                                <td><?php echo $product['name']; ?></td>
                                <td><?php echo $product['email']; ?></td>
                                <td style="text-transform: capitalize"><?php echo $product['status']; ?></td>

                             
                                <td class="text-right">
                                    <div class="dropdown show d-inline-block widget-dropdown" style="margin-top: -20px;">
                                        <a class="dropdown-toggle icon-burger-mini" href="#" role="button" id="dropdown-recent-order1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static"></a>
                                        <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-recent-order1">
                                          
            <li class="dropdown-item">
                            <!-- Trigger the Bootstrap modal -->
                            <a href="#" data-toggle="modal" data-target="#confirmDeleteModal_<?php echo $product['id']; ?>"><i class="fas fa-trash fa-sm" aria-hidden="true" name="clear"></i>&emsp;Remove</a>
                        </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>


 <!-- Bootstrap Modal for Confirmation Dialog -->
 <div class="modal fade" id="confirmDeleteModal_<?php echo $product['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmDeleteModalLabel">Confirm Deletion</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this user?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <form method="POST">
                        <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
                        <input type="hidden" name="confirmDelete" value="yes">
                        <button type="submit" class="btn btn-danger">Yes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Add User Modal -->
<div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="addUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addUserModalLabel">Add User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- User input form -->
                <form method="POST">
                    <div class="flex" style="display: flex;">
                    <div class="form-group" style="margin-right: 1rem">
                        <label for="age">Firstname</label>
                        <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter Firstname" required>
                    </div>
                     <div class="form-group">
                        <label for="address">Lastname</label>
                        <input type="text" class="form-control" id="lname" name="lname" placeholder="Enter Lastname" required>
                    </div>
                    </div>
                    <div class="flex" style="display: flex;">
                    <div class="form-group" style="width: 35%; margin-right: 1rem">
                        <label for="age">Age</label>
                        <input type="number" class="form-control" id="age" name="age" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                            maxlength="2" placeholder="Enter Age" required>
                    </div>
                     <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address" required>
                    </div>
                    </div>
                    <div class="form-group">
                        <label for="name">Username</label>
                        <input type="text" class="form-control" id="user-name" name="name" placeholder="Enter Username" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="user-email" name="email" placeholder="Enter Email" required autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" required autocomplete="off">
                        <div class="eye-area">
                          <div class="eye-box" onclick="showPassword()">
                            <i class="far fa-eye-slash" id="eye"></i>
                            <i class="far fa-eye" id="eye-slash"></i>
                          </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" name="addUser" style="float: right">Add User</button>
                </form>
            </div>
        </div>
    </div>
</div>
















                           
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#orderTable').DataTable();
        });
    </script>


	
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
 
    
    

    
    

    
  <script>


  function showPassword(){
   var a = document.getElementById('password');
   var b = document.getElementById('eye');
   var c = document.getElementById('eye-slash');

   if(a.type === "password"){
      a.type = "text"
      b.style.opacity = "0";
      c.style.opacity = "1";

   }else {
      a.type = "password"
      b.style.opacity = "1";
      c.style.opacity = "0";
   }

}
</script>
    

    
    
    

    

    
    
    
    

    

    

    
    
    

    <script src='assets/plugins/data-tables/jquery.datatables.min.js'></script>
    <script src='assets/plugins/data-tables/datatables.bootstrap4.min.js'></script>

    

    <script src="assets/js/sleek.js"></script>
</body>
</html>


<script>
   /* Formatting function for row details - modify as you need */
   $(document).ready(function() {
    var table = $('orderTable').DataTable( {
      "className":'details-control',
      "order": [[0, 'asc']],
      "aLengthMenu": [[20, 30, 50, 75, -1], [20, 30, 50, 75, "All"]],
      "pageLength": 20,
      "dom": '<"row align-items-center justify-content-between top-information"lf>rt<"row align-items-center justify-content-between bottom-information"ip><"clear">'
    });

    // Add event listener for opening and closing details
    $('#orderTable tbody').on('click', 'td.details-control', function () {
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
