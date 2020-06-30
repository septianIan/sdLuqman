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
            <div class="col-lg-5"style="margin:50px 0 0 350px;">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading" style="line-height:120%;background:c0c0c0;">
						<div style="float:left;margin:5 0 0 0;">
							<font style="font-size:20px;font-weight:bold;">ADMINISTRATOR</font><br>
							<font style="font-size:12px;">SD INTEGRAL LUQMAN AL-HAKIM
						</div>
						<img src="../images/logo.png" width="50" height="50" style="float:Right;">
						<div style="clear:both"></div>
					</div>
                    <div class="panel-body">
						<form method="POST" action="masuk.php" name="login">
                            <table>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Username" name="username" type="text" autocomplete=off>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Passcode" name="passcode" type="password" value="">
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <div><input type="submit" name="login" value="LOGIN" style="float:right;margin:10px 0 0 0;" class="btn btn-success">
								</div>
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