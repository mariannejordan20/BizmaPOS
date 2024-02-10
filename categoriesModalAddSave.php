<?php
session_start();

include('connection.php');

// Check if the request is sent via POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if category name is set and not empty
    if (isset($_POST['categoryName']) && !empty($_POST['categoryName'])) {
        // Sanitize the input
        $categoryName = mysqli_real_escape_string($conn, $_POST['categoryName']);

        // Insert the category into the database
        $sql = "INSERT INTO categories (main_category) VALUES ('$categoryName')";
        if (mysqli_query($conn, $sql)) {
            // Category added successfully
            echo "Category added successfully!";
        } else {
            // Error inserting category
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    } else {
        // Category name not provided
        echo "Category name is required!";
    }
} else {
    // Request method is not POST
    echo "Invalid request!";
}
?>
