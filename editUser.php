<?php
session_start();

include('connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Fetch form data
    $userID = $_POST['userID'];
    $username = $_POST['editUsername'];
    $nameOfUser = $_POST['editNameOfUser'];
    $typeOfUser = $_POST['editRole'];
    $password = $_POST['editPassword']; // Assuming the field name is 'editPassword'

    // Perform validation (you can add more validation as needed)
    if (empty($username) || empty($nameOfUser) || empty($typeOfUser)) {
        $_SESSION['status'] = 'Please fill in all fields.';
        $_SESSION['status_code'] = 'error';
        header('Location: userAccounts.php');
        exit;
    }

    // Update user password only if a new password is provided
    if (!empty($password)) {
        // Make sure to hash the password before storing it
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        // Include the password update in the SQL query
        $sql = "UPDATE posusers SET Username = '$username', NameOfUser = '$nameOfUser', TypeOfUser = '$typeOfUser', Pword = '$hashedPassword' WHERE ID = $userID";
    } else {
        // If no new password is provided, update user information excluding the password
        $sql = "UPDATE posusers SET Username = '$username', NameOfUser = '$nameOfUser', TypeOfUser = '$typeOfUser' WHERE ID = $userID";
    }

    // Execute the SQL query
    if ($conn->query($sql) === TRUE) {
        $_SESSION['status'] = 'User information updated successfully.';
        $_SESSION['status_code'] = 'success';
    } else {
        $_SESSION['status'] = 'Error updating user information: ' . $conn->error;
        $_SESSION['status_code'] = 'error';
    }

    $conn->close();

    // Redirect back to the user account page
    header('Location: userAccounts.php');
    exit;
} else {
    // If accessed via GET request, redirect to user account page
    header('Location: userAccounts.php');
    exit;
}
?>
