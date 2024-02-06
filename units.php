<?php
session_start();
include('connection.php');

// Check if the form is submitted to add a new unit

// Set default values for pagination
$limit = isset($_GET['limit']) ? $_GET['limit'] : 5;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($page - 1) * $limit;

// Fetch all units with pagination
$sql = "SELECT ID, unit_name FROM units ORDER BY unit_name LIMIT $limit OFFSET $offset";
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
<style>
    .units-section {
    border-radius: 8px;
    padding: 20px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Subtle box-shadow for depth */
    margin-bottom: 20px;
    background-color: #fff; /* Optional: Add a background color */
    transition: box-shadow 0.3s; /* Smooth transition for box-shadow */
    }
    .pagination a.btn {
        color: #fff; /* Text color for pagination buttons */
    }

    .pagination a.btn {
        background-color: #FE3C00; /* Primary color for active and 'Previous'/'Next' buttons */
    }

    .pagination a.btn.btn-secondary {
        background-color: #6c757d; /* Secondary color for inactive page number buttons */
        border-color: #6c757d;
    }
    .table-bordered tbody tr.search-result-row td {
        color: #313A46 !important;
    }
    th, td{
        color: #000000 ; 
        white-space: nowrap;
        font-family: Segoe UI;
        font-size: 14px;
    }
    
