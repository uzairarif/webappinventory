<?php
    include '/opt/lampp/htdocs/db-13151/db_connection.php';
    $conn = OpenCon();
    $CID = $_GET['delete'];
	$sql = "DELETE FROM customer_13151 WHERE CID='$CID'";

	if(mysqli_query($conn,$sql)) {
        echo 'Deleted';
    }

   CloseCon($conn);
   header("refresh:0; url=customer_list.php");
?>