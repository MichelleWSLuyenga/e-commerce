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

$order_product = overcoat;
$order_id = $_POST["overcoat_orderid"];
$product_id = $_POST["overcoat_productid"];

/*FABRIC*/
$overcoat_fabric_no_1 = $_POST["overcoat_fabric_no_1"];
$overcoat_lining_no_1 = $_POST["overcoat_lining_no_1"];

$sql1 =	" SELECT * FROM admin_fabrics_overcoat WHERE fabricno = '$overcoat_fabric_no_1' ";
$query1 = mysql_db_query($dbname, $sql1) or die("Can't Query1");
$row1 = mysql_fetch_array($query1);
$fabrics_type = $row1["type"];
$fabrics_brand = $row1["brand"];

if ($row1["type"] != '') {

$sql01 = " SELECT `fabrictype_".$id_user."` FROM admin_fabrictype WHERE fabrictype_name = '$fabrics_type' AND fabrictype_product = 'Overcoat' ";
$query01 = mysql_db_query($dbname, $sql01) or die("Can't Query01");
$row01 = mysql_fetch_array($query01);
$overcoat_fabric_price_1 = $row01["0"];

} else if ($row1["brand"] != '') {
	
$sql02 = " SELECT `fabricbrand_".$id_user."` FROM admin_fabricbrand WHERE fabricbrand_name = '$fabrics_brand' AND fabricbrand_product = 'Overcoat' ";
$query02 = mysql_db_query($dbname, $sql02) or die("Can't Query02");
$row02 = mysql_fetch_array($query02);	
$overcoat_fabric_price_1 = $row02["0"];
	
}

/*OTHER PRICING PARAMETERS*/
$overcoat_overcoat_measurement_chest = $_POST["overcoat_overcoat_measurement_chest"];
$overcoat_overcoat_measurement_waist_only = $_POST["overcoat_overcoat_measurement_waist_only"];
$overcoat_overcoat_measurement_hips = $_POST["overcoat_overcoat_measurement_hips"];

if (($overcoat_overcoat_measurement_chest >= '50' && $overcoat_overcoat_measurement_chest <= '52') || ($overcoat_overcoat_measurement_waist_only >= '50' && $overcoat_overcoat_measurement_waist_only <= '52') || ($overcoat_overcoat_measurement_hips >= '50' && $overcoat_overcoat_measurement_hips <= '52')) {
	
	$price_size_1 = $overcoat_fabric_price_1 * 20;
	$price_size_2 = $price_size_1 / 100;
	$price_size_3 = $price_size_2 + $overcoat_fabric_price_1;
	
} else if (($overcoat_overcoat_measurement_chest >= '52.5' && $overcoat_overcoat_measurement_chest <= '56') || ($overcoat_overcoat_measurement_waist_only >= '52.5' && $overcoat_overcoat_measurement_waist_only <= '56') || ($overcoat_overcoat_measurement_hips >= '52.5' && $overcoat_overcoat_measurement_hips <= '56')) {
	
	$price_size_1 = $overcoat_fabric_price_1 * 30;
	$price_size_2 = $price_size_1 / 100;
	$price_size_3 = $price_size_2 + $overcoat_fabric_price_1;
	
} else if (($overcoat_overcoat_measurement_chest >= '56.5' && $overcoat_overcoat_measurement_chest <= '60') || ($overcoat_overcoat_measurement_waist_only >= '56.5' && $overcoat_overcoat_measurement_waist_only <= '60') || ($overcoat_overcoat_measurement_hips >= '56.5' && $overcoat_overcoat_measurement_hips <= '60')) {
	
	$price_size_1 = $overcoat_fabric_price_1 * 40;
	$price_size_2 = $price_size_1 / 100;
	$price_size_3 = $price_size_2 + $overcoat_fabric_price_1;
	
} else if (($overcoat_overcoat_measurement_chest >= '60.5' && $overcoat_overcoat_measurement_chest <= '64') || ($overcoat_overcoat_measurement_waist_only >= '60.5' && $overcoat_overcoat_measurement_waist_only <= '64') || ($overcoat_overcoat_measurement_hips >= '60.5' && $overcoat_overcoat_measurement_hips <= '64')) {
	
	$price_size_1 = $overcoat_fabric_price_1 * 50;
	$price_size_2 = $price_size_1 / 100;
	$price_size_3 = $price_size_2 + $overcoat_fabric_price_1;
	
} else if (($overcoat_overcoat_measurement_chest >= '64.5' && $overcoat_overcoat_measurement_chest <= '68') || ($overcoat_overcoat_measurement_waist_only >= '64.5' && $overcoat_overcoat_measurement_waist_only <= '68') || ($overcoat_overcoat_measurement_hips >= '64.5' && $overcoat_overcoat_measurement_hips <= '68')) {
	
	$price_size_1 = $overcoat_fabric_price_1 * 60;
	$price_size_2 = $price_size_1 / 100;
	$price_size_3 = $price_size_2 + $overcoat_fabric_price_1;
	
}  else {
	
	$price_size_3 = $overcoat_fabric_price_1;
	
}

