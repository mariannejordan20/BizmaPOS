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


$sql = "SELECT ID, Barcode, Quantity, ItemType, Product, Unit, Costing, Price, Wholesale, Promo, Categories, Seller, Supplier, Date_Registered FROM products ORDER BY Categories";
$results = $conn->query($sql);

?>


<!DOCTYPE html>
<html lang="en">
<style>
    
    #stocksinTable{
        cursor: pointer;
    }
    .stocksin-section {
    border-radius: 8px;
    padding: 20px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Subtle box-shadow for depth */
    margin-bottom: 20px;
    background-color: #fff; /* Optional: Add a background color */
    transition: box-shadow 0.3s; /* Smooth transition for box-shadow */
    }
    .custom-font-size {
    font-size: 10px; /* Adjust the font size as needed */
}

    #stocksinTable {
        width: 100%  ;
        border-spacing: 0  ;
    }

    #stocksinTable th,
    #stocksinTable td {
        padding: 12px  ;
        text-align: left  ;
    }

    #stocksinTable th {    
        color: #656565 ; 
        white-space: nowrap;
        font-family: Segoe UI;
        font-size: 14px;
        text-align: left;
    }

    #stocksinTable tbody tr {
        transition: background-color 0.3s  ;
    }

    #stocksinTable tbody tr:hover {
        background-color: #ecf0f1  ; /* Light gray background on hover */
    }

    #stocksinTable a:hover {
        color: #c0392b; /* Darker red on hover */
    }
    #stocksinTable tbody tr.active {
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
        /* Default styles for the search bar */
        .input-group {
        margin-bottom: 15px;
    }

    #productSearchInput{
        max-width: 100%;
        width: 100%;
    }

        /* Responsive styles using media queries */
        @media (min-width: 576px) {
        /* Adjust styles for phones and larger screens */
        .productSearchInput {
            max-width: 400px;  /* Set a specific max-width for phones */
            width: 100%;      /* Allow it to take full width if needed */
        }
    }
    @media (min-width: 614px) {
        /* Adjust styles for phones and larger screens */
        .productSearchInput {
            max-width: 400px;  /* Set a specific max-width for phones */
            width: 100%;      /* Allow it to take full width if needed */
        }
    }

    @media (min-width: 1000px) {
        /* Adjust styles for PCs and larger screens */
        .productSearchInput {
            max-width: 480px;  /* Set a specific max-width for PCs */
            width: 100%;      /* Allow it to take full width if needed */
        }
    }


</style>


<?php include('header.php'); ?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">


<body id="page-top">
    
    <div id="wrapper">
        <?php include ('menu.php'); ?>
        <div id="content-wrapper" class="d-flex flex-column" style="background-color: #eeeeee;">
            <div id="content">
            <nav class="navbar navbar-expand navbar-light topbar static-top shadow" style="background-color: white">
            <h3 class="card-title mb-0" style="color: #313A46; font-family: Segoe UI; font-weight: bold;">STOCK IN</h3>
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>
    <ul class="navbar-nav ml-auto">
        <div class="topbar-divider d-none d-sm-block"></div>

        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo " " . $_SESSION['Name'] . " "; ?></span>
                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
            </a>
            
            
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                 aria-labelledby="userDropdown">
                 <a class="dropdown-item" href="logout.php">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                </a>
                <?php if ($_SESSION['Type'] == 'ADMIN' || $_SESSION['Type'] == 'MANAGER') { ?>
                    <a class="dropdown-item dropdown-toggle" href="#" id="configDropdown" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-cogs"></i>
                        <span style= "margin-left:5px">Config</span>
                    </a>
                    <div class="dropdown-menu shadow animated--grow-in"
                         aria-labelledby="configDropdown">
                        <a class="dropdown-item" href="userAccounts.php">User accounts</a>
                        <a class="dropdown-item" href="ipAddressList.php">IP Addresses</a>
                        
                    </div>
                  
                    
                <?php } ?>
                
            </div>
        </li>
    </ul>
</nav>



                
            





