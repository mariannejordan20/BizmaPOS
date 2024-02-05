<?php
session_start();
	include('connection.php');

    $name= $_POST['Supplier_Name'];
    $contact = $_POST['Contact'];
    $address = $_POST['Loc'];
   
    
        

$query = mysqli_query($conn,"SELECT * FROM suppliers WHERE Supplier_Name = '$name'");

$msg = "";
 


if (mysqli_num_rows($query)>0)

{

	$_SESSION['status'] = "Supplier already exists!";
    $_SESSION['status_code'] = "error";
	header("location:suppliers.php");
}

else{
    

    

$add = "INSERT INTO suppliers SET Supplier_Name = '".$name."', Contact = '".$contact."', Loc = '".$address."'";


$res = $conn->query($add);



	if ($res){

		$_SESSION['status'] = "Supplier Information Saved";
        $_SESSION['status_code'] = "success";
        header("location:suppliers.php");
   

		
	
}
}




?>








