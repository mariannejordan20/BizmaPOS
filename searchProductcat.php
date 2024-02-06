<?php
include('connection.php');

if (isset($_GET['search'])) {
    $searchTerm = $_GET['search'];

    // Check if the search term is the placeholder for all products
    if ($searchTerm === 'all_products') {
        // Retrieve all products
        $sql = "SELECT * FROM products ORDER BY Product";
        $results = $conn->query($sql);
    } else {
        // Perform search based on the provided search term (product name or barcode)
        $sql = "SELECT * FROM products 
        WHERE (Product LIKE '%$searchTerm%' OR Barcode LIKE '%$searchTerm%') 
        AND Categories != 'warranty' 
        ORDER BY Product";
        $results = $conn->query($sql);
    }
    echo '<table class="table text-center table-bordered" id="productsTable" width="100%" cellspacing="0">
            <thead>
                <tr class="th" style="color: #000000">
                    <th class="text-center custom-column-width">Action</th>
                    <th class="text-center custom-column-width">ID</th>
                    <th class="text-center custom-column-width">Barcode</th>
                    <th class="text-center custom-column-width" style="padding-right: 150px;">Product Name</th>
                    <th class="text-center custom-column-width">Unit</th>
                    <th class="text-center custom-column-width">Qty</th>
                    <th class="text-center custom-column-width">Costing</th>
                    <th class="text-center custom-column-width">Price</th>
                    <th class="text-center custom-column-width">Wholesale</th>
                    <th class="text-center custom-column-width">Promo</th>
                    <th class="text-center custom-column-width">Ctry</th>
                    <th class="text-center custom-column-width">Seller</th>
                    <th class="text-center custom-column-width">Supplier</th>
                    <th class="text-center custom-column-width">Date Registered</th>
                </tr>
            </thead>
            <tbody class="custom-font-size" style="color: #313A46">';

    foreach ($results as $result) {
        echo '<tr>
                <td>
                    <a class="mr-2" href="#?id='.$result['ID'].'" data-bs-toggle="modal" data-bs-target="#productsModal'.$result['ID'].'"><i class="fa fa-eye"></i></a>
                    <a class="mr-2" href="productsEdit.php?id='.$result['ID'].'"><i class="fa fa-edit"></i></a>
                    <a href="productsDelete.php?id='.$result['ID'].'"><i class="fa fa-trash text-danger"></i></a>
                </td>
                <td class="text-truncate" style="max-width: 50px;">'  .$result['ID'] . '</td>
                <td class="text-truncate" style="max-width: 100px;">' . $result['Barcode'] . '</td>
                <td class="text-truncate" style="max-width: 150px;">' .strtoupper ($result['Product']) . '</td>
                <td class="text-truncate" style="max-width: 50px;">' . $result['Unit'] . '</td>
                <td class="text-truncate" style="max-width: 50px;">' . $result['Quantity'] . '</td>
                <td class="text-truncate" style="max-width: 100px;">' . $result['Costing'] . '</td>
                <td class="text-truncate" style="max-width: 100px;">' . $result['Price'] . '</td>
                <td class="text-truncate" style="max-width: 100px;">' . $result['Wholesale'] . '</td>
                <td class="text-truncate" style="max-width: 100px;">' . $result['Promo'] . '</td>
                <td class="text-truncate" style="max-width: 100px;">' . $result['Categories'] . '</td>
                <td class="text-truncate" style="max-width: 100px;">' .strtoupper ($result['Seller']) . '</td>
                <td class="text-truncate" style="max-width: 100px;">' .strtoupper ($result['Supplier']) . '</td>
                <td class="text-truncate" style="max-width: 75px;">' . $result['Date_Registered'] . '</td>
                <!-- Add more columns here based on your product structure -->
            </tr>';
        echo '<div class="modal fade" id="productsModal'.$result['ID'].'" tabindex="-1" aria-labelledby="productsModal'.$result['ID'].'" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-md">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" style="white-space: normal; word-wrap: break-word; max-width: 400px;">'.$result['Product'].'</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="font-size: 1.5rem; color: #000; opacity: 0.8; background-color: transparent; border: none;">x</button>
                        </div>
                        <div class="modal-body">
                            <p><strong>Barcode:</strong> '.$result['Barcode'].'</p>
                            <p><strong>Unit:</strong> '.$result['Unit'].'</p>
                            <p><strong>Costing:</strong> '.$result['Costing'].'</p>
                            <p><strong>Price:</strong> '.$result['Price'].'</p>
                            <p><strong>Wholesale Price:</strong> '.$result['Wholesale'].'</p>
                            <p><strong>Promo Price:</strong> '.$result['Promo'].'</p>
                            <p><strong>Category:</strong> '.$result['Categories'].'</p>
                            <p><strong>Seller:</strong> '.$result['Seller'].'</p>
                            <p><strong>Supplier:</strong> '.$result['Supplier'].'</p>
                            <p><strong>Date:</strong> '.$result['Date_Registered'].'</p>
                        </div>
                    </div>
                </div>
            </div>';
    }

    echo '</tbody></table>';
}
?>
