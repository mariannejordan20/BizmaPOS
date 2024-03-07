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

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add new Claim Stub</title>

    <style>
        body {
            background-color: #f7f7f7;
            font-family: Arial, sans-serif;
        }

        .container {
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-top: 20px;
            margin-left: -10%;
            margin-right: -10%;
        }

        .panel-heading {
            background-color: #f5f5f5;
            border-bottom: 1px solid #ddd;
            padding: 10px 15px;
        }

        .panel-body {
            padding: 15px;
        }

        .float-left {
            float: left;
        }

        .float-right {
            float: right;
        }

        .clear {
            clear: both;
        }

        .form-control {
            border-radius: 0;
        }

        .margin-bottom {
            margin-bottom: 10px;
        }

        .customer-panel,
        .shipping-panel {
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }


        
    </style>
</head>
<body>
    <?php include('header.php'); ?>
    <div id="wrapper">
        <?php include ('menu.php'); ?>
        <div id="content-wrapper" style="background-color: #eeeeee;">
                <?php include('navbar.php'); ?>
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="card-header" style="background-color: white; border: none">
                                <h3 class="card-title" style="color: #313A46; margin-bottom: -10px">Add new Claim Stub</h3>
                            </div>
                            <div class="card-body">
                                <div id="response" class="alert alert-success" style="display:none;">
                                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                                    <div class="message"></div>
                                </div>
                                <form action="orderaddsave.php" method="POST">
                                    <div class="row form-group-row" style="padding-left: 130px;">
                                        <!-- Invoice and Due Date Fields -->
                                        <div class="col-xs-2">
                                            <div class="form-group">
                                                <label for="order_date">Order Date</label>
                                                <input type="date" class="form-control required" name="order_date" id="order_date">
                                            </div>
                                        </div>
                                        <div class="col-xs-2">
                                            <div class="form-group" style="padding-left: 20px;">
                                                <label for="order_time">Time</label>
                                                <input type="Time" class="form-control required" name="order_time" id="order_time">
                                            </div>
                                        </div>
                                        <div class="col-xs-2">
                                            <div class="form-group" style="padding-left: 20px;">
                                                <label for="customer_DR">Customer DR#</label>
                                                <input type="text" class="form-control required" name="customer_DR" id="customer_DR">
                                            </div>
                                        </div>
                                                <div class="col-xs-2">
                                                    <!-- Select Type Fields -->
                                                    <div class="form-group" style="padding-left: 20px;">
                                                        <label for="order_type">Select Type</label>
                                                        <select name="order_type" id="order_type" class="form-control">
                                                            <option value="claim" selected>Claim Stub</option>
                                                            <option value="quote">Quote</option>
                                                            <option value="receipt">Receipt</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-xs-2">
                                                    <!-- Invoice Status Fields -->
                                                    <div class="form-group" style="padding-left: 20px;">
                                                        <label for="order_status">Order Status</label>
                                                        <select name="order_status" id="order_status" class="form-control">
                                                            <option value="open" selected>Open</option>
                                                            <option value="paid">Paid</option>
                                                        </select>
                                                    </div>
                                                </div>
                                    </div>
                                    <div class="row" style="padding-left: 60px;">
                        <!-- Customer Information Panel -->
                        <div class="col-xs-6" style="width: 450px">
                            <div class="panel panel-default customer-panel">
                                <div class="panel-heading">
                                    <h5 class="float-left">Customer Information</h5>
                                    <div class="clear"></div>
                                </div>
                                <div class="panel-body form-group form-group-sm">
                                <div class="row">
								<div class="col-xs-6">
                                <div class="form-group" style="padding-left: 20px;">
                                        <input type="text" class="form-control margin-bottom copy-input required" name="customer_name" id="customer_name" placeholder="Enter Name" tabindex="1" oninput="copyCustomerToShipping()" style="width: 180px;">
                                    </div>

									<div class="form-group" style="padding-left: 20px;">
										<input type="text" class="form-control margin-bottom copy-input required" name="customer_address_1" id="customer_address_1" placeholder="Address" tabindex="3" oninput="copyCustomerToShipping()" style="width: 180px;">	
									</div>

								</div>
								<div class="col-xs-6">

								    <div class="form-group" style="padding-left: 20px;">
								    	<input type="text" class="form-control margin-bottom copy-input required" name="customer_county" id="customer_county" placeholder="Country" tabindex="6" oninput="copyCustomerToShipping()" style="width: 180px;">
								    </div>
								    <div class="form-group no-margin-bottom" style="padding-left: 20px;">
								    	<input type="text" class="form-control required" name="customer_phone" id="customer_phone" placeholder="Phone Number" tabindex="8" style="width: 180px;">
									</div>
								</div>
							</div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-6" style="padding-left: 60px; width: 500px">
                            <div class="panel panel-default customer-panel" >
                                <div class="panel-heading">
                                    <h5 class="float-left">Customer Shipping Information</h5>
                                    <div class="clear"></div>
                                </div>
                                <div class="panel-body form-group form-group-sm">
							<div class="row">
								<div class="col-xs-6">
									<div class="form-group" style="padding-left: 20px;">
										<input type="text" class="form-control margin-bottom required" name="customer_name_ship" id="customer_name_ship" placeholder="Enter Name" tabindex="9" style="width: 180px;">
									</div>
									<div class="form-group" style="padding-left: 20px;">
										<input type="text" class="form-control margin-bottom" name="customer_address_ship" id="customer_address_ship" placeholder="Address " tabindex="11" style="width: 180px;">	
									</div>

								</div>
								<div class="col-xs-6">

                                <div class="form-group no-margin-bottom" style="padding-left: 20px;">
										<input type="text" class="form-control required" name="customer_county_ship" id="customer_county_ship" placeholder="Country" tabindex="13" style="width: 180px;">
									</div>
								</div>
							</div>
						</div>
                            </div>
                        </div>

                    </div>
                    <table class="table table-bordered table-hover table-striped" id="orderadd" style="margin-left: 3%">
                    <thead>
                <tr >
                    <th style="padding-top: 10px;">
                        <h5>Qty</h5>
                    </th>
                    <th width="500">
                        <h5><a href="#" class="btn btn-success btn-xs fa fa-plus add-row"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a> Product Description</h5>
                    </th>
                    <th>
                        <h5>Serial</h5>
                    </th>
                </tr>
            </thead>

        <tbody>
            <tr>
                <td class="text-right">
                    <div class="form-group form-group-sm no-margin-bottom">
                        <input type="number" class="form-control invoice_product_qty calculate" name="qty" id="qty"value="1">
                    </div>
                </td>
                <td>
                    <div class="form-group form-group-sm no-margin-bottom" style="display: flex; align-items: center;">
                        <a href="#" class="btn btn-danger btn-xs fa fa-minus delete-row" style="margin-right: 5px;"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
                        <input type="text" class="form-control form-group-sm item-input invoice_product" name="product_desc" id="product_desc" placeholder="Enter Product Name OR Description">
                    </div>
                </td>
                <td class="text-right">
                    <div class="form-group form-group-sm no-margin-bottom">
                        <input type="number" class="form-control" name="product_serial" id="product_serial">
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
                <div class="row" style="padding-left: 10px;">
                <div class="col-xs-12">
                    <button type="button" class="btn btn-primary" onclick="submitForm()">Add Order</button>
                </div>
            </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<!-- SweetAlert CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

            <script>
        // Function to add a new row
        function addRow() {
            var table = document.getElementById("orderadd").getElementsByTagName('tbody')[0];
            var newRow = table.insertRow(table.rows.length);
            var cell1 = newRow.insertCell(0);
            var cell2 = newRow.insertCell(1);
            var cell3 = newRow.insertCell(2);
            cell1.innerHTML = '<div class="form-group form-group-sm no-margin-bottom"><input type="number" class="form-control invoice_product_qty calculate" name="qty" value="1"></div>';
            cell2.innerHTML = '<div class="form-group form-group-sm no-margin-bottom" style="display: flex; align-items: center;"><a href="#" class="btn btn-danger btn-xs fa fa-minus delete-row" style="margin-right: 5px;"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a><input type="text" class="form-control form-group-sm item-input invoice_product" name="product_desc" placeholder="Enter Product Name OR Description"></div>';
            cell3.innerHTML = '<div class="form-group form-group-sm no-margin-bottom"><input type="number" class="form-control" name="serial"></div>';

            // Attach event listener to the new delete button
            var deleteButton = cell2.querySelector('.delete-row');
            deleteButton.addEventListener('click', function(e) {
                e.preventDefault();
                deleteRow(this);
            });
        }

        // Function to delete a row
        function deleteRow(button) {
            var row = button.parentNode.parentNode.parentNode;
            row.parentNode.removeChild(row);
        }

        // Add event listener for Add Row button
        document.querySelector('.add-row').addEventListener('click', function(e) {
            e.preventDefault();
            addRow();
        });

        // Add event listener for Delete Row buttons
        var deleteButtons = document.querySelectorAll('.delete-row');
        deleteButtons.forEach(function(button) {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                deleteRow(this);
            });
        });
    </script>
<script>
    // Function to copy customer information to shipping information
    function copyCustomerToShipping() {
        var customerName = document.getElementById("customer_name").value;
        var customerAddress = document.getElementById("customer_address_1").value;
        var customerCounty = document.getElementById("customer_county").value;
        var customerPhone = document.getElementById("customer_phone").value;

        // Set shipping information values
        document.getElementById("customer_name_ship").value = customerName;
        document.getElementById("customer_address_ship").value = customerAddress;
        document.getElementById("customer_county_ship").value = customerCounty;
        document.getElementById("customer_phone_ship").value = customerPhone;
    }
</script>

</body>
</html>
