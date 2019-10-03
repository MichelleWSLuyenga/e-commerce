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

$order_product = tuxedo_jacket;
$order_id = $_POST["tuxedo_jacket_orderid"];
$product_id = $_POST["tuxedo_jacket_productid"];

/*FABRIC*/
$tuxedo_jacket_fabric_no_1 = $_POST["tuxedo_jacket_fabric_no_1"];
$tuxedo_jacket_lining_no_1 = $_POST["tuxedo_jacket_lining_no_1"];

$sql1 =	" SELECT * FROM admin_fabrics_tuxedo_jacket WHERE fabricno = '$tuxedo_jacket_fabric_no_1' ";
$query1 = mysql_db_query($dbname, $sql1) or die("Can't Query1");
$row1 = mysql_fetch_array($query1);
$fabrics_type = $row1["type"];
$fabrics_brand = $row1["brand"];

if ($row1["type"] != '') {

$sql01 = " SELECT `fabrictype_".$id_user."` FROM admin_fabrictype WHERE fabrictype_name = '$fabrics_type' AND fabrictype_product = 'Jacket' ";
$query01 = mysql_db_query($dbname, $sql01) or die("Can't Query01");
$row01 = mysql_fetch_array($query01);
$tuxedo_jacket_fabric_price_1 = $row01["0"];

} else if ($row1["brand"] != '') {
	
$sql02 = " SELECT `fabricbrand_".$id_user."` FROM admin_fabricbrand WHERE fabricbrand_name = '$fabrics_brand' AND fabricbrand_product = 'Jacket' ";
$query02 = mysql_db_query($dbname, $sql02) or die("Can't Query02");
$row02 = mysql_fetch_array($query02);	
$tuxedo_jacket_fabric_price_1 = $row02["0"];
	
}

/*OTHER PRICING PARAMETERS*/
$tuxedo_jacket_jacket_measurement_chest = $_POST["tuxedo_jacket_jacket_measurement_chest"];
$tuxedo_jacket_jacket_measurement_waist_only = $_POST["tuxedo_jacket_jacket_measurement_waist_only"];
$tuxedo_jacket_jacket_measurement_hips = $_POST["tuxedo_jacket_jacket_measurement_hips"];

if (($tuxedo_jacket_jacket_measurement_chest >= '50' && $tuxedo_jacket_jacket_measurement_chest <= '52') || ($tuxedo_jacket_jacket_measurement_waist_only >= '50' && $tuxedo_jacket_jacket_measurement_waist_only <= '52') || ($tuxedo_jacket_jacket_measurement_hips >= '50' && $tuxedo_jacket_jacket_measurement_hips <= '52')) {
	
	$price_size_1 = $tuxedo_jacket_fabric_price_1 * 20;
	$price_size_2 = $price_size_1 / 100;
	$price_size_3 = $price_size_2 + $tuxedo_jacket_fabric_price_1;
	
} else if (($tuxedo_jacket_jacket_measurement_chest >= '52.5' && $tuxedo_jacket_jacket_measurement_chest <= '56') || ($tuxedo_jacket_jacket_measurement_waist_only >= '52.5' && $tuxedo_jacket_jacket_measurement_waist_only <= '56') || ($tuxedo_jacket_jacket_measurement_hips >= '52.5' && $tuxedo_jacket_jacket_measurement_hips <= '56')) {
	
	$price_size_1 = $tuxedo_jacket_fabric_price_1 * 30;
	$price_size_2 = $price_size_1 / 100;
	$price_size_3 = $price_size_2 + $tuxedo_jacket_fabric_price_1;
	
} else if (($tuxedo_jacket_jacket_measurement_chest >= '56.5' && $tuxedo_jacket_jacket_measurement_chest <= '60') || ($tuxedo_jacket_jacket_measurement_waist_only >= '56.5' && $tuxedo_jacket_jacket_measurement_waist_only <= '60') || ($tuxedo_jacket_jacket_measurement_hips >= '56.5' && $tuxedo_jacket_jacket_measurement_hips <= '60')) {
	
	$price_size_1 = $tuxedo_jacket_fabric_price_1 * 40;
	$price_size_2 = $price_size_1 / 100;
	$price_size_3 = $price_size_2 + $tuxedo_jacket_fabric_price_1;
	
} else if (($tuxedo_jacket_jacket_measurement_chest >= '60.5' && $tuxedo_jacket_jacket_measurement_chest <= '64') || ($tuxedo_jacket_jacket_measurement_waist_only >= '60.5' && $tuxedo_jacket_jacket_measurement_waist_only <= '64') || ($tuxedo_jacket_jacket_measurement_hips >= '60.5' && $tuxedo_jacket_jacket_measurement_hips <= '64')) {
	
	$price_size_1 = $tuxedo_jacket_fabric_price_1 * 50;
	$price_size_2 = $price_size_1 / 100;
	$price_size_3 = $price_size_2 + $tuxedo_jacket_fabric_price_1;
	
} else if (($tuxedo_jacket_jacket_measurement_chest >= '64.5' && $tuxedo_jacket_jacket_measurement_chest <= '68') || ($tuxedo_jacket_jacket_measurement_waist_only >= '64.5' && $tuxedo_jacket_jacket_measurement_waist_only <= '68') || ($tuxedo_jacket_jacket_measurement_hips >= '64.5' && $tuxedo_jacket_jacket_measurement_hips <= '68')) {
	
	$price_size_1 = $tuxedo_jacket_fabric_price_1 * 60;
	$price_size_2 = $price_size_1 / 100;
	$price_size_3 = $price_size_2 + $tuxedo_jacket_fabric_price_1;
	
}  else {
	
	$price_size_3 = $tuxedo_jacket_fabric_price_1;
	
}

/*BUTTON*/
$tuxedo_jacket_jacket_button_number = $_POST["tuxedo_jacket_jacket_button_number"];

$sql2 = " SELECT price FROM admin_buttons_suits WHERE buttonno = '$tuxedo_jacket_jacket_button_number' ";
$query2 = mysql_db_query($dbname, $sql2) or die("Can't Query2");
$row2 = mysql_fetch_array($query2);
$tuxedo_jacket_button_price = $row2["price"];

$tuxedo_jacket_button_price_1 = $price_size_3 + $tuxedo_jacket_button_price;

