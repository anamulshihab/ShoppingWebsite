<?php
session_start();
 
if (!empty($_SESSION['username'])) {
    header('location:index.php');
}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Admin Login</title>
		<!-- Bootstrap -->
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
		<link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
		<link href="assets/styles.css" rel="stylesheet" media="screen">
		
		<script src="js/modernizr-2.6.2-respond-1.1.0.min.js"></script>
	</head>
	
	<?php
	//error handling 
	if (!empty($_GET['error'])) {
		if ($_GET['error'] == 1) {
			echo '<h3 align="center">Username and Password not yet filled!</h3>';
		} else if ($_GET['error'] == 2) {
			echo '<h3 align="center">Username !</h3>';
		} else if ($_GET['error'] == 3) {
			echo '<h3 align="center">Password !</h3>';
		} else if ($_GET['error'] == 4) {
			echo '<h3 align="center">Username or password is wrong</h3>';
		}
	}
	?>
	
	<body id="login">
		<div class="container">

		  <form name="login" action="autentifikasi.php" method="post" class="form-signin">
			<h2 class="form-signin-heading" align="center">Log in Shop</h2>
			<input type="text" name="username" class="input-block-level" placeholder="Username">
			<input type="password" name="password" class="input-block-level" placeholder="Password">
			<input class="btn btn-large btn-primary" type="submit" name="login" value="Log in">
		  </form>

		</div> <!-- /container -->
		
		<script src="js/jquery-1.9.1.min.js"></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>