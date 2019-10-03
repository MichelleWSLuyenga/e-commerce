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

$order_id_same = $_POST["tuxedo_with_vest_orderid"];
$product_id_same = $_POST["tuxedo_with_vest_productid"];
	
$sql1 =	" SELECT * FROM customize_tuxedo_with_vest_design WHERE order_id = '$order_id_same' AND product_id = '$product_id_same' ";
$query1 = mysql_db_query($dbname, $sql1) or die("Can't Query1");
$row1 = mysql_fetch_array($query1);

$sql2 =	" SELECT * FROM customize_tuxedo_with_vest_measurements WHERE order_id = '$order_id_same' AND product_id = '$product_id_same' ";
$query2 = mysql_db_query($dbname, $sql2) or die("Can't Query2");
$row2 = mysql_fetch_array($query2);

$sql03 = " SELECT * FROM customize_order WHERE order_id = '$order_id_same' AND product_id = '$product_id_same' ";
$query03 = mysql_db_query($dbname, $sql03) or die("Can't Query03");
$row03 = mysql_fetch_array($query03);

$sql4 =	" SELECT MAX(id) FROM customize_order ";
$query4 = mysql_db_query($dbname, $sql4) or die("Can't Query4");
$row4 = mysql_fetch_array($query4);
$id_order = $row4[0] + 1 ;

$sql5 =	" SELECT MAX(product_id) FROM customize_order ";
$query5 = mysql_db_query($dbname, $sql5) or die("Can't Query5");
$row5 = mysql_fetch_array($query5);
$product_id = $row5[0] + 1 ;

$sql6 =	" SELECT MAX(id) FROM customize_tuxedo_with_vest_design ";
$query6 = mysql_db_query($dbname, $sql6) or die("Can't Query6");
$row6 = mysql_fetch_array($query6);
$id_tuxedo_with_vest = $row6[0] + 1 ;

/*FABRIC*/
$tuxedo_with_vest_fabric_no_1 = $_POST["tuxedo_with_vest_fabric_no_1"];
$tuxedo_with_vest_lining_no_1 = $_POST["tuxedo_with_vest_lining_no_1"];

$sql001 = " SELECT * FROM admin_fabrics_tuxedo_with_vest WHERE fabricno = '$tuxedo_with_vest_fabric_no_1' ";
$query001 = mysql_db_query($dbname, $sql001) or die("Can't Query001");
$row001 = mysql_fetch_array($query001);
$fabrics_type = $row001["type"];
$fabrics_brand = $row001["brand"];

if ($row001["type"] != '') {

$sql01 = " SELECT `fabrictype_".$id_user."` FROM admin_fabrictype WHERE fabrictype_name = '$fabrics_type' AND fabrictype_product = 'Suits' ";
$query01 = mysql_db_query($dbname, $sql01) or die("Can't Query01");
$row01 = mysql_fetch_array($query01);

$sql001 = " SELECT `fabrictype_".$id_user."` FROM admin_fabrictype WHERE fabrictype_name = '$fabrics_type' AND fabrictype_product = 'Vest' ";
$query001 = mysql_db_query($dbname, $sql001) or die("Can't Query001");
$row001 = mysql_fetch_array($query001);

$suits_fabric_price_1 = $row01["0"];
$vest_fabric_price_1 = $row001["0"];

$tuxedo_with_vest_fabric_price_1 = $suits_fabric_price_1 + $vest_fabric_price_1;

} else if ($row001["brand"] != '') {
	
$sql02 = " SELECT `fabricbrand_".$id_user."` FROM admin_fabricbrand WHERE fabricbrand_name = '$fabrics_brand' AND fabricbrand_product = 'Suits' ";
$query02 = mysql_db_query($dbname, $sql02) or die("Can't Query02");
$row02 = mysql_fetch_array($query02);	

$sql002 = " SELECT `fabricbrand_".$id_user."` FROM admin_fabricbrand WHERE fabricbrand_name = '$fabrics_brand' AND fabricbrand_product = 'Vest' ";
$query002 = mysql_db_query($dbname, $sql002) or die("Can't Query002");
$row002 = mysql_fetch_array($query002);

$suits_fabric_price_1 = $row02["0"];
$vest_fabric_price_1 = $row002["0"];

$tuxedo_with_vest_fabric_price_1 = $suits_fabric_price_1 + $vest_fabric_price_1;
	
}

/*OTHER PRICING PARAMETERS*/
$tuxedo_with_vest_jacket_measurement_chest = $row1["tuxedo_with_vest_jacket_measurement_chest"];
$tuxedo_with_vest_jacket_measurement_waist_only = $row1["tuxedo_with_vest_jacket_measurement_waist_only"];
$tuxedo_with_vest_jacket_measurement_hips = $row1["tuxedo_with_vest_jacket_measurement_hips"];

if (($tuxedo_with_vest_jacket_measurement_chest >= '50' && $tuxedo_with_vest_jacket_measurement_chest <= '52') || ($tuxedo_with_vest_jacket_measurement_waist_only >= '50' && $tuxedo_with_vest_jacket_measurement_waist_only <= '52') || ($tuxedo_with_vest_jacket_measurement_hips >= '50' && $tuxedo_with_vest_jacket_measurement_hips <= '52')) {
	
	$price_size_1 = $tuxedo_with_vest_fabric_price_1 * 20;
	$price_size_2 = $price_size_1 / 100;
	
} else if (($tuxedo_with_vest_jacket_measurement_chest >= '52.5' && $tuxedo_with_vest_jacket_measurement_chest <= '56') || ($tuxedo_with_vest_jacket_measurement_waist_only >= '52.5' && $tuxedo_with_vest_jacket_measurement_waist_only <= '56') || ($tuxedo_with_vest_jacket_measurement_hips >= '52.5' && $tuxedo_with_vest_jacket_measurement_hips <= '56')) {
	
	$price_size_1 = $tuxedo_with_vest_fabric_price_1 * 30;
	$price_size_2 = $price_size_1 / 100;
	
} else if (($tuxedo_with_vest_jacket_measurement_chest >= '56.5' && $tuxedo_with_vest_jacket_measurement_chest <= '60') || ($tuxedo_with_vest_jacket_measurement_waist_only >= '56.5' && $tuxedo_with_vest_jacket_measurement_waist_only <= '60') || ($tuxedo_with_vest_jacket_measurement_hips >= '56.5' && $tuxedo_with_vest_jacket_measurement_hips <= '60')) {
	
	$price_size_1 = $tuxedo_with_vest_fabric_price_1 * 40;
	$price_size_2 = $price_size_1 / 100;
	
} else if (($tuxedo_with_vest_jacket_measurement_chest >= '60.5' && $tuxedo_with_vest_jacket_measurement_chest <= '64') || ($tuxedo_with_vest_jacket_measurement_waist_only >= '60.5' && $tuxedo_with_vest_jacket_measurement_waist_only <= '64') || ($tuxedo_with_vest_jacket_measurement_hips >= '60.5' && $tuxedo_with_vest_jacket_measurement_hips <= '64')) {
	
	$price_size_1 = $tuxedo_with_vest_fabric_price_1 * 50;
	$price_size_2 = $price_size_1 / 100;
	
} else if (($tuxedo_with_vest_jacket_measurement_chest >= '64.5' && $tuxedo_with_vest_jacket_measurement_chest <= '68') || ($tuxedo_with_vest_jacket_measurement_waist_only >= '64.5' && $tuxedo_with_vest_jacket_measurement_waist_only <= '68') || ($tuxedo_with_vest_jacket_measurement_hips >= '64.5' && $tuxedo_with_vest_jacket_measurement_hips <= '68')) {
	
	$price_size_1 = $tuxedo_with_vest_fabric_price_1 * 60;
	$price_size_2 = $price_size_1 / 100;
	
}  else {
	
	$price_size_2 = 0;
	
}

$tuxedo_with_vest_pants_measurement_waist = $row1["tuxedo_with_vest_pants_measurement_waist"];
$tuxedo_with_vest_pants_measurement_hips = $row1["tuxedo_with_vest_pants_measurement_hips"];

if (($tuxedo_with_vest_pants_measurement_waist >= '50' && $tuxedo_with_vest_pants_measurement_waist <= '52') || ($tuxedo_with_vest_pants_measurement_hips >= '50' && $tuxedo_with_vest_pants_measurement_hips <= '52')) {
	
	$price_size_18 = $tuxedo_with_vest_fabric_price_1 * 20;
	$price_size_19 = $price_size_18 / 100;
	
} else if (($tuxedo_with_vest_pants_measurement_waist >= '52.5' && $tuxedo_with_vest_pants_measurement_waist <= '56') || ($tuxedo_with_vest_pants_measurement_hips >= '52.5' && $tuxedo_with_vest_pants_measurement_hips <= '56')) {
	
	$price_size_18 = $tuxedo_with_vest_fabric_price_1 * 30;
	$price_size_19 = $price_size_18 / 100;
	
} else if (($tuxedo_with_vest_pants_measurement_waist >= '56.5' && $tuxedo_with_vest_pants_measurement_waist <= '60') || ($tuxedo_with_vest_pants_measurement_hips >= '56.5' && $tuxedo_with_vest_pants_measurement_hips <= '60')) {
	
	$price_size_18 = $tuxedo_with_vest_fabric_price_1 * 40;
	$price_size_19 = $price_size_18 / 100;
	
} else if (($tuxedo_with_vest_pants_measurement_waist >= '60.5' && $tuxedo_with_vest_pants_measurement_waist <= '64') || ($tuxedo_with_vest_pants_measurement_hips >= '60.5' && $tuxedo_with_vest_pants_measurement_hips <= '64')) {
	
	$price_size_18 = $tuxedo_with_vest_fabric_price_1 * 50;
	$price_size_19 = $price_size_18 / 100;
	
} else if (($tuxedo_with_vest_pants_measurement_waist >= '64.5' && $tuxedo_with_vest_pants_measurement_waist <= '68') || ($tuxedo_with_vest_pants_measurement_hips >= '64.5' && $tuxedo_with_vest_pants_measurement_hips <= '68')) {
	
	$price_size_18 = $tuxedo_with_vest_fabric_price_1 * 60;
	$price_size_19 = $price_size_18 / 100;
	
}  else {
	
	$price_size_19 = 0;
	
}

$tuxedo_with_vest_vest_measurement_chest = $row1["tuxedo_with_vest_vest_measurement_chest"];
$tuxedo_with_vest_vest_measurement_waist_only = $row1["tuxedo_with_vest_vest_measurement_waist_only"];
$tuxedo_with_vest_vest_measurement_hips = $row1["tuxedo_with_vest_vest_measurement_hips"];

