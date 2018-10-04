
<?php
    include '/opt/lampp/htdocs/db-13151/db_connection.php';

    $con = OpenCon();
    $npc = $_POST['npc'];
    $nbrand = $_POST['nbrand'];
  	$ntype = $_POST['ntype'];
  	$nshade = $_POST['nshade'];
  	$nsize = $_POST['nsize'];
  	$nsp = $_POST['nsp'];
 


	$sql = "UPDATE product_13151 SET ProductCode = '$npc', Brand = '$nbrand', Type = '$ntype' , Shade = '$nshade', Size = '$nsize', SalesPrice= '$nsp' WHERE ProductCode = '$npc'";
 
	if(mysqli_query($con,$sql)) {
        }
    else echo "not added";

        CloseCon($con);
    
    

  
    header("refresh:0; url=product_list.php");
?>