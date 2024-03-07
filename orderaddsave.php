<?php
session_start();

include('connection.php'); // Include your database connection file

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $order_date = $_POST['Order_date'];
    $order_time = $_POST['Order_time'];
    $customer_DR = $_POST['customer_DR'];
    $order_type = $_POST['Order_type'];
    $order_status = $_POST['Order_status'];
    $customer_name = $_POST['customer_name'];
    $customer_address_1 = $_POST['customer_address_1'];
    $customer_county = $_POST['customer_county'];
    $customer_phone = $_POST['customer_phone'];
    $customer_name_ship = $_POST['customer_name_ship'];
    $customer_address_ship = $_POST['customer_address_ship'];
    $customer_county_ship = $_POST['customer_county_ship'];
    $qty = $_POST['qty'];
    $product_desc = $_POST['product_desc'];
    $product_serial = $_POST['product_serial'];

 // Perform SQL query to insert data into the database table
 $sql = "INSERT INTO `order` (Order_date, Order_time, Customer_DR, Order_type, Order_status, customer_name, customer_address_1, customer_county, customer_phone, customer_name_ship, customer_address_ship, customer_county_ship, qty, product_desc, product_serial) 
 VALUES ('$order_date', '$order_time', '$customer_DR', '$order_type', '$order_status', '$customer_name', '$customer_address_1', '$customer_county', '$customer_phone', '$customer_name_ship', '$customer_address_ship', '$customer_county_ship', '$qty', '$product_desc', '$product_serial')";

// Check if the query was successful
if (mysqli_query($conn, $sql)) {
// Set success message
$_SESSION['success_message'] = "Order added successfully!";
// Redirect back to the orderadd.php page
header("Location: orderadd.php");
exit();
} else {
// Set error message
$_SESSION['error_message'] = "Error: " . mysqli_error($conn);
// Redirect back to the orderadd.php page
header("Location: orderadd.php");
exit();
}
} else {
// If the form was not submitted, redirect back to the orderadd.php page
header("Location: orderadd.php");
exit();
}
?>
