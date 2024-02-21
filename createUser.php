<?php
session_start();
include('connection.php');

$username = $_POST['signupUsername'];
$password = $_POST['signupPassword'];
$confirmPassword = $_POST['signupConfirmPassword'];
$nameOfUser = $_POST['NameOfUser'];
$userType = $_POST['signupRole'];


$query = mysqli_query($conn,"SELECT * FROM users WHERE Username = '$username' ");

if (mysqli_num_rows($query)>0)

{

	$_SESSION['status'] = "User already exists!";
    $_SESSION['status_code'] = "error";
	$referer = $_SERVER['HTTP_REFERER'];
    header("Location: $referer");
}

else{
    // Insert user data into the database
    $sql = "INSERT INTO users (Username, Pword, NameOfUser, UserType) VALUES ('$username', '$password', '$nameOfUser', '$userType')";
    $result = mysqli_query($conn, $sql);
    
    if ($result){
        
   
    }



}

    ?>