/*BUTTON*/
$overcoat_overcoat_button_number = $_POST["overcoat_overcoat_button_number"];

$sql2 = " SELECT price FROM admin_buttons_overcoat WHERE buttonno = '$overcoat_overcoat_button_number' ";
$query2 = mysql_db_query($dbname, $sql2) or die("Can't Query2");
$row2 = mysql_fetch_array($query2);
$overcoat_button_price = $row2["price"];

$overcoat_button_price_1 = $price_size_3 + $overcoat_button_price;

$overcoat_sleeve_button = $_POST["overcoat_sleeve_button"];
if ($overcoat_sleeve_button == "1") {
	$overcoat_sleeve_button_price = 0;
} else if ($overcoat_sleeve_button == "2") {
	$sqlprice1 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Sleeve Button Tape' ";
	$queryprice1 = mysql_db_query($dbname, $sqlprice1) or die("Can't QueryPrice1");
	$rowprice1 = mysql_fetch_array($queryprice1);
	$overcoat_sleeve_button_price_extra = $rowprice1["0"];
	$overcoat_sleeve_button_price = $overcoat_sleeve_button_price_extra;
}

$overcoat_apaulettes = $_POST["overcoat_apaulettes"];
if ($overcoat_apaulettes != "0") {
	$overcoat_apaulettes_price = 0;
} else if ($overcoat_apaulettes == "0") {
	$sqlprice2 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Shoulder Apaulettes' ";
	$queryprice2 = mysql_db_query($dbname, $sqlprice2) or die("Can't QueryPrice2");
	$rowprice2 = mysql_fetch_array($queryprice2);
	$overcoat_apaulettes_price_extra = $rowprice2["0"];
	$overcoat_apaulettes_price = $overcoat_apaulettes_price_extra;
}

$overcoat_belt = $_POST["overcoat_belt"];
if ($overcoat_belt != "1") {
	$overcoat_belt_loose_price = 0;
} else if ($overcoat_belt == "1") {
	$sqlprice3 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Belt Loose' ";
	$queryprice3 = mysql_db_query($dbname, $sqlprice3) or die("Can't QueryPrice3");
	$rowprice3 = mysql_fetch_array($queryprice3);
	$overcoat_belt_loose_price_extra = $rowprice3["0"];
	$overcoat_belt_loose_price = $overcoat_belt_loose_price_extra;
}

$overcoat_belt = $_POST["overcoat_belt"];
if ($overcoat_belt != "2") {
	$overcoat_belt_sewed_price = 0;
} else if ($overcoat_belt == "2") {
	$sqlprice4 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Belt Sewed' ";
	$queryprice4 = mysql_db_query($dbname, $sqlprice4) or die("Can't QueryPrice4");
	$rowprice4 = mysql_fetch_array($queryprice4);
	$overcoat_belt_sewed_price_extra = $rowprice4["0"];
	$overcoat_belt_sewed_price = $overcoat_belt_sewed_price_extra;
}

