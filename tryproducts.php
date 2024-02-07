<?php
session_start();

include('connection.php');

// Fetch distinct units
$sqlUnits = "SELECT DISTINCT unit_name FROM units";
$resultUnits = $conn->query($sqlUnits);
$units = array();
while ($row = $resultUnits->fetch_assoc()) {
    $units[] = $row['unit_name'];
}

// Fetch distinct categories
$sqlCategories = "SELECT DISTINCT Categories FROM products";
$resultCategories = $conn->query($sqlCategories);
$categories = array();
while ($row = $resultCategories->fetch_assoc()) {
    $categories[] = $row['Categories'];
}

// Fetch distinct subcategories
$sqlSubcategories = "SELECT DISTINCT SubCategory FROM products";
$resultSubcategories = $conn->query($sqlSubcategories);
$subcategories = array();
while ($row = $resultSubcategories->fetch_assoc()) {
    $subcategories[] = $row['SubCategory'];
}

// Handle pagination
$recordsPerPage = 10; // Adjust the number of records per page as needed
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($page - 1) * $recordsPerPage;

if (isset($_SESSION['hasLog'])) {
    $haslog = $_SESSION['hasLog'];
} else {
    $haslog = 0;
}

if (empty($haslog)) {
    header("location: login.php");
    exit;
}

// Handle pagination
$sql = "SELECT ID, Barcode, Product, Warranty, Unit, Quantity, Costing, Price, Wholesale, Promo, Categories, SubCategory, Seller, Supplier, Date_Registered FROM products ORDER BY Categories LIMIT $offset, $recordsPerPage";
$results = $conn->query($sql);

// Add this block to handle search
if (isset($_GET['search'])) {
    $searchTerm = $_GET['search'];
    $sql = "SELECT ID, Barcode, Product, Warranty, Unit, Quantity, Costing, Price, Wholesale, Promo, Categories, SubCategory, Seller, Supplier, Date_Registered FROM products WHERE Product LIKE '%$searchTerm%' ORDER BY Categories LIMIT $offset, $recordsPerPage";
    $results = $conn->query($sql);
} else {
    // Default query without search
    $sql = "SELECT ID, Barcode, Product, Warranty, Unit, Quantity, Costing, Price, Wholesale, Promo, Categories, SubCategory, Seller, Supplier, Date_Registered FROM products ORDER BY Categories LIMIT $offset, $recordsPerPage";
    $results = $conn->query($sql);
}

$totalRecordsQuery = "SELECT COUNT(*) as totalRecords FROM products";
$totalRecordsResult = $conn->query($totalRecordsQuery);
$totalRecords = $totalRecordsResult->fetch_assoc()['totalRecords'];

$totalPages = ceil($totalRecords / $recordsPerPage);

include('header.php');
?>



