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
        <div id="content-wrapper" class="d-flex flex-column" style="background-color: #eeeeee">
            
            <!-- Main Content -->
            <div id="content">
<head>
    <title> Login Form Design </title>
    <style>
    .border-left-primary-custom {
        border-left-color: #343a40;
        border-left-width: 4px;
    }
    .card-dbrd{
        background-color: #313a46;
        border-radius: 5px;
        color: white;
    }
</style>

</head>
                <!-- Topbar -->
                <?php
                 include('navbar.php');
                ?>
                <!-- End of Topbar -->
            
                <!-- Begin Page Content -->
                <div class="container-fluid" style="background-color:#eeeeee">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between">
                        <h1 style="font-size: 25px; font-weight: bold; font-family: sans-serif; padding-left: 10px; color:#313A46;">DATA MONITORING AND ESTIMATES</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                    
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-2 col-md-6 mb-4">
                            <div class="card-dbrd">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-uppercase mb-3" style="color: white">
                                                TOTAL ORDER</div>
                                                <div class="h5 mb-0 font-weight-bold text-800" style="color: white">
                                                    <?php
                                                    
                                                        $query = "select count(ID) AS countID FROM products";

                                                        $result = mysqli_query( $conn, $query);
                                                        
                                                    while ($row = mysqli_fetch_assoc($result))
                                                        { 
                                                            echo $row['countID'];
                                                        }
                                                        
                                                    ?>
                                                    <i class='fas fa-female' style='font-size:24px; float: right; color: white;'></i>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-2 col-md-6 mb-4">
                            <div class="card-dbrd"> 
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-uppercase mb-3" style="color:white">
                                                PENDING ORDER</div>
                                            <div class="h5 mb-0 font-weight-bold text-800"  style="color: white">
                                                 <?php
                                                    
                                                    $query = "select count(ID) AS countID FROM products";

                                                    $result = mysqli_query( $conn, $query);
                                                    
                                                while ($row = mysqli_fetch_assoc($result))
                                                    { 
                                                        echo $row['countID'];
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
                             <div class="card-dbrd">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-uppercase mb-3" style="color: white">
                                                UNFINISHED</div>
                                            <div class="h5 mb-0 font-weight-bold text-800"  style="color: white">
                                                 <?php
                                                    
                                                    $query = "select count(ID) AS countID FROM products";

                                                    $result = mysqli_query( $conn, $query);
                                                    
                                                while ($row = mysqli_fetch_assoc($result))
                                                    { 
                                                        echo $row['countID'];
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
                            <div class="card-dbrd">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-uppercase mb-3" style="color: white">
                                                PRODUCTS</div>
                                                <div class="h5 mb-0 font-weight-bold text-800"  style="color: white">
                                                    <?php
                                                        
                                                        $query = "select count(ID) AS countID FROM products";

                                                        $result = mysqli_query( $conn, $query);
                                                        
                                                    while ($row = mysqli_fetch_assoc($result))
                                                        { 
                                                            echo $row['countID'];
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
                            <div class="card-dbrd">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-uppercase mb-3" style="color: white">
                                                CUSTOMERS</div>
                                            <div class="h5 mb-0 font-weight-bold text-800"  style="color: white">
                                                 <?php
                                                    
                                                    $query = "select count(ID) AS countID FROM products";

                                                        $result = mysqli_query( $conn, $query);
                                                        
                                                    while ($row = mysqli_fetch_assoc($result))
                                                        { 
                                                            echo $row['countID'];
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
                            <div class="card-dbrd">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-uppercase mb-3" style="color: white">
                                                SUPPLIERS</div>
                                            <div class="h5 mb-0 font-weight-bold text-800"  style="color: white">
                                                 <?php
                                                    
                                                    $query = "select count(ID) AS countID FROM products";

                                                        $result = mysqli_query( $conn, $query);
                                                        
                                                    while ($row = mysqli_fetch_assoc($result))
                                                        { 
                                                            echo $row['countID'];
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

                        <!-- Additional Canvas for Bar Graph -->
                    <div class="row">
                        <div class="col-xl-14 col-md-12 mb-12">
                            <canvas id="myBarChart" width="400" height="350"></canvas>
                        </div>
                        
                    </div>
                    <div class="row" style="width: 30%;">       
                        <div class="col-xl-12 col-md-6 mb-4" style="margin-left: 20px;">
                            <div class="card-dbrd">
                                <div class="table-responsive-sm">
                                    <table class="table table-centered mb-4" style="font-size: 10px;">
                                        <thead style="background-color: #212529;">
                                            <tr>
                                                <th style="text-align: center; color: #ff3c00;">
                                                    <span>SALE TRANSACTIONS</span>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td style="text-align: center; font-weight: bold; color: white; font-size: 20px;">1</td>
                                            </tr>
                                        </tbody>
                                        <thead style="background-color: #212529;">
                                            <tr>
                                                <th style="text-align: center; color: #ff3c00;">
                                                    <span>Unpaid Orders</span>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td style="color: white; font-size: 16px;">
                                                    <span style="float: left;">0</span>
                                                    <span style="float: right;">0</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                        <thead style="background-color: #212529;">
                                            <tr>
                                                <th style="text-align: center; color: #ff3c00;">
                                                    <span>Orders with Balance</span>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td style="color: white; font-size: 16px;">
                                                    <span style="float: left;">0</span>
                                                    <span style="float: right;">0</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                        <thead style="background-color: #212529;">
                                            <tr>
                                                <th style="text-align: center;  color: #ff3c00;">
                                                    <span style="float: left;">ToVerify</span>
                                                    <span style="float: right;">Questionable</span>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td style="color: white; font-size: 16px;">
                                                    <span style="float: left;">0</span>
                                                    <span style="float: right;">0</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div> 
                            </div> <!-- end card body-->
                        </div> <!-- end card -->

                                    
                            </div><!-- end col-->
                     

                        <div class="col-xl-3 col-lg-6" style="margin-left: 20px; height: 400px">
                                <div class="card-dbrd">
                                    <div class="d-flex card-header justify-content-between align-items-center" style="background-color: #212529;">
                                        <h4 class="header-title">TOP SELLER PRODUCTS</h4>
                                    </div>

                                    <div class="card-body p-2">

                                        <div class="table-responsive">
                                            <table class="table table-sm table-centered table-hover table-borderless mb-1">
                                                
                                                <tbody>
                                                    <tr>
                                                        <td>SHAMPOO</td>
                                                        <td style="padding-top: 14px;">
                                                            <div class="progress" style="height: 5px; width: 100px;">
                                                                <div class="progress-bar" role="progressbar" style="width: 65%; background-color: #ff3c00;" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100">
                                                            </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>JUNKFOODS</td>
                                                        <td style="padding-top: 14px;">
                                                            <div class="progress" style="height: 5px; width: 100px;">
                                                                <div class="progress-bar" role="progressbar" style="width: 45%; background-color: #ff3c00;" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100">
                                                            </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    
                                                </tbody>
                                            </table>
                                        </div> <!-- end table-responsive-->
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col-->
                          
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

                                                    
    <script>
    // Your PHP data for the bar graph
    var barChartData = {
        labels: ['Sales', 'Revenue', 'Net PFT', 'Expense', 'Growth'],
        datasets: [{
            label: 'Target and Status Graphs',
            backgroundColor: '#313A46',
            borderWidth: 1,
            data: [10, 20, 30, 20, 3]  // Replace this with your actual data
        }]
    };
    

    // Get the canvas element and initialize the bar chart
    var ctx = document.getElementById('myBarChart').getContext('2d');
    var myBarChart = new Chart(ctx, {
        type: 'horizontalBar',  // Set the type to 'horizontalBar'
        data: barChartData,
        options: {
            responsive: true,
            scales: {
                x: [{
                    ticks: {
                        fontColor: '#313A46' // Set font color for x-axis labels
                    }
                }],
                y: {
                    display: false  // Hide the y-axis
                }
            }
        }
    });
</script>




</body>

</html>