<div class="container-fluid">
    
<form action = "stocksInSaveSingle.php" method="post" enctype="multipart/form-data">

    <div class="row">

    <?php
                               

                            ?>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 mt-3">
            <div class="form-group">
                <label for="productSearchInput" class="control-label">Search Product</label>
                <input type="text" class="form-control form-control-sm rounded" id="productSearchInput" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" placeholder="Search Product" style="font-size: 16px; border: 2px solid #3498db; padding: 10px; border-radius: 1px;">
                <div id="searchResults" class="dropdown-menu" aria-labelledby="productSearchInput">
                    <!-- Search results will appear here -->
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4 mt-3">
    <div class="form-group">
        <label for="ENCNum" class="control-label">ENC No.</label>
        <!-- Display the value of EncNum from session only if it's set -->
        <input type="text" id="ENCNum" name="ENCNum" class="shadow-sm form-control form-control-sm rounded" value="" readonly>
    </div>
</div>




        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4 mt-3">
            <div class="form-group">
                <label for="CurrentDate" class="control-label">Date</label>
                <input type="text" name="CurrentDate" class="shadow-sm form-control form-control-sm rounded" value="<?php echo date('Y-m-d'); ?>" readonly>
            </div>
        </div>
    </div>
   
    <div class="row">

    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
        <div class="form-group">
            <label for="DRNum" class="control-label">DR NO.</label>
            <input type="text" name="DRNum" class="shadow-sm form-control form-control-sm rounded">
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
        <div class="form-group">
            <label for="Supplier" class="control-label">Supplier</label>
            <input type="text" name="Supplier" class="shadow-sm form-control form-control-sm rounded">
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
        <div class="form-group">
            <label for="Receiver" class="control-label">Receiver</label>
            <input type="text" name="Receiver" class="shadow-sm form-control form-control-sm rounded" value="<?php echo isset($_SESSION['Name']) ? $_SESSION['Name'] : ''; ?>"readonly>
        </div>
    </div>

   <div class="col-lg-1 col-md-1 col-sm-3 col-xs-3">
    <div class="form-group">
        <label for="TotalVal" class="control-label">Total AMT</label>
        <input type="number" id="TotalVal" name="TotalVal" class="shadow-sm form-control form-control-sm rounded" value="0.00" readonly>

    </div>
</div>

    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12" style="display: none;">
        <div class="form-group">
            <label for="ID" class="control-label">ID</label>
            <input type="text" name="ID" class="shadow-sm form-control form-control-sm rounded" readonly>
        </div>
    </div>

    <div class="col-lg-1 col-md-1 col-sm-3 col-xs-3">
        <div class="form-group">
            <label for="Barcode" class="control-label">Barcode</label>
            <input type="text" name="Barcode" class="shadow-sm form-control form-control-sm rounded" readonly>
        </div>
    </div>

    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
        <div class="form-group">
            <label for="Product" class="control-label">Product</label>
            <input type="text" name="Product" class="shadow-sm form-control form-control-sm rounded" readonly>
        </div>
    </div>

    <div class="col-lg-1 col-md-1 col-sm-3 col-xs-3">
        <div class="form-group">
            <label for="Type" class="control-label">Type</label>
            <input type="text" name="Type" class="shadow-sm form-control form-control-sm rounded" readonly>
        </div>
    </div>
    

    <div class="col-lg-1 col-md-1 col-sm-3 col-xs-3">
        <div class="form-group">
            <label for="Unit" class="control-label">Unit</label>
            <input type="text" name="Unit" class="shadow-sm form-control form-control-sm rounded"readonly>
        </div>
    </div>

    <div class="col-lg-1 col-md-1 col-sm-3 col-xs-3">
        <div class="form-group">
            <label for="Quantity" class="control-label">Quantity</label>
            <input type="number" name="Quantity" class="shadow-sm form-control form-control-sm rounded" required>
        </div>
    </div>

    <div class="col-lg-1 col-md-1 col-sm-3 col-xs-3">
        <div class="form-group">
            <label for="Costing" class="control-label">Costing</label>
            <input type="number" name="Costing" class="shadow-sm form-control form-control-sm rounded">
        </div>
    </div>

    <div class="col-lg-1 col-md-1 col-sm-3 col-xs-3">
        <div class="form-group">
            <label for="Price" class="control-label">Price</label>
            <input type="number" name="Price" class="shadow-sm form-control form-control-sm rounded">
        </div>
    </div>

    <div class="col-lg-1 col-md-1 col-sm-3 col-xs-3">
        <div class="form-group">
            <label for="Wholesale" class="control-label">Wholesale</label>
            <input type="number" name="Wholesale" class="shadow-sm form-control form-control-sm rounded">
        </div>
    </div>

    <div class="col-lg-1 col-md-1 col-sm-3 col-xs-3">
        <div class="form-group">
            <label for="Promo" class="control-label">Promo</label>
            <input type="number" name="Promo" class="shadow-sm form-control form-control-sm rounded">
        </div>
    </div>
    
    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12" id="serialNumberField" style="display: none;">
    <div class="form-group">
        <label for="ItemSerial" class="control-label">Serial</label>
        <input type="text" name="ItemSerial" class="shadow-sm form-control form-control-sm rounded">
    </div>