$tuxedo_jacket_embroidery_collar_initial_or_name = $_POST["tuxedo_jacket_embroidery_collar_initial_or_name"];
if ($tuxedo_jacket_embroidery_collar_initial_or_name == "") {
	$tuxedo_jacket_embroidery_collar_initial_or_name_price = 0;
} else if ($tuxedo_jacket_embroidery_collar_initial_or_name != "") {
	$sqlprice1 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Embroidery Collar Felt' ";
	$queryprice1 = mysql_db_query($dbname, $sqlprice1) or die("Can't QueryPrice1");
	$rowprice1 = mysql_fetch_array($queryprice1);
	$tuxedo_jacket_embroidery_collar_initial_or_name_price_extra = $rowprice1["0"];
	$tuxedo_jacket_embroidery_collar_initial_or_name_price = $tuxedo_jacket_embroidery_collar_initial_or_name_price_extra;
}

$tuxedo_jacket_brand = $_POST["tuxedo_jacket_brand"];
if ($tuxedo_jacket_brand == "0") {
	$tuxedo_jacket_brand_price = 0;
} else if ($tuxedo_jacket_brand != "0") {
	$sqlprice2 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Jacket Branding' ";
	$queryprice2 = mysql_db_query($dbname, $sqlprice2) or die("Can't QueryPrice2");
	$rowprice2 = mysql_fetch_array($queryprice2);
	$tuxedo_jacket_brand_price_extra = $rowprice2["0"];
	$tuxedo_jacket_brand_price = $tuxedo_jacket_brand_price_extra;
}

$tuxedo_jacket_pick_stitch = $_POST["tuxedo_jacket_pick_stitch"];
$tuxedo_jacket_pick_stitch_sleeves = $_POST["tuxedo_jacket_pick_stitch_sleeves"];
if ($tuxedo_jacket_pick_stitch == "0") {
	$tuxedo_jacket_pick_stitch_sleeves_price = 0;
} else if ($tuxedo_jacket_pick_stitch == "1" && $tuxedo_jacket_pick_stitch_sleeves != "DEFAULT TONAL") {
	$sqlprice3 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Sleeves Pick Stitch' ";
	$queryprice3 = mysql_db_query($dbname, $sqlprice3) or die("Can't QueryPrice3");
	$rowprice3 = mysql_fetch_array($queryprice3);
	$tuxedo_jacket_pick_stitch_sleeves_price_extra = $rowprice3["0"];
	$tuxedo_jacket_pick_stitch_sleeves_price = $tuxedo_jacket_pick_stitch_sleeves_price_extra;
}

$tuxedo_jacket_pick_stitch_vest = $_POST["tuxedo_jacket_pick_stitch_vest"];
if ($tuxedo_jacket_pick_stitch == "0") {
	$tuxedo_jacket_pick_stitch_vest_price = 0;
} else if ($tuxedo_jacket_pick_stitch == "1" && $tuxedo_jacket_pick_stitch_vest != "DEFAULT TONAL") {
	$sqlprice4 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Vent Pick Stitch' ";
	$queryprice4 = mysql_db_query($dbname, $sqlprice4) or die("Can't QueryPrice4");
	$rowprice4 = mysql_fetch_array($queryprice4);
	$tuxedo_jacket_pick_stitch_vest_price_extra = $rowprice4["0"];
	$tuxedo_jacket_pick_stitch_vest_price = $tuxedo_jacket_pick_stitch_vest_price_extra;
}

$tuxedo_jacket_elbow_patch = $_POST["tuxedo_jacket_elbow_patch"];
if ($tuxedo_jacket_elbow_patch == "") {
	$tuxedo_jacket_elbow_patch_price = 0;
} else if ($tuxedo_jacket_elbow_patch != "") {
	$sqlprice5 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Elbow Patch' ";
	$queryprice5 = mysql_db_query($dbname, $sqlprice5) or die("Can't QueryPrice5");
	$rowprice5 = mysql_fetch_array($queryprice5);
	$tuxedo_jacket_elbow_patch_price_extra = $rowprice5["0"];
	$tuxedo_jacket_elbow_patch_price = $tuxedo_jacket_elbow_patch_price_extra;
}

$tuxedo_jacket_canvas = $_POST["tuxedo_jacket_canvas"];
if ($tuxedo_jacket_canvas != "3") {
	$tuxedo_jacket_canvas_price = 0;
} else if ($tuxedo_jacket_canvas == "3") {
	$sqlprice6 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Full Canvas' ";
	$queryprice6 = mysql_db_query($dbname, $sqlprice6) or die("Can't QueryPrice6");
	$rowprice6 = mysql_fetch_array($queryprice6);
	$tuxedo_jacket_canvas_price_extra = $rowprice6["0"];
	$tuxedo_jacket_canvas_price = $tuxedo_jacket_canvas_price_extra;
}

$tuxedo_jacket_chest_pocket_satin_fabric = $_POST["tuxedo_jacket_chest_pocket_satin_fabric"];
if ($tuxedo_jacket_chest_pocket_satin_fabric == "") {
	$tuxedo_jacket_chest_pocket_satin_fabric_price = 0;
} else if ($tuxedo_jacket_chest_pocket_satin_fabric != "") {
	$sqlprice7 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Satin Option on Chest Pocket' ";
	$queryprice7 = mysql_db_query($dbname, $sqlprice7) or die("Can't QueryPrice7");
	$rowprice7 = mysql_fetch_array($queryprice7);
	$tuxedo_jacket_chest_pocket_satin_fabric_price_extra = $rowprice7["0"];
	$tuxedo_jacket_chest_pocket_satin_fabric_price = $tuxedo_jacket_chest_pocket_satin_fabric_price_extra;
}

$tuxedo_jacket_lower_pocket_satin_fabric = $_POST["tuxedo_jacket_lower_pocket_satin_fabric"];
if ($tuxedo_jacket_lower_pocket_satin_fabric == "") {
	$tuxedo_jacket_lower_pocket_satin_fabric_price = 0;
} else if ($tuxedo_jacket_lower_pocket_satin_fabric != "") {
	$sqlprice8 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Satin Option on Lower Pocket' ";
	$queryprice8 = mysql_db_query($dbname, $sqlprice8) or die("Can't QueryPrice8");
	$rowprice8 = mysql_fetch_array($queryprice8);
	$tuxedo_jacket_lower_pocket_satin_fabric_price_extra = $rowprice8["0"];
	$tuxedo_jacket_lower_pocket_satin_fabric_price = $tuxedo_jacket_lower_pocket_satin_fabric_price_extra;
}

