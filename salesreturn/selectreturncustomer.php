<?php 
session_start(); 
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
<?php include('/opt/lampp/htdocs/db-13151/includes/header.php')?>

<h2 align="center">Please Select Customer</h2>



<div class = "container">
	<table class="table table-striped">
		<thead>
			<tr>
				<th>CID</th>
				<th>Shop Name</th>
				<th>Customer Name</th>
				<th>Customer Number</th>
				<th>Address</th>
				<th>Area</th>
				<th>Geo-Cord</th>
			</tr>
		</thead>
		<tbody>
		<?php 
			include '/opt/lampp/htdocs/db-13151/db_connection.php';
    		$conn = OpenCon();    
    		$sql = "SELECT * FROM customer_13151";  
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
      			<td>" . $row['Geo_Cord'] . "</td>
      			<td><a href='salesreturn_create.php?Customer=$row[CID]' class='btn btn-primary' role='button'>Select Customer</a>
            	</td>
      		</tr>";
   			}
   			CloseCon($conn);
		 ?>
		</tbody>
	</table>
</div>







</body>
</html>

