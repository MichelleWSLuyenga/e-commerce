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

$order_id_same = $_POST["tuxedo_jacket_orderid"];
$product_id_same = $_POST["tuxedo_jacket_productid"];
	
$sql1 =	" SELECT * FROM customize_tuxedo_jacket_design WHERE order_id = '$order_id_same' AND product_id = '$product_id_same' ";
$query1 = mysql_db_query($dbname, $sql1) or die("Can't Query1");
$row1 = mysql_fetch_array($query1);

$sql2 =	" SELECT * FROM customize_tuxedo_jacket_measurements WHERE order_id = '$order_id_same' AND product_id = '$product_id_same' ";
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

$sql6 =	" SELECT MAX(id) FROM customize_tuxedo_jacket_design ";
$query6 = mysql_db_query($dbname, $sql6) or die("Can't Query6");
$row6 = mysql_fetch_array($query6);
$id_tuxedo_jacket = $row6[0] + 1 ;

/*FABRIC*/
$tuxedo_jacket_fabric_no_1 = $_POST["tuxedo_jacket_fabric_no_1"];
$tuxedo_jacket_lining_no_1 = $_POST["tuxedo_jacket_lining_no_1"];

$sql001 = " SELECT * FROM admin_fabrics_tuxedo_jacket WHERE fabricno = '$tuxedo_jacket_fabric_no_1' ";
$query001 = mysql_db_query($dbname, $sql001) or die("Can't Query001");
$row001 = mysql_fetch_array($query001);
$fabrics_type = $row001["type"];
$fabrics_brand = $row001["brand"];

if ($row001["type"] != '') {

$sql01 = " SELECT `fabrictype_".$id_user."` FROM admin_fabrictype WHERE fabrictype_name = '$fabrics_type' AND fabrictype_product = 'Jacket' ";
$query01 = mysql_db_query($dbname, $sql01) or die("Can't Query01");
$row01 = mysql_fetch_array($query01);
$tuxedo_jacket_fabric_price_1 = $row01["0"];

} else if ($row001["brand"] != '') {
	
$sql02 = " SELECT `fabricbrand_".$id_user."` FROM admin_fabricbrand WHERE fabricbrand_name = '$fabrics_brand' AND fabricbrand_product = 'Jacket' ";
$query02 = mysql_db_query($dbname, $sql02) or die("Can't Query02");
$row02 = mysql_fetch_array($query02);	
$tuxedo_jacket_fabric_price_1 = $row02["0"];
	
}

/*OTHER PRICING PARAMETERS*/
$tuxedo_jacket_jacket_measurement_chest = $row1["tuxedo_jacket_jacket_measurement_chest"];
$tuxedo_jacket_jacket_measurement_waist_only = $row1["tuxedo_jacket_jacket_measurement_waist_only"];
$tuxedo_jacket_jacket_measurement_hips = $row1["tuxedo_jacket_jacket_measurement_hips"];

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
$tuxedo_jacket_jacket_button_number = $row1["tuxedo_jacket_jacket_button_number"];

$sql002 = " SELECT price FROM admin_buttons_suits WHERE buttonno = '$tuxedo_jacket_jacket_button_number' ";
$query002 = mysql_db_query($dbname, $sql002) or die("Can't Query002");
$row002 = mysql_fetch_array($query002);
$tuxedo_jacket_button_price = $row002["price"];

$tuxedo_jacket_button_price_1 = $price_size_3 + $tuxedo_jacket_button_price;

$tuxedo_jacket_embroidery_collar_initial_or_name = $row1["tuxedo_jacket_embroidery_collar_initial_or_name"];
if ($tuxedo_jacket_embroidery_collar_initial_or_name == "") {
	$tuxedo_jacket_embroidery_collar_initial_or_name_price = 0;
} else if ($tuxedo_jacket_embroidery_collar_initial_or_name != "") {
	$sqlprice1 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Embroidery Collar Felt' ";
	$queryprice1 = mysql_db_query($dbname, $sqlprice1) or die("Can't QueryPrice1");
	$rowprice1 = mysql_fetch_array($queryprice1);
	$tuxedo_jacket_embroidery_collar_initial_or_name_price_extra = $rowprice1["0"];
	$tuxedo_jacket_embroidery_collar_initial_or_name_price = $tuxedo_jacket_embroidery_collar_initial_or_name_price_extra;
}

