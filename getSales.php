<?php
    include('connection.php');

// Get the encnum input value
$invoicenum = $_POST['invoicenum'];

// Prepare SQL statement to fetch data from stocksintry table where encnum matches the input
$sql = "SELECT * FROM saleshistory WHERE InvoiceNumber = '$invoicenum'";
$result = $conn->query($sql);

// Generate table rows based on fetched data
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        // Echo delete button with ID
        echo "<td><button onclick='deleteRow(" . $row["ID"] . ")'><i class='fas fa-trash'></i></button></td>";
        echo "<td>".$row["Barcode"]."</td>";
        echo "<td>".$row["Product"]."</td>";
        echo "<td>".$row["Unit"]."</td>";
        echo "<td>".$row["Quantity"]."</td>";
        echo "<td>".$row["Price"]."</td>";
        echo "<td>".$row["Warranty"]."</td>";
        echo "<td>".$row["ItemSerial"]."</td>";
        echo "<td>".$row["TotalValRow"]."</td>";
        echo "</tr>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>
