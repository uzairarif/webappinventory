<?php 
session_start(); 
$user = $_SESSION["user"];
    include ('/opt/lampp/htdocs/db-13151/db_connection.php');

    $con = OpenCon();
    
    $today = date("Y-m-d"); 

    $dict = $_POST["dictionary"];

    $cid = $dict["CID"];
    $items = $dict["items"];  
  

    $sql1 = "INSERT INTO salesorder2_13151 (customer_id, date,return_flag) VALUES ('$cid','$today',0)";

    if(mysqli_query($con,$sql1)) {
        
    }
    else {
       // header("refresh:0; url=db-13151/check.php");
    }
    
    
    
    $last_id = mysqli_insert_id($con);

    for ($i=1; $i <= $items ; $i++) { 
        

        $pid = $dict['productid'.$i];
        $qty = $dict['qty'.$i];
        $rate = $dict['rate'.$i];
        $amt = $dict['amount'.$i];

        $a = "INSERT INTO salesorder2_details13151 (CID,order_num,qty,rate,amount,return_flag,product_id) VALUES ('$cid','$last_id','$qty','$rate','$amt',0,'$pid')";

        if(mysqli_query($con,$a)) {

            }
        else echo "not added";
        }




  
      
   
    


?>