$tuxedo_jacket_brand = $row1["tuxedo_jacket_brand"];
if ($tuxedo_jacket_brand == "0") {
	$tuxedo_jacket_brand_price = 0;
} else if ($tuxedo_jacket_brand != "0") {
	$sqlprice2 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Jacket Branding' ";
	$queryprice2 = mysql_db_query($dbname, $sqlprice2) or die("Can't QueryPrice2");
	$rowprice2 = mysql_fetch_array($queryprice2);
	$tuxedo_jacket_brand_price_extra = $rowprice2["0"];
	$tuxedo_jacket_brand_price = $tuxedo_jacket_brand_price_extra;
}

$tuxedo_jacket_pick_stitch = $row1["tuxedo_jacket_pick_stitch"];
$tuxedo_jacket_pick_stitch_sleeves = $row1["tuxedo_jacket_pick_stitch_sleeves"];
if ($tuxedo_jacket_pick_stitch == "0") {
	$tuxedo_jacket_pick_stitch_sleeves_price = 0;
} else if ($tuxedo_jacket_pick_stitch == "1" && $tuxedo_jacket_pick_stitch_sleeves != "DEFAULT TONAL") {
	$sqlprice3 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Sleeves Pick Stitch' ";
	$queryprice3 = mysql_db_query($dbname, $sqlprice3) or die("Can't QueryPrice3");
	$rowprice3 = mysql_fetch_array($queryprice3);
	$tuxedo_jacket_pick_stitch_sleeves_price_extra = $rowprice3["0"];
	$tuxedo_jacket_pick_stitch_sleeves_price = $tuxedo_jacket_pick_stitch_sleeves_price_extra;
}

$tuxedo_jacket_pick_stitch_vest = $row1["tuxedo_jacket_pick_stitch_vest"];
if ($tuxedo_jacket_pick_stitch == "0") {
	$tuxedo_jacket_pick_stitch_vest_price = 0;
} else if ($tuxedo_jacket_pick_stitch == "1" && $tuxedo_jacket_pick_stitch_vest != "DEFAULT TONAL") {
	$sqlprice4 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Vent Pick Stitch' ";
	$queryprice4 = mysql_db_query($dbname, $sqlprice4) or die("Can't QueryPrice4");
	$rowprice4 = mysql_fetch_array($queryprice4);
	$tuxedo_jacket_pick_stitch_vest_price_extra = $rowprice4["0"];
	$tuxedo_jacket_pick_stitch_vest_price = $tuxedo_jacket_pick_stitch_vest_price_extra;
}

$tuxedo_jacket_elbow_patch = $row1["tuxedo_jacket_elbow_patch"];
if ($tuxedo_jacket_elbow_patch == "") {
	$tuxedo_jacket_elbow_patch_price = 0;
} else if ($tuxedo_jacket_elbow_patch != "") {
	$sqlprice5 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Elbow Patch' ";
	$queryprice5 = mysql_db_query($dbname, $sqlprice5) or die("Can't QueryPrice5");
	$rowprice5 = mysql_fetch_array($queryprice5);
	$tuxedo_jacket_elbow_patch_price_extra = $rowprice5["0"];
	$tuxedo_jacket_elbow_patch_price = $tuxedo_jacket_elbow_patch_price_extra;
}

$tuxedo_jacket_canvas = $row1["tuxedo_jacket_canvas"];
if ($tuxedo_jacket_canvas != "3") {
	$tuxedo_jacket_canvas_price = 0;
} else if ($tuxedo_jacket_canvas == "3") {
	$sqlprice6 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Full Canvas' ";
	$queryprice6 = mysql_db_query($dbname, $sqlprice6) or die("Can't QueryPrice6");
	$rowprice6 = mysql_fetch_array($queryprice6);
	$tuxedo_jacket_canvas_price_extra = $rowprice6["0"];
	$tuxedo_jacket_canvas_price = $tuxedo_jacket_canvas_price_extra;
}

