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
$jacket_orderid = $_POST["jacket_orderid"];

if ($jacket_orderid != "") {
	
	$order_id = $jacket_orderid;
	
} else if ($jacket_orderid == "") {
	
	$sql1 =	" SELECT MAX(order_id) FROM customize_order ";
	$query1 = mysql_db_query($dbname, $sql1) or die("Can't Query1");
	$row1 = mysql_fetch_array($query1);
	$order_id = $row1[0] + 1 ;
	
}

$sql2 =	" SELECT MAX(id) FROM customize_checkout ";
$query2 = mysql_db_query($dbname, $sql2) or die("Can't Query2");
$row2 = mysql_fetch_array($query2);
$id_customize_checkout = $row2[0] + 1 ;

/*FABRIC*/
$jacket_fabric_no_1 = $_POST["jacket_fabric_no_1"];
$jacket_lining_no_1 = $_POST["jacket_lining_no_1"];
$jacket_fabric_no_2 = $_POST["jacket_fabric_no_2"];
$jacket_lining_no_2 = $_POST["jacket_lining_no_2"];
$jacket_fabric_no_3 = $_POST["jacket_fabric_no_3"];
$jacket_lining_no_3 = $_POST["jacket_lining_no_3"];
$jacket_fabric_no_4 = $_POST["jacket_fabric_no_4"];
$jacket_lining_no_4 = $_POST["jacket_lining_no_4"];
$jacket_fabric_no_5 = $_POST["jacket_fabric_no_5"];
$jacket_lining_no_5 = $_POST["jacket_lining_no_5"];
$jacket_fabric_no_6 = $_POST["jacket_fabric_no_6"];
$jacket_lining_no_6 = $_POST["jacket_lining_no_6"];

$sql4 =	" SELECT * FROM admin_fabrics_jacket WHERE fabricno = '$jacket_fabric_no_1' ";
$query4 = mysql_db_query($dbname, $sql4) or die("Can't Query4");
$row4 = mysql_fetch_array($query4);
$fabrics_type = $row4["type"];
$fabrics_brand = $row4["brand"];

if ($row4["type"] != '') {

$sql01 = " SELECT `fabrictype_".$id_user."` FROM admin_fabrictype WHERE fabrictype_name = '$fabrics_type' AND fabrictype_product = 'Jacket' ";
$query01 = mysql_db_query($dbname, $sql01) or die("Can't Query01");
$row01 = mysql_fetch_array($query01);
$jacket_fabric_price_1 = $row01["0"];

} else if ($row4["brand"] != '') {
	
$sql02 = " SELECT `fabricbrand_".$id_user."` FROM admin_fabricbrand WHERE fabricbrand_name = '$fabrics_brand' AND fabricbrand_product = 'Jacket' ";
$query02 = mysql_db_query($dbname, $sql02) or die("Can't Query02");
$row02 = mysql_fetch_array($query02);	
$jacket_fabric_price_1 = $row02["0"];
	
}

$sql5 =	" SELECT * FROM admin_fabrics_jacket WHERE fabricno = '$jacket_fabric_no_2' ";
$query5 = mysql_db_query($dbname, $sql5) or die("Can't Query5");
$row5 = mysql_fetch_array($query5);
$fabrics_type = $row5["type"];
$fabrics_brand = $row5["brand"];

if ($row5["type"] != '') {

$sql03 = " SELECT `fabrictype_".$id_user."` FROM admin_fabrictype WHERE fabrictype_name = '$fabrics_type' AND fabrictype_product = 'Jacket' ";
$query03 = mysql_db_query($dbname, $sql03) or die("Can't Query03");
$row03 = mysql_fetch_array($query03);
$jacket_fabric_price_2 = $row03["0"];

} else if ($row5["brand"] != '') {
	
$sql04 = " SELECT `fabricbrand_".$id_user."` FROM admin_fabricbrand WHERE fabricbrand_name = '$fabrics_brand' AND fabricbrand_product = 'Jacket' ";
$query04 = mysql_db_query($dbname, $sql04) or die("Can't Query04");
$row04 = mysql_fetch_array($query04);	
$jacket_fabric_price_2 = $row04["0"];
	
}

$sql6 =	" SELECT * FROM admin_fabrics_jacket WHERE fabricno = '$jacket_fabric_no_3' ";
$query6 = mysql_db_query($dbname, $sql6) or die("Can't Query6");
$row6 = mysql_fetch_array($query6);
$fabrics_type = $row6["type"];
$fabrics_brand = $row6["brand"];

if ($row6["type"] != '') {

$sql05 = " SELECT `fabrictype_".$id_user."` FROM admin_fabrictype WHERE fabrictype_name = '$fabrics_type' AND fabrictype_product = 'Jacket' ";
$query05 = mysql_db_query($dbname, $sql05) or die("Can't Query05");
$row05 = mysql_fetch_array($query05);
$jacket_fabric_price_3 = $row05["0"];

} else if ($row6["brand"] != '') {
	
$sql06 = " SELECT `fabricbrand_".$id_user."` FROM admin_fabricbrand WHERE fabricbrand_name = '$fabrics_brand' AND fabricbrand_product = 'Jacket' ";
$query06 = mysql_db_query($dbname, $sql06) or die("Can't Query06");
$row06 = mysql_fetch_array($query06);	
$jacket_fabric_price_3 = $row06["0"];
	
}

$sql7 =	" SELECT * FROM admin_fabrics_jacket WHERE fabricno = '$jacket_fabric_no_4' ";
$query7 = mysql_db_query($dbname, $sql7) or die("Can't Query7");
$row7 = mysql_fetch_array($query7);
$fabrics_type = $row7["type"];
$fabrics_brand = $row7["brand"];

if ($row7["type"] != '') {

$sql07 = " SELECT `fabrictype_".$id_user."` FROM admin_fabrictype WHERE fabrictype_name = '$fabrics_type' AND fabrictype_product = 'Jacket' ";
$query07 = mysql_db_query($dbname, $sql07) or die("Can't Query07");
$row07 = mysql_fetch_array($query07);
$jacket_fabric_price_4 = $row07["0"];

} else if ($row7["brand"] != '') {
	
$sql08 = " SELECT `fabricbrand_".$id_user."` FROM admin_fabricbrand WHERE fabricbrand_name = '$fabrics_brand' AND fabricbrand_product = 'Jacket' ";
$query08 = mysql_db_query($dbname, $sql08) or die("Can't Query08");
$row08 = mysql_fetch_array($query08);	
$jacket_fabric_price_4 = $row08["0"];
	
}

$sql8 = " SELECT * FROM admin_fabrics_jacket WHERE fabricno = '$jacket_fabric_no_5' ";
$query8 = mysql_db_query($dbname, $sql8) or die("Can't Query8");
$row8 = mysql_fetch_array($query8);
$fabrics_type = $row8["type"];
$fabrics_brand = $row8["brand"];

if ($row8["type"] != '') {

$sql09 = " SELECT `fabrictype_".$id_user."` FROM admin_fabrictype WHERE fabrictype_name = '$fabrics_type' AND fabrictype_product = 'Jacket' ";
$query09 = mysql_db_query($dbname, $sql09) or die("Can't Query09");
$row09 = mysql_fetch_array($query09);
$jacket_fabric_price_5 = $row09["0"];

} else if ($row8["brand"] != '') {
	
$sql010 = " SELECT `fabricbrand_".$id_user."` FROM admin_fabricbrand WHERE fabricbrand_name = '$fabrics_brand' AND fabricbrand_product = 'Jacket' ";
$query010 = mysql_db_query($dbname, $sql010) or die("Can't Query010");
$row010 = mysql_fetch_array($query010);	
$jacket_fabric_price_5 = $row010["0"];
	
}

$sql9 = " SELECT * FROM admin_fabrics_jacket WHERE fabricno = '$jacket_fabric_no_6' ";
$query9 = mysql_db_query($dbname, $sql9) or die("Can't Query9");
$row9 = mysql_fetch_array($query9);
$fabrics_type = $row9["type"];
$fabrics_brand = $row9["brand"];

if ($row9["type"] != '') {

$sql011 = " SELECT `fabrictype_".$id_user."` FROM admin_fabrictype WHERE fabrictype_name = '$fabrics_type' AND fabrictype_product = 'Jacket' ";
$query011 = mysql_db_query($dbname, $sql011) or die("Can't Query011");
$row011 = mysql_fetch_array($query011);
$jacket_fabric_price_6 = $row011["0"];

} else if ($row9["brand"] != '') {
	
$sql012 = " SELECT `fabricbrand_".$id_user."` FROM admin_fabricbrand WHERE fabricbrand_name = '$fabrics_brand' AND fabricbrand_product = 'Jacket' ";
$query012 = mysql_db_query($dbname, $sql012) or die("Can't Query012");
$row012 = mysql_fetch_array($query012);	
$jacket_fabric_price_6 = $row012["0"];
	
}

/*OTHER PRICING PARAMETERS*/
$jacket_jacket_measurement_chest = $_POST["jacket_jacket_measurement_chest"];
$jacket_jacket_measurement_waist_only = $_POST["jacket_jacket_measurement_waist_only"];
$jacket_jacket_measurement_hips = $_POST["jacket_jacket_measurement_hips"];

