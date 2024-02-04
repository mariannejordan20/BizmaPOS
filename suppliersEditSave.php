<?php
session_start();

include('connection.php');
$id = $_POST['hiddenID'];
$name = $_POST['Supplier_Name'];
$contact = $_POST['Contact'];
$address = $_POST['Loc'];





$query = mysqli_query($conn, "SELECT * FROM suppliers WHERE Supplier_Name = '$name' AND Contact = '$contact' AND Loc = '$address'");


if (!empty($name)) {
    $query2 = mysqli_query($conn, "SELECT * FROM suppliers WHERE Supplier_Name = '$name'");
if (mysqli_num_rows($query2) >1 ) {
    $_SESSION['status'] = "Supplier already Exists";
    $_SESSION['status_code'] = "error";
    header("location:suppliers.php");
    
} else {
    $update = "Update suppliers set Supplier_Name = '".$name."', Contact = '".$contact."', Loc = '".$address."'";

    $update .= "where id = ".$id;
    
    
    

    if ($name !== "" || $contact !== "" || $address !== "" ) {
        $res = $conn->query($update);

        if ($res && mysqli_affected_rows($conn) > 0) {
            $_SESSION['status'] = "Edit Successful";
            $_SESSION['status_code'] = "success";
            header("location:suppliers.php");
        } else {
            $_SESSION['status'] = "No changes made";
            $_SESSION['status_code'] = "success";
            header("location:suppliers.php");
            
        }
    } else {
        $_SESSION['status'] = "No changes made";
        $_SESSION['status_code'] = "success";
        header("location:suppliers.php");
       
    }
	}
}
?>
