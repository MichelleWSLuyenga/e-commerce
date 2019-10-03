<?
include('../connect.php');
session_start();
$admin_username = $_POST["admin_username"];
$admin_password = $_POST["admin_password"];
setcookie('user',$admin_username,time()+960000);

$sql =	"SELECT admin_username, admin_password FROM admin WHERE admin_username='$admin_username' AND admin_password = '$admin_password' AND admin_status = 'T'"; 
$query = mysql_query($sql) or die("Can't Query");
$row = mysql_num_rows($query);

if($row != 0)
{
	$result = mysql_fetch_array($query);
	
	$cookie_value_username = $result[1];
	setcookie("admin_username", $cookie_value_username);
	
	$cookie_value_password = $result[2];
	setcookie("admin_password", $cookie_value_password);
	
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