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

<?php 
	if (isset($_GET['flag'])){
		$flag = $_GET['flag'];

		if ($flag == 1){
			echo "<script>";
			echo "alert('Wrong Id or Password')";
			echo "</script>";
		}

	}
 ?>

<div class="container">
		<div class="row">
			<div class="col-lg-4 col-xs-offset-4">
				<form action="session.php" method="POST">
					<div class="panel-body">
						<h1>Reliance paints</h1>
						<h3>Please enter your credentials</h3>
						<div class="form-group">
							<label>ID</label>
							<input type="text" name="txtID" class="form-control">
						</div>
						<div class="form-group">
							<label>Password</label>
							<input type="password" name="txtPass" class="form-control">
						</div>
						<div class="form-group">
						<input type="submit" name="btnSubmit" class="form-control btn btn-success">
						</div>
					</div>
				</form>
			</div>
		</div>
</div>

</body>
</html>