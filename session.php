<?php
    session_start();
    include 'db_connection.php';
    $con = OpenCon();

  
    $UID= $_POST['txtID'];
    $Pass = $_POST['txtPass'];



    $sql = "SELECT * FROM user_13151 WHERE UID = '$UID'";

    $result = mysqli_query($con, $sql);

    if(mysqli_query($con, $sql)) {
        $row = mysqli_fetch_array(mysqli_query($con, $sql));
      	

        if ($row['Password'] == $Pass){
          
          $_SESSION["user"] = $row;

          if($row[3] == 2){
            $sql = "SELECT * FROM salesperson_13151 WHERE SID = '$UID'";
            $_SESSION["userdet"] =  mysqli_fetch_array(mysqli_query($con,$sql));  
          }
          header("refresh:0; url=welcome.php");
        }

        else {
          
         header("refresh:0; url=index.php?flag=1");
        }


        



	//


    }
    else {
    	 //header("refresh:0; url=index.php");
      echo "problem";
    }

    CloseCon($con);


?>