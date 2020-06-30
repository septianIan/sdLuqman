<div class="row">
	<?
		$cek = mysql_query("select * from m_guruekstra where ekstra='$_GET[ekstra]'");
		$a_cek = mysql_fetch_array($cek);
		
		if($a_cek['createTbl'] == "0")
		{
			?>
				<div class="col-lg-12" style="margin:10px 0 0 0;">
					<div class="panel panel-default">
						<div class="panel-heading" style="background:lightblue;font-size:12px;">
							<b>Peserta Ekstrakurikuler <?echo $_GET['ekstra']?></b>
						</div>
						<div class="panel-body">
							<form method="POST" action="simpanekstra.php">
								<?
									#PESERTA EKSTRA BELUM DIPILIH, KELUAR INTERFACE PILIH PESERTA EKSTRA
										$kelas = mysql_query("select distinct(kelasRuang) as kelas from m_kelas order by kelasRuang asc");
										while($a_kelas = mysql_fetch_array($kelas))
										{
											?>
												<Table style="float:left;font-size:12px;margin:3px 3px 3px 3px;">
													<tr style="border-top:solid 1px #ccc;border-bottom:solid 1px #ccc;height:25px;text-align:center;background:lightblue;font-weight:bold;">
														<td colspan="2" style="border-left:solid 1px #ccc;border-right:solid 1px #ccc;"><?echo $a_kelas['kelas']?></td>
													</tr>
													<?
														$id = mysql_query("select * from m_kelas where kelasRuang='$a_kelas[kelas]'");
														$a_id= mysql_fetch_array($id);
														
														$siswa = mysql_query("select * from m_siswa where kelas='$a_id[id]' order by nama_siswa asc");
														while($a_siswa = mysql_fetch_array($siswa))
														{
															?>
																<tr style="border-top:solid 1px #ccc;border-bottom:solid 1px #ccc;height:25px;">
																	<td style="width:20px;border-left:Solid 1px #ccc;text-align:Center;">
																		<input type="checkbox" name="ekstra[]" value="<?echo $a_siswa['no_induk']?>" title="<?echo $a_siswa['nama_siswa'].' '.$a_id['kelasRuang']?>">
																	</td>
																	<td style="width:100px;border-right:Solid 1px #ccc;"><?echo $a_siswa['nama_siswa']?></td>
																</tr>
															<?
														}
													?>
												</table>
											<?
										}
									?>
								<div style="clear:both;"></div>
								<div style="width:100px;height:50px;float:left;margin:5 0 0 5;">
									<input type="hidden" name="jenisEkstra" value="<?echo $_GET['ekstra']?>">
									<input type="hidden" name="url" value="<?echo $_SERVER['REQUEST_URI']?>">
									<input type="submit" name="simpanEkstra" value="Simpan Peserta" class="btn btn-primary">
								</div>
							</form>
						</div>
					</div>
				</div>
			<?
		}
		
		else
		{
			?>
				<div class="col-lg-12" style="margin:10px 0 0 0;">
					<div class="panel panel-default">
						<div class="panel-heading" style="background:lightblue;font-size:12px;">
							<b>Simpan & Edit Nilai Ekstrakurikuler <?echo $_GET['ekstra']?></b>
						</div>
						<div class="panel-body" style="height:500px;overflow-y:auto;">
							<table style="fonr-size:12px;">
								<thead>
								<tr style="font-weight:bold;font-size:12px;height:30px;border:top:Solid 1px #ccc;border-bottom:solid 1px #ccc;">
									<td bgcolor="lightblue" align="center" style="width:50px;border-left:Solid 1px #ccc;border-right:solid 1px #ccc;">No</td>
									<td bgcolor="lightblue" align="center" style="width:300px;border-right:solid 1px #ccc;">Nama Siswa</td>
									<td bgcolor="lightblue" align="center" style="width:75px;border-right:solid 1px #ccc;">Kelas</td>
									<td bgcolor="lightblue" align="center" style="width:125px;border-right:solid 1px #ccc;">Ekstra</td>
									<td bgcolor="lightblue" align="center" style="width:100px;border-right:solid 1px #ccc;">UAS</td>
									<td bgcolor="lightblue" align="center" style="width:300px;border-right:solid 1px #ccc;">Catatan</td>
									<td bgcolor="lightblue" align="center" style="width:75px;border-right:solid 1px #ccc;">Action</td>
								</tr>
								</thead>
								<tbody>
									<?
										$no=1;
										$ekstra = mysql_query("select * from tbl_pesertaekstra where ekstra='$_GET[ekstra]' order by kelas,nama asc");
										while($a_ekstra = mysql_fetch_array($ekstra))
										{
											?>
												<form method="POST" action="updateekstra.php">
													<tr style="border-bottom:solid 1px #ccc;">
														<td style="text-align:Center;border-right:solid 1px #ccc;border-left:solid 1px #ccc;"><? echo $no++ ?></td>
														<td style="font-size:12px;align:left;border-right:solid 1px #ccc;padding:3px 3px;"><? echo $a_ekstra['nama']?></td>
														<td style="font-size:12px;text-align:center;border-right:solid 1px #ccc;"><? echo $a_ekstra['kelas']?></td>
														<td style="font-size:12px;text-align:center;border-right:solid 1px #ccc;"><? echo $a_ekstra['ekstra']?></td>
														<td style="width:100px;border-right:solid 1px #ccc;padding:3px 3px;">
															<select name="uas" class="form-control" style="text-align:center;padding:3px 3px;">
																<option value="<? echo $a_ekstra['UAS']?>"><? echo $a_ekstra['UAS']?></option>
																<option value="">--Pilihan--</option>
																<option value="A">A</option>
																<option value="B">B</option>
																<option value="C">C</option>
															</select>
														</td>
														<td style="border-right:solid 1px #ccc;padding:3px 3px;">
															<textarea class="form-control;" style="resize:none;width:350px;padding:3px 3px;" name="catatan"><? echo $a_ekstra['catatan']?></textarea>
														</td>
														<td style="text-align:center;border-right:solid 1px #ccc;">
															<input type="hidden" name="id" value="<? echo $a_ekstra['id']?>">
															<input type="hidden" name="url" value="<? echo $_SERVER['REQUEST_URI']?>">
															<input type="submit" value="Simpan" name="simpan" class="btn btn-sm btn-success" style="font-size:10px;align:center;">
														</td>
													</tr>
												</form>
											<?
										}
									?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			<?
		}
	?>
</div>