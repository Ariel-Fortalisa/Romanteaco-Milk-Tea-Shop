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
  
    <title>Orders Completed</title>
    
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
        margin-top: 20px;
        width: 200px;
       
        
      }
      .th{
      
        color: #495057;
      
        
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
        $page = "orders";
        $subpage = "all_orders";
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
            <h2>All orders</h2>
            <button id="showModalBtn" data-toggle="modal" data-target="#myModal"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="#76a004" class="bi bi-info-circle" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
            </svg></button>
            
        </div>

        <div class="card-body">
          
              

                   

            <ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
  <a href="orders_pending.php"><button class="nav-link" type="button" role="tab" aria-controls="profile" aria-selected="false">Pending</button></a>
  </li>
  <li class="nav-item" role="presentation">
  <a href="orders_advance.php"><button class="nav-link" type="button" role="tab" aria-controls="profile" aria-selected="false">Advance Order</button></a>
  </li>
  <li class="nav-item" role="presentation">
  <a href="orders_inprogress.php"><button class="nav-link" type="button" role="tab" aria-controls="profile" aria-selected="false">In-progress</button></a>
  </li>
  <li class="nav-item" role="presentation">
    <a href="orders_prepared.php"><button class="nav-link" type="button" role="tab" aria-controls="profile" aria-selected="false">Prepared</button></a>
  </li>
  <li class="nav-item" role="presentation">
  <button class="nav-link active" id="home-tab" data-toggle="tab" data-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Completed</button>
  </li>
</ul>

<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
    <div class="card-body" style="padding: 0;">
 
    
  
   
    
           


 <?php
          
         
          

       
// Assuming you've already established a database connection
// Define the image directory variable
 // Replace with your actual image directory

// Your SQL query to fetch orders with status = 1
$query = "SELECT * FROM order_list WHERE status = 4 ORDER BY date DESC, time DESC";
$result = mysqli_query($db, $query);

// Fetch data into an associative array
$productData = array();
while ($row = mysqli_fetch_assoc($result)) {
   $productData[] = $row;
}
?>


     
      
      
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
          
           <style>
            #orderTable th{
                font-weight: 600;
              }
              #orderTable th, td {
                vertical-align: top;
                padding: 12px;
              }
           </style>
           <br>
         <div class="expendable-data-table">
                <table class="table" id="orderTable">
               <thead class="th" style="background-color: #e4eccd">
                        <tr class="tt">
                            <th scope="col"></th>
                            <th scope="col">#</th>
                            <th scope="col">USERNAME</th>
                            <th scope="col">DINING OPT.</th>
                            <th scope="col">TOTAL</th>
                            <th scope="col">METHOD</th>
                            <!--<th scope="col">ESTIMATED TIME</th>-->
                           
                            <th scope="col">DATE</th>
                            <th scope="col">TIME</th>
                           
                            <th scope="col">ACTION</th>
                        </tr>
                    </thead>
                   <tbody>
                       <?php foreach ($productData as $product): ?>
                           <tr style="<?=empty($product['estimated_arrival']) ? "" : "background-color: #e0f2ff"?>">
                           <td style="vertical-align: baseline;"><svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="#76a004" class="bi bi-circle-fill" viewBox="0 0 16 16">
                                <circle cx="8" cy="8" r="8"/>
                              </svg></td>
                               <td style="vertical-align: baseline;"><?php echo $product['order_id']; ?></td>
                               <td style="vertical-align: baseline;"><?php echo $product['user_name']; ?></td>
                               <td style="text-transform: capitalize;vertical-align: baseline;s"><?php echo $product['dining_option']; ?></td>
                               <td style="vertical-align: baseline;">₱<?php echo number_format($product['total'], 2); ?></td>
                               <td style="vertical-align: baseline; color: #76a004; font-weight: 600">
            <?php if ($product['payment_method'] === 'GCash'): ?>
                <img src="assets/img/gcashlogo.png" alt="GCash Image" width="50" height="13">
            <?php else: ?>
                <?php echo $product['payment_method']; ?>
            <?php endif; ?>
        </td>
                              <!--<td style="vertical-align: baseline;"><?php echo empty($product['estimated_arrival']) ? "N/A" : date('h:i A', strtotime($product['estimated_arrival'])); ?></td>-->
                               <td style="vertical-align: baseline;"><?php echo date('M. j, Y', strtotime($product['date'])); ?></td>
                               <td style="vertical-align: baseline;"><?php echo date('h:i A', strtotime($product['time'])); ?></td>
                              
                               <td style="vertical-align: baseline;">
                                   <button style="margin-top: -5px; margin-bottom: -5px;" class="btn btn-primary view-btn" data-toggle="modal" data-target="#orderModal_<?php echo $product['order_id']; ?>">View</button>
                                  
                               </td>
                           </tr>
                       <?php endforeach; ?>
                   </tbody>
               </table>
           </div>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#orderTable').DataTable();
        });
    </script>

