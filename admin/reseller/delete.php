<?
include('../../connect.php');

$id = $_GET["id"];
$reseller_status = F;

$sql1 = " UPDATE admin_reseller SET reseller_status = '$reseller_status' WHERE id = '$id' ";
$query1 = mysql_query($sql1) or die("Can't Query1");

if($query1) {
	
	echo " <script language='javascript'> window.location='index.php'; </script> ";
	
}

mysql_close();
?>