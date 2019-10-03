<?
include('../../connect.php');

$design_status = F;
$design = $_POST["design"];
$id_design = $_POST["id_design"];

for($i=0;$i<count($_POST["chkDel"]);$i++)
	{
		if($_POST["chkDel"][$i] != "")
		{
			$strSQL = " UPDATE admin_design SET design_status = '$design_status' ";
			$strSQL .=" WHERE id = '".$_POST["chkDel"][$i]."' ";
			$objQuery = mysql_query($strSQL);
		}
	}

	echo " <script language='javascript'> alert('Record delete successfully'); window.location='view_design.php?id=".$id_design."'; </script> ";
	
mysql_close();
?>