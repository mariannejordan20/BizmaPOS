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

    <div class="form-group col-md-6" >
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
        
        <div class="form-group col-md-6" style = "Display:none;">
            <label for="modalProduct" class="control-label">Product</label>
            <input type="text" id="modalProduct" class="shadow-sm form-control form-control-sm rounded">
          </div>
        <div class="form-group col-md-6" style = "Display:none;">
            <label for="modalType" class="control-label">Type</label>
            <input type="text" id="modalType" class="shadow-sm form-control form-control-sm rounded">
          </div>
          <div class="form-group col-md-6" >
            <label for="modalBarcode" class="control-label">Barcode</label>
            <input type="text" id="modalBarcode" class="shadow-sm form-control form-control-sm rounded">
          </div>
          <div class="form-group col-md-6">
            <label for="modalPrice" class="control-label">Price</label>
            <input type="number" id="modalPrice" class="shadow-sm form-control form-control-sm rounded">
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
                                                    <th>Barcode</th>
                                                    <th style="padding-right: 150px;">Product</th>
                                                    <th>Unit</th>
                                                    <th>Qty</th>
                                                    <th>Srp</th>
                                                    <th>Warranty</th>
                                                    <th>Cat</th>
                                                    <th>S-Cat</th>
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
                                        <p class="display-4 text-right" id="TotalAmount" style="color: black; font-weight: bold; margin: 0; padding: 10px;">0.00</p>
                                    </div>
                                    <!-- Transaction and Invoice numbers -->
                    
                                    <div class="mt-1 d-flex justify-content-between">
    <p class="font-weight-bold text-right text-dark" style="margin: 0; font-size: 14px;">Invoice No:</p>
    <p class="font-weight-bold text-right text-dark" id="invoiceNumber" style="margin: 0; font-size: 14px;">000000</p>
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
   
    // Function to show product modal
    function showProductModal() {
        $('#productModal').modal('show');
    }

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
       
        var barcode = $('#modalBarcode').val();
        var product = $('#modalProduct').val();
        var type = $('#modalType').val();
        var unit = $('#modalUnit').val();
        var quantity = $('#modalQuantity').val();
        var price = $('#modalPrice').val();
        var costing = $('#modalCosting').val();
        
        // Make AJAX request to insert data into the database
        $.ajax({
            url: 'salesSaveFirst.php',
            type: 'POST',
            data: {
                barcode: barcode,
                product: product,
                type: type,
                unit: unit,
                quantity: quantity,
                price: price,
                costing: costing
            },
            success: function (response) {
                // Handle success response if needed
                console.log('Data inserted successfully.');
            },
            error: function (xhr, status, error) {
                console.error('Error inserting data:', error);
            }
        });
        $('#productModal').modal('hide');
    }

    // Event listener for the "Save" button in the modal
    $('#addToSales').on('click', function() {
        // Call the insertData function when the "Save" button is clicked
        getMaxInvoiceNumber();
        
        
    });

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

</script>




</body>
<!-- Bootstrap core JavaScript-->


</html>