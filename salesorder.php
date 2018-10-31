<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php 
		include 'theme.php';
	 ?>
   <table id = "myTable" class="table table-bordered table-responsive-md table-striped text-center">
        <tr>
          <th class="text-center">ID</th>
          <th class="text-center">shop Name</th>
          <th class="text-center">Customer</th>
          <th class="text-center">Cell No</th>
          <th class="text-center">Address</th>
          <th class="text-center">Area</th>
          <th class="text-center">Country</th>
        </tr>
        <tr><td>
        <div class="form-group">
            <select class="form-control" name="asID">
        <option disabled="" selected="" value="">ID</option> 
                        <?php
                       include 'connection.php';
                        $conn = OpenCon();
                        $result2 = mysqli_query($conn, "SELECT * FROM customers13142");
                        while($row2 = mysqli_fetch_array($result2)) 
                        {
                          echo "<option value = '{$row2['CusID'] }'";
                          echo ">{$row2['CusID'] } - {$row2['CName'] }</option>";
                        }
                      ?> 
            </select>
          </div>
          </td>
            <td>
        <div class="form-group">
            <select class="form-control" name="asName">
        <option disabled="" selected="" value="">ID</option> 
                        <?php
                       
                        while($row3 = mysqli_fetch_array($result2)) 
                        {
                          echo "<option value = '{$row3['CusID'] }'";
                          echo ">{$row3['CusID'] } - {$row3['SName'] }</option>";
                        }
                      ?>
            </select>
          </div>
          </td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr> 
        <?php


      ?>
      </table>

<div class="card">
  <h3 class="card-header text-center font-weight-bold text-uppercase py-4">Editable table</h3>
  <div class="card-body">
    <div id="table" class="table-editable">
      <span class="table-add float-right mb-3 mr-2"><a href="#!" class="text-success"><i class="fa fa-plus fa-2x"
            aria-hidden="true"></i></a></span>
      <table id = "myTable" class="table table-bordered table-responsive-md table-striped text-center">
        <tr>
          <th class="text-center">Order No</th>
          <th class="text-center">Customer</th>
          <th class="text-center">Date</th>
          <th class="text-center">Sales Person</th>
          <th class="text-center">Product</th>
          <th class="text-center">Quantity</th>
          <th class="text-center">Rate</th>
          <th class="text-center">Amount</th>
          <th class="text-center">Button</th>
        </tr>
        <?php 
      include 'connection.php';
    //  $conn = OpenCon();
      $sql = "SELECT * FROM salesorder_13142";    
      $result = mysqli_query($conn, $sql);
      while($row = mysqli_fetch_array($result)) 
      {
        $pro = $row['product'];
        $product  = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM product_13142 WHERE ProductCode = '$pro'"));
        echo "<tr>";
        echo "<td class='pt-3-half' contenteditable='true'>".$row['orderNo']."</td>";
        echo "<td class='pt-3-half' contenteditable='true'>".$row['orderNo']."</td>";
        echo "<td class='pt-3-half' contenteditable='true'>".$row['orderdate']."</td>";
        echo "<td class='pt-3-half' contenteditable='true'>".$row['orderNo']."</td>";
        echo "<td class='pt-3-half' contenteditable='true'>".$product['Brand']." - ".$product['Type']."</td>";
        echo "<td class='pt-3-half' contenteditable='true'>".$row['quantity']."</td>";
        echo "<td class='pt-3-half' contenteditable='true'>".$row['rate']."</td>";
        echo "<td class='pt-3-half' contenteditable='true'>".$row['amount']."</td>";
        echo "<td>
             <span class='table-edit'><button type='button' class='btn btn-dark btn-rounded btn-sm my-0'>Edit</button></span>
            <span class='table-remove'><button type='button' class='btn btn-danger btn-rounded btn-sm my-0'>Remove</button></span>
          </td>";
        echo "</tr>";
      } 
      ?>
        <tr>
          <td class="pt-3-half" contenteditable="true">Aurelia Vega</td>
          <td class="pt-3-half" contenteditable="true">30</td>
          <td class="pt-3-half" contenteditable="true">Deepends</td>
          <td class="pt-3-half" contenteditable="true">Spain</td>
          <td class="pt-3-half" contenteditable="true">Madrid</td>
          <td class="pt-3-half" contenteditable="true">Aurelia Vega</td>
          <td class="pt-3-half" contenteditable="true">30</td>
          <td class="pt-3-half" contenteditable="true">Deepends</td>
          <td>
             <span class="table-edit"><button type="button" class="btn btn-dark btn-rounded btn-sm my-0">Edit</button></span>
            <span class="table-remove"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0">Remove</button></span>
          </td>
          </tr>

            <tr>
          <td class="pt-3-half" contenteditable="true"></td>
          <td class="pt-3-half" contenteditable="true"></td>
          <td class="pt-3-half" contenteditable="true"></td>
          <td class="pt-3-half" contenteditable="true"></td>
          <td> 
            <select class="form-control" id = "assigned" name="assigned" onchange='changeAction(this.value)'>
            <option disabled="" selected="" value="">Assign Salesperson</option> 
                        <?php
                       //include 'connection.php';
                        //$conn = OpenCon();    
                        
                        $result1 = mysqli_query($conn, "SELECT * FROM product_13142 ");
                        while($row1 = mysqli_fetch_array($result1)) 
                        {
                          echo "<option value = '{$row1['ProductCode'] }'";
                          echo ">{$row1['ProductCode'] } - {$row1['Brand'] }</option>";
                        }
                      ?>
            </select>

          </td>
          <td class="pt-3-half" contenteditable="true">1</td>
          <td class="pt-3-half" contenteditable="true"></td>
          <td class="pt-3-half" contenteditable="true"></td>
          <td>
            <span class="table-add"><button id ="addButton" type="button" class="btn btn-primary btn-rounded btn-sm my-0">Add</button></span>
          </td>
        </tr>
      </table>
    </div>
  </div>