$tuxedo_jacket_price_1 = $tuxedo_jacket_button_price_1 + $tuxedo_jacket_embroidery_collar_initial_or_name_price + $tuxedo_jacket_brand_price + $tuxedo_jacket_pick_stitch_sleeves_price + $tuxedo_jacket_pick_stitch_vest_price + $tuxedo_jacket_elbow_patch_price + $tuxedo_jacket_canvas_price + $tuxedo_jacket_chest_pocket_satin_fabric_price + $tuxedo_jacket_lower_pocket_satin_fabric_price;

/*MY PRICES*/

$sqlmy1 = " SELECT * FROM admin_fabrics_tuxedo_jacket WHERE fabricno = '$tuxedo_jacket_fabric_no_1' ";
$querymy1 = mysql_db_query($dbname, $sqlmy1) or die("Can't Querymy1");
$rowmy1 = mysql_fetch_array($querymy1);
$fabrics_my_type = $rowmy1["type"];
$fabrics_my_brand = $rowmy1["brand"];

if ($rowmy1["type"] != '') {

$sqlmy01 = " SELECT `fabrictypereseller_".$id_user."` FROM admin_fabrictype WHERE fabrictype_name = '$fabrics_my_type' AND fabrictype_product = 'Jacket' ";
$querymy01 = mysql_db_query($dbname, $sqlmy01) or die("Can't Querymy01");
$rowmy01 = mysql_fetch_array($querymy01);
$tuxedo_jacket_fabric_my_price_1 = $rowmy01["0"];

} else if ($rowmy1["brand"] != '') {
	
$sqlmy02 = " SELECT `fabricbrand_".$id_user."` FROM admin_fabricbrand WHERE fabricbrand_name = '$fabrics_my_brand' AND fabricbrand_product = 'Jacket' ";
$querymy02 = mysql_db_query($dbname, $sqlmy02) or die("Can't Querymy02");
$rowmy02 = mysql_fetch_array($querymy02);	
$tuxedo_jacket_fabric_my_price_1 = $rowmy02["0"];
	
}

/*OTHER PRICING PARAMETERS*/
$tuxedo_jacket_jacket_measurement_chest = $_POST["tuxedo_jacket_jacket_measurement_chest"];
$tuxedo_jacket_jacket_measurement_waist_only = $_POST["tuxedo_jacket_jacket_measurement_waist_only"];
$tuxedo_jacket_jacket_measurement_hips = $_POST["tuxedo_jacket_jacket_measurement_hips"];

if (($tuxedo_jacket_jacket_measurement_chest >= '50' && $tuxedo_jacket_jacket_measurement_chest <= '52') || ($tuxedo_jacket_jacket_measurement_waist_only >= '50' && $tuxedo_jacket_jacket_measurement_waist_only <= '52') || ($tuxedo_jacket_jacket_measurement_hips >= '50' && $tuxedo_jacket_jacket_measurement_hips <= '52')) {
	
	$price_my_size_1 = $tuxedo_jacket_fabric_my_price_1 * 20;
	$price_my_size_2 = $price_my_size_1 / 100;
	$price_my_size_3 = $price_my_size_2 + $tuxedo_jacket_fabric_my_price_1;
	
} else if (($tuxedo_jacket_jacket_measurement_chest >= '52.5' && $tuxedo_jacket_jacket_measurement_chest <= '56') || ($tuxedo_jacket_jacket_measurement_waist_only >= '52.5' && $tuxedo_jacket_jacket_measurement_waist_only <= '56') || ($tuxedo_jacket_jacket_measurement_hips >= '52.5' && $tuxedo_jacket_jacket_measurement_hips <= '56')) {
	
	$price_my_size_1 = $tuxedo_jacket_fabric_my_price_1 * 30;
	$price_my_size_2 = $price_my_size_1 / 100;
	$price_my_size_3 = $price_my_size_2 + $tuxedo_jacket_fabric_my_price_1;
	
} else if (($tuxedo_jacket_jacket_measurement_chest >= '56.5' && $tuxedo_jacket_jacket_measurement_chest <= '60') || ($tuxedo_jacket_jacket_measurement_waist_only >= '56.5' && $tuxedo_jacket_jacket_measurement_waist_only <= '60') || ($tuxedo_jacket_jacket_measurement_hips >= '56.5' && $tuxedo_jacket_jacket_measurement_hips <= '60')) {
	
	$price_my_size_1 = $tuxedo_jacket_fabric_my_price_1 * 40;
	$price_my_size_2 = $price_my_size_1 / 100;
	$price_my_size_3 = $price_my_size_2 + $tuxedo_jacket_fabric_my_price_1;
	
} else if (($tuxedo_jacket_jacket_measurement_chest >= '60.5' && $tuxedo_jacket_jacket_measurement_chest <= '64') || ($tuxedo_jacket_jacket_measurement_waist_only >= '60.5' && $tuxedo_jacket_jacket_measurement_waist_only <= '64') || ($tuxedo_jacket_jacket_measurement_hips >= '60.5' && $tuxedo_jacket_jacket_measurement_hips <= '64')) {
	
	$price_my_size_1 = $tuxedo_jacket_fabric_my_price_1 * 50;
	$price_my_size_2 = $price_my_size_1 / 100;
	$price_my_size_3 = $price_my_size_2 + $tuxedo_jacket_fabric_my_price_1;
	
} else if (($tuxedo_jacket_jacket_measurement_chest >= '64.5' && $tuxedo_jacket_jacket_measurement_chest <= '68') || ($tuxedo_jacket_jacket_measurement_waist_only >= '64.5' && $tuxedo_jacket_jacket_measurement_waist_only <= '68') || ($tuxedo_jacket_jacket_measurement_hips >= '64.5' && $tuxedo_jacket_jacket_measurement_hips <= '68')) {
	
	$price_my_size_1 = $tuxedo_jacket_fabric_my_price_1 * 60;
	$price_my_size_2 = $price_my_size_1 / 100;
	$price_my_size_3 = $price_my_size_2 + $tuxedo_jacket_fabric_my_price_1;
	
}  else {
	
	$price_my_size_3 = $tuxedo_jacket_fabric_my_price_1;
	
}