if (($jacket_jacket_measurement_chest >= '50' && $jacket_jacket_measurement_chest <= '52') || ($jacket_jacket_measurement_waist_only >= '50' && $jacket_jacket_measurement_waist_only <= '52') || ($jacket_jacket_measurement_hips >= '50' && $jacket_jacket_measurement_hips <= '52')) {
	
	$price_size_1 = $jacket_fabric_price_1 * 20;
	$price_size_2 = $price_size_1 / 100;
	$price_size_3 = $price_size_2 + $jacket_fabric_price_1;
	
	$price_size_4 = $jacket_fabric_price_2 * 20;
	$price_size_5 = $price_size_4 / 100;
	$price_size_6 = $price_size_5 + $jacket_fabric_price_2;
	
	$price_size_7 = $jacket_fabric_price_3 * 20;
	$price_size_8 = $price_size_7 / 100;
	$price_size_9 = $price_size_8 + $jacket_fabric_price_3;
	
	$price_size_10 = $jacket_fabric_price_4 * 20;
	$price_size_11 = $price_size_10 / 100;
	$price_size_12 = $price_size_11 + $jacket_fabric_price_4;
	
	$price_size_13 = $jacket_fabric_price_5 * 20;
	$price_size_14 = $price_size_13 / 100;
	$price_size_15 = $price_size_14 + $jacket_fabric_price_5;
	
	$price_size_16 = $jacket_fabric_price_6 * 20;
	$price_size_17 = $price_size_16 / 100;
	$price_size_18 = $price_size_17 + $jacket_fabric_price_6;
	
} else if (($jacket_jacket_measurement_chest >= '52.5' && $jacket_jacket_measurement_chest <= '56') || ($jacket_jacket_measurement_waist_only >= '52.5' && $jacket_jacket_measurement_waist_only <= '56') || ($jacket_jacket_measurement_hips >= '52.5' && $jacket_jacket_measurement_hips <= '56')) {
	
	$price_size_1 = $jacket_fabric_price_1 * 30;
	$price_size_2 = $price_size_1 / 100;
	$price_size_3 = $price_size_2 + $jacket_fabric_price_1;
	
	$price_size_4 = $jacket_fabric_price_2 * 30;
	$price_size_5 = $price_size_4 / 100;
	$price_size_6 = $price_size_5 + $jacket_fabric_price_2;
	
	$price_size_7 = $jacket_fabric_price_3 * 30;
	$price_size_8 = $price_size_7 / 100;
	$price_size_9 = $price_size_8 + $jacket_fabric_price_3;
	
	$price_size_10 = $jacket_fabric_price_4 * 30;
	$price_size_11 = $price_size_10 / 100;
	$price_size_12 = $price_size_11 + $jacket_fabric_price_4;
	
	$price_size_13 = $jacket_fabric_price_5 * 30;
	$price_size_14 = $price_size_13 / 100;
	$price_size_15 = $price_size_14 + $jacket_fabric_price_5;
	
	$price_size_16 = $jacket_fabric_price_6 * 30;
	$price_size_17 = $price_size_16 / 100;
	$price_size_18 = $price_size_17 + $jacket_fabric_price_6;
	
} else if (($jacket_jacket_measurement_chest >= '56.5' && $jacket_jacket_measurement_chest <= '60') || ($jacket_jacket_measurement_waist_only >= '56.5' && $jacket_jacket_measurement_waist_only <= '60') || ($jacket_jacket_measurement_hips >= '56.5' && $jacket_jacket_measurement_hips <= '60')) {
	
	$price_size_1 = $jacket_fabric_price_1 * 40;
	$price_size_2 = $price_size_1 / 100;
	$price_size_3 = $price_size_2 + $jacket_fabric_price_1;
	
	$price_size_4 = $jacket_fabric_price_2 * 40;
	$price_size_5 = $price_size_4 / 100;
	$price_size_6 = $price_size_5 + $jacket_fabric_price_2;
	
	$price_size_7 = $jacket_fabric_price_3 * 40;
	$price_size_8 = $price_size_7 / 100;
	$price_size_9 = $price_size_8 + $jacket_fabric_price_3;
	
	$price_size_10 = $jacket_fabric_price_4 * 40;
	$price_size_11 = $price_size_10 / 100;
	$price_size_12 = $price_size_11 + $jacket_fabric_price_4;
	
	$price_size_13 = $jacket_fabric_price_5 * 40;
	$price_size_14 = $price_size_13 / 100;
	$price_size_15 = $price_size_14 + $jacket_fabric_price_5;
	
	$price_size_16 = $jacket_fabric_price_6 * 40;
	$price_size_17 = $price_size_16 / 100;
	$price_size_18 = $price_size_17 + $jacket_fabric_price_6;
	
} else if (($jacket_jacket_measurement_chest >= '60.5' && $jacket_jacket_measurement_chest <= '64') || ($jacket_jacket_measurement_waist_only >= '60.5' && $jacket_jacket_measurement_waist_only <= '64') || ($jacket_jacket_measurement_hips >= '60.5' && $jacket_jacket_measurement_hips <= '64')) {
	
	$price_size_1 = $jacket_fabric_price_1 * 50;
	$price_size_2 = $price_size_1 / 100;
	$price_size_3 = $price_size_2 + $jacket_fabric_price_1;
	
	$price_size_4 = $jacket_fabric_price_2 * 50;
	$price_size_5 = $price_size_4 / 100;
	$price_size_6 = $price_size_5 + $jacket_fabric_price_2;
	
	$price_size_7 = $jacket_fabric_price_3 * 50;
	$price_size_8 = $price_size_7 / 100;
	$price_size_9 = $price_size_8 + $jacket_fabric_price_3;
	
	$price_size_10 = $jacket_fabric_price_4 * 50;
	$price_size_11 = $price_size_10 / 100;
	$price_size_12 = $price_size_11 + $jacket_fabric_price_4;
	
	$price_size_13 = $jacket_fabric_price_5 * 50;
	$price_size_14 = $price_size_13 / 100;
	$price_size_15 = $price_size_14 + $jacket_fabric_price_5;
	
	$price_size_16 = $jacket_fabric_price_6 * 50;
	$price_size_17 = $price_size_16 / 100;
	$price_size_18 = $price_size_17 + $jacket_fabric_price_6;
	
} else if (($jacket_jacket_measurement_chest >= '64.5' && $jacket_jacket_measurement_chest <= '68') || ($jacket_jacket_measurement_waist_only >= '64.5' && $jacket_jacket_measurement_waist_only <= '68') || ($jacket_jacket_measurement_hips >= '64.5' && $jacket_jacket_measurement_hips <= '68')) {
	
	$price_size_1 = $jacket_fabric_price_1 * 60;
	$price_size_2 = $price_size_1 / 100;
	$price_size_3 = $price_size_2 + $jacket_fabric_price_1;
	
	$price_size_4 = $jacket_fabric_price_2 * 60;
	$price_size_5 = $price_size_4 / 100;
	$price_size_6 = $price_size_5 + $jacket_fabric_price_2;
	
	$price_size_7 = $jacket_fabric_price_3 * 60;
	$price_size_8 = $price_size_7 / 100;
	$price_size_9 = $price_size_8 + $jacket_fabric_price_3;
	
	$price_size_10 = $jacket_fabric_price_4 * 60;
	$price_size_11 = $price_size_10 / 100;
	$price_size_12 = $price_size_11 + $jacket_fabric_price_4;
	
	$price_size_13 = $jacket_fabric_price_5 * 60;
	$price_size_14 = $price_size_13 / 100;
	$price_size_15 = $price_size_14 + $jacket_fabric_price_5;
	
	$price_size_16 = $jacket_fabric_price_6 * 60;
	$price_size_17 = $price_size_16 / 100;
	$price_size_18 = $price_size_17 + $jacket_fabric_price_6;
	
}  else {
	
	$price_size_3 = $jacket_fabric_price_1;
	$price_size_6 = $jacket_fabric_price_2;
	$price_size_9 = $jacket_fabric_price_3;
	$price_size_12 = $jacket_fabric_price_4;
	$price_size_15 = $jacket_fabric_price_5;
	$price_size_18 = $jacket_fabric_price_6;
	
}

/*BUTTON*/
$jacket_jacket_button_number = $_POST["jacket_jacket_button_number"];

$sql10 = " SELECT price FROM admin_buttons_suits WHERE buttonno = '$jacket_jacket_button_number' ";
$query10 = mysql_db_query($dbname, $sql10) or die("Can't Query10");
$row10 = mysql_fetch_array($query10);
$jacket_button_price = $row10["price"];

$jacket_button_price_1 = $price_size_3 + $jacket_button_price;
$jacket_button_price_2 = $price_size_6 + $jacket_button_price;
$jacket_button_price_3 = $price_size_9 + $jacket_button_price;
$jacket_button_price_4 = $price_size_12 + $jacket_button_price;
$jacket_button_price_5 = $price_size_15 + $jacket_button_price;
$jacket_button_price_6 = $price_size_18 + $jacket_button_price;

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

$jacket_price_2 = $jacket_button_price_2 + $jacket_embroidery_collar_initial_or_name_price + $jacket_brand_price + $jacket_pick_stitch_sleeves_price + $jacket_pick_stitch_vest_price + $jacket_elbow_patch_price + $jacket_canvas_price;

$jacket_price_3 = $jacket_button_price_3 + $jacket_embroidery_collar_initial_or_name_price + $jacket_brand_price + $jacket_pick_stitch_sleeves_price + $jacket_pick_stitch_vest_price + $jacket_elbow_patch_price + $jacket_canvas_price;

$jacket_price_4 = $jacket_button_price_4 + $jacket_embroidery_collar_initial_or_name_price + $jacket_brand_price + $jacket_pick_stitch_sleeves_price + $jacket_pick_stitch_vest_price + $jacket_elbow_patch_price + $jacket_canvas_price;

$jacket_price_5 = $jacket_button_price_5 + $jacket_embroidery_collar_initial_or_name_price + $jacket_brand_price + $jacket_pick_stitch_sleeves_price + $jacket_pick_stitch_vest_price + $jacket_elbow_patch_price + $jacket_canvas_price;

$jacket_price_6 = $jacket_button_price_6 + $jacket_embroidery_collar_initial_or_name_price + $jacket_brand_price + $jacket_pick_stitch_sleeves_price + $jacket_pick_stitch_vest_price + $jacket_elbow_patch_price + $jacket_canvas_price;

/*MY PRICES*/
$sqlmy4 =	" SELECT * FROM admin_fabrics_jacket WHERE fabricno = '$jacket_fabric_no_1' ";
$querymy4 = mysql_db_query($dbname, $sqlmy4) or die("Can't Querymy4");
$rowmy4 = mysql_fetch_array($querymy4);
$fabrics_my_type = $rowmy4["type"];
$fabrics_my_brand = $rowmy4["brand"];

if ($rowmy4["type"] != '') {

$sqlmy01 = " SELECT `fabrictypereseller_".$id_user."` FROM admin_fabrictype WHERE fabrictype_name = '$fabrics_my_type' AND fabrictype_product = 'Jacket' ";
$querymy01 = mysql_db_query($dbname, $sqlmy01) or die("Can't Querymy01");
$rowmy01 = mysql_fetch_array($querymy01);
$jacket_fabric_my_price_1 = $rowmy01["0"];

} else if ($rowmy4["brand"] != '') {
	
$sqlmy02 = " SELECT `fabricbrand_".$id_user."` FROM admin_fabricbrand WHERE fabricbrand_name = '$fabrics_my_brand' AND fabricbrand_product = 'Jacket' ";
$querymy02 = mysql_db_query($dbname, $sqlmy02) or die("Can't Querymy02");
$rowmy02 = mysql_fetch_array($querymy02);	
$jacket_fabric_my_price_1 = $rowmy02["0"];
	
}

$sqlmy5 =	" SELECT * FROM admin_fabrics_jacket WHERE fabricno = '$jacket_fabric_no_2' ";
$querymy5 = mysql_db_query($dbname, $sqlmy5) or die("Can't Querymy5");
$rowmy5 = mysql_fetch_array($querymy5);
$fabrics_my_type = $rowmy5["type"];
$fabrics_my_brand = $rowmy5["brand"];

if ($rowmy5["type"] != '') {

$sqlmy03 = " SELECT `fabrictypereseller_".$id_user."` FROM admin_fabrictype WHERE fabrictype_name = '$fabrics_my_type' AND fabrictype_product = 'Jacket' ";
$querymy03 = mysql_db_query($dbname, $sqlmy03) or die("Can't Querymy03");
$rowmy03 = mysql_fetch_array($querymy03);
$jacket_fabric_my_price_2 = $rowmy03["0"];

} else if ($rowmy5["brand"] != '') {
	
$sqlmy04 = " SELECT `fabricbrand_".$id_user."` FROM admin_fabricbrand WHERE fabricbrand_name = '$fabrics_my_brand' AND fabricbrand_product = 'Jacket' ";
$querymy04 = mysql_db_query($dbname, $sqlmy04) or die("Can't Querymy04");
$rowmy04 = mysql_fetch_array($querymy04);	
$jacket_fabric_my_price_2 = $rowmy04["0"];
	
}

$sqlmy6 =	" SELECT * FROM admin_fabrics_jacket WHERE fabricno = '$jacket_fabric_no_3' ";
$querymy6 = mysql_db_query($dbname, $sqlmy6) or die("Can't Querymy6");
$rowmy6 = mysql_fetch_array($querymy6);
$fabrics_my_type = $rowmy6["type"];
$fabrics_my_brand = $rowmy6["brand"];

if ($rowmy6["type"] != '') {

$sqlmy05 = " SELECT `fabrictypereseller_".$id_user."` FROM admin_fabrictype WHERE fabrictype_name = '$fabrics_my_type' AND fabrictype_product = 'Jacket' ";
$querymy05 = mysql_db_query($dbname, $sqlmy05) or die("Can't Querymy05");
$rowmy05 = mysql_fetch_array($querymy05);
$jacket_fabric_my_price_3 = $rowmy05["0"];

} else if ($rowmy6["brand"] != '') {
	
$sqlmy06 = " SELECT `fabricbrand_".$id_user."` FROM admin_fabricbrand WHERE fabricbrand_name = '$fabrics_my_brand' AND fabricbrand_product = 'Jacket' ";
$querymy06 = mysql_db_query($dbname, $sqlmy06) or die("Can't Querymy06");
$rowmy06 = mysql_fetch_array($querymy06);	
$jacket_fabric_my_price_3 = $rowmy06["0"];
	
}

$sqlmy7 =	" SELECT * FROM admin_fabrics_jacket WHERE fabricno = '$jacket_fabric_no_4' ";
$querymy7 = mysql_db_query($dbname, $sqlmy7) or die("Can't Querymy7");
$rowmy7 = mysql_fetch_array($querymy7);
$fabrics_my_type = $rowmy7["type"];
$fabrics_my_brand = $rowmy7["brand"];

if ($rowmy7["type"] != '') {

$sqlmy07 = " SELECT `fabrictypereseller_".$id_user."` FROM admin_fabrictype WHERE fabrictype_name = '$fabrics_my_type' AND fabrictype_product = 'Jacket' ";
$querymy07 = mysql_db_query($dbname, $sqlmy07) or die("Can't Querymy07");
$rowmy07 = mysql_fetch_array($querymy07);
$jacket_fabric_my_price_4 = $rowmy07["0"];

} else if ($rowmy7["brand"] != '') {
	
$sqlmy08 = " SELECT `fabricbrand_".$id_user."` FROM admin_fabricbrand WHERE fabricbrand_name = '$fabrics_my_brand' AND fabricbrand_product = 'Jacket' ";
$querymy08 = mysql_db_query($dbname, $sqlmy08) or die("Can't Querymy08");
$rowmy08 = mysql_fetch_array($querymy08);	
$jacket_fabric_my_price_4 = $rowmy08["0"];
	
}

$sqlmy8 = " SELECT * FROM admin_fabrics_jacket WHERE fabricno = '$jacket_fabric_no_5' ";
$querymy8 = mysql_db_query($dbname, $sqlmy8) or die("Can't Querymy8");
$rowmy8 = mysql_fetch_array($querymy8);
$fabrics_my_type = $rowmy8["type"];
$fabrics_my_brand = $rowmy8["brand"];