</div>
<script type="text/javascript">
var pval;
function changeAction(val){
  pval = val;

var table = document.getElementById('myTable');
var quan = table.rows[table.rows.length-1].cells[5].innerHTML;
var utc = new Date().toJSON().slice(0,10).replace(/-/g,'/');
    $.ajax({
      url:"searchProduct.php",
      type:"POST",
      data:{c1:val
       
      },
      success:function(data){
        table.rows[table.rows.length-1].cells[0].innerHTML = "OrderNo";
        table.rows[table.rows.length-1].cells[1].innerHTML = "Customer";
        table.rows[table.rows.length-1].cells[2].innerHTML = utc;
        table.rows[table.rows.length-1].cells[3].innerHTML = "SalesPerson";
        // table.rows[table.rows.length-1].cells[4].innerHTML = val;
        table.rows[table.rows.length-1].cells[6].innerHTML = data[5];
        table.rows[table.rows.length-1].cells[7].innerHTML = data[5]*quan; 
      },
          dataType:"json"
    });  
}

var $TABLE = $('#table');
var $BTN = $('#export-btn');
var $EXPORT = $('#export');

$('.table-add').click(function () {
    
var table = document.getElementById('myTable');
var row = table.rows[table.rows.length-1];
var utc = new Date().toJSON().slice(0,10).replace(/-/g,'/');
    $.ajax({
      url:"insertSalesOrder.php",
      type:"POST",
      data:{
      
        c2: row.cells[1].innerHTML,
        c3: row.cells[2].innerHTML,
        c4: row.cells[3].innerHTML,
        c5: pval,
        c6: row.cells[5].innerHTML,
        c7: row.cells[6].innerHTML,
        c8:row.cells[5].innerHTML * row.cells[6].innerHTML
      },
      success:function(data){
       
        
      },
          
    });
});

$('.table-remove').click(function () {
var row = $(this).closest("tr");
var c1 = row.find('td:eq(0)').text();
    $.ajax({
      url:"show.php",
      type:"POST",
      data:{c1:c1,
      },
      success:function(data,status){
        
      },

    });
  
});

$('.table-up').click(function () {
var $row = $(this).parents('tr');
if ($row.index() === 1) return; // Don't go above the header
$row.prev().before($row.get(0));
});

$('.table-down').click(function () {
var $row = $(this).parents('tr');
$row.next().after($row.get(0));
});

// A few jQuery helpers for exporting only
jQuery.fn.pop = [].pop;
jQuery.fn.shift = [].shift;

$BTN.click(function () {
  alert("lkdjsf");
var $rows = $TABLE.find('tr:not(:hidden)');
var headers = [];
var data = [];

// Get the headers (add special header logic here)
$($rows.shift()).find('th:not(:empty)').each(function () {
headers.push($(this).text().toLowerCase());
});

// Turn all existing rows into a loopable array
$rows.each(function () {
var $td = $(this).find('td');
var h = {};

// Use the headers from earlier to name our hash keys
headers.forEach(function (header, i) {
h[header] = $td.eq(i).text();
});

data.push(h);
});

// Output the result
$EXPORT.text(JSON.stringify(data));
});


</script>
</body>
</html>