$tuxedo_jacket_chest_pocket_satin_fabric = $row1["tuxedo_jacket_chest_pocket_satin_fabric"];
if ($tuxedo_jacket_chest_pocket_satin_fabric == "") {
	$tuxedo_jacket_chest_pocket_satin_fabric_price = 0;
} else if ($tuxedo_jacket_chest_pocket_satin_fabric != "") {
	$sqlprice7 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Satin Option on Chest Pocket' ";
	$queryprice7 = mysql_db_query($dbname, $sqlprice7) or die("Can't QueryPrice7");
	$rowprice7 = mysql_fetch_array($queryprice7);
	$tuxedo_jacket_chest_pocket_satin_fabric_price_extra = $rowprice7["0"];
	$tuxedo_jacket_chest_pocket_satin_fabric_price = $tuxedo_jacket_chest_pocket_satin_fabric_price_extra;
}

$tuxedo_jacket_lower_pocket_satin_fabric = $row1["tuxedo_jacket_lower_pocket_satin_fabric"];
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

/*BUTTON*/
$tuxedo_jacket_jacket_button_number = $row1["tuxedo_jacket_jacket_button_number"];

/*CUSTOMER*/
$tuxedo_jacket_customer_name = $row1["tuxedo_jacket_customer_name"];
$tuxedo_jacket_order_no = $row1["tuxedo_jacket_order_no"];
$tuxedo_jacket_order_date = date("m/d/Y");
$tuxedo_jacket_delivery_date = $row1["tuxedo_jacket_delivery_date"];

/*CUSTOMIZE*/
$tuxedo_jacket_jacket_style = $row1["tuxedo_jacket_jacket_style"];
$tuxedo_jacket_satin_style = $row1["tuxedo_jacket_satin_style"];
$tuxedo_jacket_collar_satin_style = $row1["tuxedo_jacket_collar_satin_style"];
$tuxedo_jacket_lapel_satin_style = $row1["tuxedo_jacket_lapel_satin_style"];
$tuxedo_jacket_half_satin_option = $row1["tuxedo_jacket_half_satin_option"];
$tuxedo_jacket_lapel_style = $row1["tuxedo_jacket_lapel_style"];
$tuxedo_jacket_lapel_width = $row1["tuxedo_jacket_lapel_width"];
$tuxedo_jacket_lapel_color = $row1["tuxedo_jacket_lapel_color"];
$tuxedo_jacket_real_lapel_boutonniere = $row1["tuxedo_jacket_real_lapel_boutonniere"];
$tuxedo_jacket_vent_style = $row1["tuxedo_jacket_vent_style"];
$tuxedo_jacket_pocket_style = $row1["tuxedo_jacket_pocket_style"];
$tuxedo_jacket_chest_pocket = $row1["tuxedo_jacket_chest_pocket"];
$tuxedo_jacket_chest_pocket_satin = $row1["tuxedo_jacket_chest_pocket_satin"];
$tuxedo_jacket_chest_pocket_satin_color = $row1["tuxedo_jacket_chest_pocket_satin_color"];
$tuxedo_jacket_chest_pocket_satin_fabric = $row1["tuxedo_jacket_chest_pocket_satin_fabric"];
$tuxedo_jacket_lower_pocket_satin = $row1["tuxedo_jacket_lower_pocket_satin"];
$tuxedo_jacket_lower_pocket_satin_color = $row1["tuxedo_jacket_lower_pocket_satin_color"];
$tuxedo_jacket_lower_pocket_satin_fabric = $row1["tuxedo_jacket_lower_pocket_satin_fabric"];
$tuxedo_jacket_shoulder_construction = $row1["tuxedo_jacket_shoulder_construction"];
$tuxedo_jacket_sleeve_button = $row1["tuxedo_jacket_sleeve_button"];
$tuxedo_jacket_cuff = $row1["tuxedo_jacket_cuff"];
$tuxedo_jacket_all_sleevebutton_holes_color = $row1["tuxedo_jacket_all_sleevebutton_holes_color"];
$tuxedo_jacket_contrast_last_sleevebutton_holes_color = $row1["tuxedo_jacket_contrast_last_sleevebutton_holes_color"];
$tuxedo_jacket_contrast_last_sleevebutton_holes_button = $row1["tuxedo_jacket_contrast_last_sleevebutton_holes_button"];
$tuxedo_jacket_lining_style = $row1["tuxedo_jacket_lining_style"];
$tuxedo_jacket_canvas = $row1["tuxedo_jacket_canvas"];
$tuxedo_jacket_jacket_thread_on_button = $row1["tuxedo_jacket_jacket_thread_on_button"];
$tuxedo_jacket_jacket_button_hole_color = $row1["tuxedo_jacket_jacket_button_hole_color"];
$tuxedo_jacket_pick_stitch = $row1["tuxedo_jacket_pick_stitch"];
$tuxedo_jacket_pick_stitch_lapel_color = $row1["tuxedo_jacket_pick_stitch_lapel_color"];
$tuxedo_jacket_pick_stitch_pocket_color = $row1["tuxedo_jacket_pick_stitch_pocket_color"];
$tuxedo_jacket_pick_stitch_sleeves = $row1["tuxedo_jacket_pick_stitch_sleeves"];
$tuxedo_jacket_pick_stitch_vest = $row1["tuxedo_jacket_pick_stitch_vest"];
$tuxedo_jacket_embroidery_inside_initial_or_name = $row1["tuxedo_jacket_embroidery_inside_initial_or_name"];
$tuxedo_jacket_embroidery_inside_color = $row1["tuxedo_jacket_embroidery_inside_color"];
$tuxedo_jacket_embroidery_inside_design = $row1["tuxedo_jacket_embroidery_inside_design"];
$tuxedo_jacket_embroidery_collar_initial_or_name = $row1["tuxedo_jacket_embroidery_collar_initial_or_name"];
$tuxedo_jacket_embroidery_collar_color = $row1["tuxedo_jacket_embroidery_collar_color"];
$tuxedo_jacket_embroidery_collar_design = $row1["tuxedo_jacket_embroidery_collar_design"];
$tuxedo_jacket_brand = $row1["tuxedo_jacket_brand"];
$tuxedo_jacket_elbow_patch = $row1["tuxedo_jacket_elbow_patch"];
$tuxedo_jacket_collar_felt_color = $row1["tuxedo_jacket_collar_felt_color"];

