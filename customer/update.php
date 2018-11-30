
<?php
    include '/opt/lampp/htdocs/db-13151/db_connection.php';

    $con = OpenCon();
    $CID = $_POST['cid'];
    $nshopname = $_POST['nshop_name'];
  	$ncustomername = $_POST['ncustomer_name'];
  	$ncustomernum = $_POST['ncustomer_num'];
  	$naddress = $_POST['naddress'];
  	$narea = $_POST['narea'];
  	$ncountry = $_POST['ncountry'];
	


	$sql = "UPDATE customer_13151 SET Shop_Name = '$nshopname', Customer_Name = '$ncustomername', Customer_Number = '$ncustomernum' , Address = '$naddress', Area = '$narea', Country = '$ncountry' WHERE CID = '$CID'";
 
	if(mysqli_query($con,$sql)) {
        echo "<script>";
        echo "alert('Updated');";
        echo "</script>";
        CloseCon($con);
    }
    else echo "not updated";



  
    header("refresh:0; url=customer_list.php");

?>