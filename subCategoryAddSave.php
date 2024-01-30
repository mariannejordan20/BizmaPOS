<?php
session_start();
	include('connection.php');

   
    $maincategory = $_POST['main_category'];
    $subcategory = $_POST['sub_category'];
    
        

$query = mysqli_query($conn,"SELECT * FROM subcategories WHERE sub_category = '$subcategory'");


 


if (mysqli_num_rows($query)>0)

{

	$_SESSION['status'] = "Sub-Category already exists!";
    $_SESSION['status_code'] = "error";
	header("location:categories.php");
}

else{
    

    

$add = "insert into subcategories set main_category = '".$maincategory."', sub_category = '".$subcategory."'";

$res = $conn->query($add);



	if ($res){

		$_SESSION['status'] = "Category Added";
        $_SESSION['status_code'] = "success";
        header("location:categories.php");

		
	
}
}




?>








