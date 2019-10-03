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

$order_product = pants;
$pants_orderid = $_POST["pants_orderid"];

if ($pants_orderid != "") {
	
	$order_id = $pants_orderid;
	
} else if ($pants_orderid == "") {
	
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
$pants_fabric_no_1 = $_POST["pants_fabric_no_1"];
$pants_lining_no_1 = $_POST["pants_lining_no_1"];

$sql4 =	" SELECT * FROM admin_fabrics_pants WHERE fabricno = '$pants_fabric_no_1' ";
$query4 = mysql_db_query($dbname, $sql4) or die("Can't Query4");
$row4 = mysql_fetch_array($query4);
$fabrics_type = $row4["type"];
$fabrics_brand = $row4["brand"];

if ($row4["type"] != '') {

$sql01 = " SELECT `fabrictype_".$id_user."` FROM admin_fabrictype WHERE fabrictype_name = '$fabrics_type' AND fabrictype_product = 'Pants' ";
$query01 = mysql_db_query($dbname, $sql01) or die("Can't Query01");
$row01 = mysql_fetch_array($query01);
$pants_fabric_price_1 = $row01["0"];

} else if ($row4["brand"] != '') {
	
$sql02 = " SELECT `fabricbrand_".$id_user."` FROM admin_fabricbrand WHERE fabricbrand_name = '$fabrics_brand' AND fabricbrand_product = 'Pants' ";
$query02 = mysql_db_query($dbname, $sql02) or die("Can't Query02");
$row02 = mysql_fetch_array($query02);	
$pants_fabric_price_1 = $row02["0"];
	
}

/*OTHER PRICING PARAMETERS*/
$pants_pants_measurement_waist = $_POST["pants_pants_measurement_waist"];
$pants_pants_measurement_hips = $_POST["pants_pants_measurement_hips"];

if (($pants_pants_measurement_waist >= '50' && $pants_pants_measurement_waist <= '52') || ($pants_pants_measurement_hips >= '50' && $pants_pants_measurement_hips <= '52')) {
	
	$price_size_1 = $pants_fabric_price_1 * 20;
	$price_size_2 = $price_size_1 / 100;
	$price_size_3 = $price_size_2 + $pants_fabric_price_1;
	
} else if (($pants_pants_measurement_waist >= '52.5' && $pants_pants_measurement_waist <= '56') || ($pants_pants_measurement_hips >= '52.5' && $pants_pants_measurement_hips <= '56')) {
	
	$price_size_1 = $pants_fabric_price_1 * 30;
	$price_size_2 = $price_size_1 / 100;
	$price_size_3 = $price_size_2 + $pants_fabric_price_1;
	
} else if (($pants_pants_measurement_waist >= '56.5' && $pants_pants_measurement_waist <= '60') || ($pants_pants_measurement_hips >= '56.5' && $pants_pants_measurement_hips <= '60')) {
	
	$price_size_1 = $pants_fabric_price_1 * 40;
	$price_size_2 = $price_size_1 / 100;
	$price_size_3 = $price_size_2 + $pants_fabric_price_1;
	
} else if (($pants_pants_measurement_waist >= '60.5' && $pants_pants_measurement_waist <= '64') || ($pants_pants_measurement_hips >= '60.5' && $pants_pants_measurement_hips <= '64')) {
	
	$price_size_1 = $pants_fabric_price_1 * 50;
	$price_size_2 = $price_size_1 / 100;
	$price_size_3 = $price_size_2 + $pants_fabric_price_1;
	
} else if (($pants_pants_measurement_waist >= '64.5' && $pants_pants_measurement_waist <= '68') || ($pants_pants_measurement_hips >= '64.5' && $pants_pants_measurement_hips <= '68')) {
	
	$price_size_1 = $pants_fabric_price_1 * 60;
	$price_size_2 = $price_size_1 / 100;
	$price_size_3 = $price_size_2 + $pants_fabric_price_1;
	
}  else {
	
	$price_size_3 = $pants_fabric_price_1;
	
}

/*BUTTON*/
$pants_pants_button_number = $_POST["pants_pants_button_number"];

$sql10 = " SELECT price FROM admin_buttons_suits WHERE buttonno = '$pants_pants_button_number' ";
$query10 = mysql_db_query($dbname, $sql10) or die("Can't Query10");
$row10 = mysql_fetch_array($query10);
$pants_button_price = $row10["price"];

$pants_pants_back_button_number = $_POST["pants_pants_back_button_number"];

$pants_button_price_1 = $price_size_3 + $pants_button_price;

$pants_coin_pocket_inside = $_POST["pants_coin_pocket_inside"];
if ($pants_coin_pocket_inside != "1") {
	$pants_coin_pocket_inside_price = 0;
} else if ($pants_coin_pocket_inside == "1") {
	$sqlprice1 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Coin Pocket Inside' ";
	$queryprice1 = mysql_db_query($dbname, $sqlprice1) or die("Can't QueryPrice1");
	$rowprice1 = mysql_fetch_array($queryprice1);
	$pants_coin_pocket_inside_price_extra = $rowprice1["0"];
	$pants_coin_pocket_inside_price = $pants_coin_pocket_inside_price_extra;
}

$pants_suspender_buttons_inside = $_POST["pants_suspender_buttons_inside"];
if ($pants_suspender_buttons_inside != "1") {
	$pants_suspender_buttons_inside_price = 0;
} else if ($pants_suspender_buttons_inside == "1") {
	$sqlprice2 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Suspender Buttons Inside' ";
	$queryprice2 = mysql_db_query($dbname, $sqlprice2) or die("Can't QueryPrice2");
	$rowprice2 = mysql_fetch_array($queryprice2);
	$pants_suspender_buttons_inside_price_extra = $rowprice2["0"];
	$pants_suspender_buttons_inside_price = $pants_suspender_buttons_inside_price_extra;
}

$pants_split_tabs_back = $_POST["pants_split_tabs_back"];
if ($pants_split_tabs_back != "1") {
	$pants_split_tabs_back_price = 0;
} else if ($pants_split_tabs_back == "1") {
	$sqlprice3 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Split Tabs Back' ";
	$queryprice3 = mysql_db_query($dbname, $sqlprice3) or die("Can't QueryPrice3");
	$rowprice3 = mysql_fetch_array($queryprice3);
	$pants_split_tabs_back_price_extra = $rowprice3["0"];
	$pants_split_tabs_back_price = $pants_split_tabs_back_price_extra;
}

$pants_tuxedo_satin = $_POST["pants_tuxedo_satin"];
if ($pants_tuxedo_satin != "1") {
	$pants_tuxedo_satin_price = 0;
} else if ($pants_tuxedo_satin == "1") {
	$sqlprice4 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Tuxedo Satin on Side' ";
	$queryprice4 = mysql_db_query($dbname, $sqlprice4) or die("Can't QueryPrice4");
	$rowprice4 = mysql_fetch_array($queryprice4);
	$pants_tuxedo_satin_price_extra = $rowprice4["0"];
	$pants_tuxedo_satin_price = $pants_tuxedo_satin_price_extra;
}

$pants_tuxedo_satin_waist_band = $_POST["pants_tuxedo_satin_waist_band"];
if ($pants_tuxedo_satin_waist_band != "1") {
	$pants_tuxedo_satin_waist_band_price = 0;
} else if ($pants_tuxedo_satin_waist_band == "1") {
	$sqlprice5 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Tuxedo Satin Waist Band' ";
	$queryprice5 = mysql_db_query($dbname, $sqlprice5) or die("Can't QueryPrice5");
	$rowprice5 = mysql_fetch_array($queryprice5);
	$pants_tuxedo_satin_waist_band_price_extra = $rowprice5["0"];
	$pants_tuxedo_satin_waist_band_price = $pants_tuxedo_satin_waist_band_price_extra;
}

$pants_very_extended_waistband = $_POST["pants_very_extended_waistband"];
if ($pants_very_extended_waistband != "0") {
	$pants_very_extended_waistband_price = 0;
} else if ($pants_very_extended_waistband == "0") {
	$sqlprice6 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Very Extended Waistband' ";
	$queryprice6 = mysql_db_query($dbname, $sqlprice6) or die("Can't QueryPrice6");
	$rowprice6 = mysql_fetch_array($queryprice6);
	$pants_very_extended_waistband_price_extra = $rowprice6["0"];
	$pants_very_extended_waistband_price = $pants_very_extended_waistband_price_extra;
}

$pants_pants_brand = $_POST["pants_pants_brand"];
if ($pants_pants_brand == "0") {
	$pants_pants_brand_price = 0;
} else if ($pants_pants_brand != "0") {
	$sqlprice7 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Pants Branding' ";
	$queryprice7 = mysql_db_query($dbname, $sqlprice7) or die("Can't QueryPrice7");
	$rowprice7 = mysql_fetch_array($queryprice7);
	$pants_pants_brand_price_extra = $rowprice7["0"];
	$pants_pants_brand_price = $pants_pants_brand_price_extra;
}

$pants_price_1 = $pants_button_price_1 + $pants_coin_pocket_inside_price + $pants_suspender_buttons_inside_price + $pants_split_tabs_back_price + $pants_tuxedo_satin_price + $pants_tuxedo_satin_waist_band_price + $pants_very_extended_waistband_price + $pants_pants_brand_price;

/*CUSTOMER*/
$pants_customer_name = $_POST["pants_customer_name"];
$pants_order_no = $_POST["pants_order_no"];
$pants_order_date = date("m/d/Y");
$pants_delivery_date = $_POST["pants_delivery_date"];

/*CUSTOMIZE*/
$pants_front_pleat = $_POST["pants_front_pleat"];
$pants_front_pocket = $_POST["pants_front_pocket"];
$pants_back_pocket = $_POST["pants_back_pocket"];
$pants_no_back_pocket = $_POST["pants_no_back_pocket"];
$pants_pants_thread_on_button = $_POST["pants_pants_thread_on_button"];
$pants_pants_button_hole_color = $_POST["pants_pants_button_hole_color"];
$pants_fastening = $_POST["pants_fastening"];
$pants_fly_option = $_POST["pants_fly_option"];
$pants_band_edge_style = $_POST["pants_band_edge_style"];
$pants_very_extended_waistband = $_POST["pants_very_extended_waistband"];
$pants_waistband_width = $_POST["pants_waistband_width"];
$pants_cuff = $_POST["pants_cuff"];
$pants_cuff_width = $_POST["pants_cuff_width"];
$pants_belt = $_POST["pants_belt"];
$pants_pants_lining_style = $_POST["pants_pants_lining_style"];
$pants_embroidery_waist_initial_or_name = $_POST["pants_embroidery_waist_initial_or_name"];
$pants_embroidery_waist_color = $_POST["pants_embroidery_waist_color"];
$pants_embroidery_waist_design = $_POST["pants_embroidery_waist_design"];
$pants_embroidery_cuffs_initial_or_name = $_POST["pants_embroidery_cuffs_initial_or_name"];
$pants_embroidery_cuffs_color = $_POST["pants_embroidery_cuffs_color"];
$pants_embroidery_cuffs_design = $_POST["pants_embroidery_cuffs_design"];
$pants_pants_brand = $_POST["pants_pants_brand"];
$pants_coin_pocket_inside = $_POST["pants_coin_pocket_inside"];
$pants_suspender_buttons_inside = $_POST["pants_suspender_buttons_inside"];
$pants_split_tabs_back = $_POST["pants_split_tabs_back"];
$pants_tuxedo_satin = $_POST["pants_tuxedo_satin"];
$pants_tuxedo_satin_waist_band = $_POST["pants_tuxedo_satin_waist_band"];

/*MEASUREMENTS*/
$pants_pants_measurement_sex = $_POST["pants_pants_measurement_sex"];
$pants_pants_measurement_length = $_POST["pants_pants_measurement_length"];
$pants_pants_measurement_fit = $_POST["pants_pants_measurement_fit"];
$pants_pants_measurement = $_POST["pants_pants_measurement"];
$pants_pants_measurement_crotch_full = $_POST["pants_pants_measurement_crotch_full"];
$pants_pants_measurement_crotch_front = $_POST["pants_pants_measurement_crotch_front"];
$pants_pants_measurement_crotch_back = $_POST["pants_pants_measurement_crotch_back"];
$pants_pants_measurement_inseam_length = $_POST["pants_pants_measurement_inseam_length"];
$pants_pants_measurement_thighs = $_POST["pants_pants_measurement_thighs"];
$pants_pants_measurement_knees = $_POST["pants_pants_measurement_knees"];
$pants_pants_measurement_cuffs_ankle = $_POST["pants_pants_measurement_cuffs_ankle"];
$pants_pants_measurement_length_outleg = $_POST["pants_pants_measurement_length_outleg"];
$pants_pants_measurement_only_crotch = $_POST["pants_pants_measurement_only_crotch"];
$pants_pants_measurement_front_rise = $_POST["pants_pants_measurement_front_rise"];
$pants_pants_measurement_cuffs = $_POST["pants_pants_measurement_cuffs"];
$pants_measurement_pants_waist = $_POST["pants_measurement_pants_waist"];
$pants_measurement_pants_bottom = $_POST["pants_measurement_pants_bottom"];
$pants_body_front = $_POST["pants_body_front"];
$pants_body_left = $_POST["pants_body_left"];
$pants_body_right = $_POST["pants_body_right"];
$pants_body_back = $_POST["pants_body_back"];
$pants_remark = $_POST["pants_remark"];

/*ECT*/
$pants_date = date("m/d/Y");
$pants_time = date("H:i:s");
$pants_ip = $_POST['ip'];
$pants_status = T;

/*FABRIC 1*/
if ($pants_fabric_no_1 != "" || $pants_lining_no_1 != "") {

$sql11 = " SELECT MAX(id) FROM customize_order ";
$query11 = mysql_db_query($dbname, $sql11) or die("Can't Query11");
$row11 = mysql_fetch_array($query11);
$id_order = $row11[0] + 1 ;

$sql12 =	" SELECT MAX(product_id) FROM customize_order";
$query12 = mysql_db_query($dbname, $sql12) or die("Can't Query12");
$row12 = mysql_fetch_array($query12);
$product_id = $row12[0] + 1 ;

$sql13 =	" SELECT MAX(id) FROM customize_pants_design ";
$query13 = mysql_db_query($dbname, $sql13) or die("Can't Query13");
$row13 = mysql_fetch_array($query13);
$id_pants = $row13[0] + 1 ;

$sql14 = " INSERT INTO customize_order (id, order_id, product_id, order_reseller, order_order_no, order_name_customize, order_price, order_product, order_fabric_no, order_date, order_time, order_ip, order_status) VALUES ('$id_order', '$order_id', '$product_id', '$company_user', '$pants_order_no', '$pants_customer_name', '$pants_price_1', '$order_product', '$pants_fabric_no_1', '$pants_date', '$pants_time', '$pants_ip', '$pants_status') ";
$query14 = mysql_query($sql14) or die("Can't Query14");

$sql15 = " INSERT INTO customize_pants_design (id, order_id, product_id, pants_customer_name, pants_order_no, pants_order_date, pants_delivery_date, pants_fabric_no, pants_lining_no, pants_front_pleat, pants_front_pocket, pants_back_pocket, pants_no_back_pocket, pants_pants_back_button_number, pants_pants_button_number, pants_pants_thread_on_button, pants_pants_button_hole_color, pants_fastening, pants_fly_option, pants_band_edge_style, pants_very_extended_waistband, pants_waistband_width, pants_cuff, pants_cuff_width, pants_belt, pants_pants_lining_style, pants_embroidery_waist_initial_or_name, pants_embroidery_waist_color, pants_embroidery_waist_design, pants_embroidery_cuffs_initial_or_name, pants_embroidery_cuffs_color, pants_embroidery_cuffs_design, pants_pants_brand, pants_coin_pocket_inside, pants_suspender_buttons_inside, pants_split_tabs_back, pants_tuxedo_satin, pants_tuxedo_satin_waist_band, pants_date, pants_time, pants_ip, pants_status) VALUES ('$id_pants', '$order_id', '$product_id', '$pants_customer_name', '$pants_order_no', '$pants_order_date', '$pants_delivery_date', '$pants_fabric_no_1', '$pants_lining_no_1', '$pants_front_pleat', '$pants_front_pocket', '$pants_back_pocket', '$pants_no_back_pocket', '$pants_pants_back_button_number', '$pants_pants_button_number', '$pants_pants_thread_on_button', '$pants_pants_button_hole_color', '$pants_fastening', '$pants_fly_option', '$pants_band_edge_style', '$pants_very_extended_waistband', '$pants_waistband_width', '$pants_cuff', '$pants_cuff_width', '$pants_belt', '$pants_pants_lining_style', '$pants_embroidery_waist_initial_or_name', '$pants_embroidery_waist_color', '$pants_embroidery_waist_design', '$pants_embroidery_cuffs_initial_or_name', '$pants_embroidery_cuffs_color', '$pants_embroidery_cuffs_design', '$pants_pants_brand', '$pants_coin_pocket_inside', '$pants_suspender_buttons_inside', '$pants_split_tabs_back', '$pants_tuxedo_satin', '$pants_tuxedo_satin_waist_band', '$pants_date', '$pants_time', '$pants_ip', '$pants_status') ";
$query15 = mysql_query($sql15) or die("Can't Query15");

$sql16 = " INSERT INTO customize_pants_measurements (id, order_id, product_id, pants_pants_measurement_sex, pants_pants_measurement_length, pants_pants_measurement_fit, pants_pants_measurement, pants_pants_measurement_waist, pants_pants_measurement_hips, pants_pants_measurement_crotch_full, pants_pants_measurement_crotch_front, pants_pants_measurement_crotch_back, pants_pants_measurement_inseam_length, pants_pants_measurement_thighs, pants_pants_measurement_knees, pants_pants_measurement_cuffs_ankle, pants_pants_measurement_length_outleg, pants_pants_measurement_only_crotch, pants_pants_measurement_front_rise, pants_pants_measurement_cuffs, pants_measurement_pants_waist, pants_measurement_pants_bottom, pants_remark, pants_date, pants_time, pants_ip, pants_status) VALUES ('$id_pants', '$order_id', '$product_id', '$pants_pants_measurement_sex', '$pants_pants_measurement_length', '$pants_pants_measurement_fit', '$pants_pants_measurement', '$pants_pants_measurement_waist', '$pants_pants_measurement_hips', '$pants_pants_measurement_crotch_full', '$pants_pants_measurement_crotch_front', '$pants_pants_measurement_crotch_back', '$pants_pants_measurement_inseam_length', '$pants_pants_measurement_thighs', '$pants_pants_measurement_knees', '$pants_pants_measurement_cuffs_ankle', '$pants_pants_measurement_length_outleg', '$pants_pants_measurement_only_crotch', '$pants_pants_measurement_front_rise', '$pants_pants_measurement_cuffs', '$pants_measurement_pants_waist', '$pants_measurement_pants_bottom', '$pants_remark', '$pants_date', '$pants_time', '$pants_ip', '$pants_status') ";
$query16 = mysql_query($sql16) or die("Can't Query16");

$path = "../../images/body/pants/front/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['pants_body_front']['name'];
	$tmp = $_FILES['pants_body_front']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$pants_body_front_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$pants_body_front_pic)){
				
				$sql17 = " UPDATE customize_pants_measurements SET pants_body_front = '".$pants_body_front_pic."', pants_date = '".$pants_date."', pants_time = '".$pants_time."', pants_ip = '".$pants_ip."', pants_status = '".$pants_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query17 = mysql_db_query($dbname, $sql17) or die("Can't Query17");
			}
    
	} else {
				$sql17 = " UPDATE customize_pants_measurements SET pants_date = '".$pants_date."', pants_time = '".$pants_time."', pants_ip = '".$pants_ip."', pants_status = '".$pants_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query17 = mysql_db_query($dbname, $sql17) or die("Can't Query17");
			}
	}
	
