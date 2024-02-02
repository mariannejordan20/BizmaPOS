<?php
session_start();

include('connection.php');

if (isset($_SESSION['hasLog'])){
    $haslog = $_SESSION['hasLog'];
} else {
    $haslog = 0;
}

if (empty($haslog)){
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<?php include('header.php'); ?>

<body id="page-top">
    <div id="wrapper">
        <?php include('menu.php'); ?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <?php include('navbar.php'); ?>
                <div class="container-fluid">
                    <div class="card-header" style="background-color: #eeeeee; border: none">
                        <h3 class="card-title" style="color: #313A46; margin-bottom: -10px">Warranty List</h3>
                    </div>
                    <div class="card-body">
                        <div class="container-fluid">
                            <div class="warranty-section">
                                <!-- Add New Warranty Button -->
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addWarrantyModal">
                                    Add New Warranty
                                </button>
                                <table class="table text-center" id="warrantyTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr class="bg-primary text-white">
                                            <th class="text-center" style="background-color: #313A46;">Action</th>
                                            <th class="text-center" style="background-color: #313A46;">Warranty (Months)</th>
                                        </tr>
                                    </thead>
                                    <tbody style="color: #313A46;">
                                        <?php
                                            foreach ($results as $result) {
                                                echo '<tr>
                                                        <td>
                                                            <a href="warrantyDelete.php?id='.$result['ID'].'">
                                                                <i class="fa fa-trash text-danger"></i>
                                                            </a>
                                                        </td>
                                                        <td>'.$result['Warranty'].'</td>
                                                    </tr>';
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Warranty Modal -->
    <div class="modal fade" id="addWarrantyModal" tabindex="-1" role="dialog" aria-labelledby="addWarrantyModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #313A46;">
                    <h5 class="modal-title" id="addWarrantyModalLabel" style="color: white">Add New Warranty</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="warrantyAddSave.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="Warranty">Duration (Months)</label>
                            <input type="text" name="Warranty" class="form-control" required/>
                        </div>
                        <button type="submit" class="btn" style="background-color: #fe3c00; color:white" name="Save">Save</button>
                    </form>
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

</body>

</html>