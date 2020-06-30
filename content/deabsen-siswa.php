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
		$selUser = mysql_query("select * from m_guru where nip='$_SESSION[nip]'");
		$a_selUser = mysql_fetch_array($selUser);
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
			</head>

			<body>
				<div id="wrapper">
					<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
						<div class="navbar-header" style="margin:10px 0 0 0px;">
							<a style="font-size:16px;margin:0 0 0 20px;color:black;">Dashboard Guru</a>
						</div>
						<div style="float:right;margin:10px 10px 0 0;">
							<a style="font-size:16px;color:black;"><?echo $a_selUser['nama'];?>  - </a>
							<a href="logout.php" onclick="javascript:var t = confirm ('yakin ingin keluar?'); if(t==true)return true; else return false" style="font-size:16px;color:red;margin:0 30px 0 0px;">
								logout
							</a>
						</div>
						<div class="navbar-default sidebar">
							<div class="sidebar-nav navbar-collapse">
								<ul class="nav" id="side-menu">
									<li>
										<a href="index.php" style="font-size:12px;color:black;"><img src="../icon/sistem.png" style="height:30px;"> Dashboard user</a></img>
									</li>
									<li>
										<a style="background:lightblue;"><b style="margin:0 0 0 55px;">DATA SISWA</b></a>
									</li>
									<li>
										<a href="datasiswa.php" style="font-size:12px;color:black;"><img src="../icon/data.jpg" style="height:30px"> Data siswa</a></img>
									</li>
									<li>
										<a href="re-absensiswa.php" style="font-size:12px;color:black;"><img src="../icon/absen.png" style="height:30px"> Rekap Absen Siswa</a></img>
									</li>
									<li>
										<a href="deabsen-siswa.php" style="font-size:12px;color:black;"><img src="../icon/note.png" style="height:30px"> Detail absen siswa </a></img>
									</li>
									<li>
										<a style="background:lightblue;"><b style="margin:0 0 0 50px;">MATA PELAJARAN</b></a>
									</li>
									<li>
										<a href="ruwet.php"> ijek kosong </a>
									</li>
									<li>
										<a style="background:lightblue;"><b style="margin:0 0 0 50px;">MATA PELAJARAN</b></a>
									</li>
									<li>
										<a> ijek kosong </a>
									</li>
									<li>
										<a style="background:lightblue;"><b style="margin:0 0 0 50px;">CETAK RAPORT</b></a>
									</li>
									<li>
										<a href="" style="font-size:12px;color:black;"><img src="../icon/print.png" style="height:30px"> Cetak ID Sekolah </a></img>
									</li>
									<li>
										<a href="" style="font-size:12px;color:black;"><img src="../icon/print.png" style="height:30px"> Cetak Raport </a></img>
									</li>
								</ul>
							</div>
							<!-- /.sidebar-collapse -->
						</div>
						<!-- /.navbar-static-side -->
					</nav>

					<div id="page-wrapper">
						<div class="row">
							  <div class="row">
							<div class="col-lg-12">
								<div class="panel panel-info" style="margin:10px 0 0 0px">
									<div class="panel-heading">
										<font style="font-size:12px;font-weight:bold;">DETAIL ABSEN SISWA</font>
									</div>
									<div class="panel-body">
										<table class="table table-bordered table-stripped">
											<table class="table table-bordered table-stripped">
											<h1 align="center">UNTUK FITUR INI BISA DI KEMBANGKAN LEBIH LANJUT</h1>
										</table>
										</table>
									</div>
								</div>
							</div>
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
