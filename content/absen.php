<?
	$idKelas = mysql_query("select * from m_kelas where kelasRuang='$_GET[kelas]'");
	$a_idKelas = mysql_fetch_array($idKelas);
	
	$abc = mysql_query("select * from m_siswa where kelas ='$a_idKelas[id]' order by nama_siswa asc");
	$a_abc = mysql_fetch_array($abc);	
?>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default" style="margin:10px 0 0 0px">
			<div class="panel-heading" style="background:lightblue;">
				<font style="font-size:12px;font-weight:bold;">Absen siswa kelas : <? echo kelas($a_abc['kelas']);?> </font>
			</div>
			<div class="panel-body" style="height:550px;overflow-y:auto;">
				<table>
					<tr style="height:25px;border-bottom:solid 1px #ccc;background:lightblue;">
						<td rowspan="2" style="font-size:12px;border-right:solid 1px #ccc;" align="center" width="50px"><b>No</td>
						<td rowspan="2" style="font-size:12px;border-right:solid 1px #ccc;" align="center"  width="100px"><b>No.Induk</td>
						<td rowspan="2" style="font-size:12px;border-right:solid 1px #ccc;" align="center"  width="350px"><b>Nama Siswa</td>
						<td rowspan="2" style="font-size:12px;border-right:solid 1px #ccc;" align="center"  width="75px"><b>Kelas</td>
						<td colspan="3" style="font-size:12px;border-right:solid 1px #ccc;" align="center"  width="500px"><b>Ketidakhadiran UTS</td>
						<td colspan="3" style="font-size:12px;border-right:solid 1px #ccc;" align="center"  width="500px"><b>Ketidakhadiran UAS</td>
						<td rowspan="2" style="font-size:12px;border-right:solid 1px #ccc;" align="center"  width="100px"><b>Action</td>
					</tr>
					<tr style="font-weight:bold;height:25px;background:lightblue;border-bottom:solid 1px #ccc;">
						<td style="font-size:12px;text-align:center;border-right:solid 1px #ccc;">I</td>
						<td style="font-size:12px;text-align:center;border-right:solid 1px #ccc;">S</td>
						<td style="font-size:12px;text-align:center;border-right:solid 1px #ccc;">A</td>
						<td style="font-size:12px;text-align:center;border-right:solid 1px #ccc;">I</td>
						<td style="font-size:12px;text-align:center;border-right:solid 1px #ccc;">S</td>
						<td style="font-size:12px;text-align:center;border-right:solid 1px #ccc;">A</td>
					</tr>
					<?
						$idKelas = mysql_query("select * from m_kelas where kelasRuang='$_GET[kelas]'");
						$a_idKelas = mysql_fetch_array($idKelas);
						
						$no = 1;
						$selSiswa = mysql_query("select * from m_siswa where kelas ='$a_idKelas[id]' order by nama_siswa asc");
						while($a_selSiswa = mysql_fetch_array($selSiswa))
						{
							?>
								<form method="POST" action="updateAbsen.php">
									<tr style="border-bottom:solid 1px #ccc;">
										<td style="text-align:Center;font-size:12px;border-left:solid 1px #ccc;border-right:solid 1px #ccc;"><?echo $no++;?></td>
										<td style="text-align:Center;font-size:12px;border-right:solid 1px #ccc;"><?echo $a_selSiswa['no_induk'];?></td>
										<td style="text-align:left;font-size:12px;border-right:solid 1px #ccc;"><?echo $a_selSiswa['nama_siswa'];?></td>
										<td style="text-align:Center;font-size:12px;border-right:solid 1px #ccc;"><?echo kelas($a_selSiswa['kelas']);?></td>
										<input type="hidden" value="<?echo $a_selSiswa['id'];?>" name="id">
										<input type="hidden" value="<?echo kelas($a_selSiswa['kelas']);?>" name="kelas">
										<?
											$selData = mysql_query("select * from tbl_absen where noInduk='$a_selSiswa[no_induk]'");
											$a_selData = mysql_fetch_array($selData);
										?>
										<td style="border-right:solid 1px #ccc;">
											<input type="text" style="font-size:12px;text-align:Center;border:none;" name="sakit" value="<? echo $a_selData['sakit'];?>" class="form-control" autocomplete="off">
										</td>
										<td style="border-right:solid 1px #ccc;">
											<input type="text" style="font-size:12px;text-align:Center;border:none;" name="ijin" value="<? echo $a_selData['ijin'];?>" class="form-control" autocomplete="off">
										</td>
										<td style="border-right:solid 1px #ccc;">
											<input type="text" style="font-size:12px;text-align:Center;border:none;" name="alpha" value="<? echo $a_selData['alpha'];?>" class="form-control" autocomplete="off">
										</td>
										<td style="border-right:solid 1px #ccc;">
											<input type="text" style="font-size:12px;text-align:Center;border:none;" name="sakit1" value="<? echo $a_selData['sakit1'];?>" class="form-control" autocomplete="off">
										</td>
										<td style="border-right:solid 1px #ccc;">
											<input type="text" style="font-size:12px;text-align:Center;border:none;" name="ijin1" value="<? echo $a_selData['ijin1'];?>" class="form-control" autocomplete="off">
										</td>
										<td style="border-right:solid 1px #ccc;">
											<input type="text" style="font-size:12px;text-align:Center;border:none;" name="alpha1" value="<? echo $a_selData['alpha1'];?>" class="form-control" autocomplete="off">
										</td>
										<td style="border-right:solid 1px #ccc;text-align:Center;">
											<input type="submit" value="Simpan" name="simpan" class="btn btn-sm btn-success" style="font-weight:bold;font-size:10px;" autocomplete="off">
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