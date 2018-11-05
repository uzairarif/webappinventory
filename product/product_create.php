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

<?php include('/opt/lampp/htdocs/db-13151/includes/header.php')?>

<div class="container">
    <div class="row">
      <div class="col-xs-12">
        <h2>New Product</h2>
          <form action="insert.php" method="post" class="form-vertical">
             <br>

            <div class="form-group">
                <label for="ProductCode" class="col-sm-2  control-label">Product Code</label>
                <input type="text" name="ProductCode" required/>
            </div>

            <div class="form-group">
                <label for="Brand" class="col-sm-2 control-label">Brand</label>
                <input type="text" name="Brand" required/>
            </div>

            <div class="form-group">
                <label for="Type" class="col-sm-2 control-label">Type</label>
                <input type="text" name="Type" required/>
            </div>

            <div class="form-group">
                <label for="Shade" class="col-sm-2 control-label">Shade</label>
                <input type="text" name="Shade" required/>
            </div>

            <div class="form-group">
                <label for="Size" class="col-sm-2 control-label">Size</label>
                <input type="text" name="Size" required/>
            </div>

            <div class="form-group">
                <label for="SalesPrice" class="col-sm-2 control-label">Sales Price</label>
                <input type="text" name="SalesPrice" required/>
            </div>

           
            <input type="submit" name="submit" value="submit" />



          </form>
      </div>

    </div>


</div>


</body>
</html>