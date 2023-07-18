
<!--  condtion graph medicine  -->
<?php
     
     $dataPoints = array(
        array("productName"=> "label", "y"),
     );
     $link=mysqli_connect("localhost","root","");
     mysqli_select_db($link,"my_db");
     $test=array();
 
     $count=0;
    
     $res=mysqli_query($link,"select * from medicines");
     while($row=mysqli_fetch_array($res))
     {
        $test[$count]["label"]=$row["productName"];
         $test[$count]["y"]=$row["total"];
         $count=$count+1;
     }
    
     ?>
	 <!--  end condtion graph medicine  -->

     <!--  start condtion graph address  -->
	 <?php
     
     $dataPoints = array(
        array("address"=> "label", "y"),
       
     );
     $link=mysqli_connect("localhost","root","");
     mysqli_select_db($link,"my_db");
     $test=array();
 
     $count=0;
    
     $res=mysqli_query($link,"select * from residentrecords");
     while($row=mysqli_fetch_array($res))
     {
        $test[$count]["label"]=$row["address"];
         $test[$count]["y"]=$row["quantity_req"];
         $count=$count+1;
     }
    
     ?>
     <!--  start condtion graph address  -->




<!DOCTYPE html>
<?php
	require_once '../admin_query/validate.php';
	require '../admin_query/name.php';
?>
<html lang = "en">
	<head>
		<title>Barangay Health Worker</title>
		<meta charset = "utf-8" />
		<meta name = "viewport" content = "width=device-width, initial-scale=1.0" />
		<link rel = "stylesheet" type = "text/css" href = "../css/bootstrap.css " />
		<link rel = "stylesheet" type = "text/css" href = "../css/style.css" />
	
        
   
	</head>
<body>
	<nav style = "background-color:rgba(0, 0, 0, 0.1);" class = "navbar navbar-default">
		<div  class = "container-fluid">
			<div class = "navbar-header">
				<a class = "navbar-brand" >Barangay Health Worker</a>
			</div>
			<ul class = "nav navbar-nav pull-right ">
				<li class = "dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"></i> <?php echo $name;?></a>
				</li>
				<li><a href = "../logout.php">Logout</a></li>	
			</ul>
		</div>
	</nav>
	<div class = "container-fluid">	
		<ul class = "nav nav-pills">
			<li class = "active"><a href = "home.php">Home</a></li>
			<li class = ""><a href = "registered_user.php">Registered Accounts</a></li>
			<li><a href = "account.php">Accounts</a></li>
		
				
		</ul>	
	</div>
	<br />
	<div class = "container-fluid">
		<div class = "panel panel-default">
		
		
	</div>
	<br />
	<br />
<!-- medicine graph -->
	<script>
		
		window.onload = function () {
		 
		var chart = new CanvasJS.Chart("chartContainer", {
			animationEnabled: true,
			theme: "light3", // "light1", "light2", "dark1", "dark2"
			title: {
				text: "Medicine"
			},
			axisY: {
				title: "Number of Medicine"
			},
			axisX: {
				title: "Product Name"
			},
			data: [{
				type: "column",
				dataPoints: <?php echo json_encode($test, JSON_NUMERIC_CHECK); ?>
			}]
		});
		chart.render();
		 
		}
		</script> 

	<!-- end medicine graph -->

	
	<!-- start address graph -->

	<script>
     window.onload = function () {
      
     var chart = new CanvasJS.Chart("chartContainer1", {
         animationEnabled: true,
         theme: "light3", // "light1", "light2", "dark1", "dark2"
         title: {
             text: "Record"
         },
         axisY: {
             title: "Quantity Request"
         },
         axisX: {
             title: "Address"
         },
         data: [{
             type: "column",
             dataPoints: <?php echo json_encode($test, JSON_NUMERIC_CHECK); ?>
         }]
     });
     chart.render();
      
     }
     </script>  
	 <!-- end address graph -->

	<!--  graph design -->
	<div id="chartContainer" style="height: 370px; width: 100%;"></div>
	<div id="chartContainer1" style="height: 370px; width: 100%;"></div>
	<script src="../js/canvasjs.min.js"></script>

</body>
	
</html>