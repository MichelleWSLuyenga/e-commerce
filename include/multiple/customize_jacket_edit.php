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

$order_product = jacket;
$order_id = $_POST["jacket_orderid"];
$product_id = $_POST["jacket_productid"];

/*FABRIC*/
$jacket_fabric_no_1 = $_POST["jacket_fabric_no_1"];
$jacket_lining_no_1 = $_POST["jacket_lining_no_1"];

$sql1 =	" SELECT * FROM admin_fabrics_jacket WHERE fabricno = '$jacket_fabric_no_1' ";
$query1 = mysql_db_query($dbname, $sql1) or die("Can't Query1");
$row1 = mysql_fetch_array($query1);
$fabrics_type = $row1["type"];
$fabrics_brand = $row1["brand"];

if ($row1["type"] != '') {

$sql01 = " SELECT `fabrictype_".$id_user."` FROM admin_fabrictype WHERE fabrictype_name = '$fabrics_type' AND fabrictype_product = 'Jacket' ";
$query01 = mysql_db_query($dbname, $sql01) or die("Can't Query01");
$row01 = mysql_fetch_array($query01);
$jacket_fabric_price_1 = $row01["0"];

} else if ($row1["brand"] != '') {
	
$sql02 = " SELECT `fabricbrand_".$id_user."` FROM admin_fabricbrand WHERE fabricbrand_name = '$fabrics_brand' AND fabricbrand_product = 'Jacket' ";
$query02 = mysql_db_query($dbname, $sql02) or die("Can't Query02");
$row02 = mysql_fetch_array($query02);	
$jacket_fabric_price_1 = $row02["0"];
	
}

/*OTHER PRICING PARAMETERS*/
$jacket_jacket_measurement_chest = $_POST["jacket_jacket_measurement_chest"];
$jacket_jacket_measurement_waist_only = $_POST["jacket_jacket_measurement_waist_only"];
$jacket_jacket_measurement_hips = $_POST["jacket_jacket_measurement_hips"];

if (($jacket_jacket_measurement_chest >= '50' && $jacket_jacket_measurement_chest <= '52') || ($jacket_jacket_measurement_waist_only >= '50' && $jacket_jacket_measurement_waist_only <= '52') || ($jacket_jacket_measurement_hips >= '50' && $jacket_jacket_measurement_hips <= '52')) {
	
	$price_size_1 = $jacket_fabric_price_1 * 20;
	$price_size_2 = $price_size_1 / 100;
	$price_size_3 = $price_size_2 + $jacket_fabric_price_1;
	
} else if (($jacket_jacket_measurement_chest >= '52.5' && $jacket_jacket_measurement_chest <= '56') || ($jacket_jacket_measurement_waist_only >= '52.5' && $jacket_jacket_measurement_waist_only <= '56') || ($jacket_jacket_measurement_hips >= '52.5' && $jacket_jacket_measurement_hips <= '56')) {
	
	$price_size_1 = $jacket_fabric_price_1 * 30;
	$price_size_2 = $price_size_1 / 100;
	$price_size_3 = $price_size_2 + $jacket_fabric_price_1;
	
} else if (($jacket_jacket_measurement_chest >= '56.5' && $jacket_jacket_measurement_chest <= '60') || ($jacket_jacket_measurement_waist_only >= '56.5' && $jacket_jacket_measurement_waist_only <= '60') || ($jacket_jacket_measurement_hips >= '56.5' && $jacket_jacket_measurement_hips <= '60')) {
	
	$price_size_1 = $jacket_fabric_price_1 * 40;
	$price_size_2 = $price_size_1 / 100;
	$price_size_3 = $price_size_2 + $jacket_fabric_price_1;
	
} else if (($jacket_jacket_measurement_chest >= '60.5' && $jacket_jacket_measurement_chest <= '64') || ($jacket_jacket_measurement_waist_only >= '60.5' && $jacket_jacket_measurement_waist_only <= '64') || ($jacket_jacket_measurement_hips >= '60.5' && $jacket_jacket_measurement_hips <= '64')) {
	
	$price_size_1 = $jacket_fabric_price_1 * 50;
	$price_size_2 = $price_size_1 / 100;
	$price_size_3 = $price_size_2 + $jacket_fabric_price_1;

	
} else if (($jacket_jacket_measurement_chest >= '64.5' && $jacket_jacket_measurement_chest <= '68') || ($jacket_jacket_measurement_waist_only >= '64.5' && $jacket_jacket_measurement_waist_only <= '68') || ($jacket_jacket_measurement_hips >= '64.5' && $jacket_jacket_measurement_hips <= '68')) {
	
	$price_size_1 = $jacket_fabric_price_1 * 60;
	$price_size_2 = $price_size_1 / 100;
	$price_size_3 = $price_size_2 + $jacket_fabric_price_1;
	
}  else {
	
	$price_size_3 = $jacket_fabric_price_1;
	
}

