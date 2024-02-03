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

    $sql = "select ID, Barcode, Product,Warranty,Unit,Quantity,Costing,Price,Wholesale,Promo,Categories, Seller , Supplier, Date_Registered from products order by Categories";
    $results = $conn->query($sql);
?>


<!DOCTYPE html>
<html lang="en">
<style>
    #productsTable{
        cursor: pointer;
    }
    .products-section {
    border-radius: 8px;
    padding: 20px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Subtle box-shadow for depth */
    margin-bottom: 20px;
    background-color: #fff; /* Optional: Add a background color */
    transition: box-shadow 0.3s; /* Smooth transition for box-shadow */
    }
    #productsTable {
        width: 100%  ;
        border-spacing: 0  ;
    }

    #productsTable th,
    #productsTable td {
        padding: 12px  ;
        text-align: center  ;
    }

    #productsTable th {    
        color: #fff  ; /* White text for header */
    }

    #productsTable tbody tr {
        transition: background-color 0.3s  ;
    }

    #productsTable tbody tr:hover {
        background-color: #ecf0f1  ; /* Light gray background on hover */
    }

    #productsTable a:hover {
        color: #c0392b; /* Darker red on hover */
    }
    #productsTable tbody tr.active {
        background-color: rgba(254, 60, 0, 0.3); /* Adjust the last value (alpha) for opacity */
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

                <div class="card-header" style="background-color: #eeeeee; border: none">
                    <h3 class="card-title"  style="color: #313A46; margin-bottom: -10px">List of all Products</h3>
                </div>        
                      
                        
                        <div class="products-section">
                            <div class="mb-3 ml-4 d-flex align-items-center">
                                <a href="productsAdd.php" class="btn" style="background-color: #fe3c00; color: white;">
                                    <i class="fa fa-plus"></i>
                                </a>
                            </div>
                            <div class="container-fluid">
                                <div class="table-responsive">
                                <table class="table text-center" id="productsTable" width="100%" cellspacing="0">

                
                                    <thead>
                                        <tr class="text-white" style="background-color: #2D333C">
                                        
                                            <th class="text-center">Action</th>
                                            <th class="text-center">Barcode</th>
                                            <th class="text-center">Product Name</th>
                                            <th class="text-center">Unit</th>
                                            <th class="text-center">Warranty</th>
                                            <th class="text-center">Quantity</th>
                                            <th class="text-center">Costing</th>
                                            <th class="text-center">Price</th>
                                            <th class="text-center">Wholesale</th>
                                            <th class="text-center">Promo</th>
                                            <th class="text-center">Categories</th>
                                            <th class="text-center">Seller</th>
                                            <th class="text-center">Supplier</th>
                                            <th class="text-center">Date Registered</th>
       
                                        </tr>
                                    </thead>
                                    <tbody style="color: #313A46;">

                                    <?php
                                                    foreach ($results as $result) {
                                                        echo '<tr>
                                                                <td>

                                                                <a class="mr-2" href="#?id='.$result['ID'].'" data-bs-toggle="modal" data-bs-target="#productsModal'.$result['ID'].'"><i class="fa fa-eye"></i></a>
                                                                    <a class = "mr-2" href = "productsEdit.php?id='.$result['ID'].'">
                                                                    <i class = "fa fa-edit"></i>
                                                                    </a>

                                                                    <a href = "productsDelete.php?id='.$result['ID'].'">
                                                                    <i class = "fa fa-trash text-danger"></i>
                                                                    </a>


                                                                </td>
                                                                <td>'.$result['Barcode'].'</td>
                                                                <td>'.$result['Product'].'</td>
                                                                <td>'.$result['Unit'].'</td>
                                                                <td>'.$result['Warranty'].'</td>
                                                                <td>'.$result['Quantity'].'</td>
                                                                <td>'.$result['Costing'].'</td>
                                                                <td>'.$result['Price'].'</td>
                                                                <td>'.$result['Wholesale'].'</td>
                                                                <td>'.$result['Promo'].'</td>
                                                                <td>'.$result['Categories'].'</td>
                                                                <td>'.$result['Seller'].'</td>
                                                                <td>'.$result['Supplier'].'</td>
                                                                <td>'.$result['Date_Registered'].'</td>
                                                                

                                                            

                                                            </tr>';
                                                            echo '<div class="modal fade" id="productsModal'.$result['ID'].'" tabindex="-1" aria-labelledby="productsModal'.$result['ID'].'" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-md">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">'.$result['Product'].'</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">Close</button>
                                            </div>
                                            <div class="modal-body">
                                                
                                                <p><strong>Barcode:</strong> '.$result['Barcode'].'</p>
                                                <p><strong>Unit:</strong> '.$result['Unit'].'</p>
                                                <p><strong>Costing:</strong> '.$result['Costing'].'</p>
                                                <p><strong>Price:</strong> '.$result['Price'].'</p>
                                                <p><strong>Wholesale Price:</strong> '.$result['Wholesale'].'</p>
                                                <p><strong>Promo Price:</strong> '.$result['Promo'].'</p>
                                                <p><strong>Category:</strong> '.$result['Categories'].'</p>
                                                
                                                <p><strong>Seller:</strong> '.$result['Seller'].'</p>
                                                <p><strong>Supplier:</strong> '.$result['Supplier'].'</p>
                                                <p><strong>Date:</strong> '.$result['Date_Registered'].'</p>
                                                
                                            
                                                
                                                

                                            </div>
                                        </div>
                                    </div>
                                </div>';
                                                    }

                                                ?>
                                            </tbody>

                                    </div>     
                                    </div>
                                    <!-- /.container-fluid -->

                                </div>
                                <!-- End of Main Content -->

                                
                            
                            <!-- End of Content Wrapper -->
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