<!-- The Bootstrap modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Legend</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="legend" id="div_legend">
                    <div class="flex" style="display: flex; gap:.5rem;justify-content: space-between;">
                        <div class="inputBox" style="position: relative; width: 50%">
                        <h6 style="padding-bottom: .4rem">Order Status:</h6>
                        <ul id="legend">
                            <li>
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="19" fill="royalblue" class="bi bi-circle-fill" viewBox="0 0 16 16">
                                <circle cx="8" cy="8" r="8"/>
                            </svg>&nbsp; Pending Orders
                            </li>
                            <li>
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="19" fill="#fec400" class="bi bi-circle-fill" viewBox="0 0 16 16">
                                    <circle cx="8" cy="8" r="8"/>
                                </svg>&nbsp; In-progress Orders
                            </li>
                            <li>
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="19" fill="#f58216" class="bi bi-circle-fill" viewBox="0 0 16 16">
                                <circle cx="8" cy="8" r="8"/>
                            </svg>&nbsp; Prepared Orders
                            </li>
                        </ul>
                        <br>
                        <h6 style="padding-bottom: .4rem">Type of Order:</h6>
                          <ul>
                            <li>
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#eee" class="bi bi-square-fill" viewBox="0 0 16 16">
                                    <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2z"/>
                                </svg>&nbsp; Normal Order
                            </li>
                        </ul>
                        <br>
                        <h6 style="padding-bottom: .4rem">Estimated Time Status:</h6>
                        <ul>
                          <li>
                            <i class="fa-regular fa-clock fa-lg" style="color: #76a004"></i> Plenty of time
                          </li>
                        </ul>
                        <ul>
                            <li>
                              <i class="fa-regular fa-clock fa-lg" style="color: #fe5461"></i> Overdue
                            </li>
                          </ul>
                        </div>
                        <div class="inputBox" style="position: relative; width: 50%">
                        <h6 style="color: #fff; padding-bottom: .4rem">Nothing</h6>
                        <ul id="legend">    
                            <li>
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="19" fill="#76a004" class="bi bi-circle-fill" viewBox="0 0 16 16">
                                    <circle cx="8" cy="8" r="8"/>
                                </svg>&nbsp; Completed Orders
                            </li>
                            <li>
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="19" fill="#fe5461" class="bi bi-circle-fill" viewBox="0 0 16 16">
                                    <circle cx="8" cy="8" r="8"/>
                                </svg>&nbsp; Cancelled Orders
                            </li>
                            <li>
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="19" fill="gray" class="bi bi-circle-fill" viewBox="0 0 16 16">
                                    <circle cx="8" cy="8" r="8"/>
                                </svg>&nbsp; Unclaimed Orders
                            </li>
                        </ul>
                        <br>
                        <br>
                        <ul>
                            <li>
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#e0f2ff" class="bi bi-square-fill" viewBox="0 0 16 16">
                                    <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2z"/>
                                </svg>&nbsp; Advance Order
                            </li>
                        </ul>
                        <br>
                        <h6 style="padding-bottom: .4rem; color: #fff">Estimated Time Status:</h6>
                          <ul>
                            <li>
                              <i class="fa-regular fa-clock fa-lg" style="color: #fec400"></i> 10 minutes left 
                            </li>
                          </ul>
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


<!-- Add this code at the end of the loop, after generating the table -->
<?php foreach ($productData as $product): ?>
    <!-- Modal for each order -->
    <div class="modal fade" id="orderModal_<?php echo $product['order_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="orderModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="orderModalLabel">Order ID: <?php echo $product['order_id']; ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>PRODUCT NAME</th>
                                <th>QTY.</th>
                                <th>SUBTOTAL</th>
                            </tr>
                        </thead>
                        <tbody class="tuko">
                            <?php
                            // Initialize total amount
                            $totalAmount = 0;

                            // Fetch order items from the database for the current order_id
                            $order_id = $product['order_id'];
                            $query = "SELECT order_name, quantity, subtotal FROM order_item WHERE order_id = $order_id";
                            $result = mysqli_query($db, $query);

                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td id='tukos'>" . $row['order_name'] . "</td>";
                                echo "<td id='tuko'>" . $row['quantity'] . "</td>";
                                echo "<td id='tuko'>₱" . number_format($row['subtotal'], 2) . "</td>";
                                echo "</tr>";

                                // Update total amount
                                $totalAmount += $row['subtotal'];
                            }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th id='tuko'></th>
                                <th id='tuko'>Total:</th>
                                <th id='tuko'>₱<?php echo number_format($totalAmount, 2); ?></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="modal-footer">
                    <?php
                    // Check if payment method is GCash, and display the button accordingly
                    if ($product['payment_method'] === 'GCash') {
                        echo '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#imageModal_'.$product['order_id'].'">Gcash payment</button>';
                    }
                    ?>
                    <a class="btn btn-primary" href="receipt.php?id=<?=$product['order_id']?>">Print</a>

                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Image Modal -->
    <div class="modal fade" id="imageModal_<?php echo $product['order_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content" style="background: transparent; border: none;">
                
                <div class="modal-body">
                    <!-- Display the image from the "screenshots" folder -->
                    <img src="<?php echo $product['screenshot']; ?>" alt="Product Image" style="height: 800px; width: 100%; object-fit: contain;">
                </div>
            </div>
        </div>
    </div>
    <script>


   function returnToPage() {
            // Redirect to the desired page
            window.location.href = "orders_inprogress.php"; // Replace with the actual page URL
        }
   </script>
<?php endforeach; ?>


     






   <!-- JavaScript for Search Functionality -->
  

      

        </div>
    </div>
 
 
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

