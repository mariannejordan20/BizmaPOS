<?php
session_start();
include('connection.php');





$product = mysqli_real_escape_string($conn, $_POST['product']);
$barcode = mysqli_real_escape_string($conn, $_POST['barcode']);
$type = mysqli_real_escape_string($conn, $_POST['type']);
$unit = mysqli_real_escape_string($conn, $_POST['unit']);
$Quantity = mysqli_real_escape_string($conn, $_POST['quantity']);
$Costing = mysqli_real_escape_string($conn, $_POST['costing']);
$Price = mysqli_real_escape_string($conn, $_POST['price']);
$ItemSerial = mysqli_real_escape_string($conn, $_POST['itemserial']);
$Warranty = mysqli_real_escape_string($conn, $_POST['warranty']);
$invoiceNum = mysqli_real_escape_string($conn, $_POST['invoicenum']);


$TotalVal = $Quantity * $Price;

$updateInvoice = "UPDATE invoice SET TotalAmount = TotalAmount + $TotalVal WHERE InvoiceNumber = '$invoiceNum'";
if (!mysqli_query($conn, $updateInvoice)) {
    echo "Error updating TotalAmount: " . mysqli_error($conn);
    exit();
}


$insertSalesQuery = "INSERT INTO saleshistory (Barcode,InvoiceNumber, Product, ItemType, Unit, Quantity, Costing, Price, Warranty, ItemSerial, TotalValRow) 
                    VALUES ('$barcode','$invoiceNum', '$product', '$type', '$unit', '$Quantity', '$Costing', '$Price', '$Warranty', '$ItemSerial', '$TotalVal')";
if(mysqli_query($conn, $insertSalesQuery)) {
    echo "Stock record inserted successfully.";
    
    // Update quantity in products table
    $updateQuantityQuery = "UPDATE products SET Quantity = Quantity - $Quantity WHERE Barcode = '$barcode'";
    if(mysqli_query($conn, $updateQuantityQuery)) {
        echo "Product quantity updated successfully.";
    } else {
        echo "Error updating product quantity: " . mysqli_error($conn);
    }
} else {
    echo "Error: " . $insertSalesQuery . "<br>" . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>
