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
	
$sql1 =	" SELECT * FROM customize_overcoat_design WHERE order_id = '$order_id_same' AND product_id = '$product_id_same' ";
$query1 = mysql_db_query($dbname, $sql1) or die("Can't Query1");
$row1 = mysql_fetch_array($query1);

$sql2 =	" SELECT * FROM customize_overcoat_measurements WHERE order_id = '$order_id_same' AND product_id = '$product_id_same' ";
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

$sql6 =	" SELECT MAX(id) FROM customize_overcoat_design ";
$query6 = mysql_db_query($dbname, $sql6) or die("Can't Query6");
$row6 = mysql_fetch_array($query6);
$id_overcoat = $row6[0] + 1 ;

/*FABRIC*/
$overcoat_fabric_no = $row1["overcoat_fabric_no"];
$overcoat_lining_no = $row1["overcoat_lining_no"];

/*PRICE*/
$order_my_price = $row3["order_my_price"];
$order_price = $row3["order_price"];

/*BUTTON*/
$overcoat_overcoat_button_number = $row1["overcoat_overcoat_button_number"];

/*CUSTOMER*/
$overcoat_customer_name = $row1["overcoat_customer_name"];
$overcoat_order_no = $row1["overcoat_order_no"];
$overcoat_order_date = date("m/d/Y");
$overcoat_delivery_date = $row1["overcoat_delivery_date"];

/*CUSTOMIZE*/
$overcoat_overcoat_style = $row1["overcoat_overcoat_style"];
$overcoat_lapel_style = $row1["overcoat_lapel_style"];
$overcoat_shoulder_construction = $row1["overcoat_shoulder_construction"];
$overcoat_real_lapel_boutonniere = $row1["overcoat_real_lapel_boutonniere"];
$overcoat_pocket_style = $row1["overcoat_pocket_style"];
$overcoat_chest_pocket = $row1["overcoat_chest_pocket"];
$overcoat_sleeve_button = $row1["overcoat_sleeve_button"];
$overcoat_cuff = $row1["overcoat_cuff"];
$overcoat_all_sleevebutton_holes_color = $row1["overcoat_all_sleevebutton_holes_color"];
$overcoat_contrast_last_sleevebutton_holes_color = $row1["overcoat_contrast_last_sleevebutton_holes_color"];
$overcoat_apaulettes = $row1["overcoat_apaulettes"];
$overcoat_belt = $row1["overcoat_belt"];
$overcoat_vent_style = $row1["overcoat_vent_style"];
$overcoat_lining_style = $row1["overcoat_lining_style"];
$overcoat_overcoat_button_number = $row1["overcoat_overcoat_button_number"];
$overcoat_overcoat_thread_on_button = $row1["overcoat_overcoat_thread_on_button"];
$overcoat_overcoat_button_hole_color = $row1["overcoat_overcoat_button_hole_color"];
$overcoat_pick_stitch_lapel_color = $row1["overcoat_pick_stitch_lapel_color"];
$overcoat_pick_stitch_pocket_color = $row1["overcoat_pick_stitch_pocket_color"];
$overcoat_embroidery_initial_or_name = $row1["overcoat_embroidery_initial_or_name"];
$overcoat_embroidery_color = $row1["overcoat_embroidery_color"];

