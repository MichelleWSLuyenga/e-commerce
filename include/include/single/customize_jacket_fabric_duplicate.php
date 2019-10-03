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

$order_id_same = $_POST["jacket_orderid"];
$product_id_same = $_POST["jacket_productid"];
	
$sql1 =	" SELECT * FROM customize_jacket_design WHERE order_id = '$order_id_same' AND product_id = '$product_id_same' ";
$query1 = mysql_db_query($dbname, $sql1) or die("Can't Query1");
$row1 = mysql_fetch_array($query1);

$sql2 =	" SELECT * FROM customize_jacket_measurements WHERE order_id = '$order_id_same' AND product_id = '$product_id_same' ";
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

$sql6 =	" SELECT MAX(id) FROM customize_jacket_design ";
$query6 = mysql_db_query($dbname, $sql6) or die("Can't Query6");
$row6 = mysql_fetch_array($query6);
$id_jacket = $row6[0] + 1 ;

/*FABRIC*/
$jacket_fabric_no_1 = $_POST["jacket_fabric_no_1"];
$jacket_lining_no_1 = $_POST["jacket_lining_no_1"];

$sql0001 =	" SELECT * FROM admin_fabrics_jacket WHERE fabricno = '$jacket_fabric_no_1' ";
$query0001 = mysql_db_query($dbname, $sql0001) or die("Can't Query0001");
$row0001 = mysql_fetch_array($query0001);
$fabrics_type = $row0001["type"];
$fabrics_brand = $row0001["brand"];

if ($row0001["type"] != '') {

$sql01 = " SELECT `fabrictype_".$id_user."` FROM admin_fabrictype WHERE fabrictype_name = '$fabrics_type' AND fabrictype_product = 'Jacket' ";
$query01 = mysql_db_query($dbname, $sql01) or die("Can't Query01");
$row01 = mysql_fetch_array($query01);
$jacket_fabric_price_1 = $row01["0"];

} else if ($row0001["brand"] != '') {
	
$sql02 = " SELECT `fabricbrand_".$id_user."` FROM admin_fabricbrand WHERE fabricbrand_name = '$fabrics_brand' AND fabricbrand_product = 'Jacket' ";
$query02 = mysql_db_query($dbname, $sql02) or die("Can't Query02");
$row02 = mysql_fetch_array($query02);	
$jacket_fabric_price_1 = $row02["0"];
	
}

/*OTHER PRICING PARAMETERS*/
$jacket_jacket_measurement_chest = $row1["jacket_jacket_measurement_chest"];
$jacket_jacket_measurement_waist_upper = $row1["jacket_jacket_measurement_waist_upper"];
$jacket_jacket_measurement_waist_lower = $row1["jacket_jacket_measurement_waist_lower"];
$jacket_jacket_measurement_hips = $row1["jacket_jacket_measurement_hips"];

