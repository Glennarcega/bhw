<!DOCTYPE html>
<?php
	require_once '../admin_query/validate.php';
	require '../admin_query/name.php';

	// Fetch data for the medicine graph
	$link = mysqli_connect("localhost", "root", "");
	mysqli_select_db($link, "my_db");
	$medicines = array();

	$res = mysqli_query($link, "SELECT * FROM medicines");
	while ($row = mysqli_fetch_array($res)) {
		$medicine["label"] = $row["productName"];
		$medicine["y"] = $row["total"];
		$medicines[] = $medicine;
	}

	// Fetch data for the address graph
	$addresses = array();

	$res = mysqli_query($link, "SELECT * FROM residentrecords");
	while ($row = mysqli_fetch_array($res)) {
		$address["label"] = $row["address"];
		$address["y"] = $row["quantity_req"];
		$addresses[] = $address;
	}
?>

<head>
	<title>Barangay Health Worker</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="../css/style.css" />
	<link rel="stylesheet" href="../csslog/dashboard.css" />

	<style>
    .chart-container {
        display: flex;
        justify-content: space-between;
        width: 100%;
    }

    .chart {
        width: 48%;
    }
</style>
</head>

<body>
	<nav style="background-color: rgba(0, 0, 0, 0.1);" class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand">Barangay Health Worker</a>
			</div>
			<ul class="nav navbar-nav pull-right ">
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
						<?php echo $name; ?>
					</a>
				</li>
				<li><a href="../logout.php">Logout</a></li>
			</ul>
		</div>
	</nav>

	<div class="container-fluid">
		<ul class="nav nav-pills">
			<li class="active"><a href="home.php">Home</a></li>
			<li class = ""><a href = "records.php">Records</a></li>
			<li class = ""><a href = "account.php">Accounts</a></li>
		</ul>
	</div>
	<br />
	<div class="container-fluid">
		<div class="panel panel-default">
		</div>
	</div>
	<br />
	<section class="main">
      <div class="main-s">
        <div class="card">
          <i class="fas fa-laptop-code"></i>
          <?php
				$dash_user_block_query = "SELECT * from medicines";
				$dash_user_block_query_run = mysqli_query($conn,$dash_user_block_query);
				
				if($category_total = mysqli_num_rows($dash_user_block_query_run))
				{
					echo '<h1>Medicine <span class="label label-default">'.$category_total.'</span></h1>';

				}else{
					echo '<h4 class="mb-0"> No Data </h4>';
				}
				?>
          <button class="details"><center><a href="med_rec.php">View Details</a></center></button>
        </div>
        <div class="card">
          <i class="fab fa-wordpress"></i>
          <?php
				$dash_user_block_query = "SELECT * from residentrecords";
				$dash_user_block_query_run = mysqli_query($conn,$dash_user_block_query);
				
				if($category_total = mysqli_num_rows($dash_user_block_query_run))
				{
					echo '<h1>Resident <span class="label label-default">'.$category_total.'</span></h1>';
				}else{
					echo '<h4 class="mb-0"> No Data </h4>';
				}
				?>
          <button class="details"> <center><a href="resident.php">View Details</a></center></button>
        </div>
        <div class="card">
          <i class="fas fa-palette"></i>
		  <?php
				$dash_user_block_query = "SELECT * from users";
				$dash_user_block_query_run = mysqli_query($conn,$dash_user_block_query);
				
				if($category_total = mysqli_num_rows($dash_user_block_query_run))
				{
			
					echo '<h1>Users <span class="label label-default">'.$category_total.'</span></h1>';
				}else{
					echo '<h4 class="mb-0"> No Data </h4>';
				}
				?>
               <button class="details"><center> <a href="records.php">View Details</a></center></button>
			   <br>
        </div> 
      </div>
<br></br><br></br>
	<div class="chart-container">
        <!-- Medicine graph -->
        <div class="chart">
            <div id="medicineChartContainer" style="height: 200px;"></div>
        </div>

	<br>
	<br />
	<br />
	<!-- Address graph -->
	<div class="chart">
            <div id="addressChartContainer" style="height: 200px;"></div>
        </div>
    </div>

	<!-- Include the CanvasJS library -->
	<script src="../js/canvasjs.min.js"></script>

	<!-- Render the graphs -->
	<script>
		window.onload = function () {
			var medicineChart = new CanvasJS.Chart("medicineChartContainer", {
				animationEnabled: true,
				theme: "light3",
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
					dataPoints: <?php echo json_encode($medicines, JSON_NUMERIC_CHECK); ?>
				}]
			});

			medicineChart.render();

			var addressChart = new CanvasJS.Chart("addressChartContainer", {
				animationEnabled: true,
				theme: "light3",
				title: {
					text: "Address"
				},
				axisY: {
					title: "Quantity Request"
				},
				axisX: {
					title: "Sitio"
				},
				data: [{
					type: "column",
					dataPoints: <?php echo json_encode($addresses, JSON_NUMERIC_CHECK); ?>
				}]
			});
			addressChart.render();
		}
	</script>
</body>
</html>