/*BUTTON*/
$tuxedo_jacket_jacket_button_number = $_POST["tuxedo_jacket_jacket_button_number"];

$sql2 = " SELECT price FROM admin_buttons_suits WHERE buttonno = '$tuxedo_jacket_jacket_button_number' ";
$query2 = mysql_db_query($dbname, $sql2) or die("Can't Query2");
$row2 = mysql_fetch_array($query2);
$tuxedo_jacket_button_my_price = $row2["price"];

$tuxedo_jacket_button_my_price_1 = $price_size_3 + $tuxedo_jacket_button_my_price;

$tuxedo_jacket_embroidery_collar_initial_or_name = $_POST["tuxedo_jacket_embroidery_collar_initial_or_name"];
if ($tuxedo_jacket_embroidery_collar_initial_or_name == "") {
	$tuxedo_jacket_embroidery_collar_initial_or_name_price = 0;
} else if ($tuxedo_jacket_embroidery_collar_initial_or_name != "") {
	$sqlprice1 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Embroidery Collar Felt' ";
	$queryprice1 = mysql_db_query($dbname, $sqlprice1) or die("Can't QueryPrice1");
	$rowprice1 = mysql_fetch_array($queryprice1);
	$tuxedo_jacket_embroidery_collar_initial_or_name_my_price_extra = $rowprice1["0"];
	$tuxedo_jacket_embroidery_collar_initial_or_name_my_price = $tuxedo_jacket_embroidery_collar_initial_or_name_my_price_extra;
}

$tuxedo_jacket_brand = $_POST["tuxedo_jacket_brand"];
if ($tuxedo_jacket_brand == "0") {
	$tuxedo_jacket_brand_price = 0;
} else if ($tuxedo_jacket_brand != "0") {
	$sqlprice2 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Jacket Branding' ";
	$queryprice2 = mysql_db_query($dbname, $sqlprice2) or die("Can't QueryPrice2");
	$rowprice2 = mysql_fetch_array($queryprice2);
	$tuxedo_jacket_brand_my_price_extra = $rowprice2["0"];
	$tuxedo_jacket_brand_my_price = $tuxedo_jacket_brand_my_price_extra;
}

$tuxedo_jacket_pick_stitch = $_POST["tuxedo_jacket_pick_stitch"];
$tuxedo_jacket_pick_stitch_sleeves = $_POST["tuxedo_jacket_pick_stitch_sleeves"];
if ($tuxedo_jacket_pick_stitch == "0") {
	$tuxedo_jacket_pick_stitch_sleeves_price = 0;
} else if ($tuxedo_jacket_pick_stitch == "1" && $tuxedo_jacket_pick_stitch_sleeves != "DEFAULT TONAL") {
	$sqlprice3 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Sleeves Pick Stitch' ";
	$queryprice3 = mysql_db_query($dbname, $sqlprice3) or die("Can't QueryPrice3");
	$rowprice3 = mysql_fetch_array($queryprice3);
	$tuxedo_jacket_pick_stitch_sleeves_my_price_extra = $rowprice3["0"];
	$tuxedo_jacket_pick_stitch_sleeves_my_price = $tuxedo_jacket_pick_stitch_sleeves_my_price_extra;
}

$tuxedo_jacket_pick_stitch_vest = $_POST["tuxedo_jacket_pick_stitch_vest"];
if ($tuxedo_jacket_pick_stitch == "0") {
	$tuxedo_jacket_pick_stitch_vest_price = 0;
} else if ($tuxedo_jacket_pick_stitch == "1" && $tuxedo_jacket_pick_stitch_vest != "DEFAULT TONAL") {
	$sqlprice4 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Vent Pick Stitch' ";
	$queryprice4 = mysql_db_query($dbname, $sqlprice4) or die("Can't QueryPrice4");
	$rowprice4 = mysql_fetch_array($queryprice4);
	$tuxedo_jacket_pick_stitch_vest_my_price_extra = $rowprice4["0"];
	$tuxedo_jacket_pick_stitch_vest_my_price = $tuxedo_jacket_pick_stitch_vest_my_price_extra;
}

$tuxedo_jacket_elbow_patch = $_POST["tuxedo_jacket_elbow_patch"];
if ($tuxedo_jacket_elbow_patch == "") {
	$tuxedo_jacket_elbow_patch_price = 0;
} else if ($tuxedo_jacket_elbow_patch != "") {
	$sqlprice5 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Elbow Patch' ";
	$queryprice5 = mysql_db_query($dbname, $sqlprice5) or die("Can't QueryPrice5");
	$rowprice5 = mysql_fetch_array($queryprice5);
	$tuxedo_jacket_elbow_patch_my_price_extra = $rowprice5["0"];
	$tuxedo_jacket_elbow_patch_my_price = $tuxedo_jacket_elbow_patch_my_price_extra;
}

$tuxedo_jacket_canvas = $_POST["tuxedo_jacket_canvas"];
if ($tuxedo_jacket_canvas != "3") {
	$tuxedo_jacket_canvas_price = 0;
} else if ($tuxedo_jacket_canvas == "3") {
	$sqlprice6 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Full Canvas' ";
	$queryprice6 = mysql_db_query($dbname, $sqlprice6) or die("Can't QueryPrice6");
	$rowprice6 = mysql_fetch_array($queryprice6);
	$tuxedo_jacket_canvas_my_price_extra = $rowprice6["0"];
	$tuxedo_jacket_canvas_my_price = $tuxedo_jacket_canvas_my_price_extra;
}

$tuxedo_jacket_chest_pocket_satin_fabric = $_POST["tuxedo_jacket_chest_pocket_satin_fabric"];
if ($tuxedo_jacket_chest_pocket_satin_fabric == "") {
	$tuxedo_jacket_chest_pocket_satin_fabric_price = 0;
} else if ($tuxedo_jacket_chest_pocket_satin_fabric != "") {
	$sqlprice7 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Satin Option on Chest Pocket' ";
	$queryprice7 = mysql_db_query($dbname, $sqlprice7) or die("Can't QueryPrice7");
	$rowprice7 = mysql_fetch_array($queryprice7);
	$tuxedo_jacket_chest_pocket_satin_fabric_my_price_extra = $rowprice7["0"];
	$tuxedo_jacket_chest_pocket_satin_fabric_my_price = $tuxedo_jacket_chest_pocket_satin_fabric_my_price_extra;
}

