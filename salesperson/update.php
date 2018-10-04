
<?php
    include '/opt/lampp/htdocs/db-13151/db_connection.php';

    $con = OpenCon();
    $UID = $_POST['uid'];
    $nname = $_POST['nname'];
  	$nnum = $_POST['nnum'];
    $npassword = $_POST['npass'];
    $nactive = $_POST['nactive'];
	   
  $sql = "UPDATE user_13151 SET Password = '$npassword', Active = '$nactive' WHERE UID = '$UID'";

    if(mysqli_query($con,$sql)) {
    
    }


	$sql = "UPDATE salesperson_13151 SET Name = '$nname', contact_no = '$nnum' WHERE SID = '$UID'";


    if(mysqli_query($con,$sql)) {
        CloseCon($con);
    }
    
    

   header("refresh:0; url=salesperson_list.php");

?>