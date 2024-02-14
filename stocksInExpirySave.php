<?php
session_start();

include('connection.php');

$id = $_POST['hiddenID'];
$barcode = $_POST['Barcode'];
$product = $_POST['Product'];
$productid = $_POST['ProductID'];
$shipper = $_POST['Shipper'];
$warranty = $_POST['Warranty'];
$receiver = $_POST['Receiver'];
$deliverynumber = $_POST['DeliveryNumber'];
$batchnumber = $_POST['BatchNumber'];
$unit = $_POST['Unit'];
$additionalQuantity = $_POST['Quantity']; 
$costing = $_POST['Costing'];
$price = $_POST['Price'];
$wholesale = $_POST['Wholesale'];
$promo = $_POST['Promo'];
$categories = $_POST['Categories'];
$subcategory = $_POST['SubCategory'];
$seller = $_POST['Seller'];
$supplier = $_POST['Supplier'];

$quantityadded = $_POST['Quantity']; 


$query = mysqli_query($conn, "SELECT * FROM productsexpiry WHERE BatchNumber = '$batchnumber' ");
     if (mysqli_num_rows($query) > 0 )    
        {
            $_SESSION['status'] = "Product Already Exist";
            $_SESSION['status_code'] = "error";
            header("location:stocksIn.php");

        }
        else{

// Fetch current quantity from the database
$getQuantityQuery = "SELECT Quantity FROM products WHERE id = ".$id;
$result = $conn->query($getQuantityQuery);

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $currentQuantity = $row['Quantity'];

    // Calculate the new quantity (cannot be less than 0)
    $additionalQuantity = max(0, $additionalQuantity + $currentQuantity);

    // Update the other fields in the database
    $update = "UPDATE products SET Barcode = '".$barcode."', Product = '".$product."', Unit = '".$unit."', Quantity = '".$additionalQuantity."', Costing = '".$costing."', Price = '".$price."', Wholesale = '".$wholesale."', Promo = '".$promo."', Categories = '".$categories."', Seller = '".$seller."', Supplier = '".$supplier."' ";
    $update .= "WHERE id = ".$id;

    $stockInHistory = "INSERT INTO stockinhistory (Barcode,ProductID,DeliveryNumber,Shipper,Receiver, Product,BatchNumber, Unit, Quantity, Costing, Price, Wholesale, Promo,Warranty, Categories,SubCategory, Seller, Supplier) VALUES ";
    $stockInHistory .= "('".$barcode."','".$productid."','".$deliverynumber."','".$shipper."','".$receiver."', '".$product."','".$batchnumber."', '".$unit."', '".$quantityadded."', '".$costing."', '".$price."', '".$wholesale."', '".$promo."','".$warranty."', '".$categories."','".$subcategory."' ,'".$seller."', '".$supplier."')";


    $stockInExpiry = "INSERT INTO productsexpiry (Barcode,ProductID,DeliveryNumber,Shipper,Receiver, Product,BatchNumber,Unit, Quantity, Costing, Price, Wholesale, Promo,Warranty, Categories,SubCategory, Seller, Supplier) VALUES ";
    $stockInExpiry .= "('".$barcode."', '".$productid."','".$deliverynumber."','".$shipper."','".$receiver."','".$product."','".$batchnumber."', '".$unit."', '".$quantityadded."', '".$costing."', '".$price."', '".$wholesale."', '".$promo."','".$warranty."', '".$categories."','".$subcategory."' , '".$seller."', '".$supplier."')";

    if ($barcode !== "" || $product !== "" || $unit !== "" || $additionalQuantity !== "" || $costing !== "" || $price !== "" || $wholesale !== "" || $promo !== "" || $categories !== "" || $seller !== "" || $supplier !== "") {
        $res = $conn->query($update);
        $res2 = $conn->query($stockInHistory);
        $res3 = $conn->query($stockInExpiry);


        

        if ($res && $res2) {
            $_SESSION['status'] = "Stock In Successful";
            $_SESSION['status_code'] = "success";
            header("location:stocksIn.php");
        } else {
            $_SESSION['status'] = "No changes made";
            $_SESSION['status_code'] = "success";
            header("location:stocksIn.php");
            
        }
    } else {
        $_SESSION['status'] = "No changes made";
        $_SESSION['status_code'] = "success";
        header("location:stocksIn.php");
        
    }
} else {
    $_SESSION['status'] = "Error fetching current quantity";
    $_SESSION['status_code'] = "error";
    header("location:stocksIn.php");
    
}

        }
?>
