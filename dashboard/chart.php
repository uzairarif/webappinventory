<!DOCTYPE html>
<html>
<head>
<style>
	.test{
 		position: absolute;
		left: 45px;
		top: 280px;
 		}	
	.test1{
		width: 400px;
		height: 225px;
		position: absolute;
		left: 45px;
		top: 70px;
	}
	.test2{
		position: absolute;
		left: 470px;
		top: 50px;
	}
	.test3{
		position: absolute;
		left: 980px;
		top: 60px;
	}
	.test4{
		
		position: absolute;
		left: 740px;
		top: 360px;
	}
	
</style>
</head>
<body>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<?php include('/opt/lampp/htdocs/db-13151/includes/header.php')?>
<?php  
	include '/opt/lampp/htdocs/db-13151/db_connection.php';
    $conn = OpenCon();    
    $i = 1;
    $a = 'a';
    $b = 'b';
    $c = 'c';
    $p = 'p';
    $sql = "SELECT customer_id, COUNT(*) FROM salesorder2_13151 GROUP BY customer_id ORDER BY COUNT(*) DESC LIMIT 5";
    $result = mysqli_query($conn, $sql);
    $res = array();
    
    while($row = mysqli_fetch_array($result)) {
    	$res[$a.$i] = $row[0];
    	$res[$b.$i] = $row[1];
    	

    	$i++;
    }

    $sql2 = "SELECT YEAR(date) A,MONTH(date) B,COUNT(*) FROM `salesorder2_13151` WHERE YEAR(date) > '2012' GROUP BY A,B ORDER BY A,B";
    $res2 = array();
 	$result2 = mysqli_query($conn, $sql2);
 	
	while($row2 = mysqli_fetch_array($result2)) {
    	$y = (string) $row2[0];
    	$m = (string) $row2[1];
    	$k =  $y." ".$m;
    	$res2[$k] = $row2[2]; 	
    } 	
    
    $sql3 = "SELECT YEAR(date) A, SUM(amount) FROM salesorder2_13151,salesorder2_details13151 WHERE salesorder2_13151.order_num = salesorder2_details13151.order_num AND YEAR(date) > '2012' GROUP BY A";
    $res3 = array();
	  $result3 = mysqli_query($conn, $sql3);
    while($row3 = mysqli_fetch_array($result3)) {
    	$y = (string) $row3[0];
    	$res3[$y] = $row3[1]; 	
    } 	
    
    $Total = 0;
    $sql4="SELECT Brand, COUNT(*) A from product_13151,salesorder2_details13151 WHERE product_13151.ProductCode = salesorder2_details13151.product_id GROUP BY Brand ORDER BY A DESC";
    $res4 = array();
  	$result4 = mysqli_query($conn, $sql4);
    $i = 1;
    while($row4 = mysqli_fetch_array($result4)) {
    	$res4[$b.$i] = $row4[0];
    	$res4[$b.$i.$c] = $row4[1];
    	if ($i > 5){
    		$Total = $Total + $row4[1];   		
    	}
    	$i++; 		
    } 	

    $sql5="SELECT YEAR(pdate) A, SUM(CASH), SUM(AMOUNT) FROM payments_13151 WHERE YEAR(pdate) > '2012' GROUP BY A";
    $res5 = array();
    $result5 = mysqli_query($conn, $sql5);
    $i = 1;
    while($row5 = mysqli_fetch_array($result5)) {
      $y = $row5[0];
      $res5[$y.$c] = $row5[1];
      $res5[$y.$a] = $row5[2];     
    }   

    

?>

<div class="container">

<div class="test">
<canvas id="bar-chart-grouped" width="680" height="350"></canvas>
</div>

<div class="test1">
<canvas id="bar-chart-horizontal" width="850" height="450"></canvas>
</div>

<div class="test2">
<canvas id="line-chart" width="500" height="250"></canvas>
</div>

<div class="test3">
<canvas id="doughnut-chart" width="300" height="300"></canvas>
</div>

<div class="test4">
<canvas id="line-chart2" width="500" height="250"></canvas>
</div>
	

