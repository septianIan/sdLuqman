<?
	include("kakashi.php");
	$id=$_POST['id'];
	$deaktifasi = mysql_query("update m_guru set aktifasi='0' where id='$id'");
	if($deaktifasi)
	{
		?>
			<script>
				alert("berhasil deaktifasi!!");
				window.location="control.php"
			</script>
		<?
	}
	else
	{
		echo mysql_error();
	}
?>