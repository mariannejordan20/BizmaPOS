<?php
// Include your database connection
include('connection.php');

// Assuming you have a session started and the user is authenticated

// Check if the note content is received via POST request
if(isset($_POST['noteContent'])) {
    // Sanitize the input
    $noteContent = mysqli_real_escape_string($conn, $_POST['noteContent']);

    // SQL query to update the note content in the announcement table
    $sql = "UPDATE announcement SET Announcement = '$noteContent' WHERE id = 1"; // Assuming you want to update the note content where ID is 1

    if ($conn->query($sql) === TRUE) {
        // If update successful
        echo "Note updated successfully";
    } else {
        // If there is an error
        echo "Error updating note: " . $conn->error;
    }
} else {
    // If note content is not received
    echo "Note content not provided";
}

// Close the database connection
$conn->close();
?>