if (($tuxedo_with_vest_vest_measurement_chest >= '50' && $tuxedo_with_vest_vest_measurement_chest <= '52') || ($tuxedo_with_vest_vest_measurement_waist_only >= '50' && $tuxedo_with_vest_vest_measurement_waist_only <= '52') || ($tuxedo_with_vest_vest_measurement_hips >= '50' && $tuxedo_with_vest_vest_measurement_hips <= '52')) {
	
	$price_size_30 = $tuxedo_with_vest_fabric_price_1 * 20;
	$price_size_31 = $price_size_30 / 100;
	
} else if (($tuxedo_with_vest_vest_measurement_chest >= '52.5' && $tuxedo_with_vest_vest_measurement_chest <= '56') || ($tuxedo_with_vest_vest_measurement_waist_only >= '52.5' && $tuxedo_with_vest_vest_measurement_waist_only <= '56') || ($tuxedo_with_vest_vest_measurement_hips >= '52.5' && $tuxedo_with_vest_vest_measurement_hips <= '56')) {
	
	$price_size_30 = $tuxedo_with_vest_fabric_price_1 * 30;
	$price_size_31 = $price_size_30 / 100;
	
} else if (($tuxedo_with_vest_vest_measurement_chest >= '56.5' && $tuxedo_with_vest_vest_measurement_chest <= '60') || ($tuxedo_with_vest_vest_measurement_waist_only >= '56.5' && $tuxedo_with_vest_vest_measurement_waist_only <= '60') || ($tuxedo_with_vest_vest_measurement_hips >= '56.5' && $tuxedo_with_vest_vest_measurement_hips <= '60')) {
	
	$price_size_30 = $tuxedo_with_vest_fabric_price_1 * 40;
	$price_size_31 = $price_size_30 / 100;
	
} else if (($tuxedo_with_vest_vest_measurement_chest >= '60.5' && $tuxedo_with_vest_vest_measurement_chest <= '64') || ($tuxedo_with_vest_vest_measurement_waist_only >= '60.5' && $tuxedo_with_vest_vest_measurement_waist_only <= '64') || ($tuxedo_with_vest_vest_measurement_hips >= '60.5' && $tuxedo_with_vest_vest_measurement_hips <= '64')) {
	
	$price_size_30 = $tuxedo_with_vest_fabric_price_1 * 50;
	$price_size_31 = $price_size_30 / 100;
	
} else if (($tuxedo_with_vest_vest_measurement_chest >= '64.5' && $tuxedo_with_vest_vest_measurement_chest <= '68') || ($tuxedo_with_vest_vest_measurement_waist_only >= '64.5' && $tuxedo_with_vest_vest_measurement_waist_only <= '68') || ($tuxedo_with_vest_vest_measurement_hips >= '64.5' && $tuxedo_with_vest_vest_measurement_hips <= '68')) {
	
	$price_size_30 = $tuxedo_with_vest_fabric_price_1 * 60;
	$price_size_31 = $price_size_30 / 100;
	
}  else {
	
	$price_size_31 = 0;
	
}

$price_size_42 = $price_size_2 + $price_size_19;

$price_size_48 = $price_size_42 + $price_size_31;

$price_size_54 = $price_size_48 + $tuxedo_with_vest_fabric_price_1;

/*BUTTON*/
$tuxedo_with_vest_jacket_button_number = $row1["tuxedo_with_vest_jacket_button_number"];

$sql002 = " SELECT price FROM admin_buttons_suits WHERE buttonno = '$tuxedo_with_vest_jacket_button_number' ";
$query002 = mysql_db_query($dbname, $sql002) or die("Can't Query002");
$row002 = mysql_fetch_array($query002);
$tuxedo_with_vest_jacket_button_price = $row002["price"];

$tuxedo_with_vest_pants_button_number = $row1["tuxedo_with_vest_pants_button_number"];

$sql003 = " SELECT price FROM admin_buttons_suits WHERE buttonno = '$tuxedo_with_vest_pants_button_number' ";
$query003 = mysql_db_query($dbname, $sql003) or die("Can't Query003");
$row003 = mysql_fetch_array($query003);
$tuxedo_with_vest_pants_button_price = $row003["price"];

$tuxedo_with_vest_vest_button_number = $row1["tuxedo_with_vest_vest_button_number"];

$sql004 = " SELECT price FROM admin_buttons_suits WHERE buttonno = '$tuxedo_with_vest_vest_button_number' ";
$query004 = mysql_db_query($dbname, $sql004) or die("Can't Query004");
$row004 = mysql_fetch_array($query004);
$tuxedo_with_vest_vest_button_price = $row004["price"];

$tuxedo_with_vest_pants_back_button = $row1["tuxedo_with_vest_pants_back_button"];
$tuxedo_with_vest_pants_back_button_number = $row1["tuxedo_with_vest_pants_back_button_number"];

$tuxedo_with_vest_jacket_pants_button_price = $tuxedo_with_vest_jacket_button_price + $tuxedo_with_vest_pants_button_price;

$tuxedo_with_vest_button_price = $tuxedo_with_vest_jacket_pants_button_price + $tuxedo_with_vest_vest_button_price;

$tuxedo_with_vest_button_price_1 = $price_size_54 + $tuxedo_with_vest_button_price;

$tuxedo_with_vest_embroidery_collar_initial_or_name = $row1["tuxedo_with_vest_embroidery_collar_initial_or_name"];
if ($tuxedo_with_vest_embroidery_collar_initial_or_name == "") {
	$tuxedo_with_vest_embroidery_collar_initial_or_name_price = 0;
} else if ($tuxedo_with_vest_embroidery_collar_initial_or_name != "") {
	$sqlprice1 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Embroidery Collar Felt' ";
	$queryprice1 = mysql_db_query($dbname, $sqlprice1) or die("Can't QueryPrice1");
	$rowprice1 = mysql_fetch_array($queryprice1);
	$tuxedo_with_vest_embroidery_collar_initial_or_name_price_extra = $rowprice1["0"];
	$tuxedo_with_vest_embroidery_collar_initial_or_name_price = $tuxedo_with_vest_embroidery_collar_initial_or_name_price_extra;
}

$tuxedo_with_vest_brand = $row1["tuxedo_with_vest_brand"];
if ($tuxedo_with_vest_brand == "0") {
	$tuxedo_with_vest_brand_price = 0;
} else if ($tuxedo_with_vest_brand != "0") {
	$sqlprice2 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Jacket Branding' ";
	$queryprice2 = mysql_db_query($dbname, $sqlprice2) or die("Can't QueryPrice2");
	$rowprice2 = mysql_fetch_array($queryprice2);
	$tuxedo_with_vest_brand_price_extra = $rowprice2["0"];
	$tuxedo_with_vest_brand_price = $tuxedo_with_vest_brand_price_extra;
}

$tuxedo_with_vest_pick_stitch = $row1["tuxedo_with_vest_pick_stitch"];
$tuxedo_with_vest_pick_stitch_sleeves = $row1["tuxedo_with_vest_pick_stitch_sleeves"];
if ($tuxedo_with_vest_pick_stitch == "0") {
	$tuxedo_with_vest_pick_stitch_sleeves_price = 0;
} else if ($tuxedo_with_vest_pick_stitch == "1" && $tuxedo_with_vest_pick_stitch_sleeves != "DEFAULT TONAL") {
	$sqlprice3 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Sleeves Pick Stitch' ";
	$queryprice3 = mysql_db_query($dbname, $sqlprice3) or die("Can't QueryPrice3");
	$rowprice3 = mysql_fetch_array($queryprice3);
	$tuxedo_with_vest_pick_stitch_sleeves_price_extra = $rowprice3["0"];
	$tuxedo_with_vest_pick_stitch_sleeves_price = $tuxedo_with_vest_pick_stitch_sleeves_price_extra;
}

$tuxedo_with_vest_pick_stitch_vest = $row1["tuxedo_with_vest_pick_stitch_vest"];
if ($tuxedo_with_vest_pick_stitch == "0") {
	$tuxedo_with_vest_pick_stitch_vest_price = 0;
} else if ($tuxedo_with_vest_pick_stitch == "1" && $tuxedo_with_vest_pick_stitch_vest != "DEFAULT TONAL") {
	$sqlprice4 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Vent Pick Stitch' ";
	$queryprice4 = mysql_db_query($dbname, $sqlprice4) or die("Can't QueryPrice4");
	$rowprice4 = mysql_fetch_array($queryprice4);
	$tuxedo_with_vest_pick_stitch_vest_price_extra = $rowprice4["0"];
	$tuxedo_with_vest_pick_stitch_vest_price = $tuxedo_with_vest_pick_stitch_vest_price_extra;
}

$tuxedo_with_vest_elbow_patch = $row1["tuxedo_with_vest_elbow_patch"];
if ($tuxedo_with_vest_elbow_patch == "") {
	$tuxedo_with_vest_elbow_patch_price = 0;
} else if ($tuxedo_with_vest_elbow_patch != "") {
	$sqlprice5 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Elbow Patch' ";
	$queryprice5 = mysql_db_query($dbname, $sqlprice5) or die("Can't QueryPrice5");
	$rowprice5 = mysql_fetch_array($queryprice5);
	$tuxedo_with_vest_elbow_patch_price_extra = $rowprice5["0"];
	$tuxedo_with_vest_elbow_patch_price = $tuxedo_with_vest_elbow_patch_price_extra;
}

$tuxedo_with_vest_canvas = $row1["tuxedo_with_vest_canvas"];
if ($tuxedo_with_vest_canvas != "3") {
	$tuxedo_with_vest_canvas_price = 0;
} else if ($tuxedo_with_vest_canvas == "3") {
	$sqlprice6 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Full Canvas' ";
	$queryprice6 = mysql_db_query($dbname, $sqlprice6) or die("Can't QueryPrice6");
	$rowprice6 = mysql_fetch_array($queryprice6);
	$tuxedo_with_vest_canvas_price_extra = $rowprice6["0"];
	$tuxedo_with_vest_canvas_price = $tuxedo_with_vest_canvas_price_extra;
}

$tuxedo_with_vest_chest_pocket_satin_fabric = $row1["tuxedo_with_vest_chest_pocket_satin_fabric"];
if ($tuxedo_with_vest_chest_pocket_satin_fabric == "") {
	$tuxedo_with_vest_chest_pocket_satin_fabric_price = 0;
} else if ($tuxedo_jacket_chest_pocket_satin_fabric != "") {
	$sqlprice7 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Satin Option on Chest Pocket' ";
	$queryprice7 = mysql_db_query($dbname, $sqlprice7) or die("Can't QueryPrice7");
	$rowprice7 = mysql_fetch_array($queryprice7);
	$tuxedo_with_vest_chest_pocket_satin_fabric_price_extra = $rowprice7["0"];
	$tuxedo_with_vest_chest_pocket_satin_fabric_price = $tuxedo_with_vest_chest_pocket_satin_fabric_price_extra;
}

$tuxedo_with_vest_lower_pocket_satin_fabric = $row1["tuxedo_with_vest_lower_pocket_satin_fabric"];
if ($tuxedo_with_vest_lower_pocket_satin_fabric == "") {
	$tuxedo_with_vest_lower_pocket_satin_fabric_price = 0;
} else if ($tuxedo_with_vest_lower_pocket_satin_fabric != "") {
	$sqlprice8 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Satin Option on Lower Pocket' ";
	$queryprice8 = mysql_db_query($dbname, $sqlprice8) or die("Can't QueryPrice8");
	$rowprice8 = mysql_fetch_array($queryprice8);
	$tuxedo_with_vest_lower_pocket_satin_fabric_price_extra = $rowprice8["0"];
	$tuxedo_with_vest_lower_pocket_satin_fabric_price = $tuxedo_with_vest_lower_pocket_satin_fabric_price_extra;
}

$tuxedo_with_vest_coin_pocket_inside = $row1["tuxedo_with_vest_coin_pocket_inside"];
if ($tuxedo_with_vest_coin_pocket_inside != "1") {
	$tuxedo_with_vest_coin_pocket_inside_price = 0;
} else if ($tuxedo_with_vest_coin_pocket_inside == "1") {
	$sqlprice9 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Coin Pocket Inside' ";
	$queryprice9 = mysql_db_query($dbname, $sqlprice9) or die("Can't QueryPrice9");
	$rowprice9 = mysql_fetch_array($queryprice9);
	$tuxedo_with_vest_coin_pocket_inside_price_extra = $rowprice9["0"];
	$tuxedo_with_vest_coin_pocket_inside_price = $tuxedo_with_vest_coin_pocket_inside_price_extra;
}

$tuxedo_with_vest_suspender_buttons_inside = $row1["tuxedo_with_vest_suspender_buttons_inside"];
if ($tuxedo_with_vest_suspender_buttons_inside != "1") {
	$tuxedo_with_vest_suspender_buttons_inside_price = 0;
} else if ($tuxedo_with_vest_suspender_buttons_inside == "1") {
	$sqlprice10 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Suspender Buttons Inside' ";
	$queryprice10 = mysql_db_query($dbname, $sqlprice10) or die("Can't QueryPrice10");
	$rowprice10= mysql_fetch_array($queryprice10);
	$tuxedo_with_vest_suspender_buttons_inside_price_extra = $rowprice10["0"];
	$tuxedo_with_vest_suspender_buttons_inside_price = $tuxedo_with_vest_suspender_buttons_inside_price_extra;
}

