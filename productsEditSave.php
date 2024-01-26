<?php
session_start();

include('connection.php');
$id = $_POST['hiddenID'];
$barcode = $_POST['Barcode'];
$product = $_POST['Product'];
$unit = $_POST['Unit'];
$costing = $_POST['Costing'];
$price = $_POST['Price'];
$wholesale = $_POST['Wholesale'];
$promo = $_POST['Promo'];
$categories = $_POST['Categories'];
$seller = $_POST['Seller'];
$supplier = $_POST['Supplier'];
$date = $_POST['Date_Registered'];



$query = mysqli_query($conn, "SELECT * FROM products WHERE Barcode = '$barcode' AND Product = '$product' AND Unit = '$unit' AND Costing = '$costing' AND Price = '$price' AND Wholesale = '$wholesale'
AND Promo = '$promo' AND Categories = '$categories' AND Seller = '$seller' 
AND Supplier = '$supplier' AND Date_Registered = '$date'");


if (!empty($barcode)) {
    $query2 = mysqli_query($conn, "SELECT * FROM products WHERE Barcode = '$barcode'");
if (mysqli_num_rows($query2) >1 ) {
    $_SESSION['status'] = "Student ID already Exists";
    $_SESSION['status_code'] = "error";
    switch($event){
        case 'Arnis':
        header("location:sports.php?sport=arnis");
        break;
        case 'Athletics':
        header("location:sports.php?sport=athletics");
        break;
        case 'Badminton':
        header("location:sports.php?sport=badminton");
        break;
        case 'Baseball':
        header("location:sports.php?sport=baseball");
        break;
        case 'Basketball':
        header("location:sports.php?sport=basketball");
        break;
        case 'Chess':
        header("location:sports.php?sport=chess");
        break;
        case 'Dancesports':
        header("location:sports.php?sport=dancesports");
        break;
        case 'Futsal':
        header("location:sports.php?sport=futsal");
        break;
        case 'Football':
        header("location:sports.php?sport=football");
        break;
        case 'Softball':
        header("location:sports.php?sport=softball");
        break;
        case 'Swimming':
        header("location:sports.php?sport=swimming");
        break;
        case 'Sepak Takraw':
        header("location:sports.php?sport=sepak-takraw");
        break;
        case 'Table Tennis':
        header("location:sports.php?sport=table-tennis");
        break;
        case 'Taekwando Koryugi':
        header("location:sports.php?sport=taekwando-koryugi");
        break;
        case 'Taekwando Poomsae':
        header("location:sports.php?sport=taekwando-poomsae");
        break;
        case 'Tennis':
        header("location:sports.php?sport=tennis");
        break;
        case 'Volleyball':
        header("location:sports.php?sport=volleyball");
        break;
        default:
        header("location:index.php");
    }
} else {
    $update = "Update products set Barcode = '".$barcode."', Product = '".$product."', Unit = '".$unit."', Costing = '".$costing."', Price = '".$price."', Wholesale = '".$wholesale."', Promo = '".$promo."', Categories = '".$categories."', Seller = '".$seller."' 
	, Supplier = '".$supplier."' , Date_Registered = '".$date."' ";

    $update .= "where id = ".$id;

    if ($barcode !== "" || $product !== "" || $unit !== "" || $costing !== "" || $price !== "" || $wholesale !== "" || $promo !== "" || $categories !== "" || $seller !== "" || $supplier !== "" || $date !== "") {
        $res = $conn->query($update);

        if ($res && mysqli_affected_rows($conn) > 0) {
            $_SESSION['status'] = "Edit Successful";
            $_SESSION['status_code'] = "success";
            switch($event){
        case 'Arnis':
        header("location:sports.php?sport=arnis");
        break;
        case 'Athletics':
        header("location:sports.php?sport=athletics");
        break;
        case 'Badminton':
        header("location:sports.php?sport=badminton");
        break;
        case 'Baseball':
        header("location:sports.php?sport=baseball");
        break;
        case 'Basketball':
        header("location:sports.php?sport=basketball");
        break;
        case 'Chess':
        header("location:sports.php?sport=chess");
        break;
        case 'Dancesports':
        header("location:sports.php?sport=dancesports");
        break;
        case 'Futsal':
        header("location:sports.php?sport=futsal");
        break;
        case 'Football':
        header("location:sports.php?sport=football");
        break;
        case 'Softball':
        header("location:sports.php?sport=softball");
        break;
        case 'Swimming':
        header("location:sports.php?sport=swimming");
        break;
        case 'Sepak Takraw':
        header("location:sports.php?sport=sepak-takraw");
        break;
        case 'Table Tennis':
        header("location:sports.php?sport=table-tennis");
        break;
        case 'Taekwando Koryugi':
        header("location:sports.php?sport=taekwando-koryugi");
        break;
        case 'Taekwando Poomsae':
        header("location:sports.php?sport=taekwando-poomsae");
        break;
        case 'Tennis':
        header("location:sports.php?sport=tennis");
        break;
        case 'Volleyball':
        header("location:sports.php?sport=volleyball");
        break;
        default:
        header("location:index.php");
    }
        } else {
            $_SESSION['status'] = "No changes made";
            $_SESSION['status_code'] = "success";
            switch($event){
        case 'Arnis':
        header("location:sports.php?sport=arnis");
        break;
        case 'Athletics':
        header("location:sports.php?sport=athletics");
        break;
        case 'Badminton':
        header("location:sports.php?sport=badminton");
        break;
        case 'Baseball':
        header("location:sports.php?sport=baseball");
        break;
        case 'Basketball':
        header("location:sports.php?sport=basketball");
        break;
        case 'Chess':
        header("location:sports.php?sport=chess");
        break;
        case 'Dancesports':
        header("location:sports.php?sport=dancesports");
        break;
        case 'Futsal':
        header("location:sports.php?sport=futsal");
        break;
        case 'Football':
        header("location:sports.php?sport=football");
        break;
        case 'Softball':
        header("location:sports.php?sport=softball");
        break;
        case 'Swimming':
        header("location:sports.php?sport=swimming");
        break;
        case 'Sepak Takraw':
        header("location:sports.php?sport=sepak-takraw");
        break;
        case 'Table Tennis':
        header("location:sports.php?sport=table-tennis");
        break;
        case 'Taekwando Koryugi':
        header("location:sports.php?sport=taekwando-koryugi");
        break;
        case 'Taekwando Poomsae':
        header("location:sports.php?sport=taekwando-poomsae");
        break;
        case 'Tennis':
        header("location:sports.php?sport=tennis");
        break;
        case 'Volleyball':
        header("location:sports.php?sport=volleyball");
        break;
        default:
        header("location:index.php");
    }
            // Redirect to appropriate page
        }
    } else {
        $_SESSION['status'] = "No changes made";
        $_SESSION['status_code'] = "success";
        switch($event){
        case 'Arnis':
        header("location:sports.php?sport=arnis");
        break;
        case 'Athletics':
        header("location:sports.php?sport=athletics");
        break;
        case 'Badminton':
        header("location:sports.php?sport=badminton");
        break;
        case 'Baseball':
        header("location:sports.php?sport=baseball");
        break;
        case 'Basketball':
        header("location:sports.php?sport=basketball");
        break;
        case 'Chess':
        header("location:sports.php?sport=chess");
        break;
        case 'Dancesports':
        header("location:sports.php?sport=dancesports");
        break;
        case 'Futsal':
        header("location:sports.php?sport=futsal");
        break;
        case 'Football':
        header("location:sports.php?sport=football");
        break;
        case 'Softball':
        header("location:sports.php?sport=softball");
        break;
        case 'Swimming':
        header("location:sports.php?sport=swimming");
        break;
        case 'Sepak Takraw':
        header("location:sports.php?sport=sepak-takraw");
        break;
        case 'Table Tennis':
        header("location:sports.php?sport=table-tennis");
        break;
        case 'Taekwando Koryugi':
        header("location:sports.php?sport=taekwando-koryugi");
        break;
        case 'Taekwando Poomsae':
        header("location:sports.php?sport=taekwando-poomsae");
        break;
        case 'Tennis':
        header("location:sports.php?sport=tennis");
        break;
        case 'Volleyball':
        header("location:sports.php?sport=volleyball");
        break;
        default:
        header("location:index.php");
    }
        // Redirect to appropriate page
    }
	}
}
?>
