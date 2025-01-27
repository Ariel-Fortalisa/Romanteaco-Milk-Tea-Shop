<aside class="left-sidebar bg-sidebar">
    <div id="sidebar" class="sidebar sidebar-with-footer">
    <!-- Aplication Brand -->
    <div class="app-brand">
        <a href="#" title="Sleek Dashboard">
        
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
            echo '<img src="' . $imageURL . '" alt="Product Image" style="height: 55px; width: 55px; margin-left: -15px;">';
        } else {
            echo 'No image found.';
        }

        // Remember to free the result set
        mysqli_free_result($result);
    } else {
        echo 'Database query failed.';
    }
    
    ?>
        
        <?php
// Assuming you have already established a database connection ($db) here.

$query = "SELECT store_name FROM system_settings";
$result = mysqli_query($db, $query);

// Fetch the store_name into a variable
if ($row = mysqli_fetch_assoc($result)) {
    $storeName = $row['store_name'];
}
?>
<span class="brand-name text-truncate"><?php echo $storeName; ?></span>


        </a>
    </div>

    <!-- begin sidebar scrollbar -->
    <div class="" data-simplebar style="height: 100%;">
        <!-- sidebar menu -->
        <ul class="nav sidebar-inner" id="sidebar-menu">
        <li class="has-sub <?=$page == "dashboard" ? "active expand": ""?>">
            <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#dashboard"
            aria-expanded="false" aria-controls="dashboard">
            <i class="mdi mdi-view-dashboard-outline"></i>
            <span class="nav-text">Dashboard</span> <b class="caret"></b>
            </a>

            <ul class="collapse <?=$page == "dashboard" ? "show": ""?>" id="dashboard" data-parent="#sidebar-menu">
            <div class="sub-menu">
                <li class="<?=$subpage == "dashboard" ? "active": ""?>">
                <a class="sidenav-item-link" href="admin-dashboard.php">
                    <span class="nav-text">Dashboard</span>
                </a>
                </li>

               
            </div>
            </ul>
        </li>

        

        <!-- <li class="section-title">
            UI Elements
        </li> -->

        

        

        
        <li class="has-sub <?=$page == "inventory" ? "active expand": ""?>">
            <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#tables"
            aria-expanded="false" aria-controls="tables">
            <i class="mdi mdi-package-variant"></i>
            <span class="nav-text">Inventory</span> <b class="caret"></b>
            </a>

            <ul class="collapse <?=$page == "inventory" ? "show": ""?>" id="tables" data-parent="#sidebar-menu">
            <div class="sub-menu">

            
            <?php
// Fetch category names from the "category" table
$categoryData = array();
$query = "SELECT category_id, category_name FROM category";
$result = mysqli_query($db, $query);
while ($row = mysqli_fetch_assoc($result)) {
$categoryData[] = array($row["category_id"], $row['category_name']);
}
?>

<li class="has-sub <?=$subpage == "products" ? "active expand": ""?>">
<a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#data-tables"
aria-expanded="false" aria-controls="data-tables">
<span class="nav-text">Products</span> <b class="caret"></b>
</a>

<ul class="collapse <?=isset($subpage2) ? "show": ""?>" id="data-tables">
<div class="sub-menu">
    <?php
    // Loop through the fetched category names and generate links
    foreach ($categoryData as $ctg) {
        echo '<li class="'.(isset($subpage2) and $subpage2 == $ctg[0] ? "active": "").'"><a href="products.php?category_id='.$ctg[0].'">' . htmlspecialchars($ctg[1]) . '</a></li>';
    }
    ?>
</div>
</ul>
</li>


                <li class="<?=$subpage == "category" ? "active": ""?>">
                <a class="sidenav-item-link" href="category.php">
                    <span class="nav-text">Category</span>
                </a>
                </li>
                <li class="<?=$subpage == "materials" ? "active": ""?>">
                <a class="sidenav-item-link" href="materials.php">
                    <span class="nav-text">Materials</span>
                </a>
                </li>

                <li class="<?=$subpage == "flavors" ? "active": ""?>">
                <a class="sidenav-item-link" href="flavors.php">
                    <span class="nav-text">Flavors</span>
                </a>
                </li>

                <li class="<?=$subpage == "add_ons" ? "active": ""?>">
                <a class="sidenav-item-link" href="add-ons.php">
                    <span class="nav-text">Add ons</span>
                </a>
                </li>
            </div>
            </ul>
        </li>

        <li class="has-sub <?=$page == "orders" ? "active expand": ""?>">
            <a onclick="stopSound();" class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#app"
            aria-expanded="false" aria-controls="app">
            <i class="mdi mdi-cart"></i>
            
        

            <style>
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
            </style>
            <span class="nav-text" onclick="stopSound();">Orders</span>
            
<button id="stopButton" onclick="stopSound();" style="display: none;"><p id="shake" >NEW</p><span id="bellText" class="bell-text"></span></button>

<!-- Rest of your HTML content -->

<script src="your_script.js"></script>
<script>
var audio = new Audio('assets/door.mp3');
var shakeElement = document.getElementById('shake');
var bellTextElement = document.getElementById('bellText');
var stopButton = document.getElementById('stopButton');
var isShaking = false;
var shakeInterval;

function checkForNewOrders() {
var xhr = new XMLHttpRequest();
xhr.onreadystatechange = function() {
if (xhr.readyState === 4 && xhr.status === 200) {
    var response = JSON.parse(xhr.responseText);
    if (response.newOrder) {
        displayBellButton();
        playSoundAndShake();
    } else {
        hideBellButton(); // No new order, hide the bell button
    }
}
};
xhr.open('GET', 'check_for_new_orders.php', true);
xhr.send();
}

