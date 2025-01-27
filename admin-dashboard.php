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
  
    <!-- theme meta -->
    <meta name="theme-name" content="sleek" />
    
    <title>Romanteaco Dashboard</title>
    
    
    <!-- GOOGLE FONTS -->

    <link href="https://cdn.materialdesignicons.com/4.4.95/css/materialdesignicons.min.css" rel="stylesheet" />
  
    <!-- PLUGINS CSS STYLE -->

    <link href="assets/plugins/nprogress/nprogress.css" rel="stylesheet" />
  
    <!-- No Extra plugin used -->
    <link href='assets/plugins/jvectormap/jquery-jvectormap-2.0.3.css' rel='stylesheet'>
    <link href='assets/plugins/daterangepicker/daterangepicker.css' rel='stylesheet'>
    
    
    <link href='assets/plugins/toastr/toastr.min.css' rel='stylesheet'>
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
      
      #recent{
        margin-top: -20px;
        margin-left: -14px;
      }
      .table{
       padding: 10px;

      }
      #recent-orders{
        padding: 20px;
        padding-top: 5px;
      }
      .statusLabels {
    font-weight: bold;
}

      #view:hover{
        text-decoration: underline;
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

    <div id="toaster"></div>

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
        $page = "dashboard";
        $subpage = "dashboard";
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
                
                <div id="search-results-container">
                  <ul id="search-results"></ul>
                </div>
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





		
                  <!-- Top Statistics -->
                  <div class="row">
                    <div class="col-xl-3 col-sm-6">
                      <div class="card card-mini mb-4">
                        <div class="card-body">
                          <div class="media-body media-text-right">
                            <h2 class="mb-1"><?php $sql="select * from user_account";
                              $result=mysqli_query($db,$sql); 
                              $rws=mysqli_num_rows($result);
                              
                              echo $rws;?>
                            </h2>
                            <p class="m-b-0">Registered users</p>
                          </div>
                          
                            <div class="chartjs-wrapper">
                              <img src="images/registered-user.png" alt="" style="width: 100%; height: 5rem; margin-top: 1rem; object-fit: contain;">
                            </div>
                        </div>
                      </div>
                    </div>
                    
                    <div class="col-xl-3 col-sm-6">
                      <div class="card card-mini mb-4">
                        <div class="card-body">
                        <div class="media-body media-text-right">
                          <h2 class="mb-1"><?php $sql="select * from order_list";
												$result=mysqli_query($db,$sql); 
													$rws=mysqli_num_rows($result);
													
													echo $rws;?></h2>
                          <p>Total orders</p>
                               </div>
                          <div class="chartjs-wrapper">
                            <img src="images/total-order.png" alt="" style="width: 100%; height: 5rem; margin-top: 1rem; object-fit: contain;">
                          </div>
                        </div>
                      </div>
                    </div>

                  <div class="col-xl-3 col-sm-6">
                      <div class="card card-mini mb-4">
                        <div class="card-body">
                        <div class="media-body media-text-right">
                          <h2 class="mb-1"><?php $sql="select * from product where archive = 0";
												$result=mysqli_query($db,$sql); 
													$rws=mysqli_num_rows($result);
													
													echo $rws;?></h2>
                          <p>Food items</p>
                               </div>
                          <div class="chartjs-wrapper">
                            <img src="images/food-items.png" alt="" style="width: 100%; height: 5rem; margin-top: 1rem; object-fit: contain;">
                          </div>
                        </div>
                      </div>
                    </div>

                     <div class="col-xl-3 col-sm-6">
                      <div class="card card-mini mb-4">
                        <div class="card-body">
                        <div class="media-body media-text-right">
                          <h2 class="mb-1"><?php $sql="select * from category";
												$result=mysqli_query($db,$sql); 
													$rws=mysqli_num_rows($result);
													
													echo $rws;?></h2>
                          <p>Category</p>
                               </div>
                          <div class="chartjs-wrapper">
                            <img src="images/category.png" alt="" style="width: 100%; height: 5rem; margin-top: 1rem; object-fit: contain;">
                          </div>
                        </div>
                      </div>
                      
                    </div>
                  </div>


		<div class="row">
      
    <div class="col-xl-8 col-md-12">
    
    <!-- Sales Graph -->
    <div class="card card-default" id="recent-orders">
        <div class="card-header justify-content-between">
            <h2 id="recent" style="font-weight: 600">Recent Orders</h2>
            <a href="orders_pending.php"><p id="view" style="margin-top: -20px; font-size: 15px;">VIEW ALL</p></a>
        </div>
        
        <br>
        <table class="table table-borderless" id="dashboard-table">
            <thead>
                <tr>
                    <th scope="col" style="color: #495057; font-weight:600; font-size: 16px; background-color: #e4eccd">#</th>
                    <th scope="col" style="color: #495057; font-weight:600; font-size: 16px; background-color: #e4eccd">USERNAME</th>
                    <th scope="col" style="color: #495057; font-weight:600; font-size: 16px; background-color: #e4eccd">TOTAL</th>
                    <th scope="col" style="color: #495057; font-weight:600; font-size: 16px; background-color: #e4eccd">STATUS</th>
                </tr>
            </thead>
            <tbody>
                <?php
                

                // Query to retrieve data from the 'order_list' table
                $sql = "SELECT * FROM order_list ORDER BY date DESC LIMIT 7";
                $result = $db->query($sql);

                if ($result->num_rows > 0) {
                  while ($row = $result->fetch_assoc()) {
                      echo '<tr>';
                      echo '<td style="color:gray;">' . $row['order_id'] . '</td>';
                      echo '<td>' . $row['user_name'] . '</td>';
                      echo '<td>₱' . number_format($row['total'], 2) . '</td>';
                      
                      // Map status values to descriptions
                      $statusDescription = '';
                      switch ($row['status']) {
                        case 1:
                            $statusDescription = '<span style="background-color: royalblue; padding: 5px; border-radius: 3px; color: white; font-size: 84%; font-weight: 500;">PENDING</span>';
                            break;
                        case 2:
                          $statusDescription = '<span style="background-color: #fec400; padding: 5px; border-radius: 3px; color: white; font-size: 84%; font-weight: 500;">IN-PROGRESS</span>';
                            break;
                        case 3:
                          $statusDescription = '<span style="background-color: #f58216; padding: 5px; border-radius: 3px; color: white; font-size: 84%; font-weight: 500;">PREPARED</span>';
                            break;
                        case 4:
                          $statusDescription = '<span style="background-color: #76a004; padding: 5px; border-radius: 3px; color: white; font-size: 84%; font-weight: 500;">COMPLETED</span>';
                            break;
                        case 5:
                          $statusDescription = '<span style="background-color: #fe5461; padding: 5px; border-radius: 3px; color: white; font-size: 84%; font-weight: 500;">CANCELLED</span>';
                            break;
                        case 11:
                          $statusDescription = '<span style="background-color: gray; padding: 5px; border-radius: 3px; color: white; font-size: 84%; font-weight: 500;">UNCLAIMED</span>';
                            break;
                        default:
                            $statusDescription = 'Unknown';
                            break;
                    }
                    
                      
                      echo '<td>' . $statusDescription . '</td>';
                      echo '</tr>';
                  }
              } else {
                  echo '<tr><td colspan="4">No orders found</td></tr>';
              }

              // Close the database connection
              $db->close();
              ?>
            </tbody>
        </table>
        
    </div>
  