if ($rowmy8["type"] != '') {

$sqlmy09 = " SELECT `fabrictypereseller_".$id_user."` FROM admin_fabrictype WHERE fabrictype_name = '$fabrics_my_type' AND fabrictype_product = 'Jacket' ";
$querymy09 = mysql_db_query($dbname, $sqlmy09) or die("Can't Querymy09");
$rowmy09 = mysql_fetch_array($querymy09);
$jacket_fabric_my_price_5 = $rowmy09["0"];

} else if ($rowmy8["brand"] != '') {
	
$sqlmy010 = " SELECT `fabricbrand_".$id_user."` FROM admin_fabricbrand WHERE fabricbrand_name = '$fabrics_my_brand' AND fabricbrand_product = 'Jacket' ";
$querymy010 = mysql_db_query($dbname, $sqlmy010) or die("Can't Querymy010");
$rowmy010 = mysql_fetch_array($querymy010);	
$jacket_fabric_my_price_5 = $rowmy010["0"];
	
}

$sqlmy9 = " SELECT * FROM admin_fabrics_jacket WHERE fabricno = '$jacket_fabric_no_6' ";
$querymy9 = mysql_db_query($dbname, $sqlmy9) or die("Can't Querymy9");
$rowmy9 = mysql_fetch_array($querymy9);
$fabrics_my_type = $rowmy9["type"];
$fabrics_my_brand = $rowmy9["brand"];

if ($rowmy9["type"] != '') {

$sqlmy011 = " SELECT `fabrictypereseller_".$id_user."` FROM admin_fabrictype WHERE fabrictype_name = '$fabrics_my_type' AND fabrictype_product = 'Jacket' ";
$querymy011 = mysql_db_query($dbname, $sqlmy011) or die("Can't Querymy011");
$rowmy011 = mysql_fetch_array($querymy011);
$jacket_fabric_my_price_6 = $rowmy011["0"];

} else if ($rowmy9["brand"] != '') {
	
$sqlmy012 = " SELECT `fabricbrand_".$id_user."` FROM admin_fabricbrand WHERE fabricbrand_name = '$fabrics_my_brand' AND fabricbrand_product = 'Jacket' ";
$querymy012 = mysql_db_query($dbname, $sqlmy012) or die("Can't Querymy012");
$rowmy012 = mysql_fetch_array($querymy012);	
$jacket_fabric_my_price_6 = $rowmy012["0"];
	
}

/*OTHER PRICING PARAMETERS*/
$jacket_jacket_measurement_chest = $_POST["jacket_jacket_measurement_chest"];
$jacket_jacket_measurement_waist_only = $_POST["jacket_jacket_measurement_waist_only"];
$jacket_jacket_measurement_hips = $_POST["jacket_jacket_measurement_hips"];

if (($jacket_jacket_measurement_chest >= '50' && $jacket_jacket_measurement_chest <= '52') || ($jacket_jacket_measurement_waist_only >= '50' && $jacket_jacket_measurement_waist_only <= '52') || ($jacket_jacket_measurement_hips >= '50' && $jacket_jacket_measurement_hips <= '52')) {
	
	$price_my_size_1 = $jacket_fabric_my_price_1 * 20;
	$price_my_size_2 = $price_my_size_1 / 100;
	$price_my_size_3 = $price_my_size_2 + $jacket_fabric_my_price_1;
	
	$price_my_size_4 = $jacket_fabric_my_price_2 * 20;
	$price_my_size_5 = $price_my_size_4 / 100;
	$price_my_size_6 = $price_my_size_5 + $jacket_fabric_my_price_2;
	
	$price_my_size_7 = $jacket_fabric_my_price_3 * 20;
	$price_my_size_8 = $price_my_size_7 / 100;
	$price_my_size_9 = $price_size_8 + $jacket_fabric_my_price_3;
	
	$price_my_size_10 = $jacket_fabric_my_price_4 * 20;
	$price_my_size_11 = $price_my_size_10 / 100;
	$price_my_size_12 = $price_my_size_11 + $jacket_fabric_my_price_4;
	
	$price_my_size_13 = $jacket_fabric_my_price_5 * 20;
	$pric_mye_size_14 = $price_my_size_13 / 100;
	$price_my_size_15 = $price_my_size_14 + $jacket_fabric_my_price_5;
	
	$price_my_size_16 = $jacket_fabric_my_price_6 * 20;
	$price_my_size_17 = $price_my_size_16 / 100;
	$price_my_size_18 = $price_my_size_17 + $jacket_fabric_my_price_6;
	
} else if (($jacket_jacket_measurement_chest >= '52.5' && $jacket_jacket_measurement_chest <= '56') || ($jacket_jacket_measurement_waist_only >= '52.5' && $jacket_jacket_measurement_waist_only <= '56') || ($jacket_jacket_measurement_hips >= '52.5' && $jacket_jacket_measurement_hips <= '56')) {
	
	$price_my_size_1 = $jacket_fabric_my_price_1 * 30;
	$price_my_size_2 = $price_my_size_1 / 100;
	$price_my_size_3 = $price_my_size_2 + $jacket_fabric_my_price_1;
	
	$price_my_size_4 = $jacket_fabric_my_price_2 * 30;
	$price_my_size_5 = $price_my_size_4 / 100;
	$price_my_size_6 = $price_my_size_5 + $jacket_fabric_my_price_2;
	
	$price_my_size_7 = $jacket_fabric_my_price_3 * 30;
	$price_my_size_8 = $price_my_size_7 / 100;
	$price_my_size_9 = $price_my_size_8 + $jacket_fabric_my_price_3;
	
	$price_my_size_10 = $jacket_fabric_my_price_4 * 30;
	$price_my_size_11 = $price_my_size_10 / 100;
	$price_my_size_12 = $price_my_size_11 + $jacket_fabric_my_price_4;
	
	$price_my_size_13 = $jacket_fabric_my_price_5 * 30;
	$price_my_size_14 = $price_my_size_13 / 100;
	$price_my_size_15 = $price_my_size_14 + $jacket_fabric_my_price_5;
	
	$price_my_size_16 = $jacket_fabric_my_price_6 * 30;
	$price_my_size_17 = $price_my_size_16 / 100;
	$price_my_size_18 = $price_my_size_17 + $jacket_fabric_my_price_6;
	
} else if (($jacket_jacket_measurement_chest >= '56.5' && $jacket_jacket_measurement_chest <= '60') || ($jacket_jacket_measurement_waist_only >= '56.5' && $jacket_jacket_measurement_waist_only <= '60') || ($jacket_jacket_measurement_hips >= '56.5' && $jacket_jacket_measurement_hips <= '60')) {
	
	$price_my_size_1 = $jacket_fabric_my_price_1 * 40;
	$price_my_size_2 = $price_my_size_1 / 100;
	$price_my_size_3 = $price_my_size_2 + $jacket_fabric_my_price_1;
	
	$price_my_size_4 = $jacket_fabric_my_price_2 * 40;
	$price_my_size_5 = $price_my_size_4 / 100;
	$price_my_size_6 = $price_my_size_5 + $jacket_fabric_my_price_2;
	
	$price_my_size_7 = $jacket_fabric_my_price_3 * 40;
	$price_my_size_8 = $price_my_size_7 / 100;
	$price_my_size_9 = $price_my_size_8 + $jacket_fabric_my_price_3;
	
	$price_my_size_10 = $jacket_fabric_my_price_4 * 40;
	$price_my_size_11 = $price_my_size_10 / 100;
	$price_my_size_12 = $price_my_size_11 + $jacket_fabric_my_price_4;
	
	$price_my_size_13 = $jacket_fabric_my_price_5 * 40;
	$price_my_size_14 = $price_my_size_13 / 100;
	$price_my_size_15 = $price_my_size_14 + $jacket_fabric_my_price_5;
	
	$price_my_size_16 = $jacket_fabric_my_price_6 * 40;
	$price_my_size_17 = $price_my_size_16 / 100;
	$price_my_size_18 = $price_my_size_17 + $jacket_fabric_my_price_6;
	
} else if (($jacket_jacket_measurement_chest >= '60.5' && $jacket_jacket_measurement_chest <= '64') || ($jacket_jacket_measurement_waist_only >= '60.5' && $jacket_jacket_measurement_waist_only <= '64') || ($jacket_jacket_measurement_hips >= '60.5' && $jacket_jacket_measurement_hips <= '64')) {
	
	$price_my_size_1 = $jacket_fabric_my_price_1 * 50;
	$price_my_size_2 = $price_my_size_1 / 100;
	$price_my_size_3 = $price_my_size_2 + $jacket_fabric_my_price_1;
	
	$price_my_size_4 = $jacket_fabric_my_price_2 * 50;
	$price_my_size_5 = $price_my_size_4 / 100;
	$price_my_size_6 = $price_my_size_5 + $jacket_fabric_my_price_2;
	
	$price_my_size_7 = $jacket_fabric_my_price_3 * 50;
	$price_my_size_8 = $price_my_size_7 / 100;
	$price_my_size_9 = $price_my_size_8 + $jacket_fabric_my_price_3;
	
	$price_my_size_10 = $jacket_fabric_my_price_4 * 50;
	$price_my_size_11 = $price_my_size_10 / 100;
	$price_my_size_12 = $price_my_size_11 + $jacket_fabric_my_price_4;
	
	$price_my_size_13 = $jacket_fabric_my_price_5 * 50;
	$price_my_size_14 = $price_my_size_13 / 100;
	$price_my_size_15 = $price_my_size_14 + $jacket_fabric_my_price_5;
	
	$price_my_size_16 = $jacket_fabric_my_price_6 * 50;
	$price_my_size_17 = $price_my_size_16 / 100;
	$price_my_size_18 = $price_my_size_17 + $jacket_fabric_my_price_6;
	
} else if (($jacket_jacket_measurement_chest >= '64.5' && $jacket_jacket_measurement_chest <= '68') || ($jacket_jacket_measurement_waist_only >= '64.5' && $jacket_jacket_measurement_waist_only <= '68') || ($jacket_jacket_measurement_hips >= '64.5' && $jacket_jacket_measurement_hips <= '68')) {
	
	$price_my_size_1 = $jacket_fabric_my_price_1 * 60;
	$price_my_size_2 = $price_my_size_1 / 100;
	$price_my_size_3 = $price_my_size_2 + $jacket_fabric_my_price_1;
	
	$price_my_size_4 = $jacket_fabric_my_price_2 * 60;
	$price_my_size_5 = $price_my_size_4 / 100;
	$price_my_size_6 = $price_my_size_5 + $jacket_fabric_my_price_2;
	
	$price_my_size_7 = $jacket_fabric_my_price_3 * 60;
	$price_my_size_8 = $price_my_size_7 / 100;
	$price_my_size_9 = $price_my_size_8 + $jacket_fabric_my_price_3;
	
	$price_my_size_10 = $jacket_fabric_my_price_4 * 60;
	$price_my_size_11 = $price_my_size_10 / 100;
	$price_my_size_12 = $price_my_size_11 + $jacket_fabric_my_price_4;
	
	$price_my_size_13 = $jacket_fabric_my_price_5 * 60;
	$price_my_size_14 = $price_my_size_13 / 100;
	$price_my_size_15 = $price_my_size_14 + $jacket_fabric_my_price_5;
	
	$price_my_size_16 = $jacket_fabric_my_price_6 * 60;
	$price_my_size_17 = $price_my_size_16 / 100;
	$price_my_size_18 = $price_my_size_17 + $jacket_fabric_my_price_6;
	
}  else {
	
	$price_my_size_3 = $jacket_fabric_my_price_1;
	$price_my_size_6 = $jacket_fabric_my_price_2;
	$price_my_size_9 = $jacket_fabric_my_price_3;
	$price_my_size_12 = $jacket_fabric_my_price_4;
	$price_my_size_15 = $jacket_fabric_my_price_5;
	$price_my_size_18 = $jacket_fabric_my_price_6;
	
}

/*BUTTON*/
$jacket_jacket_button_number = $_POST["jacket_jacket_button_number"];

$sql10 = " SELECT price FROM admin_buttons_suits WHERE buttonno = '$jacket_jacket_button_number' ";
$query10 = mysql_db_query($dbname, $sql10) or die("Can't Query10");
$row10 = mysql_fetch_array($query10);
$jacket_button_my_price = $row10["price"];

