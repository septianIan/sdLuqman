<?
	session_start();
	include("kakashi.php");
	
	#FUNCTION
	#NAMA SISWA
	function namaSiswa($noInduk)
	{
		$nama = mysql_query("select * from m_siswa where no_induk='$noInduk'");
		$a_nama = mysql_fetch_array($nama);
		
		return $a_nama['nama_siswa'];
	}
	
	#SEMESTER
	function semester()
	{
		$sem = mysql_query("select * from m_param where param='semester'");
		$a_sem = mysql_fetch_array($sem);
		
		return $a_sem['value'];
	}
	
	#TAHUN AJARAN
	function tahunAjaran()
	{
		$ta = mysql_query("select * from m_param where param='thnAjaran'");
		$a_ta = mysql_fetch_array($ta);
		
		return $a_ta['value'];
	}
	
	if($_SESSION['nip'] == "" or empty($_SESSION['nip']))
	{
		?>
			<script>
				alert("Anda harus login untuk melakukan proses di aplikasi guru...!");
				window.location = "../index.php";
			</script>
		<?
	}
	
	else
	{	
		if(isset($_GET['doraemon']))
		{
			#SET KKM NILAI PELAJARAN
			if($_GET['doraemon'] == "setKkm")
			{
				$kkm = $_POST['kkm'];
				$pelajaran = $_POST['pelajaran'];
				$kelas = $_POST['kelas'];
				$url = $_POST['url'];
				
				$insert= mysql_query("insert into m_kkm(pelajaran,kelas,kkm) values ('$pelajaran','$kelas','$kkm')");
				if($insert)
				{
					?>
						<script>
							alert("KKM berhasil di set");
							window.location = "<?echo $url?>";
						</script>
					<?
				}
				
				else
				{
					?>
						<script>
							alert("Gagal set KKM pelajaran");
							window.location = "<?echo $url?>";
						</script>
					<?
				}
			}
			
			#EDIT KKM NILAI PELAJARAN
			elseif($_GET['doraemon'] == "editKkm")
			{
				$kkm = $_POST['kkm'];
				$pelajaran = $_POST['pelajaran'];
				$kelas = $_POST['kelas'];
				$url = $_POST['url'];
				
				$update= mysql_query("update m_kkm set kkm='$kkm' where pelajaran='$pelajaran' and kelas='$kelas'");
				if($update)
				{
					?>
						<script>
							alert("KKM berhasil di rubah");
							window.location = "<?echo $url?>";
						</script>
					<?
				}
				
				else
				{
					?>
						<script>
							alert("Gagal merubah KKM pelajaran");
							window.location = "<?echo $url?>";
						</script>
					<?
				}
			}
			
			#SIMPAN NILAI SISWA
			elseif($_GET['doraemon'] == "simpanNilai")
			{
				$url = $_POST['url'];
				$jenisNilai = $_POST['jenisNilai'];
				$table = $_POST['table'];
				
				//MARKER
				if($jenisNilai == "T")
					$marker = 1;
				elseif($jenisNilai == "UH")
					$marker = 2;
				elseif($jenisNilai == "P")
					$marker = 3;
				elseif($jenisNilai == "UTS")
					$marker = 4;
				elseif($jenisNilai == "UAS")
					$marker = 5;
				else
					$marker = 0;
				
				//URUTAN PER TAG
				$maxTag = mysql_query("select max(urutan) as max from $table where tag='$jenisNilai'");
				$a_maxTag = mysql_fetch_array($maxTag);
				if(empty($a_maxTag['max']))
					$urutan = 1;
				else
					$urutan = $a_maxTag['max'] + 1;
				
				$cekSum = 0;
				$jumRow = count($_POST['noInduk']);
				for($a=0;$a<=($jumRow-1);$a++)
				{
					$noInduk = $_POST['noInduk'][$a];
					$nilai = $_POST['nilai'][$a];
					$namaSiswa = namaSiswa($noInduk);
					$semester = semester();
					$tahunAjaran = tahunAjaran();
					
					if($jenisNilai == "UTS")
						$insert = mysql_query("insert into $table(noInduk,semester,thnAjaran,nama,tag,urutan,nilai,marker) values ('$noInduk','$semester','$tahunAjaran','$namaSiswa','$jenisNilai','$urutan','$nilai','$marker')");
					else
						$insert = mysql_query("insert into $table(noInduk,semester,thnAjaran,nama,tag,urutan,nilai,marker) values ('$noInduk','$semester','$tahunAjaran','$namaSiswa','$jenisNilai','$urutan','$nilai','$marker')");
					
					if($insert)
						$cekSum = $cekSum + 1;
					else
						$cekSum = $cekSum;
				}
				
				if($cekSum == count($_POST['noInduk']))
				{
					?>
						<script>
							alert("Nilai berhasil disimpan...!");
							window.location = "<?echo $url?>";
						</script>
					<?
				}
				
				else
				{
					?>
						<script>
							alert("Ada nilai yang belum tersimpan...!");
							window.location = "<?echo $url?>";
						</script>
					<?
				}	
			}
			
			#SIMPAN EDIT NILAI PELAJARAN
			elseif($_GET['doraemon'] == "simpanEditNilai")
			{	
				$noInduk = $_POST['noInduk'];
				$tabel = $_POST['table'];
				$uri = $_POST['uri'];
				
				$panjangNilai = count($_POST['nilai']);
				$cekSum = 0;
				for($z=0;$z<=($panjangNilai-1);$z++)
				{
					$nilai = $_POST['nilai'][$z];
					$id = $_POST['id'][$z];
					$update = mysql_query("update $tabel set nilai='$nilai' where id='$id'");
					if($update)
						$cekSum = $cekSum + 1;
					else
						$cekSum = $cekSum;
				}
				
				if($cekSum == $panjangNilai)
				{
					?>
						<script>
							alert("Berhasil merubah data nilai siswa...!");
							window.location = "<?echo $uri?>";
						</script>
					<?
				}
				
				else
				{
					?>
						<script>
							alert("Ada data nilai yang belum tersimpan...!");
							window.location = "<?echo $uri?>";
						</script>
					<?
				}
			}
			
			#SIMPAN CATATAN GURU
			elseif($_GET['doraemon'] == "simpanCatatan")
			{	
				$catatan = $_POST['catatan'];
				$nip = $_POST['nip'];
				$update = mysql_query ("update m_guru set catatan='$catatan' where nip='$nip'");
				if($update)
				{
					?>
						<script>
							alert("Berhasil simpan catatan..!");
							window.location="<? echo $_POST['url'];?>";
						</script>
					<?
				}
				else
				{
					?>
						<script>
							alert("Gagal Simpan Catatan..!");
							window.location="<? echo $_POST['url'];?>";
						</script>
					<?
				}
			}
			
			else
			{
				?>
					<script>
						alert("Proses tidak diketahui...!");
						window.location = "index.php";
					</script>
				<?
			}
		}
		
		else
		{
			?>
				<script>
					alert("Proses tidak diketahui...!");
					window.location = "index.php";
				</script>
			<?
		}
	}
?>