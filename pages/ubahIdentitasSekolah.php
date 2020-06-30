<?
	include("kakashi.php");
	
	$a=$_POST['namaSekolah'];
	$b=$_POST['alamatSekolah'];
	$c=$_POST['noTlp'];
	$d=$_POST['web'];
	$e=$_POST['email'];
	$f=$_POST['kepsek'];
	$g=$_POST['nss'];
	
	$eunha=mysql_query("update m_param set value='$a' where id='7'");
	if($eunha)
	{
		$yerin=mysql_query("update m_param set value='$b' where id='8'");
		if($yerin)
		{
			$sinb=mysql_query("update m_param set value='$c' where id='9'");
			if($sinb)
			{
				$yuju=mysql_query("update m_param set value='$d' where id='10'");
				if($yuju)
				{
					$umji=mysql_query("update m_param set value='$e' where id='11'");
					if($umji)
					{
						$sowon=mysql_query("update m_param set value='$f' where id='12'");
						if($sowon)
						{
							$gfriend=mysql_query("update m_param set value='$g' where id='13'");
							if($gfriend)
							{
								?>
									<script>
										alert("Berhasil Ubah Identitas Sekolah");
										window.location="master_sistem.php";
									</script>
								<?
							}
							else
							{
								echo mysql_error();
							}
						}
						else
						{
							echo mysql_error();
						}
					}
					else
					{
						echo mysql_error();
					}
				}
				else
				{
					echo mysql_error();
				}
			}
			else
			{
				echo mysql_error();
			}
		}
		else
		{
			echo mysql_error();
		}
	}
	else
	{
		echo mysql_error();
	}
?>