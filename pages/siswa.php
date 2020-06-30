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

				<title>Master Siswa</title>

				<!-- Bootstrap Core CSS -->
				<link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

				<!-- MetisMenu CSS -->
				<link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

				<!-- DataTables CSS -->
				<link href="../vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

				<!-- DataTables Responsive CSS -->
				<link href="../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

				<!-- Custom CSS -->
				<link href="../dist/css/sb-admin-2.css" rel="stylesheet">

				<!-- Custom Fonts -->
				<link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


				<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
				<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
				<!--[if lt IE 9]>
					<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
					<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
				<![endif]-->
			<?
				include("kakashi.php");
			?>
			</head>

			<body style="overflow-y:hidden;">

				<div id="wrapper">

					<!-- Navigation -->
					<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
						<div class="navbar-header">
							<h3 style="margin:10px 0 0 20px;font-variant:small-caps;font-weight:bold;;"><strong> Administrator</h3></strong>
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
						<div class="navbar-default sidebar">
							<div class="sidebar-nav navbar-collapse">
								<ul class="nav" id="side-menu">
									<li>
										<a href="master_sistem.php" style="font-size:12px;"><img src="../icon/sistem.png" height="35px" width="35px"><b> Master Sekolah</a></b>
									</li>
									<li>
										<a href="guru.php" style="font-size:12px;"><img src="../icon/icon-guru.png" height="35px" width="35px"><b> Master Guru</a></b>
									</li>
									<li  style="background:lightblue;">
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
							<div class="col-lg-5" style="margin:10px 0 10px 0px;">
								<div class="panel panel-info">
									<div class="panel-heading" style="font-size:12px;">
										<strong>Siswa</strong>
									</div>
									<div class="panel-body" style="height:500px;overflow-y:auto;">
										<form method="POST" action="simpansiswa.php">
											<table style="table table-bordered">
												<tr>
													<td style="font-size:12px;"><strong>Nama Siswa</td></strong>
													<td style="width:30px;text-align:center;"><strong>:</td></strong>
													<td style="width:169px;padding-bottom:7px;"><input type="text" name="siswa" class="form-control"></td>
												</tr>
												<tr>
													<td style="font-size:12px;"><strong>Nomor Induk</td></strong>
													<td style="width:30px;text-align:center;"><strong>:</td></strong>
													<td style="width:169px;padding-bottom:7px;"><input type="text" name="induk" class="form-control"></td>
												</tr>
													<tr>
													<td style="font-size:12px;"><strong>Kelas</td></strong>
													<td style="width:30px;text-align:center;"><strong>:</td></strong>
													<td style="width:169px;padding-bottom:7px;">
														<select name="kelas" class="form-control">
															<option value=""></option>
															<?php
																mysql_connect('localhost','root','clusterstorm');
																mysql_select_db('sdluqman');
																	$kelas=mysql_query ("select * from m_kelas");
																	while($a_kelas=mysql_fetch_array($kelas))
																	{
																		?>
																			<option value="<?php echo $a_kelas['id']?>"><?php echo $a_kelas['kelas'];?>-<? echo $a_kelas['ruang'];?></option>
																		<?php
																	}
															?>
														</select>
													</td>
												</tr>
												<tr>
													<td style="font-size:12px;"><strong>Jenis Kelamin</td></strong>
													<td style="width:30px;text-align:center;"><strong>:</td></strong>
													<td style="width:169px;padding-bottom:7px;">
														<select style="margin:0 10px 0 0px" class="form-control" name="jk">
															<option></option>
															<option>laki-laki</option>
															<option>perempuan</option>
														</select>
													</td>
												</tr>
												<tr>
													<td style="font-size:12px;"><strong>TTL (yyyy-mm-dd)</td></strong>
													<td style="width:30px;text-align:center;"><strong>:</td></strong>
													<td style="width:169px;padding-bottom:7px;"><input type="text" name="ttl" class="form-control"></td>
												</tr>
												<tr>
													<td style="font-size:12px;"><strong>Agama</td></strong>
													<td style="width:30px;text-align:center;"><strong>:</td></strong>
													<td style="width:169px;padding-bottom:7px;"><select style="margin:0 10px 0 0px" class="form-control" name="agama">
															<option></option>
															<option>Islam</option>
															</select>
												</tr>
												<tr>
													<td style="font-size:12px;"><strong>Anak ke</td></strong>
													<td style="width:30px;text-align:center;"><strong>:</td></strong>
													<td style="width:169px;padding-bottom:7px;"><input type="text" name="anak_ke" class="form-control"></td>
												</tr>
												<tr>
													<td style="font-size:12px;"><strong>Status dalam keluarga</td></strong>
													<td style="width:30px;text-align:center;"><strong>:</td></strong>
													<td style="width:169px;padding-bottom:7px;"><input type="text" name="status" class="form-control"></td>
												</tr>
												<tr>
													<td style="font-size:12px;padding-bottom:50px;"><strong>Alamat Siswa</td></strong>
													<td style="width:30px;text-align:center;padding-bottom:50px;"><strong>:</td></strong>
													<td style="width:150px;padding-bottom:7px;">
														<textarea style="resize:none;" name="alamat" class="form-control"></textarea> 
													</td>
												</tr>
												<tr>
													<td style="font-size:12px;"><strong>Nama Ayah</td></strong>
													<td style="width:30px;text-align:center;"><strong>:</td></strong>
													<td style="width:169px;padding-bottom:7px;"><input type="text" name="ayah" class="form-control"></td>
												</tr>
												<tr>
													<td style="font-size:12px;"><strong>Nama Ibu</td></strong>
													<td style="width:30px;text-align:center;"><strong>:</td></strong>
													<td style="width:169px;padding-bottom:7px;"><input type="text" name="ibu" class="form-control"></td>
												</tr>
												<tr>
													<td style="font-size:12px;padding-bottom:50px;"><strong>Alamat Orang tua</td></strong>
													<td style="width:30px;text-align:center;padding-bottom:50px;"><strong>:</td></strong>
													<td style="width:150px;padding-bottom:7px;">
														<textarea style="resize:none;"name="ortu" class="form-control"></textarea>
													</td>
												</tr>
												<tr>
													<td style="font-size:12px;"><strong>Telepon</td></strong>
													<td style="width:30px;text-align:center;"><strong>:</td></strong>
													<td style="width:169px;padding-bottom:7px;"><input type="text" name="telpon" class="form-control"></td>
												</tr>
												<tr>
													<td style="font-size:12px;"><strong>Pekerjaan Orang tua</td></strong>
													<td style="width:30px;text-align:center;"><strong>:</td></strong>
													<td style="width:169px;padding-bottom:7px;"><input type="text" name="kerja" class="form-control"></td>
												</tr>
												<tr>
													<td style="font-size:12px;"><strong>Nama Wali</td></strong>
													<td style="width:30px;text-align:center;"><strong>:</td></strong>
													<td style="width:169px;padding-bottom:7px;"><input type="text" name="wali" class="form-control"></td>
												</tr>
												<tr>
													<td style="font-size:12px;"><strong>Alamat Wali</td></strong>
													<td style="width:30px;text-align:center;"><strong>:</td></strong>
													<td style="width:169px;padding-bottom:7px;"><input type="text" name="alamat_wali" class="form-control"></td>
												</tr>
												<tr>
													<td style="font-size:12px;"><strong>Telepon</td></strong>
													<td style="width:30px;text-align:center;"><strong>:</td></strong>
													<td style="width:169px;padding-bottom:7px;"><input type="text" name="telepon" class="form-control"></td>
												</tr>
												<tr style="height:17px"></tr>
												<tr>
													<td></td>
													<td></td>
													<td>
														<input type="submit" value="Simpan" name="simpan" class="btn btn-lg btn-success" style="font-size:16px;float:Right;">
													</td>
												</tr>
											</table>
										</form>	
									</div>
								</div>
							</div>
							<div class="col-lg-5" style="margin:10px 0 0 0px">
								<div class="panel panel-info" style="width:550px;">
									<div class="panel-heading" style="font-size:12px;">
										<b>Data Siswa</b>
									</div>
									<div class="panel-body" style="height:250px;overflow-y:auto;">
										<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
											<thead>
												<tr colspan="3">
													<td bgcolor="lightblue" align="center" style="font-size:12px;height:10px;">No</td>
													<td bgcolor="lightblue" align="center" style="font-size:12px;height:10px;">Nomor Induk</td>
													<td bgcolor="lightblue"align="center" style="font-size:12px;">Kelas</td>
													<td bgcolor="lightblue"align="center" style="font-size:12px;">Nama Siswa</td>
													<td bgcolor="lightblue"align="center" style="font-size:12px;">Jenis Kelamin</td>
													<td bgcolor="lightblue"align="center" style="font-size:12px;">ACTION</td>
												</tr>
											</thead>
											<tbody>
												<?
												$no=1;
												$siswa= mysql_query("select * from m_siswa order by id desc");
												while($a_siswa=mysql_fetch_array($siswa))
													{
														?>
															<tr style="heigth:-10px;">
																<td style="text-align:center;font-size:12px;heigth:10px;"><? echo $no++;?></td>
																<td style="text-align:center;font-size:12px;heigth:10px;"><? echo $a_siswa['no_induk'];?></td>
																<td style="text-align:center;font-size:12px;heigth:"><? echo $a_siswa['kelas'];?></td>	
																<td style="text-align:center;font-size:12px;"><? echo $a_siswa['nama_siswa'];?></td>
																<td style="text-align:center;font-size:12px;"><? echo $a_siswa['jk'];?></td>
																<td style="text-align:center;font-size:12px;width:110px;"><button class="btn btn-primary" style="font-size:10px;font-weight:bold;margin:0 2px 0 1px;float:left;" onclick="window.location='siswa.php?edit=<?php echo $a_siswa['id']?>'">Edit</button><a href="hapus-siswa.php?id=<?php echo $a_siswa['id']?>"> <button class="btn btn-danger" onclick="javascript:var y=confirm('Yakin Ingin Menghapus?');if(y==true) return true;else return false" style="font-size:10px;font-weight:bold;margin:0 1px 0 0;float:left;">Hapus</button></a></td>
															</tr>
														<?
													}											
												?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
				
							<?php
								error_reporting(E_ALL ^ E_DEPRECATED);
								if(isset($_GET['edit']))
									{
										?>
											<div class="col-lg-5" style="margin:10px 0 0 0px">
												<div class="panel panel-info" style="margin:-10px 0 0 0px;width:550px;">
													<div class="panel-heading" style="font-size:12px;">
														<strong>Edit Siswa</strong>
													</div>
														<div class="panel-body" style="height:190px;overflow-y:auto;">
														<form method="POST" action="editsiswa.php">
																<table style="table table-bordered">
																	<?php
																		$siswa=mysql_query("select*from m_siswa where id ='$_GET[edit]'");
																		$a_siswa=mysql_fetch_array($siswa);
																	?>
																	<tr>
																		<input type="hidden" name="id" value="<?php echo $a_siswa['id']?>" class="form-control"></td>
																	</tr>
																	<tr>
																		<td style="font-size:12px;"><strong>Nama Siswa</td></strong>
																		<td style="width:30px;text-align:center;"><strong>:</td></strong>
																		<td style="width:350px;padding-bottom:7px;"><input type="text" name="siswa" value="<?php echo $a_siswa['nama_siswa']?>" class="form-control"></td>
																	</tr>
																	<tr>
																		<td style="font-size:12px;"><strong>Nomor Induk</td></strong>
																		<td style="width:30px;text-align:center;"><strong>:</td></strong>
																		<td style="width:350px;padding-bottom:7px;"><input type="text" name="induk" value="<?echo $a_siswa ['no_induk']?>" class="form-control"></td>
																	</tr>
																		<tr>
																		<td style="font-size:12px;"><strong>Kelas</td></strong>
																		<td style="width:30px;text-align:center;"><strong>:</td></strong>
																		<td style="width:350px;padding-bottom:7px;">
																			<select type="text" name="kelas" value="<?echo $a_siswa ['kelas']?>" class="form-control">
																			<option>Kelas</option>
																				<?php
																					mysql_connect('localhost','root','clusterstorm');
																					mysql_select_db('sdluqman');
																						$kelas=mysql_query ("select * from m_kelas");
																						while($a_kelas=mysql_fetch_array($kelas))
																						{
																							?>
																								<option value="<?php echo $a_kelas['id']?>"><?php echo $a_kelas['kelas'];?>-<? echo $a_kelas['ruang'];?></option>
																							<?php
																						}
																				?>
																			</select>
																		</td>
																	</tr>
																	<tr>
																		<td style="font-size:12px;"><strong>Jenis Kelamin</td></strong>
																		<td style="width:30px;text-align:center;"><strong>:</td></strong>
																		<td style="width:350px;padding-bottom:7px;">
																			<select style="margin:0 10px 0 0px" class="form-control" name="jk">
																				<option><?echo $a_siswa ['jk']?></option>
																				<option>laki-laki</option>
																				<option>perempuan</option>
																			</select>
																		</td>
																	</tr>
																	<tr>
																		<td style="font-size:12px;"><strong>TTL (yyyy-mm-dd)</td></strong>
																		<td style="width:30px;text-align:center;"><strong>:</td></strong>
																		<td style="width:350px;padding-bottom:7px;"><input type="text" name="ttl" value="<?echo $a_siswa ['ttl']?>" class="form-control"></td>
																	</tr>
																	<tr>
																		<td style="font-size:12px;"><strong>Agama</td></strong>
																		<td style="width:30px;text-align:center;"><strong>:</td></strong>
																		<td style="width:350px;padding-bottom:7px;"><input type="text" name="agama" value="<?echo $a_siswa ['agama']?>" class="form-control"></td>
																	</tr>
																	<tr>
																		<td style="font-size:12px;"><strong>Anak ke</td></strong>
																		<td style="width:30px;text-align:center;"><strong>:</td></strong>
																		<td style="width:350px;padding-bottom:7px;"><input type="text" name="anak_ke" value="<?echo $a_siswa ['anak_ke']?>" class="form-control"></td>
																	</tr>
																	<tr>
																		<td style="font-size:12px;"><strong>Status dalam keluarga</td></strong>
																		<td style="width:30px;text-align:center;"><strong>:</td></strong>
																		<td style="width:350px;padding-bottom:7px;"><input type="text" name="status" value="<?echo $a_siswa ['status']?>" class="form-control"></td>
																	</tr>
																	<tr>
																		<td style="font-size:12px;padding-bottom:50px;"><strong>Alamat Siswa</td></strong>
																		<td style="width:30px;text-align:center;padding-bottom:50px;"><strong>:</td></strong>
																		<td style="width:350px;padding-bottom:7px;">
																			<textarea style="resize:none;width:100%;" class="from-control" type="text" name="alamat_siswa"><?echo $a_siswa ['alamat_siswa']?></textarea> 
																		</td>
																	</tr>
																	<tr>
																		<td style="font-size:12px;"><strong>Nama Ayah</td></strong>
																		<td style="width:30px;text-align:center;"><strong>:</td></strong>
																		<td style="width:350px;padding-bottom:7px;"><input type="text" style="resize:none;" name="ayah" value="<?echo $a_siswa ['ayah']?>" class="form-control"></td>
																	</tr>
																	<tr>
																		<td style="font-size:12px;"><strong>Nama Ibu</td></strong>
																		<td style="width:30px;text-align:center;"><strong>:</td></strong>
																		<td style="width:350px;padding-bottom:7px;"><input type="text" name="ibu" value="<?echo $a_siswa ['ibu']?>" class="form-control"></td>
																	</tr>
																	<tr>
																		<td style="font-size:12px;padding-bottom:50px;"><strong>Alamat Orang Tua</td></strong>
																		<td style="width:30px;text-align:center;padding-bottom:50px;"><strong>:</td></strong>
																		<td style="width:350px;padding-bottom:7px;">
																			<textarea style="resize:none;width:100%;" class="from-control" type="text" name="ortu"><?echo $a_siswa ['alamat_ortu']?></textarea> 
																		</td>
																	</tr>
																	<tr>
																		<td style="font-size:12px;"><strong>Telepon</td></strong>
																		<td style="width:30px;text-align:center;"><strong>:</td></strong>
																		<td style="width:350px;padding-bottom:7px;"><input type="text" name="telpon" value="<?echo $a_siswa ['telp']?>" class="form-control"></td>
																	</tr>
																	<tr>
																		<td style="font-size:12px;"><strong>Pekerjaan Orang tua</td></strong>
																		<td style="width:30px;text-align:center;"><strong>:</td></strong>
																		<td style="width:350px;padding-bottom:7px;"><input type="text" name="kerja" value="<?echo $a_siswa ['pekerjaan']?>" class="form-control"></td>
																	</tr>
																	<tr>
																		<td style="font-size:12px;"><strong>Nama Wali</td></strong>
																		<td style="width:30px;text-align:center;"><strong>:</td></strong>
																		<td style="width:350px;padding-bottom:7px;"><input type="text" value="<?echo $a_siswa ['nama_wali']?>" style="resize:none;" name="wali" class="form-control"></td>
																	</tr>
																	<tr>
																		<td style="font-size:12px;padding-bottom:50px;"><strong>Alamat Wali</td></strong>
																		<td style="width:30px;text-align:center;padding-bottom:50px;"><strong>:</td></strong>
																		<td style="width:350px;padding-bottom:7px;">
																			<textarea style="resize:none;width:100%;" class="from-control" type="text" name="alamat"><?echo $a_siswa ['alamat_wali']?></textarea> 
																		</td>
																	</tr>
																	<tr>
																		<td style="font-size:12px;"><strong>Telepon</td></strong>
																		<td style="width:30px;text-align:center;"><strong>:</td></strong>
																		<td style="width:350px;padding-bottom:7px;"><input type="text" name="telepon" value="<?echo $a_siswa ['telpon']?>" class="form-control"></td>
																	</tr>
																	<tr style="height:17px"></tr>
																	<tr>
																		<td></td>
																		<td></td>
																		<td>
																			<input type="submit" value="Simpan" name="simpan" class="btn btn-lg btn-success" style="font-size:16px;float:Right;">
																		</td>
																	</tr>
																</table>
														</form>	
													</div>
												</div>
											</div>					
										<?
									}	
									else
									{
										echo mysql_error();
									}
							?>	
						</div>
					</div>
					
						<div style="clear:both"></div>
					<div style="width:100%;height:50%;font-size:10px;text-align:center;font-size:12px;background:C0C0C0;font-family:'tohama';font-size:16px;font-color:white;margin:6px 0 0 0;">
						All Right Reserved
						EIT TEAM &copy; 2017
					</div>
					
					<!-- /#page-wrapper -->
				<!-- /#wrapper -->

				<!-- jQuery -->
				 <script src="../vendor/jquery/jquery.min.js"></script>

				<!-- Bootstrap Core JavaScript -->
				<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

				<!-- Metis Menu Plugin JavaScript -->
				<script src="../vendor/metisMenu/metisMenu.min.js"></script>

				<!-- DataTables JavaScript -->
				<script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
				<script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
				<script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>

				<!-- Custom Theme JavaScript -->
				<script src="../dist/js/sb-admin-2.js"></script>

				<!-- Page-Level Demo Scripts - Tables - Use for reference -->
				<script>
				$(document).ready(function() {
					$('#dataTables-example').DataTable({
						responsive: true
					});
				});
				</script>

			</body>

			</html>
			<?
		}
?>