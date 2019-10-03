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

$order_product = jeans;
$order_id = $_POST["jeans_orderid"];
$product_id = $_POST["jeans_productid"];

/*FABRIC*/
$jeans_fabric_no_1 = $_POST["jeans_fabric_no_1"];

$sql1 =	" SELECT * FROM admin_fabrics_jeans WHERE fabricno = '$jeans_fabric_no_1' ";
$query1 = mysql_db_query($dbname, $sql1) or die("Can't Query1");
$row1 = mysql_fetch_array($query1);
$fabrics_type = $row1["type"];
$fabrics_brand = $row1["brand"];

if ($row1["type"] != '') {

$sql01 = " SELECT `fabrictype_".$id_user."` FROM admin_fabrictype WHERE fabrictype_name = '$fabrics_type' AND fabrictype_product = 'Jeans' ";
$query01 = mysql_db_query($dbname, $sql01) or die("Can't Query01");
$row01 = mysql_fetch_array($query01);
$jeans_fabric_price_1 = $row01["0"];

} else if ($row1["brand"] != '') {
	
$sql02 = " SELECT `fabricbrand_".$id_user."` FROM admin_fabricbrand WHERE fabricbrand_name = '$fabrics_brand' AND fabricbrand_product = 'Jeans' ";
$query02 = mysql_db_query($dbname, $sql02) or die("Can't Query02");
$row02 = mysql_fetch_array($query02);	
$jeans_fabric_price_1 = $row02["0"];
	
}

$jeans_price_1 = $jeans_fabric_price_1;

/*CUSTOMER*/
$jeans_customer_name = $_POST["jeans_customer_name"];
$jeans_order_no = $_POST["jeans_order_no"];
$jeans_order_date = date("m/d/Y");
$jeans_delivery_date = $_POST["jeans_delivery_date"];

/*CUSTOMIZE*/
$jeans_pocketing = $_POST["jeans_pocketing"];
$jeans_front_pocket = $_POST["jeans_front_pocket"];
$jeans_back_pocket = $_POST["jeans_back_pocket"];
$jeans_coin_pocket = $_POST["jeans_coin_pocket"];
$jeans_fly = $_POST["jeans_fly"];
$jeans_embroidery = $_POST["jeans_embroidery"];
$jeans_embroidery_initial_or_name = $_POST["jeans_embroidery_initial_or_name"];
$jeans_embroidery_position = $_POST["jeans_embroidery_position"];
$jeans_leather_patch = $_POST["jeans_leather_patch"];
$jeans_thread = $_POST["jeans_thread"];
$jeans_buttons = $_POST["jeans_buttons"];
$jeans_fitting = $_POST["jeans_fitting"];
$jeans_wash = $_POST["jeans_wash"];

/*MEASUREMENTS*/
$jeans_measurement_sex = $_POST["jeans_measurement_sex"];
$jeans_measurement = $_POST["jeans_measurement"];
$jeans_measurement_waist = $_POST["jeans_measurement_waist"];
$jeans_measurement_hips = $_POST["jeans_measurement_hips"];
$jeans_measurement_crotch = $_POST["jeans_measurement_crotch"];
$jeans_measurement_thighs = $_POST["jeans_measurement_thighs"];
$jeans_measurement_knees = $_POST["jeans_measurement_knees"];
$jeans_measurement_cuffs_ankle = $_POST["jeans_measurement_cuffs_ankle"];
$jeans_measurement_length_outleg = $_POST["jeans_measurement_length_outleg"];
$jeans_measurement_pants_waist = $_POST["jeans_measurement_pants_waist"];
$jeans_measurement_pants_bottom = $_POST["jeans_measurement_pants_bottom"];
$jeans_remark = $_POST["jeans_remark"];

/*ECT*/
$jeans_date = date("m/d/Y");
$jeans_time = date("H:i:s");
$jeans_ip = $_POST['ip'];
$jeans_status = T;

$sql3 =	" UPDATE customize_order SET order_reseller = '$company_user', order_price = '$jeans_price_1', order_product = '$order_product', order_fabric_no = '$jeans_fabric_no_1', order_date = '$jeans_date', order_time = '$jeans_time', order_ip = '$jeans_ip', order_status = '$jeans_status' WHERE order_id = '$order_id' AND product_id = '$product_id' ";
$query3 = mysql_query($sql3) or die("Can't Query3");

$sql4 = " UPDATE customize_jeans_design SET jeans_customer_name = '$jeans_customer_name', jeans_order_no = '$jeans_order_no', jeans_order_date = '$jeans_order_date', jeans_delivery_date = '$jeans_delivery_date', jeans_fabric_no = '$jeans_fabric_no_1', jeans_pocketing = '$jeans_pocketing', jeans_front_pocket = '$jeans_front_pocket', jeans_back_pocket = '$jeans_back_pocket', jeans_coin_pocket = '$jeans_coin_pocket', jeans_fly = '$jeans_fly', jeans_embroidery = '$jeans_embroidery', jeans_embroidery_initial_or_name = '$jeans_embroidery_initial_or_name', jeans_embroidery_position = '$jeans_embroidery_position', jeans_leather_patch = '$jeans_leather_patch', jeans_thread = '$jeans_thread', jeans_buttons = '$jeans_buttons', jeans_fitting = '$jeans_fitting', jeans_wash = '$jeans_wash', jeans_date = '$jeans_date', jeans_time = '$jeans_time', jeans_ip = '$jeans_ip', jeans_status = '$jeans_status' WHERE order_id = '$order_id' AND product_id = '$product_id' ";
$query4 = mysql_query($sql4) or die("Can't Query4");

$sql5 = " UPDATE customize_jeans_measurements SET jeans_measurement_sex = '$jeans_measurement_sex', jeans_measurement = '$jeans_measurement', jeans_measurement_waist = '$jeans_measurement_waist', jeans_measurement_hips = '$jeans_measurement_hips', jeans_measurement_crotch = '$jeans_measurement_crotch', jeans_measurement_thighs = '$jeans_measurement_thighs', jeans_measurement_knees = '$jeans_measurement_knees', jeans_measurement_cuffs_ankle = '$jeans_measurement_cuffs_ankle', jeans_measurement_length_outleg = '$jeans_measurement_length_outleg', jeans_measurement_pants_waist = '$jeans_measurement_pants_waist', jeans_measurement_pants_bottom = '$jeans_measurement_pants_bottom', jeans_remark = '$jeans_remark', jeans_date = '$jeans_date', jeans_time = '$jeans_time', jeans_ip = '$jeans_ip', jeans_status = '$jeans_status' WHERE order_id = '$order_id' AND product_id = '$product_id' ";
$query5 = mysql_query($sql5) or die("Can't Query5");

if($query5) {
	
	echo " <script language='javascript'> window.location='../../../cart/multiple/index.php?orderid=".$order_id."'; </script> ";
	
}

mysql_close();
?>