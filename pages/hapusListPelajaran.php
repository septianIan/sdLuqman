<?
	error_reporting(E_ALL^ E_DEPRECATED);
	include ('kakashi.php');
	
	$hapus=mysql_query("delete from m_pelajaran where id='$_GET[id]'");
	if($hapus)
	{
		?>
			<script>
				window.location="master_sistem.php";
			</script>
		<?
	}
	else
	{
		echo mysql_error();
	}
?>