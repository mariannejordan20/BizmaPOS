<?php
// Connect to your database
include('connection.php');

$searchText = $_POST['searchText'];

$sql = "SELECT ID, CustomerName, ContactPerson, Loc FROM customers WHERE CustomerName LIKE '%$searchText%' OR ContactPerson LIKE '%$searchText%' OR Loc LIKE '%$searchText%'";

$results = $conn->query($sql);

if ($results->num_rows > 0) {
    while ($row = $results->fetch_assoc()) {
        echo '<a class="dropdown-item customer-item" data-customer-id="' . $row['ID'] . '" data-name="' . $row['CustomerName'] . '" data-contact-number="' . $row['ContactPerson'] . '" data-address="' . $row['Loc'] . '">' . $row['Name'] . ' - ' . $row['ContactNumber'] . ' - ' . $row['Address'] . '</a>';
    }
} else {
    echo '<a class="dropdown-item">No customers found</a>';
}

$conn->close();
?>
