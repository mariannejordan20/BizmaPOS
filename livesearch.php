<?php
include('connection.php');

if(isset($_POST['input'])){
    $input = $_POST['input'];
    $query = "SELECT * FROM products WHERE Product LIKE '{$input}%'";
    $result = mysqli_query($con, $query);
    
    if ($result) {
        if(mysqli_num_rows($result) > 0) {
            echo '<table class="table text-center table-bordered" id="productsTable" width="100%" cellspacing="0">';
            echo '<thead>
                    <tr class="text-white">
                        <th class="text-center">ACTION</th>
                        <th class="text-right" style="padding-right: 50px">ID</th>
                        <th class="text-center">BARCODE</th>
                        <th class="text-center" style="padding-right: 150px;">PRODUCT NAME</th>
                        <th class="text-center">
                            <select id="unitFilter" style="border: none; font-weight: bold; color:#656565;">
                                <option value="">UNIT</option>
                                <!-- Add options dynamically if needed -->
                            </select>
                        </th>
                        <th class="text-center">QTY</th>
                        <th class="text-center" style="padding-right: 30px">COSTING</th>
                        <th class="text-center" style="padding-right: 30px">REG-PRICE</th>
                        <th class="text-center">WHOLESALE</th>
                        <th class="text-center" style="padding-right: 33px">PROMO</th>
                        <th class="text-center">
                            <select id="categoryFilter" style="border: none; font-weight: bold; color:#656565;">
                                <option value="">CATEGORIES</option>
                                <!-- Add options dynamically if needed -->
                            </select>
                        </th>
                        <th class="text-center">S-CAT</th>
                        <th class="text-center" style="padding-right: 50px">Type</th>
                        <th class="text-center">SELLER</th>
                        <th class="text-center">SUPPLIER</th>
                        <th class="text-center">WRNTY</th>
                        <th class="text-center">DATE REGISTERED</th>
                    </tr>
                </thead>';
            echo '<tbody class="custom-font-size" style="color: #313A46;">';
            
            while($row = mysqli_fetch_assoc($result)) {
                echo '<tr>';
                // Output your table row data here based on $row
                // Example: echo '<td>' . $row['columnName'] . '</td>';
                echo '</tr>';
            }
            
            echo '</tbody>';
            echo '</table>';
        } else {
            echo "<h6 class='text-danger text-center mt-3'>No data found</h6>";
        }
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
?>
