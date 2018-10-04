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
 <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<?php include('/opt/lampp/htdocs/db-13151/includes/header.php')?>


<div class = "container">
  <h2>Product List</h2> <a href="product_create.php" class="btn btn-info" role="button">New Product</a>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Product Code</th>
        <th>Brand</th>
        <th>Type</th>
        <th>Shade</th>
        <th>Size</th>
        <th>Sales Price</th>
      </tr>
    </thead>
    <tbody>
    <?php 
      include '/opt/lampp/htdocs/db-13151/db_connection.php';
        $conn = OpenCon();    
        $sql = "SELECT * FROM product_13151";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_array($result)) {
          echo 
      "<tr>
            <td>" . $row['ProductCode'] . "</td>
            <td>" . $row['Brand'] . "</td>
            <td>" . $row['Type'] . "</td>
            <td>" . $row['Shade'] . "</td>
            <td>" . $row['Size'] . "</td>
            <td>" . $row['SalesPrice'] . "</td>
            <td><a href='product_retrieve.php?search=$row[ProductCode]' class='btn btn-primary' role='button'>edit</a>
            <span>/</span>
              <a href='remove.php?delete=$row[ProductCode]' class = 'btn btn-danger btn-sm'>
              <span class = 'glyphicon glyphicon-trash'></span>
              delete</a></td>
          </tr>";
        }
        CloseCon($conn);
     ?>
    </tbody>
  </table>
</div>



</body>
</html>