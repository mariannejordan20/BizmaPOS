<?php
session_start();
	include('connection.php');

   
    $warranty = $_POST['Warranty'];
    
        

$query = mysqli_query($conn,"SELECT * FROM warranty WHERE Warranty = '$warranty'");

$msg = "";
 


if (mysqli_num_rows($query)>0)

{

	$_SESSION['status'] = "Duration already exists!";
    $_SESSION['status_code'] = "error";
	header("location:warranty.php");
}

else{
    

    

$add = "insert into warranty set Warranty = '".$warranty."'";

$res = $conn->query($add);



	if ($res){

		$_SESSION['status'] = "Warranty Duration Saved";
        $_SESSION['status_code'] = "success";
        header("location: warranty.php");

		
	
}
}




?>








