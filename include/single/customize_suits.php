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

$order_product = suits;
$suits_orderid = $_POST["suits_orderid"];

if ($suits_orderid != "") {
	
	$order_id = $suits_orderid;
	
} else if ($suits_orderid == "") {
	
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
$suits_fabric_no_1 = $_POST["suits_fabric_no_1"];
$suits_lining_no_1 = $_POST["suits_lining_no_1"];
$suits_fabric_no_2 = $_POST["suits_fabric_no_2"];
$suits_lining_no_2 = $_POST["suits_lining_no_2"];
$suits_fabric_no_3 = $_POST["suits_fabric_no_3"];
$suits_lining_no_3 = $_POST["suits_lining_no_3"];
$suits_fabric_no_4 = $_POST["suits_fabric_no_4"];
$suits_lining_no_4 = $_POST["suits_lining_no_4"];
$suits_fabric_no_5 = $_POST["suits_fabric_no_5"];
$suits_lining_no_5 = $_POST["suits_lining_no_5"];
$suits_fabric_no_6 = $_POST["suits_fabric_no_6"];
$suits_lining_no_6 = $_POST["suits_lining_no_6"];

$sql4 =	" SELECT * FROM admin_fabrics_suits WHERE fabricno = '$suits_fabric_no_1' ";
$query4 = mysql_db_query($dbname, $sql4) or die("Can't Query4");
$row4 = mysql_fetch_array($query4);
$fabrics_type = $row4["type"];
$fabrics_brand = $row4["brand"];

if ($row4["type"] != '') {

$sql01 = " SELECT `fabrictype_".$id_user."` FROM admin_fabrictype WHERE fabrictype_name = '$fabrics_type' AND fabrictype_product = 'Suits' ";
$query01 = mysql_db_query($dbname, $sql01) or die("Can't Query01");
$row01 = mysql_fetch_array($query01);
$suits_fabric_price_1 = $row01["0"];

} else if ($row4["brand"] != '') {
	
$sql02 = " SELECT `fabricbrand_".$id_user."` FROM admin_fabricbrand WHERE fabricbrand_name = '$fabrics_brand' AND fabricbrand_product = 'Suits' ";
$query02 = mysql_db_query($dbname, $sql02) or die("Can't Query02");
$row02 = mysql_fetch_array($query02);	
$suits_fabric_price_1 = $row02["0"];
	
}

$sql5 =	" SELECT * FROM admin_fabrics_suits WHERE fabricno = '$suits_fabric_no_2' ";
$query5 = mysql_db_query($dbname, $sql5) or die("Can't Query5");
$row5 = mysql_fetch_array($query5);
$fabrics_type = $row5["type"];
$fabrics_brand = $row5["brand"];

if ($row5["type"] != '') {

$sql03 = " SELECT `fabrictype_".$id_user."` FROM admin_fabrictype WHERE fabrictype_name = '$fabrics_type' AND fabrictype_product = 'Suits' ";
$query03 = mysql_db_query($dbname, $sql03) or die("Can't Query03");
$row03 = mysql_fetch_array($query03);
$suits_fabric_price_2 = $row03["0"];

} else if ($row5["brand"] != '') {
	
$sql04 = " SELECT `fabricbrand_".$id_user."` FROM admin_fabricbrand WHERE fabricbrand_name = '$fabrics_brand' AND fabricbrand_product = 'Suits' ";
$query04 = mysql_db_query($dbname, $sql04) or die("Can't Query04");
$row04 = mysql_fetch_array($query04);	
$suits_fabric_price_2 = $row04["0"];
	
}

$sql6 =	" SELECT * FROM admin_fabrics_suits WHERE fabricno = '$suits_fabric_no_3' ";
$query6 = mysql_db_query($dbname, $sql6) or die("Can't Query6");
$row6 = mysql_fetch_array($query6);
$fabrics_type = $row6["type"];
$fabrics_brand = $row6["brand"];

if ($row6["type"] != '') {

$sql05 = " SELECT `fabrictype_".$id_user."` FROM admin_fabrictype WHERE fabrictype_name = '$fabrics_type' AND fabrictype_product = 'Suits' ";
$query05 = mysql_db_query($dbname, $sql05) or die("Can't Query05");
$row05 = mysql_fetch_array($query05);
$suits_fabric_price_3 = $row05["0"];

} else if ($row6["brand"] != '') {
	
$sql06 = " SELECT `fabricbrand_".$id_user."` FROM admin_fabricbrand WHERE fabricbrand_name = '$fabrics_brand' AND fabricbrand_product = 'Suits' ";
$query06 = mysql_db_query($dbname, $sql06) or die("Can't Query06");
$row06 = mysql_fetch_array($query06);	
$suits_fabric_price_3 = $row06["0"];
	
}

$sql7 =	" SELECT * FROM admin_fabrics_suits WHERE fabricno = '$suits_fabric_no_4' ";
$query7 = mysql_db_query($dbname, $sql7) or die("Can't Query7");
$row7 = mysql_fetch_array($query7);
$fabrics_type = $row7["type"];
$fabrics_brand = $row7["brand"];

if ($row7["type"] != '') {

$sql07 = " SELECT `fabrictype_".$id_user."` FROM admin_fabrictype WHERE fabrictype_name = '$fabrics_type' AND fabrictype_product = 'Suits' ";
$query07 = mysql_db_query($dbname, $sql07) or die("Can't Query07");
$row07 = mysql_fetch_array($query07);
$suits_fabric_price_4 = $row07["0"];

} else if ($row7["brand"] != '') {
	
$sql08 = " SELECT `fabricbrand_".$id_user."` FROM admin_fabricbrand WHERE fabricbrand_name = '$fabrics_brand' AND fabricbrand_product = 'Suits' ";
$query08 = mysql_db_query($dbname, $sql08) or die("Can't Query08");
$row08 = mysql_fetch_array($query08);	
$suits_fabric_price_4 = $row08["0"];
	
}

$sql8 = " SELECT * FROM admin_fabrics_suits WHERE fabricno = '$suits_fabric_no_5' ";
$query8 = mysql_db_query($dbname, $sql8) or die("Can't Query8");
$row8 = mysql_fetch_array($query8);
$fabrics_type = $row8["type"];
$fabrics_brand = $row8["brand"];

if ($row8["type"] != '') {

$sql09 = " SELECT `fabrictype_".$id_user."` FROM admin_fabrictype WHERE fabrictype_name = '$fabrics_type' AND fabrictype_product = 'Suits' ";
$query09 = mysql_db_query($dbname, $sql09) or die("Can't Query09");
$row09 = mysql_fetch_array($query09);
$suits_fabric_price_5 = $row09["0"];

} else if ($row8["brand"] != '') {
	
$sql010 = " SELECT `fabricbrand_".$id_user."` FROM admin_fabricbrand WHERE fabricbrand_name = '$fabrics_brand' AND fabricbrand_product = 'Suits' ";
$query010 = mysql_db_query($dbname, $sql010) or die("Can't Query010");
$row010 = mysql_fetch_array($query010);	
$suits_fabric_price_5 = $row010["0"];
	
}

$sql9 = " SELECT * FROM admin_fabrics_suits WHERE fabricno = '$suits_fabric_no_6' ";
$query9 = mysql_db_query($dbname, $sql9) or die("Can't Query9");
$row9 = mysql_fetch_array($query9);
$fabrics_type = $row9["type"];
$fabrics_brand = $row9["brand"];

if ($row9["type"] != '') {

$sql011 = " SELECT `fabrictype_".$id_user."` FROM admin_fabrictype WHERE fabrictype_name = '$fabrics_type' AND fabrictype_product = 'Suits' ";
$query011 = mysql_db_query($dbname, $sql011) or die("Can't Query011");
$row011 = mysql_fetch_array($query011);
$suits_fabric_price_6 = $row011["0"];

} else if ($row9["brand"] != '') {
	
$sql012 = " SELECT `fabricbrand_".$id_user."` FROM admin_fabricbrand WHERE fabricbrand_name = '$fabrics_brand' AND fabricbrand_product = 'Suits' ";
$query012 = mysql_db_query($dbname, $sql012) or die("Can't Query012");
$row012 = mysql_fetch_array($query012);	
$suits_fabric_price_6 = $row012["0"];
	
}

/*OTHER PRICING PARAMETERS*/
$suits_jacket_measurement_chest = $_POST["suits_jacket_measurement_chest"];
$suits_jacket_measurement_waist_only = $_POST["suits_jacket_measurement_waist_only"];
$suits_jacket_measurement_hips = $_POST["suits_jacket_measurement_hips"];

if (($suits_jacket_measurement_chest >= '50' && $suits_jacket_measurement_chest <= '52') || ($suits_jacket_measurement_waist_only >= '50' && $suits_jacket_measurement_waist_only <= '52') || ($suits_jacket_measurement_hips >= '50' && $suits_jacket_measurement_hips <= '52')) {
	
	$price_size_1 = $suits_fabric_price_1 * 20;
	$price_size_2 = $price_size_1 / 100;
	
	$price_size_4 = $suits_fabric_price_2 * 20;
	$price_size_5 = $price_size_4 / 100;
	
	$price_size_7 = $suits_fabric_price_3 * 20;
	$price_size_8 = $price_size_7 / 100;
	
	$price_size_10 = $suits_fabric_price_4 * 20;
	$price_size_11 = $price_size_10 / 100;
	
	$price_size_13 = $suits_fabric_price_5 * 20;
	$price_size_14 = $price_size_13 / 100;
	
	$price_size_16 = $suits_fabric_price_6 * 20;
	$price_size_17 = $price_size_16 / 100;
	
} else if (($suits_jacket_measurement_chest >= '52.5' && $suits_jacket_measurement_chest <= '56') || ($suits_jacket_measurement_waist_only >= '52.5' && $suits_jacket_measurement_waist_only <= '56') || ($suits_jacket_measurement_hips >= '52.5' && $suits_jacket_measurement_hips <= '56')) {
	
	$price_size_1 = $suits_fabric_price_1 * 30;
	$price_size_2 = $price_size_1 / 100;
	
	$price_size_4 = $suits_fabric_price_2 * 30;
	$price_size_5 = $price_size_4 / 100;
	
	$price_size_7 = $suits_fabric_price_3 * 30;
	$price_size_8 = $price_size_7 / 100;
	
	$price_size_10 = $suits_fabric_price_4 * 30;
	$price_size_11 = $price_size_10 / 100;
	
	$price_size_13 = $suits_fabric_price_5 * 30;
	$price_size_14 = $price_size_13 / 100;
	
	$price_size_16 = $suits_fabric_price_6 * 30;
	$price_size_17 = $price_size_16 / 100;
	
} else if (($suits_jacket_measurement_chest >= '56.5' && $suits_jacket_measurement_chest <= '60') || ($suits_jacket_measurement_waist_only >= '56.5' && $suits_jacket_measurement_waist_only <= '60') || ($suits_jacket_measurement_hips >= '56.5' && $suits_jacket_measurement_hips <= '60')) {
	
	$price_size_1 = $suits_fabric_price_1 * 40;
	$price_size_2 = $price_size_1 / 100;
	
	$price_size_4 = $suits_fabric_price_2 * 40;
	$price_size_5 = $price_size_4 / 100;
	
	$price_size_7 = $suits_fabric_price_3 * 40;
	$price_size_8 = $price_size_7 / 100;
	
	$price_size_10 = $suits_fabric_price_4 * 40;
	$price_size_11 = $price_size_10 / 100;
	
	$price_size_13 = $suits_fabric_price_5 * 40;
	$price_size_14 = $price_size_13 / 100;
	
	$price_size_16 = $suits_fabric_price_6 * 40;
	$price_size_17 = $price_size_16 / 100;
	
} else if (($suits_jacket_measurement_chest >= '60.5' && $suits_jacket_measurement_chest <= '64') || ($suits_jacket_measurement_waist_only >= '60.5' && $suits_jacket_measurement_waist_only <= '64') || ($suits_jacket_measurement_hips >= '60.5' && $suits_jacket_measurement_hips <= '64')) {
	
	$price_size_1 = $suits_fabric_price_1 * 50;
	$price_size_2 = $price_size_1 / 100;
	
	$price_size_4 = $suits_fabric_price_2 * 50;
	$price_size_5 = $price_size_4 / 100;
	
	$price_size_7 = $suits_fabric_price_3 * 50;
	$price_size_8 = $price_size_7 / 100;
	
	$price_size_10 = $suits_fabric_price_4 * 50;
	$price_size_11 = $price_size_10 / 100;
	
	$price_size_13 = $suits_fabric_price_5 * 50;
	$price_size_14 = $price_size_13 / 100;
	
	$price_size_16 = $suits_fabric_price_6 * 50;
	$price_size_17 = $price_size_16 / 100;
	
} else if (($suits_jacket_measurement_chest >= '64.5' && $suits_jacket_measurement_chest <= '68') || ($suits_jacket_measurement_waist_only >= '64.5' && $suits_jacket_measurement_waist_only <= '68') || ($suits_jacket_measurement_hips >= '64.5' && $suits_jacket_measurement_hips <= '68')) {
	
	$price_size_1 = $suits_fabric_price_1 * 60;
	$price_size_2 = $price_size_1 / 100;
	
	$price_size_4 = $suits_fabric_price_2 * 60;
	$price_size_5 = $price_size_4 / 100;
	
	$price_size_7 = $suits_fabric_price_3 * 60;
	$price_size_8 = $price_size_7 / 100;
	
	$price_size_10 = $suits_fabric_price_4 * 60;
	$price_size_11 = $price_size_10 / 100;
	
	$price_size_13 = $suits_fabric_price_5 * 60;
	$price_size_14 = $price_size_13 / 100;
	
	$price_size_16 = $suits_fabric_price_6 * 60;
	$price_size_17 = $price_size_16 / 100;
	
}  else {
	
	$price_size_2 = 0;
	$price_size_5 = 0;
	$price_size_8 = 0;
	$price_size_11 = 0;
	$price_size_14 = 0;
	$price_size_17 = 0;
	
}

$suits_pants_measurement_waist = $_POST["suits_pants_measurement_waist"];
$suits_pants_measurement_hips = $_POST["suits_pants_measurement_hips"];

if (($suits_pants_measurement_waist >= '50' && $suits_pants_measurement_waist <= '52') || ($suits_pants_measurement_hips >= '50' && $suits_pants_measurement_hips <= '52')) {
	
	$price_size_18 = $suits_fabric_price_1 * 20;
	$price_size_19 = $price_size_18 / 100;
	
	$price_size_20 = $suits_fabric_price_2 * 20;
	$price_size_21 = $price_size_20 / 100;
	
	$price_size_22 = $suits_fabric_price_3 * 20;
	$price_size_23 = $price_size_22 / 100;
	
	$price_size_24 = $suits_fabric_price_4 * 20;
	$price_size_25 = $suits_size_24 / 100;
	
	$price_size_26 = $suits_fabric_price_5 * 20;
	$price_size_27 = $price_size_26 / 100;
	
	$price_size_28 = $suits_fabric_price_6 * 20;
	$price_size_29 = $price_size_28 / 100;
	
} else if (($suits_pants_measurement_waist >= '52.5' && $suits_pants_measurement_waist <= '56') || ($suits_pants_measurement_hips >= '52.5' && $suits_pants_measurement_hips <= '56')) {
	
	$price_size_18 = $suits_fabric_price_1 * 30;
	$price_size_19 = $price_size_18 / 100;
	
	$price_size_20 = $suits_fabric_price_2 * 30;
	$price_size_21 = $price_size_20 / 100;
	
	$price_size_22 = $suits_fabric_price_3 * 30;
	$price_size_23 = $price_size_22 / 100;
	
	$price_size_24 = $suits_fabric_price_4 * 30;
	$price_size_25 = $suits_size_24 / 100;
	
	$price_size_26 = $suits_fabric_price_5 * 30;
	$price_size_27 = $price_size_26 / 100;
	
	$price_size_28 = $suits_fabric_price_6 * 30;
	$price_size_29 = $price_size_28 / 100;
	
} else if (($suits_pants_measurement_waist >= '56.5' && $suits_pants_measurement_waist <= '60') || ($suits_pants_measurement_hips >= '56.5' && $suits_pants_measurement_hips <= '60')) {
	
	$price_size_18 = $suits_fabric_price_1 * 40;
	$price_size_19 = $price_size_18 / 100;
	
	$price_size_20 = $suits_fabric_price_2 * 40;
	$price_size_21 = $price_size_20 / 100;
	
	$price_size_22 = $suits_fabric_price_3 * 40;
	$price_size_23 = $price_size_22 / 100;
	
	$price_size_24 = $suits_fabric_price_4 * 40;
	$price_size_25 = $suits_size_24 / 100;
	
	$price_size_26 = $suits_fabric_price_5 * 40;
	$price_size_27 = $price_size_26 / 100;
	
	$price_size_28 = $suits_fabric_price_6 * 40;
	$price_size_29 = $price_size_28 / 100;
	
} else if (($suits_pants_measurement_waist >= '60.5' && $suits_pants_measurement_waist <= '64') || ($suits_pants_measurement_hips >= '60.5' && $suits_pants_measurement_hips <= '64')) {
	
	$price_size_18 = $suits_fabric_price_1 * 50;
	$price_size_19 = $price_size_18 / 100;
	
	$price_size_20 = $suits_fabric_price_2 * 50;
	$price_size_21 = $price_size_20 / 100;
	
	$price_size_22 = $suits_fabric_price_3 * 50;
	$price_size_23 = $price_size_22 / 100;
	
	$price_size_24 = $suits_fabric_price_4 * 50;
	$price_size_25 = $suits_size_24 / 100;
	
	$price_size_26 = $suits_fabric_price_5 * 50;
	$price_size_27 = $price_size_26 / 100;
	
	$price_size_28 = $suits_fabric_price_6 * 50;
	$price_size_29 = $price_size_28 / 100;
	
} else if (($suits_pants_measurement_waist >= '64.5' && $suits_pants_measurement_waist <= '68') || ($suits_pants_measurement_hips >= '64.5' && $suits_pants_measurement_hips <= '68')) {
	
	$price_size_18 = $suits_fabric_price_1 * 60;
	$price_size_19 = $price_size_18 / 100;
	
	$price_size_20 = $suits_fabric_price_2 * 60;
	$price_size_21 = $price_size_20 / 100;
	
	$price_size_22 = $suits_fabric_price_3 * 60;
	$price_size_23 = $price_size_22 / 100;
	
	$price_size_24 = $suits_fabric_price_4 * 60;
	$price_size_25 = $suits_size_24 / 100;
	
	$price_size_26 = $suits_fabric_price_5 * 60;
	$price_size_27 = $price_size_26 / 100;
	
	$price_size_28 = $suits_fabric_price_6 * 60;
	$price_size_29 = $price_size_28 / 100;
	
}  else {
	
	$price_size_19 = 0;
	$price_size_21 = 0;
	$price_size_23 = 0;
	$price_size_25 = 0;
	$price_size_27 = 0;
	$price_size_29 = 0;
	
}

$price_size_30 = $price_size_2 + $price_size_19;
$price_size_31 = $price_size_5 + $price_size_21;
$price_size_32 = $price_size_8 + $price_size_23;
$price_size_33 = $price_size_11 + $price_size_25;
$price_size_34 = $price_size_14 + $price_size_27;
$price_size_35 = $price_size_17 + $price_size_29;

$price_size_36 = $price_size_30 + $suits_fabric_price_1;
$price_size_37 = $price_size_31 + $suits_fabric_price_2;
$price_size_38 = $price_size_32 + $suits_fabric_price_3;
$price_size_39 = $price_size_33 + $suits_fabric_price_4;
$price_size_40 = $price_size_34 + $suits_fabric_price_5;
$price_size_41 = $price_size_35 + $suits_fabric_price_6;


/*BUTTON*/
$suits_jacket_button_number = $_POST["suits_jacket_button_number"];

$sql10 = " SELECT price FROM admin_buttons_suits WHERE buttonno = '$suits_jacket_button_number' ";
$query10 = mysql_db_query($dbname, $sql10) or die("Can't Query10");
$row10 = mysql_fetch_array($query10);
$suits_jacket_button_price = $row10["price"];

$suits_pants_button_number = $_POST["suits_pants_button_number"];

$sql11 = " SELECT price FROM admin_buttons_suits WHERE buttonno = '$suits_pants_button_number' ";
$query11 = mysql_db_query($dbname, $sql11) or die("Can't Query11");
$row11 = mysql_fetch_array($query11);
$suits_pants_button_price = $row11["price"];

$suits_pants_back_button = $_POST["suits_pants_back_button"];
$suits_pants_back_button_number = $_POST["suits_pants_back_button_number"];

$suits_button_price = $suits_jacket_button_price + $suits_pants_button_price;

$suits_button_price_1 = $price_size_36 + $suits_button_price;
$suits_button_price_2 = $price_size_37 + $suits_button_price;
$suits_button_price_3 = $price_size_38 + $suits_button_price;
$suits_button_price_4 = $price_size_39 + $suits_button_price;
$suits_button_price_5 = $price_size_40 + $suits_button_price;
$suits_button_price_6 = $price_size_41 + $suits_button_price;

$suits_embroidery_collar_initial_or_name = $_POST["suits_embroidery_collar_initial_or_name"];
if ($suits_embroidery_collar_initial_or_name == "") {
	$suits_embroidery_collar_initial_or_name_price = 0;
} else if ($suits_embroidery_collar_initial_or_name != "") {
	$sqlprice1 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Embroidery Collar Felt' ";
	$queryprice1 = mysql_db_query($dbname, $sqlprice1) or die("Can't QueryPrice1");
	$rowprice1 = mysql_fetch_array($queryprice1);
	$suits_embroidery_collar_initial_or_name_price_extra = $rowprice1["0"];
	$suits_embroidery_collar_initial_or_name_price = $suits_embroidery_collar_initial_or_name_price_extra;
}

$suits_brand = $_POST["suits_brand"];
if ($suits_brand == "0") {
	$suits_brand_price = 0;
} else if ($suits_brand != "0") {
	$sqlprice2 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Jacket Branding' ";
	$queryprice2 = mysql_db_query($dbname, $sqlprice2) or die("Can't QueryPrice2");
	$rowprice2 = mysql_fetch_array($queryprice2);
	$suits_brand_price_extra = $rowprice2["0"];
	$suits_brand_price = $suits_brand_price_extra;
}

$suits_pick_stitch = $_POST["suits_pick_stitch"];
$suits_pick_stitch_sleeves = $_POST["suits_pick_stitch_sleeves"];
if ($suits_pick_stitch == "0") {
	$suits_pick_stitch_sleeves_price = 0;
} else if ($suits_pick_stitch == "1" && $suits_pick_stitch_sleeves != "DEFAULT TONAL") {
	$sqlprice3 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Sleeves Pick Stitch' ";
	$queryprice3 = mysql_db_query($dbname, $sqlprice3) or die("Can't QueryPrice3");
	$rowprice3 = mysql_fetch_array($queryprice3);
	$suits_pick_stitch_sleeves_price_extra = $rowprice3["0"];
	$suits_pick_stitch_sleeves_price = $suits_pick_stitch_sleeves_price_extra;
}

$suits_pick_stitch_vest = $_POST["suits_pick_stitch_vest"];
if ($suits_pick_stitch == "0") {
	$suits_pick_stitch_vest_price = 0;
} else if ($suits_pick_stitch == "1" && $suits_pick_stitch_vest != "DEFAULT TONAL") {
	$sqlprice4 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Vent Pick Stitch' ";
	$queryprice4 = mysql_db_query($dbname, $sqlprice4) or die("Can't QueryPrice4");
	$rowprice4 = mysql_fetch_array($queryprice4);
	$suits_pick_stitch_vest_price_extra = $rowprice4["0"];
	$suits_pick_stitch_vest_price = $suits_pick_stitch_vest_price_extra;
}

$suits_elbow_patch = $_POST["jacket_elbow_patch"];
if ($suits_elbow_patch == "") {
	$suits_elbow_patch_price = 0;
} else if ($suits_elbow_patch != "") {
	$sqlprice5 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Elbow Patch' ";
	$queryprice5 = mysql_db_query($dbname, $sqlprice5) or die("Can't QueryPrice5");
	$rowprice5 = mysql_fetch_array($queryprice5);
	$suits_elbow_patch_price_extra = $rowprice5["0"];
	$suits_elbow_patch_price = $suits_elbow_patch_price_extra;
}

$suits_canvas = $_POST["jacket_canvas"];
if ($suits_canvas != "3") {
	$suits_canvas_price = 0;
} else if ($suits_canvas == "3") {
	$sqlprice6 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Full Canvas' ";
	$queryprice6 = mysql_db_query($dbname, $sqlprice6) or die("Can't QueryPrice6");
	$rowprice6 = mysql_fetch_array($queryprice6);
	$suits_canvas_price_extra = $rowprice6["0"];
	$suits_canvas_price = $suits_canvas_price_extra;
}

$suits_coin_pocket_inside = $_POST["suits_coin_pocket_inside"];
if ($suits_coin_pocket_inside != "1") {
	$suits_coin_pocket_inside_price = 0;
} else if ($suits_coin_pocket_inside == "1") {
	$sqlprice7 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Coin Pocket Inside' ";
	$queryprice7 = mysql_db_query($dbname, $sqlprice7) or die("Can't QueryPrice7");
	$rowprice7 = mysql_fetch_array($queryprice7);
	$suits_coin_pocket_inside_price_extra = $rowprice7["0"];
	$suits_coin_pocket_inside_price = $suits_coin_pocket_inside_price_extra;
}

$suits_suspender_buttons_inside = $_POST["suits_suspender_buttons_inside"];
if ($suits_suspender_buttons_inside != "1") {
	$suits_suspender_buttons_inside_price = 0;
} else if ($suits_suspender_buttons_inside == "1") {
	$sqlprice8 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Suspender Buttons Inside' ";
	$queryprice8 = mysql_db_query($dbname, $sqlprice8) or die("Can't QueryPrice8");
	$rowprice8 = mysql_fetch_array($queryprice8);
	$suits_suspender_buttons_inside_price_extra = $rowprice8["0"];
	$suits_suspender_buttons_inside_price = $suits_suspender_buttons_inside_price_extra;
}

$suits_split_tabs_back = $_POST["suits_split_tabs_back"];
if ($suits_split_tabs_back != "1") {
	$suits_split_tabs_back_price = 0;
} else if ($suits_split_tabs_back == "1") {
	$sqlprice9 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Split Tabs Back' ";
	$queryprice9 = mysql_db_query($dbname, $sqlprice9) or die("Can't QueryPrice9");
	$rowprice9 = mysql_fetch_array($queryprice9);
	$suits_split_tabs_back_price_extra = $rowprice9["0"];
	$suits_split_tabs_back_price = $suits_split_tabs_back_price_extra;
}

$suits_tuxedo_satin = $_POST["suits_tuxedo_satin"];
if ($suits_tuxedo_satin != "1") {
	$suits_tuxedo_satin_price = 0;
} else if ($suits_tuxedo_satin == "1") {
	$sqlprice10 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Tuxedo Satin on Side' ";
	$queryprice10 = mysql_db_query($dbname, $sqlprice10) or die("Can't QueryPrice10");
	$rowprice10 = mysql_fetch_array($queryprice10);
	$suits_tuxedo_satin_price_extra = $rowprice10["0"];
	$suits_tuxedo_satin_price = $suits_tuxedo_satin_price_extra;
}

$suits_tuxedo_satin_waist_band = $_POST["suits_tuxedo_satin_waist_band"];
$suits_internal_waistband_color = $_POST["suits_internal_waistband_color"];
if ($suits_tuxedo_satin_waist_band != "1") {
	$suits_tuxedo_satin_waist_band_price = 0;
} else if ($suits_tuxedo_satin_waist_band == "1") {
	$sqlprice11 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Tuxedo Satin Waist Band' ";
	$queryprice11 = mysql_db_query($dbname, $sqlprice11) or die("Can't QueryPrice11");
	$rowprice11 = mysql_fetch_array($queryprice11);
	$suits_tuxedo_satin_waist_band_price_extra = $rowprice11["0"];
	$suits_tuxedo_satin_waist_band_price = $suits_tuxedo_satin_waist_band_price_extra;
}

$suits_very_extended_waistband = $_POST["suits_very_extended_waistband"];
if ($suits_very_extended_waistband != "0") {
	$suits_very_extended_waistband_price = 0;
} else if ($suits_very_extended_waistband == "0") {
	$sqlprice12 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Very Extended Waistband' ";
	$queryprice12 = mysql_db_query($dbname, $sqlprice12) or die("Can't QueryPrice12");
	$rowprice12 = mysql_fetch_array($queryprice12);
	$suits_very_extended_waistband_price_extra = $rowprice12["0"];
	$suits_very_extended_waistband_price = $suits_very_extended_waistband_price_extra;
}

$suits_pants_brand = $_POST["suits_pants_brand"];
if ($suits_pants_brand == "0") {
	$suits_pants_brand_price = 0;
} else if ($suits_pants_brand != "0") {
	$sqlprice13 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Pants Branding' ";
	$queryprice13 = mysql_db_query($dbname, $sqlprice13) or die("Can't QueryPrice13");
	$rowprice13 = mysql_fetch_array($queryprice13);
	$suits_pants_brand_price_extra = $rowprice13["0"];
	$suits_pants_brand_price = $suits_pants_brand_price_extra;
}

$suits_price_1 = $suits_button_price_1 + $suits_embroidery_collar_initial_or_name_price + $suits_brand_price + $suits_pick_stitch_sleeves_price + $suits_pick_stitch_vest_price + $suits_elbow_patch_price + $suits_canvas_price + $suits_coin_pocket_inside_price + $suits_suspender_buttons_inside_price + $suits_split_tabs_back_price + $suits_tuxedo_satin_price + $suits_tuxedo_satin_waist_band_price + $suits_very_extended_waistband_price + $suits_pants_brand_price;

$suits_price_2 = $suits_button_price_2 + $suits_embroidery_collar_initial_or_name_price + $suits_brand_price + $suits_pick_stitch_sleeves_price + $suits_pick_stitch_vest_price + $suits_elbow_patch_price + $suits_canvas_price + $suits_coin_pocket_inside_price + $suits_suspender_buttons_inside_price + $suits_split_tabs_back_price + $suits_tuxedo_satin_price + $suits_tuxedo_satin_waist_band_price + $suits_very_extended_waistband_price + $suits_pants_brand_price;

$suits_price_3 = $suits_button_price_3 + $suits_embroidery_collar_initial_or_name_price + $suits_brand_price + $suits_pick_stitch_sleeves_price + $suits_pick_stitch_vest_price + $suits_elbow_patch_price + $suits_canvas_price + $suits_coin_pocket_inside_price + $suits_suspender_buttons_inside_price + $suits_split_tabs_back_price + $suits_tuxedo_satin_price + $suits_tuxedo_satin_waist_band_price + $suits_very_extended_waistband_price + $suits_pants_brand_price;

$suits_price_4 = $suits_button_price_4 + $suits_embroidery_collar_initial_or_name_price + $suits_brand_price + $suits_pick_stitch_sleeves_price + $suits_pick_stitch_vest_price + $suits_elbow_patch_price + $suits_canvas_price + $suits_coin_pocket_inside_price + $suits_suspender_buttons_inside_price + $suits_split_tabs_back_price + $suits_tuxedo_satin_price + $suits_tuxedo_satin_waist_band_price + $suits_very_extended_waistband_price + $suits_pants_brand_price;

$suits_price_5 = $suits_button_price_5 + $suits_embroidery_collar_initial_or_name_price + $suits_brand_price + $suits_pick_stitch_sleeves_price + $suits_pick_stitch_vest_price + $suits_elbow_patch_price + $suits_canvas_price + $suits_coin_pocket_inside_price + $suits_suspender_buttons_inside_price + $suits_split_tabs_back_price + $suits_tuxedo_satin_price + $suits_tuxedo_satin_waist_band_price + $suits_very_extended_waistband_price + $suits_pants_brand_price;

$suits_price_6 = $suits_button_price_6 + $suits_embroidery_collar_initial_or_name_price + $suits_brand_price + $suits_pick_stitch_sleeves_price + $suits_pick_stitch_vest_price + $suits_elbow_patch_price + $suits_canvas_price + $suits_coin_pocket_inside_price + $suits_suspender_buttons_inside_price + $suits_split_tabs_back_price + $suits_tuxedo_satin_price + $suits_tuxedo_satin_waist_band_price + $suits_very_extended_waistband_price + $suits_pants_brand_price;

/*MY PRICES*/

$sqlmy4 = " SELECT * FROM admin_fabrics_suits WHERE fabricno = '$suits_fabric_no_1' ";
$querymy4 = mysql_db_query($dbname, $sqlmy4) or die("Can't Querymy4");
$rowmy4 = mysql_fetch_array($querymy4);
$fabrics_my_type = $rowmy4["type"];
$fabrics_my_brand = $rowmy4["brand"];

if ($rowmy4["type"] != '') {

$sqlmy01 = " SELECT `fabrictypereseller_".$id_user."` FROM admin_fabrictype WHERE fabrictype_name = '$fabrics_my_type' AND fabrictype_product = 'Suits' ";
$querymy01 = mysql_db_query($dbname, $sqlmy01) or die("Can't Querymy01");
$rowmy01 = mysql_fetch_array($querymy01);
$suits_fabric_my_price_1 = $rowmy01["0"];

} else if ($rowmy4["brand"] != '') {
	
$sqlmy02 = " SELECT `fabricbrand_".$id_user."` FROM admin_fabricbrand WHERE fabricbrand_name = '$fabrics_my_brand' AND fabricbrand_product = 'Suits' ";
$querymy02 = mysql_db_query($dbname, $sqlmy02) or die("Can't Querymy02");
$rowmy02 = mysql_fetch_array($querymy02);	
$suits_fabric_my_price_1 = $rowmy02["0"];
	
}

$sqlmy5 = " SELECT * FROM admin_fabrics_suits WHERE fabricno = '$suits_fabric_no_2' ";
$querymy5 = mysql_db_query($dbname, $sqlmy5) or die("Can't Querymy5");
$rowmy5 = mysql_fetch_array($querymy5);
$fabrics_my_type = $rowmy5["type"];
$fabrics_my_brand = $rowmy5["brand"];

if ($rowmy5["type"] != '') {

$sqlmy03 = " SELECT `fabrictypereseller_".$id_user."` FROM admin_fabrictype WHERE fabrictype_name = '$fabrics_my_type' AND fabrictype_product = 'Suits' ";
$querymy03 = mysql_db_query($dbname, $sqlmy03) or die("Can't Querymy03");
$rowmy03 = mysql_fetch_array($querymy03);
$suits_fabric_my_price_2 = $rowmy03["0"];

} else if ($rowmy5["brand"] != '') {
	
$sqlmy04 = " SELECT `fabricbrand_".$id_user."` FROM admin_fabricbrand WHERE fabricbrand_name = '$fabrics_my_brand' AND fabricbrand_product = 'Suits' ";
$querymy04 = mysql_db_query($dbname, $sqlmy04) or die("Can't Querymy04");
$rowmy04 = mysql_fetch_array($querymy04);	
$suits_fabric_my_price_2 = $rowmy04["0"];
	
}

$sqlmy6 = " SELECT * FROM admin_fabrics_suits WHERE fabricno = '$suits_fabric_no_3' ";
$querymy6 = mysql_db_query($dbname, $sqlmy6) or die("Can't Querymy6");
$rowmy6 = mysql_fetch_array($querymy6);
$fabrics_my_type = $rowmy6["type"];
$fabrics_my_brand = $rowmy6["brand"];

if ($rowmy6["type"] != '') {

$sqlmy05 = " SELECT `fabrictypereseller_".$id_user."` FROM admin_fabrictype WHERE fabrictype_name = '$fabrics_my_type' AND fabrictype_product = 'Suits' ";
$querymy05 = mysql_db_query($dbname, $sqlmy05) or die("Can't Querymy05");
$rowmy05 = mysql_fetch_array($querymy05);
$suits_fabric_my_price_3 = $rowmy05["0"];

} else if ($rowmy6["brand"] != '') {
	
$sqlmy06 = " SELECT `fabricbrand_".$id_user."` FROM admin_fabricbrand WHERE fabricbrand_name = '$fabrics_my_brand' AND fabricbrand_product = 'Suits' ";
$querymy06 = mysql_db_query($dbname, $sqlmy06) or die("Can't Querymy06");
$rowmy06 = mysql_fetch_array($querymy06);	
$suits_fabric_my_price_3 = $rowmy06["0"];
	
}

$sqlmy7 = " SELECT * FROM admin_fabrics_suits WHERE fabricno = '$suits_fabric_no_4' ";
$querymy7 = mysql_db_query($dbname, $sqlmy7) or die("Can't Querymy7");
$rowmy7 = mysql_fetch_array($querymy7);
$fabrics_my_type = $rowmy7["type"];
$fabrics_my_brand = $rowmy7["brand"];

if ($rowmy7["type"] != '') {

$sqlmy07 = " SELECT `fabrictypereseller_".$id_user."` FROM admin_fabrictype WHERE fabrictype_name = '$fabrics_my_type' AND fabrictype_product = 'Suits' ";
$querymy07 = mysql_db_query($dbname, $sqlmy07) or die("Can't Querymy07");
$rowmy07 = mysql_fetch_array($querymy07);
$suits_fabric_my_price_4 = $rowmy07["0"];

} else if ($rowmy7["brand"] != '') {
	
$sqlmy08 = " SELECT `fabricbrand_".$id_user."` FROM admin_fabricbrand WHERE fabricbrand_name = '$fabrics_my_brand' AND fabricbrand_product = 'Suits' ";
$querymy08 = mysql_db_query($dbname, $sqlmy08) or die("Can't Querymy08");
$rowmy08 = mysql_fetch_array($querymy08);	
$suits_fabric_my_price_4 = $rowmy08["0"];
	
}

$sqlmy8 = " SELECT * FROM admin_fabrics_suits WHERE fabricno = '$suits_fabric_no_5' ";
$querymy8 = mysql_db_query($dbname, $sqlmy8) or die("Can't Querymy8");
$rowmy8 = mysql_fetch_array($querymy8);
$fabrics_my_type = $rowmy8["type"];
$fabrics_my_brand = $rowmy8["brand"];

if ($rowmy8["type"] != '') {

$sqlmy09 = " SELECT `fabrictypereseller_".$id_user."` FROM admin_fabrictype WHERE fabrictype_name = '$fabrics_my_type' AND fabrictype_product = 'Suits' ";
$querymy09 = mysql_db_query($dbname, $sqlmy09) or die("Can't Querymy09");
$rowmy09 = mysql_fetch_array($querymy09);
$suits_fabric_my_price_5 = $rowmy09["0"];

} else if ($rowmy8["brand"] != '') {
	
$sqlmy010 = " SELECT `fabricbrand_".$id_user."` FROM admin_fabricbrand WHERE fabricbrand_name = '$fabrics_my_brand' AND fabricbrand_product = 'Suits' ";
$querymy010 = mysql_db_query($dbname, $sqlmy010) or die("Can't Querymy010");
$rowmy010 = mysql_fetch_array($querymy010);	
$suits_fabric_my_price_5 = $rowmy010["0"];
	
}

$sqlmy9 = " SELECT * FROM admin_fabrics_suits WHERE fabricno = '$suits_fabric_no_6' ";
$querymy9 = mysql_db_query($dbname, $sqlmy9) or die("Can't Querymy9");
$rowmy9 = mysql_fetch_array($querymy9);
$fabrics_my_type = $rowmy9["type"];
$fabrics_my_brand = $rowmy9["brand"];

if ($rowmy9["type"] != '') {

$sqlmy011 = " SELECT `fabrictypereseller_".$id_user."` FROM admin_fabrictype WHERE fabrictype_name = '$fabrics_my_type' AND fabrictype_product = 'Suits' ";
$querymy011 = mysql_db_query($dbname, $sqlmy011) or die("Can't Querymy011");
$rowmy011 = mysql_fetch_array($querymy011);
$suits_fabric_my_price_6 = $rowmy011["0"];

} else if ($rowmy9["brand"] != '') {
	
$sqlmy012 = " SELECT `fabricbrand_".$id_user."` FROM admin_fabricbrand WHERE fabricbrand_name = '$fabrics_my_brand' AND fabricbrand_product = 'Suits' ";
$querymy012 = mysql_db_query($dbname, $sqlmy012) or die("Can't Querymy012");
$rowmy012 = mysql_fetch_array($querymy012);	
$suits_fabric_my_price_6 = $rowmy012["0"];
	
}

/*OTHER PRICING PARAMETERS*/
$suits_jacket_measurement_chest = $_POST["suits_jacket_measurement_chest"];
$suits_jacket_measurement_waist_only = $_POST["suits_jacket_measurement_waist_only"];
$suits_jacket_measurement_hips = $_POST["suits_jacket_measurement_hips"];

if (($suits_jacket_measurement_chest >= '50' && $suits_jacket_measurement_chest <= '52') || ($suits_jacket_measurement_waist_only >= '50' && $suits_jacket_measurement_waist_only <= '52') || ($suits_jacket_measurement_hips >= '50' && $suits_jacket_measurement_hips <= '52')) {
	
	$price_my_size_1 = $suits_fabric_my_price_1 * 20;
	$price_my_size_2 = $price_my_size_1 / 100;
	
	$price_my_size_4 = $suits_fabric_my_price_2 * 20;
	$price_my_size_5 = $price_my_size_4 / 100;
	
	$price_my_size_7 = $suits_fabric_my_price_3 * 20;
	$price_my_size_8 = $price_my_size_7 / 100;
	
	$price_my_size_10 = $suits_fabric_my_price_4 * 20;
	$price_my_size_11 = $price_my_size_10 / 100;
	
	$price_my_size_13 = $suits_fabric_my_price_5 * 20;
	$price_my_size_14 = $price_my_size_13 / 100;
	
	$price_my_size_16 = $suits_fabric_my_price_6 * 20;
	$price_my_size_17 = $price_my_size_16 / 100;
	
} else if (($suits_jacket_measurement_chest >= '52.5' && $suits_jacket_measurement_chest <= '56') || ($suits_jacket_measurement_waist_only >= '52.5' && $suits_jacket_measurement_waist_only <= '56') || ($suits_jacket_measurement_hips >= '52.5' && $suits_jacket_measurement_hips <= '56')) {
	
	$price_my_size_1 = $suits_fabric_my_price_1 * 30;
	$price_my_size_2 = $price_my_size_1 / 100;
	
	$price_my_size_4 = $suits_fabric_my_price_2 * 30;
	$pric_mye_size_5 = $price_my_size_4 / 100;
	
	$price_my_size_7 = $suits_fabric_my_price_3 * 30;
	$price_my_size_8 = $price_my_size_7 / 100;
	
	$price_my_size_10 = $suits_fabric_my_price_4 * 30;
	$price_my_size_11 = $price_my_size_10 / 100;
	
	$price_my_size_13 = $suits_fabric_my_price_5 * 30;
	$price_my_size_14 = $price_my_size_13 / 100;
	
	$price_my_size_16 = $suits_fabric_my_price_6 * 30;
	$price_my_size_17 = $price_my_size_16 / 100;
	
} else if (($suits_jacket_measurement_chest >= '56.5' && $suits_jacket_measurement_chest <= '60') || ($suits_jacket_measurement_waist_only >= '56.5' && $suits_jacket_measurement_waist_only <= '60') || ($suits_jacket_measurement_hips >= '56.5' && $suits_jacket_measurement_hips <= '60')) {
	
	$price_my_size_1 = $suits_fabric_my_price_1 * 40;
	$price_my_size_2 = $price_my_size_1 / 100;
	
	$price_my_size_4 = $suits_fabric_my_price_2 * 40;
	$price_my_size_5 = $price_my_size_4 / 100;
	
	$price_my_size_7 = $suits_fabric_my_price_3 * 40;
	$price_my_size_8 = $price_my_size_7 / 100;
	
	$price_my_size_10 = $suits_fabric_my_price_4 * 40;
	$price_my_size_11 = $price_my_size_10 / 100;
	
	$price_my_size_13 = $suits_fabric_my_price_5 * 40;
	$price_my_size_14 = $price_my_size_13 / 100;
	
	$price_my_size_16 = $suits_fabric_my_price_6 * 40;
	$price_my_size_17 = $price_my_size_16 / 100;
	
} else if (($suits_jacket_measurement_chest >= '60.5' && $suits_jacket_measurement_chest <= '64') || ($suits_jacket_measurement_waist_only >= '60.5' && $suits_jacket_measurement_waist_only <= '64') || ($suits_jacket_measurement_hips >= '60.5' && $suits_jacket_measurement_hips <= '64')) {
	
	$price_my_size_1 = $suits_fabric_my_price_1 * 50;
	$price_my_size_2 = $price_my_size_1 / 100;
	
	$price_my_size_4 = $suits_fabric_my_price_2 * 50;
	$price_my_size_5 = $price_my_size_4 / 100;
	
	$price_my_size_7 = $suits_fabric_my_price_3 * 50;
	$price_my_size_8 = $price_my_size_7 / 100;
	
	$price_my_size_10 = $suits_fabric_my_price_4 * 50;
	$price_my_size_11 = $price_my_size_10 / 100;
	
	$price_my_size_13 = $suits_fabric_my_price_5 * 50;
	$price_my_size_14 = $price_my_size_13 / 100;
	
	$price_my_size_16 = $suits_fabric_my_price_6 * 50;
	$price_my_size_17 = $price_my_size_16 / 100;
	
} else if (($suits_jacket_measurement_chest >= '64.5' && $suits_jacket_measurement_chest <= '68') || ($suits_jacket_measurement_waist_only >= '64.5' && $suits_jacket_measurement_waist_only <= '68') || ($suits_jacket_measurement_hips >= '64.5' && $suits_jacket_measurement_hips <= '68')) {
	
	$price_my_size_1 = $suits_fabric_my_price_1 * 60;
	$price_my_size_2 = $price_my_size_1 / 100;
	
	$price_my_size_4 = $suits_fabric_my_price_2 * 60;
	$price_my_size_5 = $price_my_size_4 / 100;
	
	$price_my_size_7 = $suits_fabric_my_price_3 * 60;
	$price_my_size_8 = $price_my_size_7 / 100;
	
	$price_my_size_10 = $suits_fabric_my_price_4 * 60;
	$price_my_size_11 = $price_my_size_10 / 100;
	
	$price_my_size_13 = $suits_fabric_my_price_5 * 60;
	$price_my_size_14 = $price_my_size_13 / 100;
	
	$price_my_size_16 = $suits_fabric_my_price_6 * 60;
	$price_my_size_17 = $price_my_size_16 / 100;
	
}  else {
	
	$price_my_size_2 = 0;
	$price_my_size_5 = 0;
	$price_my_size_8 = 0;
	$price_my_size_11 = 0;
	$price_my_size_14 = 0;
	$price_my_size_17 = 0;
	
}

$suits_pants_measurement_waist = $_POST["suits_pants_measurement_waist"];
$suits_pants_measurement_hips = $_POST["suits_pants_measurement_hips"];

if (($suits_pants_measurement_waist >= '50' && $suits_pants_measurement_waist <= '52') || ($suits_pants_measurement_hips >= '50' && $suits_pants_measurement_hips <= '52')) {
	
	$price_my_size_18 = $suits_fabric_my_price_1 * 20;
	$price_my_size_19 = $price_my_size_18 / 100;
	
	$price_my_size_20 = $suits_fabric_my_price_2 * 20;
	$price_my_size_21 = $price_my_size_20 / 100;
	
	$price_my_size_22 = $suits_fabric_my_price_3 * 20;
	$price_my_size_23 = $price_my_size_22 / 100;
	
	$price_my_size_24 = $suits_fabric_my_price_4 * 20;
	$price_my_size_25 = $suits_my_size_24 / 100;
	
	$price_my_size_26 = $suits_fabric_my_price_5 * 20;
	$price_my_size_27 = $price_my_size_26 / 100;
	
	$price_my_size_28 = $suits_fabric_my_price_6 * 20;
	$price_my_size_29 = $price_my_size_28 / 100;
	
} else if (($suits_pants_measurement_waist >= '52.5' && $suits_pants_measurement_waist <= '56') || ($suits_pants_measurement_hips >= '52.5' && $suits_pants_measurement_hips <= '56')) {
	
	$price_my_size_18 = $suits_fabric_my_price_1 * 30;
	$price_my_size_19 = $price_my_size_18 / 100;
	
	$price_my_size_20 = $suits_fabric_my_price_2 * 30;
	$price_my_size_21 = $price_my_size_20 / 100;
	
	$price_my_size_22 = $suits_fabric_my_price_3 * 30;
	$price_my_size_23 = $price_my_size_22 / 100;
	
	$price_my_size_24 = $suits_fabric_my_price_4 * 30;
	$price_my_size_25 = $suits_my_size_24 / 100;
	
	$price_my_size_26 = $suits_fabric_my_price_5 * 30;
	$price_my_size_27 = $price_my_size_26 / 100;
	
	$price_my_size_28 = $suits_fabric_my_price_6 * 30;
	$price_my_size_29 = $price_my_size_28 / 100;
	
} else if (($suits_pants_measurement_waist >= '56.5' && $suits_pants_measurement_waist <= '60') || ($suits_pants_measurement_hips >= '56.5' && $suits_pants_measurement_hips <= '60')) {
	
	$price_my_size_18 = $suits_fabric_my_price_1 * 40;
	$price_my_size_19 = $price_my_size_18 / 100;
	
	$price_my_size_20 = $suits_fabric_my_price_2 * 40;
	$price_my_size_21 = $price_my_size_20 / 100;
	
	$price_my_size_22 = $suits_fabric_my_price_3 * 40;
	$price_my_size_23 = $price_my_size_22 / 100;
	
	$price_my_size_24 = $suits_fabric_my_price_4 * 40;
	$price_my_size_25 = $suits_my_size_24 / 100;
	
	$price_my_size_26 = $suits_fabric_my_price_5 * 40;
	$price_my_size_27 = $price_my_size_26 / 100;
	
	$price_my_size_28 = $suits_fabric_my_price_6 * 40;
	$price_my_size_29 = $price_my_size_28 / 100;
	
} else if (($suits_pants_measurement_waist >= '60.5' && $suits_pants_measurement_waist <= '64') || ($suits_pants_measurement_hips >= '60.5' && $suits_pants_measurement_hips <= '64')) {
	
	$price_my_size_18 = $suits_fabric_my_price_1 * 50;
	$price_my_size_19 = $price_my_size_18 / 100;
	
	$price_my_size_20 = $suits_fabric_my_price_2 * 50;
	$price_my_size_21 = $price_my_size_20 / 100;
	
	$price_my_size_22 = $suits_fabric_my_price_3 * 50;
	$price_my_size_23 = $price_my_size_22 / 100;
	
	$price_my_size_24 = $suits_fabric_my_price_4 * 50;
	$price_my_size_25 = $suits_my_size_24 / 100;
	
	$price_my_size_26 = $suits_fabric_my_price_5 * 50;
	$price_my_size_27 = $price_my_size_26 / 100;
	
	$price_my_size_28 = $suits_fabric_my_price_6 * 50;
	$price_my_size_29 = $price_my_size_28 / 100;
	
} else if (($suits_pants_measurement_waist >= '64.5' && $suits_pants_measurement_waist <= '68') || ($suits_pants_measurement_hips >= '64.5' && $suits_pants_measurement_hips <= '68')) {
	
	$price_my_size_18 = $suits_fabric_my_price_1 * 60;
	$price_my_size_19 = $price_my_size_18 / 100;
	
	$price_my_size_20 = $suits_fabric_my_price_2 * 60;
	$price_my_size_21 = $price_my_size_20 / 100;
	
	$price_my_size_22 = $suits_fabric_my_price_3 * 60;
	$price_my_size_23 = $price_my_size_22 / 100;
	
	$price_my_size_24 = $suits_fabric_my_price_4 * 60;
	$price_my_size_25 = $suits_my_size_24 / 100;
	
	$price_my_size_26 = $suits_fabric_my_price_5 * 60;
	$price_my_size_27 = $price_my_size_26 / 100;
	
	$price_my_size_28 = $suits_fabric_my_price_6 * 60;
	$price_my_size_29 = $price_my_size_28 / 100;
	
}  else {
	
	$price_my_size_19 = 0;
	$price_my_size_21 = 0;
	$price_my_size_23 = 0;
	$price_my_size_25 = 0;
	$price_my_size_27 = 0;
	$price_my_size_29 = 0;
	
}

$price_my_size_30 = $price_my_size_2 + $price_my_size_19;
$price_my_size_31 = $price_my_size_5 + $price_my_size_21;
$price_my_size_32 = $price_my_size_8 + $price_my_size_23;
$price_my_size_33 = $price_my_size_11 + $price_my_size_25;
$price_my_size_34 = $price_my_size_14 + $price_my_size_27;
$price_my_size_35 = $price_my_size_17 + $price_my_size_29;

$price_my_size_36 = $price_my_size_30 + $suits_fabric_my_price_1;
$price_my_size_37 = $price_my_size_31 + $suits_fabric_my_price_2;
$price_my_size_38 = $price_my_size_32 + $suits_fabric_my_price_3;
$price_my_size_39 = $price_my_size_33 + $suits_fabric_my_price_4;
$price_my_size_40 = $price_my_size_34 + $suits_fabric_my_price_5;
$price_my_size_41 = $price_my_size_35 + $suits_fabric_my_price_6;


/*BUTTON*/
$suits_jacket_button_number = $_POST["suits_jacket_button_number"];

$sql10 = " SELECT price FROM admin_buttons_suits WHERE buttonno = '$suits_jacket_button_number' ";
$query10 = mysql_db_query($dbname, $sql10) or die("Can't Query10");
$row10 = mysql_fetch_array($query10);
$suits_jacket_button_my_price = $row10["price"];

$suits_pants_button_number = $_POST["suits_pants_button_number"];

$sql11 = " SELECT price FROM admin_buttons_suits WHERE buttonno = '$suits_pants_button_number' ";
$query11 = mysql_db_query($dbname, $sql11) or die("Can't Query11");
$row11 = mysql_fetch_array($query11);
$suits_pants_button_my_price = $row11["price"];

$suits_pants_back_button = $_POST["suits_pants_back_button"];
$suits_pants_back_button_number = $_POST["suits_pants_back_button_number"];

$suits_button_my_price = $suits_jacket_button_my_price + $suits_pants_button_my_price;

$suits_button_my_price_1 = $price_my_size_36 + $suits_button_my_price;
$suits_button_my_price_2 = $price_my_size_37 + $suits_button_my_price;
$suits_button_my_price_3 = $price_my_size_38 + $suits_button_my_price;
$suits_button_my_price_4 = $price_my_size_39 + $suits_button_my_price;
$suits_button_my_price_5 = $price_my_size_40 + $suits_button_my_price;
$suits_button_my_price_6 = $price_my_size_41 + $suits_button_my_price;

$suits_embroidery_collar_initial_or_name = $_POST["suits_embroidery_collar_initial_or_name"];
if ($suits_embroidery_collar_initial_or_name == "") {
	$suits_embroidery_collar_initial_or_name_price = 0;
} else if ($suits_embroidery_collar_initial_or_name != "") {
	$sqlprice1 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Embroidery Collar Felt' ";
	$queryprice1 = mysql_db_query($dbname, $sqlprice1) or die("Can't QueryPrice1");
	$rowprice1 = mysql_fetch_array($queryprice1);
	$suits_embroidery_collar_initial_or_name_my_price_extra = $rowprice1["0"];
	$suits_embroidery_collar_initial_or_name_my_price = $suits_embroidery_collar_initial_or_name_my_price_extra;
}

$suits_brand = $_POST["suits_brand"];
if ($suits_brand == "0") {
	$suits_brand_price = 0;
} else if ($suits_brand != "0") {
	$sqlprice2 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Jacket Branding' ";
	$queryprice2 = mysql_db_query($dbname, $sqlprice2) or die("Can't QueryPrice2");
	$rowprice2 = mysql_fetch_array($queryprice2);
	$suits_brand_my_price_extra = $rowprice2["0"];
	$suits_brand_my_price = $suits_brand_my_price_extra;
}

$suits_pick_stitch = $_POST["suits_pick_stitch"];
$suits_pick_stitch_sleeves = $_POST["suits_pick_stitch_sleeves"];
if ($suits_pick_stitch == "0") {
	$suits_pick_stitch_sleeves_price = 0;
} else if ($suits_pick_stitch == "1" && $suits_pick_stitch_sleeves != "DEFAULT TONAL") {
	$sqlprice3 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Sleeves Pick Stitch' ";
	$queryprice3 = mysql_db_query($dbname, $sqlprice3) or die("Can't QueryPrice3");
	$rowprice3 = mysql_fetch_array($queryprice3);
	$suits_pick_stitch_sleeves_my_price_extra = $rowprice3["0"];
	$suits_pick_stitch_sleeves_my_price = $suits_pick_stitch_sleeves_my_price_extra;
}

$suits_pick_stitch_vest = $_POST["suits_pick_stitch_vest"];
if ($suits_pick_stitch == "0") {
	$suits_pick_stitch_vest_price = 0;
} else if ($suits_pick_stitch == "1" && $suits_pick_stitch_vest != "DEFAULT TONAL") {
	$sqlprice4 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Vent Pick Stitch' ";
	$queryprice4 = mysql_db_query($dbname, $sqlprice4) or die("Can't QueryPrice4");
	$rowprice4 = mysql_fetch_array($queryprice4);
	$suits_pick_stitch_vest_my_price_extra = $rowprice4["0"];
	$suits_pick_stitch_vest_my_price = $suits_pick_stitch_vest_my_price_extra;
}

$suits_elbow_patch = $_POST["jacket_elbow_patch"];
if ($suits_elbow_patch == "") {
	$suits_elbow_patch_price = 0;
} else if ($suits_elbow_patch != "") {
	$sqlprice5 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Elbow Patch' ";
	$queryprice5 = mysql_db_query($dbname, $sqlprice5) or die("Can't QueryPrice5");
	$rowprice5 = mysql_fetch_array($queryprice5);
	$suits_elbow_patch_my_price_extra = $rowprice5["0"];
	$suits_elbow_patch_my_price = $suits_elbow_patch_my_price_extra;
}

$suits_canvas = $_POST["jacket_canvas"];
if ($suits_canvas != "3") {
	$suits_canvas_price = 0;
} else if ($suits_canvas == "3") {
	$sqlprice6 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Full Canvas' ";
	$queryprice6 = mysql_db_query($dbname, $sqlprice6) or die("Can't QueryPrice6");
	$rowprice6 = mysql_fetch_array($queryprice6);
	$suits_canvas_my_price_extra = $rowprice6["0"];
	$suits_canvas_my_price = $suits_canvas_my_price_extra;
}

$suits_coin_pocket_inside = $_POST["suits_coin_pocket_inside"];
if ($suits_coin_pocket_inside != "1") {
	$suits_coin_pocket_inside_price = 0;
} else if ($suits_coin_pocket_inside == "1") {
	$sqlprice7 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Coin Pocket Inside' ";
	$queryprice7 = mysql_db_query($dbname, $sqlprice7) or die("Can't QueryPrice7");
	$rowprice7 = mysql_fetch_array($queryprice7);
	$suits_coin_pocket_inside_my_price_extra = $rowprice7["0"];
	$suits_coin_pocket_inside_my_price = $suits_coin_pocket_inside_my_price_extra;
}

$suits_suspender_buttons_inside = $_POST["suits_suspender_buttons_inside"];
if ($suits_suspender_buttons_inside != "1") {
	$suits_suspender_buttons_inside_price = 0;
} else if ($suits_suspender_buttons_inside == "1") {
	$sqlprice8 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Suspender Buttons Inside' ";
	$queryprice8 = mysql_db_query($dbname, $sqlprice8) or die("Can't QueryPrice8");
	$rowprice8 = mysql_fetch_array($queryprice8);
	$suits_suspender_buttons_inside_my_price_extra = $rowprice8["0"];
	$suits_suspender_buttons_inside_my_price = $suits_suspender_buttons_inside_my_price_extra;
}

$suits_split_tabs_back = $_POST["suits_split_tabs_back"];
if ($suits_split_tabs_back != "1") {
	$suits_split_tabs_back_price = 0;
} else if ($suits_split_tabs_back == "1") {
	$sqlprice9 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Split Tabs Back' ";
	$queryprice9 = mysql_db_query($dbname, $sqlprice9) or die("Can't QueryPrice9");
	$rowprice9 = mysql_fetch_array($queryprice9);
	$suits_split_tabs_back_my_price_extra = $rowprice9["0"];
	$suits_split_tabs_back_my_price = $suits_split_tabs_back_my_price_extra;
}

$suits_tuxedo_satin = $_POST["suits_tuxedo_satin"];
if ($suits_tuxedo_satin != "1") {
	$suits_tuxedo_satin_price = 0;
} else if ($suits_tuxedo_satin == "1") {
	$sqlprice10 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Tuxedo Satin on Side' ";
	$queryprice10 = mysql_db_query($dbname, $sqlprice10) or die("Can't QueryPrice10");
	$rowprice10 = mysql_fetch_array($queryprice10);
	$suits_tuxedo_satin_my_price_extra = $rowprice10["0"];
	$suits_tuxedo_satin_my_price = $suits_tuxedo_satin_my_price_extra;
}

$suits_tuxedo_satin_waist_band = $_POST["suits_tuxedo_satin_waist_band"];
$suits_internal_waistband_color = $_POST["suits_internal_waistband_color"];
if ($suits_tuxedo_satin_waist_band != "1") {
	$suits_tuxedo_satin_waist_band_price = 0;
} else if ($suits_tuxedo_satin_waist_band == "1") {
	$sqlprice11 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Tuxedo Satin Waist Band' ";
	$queryprice11 = mysql_db_query($dbname, $sqlprice11) or die("Can't QueryPrice11");
	$rowprice11 = mysql_fetch_array($queryprice11);
	$suits_tuxedo_satin_waist_band_my_price_extra = $rowprice11["0"];
	$suits_tuxedo_satin_waist_band_my_price = $suits_tuxedo_satin_waist_band_my_price_extra;
}

$suits_very_extended_waistband = $_POST["suits_very_extended_waistband"];
if ($suits_very_extended_waistband != "0") {
	$suits_very_extended_waistband_price = 0;
} else if ($suits_very_extended_waistband == "0") {
	$sqlprice12 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Very Extended Waistband' ";
	$queryprice12 = mysql_db_query($dbname, $sqlprice12) or die("Can't QueryPrice12");
	$rowprice12 = mysql_fetch_array($queryprice12);
	$suits_very_extended_waistband_my_price_extra = $rowprice12["0"];
	$suits_very_extended_waistband_my_price = $suits_very_extended_waistband_my_price_extra;
}

$suits_pants_brand = $_POST["suits_pants_brand"];
if ($suits_pants_brand == "0") {
	$suits_pants_brand_price = 0;
} else if ($suits_pants_brand != "0") {
	$sqlprice13 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Pants Branding' ";
	$queryprice13 = mysql_db_query($dbname, $sqlprice13) or die("Can't QueryPrice13");
	$rowprice13 = mysql_fetch_array($queryprice13);
	$suits_pants_brand_my_price_extra = $rowprice13["0"];
	$suits_pants_brand_my_price = $suits_pants_brand_my_price_extra;
}

$suits_my_price_1 = $suits_button_my_price_1 + $suits_embroidery_collar_initial_or_name_my_price + $suits_brand_my_price + $suits_pick_stitch_sleeves_my_price + $suits_pick_stitch_vest_my_price + $suits_elbow_patch_my_price + $suits_canvas_my_price + $suits_coin_pocket_inside_my_price + $suits_suspender_buttons_inside_my_price + $suits_split_tabs_back_my_price + $suits_tuxedo_satin_my_price + $suits_tuxedo_satin_waist_band_my_price + $suits_very_extended_waistband_my_price + $suits_pants_brand_my_price;

$suits_my_price_2 = $suits_button_my_price_2 + $suits_embroidery_collar_initial_or_name_my_price + $suits_brand_my_price + $suits_pick_stitch_sleeves_my_price + $suits_pick_stitch_vest_my_price + $suits_elbow_patch_my_price + $suits_canvas_my_price + $suits_coin_pocket_inside_my_price + $suits_suspender_buttons_inside_my_price + $suits_split_tabs_back_my_price + $suits_tuxedo_satin_my_price + $suits_tuxedo_satin_waist_band_my_price + $suits_very_extended_waistband_my_price + $suits_pants_brand_my_price;

$suits_my_price_3 = $suits_button_my_price_3 + $suits_embroidery_collar_initial_or_name_my_price + $suits_brand_my_price + $suits_pick_stitch_sleeves_my_price + $suits_pick_stitch_vest_my_price + $suits_elbow_patch_my_price + $suits_canvas_my_price + $suits_coin_pocket_inside_my_price + $suits_suspender_buttons_inside_my_price + $suits_split_tabs_back_my_price + $suits_tuxedo_satin_my_price + $suits_tuxedo_satin_waist_band_my_price + $suits_very_extended_waistband_my_price + $suits_pants_brand_my_price;

$suits_my_price_4 = $suits_button_my_price_4 + $suits_embroidery_collar_initial_or_name_my_price + $suits_brand_my_price + $suits_pick_stitch_sleeves_my_price + $suits_pick_stitch_vest_my_price + $suits_elbow_patch_my_price + $suits_canvas_my_price + $suits_coin_pocket_inside_my_price + $suits_suspender_buttons_inside_my_price + $suits_split_tabs_back_my_price + $suits_tuxedo_satin_my_price + $suits_tuxedo_satin_waist_band_my_price + $suits_very_extended_waistband_my_price + $suits_pants_brand_my_price;

$suits_my_price_5 = $suits_button_my_price_5 + $suits_embroidery_collar_initial_or_name_my_price + $suits_brand_my_price + $suits_pick_stitch_sleeves_my_price + $suits_pick_stitch_vest_my_price + $suits_elbow_patch_my_price + $suits_canvas_my_price + $suits_coin_pocket_inside_my_price + $suits_suspender_buttons_inside_my_price + $suits_split_tabs_back_my_price + $suits_tuxedo_satin_my_price + $suits_tuxedo_satin_waist_band_my_price + $suits_very_extended_waistband_my_price + $suits_pants_brand_my_price;

$suits_my_price_6 = $suits_button_my_price_6 + $suits_embroidery_collar_initial_or_name_my_price + $suits_brand_my_price + $suits_pick_stitch_sleeves_my_price + $suits_pick_stitch_vest_my_price + $suits_elbow_patch_my_price + $suits_canvas_my_price + $suits_coin_pocket_inside_my_price + $suits_suspender_buttons_inside_my_price + $suits_split_tabs_back_my_price + $suits_tuxedo_satin_my_price + $suits_tuxedo_satin_waist_band_my_price + $suits_very_extended_waistband_my_price + $suits_pants_brand_my_price;

/*CUSTOMER*/
$suits_customer_name = $_POST["suits_customer_name"];
$suits_order_no = $_POST["suits_order_no"];
$suits_order_date = date("m/d/Y");
$suits_delivery_date = $_POST["suits_delivery_date"];

/*CUSTOMIZE*/
$suits_jacket_style = $_POST["suits_jacket_style"];
$suits_lapel_style = $_POST["suits_lapel_style"];
$suits_lapel_width = $_POST["suits_lapel_width"];
$suits_lapel_color = $_POST["suits_lapel_color"];
$suits_real_lapel_boutonniere = $_POST["suits_real_lapel_boutonniere"];
$suits_vent_style = $_POST["suits_vent_style"];
$suits_pocket_style = $_POST["suits_pocket_style"];
$suits_chest_pocket = $_POST["suits_chest_pocket"];
$suits_shoulder_construction = $_POST["suits_shoulder_construction"];
$suits_sleeve_button = $_POST["suits_sleeve_button"];
$suits_cuff = $_POST["suits_cuff"];
$suits_all_sleevebutton_holes_color = $_POST["suits_all_sleevebutton_holes_color"];
$suits_contrast_last_sleevebutton_holes_color = $_POST["suits_contrast_last_sleevebutton_holes_color"];
$suits_contrast_last_sleevebutton_holes_button = $_POST["suits_contrast_last_sleevebutton_holes_button"];
$suits_lining_style = $_POST["suits_lining_style"];
$suits_canvas = $_POST["suits_canvas"];
$suits_jacket_thread_on_button = $_POST["suits_jacket_thread_on_button"];
$suits_jacket_button_hole_color = $_POST["suits_jacket_button_hole_color"];
$suits_pick_stitch = $_POST["suits_pick_stitch"];
$suits_pick_stitch_lapel_color = $_POST["suits_pick_stitch_lapel_color"];
$suits_pick_stitch_pocket_color = $_POST["suits_pick_stitch_pocket_color"];
$suits_pick_stitch_sleeves = $_POST["suits_pick_stitch_sleeves"];
$suits_pick_stitch_vest = $_POST["suits_pick_stitch_vest"];
$suits_embroidery_inside_initial_or_name = $_POST["suits_embroidery_inside_initial_or_name"];
$suits_embroidery_inside_color = $_POST["suits_embroidery_inside_color"];
$suits_embroidery_inside_design = $_POST["suits_embroidery_inside_design"];
$suits_embroidery_collar_initial_or_name = $_POST["suits_embroidery_collar_initial_or_name"];
$suits_embroidery_collar_color = $_POST["suits_embroidery_collar_color"];
$suits_embroidery_collar_design = $_POST["suits_embroidery_collar_design"];
$suits_brand = $_POST["suits_brand"];
$suits_elbow_patch = $_POST["suits_elbow_patch"];
$suits_collar_felt_color = $_POST["suits_collar_felt_color"];
$suits_front_pleat = $_POST["suits_front_pleat"];
$suits_front_pocket = $_POST["suits_front_pocket"];
$suits_back_pocket = $_POST["suits_back_pocket"];
$suits_no_back_pocket = $_POST["suits_no_back_pocket"];
$suits_pants_thread_on_button = $_POST["suits_pants_thread_on_button"];
$suits_pants_button_hole_color = $_POST["suits_pants_button_hole_color"];
$suits_fastening = $_POST["suits_fastening"];
$suits_fly_option = $_POST["suits_fly_option"];
$suits_fly_option_zip = $_POST["suits_fly_option_zip"];
$suits_band_edge_style = $_POST["suits_band_edge_style"];
$suits_very_extended_waistband = $_POST["suits_very_extended_waistband"];
$suits_waistband_width = $_POST["suits_waistband_width"];
$suits_pants_cuff = $_POST["suits_pants_cuff"];
$suits_pants_cuff_width = $_POST["suits_pants_cuff_width"];
$suits_belt = $_POST["suits_belt"];
$suits_pants_lining_style = $_POST["suits_pants_lining_style"];
$suits_embroidery_waist_initial_or_name = $_POST["suits_embroidery_waist_initial_or_name"];
$suits_embroidery_waist_color = $_POST["suits_embroidery_waist_color"];
$suits_embroidery_waist_design = $_POST["suits_embroidery_waist_design"];
$suits_embroidery_cuffs_initial_or_name = $_POST["suits_embroidery_cuffs_initial_or_name"];
$suits_embroidery_cuffs_color = $_POST["suits_embroidery_cuffs_color"];
$suits_embroidery_cuffs_design = $_POST["suits_embroidery_cuffs_design"];
$suits_pants_brand = $_POST["suits_pants_brand"];
$suits_coin_pocket_inside = $_POST["suits_coin_pocket_inside"];
$suits_suspender_buttons_inside = $_POST["suits_suspender_buttons_inside"];
$suits_split_tabs_back = $_POST["suits_split_tabs_back"];
$suits_tuxedo_satin = $_POST["suits_tuxedo_satin"];
$suits_tuxedo_satin_waist_band = $_POST["suits_tuxedo_satin_waist_band"];

/*MEASUREMENTS*/
$suits_jacket_measurement_sex = $_POST["suits_jacket_measurement_sex"];
$suits_jacket_measurement_fit = $_POST["suits_jacket_measurement_fit"];
$suits_jacket_measurement = $_POST["suits_jacket_measurement"];
$suits_jacket_measurement_jacket_length = $_POST["suits_jacket_measurement_jacket_length"];
$suits_jacket_measurement_back_lenght = $_POST["suits_jacket_measurement_back_lenght"];
$suits_jacket_measurement_shoulders = $_POST["suits_jacket_measurement_shoulders"];
$suits_jacket_measurement_neck = $_POST["suits_jacket_measurement_neck"];
$suits_jacket_measurement_ptp_front = $_POST["suits_jacket_measurement_ptp_front"];
$suits_jacket_measurement_ptp_back = $_POST["suits_jacket_measurement_ptp_back"];
$suits_jacket_measurement_arm_hole = $_POST["suits_jacket_measurement_arm_hole"];
$suits_jacket_measurement_biceps = $_POST["suits_jacket_measurement_biceps"];
$suits_jacket_measurement_sleeves_right = $_POST["suits_jacket_measurement_sleeves_right"];
$suits_jacket_measurement_sleeves_left = $_POST["suits_jacket_measurement_sleeves_left"];
$suits_jacket_measurement_wrist_right = $_POST["suits_jacket_measurement_wrist_right"];
$suits_jacket_measurement_wrist_left = $_POST["suits_jacket_measurement_wrist_left"];
$suits_jacket_measurement_first_button = $_POST["suits_jacket_measurement_first_button"];
$suits_jacket_measurement_shoulder_upper_wrist = $_POST["suits_jacket_measurement_shoulder_upper_wrist"];
$suits_jacket_measurement_shoulder_lower_wrist = $_POST["suits_jacket_measurement_shoulder_lower_wrist"];
$suits_pants_measurement_sex = $_POST["suits_pants_measurement_sex"];
$suits_pants_measurement_length = $_POST["suits_pants_measurement_length"];
$suits_pants_measurement_fit = $_POST["suits_pants_measurement_fit"];
$suits_pants_measurement = $_POST["suits_pants_measurement"];
$suits_pants_measurement_crotch_full = $_POST["suits_pants_measurement_crotch_full"];
$suits_pants_measurement_crotch_front = $_POST["suits_pants_measurement_crotch_front"];
$suits_pants_measurement_crotch_back = $_POST["suits_pants_measurement_crotch_back"];
$suits_pants_measurement_inseam_length = $_POST["suits_pants_measurement_inseam_length"];
$suits_pants_measurement_thighs = $_POST["suits_pants_measurement_thighs"];
$suits_pants_measurement_knees = $_POST["suits_pants_measurement_knees"];
$suits_pants_measurement_length_outleg = $_POST["suits_pants_measurement_length_outleg"];
$suits_pants_measurement_front_rise = $_POST["suits_pants_measurement_front_rise"];
$suits_pants_measurement_cuffs = $_POST["suits_pants_measurement_cuffs"];
$suits_measurement_jacket_shoulder = $_POST["suits_measurement_jacket_shoulder"];
$suits_measurement_jacket_waist = $_POST["suits_measurement_jacket_waist"];
$suits_measurement_jacket_chest = $_POST["suits_measurement_jacket_chest"];
$suits_measurement_pants_waist = $_POST["suits_measurement_pants_waist"];
$suits_measurement_pants_bottom = $_POST["suits_measurement_pants_bottom"];
$suits_body_front = $_POST["suits_body_front"];
$suits_body_left = $_POST["suits_body_left"];
$suits_body_right = $_POST["suits_body_right"];
$suits_body_back = $_POST["suits_body_back"];
$suits_jacket_remark = $_POST["suits_jacket_remark"];
$suits_pants_remark = $_POST["suits_pants_remark"];

/*ECT*/
$suits_date = date("m/d/Y");
$suits_time = date("H:i:s");
$suits_ip = $_POST['ip'];
$suits_status = T;

/*FABRIC 1*/
if ($suits_fabric_no_1 != "" && $suits_lining_no_1 != "") {

$sql12 = " SELECT MAX(id) FROM customize_order ";
$query12 = mysql_db_query($dbname, $sql12) or die("Can't Query12");
$row12 = mysql_fetch_array($query12);
$id_order = $row12[0] + 1 ;

$sql13 =	" SELECT MAX(product_id) FROM customize_order";
$query13 = mysql_db_query($dbname, $sql13) or die("Can't Query13");
$row13 = mysql_fetch_array($query13);
$product_id = $row13[0] + 1 ;

$sql14 =	" SELECT MAX(id) FROM customize_suits_design ";
$query14 = mysql_db_query($dbname, $sql14) or die("Can't Query14");
$row14 = mysql_fetch_array($query14);
$id_suits = $row14[0] + 1 ;

$sql15 = " INSERT INTO customize_order (id, order_id, product_id, order_reseller, order_order_no, order_name_customize, order_my_price, order_price, order_product, order_fabric_no, order_date, order_time, order_ip, order_status) VALUES ('$id_order', '$order_id', '$product_id', '$company_user', '$suits_order_no', '$suits_customer_name', '$suits_my_price_1', '$suits_price_1', '$order_product', '$suits_fabric_no_1', '$suits_date', '$suits_time', '$suits_ip', '$suits_status') ";
$query15 = mysql_query($sql15) or die("Can't Query15");

$sql16 = " INSERT INTO customize_suits_design (id, order_id, product_id, suits_customer_name, suits_order_no, suits_order_date, suits_delivery_date, suits_fabric_no, suits_lining_no, suits_jacket_style, suits_lapel_style, suits_lapel_width, suits_lapel_color, suits_real_lapel_boutonniere, suits_vent_style, suits_pocket_style, suits_chest_pocket, suits_shoulder_construction, suits_sleeve_button, suits_cuff, suits_all_sleevebutton_holes_color, suits_contrast_last_sleevebutton_holes_color, suits_contrast_last_sleevebutton_holes_button, suits_lining_style, suits_canvas, suits_jacket_button_number, suits_jacket_thread_on_button, suits_jacket_button_hole_color, suits_pick_stitch, suits_pick_stitch_lapel_color, suits_pick_stitch_pocket_color, suits_pick_stitch_sleeves, suits_pick_stitch_vest, suits_embroidery_inside_initial_or_name, suits_embroidery_inside_color, suits_embroidery_inside_design, suits_embroidery_collar_initial_or_name, suits_embroidery_collar_color, suits_embroidery_collar_design, suits_brand, suits_elbow_patch, suits_collar_felt_color, suits_front_pleat, suits_front_pocket, suits_back_pocket, suits_no_back_pocket, suits_pants_back_button, suits_pants_back_button_number, suits_pants_button_number, suits_pants_thread_on_button, suits_pants_button_hole_color, suits_fastening, suits_fly_option, suits_fly_option_zip, suits_band_edge_style, suits_very_extended_waistband, suits_waistband_width, suits_pants_cuff, suits_pants_cuff_width, suits_belt, suits_pants_lining_style, suits_embroidery_waist_initial_or_name, suits_embroidery_waist_color, suits_embroidery_waist_design, suits_embroidery_cuffs_initial_or_name, suits_embroidery_cuffs_color, suits_embroidery_cuffs_design, suits_pants_brand, suits_coin_pocket_inside, suits_suspender_buttons_inside, suits_split_tabs_back, suits_tuxedo_satin, suits_tuxedo_satin_waist_band, suits_internal_waistband_color, suits_date, suits_time, suits_ip, suits_status) VALUES ('$id_suits', '$order_id', '$product_id', '$suits_customer_name', '$suits_order_no', '$suits_order_date', '$suits_delivery_date', '$suits_fabric_no_1', '$suits_lining_no_1', '$suits_jacket_style', '$suits_lapel_style', '$suits_lapel_width', '$suits_lapel_color', '$suits_real_lapel_boutonniere', '$suits_vent_style', '$suits_pocket_style', '$suits_chest_pocket', '$suits_shoulder_construction', '$suits_sleeve_button', '$suits_cuff', '$suits_all_sleevebutton_holes_color', '$suits_contrast_last_sleevebutton_holes_color', '$suits_contrast_last_sleevebutton_holes_button', '$suits_lining_style', '$suits_canvas', '$suits_jacket_button_number', '$suits_jacket_thread_on_button', '$suits_jacket_button_hole_color', '$suits_pick_stitch', '$suits_pick_stitch_lapel_color', '$suits_pick_stitch_pocket_color', '$suits_pick_stitch_sleeves', '$suits_pick_stitch_vest', '$suits_embroidery_inside_initial_or_name', '$suits_embroidery_inside_color', '$suits_embroidery_inside_design', '$suits_embroidery_collar_initial_or_name', '$suits_embroidery_collar_color', '$suits_embroidery_collar_design', '$suits_brand', '$suits_elbow_patch', '$suits_collar_felt_color', '$suits_front_pleat', '$suits_front_pocket', '$suits_back_pocket', '$suits_no_back_pocket', '$suits_pants_back_button', '$suits_pants_back_button_number', '$suits_pants_button_number', '$suits_pants_thread_on_button', '$suits_pants_button_hole_color', '$suits_fastening', '$suits_fly_option', '$suits_fly_option_zip', '$suits_band_edge_style', '$suits_very_extended_waistband', '$suits_waistband_width', '$suits_pants_cuff', '$suits_pants_cuff_width', '$suits_belt', '$suits_pants_lining_style', '$suits_embroidery_waist_initial_or_name', '$suits_embroidery_waist_color', '$suits_embroidery_waist_design', '$suits_embroidery_cuffs_initial_or_name', '$suits_embroidery_cuffs_color', '$suits_embroidery_cuffs_design', '$suits_pants_brand', '$suits_coin_pocket_inside', '$suits_suspender_buttons_inside', '$suits_split_tabs_back', '$suits_tuxedo_satin', '$suits_tuxedo_satin_waist_band', '$suits_internal_waistband_color', '$suits_date', '$suits_time', '$suits_ip', '$suits_status') ";
$query16 = mysql_query($sql16) or die("Can't Query16");

$sql17 = " INSERT INTO customize_suits_measurements (id, order_id, product_id, suits_jacket_measurement_sex, suits_jacket_measurement_fit, suits_jacket_measurement, suits_jacket_measurement_jacket_length, suits_jacket_measurement_back_lenght, suits_jacket_measurement_chest, suits_jacket_measurement_waist_only, suits_jacket_measurement_hips, suits_jacket_measurement_shoulders, suits_jacket_measurement_neck, suits_jacket_measurement_ptp_front, suits_jacket_measurement_ptp_back, suits_jacket_measurement_arm_hole, suits_jacket_measurement_biceps, suits_jacket_measurement_sleeves_right, suits_jacket_measurement_sleeves_left, suits_jacket_measurement_wrist_right, suits_jacket_measurement_wrist_left, suits_jacket_measurement_first_button, suits_jacket_measurement_shoulder_upper_wrist, suits_jacket_measurement_shoulder_lower_wrist, suits_pants_measurement_sex, suits_pants_measurement_length, suits_pants_measurement_fit, suits_pants_measurement, suits_pants_measurement_waist, suits_pants_measurement_hips, suits_pants_measurement_crotch_full, suits_pants_measurement_crotch_front, suits_pants_measurement_crotch_back, suits_pants_measurement_inseam_length, suits_pants_measurement_thighs, suits_pants_measurement_knees, suits_pants_measurement_length_outleg, suits_pants_measurement_front_rise, suits_pants_measurement_cuffs, suits_measurement_jacket_shoulder, suits_measurement_jacket_waist, suits_measurement_jacket_chest, suits_measurement_pants_waist, suits_measurement_pants_bottom, suits_jacket_remark, suits_pants_remark, suits_date, suits_time, suits_ip, suits_status) VALUES ('$id_suits', '$order_id', '$product_id', '$suits_jacket_measurement_sex', '$suits_jacket_measurement_fit', '$suits_jacket_measurement', '$suits_jacket_measurement_jacket_length', '$suits_jacket_measurement_back_lenght', '$suits_jacket_measurement_chest', '$suits_jacket_measurement_waist_only', '$suits_jacket_measurement_hips', '$suits_jacket_measurement_shoulders', '$suits_jacket_measurement_neck', '$suits_jacket_measurement_ptp_front', '$suits_jacket_measurement_ptp_back', '$suits_jacket_measurement_arm_hole', '$suits_jacket_measurement_biceps', '$suits_jacket_measurement_sleeves_right', '$suits_jacket_measurement_sleeves_left', '$suits_jacket_measurement_wrist_right', '$suits_jacket_measurement_wrist_left', '$suits_jacket_measurement_first_button', '$suits_jacket_measurement_shoulder_upper_wrist', '$suits_jacket_measurement_shoulder_lower_wrist', '$suits_pants_measurement_sex', '$suits_pants_measurement_length', '$suits_pants_measurement_fit', '$suits_pants_measurement', '$suits_pants_measurement_waist', '$suits_pants_measurement_hips', '$suits_pants_measurement_crotch_full', '$suits_pants_measurement_crotch_front', '$suits_pants_measurement_crotch_back', '$suits_pants_measurement_inseam_length', '$suits_pants_measurement_thighs', '$suits_pants_measurement_knees', '$suits_pants_measurement_length_outleg', '$suits_pants_measurement_front_rise', '$suits_pants_measurement_cuffs', '$suits_measurement_jacket_shoulder', '$suits_measurement_jacket_waist', '$suits_measurement_jacket_chest', '$suits_measurement_pants_waist', '$suits_measurement_pants_bottom', '$suits_jacket_remark', '$suits_pants_remark', '$suits_date', '$suits_time', '$suits_ip', '$suits_status') ";
$query17 = mysql_query($sql17) or die("Can't Query17");

$path = "../../images/body/suits/front/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['suits_body_front']['name'];
	$tmp = $_FILES['suits_body_front']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$suits_body_front_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$suits_body_front_pic)){
				
				$sql18 = " UPDATE customize_suits_measurements SET suits_body_front = '".$suits_body_front_pic."', suits_date = '".$suits_date."', suits_time = '".$suits_time."', suits_ip = '".$suits_ip."', suits_status = '".$suits_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query18 = mysql_db_query($dbname, $sql18) or die("Can't Query18");
			}
    
	} else {
				$sql18 = " UPDATE customize_suits_measurements SET suits_date = '".$suits_date."', suits_time = '".$suits_time."', suits_ip = '".$suits_ip."', suits_status = '".$suits_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query18 = mysql_db_query($dbname, $sql18) or die("Can't Query18");
			}
	}
	
