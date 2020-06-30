<?
	session_start();
	ob_start();
	
	include("../kakashi.php");
	
	if(empty($_SESSION['nip']) or $_SESSION['nip'] == "")
	{
		?>
			<script type="text/javascript">
				alert("Anda harus login dengan akun anda.");
				window.location = "../../index.php";
			</script>
		<?
	}
	else
	{
		function param($parameter)
		{
			$value = mysql_query("select * from m_param where param='$parameter'");
			$a_value = mysql_fetch_array($value);
			
			return $a_value['value'];
		}
		
		function ambilKkm($pelajaran,$kelas)
		{
			$konPelajaran = str_replace(" ","_",mysql_real_escape_string($pelajaran));
			
			$kkm = mysql_query("select * from m_kkm where pelajaran='$konPelajaran' and kelas='$kelas'");
			$r_kkm = mysql_num_rows($kkm);
			$a_kkm = mysql_fetch_array($kkm);
			
			if($r_kkm != 0)
				$out = $a_kkm['kkm'];
			else
				$out = "-";
			
			return $out;
		}
		
		function bulan($z)
		{
			if($z == "01")
				$bulan = "Januari";
			elseif($z == "02")
				$bulan = "Februari";
			elseif($z == "03")
				$bulan = "Maret";
			elseif($z == "04")
				$bulan = "April";
			elseif($z == "05")
				$bulan = "Mei";
			elseif($z == "06")
				$bulan = "Juni";
			elseif($z == "07")
				$bulan = "Juli";
			elseif($z == "08")
				$bulan = "Agustus";
			elseif($z == "09")
				$bulan = "September";
			elseif($z == "10")
				$bulan = "Oktober";
			elseif($z == "11")
				$bulan = "November";
			elseif($z == "12")
				$bulan = "Desember";
			else
				$bulan = "Tidak diketahui";

			return $bulan;
		}
		
		function terbilang($x)
		{
			$abil = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");
			if ($x < 12)
				return " " . $abil[$x];
			elseif ($x < 20)
				return Terbilang($x - 10) . " Belas";
			elseif ($x < 100)
				return Terbilang($x / 10) . " Puluh" . Terbilang($x % 10);
			elseif ($x < 200)
				return " Seratus" . Terbilang($x - 100);
			elseif ($x < 1000)
				return Terbilang($x / 100) . " Ratus" . Terbilang($x % 100);
			elseif ($x < 2000)
				return " Seribu" . Terbilang($x - 1000);
			elseif ($x < 1000000)
				return Terbilang($x / 1000) . " Ribu" . Terbilang($x % 1000);
			elseif ($x < 1000000000)
				return Terbilang($x / 1000000) . " Juta" . Terbilang($x % 1000000);
		}
		
		$guru = mysql_query("select * from m_guru where nip='$_SESSION[nip]'");
		$a_guru = mysql_fetch_array($guru);
		
		$siswa = mysql_query("select * from m_siswa where no_induk='$_GET[noInduk]'");
		$a_siswa = mysql_fetch_array($siswa);
		
		$kelas = mysql_query("select * from m_kelas where id='$a_siswa[kelas]'");
		$a_kelas = mysql_fetch_array($kelas);
		
		$namaSekolah = param('namaSekolah');
		$alamat = param('alamatSekolah');
		$semester = param('semester');
		$ta = param('thnAjaran');
		$kepSek = param('kepalaSekolah');
		
		$pelajaran = $_GET['pelajaran'];
		$kelas = str_replace("-","",$_GET['kelas']);
		$table = strtolower($pelajaran.$kelas);
	?>
		<html>
			<head>
				<title>UAS <?echo $a_siswa['nama_siswa']." ".$a_kelas['kelasRuang']?></title>
			</head>
			<body style="font-famiy:'Tahoma';font-size:15px;">
				<table cellspacing="0" style="margin:30px 0 0 30px;">
					<tr>
						<td style="width:350px;" valign="top">
							<table>
								<tr>
									<td style="width:125px;">Nama Siswa</td>
									<td style="width:10px;text-align:Center">:</td>
									<td style="width:225px;font-weight:bold;">
										<?
											echo strtoupper($a_siswa['nama_siswa'])
										?>
									</td>
								</tr>
								<tr>
									<td style="width:125px;">No.Induk</td>
									<td style="width:10px;text-align:Center">:</td>
									<td style="width:225px;font-weight:bold;">
										<?
											echo $a_siswa['no_induk']
										?>
									</td>
								</tr>
								<tr>
									<td style="width:125px;">Nama Sekolah</td>
									<td style="width:10px;text-align:Center">:</td>
									<td style="width:225px;text-transform:uppercase;">
										<?
											echo $namaSekolah
										?>
									</td>
								</tr>
								<tr>
									<td style="width:125px;">Alamat Sekolah</td>
									<td style="width:10px;text-align:Center">:</td>
									<td style="width:225px;text-transform:uppercase;">
										<?
											echo $alamat
										?>
									</td>
								</tr>
							</table>
						</td>
						<td style="width:325px;" valign="top">
							<table>
								<tr>
									<td style="width:125px;">Kelas</td>
									<td style="width:10px;text-align:Center">:</td>
									<td style="width:190px;">
										<?
											echo $a_kelas['kelasRuang']
										?>
									</td>
								</tr>
								<tr>
									<td style="width:125px;">Semester</td>
									<td style="width:10px;text-align:Center">:</td>
									<td style="width:190px;">
										<?
											echo $semester
										?>
									</td>
								</tr>
								<tr>
									<td style="width:125px;">Th.Ajaran</td>
									<td style="width:10px;text-align:Center">:</td>
									<td style="width:190px;">
										<?
											echo $ta
										?>
									</td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td colspan="2">
							<table cellspacing="0" style="margin:20px 0 0 0;">
								<tr>
									<td style="width:30px;border:solid 1px black;text-align:center;height:30px;">NO</td>
									<td style="width:300px;border:solid 1px black;text-align:center;">Mata Pelajaran</td>
									<td style="width:75px;border:solid 1px black;text-align:center;">KKM</td>
									<td style="width:75px;border:solid 1px black;text-align:center;">NILAI</td>
									<td style="width:200px;border:solid 1px black;text-align:center;">Keterangan<br>Kompetensi</td>
								</tr>
								<?
									$nilaiAkhir = 0;
									$kelompokNo = mysql_query("select distinct(kelompokNo) as nomer from m_pelajaran order by kelompokNo asc");
									while($a_kelompokNo = mysql_fetch_array($kelompokNo))
									{									
										$gabung = mysql_query("select * from m_pelajaran where kelompokNo='$a_kelompokNo[nomer]'");
										$r_gabung = mysql_num_rows($gabung);
										$a_gabung = mysql_fetch_array($gabung);
										
										if($r_gabung != "1")
										{
											$rowspan = $r_gabung + 1;
											?>
												<tr>
													<td style="width:30px;border:solid 1px black;text-align:center;" rowspan="<?echo $rowspan?>" valign="top"><?echo $a_kelompokNo['nomer']?></td>
													<td style="width:300px;border:solid 1px black;text-align:left;"><?echo $a_gabung['kelompok']?></td>
													<td style="width:75px;border:solid 1px black;text-align:center;">
														
													</td>
													<td style="width:75px;border:solid 1px black;text-align:center;">
													
													</td>
													<td style="width:200px;border:solid 1px black;text-align:center;">
													
													</td>
												</tr>
											<?
											
											$pelKel = mysql_query("select * from m_pelajaran where kelompokNo='$a_kelompokNo[nomer]' order by urutanCetak asc");
											while($a_pelKel = mysql_fetch_array($pelKel))
											{
												?>
													<tr>
														<td style="width:300px;border:solid 1px black;text-align:left;" valign="top">
															<?
																echo $a_kelompokNo['nomer'].".".$a_pelKel['urutanCetak']."  ".$a_pelKel['pelajaran'];
															?></td>
														<td style="width:75px;border:solid 1px black;text-align:center;">
															<?
																echo ambilKkm($a_pelKel['pelajaran'],$a_kelas['kelasRuang']);
															?>
														</td>
														<td style="width:75px;border:solid 1px black;text-align:center;">
															<?
																$pelajaran = str_replace(" ","_",$a_pelKel['pelajaran']);
																$kelas = str_replace("-","",$a_kelas['kelasRuang']);
																$table = strtolower($pelajaran.$kelas);
																$no = $a_siswa['no_induk'];
																
																//rata-rata tugas
																$pembagiTugas = 0;
																$jumTugas = 0;
																$nilaiTugas = mysql_query("select * from $table where tag='T' and noInduk='$no'");
																while($a_nilaiTugas=mysql_fetch_array($nilaiTugas))
																{
																	$jumTugas = $jumTugas + $a_nilaiTugas['nilai'];
																	$pembagiTugas = $pembagiTugas + 1;
																}
																$ratNilai = @(round(($jumTugas / $pembagiTugas),2));
												
																//rata-rata ulangan harian
																$pembagiUH = 0;
																$jumUH = 0;
																$nilaiUH = mysql_query("select * from $table where tag='UH' and noINduk='$no'");
																while($a_nilaiUH=mysql_fetch_array($nilaiUH))
																{
																	$jumUH = $jumUH + $a_nilaiUH['nilai'];
																	$pembagiUH = $pembagiUH + 1;
																}
																$ratUH = @(round(($jumUH / $pembagiUH),2));
																
																//rata-rata pengamatan
																$pembagiP = 0;
																$jumP = 0;
																$nilaiP=mysql_query("select * from $table where tag='P' and noINduk='$no'");
																while($a_nilaiP=mysql_fetch_array($nilaiP))
																{
																	$jumP = $jumP + $a_nilaiP['nilai'];
																	$pembagiP = $pembagiP + 1;
																}
																$ratP = @(round(($jumP / $pembagiP),2));
																
																//rata-rata harian(rata tugas+rata uh+rata pengamatan/3)
																$ratHarian = @(round((($ratNilai + $ratUH + $ratP)/3),2));
																
																//2x uas
																$nilaiUas = mysql_query("select * from $table where tag='UAS' and noInduk='$no'");
																$a_nilaiUas = mysql_fetch_array($nilaiUas);
																$nUas = $a_nilaiUas['nilai'];
																$jumUas = $nUas*2;
																
																//Nilai raport
																$selUts = mysql_query("select * from $table where tag='UTS' and noInduk='$no'");
																$a_selUts = mysql_fetch_array($selUts);
																$allUts = $a_selUts['nilai'];
																$nilaiRaport = @(round((($ratHarian + $allUts + $jumUas)/4),0));
																echo $nilaiRaport;
															?>
														</td>
														<td style="width:200px;border:solid 1px black;text-align:center;">
															<?
																$kkm = ambilKkm($a_pelKel['pelajaran'],$a_kelas['kelasRuang']);
																if($nilaiRaport < $kkm)
																{
																	?>
																		<font style="font-size:15px;color:Black;border:none;text-align:center;"> BELUM TUNTAS </font>
																	<?
																}

																else
																{
																	?>
																		<font style="font-size:15px;color:Black;border:none;text-align:center;"> TUNTAS </font>
																	<?
																}
															?>
														</td>
													</tr>
												<?
											}
										}
										
										else
										{	
											?>
												<tr>
													<td style="width:30px;border:solid 1px black;text-align:center;"><?echo $a_kelompokNo['nomer']?></td>
													<td style="width:300px;border:solid 1px black;text-align:left;"><?echo $a_gabung['pelajaran']?></td>
													<td style="width:75px;border:solid 1px black;text-align:center;">
														<?
															echo ambilKkm($a_gabung['pelajaran'],$a_kelas['kelasRuang']);
														?>
													</td>
													<td style="width:75px;border:solid 1px black;text-align:center;">
														<?
															$pelajaran = str_replace(" ","_",$a_gabung['pelajaran']);
															$kelas = str_replace("-","",$a_kelas['kelasRuang']);
															$table = strtolower($pelajaran.$kelas);
															$no = $a_siswa['no_induk'];
															
															//rata-rata tugas
															$pembagiTugas = 0;
															$jumTugas = 0;
															$nilaiTugas = mysql_query("select * from $table where tag='T' and noInduk='$no'");
															while($a_nilaiTugas=mysql_fetch_array($nilaiTugas))
															{
																$jumTugas = $jumTugas + $a_nilaiTugas['nilai'];
																$pembagiTugas = $pembagiTugas + 1;
															}
															$ratNilai = @(round(($jumTugas / $pembagiTugas),2));
											
															//rata-rata ulangan harian
															$pembagiUH = 0;
															$jumUH = 0;
															$nilaiUH = mysql_query("select * from $table where tag='UH' and noINduk='$no'");
															while($a_nilaiUH=mysql_fetch_array($nilaiUH))
															{
																$jumUH = $jumUH + $a_nilaiUH['nilai'];
																$pembagiUH = $pembagiUH + 1;
															}
															$ratUH = @(round(($jumUH / $pembagiUH),2));
															
															//rata-rata pengamatan
															$pembagiP = 0;
															$jumP = 0;
															$nilaiP=mysql_query("select * from $table where tag='P' and noINduk='$no'");
															while($a_nilaiP=mysql_fetch_array($nilaiP))
															{
																$jumP = $jumP + $a_nilaiP['nilai'];
																$pembagiP = $pembagiP + 1;
															}
															$ratP = @(round(($jumP / $pembagiP),2));
															
															//rata-rata harian(rata tugas+rata uh+rata pengamatan/3)
															$ratHarian = @(round((($ratNilai + $ratUH + $ratP)/3),2));
															
															//2x uas
															$nilaiUas = mysql_query("select * from $table where tag='UAS' and noInduk='$no'");
															$a_nilaiUas = mysql_fetch_array($nilaiUas);
															$nUas = $a_nilaiUas['nilai'];
															$jumUas = $nUas*2;
															
															//Nilai raport
															$selUts = mysql_query("select * from $table where tag='UTS' and noInduk='$no'");
															$a_selUts = mysql_fetch_array($selUts);
															$allUts = $a_selUts['nilai'];
															$nilaiRaport = @(round((($ratHarian + $allUts + $jumUas)/4),0));
															echo $nilaiRaport;
														?>
													</td>
													<td style="width:200px;border:solid 1px black;text-align:center;">
														<?
															$kkm = ambilKkm($a_gabung['pelajaran'],$a_kelas['kelasRuang']);
															if($nilaiRaport < $kkm)
															{
																?>
																	<font style="font-size:15px;color:Black;border:none;text-align:center;"> BELUM TUNTAS </font>
																<?
															}

															else
															{
																?>
																	<font style="font-size:15px;color:Black;border:none;text-align:center;"> TUNTAS </font>
																<?
															}
														?>
													</td>
												</tr>
											<?
										}
										$nilaiAkhir = $nilaiAkhir + $nilaiRaport;
									}
								?>
							</table>
						</td>
					</tr>
					<tr>
						<td colspan="2">
							<table cellspacing="0" style="margin:25px 0 0 0;">
								<tr>
									<td style="width:340px;text-align:left;height:30px;font-weight:bold;">Jumlah Nilai Hasil Prestasi Belajar : </td>
									<td style="width:75px;text-align:center;height:30px;font-weight:bold;"></td>
									<td style="width:75px;text-align:center;height:30px;font-weight:bold;"><?echo $nilaiAkhir?></td>
									<td style="width:200px;text-align:center;height:30px;font-weight:bold;"></td>
								</tr>
								<tr>
									<td style="width:340px;text-align:left;height:20px;"></td>
									<td style="text-align:left;height:20px;" colspan="3"><?echo "(".terbilang($nilaiAkhir)." )"?></td>
								</tr>
								<tr>
									<td style="width:340px;text-align:left;height:20px;"><i>KKM : Kriteria Ketuntasan Minimal</i></td>
									<td style="text-align:left;height:20px;" colspan="3"></td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td colspan="2">
							<table cellspacing="0" style="border:solid 1px black;">
								<tr>
									<td style="width:30px;border:solid 1px black;text-align:center;">No</td>
									<td style="width:260px;border:solid 1px black;text-align:center;">Kepribadian</td>
									<td style="width:100px;border:solid 1px black;text-align:center;">Nilai</td>
									<td style="width:145px;border:solid 1px black;text-align:center;">Ketidakhadiran</td>
									<td style="width:145px;border:solid 1px black;text-align:center;">Hari</td>
								</tr>
								<?
									$kep = mysql_query("select * from tbl_akhlak where noInduk='$a_siswa[no_induk]'");
									$a_kep = mysql_fetch_array($kep);
									$keh = mysql_query("select * from tbl_absen where noInduk='$a_siswa[no_induk]'");
									$a_keh = mysql_fetch_array($keh);
								?>
								<tr>
									<td style="width:30px;border:solid 1px black;text-align:center;">1</td>
									<td style="width:260px;border:solid 1px black;">Sikap</td>
									<td style="width:100px;border:solid 1px black;text-align:center;"><?echo $a_kep['sikap'];?></td>
									<td style="width:145px;border:solid 1px black;text-align:">Sakit</td>
									<td style="width:145px;border:solid 1px black;text-align:center;"><?echo $a_keh['sakit1']?></td>
								</tr>
								<tr>
									<td style="width:30px;border:solid 1px black;text-align:center;">2</td>
									<td style="width:260px;border:solid 1px black;">Kerajinan</td>
									<td style="width:100px;border:solid 1px black;text-align:center;"><?echo $a_kep['kerajinan'];?></td>
									<td style="width:145px;border:solid 1px black;text-align:">Izin</td>
									<td style="width:145px;border:solid 1px black;text-align:center;"><?echo $a_keh['ijin1']?></td>
								</tr>
								<tr>
									<td style="width:30px;border:solid 1px black;text-align:center;">3</td>
									<td style="width:260px;border:solid 1px black;">Kerapian</td>
									<td style="width:100px;border:solid 1px black;text-align:center;"><?echo $a_kep['kerapian'];?></td>
									<td style="width:145px;border:solid 1px black;text-align:">Alpha</td>
									<td style="width:145px;border:solid 1px black;text-align:center;"><?echo $a_keh['alpha1']?></td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td colspan="2">
							<table cellspacing="0" style="margin:6px 0 0 0;border:solid 2px black;">
								<tr>
									<td colspan="3" style="width:715px;text-align:left;height:30px;font-weight:bold;text-align:center">CATATAN PENGEMBANGAN DIRI</td>
								</tr>								
								<?
									$selekstra = mysql_query("select * from tbl_pesertaekstra where nama='$a_siswa[nama_siswa]'");
									while($a_selekstra = mysql_fetch_array($selekstra))
									{
										?>
										<tr>
											<td style="width:150px;text-align:left;"><? echo $a_selekstra['ekstra']."<br>" ?></td>
											<td style="width:30px;text-align:left;">:</td>
											<td style="width:400;text-align:left;">
												<?echo $a_selekstra['UAS']?>
											</td>
										</tr>	
										<tr style="border-bottom:solid 2px black;width:500px;">
											<td style="width:150px;text-align:">Keterangan <? echo $a_selekstra['ekstra'];?></td>
											<td style="width:30px;text-align:left;">:</td>
											<td style="width:400;text-align:left;">
												<?echo $a_selekstra['catatan']?>
											</td>
										</tr>
										<?
									}
								?>
								<tr>
									<td colspan="3" style="border-top:solid 2px black;width:715px;text-align:left;height:30px;font-weight:bold;text-align:center">CATATAN</td>
								</tr>
								<tr style="border-upper:solid 2px black;width:500px;">
									<td colspan="3" style="width:715px;text-align:left;height:30px;text-align:center"><?echo $a_guru['catatan'];?></td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td colspan="2">
							<table cellspacing="0" style="margin:20px 0 0 0;">
								<tr>
									<td style="width:235px;text-align:left;height:20px;"></td>
									<td style="width:235px;text-align:left;height:20px;"></td>
									<td style="width:235px;text-align:left;height:20px;">Keterangan : <br><br>Naik/Tidak Naik Kelas </td>
								</tr>
								<tr>
									<td style="width:235px;text-align:center;height:20px;"><br><br>Orang Tua / Wali<br><br><br><br><br>(..............................)</td>
									<td style="width:235px;text-align:center;height:20px;"><br><br>Wali Kelas<br><br><br><br><br><?echo "(".$a_guru['nama'].")"?></td>
									<td style="width:235px;text-align:left;height:20px;"><br>Bojonegoro,<?echo date("d")." ".bulan(date("m"))." ".date("Y")?><br>Kepala Sekolah,<br><br><br><br><br>
										<?
											echo "( ".$kepSek." )";
										?>
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
			</body>
		</html>
		<?
		
		$filename="Raport_".$a_siswa['nama_siswa']."_".$a_kelas['kelasRuang'].".pdf";
		$content = ob_get_clean();
		require_once('../html2pdf/html2pdf.class.php');
		try
		{
			$html2pdf = new HTML2PDF('P','Legal','en', false, 'UTF-8',array(5, 5, 5, 5));
			$html2pdf->setDefaultFont('Arial');
			$html2pdf->writeHTML($content);
			$html2pdf->Output($filename);
		}
		catch(HTML2PDF_exception $e) { echo $e; }
	}
?>