$tuxedo_with_vest_split_tabs_back = $row1["tuxedo_with_vest_split_tabs_back"];
if ($tuxedo_with_vest_split_tabs_back != "1") {
	$tuxedo_with_vest_split_tabs_back_price = 0;
} else if ($tuxedo_with_vest_split_tabs_back == "1") {
	$sqlprice11 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Split Tabs Back' ";
	$queryprice11 = mysql_db_query($dbname, $sqlprice11) or die("Can't QueryPrice11");
	$rowprice11 = mysql_fetch_array($queryprice11);
	$tuxedo_with_vest_split_tabs_back_price_extra = $rowprice11["0"];
	$tuxedo_with_vest_split_tabs_back_price = $tuxedo_with_vest_split_tabs_back_price_extra;
}

$tuxedo_with_vest_tuxedo_satin = $row1["tuxedo_with_vest_tuxedo_satin"];
if ($tuxedo_with_vest_tuxedo_satin != "1") {
	$tuxedo_with_vest_tuxedo_satin_price = 0;
} else if ($tuxedo_with_vest_tuxedo_satin == "1") {
	$sqlprice12 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Tuxedo Satin on Side' ";
	$queryprice12 = mysql_db_query($dbname, $sqlprice12) or die("Can't QueryPrice12");
	$rowprice12 = mysql_fetch_array($queryprice12);
	$tuxedo_with_vest_tuxedo_satin_price_extra = $rowprice12["0"];
	$tuxedo_with_vest_tuxedo_satin_price = $tuxedo_with_vest_tuxedo_satin_price_extra;
}

$tuxedo_with_vest_tuxedo_satin_waist_band = $row1["tuxedo_with_vest_tuxedo_satin_waist_band"];
$tuxedo_with_vest_internal_waistband_color = $row1["tuxedo_with_vest_internal_waistband_color"];
if ($tuxedo_with_vest_tuxedo_satin_waist_band != "1") {
	$tuxedo_with_vest_tuxedo_satin_waist_band_price = 0;
} else if ($tuxedo_with_vest_tuxedo_satin_waist_band == "1") {
	$sqlprice13 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Tuxedo Satin Waist Band' ";
	$queryprice13 = mysql_db_query($dbname, $sqlprice13) or die("Can't QueryPrice13");
	$rowprice13 = mysql_fetch_array($queryprice13);
	$tuxedo_with_vest_tuxedo_satin_waist_band_price_extra = $rowprice13["0"];
	$tuxedo_with_vest_tuxedo_satin_waist_band_price = $tuxedo_with_vest_tuxedo_satin_waist_band_price_extra;
}

$tuxedo_with_vest_very_extended_waistband = $row1["tuxedo_with_vest_very_extended_waistband"];
if ($tuxedo_with_vest_very_extended_waistband != "0") {
	$tuxedo_with_vest_very_extended_waistband_price = 0;
} else if ($tuxedo_with_vest_very_extended_waistband == "0") {
	$sqlprice14 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Very Extended Waistband' ";
	$queryprice14 = mysql_db_query($dbname, $sqlprice14) or die("Can't QueryPrice14");
	$rowprice14 = mysql_fetch_array($queryprice14);
	$tuxedo_with_vest_very_extended_waistband_price_extra = $rowprice14["0"];
	$tuxedo_with_vest_very_extended_waistband_price = $tuxedo_with_vest_very_extended_waistband_price_extra;
}

$tuxedo_with_vest_pants_brand = $row1["tuxedo_with_vest_pants_brand"];
if ($tuxedo_with_vest_pants_brand == "0") {
	$tuxedo_with_vest_pants_brand_price = 0;
} else if ($tuxedo_with_vest_pants_brand != "0") {
	$sqlprice15 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Pants Branding' ";
	$queryprice15 = mysql_db_query($dbname, $sqlprice15) or die("Can't QueryPrice15");
	$rowprice15 = mysql_fetch_array($queryprice15);
	$tuxedo_with_vest_pants_brand_price_extra = $rowprice15["0"];
	$tuxedo_with_vest_pants_brand_price = $tuxedo_with_vest_pants_brand_price_extra;
}

$tuxedo_with_vest_price_1 = $tuxedo_with_vest_button_price_1 + $tuxedo_with_vest_embroidery_collar_initial_or_name_price + $tuxedo_with_vest_brand_price + $tuxedo_with_vest_pick_stitch_sleeves_price + $tuxedo_with_vest_pick_stitch_vest_price + $tuxedo_with_vest_elbow_patch_price + $tuxedo_with_vest_canvas_price + $tuxedo_with_vest_chest_pocket_satin_fabric_price + $tuxedo_with_vest_lower_pocket_satin_fabric_price + $tuxedo_with_vest_coin_pocket_inside_price + $tuxedo_with_vest_suspender_buttons_inside_price + $tuxedo_with_vest_split_tabs_back_price + $tuxedo_with_vest_tuxedo_satin_price + $tuxedo_with_vest_tuxedo_satin_waist_band_price + $tuxedo_with_vest_very_extended_waistband_price + $tuxedo_with_vest_pants_brand_price;

/*MY PRICES*/

$sqlmy1 = " SELECT * FROM admin_fabrics_tuxedo_with_vest WHERE fabricno = '$tuxedo_with_vest_fabric_no_1' ";
$querymy1 = mysql_db_query($dbname, $sqlmy1) or die("Can't Querymy1");
$rowmy1 = mysql_fetch_array($querymy1);
$fabrics_my_type = $rowmy1["type"];
$fabrics_my_brand = $rowmy1["brand"];

if ($rowmy1["type"] != '') {

$sqlmy01 = " SELECT `fabrictypereseller_".$id_user."` FROM admin_fabrictype WHERE fabrictype_name = '$fabrics_my_type' AND fabrictype_product = 'Suits' ";
$querymy01 = mysql_db_query($dbname, $sqlmy01) or die("Can't Querymy01");
$rowmy01 = mysql_fetch_array($querymy01);

$sqlmy001 = " SELECT `fabrictypereseller_".$id_user."` FROM admin_fabrictype WHERE fabrictype_name = '$fabrics_my_type' AND fabrictype_product = 'Vest' ";
$querymy001 = mysql_db_query($dbname, $sqlmy001) or die("Can't Querymy001");
$rowmy001 = mysql_fetch_array($querymy001);

$suits_fabric_my_price_1 = $rowmy01["0"];
$vest_fabric_my_price_1 = $rowmy001["0"];

$tuxedo_with_vest_fabric_my_price_1 = $suits_fabric_my_price_1 + $vest_fabric_my_price_1;

} else if ($rowmy1["brand"] != '') {
	
$sqlmy02 = " SELECT `fabricbrand_".$id_user."` FROM admin_fabricbrand WHERE fabricbrand_name = '$fabrics_my_brand' AND fabricbrand_product = 'Suits' ";
$querymy02 = mysql_db_query($dbname, $sqlmy02) or die("Can't Querymy02");
$rowmy02 = mysql_fetch_array($querymy02);	

$sqlmy002 = " SELECT `fabricbrand_".$id_user."` FROM admin_fabricbrand WHERE fabricbrand_name = '$fabrics_my_brand' AND fabricbrand_product = 'Vest' ";
$querymy002 = mysql_db_query($dbname, $sqlmy002) or die("Can't Querymy002");
$rowmy002 = mysql_fetch_array($querymy002);

$suits_fabric_my_price_1 = $rowmy02["0"];
$vest_fabri_myc_price_1 = $rowmy002["0"];

$tuxedo_with_vest_fabric_my_price_1 = $suits_fabric_my_price_1 + $vest_fabric_my_price_1;
	
}

/*OTHER PRICING PARAMETERS*/
$tuxedo_with_vest_jacket_measurement_chest = $_POST["tuxedo_with_vest_jacket_measurement_chest"];
$tuxedo_with_vest_jacket_measurement_waist_only = $_POST["tuxedo_with_vest_jacket_measurement_waist_only"];
$tuxedo_with_vest_jacket_measurement_hips = $_POST["tuxedo_with_vest_jacket_measurement_hips"];

if (($tuxedo_with_vest_jacket_measurement_chest >= '50' && $tuxedo_with_vest_jacket_measurement_chest <= '52') || ($tuxedo_with_vest_jacket_measurement_waist_only >= '50' && $tuxedo_with_vest_jacket_measurement_waist_only <= '52') || ($tuxedo_with_vest_jacket_measurement_hips >= '50' && $tuxedo_with_vest_jacket_measurement_hips <= '52')) {
	
	$price_my_size_1 = $tuxedo_with_vest_fabric_my_price_1 * 20;
	$price_my_size_2 = $price_my_size_1 / 100;
	
} else if (($tuxedo_with_vest_jacket_measurement_chest >= '52.5' && $tuxedo_with_vest_jacket_measurement_chest <= '56') || ($tuxedo_with_vest_jacket_measurement_waist_only >= '52.5' && $tuxedo_with_vest_jacket_measurement_waist_only <= '56') || ($tuxedo_with_vest_jacket_measurement_hips >= '52.5' && $tuxedo_with_vest_jacket_measurement_hips <= '56')) {
	
	$price_my_size_1 = $tuxedo_with_vest_fabric_my_price_1 * 30;
	$price_my_size_2 = $price_my_size_1 / 100;
	
} else if (($tuxedo_with_vest_jacket_measurement_chest >= '56.5' && $tuxedo_with_vest_jacket_measurement_chest <= '60') || ($tuxedo_with_vest_jacket_measurement_waist_only >= '56.5' && $tuxedo_with_vest_jacket_measurement_waist_only <= '60') || ($tuxedo_with_vest_jacket_measurement_hips >= '56.5' && $tuxedo_with_vest_jacket_measurement_hips <= '60')) {
	
	$price_my_size_1 = $tuxedo_with_vest_fabric_my_price_1 * 40;
	$price_my_size_2 = $price_my_size_1 / 100;
	
} else if (($tuxedo_with_vest_jacket_measurement_chest >= '60.5' && $tuxedo_with_vest_jacket_measurement_chest <= '64') || ($tuxedo_with_vest_jacket_measurement_waist_only >= '60.5' && $tuxedo_with_vest_jacket_measurement_waist_only <= '64') || ($tuxedo_with_vest_jacket_measurement_hips >= '60.5' && $tuxedo_with_vest_jacket_measurement_hips <= '64')) {
	
	$price_my_size_1 = $tuxedo_with_vest_fabric_my_price_1 * 50;
	$price_my_size_2 = $price_my_size_1 / 100;
	
} else if (($tuxedo_with_vest_jacket_measurement_chest >= '64.5' && $tuxedo_with_vest_jacket_measurement_chest <= '68') || ($tuxedo_with_vest_jacket_measurement_waist_only >= '64.5' && $tuxedo_with_vest_jacket_measurement_waist_only <= '68') || ($tuxedo_with_vest_jacket_measurement_hips >= '64.5' && $tuxedo_with_vest_jacket_measurement_hips <= '68')) {
	
	$price_my_size_1 = $tuxedo_with_vest_fabric_my_price_1 * 60;
	$price_my_size_2 = $price_my_size_1 / 100;
	
}  else {
	
	$price_my_size_2 = 0;
	
}

$tuxedo_with_vest_pants_measurement_waist = $_POST["tuxedo_with_vest_pants_measurement_waist"];
$tuxedo_with_vest_pants_measurement_hips = $_POST["tuxedo_with_vest_pants_measurement_hips"];

