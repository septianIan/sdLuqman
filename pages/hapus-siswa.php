<?
	include ("kakashi.php");
	
	$hapus=mysql_query("delete from m_siswa where id='$_GET[id]'");
	if($hapus)
	{
		?>
			<script>
				window.location="siswa.php";
			</script>
		<?
	}
	else
	{
		echo mysql_error();
	}
?>