/*MEASUREMENTS*/
$overcoat_overcoat_measurement_sex = $row2["overcoat_overcoat_measurement_sex"];
$overcoat_overcoat_measurement_fit = $row2["overcoat_overcoat_measurement_fit"];
$overcoat_overcoat_measurement = $row2["overcoat_overcoat_measurement"];
$overcoat_overcoat_measurement_overcoat_length = $row2["overcoat_overcoat_measurement_overcoat_length"];
$overcoat_overcoat_measurement_back_lenght = $row2["overcoat_overcoat_measurement_back_lenght"];
$overcoat_overcoat_measurement_chest = $row2["overcoat_overcoat_measurement_chest"];
$overcoat_overcoat_measurement_waist_only = $row2["overcoat_overcoat_measurement_waist_only"];
$overcoat_overcoat_measurement_hips = $row2["overcoat_overcoat_measurement_hips"];
$overcoat_overcoat_measurement_shoulders = $row2["overcoat_overcoat_measurement_shoulders"];
$overcoat_overcoat_measurement_neck = $row2["overcoat_overcoat_measurement_neck"];
$overcoat_overcoat_measurement_ptp_front = $row2["overcoat_overcoat_measurement_ptp_front"];
$overcoat_overcoat_measurement_ptp_back = $row2["overcoat_overcoat_measurement_ptp_back"];
$overcoat_overcoat_measurement_arm_hole = $row2["overcoat_overcoat_measurement_arm_hole"];
$overcoat_overcoat_measurement_biceps = $row2["overcoat_overcoat_measurement_biceps"];
$overcoat_overcoat_measurement_sleeves_right = $row2["overcoat_overcoat_measurement_sleeves_right"];
$overcoat_overcoat_measurement_sleeves_left = $row2["overcoat_overcoat_measurement_sleeves_left"];
$overcoat_overcoat_measurement_wrist_right = $row2["overcoat_overcoat_measurement_wrist_right"];
$overcoat_overcoat_measurement_wrist_left = $row2["overcoat_overcoat_measurement_wrist_left"];
$overcoat_overcoat_measurement_first_button = $row2["overcoat_overcoat_measurement_first_button"];
$overcoat_overcoat_measurement_shoulder_upper_wrist = $row2["overcoat_overcoat_measurement_shoulder_upper_wrist"];
$overcoat_overcoat_measurement_shoulder_lower_wrist = $row2["overcoat_overcoat_measurement_shoulder_lower_wrist"];
$overcoat_measurement_overcoat_shoulder = $row2["overcoat_measurement_overcoat_shoulder"];
$overcoat_measurement_overcoat_waist = $row2["overcoat_measurement_overcoat_waist"];
$overcoat_measurement_overcoat_chest = $row2["overcoat_measurement_overcoat_chest"];
$overcoat_body_front = $row2["overcoat_body_front"];
$overcoat_body_left = $row2["overcoat_body_left"];
$overcoat_body_right = $row2["overcoat_body_right"];
$overcoat_body_back = $row2["overcoat_body_back"];
$overcoat_remark = $row2["overcoat_remark"];

/*ECT*/
$overcoat_date = date("m/d/Y");
$overcoat_time = date("H:i:s");
$overcoat_ip = $_POST['ip'];
$overcoat_status = T;

/*PRODUCT*/
$order_product = $row3['order_product'];

$sql7 =	" INSERT INTO customize_order (id, order_id, product_id, order_reseller, order_order_no, order_name_customize, order_my_price, order_price, order_product, order_fabric_no, order_date, order_time, order_ip, order_status) VALUES ('$id_order', '$order_id_same', '$product_id', '$company_user', '$overcoat_order_no', '$overcoat_customer_name', '$order_my_price', '$order_price', '$order_product', '$overcoat_fabric_no', '$overcoat_date', '$overcoat_time', '$overcoat_ip', '$overcoat_status') ";
$query7 = mysql_query($sql7) or die("Can't Query7");

$sql8 = " INSERT INTO customize_overcoat_design (id, order_id, product_id, overcoat_customer_name, overcoat_order_no, overcoat_order_date, overcoat_delivery_date, overcoat_fabric_no, overcoat_lining_no, overcoat_overcoat_style, overcoat_lapel_style, overcoat_shoulder_construction, overcoat_real_lapel_boutonniere, overcoat_pocket_style, overcoat_chest_pocket, overcoat_sleeve_button, overcoat_cuff, overcoat_all_sleevebutton_holes_color, overcoat_contrast_last_sleevebutton_holes_color, overcoat_apaulettes, overcoat_belt, overcoat_vent_style, overcoat_lining_style, overcoat_overcoat_button_number, overcoat_overcoat_thread_on_button, overcoat_overcoat_button_hole_color, overcoat_pick_stitch_lapel_color, overcoat_pick_stitch_pocket_color, overcoat_embroidery_initial_or_name, overcoat_embroidery_color, overcoat_date, overcoat_time, overcoat_ip, overcoat_status) VALUES ('$id_overcoat', '$order_id_same', '$product_id', '$overcoat_customer_name', '$overcoat_order_no', '$overcoat_order_date', '$overcoat_delivery_date', '$overcoat_fabric_no', '$overcoat_lining_no', '$overcoat_overcoat_style', '$overcoat_lapel_style', '$overcoat_shoulder_construction', '$overcoat_real_lapel_boutonniere', '$overcoat_pocket_style', '$overcoat_chest_pocket', '$overcoat_sleeve_button', '$overcoat_cuff', '$overcoat_all_sleevebutton_holes_color', '$overcoat_contrast_last_sleevebutton_holes_color', '$overcoat_apaulettes', '$overcoat_belt', '$overcoat_vent_style', '$overcoat_lining_style', '$overcoat_overcoat_button_number', '$overcoat_overcoat_thread_on_button', '$overcoat_overcoat_button_hole_color', '$overcoat_pick_stitch_lapel_color', '$overcoat_pick_stitch_pocket_color', '$overcoat_embroidery_initial_or_name', '$overcoat_embroidery_color', '$overcoat_date', '$overcoat_time', '$overcoat_ip', '$overcoat_status') ";
$query8 = mysql_query($sql8) or die("Can't Query8");