if (($tuxedo_with_vest_pants_measurement_waist >= '50' && $tuxedo_with_vest_pants_measurement_waist <= '52') || ($tuxedo_with_vest_pants_measurement_hips >= '50' && $tuxedo_with_vest_pants_measurement_hips <= '52')) {
	
	$price_my_size_18 = $tuxedo_with_vest_fabric_my_price_1 * 20;
	$price_my_size_19 = $price_my_size_18 / 100;
	
} else if (($tuxedo_with_vest_pants_measurement_waist >= '52.5' && $tuxedo_with_vest_pants_measurement_waist <= '56') || ($tuxedo_with_vest_pants_measurement_hips >= '52.5' && $tuxedo_with_vest_pants_measurement_hips <= '56')) {
	
	$price_my_size_18 = $tuxedo_with_vest_fabric_my_price_1 * 30;
	$price_my_size_19 = $price_my_size_18 / 100;
	
} else if (($tuxedo_with_vest_pants_measurement_waist >= '56.5' && $tuxedo_with_vest_pants_measurement_waist <= '60') || ($tuxedo_with_vest_pants_measurement_hips >= '56.5' && $tuxedo_with_vest_pants_measurement_hips <= '60')) {
	
	$price_my_size_18 = $tuxedo_with_vest_fabric_my_price_1 * 40;
	$price_my_size_19 = $price_my_size_18 / 100;
	
} else if (($tuxedo_with_vest_pants_measurement_waist >= '60.5' && $tuxedo_with_vest_pants_measurement_waist <= '64') || ($tuxedo_with_vest_pants_measurement_hips >= '60.5' && $tuxedo_with_vest_pants_measurement_hips <= '64')) {
	
	$price_my_size_18 = $tuxedo_with_vest_fabric_my_price_1 * 50;
	$price_my_size_19 = $price_my_size_18 / 100;
	
} else if (($tuxedo_with_vest_pants_measurement_waist >= '64.5' && $tuxedo_with_vest_pants_measurement_waist <= '68') || ($tuxedo_with_vest_pants_measurement_hips >= '64.5' && $tuxedo_with_vest_pants_measurement_hips <= '68')) {
	
	$price_my_size_18 = $tuxedo_with_vest_fabric_my_price_1 * 60;
	$price_my_size_19 = $price_my_size_18 / 100;
	
}  else {
	
	$price_my_size_19 = 0;
	
}

$tuxedo_with_vest_vest_measurement_chest = $_POST["tuxedo_with_vest_vest_measurement_chest"];
$tuxedo_with_vest_vest_measurement_waist_only = $_POST["tuxedo_with_vest_vest_measurement_waist_only"];
$tuxedo_with_vest_vest_measurement_hips = $_POST["tuxedo_with_vest_vest_measurement_hips"];

if (($tuxedo_with_vest_vest_measurement_chest >= '50' && $tuxedo_with_vest_vest_measurement_chest <= '52') || ($tuxedo_with_vest_vest_measurement_waist_only >= '50' && $tuxedo_with_vest_vest_measurement_waist_only <= '52') || ($tuxedo_with_vest_vest_measurement_hips >= '50' && $tuxedo_with_vest_vest_measurement_hips <= '52')) {
	
	$price_my_size_30 = $tuxedo_with_vest_fabric_my_price_1 * 20;
	$price_my_size_31 = $price_my_size_30 / 100;
	
} else if (($tuxedo_with_vest_vest_measurement_chest >= '52.5' && $tuxedo_with_vest_vest_measurement_chest <= '56') || ($tuxedo_with_vest_vest_measurement_waist_only >= '52.5' && $tuxedo_with_vest_vest_measurement_waist_only <= '56') || ($tuxedo_with_vest_vest_measurement_hips >= '52.5' && $tuxedo_with_vest_vest_measurement_hips <= '56')) {
	
	$price_my_size_30 = $tuxedo_with_vest_fabric_my_price_1 * 30;
	$price_my_size_31 = $price_my_size_30 / 100;
	
} else if (($tuxedo_with_vest_vest_measurement_chest >= '56.5' && $tuxedo_with_vest_vest_measurement_chest <= '60') || ($tuxedo_with_vest_vest_measurement_waist_only >= '56.5' && $tuxedo_with_vest_vest_measurement_waist_only <= '60') || ($tuxedo_with_vest_vest_measurement_hips >= '56.5' && $tuxedo_with_vest_vest_measurement_hips <= '60')) {
	
	$price_my_size_30 = $tuxedo_with_vest_fabric_my_price_1 * 40;
	$price_my_size_31 = $price_my_size_30 / 100;
	
} else if (($tuxedo_with_vest_vest_measurement_chest >= '60.5' && $tuxedo_with_vest_vest_measurement_chest <= '64') || ($tuxedo_with_vest_vest_measurement_waist_only >= '60.5' && $tuxedo_with_vest_vest_measurement_waist_only <= '64') || ($tuxedo_with_vest_vest_measurement_hips >= '60.5' && $tuxedo_with_vest_vest_measurement_hips <= '64')) {
	
	$price_my_size_30 = $tuxedo_with_vest_fabric_my_price_1 * 50;
	$price_my_size_31 = $price_my_size_30 / 100;
	
} else if (($tuxedo_with_vest_vest_measurement_chest >= '64.5' && $tuxedo_with_vest_vest_measurement_chest <= '68') || ($tuxedo_with_vest_vest_measurement_waist_only >= '64.5' && $tuxedo_with_vest_vest_measurement_waist_only <= '68') || ($tuxedo_with_vest_vest_measurement_hips >= '64.5' && $tuxedo_with_vest_vest_measurement_hips <= '68')) {
	
	$price_my_size_30 = $tuxedo_with_vest_fabric_my_price_1 * 60;
	$price_my_size_31 = $price_my_size_30 / 100;
	
}  else {
	
	$price_my_size_31 = 0;
	
}

$price_my_size_42 = $price_my_size_2 + $price_my_size_19;

$price_my_size_48 = $price_my_size_42 + $price_my_size_31;

$price_my_size_54 = $price_my_size_48 + $tuxedo_with_vest_fabric_my_price_1;

/*BUTTON*/
$tuxedo_with_vest_jacket_button_number = $_POST["tuxedo_with_vest_jacket_button_number"];

$sql2 = " SELECT price FROM admin_buttons_suits WHERE buttonno = '$tuxedo_with_vest_jacket_button_number' ";
$query2 = mysql_db_query($dbname, $sql2) or die("Can't Query2");
$row2 = mysql_fetch_array($query2);
$tuxedo_with_vest_jacket_button_my_price = $row2["price"];

$tuxedo_with_vest_pants_button_number = $_POST["tuxedo_with_vest_pants_button_number"];

$sql3 = " SELECT price FROM admin_buttons_suits WHERE buttonno = '$tuxedo_with_vest_pants_button_number' ";
$query3 = mysql_db_query($dbname, $sql3) or die("Can't Query3");
$row3 = mysql_fetch_array($query3);
$tuxedo_with_vest_pants_button_my_price = $row3["price"];

$tuxedo_with_vest_vest_button_number = $_POST["tuxedo_with_vest_vest_button_number"];

$sql4 = " SELECT price FROM admin_buttons_suits WHERE buttonno = '$tuxedo_with_vest_vest_button_number' ";
$query4 = mysql_db_query($dbname, $sql4) or die("Can't Query4");
$row4 = mysql_fetch_array($query4);
$tuxedo_with_vest_vest_button_my_price = $row4["price"];

$tuxedo_with_vest_pants_back_button = $_POST["tuxedo_with_vest_pants_back_button"];
$tuxedo_with_vest_pants_back_button_number = $_POST["tuxedo_with_vest_pants_back_button_number"];

$tuxedo_with_vest_jacket_pants_button_my_price = $tuxedo_with_vest_jacket_button_my_price + $tuxedo_with_vest_pants_button_my_price;

$tuxedo_with_vest_button_my_price = $tuxedo_with_vest_jacket_pants_button_my_price + $tuxedo_with_vest_vest_button_my_price;

$tuxedo_with_vest_button_my_price_1 = $price_my_size_54 + $tuxedo_with_vest_button_my_price;

$tuxedo_with_vest_embroidery_collar_initial_or_name = $_POST["tuxedo_with_vest_embroidery_collar_initial_or_name"];
if ($tuxedo_with_vest_embroidery_collar_initial_or_name == "") {
	$tuxedo_with_vest_embroidery_collar_initial_or_name_price = 0;
} else if ($tuxedo_with_vest_embroidery_collar_initial_or_name != "") {
	$sqlprice1 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Embroidery Collar Felt' ";
	$queryprice1 = mysql_db_query($dbname, $sqlprice1) or die("Can't QueryPrice1");
	$rowprice1 = mysql_fetch_array($queryprice1);
	$tuxedo_with_vest_embroidery_collar_initial_or_name_my_price_extra = $rowprice1["0"];
	$tuxedo_with_vest_embroidery_collar_initial_or_name_my_price = $tuxedo_with_vest_embroidery_collar_initial_or_name_my_price_extra;
}

$tuxedo_with_vest_brand = $_POST["tuxedo_with_vest_brand"];
if ($tuxedo_with_vest_brand == "0") {
	$tuxedo_with_vest_brand_price = 0;
} else if ($tuxedo_with_vest_brand != "0") {
	$sqlprice2 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Jacket Branding' ";
	$queryprice2 = mysql_db_query($dbname, $sqlprice2) or die("Can't QueryPrice2");
	$rowprice2 = mysql_fetch_array($queryprice2);
	$tuxedo_with_vest_brand_my_price_extra = $rowprice2["0"];
	$tuxedo_with_vest_brand_my_price = $tuxedo_with_vest_brand_my_price_extra;
}

$tuxedo_with_vest_pick_stitch = $_POST["tuxedo_with_vest_pick_stitch"];
$tuxedo_with_vest_pick_stitch_sleeves = $_POST["tuxedo_with_vest_pick_stitch_sleeves"];
if ($tuxedo_with_vest_pick_stitch == "0") {
	$tuxedo_with_vest_pick_stitch_sleeves_price = 0;
} else if ($tuxedo_with_vest_pick_stitch == "1" && $tuxedo_with_vest_pick_stitch_sleeves != "DEFAULT TONAL") {
	$sqlprice3 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Sleeves Pick Stitch' ";
	$queryprice3 = mysql_db_query($dbname, $sqlprice3) or die("Can't QueryPrice3");
	$rowprice3 = mysql_fetch_array($queryprice3);
	$tuxedo_with_vest_pick_stitch_sleeves_my_price_extra = $rowprice3["0"];
	$tuxedo_with_vest_pick_stitch_sleeves_my_price = $tuxedo_with_vest_pick_stitch_sleeves_my_price_extra;
}

$tuxedo_with_vest_pick_stitch_vest = $_POST["tuxedo_with_vest_pick_stitch_vest"];
if ($tuxedo_with_vest_pick_stitch == "0") {
	$tuxedo_with_vest_pick_stitch_vest_price = 0;
} else if ($tuxedo_with_vest_pick_stitch == "1" && $tuxedo_with_vest_pick_stitch_vest != "DEFAULT TONAL") {
	$sqlprice4 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Vent Pick Stitch' ";
	$queryprice4 = mysql_db_query($dbname, $sqlprice4) or die("Can't QueryPrice4");
	$rowprice4 = mysql_fetch_array($queryprice4);
	$tuxedo_with_vest_pick_stitch_vest_my_price_extra = $rowprice4["0"];
	$tuxedo_with_vest_pick_stitch_vest_my_price = $tuxedo_with_vest_pick_stitch_vest_my_price_extra;
}

$tuxedo_with_vest_elbow_patch = $_POST["tuxedo_with_vest_elbow_patch"];
if ($tuxedo_with_vest_elbow_patch == "") {
	$tuxedo_with_vest_elbow_patch_price = 0;
} else if ($tuxedo_with_vest_elbow_patch != "") {
	$sqlprice5 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Elbow Patch' ";
	$queryprice5 = mysql_db_query($dbname, $sqlprice5) or die("Can't QueryPrice5");
	$rowprice5 = mysql_fetch_array($queryprice5);
	$tuxedo_with_vest_elbow_patch_my_price_extra = $rowprice5["0"];
	$tuxedo_with_vest_elbow_patch_my_price = $tuxedo_with_vest_elbow_patch_my_price_extra;
}

