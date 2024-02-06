<?php
    session_start();

    include('connection.php');

    // $haslog = (isset($_SESSION['hasLog'])?$_SESSION['hasLog']:0);

    if (isset($_SESSION['hasLog'])){
        $haslog = $_SESSION['hasLog'];
    }else{
        $haslog = 0;
    }

    if (empty($haslog)){
        header("location: index.php");
        exit;
    }

    
?>


<!DOCTYPE html>
<html lang="en">

<?php
    include('header.php');
?>
<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php
            include ('menu.php');
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
                        

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo " ".$_SESSION['Name']." ";?></span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                
                                
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

 <?php
                            $id = $_GET['id'];
                            $sql = "select * from products where ID = ".$id;
                            $result = $conn->query($sql);
                            $row = $result->fetch_assoc();
                        ?>
                        <form action = "productsEditSave.php" method="post" enctype ="multipart/form-data">
                            <input type="hidden" name="hiddenID" value="<?=$id?>">
                        <div class="row">

                            <h3><b><?= isset($id) ? "Edit products Details" : "Edit products Details" ?></b></h3>
</div>
<div class="mx-0 py-5 px-3 mx-ns-4 bg-gradient-maroon">
<div class="row justify-content-center" style="margin-top:-2em;">
    <div class="col-lg-11 col-md-11 col-sm-12 col-xs-12">
        <div class="card rounded-0 shadow">
            <div class="card-body">
                <div class="container-fluid">
                    <form action="" id="student-form">
                        <input type="hidden" name ="id" value="<?php echo isset($id) ? $id : '' ?>">
                            
                        <fieldset class="border-bottom">
                            <legend>Students Information</legend>
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                    <label for="Barcode" class="control-label">Barcode</label>
                                    <input type="text" name="Barcode" class="form-control form-control-sm rounded-0" value="<?=$row['Barcode']?>">
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                    <label for="Product" class="control-label">Product Name</label>
                                    <input type="text" name="Product"  class="form-control form-control-sm rounded-0" value="<?=$row['Product']?>">
                                    </div>
                                </div>
                                
                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
    <div class="form-group">
        <label for="Unit" class="control-label">Unit</label>
        
        
        
        <!-- Unit dropdown -->
        <select name="Unit" class="form-control form-control-sm rounded-5" required>
            <?php
           
            $sqlUnitOptions = "SELECT unit_name FROM units";
            $resultUnitOptions = $conn->query($sqlUnitOptions);

            if ($resultUnitOptions->num_rows > 0) {
                while ($rowUnit = $resultUnitOptions->fetch_assoc()) {
                    echo '<option>' . $rowUnit['unit_name'] . '</option>';
                }
            } else {
                echo '<option value="" disabled>No unit options available</option>';
            }
            ?>
        </select>
    </div>
</div>

                                
                                          
 <!-- Category Dropdown -->
<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
    <div class="form-group">
        <label for="Categories" class="control-label">Category</label>
        <div id="categoriesDropdownContainer">
            <select name="Categories" id="Categories" class="form-control form-control-sm rounded-5" >
            <option value="<?=$row['Categories']?>"></option>


                <?php
                // Populate categories dropdown
                $sqlCategories = "SELECT ID, main_category FROM categories";
                $resultCategories = $conn->query($sqlCategories);

                if ($resultCategories->num_rows > 0) {
                    while ($rowCategory = $resultCategories->fetch_assoc()) {
                        echo '<option value="' . $rowCategory['main_category'] . '">' . $rowCategory['main_category'] . '</option>';
                    }
                } else {
                    echo '<option value="" disabled>No categories available</option>';
                }
                ?>
            </select>
        </div>
    </div>
</div>

<!-- Sub-Category Dropdown -->
<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
    <div class="form-group">
        <label for="SubCategories" class="control-label">Sub-Category</label>
        <select name="SubCategories" id="SubCategories" class="form-control form-control-sm rounded-5" >
            <!-- Placeholder option for subcategories -->
            <option value="<?=$row['SubCategory']?>"></option>
        </select>
    </div>
</div>

<script>
    // Add JavaScript to dynamically update subcategories based on selected category
    document.getElementById('Categories').addEventListener('change', function() {
        var selectedCategory = this.value;
        var subCategoriesDropdown = document.getElementById('SubCategories');

        // Clear existing options
        subCategoriesDropdown.innerHTML = '<option value="" disabled>Select a category first</option>';

        // Populate subcategories based on the selected category
        <?php
        $sqlSubCategories = "SELECT sc.sub_category, c.main_category FROM subcategories as sc RIGHT JOIN categories as c ON c.main_category = sc.main_category";
        $resultSubCategories = $conn->query($sqlSubCategories);

        if ($resultSubCategories->num_rows > 0) {
            while ($rowSubCategory = $resultSubCategories->fetch_assoc()) {
                echo 'if ("' . $rowSubCategory['main_category'] . '" === selectedCategory || selectedCategory === "") {';
                echo 'var option = document.createElement("option");';
                echo 'option.value = "' . $rowSubCategory['sub_category'] . '";';
                echo 'option.text = "' . $rowSubCategory['sub_category'] . '";';
                echo 'subCategoriesDropdown.add(option);';
                echo '}';
            }
        }
        ?>
    });
</script>


<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
    <div class="form-group">
        <label for="Warranty" class="control-label">Warranty</label>
        <select name="Warranty" class="form-control form-control-sm form-control-border rounded-5" required>
            <?php
            
            $sqlWarrantyOptions = "SELECT Warranty FROM warranty";
            $resultWarrantyOptions = $conn->query($sqlWarrantyOptions);

            if ($resultWarrantyOptions->num_rows > 0) {
                while ($rowWarranty = $resultWarrantyOptions->fetch_assoc()) {
                    echo '<option>' . $rowWarranty['Warranty'] . '</option>';
                }
            } else {
                echo '<option value="" disabled>No warranty options available</option>';
            }
            ?>
        </select>
    </div>
</div>

<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                    <label for="Quantity" class="control-label">Quantity</label>
                                    <input type="number" name="Quantity" class="form-control form-control-sm rounded-0" value="<?=$row['Quantity']?>"readonly>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                    <label for="Costing" class="control-label">Costing</label>
                                    <input type="number" name="Costing" class="form-control form-control-sm rounded-0" value="<?=$row['Costing']?>">
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                    <label for="Price" class="control-label">Price</label>
                                    <input type="number" name="Price" class="form-control form-control-sm rounded-0" value="<?=$row['Price']?>">
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                    <label for="Wholesale" class="control-label">Wholesale</label>
                                    <input type="number" name="Wholesale" class="form-control form-control-sm rounded-0" value="<?=$row['Wholesale']?>">
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                    <label for="Promo" class="control-label">Promo</label>
                                    <input type="number" name="Promo" class="form-control form-control-sm rounded-0" value="<?=$row['Promo']?>">
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                    <label for="Seller" class="control-label">Seller</label>
                                    <input type="text" name="Seller" class="form-control form-control-sm rounded-0" value="<?=$row['Seller']?>">
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                    <label for="Supplier" class="control-label">Supplier</label>
                                    <input type="text" name="Supplier" class="form-control form-control-sm rounded-0" value="<?=$row['Supplier']?>">
                                    </div>
                                </div>

                                

                                


                                



                            </div>


                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" name="Save" value="Save" class="btn btn-success">Save Changes</button>
                            </div>
                        </div>
                    </form>



                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

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

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>                   