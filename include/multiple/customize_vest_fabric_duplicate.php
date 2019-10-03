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

$order_id_same = $_POST["vest_orderid"];
$product_id_same = $_POST["vest_productid"];
	
$sql1 =	" SELECT * FROM customize_vest_design WHERE order_id = '$order_id_same' AND product_id = '$product_id_same' ";
$query1 = mysql_db_query($dbname, $sql1) or die("Can't Query1");
$row1 = mysql_fetch_array($query1);

$sql2 =	" SELECT * FROM customize_vest_measurements WHERE order_id = '$order_id_same' AND product_id = '$product_id_same' ";
$query2 = mysql_db_query($dbname, $sql2) or die("Can't Query2");
$row2 = mysql_fetch_array($query2);

$sql3 =	" SELECT * FROM customize_order WHERE order_id = '$order_id_same' AND product_id = '$product_id_same' ";
$query3 = mysql_db_query($dbname, $sql3) or die("Can't Query3");
$row3 = mysql_fetch_array($query3);

$sql4 =	" SELECT MAX(id) FROM customize_order ";
$query4 = mysql_db_query($dbname, $sql4) or die("Can't Query4");
$row4 = mysql_fetch_array($query4);
$id_order = $row4[0] + 1 ;

$sql5 =	" SELECT MAX(product_id) FROM customize_order ";
$query5 = mysql_db_query($dbname, $sql5) or die("Can't Query5");
$row5 = mysql_fetch_array($query5);
$product_id = $row5[0] + 1 ;

$sql6 =	" SELECT MAX(id) FROM customize_vest_design ";
$query6 = mysql_db_query($dbname, $sql6) or die("Can't Query6");
$row6 = mysql_fetch_array($query6);
$id_vest = $row6[0] + 1 ;

/*FABRIC*/
$vest_fabric_no_1 = $_POST["vest_fabric_no_1"];
$vest_lining_no_1 = $_POST["vest_lining_no_1"];

$sql001 = " SELECT * FROM admin_fabrics_vest WHERE fabricno = '$vest_fabric_no_1' ";
$query001 = mysql_db_query($dbname, $sql001) or die("Can't Query001");
$row001 = mysql_fetch_array($query001);
$fabrics_type = $row001["type"];
$fabrics_brand = $row001["brand"];

if ($row001["type"] != '') {

$sql01 = " SELECT `fabrictype_".$id_user."` FROM admin_fabrictype WHERE fabrictype_name = '$fabrics_type' AND fabrictype_product = 'Vest' ";
$query01 = mysql_db_query($dbname, $sql01) or die("Can't Query01");
$row01 = mysql_fetch_array($query01);
$vest_fabric_price_1 = $row01["0"];

} else if ($row001["brand"] != '') {
	
$sql02 = " SELECT `fabricbrand_".$id_user."` FROM admin_fabricbrand WHERE fabricbrand_name = '$fabrics_brand' AND fabricbrand_product = 'Vest' ";
$query02 = mysql_db_query($dbname, $sql02) or die("Can't Query02");
$row02 = mysql_fetch_array($query02);	
$vest_fabric_price_1 = $row02["0"];
	
}

/*OTHER PRICING PARAMETERS*/
$vest_vest_measurement_chest = $row1["vest_vest_measurement_chest"];
$vest_vest_measurement_waist_only = $row1["vest_vest_measurement_waist_only"];
$vest_vest_measurement_hips = $row1["vest_vest_measurement_hips"];

