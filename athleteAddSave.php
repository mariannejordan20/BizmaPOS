<?php
session_start();
	include('connection.php');

		$student_id = $_POST['Student_ID'];
		$firstname = $_POST['First_Name'];
        $lastname = $_POST['Last_Name'];
        $age = $_POST['Age'];
        $phone = $_POST['Phone'];
        $course = $_POST['Course'];
        $address = $_POST['Address'];
        $yearlevel =$_POST['Year_Level'];
        $status = $_POST['Status'];
        $bloodtype =$_POST['Blood_Type'];
        $height = $_POST['Height'];
        $weight =$_POST['Weight'];
        $event = $_POST['Event'];
        $sex = $_POST['Sex'];
        

$query = mysqli_query($conn,"SELECT * FROM athletes WHERE Student_ID = '$student_id'");

$msg = "";
 

if (isset($_POST['Save'])) {
    $filename = $_FILES["image"]["name"];
    $tempname = $_FILES["image"]["tmp_name"];
    $folder = "./img/" . $filename;

      if (empty($filename)) {
        $filename = "user.png"; 
    } 
}


if (mysqli_num_rows($query)>0)

{

	$_SESSION['status'] = "Student ID already exists!";
    $_SESSION['status_code'] = "error";
	header("location: ".$_SERVER['HTTP_REFERER']);
}

else{
    

    

$add = "insert into athletes set Student_ID = '".$student_id."', First_Name = '".$firstname."', Last_Name = '".$lastname."' , Age = '".$age."', Phone = '".$phone."',
Course = '".$course."', Address = '".$address."', Year_Level = '".$yearlevel."' , Status = '".$status."' , Blood_Type= '".$bloodtype."' , Height = '".$height."' , Weight = '".$weight."' , Event = '".$event."' , Sex = '".$sex."' ,Image = '".$filename."' " ;
$res = $conn->query($add);



	if ($res){

		$_SESSION['status'] = "Student Information Saved";
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

		
	
}
}




?>








