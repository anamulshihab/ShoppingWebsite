<?php
include('inc/config.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Total Orders</title>
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
									<li><a href="products.php">T-Shirts</a></li>
								</ul>
							</li>							
							<li><a href="about.php">About</a></li>
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
						<?php
												  
							  $nama = $_POST['nama'];
							  $alamat = $_POST['alamat'];
							  $email = $_POST['email'];
							  $telp = $_POST['telepon'];
							  $total = $_POST['total'];
							  
							  echo '<a href="index.php">Kembali</a><br>';
							  
							  echo 'Terima kasih Anda sudah berbelanja di Toko Online kami. Dan berikut ini adalah data yang anda masukkan.';
							  echo '<p>Total biaya untuk pembelian Produk adalah '.$total.' dan biaya bisa di kirimkan melalui Rekening Bank BCA cabang Surabaya dengan nomor rekening xxxx-xxxx-xxxx atas nama Si XXXX.</p>';
							  echo '<p>Dan barang akan kami kirim ke alamat di bawah ini:</p>';
							  echo '<p>Nama : '.$nama.'<br>';
							  echo '<p>Alamat Lengkap : '.$alamat.'</p>';
			  				  echo '<p>Total Belanja Anda : '.$total.'</p>';
							  echo '<p>Dengan Rincian : </p>';
							  
							  $p = mysql_query("SELECT * FROM pembeli");
							  $cek = mysql_fetch_array($p);
							  $c1 = $cek['nama'];
							  $c2 = $cek['alamat'];
							  $c3 = $cek['email'];
							  $c4 = $cek['telp'];
							  
							  if($c1 == $nama && $c2 == $alamat && $c3 == $email && $c4 == $telp)
							  {
									$i=1;
									foreach($_SESSION as $name => $value)
									{
										if($value > 0)
										{
											if(substr($name, 0, 5) == 'cart_')
											{
												$id = substr($name, 5, (strlen($name)-5));
												$get = mysql_query("SELECT * FROM barang WHERE id_brg='$id'");
												while($get_row = mysql_fetch_assoc($get)){
													$sub = $get_row['harga_brg'] * $value;
													
													echo '<p>'.$i.' '.$get_row['id_brg'].' '.$get_row['nama_brg'].' '.$value.' SubTotal : Rp '.$sub.'</p>								';										  	
													
													$getPembeli = mysql_query("SELECT pembeli.id_pembeli, pembeli.nama, pembeli.alamat, barang.id_brg, barang.nama_brg FROM pembeli, barang WHERE nama='$nama' AND alamat='$alamat'" ) or die(mysql_error());
													
													$data = mysql_fetch_array($getPembeli);
									  
													$pemb = $data['id_pembeli'];
													$na = $data['nama'];
													$al = $data['alamat'];
													$ib = $get_row['id_brg'];
													$nb = $get_row['nama_brg'];
													
													//echo $total;
													$i++;	  			
												}		
											}
											//@$total += $sub;
											mysql_query("INSERT INTO pesan VALUES('', '$pemb', '$na', '$al', '$ib', '$nb', '$value', '$sub', now()) ") or die(mysql_error());
										}
									}							  		  
							  }
							  else
							  {
   								    //Insert Data Pembeli ke Database 
								    $query = mysql_query("INSERT INTO pembeli VALUES('', '$nama', '$alamat', '$email', '$telp')") or die(mysql_error());  
							  		
									$i=1;
									foreach($_SESSION as $name => $value)
									{
										if($value > 0)
										{
											if(substr($name, 0, 5) == 'cart_')
											{
												$id = substr($name, 5, (strlen($name)-5));
												$get = mysql_query("SELECT * FROM barang WHERE id_brg='$id'");
												while($get_row = mysql_fetch_assoc($get)){
													$sub = $get_row['harga_brg'] * $value;
													
													echo '<p>'.$i.' '.$get_row['id_brg'].' '.$get_row['nama_brg'].' '.$value.' SubTotal : Rp '.$sub.'</p>								';										  	
													
													$getPembeli = mysql_query("SELECT pembeli.id_pembeli, pembeli.nama, pembeli.alamat, barang.id_brg, barang.nama_brg FROM pembeli, barang WHERE nama='$nama' AND alamat='$alamat'" ) or die(mysql_error());
													
													$data = mysql_fetch_array($getPembeli);
									  
													$pemb = $data['id_pembeli'];
													$na = $data['nama'];
													$al = $data['alamat'];
													$ib = $get_row['id_brg'];
													$nb = $get_row['nama_brg'];
													
													//echo $total;
													$i++;	  			
												}		
											}
											//@$total += $sub;
											mysql_query("INSERT INTO pesan VALUES('', '$pemb', '$na', '$al', '$ib', '$nb', '$value', '$sub', now()) ") or die(mysql_error());
										}
									}
							  }
							   
							  
							  
							  /*if ($query) 
							  {
								  header('location:index.php');
							  }*/
							  
							  session_destroy();
						  ?>		
                          	
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
    </body>
</html>