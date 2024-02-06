<?php
include('connection.php');

if (isset($_GET['search'])) {
    $searchTerm = $_GET['search'];
    $sql = "SELECT ID, unit_name FROM units WHERE unit_name LIKE '%$searchTerm%' ORDER BY unit_name";
    $results = $conn->query($sql);

    echo '<table class="table table-bordered text-center" id="example" style="width: 100%;" cellspacing="0">
            <thead>
                <tr class="text-white" style="color: #000000">
                    <th class="text-center">ACTION</th>
                    <th class="text-center">UNITS</th>
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
                <td>' . strtoupper($result['unit_name']) . '</td>
            </tr>';
    }

    echo '</tbody></table>';
}
?>