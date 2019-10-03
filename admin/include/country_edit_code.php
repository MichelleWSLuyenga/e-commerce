<?
if(empty($_POST['ip'])){
	$_POST['ip'] = $_SERVER['REMOTE_ADDR'];
}
require('./phpip2country.class.php');

include('../../connect.php');

$id = $_POST["id"];
$country_name = $_POST["country_name"];
$country_admin = $_POST["country_admin"];
$country_date = date("m/d/Y");
$country_time = date("H:i:s");
$country_ip = $_POST['ip'];
$country_status = T;

$sql1 = " UPDATE admin_country SET country_name = '".$country_name."', country_admin = '".$country_admin."', country_date = '".$country_date."', country_time = '".$country_time."', country_ip = '".$country_ip."', country_status = '".$country_status."' WHERE id = '$id' ";
$query1 = mysql_query($sql1) or die("Can't Query1");

if($query1) {
	
	echo " <script language='javascript'> window.location='../country/'; </script> ";
	
}

mysql_close();
?>