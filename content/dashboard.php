<?
	$idKelas = mysql_query("select * from m_kelas where kelasRuang='$_GET[kelas]'");
	$a_idKelas = mysql_fetch_array($idKelas);
	
	$abc = mysql_query("select * from m_siswa where kelas ='$a_idKelas[id]' order by nama_siswa asc");
	$a_abc = mysql_fetch_array($abc);	
?>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default" style="margin:10px 0 0 0;">
			<div class="panel-heading" style="background:lightblue;">
				<b style="font-size:12px;">Akhlak & Kepribadian Kelas : <? echo kelas($a_abc['kelas']);?></b>
			</div>
			<div class="panel-body" style="height:550px;overflow-y:Auto;backgroun:lightblue;">
				<table style="font-size:12px;">
						<tr style="text-align:Center;font-weight:bold;background:lightblue;border-bottom:solid 1px #ccc;height:25px;">
							<td rowspan="2" width="50px" style="border-right:Solid 1px #ccc;border-left:solid 1px #ccc;">No</td>
							<td rowspan="2" width="100px" style="border-right:Solid 1px #ccc;">No.Induk</td>
							<td rowspan="2" width="250px" style="border-right:Solid 1px #ccc;">Nama Siswa</td>
							<td rowspan="2" width="75px" style="border-right:Solid 1px #ccc;">Kelas</td>
							<td colspan="3" style="border-right:Solid 1px #ccc;">Kepribadian</td>
							<td rowspan="2" style="border-right:Solid 1px #ccc;width:100px;">Action</td>
						</tr>
						<tr style="text-align:Center;font-weight:bold;background:lightblue;height:25px;border-bottom:solid 1px #ccc;">
							<td style="border-right:Solid 1px #ccc;">Sikap</td>
							<td style="border-right:Solid 1px #ccc;">Kerajinan</td>
							<td style="border-right:Solid 1px #ccc;width:200px;">Kebersihan dan Kerapian</td>
						</tr>
					<?	
						$no = 1;
						$selSiswa = mysql_query("select * from m_siswa where kelas ='$a_idKelas[id]' order by nama_siswa asc");
						while($a_selSiswa = mysql_fetch_array($selSiswa))
						{
							?>
								<form method="POST" action="updateAkhlak.php">
									<tr style="border-bottom:solid 1px #ccc;">
										<td style="text-align:center;border-left:solid 1px #ccc;border-right:solid 1px #ccc;"><? echo $no++;?></td>
										<td style="text-align:center;border-right:solid 1px #ccc;"><? echo $a_selSiswa['no_induk'];?></td>
										<td style="border-right:solid 1px #ccc;"><? echo $a_selSiswa['nama_siswa'];?></td>
										<td style="text-align:center;border-right:solid 1px #ccc;"><? echo kelas($a_selSiswa['kelas']);?></td>
										<input type="hidden" name="kelas" value="<? echo kelas($a_selSiswa['kelas']);?>">
										<input type="hidden" name="id" value="<? echo $a_selSiswa['id'];?>">
										<?
											$selAkhlak=mysql_query("select * from tbl_akhlak where id='$a_selSiswa[id]';");
											$a_selAkhlak=mysql_fetch_array($selAkhlak);
										?>
										<td style="border-right:solid 1px #ccc;padding:5px 5px;">
											<select name="sikap" class="form-control" style="font-size:12px;">
												<option value="<? echo $a_selAkhlak['sikap'];?>"><? echo $a_selAkhlak['sikap'];?></option>
												<option value="">--Pilihan--</option>
												<option value="Kurang">Kurang</option>
												<option value="Baik">Baik</option>
												<option value="Sangat Baik">Sangat Baik</option>
											</select>
										</td>
										<td style="border-right:solid 1px #ccc;padding:5px 5px;">
											<select name="kerajinan" class="form-control" style="font-size:12px;">
												<option value="<? echo $a_selAkhlak['kerajinan'];?>"><? echo $a_selAkhlak['kerajinan'];?></option>
												<option value="">--Pilihan--</option>
												<option value="Kurang">Kurang</option>
												<option value="Baik">Baik</option>
												<option value="Sangat Baik">Sangat Baik</option>
											</select>
										</td>
										<td style="border-right:solid 1px #ccc;padding:5px 5px;">
											<select name="kerapian" class="form-control" style="font-size:12px;">
												<option value="<? echo $a_selAkhlak['kerapian'];?>"><? echo $a_selAkhlak['kerapian'];?></option>
												<option value="">--Pilihan--</option>
												<option value="Kurang">Kurang</option>
												<option value="Baik">Baik</option>
												<option value="Sangat Baik">Sangat Baik</option>
											</select>
										</td>
										<td align="center" style="border-right:solid 1px #ccc;padding:5px 5px;">
											<input type="submit" name="Simpan" value="Simpan" class="btn btn-primary" style="font-weight:bold;font-size:10px;">
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