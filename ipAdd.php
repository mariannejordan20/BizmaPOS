<?php
session_start();

// Include connection.php to establish a database connection
include('connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Fetch form data
    $newIPAddress = $_POST['ipAdd'];
    $location = $_POST['ipLocation'];

    // Perform validation (you can add more validation as needed)
    if (empty($newIPAddress) || empty($location)) {
        $_SESSION['status'] = 'Please provide both IP address and location.';
        $_SESSION['status_code'] = 'error';
        header('Location: your_page.php');
        exit;
    }

    // Check if the new IP address already exists
    $checkSql = "SELECT * FROM allowed_ips WHERE ip_address = '$newIPAddress'";
    $result = $conn->query($checkSql);
    if ($result->num_rows > 0) {
        // If the IP address already exists, display an error
        $_SESSION['status'] = 'An IP address with the same value already exists.';
        $_SESSION['status_code'] = 'error';
        header('Location: ipAddressList.php');
        exit;
    }

    // Insert the new IP address into the database
    $insertSql = "INSERT INTO allowed_ips (ip_address, branch) VALUES ('$newIPAddress', '$location')";

    // Execute the SQL query
    if ($conn->query($insertSql) === TRUE) {
        $_SESSION['status'] = 'IP address added successfully.';
        $_SESSION['status_code'] = 'success';
    } else {
        $_SESSION['status'] = 'Error adding IP address: ' . $conn->error;
        $_SESSION['status_code'] = 'error';
    }

    // Close the database connection
    $conn->close();

    // Redirect back to the page where the form was submitted from
    header('Location: ipAddressList.php');
    exit;
} else {
    // If accessed via GET request, redirect to the appropriate page
    header('Location: ipAddressList.php');
    exit;
}
?>
