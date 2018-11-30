<?php session_start(); 
$user = $_SESSION["user"];
$count = 1;
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

    if(isset($_GET['Customer'])) {
        $cid = $_GET['Customer'];
        $result = mysqli_query($conn, "SELECT * FROM customer_13151 WHERE CID = '$cid'");
        $customerrow = mysqli_fetch_array($result);
    }

      $i = 0;
        $query=$conn -> query('select distinct Brand from product_13151 ORDER BY Brand');
        $rowCount=$query->num_rows;
        $branddatas = array();
        if($rowCount > 0){
            while($row=$query->fetch_assoc()){
                  $branddatas[] = $row['Brand'];
                  $i++;
                }
              }


       // echo "<script type='text/javascript'>alert('$message');</script>";

        $query3=$conn -> query('select distinct Size from product_13151');
        $rowCount3=$query3->num_rows;

        $sizedatas = array();
        if($rowCount3 > 0){
                  while($row=$query3->fetch_assoc()){
                    $sizedatas[]=$row['Size'];
                  }
                }

      $result4 = mysqli_query($conn, "SELECT * FROM salesorder2_13151 ORDER BY order_num DESC LIMIT 1");
      $row4 = mysqli_fetch_array($result4);

?>


<div class="container">
<h1 align="center">SALES ORDER</h1>  

<!-- Customer information -->
  
<div class="card">
  <h3 class="card-header text-center font-weight-bold text-uppercase py-4">Customer Information</h3>
  <div class="card-body">
    <div id="table" class="table-editable">
      <span class="table-add float-right mb-3 mr-2"><a href="#!" class="text-success"><i class="fa fa-plus fa-2x"
            aria-hidden="true"></i></a></span>
      <table class="table table-bordered table-responsive-md table-striped text-center">
        <tr>
          <th class="text-center">Order Number</th>
          <th class="text-center">Customer Id</th>
          <th class="text-center">C Name</th>
          <th class="text-center">Shop Name</th>
          <th class="text-center">Customer Number</th>
          <th class="text-center">Address</th>
          <th class="text-center">Salesperson</th>
          <th class="text-center">Salesperson ID</th>
        </tr>
        <tr>
          <td class="pt-3-half"><?php echo $row4[0]+1; ?></td>
          <td class="pt-3-half"><?php echo $customerrow[0]; ?></td>
          <td class="pt-3-half"><?php echo $customerrow[2]; ?></td>
          <td class="pt-3-half"><?php echo $customerrow[1]; ?></td>
          <td class="pt-3-half"><?php echo $customerrow[3]; ?></td>
          <td class="pt-3-half"><?php echo $customerrow[4]; ?></td>
          <td class="pt-3-half">Admin</td>
          <td class="pt-3-half">1</td>
        </tr>
      </table>
    </div>
  </div>
</div>

  
  <!-- Order details -->
<?php include('/opt/lampp/htdocs/db-13151/sales/salesordertable.php')?>


<?php include('/opt/lampp/htdocs/db-13151/sales/salesmanipulate.php')?>



</body>
</html>
