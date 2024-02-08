<?php
// Include your connection file
include('connection.php');

// Check if the search term is provided
if(isset($_GET['search'])) {
    // Sanitize the search term to prevent SQL injection
    $searchTerm = mysqli_real_escape_string($conn, $_GET['search']);

    // Construct the SQL query to search by customer name or barcode
    $sql = "SELECT ID, Seqcode, IDNumber, Barcode, CustomerName, TermofPayment, VATTIN, ContactPerson, Loc, Contact, Date_Joined FROM customer WHERE CustomerName LIKE '%$searchTerm%' OR Barcode LIKE '%$searchTerm%' ORDER BY Seqcode";
} else {
    // If no search term provided, select all data
    $sql = "SELECT ID, Seqcode, IDNumber, Barcode, CustomerName, TermofPayment, VATTIN, ContactPerson, Loc, Contact, Date_Joined FROM customer ORDER BY Seqcode";
}

// Execute the query
$results = $conn->query($sql);

// Check for errors in the query execution
if (!$results) {
    die("Error in SQL query: " . $conn->error);
}

// Fetch and display the search results
if ($results->num_rows > 0) {
    while ($row = $results->fetch_assoc()) {
        // Output each row as per your table structure
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
} else {
    echo "<tr><td colspan='11'>No records found.</td></tr>";
}
?>
