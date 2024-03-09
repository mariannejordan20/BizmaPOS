<?php
session_start();   

    include('connection.php');
    // $haslog = (isset($_SESSION['hasLog'])?$_SESSION['hasLog']:0);

    if (isset($_SESSION['hasLog'])){
        $haslog = $_SESSION['hasLog'];
    }else{
        $haslog = 0;
    }

    if (empty($haslog)){
        header("location: login.php");
        exit;
    }

    $sql = "select ID , encnumber,DeliveryNumber,Supplier,Receiver,stockindate,TotalVal from deliverycodes order by encnumber desc ";
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
    margin-bottom: 20px;
    background-color: #fff; /* Optional: Add a background color */
    transition: box-shadow 0.3s; /* Smooth transition for box-shadow */
    }
    #productsTable {
        width: 100%  ;
        border-spacing: 0  ;
    }
    #productsTable th {
            position: sticky;
            top: 0;
            background-color: #fff;
            z-index: 1;
        }

        /* Add this style for the table container */
        .table-container {
            overflow-x: auto;
            max-height: 500px;
            overflow-y: scroll;
        }

        /* Add this style for the container of the table */
        .table-container table {
            border-collapse: collapse;
            width: 100%;
        }

        /* Add this style for the container of the table */
        .table-container th, .table-container td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        /* Add this style for the container of the table */
        .table-container tbody tr:hover {
            background-color: #f2f2f2;
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
@media (max-width: 576px) {
    /* Adjust styles for phones */
    .modal-dialog {
        margin: 0;
        width: 100vw; /* Full width of the viewport */
        max-width: none; /* Remove any maximum width */
        height: 100vh; /* Full height of the viewport */
        max-height: none; /* Remove any maximum height */
    }
    
    

    .modal-content {
        height: 80%; /* Full height of the modal content */
    }

    .modal-body {
        max-height: calc(100vh - 56px); /* Adjust as needed, considering modal header height */
        overflow-y: auto; /* Enable vertical scrolling if content exceeds the height */
    }

    .modal-body #noteContent {
        width: 100%;
        height: calc(100vh - 200px); /* Adjust as needed */
    }

    .searchAdjust {
        max-width: 300px; /* Set a specific max-width for phones */
        width: 100%; /* Allow it to take full width if needed */
        display: flex; /* Use flexbox layout */
        align-items: center; /* Center items vertically */
    }

    .note {
        margin-left: 10px; /* Adjust margin for the button */
    }
}



    @media (min-width: 614px) {
        /* Adjust styles for phones and larger screens */
        .searchAdjust {
            max-width: 400px;  /* Set a specific max-width for phones */
            width: 100%;      /* Allow it to take full width if needed */
            display: flex; /* Use flexbox layout */
    align-items: center; /* Center items vertically */
        }
    }

    @media (min-width: 1000px) {

        .modal-body {
        max-height: calc(100vh - 100px); /* Adjust as needed, considering modal header height */
        overflow-y: auto; /* Enable vertical scrolling if content exceeds the height */
    }
    .modal-body #noteContent {
        height: calc(100vh - 280px); /* Adjust as needed */
    }
        /* Adjust styles for PCs and larger screens */
        .searchAdjust {
            max-width: 480px;  /* Set a specific max-width for PCs */
            width: 100%;      /* Allow it to take full width if needed */
            display: flex; /* Use flexbox layout */
    align-items: center; /* Center items vertically */
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
    .note {
    display: inline-block; /* Display the button inline */
    margin-left: 5px; /* Add some spacing between input and button */
}

/* Adjustments for smaller screens */
@media (max-width: 768px) {
    .searchAdjust {
        flex-direction: row; /* Keep elements in a row on smaller screens */
        align-items: center; /* Center items vertically */
    }
    .modal-body {
        max-height: calc(100vh - 100px); /* Adjust as needed, considering modal header height */
        overflow-y: auto; /* Enable vertical scrolling if content exceeds the height */
    }
    .modal-body #noteContent {
        height: calc(100vh - 280px); /* Adjust as needed */
    }

    .note {
        margin-left: 10px; /* Adjust margin for the button */
        margin-top: 0; /* Reset margin top */
    }
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
                        <h3 class="card-title" style="color: #313A46; margin-bottom: -10px">STOCK IN SUMMARY</h3>
                    </div>
                    <div class="card-body">
                        <div class="products-section">
                        <div class="mb-3 d-flex justify-content-between align-items-center ml-4 mr-4">
                            <form action="products.php" method="get" class="searchAdjust form-inline mt-3 mb-3">
                                <div class=" searchAdjust">
                                    <input type="text" name="search" id="searchInput" class="searchAdjust form-control" placeholder="Search" oninput="searchProducts()">
                                    <button type="button" class="btn note btn-success" data-toggle="modal" data-target="#NoteModal" onclick="editNote()">
                            <i class="fa fa-sticky-note-o danger"></i>
                        </button>
                                        
                                </div>
                                
                            </form>
                            <!-- Note MODAL -->
                            <div class="modal fade" id="NoteModal" tabindex="-1" role="dialog" aria-labelledby="NoteModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="NoteModalLabel">NOTE</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- Note Form -->
                                            <form id="noteForm">
                                                <div class="form-group">
                                                    <label for="noteContent" style= "overflow: hidden;">Note Content:</label>
                                                    <textarea class="form-control" id="noteContent" name="noteContent" rows="6" style="resize: vertical;" required></textarea> <!-- Change rows attribute value to 6 for larger initial size -->
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary" onclick="updateNote()">Save Changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <?php if ($_SESSION['Type'] == 'ADMIN' || $_SESSION['Type'] == 'MANAGER') { ?>
                                <a href ="productsAdd.php" class="btn btn-success" style="color: white;">
                                    <i class="fa fa-plus"></i>
                                </a>
                                <?php } ?>
                        </div>
                        <div class="container-fluid">
    <div class="header-fixed">
        <div class="table-responsive" style="max-height: 400px; overflow-y: scroll;">
            <table class="table text-center table-bordered" id="productsTable" width="100%" cellspacing="0">
                <thead>
                    <tr class="text-white">
                        <th class="text-center">ACTION</th>
                        <th class="text-center">ENC NUMBER</th>
                        <th class="text-center">DELIVERY NO.</th>
                        <th class="text-center">SUPPLIER</th>
                        <th class="text-center">RECEIVER</th>
                        <th class="text-center">TOTAL AMT</th>
                        <th class="text-center">STOCK IN DATE</th>
                    </tr>
                </thead>
                <tbody class="custom-font-size" style="color: #313A46;">
                    <?php
                        foreach ($results as $result) {
                            echo '<tr>';
                            echo '<td>';
                            echo '<a class="mr-2" href="#" onclick="viewProducts(\'' . $result['encnumber'] . '\')" data-toggle="modal" data-target="#viewProductsModal"><i class="fa fa-eye"></i></a>';
                            if ($_SESSION['Type'] == 'ADMIN' || $_SESSION['Type'] == 'MANAGER') {
                                echo '<a class="mr-2" href="productsEdit.php?id='.$result['ID'].'"><i class="fa fa-edit"></i></a>
                                <a href="stocksInSummaryDelete.php?id='.$result['ID'].'"><i class="fa fa-trash text-danger"></i></a>';
                            }
                            echo '</td>';
                            echo '<td class="text-truncate text-center" style="max-width: 50px;">'  .$result['encnumber'] . '</td>
                                <td class="text-truncate" style="max-width: 100px;">' . strtoupper ($result['DeliveryNumber']) . '</td>
                                <td class="text-truncate" style="max-width: 100px;">' . strtoupper ($result['Supplier']) . '</td>
                                <td class="text-truncate" style="max-width: 100px;">' . strtoupper ($result['Receiver']) . '</td>
                                <td class="text-truncate text-right" style="max-width: 75px;">' . $result['TotalVal'] . '</td>
                                <td class="text-truncate text-right" style="max-width: 75px;">' . $result['stockindate'] . '</td>
                            </tr>';
                        }
                    ?>
                </tbody>
            </table> 
        </div>
    </div>
