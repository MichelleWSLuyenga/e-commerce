<?
include('../../connect.php');

$design_status = F;

for($i=0;$i<count($_POST["chkDel"]);$i++)
	{
		if($_POST["chkDel"][$i] != "")
		{
			$strSQL = " UPDATE admin_design SET design_status = '$design_status' AND design_status = '$design_status' ";
			$strSQL .=" WHERE id = '".$_POST["chkDel"][$i]."' ";
			$objQuery = mysql_query($strSQL);
		}
	}

	echo " <script language='javascript'> window.location='view_option_jacket.php'; </script> ";

mysql_close();
?>
