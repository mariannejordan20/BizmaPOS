<?php
session_start();

include('connection.php');

if (isset($_SESSION['hasLog'])) {
    $haslog = $_SESSION['hasLog'];
} else {
    $haslog = 0;
}

if (empty($haslog)) {
    header("location: login.php");
    exit;
}

$sql = "SELECT ID, Barcode, Quantity, ItemType, Product, Unit, Costing, Price, Wholesale, Promo, Categories, Seller, Supplier, Date_Registered FROM products ORDER BY Categories";
$results = $conn->query($sql);

?>


<!DOCTYPE html>
<html lang="en">
<style>
    #stocksinTable{
        cursor: pointer;
    }
    .stocksin-section {
    border-radius: 8px;
    padding: 20px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Subtle box-shadow for depth */
    margin-bottom: 20px;
    background-color: #fff; /* Optional: Add a background color */
    transition: box-shadow 0.3s; /* Smooth transition for box-shadow */
    }
    #stocksinTable {
        width: 100%  ;
        border-spacing: 0  ;
    }

    #stocksinTable th,
    #stocksinTable td {
        padding: 12px  ;
        text-align: left  ;
    }

    #stocksinTable th {    
        color: #656565 ; 
        white-space: nowrap;
        font-family: Segoe UI;
        font-size: 14px;
        text-align: left;
    }

    #stocksinTable tbody tr {
        transition: background-color 0.3s  ;
    }

    #stocksinTable tbody tr:hover {
        background-color: #ecf0f1  ; /* Light gray background on hover */
    }

    #stocksinTable a:hover {
        color: #c0392b; /* Darker red on hover */
    }
    #stocksinTable tbody tr.active {
        background-color: rgba(254, 60, 0, 0.3); /* Adjust the last value (alpha) for opacity */
    }
    .custom-column-width {
    width: 10%  ; /* Adjust the width as needed */
    }
    .custom-font-size td {
    font-size: 12px;
    white-space: nowrap;
    }
    .table-responsive {
    overflow-x: auto;
    }
        /* Default styles for the search bar */
        .input-group {
        margin-bottom: 15px;
    }

    #searchInput {
        max-width: 100%;
        width: 100%;
    }

        /* Responsive styles using media queries */
        @media (min-width: 576px) {
        /* Adjust styles for phones and larger screens */
        .searchAdjust {
            max-width: 400px;  /* Set a specific max-width for phones */
            width: 100%;      /* Allow it to take full width if needed */
        }
    }
    @media (min-width: 614px) {
        /* Adjust styles for phones and larger screens */
        .searchAdjust {
            max-width: 400px;  /* Set a specific max-width for phones */
            width: 100%;      /* Allow it to take full width if needed */
        }
    }

    @media (min-width: 1000px) {
        /* Adjust styles for PCs and larger screens */
        .searchAdjust {
            max-width: 480px;  /* Set a specific max-width for PCs */
            width: 100%;      /* Allow it to take full width if needed */
        }
    }


</style>
<?php include('header.php'); ?>
<body id="page-top">
    <div id="wrapper">
        <?php include ('menu.php'); ?>
        <div id="content-wrapper" class="d-flex flex-column" style="background-color: #eeeeee;">
            <div id="content">
                
            <nav class="navbar navbar-expand navbar-light  topbar static-top shadow" style="background-color: white">
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>
    <div class="card-header d-flex justify-content-start align-items-left" style="background-color: white; border: none">
    <h3 class="card-title mb-0" style="color: #313A46; font-family: Segoe UI; font-weight: bold;">STOCK IN</h3>
</div>
    <ul class="navbar-nav ml-auto">
        <div class="topbar-divider d-none d-sm-block"></div>


        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo " " . $_SESSION['Name'] . " "; ?></span>
                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
            </a>

            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="userDropdown">
                <div class="dropdown-divider"></div>
                <?php if ($_SESSION['Type'] == 'ADMIN' || $_SESSION['Type'] == 'MANAGER') { ?>
                <a class="dropdown-item" href="userAccounts.php">
    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
    User accounts
    </a>
  

                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#signupModal">
    <i class="fas fa-user-plus fa-sm fa-fw mr-2 text-gray-400"></i>
    Add User
</a>
<?php } ?>
                <a class="dropdown-item" href="logout.php">
    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
    Logout
    </a>


            </div>
        </li>
    </ul>
