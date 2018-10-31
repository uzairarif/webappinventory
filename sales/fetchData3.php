<?php

	
      	include '/opt/lampp/htdocs/db-13151/db_connection.php';
        $conn = OpenCon();    
        
    

        $brand = $_POST['js_brand'];
        $type = $_POST['js_type'];
        $shade = $_POST['js_shade'];
        $size = $_POST['js_size'];


		if(isset($_POST["js_size"]) && !empty($_POST["js_size"])){


    	$query2 = $conn->query("SELECT ProductCode FROM product_13151 WHERE Brand='$brand' AND Type ='$type' AND Shade='$shade' AND Size='$size'");
    	$rowCount = $query2->num_rows;

    	if($rowCount == 1){
        	while($row = $query2->fetch_assoc()){
            		
                    exit ($row['ProductCode']);
               }
    	}else{
    		echo 'PRICE N/A';
                }
		}


       CloseCon($conn); 

?>