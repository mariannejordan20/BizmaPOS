<?php
session_start();

include('connection.php');

// Retrieve form data
$Seqcode = $_POST['Seqcode'];
$number_id = $_POST['number_id'];
$Barcode = $_POST['Barcode'];
$CustomerName = $_POST['CustomerName'];
$grp = $_POST['grp'];
$TermofPayment = $_POST['TermofPayment'];
$VATTIN = $_POST['VATTIN'];
$ContactPerson = $_POST['ContactPerson'];
$Address = $_POST['Address'];
$Contact = $_POST['Contact'];
$Datee = isset($_POST['Datee']) ? $_POST['Datee'] : '';

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
$update = "UPDATE customer SET Seqcode = '".$Seqcode."', number_id = '".$number_id."', Barcode = '".$Barcode."', CustomerName = '".$CustomerName."', grp = '".$grp."', TermofPayment = '".$TermofPayment."', VATTIN = '".$VATTIN."', ContactPerson = '".$ContactPerson."', Address = '".$Address."', Contact = '".$Contact."', Datee = '".$Datee."' ";

$update .= "WHERE id = ".$id;

// Check if any changes were made
if ($Seqcode !== "" || $number_id !== "" || $Barcode !== "" || $CustomerName !== "" || $grp !== "" || $TermofPayment !== "" || $VATTIN !== "" || $ContactPerson !== "" || $Address !== "" || $Contact !== "" || $Datee !== "") {
    $res = $conn->query($update);

    if ($res && mysqli_affected_rows($conn) > 0) {
        $_SESSION['status'] = "Edit successful";
        $_SESSION['status_code'] = "success";
        header("location: customers.php"); // Modify this redirect URL as needed
        exit;
    } else {
        $_SESSION['status'] = "No changes made or error occurred";
        $_SESSION['status_code'] = "error";
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