$path = "../../images/body/suits/left/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['suits_body_left']['name'];
	$tmp = $_FILES['suits_body_left']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$suits_body_left_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$suits_body_left_pic)){
				
				$sql19 = " UPDATE customize_suits_measurements SET suits_body_left = '".$suits_body_left_pic."', suits_date = '".$suits_date."', suits_time = '".$suits_time."', suits_ip = '".$suits_ip."', suits_status = '".$suits_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query19 = mysql_db_query($dbname, $sql19) or die("Can't Query19");
			}
    
	} else {
				$sql19 = " UPDATE customize_suits_measurements SET suits_date = '".$suits_date."', suits_time = '".$suits_time."', suits_ip = '".$suits_ip."', suits_status = '".$suits_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query19 = mysql_db_query($dbname, $sql19) or die("Can't Query19");
			}
	}
	
$path = "../../images/body/suits/right/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['suits_body_right']['name'];
	$tmp = $_FILES['suits_body_right']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$suits_body_right_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$suits_body_right_pic)){
				
				$sql20 = " UPDATE customize_suits_measurements SET suits_body_right = '".$suits_body_right_pic."', suits_date = '".$suits_date."', suits_time = '".$suits_time."', suits_ip = '".$suits_ip."', suits_status = '".$suits_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query20 = mysql_db_query($dbname, $sql20) or die("Can't Query20");
			}
    
	} else {
				$sql20 = " UPDATE customize_suits_measurements SET suits_date = '".$suits_date."', suits_time = '".$suits_time."', suits_ip = '".$suits_ip."', suits_status = '".$suits_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query20 = mysql_db_query($dbname, $sql20) or die("Can't Query20");
			}
	}
	