$tuxedo_jacket_lower_pocket_satin_fabric = $_POST["tuxedo_jacket_lower_pocket_satin_fabric"];
if ($tuxedo_jacket_lower_pocket_satin_fabric == "") {
	$tuxedo_jacket_lower_pocket_satin_fabric_price = 0;
} else if ($tuxedo_jacket_lower_pocket_satin_fabric != "") {
	$sqlprice8 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Satin Option on Lower Pocket' ";
	$queryprice8 = mysql_db_query($dbname, $sqlprice8) or die("Can't QueryPrice8");
	$rowprice8 = mysql_fetch_array($queryprice8);
	$tuxedo_jacket_lower_pocket_satin_fabric_my_price_extra = $rowprice8["0"];
	$tuxedo_jacket_lower_pocket_satin_fabric_my_price = $tuxedo_jacket_lower_pocket_satin_fabric_my_price_extra;
}

$tuxedo_jacket_my_price_1 = $tuxedo_jacket_button_my_price_1 + $tuxedo_jacket_embroidery_collar_initial_or_name_my_price + $tuxedo_jacket_brand_my_price + $tuxedo_jacket_pick_stitch_sleeves_my_price + $tuxedo_jacket_pick_stitch_vest_my_price + $tuxedo_jacket_elbow_patch_my_price + $tuxedo_jacket_canvas_my_price + $tuxedo_jacket_chest_pocket_satin_fabric_my_price + $tuxedo_jacket_lower_pocket_satin_fabric_my_price;

/*CUSTOMER*/
$tuxedo_jacket_customer_name = $_POST["tuxedo_jacket_customer_name"];
$tuxedo_jacket_order_no = $_POST["tuxedo_jacket_order_no"];
$tuxedo_jacket_order_date = date("m/d/Y");
$tuxedo_jacket_delivery_date = $_POST["tuxedo_jacket_delivery_date"];

/*CUSTOMIZE*/
$tuxedo_jacket_jacket_style = $_POST["tuxedo_jacket_jacket_style"];
$tuxedo_jacket_satin_style = $_POST["tuxedo_jacket_satin_style"];
$tuxedo_jacket_collar_satin_style = $_POST["tuxedo_jacket_collar_satin_style"];
$tuxedo_jacket_satin_style = $_POST["tuxedo_jacket_satin_style"];
$tuxedo_jacket_collar_satin_style = $_POST["tuxedo_jacket_collar_satin_style"];
$tuxedo_jacket_lapel_satin_style = $_POST["tuxedo_jacket_lapel_satin_style"];
$tuxedo_jacket_half_satin_option = $_POST["tuxedo_jacket_half_satin_option"];
$tuxedo_jacket_lapel_style = $_POST["tuxedo_jacket_lapel_style"];
$tuxedo_jacket_lapel_width = $_POST["tuxedo_jacket_lapel_width"];
$tuxedo_jacket_lapel_color = $_POST["tuxedo_jacket_lapel_color"];
$tuxedo_jacket_real_lapel_boutonniere = $_POST["tuxedo_jacket_real_lapel_boutonniere"];
$tuxedo_jacket_vent_style = $_POST["tuxedo_jacket_vent_style"];
$tuxedo_jacket_pocket_style = $_POST["tuxedo_jacket_pocket_style"];
$tuxedo_jacket_chest_pocket = $_POST["tuxedo_jacket_chest_pocket"];
$tuxedo_jacket_chest_pocket_satin = $_POST["tuxedo_jacket_chest_pocket_satin"];
$tuxedo_jacket_chest_pocket_satin_color = $_POST["tuxedo_jacket_chest_pocket_satin_color"];
$tuxedo_jacket_chest_pocket_satin_fabric = $_POST["tuxedo_jacket_chest_pocket_satin_fabric"];
$tuxedo_jacket_lower_pocket_satin = $_POST["tuxedo_jacket_lower_pocket_satin"];
$tuxedo_jacket_lower_pocket_satin_color = $_POST["tuxedo_jacket_lower_pocket_satin_color"];
$tuxedo_jacket_lower_pocket_satin_fabric = $_POST["tuxedo_jacket_lower_pocket_satin_fabric"];
$tuxedo_jacket_shoulder_construction = $_POST["tuxedo_jacket_shoulder_construction"];
$tuxedo_jacket_sleeve_button = $_POST["tuxedo_jacket_sleeve_button"];
$tuxedo_jacket_cuff = $_POST["tuxedo_jacket_cuff"];
$tuxedo_jacket_all_sleevebutton_holes_color = $_POST["tuxedo_jacket_all_sleevebutton_holes_color"];
$tuxedo_jacket_contrast_last_sleevebutton_holes_color = $_POST["tuxedo_jacket_contrast_last_sleevebutton_holes_color"];
$tuxedo_jacket_contrast_last_sleevebutton_holes_button = $_POST["tuxedo_jacket_contrast_last_sleevebutton_holes_button"];
$tuxedo_jacket_lining_style = $_POST["tuxedo_jacket_lining_style"];
$tuxedo_jacket_canvas = $_POST["tuxedo_jacket_canvas"];
$tuxedo_jacket_jacket_thread_on_button = $_POST["tuxedo_jacket_jacket_thread_on_button"];
$tuxedo_jacket_jacket_button_hole_color = $_POST["tuxedo_jacket_jacket_button_hole_color"];
$tuxedo_jacket_pick_stitch = $_POST["tuxedo_jacket_pick_stitch"];
$tuxedo_jacket_pick_stitch_lapel_color = $_POST["tuxedo_jacket_pick_stitch_lapel_color"];
$tuxedo_jacket_pick_stitch_pocket_color = $_POST["tuxedo_jacket_pick_stitch_pocket_color"];
$tuxedo_jacket_pick_stitch_sleeves = $_POST["tuxedo_jacket_pick_stitch_sleeves"];
$tuxedo_jacket_pick_stitch_vest = $_POST["tuxedo_jacket_pick_stitch_vest"];
$tuxedo_jacket_embroidery_inside_initial_or_name = $_POST["tuxedo_jacket_embroidery_inside_initial_or_name"];
$tuxedo_jacket_embroidery_inside_color = $_POST["tuxedo_jacket_embroidery_inside_color"];
$tuxedo_jacket_embroidery_inside_design = $_POST["tuxedo_jacket_embroidery_inside_design"];
$tuxedo_jacket_embroidery_collar_initial_or_name = $_POST["tuxedo_jacket_embroidery_collar_initial_or_name"];
$tuxedo_jacket_embroidery_collar_color = $_POST["tuxedo_jacket_embroidery_collar_color"];
$tuxedo_jacket_embroidery_collar_design = $_POST["tuxedo_jacket_embroidery_collar_design"];
$tuxedo_jacket_brand = $_POST["tuxedo_jacket_brand"];
$tuxedo_jacket_elbow_patch = $_POST["tuxedo_jacket_elbow_patch"];
$tuxedo_jacket_collar_felt_color = $_POST["tuxedo_jacket_collar_felt_color"];

