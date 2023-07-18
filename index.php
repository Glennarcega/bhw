<?php 
   session_start();
  
   if (!isset($_SESSION['username']) && !isset($_SESSION['id'])) {   ?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	 <!-- custom css file link  -->
	 <link rel="stylesheet" href="csslog/style.css">
	 <style>
		.logo {
			width: 220px;
			height: 150px;
			border-radius: 50%;
			margin: auto;
			margin-bottom: 20px;
			display: block;
		}
		.form-container{
			background-color: aquamarine;
			background-repeat: no-repeat;
			background-size: 1700px 650px;
		}
		.cont2{
			margin:auto;
			width: 450px;
		}
		.form-btn{
			border:5px solid lightgreen;
		}
	</style>
   </head>
<body>
<div class="form-container">
		<form class="cont2"
		      action="php/check-login.php" 
		      method="post"
			  style ="background-color: #FFFACD">
			  <img src="img/ourlogo.png" alt="Logo" class="logo">
      	      <h1 class="text-center p-3">LOGIN</h1>
      	      <?php if (isset($_GET['error'])) { ?>
      	      <div class="alert alert-danger" role="alert">
				  <?=$_GET['error']?>
			  </div>
			  <?php } ?>
		  
		    <input type="text" required placeholder="Username"
		           class="form-control" 
		           name="username" 
		           id="username">
		
		
		    <input type="password" required placeholder="Password"
		           name="password" 
		           class="form-control" 
		           id="password">
		  
		    <label class="form-label">Select User Type:</label>
		
		  <select class="form-select mb-3"
		          name="role" 
		          aria-label="Default select example">
			  <option selected value="user">User</option>
			  <option value="admin">Admin</option>
		  </select>
		
			 <input type="submit" name="submit" value="Login" class="form-btn">
			
		</form>
      </div>
</body>
</html>
<?php }else{
	header("Location: home.php");
} ?>
