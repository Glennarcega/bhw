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
	<link rel="stylesheet" href="../csslog/dashboard.css" />

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
		<div class="panel panel-default">
		</div>
	</div>
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
					echo '<h4 class="mb-0"> no data </h4>';
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
					echo '<h4 class="mb-0"> no data </h4>';
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
					echo '<h4 class="mb-0"> no data </h4>';
				}
				?>
               <button class="details"><center> <a href="records.php">View Details</a></center></button>
			   <br>
        </div> 
      </div>
</body>
</html>

