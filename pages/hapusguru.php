<?
	include ("kakashi.php");
	
	$hapus=mysql_query("delete from m_guru where id='$_GET[id]'");
	if($hapus)
	{
		?>
			<script>
				window.location="guru.php";
			</script>
		<?
	}
	else
	{
		echo mysql_error();
	}
?>