/*MEASUREMENTS*/
$tuxedo_jacket_jacket_measurement_sex = $row2["tuxedo_jacket_jacket_measurement_sex"];
$tuxedo_jacket_jacket_measurement_fit = $row2["tuxedo_jacket_jacket_measurement_fit"];
$tuxedo_jacket_jacket_measurement = $row2["tuxedo_jacket_jacket_measurement"];
$tuxedo_jacket_jacket_measurement_jacket_length = $row2["tuxedo_jacket_jacket_measurement_jacket_length"];
$tuxedo_jacket_jacket_measurement_back_lenght = $row2["tuxedo_jacket_jacket_measurement_back_lenght"];
$tuxedo_jacket_jacket_measurement_chest = $row2["tuxedo_jacket_jacket_measurement_chest"];
$tuxedo_jacket_jacket_measurement_waist_only = $row2["tuxedo_jacket_jacket_measurement_waist_only"];
$tuxedo_jacket_jacket_measurement_hips = $row2["tuxedo_jacket_jacket_measurement_hips"];
$tuxedo_jacket_jacket_measurement_shoulders = $row2["tuxedo_jacket_jacket_measurement_shoulders"];
$tuxedo_jacket_jacket_measurement_neck = $row2["tuxedo_jacket_jacket_measurement_neck"];
$tuxedo_jacket_jacket_measurement_ptp_front = $row2["tuxedo_jacket_jacket_measurement_ptp_front"];
$tuxedo_jacket_jacket_measurement_ptp_back = $row2["tuxedo_jacket_jacket_measurement_ptp_back"];
$tuxedo_jacket_jacket_measurement_arm_hole = $row2["tuxedo_jacket_jacket_measurement_arm_hole"];
$tuxedo_jacket_jacket_measurement_biceps = $row2["tuxedo_jacket_jacket_measurement_biceps"];
$tuxedo_jacket_jacket_measurement_sleeves_right = $row2["tuxedo_jacket_jacket_measurement_sleeves_right"];
$tuxedo_jacket_jacket_measurement_sleeves_left = $row2["tuxedo_jacket_jacket_measurement_sleeves_left"];
$tuxedo_jacket_jacket_measurement_wrist_right = $row2["tuxedo_jacket_jacket_measurement_wrist_right"];
$tuxedo_jacket_jacket_measurement_wrist_left = $row2["tuxedo_jacket_jacket_measurement_wrist_left"];
$tuxedo_jacket_jacket_measurement_first_button = $row2["tuxedo_jacket_jacket_measurement_first_button"];
$tuxedo_jacket_jacket_measurement_shoulder_upper_wrist = $row2["tuxedo_jacket_jacket_measurement_shoulder_upper_wrist"];
$tuxedo_jacket_jacket_measurement_shoulder_lower_wrist = $row2["tuxedo_jacket_jacket_measurement_shoulder_lower_wrist"];
$tuxedo_jacket_measurement_jacket_shoulder = $row2["tuxedo_jacket_measurement_jacket_shoulder"];
$tuxedo_jacket_measurement_jacket_waist = $row2["tuxedo_jacket_measurement_jacket_waist"];
$tuxedo_jacket_measurement_jacket_chest = $row2["tuxedo_jacket_measurement_jacket_chest"];
$tuxedo_jacket_body_front = $row2["tuxedo_jacket_body_front"];
$tuxedo_jacket_body_left = $row2["tuxedo_jacket_body_left"];
$tuxedo_jacket_body_right = $row2["tuxedo_jacket_body_right"];
$tuxedo_jacket_body_back = $row2["tuxedo_jacket_body_back"];
$tuxedo_jacket_remark = $row2["tuxedo_jacket_remark"];