if (($jacket_jacket_measurement_chest >= '50' && $jacket_jacket_measurement_chest <= '52') || ($jacket_jacket_measurement_waist_upper >= '50' && $jacket_jacket_measurement_waist_upper <= '52') || ($jacket_jacket_measurement_waist_lower >= '50' && $jacket_jacket_measurement_waist_lower <= '52') || ($jacket_jacket_measurement_hips >= '50' && $jacket_jacket_measurement_hips <= '52')) {
	
	$price_size_1 = $jacket_fabric_price_1 * 20;
	$price_size_2 = $price_size_1 / 100;
	$price_size_3 = $price_size_2 + $jacket_fabric_price_1;
	
} else if (($jacket_jacket_measurement_chest >= '52.5' && $jacket_jacket_measurement_chest <= '56') || ($jacket_jacket_measurement_waist_upper >= '52.5' && $jacket_jacket_measurement_waist_upper <= '56') || ($jacket_jacket_measurement_waist_lower >= '52.5' && $jacket_jacket_measurement_waist_lower <= '56') || ($jacket_jacket_measurement_hips >= '52.5' && $jacket_jacket_measurement_hips <= '56')) {
	
	$price_size_1 = $jacket_fabric_price_1 * 30;
	$price_size_2 = $price_size_1 / 100;
	$price_size_3 = $price_size_2 + $jacket_fabric_price_1;
	
} else if (($jacket_jacket_measurement_chest >= '56.5' && $jacket_jacket_measurement_chest <= '60') || ($jacket_jacket_measurement_waist_upper >= '56.5' && $jacket_jacket_measurement_waist_upper <= '60') || ($jacket_jacket_measurement_waist_lower >= '56.5' && $jacket_jacket_measurement_waist_lower <= '60') || ($jacket_jacket_measurement_hips >= '56.5' && $jacket_jacket_measurement_hips <= '60')) {
	
	$price_size_1 = $jacket_fabric_price_1 * 40;
	$price_size_2 = $price_size_1 / 100;
	$price_size_3 = $price_size_2 + $jacket_fabric_price_1;
	
} else if (($jacket_jacket_measurement_chest >= '60.5' && $jacket_jacket_measurement_chest <= '64') || ($jacket_jacket_measurement_waist_upper >= '60.5' && $jacket_jacket_measurement_waist_upper <= '64') || ($jacket_jacket_measurement_waist_lower >= '60.5' && $jacket_jacket_measurement_waist_lower <= '64') || ($jacket_jacket_measurement_hips >= '60.5' && $jacket_jacket_measurement_hips <= '64')) {
	
	$price_size_1 = $jacket_fabric_price_1 * 50;
	$price_size_2 = $price_size_1 / 100;
	$price_size_3 = $price_size_2 + $jacket_fabric_price_1;

	
} else if (($jacket_jacket_measurement_chest >= '64.5' && $jacket_jacket_measurement_chest <= '68') || ($jacket_jacket_measurement_waist_upper >= '64.5' && $jacket_jacket_measurement_waist_upper <= '68') || ($jacket_jacket_measurement_waist_lower >= '64.5' && $jacket_jacket_measurement_waist_lower <= '68') || ($jacket_jacket_measurement_hips >= '64.5' && $jacket_jacket_measurement_hips <= '68')) {
	
	$price_size_1 = $jacket_fabric_price_1 * 60;
	$price_size_2 = $price_size_1 / 100;
	$price_size_3 = $price_size_2 + $jacket_fabric_price_1;
	
}  else {
	
	$price_size_3 = $jacket_fabric_price_1;
	
}

/*BUTTON*/
$jacket_jacket_button_number = $row1["jacket_jacket_button_number"];

$sql002 = " SELECT price FROM admin_buttons_suits WHERE buttonno = '$jacket_jacket_button_number' ";
$query002 = mysql_db_query($dbname, $sql002) or die("Can't Query002");
$row002 = mysql_fetch_array($query002);
$jacket_button_price = $row002["price"];

$jacket_button_price_1 = $price_size_3 + $jacket_button_price;

$jacket_embroidery_collar_initial_or_name = $row1["jacket_embroidery_collar_initial_or_name"];
if ($jacket_embroidery_collar_initial_or_name == "") {
	$jacket_embroidery_collar_initial_or_name_price = 0;
} else if ($jacket_embroidery_collar_initial_or_name != "") {
	$sqlprice1 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Embroidery Collar Felt' ";
	$queryprice1 = mysql_db_query($dbname, $sqlprice1) or die("Can't QueryPrice1");
	$rowprice1 = mysql_fetch_array($queryprice1);
	$jacket_embroidery_collar_initial_or_name_price_extra = $rowprice1["0"];
	$jacket_embroidery_collar_initial_or_name_price = $jacket_embroidery_collar_initial_or_name_price_extra;
}

$jacket_brand = $row1["jacket_brand"];
if ($jacket_brand == "0") {
	$jacket_brand_price = 0;
} else if ($jacket_brand != "0") {
	$sqlprice2 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Jacket Branding' ";
	$queryprice2 = mysql_db_query($dbname, $sqlprice2) or die("Can't QueryPrice2");
	$rowprice2 = mysql_fetch_array($queryprice2);
	$jacket_brand_price_extra = $rowprice2["0"];
	$jacket_brand_price = $jacket_brand_price_extra;
}

