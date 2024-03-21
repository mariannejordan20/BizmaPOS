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
                            <div class="card">
                                <div class="table-responsive">
                                <div class="card-body " >
                                    <!-- Your sales charts or data representation -->
                                    <form method="post" enctype="multipart/form-data">                
                                    <div class="position-relative">
                    <input type="text" id="productSearchInput" class="form-control mb-3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" placeholder="Search Product" style="font-size: 16px; border: 2px solid #3498db; padding: 10px; border-radius: 1px;">
                    <div id="searchResults" class="dropdown-menu" aria-labelledby="productSearchInput" style="position: absolute; top: calc(100% + 5px); left: 0; z-index: 1000; width: 100%; max-height: 300px; overflow-y: auto;">
                        <!-- Search results will appear here -->
                    </div>
                </div>
                <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="Product" class="control-label">Product</label>
                                <input type="text" name="Product" class="shadow-sm form-control form-control-sm rounded" readonly>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6" style= "Display:none">
                            <div class="form-group">
                                <label for="Type" class="control-label">Type</label>
                                <input type="text" name="Type" class="shadow-sm form-control form-control-sm rounded" readonly>
                            </div>
                        </div>

                        <div class="col-lg-1 col-md-1 col-sm-3 col-xs-3">
                            <div class="form-group">
                                <label for="Unit" class="control-label">Unit</label>
                                <input type="text" name="Unit" class="shadow-sm form-control form-control-sm rounded" readonly>
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-2 col-sm-3 col-xs-3">
                            <div class="form-group">
                                <label for="Quantity" class="control-label">Quantity</label>
                                <input type="number" name="Quantity" class="shadow-sm form-control form-control-sm rounded" >
                            </div>
                        </div>
                        
                        <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6">
                            <div class="form-group">
                                <label for="Costing" class="control-label">Costing</label>
                                <input type="number" name="Costing" class="shadow-sm form-control form-control-sm rounded">
                            </div>
                        </div>
                        <div class="col-lg-3 col-md- col-sm-3 col-xs-3" id="serialNumberField" style="display: none;">
                            <div class="form-group">
                                <label for="ItemSerial" class="control-label">Serial</label>
                                <input type="text" name="ItemSerial" class="shadow-sm form-control form-control-sm rounded" >
                            </div>
                        </div>
</div>
         <!-- add inputs here-->

</form>
                                    <div class="table-responsive" style="height: 400px; overflow-x: hidden;" onmouseover="showScrollbar(this)" onmouseout="hideScrollbar(this)">
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
                                        <p class="display-4 text-right" style="color: black; font-weight: bold; margin: 0; padding: 10px;">0.00</p>
                                    </div>
                                    <!-- Transaction and Invoice numbers -->
                                    <div class="mt-1 d-flex justify-content-between">
                                        <p class="font-weight-bold text-right text-dark" style="margin: 0; font-size: 14px;">Invoice No: 000001</p>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    
  <script>
$(document).ready(function (){



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