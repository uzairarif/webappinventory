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
	<h2>Sales Orders List</h2> <a href="salesorder_create.php" class="btn btn-info" role="button">New Order</a>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Order No</th>
				<th>Customer Id</th>
				<th>Date Time</th>
				<th>Sales Person ID</th>
				<th>Billed Amount</th>
			</tr>
		</thead>
		<tbody>
		<?php 
			include '/opt/lampp/htdocs/db-13151/db_connection.php';
    		$conn = OpenCon();    
    		
        if($issalesperson){
          $sql = "SELECT * FROM salesorder_13151 WHERE salesperson_id='$user[0]'";
        }
        else {
          $sql = "SELECT * FROM salesorder_13151";  
        }

        $result = mysqli_query($conn, $sql);

    	while($row = mysqli_fetch_array($result)) {
        	echo 
		 	"<tr>
        		<td>" . $row['order_num'] . "</td>
        		<td>" . $row['customer_id'] . "</td>
        		<td>" . $row['date_time'] . "</td>
        		<td>" . $row['salesperson_id'] . "</td>
        		<td>" . $row['billed_amount'] . "</td>
      			<td><a href='#' class='btn btn-primary' role='button'>View Details</a>
      			<span>/</span>
            	<a href='#' class = 'btn btn-danger btn-sm'>
            	PDF</a></td>
      		</tr>";
   			}
   			CloseCon($conn);
		 ?>
		</tbody>
	</table>
</div>



</body>
</html>