/*MEASUREMENTS*/
$tuxedo_jacket_jacket_measurement_sex = $_POST["tuxedo_jacket_jacket_measurement_sex"];
$tuxedo_jacket_jacket_measurement_fit = $_POST["tuxedo_jacket_jacket_measurement_fit"];
$tuxedo_jacket_jacket_measurement = $_POST["tuxedo_jacket_jacket_measurement"];
$tuxedo_jacket_jacket_measurement_jacket_length = $_POST["tuxedo_jacket_jacket_measurement_jacket_length"];
$tuxedo_jacket_jacket_measurement_back_lenght = $_POST["tuxedo_jacket_jacket_measurement_back_lenght"];
$tuxedo_jacket_jacket_measurement_shoulders = $_POST["tuxedo_jacket_jacket_measurement_shoulders"];
$tuxedo_jacket_jacket_measurement_neck = $_POST["tuxedo_jacket_jacket_measurement_neck"];
$tuxedo_jacket_jacket_measurement_ptp_front = $_POST["tuxedo_jacket_jacket_measurement_ptp_front"];
$tuxedo_jacket_jacket_measurement_ptp_back = $_POST["tuxedo_jacket_jacket_measurement_ptp_back"];
$tuxedo_jacket_jacket_measurement_arm_hole = $_POST["tuxedo_jacket_jacket_measurement_arm_hole"];
$tuxedo_jacket_jacket_measurement_biceps = $_POST["tuxedo_jacket_jacket_measurement_biceps"];
$tuxedo_jacket_jacket_measurement_sleeves_right = $_POST["tuxedo_jacket_jacket_measurement_sleeves_right"];
$tuxedo_jacket_jacket_measurement_sleeves_left = $_POST["tuxedo_jacket_jacket_measurement_sleeves_left"];
$tuxedo_jacket_jacket_measurement_wrist_right = $_POST["tuxedo_jacket_jacket_measurement_wrist_right"];
$tuxedo_jacket_jacket_measurement_wrist_left = $_POST["tuxedo_jacket_jacket_measurement_wrist_left"];
$tuxedo_jacket_jacket_measurement_first_button = $_POST["tuxedo_jacket_jacket_measurement_first_button"];
$tuxedo_jacket_jacket_measurement_shoulder_upper_wrist = $_POST["tuxedo_jacket_jacket_measurement_shoulder_upper_wrist"];
$tuxedo_jacket_jacket_measurement_shoulder_lower_wrist = $_POST["tuxedo_jacket_jacket_measurement_shoulder_lower_wrist"];
$tuxedo_jacket_measurement_jacket_shoulder = $_POST["tuxedo_jacket_measurement_jacket_shoulder"];
$tuxedo_jacket_measurement_jacket_waist = $_POST["tuxedo_jacket_measurement_jacket_waist"];
$tuxedo_jacket_measurement_jacket_chest = $_POST["tuxedo_jacket_measurement_jacket_chest"];
$tuxedo_jacket_body_front = $_POST["tuxedo_jacket_body_front"];
$tuxedo_jacket_body_left = $_POST["tuxedo_jacket_body_left"];
$tuxedo_jacket_body_right = $_POST["tuxedo_jacket_body_right"];
$tuxedo_jacket_body_back = $_POST["tuxedo_jacket_body_back"];
$tuxedo_jacket_remark = $_POST["tuxedo_jacket_remark"];

/*ECT*/
$tuxedo_jacket_date = date("m/d/Y");
$tuxedo_jacket_time = date("H:i:s");
$tuxedo_jacket_ip = $_POST['ip'];
$tuxedo_jacket_status = T;

$sql3 =	" UPDATE customize_order SET order_reseller = '$company_user', order_order_no = '$tuxedo_jacket_order_no', order_name_customize = '$tuxedo_jacket_customer_name', order_my_price = '$tuxedo_jacket_my_price_1', order_price = '$tuxedo_jacket_price_1', order_product = '$order_product', order_fabric_no = '$tuxedo_jacket_fabric_no_1', order_date = '$tuxedo_jacket_date', order_time = '$tuxedo_jacket_time', order_ip = '$tuxedo_jacket_ip', order_status = '$tuxedo_jacket_status' WHERE order_id = '$order_id' AND product_id = '$product_id' ";
$query3 = mysql_query($sql3) or die("Can't Query3");