</div>

    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12"style="Display: None;">
        <div class="form-group">
            <label for="DeliveryNumber" class="control-label">Delivery Number</label>
            <input type="text" name="DeliveryNumber" class="form-control form-control-sm rounded-0" required>
        </div>
    </div>

    
    

    <!-- Add more input fields for other attributes here -->
</div>

<div class="row">
    <div class="col-md-12">
        <button type="submit" name="Save" value="Save" class="btn btn-success" style="float: right;"><i class="fa fa-plus"></i></button>
    </div>
</div>   
    

</form>
<div class="row">
    <div class="col-md-12">
        <h5>Products to Stock In</h5>
        <div class="table-responsive" style="max-height: 340px; overflow-y: scroll;">
            <table class="table text-sm text-center table-bordered" style="font-size: 13px; font-weight:bold;" id="stockInListTable">
                <thead style="background-color: #313a46; color: #fff;">
                    <tr>
                        <th>ACT</th>
                        <th>BCODE</th>
                        <th>NAME</th>
                        <th>TYPE</th>
                        <th>Unit</th>
                        <th>QTY</th>
                        <th>CST</th>
                        <th>SRP</th>
                        <th>WS</th>
                        <th>PR</th>
                        <th>DR NO.</th>
                        <th>Splr</th>
                        <th>Rcvr</th>
                        <th>SERIAL</th>
                        <th style="display:none">ENC</th>
                        <th>T-AMT</th>
                        
                        
                        

                    </tr>
                </thead>
                <tbody class="custom-font-size">
    <!-- Placeholder for products to be stocked -->
    
    <!-- Add more rows for other products -->
</tbody>

            </table>
        </div>
        <button id="stockInButton" class="btn btn-success">Stock In Products</button>
    </div>
</div>




    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    

    <!-- Bootstrap core JavaScript-->
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

<!-- SweetAlert -->
<script src="js/sweetalert2.all.min.js"></script>
<script src="js/sweetalert.min.js"></script>



