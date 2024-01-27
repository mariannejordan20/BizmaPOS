<?php
session_start();

include('connection.php');
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
    $Datee = $_POST['Datee'];



$query = mysqli_query($conn, "SELECT * FROM customer WHERE Seqcode = '$Seqcode' AND number_id = '$number_id' AND Barcode = '$Barcode' AND CustomerName = '$CustomerName' AND grp = '$grp' AND TermofPayment = '$TermofPayment'
AND VATTIN = '$VATTIN' AND ContactPerson = '$ContactPerson' AND Address = '$Address' 
AND Contact = '$Contact' AND Datee = '$Datee'");


if (!empty($barcode)) {
    $query2 = mysqli_query($conn, "SELECT * FROM customer WHERE Seqcode = '$Seqcode'");
if (mysqli_num_rows($query2) >1 ) {
    $_SESSION['status'] = "Customer ID already Exists";
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
    $update = "Update customer set Seqcode = '".$Seqcode."', number_id = '".$number_id."', Barcode = '".$Barcode."', CustomerName = '".$CustomerName."', grp = '".$grp."', TermofPayment = '".$TermofPayment."', VATTIN = '".$VATTIN."', ContactPerson = '".$ContactPerson."', Address = '".$Address."' 
	, Contact = '".$Contact."' , Datee = '".$Datee."' ";

    $update .= "where id = ".$id;

    if ($Seqcode !== "" || $number_id !== "" || $Barcode !== "" || $CustomerName !== "" || $grp !== "" || $TermofPayment !== "" || $VATTIN !== "" || $ContactPerson !== "" || $Address !== "" || $Contact !== "" || $Datee !== "") {
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
