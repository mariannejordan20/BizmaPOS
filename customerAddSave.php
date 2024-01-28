<?php
session_start();
	include('connection.php');

    $Seqcode = $_POST['Seqcode'];
    $number_id = $_POST['IDNumber'];
    $Barcode = $_POST['Barcode'];
    $CustomerName = $_POST['CustomerName'];
    $grp = $_POST['Group'];
    $TermofPayment = $_POST['TermofPayment'];
    $VATTIN = $_POST['VATTIN'];
    $ContactPerson = $_POST['ContactPerson'];
    $Address = $_POST['Loc'];
    $Contact = $_POST['Contact'];
    $Datee = $_POST['Date_Joined'];
        

$query = mysqli_query($conn,"SELECT * FROM customer WHERE Seqcode = '$Seqcode'");

$msg = "";
 


if (mysqli_num_rows($query)>0)

{

	$_SESSION['status'] = "Product already exists!";
    $_SESSION['status_code'] = "error";
	header("location: ".$_SERVER['HTTP_REFERER']);
}

else{
    

    

    $add = "INSERT INTO customer SET Seqcode = '".$Seqcode."', IDNumber = '".$number_id."', Barcode = '".$Barcode."', CustomerName = '".$CustomerName."', `Group` = '".$grp."', TermofPayment = '".$TermofPayment."', VATTIN = '".$VATTIN."', ContactPerson = '".$ContactPerson."', Loc = '".$Address."', Contact = '".$Contact."', Date_Joined = '".$Datee."'";


$res = $conn->query($add);



	if ($res){

		$_SESSION['status'] = "Customer Information Saved";
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
        header("location:customers.php");
    }

		
	
}
}




?>








