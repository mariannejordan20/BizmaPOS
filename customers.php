<?php
session_start();

include('connection.php');

// Check if the user is logged in
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
$recordsPerPage = 5; // Number of records per page
$page = isset($_GET['page']) ? $_GET['page'] : 1; // Current page number
$offset = ($page - 1) * $recordsPerPage; // Offset for SQL query

$sql = "SELECT ID, Seqcode, IDNumber, Barcode, CustomerName, TermofPayment, VATTIN, ContactPerson, Loc, Contact, Date_Joined FROM customer ORDER BY Seqcode LIMIT $offset, $recordsPerPage";

// Add this block to handle search
if (isset($_GET['search'])) {
    $searchTerm = $_GET['search'];
    $sql = "SELECT ID, Seqcode, IDNumber, Barcode, CustomerName, TermofPayment, VATTIN, ContactPerson, Loc, Contact, Date_Joined FROM customer WHERE CustomerName LIKE '%$searchTerm%' ORDER BY Seqcode LIMIT $offset, $recordsPerPage";
}

// Execute the query
$results = $conn->query($sql);

// Check for errors in the query execution
if (!$results) {
    die("Error in SQL query: " . $conn->error);
}

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
    #customersTable {
        cursor: pointer;
    }

    .customers-section {
        border-radius: 8px; 
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Subtle box-shadow for depth */
        margin-bottom: 20px;
        background-color: #fff; /* Optional: Add a background color */
        transition: box-shadow 0.3s; /* Smooth transition for box-shadow */
    }

    #customersTable {
        width: auto;
        border-spacing: 0;
    }

    #customersTable th,
    #customersTable td {
        text-align: left;
    }

    #customersTable th {
        color: #656565;
        white-space: nowrap;
        font-family: Segoe UI;
        font-size: 14px;
        /* Aligning column names to the left */
        text-align: left;
    }

    #customersTable tbody tr {
        transition: background-color 0.3s;
    }

    #customersTable tbody tr:hover {
        background-color: #ecf0f1; /* Light gray background on hover */
    }

    #customersTable a:hover {
        color: #c0392b; /* Darker red on hover */
    }

    #customersTable tbody tr.active {
        background-color: rgba(254, 60, 0, 0.3); /* Adjust the last value (alpha) for opacity */
    }

    .custom-column-width {
        width: 10%; /* Adjust the width as needed */
        text-align: left;
    }

    .custom-font-size td {
        font-size: 12px;
        white-space: nowrap;
    }

    .table-responsive {
        overflow-x: auto;
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

<?php
include('header.php');
?>


<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php
        include('menu.php');
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
                        <h3 class="card-title"  style="color: #313A46; font-family: Segoe UI; font-weight: bold; margin-bottom: -1px; margin-top:-20px">LIST OF ALL CUSTOMERS</h3>
                            
                        </div>

                        <div class="customers-section">
                            <div class="mb-3 d-flex justify-content-between align-items-center ml-4 mr-4">
                            <form action="customers.php" method="get" class="form-inline mt-3 mb-3">
                            <div class="input-group">
                                <input type="text" name="search" id="searchInput" class="form-control" placeholder="Search" oninput="searchProducts()">
                                <div class="input-group-append">
                                    <button type="submit" class="btn" style="background-color: #fe3c00; color:white">Search</button>
                                </div>
                            </div>
                        </form>
                                <a href ="customeradd.php" class="btn" style="background-color: #fe3c00; color: white;">
                                    <i class="fa fa-plus"></i>
                                </a>
                            </div>
                            <div class="container-fluid">
                                <div class="table-responsive">
                                    <table class="table text-center table-bordered" id="customersTable" width="100%"
                                        cellspacing="0" style="text-align: left;">


                                        <thead>
                                            <tr class="th" style="text-align: left;">
                                                <th class="text-center custom-column-width">ACTION</th>
                                                <th class="text-center custom-column-width">SEQCODE</th>
                                                <th class="text-center custom-column-width">ID NUMBER</th>
                                                <th class="text-center custom-column-width">BARCODE</th>
                                                <th class="text-center custom-column-width">CUSTOMER NAME</th>
                                                <th class="text-center custom-column-width">TERM OF PAYMENT</th>
                                                <th class="text-center custom-column-width">VAT TIN(NOS)</th>
                                                <th class="text-center custom-column-width">CONTACT PERSON</th>
                                                <th class="text-center custom-column-width">ADDRESS</th>
                                                <th class="text-center custom-column-width">CONTACT NO.</th>
                                                <th class="text-center custom-column-width">DATE REGISTERED</th>
                                            </tr>
                                        </thead>
                                        <tbody class="custom-font-size" style="color: #313A46;">

                                            <?php
                                            // Check if there are records in the result set
                                            if ($results && $results->num_rows > 0) {
                                                // Loop through the results
                                                foreach ($results as $result) {
                                                    echo '<tr>
                                                        <td>

                                                        <a class="mr-2" href="#?id=' . $result['ID'] . '" data-bs-toggle="modal" data-bs-target="#customersModal' . $result['ID'] . '"><i class="fa fa-eye"></i></a>
                                                            <a class = "mr-2" href = "customersEdit.php?id=' . $result['ID'] . '">
                                                            <i class = "fa fa-edit"></i>
                                                            </a>

                                                            <a href = "customersDelete.php?id=' . $result['ID'] . '">
                                                            <i class = "fa fa-trash text-danger"></i>
                                                            </a>
                                                        </td>
                                                        <td class="text-truncate">' . strtoupper($result['Seqcode']) . '</td>
                                                        <td class="text-truncate">' . strtoupper($result['IDNumber']) . '</td>
                                                        <td class="text-truncate">' . strtoupper($result['Barcode']) . '</td>
                                                        <td class="text-truncate"  style="max-width: 150px;">' . strtoupper($result['CustomerName']) . '</td>
                                                        <td class="text-truncate">' . strtoupper($result['TermofPayment']) . '</td>
                                                        <td class="text-truncate">' . strtoupper($result['VATTIN']) . '</td>
                                                        <td class="text-truncate">' . strtoupper($result['ContactPerson']) . '</td>
                                                        <td class="text-truncate" style="max-width: 100px;">' . strtoupper($result['Loc']) . '</td>
                                                        <td class="text-truncate">' . strtoupper($result['Contact']) . '</td>
                                                        <td class="text-truncate">' . strtoupper($result['Date_Joined']) . '</td>

                                                    </tr>';
                                                    echo '<div class="modal fade" id="customersModal' . $result['ID'] . '" tabindex="-1" aria-labelledby="customersModal' . $result['ID'] . '" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered modal-md">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title">' . $result['CustomerName'] . '</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">Close</button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        
                                                                        <p><strong>Seqcode:</strong> ' . $result['Seqcode'] . '</p>
                                                                        <p><strong>IDNumber:</strong> ' . $result['IDNumber'] . '</p>
                                                                        <p><strong>Barcode:</strong> ' . $result['Barcode'] . '</p>
                                                                        <p><strong>CustomerName:</strong> ' . $result['CustomerName'] . '</p>
                                                                        <p><strong>TermofPayment Price:</strong> ' . $result['TermofPayment'] . '</p>
                                                                        <p><strong>VATTIN:</strong> ' . $result['VATTIN'] . '</p>
                                                                        <p><strong>ContactPerson:</strong> ' . $result['ContactPerson'] . '</p>
                                                                        <p><strong>Address:</strong> ' . $result['Loc'] . '</p>
                                                                        <p><strong>Contact:</strong> ' . $result['Contact'] . '</p>
                                                                        <p><strong>Date:</strong> ' . $result['Date_Joined'] . '</p>

                        </div>
                    </div>
                </div>
            </div>';
                                                }
                                            } else {
                                                echo "No records found.";
                                            }
                                            ?>

                                        </tbody>

                                    </table>
                                </div>
                            </div>
                            <!-- /.container-fluid -->
                                        </div>
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
                        </div>

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
                <script
                    src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>

                <script src="js/delete.js"></script>

                <?php
                if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
                    ?>
                <script>
                swal({
                    title: "<?php echo $_SESSION['status']; ?>",
                    icon: "<?php echo $_SESSION['status_code']; ?>",
                });
                </script>
                <?php
                unset($_SESSION['status']);
            }
            ?>

<script>
$(document).ready(function() {
    $('#searchInput').on('input', function() {
        var searchTerm = $(this).val().trim();
        if (searchTerm !== '') {
            searchProducts(searchTerm);
        } else {
            loadAllProducts();
        }
    });
});

function searchProducts(searchTerm) {
    $.ajax({
        url: 'searchcus.php',
        type: 'GET',
        data: { search: searchTerm },
        success: function(response) {
            $('#customersTable tbody').html(response);
        },
        error: function(xhr, status, error) {
            console.error('Error:', error);
        }
    });
}

function loadAllProducts() {
    $.ajax({
        url: 'searchcus.php',
        type: 'GET',
        success: function(response) {
            $('#customersTable tbody').html(response);
        },
        error: function(xhr, status, error) {
            console.error('Error:', error);
        }
    });
}

// Initial loading of all products when the page loads
$(document).ready(function() {
    loadAllProducts();
});

</script>
</body>

</html>