$path = "../../images/body/suits/back/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['suits_body_back']['name'];
	$tmp = $_FILES['suits_body_back']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$suits_body_back_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$suits_body_back_pic)){
				
				$sql21 = " UPDATE customize_suits_measurements SET suits_body_back = '".$suits_body_back_pic."', suits_date = '".$suits_date."', suits_time = '".$suits_time."', suits_ip = '".$suits_ip."', suits_status = '".$suits_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query21 = mysql_db_query($dbname, $sql21) or die("Can't Query21");
			}
    
	} else {
				$sql21 = " UPDATE customize_suits_measurements SET suits_date = '".$suits_date."', suits_time = '".$suits_time."', suits_ip = '".$suits_ip."', suits_status = '".$suits_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query21 = mysql_db_query($dbname, $sql21) or die("Can't Query21");
			}
	}

} else if ($suits_fabric_no_1 == "" || $suits_lining_no_1 == "") { }

/*FABRIC 2*/
if ($suits_fabric_no_2 != "" && $suits_lining_no_2 != "") {

$sql12 = " SELECT MAX(id) FROM customize_order ";
$query12 = mysql_db_query($dbname, $sql12) or die("Can't Query12");
$row12 = mysql_fetch_array($query12);
$id_order = $row12[0] + 1 ;

$sql13 =	" SELECT MAX(product_id) FROM customize_order";
$query13 = mysql_db_query($dbname, $sql13) or die("Can't Query13");
$row13 = mysql_fetch_array($query13);
$product_id = $row13[0] + 1 ;

$sql14 =	" SELECT MAX(id) FROM customize_suits_design ";
$query14 = mysql_db_query($dbname, $sql14) or die("Can't Query14");
$row14 = mysql_fetch_array($query14);
$id_suits = $row14[0] + 1 ;

$sql15 = " INSERT INTO customize_order (id, order_id, product_id, order_reseller, order_order_no, order_name_customize, order_my_price, order_price, order_product, order_fabric_no, order_date, order_time, order_ip, order_status) VALUES ('$id_order', '$order_id', '$product_id', '$company_user', '$suits_order_no', '$suits_customer_name', '$suits_my_price_2',, '$suits_price_2', '$order_product', '$suits_fabric_no_2', '$suits_date', '$suits_time', '$suits_ip', '$suits_status') ";
$query15 = mysql_query($sql15) or die("Can't Query15");

$sql16 = " INSERT INTO customize_suits_design (id, order_id, product_id, suits_customer_name, suits_order_no, suits_order_date, suits_delivery_date, suits_fabric_no, suits_lining_no, suits_jacket_style, suits_lapel_style, suits_lapel_width, suits_lapel_color, suits_real_lapel_boutonniere, suits_vent_style, suits_pocket_style, suits_chest_pocket, suits_shoulder_construction, suits_sleeve_button, suits_cuff, suits_all_sleevebutton_holes_color, suits_contrast_last_sleevebutton_holes_color, suits_contrast_last_sleevebutton_holes_button, suits_lining_style, suits_canvas, suits_jacket_button_number, suits_jacket_thread_on_button, suits_jacket_button_hole_color, suits_pick_stitch, suits_pick_stitch_lapel_color, suits_pick_stitch_pocket_color, suits_pick_stitch_sleeves, suits_pick_stitch_vest, suits_embroidery_inside_initial_or_name, suits_embroidery_inside_color, suits_embroidery_inside_design, suits_embroidery_collar_initial_or_name, suits_embroidery_collar_color, suits_embroidery_collar_design, suits_brand, suits_elbow_patch, suits_collar_felt_color, suits_front_pleat, suits_front_pocket, suits_back_pocket, suits_no_back_pocket, suits_pants_back_button, suits_pants_back_button_number, suits_pants_button_number, suits_pants_thread_on_button, suits_pants_button_hole_color, suits_fastening, suits_fly_option, suits_fly_option_zip, suits_band_edge_style, suits_very_extended_waistband, suits_waistband_width, suits_pants_cuff, suits_pants_cuff_width, suits_belt, suits_pants_lining_style, suits_embroidery_waist_initial_or_name, suits_embroidery_waist_color, suits_embroidery_waist_design, suits_embroidery_cuffs_initial_or_name, suits_embroidery_cuffs_color, suits_embroidery_cuffs_design, suits_pants_brand, suits_coin_pocket_inside, suits_suspender_buttons_inside, suits_split_tabs_back, suits_tuxedo_satin, suits_tuxedo_satin_waist_band, suits_internal_waistband_color, suits_date, suits_time, suits_ip, suits_status) VALUES ('$id_suits', '$order_id', '$product_id', '$suits_customer_name', '$suits_order_no', '$suits_order_date', '$suits_delivery_date', '$suits_fabric_no_2', '$suits_lining_no_2', '$suits_jacket_style', '$suits_lapel_style', '$suits_lapel_width', '$suits_lapel_color', '$suits_real_lapel_boutonniere', '$suits_vent_style', '$suits_pocket_style', '$suits_chest_pocket', '$suits_shoulder_construction', '$suits_sleeve_button', '$suits_cuff', '$suits_all_sleevebutton_holes_color', '$suits_contrast_last_sleevebutton_holes_color', '$suits_contrast_last_sleevebutton_holes_button', '$suits_lining_style', '$suits_canvas', '$suits_jacket_button_number', '$suits_jacket_thread_on_button', '$suits_jacket_button_hole_color', '$suits_pick_stitch', '$suits_pick_stitch_lapel_color', '$suits_pick_stitch_pocket_color', '$suits_pick_stitch_sleeves', '$suits_pick_stitch_vest', '$suits_embroidery_inside_initial_or_name', '$suits_embroidery_inside_color', '$suits_embroidery_inside_design', '$suits_embroidery_collar_initial_or_name', '$suits_embroidery_collar_color', '$suits_embroidery_collar_design', '$suits_brand', '$suits_elbow_patch', '$suits_collar_felt_color', '$suits_front_pleat', '$suits_front_pocket', '$suits_back_pocket', '$suits_no_back_pocket', '$suits_pants_back_button', '$suits_pants_back_button_number', '$suits_pants_button_number', '$suits_pants_thread_on_button', '$suits_pants_button_hole_color', '$suits_fastening', '$suits_fly_option', '$suits_fly_option_zip', '$suits_band_edge_style', '$suits_very_extended_waistband', '$suits_waistband_width', '$suits_pants_cuff', '$suits_pants_cuff_width', '$suits_belt', '$suits_pants_lining_style', '$suits_embroidery_waist_initial_or_name', '$suits_embroidery_waist_color', '$suits_embroidery_waist_design', '$suits_embroidery_cuffs_initial_or_name', '$suits_embroidery_cuffs_color', '$suits_embroidery_cuffs_design', '$suits_pants_brand', '$suits_coin_pocket_inside', '$suits_suspender_buttons_inside', '$suits_split_tabs_back', '$suits_tuxedo_satin', '$suits_tuxedo_satin_waist_band', '$suits_internal_waistband_color', '$suits_date', '$suits_time', '$suits_ip', '$suits_status') ";
$query16 = mysql_query($sql16) or die("Can't Query16");

$sql17 = " INSERT INTO customize_suits_measurements (id, order_id, product_id, suits_jacket_measurement_sex, suits_jacket_measurement_fit, suits_jacket_measurement, suits_jacket_measurement_jacket_length, suits_jacket_measurement_back_lenght, suits_jacket_measurement_chest, suits_jacket_measurement_waist_only, suits_jacket_measurement_hips, suits_jacket_measurement_shoulders, suits_jacket_measurement_neck, suits_jacket_measurement_ptp_front, suits_jacket_measurement_ptp_back, suits_jacket_measurement_arm_hole, suits_jacket_measurement_biceps, suits_jacket_measurement_sleeves_right, suits_jacket_measurement_sleeves_left, suits_jacket_measurement_wrist_right, suits_jacket_measurement_wrist_left, suits_jacket_measurement_first_button, suits_jacket_measurement_shoulder_upper_wrist, suits_jacket_measurement_shoulder_lower_wrist, suits_pants_measurement_sex, suits_pants_measurement_length, suits_pants_measurement_fit, suits_pants_measurement, suits_pants_measurement_waist, suits_pants_measurement_hips, suits_pants_measurement_crotch_full, suits_pants_measurement_crotch_front, suits_pants_measurement_crotch_back, suits_pants_measurement_inseam_length, suits_pants_measurement_thighs, suits_pants_measurement_knees, suits_pants_measurement_length_outleg, suits_pants_measurement_front_rise, suits_pants_measurement_cuffs, suits_measurement_jacket_shoulder, suits_measurement_jacket_waist, suits_measurement_jacket_chest, suits_measurement_pants_waist, suits_measurement_pants_bottom, suits_jacket_remark, suits_pants_remark, suits_date, suits_time, suits_ip, suits_status) VALUES ('$id_suits', '$order_id', '$product_id', '$suits_jacket_measurement_sex', '$suits_jacket_measurement_fit', '$suits_jacket_measurement', '$suits_jacket_measurement_jacket_length', '$suits_jacket_measurement_back_lenght', '$suits_jacket_measurement_chest', '$suits_jacket_measurement_waist_only', '$suits_jacket_measurement_hips', '$suits_jacket_measurement_shoulders', '$suits_jacket_measurement_neck', '$suits_jacket_measurement_ptp_front', '$suits_jacket_measurement_ptp_back', '$suits_jacket_measurement_arm_hole', '$suits_jacket_measurement_biceps', '$suits_jacket_measurement_sleeves_right', '$suits_jacket_measurement_sleeves_left', '$suits_jacket_measurement_wrist_right', '$suits_jacket_measurement_wrist_left', '$suits_jacket_measurement_first_button', '$suits_jacket_measurement_shoulder_upper_wrist', '$suits_jacket_measurement_shoulder_lower_wrist', '$suits_pants_measurement_sex', '$suits_pants_measurement_length', '$suits_pants_measurement_fit', '$suits_pants_measurement', '$suits_pants_measurement_waist', '$suits_pants_measurement_hips', '$suits_pants_measurement_crotch_full', '$suits_pants_measurement_crotch_front', '$suits_pants_measurement_crotch_back', '$suits_pants_measurement_inseam_length', '$suits_pants_measurement_thighs', '$suits_pants_measurement_knees', '$suits_pants_measurement_length_outleg', '$suits_pants_measurement_front_rise', '$suits_pants_measurement_cuffs', '$suits_measurement_jacket_shoulder', '$suits_measurement_jacket_waist', '$suits_measurement_jacket_chest', '$suits_measurement_pants_waist', '$suits_measurement_pants_bottom', '$suits_jacket_remark', '$suits_pants_remark', '$suits_date', '$suits_time', '$suits_ip', '$suits_status') ";
$query17 = mysql_query($sql17) or die("Can't Query17");

$path = "../../images/body/suits/front/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['suits_body_front']['name'];
	$tmp = $_FILES['suits_body_front']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$suits_body_front_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$suits_body_front_pic)){
				
				$sql18 = " UPDATE customize_suits_measurements SET suits_body_front = '".$suits_body_front_pic."', suits_date = '".$suits_date."', suits_time = '".$suits_time."', suits_ip = '".$suits_ip."', suits_status = '".$suits_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query18 = mysql_db_query($dbname, $sql18) or die("Can't Query18");
			}
    
	} else {
				$sql18 = " UPDATE customize_suits_measurements SET suits_date = '".$suits_date."', suits_time = '".$suits_time."', suits_ip = '".$suits_ip."', suits_status = '".$suits_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query18 = mysql_db_query($dbname, $sql18) or die("Can't Query18");
			}
	}
	
