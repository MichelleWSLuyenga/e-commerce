<?
if(empty($_POST['ip'])){
	$_POST['ip'] = $_SERVER['REMOTE_ADDR'];
}
require('./phpip2country.class.php');

include('../../connect.php');

$reseller_id = $_POST["reseller_id"];
$reseller_company = $_POST["reseller_company"];

$sql1 =	" SELECT * FROM admin_reseller WHERE reseller_company = '$reseller_company' ";
$query1 = mysql_db_query($dbname, $sql1) or die("Can't Query1");
$row1 = mysql_fetch_array($query1);
$id = $row1['id'];

$sql2 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = `fabricbrand_".$id."` ";
$query2 = mysql_query($sql2) or die("Can't Query2");

if($query2) {
	
	echo " <script language='javascript'> window.location='../reseller/fabricbrand_price.php?id=".$reseller_id."'; </script> ";
	
}

mysql_close();
?>