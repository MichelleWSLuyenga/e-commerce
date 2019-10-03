<?
if(empty($_POST['ip'])){
	$_POST['ip'] = $_SERVER['REMOTE_ADDR'];
}
require('./phpip2country.class.php');

include('../../connect.php');

$fabricbrand_id = $_POST["fabricbrand_id"];
$fabricbrand_product_1 = Jacket;
$fabricbrand_product_2 = Jeans;
$fabricbrand_product_3 = Overcoat;
$fabricbrand_product_4 = Pants;
$fabricbrand_product_5 = Shirt;
$fabricbrand_product_6 = Suits;
$fabricbrand_product_7 = Ties;
$fabricbrand_product_8 = Vest;
$fabricbrand_product_9 = Lining;
$fabricbrand_name = $_POST["fabricbrand_name"];
$fabricbrand_admin = $_POST["fabricbrand_admin"];
$fabricbrand_date = date("m/d/Y");
$fabricbrand_time = date("H:i:s");
$fabricbrand_ip = $_POST['ip'];
$fabricbrand_status = T;

$sql1 = " UPDATE admin_fabricbrand SET fabricbrand_name = '".$fabricbrand_name."', fabricbrand_admin = '".$fabricbrand_admin."', fabricbrand_date = '".$fabricbrand_date."', fabricbrand_time = '".$fabricbrand_time."', fabricbrand_ip = '".$fabricbrand_ip."', fabricbrand_status = '".$fabricbrand_status."' WHERE fabricbrand_id = '$fabricbrand_id' ";
$query1 = mysql_query($sql1) or die("Can't Query1");

if($query1) {
	
	echo " <script language='javascript'> window.location='../fabricbrand/'; </script> ";
	
}

mysql_close();
?>