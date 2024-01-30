<?php
session_start();
	include('connection.php');

   
    $warranty = $_POST['warranty'];
    
        

$query = mysqli_query($conn,"SELECT * FROM warranty WHERE warranty = '$warranty'");

$msg = "";
 


if (mysqli_num_rows($query)>0)

{

	$_SESSION['status'] = "Duration already exists!";
    $_SESSION['status_code'] = "error";
	header("location: ".$_SERVER['HTTP_REFERER']);
}

else{
    

    

$add = "insert into warranty set warranty = '".$warranty."'";

$res = $conn->query($add);



	if ($res){

		$_SESSION['status'] = "Warranty Duration Saved";
        $_SESSION['status_code'] = "success";
        header("location: units.php");

		
	
}
}




?>








