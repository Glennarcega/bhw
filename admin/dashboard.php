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
		.User{
			font-size: 30px;
			display: block;
			
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
			<li class = ""><a href = "registered_user.php">Registered Accounts</a></li>
			<li class = ""><a href = "account.php">Accounts</a></li>
		</ul>
	</div>
	<br />
	
	<div class="container-fluid">
		<div class="panel panel-default"></div>
		<h3><b>Dashboard</b></h3>
		<br />
        <div class="col-xl-3 col-md-3">
		<div class="card bg-success text-white mb-4" style="border: 2px solid red; border-radius: 5px;">
			<div class="card-body">
				<img src="../admin/user.png"  width="74" height="70" style="margin-left: 5px;">
				&nbsp;&nbsp;&nbsp;&nbsp;<b><p class="User" style ="margin-top: auto">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Total User</p></b>
				<?php
				$dash_user_block_query = "SELECT * from users";
				$dash_user_block_query_run = mysqli_query($conn,$dash_user_block_query);
				
				if($category_total = mysqli_num_rows($dash_user_block_query_run))
				{
					echo '<h4 class="mb-0">&nbsp;&nbsp;&nbsp;&nbsp; <b>'.$category_total.' </h4>';
				}else{
					echo '<h4 class="mb-0"> no data </h4>';
				}
				?>
                <a href="registered_user.php">View Details</a>
			</div>
		</div>
	</div>
	<br />
	<br />

</body>
</html>