$tuxedo_with_vest_canvas = $_POST["tuxedo_with_vest_canvas"];
if ($tuxedo_with_vest_canvas != "3") {
	$tuxedo_with_vest_canvas_price = 0;
} else if ($tuxedo_with_vest_canvas == "3") {
	$sqlprice6 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Full Canvas' ";
	$queryprice6 = mysql_db_query($dbname, $sqlprice6) or die("Can't QueryPrice6");
	$rowprice6 = mysql_fetch_array($queryprice6);
	$tuxedo_with_vest_canvas_my_price_extra = $rowprice6["0"];
	$tuxedo_with_vest_canvas_my_price = $tuxedo_with_vest_canvas_my_price_extra;
}

$tuxedo_with_vest_chest_pocket_satin_fabric = $_POST["tuxedo_with_vest_chest_pocket_satin_fabric"];
if ($tuxedo_with_vest_chest_pocket_satin_fabric == "") {
	$tuxedo_with_vest_chest_pocket_satin_fabric_price = 0;
} else if ($tuxedo_jacket_chest_pocket_satin_fabric != "") {
	$sqlprice7 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Satin Option on Chest Pocket' ";
	$queryprice7 = mysql_db_query($dbname, $sqlprice7) or die("Can't QueryPrice7");
	$rowprice7 = mysql_fetch_array($queryprice7);
	$tuxedo_with_vest_chest_pocket_satin_fabric_my_price_extra = $rowprice7["0"];
	$tuxedo_with_vest_chest_pocket_satin_fabric_my_price = $tuxedo_with_vest_chest_pocket_satin_fabric_my_price_extra;
}

$tuxedo_with_vest_lower_pocket_satin_fabric = $_POST["tuxedo_with_vest_lower_pocket_satin_fabric"];
if ($tuxedo_with_vest_lower_pocket_satin_fabric == "") {
	$tuxedo_with_vest_lower_pocket_satin_fabric_price = 0;
} else if ($tuxedo_with_vest_lower_pocket_satin_fabric != "") {
	$sqlprice8 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Satin Option on Lower Pocket' ";
	$queryprice8 = mysql_db_query($dbname, $sqlprice8) or die("Can't QueryPrice8");
	$rowprice8 = mysql_fetch_array($queryprice8);
	$tuxedo_with_vest_lower_pocket_satin_fabric_my_price_extra = $rowprice8["0"];
	$tuxedo_with_vest_lower_pocket_satin_fabric_my_price = $tuxedo_with_vest_lower_pocket_satin_fabric_my_price_extra;
}

$tuxedo_with_vest_coin_pocket_inside = $_POST["tuxedo_with_vest_coin_pocket_inside"];
if ($tuxedo_with_vest_coin_pocket_inside != "1") {
	$tuxedo_with_vest_coin_pocket_inside_price = 0;
} else if ($tuxedo_with_vest_coin_pocket_inside == "1") {
	$sqlprice9 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Coin Pocket Inside' ";
	$queryprice9 = mysql_db_query($dbname, $sqlprice9) or die("Can't QueryPrice9");
	$rowprice9 = mysql_fetch_array($queryprice9);
	$tuxedo_with_vest_coin_pocket_inside_my_price_extra = $rowprice9["0"];
	$tuxedo_with_vest_coin_pocket_inside_my_price = $tuxedo_with_vest_coin_pocket_inside_my_price_extra;
}

$tuxedo_with_vest_suspender_buttons_inside = $_POST["tuxedo_with_vest_suspender_buttons_inside"];
if ($tuxedo_with_vest_suspender_buttons_inside != "1") {
	$tuxedo_with_vest_suspender_buttons_inside_price = 0;
} else if ($tuxedo_with_vest_suspender_buttons_inside == "1") {
	$sqlprice10 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Suspender Buttons Inside' ";
	$queryprice10 = mysql_db_query($dbname, $sqlprice10) or die("Can't QueryPrice10");
	$rowprice10= mysql_fetch_array($queryprice10);
	$tuxedo_with_vest_suspender_buttons_inside_my_price_extra = $rowprice10["0"];
	$tuxedo_with_vest_suspender_buttons_inside_my_price = $tuxedo_with_vest_suspender_buttons_inside_my_price_extra;
}

$tuxedo_with_vest_split_tabs_back = $_POST["tuxedo_with_vest_split_tabs_back"];
if ($tuxedo_with_vest_split_tabs_back != "1") {
	$tuxedo_with_vest_split_tabs_back_price = 0;
} else if ($tuxedo_with_vest_split_tabs_back == "1") {
	$sqlprice11 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Split Tabs Back' ";
	$queryprice11 = mysql_db_query($dbname, $sqlprice11) or die("Can't QueryPrice11");
	$rowprice11 = mysql_fetch_array($queryprice11);
	$tuxedo_with_vest_split_tabs_back_my_price_extra = $rowprice11["0"];
	$tuxedo_with_vest_split_tabs_back_my_price = $tuxedo_with_vest_split_tabs_back_my_price_extra;
}

$tuxedo_with_vest_tuxedo_satin = $_POST["tuxedo_with_vest_tuxedo_satin"];
if ($tuxedo_with_vest_tuxedo_satin != "1") {
	$tuxedo_with_vest_tuxedo_satin_price = 0;
} else if ($tuxedo_with_vest_tuxedo_satin == "1") {
	$sqlprice12 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Tuxedo Satin on Side' ";
	$queryprice12 = mysql_db_query($dbname, $sqlprice12) or die("Can't QueryPrice12");
	$rowprice12 = mysql_fetch_array($queryprice12);
	$tuxedo_with_vest_tuxedo_satin_my_price_extra = $rowprice12["0"];
	$tuxedo_with_vest_tuxedo_satin_my_price = $tuxedo_with_vest_tuxedo_satin_my_price_extra;
}

$tuxedo_with_vest_tuxedo_satin_waist_band = $_POST["tuxedo_with_vest_tuxedo_satin_waist_band"];
$tuxedo_with_vest_internal_waistband_color = $_POST["tuxedo_with_vest_internal_waistband_color"];
if ($tuxedo_with_vest_tuxedo_satin_waist_band != "1") {
	$tuxedo_with_vest_tuxedo_satin_waist_band_price = 0;
} else if ($tuxedo_with_vest_tuxedo_satin_waist_band == "1") {
	$sqlprice13 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Tuxedo Satin Waist Band' ";
	$queryprice13 = mysql_db_query($dbname, $sqlprice13) or die("Can't QueryPrice13");
	$rowprice13 = mysql_fetch_array($queryprice13);
	$tuxedo_with_vest_tuxedo_satin_waist_band_my_price_extra = $rowprice13["0"];
	$tuxedo_with_vest_tuxedo_satin_waist_band_my_price = $tuxedo_with_vest_tuxedo_satin_waist_band_my_price_extra;
}

$tuxedo_with_vest_very_extended_waistband = $_POST["tuxedo_with_vest_very_extended_waistband"];
if ($tuxedo_with_vest_very_extended_waistband != "0") {
	$tuxedo_with_vest_very_extended_waistband_price = 0;
} else if ($tuxedo_with_vest_very_extended_waistband == "0") {
	$sqlprice14 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Very Extended Waistband' ";
	$queryprice14 = mysql_db_query($dbname, $sqlprice14) or die("Can't QueryPrice14");
	$rowprice14 = mysql_fetch_array($queryprice14);
	$tuxedo_with_vest_very_extended_waistband_my_price_extra = $rowprice14["0"];
	$tuxedo_with_vest_very_extended_waistband_my_price = $tuxedo_with_vest_very_extended_waistband_my_price_extra;
}

$tuxedo_with_vest_pants_brand = $_POST["tuxedo_with_vest_pants_brand"];
if ($tuxedo_with_vest_pants_brand == "0") {
	$tuxedo_with_vest_pants_brand_price = 0;
} else if ($tuxedo_with_vest_pants_brand != "0") {
	$sqlprice15 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Pants Branding' ";
	$queryprice15 = mysql_db_query($dbname, $sqlprice15) or die("Can't QueryPrice15");
	$rowprice15 = mysql_fetch_array($queryprice15);
	$tuxedo_with_vest_pants_brand_my_price_extra = $rowprice15["0"];
	$tuxedo_with_vest_pants_brand_my_price = $tuxedo_with_vest_pants_brand_my_price_extra;
}

$tuxedo_with_vest_my_price_1 = $tuxedo_with_vest_button_my_price_1 + $tuxedo_with_vest_embroidery_collar_initial_or_name_my_price + $tuxedo_with_vest_brand_my_price + $tuxedo_with_vest_pick_stitch_sleeves_my_price + $tuxedo_with_vest_pick_stitch_vest_my_price + $tuxedo_with_vest_elbow_patch_my_price + $tuxedo_with_vest_canvas_my_price + $tuxedo_with_vest_chest_pocket_satin_fabric_my_price + $tuxedo_with_vest_lower_pocket_satin_fabric_my_price + $tuxedo_with_vest_coin_pocket_inside_my_price + $tuxedo_with_vest_suspender_buttons_inside_my_price + $tuxedo_with_vest_split_tabs_back_my_price + $tuxedo_with_vest_tuxedo_satin_my_price + $tuxedo_with_vest_tuxedo_satin_waist_band_my_price + $tuxedo_with_vest_very_extended_waistband_my_price + $tuxedo_with_vest_pants_brand_my_price;

/*BUTTON*/
$tuxedo_with_vest_jacket_button_number = $row1["tuxedo_with_vest_jacket_button_number"];
$tuxedo_with_vest_pants_button_number = $row1["tuxedo_with_vest_pants_button_number"];
$tuxedo_with_vest_pants_back_button_number = $row1["tuxedo_with_vest_pants_back_button_number"];
$tuxedo_with_vest_vest_button_number = $row1["tuxedo_with_vest_vest_button_number"];

/*CUSTOMER*/
$tuxedo_with_vest_customer_name = $row1["tuxedo_with_vest_customer_name"];
$tuxedo_with_vest_order_no = $row1["tuxedo_with_vest_order_no"];
$tuxedo_with_vest_order_date = date("m/d/Y");
$tuxedo_with_vest_delivery_date = $row1["tuxedo_with_vest_delivery_date"];

