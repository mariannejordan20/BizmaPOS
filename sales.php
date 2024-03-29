<?php
session_start();
include('connection.php');
?>


<!DOCTYPE html>
<html lang="en">
<?php include('header.php'); ?>
<style>
    


    #salesTable th {
        color: white;
        white-space: nowrap;
        font-family: Segoe UI;
        font-size: 14px;
        /* Aligning column names to the left */
    }
</style>
<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <?php include ('menu.php'); ?><!-- Content Wrapper -->
        
        <div id="content-wrapper" class="d-flex flex-column" style="background-color: #eeeeee;"><!-- Main Content -->
            
            <div id="content">
                <?php include('navbarsales.php'); ?><!-- Topbar -->
                
               
                <!-- Sales Content Goes Here -->
                    <div class="row m-2 " >
                        <div class="col-md-9 " >
                            <div class="card h-100">
                                <div class="table-responsive">
                                <div class="card-body " >
                                    <!-- Your sales charts or data representation -->
                                                
                                    <div class="position-relative">
                    <input type="text" id="productSearchInput" class="form-control mb-3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" placeholder="Search Product" style="font-size: 16px; border: 2px solid #3498db; padding: 10px; border-radius: 1px;">
                    <div id="searchResults" class="dropdown-menu" aria-labelledby="productSearchInput" style="position: absolute; top: calc(100% + 5px); left: 0; z-index: 1000; width: 100%; max-height: 300px; overflow-y: auto;">
                        <!-- Search results will appear here -->
                    </div>
                </div>

        <div class="form-group col-md-6" style= "Display: none;" >
            <label for="modalInvoice" class="control-label">Invoice Num</label>
            <input type="text" name="modalInvoice" id="modalInvoice" class="shadow-sm form-control form-control-sm rounded">
          </div>


                <div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="productModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title" id="productModalLabel"></h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <div class="form-row">
        
        <div class="form-group col-md-6" style="Display: none">
            <label for="modalProduct" class="control-label">Product</label>
            <input type="text" id="modalProduct" class="shadow-sm form-control form-control-sm rounded">
          </div>
        <div class="form-group col-md-6" style="Display: none">
            <label for="modalType" class="control-label">Type</label>
            <input type="text" id="modalType" class="shadow-sm form-control form-control-sm rounded">
          </div>
          <div class="form-group col-md-6" style="Display: none"> >
            <label for="modalBarcode" class="control-label">Barcode</label>
            <input type="text" id="modalBarcode" class="shadow-sm form-control form-control-sm rounded">
          </div>
          <div class="form-group col-md-6">
            <label for="modalPrice" class="control-label">Price</label>
            <input type="number" id="modalPrice" class="shadow-sm form-control form-control-sm rounded">
          </div>
          <div class="form-group col-md-6" style = "Display:none;">
            <label for="modalWarranty" class="control-label">Warranty</label>
            <input type="number" id="modalWarranty" class="shadow-sm form-control form-control-sm rounded">
          </div>
          <div class="form-group col-md-6"style = "Display:none;">
            <label for="modalCosting" class="control-label">Costing</label>
            <input type="number" id="modalCosting" class="shadow-sm form-control form-control-sm rounded">
          </div>
          <div class="form-group col-md-6">
            <label for="modalQuantity" class="control-label">Quantity</label>
            <input type="number"  id="modalQuantity" class="shadow-sm form-control form-control-sm rounded">
          </div>
          <div class="form-group col-md-6" id="serialNumberField" style = "Display:none;">
            <label for="modalSerial" class="control-label">Serial</label>
            <input type="text" id="modalSerial" class="shadow-sm form-control form-control-sm rounded">
          </div>
        </div>
       
        
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" name="modalSave" id="addToSales">Add</button>
      </div>
    </div>
  </div>
</div>




                                    <div class="table-responsive" style="height: 400px; overflow-x: hidden;">
                                        <table class="table text-sm " style="font-size: 12px;" id="salesTable">
                                            <thead style="background-color: #313a46; color: #fff;">
                                                <tr class="table-bordered">
                                                    <th>Act</th>
                                                    <th>Bcode</th>
                                                    <th style="padding-right: 150px;">Product</th>
                                                    <th>Unit</th>
                                                    <th>Qty</th>
                                                    <th>Srp</th>
                                                    <th>Wrnty</th>
                                                    <th>Serial</th>
                                                    <th>T-Amt</th>
                                                </tr>
                                            </thead>
                                            <tbody class="custom-font-size">
                                               
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>

                       
                        <div class="col-md-3">
                        <!-- First card with shadow -->
                        <div class="card" style="box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
                            <div class="card-body p-0">
                                <!-- Additional Sales Information or Widgets -->
                                <div class="card-body text-center">
                                    <!-- Small Digital Number Display -->
                                    <h6 class="font-weight-bold mb-3 text-left text-dark" style="background-color:#eeeeee; border-top: 1px solid gray; border-bottom: 1px solid gray; margin: 0; padding: 10px;">Amount:</h6>
                                    <div class="mt-1 d-flex justify-content-between" style="border-bottom: 1px solid gray;">
                                        <p class="display-4 text-right" style="color: black; font-weight: bold; margin: 0; padding: 10px;"></p>
                                        <p class="display-4 text-right" id="TotalAmount" style="color: black; font-weight: bold; margin: 0; padding: 10px;">0</p>
                                    </div>
                                    <!-- Transaction and Invoice numbers -->
                    
                                    <div class="mt-1 d-flex justify-content-between">
    <p class="font-weight-bold text-right text-dark" style="margin: 0; font-size: 14px;">Invoice No:</p>
    <p class="font-weight-bold text-right text-dark" id="invoiceNumber" style="margin: 0; font-size: 14px;"></p>