</nav>



                        <div class="stocksin-section">
                        <div class="mb-3 d-flex justify-content-between align-items-center ml-4 mr-4">
                        <input type="text" id="productSearchInput" class="form-control mb-3" placeholder="Search Product" style="font-size: 16px; border: 2px solid #3498db; padding: 10px; border-radius: 1px;">
        
                    </div>
                    <div class="section">
                <div class="container-fluid">
                    <form action="" id="student-form"> 
                        <fieldset>
                            
                            <div class="row">
                                 <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6">
                                    <div class="form-group">
                                    <label for="ID" class="control-label" style="font-weight: bold;">ID</label>
                                   <input type="number" name="ID" class="form-control form-control-sm rounded-5"/>

                                    </div>
                                </div>

                                <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6">
                                    <div class="form-group">
                                        <label for="ItemType" class="control-label" style="font-weight: bold;">Type</label>
                                        <select name="ItemType" class="form-control form-control-sm form-control-border rounded-5" required>
                                        <option value="">Select Type</option>
                                        <option value="W/ SERIAL">W/ Serial</option>
                                        <option value="NO SERIAL">No Serial</option>
                                        <option value="W/ EXPIRY">W/ Expiry</option>
                                       
                                        </select>
                                    
                                    
                        
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12" style="display: none;">
                                    <div class="form-group">
                                        <label for="ProductID" class="control-label" style="font-weight: bold;">Product ID</label>
                                        <input type="hidden" name="ProductID" class="form-control form-control-sm rounded-5" readonly value="<?= $next_IDcode ?>"/>
                                    </div>
                                </div>


                                
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                    <label for="Barcode" class="control-label" style="font-weight: bold;">Barcode </label>
                                    <input type="number" name="Barcode" class="form-control form-control-sm rounded-5" />
                                    </div>
                                </div>

                        

                                

                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                    <label for="Product" class="control-label" style="font-weight: bold;">Product Name</label>
                                    <input type="text" name="Product"  class="form-control form-control-sm rounded-5"  required/>
                                    </div>
                                </div>
                                


                            <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6">
                                <div class="form-group">
                                    <label for="Categories" class="control-label" style="font-weight: bold;">Category</label>
                                    <div id="categoriesDropdownContainer">
                                        <select name="Categories" id="Categories" class="form-control form-control-sm rounded-5" required>
                                            <option value="" selected disabled></option>
                                        </select>
                                    </div>
                                </div>
                            </div>


                    <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6">
                        <div class="form-group">
                            <label for="SubCategories" class="control-label" style="font-weight: bold;">Sub-Category</label>
                            <select name="SubCategories" id="SubCategories" class="form-control form-control-sm rounded-5" >
                                <!-- Placeholder option for subcategories -->
                                <option value="" disabled>Select a category first</option>
                            </select>
                        </div>
                    </div>

                            <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6">
                                <div class="form-group">
                                    <label for="Unit" class="control-label" style="font-weight: bold;">Unit</label>
                                    <select name="Unit" class="form-control form-control-sm rounded-5" required>
                                    </select>
                                </div>
                            </div>


                            <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6">
                                <div class="form-group">
                                    <label for="Warranty" class="control-label" style="font-weight: bold;">Warranty(Months)</label>
                                    <select name="Warranty" class="form-control form-control-sm form-control-border rounded-5" required>
                                    </select>
                                </div>
                            </div>



                                <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6">
                                    <div class="form-group">
                                    <label for="Costing" class="control-label" style="font-weight: bold;">Costing</label>
                                    <input type="number" name="Costing" class="form-control form-control-sm rounded-0" value="" min="1" max="1000000000" required/>
                                    </div>
                                </div>

                                <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6">
                                    <div class="form-group">
                                    <label for="Price" class="control-label" style="font-weight: bold;">Price</label>
                                    <input type="number" name="Price" class="form-control form-control-sm rounded-0" value="" min="1" max="1000000000" required/>
                                    </div>
                                </div>

                                <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6">
                                    <div class="form-group">
                                    <label for="Wholesale" class="control-label" style="font-weight: bold;">Wholesale</label>
                                    <input type="number" name="Wholesale" class="form-control form-control-sm rounded-0" value="" min="1" max="1000000000" required/>
                                    </div>
                                </div>

                                <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6">
                                    <div class="form-group">
                                    <label for="Promo" class="control-label" style="font-weight: bold;">Promo</label>
                                    <input type="number" name="Promo" class="form-control form-control-sm rounded-0" value="" min="1" max="1000000000" required/>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6">
                                    <div class="form-group">
                                        <label for="Costing" class="control-label" style="font-weight: bold;">Quantity</label>
                                        <input type="number" name="Costing" class="form-control form-control-sm rounded-0" value="" min="1" max="1000000000" required/>
                                        </div>
                                        </div>

                                        <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6">
                                        <div class="form-group">
                                        <label for="Price" class="control-label" style="font-weight: bold;">Staff</label>
                                        <input type="number" name="Price" class="form-control form-control-sm rounded-0" value="" min="1" max="1000000000" required/>
                                    </div>
                            </div>
                                <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6">
                                    <div class="form-group">
                                    <label for="Seller" class="control-label" style="font-weight: bold;">Seller</label>
                                    <input type="text" name="Seller" class="form-control form-control-sm rounded-0" />
                                    </div>
                                </div>

                                <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6">
                            <div class="form-group">
                                <label for="Supplier" class="control-label" style="font-weight: bold;">Supplier</label>
                                <select name="Supplier" class="form-control form-control-sm rounded-5" required>
                                </select> 
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <input type="submit" class="btn btn-success" name="Save" value="Save" style="margin-bottom: 20px;">
                        </div>
                    </div>

                    </form>
                </div>

        <div class="">
            <div class="table-responsive">
            <table class="table text-center table-bordered" id="stocksinTable" width="100%" cellspacing="0">

                
                <thead>
                    <tr class="th" style="color: #000000">
                    
                        <th class="text-center custom-column-width">ACTION</th>
                        <th class="text-center custom-column-width">BARCODE</th>
                        <th class="text-center custom-column-width">PRODUCT NAME</th>
                        <th class="text-center custom-column-width">TYPE</th>
                        <th class="text-center custom-column-width">UNIT</th>
                        <th class="text-center custom-column-width">QTY</th>
                        <th class="text-center custom-column-width">COSTING</th>
                        <th class="text-center custom-column-width">PRICE</th>
                        <th class="text-center custom-column-width">WHOLESALE</th>
                        <th class="text-center custom-column-width">PROMO</th>
                        <th class="text-center custom-column-width">CATEGORIES</th>
                        <th class="text-center custom-column-width">SELLER</th>
                        <th class="text-center custom-column-width">SUPPLIER</th>
                        <th class="text-center custom-column-width">DATE REGISTERED</th>
                  
                        
                    </tr>
                </thead>
                            </div>
                        </div>     
                    </div>
                </div>
            </div>
        </div>
    </div>
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
    
    <!-- Page level custom scripts -->
    <script src="assetsDT/js/bootstrap.bundle.min.js"></script>
    <script src="assetsDT/js/jquery-3.6.0.min.js"></script>
    <script src="assetsDT/js/pdfmake.min.js"></script>
    <script src="assetsDT/js/vfs_fonts.js"></script>
    <script src="assetsDT/js/custom.js"></script>

    <script src="js/sweetalert2.all.min.js"></script>
  <script src="js/sweetalert.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>

<script src="js/delete.js"></script>

<?php
   if(isset($_SESSION['status']) && $_SESSION['status'] !=''){
    ?>
      <script>
      swal({
      title: "<?php echo $_SESSION['status'];?>",
      icon: "<?php echo $_SESSION['status_code'];?>",
       });
 </script>
 <?php
      unset($_SESSION['status']);
   }
?>

</body>

</html>