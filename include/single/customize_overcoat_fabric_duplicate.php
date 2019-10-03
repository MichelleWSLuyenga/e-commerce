
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

$order_id_same = $_POST["overcoat_orderid"];
$product_id_same = $_POST["overcoat_productid"];
	
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
$overcoat_fabric_no_1 = $_POST["overcoat_fabric_no_1"];
$overcoat_lining_no_1 = $_POST["overcoat_lining_no_1"];

$sql001 = " SELECT * FROM admin_fabrics_overcoat WHERE fabricno = '$overcoat_fabric_no_1' ";
$query001 = mysql_db_query($dbname, $sql001) or die("Can't Query001");
$row001 = mysql_fetch_array($query001);
$fabrics_type = $row001["type"];
$fabrics_brand = $row001["brand"];

if ($row001["type"] != '') {

$sql01 = " SELECT `fabrictype_".$id_user."` FROM admin_fabrictype WHERE fabrictype_name = '$fabrics_type' AND fabrictype_product = 'Overcoat' ";
$query01 = mysql_db_query($dbname, $sql01) or die("Can't Query01");
$row01 = mysql_fetch_array($query01);
$overcoat_fabric_price_1 = $row01["0"];

} else if ($row001["brand"] != '') {
	
$sql02 = " SELECT `fabricbrand_".$id_user."` FROM admin_fabricbrand WHERE fabricbrand_name = '$fabrics_brand' AND fabricbrand_product = 'Overcoat' ";
$query02 = mysql_db_query($dbname, $sql02) or die("Can't Query02");
$row02 = mysql_fetch_array($query02);	
$overcoat_fabric_price_1 = $row02["0"];
	
}

/*OTHER PRICING PARAMETERS*/
$overcoat_overcoat_measurement_chest = $row1["overcoat_overcoat_measurement_chest"];
$overcoat_overcoat_measurement_waist_only = $row1["overcoat_overcoat_measurement_waist_only"];
$overcoat_overcoat_measurement_hips = $row1["overcoat_overcoat_measurement_hips"];

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
$overcoat_overcoat_button_number = $row1["overcoat_overcoat_button_number"];

$sql002 = " SELECT price FROM admin_buttons_overcoat WHERE buttonno = '$overcoat_overcoat_button_number' ";
$query002 = mysql_db_query($dbname, $sql002) or die("Can't Query002");
$row002 = mysql_fetch_array($query002);
$overcoat_button_price = $row002["price"];

$overcoat_button_price_1 = $price_size_3 + $overcoat_button_price;

$overcoat_sleeve_button = $row1["overcoat_sleeve_button"];
if ($overcoat_sleeve_button == "1") {
	$overcoat_sleeve_button_price = 0;
} else if ($overcoat_sleeve_button == "2") {
	$sqlprice1 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Sleeve Button Tape' ";
	$queryprice1 = mysql_db_query($dbname, $sqlprice1) or die("Can't QueryPrice1");
	$rowprice1 = mysql_fetch_array($queryprice1);
	$overcoat_sleeve_button_price_extra = $rowprice1["0"];
	$overcoat_sleeve_button_price = $overcoat_sleeve_button_price_extra;
}

$overcoat_apaulettes = $row1["overcoat_apaulettes"];
if ($overcoat_apaulettes != "0") {
	$overcoat_apaulettes_price = 0;
} else if ($overcoat_apaulettes == "0") {
	$sqlprice2 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Shoulder Apaulettes' ";
	$queryprice2 = mysql_db_query($dbname, $sqlprice2) or die("Can't QueryPrice2");
	$rowprice2 = mysql_fetch_array($queryprice2);
	$overcoat_apaulettes_price_extra = $rowprice2["0"];
	$overcoat_apaulettes_price = $overcoat_apaulettes_price_extra;
}

$overcoat_belt = $row1["overcoat_belt"];
if ($overcoat_belt != "1") {
	$overcoat_belt_loose_price = 0;
} else if ($overcoat_belt == "1") {
	$sqlprice3 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Belt Loose' ";
	$queryprice3 = mysql_db_query($dbname, $sqlprice3) or die("Can't QueryPrice3");
	$rowprice3 = mysql_fetch_array($queryprice3);
	$overcoat_belt_loose_price_extra = $rowprice3["0"];
	$overcoat_belt_loose_price = $overcoat_belt_loose_price_extra;
}

$overcoat_belt = $row1["overcoat_belt"];
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

$sql7 =	" INSERT INTO customize_order (id, order_id, product_id, order_reseller, order_order_no, order_name_customize, order_my_price, order_price, order_product, order_fabric_no, order_date, order_time, order_ip, order_status) VALUES ('$id_order', '$order_id_same', '$product_id', '$company_user', '$overcoat_order_no', '$overcoat_customer_name', '$overcoat_my_price_1', '$overcoat_price_1', '$order_product', '$overcoat_fabric_no_1', '$overcoat_date', '$overcoat_time', '$overcoat_ip', '$overcoat_status') ";
$query7 = mysql_query($sql7) or die("Can't Query7");

