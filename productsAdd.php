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
        header("location: login.php");
        exit;
    }

    

    
?>

<!DOCTYPE html>
<html lang="en">
<style>
    .products-section {
    border-radius: 8px;
    padding: 20px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Subtle box-shadow for depth */
    margin-bottom: 20px;
    background-color: #fff; /* Optional: Add a background color */
    transition: box-shadow 0.3s; /* Smooth transition for box-shadow */
    }

    .hidden {
        display: none;
    }
    label{
    color: #313A46;
    }
</style>
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
        <div id="content-wrapper" class="d-flex flex-column" style="background-color: #eeeeee;">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php
                 include('navbar.php');
                ?>
                <!-- End of Topbar -->


                <!-- Begin Page Content -->
                <div class="container-fluid" style="padding-left: 2%;">
                       
                        <form action = "productsAddSave.php" method="post" enctype="multipart/form-data">
                        <div class="card-header" style="background-color: #eeeeee; border: none">
                        <h3 style="color: #313A46; margin-bottom: -10px"><b><?= isset($id) ? "Update product Details" : "Register New Product" ?></b></h3>
</div>
</div>      
<div class="section">
<div class="mx-0 py-5 px-3 mx-ns-4 bg-gradient-maroon">
<div class="row justify-content-center" style="margin-top:-2em;">
    <div class="col-lg-11 col-md-11 col-sm-12 col-xs-12">
    <div class="products-section">
            <div class="card-body">
            <div class="section">
                <div class="container-fluid">
                    <form action="" id="student-form">
                        <input type="hidden" name ="id" value="<?php echo isset($id) ? $id : '' ?>">
                            
                        <fieldset>
                            <legend style="color: #313A46;">Product Information</legend>
                            <div class="row">

                           <?php
  

   
    $sqlMaxID = "SELECT MAX(ID) AS maxID FROM products";
    $resultMaxID = $conn->query($sqlMaxID);
    $rowMaxID = $resultMaxID->fetch_assoc();
    $maxID = $rowMaxID['maxID'];

    
    $nextID = $maxID + 1;

    // Format the ID to be six digits long
    $next_IDcode = sprintf("%06d", $nextID);
?>
                                 <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6">
                                    <div class="form-group">
                                    <label for="ID" class="control-label">ID</label>
                                   <input type="number" name="ID" class="form-control form-control-sm rounded-5" readonly value="<?= $next_IDcode ?>"/>

                                    </div>
                                </div>

                                <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6">
                                    <div class="form-group">
                                        <label for="ItemType" class="control-label">Type</label>
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
                                <label for="ProductID" class="control-label">Product ID</label>
                                <input type="hidden" name="ProductID" class="form-control form-control-sm rounded-5" readonly value="<?= $next_IDcode ?>"/>
                            </div>
                        </div>


                                
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                    <label for="Barcode" class="control-label">Barcode </label>
                                    <input type="number" name="Barcode" class="form-control form-control-sm rounded-5" />
                                    </div>
                                </div>

                        

                                

                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                    <label for="Product" class="control-label">Product Name</label>
                                    <input type="text" name="Product"  class="form-control form-control-sm rounded-5"  required/>
                                    </div>
                                </div>
                                
                                


<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6">
    <div class="form-group">
        <label for="Categories" class="control-label">Category</label>
        <a href="#" data-toggle="modal" data-target="#AddUModal" style="background-color: white; float: right">
            <span class="icon text-white-50">
                <i class="fas fa-plus-circle" style="color: #ff3c00; margin-top: 6px; margin-right: 4px"></i>
            </span>
        </a>
        <div id="categoriesDropdownContainer">
            <select name="Categories" id="Categories" class="form-control form-control-sm rounded-5" required>
                <option value="" selected disabled>Select a category</option>
            </select>
        </div>
    </div>
</div>

<script>
    // Add JavaScript to dynamically update categories when clicked
    var categoriesDropdownContainer = document.getElementById('categoriesDropdownContainer');
    var categoriesDropdown = document.getElementById('Categories');

    // Use mousedown event to capture the initial click
    categoriesDropdownContainer.addEventListener('mousedown', function() {
        // Check if categories dropdown is already populated
        if (categoriesDropdown.options.length <= 1) {
            // Populate categories dropdown
            <?php
            $sqlCategories = "SELECT ID, main_category FROM categories";
            $resultCategories = $conn->query($sqlCategories);

            if ($resultCategories->num_rows > 0) {
                while ($rowCategory = $resultCategories->fetch_assoc()) {
                    echo 'var option = document.createElement("option");';
                    echo 'option.value = "' . $rowCategory['main_category'] . '";';
                    echo 'option.text = "' . $rowCategory['main_category'] . '";';
                    echo 'categoriesDropdown.add(option);';
                }
            } else {
                echo 'var option = document.createElement("option");';
                echo 'option.value = "";';
                echo 'option.text = "No categories available";';
                echo 'categoriesDropdown.add(option);';
            }
            ?>
        }
    });
