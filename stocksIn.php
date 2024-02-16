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
    $recordsPerPage = 7; // Number of records per page
    $page = isset($_GET['page']) ? $_GET['page'] : 1; // Current page number
    $offset = ($page - 1) * $recordsPerPage; // Offset for SQL query

    $sql = "select ID, Barcode,Quantity,ItemType, Product,Unit,Costing,Price,Wholesale,Promo,Categories, Seller , Supplier, Date_Registered from products order by Categories LIMIT $offset, $recordsPerPage";
    $results = $conn->query($sql);

    $totalRecordsQuery = "SELECT COUNT(*) AS total FROM products"; // Fixed table name
    $totalRecordsResult = $conn->query($totalRecordsQuery);
    $totalRecords = $totalRecordsResult->fetch_assoc()['total'];

    // Calculate total pages
    $totalPages = ceil($totalRecords / $recordsPerPage);

    // Ensure $page is within valid range
    if ($page < 1) {
        $page = 1;
    } elseif ($page > $totalPages) {
        $page = $totalPages;
    }
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

    .pagination {
        display: flex;
        list-style: none;
        padding-right: 3%;
    }

    .pagination a {
        display: inline-block;
        padding: 8px 16px;
        text-decoration: none;
        color: #333;
        margin: 0 4px;
        border-radius: 4px;
    }

    .pagination a.active,
    .pagination a:active,
    .pagination a:hover {
        background-color: #fe3c00;
        color: #fff;
    }


</style>
<?php include('header.php'); ?>
<body id="page-top">
    <div id="wrapper">
        <?php include ('menu.php'); ?>
        <div id="content-wrapper" class="d-flex flex-column" style="background-color: #eeeeee;">
            <div id="content">
                <?php include('navbar.php'); ?>
                <div class="container-fluid">
                    <div class="card-header" style="background-color: #eeeeee; border: none">
                        <h3 class="card-title" style="color: #313A46; font-family: Segoe UI; font-weight: bold;">STOCK IN</h3>
                    </div>
                    <div class="card-body">
                        <div class="stocksin-section">
                        <div class="mb-3 d-flex justify-content-between align-items-center ml-4 mr-4">
                            <form action="products.php" method="get" class="searchAdjust form-inline mt-3 mb-3">
                            <div class=" searchAdjust">
                            <input type="text" name="search" id="searchInput" class="searchAdjust form-control" placeholder="Search" oninput="searchProducts()">
                            </div>
                        </form>
            <a href ="productsAdd.php" class="btn" style="background-color: #fe3c00; color: white;">
                <i class="fa fa-plus"></i>
            </a>
        </div>
        <div class="container-fluid">
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
                <tbody class="custom-font-size" style="color: #313A46;">

                <?php
                                foreach ($results as $result) {
                                    echo '<tr>
                            <td>';
                        // Check if the item's type is "W/ Serial"
                        if ($result['ItemType'] == 'W/ SERIAL') {
                            // Change the link to "stocksInSerial.php"
                            echo '<a class="mr-2" href="stocksInSerial.php?id='.$result['ID'].'">
                                    <i class="fa fa-edit"></i>
                                </a>';
                        }elseif ($result['ItemType'] == 'W/ EXPIRY') {
                            echo '<a class="mr-2" href="stocksInExpiry.php?id='.$result['ID'].'">
                                    <i class="fa fa-edit"></i>
                                </a>';

                        } else {
                            // Use the default link "stocksInEdit.php"
                            echo '<a class="mr-2" href="stocksInEdit.php?id='.$result['ID'].'">
                                    <i class="fa fa-edit"></i>
                                </a>';
                        }
                        echo '</td>
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
                            <td class="text-truncate" style="max-width: 100px;">'.strtoupper($result['Date_Registered']).'</td>';



                            '</tr>';

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
                                    </div> ';

                                    
                                }
                                

                            ?>
                        </tbody>
                            </div>
                        </div>     
                    </div>
                    <div class="d-flex justify-content-end mt-3">
                            <ul class="pagination">
                                <?php
                                for ($i = 1; $i <= $totalPages; $i++) {
                                    echo '<li class="' . ($i == $page ? 'active' : '') . '"><a class="page-link" style="background-color: ' . ($i == $page ? '#fe3c00; color: white;' : '') . '" href="?page=' . $i . '">' . $i . '</a></li>';
                                }
                                ?>
                            </ul>
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

<!-- Include this script at the bottom of your HTML, before the closing </body> tag -->
<script>
    // Function to filter the table rows based on user input
    function searchProducts() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("searchInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("stocksinTable");
        tr = table.getElementsByTagName("tr");

        // Loop through all table rows
        for (i = 0; i < tr.length; i++) {
            // Assuming product name is in the third column, barcode in the second column, and date in the last column
            var productName = tr[i].getElementsByTagName("td")[2];
            var barcode = tr[i].getElementsByTagName("td")[1];
            var date = tr[i].getElementsByTagName("td")[13];

            if (productName || barcode || date) {
                var productNameValue = productName.textContent || productName.innerText;
                var barcodeValue = barcode.textContent || barcode.innerText;
                var dateValue = date.textContent || date.innerText;
                
                // Check if any of the values match the filter
                if (productNameValue.toUpperCase().indexOf(filter) > -1 || 
                    barcodeValue.toUpperCase().indexOf(filter) > -1 ||
                    dateValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }

    // Add event listener to the search input field
    document.getElementById("searchInput").addEventListener("input", searchProducts);
</script>





</body>

</html>