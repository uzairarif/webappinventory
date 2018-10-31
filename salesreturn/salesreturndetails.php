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


<?php 
    
    include '/opt/lampp/htdocs/db-13151/db_connection.php';
    $conn = OpenCon();

    if(isset($_GET['returnnum'])) {
        $returnnum = $_GET['returnnum'];
        $result = mysqli_query($conn, "SELECT * FROM salesreturn_details13151 WHERE return_num = '$returnnum'");
        $result2 = mysqli_query($conn, "SELECT billed_amount FROM salesreturn_13151 WHERE return_num = '$returnnum'");

        $row2 = mysqli_fetch_array($result2);
    }

    CloseCon($conn);

?>

<div class = "container">
	<h2>Sales Return Details</h2> 
    <h3>Order No = <?php echo $returnnum ?></h3>
	<table class="table table-striped">
		<thead>
			<tr>
				<th class="text-center">Product Id</th>   
				<th class="text-center">Quantity</th>
				<th class="text-center">Rate</th>
				<th class="text-center">Amount</th>
			</tr>
		</thead>
		<tbody>
		<?php 

    	while($row = mysqli_fetch_array($result)) {
        	echo 
		 	"<tr>
        		<td class='pt-3-half text-center col-sm-1'>" . $row['product_id'] . "</td>
        		<td class='pt-3-half text-center col-sm-1'>" . $row['quantity'] . "</td>
        		<td class='pt-3-half text-center col-sm-1'>" . $row['rate'] . "</td>
        		<td class='pt-3-half text-center col-sm-1'>" . $row['amount'] . "</td>
      </tr>";
   			}
		 ?>
      <td>Billed Amount = <?php echo $row2[0]; ?></td>
		</tbody>
	</table>
</div>



</body>
</html>