</div>







</body>
<script type="text/javascript">


$(document).ready(function(){ 




new Chart(document.getElementById("bar-chart-grouped"), {
    type: 'bar',
    data: {
      labels: ["JAN", "FEB", "MAR","APR", "MAY", "JUN", "JUL","AUG","SEP","OCT","NOV","DEC"],
      datasets: [
         {
          label: "FY2013",
          backgroundColor: "#3e95cd",
          data: [<?php echo json_encode($res2['2013 1']); ?>,<?php echo json_encode($res2['2013 2']); ?>,<?php echo json_encode($res2['2013 3']); ?>,<?php echo json_encode($res2['2013 4']); ?>,<?php echo json_encode($res2['2013 5']); ?>,<?php echo json_encode($res2['2013 6']); ?>,<?php echo json_encode($res2['2013 7']); ?>,<?php echo json_encode($res2['2013 8']); ?>,<?php echo json_encode($res2['2013 9']); ?>,<?php echo json_encode($res2['2013 10']); ?>,<?php echo json_encode($res2['2013 11']); ?>,<?php echo json_encode($res2['2013 12']);?>]
        },{
          label: "FY2014",
          backgroundColor: "#8e5ea2",
          data: [<?php echo json_encode($res2['2014 1']); ?>,<?php echo json_encode($res2['2014 2']); ?>,<?php echo json_encode($res2['2014 3']); ?>,<?php echo json_encode($res2['2014 4']); ?>,<?php echo json_encode($res2['2014 5']); ?>,<?php echo json_encode($res2['2014 6']); ?>,<?php echo json_encode($res2['2014 7']); ?>,<?php echo json_encode($res2['2014 8']); ?>,<?php echo json_encode($res2['2014 9']); ?>,<?php echo json_encode($res2['2014 10']); ?>,<?php echo json_encode($res2['2014 11']); ?>,<?php echo json_encode($res2['2014 12']);?>]
        },
         {
          label: "FY2015",
          backgroundColor: "#3cba9f",
          data: [<?php echo json_encode($res2['2015 1']); ?>,<?php echo json_encode($res2['2015 2']); ?>,<?php echo json_encode($res2['2015 3']); ?>,<?php echo json_encode($res2['2015 4']); ?>,<?php echo json_encode($res2['2015 5']); ?>,<?php echo json_encode($res2['2015 6']); ?>,<?php echo json_encode($res2['2015 7']); ?>,<?php echo json_encode($res2['2015 8']); ?>,<?php echo json_encode($res2['2015 9']); ?>,<?php echo json_encode($res2['2015 10']); ?>,<?php echo json_encode($res2['2015 11']); ?>,<?php echo json_encode($res2['2015 12']);?>]
        },{
          label: "FY2016",
          backgroundColor: "#e8c3b9",
          data: [<?php echo json_encode($res2['2016 1']); ?>,<?php echo json_encode($res2['2016 2']); ?>,<?php echo json_encode($res2['2016 3']); ?>,<?php echo json_encode($res2['2016 4']); ?>,<?php echo json_encode($res2['2016 5']); ?>,<?php echo json_encode($res2['2016 6']); ?>,<?php echo json_encode($res2['2016 7']); ?>,<?php echo json_encode($res2['2016 8']); ?>,<?php echo json_encode($res2['2016 9']); ?>,<?php echo json_encode($res2['2016 10']); ?>,<?php echo json_encode($res2['2016 11']); ?>,<?php echo json_encode($res2['2016 12']);?>]
        }, {
          label: "FY2017",
          backgroundColor: "#c45850",
          data: [<?php echo json_encode($res2['2017 1']); ?>,<?php echo json_encode($res2['2017 2']); ?>,<?php echo json_encode($res2['2017 3']); ?>,<?php echo json_encode($res2['2017 4']); ?>,<?php echo json_encode($res2['2017 5']); ?>,<?php echo json_encode($res2['2017 6']); ?>,<?php echo json_encode($res2['2017 7']); ?>,<?php echo json_encode($res2['2017 8']); ?>,<?php echo json_encode($res2['2017 9']); ?>,<?php echo json_encode($res2['2017 10']); ?>,<?php echo json_encode($res2['2017 11']); ?>,<?php echo json_encode($res2['2017 12']);?>]
        }
      ]
    },
    options: {
      title: {
        display: true,
        text: 'Last 5 Years SALES'
      }
    }
});
	
var a1 = <?php echo json_encode($res['a1']); ?>;
var a2 = <?php echo json_encode($res['a2']); ?>;
var a3 = <?php echo json_encode($res['a3']); ?>;
var a4 = <?php echo json_encode($res['a4']); ?>;
var a5 = <?php echo json_encode($res['a5']); ?>;

var b1 = <?php echo json_encode($res['b1']); ?>;
var b2 = <?php echo json_encode($res['b2']); ?>;
var b3 = <?php echo json_encode($res['b3']); ?>;
var b4 = <?php echo json_encode($res['b4']); ?>;
var b5 = <?php echo json_encode($res['b5']); ?>;



new Chart(document.getElementById("bar-chart-horizontal"), {
    type: 'horizontalBar',
    data: {
      labels: ["Id: "+a1,"Id: "+a2,"Id: "+a3,"Id: "+a4,"Id: "+a5],
      datasets: [
        {
          label: "Orders",
          backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
          data: [b1,b2,b3,b4,b5]
        }
      ]
    },
    options: {
      legend: { display: false},
      title: {
        display: true,
        text: 'MOST ORDERS BY CUSTOMERS'
      }
    }
});



new Chart(document.getElementById("line-chart"), {
  type: 'line',
  data: {
    labels: [2013,2014,2015,2016,2017],
    datasets: [{ 
        data: [<?php echo json_encode($res3['2013']); ?>,<?php echo json_encode($res3['2014']); ?>,<?php echo json_encode($res3['2015']); ?>,<?php echo json_encode($res3['2016']); ?>,<?php echo json_encode($res3['2017']); ?>],
        label: "Sales Line",
        borderColor: "#3e95cd",
        fill: false
      }
    ]
  },
  options: {
    title: {
      display: true,
      text: 'Year versers sale($)'
    }
  }
});

new Chart(document.getElementById("doughnut-chart"), {
    type: 'doughnut',
    data: {
      labels: [<?php echo json_encode($res4['b1']); ?>,<?php echo json_encode($res4['b2']); ?>, <?php echo json_encode($res4['b3']); ?>, <?php echo json_encode($res4['b4']); ?>, <?php echo json_encode($res4['b5']); ?>],
      datasets: [
        {
          label: "Units Sold",
          backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
          data: [<?php echo json_encode($res4['b1c']); ?>,<?php echo json_encode($res4['b2c']); ?>,<?php echo json_encode($res4['b3c']); ?>,<?php echo json_encode($res4['b4c']); ?>,<?php echo json_encode($res4['b5c']); ?>]
        }
      ]
    },
    options: {
      title: {
        display: true,
        text: 'Most famous Brands sold as per units'
      }
    }
});



new Chart(document.getElementById("line-chart2"), {
  type: 'line',
  data: {
    labels: [2013,2014,2015,2016,2017],
    datasets: [{ 
        data: [<?php echo json_encode($res5['2013a']); ?>,<?php echo json_encode($res5['2014a']); ?>,<?php echo json_encode($res5['2015a']); ?>,<?php echo json_encode($res5['2016a']); ?>,<?php echo json_encode($res5['2017a']); ?>],
        label: "Amount",
        borderColor: "#3e95cd",
        fill: false
      },{ 
        data: [<?php echo json_encode($res5['2013c']); ?>,<?php echo json_encode($res5['2014c']); ?>,<?php echo json_encode($res5['2015c']); ?>,<?php echo json_encode($res5['2016c']); ?>,<?php echo json_encode($res5['2017c']); ?>],
        label: "Cash",
        borderColor: "#c45850",
        fill: false
      }
    ]
  },
  options: {
    title: {
      display: true,
      text: 'Cash and Amount versers year'
    }
  }
});






});



</script>
</html>