function displayBellButton() {
stopButton.style.display = 'block'; // Display the bell button
}

function hideBellButton() {
stopButton.style.display = 'none'; // Hide the bell button
}

function playSoundAndShake() {
audio.play();
shakeElement.classList.add('shake-animation');
isShaking = true;

// Stop the shaking and remove the text after 3 seconds
clearTimeout(shakeInterval);
shakeInterval = setTimeout(function() {
stopShaking();
bellTextElement.textContent = '';
}, 3000);
}

function stopShaking() {
shakeElement.classList.remove('shake-animation');
isShaking = false;
}

function stopSound() {
audio.pause();
audio.currentTime = 0;
stopShaking();
bellTextElement.textContent = '';

var xhr = new XMLHttpRequest();
xhr.open('GET', 'delete_orders1.php', true);
xhr.send();
}

window.addEventListener('DOMContentLoaded', function() {
setInterval(checkForNewOrders, 5000);
});

shakeElement.addEventListener('click', function() {
if (isShaking) {
stopSound();
}
});

</script>
            <b class="caret"></b>
            
            </a>

            <ul class="collapse <?=$page == "orders" ? "show": ""?>" id="app" data-parent="#sidebar-menu">
            <div class="sub-menu">
            <li class="<?=$subpage == "all_orders" ? "active": ""?>">
                <a class="sidenav-item-link" href="orders_pending.php">
                    
                    <span class="nav-text">Order List</span>
                    
                </a>
                </li>
                <li class="<?=$subpage == "unclaimed_orders" ? "active": ""?>">
                <a class="sidenav-item-link" href="unclaimed_order.php">
                    <span class="nav-text">Unclaimed Orders</span>
                </a>
                </li>
               

                
            </div>
            </ul>
        </li>


        <li class="has-sub <?=$page == "config" ? "active expand": ""?>">
            <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#widgets1"
            aria-expanded="false" aria-controls="widgets1">
            <i class="mdi mdi-settings"></i> 
            <span class="nav-text">Configuration</span> <b class="caret"></b>
            </a>

            <ul class="collapse <?=$page == "config" ? "show": ""?>" id="widgets1" data-parent="#sidebar-menu">
            <div class="sub-menu">


                <li class="<?=$subpage == "settings" ? "active": ""?>">
                <a class="sidenav-item-link" href="system_settings.php">
                    <span class="nav-text">System Setting</span>
                </a>
                </li>
            </div>
            </ul>
        </li>

        <li class="has-sub <?=$page == "report1" ? "active expand": ""?>">
            <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#widgets2"
            aria-expanded="false" aria-controls="widgets2">
            <i class="mdi mdi-printer"></i> 
            <span class="nav-text">Reports</span> <b class="caret"></b>
            </a>

            <ul class="collapse <?=$page == "report1" ? "show": ""?>" id="widgets2" data-parent="#sidebar-menu">
            <div class="sub-menu">
                <li class="<?=$subpage == "comp" ? "active": ""?>">
                <a class="sidenav-item-link" href="orders_completed_reports.php">
                    <span class="nav-text">Completed Orders</span>
                </a>
                </li>

                <li class="<?=$subpage == "inv" ? "active": ""?>">
                <a class="sidenav-item-link" href="inventory_reports.php">
                    <span class="nav-text">Inventory Reports</span>
                </a>
                </li>
                

                <li class="<?=$subpage == "sales" ? "active": ""?>">
                <a class="sidenav-item-link" href="sales_reports.php">
                    <span class="nav-text">Sales Reports</span>
                </a>
                </li>
            </div>
            </ul>
        </li>

        <li class="has-sub <?=$page == "archives" ? "active expand": ""?>">
            <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#widget"
            aria-expanded="false" aria-controls="widget">
            <i class="mdi mdi-archive"></i> 
            <span class="nav-text">Archives</span> <b class="caret"></b>
            </a>

            <ul class="collapse <?=$page == "archives" ? "show": ""?>" id="widget" data-parent="#sidebar-menu">
            <div class="sub-menu">
            <li class="<?=$subpage == "archive products" ? "active": ""?>">
                <a class="sidenav-item-link" href="products_archive.php">
                    <span class="nav-text">Archive Products</span>
                </a>
                </li>

                <li class="<?=$subpage == "archive orders" ? "active": ""?>">
                <a class="sidenav-item-link" href="orders_archive.php">
                    <span class="nav-text">Archive Orders</span>
                </a>
                </li>
            </div>
            </ul>
        </li>

        <li class="has-sub <?=$page == "account" ? "active expand": ""?>">
            <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#widgets"
            aria-expanded="false" aria-controls="widgets">
            <i class="mdi mdi-account-circle"></i> 
            <span class="nav-text">Account</span> <b class="caret"></b>
            </a>

            <ul class="collapse <?=$page == "account" ? "show": ""?>" id="widgets" data-parent="#sidebar-menu">
            <div class="sub-menu">
            <li class="<?=$subpage == "my_profile" ? "active": ""?>">
                <a class="sidenav-item-link" href="user-profile.php">
                    <span class="nav-text">My Profile</span>
                </a>
                </li>

              
            </div>
            </ul>
        </li>

       

        

        <!-- <li class="section-title">
            Documentation
        </li> -->
        </ul>
    </div>

    
    </div>
</aside>