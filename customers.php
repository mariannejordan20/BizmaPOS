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
$sql = "SELECT ID, Seqcode, number_id, Barcode, CustomerName, grp, TermofPayment, VATTIN, ContactPerson, Address, Contact, Datee FROM customer ORDER BY CustomerName";

// Execute the query
$results = $conn->query($sql);

// Check for errors in the query execution
if (!$results) {
    die("Error in SQL query: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="en">

<?php
include('header.php');
?>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.13.1/datatables.min.css" />

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php
        include('menu.php');
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
                        <a href="customeradd.php"><button class="btn btn-primary mb-3 mt-3">Add New Customer</button> </a>
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo " " . $_SESSION['Name'] . " "; ?></span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
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


                    <div class="card card-outline rounded-0 card-maroon">
                        <div class="card-header">
                            <h3 class="card-title">List of all Customer</h3>

                        </div>
                        <div class="card-body">
                            <div class="container-fluid">
                                <div class="table-responsive">
                                    <table class="table table-bordered  text-center" id="example" width="100%"
                                        cellspacing="0">


                                        <thead>
                                            <tr class="bg-primary text-white">

                                                <th class="text-center">Action</th>
                                                <th class="text-center">SeQCode</th>
                                                <th class="text-center">ID Number</th>
                                                <th class="text-center">Barcode</th>
                                                <th class="text-center">Customer Name</th>
                                                <th class="text-center">Group</th>
                                                <th class="text-center">Term of Payment</th>
                                                <th class="text-center">VAT TIN(NOS)</th>
                                                <th class="text-center">Contact Person</th>
                                                <th class="text-center">Address</th>
                                                <th class="text-center">Contact No.</th>
                                                <th class="text-center">Date Registered</th>


                                            </tr>
                                        </thead>
                                        <tbody>

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
                                                        <td>' . $result['Seqcode'] . '</td>
                                                        <td>' . $result['number_id'] . '</td>
                                                        <td>' . $result['Barcode'] . '</td>
                                                        <td>' . $result['CustomerName'] . '</td>
                                                        <td>' . $result['grp'] . '</td>
                                                        <td>' . $result['TermofPayment'] . '</td>
                                                        <td>' . $result['VATTIN'] . '</td>
                                                        <td>' . $result['ContactPerson'] . '</td>
                                                        <td>' . $result['Address'] . '</td>
                                                        <td>' . $result['Contact'] . '</td>
                                                        <td>' . $result['Datee'] . '</td>



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
                            <p><strong>number_id:</strong> ' . $result['number_id'] . '</p>
                            <p><strong>Barcode:</strong> ' . $result['Barcode'] . '</p>
                            <p><strong>CustomerName:</strong> ' . $result['CustomerName'] . '</p>
                            <p><strong>grp Price:</strong> ' . $result['grp'] . '</p>
                            <p><strong>TermofPayment Price:</strong> ' . $result['TermofPayment'] . '</p>
                            <p><strong>VATTIN:</strong> ' . $result['VATTIN'] . '</p>
                            
                            <p><strong>ContactPerson:</strong> ' . $result['ContactPerson'] . '</p>
                            <p><strong>Address:</strong> ' . $result['Address'] . '</p>
                            <p><strong>Contact:</strong> ' . $result['Contact'] . '</p>
                            <p><strong>Datee:</strong> ' . $result['Datee'] . '</p>
                            
                          
                            
                            

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
                <script type="text/javascript"
                    src="https://cdn.datatables.net/v/bs5/dt-1.13.1/datatables.min.js"></script>

                <!-- Page level custom scripts -->
                <script src="js/demo/datatables-demo.js"></script>
                <script src="assetsDT/js/bootstrap.bundle.min.js"></script>
                <script src="assetsDT/js/jquery-3.6.0.min.js"></script>
                <script src="assetsDT/js/pdfmake.min.js"></script>
                <script src="assetsDT/js/vfs_fonts.js"></script>
                <script src="assetsDT/js/custom.js"></script>
                <script src="assetsDT/js/datatables.min.js"></script>

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


</body>

</html>
