<?php
session_start();

include('connection.php');
$id = $_POST['hiddenID'];
$categories = $_POST['Categories'];


$query = mysqli_query($conn, "SELECT * FROM categories WHERE main_category = '$categories'");


if (!empty($categories)) {
    $query2 = mysqli_query($conn, "SELECT * FROM categories WHERE  main_category = '$categories'");

if (mysqli_num_rows($query2) >1 ) {
    $_SESSION['status'] = "Category already Exists";
    $_SESSION['status_code'] = "error";
    header("location:suppliers.php");
    
} else {
    $update = "Update categories set main_category = '".$categories."'";

    $update .= "where id = ".$id;
    
    
    

    if ($categories !== "" ) {
        $res = $conn->query($update);

        if ($res && mysqli_affected_rows($conn) > 0) {
            $_SESSION['status'] = "Edit Successful";
            $_SESSION['status_code'] = "success";
            header("location:categories.php");
        } else {
            $_SESSION['status'] = "No changes made";
            $_SESSION['status_code'] = "success";
            header("location:categories.php");
            
        }
    } else {
        $_SESSION['status'] = "No changes made";
        $_SESSION['status_code'] = "success";
        header("location:categories.php");
       
    }
	}
}
?>
