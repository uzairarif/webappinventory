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

<?php include('/opt/lampp/htdocs/db-13151/includes/header.php')?>

<div class="container">
    <div class="row">
      <div class="col-xs-12">
        <h2>New Customer</h2>
          <form action="insert.php" method="post" class="form-vertical">
             <br>
            <div class="form-group">
                <label for="CID" class="col-sm-2 control-label">Customer ID</label>
                <input type="text" name="CID" required/>
            </div>

            <div class="form-group">
                <label for="cash" class="col-sm-2 control-label">Cash</label>
                <input type="number" name="cash" required/>
            </div>

            <div class="form-group">
                <label for="amount" class="col-sm-2 control-label">Amount</label>
                <input type="number" name="amount" required/>
            </div>

            <input type="submit" name="submit" value="submit" />



          </form>
           
      </div>

    </div>


</div>


</body>
</html>