<?
include('../../connect.php');

$checkout_status_send = send;
$checkout_status_send_date = date("m/d/Y");
$checkout_status_send_time = date("H:i:s");

for($i=0;$i<count($_POST["chkSend"]);$i++)
	{
		if($_POST["chkSend"][$i] != "")
		{
			$strSQL = " UPDATE customize_checkout SET checkout_status_send = '$checkout_status_send', checkout_status_send_date = '$checkout_status_send_date', checkout_status_send_time = '$checkout_status_send_time' ";
			$strSQL .=" WHERE id = '".$_POST["chkSend"][$i]."' ";
			$objQuery = mysql_query($strSQL);
		}
	}

	echo " <script language='javascript'> window.location='../../history/multiple/index.php'; </script> ";

mysql_close();
?>