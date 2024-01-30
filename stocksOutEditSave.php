<?php
session_start();

include('connection.php');

$id = $_POST['hiddenID'];
$barcode = $_POST['Barcode'];
$product = $_POST['Product'];
$unit = $_POST['Unit'];
$additionalQuantity = $_POST['Quantity'];
$costing = $_POST['Costing'];
$price = $_POST['Price'];
$wholesale = $_POST['Wholesale'];
$promo = $_POST['Promo'];
$categories = $_POST['Categories'];
$seller = $_POST['Seller'];
$supplier = $_POST['Supplier'];

// Fetch current quantity from the database
$sql = "SELECT Quantity FROM products WHERE ID = " . $id;
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $currentQuantity = $row['Quantity'];

    // Ensure the user input is less than or equal to the current quantity
    if ($additionalQuantity <= $currentQuantity) {
        // Calculate the new quantity (cannot be less than 0)
        $newQuantity = max(0, $currentQuantity - $additionalQuantity);

        // Update the other fields in the database
        $update = "UPDATE products SET Barcode = '" . $barcode . "', Product = '" . $product . "', Unit = '" . $unit . "', Quantity = '" . $newQuantity . "', Costing = '" . $costing . "', Price = '" . $price . "', Wholesale = '" . $wholesale . "', Promo = '" . $promo . "', Categories = '" . $categories . "', Seller = '" . $seller . "', Supplier = '" . $supplier . "' ";
        $update .= "WHERE id = " . $id;
        $stockOutHistory = "insert into stockouthistory set Barcode = '" . $barcode . "', Product = '" . $product . "', Unit = '" . $unit . "',Quantity = '" . $additionalQuantity . "', Costing = '" . $costing . "', Price = '" . $price . "', Wholesale = '" . $wholesale . "', Promo = '" . $promo . "', Categories = '" . $categories . "', Seller = '" . $seller . "' ,Supplier = '" . $supplier . "' ";

        if ($barcode !== "" || $product !== "" || $unit !== "" || $additionalQuantity !== "" || $costing !== "" || $price !== "" || $wholesale !== "" || $promo !== "" || $categories !== "" || $seller !== "" || $supplier !== "") {
            $res = $conn->query($update);
            $res2 = $conn->query($stockOutHistory);

            if ($res && mysqli_affected_rows($conn) > 0) {
                $_SESSION['status'] = "Edit Successful";
                $_SESSION['status_code'] = "success";
                header("location:stocksOutHistory.php");
            } else {
                $_SESSION['status'] = "No changes made";
                $_SESSION['status_code'] = "success";
                header("location:stocksOutHistory.php");
            }
        } else {
            $_SESSION['status'] = "No changes made";
            $_SESSION['status_code'] = "success";
            header("location:stocksOut.php");
        }
    } else {
        $_SESSION['status'] = "Error: Quantity exceeds current stock";
        $_SESSION['status_code'] = "error";
        header("location:stocksOutHistory.php");
    }
} else {
    $_SESSION['status'] = "No product found";
    $_SESSION['status_code'] = "error";
    header("location: ".$_SERVER['HTTP_REFERER']);
}
?>
