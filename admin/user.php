<?php
include('../inc/config.php');
include('cek-login.php');
?>
<!DOCTYPE html>
<html>
    
    <head>
        <title>User</title>
        <!-- Bootstrap -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
        <link href="assets/styles.css" rel="stylesheet" media="screen">
        <script src="js/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    </head>
    
    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                    </a>
                    <a class="brand" href="index.php">Admin Panel</a>
                    <div class="nav-collapse collapse">
                        <ul class="nav pull-right">
                            <li class="dropdown">
                                <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-user"></i><? echo $_SESSION['username'] ?><i class="caret"></i>

                                </a>
                                <ul class="dropdown-menu">
                                   <li>
                                        <a tabindex="-1" href="logout.php">Logout</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                      
               
                                                     
                    </div>
                    <!--/.nav-collapse -->
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span3" id="sidebar">
                    <ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
                        <li class="active">
                            <a href="index.php"><i class="icon-chevron-right"></i> Dashboard</a>
                        <li>
                            <a href="user.php"><i class="icon-chevron-right"></i> User</a>
                        </li>
                        <li>
                            <a href="products.php"><i class="icon-chevron-right"></i> products</a>
                        </li>
                                            
                    </ul>
                </div>
                <!--/span-->
                
                <div class="span9" id="content">
                	<?php
						if (!empty($_GET['message']) && $_GET['message'] == 'success') {
							echo '<div class="alert alert-success">' ;
							echo '<button type="button" class="close" data-dismiss="alert">&times;</button>'; 
							echo '<h4>Success Menambah User</h4>';
							echo '</div>';
						}
						else if (!empty($_GET['message']) && $_GET['message'] == 'update') {
							echo '<div class="alert alert-success">' ;
							echo '<button type="button" class="close" data-dismiss="alert">&times;</button>'; 
							echo '<h4>Success Update User</h4>';
							echo '</div>';
						}
						else if (!empty($_GET['message']) && $_GET['message'] == 'delete') {
							echo '<div class="alert alert-success">' ;
							echo '<button type="button" class="close" data-dismiss="alert">&times;</button>'; 
							echo '<h4>Success Delete User</h4>';
							echo '</div>';
						}
						
                  	?>
                    
					<div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Daftar User </div>
                            </div>
                            <div class="block-content collapse in">
                            	 <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Username</th>
                                                <th>Password</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
											$query = mysql_query("select * from pengelola");
										 
											$no = 1;
											while ($data = mysql_fetch_array($query)) {
											?>
												<tr>
													<td><?php echo $no; ?></td>
													<td><?php echo $data['username']; ?></td>
													<td><?php echo md5($data['password']); ?></td>
													<td><a href="edit-user.php?id=<?php echo $data['id']; ?>" class="btn"><i class="icon-edit"></i> Edit</a> | <a href="delete-user.php?id=<?php echo $data['id']; ?>" class="btn"><i class="icon-trash"></i>Hapus</a></td>
												</tr>
											<?php
												$no++;
											}
											?>
                                        </tbody>
                                    </table>
                            </div>
                            <div class="navbar navbar-inner block-header">
                            	 <a href="tambah-user.php" class="btn"><i class="icon-plus"></i> Add user</a>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>

                 
                </div>
            </div>
            <hr>
            <footer>
                <p>&copy; Shop 2017</p>
            </footer>
        </div>
        <!--/.fluid-container-->
       
        <script src="js/jquery-1.9.1.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/scripts.js"></script>
    </body>

</html>