/*CUSTOMIZE*/
$tuxedo_with_vest_jacket_style = $row1["tuxedo_with_vest_jacket_style"];
$tuxedo_with_vest_satin_style = $row1["tuxedo_with_vest_satin_style"];
$tuxedo_with_vest_collar_satin_style = $row1["tuxedo_with_vest_collar_satin_style"];
$tuxedo_with_vest_lapel_satin_style = $row1["tuxedo_with_vest_lapel_satin_style"];
$tuxedo_with_vest_half_satin_option = $row1["tuxedo_with_vest_half_satin_option"];
$tuxedo_with_vest_lapel_style = $row1["tuxedo_with_vest_lapel_style"];
$tuxedo_with_vest_lapel_width = $row1["tuxedo_with_vest_lapel_width"];
$tuxedo_with_vest_lapel_color = $row1["tuxedo_with_vest_lapel_color"];
$tuxedo_with_vest_real_lapel_boutonniere = $row1["tuxedo_with_vest_real_lapel_boutonniere"];
$tuxedo_with_vest_vent_style = $row1["tuxedo_with_vest_vent_style"];
$tuxedo_with_vest_pocket_style = $row1["tuxedo_with_vest_pocket_style"];
$tuxedo_with_vest_chest_pocket = $row1["tuxedo_with_vest_chest_pocket"];
$tuxedo_with_vest_chest_pocket_satin = $row1["tuxedo_with_vest_chest_pocket_satin"];
$tuxedo_with_vest_chest_pocket_satin_color = $row1["tuxedo_with_vest_chest_pocket_satin_color"];
$tuxedo_with_vest_chest_pocket_satin_fabric = $row1["tuxedo_with_vest_chest_pocket_satin_fabric"];
$tuxedo_with_vest_lower_pocket_satin = $row1["tuxedo_with_vest_lower_pocket_satin"];
$tuxedo_with_vest_lower_pocket_satin_color = $row1["tuxedo_with_vest_lower_pocket_satin_color"];
$tuxedo_with_vest_lower_pocket_satin_fabric = $row1["tuxedo_with_vest_lower_pocket_satin_fabric"];
$tuxedo_with_vest_shoulder_construction = $row1["tuxedo_with_vest_shoulder_construction"];
$tuxedo_with_vest_sleeve_button = $row1["tuxedo_with_vest_sleeve_button"];
$tuxedo_with_vest_cuff = $row1["tuxedo_with_vest_cuff"];
$tuxedo_with_vest_all_sleevebutton_holes_color = $row1["tuxedo_with_vest_all_sleevebutton_holes_color"];
$tuxedo_with_vest_contrast_last_sleevebutton_holes_color = $row1["tuxedo_with_vest_contrast_last_sleevebutton_holes_color"];
$tuxedo_with_vest_contrast_last_sleevebutton_holes_button = $row1["tuxedo_with_vest_contrast_last_sleevebutton_holes_button"];
$tuxedo_with_vest_lining_style = $row1["tuxedo_with_vest_lining_style"];
$tuxedo_with_vest_canvas = $row1["tuxedo_with_vest_canvas"];
$tuxedo_with_vest_jacket_thread_on_button = $row1["tuxedo_with_vest_jacket_thread_on_button"];
$tuxedo_with_vest_jacket_button_hole_color = $row1["tuxedo_with_vest_jacket_button_hole_color"];
$tuxedo_with_vest_pick_stitch = $row1["tuxedo_with_vest_pick_stitch"];
$tuxedo_with_vest_pick_stitch_lapel_color = $row1["tuxedo_with_vest_pick_stitch_lapel_color"];
$tuxedo_with_vest_pick_stitch_pocket_color = $row1["tuxedo_with_vest_pick_stitch_pocket_color"];
$tuxedo_with_vest_pick_stitch_sleeves = $row1["tuxedo_with_vest_pick_stitch_sleeves"];
$tuxedo_with_vest_pick_stitch_vest = $row1["tuxedo_with_vest_pick_stitch_vest"];
$tuxedo_with_vest_embroidery_inside_initial_or_name = $row1["tuxedo_with_vest_embroidery_inside_initial_or_name"];
$tuxedo_with_vest_embroidery_inside_color = $row1["tuxedo_with_vest_embroidery_inside_color"];
$tuxedo_with_vest_embroidery_inside_design = $row1["tuxedo_with_vest_embroidery_inside_design"];
$tuxedo_with_vest_embroidery_collar_initial_or_name = $row1["tuxedo_with_vest_embroidery_collar_initial_or_name"];
$tuxedo_with_vest_embroidery_collar_color = $row1["tuxedo_with_vest_embroidery_collar_color"];
$tuxedo_with_vest_embroidery_collar_design = $row1["tuxedo_with_vest_embroidery_collar_design"];
$tuxedo_with_vest_brand = $row1["tuxedo_with_vest_brand"];
$tuxedo_with_vest_elbow_patch = $row1["tuxedo_with_vest_elbow_patch"];
$tuxedo_with_vest_collar_felt_color = $row1["tuxedo_with_vest_collar_felt_color"];
$tuxedo_with_vest_front_pleat = $row1["tuxedo_with_vest_front_pleat"];
$tuxedo_with_vest_front_pocket = $row1["tuxedo_with_vest_front_pocket"];
$tuxedo_with_vest_back_pocket = $row1["tuxedo_with_vest_back_pocket"];
$tuxedo_with_vest_no_back_pocket = $row1["tuxedo_with_vest_no_back_pocket"];
$tuxedo_with_vest_pants_thread_on_button = $row1["tuxedo_with_vest_pants_thread_on_button"];
$tuxedo_with_vest_pants_button_hole_color = $row1["tuxedo_with_vest_pants_button_hole_color"];
$tuxedo_with_vest_fastening = $row1["tuxedo_with_vest_fastening"];
$tuxedo_with_vest_fly_option = $row1["tuxedo_with_vest_fly_option"];
$tuxedo_with_vest_fly_option_zip = $row1["tuxedo_with_vest_fly_option_zip"];
$tuxedo_with_vest_band_edge_style = $row1["tuxedo_with_vest_band_edge_style"];
$tuxedo_with_vest_very_extended_waistband = $row1["tuxedo_with_vest_very_extended_waistband"];
$tuxedo_with_vest_waistband_width = $row1["tuxedo_with_vest_waistband_width"];
$tuxedo_with_vest_pants_cuff = $row1["tuxedo_with_vest_pants_cuff"];
$tuxedo_with_vest_pants_cuff_width = $row1["tuxedo_with_vest_pants_cuff_width"];
$tuxedo_with_vest_belt = $row1["tuxedo_with_vest_belt"];
$tuxedo_with_vest_pants_lining_style = $row1["tuxedo_with_vest_pants_lining_style"];
$tuxedo_with_vest_embroidery_waist_initial_or_name = $row1["tuxedo_with_vest_embroidery_waist_initial_or_name"];
$tuxedo_with_vest_embroidery_waist_color = $row1["tuxedo_with_vest_embroidery_waist_color"];
$tuxedo_with_vest_embroidery_waist_design = $row1["tuxedo_with_vest_embroidery_waist_design"];
$tuxedo_with_vest_embroidery_cuffs_initial_or_name = $row1["tuxedo_with_vest_embroidery_cuffs_initial_or_name"];
$tuxedo_with_vest_embroidery_cuffs_color = $row1["tuxedo_with_vest_embroidery_cuffs_color"];
$tuxedo_with_vest_embroidery_cuffs_design = $row1["tuxedo_with_vest_embroidery_cuffs_design"];
$tuxedo_with_vest_pants_brand = $row1["tuxedo_with_vest_pants_brand"];
$tuxedo_with_vest_coin_pocket_inside = $row1["tuxedo_with_vest_coin_pocket_inside"];
$tuxedo_with_vest_suspender_buttons_inside = $row1["tuxedo_with_vest_suspender_buttons_inside"];
$tuxedo_with_vest_split_tabs_back = $row1["tuxedo_with_vest_split_tabs_back"];
$tuxedo_with_vest_tuxedo_satin = $row1["tuxedo_with_vest_tuxedo_satin"];
$tuxedo_with_vest_tuxedo_satin_waist_band = $row1["tuxedo_with_vest_tuxedo_satin_waist_band"];
$tuxedo_with_vest_vest_button = $row1["tuxedo_with_vest_vest_button"];
$tuxedo_with_vest_vest_lapel_style = $row1["tuxedo_with_vest_vest_lapel_style"];
$tuxedo_with_vest_vest_chest_pocket = $row1["tuxedo_with_vest_vest_chest_pocket"];
$tuxedo_with_vest_vest_chest_pocket_satin = $row1["tuxedo_with_vest_vest_chest_pocket_satin"];
$tuxedo_with_vest_vest_chest_pocket_satin_color = $row1["tuxedo_with_vest_vest_chest_pocket_satin_color"];
$tuxedo_with_vest_vest_chest_pocket_satin_fabric = $row1["tuxedo_with_vest_vest_chest_pocket_satin_fabric"];
$tuxedo_with_vest_vest_lower_pocket_satin = $row1["tuxedo_with_vest_vest_lower_pocket_satin"];
$tuxedo_with_vest_vest_lower_pocket_satin_color = $row1["tuxedo_with_vest_vest_lower_pocket_satin_color"];
$tuxedo_with_vest_vest_lower_pocket_satin_fabric = $row1["tuxedo_with_vest_vest_lower_pocket_satin_fabric"];
$tuxedo_with_vest_vest_bottom_pocket = $row1["tuxedo_with_vest_vest_bottom_pocket"];
$tuxedo_with_vest_vest_bottom_of_vest = $row1["tuxedo_with_vest_vest_bottom_of_vest"];
$tuxedo_with_vest_vest_belt_at_back = $row1["tuxedo_with_vest_vest_belt_at_back"];
$tuxedo_with_vest_vest_lining_option = $row1["tuxedo_with_vest_vest_lining_option"];
$tuxedo_with_vest_vest_thread_on_button = $row1["tuxedo_with_vest_vest_thread_on_button"];
$tuxedo_with_vest_vest_button_hole_color = $row1["tuxedo_with_vest_vest_button_hole_color"];

