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

$order_id_same = $_POST["jeans_orderid"];
$product_id_same = $_POST["jeans_productid"];
	
$sql1 =	" SELECT * FROM customize_jeans_design WHERE order_id = '$order_id_same' AND product_id = '$product_id_same' ";
$query1 = mysql_db_query($dbname, $sql1) or die("Can't Query1");
$row1 = mysql_fetch_array($query1);

$sql2 =	" SELECT * FROM customize_jeans_measurements WHERE order_id = '$order_id_same' AND product_id = '$product_id_same' ";
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

$sql6 =	" SELECT MAX(id) FROM customize_jeans_design ";
$query6 = mysql_db_query($dbname, $sql6) or die("Can't Query6");
$row6 = mysql_fetch_array($query6);
$id_jeans = $row6[0] + 1 ;

/*FABRIC*/
$jeans_fabric_no_1 = $_POST["jeans_fabric_no_1"];

$sql001 = " SELECT * FROM admin_fabrics_jeans WHERE fabricno = '$jeans_fabric_no_1' ";
$query001 = mysql_db_query($dbname, $sql001) or die("Can't Query001");
$row001 = mysql_fetch_array($query001);
$fabrics_type = $row001["type"];
$fabrics_brand = $row001["brand"];

if ($row001["type"] != '') {

$sql01 = " SELECT `fabrictype_".$id_user."` FROM admin_fabrictype WHERE fabrictype_name = '$fabrics_type' AND fabrictype_product = 'Jeans' ";
$query01 = mysql_db_query($dbname, $sql01) or die("Can't Query01");
$row01 = mysql_fetch_array($query01);
$jeans_fabric_price_1 = $row01["0"];

} else if ($row001["brand"] != '') {
	
$sql02 = " SELECT `fabricbrand_".$id_user."` FROM admin_fabricbrand WHERE fabricbrand_name = '$fabrics_brand' AND fabricbrand_product = 'Jeans' ";
$query02 = mysql_db_query($dbname, $sql02) or die("Can't Query02");
$row02 = mysql_fetch_array($query02);	
$jeans_fabric_price_1 = $row02["0"];
	
}

/*OTHER PRICING PARAMETERS*/
$jeans_measurement_waist = $row1["jeans_measurement_waist"];
$jeans_measurement_hips = $row1["jeans_measurement_hips"];

if (($jeans_measurement_waist >= '50' && $jeans_measurement_waist <= '52') || ($jeans_measurement_hips >= '50' && $jeans_measurement_hips <= '52')) {
	
	$price_size_1 = $jeans_fabric_price_1 * 20;
	$price_size_2 = $price_size_1 / 100;
	$price_size_3 = $price_size_2 + $jeans_fabric_price_1;
	
} else if (($jeans_measurement_waist >= '52.5' && $jeans_measurement_waist <= '56') || ($jeans_measurement_hips >= '52.5' && $jeans_measurement_hips <= '56')) {
	
	$price_size_1 = $jeans_fabric_price_1 * 30;
	$price_size_2 = $price_size_1 / 100;
	$price_size_3 = $price_size_2 + $jeans_fabric_price_1;
	
} else if (($jeans_measurement_waist >= '56.5' && $jeans_measurement_waist <= '60') || ($jeans_measurement_hips >= '56.5' && $jeans_measurement_hips <= '60')) {
	
	$price_size_1 = $jeans_fabric_price_1 * 40;
	$price_size_2 = $price_size_1 / 100;
	$price_size_3 = $price_size_2 + $jeans_fabric_price_1;
	
} else if (($jeans_measurement_waist >= '60.5' && $jeans_measurement_waist <= '64') || ($jeans_measurement_hips >= '60.5' && $jeans_measurement_hips <= '64')) {
	
	$price_size_1 = $jeans_fabric_price_1 * 50;
	$price_size_2 = $price_size_1 / 100;
	$price_size_3 = $price_size_2 + $jeans_fabric_price_1;
	
} else if (($jeans_measurement_waist >= '64.5' && $jeans_measurement_waist <= '68') || ($jeans_measurement_hips >= '64.5' && $jeans_measurement_hips <= '68')) {
	
	$price_size_1 = $jeans_fabric_price_1 * 60;
	$price_size_2 = $price_size_1 / 100;
	$price_size_3 = $price_size_2 + $jeans_fabric_price_1;
	
}  else {
	
	$price_size_3 = $jeans_fabric_price_1;
	
}

$jeans_price_1 = $price_size_3;

/*MY PRICES*/

$sqlmy1 = " SELECT * FROM admin_fabrics_jeans WHERE fabricno = '$jeans_fabric_no_1' ";
$querymy1 = mysql_db_query($dbname, $sqlmy1) or die("Can't Querymy1");
$rowmy1 = mysql_fetch_array($querymy1);
$fabrics_my_type = $rowmy1["type"];
$fabrics_my_brand = $rowmy1["brand"];

