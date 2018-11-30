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
        $cid = $_GET['search'];
        $result = mysqli_query($conn, "SELECT * FROM customer_13151 WHERE CID = '$cid'");
        $row = mysqli_fetch_array($result);
    }



?>

<div class="container">
    <div class="row">
      <div class="col-xs-12">
        <h2>Update Customer Record</h2>
          <form action="update.php" method="post" class="form-vertical">
             <br>

            <div class="form-group">
                <label for="CID" class="col-sm-2  control-label">CID</label>
                <input type="text" name="cid" value="<?php echo $row[0]; ?>" />
            </div>


            <div class="form-group">
                <label for="shop_name" class="col-sm-2  control-label">Shop Name</label>
                <input type="text" name="nshop_name" value="<?php echo $row[1]; ?>" />
            </div>

            <div class="form-group">
                <label for="customer_name" class="col-sm-2 control-label">Customer Name</label>
                <input type="text" name="ncustomer_name" value="<?php echo $row[2]; ?>"/>
            </div>

            <div class="form-group">
                <label for="customer_num" class="col-sm-2 control-label">Customer Number</label>
                <input type="text" name="ncustomer_num" value="<?php echo $row[3]; ?>" />
            </div>

            <div class="form-group">
                <label for="Address" class="col-sm-2 control-label">Address</label>
                <input type="text" name="naddress" value="<?php echo $row[4]; ?>" />
            </div>

            <div class="form-group">
                <label for="Area" class="col-sm-2 control-label">Area</label>
                <input type="text" name="narea" value="<?php echo $row[5]; ?>" />
            </div>

            <div class="form-group">
                <label for="Geo_Cord" class="col-sm-2 control-label">Country</label>
                <input type="text" name="ncountry" value="<?php echo $row[6]; ?>" />
            </div>

           
            <input type="submit" name="update" value="update" />



          </form>
      </div>

    </div>


</div>


</body>
</html>