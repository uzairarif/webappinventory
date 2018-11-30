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
    
    $shopname = $_POST['shop_name'];
  	$customername = $_POST['customer_name'];
  	$customernum = $_POST['customer_num'];
  	$address = $_POST['address'];
  	$area = $_POST['area'];
  	$Geocord = $_POST['Country'];
    $sp = $_POST['SP'];
	  

    
      $sql = "INSERT INTO customer_13151 (Shop_Name, Customer_Name, Customer_Number, Address, Area, Salesperson_id) VALUES ('$shopname', '$customername', '$customernum','$address','$area','$sp')";


	   if(mysqli_query($con,$sql)) {
        echo "<script>";
        echo "alert('Customer Added');";
        echo "</script>";
        CloseCon($con);
           header("refresh:0; url=customer_list.php");
            }
    else echo "not added";

    



?>