</div>

                                </div>
                            </div>
                        </div>

                        <!-- Second card below the amount card -->
                        <div class="card mt-3" style="box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
                            <div class="card-body p-0">
                                <!-- Additional content for the second card -->
                                <div class="card" style="border: none;">
                                    <div class="card-body text-center">
                                        <h6 class="font-weight-bold mb-3 text-left text-dark" style="background-color:#eeeeee; border-top: 1px solid gray; border-bottom: 1px solid gray; margin: 0; padding: 10px;">Details Pannel:</h6>
                                        <!-- Additional content for the second card goes here -->
                                        <p class="font-weight-bold mb-3 text-left text-dark" style="  margin: 0; padding: px;">Site Location:</p>
                                        <p class="font-weight-bold mb-3 text-left text-dark" style="  margin: 0; padding: px;">Customer:</p>
                                        <p class="font-weight-bold mb-3 text-left text-dark" style="  margin: 0; padding: px;">Sales Man:</p>
                                        
                                        <!-- Button for processing order payment -->
                                        <button class="btn btn-secondary" style="width:100%; margin-top: 10px;">Process Order Payment</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div><!-- End of Main Content Area -->
            </div><!-- End of Content Wrapper -->
        </div><!-- End of Page Wrapper -->

        

    </div>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>              
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages -->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

    <!-- SweetAlert -->
    <script src="js/sweetalert2.all.min.js"></script>
    <script src="js/sweetalert.min.js"></script>

    
