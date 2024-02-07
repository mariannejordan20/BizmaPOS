<?php
session_start();
include('connection.php');
?>


<!DOCTYPE html>
<html lang="en">
<?php include('header.php'); ?>
<style>
    /* Add this style block to your HTML or include it in your existing stylesheet */
    .table-responsive::-webkit-scrollbar {
        width: 8px; /* Set the width of the scrollbar */
        height: 8px;
    }

    .table-responsive::-webkit-scrollbar-thumb {
        background-color: #313a46; /* Set the color of the scrollbar thumb */
        border-radius: 8px; /* Make the scrollbar thumb rounded */
    }

    .table-responsive::-webkit-scrollbar-track {
        background-color: #eeeeee; /* Set the color of the scrollbar track */
    }
</style>
<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <?php include ('menu.php'); ?><!-- Content Wrapper -->
        
        <div id="content-wrapper" class="d-flex flex-column" style="background-color: #eeeeee;"><!-- Main Content -->
            
            <div id="content">
                <?php include('navbar.php'); ?><!-- Topbar -->
                
               
                <!-- Sales Content Goes Here -->
                    <div class="row m-2">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-body">
                                    <!-- Your sales charts or data representation -->
                                    <h5 class="card-title mb-3">Product Information</h5>
                                    <input type="text" id="liveSearchInput" class="form-control" placeholder="Search Product">
                                    <div class="table-responsive" style="height: 400px; overflow-x: hidden;" onmouseover="showScrollbar(this)" onmouseout="hideScrollbar(this)">
                                        <table class="table text-sm" style="font-size: 12px;">
                                            <thead style="background-color: #313a46; color: #fff;">
                                                <tr class="table-bordered">
                                                    <th>ID</th>
                                                    <th>Barcode</th>
                                                    <th>Product</th>
                                                    <th>Unit</th>
                                                    <th>Quantity</th>
                                                    <th>Costing</th>
                                                    <th>Price</th>
                                                    <th>Wholesale</th>
                                                    <th>Promo</th>
                                                    <th>Categories</th>
                                                    <th>Seller</th>
                                                    <th>Supplier</th>
                                                    <th>Warranty</th>
                                                    <th>SubCategory</th>
                                                    <th>Date_Registered</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                // Include your database connection code
                                                include('connection.php');

                                                // Fetch product data from the database
                                                $sql = "SELECT * FROM products";
                                                $result = $conn->query($sql);

                                                if ($result->num_rows > 0) {
                                                    while ($row = $result->fetch_assoc()) {
                                                        echo '<tr>
                                                                <td>' . $row['ID'] . '</td>
                                                                <td>' . $row['Barcode'] . '</td>
                                                                <td>' . $row['Product'] . '</td>
                                                                <td>' . $row['Unit'] . '</td>
                                                                <td>' . $row['Quantity'] . '</td>
                                                                <td>' . $row['Costing'] . '</td>
                                                                <td>' . $row['Price'] . '</td>
                                                                <td>' . $row['Wholesale'] . '</td>
                                                                <td>' . $row['Promo'] . '</td>
                                                                <td>' . $row['Categories'] . '</td>
                                                                <td>' . $row['Seller'] . '</td>
                                                                <td>' . $row['Supplier'] . '</td>
                                                                <td>' . $row['Warranty'] . '</td>
                                                                <td>' . $row['SubCategory'] . '</td>
                                                                <td>' . $row['Date_Registered'] . '</td>
                                                            </tr>';
                                                    }
                                                } else {
                                                    echo '<tr><td colspan="16">No data available</td></tr>';
                                                }

                                                // Close the database connection
                                                $conn->close();
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <script>
                        function showScrollbar(element) {
                            element.style.overflowX = 'auto';
                        }

                        function hideScrollbar(element) {
                            element.style.overflowX = 'hidden';
                        }
                        document.getElementById('liveSearchInput').addEventListener('input', function() {
                            // Handle live search functionality here
                            var input, filter, table, tr, td, i, txtValue;
                            input = this.value.toUpperCase();
                            table = document.querySelector('.table');
                            tr = table.getElementsByTagName('tr');

                            for (i = 1; i < tr.length; i++) {
                                td = tr[i].getElementsByTagName("td")[2]; // Index 2 corresponds to the Product column
                                if (td) {
                                    txtValue = td.textContent || td.innerText;
                                    if (txtValue.toUpperCase().indexOf(input) > -1) {
                                        tr[i].style.display = "";
                                    } else {
                                        tr[i].style.display = "none";
                                    }
                                }
                            }
                        });
                        </script>
                        <div class="col-md-4">
                            <!-- Additional Sales Information or Widgets -->
                            <div class="card">
                                <div class="card-body text-center">
                                    <!-- Small Digital Number Display -->
                                    <h5 class="mb-3 text-left">Amount</h5>
                                    <p class="display-4" style="color: black; font-weight:bold">000.00</p>
                                </div>
                            </div>
                        </div>
                    </div>
            </div><!-- End of Main Content Area -->




                
                    
            </div><!-- End of Content Wrapper -->
        </div><!-- End of Page Wrapper -->
    </div>
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

    
</body>
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
</html>