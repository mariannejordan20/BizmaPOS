<!DOCTYPE html>
<html lang="en">

<?php
include('header.php');
session_start();
?>

<!-- Page Wrapper -->
<div id="wrapper">

    <?php
    include('menu.php');
    ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <!-- Topbar Search -->

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                    <a href="categoryAdd.php"><button class="btn btn-primary mb-3 mt-3">Add New Category</button></a>
                    <a href="subcategoryAdd.php"><button class="btn btn-primary mb-3 mt-3">Add New Subcategory</button></a>
                    <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo " " . $_SESSION['Name'] . " "; ?></span>
                            <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                            aria-labelledby="userDropdown">

                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="logout.php">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </div>
                    </li>

                </ul>

            </nav>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-outline rounded-0 card-maroon">
                            <div class="card-header">
                                <h3 class="card-title">List of Categories</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered text-center" width="100%" cellspacing="0">
                                        <thead>
                                            <tr class="bg-primary text-white">
                                                <th class="text-center">Action</th>
                                                <th class="text-center">Category</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            // Pagination variables
                                            $limit = 10; // Number of items per page
                                            $page = isset($_GET['page']) ? $_GET['page'] : 1;
                                            $offset = ($page - 1) * $limit;

                                            // Fetching categories
                                            $categorySql = "SELECT ID, main_category AS maincat FROM categories ORDER BY maincat";
                                            $categoryResults = $conn->query($categorySql);
                                            $totalCategories = $categoryResults->num_rows;
                                            $totalPages = ceil($totalCategories / $limit);

                                            $categorySql .= " LIMIT $limit OFFSET $offset";
                                            $categoryResults = $conn->query($categorySql);

                                            foreach ($categoryResults as $category) {
                                                echo '<tr>
                                                        <td>
                                                            <a href="categoryDelete.php?id=' . $category['ID'] . '">
                                                                <i class="fa fa-trash text-danger"></i>
                                                            </a>
                                                        </td>
                                                        <td>' . $category['maincat'] . '</td>
                                                    </tr>';
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- Pagination controls -->
                                <div class="pagination">
                                    <?php
                                    // Previous page link
                                    $prevPage = $page - 1;
                                    if ($prevPage > 0) {
                                        echo '<a href="?page=' . $prevPage . '">&laquo; Previous</a>';
                                    }

                                    // Next page link
                                    $nextPage = $page + 1;
                                    if ($nextPage <= $totalPages) {
                                        echo '<a href="?page=' . $nextPage . '">Next &raquo;</a>';
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card card-outline rounded-0 card-maroon">
                            <div class="card-header">
                                <h3 class="card-title">List of Subcategories</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered text-center" width="100%" cellspacing="0">
                                        <thead>
                                            <tr class="bg-primary text-white">
                                                <th class="text-center">Action</th>
                                                <th class="text-center">Subcategory</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            // Fetching subcategories
                                            $subcategorySql = "SELECT ID, sub_category AS subcat FROM subcategories ORDER BY subcat";
                                            $subcategoryResults = $conn->query($subcategorySql);
                                            $totalSubcategories = $subcategoryResults->num_rows;
                                            $totalPages = ceil($totalSubcategories / $limit);

                                            $subcategorySql .= " LIMIT $limit OFFSET $offset";
                                            $subcategoryResults = $conn->query($subcategorySql);

                                            foreach ($subcategoryResults as $subcategory) {
                                                echo '<tr>
                                                        <td>
                                                            <a href="subCategoryDelete.php?id=' . $subcategory['ID'] . '">
                                                                <i class="fa fa-trash text-danger"></i>
                                                            </a>
                                                        </td>
                                                        <td>' . $subcategory['subcat'] . '</td>
                                                    </tr>';
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- Pagination controls -->
                                <div class="pagination">
                                    <?php
                                    // Previous page link
                                    $prevPage = $page - 1;
                                    if ($prevPage > 0) {
                                        echo '<a href="?page=' . $prevPage . '">&laquo; Previous</a>';
                                    }

                                    // Next page link
                                    $nextPage = $page + 1;
                                    if ($nextPage <= $totalPages) {
                                        echo '<a href="?page=' . $nextPage . '">Next &raquo;</a>';
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->


    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="login.html">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