$jacket_button_my_price_1 = $price_my_size_3 + $jacket_button_my_price;
$jacket_button_my_price_2 = $price_my_size_6 + $jacket_button_my_price;
$jacket_button_my_price_3 = $price_my_size_9 + $jacket_button_my_price;
$jacket_button_my_price_4 = $price_my_size_12 + $jacket_button_my_price;
$jacket_button_my_price_5 = $price_my_size_15 + $jacket_button_my_price;
$jacket_button_my_price_6 = $price_my_size_18 + $jacket_button_my_price;

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

$jacket_my_price_1 = $jacket_button_my_price_1 + $jacket_embroidery_collar_initial_or_name_my_price + $jacket_brand_my_price + $jacket_pick_stitch_sleeves_my_price + $jacket_pick_stitch_vest_my_price + $jacket_elbow_patch_my_price + $jacket_canva_mys_price;

$jacket_my_price_2 = $jacket_button_my_price_2 + $jacket_embroidery_collar_initial_or_name_my_price + $jacket_brand_my_price + $jacket_pick_stitch_sleeves_my_price + $jacket_pick_stitch_vest_my_price + $jacket_elbow_patch_my_price + $jacket_canvas_my_price;

$jacket_my_price_3 = $jacket_button_my_price_3 + $jacket_embroidery_collar_initial_or_name_my_price + $jacket_brand_my_price + $jacket_pick_stitch_sleeves_my_price + $jacket_pick_stitch_vest_my_price + $jacket_elbow_patch_my_price + $jacket_canvas_my_price;

$jacket_my_price_4 = $jacket_button_my_price_4 + $jacket_embroidery_collar_initial_or_name_my_price + $jacket_brand_my_price + $jacket_pick_stitch_sleeves_my_price + $jacket_pick_stitch_vest_my_price + $jacket_elbow_patch_my_price + $jacket_canvas_my_price;

$jacket_my_price_5 = $jacket_button_my_price_5 + $jacket_embroidery_collar_initial_or_name_my_price + $jacket_brand_my_price + $jacket_pick_stitch_sleeves_price + $jacket_pick_stitch_vest_price + $jacket_elbow_patch_price + $jacket_canvas_price;

$jacket_my_price_6 = $jacket_button_my_price_6 + $jacket_embroidery_collar_initial_or_name_my_price + $jacket_brand_my_price + $jacket_pick_stitch_sleeves_my_price + $jacket_pick_stitch_vest_my_price + $jacket_elbow_patch_my_price + $jacket_canvas_my_price;

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

/*FABRIC 1*/
if ($jacket_fabric_no_1 != "" && $jacket_lining_no_1 != "") {

$sql11 = " SELECT MAX(id) FROM customize_order ";
$query11 = mysql_db_query($dbname, $sql11) or die("Can't Query11");
$row11 = mysql_fetch_array($query11);
$id_order = $row11[0] + 1 ;

$sql12 = " SELECT MAX(product_id) FROM customize_order ";
$query12 = mysql_db_query($dbname, $sql12) or die("Can't Query12");
$row12 = mysql_fetch_array($query12);
$product_id = $row12[0] + 1 ;

$sql13 = " SELECT MAX(id) FROM customize_jacket_design ";
$query13 = mysql_db_query($dbname, $sql13) or die("Can't Query13");
$row13 = mysql_fetch_array($query13);
$id_jacket = $row13[0] + 1 ;

$sql14 = " INSERT INTO customize_order (id, order_id, product_id, order_reseller, order_order_no, order_name_customize, order_my_price, order_price, order_product, order_fabric_no, order_date, order_time, order_ip, order_status) VALUES ('$id_order', '$order_id', '$product_id', '$company_user', '$jacket_order_no', '$jacket_customer_name', '$jacket_my_price_1', '$jacket_price_1', '$order_product', '$jacket_fabric_no_1', '$jacket_date', '$jacket_time', '$jacket_ip', '$jacket_status') ";
$query14 = mysql_query($sql14) or die("Can't Query14");

$sql15 = " INSERT INTO customize_jacket_design (id, order_id, product_id, jacket_customer_name, jacket_order_no, jacket_order_date, jacket_delivery_date, jacket_fabric_no, jacket_lining_no, jacket_jacket_style, jacket_lapel_style, jacket_lapel_width, jacket_lapel_color, jacket_real_lapel_boutonniere, jacket_vent_style, jacket_pocket_style, jacket_chest_pocket, jacket_shoulder_construction, jacket_sleeve_button, jacket_cuff, jacket_all_sleevebutton_holes_color, jacket_contrast_last_sleevebutton_holes_color, jacket_contrast_last_sleevebutton_holes_button, jacket_lining_style, jacket_canvas, jacket_jacket_button_number, jacket_jacket_thread_on_button, jacket_jacket_button_hole_color, jacket_pick_stitch, jacket_pick_stitch_lapel_color, jacket_pick_stitch_pocket_color, jacket_pick_stitch_sleeves, jacket_pick_stitch_vest, jacket_embroidery_inside_initial_or_name, jacket_embroidery_inside_color, jacket_embroidery_inside_design, jacket_embroidery_collar_initial_or_name, jacket_embroidery_collar_color, jacket_embroidery_collar_design, jacket_brand, jacket_elbow_patch, jacket_collar_felt_color, jacket_date, jacket_time, jacket_ip, jacket_status) VALUES ('$id_jacket', '$order_id', '$product_id', '$jacket_customer_name', '$jacket_order_no', '$jacket_order_date', '$jacket_delivery_date', '$jacket_fabric_no_1', '$jacket_lining_no_1', '$jacket_jacket_style', '$jacket_lapel_style', '$jacket_lapel_width', '$jacket_lapel_color', '$jacket_real_lapel_boutonniere', '$jacket_vent_style', '$jacket_pocket_style', '$jacket_chest_pocket', '$jacket_shoulder_construction', '$jacket_sleeve_button', '$jacket_cuff', '$jacket_all_sleevebutton_holes_color', '$jacket_contrast_last_sleevebutton_holes_color', '$jacket_contrast_last_sleevebutton_holes_button', '$jacket_lining_style', '$jacket_canvas', '$jacket_jacket_button_number', '$jacket_jacket_thread_on_button', '$jacket_jacket_button_hole_color', '$jacket_pick_stitch', '$jacket_pick_stitch_lapel_color', '$jacket_pick_stitch_pocket_color', '$jacket_pick_stitch_sleeves', '$jacket_pick_stitch_vest', '$jacket_embroidery_inside_initial_or_name', '$jacket_embroidery_inside_color', '$jacket_embroidery_inside_design', '$jacket_embroidery_collar_initial_or_name', '$jacket_embroidery_collar_color', '$jacket_embroidery_collar_design', '$jacket_brand', '$jacket_elbow_patch', '$jacket_collar_felt_color', '$jacket_date', '$jacket_time', '$jacket_ip', '$jacket_status') ";
$query15 = mysql_query($sql15) or die("Can't Query15");

$sql16 = " INSERT INTO customize_jacket_measurements (id, order_id, product_id, jacket_jacket_measurement_sex, jacket_jacket_measurement_fit, jacket_jacket_measurement, jacket_jacket_measurement_jacket_length, jacket_jacket_measurement_back_lenght, jacket_jacket_measurement_chest, jacket_jacket_measurement_waist_only, jacket_jacket_measurement_hips, jacket_jacket_measurement_shoulders, jacket_jacket_measurement_neck, jacket_jacket_measurement_ptp_front, jacket_jacket_measurement_ptp_back, jacket_jacket_measurement_arm_hole, jacket_jacket_measurement_biceps, jacket_jacket_measurement_sleeves_right, jacket_jacket_measurement_sleeves_left, jacket_jacket_measurement_wrist_right, jacket_jacket_measurement_wrist_left, jacket_jacket_measurement_first_button, jacket_jacket_measurement_shoulder_upper_wrist, jacket_jacket_measurement_shoulder_lower_wrist, jacket_measurement_jacket_shoulder, jacket_measurement_jacket_waist, jacket_measurement_jacket_chest, jacket_remark, jacket_date, jacket_time, jacket_ip, jacket_status) VALUES ('$id_jacket', '$order_id', '$product_id', '$jacket_jacket_measurement_sex', '$jacket_jacket_measurement_fit', '$jacket_jacket_measurement', '$jacket_jacket_measurement_jacket_length', '$jacket_jacket_measurement_back_lenght', '$jacket_jacket_measurement_chest', '$jacket_jacket_measurement_waist_only', '$jacket_jacket_measurement_hips', '$jacket_jacket_measurement_shoulders', '$jacket_jacket_measurement_neck', '$jacket_jacket_measurement_ptp_front', '$jacket_jacket_measurement_ptp_back', '$jacket_jacket_measurement_arm_hole', '$jacket_jacket_measurement_biceps', '$jacket_jacket_measurement_sleeves_right', '$jacket_jacket_measurement_sleeves_left', '$jacket_jacket_measurement_wrist_right', '$jacket_jacket_measurement_wrist_left', '$jacket_jacket_measurement_first_button', '$jacket_jacket_measurement_shoulder_upper_wrist', '$jacket_jacket_measurement_shoulder_lower_wrist', '$jacket_measurement_jacket_shoulder', '$jacket_measurement_jacket_waist', '$jacket_measurement_jacket_chest', '$jacket_remark', '$jacket_date', '$jacket_time', '$jacket_ip', '$jacket_status') ";
$query16 = mysql_query($sql16) or die("Can't Query16");

$path = "../../images/body/jacket/front/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['jacket_body_front']['name'];
	$tmp = $_FILES['jacket_body_front']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$jacket_body_front_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$jacket_body_front_pic)){
				
				$sql17 = " UPDATE customize_jacket_measurements SET jacket_body_front = '".$jacket_body_front_pic."', jacket_date = '".$jacket_date."', jacket_time = '".$jacket_time."', jacket_ip = '".$jacket_ip."', jacket_status = '".$jacket_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query17 = mysql_db_query($dbname, $sql17) or die("Can't Query17");
			}
    
	} else {
				$sql17 = " UPDATE customize_jacket_measurements SET jacket_date = '".$jacket_date."', jacket_time = '".$jacket_time."', jacket_ip = '".$jacket_ip."', jacket_status = '".$jacket_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query17 = mysql_db_query($dbname, $sql17) or die("Can't Query17");
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
				
				$sql18 = " UPDATE customize_jacket_measurements SET jacket_body_left = '".$jacket_body_left_pic."', jacket_date = '".$jacket_date."', jacket_time = '".$jacket_time."', jacket_ip = '".$jacket_ip."', jacket_status = '".$jacket_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query18 = mysql_db_query($dbname, $sql18) or die("Can't Query18");
			}
    
	} else {
				$sql18 = " UPDATE customize_jacket_measurements SET jacket_date = '".$jacket_date."', jacket_time = '".$jacket_time."', jacket_ip = '".$jacket_ip."', jacket_status = '".$jacket_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query18 = mysql_db_query($dbname, $sql18) or die("Can't Query18");
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
				
				$sql19 = " UPDATE customize_jacket_measurements SET jacket_body_right = '".$jacket_body_right_pic."', jacket_date = '".$jacket_date."', jacket_time = '".$jacket_time."', jacket_ip = '".$jacket_ip."', jacket_status = '".$jacket_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query19 = mysql_db_query($dbname, $sql19) or die("Can't Query19");
			}
    
	} else {
				$sql19 = " UPDATE customize_jacket_measurements SET jacket_date = '".$jacket_date."', jacket_time = '".$jacket_time."', jacket_ip = '".$jacket_ip."', jacket_status = '".$jacket_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query19 = mysql_db_query($dbname, $sql19) or die("Can't Query19");
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
				
				$sql20 = " UPDATE customize_jacket_measurements SET jacket_body_back = '".$jacket_body_back_pic."', jacket_date = '".$jacket_date."', jacket_time = '".$jacket_time."', jacket_ip = '".$jacket_ip."', jacket_status = '".$jacket_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query20 = mysql_db_query($dbname, $sql20) or die("Can't Query20");
			}
    
	} else {
				$sql20 = " UPDATE customize_jacket_measurements SET jacket_date = '".$jacket_date."', jacket_time = '".$jacket_time."', jacket_ip = '".$jacket_ip."', jacket_status = '".$jacket_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query20 = mysql_db_query($dbname, $sql20) or die("Can't Query20");
			}
	}

} else if ($jacket_fabric_no_1 == "" || $jacket_lining_no_1 == "") { }

