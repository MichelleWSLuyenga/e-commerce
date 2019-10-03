<?
include('../../connect.php');
echo '<pre>';
//print_r($_POST["chkDel"]); 
print_r($_POST); 
echo '</pre>';
die;
$fabrics_status = F;

for($i=0;$i<count($_POST["chkDel"]);$i++)
	{
		if($_POST["chkDel"][$i] != "")
		{
			$strSQL = " UPDATE admin_fabrics_vest SET fabrics_status = '$fabrics_status' ";
			$strSQL .=" WHERE id = '".$_POST["chkDel"][$i]."' ";
			echo $strSQL; die;
			$objQuery = mysql_query($strSQL);
		}
	}

		echo " <script language='javascript'> alert('Record delete successfully'); window.location='index.php'; </script> ";

mysql_close();
?>
