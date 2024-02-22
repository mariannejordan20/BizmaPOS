<?php
session_start();
include('connection.php');

$username = $_POST['signupUsername'];
$password = $_POST['signupPassword'];
$confirmPassword = $_POST['signupConfirmPassword'];
$nameOfUser = $_POST['NameOfUser'];
$userType = $_POST['signupRole'];

$userType = strtoupper($userType);
$query = mysqli_query($conn,"SELECT * FROM users WHERE Username = '$username' ");

if (mysqli_num_rows($query)>0)

{

	$_SESSION['status'] = "User already exists!";
    $_SESSION['status_code'] = "error";
    header("Location: userAccounts.php");
}

else{
    
    $sql = "INSERT INTO users (Username, Pword, NameOfUser, TypeOfUser,Date_Registered) VALUES ('$username', '$password', '$nameOfUser', '$userType',CURRENT_TIMESTAMP)";
    $result = mysqli_query($conn, $sql);
    
    if ($result){
        $_SESSION['status'] = "User Registered!";
    $_SESSION['status_code'] = "success";

    header("Location: userAccounts.php ");
   
    }



}

    ?>