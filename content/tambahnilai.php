<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-info" style="margin:10px 0 0 0px;">
			<div class="panel-body">
				<table class="table table-bordered">
						<tr style="align:center;">
							<td style="font-size:12px;border-right:solid 1px #ccc;border-solid:left 1px #ccc;" align="center" bgcolor="lightblue" width="50px">NO</td>
							<td style="font-size:12px;border-right:solid 1px #ccc;" align="center" bgcolor="lightblue" width="100px">NO.INDUK</td>
							<td style="font-size:12px;border-right:solid 1px #ccc;" align="center" bgcolor="lightblue" width="700px">NAMA SISWA</td>
							<td style="font-size:12px;border-right:solid 1px #ccc;" align="center" bgcolor="lightblue" width="75px">
								<select>
									<option>JENIS NILAI</option>
									<option value="">pahala</option>
									<option value="">akhirot</option>
									<option value="">dosa</option>
									<option value="">cinta</option>
									<option value="">mbuh</option>
								</select>
							</td>
						</tr>
						<?
							$no=1;
							$sis= mysql_query("select * from m_siswa order by id asc");
							while($a_sis= mysql_fetch_array($sis))
							{
								?>
								<tr>
									<td style="font-size:12px" align="center"><?php echo $no++; ?></td>
									<td style="font-size:12px" align="center"><?php echo $a_sis['no_induk'];?></td>
									<td style="font-size:12px" align="left"><?php echo $a_sis['nama_siswa'];?></td>
									<td width="30"><input type="text" name="jenis" class="form-control"></td>
								</tr>
								<?
							}
						?>
				</table>
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td>
						<input type="submit" value="Simpan" name="simpan" class="btn btn-lg btn-success" style="font-size:16px;float:Right;">
					</td>
				</tr>
			</div>
		</div>
	</div>