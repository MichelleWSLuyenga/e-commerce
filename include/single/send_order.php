<?
include('../../connect.php');

$checkout_status_send = send;

for($i=0;$i<count($_POST["chkSend"]);$i++)
	{
		if($_POST["chkSend"][$i] != "")
		{
			$strSQL = " UPDATE customize_checkout SET checkout_status_send = '$checkout_status_send' ";
			$strSQL .=" WHERE id = '".$_POST["chkSend"][$i]."' ";
			$objQuery = mysql_query($strSQL);
		}
	}

	echo " <script language='javascript'> window.location='../../history/single/index.php'; </script> ";

mysql_close();
?>