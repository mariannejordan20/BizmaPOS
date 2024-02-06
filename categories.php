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

$sql = "SELECT c.ID, c.main_category AS maincat, sc.sub_category AS subcat
        FROM categories AS c
        LEFT JOIN subcategories AS sc ON c.main_category = sc.main_category
        GROUP BY maincat
        ORDER BY maincat
        LIMIT 5";
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
        color: #000000 ; 
        white-space: nowrap;
        font-family: Segoe UI;
        font-size: 14px;
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
        color: #000000 ; 
        white-space: nowrap;
        font-family: Segoe UI;
        font-size: 14px;
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
    th, td{
        color: #000000 ; 
        white-space: nowrap;
        font-family: Segoe UI;
        font-size: 14px;
    }
</style>

<?php include('header.php'); ?>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.13.1/datatables.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">

<body id="page-top">

    <div id="wrapper">
        <?php include('menu.php'); ?>

        <div id="content-wrapper" class="d-flex flex-column" style="background-color: #eeeeee">

            <div id="content">
                <?php
                 include('navbar.php');
                ?>

                <div class="container-fluid">

                      
                            <h3 class="card-title"  style="color: #313A46; font-family: Segoe UI; font-weight: bold;">LIST OF ALL CATEGORIES</h3>


                        <div class="container-fluid" style="background-color: #eeeeee">
                            <div class="row">
                                <!-- Left Section - Categories -->
                                <div class="col-md-6 ml-4 mr-3 categories-section">
                                <h4 class="mb-3 ml-3" style="color: #313A46; font-family: Segoe UI; font-weight: bold;">CATEGORIES</h4>
                                    <div class="mb-3 d-flex align-items-center">
                                        <a href="categoryAdd.php" class="btn" style="background-color: #fe3c00; color: white;">
                                            Add New Category
                                        </a>
                                        <div class="input-group ml-5" style="max-width: 57%;"> <!-- Adjusted max-width for a shorter search bar -->
                                            <input type="text" id="searchInput" class="form-control" placeholder="Search Category">
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary" type="button" onclick="searchTable()">
                                                    <i class="fa fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <table class="table text-center table-bordered" id="categoriesTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr style="color: #000000">
                                                <th class="text-center">ACTION</th>
                                                <th class="text-center">CATEGORY</th>
                                            </tr>
                                        </thead>
                                        <tbody style="color: #313A46;">
                                        <?php
                                        foreach ($results as $result) {
                                            echo '<tr data-category-id="' . $result['maincat'] . '">
                                                    <td>
                                                        <a class="mr-2" href="categoriesEdit.php?id=' . $result['ID'] . '"><i class="fa fa-edit text-primary"></i></a>
                                                        <a href="categoryDelete.php?id=' . $result['ID'] . '">
                                                            <i class="fa fa-trash text-danger"></i>
                                                        </a>
                                                    </td>
                                                    <td>' . strtoupper($result['maincat']) . '</td>
                                                </tr>';
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>

                                <!-- Right Section - Sub-Categories -->
                                <div class="col-md-5 ml-1 categories-section">
                                    <h4
                                     class="mb-3 ml-3" style="color: #313A46; font-family: Segoe UI; font-weight: bold;">SUB-CATEGORIES</h4>
                                    <div class="mb-3 d-flex align-items-center">
                                        <a href="subCategoryAdd.php" class="btn" style="background-color: #fe3c00; color: white;">
                                            Add Sub-category 
                                        </a>
                                        <div class="input-group ml-5" style="max-width: 50%;"> <!-- Adjusted max-width for a shorter search bar -->
                                            <input type="text" id="searchInput" class="form-control" placeholder="Search Sub-Category">
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary" type="button" onclick="searchTable()">
                                                    <i class="fa fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <table class="table text-center table-bordered" id="subCategoriesTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th class="text-center">ACTION</th>
                                                <th class="text-center">SUB-CATEGORY</th>
                                            </tr>
                                        </thead>
                                        <tbody style="color: #313A46;">
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
                        function searchTable() {
                                var input, filter, table, tr, td, i, txtValue;
                                input = document.getElementById("searchInput");
                                filter = input.value.toUpperCase();
                                table = document.getElementById("categoriesTable"); // Corrected table ID
                                tr = table.getElementsByTagName("tr");

                                for (i = 0; i < tr.length; i++) {
                                    td = tr[i].getElementsByTagName("td")[1]; // Index 1 corresponds to the Category column
                                    if (td) {
                                        txtValue = td.textContent || td.innerText;
                                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                            tr[i].style.display = "";
                                        } else {
                                            tr[i].style.display = "none";
                                        }
                                    }
                                }
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
