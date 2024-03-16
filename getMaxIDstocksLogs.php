<?php
include('connection.php');

// Check connection


// Query to fetch the maximum ID from stocksintry table
$sql = "SELECT MAX(ID) AS maxID FROM stocksintry";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Fetch the maximum ID
    $row = $result->fetch_assoc();
    $maxID = $row["maxID"];

    // Return the maximum ID
    echo $maxID;
} else {
    // If no records found, return 0
    echo 0;
}

$conn->close();
?>