/*ECT*/
$tuxedo_jacket_date = date("m/d/Y");
$tuxedo_jacket_time = date("H:i:s");
$tuxedo_jacket_ip = $_POST['ip'];
$tuxedo_jacket_status = T;

/*PRODUCT*/
$order_product = $row3['order_product'];

$sql7 =	" INSERT INTO customize_order (id, order_id, product_id, order_reseller, order_order_no, order_name_customize, order_my_price, order_price, order_product, order_fabric_no, order_date, order_time, order_ip, order_status) VALUES ('$id_order', '$order_id_same', '$product_id', '$company_user', '$tuxedo_jacket_order_no', '$tuxedo_jacket_customer_name', '$tuxedo_jacket_my_price_1', '$tuxedo_jacket_price_1', '$order_product', '$tuxedo_jacket_fabric_no_1', '$tuxedo_jacket_date', '$tuxedo_jacket_time', '$tuxedo_jacket_ip', '$tuxedo_jacket_status') ";
$query7 = mysql_query($sql7) or die("Can't Query7");

$sql8 = " INSERT INTO customize_tuxedo_jacket_design (id, order_id, product_id, tuxedo_jacket_customer_name, tuxedo_jacket_order_no, tuxedo_jacket_order_date, tuxedo_jacket_delivery_date, tuxedo_jacket_fabric_no, tuxedo_jacket_lining_no, tuxedo_jacket_jacket_style, tuxedo_jacket_satin_style, tuxedo_jacket_collar_satin_style, tuxedo_jacket_lapel_satin_style, tuxedo_jacket_half_satin_option, tuxedo_jacket_lapel_style, tuxedo_jacket_lapel_width, tuxedo_jacket_lapel_color, tuxedo_jacket_real_lapel_boutonniere, tuxedo_jacket_vent_style, tuxedo_jacket_pocket_style, tuxedo_jacket_chest_pocket, tuxedo_jacket_chest_pocket_satin, tuxedo_jacket_chest_pocket_satin_color, tuxedo_jacket_chest_pocket_satin_fabric, tuxedo_jacket_lower_pocket_satin, tuxedo_jacket_lower_pocket_satin_color, tuxedo_jacket_lower_pocket_satin_fabric, tuxedo_jacket_shoulder_construction, tuxedo_jacket_sleeve_button, tuxedo_jacket_cuff, tuxedo_jacket_all_sleevebutton_holes_color, tuxedo_jacket_contrast_last_sleevebutton_holes_color, tuxedo_jacket_contrast_last_sleevebutton_holes_button, tuxedo_jacket_lining_style, tuxedo_jacket_canvas, tuxedo_jacket_jacket_button_number, tuxedo_jacket_jacket_thread_on_button, tuxedo_jacket_jacket_button_hole_color, tuxedo_jacket_pick_stitch, tuxedo_jacket_pick_stitch_lapel_color, tuxedo_jacket_pick_stitch_pocket_color, tuxedo_jacket_pick_stitch_sleeves, tuxedo_jacket_pick_stitch_vest, tuxedo_jacket_embroidery_inside_initial_or_name, tuxedo_jacket_embroidery_inside_color, tuxedo_jacket_embroidery_inside_design, tuxedo_jacket_embroidery_collar_initial_or_name, tuxedo_jacket_embroidery_collar_color, tuxedo_jacket_embroidery_collar_design, tuxedo_jacket_brand, tuxedo_jacket_elbow_patch, tuxedo_jacket_collar_felt_color, tuxedo_jacket_date, tuxedo_jacket_time, tuxedo_jacket_ip, tuxedo_jacket_status) VALUES ('$id_tuxedo_jacket', '$order_id_same', '$product_id', '$tuxedo_jacket_customer_name', '$tuxedo_jacket_order_no', '$tuxedo_jacket_order_date', '$tuxedo_jacket_delivery_date', '$tuxedo_jacket_fabric_no_1', '$tuxedo_jacket_lining_no_1', '$tuxedo_jacket_jacket_style', '$tuxedo_jacket_satin_style', '$tuxedo_jacket_collar_satin_style', '$tuxedo_jacket_lapel_satin_style', '$tuxedo_jacket_half_satin_option', '$tuxedo_jacket_lapel_style', '$tuxedo_jacket_lapel_width', '$tuxedo_jacket_lapel_color', '$tuxedo_jacket_real_lapel_boutonniere', '$tuxedo_jacket_vent_style', '$tuxedo_jacket_pocket_style', '$tuxedo_jacket_chest_pocket', '$tuxedo_jacket_chest_pocket_satin', '$tuxedo_jacket_chest_pocket_satin_color', '$tuxedo_jacket_chest_pocket_satin_fabric', '$tuxedo_jacket_lower_pocket_satin', '$tuxedo_jacket_lower_pocket_satin_color', '$tuxedo_jacket_lower_pocket_satin_fabric', '$tuxedo_jacket_shoulder_construction', '$tuxedo_jacket_sleeve_button', '$tuxedo_jacket_cuff', '$tuxedo_jacket_all_sleevebutton_holes_color', '$tuxedo_jacket_contrast_last_sleevebutton_holes_color', '$tuxedo_jacket_contrast_last_sleevebutton_holes_button', '$tuxedo_jacket_lining_style', '$tuxedo_jacket_canvas', '$tuxedo_jacket_jacket_button_number', '$tuxedo_jacket_jacket_thread_on_button', '$tuxedo_jacket_jacket_button_hole_color', '$tuxedo_jacket_pick_stitch', '$tuxedo_jacket_pick_stitch_lapel_color', '$tuxedo_jacket_pick_stitch_pocket_color', '$tuxedo_jacket_pick_stitch_sleeves', '$tuxedo_jacket_pick_stitch_vest', '$tuxedo_jacket_embroidery_inside_initial_or_name', '$tuxedo_jacket_embroidery_inside_color', '$tuxedo_jacket_embroidery_inside_design', '$tuxedo_jacket_embroidery_collar_initial_or_name', '$tuxedo_jacket_embroidery_collar_color', '$tuxedo_jacket_embroidery_collar_design', '$tuxedo_jacket_brand', '$tuxedo_jacket_elbow_patch', '$tuxedo_jacket_collar_felt_color', '$tuxedo_jacket_date', '$tuxedo_jacket_time', '$tuxedo_jacket_ip', '$tuxedo_jacket_status') ";
$query8 = mysql_query($sql8) or die("Can't Query8");

