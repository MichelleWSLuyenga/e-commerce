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
$overcoat_orderid = $_POST["overcoat_orderid"];

if ($overcoat_orderid != "") {
	
	$order_id = $overcoat_orderid;
	
} else if ($overcoat_orderid == "") {
	
	$sql1 =	" SELECT MAX(order_id) FROM customize_order";
	$query1 = mysql_db_query($dbname, $sql1) or die("Can't Query1");
	$row1 = mysql_fetch_array($query1);
	$order_id = $row1[0] + 1 ;
	
}

$sql2 =	" SELECT MAX(id) FROM customize_checkout ";
$query2 = mysql_db_query($dbname, $sql2) or die("Can't Query2");
$row2 = mysql_fetch_array($query2);
$id_customize_checkout = $row2[0] + 1 ;

/*FABRIC*/
$overcoat_fabric_no_1 = $_POST["overcoat_fabric_no_1"];
$overcoat_lining_no_1 = $_POST["overcoat_lining_no_1"];

$sql4 =	" SELECT * FROM admin_fabrics_overcoat WHERE fabricno = '$overcoat_fabric_no_1' ";
$query4 = mysql_db_query($dbname, $sql4) or die("Can't Query4");
$row4 = mysql_fetch_array($query4);
$fabrics_type = $row4["type"];
$fabrics_brand = $row4["brand"];

