<?php
session_start();
include('connection.php');

// Check if the product ID is set and not empty
if (isset($_POST['productId']) && !empty($_POST['productId'])) {
    // Sanitize the input to prevent SQL injection
    $productId = $_POST['productId'];

    // Prepare and execute the SQL query to delete the product
    $query = "DELETE FROM stocksintry WHERE PrevID = ?";
    $statement = $conn->prepare($query);
    $statement->bind_param('i', $productId); // Assuming product ID is an integer
    $result = $statement->execute();

    if ($result) {
        // Product deleted successfully
        echo json_encode(['success' => true]);
    } else {
        // Error occurred while deleting the product
        echo json_encode(['success' => false, 'error' => 'Error deleting product']);
    }
} else {
    // Product ID not provided or empty
    echo json_encode(['success' => false, 'error' => 'Product ID not provided']);
}
?>