$sql8 = " INSERT INTO customize_overcoat_design (id, order_id, product_id, overcoat_customer_name, overcoat_order_no, overcoat_order_date, overcoat_delivery_date, overcoat_fabric_no, overcoat_lining_no, overcoat_overcoat_style, overcoat_lapel_style, overcoat_shoulder_construction, overcoat_real_lapel_boutonniere, overcoat_pocket_style, overcoat_chest_pocket, overcoat_sleeve_button, overcoat_cuff, overcoat_all_sleevebutton_holes_color, overcoat_contrast_last_sleevebutton_holes_color, overcoat_apaulettes, overcoat_belt, overcoat_vent_style, overcoat_lining_style, overcoat_overcoat_button_number, overcoat_overcoat_thread_on_button, overcoat_overcoat_button_hole_color, overcoat_pick_stitch_lapel_color, overcoat_pick_stitch_pocket_color, overcoat_embroidery_initial_or_name, overcoat_embroidery_color, overcoat_date, overcoat_time, overcoat_ip, overcoat_status) VALUES ('$id_overcoat', '$order_id_same', '$product_id', '$overcoat_customer_name', '$overcoat_order_no', '$overcoat_order_date', '$overcoat_delivery_date', '$overcoat_fabric_no_1', '$overcoat_lining_no_1', '$overcoat_overcoat_style', '$overcoat_lapel_style', '$overcoat_shoulder_construction', '$overcoat_real_lapel_boutonniere', '$overcoat_pocket_style', '$overcoat_chest_pocket', '$overcoat_sleeve_button', '$overcoat_cuff', '$overcoat_all_sleevebutton_holes_color', '$overcoat_contrast_last_sleevebutton_holes_color', '$overcoat_apaulettes', '$overcoat_belt', '$overcoat_vent_style', '$overcoat_lining_style', '$overcoat_overcoat_button_number', '$overcoat_overcoat_thread_on_button', '$overcoat_overcoat_button_hole_color', '$overcoat_pick_stitch_lapel_color', '$overcoat_pick_stitch_pocket_color', '$overcoat_embroidery_initial_or_name', '$overcoat_embroidery_color', '$overcoat_date', '$overcoat_time', '$overcoat_ip', '$overcoat_status') ";
$query8 = mysql_query($sql8) or die("Can't Query8");

$sql9 = " INSERT INTO customize_overcoat_measurements (id, order_id, product_id, overcoat_overcoat_measurement_sex, overcoat_overcoat_measurement_fit, overcoat_overcoat_measurement, overcoat_overcoat_measurement_overcoat_length, overcoat_overcoat_measurement_back_lenght, overcoat_overcoat_measurement_chest, overcoat_overcoat_measurement_waist_only, overcoat_overcoat_measurement_hips, overcoat_overcoat_measurement_shoulders, overcoat_overcoat_measurement_neck, overcoat_overcoat_measurement_ptp_front, overcoat_overcoat_measurement_ptp_back, overcoat_overcoat_measurement_arm_hole, overcoat_overcoat_measurement_biceps, overcoat_overcoat_measurement_sleeves_right, overcoat_overcoat_measurement_sleeves_left, overcoat_overcoat_measurement_wrist_right, overcoat_overcoat_measurement_wrist_left, overcoat_overcoat_measurement_first_button, overcoat_overcoat_measurement_shoulder_upper_wrist, overcoat_overcoat_measurement_shoulder_lower_wrist, overcoat_measurement_overcoat_shoulder, overcoat_measurement_overcoat_waist, overcoat_measurement_overcoat_chest, overcoat_body_front, overcoat_body_left, overcoat_body_right, overcoat_body_back, overcoat_remark, overcoat_date, overcoat_time, overcoat_ip, overcoat_status) VALUES ('$id_overcoat', '$order_id_same', '$product_id', '$overcoat_overcoat_measurement_sex', '$overcoat_overcoat_measurement_fit', '$overcoat_overcoat_measurement', '$overcoat_overcoat_measurement_overcoat_length', '$overcoat_overcoat_measurement_back_lenght', '$overcoat_overcoat_measurement_chest', '$overcoat_overcoat_measurement_waist_only', '$overcoat_overcoat_measurement_hips', '$overcoat_overcoat_measurement_shoulders', '$overcoat_overcoat_measurement_neck', '$overcoat_overcoat_measurement_ptp_front', '$overcoat_overcoat_measurement_ptp_back', '$overcoat_overcoat_measurement_arm_hole', '$overcoat_overcoat_measurement_biceps', '$overcoat_overcoat_measurement_sleeves_right', '$overcoat_overcoat_measurement_sleeves_left', '$overcoat_overcoat_measurement_wrist_right', '$overcoat_overcoat_measurement_wrist_left', '$overcoat_overcoat_measurement_first_button', '$overcoat_overcoat_measurement_shoulder_upper_wrist', '$overcoat_overcoat_measurement_shoulder_lower_wrist', '$overcoat_measurement_overcoat_shoulder', '$overcoat_measurement_overcoat_waist', '$overcoat_measurement_overcoat_chest', '$overcoat_body_front', '$overcoat_body_left', '$overcoat_body_right', '$overcoat_body_back', '$overcoat_remark', '$overcoat_date', '$overcoat_time', '$overcoat_ip', '$overcoat_status') ";
$query9 = mysql_query($sql9) or die("Can't Query9");

if($query9) {
	
	echo " <script language='javascript'> window.location='../../cart/single/index.php?orderid=".$order_id_same."'; </script> ";
	
}

mysql_close();
?>