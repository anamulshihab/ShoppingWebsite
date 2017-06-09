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
			<section class="header_text sub">
			<img class="pageBanner" src="gambar-slide/pagebanner.jpg" alt="New products" >
				<h4><span>New Arrivals</span></h4>
			</section>
			<section class="main-content">

				<div class="row">
					<div class="span12">
						<ul class="thumbnails listing-products">
									<?php
										$per_page = 12;

										$page_query = mysql_query("SELECT COUNT(*) FROM barang");
										$pages = ceil(mysql_result($page_query, 0) / $per_page);

										$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
										$start = ($page - 1) * $per_page;

										$query = mysql_query("SELECT * FROM barang LIMIT $start, $per_page");

										while ($data = mysql_fetch_assoc($query)):
									?>
										<li class="span3">
											<div class="product-box">
												<span class="sale_tag"></span>
												<?php echo '<p><a href="product_detail.php?id='.$data['id_brg'].'"><img src="admin/'.$data['gambar_brg'].'" /></a></p>'; ?>
												<?php echo '<a href="product_detail.php?id='.$data['id_brg'].'" class="title">'.$data['nama_brg'].'</a>'; ?>
												<br/>
												<?php echo '<a href="product_detail.php?id='.$data['id_brg'].'" class="category">'.$data['jml_brg'].'</a>'; ?>
												<p class="price"><?php echo 'Rp '.$data['harga_brg']; ?></p>
											</div>
										</li>
									<?php endwhile; ?>
						</ul>
						<hr>
						<div class="pagination pagination-small pagination-centered">
							<ul>
                            <?php
								if($pages >= 1 && $page <= $pages)
								{
								  for($x=1; $x<=$pages; $x++)
								  {
									  //echo ($x == $page) ? '<b><a href="?page='.$x.'">'.$x.'</a></b> ' : '<a href="?page='.$x.'">'.$x.'</a> ';
									if($x == $page)
										echo ' <li class="active"><a href="?page='.$x.'">'.$x.'</a></li>';
									else
										echo ' <li><a href="?page='.$x.'">'.$x.'</a></li>';
								  }
								}
								?>
							</ul>
						</div>
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
		<script src="themes/js/common.js"></script>
    </body>
</html>
