<?php
session_start();
include('connection.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // First, fetch the unit details from 'units' table
    $fetchUnitSql = "SELECT * FROM units WHERE ID = " . $id;
    $unitResult = $conn->query($fetchUnitSql);

    if ($unitResult->num_rows > 0) {
        $unitData = $unitResult->fetch_assoc();

        // Delete from 'units' table
        $deleteUnitsSql = "DELETE FROM units WHERE ID = " . $id;
        $resultUnits = $conn->query($deleteUnitsSql);

        if ($resultUnits) {
            // If successful, delete from 'recentunit' table
            $deleteRecentUnitSql = "DELETE FROM recentunit WHERE unit_name = '" . $unitData['unit_name'] . "'";
            $resultRecentUnit = $conn->query($deleteRecentUnitSql);

            if ($resultRecentUnit) {
                $_SESSION['status'] = "Delete Successful";
                $_SESSION['status_code'] = "success";
                header("location: " . $_SERVER['HTTP_REFERER']);
                exit;
            } else {
                $_SESSION['status'] = "Delete from recentunit Failed";
                $_SESSION['status_code'] = "error";
                header("location: " . $_SERVER['HTTP_REFERER']);
                exit;
            }
        } else {
            $_SESSION['status'] = "Delete from units Failed";
            $_SESSION['status_code'] = "error";
            header("location: " . $_SERVER['HTTP_REFERER']);
            exit;
        }
    } else {
        $_SESSION['status'] = "Unit not found";
        $_SESSION['status_code'] = "error";
        header("location: " . $_SERVER['HTTP_REFERER']);
        exit;
    }
} else {
    $_SESSION['status'] = "Invalid Request";
    $_SESSION['status_code'] = "error";
    header("location: " . $_SERVER['HTTP_REFERER']);
    exit;
}
?>
