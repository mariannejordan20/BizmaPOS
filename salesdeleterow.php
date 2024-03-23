<?php
// Include your database connection file
include('connection.php');

// Check if ID parameter is set and not empty
if(isset($_POST['id']) && !empty($_POST['id'])) {
    // Sanitize the ID to prevent SQL injection
    $id = $_POST['id'];

    // Prepare a delete statement
    $sql = "DELETE FROM saleshistory WHERE ID = ?";

    // Prepare the SQL statement
    $stmt = $conn->prepare($sql);

    if($stmt) {
        // Bind the parameters and execute the statement
        $stmt->bind_param("i", $id);
        $stmt->execute();

        // Check if any rows were affected
        if($stmt->affected_rows > 0) {
            // Return a success message
            echo "Row deleted successfully.";
        } else {
            // Return an error message if no rows were affected
            echo "No rows were deleted.";
        }

        // Close the statement
        $stmt->close();
    } else {
        // Return an error message if the statement could not be prepared
        echo "Error preparing statement: " . $conn->error;
    }
} else {
    // Return an error message if ID parameter is missing or empty
    echo "ID parameter is missing or empty.";
}

// Close the database connection
$conn->close();
?>
