<?php
	session_start(); 

if ($_SESSION["user"]) {
 	$user = $_SESSION["user"];	 	
}
else {
	header("refresh:0; url=index.php");
}

?>

<!DOCTYPE html>
<html>
<head>
<style>


.h2{
    padding-right: 10px; 
}

.column {
    float: left;
    width: 30%;
    margin-bottom: 16px;
    padding: 0 8px;
}

/* Display the columns below each other instead of side by side on small screens */
@media screen and (max-width: 650px) {
    .column {
        width: 100%;
        display: block;
    }
}

/* Add some shadows to create a card effect */
.card {
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
}

.cover {
    position: relative;
}


.card:hover {
   box-shadow:  0 0 0 1px
}

/* Some left and right padding inside the container */
/*
.container {
    padding: 0 16px;
}*/

/* Clear floats */
.container::after, .row::after {
    content: "";
    clear: both;
    display: table;
}

.title {
    color: grey;
}

.button {
    border: none;
    outline: 0;
    display: inline-block;
    padding: 8px;
    color: white;
    background-color: #000;
    text-align: center;
    cursor: pointer;
    width: 100%;
}

.button:hover {
    background-color: #555;
}
</style>
</head>

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

    $query=$conn -> query('select CID,Customer_Name from customer_13151');
        $rowCount=$query->num_rows;
        $cids = array();
        $names = array();

        if($rowCount > 0){
            while($row=$query->fetch_assoc()){
                $cids[] = $row['CID'];
                $names[] = $row['Customer_Name'];
         	}
    	}

    CloseCon($conn);
?>

<?php 

    include('/opt/lampp/htdocs/db-13151/vendor/autoload.php');
    $client = new MongoDB\Client;
    $db = $client->customer;
    $coll = $db->surveyresponse;

    $documentlist = $coll->find();

 ?>


<div  class="container">
	
	<h2>Web Survey Form</h2>
	<br>
	<br>
	<form action="uploadsurvey.php" method="post" class="form-vertical" text-align="center" enctype="multipart/form-data">
    	<div>
    		<h5>Select Customer</h5>
        	<select name="Customer" id="Customer"> 
            	<option value="">Select Customer</option>
              		<?php  
              			$space = ' - ';
              			for ($i=0; $i < sizeof($cids) ; $i++) { 
                 		echo '<option>'. $cids[$i].$space.$names[$i].'</option>';
               			} 
            		?>
    		</select>	
    	</div>
    	<div>
    		<br>
    		<h5>Are my products available?</h5>
    		<input type="radio" name="ans1"
				<?php if (isset($ans1) && $ans1=="Yes") echo "checked";?> value="Yes" required> Yes
			<input type="radio" name="ans1"
				<?php if (isset($ans1) && $ans1=="No") echo "checked";?> value="No"> No
    	</div>
    	<div>
    		<br>
    		<h5>Are my products positioned in the front?</h5>
    		<input type="radio" name="ans2"
				<?php if (isset($ans2) && $ans2=="Yes") echo "checked";?> value="Yes" required> Yes
			<input type="radio" name="ans2"
				<?php if (isset($ans2) && $ans2=="No") echo "checked";?> value="No"> No
    	</div>
    	<div>
    		<br>
    		<h5>Are competitor products more prominent?</h5>
    		<input type="radio" name="ans3"
				<?php if (isset($ans3) && $ans3=="Yes") echo "checked";?> value="Yes" required> Yes
			<input type="radio" name="ans3"
				<?php if (isset($ans3) && $ans3=="No") echo "checked";?> value="No"> No
    	</div>
    	<div>
    		<br>
    		Latitude = <input type="text" name="lat" id="lat" value="" required readonly>
    		<br>
    		Longitude = <input type="text" name="long" id="long" value="" required readonly>
    		
    	</div>
    	<div>
    		<br>
    			<input type="file" name="file" required>
    			<br>
    			<button type="submit" name="submit">Submit</button>
    	</div>
	</form>
</div>

<br>

<div class="container">
    <h2>Field Survey Responses</h2>    
</div>

<br>
<div class="container">
<div class='row'>

   <?php 
   $i = 0;
    foreach ($documentlist as $doc) {
        try{

        $cid = $doc["id"];
        $cname = $doc["name"];
        $Q1 = $doc["Q1"];
        $Q2 = $doc["Q2"];
        $Q3 = $doc["Q3"];
       // $lat = $doc["Latitude"];
       // $long = $doc["Longitude"];
        $datetime = $doc["Date/Time"];
        $Image = 'opt/htdocs/lampp/db-13151/FieldSurvey/uploads/'.$doc["Image"];
        $name = $doc["Image"];

        echo "<div class='column'>";
        echo "<div class='card'>";
        echo '<img src="uploads/'.$name.'" width=100% height=200 >';
        echo "<div class='container'>";
        echo "<h2>".$cname."-".$cid."</h2>";
        echo "<p class='title'>Field Survey</p>";
        echo "<p>".$datetime."</p>";
        echo "<p>Q1 = ".$Q1." Q2 = ".$Q2." Q3 = ".$Q3." </p>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        $i++;


        }
        catch (exception $e) {
            echo "<script>";
            echo "alert($e)";
            echo "</script>";
        }
        
    }
?> 
</div>
</div>


</body>
</html>
<script>

document.addEventListener('DOMContentLoaded', function() {
   	 if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    	} else {
       	 
    	}

}, false);

function showPosition(position) {
    
    var x = document.getElementById('lat');
    var y = document.getElementById('long');

   	x.value = position.coords.latitude;
	y.value = position.coords.longitude;
    
}
</script>

