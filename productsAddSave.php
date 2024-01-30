<?php
session_start();
	include('connection.php');

   
    $barcode = $_POST['Barcode'];
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
        

$query = mysqli_query($conn,"SELECT * FROM products WHERE Barcode = '$barcode'");

$msg = "";
 


if (mysqli_num_rows($query)>0)

{

	$_SESSION['status'] = "Product already exists!";
    $_SESSION['status_code'] = "error";
	header("location:products.php");
}

else{
    

    

$add = "insert into products set Barcode = '".$barcode."', Product = '".$product."', Unit = '".$unit."', Costing = '".$costing."', Price = '".$price."', Wholesale = '".$wholesale."', Promo = '".$promo."', Categories = '".$categories."', Seller = '".$seller."' 
,Supplier = '".$supplier."', Warranty = '".$warranty."'";

$res = $conn->query($add);



	if ($res){

		$_SESSION['status'] = "Product Information Saved";
        $_SESSION['status_code'] = "success";
        header("location: products.php");
    

		
	
}
}




?>