$overcoat_price_1 = $overcoat_button_price_1 + $overcoat_sleeve_button_price + $overcoat_apaulettes_price + $overcoat_belt_loose_price + $overcoat_belt_sewed_price;

/*MY PRICES*/

$sqlmy1 =	" SELECT * FROM admin_fabrics_overcoat WHERE fabricno = '$overcoat_fabric_no_1' ";
$querymy1 = mysql_db_query($dbname, $sqlmy1) or die("Can't Querymy1");
$rowmy1 = mysql_fetch_array($querymy1);
$fabrics_my_type = $rowmy1["type"];
$fabrics_my_brand = $rowmy1["brand"];

if ($rowmy1["type"] != '') {

$sqlmy01 = " SELECT `fabrictypereseller_".$id_user."` FROM admin_fabrictype WHERE fabrictype_name = '$fabrics_my_type' AND fabrictype_product = 'Overcoat' ";
$querymy01 = mysql_db_query($dbname, $sqlmy01) or die("Can't Querymy01");
$rowmy01 = mysql_fetch_array($querymy01);
$overcoat_fabric_my_price_1 = $rowmy01["0"];

} else if ($rowmy1["brand"] != '') {
	
$sqlmy02 = " SELECT `fabricbrand_".$id_user."` FROM admin_fabricbrand WHERE fabricbrand_name = '$fabrics_my_brand' AND fabricbrand_product = 'Overcoat' ";
$querymy02 = mysql_db_query($dbname, $sqlmy02) or die("Can't Querymy02");
$rowmy02 = mysql_fetch_array($querymy02);	
$overcoat_fabric_my_price_1 = $rowmy02["0"];
	
}

/*OTHER PRICING PARAMETERS*/
$overcoat_overcoat_measurement_chest = $_POST["overcoat_overcoat_measurement_chest"];
$overcoat_overcoat_measurement_waist_only = $_POST["overcoat_overcoat_measurement_waist_only"];
$overcoat_overcoat_measurement_hips = $_POST["overcoat_overcoat_measurement_hips"];

if (($overcoat_overcoat_measurement_chest >= '50' && $overcoat_overcoat_measurement_chest <= '52') || ($overcoat_overcoat_measurement_waist_only >= '50' && $overcoat_overcoat_measurement_waist_only <= '52') || ($overcoat_overcoat_measurement_hips >= '50' && $overcoat_overcoat_measurement_hips <= '52')) {
	
	$price_my_size_1 = $overcoat_fabric_my_price_1 * 20;
	$price_my_size_2 = $price_my_size_1 / 100;
	$price_my_size_3 = $price_my_size_2 + $overcoat_fabric_my_price_1;
	
} else if (($overcoat_overcoat_measurement_chest >= '52.5' && $overcoat_overcoat_measurement_chest <= '56') || ($overcoat_overcoat_measurement_waist_only >= '52.5' && $overcoat_overcoat_measurement_waist_only <= '56') || ($overcoat_overcoat_measurement_hips >= '52.5' && $overcoat_overcoat_measurement_hips <= '56')) {
	
	$price_my_size_1 = $overcoat_fabric_my_price_1 * 30;
	$price_my_size_2 = $price_my_size_1 / 100;
	$price_my_size_3 = $price_my_size_2 + $overcoat_fabric_my_price_1;
	
} else if (($overcoat_overcoat_measurement_chest >= '56.5' && $overcoat_overcoat_measurement_chest <= '60') || ($overcoat_overcoat_measurement_waist_only >= '56.5' && $overcoat_overcoat_measurement_waist_only <= '60') || ($overcoat_overcoat_measurement_hips >= '56.5' && $overcoat_overcoat_measurement_hips <= '60')) {
	
	$price_my_size_1 = $overcoat_fabric_my_price_1 * 40;
	$price_my_size_2 = $price_my_size_1 / 100;
	$price_my_size_3 = $price_my_size_2 + $overcoat_fabric_my_price_1;
	
} else if (($overcoat_overcoat_measurement_chest >= '60.5' && $overcoat_overcoat_measurement_chest <= '64') || ($overcoat_overcoat_measurement_waist_only >= '60.5' && $overcoat_overcoat_measurement_waist_only <= '64') || ($overcoat_overcoat_measurement_hips >= '60.5' && $overcoat_overcoat_measurement_hips <= '64')) {
	
	$price_my_size_1 = $overcoat_fabric_my_price_1 * 50;
	$price_my_size_2 = $price_my_size_1 / 100;
	$price_my_size_3 = $price_my_size_2 + $overcoat_fabric_my_price_1;
	
} else if (($overcoat_overcoat_measurement_chest >= '64.5' && $overcoat_overcoat_measurement_chest <= '68') || ($overcoat_overcoat_measurement_waist_only >= '64.5' && $overcoat_overcoat_measurement_waist_only <= '68') || ($overcoat_overcoat_measurement_hips >= '64.5' && $overcoat_overcoat_measurement_hips <= '68')) {
	
	$price_my_size_1 = $overcoat_fabric_my_price_1 * 60;
	$price_my_size_2 = $price_my_size_1 / 100;
	$price_my_size_3 = $price_my_size_2 + $overcoat_fabric_my_price_1;
	
}  else {
	
	$price_my_size_3 = $overcoat_fabric_my_price_1;
	
}

