<?php
session_start();

include('connection.php');

// Check if the form is submitted to add a new unit
if (isset($_POST['addUnit'])) {
    $unit_name = $_POST['unit_name'];

    // Insert unit into the main units table
    $sql = "INSERT INTO units (unit_name) VALUES ('$unit_name')";
    $conn->query($sql);

    // Insert unit into the recentunit table
    $sqlRecent = "INSERT INTO recentunit (unit_name, created_at) VALUES ('$unit_name', NOW())";
    $conn->query($sqlRecent);

    $_SESSION['status'] = "Unit added successfully!";
    $_SESSION['status_code'] = "success";
    header("location: units.php");
    exit;
}

// Fetch all units
$sql = "SELECT ID, unit_name FROM units ORDER BY unit_name";
$results = $conn->query($sql);

// Fetch recent units
$recentUnits = [];
$recentSql = "SELECT ID, unit_name, created_at FROM recentunit ORDER BY created_at DESC LIMIT 5";
$recentResults = $conn->query($recentSql);

while ($row = $recentResults->fetch_assoc()) {
    $recentUnits[] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">

<?php include('header.php'); ?>

<body id="page-top" >

    <!-- Page Wrapper -->
    <div id="wrapper" >

        <?php include('menu.php'); ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column" style="background-color: #2D333C;">

            <!-- Main Content -->
            <div id="content" >

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light topbar mb-4 static-top shadow" style="background-color: #2f3742">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto" style="background-color: #2f3742">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <a href="unitsAdd.php" ><button class="btn mb-3 mt-3" style="background-color: #FE3C00; color:white;" >Add New Unit</button> </a>
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

<div class="row">
    <!-- Left Content Column -->
    <div class="col-lg-6 mb-4">

        <div class="card rounded-0 card-maroon border-0" style="background-color: #313A46;">
            <div class="card-header" style="background-color: #FE3C00">
                <h3 class="card-title" style="color:white;">List of all Units</h3>
            </div>
            <div class="card-body">
                <div class="container-fluid">
                    <div class="table-responsive">
                        <table class="table table-bordered text-center" id="example" style="width: 100%;"
                            cellspacing="0">
                            <thead>
                                <tr class="text-white" style="background-color: #FE3C00">
                                    <th class="text-center" >Action</th>
                                    <th class="text-center">Units</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($results as $result) {
                                    echo '<tr style="color: white;">
                                            <td>
                                                <a href="unitsDelete.php?id=' . $result['ID'] . '">
                                                    <i class="fa fa-trash text-danger"></i>
                                                </a>
                                            </td>
                                            <td>' . $result['unit_name'] . '</td>
                                        </tr>';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </div>

    </div>
    <!-- End Left Content Column -->

    <!-- Right Content Column -->
    <div class="col-lg-6 mb-4">

        <!-- Recent Units Table -->
        <div class="card card-outline rounded-0 card-maroon border-0" style="background-color: #313A46;">
            <div class="card-header" style="background-color: #FE3C00">
                <h3 class="card-title" style="color:white;">Recent Units</h3>
            </div>
            <div class="card-body">
                <div class="container-fluid">
                    <div class="table-responsive">
                        <table class="table table-bordered text-center" id="recentUnitsTable"
                            style="width: 100%;" cellspacing="0">
                            <thead>
                                <tr class="text-white" style="background-color: #FE3C00">
                                    <th class="text-center">Date</th>
                                    <th class="text-center">Recent Unit</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($recentUnits as $recentUnit) {
                                    echo '<tr style="color: white;">
                                            <td>' . $recentUnit['created_at'] . '</td>
                                            <td>' . $recentUnit['unit_name'] . '</td>
                                        </tr>';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- End Recent Units Table -->

    </div>
    <!-- End Right Content Column -->
</div>

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

