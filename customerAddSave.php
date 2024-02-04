<?php
session_start();
	include('connection.php');

    $Seqcode = $_POST['Seqcode'];
    $number_id = $_POST['IDNumber'];
    $Barcode = $_POST['Barcode'];
    $CustomerName = $_POST['CustomerName'];
    
    $TermofPayment = $_POST['TermofPayment'];
    $VATTIN = $_POST['VATTIN'];
    $ContactPerson = $_POST['ContactPerson'];
    $Address = $_POST['Loc'];
    $Contact = $_POST['Contact'];
    
        

$query = mysqli_query($conn,"SELECT * FROM customer WHERE Seqcode = '$Seqcode'");

$msg = "";
 


if (mysqli_num_rows($query)>0)

{

	$_SESSION['status'] = "Customer already exists!";
    $_SESSION['status_code'] = "error";
	header("location:customers.php");
}

else{
    

    

    $add = "INSERT INTO customer SET Seqcode = '".$Seqcode."', IDNumber = '".$number_id."', Barcode = '".$Barcode."', CustomerName = '".$CustomerName."', TermofPayment = '".$TermofPayment."', VATTIN = '".$VATTIN."', ContactPerson = '".$ContactPerson."', Loc = '".$Address."', Contact = '".$Contact."'";


$res = $conn->query($add);



	if ($res){

		$_SESSION['status'] = "Customer Information Saved";
        $_SESSION['status_code'] = "success";
        header("location:customers.php");
   

		
	
}
}




?>