/*MEASUREMENTS*/
$tuxedo_with_vest_jacket_measurement_sex = $row2["tuxedo_with_vest_jacket_measurement_sex"];
$tuxedo_with_vest_jacket_measurement_fit = $row2["tuxedo_with_vest_jacket_measurement_fit"];
$tuxedo_with_vest_jacket_measurement = $row2["tuxedo_with_vest_jacket_measurement"];
$tuxedo_with_vest_jacket_measurement_jacket_length = $row2["tuxedo_with_vest_jacket_measurement_jacket_length"];
$tuxedo_with_vest_jacket_measurement_back_lenght = $row2["tuxedo_with_vest_jacket_measurement_back_lenght"];
$tuxedo_with_vest_jacket_measurement_chest = $row2["tuxedo_with_vest_jacket_measurement_chest"];
$tuxedo_with_vest_jacket_measurement_waist_only = $row2["tuxedo_with_vest_jacket_measurement_waist_only"];
$tuxedo_with_vest_jacket_measurement_hips = $row2["tuxedo_with_vest_jacket_measurement_hips"];
$tuxedo_with_vest_jacket_measurement_shoulders = $row2["tuxedo_with_vest_jacket_measurement_shoulders"];
$tuxedo_with_vest_jacket_measurement_neck = $row2["tuxedo_with_vest_jacket_measurement_neck"];
$tuxedo_with_vest_jacket_measurement_ptp_front = $row2["tuxedo_with_vest_jacket_measurement_ptp_front"];
$tuxedo_with_vest_jacket_measurement_ptp_back = $row2["tuxedo_with_vest_jacket_measurement_ptp_back"];
$tuxedo_with_vest_jacket_measurement_arm_hole = $row2["tuxedo_with_vest_jacket_measurement_arm_hole"];
$tuxedo_with_vest_jacket_measurement_biceps = $row2["tuxedo_with_vest_jacket_measurement_biceps"];
$tuxedo_with_vest_jacket_measurement_sleeves_right = $row2["tuxedo_with_vest_jacket_measurement_sleeves_right"];
$tuxedo_with_vest_jacket_measurement_sleeves_left = $row2["tuxedo_with_vest_jacket_measurement_sleeves_left"];
$tuxedo_with_vest_jacket_measurement_wrist_right = $row2["tuxedo_with_vest_jacket_measurement_wrist_right"];
$tuxedo_with_vest_jacket_measurement_wrist_left = $row2["tuxedo_with_vest_jacket_measurement_wrist_left"];
$tuxedo_with_vest_jacket_measurement_first_button = $row2["tuxedo_with_vest_jacket_measurement_first_button"];
$tuxedo_with_vest_jacket_measurement_shoulder_upper_wrist = $row2["tuxedo_with_vest_jacket_measurement_shoulder_upper_wrist"];
$tuxedo_with_vest_jacket_measurement_shoulder_lower_wrist = $row2["tuxedo_with_vest_jacket_measurement_shoulder_lower_wrist"];
$tuxedo_with_vest_pants_measurement_sex = $row2["tuxedo_with_vest_pants_measurement_sex"];
$tuxedo_with_vest_pants_measurement_length = $row2["tuxedo_with_vest_pants_measurement_length"];
$tuxedo_with_vest_pants_measurement_fit = $row2["tuxedo_with_vest_pants_measurement_fit"];
$tuxedo_with_vest_pants_measurement = $row2["tuxedo_with_vest_pants_measurement"];
$tuxedo_with_vest_pants_measurement_waist = $row2["tuxedo_with_vest_pants_measurement_waist"];
$tuxedo_with_vest_pants_measurement_hips = $row2["tuxedo_with_vest_pants_measurement_hips"];
$tuxedo_with_vest_pants_measurement_crotch_full = $row2["tuxedo_with_vest_pants_measurement_crotch_full"];
$tuxedo_with_vest_pants_measurement_crotch_front = $row2["tuxedo_with_vest_pants_measurement_crotch_front"];
$tuxedo_with_vest_pants_measurement_crotch_back = $row2["tuxedo_with_vest_pants_measurement_crotch_back"];
$tuxedo_with_vest_pants_measurement_inseam_length = $row2["tuxedo_with_vest_pants_measurement_inseam_length"];
$tuxedo_with_vest_pants_measurement_thighs = $row2["tuxedo_with_vest_pants_measurement_thighs"];
$tuxedo_with_vest_pants_measurement_knees = $row2["tuxedo_with_vest_pants_measurement_knees"];
$tuxedo_with_vest_pants_measurement_length_outleg = $row2["tuxedo_with_vest_pants_measurement_length_outleg"];
$tuxedo_with_vest_pants_measurement_front_rise = $row2["tuxedo_with_vest_pants_measurement_front_rise"];
$tuxedo_with_vest_pants_measurement_cuffs = $row2["tuxedo_with_vest_pants_measurement_cuffs"];
$tuxedo_with_vest_vest_measurement_sex = $row2["tuxedo_with_vest_vest_measurement_sex"];
$tuxedo_with_vest_vest_measurement_fit = $row2["tuxedo_with_vest_vest_measurement_fit"];
$tuxedo_with_vest_vest_measurement = $row2["tuxedo_with_vest_vest_measurement"];
$tuxedo_with_vest_vest_measurement_vest_length = $row2["tuxedo_with_vest_vest_measurement_vest_length"];
$tuxedo_with_vest_vest_measurement_back_lenght = $row2["tuxedo_with_vest_vest_measurement_back_lenght"];
$tuxedo_with_vest_vest_measurement_chest = $row2["tuxedo_with_vest_vest_measurement_chest"];
$tuxedo_with_vest_vest_measurement_waist_only = $row2["tuxedo_with_vest_vest_measurement_waist_only"];
$tuxedo_with_vest_vest_measurement_hips = $row2["tuxedo_with_vest_vest_measurement_hips"];
$tuxedo_with_vest_vest_measurement_neck = $row2["tuxedo_with_vest_vest_measurement_neck"];
$tuxedo_with_vest_vest_measurement_ptp_front = $row2["tuxedo_with_vest_vest_measurement_ptp_front"];
$tuxedo_with_vest_vest_measurement_ptp_back = $row2["tuxedo_with_vest_vest_measurement_ptp_back"];
$tuxedo_with_vest_vest_measurement_arm_hole = $row2["tuxedo_with_vest_vest_measurement_arm_hole"];
$tuxedo_with_vest_measurement_jacket_shoulder = $row2["tuxedo_with_vest_measurement_jacket_shoulder"];
$tuxedo_with_vest_measurement_jacket_waist = $row2["tuxedo_with_vest_measurement_jacket_waist"];
$tuxedo_with_vest_measurement_jacket_chest = $row2["tuxedo_with_vest_measurement_jacket_chest"];
$tuxedo_with_vest_measurement_pants_waist = $row2["tuxedo_with_vest_measurement_pants_waist"];
$tuxedo_with_vest_measurement_pants_bottom = $row2["tuxedo_with_vest_measurement_pants_bottom"];
$tuxedo_with_vest_body_front = $row2["tuxedo_with_vest_body_front"];
$tuxedo_with_vest_body_left = $row2["tuxedo_with_vest_body_left"];
$tuxedo_with_vest_body_right = $row2["tuxedo_with_vest_body_right"];
$tuxedo_with_vest_body_back = $row2["tuxedo_with_vest_body_back"];
$tuxedo_with_vest_jacket_remark = $row2["tuxedo_with_vest_jacket_remark"];
$tuxedo_with_vest_pants_remark = $row2["tuxedo_with_vest_pants_remark"];
$tuxedo_with_vest_vest_remark = $row2["tuxedo_with_vest_vest_remark"];

/*ECT*/
$tuxedo_with_vest_date = date("m/d/Y");
$tuxedo_with_vest_time = date("H:i:s");
$tuxedo_with_vest_ip = $_POST['ip'];
$tuxedo_with_vest_status = T;

/*PRODUCT*/
$order_product = $row03['order_product'];

$sql7 =	" INSERT INTO customize_order (id, order_id, product_id, order_reseller, order_order_no, order_name_customize, order_my_price, order_price, order_product, order_fabric_no, order_date, order_time, order_ip, order_status) VALUES ('$id_order', '$order_id_same', '$product_id', '$company_user', '$tuxedo_with_vest_order_no', '$tuxedo_with_vest_customer_name', '$tuxedo_with_vest_my_price_1', '$tuxedo_with_vest_price_1', '$order_product', '$tuxedo_with_vest_fabric_no_1', '$tuxedo_with_vest_date', '$tuxedo_with_vest_time', '$tuxedo_with_vest_ip', '$tuxedo_with_vest_status') ";
$query7 = mysql_query($sql7) or die("Can't Query7");

$sql8 = " INSERT INTO customize_tuxedo_with_vest_design (id, order_id, product_id, tuxedo_with_vest_customer_name, tuxedo_with_vest_order_no, tuxedo_with_vest_order_date, tuxedo_with_vest_delivery_date, tuxedo_with_vest_fabric_no, tuxedo_with_vest_lining_no, tuxedo_with_vest_jacket_style, tuxedo_with_vest_satin_style, tuxedo_with_vest_collar_satin_style, tuxedo_with_vest_lapel_satin_style, tuxedo_with_vest_half_satin_option, tuxedo_with_vest_lapel_style, tuxedo_with_vest_lapel_width, tuxedo_with_vest_lapel_color, tuxedo_with_vest_real_lapel_boutonniere, tuxedo_with_vest_vent_style, tuxedo_with_vest_pocket_style, tuxedo_with_vest_chest_pocket, tuxedo_with_vest_chest_pocket_satin, tuxedo_with_vest_chest_pocket_satin_color, tuxedo_with_vest_chest_pocket_satin_fabric, tuxedo_with_vest_lower_pocket_satin, tuxedo_with_vest_lower_pocket_satin_color, tuxedo_with_vest_lower_pocket_satin_fabric, tuxedo_with_vest_shoulder_construction, tuxedo_with_vest_sleeve_button, tuxedo_with_vest_cuff, tuxedo_with_vest_all_sleevebutton_holes_color, tuxedo_with_vest_contrast_last_sleevebutton_holes_color, tuxedo_with_vest_contrast_last_sleevebutton_holes_button, tuxedo_with_vest_lining_style, tuxedo_with_vest_canvas, tuxedo_with_vest_jacket_button_number, tuxedo_with_vest_jacket_thread_on_button, tuxedo_with_vest_jacket_button_hole_color, tuxedo_with_vest_pick_stitch, tuxedo_with_vest_pick_stitch_lapel_color, tuxedo_with_vest_pick_stitch_pocket_color, tuxedo_with_vest_pick_stitch_sleeves, tuxedo_with_vest_pick_stitch_vest, tuxedo_with_vest_embroidery_inside_initial_or_name, tuxedo_with_vest_embroidery_inside_color, tuxedo_with_vest_embroidery_inside_design, tuxedo_with_vest_embroidery_collar_initial_or_name, tuxedo_with_vest_embroidery_collar_color, tuxedo_with_vest_embroidery_collar_design, tuxedo_with_vest_brand, tuxedo_with_vest_elbow_patch, tuxedo_with_vest_collar_felt_color, tuxedo_with_vest_front_pleat, tuxedo_with_vest_front_pocket, tuxedo_with_vest_back_pocket, tuxedo_with_vest_no_back_pocket, tuxedo_with_vest_pants_back_button, tuxedo_with_vest_pants_back_button_number, tuxedo_with_vest_pants_button_number, tuxedo_with_vest_pants_thread_on_button, tuxedo_with_vest_pants_button_hole_color, tuxedo_with_vest_fastening, tuxedo_with_vest_fly_option, tuxedo_with_vest_fly_option_zip, tuxedo_with_vest_band_edge_style, tuxedo_with_vest_very_extended_waistband, tuxedo_with_vest_waistband_width, tuxedo_with_vest_pants_cuff, tuxedo_with_vest_pants_cuff_width, tuxedo_with_vest_belt, tuxedo_with_vest_pants_lining_style, tuxedo_with_vest_embroidery_waist_initial_or_name, tuxedo_with_vest_embroidery_waist_color, tuxedo_with_vest_embroidery_waist_design, tuxedo_with_vest_embroidery_cuffs_initial_or_name, tuxedo_with_vest_embroidery_cuffs_color, tuxedo_with_vest_embroidery_cuffs_design, tuxedo_with_vest_pants_brand, tuxedo_with_vest_coin_pocket_inside, tuxedo_with_vest_suspender_buttons_inside, tuxedo_with_vest_split_tabs_back, tuxedo_with_vest_tuxedo_satin, tuxedo_with_vest_tuxedo_satin_waist_band, tuxedo_with_vest_internal_waistband_color, tuxedo_with_vest_vest_button, tuxedo_with_vest_vest_lapel_style, tuxedo_with_vest_vest_chest_pocket, tuxedo_with_vest_vest_chest_pocket_satin, tuxedo_with_vest_vest_chest_pocket_satin_color, tuxedo_with_vest_vest_chest_pocket_satin_fabric, tuxedo_with_vest_vest_lower_pocket_satin, tuxedo_with_vest_vest_lower_pocket_satin_color, tuxedo_with_vest_vest_lower_pocket_satin_fabric, tuxedo_with_vest_vest_bottom_pocket, tuxedo_with_vest_vest_bottom_of_vest, tuxedo_with_vest_vest_belt_at_back, tuxedo_with_vest_vest_lining_option, tuxedo_with_vest_vest_button_number, tuxedo_with_vest_vest_thread_on_button, tuxedo_with_vest_vest_button_hole_color, tuxedo_with_vest_date, tuxedo_with_vest_time, tuxedo_with_vest_ip, tuxedo_with_vest_status) VALUES ('$id_tuxedo_with_vest', '$order_id_same', '$product_id', '$tuxedo_with_vest_customer_name', '$tuxedo_with_vest_order_no', '$tuxedo_with_vest_order_date', '$tuxedo_with_vest_delivery_date', '$tuxedo_with_vest_fabric_no_1', '$tuxedo_with_vest_lining_no_1', '$tuxedo_with_vest_jacket_style', '$tuxedo_with_vest_satin_style', '$tuxedo_with_vest_collar_satin_style', '$tuxedo_with_vest_lapel_satin_style', '$tuxedo_with_vest_half_satin_option', '$tuxedo_with_vest_lapel_style', '$tuxedo_with_vest_lapel_width', '$tuxedo_with_vest_lapel_color', '$tuxedo_with_vest_real_lapel_boutonniere', '$tuxedo_with_vest_vent_style', '$tuxedo_with_vest_pocket_style', '$tuxedo_with_vest_chest_pocket', '$tuxedo_with_vest_chest_pocket_satin', '$tuxedo_with_vest_chest_pocket_satin_color', '$tuxedo_with_vest_chest_pocket_satin_fabric', '$tuxedo_with_vest_lower_pocket_satin', '$tuxedo_with_vest_lower_pocket_satin_color', '$tuxedo_with_vest_lower_pocket_satin_fabric', '$tuxedo_with_vest_shoulder_construction', '$tuxedo_with_vest_sleeve_button', '$tuxedo_with_vest_cuff', '$tuxedo_with_vest_all_sleevebutton_holes_color', '$tuxedo_with_vest_contrast_last_sleevebutton_holes_color', '$tuxedo_with_vest_contrast_last_sleevebutton_holes_button', '$tuxedo_with_vest_lining_style', '$tuxedo_with_vest_canvas', '$tuxedo_with_vest_jacket_button_number', '$tuxedo_with_vest_jacket_thread_on_button', '$tuxedo_with_vest_jacket_button_hole_color', '$tuxedo_with_vest_pick_stitch', '$tuxedo_with_vest_pick_stitch_lapel_color', '$tuxedo_with_vest_pick_stitch_pocket_color', '$tuxedo_with_vest_pick_stitch_sleeves', '$tuxedo_with_vest_pick_stitch_vest', '$tuxedo_with_vest_embroidery_inside_initial_or_name', '$tuxedo_with_vest_embroidery_inside_color', '$tuxedo_with_vest_embroidery_inside_design', '$tuxedo_with_vest_embroidery_collar_initial_or_name', '$tuxedo_with_vest_embroidery_collar_color', '$tuxedo_with_vest_embroidery_collar_design', '$tuxedo_with_vest_brand', '$tuxedo_with_vest_elbow_patch', '$tuxedo_with_vest_collar_felt_color', '$tuxedo_with_vest_front_pleat', '$tuxedo_with_vest_front_pocket', '$tuxedo_with_vest_back_pocket', '$tuxedo_with_vest_no_back_pocket', '$tuxedo_with_vest_pants_back_button', '$tuxedo_with_vest_pants_back_button_number', '$tuxedo_with_vest_pants_button_number', '$tuxedo_with_vest_pants_thread_on_button', '$tuxedo_with_vest_pants_button_hole_color', '$tuxedo_with_vest_fastening', '$tuxedo_with_vest_fly_option', '$tuxedo_with_vest_fly_option_zip', '$tuxedo_with_vest_band_edge_style', '$tuxedo_with_vest_very_extended_waistband', '$tuxedo_with_vest_waistband_width', '$tuxedo_with_vest_pants_cuff', '$tuxedo_with_vest_pants_cuff_width', '$tuxedo_with_vest_belt', '$tuxedo_with_vest_pants_lining_style', '$tuxedo_with_vest_embroidery_waist_initial_or_name', '$tuxedo_with_vest_embroidery_waist_color', '$tuxedo_with_vest_embroidery_waist_design', '$tuxedo_with_vest_embroidery_cuffs_initial_or_name', '$tuxedo_with_vest_embroidery_cuffs_color', '$tuxedo_with_vest_embroidery_cuffs_design', '$tuxedo_with_vest_pants_brand', '$tuxedo_with_vest_coin_pocket_inside', '$tuxedo_with_vest_suspender_buttons_inside', '$tuxedo_with_vest_split_tabs_back', '$tuxedo_with_vest_tuxedo_satin', '$tuxedo_with_vest_tuxedo_satin_waist_band', '$tuxedo_with_vest_internal_waistband_color', '$tuxedo_with_vest_vest_button', '$tuxedo_with_vest_vest_lapel_style', '$tuxedo_with_vest_vest_chest_pocket', '$tuxedo_with_vest_vest_chest_pocket_satin', '$tuxedo_with_vest_vest_chest_pocket_satin_color', '$tuxedo_with_vest_vest_chest_pocket_satin_fabric', '$tuxedo_with_vest_vest_lower_pocket_satin', '$tuxedo_with_vest_vest_lower_pocket_satin_color', '$tuxedo_with_vest_vest_lower_pocket_satin_fabric', '$tuxedo_with_vest_vest_bottom_pocket', '$tuxedo_with_vest_vest_bottom_of_vest', '$tuxedo_with_vest_vest_belt_at_back', '$tuxedo_with_vest_vest_lining_option', '$tuxedo_with_vest_vest_button_number', '$tuxedo_with_vest_vest_thread_on_button', '$tuxedo_with_vest_vest_button_hole_color', '$tuxedo_with_vest_date', '$tuxedo_with_vest_time', '$tuxedo_with_vest_ip', '$tuxedo_with_vest_status') ";
$query8 = mysql_query($sql8) or die("Can't Query8");

