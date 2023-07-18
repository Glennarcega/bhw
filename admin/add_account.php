


<!DOCTYPE html>
<?php
	require_once '../admin_query/validate.php';
	require '../admin_query/name.php';
?>
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
			<li><a href = "home.php">Home</a></li>
			<li class = ""><a href = "registered_user.php">Registered Accounts</a></li>
			<li class = "active"><a href = "account.php">Accounts</a></li>
					
		</ul>	
	</div>
	<br />
	<div class = "container-fluid">
		<div class = "panel panel-default">
			<div class = "panel-body">
				<div class = "alert alert-info">Account / Create Account</div>
				<br />
				<div class = "col-md-4">	
	


<div class="form-container">

   <form action="" method="POST">
   <?php if (isset($_GET['error'])) { ?>
      	      <div class="alert alert-danger" role="alert">
				  <?=$_GET['error']?>
			  </div>
			  <?php } ?>
	 <?php if (isset($_GET['success'])) { ?>
      	      <div class="alert alert-success" role="alert">
				  <?=$_GET['success']?>
			  </div>
			  <?php } ?>
	   <br></br>
	   <div class = "form-group">
			<label>Name </label>
				<input type = "text"  class = "form-control" name = "name" />
	  </div>
	  <div class = "form-group">
			<label>Username </label>
				<input type = "text"  class = "form-control" name = "username" />
	  </div>
	  <div class = "form-group">
			<label>Password </label>
				<input type = "password"  class = "form-control" name = "password" required placeholder="Enter your password" />
	  </div>	
	  <div class = "form-group">
			<label>Confirm Password </label>
				<input type = "password"  class = "form-control" name = "cpassword" required placeholder="Confirm your password" />
	  </div>	
	  <div class = "form-group">
			<label>Role</label>
			<select class = "form-control" required = required name = "role">
				<option value="user">User</option>
				<option value="admin">Admin</option>
			</select>
		</div>
	  <br></br>
	  <div class = "form-group">
			<button type = "submit" name="submit" class = "btn btn-success form-control"><i class = "glyphicon glyphicon-edit"></i> Add Account</button>
		</div>

	  
<?php
if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $username = mysqli_real_escape_string($conn, $_POST['username']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $role = $_POST['role'];

   $select = " SELECT * FROM users WHERE name = '$name' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

	header("Location: ../admin/add_account.php?error=user already exist!");

   }else{

      if($pass != $cpass){
		header("Location: ../admin/add_account.php?error=password not matched!");
      }else{
         $insert = "INSERT INTO users(name,username, password, role) VALUES('$name','$username','$pass','$role')";
         mysqli_query($conn, $insert);
         header('location:../admin/add_account.php?success=Add Account Sucessfully');
      }
   }

};


?>
</body>
<script src = "../js/jquery.js"></script>
<script src = "../js/bootstrap.js"></script>

</html>