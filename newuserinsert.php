<?php 
session_start(); 
$user = $_SESSION["user"];


    include '/opt/lampp/htdocs/db-13151/db_connection.php';

    $con = OpenCon();
    
    $id = $_POST['new_user_id'];
  	$pass = $_POST['p1'];

	  $role = 1;

    
      $sql = "INSERT INTO user_13151 (UID, Password, Active, role_id) VALUES ('$id','$pass', 1,1)";


	   if(mysqli_query($con,$sql)) {
        echo "<script>";
        echo "alert('User Added');";
        echo "</script>";

        CloseCon($con);
           header("refresh:0; url=welcome.php");
            }
    else echo "not added";

    



?>