<?php 
session_start(); 
$user = $_SESSION["user"];
  if($user[3] == 2){
    $issalesperson = true;
    $userdet = $_SESSION["userdet"];
  }
  else {
    $issalesperson = false;
  }


    include '/opt/lampp/htdocs/db-13151/db_connection.php';

    $con = OpenCon();
    
  	$b = $_POST['CID'];
  	$c = $_POST['cash'];
  	$d = $_POST['amount'];
  	$today = date("Y-m-d");

      $sql = "INSERT INTO payments_13151 (CID, cash, amount,pdate) VALUES ('$b', '$c','$d','$today')";


	   if(mysqli_query($con,$sql)) {
        CloseCon($con);
           
            }
    else echo "not added";

    
    header("refresh:0; url=payments_list.php");


?>