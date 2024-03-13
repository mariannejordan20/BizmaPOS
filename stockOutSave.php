<?php
session_start();
include('connection.php');

if(isset($_POST['products'])) {
    $products = json_decode($_POST['products'], true);

    $insertValues = [];
    $insertStockOutSummary = false; // Flag to ensure delivery codes are inserted only once
    $totalValue = 0; // Initialize total value

    $stmt = $conn->prepare("INSERT INTO stockOutHistory (Barcode, Product, ItemType, Unit, Quantity, Costing, Charges, OrderedBy, ApprovedBy,Consignee, itemSerial, ENCNum,StockOutType, TotalValRow) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    foreach($products as $product) {
        $barcode = $product['barcode'];
        $productName = $product['product'];
        $itemType = $product['type']; // Assuming this is the correct column name in your table
        $unit = $product['unit'];
        $quantity = $product['quantity'];
        $costing = $product['costing'];
        $charges = $product['charges'];
        $orderedby = $product['orderedby'];
        $approvedby = $product['approvedby'];
        $consignee = $product['consignee'];
        $itemSerial = $product['itemserial'];
        $encnum = $product['encnum'];
        $stockouttype = $product['stockouttype'];
        $totalvalrow = $product['totalvalrow'];

        // Calculate total value for this product and accumulate it
        $productTotalValue = $quantity * $costing;
        $totalValue += $productTotalValue;

        // Bind parameters and execute the statement for each product
        $stmt->bind_param("ssssiiissssssi", $barcode, $productName, $itemType, $unit, $quantity, $costing, $charges, $orderedby, $approvedby,$consignee, $itemSerial, $encnum,$stockouttype, $totalvalrow);
        if ($stmt->execute()) {
            // Product successfully inserted
            $insertValues[] = true;
        } else {
            // Error inserting product
            $insertValues[] = false;
        }

        // Update quantity in the products table
        $updateQuantityQuery = "UPDATE products SET Quantity = Quantity - ? WHERE Barcode = ?";
        $updateStmt = $conn->prepare($updateQuantityQuery);
        $updateStmt->bind_param("is", $quantity, $barcode);
        $updateStmt->execute();
        $updateStmt->close();
    }

    // Insert delivery codes only once
    if (!empty($products) && !$insertStockOutSummary) {
        // Insert total value into deliverycodes table
        $insertStockOutQuery = "INSERT INTO stockoutsummary (encnumber, StockOutType, OrderedBy, ApprovedBy,Consignee, TotalVal, Charges) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $insertStockOutStmt = $conn->prepare($insertStockOutQuery);
        $insertStockOutStmt->bind_param("sssssdd", $encnum, $stockouttype, $orderedby, $approvedby,$consignee, $totalValue, $charges);
        $insertStockOutStmt->execute();
        $insertStockOutStmt->close();
        $insertStockOutSummary = true; // Set flag to true after inserting delivery codes
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
