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

$sql = "SELECT c.ID, c.main_category AS maincat
        FROM categories AS c
        GROUP BY maincat";
$results = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<style>
    #categoriesTable, #subCategoriesTable tbody tr {
        cursor: pointer;
    }
    .categories-section {
    border-radius: 8px;
    padding: 20px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Subtle box-shadow for depth */
    margin-bottom: 20px;
    background-color: #fff; /* Optional: Add a background color */
    transition: box-shadow 0.3s; /* Smooth transition for box-shadow */
    }
    #categoriesTable {
        width: 100%  ;
        border-spacing: 0  ;
    }

    #categoriesTable th,
    #categoriesTable td {
        padding: 12px  ;
        text-align: center  ;
    }

    #categoriesTable th {
        background-color: #3498db  ; /* Blue background for header */
        color: #fff  ; /* White text for header */
    }

    #categoriesTable tbody tr {
        transition: background-color 0.3s  ;
    }

    #categoriesTable tbody tr:hover {
        background-color: #ecf0f1  ; /* Light gray background on hover */
    }

    #categoriesTable a {
        color: #e74c3c  ; /* Red color for action links */
    }

    #categoriesTable a:hover {
        color: #c0392b; /* Darker red on hover */
    }
    #subCategoriesTable {
        width: 100%  ;
        border-spacing: 0  ;
    }

    #subCategoriesTable th,
    #subCategoriesTable td {
        padding: 12px  ;
        text-align: center  ;
    }

    #subCategoriesTable th {
        background-color: #3498db  ; /* Blue background for header */
        color: #fff  ; /* White text for header */
    }

    #subCategoriesTable tbody tr {
        transition: background-color 0.3s  ;
    }

    #subCategoriesTable tbody tr:hover {
        background-color: #ecf0f1  ; /* Light gray background on hover */
    }

    #subCategoriesTable a {
        color: #e74c3c  ; /* Red color for action links */
    }

    #subCategoriesTable a:hover {
        color: #c0392b; /* Darker red on hover */
    }
</style>

<?php include('header.php'); ?>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.13.1/datatables.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">

<body id="page-top">

    <div id="wrapper">
        <?php include('menu.php'); ?>

        <div id="content-wrapper" class="d-flex flex-column" style="background-color: #2d333c">

            <div id="content">
                <?php
                 include('navbar.php');
                ?>

                <div class="container-fluid">
                    <div class="card card-outline rounded-0 card-maroon">
                        <div class="card-header">
                            <h3 class="card-title">List of all Categories</h3>
                        </div>

                        <div class="card-body">
                        <div class="container-fluid">
                            <div class="row">
                                <!-- Left Section - Categories -->
                                <div class="col-md-6 categories-section">
                                    <h3>Categories</h3>
                                    <a href="categoryAdd.php"><button style="background-color:#2D333C; color:white" class="btn mb-3 mt-3">Add New Category  
                                    <i class="fas fa-plus"></i>
                                    </button>
                                    </a>
                                    <table class="table  text-center" id="categoriesTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr class="text-white"  style="color: #313A46;">
                                                <th class="text-center">Action</th>
                                                <th class="text-center">Category</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        foreach ($results as $result) {
                                            echo '<tr data-category-id="' . $result['maincat'] . '">
                                                    <td>
                                                        <a href="categoryDelete.php?id=' . $result['ID'] . '">
                                                            <i class="fa fa-trash text-danger"></i>
                                                        </a>
                                                    </td>
                                                    <td>' . $result['maincat'] . '</td>
                                                </tr>';
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>

                                <!-- Right Section - Sub-Categories -->
                                <div class="col-md-6 categories-section">
                                    <h3>Sub-Categories</h3>
                                    <a href="subCategoryAdd.php" class="btn mb-3 mt-3" style="background-color:#2D333C; color:white">
                                        Add Sub-Category <i class="fas fa-plus"></i>
                                    </a>

                                    <table class="table text-center" id="subCategoriesTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr class="bg-primary text-white">
                                                <th class="text-center">Action</th>
                                                <th class="text-center">Sub-Category</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Sub-categories content will be dynamically loaded here -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <script>
                        // Attach click event to category links
                        document.querySelectorAll('#categoriesTable tbody tr').forEach(function (categoryRow) {
                            categoryRow.addEventListener('click', function () {
                                // Remove active class from all category rows
                                document.querySelectorAll('#categoriesTable tbody tr').forEach(function (row) {
                                    row.classList.remove('active');
                                });

                                // Add active class to the clicked category row
                                this.classList.add('active');

                                // Fetch sub-categories content for the selected category
                                var categoryId = this.getAttribute('data-category-id');
                                fetchSubCategories(categoryId);
                            });
                        });

                        function fetchSubCategories(categoryId) {
                            // Fetch sub-categories content for the selected category
                            fetch('fetchSubCategories.php?categoryId=' + categoryId)
                                .then(function (response) {
                                    return response.text();
                                })
                                .then(function (subCategoriesHtml) {
                                    // Update the content of the right section with the fetched sub-categories
                                    document.getElementById('subCategoriesTable').getElementsByTagName('tbody')[0].innerHTML = subCategoriesHtml;
                                })
                                .catch(function (error) {
                                    console.error('Error fetching sub-categories:', error);
                                });
                        }
                    </script>


                    </div>
                </div>
            </div>
        </div>
    </div>

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

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

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.13.1/datatables.min.js"></script>
    <script src="js/demo/datatables-demo.js"></script>
    <script src="assetsDT/js/bootstrap.bundle.min.js"></script>
    <script src="assetsDT/js/jquery-3.6.0.min.js"></script>
    <script src="assetsDT/js/pdfmake.min.js"></script>
    <script src="assetsDT/js/vfs_fonts.js"></script>
    <script src="assetsDT/js/custom.js"></script>
    <script src="assetsDT/js/datatables.min.js"></script>
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