$jacket_pick_stitch = $row1["jacket_pick_stitch"];
$jacket_pick_stitch_sleeves = $_POST["jacket_pick_stitch_sleeves"];
if ($jacket_pick_stitch == "0") {
	$jacket_pick_stitch_sleeves_price = 0;
} else if ($jacket_pick_stitch == "1" && $jacket_pick_stitch_sleeves != "DEFAULT TONAL") {
	$sqlprice3 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Sleeves Pick Stitch' ";
	$queryprice3 = mysql_db_query($dbname, $sqlprice3) or die("Can't QueryPrice3");
	$rowprice3 = mysql_fetch_array($queryprice3);
	$jacket_pick_stitch_sleeves_price_extra = $rowprice3["0"];
	$jacket_pick_stitch_sleeves_price = $jacket_pick_stitch_sleeves_price_extra;
}

$jacket_pick_stitch_vest = $row1["jacket_pick_stitch_vest"];
if ($jacket_pick_stitch == "0") {
	$jacket_pick_stitch_vest_price = 0;
} else if ($jacket_pick_stitch == "1" && $jacket_pick_stitch_vest != "DEFAULT TONAL") {
	$sqlprice4 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Vent Pick Stitch' ";
	$queryprice4 = mysql_db_query($dbname, $sqlprice4) or die("Can't QueryPrice4");
	$rowprice4 = mysql_fetch_array($queryprice4);
	$jacket_pick_stitch_vest_price_extra = $rowprice4["0"];
	$jacket_pick_stitch_vest_price = $jacket_pick_stitch_vest_price_extra;
}

$jacket_elbow_patch = $row1["jacket_elbow_patch"];
if ($jacket_elbow_patch == "") {
	$jacket_elbow_patch_price = 0;
} else if ($jacket_elbow_patch != "") {
	$sqlprice5 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Elbow Patch' ";
	$queryprice5 = mysql_db_query($dbname, $sqlprice5) or die("Can't QueryPrice5");
	$rowprice5 = mysql_fetch_array($queryprice5);
	$jacket_elbow_patch_price_extra = $rowprice5["0"];
	$jacket_elbow_patch_price = $jacket_elbow_patch_price_extra;
}

$jacket_canvas = $row1["jacket_canvas"];
if ($jacket_canvas != "3") {
	$jacket_canvas_price = 0;
} else if ($jacket_canvas == "3") {
	$sqlprice6 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Full Canvas' ";
	$queryprice6 = mysql_db_query($dbname, $sqlprice6) or die("Can't QueryPrice6");
	$rowprice6 = mysql_fetch_array($queryprice6);
	$jacket_canvas_price_extra = $rowprice6["0"];
	$jacket_canvas_price = $jacket_canvas_price_extra;
}

$jacket_price_1 = $jacket_button_price_1 + $jacket_embroidery_collar_initial_or_name_price + $jacket_brand_price + $jacket_pick_stitch_sleeves_price + $jacket_pick_stitch_vest_price + $jacket_elbow_patch_price + $jacket_canvas_price;

/*BUTTON*/
$jacket_jacket_button_number = $row1["jacket_jacket_button_number"];

/*CUSTOMER*/
$jacket_customer_name = $row1["jacket_customer_name"];
$jacket_order_no = $row1["jacket_order_no"];
$jacket_order_date = date("m/d/Y");
$jacket_delivery_date = $row1["jacket_delivery_date"];