/*BUTTON*/
$jacket_jacket_button_number = $_POST["jacket_jacket_button_number"];

$sql2 = " SELECT price FROM admin_buttons_suits WHERE buttonno = '$jacket_jacket_button_number' ";
$query2 = mysql_db_query($dbname, $sql2) or die("Can't Query2");
$row2 = mysql_fetch_array($query2);
$jacket_button_price = $row2["price"];

$jacket_button_price_1 = $price_size_3 + $jacket_button_price;

$jacket_embroidery_collar_initial_or_name = $_POST["jacket_embroidery_collar_initial_or_name"];
if ($jacket_embroidery_collar_initial_or_name == "") {
	$jacket_embroidery_collar_initial_or_name_price = 0;
} else if ($jacket_embroidery_collar_initial_or_name != "") {
	$sqlprice1 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Embroidery Collar Felt' ";
	$queryprice1 = mysql_db_query($dbname, $sqlprice1) or die("Can't QueryPrice1");
	$rowprice1 = mysql_fetch_array($queryprice1);
	$jacket_embroidery_collar_initial_or_name_price_extra = $rowprice1["0"];
	$jacket_embroidery_collar_initial_or_name_price = $jacket_embroidery_collar_initial_or_name_price_extra;
}

$jacket_brand = $_POST["jacket_brand"];
if ($jacket_brand == "0") {
	$jacket_brand_price = 0;
} else if ($jacket_brand != "0") {
	$sqlprice2 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Jacket Branding' ";
	$queryprice2 = mysql_db_query($dbname, $sqlprice2) or die("Can't QueryPrice2");
	$rowprice2 = mysql_fetch_array($queryprice2);
	$jacket_brand_price_extra = $rowprice2["0"];
	$jacket_brand_price = $jacket_brand_price_extra;
}

$jacket_pick_stitch = $_POST["jacket_pick_stitch"];
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

$jacket_pick_stitch_vest = $_POST["jacket_pick_stitch_vest"];
if ($jacket_pick_stitch == "0") {
	$jacket_pick_stitch_vest_price = 0;
} else if ($jacket_pick_stitch == "1" && $jacket_pick_stitch_vest != "DEFAULT TONAL") {
	$sqlprice4 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Vent Pick Stitch' ";
	$queryprice4 = mysql_db_query($dbname, $sqlprice4) or die("Can't QueryPrice4");
	$rowprice4 = mysql_fetch_array($queryprice4);
	$jacket_pick_stitch_vest_price_extra = $rowprice4["0"];
	$jacket_pick_stitch_vest_price = $jacket_pick_stitch_vest_price_extra;
}

$jacket_elbow_patch = $_POST["jacket_elbow_patch"];
if ($jacket_elbow_patch == "") {
	$jacket_elbow_patch_price = 0;
} else if ($jacket_elbow_patch != "") {
	$sqlprice5 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Elbow Patch' ";
	$queryprice5 = mysql_db_query($dbname, $sqlprice5) or die("Can't QueryPrice5");
	$rowprice5 = mysql_fetch_array($queryprice5);
	$jacket_elbow_patch_price_extra = $rowprice5["0"];
	$jacket_elbow_patch_price = $jacket_elbow_patch_price_extra;
}

$jacket_canvas = $_POST["jacket_canvas"];
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

