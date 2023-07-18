<!DOCTYPE html>
<?php
	require_once '../admin_query/validate.php';
	require '../admin_query/name.php';
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
	<nav style="background-color:rgba(0, 0, 0, 0.1);" class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand">Barangay Health Worker</a>
			</div>
			<ul class="nav navbar-nav pull-right">
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $name; ?></a>
				</li>
				<li><a href="../logout.php">Logout</a></li>
			</ul>
		</div>
	</nav>
	<div class="container-fluid">
		<ul class="nav nav-pills">
			<li><a href="homemed.php">Home</a></li>
			<li class="active"><a href="medicine.php">Medicine</a></li>
			<li class=""><a href="userRecMed.php">Records</a></li>
		</ul>
	</div>
	<br />
	<div class="container-fluid">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="alert alert-info">Request Form</div>
				<br />
				<div class="col-md-4">
					<?php
					$productName = isset($_GET['productName']) ? $_GET['productName'] : '';
					$query = $conn->query("SELECT * FROM `medicines` WHERE productName = '$productName'") or die(mysqli_error());
					$fetch = $query->fetch_array();
					?>

					<form method="POST" enctype="multipart/form-data">
						<div class="form-group">
							<label>Product ID</label>
							<input type="text" class="form-control" name="productId" value="<?php echo $fetch['productId']; ?>" readonly />
						</div>
						<div class="form-group">
							<label>Product Name</label>
							<input type="text" class="form-control" name="productName" value="<?php echo $fetch['productName']; ?>" readonly />
						</div>
						<div class="form-group">
							<label>Product Quantity</label>
							<input type="text" class="form-control" name="total" value="<?php echo $fetch['total']; ?>" readonly />
						</div>
						<div class="form-group" required="required">
							<label>Resident Name</label>
							<input type="text" class="form-control" name="residentName" />
						</div>
						<div class="form-group" required="required">
							<label>Date of Birth</label>
							<input type="date" class="form-control" name="dateBirth" />
						</div>
						<div class="form-group" required="required">
							<label>Age</label>
							<input type="text" class="form-control" name="age" />
						</div>
						<div class="form-group" required="required">
							<label>Sex</label>
							<select class="form-control" required="required" name="sex">
								<option value="Male">Male</option>
								<option value="Female">Female</option>
							</select>
						</div>
						<div class="form-group">
							<label>Sitio</label>
							<select class="form-control" required="required" name="address">
								<option value="IlangIlang">Ilang-Ilang</option>
								<option value="Orchids">Orchids</option>
								<option value="Sampagita">Sampagita</option>
								<option value="Camia">Camia</option>
								<option value="Rosal">Rosal</option>
							</select>
						</div>
						<div class="form-group" required="required">
							<label>Contact Number</label>
							<input type="text" class="form-control" name="contactNumber" />
						</div>
						<div class="form-group" required="required">
							<label>Quantity</label>
							<input type="number" min="0" max="999999999" class="form-control" name="quantity_req" />
						</div>
						<div class="form-group" required="required">
							<label>Given Date</label>
							<input type="date" class="form-control" name="givenDate" />
						</div>
						<div class="form-group">
							<button name="add_rec" class="btn btn-warning form-control"><i class="glyphicon glyphicon-edit"></i> Request</button>
						</div>
					</form>
					<?php require_once '../admin_query/add_query_records.php'?>
				</div>
			</div>
		</div>
	</div>
	<br />
	<br />
</body>
</html>
