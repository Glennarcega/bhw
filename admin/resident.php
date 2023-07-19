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
        <ul class="nav nav-pills">
             <li class=""><a href="dashboard.php">Dashboard</a></li>
             <li class=""><a href="home.php">Home</a></li>
			<li class = "active"><a href = "records.php">Records</a></li>
			<li class = ""><a href = "account.php">Accounts</a></li>
		</ul>	
		</ul>	
	</div>
	
	<br />
	<div class = "container-fluid">	
		<div class = "panel panel-default">
		
			<div class = "panel-body">
	
				<a class = "btn btn-info" href="records.php"> Registered Users/Admin</a>
				<a class = "btn btn-info" href = "med_rec.php">medicine</a>
				<a class = "btn btn-info" href = "resident.php"> Resident</a>
				<br />
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

    
    

</body>
<script src = "../js/jquery.js"></script>
<script src = "../js/jquery.dataTables.js"></script>
<script src = "../js/dataTables.bootstrap.js"></script>	
<script type = "text/javascript">
	$(document).ready(function(){
		$("#table").DataTable();
	});
</script>
<script type = "text/javascript">
	function confirmationDelete(anchor){
		var conf = confirm("Are you sure you want to delete this record?");
		if(conf){
			window.location = anchor.attr("href");
		}
	} 
</script>
	
</html>
