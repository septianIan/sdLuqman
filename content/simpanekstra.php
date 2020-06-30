<?
	session_start();
	include("kakashi.php");
	
	
	$jumMurid = count($_POST['ekstra']);
	$cekSum = 0;
	for($r=0;$r<=($jumMurid-1);$r++)
	{
		$noInduk = $_POST['ekstra'][$r];
		
		$detail = mysql_query("select * from m_siswa where no_induk='$noInduk'");
		$a_detail = mysql_fetch_array($detail);
		
		$nama = $a_detail['nama_siswa'];
		
		$kelas = mysql_query("select * from m_kelas where id='$a_detail[kelas]'");
		$a_kelas = mysql_fetch_array($kelas);
		
		$kelasEkstra = $a_kelas['kelasRuang'];
		$ekstra = $_POST['jenisEkstra'];
		
		//PROSES INPUT PESERTA EKSTRA
		$insert = mysql_query("insert into tbl_pesertaekstra(noInduk,nama,kelas,ekstra) values ('$noInduk','$nama','$kelasEkstra','$ekstra')");
		if($insert)
			$cekSum = $cekSum + 1;
		else
			$cekSum = $cekSum;
	}
	
	if($cekSum == $jumMurid)
	{
		//UPDATE M_GURU EKSTRA
		$update = mysql_query("update m_guruekstra set createTbl='1' where ekstra='$ekstra'");
		if($update)
		{
			?>
				<script>
					alert("Berhasil menyimpan peserta ekstra...!");
					window.location = "<?echo $_POST['url']?>"
				</script>
			<?
		}
		
		else
		{
			?>
				<script>
					alert("Peserta ekstra tersimpan. Status guru belum diupdate...!");
					window.location = "<?echo $_POST['url']?>"
				</script>
			<?
		}
	}
	
	else
	{
		?>
			<script>
				alert("Ada peserta yang belum tersimpan...!");
				window.location = "<?echo $_POST['url']?>"
			</script>
		<?
	}
	
?>	