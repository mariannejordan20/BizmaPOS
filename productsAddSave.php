<?php
session_start();
include('connection.php');

$barcode = $_POST['Barcode'];
$type = $_POST['ItemType'];
$product = $_POST['Product'];
$unit = $_POST['Unit'];
$warranty = $_POST['Warranty'];
$costing = $_POST['Costing'];
$price = $_POST['Price'];
$wholesale = $_POST['Wholesale'];
$promo = $_POST['Promo'];
$categories = $_POST['Categories'];
$seller = $_POST['Seller'];
$supplier = $_POST['Supplier'];
$date = $_POST['Date_Registered'];
$subcategories = $_POST['SubCategories'];


                                $sqlMaxID = "SELECT MAX(ID) AS maxID FROM products";
                                $resultMaxID = $conn->query($sqlMaxID);
                                $rowMaxID = $resultMaxID->fetch_assoc();
                                $maxID = $rowMaxID['maxID'];

                                
                                $nextID = $maxID + 1;

                                // Format the ID to be six digits long
                                $next_IDcode = sprintf("%06d", $nextID);
                           



$productid = strtoupper($productid);
$barcode = strtoupper($barcode);

$product = strtoupper($product);
$unit = strtoupper($unit);
$categories = strtoupper($categories);
$seller = strtoupper($seller);
$supplier = strtoupper($supplier);
$subcategories = strtoupper($subcategories);


$query = mysqli_query($conn, "SELECT * FROM products WHERE Barcode = '$barcode' OR (Product = '$product' AND Costing= '$costing') ");



if (mysqli_num_rows($query) > 0) {
    $_SESSION['status'] = "Product already exists!";
    $_SESSION['status_code'] = "error";
    header("location:products.php");
} else {

    if (empty($barcode)) {
        if (mysqli_num_rows($query) > 0) {
            $_SESSION['status'] = "Product already exists!";
            $_SESSION['status_code'] = "error";
            header("location:products.php");
        }   
        else{


        $add2 = "insert into products set ProductID = '$next_IDcode',ItemType = '$type', Barcode = '$next_IDcode',Product = '$product', Unit = '$unit', Costing = '$costing', Price = '$price', Wholesale = '$wholesale', Promo = '$promo', Categories = '$categories',SubCategory = '$subcategories', Seller = '$seller', Supplier = '$supplier', Warranty = '$warranty'";
        $res2 = $conn->query($add2);
        if ($res2) {
            $_SESSION['status'] = "Product Information Saved";
            $_SESSION['status_code'] = "success";
            header("location: products.php");
        }
    }
    }else{

    $add = "insert into products ProductID = '$next_IDcode',ItemType = '$type', Barcode = '$barcode', Product = '$product', Unit = '$unit', Costing = '$costing', Price = '$price', Wholesale = '$wholesale', Promo = '$promo', Categories = '$categories',SubCategory = '$subcategories', Seller = '$seller', Supplier = '$supplier', Warranty = '$warranty'";

    $res = $conn->query($add);

    if ($res) {
        $_SESSION['status'] = "Product Information Saved";
        $_SESSION['status_code'] = "success";
        header("location: products.php");
    }
    else{
        $_SESSION['status'] = "Couldn't add product!";
    $_SESSION['status_code'] = "error";
    header("location:products.php");
    }
}
}

?>