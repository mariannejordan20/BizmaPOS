<?php
include('connection.php');

// Default SQL query to retrieve all customers
$sql = "SELECT * FROM customer ORDER BY Seqcode";

// Check if a search term is provided
if (isset($_GET['search'])) {
    $searchTerm = $_GET['search'];

    // If the search term is not empty, modify the SQL query to search for customers
    if (!empty($searchTerm)) {
        $sql = "SELECT * FROM customer WHERE CustomerName LIKE '%$searchTerm%' OR IDNumber LIKE '%$searchTerm%' ORDER BY Seqcode";
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
                <tr class="th" style="text-align: left;">
                <th class="text-center custom-column-width">ACTION</th>
                <th class="text-center custom-column-width">SEQCODE</th>
                <th class="text-center custom-column-width">ID NUMBER</th>
                <th class="text-center custom-column-width">BARCODE</th>
                <th class="text-center custom-column-width">CUSTOMER NAME</th>
                <th class="text-center custom-column-width">TERM OF PAYMENT</th>
                <th class="text-center custom-column-width">VAT TIN(NOS)</th>
                <th class="text-center custom-column-width">CONTACT PERSON</th>
                <th class="text-center custom-column-width">ADDRESS</th>
                <th class="text-center custom-column-width">CONTACT NO.</th>
                <th class="text-center custom-column-width">DATE REGISTERED</th>
                </tr>
            </thead>
            <tbody class="custom-font-size" style="color: #313A46">';

    // Iterate through the results and output table rows
    while ($row = $results->fetch_assoc()) {
        echo '<tr>
                <td>
                    <a class="mr-2" href="#?id=' . $row['ID'] . '" data-bs-toggle="modal" data-bs-target="#customersModal' . $row['ID'] . '"><i class="fa fa-eye"></i></a>
                    <a class="mr-2" href="customersEdit.php?id=' . $row['ID'] . '"><i class="fa fa-edit"></i></a>
                    <a href="customersDelete.php?id=' . $row['ID'] . '"><i class="fa fa-trash text-danger"></i></a>
                </td>
                <td class="text-truncate">' . strtoupper($row['Seqcode']) . '</td>
                <td class="text-truncate">' . strtoupper($row['IDNumber']) . '</td>
                <td class="text-truncate">' . strtoupper($row['Barcode']) . '</td>
                <td class="text-truncate" style="max-width: 150px;">' . strtoupper($row['CustomerName']) . '</td>
                <td class="text-truncate">' . strtoupper($row['TermofPayment']) . '</td>
                <td class="text-truncate">' . strtoupper($row['VATTIN']) . '</td>
                <td class="text-truncate">' . strtoupper($row['ContactPerson']) . '</td>
                <td class="text-truncate" style="max-width: 100px;">' . strtoupper($row['Loc']) . '</td>
                <td class="text-truncate">' . strtoupper($row['Contact']) . '</td>
                <td class="text-truncate">' . strtoupper($row['Date_Joined']) . '</td>
            </tr>';
    }

    // Close the HTML table
    echo '</tbody></table>';
}
?>