$path = "../../images/body/suits/left/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['suits_body_left']['name'];
	$tmp = $_FILES['suits_body_left']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$suits_body_left_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$suits_body_left_pic)){
				
				$sql19 = " UPDATE customize_suits_measurements SET suits_body_left = '".$suits_body_left_pic."', suits_date = '".$suits_date."', suits_time = '".$suits_time."', suits_ip = '".$suits_ip."', suits_status = '".$suits_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query19 = mysql_db_query($dbname, $sql19) or die("Can't Query19");
			}
    
	} else {
				$sql19 = " UPDATE customize_suits_measurements SET suits_date = '".$suits_date."', suits_time = '".$suits_time."', suits_ip = '".$suits_ip."', suits_status = '".$suits_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query19 = mysql_db_query($dbname, $sql19) or die("Can't Query19");
			}
	}
	
$path = "../../images/body/suits/right/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['suits_body_right']['name'];
	$tmp = $_FILES['suits_body_right']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$suits_body_right_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$suits_body_right_pic)){
				
				$sql20 = " UPDATE customize_suits_measurements SET suits_body_right = '".$suits_body_right_pic."', suits_date = '".$suits_date."', suits_time = '".$suits_time."', suits_ip = '".$suits_ip."', suits_status = '".$suits_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query20 = mysql_db_query($dbname, $sql20) or die("Can't Query20");
			}
    
	} else {
				$sql20 = " UPDATE customize_suits_measurements SET suits_date = '".$suits_date."', suits_time = '".$suits_time."', suits_ip = '".$suits_ip."', suits_status = '".$suits_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query20 = mysql_db_query($dbname, $sql20) or die("Can't Query20");
			}
	}
	