</style>
<?php include('header.php'); ?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php include('menu.php'); ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column" style="background-color: #eeeeee;">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include('navbar.php'); ?>
                <!-- End of Topbar -->
                <div class="container-fluid">
                    <h3 class="card-title" style="color: #313A46; font-family: Segoe UI; font-weight: bold;">LIST OF ALL UNITS</h3>
                    <div class="row">

                        <!-- Left Content Column -->
                        <div class="col-lg-5 ml-5 mb-4 units-section">
                            <div class="card card-maroon border-0">
                                <div style="background-color:white; display: flex; justify-content: space-between; align-items: center; border: none">
                                    <button type="button" class="btn ml-5" style="background-color: #FE3C00; color: white;"
                                        data-toggle="modal" data-target="#addUnitModal">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                    <form action="units.php" method="get" class="form-inline">
                                        <div class="input-group" style="max-width: 83%;">
                                            <input type="text" name="search" id="searchInput" class="form-control" placeholder="Search" oninput="searchUnits()">
                                            <div class="input-group-append">
                                            <button type="submit" class="btn" style="background-color: #FE3C00; color: white;">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                        </div>
                                    </form>

                                </div>
                                <div class="card-body">
                                    <div class="container-fluid">
                                        <div class="table-responsive" id="searchResults">
                                            <table class="table table-bordered text-center" id="example" style="width: 100%;"
                                                cellspacing="0">
                                                <thead>
                                                    <tr style="color: #000000">
                                                        <th class="text-center">ACTION</th>
                                                        <th class="text-center">UNITS</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    // Check if search parameter is set
                                                    if (isset($_GET['search'])) {
                                                        $searchTerm = $_GET['search'];
                                                        $sql = "SELECT ID, unit_name FROM units WHERE unit_name LIKE '%$searchTerm%' ORDER BY unit_name";
                                                        $results = $conn->query($sql);
                                                    }

                                                    foreach ($results as $result) {
                                                        echo '<tr class="search-result-row">
                                                                <td>
                                                                <a class="mr-2" href="unitsEdit.php?id=' . $result['ID'] . '"><i class="fa fa-edit text-primary"></i></a>
                                                                    <a href="unitsDelete.php?id=' . $result['ID'] . '">
                                                                        <i class="fa fa-trash text-danger"></i>
                                                                    </a>
                                                                </td>
                                                                <td style="color: #313A46;">' . strtoupper($result['unit_name']) . '</td>
                                                            </tr>';
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>

                                        <!-- Pagination Links -->
                                        <div class="pagination mt-3">
                                            <?php
                                            $totalRecordsResult = $conn->query("SELECT COUNT(*) FROM units");
                                            $totalRecords = $totalRecordsResult->fetch_row()[0];
                                            $totalPages = ceil($totalRecords / $limit);

                                            // Previous Page
                                            if ($page > 1) {
                                                echo '<a href="units.php?page=' . ($page - 1) . '&limit=' . $limit . '" class="btn ">Previous</a>';
                                            }

                                            // Page Numbers
                                            for ($i = 1; $i <= $totalPages; $i++) {
                                                echo '<a href="units.php?page=' . $i . '&limit=' . $limit . '" class="btn ' . ($page == $i ? : 'btn-secondary') . '">' . $i . '</a>';
                                            }

                                            // Next Page
                                            if ($page < $totalPages) {
                                                echo '<a href="units.php?page=' . ($page + 1) . '&limit=' . $limit . '" class="btn ">Next</a>';
                                            }
                                            ?>
                                        </div>
                                        <!-- End Pagination Links -->

                                    </div>
                                </div>
                                <!-- /.container-fluid -->
                            </div>
                        </div>
                        <!-- End Left Content Column -->

                        <!-- Right Content Column -->
                        <div class="col-lg-6 ml-3 mb-4 units-section">

                            <!-- Recent Units Table -->
                            <div class="card card-maroon border-0" >
                                <div style="background-color:white; border: none">
                                    <h4 class="card-title ml-4" style="color: #313A46; font-family: Segoe UI; font-weight: bold">RECENT UNITS</h4>
                                </div>
                                <div class="card-body">
                                    <div class="container-fluid">
                                        <div class="table-responsive">
                                            <table class="table table-bordered text-center" id="recentUnitsTable"
                                                style="width: 100%;" cellspacing="0">
                                                <thead>
                                                    <tr style="color: #000000">
                                                        <th class="text-center">DATE</th>
                                                        <th class="text-center">RECENT UNIT</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    foreach ($recentUnits as $recentUnit) {
                                                        echo '<tr style="color: #313A46;">
                                                                <td>' . $recentUnit['created_at'] . '</td>
                                                                <td>' . strtoupper($recentUnit['unit_name']) . '</td>
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

        <!-- Add New Unit Modal -->
        <div class="modal fade" id="addUnitModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="background-color:#313A46; color:white">
                        <h5 class="modal-title" id="exampleModalLabel">Add New Unit</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="unitsAddSave.php" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
                            <div class="form-group">
                                <label for="unit_name">Unit Name</label>
                                <input type="text" name="unit_name" class="form-control" maxlength="3" oninput="this.value = this.value.toUpperCase()" required />
                            </div>
                            <button type="submit" class="btn" style="background-color:#fe3c00; color:white">Save</button>
                        </form>
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Add New Unit Modal -->

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
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            function validateForm() {
                var unitName = document.forms["student-form"]["unit_name"].value;

                // Check if the length is exactly 3
                if (unitName.length !== 3) {
                    alert("Unit Name must be exactly 3 letters.");
                    return false;
                }
                return true;
            }
        </script>
        <script>
              <?php
                    if (isset($_SESSION['status'])) {
                        echo "Swal.fire({
                            icon: '" . ($_SESSION['status_code'] == 'success' ? 'success' : 'error') . "',
                            title: '" . $_SESSION['status'] . "',
                            showConfirmButton: false,
                            timer: 1500
                        });";
                        unset($_SESSION['status']); // Clear the session variable
                        unset($_SESSION['status_code']); // Clear the session variable
                    }
                    ?>
        </script>

    <script>
  function searchUnits() {
    var searchTerm = document.getElementById('searchInput').value;
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'search.php?search=' + encodeURIComponent(searchTerm), true);
    xhr.send();
    xhr.onload = function () {
        if (xhr.status != 200) {
            console.error('Error ' + xhr.status + ': ' + xhr.statusText);
        } else {
            var searchResultsDiv = document.getElementById('searchResults');
            searchResultsDiv.innerHTML = xhr.responseText;

            // Set text color for search result rows
            var searchResultRows = searchResultsDiv.getElementsByTagName('tr');
            for (var i = 0; i < searchResultRows.length; i++) {
                searchResultRows[i].style.color = '#313A46';
            }
        }
    };
}

    </script>
    </body>

</html>
