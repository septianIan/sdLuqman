<?
	include("kakashi.php");
	$kelas=$_POST['kelas'];
	$no=$_POST['id'];
	$sikap=$_POST['sikap'];
	$kerajinan=$_POST['kerajinan'];
	$kerapian=$_POST['kerapian'];
	
	$update=mysql_query("update tbl_akhlak set sikap='$sikap',kerajinan='$kerajinan',kerapian='$kerapian' where id='$no'");
	if($update)
	{
		?>
			<script>
				alert("Berhasil!!");
				window.location="index.php?menu=akhlak&kelas=<?echo $kelas;?>";
			</script>
		<?
	}
	else
	{
		mysql_error();
	}
?>