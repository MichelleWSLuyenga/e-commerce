<?
if(empty($_POST['ip'])){
	$_POST['ip'] = $_SERVER['REMOTE_ADDR'];
}
require('./phpip2country.class.php');

include('../../connect.php');

$id = $_GET["id"];
$process = $_GET["process"];

$sql1 = " UPDATE customize_checkout SET checkout_status_process = '".$process."' WHERE id = '$id' ";
$query1 = mysql_query($sql1) or die("Can't Query1");

if($query1) {
	
	echo " <script language='javascript'> window.location='../inprocessorders/'; </script> ";
	
}

mysql_close();
?>