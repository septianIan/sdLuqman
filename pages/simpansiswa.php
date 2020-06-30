<?
error_reporting(E_ALL ^ E_DEPRECATED);
mysql_connect('localhost','root','clusterstorm');
mysql_select_db('sdluqman');
$a=$_POST['siswa'];
$b=$_POST['induk'];
$c=$_POST['kelas'];
$d=$_POST['jk'];
$e=$_POST['ttl'];
$f=$_POST['agama'];
$g=$_POST['anak_ke'];
$h=$_POST['status'];
$i=$_POST['alamat'];
$j=$_POST['ayah'];
$k=$_POST['ibu'];
$l=$_POST['ortu'];
$m=$_POST['telpon'];
$n=$_POST['kerja'];
$o=$_POST['wali'];
$p=$_POST['alamat_wali'];
$q=$_POST['telepon'];
$simpan=mysql_query("insert into m_siswa(nama_siswa,no_induk,kelas,jk,ttl,agama,anak_ke,status,alamat_siswa,ayah,ibu,alamat_ortu,telp,pekerjaan,nama_wali,alamat_wali,telpon) values('$a','$b','$c','$d','$e','$f','$g','$h','$i','$j','$k','$l','$m','$n','$o','$p','$q')");
if($simpan)
{
	$simpankeabsen=mysql_query("insert into tbl_absen(noInduk,nama,kelas) values('$b','$a','$c')");
	if($simpankeabsen)
	{
		$simpankeakhlak=mysql_query("insert into tbl_akhlak(noInduk,nama,kelas) values('$b','$a','$c')");
		if(simpankeakhlak)
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