/*MY PRICES*/
$sqlmy1 = " SELECT * FROM admin_fabrics_jacket WHERE fabricno = '$jacket_fabric_no_1' ";
$querymy1 = mysql_db_query($dbname, $sqlmy1) or die("Can't Querymy1");
$rowmy1 = mysql_fetch_array($querymy1);
$fabrics_my_type = $rowmy1["type"];
$fabrics_my_brand = $rowmy1["brand"];

if ($rowmy1["type"] != '') {

$sqlmy01 = " SELECT `fabrictypereseller_".$id_user."` FROM admin_fabrictype WHERE fabrictype_name = '$fabrics_my_type' AND fabrictype_product = 'Jacket' ";
$querymy01 = mysql_db_query($dbname, $sqlmy01) or die("Can't Querymy01");
$rowmy01 = mysql_fetch_array($querymy01);
$jacket_fabric_my_price_1 = $rowmy01["0"];

} else if ($row1["brand"] != '') {
	
$sql02 = " SELECT `fabricbrand_".$id_user."` FROM admin_fabricbrand WHERE fabricbrand_name = '$fabrics_my_brand' AND fabricbrand_product = 'Jacket' ";
$query02 = mysql_db_query($dbname, $sql02) or die("Can't Query02");
$row02 = mysql_fetch_array($query02);	
$jacket_fabric_my_price_1 = $rowmy02["0"];
	
}

/*OTHER PRICING PARAMETERS*/
$jacket_jacket_measurement_chest = $_POST["jacket_jacket_measurement_chest"];
$jacket_jacket_measurement_waist_only = $_POST["jacket_jacket_measurement_waist_only"];
$jacket_jacket_measurement_hips = $_POST["jacket_jacket_measurement_hips"];

if (($jacket_jacket_measurement_chest >= '50' && $jacket_jacket_measurement_chest <= '52') || ($jacket_jacket_measurement_waist_only >= '50' && $jacket_jacket_measurement_waist_only <= '52') || ($jacket_jacket_measurement_hips >= '50' && $jacket_jacket_measurement_hips <= '52')) {
	
	$price_my_size_1 = $jacket_fabric_my_price_1 * 20;
	$price_my_size_2 = $price_my_size_1 / 100;
	$price_my_size_3 = $price_my_size_2 + $jacket_fabric_my_price_1;
	
} else if (($jacket_jacket_measurement_chest >= '52.5' && $jacket_jacket_measurement_chest <= '56') || ($jacket_jacket_measurement_waist_only >= '52.5' && $jacket_jacket_measurement_waist_only <= '56') || ($jacket_jacket_measurement_hips >= '52.5' && $jacket_jacket_measurement_hips <= '56')) {
	
	$price_my_size_1 = $jacket_fabric_my_price_1 * 30;
	$price_my_size_2 = $price_my_size_1 / 100;
	$price_my_size_3 = $price_my_size_2 + $jacket_fabric_my_price_1;
	
} else if (($jacket_jacket_measurement_chest >= '56.5' && $jacket_jacket_measurement_chest <= '60') || ($jacket_jacket_measurement_waist_only >= '56.5' && $jacket_jacket_measurement_waist_only <= '60') || ($jacket_jacket_measurement_hips >= '56.5' && $jacket_jacket_measurement_hips <= '60')) {
	
	$price_my_size_1 = $jacket_fabric_my_price_1 * 40;
	$price_my_size_2 = $price_my_size_1 / 100;
	$price_my_size_3 = $price_my_size_2 + $jacket_fabric_my_price_1;
	
} else if (($jacket_jacket_measurement_chest >= '60.5' && $jacket_jacket_measurement_chest <= '64') || ($jacket_jacket_measurement_waist_only >= '60.5' && $jacket_jacket_measurement_waist_only <= '64') || ($jacket_jacket_measurement_hips >= '60.5' && $jacket_jacket_measurement_hips <= '64')) {
	
	$price_my_size_1 = $jacket_fabric_my_price_1 * 50;
	$price_my_size_2 = $price_my_size_1 / 100;
	$price_my_size_3 = $price_my_size_2 + $jacket_fabric_my_price_1;

	
} else if (($jacket_jacket_measurement_chest >= '64.5' && $jacket_jacket_measurement_chest <= '68') || ($jacket_jacket_measurement_waist_only >= '64.5' && $jacket_jacket_measurement_waist_only <= '68') || ($jacket_jacket_measurement_hips >= '64.5' && $jacket_jacket_measurement_hips <= '68')) {
	
	$price_my_size_1 = $jacket_fabric_my_price_1 * 60;
	$price_my_size_2 = $price_my_size_1 / 100;
	$price_my_size_3 = $price_my_size_2 + $jacket_fabric_my_price_1;
	
}  else {
	
	$price_my_size_3 = $jacket_fabric_my_price_1;
	
}

