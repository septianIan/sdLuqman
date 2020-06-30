<?
	session_start();
	ob_start();
	
	include("../kakashi.php");
	
	if(empty($_SESSION['nip']) or $_SESSION['nip'] == "")
	{
		?>
			<script type="text/javascript">
				alert("Anda harus login dengan akun anda.");
				window.location = "../../index.php";
			</script>
		<?
	}
	else
	{
		function param($parameter)
		{
			$value = mysql_query("select * from m_param where param='$parameter'");
			$a_value = mysql_fetch_array($value);
			
			return $a_value['value'];
		}
		
		function ambilKkm($pelajaran,$kelas)
		{
			$konPelajaran = str_replace(" ","_",mysql_real_escape_string($pelajaran));
			
			$kkm = mysql_query("select * from m_kkm where pelajaran='$konPelajaran' and kelas='$kelas'");
			$r_kkm = mysql_num_rows($kkm);
			$a_kkm = mysql_fetch_array($kkm);
			
			if($r_kkm != 0)
				$out = $a_kkm['kkm'];
			else
				$out = "-";
			
			return $out;
		}
		
		function bulan($z)
		{
			if($z == "01")
				$bulan = "Januari";
			elseif($z == "02")
				$bulan = "Februari";
			elseif($z == "03")
				$bulan = "Maret";
			elseif($z == "04")
				$bulan = "April";
			elseif($z == "05")
				$bulan = "Mei";
			elseif($z == "06")
				$bulan = "Juni";
			elseif($z == "07")
				$bulan = "Juli";
			elseif($z == "08")
				$bulan = "Agustus";
			elseif($z == "09")
				$bulan = "September";
			elseif($z == "10")
				$bulan = "Oktober";
			elseif($z == "11")
				$bulan = "November";
			elseif($z == "12")
				$bulan = "Desember";
			else
				$bulan = "Tidak diketahui";

			return $bulan;
		}
		
		function terbilang($x)
		{
			$abil = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");
			if ($x < 12)
				return " " . $abil[$x];
			elseif ($x < 20)
				return Terbilang($x - 10) . " Belas";
			elseif ($x < 100)
				return Terbilang($x / 10) . " Puluh" . Terbilang($x % 10);
			elseif ($x < 200)
				return " Seratus" . Terbilang($x - 100);
			elseif ($x < 1000)
				return Terbilang($x / 100) . " Ratus" . Terbilang($x % 100);
			elseif ($x < 2000)
				return " Seribu" . Terbilang($x - 1000);
			elseif ($x < 1000000)
				return Terbilang($x / 1000) . " Ribu" . Terbilang($x % 1000);
			elseif ($x < 1000000000)
				return Terbilang($x / 1000000) . " Juta" . Terbilang($x % 1000000);
		}
		
		$guru = mysql_query("select * from m_guru where nip='$_SESSION[nip]'");
		$a_guru = mysql_fetch_array($guru);
		
		$siswa = mysql_query("select * from m_siswa where no_induk='$_GET[noInduk]'");
		$a_siswa = mysql_fetch_array($siswa);
		
		$kelas = mysql_query("select * from m_kelas where id='$a_siswa[kelas]'");
		$a_kelas = mysql_fetch_array($kelas);
		
		$namaSekolah = param('namaSekolah');
		$alamat = param('alamatSekolah');
		$semester = param('semester');
		$ta = param('thnAjaran');
		$kepSek = param('kepalaSekolah');
		
		$pelajaran = $_GET['pelajaran'];
		$kelas = str_replace("-","",$_GET['kelas']);
		$table = strtolower($pelajaran.$kelas);
	?>
		<html>
			<head>
				<title>CETAK IDENTITAS PESERTA DIDIK</title>
			</head>
			<body style="font-famiy:'Tahoma';font-size:15px;">
				<div style="width:100%;height:5%;font-size:18px;margin:10 0 0 0;">
						IDENTITAS PESERTA DIDIK
				</div>
				<div style="width:100%;height:92%;font-size:14px;">
					<table style="margin:10 10 10 10;font-size:14px;">
						<tr>
							<td style="width:50px;text-align:Center;height:20px;">1.</td>
							<td style="width:150px;height:20px;">Nama Peserta Didik</td>
							<td style="width:50px;text-align:Center;height:20px;">:</td>
							<td style="width:450px;height:20px;"><?echo $a_siswa['nama_siswa'];?></td>
						</tr>
						<tr>
							<td style="width:50px;text-align:Center;height:20px;">2.</td>
							<td style="width:150px;height:20px;">Nomor Induk</td>
							<td style="width:50px;text-align:Center;height:20px;">:</td>
							<td style="width:450px;height:20px;"><?echo $a_siswa['no_induk'];?></td>
						</tr>
						<tr>
							<td style="width:50px;text-align:Center;height:20px;">3.</td>
							<td style="width:150px;height:20px;">Tempat Tanggal Lahir</td>
							<td style="width:50px;text-align:Center;height:20px;">:</td>
							<td style="width:450px;height:20px;"><?echo $a_siswa['ttl'];?></td>
						</tr>
						<tr>
							<td style="width:50px;text-align:Center;height:20px;">4.</td>
							<td style="width:150px;height:20px;">Jenis Kelamin</td>
							<td style="width:50px;text-align:Center;height:20px;">:</td>
							<td style="width:450px;height:20px;"><?echo strtoupper($a_siswa['jk'])?></td>
						</tr>
						<tr>
							<td style="width:50px;text-align:Center;height:20px;">5.</td>
							<td style="width:150px;height:20px;">Agama</td>
							<td style="width:50px;text-align:Center;height:20px;">:</td>
							<td style="width:450px;height:20px;"><?echo $a_siswa['agama']?></td>
						</tr>
						<tr>
							<td style="width:50px;text-align:Center;height:20px;">6.</td>
							<td style="width:150px;height:20px;">Pendidikan</td>
							<td style="width:50px;text-align:Center;height:20px;">:</td>
							<td style="width:450px;height:20px;">-</td>
						</tr>
						<tr>
							<td style="width:50px;text-align:Center;height:20px;">7.</td>
							<td style="width:150px;height:20px;">Alamat Peserta Didik</td>
							<td style="width:50px;text-align:Center;height:20px;">:</td>
							<td style="width:450px;height:20px;"><?echo $a_siswa['alamat_siswa']?></td>
						</tr>
						<tr>
							<td style="width:50px;text-align:Center;height:20px;">8.</td>
							<td style="width:150px;height:20px;">Nama Orang Tua</td>
							<td style="width:50px;text-align:Center;height:20px;">:</td>
							<td style="width:450px;height:20px;"></td>
						</tr>
						<tr>
							<td style="width:50px;text-align:Center;height:20px;"></td>
							<td style="width:150px;height:20px;">a. Ayah</td>
							<td style="width:50px;text-align:Center;height:20px;">:</td>
							<td style="width:450px;height:20px;"><?echo $a_siswa['ayah']?></td>
						</tr>
						<tr>
							<td style="width:50px;text-align:Center;height:20px;"></td>
							<td style="width:150px;height:20px;">b. Ibu</td>
							<td style="width:50px;text-align:Center;height:20px;">:</td>
							<td style="width:450px;height:20px;"><?echo $a_siswa['ibu']?></td>
						</tr>
						<tr>
							<td style="width:50px;text-align:Center;height:20px;">9.</td>
							<td style="width:150px;height:20px;">Pekerjaan Orang Tua</td>
							<td style="width:50px;text-align:Center;height:20px;">:</td>
							<td style="width:450px;height:20px;"></td>
						</tr>
						<tr>
							<td style="width:50px;text-align:Center;height:20px;"></td>
							<td style="width:150px;height:20px;">a. Ayah</td>
							<td style="width:50px;text-align:Center;height:20px;">:</td>
							<td style="width:450px;height:20px;"><?echo $a_siswa['pekerjaan']?></td>
						</tr>
						<tr>
							<td style="width:50px;text-align:Center;height:20px;"></td>
							<td style="width:150px;height:20px;">b. Ibu</td>
							<td style="width:50px;text-align:Center;height:20px;">:</td>
							<td style="width:450px;height:20px;">-</td>
						</tr>
						<tr>
							<td style="width:50px;text-align:Center;height:20px;">10.</td>
							<td style="width:150px;height:20px;">Alamat Orang Tua</td>
							<td style="width:50px;text-align:Center;height:20px;">:</td>
							<td style="width:450px;height:20px;"><?echo $a_siswa['alamat_ortu']?></td>
						</tr>
						<tr>
							<td style="width:50px;text-align:Center;height:20px;">11.</td>
							<td style="width:150px;height:20px;">Wali Peserta Didik</td>
							<td style="width:50px;text-align:Center;height:20px;">:</td>
							<td style="width:450px;height:20px;"></td>
						</tr>
						<tr>
							<td style="width:50px;text-align:Center;height:20px;"></td>
							<td style="width:150px;height:20px;">a. Nama</td>
							<td style="width:50px;text-align:Center;height:20px;">:</td>
							<td style="width:450px;height:20px;">-</td>
						</tr>
						<tr>
							<td style="width:50px;text-align:Center;height:20px;"></td>
							<td style="width:150px;height:20px;">b. Pekerjaan</td>
							<td style="width:50px;text-align:Center;height:20px;">:</td>
							<td style="width:450px;height:20px;">-</td>
						</tr>
						<tr>
							<td style="width:50px;text-align:Center;height:20px;"></td>
							<td style="width:150px;height:20px;">b. Alamat</td>
							<td style="width:50px;text-align:Center;height:20px;">:</td>
							<td style="width:450px;height:20px;">-</td>
						</tr>
					</table>
					<table style="margin:100px 10px 10px 10px;font-size:14px;">
						<tr>
							<td style="width:100px;text-align:Center;height:20px;"></td>
							<td style="border:solid 1px black;width:90px;height:120px;text-align:center"><br><br><br>Pas Foto<br>Ukuran<br>3X4<br></td>
							<td style="width:50px;text-align:Center;height:20px;"></td>
							<td style="width:500px;text-align:left">
								Bojonegoro,<?echo date("d")." ".bulan(date("m"))." ".date("Y")."<br>"?>Kepala Sekolah,<br><br><br><br><br><br><br>
								<?
									echo "( ".$kepSek." )";
								?>
							</td>
						</tr>
					</table>
				</div>
			</body>
		</html>
		<?
		
		$filename="Data Siswa_".$a_siswa['nama_siswa']."_".$a_kelas['kelasRuang'].".pdf";
		$content = ob_get_clean();
		require_once('../html2pdf/html2pdf.class.php');
		try
		{
			$html2pdf = new HTML2PDF('P','Legal','en', false, 'UTF-8',array(5, 5, 5, 5));
			$html2pdf->setDefaultFont('Arial');
			$html2pdf->writeHTML($content);
			$html2pdf->Output($filename);
		}
		catch(HTML2PDF_exception $e) { echo $e; }
	}
?>