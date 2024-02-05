<?php
session_start();   

    include('connection.php');
    // $haslog = (isset($_SESSION['hasLog'])?$_SESSION['hasLog']:0);

    if (isset($_SESSION['hasLog'])){
        $haslog = $_SESSION['hasLog'];
    }else{
        $haslog = 0;
    }

    if (empty($haslog)){
        header("location: login.php");
        exit;
    }

    $sql = "select ID, Warranty from warranty order by Warranty asc";
    $results = $conn->query($sql);
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
        color: #000000  ; 
        white-space: nowrap;
        font-family: Segoe UI;
        font-size: 14px;
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
    .custom-font-size td {
    font-size: 12px;
    white-space: nowrap;
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
        <div id="content-wrapper" class="d-flex flex-column" style="background-color: #eeeeee">

            <!-- Main Content -->
            <div id="content">


                <!-- Topbar -->
                <?php
                 include('navbar.php');
                ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    

                            <div class="card-header" style="background-color: #eeeeee; border: none">
                                <h3 class="card-title"  style="color: #313A46; font-family: Segoe UI; font-weight: bold;">WARRANTY LIST</h3>
                            </div>

                                <div class="warranty-section">
                                    <div class="mb-3 ml-4 d-flex align-items-center">
                                        <a href="warrantyAdd.php" class="btn" style="background-color: #fe3c00; color: white;">
                                            <i class="fa fa-plus"></i>
                                        </a>
                                    </div>
                                  <div class="container-fluid">
                                  
                                    <table class="table text-center table-bordered" id="warrantyTable" width="100%" cellspacing="0">
                                        
                                        <thead>
                                            <tr class="th" style="color: #000000">
                                            
                                                <th class="text-center">ACTION</th>
                                                <th class="text-center">WARRANTY (MONTHS)</th>
                                                
                                                
                                            </tr>
                                        </thead>
                                        <tbody class="custom-font-size" style="color: #313A46;">

                                        <?php
                                                        foreach ($results as $result) {
                                                            echo '<tr>
                                                                    <td>

                                                                
                                                                        

                                                                        <a href = "warrantyDelete.php?id='.$result['ID'].'">
                                                                        <i class = "fa fa-trash text-danger"></i>
                                                                        </a>


                                                                    </td>
                                                                    <td>'.$result['Warranty'].'</td>
                                                                
                                                                </tr>';
                                                                
                                                        }

                                                    ?>
                                                </tbody>

                                        </div>     
                                        </div>
                                        <!-- /.container-fluid -->

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