/*CUSTOMIZE*/
$jacket_jacket_style = $row1["jacket_jacket_style"];
$jacket_lapel_style = $row1["jacket_lapel_style"];
$jacket_lapel_width = $row1["jacket_lapel_width"];
$jacket_lapel_move = $row1["jacket_lapel_move"];
$jacket_lapel_color = $row1["jacket_lapel_color"];
$jacket_real_lapel_boutonniere = $row1["jacket_real_lapel_boutonniere"];
$jacket_vent_style = $row1["jacket_vent_style"];
$jacket_pocket_style = $row1["jacket_pocket_style"];
$jacket_chest_pocket = $row1["jacket_chest_pocket"];
$jacket_shoulder_construction = $row1["jacket_shoulder_construction"];
$jacket_sleeve_button = $row1["jacket_sleeve_button"];
$jacket_cuff = $row1["jacket_cuff"];
$jacket_all_sleevebutton_holes_color = $row1["jacket_all_sleevebutton_holes_color"];
$jacket_contrast_last_sleevebutton_holes_color = $row1["jacket_contrast_last_sleevebutton_holes_color"];
$jacket_contrast_last_sleevebutton_holes_button = $row1["jacket_contrast_last_sleevebutton_holes_button"];
$jacket_lining_style = $row1["jacket_lining_style"];
$jacket_canvas = $row1["jacket_canvas"];
$jacket_jacket_thread_on_button = $row1["jacket_jacket_thread_on_button"];
$jacket_jacket_button_hole_color = $row1["jacket_jacket_button_hole_color"];
$jacket_pick_stitch = $row1["jacket_pick_stitch"];
$jacket_pick_stitch_lapel_color = $row1["jacket_pick_stitch_lapel_color"];
$jacket_real_lapel_boutonniere = $row1["jacket_real_lapel_boutonniere"];
$jacket_pick_stitch_pocket_color = $row1["jacket_pick_stitch_pocket_color"];
$jacket_pick_stitch_sleeves = $row1["jacket_pick_stitch_sleeves"];
$jacket_pick_stitch_vest = $row1["jacket_pick_stitch_vest"];
$jacket_embroidery_inside_initial_or_name = $row1["jacket_embroidery_inside_initial_or_name"];
$jacket_embroidery_inside_color = $row1["jacket_embroidery_inside_color"];
$jacket_embroidery_inside_design = $row1["jacket_embroidery_inside_design"];
$jacket_embroidery_collar_initial_or_name = $row1["jacket_embroidery_collar_initial_or_name"];
$jacket_embroidery_collar_color = $row1["jacket_embroidery_collar_color"];
$jacket_embroidery_collar_design = $row1["jacket_embroidery_collar_design"];
$jacket_brand = $row1["jacket_brand"];
$jacket_elbow_patch = $row1["jacket_elbow_patch"];
$jacket_collar_felt_color = $row1["jacket_collar_felt_color"];

/*MEASUREMENTS*/
$jacket_jacket_measurement_sex = $row2["jacket_jacket_measurement_sex"];
$jacket_jacket_measurement_fit = $row2["jacket_jacket_measurement_fit"];
$jacket_jacket_measurement = $row2["jacket_jacket_measurement"];
$jacket_jacket_measurement_jacket_length = $row2["jacket_jacket_measurement_jacket_length"];
$jacket_jacket_measurement_back_lenght = $row2["jacket_jacket_measurement_back_lenght"];
$jacket_jacket_measurement_chest = $row2["jacket_jacket_measurement_chest"];
$jacket_jacket_measurement_waist_upper = $row2["jacket_jacket_measurement_waist_upper"];
$jacket_jacket_measurement_waist_lower = $row2["jacket_jacket_measurement_waist_lower"];
$jacket_jacket_measurement_hips = $row2["jacket_jacket_measurement_hips"];
$jacket_jacket_measurement_shoulders = $row2["jacket_jacket_measurement_shoulders"];
$jacket_jacket_measurement_neck = $row2["jacket_jacket_measurement_neck"];
$jacket_jacket_measurement_ptp_front = $row2["jacket_jacket_measurement_ptp_front"];
$jacket_jacket_measurement_ptp_back = $row2["jacket_jacket_measurement_ptp_back"];
$jacket_jacket_measurement_arm_hole = $row2["jacket_jacket_measurement_arm_hole"];
$jacket_jacket_measurement_biceps = $row2["jacket_jacket_measurement_biceps"];
$jacket_jacket_measurement_sleeves_right = $row2["jacket_jacket_measurement_sleeves_right"];
$jacket_jacket_measurement_sleeves_left = $row2["jacket_jacket_measurement_sleeves_left"];
$jacket_jacket_measurement_wrist_right = $row2["jacket_jacket_measurement_wrist_right"];
$jacket_jacket_measurement_wrist_left = $row2["jacket_jacket_measurement_wrist_left"];
$jacket_jacket_measurement_first_button = $row2["jacket_jacket_measurement_first_button"];
$jacket_jacket_measurement_shoulder_upper_wrist = $row2["jacket_jacket_measurement_shoulder_upper_wrist"];
$jacket_jacket_measurement_shoulder_lower_wrist = $row2["jacket_jacket_measurement_shoulder_lower_wrist"];
$jacket_measurement_jacket_shoulder = $row2["jacket_measurement_jacket_shoulder"];
$jacket_measurement_jacket_waist = $row2["jacket_measurement_jacket_waist"];
$jacket_measurement_jacket_chest = $row2["jacket_measurement_jacket_chest"];
$jacket_body_front = $row2["jacket_body_front"];
$jacket_body_left = $row2["jacket_body_left"];
$jacket_body_right = $row2["jacket_body_right"];
$jacket_body_back = $row2["jacket_body_back"];
$jacket_remark = $row2["jacket_remark"];

