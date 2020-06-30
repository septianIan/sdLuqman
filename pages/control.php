<!DOCTYPE html>
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
			<html lang="en">

			<head>

				<meta charset="utf-8">
				<meta http-equiv="X-UA-Compatible" content="IE=edge">
				<meta name="viewport" content="width=device-width, initial-scale=1">
				<meta name="description" content="">
				<meta name="author" content="">

				<title>Control</title>

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
							<h3 style="margin:10px 0 0 20px;font-variant:small-caps;font-weigth:bold;"><strong> Administrator</h3></strong>
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
									<li>
										<a href="master_sistem.php" style="font-size:12px;"><img src="../icon/sistem.png" height="35px" width="35px"><b> Master Sekolah</a></b>
										<!-- /.nav-second-level -->
									</li>
									<li>
										<a href="guru.php" style="font-size:12px;"><img src="../icon/icon-guru.png" height="35px" width="35px"><b> Master Guru</a></b>
									</li>
									<li>
										<a href="siswa.php" style="font-size:12px;"><img src="../icon/icon-siswa.png" height="35px" width="35px"><b> Master Siswa</a></b>
									</li>
									<li style="background:lightblue;">
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
							<div class="col-lg-12">
								<div class="panel panel-info" style="margin:10px 0 0 0px">
									<div class="panel-heading">
										<font style="font-size:12px;font-weight:bold;">User<br>Control</font>
									</div>
									<div class="panel-body" style="height:500px;overflow:auto;x">
										<table class="table table-bordered table-stripped">
											<thead>
												<tr bgcolor="lightblue">
													<td align="center" style="font-size:12px;font-weight:bold;"> N0</td>
													<td align="center" style="font-size:12px;font-weight:bold;"> Nama Guru</td>
													<td align="center" style="font-size:12px;font-weight:bold;"> Wali</td>
													<td align="center" style="font-size:12px;font-weight:bold;"> Mata Pelajaran</td>
													<td align="center" style="font-size:12px;font-weight:bold;"> Ekstrakulikuler</td>
													<td align="center" style="font-size:12px;font-weight:bold;"> Username</td>
													<td align="center" style="font-size:12px;font-weight:bold;"> Aktivasi Akun</td>
													<td align="center" style="font-size:12px;font-weight:bold;"> ACTION</td>
												</tr>
											</thead>
											<tbody>
												<?
													$no=1;
													$guru = mysql_query("select * from m_guru order by id asc;");
													while($a_guru = mysql_fetch_array($guru))
													{
														?>
															<form method="POST" action="deaktifasi.php">
																<tr>
																	<td align="center" style="font-size:11px;font-weight:bold;"><? echo $no++;?></td>
																	<td align="left" style="font-size:11px;"><? echo $a_guru['nama'];?></td>
																	<td align="left" style="font-size:11px;">
																		<?
																			$selWali = mysql_query("select * from m_guru where nama='$a_guru[nama]' order by nama asc");
																			while($a_selWali = mysql_fetch_array($selWali))
																			{
																				echo $a_selWali['walikelas'];
																				?><input type="hidden" name="id" value="<? echo $a_selWali['id']?>"><?
																			}
																		?>
																	</td>
																	<td style="font-size:11px;">
																		<?
																			$selPelajaran = mysql_query("select * from m_gurupelajaran where nama='$a_guru[nama]' order by pelajaran,kelas asc");
																			while($a_selPelajaran = mysql_fetch_array($selPelajaran))
																			{
																				echo $a_selPelajaran['pelajaran']." <i>".$a_selPelajaran['kelas']."</i><br>";
																			}
																		?>
																	</td>
																	<td style="font-size:12px;">
																		<?
																			$selEkstra = mysql_query("select * from m_guruekstra where nama='$a_guru[nama]' order by ekstra asc");
																			while($a_selEkstra = mysql_fetch_array($selEkstra))
																			{
																				echo $a_selEkstra['ekstra']."<br>";
																			}
																		?>
																	</td>
																	<td style="font-size:12px;text-align:center;">
																		<? echo $a_guru['username'];?>
																	</td>
																	<td style="font-size:12px;text-align:center;">
																		<?
																			if($a_guru['aktifasi'] == '0')
																				$aktif = "<font style='color:red'>Belum Aktif</font>";
																			else
																				$aktif = "<font style='color:green'>Sudah Aktif</font>";

																			echo $aktif;
																		?>
																	</td>
																	<td align="center"><input type="submit" class="btn btn-danger" onclick="javascript:var y=confirm('Yakin Ingin Nonaktivasi?');if(y==true) return true;else return false" value="Nonaktifasi" style="font-size:12px;font-weight:bold;"></form>
																	
																	<a href="../content/aktivasi.php"><button style="font-size:12px;font-weight:bold;margin:0 0 0 2px" class="btn btn-warning">Aktifasi</button></a></td>
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
					</div>
					<!-- /#page-wrapper -->

				</div>
				<div style="clear:both"></div>
					<div style="width:100%;height:50%;font-size:10px;text-align:center;font-size:12px;background:C0C0C0;font-family:'tohama';font-size:16px;font-color:white;margin:13px 0 0 0;">
						All Right Reserved
							EIT TEAM &copy; 2017
					</div>
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