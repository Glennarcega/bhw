<!DOCTYPE html>
<?php
	require_once '../admin_query/validate.php';
	require '../admin_query/name.php';
?>
<head>
	<title>Barangay Health Worker</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="../css/style.css" />
	
<style>
	.card {
  /* Add shadows to create the "card" effect */
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
}

/* On mouse-over, add a deeper shadow */
.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

/* Add some padding inside the card container */
.container {
  padding: 2px 16px;
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
             <li class="active"><a href="dashboard.php">Dashboard</a></li>
             <li class=""><a href="home.php">Home</a></li>
			<li class = ""><a href = "records.php">Records</a></li>
			<li class = ""><a href = "account.php">Accounts</a></li>
		</ul>
	</div>
	<br />
	
	<div class="container-fluid">
		<div class="panel panel-default"></div>
	
		<br />
        <div class="col-xl-3 col-md-3">
		<div class="card bg-success text-white mb-4" style="border: 2px solid green; border-radius: 5px; margin-left: 70px">
			<div class="card-body">
				<?php
				$dash_user_block_query = "SELECT * from medicines";
				$dash_user_block_query_run = mysqli_query($conn,$dash_user_block_query);
				
				if($category_total = mysqli_num_rows($dash_user_block_query_run))
				{
					echo '<h1>Medicine <span class="label label-default">'.$category_total.'</span></h1>';

				}else{
					echo '<h4 class="mb-0"> no data </h4>';
				}
				?>
                <center><a href="med_rec.php">View Details</a></center>
				<br>
			</div>
		</div>
	</div>
	<div class="container-fluid">
		<div class="panel panel-default">
        <div class="col-xl-3 col-md-3">
		<div class="card bg-success text-white mb-4" style="border: 2px solid green; border-radius: 5px; margin-left: 70px">
			<div class="card-body">
				<?php
				$dash_user_block_query = "SELECT * from residentrecords";
				$dash_user_block_query_run = mysqli_query($conn,$dash_user_block_query);
				
				if($category_total = mysqli_num_rows($dash_user_block_query_run))
				{
					echo '<h1>Resident <span class="label label-default">'.$category_total.'</span></h1>';
				}else{
					echo '<h4 class="mb-0"> no data </h4>';
				}
				?>
                <center><a href="resident.php">View Details</a></center>
				<br>
			</div>
		</div>
	</div>
	<div class="container-fluid">
        <div class="col-xl-3 col-md-3">
		<div class="card bg-success text-white mb-4" style="border: 2px solid green; border-radius: 5px; margin-left: 70px">
			<div class="card-body">
			
				<?php
				$dash_user_block_query = "SELECT * from users";
				$dash_user_block_query_run = mysqli_query($conn,$dash_user_block_query);
				
				if($category_total = mysqli_num_rows($dash_user_block_query_run))
				{
			
					echo '<h1>Users <span class="label label-default">'.$category_total.'</span></h1>';
				}else{
					echo '<h4 class="mb-0"> no data </h4>';
				}
				?>
               <center> <a href="records.php">View Details</a></center>
			   <br>
		</div>
		
	</div>
	<div class="card">
  <div class="container">
   
  </div>
</div> 

</body>
</html>