<?php

	
      	include '/opt/lampp/htdocs/db-13151/db_connection.php';
        $conn = OpenCon();    
        
        $brand=$_POST['brand'];
        
		if(isset($_POST["brand"]) && !empty($_POST["brand"])){
    	
    	$query2 = $conn->query("SELECT DISTINCT Type FROM product_13151 WHERE Brand ='$brand'");
    	$rowCount = $query2->num_rows;

    	if($rowCount > 0){
       		echo '<option value="">Select Type</option>';
        		while($row = $query2->fetch_assoc()){
                    $val = $row['Type'];
            		echo '<option value='.$row['Type'].'>'.$row['Type'].'</option>';
        		}
    	}else{
        echo '<option value="">Type not available</option>';
    		}
		}




       CloseCon($conn); 

?>


