<!DOCTYPE html>
<?php
	require_once '../admin_query/validate.php';
	require '../admin_query/name.php';
	@include '../connection/connect.php';
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
		<li><a href = "homemed.php">Home</a></li>
		<li class = ""><a href = "medicine.php">Medicine</a></li>	
		<li class = "active"><a href = "userRecMed.php">Records</a></li>			
		</ul>	
	</div>
	<br />
	<div class = "container-fluid">
		<div class = "panel panel-default">
			<div class = "panel-body">
				<div class = "alert alert-info">Records</div>
				
				<br />
				<?php if (isset($_GET['success'])) { ?>
					<div class="alert alert-success" role="alert">
						<?=$_GET['success']?>
					</div>
					<?php } ?>
				<br />
				<table id = "table" class = "table table-bordered">
					<thead>
						<tr>
							
							<th>Resident Name</th>
							<th>Date of Birth</th>
							<th>Age</th>
							<th>Sex</th>
							<th>Address</th>
							<th>Contact Number</th>
							<th>Product Name</th>
							<th>Quantity</th>
							<th>Given Date</th>
							<th>Action</th>
							

						</tr>
					</thead>
					<tbody>
					<?php
						$query = $conn->query("SELECT * FROM `residentrecords`") or die(mysqli_error());
						while($fetch = $query->fetch_array()){
					?>	
						<tr>
							
							<td><?php echo $fetch['residentName']?></td>
							<td><?php echo $fetch['dateBirth']?></td>
							<td><?php echo $fetch['age']?></td>
							<td><?php echo $fetch['sex']?></td>
							<td><?php echo $fetch['address']?></td>
							<td><?php echo $fetch['contactNumber']?></td>
							<td><?php echo $fetch['productName']?></td>
							<td><?php echo $fetch['quantity_req']?></td>
							<td><?php echo $fetch['givenDate']?></td>
							<td><center> <a class = "btn btn-danger" onclick = "confirmationDelete(this); return false;" href = "../admin_query/delete_rec.php?residentId=<?php echo $fetch['residentId']?>"> Delete</a></center></td>
						</tr>
						
					<?php
						}
					?>	
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<br />
	<br />
	
</body>
<script type = "text/javascript">
	function confirmationDelete(anchor){
		var conf = confirm("Are you sure you want to delete this record?");
		if(conf){
			window.location = anchor.attr("href");
		}
	} 
</script>
<script src = "../js/jquery.js"></script>
<script src = "../js/jquery.dataTables.js"></script>
<script src = "../js/dataTables.bootstrap.js"></script>	
<script type = "text/javascript">
	$(document).ready(function(){
		$("#table").DataTable();
	});
</script>
</html>