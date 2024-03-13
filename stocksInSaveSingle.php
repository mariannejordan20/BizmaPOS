<?php
session_start();
include('connection.php');



// Retrieve and sanitize form data
$product = mysqli_real_escape_string($conn, $_POST['product']);
$barcode = mysqli_real_escape_string($conn, $_POST['barcode']);
$type = mysqli_real_escape_string($conn, $_POST['type']);
$unit = mysqli_real_escape_string($conn, $_POST['unit']);
$DRNum = mysqli_real_escape_string($conn, $_POST['deliverynum']);
$Supplier = mysqli_real_escape_string($conn, $_POST['supplier']);
$Receiver = mysqli_real_escape_string($conn, $_POST['receiver']);
$Quantity = mysqli_real_escape_string($conn, $_POST['quantity']);
$Costing = mysqli_real_escape_string($conn, $_POST['costing']);
$Price = mysqli_real_escape_string($conn, $_POST['price']);
$Wholesale = mysqli_real_escape_string($conn, $_POST['wholesale']);
$Promo = mysqli_real_escape_string($conn, $_POST['promo']);
$ItemSerial = mysqli_real_escape_string($conn, $_POST['itemserial']);
$EncNum = mysqli_real_escape_string($conn, $_POST['encnum']);
$TotalVal = $Quantity * $Costing;

$insertEncodeNumQuery = "INSERT INTO deliverycodes (encnumber, DeliveryNumber, Supplier, Receiver)
                VALUES ('$EncNum','$DRNum','$Supplier','$Receiver')";
// Execute the query
if(mysqli_query($conn, $insertEncodeNumQuery)) {
    echo "Delivery code inserted successfully.";
} else {
    echo "Error: " . $insertEncodeNumQuery . "<br>" . mysqli_error($conn);
}


$insertStocksQuery = "INSERT INTO stocksintry (Barcode, Product, ItemType, Unit, Quantity, Costing, Price, Wholesale, Promo, DeliveryNumber, Supplier, Receiver, ItemSerial, ENCNum, TotalValRow) 
                VALUES ('$barcode', '$product', '$type', '$unit', '$Quantity', '$Costing', '$Price', '$Wholesale', '$Promo', '$DRNum', '$Supplier', '$Receiver', '$ItemSerial', '$EncNum', '$TotalVal')";
// Execute the query
if(mysqli_query($conn, $insertStocksQuery)) {
    echo "Stock record inserted successfully.";
} else {
    echo "Error: " . $insertStocksQuery . "<br>" . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>