/*BUTTON*/
$jacket_jacket_button_number = $_POST["jacket_jacket_button_number"];

$sql2 = " SELECT price FROM admin_buttons_suits WHERE buttonno = '$jacket_jacket_button_number' ";
$query2 = mysql_db_query($dbname, $sql2) or die("Can't Query2");
$row2 = mysql_fetch_array($query2);
$jacket_button_my_price = $row2["price"];

$jacket_button_my_price_1 = $price_my_size_3 + $jacket_button_my_price;

$jacket_embroidery_collar_initial_or_name = $_POST["jacket_embroidery_collar_initial_or_name"];
if ($jacket_embroidery_collar_initial_or_name == "") {
	$jacket_embroidery_collar_initial_or_name_price = 0;
} else if ($jacket_embroidery_collar_initial_or_name != "") {
	$sqlprice1 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Embroidery Collar Felt' ";
	$queryprice1 = mysql_db_query($dbname, $sqlprice1) or die("Can't QueryPrice1");
	$rowprice1 = mysql_fetch_array($queryprice1);
	$jacket_embroidery_collar_initial_or_name_my_price_extra = $rowprice1["0"];
	$jacket_embroidery_collar_initial_or_name_my_price = $jacket_embroidery_collar_initial_or_name_my_price_extra;
}

$jacket_brand = $_POST["jacket_brand"];
if ($jacket_brand == "0") {
	$jacket_brand_price = 0;
} else if ($jacket_brand != "0") {
	$sqlprice2 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Jacket Branding' ";
	$queryprice2 = mysql_db_query($dbname, $sqlprice2) or die("Can't QueryPrice2");
	$rowprice2 = mysql_fetch_array($queryprice2);
	$jacket_brand_my_price_extra = $rowprice2["0"];
	$jacket_brand_my_price = $jacket_brand_my_price_extra;
}

$jacket_pick_stitch = $_POST["jacket_pick_stitch"];
$jacket_pick_stitch_sleeves = $_POST["jacket_pick_stitch_sleeves"];
if ($jacket_pick_stitch == "0") {
	$jacket_pick_stitch_sleeves_price = 0;
} else if ($jacket_pick_stitch == "1" && $jacket_pick_stitch_sleeves != "DEFAULT TONAL") {
	$sqlprice3 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Sleeves Pick Stitch' ";
	$queryprice3 = mysql_db_query($dbname, $sqlprice3) or die("Can't QueryPrice3");
	$rowprice3 = mysql_fetch_array($queryprice3);
	$jacket_pick_stitch_sleeves_my_price_extra = $rowprice3["0"];
	$jacket_pick_stitch_sleeves_my_price = $jacket_pick_stitch_sleeves_my_price_extra;
}

$jacket_pick_stitch_vest = $_POST["jacket_pick_stitch_vest"];
if ($jacket_pick_stitch == "0") {
	$jacket_pick_stitch_vest_price = 0;
} else if ($jacket_pick_stitch == "1" && $jacket_pick_stitch_vest != "DEFAULT TONAL") {
	$sqlprice4 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Vent Pick Stitch' ";
	$queryprice4 = mysql_db_query($dbname, $sqlprice4) or die("Can't QueryPrice4");
	$rowprice4 = mysql_fetch_array($queryprice4);
	$jacket_pick_stitch_vest_my_price_extra = $rowprice4["0"];
	$jacket_pick_stitch_vest_my_price = $jacket_pick_stitch_vest_my_price_extra;
}

