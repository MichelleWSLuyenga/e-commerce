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

$order_product = vest;
$order_id = $_POST["vest_orderid"];
$product_id = $_POST["vest_productid"];

/*FABRIC*/
$vest_fabric_no_1 = $_POST["vest_fabric_no_1"];
$vest_lining_no_1 = $_POST["vest_lining_no_1"];

$sql1 =	" SELECT * FROM admin_fabrics_vest WHERE fabricno = '$vest_fabric_no_1' ";
$query1 = mysql_db_query($dbname, $sql1) or die("Can't Query1");
$row1 = mysql_fetch_array($query1);
$fabrics_type = $row1["type"];
$fabrics_brand = $row1["brand"];

if ($row1["type"] != '') {

$sql01 = " SELECT `fabrictype_".$id_user."` FROM admin_fabrictype WHERE fabrictype_name = '$fabrics_type' AND fabrictype_product = 'Vest' ";
$query01 = mysql_db_query($dbname, $sql01) or die("Can't Query01");
$row01 = mysql_fetch_array($query01);
$vest_fabric_price_1 = $row01["0"];

} else if ($row1["brand"] != '') {
	
$sql02 = " SELECT `fabricbrand_".$id_user."` FROM admin_fabricbrand WHERE fabricbrand_name = '$fabrics_brand' AND fabricbrand_product = 'Vest' ";
$query02 = mysql_db_query($dbname, $sql02) or die("Can't Query02");
$row02 = mysql_fetch_array($query02);	
$vest_fabric_price_1 = $row02["0"];
	
}

/*BUTTON*/
$vest_vest_button_number = $_POST["vest_vest_button_number"];

$sql2 = " SELECT price FROM admin_buttons_suits WHERE buttonno = '$vest_vest_button_number' ";
$query2 = mysql_db_query($dbname, $sql2) or die("Can't Query2");
$row2 = mysql_fetch_array($query2);
$vest_button_price = $row2["price"];

$vest_price_1 = $vest_fabric_price_1 + $vest_button_price;

/*CUSTOMER*/
$vest_customer_name = $_POST["vest_customer_name"];
$vest_order_no = $_POST["vest_order_no"];
$vest_order_date = date("m/d/Y");
$vest_delivery_date = $_POST["vest_delivery_date"];

/*CUSTOMIZE*/
$vest_vest_button = $_POST["vest_vest_button"];
$vest_vest_lapel_style = $_POST["vest_vest_lapel_style"];
$vest_vest_chest_pocket = $_POST["vest_vest_chest_pocket"];
$vest_vest_bottom_pocket = $_POST["vest_vest_bottom_pocket"];
$vest_vest_bottom_of_vest = $_POST["vest_vest_bottom_of_vest"];
$vest_vest_belt_at_back = $_POST["vest_vest_belt_at_back"];
$vest_vest_lining_option = $_POST["vest_vest_lining_option"];
$vest_vest_thread_on_button = $_POST["vest_vest_thread_on_button"];
$vest_vest_button_hole_color = $_POST["vest_vest_button_hole_color"];

/*MEASUREMENTS*/
$vest_vest_measurement_sex = $_POST["vest_vest_measurement_sex"];
$vest_vest_measurement_fit = $_POST["vest_vest_measurement_fit"];
$vest_vest_measurement = $_POST["vest_vest_measurement"];
$vest_vest_measurement_vest_length = $_POST["vest_vest_measurement_vest_length"];
$vest_vest_measurement_back_lenght = $_POST["vest_vest_measurement_back_lenght"];
$vest_vest_measurement_chest = $_POST["vest_vest_measurement_chest"];
$vest_vest_measurement_waist_upper = $_POST["vest_vest_measurement_waist_upper"];
$vest_vest_measurement_waist_lower = $_POST["vest_vest_measurement_waist_lower"];
$vest_vest_measurement_hips = $_POST["vest_vest_measurement_hips"];
$vest_vest_measurement_shoulders = $_POST["vest_vest_measurement_shoulders"];
$vest_vest_measurement_sleeves_right = $_POST["vest_vest_measurement_sleeves_right"];
$vest_vest_measurement_sleeves_left = $_POST["vest_vest_measurement_sleeves_left"];
$vest_vest_measurement_neck = $_POST["vest_vest_measurement_neck"];
$vest_vest_measurement_ptp_front = $_POST["vest_vest_measurement_ptp_front"];
$vest_vest_measurement_ptp_back = $_POST["vest_vest_measurement_ptp_back"];
$vest_vest_measurement_arm_hole = $_POST["vest_vest_measurement_arm_hole"];
$vest_vest_measurement_biceps = $_POST["vest_vest_measurement_biceps"];
$vest_measurement_jacket_shoulder = $_POST["vest_measurement_jacket_shoulder"];
$vest_measurement_jacket_waist = $_POST["vest_measurement_jacket_waist"];
$vest_measurement_jacket_chest = $_POST["vest_measurement_jacket_chest"];
$vest_remark = $_POST["vest_remark"];

