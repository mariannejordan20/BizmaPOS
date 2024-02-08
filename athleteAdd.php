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

    

    
?>

<!DOCTYPE html>
<html lang="en">

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
                        

                        <!-- Nav Item - Alerts -->
                        
                        <!-- Nav Item - Messages -->
                        

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

<?php
                           
                            $sql = "select * from athletes";
                            $result = $conn->query($sql);
                            $row = $result->fetch_assoc();






                        ?>



                       
                        <form action = "athleteAddSave.php" method="post" enctype="multipart/form-data">
                       
                        <h3><b><?= isset($id) ? "Update Student Details" : "Register New Athlete" ?></b></h3>
</div>
<div class="mx-0 py-5 px-3 mx-ns-4 bg-gradient-maroon">
<div class="row justify-content-center" style="margin-top:-2em;">
    <div class="col-lg-11 col-md-11 col-sm-12 col-xs-12">
        <div class="card rounded-0 shadow">
            <div class="card-body">
                <div class="container-fluid">
                    <form action="" id="student-form">
                        <input type="hidden" name ="id" value="<?php echo isset($id) ? $id : '' ?>">
                            
                        <fieldset class="border-bottom">
                            <legend>Students Information</legend>
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="Student_ID" class="control-label">Student ID</label>
                                        <input type="text" name="Student_ID" id="Student_ID" class="form-control form-control-sm rounded-5"   required/>
                                    </div>
                                </div>

                                

                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="First_Name" class="control-label">First Name</label>
                                        <input type="text" name="First_Name" id="First_Name" class="form-control form-control-sm rounded-5"  required/>
                                    </div>
                                </div>
                                
                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="Last_Name" class="control-label">Last Name</label>
                                        <input type="text" name="Last_Name" id="Last_Name" class="form-control form-control-sm rounded-5"   required/>
                                    </div>
                                </div>
                                
                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="image" class="control-label">Image</label>
                                        <div>
                                        <input type="file" name="image"  accept="image/*"/>
</div>  
                                    </div>
                                </div>
                                

                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="Event" class="control-label">Sport</label>
                                        <select name="Event" class="form-control form-control-sm form-control-border rounded-5" required>
                                        <option value="">Select Sport</option>
                                        <option value="Arnis">Arnis</option>
                                        <option value="Athletics">Athletics</option>
                                        <option value="Badminton">Badminton</option>
                                        <option value="Baseball">Baseball</option>
                                        <option value="Basketball">Basketball</option>
                                        <option value="Chess">Chess</option>
                                        <option value="Dancesports">Dancesports</option>
                                        <option value="Futsal">Futsal</option>
                                        <option value="Football">Football</option>
                                        <option value="Softball">Softball</option>
                                        <option value="Sepak Takraw">Sepak Takraw</option>
                                        <option value="Swimming">Swimming</option>
                                        <option value="Table Tennis">Table Tennis</option>
                                        <option value="Taekwando Koryugi">Taekwando Koryugi</option>
                                        <option value="Taekwando Poomsae">Taekwando Poomsae</option>
                                        <option value="Tennis">Tennis</option>
                                        <option value ="Volleyball">Volleyball</option>
                                        
                                        </select>
                                    
                                    
                        
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="Status" class="control-label">Status</label>
                                        <select name="Status" class="form-control form-control-sm form-control-border rounded-5" required>
                                        <option value="">Status</option>
                                        <option value="Regular">Regular</option>
                                        <option value="Irregular">Irregular</option>
                                        
                                        
                                        </select>
                                    
                                    
                        
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="Sex" class="control-label">Sex</label>
                                        <select name="Sex" class="form-control form-control-sm form-control-border rounded-5" required>
                                        <option value="">Select Sex</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        
                                        
                                        </select>
                                    
                                    
                        
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="Age" class="control-label">Age</label>
                                        <input type="text" name="Age" id="Age" class="form-control form-control-sm rounded-5"  required/>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="Height" class="control-label">Height in Centimeters</label>
                                        <input type="text" name="Height" id="Height" class="form-control form-control-sm rounded-5"   required/>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="Weight" class="control-label">Weight in Kilograms</label>
                                        <input type="text" name="Weight" id="Weight" class="form-control form-control-sm rounded-5"   required/>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="Blood_Type" class="control-label">Blood Type</label>
                                        <select name="Blood_Type" class="form-control form-control-sm form-control-border rounded-5">
                                        <option value="">Select Blood Type</option>
                                        <option value="A+">A+</option>
                                        <option value="A-">A-</option>
                                        <option value="B+">B+</option>
                                        <option value="B-">B-</option>
                                        <option value="O+">O+</option>
                                        <option value="O-">O-</option>
                                        <option value="AB+">AB+</option>
                                        <option value="AB-">AB-</option>
                                        
                                        </select>
                                    
                                    
                        
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="Course" class="control-label">Course</label>
                                        <select name="Course" class="form-control form-control-sm form-control-border rounded-5" required>
                                        <option value="">Select Course</option>
                                        <option value="BS-InfoTech">BS-InfoTech</option>
                                        <option value="BIT">BIT</option>
                                        <option value="BSCE">BSCE</option>
                                        <option value="Asso.InfoTech">Asso.InfoTech</option>
                                        <option value="BEED">BEED</option>
                                        <option value="BSCompE">BSCompE</option>
                                        <option value="BSCrim">BSCrim</option>
                                        <option value="BSEd">BSEd</option>
                                        <option value="BSEE">BSEE</option>
                                        <option value="BSFT">BSFT</option>
                                        <option value="BSFTE">BSFTE</option>
                                        <option value="BSHM">BSHM</option>
                                        <option value="BSME">BSME</option>
                                        <option value="BSTM">BSTM</option>
                                        <option value="CSTECH">CSTECH</option>
                                        <option value="Other">Other</option>
                                        
                                        </select>
                                    
                                    
                                    
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="Phone" class="control-label">Phone</label>
                                        <input type="text" name="Phone" id="Phone" class="form-control form-control-sm rounded-5" value="<?php echo isset($Phone) ? $Phone : ''; ?>"  required/>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="Address" class="control-label">Address</label>
                                        <input type="text" name="Address" id="Address" class="form-control form-control-sm rounded-5" value="<?php echo isset($Address) ? $Address : ''; ?>"  required/>
                                    </div>
                                </div>


                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="Year_Level" class="control-label">Year Level</label>
                                        <select name="Year_Level" class="form-control form-control-sm form-control-border rounded-5" required>
                                        <option value="">Select Year</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        </select>
                                        
                                    </div>
                                </div>



                            </div>

                        <div class="row">
                            <div class="col-md-12">
                                <input type="submit" class="btn btn-success" name="Save" value="Save">
                            </div>
                        </div>
                    </form>



                

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