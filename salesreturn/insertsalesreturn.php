<?php 
session_start(); 
$user = $_SESSION["user"];

    include '/opt/lampp/htdocs/db-13151/db_connection.php';

    $con = OpenCon();
    
    $today = date("Y-m-d H:i:s"); 

    $dict = $_POST["dictionary"];

    $cid = $dict['CID'];
    $items = $dict['items'];  
    $billedamount = 0;

    for ($i=1; $i <= $items ; $i++) { 
        $billedamount = $billedamount + $dict['amount'.$i];
    }
    
    
    $sql1 = "INSERT INTO salesreturn_13151
      (customer_id, date_time, salesperson_id, billed_amount) VALUES ('$cid','$today',1,'$billedamount')";

    if(mysqli_query($con,$sql1)) {
   
     }
    else {
        header("refresh:0; url=db-13151/check.php");
      }
    
    $last_id = mysqli_insert_id($con);

    for ($i=1; $i <= $items ; $i++) { 
        
        $returnnum = $last_id;
        $pid = $dict['productid'.$i];
        $qty = $dict['qty'.$i];
        $rate = $dict['rate'.$i];
        $amt = $dict['amount'.$i];

        $sql = "INSERT INTO salesreturn_details13151 (return_num, product_id, quantity, rate, amount) VALUES ('$returnnum', '$pid', '$qty','$rate','$amt')";

        if(mysqli_query($con,$sql)) {
        
        }
    }
  
      
      CloseCon($con);
      header("refresh:0; url=salesreturn_list.php"); 
   
    


?>