$sql9 = " INSERT INTO customize_tuxedo_jacket_measurements (id, order_id, product_id, tuxedo_jacket_jacket_measurement_sex, tuxedo_jacket_jacket_measurement_fit, tuxedo_jacket_jacket_measurement, tuxedo_jacket_jacket_measurement_jacket_length, tuxedo_jacket_jacket_measurement_back_lenght, tuxedo_jacket_jacket_measurement_chest, tuxedo_jacket_jacket_measurement_waist_only, tuxedo_jacket_jacket_measurement_hips, tuxedo_jacket_jacket_measurement_shoulders, tuxedo_jacket_jacket_measurement_neck, tuxedo_jacket_jacket_measurement_ptp_front, tuxedo_jacket_jacket_measurement_ptp_back, tuxedo_jacket_jacket_measurement_arm_hole, tuxedo_jacket_jacket_measurement_biceps, tuxedo_jacket_jacket_measurement_sleeves_right, tuxedo_jacket_jacket_measurement_sleeves_left, tuxedo_jacket_jacket_measurement_wrist_right, tuxedo_jacket_jacket_measurement_wrist_left, tuxedo_jacket_jacket_measurement_first_button, tuxedo_jacket_jacket_measurement_shoulder_upper_wrist, tuxedo_jacket_jacket_measurement_shoulder_lower_wrist, tuxedo_jacket_measurement_jacket_shoulder, tuxedo_jacket_measurement_jacket_waist, tuxedo_jacket_measurement_jacket_chest, tuxedo_jacket_body_front, tuxedo_jacket_body_left, tuxedo_jacket_body_right, tuxedo_jacket_body_back, tuxedo_jacket_remark, tuxedo_jacket_date, tuxedo_jacket_time, tuxedo_jacket_ip, tuxedo_jacket_status) VALUES ('$id_tuxedo_jacket', '$order_id_same', '$product_id', '$tuxedo_jacket_jacket_measurement_sex', '$tuxedo_jacket_jacket_measurement_fit', '$tuxedo_jacket_jacket_measurement', '$tuxedo_jacket_jacket_measurement_jacket_length', '$tuxedo_jacket_jacket_measurement_back_lenght', '$tuxedo_jacket_jacket_measurement_chest', '$tuxedo_jacket_jacket_measurement_waist_only', '$tuxedo_jacket_jacket_measurement_hips', '$tuxedo_jacket_jacket_measurement_shoulders', '$tuxedo_jacket_jacket_measurement_neck', '$tuxedo_jacket_jacket_measurement_ptp_front', '$tuxedo_jacket_jacket_measurement_ptp_back', '$tuxedo_jacket_jacket_measurement_arm_hole', '$tuxedo_jacket_jacket_measurement_biceps', '$tuxedo_jacket_jacket_measurement_sleeves_right', '$tuxedo_jacket_jacket_measurement_sleeves_left', '$tuxedo_jacket_jacket_measurement_wrist_right', '$tuxedo_jacket_jacket_measurement_wrist_left', '$tuxedo_jacket_jacket_measurement_first_button', '$tuxedo_jacket_jacket_measurement_shoulder_upper_wrist', '$tuxedo_jacket_jacket_measurement_shoulder_lower_wrist', '$tuxedo_jacket_measurement_jacket_shoulder', '$tuxedo_jacket_measurement_jacket_waist', '$tuxedo_jacket_measurement_jacket_chest', '$tuxedo_jacket_body_front', '$tuxedo_jacket_body_left', '$tuxedo_jacket_body_right', '$tuxedo_jacket_body_back', '$tuxedo_jacket_remark', '$tuxedo_jacket_date', '$tuxedo_jacket_time', '$tuxedo_jacket_ip', '$tuxedo_jacket_status') ";
$query9 = mysql_query($sql9) or die("Can't Query9");

if($query9) {
	
	echo " <script language='javascript'> window.location='../../cart/single/index.php?orderid=".$order_id_same."'; </script> ";
	
}

mysql_close();
?>