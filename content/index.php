<!DOCTYPE html>
<?php
	include("kakashi.php");
	session_start();
	if($_SESSION['nip']== "" or empty($_SESSION['nip']))
	{
		?>
			<script>
				alert("Anda harus Login dahulu!");
				window.location="login.php";
			</script>
		<?
	}
	else
	{
		$detailGuru = mysql_query("select * from m_guru where nip='$_SESSION[nip]'");
		$a_detailGuru = mysql_fetch_array($detailGuru);
		?>
			<html lang="en">
			<head>
				<meta charset="utf-8">
				<meta http-equiv="X-UA-Compatible" content="IE=edge">
				<meta name="viewport" content="width=device-width, initial-scale=1">
				<meta name="description" content="">
				<meta name="author" content="">

				<title>Sistem</title>

				<!-- Bootstrap Core CSS -->
				<link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

				<!-- MetisMenu CSS -->
				<link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

				<!-- Custom CSS -->
				<link href="../dist/css/sb-admin-2.css" rel="stylesheet">

				<!-- Morris Charts CSS -->
				<link href="../vendor/morrisjs/morris.css" rel="stylesheet">

				<!-- Custom Fonts -->
				<link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

				<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
				<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
				<!--[if lt IE 9]>
					<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
					<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
				<![endif]-->
				<script>
					function warning()
					{
						alert("Fitur ini bisa ditambahkan pada saat pengembangan sistem...!");
						return false;
					}
					
				</script>
				<?
					function kelas($idKelas)
					{
						$sel = mysql_query("select * from m_kelas where id='$idKelas'");
						$a_sel = mysql_fetch_array($sel);
						
						return $a_sel['kelasRuang'];
					}
				?>
			</head>

			<body>
				<div id="wrapper">
					<!-- Navigation -->
					<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
						<div class="navbar-header" style="margin:10px 0 0 0px;">
							<a style="font-size:22px;margin:0 0 0 20px;color:red;font-variant:small-caps;"><strong>Dashboard Guru</strong></a>
						</div>
						<div style="float:right;margin:10px 10px 0 0;">
							<a style="font-size:16px;color:black;"><?echo $a_detailGuru['nama'];?> |</a>
							<a href="logout.php" onclick="javascript:var t = confirm ('yakin ingin keluar?'); if(t==true)return true; else return false" style="font-size:16px;color:red;margin:0 30px 0 0px;">
								Logout
							</a>
						</div>
						<div class="navbar-default sidebar">
							<?
								include('menu.php');
							?>
						</div>
						<!-- /.navbar-static-side -->
					</nav>

					<div id="page-wrapper">
						<?
							if(isset($_GET['menu']))
							{
								if($_GET['menu']== "dataSiswa")
									include("dataSiswa.php");
								elseif($_GET['menu'] == "absen")
									include("absen.php");
								elseif($_GET['menu'] == "akhlak")
									include("dashboard.php");
								elseif($_GET['menu'] == "nilaiPelajaran")
									include("ruwet.php");
								elseif($_GET['menu'] == "ekstra")
									include("ekstra.php");
								elseif($_GET['menu'] == "cetakRaport")
									include("cetakRaport.php");
								else
									include("home.php");
							}
							
							else
							{
								include('home.php');
							}
						?>
						<div class="row">
							<div class="col-lg-12">
								<div class="footer" style="margin:-20px 0 0 0px;background:c0c0c0;">
									<table>
										
									</table>
								</div>
							</div>
						</div>
					</div>
					<!-- /#page-wrapper -->

				</div>
				<!-- /#wrapper -->

				<!-- jQuery -->
				<script src="../vendor/jquery/jquery.min.js"></script>

				<!-- Bootstrap Core JavaScript -->
				<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

				<!-- Metis Menu Plugin JavaScript -->
				<script src="../vendor/metisMenu/metisMenu.min.js"></script>

				<!-- Morris Charts JavaScript -->
				<script src="../vendor/raphael/raphael.min.js"></script>
				<script src="../vendor/morrisjs/morris.min.js"></script>
				<script src="../data/morris-data.js"></script>

				<!-- Custom Theme JavaScript -->
				<script src="../dist/js/sb-admin-2.js"></script>

			</body>

			</html>
		<?
	}
?>