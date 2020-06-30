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
				<b style="font-size:12px">Data Siswa kelas : <? echo kelas($a_abc['kelas']);?></b>
			</div>
			<div class="panel-body" style="height:555px;overflow-y:Auto;">
				<table style="font-size:12px;">
					<tr style="height:40px;border-bottom:solid 1px #ccc;background:lightblue;text-align:Center;font-weight:bold;">
						<td style="width:50px;border-left:solid 1px #ccc;border-right:solid 1px #ccc;">No</td>
						<td style="width:100px;border-right:solid 1px #ccc;">No.Induk</td>
						<td style="width:350px;border-right:solid 1px #ccc;">Nama</td>
						<td style="width:75px;border-right:solid 1px #ccc;">Kelas</td>
						<td style="width:150px;border-right:solid 1px #ccc;">JK</td>
						<td style="width:100px;border-right:solid 1px #ccc;">TTL</td>
						<td style="width:100px;border-right:solid 1px #ccc;">Agama</td>
						<td style="width:100px;border-right:solid 1px #ccc;">Cetak<br> Biodata</td>
					</tr>
					<?
						$idKelas = mysql_query("select * from m_kelas where kelasRuang='$_GET[kelas]'");
						$a_idKelas = mysql_fetch_array($idKelas);
						
						$no = 1;
						$selSiswa = mysql_query("select * from m_siswa where kelas ='$a_idKelas[id]' order by nama_siswa asc");
						while($a_selSiswa = mysql_fetch_array($selSiswa))
						{
							?>
								<tr style="height:30px;border-bottom:solid 1px #ccc;">
									<td style="text-align:Center;font-size:12px;border-left:solid 1px #ccc;border-right:solid 1px #ccc;"><?echo $no++;?></td>
									<td style="text-align:Center;font-size:12px;border-right:solid 1px #ccc;"><?echo $a_selSiswa['no_induk'];?></td>
									<td style="text-align:left;font-size:12px;border-right:solid 1px #ccc;"><?echo $a_selSiswa['nama_siswa'];?></td>
									<td style="text-align:Center;font-size:12px;border-right:solid 1px #ccc;"><?echo kelas($a_selSiswa['kelas']);?></td>
									<td style="text-align:Center;font-size:12px;border-right:solid 1px #ccc;"><?echo $a_selSiswa['jk'];?></td>
									<td style="text-align:Center;font-size:12px;border-right:solid 1px #ccc;"><?echo $a_selSiswa['ttl'];?></td>
									<td style="text-align:Center;font-size:12px;border-right:solid 1px #ccc;"><?echo $a_selSiswa['agama'];?></td>
									<td style="text-align:Center;border-right:solid 1px #ccc;">
										<a a href="output/datasiswapdf.php?noInduk=<?echo $a_selSiswa['no_induk']?>" target="_blank">
											<img src="../icon/print.png" width="20" height="20">
										</a>
									</td>
								</tr>
							<?
						}
					?>
				</table>
			</div>
		</div>
	</div>
</div>