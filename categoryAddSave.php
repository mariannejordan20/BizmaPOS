<?php
session_start();
	include('connection.php');
    $maincategory = $_POST['main_category'];
	$maincategory = strtoupper($maincategory);

    
$query = mysqli_query($conn,"SELECT * FROM categories WHERE main_category = '$maincategory'");
$msg = "";
if (mysqli_num_rows($query)>0)
{
	$_SESSION['status'] = "Category already exists!";
    $_SESSION['status_code'] = "error";
	header("location: ".$_SERVER['HTTP_REFERER']);
}
else{
$add = "insert into categories set main_category = '".$maincategory."'";
$res = $conn->query($add);
	if ($res){

		$_SESSION['status'] = "Category Added";
        $_SESSION['status_code'] = "success";
        header("location:categories.php");	
		}
	}
?>