if (($vest_vest_measurement_chest >= '50' && $vest_vest_measurement_chest <= '52') || ($vest_vest_measurement_waist_only >= '50' && $vest_vest_measurement_waist_only <= '52') || ($vest_vest_measurement_hips >= '50' && $vest_vest_measurement_hips <= '52')) {
	
	$price_size_1 = $vest_fabric_price_1 * 20;
	$price_size_2 = $price_size_1 / 100;
	$price_size_3 = $price_size_2 + $vest_fabric_price_1;
	
} else if (($vest_vest_measurement_chest >= '52.5' && $vest_vest_measurement_chest <= '56') || ($vest_vest_measurement_waist_only >= '52.5' && $vest_vest_measurement_waist_only <= '56') || ($vest_vest_measurement_hips >= '52.5' && $vest_vest_measurement_hips <= '56')) {
	
	$price_size_1 = $vest_fabric_price_1 * 30;
	$price_size_2 = $price_size_1 / 100;
	$price_size_3 = $price_size_2 + $vest_fabric_price_1;
	
} else if (($vest_vest_measurement_chest >= '56.5' && $vest_vest_measurement_chest <= '60') || ($vest_vest_measurement_waist_only >= '56.5' && $vest_vest_measurement_waist_only <= '60') || ($vest_vest_measurement_hips >= '56.5' && $vest_vest_measurement_hips <= '60')) {
	
	$price_size_1 = $vest_fabric_price_1 * 40;
	$price_size_2 = $price_size_1 / 100;
	$price_size_3 = $price_size_2 + $vest_fabric_price_1;
	
} else if (($vest_vest_measurement_chest >= '60.5' && $vest_vest_measurement_chest <= '64') || ($vest_vest_measurement_waist_only >= '60.5' && $vest_vest_measurement_waist_only <= '64') || ($vest_vest_measurement_hips >= '60.5' && $vest_vest_measurement_hips <= '64')) {
	
	$price_size_1 = $vest_fabric_price_1 * 50;
	$price_size_2 = $price_size_1 / 100;
	$price_size_3 = $price_size_2 + $vest_fabric_price_1;
	
} else if (($vest_vest_measurement_chest >= '64.5' && $vest_vest_measurement_chest <= '68') || ($vest_vest_measurement_waist_only >= '64.5' && $vest_vest_measurement_waist_only <= '68') || ($vest_vest_measurement_hips >= '64.5' && $vest_vest_measurement_hips <= '68')) {
	
	$price_size_1 = $vest_fabric_price_1 * 60;
	$price_size_2 = $price_size_1 / 100;
	$price_size_3 = $price_size_2 + $vest_fabric_price_1;
	
}  else {
	
	$price_size_3 = $vest_fabric_price_1;
	
}

/*BUTTON*/
$vest_vest_button_number = $row1["vest_vest_button_number"];

$sql002 = " SELECT price FROM admin_buttons_suits WHERE buttonno = '$vest_vest_button_number' ";
$query002 = mysql_db_query($dbname, $sql002) or die("Can't Query002");
$row002 = mysql_fetch_array($query002);
$vest_button_price = $row002["price"];

$vest_price_1 = $price_size_3 + $vest_button_price;

/*MY PRICES*/

$sqlmy1 = " SELECT * FROM admin_fabrics_vest WHERE fabricno = '$vest_fabric_no_1' ";
$querymy1 = mysql_db_query($dbname, $sqlmy1) or die("Can't Querymy1");
$rowmy1 = mysql_fetch_array($querymy1);
$fabrics_my_type = $rowmy1["type"];
$fabrics_my_brand = $rowmy1["brand"];

if ($rowmy1["type"] != '') {

$sqlmy01 = " SELECT `fabrictypereseller_".$id_user."` FROM admin_fabrictype WHERE fabrictype_name = '$fabrics_my_type' AND fabrictype_product = 'Vest' ";
$querymy01 = mysql_db_query($dbname, $sqlmy01) or die("Can't Quermyy01");
$rowmy01 = mysql_fetch_array($querymy01);
$vest_fabric_my_price_1 = $rowmy01["0"];

} else if ($rowmy1["brand"] != '') {
	
$sqlmy02 = " SELECT `fabricbrand_".$id_user."` FROM admin_fabricbrand WHERE fabricbrand_name = '$fabrics_my_brand' AND fabricbrand_product = 'Vest' ";
$querymy02 = mysql_db_query($dbname, $sqlmy02) or die("Can't Querymy02");
$rowmy02 = mysql_fetch_array($querymy02);	
$vest_fabric_my_price_1 = $rowmy02["0"];
	
}

/*OTHER PRICING PARAMETERS*/
$vest_vest_measurement_chest = $_POST["vest_vest_measurement_chest"];
$vest_vest_measurement_waist_only = $_POST["vest_vest_measurement_waist_only"];
$vest_vest_measurement_hips = $_POST["vest_vest_measurement_hips"];

