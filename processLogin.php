<?php
	session_start();
	include('connection.php');

	$Username = $_POST['username'];
	$Password = $_POST['password'];

	$sql = "select * from users where UserName ='".$Username."' and Password ='".$Password."'";
	$res = $conn -> query($sql);
                  
        $res = mysqli_query($conn, $sql);

       if(mysqli_num_rows($res) > 0)
{
            if($row = mysqli_fetch_array($res))
            {
            	$_SESSION['hasLog'] = 1;
                $_SESSION['Name'] = $row['Name'];
            	echo "1";
            	exit();
            }
        }
            else{
				$_SESSION['hasLog'] = 0;
				echo"0";
				

				

			}
?>