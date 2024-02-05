<?php
session_start();

include('connection.php');

// Retrieve form data
$Seqcode = $_POST['Seqcode'];
$number_id = $_POST['IDNumber'];
$Barcode = $_POST['Barcode'];
$CustomerName = $_POST['CustomerName'];

$TermofPayment = $_POST['TermofPayment'];
$VATTIN = $_POST['VATTIN'];
$ContactPerson = $_POST['ContactPerson'];
$Address = $_POST['Loc'];
$Contact = $_POST['Contact'];


// Get the id from the form
$id = $_POST['id']; // Adjust this according to your actual form structure

// Check if customer ID already exists
$query2 = mysqli_query($conn, "SELECT * FROM customer WHERE Seqcode = '$Seqcode' AND id != $id");
if (mysqli_num_rows($query2) > 0) {
    $_SESSION['status'] = "Customer ID already exists";
    $_SESSION['status_code'] = "error";
    header("location: index.php"); // Modify this redirect URL as needed
    exit;
}

// Update query
// Update query
$update = "UPDATE customer SET Seqcode = '$Seqcode', IDNumber = '$number_id', Barcode = '$Barcode', CustomerName = '$CustomerName', `Group` = '$grp', TermofPayment = '$TermofPayment', VATTIN = '$VATTIN', ContactPerson = '$ContactPerson', Loc = '$Address', Contact = '$Contact' ";
$update .= "WHERE id = $id";


// Check if any changes were made
if ($Seqcode !== "" || $number_id !== "" || $Barcode !== "" || $CustomerName !== "" ||  $TermofPayment !== "" || $VATTIN !== "" || $ContactPerson !== "" || $Address !== "" || $Contact !== "" ) {
    $res = $conn->query($update);

    if ($res && mysqli_affected_rows($conn) > 0) {
        $_SESSION['status'] = "Edit successful";
        $_SESSION['status_code'] = "success";
        header("location: customers.php"); // Modify this redirect URL as needed
        exit;
    } else {
        $_SESSION['status'] = "No changes made or error occurred";
        $_SESSION['status_code'] = "success";
        header("location: customers.php"); // Modify this redirect URL as needed
        exit;
    }
} else {
    $_SESSION['status'] = "No changes made";
    $_SESSION['status_code'] = "success";
    header("location: customers.php"); // Modify this redirect URL as needed
    exit;
}
?>
