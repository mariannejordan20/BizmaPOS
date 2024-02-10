<?php
	
	$dbname = "posdb";
	$dbuser = "root";
	$dbpass = "";
	$dbhost = "127.0.0.1";

	$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

	if(!$conn){
		echo $conn -> error;
		exit;
	}


	

?>