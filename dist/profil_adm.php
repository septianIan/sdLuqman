<?php
	error_reporting(E_ALL ^ E_DEPRECATED ^ E_NOTICE);
	//memmanggil sesion
	session_start();
	//jika sesion tidak ditemukan akn meminta user untuk login
	if($_SESSION['jabatan']!="1")
		{
		?>
			<script>
				alert("Anda harus Login dahulu!");
				window.location="login.php";
			</script>
		<?php
		}
	else
		{
		?>			
			<!--
			Author: W3layouts
			Author URL: http://w3layouts.com
			License: Creative Commons Attribution 3.0 Unported
			License URL: http://creativecommons.org/licenses/by/3.0/
			-->
			<!DOCTYPE HTML>
			<html>
			<head>
			<title>ADMIN CV KERTAJAYA</title>
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			<meta name="keywords" content="Easy Admin Panel Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
			Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
			<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
			 <!-- Bootstrap Core CSS -->
			<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
			<!-- Custom CSS -->
			<link href="css/style.css" rel='stylesheet' type='text/css' />
			<!-- Graph CSS -->
			<link href="css/font-awesome.css" rel="stylesheet"> 
			<!-- jQuery -->
			<!-- lined-icons -->
			<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
			<!-- //lined-icons -->
			<!-- chart -->
			<script src="js/Chart.js"></script>
			<!-- //chart -->
			<!--animate-->
			<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
			<script src="js/wow.min.js"></script>
				<script>
					 new WOW().init();
				</script>
			<!--//end-animate-->
			<!----webfonts--->
			<link href='//fonts.googleapis.com/css?family=Cabin:400,400italic,500,500italic,600,600italic,700,700italic' rel='stylesheet' type='text/css'>
			<!---//webfonts---> 
			 <!-- Meters graphs -->
			<script src="js/jquery-1.10.2.min.js"></script>
			<!-- Placed js at the end of the document so the pages load faster -->

			</head> 
			   
			 <body class="sticky-header left-side-collapsed"  onload="initMap()">
				<section>
				<!-- left side start-->
					<div class="left-side sticky-left-side">
						<div class="left-side-inner">
							<!--sidebar nav start-->
								<ul class="nav nav-pills nav-stacked custom-nav">
									<li><a href="index.php"><i class="lnr lnr-power-switch"></i></a></li>      
									<li><a href="index.php"><i class="fa fa-home"></i><span>Home</a></li>      
									<li class="active"><a href="profil_adm.php"><i class="fa fa-user"></i> <span>Profil</span></a></li>
									<li><a href="galeri_adm.php"><i class="lnr lnr-indent-increase"><span>Galeri</span></i></a></li>
									<li><a href="produk_adm.php"><i class="lnr lnr-book"></i><span>Produk</span></a></li>
									<li><a href="partner_adm.php"><i class="fa fa-pencil"></i> <span>Partner</span></a></li>
								</ul>
							<!--sidebar nav end-->
						</div>
					</div>
					<!-- left side end-->
					<!-- main content start-->
					<div class="main-content">
						<!-- header-starts -->
						<div class="header-section">
						<!--notification menu start -->
						<div class="menu-right">
							<div class="user-panel-top">  	
								<div class="profile_details">		
									<ul>
										<a href="logout.php" class="btn btn-danger" style="">Logout</a><br>
									</ul>
								</div>		
							</div>
						</div>
						<div class="menu-left">
							<div class="user-panel-top">
								<img src="../images/logo.png" height="40px;" style="margin:-5px 0 3px 0px">
							</div>
						</div>
						<!--notification menu end -->
						</div>
					<!-- //header-ends -->
						<div id="page-wrapper">
							<div class="graphs">
								<div class="col-lg-5">
									<div class="panel panel-primary" style="margin:0px 0 0 0px;">
										<div class="panel-heading">
											<strong style="font-size:18px">profil</strong>
										</div>
										<div class="panel-body">
											<form  method="POST" action="simpanprofil.php" enctype="multipart/form-data">
												<table style="table table-bordered">
													<tr>
														<td style="font-size:16px"><strong>jabatan</td></strong>
														<td style="width:16px;text-align:center;"><strong>:</td></strong>
														<td style="width:100px;padding-bottom:7px;"><input type="text" name="jabatan" class="form-control"></td>
													</tr>
													<tr>
														<td style="font-size:16px"><strong>nama</td></strong>
														<td style="width:16px;text-align:center;"><strong>:</td></strong>
														<td style="width:100px;padding-bottom:7px;"><input type="text" name="nama" class="form-control"></td>
													</tr>
													<tr>
														<td style="font-size:16px"><strong>riwayat</td></strong>
														<td style="width:16px;text-align:center;"><strong>:</td></strong>
														<td style="width:100px;padding-bottom:7px;">
															<textarea style="resize:none;" name="riwayat" class="form-control"></textarea> 
														</td>
													</tr>
													<tr>
														<td style="font-size:16px"><strong>gambar</td></strong>
														<td style="width:16px;text-align:center;"><strong>:</td></strong>
														<td style="width:300px;padding-bottom:7px;"><input type="file" name="gambar" class="form-control"></td>
													</tr>
													<tr>
														<td style="font-size:16px"><strong>status</td></strong>
														<td style="width:16px;text-align:center;"><strong>:</td></strong>
														<td style="width:100px;padding-bottom:7px;">
															<select class="form-control" name="status">
																<option value="">Pilih Status</option>
																<option value="1">Atasan</option>
																<option value="2">Bawahan</option>
															</select>
														</td>
													</tr>
													<tr>
														<td colspan="3" style="padding-bottom:7px;">
															<input type="submit" value="Simpan" name="simpan" class="btn btn-lg btn-success" style="font-size:16px;float:Right;">
														</td>
													</tr>
												</table>
											</form>
										</div>
									</div>
								</div>
								<div class="col-lg-7" style="margin:0px 0 0 0px;">
									<div class="panel panel-primary">
										<div class="panel-heading">
											<strong style="font-size:18px;">hasil</strong>
										</div>
										<div class="panel-body" style="overflow-x:auto;">
											<table class='table table-bordered table-stripped'>
												<tr>
													<td style="width:16px;text-align:center;"><strong>jabatan</td></strong>
													<td style="width:16px;text-align:center;"><strong>nama</td></strong>
													<td style="width:16px;text-align:center;"><strong>riwayat</td></strong>
													<td style="width:16px;text-align:center;"><strong>gambar</td></strong>
													<td colspan="2" style="width:16px;text-align:center;"><strong>Hapus dan Edit</td></strong>
												</tr>
												<tr>
													<?php
														error_reporting(E_ALL ^ E_DEPRECATED);
														mysql_connect('localhost','root','');
														mysql_select_db('web');
														$sel=mysql_query("select * from profil order by id desc"); echo mysql_error();
														while($a_sel=mysql_fetch_array($sel))
														{
															?>
																<tr>
																	<td style="width:16px;text-align:center;"><?php echo $a_sel ['jabatan']; ?></td>
																	<td style="width:16px;text-align:center;"><?php echo $a_sel ['nama']; ?></td>
																	<td style="width:16px;text-align:center;"><?php echo $a_sel ['riwayat']; ?></td>
																	<td style="width:16px;text-align:center;">
																		<img src="../images/<?php echo$a_sel['gambar']?>" width="50px" height="50px"><br>
																		<input type="hidden" value="<?php echo $a_sel ['id']; ?>" name="id">
																	</td>
																	<td style="width:16px;text-align:center;">
																		<a href="hapusprofil.php?id=<?php echo $a_sel['id']?>" onclick="javascript:var 		y=confirm('Yakin ingin menghapus data?');if(y==true) return true;else return false">
																		<p type="button" class="btn btn-danger">hapus</p></a>
																	</td>
																	<td style="width:16px;text-align:center;">
																		<button class="btn btn-warning" onclick="window.location='profil_adm.php?edit=<?php echo $a_sel['id']?>'">edit</button>
																	</td>
																</tr>
																<tr>
																	<input type="hidden" value="<?php echo $a_sel['id'];?>">
																</tr>
															<?php
														}
													?>
												</tr>
											</table>
										</div>
									</div>
								</div>
								<?php
								error_reporting(E_ALL ^ E_DEPRECATED);
								if(isset($_GET['edit']))
									{
										?>
											<div class="col-lg-5">
												<div class="panel panel-primary" style="margin:0 0 100px 0;font-size:14px">
													<div class="panel-heading" style="text-align:center">
															<strong>EDIT profil</strong>
													</div>
														<div class="panel-body">
															<form method="POST" action="editprofil.php" enctype="multipart/form-data">
																<table>
																<?php
																	$_profil = mysql_query("select * from profil where id='$_GET[edit]'"); 
																	$a_profil= mysql_fetch_array($_profil);
																?>
																	<tr>
																		<input type="hidden" name="id" value="<?php echo $a_profil ['id']?>" class="form-control"></td>
																	</tr>
																	<tr>
																		<td style="font-size:16px"><strong>jabatan</td></strong>
																		<td style="font-size:16px;text-align:center;"><strong>:</td></strong>
																		<td style="width:100px;padding-bottom:7px;"><input type="text" name="#s" value="<?php echo $a_profil ['jabatan']?>" class="form-control"></td>
																	</tr>
																	<tr>
																		<td style="font-size:16px"><strong>nama</td></strong>
																		<td style="font-size:16px;text-align:center;"><strong>:</td></strong>
																		<td style="width:100px;padding-bottom:7px;"><input type="text" name="nama" value="<?php echo $a_profil ['nama']?>" class="form-control" style="width:350px"></td>
																	</tr>
																	<tr>
																		<td style="font-size:16px"><strong>riwayat</td></strong>
																		<td style="width:16px;text-align:center;"><strong>:</td></strong>
																		<td style="width:100px;padding-bottom:7px;">
																			<textarea style="resize:none;" name="riwayat" value="<?php echo $a_profil ['riwayat']?>" class="form-control"></textarea> 
																		</td>
																	</tr>
																	<tr>
																		<td style="font-size:16px"><strong>gambar</td></strong>
																		<td style="font-size:16px;text-align:center;"><strong>:</td></strong>
																		<td style="width:300px;padding-bottom:7px;"><input type="file" name="gambar" value="<?php echo $a_profil ['gambar']?>" class="form-control"></td>
																	</tr>
																	<tr>
																		<td colspan="3" style="padding-bottom:7px;">
																			<input type="submit" value="Simpan" name="simpan" class="btn btn-lg btn-success" style="font-size:16px;float:Right;">
																		</td>
																	</tr>
																</table>
															</form>
														</div>
												</div>
											</div>
										<?php
									}
								?>
							</div>	
						</div>
					</div>
					<!--footer section start-->
						<footer>
						   <p> <img src="../images/embrio.png" height="40px"width="150px"><font style="font-weight:bold;"> EIT Design Team &copy; 2017</font></p>
						</footer>
					<!--footer section end-->

				  <!-- main content end-->
			   </section>
			  
			<script src="js/jquery.nicescroll.js"></script>
			<script src="js/scripts.js"></script>
			<!-- Bootstrap Core JavaScript -->
			   <script src="js/bootstrap.min.js"></script>
			</body>
			</html>
		<?php
		}
?>