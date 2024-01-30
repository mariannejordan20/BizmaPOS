<?php
session_start();
	include('connection.php');

   
    $unitname = $_POST['unit_name'];
    
        

$query = mysqli_query($conn,"SELECT * FROM units WHERE unit_name = '$unitname'");

$msg = "";
 


if (mysqli_num_rows($query)>0)

{

	$_SESSION['status'] = "Unit already exists!";
    $_SESSION['status_code'] = "error";
	header("location: ".$_SERVER['HTTP_REFERER']);
}

else{
    

    

$add = "insert into units set unit_name = '".$unitname."'";

$res = $conn->query($add);



	if ($res){

		$_SESSION['status'] = "Unit Information Saved";
        $_SESSION['status_code'] = "success";
        header("location: units.php");

		
	
}
}




?>








