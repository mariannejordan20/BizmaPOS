<?php
session_start();

// Include connection.php to establish a database connection
include('connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Fetch form data
    $ipID = $_POST['IP_ID'];
    $newIPAddress = $_POST['editIP'];
    $newLocation = $_POST['editLocation'];

    // Perform validation (you can add more validation as needed)
    if (empty($newIPAddress)) {
        $_SESSION['status'] = 'Please provide an IP address.';
        $_SESSION['status_code'] = 'error';
        header('Location: your_page.php');
        exit;
    }

    // Check if the new IP address already exists
    $checkSql = "SELECT * FROM allowed_ips WHERE ip_address = '$newIPAddress' AND ID != $ipID";
    $result = $conn->query($checkSql);
    if ($result->num_rows > 0) {
        // If the IP address already exists, display an error
        $_SESSION['status'] = 'An IP address with the same value already exists.';
        $_SESSION['status_code'] = 'error';
        header('Location: ipAddressList.php');
        exit;
    }

    // Update IP address in the database
    $sql = "UPDATE allowed_ips SET ip_address = '$newIPAddress' , branch = '$newLocation' WHERE ID = $ipID";

    // Execute the SQL query
    if ($conn->query($sql) === TRUE) {
        $_SESSION['status'] = 'IP address updated successfully.';
        $_SESSION['status_code'] = 'success';
    } else {
        $_SESSION['status'] = 'Error updating IP address: ' . $conn->error;
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
