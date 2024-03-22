<?php
session_start();
include('connection.php');


$query = "SELECT MAX(ID) AS max_id FROM invoice";
$result = mysqli_query($conn, $query);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $maxId = $row['max_id'];
    
    $newInvoiceNumber = $maxId + 1;
    // Format the new encode number to 7 digits
    $formattedInvoiceNumber = sprintf("%07d",   $newInvoiceNumber );
    echo $formattedInvoiceNumber ;
} else {
    // Handle error if the query fails
    echo "Error fetching max invoice number";
}
?>
