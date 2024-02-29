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
// Define pagination variables
$recordsPerPage = 10; // Number of records per page
$page = isset($_GET['page']) ? $_GET['page'] : 1; // Current page number
$offset = ($page - 1) * $recordsPerPage; // Offset for SQL query

$categoryName = ''; // Initialize $cate variable

// Fetch distinct categories from the products table
$query = "SELECT DISTINCT Categories FROM products";
$result = $conn->query($query);

if ($result) {
    while ($row = $result->fetch_assoc()) {
        $categories[] = $row['Categories'];
    }
}

if (isset($_GET['category'])) {
    $selectedCategory = $_GET['category'];

    if (in_array($selectedCategory, $categories)) {
        // Use the selected category in the query
        $sql = "SELECT ID, Barcode, Product, Unit,Quantity, Costing, Price, Wholesale, Promo, Categories, Seller, Supplier, Date_Registered FROM products WHERE Categories = '$selectedCategory' ORDER BY Categories";
        $categoryName = $selectedCategory;
    } else {
        // Handle invalid category
        echo "Invalid category selected.";
        exit;
    }
} else {
    // Default query if no category is specified
    $sql = "SELECT ID, Barcode, Product, Unit,Quantity, Costing, Price, Wholesale, Promo, Categories, Seller, Supplier, Date_Registered FROM products ORDER BY Categories";
}

$results = $conn->query($sql);

// Get total number of records
$totalRecordsQuery = "SELECT COUNT(*) AS total FROM customer";
$totalRecordsResult = $conn->query($totalRecordsQuery);
$totalRecords = $totalRecordsResult->fetch_assoc()['total'];

// Calculate total pages
$totalPages = ceil($totalRecords / $recordsPerPage);
?>

<!DOCTYPE html>
<html lang="en">
<style>
    .stocks-section {
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Subtle box-shadow for depth */
    margin-bottom: 20px;
    background-color: #fff; /* Optional: Add a background color */
    transition: box-shadow 0.3s; /* Smooth transition for box-shadow */
    }
    #stocksTable {
        width: 100%  ;
        border-spacing: 0  ;
    }
    #stocksTable th {
            position: sticky;
            top: 0;
            background-color: #fff;
            z-index: 1;
        }

        /* Add this style for the table container */
        .table-container {
            overflow-x: auto;
            max-height: 500px;
            overflow-y: scroll;
        }

        /* Add this style for the container of the table */
        .table-container table {
            border-collapse: collapse;
            width: 100%;
        }

        /* Add this style for the container of the table */
        .table-container th, .table-container td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        /* Add this style for the container of the table */
        .table-container tbody tr:hover {
            background-color: #f2f2f2;
        }

    

    #stocksTable th,
    #stocksTable td {
        padding: 10px  ;
        text-align: left;
    }

    .copy-button {
        padding: 5px 10px;
        background-color: #007bff;
        color: white;
        border: none;
        cursor: pointer;
    }
    #stocksTable th {    
        color: #656565  ; /* White text for header */
        white-space: nowrap;
        font-family: Segoe UI;
        font-size: 12px;
    }

    #stocksTable tbody tr {
        transition: background-color 0.3s  ;
    }

    #stocksTable tbody tr:hover {
        background-color: #ecf0f1  ; /* Light gray background on hover */
    }

    #stocksTable a:hover {
        color: #c0392b; /* Darker red on hover */
    }
    #stocksTable tbody tr.active {
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
    /* Default styles for the search bar */
    .input-group {
        margin-bottom: 15px;
    }

    #searchInput {
        max-width: 100%;
        width: 100%;
    }