$sql9 = " INSERT INTO customize_tuxedo_with_vest_measurements (id, order_id, product_id, tuxedo_with_vest_jacket_measurement_sex, tuxedo_with_vest_jacket_measurement_fit, tuxedo_with_vest_jacket_measurement, tuxedo_with_vest_jacket_measurement_jacket_length, tuxedo_with_vest_jacket_measurement_back_lenght, tuxedo_with_vest_jacket_measurement_chest, tuxedo_with_vest_jacket_measurement_waist_only, tuxedo_with_vest_jacket_measurement_hips, tuxedo_with_vest_jacket_measurement_shoulders, tuxedo_with_vest_jacket_measurement_neck, tuxedo_with_vest_jacket_measurement_ptp_front, tuxedo_with_vest_jacket_measurement_ptp_back, tuxedo_with_vest_jacket_measurement_arm_hole, tuxedo_with_vest_jacket_measurement_biceps, tuxedo_with_vest_jacket_measurement_sleeves_right, tuxedo_with_vest_jacket_measurement_sleeves_left, tuxedo_with_vest_jacket_measurement_wrist_right, tuxedo_with_vest_jacket_measurement_wrist_left, tuxedo_with_vest_jacket_measurement_first_button, tuxedo_with_vest_jacket_measurement_shoulder_upper_wrist, tuxedo_with_vest_jacket_measurement_shoulder_lower_wrist, tuxedo_with_vest_pants_measurement_sex, tuxedo_with_vest_pants_measurement_length, tuxedo_with_vest_pants_measurement_fit, tuxedo_with_vest_pants_measurement, tuxedo_with_vest_pants_measurement_waist, tuxedo_with_vest_pants_measurement_hips, tuxedo_with_vest_pants_measurement_crotch_full, tuxedo_with_vest_pants_measurement_crotch_front, tuxedo_with_vest_pants_measurement_crotch_back, tuxedo_with_vest_pants_measurement_inseam_length, tuxedo_with_vest_pants_measurement_thighs, tuxedo_with_vest_pants_measurement_knees, tuxedo_with_vest_pants_measurement_length_outleg, tuxedo_with_vest_pants_measurement_front_rise, tuxedo_with_vest_pants_measurement_cuffs, tuxedo_with_vest_vest_measurement_sex, tuxedo_with_vest_vest_measurement_fit, tuxedo_with_vest_vest_measurement, tuxedo_with_vest_vest_measurement_vest_length, tuxedo_with_vest_vest_measurement_back_lenght, tuxedo_with_vest_vest_measurement_chest, tuxedo_with_vest_vest_measurement_waist_only, tuxedo_with_vest_vest_measurement_hips, tuxedo_with_vest_vest_measurement_neck, tuxedo_with_vest_vest_measurement_ptp_front, tuxedo_with_vest_vest_measurement_ptp_back, tuxedo_with_vest_vest_measurement_arm_hole, tuxedo_with_vest_measurement_jacket_shoulder, tuxedo_with_vest_measurement_jacket_waist, tuxedo_with_vest_measurement_jacket_chest, tuxedo_with_vest_measurement_pants_waist, tuxedo_with_vest_measurement_pants_bottom, tuxedo_with_vest_body_front, tuxedo_with_vest_body_left, tuxedo_with_vest_body_right, tuxedo_with_vest_body_back, tuxedo_with_vest_jacket_remark, tuxedo_with_vest_pants_remark, tuxedo_with_vest_vest_remark, tuxedo_with_vest_date, tuxedo_with_vest_time, tuxedo_with_vest_ip, tuxedo_with_vest_status) VALUES ('$id_tuxedo_with_vest', '$order_id_same', '$product_id', '$tuxedo_with_vest_jacket_measurement_sex', '$tuxedo_with_vest_jacket_measurement_fit', '$tuxedo_with_vest_jacket_measurement', '$tuxedo_with_vest_jacket_measurement_jacket_length', '$tuxedo_with_vest_jacket_measurement_back_lenght', '$tuxedo_with_vest_jacket_measurement_chest', '$tuxedo_with_vest_jacket_measurement_waist_only', '$tuxedo_with_vest_jacket_measurement_hips', '$tuxedo_with_vest_jacket_measurement_shoulders', '$tuxedo_with_vest_jacket_measurement_neck', '$tuxedo_with_vest_jacket_measurement_ptp_front', '$tuxedo_with_vest_jacket_measurement_ptp_back', '$tuxedo_with_vest_jacket_measurement_arm_hole', '$tuxedo_with_vest_jacket_measurement_biceps', '$tuxedo_with_vest_jacket_measurement_sleeves_right', '$tuxedo_with_vest_jacket_measurement_sleeves_left', '$tuxedo_with_vest_jacket_measurement_wrist_right', '$tuxedo_with_vest_jacket_measurement_wrist_left', '$tuxedo_with_vest_jacket_measurement_first_button', '$tuxedo_with_vest_jacket_measurement_shoulder_upper_wrist', '$tuxedo_with_vest_jacket_measurement_shoulder_lower_wrist', '$tuxedo_with_vest_pants_measurement_sex', '$tuxedo_with_vest_pants_measurement_length', '$tuxedo_with_vest_pants_measurement_fit', '$tuxedo_with_vest_pants_measurement', '$tuxedo_with_vest_pants_measurement_waist', '$tuxedo_with_vest_pants_measurement_hips', '$tuxedo_with_vest_pants_measurement_crotch_full', '$tuxedo_with_vest_pants_measurement_crotch_front', '$tuxedo_with_vest_pants_measurement_crotch_back', '$tuxedo_with_vest_pants_measurement_inseam_length', '$tuxedo_with_vest_pants_measurement_thighs', '$tuxedo_with_vest_pants_measurement_knees', '$tuxedo_with_vest_pants_measurement_length_outleg', '$tuxedo_with_vest_pants_measurement_front_rise', '$tuxedo_with_vest_pants_measurement_cuffs', '$tuxedo_with_vest_vest_measurement_sex', '$tuxedo_with_vest_vest_measurement_fit', '$tuxedo_with_vest_vest_measurement', '$tuxedo_with_vest_vest_measurement_vest_length', '$tuxedo_with_vest_vest_measurement_back_lenght', '$tuxedo_with_vest_vest_measurement_chest', '$tuxedo_with_vest_vest_measurement_waist_only', '$tuxedo_with_vest_vest_measurement_hips', '$tuxedo_with_vest_vest_measurement_neck', '$tuxedo_with_vest_vest_measurement_ptp_front', '$tuxedo_with_vest_vest_measurement_ptp_back', '$tuxedo_with_vest_vest_measurement_arm_hole', '$tuxedo_with_vest_measurement_jacket_shoulder', '$tuxedo_with_vest_measurement_jacket_waist', '$tuxedo_with_vest_measurement_jacket_chest', '$tuxedo_with_vest_measurement_pants_waist', '$tuxedo_with_vest_measurement_pants_bottom', '$tuxedo_with_vest_body_front', '$tuxedo_with_vest_body_left', '$tuxedo_with_vest_body_right', '$tuxedo_with_vest_body_back', '$tuxedo_with_vest_jacket_remark', '$tuxedo_with_vest_pants_remark', '$tuxedo_with_vest_vest_remark', '$tuxedo_with_vest_date', '$tuxedo_with_vest_time', '$tuxedo_with_vest_ip', '$tuxedo_with_vest_status') ";
$query9 = mysql_query($sql9) or die("Can't Query9");

if($query9) {
	
	echo " <script language='javascript'> window.location='../../cart/multiple/index.php?orderid=".$order_id_same."'; </script> ";
	
}

mysql_close();
?>