<?
	error_reporting(E_ALL^E_DEPRECATED^E_NOTICE);
	mysql_connect('localhost','root','clusterstorm');
	mysql_select_db('sdluqman');
	$kelas=$_POST['a'];
	$ruang=$_POST['b'];
	$kelasRuang=($kelas."-".$ruang);
	$simpan=mysql_query("insert into m_kelas(kelas,ruang,kelasRuang) values('$kelas','$ruang','$kelasRuang')");
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
		?>
			<script>
				alert('Gagal Memasukan!!');
				window.location="master_sistem.php";
			</script>
		<?
	}
?>