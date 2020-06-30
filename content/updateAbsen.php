<?
	include ("kakashi.php");
	$kelas=$_POST['kelas'];
	$no=$_POST['id'];
	$sakit=$_POST['sakit'];
	$ijin=$_POST['ijin'];
	$alpha=$_POST['alpha'];
	$sakit1=$_POST['sakit1'];
	$ijin1=$_POST['ijin1'];
	$alpha1=$_POST['alpha1'];
	
	$update=mysql_query("update tbl_absen set sakit='$sakit',sakit1='$sakit1',ijin='$ijin',ijin1='$ijin1',alpha='$alpha',alpha1='$alpha1' where id='$no'");
	if($update)
	{
		?>
			<script>
				alert("Berhasil!!");
				window.location="index.php?menu=absen&kelas=<?echo $kelas;?>";
			</script>
		<?
	}
	else
	{
		mysql_error();
	}
?>