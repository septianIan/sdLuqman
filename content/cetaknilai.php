<?	
	session_start();
	ob_start();

	include("kakashi.php");
	
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
		$semester = mysql_query("select * from m_param where param='semester'");
		$a_semester = mysql_fetch_array($semester);
		
		$ta = mysql_query("select * from m_param where param='thnAjaran'");
		$a_ta = mysql_fetch_array($ta);
		?>
			<html>
				<head>
					<title><?echo $_GET['pelajaran']." ".$_GET['kelas']?></title>
				</head>
				<body style="font-size:11px;font-family:'Tahoma';">
					<table style="font-family:'Tahoma';font-size:12px;">
						<tr>
							<td style="width:1100px;height:60px;text-align:center;" valign="top">
								<font style="font-size:18px;text-transform:uppercase;">DAFTAR NILAI UAS SEMESTER <?echo $a_semester['value']?></font><br>
								<font style="font-size:14px;text-transform:uppercase;">SD INTEGRAL LUQMAN - AL HAKIM BOJONEGORO</font><br>
								<font style="font-size:12px;text-transform:uppercase;">TAHUN AJARAN <?echo $a_ta['value']?></font>
							</td>
						</tr>
						<tr>
							<td style="height:30px;text-align:center;" valign="top">
								<table style="font-size:12px;">
									<tr style="height:20px;">
										<td style="width:75px;text-align:left;font-weight:bold;">Kelas</td>
										<td style="width:10px;text-align:center;">:</td>
										<td style="width:150px;text-align:left;"><?echo $_GET['kelas']?></td>
									</tr>
									<tr style="height:20px;">
										<td style="width:75px;text-align:left;font-weight:bold;">Pelajaran</td>
										<td style="width:10px;text-align:center;">:</td>
										<td style="width:150px;text-align:left;"><?echo str_replace("_"," ",$_GET['pelajaran'])?></td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td style="width:1100px;">
								<table cellspacing="0" style="font-size:12px;">
									<?
										$pelajaran = $_GET['pelajaran'];
										$kelas = str_replace("-","",$_GET['kelas']);
										$table = strtolower($pelajaran.$kelas);
										
										$jumTugas = mysql_query("select distinct(urutan) as jumTugas from $table where tag='T'");
										$r_jumTugas = mysql_num_rows($jumTugas);
										
										$jumUh = mysql_query("select distinct(urutan) as jumUh from $table where tag='UH'");
										$r_jumUh = mysql_num_rows($jumUh);
										
										$jumPengamatan = mysql_query("select distinct(urutan) as jumUh from $table where tag='P'");
										$r_jumP = mysql_num_rows($jumPengamatan);
									?>
									<tr style="background:lightblue;text-align:center;">
										<td style="width:30px;border:solid 1px black;" rowspan="2">NO</td>
										<td style="width:200px;border:solid 1px black;" rowspan="2">NAMA</td>
										<td style="width:auto;border:solid 1px black;" colspan="<?echo $r_jumTugas?>">TUGAS & PR</td>
										<td style="width:30px;border:solid 1px black;">RT-1</td>
										<td style="width:auto;border:solid 1px black;" colspan="<?echo $r_jumUh?>">ULANGAN<br>HARIAN</td>
										<td style="width:30px;border:solid 1px black;">RT-2</td>
										<td style="width:auto;border:solid 1px black;" colspan="<?echo $r_jumP?>">PENGAMATAN</td>
										<td style="width:30px;border:solid 1px black;">RT-3</td>
										<td style="width:75px;border:solid 1px black;">RATA-RATA<br>HARIAN</td>
										<td style="width:30px;border:solid 1px black;">UTS</td>
										<td style="width:auto;border:solid 1px black;" colspan="2">UAS</td>
										<td style="width:75px;border:solid 1px black;">NILAI RAPORT</td>
									</tr>
									<tr style="height:25px;text-align:Center;background:lightblue;">
										<?
											for($a=1;$a<=$r_jumTugas;$a++)
											{
												?>
													<td style="width:30px;border:solid 1px black;"><?echo $a?></td>							
												<?
											}
										?>
										<td style="width:30px;border:solid 1px black;">A</td>
										<?
											for($b=1;$b<=$r_jumUh;$b++)
											{
												?>
													<td style="width:30px;border:solid 1px black;"><?echo $b?></td>							
												<?
											}
										?>										
										<td style="width:30px;border:solid 1px black;">B</td>
										<?
											for($c=1;$c<=$r_jumP;$c++)
											{
												?>
													<td style="width:30px;border:solid 1px black;"><?echo $c?></td>							
												<?
											}
										?>	
										<td style="width:30px;border:solid 1px black;">C</td>
										<td style="width:30px;border:solid 1px black;">X=A+B+C/3</td>
										<td style="width:30px;border:solid 1px black;">Y</td>
										<td style="width:30px;border:solid 1px black;">Z</td>
										<td style="width:30px;border:solid 1px black;">2Z</td>
										<td style="width:30px;border:solid 1px black;">X+Y+2Z/4</td>
									</tr>
									<?
										$ceg = 1;
										$idKelas = mysql_query("select * from m_kelas where kelasRuang='$_GET[kelas]'");
										$a_idKelas = mysql_fetch_array($idKelas);
										
										$siswa = mysql_query("select * from m_siswa where kelas='$a_idKelas[id]' order by nama_siswa asc");
										while($a_siswa = mysql_fetch_array($siswa))
										{
											?>
												<tr style="height:25px;">
													<td style="text-align:Center;border:solid 1px black;"><?echo $ceg?></td>
													<td style="padding:3px 3px;border:Solid 1px black;text-transform:uppercase;">
														<?
															echo $a_siswa['nama_siswa']
														?>
													</td>
													<?
														#NILAI TUGAS DAN PR
														$jumNilaiTugas = 0;
														for($r=1;$r<=$r_jumTugas;$r++)
														{
															$selTugas = mysql_query("select * from $table where noInduk='$a_siswa[no_induk]' and semester='$a_semester[value]' and thnAjaran='$a_ta[value]' and tag='T' and urutan='$r'");
															$a_selTugas = mysql_fetch_array($selTugas);
															$jumNilaiTugas = $jumNilaiTugas + $a_selTugas['nilai'];
															?>
																<td style="text-align:Center;border:solid 1px black;"><?echo $a_selTugas['nilai']?></td>
															<?
														}
													?>
													<td style="text-align:Center;border:solid 1px black;">
														<?
															#RATA_RATA NILAI TUGAS
															$rataTugas = $jumNilaiTugas / ($r-1);
															$bulatTugas = round($rataTugas,2);
															echo $bulatTugas;
														?>
													</td>
													<?
														#NILAI UH
														$jumNilaiUh = 0;
														for($s=1;$s<=$r_jumUh;$s++)
														{
															$selUh = mysql_query("select * from $table where noInduk='$a_siswa[no_induk]' and semester='$a_semester[value]' and thnAjaran='$a_ta[value]' and tag='UH' and urutan='$s'");
															$a_selUh = mysql_fetch_array($selUh);
															$jumNilaiUh = $jumNilaiUh + $a_selUh['nilai'];
															?>
																<td style="text-align:Center;border:solid 1px black;"><?echo $a_selUh['nilai']?></td>
															<?
														}
													?>
													<td style="text-align:Center;border:solid 1px black;">
														<?
															#RATA_RATA NILAI UH
															$rataUh = $jumNilaiUh / ($s-1);
															$bulatUh = round($rataUh,2);
															echo $bulatUh;
														?>
													</td>
													<?
														#NILAI PENGAMATAN
														$jumNilaiP = 0;
														for($t=1;$t<=$r_jumP;$t++)
														{
															$selP = mysql_query("select * from $table where noInduk='$a_siswa[no_induk]' and semester='$a_semester[value]' and thnAjaran='$a_ta[value]' and tag='P' and urutan='$t'");
															$a_selP = mysql_fetch_array($selP);
															$jumNilaiP = $jumNilaiP + $a_selP['nilai'];
															?>
																<td style="text-align:Center;border:solid 1px black;"><?echo $a_selP['nilai']?></td>
															<?
														}
													?>
													<td style="text-align:Center;border:solid 1px black;">
														<?
															#RATA_RATA NILAI UH
															$rataP = $jumNilaiP / ($t-1);
															$bulatP = round($rataP,2);
															echo $bulatP;
														?>
													</td>
													<td style="text-align:Center;border:solid 1px black;">
														<?
															#RATA_RATA HARIAN
															$harian = round((($bulatTugas + $bulatUh + $bulatP)/3),2);
															echo $harian
														?>
													</td>
													<td style="text-align:Center;border:solid 1px black;">
														<?
															#NILAI UTS
															$selUts = mysql_query("select * from $table where noInduk='$a_siswa[no_induk]' and semester='$a_semester[value]' and thnAjaran='$a_ta[value]' and tag='UTS'");
															$a_selUts = mysql_fetch_array($selUts);
															echo $a_selUts['nilai'];
														?>
													</td>
													<td style="text-align:Center;border:solid 1px black;">
														<?
															#NILAI UAS
															$selUas = mysql_query("select * from $table where noInduk='$a_siswa[no_induk]' and semester='$a_semester[value]' and thnAjaran='$a_ta[value]' and tag='UAS'");
															$a_selUas = mysql_fetch_array($selUas);
															echo $a_selUas['nilai'];
														?>
													</td>
													<td style="text-align:Center;border:solid 1px black;">
														<?
															echo (2*$a_selUas['nilai']);
														?>
													</td>
													<td style="text-align:Center;border:solid 1px black;">
														<?
															#NIlAI AKHIR
															$na = ($harian + $a_selUts['nilai'] + (2 * $a_selUas['nilai']))/4;
															$bulatNa = round($na,2);
															echo $bulatNa;
														?>
													</td>
												</tr>
											<?
											$ceg = $ceg + 1;
										}
									?>
								</table>
							</td>
						</tr>
					</table>
				</body>
			</html>
		<?
	}

	$filename="Rekap_Nilai_".$_GET['pelajaran']."_".$_GET['kelas'].".pdf";
	$content = ob_get_clean();
	require_once('html2pdf/html2pdf.class.php');
	try
	{
		$html2pdf = new HTML2PDF('L','Legal','en', false, 'UTF-8',array(5, 5, 5, 5));
		$html2pdf->setDefaultFont('Arial');
		$html2pdf->writeHTML($content);
		$html2pdf->Output($filename);
	}
	catch(HTML2PDF_exception $e) { echo $e; }
?>