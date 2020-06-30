	<?
		include("kakashi.php");
		
		$username = $_POST['username'];
		$password = $_POST['passcode'];

		$cekUser = mysql_query("select * from m_param where id='3'");
		$a_cekUser = mysql_fetch_array($cekUser);
		if($a_cekUser['value'] == $username)
		{
			$cekPass = mysql_query("select * from m_param where id='4'");
			$a_cekPass = mysql_fetch_array($cekPass);
			if($a_cekPass['value'] == $password)
			{
				$cekNama = mysql_query("select * from m_param where id='2'");
				$a_cekNama = mysql_fetch_array($cekNama);

				session_start();
				$_SESSION['username'] = $a_cekUser['value'];
				$_SESSION['nama'] = $a_cekNama['value'];

				?>
					<script type="text/javascript">
						alert("Welcome, <?echo $a_cekNama['value']?>");
						window.location = "master_sistem.php";
					</script>
				<?
			}

			else
			{
				?>
					<script type="text/javascript">
						alert("Password yang anda masukkan tidak cocok.");
						window.location = "login.php";
					</script>
				<?
			}
		}

		else
		{
			?>
				<script type="text/javascript">
					alert("Username yang anda masukkan salah.");
					window.location = "login.php";
				</script>
			<?
		}	
	?>