$jacket_elbow_patch = $_POST["jacket_elbow_patch"];
if ($jacket_elbow_patch == "") {
	$jacket_elbow_patch_price = 0;
} else if ($jacket_elbow_patch != "") {
	$sqlprice5 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Elbow Patch' ";
	$queryprice5 = mysql_db_query($dbname, $sqlprice5) or die("Can't QueryPrice5");
	$rowprice5 = mysql_fetch_array($queryprice5);
	$jacket_elbow_patch_my_price_extra = $rowprice5["0"];
	$jacket_elbow_patch_my_price = $jacket_elbow_patch_my_price_extra;
}

$jacket_canvas = $_POST["jacket_canvas"];
if ($jacket_canvas != "3") {
	$jacket_canvas_price = 0;
} else if ($jacket_canvas == "3") {
	$sqlprice6 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Full Canvas' ";
	$queryprice6 = mysql_db_query($dbname, $sqlprice6) or die("Can't QueryPrice6");
	$rowprice6 = mysql_fetch_array($queryprice6);
	$jacket_canvas_my_price_extra = $rowprice6["0"];
	$jacket_canvas_my_price = $jacket_canvas_my_price_extra;
}

$jacket_my_price_1 = $jacket_button_my_price_1 + $jacket_embroidery_collar_initial_or_name_my_price + $jacket_brand_my_price + $jacket_pick_stitch_sleeves_my_price + $jacket_pick_stitch_vest_my_price + $jacket_elbow_patch_my_price + $jacket_canvas_my_price;

/*CUSTOMER*/
$jacket_customer_name = $_POST["jacket_customer_name"];
$jacket_order_no = $_POST["jacket_order_no"];
$jacket_order_date = date("m/d/Y");
$jacket_delivery_date = $_POST["jacket_delivery_date"];

/*CUSTOMIZE*/
$jacket_jacket_style = $_POST["jacket_jacket_style"];
$jacket_lapel_style = $_POST["jacket_lapel_style"];
$jacket_lapel_width = $_POST["jacket_lapel_width"];
$jacket_lapel_color = $_POST["jacket_lapel_color"];
$jacket_real_lapel_boutonniere = $_POST["jacket_real_lapel_boutonniere"];
$jacket_vent_style = $_POST["jacket_vent_style"];
$jacket_pocket_style = $_POST["jacket_pocket_style"];
$jacket_chest_pocket = $_POST["jacket_chest_pocket"];
$jacket_shoulder_construction = $_POST["jacket_shoulder_construction"];
$jacket_sleeve_button = $_POST["jacket_sleeve_button"];
$jacket_cuff = $_POST["jacket_cuff"];
$jacket_all_sleevebutton_holes_color = $_POST["jacket_all_sleevebutton_holes_color"];
$jacket_contrast_last_sleevebutton_holes_color = $_POST["jacket_contrast_last_sleevebutton_holes_color"];
$jacket_contrast_last_sleevebutton_holes_button = $_POST["jacket_contrast_last_sleevebutton_holes_button"];
$jacket_lining_style = $_POST["jacket_lining_style"];
$jacket_jacket_thread_on_button = $_POST["jacket_jacket_thread_on_button"];
$jacket_jacket_button_hole_color = $_POST["jacket_jacket_button_hole_color"];
$jacket_pick_stitch_lapel_color = $_POST["jacket_pick_stitch_lapel_color"];
$jacket_real_lapel_boutonniere = $_POST["jacket_real_lapel_boutonniere"];
$jacket_pick_stitch_pocket_color = $_POST["jacket_pick_stitch_pocket_color"];
$jacket_embroidery_inside_initial_or_name = $_POST["jacket_embroidery_inside_initial_or_name"];
$jacket_embroidery_inside_color = $_POST["jacket_embroidery_inside_color"];
$jacket_embroidery_inside_design = $_POST["jacket_embroidery_inside_design"];
$jacket_embroidery_collar_color = $_POST["jacket_embroidery_collar_color"];
$jacket_embroidery_collar_design = $_POST["jacket_embroidery_collar_design"];
$jacket_collar_felt_color = $_POST["jacket_collar_felt_color"];