/*BUTTON*/
$overcoat_overcoat_button_number = $_POST["overcoat_overcoat_button_number"];

$sql2 = " SELECT price FROM admin_buttons_overcoat WHERE buttonno = '$overcoat_overcoat_button_number' ";
$query2 = mysql_db_query($dbname, $sql2) or die("Can't Query2");
$row2 = mysql_fetch_array($query2);
$overcoat_button_my_price = $row2["price"];

$overcoat_button_my_price_1 = $price_my_size_3 + $overcoat_button_my_price;

$overcoat_sleeve_button = $_POST["overcoat_sleeve_button"];
if ($overcoat_sleeve_button == "1") {
	$overcoat_sleeve_button_price = 0;
} else if ($overcoat_sleeve_button == "2") {
	$sqlprice1 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Sleeve Button Tape' ";
	$queryprice1 = mysql_db_query($dbname, $sqlprice1) or die("Can't QueryPrice1");
	$rowprice1 = mysql_fetch_array($queryprice1);
	$overcoat_sleeve_button_my_price_extra = $rowprice1["0"];
	$overcoat_sleeve_button_my_price = $overcoat_sleeve_button_my_price_extra;
}

$overcoat_apaulettes = $_POST["overcoat_apaulettes"];
if ($overcoat_apaulettes != "0") {
	$overcoat_apaulettes_price = 0;
} else if ($overcoat_apaulettes == "0") {
	$sqlprice2 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Shoulder Apaulettes' ";
	$queryprice2 = mysql_db_query($dbname, $sqlprice2) or die("Can't QueryPrice2");
	$rowprice2 = mysql_fetch_array($queryprice2);
	$overcoat_apaulettes_my_price_extra = $rowprice2["0"];
	$overcoat_apaulettes_my_price = $overcoat_apaulettes_my_price_extra;
}

$overcoat_belt = $_POST["overcoat_belt"];
if ($overcoat_belt != "1") {
	$overcoat_belt_loose_price = 0;
} else if ($overcoat_belt == "1") {
	$sqlprice3 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Belt Loose' ";
	$queryprice3 = mysql_db_query($dbname, $sqlprice3) or die("Can't QueryPrice3");
	$rowprice3 = mysql_fetch_array($queryprice3);
	$overcoat_belt_loose_my_price_extra = $rowprice3["0"];
	$overcoat_belt_loose_my_price = $overcoat_belt_loose_my_price_extra;
}

