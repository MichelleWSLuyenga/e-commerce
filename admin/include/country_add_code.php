<?
if(empty($_POST['ip'])){
	$_POST['ip'] = $_SERVER['REMOTE_ADDR'];
}
require('./phpip2country.class.php');

include('../../connect.php');

$country_name = $_POST["country_name"];
$country_admin = $_POST["country_admin"];
$country_currency = $_POST["country_currency"];
$country_date = date("m/d/Y");
$country_time = date("H:i:s");
$country_ip = $_POST['ip'];
$country_status = T;

$sql1 =	" SELECT MAX(id) FROM admin_country";
$query1 = mysql_db_query($dbname, $sql1) or die("Can't Query1");
$row1 = mysql_fetch_array($query1);
$id = $row1[0] + 1 ;

$sql2 = " INSERT INTO admin_country (id, country_name, country_admin, country_currency, country_date, country_time, country_ip, country_status) VALUES ('".$id."', '".$country_name."', '".$country_admin."', '".$country_currency."', '".$country_date."', '".$country_time."', '".$country_ip."', '".$country_status."') ";
$query2 = mysql_query($sql2) or die("Can't Query2");

if($query2) {

	echo " <script language='javascript'> window.location='../country/'; </script> ";

}

mysql_close();
?>
