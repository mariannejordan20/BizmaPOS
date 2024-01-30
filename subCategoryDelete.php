<?php
session_start();
include('connection.php');

// Use $_GET to retrieve the sub_category parameter
$subcat = $_GET['sub_category'];

// Use prepared statement to avoid SQL injection
$delete = $conn->prepare("DELETE FROM subcategories WHERE sub_category = ?");
$delete->bind_param("s", $subcat);
$delete->execute();
$delete->close();

if ($delete) {
    $_SESSION['status'] = "Delete Successful";
    $_SESSION['status_code'] = "success";
    header("location:categories.php");
    exit;
}
?>
