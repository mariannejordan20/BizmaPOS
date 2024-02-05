<?php
// fetchSubCategories.php

if (isset($_GET['categoryId'])) {
    $categoryId = $_GET['categoryId'];

    // Assuming you have a database connection
    include('connection.php');

    // Fetch sub-categories from the database based on the selected category
    $sql = "SELECT sub_category FROM subcategories WHERE main_category = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $categoryId); // Assuming the category ID is a string; adjust if it's an integer
    $stmt->execute();
    $result = $stmt->get_result();

    // Build HTML for sub-categories
    $subCategoriesHtml = '';
    while ($row = $result->fetch_assoc()) {
        $subCategoriesHtml .= '<tr><td><a href="subCategoryDelete.php?id=' . strtoupper($row['sub_category']) . '"><i class="fa fa-trash text-danger"></i></a></td><td>' . strtoupper($row['sub_category']) . '</td></tr>';
    }

    // Return the HTML to the client-side JavaScript
    echo $subCategoriesHtml;

    // Close the database connection
    $stmt->close();
    $conn->close();
}
?>
