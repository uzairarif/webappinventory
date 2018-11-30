<?php 
session_start(); 
$user = $_SESSION["user"];

?>
<!DOCTYPE html>
<html>
<head>
<style>


#myInput {
  background-image: url('/css/searchicon.png');
  background-position: 10px 12px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}

#myUL {
  list-style-type: none;
  padding: 0;
  margin: 0;
}

#myUL li a {
  border: 1px solid #ddd;
  margin-top: -1px; /* Prevent double borders */
  background-color: #f6f6f6;
  padding: 12px;
  text-decoration: none;
  font-size: 18px;
  color: black;
  display: block
}

#myUL li a:hover:not(.header) {
  background-color: #eee;
}
</style>
</head>
<body>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<?php include('/opt/lampp/htdocs/db-13151/includes/header.php')?>

<?php 
	include '/opt/lampp/htdocs/db-13151/db_connection.php';
    $conn = OpenCon();    
    $sql = "SELECT * FROM customer_13151";  
    $result = mysqli_query($conn, $sql);


?>

<h2 align="center">Please Search for a Customer</h2>
<!-- 
<div class="test">
	<div class="container">
	<div class="dropdown">
		<button onclick="myFunction()" class="dropbtn">Click Me</button>
  	<div id="myDropdown" class="dropdown-content">
    	<input type="text" placeholder="Search.." id="myInput" onkeyup="filterFunction()">
    	
		<?php 

		/*while($row = mysqli_fetch_array($result)) {
        	$opt = $row['CID'].' - '.$row['Customer_Name'];
        	$a = "<a href='salesorder_create.php?Customer=$row[CID]'>".$opt."</a>";
        	echo $a;

        }
*/
		 ?>

  	</div>
	</div>	
	</div>
	
</div> -->

<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for Customer" title="Type in a name">

<ul id="myUL">
  
	<?php 

		while($row = mysqli_fetch_array($result)) {
        	$opt = $row['CID'].' - '.$row['Customer_Name'];
        	$a = "<li><a href='salesreturn_create.php?Customer=$row[CID]'>".$opt."</a></li>";
        	echo $a;

        }

	?>

</ul>







<!-- 
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
			</tr>
		</thead>
		<tbody>
		<?php 
		/*	include '/opt/lampp/htdocs/db-13151/db_connection.php';
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
      			<td><a href='salesorder_create.php?Customer=$row[CID]' class='btn btn-primary' role='button'>Select Customer</a>
            	</td>
      		</tr>";
   			}
   			CloseCon($conn);*/
		 ?>
		</tbody>
	</table>
</div>
 -->
<script>
/* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
function myFunction() {
    var input, filter, ul, li, a, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    ul = document.getElementById("myUL");
    li = ul.getElementsByTagName("li");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        txtValue = a.textContent || a.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
}
</script>




</body>
</html>

