<?
	include("kakashi.php");
	$username = mysql_real_escape_string($_POST['username']);
	$password = mysql_real_escape_string($_POST['passcode']);
	$passEnkrip = md5($password);
	
	$selUser = mysql_query("SELECT * FROM m_guru WHERE username='$username' AND pasword='$passEnkrip'");
	$a_selUser = mysql_fetch_array($selUser);
	$r_selUser = mysql_num_rows($selUser);
	
	//JIKA TIDAK DITEMUKAN USER DENGAN USERNAME TERSEBUT
	if($r_selUser == 0)
	{
		?>
			<script type="text/javascript">
				alert("Tidak ditemukan user dengan akun tersebut...!\nSilahkan login kembali dengan username dan password yang benar.");
				window.location = "login.php";
			</script>
		<?
	}
	
	//JIKA DITEMUKAN USERNAME DENGAN USERNAME TERSEBUT
	else
	{
		$aktif = $a_selUser['aktif'];
		if ($aktif == "1")
		{
			session_start();
			$_SESSION['nip']= $a_selUser['nip'];
			?>
				<script>
					alert("Selamat Datang <? echo $a_selUser['nama'];?>");
					window.location="index.php"
				</script>
			<?
		}
		
		else
		{
			?>
				<script>
					alert("User status tidak aktif...!");
					window.location="login.php";
				</script>
			<?
		}
	}
	
	//echo $username." ".$password." ".$passEnkrip;
?>