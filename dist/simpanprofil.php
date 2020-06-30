<?php
	
	error_reporting(E_ALL ^ E_DEPRECATED);
	//KONEK KE DATABASE
	mysql_connect('localhost','root','');
	mysql_select_db('web');
	
	//AMBIL VARIABEL DARI INTERFACE HTML
	$jabatan= $_POST['jabatan'];
	$nama = $_POST['nama'];
	$riwayat = $_POST['riwayat'];
	$status = $_POST['status'];
	
	$nama_file = $_FILES ['gambar']['name'];
	$ukuran_file = $_FILES ['gambar']['size'];
	$tipe_file = $_FILES['gambar']['type'];
	$tmp_file = $_FILES['gambar']['tmp_name'];
	
	// Set path folder tempat menyimpan gambarnya
	$path = "images/".$nama_file;
	
	if(move_uploaded_file($tmp_file,"../images/".$nama_file))
	{
		//MELAKUKAN QUERY KE MYSQL DENGAN PHP
		$simpan=mysql_query("INSERT INTO profil(jabatan,nama,riwayat,gambar,status) VALUES ('$jabatan','$nama','$riwayat','$nama_file','$status')");
		IF($simpan)
			{
				?>
					<script>
					alert('berhasil');
					window.location="profil_adm.php"
					</script>
				<?php
			}
		else
			{
				?>
					<script>
					alert('gagal daftar');
					window.location="profil_adm.php";
					</script>
				<?php	
			}
	}
	
	else
	{
		?>
			<script>
				alert("gagal...!!!!! file terlalu besar");
				window.location="profil_adm.php";
			</script>
		<?php
	}
?>