/*MEASUREMENTS*/
$jacket_jacket_measurement_sex = $_POST["jacket_jacket_measurement_sex"];
$jacket_jacket_measurement_fit = $_POST["jacket_jacket_measurement_fit"];
$jacket_jacket_measurement = $_POST["jacket_jacket_measurement"];
$jacket_jacket_measurement_jacket_length = $_POST["jacket_jacket_measurement_jacket_length"];
$jacket_jacket_measurement_back_lenght = $_POST["jacket_jacket_measurement_back_lenght"];
$jacket_jacket_measurement_shoulders = $_POST["jacket_jacket_measurement_shoulders"];
$jacket_jacket_measurement_neck = $_POST["jacket_jacket_measurement_neck"];
$jacket_jacket_measurement_ptp_front = $_POST["jacket_jacket_measurement_ptp_front"];
$jacket_jacket_measurement_ptp_back = $_POST["jacket_jacket_measurement_ptp_back"];
$jacket_jacket_measurement_arm_hole = $_POST["jacket_jacket_measurement_arm_hole"];
$jacket_jacket_measurement_biceps = $_POST["jacket_jacket_measurement_biceps"];
$jacket_jacket_measurement_sleeves_right = $_POST["jacket_jacket_measurement_sleeves_right"];
$jacket_jacket_measurement_sleeves_left= $_POST["jacket_jacket_measurement_sleeves_left"];
$jacket_jacket_measurement_wrist_right = $_POST["jacket_jacket_measurement_wrist_right"];
$jacket_jacket_measurement_wrist_left = $_POST["jacket_jacket_measurement_wrist_left"];
$jacket_jacket_measurement_first_button = $_POST["jacket_jacket_measurement_first_button"];
$jacket_jacket_measurement_shoulder_upper_wrist = $_POST["jacket_jacket_measurement_shoulder_upper_wrist"];
$jacket_jacket_measurement_shoulder_lower_wrist = $_POST["jacket_jacket_measurement_shoulder_lower_wrist"];
$jacket_measurement_jacket_shoulder = $_POST["jacket_measurement_jacket_shoulder"];
$jacket_measurement_jacket_waist = $_POST["jacket_measurement_jacket_waist"];
$jacket_measurement_jacket_chest = $_POST["jacket_measurement_jacket_chest"];
$jacket_body_front = $_POST["jacket_body_front"];
$jacket_body_left = $_POST["jacket_body_left"];
$jacket_body_right = $_POST["jacket_body_right"];
$jacket_body_back = $_POST["jacket_body_back"];
$jacket_remark = $_POST["jacket_remark"];

/*ECT*/
$jacket_date = date("m/d/Y");
$jacket_time = date("H:i:s");
$jacket_ip = $_POST['ip'];
$jacket_status = T;

$sql3 =	" UPDATE customize_order SET order_reseller = '$company_user', order_order_no = '$jacket_order_no', order_name_customize = '$jacket_customer_name', order_my_price = '$jacket_my_price_1', order_price = '$jacket_price_1', order_product = '$order_product', order_fabric_no = '$jacket_fabric_no_1', order_date = '$jacket_date', order_time = '$jacket_time', order_ip = '$jacket_ip', order_status = '$jacket_status' WHERE order_id = '$order_id' AND product_id = '$product_id' ";
$query3 = mysql_query($sql3) or die("Can't Query3");

