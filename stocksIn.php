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
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the products array is set in the POST data
    if (isset($_POST['products'])) {
        // Decode the JSON data sent via AJAX
        $productsToStockIn = json_decode($_POST['products'], true);

        // Prepare and execute the SQL insert statements for each product
        $stmt = $conn->prepare("INSERT INTO productsstocks (Barcode, ProductName, ItemSerial, Unit, Quantity) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssi", $barcode, $product, $type, $unit, $quantity);
        
        foreach ($productsToStockIn as $product) {
            $barcode = $product['barcode'];
            $product = $product['product'];
            $type = $product['type'];
            $unit = $product['unit'];
            $quantity = $product['quantity'];
            $stmt->execute();
        }
        $stmt->close();

        // Send a success response back to the client
        echo "Products successfully stocked in.";
    } else {
        // Send an error response back to the client
        http_response_code(400);
        echo "No products data received.";
    }
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
            <?php include('navbar.php'); ?>
                
            <nav class="navbar navbar-expand navbar-light  topbar static-top shadow" style="background-color: white">
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>
    <div class="card-header d-flex justify-content-start align-items-left" style="background-color: white; border: none">
    <h3 class="card-title mb-0" style="color: #313A46; font-family: Segoe UI; font-weight: bold;">STOCK IN</h3>
</div>
    
</nav>


<div class="container-fluid">
        <div class="dropdown">
            <input type="text" class="form-control dropdown-toggle" id="productSearchInput" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" placeholder="Search Product">
            <div id="searchResults" class="dropdown-menu" aria-labelledby="productSearchInput">
                <!-- Search results will appear here -->
            </div>
        </div>
    </div>
    <form action="">
    <div class="row">
    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12" style="display: none;">
        <div class="form-group">
            <label for="ID" class="control-label">ID</label>
            <input type="text" name="ID" class="form-control form-control-sm rounded-0" readonly>
        </div>
    </div>

    <div class="col-lg-1 col-md-1 col-sm-3 col-xs-3">
        <div class="form-group">
            <label for="Barcode" class="control-label">Barcode</label>
            <input type="text" name="Barcode" class="form-control form-control-sm rounded-0" readonly>
        </div>
    </div>

    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
        <div class="form-group">
            <label for="Product" class="control-label">Product</label>
            <input type="text" name="Product" class="form-control form-control-sm rounded-0" readonly>
        </div>
    </div>

    <div class="col-lg-1 col-md-1 col-sm-3 col-xs-3">
        <div class="form-group">
            <label for="Type" class="control-label">Type</label>
            <input type="text" name="Type" class="form-control form-control-sm rounded-0" readonly>
        </div>
    </div>

    <div class="col-lg-1 col-md-1 col-sm-3 col-xs-3">
        <div class="form-group">
            <label for="Unit" class="control-label">Unit</label>
            <input type="text" name="Unit" class="form-control form-control-sm rounded-0"readonly>
        </div>
    </div>
    <div class="col-lg-1 col-md-1 col-sm-3 col-xs-3">
        <div class="form-group">
            <label for="Quantity" class="control-label">Quantity</label>
            <input type="number" name="Quantity" class="form-control form-control-sm rounded-0" required>
        </div>
    </div>

    <div class="col-lg-1 col-md-1 col-sm-3 col-xs-3">
        <div class="form-group">
            <label for="Costing" class="control-label">Costing</label>
            <input type="number" name="Costing" class="form-control form-control-sm rounded-0">
        </div>
    </div>

    <div class="col-lg-1 col-md-1 col-sm-3 col-xs-3">
        <div class="form-group">
            <label for="Price" class="control-label">Price</label>
            <input type="number" name="Price" class="form-control form-control-sm rounded-0">
        </div>
    </div>

    <div class="col-lg-1 col-md-1 col-sm-3 col-xs-3">
        <div class="form-group">
            <label for="Wholesale" class="control-label">Wholesale</label>
            <input type="number" name="Wholesale" class="form-control form-control-sm rounded-0">
        </div>
    </div>

    <div class="col-lg-1 col-md-1 col-sm-3 col-xs-3">
        <div class="form-group">
            <label for="Promo" class="control-label">Promo</label>
            <input type="number" name="Promo" class="form-control form-control-sm rounded-0">
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
        <div class="form-group">
            <label for="DeliveryNumber" class="control-label">Delivery Number</label>
            <input type="text" name="DeliveryNumber" class="form-control form-control-sm rounded-0" required>
        </div>
    </div>
    

    <!-- Add more input fields for other attributes here -->
</div>

<div class="row">
    <div class="col-md-12">
        <button type="submit" name="Save" value="Save" class="btn btn-success" style="float: right;">Add</button>
    </div>
</div>   
    
</form>