$path = "../../images/body/suits/back/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['suits_body_back']['name'];
	$tmp = $_FILES['suits_body_back']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$suits_body_back_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$suits_body_back_pic)){
				
				$sql21 = " UPDATE customize_suits_measurements SET suits_body_back = '".$suits_body_back_pic."', suits_date = '".$suits_date."', suits_time = '".$suits_time."', suits_ip = '".$suits_ip."', suits_status = '".$suits_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query21 = mysql_db_query($dbname, $sql21) or die("Can't Query21");
			}
    
	} else {
				$sql21 = " UPDATE customize_suits_measurements SET suits_date = '".$suits_date."', suits_time = '".$suits_time."', suits_ip = '".$suits_ip."', suits_status = '".$suits_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query21 = mysql_db_query($dbname, $sql21) or die("Can't Query21");
			}
	}

} else if ($suits_fabric_no_2 == "" || $suits_lining_no_2 == "") { }	

/*FABRIC 3*/
if ($suits_fabric_no_3 != "" && $suits_lining_no_3 != "") {

$sql12 = " SELECT MAX(id) FROM customize_order ";
$query12 = mysql_db_query($dbname, $sql12) or die("Can't Query12");
$row12 = mysql_fetch_array($query12);
$id_order = $row12[0] + 1 ;

$sql13 =	" SELECT MAX(product_id) FROM customize_order";
$query13 = mysql_db_query($dbname, $sql13) or die("Can't Query13");
$row13 = mysql_fetch_array($query13);
$product_id = $row13[0] + 1 ;

$sql14 =	" SELECT MAX(id) FROM customize_suits_design ";
$query14 = mysql_db_query($dbname, $sql14) or die("Can't Query14");
$row14 = mysql_fetch_array($query14);
$id_suits = $row14[0] + 1 ;

$sql15 = " INSERT INTO customize_order (id, order_id, product_id, order_reseller, order_order_no, order_name_customize, order_my_price, order_price, order_product, order_fabric_no, order_date, order_time, order_ip, order_status) VALUES ('$id_order', '$order_id', '$product_id', '$company_user', '$suits_order_no', '$suits_customer_name', '$suits_my_price_3', '$suits_price_3', '$order_product', '$suits_fabric_no_3', '$suits_date', '$suits_time', '$suits_ip', '$suits_status') ";
$query15 = mysql_query($sql15) or die("Can't Query15");

$sql16 = " INSERT INTO customize_suits_design (id, order_id, product_id, suits_customer_name, suits_order_no, suits_order_date, suits_delivery_date, suits_fabric_no, suits_lining_no, suits_jacket_style, suits_lapel_style, suits_lapel_width, suits_lapel_color, suits_real_lapel_boutonniere, suits_vent_style, suits_pocket_style, suits_chest_pocket, suits_shoulder_construction, suits_sleeve_button, suits_cuff, suits_all_sleevebutton_holes_color, suits_contrast_last_sleevebutton_holes_color, suits_contrast_last_sleevebutton_holes_button, suits_lining_style, suits_canvas, suits_jacket_button_number, suits_jacket_thread_on_button, suits_jacket_button_hole_color, suits_pick_stitch, suits_pick_stitch_lapel_color, suits_pick_stitch_pocket_color, suits_pick_stitch_sleeves, suits_pick_stitch_vest, suits_embroidery_inside_initial_or_name, suits_embroidery_inside_color, suits_embroidery_inside_design, suits_embroidery_collar_initial_or_name, suits_embroidery_collar_color, suits_embroidery_collar_design, suits_brand, suits_elbow_patch, suits_collar_felt_color, suits_front_pleat, suits_front_pocket, suits_back_pocket, suits_no_back_pocket, suits_pants_back_button, suits_pants_back_button_number, suits_pants_button_number, suits_pants_thread_on_button, suits_pants_button_hole_color, suits_fastening, suits_fly_option, suits_fly_option_zip, suits_band_edge_style, suits_very_extended_waistband, suits_waistband_width, suits_pants_cuff, suits_pants_cuff_width, suits_belt, suits_pants_lining_style, suits_embroidery_waist_initial_or_name, suits_embroidery_waist_color, suits_embroidery_waist_design, suits_embroidery_cuffs_initial_or_name, suits_embroidery_cuffs_color, suits_embroidery_cuffs_design, suits_pants_brand, suits_coin_pocket_inside, suits_suspender_buttons_inside, suits_split_tabs_back, suits_tuxedo_satin, suits_tuxedo_satin_waist_band, suits_internal_waistband_color, suits_date, suits_time, suits_ip, suits_status) VALUES ('$id_suits', '$order_id', '$product_id', '$suits_customer_name', '$suits_order_no', '$suits_order_date', '$suits_delivery_date', '$suits_fabric_no_3', '$suits_lining_no_3', '$suits_jacket_style', '$suits_lapel_style', '$suits_lapel_width', '$suits_lapel_color', '$suits_real_lapel_boutonniere', '$suits_vent_style', '$suits_pocket_style', '$suits_chest_pocket', '$suits_shoulder_construction', '$suits_sleeve_button', '$suits_cuff', '$suits_all_sleevebutton_holes_color', '$suits_contrast_last_sleevebutton_holes_color', '$suits_contrast_last_sleevebutton_holes_button', '$suits_lining_style', '$suits_canvas', '$suits_jacket_button_number', '$suits_jacket_thread_on_button', '$suits_jacket_button_hole_color', '$suits_pick_stitch', '$suits_pick_stitch_lapel_color', '$suits_pick_stitch_pocket_color', '$suits_pick_stitch_sleeves', '$suits_pick_stitch_vest', '$suits_embroidery_inside_initial_or_name', '$suits_embroidery_inside_color', '$suits_embroidery_inside_design', '$suits_embroidery_collar_initial_or_name', '$suits_embroidery_collar_color', '$suits_embroidery_collar_design', '$suits_brand', '$suits_elbow_patch', '$suits_collar_felt_color', '$suits_front_pleat', '$suits_front_pocket', '$suits_back_pocket', '$suits_no_back_pocket', '$suits_pants_back_button', '$suits_pants_back_button_number', '$suits_pants_button_number', '$suits_pants_thread_on_button', '$suits_pants_button_hole_color', '$suits_fastening', '$suits_fly_option', '$suits_fly_option_zip', '$suits_band_edge_style', '$suits_very_extended_waistband', '$suits_waistband_width', '$suits_pants_cuff', '$suits_pants_cuff_width', '$suits_belt', '$suits_pants_lining_style', '$suits_embroidery_waist_initial_or_name', '$suits_embroidery_waist_color', '$suits_embroidery_waist_design', '$suits_embroidery_cuffs_initial_or_name', '$suits_embroidery_cuffs_color', '$suits_embroidery_cuffs_design', '$suits_pants_brand', '$suits_coin_pocket_inside', '$suits_suspender_buttons_inside', '$suits_split_tabs_back', '$suits_tuxedo_satin', '$suits_tuxedo_satin_waist_band', '$suits_internal_waistband_color', '$suits_date', '$suits_time', '$suits_ip', '$suits_status') ";
$query16 = mysql_query($sql16) or die("Can't Query16");

$sql17 = " INSERT INTO customize_suits_measurements (id, order_id, product_id, suits_jacket_measurement_sex, suits_jacket_measurement_fit, suits_jacket_measurement, suits_jacket_measurement_jacket_length, suits_jacket_measurement_back_lenght, suits_jacket_measurement_chest, suits_jacket_measurement_waist_only, suits_jacket_measurement_hips, suits_jacket_measurement_shoulders, suits_jacket_measurement_neck, suits_jacket_measurement_ptp_front, suits_jacket_measurement_ptp_back, suits_jacket_measurement_arm_hole, suits_jacket_measurement_biceps, suits_jacket_measurement_sleeves_right, suits_jacket_measurement_sleeves_left, suits_jacket_measurement_wrist_right, suits_jacket_measurement_wrist_left, suits_jacket_measurement_first_button, suits_jacket_measurement_shoulder_upper_wrist, suits_jacket_measurement_shoulder_lower_wrist, suits_pants_measurement_sex, suits_pants_measurement_length, suits_pants_measurement_fit, suits_pants_measurement, suits_pants_measurement_waist, suits_pants_measurement_hips, suits_pants_measurement_crotch_full, suits_pants_measurement_crotch_front, suits_pants_measurement_crotch_back, suits_pants_measurement_inseam_length, suits_pants_measurement_thighs, suits_pants_measurement_knees, suits_pants_measurement_length_outleg, suits_pants_measurement_front_rise, suits_pants_measurement_cuffs, suits_measurement_jacket_shoulder, suits_measurement_jacket_waist, suits_measurement_jacket_chest, suits_measurement_pants_waist, suits_measurement_pants_bottom, suits_jacket_remark, suits_pants_remark, suits_date, suits_time, suits_ip, suits_status) VALUES ('$id_suits', '$order_id', '$product_id', '$suits_jacket_measurement_sex', '$suits_jacket_measurement_fit', '$suits_jacket_measurement', '$suits_jacket_measurement_jacket_length', '$suits_jacket_measurement_back_lenght', '$suits_jacket_measurement_chest', '$suits_jacket_measurement_waist_only', '$suits_jacket_measurement_hips', '$suits_jacket_measurement_shoulders', '$suits_jacket_measurement_neck', '$suits_jacket_measurement_ptp_front', '$suits_jacket_measurement_ptp_back', '$suits_jacket_measurement_arm_hole', '$suits_jacket_measurement_biceps', '$suits_jacket_measurement_sleeves_right', '$suits_jacket_measurement_sleeves_left', '$suits_jacket_measurement_wrist_right', '$suits_jacket_measurement_wrist_left', '$suits_jacket_measurement_first_button', '$suits_jacket_measurement_shoulder_upper_wrist', '$suits_jacket_measurement_shoulder_lower_wrist', '$suits_pants_measurement_sex', '$suits_pants_measurement_length', '$suits_pants_measurement_fit', '$suits_pants_measurement', '$suits_pants_measurement_waist', '$suits_pants_measurement_hips', '$suits_pants_measurement_crotch_full', '$suits_pants_measurement_crotch_front', '$suits_pants_measurement_crotch_back', '$suits_pants_measurement_inseam_length', '$suits_pants_measurement_thighs', '$suits_pants_measurement_knees', '$suits_pants_measurement_length_outleg', '$suits_pants_measurement_front_rise', '$suits_pants_measurement_cuffs', '$suits_measurement_jacket_shoulder', '$suits_measurement_jacket_waist', '$suits_measurement_jacket_chest', '$suits_measurement_pants_waist', '$suits_measurement_pants_bottom', '$suits_jacket_remark', '$suits_pants_remark', '$suits_date', '$suits_time', '$suits_ip', '$suits_status') ";
$query17 = mysql_query($sql17) or die("Can't Query17");

$path = "../../images/body/suits/front/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['suits_body_front']['name'];
	$tmp = $_FILES['suits_body_front']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$suits_body_front_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$suits_body_front_pic)){
				
				$sql18 = " UPDATE customize_suits_measurements SET suits_body_front = '".$suits_body_front_pic."', suits_date = '".$suits_date."', suits_time = '".$suits_time."', suits_ip = '".$suits_ip."', suits_status = '".$suits_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query18 = mysql_db_query($dbname, $sql18) or die("Can't Query18");
			}
    
	} else {
				$sql18 = " UPDATE customize_suits_measurements SET suits_date = '".$suits_date."', suits_time = '".$suits_time."', suits_ip = '".$suits_ip."', suits_status = '".$suits_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query18 = mysql_db_query($dbname, $sql18) or die("Can't Query18");
			}
	}
	