<!-- Your custom script -->
<script>
$(document).ready(function(){
    var firstTimeClicked = true;
     // Flag to track if it's the first time clicking the Add button
   
    // Function to check if there are products in the to be stocked in table
    function checkStockInTable() {
        return $('#stockInListTable tbody tr').length > 0;
    }

    // Update the Stock In button state based on the presence of products in the table
    function updateStockInButtonState() {
        var isTableEmpty = !checkStockInTable();
        $('#stockInButton').prop('disabled', isTableEmpty);
    }

    // Function to calculate and update the total amount
   function updateTotalAmount() {
    var totalAmount = 0;
    var hasDecimal = false; // Flag to check if any decimal value is encountered

    $('#stockInListTable tbody tr').each(function() {
        var quantity = parseFloat($(this).find('td:eq(6)').text());
        var costing = parseFloat($(this).find('td:eq(7)').text());
        totalAmount += quantity * costing;

        // Check if any decimal value is encountered
        if (quantity % 1 !== 0 || costing % 1 !== 0) {
            hasDecimal = true;
        }
    });

    // Choose appropriate precision based on whether decimal values are present
    var precision = hasDecimal ? 2 : 0;
    $('#TotalVal').val(totalAmount.toFixed(precision));
}


    // Function to update the products to be stocked table
    function updateStockInList(productId, barcode, product, type, unit, quantity, costing, price, wholesale, promo, deliverynum, supplier, receiver,itemserial,encnum,totalvalrow) {

        
        var totalvalrow = parseFloat(costing) * parseFloat(quantity);
if (Number.isInteger(totalvalrow)) {
    totalvalrow = totalvalrow.toFixed(0); // Convert to string without decimal part
} else {
    totalvalrow = totalvalrow.toFixed(2); // Keep two decimal places if not a whole number
}


        var newRow = "<tr>" +
        "<td>" + productId + "</td>" +
        "<td><button type='button' class='btn btn-danger btn-sm remove-product' data-product-id='" + productId + "'><i class='fas fa-trash'></i></button>" +
            "<button type='button' class='btn btn-primary btn-sm edit-product'><i class='fas fa-refresh'></i></button></td>" +
            "<td>" + barcode + "</td>" +
            "<td>" + product + "</td>" +
            "<td>" + type + "</td>" +
            "<td>" + unit + "</td>" +
            "<td>" + quantity + "</td>" +
            "<td>" + costing + "</td>" +
            "<td>" + price + "</td>" +
            "<td>" + wholesale + "</td>" +
            "<td>" + promo + "</td>" +
            "<td>" + deliverynum + "</td>" +
            "<td>" + supplier + "</td>" +
            "<td>" + receiver + "</td>" +
            "<td>" + itemserial + "</td>" +
            "<td>" + encnum + "</td>" +
            "<td>" + totalvalrow + "</td>" +

            "</tr>";

        $('#stockInListTable tbody').append(newRow);
        updateStockInButtonState();
        updateTotalAmount(); // Update total amount after adding the new row
    }
   function removeProductFromList(row) {
    var productId = row.find('td:first').text(); // Get product ID from the first column of the row
    
    // Confirmation dialog before deletion
    Swal.fire({
        title: 'Are you sure?',
        text: 'You won\'t be able to revert this!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            // If confirmed, delete the product
            deleteProductFromDatabase(productId, row);
        }
    });
}

function deleteProductFromDatabase(productId, row) {
    $.ajax({
        url: 'stocksInTableDelete.php', // URL to delete script
        type: 'POST',
        data: { productId: productId }, // Data to send to the server
        success: function(response) {
            // Handle success response
            console.log('Product deleted from the database');
            row.remove();
            updateStockInButtonState();
            updateTotalAmount();
            Swal.fire(
                'Deleted!',
                'Your product has been deleted.',
                'success'
            );
        },
        error: function(xhr, status, error) {
            // Handle error response
            console.error('Error deleting product:', error);
            Swal.fire(
                'Error!',
                'An error occurred while deleting the product.',
                'error'
            );
        }
    });
}
    // Event delegation for handling click event on edit buttons
    $('#stockInListTable').on('click', '.edit-product', function() {
        var row = $(this).closest('tr');
        var barcode = row.find('td:eq(2)').text();
        var product = row.find('td:eq(3)').text();
        var type = row.find('td:eq(4)').text();
        var unit = row.find('td:eq(5)').text();
        var quantity = row.find('td:eq(6)').text();
        var costing = row.find('td:eq(7)').text();
        var price = row.find('td:eq(8)').text();
        var wholesale = row.find('td:eq(9)').text();
        var promo = row.find('td:eq(10)').text();
        var deliverynum = row.find('td:eq(11)').text();
        var supplier = row.find('td:eq(12)').text();
        var receiver = row.find('td:eq(13)').text();
        var itemserial = row.find('td:eq(14)').text();

        $('input[name="Barcode"]').val(barcode);
        $('input[name="Product"]').val(product);
        $('input[name="Type"]').val(type);
        $('input[name="Unit"]').val(unit);
        $('input[name="Quantity"]').val(quantity);
        $('input[name="Costing"]').val(costing);
        $('input[name="Price"]').val(price);
        $('input[name="Wholesale"]').val(wholesale);
        $('input[name="Promo"]').val(promo);
        $('input[name="DRNum"]').val(deliverynum);
        $('input[name="Supplier"]').val(supplier);
        $('input[name="Receiver"]').val(receiver);
        $('input[name="ItemSerial"]').val(itemserial);

        row.remove();
        updateStockInButtonState();
        updateTotalAmount(); // Update total amount after removing the row
    });

    // Event delegation for handling click event on remove buttons
    $('#stockInListTable').on('click', '.remove-product', function() {
        var row = $(this).closest('tr');
        removeProductFromList(row);
    });


    // Event delegation for handling click event on search results
    $('#searchResults').on('click', '.product-item', function(){
        var productId = $(this).data('product-id');
        var barcode = $(this).data('barcode');
        var product = $(this).data('product');
        var type = $(this).data('type');
        var unit = $(this).data('unit');
        var quantity = $(this).data('quantity');
        var costing = $(this).data('costing');
        var price = $(this).data('price');
        var wholesale = $(this).data('wholesale');
        var promo = $(this).data('promo');
        var warranty = $(this).data('warranty');
        var categories = $(this).data('categories');
        var subcategories = $(this).data('subcategories');
        var seller = $(this).data('seller');
        var supplier = $(this).data('supplier');

        $('input[name="ID"]').val(productId);
        $('input[name="Barcode"]').val(barcode);
        $('input[name="Product"]').val(product);
        $('input[name="Type"]').val(type);
        $('input[name="Unit"]').val(unit);
        $('input[name="Quantity"]').val(quantity);
        $('input[name="Costing"]').val(costing);
        $('input[name="Price"]').val(price);
        $('input[name="Wholesale"]').val(wholesale);
        $('input[name="Promo"]').val(promo);
        $('input[name="Warranty"]').val(warranty);
        $('input[name="Categories"]').val(categories);
        $('input[name="SubCategories"]').val(subcategories);
        $('input[name="Seller"]').val(seller);
        $('input[name="Supplier"]').val(supplier);

        console.log("Type: " + type);

        if(type === 'W/ SERIAL') {
            $('input[name="Quantity"]').val(1);
            $('input[name="Quantity"]').prop('readonly', true);
            $('#serialNumberField').show();
        } else {
            $('input[name="Quantity"]').val(quantity);
            $('input[name="Quantity"]').prop('readonly', false);
            $('#serialNumberField').hide();
        }

        updateStockInButtonState();
        updateTotalAmount(); // Update total amount after adding the new row
    });

    // Function to perform live search
    $('#productSearchInput').on('keyup', function(){
        var searchText = $(this).val();
        $.ajax({
            url: 'searchProducts.php',
            type: 'POST',
            data: { searchText: searchText },
            success: function(response){
                $('#searchResults').html(response);
            }
        });
    });

    // Event handler when clicking the Add button
    var firstTimeClicked = true; // Flag to determine if it's the first time Add button clicked

$('button[name="Save"]').click(function() {
    if (firstTimeClicked) {
        getMaxEncodeNumber(); // Call getMaxEncodeNumber only the first time
    } else {
        insertData(); // Call insertData directly if not the first time
    }
});

function insertData() {
    // AJAX request to fetch the maximum ID from stocksintry table
    $.ajax({
        url: 'getMaxIDstocksLogs.php',
        type: 'GET',
        success: function(maxID) {
            var productId = parseInt(maxID) + 1; // Increment maxID by 1 to get the new productId

            // Now you can use the generated productId
            var barcode = $('input[name="Barcode"]').val();
            var product = $('input[name="Product"]').val();
            var type = $('input[name="Type"]').val();
            var unit = $('input[name="Unit"]').val();
            var quantity = $('input[name="Quantity"]').val();
            var costing = $('input[name="Costing"]').val();
            var price = $('input[name="Price"]').val();
            var wholesale = $('input[name="Wholesale"]').val();
            var promo = $('input[name="Promo"]').val();
            var deliverynum = $('input[name="DRNum"]').val();
            var supplier = $('input[name="Supplier"]').val();
            var receiver = $('input[name="Receiver"]').val();
            var itemserial = $('input[name="ItemSerial"]').val();
            var encnum = $('input[name="ENCNum"]').val();

            // Validate fields
            if (quantity.trim() === "" || deliverynum.trim() === "" || product.trim() === "") {
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: 'Please fill in required fields.',
                });
                return;
            }
            if (type === 'W/ SERIAL' && $('input[name="ItemSerial"]').val().trim() === "") {
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: 'Serial Number field is required.',
                });
                return;
            }

            // Check for duplicate serial number
            if ($('input[name="ItemSerial"]').val().trim() !== "") {
                var exists = false;
                $('#stockInListTable tbody tr').each(function() {
                    var existingSerialNumber = $(this).find('td:eq(14)').text();
                    if (existingSerialNumber === itemserial) {
                        exists = true;
                        return false; // Exit the loop early if serial number is found
                    }
                });
                if (exists) {
                    Swal.fire({
                        icon: 'question',
                        title: 'Duplicate Serial Number',
                        text: 'Serial number already exists in the table. Do you want to proceed?',
                        showCancelButton: true,
                        confirmButtonText: 'Yes',
                        cancelButtonText: 'No',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            updateStockInList(productId, barcode, product, type, unit, quantity, costing, price, wholesale, promo, deliverynum, supplier, receiver, itemserial, encnum);
                            $('input[name="ItemSerial"]').val('');
                        }
                    });
                    return;
                }
            }

            // Update stock in list
            updateStockInList(productId, barcode, product, type, unit, quantity, costing, price, wholesale, promo, deliverynum, supplier, receiver, itemserial, encnum);
            $('input[name="ItemSerial"]').val('');

            // Prepare data object for AJAX request
            var data = {
                productId: productId,
                barcode: barcode,
                product: product,
                type: type,
                unit: unit,
                quantity: quantity,
                costing: costing,
                price: price,
                wholesale: wholesale,
                promo: promo,
                deliverynum: deliverynum,
                supplier: supplier,
                receiver: receiver,
                itemserial: itemserial,
                encnum: encnum
            };

            // Send AJAX request to insert the data into the database
            $.ajax({
                url: 'stocksInSaveSingle.php', // Always use stocksInSaveSingle.php
                type: 'POST',
                data: data,
                success: function(response) {
                    // Update the table with the newly inserted data
                    console.log('Data inserted successfully:', response);
                },
                error: function(xhr, status, error) {
                    // Handle error response
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'An error occurred while inserting the record.',
                        footer: '<pre>' + xhr.responseText + '</pre>'
                    });
                }
            });
            firstTimeClicked = false; // Update the flag after the first click
        },
        error: function(xhr, status, error) {
            // Handle error response
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: 'An error occurred while fetching the maximum ID.',
                footer: '<pre>' + xhr.responseText + '</pre>'
            });
        }
    });
}

function getMaxEncodeNumber() {
    $.ajax({
        url: 'getMaxEncodeNumber.php',
        type: 'GET',
        success: function(response) {
            $('input[name="ENCNum"]').val(response);
            // Once getMaxEncodeNumber finishes, proceed with the rest of the code
            insertData();
        },
        error: function(xhr, status, error) {
            // Error handling
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: 'An error occurred while fetching max encode number.',
                footer: '<pre>' + xhr.responseText + '</pre>'
            });
        }
    });
}




  

    

    // Initialize the Stock In button state
    updateStockInButtonState();
});
</script>



<!-- Include your delete.js script here -->
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