$sql4 = " UPDATE customize_jacket_design SET jacket_customer_name = '$jacket_customer_name', jacket_order_no = '$jacket_order_no', jacket_order_date = '$jacket_order_date', jacket_delivery_date = '$jacket_delivery_date', jacket_fabric_no = '$jacket_fabric_no_1', jacket_lining_no = '$jacket_lining_no_1', jacket_jacket_style = '$jacket_jacket_style', jacket_lapel_style = '$jacket_lapel_style', jacket_lapel_width = '$jacket_lapel_width', jacket_lapel_color = '$jacket_lapel_color', jacket_real_lapel_boutonniere = '$jacket_real_lapel_boutonniere', jacket_vent_style = '$jacket_vent_style', jacket_pocket_style = '$jacket_pocket_style', jacket_chest_pocket = '$jacket_chest_pocket', jacket_shoulder_construction = '$jacket_shoulder_construction', jacket_sleeve_button = '$jacket_sleeve_button', jacket_cuff = '$jacket_cuff', jacket_all_sleevebutton_holes_color = '$jacket_all_sleevebutton_holes_color', jacket_contrast_last_sleevebutton_holes_color = '$jacket_contrast_last_sleevebutton_holes_color', jacket_contrast_last_sleevebutton_holes_button = '$jacket_contrast_last_sleevebutton_holes_button', jacket_lining_style = '$jacket_lining_style', jacket_canvas = '$jacket_canvas', jacket_jacket_button_number = '$jacket_jacket_button_number', jacket_jacket_thread_on_button = '$jacket_jacket_thread_on_button', jacket_jacket_button_hole_color = '$jacket_jacket_button_hole_color', jacket_pick_stitch = '$jacket_pick_stitch', jacket_pick_stitch_lapel_color = '$jacket_pick_stitch_lapel_color', jacket_pick_stitch_pocket_color = '$jacket_pick_stitch_pocket_color', jacket_pick_stitch_sleeves = '$jacket_pick_stitch_sleeves', jacket_pick_stitch_vest = '$jacket_pick_stitch_vest', jacket_embroidery_inside_initial_or_name = '$jacket_embroidery_inside_initial_or_name', jacket_embroidery_inside_color = '$jacket_embroidery_inside_color', jacket_embroidery_inside_design = '$jacket_embroidery_inside_design', jacket_embroidery_collar_initial_or_name = '$jacket_embroidery_collar_initial_or_name', jacket_embroidery_collar_color = '$jacket_embroidery_collar_color', jacket_embroidery_collar_color = '$jacket_embroidery_collar_color', jacket_brand = '$jacket_brand', jacket_elbow_patch = '$jacket_elbow_patch', jacket_collar_felt_color = '$jacket_collar_felt_color', jacket_date = '$jacket_date', jacket_time = '$jacket_time', jacket_ip = '$jacket_ip', jacket_status = '$jacket_status' WHERE order_id = '$order_id' AND product_id = '$product_id' ";
$query4 = mysql_query($sql4) or die("Can't Query4");

$sql5 = " UPDATE customize_jacket_measurements SET jacket_jacket_measurement_sex = '$jacket_jacket_measurement_sex', jacket_jacket_measurement_fit = '$jacket_jacket_measurement_fit', jacket_jacket_measurement = '$jacket_jacket_measurement', jacket_jacket_measurement_jacket_length = '$jacket_jacket_measurement_jacket_length', jacket_jacket_measurement_back_lenght = '$jacket_jacket_measurement_back_lenght', jacket_jacket_measurement_chest = '$jacket_jacket_measurement_chest', jacket_jacket_measurement_waist_only = '$jacket_jacket_measurement_waist_only', jacket_jacket_measurement_hips = '$jacket_jacket_measurement_hips', jacket_jacket_measurement_shoulders = '$jacket_jacket_measurement_shoulders', jacket_jacket_measurement_neck = '$jacket_jacket_measurement_neck', jacket_jacket_measurement_ptp_front = '$jacket_jacket_measurement_ptp_front', jacket_jacket_measurement_ptp_back = '$jacket_jacket_measurement_ptp_back', jacket_jacket_measurement_arm_hole = '$jacket_jacket_measurement_arm_hole', jacket_jacket_measurement_biceps = '$jacket_jacket_measurement_biceps', jacket_jacket_measurement_sleeves_right = '$jacket_jacket_measurement_sleeves_right', jacket_jacket_measurement_sleeves_left = '$jacket_jacket_measurement_sleeves_left', jacket_jacket_measurement_wrist_right = '$jacket_jacket_measurement_wrist_right', jacket_jacket_measurement_wrist_left = '$jacket_jacket_measurement_wrist_left', jacket_jacket_measurement_first_button = '$jacket_jacket_measurement_first_button', jacket_jacket_measurement_shoulder_upper_wrist = '$jacket_jacket_measurement_shoulder_upper_wrist', jacket_jacket_measurement_shoulder_lower_wrist = '$jacket_jacket_measurement_shoulder_lower_wrist', jacket_measurement_jacket_shoulder = '$jacket_measurement_jacket_shoulder', jacket_measurement_jacket_waist = '$jacket_measurement_jacket_waist', jacket_measurement_jacket_chest = '$jacket_measurement_jacket_chest', jacket_remark = '$jacket_remark', jacket_date = '$jacket_date', jacket_time = '$jacket_time', jacket_ip = '$jacket_ip', jacket_status = '$jacket_status' WHERE order_id = '$order_id' AND product_id = '$product_id' ";
$query5 = mysql_query($sql5) or die("Can't Query5");