$overcoat_belt = $_POST["overcoat_belt"];
if ($overcoat_belt != "2") {
	$overcoat_belt_sewed_price = 0;
} else if ($overcoat_belt == "2") {
	$sqlprice4 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Belt Sewed' ";
	$queryprice4 = mysql_db_query($dbname, $sqlprice4) or die("Can't QueryPrice4");
	$rowprice4 = mysql_fetch_array($queryprice4);
	$overcoat_belt_sewed_my_price_extra = $rowprice4["0"];
	$overcoat_belt_sewed_my_price = $overcoat_belt_sewed_my_price_extra;
}

$overcoat_my_price_1 = $overcoat_button_my_price_1 + $overcoat_sleeve_button_my_price + $overcoat_apaulettes_my_price + $overcoat_belt_loose_my_price + $overcoat_belt_sewed_my_price;

/*CUSTOMER*/
$overcoat_customer_name = $_POST["overcoat_customer_name"];
$overcoat_order_no = $_POST["overcoat_order_no"];
$overcoat_order_date = date("m/d/Y");
$overcoat_delivery_date = $_POST["overcoat_delivery_date"];

/*CUSTOMIZE*/
$overcoat_overcoat_style = $_POST["overcoat_overcoat_style"];
$overcoat_lapel_style = $_POST["overcoat_lapel_style"];
$overcoat_shoulder_construction = $_POST["overcoat_shoulder_construction"];
$overcoat_real_lapel_boutonniere = $_POST["overcoat_real_lapel_boutonniere"];
$overcoat_pocket_style = $_POST["overcoat_pocket_style"];
$overcoat_chest_pocket = $_POST["overcoat_chest_pocket"];
$overcoat_sleeve_button = $_POST["overcoat_sleeve_button"];
$overcoat_cuff = $_POST["overcoat_cuff"];
$overcoat_all_sleevebutton_holes_color = $_POST["overcoat_all_sleevebutton_holes_color"];
$overcoat_contrast_last_sleevebutton_holes_color = $_POST["overcoat_contrast_last_sleevebutton_holes_color"];
$overcoat_apaulettes = $_POST["overcoat_apaulettes"];
$overcoat_belt = $_POST["overcoat_belt"];
$overcoat_vent_style = $_POST["overcoat_vent_style"];
$overcoat_lining_style = $_POST["overcoat_lining_style"];
$overcoat_overcoat_button_number = $_POST["overcoat_overcoat_button_number"];
$overcoat_overcoat_thread_on_button = $_POST["overcoat_overcoat_thread_on_button"];
$overcoat_overcoat_button_hole_color = $_POST["overcoat_overcoat_button_hole_color"];
$overcoat_pick_stitch_lapel_color = $_POST["overcoat_pick_stitch_lapel_color"];
$overcoat_pick_stitch_pocket_color = $_POST["overcoat_pick_stitch_pocket_color"];
$overcoat_embroidery_initial_or_name = $_POST["overcoat_embroidery_initial_or_name"];
$overcoat_embroidery_color = $_POST["overcoat_embroidery_color"];

