<?php
include('inc/config.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Checkout</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<!--[if ie]><meta content='IE=8' http-equiv='X-UA-Compatible'/><![endif]-->
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
							<li><a href="index.php">home</a></li>															
							<li><a href="products.php">Products</a>
								<ul>									
									<li><a href="products.php">T-sirt</a></li>
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
				<h4><span>Check Out</span></h4>
			</section>	
			<section class="main-content">
				<div class="row">
					<div class="span12">
                    	<form name="selesai" action="selesai.php" method="post">
                          <div class="row-fluid">
                                <div class="span6">
                                    <h4>Personal Data &amp; Delivary</h4>
                                    <div class="control-group">
                                        <label class="control-label">Name</label>
                                        <div class="controls">
                                            <input type="text" required placeholder="Name" name="name" class="input-xlarge">
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Shipping Address</label>
                                        <div class="controls">
                                            <input type="text" required placeholder="postal address" name="address" class="input-xlarge">
                                        </div>
                                    </div>					  
                                    <div class="control-group">
                                        <label class="control-label">Email</label>
                                        <div class="controls">
                                            <input type="text" required placeholder="Email" name="email" class="input-xlarge">
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Phone</label>
                                        <div class="controls">
                                            <input type="text" required placeholder="Telephone" name="telephone" class="input-xlarge">
                                        </div>
                                    </div>
                                    <button type="submit" name="selesai" class="btn btn-primary">Submit</button>
                                </div>
                                
                                <div class="span5">
                                    <h4>Shopping Cart</h4>
                                    <div class="block">																
                                        <ul class="small-product">
                                            <?php 
                                                $i=1;
                                                foreach($_SESSION as $name => $value){
                                                    if($value > 0)
                                                    {
                                                        if(substr($name, 0, 5) == 'cart_')
                                                        {
                                                            $id = substr($name, 5, (strlen($name)-5));
                                                            $get = mysql_query("SELECT * FROM barang WHERE id_brg='$id'");
                                                            while($get_row = mysql_fetch_assoc($get)){
                                                                $sub = $get_row['harga_brg'] * $value;
                                                                
																echo '
                                                                <li>
                                                                    <h5>'.$i.' . &nbsp; &nbsp; &nbsp; '.$get_row['nama_brg'].'&nbsp; &nbsp; &nbsp; '.$value.' &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; SubTotal : Rp '.$sub.'</h5>
																	
																</li>';
                                                              
                                                                $i++;
                                                            }		
                                                        }
                                                        @$total += $sub;
                                                    }
                                                }
                                              ?>
                                              <?php echo '<h5 style="color:#F00">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Total Price : '.@$total.' </h5>'; ?>
                                        </ul>
                                    </div>
                                </div>          
               
                          </div>
                          <input type="hidden" value="<?php echo abs((int)$_GET['total']); ?>" name="total">
                          </form>				
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
						<h4>My Account</h4>
						<ul class="nav">
							<li><a href="loginindex.php">Login</a></li>
							<li><a href="register.php">Sign Up</a></li>
							<li><a href="#">Order History</a></li>
							<li><a href="#">Wish List</a></li>
							<li><a href="#">Newsletter</a></li>
						</ul>
					</div>
					<div class="span5">
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