</div>

<div class="modal fade" id="viewProductsModal" tabindex="-1" role="dialog" aria-labelledby="viewProductsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document"> <!-- Updated modal classes -->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewProductsModalLabel">View Products</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="viewProductsModalBody">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Barcode</th>
                            <th>Product</th>
                            <th>Type</th>
                            <th>Unit</th>
                            <th>Quantity</th>
                            <th>Costing</th>
                            <th>Price</th>
                            <th>Wholesale</th>
                            <th>Promo</th>
                            <th>Delivery Number</th>
                            <th>Supplier</th>
                            <th>Receiver</th>
                            <th>Stock In Date</th>
                        </tr>
                    </thead>
                    <tbody id="productsTableBody">
                        <!-- Product rows will be displayed here -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>






                        <div class="d-flex justify-content-end mt-3">
                        <ul class="pagination">
                                
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
    function viewProducts(encnumber) {
        $.ajax({
            url: 'fetchStockedInProducts.php',
            type: 'POST',
            data: {encnumber: encnumber},
            success: function(response) {
                $('#productsTableBody').html(response);
            },
            error: function(xhr, status, error) {
                console.error('Error fetching products:', error);
            }
        });
    }
</script>



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
    document.getElementById("searchInput").addEventListener("input", filterTable);
</script>

<script>
    function editNote() {
        // Fetch current note content from database
        $.ajax({
            url: "fetchNote.php", // Your PHP script to fetch note content
            type: 'get',
            success: function(data, status) {
                // Populate modal with fetched data
                document.getElementById('noteContent').value = data;
            },
            error: function(xhr, status, error) {
                // Handle error, if needed
                console.error("Failed to fetch note");
            }
        });
    }

    function updateNote() {
    // Get updated note content from form
    var noteContent = document.getElementById('noteContent').value;

    // Perform AJAX request to update note
    $.ajax({
        url: "updateNote.php", // Your PHP script to update note content
        type: 'post',
        data: {
            noteContent: noteContent
        },
        success: function(data, status) {
            // Handle success
            console.log("Success: " + data);
            // Optionally, show a success message using sweetalert
            Swal.fire({
                icon: 'success',
                title: 'Note updated successfully',
                showConfirmButton: false,
                timer: 1500
            });
            // Close the modal after a delay
            setTimeout(function() {
                $('#NoteModal').modal('hide');
            }, 1500); // Adjust the delay as needed
        },
        error: function(xhr, status, error) {
            // Handle error
            console.error("Error: " + error);
            // Optionally, show an error message
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Something went wrong!'
            });
        }
    });
}




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