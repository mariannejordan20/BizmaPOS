<?php
include('connection.php');

if (isset($_GET['search'])) {
    $searchTerm = $_GET['search'];
    $sql = "SELECT ID, unit_name FROM units WHERE unit_name LIKE '%$searchTerm%' ORDER BY unit_name";
    $results = $conn->query($sql);

    echo '<table class="table table-bordered text-center" id="example" style="width: 100%;" cellspacing="0">
            <thead>
                <tr class="text-white" style="background-color: #2D333C">
                    <th class="text-center">Action</th>
                    <th class="text-center">Units</th>
                </tr>
            </thead>
            <tbody>';

    foreach ($results as $result) {
        echo '<tr style="color: white;">
                <td>
                    <a href="unitsDelete.php?id=' . $result['ID'] . '">
                        <i class="fa fa-trash text-danger"></i>
                    </a>
                </td>
                <td>' . $result['unit_name'] . '</td>
            </tr>';
    }

    echo '</tbody></table>';
}
?>