<?php
session_start();

include('connection.php');
$id = $_POST['hiddenID'];
$barcode = $_POST['Barcode'];
$product = $_POST['Product'];
$unit = $_POST['Unit'];
$quantity = $_POST['Quantity'];
$costing = $_POST['Costing'];
$price = $_POST['Price'];
$wholesale = $_POST['Wholesale'];
$promo = $_POST['Promo'];
$categories = $_POST['Categories'];
$seller = $_POST['Seller'];
$supplier = $_POST['Supplier'];




$query = mysqli_query($conn, "SELECT * FROM products WHERE Barcode = '$barcode' AND Product = '$product' AND Unit = '$unit' AND Quantity = '$quantity' AND Costing = '$costing' AND Price = '$price' AND Wholesale = '$wholesale'
AND Promo = '$promo' AND Categories = '$categories' AND Seller = '$seller' 
AND Supplier = '$supplier'");


if (!empty($barcode)) {
    $query2 = mysqli_query($conn, "SELECT * FROM products WHERE Barcode = '$barcode'");
if (mysqli_num_rows($query2) >1 ) {
    $_SESSION['status'] = "Student ID already Exists";
    $_SESSION['status_code'] = "error";
    
} else {
    $update = "Update products set Barcode = '".$barcode."', Product = '".$product."', Unit = '".$unit."', Quantity = '".$quantity."', Costing = '".$costing."', Price = '".$price."', Wholesale = '".$wholesale."', Promo = '".$promo."', Categories = '".$categories."', Seller = '".$seller."' 
	, Supplier = '".$supplier."' ";

    $update .= "where id = ".$id;

    if ($barcode !== "" || $product !== "" || $unit !== "" || $quantity !== "" || $costing !== "" || $price !== "" || $wholesale !== "" || $promo !== "" || $categories !== "" || $seller !== "" || $supplier !== "") {
        $res = $conn->query($update);

        if ($res && mysqli_affected_rows($conn) > 0) {
            $_SESSION['status'] = "Edit Successful";
            $_SESSION['status_code'] = "success";
            header("location:products.php");
        } else {
            $_SESSION['status'] = "No changes made";
            $_SESSION['status_code'] = "success";
            header("location:products.php");
            // Redirect to appropriate page
        }
    } else {
        $_SESSION['status'] = "No changes made";
        $_SESSION['status_code'] = "success";
        header("location:products.php");
        // Redirect to appropriate page
    }
	}
}
?>
