<?php session_start(); 
$user = $_SESSION["user"];

?>
<!DOCTYPE html>
<html>
<body>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<?php include('/opt/lampp/htdocs/db-13151/includes/header.php')?>


<div class = "container">
	<h2>Salesperson List</h2> <a href="salesperson_create.php" class="btn btn-info" role="button">New Salesperson</a>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>SID</th>
				<th>Name</th>
				<th>Contact Number</th>
				<th>CIDs</th>
			</tr>
		</thead>
		<tbody>
		<?php 
			include '/opt/lampp/htdocs/db-13151/db_connection.php';
    		$conn = OpenCon();    
    		$sql = "SELECT * FROM salesperson_13151";
    		$result = mysqli_query($conn, $sql);
    		while($row = mysqli_fetch_array($result)) {
          $CID = "no customer";
          $ID = $row[0];
          $a = 1;
          $res2 = mysqli_query($conn,"SELECT * FROM customer_13151 WHERE Salesperson_id=$ID");
            while ($row2 = mysqli_fetch_array($res2)) {
              if ($a == 1) {
                  $CID = $row2[0]; 
                  $a = $a + 1;
              }
              else{
                $sp = ",".$row2[0];
                $CID.=$sp;
              }
                
              }

        	echo 
		 	    "<tr>
        		<td>" . $row['SID'] . "</td>
        		<td>" . $row['Name'] . "</td>
        		<td>" . $row['contact_no'] . "</td>
        		<td>" . $CID . "</td>
      			<td><a href='salesperson_retrieve.php?search=$row[SID]' class='btn btn-primary' role='button'>edit</a>
      			<span>/</span>
            	<a href='salespersonremove.php?delete=$row[SID]' class = 'btn btn-danger btn-sm'>
            	<span class = 'glyphicon glyphicon-trash'></span>
            	delete</a></td>
      		</tr>";
   			}
   			CloseCon($conn);
		 ?>
		</tbody>
	</table>
</div>



</body>
</html>