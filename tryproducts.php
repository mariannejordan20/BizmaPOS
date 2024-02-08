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

$sql = "SELECT ID, Barcode, Product, Warranty, Unit, Quantity, Costing, Price, Wholesale, Promo, Categories, SubCategory, Seller, Supplier, Date_Registered FROM products ORDER BY Categories";
$results = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <style>
        /* Add your CSS styles here */
    </style>
</head>
<body>
    <?php include('header.php'); ?>
    <div id="wrapper">
        <?php include ('menu.php'); ?>
        <div id="content-wrapper" class="d-flex flex-column" style="background-color: #eeeeee;">
            <div id="content">
                <?php include('navbar.php'); ?>
                <div class="container-fluid" style="padding-left: 2%;">
                    <div class="card-header" style="background-color: #eeeeee; border: none">
                        <h3 class="card-title" style="color: #313A46; margin-bottom: -10px">List of all Products</h3>
                    </div>
                    <div class="card-body">
                        <div class="products-section">
                            <div class="mb-3">
                                <input type="text" id="searchInput" placeholder="Search by Product or Barcode">
                            </div>
                            <div class="mb-3 d-flex align-items-center">
                                <a href="productsAdd.php" class="btn" style="background-color: #fe3c00; color: white;">Add New Product</a>
                            </div>
                            <div class="container-fluid">
                                <div class="table-responsive">
                                    <table class="table text-center" id="productsTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr class="text-white" style="background-color: #2D333C">
                                                <th class="text-center">Action</th>
                                                <th class="text-center">Barcode</th>
                                                <th class="text-center">Product Name</th>
                                                <th class="text-center">
                                                    <div class="mb-3 d-flex align-items-center">
                                                        <select id="unitFilter">
                                                            <option value="">Unit</option>
                                                            <!-- Add options dynamically if needed -->
                                                        </select>
                                                    </div>
                                                </th>
                                                <th class="text-center">Warranty</th>
                                                <th class="text-center">Quantity</th>
                                                <th class="text-center">Costing</th>
                                                <th class="text-center">Price</th>
                                                <th class="text-center">Wholesale</th>
                                                <th class="text-center">Promo</th>
                                                <th class="text-center">
                                                    <select id="categoryFilter">
                                                        <option value="">Category</option>
                                                        <!-- Add options dynamically if needed -->
                                                    </select>
                                                </th>
                                                <th class="text-center">S-CAT</th>
                                                <th class="text-center">Seller</th>
                                                <th class="text-center">Supplier</th>
                                                <th class="text-center">Date Registered</th>
                                            </tr>
                                        </thead>
                                        <tbody style="color: #313A46;">
                                            <?php
                                                foreach ($results as $result) {
                                                    echo '<tr>
                                                            <td>
                                                                <a class="mr-2" href="#?id='.$result['ID'].'" data-bs-toggle="modal" data-bs-target="#productsModal'.$result['ID'].'"><i class="fa fa-eye"></i></a>
                                                                <a class="mr-2" href="productsEdit.php?id='.$result['ID'].'"><i class="fa fa-edit"></i></a>
                                                                <a href="productsDelete.php?id='.$result['ID'].'"><i class="fa fa-trash text-danger"></i></a>
                                                            </td>
                                                            <td>'.$result['Barcode'].'</td>
                                                            <td>'.$result['Product'].'</td>
                                                            <td>'.$result['Unit'].'</td>
                                                            <td>'.$result['Warranty'].'</td>
                                                            <td>'.$result['Quantity'].'</td>
                                                            <td>'.$result['Costing'].'</td>
                                                            <td>'.$result['Price'].'</td>
                                                            <td>'.$result['Wholesale'].'</td>
                                                            <td>'.$result['Promo'].'</td>
                                                            <td>'.$result['Categories'].'</td>
                                                            <td>'.$result['SubCategory'].'</td>
                                                            <td>'.$result['Seller'].'</td>
                                                            <td>'.$result['Supplier'].'</td>
                                                            <td>'.$result['Date_Registered'].'</td>
                                                        </tr>';
                                                    echo '<div class="modal fade" id="productsModal'.$result['ID'].'" tabindex="-1" aria-labelledby="productsModal'.$result['ID'].'" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered modal-md">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title">'.$result['Product'].'</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">Close</button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <p><strong>Barcode:</strong> '.$result['Barcode'].'</p>
                                                                        <p><strong>Unit:</strong> '.$result['Unit'].'</p>
                                                                        <p><strong>Costing:</strong> '.$result['Costing'].'</p>
                                                                        <p><strong>Price:</strong> '.$result['Price'].'</p>
                                                                        <p><strong>Wholesale Price:</strong> '.$result['Wholesale'].'</p>
                                                                        <p><strong>Promo Price:</strong> '.$result['Promo'].'</p>
                                                                        <p><strong>Category:</strong> '.$result['Categories'].'</p>
                                                                        <p><strong>Seller:</strong> '.$result['Seller'].'</p>
                                                                        <p><strong>Supplier:</strong> '.$result['Supplier'].'</p>
                                                                        <p><strong>Date:</strong> '.$result['Date_Registered'].'</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>';
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
    </div>
    <!-- Add your JavaScript scripts here -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>
    <script src="assetsDT/js/bootstrap.bundle.min.js"></script>
    <script src="assetsDT/js/jquery-3.6.0.min.js"></script>
    <script src="assetsDT/js/pdfmake.min.js"></script>
    <script src="assetsDT/js/vfs_fonts.js"></script>
    <script src="assetsDT/js/custom.js"></script>
    <script src="js/sweetalert2.all.min.js"></script>
    <script src="js/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script src="js/delete.js"></script>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        populateDropdown("unitFilter", 3); // Index of Unit column
        populateDropdown("categoryFilter", 10); // Index of Category column
    });

    function populateDropdown(selectId, columnIndex) {
        var select = document.getElementById(selectId);
        var options = [];
        var table = document.getElementById("productsTable");
        var rows = table.getElementsByTagName("tr");
        for (var i = 1; i < rows.length; i++) {
            var cell = rows[i].getElementsByTagName("td")[columnIndex];
            var value = cell.textContent || cell.innerText;
            if (!options.includes(value)) {
                options.push(value);
                var option = document.createElement("option");
                option.text = value;
                select.add(option);
            }
        }
    }

    function filterTable() {
        var selectUnit = document.getElementById("unitFilter");
        var selectCategory = document.getElementById("categoryFilter");
        var filterUnit = selectUnit.value.toUpperCase();
        var filterCategory = selectCategory.value.toUpperCase();
        var searchInput = document.getElementById("searchInput").value.toUpperCase();
        var table = document.getElementById("productsTable");
        var tr = table.getElementsByTagName("tr");

        for (var i = 1; i < tr.length; i++) {
            var tdUnit = tr[i].getElementsByTagName("td")[3]; // Index of Unit column
            var tdCategory = tr[i].getElementsByTagName("td")[10]; // Index of Category column
            var tdProductName = tr[i].getElementsByTagName("td")[2]; // Index of Product Name column
            var tdBarcode = tr[i].getElementsByTagName("td")[1]; // Index of Barcode column
            if (tdUnit && tdCategory && tdProductName && tdBarcode) {
                var unitMatch = filterUnit === '' || tdUnit.textContent.toUpperCase() === filterUnit;
                var categoryMatch = filterCategory === '' || tdCategory.textContent.toUpperCase() === filterCategory;
                var productNameMatch = tdProductName.textContent.toUpperCase().indexOf(searchInput) > -1;
                var barcodeMatch = tdBarcode.textContent.toUpperCase().indexOf(searchInput) > -1;
                if ((unitMatch && categoryMatch) && (productNameMatch || barcodeMatch)) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }

    document.getElementById("unitFilter").addEventListener("change", filterTable);
    document.getElementById("categoryFilter").addEventListener("change", filterTable);
    document.getElementById("searchInput").addEventListener("keyup", filterTable);
</script>

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