/*MEASUREMENTS*/
$overcoat_overcoat_measurement_sex = $_POST["overcoat_overcoat_measurement_sex"];
$overcoat_overcoat_measurement_fit = $_POST["overcoat_overcoat_measurement_fit"];
$overcoat_overcoat_measurement = $_POST["overcoat_overcoat_measurement"];
$overcoat_overcoat_measurement_overcoat_length = $_POST["overcoat_overcoat_measurement_overcoat_length"];
$overcoat_overcoat_measurement_back_lenght = $_POST["overcoat_overcoat_measurement_back_lenght"];
$overcoat_overcoat_measurement_shoulders = $_POST["overcoat_overcoat_measurement_shoulders"];
$overcoat_overcoat_measurement_neck = $_POST["overcoat_overcoat_measurement_neck"];
$overcoat_overcoat_measurement_ptp_front = $_POST["overcoat_overcoat_measurement_ptp_front"];
$overcoat_overcoat_measurement_ptp_back = $_POST["overcoat_overcoat_measurement_ptp_back"];
$overcoat_overcoat_measurement_arm_hole = $_POST["overcoat_overcoat_measurement_arm_hole"];
$overcoat_overcoat_measurement_biceps = $_POST["overcoat_overcoat_measurement_biceps"];
$overcoat_overcoat_measurement_sleeves_right = $_POST["overcoat_overcoat_measurement_sleeves_right"];
$overcoat_overcoat_measurement_sleeves_left = $_POST["overcoat_overcoat_measurement_sleeves_left"];
$overcoat_overcoat_measurement_wrist_right = $_POST["overcoat_overcoat_measurement_wrist_right"];
$overcoat_overcoat_measurement_wrist_left = $_POST["overcoat_overcoat_measurement_wrist_left"];
$overcoat_overcoat_measurement_first_button = $_POST["overcoat_overcoat_measurement_first_button"];
$overcoat_overcoat_measurement_shoulder_upper_wrist = $_POST["overcoat_overcoat_measurement_shoulder_upper_wrist"];
$overcoat_overcoat_measurement_shoulder_lower_wrist = $_POST["overcoat_overcoat_measurement_shoulder_lower_wrist"];
$overcoat_measurement_overcoat_shoulder = $_POST["overcoat_measurement_overcoat_shoulder"];
$overcoat_measurement_overcoat_waist = $_POST["overcoat_measurement_overcoat_waist"];
$overcoat_measurement_overcoat_chest = $_POST["overcoat_measurement_overcoat_chest"];
$overcoat_body_front = $_POST["overcoat_body_front"];
$overcoat_body_left = $_POST["overcoat_body_left"];
$overcoat_body_right = $_POST["overcoat_body_right"];
$overcoat_body_back = $_POST["overcoat_body_back"];
$overcoat_remark = $_POST["overcoat_remark"];

/*ECT*/
$overcoat_date = date("m/d/Y");
$overcoat_time = date("H:i:s");
$overcoat_ip = $_POST['ip'];
$overcoat_status = T;

$sql3 =	" UPDATE customize_order SET order_reseller = '$company_user', order_order_no = '$overcoat_order_no', order_name_customize = '$overcoat_customer_name', order_my_price = '$overcoat_my_price_1', order_price = '$overcoat_price_1', order_product = '$order_product', order_fabric_no = '$overcoat_fabric_no_1', order_date = '$overcoat_date', order_time = '$overcoat_time', order_ip = '$overcoat_ip', order_status = '$overcoat_status' WHERE order_id = '$order_id' AND product_id = '$product_id' ";
$query3 = mysql_query($sql3) or die("Can't Query3");

$sql4 = " UPDATE customize_overcoat_design SET overcoat_customer_name = '$overcoat_customer_name', overcoat_order_no = '$overcoat_order_no', overcoat_order_date = '$overcoat_order_date', overcoat_delivery_date = '$overcoat_delivery_date', overcoat_fabric_no = '$overcoat_fabric_no_1', overcoat_lining_no = '$overcoat_lining_no_1', overcoat_overcoat_style = '$overcoat_overcoat_style', overcoat_lapel_style = '$overcoat_lapel_style', overcoat_shoulder_construction = '$overcoat_shoulder_construction', overcoat_real_lapel_boutonniere = '$overcoat_real_lapel_boutonniere', overcoat_pocket_style = '$overcoat_pocket_style', overcoat_chest_pocket = '$overcoat_chest_pocket', overcoat_sleeve_button = '$overcoat_sleeve_button', overcoat_cuff = '$overcoat_cuff', overcoat_all_sleevebutton_holes_color = '$overcoat_all_sleevebutton_holes_color', overcoat_contrast_last_sleevebutton_holes_color = '$overcoat_contrast_last_sleevebutton_holes_color', overcoat_apaulettes = '$overcoat_apaulettes', overcoat_belt = '$overcoat_belt', overcoat_vent_style = '$overcoat_vent_style', overcoat_lining_style = '$overcoat_lining_style', overcoat_overcoat_button_number = '$overcoat_overcoat_button_number', overcoat_overcoat_thread_on_button = '$overcoat_overcoat_thread_on_button', overcoat_overcoat_button_hole_color = '$overcoat_overcoat_button_hole_color', overcoat_pick_stitch_lapel_color = '$overcoat_pick_stitch_lapel_color', overcoat_pick_stitch_pocket_color = '$overcoat_pick_stitch_pocket_color', overcoat_embroidery_initial_or_name = '$overcoat_embroidery_initial_or_name', overcoat_embroidery_color = '$overcoat_embroidery_color', overcoat_date = '$overcoat_date', overcoat_time = '$overcoat_time', overcoat_ip = '$overcoat_ip', overcoat_status = '$overcoat_status' WHERE order_id = '$order_id' AND product_id = '$product_id' ";
$query4 = mysql_query($sql4) or die("Can't Query4");

