<?
	?>
		<table style="float:left;margin:3px 3px 3px 3px;border-right:solid 1px #ccc;border-left:solid 1px #ccc;border-bottom:solid 1px #ccc;
						border-top:solid 1px #ccc;background:C0C0C0;overflow-y:auto;">
			<tr>
					<td style="width:35px;padding-bottom:5px;">
						<img src="../icon/sistem.png" height="30" width="30" style="float:left;"> 
					</td>
					<td style="width:150px;font-weight:bold;margin:5px 0 0 3px;">
						<a href="index.php?menu=home" style="font-size:12px;color:black;"> Dashboard user</a>
					</td>
			</tr>
			<?
				$wali = mysql_query("select * from m_guru where nip='$a_detailGuru[nip]'");
				$a_wali = mysql_fetch_array($wali);
				//akses data siswa
				if($a_wali['walikelas'] == "")
				{
					
				}
				else
				{
					?>
						<tr style="border-bottom:solid 1px #ccc;font-weight:bold;color:black;text-align:Center;background:lightblue;">
							<td colspan="2" style="height:30px;">
								<b>DATA SISWA</b>
							</td>
						</tr>
						<tr style="border-bottom:solid 1px #ccc;">
							<td style="width:35px;">
								<img src="../icon/absen.png" height="25" width="25" style="float:left;"> 
							</td>
							<td style="width:150px;float:left;margin:10px 0 5px 3px;font-weight:bold;">
								<a href="index.php?menu=dataSiswa&kelas=<?echo $a_wali['walikelas']?>" style="font-size:12px;color:black;" title="Data Siswa Kelas <?echo $a_wali['walikelas']?>">Data Siswa</a>
							</td>
						</tr>
						<tr style="border-bottom:solid 1px #ccc;">
							<td style="width:35px">
								<img src="../icon/absen.png" height="25" width="25" style="float:left;">
							</td>
							<td style="width:150px;float:left;margin:5px 0 5px 3px;font-weight:bold;">
								<a href="index.php?menu=absen&kelas=<?echo $a_wali['walikelas']?>" style="font-size:12px;color:black;" title="Rekap Absen Kelas <?echo $a_wali['walikelas']?>">Rekap Absen Siswa</a>
							</td>
						</tr>
						<tr style="border-bottom:solid 1px #ccc;">
							<td stle="width:35px">
								<img src="../icon/absen.png" height="25" width="25" style="float:left;"> 
							</td>
							<td style="width:150px;float:left;margin:5px 0 10px 3px;font-weight:bold;">
								<a href="index.php?menu=akhlak&kelas=<?echo $a_wali['walikelas']?>" style="font-size:12px;color:black;" title="Nilai Akhlak & Kepribadian Kelas <?echo $a_wali['walikelas']?>"> Akhlak & Kepribadian</a>
							</td>
						</tr>
					<?
				}
				
				//input nilai mata pelajaran
				$selectMapel = mysql_query("select * from m_gurupelajaran where nama='$a_detailGuru[nama]' order by pelajaran,kelas asc");
				$r_selectMapel = mysql_num_rows($selectMapel);
				if($r_selectMapel == 0)
				{

				}
				else
				{
					?>
						<tr style="border-right:solid 1px #ccc;border-left:solid 1px #ccc;font-weight:bold;color:black;text-align:Center;background:lightblue;">
							<td colspan="2" height="30px"><b>MATA PELAJARAN</b></td>
						</tr>
					<?
					while($a_selectMapel = mysql_fetch_array($selectMapel))
					{
						?>
							<tr style="font-size:12px;border-bottom:solid 1px #ccc;">
								<td style="width:35px">
									<img src="../icon/edit.png" width="25" height="25" style="float:left;">
								</td>
								<td style="width:150px;height:30px;float:left;line-height:100%;margin:10px 10px 5px 3px;">
									<a href="index.php?menu=nilaiPelajaran&pelajaran=<?echo $a_selectMapel['pelajaran']?>&kelas=<?echo $a_selectMapel['kelas']?>" style="color:black;" 		title="Nilai <?echo $a_selectMapel['pelajaran']." ".$a_selectMapel['kelas']?>">
										<?echo "<b>".str_replace("_"," ",$a_selectMapel['pelajaran'])."</b><br><font style='font-size:10px;font-style:italic;'>Kelas :".$a_selectMapel['kelas']."</font>"?>
									</a>
								</td>
							</tr>
						<?
					}
				}
				
				//nilai ekstrakulikuler
				$selectEkstra = mysql_query("select * from m_guruekstra where nama='$a_detailGuru[nama]' order by ekstra asc");
				$r_selectEkstra = mysql_num_rows($selectEkstra);
				if($r_selectEkstra == 0)
				{

				}
				else
				{
					?>
						<tr style="border-right:solid 1px #ccc;border-left:solid 1px #ccc;font-weight:bold;color:black;text-align:Center;background:lightblue;margin:10px 10px 5px 3px;">
							<td colspan="2" height="30px">
								<b>EKSTRAKURIKULER</b>
							</td>
						</tr>
					<?
					while($a_selectEkstra = mysql_fetch_array($selectEkstra))
					{
						?>
							<tr style="border-bottom:solid 1px #ccc;">
								<td width="35px;">
									<img src="../icon/note.png" width="25" height="25" style="float:left;">
								</td>
								<td style="width:150px;font-weight:bold;font-size:12px;float:left;margin:10px 10px 5px 3px;">
									<a href="index.php?menu=ekstra&ekstra=<?echo $a_selectEkstra['ekstra']?>" title="Nilai <?echo $a_selectEkstra['ekstra']?>" style="color:black;">
									<?echo $a_selectEkstra['ekstra']?></a>
								</td>
							</tr>
						<?
					}
				}
				
				//cetak raport
				if(empty($a_wali['walikelas']))
				{

				}
				
				else
				{
					?>
						<tr style="border-right:solid 1px #ccc;border-left:solid 1px #ccc;font-weight:bold;color:black;text-align:Center;background:lightblue;
									margin:10px 10px 5px 3px;">
							<td colspan="2" height="30px">
								<b>CETAK RAPORT</b>
							</td>
						</tr>
						<tr style="border-bottom:solid 1px #ccc;">
							<td width="35px;">
								<img src="../icon/print.png" width="25" height="25" style="float:left;">
							</td>
							<td style="width:150px;font-weight:bold;font-size:12px;float:left;margin:10px 10px 5px 3px;">
								<a href="index.php?menu=cetakRaport&kelas=<?echo $a_wali['walikelas']?>" title="Nilai <?echo $a_selectEkstra['ekstra']?>" style="color:black;">
								Raport <?echo $a_wali['walikelas']?></a>
							</td>
						</tr>
					<?
				}
			?>
		</table>
	<?
?>