if ($rowmy1["type"] != '') {

$sqlmy01 = " SELECT `fabrictypereseller_".$id_user."` FROM admin_fabrictype WHERE fabrictype_name = '$fabrics_my_type' AND fabrictype_product = 'Jeans' ";
$querymy01 = mysql_db_query($dbname, $sqlmy01) or die("Can't Querymy01");
$rowmy01 = mysql_fetch_array($querymy01);
$jeans_fabric_my_price_1 = $rowmy01["0"];

} else if ($rowmy1["brand"] != '') {
	
$sqlmy02 = " SELECT `fabricbrand_".$id_user."` FROM admin_fabricbrand WHERE fabricbrand_name = '$fabrics_my_brand' AND fabricbrand_product = 'Jeans' ";
$querymy02 = mysql_db_query($dbname, $sqlmy02) or die("Can't Querymy02");
$rowmy02 = mysql_fetch_array($querymy02);	
$jeans_fabric_my_price_1 = $rowmy02["0"];
	
}

/*OTHER PRICING PARAMETERS*/
$jeans_measurement_waist = $_POST["jeans_measurement_waist"];
$jeans_measurement_hips = $_POST["jeans_measurement_hips"];

if (($jeans_measurement_waist >= '50' && $jeans_measurement_waist <= '52') || ($jeans_measurement_hips >= '50' && $jeans_measurement_hips <= '52')) {
	
	$price_my_size_1 = $jeans_my_fabric_price_1 * 20;
	$price_my_size_2 = $price_my_size_1 / 100;
	$price_my_size_3 = $price_my_size_2 + $jeans_fabric_my_price_1;
	
} else if (($jeans_measurement_waist >= '52.5' && $jeans_measurement_waist <= '56') || ($jeans_measurement_hips >= '52.5' && $jeans_measurement_hips <= '56')) {
	
	$price_my_size_1 = $jeans_fabric_my_price_1 * 30;
	$price_my_size_2 = $price_my_size_1 / 100;
	$price_my_size_3 = $price_my_size_2 + $jeans_fabric_my_price_1;
	
} else if (($jeans_measurement_waist >= '56.5' && $jeans_measurement_waist <= '60') || ($jeans_measurement_hips >= '56.5' && $jeans_measurement_hips <= '60')) {
	
	$price_my_size_1 = $jeans_fabric_my_price_1 * 40;
	$price_my_size_2 = $price_my_size_1 / 100;
	$price_my_size_3 = $price_my_size_2 + $jeans_fabric_my_price_1;
	
} else if (($jeans_measurement_waist >= '60.5' && $jeans_measurement_waist <= '64') || ($jeans_measurement_hips >= '60.5' && $jeans_measurement_hips <= '64')) {
	
	$price_my_size_1 = $jeans_fabric_my_price_1 * 50;
	$price_my_size_2 = $price_my_size_1 / 100;
	$price_my_size_3 = $price_my_size_2 + $jeans_fabric_my_price_1;
	
} else if (($jeans_measurement_waist >= '64.5' && $jeans_measurement_waist <= '68') || ($jeans_measurement_hips >= '64.5' && $jeans_measurement_hips <= '68')) {
	
	$price_my_size_1 = $jeans_fabric_my_price_1 * 60;
	$price_my_size_2 = $price_my_size_1 / 100;
	$price_my_size_3 = $price_my_size_2 + $jeans_fabric_my_price_1;
	
}  else {
	
	$price_my_size_3 = $jeans_fabric_my_price_1;
	
}

$jeans_my_price_1 = $price_my_size_3;

/*CUSTOMER*/
$jeans_customer_name = $row1["jeans_customer_name"];
$jeans_order_no = $row1["jeans_order_no"];
$jeans_order_date = date("m/d/Y");
$jeans_delivery_date = $row1["jeans_delivery_date"];

/*CUSTOMIZE*/
$jeans_pocketing = $row1["jeans_pocketing"];
$jeans_front_pocket = $row1["jeans_front_pocket"];
$jeans_back_pocket = $row1["jeans_back_pocket"];
$jeans_coin_pocket = $row1["jeans_coin_pocket"];
$jeans_fly = $row1["jeans_fly"];
$jeans_embroidery = $row1["jeans_embroidery"];
$jeans_embroidery_initial_or_name = $row1["jeans_embroidery_initial_or_name"];
$jeans_embroidery_position = $row1["jeans_embroidery_position"];
$jeans_leather_patch = $row1["jeans_leather_patch"];
$jeans_thread = $row1["jeans_thread"];
$jeans_buttons = $row1["jeans_buttons"];
$jeans_fitting = $row1["jeans_fitting"];
$jeans_wash = $row1["jeans_wash"];

