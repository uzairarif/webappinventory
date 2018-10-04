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

<?php
    include '/opt/lampp/htdocs/db-13151/db_connection.php';
    $conn = OpenCon();

    if(isset($_GET['search'])) {
        $PC = $_GET['search'];
        $result = mysqli_query($conn, "SELECT * FROM product_13151 WHERE ProductCode = '$PC'");
        $row = mysqli_fetch_array($result);
    }



?>

<div class="container">
    <div class="row">
      <div class="col-xs-12">
        <h2>Update Product Record</h2>
          <form action="update.php" method="post" class="form-vertical">
             <br>

            <div class="form-group">
                <label for="ProductCode" class="col-sm-2  control-label">Product Code</label>
                <input type="text" name="npc" value="<?php echo $row[0]; ?>" />
            </div>


            <div class="form-group">
                <label for="Brand" class="col-sm-2  control-label">Brand</label>
                <input type="text" name="nbrand" value="<?php echo $row[1]; ?>" />
            </div>

            <div class="form-group">
                <label for="Type" class="col-sm-2 control-label">Type</label>
                <input type="text" name="ntype" value="<?php echo $row[2]; ?>"/>
            </div>

            <div class="form-group">
                <label for="Shade" class="col-sm-2 control-label">Shade</label>
                <input type="text" name="nshade" value="<?php echo $row[3]; ?>" />
            </div>

            <div class="form-group">
                <label for="Size" class="col-sm-2 control-label">Size</label>
                <input type="text" name="nsize" value="<?php echo $row[4]; ?>" />
            </div>

            <div class="form-group">
                <label for="SalesPrice" class="col-sm-2 control-label">Sales Price</label>
                <input type="text" name="nsp" value="<?php echo $row[5]; ?>" />
            </div>

           
            <input type="submit" name="update" value="update" />



          </form>
      </div>

    </div>


</div>


</body>
</html>