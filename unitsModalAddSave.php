<?php
include ('connection.php');

extract($_POST);

if(isset($_POST['unitSend'])){
    $sql="insert into units (unit_name)
            values('$unitSend')";
    $result=mysqli_query($conn,$sql);  
          
}
?>
