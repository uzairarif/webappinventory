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

<?php include('includes/header.php')?>

<div class=col-xs-offset-4>
<h2>Welcome <?php 
	if ($user[3] == 2){
		$userdet = $_SESSION["userdet"];
		echo $userdet[1];
	}
	else {
		echo "Admin";
	}
 ?></h2>
	
	
</div>











</body>
</html>