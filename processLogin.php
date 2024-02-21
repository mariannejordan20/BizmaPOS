<?php
session_start();
include('connection.php');

$user = $_POST['username'];
$pass = $_POST['password'];
$type = $_POST['role'];


// Get the full IP address of the device
 $ipaddress = getenv("REMOTE_ADDR") ;

$sql = "SELECT ID, Username, Pword, NameOfUser, UserType FROM users WHERE Username = '".$user."' AND Pword = '".$pass."' AND UserType = '".$type."' ";

$res = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($res);

$nameofuser = $row['NameOfUser'];

if ($row) {
    $_SESSION['hasLog'] = 1;
    $_SESSION['Type'] = $row['UserType']; 
    $_SESSION['Name'] = $row['NameOfUser'];

    $loginhistory = "INSERT INTO userlogs (NameOfUser, TypeOfUser, IP_add, Date_Login)
    VALUES ('$nameofuser', '$type', '$ipaddress', CURRENT_TIMESTAMP)";
    $res2 = mysqli_query($conn, $loginhistory);
    echo "1";
    exit();
} else {
    $_SESSION['hasLog'] = 0;
    echo "0";
}
?>
