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
$sql = "SELECT ID, Order_date, Order_time, Customer_DR, Order_type, Order_status, customer_name, customer_address_1, customer_county, customer_phone, customer_name_ship, customer_address_ship, customer_county_ship, qty, Seller, product_desc, product_serial 
        FROM order";
$results = $conn->query($sql);



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
            .order-section {
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Subtle box-shadow for depth */
    margin-bottom: 20px;
    background-color: #fff; /* Optional: Add a background color */
    transition: box-shadow 0.3s; /* Smooth transition for box-shadow */
    }
    #orderTable {
        width: 100%  ;
        border-spacing: 0  ;
    }
    #orderTable th {
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

    

    #orderTable th,
    #orderTable td {
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
    #orderTable th {    
        color: #656565  ; /* White text for header */
        white-space: nowrap;
        font-family: Segoe UI;
        font-size: 12px;
    }

    #orderTable tbody tr {
        transition: background-color 0.3s  ;
    }

    #orderTable tbody tr:hover {
        background-color: #ecf0f1  ; /* Light gray background on hover */
    }

    #orderTable a:hover {
        color: #c0392b; /* Darker red on hover */
    }
    #orderTable tbody tr.active {
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
                    <h3 class="card-title" style="color: #313A46; margin-bottom: -10px">Order List</h3>
                </div>
            <div class="card-body">
                <div class="order-section">
                    <div class="mb-3 d-flex justify-content-between align-items-center ml-4 mr-4">
                        <form action="order.php" method="get" class="searchAdjust form-inline mt-3 mb-3">
                                <div class=" searchAdjust">
                                    <input type="text" name="search" id="searchInput" class="searchAdjust form-control" placeholder="Search" oninput="searchProducts()">
                                </div>    
                        
                        </form>
                        <?php if ($_SESSION['Type'] == 'ADMIN' || $_SESSION['Type'] == 'MANAGER') { ?>
                                                    <a href ="orderadd.php" class="btn btn-success" style="color: white;">
                                                        <i class="fa fa-plus"></i>
                                                    </a>
                                                    <?php } ?> 
                    </div>
                    <div class="container-fluid">
                    <div class="header-fixed">
                    <div class="table-responsive"  style="max-height: 340px; overflow-y: scroll;">
                    <table class="table text-center table-bordered" id="orderTable" width="100%" cellspacing="0">
                        <thead>
                            <tr class="text-white">
                                <th class="text-center">ACTION</th>
                                <th class="text-center">Date</th>
                                <th class="text-center">Item</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Serial</th>
                                <th class="text-center">Status</th>
                            </tr>
                        </thead>
                    </table>
                    <tbody>
                    <?php
                                                if ($results) {
                                                    while ($result = $results->fetch_assoc()) {
                                                        echo '<tr>';
                                                        echo '<td>';
                                                        echo '<a class="mr-2" href="#?id='.$result['ID'].'" data-bs-toggle="modal" data-bs-target="#productsModal'.$result['ID'].'"><i class="fa fa-eye"></i></a>';
                                                        if ($_SESSION['Type'] == 'ADMIN' || $_SESSION['Type'] == 'MANAGER') {
                                                            echo '<a class="mr-2" href="productsEdit.php?id='.$result['ID'].'"><i class="fa fa-edit"></i></a>
                                                                  <a href="productsDelete.php?id='.$result['ID'].'"><i class="fa fa-trash text-danger"></i></a>';
                                                        }
                                                        echo '</td>';
                                                        echo '<td class="text-truncate text-center">'  .$result['Order_date'] . '</td>
                                                              <td class="text-truncate text-center">' . $result['product_desc'] . '</td>
                                                              <td class="text-truncate">' . $result['customer_name'] . '</td>
                                                              <td class="text-truncate text-right">' . $result['product_serial'] . '</td>
                                                              <td class="text-truncate text-right">' . number_format($result['Order_status']) . '</td>
                                                              </tr>';
                                                    }
                                                } else {
                                                    echo "Error: " . $conn->error;
                                                }
                                                ?>

                                    </tbody>
                </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    </div>
</body>
</html>