</script>




<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6">
    <div class="form-group">
        <label for="SubCategories" class="control-label">Sub-Category</label>
        <!-- Add new unit modal trigger -->
        <a href="#" data-toggle="modal" data-target="#AddUModal" style="background-color: white; float: right">
            <span class="icon text-white-50">
                <i class="fas fa-plus-circle" style="color: #ff3c00; margin-top: 6px; margin-right: 4px"></i>
            </span>
        </a>
        <select name="SubCategories" id="SubCategories" class="form-control form-control-sm rounded-5" >
            <!-- Placeholder option for subcategories -->
            <option value="" disabled>Select a category first</option>
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
                echo 'if ("' . $rowSubCategory['main_category'] . '" === selectedCategory || "' . $rowSubCategory['main_category'] . '" === "") {';
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


<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6">
    <div class="form-group">
        <label for="Unit" class="control-label">Unit</label>
        
        <!-- Add new unit modal trigger -->
        <a href="#" data-toggle="modal" data-target="#AddUModal" style="background-color: white; float: right">
            <span class="icon text-white-50">
                <i class="fas fa-plus-circle" style="color: #ff3c00; margin-top: 6px; margin-right: 4px"></i>
            </span>
        </a>
        
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


<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6">
    <div class="form-group">
        <label for="Warranty" class="control-label">Warranty(Months)</label>
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



                                <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6">
                                    <div class="form-group">
                                    <label for="Costing" class="control-label">Costing</label>
                                    <input type="number" name="Costing" class="form-control form-control-sm rounded-0" value="1" min="1" max="1000000000" required/>
                                    </div>
                                </div>

                                <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6">
                                    <div class="form-group">
                                    <label for="Price" class="control-label">Price</label>
                                    <input type="number" name="Price" class="form-control form-control-sm rounded-0" value="1" min="1" max="1000000000" required/>
                                    </div>
                                </div>

                                <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6">
                                    <div class="form-group">
                                    <label for="Wholesale" class="control-label">Wholesale</label>
                                    <input type="number" name="Wholesale" class="form-control form-control-sm rounded-0" value="1" min="1" max="1000000000" required/>
                                    </div>
                                </div>

                                <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6">
                                    <div class="form-group">
                                    <label for="Promo" class="control-label">Promo</label>
                                    <input type="number" name="Promo" class="form-control form-control-sm rounded-0" value="1" min="1" max="1000000000" required/>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                    <label for="Seller" class="control-label">Seller</label>
                                    <input type="text" name="Seller" class="form-control form-control-sm rounded-0" />
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
    <div class="form-group">
        <label for="Supplier" class="control-label">Supplier</label>
        <select name="Supplier" class="form-control form-control-sm rounded-5" required>
            
            <?php
            
            $sqlSupplier = "SELECT ID, Supplier_Name FROM suppliers";
            $resultSupplier = $conn->query($sqlSupplier);

            if ($resultSupplier->num_rows > 0) {
                while ($rowSupplier = $resultSupplier->fetch_assoc()) {
                    echo '<option>' . $rowSupplier['Supplier_Name'] . '</option>';
                }
            } else {
                echo '<option value="" disabled>No Suplliers available</option>';
            }
            ?>
        </select>
    </div>
</div>


                                
                    


            




                            </div>

                        <div class="row">
                            <div class="col-md-12">
                                <input type="submit" class="btn btn-success" name="Save" value="Save">
                            </div>
                        </div>
                    </form>

        </div>

                

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

     <!-- Add Modal-->
     <div class="modal fade" id="AddUModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header" style="background-color: #313A46;">
                <h5 class="modal-title" id="exampleModalLabel" style="color: white;">Add Unit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" style="color: white;">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group" id="modal">
                <div id="alert-container"></div>
                    <label>Unit Name: </label>
                    <input type="text" class="form-control form-control-user"
                        id="unitName" name="unitName" style="border-radius: 8px;" maxlength="3"required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" style="border-radius: 8px; font-family: Verdana;">Cancel</button>
                <button type="button" class="btn" onclick="addUnit()" style="background-color: #ff6333; color: white; border-radius: 8px; font-family: Verdana;">Save</a>
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

    <script>
        function addUnit() {
        var unitName = $('#unitName').val();

        $.ajax({
            url: "unitsModalAddSave.php",
            type: 'post',
            data: {
                unitSend: unitName
            },
            success: function(data, status) {
                     
                var alert = $('<div class="alert alert-success alert-dismissible fade show rounded alert-sm" style="font-family: Segoe UI; font-size: 18px;" role="alert">Units added successfully!</div>');

                $('#alert-container').append(alert);

                setTimeout(function() {
                    alert.remove();
                }, 3000);
            },
            error: function(xhr, status, error) {
                console.log("Ajax call failed");
                console.log(xhr);
                console.log(status);
                console.log(error);
            }
        });
    }
    </script>




</body>

</html>