$sql9 = " INSERT INTO customize_overcoat_measurements (id, order_id, product_id, overcoat_overcoat_measurement_sex, overcoat_overcoat_measurement_fit, overcoat_overcoat_measurement, overcoat_overcoat_measurement_overcoat_length, overcoat_overcoat_measurement_back_lenght, overcoat_overcoat_measurement_chest, overcoat_overcoat_measurement_waist_only, overcoat_overcoat_measurement_hips, overcoat_overcoat_measurement_shoulders, overcoat_overcoat_measurement_neck, overcoat_overcoat_measurement_ptp_front, overcoat_overcoat_measurement_ptp_back, overcoat_overcoat_measurement_arm_hole, overcoat_overcoat_measurement_biceps, overcoat_overcoat_measurement_sleeves_right, overcoat_overcoat_measurement_sleeves_left, overcoat_overcoat_measurement_wrist_right, overcoat_overcoat_measurement_wrist_left, overcoat_overcoat_measurement_first_button, overcoat_overcoat_measurement_shoulder_upper_wrist, overcoat_overcoat_measurement_shoulder_lower_wrist, overcoat_measurement_overcoat_shoulder, overcoat_measurement_overcoat_waist, overcoat_measurement_overcoat_chest, overcoat_body_front, overcoat_body_left, overcoat_body_right, overcoat_body_back, overcoat_remark, overcoat_date, overcoat_time, overcoat_ip, overcoat_status) VALUES ('$id_overcoat', '$order_id_same', '$product_id', '$overcoat_overcoat_measurement_sex', '$overcoat_overcoat_measurement_fit', '$overcoat_overcoat_measurement', '$overcoat_overcoat_measurement_overcoat_length', '$overcoat_overcoat_measurement_back_lenght', '$overcoat_overcoat_measurement_chest', '$overcoat_overcoat_measurement_waist_only', '$overcoat_overcoat_measurement_hips', '$overcoat_overcoat_measurement_shoulders', '$overcoat_overcoat_measurement_neck', '$overcoat_overcoat_measurement_ptp_front', '$overcoat_overcoat_measurement_ptp_back', '$overcoat_overcoat_measurement_arm_hole', '$overcoat_overcoat_measurement_biceps', '$overcoat_overcoat_measurement_sleeves_right', '$overcoat_overcoat_measurement_sleeves_left', '$overcoat_overcoat_measurement_wrist_right', '$overcoat_overcoat_measurement_wrist_left', '$overcoat_overcoat_measurement_first_button', '$overcoat_overcoat_measurement_shoulder_upper_wrist', '$overcoat_overcoat_measurement_shoulder_lower_wrist', '$overcoat_measurement_overcoat_shoulder', '$overcoat_measurement_overcoat_waist', '$overcoat_measurement_overcoat_chest', '$overcoat_body_front', '$overcoat_body_left', '$overcoat_body_right', '$overcoat_body_back', '$overcoat_remark', '$overcoat_date', '$overcoat_time', '$overcoat_ip', '$overcoat_status') ";
$query9 = mysql_query($sql9) or die("Can't Query9");

if($query9) {
	
	echo " <script language='javascript'> window.location='../../cart/single/index.php?orderid=".$order_id_same."'; </script> ";
	
}

mysql_close();
?>