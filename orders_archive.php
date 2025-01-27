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
  
    <title>Orders Archive</title>
    
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
        $page = "archives";
        $subpage = "archive orders";
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
            <h2>Cancelled orders</h2>

           
        </div>

        <div class="card-body">
          
            

        <?php
            
            if (isset($_POST['accept_order']) && isset($_POST['order_id'])) {
              $order_id = $_POST['order_id'];
          
              // Update the order status to 2 in the database
              $query = "UPDATE order_list SET status = 1, date = '".date("Y-m-d")."', time = '".date("H:i:s")."' WHERE order_id = $order_id";
              
              if (mysqli_query($db, $query)) {
                  // Status updated successfully
                  // You can handle any other actions or display a success message here
              } else {
                  // Handle the error, if any
                  echo "Error updating status: " . mysqli_error($db);
              }
          }

          
// Assuming you've already established a database connection
// Define the image directory variable
 // Replace with your actual image directory

// Your SQL query to fetch orders with status = 1
$query = "SELECT * FROM order_list WHERE status = 5 ORDER BY date ASC, time ASC";
$result = mysqli_query($db, $query);

// Fetch data into an associative array
$productData = array();
while ($row = mysqli_fetch_assoc($result)) {
    $productData[] = $row;
}
?>


      
       
       
            <script>
    document.addEventListener("DOMContentLoaded", function() {
        const searchInput = document.getElementById("searchInput");
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

                            <th scope="col">DATE</th>
                            <th scope="col">TIME</th>
                           
                            <th scope="col">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($productData as $product): ?>
                            <tr>
                                <td style="vertical-align: baseline;"><svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="#fe5461" class="bi bi-circle-fill" viewBox="0 0 16 16">
  <circle cx="8" cy="8" r="8"/>
</svg></td>
                                <td style="vertical-align: baseline;"><?php echo $product['order_id']; ?></td>
                                <td style="vertical-align: baseline;"><?php echo $product['user_name']; ?></td>
                                <td style="text-transform: capitalize; vertical-align: baseline;"><?php echo $product['dining_option']; ?></td>
                                <td style="vertical-align: baseline;">₱<?php echo number_format($product['total'], 2); ?></td>
                                <td style="vertical-align: baseline;">
            <?php if ($product['payment_method'] === 'GCash'): ?>
                <img src="assets/img/gcashlogo.png" alt="GCash Image" width="50" height="13">
            <?php else: ?>
                <?php echo $product['payment_method']; ?>
            <?php endif; ?>
        </td>
                               
                                <td style="vertical-align: baseline;"><?php echo date('M. j, Y', strtotime($product['date'])); ?></td>
                                <td style="vertical-align: baseline;"><?php echo date('h:i A', strtotime($product['time'])); ?></td>
                               
                                <td style="vertical-align: baseline;">
                                    <button style="margin-top: -5px; margin-bottom: -5px;" class="btn btn-primary view-btn" data-toggle="modal" data-target="#orderModal_<?php echo $product['order_id']; ?>">View</button>
                                    <div class="dropdown show d-inline-block widget-dropdown" style="margin-top: -20px;margin-left: 10px">
                                        <a class="dropdown-toggle icon-burger-mini" href="#" role="button" id="dropdown-recent-order1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static"></a>
                                        <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-recent-order1">
                                            <li class="dropdown-item">
                                                <a href="#" onclick="acceptOrder(<?php echo $product['order_id']; ?>)"><i class="fas fa-clock-rotate-left fa-sm" aria-hidden="true" name="clear"></i>&emsp;Restore</a>
                                            </li>
                                           
                                        </ul>
                                    </div>
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
            
       
    
<script>
function acceptOrder(orderId) {
    // Send an AJAX request to update the order status
    $.ajax({
        type: 'POST',
        url: 'orders_archive.php', // Replace with the name of this PHP file
        data: {
            accept_order: true,
            order_id: orderId
        },
        success: function(response) {

         
            // Reload the page
            location.reload();
            // Handle the success response here, if needed
            // You can update the UI to reflect the new status
        },
        error: function(xhr, status, error) {
            // Handle errors here
            console.error(xhr.responseText);
        }
    });
}


</script>

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
   document.getElementById('printButton_<?php echo $product['order_id']; ?>').addEventListener('click', function () {
       var printContents = document.querySelector('#orderModal_<?php echo $product['order_id']; ?> .modal-body').innerHTML;
       var originalContents = document.body.innerHTML;
       document.body.innerHTML = printContents;
       window.print();
       document.body.innerHTML = originalContents;
   });

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

