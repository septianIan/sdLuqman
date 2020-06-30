<?
	include("kakashi.php");
	
	$nama =$_POST['nama'];
	$pelajaran =$_POST['pelajaran'];
	$kelas =$_POST['kelas'];
	 
	
	$nggawe=mysql_query("create table $nama(id INT NOT NULL AUTO_INCREMENT, noInduk VARCHAR(10) NOT NULL, semester VARCHAR(10) NOT NULL, thnAjaran VARCHAR(20) NOT NULL, nama VARCHAR(200) NOT NULL, tag VARCHAR(50) NOT NULL, urutan INT(5) NOT NULL, nilai INT(5) NOT NULL, marker INT(2) NOT NULL, PRIMARY KEY (id))");
	if($nggawe)
	{
		$update=mysql_query("update m_gurupelajaran set createTbl='1' where pelajaran='$pelajaran' and kelas='$kelas'");
		if($update)
		{
			?>
				<script>
					alert("Berhasil Buat Tabel!!");
					window.location="index.php?menu=nilaiPelajaran&pelajaran=<? echo $pelajaran;?>&kelas=<? echo $kelas;?>";
				</script>
			<?
		}
		else
		{
			mysql_error();
		}
	}
	else
	{
		mysql_error();
	}
?>