if (($vest_vest_measurement_chest >= '50' && $vest_vest_measurement_chest <= '52') || ($vest_vest_measurement_waist_only >= '50' && $vest_vest_measurement_waist_only <= '52') || ($vest_vest_measurement_hips >= '50' && $vest_vest_measurement_hips <= '52')) {
	
	$price_my_size_1 = $vest_fabric_my_price_1 * 20;
	$price_my_size_2 = $price_my_size_1 / 100;
	$price_my_size_3 = $price_my_size_2 + $vest_fabric_my_price_1;
	
} else if (($vest_vest_measurement_chest >= '52.5' && $vest_vest_measurement_chest <= '56') || ($vest_vest_measurement_waist_only >= '52.5' && $vest_vest_measurement_waist_only <= '56') || ($vest_vest_measurement_hips >= '52.5' && $vest_vest_measurement_hips <= '56')) {
	
	$price_my_size_1 = $vest_fabric_my_price_1 * 30;
	$price_my_size_2 = $price_my_size_1 / 100;
	$price_my_size_3 = $price_my_size_2 + $vest_fabric_my_price_1;
	
} else if (($vest_vest_measurement_chest >= '56.5' && $vest_vest_measurement_chest <= '60') || ($vest_vest_measurement_waist_only >= '56.5' && $vest_vest_measurement_waist_only <= '60') || ($vest_vest_measurement_hips >= '56.5' && $vest_vest_measurement_hips <= '60')) {
	
	$price_my_size_1 = $vest_fabric_my_price_1 * 40;
	$price_my_size_2 = $price_my_size_1 / 100;
	$price_my_size_3 = $price_my_size_2 + $vest_fabric_my_price_1;
	
} else if (($vest_vest_measurement_chest >= '60.5' && $vest_vest_measurement_chest <= '64') || ($vest_vest_measurement_waist_only >= '60.5' && $vest_vest_measurement_waist_only <= '64') || ($vest_vest_measurement_hips >= '60.5' && $vest_vest_measurement_hips <= '64')) {
	
	$price_my_size_1 = $vest_fabric_my_price_1 * 50;
	$price_my_size_2 = $price_my_size_1 / 100;
	$price_my_size_3 = $price_my_size_2 + $vest_fabric_my_price_1;
	
} else if (($vest_vest_measurement_chest >= '64.5' && $vest_vest_measurement_chest <= '68') || ($vest_vest_measurement_waist_only >= '64.5' && $vest_vest_measurement_waist_only <= '68') || ($vest_vest_measurement_hips >= '64.5' && $vest_vest_measurement_hips <= '68')) {
	
	$price_my_size_1 = $vest_fabric_my_price_1 * 60;
	$price_my_size_2 = $price_my_size_1 / 100;
	$price_my_size_3 = $price_my_size_2 + $vest_fabric_my_price_1;
	
}  else {
	
	$price_my_size_3 = $vest_fabric_my_price_1;
	
}

/*BUTTON*/
$vest_vest_button_number = $_POST["vest_vest_button_number"];

$sql2 = " SELECT price FROM admin_buttons_suits WHERE buttonno = '$vest_vest_button_number' ";
$query2 = mysql_db_query($dbname, $sql2) or die("Can't Query2");
$row2 = mysql_fetch_array($query2);
$vest_button_my_price = $row2["price"];

$vest_my_price_1 = $price_my_size_3 + $vest_button_my_price;

/*BUTTON*/
$vest_vest_button_number = $row1["vest_vest_button_number"];

/*CUSTOMER*/
$vest_customer_name = $row1["vest_customer_name"];
$vest_order_no = $row1["vest_order_no"];
$vest_order_date = date("m/d/Y");
$vest_delivery_date = $row1["vest_delivery_date"];

/*CUSTOMIZE*/
$vest_vest_button = $row1["vest_vest_button"];
$vest_vest_lapel_style = $row1["vest_vest_lapel_style"];
$vest_vest_chest_pocket = $row1["vest_vest_chest_pocket"];
$vest_vest_bottom_pocket = $row1["vest_vest_bottom_pocket"];
$vest_vest_bottom_of_vest = $row1["vest_vest_bottom_of_vest"];
$vest_vest_belt_at_back = $row1["vest_vest_belt_at_back"];
$vest_vest_lining_option = $row1["vest_vest_lining_option"];
$vest_vest_thread_on_button = $row1["vest_vest_thread_on_button"];
$vest_vest_button_hole_color = $row1["vest_vest_button_hole_color"];

/*MEASUREMENTS*/
$vest_vest_measurement_sex = $row2["vest_vest_measurement_sex"];
$vest_vest_measurement_fit = $row2["vest_vest_measurement_fit"];
$vest_vest_measurement = $row2["vest_vest_measurement"];
$vest_vest_measurement_vest_length = $row2["vest_vest_measurement_vest_length"];
$vest_vest_measurement_back_lenght = $row2["vest_vest_measurement_back_lenght"];
$vest_vest_measurement_chest = $row2["vest_vest_measurement_chest"];
$vest_vest_measurement_waist_only = $row2["vest_vest_measurement_waist_only"];
$vest_vest_measurement_hips = $row2["vest_vest_measurement_hips"];
$vest_vest_measurement_neck = $row2["vest_vest_measurement_neck"];
$vest_vest_measurement_ptp_front = $row2["vest_vest_measurement_ptp_front"];
$vest_vest_measurement_ptp_back = $row2["vest_vest_measurement_ptp_back"];
$vest_vest_measurement_arm_hole = $row2["vest_vest_measurement_arm_hole"];
$vest_measurement_jacket_shoulder = $row2["vest_measurement_jacket_shoulder"];
$vest_measurement_jacket_waist = $row2["vest_measurement_jacket_waist"];
$vest_measurement_jacket_chest = $row2["vest_measurement_jacket_chest"];
$vest_body_front = $row2["vest_body_front"];
$vest_body_left = $row2["vest_body_left"];
$vest_body_right = $row2["vest_body_right"];
$vest_body_back = $row2["vest_body_back"];
$vest_remark = $row2["vest_remark"];

