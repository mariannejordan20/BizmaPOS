<?php


include('connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if encnumber is provided
    if (isset($_POST['InvoiceNumber'])) {
        $InvoiceNumber = $_POST['InvoiceNumber'];
        // Fetch products based on the provided encnumber
        $sql = "SELECT InvoiceNumber, Barcode, Product, ItemType, Unit, Quantity, Costing, Price, Customer, TotalValRow, Warranty, ItemSerial, SalesDate FROM saleshistory WHERE InvoiceNumber = '$InvoiceNumber'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Display products
            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $row['InvoiceNumber'] . '</td>';
                echo '<td>' . $row['Barcode'] . '</td>';
                echo '<td>' . $row['Product'] . '</td>';
                echo '<td>' . $row['ItemType'] . '</td>';
                echo '<td>' . $row['Unit'] . '</td>';
                echo '<td>' . $row['Quantity'] . '</td>';
                echo '<td>' . $row['Costing'] . '</td>';
                echo '<td>' . $row['Price'] . '</td>';
                echo '<td>' . $row['Customer'] . '</td>';
                echo '<td>' . $row['TotalValRow'] . '</td>';
                echo '<td>' . $row['Warranty'] . '</td>';
                echo '<td>' . $row['ItemSerial'] . '</td>';
                echo '<td>' . $row['SalesDate'] . '</td>';
                echo '</tr>';
            }
        } else {
            echo '<tr><td colspan="13">No products found for this Invoice Number.</td></tr>';
        }
    } else {
        echo '<tr><td colspan="13">Invocie Number not provided.</td></tr>';
    }
} else {
    echo '<tr><td colspan="13">Invalid request method.</td></tr>';
}
?>