$sql5 = " UPDATE customize_overcoat_measurements SET overcoat_overcoat_measurement_sex = '$overcoat_overcoat_measurement_sex', overcoat_overcoat_measurement_fit = '$overcoat_overcoat_measurement_fit', overcoat_overcoat_measurement = '$overcoat_overcoat_measurement', overcoat_overcoat_measurement_overcoat_length = '$overcoat_overcoat_measurement_overcoat_length', overcoat_overcoat_measurement_back_lenght = '$overcoat_overcoat_measurement_back_lenght', overcoat_overcoat_measurement_chest = '$overcoat_overcoat_measurement_chest', overcoat_overcoat_measurement_waist_only = '$overcoat_overcoat_measurement_waist_only', overcoat_overcoat_measurement_hips = '$overcoat_overcoat_measurement_hips', overcoat_overcoat_measurement_shoulders = '$overcoat_overcoat_measurement_shoulders', overcoat_overcoat_measurement_neck = '$overcoat_overcoat_measurement_neck', overcoat_overcoat_measurement_ptp_front = '$overcoat_overcoat_measurement_ptp_front', overcoat_overcoat_measurement_ptp_back = '$overcoat_overcoat_measurement_ptp_back', overcoat_overcoat_measurement_arm_hole = '$overcoat_overcoat_measurement_arm_hole', overcoat_overcoat_measurement_biceps = '$overcoat_overcoat_measurement_biceps', overcoat_overcoat_measurement_sleeves_right = '$overcoat_overcoat_measurement_sleeves_right', overcoat_overcoat_measurement_sleeves_left = '$overcoat_overcoat_measurement_sleeves_left', overcoat_overcoat_measurement_wrist_right = '$overcoat_overcoat_measurement_wrist_right', overcoat_overcoat_measurement_wrist_left = '$overcoat_overcoat_measurement_wrist_left', overcoat_overcoat_measurement_first_button = '$overcoat_overcoat_measurement_first_button', overcoat_overcoat_measurement_shoulder_upper_wrist = '$overcoat_overcoat_measurement_shoulder_upper_wrist', overcoat_overcoat_measurement_shoulder_lower_wrist = '$overcoat_overcoat_measurement_shoulder_lower_wrist', overcoat_measurement_overcoat_shoulder = '$overcoat_measurement_overcoat_shoulder', overcoat_measurement_overcoat_waist = '$overcoat_measurement_overcoat_waist', overcoat_measurement_overcoat_chest = '$overcoat_measurement_overcoat_chest', overcoat_remark = '$overcoat_remark', overcoat_date = '$overcoat_date', overcoat_time = '$overcoat_time', overcoat_ip = '$overcoat_ip', overcoat_status = '$overcoat_status' WHERE order_id = '$order_id' AND product_id = '$product_id' ";
$query5 = mysql_query($sql5) or die("Can't Query5");