/*FABRIC 2*/
if ($jacket_fabric_no_2 != "" && $jacket_lining_no_2 != "") {

$sql11 = " SELECT MAX(id) FROM customize_order ";
$query11 = mysql_db_query($dbname, $sql11) or die("Can't Query11");
$row11 = mysql_fetch_array($query11);
$id_order = $row11[0] + 1 ;

$sql12 =	" SELECT MAX(product_id) FROM customize_order";
$query12 = mysql_db_query($dbname, $sql12) or die("Can't Query12");
$row12 = mysql_fetch_array($query12);
$product_id = $row12[0] + 1 ;

$sql13 =	" SELECT MAX(id) FROM customize_jacket_design ";
$query13 = mysql_db_query($dbname, $sql13) or die("Can't Query13");
$row13 = mysql_fetch_array($query13);
$id_jacket = $row13[0] + 1 ;

$sql14 = " INSERT INTO customize_order (id, order_id, product_id, order_reseller, order_order_no, order_name_customize, order_my_price, order_price, order_product, order_fabric_no, order_date, order_time, order_ip, order_status) VALUES ('$id_order', '$order_id', '$product_id', '$company_user', '$jacket_order_no', '$jacket_customer_name', '$jacket_my_price_2', '$jacket_price_2', '$order_product', '$jacket_fabric_no_2', '$jacket_date', '$jacket_time', '$jacket_ip', '$jacket_status') ";
$query14 = mysql_query($sql14) or die("Can't Query14");

$sql15 = " INSERT INTO customize_jacket_design (id, order_id, product_id, jacket_customer_name, jacket_order_no, jacket_order_date, jacket_delivery_date, jacket_fabric_no, jacket_lining_no, jacket_jacket_style, jacket_lapel_style, jacket_lapel_width, jacket_lapel_color, jacket_real_lapel_boutonniere, jacket_vent_style, jacket_pocket_style, jacket_chest_pocket, jacket_shoulder_construction, jacket_sleeve_button, jacket_cuff, jacket_all_sleevebutton_holes_color, jacket_contrast_last_sleevebutton_holes_color, jacket_contrast_last_sleevebutton_holes_button, jacket_lining_style, jacket_canvas, jacket_jacket_button_number, jacket_jacket_thread_on_button, jacket_jacket_button_hole_color, jacket_pick_stitch, jacket_pick_stitch_lapel_color, jacket_pick_stitch_pocket_color, jacket_pick_stitch_sleeves, jacket_pick_stitch_vest, jacket_embroidery_inside_initial_or_name, jacket_embroidery_inside_color, jacket_embroidery_inside_design, jacket_embroidery_collar_initial_or_name, jacket_embroidery_collar_color, jacket_embroidery_collar_design, jacket_brand, jacket_elbow_patch, jacket_collar_felt_color, jacket_date, jacket_time, jacket_ip, jacket_status) VALUES ('$id_jacket', '$order_id', '$product_id', '$jacket_customer_name', '$jacket_order_no', '$jacket_order_date', '$jacket_delivery_date', '$jacket_fabric_no_2', '$jacket_lining_no_2', '$jacket_jacket_style', '$jacket_lapel_style', '$jacket_lapel_width', '$jacket_lapel_color', '$jacket_real_lapel_boutonniere', '$jacket_vent_style', '$jacket_pocket_style', '$jacket_chest_pocket', '$jacket_shoulder_construction', '$jacket_sleeve_button', '$jacket_cuff', '$jacket_all_sleevebutton_holes_color', '$jacket_contrast_last_sleevebutton_holes_color', '$jacket_contrast_last_sleevebutton_holes_button', '$jacket_lining_style', '$jacket_canvas', '$jacket_jacket_button_number', '$jacket_jacket_thread_on_button', '$jacket_jacket_button_hole_color', '$jacket_pick_stitch', '$jacket_pick_stitch_lapel_color', '$jacket_pick_stitch_pocket_color', '$jacket_pick_stitch_sleeves', '$jacket_pick_stitch_vest', '$jacket_embroidery_inside_initial_or_name', '$jacket_embroidery_inside_color', '$jacket_embroidery_inside_design', '$jacket_embroidery_collar_initial_or_name', '$jacket_embroidery_collar_color', '$jacket_embroidery_collar_design', '$jacket_brand', '$jacket_elbow_patch', '$jacket_collar_felt_color', '$jacket_date', '$jacket_time', '$jacket_ip', '$jacket_status') ";
$query15 = mysql_query($sql15) or die("Can't Query15");

$sql16 = " INSERT INTO customize_jacket_measurements (id, order_id, product_id, jacket_jacket_measurement_sex, jacket_jacket_measurement_fit, jacket_jacket_measurement, jacket_jacket_measurement_jacket_length, jacket_jacket_measurement_back_lenght, jacket_jacket_measurement_chest, jacket_jacket_measurement_waist_only, jacket_jacket_measurement_hips, jacket_jacket_measurement_shoulders, jacket_jacket_measurement_neck, jacket_jacket_measurement_ptp_front, jacket_jacket_measurement_ptp_back, jacket_jacket_measurement_arm_hole, jacket_jacket_measurement_biceps, jacket_jacket_measurement_sleeves_right, jacket_jacket_measurement_sleeves_left, jacket_jacket_measurement_wrist_right, jacket_jacket_measurement_wrist_left, jacket_jacket_measurement_first_button, jacket_jacket_measurement_shoulder_upper_wrist, jacket_jacket_measurement_shoulder_lower_wrist, jacket_measurement_jacket_shoulder, jacket_measurement_jacket_waist, jacket_measurement_jacket_chest, jacket_remark, jacket_date, jacket_time, jacket_ip, jacket_status) VALUES ('$id_jacket', '$order_id', '$product_id', '$jacket_jacket_measurement_sex', '$jacket_jacket_measurement_fit', '$jacket_jacket_measurement', '$jacket_jacket_measurement_jacket_length', '$jacket_jacket_measurement_back_lenght', '$jacket_jacket_measurement_chest', '$jacket_jacket_measurement_waist_only', '$jacket_jacket_measurement_hips', '$jacket_jacket_measurement_shoulders', '$jacket_jacket_measurement_neck', '$jacket_jacket_measurement_ptp_front', '$jacket_jacket_measurement_ptp_back', '$jacket_jacket_measurement_arm_hole', '$jacket_jacket_measurement_biceps', '$jacket_jacket_measurement_sleeves_right', '$jacket_jacket_measurement_sleeves_left', '$jacket_jacket_measurement_wrist_right', '$jacket_jacket_measurement_wrist_left', '$jacket_jacket_measurement_first_button', '$jacket_jacket_measurement_shoulder_upper_wrist', '$jacket_jacket_measurement_shoulder_lower_wrist', '$jacket_measurement_jacket_shoulder', '$jacket_measurement_jacket_waist', '$jacket_measurement_jacket_chest', '$jacket_remark', '$jacket_date', '$jacket_time', '$jacket_ip', '$jacket_status') ";
$query16 = mysql_query($sql16) or die("Can't Query16");

$path = "../../images/body/jacket/front/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['jacket_body_front']['name'];
	$tmp = $_FILES['jacket_body_front']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$jacket_body_front_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$jacket_body_front_pic)){
				
				$sql17 = " UPDATE customize_jacket_measurements SET jacket_body_front = '".$jacket_body_front_pic."', jacket_date = '".$jacket_date."', jacket_time = '".$jacket_time."', jacket_ip = '".$jacket_ip."', jacket_status = '".$jacket_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query17 = mysql_db_query($dbname, $sql17) or die("Can't Query17");
			}
    
	} else {
				$sql17 = " UPDATE customize_jacket_measurements SET jacket_date = '".$jacket_date."', jacket_time = '".$jacket_time."', jacket_ip = '".$jacket_ip."', jacket_status = '".$jacket_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query17 = mysql_db_query($dbname, $sql17) or die("Can't Query17");
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
				
				$sql18 = " UPDATE customize_jacket_measurements SET jacket_body_left = '".$jacket_body_left_pic."', jacket_date = '".$jacket_date."', jacket_time = '".$jacket_time."', jacket_ip = '".$jacket_ip."', jacket_status = '".$jacket_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query18 = mysql_db_query($dbname, $sql18) or die("Can't Query18");
			}
    
	} else {
				$sql18 = " UPDATE customize_jacket_measurements SET jacket_date = '".$jacket_date."', jacket_time = '".$jacket_time."', jacket_ip = '".$jacket_ip."', jacket_status = '".$jacket_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query18 = mysql_db_query($dbname, $sql18) or die("Can't Query18");
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
				
				$sql19 = " UPDATE customize_jacket_measurements SET jacket_body_right = '".$jacket_body_right_pic."', jacket_date = '".$jacket_date."', jacket_time = '".$jacket_time."', jacket_ip = '".$jacket_ip."', jacket_status = '".$jacket_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query19 = mysql_db_query($dbname, $sql19) or die("Can't Query19");
			}
    
	} else {
				$sql19 = " UPDATE customize_jacket_measurements SET jacket_date = '".$jacket_date."', jacket_time = '".$jacket_time."', jacket_ip = '".$jacket_ip."', jacket_status = '".$jacket_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query19 = mysql_db_query($dbname, $sql19) or die("Can't Query19");
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
				
				$sql20 = " UPDATE customize_jacket_measurements SET jacket_body_back = '".$jacket_body_back_pic."', jacket_date = '".$jacket_date."', jacket_time = '".$jacket_time."', jacket_ip = '".$jacket_ip."', jacket_status = '".$jacket_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query20 = mysql_db_query($dbname, $sql20) or die("Can't Query20");
			}
    
	} else {
				$sql20 = " UPDATE customize_jacket_measurements SET jacket_date = '".$jacket_date."', jacket_time = '".$jacket_time."', jacket_ip = '".$jacket_ip."', jacket_status = '".$jacket_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query20 = mysql_db_query($dbname, $sql20) or die("Can't Query20");
			}
	}

} else if ($jacket_fabric_no_2 == "" || $jacket_lining_no_2 == "") { }	

