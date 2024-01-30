<?php
session_start();
	include('connection.php');
	$id = $_GET['id'];

	$delete = "Delete from products where ID = ".$id;
	$res = $conn->query($delete);

	if ($res){
		$_SESSION['status'] = "Delete Succesful";
        $_SESSION['status_code'] = "success";
		header("location:products.php");
		exit;
	}
?>