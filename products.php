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

$recordsPerPage = 7; // Number of records per page
$page = isset($_GET['page']) ? $_GET['page'] : 1; // Current page number
$offset = ($page - 1) * $recordsPerPage; // Offset for SQL query

$sql = "SELECT ID, ProductID, Barcode, Product, ItemType, Warranty, Unit, Quantity, Costing, Price, Wholesale, Promo, Categories, SubCategory, Seller, Supplier, Date_Registered 
        FROM products 
        ORDER BY Categories
        LIMIT $offset, $recordsPerPage";
$results = $conn->query($sql);

// Get total number of records
$totalRecordsQuery = "SELECT COUNT(*) AS total FROM products"; // Fixed table name
$totalRecordsResult = $conn->query($totalRecordsQuery);
$totalRecords = $totalRecordsResult->fetch_assoc()['total'];

// Calculate total pages
$totalPages = ceil($totalRecords / $recordsPerPage);

// Ensure $page is within valid range
if ($page < 1) {
    $page = 1;
} elseif ($page > $totalPages) {
    $page = $totalPages;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
<style>
            .products-section {
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Subtle box-shadow for depth */
    margin-bottom: 20px;
    background-color: #fff; /* Optional: Add a background color */
    transition: box-shadow 0.3s; /* Smooth transition for box-shadow */
    }
    #productsTable {
        width: 100%  ;
        border-spacing: 0  ;
    }

    

    #productsTable th,
    #productsTable td {
        padding: 10px  ;
        text-align: left;
    }

    .copy-button {
        padding: 5px 10px;
        background-color: #007bff;
        color: white;
        border: none;
        cursor: pointer;
    }
    #productsTable th {    
        color: #656565  ; /* White text for header */
        white-space: nowrap;
        font-family: Segoe UI;
        font-size: 12px;
    }

    #productsTable tbody tr {
        transition: background-color 0.3s  ;
    }

    #productsTable tbody tr:hover {
        background-color: #ecf0f1  ; /* Light gray background on hover */
    }

    #productsTable a:hover {
        color: #c0392b; /* Darker red on hover */
    }
    #productsTable tbody tr.active {
        background-color: rgba(254, 60, 0, 0.3); /* Adjust the last value (alpha) for opacity */
    }
    .custom-column-width {
    width: 10%  ; /* Adjust the width as needed */
    }
    .custom-font-size td {
    font-size: 12px;
    white-space: nowrap;
    
    }

    .table-responsive {
        overflow-x: auto;
    }
    .btn {
        padding-left: 1000px;
    }
    /* Default styles for the search bar */
    .input-group {
        margin-bottom: 15px;
    }

    #searchInput {
        max-width: 100%;
        width: 100%;
    }

    /* Responsive styles using media queries */
    @media (min-width: 576px) {
        /* Adjust styles for phones and larger screens */
        .searchAdjust {
            max-width: 400px;  /* Set a specific max-width for phones */
            width: 100%;  
                /* Allow it to take full width if needed */
        }
    }
    @media (min-width: 614px) {
        /* Adjust styles for phones and larger screens */
        .searchAdjust {
            max-width: 400px;  /* Set a specific max-width for phones */
            width: 100%;      /* Allow it to take full width if needed */
        }
    }

    @media (min-width: 1000px) {
        /* Adjust styles for PCs and larger screens */
        .searchAdjust {
            max-width: 480px;  /* Set a specific max-width for PCs */
            width: 100%;      /* Allow it to take full width if needed */
        }
    }
    
    .pagination {
        display: flex;
        list-style: none;
        padding-right: 3%;
    }

    .pagination a {
        display: inline-block;
        padding: 8px 16px;
        text-decoration: none;
        color: #333;
        margin: 0 4px;
        border-radius: 4px;
    }

    .pagination a.active,
    .pagination a:active,
    .pagination a:hover {
        background-color: #fe3c00;
        color: #fff;
    }
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
                        <h3 class="card-title" style="color: #313A46; margin-bottom: -10px">Product List</h3>
                    </div>
                    <div class="card-body">
                        <div class="products-section">
                        <div class="mb-3 d-flex justify-content-between align-items-center ml-4 mr-4">
                            <form action="products.php" method="get" class="searchAdjust form-inline mt-3 mb-3">
                                <div class=" searchAdjust">
                                    <input type="text" name="search" id="searchInput" class="searchAdjust form-control" placeholder="Search" oninput="searchProducts()">
                                </div>
                            </form>
                                <a href ="productsAdd.php" class="btn btn-success" style="color: white;">
                                    <i class="fa fa-plus"></i>
                                </a>
                        </div>
                            <div class="container-fluid">
                                <div class="table-responsive">
                                    <table class="table text-center table-bordered" id="productsTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr class="text-white">
                                                <th class="text-center">ACTION</th>
                                                <th class="text-right" style="padding-right: 50px">ID</th>
                                                <th class="text-center">BARCODE</th>
                                                <th class="text-center" style="padding-right: 150px;">PRODUCT NAME</th>
                                                <th class="text-center">
                                                    <select id="unitFilter" style="border: none; font-weight: bold; color:#656565;">
                                                        <option value="">UNIT</option>
                                                        <!-- Add options dynamically if needed -->
                                                    </select>
                                                </th>
                                                <th class="text-center">QTY</th>
                                                <th class="text-center" style="padding-right: 30px">COSTING</th>
                                                <th class="text-center" style="padding-right: 30px">REG-PRICE</th>
                                                <th class="text-center">WHOLESALE</th>
                                                <th class="text-center" style="padding-right: 33px">PROMO</th>
                                                <th class="text-center">
                                                    <select id="categoryFilter" style="border: none; font-weight: bold; color:#656565;">
                                                        <option value="">CATEGORIES</option>
                                                        <!-- Add options dynamically if needed -->
                                                    </select>
                                                </th>
                                                <th class="text-center">S-CAT</th>
                                                <th class="text-center" style="padding-right: 50px">Type</th>
                                                <th class="text-center">SELLER</th>
                                                <th class="text-center">SUPPLIER</th>
                                                <th class="text-center">WRNTY</th>
                                                <th class="text-center">DATE REGISTERED</th>
                                            </tr>
                                        </thead>
                                        <tbody class="custom-font-size" style="color: #313A46;">
                                            <?php
                                            foreach ($results as $result) {
                                                echo '<tr>
                                                        <td>
                                                            <a class="mr-2" href="#?id='.$result['ID'].'" data-bs-toggle="modal" data-bs-target="#productsModal'.$result['ID'].'"><i class="fa fa-eye"></i></a>
                                                            <a class="mr-2" href="productsEdit.php?id='.$result['ID'].'"><i class="fa fa-edit"></i></a>
                                                            <a href="productsDelete.php?id='.$result['ID'].'"><i class="fa fa-trash text-danger"></i></a>
                                                        </td>
                                                        <td class="text-truncate text-center" style="max-width: 50px;">'  .$result['ProductID'] . '</td>
                                                        <td class="text-truncate text-center" style="max-width: 100px;">' . $result['Barcode'] . '</td>
                                                       
                                                        <td class="text-truncate"  style="max-width: 150px;  position: relative;">'.'<button class="btn copy-button" style="padding: 0.25rem 0.5rem; font-size: 0.75rem;" onclick="copyToClipboard(\''.$result['Product'].'\')"><i class="fa fa-clipboard"></i></button>' .strtoupper ($result['Product']) . '</td>
                                                        <td class="text-truncate" style="max-width: 50px;">' . $result['Unit'] . '</td>
                                                        <td class="text-truncate text-right" style="max-width: 50px; ">' . $result['Quantity'] . '</td>
                                                        <td class="text-truncate text-right" style="max-width: 100px;">' . number_format($result['Costing']) . '</td>
                                                        <td class="text-truncate text-right" style="max-width: 100px;">' . number_format($result['Price']) . '</td>
                                                        <td class="text-truncate text-right" style="max-width: 100px;">' . number_format($result['Wholesale']) . '</td>
                                                        <td class="text-truncate text-right" style="max-width: 100px;">' . number_format($result['Promo']) . '</td>
                                                        <td class="text-truncate" style="max-width: 100px;">' . $result['Categories'] . '</td>
                                                        <td class="text-truncate" style="max-width: 100px;">' . $result['SubCategory'] . '</td>
                                                        <td class="text-truncate" style="max-width: 100px;">' . $result['ItemType'] . '</td>
                                                        <td class="text-truncate" style="max-width: 100px;">' .strtoupper ($result['Seller']) . '</td>
                                                        <td class="text-truncate" style="max-width: 100px;">' .strtoupper ($result['Supplier']) . '</td>
                                                        <td class="text-truncate text-right" style="max-width: 75px;">' . $result['Warranty'] . '</td>
                                                        <td class="text-truncate text-right" style="max-width: 75px;">' . $result['Date_Registered'] . '</td>
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
                                                                        <p><strong>Warranty(Months):</strong> '.$result['Warranty'].'</p>
                                                                        <p><strong>Category:</strong> '.$result['Categories'].'</p>
                                                                        <p><strong>Sub-Category:</strong> '.$result['SubCategory'].'</p>
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
                        <div class="d-flex justify-content-end mt-3">
                        <ul class="pagination">
                                <?php
                                for ($i = 1; $i <= $totalPages; $i++) {
                                    echo '<li class="' . ($i == $page ? 'active' : '') . '"><a class="page-link" style="background-color: ' . ($i == $page ? '#fe3c00; color: white;' : '') . '" href="?page=' . $i . '">' . $i . '</a></li>';
                                }
                                ?>
                            </ul>
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
    function copyToClipboard(text) {
        var textarea = document.createElement("textarea");
        textarea.value = text;
        document.body.appendChild(textarea);
        textarea.select();
        document.execCommand("copy");
        document.body.removeChild(textarea);
        alert("Text copied to clipboard: " + text);
    }
</script>


    <script>
    document.addEventListener("DOMContentLoaded", function() {
        populateDropdown("unitFilter", 4); // Index of Unit column
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
            var tdUnit = tr[i].getElementsByTagName("td")[4]; // Index of Unit column
            var tdCategory = tr[i].getElementsByTagName("td")[10]; // Index of Category column
            var tdProductName = tr[i].getElementsByTagName("td")[3]; // Index of Product Name column
            var tdBarcode = tr[i].getElementsByTagName("td")[2]; // Index of Barcode column
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
