<?php
session_start();
include('connection.php');

if(isset($_POST['products'])) {
    $products = json_decode($_POST['products'], true);

    $insertValues = [];
    $insertDeliveryCodes = false; // Flag to ensure delivery codes are inserted only once
    $totalValue = 0; // Initialize total value

    $stmt = $conn->prepare("INSERT INTO stocksintry (Barcode, Product, ItemType, Unit, Quantity, Costing, Price, Wholesale, Promo, DeliveryNumber, Supplier, Receiver, itemSerial, ENCNum, TotalValRow) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    foreach($products as $product) {
        $barcode = $product['barcode'];
        $productName = $product['product'];
        $itemType = $product['type']; // Assuming this is the correct column name in your table
        $unit = $product['unit'];
        $quantity = $product['quantity'];
        $costing = $product['costing'];
        $price = $product['price'];
        $wholesale = $product['wholesale'];
        $promo = $product['promo'];
        $deliverynum = $product['deliverynum'];
        $supplier = $product['supplier'];
        $receiver = $product['receiver'];
        $itemSerial = $product['itemserial'];
        $encnum = $product['encnum'];
        $totalvalrow = $product['totalvalrow'];

        // Calculate total value for this product and accumulate it
        $productTotalValue = $quantity * $costing;
        $totalValue += $productTotalValue;

        // Bind parameters and execute the statement for each product
        $stmt->bind_param("ssssiiiiisssssi", $barcode, $productName, $itemType, $unit, $quantity, $costing, $price, $wholesale, $promo, $deliverynum, $supplier, $receiver, $itemSerial, $encnum, $totalvalrow);
        if ($stmt->execute()) {
            // Product successfully inserted
            $insertValues[] = true;
        } else {
            // Error inserting product
            $insertValues[] = false;
        }

        // Update quantity in the products table
        $updateQuantityQuery = "UPDATE products SET Quantity = Quantity + ? WHERE Barcode = ?";
        $updateStmt = $conn->prepare($updateQuantityQuery);
        $updateStmt->bind_param("is", $quantity, $barcode);
        $updateStmt->execute();
        $updateStmt->close();
    }

    // Insert delivery codes only once
    if (!empty($products) && !$insertDeliveryCodes) {
        // Insert total value into deliverycodes table
        $insertDeliveryCodeQuery = "INSERT INTO deliverycodes (encnumber, DeliveryNumber, Supplier, Receiver, TotalVal) VALUES (?, ?, ?, ?, ?)";
        $insertDeliveryCodeStmt = $conn->prepare($insertDeliveryCodeQuery);
        $insertDeliveryCodeStmt->bind_param("ssssd", $encnum, $deliverynum, $supplier, $receiver, $totalValue);
        $insertDeliveryCodeStmt->execute();
        $insertDeliveryCodeStmt->close();
        $insertDeliveryCodes = true; // Set flag to true after inserting delivery codes
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
