<?php
session_start();
include('connection.php');

// Query to fetch the max ID from the deliverycodes table
$query = "SELECT MAX(ID) AS max_id FROM deliverycodes";
$result = mysqli_query($conn, $query);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $maxId = $row['max_id'];
    // Increment the max ID by 1 to get the new encode number
    $newEncodeNumber = $maxId + 1;
    // Format the new encode number to 7 digits
    $formattedEncodeNumber = sprintf("%07d", $newEncodeNumber);
    echo $formattedEncodeNumber;
} else {
    // Handle error if the query fails
    echo "Error fetching max encode number";
}
?>
