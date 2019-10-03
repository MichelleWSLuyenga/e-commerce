<?
if(empty($_POST['ip'])){
	$_POST['ip'] = $_SERVER['REMOTE_ADDR'];
}
require('./phpip2country.class.php');

include('../../connect.php');

$id = $_GET["id"];
$payment = $_GET["payment"];

$sql1 = " UPDATE customize_checkout SET checkout_status_payment = '".$payment."' WHERE id = '$id' ";
$query1 = mysql_query($sql1) or die("Can't Query1");

if($query1) {
	
	echo " <script language='javascript'> window.location='../orders/'; </script> ";
	
}

mysql_close();
?>