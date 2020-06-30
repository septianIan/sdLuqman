<?
	$db = "sdluqman";
	$pelajaran = $_GET['pelajaran'];
	$kelas = str_replace("-","",$_GET['kelas']);
	$table = strtolower($pelajaran.$kelas);
	
	#CEK TABEL
	$cekTable = mysql_query("select count(*) as komo from information_schema.TABLES where TABLE_SCHEMA='$db' and TABLE_NAME='$table'");
	$a_cekTable = mysql_fetch_array($cekTable);
	
	#KKM
	$selkkm=mysql_query("select * from m_kkm where kelas='$_GET[kelas]'");
	$a_selkkm=mysql_fetch_array($selkkm);
?>
<div class="row">
	<div class="col-lg-12" style="margin:20px 0 0 0px;">
		<div class="panel panel-default" style="border:none;">
			<div class="panel-body">
				<div style="float:left;font-size:14px;margin:-10px 0 0 0;line-height:100%;color:black;">
					<?
						$pel = str_replace("_"," ",$_GET['pelajaran']);
						echo "<b>".$pel."</b><br>";
						echo "<font style='font-size:12px;font-style:italic;'>Kelas : ".$_GET['kelas']."</font>";
					?>
				</div>
				
				<div style="float:right">
					<?
						if($a_cekTable['komo'] == "0")
						{
							?>
								<font style="font-weight:bold;font-size:12px;color:Red;font-style:italic;">Tabel penyimpan data pelajaran <?echo str_replace("_"," ",$pelajaran)?> belum dibuat</font>
							<?
						}
						
						else
						{
							?>
								<table style="font-size:12px;">
									<td style="width:100px;">
										<img src="../icon/edit.png" width="20px" height="20px">
										<a href="index.php?menu=nilaiPelajaran&pelajaran=<?echo $_GET['pelajaran']?>&kelas=<?echo $_GET['kelas']?>&action=setKkm">
											Set KKM 
										</a>
									</td>
									<td style="width:100px;">
										<img src="../icon/absen.png" width="20px" height="20px">
										<a href="index.php?menu=nilaiPelajaran&pelajaran=<?echo $_GET['pelajaran']?>&kelas=<?echo $_GET['kelas']?>&action=editNilai">
											Edit Nilai
										</a>
									</td>
									<td style="width:120px;">
										<img src="../icon/tambah.jpg" width="20px" height="20px">
										<a href="index.php?menu=nilaiPelajaran&pelajaran=<?echo $_GET['pelajaran']?>&kelas=<?echo $_GET['kelas']?>&action=tambahNilai">
											Tambah Nilai
										</a>
									</td>
									<td style="width:100px;">
										<img src="../icon/print.png" width="20px" height="20px">
										<a href="cetakNilai.php?pelajaran=<?echo $_GET['pelajaran']?>&kelas=<?echo $_GET['kelas']?>" target="_blank">
											Cetak Nilai
										</a>
									</td>
								</table>
							<?
						}
					?>
				</div>
			</div>
		</div>
	</div>	
