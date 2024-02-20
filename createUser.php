<?php
session_start();
include('connection.php');

// Retrieve form data
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
	header("location:index.php");
}

else{


if (empty($username) || empty($password) || empty($confirmPassword) || empty($nameOfUser) || empty($userType)) {
    $_SESSION['status'] = "All fields required!";
    $_SESSION['status_code'] = "error";
	header("location:index.php");
} elseif ($password !== $confirmPassword) {
    $_SESSION['status'] = "Not same password!";
    $_SESSION['status_code'] = "error";
	header("location:index.php");
} else {
    // Insert user data into the database
    $sql = "INSERT INTO users (Username, Pword, NameOfUser, UserType) VALUES ('$username', '$password', '$nameOfUser', '$userType')";
    $result = mysqli_query($conn, $sql);
    
    if ($result){
        $_SESSION['status'] = "User sucessfully created!";
    $_SESSION['status_code'] = "success";
	header("location:index.php");
    }

}

}

    ?>