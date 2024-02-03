<?php
include('connection.php');

if (isset($_GET['search'])) {
    $searchTerm = $_GET['search'];
    $sql = "SELECT ID, Barcode, Product, Warranty, Unit, Quantity, Costing, Price, Wholesale, Promo, Categories, Seller, Supplier, Date_Registered FROM products WHERE Product LIKE '%$searchTerm%' ORDER BY Categories";
    $results = $conn->query($sql);

    $searchData = array();

    foreach ($results as $result) {
        $searchData[] = array(
            'id' => $result['ID'],
            'barcode' => $result['Barcode'],
            'product' => $result['Product'],
            'unit' => $result['Unit'],
            'quantity' => $result['Quantity'],
            'costing' => $result['Costing'],
            'price' => $result['Price'],
            'wholesale' => $result['Wholesale'],
            'promo' => $result['Promo'],
            'categories' => $result['Categories'],
            'seller' => $result['Seller'],
            'supplier' => $result['Supplier'],
            'date_registered' => $result['Date_Registered']
        );
    }

    echo json_encode($searchData);
}
?>