$sql4 = " UPDATE customize_tuxedo_jacket_design SET tuxedo_jacket_customer_name = '$tuxedo_jacket_customer_name', tuxedo_jacket_order_no = '$tuxedo_jacket_order_no', tuxedo_jacket_order_date = '$tuxedo_jacket_order_date', tuxedo_jacket_delivery_date = '$tuxedo_jacket_delivery_date', tuxedo_jacket_fabric_no = '$tuxedo_jacket_fabric_no_1', tuxedo_jacket_lining_no = '$tuxedo_jacket_lining_no_1', tuxedo_jacket_jacket_style = '$tuxedo_jacket_jacket_style', tuxedo_jacket_satin_style = '$tuxedo_jacket_satin_style', tuxedo_jacket_collar_satin_style = '$tuxedo_jacket_collar_satin_style', tuxedo_jacket_lapel_satin_style = '$tuxedo_jacket_lapel_satin_style', tuxedo_jacket_half_satin_option = '$tuxedo_jacket_half_satin_option', tuxedo_jacket_lapel_style = '$tuxedo_jacket_lapel_style', tuxedo_jacket_lapel_width = '$tuxedo_jacket_lapel_width', tuxedo_jacket_lapel_color = '$tuxedo_jacket_lapel_color', tuxedo_jacket_real_lapel_boutonniere = '$tuxedo_jacket_real_lapel_boutonniere', tuxedo_jacket_vent_style = '$tuxedo_jacket_vent_style', tuxedo_jacket_pocket_style = '$tuxedo_jacket_pocket_style', tuxedo_jacket_chest_pocket = '$tuxedo_jacket_chest_pocket', tuxedo_jacket_chest_pocket_satin = '$tuxedo_jacket_chest_pocket_satin', tuxedo_jacket_chest_pocket_satin_color = '$tuxedo_jacket_chest_pocket_satin_color', tuxedo_jacket_chest_pocket_satin_fabric = '$tuxedo_jacket_chest_pocket_satin_fabric', tuxedo_jacket_lower_pocket_satin = '$tuxedo_jacket_lower_pocket_satin', tuxedo_jacket_lower_pocket_satin_color = '$tuxedo_jacket_lower_pocket_satin_color', tuxedo_jacket_lower_pocket_satin_fabric = '$tuxedo_jacket_lower_pocket_satin_fabric', tuxedo_jacket_shoulder_construction = '$tuxedo_jacket_shoulder_construction', tuxedo_jacket_sleeve_button = '$tuxedo_jacket_sleeve_button', tuxedo_jacket_cuff = '$tuxedo_jacket_cuff', tuxedo_jacket_all_sleevebutton_holes_color = '$tuxedo_jacket_all_sleevebutton_holes_color', tuxedo_jacket_contrast_last_sleevebutton_holes_color = '$tuxedo_jacket_contrast_last_sleevebutton_holes_color', tuxedo_jacket_contrast_last_sleevebutton_holes_button = '$tuxedo_jacket_contrast_last_sleevebutton_holes_button', tuxedo_jacket_lining_style = '$tuxedo_jacket_lining_style', tuxedo_jacket_canvas = '$tuxedo_jacket_canvas', tuxedo_jacket_jacket_button_number = '$tuxedo_jacket_jacket_button_number', tuxedo_jacket_jacket_thread_on_button = '$tuxedo_jacket_jacket_thread_on_button', tuxedo_jacket_jacket_button_hole_color = '$tuxedo_jacket_jacket_button_hole_color', tuxedo_jacket_pick_stitch = '$tuxedo_jacket_pick_stitch', tuxedo_jacket_pick_stitch_lapel_color = '$tuxedo_jacket_pick_stitch_lapel_color', tuxedo_jacket_pick_stitch_pocket_color = '$tuxedo_jacket_pick_stitch_pocket_color', tuxedo_jacket_pick_stitch_sleeves = '$tuxedo_jacket_pick_stitch_sleeves', tuxedo_jacket_pick_stitch_vest = '$tuxedo_jacket_pick_stitch_vest', tuxedo_jacket_embroidery_inside_initial_or_name = '$tuxedo_jacket_embroidery_inside_initial_or_name', tuxedo_jacket_embroidery_inside_color = '$tuxedo_jacket_embroidery_inside_color', tuxedo_jacket_embroidery_inside_design = '$tuxedo_jacket_embroidery_inside_design', tuxedo_jacket_embroidery_collar_initial_or_name = '$tuxedo_jacket_embroidery_collar_initial_or_name', tuxedo_jacket_embroidery_collar_color = '$tuxedo_jacket_embroidery_collar_color', tuxedo_jacket_embroidery_collar_design = '$tuxedo_jacket_embroidery_collar_design', tuxedo_jacket_brand = '$tuxedo_jacket_brand', tuxedo_jacket_elbow_patch = '$tuxedo_jacket_elbow_patch', tuxedo_jacket_collar_felt_color = '$tuxedo_jacket_collar_felt_color', tuxedo_jacket_date = '$tuxedo_jacket_date', tuxedo_jacket_time = '$tuxedo_jacket_time', tuxedo_jacket_ip = '$tuxedo_jacket_ip', tuxedo_jacket_status = '$tuxedo_jacket_status' WHERE order_id = '$order_id' AND product_id = '$product_id' ";
$query4 = mysql_query($sql4) or die("Can't Query4");

$sql5 = " UPDATE customize_tuxedo_jacket_measurements SET tuxedo_jacket_jacket_measurement_sex = '$tuxedo_jacket_jacket_measurement_sex', tuxedo_jacket_jacket_measurement_fit = '$tuxedo_jacket_jacket_measurement_fit', tuxedo_jacket_jacket_measurement = '$tuxedo_jacket_jacket_measurement', tuxedo_jacket_jacket_measurement_jacket_length = '$tuxedo_jacket_jacket_measurement_jacket_length', tuxedo_jacket_jacket_measurement_back_lenght = '$tuxedo_jacket_jacket_measurement_back_lenght', tuxedo_jacket_jacket_measurement_chest = '$tuxedo_jacket_jacket_measurement_chest', tuxedo_jacket_jacket_measurement_waist_only = '$tuxedo_jacket_jacket_measurement_waist_only', tuxedo_jacket_jacket_measurement_hips = '$tuxedo_jacket_jacket_measurement_hips', tuxedo_jacket_jacket_measurement_shoulders = '$tuxedo_jacket_jacket_measurement_shoulders', tuxedo_jacket_jacket_measurement_neck = '$tuxedo_jacket_jacket_measurement_neck', tuxedo_jacket_jacket_measurement_ptp_front = '$tuxedo_jacket_jacket_measurement_ptp_front', tuxedo_jacket_jacket_measurement_ptp_back = '$tuxedo_jacket_jacket_measurement_ptp_back', tuxedo_jacket_jacket_measurement_arm_hole = '$tuxedo_jacket_jacket_measurement_arm_hole', tuxedo_jacket_jacket_measurement_biceps = '$tuxedo_jacket_jacket_measurement_biceps', tuxedo_jacket_jacket_measurement_sleeves_right = '$tuxedo_jacket_jacket_measurement_sleeves_right', tuxedo_jacket_jacket_measurement_sleeves_left = '$tuxedo_jacket_jacket_measurement_sleeves_left', tuxedo_jacket_jacket_measurement_wrist_right = '$tuxedo_jacket_jacket_measurement_wrist_right', tuxedo_jacket_jacket_measurement_wrist_left = '$tuxedo_jacket_jacket_measurement_wrist_left', tuxedo_jacket_jacket_measurement_first_button = '$tuxedo_jacket_jacket_measurement_first_button', tuxedo_jacket_jacket_measurement_shoulder_upper_wrist = '$tuxedo_jacket_jacket_measurement_shoulder_upper_wrist', tuxedo_jacket_jacket_measurement_shoulder_lower_wrist = '$tuxedo_jacket_jacket_measurement_shoulder_lower_wrist', tuxedo_jacket_measurement_jacket_shoulder = '$tuxedo_jacket_measurement_jacket_shoulder', tuxedo_jacket_measurement_jacket_waist = '$tuxedo_jacket_measurement_jacket_waist', tuxedo_jacket_measurement_jacket_chest = '$tuxedo_jacket_measurement_jacket_chest', tuxedo_jacket_remark = '$tuxedo_jacket_remark', tuxedo_jacket_date = '$tuxedo_jacket_date', tuxedo_jacket_time = '$tuxedo_jacket_time', tuxedo_jacket_ip = '$tuxedo_jacket_ip', tuxedo_jacket_status = '$tuxedo_jacket_status' WHERE order_id = '$order_id' AND product_id = '$product_id' ";
$query5 = mysql_query($sql5) or die("Can't Query5");

