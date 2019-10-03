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

$order_id_same = $_GET["orderid"];
$product_id_same = $_GET["productid"];
	
$sql1 =	" SELECT * FROM customize_pants_design WHERE order_id = '$order_id_same' AND product_id = '$product_id_same' ";
$query1 = mysql_db_query($dbname, $sql1) or die("Can't Query1");
$row1 = mysql_fetch_array($query1);

$sql2 =	" SELECT * FROM customize_pants_measurements WHERE order_id = '$order_id_same' AND product_id = '$product_id_same' ";
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

$sql6 =	" SELECT MAX(id) FROM customize_pants_design ";
$query6 = mysql_db_query($dbname, $sql6) or die("Can't Query6");
$row6 = mysql_fetch_array($query6);
$id_pants = $row6[0] + 1 ;

/*FABRIC*/
$pants_fabric_no = $row1["pants_fabric_no"];
$pants_lining_no = $row1["pants_lining_no"];

/*PRICE*/
$order_price = $row3["order_price"];

/*BUTTON*/
$pants_pants_back_button_number = $row1["pants_pants_back_button_number"];
$pants_pants_button_number = $row1["pants_pants_button_number"];

/*CUSTOMER*/
$pants_customer_name = $row1["pants_customer_name"];
$pants_order_no = $row1["pants_order_no"];
$pants_order_date = date("m/d/Y");
$pants_delivery_date = $row1["pants_delivery_date"];

/*CUSTOMIZE*/
$pants_front_pleat = $row1["pants_front_pleat"];
$pants_front_pocket = $row1["pants_front_pocket"];
$pants_back_pocket = $row1["pants_back_pocket"];
$pants_no_back_pocket = $row1["pants_no_back_pocket"];
$pants_pants_thread_on_button = $row1["pants_pants_thread_on_button"];
$pants_pants_button_hole_color = $row1["pants_pants_button_hole_color"];
$pants_fastening = $row1["pants_fastening"];
$pants_fly_option = $row1["pants_fly_option"];
$pants_band_edge_style = $row1["pants_band_edge_style"];
$pants_very_extended_waistband = $row1["pants_very_extended_waistband"];
$pants_waistband_width = $row1["pants_waistband_width"];
$pants_cuff = $row1["pants_cuff"];
$pants_cuff_width = $row1["pants_cuff_width"];
$pants_belt = $row1["pants_belt"];
$pants_pants_lining_style = $row1["pants_pants_lining_style"];
$pants_embroidery_waist_initial_or_name = $row1["pants_embroidery_waist_initial_or_name"];
$pants_embroidery_waist_color = $row1["pants_embroidery_waist_color"];
$pants_embroidery_waist_design = $row1["pants_embroidery_waist_design"];
$pants_embroidery_cuffs_initial_or_name = $row1["pants_embroidery_cuffs_initial_or_name"];
$pants_embroidery_cuffs_color = $row1["pants_embroidery_cuffs_color"];
$pants_embroidery_cuffs_design = $row1["pants_embroidery_cuffs_design"];
$pants_pants_brand = $row1["pants_pants_brand"];
$pants_coin_pocket_inside = $row1["pants_coin_pocket_inside"];
$pants_suspender_buttons_inside = $row1["pants_suspender_buttons_inside"];
$pants_split_tabs_back = $row1["pants_split_tabs_back"];
$pants_tuxedo_satin = $row1["pants_tuxedo_satin"];
$pants_tuxedo_satin_waist_band = $row1["pants_tuxedo_satin_waist_band"];

/*MEASUREMENTS*/
$pants_pants_measurement_sex = $row2["pants_pants_measurement_sex"];
$pants_pants_measurement_length = $row2["pants_pants_measurement_length"];
$pants_pants_measurement_fit = $row2["pants_pants_measurement_fit"];
$pants_pants_measurement = $row2["pants_pants_measurement"];
$pants_pants_measurement_waist = $row2["pants_pants_measurement_waist"];
$pants_pants_measurement_hips = $row2["pants_pants_measurement_hips"];
$pants_pants_measurement_crotch_full = $row2["pants_pants_measurement_crotch_full"];
$pants_pants_measurement_crotch_front = $row2["pants_pants_measurement_crotch_front"];
$pants_pants_measurement_crotch_back = $row2["pants_pants_measurement_crotch_back"];
$pants_pants_measurement_inseam_length = $row2["pants_pants_measurement_inseam_length"];
$pants_pants_measurement_thighs = $row2["pants_pants_measurement_thighs"];
$pants_pants_measurement_knees = $row2["pants_pants_measurement_knees"];
$pants_pants_measurement_cuffs_ankle = $row2["pants_pants_measurement_cuffs_ankle"];
$pants_pants_measurement_length_outleg = $row2["pants_pants_measurement_length_outleg"];
$pants_pants_measurement_only_crotch = $row2["pants_pants_measurement_only_crotch"];
$pants_pants_measurement_front_rise = $row2["pants_pants_measurement_front_rise"];
$pants_pants_measurement_cuffs = $row2["pants_pants_measurement_cuffs"];
$pants_measurement_pants_waist = $row2["pants_measurement_pants_waist"];
$pants_measurement_pants_bottom = $row2["pants_measurement_pants_bottom"];
$pants_body_front = $row2["pants_body_front"];
$pants_body_left = $row2["pants_body_left"];
$pants_body_right = $row2["pants_body_right"];
$pants_body_back = $row2["pants_body_back"];
$pants_remark = $row2["pants_remark"];

