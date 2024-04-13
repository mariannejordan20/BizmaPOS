<?php
// Include connection.php to establish database connection
include 'connection.php';

// Check if invoiceNumber is set in the POST request
if(isset($_POST['invoiceNumber'])) {
    // Sanitize the input to prevent SQL injection
    $invoiceNumber = mysqli_real_escape_string($conn, $_POST['invoiceNumber']);
    
    // SQL query to update PurchaseStatus to 2 where invoiceNumber matches
    $sql = "UPDATE invoice SET PurchaseStatus = 2 WHERE InvoiceNumber = '$invoiceNumber'";
    
    // Perform the update query
    if(mysqli_query($conn, $sql)) {
        // If update is successful, return success message
        echo "Invoice status updated successfully.";
    } else {
        // If update fails, return error message
        echo "Error updating invoice status: " . mysqli_error($conn);
    }
} else {
    // If invoiceNumber is not set in the POST request, return error message
    echo "Error: Invoice number is not provided.";
}

// Close database connection
mysqli_close($conn);
?>