$path = "../../images/body/jacket/front/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['jacket_body_front']['name'];
	$tmp = $_FILES['jacket_body_front']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$jacket_body_front_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$jacket_body_front_pic)){
				
				$sql6 = " UPDATE customize_jacket_measurements SET jacket_body_front = '".$jacket_body_front_pic."', jacket_date = '".$jacket_date."', jacket_time = '".$jacket_time."', jacket_ip = '".$jacket_ip."', jacket_status = '".$jacket_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query6 = mysql_db_query($dbname, $sql6) or die("Can't Query6");
			}
    
	} else {
				$sql6 = " UPDATE customize_jacket_measurements SET jacket_date = '".$jacket_date."', jacket_time = '".$jacket_time."', jacket_ip = '".$jacket_ip."', jacket_status = '".$jacket_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query6 = mysql_db_query($dbname, $sql6) or die("Can't Query6");
			}
	}
	
$path = "../../images/body/jacket/left/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['jacket_body_left']['name'];
	$tmp = $_FILES['jacket_body_left']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$jacket_body_left_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$jacket_body_left_pic)){
				
				$sql7 = " UPDATE customize_jacket_measurements SET jacket_body_left = '".$jacket_body_left_pic."', jacket_date = '".$jacket_date."', jacket_time = '".$jacket_time."', jacket_ip = '".$jacket_ip."', jacket_status = '".$jacket_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query7 = mysql_db_query($dbname, $sql7) or die("Can't Query7");
			}
    
	} else {
				$sql7 = " UPDATE customize_jacket_measurements SET jacket_date = '".$jacket_date."', jacket_time = '".$jacket_time."', jacket_ip = '".$jacket_ip."', jacket_status = '".$jacket_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query7 = mysql_db_query($dbname, $sql7) or die("Can't Query7");
			}
	}
	
$path = "../../images/body/jacket/right/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['jacket_body_right']['name'];
	$tmp = $_FILES['jacket_body_right']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$jacket_body_right_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$jacket_body_right_pic)){
				
				$sql8 = " UPDATE customize_jacket_measurements SET jacket_body_right = '".$jacket_body_right_pic."', jacket_date = '".$jacket_date."', jacket_time = '".$jacket_time."', jacket_ip = '".$jacket_ip."', jacket_status = '".$jacket_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query8 = mysql_db_query($dbname, $sql8) or die("Can't Query8");
			}
    
	} else {
				$sql8 = " UPDATE customize_jacket_measurements SET jacket_date = '".$jacket_date."', jacket_time = '".$jacket_time."', jacket_ip = '".$jacket_ip."', jacket_status = '".$jacket_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query8 = mysql_db_query($dbname, $sql8) or die("Can't Query8");
			}
	}
	
$path = "../../images/body/jacket/back/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['jacket_body_back']['name'];
	$tmp = $_FILES['jacket_body_back']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$jacket_body_back_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$jacket_body_back_pic)){
				
				$sql9 = " UPDATE customize_jacket_measurements SET jacket_body_back = '".$jacket_body_back_pic."', jacket_date = '".$jacket_date."', jacket_time = '".$jacket_time."', jacket_ip = '".$jacket_ip."', jacket_status = '".$jacket_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query9 = mysql_db_query($dbname, $sql9) or die("Can't Query9");
			}
    
	} else {
				$sql9 = " UPDATE customize_jacket_measurements SET jacket_date = '".$jacket_date."', jacket_time = '".$jacket_time."', jacket_ip = '".$jacket_ip."', jacket_status = '".$jacket_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query9 = mysql_db_query($dbname, $sql9) or die("Can't Query9");
			}
	}

if($query9) {
	
	echo " <script language='javascript'> window.location='../../cart/multiple/index.php?orderid=".$order_id."'; </script> ";
	
}

mysql_close();
?>