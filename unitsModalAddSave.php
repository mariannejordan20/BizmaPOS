<?php
session_start(); // Start the session
include ('connection.php');

// Extract POST data
extract($_POST);

// Check if unitSend is set
if(isset($unitSend)){
    // Check if the unit already exists
    $sqlCheckExist = "SELECT * FROM units WHERE unit_name = '$unitSend'";
    $resultExist = $conn->query($sqlCheckExist);

    if ($resultExist->num_rows > 0) {
        // Unit already exists, handle accordingly (e.g., show an error message)
        $_SESSION['status'] = 'Unit already exists';
        $_SESSION['status_code'] = 'error';
        header("Location: units.php");
        exit();
    } else {
        // Unit does not exist, proceed with insertion
        $sql = "INSERT INTO units (unit_name) VALUES ('$unitSend')";
        if(mysqli_query($conn, $sql)) {
            $_SESSION['status'] = 'Unit added successfully';
            $_SESSION['status_code'] = 'success';
            header("Location: units.php");
            exit();
        } else {
            $_SESSION['status'] = 'Error adding unit';
            $_SESSION['status_code'] = 'error';
            header("Location: units.php");
            exit();
        }
    }
} else {
    // Send error response if unitSend is not set
    $_SESSION['status'] = 'Error: unitSend is not set';
    $_SESSION['status_code'] = 'error';
    header("Location: units.php");
    exit();
}
?>