$path = "../../images/body/pants/left/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['pants_body_left']['name'];
	$tmp = $_FILES['pants_body_left']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$pants_body_left_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$pants_body_left_pic)){
				
				$sql18 = " UPDATE customize_pants_measurements SET pants_body_left = '".$pants_body_left_pic."', pants_date = '".$pants_date."', pants_time = '".$pants_time."', pants_ip = '".$pants_ip."', pants_status = '".$pants_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query18 = mysql_db_query($dbname, $sql18) or die("Can't Query18");
			}
    
	} else {
				$sql18 = " UPDATE customize_pants_measurements SET pants_date = '".$pants_date."', pants_time = '".$pants_time."', pants_ip = '".$pants_ip."', pants_status = '".$pants_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query18 = mysql_db_query($dbname, $sql18) or die("Can't Query18");
			}
	}
	
$path = "../../images/body/pants/right/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['pants_body_right']['name'];
	$tmp = $_FILES['pants_body_right']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$pants_body_right_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$pants_body_right_pic)){
				
				$sql19 = " UPDATE customize_pants_measurements SET pants_body_right = '".$pants_body_right_pic."', pants_date = '".$pants_date."', pants_time = '".$pants_time."', pants_ip = '".$pants_ip."', pants_status = '".$pants_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query19 = mysql_db_query($dbname, $sql19) or die("Can't Query19");
			}
    
	} else {
				$sql19 = " UPDATE customize_pants_measurements SET pants_date = '".$pants_date."', pants_time = '".$pants_time."', pants_ip = '".$pants_ip."', pants_status = '".$pants_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query19 = mysql_db_query($dbname, $sql19) or die("Can't Query19");
			}
	}
	
