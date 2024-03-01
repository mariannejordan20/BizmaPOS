<?php
include('connection.php');

// Check if searchTerm is set and not empty
if(isset($_POST['searchTerm']) && !empty($_POST['searchTerm'])) {
    $searchTerm = $_POST['searchTerm'];

    // Prepare the SQL statement with a placeholder for the search term
    $sql = "SELECT ID, Barcode, Quantity, ItemType, Product, Unit, Costing, Price, Wholesale, Promo, Categories, Seller, Supplier, Date_Registered FROM products WHERE Product LIKE ? ORDER BY Categories";
    
    // Prepare the statement
    $stmt = $conn->prepare($sql);
    
    // Bind the search term to the placeholder in the SQL statement
    $stmt->bind_param("s", $searchTermParam);
    
    // Set the search term parameter
    $searchTermParam = '%' . $searchTerm . '%';
    
    // Execute the statement
    $stmt->execute();
    
    // Get the result set
    $result = $stmt->get_result();
    
    // Initialize an empty array to store the products
    $products = array();
    
    // Fetch the rows from the result set
    while ($row = $result->fetch_assoc()) {
        // Add each row to the products array
        $products[] = $row;
    }
    
    // Close the statement
    $stmt->close();
    
    // Output the products array as JSON
    echo json_encode($products);
} else {
    // If searchTerm is not set or empty, return an empty array
    echo json_encode(array());
}
?>
