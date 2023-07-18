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
				<li><a href = "index.php">Logout</a></li>	
			</ul>
		</div>
	</nav>
	<div class = "container-fluid">	
		<ul class = "nav nav-pills">
		<li><a href = "homemed.php">Home</a></li>
		<li class = "active"><a href = "medicine.php">Medicine</a></li>	
		<li class = ""><a href = "userRecMed.php">Records</a></li>						
		</ul>	
	</div>
	<br />
	<div class = "container-fluid">
		<div class = "panel panel-default">
			<div class = "panel-body">
				<div class = "alert alert-info">Edit</div>
				<br />
				<div class = "col-md-4">
					<?php
						$query = $conn->query("SELECT * FROM `medicines` WHERE `productId` = '$_REQUEST[productId]'") or die(mysqli_error());
						$fetch = $query->fetch_array();
					?>
					<form method = "POST" enctype = "multipart/form-data">
					<div class = "form-group">
							<label>Product Name </label>
							<input type = "text"  class = "form-control" name = "productName" value = "<?php echo $fetch['productName']?>" />
						</div>
					<div class = "form-group">
							<label>Quantity </label>
							<input type = "number" min = "0" max = "999999999" class = "form-control" name = "total" value = "<?php echo $fetch['total']?>" readonly/>
						</div>
						<div class = "form-group">
							<label>Add Quantity </label>
							<input type = "number"  min = "0" max = "999999999" class = "form-control" name = "quantity1" value=0 />
						</div>
						<div class = "form-group">
							<label>Expiration Date </label>
								<input type = "date"  class = "form-control" name = "expDate" value = "<?php echo $fetch['expDate']?>" />
						</div>
						<div class = "form-group">
							<label>Status</label>
							<select class = "form-control" required = required name = "status">
								<option value="available">Available</option>
								<option value="unavailable">Unavailable</option>
							</select>
						</div>
						
						<br />
						<div class = "form-group">
							<button name = "edit_med" class = "btn btn-warning form-control"><i class = "glyphicon glyphicon-edit"></i> Save Changes</button>
						</div>
					</form>
					<?php require_once '../admin_query/edit_query_med.php'?>
				</div>
			</div>
		</div>
	</div>
	<br />
	<br />
	
</body>

</html>