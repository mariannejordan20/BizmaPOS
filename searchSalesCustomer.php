<?php
// Connect to your database
include('connection.php');

// Retrieve search text from POST request
$searchText = $_POST['searchText'];

// Prepare SQL query to search for customers
$sql = "SELECT ID, CustomerName, ContactPerson, Loc FROM customer WHERE CustomerName LIKE '%$searchText%' OR ContactPerson LIKE '%$searchText%'";
$results = $conn->query($sql);

// Check if there are any results
if ($results->num_rows > 0) {
    while ($row = $results->fetch_assoc()) {
        echo '<div class="customer-item" data-customer-id="' . $row['ID'] . '" data-customer-name="' . $row['CustomerName'] . '" data-customer-contact="' . $row['ContactPerson'] . '" data-customer-address="' . $row['Loc'] . '">' .
                $row['CustomerName'] . ' - Contact: ' . $row['ContactPerson'] . ' - Location: ' . $row['Loc'] .
             '</div>';
    }
} else {
    // If no customers found, display a message
    echo '<div class="customer-item">No customers found</div>';
}


// Close the database connection
$conn->close();
?>
