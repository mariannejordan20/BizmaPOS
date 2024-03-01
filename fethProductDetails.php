<?php
// fetchProductDetails.php

// Include database connection
include('connection.php');

// Check if productName is set
if(isset($_POST['productName'])) {
    // Sanitize the input
    $productName = $conn->real_escape_string($_POST['productName']);

    // Query to fetch product details by productName
    $sql = "SELECT * FROM products WHERE Product = '$productName'";
    $result = $conn->query($sql);

    // Check if result exists
    if($result->num_rows > 0) {
        // Fetch the details
        $row = $result->fetch_assoc();
        
        // Return product details as JSON
        echo json_encode($row);
    } else {
        // No product found
        echo json_encode(array('error' => 'Product not found'));
    }
} else {
    // No productName provided
    echo json_encode(array('error' => 'Product name not provided'));
}
?>
