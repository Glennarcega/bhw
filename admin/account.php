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
	    	<li class=""><a href="dashboard.php">Dashboard</a></li>
			<li><a href = "home.php">Home</a></li>
			<li class = ""><a href = "records.php">Records</a></li>
			<li class = "active"><a href = "account.php">Accounts</a></li>
				
		</ul>	
	</div>
	<br />
	<div class = "container-fluid">
		<div class = "panel panel-default">
			<div class = "panel-body">
				<div class = "alert alert-info">Accounts</div>
				<a class = "btn btn-success" href = "add_account.php"><i class = "glyphicon glyphicon-plus"></i> Create New Account</a>
				<br />
				<br />
				<?php if (isset($_GET['success'])) { ?>
      	      <div class="alert alert-success" role="alert">
				  <?=$_GET['success']?>
			  </div>
			  <?php } ?>
				<table id = "table" class = "table table-bordered">
					<thead>
						<tr>
						<th>Name</th>
							<th>Username</th>
							<th>Role</th>
							<th>Password</th>
						</tr>
					</thead>
					<tbody>
						<?php  
							$query = $conn->query("SELECT * FROM `users`") or die(mysqli_error());
							while($fetch = $query->fetch_array()){
						?>
						<tr>
						<td><?php echo $fetch['username']?></td>
							<td><?php echo $fetch['name']?></td>
							<td><?php echo $fetch['role']?></td>
							<td><?php echo md5($fetch['password'])?></td>
							<td><center><a class = "btn btn-warning" href = "edit_account.php?id=<?php echo $fetch['id']?>"> Edit</a> <a class = "btn btn-danger" onclick = "confirmationDelete(this); return false;" href = "../admin_query/delete_account.php?id=<?php echo $fetch['id']?>"> Delete</a></center></td>
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