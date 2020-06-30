<div class="row">
	<?
		include("kakashi.php");
		$selguru=mysql_query("select*from m_guru where nama='$a_detailGuru[nama]'");
	?>
	<div class="col-lg-12" style="margin:10px 0 0 0px;">
		<div class="panel panel-default">
			<div class="panel-body" style="height:550px;border:solid 1px #ccc;">
				<div style="width:1055px;margin:0 0 0 -10px;">
					<div class="panel-body" style="height:300px;width:1060px;margin:0 0 0 16px;border:solid 1px #ccc;">
						<img src="../images/asd.jpg" style="width:1030px;height:270px;">
					</div>
					<div class="panel-body" style="height:215px;width:500px;margin:5px 0 0 16px;border:solid 1px #ccc;">
					<form method="POST" action="process.php?doraemon=simpanCatatan">
						<table style="font-size:12px;">
							<tr>
								<td style="padding-bottom:5px;"><b> Catatan : </b></td>
							</tr>
							<tr>
								<td style="background:#efefef;">
									<textarea style="width:468px;height:120px;resize:none;" name="catatan"> <? echo $a_selguru['catatan']?> </textarea>
								</td>
							</tr>
							<tr>
								<input type="hidden" name="nip" value="<? echo $a_selguru['nip']?>">
								<input type="hidden" name="url" value="<? echo $_SERVER['REQUEST_URI']?>">
								<td><input type="submit" value="simpan" name="simpan" class="btn btn-primary" style="float:right;"></td>
							</tr>
						</table>
					</div>
					<div class="panel-body" style="height:215px;width:340px;margin:-215px 0 0 520px;border:solid 1px #ccc;overflow-y:auto;">
						<font style="font-size:12px;float:right;border-bottom:solid 1px #ccc;"><b>IDENTITAS USER</b></font><br>
						<table style="margin:5 0 0 0;font-size:12px;color:green;font-style:italic;background:#efefef;">
							<tr>
								<td style="width:300px;border:solid 1px #ccc;" title="Nama Guru">
									<?
										echo $a_selguru['nama'];
									?>
								</td>
							</tr>
							<tr>
								<td style="width:300px;border:solid 1px #ccc;" title="Wali Kelas">
									<?
										if(empty($a_selguru['walikelas']))
											echo "<font style='color:red'>Wali Kelas : -</font>";
										else
											echo "<font style='color:green'>Wali Kelas : ".$a_selguru['walikelas']."</font>"
									?>
								</td>
							</tr>
							<tr>
								<td style="width:300px;border:solid 1px #ccc;" title="Pelajaran">
									<?
										$selPelajaran = mysql_query("select * from m_gurupelajaran where nama='$a_selguru[nama]'");
										while($a_selPelajaran = mysql_fetch_array($selPelajaran))
										{
											echo $a_selPelajaran['pelajaran']."-".$a_selPelajaran['kelas']."<br>";
										}
									?>
								</td>
							</tr>
							<tr>
								<td style="width:300px;border:solid 1px #ccc;" title="Ekstrakulikuler">
									<?
										$selEkstra = mysql_query("select * from m_guruekstra where nama='$a_detailGuru[nama]'");
										while($a_selEkstra = mysql_fetch_array($selEkstra))
										{
											echo $a_selEkstra['ekstra']."<br>";
										}
									?>
								</td>
							</tr>
						</table>				
					</div>
					<div class="panel-body" style="height:215px;width:210px;margin:-215px 0 0 865px;border:solid 1px #ccc;">
						<img src="../pages/images/guru/<? echo $a_selguru['gambar']?>" style="width:150px;height:200px;padding:3px 3px;margin:-9px 0 0 15px">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
