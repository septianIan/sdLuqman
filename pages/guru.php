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

				<title>Master Guru</title>

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
				
				<script>
					function aktifKelasWali()
					{
						if(document.forms['identitasGuru'].waliKelasStat.value == "1")
						{
							document.forms['identitasGuru'].kelasWaliTrue.style.display = "block";
							document.forms['identitasGuru'].kelasWaliFalse.style.display = "none";
						}
						
						else
						{
							document.forms['identitasGuru'].kelasWaliFalse.style.display = "block";
							document.forms['identitasGuru'].kelasWaliTrue.style.display = "none";
						}
					}
				</script>
			</head>

			<body>
				<?
					include ("kakashi.php");
				?>
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
									<li style="background:lightblue;">
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
							<div class="col-lg-5">
								<div class="panel panel-info" style="margin:10px 0 0 0;font-size:12px;">
									<div class="panel-heading" style="font-size:12px;">
										<b>Tambah Identitas Guru</b>
									</div>
									<div class="panel-body" style="height:480px;overflow-y:auto;">
										<form method="POST" name="identitasGuru" action="simpanguru.php" enctype="multipart/form-data">
											<table>
												<tr>
													<td style="width:100px;">NUPTK</td>
													<td style="width:3px;text-align:center;">:</td>
													<td style="width:300px;text-align:center;">
														<input type="text" class="form-control" name="nip" autocomplete="off" style="font-size:12px;">
													</td>
												</tr>
												<tr style="height:3px;"></tr>
												<tr>
													<td style="width:100px;">Nama</td>
													<td style="width:3px;text-align:center;">:</td>
													<td style="width:300px;text-align:center;">
														<input type="text" class="form-control" name="nama" autocomplete="off" style="font-size:12px;">
													</td>
												</tr>
												<tr style="height:3px;"></tr>
												<tr>
													<td style="width:100px;">TTL(city,yyyy-mm-dd)</td>
													<td style="width:3px;text-align:center;">:</td>
													<td style="width:300px;text-align:center;">
														<input type="text" class="form-control" name="ttl" autocomplete="off" style="font-size:12px;">
													</td>
												</tr>
												<tr style="height:3px;"></tr>
												<tr>
													<td style="width:100px;">NO.KTP</td>
													<td style="width:3px;text-align:center;">:</td>
													<td style="width:300px;text-align:center;">
														<input type="text" class="form-control" name="ktp" autocomplete="off" style="font-size:12px;">
													</td>
												</tr>
												<tr style="height:3px;"></tr>
												<tr>
													<td style="width:100px;">Alamat</td>
													<td style="width:3px;text-align:center;">:</td>
													<td style="width:300px;text-align:center;">
														<input type="text" class="form-control" name="alamat" autocomplete="off" style="font-size:12px;">
													</td>
												</tr>
												<tr style="height:3px;"></tr>
												<tr>
													<td style="width:100px;">Thn.Lulus</td>
													<td style="width:3px;text-align:center;">:</td>
													<td style="width:300px;text-align:center;">
														<input type="text" class="form-control" name="thnLulus" autocomplete="off" style="font-size:12px;">
													</td>
												</tr>
												<tr style="height:3px;"></tr>
												<tr>
													<td style="width:100px;">J.Kuliah</td>
													<td style="width:3px;text-align:center;">:</td>
													<td style="width:300px;text-align:center;">
														<input type="text" class="form-control" name="jurusan" autocomplete="off" style="font-size:12px;">
													</td>
												</tr>
												<tr style="height:3px;"></tr>
												<tr>
													<td style="width:100px;">Nama Ibu</td>
													<td style="width:3px;text-align:center;">:</td>
													<td style="width:300px;text-align:center;">
														<input type="text" class="form-control" name="ibu" autocomplete="off" style="font-size:12px;">
													</td>
												</tr>
												<tr style="height:3px;"></tr>
												<tr>
													<td style="width:100px;">No.SK guru</td>
													<td style="width:3px;text-align:center;">:</td>
													<td style="width:300px;text-align:center;">
														<input type="text" class="form-control" name="noSK" autocomplete="off" style="font-size:12px;">
													</td>
												</tr>
												<tr style="height:3px;"></tr>
												<tr>
													<td style="width:100px;">Tgl.SK</td>
													<td style="width:3px;text-align:center;">:</td>
													<td style="width:300px;text-align:center;">
														<input type="text" class="form-control" name="tglSK" autocomplete="off" style="font-size:12px;padding-bottom:7 	px;">
													</td>
												</tr>
												<tr>
													<td style="width:100px;">Foto</td>
													<td style="width:3px;text-align:center;">:</td>
													<td style="width:300px;text-align:center;">
														<input type="file" class="form-control" name="gambar" autocomplete="off" style="font-size:12px;">
													</td>
												</tr>
												<tr style="height:3px;"></tr>
												<tr>
													<td style="width:100px;">Wali Kelas</td>
													<td style="width:3px;text-align:center;">:</td>
													<td style="width:300px;text-align:center;">
														<select name="waliKelasStat" class="form-control" style="font-size:12px;" onchange="aktifKelasWali();">
															<option value="0">Wali Kelas</option>
															<option value="1">Ya</option>
															<option value="0">Tidak</option>
														</select>
													</td>
												</tr>
												<tr style="height:3px;"></tr>
												<tr>
													<td style="width:100px;">Kelas Wali</td>
													<td style="width:3px;text-align:center;">:</td>
													<td style="width:300px;text-align:center;">
														<select name="kelasWaliTrue" class="form-control" style="font-size:12px;display:none;">
															<option value="">Kelas</option>
															<?
																$selKelas = mysql_query("select * from m_kelas order by kelas asc");echo mysql_error();
																while($a_selKelas = mysql_fetch_array($selKelas))
																{
																	?>
																		<option value="<?echo $a_selKelas['id']?>"><?echo $a_selKelas['kelas']." - ".$a_selKelas['ruang']?></option>
																	<?
																}
															?>
														</select>
														<select name="kelasWaliFalse" class="form-control" style="font-size:12px;" disabled>
															<option value="">Kelas</option>
														</select>
													</td>
												</tr>
												<tr style="height:10px;"></tr>
												<tr style="height:30px;text-align:center;font-style:italic;font-weight:bold;border:solid 1px #ccc;background:#b0e0e6;">
													<td colspan="3">Mata Pelajaran Yang Diajar</td>
												</tr>
												<?
													$pel = mysql_query("select * from m_pelajaran order by pelajaran asc");
													while($a_pel = mysql_fetch_array($pel))
													{
														?>
															<tr style="height:3px;"></tr>
															<tr style="border-bottom:solid 1px #ccc;">
																<td style="width:200px;font-style:italic;">
																	<input type="checkbox" name="pelajaran[]" value="<?echo $a_pel['pelajaran']?>">&nbsp;<?echo $a_pel['pelajaran']?>
																</td>
																<td style="width:10px;text-align:center;">:</td>
																<td style="width:300px;color:black;font-style:italic;">
																	<?
																		$doraemon = mysql_query("select * from m_kelas order by kelas asc");
																		while($a_doraemon = mysql_fetch_array($doraemon))
																		{
																			?>
																				<input type="checkbox" name="<?echo str_replace(" ","_",$a_pel['pelajaran'])."[]"?>" value="<?echo $a_doraemon['kelas']."-".$a_doraemon['ruang']?>">&nbsp;<?echo $a_doraemon['kelas']."-".$a_doraemon['ruang']?>&nbsp;<br>
																			<?
																		}
																	?>
																</td>
															</tr>
														<?
													}
												?>
												<tr style="height:10px;"></tr>
												<tr style="height:30px;text-align:center;font-style:italic;font-weight:bold;border:solid 1px #ccc;background:#b0e0e6;">
													<td colspan="3">Ekstrakurikuler</td>
												</tr>
												<?
													$ekstra = mysql_query("select * from m_ekstra order by ekstra asc");
													while($a_ekstra = mysql_fetch_array($ekstra))
													{
														?>
															<tr style="height:3px;"></tr>
															<tr>
																<td style="font-style:italic;" colspan="3">
																	<input type="checkbox" name="ekstra[]" value="<?echo $a_ekstra['ekstra']?>">&nbsp;<?echo $a_ekstra['ekstra']?>
																</td>
															</tr>
														<?
													}
												?>
												<tr style="height:20px;"></tr>
												<tr>
													<td colspan="3">
														<input type="submit" class="btn btn-success" value="Simpan" style="float:right;font-size:12px;font-weight:bold;">
													</td>
												</tr>
											</table>
										</form>
									</div>
								</div>
							</div>
							<div class="col-lg-7">
								<div class="panel panel-info" style="margin:10px 0 0 0;">
									<div class="panel-heading" style="font-size:12px;">
										<b>Daftar Staff Guru</b>
									</div>
									<div class="panel-body" style="height:480px;overflow:scroll;">
										<table class="table table-bordered">
											<tr colspan="3">
												<td style="font-size:12px;font-weight:bold;" align="center" bgcolor="lightblue">NO</td>
												<td style="font-size:12px;font-weight:bold;" align="center" bgcolor="lightblue">NUPTK</td>
												<td style="font-size:12px;font-weight:bold;" align="center" bgcolor="lightblue">Nama Guru</td>
												<td style="font-size:12px;font-weight:bold;" align="center" bgcolor="lightblue">TTL</td>
												<td style="font-size:12px;font-weight:bold;" align="center" bgcolor="lightblue">Alamat</td>
												<td style="font-size:12px;font-weight:bold;" align="center" bgcolor="lightblue">No.KTP</td>
												<td style="font-size:12px;font-weight:bold;" align="center" bgcolor="lightblue">Thn.Lulus</td>
												<td style="font-size:12px;font-weight:bold;" align="center" bgcolor="lightblue">J.Kuliah</td>
												<td style="font-size:12px;font-weight:bold;" align="center" bgcolor="lightblue">Nama Ibu</td>
												<td style="font-size:12px;font-weight:bold;" align="center" bgcolor="lightblue">No.SK Guru</td>
												<td style="font-size:12px;font-weight:bold;" align="center" bgcolor="lightblue">Tgl.SK</td>
												<td style="font-size:12px;font-weight:bold;" align="center" bgcolor="lightblue">Wali Kelas</td>
												<td style="font-size:12px;font-weight:bold;" align="center" bgcolor="lightblue">Mapel</td>
												<td style="font-size:12px;font-weight:bold;" align="center" bgcolor="lightblue">Ekstra</td>
												<td style="font-size:12px;font-weight:bold;" align="center" bgcolor="lightblue">Action</td>
											</tr>
												<tr>
													<?
														$no=1;
														$sel= mysql_query("select * from m_guru order by id asc");
														while($a_sel= mysql_fetch_array($sel))
														{
															?>
																<tr>
																	<td style="font-size:12px" align="center"><?php echo $no++;?></td>
																	<td style="font-size:12px" align="left"><?php echo $a_sel['nip']?></td>
																	<td style="font-size:12px" align="left"><?php echo $a_sel['nama']?></td>
																	<td style="font-size:12px" align="left"><?php echo $a_sel['ttl']?></td>
																	<td style="font-size:12px" align="left"><?php echo $a_sel['noKtp']?></td>
																	<td style="font-size:12px" align="left"><?php echo $a_sel['alamat']?></td>
																	<td style="font-size:12px" align="left"><?php echo $a_sel['thnLulus']?></td>
																	<td style="font-size:12px" align="left"><?php echo $a_sel['jurusan']?></td>
																	<td style="font-size:12px" align="left"><?php echo $a_sel['ibu']?></td>
																	<td style="font-size:12px" align="left"><?php echo $a_sel['noSK']?></td>
																	<td style="font-size:12px" align="left"><?php echo $a_sel['tglSK']?></td>
																	<td style="font-size:12px" align="left"><?php echo $a_sel['walikelas']?></td>
																	<td style="font-size:12px" align="left">
																		<?
																			$selPelajaran = mysql_query("select * from m_gurupelajaran where nama='$a_sel[nama]' order by pelajaran,kelas asc");
																			while($a_selPelajaran = mysql_fetch_array($selPelajaran))
																			{
																				echo $a_selPelajaran['pelajaran']." ".$a_selPelajaran['kelas']."<br>";
																			}
																		?>
																	</td>
																	<td style="font-size:12px" align="left">
																		<?
																			$selEkstra = mysql_query("select * from m_guruekstra where nama='$a_sel[nama]' order by ekstra asc");
																			while($a_selEkstra = mysql_fetch_array($selEkstra))
																			{
																				echo $a_selEkstra['ekstra']."<br>";
																			}
																		?>
																	</td>
																	<td style="font-size:12px" align="left">
																		<a href="hapusguru.php?id=<?php echo $a_sel['id']?>"> <button class="btn btn-danger" onclick="javascript:var y=confirm('Yakin Ingin Menghapus?');if(y==true) return true;else return false" style="font-size:10px;font-weight:bold;margin:0 1px 0 0;float:left;">Hapus</button>
																	</td>
																</tr>
															<?
														}
													?>
												</tr>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div style="clear:both"></div>
					<div style="width:100%;height:50%;font-size:10px;text-align:center;font-size:12px;background:C0C0C0;font-family:'tohama';font-size:16px;font-color:white;margin:10px 0 0 0;">
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
