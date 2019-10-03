<?
include('../connect.php');
session_start();
$reseller_username = $_POST["reseller_username"];
$reseller_password = $_POST["reseller_password"];
setcookie('user',$reseller_username,time()+960000);

$sql =	"SELECT reseller_username, reseller_password FROM admin_reseller WHERE reseller_username='$reseller_username' AND reseller_password = '$reseller_password' AND reseller_status = 'T'"; 
$query = mysql_query($sql) or die("Can't Query");
$row = mysql_num_rows($query);

if($row != 0)
{
	$result = mysql_fetch_array($query);
	
	$cookie_value_username = $result[1];
	setcookie("reseller_username", $cookie_value_username);
	
	$cookie_value_password = $result[2];
	setcookie("reseller_password", $cookie_value_password);
	
	echo "	<script language='javascript'>
			window.location='home.php';
			</script>";
}
else
{
	echo "	<script language='javascript'>
			window.location='index.php?error=error';
			</script>";
}
mysql_close();
?>