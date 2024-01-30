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
                        

                        <!-- Nav Item - Alerts -->
                        
                        <!-- Nav Item - Messages -->
                        

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

<?php
                           
                            $sql = "select * from athletes";
                            $result = $conn->query($sql);
                            $row = $result->fetch_assoc();






                        ?>



                       
                        <form action = "productsAddSave.php" method="post" enctype="multipart/form-data">
                       
                        <h3><b><?= isset($id) ? "Update product Details" : "Register New Product" ?></b></h3>
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
                            <legend>Product Information</legend>
                            <div class="row">
                                
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                    <label for="Barcode" class="control-label">Barcode</label>
                                    <input type="text" name="Barcode" class="form-control form-control-sm rounded-5"  required/>
                                    </div>
                                </div>

                                

                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                    <label for="Product" class="control-label">Product Name</label>
                                    <input type="text" name="Product"  class="form-control form-control-sm rounded-5"  required/>
                                    </div>
                                </div>
                                
                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                    <label for="Unit" class="control-label">Unit</label>
                                    <a href="#" data-toggle="modal" data-target="#AddUModal" style="background-color: white; float: right">
                                    <span class="icon text-white-50"  >
                                        <i class="fas fa-plus-circle" style="color: #ff3c00; margin-top: 6px; margin-right: 4px"></i>
                                    </span>
                                    </a>
                                    <input type="text" name="Unit" class="form-control form-control-sm rounded-5"  required/>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                    <label for="Categories" class="control-label">Category</label>
                                    <input type="text" name="Categories"  class="form-control form-control-sm rounded-5"  required/>
                                    </div>
                                </div>
                                
                                
                                


                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                    <label for="Costing" class="control-label">Costing</label>
                                    <input type="number" name="Costing" class="form-control form-control-sm form-control-border rounded-5" required>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                    <label for="Price" class="control-label">Price</label>
                                    <input type="number" name="Price" class="form-control form-control-sm form-control-border rounded-5" required>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                    <label for="Wholesale" class="control-label">Wholesale</label>
                                    <input type="number" name="Wholesale" class="form-control form-control-sm form-control-border rounded-5" required>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                    <label for="Promo" class="control-label">Promo</label>
                                    <input type="number" name="Promo" class="form-control form-control-sm form-control-border rounded-5" required>
                                    </div>
                                </div>


                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                    <label for="Seller" class="control-label">Seller</label>
                                    <input type="text" name="Seller" class="form-control form-control-sm form-control-border rounded-5" required>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                    <label for="Supplier" class="control-label">Supplier</label>
                                    <input type="text" name="Supplier" class="form-control form-control-sm form-control-border rounded-5" required>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="Date" class="control-label">Date</label>
                                        <input type="date" name="Date_Registered" id="Date_Registered" class="form-control form-control-sm rounded-0" value="<?php echo isset($date) ? $date : ''; ?>" required/>

                                    </div>
                                </div>

                                



                            </div>

                        <div class="row">
                            <div class="col-md-12">
                                <input type="submit" class="btn btn-success" name="Save" value="Save">
                            </div>
                        </div>
                    </form>



                

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
            <div class="modal-header" style="background-color: #ff3c00;">
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
                        id="unitName" name="unitName" style="border-radius: 8px;">
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