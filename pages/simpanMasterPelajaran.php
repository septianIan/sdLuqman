<?
	include("kakashi.php");

	$pelajaran= $_POST['a'];
	$simpan = mysql_query("insert into m_pelajaran(pelajaran) values('$pelajaran')");
	if($simpan)
	{
		?>
			<script>
				alert('berhasil');
				window.location="master_sistem.php";
			</script>
		<?
	}
	else
	{
		echo mysql_error();
	}
?>