/* Responsive styles using media queries */
@media (max-width: 576px) {
    /* Adjust styles for phones */
    .modal-dialog {
        margin: 0;
        width: 100vw; /* Full width of the viewport */
        max-width: none; /* Remove any maximum width */
        height: 100vh; /* Full height of the viewport */
        max-height: none; /* Remove any maximum height */
    }
    
    

    .modal-content {
        height: 80%; /* Full height of the modal content */
    }

    .modal-body {
        max-height: calc(100vh - 56px); /* Adjust as needed, considering modal header height */
        overflow-y: auto; /* Enable vertical scrolling if content exceeds the height */
    }

    .modal-body #noteContent {
        width: 100%;
        height: calc(100vh - 200px); /* Adjust as needed */
    }

    .searchAdjust {
        max-width: 300px; /* Set a specific max-width for phones */
        width: 100%; /* Allow it to take full width if needed */
        display: flex; /* Use flexbox layout */
        align-items: center; /* Center items vertically */
    }

    .note {
        margin-left: 10px; /* Adjust margin for the button */
    }
}



    @media (min-width: 614px) {
        /* Adjust styles for phones and larger screens */
        .searchAdjust {
            max-width: 400px;  /* Set a specific max-width for phones */
            width: 100%;      /* Allow it to take full width if needed */
            display: flex; /* Use flexbox layout */
    align-items: center; /* Center items vertically */
        }
    }

    @media (min-width: 1000px) {

        .modal-body {
        max-height: calc(100vh - 100px); /* Adjust as needed, considering modal header height */
        overflow-y: auto; /* Enable vertical scrolling if content exceeds the height */
    }
    .modal-body #noteContent {
        height: calc(100vh - 280px); /* Adjust as needed */
    }
        /* Adjust styles for PCs and larger screens */
        .searchAdjust {
            max-width: 480px;  /* Set a specific max-width for PCs */
            width: 100%;      /* Allow it to take full width if needed */
            display: flex; /* Use flexbox layout */
    align-items: center; /* Center items vertically */
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
    .note {
    display: inline-block; /* Display the button inline */
    margin-left: 5px; /* Add some spacing between input and button */
}

/* Adjustments for smaller screens */
@media (max-width: 768px) {
    .searchAdjust {
        flex-direction: row; /* Keep elements in a row on smaller screens */
        align-items: center; /* Center items vertically */
    }
    .modal-body {
        max-height: calc(100vh - 100px); /* Adjust as needed, considering modal header height */
        overflow-y: auto; /* Enable vertical scrolling if content exceeds the height */
    }
    .modal-body #noteContent {
        height: calc(100vh - 280px); /* Adjust as needed */
    }

    .note {
        margin-left: 10px; /* Adjust margin for the button */
        margin-top: 0; /* Reset margin top */
    }
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
                <div class="container-fluid"  style="padding-left: 2%;">

                    
    <div class="card-header"  style="background-color: #eeeeee; border: none">
        <h3 class="card-title" style="color: #313A46; font-family: Segoe UI; font-weight: bold;">LIST OF PRODUCTS IN <?php echo $categoryName;?> CATEGORY </h3>
    </div>

    <div class="stocks-section">
    <div class="mb-3 d-flex justify-content-between align-items-center ml-4 mr-4">
                            <form action="products.php" method="get" class="searchAdjust form-inline mt-3 mb-3">
                                <div class=" searchAdjust">
                                    <input type="text" name="search" id="searchInput" class="searchAdjust form-control" placeholder="Search" oninput="searchProducts()">
                                    <button type="button" class="btn note btn-success" data-toggle="modal" data-target="#NoteModal" onclick="editNote()">
                            <i class="fa fa-sticky-note-o danger"></i>
                        </button>
                                        
                                </div>
                                
                            </form>
            <a href ="productsAdd.php" class="btn btn-success" style="color: white;">
                <i class="fa fa-plus"></i>
            </a>
        </div>
        <div class="card-body">
        <div class="container-fluid">
            <div class="table-responsive" style="max-height: 340px; overflow-y: scroll;">
                <table class="table text-center table-bordered" id="stocksTable" width="100%" cellspacing="0">

                
                <thead>
                    <tr class="th" style="color: #000000">
                    
                        <th class="text-center custom-column-width">ACTION</th>
                        <th class="text-center custom-column-width">BARCODE</th>
                        <th class="text-center custom-column-width">PRODUCT NAME</th>
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

                                            <a class="mr-2" href="#?id='.$result['ID'].'" data-bs-toggle="modal" data-bs-target="#productsModal'.$result['ID'].'"><i class="fa fa-eye"></i></a>
                                                <a class = "mr-2" href = "productsEdit.php?id='.$result['ID'].'">
                                                <i class = "fa fa-edit"></i>
                                                </a>

                                                <a href = "productsDelete.php?id='.$result['ID'].'">
                                                <i class = "fa fa-trash text-danger"></i>
                                                </a>


                                            </td>
                                            <td class="text-truncate">'.strtoupper($result['Barcode']).'</td>
                                            <td class="text-truncate" style="max-width: 100px;">'.strtoupper($result['Product']).'</td>
                                            <td class="text-truncate" style="max-width: 150px;">'.strtoupper($result['Unit']).'</td>
                                            <td class="text-truncate">'.strtoupper($result['Quantity']).'</td>
                                            <td class="text-truncate">'.strtoupper($result['Costing']).'</td>
                                            <td class="text-truncate">'.strtoupper($result['Price']).'</td>
                                            <td class="text-truncate">'.strtoupper($result['Wholesale']).'</td>
                                            <td class="text-truncate">'.strtoupper($result['Promo']).'</td>
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
                    </table>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-end mt-3">
        <ul class="pagination">
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