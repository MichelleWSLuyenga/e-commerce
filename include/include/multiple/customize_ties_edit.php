<?
if(empty($_POST['ip'])){
	$_POST['ip'] = $_SERVER['REMOTE_ADDR'];
}
require('./phpip2country.class.php');

include('../../connect.php');

/*RESELLER*/
$user_id = $_POST["user_id"];
$user_name = $_POST["user_name"];

$sql0 =	" SELECT * FROM admin_reseller WHERE reseller_company = '$user_name' AND reseller_type = 'Admin' ";
$query0 = mysql_db_query($dbname, $sql0) or die("Can't Query0");
$row0 = mysql_fetch_array($query0);
$id_user = $row0["id"];
$type_user = $row0["type"];
$brand_user = $row0["brand"];
$company_user = $row0["reseller_company"];

$order_product = ties;
$order_id = $_POST["ties_orderid"];
$product_id = $_POST["ties_productid"];

/*FABRIC*/
$ties_fabric_no = $_POST["ties_fabric_no"];

$sql6 =	" SELECT * FROM admin_fabrics_ties WHERE fabricno = '$ties_fabric_no' ";
$query6 = mysql_db_query($dbname, $sql6) or die("Can't Query6");
$row6 = mysql_fetch_array($query6);
$fabrics_type = $row6["type"];
$fabrics_brand = $row6["brand"];

if ($row6["type"] != '') {

$sql01 = " SELECT `fabrictype_".$id_user."` FROM admin_fabrictype WHERE fabrictype_name = '$fabrics_type' AND fabrictype_product = 'Ties' ";
$query01 = mysql_db_query($dbname, $sql01) or die("Can't Query01");
$row01 = mysql_fetch_array($query01);
$ties_price = $row01["0"];

} else if ($row6["brand"] != '') {
	
$sql02 = " SELECT `fabricbrand_".$id_user."` FROM admin_fabricbrand WHERE fabricbrand_name = '$fabrics_brand' AND fabricbrand_product = 'Ties' ";
$query02 = mysql_db_query($dbname, $sql02) or die("Can't Query02");
$row02 = mysql_fetch_array($query02);	
$ties_price = $row02["0"];
	
}

/*ECT*/
$ties_date = date("m/d/Y");
$ties_time = date("H:i:s");
$ties_ip = $_POST['ip'];
$ties_status = T;

$sql7 =	" UPDATE customize_order SET order_reseller = '$company_user', order_price = '$ties_price', order_product = '$order_product', order_fabric_no = '$ties_fabric_no', order_date = '$ties_date', order_time = '$ties_time', order_ip = '$ties_ip', order_status = '$ties_status' WHERE order_id = '$order_id' AND product_id = '$product_id' ";
$query7 = mysql_query($sql7) or die("Can't Query7");

$sql8 = " UPDATE customize_ties_design SET ties_fabric_no = '$ties_fabric_no', ties_date = '$ties_date', ties_time = '$ties_time', ties_ip = '$ties_ip', ties_status = '$ties_status' WHERE order_id = '$order_id' AND product_id = '$product_id' ";
$query8 = mysql_query($sql8) or die("Can't Query8");

$sql9 = " UPDATE customize_checkout SET checkout_date = '$ties_date', checkout_time = '$ties_time', checkout_ip = '$ties_ip', checkout_status = '$ties_status' WHERE checkout_orderid = '$order_id' ";
$query9 = mysql_query($sql9) or die("Can't Query9");

if($query9) {
	
	echo " <script language='javascript'> window.location='../../../cart/multiple/index.php?orderid=".$order_id."'; </script> ";
	
}

mysql_close();
?>