/*FABRIC 3*/
if ($jacket_fabric_no_3 != "" && $jacket_lining_no_3 != "") {

$sql11 = " SELECT MAX(id) FROM customize_order ";
$query11 = mysql_db_query($dbname, $sql11) or die("Can't Query11");
$row11 = mysql_fetch_array($query11);
$id_order = $row11[0] + 1 ;

$sql12 =	" SELECT MAX(product_id) FROM customize_order";
$query12 = mysql_db_query($dbname, $sql12) or die("Can't Query12");
$row12 = mysql_fetch_array($query12);
$product_id = $row12[0] + 1 ;

$sql13 =	" SELECT MAX(id) FROM customize_jacket_design ";
$query13 = mysql_db_query($dbname, $sql13) or die("Can't Query13");
$row13 = mysql_fetch_array($query13);
$id_jacket = $row13[0] + 1 ;

$sql14 = " INSERT INTO customize_order (id, order_id, product_id, order_reseller, order_order_no, order_name_customize, order_my_price, order_price, order_product, order_fabric_no, order_date, order_time, order_ip, order_status) VALUES ('$id_order', '$order_id', '$product_id', '$company_user', '$jacket_order_no', '$jacket_customer_name', '$jacket_my_price_3', '$jacket_price_3', '$order_product', '$jacket_fabric_no_3', '$jacket_date', '$jacket_time', '$jacket_ip', '$jacket_status') ";
$query14 = mysql_query($sql14) or die("Can't Query14");

$sql15 = " INSERT INTO customize_jacket_design (id, order_id, product_id, jacket_customer_name, jacket_order_no, jacket_order_date, jacket_delivery_date, jacket_fabric_no, jacket_lining_no, jacket_jacket_style, jacket_lapel_style, jacket_lapel_width, jacket_lapel_color, jacket_real_lapel_boutonniere, jacket_vent_style, jacket_pocket_style, jacket_chest_pocket, jacket_shoulder_construction, jacket_sleeve_button, jacket_cuff, jacket_all_sleevebutton_holes_color, jacket_contrast_last_sleevebutton_holes_color, jacket_contrast_last_sleevebutton_holes_button, jacket_lining_style, jacket_canvas, jacket_jacket_button_number, jacket_jacket_thread_on_button, jacket_jacket_button_hole_color, jacket_pick_stitch, jacket_pick_stitch_lapel_color, jacket_pick_stitch_pocket_color, jacket_pick_stitch_sleeves, jacket_pick_stitch_vest, jacket_embroidery_inside_initial_or_name, jacket_embroidery_inside_color, jacket_embroidery_inside_design, jacket_embroidery_collar_initial_or_name, jacket_embroidery_collar_color, jacket_embroidery_collar_design, jacket_brand, jacket_elbow_patch, jacket_collar_felt_color, jacket_date, jacket_time, jacket_ip, jacket_status) VALUES ('$id_jacket', '$order_id', '$product_id', '$jacket_customer_name', '$jacket_order_no', '$jacket_order_date', '$jacket_delivery_date', '$jacket_fabric_no_3', '$jacket_lining_no_3', '$jacket_jacket_style', '$jacket_lapel_style', '$jacket_lapel_width', '$jacket_lapel_color', '$jacket_real_lapel_boutonniere', '$jacket_vent_style', '$jacket_pocket_style', '$jacket_chest_pocket', '$jacket_shoulder_construction', '$jacket_sleeve_button', '$jacket_cuff', '$jacket_all_sleevebutton_holes_color', '$jacket_contrast_last_sleevebutton_holes_color', '$jacket_contrast_last_sleevebutton_holes_button', '$jacket_lining_style', '$jacket_canvas', '$jacket_jacket_button_number', '$jacket_jacket_thread_on_button', '$jacket_jacket_button_hole_color', '$jacket_pick_stitch', '$jacket_pick_stitch_lapel_color', '$jacket_pick_stitch_pocket_color', '$jacket_pick_stitch_sleeves', '$jacket_pick_stitch_vest', '$jacket_embroidery_inside_initial_or_name', '$jacket_embroidery_inside_color', '$jacket_embroidery_inside_design', '$jacket_embroidery_collar_initial_or_name', '$jacket_embroidery_collar_color', '$jacket_embroidery_collar_design', '$jacket_brand', '$jacket_elbow_patch', '$jacket_collar_felt_color', '$jacket_date', '$jacket_time', '$jacket_ip', '$jacket_status') ";
$query15 = mysql_query($sql15) or die("Can't Query15");

$sql16 = " INSERT INTO customize_jacket_measurements (id, order_id, product_id, jacket_jacket_measurement_sex, jacket_jacket_measurement_fit, jacket_jacket_measurement, jacket_jacket_measurement_jacket_length, jacket_jacket_measurement_back_lenght, jacket_jacket_measurement_chest, jacket_jacket_measurement_waist_only, jacket_jacket_measurement_hips, jacket_jacket_measurement_shoulders, jacket_jacket_measurement_neck, jacket_jacket_measurement_ptp_front, jacket_jacket_measurement_ptp_back, jacket_jacket_measurement_arm_hole, jacket_jacket_measurement_biceps, jacket_jacket_measurement_sleeves_right, jacket_jacket_measurement_sleeves_left, jacket_jacket_measurement_wrist_right, jacket_jacket_measurement_wrist_left, jacket_jacket_measurement_first_button, jacket_jacket_measurement_shoulder_upper_wrist, jacket_jacket_measurement_shoulder_lower_wrist, jacket_measurement_jacket_shoulder, jacket_measurement_jacket_waist, jacket_measurement_jacket_chest, jacket_remark, jacket_date, jacket_time, jacket_ip, jacket_status) VALUES ('$id_jacket', '$order_id', '$product_id', '$jacket_jacket_measurement_sex', '$jacket_jacket_measurement_fit', '$jacket_jacket_measurement', '$jacket_jacket_measurement_jacket_length', '$jacket_jacket_measurement_back_lenght', '$jacket_jacket_measurement_chest', '$jacket_jacket_measurement_waist_only', '$jacket_jacket_measurement_hips', '$jacket_jacket_measurement_shoulders', '$jacket_jacket_measurement_neck', '$jacket_jacket_measurement_ptp_front', '$jacket_jacket_measurement_ptp_back', '$jacket_jacket_measurement_arm_hole', '$jacket_jacket_measurement_biceps', '$jacket_jacket_measurement_sleeves_right', '$jacket_jacket_measurement_sleeves_left', '$jacket_jacket_measurement_wrist_right', '$jacket_jacket_measurement_wrist_left', '$jacket_jacket_measurement_first_button', '$jacket_jacket_measurement_shoulder_upper_wrist', '$jacket_jacket_measurement_shoulder_lower_wrist', '$jacket_measurement_jacket_shoulder', '$jacket_measurement_jacket_waist', '$jacket_measurement_jacket_chest', '$jacket_remark', '$jacket_date', '$jacket_time', '$jacket_ip', '$jacket_status') ";
$query16 = mysql_query($sql16) or die("Can't Query16");

$path = "../../images/body/jacket/front/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['jacket_body_front']['name'];
	$tmp = $_FILES['jacket_body_front']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$jacket_body_front_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$jacket_body_front_pic)){
				
				$sql17 = " UPDATE customize_jacket_measurements SET jacket_body_front = '".$jacket_body_front_pic."', jacket_date = '".$jacket_date."', jacket_time = '".$jacket_time."', jacket_ip = '".$jacket_ip."', jacket_status = '".$jacket_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query17 = mysql_db_query($dbname, $sql17) or die("Can't Query17");
			}
    
	} else {
				$sql17 = " UPDATE customize_jacket_measurements SET jacket_date = '".$jacket_date."', jacket_time = '".$jacket_time."', jacket_ip = '".$jacket_ip."', jacket_status = '".$jacket_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query17 = mysql_db_query($dbname, $sql17) or die("Can't Query17");
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
				
				$sql18 = " UPDATE customize_jacket_measurements SET jacket_body_left = '".$jacket_body_left_pic."', jacket_date = '".$jacket_date."', jacket_time = '".$jacket_time."', jacket_ip = '".$jacket_ip."', jacket_status = '".$jacket_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query18 = mysql_db_query($dbname, $sql18) or die("Can't Query18");
			}
    
	} else {
				$sql18 = " UPDATE customize_jacket_measurements SET jacket_date = '".$jacket_date."', jacket_time = '".$jacket_time."', jacket_ip = '".$jacket_ip."', jacket_status = '".$jacket_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query18 = mysql_db_query($dbname, $sql18) or die("Can't Query18");
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
				
				$sql19 = " UPDATE customize_jacket_measurements SET jacket_body_right = '".$jacket_body_right_pic."', jacket_date = '".$jacket_date."', jacket_time = '".$jacket_time."', jacket_ip = '".$jacket_ip."', jacket_status = '".$jacket_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query19 = mysql_db_query($dbname, $sql19) or die("Can't Query19");
			}
    
	} else {
				$sql19 = " UPDATE customize_jacket_measurements SET jacket_date = '".$jacket_date."', jacket_time = '".$jacket_time."', jacket_ip = '".$jacket_ip."', jacket_status = '".$jacket_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query19 = mysql_db_query($dbname, $sql19) or die("Can't Query19");
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
				
				$sql20 = " UPDATE customize_jacket_measurements SET jacket_body_back = '".$jacket_body_back_pic."', jacket_date = '".$jacket_date."', jacket_time = '".$jacket_time."', jacket_ip = '".$jacket_ip."', jacket_status = '".$jacket_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query20 = mysql_db_query($dbname, $sql20) or die("Can't Query20");
			}
    
	} else {
				$sql20 = " UPDATE customize_jacket_measurements SET jacket_date = '".$jacket_date."', jacket_time = '".$jacket_time."', jacket_ip = '".$jacket_ip."', jacket_status = '".$jacket_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query20 = mysql_db_query($dbname, $sql20) or die("Can't Query20");
			}
	}

} else if ($jacket_fabric_no_3 == "" || $jacket_lining_no_3 == "") { }

/*FABRIC 4*/
if ($jacket_fabric_no_4 != "" && $jacket_lining_no_4 != "") {

$sql11 = " SELECT MAX(id) FROM customize_order ";
$query11 = mysql_db_query($dbname, $sql11) or die("Can't Query11");
$row11 = mysql_fetch_array($query11);
$id_order = $row11[0] + 1 ;

$sql12 =	" SELECT MAX(product_id) FROM customize_order";
$query12 = mysql_db_query($dbname, $sql12) or die("Can't Query12");
$row12 = mysql_fetch_array($query12);
$product_id = $row12[0] + 1 ;

$sql13 =	" SELECT MAX(id) FROM customize_jacket_design ";
$query13 = mysql_db_query($dbname, $sql13) or die("Can't Query13");
$row13 = mysql_fetch_array($query13);
$id_jacket = $row13[0] + 1 ;

$sql14 = " INSERT INTO customize_order (id, order_id, product_id, order_reseller, order_order_no, order_name_customize, order_my_price, order_price, order_product, order_fabric_no, order_date, order_time, order_ip, order_status) VALUES ('$id_order', '$order_id', '$product_id', '$company_user', '$jacket_order_no', '$jacket_customer_name', '$jacket_my_price_4', '$jacket_price_4', '$order_product', '$jacket_fabric_no_4', '$jacket_date', '$jacket_time', '$jacket_ip', '$jacket_status') ";
$query14 = mysql_query($sql14) or die("Can't Query14");

$sql15 = " INSERT INTO customize_jacket_design (id, order_id, product_id, jacket_customer_name, jacket_order_no, jacket_order_date, jacket_delivery_date, jacket_fabric_no, jacket_lining_no, jacket_jacket_style, jacket_lapel_style, jacket_lapel_width, jacket_lapel_color, jacket_real_lapel_boutonniere, jacket_vent_style, jacket_pocket_style, jacket_chest_pocket, jacket_shoulder_construction, jacket_sleeve_button, jacket_cuff, jacket_all_sleevebutton_holes_color, jacket_contrast_last_sleevebutton_holes_color, jacket_contrast_last_sleevebutton_holes_button, jacket_lining_style, jacket_canvas, jacket_jacket_button_number, jacket_jacket_thread_on_button, jacket_jacket_button_hole_color, jacket_pick_stitch, jacket_pick_stitch_lapel_color, jacket_pick_stitch_pocket_color, jacket_pick_stitch_sleeves, jacket_pick_stitch_vest, jacket_embroidery_inside_initial_or_name, jacket_embroidery_inside_color, jacket_embroidery_inside_design, jacket_embroidery_collar_initial_or_name, jacket_embroidery_collar_color, jacket_embroidery_collar_design, jacket_brand, jacket_elbow_patch, jacket_collar_felt_color, jacket_date, jacket_time, jacket_ip, jacket_status) VALUES ('$id_jacket', '$order_id', '$product_id', '$jacket_customer_name', '$jacket_order_no', '$jacket_order_date', '$jacket_delivery_date', '$jacket_fabric_no_4', '$jacket_lining_no_4', '$jacket_jacket_style', '$jacket_lapel_style', '$jacket_lapel_width', '$jacket_lapel_color', '$jacket_real_lapel_boutonniere', '$jacket_vent_style', '$jacket_pocket_style', '$jacket_chest_pocket', '$jacket_shoulder_construction', '$jacket_sleeve_button', '$jacket_cuff', '$jacket_all_sleevebutton_holes_color', '$jacket_contrast_last_sleevebutton_holes_color', '$jacket_contrast_last_sleevebutton_holes_button', '$jacket_lining_style', '$jacket_canvas', '$jacket_jacket_button_number', '$jacket_jacket_thread_on_button', '$jacket_jacket_button_hole_color', '$jacket_pick_stitch', '$jacket_pick_stitch_lapel_color', '$jacket_pick_stitch_pocket_color', '$jacket_pick_stitch_sleeves', '$jacket_pick_stitch_vest', '$jacket_embroidery_inside_initial_or_name', '$jacket_embroidery_inside_color', '$jacket_embroidery_inside_design', '$jacket_embroidery_collar_initial_or_name', '$jacket_embroidery_collar_color', '$jacket_embroidery_collar_design', '$jacket_brand', '$jacket_elbow_patch', '$jacket_collar_felt_color', '$jacket_date', '$jacket_time', '$jacket_ip', '$jacket_status') ";
$query15 = mysql_query($sql15) or die("Can't Query15");

$sql16 = " INSERT INTO customize_jacket_measurements (id, order_id, product_id, jacket_jacket_measurement_sex, jacket_jacket_measurement_fit, jacket_jacket_measurement, jacket_jacket_measurement_jacket_length, jacket_jacket_measurement_back_lenght, jacket_jacket_measurement_chest, jacket_jacket_measurement_waist_only, jacket_jacket_measurement_hips, jacket_jacket_measurement_shoulders, jacket_jacket_measurement_neck, jacket_jacket_measurement_ptp_front, jacket_jacket_measurement_ptp_back, jacket_jacket_measurement_arm_hole, jacket_jacket_measurement_biceps, jacket_jacket_measurement_sleeves_right, jacket_jacket_measurement_sleeves_left, jacket_jacket_measurement_wrist_right, jacket_jacket_measurement_wrist_left, jacket_jacket_measurement_first_button, jacket_jacket_measurement_shoulder_upper_wrist, jacket_jacket_measurement_shoulder_lower_wrist, jacket_measurement_jacket_shoulder, jacket_measurement_jacket_waist, jacket_measurement_jacket_chest, jacket_remark, jacket_date, jacket_time, jacket_ip, jacket_status) VALUES ('$id_jacket', '$order_id', '$product_id', '$jacket_jacket_measurement_sex', '$jacket_jacket_measurement_fit', '$jacket_jacket_measurement', '$jacket_jacket_measurement_jacket_length', '$jacket_jacket_measurement_back_lenght', '$jacket_jacket_measurement_chest', '$jacket_jacket_measurement_waist_only', '$jacket_jacket_measurement_hips', '$jacket_jacket_measurement_shoulders', '$jacket_jacket_measurement_neck', '$jacket_jacket_measurement_ptp_front', '$jacket_jacket_measurement_ptp_back', '$jacket_jacket_measurement_arm_hole', '$jacket_jacket_measurement_biceps', '$jacket_jacket_measurement_sleeves_right', '$jacket_jacket_measurement_sleeves_left', '$jacket_jacket_measurement_wrist_right', '$jacket_jacket_measurement_wrist_left', '$jacket_jacket_measurement_first_button', '$jacket_jacket_measurement_shoulder_upper_wrist', '$jacket_jacket_measurement_shoulder_lower_wrist', '$jacket_measurement_jacket_shoulder', '$jacket_measurement_jacket_waist', '$jacket_measurement_jacket_chest', '$jacket_remark', '$jacket_date', '$jacket_time', '$jacket_ip', '$jacket_status') ";
$query16 = mysql_query($sql16) or die("Can't Query16");

$path = "../../images/body/jacket/front/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['jacket_body_front']['name'];
	$tmp = $_FILES['jacket_body_front']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$jacket_body_front_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$jacket_body_front_pic)){
				
				$sql17 = " UPDATE customize_jacket_measurements SET jacket_body_front = '".$jacket_body_front_pic."', jacket_date = '".$jacket_date."', jacket_time = '".$jacket_time."', jacket_ip = '".$jacket_ip."', jacket_status = '".$jacket_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query17 = mysql_db_query($dbname, $sql17) or die("Can't Query17");
			}
    
	} else {
				$sql17 = " UPDATE customize_jacket_measurements SET jacket_date = '".$jacket_date."', jacket_time = '".$jacket_time."', jacket_ip = '".$jacket_ip."', jacket_status = '".$jacket_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query17 = mysql_db_query($dbname, $sql17) or die("Can't Query17");
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
				
				$sql18 = " UPDATE customize_jacket_measurements SET jacket_body_left = '".$jacket_body_left_pic."', jacket_date = '".$jacket_date."', jacket_time = '".$jacket_time."', jacket_ip = '".$jacket_ip."', jacket_status = '".$jacket_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query18 = mysql_db_query($dbname, $sql18) or die("Can't Query18");
			}
    
	} else {
				$sql18 = " UPDATE customize_jacket_measurements SET jacket_date = '".$jacket_date."', jacket_time = '".$jacket_time."', jacket_ip = '".$jacket_ip."', jacket_status = '".$jacket_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query18 = mysql_db_query($dbname, $sql18) or die("Can't Query18");
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
				
				$sql19 = " UPDATE customize_jacket_measurements SET jacket_body_right = '".$jacket_body_right_pic."', jacket_date = '".$jacket_date."', jacket_time = '".$jacket_time."', jacket_ip = '".$jacket_ip."', jacket_status = '".$jacket_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query19 = mysql_db_query($dbname, $sql19) or die("Can't Query19");
			}
    
	} else {
				$sql19 = " UPDATE customize_jacket_measurements SET jacket_date = '".$jacket_date."', jacket_time = '".$jacket_time."', jacket_ip = '".$jacket_ip."', jacket_status = '".$jacket_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query19 = mysql_db_query($dbname, $sql19) or die("Can't Query19");
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
				
				$sql20 = " UPDATE customize_jacket_measurements SET jacket_body_back = '".$jacket_body_back_pic."', jacket_date = '".$jacket_date."', jacket_time = '".$jacket_time."', jacket_ip = '".$jacket_ip."', jacket_status = '".$jacket_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query20 = mysql_db_query($dbname, $sql20) or die("Can't Query20");
			}
    
	} else {
				$sql20 = " UPDATE customize_jacket_measurements SET jacket_date = '".$jacket_date."', jacket_time = '".$jacket_time."', jacket_ip = '".$jacket_ip."', jacket_status = '".$jacket_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query20 = mysql_db_query($dbname, $sql20) or die("Can't Query20");
			}
	}

} else if ($jacket_fabric_no_4 == "" || $jacket_lining_no_4 == "") { }