<!DOCTYPE html>
<html lang="en">
<style>
    body {
            font-family: 'Rubik', sans-serif;
        }
    .card-title {
            font-weight: 400;
        }
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
        padding: 10px  ;
        text-align: left;
    }

    #productsTable th {    
        color: #656565  ; /* White text for header */
        white-space: nowrap;
        font-family: Segoe UI;
        text-align: left;
        font-size: 14px;
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
.btn {
    padding-left: 1000px;
}
.pagination {
        display: flex;
        list-style: none;
        padding: 0;
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
                    <h3 class="card-title"  style="color: #313A46; font-family: Segoe UI; font-weight: bold; margin-bottom: -1px; margin-top:-20px">LIST OF ALL PRODUCTS</h3>
                </div>        
                      
                        
                <div class="products-section">
                        <div class="mb-3 d-flex justify-content-between align-items-center ml-4 mr-4">
                        <form action="products.php" method="get" class="form-inline mt-3 mb-3">
                            <div class="input-group">
                                <input type="text" name="search" id="searchInput" class="form-control" placeholder="Search" oninput="searchProducts()">
                                <div class="input-group-append">
                                    <button type="submit" class="btn" style="background-color: #fe3c00; color:white">Search</button>
                                </div>
                            </div>
                        </form>
                            <a href="productsAdd.php" class="btn" style="background-color: #fe3c00; color: white;">
                                <i class="fa fa-plus"></i>
                            </a>
                        </div>

                        <div class="container-fluid">
                            <div class="table-responsive" id="searchResults">
                                <table class="table text-center table-bordered" id="productsTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr class="th" style="color: #000000">
                                            <th class="text-center custom-column-width">ACTION</th>
                                            <th class="text-center custom-column-width">ID</th>
                                            <th class="text-center custom-column-width">BARCODE</th>
                                            <th class="text-center custom-column-width" style="padding-right: 150px;">PRODUCT NAME</th>
                                            <th class="text-center custom-column-width"> 
                                            <form class="form-inline mt-3 mb-3">
                                            <div class="dropdown mr-2">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="unitDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Select Unit
        </button>
        <div class="dropdown-menu" aria-labelledby="unitDropdown">
            <?php foreach ($units as $unit): ?>
                <a class="dropdown-item" href="#" onclick="selectOptionAndSearch('unit', '<?php echo $unit; ?>')"><?php echo $unit; ?></a>
            <?php endforeach; ?>
        </div>
    </div>

    </form></th>
                                            <th class="text-center custom-column-width">QTY</th>
                                            <th class="text-center custom-column-width">COSTING</th>
                                            <th class="text-center custom-column-width">PRICE</th>
                                            <th class="text-center custom-column-width">WHOLESALE</th>
                                            <th class="text-center custom-column-width">PROMO</th>
                                            <th class="text-center custom-column-width">CAT</th>
                                            <th class="text-center custom-column-width">S-CAT</th>
                                            <th class="text-center custom-column-width">SELLER</th>
                                            <th class="text-center custom-column-width">SUPPLIER</th>
                                            <th class="text-center custom-column-width">WRTY</th>
                                            <th class="text-center custom-column-width">DATE REGISTERED</th>
                                            <!-- Add your other table headers here -->
                                            <!-- ... -->
                                        </tr>
                                    </thead>
                                    <tbody class="custom-font-size" style="color: #313A46;">
    <?php
    if (!empty($results) && (is_array($results) || is_object($results))) {
        foreach ($results as $result) {
            echo '<tr>
                    <td>
                        <a class="mr-2" href="#?id=' . $result['ID'] . '" data-bs-toggle="modal" data-bs-target="#productsModal' . $result['ID'] . '"><i class="fa fa-eye"></i></a>
                        <a class="mr-2" href="productsEdit.php?id=' . $result['ID'] . '"><i class="fa fa-edit"></i></a>
                        <a href="productsDelete.php?id=' . $result['ID'] . '"><i class="fa fa-trash text-danger"></i></a>
                    </td>
                    <td class="text-truncate" style="max-width: 50px;">'  .$result['ID'] . '</td>
                    <td class="text-truncate" style="max-width: 100px;">' . $result['Barcode'] . '</td>
                    <td class="text-truncate" style="max-width: 150px;">' .strtoupper ($result['Product']) . '</td>
                    <td class="text-truncate" style="max-width: 50px;">' . $result['Unit'] . '</td>
                    <td class="text-truncate" style="max-width: 50px;">' . $result['Quantity'] . '</td>
                    <td class="text-truncate" style="max-width: 100px;">' . $result['Costing'] . '</td>
                    <td class="text-truncate" style="max-width: 100px;">' . $result['Price'] . '</td>
                    <td class="text-truncate" style="max-width: 100px;">' . $result['Wholesale'] . '</td>
                    <td class="text-truncate" style="max-width: 100px;">' . $result['Promo'] . '</td>
                    <td class="text-truncate" style="max-width: 100px;">' . $result['Categories'] . '</td>
                    <td class="text-truncate" style="max-width: 100px;">' . $result['SubCategory'] . '</td>
                    <td class="text-truncate" style="max-width: 100px;">' .strtoupper ($result['Seller']) . '</td>
                    <td class="text-truncate" style="max-width: 100px;">' .strtoupper ($result['Supplier']) . '</td>
                    <td class="text-truncate" style="max-width: 75px;">' . (isset($result['Warranty']) ? $result['Warranty'] : '') . '</td>
                    <td class="text-truncate" style="max-width: 75px;">' . $result['Date_Registered'] . '</td>
                </tr>';
            // Output the modal code for each result
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
                                <p><strong>Warranty:</strong> '.$result['Warranty'].'</p>
                                <p><strong>Date:</strong> '.$result['Date_Registered'].'</p>
                            </div>
                        </div>
                    </div>
                </div>';
        }
    } else {
        // Handle the case when $results is empty or not an array/object
        echo '<tr><td colspan="16" class="text-center">No records found</td></tr>';
    }
    ?>
</tbody>

                                </table>

                                <!-- Pagination links -->

                            </div>
                        </div>
                                    <!-- /.container-fluid -->

                                </div>
                                <!-- End of Main Content -->
                                <div class="d-flex justify-content-end mt-3">
                                    <ul class="pagination">
                                        <?php
                                        for ($i = 1; $i <= $totalPages; $i++) {
                                            echo '<li class="' . ($i == $page ? 'active' : '') . '"><a class="page-link" style="background-color: ' . ($i == $page ? '#fe3c00; color: white;' : '') . '" href="?page=' . $i . '">' . $i . '</a></li>';
                                        }
                                        ?>
                                    </ul>
                                </div>

                                
                            
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
$(document).ready(function() {
    $('#searchInput').on('keyup', function() {
        var searchTerm = $(this).val().trim();
        if (searchTerm !== '') {
            searchProducts(searchTerm);
        } else {
            // If the search term is empty, load all products
            loadAllProducts();
        }
    });
});

function searchProducts(searchTerm) {
    $.ajax({
        url: 'searchProducts.php',
        type: 'GET',
        data: { search: searchTerm },
        success: function(response) {
            $('#searchResults').html(response);

            // Set text color for search result rows
            $('#searchResults tr').css('color', '#313A46');
        },
        error: function(xhr, status, error) {
            console.error('Error:', error);
        }
    });
}

function loadAllProducts() {
    $.ajax({
        url: 'searchProducts.php',
        type: 'GET',
        success: function(response) {
            $('#searchResults').html(response);

            // Set text color for search result rows
            $('#searchResults tr').css('color', '#313A46');
        },
        error: function(xhr, status, error) {
            console.error('Error:', error);
        }
    });
}
</script>
</body>

</html>

<script>
    function selectOptionAndSearch(inputName, value) {
        // Update the hidden input field with the selected value
        document.getElementById(inputName).value = value;

        // Call the searchProducts function passing the selected value
        searchProducts();
    }

    function searchProducts() {
        // Get the search term from the input field
        var searchTerm = document.getElementById('searchInput').value.trim();

        // Send an AJAX request to searchProducts.php passing the search term
        $.ajax({
            url: 'searchProducts.php',
            type: 'GET',
            data: { search: searchTerm },
            success: function(response) {
                // Update the search results section with the response
                $('#searchResults').html(response);

                // Set text color for search result rows
                $('#searchResults tr').css('color', '#313A46');
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
            }
        });
    }
</script>
