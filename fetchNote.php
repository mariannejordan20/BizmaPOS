<?php

include('connection.php');




$sql = "SELECT Announcement FROM announcement"; 

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $noteContent = $row['Announcement'];

    // Return the note content
    echo $noteContent;
} else {
    // If no data found
    echo "No note found";
}

// Close the database connection
$conn->close();
?>