/*FABRIC 5*/
if ($jacket_fabric_no_5 != "" && $jacket_lining_no_5 != "") {
	
$sql11 = " SELECT MAX(id) FROM customize_order ";
$query11 = mysql_db_query($dbname, $sql11) or die("Can't Query11");
$row11 = mysql_fetch_array($query11);
$id_order = $row11[0] + 1 ;

$sql12 =	" SELECT MAX(product_id) FROM customize_order";
$query12 = mysql_db_query($dbname, $sql12) or die("Can't Query12");
$row12 = mysql_fetch_array($query12);
$product_id = $row12[0] + 1 ;

$sql13 =	" SELECT MAX(id) FROM customize_jacket_design ";
$query13 = mysql_db_query($dbname, $sql13) or die("Can't Query13");
$row13 = mysql_fetch_array($query13);
$id_jacket = $row13[0] + 1 ;

$sql14 = " INSERT INTO customize_order (id, order_id, product_id, order_reseller, order_order_no, order_name_customize, order_my_price, order_price, order_product, order_fabric_no, order_date, order_time, order_ip, order_status) VALUES ('$id_order', '$order_id', '$product_id', '$company_user', '$jacket_order_no', '$jacket_customer_name', '$jacket_my_price_5', '$jacket_price_5', '$order_product', '$jacket_fabric_no_5', '$jacket_date', '$jacket_time', '$jacket_ip', '$jacket_status') ";
$query14 = mysql_query($sql14) or die("Can't Query14");

$sql15 = " INSERT INTO customize_jacket_design (id, order_id, product_id, jacket_customer_name, jacket_order_no, jacket_order_date, jacket_delivery_date, jacket_fabric_no, jacket_lining_no, jacket_jacket_style, jacket_lapel_style, jacket_lapel_width, jacket_lapel_color, jacket_real_lapel_boutonniere, jacket_vent_style, jacket_pocket_style, jacket_chest_pocket, jacket_shoulder_construction, jacket_sleeve_button, jacket_cuff, jacket_all_sleevebutton_holes_color, jacket_contrast_last_sleevebutton_holes_color, jacket_contrast_last_sleevebutton_holes_button, jacket_lining_style, jacket_canvas, jacket_jacket_button_number, jacket_jacket_thread_on_button, jacket_jacket_button_hole_color, jacket_pick_stitch, jacket_pick_stitch_lapel_color, jacket_pick_stitch_pocket_color, jacket_pick_stitch_sleeves, jacket_pick_stitch_vest, jacket_embroidery_inside_initial_or_name, jacket_embroidery_inside_color, jacket_embroidery_inside_design, jacket_embroidery_collar_initial_or_name, jacket_embroidery_collar_color, jacket_embroidery_collar_design, jacket_brand, jacket_elbow_patch, jacket_collar_felt_color, jacket_date, jacket_time, jacket_ip, jacket_status) VALUES ('$id_jacket', '$order_id', '$product_id', '$jacket_customer_name', '$jacket_order_no', '$jacket_order_date', '$jacket_delivery_date', '$jacket_fabric_no_5', '$jacket_lining_no_5', '$jacket_jacket_style', '$jacket_lapel_style', '$jacket_lapel_width', '$jacket_lapel_color', '$jacket_real_lapel_boutonniere', '$jacket_vent_style', '$jacket_pocket_style', '$jacket_chest_pocket', '$jacket_shoulder_construction', '$jacket_sleeve_button', '$jacket_cuff', '$jacket_all_sleevebutton_holes_color', '$jacket_contrast_last_sleevebutton_holes_color', '$jacket_contrast_last_sleevebutton_holes_button', '$jacket_lining_style', '$jacket_canvas', '$jacket_jacket_button_number', '$jacket_jacket_thread_on_button', '$jacket_jacket_button_hole_color', '$jacket_pick_stitch', '$jacket_pick_stitch_lapel_color', '$jacket_pick_stitch_pocket_color', '$jacket_pick_stitch_sleeves', '$jacket_pick_stitch_vest', '$jacket_embroidery_inside_initial_or_name', '$jacket_embroidery_inside_color', '$jacket_embroidery_inside_design', '$jacket_embroidery_collar_initial_or_name', '$jacket_embroidery_collar_color', '$jacket_embroidery_collar_design', '$jacket_brand', '$jacket_elbow_patch', '$jacket_collar_felt_color', '$jacket_date', '$jacket_time', '$jacket_ip', '$jacket_status') ";
$query15 = mysql_query($sql15) or die("Can't Query15");

$sql16 = " INSERT INTO customize_jacket_measurements (id, order_id, product_id, jacket_jacket_measurement_sex, jacket_jacket_measurement_fit, jacket_jacket_measurement, jacket_jacket_measurement_jacket_length, jacket_jacket_measurement_back_lenght, jacket_jacket_measurement_chest, jacket_jacket_measurement_waist_only, jacket_jacket_measurement_hips, jacket_jacket_measurement_shoulders, jacket_jacket_measurement_neck, jacket_jacket_measurement_ptp_front, jacket_jacket_measurement_ptp_back, jacket_jacket_measurement_arm_hole, jacket_jacket_measurement_biceps, jacket_jacket_measurement_sleeves_right, jacket_jacket_measurement_sleeves_left, jacket_jacket_measurement_wrist_right, jacket_jacket_measurement_wrist_left, jacket_jacket_measurement_first_button, jacket_jacket_measurement_shoulder_upper_wrist, jacket_jacket_measurement_shoulder_lower_wrist, jacket_measurement_jacket_shoulder, jacket_measurement_jacket_waist, jacket_measurement_jacket_chest, jacket_remark, jacket_date, jacket_time, jacket_ip, jacket_status) VALUES ('$id_jacket', '$order_id', '$product_id', '$jacket_jacket_measurement_sex', '$jacket_jacket_measurement_fit', '$jacket_jacket_measurement', '$jacket_jacket_measurement_jacket_length', '$jacket_jacket_measurement_back_lenght', '$jacket_jacket_measurement_chest', '$jacket_jacket_measurement_waist_only', '$jacket_jacket_measurement_hips', '$jacket_jacket_measurement_shoulders', '$jacket_jacket_measurement_neck', '$jacket_jacket_measurement_ptp_front', '$jacket_jacket_measurement_ptp_back', '$jacket_jacket_measurement_arm_hole', '$jacket_jacket_measurement_biceps', '$jacket_jacket_measurement_sleeves_right', '$jacket_jacket_measurement_sleeves_left', '$jacket_jacket_measurement_wrist_right', '$jacket_jacket_measurement_wrist_left', '$jacket_jacket_measurement_first_button', '$jacket_jacket_measurement_shoulder_upper_wrist', '$jacket_jacket_measurement_shoulder_lower_wrist', '$jacket_measurement_jacket_shoulder', '$jacket_measurement_jacket_waist', '$jacket_measurement_jacket_chest', '$jacket_remark', '$jacket_date', '$jacket_time', '$jacket_ip', '$jacket_status') ";
$query16 = mysql_query($sql16) or die("Can't Query16");

$path = "../../images/body/jacket/front/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['jacket_body_front']['name'];
	$tmp = $_FILES['jacket_body_front']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$jacket_body_front_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$jacket_body_front_pic)){
				
				$sql17 = " UPDATE customize_jacket_measurements SET jacket_body_front = '".$jacket_body_front_pic."', jacket_date = '".$jacket_date."', jacket_time = '".$jacket_time."', jacket_ip = '".$jacket_ip."', jacket_status = '".$jacket_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query17 = mysql_db_query($dbname, $sql17) or die("Can't Query17");
			}
    
	} else {
				$sql17 = " UPDATE customize_jacket_measurements SET jacket_date = '".$jacket_date."', jacket_time = '".$jacket_time."', jacket_ip = '".$jacket_ip."', jacket_status = '".$jacket_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query17 = mysql_db_query($dbname, $sql17) or die("Can't Query17");
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
				
				$sql18 = " UPDATE customize_jacket_measurements SET jacket_body_left = '".$jacket_body_left_pic."', jacket_date = '".$jacket_date."', jacket_time = '".$jacket_time."', jacket_ip = '".$jacket_ip."', jacket_status = '".$jacket_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query18 = mysql_db_query($dbname, $sql18) or die("Can't Query18");
			}
    
	} else {
				$sql18 = " UPDATE customize_jacket_measurements SET jacket_date = '".$jacket_date."', jacket_time = '".$jacket_time."', jacket_ip = '".$jacket_ip."', jacket_status = '".$jacket_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query18 = mysql_db_query($dbname, $sql18) or die("Can't Query18");
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
				
				$sql19 = " UPDATE customize_jacket_measurements SET jacket_body_right = '".$jacket_body_right_pic."', jacket_date = '".$jacket_date."', jacket_time = '".$jacket_time."', jacket_ip = '".$jacket_ip."', jacket_status = '".$jacket_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query19 = mysql_db_query($dbname, $sql19) or die("Can't Query19");
			}
    
	} else {
				$sql19 = " UPDATE customize_jacket_measurements SET jacket_date = '".$jacket_date."', jacket_time = '".$jacket_time."', jacket_ip = '".$jacket_ip."', jacket_status = '".$jacket_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query19 = mysql_db_query($dbname, $sql19) or die("Can't Query19");
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
				
				$sql20 = " UPDATE customize_jacket_measurements SET jacket_body_back = '".$jacket_body_back_pic."', jacket_date = '".$jacket_date."', jacket_time = '".$jacket_time."', jacket_ip = '".$jacket_ip."', jacket_status = '".$jacket_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query20 = mysql_db_query($dbname, $sql20) or die("Can't Query20");
			}
    
	} else {
				$sql20 = " UPDATE customize_jacket_measurements SET jacket_date = '".$jacket_date."', jacket_time = '".$jacket_time."', jacket_ip = '".$jacket_ip."', jacket_status = '".$jacket_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query20 = mysql_db_query($dbname, $sql20) or die("Can't Query20");
			}
	}

} else if ($jacket_fabric_no_5 == "" || $jacket_lining_no_5 == "") { }

