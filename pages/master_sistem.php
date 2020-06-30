<?php
	error_reporting(E_ALL ^ E_DEPRECATED ^ E_NOTICE);
	//memmanggil sesion
	session_start();
	//jika sesion tidak ditemukan akn meminta user untuk login
	if($_SESSION['username']!="admin")
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
			<!DOCTYPE html>
			<html lang="en">

			<head>

				<meta charset="utf-8">
				<meta http-equiv="X-UA-Compatible" content="IE=edge">
				<meta name="viewport" content="width=device-width, initial-scale=1">
				<meta name="description" content="">
				<meta name="author" content="">
				
				<title>Master Sistem</title>

				<!-- Bootstrap Core CSS -->
				<link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

				<!-- MetisMenu CSS -->
				<link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

				<!-- Custom CSS -->
				<link href="../dist/css/sb-admin-2.css" rel="stylesheet">

				<!-- Morris Charts CSS -->
				<link href="../vendor/morrisjs/morris.css" rel="stylesheet">

				<!-- Custom Fonts -->
				<link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

				<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
				<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
				<!--[if lt IE 9]>
					<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
					<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
				<![endif]-->

			</head>

			<body>

				<div id="wrapper">
				<?
					include ("kakashi.php");
				?>

					<!-- Navigation -->
					<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
						<div class="navbar-header">
							<h3 style="margin:10px 0 0 20px;font-variant:small-caps;font-weight:bold;"><strong>  Administrator</h3></strong>
						</div>
						<div style="float:right;margin:10px 30px 0 0;">
							<a>
								<?
									$adm = mysql_query("select * from m_param where param='namaAdmin'");
									$a_adm = mysql_fetch_array($adm);
								?>
								<?echo $a_adm['value'];?> |
							</a>
							<a href="login.php" onclick="javascript:var t = confirm ('yakin ingin keluar?'); if(t==true)return true; else return false">
								<button type="button" class="btn btn-sm btn-danger">Log Out</button>
							</a>
						</div>
						<!-- /.navbar-header -->
						
						<ul class="nav navbar-top-links navbar-right">
								<!-- /.dropdown-messages -->
							
							<!-- /.dropdown -->
							
								<!-- /.dropdown-tasks -->
							
							<!-- /.dropdown -->
							
								<!-- /.dropdown-alerts -->
					 
							<!-- /.dropdown -->
								
								<!-- /.dropdown-user -->

							<!-- /.dropdown -->
						</ul>
						<!-- /.navbar-top-links -->

						<div class="navbar-default sidebar">
							<div class="sidebar-nav navbar-collapse">
								<ul class="nav" id="side-menu">
									<li style="background:lightblue;">
										<a href="master_sistem.php" style="font-size:12px;"><img src="../icon/sistem.png" height="35px" width="35px"><b> Master Sekolah</a></b>
										<!-- /.nav-second-level -->
									</li>
									<li>
										<a href="guru.php" style="font-size:12px;"><img src="../icon/icon-guru.png" height="35px" width="35px"><b> Master Guru</a></b>
									</li>
									<li>
										<a href="siswa.php" style="font-size:12px;"><img src="../icon/icon-siswa.png" height="35px" width="35px"><b> Master Siswa</a></b>
									</li>
									<li>
										<a href="control.php" style="font-size:12px;"><img src="../icon/setting.png" height="35px" width="35px"><b> User Control</a></b>
									</li>
								</ul>
							</div>
							<!-- /.sidebar-collapse -->
						</div>
						<!-- /.navbar-static-side -->
					</nav>

					<div id="page-wrapper">
						<div class="row">
							<div class="col-lg-3">
								<div class="panel panel-info" style="margin:10px 0 10px 0px;">
									<div class="panel-heading">
										<font style="font-size:12px;font-weight:bold;">Master Kelas</font>
									</div>
									<div class="panel-body">
										<table style="table table-bordered">
											<form method="POST" action="simpanMasterKelas.php">
												<tr>
													<td style="font-size:12px;"><strong>Kelas</td></strong>
													<td style="width:30px;text-align:center;font-size:12px;"><strong>:</td></strong>
													<td style="width:169px;padding-bottom:7px;"><input style="font-size:12px;" type="text" name="a" class="form-control"></td>
												</tr>
												<tr>
													<td style="font-size:12px;"><strong>Ruang</td></strong>
													<td style="width:30px;text-align:center;font-size:12px;"><strong>:</td></strong>
													<td style="width:169px;padding-bottom:7px;"><input style="font-size:12px;" type="text" name="b" class="form-control"></td>
												</tr>
												<tr style="height:5px"></tr>
												<tr>
													<td></td>
													<td></td>
													<td>
														<input type="submit" value="Simpan" name="simpan" class="btn btn-lg btn-success" style="font-size:12px;float:Right;font-weight:bold;">
													</td>
												</tr>
											</form>							
										</table>
									</div>
								</div>
							</div>
							<div class="col-lg-3">
								<div class="panel panel-info" style="margin:10px 0 10px 0px;"height="200px">
									<div class="panel-heading">
										<font style="font-size:12px;font-weight:bold;">Master Pelajaran</font>
									</div>
									<div class="panel-body">
										<table style="table table-bordered">
											<form action="simpanMasterPelajaran.php" method="POST">
												<tr>
													<td style="font-size:12px;"><strong>Pelajaran</td></strong>
													<td style="width:30px;text-align:center;font-size:12px;"><strong>:</td></strong>
													<td style="width:169px;padding-bottom:7px;"><input style="font-size:12px;" type="text" name="a" class="form-control"></td>
												</tr>
												<tr style="height:5px"></tr>
												<tr>
													<td></td>
													<td></td>
													<td>
														<input type="submit" value="Simpan" name="simpan" class="btn btn-lg btn-success" style="font-size:12px;float:Right;font-weight:bold;">
													</td>
												</tr>
											</form>
										</table>
									</div>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="panel panel-info" style="margin:10px 0 10px 0px;">
									<div class="panel-heading">
										<font style="font-size:12px;font-weight:bold;">Identitas Sekolah</font>
									</div>
									<div class="panel-body" style="height:350px;overflow-y:auto;">
										<form action="ubahIdentitasSekolah.php" method="POST">
											<table style="table table-bordered">
												<tr>
													<td style="font-size:12px;"><strong>NPSN/NSS</td></strong>
													<td style="width:30px;text-align:center;font-size:12px;"><strong>:</td></strong>
													<td style="width:400px;padding-bottom:7px;">
														<?
															$nss = mysql_query("select * from m_param where param='nss'");
															$a_nss = mysql_fetch_array($nss);
														?>
														<input style="font-size:12px;" type="text" value="<?echo $a_nss['value']?>" name="nss" class="form-control">
													</td>
												</tr>
												<tr>
													<td style="font-size:12px;"><strong>Nama Sekolah</td></strong>
													<td style="width:30px;text-align:center;font-size:12px;"><strong>:</td></strong>
													<td style="width:400px;padding-bottom:7px;">
														<?
															$namaSekolah = mysql_query("select * from m_param where param='namaSekolah'");
															$a_namaSekolah = mysql_fetch_array($namaSekolah);
														?>
														<input style="font-size:12px;" type="text" value="<?echo $a_namaSekolah['value']?>" name="namaSekolah" class="form-control">
													</td>
												</tr>
												<tr style="height:5px"></tr>
												<tr>
													<td style="font-size:12px;"><strong>Alamat Sekolah</td></strong>
													<td style="width:30px;text-align:center;font-size:12px;"><strong>:</td></strong>
													<td style="width:400px;padding-bottom:7px;">
														<?
															$alamatSekolah = mysql_query("select * from m_param where param='alamatSekolah'");
															$a_alamatSekolah = mysql_fetch_array($alamatSekolah);
														?>
														<input style="font-size:12px;" type="text" value="<?echo $a_alamatSekolah['value']?>" name="alamatSekolah" class="form-control">
													</td>
												</tr>
												<tr style="height:5px"></tr>
												<tr>
													<td style="font-size:12px;"><strong>No.Telepon</td></strong>
													<td style="width:30px;text-align:center;font-size:12px;"><strong>:</td></strong>
													<td style="width:400px;padding-bottom:7px;">
														<?
															$telpSekolah = mysql_query("select * from m_param where param='telpSekolah'");
															$a_telpSekolah = mysql_fetch_array($telpSekolah);
														?>
														<input style="font-size:12px;" type="text" value="<?echo $a_telpSekolah['value']?>" name="noTlp" class="form-control">
													</td>
												</tr>
												<tr style="height:5px"></tr>
												<tr>
													<td style="font-size:12px;"><strong>Website</td></strong>
													<td style="width:30px;text-align:center;font-size:12px;"><strong>:</td></strong>
													<td style="width:400px;padding-bottom:7px;">
														<?
															$webSekolah = mysql_query("select * from m_param where param='webSekolah'");
															$a_webSekolah = mysql_fetch_array($webSekolah);
														?>
														<input style="font-size:12px;" type="text" value="<?echo $a_webSekolah['value']?>" name="web" class="form-control">
													</td>
												</tr>
												<tr style="height:5px"></tr>
												<tr>
													<td style="font-size:12px;"><strong>E-Mail</td></strong>
													<td style="width:30px;text-align:center;font-size:12px;"><strong>:</td></strong>
													<td style="width:400px;padding-bottom:7px;">
														<?
															$emailSekolah = mysql_query("select * from m_param where param='emailSekolah'");
															$a_emailSekolah = mysql_fetch_array($emailSekolah);
														?>
														<input style="font-size:12px;" type="text" value="<?echo $a_emailSekolah['value']?>" name="email" class="form-control">
													</td>
												</tr>
												<tr style="height:5px"></tr>
												<tr>
													<td style="font-size:12px;"><strong>Kepala Sekolah</td></strong>
													<td style="width:30px;text-align:center;font-size:12px;"><strong>:</td></strong>
													<td style="width:400px;padding-bottom:7px;">
														<?
															$kepalaSekolah = mysql_query("select * from m_param where param='kepalaSekolah'");
															$a_kepalaSekolah = mysql_fetch_array($kepalaSekolah);
														?>
														<input style="font-size:12px;" type="text" value="<?echo $a_kepalaSekolah['value']?>" name="kepsek" class="form-control">
													</td>
												</tr>
												<tr style="height:5px"></tr>
												<tr>
													<td></td>
													<td></td>
													<td>
														<input type="submit" value="Simpan" name="edit" class="btn btn-lg btn-success" style="font-size:12px;float:Right;font-weight:bold;">
													</td>
												</tr>
											</table>
										</form>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-3">
								<div class="panel panel-info" style="margin:-190px 0 0 0px;">
									<div class="panel-heading">
										<font style="font-size:12px;font-weight:bold;">List Kelas</font>
									</div>
									<div class="panel-body" style="height:255px;overflow:auto;height:315px;">
										<table class="table table-bordered table-stripped">
											<thead>
												<tr bgcolor="lightblue">
													<td align="center" style="font-size:12px;font-weight:bold;" width="130px"> Kelas</td>
													<td align="center" style="font-size:12px;font-weight:bold;"> Hapus</td>
												</tr>
											</thead>
											<tbody>
												<?
													$cek=mysql_query("select*from m_kelas order by id asc");
													while($a_cek = mysql_fetch_array($cek))
													{
														?>
															<tr>
																<td align="center" style="font-size:12px;"><?echo $a_cek['kelas'];?>-<?echo $a_cek['ruang'];?></td>
																<td align="center"><a href="hapusListKelas.php?id=<?php echo $a_cek['id']?>"><button class="btn btn-danger" onclick="javascript:var y=confirm('Yakin Ingin Menghapus?');if(y==true) return true;else return false" style="font-size:12px;font-weight:bold;">Hapus</button></td>
															</tr>
														<?
													}
												?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<div class="col-lg-3">
								<div class="panel panel-info" style="margin:-230px 0 0 0px;">
									<div class="panel-heading">
										<font style="font-size:12px;font-weight:bold;">List Pelajaran</font>
									</div>
									<div class="panel-body" style="height:255px;overflow:auto;height:355px">
										<table class="table table-bordered table-stripped">
											<thead>
												<tr bgcolor="lightblue">
													<td align="center" style="font-size:12px;font-weight:bold;" width="130px">Pelajaran</td>
													<td align="center" style="font-size:12px;font-weight:bold;">Hapus</td>
												</tr>
											</thead>
											<tbody>
												<?
													$cik=mysql_query("select*from m_pelajaran order by id asc");
													while($a_cik=mysql_fetch_array($cik))
													{
														?>
															<tr>
																<td align="center" style="font-size:12px;"><? echo $a_cik['pelajaran'];?></td>
																<td align="center"><a href="hapusListPelajaran.php?id=<? echo $a_cik['id'];?>"><button class="btn btn-danger" onclick="javascript:var y=confirm('Yakin Ingin Menghapus?');if(y==true)return true;else return false" style="font-size:12px;font-weight:bold;">Hapus</button></a></td>
															</tr>
														<?
													}
												?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<div class="col-lg-3">
								<div class="panel panel-info" style="margin:10px 0 10px 0px;">
									<div class="panel-heading">
										<font style="font-size:12px;font-weight:bold;">Master Ekstrakulikuler</font>
									</div>
										<div class="panel-body">
											<table style="table table-bordered">
												<form action="simpanMasterExtra.php" method="POST">
													<tr>
														<td style="font-size:12px;"><strong>Ekstra</td></strong>
														<td style="font-size:12px;width:30px;text-align:center;"><strong>:</td></strong>
														<td style="width:169px;padding-bottom:7px;"><input style="font-size:12px;" type="text" name="a" class="form-control"></td>
													</tr>
													<tr style="height:5px"></tr>
													<tr>
														<td></td>
														<td></td>
														<td>
															<input type="submit" value="Simpan" name="simpan" class="btn btn-lg btn-success" style="font-size:12px;float:Right;font-weight:bold;">
														</td>
													</tr>
												</form>
											</table>
										</div>
								</div>
							</div>
							<div class="col-lg-3">
								<div class="panel panel-info" style="margin:10px 0 0 0px;">
									<div class="panel-heading">
										<font style="font-size:12px;font-weight:bold;">List Ekstrakulikuler</font>
									</div>
										<div class="panel-body" style="height:255px;overflow:auto;height:115px">
											<table class="table table-bordered table-stripped">
												<thead>
													<tr bgcolor="lightblue">
														<td align="center" style="font-size:12px;font-weight:bold;" width="130px">Ekstrakulikuler</td>
														<td align="center" style="font-size:12px;font-weight:bold;">Hapus</td>
													</tr>
												</thead>
												<tbody>
													<?
														$cak=mysql_query("select*from m_ekstra order by id asc");
														while($a_cak=mysql_fetch_array($cak))
														{
															?>
																<tr>
																	<td align="center" style="font-size:12px;"><? echo $a_cak['ekstra'];?></td>
																	<td align="center"><a href="hapusListEkstra.php?id=<? echo $a_cak['id'];?>"><button class="btn btn-danger" onclick="javascript:var y=confirm('Yakin Ingin Mengapus?');if(y==true) return true;else return false" style="font-size:12px;font-weight:bold;">Hapus</button></a></td>
																</tr>
															<?
														}
													?>
												</tbody>
											</table>
										</div>
								</div>
							</div>
						</div>
						<!-- /.row -->

									<!-- /.panel-body -->
									
									<!-- /.panel-footer -->
									
								<!-- /.panel .chat-panel -->

							<!-- /.col-lg-4 -->

						<!-- /.row -->
					</div>
					<!-- /#page-wrapper -->

				</div>
				<div style="clear:both"></div>
					<div style="width:100%;height:50%;font-size:10px;text-align:center;font-size:12px;background:C0C0C0;font-family:'tahoama';font-size:16px;font-color:white;margin:14px 0 0 0;">
						All Right Reserved
							EIT TEAM &copy; 2017
					</div
				<!-- /#wrapper -->

				<!-- jQuery -->
				<script src="../vendor/jquery/jquery.min.js"></script>

				<!-- Bootstrap Core JavaScript -->
				<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

				<!-- Metis Menu Plugin JavaScript -->
				<script src="../vendor/metisMenu/metisMenu.min.js"></script>

				<!-- Morris Charts JavaScript -->
				<script src="../vendor/raphael/raphael.min.js"></script>
				<script src="../vendor/morrisjs/morris.min.js"></script>
				<script src="../data/morris-data.js"></script>

				<!-- Custom Theme JavaScript -->
				<script src="../dist/js/sb-admin-2.js"></script>

			</body>

			</html>
			<?
		}
?>