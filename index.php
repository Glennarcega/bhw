<?php 
   session_start();
  
   if (!isset($_SESSION['username']) && !isset($_SESSION['id'])) {   ?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	 <!-- custom css file link  -->
	 <link rel="stylesheet" href="csslog/style.css">
   </head>
<body>
      <div class="form-container">
      	<form class="border shadow p-3 rounded"
      	      action="php/check-login.php" 
      	      method="post" 
      	      style="width: 450px;">
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