<?php
// fetchProducts.php

include('connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if encnumber is provided
    if (isset($_POST['encnumber'])) {
        $encnumber = $_POST['encnumber'];
        // Fetch products based on the provided encnumber
        $sql = "SELECT Barcode, Product, ItemType, Unit, Quantity, Costing, Price, Wholesale, Promo, DeliveryNumber, Supplier, Receiver, StockInDate FROM stocksintry WHERE ENCNum = '$encnumber'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Display products
            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $row['Barcode'] . '</td>';
                echo '<td>' . $row['Product'] . '</td>';
                echo '<td>' . $row['ItemType'] . '</td>';
                echo '<td>' . $row['Unit'] . '</td>';
                echo '<td>' . $row['Quantity'] . '</td>';
                echo '<td>' . $row['Costing'] . '</td>';
                echo '<td>' . $row['Price'] . '</td>';
                echo '<td>' . $row['Wholesale'] . '</td>';
                echo '<td>' . $row['Promo'] . '</td>';
                echo '<td>' . $row['DeliveryNumber'] . '</td>';
                echo '<td>' . $row['Supplier'] . '</td>';
                echo '<td>' . $row['Receiver'] . '</td>';
                echo '<td>' . $row['StockInDate'] . '</td>';
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
