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

    // Add this block to handle search
    if (isset($_GET['search'])) {
        $searchTerm = $_GET['search'];
        $sql = "SELECT ID, Barcode, Product, Warranty, Unit, Quantity, Costing, Price, Wholesale, Promo, Categories, Seller, Supplier, Date_Registered FROM products WHERE Product LIKE '%$searchTerm%' ORDER BY Categories";
        $results = $conn->query($sql);
    } else {
        // Default query without search
        $sql = "SELECT ID, Barcode, Product, Warranty, Unit, Quantity, Costing, Price, Wholesale, Promo, Categories, Seller, Supplier, Date_Registered FROM products ORDER BY Categories";
        $results = $conn->query($sql);
    }
?>


<!DOCTYPE html>
<html lang="en">
<style>
    #productsTable{
        cursor: pointer;
    }
    .products-section {
    border-radius: 8px;
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
        text-align: left;
    }

    #productsTable th {    
        color: #000000  ; /* White text for header */
        white-space: nowrap;
        text-align: left;
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
                <div class="container-fluid" style="padding-left: 2%;">

                <div class="card-header" style="background-color: #eeeeee; border: none">
                    <h3 class="card-title"  style="color: #313A46; margin-bottom: -10px">List of all Products</h3>
                </div>        
                      
                        
                        <div class="products-section">
                            <div class="mb-3 ml-4 d-flex align-items-center">
                                <a href="productsAdd.php" class="btn" style="background-color: #fe3c00; color: white; margin-top:1%">
                                    <i class="fa fa-plus"></i>
                                </a>
                            </div>
                            <form action="products.php" method="get" class="form-inline mb-3 ml-4 d-flex align-items-center" style="padding-top: 25px;">
                                        <div class="form-group">
                                            <input type="text" name="search" id="searchInput" class="form-control mr-2" placeholder="Search">
                                            <button type="submit" class="btn btn-primary">Search</button>
                                        </div>
                                    </form>
                            <div class="container-fluid">
                                <div class="table-responsive">
                                <table class="table text-center table-bordered" id="productsTable" width="100%" cellspacing="0">

                
                                <thead>
                                    <tr class="th" style="color: #000000">
                                        <th class="text-center custom-column-width">Action</th>
                                        <th class="text-center custom-column-width">ID</th>
                                        <th class="text-center custom-column-width">Barcode</th>
                                        <th class="text-center custom-column-width" style="padding-right: 150px;">Product Name</th>
                                        <th class="text-center custom-column-width">Unit</th>
                                        <th class="text-center custom-column-width">Qty</th>
                                        <th class="text-center custom-column-width">Costing</th>
                                        <th class="text-center custom-column-width">Price</th>
                                        <th class="text-center custom-column-width">Wholesale</th>
                                        <th class="text-center custom-column-width">Promo</th>
                                        <th class="text-center custom-column-width">Ctry</th>
                                        <th class="text-center custom-column-width">Seller</th>
                                        <th class="text-center custom-column-width">Supplier</th>
                                        <th class="text-center custom-column-width">Wrty</th>
                                        <th class="text-center custom-column-width">Date Registered</th>
                                    </tr>
                                    
                                </thead>
                                    <tbody class="custom-font-size" style="color: #313A46;">

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
                                                                    <td class="text-truncate" style="max-width: 50px;">' . $result['ID'] . '</td>
                                                                    <td class="text-truncate" style="max-width: 100px;">' . $result['Barcode'] . '</td>
                                                                    <td class="text-truncate" style="max-width: 150px;">' . $result['Product'] . '</td>
                                                                    <td class="text-truncate" style="max-width: 50px;">' . $result['Unit'] . '</td>
                                                                    <td class="text-truncate" style="max-width: 50px;">' . $result['Quantity'] . '</td>
                                                                    <td class="text-truncate" style="max-width: 100px;">' . $result['Costing'] . '</td>
                                                                    <td class="text-truncate" style="max-width: 100px;">' . $result['Price'] . '</td>
                                                                    <td class="text-truncate" style="max-width: 100px;">' . $result['Wholesale'] . '</td>
                                                                    <td class="text-truncate" style="max-width: 100px;">' . $result['Promo'] . '</td>
                                                                    <td class="text-truncate" style="max-width: 75px;">' . $result['Categories'] . '</td>
                                                                    <td class="text-truncate" style="max-width: 100px;">' . $result['Seller'] . '</td>
                                                                    <td class="text-truncate" style="max-width: 100px;">' . $result['Supplier'] . '</td>
                                                                    <td class="text-truncate" style="max-width: 75px;">' . $result['Warranty'] . '</td>
                                                                    <td class="text-truncate" style="max-width: 100px;">' . $result['Date_Registered'] . '</td>
                                                                

                                                            

                                                            </tr>';
                                                            echo '<div class="modal fade" id="productsModal'.$result['ID'].'" tabindex="-1" aria-labelledby="productsModal'.$result['ID'].'" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered modal-md">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" style="white-space: normal; word-wrap: break-word; max-width: 400px;">'.$result['Product'].'</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="font-size: 1.5rem; color: #000; opacity: 0.8; background-color: transparent; border: none;">x</button>
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

<script>
  function searchUnits() {
    var searchTerm = document.getElementById('searchInput').value;
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'searchProducts.php?search=' + encodeURIComponent(searchTerm), true);
    xhr.send();
    xhr.onload = function () {
        if (xhr.status != 200) {
            console.error('Error ' + xhr.status + ': ' + xhr.statusText);
        } else {
            var searchResultsDiv = document.getElementById('searchResults');
            searchResultsDiv.innerHTML = xhr.responseText;

            // Set text color for search result rows
            var searchResultRows = searchResultsDiv.getElementsByTagName('tr');
            for (var i = 0; i < searchResultRows.length; i++) {
                searchResultRows[i].style.color = '#313A46';
            }
        }
    };
}

    </script>
</body>

</html>