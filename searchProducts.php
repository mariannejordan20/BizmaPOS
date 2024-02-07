<?php
include('connection.php');

// Default SQL query to retrieve all products
$sql = "SELECT * FROM products ORDER BY Product";

// Check if a search term is provided
if (isset($_GET['search'])) {
    $searchTerm = $_GET['search'];

    // If the search term is not empty, modify the SQL query to search for products
    if (!empty($searchTerm)) {
        $sql = "SELECT * FROM products WHERE Product LIKE '%$searchTerm%' OR Barcode LIKE '%$searchTerm%' ORDER BY Product";
    }
}

// Execute the SQL query
$results = $conn->query($sql);

// Check if there are any results
if ($results === false) {
    echo "Error: " . $conn->error;
} else {
    // Output the HTML table
    echo '<table class="table text-center table-bordered" id="productsTable" width="100%" cellspacing="0">
            <thead>
                <tr class="th" style="color: #000000">
                    <th class="text-center custom-column-width">Action</th>
                    <th class="text-center custom-column-width">ID</th>
                    <th class="text-center custom-column-width">Barcode</th>
                    <th class="text-center custom-column-width" style="padding-right: 150px;">Product Name</th>
                    <th class="text-center custom-column-width">Unit</th>
                    <th class="text-center custom-column-width">Qty</th>
                    <th class="text-center custom-column-width">Costing</th>
                    <th class="text-center custom-column-width">Price</th>
                    <th class="text-center custom-column-width">Wholesale</th>
                    <th class="text-center custom-column-width">Promo</th>
                    <th class="text-center custom-column-width">Ctry</th>
                    <th class="text-center custom-column-width">Seller</th>
                    <th class="text-center custom-column-width">Supplier</th>
                    <th class="text-center custom-column-width">Wrty</th>
                    <th class="text-center custom-column-width">Date Registered</th>
                </tr>
            </thead>
            <tbody class="custom-font-size" style="color: #313A46">';

    // Iterate through the results and output table rows
    while ($row = $results->fetch_assoc()) {
        echo '<tr>
                <td>
                    <a class="mr-2" href="#?id='.$row['ID'].'" data-bs-toggle="modal" data-bs-target="#productsModal'.$row['ID'].'"><i class="fa fa-eye"></i></a>
                    <a class="mr-2" href="productsEdit.php?id='.$row['ID'].'"><i class="fa fa-edit"></i></a>
                    <a href="productsDelete.php?id='.$row['ID'].'"><i class="fa fa-trash text-danger"></i></a>
                </td>
                <td class="text-truncate" style="max-width: 50px;">'.$row['ID'].'</td>
                <td class="text-truncate" style="max-width: 100px;">'.$row['Barcode'].'</td>
                <td class="text-truncate" style="max-width: 150px;">'.strtoupper($row['Product']).'</td>
                <td class="text-truncate" style="max-width: 50px;">'.$row['Unit'].'</td>
                <td class="text-truncate" style="max-width: 50px;">'.$row['Quantity'].'</td>
                <td class="text-truncate" style="max-width: 100px;">'.$row['Costing'].'</td>
                <td class="text-truncate" style="max-width: 100px;">'.$row['Price'].'</td>
                <td class="text-truncate" style="max-width: 100px;">'.$row['Wholesale'].'</td>
                <td class="text-truncate" style="max-width: 100px;">'.$row['Promo'].'</td>
                <td class="text-truncate" style="max-width: 100px;">'.$row['Categories'].'</td>
                <td class="text-truncate" style="max-width: 100px;">'.strtoupper($row['Seller']).'</td>
                <td class="text-truncate" style="max-width: 100px;">'.strtoupper($row['Supplier']).'</td>
                <td class="text-truncate" style="max-width: 75px;">'.(isset($row['warranty']) ? $row['warranty'] : '').'</td>
                <td class="text-truncate" style="max-width: 75px;">'.$row['Date_Registered'].'</td>
                <!-- Add more columns here based on your product structure -->
            </tr>';
    }

    // Close the HTML table
    echo '</tbody></table>';
}
?>
