<?
include('../../connect.php');

$forget_username = $_POST["forget_username"];
$forget_password = $_POST["forget_password"];

$sql = " UPDATE admin_reseller SET reseller_password = '".$forget_password."' WHERE reseller_username = '".$forget_username."' ";
$query = mysql_query($sql) or die("Can't Query");

if($query) {
	
	echo " <script language='javascript'> window.location='../'; </script> ";
	
}

mysql_close();
?>