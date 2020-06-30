<?
	error_reporting(E_ALL^E_DEPRECATED^E_NOTICE);
	mysql_connect('localhost','root','clusterstorm');
	mysql_select_db('sdluqman');
	$ekstra= $_POST['a'];
	$simpan=mysql_query("insert into m_ekstra(ekstra) values('$ekstra');");
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