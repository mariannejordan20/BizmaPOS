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

// SQL query to retrieve data from the 'customer' table
$sql = "SELECT ID,Supplier_Name,Contact,Loc, Date_Added FROM suppliers ORDER BY Date_Added desc";


// Execute the query
$results = $conn->query($sql);

// Check for errors in the query execution
if (!$results) {
    die("Error in SQL query: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="en">
<style>
    #customersTable{
        cursor: pointer;
    }
    .customers-section {
    border-radius: 8px;
    padding: 20px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Subtle box-shadow for depth */
    margin-bottom: 20px;
    background-color: #fff; /* Optional: Add a background color */
    transition: box-shadow 0.3s; /* Smooth transition for box-shadow */
    }
    #customersTable {
        width: 100%  ;
        border-spacing: 0  ;
    }

    #customersTable th,
    #customersTable td {
        padding: 12px  ;
        text-align: center  ;
    }

    #customersTable th {
        color: #656565;
        white-space: nowrap;
        font-family: Segoe UI;
        font-size: 12px;
        /* Aligning column names to the left */
        text-align: left;
    }

    #customersTable tbody tr {
        transition: background-color 0.3s  ;
    }

    #customersTable tbody tr:hover {
        background-color: #ecf0f1  ; /* Light gray background on hover */
    }

    #customersTable a:hover {
        color: #c0392b; /* Darker red on hover */
    }
    #customersTable tbody tr.active {
        background-color: rgba(254, 60, 0, 0.3); /* Adjust the last value (alpha) for opacity */
    }
    .custom-column-width {
    width: 10%  ; /* Adjust the width as needed */
    text-align: left;
    }
    .custom-font-size td {
    font-size: 12px;
    white-space: nowrap;
    text-align: left;
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
                            <h3 class="card-title"  style="color: #313A46; font-family: Segoe UI; font-weight: bold;">LIST OF ALL SUPPLIERS</h3>
                        </div>

                        <div class="customers-section">
                        <div class="mb-3 d-flex justify-content-between align-items-center ml-4 mr-4">
                            <form action="customers.php" method="get" class="form-inline mt-3 mb-3">
                            <div class="input-group">
                                <input type="text" name="search" id="searchInput" class="form-control" placeholder="Search" oninput="searchProducts()">
                            </div>
                        </form>
                                <a href ="suppliersAdd.php" class="btn" style="background-color: #fe3c00; color: white;">
                                    <i class="fa fa-plus"></i>
                                </a>
                            </div>
                            
                            <div class="container-fluid">
                                <div class="table-responsive">
                                <table class="table text-center table-bordered" id="customersTable" width="100%" cellspacing="0">


                                        <thead>
                                            <tr class="th" style="color: #000000">

                                                <th class="custom-column-width">ACTION</th>
                                                <th class="custom-column-width">SUPPLIER</th>
                                                <th class="custom-column-width">CONTACT</th>
                                                <th class="custom-column-width">ADDRESS</th>
                                                <th class="custom-column-width">DATE REGISTERED</th>


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

                                                       
                                                            <a class = "mr-2" href = "suppliersEdit.php?id=' . $result['ID'] . '">
                                                            <i class = "fa fa-edit"></i>
                                                            </a>

                                                            <a href = "suppliersDelete.php?id=' . $result['ID'] . '">
                                                            <i class = "fa fa-trash text-danger"></i>
                                                            </a>


                                                        </td>
                                                        <td class="text-truncate text-left"   style="max-width: 150px;">' . strtoupper($result['Supplier_Name'])     . '</td>
                                                        <td class="text-truncate text-left" >' . $result['Contact'] . '</td>
                                                        
                                                        <td class="text-truncate text-left"  style="max-width: 200px;">' . strtoupper($result['Loc']) . '</td>
                                                        
                                                        <td class="text-truncate text-left"> ' . $result['Date_Added'] . '</td>
                                                     



                                                    </tr>';
                                                    
                          
                            
                            

                       
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
            $('#searchInput').on('keyup', function() {
                var searchText = $(this).val().toLowerCase();
                $('#customersTable tbody tr').each(function() {
                    var rowData = $(this).find('td').text().toLowerCase();
                    if (rowData.includes(searchText)) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            });
        });
    </script>

</body>

</html>
