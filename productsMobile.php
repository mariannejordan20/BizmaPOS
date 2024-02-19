<?php
session_start();   

include('connection.php');



$sql = "SELECT ID, ProductID, Barcode, Product, ItemType, Warranty, Unit, Quantity, Costing, Price, Wholesale, Promo, Categories, SubCategory, Seller, Supplier, Date_Registered 
        FROM products 
        ORDER BY Categories";
        
$results = $conn->query($sql);

    

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
    margin-bottom: 30px;
    background-color: #fff; /* Optional: Add a background color */
    transition: box-shadow 0.3s; /* Smooth transition for box-shadow */
    }
    #productsTable {
        width: 100%  ;
        border-spacing: 0  ;
        padding-top: 0;
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
        text-align: left;
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
        margin-bottom: 0px;
        padding-bottom: -10px;
    }

    #searchInput {
        max-width: 100%;
        width: 100%;
        margin-bottom: 0px;
        padding-bottom: -10px;
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
       
        <div id="content-wrapper" class="d-flex flex-column" style="background-color: #eeeeee;">
            <div id="content">
            <nav class="navbar navbar-expand na vbar-light  topbar static-top shadow" style="background-color: white">
            <h3 class="card-title" style="color: #313A46; margin-bottom: -10px">BizMaTech Products</h3>

    <ul class="navbar-nav ml-auto">
        <div class="topbar-divider d-none d-sm-block"></div>

        <li class="nav-item dropdown no-arrow">
        </li>
    </ul>
</nav>
                <div >
                    <div>
                        <div class="products-section">
                        <div class="mb-3 d-flex justify-content-between align-items-center ml-1 mr-1">
                            <form action="products.php" method="get" class="searchAdjust form-inline mt-3 mb-3">
                                <div class=" searchAdjust">
                                    <input type="text" name="search" id="searchInput" class="searchAdjust form-control" placeholder="Search" oninput="searchProducts()">
                                </div>
                            </form>
                            <div id="searchResultInfo"></div>
                        </div>
                            <div >
                                <div class="table-responsive">
                                    <table class="table text-center table-bordered" id="productsTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr class="text-white">
                                                <th class="text-left" style="padding-right: 40px;">PRODUCT NAME</th>
                                                <th class="text-center" style="padding-right: 20px">COST</th>
                                                <th class="text-center" style="padding-right: 20px">SRP</th>
                                            </tr>
                                        </thead>
                                        <tbody class="custom-font-size" style="color: #313A46;">
                                        <?php
foreach ($results as $result) {
    echo '<tr data-product-id="' . $result['ID'] . '">
            <td class="text-truncate"  style="max-width: 150px;  position: relative;">'.'<button class="btn copy-button" style="padding: 0.25rem 0.5rem; font-size: 0.75rem;" onclick="copyToClipboard(\''.$result['Product'].'\')"><i class="fa fa-clipboard"></i></button>' .strtoupper ($result['Product']) . '</td>
            <td class="text-truncate text-right" style="max-width: 100px;">' . number_format($result['Costing']) . '</td>
            <td class="text-truncate text-right" style="max-width: 100px;">' . number_format($result['Price']) . '</td>
        </tr>';


                                                    
                                                    
                                                }
                                            ?>

<?php
foreach ($results as $result) {
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
                            <p><strong>Quantity:</strong> '.$result['Quantity'].'</p>
                            <p><strong>Costing:</strong> '.$result['Costing'].'</p>
                            <p><strong>SRP</strong> '.$result['Price'].'</p>
                            <p><strong>Wholesale Price:</strong> '.$result['Wholesale'].'</p>
                            <p><strong>Promo Price:</strong> '.$result['Promo'].'</p>
                            <p><strong>Warranty(Months):</strong> '.$result['Warranty'].'</p>
                            <p><strong>Category:</strong> '.$result['Categories'].'</p>
                            <p><strong>Sub-Category:</strong> '.$result['SubCategory'].'</p>
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
        // Function to open the modal with the specified ID
        function openModal(productId) {
            var modalId = 'productsModal' + productId;
            $('#' + modalId).modal('show');
        }

        // Attach click event listener to each row to open the modal
        $(document).ready(function() {
            $('#productsTable tbody tr').click(function() {
                // Get the product ID from the row's data attribute
                var productId = $(this).data('product-id');
                openModal(productId);
            });
        });
    </script>


<script>
    function filterTable() {
        var searchInput = document.getElementById("searchInput").value.toUpperCase();
        var table = document.getElementById("productsTable");
        var tr = table.getElementsByTagName("tr");

        for (var i = 1; i < tr.length; i++) {
            var tdProductName = tr[i].getElementsByTagName("td")[0]; // Index of Product Name column
            if (tdProductName) {
                var productNameMatch = tdProductName.textContent.toUpperCase().indexOf(searchInput) > -1;
                if (productNameMatch) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }

    document.getElementById("searchInput").addEventListener("keyup", filterTable);
</script>

<script>
    function filterTable() {
        var searchInput = document.getElementById("searchInput").value.toUpperCase();
        var table = document.getElementById("productsTable");
        var tr = table.getElementsByTagName("tr");
        var searchCount = 0;

        for (var i = 1; i < tr.length; i++) {
            var tdProductName = tr[i].getElementsByTagName("td")[0]; // Index of Product Name column
            if (tdProductName) {
                var productNameMatch = tdProductName.textContent.toUpperCase().indexOf(searchInput) > -1;
                if (productNameMatch) {
                    tr[i].style.display = "";
                    searchCount++;
                } else {
                    tr[i].style.display = "none";
                }
            }
        }

        var totalCount = tr.length - 1; // Excluding the header row
        document.getElementById("searchResultInfo").innerText = " " + searchCount + " out of " + totalCount + " products";
    }

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