$path = "../../images/body/suits/left/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['suits_body_left']['name'];
	$tmp = $_FILES['suits_body_left']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$suits_body_left_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$suits_body_left_pic)){
				
				$sql19 = " UPDATE customize_suits_measurements SET suits_body_left = '".$suits_body_left_pic."', suits_date = '".$suits_date."', suits_time = '".$suits_time."', suits_ip = '".$suits_ip."', suits_status = '".$suits_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query19 = mysql_db_query($dbname, $sql19) or die("Can't Query19");
			}
    
	} else {
				$sql19 = " UPDATE customize_suits_measurements SET suits_date = '".$suits_date."', suits_time = '".$suits_time."', suits_ip = '".$suits_ip."', suits_status = '".$suits_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query19 = mysql_db_query($dbname, $sql19) or die("Can't Query19");
			}
	}
	
$path = "../../images/body/suits/right/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['suits_body_right']['name'];
	$tmp = $_FILES['suits_body_right']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$suits_body_right_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$suits_body_right_pic)){
				
				$sql20 = " UPDATE customize_suits_measurements SET suits_body_right = '".$suits_body_right_pic."', suits_date = '".$suits_date."', suits_time = '".$suits_time."', suits_ip = '".$suits_ip."', suits_status = '".$suits_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query20 = mysql_db_query($dbname, $sql20) or die("Can't Query20");
			}
    
	} else {
				$sql20 = " UPDATE customize_suits_measurements SET suits_date = '".$suits_date."', suits_time = '".$suits_time."', suits_ip = '".$suits_ip."', suits_status = '".$suits_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query20 = mysql_db_query($dbname, $sql20) or die("Can't Query20");
			}
	}
	
$path = "../../images/body/suits/back/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['suits_body_back']['name'];
	$tmp = $_FILES['suits_body_back']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$suits_body_back_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$suits_body_back_pic)){
				
				$sql21 = " UPDATE customize_suits_measurements SET suits_body_back = '".$suits_body_back_pic."', suits_date = '".$suits_date."', suits_time = '".$suits_time."', suits_ip = '".$suits_ip."', suits_status = '".$suits_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query21 = mysql_db_query($dbname, $sql21) or die("Can't Query21");
			}
    
	} else {
				$sql21 = " UPDATE customize_suits_measurements SET suits_date = '".$suits_date."', suits_time = '".$suits_time."', suits_ip = '".$suits_ip."', suits_status = '".$suits_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query21 = mysql_db_query($dbname, $sql21) or die("Can't Query21");
			}
	}

} else if ($suits_fabric_no_3 == "" || $suits_lining_no_3 == "") { }

