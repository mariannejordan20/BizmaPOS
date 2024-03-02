<?php
session_start();
include('connection.php');

if(isset($_POST['products'])) {
    $products = json_decode($_POST['products'], true);

    $insertValues = [];
    $stmt = $conn->prepare("INSERT INTO stockinhistory (Barcode, Product, ItemSerial, Unit, Quantity) VALUES (?, ?, ?, ?, ?)");

    foreach($products as $product) {
        $barcode = $product['barcode'];
        $productName = $product['product'];
        $itemSerial = $product['type']; // Assuming this is the correct column name in your table
        $unit = $product['unit'];
        $quantity = $product['quantity'];

        // Bind parameters and execute the statement for each product
        $stmt->bind_param("ssssi", $barcode, $productName, $itemSerial, $unit, $quantity);
        if ($stmt->execute()) {
            // Product successfully inserted
            $insertValues[] = true;
        } else {
            // Error inserting product
            $insertValues[] = false;
        }
    }
    
    $stmt->close();

    // Check if all products were inserted successfully
    if (array_search(false, $insertValues) === false) {
        // All products inserted successfully
        $_SESSION['status'] = "Products stocked in successfully.";
        $_SESSION['status_code'] = "success";
    } else {
        // Some products failed to insert
        $_SESSION['status'] = "Error stocking in products.";
        $_SESSION['status_code'] = "error";
    }
} else {
    $_SESSION['status'] = "No products data received.";
    $_SESSION['status_code'] = "error";
}

// Send plain text response
echo $_SESSION['status'];

// Unset session variables to prevent displaying the SweetAlert messages again
unset($_SESSION['status']);
unset($_SESSION['status_code']);
?>
