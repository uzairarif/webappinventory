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
  $result = mysqli_query($conn, "SELECT * FROM user_13151 ORDER BY UID DESC LIMIT 1");
  $row = mysqli_fetch_array($result);
 ?>


<div class="container">
    <div class="row">
      <div class="col-xs-12">
        <h2>New User Admin</h2>
          <p>To create new customer or salesperson please go to the respective menu using nav bar</p>
          <form action="newuserinsert.php" method="post" class="form-vertical">
             <br>

            <div class="form-group">
                <label for="new_user_id" class="col-sm-2  control-label">User ID</label>
                <input type="text" name="new_user_id" value="<?php echo $row[0]+1; ?>" readonly/>
            </div>

            <div class="form-group">
                <label for="p1" class="col-sm-2 control-label">Password</label>
                <input type="password" name="p1" required/>
            </div>

            <div class="form-group">
                <label for="p2" class="col-sm-2 control-label">Re Type Password</label>
                <input type="password" name="p2" required/>
            </div>

           
            <input type="submit" name="submit" value="submit" />



          </form>
      </div>
    </div>
</div>


<script>
  $('#p1, #p2').on('keyup', function () {
    if ($('#p1').val() == $('#p2').val()) {
      $('#message').html('Matching').css('color', 'green');
    } else 
      $('#message').html('Not Matching').css('color', 'red');
  });


</script>

</body>
</html>