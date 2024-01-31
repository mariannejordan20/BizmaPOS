<?php
include('connection.php');

// Fetch recent units
$sql = "SELECT ID, unit_name, created_at FROM recentunit ORDER BY created_at DESC LIMIT 5";
$result = $conn->query($sql);

$recentUnits = [];

while ($row = $result->fetch_assoc()) {
    $recentUnits[] = $row;
}

// Close the database connections
$conn->close();

// Return the data in JSON format
header('Content-Type: application/json');
echo json_encode($recentUnits);
?>
