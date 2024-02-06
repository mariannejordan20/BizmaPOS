<?php
session_start();

include('connection.php');
$id = $_POST['hiddenID'];
$categories = $_POST['Categories'];
$oldcategory = $_POST['Categories2'];

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

    $updateProductCategory = "UPDATE products SET Categories = '$categories' WHERE Categories = '$oldcategory'";
    $updateSubCategory = "UPDATE subcategories SET main_category = '$categories' WHERE main_category = '$oldcategory'";
    
    

    if ($categories !== "" ) {
        $res = $conn->query($update);
        $res2 = $conn->query($updateProductCategory);
        $res3 = $conn->query($updateSubCategory);
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
