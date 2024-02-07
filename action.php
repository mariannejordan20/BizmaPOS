<?php
include('connection.php');

if(isset($POST['action'])){
    $output = '';


    if($_POST['action'] == 'fetchData'){
        $query = "SELECT * FROM units join products on units.unit_name = products.Unit";

        getData($query);

    }
}

function getData($query){
    include('connection.php');
    $output = "";
    $results = mysqli_query($conn,$query) or die ('error');
    if(mysqli_num_rows($total_row)>0){
        foreach($results as $result){
            $output .= '<tr>
            <td>
                <a class="mr-2" href="#?id=' . $result['ID'] . '" data-bs-toggle="modal" data-bs-target="#productsModal' . $result['ID'] . '"><i class="fa fa-eye"></i></a>
                <a class="mr-2" href="productsEdit.php?id=' . $result['ID'] . '"><i class="fa fa-edit"></i></a>
                <a href="productsDelete.php?id=' . $result['ID'] . '"><i class="fa fa-trash text-danger"></i></a>
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
            <td class="text-truncate" style="max-width: 100px;">' . $result['SubCategory'] . '</td>
            <td class="text-truncate" style="max-width: 100px;">' .strtoupper ($result['Seller']) . '</td>
            <td class="text-truncate" style="max-width: 100px;">' .strtoupper ($result['Supplier']) . '</td>
            <td class="text-truncate" style="max-width: 75px;">' . (isset($result['Warranty']) ? $result['Warranty'] : '') . '</td>
            <td class="text-truncate" style="max-width: 75px;">' . $result['Date_Registered'] . '</td>
        </tr>';
        }
    }
    else{
        $output = "<h4>Post not found! </h4>";

    }
    echo $output;


}

?>