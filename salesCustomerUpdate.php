<?php
// Include the database connection file
include('connection.php');

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize inputs to prevent SQL injection
    $invoiceNum = mysqli_real_escape_string($conn, $_POST['invoiceNum']);
    $customerName = mysqli_real_escape_string($conn, $_POST['customerName']);
    
    // Update saleshistory table
    $sql = "UPDATE saleshistory SET Customer = '$customerName' WHERE invoiceNumber = '$invoiceNum'";
    
    if (mysqli_query($conn, $sql)) {
        // Query executed successfully
        echo "Sales history updated successfully";
    } else {
        // Error executing query
        echo "Error updating sales history: " . mysqli_error($conn);
    }
} else {
    // Invalid request method
    echo "Invalid request method";
}
?>
