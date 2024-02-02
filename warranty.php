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

$page = isset($_GET['page']) ? $_GET['page'] : 1; // Get the current page number
$rowsPerPage = 5;
$offset = ($page - 1) * $rowsPerPage;

$sql = "SELECT ID, Warranty FROM warranty ORDER BY Warranty ASC LIMIT $offset, $rowsPerPage";
$result = $conn->query($sql);

$results = [];
while ($row = $result->fetch_assoc()) {
    $results[] = $row;
}

?>


<!DOCTYPE html>
<html lang="en">
<style>
    #warrantyTable tbody tr {
        cursor: pointer;
    }
    .warranty-section {
    border-radius: 8px;
    padding: 20px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Subtle box-shadow for depth */
    margin-bottom: 20px;
    background-color: #fff; /* Optional: Add a background color */
    transition: box-shadow 0.3s; /* Smooth transition for box-shadow */
    }
    #warrantyTable {
        width: 100%  ;
        border-spacing: 0  ;
    }

    #warrantyTable th,
    #warrantyTable td {
        padding: 12px  ;
        text-align: center  ;
    }

    #warrantyTable th {
        background-color: #3498db  ; /* Blue background for header */
        color: #fff  ; /* White text for header */
    }

    #warrantyTable tbody tr {
        transition: background-color 0.3s  ;
    }

    #warrantyTable tbody tr:hover {
        background-color: #ecf0f1  ; /* Light gray background on hover */
    }

    #warrantyTable a {
        color: #e74c3c  ; /* Red color for action links */
    }

    #warrantyTable a:hover {
        color: #c0392b; /* Darker red on hover */
    }
</style>
<?php
    include('header.php');
?>


<body id="page-top">
<div id="wrapper">
        <?php include('menu.php'); ?>
        <div id="content-wrapper" class="d-flex flex-column" style="background-color: #eeeeee">
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
                                <button type="button" class="btn mb-3 d-flex" data-toggle="modal" data-target="#addWarrantyModal" style="background-color:#fe3c00; color:white">
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
                                                        <a href="warrantyDelete.php?id=' . $result['ID'] . '">
                                                            <i class="fa fa-trash text-danger"></i>
                                                        </a>
                                                    </td>
                                                    <td>' . $result['Warranty'] . '</td>
                                                </tr>';
                                        }
                                        ?>
                                    </tbody>
                                </table>

                                <!-- Pagination -->
                                <div class="pagination">
                                    <?php
                                    $countResult = $conn->query("SELECT COUNT(*) as total FROM warranty")->fetch_assoc();
                                    $totalPages = ceil($countResult['total'] / $rowsPerPage);

                                    for ($i = 1; $i <= $totalPages; $i++) {
                                        echo '<a href="?page=' . $i . '">' . $i . '</a>';
                                    }
                                    ?>
                                </div>
                            </div>
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
    <?php include('warrantyAdd.php'); ?>
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