/*FABRIC 4*/
if ($suits_fabric_no_4 != "" && $suits_lining_no_4 != "") {

$sql12 = " SELECT MAX(id) FROM customize_order ";
$query12 = mysql_db_query($dbname, $sql12) or die("Can't Query12");
$row12 = mysql_fetch_array($query12);
$id_order = $row12[0] + 1 ;

$sql13 =	" SELECT MAX(product_id) FROM customize_order";
$query13 = mysql_db_query($dbname, $sql13) or die("Can't Query13");
$row13 = mysql_fetch_array($query13);
$product_id = $row13[0] + 1 ;

$sql14 =	" SELECT MAX(id) FROM customize_suits_design ";
$query14 = mysql_db_query($dbname, $sql14) or die("Can't Query14");
$row14 = mysql_fetch_array($query14);
$id_suits = $row14[0] + 1 ;

$sql15 = " INSERT INTO customize_order (id, order_id, product_id, order_reseller, order_order_no, order_name_customize, order_my_price, order_price, order_product, order_fabric_no, order_date, order_time, order_ip, order_status) VALUES ('$id_order', '$order_id', '$product_id', '$company_user', '$suits_order_no', '$suits_customer_name', '$suits_my_price_4', '$suits_price_4', '$order_product', '$suits_fabric_no_4', '$suits_date', '$suits_time', '$suits_ip', '$suits_status') ";
$query15 = mysql_query($sql15) or die("Can't Query15");

$sql16 = " INSERT INTO customize_suits_design (id, order_id, product_id, suits_customer_name, suits_order_no, suits_order_date, suits_delivery_date, suits_fabric_no, suits_lining_no, suits_jacket_style, suits_lapel_style, suits_lapel_width, suits_lapel_color, suits_real_lapel_boutonniere, suits_vent_style, suits_pocket_style, suits_chest_pocket, suits_shoulder_construction, suits_sleeve_button, suits_cuff, suits_all_sleevebutton_holes_color, suits_contrast_last_sleevebutton_holes_color, suits_contrast_last_sleevebutton_holes_button, suits_lining_style, suits_canvas, suits_jacket_button_number, suits_jacket_thread_on_button, suits_jacket_button_hole_color, suits_pick_stitch, suits_pick_stitch_lapel_color, suits_pick_stitch_pocket_color, suits_pick_stitch_sleeves, suits_pick_stitch_vest, suits_embroidery_inside_initial_or_name, suits_embroidery_inside_color, suits_embroidery_inside_design, suits_embroidery_collar_initial_or_name, suits_embroidery_collar_color, suits_embroidery_collar_design, suits_brand, suits_elbow_patch, suits_collar_felt_color, suits_front_pleat, suits_front_pocket, suits_back_pocket, suits_no_back_pocket, suits_pants_back_button, suits_pants_back_button_number, suits_pants_button_number, suits_pants_thread_on_button, suits_pants_button_hole_color, suits_fastening, suits_fly_option, suits_fly_option_zip, suits_band_edge_style, suits_very_extended_waistband, suits_waistband_width, suits_pants_cuff, suits_pants_cuff_width, suits_belt, suits_pants_lining_style, suits_embroidery_waist_initial_or_name, suits_embroidery_waist_color, suits_embroidery_waist_design, suits_embroidery_cuffs_initial_or_name, suits_embroidery_cuffs_color, suits_embroidery_cuffs_design, suits_pants_brand, suits_coin_pocket_inside, suits_suspender_buttons_inside, suits_split_tabs_back, suits_tuxedo_satin, suits_tuxedo_satin_waist_band, suits_internal_waistband_color, suits_date, suits_time, suits_ip, suits_status) VALUES ('$id_suits', '$order_id', '$product_id', '$suits_customer_name', '$suits_order_no', '$suits_order_date', '$suits_delivery_date', '$suits_fabric_no_4', '$suits_lining_no_4', '$suits_jacket_style', '$suits_lapel_style', '$suits_lapel_width', '$suits_lapel_color', '$suits_real_lapel_boutonniere', '$suits_vent_style', '$suits_pocket_style', '$suits_chest_pocket', '$suits_shoulder_construction', '$suits_sleeve_button', '$suits_cuff', '$suits_all_sleevebutton_holes_color', '$suits_contrast_last_sleevebutton_holes_color', '$suits_contrast_last_sleevebutton_holes_button', '$suits_lining_style', '$suits_canvas', '$suits_jacket_button_number', '$suits_jacket_thread_on_button', '$suits_jacket_button_hole_color', '$suits_pick_stitch', '$suits_pick_stitch_lapel_color', '$suits_pick_stitch_pocket_color', '$suits_pick_stitch_sleeves', '$suits_pick_stitch_vest', '$suits_embroidery_inside_initial_or_name', '$suits_embroidery_inside_color', '$suits_embroidery_inside_design', '$suits_embroidery_collar_initial_or_name', '$suits_embroidery_collar_color', '$suits_embroidery_collar_design', '$suits_brand', '$suits_elbow_patch', '$suits_collar_felt_color', '$suits_front_pleat', '$suits_front_pocket', '$suits_back_pocket', '$suits_no_back_pocket', '$suits_pants_back_button', '$suits_pants_back_button_number', '$suits_pants_button_number', '$suits_pants_thread_on_button', '$suits_pants_button_hole_color', '$suits_fastening', '$suits_fly_option', '$suits_fly_option_zip', '$suits_band_edge_style', '$suits_very_extended_waistband', '$suits_waistband_width', '$suits_pants_cuff', '$suits_pants_cuff_width', '$suits_belt', '$suits_pants_lining_style', '$suits_embroidery_waist_initial_or_name', '$suits_embroidery_waist_color', '$suits_embroidery_waist_design', '$suits_embroidery_cuffs_initial_or_name', '$suits_embroidery_cuffs_color', '$suits_embroidery_cuffs_design', '$suits_pants_brand', '$suits_coin_pocket_inside', '$suits_suspender_buttons_inside', '$suits_split_tabs_back', '$suits_tuxedo_satin', '$suits_tuxedo_satin_waist_band', '$suits_internal_waistband_color', '$suits_date', '$suits_time', '$suits_ip', '$suits_status') ";
$query16 = mysql_query($sql16) or die("Can't Query16");

$sql17 = " INSERT INTO customize_suits_measurements (id, order_id, product_id, suits_jacket_measurement_sex, suits_jacket_measurement_fit, suits_jacket_measurement, suits_jacket_measurement_jacket_length, suits_jacket_measurement_back_lenght, suits_jacket_measurement_chest, suits_jacket_measurement_waist_only, suits_jacket_measurement_hips, suits_jacket_measurement_shoulders, suits_jacket_measurement_neck, suits_jacket_measurement_ptp_front, suits_jacket_measurement_ptp_back, suits_jacket_measurement_arm_hole, suits_jacket_measurement_biceps, suits_jacket_measurement_sleeves_right, suits_jacket_measurement_sleeves_left, suits_jacket_measurement_wrist_right, suits_jacket_measurement_wrist_left, suits_jacket_measurement_first_button, suits_jacket_measurement_shoulder_upper_wrist, suits_jacket_measurement_shoulder_lower_wrist, suits_pants_measurement_sex, suits_pants_measurement_length, suits_pants_measurement_fit, suits_pants_measurement, suits_pants_measurement_waist, suits_pants_measurement_hips, suits_pants_measurement_crotch_full, suits_pants_measurement_crotch_front, suits_pants_measurement_crotch_back, suits_pants_measurement_inseam_length, suits_pants_measurement_thighs, suits_pants_measurement_knees, suits_pants_measurement_length_outleg, suits_pants_measurement_front_rise, suits_pants_measurement_cuffs, suits_measurement_jacket_shoulder, suits_measurement_jacket_waist, suits_measurement_jacket_chest, suits_measurement_pants_waist, suits_measurement_pants_bottom, suits_jacket_remark, suits_pants_remark, suits_date, suits_time, suits_ip, suits_status) VALUES ('$id_suits', '$order_id', '$product_id', '$suits_jacket_measurement_sex', '$suits_jacket_measurement_fit', '$suits_jacket_measurement', '$suits_jacket_measurement_jacket_length', '$suits_jacket_measurement_back_lenght', '$suits_jacket_measurement_chest', '$suits_jacket_measurement_waist_only', '$suits_jacket_measurement_hips', '$suits_jacket_measurement_shoulders', '$suits_jacket_measurement_neck', '$suits_jacket_measurement_ptp_front', '$suits_jacket_measurement_ptp_back', '$suits_jacket_measurement_arm_hole', '$suits_jacket_measurement_biceps', '$suits_jacket_measurement_sleeves_right', '$suits_jacket_measurement_sleeves_left', '$suits_jacket_measurement_wrist_right', '$suits_jacket_measurement_wrist_left', '$suits_jacket_measurement_first_button', '$suits_jacket_measurement_shoulder_upper_wrist', '$suits_jacket_measurement_shoulder_lower_wrist', '$suits_pants_measurement_sex', '$suits_pants_measurement_length', '$suits_pants_measurement_fit', '$suits_pants_measurement', '$suits_pants_measurement_waist', '$suits_pants_measurement_hips', '$suits_pants_measurement_crotch_full', '$suits_pants_measurement_crotch_front', '$suits_pants_measurement_crotch_back', '$suits_pants_measurement_inseam_length', '$suits_pants_measurement_thighs', '$suits_pants_measurement_knees', '$suits_pants_measurement_length_outleg', '$suits_pants_measurement_front_rise', '$suits_pants_measurement_cuffs', '$suits_measurement_jacket_shoulder', '$suits_measurement_jacket_waist', '$suits_measurement_jacket_chest', '$suits_measurement_pants_waist', '$suits_measurement_pants_bottom', '$suits_jacket_remark', '$suits_pants_remark', '$suits_date', '$suits_time', '$suits_ip', '$suits_status') ";
$query17 = mysql_query($sql17) or die("Can't Query17");

$path = "../../images/body/suits/front/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['suits_body_front']['name'];
	$tmp = $_FILES['suits_body_front']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$suits_body_front_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$suits_body_front_pic)){
				
				$sql18 = " UPDATE customize_suits_measurements SET suits_body_front = '".$suits_body_front_pic."', suits_date = '".$suits_date."', suits_time = '".$suits_time."', suits_ip = '".$suits_ip."', suits_status = '".$suits_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query18 = mysql_db_query($dbname, $sql18) or die("Can't Query18");
			}
    
	} else {
				$sql18 = " UPDATE customize_suits_measurements SET suits_date = '".$suits_date."', suits_time = '".$suits_time."', suits_ip = '".$suits_ip."', suits_status = '".$suits_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query18 = mysql_db_query($dbname, $sql18) or die("Can't Query18");
			}
	}
	
$path = "../../images/body/suits/left/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['suits_body_left']['name'];
	$tmp = $_FILES['suits_body_left']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$suits_body_left_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$suits_body_left_pic)){
				
				$sql19 = " UPDATE customize_suits_measurements SET suits_body_left = '".$suits_body_left_pic."', suits_date = '".$suits_date."', suits_time = '".$suits_time."', suits_ip = '".$suits_ip."', suits_status = '".$suits_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query19 = mysql_db_query($dbname, $sql19) or die("Can't Query19");
			}
    
	} else {
				$sql19 = " UPDATE customize_suits_measurements SET suits_date = '".$suits_date."', suits_time = '".$suits_time."', suits_ip = '".$suits_ip."', suits_status = '".$suits_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query19 = mysql_db_query($dbname, $sql19) or die("Can't Query19");
			}
	}
	
$path = "../../images/body/suits/right/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['suits_body_right']['name'];
	$tmp = $_FILES['suits_body_right']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$suits_body_right_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$suits_body_right_pic)){
				
				$sql20 = " UPDATE customize_suits_measurements SET suits_body_right = '".$suits_body_right_pic."', suits_date = '".$suits_date."', suits_time = '".$suits_time."', suits_ip = '".$suits_ip."', suits_status = '".$suits_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query20 = mysql_db_query($dbname, $sql20) or die("Can't Query20");
			}
    
	} else {
				$sql20 = " UPDATE customize_suits_measurements SET suits_date = '".$suits_date."', suits_time = '".$suits_time."', suits_ip = '".$suits_ip."', suits_status = '".$suits_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query20 = mysql_db_query($dbname, $sql20) or die("Can't Query20");
			}
	}
	
$path = "../../images/body/suits/back/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['suits_body_back']['name'];
	$tmp = $_FILES['suits_body_back']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$suits_body_back_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$suits_body_back_pic)){
				
				$sql21 = " UPDATE customize_suits_measurements SET suits_body_back = '".$suits_body_back_pic."', suits_date = '".$suits_date."', suits_time = '".$suits_time."', suits_ip = '".$suits_ip."', suits_status = '".$suits_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query21 = mysql_db_query($dbname, $sql21) or die("Can't Query21");
			}
    
	} else {
				$sql21 = " UPDATE customize_suits_measurements SET suits_date = '".$suits_date."', suits_time = '".$suits_time."', suits_ip = '".$suits_ip."', suits_status = '".$suits_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query21 = mysql_db_query($dbname, $sql21) or die("Can't Query21");
			}
	}

} else if ($suits_fabric_no_4 == "" || $suits_lining_no_4 == "") { }

/*FABRIC 5*/
if ($suits_fabric_no_5 != "" && $suits_lining_no_5 != "") {
	
$sql12 = " SELECT MAX(id) FROM customize_order ";
$query12 = mysql_db_query($dbname, $sql12) or die("Can't Query12");
$row12 = mysql_fetch_array($query12);
$id_order = $row12[0] + 1 ;

$sql13 =	" SELECT MAX(product_id) FROM customize_order";
$query13 = mysql_db_query($dbname, $sql13) or die("Can't Query13");
$row13 = mysql_fetch_array($query13);
$product_id = $row13[0] + 1 ;

$sql14 =	" SELECT MAX(id) FROM customize_suits_design ";
$query14 = mysql_db_query($dbname, $sql14) or die("Can't Query14");
$row14 = mysql_fetch_array($query14);
$id_suits = $row14[0] + 1 ;

$sql15 = " INSERT INTO customize_order (id, order_id, product_id, order_reseller, order_order_no, order_name_customize, order_my_price, order_price, order_product, order_fabric_no, order_date, order_time, order_ip, order_status) VALUES ('$id_order', '$order_id', '$product_id', '$company_user', '$suits_order_no', '$suits_customer_name', '$suits_my_price_5', '$suits_price_5', '$order_product', '$suits_fabric_no_5', '$suits_date', '$suits_time', '$suits_ip', '$suits_status') ";
$query15 = mysql_query($sql15) or die("Can't Query15");

$sql16 = " INSERT INTO customize_suits_design (id, order_id, product_id, suits_customer_name, suits_order_no, suits_order_date, suits_delivery_date, suits_fabric_no, suits_lining_no, suits_jacket_style, suits_lapel_style, suits_lapel_width, suits_lapel_color, suits_real_lapel_boutonniere, suits_vent_style, suits_pocket_style, suits_chest_pocket, suits_shoulder_construction, suits_sleeve_button, suits_cuff, suits_all_sleevebutton_holes_color, suits_contrast_last_sleevebutton_holes_color, suits_contrast_last_sleevebutton_holes_button, suits_lining_style, suits_canvas, suits_jacket_button_number, suits_jacket_thread_on_button, suits_jacket_button_hole_color, suits_pick_stitch, suits_pick_stitch_lapel_color, suits_pick_stitch_pocket_color, suits_pick_stitch_sleeves, suits_pick_stitch_vest, suits_embroidery_inside_initial_or_name, suits_embroidery_inside_color, suits_embroidery_inside_design, suits_embroidery_collar_initial_or_name, suits_embroidery_collar_color, suits_embroidery_collar_design, suits_brand, suits_elbow_patch, suits_collar_felt_color, suits_front_pleat, suits_front_pocket, suits_back_pocket, suits_no_back_pocket, suits_pants_back_button, suits_pants_back_button_number, suits_pants_button_number, suits_pants_thread_on_button, suits_pants_button_hole_color, suits_fastening, suits_fly_option, suits_fly_option_zip, suits_band_edge_style, suits_very_extended_waistband, suits_waistband_width, suits_pants_cuff, suits_pants_cuff_width, suits_belt, suits_pants_lining_style, suits_embroidery_waist_initial_or_name, suits_embroidery_waist_color, suits_embroidery_waist_design, suits_embroidery_cuffs_initial_or_name, suits_embroidery_cuffs_color, suits_embroidery_cuffs_design, suits_pants_brand, suits_coin_pocket_inside, suits_suspender_buttons_inside, suits_split_tabs_back, suits_tuxedo_satin, suits_tuxedo_satin_waist_band, suits_internal_waistband_color, suits_date, suits_time, suits_ip, suits_status) VALUES ('$id_suits', '$order_id', '$product_id', '$suits_customer_name', '$suits_order_no', '$suits_order_date', '$suits_delivery_date', '$suits_fabric_no_5', '$suits_lining_no_5', '$suits_jacket_style', '$suits_lapel_style', '$suits_lapel_width', '$suits_lapel_color', '$suits_real_lapel_boutonniere', '$suits_vent_style', '$suits_pocket_style', '$suits_chest_pocket', '$suits_shoulder_construction', '$suits_sleeve_button', '$suits_cuff', '$suits_all_sleevebutton_holes_color', '$suits_contrast_last_sleevebutton_holes_color', '$suits_contrast_last_sleevebutton_holes_button', '$suits_lining_style', '$suits_canvas', '$suits_jacket_button_number', '$suits_jacket_thread_on_button', '$suits_jacket_button_hole_color', '$suits_pick_stitch', '$suits_pick_stitch_lapel_color', '$suits_pick_stitch_pocket_color', '$suits_pick_stitch_sleeves', '$suits_pick_stitch_vest', '$suits_embroidery_inside_initial_or_name', '$suits_embroidery_inside_color', '$suits_embroidery_inside_design', '$suits_embroidery_collar_initial_or_name', '$suits_embroidery_collar_color', '$suits_embroidery_collar_design', '$suits_brand', '$suits_elbow_patch', '$suits_collar_felt_color', '$suits_front_pleat', '$suits_front_pocket', '$suits_back_pocket', '$suits_no_back_pocket', '$suits_pants_back_button', '$suits_pants_back_button_number', '$suits_pants_button_number', '$suits_pants_thread_on_button', '$suits_pants_button_hole_color', '$suits_fastening', '$suits_fly_option', '$suits_fly_option_zip', '$suits_band_edge_style', '$suits_very_extended_waistband', '$suits_waistband_width', '$suits_pants_cuff', '$suits_pants_cuff_width', '$suits_belt', '$suits_pants_lining_style', '$suits_embroidery_waist_initial_or_name', '$suits_embroidery_waist_color', '$suits_embroidery_waist_design', '$suits_embroidery_cuffs_initial_or_name', '$suits_embroidery_cuffs_color', '$suits_embroidery_cuffs_design', '$suits_pants_brand', '$suits_coin_pocket_inside', '$suits_suspender_buttons_inside', '$suits_split_tabs_back', '$suits_tuxedo_satin', '$suits_tuxedo_satin_waist_band', '$suits_internal_waistband_color', '$suits_date', '$suits_time', '$suits_ip', '$suits_status') ";
$query16 = mysql_query($sql16) or die("Can't Query16");

$sql17 = " INSERT INTO customize_suits_measurements (id, order_id, product_id, suits_jacket_measurement_sex, suits_jacket_measurement_fit, suits_jacket_measurement, suits_jacket_measurement_jacket_length, suits_jacket_measurement_back_lenght, suits_jacket_measurement_chest, suits_jacket_measurement_waist_only, suits_jacket_measurement_hips, suits_jacket_measurement_shoulders, suits_jacket_measurement_neck, suits_jacket_measurement_ptp_front, suits_jacket_measurement_ptp_back, suits_jacket_measurement_arm_hole, suits_jacket_measurement_biceps, suits_jacket_measurement_sleeves_right, suits_jacket_measurement_sleeves_left, suits_jacket_measurement_wrist_right, suits_jacket_measurement_wrist_left, suits_jacket_measurement_first_button, suits_jacket_measurement_shoulder_upper_wrist, suits_jacket_measurement_shoulder_lower_wrist, suits_pants_measurement_sex, suits_pants_measurement_length, suits_pants_measurement_fit, suits_pants_measurement, suits_pants_measurement_waist, suits_pants_measurement_hips, suits_pants_measurement_crotch_full, suits_pants_measurement_crotch_front, suits_pants_measurement_crotch_back, suits_pants_measurement_inseam_length, suits_pants_measurement_thighs, suits_pants_measurement_knees, suits_pants_measurement_length_outleg, suits_pants_measurement_front_rise, suits_pants_measurement_cuffs, suits_measurement_jacket_shoulder, suits_measurement_jacket_waist, suits_measurement_jacket_chest, suits_measurement_pants_waist, suits_measurement_pants_bottom, suits_jacket_remark, suits_pants_remark, suits_date, suits_time, suits_ip, suits_status) VALUES ('$id_suits', '$order_id', '$product_id', '$suits_jacket_measurement_sex', '$suits_jacket_measurement_fit', '$suits_jacket_measurement', '$suits_jacket_measurement_jacket_length', '$suits_jacket_measurement_back_lenght', '$suits_jacket_measurement_chest', '$suits_jacket_measurement_waist_only', '$suits_jacket_measurement_hips', '$suits_jacket_measurement_shoulders', '$suits_jacket_measurement_neck', '$suits_jacket_measurement_ptp_front', '$suits_jacket_measurement_ptp_back', '$suits_jacket_measurement_arm_hole', '$suits_jacket_measurement_biceps', '$suits_jacket_measurement_sleeves_right', '$suits_jacket_measurement_sleeves_left', '$suits_jacket_measurement_wrist_right', '$suits_jacket_measurement_wrist_left', '$suits_jacket_measurement_first_button', '$suits_jacket_measurement_shoulder_upper_wrist', '$suits_jacket_measurement_shoulder_lower_wrist', '$suits_pants_measurement_sex', '$suits_pants_measurement_length', '$suits_pants_measurement_fit', '$suits_pants_measurement', '$suits_pants_measurement_waist', '$suits_pants_measurement_hips', '$suits_pants_measurement_crotch_full', '$suits_pants_measurement_crotch_front', '$suits_pants_measurement_crotch_back', '$suits_pants_measurement_inseam_length', '$suits_pants_measurement_thighs', '$suits_pants_measurement_knees', '$suits_pants_measurement_length_outleg', '$suits_pants_measurement_front_rise', '$suits_pants_measurement_cuffs', '$suits_measurement_jacket_shoulder', '$suits_measurement_jacket_waist', '$suits_measurement_jacket_chest', '$suits_measurement_pants_waist', '$suits_measurement_pants_bottom', '$suits_jacket_remark', '$suits_pants_remark', '$suits_date', '$suits_time', '$suits_ip', '$suits_status') ";
$query17 = mysql_query($sql17) or die("Can't Query17");

$path = "../../images/body/suits/front/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['suits_body_front']['name'];
	$tmp = $_FILES['suits_body_front']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$suits_body_front_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$suits_body_front_pic)){
				
				$sql18 = " UPDATE customize_suits_measurements SET suits_body_front = '".$suits_body_front_pic."', suits_date = '".$suits_date."', suits_time = '".$suits_time."', suits_ip = '".$suits_ip."', suits_status = '".$suits_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query18 = mysql_db_query($dbname, $sql18) or die("Can't Query18");
			}
    
	} else {
				$sql18 = " UPDATE customize_suits_measurements SET suits_date = '".$suits_date."', suits_time = '".$suits_time."', suits_ip = '".$suits_ip."', suits_status = '".$suits_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query18 = mysql_db_query($dbname, $sql18) or die("Can't Query18");
			}
	}
	
