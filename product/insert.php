
<?php
    include '/opt/lampp/htdocs/db-13151/db_connection.php';

    $con = OpenCon();
    
    $pc = $_POST['ProductCode'];
  	$brand = $_POST['Brand'];
  	$type = $_POST['Type'];
  	$shade = $_POST['Shade'];
  	$size = $_POST['Size'];
  	$sp = $_POST['SalesPrice'];
	


	$sql = "INSERT INTO product_13151 (ProductCode, Brand, Type, Shade, Size , SalesPrice) VALUES ('$pc', '$brand', '$type','$shade','$size','$sp')";

	if(mysqli_query($con,$sql)) {
        
    }
    else echo "not added";

    CloseCon($con);

   header("refresh:0; url=product_list.php");

?>