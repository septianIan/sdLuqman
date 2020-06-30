<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>sistem</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
	<?
		include("kakashi.php");
	?>

    <div class="container">
        <div class="row">
            <div class="col-lg-5"style="margin:0 0 0 350px;">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading" style="line-height:150%;">
						<div style="float:left;margin:10 0 0 0;">
							<font style="font-size:30px;font-weight:bold;">Aktifasi Akun</font><br>
							<p style="font-size:12px:font-weight:bold;">SD INTEGRAL LUQMAN AL-HAKIM</p>
						</div>
						<img src="../images/logo.png" width="50" height="50" style="float:right;">
						<div style="clear:both"></div>
					</div>
                    <div class="panel-body">
						<form name="aktivasi" method="POST" action="<? echo $_SERVER['PHP_SELF']?>">
							<table>
								<tr style="border:none">
									<td style="padding-bottom:7px;width:500px">
										<select name="nip" class="form-control" autofocus>
											<option value=""> Nama</option>
												<?
													$sapi = mysql_query("select * from m_guru where aktifasi='0'");
													while($a_sapi= mysql_fetch_array($sapi))
													{
														?>
															<option value="<?echo $a_sapi['nip']?>"> (<?echo $a_sapi ['nip']?>)-<?echo $a_sapi['nama']?></option>
														<?
													}
												?>
										</select>
									</td>
								</tr>
								<tr style="border:none">
									<td style="padding-bottom:7px">
										<input type="text" name="username" autocomplete="off" placeholder="Username" class="form-control" autocomplete="off">
									</td>
								</tr>
								<tr style="border:none">
									<td style="padding-bottom:7px">
										<input type="password" name="password" autocomplete="off" placeholder="Password" class="form-control" autocomplete="off">
									</td>
								</tr>
								<tr style="border:none">
									<td style="padding-bottom:7px">
										<input type="password" name="repassword" autocomplete="off" placeholder="Confirm Password" class="form-control" autocomplete="off">
									</td>
								</tr>
								<tr style="border:none">
									<td rowspan="2" style="padding-bottom:7px;">
										<a href="../pages/control.php">Kembali Ke menu kontrol</a>
										<input type="submit" class="btn btn-success" name="install" value="Aktivasi Akun" onclick="retrun validateaktifasi();" style="float:right;;">
										<a href="login.php" class="btn btn-primary" style="float:right;margin:0 5px 0 0px">Menu Login</a>
									</td>
								</tr>
							</table>
						</form>
                    </div>
					<div class="panel-footer" style="text-align:center;font-size:10px;line-height:100%;">
						All Right Reserved<br>
						EIT team &copy; 2017
					</div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
<?
if(isset($_POST['install']))
	{
		$nip =mysql_real_escape_string($_POST['nip']);
		$username =mysql_real_escape_string($_POST['username']);
		$password =mysql_real_escape_string($_POST['password']);
		$repassword =mysql_real_escape_string($_POST['repassword']);
		$passEnkript = md5($password);
		
		//JIKA PASWORD DAN KONFIRMASI TIDAK SAMA
		if($repassword != $password)
		{
			?>
				<script>
					alert("Password dan konfirmasi password tidak sama...!");
					window.location = "aktivasi.php";
				</script>
			<?
		}
		
		//JIKA PASSWORD DAN KONFIRMASI SAMA
		else
		{
			$update = mysql_query("update m_guru set username='$username',pasword='$passEnkript',aktifasi='1' where nip='$nip';");
			if($update)
			{
				?>
					<script type="text/javascript">
						alert("Berhasil aktifasi user");
						window.location = "aktivasi.php";
					</script>
				<?
			}
			
			else
			{
				?>
					<script type="text/javascript">
						alert("Gagal aktifasi user");
						window.location = "aktivasi.php";
					</script>
				<?
			}
		}
	}
?>
