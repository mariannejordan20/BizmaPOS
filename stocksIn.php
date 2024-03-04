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



                
            <nav class="navbar navbar-expand navbar-light  topbar static-top shadow" style="background-color: white">
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>
    <div class="card-header d-flex justify-content-start align-items-left" style="background-color: white; border: none">
    <h3 class="card-title mb-0" style="color: #313A46; font-family: Segoe UI; font-weight: bold;">STOCK IN</h3>
</div>
    
</nav>





<div class="container-fluid">
    
<div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="signupModalLabel">Sign Up</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class ="fas fa-close"> </i></button>
      </div>
      <div class="modal-body">
        <!-- Sign Up Form -->
        <form id="signupForm" action="createUser.php" method="POST">
          <div class="mb-3">
            <label for="signupUsername" class="form-label">Username</label>
            <input type="text" class="form-control" id="signupUsername" name="signupUsername">
          </div>
          <div class="mb-3">
            <label for="signupPassword" class="form-label">Password</label>
            <input type="password" class="form-control" id="signupPassword" name="signupPassword">
          </div>
          <div class="mb-3">
            <label for="signupConfirmPassword" class="form-label">Re-enter Password</label>
            <input type="password" class="form-control" id="signupConfirmPassword" name="signupConfirmPassword">
          </div>
          <div class="mb-3">
            <label for="NameOfUser" class="form-label">Name</label>
            <input type="text" class="form-control" id="NameOfUser" name="NameOfUser">
          </div>

          <div class="mb-3">
            <label for="signupRole" class="form-label">Role</label>
            <select class="form-select" id="signupRole" name="signupRole">
              <option value="" selected disabled>Choose Role</option>
              <option value="admin">Admin</option>
              <option value="staff">Staff</option>
            </select>
          </div>
         
          <button type="submit" class="btn btn-block fa-lg" style="background-color: #ff3c00; color: white; font-weight: bold; padding:5px; padding-right: 1rem; padding-left: 1rem; font-size:12px;">Sign Up</button>
        </form>
      </div>
    </div>
  </div>
</div>
    
        <div class="dropdown">
            <input type="text" class="form-control dropdown-toggle" id="productSearchInput" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" placeholder="Search Product">
            <div id="searchResults" class="dropdown-menu" aria-labelledby="productSearchInput">
                <!-- Search results will appear here -->
            </div>
        </div>
    </div>
    <form action="">
    <div class="row">

    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
        <div class="form-group">
            <label for="DRNum" class="control-label">DR NO.</label>
            <input type="text" name="DRNum" class="form-control form-control-sm rounded-0">
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
        <div class="form-group">
            <label for="Supplier" class="control-label">Supplier</label>
            <input type="text" name="Supplier" class="form-control form-control-sm rounded-0">
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
        <div class="form-group">
            <label for="Receiver" class="control-label">Receiver</label>
            <input type="text" name="Receiver" class="form-control form-control-sm rounded-0" value="<?php echo isset($_SESSION['Name']) ? $_SESSION['Name'] : ''; ?>"readonly>
        </div>
    </div>

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
    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12" id="serialNumberField" style="display: none;">
    <div class="form-group">
        <label for="ItemSerial" class="control-label">Serial</label>
        <input type="text" name="ItemSerial" class="form-control form-control-sm rounded-0">
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
        <button type="submit" name="Save" value="Save" class="btn btn-success" style="float: right;">Add</button>
    </div>
</div>   
    
</form>
<div class="row">
    <div class="col-md-12">
        <h2>Products to Stock In</h2>
        <div class="table-responsive" style="max-height: 340px; overflow-y: scroll;">
            <table class="table text-center table-bordered" id="stockInListTable">
                <thead>
                    <tr>
                        <th>Action</th>
                        <th>Barcode</th>
                        <th>Product Name</th>
                        <th>Type</th>
                        <th>Unit</th>
                        <th>Qty</th>
                        <th>Cost</th>
                        <th>SRP</th>
                        <th>WS</th>
                        <th>PR</th>
                        <th>DR NO.</th>
                        <th>Splr</th>
                        <th>Rcvr</th>
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
    function updateStockInList(productId, barcode, product, type, unit, quantity, costing, price, wholesale, promo,deliverynum,supplier,receiver) {
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
            "<td>" + deliverynum + "</td>" +
            "<td>" + supplier + "</td>" +
            "<td>" + receiver + "</td>" +
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
        var deliverynum = row.find('td:eq(10)').text();
        var supplier = row.find('td:eq(11)').text();
        var receiver = row.find('td:eq(12)').text();

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
        $('input[name="DRNum"]').val(deliverynum);
        $('input[name="Supplier"]').val(supplier);
        $('input[name="Receiver"]').val(receiver);

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

    // Log the retrieved type for debugging
    console.log("Type: " + type);

    // Show/hide serial number field based on product type
    if(type === 'W/ SERIAL') {
        $('#serialNumberField').show();
    } else {
        $('#serialNumberField').hide();
    }
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
    var deliverynum = $('input[name="DRNum"]').val();
    var supplier = $('input[name="Supplier"]').val();
    var receiver = $('input[name="Receiver"]').val();

    // Check if quantity is not empty
    if(quantity.trim() === "" || deliverynum.trim() === "") {
        // Show an alert or message indicating that quantity is required
        Swal.fire({
            icon: 'error',
            title: 'Error!',
            text: 'Quantity or Delivery Number field is required.',
        });
        return; // Exit the function to prevent further execution
    }

    // Update the products to be stocked table
    updateStockInList(productId, barcode, product, type, unit, quantity, costing, price, wholesale, promo, deliverynum,supplier,receiver);
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
            var deliverynum = row.find('td:eq(10)').text();
            var supplier = row.find('td:eq(11)').text();
            var receiver = row.find('td:eq(12)').text();
            productsToStockIn.push({
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
                receiver: receiver
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

<script>
  document.getElementById('signupForm').addEventListener('submit', function(event) {
    
    event.preventDefault();

  
    var username = document.getElementById('signupUsername').value.trim();
    var password = document.getElementById('signupPassword').value.trim();
    var confirmPassword = document.getElementById('signupConfirmPassword').value.trim();
    var name = document.getElementById('NameOfUser').value.trim();
    var role = document.getElementById('signupRole').value;

    // Check if any field is empty
    if (!username || !password || !confirmPassword || !name || !role) {
      alert('Please fill in all fields.');
      return;
    }

    // Check if passwords match
    if (password !== confirmPassword) {
      alert('Passwords do not match.');
      return;
    }

    // If all checks pass, submit the form
    this.submit();
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