$path = "../../images/body/pants/back/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['pants_body_back']['name'];
	$tmp = $_FILES['pants_body_back']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$pants_body_back_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$pants_body_back_pic)){
				
				$sql20 = " UPDATE customize_pants_measurements SET pants_body_back = '".$pants_body_back_pic."', pants_date = '".$pants_date."', pants_time = '".$pants_time."', pants_ip = '".$pants_ip."', pants_status = '".$pants_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query20 = mysql_db_query($dbname, $sql20) or die("Can't Query20");
			}
    
	} else {
				$sql20 = " UPDATE customize_pants_measurements SET pants_date = '".$pants_date."', pants_time = '".$pants_time."', pants_ip = '".$pants_ip."', pants_status = '".$pants_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query20 = mysql_db_query($dbname, $sql20) or die("Can't Query20");
			}
	}

} else if ($pants_fabric_no_1 == "" || $pants_lining_no_1 == "") { }

if ($pants_orderid != "") {
	
	$sql21 = " UPDATE customize_checkout SET checkout_company = '$company_user', checkout_order = '$pants_order_no', checkout_date = '$pants_date', checkout_time = '$pants_time', checkout_ip = '$pants_ip', checkout_status = '$pants_status' WHERE checkout_orderid = '$order_id' ";
	$query21 = mysql_query($sql21) or die("Can't Query21");
	
} else if ($pants_orderid == "") {
	
	$sql21 = " INSERT INTO customize_checkout (id, checkout_company, checkout_order, checkout_orderid, checkout_date, checkout_time, checkout_ip, checkout_status) VALUES ('$id_customize_checkout', '$company_user', '$pants_order_no', '$order_id', '$pants_date', '$pants_time', '$pants_ip', '$pants_status') ";
	$query21 = mysql_query($sql21) or die("Can't Query21");
	
}

if($query21) {
	
	echo " <script language='javascript'> window.location='../../../cart/single/index.php?orderid=".$order_id."'; </script> ";
	
}

mysql_close();
?>