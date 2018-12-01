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
	<h2>Payments List</h2> <a href="payment_create.php" class="btn btn-info" role="button">New Payment</a>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Payment ID</th>
				<th>Customer ID</th>
				<th>Cash</th>
				<th>Amount</th>
				<th>Date</th>
			</tr>
		</thead>
		<tbody>
		<?php 
			include '/opt/lampp/htdocs/db-13151/db_connection.php';
    		$conn = OpenCon();    
    		
          $sql = "SELECT * FROM payments_13151";  
        

        $result = mysqli_query($conn, $sql);

    	while($row = mysqli_fetch_array($result)) {
        	echo 
		 	"<tr>
        		<td>" . $row['pp_id'] . "</td>
        		<td>" . $row['CID'] . "</td>
        		<td>" . $row['cash'] . "</td>
        		<td>" . $row['amount'] . "</td>
        		<td>" . $row['pdate'] . "</td>
      			<td><a href='payment_retrieve.php?search=$row[pp_id]' class='btn btn-primary' role='button'>edit</a>
      			<span>/</span>
            	<a href='remove.php?delete=$row[pp_id]' class = 'btn btn-danger btn-sm'>
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