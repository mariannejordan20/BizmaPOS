<?php
session_start();
include('connection.php');

// Include getMaxEncodeNumber.php to get the generated encode number
include('getMaxEncodeNumber.php');

$productId = mysqli_real_escape_string($conn, $_POST['productId']);
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

// $EncNum is assigned from the generated value in getMaxEncodeNumber.php
$EncNum = $formattedEncodeNumber;

$TotalVal = $Quantity * $Costing;

$insertEncodeNumQuery = "INSERT INTO deliverycodes (encnumber, DeliveryNumber, Supplier, Receiver)
                        VALUES ('$EncNum','$DRNum','$Supplier','$Receiver')";
if(mysqli_query($conn, $insertEncodeNumQuery)) {
    echo "Delivery code inserted successfully.";
    $_SESSION['EncNum'] = $EncNum;
} else {
    echo "Error: " . $insertEncodeNumQuery . "<br>" . mysqli_error($conn);
}

$insertStocksQuery = "INSERT INTO stocksintry (PrevID,Barcode, Product, ItemType, Unit, Quantity, Costing, Price, Wholesale, Promo, DeliveryNumber, Supplier, Receiver, ItemSerial, ENCNum, TotalValRow) 
                    VALUES ('$productId','$barcode', '$product', '$type', '$unit', '$Quantity', '$Costing', '$Price', '$Wholesale', '$Promo', '$DRNum', '$Supplier', '$Receiver', '$ItemSerial', '$EncNum', '$TotalVal')";
if(mysqli_query($conn, $insertStocksQuery)) {
    echo "Stock record inserted successfully.";
} else {
    echo "Error: " . $insertStocksQuery . "<br>" . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>