<div class="row">
    <div class="col-md-12">
        <h2>Products to Stock In</h2>
        <table class="table text-center table-bordered" id="stockInListTable">
            <thead>
                <tr>
                <th>Action</th>
                    <th>Barcode</th>
                    <th>Product Name</th>
                    <th>Type</th>
                    <th>Unit</th>
                    <th>Quantity</th>
                    <th>Costing</th>
                    <th>Price</th>
                    <th>Wholesale</th>
                    <th>Promo</th>
                    
                </tr>
            </thead>
            <tbody>
                <!-- Placeholder for products to be stocked -->
                
                <!-- Add more rows for other products -->
            </tbody>
        </table>
        <button id="stockInButton" class="btn btn-success">Stock In Products</button>
    </div>
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

    // Function to update the products to be stocked table
    function updateStockInList(productId, barcode, product, type, unit, quantity, costing, price, wholesale, promo) {
        var newRow = "<tr>" +
            "<td><button type='button' class='btn btn-danger btn-sm remove-product'><i class='fas fa-trash'></i></button>" + // Remove button with trash icon
            "<button type='button' class='btn btn-primary btn-sm edit-product'><i class='fas fa-edit'></i></button></td>" + // Edit button with edit icon
            "<td>" + barcode + "</td>" +
            "<td>" + product + "</td>" +
            "<td>" + type + "</td>" +
            "<td>" + unit + "</td>" +
            "<td>" + quantity + "</td>" +
            "<td>" + costing + "</td>" +
            "<td>" + price + "</td>" +
            "<td>" + wholesale + "</td>" +
            "<td>" + promo + "</td>" +
            "</tr>";

        // Append the new row to the table body
        $('#stockInListTable tbody').append(newRow);
    }

    // Function to remove product from the stock list
    function removeProductFromList(row) {
        row.remove(); // Remove the row from the table
    }

    // Event delegation for handling click event on edit buttons
    $('#stockInListTable').on('click', '.edit-product', function() {
        var row = $(this).closest('tr'); // Get the closest row
        // Retrieve the product details from the row and populate the input fields
        var barcode = row.find('td:eq(1)').text();
        var product = row.find('td:eq(2)').text();
        var type = row.find('td:eq(3)').text();
        var unit = row.find('td:eq(4)').text();
        var quantity = row.find('td:eq(5)').text();
        var costing = row.find('td:eq(6)').text();
        var price = row.find('td:eq(7)').text();
        var wholesale = row.find('td:eq(8)').text();
        var promo = row.find('td:eq(9)').text();

        // Update input fields with product details
        $('input[name="Barcode"]').val(barcode);
        $('input[name="Product"]').val(product);
        $('input[name="Type"]').val(type);
        $('input[name="Unit"]').val(unit);
        $('input[name="Quantity"]').val(quantity);
        $('input[name="Costing"]').val(costing);
        $('input[name="Price"]').val(price);
        $('input[name="Wholesale"]').val(wholesale);
        $('input[name="Promo"]').val(promo);

        // Remove the row from the table
        row.remove();
    });

    // Event delegation for handling click event on remove buttons
    $('#stockInListTable').on('click', '.remove-product', function() {
        var row = $(this).closest('tr'); // Get the closest row
        removeProductFromList(row); // Remove the product from the stock list
    });

    // Event delegation for handling click event on search results
    $('#searchResults').on('click', '.product-item', function(){
        // Get product details from data attributes
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

        // Update input fields with product details
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
    });

    // Event handler when clicking the Add button
   // Event handler when clicking the Add button
$('button[name="Save"]').click(function(){
    // Get the values from the form fields
    var productId = $('input[name="ID"]').val();
    var barcode = $('input[name="Barcode"]').val();
    var product = $('input[name="Product"]').val();
    var type = $('input[name="Type"]').val();
    var unit = $('input[name="Unit"]').val();
    var quantity = $('input[name="Quantity"]').val();
    var costing = $('input[name="Costing"]').val();
    var price = $('input[name="Price"]').val();
    var wholesale = $('input[name="Wholesale"]').val();
    var promo = $('input[name="Promo"]').val();

    // Check if quantity is not empty
    if(quantity.trim() === "") {
        // Show an alert or message indicating that quantity is required
        Swal.fire({
            icon: 'error',
            title: 'Error!',
            text: 'Quantity field is required.',
        });
        return; // Exit the function to prevent further execution
    }

    // Update the products to be stocked table
    updateStockInList(productId, barcode, product, type, unit, quantity, costing, price, wholesale, promo);
});


    // Event handler when clicking the Stock In button
    $('#stockInButton').click(function() {
        var productsToStockIn = [];
        $('#stockInListTable tbody tr').each(function() {
            var row = $(this);
            var barcode = row.find('td:eq(1)').text();
            var product = row.find('td:eq(2)').text();
            var type = row.find('td:eq(3)').text();
            var unit = row.find('td:eq(4)').text();
            var quantity = row.find('td:eq(5)').text();
            var costing = row.find('td:eq(6)').text();
            var price = row.find('td:eq(7)').text();
            var wholesale = row.find('td:eq(8)').text();
            var promo = row.find('td:eq(9)').text();
            productsToStockIn.push({
                barcode: barcode,
                product: product,
                type: type,
                unit: unit,
                quantity: quantity,
                costing: costing,
                price: price,
                wholesale: wholesale,
                promo: promo
            });
        });

        // Send all products to the server for insertion
        $.ajax({
            url: 'stocksInSave.php',
            type: 'POST',
            data: { products: JSON.stringify(productsToStockIn) },
            success: function(response) {
                // Handle the response from the server
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: response,
                    showConfirmButton: false,
                    timer: 1500 // Close the alert after 1.5 seconds
                });
            },
            error: function(xhr, status, error) {
                // Handle errors
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: 'An error occurred while stocking in products.',
                    footer: '<pre>' + xhr.responseText + '</pre>' // Display the error message
                });
            }
        });
    });
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