$path = "../../images/body/suits/left/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['suits_body_left']['name'];
	$tmp = $_FILES['suits_body_left']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$suits_body_left_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$suits_body_left_pic)){
				
				$sql19 = " UPDATE customize_suits_measurements SET suits_body_left = '".$suits_body_left_pic."', suits_date = '".$suits_date."', suits_time = '".$suits_time."', suits_ip = '".$suits_ip."', suits_status = '".$suits_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query19 = mysql_db_query($dbname, $sql19) or die("Can't Query19");
			}
    
	} else {
				$sql19 = " UPDATE customize_suits_measurements SET suits_date = '".$suits_date."', suits_time = '".$suits_time."', suits_ip = '".$suits_ip."', suits_status = '".$suits_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query19 = mysql_db_query($dbname, $sql19) or die("Can't Query19");
			}
	}
	
$path = "../../images/body/suits/right/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['suits_body_right']['name'];
	$tmp = $_FILES['suits_body_right']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$suits_body_right_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$suits_body_right_pic)){
				
				$sql20 = " UPDATE customize_suits_measurements SET suits_body_right = '".$suits_body_right_pic."', suits_date = '".$suits_date."', suits_time = '".$suits_time."', suits_ip = '".$suits_ip."', suits_status = '".$suits_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query20 = mysql_db_query($dbname, $sql20) or die("Can't Query20");
			}
    
	} else {
				$sql20 = " UPDATE customize_suits_measurements SET suits_date = '".$suits_date."', suits_time = '".$suits_time."', suits_ip = '".$suits_ip."', suits_status = '".$suits_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query20 = mysql_db_query($dbname, $sql20) or die("Can't Query20");
			}
	}
	
$path = "../../images/body/suits/back/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['suits_body_back']['name'];
	$tmp = $_FILES['suits_body_back']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$suits_body_back_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$suits_body_back_pic)){
				
				$sql21 = " UPDATE customize_suits_measurements SET suits_body_back = '".$suits_body_back_pic."', suits_date = '".$suits_date."', suits_time = '".$suits_time."', suits_ip = '".$suits_ip."', suits_status = '".$suits_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query21 = mysql_db_query($dbname, $sql21) or die("Can't Query21");
			}
    
	} else {
				$sql21 = " UPDATE customize_suits_measurements SET suits_date = '".$suits_date."', suits_time = '".$suits_time."', suits_ip = '".$suits_ip."', suits_status = '".$suits_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query21 = mysql_db_query($dbname, $sql21) or die("Can't Query21");
			}
	}

} else if ($suits_fabric_no_5 == "" || $suits_lining_no_5 == "") { }

/*FABRIC 6*/
if ($suits_fabric_no_6 != "" && $suits_lining_no_6 != "") {

$sql12 = " SELECT MAX(id) FROM customize_order ";
$query12 = mysql_db_query($dbname, $sql12) or die("Can't Query12");
$row12 = mysql_fetch_array($query12);
$id_order = $row12[0] + 1 ;

$sql13 =	" SELECT MAX(product_id) FROM customize_order";
$query13 = mysql_db_query($dbname, $sql13) or die("Can't Query13");
$row13 = mysql_fetch_array($query13);
$product_id = $row13[0] + 1 ;

$sql14 =	" SELECT MAX(id) FROM customize_suits_design ";
$query14 = mysql_db_query($dbname, $sql14) or die("Can't Query14");
$row14 = mysql_fetch_array($query14);
$id_suits = $row14[0] + 1 ;

$sql15 = " INSERT INTO customize_order (id, order_id, product_id, order_reseller, order_order_no, order_name_customize, order_my_price, order_price, order_product, order_fabric_no, order_date, order_time, order_ip, order_status) VALUES ('$id_order', '$order_id', '$product_id', '$company_user', '$suits_order_no', '$suits_customer_name', '$suits_my_price_6', '$suits_price_6', '$order_product', '$suits_fabric_no_6', '$suits_date', '$suits_time', '$suits_ip', '$suits_status') ";
$query15 = mysql_query($sql15) or die("Can't Query15");

$sql16 = " INSERT INTO customize_suits_design (id, order_id, product_id, suits_customer_name, suits_order_no, suits_order_date, suits_delivery_date, suits_fabric_no, suits_lining_no, suits_jacket_style, suits_lapel_style, suits_lapel_width, suits_lapel_color, suits_real_lapel_boutonniere, suits_vent_style, suits_pocket_style, suits_chest_pocket, suits_shoulder_construction, suits_sleeve_button, suits_cuff, suits_all_sleevebutton_holes_color, suits_contrast_last_sleevebutton_holes_color, suits_contrast_last_sleevebutton_holes_button, suits_lining_style, suits_canvas, suits_jacket_button_number, suits_jacket_thread_on_button, suits_jacket_button_hole_color, suits_pick_stitch, suits_pick_stitch_lapel_color, suits_pick_stitch_pocket_color, suits_pick_stitch_sleeves, suits_pick_stitch_vest, suits_embroidery_inside_initial_or_name, suits_embroidery_inside_color, suits_embroidery_inside_design, suits_embroidery_collar_initial_or_name, suits_embroidery_collar_color, suits_embroidery_collar_design, suits_brand, suits_elbow_patch, suits_collar_felt_color, suits_front_pleat, suits_front_pocket, suits_back_pocket, suits_no_back_pocket, suits_pants_back_button, suits_pants_back_button_number, suits_pants_button_number, suits_pants_thread_on_button, suits_pants_button_hole_color, suits_fastening, suits_fly_option, suits_fly_option_zip, suits_band_edge_style, suits_very_extended_waistband, suits_waistband_width, suits_pants_cuff, suits_pants_cuff_width, suits_belt, suits_pants_lining_style, suits_embroidery_waist_initial_or_name, suits_embroidery_waist_color, suits_embroidery_waist_design, suits_embroidery_cuffs_initial_or_name, suits_embroidery_cuffs_color, suits_embroidery_cuffs_design, suits_pants_brand, suits_coin_pocket_inside, suits_suspender_buttons_inside, suits_split_tabs_back, suits_tuxedo_satin, suits_tuxedo_satin_waist_band, suits_internal_waistband_color, suits_date, suits_time, suits_ip, suits_status) VALUES ('$id_suits', '$order_id', '$product_id', '$suits_customer_name', '$suits_order_no', '$suits_order_date', '$suits_delivery_date', '$suits_fabric_no_6', '$suits_lining_no_6', '$suits_jacket_style', '$suits_lapel_style', '$suits_lapel_width', '$suits_lapel_color', '$suits_real_lapel_boutonniere', '$suits_vent_style', '$suits_pocket_style', '$suits_chest_pocket', '$suits_shoulder_construction', '$suits_sleeve_button', '$suits_cuff', '$suits_all_sleevebutton_holes_color', '$suits_contrast_last_sleevebutton_holes_color', '$suits_contrast_last_sleevebutton_holes_button', '$suits_lining_style', '$suits_canvas', '$suits_jacket_button_number', '$suits_jacket_thread_on_button', '$suits_jacket_button_hole_color', '$suits_pick_stitch', '$suits_pick_stitch_lapel_color', '$suits_pick_stitch_pocket_color', '$suits_pick_stitch_sleeves', '$suits_pick_stitch_vest', '$suits_embroidery_inside_initial_or_name', '$suits_embroidery_inside_color', '$suits_embroidery_inside_design', '$suits_embroidery_collar_initial_or_name', '$suits_embroidery_collar_color', '$suits_embroidery_collar_design', '$suits_brand', '$suits_elbow_patch', '$suits_collar_felt_color', '$suits_front_pleat', '$suits_front_pocket', '$suits_back_pocket', '$suits_no_back_pocket', '$suits_pants_back_button', '$suits_pants_back_button_number', '$suits_pants_button_number', '$suits_pants_thread_on_button', '$suits_pants_button_hole_color', '$suits_fastening', '$suits_fly_option', '$suits_fly_option_zip', '$suits_band_edge_style', '$suits_very_extended_waistband', '$suits_waistband_width', '$suits_pants_cuff', '$suits_pants_cuff_width', '$suits_belt', '$suits_pants_lining_style', '$suits_embroidery_waist_initial_or_name', '$suits_embroidery_waist_color', '$suits_embroidery_waist_design', '$suits_embroidery_cuffs_initial_or_name', '$suits_embroidery_cuffs_color', '$suits_embroidery_cuffs_design', '$suits_pants_brand', '$suits_coin_pocket_inside', '$suits_suspender_buttons_inside', '$suits_split_tabs_back', '$suits_tuxedo_satin', '$suits_tuxedo_satin_waist_band', '$suits_internal_waistband_color', '$suits_date', '$suits_time', '$suits_ip', '$suits_status') ";
$query16 = mysql_query($sql16) or die("Can't Query16");

$sql17 = " INSERT INTO customize_suits_measurements (id, order_id, product_id, suits_jacket_measurement_sex, suits_jacket_measurement_fit, suits_jacket_measurement, suits_jacket_measurement_jacket_length, suits_jacket_measurement_back_lenght, suits_jacket_measurement_chest, suits_jacket_measurement_waist_only, suits_jacket_measurement_hips, suits_jacket_measurement_shoulders, suits_jacket_measurement_neck, suits_jacket_measurement_ptp_front, suits_jacket_measurement_ptp_back, suits_jacket_measurement_arm_hole, suits_jacket_measurement_biceps, suits_jacket_measurement_sleeves_right, suits_jacket_measurement_sleeves_left, suits_jacket_measurement_wrist_right, suits_jacket_measurement_wrist_left, suits_jacket_measurement_first_button, suits_jacket_measurement_shoulder_upper_wrist, suits_jacket_measurement_shoulder_lower_wrist, suits_pants_measurement_sex, suits_pants_measurement_length, suits_pants_measurement_fit, suits_pants_measurement, suits_pants_measurement_waist, suits_pants_measurement_hips, suits_pants_measurement_crotch_full, suits_pants_measurement_crotch_front, suits_pants_measurement_crotch_back, suits_pants_measurement_inseam_length, suits_pants_measurement_thighs, suits_pants_measurement_knees, suits_pants_measurement_length_outleg, suits_pants_measurement_front_rise, suits_pants_measurement_cuffs, suits_measurement_jacket_shoulder, suits_measurement_jacket_waist, suits_measurement_jacket_chest, suits_measurement_pants_waist, suits_measurement_pants_bottom, suits_jacket_remark, suits_pants_remark, suits_date, suits_time, suits_ip, suits_status) VALUES ('$id_suits', '$order_id', '$product_id', '$suits_jacket_measurement_sex', '$suits_jacket_measurement_fit', '$suits_jacket_measurement', '$suits_jacket_measurement_jacket_length', '$suits_jacket_measurement_back_lenght', '$suits_jacket_measurement_chest', '$suits_jacket_measurement_waist_only', '$suits_jacket_measurement_hips', '$suits_jacket_measurement_shoulders', '$suits_jacket_measurement_neck', '$suits_jacket_measurement_ptp_front', '$suits_jacket_measurement_ptp_back', '$suits_jacket_measurement_arm_hole', '$suits_jacket_measurement_biceps', '$suits_jacket_measurement_sleeves_right', '$suits_jacket_measurement_sleeves_left', '$suits_jacket_measurement_wrist_right', '$suits_jacket_measurement_wrist_left', '$suits_jacket_measurement_first_button', '$suits_jacket_measurement_shoulder_upper_wrist', '$suits_jacket_measurement_shoulder_lower_wrist', '$suits_pants_measurement_sex', '$suits_pants_measurement_length', '$suits_pants_measurement_fit', '$suits_pants_measurement', '$suits_pants_measurement_waist', '$suits_pants_measurement_hips', '$suits_pants_measurement_crotch_full', '$suits_pants_measurement_crotch_front', '$suits_pants_measurement_crotch_back', '$suits_pants_measurement_inseam_length', '$suits_pants_measurement_thighs', '$suits_pants_measurement_knees', '$suits_pants_measurement_length_outleg', '$suits_pants_measurement_front_rise', '$suits_pants_measurement_cuffs', '$suits_measurement_jacket_shoulder', '$suits_measurement_jacket_waist', '$suits_measurement_jacket_chest', '$suits_measurement_pants_waist', '$suits_measurement_pants_bottom', '$suits_jacket_remark', '$suits_pants_remark', '$suits_date', '$suits_time', '$suits_ip', '$suits_status') ";
$query17 = mysql_query($sql17) or die("Can't Query17");

$path = "../../images/body/suits/front/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['suits_body_front']['name'];
	$tmp = $_FILES['suits_body_front']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$suits_body_front_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$suits_body_front_pic)){
				
				$sql18 = " UPDATE customize_suits_measurements SET suits_body_front = '".$suits_body_front_pic."', suits_date = '".$suits_date."', suits_time = '".$suits_time."', suits_ip = '".$suits_ip."', suits_status = '".$suits_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query18 = mysql_db_query($dbname, $sql18) or die("Can't Query18");
			}
    
	} else {
				$sql18 = " UPDATE customize_suits_measurements SET suits_date = '".$suits_date."', suits_time = '".$suits_time."', suits_ip = '".$suits_ip."', suits_status = '".$suits_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query18 = mysql_db_query($dbname, $sql18) or die("Can't Query18");
			}
	}
	
$path = "../../images/body/suits/left/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['suits_body_left']['name'];
	$tmp = $_FILES['suits_body_left']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$suits_body_left_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$suits_body_left_pic)){
				
				$sql19 = " UPDATE customize_suits_measurements SET suits_body_left = '".$suits_body_left_pic."', suits_date = '".$suits_date."', suits_time = '".$suits_time."', suits_ip = '".$suits_ip."', suits_status = '".$suits_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query19 = mysql_db_query($dbname, $sql19) or die("Can't Query19");
			}
    
	} else {
				$sql19 = " UPDATE customize_suits_measurements SET suits_date = '".$suits_date."', suits_time = '".$suits_time."', suits_ip = '".$suits_ip."', suits_status = '".$suits_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query19 = mysql_db_query($dbname, $sql19) or die("Can't Query19");
			}
	}
	
$path = "../../images/body/suits/right/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['suits_body_right']['name'];
	$tmp = $_FILES['suits_body_right']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$suits_body_right_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$suits_body_right_pic)){
				
				$sql20 = " UPDATE customize_suits_measurements SET suits_body_right = '".$suits_body_right_pic."', suits_date = '".$suits_date."', suits_time = '".$suits_time."', suits_ip = '".$suits_ip."', suits_status = '".$suits_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query20 = mysql_db_query($dbname, $sql20) or die("Can't Query20");
			}
    
	} else {
				$sql20 = " UPDATE customize_suits_measurements SET suits_date = '".$suits_date."', suits_time = '".$suits_time."', suits_ip = '".$suits_ip."', suits_status = '".$suits_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query20 = mysql_db_query($dbname, $sql20) or die("Can't Query20");
			}
	}
	
$path = "../../images/body/suits/back/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['suits_body_back']['name'];
	$tmp = $_FILES['suits_body_back']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$suits_body_back_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$suits_body_back_pic)){
				
				$sql21 = " UPDATE customize_suits_measurements SET suits_body_back = '".$suits_body_back_pic."', suits_date = '".$suits_date."', suits_time = '".$suits_time."', suits_ip = '".$suits_ip."', suits_status = '".$suits_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query21 = mysql_db_query($dbname, $sql21) or die("Can't Query21");
			}
    
	} else {
				$sql21 = " UPDATE customize_suits_measurements SET suits_date = '".$suits_date."', suits_time = '".$suits_time."', suits_ip = '".$suits_ip."', suits_status = '".$suits_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query21 = mysql_db_query($dbname, $sql21) or die("Can't Query21");
			}
	}

} else if ($suits_fabric_no_6 == "" || $suits_lining_no_6 == "") { }

if ($suits_orderid != "") {
	
	$sql22 = " UPDATE customize_checkout SET checkout_company = '$company_user', checkout_order = '$suits_order_no', checkout_customer = '$suits_customer_name', checkout_date = '$suits_date', checkout_time = '$suits_time', checkout_ip = '$suits_ip', checkout_status = '$suits_status' WHERE checkout_orderid = '$order_id' ";
	$query22 = mysql_query($sql22) or die("Can't Query22");
	
} else if ($suits_orderid == "") {
	
	$sql22 = " INSERT INTO customize_checkout (id, checkout_company, checkout_order, checkout_orderid, checkout_customer, checkout_date, checkout_time, checkout_ip, checkout_status) VALUES ('$id_customize_checkout', '$company_user', '$suits_order_no', '$order_id', '$suits_customer_name', '$suits_date', '$suits_time', '$suits_ip', '$suits_status') ";
	$query22 = mysql_query($sql22) or die("Can't Query22");
	
}

if($query22) {
	
	echo " <script language='javascript'> window.location='../../cart/single/index.php?orderid=".$order_id."'; </script> ";
	
}

mysql_close();
?>