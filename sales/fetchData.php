<?php

	
      	include '/opt/lampp/htdocs/db-13151/db_connection.php';
        $conn = OpenCon();    
        
        $type=$_POST['js_type'];
        $brand=$_POST['js_brand'];
        
    
        $query2 = $conn->query("SELECT DISTINCT Shade FROM product_13151 WHERE Type ='$type' AND Brand='$brand'");
    	$rowCount = $query2->num_rows;

    	if($rowCount > 0){
       		echo '<option value="">Select Shade</option>';
        		while($row = $query2->fetch_assoc()){
                    $val = $row['Shade'];
            		echo '<option value='.$row['Shade'].'>'.$row['Shade'].'</option>';
        		}
    	}else{
        echo '<option value="">Shades not available</option>';
    		}
		



       CloseCon($conn); 

?>


