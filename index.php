<?php
    session_start();
    // $haslog = (isset($_SESSION['hasLog'])?$_SESSION['hasLog']:0);
include('connection.php');
    if (isset($_SESSION['hasLog'])){
        $haslog = $_SESSION['hasLog'];
    }else{
        $haslog = 0;
    }
    if (isset($_SESSION['type'])){
        $type = $_SESSION['type'];
        }

    if (empty($haslog)){
        header("location: login.php");
        exit;
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="style2.css" >
</head>


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
        <div id="content-wrapper" class="d-flex flex-column">
            
            <!-- Main Content -->
            <div id="content">
<head>
    <title> Login Form Design </title>
    
</head>
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
                       <a href ="athleteAdd.php"><button class="btn btn-primary mb-3 mt-3" >Add New Athlete</button> </a>

                        
                        <div class="topbar-divider d-none d-sm-block"></div>
                        

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo " ".$_SESSION['Name']." ";?></span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
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

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between">
                        <h1 style="font-size: 25px; font-weight: bold; font-family: sans-serif; padding-left: 10px; color: #343a40;">DATA MONITORING AND ESTIMATES</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-2 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-1">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-3">
                                                TOTAL ORDER</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    <?php
                                                    
                                                        $query = "select count(Student_ID) AS NumStudents FROM athletes";

                                                        $result = mysqli_query( $conn, $query);
                                                        
                                                    while ($row = mysqli_fetch_assoc($result))
                                                        { 
                                                            echo $row['NumStudents'];
                                                        }
                                                        
                                                    ?>
                                                    <i class='fas fa-female' style='font-size:24px; float: right;'></i>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-2 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-1">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-3">
                                                PENDING ORDER</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                 <?php
                                                    
                                                    $query = "select count(sex) AS numMale FROM athletes where sex = 'male'";

                                                    $result = mysqli_query( $conn, $query);

                                                while ($row = mysqli_fetch_assoc($result))
                                                    { 
                                                        echo $row['numMale'];
                                                    }
                                                   

                                                    
                                                  ?>
                                                <i class='fas fa-female' style='font-size:24px; float: right;'></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                       <div class="col-xl-2 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-1">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-3">
                                                UNFINISHED</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                 <?php
                                                    
                                                    $query = "select count(sex) AS numFemale FROM athletes where sex = 'female'";

                                                    $result = mysqli_query( $conn, $query);

                                                while ($row = mysqli_fetch_assoc($result))
                                                    { 
                                                        echo $row['numFemale'];
                                                    }
                                                   

                                                    
                                                  ?>
                                                  <i class='fas fa-female' style='font-size:24px; float: right;'></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-2 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-1">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-3">
                                                PRODUCTS</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    <?php
                                                        
                                                        $query = "select count(Student_ID) AS NumStudents FROM athletes";

                                                        $result = mysqli_query( $conn, $query);
                                                        
                                                    while ($row = mysqli_fetch_assoc($result))
                                                        { 
                                                            echo $row['NumStudents'];
                                                        }
                                                        
                                                    ?>
                                                    <i class='fas fa-female' style='font-size:24px; float: right;'></i>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-2 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-1">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-3">
                                                CUSTOMERS</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                 <?php
                                                    
                                                    $query = "select count(sex) AS numMale FROM athletes where sex = 'male'";

                                                    $result = mysqli_query( $conn, $query);

                                                while ($row = mysqli_fetch_assoc($result))
                                                    { 
                                                        echo $row['numMale'];
                                                    }
                                                   

                                                    
                                                  ?>
                                                <i class='fas fa-female' style='font-size:24px; float: right;'></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                       <div class="col-xl-2 col-md-6 mb-4">
                            <div class="card border-left-info primary h-100 py-1">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-3">
                                                SUPPLIERS</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                 <?php
                                                    
                                                    $query = "select count(sex) AS numFemale FROM athletes where sex = 'female'";

                                                    $result = mysqli_query( $conn, $query);

                                                while ($row = mysqli_fetch_assoc($result))
                                                    { 
                                                        echo $row['numFemale'];
                                                    }
                                                   

                                                    
                                                  ?>
                                                  <i class='fas fa-female' style='font-size:24px; float: right;'></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Pending Requests Card Example -->
                    <div class="col-xl-12 col-md-12 mb-12">
                            

                    </div>
                    
                        
                        
                    </div>
                    

                    <!-- Content Row -->

                    <div class="row">


                    

               

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

</body>

</html>