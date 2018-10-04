<?php
    include '/opt/lampp/htdocs/db-13151/db_connection.php';
    $conn = OpenCon();
    $PC = $_GET['delete'];
	$sql = "DELETE FROM product_13151 WHERE ProductCode ='$PC'";

	if(mysqli_query($conn,$sql)) {
        
    }
    else {
    	echo "failed";
    }

   CloseCon($conn);
   header("refresh:0; url=product_list.php");
?>