/*FABRIC 6*/
if ($jacket_fabric_no_6 != "" && $jacket_lining_no_6 != "") {

$sql11 = " SELECT MAX(id) FROM customize_order ";
$query11 = mysql_db_query($dbname, $sql11) or die("Can't Query11");
$row11 = mysql_fetch_array($query11);
$id_order = $row11[0] + 1 ;

$sql12 =	" SELECT MAX(product_id) FROM customize_order";
$query12 = mysql_db_query($dbname, $sql12) or die("Can't Query12");
$row12 = mysql_fetch_array($query12);
$product_id = $row12[0] + 1 ;

$sql13 =	" SELECT MAX(id) FROM customize_jacket_design ";
$query13 = mysql_db_query($dbname, $sql13) or die("Can't Query13");
$row13 = mysql_fetch_array($query13);
$id_jacket = $row13[0] + 1 ;

$sql14 = " INSERT INTO customize_order (id, order_id, product_id, order_reseller, order_order_no, order_name_customize, order_my_price, order_price, order_product, order_fabric_no, order_date, order_time, order_ip, order_status) VALUES ('$id_order', '$order_id', '$product_id', '$company_user', '$jacket_order_no', '$jacket_customer_name', '$jacket_my_price_6', '$jacket_price_6', '$order_product', '$jacket_fabric_no_6', '$jacket_date', '$jacket_time', '$jacket_ip', '$jacket_status') ";
$query14 = mysql_query($sql14) or die("Can't Query14");

$sql15 = " INSERT INTO customize_jacket_design (id, order_id, product_id, jacket_customer_name, jacket_order_no, jacket_order_date, jacket_delivery_date, jacket_fabric_no, jacket_lining_no, jacket_jacket_style, jacket_lapel_style, jacket_lapel_width, jacket_lapel_color, jacket_real_lapel_boutonniere, jacket_vent_style, jacket_pocket_style, jacket_chest_pocket, jacket_shoulder_construction, jacket_sleeve_button, jacket_cuff, jacket_all_sleevebutton_holes_color, jacket_contrast_last_sleevebutton_holes_color, jacket_contrast_last_sleevebutton_holes_button, jacket_lining_style, jacket_canvas, jacket_jacket_button_number, jacket_jacket_thread_on_button, jacket_jacket_button_hole_color, jacket_pick_stitch, jacket_pick_stitch_lapel_color, jacket_pick_stitch_pocket_color, jacket_pick_stitch_sleeves, jacket_pick_stitch_vest, jacket_embroidery_inside_initial_or_name, jacket_embroidery_inside_color, jacket_embroidery_inside_design, jacket_embroidery_collar_initial_or_name, jacket_embroidery_collar_color, jacket_embroidery_collar_design, jacket_brand, jacket_elbow_patch, jacket_collar_felt_color, jacket_date, jacket_time, jacket_ip, jacket_status) VALUES ('$id_jacket', '$order_id', '$product_id', '$jacket_customer_name', '$jacket_order_no', '$jacket_order_date', '$jacket_delivery_date', '$jacket_fabric_no_6', '$jacket_lining_no_6', '$jacket_jacket_style', '$jacket_lapel_style', '$jacket_lapel_width', '$jacket_lapel_color', '$jacket_real_lapel_boutonniere', '$jacket_vent_style', '$jacket_pocket_style', '$jacket_chest_pocket', '$jacket_shoulder_construction', '$jacket_sleeve_button', '$jacket_cuff', '$jacket_all_sleevebutton_holes_color', '$jacket_contrast_last_sleevebutton_holes_color', '$jacket_contrast_last_sleevebutton_holes_button', '$jacket_lining_style', '$jacket_canvas', '$jacket_jacket_button_number', '$jacket_jacket_thread_on_button', '$jacket_jacket_button_hole_color', '$jacket_pick_stitch', '$jacket_pick_stitch_lapel_color', '$jacket_pick_stitch_pocket_color', '$jacket_pick_stitch_sleeves', '$jacket_pick_stitch_vest', '$jacket_embroidery_inside_initial_or_name', '$jacket_embroidery_inside_color', '$jacket_embroidery_inside_design', '$jacket_embroidery_collar_initial_or_name', '$jacket_embroidery_collar_color', '$jacket_embroidery_collar_design', '$jacket_brand', '$jacket_elbow_patch', '$jacket_collar_felt_color', '$jacket_date', '$jacket_time', '$jacket_ip', '$jacket_status') ";
$query15 = mysql_query($sql15) or die("Can't Query15");

$sql16 = " INSERT INTO customize_jacket_measurements (id, order_id, product_id, jacket_jacket_measurement_sex, jacket_jacket_measurement_fit, jacket_jacket_measurement, jacket_jacket_measurement_jacket_length, jacket_jacket_measurement_back_lenght, jacket_jacket_measurement_chest, jacket_jacket_measurement_waist_only, jacket_jacket_measurement_hips, jacket_jacket_measurement_shoulders, jacket_jacket_measurement_neck, jacket_jacket_measurement_ptp_front, jacket_jacket_measurement_ptp_back, jacket_jacket_measurement_arm_hole, jacket_jacket_measurement_biceps, jacket_jacket_measurement_sleeves_right, jacket_jacket_measurement_sleeves_left, jacket_jacket_measurement_wrist_right, jacket_jacket_measurement_wrist_left, jacket_jacket_measurement_first_button, jacket_jacket_measurement_shoulder_upper_wrist, jacket_jacket_measurement_shoulder_lower_wrist, jacket_measurement_jacket_shoulder, jacket_measurement_jacket_waist, jacket_measurement_jacket_chest, jacket_remark, jacket_date, jacket_time, jacket_ip, jacket_status) VALUES ('$id_jacket', '$order_id', '$product_id', '$jacket_jacket_measurement_sex', '$jacket_jacket_measurement_fit', '$jacket_jacket_measurement', '$jacket_jacket_measurement_jacket_length', '$jacket_jacket_measurement_back_lenght', '$jacket_jacket_measurement_chest', '$jacket_jacket_measurement_waist_only', '$jacket_jacket_measurement_hips', '$jacket_jacket_measurement_shoulders', '$jacket_jacket_measurement_neck', '$jacket_jacket_measurement_ptp_front', '$jacket_jacket_measurement_ptp_back', '$jacket_jacket_measurement_arm_hole', '$jacket_jacket_measurement_biceps', '$jacket_jacket_measurement_sleeves_right', '$jacket_jacket_measurement_sleeves_left', '$jacket_jacket_measurement_wrist_right', '$jacket_jacket_measurement_wrist_left', '$jacket_jacket_measurement_first_button', '$jacket_jacket_measurement_shoulder_upper_wrist', '$jacket_jacket_measurement_shoulder_lower_wrist', '$jacket_measurement_jacket_shoulder', '$jacket_measurement_jacket_waist', '$jacket_measurement_jacket_chest', '$jacket_remark', '$jacket_date', '$jacket_time', '$jacket_ip', '$jacket_status') ";
$query16 = mysql_query($sql16) or die("Can't Query16");

$path = "../../images/body/jacket/front/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['jacket_body_front']['name'];
	$tmp = $_FILES['jacket_body_front']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$jacket_body_front_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$jacket_body_front_pic)){
				
				$sql17 = " UPDATE customize_jacket_measurements SET jacket_body_front = '".$jacket_body_front_pic."', jacket_date = '".$jacket_date."', jacket_time = '".$jacket_time."', jacket_ip = '".$jacket_ip."', jacket_status = '".$jacket_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query17 = mysql_db_query($dbname, $sql17) or die("Can't Query17");
			}
    
	} else {
				$sql17 = " UPDATE customize_jacket_measurements SET jacket_date = '".$jacket_date."', jacket_time = '".$jacket_time."', jacket_ip = '".$jacket_ip."', jacket_status = '".$jacket_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query17 = mysql_db_query($dbname, $sql17) or die("Can't Query17");
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
				
				$sql18 = " UPDATE customize_jacket_measurements SET jacket_body_left = '".$jacket_body_left_pic."', jacket_date = '".$jacket_date."', jacket_time = '".$jacket_time."', jacket_ip = '".$jacket_ip."', jacket_status = '".$jacket_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query18 = mysql_db_query($dbname, $sql18) or die("Can't Query18");
			}
    
	} else {
				$sql18 = " UPDATE customize_jacket_measurements SET jacket_date = '".$jacket_date."', jacket_time = '".$jacket_time."', jacket_ip = '".$jacket_ip."', jacket_status = '".$jacket_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query18 = mysql_db_query($dbname, $sql18) or die("Can't Query18");
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
				
				$sql19 = " UPDATE customize_jacket_measurements SET jacket_body_right = '".$jacket_body_right_pic."', jacket_date = '".$jacket_date."', jacket_time = '".$jacket_time."', jacket_ip = '".$jacket_ip."', jacket_status = '".$jacket_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query19 = mysql_db_query($dbname, $sql19) or die("Can't Query19");
			}
    
	} else {
				$sql19 = " UPDATE customize_jacket_measurements SET jacket_date = '".$jacket_date."', jacket_time = '".$jacket_time."', jacket_ip = '".$jacket_ip."', jacket_status = '".$jacket_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query19 = mysql_db_query($dbname, $sql19) or die("Can't Query19");
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
				
				$sql20 = " UPDATE customize_jacket_measurements SET jacket_body_back = '".$jacket_body_back_pic."', jacket_date = '".$jacket_date."', jacket_time = '".$jacket_time."', jacket_ip = '".$jacket_ip."', jacket_status = '".$jacket_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query20 = mysql_db_query($dbname, $sql20) or die("Can't Query20");
			}
    
	} else {
				$sql20 = " UPDATE customize_jacket_measurements SET jacket_date = '".$jacket_date."', jacket_time = '".$jacket_time."', jacket_ip = '".$jacket_ip."', jacket_status = '".$jacket_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query20 = mysql_db_query($dbname, $sql20) or die("Can't Query20");
			}
	}

} else if ($jacket_fabric_no_6 == "" || $jacket_lining_no_6 == "") { }

if ($jacket_orderid != "") {
	
	$sql21 = " UPDATE customize_checkout SET checkout_company = '$company_user', checkout_order = '$jacket_order_no', checkout_customer = '$jacket_customer_name', checkout_date = '$jacket_date', checkout_time = '$jacket_time', checkout_ip = '$jacket_ip', checkout_status = '$jacket_status' WHERE checkout_orderid = '$order_id' ";
	$query21 = mysql_query($sql21) or die("Can't Query21");
	
} else if ($jacket_orderid == "") {
		
	$sql21 = " INSERT INTO customize_checkout (id, checkout_company, checkout_order, checkout_orderid, checkout_customer, checkout_date, checkout_time, checkout_ip, checkout_status) VALUES ('$id_customize_checkout', '$company_user', '$jacket_order_no', '$order_id', '$jacket_customer_name', '$jacket_date', '$jacket_time', '$jacket_ip', '$jacket_status') ";
	$query21 = mysql_query($sql21) or die("Can't Query21");
	
}

if($query21) {
	
	echo " <script language='javascript'> window.location='../../cart/single/index.php?orderid=".$order_id."'; </script> ";
	
}

mysql_close();
?>