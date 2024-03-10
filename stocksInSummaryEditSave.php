<?php
session_start();
include('connection.php');

if(isset($_POST['products'])) {
    $products = json_decode($_POST['products'], true);

    $encnum = null; // Initialize encnum variable

    // Check if products array is not empty
    if (!empty($products)) {
        // Extract encnumber from the first product (assuming all products have the same encnumber)
        $encnum = $products[0]['encnum'];

        // Retrieve the quantity of each product from stocksintry table before deletion
        $retrieveQtyStmt = $conn->prepare("SELECT Barcode, Quantity FROM stocksintry WHERE ENCNum = ?");
        $retrieveQtyStmt->bind_param("s", $encnum);
        $retrieveQtyStmt->execute();
        $retrieveQtyStmt->bind_result($barcode, $quantity);

        // Initialize an array to accumulate quantities for each product
        $quantitiesToUpdate = [];

        // Store retrieved quantities in an associative array and accumulate them
        while ($retrieveQtyStmt->fetch()) {
            if (!isset($quantitiesToUpdate[$barcode])) {
                $quantitiesToUpdate[$barcode] = 0;
            }
            $quantitiesToUpdate[$barcode] += $quantity;
        }
        $retrieveQtyStmt->close();

        // Delete existing products with the same encnumber from stocksintry table
        $deleteStocksStmt = $conn->prepare("DELETE FROM stocksintry WHERE ENCNum = ?");
        $deleteStocksStmt->bind_param("s", $encnum);
        $deleteStocksStmt->execute();
        $deleteStocksStmt->close();

        $deletedeliverycodes = $conn->prepare("DELETE FROM deliverycodes WHERE encnumber = ?");
        $deletedeliverycodes->bind_param("s", $encnum);
        $deletedeliverycodes->execute();
        $deletedeliverycodes->close();

        // Update corresponding products in the products table by subtracting the retrieved quantities
        foreach ($quantitiesToUpdate as $barcode => $qty) {
            // Subtract the accumulated quantity from the products table
            $updateProductStmt = $conn->prepare("UPDATE products SET Quantity = Quantity - ? WHERE Barcode = ?");
            $updateProductStmt->bind_param("is", $qty, $barcode);
            $updateProductStmt->execute();
            $updateProductStmt->close();
        }

        // Update quantities in the products table by adding the quantities of the new products
        foreach ($products as $product) {
            // Add the quantity to the products table
            $updateQuantityStmt = $conn->prepare("UPDATE products SET Quantity = Quantity + ? WHERE Barcode = ?");
            $updateQuantityStmt->bind_param("is", $product['quantity'], $product['barcode']);
            $updateQuantityStmt->execute();
            $updateQuantityStmt->close();
        }
    }

    // Initialize variables for total value and flag for delivery codes insertion
    $totalValue = 0;
    $insertDeliveryCodes = false;

    // Prepare statement for inserting new products
    $stmt = $conn->prepare("REPLACE INTO stocksintry (Barcode, Product, ItemType, Unit, Quantity, Costing, Price, Wholesale, Promo, DeliveryNumber, Supplier, Receiver, itemSerial, ENCNum, TotalValRow) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    // Iterate through each product and insert into stocksintry table
    foreach($products as $product) {
        // Bind parameters for the prepared statement
        $stmt->bind_param("ssssiiiiisssssi", $product['barcode'], $product['product'], $product['type'], $product['unit'], $product['quantity'], $product['costing'], $product['price'], $product['wholesale'], $product['promo'], $product['deliverynum'], $product['supplier'], $product['receiver'], $product['itemserial'], $product['encnum'], $product['totalvalrow']);

        // Execute the statement
        $stmt->execute();

        // Calculate total value for all products
        $totalValue += $product['quantity'] * $product['costing'];
    }

    // Insert delivery codes only once
    if ($encnum !== null && !$insertDeliveryCodes) {
        // Insert total value into deliverycodes table
        $insertDeliveryCodeQuery = "INSERT INTO deliverycodes (encnumber, DeliveryNumber, Supplier, Receiver, TotalVal) VALUES (?, ?, ?, ?, ?)";
        $insertDeliveryCodeStmt = $conn->prepare($insertDeliveryCodeQuery);
        $insertDeliveryCodeStmt->bind_param("ssssd", $encnum, $products[0]['deliverynum'], $products[0]['supplier'], $products[0]['receiver'], $totalValue);
        $insertDeliveryCodeStmt->execute();
        $insertDeliveryCodeStmt->close();
        $insertDeliveryCodes = true; // Set flag to true after inserting delivery codes
    }

    $stmt->close();

    // Set session status based on the success of the operation
    $_SESSION['status'] = "Products stocked in successfully.";
    $_SESSION['status_code'] = "success";

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
