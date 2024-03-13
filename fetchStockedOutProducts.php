<?php


include('connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if encnumber is provided
    if (isset($_POST['encnumber'])) {
        $encnumber = $_POST['encnumber'];
        // Fetch products based on the provided encnumber
        $sql = "SELECT Barcode, Product, ItemType, Unit,StockOutType,ItemSerial, Quantity, Costing, Charges, OrderedBy, ApprovedBy,Consignee,TotalValRow, StockOutDate FROM stockouthistory WHERE ENCNum = '$encnumber'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Display products
            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $row['StockOutType'] . '</td>';
                echo '<td>' . $row['Barcode'] . '</td>';
                echo '<td>' . $row['Product'] . '</td>';
                echo '<td>' . $row['ItemSerial'] . '</td>';
                echo '<td>' . $row['ItemType'] . '</td>';
                echo '<td>' . $row['Unit'] . '</td>';
                echo '<td>' . $row['Quantity'] . '</td>';
                echo '<td>' . $row['Costing'] . '</td>';
                echo '<td>' . $row['Charges'] . '</td>';
                echo '<td>' . $row['TotalValRow'] . '</td>';
                echo '<td>' . $row['OrderedBy'] . '</td>';
                echo '<td>' . $row['ApprovedBy'] . '</td>';
                echo '<td>' . $row['Consignee'] . '</td>';
                echo '<td>' . $row['StockOutDate'] . '</td>';
                echo '</tr>';
            }
        } else {
            echo '<tr><td colspan="13">No products found for this encnumber.</td></tr>';
        }
    } else {
        echo '<tr><td colspan="13">Encnumber not provided.</td></tr>';
    }
} else {
    echo '<tr><td colspan="13">Invalid request method.</td></tr>';
}
?>
