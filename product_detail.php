<?php
session_start();
include('inc/config.php');
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Detail Products</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<!--[if ie]><meta content='IE=8' http-equiv='X-UA-Compatible'/><![endif]-->
		
		<!-- bootstrap -->
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">      
		<link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">		
		<link href="themes/css/bootstrappage.css" rel="stylesheet"/>
		
		<!-- global styles -->
		<link href="themes/css/main.css" rel="stylesheet"/>
		<link href="themes/css/jquery.fancybox.css" rel="stylesheet"/>
				
		<!-- scripts -->
		<script src="themes/js/jquery-1.7.2.min.js"></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>				
		<script src="themes/js/superfish.js"></script>	
		<script src="themes/js/jquery.scrolltotop.js"></script>
		<script src="themes/js/jquery.fancybox.js"></script>
		<!--[if lt IE 9]>			
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
			<script src="js/respond.min.js"></script>
		<![endif]-->
	</head>
    <body>		
		<div id="top-bar" class="container">
			<div class="row">
				<div class="span4">
					<form method="POST" class="search_form">
						<input type="text" class="input-block-level search-query" Placeholder="eg. T-sirt">
					</form>
				</div>
				<div class="span8">
					<div class="account pull-right">
						<ul class="user-menu">				
							<li><a href="keranjang.php">Cart</a></li>		
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div id="wrapper" class="container">
			<section class="navbar main-menu">
				<div class="navbar-inner main-menu">				
					<a href="index.php" class="logo pull-left"><img src="themes/images/logo.png" class="site_logo" alt=""></a>
					<nav id="menu" class="pull-right">
						<ul>
							<li><a href="index.php">Home</a></li>															
							<li><a href="products.php">Products</a>
								<ul>									
									<li><a href="products.php">tshirts</a></li>
								</ul>
							</li>							
							<li><a href="about.php">About us</a></li>
							<li><a href="contact.php">Contact</a></li>
						</ul>
					</nav>
				</div>
			</section>
			<section class="header_text sub">
			<img class="pageBanner" src="gambar-slide/pagebanner.jpg" alt="New products" >
				<h4><span>Product Details</span></h4>
			</section>
			<section class="main-content">				
				<div class="row">						
					<div class="span10">
						<div class="row">
                        <?php
						  $id = $_GET['id'];
						  
						  echo $id;
						  $query = mysql_query("SELECT * FROM barang WHERE id_brg LIKE '$id'") ;
						  if($query === FALSE) { 
                            die(mysql_error()); // TODO: better error handling
                              }

						  $data = mysql_fetch_array($query);
						?>
							<div class="span4">
								<?php echo '<a href="admin/'.$data['gambar_brg'].'" class="thumbnail" data-fancybox-group="group1" title="Description 1"><img alt="" src="admin/'.$data['gambar_brg'].'"></a>'; ?>												
							</div>
							<div class="span5">
								<address>
									<?php echo '<strong>Nama Barang : </strong> <span> '.$data['nama_brg'].' </span><br>
									<strong>Kode Produk : </strong> <span> '.$data['id_brg'].' </span><br>
									<strong>Stok : </strong> <span> '.$data['jml_brg'].' </span><br>
									<strong>Kategori : </strong> <span> '.$data['kategori'].' </span><br>'; ?>							
								</address>									
								<?php echo '<h4><strong>Harga : Rp '.$data['harga_brg'].'</strong></h4>'; ?>
							</div>
							<div class="span5">
                                <?php echo '<a class="btn btn-success" href="keranjang.php?add='.$data['id_brg'].'" class="category"><h4>Masukkan Keranjang</h4></a>'; ?>
							</div>							
						</div>
                        <br>
						<div class="row">
							<div class="span12">
								<ul class="nav nav-tabs" id="myTab">
									<li class="active"><a href="#home">Description</a></li>
								</ul>							 
								<div class="tab-content">
									<?php echo '<div class="tab-pane active" id="home">'.$data['desc_brg'].'</div>'; ?>
									</div>							
							</div>						
							
						</div>
					</div>
					
				</div>
			</section>
            			
			<section id="footer-bar">
				<div class="row">
					<div class="span3">
						<h4>Navigation</h4>
						<ul class="nav">
							<li><a href="index.php">Home</a></li>  
							<li><a href="about.php">About</a></li>
							<li><a href="contact.php">contact</a></li>
							<li><a href="keranjang.php">Cart</a></li>							
						</ul>					
					</div>
                    <div class="span4"></div>
					<div class="span5">
						<p class="logo"><img src="themes/images/logo.png" class="site_logo" alt=""></p>
						<p>Top T shirt seller in Tallinn</p>
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
				<span>Copyright 2017 SHIHAB  All right reserved.</span>
			</section>
		</div>
		<script src="themes/js/common.js"></script>
		<script>
			$(function () {
				$('#myTab a:first').tab('show');
				$('#myTab a').click(function (e) {
					e.preventDefault();
					$(this).tab('show');
				})
			})
			$(document).ready(function() {
				$('.thumbnail').fancybox({
					openEffect  : 'none',
					closeEffect : 'none'
				});
				
				$('#myCarousel-2').carousel({
                    interval: 2500
                });								
			});
		</script>
    </body>
</html>