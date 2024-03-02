<?php
// fetchProductDetails.php

// Include database connection
include('connection.php');

// Initialize response array
$response = array();

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
        
        // Set success flag and product details in response
        $response['success'] = true;
        $response['product'] = $row;
    } else {
        // No product found, set error flag in response
        $response['success'] = false;
        $response['error'] = 'Product not found';
    }
} else {
    // No productName provided, set error flag in response
    $response['success'] = false;
    $response['error'] = 'Product name not provided';
}

// Return response as JSON
echo json_encode($response);
?>