<script>
$(document).ready(function (){

    function initializeButtonState() {
    var hasData = checkInputs();
    $('#addToSales').prop('disabled', !hasData);
}

initializeButtonState();

$('#modalQuantity, #modalSerial, #modalType, #modalProduct').on('input', function () {
    var hasData = checkInputs();
    $('#addToSales').prop('disabled', !hasData); // Corrected the selector here
});

function checkInputs() {
    var Quantity = $('#modalQuantity').val().trim();
    var ItemSerial = $('#modalSerial').val().trim();
    var Product = $('#modalProduct').val().trim();
    var type = $('#modalType').val().trim();

    // Check if Quantity and Product have data
    if (Quantity !== "" && Product !== "") {
        // If the type is 'W/ SERIAL', check if ItemSerial has data
        if (type === 'W/ SERIAL' && ItemSerial === "") {
            return false;
        }
        return true;
    }
    return false;
}


    // Function to show product modal
    function showProductModal() {
        $('#productModal').modal('show');
        
    }

    var firstTimeClicked = true;
    // Event listener for the "Save" button in the modal
    $('#addToSales').on('click', function() {
        if (firstTimeClicked) {
        getMaxInvoiceNumber();
        fetchSalesData();
        }else{
            insertData();
            fetchSalesData();
        }  
    });

    function getMaxInvoiceNumber() {
            $.ajax({
                url: 'getMaxInvoiceNumber.php',
                type: 'GET',
                success: function (response) {
                    $('input[name="modalInvoice"]').val(response);
                    insertData();
                },
                error: function (xhr, status, error) {
                    console.error('Error fetching max encode number:', error);
                }
            });
        }

        function insertData() {
        var invoicenum = $('input[name="modalInvoice"]').val();
        var barcode = $('#modalBarcode').val();
        var product = $('#modalProduct').val();
        var type = $('#modalType').val();
        var unit = $('#modalUnit').val();
        var quantity = $('#modalQuantity').val();
        var price = $('#modalPrice').val();
        var costing = $('#modalCosting').val();
        var warranty = $('#modalWarranty').val();
        var itemserial = $('#modalSerial').val();
        
        if (quantity.trim() === ""  || product.trim() === "") {
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: 'Please fill in required fields.'
                });
                return;
            }
            if (type === 'W/ SERIAL' && $('#modalSerial').val().trim() === "") {
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: 'Serial Number field is required.'
                });
                return;
            }

            if ($('#modalSerial').val().trim() !== "") {
                var exists = false;
                $('#stockInListTable tbody tr').each(function () {
                    var existingSerialNumber = $(this).find('td:eq(7)').text();
                    if (existingSerialNumber === itemserial) {
                        exists = true;
                        return false;
                    }
                });
                if (exists) {
                    Swal.fire({
                        icon: 'question',
                        title: 'Duplicate Serial Number',
                        text: 'Serial number already exists in the table. Do you want to proceed?',
                        showCancelButton: true,
                        confirmButtonText: 'Yes',
                        cancelButtonText: 'No'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            insertDataToServer();
                              $('#modalSerial').val()('');
                            // Proceed with data insertion
                           
                        }
                    });
                    return;
                }
            }

            // If no duplicate serial, proceed with data insertion
            insertDataToServer();
        }

        function insertDataToServer() {
        var invoicenum = $('input[name="modalInvoice"]').val();
        var barcode = $('#modalBarcode').val();
        var product = $('#modalProduct').val();
        var type = $('#modalType').val();
        var unit = $('#modalUnit').val();
        var quantity = $('#modalQuantity').val();
        var price = $('#modalPrice').val();
        var costing = $('#modalCosting').val();
        var warranty = $('#modalWarranty').val();
        var itemserial = $('#modalSerial').val();

        var data = {
        invoicenum: invoicenum,
        barcode: barcode,
        product: product,
        type: type,
        unit: unit,
        quantity: quantity,
        costing: costing,
        price: price,
        warranty: warranty,
        itemserial: itemserial // Corrected this line
       
    };
        
    var saveUrl = firstTimeClicked ? 'salesSaveFirst.php' : 'salesSave.php';

        $.ajax({
            url: saveUrl,
            type: 'POST',
            data: data,
            success: function (response) {
                // Handle success response if needed
                console.log('Data inserted successfully.');
                $('#invoiceNumber').text($('#modalInvoice').val());
                $('#productModal').modal('hide');
                fetchSalesData();
            },
            error: function (xhr, status, error) {
                console.error('Error inserting data:', error);
            }
        });
        firstTimeClicked = false;
        $('#modalSerial').val()('');
        $('#productModal').modal('hide');
        fetchSalesData();
    }


   

    $('#searchResults').on('click', '.product-item', function () {
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

        $('#productModalLabel').text(product + ' - ' + unit);

        // Set values in modal inputs
        
        $('#modalBarcode').val(barcode);
        $('#ProductModalLabel').val(product);
        $('#modalProduct').val(product);                                
        $('#modalType').val(type);
        $('#modalUnit').val(unit);
        $('#modalQuantity').val(quantity);
        $('#modalPrice').val(price);
        $('#modalCosting').val(costing);
        $('#modalWarranty').val(warranty);
        
        // Set other values as needed...

        // Show modal

        console.log("Type: " + type);

        if (type === 'W/ SERIAL') {
            $('input[name="Quantity"]').val(1);
            $('input[name="Quantity"]').prop('readonly', true);
            $('#serialNumberField').show();
        } else {
            $('input[name="Quantity"]').val(quantity);
            $('input[name="Quantity"]').prop('readonly', false);
            $('#serialNumberField').hide();
        }
        
        showProductModal();

        updateTotalAmount();
    });

    $('#productSearchInput').on('keyup', function () {
        var searchText = $(this).val();
        $.ajax({
            url: 'searchsalesproducts.php',
            type: 'POST',
            data: { searchText: searchText },
            success: function (response) {
                $('#searchResults').html(response);
            }
        });
    });

    



});

function updateTotalAmount() {
    var totalAmount = 0;
    $('#salesTable tbody tr').each(function () {
        var rowTotal = parseFloat($(this).find('td:eq(8)').text()); // Assuming TotalValRow is in the 15th column
        totalAmount += rowTotal;
    });

    // Check if totalAmount has decimals
    var formattedTotalAmount = totalAmount % 1 === 0 ? totalAmount.toFixed(0) : totalAmount.toFixed(2);
    
    $('#TotalAmount').text(formattedTotalAmount); // Update the total amount text
}


function fetchSalesData() {
        var invoicenum = $('input[name="modalInvoice"]').val();

        $.ajax({
            url: 'getSales.php', // Change this to the endpoint for fetching data from stocksintry
            type: 'POST',
            data: { invoicenum: invoicenum },
            success: function (response) {
                // Assuming response contains data in the appropriate format, update the table
                $('#salesTable tbody').html(response);
                updateTotalAmount();
               
            },
            error: function (xhr, status, error) {
                console.error('Error fetching stocks in data:', error);
            }
        });
    }

    function deleteRow(rowId) {
    Swal.fire({
        title: 'Confirm Deletion',
        text: 'Are you sure you want to delete this entry?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: 'salesdeleterow.php',
                type: 'POST',
                data: { id: rowId },
                success: function (response) {
                    console.log('Row deleted successfully:', response);
                    fetchSalesData(); // Refresh the table after successful deletion
                },
                error: function (xhr, status, error) {
                    console.error('Error deleting row:', error);
                }
            });
        }
    });
    
}

</script>




</body>
<!-- Bootstrap core JavaScript-->


</html>