<?php
// Connect to your database
include('connection.php');

$searchText = $_POST['searchText'];

$sql = "SELECT ID, Barcode, Product, ItemType, Unit, Costing, Price, Wholesale, Promo, Warranty, Categories, SubCategory, Seller, Supplier FROM products WHERE Product LIKE '%$searchText%' ORDER BY Categories";

$results = $conn->query($sql);

if ($results->num_rows > 0) {
    while ($row = $results->fetch_assoc()) {
        echo '<a class="dropdown-item product-item" data-product-id="' . $row['ID'] . '" data-barcode="' . $row['Barcode'] . '" data-product="' . $row['Product'] . '" data-type="' . $row['ItemType'] . '" data-unit="' . $row['Unit'] . '" data-costing="' . $row['Costing'] . '" data-price="' . $row['Price'] . '" data-wholesale="' . $row['Wholesale'] . '" data-promo="' . $row['Promo'] . '" data-warranty="' . $row['Warranty'] . '" data-categories="' . $row['Categories'] . '" data-subcategories="' . $row['SubCategory'] . '" data-seller="' . $row['Seller'] . '" data-supplier="' . $row['Supplier'] . '">'  . $row['Barcode'] . ' - ' . $row['Product'] . ' - ' . $row['ItemType'] . ' - ' . $row['Unit'] . ' - ' . $row['Price'] .'</a>';
    }
} else {
    echo '<a class="dropdown-item">No products found</a>';
}

$conn->close();
?>
