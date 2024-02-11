<?php
session_start();
include('connection.php');

if(isset($_GET['id'])) {
    $subcatId = $_GET['id'];

    // Use prepared statement to avoid SQL injection
    $delete = $conn->prepare("DELETE FROM subcategories WHERE ID = ?");
    $delete->bind_param("i", $subcatId);
    $delete->execute();

    if ($delete) {
        $_SESSION['status'] = "Delete Successful";
        $_SESSION['status_code'] = "success";
    } else {
        $_SESSION['status'] = "Delete Failed";
        $_SESSION['status_code'] = "error";
    }
    $delete->close();
} else {
    // If ID parameter is not set, handle the error here
    $_SESSION['status'] = "Subcategory ID not specified";
    $_SESSION['status_code'] = "error";
}

header("location: categories.php");
exit;
?>
