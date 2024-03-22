<?php
session_start();
include('connection.php');


include('getMaxInvoiceNumber.php');


$product = mysqli_real_escape_string($conn, $_POST['product']);
$barcode = mysqli_real_escape_string($conn, $_POST['barcode']);
$type = mysqli_real_escape_string($conn, $_POST['type']);
$unit = mysqli_real_escape_string($conn, $_POST['unit']);
$Quantity = mysqli_real_escape_string($conn, $_POST['quantity']);
$Costing = mysqli_real_escape_string($conn, $_POST['costing']);
$Price = mysqli_real_escape_string($conn, $_POST['price']);
$ItemSerial = mysqli_real_escape_string($conn, $_POST['itemserial']);


$invoiceNum = $formattedInvoiceNumber;

$TotalVal = $Quantity * $Price;

$insertInvoiceNumQuery = "INSERT INTO invoice (InvoiceNumber)
                        VALUES ('$invoiceNum')";
if(mysqli_query($conn, $insertInvoiceNumQuery)) {
    echo "Invoice successfully added.";
    $_SESSION['invoiceNumber'] = $invoiceNum;
} else {
    echo "Error: " . $insertInvoiceNumQuery . "<br>" . mysqli_error($conn);
}

$insertSalesQuery = "INSERT INTO saleshistory (Barcode, Product, ItemType, Unit, Quantity, Costing, Price, ItemSerial, TotalValRow) 
                    VALUES ('$barcode', '$product', '$type', '$unit', '$Quantity', '$Costing', '$Price', '$ItemSerial',  '$TotalVal')";
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
