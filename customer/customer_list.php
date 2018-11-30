<?php session_start(); 
$user = $_SESSION["user"];
  if($user[3] == 2){
    $issalesperson = true;
    $userdet = $_SESSION["userdet"];
  }
  else {
    $issalesperson = false;
  }

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
	<h2>Customer List</h2> <a href="customer_create.php" class="btn btn-info" role="button">New Customer</a>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>CID</th>
				<th>Shop Name</th>
				<th>Customer Name</th>
				<th>Customer Number</th>
				<th>Address</th>
				<th>Area</th>
				<th>Country</th>
			</tr>
		</thead>
		<tbody>
		<?php 
			include '/opt/lampp/htdocs/db-13151/db_connection.php';
    		$conn = OpenCon();    
    		
        if($issalesperson){
          $sql = "SELECT * FROM customer_13151 WHERE Salesperson_id='$user[0]'";
        }
        else {
          $sql = "SELECT * FROM customer_13151";  
        }

        $result = mysqli_query($conn, $sql);

    	while($row = mysqli_fetch_array($result)) {
        	echo 
		 	"<tr>
        		<td>" . $row['CID'] . "</td>
        		<td>" . $row['Shop_Name'] . "</td>
        		<td>" . $row['Customer_Name'] . "</td>
        		<td>" . $row['Customer_Number'] . "</td>
        		<td>" . $row['Address'] . "</td>
      			<td>" . $row['Area'] . "</td>
      			<td>" . $row['Country'] . "</td>
      			<td><a href='customer_retrieve.php?search=$row[CID]' class='btn btn-primary' role='button'>edit</a>
      			<span>/</span>
            	<a href='remove.php?delete=$row[CID]' class = 'btn btn-danger btn-sm'>
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