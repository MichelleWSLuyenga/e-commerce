<?
if(empty($_POST['ip'])){
	$_POST['ip'] = $_SERVER['REMOTE_ADDR'];
}
require('./phpip2country.class.php');

include('../../connect.php');

$fabrictype_id = $_POST["fabrictype_id"];
$fabrictype_product_1 = Jacket;
$fabrictype_product_2 = Jeans;
$fabrictype_product_3 = Overcoat;
$fabrictype_product_4 = Pants;
$fabrictype_product_5 = Shirt;
$fabrictype_product_6 = Suits;
$fabrictype_product_7 = Ties;
$fabrictype_product_8 = Vest;
$fabrictype_product_9 = Lining;
$fabrictype_name = $_POST["fabrictype_name"];
$fabrictype_admin = $_POST["fabrictype_admin"];
$fabrictype_date = date("m/d/Y");
$fabrictype_time = date("H:i:s");
$fabrictype_ip = $_POST['ip'];
$fabrictype_status = T;

$sql1 = " UPDATE admin_fabrictype SET fabrictype_name = '".$fabrictype_name."', fabrictype_admin = '".$fabrictype_admin."', fabrictype_date = '".$fabrictype_date."', fabrictype_time = '".$fabrictype_time."', fabrictype_ip = '".$fabrictype_ip."', fabrictype_status = '".$fabrictype_status."' WHERE fabrictype_id = '$fabrictype_id' ";
$query1 = mysql_query($sql1) or die("Can't Query1");

if($query1) {
	
	echo " <script language='javascript'> window.location='../fabrictype/'; </script> ";
	
}

mysql_close();
?>