/*ECT*/
$jacket_date = date("m/d/Y");
$jacket_time = date("H:i:s");
$jacket_ip = $_POST['ip'];
$jacket_status = T;

/*PRODUCT*/
$order_product = $row3['order_product'];

$sql7 =	" INSERT INTO customize_order (id, order_id, product_id, order_reseller, order_order_no, order_name_customize, order_price, order_product, order_fabric_no, order_date, order_time, order_ip, order_status) VALUES ('$id_order', '$order_id_same', '$product_id', '$company_user', '$jacket_order_no', '$jacket_customer_name', '$jacket_price_1', '$order_product', '$jacket_fabric_no_1', '$jacket_date', '$jacket_time', '$jacket_ip', '$jacket_status') ";
$query7 = mysql_query($sql7) or die("Can't Query7");

$sql8 = " INSERT INTO customize_jacket_design (id, order_id, product_id, jacket_customer_name, jacket_order_no, jacket_order_date, jacket_delivery_date, jacket_fabric_no, jacket_lining_no, jacket_jacket_style, jacket_lapel_style, jacket_lapel_width, jacket_lapel_move, jacket_lapel_color, jacket_real_lapel_boutonniere, jacket_vent_style, jacket_pocket_style, jacket_chest_pocket, jacket_shoulder_construction, jacket_sleeve_button, jacket_cuff, jacket_all_sleevebutton_holes_color, jacket_contrast_last_sleevebutton_holes_color, jacket_contrast_last_sleevebutton_holes_button, jacket_lining_style, jacket_canvas, jacket_jacket_button_number, jacket_jacket_thread_on_button, jacket_jacket_button_hole_color, jacket_pick_stitch, jacket_pick_stitch_lapel_color, jacket_pick_stitch_pocket_color, jacket_pick_stitch_sleeves, jacket_pick_stitch_vest, jacket_embroidery_inside_initial_or_name, jacket_embroidery_inside_color, jacket_embroidery_inside_design, jacket_embroidery_collar_initial_or_name, jacket_embroidery_collar_color, jacket_embroidery_collar_design, jacket_brand, jacket_elbow_patch, jacket_collar_felt_color, jacket_date, jacket_time, jacket_ip, jacket_status) VALUES ('$id_jacket', '$order_id_same', '$product_id', '$jacket_customer_name', '$jacket_order_no', '$jacket_order_date', '$jacket_delivery_date', '$jacket_fabric_no_1', '$jacket_lining_no_1', '$jacket_jacket_style', '$jacket_lapel_style', '$jacket_lapel_width', '$jacket_lapel_move', '$jacket_lapel_color', '$jacket_real_lapel_boutonniere', '$jacket_vent_style', '$jacket_pocket_style', '$jacket_chest_pocket', '$jacket_shoulder_construction', '$jacket_sleeve_button', '$jacket_cuff', '$jacket_all_sleevebutton_holes_color', '$jacket_contrast_last_sleevebutton_holes_color', '$jacket_contrast_last_sleevebutton_holes_button', '$jacket_lining_style', '$jacket_canvas', '$jacket_jacket_button_number', '$jacket_jacket_thread_on_button', '$jacket_jacket_button_hole_color', '$jacket_pick_stitch', '$jacket_pick_stitch_lapel_color', '$jacket_pick_stitch_pocket_color', '$jacket_pick_stitch_sleeves', '$jacket_pick_stitch_vest', '$jacket_embroidery_inside_initial_or_name', '$jacket_embroidery_inside_color', '$jacket_embroidery_inside_design', '$jacket_embroidery_collar_initial_or_name', '$jacket_embroidery_collar_color', '$jacket_embroidery_collar_design', '$jacket_brand', '$jacket_elbow_patch', '$jacket_collar_felt_color', '$jacket_date', '$jacket_time', '$jacket_ip', '$jacket_status') ";
$query8 = mysql_query($sql8) or die("Can't Query8");