if ($row4["type"] != '') {

$sql01 = " SELECT `fabrictype_".$id_user."` FROM admin_fabrictype WHERE fabrictype_name = '$fabrics_type' AND fabrictype_product = 'Overcoat' ";
$query01 = mysql_db_query($dbname, $sql01) or die("Can't Query01");
$row01 = mysql_fetch_array($query01);
$overcoat_fabric_price_1 = $row01["0"];

} else if ($row4["brand"] != '') {
	
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

$sql10 = " SELECT price FROM admin_buttons_overcoat WHERE buttonno = '$overcoat_overcoat_button_number' ";
$query10 = mysql_db_query($dbname, $sql10) or die("Can't Query10");
$row10 = mysql_fetch_array($query10);
$overcoat_button_price = $row10["price"];

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

/*FABRIC 1*/
if ($overcoat_fabric_no_1 != "" && $overcoat_lining_no_1 != "") {

$sql11 = " SELECT MAX(id) FROM customize_order ";
$query11 = mysql_db_query($dbname, $sql11) or die("Can't Query11");
$row11 = mysql_fetch_array($query11);
$id_order = $row11[0] + 1 ;

$sql12 =	" SELECT MAX(product_id) FROM customize_order";
$query12 = mysql_db_query($dbname, $sql12) or die("Can't Query12");
$row12 = mysql_fetch_array($query12);
$product_id = $row12[0] + 1 ;

$sql13 =	" SELECT MAX(id) FROM customize_overcoat_design ";
$query13 = mysql_db_query($dbname, $sql13) or die("Can't Query13");
$row13 = mysql_fetch_array($query13);
$id_overcoat = $row13[0] + 1 ;

$sql14 = " INSERT INTO customize_order (id, order_id, product_id, order_reseller, order_order_no, order_name_customize, order_my_price, order_price, order_product, order_fabric_no, order_date, order_time, order_ip, order_status) VALUES ('$id_order', '$order_id', '$product_id', '$company_user', '$overcoat_order_no', '$overcoat_customer_name', '$overcoat_my_price_1', '$overcoat_price_1', '$order_product', '$overcoat_fabric_no_1', '$overcoat_date', '$overcoat_time', '$overcoat_ip', '$overcoat_status') ";
$query14 = mysql_query($sql14) or die("Can't Query14");

$sql15 = " INSERT INTO customize_overcoat_design (id, order_id, product_id, overcoat_customer_name, overcoat_order_no, overcoat_order_date, overcoat_delivery_date, overcoat_fabric_no, overcoat_lining_no, overcoat_overcoat_style, overcoat_lapel_style, overcoat_shoulder_construction, overcoat_real_lapel_boutonniere, overcoat_pocket_style, overcoat_chest_pocket, overcoat_sleeve_button, overcoat_cuff, overcoat_all_sleevebutton_holes_color, overcoat_contrast_last_sleevebutton_holes_color, overcoat_apaulettes, overcoat_belt, overcoat_vent_style, overcoat_lining_style, overcoat_overcoat_button_number, overcoat_overcoat_thread_on_button, overcoat_overcoat_button_hole_color, overcoat_pick_stitch_lapel_color, overcoat_pick_stitch_pocket_color, overcoat_embroidery_initial_or_name, overcoat_embroidery_color, overcoat_date, overcoat_time, overcoat_ip, overcoat_status) VALUES ('$id_overcoat', '$order_id', '$product_id', '$overcoat_customer_name', '$overcoat_order_no', '$overcoat_order_date', '$overcoat_delivery_date', '$overcoat_fabric_no_1', '$overcoat_lining_no_1', '$overcoat_overcoat_style', '$overcoat_lapel_style', '$overcoat_shoulder_construction', '$overcoat_real_lapel_boutonniere', '$overcoat_pocket_style', '$overcoat_chest_pocket', '$overcoat_sleeve_button', '$overcoat_cuff', '$overcoat_all_sleevebutton_holes_color', '$overcoat_contrast_last_sleevebutton_holes_color', '$overcoat_apaulettes', '$overcoat_belt', '$overcoat_vent_style', '$overcoat_lining_style', '$overcoat_overcoat_button_number', '$overcoat_overcoat_thread_on_button', '$overcoat_overcoat_button_hole_color', '$overcoat_pick_stitch_lapel_color', '$overcoat_pick_stitch_pocket_color', '$overcoat_embroidery_initial_or_name', '$overcoat_embroidery_color', '$overcoat_date', '$overcoat_time', '$overcoat_ip', '$overcoat_status') ";
$query15 = mysql_query($sql15) or die("Can't Query15");

$sql16 = " INSERT INTO customize_overcoat_measurements (id, order_id, product_id, overcoat_overcoat_measurement_sex, overcoat_overcoat_measurement_fit, overcoat_overcoat_measurement, overcoat_overcoat_measurement_overcoat_length, overcoat_overcoat_measurement_back_lenght, overcoat_overcoat_measurement_chest, overcoat_overcoat_measurement_waist_only, overcoat_overcoat_measurement_hips, overcoat_overcoat_measurement_shoulders, overcoat_overcoat_measurement_neck, overcoat_overcoat_measurement_ptp_front, overcoat_overcoat_measurement_ptp_back, overcoat_overcoat_measurement_arm_hole, overcoat_overcoat_measurement_biceps, overcoat_overcoat_measurement_sleeves_right, overcoat_overcoat_measurement_sleeves_left, overcoat_overcoat_measurement_wrist_right, overcoat_overcoat_measurement_wrist_left, overcoat_overcoat_measurement_first_button, overcoat_overcoat_measurement_shoulder_upper_wrist, overcoat_overcoat_measurement_shoulder_lower_wrist, overcoat_measurement_overcoat_shoulder, overcoat_measurement_overcoat_waist, overcoat_measurement_overcoat_chest, overcoat_remark, overcoat_date, overcoat_time, overcoat_ip, overcoat_status) VALUES ('$id_overcoat', '$order_id', '$product_id', '$overcoat_overcoat_measurement_sex', '$overcoat_overcoat_measurement_fit', '$overcoat_overcoat_measurement', '$overcoat_overcoat_measurement_overcoat_length', '$overcoat_overcoat_measurement_back_lenght', '$overcoat_overcoat_measurement_chest', '$overcoat_overcoat_measurement_waist_only', '$overcoat_overcoat_measurement_hips', '$overcoat_overcoat_measurement_shoulders', '$overcoat_overcoat_measurement_neck', '$overcoat_overcoat_measurement_ptp_front', '$overcoat_overcoat_measurement_ptp_back', '$overcoat_overcoat_measurement_arm_hole', '$overcoat_overcoat_measurement_biceps', '$overcoat_overcoat_measurement_sleeves_right', '$overcoat_overcoat_measurement_sleeves_left', '$overcoat_overcoat_measurement_wrist_right', '$overcoat_overcoat_measurement_wrist_left', '$overcoat_overcoat_measurement_first_button', '$overcoat_overcoat_measurement_shoulder_upper_wrist', '$overcoat_overcoat_measurement_shoulder_lower_wrist', '$overcoat_measurement_overcoat_shoulder', '$overcoat_measurement_overcoat_waist', '$overcoat_measurement_overcoat_chest', '$overcoat_remark', '$overcoat_date', '$overcoat_time', '$overcoat_ip', '$overcoat_status') ";
$query16 = mysql_query($sql16) or die("Can't Query16");

$path = "../../images/body/overcoat/front/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['overcoat_body_front']['name'];
	$tmp = $_FILES['overcoat_body_front']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$overcoat_body_front_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$overcoat_body_front_pic)){
				
				$sql17 = " UPDATE customize_overcoat_measurements SET overcoat_body_front = '".$overcoat_body_front_pic."', overcoat_date = '".$overcoat_date."', overcoat_time = '".$overcoat_time."', overcoat_ip = '".$overcoat_ip."', overcoat_status = '".$overcoat_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query17 = mysql_db_query($dbname, $sql17) or die("Can't Query17");
			}
    
	} else {
				$sql17 = " UPDATE customize_overcoat_measurements SET overcoat_date = '".$overcoat_date."', overcoat_time = '".$overcoat_time."', overcoat_ip = '".$overcoat_ip."', overcoat_status = '".$overcoat_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query17 = mysql_db_query($dbname, $sql17) or die("Can't Query17");
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
				
				$sql18 = " UPDATE customize_overcoat_measurements SET overcoat_body_left = '".$overcoat_body_left_pic."', overcoat_date = '".$overcoat_date."', overcoat_time = '".$overcoat_time."', overcoat_ip = '".$overcoat_ip."', overcoat_status = '".$overcoat_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query18 = mysql_db_query($dbname, $sql18) or die("Can't Query18");
			}
    
	} else {
				$sql18 = " UPDATE customize_overcoat_measurements SET overcoat_date = '".$overcoat_date."', overcoat_time = '".$overcoat_time."', overcoat_ip = '".$overcoat_ip."', overcoat_status = '".$overcoat_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query18 = mysql_db_query($dbname, $sql18) or die("Can't Query18");
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
				
				$sql19 = " UPDATE customize_overcoat_measurements SET overcoat_body_right = '".$overcoat_body_right_pic."', overcoat_date = '".$overcoat_date."', overcoat_time = '".$overcoat_time."', overcoat_ip = '".$overcoat_ip."', overcoat_status = '".$overcoat_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query19 = mysql_db_query($dbname, $sql19) or die("Can't Query19");
			}
    
	} else {
				$sql19 = " UPDATE customize_overcoat_measurements SET overcoat_date = '".$overcoat_date."', overcoat_time = '".$overcoat_time."', overcoat_ip = '".$overcoat_ip."', overcoat_status = '".$overcoat_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query19 = mysql_db_query($dbname, $sql19) or die("Can't Query19");
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
				
				$sql20 = " UPDATE customize_overcoat_measurements SET overcoat_body_back = '".$overcoat_body_back_pic."', overcoat_date = '".$overcoat_date."', overcoat_time = '".$overcoat_time."', overcoat_ip = '".$overcoat_ip."', overcoat_status = '".$overcoat_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query20 = mysql_db_query($dbname, $sql20) or die("Can't Query20");
			}
    
	} else {
				$sql20 = " UPDATE customize_overcoat_measurements SET overcoat_date = '".$overcoat_date."', overcoat_time = '".$overcoat_time."', overcoat_ip = '".$overcoat_ip."', overcoat_status = '".$overcoat_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query20 = mysql_db_query($dbname, $sql20) or die("Can't Query20");
			}
	}

} else if ($overcoat_fabric_no_1 == "" || $overcoat_lining_no_1 == "") { }

if ($overcoat_orderid != "") {
	
	$sql21 = " UPDATE customize_checkout SET checkout_company = '$company_user', checkout_order = '$overcoat_order_no', checkout_date = '$overcoat_date', checkout_time = '$overcoat_time', checkout_ip = '$overcoat_ip', checkout_status = '$overcoat_status' WHERE checkout_orderid = '$order_id' ";
	$query21 = mysql_query($sql21) or die("Can't Query21");
	
} else if ($overcoat_orderid == "") {
	
	$sql21 = " INSERT INTO customize_checkout (id, checkout_company, checkout_order, checkout_orderid, checkout_date, checkout_time, checkout_ip, checkout_status) VALUES ('$id_customize_checkout', '$company_user', '$overcoat_order_no', '$order_id', '$overcoat_date', '$overcoat_time', '$overcoat_ip', '$overcoat_status') ";
	$query21 = mysql_query($sql21) or die("Can't Query21");
	
}

if($query21) {
	
	echo " <script language='javascript'> window.location='../../cart/multiple/index.php?orderid=".$order_id."'; </script> ";
	
}

mysql_close();
?>