</div>
<div class="row">
	<div class="col-lg-12">
		<?
			#JIKA BELUM DICREATE MAKA KELUAR FORM CREATE TABLE
			if($a_cekTable['komo'] == 0)
			{
				?>
					<div class="col-lg-3"></div>
					<div class="col-lg-6">
						<div class="panel panel-warning" style="font-size:12px;margin:75px 0 0 0;">
							<form action="buatTabelPelajaran.php" method="POST">
								<div class="panel-heading">
									<b>Pembuatan table <?echo str_replace("_"," ",$pelajaran)?></b>
								</div>
								<div class="panel-body" style="height:200px;">
									<b><i>Tabel penyimpanan data untuk pelajaran <?echo str_replace("_"," ",$pelajaran)?> belum dibuat, ijinkan sistem untuk membuat tabel penyimpan data nilai pelajaran di dalam database?</b></i><br>
									<center>
										<input type="hidden" name="nama" value="<? echo $table;?>">
										<input type="hidden" name="pelajaran" value="<? echo $_GET['pelajaran'];?>">
										<input type="hidden" name="kelas" value="<? echo $_GET['kelas'];?>">
										<input type="submit" class="btn btn-success" value="Ijinkan sistem membuat tabel" style="margin:100px 0 0 0;font-size:12px;">
									</center>
								</div>
							</form>
						</div>
					</div>
				<?
			}
			
			#JIKA SUDAH DICREATE, MAKA KELUAR FORM NILAI
			else
			{
				if(isset($_GET['action']))
				{
					if($_GET['action'] == "setKkm")
					{
						#CEK KKM UNTUK PELAJARAN
						$cekKkm = mysql_query("select* from m_kkm where pelajaran='$_GET[pelajaran]' and kelas='$_GET[kelas]'");
						$r_cekKkm = mysql_num_rows($cekKkm);
					
						#JIKA SUDAH ADA DI M_KKM, FORM UPDATE
						if($r_cekKkm != 0)
						{
							$kkm= mysql_query("select * from m_kkm where pelajaran='$_GET[pelajaran]' and kelas='$_GET[kelas]'");
							$a_kkm = mysql_fetch_array($kkm);
							?>
								<div class="col-lg-3"></div>
									<div class="col-lg-6">
										<div class="panel panel-warning" style="font-size:12px;margin:75px 0 0 0;">
											<div class="panel-heading">
												<b>Edit KKM <?echo str_replace("_"," ",$_GET['pelajaran'])." ".$_GET['kelas']?></b>
											</div>
											<div class="panel-body">
												<form name="setKkm" action="process.php?doraemon=editKkm" method="POST">
													<table>
														<tr style="height:30px;">
															<td style="width:150px;text-align:left;">
																KKM Nilai
															</td>
															<td style="width:10px;text-align:center;">:</td>
															<td style="width:500px;">
																<input type="text" name="kkm" autocomplete="off" autofocus class="form-control" value="<?echo $a_kkm['kkm']?>">
																<input type="hidden" name="pelajaran" value="<?echo $_GET['pelajaran']?>">
																<input type="hidden" name="kelas" value="<?echo $_GET['kelas']?>">
																<input type="hidden" name="url" value="<?echo $_SERVER['REQUEST_URI']?>">
															</td>
														</tr>
													</table>
													<input type="submit" name="saveKkm" value="Simpan KKM" class="btn btn-success" style="font-size:12px;float:right;margin-top:20px;">
												</form>
											</div>
										</div>
									</div>
							<?
						}
						
						#JIKA BELUM DI M_KKM, FORM INSERT
						else
						{
							?>
								<div class="col-lg-3"></div>
									<div class="col-lg-6">
										<div class="panel panel-warning" style="font-size:12px;margin:75px 0 0 0;">
											<div class="panel-heading">
												<b>Set KKM <?echo str_replace("_"," ",$_GET['pelajaran'])." ".$_GET['kelas']?></b>
											</div>
											<div class="panel-body">
												<form name="setKkm" action="process.php?doraemon=setKkm" method="POST">
													<table>
														<tr style="height:30px;">
															<td style="width:150px;text-align:left;">
																KKM Nilai
															</td>
															<td style="width:10px;text-align:center;">:</td>
															<td style="width:500px;">
																<input type="text" name="kkm" autocomplete="off" autofocus class="form-control">
																<input type="hidden" name="pelajaran" value="<?echo $_GET['pelajaran']?>">
																<input type="hidden" name="kelas" value="<?echo $_GET['kelas']?>">
																<input type="hidden" name="url" value="<?echo $_SERVER['REQUEST_URI']?>">
															</td>
														</tr>
													</table>
													<input type="submit" name="saveKkm" value="Simpan KKM" class="btn btn-success" style="font-size:12px;float:right;margin-top:20px;">
												</form>
											</div>
										</div>
									</div>
							<?
						}
					}
					
					elseif($_GET['action'] == "editNilai")
					{
						?>
							<div class="row">
								<div class="col-lg-12">
									<div class="panel panel-info" style="margin:10px 0 0 0px;">
										<div class="panel-heading">
											<b>KELAS : <? echo$_GET['kelas'];?></b>
										</div>
										<div class="panel-body" style="overflow:scroll;">
											<table>
												<tr style="font-size:11px;color:black;border-top:solid 1px #ccc;border-bottom:solid 1px #ccc;font-weight:bold;background:lightblue;">
													<td style="font-size:11px;color:black;border-right:solid 1px #ccc;border-left:solid 1px #ccc;text-align:center;"width="50px"><b>No</td>
													<td style="font-size:11px;color:black;border-right:solid 1px #ccc;" align="center"  width="550px"><b>Nama Siswa</td>
													<td style="font-size:11px;color:black;border-right:solid 1px #ccc;" align="center"  width="50px"><b>KKM</td>
													<?
														$tag = mysql_query("select distinct(tag) as tag from $table order by marker asc");
														while($a_tag = mysql_fetch_array($tag))
														{
															$urutan = mysql_query("select distinct(urutan) as urutan from $table where tag='$a_tag[tag]' order by urutan asc");
															while($a_urutan=mysql_fetch_array($urutan))
															{
																if ($a_tag !='R')
																{
																	if($a_tag['tag'] == "T" or $a_tag['tag'] == "UH")
																	{
																		?>
																			<td style="font-size:11px;color:black;border-right:solid 1px #ccc;text-align:center;width:50px">
																				<?echo $a_tag['tag'].$a_urutan['urutan']?><br>
																			</td>
																		<?	
																	}
																	if($a_tag['tag'] == "P")
																	{
																		?>
																			<td style="font-size:11px;color:black;border-right:solid 1px #ccc;text-align:center;width:50px">
																				<?echo $a_tag['tag'].$a_urutan['urutan']?><br>
																			</td>
																		<?	
																	}
																	elseif($a_tag['tag'] == "UTS")
																	{
																		?>
																			<td style="font-size:11px;color:black;border-right:solid 1px #ccc;text-align:center;width:50px">
																				<?echo $a_tag['tag']?><br>
																			</td>
																		<?	
																	}
																	else if($a_tag['tag'] =="UAS")
																	{
																		?>
																			<td style="font-size:11px;color:black;border-right:solid 1px #ccc;text-align:center;width:50px">
																				<?echo $a_tag['tag']?><br>
																			</td>
																		<?
																	}
																	else
																	{
																		//nothing
																	}
																}
																else
																{
																	//nothing
																}
															}
														}
													?>
													<td style="font-size:11px;color:black;border-right:solid 1px #ccc;text-align:center;width:50px">Rata-1</td>
													<td style="font-size:11px;color:black;border-right:solid 1px #ccc;text-align:center;width:50px">Rata-2</td>
													<td style="font-size:11px;color:black;border-right:solid 1px #ccc;text-align:center;width:50px">Rata-3</td>
													<td style="font-size:11px;color:black;border-right:solid 1px #ccc;text-align:center;width:50px">Rata Harian</td>
													<td style="font-size:11px;color:black;border-right:solid 1px #ccc;text-align:center;width:50px">2 X UAS</td>
													<td style="font-size:11px;color:black;border-right:solid 1px #ccc;text-align:center;width:50px">Nilai Raport</td>
													<td style="font-size:11px;color:black;border-right:solid 1px #ccc;text-align:center;width:50px"><b>Action</td>
												</tr>
												<?
													$no=1;
													$idclass = mysql_query("select * from m_kelas where kelasRuang='$_GET[kelas]'");
													$a_idclass = mysql_fetch_array($idclass);
													
													$namakelas = mysql_query("select * from m_siswa where kelas ='$a_idclass[id]' order by nama_siswa asc");
													while($a_namakelas =mysql_fetch_array($namakelas))
													{
														?>
															<form method="POST" name="simpanEditNilai" action="process.php?doraemon=simpanEditNilai">
																<tr style="border-bottom:solid 1px #ccc;">
																	<td style="font-size:11px;border-left:solid 1px #ccc;border-right:solid 1px #ccc;text-align:center;"><? echo $no++; ?></td>
																	<td style="font-size:11px;border-right:solid 1px #ccc;padding:3px 3px;"><? echo $a_namakelas['nama_siswa'];?></td>
																	<td style="font-size:11px;border-right:solid 1px #ccc;text-align:center;"><? echo $a_selkkm['kkm'];?></td>
																	<?	
																		$nilaiT = 0;
																		$jumT = 0;
																		$nilaiUH = 0;
																		$jumUH = 0;
																		$nilaiP = 0;
																		$jumP = 0;
																		$nilaiUTS = 0;
																		$jumUTS = 0;
																		$nilaiUAS = 0;
																		$jumUAS = 0;
																		
																		$tagNilai = mysql_query("select distinct(tag) as tag from $table order by marker asc");
																		while($a_tagNilai = mysql_fetch_array($tagNilai))
																		{	
																			$urutanNilai = mysql_query("select distinct(urutan) as urutan from $table where tag='$a_tagNilai[tag]' order by urutan asc");
																			while($a_urutanNilai = mysql_fetch_array($urutanNilai)) 	
																			{
																				$nilaiTarget = mysql_query("select * from $table where noInduk='$a_namakelas[no_induk]' and tag='$a_tagNilai[tag]' and urutan='$a_urutanNilai[urutan]'");
																				$a_nilaiTarget = mysql_fetch_array($nilaiTarget);
																		
																				?>
																					<td style="width:60px;border-right:solid 1px #ccc;text-align:center;">
																						<?
																							if($a_nilaiTarget['nilai'] < $a_selkkm['kkm'])
																							{
																								?>
																									<input type="text" name="nilai[]" style="font-size:11px;color:Red;border:none;text-align:center;" autocomplete="off" value="<?echo $a_nilaiTarget['nilai']?>" class="form-control">
																								<?
																							}

																							else
																							{
																								?>
																									<input type="text" name="nilai[]" style="font-size:11px;color:black;border:none;text-align:center;" autocomplete="off" value="<?echo $a_nilaiTarget['nilai']?>" class="form-control">
																								<?
																							}
																						?>
																						<input type="hidden" name="id[]" value="<?echo $a_nilaiTarget['id']?>">
																					</td>
																				<?
																			}
																		}
																	?>																	
																	<td style="width:50px;border-right:solid 1px #ccc;text-align:center;font-size:11px;font-weight:bold;">
																		<?
																			//rata-rata tugas
																			$pembagiTugas = 0;
																			$jumTugas = 0;
																			$nilaiTugas=mysql_query("select * from $table where tag='T' and noInduk='$a_namakelas[no_induk]'");
																			while($a_nilaiTugas=mysql_fetch_array($nilaiTugas))
																			{
																				$jumTugas = $jumTugas + $a_nilaiTugas['nilai'];
																				$pembagiTugas = $pembagiTugas + 1;
																			}
																			$ratNilai = @(round(($jumTugas / $pembagiTugas),2));
																			echo $ratNilai;
																		?>
																	</td>
																	<td style="width:50px;border-right:solid 1px #ccc;text-align:center;font-size:11px;font-weight:bold;">
																		<?
																			//rata-rata ulangan harian
																			$pembagiUH = 0;
																			$jumUH = 0;
																			$nilaiUH=mysql_query("select * from $table where tag='UH' and noINduk='$a_namakelas[no_induk]'");
																			while($a_nilaiUH=mysql_fetch_array($nilaiUH))
																			{
																				$jumUH = $jumUH + $a_nilaiUH['nilai'];
																				$pembagiUH = $pembagiUH + 1;
																			}
																			$ratUH = @(round(($jumUH / $pembagiUH),2));
																			echo $ratUH;
																		?>
																	</td>
																	<td style="width:50px;border-right:solid 1px #ccc;text-align:center;font-size:11px;font-weight:bold;">
																		<?
																			//rata-rata pengamatan
																			$pembagiP = 0;
																			$jumP = 0;
																			$nilaiP=mysql_query("select * from $table where tag='P' and noINduk='$a_namakelas[no_induk]'");
																			while($a_nilaiP=mysql_fetch_array($nilaiP))
																			{
																				$jumP = $jumP + $a_nilaiP['nilai'];
																				$pembagiP = $pembagiP + 1;
																			}
																			$ratP = @(round(($jumP / $pembagiP),2));
																			echo $ratP;
																		?>
																	</td>
																	<td style="width:50px;border-right:solid 1px #ccc;text-align:center;font-size:11px;font-weight:bold;">
																		<?
																			//rata-rata harian(rata tugas+rata uh+rata pengamatan/3)
																			$ratHarian = @(round((($ratNilai + $ratUH + $ratP)/3),2));
																			echo $ratHarian;
																		?>
																	</td>
																	<td style="width:50px;border-right:solid 1px #ccc;text-align:center;font-size:11px;font-weight:bold;">
																		<?
																			//2x uas
																			$nilaiUas = mysql_query("select * from $table where tag='UAS' and noInduk='$a_namakelas[no_induk]'");
																			$a_nilaiUas = mysql_fetch_array($nilaiUas);
																			$nUas = $a_nilaiUas['nilai'];
																			$jumUas = $nUas*2;
																			echo $jumUas;
																		?>
																	</td>
																	<td style="width:50px;border-right:solid 1px #ccc;text-align:center;font-size:11px;font-weight:bold;">
																		<?
																			//Nilai raport
																			$selUts = mysql_query("select * from $table where tag='UTS' and noInduk='$a_namakelas[no_induk]'");
																			$a_selUts = mysql_fetch_array($selUts);
																			$allUts = $a_selUts['nilai'];
																			$nilaiRaport = @(round((($ratHarian + $allUts + $jumUas)/4),2));
																			echo $nilaiRaport;
																		?>
																	</td>
																	<td style="width:75px;border-right:solid 1px #ccc;text-align:center;">
																		<input type="hidden" name="noInduk" value="<? echo $a_namakelas['no_induk'];?>">
																		<input type="hidden" name="table" value="<?echo $table?>">
																		<input type="hidden" name="uri" value="<?echo $_SERVER['REQUEST_URI']?>">
																		<input type="submit" name="simpanEditNilai" value="Edit" class="btn btn-primary" style="font-size:11px;font-weight:bold;">
																	</td>
																</tr>
															</form>
														<?
													}
												?>
											</table>
										</div>
									</div>
								</div>	
							</div>
						<?
					}
					
					elseif($_GET['action'] == "tambahNilai")
					{
						?>
							<div class="row">
								<div class="col-lg-12">
									<table>
										<form name="simpanNilai" action="process.php?doraemon=simpanNilai" method="POST">
											<tr style="align:center;border-bottom:solid 1px #ccc;font-weight:bold;">
												<td style="font-size:12px;border-right:solid 1px #ccc;border-solid:left 1px #ccc;" align="center" bgcolor="lightblue" width="50px">No</td>
												<td style="font-size:12px;border-right:solid 1px #ccc;" align="center" bgcolor="lightblue" width="75px">No Induk</td>
												<td style="font-size:12px;border-right:solid 1px #ccc;" align="center" bgcolor="lightblue" width="600px">Nama Siswa</td>
												<td style="font-size:12px;border-right:solid 1px #ccc;" align="center" bgcolor="lightblue" width="70px">KKM</td>
												<td style="font-size:12px;border-right:solid 1px #ccc;padding:3px 3px;" align="center" bgcolor="lightblue" width="150px">
													<select style="background:yellow;font-size:12px;" class="form-control" name="jenisNilai">
														<option>-Jenis Nilai-</option>
														<option value="T" style="text-align:center;">Tugas & PR</option>
														<option value="UH" style="text-align:center;">UH</option>
														<option value="P" style="text-align:center;">Pengamatan</option>
														<option value="UTS" style="text-align:center;">UTS</option>
														<option value="UAS" style="text-align:center;">UAS</option>
													</select>
												</td>
											</tr>
											<?
												$no=1;
												$kelas=mysql_query("select * from m_kelas where kelasRuang='$_GET[kelas]'");
												$a_kelas=mysql_fetch_array($kelas);
												$selkelas=mysql_query("select * from m_siswa where kelas='$a_kelas[id]' order by nama_siswa asc");
												while($a_selkelas=mysql_fetch_array($selkelas))
												{
													?>
														<tr style="border-bottom:solid 1px #ccc;">
															<td style="text-align:center;font-size:12px;border-right:solid 1px #ccc;border-left:solid 1px #ccc;"><? echo $no++;?></td>
															<td style="text-align:center;font-size:12px;border-right:solid 1px #ccc;"><? echo $a_selkelas['no_induk'];?></td>
															<td style="border-right:solid 1px #ccc;font-size:12px;padding:3px 3px;"><? echo $a_selkelas['nama_siswa'];?></td>
															<td style="border-right:solid 1px #ccc;font-size:12px;text-align:center;"><? echo $a_selkkm['kkm'];?></td>
															<td style="padding:3px 3px;border-right:solid 1px #ccc;font-size:12px">
																<input type="hidden" name="noInduk[]" class="form-control" autocomplete="off" value="<?echo $a_selkelas['no_induk']?>">
																<input type="text" name="nilai[]" class="form-control" autocomplete="off">
															</td>
														</tr>
													<?
												}
											?>
											<tr>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td style="padding-top:7px">
													<input type="hidden" name="table" class="form-control" autocomplete="off" value="<?echo $table?>">
													<input type="hidden" name="url" class="form-control" autocomplete="off" value="<?echo $_SERVER['REQUEST_URI']?>">
													<input type="submit" value="Simpan" name="simpanNilai" class="btn btn-lg btn-success" style="font-size:12px;float:Right;">
												</td>
											</tr>
										</form>
									</table>
								</div>
						<?
					}
					
					else
					{
						?>
							<div class="col-lg-3"></div>
							<div class="col-lg-6">
								<div class="panel panel-warning" style="font-size:12px;margin:75px 0 0 0;">
									<div class="panel-heading">
										<b>Fitur di menu nilai pelajaran</b>
									</div>
									<div class="panel-body">
										<table>
											<tr style="height:30px;">
												<td style="width:30px;text-align:Center;">
													<img src="../icon/edit.png" width="20px" height="20px">
												</td>
												<td style="width:600px;">
													<b><i>Set KKM pelajaran, untuk merubah nilai KKM pada pelajaran</b></i>
												</td>
											</tr>
											<tr style="height:30px;">
												<td style="width:30px;text-align:Center;">
													<img src="../icon/absen.png" width="20px" height="20px">
												</td>
												<td style="width:300px;">
													<b><i>Edit nilai, untuk melakukan edit nilai dan pengkoreksian nilai keseluruhan</b></i>
												</td>
											</tr>
											<tr style="height:30px;">
												<td style="width:30px;text-align:Center;">
													<img src="../icon/tambah.jpg" width="20px" height="20px">
												</td>
												<td style="width:300px;">
													<b><i>Tambah nilai, untuk menambah nilai pada masing-masing mata pelajaran</b></i>
												</td>
											</tr>
											<tr style="height:30px;">
												<td style="width:30px;text-align:Center;">
													<img src="../icon/print.png" width="20px" height="20px">
												</td>
												<td style="width:300px;">
													<b><i>Cetak nilai, untuk mencetak rekap nilai dalam bentuk PDF</b></i>
												</td>
											</tr>
										</table>
										<input type="button" class="btn btn-info" value="Lanjut >>" style="font-size:12px;float:Right;margin:20px 0 0 0;" onclick="window.location='index.php?menu=nilaiPelajaran&pelajaran=<?echo $_GET['pelajaran']?>&kelas=<?echo $_GET['kelas']?>&action=setKkm'">
									</div>
								</div>
							</div>
						<?
					}
				}
				
				else
				{
					?>
						<div class="col-lg-3"></div>
						<div class="col-lg-6">
							<div class="panel panel-warning" style="font-size:12px;margin:75px 0 0 0;">
								<div class="panel-heading">
									<b>Fitur di menu nilai pelajaran</b>
								</div>
								<div class="panel-body">
									<table>
										<tr style="height:30px;">
											<td style="width:30px;text-align:Center;">
												<img src="../icon/edit.png" width="20px" height="20px">
											</td>
											<td style="width:600px;">
												<b><i>Set KKM pelajaran, untuk merubah nilai KKM pada pelajaran</b></i>
											</td>
										</tr>
										<tr style="height:30px;">
											<td style="width:30px;text-align:Center;">
												<img src="../icon/absen.png" width="20px" height="20px">
											</td>
											<td style="width:300px;">
												<b><i>Edit nilai, untuk melakukan edit nilai dan pengkoreksian nilai keseluruhan</b></i>
											</td>
										</tr>
										<tr style="height:30px;">
											<td style="width:30px;text-align:Center;">
												<img src="../icon/tambah.jpg" width="20px" height="20px">
											</td>
											<td style="width:300px;">
												<b><i>Tambah nilai, untuk menambah nilai pada masing-masing mata pelajaran</b></i>
											</td>
										</tr>
										<tr style="height:30px;">
											<td style="width:30px;text-align:Center;">
												<img src="../icon/print.png" width="20px" height="20px">
											</td>
											<td style="width:300px;">
												<b><i>Cetak nilai, untuk mencetak rekap nilai dalam bentuk PDF</b></i>
											</td>
										</tr>
									</table>
									<input type="button" class="btn btn-info" value="Lanjut >>" style="font-size:12px;float:Right;margin:20px 0 0 0;" onclick="window.location='index.php?menu=nilaiPelajaran&pelajaran=<?echo $_GET['pelajaran']?>&kelas=<?echo $_GET['kelas']?>&action=setKkm'">
								</div>
							</div>
						</div>
					<?
				}
			}
		?>
	</div>
</div>