$path = "../../images/body/tuxedo_jacket/front/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['tuxedo_jacket_body_front']['name'];
	$tmp = $_FILES['tuxedo_jacket_body_front']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$tuxedo_jacket_body_front_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$tuxedo_jacket_body_front_pic)){
				
				$sql6 = " UPDATE customize_tuxedo_jacket_measurements SET tuxedo_jacket_body_front = '".$tuxedo_jacket_body_front_pic."', tuxedo_jacket_date = '".$tuxedo_jacket_date."', tuxedo_jacket_time = '".$tuxedo_jacket_time."', tuxedo_jacket_ip = '".$tuxedo_jacket_ip."', tuxedo_jacket_status = '".$tuxedo_jacket_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query6 = mysql_db_query($dbname, $sql6) or die("Can't Query6");
			}
    
	} else {
				$sql6 = " UPDATE customize_tuxedo_jacket_measurements SET tuxedo_jacket_date = '".$tuxedo_jacket_date."', tuxedo_jacket_time = '".$tuxedo_jacket_time."', tuxedo_jacket_ip = '".$tuxedo_jacket_ip."', tuxedo_jacket_status = '".$tuxedo_jacket_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query6 = mysql_db_query($dbname, $sql6) or die("Can't Query6");
			}
	}
	
$path = "../../images/body/tuxedo_jacket/left/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['tuxedo_jacket_body_left']['name'];
	$tmp = $_FILES['tuxedo_jacket_body_left']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$tuxedo_jacket_body_left_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$tuxedo_jacket_body_left_pic)){
				
				$sql7 = " UPDATE customize_tuxedo_jacket_measurements SET tuxedo_jacket_body_left = '".$tuxedo_jacket_body_left_pic."', tuxedo_jacket_date = '".$tuxedo_jacket_date."', tuxedo_jacket_time = '".$tuxedo_jacket_time."', tuxedo_jacket_ip = '".$tuxedo_jacket_ip."', tuxedo_jacket_status = '".$tuxedo_jacket_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query7 = mysql_db_query($dbname, $sql7) or die("Can't Query7");
			}
    
	} else {
				$sql7 = " UPDATE customize_tuxedo_jacket_measurements SET tuxedo_jacket_date = '".$tuxedo_jacket_date."', tuxedo_jacket_time = '".$tuxedo_jacket_time."', tuxedo_jacket_ip = '".$tuxedo_jacket_ip."', tuxedo_jacket_status = '".$tuxedo_jacket_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query7 = mysql_db_query($dbname, $sql7) or die("Can't Query7");
			}
	}
	
$path = "../../images/body/tuxedo_jacket/right/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['tuxedo_jacket_body_right']['name'];
	$tmp = $_FILES['tuxedo_jacket_body_right']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$tuxedo_jacket_body_right_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$tuxedo_jacket_body_right_pic)){
				
				$sql8 = " UPDATE customize_tuxedo_jacket_measurements SET tuxedo_jacket_body_right = '".$tuxedo_jacket_body_right_pic."', tuxedo_jacket_date = '".$tuxedo_jacket_date."', tuxedo_jacket_time = '".$tuxedo_jacket_time."', tuxedo_jacket_ip = '".$tuxedo_jacket_ip."', tuxedo_jacket_status = '".$tuxedo_jacket_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query8 = mysql_db_query($dbname, $sql8) or die("Can't Query8");
			}
    
	} else {
				$sql8 = " UPDATE customize_tuxedo_jacket_measurements SET tuxedo_jacket_date = '".$tuxedo_jacket_date."', tuxedo_jacket_time = '".$tuxedo_jacket_time."', tuxedo_jacket_ip = '".$tuxedo_jacket_ip."', tuxedo_jacket_status = '".$tuxedo_jacket_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query8 = mysql_db_query($dbname, $sql8) or die("Can't Query8");
			}
	}
	
$path = "../../images/body/tuxedo_jacket/back/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['tuxedo_jacket_body_back']['name'];
	$tmp = $_FILES['tuxedo_jacket_body_back']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$tuxedo_jacket_body_back_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$tuxedo_jacket_body_back_pic)){
				
				$sql9 = " UPDATE customize_tuxedo_jacket_measurements SET tuxedo_jacket_body_back = '".$tuxedo_jacket_body_back_pic."', tuxedo_jacket_date = '".$tuxedo_jacket_date."', tuxedo_jacket_time = '".$tuxedo_jacket_time."', tuxedo_jacket_ip = '".$tuxedo_jacket_ip."', tuxedo_jacket_status = '".$tuxedo_jacket_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query9 = mysql_db_query($dbname, $sql9) or die("Can't Query9");
			}
    
	} else {
				$sql9 = " UPDATE customize_tuxedo_jacket_measurements SET tuxedo_jacket_date = '".$tuxedo_jacket_date."', tuxedo_jacket_time = '".$tuxedo_jacket_time."', tuxedo_jacket_ip = '".$tuxedo_jacket_ip."', tuxedo_jacket_status = '".$tuxedo_jacket_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query9 = mysql_db_query($dbname, $sql9) or die("Can't Query9");
			}
	}

if($query9) {
	
	echo " <script language='javascript'> window.location='../../cart/multiple/index.php?orderid=".$order_id."'; </script> ";
	
}

mysql_close();
?>