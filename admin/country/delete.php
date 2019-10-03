<?
include('../../connect.php');

$country_status = F;

for($i=0;$i<count($_POST["checkme"]);$i++)
	{
		if($_POST["checkme"][$i] != "")
		{
			$strSQL = " UPDATE admin_country SET country_status = '$country_status' ";
			$strSQL .=" WHERE id = '".$_POST["checkme"][$i]."' ";
			$objQuery = mysql_query($strSQL);
		}
	}

	echo " <script language='javascript'> window.location='index.php'; </script> ";

mysql_close();
?>