/*ECT*/
$pants_date = date("m/d/Y");
$pants_time = date("H:i:s");
$pants_ip = $_POST['ip'];
$pants_status = T;

/*PRODUCT*/
$order_product = $row3['order_product'];

$sql7 =	" INSERT INTO customize_order (id, order_id, product_id, order_reseller, order_order_no, order_name_customize, order_price, order_product, order_fabric_no, order_date, order_time, order_ip, order_status) VALUES ('$id_order', '$order_id_same', '$product_id', '$company_user', '$pants_order_no', '$pants_customer_name', '$order_price', '$order_product', '$pants_fabric_no', '$pants_date', '$pants_time', '$pants_ip', '$pants_status') ";
$query7 = mysql_query($sql7) or die("Can't Query7");

$sql8 = " INSERT INTO customize_pants_design (id, order_id, product_id, pants_customer_name, pants_order_no, pants_order_date, pants_delivery_date, pants_fabric_no, pants_lining_no, pants_front_pleat, pants_front_pocket, pants_back_pocket, pants_no_back_pocket, pants_pants_back_button_number, pants_pants_button_number, pants_pants_thread_on_button, pants_pants_button_hole_color, pants_fastening, pants_fly_option, pants_band_edge_style, pants_very_extended_waistband, pants_waistband_width, pants_cuff, pants_cuff_width, pants_belt, pants_pants_lining_style, pants_embroidery_waist_initial_or_name, pants_embroidery_waist_color, pants_embroidery_waist_design, pants_embroidery_cuffs_initial_or_name, pants_embroidery_cuffs_color, pants_embroidery_cuffs_design, pants_pants_brand, pants_coin_pocket_inside, pants_suspender_buttons_inside, pants_split_tabs_back, pants_tuxedo_satin, pants_tuxedo_satin_waist_band, pants_date, pants_time, pants_ip, pants_status) VALUES ('$id_pants', '$order_id_same', '$product_id', '$pants_customer_name', '$pants_order_no', '$pants_order_date', '$pants_delivery_date', '$pants_fabric_no', '$pants_lining_no', '$pants_front_pleat', '$pants_front_pocket', '$pants_back_pocket', '$pants_no_back_pocket', '$pants_pants_back_button_number', '$pants_pants_button_number', '$pants_pants_thread_on_button', '$pants_pants_button_hole_color', '$pants_fastening', '$pants_fly_option', '$pants_band_edge_style', '$pants_very_extended_waistband', '$pants_waistband_width', '$pants_cuff', '$pants_cuff_width', '$pants_belt', '$pants_pants_lining_style', '$pants_embroidery_waist_initial_or_name', '$pants_embroidery_waist_color', '$pants_embroidery_waist_design', '$pants_embroidery_cuffs_initial_or_name', '$pants_embroidery_cuffs_color', '$pants_embroidery_cuffs_design', '$pants_pants_brand', '$pants_coin_pocket_inside', '$pants_suspender_buttons_inside', '$pants_split_tabs_back', '$pants_tuxedo_satin', '$pants_tuxedo_satin_waist_band', '$pants_date', '$pants_time', '$pants_ip', '$pants_status') ";
$query8 = mysql_query($sql8) or die("Can't Query8");

$sql9 = " INSERT INTO customize_pants_measurements (id, order_id, product_id, pants_pants_measurement_sex, pants_pants_measurement_length, pants_pants_measurement_fit, pants_pants_measurement, pants_pants_measurement_waist, pants_pants_measurement_hips, pants_pants_measurement_crotch_full, pants_pants_measurement_crotch_front, pants_pants_measurement_crotch_back, pants_pants_measurement_inseam_length, pants_pants_measurement_thighs, pants_pants_measurement_knees, pants_pants_measurement_cuffs_ankle, pants_pants_measurement_length_outleg, pants_pants_measurement_only_crotch, pants_pants_measurement_front_rise, pants_pants_measurement_cuffs, pants_measurement_pants_waist, pants_measurement_pants_bottom, pants_body_front, pants_body_left, pants_body_right, pants_body_back, pants_remark, pants_date, pants_time, pants_ip, pants_status) VALUES ('$id_pants', '$order_id_same', '$product_id', '$pants_pants_measurement_sex', '$pants_pants_measurement_length', '$pants_pants_measurement_fit', '$pants_pants_measurement', '$pants_pants_measurement_waist', '$pants_pants_measurement_hips', '$pants_pants_measurement_crotch_full', '$pants_pants_measurement_crotch_front', '$pants_pants_measurement_crotch_back', '$pants_pants_measurement_inseam_length', '$pants_pants_measurement_thighs', '$pants_pants_measurement_knees', '$pants_pants_measurement_cuffs_ankle', '$pants_pants_measurement_length_outleg', '$pants_pants_measurement_only_crotch', '$pants_pants_measurement_front_rise', '$pants_pants_measurement_cuffs', '$pants_measurement_pants_waist', '$pants_measurement_pants_bottom', '$pants_body_front', '$pants_body_left', '$pants_body_right', '$pants_body_back', '$pants_remark', '$pants_date', '$pants_time', '$pants_ip', '$pants_status') ";
$query9 = mysql_query($sql9) or die("Can't Query9");

if($query9) {
	
	echo " <script language='javascript'> window.location='../../../cart/single/index.php?orderid=".$order_id_same."'; </script> ";
	
}

mysql_close();
?>