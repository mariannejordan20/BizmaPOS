<?php
session_start();
include('connection.php');
?>


<!DOCTYPE html>
<html lang="en">
    <style>
        .table-container {
            height: 500px;
            max-width: auto;
            overflow: auto;

        }

        .table-sales {
            height: 460px;
            max-width: 100%;
            overflow: auto;
            display: block;
            overflow-y: auto;

        }

        .table-siteLoc {
            height: 400px;
            max-width: 100%;
            overflow-y: auto;
        }

        .for-space {
            margin-bottom: 370px;
        }

        .para {
            font-size: 0.9rem;
        }

        .table-responsive::-webkit-scrollbar {
            height: 10px;
            background-color: white;
            width: 10px;
        }

        .table-responsive::-webkit-scrollbar-thumb {
            background-color: #5A5C69;
            border-radius: 10px;
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

<section class="home-section">
<div class="container-fluid m-0" style="background: #F8F9FC; white-space: nowrap; position: sticky; top: 0; z-index: 3;">
        <div class="row p-0">
            <div class="col-md-3 col-sm-6 col-12">
                <div class="d-flex justify-content-end">
                    <div class="dropdown my-3 col-2 d-grid">
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="../../ProductList/categories.php">Item Categories</a></li>
                            <li><a class="dropdown-item" href="../../ProductList/sub_categories.php">Item Sub-Categories</a></li>
                            <li><a class="dropdown-item" href="../../ProductList/units.php">Item Units</a></li>
                            <li><a class="dropdown-item" href="../../ProductList/seller.php">Seller and Concessionaries</a></li>
                            <li><a class="dropdown-item" href="../../ProductList/expenses.php">Expenses Categories</a></li>
                            <li><a class="dropdown-item" href="../../ProductList/payment.php">Payment Type</a></li>
                            <li><a class="dropdown-item" href="../../ProductList/payment_description.php">Payment Description</a></li>
                            <li><a class="dropdown-item" href="../../ProductList/discount_list.php">Discount List</a></li>
                            <li><a class="dropdown-item" href="../../ProductList/discount_list.php">Delivery Options</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card w-100" style="z-index:1; border-radius:0;">

        <div class="card-header " style="border-bottom: none;">
            <div class="row">
                <div class="col-lg-4 col-12 p-1">
                </div>
            </div>
        </div>
        <div class="card-body bg-light px-3 py-2">

            <div class="row g-2">
                <div class="col-lg-8 col-12">
                    <div class="table-responsive  mb-5  table-sales text-start " style="display: flex; overflow-x: auto; box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px; position: relative;" id="Ntable">
                        <form id="myform" action="php/code.php" method="POST">
                            <table id="newTable" class="table table-sm table-bordered table-hover ">
                                <thead class="bg-dark text-light" style="white-space: nowrap; position:sticky; top:0; ">
                                    <tr>
                                        <th class="px-5" scope="col">Barcode</th>
                                        <th class="px-5" scope="col">Purchased Product</th>
                                        <th class="px-5" scope="col">Qty</th>
                                        <th class="px-5" scope="col">Unit</th>
                                        <th class="px-5" scope="col">Price</th>
                                        <th class="px-5" scope="col">Disc</th>
                                        <th class="px-5" scope="col">TL Disc</th>
                                        <th class="px-5" scope="col">Amount</th>
                                    </tr>
                                </thead>
                                <tbody id="cartItemsTable" class="fw-bold">

                                </tbody>
                            </table>
                        </form>
                    </div>
                    <div class="table-responsive  mb-5  table-sales text-start " style="display: flex; overflow-x: auto; box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px; position: relative; display: none;" id="existingTableContainer">
                        <form id="myform" action="php/code.php" method="POST">
                            <table id="existingTable" class="table table-sm table-bordered table-hover ">
                                <thead class="bg-dark text-light" style="white-space: nowrap; position:sticky; top:0; ">
                                    <tr>
                                        <th class="px-5" scope="col">BarCode</th>
                                        <th class="px-5" scope="col">Select Produts</th>
                                        <th class="px-5" scope="col">Unit</th>
                                        <th class="px-5" scope="col">Retail</th>
                                        <th class="px-5 text-center" style="width: 500px;" scope="col">On*Stock</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = "SELECT * FROM tblproduct";
                                    $query_run = mysqli_query($conn, $query);

                                    if (mysqli_num_rows($query_run) > 0) {
                                        foreach ($query_run as $product) {
                                            $id = $product['id'];
                                            $checkbox_id = "check-box-$id";

                                            // Insert the product data into the tblsales table
                                            $bcode = $product['bcode'];
                                            $pname = $product['pname'];
                                            $unit = $product['p_unit'];
                                            $totalCost = $product['sellprice'];
                                            $insert_query = "INSERT INTO tblsales (BarCode, PName, Unit, TotalCost) VALUES ('$bcode', '$pname', '$unit', '$totalCost')";
                                            mysqli_query($conn, $insert_query);
                                    ?>
                                            <tr id="salesData" data-bs-toggle="modal" data-bs-target="#QuantityModal" data-product-id="<?= $id ?>" data-retail-price="<?= $product['sellprice'] ?>">
                                                <td><?= $product['bcode']; ?></td>
                                                <td><?= $product['pname']; ?></td>
                                                <td><?= $product['p_unit']; ?></td>
                                                <td><?= $product['sellprice']; ?></td>
                                            </tr>


                                    <?php
                                        }
                                    } else {
                                        echo "<h5>No Record Found</h5>";
                                    }
                                    ?>
                                    <tr>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4 col-12 p-1">
                    <div class="card w-100 float-end mb-2" style="border-radius: 0;">
                        <div class="card-header p-2">
                            <h6 class="m-0">Amount Due: </h6>
                        </div>
                        <div class="card-body p-1 pe-2 text-end" id="amnt">
                            <h1 class="m-0 mt-1 fw-bold">Diri ag total</h1>
                        </div>
                        <div class="card-footer p-2">
                            <div class="row">
                                <div class="col-md-7 col-6">
                                    <h6 class="m-0" style="font-size:small">Trans.No: 0000001</h6>
                                </div>
                                <div class="col-md-5 col-6">
                                    <div class="d-flex justify-content-end">
                                        <h6 class="m-0" style="font-size:small">S-INV: 1000001</h6>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="container-fluid m-0" style="background: #F8F9FC; white-space: nowrap; position: sticky; top: 0; z-index: 3;">
    <div class="card w-auto">
        <div class="card-header p-2">
            <h6 class="m-0">Details Panel:</h6>
        </div>
        <div class="card-body px-1">
            <div class="row">
                <div class="col-12 mb-1">
                    <h6 class="m-0" style="font-size:small">Site Location</h6>
                    <div style="cursor: pointer;" class="input-group" data-bs-toggle="modal" data-bs-target="#locationModal">
                        <span id="selectedUnitCode" class="input-group-text py-0 text-center d-grid px-0" style="width: 80px;"></span>
                        <input style="cursor: pointer;" id="selectedPname" type="text" class="form-control text-center p-0" readonly>
                        <span class="input-group-text py-0">></span>
                    </div>
                </div>
                <div class="col-12 mb-1">
                    <h6 class="m-0" style="font-size:small">Customer</h6>
                    <div style="cursor: pointer;" class="input-group mb-1" data-bs-toggle="modal" data-bs-target="#locationModal2">
                        <span id="selectedCcode" class="input-group-text py-0 text-center d-grid px-0" style="width: 80px;"></span>
                        <input id="selectedCname" style="cursor: pointer;" type="text" class="form-control p-0 text-center" readonly>
                        <span class="input-group-text py-0">></span>
                    </div>
                </div>
                <div class="col-12 mb-4">
                    <h6 class="m-0" style="font-size:small">Salesman</h6>
                    <div style="cursor: pointer;" class="input-group mb-1" data-bs-toggle="modal" data-bs-target="#locationModal3">
                        <span id="selectedUserID" class="input-group-text py-0 text-center d-grid px-0" style="width: 80px;"></span>
                        <input style="cursor: pointer;" id="selectedFullname" type="text" class="form-control text-center p-0" readonly>
                        <span class="input-group-text py-0">></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer px-4">
            <div class="row">
                <div class="col-12 d-grid w-100">
                    <button class="btn btn-dark text-light p-3 fw-bold" style="max-width:100%;">Process Order Payment</button>
                </div>
            </div>
        </div>
    </div>
</div>

            </div>
        </div>
    </div>

</section>

                    
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
</body>

</html>