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

<html lang="en">
<head>
	<title>Barangay Health Worker</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="../css/style.css" />
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
 			<li class=""><a href="dashboard.php">Dashboard</a></li>
			<li class="active"><a href="home.php">Home</a></li>
			<li class = ""><a href = "registered_user.php">Registered Accounts</a></li>
			<li class = ""><a href = "account.php">Accounts</a></li>
		</ul>
	</div>
	<br />
	<div class="container-fluid">
		<div class="panel panel-default"></div>
	</div>
	<br />
	<br />
	

	<!-- Medicine graph -->
	<div id="medicineChartContainer" style="height: 370px; width: 100%;"></div>
	<br>
	<br />
	<br />
	<!-- Address graph -->
	<div id="addressChartContainer" style="height: 370px; width: 100%;"></div>

	<!-- Include the CanvasJS library -->
	<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

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
