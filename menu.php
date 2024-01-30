<?php
// Include the database connection
include('connection.php');

?>

<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div><img src="bizmalogo.gif" width="50" height="50"></div>
        <div class="sidebar-brand-text mx-3">Bizmatech-POS</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="index.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->

    <div class="sidebar-heading">
        Main
    </div>

    <li class="nav-item">
        <a class="nav-link collapsed" href="products.php">
            <i class="fas fa-shopping-cart"></i>
            <span>Sales</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="products.php">
            <i class="fas fa-fw fa-cube"></i>
            <span>Products</span>
        </a>
    </li>


    <?php
    // Fetch distinct categories from the products table
    $query = "SELECT DISTINCT Categories FROM products";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo '<li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-soccer-ball-o"></i>
                    <span>Product Category</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">List of Category:</h6>';

        // Display the list of categories
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<a class="collapse-item" href="stocks.php?category=' . urlencode($row['Categories']) . '">' . $row['Categories'] . '</a>';
        }

        echo '</div>
              </div>
              </li>';
    }
    ?>



         <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseStock"
                aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-fw fa-soccer-ball-o"></i>
                <span>Stock</span>
            </a>
            <div id="collapseStock" class="collapse" aria-labelledby="headingUtilities"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <!-- <h6 class="collapse-header">List of Sports:</h6> -->
                    <a class="collapse-item" href="stocksInHistory.php">Stock In History</a>
                    <a class="collapse-item" href="stocksIn.php">Stock In +</a>
                    <a class="collapse-item" href="stocksOutHistory.php">Stock Out History </a>
                    <a class="collapse-item" href="stocksOut.php">Stock out - </a>
                    <a class="collapse-item" href="products.php">Inventory List </a>
                </div>
            </div>
        </li>  

        <li class="nav-item">
        <a class="nav-link collapsed" href="customers.php">

            <i class="fas fa-fw fa-users"></i>
            <span>Customers</span>
        </a>
   
</li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="products.php">
            <i class="fas fa-fw fa-users"></i>
            <span>Expenses</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->

    <!-- Sidebar Message -->
</ul>
<!-- End of Sidebar -->
