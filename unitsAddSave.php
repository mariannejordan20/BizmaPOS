<?php
session_start();
include('connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate form data and perform any other necessary checks

    // Convert the unit_name to uppercase
    $unit_name = strtoupper($_POST['unit_name']);

    // Check if the unit already exists
    $sqlCheckExist = "SELECT * FROM units WHERE unit_name = '$unit_name'";
    $resultExist = $conn->query($sqlCheckExist);

    if ($resultExist->num_rows > 0) {
        // Unit already exists, handle accordingly (e.g., show an error message)
        $_SESSION['status'] = 'Unit already exists';
        $_SESSION['status_code'] = 'error';
        header("Location: units.php");
        exit();
    } else {
        // Unit does not exist, proceed with insertion

        // Insert the uppercase unit_name into the database
        $sqlInsert = "INSERT INTO units (unit_name) VALUES ('$unit_name')";
        if ($conn->query($sqlInsert) === TRUE) {
            $_SESSION['status'] = 'Unit added successfully';
            $_SESSION['status_code'] = 'success';
        } else {
            $_SESSION['status'] = 'Error: ' . $conn->error;
            $_SESSION['status_code'] = 'error';
        }

        // Insert the recent unit into the recentunit table
        $sqlInsertRecent = "INSERT INTO recentunit (unit_name) VALUES ('$unit_name')";
        $conn->query($sqlInsertRecent);

        // Redirect back to the main page or wherever you want after processing the form
        header("Location: units.php");
        exit();
    }
} else {
    // Handle cases where the form wasn't submitted properly
    $_SESSION['status'] = 'Form submission error';
    $_SESSION['status_code'] = 'error';
    header("Location: units.php");
    exit();
}
?>