/*ECT*/
$vest_date = date("m/d/Y");
$vest_time = date("H:i:s");
$vest_ip = $_POST['ip'];
$vest_status = T;

/*PRODUCT*/
$order_product = $row3['order_product'];

$sql7 =	" INSERT INTO customize_order (id, order_id, product_id, order_reseller, order_order_no, order_name_customize, order_my_price, order_price, order_product, order_fabric_no, order_date, order_time, order_ip, order_status) VALUES ('$id_order', '$order_id_same', '$product_id', '$company_user', '$vest_order_no', '$vest_customer_name', '$vest_my_price_1', '$vest_price_1', '$order_product', '$vest_fabric_no_1', '$vest_date', '$vest_time', '$vest_ip', '$vest_status') ";
$query7 = mysql_query($sql7) or die("Can't Query7");

$sql8 = " INSERT INTO customize_vest_design (id, order_id, product_id, vest_customer_name, vest_order_no, vest_order_date, vest_delivery_date, vest_fabric_no, vest_lining_no, vest_vest_button, vest_vest_lapel_style, vest_vest_chest_pocket, vest_vest_bottom_pocket, vest_vest_bottom_of_vest, vest_vest_belt_at_back, vest_vest_lining_option, vest_vest_button_number, vest_vest_thread_on_button, vest_vest_button_hole_color, vest_date, vest_time, vest_ip, vest_status) VALUES ('$id_vest', '$order_id_same', '$product_id', '$vest_customer_name', '$vest_order_no', '$vest_order_date', '$vest_delivery_date', '$vest_fabric_no_1', '$vest_lining_no_1', '$vest_vest_button', '$vest_vest_lapel_style', '$vest_vest_chest_pocket', '$vest_vest_bottom_pocket', '$vest_vest_bottom_of_vest', '$vest_vest_belt_at_back', '$vest_vest_lining_option', '$vest_vest_button_number', '$vest_vest_thread_on_button', '$vest_vest_button_hole_color', '$vest_date', '$vest_time', '$vest_ip', '$vest_status') ";
$query8 = mysql_query($sql8) or die("Can't Query8");

$sql9 = " INSERT INTO customize_vest_measurements (id, order_id, product_id, vest_vest_measurement_sex, vest_vest_measurement_fit, vest_vest_measurement, vest_vest_measurement_vest_length, vest_vest_measurement_back_lenght, vest_vest_measurement_chest, vest_vest_measurement_waist_only, vest_vest_measurement_hips, vest_vest_measurement_neck, vest_vest_measurement_ptp_front, vest_vest_measurement_ptp_back, vest_vest_measurement_arm_hole, vest_measurement_jacket_shoulder, vest_measurement_jacket_waist, vest_measurement_jacket_chest, vest_body_front, vest_body_left, vest_body_right, vest_body_back, vest_remark, vest_date, vest_time, vest_ip, vest_status) VALUES ('$id_vest', '$order_id_same', '$product_id', '$vest_vest_measurement_sex', '$vest_vest_measurement_fit', '$vest_vest_measurement', '$vest_vest_measurement_vest_length', '$vest_vest_measurement_back_lenght', '$vest_vest_measurement_chest', '$vest_vest_measurement_waist_only', '$vest_vest_measurement_hips', '$vest_vest_measurement_neck', '$vest_vest_measurement_ptp_front', '$vest_vest_measurement_ptp_back', '$vest_vest_measurement_arm_hole', '$vest_measurement_jacket_shoulder', '$vest_measurement_jacket_waist', '$vest_measurement_jacket_chest', '$vest_body_front', '$vest_body_left', '$vest_body_right', '$vest_body_back', '$vest_remark', '$vest_date', '$vest_time', '$vest_ip', '$vest_status') ";
$query9 = mysql_query($sql9) or die("Can't Query9");

if($query9) {
	
	echo " <script language='javascript'> window.location='../../cart/multiple/index.php?orderid=".$order_id_same."'; </script> ";
	
}

mysql_close();
?>