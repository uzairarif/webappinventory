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
        $uid = $_GET['search'];
        $result = mysqli_query($conn, "SELECT * FROM user_13151 WHERE UID = '$uid'");
        $result2 = mysqli_query($conn, "SELECT * FROM salesperson_13151 WHERE SID = '$uid'");
        $row = mysqli_fetch_array($result);
        $row2 = mysqli_fetch_array($result2);
    }



?>

<div class="container">
    <div class="row">
      <div class="col-xs-12">
        <h2>Update Record</h2>
          <form action="update.php" method="post" class="form-vertical">
             <br>

            <div class="form-group">
                <label for="uid" class="col-sm-2  control-label">User ID</label>
                <input type="text" name="uid" value = "<?php echo $row[0] ?>"/>
            </div>

            <div class="form-group">
                <label for="name" class="col-sm-2  control-label">Name</label>
                <input type="text" name="nname" value = "<?php echo $row2[1] ?>"/>
            </div>

            <div class="form-group">
                <label for="num" class="col-sm-2 control-label">Number</label>
                <input type="text" name="nnum" value = "<?php echo $row2[2] ?>"/>
            </div>

            <div class="form-group">
                <label for="active" class="col-sm-2 control-label">Active</label>
                <input type="text" name="nactive" value = "<?php echo $row[2] ?>"/>
            </div>


            <div class="form-group">
                <label for="password" class="col-sm-2 control-label">Password</label>
                <input type="text" name="npass" value = "<?php echo $row[1] ?>"/>
            </div>



           
            <input type="submit" name="update" value="update" />



          </form>
      </div>

    </div>


</div>


</body>
</html>