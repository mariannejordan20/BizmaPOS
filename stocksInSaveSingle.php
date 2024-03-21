<?php
session_start();
include('connection.php');


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

// Check if the encnumber already exists in the deliverycodes table
$checkEncNumQuery = "SELECT * FROM deliverycodes WHERE encnumber = '$EncNum'";
$result = mysqli_query($conn, $checkEncNumQuery);



if (mysqli_num_rows($result) > 0) {
    // If the encnumber already exists, do not insert into deliverycodes table
    echo "Error: ENCNum already exists.";
} else {
    // Insert into deliverycodes table
    $insertEncodeNumQuery = "INSERT INTO deliverycodes (encnumber, DeliveryNumber, Supplier, Receiver)
                            VALUES ('$EncNum','$DRNum','$Supplier','$Receiver')";
    if(mysqli_query($conn, $insertEncodeNumQuery)) {
        echo "Delivery code inserted successfully.";
    } else {
        echo "Error: " . $insertEncodeNumQuery . "<br>" . mysqli_error($conn);
    }
}

// Insert into stocksintry table
$insertStocksQuery = "INSERT INTO stocksintry (Barcode, Product, ItemType, Unit, Quantity, Costing, Price, Wholesale, Promo, DeliveryNumber, Supplier, Receiver, ItemSerial, ENCNum, TotalValRow) 
                    VALUES ('$barcode', '$product', '$type', '$unit', '$Quantity', '$Costing', '$Price', '$Wholesale', '$Promo', '$DRNum', '$Supplier', '$Receiver', '$ItemSerial', '$EncNum', '$TotalVal')";
if(mysqli_query($conn, $insertStocksQuery)) {
    echo "Stock record inserted successfully.";

   
    if(mysqli_query($conn, $updateQuantityQuery)) {
        $updateQuantityQuery = "UPDATE products SET Quantity = Quantity + $Quantity, Costing = $Costing, Price = $Price, Wholesale = $Wholesale, Promo = $Promo  WHERE Barcode = '$barcode'";
        echo "Product quantity updated successfully.";
    } else {
        echo "Error updating product quantity: " . mysqli_error($conn);
    }
 
}
else {
    echo "Error: " . $insertStocksQuery . "<br>" . mysqli_error($conn);
}


// Close the database connection
mysqli_close($conn);
?>
