<?
	include("kakashi.php");
	
	$id = $_POST['id'];
	$uas = $_POST['uas'];
	$catatan = $_POST['catatan'];
	
	$update = mysql_query("update tbl_pesertaekstra set uas='$uas',catatan='$catatan' where id='$id'");
	if($update)
	{
		?>
			<script>
				alert("Nilai ekstrakurikuler berhasil dirubah...!");
				window.location = "<?echo $_POST['url']?>"
			</script>
		<?
	}
	
	else
	{
		?>
			<script>
				alert("Gagal menyimpan nilai ekstrakurikuler...!");
				window.location = "<?echo $_POST['url']?>"
			</script>
		<?
	}
?>