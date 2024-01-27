<?php
// Include the database connection
include('connection.php');

?>

<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div><img src="" width="50" height="50"></div>
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
    
        <li class="nav-item">
        <a class="nav-link collapsed" href="products.php">
            <i class="fas fa-shopping-cart"></i>
            <span>Sales</span>
        </a>

        <li class="nav-item">

    

        <a class="nav-link collapsed" href="products.php">
            <i class="fas fa-fw fa-cube"></i>
            <span>Products</span>
        </a>

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
                    <a class="collapse-item" href="sports.php?sport=arnis">Item Categories</a>
                    <a class="collapse-item" href="sports.php?sport=athletics">Item Sub-categories</a>
                    <a class="collapse-item" href="sports.php?sport=badminton">Item Units</a>
                </div>
            </div>
        </li>  
        <li class="nav-item">
        <a class="nav-link collapsed" href="products.php">
            <i class="fas fa-fw fa-users"></i>
            <span>Customers</span>
        </a>

        <li class="nav-item">
        <a class="nav-link collapsed" href="products.php">
            <i class="fas fa-fw fa-users"></i>
            <span>Expenses</span>
        </a>

    

    


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->

    <!-- Sidebar Message -->
</ul>
<!-- End of Sidebar -->