/*ECT*/
$vest_date = date("m/d/Y");
$vest_time = date("H:i:s");
$vest_ip = $_POST['ip'];
$vest_status = T;

$sql3 =	" UPDATE customize_order SET order_reseller = '$company_user', order_price = '$vest_price_1', order_product = '$order_product', order_fabric_no = '$vest_fabric_no_1', order_date = '$vest_date', order_time = '$vest_time', order_ip = '$vest_ip', order_status = '$vest_status' WHERE order_id = '$order_id' AND product_id = '$product_id' ";
$query3 = mysql_query($sql3) or die("Can't Query3");

$sql4 = " UPDATE customize_vest_design SET vest_customer_name = '$vest_customer_name', vest_order_no = '$vest_order_no', vest_order_date = '$vest_order_date', vest_delivery_date = '$vest_delivery_date', vest_fabric_no = '$vest_fabric_no_1', vest_lining_no = '$vest_lining_no_1', vest_vest_button = '$vest_vest_button', vest_vest_lapel_style = '$vest_vest_lapel_style', vest_vest_chest_pocket = '$vest_vest_chest_pocket', vest_vest_bottom_pocket = '$vest_vest_bottom_pocket', vest_vest_bottom_of_vest = '$vest_vest_bottom_of_vest', vest_vest_belt_at_back = '$vest_vest_belt_at_back', vest_vest_lining_option = '$vest_vest_lining_option', vest_vest_button_number = '$vest_vest_button_number', vest_vest_thread_on_button = '$vest_vest_thread_on_button', vest_vest_button_hole_color = '$vest_vest_button_hole_color', vest_date = '$vest_date', vest_time = '$vest_time', vest_ip = '$vest_ip', vest_status = '$vest_status' WHERE order_id = '$order_id' AND product_id = '$product_id' ";
$query4 = mysql_query($sql4) or die("Can't Query4");

$sql5 = " UPDATE customize_vest_measurements SET vest_vest_measurement_sex = '$vest_vest_measurement_sex', vest_vest_measurement_fit = '$vest_vest_measurement_fit', vest_vest_measurement = '$vest_vest_measurement', vest_vest_measurement_vest_length = '$vest_vest_measurement_vest_length', vest_vest_measurement_back_lenght = '$vest_vest_measurement_back_lenght', vest_vest_measurement_chest = '$vest_vest_measurement_chest', vest_vest_measurement_waist_upper = '$vest_vest_measurement_waist_upper', vest_vest_measurement_waist_lower = '$vest_vest_measurement_waist_lower', vest_vest_measurement_hips = '$vest_vest_measurement_hips', vest_vest_measurement_shoulders = '$vest_vest_measurement_shoulders', vest_vest_measurement_sleeves_right = '$vest_vest_measurement_sleeves_right', vest_vest_measurement_sleeves_left = '$vest_vest_measurement_sleeves_left', vest_vest_measurement_neck = '$vest_vest_measurement_neck', vest_vest_measurement_ptp_front = '$vest_vest_measurement_ptp_front', vest_vest_measurement_ptp_back = '$vest_vest_measurement_ptp_back', vest_vest_measurement_arm_hole = '$vest_vest_measurement_arm_hole', vest_vest_measurement_biceps = '$vest_vest_measurement_biceps', vest_measurement_jacket_shoulder = '$vest_measurement_jacket_shoulder', vest_measurement_jacket_waist = '$vest_measurement_jacket_waist', vest_measurement_jacket_chest = '$vest_measurement_jacket_chest', vest_remark = '$vest_remark', vest_date = '$vest_date', vest_time = '$vest_time', vest_ip = '$vest_ip', vest_status = '$vest_status' WHERE order_id = '$order_id' AND product_id = '$product_id' ";
$query5 = mysql_query($sql5) or die("Can't Query5");

if($query5) {
	
	echo " <script language='javascript'> window.location='../../../cart/multiple/index.php?orderid=".$order_id."'; </script> ";
	
}

mysql_close();
?>