$path = "../../images/body/overcoat/front/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['overcoat_body_front']['name'];
	$tmp = $_FILES['overcoat_body_front']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$overcoat_body_front_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$overcoat_body_front_pic)){
				
				$sql6 = " UPDATE customize_overcoat_measurements SET overcoat_body_front = '".$overcoat_body_front_pic."', overcoat_date = '".$overcoat_date."', overcoat_time = '".$overcoat_time."', overcoat_ip = '".$overcoat_ip."', overcoat_status = '".$overcoat_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query6 = mysql_db_query($dbname, $sql6) or die("Can't Query6");
			}
    
	} else {
				$sql6 = " UPDATE customize_overcoat_measurements SET overcoat_date = '".$overcoat_date."', overcoat_time = '".$overcoat_time."', overcoat_ip = '".$overcoat_ip."', overcoat_status = '".$overcoat_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query6 = mysql_db_query($dbname, $sql6) or die("Can't Query6");
			}
	}
	
$path = "../../images/body/overcoat/left/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['overcoat_body_left']['name'];
	$tmp = $_FILES['overcoat_body_left']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$overcoat_body_left_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$overcoat_body_left_pic)){
				
				$sql7 = " UPDATE customize_overcoat_measurements SET overcoat_body_left = '".$overcoat_body_left_pic."', overcoat_date = '".$overcoat_date."', overcoat_time = '".$overcoat_time."', overcoat_ip = '".$overcoat_ip."', overcoat_status = '".$overcoat_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query7 = mysql_db_query($dbname, $sql7) or die("Can't Query7");
			}
    
	} else {
				$sql7 = " UPDATE customize_overcoat_measurements SET overcoat_date = '".$overcoat_date."', overcoat_time = '".$overcoat_time."', overcoat_ip = '".$overcoat_ip."', overcoat_status = '".$overcoat_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query7 = mysql_db_query($dbname, $sql7) or die("Can't Query7");
			}
	}
	
$path = "../../images/body/overcoat/right/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['overcoat_body_right']['name'];
	$tmp = $_FILES['overcoat_body_right']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$overcoat_body_right_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$overcoat_body_right_pic)){
				
				$sql8 = " UPDATE customize_overcoat_measurements SET overcoat_body_right = '".$overcoat_body_right_pic."', overcoat_date = '".$overcoat_date."', overcoat_time = '".$overcoat_time."', overcoat_ip = '".$overcoat_ip."', overcoat_status = '".$overcoat_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query8 = mysql_db_query($dbname, $sql8) or die("Can't Query8");
			}
    
	} else {
				$sql8 = " UPDATE customize_overcoat_measurements SET overcoat_date = '".$overcoat_date."', overcoat_time = '".$overcoat_time."', overcoat_ip = '".$overcoat_ip."', overcoat_status = '".$overcoat_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query8 = mysql_db_query($dbname, $sql8) or die("Can't Query8");
			}
	}
	
$path = "../../images/body/overcoat/back/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['overcoat_body_back']['name'];
	$tmp = $_FILES['overcoat_body_back']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$overcoat_body_back_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$overcoat_body_back_pic)){
				
				$sql9 = " UPDATE customize_overcoat_measurements SET overcoat_body_back = '".$overcoat_body_back_pic."', overcoat_date = '".$overcoat_date."', overcoat_time = '".$overcoat_time."', overcoat_ip = '".$overcoat_ip."', overcoat_status = '".$overcoat_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query9 = mysql_db_query($dbname, $sql9) or die("Can't Query9");
			}
    
	} else {
				$sql9 = " UPDATE customize_overcoat_measurements SET overcoat_date = '".$overcoat_date."', overcoat_time = '".$overcoat_time."', overcoat_ip = '".$overcoat_ip."', overcoat_status = '".$overcoat_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query9 = mysql_db_query($dbname, $sql9) or die("Can't Query9");
			}
	}

if($query9) {
	
	echo " <script language='javascript'> window.location='../../cart/multiple/index.php?orderid=".$order_id."'; </script> ";
	
}

mysql_close();
?>