<?php
    session_start();
    include('connection.php');

    $user = $_POST['username'];
    $pass = $_POST['password'];
	$type = $_POST['role'];

    $sql = "SELECT * FROM users WHERE Username = '".$user."' AND Password = '".$pass."' AND Type = '".$type."' ";
	
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($res);

    if ($row) {
        $_SESSION['hasLog'] = 1;
        $_SESSION['Type'] = $row['Type']; 
        $_SESSION['Name'] = $row['Name'];
        echo "1";
        exit();
    } else {
        $_SESSION['hasLog'] = 0;
        echo "0";
    }
?>
