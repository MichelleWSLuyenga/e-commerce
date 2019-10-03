<?
if(empty($_POST['ip'])){
	$_POST['ip'] = $_SERVER['REMOTE_ADDR'];
}
require('./phpip2country.class.php');

include('../../connect.php');

$reseller_id = $_POST["reseller_id"];
$id = $_POST["id"];
$price = $_POST["price"];

$sql1 = " UPDATE admin_parameter SET `parameter_".$reseller_id."` = '".$price."' WHERE id = '$id' ";
$query1 = mysql_query($sql1) or die("Can't Query1");

if($query1) {
	
	echo " <script language='javascript'> window.location='../reseller/parameter_price.php?id=".$reseller_id."'; </script> ";
	
}

mysql_close();
?>