<?php
include('connection.php');

if (isset($_POST['query'])) {
    $query = $_POST['query'];

    // Fetch product names from the database that match the query
    $sql = "SELECT DISTINCT Product FROM products WHERE Product LIKE '%$query%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Display autocomplete suggestions
        while ($row = $result->fetch_assoc()) {
            echo "<div>" . $row['Product'] . "</div>";
        }
    } else {
        echo "<div>No suggestions found</div>";
    }
}
?>
