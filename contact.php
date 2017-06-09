<?php
	ob_start();
	session_start();
	require_once 'inc/config.php';

	// if session is not set this will redirect to login page
	if( !isset($_SESSION['user']) ) {
		header("Location: home.php");
		exit;
	}
	// select loggedin users detail
	$res=mysql_query("SELECT * FROM users WHERE userId=".$_SESSION['user']);
	$userRow=mysql_fetch_array($res);
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome<?php echo $userRow['userEmail']; ?></title>
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"  />
<link rel="stylesheet" href="style.css" type="text/css" />
<!-- bootstrap -->
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">

		<link href="themes/css/bootstrappage.css" rel="stylesheet"/>

		<!-- global styles -->
		<link href="themes/css/flexslider.css" rel="stylesheet"/>
		<link href="themes/css/main.css" rel="stylesheet"/>

		<!-- scripts -->
		<script src="themes/js/jquery-1.7.2.min.js"></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>
		<script src="themes/js/superfish.js"></script>
		<script src="themes/js/jquery.scrolltotop.js"></script>
</head>
<body>

	<div id="wrapper" class="container">
			<section class="navbar main-menu">
				<div class="navbar-inner main-menu">
					<a href="index.php" class="logo pull-left"><img src="themes/images/logo.png" class="site_logo" alt=""></a>
					<nav id="menu" class="pull-right">
						<ul>
							<li><a href="index.php">Home</a></li>
							<li><a href="products.php">Products</a>
								<ul>
									<li><a href="products.php">Brands</a></li>
								</ul>
							</li>
							<li><a href="keranjang.php">Shopping cart</a></li>

							<li class="dropdown">
	              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
				  <span class="glyphicon glyphicon-user"></span>&nbsp;Logged in <?php echo $userRow['userEmail']; ?>&nbsp;<span class="caret"></span></a>
	              <ul class="dropdown-menu">
	                <li><a href="logout.php?logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Sign Out</a></li>
	              </ul>
	            </li>
							<li><a href="about.php">About Us</a></li>
							<li><a href="contact.php">Contact</a></li>
						</ul>

					</nav>
				</div>
			</section>
			<section  class="homepage-slider" id="home-slider">
				<div class="flexslider">
					<ul class="slides">
						<?php
							$query = mysql_query("SELECT * FROM slider ");

							while ($data = mysql_fetch_assoc($query)) {
								echo '<li><img src="admin/'.$data['gambar'].'" alt="" /></li>';
							}
						?>

					</ul>
				</div>
			</section>

			<center>

<h4>Online T-Shirt Store</h4>
<div id="map"></div>

</center>
		  <section class="header_text sub">

				<h3><span>Contact Us</span></h3>
			</section>
			<section class="main-content">
				<div class="row">
					<div class="span5">
						<div>
							<h3>Tallinn Office</h3>
							<p><strong>Phone:</strong>&nbsp;(372) 57400730<br>
							<strong>Fax:</strong>&nbsp;+04 (123) 4567890<br>
							<strong>Email:</strong>&nbsp;<a href="#">ashihab@itcollege.ee</a>
							</p>
							<br/>
							<h3>Customer Care</h3>
							<p><strong>Phone:</strong>&nbsp;(372) 111222<br>
							<strong>Email:</strong>&nbsp;<a href="#">support@tshirts.ee</a>
							</p>
						</div>
					</div>

			</section>
			<section id="footer-bar">
				<div class="row">
					<div class="span3">
						<h4>Navigation</h4>
						<ul class="nav">
							<li><a href="index.php">Homepage</a></li>
							<li><a href="about.php">About Us</a></li>
							<li><a href="contact.php">Contac Us</a></li>
							<li><a href="cart.php">Your Cart</a></li>

						</ul>
					</div>

					<div class="span4">
						<p class="logo"><img src="themes/images/logo.png" class="site_logo" alt=""></p>
						<p>Exclusive T-Shirts in cheapest price!</p>
						<br/>
						<span class="social_icons">
							<a class="facebook" href="#">Facebook</a>
							<a class="twitter" href="#">Twitter</a>
							<a class="skype" href="#">Skype</a>
							<a class="vimeo" href="#">Vimeo</a>
						</span>
					</div>
				</div>
			</section>
			<section id="copyright">
				<span>Copyright 20137 SHIHAB  All right reserved.</span>
			</section>
					</div>
					<div class="span5">
		</div>
		<script src="themes/js/common.js"></script>
    </body>
</html>
