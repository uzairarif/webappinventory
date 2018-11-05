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
                <label for="shop_name" class="col-sm-2  control-label">Shop Name</label>
                <input type="text" name="shop_name" required/>
            </div>

            <div class="form-group">
                <label for="customer_name" class="col-sm-2 control-label">Customer Name</label>
                <input type="text" name="customer_name" required/>
            </div>

            <div class="form-group">
                <label for="customer_num" class="col-sm-2 control-label">Customer Number</label>
                <input type="text" name="customer_num" required/>
            </div>

            <div class="form-group">
                <label for="Address" class="col-sm-2 control-label">Address</label>
                <input type="text" name="address" required/>
            </div>

            <div class="form-group">
                <label for="Area" class="col-sm-2 control-label">Area</label>
                <input type="text" name="area"required/>
            </div>

            <div class="form-group">
                <label for="Geo_Cord" class="col-sm-2 control-label">Geo-Cord</label>
                <input type="text" name="Geo_Cord"required/>
            </div>

            <div class="form-group">
                <label for="SP" class="col-sm-2 control-label">Sales Person</label>
                <input type="text" name="SP" value="<?php 
                    if($issalesperson){echo $user[0];}
                  ?>"
                  />
            </div>

            <input type="submit" name="submit" value="submit" />



          </form>

            <p>Note: If a sales person is not decided please input 0 in the salesperson input field</p>
           
      </div>

    </div>


</div>


</body>
</html>