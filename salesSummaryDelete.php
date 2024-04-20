<?php
session_start();
	include('connection.php');
	$id = $_GET['id'];

	$delete = "Delete from invoice where ID = ".$id;
	$res = $conn->query($delete);

	if ($res){
		$_SESSION['status'] = "Delete Succesful";
        $_SESSION['status_code'] = "success";
		header("location: ".$_SERVER['HTTP_REFERER']);
		exit;
	}
    else{
        $_SESSION['status'] = "Error Deleting";
        $_SESSION['status_code'] = "error";
		header("location: ".$_SERVER['HTTP_REFERER']);
		exit;
    }
?>