<?php
    include '/opt/lampp/htdocs/db-13151/db_connection.php';
    $conn = OpenCon();
    $UID = $_GET['delete'];

	$sql = "DELETE FROM user_13151 WHERE UID='$UID'";


  mysqli_query($conn,$sql);

    $sql = "DELETE FROM salesperson_13151 WHERE SID='$UID'";


	mysqli_query($conn,$sql);

    $sql = "UPDATE customer_13151 SET Salesperson=0 WHERE Salesperson='$UID'";
    
   mysqli_query($conn,$sql);

   CloseCon($conn);
   header("refresh:0; url=salesperson_list.php");
?>