<?
include('../../connect.php');

$design_status = F;
$design_option_sql = $_POST["design_option_sql"];

for($i=0;$i<count($_POST["chkDel"]);$i++)
	{
		if($_POST["chkDel"][$i] != "")
		{
			$strSQL = " UPDATE admin_design_option SET design_status = '$design_status' ";
			$strSQL .=" WHERE id = '".$_POST["chkDel"][$i]."' ";
			$objQuery = mysql_query($strSQL);
		}
	}

	echo " <script language='javascript'> window.location='view_option_vest.php?design_option_sql=".$design_option_sql."'; </script> ";

mysql_close();
?>
