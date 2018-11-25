
<?php
    include '/opt/lampp/htdocs/db-13151/db_connection.php';

    $con = OpenCon();
    
    $name = $_POST['name'];
  	$num = $_POST['num'];
    $password = $_POST['password'];
	   

    $sql = "INSERT INTO user_13151 (Password , Active , role_id) VALUES ('$password', 1, 2)";




    if(mysqli_query($con,$sql)) {
      echo "<script>";
      echo "alert('Salesperson Added');";
      echo "</script>";
    }
    else echo "not added";




  $last_id = mysqli_insert_id($con);

	$sql2 = "INSERT INTO salesperson_13151 (SID, Name, contact_no) VALUES ('$last_id','$name', '$num')";
echo $sql2;

    if(mysqli_query($con,$sql2)) {
        CloseCon($con);
       header("refresh:0; url=salesperson_list.php");
    }
    else echo "not added";
    

        
  

?>