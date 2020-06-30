<?
	include("kakashi.php");
	//IDENTITAS GURU
	$nip = $_POST['nip'];
	$nama = $_POST['nama'];
	$ttl = $_POST['ttl'];
	$alamat = $_POST['ktp'];
	$noktp = $_POST['alamat'];
	$thnlulus = $_POST['thnLulus'];
	$jurusan = $_POST['jurusan'];
	$ibu = $_POST['ibu'];
	$nosk = $_POST['noSK'];
	$tglsk = $_POST['tglSK'];
	$waliKelas = $_POST['waliKelasStat'];
	$kelas = $_POST['kelasWaliTrue'];
	
	$file = $_FILES ['gambar'];
	$nama_file = $_FILES ['gambar']['name'];
	$ukuran_file = $_FILES ['gambar']['size'];
	$tipe_file = $_FILES ['gambar']['type'];
	$tmp_file = $_FILES ['gambar']['tmp_name'];
	
	if(move_uploaded_file($tmp_file,"images/guru/".$nama_file))
	{	
		//AMBIL DATA KELAS
		$selKelas = mysql_query("select * from m_kelas where id='$kelas'");
		$a_selKelas = mysql_fetch_array($selKelas);
		$kelasWali = $a_selKelas['kelas']."-".$a_selKelas['ruang'];

		//QUERY INSESRT M_GURU
		if($waliKelas == "0")
			$simpanGuru = mysql_query("insert into m_guru(nip,nama,ttl,alamat,noKtp,thnLulus,jurusan,ibu,noSK,tglSK,gambar,aktifasi,aktif) values ('$nip','$nama','$ttl','$alamat','$noktp','$thnlulus','$jurusan','$ibu','$nosk','$tglsk','$nama_file','0','1')");
		else
			$simpanGuru = mysql_query("insert into m_guru(nip,nama,ttl,alamat,noKtp,thnLulus,jurusan,ibu,noSK,tglSK,waliKelas,gambar,aktifasi,aktif) values ('$nip','$nama','$ttl','$alamat','$noktp','$thnlulus','$jurusan','$ibu','$nosk','$tglsk','$kelasWali','$nama_file','0','1')");
		
		if($simpanGuru)
		{
			//QUERY INSERT M_GURUPELAJARAN
			$panjangPelajaran = count($_POST['pelajaran']);
			for($a=0;$a<=($panjangPelajaran-1);$a++)
			{
				$pelajaran = str_replace(" ","_",$_POST['pelajaran'][$a]);
				$panjangKelas = count($_POST[$pelajaran]);
				for($b=0;$b<=($panjangKelas-1);$b++)
				{
					$pelajaranKelas = $_POST[$pelajaran][$b];
					$simpanGuruPelajaran = mysql_query("insert into m_gurupelajaran(nip,nama,kelas,pelajaran,createTbl) values ('$nip','$nama','$pelajaranKelas','$pelajaran','0')");
				}
			}
			
			//QUERY INSERT M_GURUEKSTRA
			$panjangEkstra = count($_POST['ekstra']);
			for($c=0;$c<=($panjangEkstra-1);$c++)
			{
	
			$ekstra = str_replace(" ","_",$_POST['ekstra'][$c]);
				$simpanGuruEkstra = mysql_query("insert into m_guruekstra(nip,nama,ekstra,createTbl) values ('$nip','$nama','$ekstra','0')");
			}
			
			?>
				<script>
					alert("Berhasil menyimpan data guru!!!");
					window.location = "guru.php";
				</script>
			<?
		}	
	}	
	else
	{
	echo mysql_error();
	}
?>