/*MEASUREMENTS*/
$jeans_measurement_sex = $row2["jeans_measurement_sex"];
$jeans_measurement = $row2["jeans_measurement"];
$jeans_measurement_waist = $row2["jeans_measurement_waist"];
$jeans_measurement_hips = $row2["jeans_measurement_hips"];
$jeans_measurement_crotch= $row2["jeans_measurement_crotch"];
$jeans_measurement_thighs = $row2["jeans_measurement_thighs"];
$jeans_measurement_knees = $row2["jeans_measurement_knees"];
$jeans_measurement_cuffs = $row2["jeans_measurement_cuffs"];
$jeans_measurement_length_outleg = $row2["jeans_measurement_length_outleg"];
$jeans_measurement_pants_waist = $row2["jeans_measurement_pants_waist"];
$jeans_measurement_pants_bottom = $row2["jeans_measurement_pants_bottom"];
$jeans_body_front = $row2["jeans_body_front"];
$jeans_body_left = $row2["jeans_body_left"];
$jeans_body_right = $row2["jeans_body_right"];
$jeans_body_back = $row2["jeans_body_back"];
$jeans_remark = $row2["jeans_remark"];

/*ECT*/
$jeans_date = date("m/d/Y");
$jeans_time = date("H:i:s");
$jeans_ip = $_POST['ip'];
$jeans_status = T;

/*PRODUCT*/
$order_product = $row3['order_product'];

$sql7 =	" INSERT INTO customize_order (id, order_id, product_id, order_reseller, order_order_no, order_name_customize, order_my_price, order_price, order_product, order_fabric_no, order_date, order_time, order_ip, order_status) VALUES ('$id_order', '$order_id_same', '$product_id', '$company_user', '$jeans_order_no', '$jeans_customer_name', '$jeans_my_price_1', '$jeans_price_1', '$order_product', '$jeans_fabric_no_1', '$jeans_date', '$jeans_time', '$jeans_ip', '$jeans_status') ";
$query7 = mysql_query($sql7) or die("Can't Query7");

$sql8 = " INSERT INTO customize_jeans_design (id, order_id, product_id, jeans_customer_name, jeans_order_no, jeans_order_date, jeans_delivery_date, jeans_fabric_no, jeans_pocketing, jeans_front_pocket, jeans_back_pocket, jeans_coin_pocket, jeans_fly, jeans_embroidery, jeans_embroidery_initial_or_name, jeans_embroidery_position, jeans_leather_patch, jeans_thread, jeans_buttons, jeans_fitting, jeans_wash, jeans_date, jeans_time, jeans_ip, jeans_status) VALUES ('$id_jeans', '$order_id_same', '$product_id', '$jeans_customer_name', '$jeans_order_no', '$jeans_order_date', '$jeans_delivery_date', '$jeans_fabric_no_1', '$jeans_pocketing', '$jeans_front_pocket', '$jeans_back_pocket', '$jeans_coin_pocket', '$jeans_fly', '$jeans_embroidery', '$jeans_embroidery_initial_or_name', '$jeans_embroidery_position', '$jeans_leather_patch', '$jeans_thread', '$jeans_buttons', '$jeans_fitting', '$jeans_wash', '$jeans_date', '$jeans_time', '$jeans_ip', '$jeans_status') ";
$query8 = mysql_query($sql8) or die("Can't Query8");

$sql9 = " INSERT INTO customize_jeans_measurements (id, order_id, product_id, jeans_measurement_sex, jeans_measurement, jeans_measurement_waist, jeans_measurement_hips, jeans_measurement_crotch, jeans_measurement_thighs, jeans_measurement_knees, jeans_measurement_cuffs, jeans_measurement_length_outleg, jeans_measurement_pants_waist, jeans_measurement_pants_bottom, jeans_body_front, jeans_body_left, jeans_body_right, jeans_body_back, jeans_remark, jeans_date, jeans_time, jeans_ip, jeans_status) VALUES ('$id_jeans', '$order_id_same', '$product_id', '$jeans_measurement_sex', '$jeans_measurement', '$jeans_measurement_waist', '$jeans_measurement_hips', '$jeans_measurement_crotch', '$jeans_measurement_thighs', '$jeans_measurement_knees', '$jeans_measurement_cuffs', '$jeans_measurement_length_outleg', '$jeans_measurement_pants_waist', '$jeans_measurement_pants_bottom', '$jeans_body_front', '$jeans_body_left', '$jeans_body_right', '$jeans_body_back', '$jeans_remark', '$jeans_date', '$jeans_time', '$jeans_ip', '$jeans_status') ";
$query9 = mysql_query($sql9) or die("Can't Query9");

if($query9) {
	
	echo " <script language='javascript'> window.location='../../cart/multiple/index.php?orderid=".$order_id_same."'; </script> ";
	
}

mysql_close();
?>