</div>
           


			<div class="col-xl-4 col-md-12">
				
                  <!-- Doughnut Chart -->
                  <div class="card card-default">
                  <div class="card-header justify-content-center">
    <h2 style="font-weight: 600">Orders Overview</h2>
    
    <div style="max-width: 400px; height: 400px; padding-bottom: 100px;">
        <canvas id="donutChart"></canvas>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script> <!-- Include Chart.js library -->

<script>
    fetch('chart_data.php')
        .then(response => response.json())
        .then(orderData => {
            var ctx = document.getElementById('donutChart').getContext('2d');

            var statusLabels = {
                '1': 'Pending',
                '2': 'In Progress',
                '3': 'Prepared',
                '4': 'Completed',
                '5': 'Cancelled',
                '11': 'Unclaimed'
            };

            var backgroundColors = Object.keys(orderData).map(status => {
                if (status === '1') {
                    return 'royalblue';
                } else if (status === '2') {
                    return '#fec400';
                } else if (status === '3') {
                    return '#f58216';
                } else if (status === '4') {
                    return '#76a004';
                } else if (status === '5') {
                    return '#fe5461';
                }else if (status === '11') {
                    return 'gray';
                }else {
                    return 'rgba(0, 0, 0, 0.6)'; // Default color
                }
            });

            var donutChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: Object.keys(orderData).map(status => statusLabels[status]),
                    datasets: [{
                        data: Object.values(orderData),
                        backgroundColor: backgroundColors,
                        borderColor: backgroundColors,
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,  // Make the chart responsive
                    maintainAspectRatio: false,  // Allow aspect ratio to change
                    plugins: {
                        legend: {
                            display: true,
                            position: 'bottom'
                        }
                    },
                    cutoutPercentage: 70, // Adjust this value to make the chart thinner
                }
            });
        })
        .catch(error => {
            console.error('Error fetching data:', error);
        });
</script>


                    
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
 
    <script src='assets/plugins/charts/Chart.min.js'></script>
    <script src='assets/js/chart.js'></script>

    
    

    <script src='assets/plugins/daterangepicker/moment.min.js'></script>
    <script src='assets/plugins/daterangepicker/daterangepicker.js'></script>
    <script src='assets/js/date-range.js'></script>

    

    
    
    
    

    <script src='assets/plugins/toastr/toastr.min.js'></script>

    

    
    
    

    
    

    

    <script src="assets/js/sleek.js"></script>

</body>
</html>

