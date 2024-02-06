<?php
session_start();

include('connection.php');
$id = $_POST['hiddenID'];
$unit = $_POST['unit_name'];
$oldunit = $_POST['unit_name2'];

$query = mysqli_query($conn, "SELECT * FROM units WHERE unit_name = '$unit'");


if (!empty($unit)) {
    $query2 = mysqli_query($conn, "SELECT * FROM units WHERE  unit_name = '$unit'");

if (mysqli_num_rows($query2) >1 ) {
    $_SESSION['status'] = "unit already Exists";
    $_SESSION['status_code'] = "error";
    header("location:units.php");
    
} else {
    $update = "Update units set unit_name = '".$unit."'";

    $update .= "where id = ".$id;

    $updateRows = "UPDATE products SET Unit = '$unit' WHERE Unit = '$oldunit'";
    
    
    

    if ($unit !== "" ) {
        $res = $conn->query($update);
        $res = $conn->query($updateRows);
        if ($res && mysqli_affected_rows($conn) > 0) {
            $_SESSION['status'] = "Edit Successful";
            $_SESSION['status_code'] = "success";
            header("location:units.php");
        } else {
            $_SESSION['status'] = "No changes made";
            $_SESSION['status_code'] = "success";
            header("location:units.php");
            
        }
    } else {
        $_SESSION['status'] = "No changes made";
        $_SESSION['status_code'] = "success";
        header("location:units.php");
       
    }
	}
}
?>
