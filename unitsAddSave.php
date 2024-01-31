<?php
session_start();
include('connection.php');

if (isset($_POST['unit_name'])) {
    $unitname = $_POST['unit_name'];

    $query = $conn->prepare("SELECT * FROM units WHERE unit_name = ?");
    $query->bind_param("s", $unitname);
    $query->execute();
    $query_result = $query->get_result();

    if ($query_result->num_rows > 0) {
        $_SESSION['status'] = "Unit already exists!";
        $_SESSION['status_code'] = "error";
        header("location: ".$_SERVER['HTTP_REFERER']);
        exit;
    }

    $insert_query = $conn->prepare("INSERT INTO units (unit_name) VALUES (?)");
    $insert_query->bind_param("s", $unitname);
    $insert_result = $insert_query->execute();

    if ($insert_result) {
        // Insert unit into the recentunit table
        $sqlRecent = "INSERT INTO recentunit (unit_name, created_at) VALUES (?, NOW())";
        $stmt = $conn->prepare($sqlRecent);
        $stmt->bind_param("s", $unitname);
        $stmt->execute();

        $_SESSION['status'] = "Unit Information Saved";
        $_SESSION['status_code'] = "success";
        header("location: units.php");
        exit;
    }
} else {
    // Handle the case where 'unit_name' is not set.
    $_SESSION['status'] = "Invalid data!";
    $_SESSION['status_code'] = "error";
    header("location: ".$_SERVER['HTTP_REFERER']);
    exit;
}
?>