$sql9 = " INSERT INTO customize_jacket_measurements (id, order_id, product_id, jacket_jacket_measurement_sex, jacket_jacket_measurement_fit, jacket_jacket_measurement, jacket_jacket_measurement_jacket_length, jacket_jacket_measurement_back_lenght, jacket_jacket_measurement_chest, jacket_jacket_measurement_waist_upper, jacket_jacket_measurement_waist_lower, jacket_jacket_measurement_hips, jacket_jacket_measurement_shoulders, jacket_jacket_measurement_neck, jacket_jacket_measurement_ptp_front, jacket_jacket_measurement_ptp_back, jacket_jacket_measurement_arm_hole, jacket_jacket_measurement_biceps, jacket_jacket_measurement_sleeves_right, jacket_jacket_measurement_sleeves_left, jacket_jacket_measurement_wrist_right, jacket_jacket_measurement_wrist_left, jacket_jacket_measurement_first_button, jacket_jacket_measurement_shoulder_upper_wrist, jacket_jacket_measurement_shoulder_lower_wrist, jacket_measurement_jacket_shoulder, jacket_measurement_jacket_waist, jacket_measurement_jacket_chest, jacket_body_front, jacket_body_left, jacket_body_right, jacket_body_back, jacket_remark, jacket_date, jacket_time, jacket_ip, jacket_status) VALUES ('$id_jacket', '$order_id_same', '$product_id', '$jacket_jacket_measurement_sex', '$jacket_jacket_measurement_fit', '$jacket_jacket_measurement', '$jacket_jacket_measurement_jacket_length', '$jacket_jacket_measurement_back_lenght', '$jacket_jacket_measurement_chest', '$jacket_jacket_measurement_waist_upper', '$jacket_jacket_measurement_waist_lower', '$jacket_jacket_measurement_hips', '$jacket_jacket_measurement_shoulders', '$jacket_jacket_measurement_neck', '$jacket_jacket_measurement_ptp_front', '$jacket_jacket_measurement_ptp_back', '$jacket_jacket_measurement_arm_hole', '$jacket_jacket_measurement_biceps', '$jacket_jacket_measurement_sleeves_right', '$jacket_jacket_measurement_sleeves_left', '$jacket_jacket_measurement_wrist_right', '$jacket_jacket_measurement_wrist_left', '$jacket_jacket_measurement_first_button', '$jacket_jacket_measurement_shoulder_upper_wrist', '$jacket_jacket_measurement_shoulder_lower_wrist', '$jacket_measurement_jacket_shoulder', '$jacket_measurement_jacket_waist', '$jacket_measurement_jacket_chest', '$jacket_body_front', '$jacket_body_left', '$jacket_body_right', '$jacket_body_back', '$jacket_remark', '$jacket_date', '$jacket_time', '$jacket_ip', '$jacket_status') ";
$query9 = mysql_query($sql9) or die("Can't Query9");

if($query9) {
	
	echo " <script language='javascript'> window.location='../../../cart/single/index.php?orderid=".$order_id_same."'; </script> ";
	
}

mysql_close();
?>