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

    $sql = "select ID, Barcode,Quantity,ItemType, Product,Unit,Costing,Price,Wholesale,Promo,Categories, Seller , Supplier, Date_Registered from products order by Categories";
    $results = $conn->query($sql);
?>


<!DOCTYPE html>
<html lang="en">
<style>
    #stockoutTable{
        cursor: pointer;
    }
    .stockout-section {
    border-radius: 8px;
    padding: 20px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Subtle box-shadow for depth */
    margin-bottom: 20px;
    background-color: #fff; /* Optional: Add a background color */
    transition: box-shadow 0.3s; /* Smooth transition for box-shadow */
    }
    #stockoutTable {
        width: 100%  ;
        border-spacing: 0  ;
    }

    #stockoutTable th,
    #stockoutTable td {
        padding: 12px  ;
        text-align: left  ;
    }

    #stockoutTable th {    
        color: #656565 ; 
        white-space: nowrap;
        font-family: Segoe UI;
        font-size: 12px;
        text-align: left;
    }

    #stockoutTable tbody tr {
        transition: background-color 0.3s  ;
    }

    #stockoutTable tbody tr:hover {
        background-color: #ecf0f1  ; /* Light gray background on hover */
    }

    #stockoutTable a:hover {
        color: #c0392b; /* Darker red on hover */
    }
    #stockoutTable tbody tr.active {
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
                <div class="container-fluid">

                    
    <div class="card-header" style="background-color: #eeeeee; border: none">
        <h3 class="card-title" style="color: #313A46; font-family: Segoe UI; font-weight: bold;">STOCK OUT</h3>       
    </div>

    <div class="stockout-section">
    <div class="mb-3 d-flex justify-content-between align-items-center ml-4 mr-4">
                    <form action="products.php" method="get" class="form-inline mt-3 mb-3">
                            <div class="input-group">
                                <input type="text" name="search" id="searchInput" class="form-control" placeholder="Search" oninput="searchProducts()">
                                <div class="input-group-append">
                                    <button type="submit" class="btn" style="background-color: #fe3c00; color:white">Search</button>
                                </div>
                            </div>
                        </form>
            <a href ="productsAdd.php" class="btn" style="background-color: #fe3c00; color: white;">
                <i class="fa fa-plus"></i>
            </a>
        </div>
        <div class="container-fluid">
            <div class="table-responsive">
            <table class="table text-center table-bordered" id="stockoutTable" width="100%" cellspacing="0">

                
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
                <tbody class="custom-font-size" style="color: #313A46;">

                <?php
                                foreach ($results as $result) {
                                    echo '<tr>
                                            <td>

                                            
                                                <a class = "mr-2" href = "stocksOutEdit.php?id='.$result['ID'].'">
                                                <i class = "fa fa-edit"></i>
                                                </a>

                                            </td>
                                            <td>'.strtoupper($result['Barcode']).'</td>
                                            <td class="text-truncate" style="max-width: 150px;">'.strtoupper($result['Product']).'</td>
                                            <td>'.strtoupper($result['ItemType']).'</td>
                                            <td>'.strtoupper($result['Unit']).'</td>
                                            <td>'.strtoupper($result['Quantity']).'</td>
                                            <td>'.strtoupper($result['Costing']).'</td>
                                            <td>'.strtoupper($result['Price']).'</td>
                                            <td>'.strtoupper($result['Wholesale']).'</td>
                                            <td>'.strtoupper($result['Promo']).'</td>
                                            <td class="text-truncate" style="max-width: 75px;">'.strtoupper($result['Categories']).'</td>
                                            <td class="text-truncate" style="max-width: 100px;">'.strtoupper($result['Seller']).'</td>
                                            <td class="text-truncate" style="max-width: 100px;">'.strtoupper($result['Supplier']).'</td>
                                            <td class="text-truncate" style="max-width: 100px;">'.strtoupper($result['Date_Registered']).'</td>
                                            

                                           

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