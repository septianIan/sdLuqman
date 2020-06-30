<?
	include("kakashi.php");
	
	$a=$_POST['siswa'];
	$b=$_POST['induk'];
	$c=$_POST['kelas'];
	$d=$_POST['jk'];
	$e=$_POST['ttl'];
	$f=$_POST['agama'];
	$g=$_POST['anak_ke'];
	$h=$_POST['status'];
	$i=$_POST['alamat_siswa'];
	$j=$_POST['ayah'];
	$k=$_POST['ibu'];
	$l=$_POST['ortu'];
	$m=$_POST['telpon'];
	$n=$_POST['kerja'];
	$o=$_POST['wali'];
	$p=$_POST['alamat'];
	$q=$_POST['telepon'];
	$id=$_POST['id'];
	
	$update=mysql_query("update m_siswa set nama_siswa='$a',no_induk='$b',kelas='$c',jk='$d',ttl='$e',agama='$f',anak_ke='$g',status='$h',alamat_siswa='$i',ayah='$j',ibu='$k',alamat_ortu='$l',telp='$m',pekerjaan='$n',nama_wali='$o',alamat_wali='$p',telpon='$q' where id='$id'");
	if($update)
	{
		$updatekeabsen=mysql_query("update tbl_absen set nama='a',kelas='$c' where noInduk='$b'");
		if($updatekeabsen)
		{
			$updatekeakhlak=mysql_query("update tbl_akhlak set nama='$a',kelas='$c' where noInduk='$b'");
			if($updatekeakhlak)
			{
				?>
					<script>
						alert("Berhasil Simpan!!");
						window.location="siswa.php";
					</script>
				<?
			}
			else
			{
				mysql_error();
			}
		}
		else
		{
			mysql_error();
		}
	}
	else
	{
		echo mysql_error();
	}
?>