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

$order_product = tuxedo_suits;
$tuxedo_suits_orderid = $_POST["tuxedo_suits_orderid"];

if ($tuxedo_suits_orderid != "") {
	
	$order_id = $tuxedo_suits_orderid;
	
} else if ($tuxedo_suits_orderid == "") {
	
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
$tuxedo_suits_fabric_no_1 = $_POST["tuxedo_suits_fabric_no_1"];
$tuxedo_suits_lining_no_1 = $_POST["tuxedo_suits_lining_no_1"];
$tuxedo_suits_fabric_no_2 = $_POST["tuxedo_suits_fabric_no_2"];
$tuxedo_suits_lining_no_2 = $_POST["tuxedo_suits_lining_no_2"];
$tuxedo_suits_fabric_no_3 = $_POST["tuxedo_suits_fabric_no_3"];
$tuxedo_suits_lining_no_3 = $_POST["tuxedo_suits_lining_no_3"];
$tuxedo_suits_fabric_no_4 = $_POST["tuxedo_suits_fabric_no_4"];
$tuxedo_suits_lining_no_4 = $_POST["tuxedo_suits_lining_no_4"];
$tuxedo_suits_fabric_no_5 = $_POST["tuxedo_suits_fabric_no_5"];
$tuxedo_suits_lining_no_5 = $_POST["tuxedo_suits_lining_no_5"];
$tuxedo_suits_fabric_no_6 = $_POST["tuxedo_suits_fabric_no_6"];
$tuxedo_suits_lining_no_6 = $_POST["tuxedo_suits_lining_no_6"];

$sql4 =	" SELECT * FROM admin_fabrics_tuxedo_suits WHERE fabricno = '$tuxedo_suits_fabric_no_1' ";
$query4 = mysql_db_query($dbname, $sql4) or die("Can't Query4");
$row4 = mysql_fetch_array($query4);
$fabrics_type = $row4["type"];
$fabrics_brand = $row4["brand"];

if ($row4["type"] != '') {

$sql01 = " SELECT `fabrictype_".$id_user."` FROM admin_fabrictype WHERE fabrictype_name = '$fabrics_type' AND fabrictype_product = 'Suits' ";
$query01 = mysql_db_query($dbname, $sql01) or die("Can't Query01");
$row01 = mysql_fetch_array($query01);
$tuxedo_suits_fabric_price_1 = $row01["0"];

} else if ($row4["brand"] != '') {
	
$sql02 = " SELECT `fabricbrand_".$id_user."` FROM admin_fabricbrand WHERE fabricbrand_name = '$fabrics_brand' AND fabricbrand_product = 'Suits' ";
$query02 = mysql_db_query($dbname, $sql02) or die("Can't Query02");
$row02 = mysql_fetch_array($query02);	
$tuxedo_suits_fabric_price_1 = $row02["0"];
	
}

$sql5 =	" SELECT * FROM admin_fabrics_tuxedo_suits WHERE fabricno = '$tuxedo_suits_fabric_no_2' ";
$query5 = mysql_db_query($dbname, $sql5) or die("Can't Query5");
$row5 = mysql_fetch_array($query5);
$fabrics_type = $row5["type"];
$fabrics_brand = $row5["brand"];

if ($row5["type"] != '') {

$sql03 = " SELECT `fabrictype_".$id_user."` FROM admin_fabrictype WHERE fabrictype_name = '$fabrics_type' AND fabrictype_product = 'Suits' ";
$query03 = mysql_db_query($dbname, $sql03) or die("Can't Query03");
$row03 = mysql_fetch_array($query03);
$tuxedo_suits_fabric_price_2 = $row03["0"];

} else if ($row5["brand"] != '') {
	
$sql04 = " SELECT `fabricbrand_".$id_user."` FROM admin_fabricbrand WHERE fabricbrand_name = '$fabrics_brand' AND fabricbrand_product = 'Suits' ";
$query04 = mysql_db_query($dbname, $sql04) or die("Can't Query04");
$row04 = mysql_fetch_array($query04);	
$tuxedo_suits_fabric_price_2 = $row04["0"];
	
}

$sql6 =	" SELECT * FROM admin_fabrics_tuxedo_suits WHERE fabricno = '$tuxedo_suits_fabric_no_3' ";
$query6 = mysql_db_query($dbname, $sql6) or die("Can't Query6");
$row6 = mysql_fetch_array($query6);
$fabrics_type = $row6["type"];
$fabrics_brand = $row6["brand"];

if ($row6["type"] != '') {

$sql05 = " SELECT `fabrictype_".$id_user."` FROM admin_fabrictype WHERE fabrictype_name = '$fabrics_type' AND fabrictype_product = 'Suits' ";
$query05 = mysql_db_query($dbname, $sql05) or die("Can't Query05");
$row05 = mysql_fetch_array($query05);
$tuxedo_suits_fabric_price_3 = $row05["0"];

} else if ($row6["brand"] != '') {
	
$sql06 = " SELECT `fabricbrand_".$id_user."` FROM admin_fabricbrand WHERE fabricbrand_name = '$fabrics_brand' AND fabricbrand_product = 'Suits' ";
$query06 = mysql_db_query($dbname, $sql06) or die("Can't Query06");
$row06 = mysql_fetch_array($query06);	
$tuxedo_suits_fabric_price_3 = $row06["0"];
	
}

$sql7 =	" SELECT * FROM admin_fabrics_tuxedo_suits WHERE fabricno = '$tuxedo_suits_fabric_no_4' ";
$query7 = mysql_db_query($dbname, $sql7) or die("Can't Query7");
$row7 = mysql_fetch_array($query7);
$fabrics_type = $row7["type"];
$fabrics_brand = $row7["brand"];

if ($row7["type"] != '') {

$sql07 = " SELECT `fabrictype_".$id_user."` FROM admin_fabrictype WHERE fabrictype_name = '$fabrics_type' AND fabrictype_product = 'Suits' ";
$query07 = mysql_db_query($dbname, $sql07) or die("Can't Query07");
$row07 = mysql_fetch_array($query07);
$tuxedo_suits_fabric_price_4 = $row07["0"];

} else if ($row7["brand"] != '') {
	
$sql08 = " SELECT `fabricbrand_".$id_user."` FROM admin_fabricbrand WHERE fabricbrand_name = '$fabrics_brand' AND fabricbrand_product = 'Suits' ";
$query08 = mysql_db_query($dbname, $sql08) or die("Can't Query08");
$row08 = mysql_fetch_array($query08);	
$tuxedo_suits_fabric_price_4 = $row08["0"];
	
}

$sql8 = " SELECT * FROM admin_fabrics_tuxedo_suits WHERE fabricno = '$tuxedo_suits_fabric_no_5' ";
$query8 = mysql_db_query($dbname, $sql8) or die("Can't Query8");
$row8 = mysql_fetch_array($query8);
$fabrics_type = $row8["type"];
$fabrics_brand = $row8["brand"];

if ($row8["type"] != '') {

$sql09 = " SELECT `fabrictype_".$id_user."` FROM admin_fabrictype WHERE fabrictype_name = '$fabrics_type' AND fabrictype_product = 'Suits' ";
$query09 = mysql_db_query($dbname, $sql09) or die("Can't Query09");
$row09 = mysql_fetch_array($query09);
$tuxedo_suits_fabric_price_5 = $row09["0"];

} else if ($row8["brand"] != '') {
	
$sql010 = " SELECT `fabricbrand_".$id_user."` FROM admin_fabricbrand WHERE fabricbrand_name = '$fabrics_brand' AND fabricbrand_product = 'Suits' ";
$query010 = mysql_db_query($dbname, $sql010) or die("Can't Query010");
$row010 = mysql_fetch_array($query010);	
$tuxedo_suits_fabric_price_5 = $row010["0"];
	
}

$sql9 = " SELECT * FROM admin_fabrics_tuxedo_suits WHERE fabricno = '$tuxedo_suits_fabric_no_6' ";
$query9 = mysql_db_query($dbname, $sql9) or die("Can't Query9");
$row9 = mysql_fetch_array($query9);
$fabrics_type = $row9["type"];
$fabrics_brand = $row9["brand"];

if ($row9["type"] != '') {

$sql011 = " SELECT `fabrictype_".$id_user."` FROM admin_fabrictype WHERE fabrictype_name = '$fabrics_type' AND fabrictype_product = 'Suits' ";
$query011 = mysql_db_query($dbname, $sql011) or die("Can't Query011");
$row011 = mysql_fetch_array($query011);
$tuxedo_suits_fabric_price_6 = $row011["0"];

} else if ($row9["brand"] != '') {
	
$sql012 = " SELECT `fabricbrand_".$id_user."` FROM admin_fabricbrand WHERE fabricbrand_name = '$fabrics_brand' AND fabricbrand_product = 'Suits' ";
$query012 = mysql_db_query($dbname, $sql012) or die("Can't Query012");
$row012 = mysql_fetch_array($query012);	
$tuxedo_suits_fabric_price_6 = $row012["0"];
	
}

/*OTHER PRICING PARAMETERS*/
$tuxedo_suits_jacket_measurement_chest = $_POST["tuxedo_suits_jacket_measurement_chest"];
$tuxedo_suits_jacket_measurement_waist_upper = $_POST["tuxedo_suits_jacket_measurement_waist_upper"];
$tuxedo_suits_jacket_measurement_waist_lower = $_POST["tuxedo_suits_jacket_measurement_waist_lower"];
$tuxedo_suits_jacket_measurement_hips = $_POST["tuxedo_suits_jacket_measurement_hips"];

if (($tuxedo_suits_jacket_measurement_chest >= '50' && $tuxedo_suits_jacket_measurement_chest <= '52') || ($tuxedo_suits_jacket_measurement_waist_upper >= '50' && $tuxedo_suits_jacket_measurement_waist_upper <= '52') || ($tuxedo_suits_jacket_measurement_waist_lower >= '50' && $tuxedo_suits_jacket_measurement_waist_lower <= '52') || ($tuxedo_suits_jacket_measurement_hips >= '50' && $tuxedo_suits_jacket_measurement_hips <= '52')) {
	
	$price_size_1 = $tuxedo_suits_fabric_price_1 * 20;
	$price_size_2 = $price_size_1 / 100;
	
	$price_size_4 = $tuxedo_suits_fabric_price_2 * 20;
	$price_size_5 = $price_size_4 / 100;
	
	$price_size_7 = $tuxedo_suits_fabric_price_3 * 20;
	$price_size_8 = $price_size_7 / 100;
	
	$price_size_10 = $tuxedo_suits_fabric_price_4 * 20;
	$price_size_11 = $price_size_10 / 100;
	
	$price_size_13 = $tuxedo_suits_fabric_price_5 * 20;
	$price_size_14 = $price_size_13 / 100;
	
	$price_size_16 = $tuxedo_suits_fabric_price_6 * 20;
	$price_size_17 = $price_size_16 / 100;
	
} else if (($tuxedo_suits_jacket_measurement_chest >= '52.5' && $tuxedo_suits_jacket_measurement_chest <= '56') || ($tuxedo_suits_jacket_measurement_waist_upper >= '52.5' && $tuxedo_suits_jacket_measurement_waist_upper <= '56') || ($tuxedo_suits_jacket_measurement_waist_lower >= '52.5' && $tuxedo_suits_jacket_measurement_waist_lower <= '56') || ($tuxedo_suits_jacket_measurement_hips >= '52.5' && $tuxedo_suits_jacket_measurement_hips <= '56')) {
	
	$price_size_1 = $tuxedo_suits_fabric_price_1 * 30;
	$price_size_2 = $price_size_1 / 100;
	
	$price_size_4 = $tuxedo_suits_fabric_price_2 * 30;
	$price_size_5 = $price_size_4 / 100;
	
	$price_size_7 = $tuxedo_suits_fabric_price_3 * 30;
	$price_size_8 = $price_size_7 / 100;
	
	$price_size_10 = $tuxedo_suits_fabric_price_4 * 30;
	$price_size_11 = $price_size_10 / 100;
	
	$price_size_13 = $tuxedo_suits_fabric_price_5 * 30;
	$price_size_14 = $price_size_13 / 100;
	
	$price_size_16 = $tuxedo_suits_fabric_price_6 * 30;
	$price_size_17 = $price_size_16 / 100;
	
} else if (($tuxedo_suits_jacket_measurement_chest >= '56.5' && $tuxedo_suits_jacket_measurement_chest <= '60') || ($tuxedo_suits_jacket_measurement_waist_upper >= '56.5' && $tuxedo_suits_jacket_measurement_waist_upper <= '60') || ($tuxedo_suits_jacket_measurement_waist_lower >= '56.5' && $tuxedo_suits_jacket_measurement_waist_lower <= '60') || ($tuxedo_suits_jacket_measurement_hips >= '56.5' && $tuxedo_suits_jacket_measurement_hips <= '60')) {
	
	$price_size_1 = $tuxedo_suits_fabric_price_1 * 40;
	$price_size_2 = $price_size_1 / 100;
	
	$price_size_4 = $tuxedo_suits_fabric_price_2 * 40;
	$price_size_5 = $price_size_4 / 100;
	
	$price_size_7 = $tuxedo_suits_fabric_price_3 * 40;
	$price_size_8 = $price_size_7 / 100;
	
	$price_size_10 = $tuxedo_suits_fabric_price_4 * 40;
	$price_size_11 = $price_size_10 / 100;
	
	$price_size_13 = $tuxedo_suits_fabric_price_5 * 40;
	$price_size_14 = $price_size_13 / 100;
	
	$price_size_16 = $tuxedo_suits_fabric_price_6 * 40;
	$price_size_17 = $price_size_16 / 100;
	
} else if (($tuxedo_suits_jacket_measurement_chest >= '60.5' && $tuxedo_suits_jacket_measurement_chest <= '64') || ($tuxedo_suits_jacket_measurement_waist_upper >= '60.5' && $tuxedo_suits_jacket_measurement_waist_upper <= '64') || ($tuxedo_suits_jacket_measurement_waist_lower >= '60.5' && $tuxedo_suits_jacket_measurement_waist_lower <= '64') || ($tuxedo_suits_jacket_measurement_hips >= '60.5' && $tuxedo_suits_jacket_measurement_hips <= '64')) {
	
	$price_size_1 = $tuxedo_suits_fabric_price_1 * 50;
	$price_size_2 = $price_size_1 / 100;
	
	$price_size_4 = $tuxedo_suits_fabric_price_2 * 50;
	$price_size_5 = $price_size_4 / 100;
	
	$price_size_7 = $tuxedo_suits_fabric_price_3 * 50;
	$price_size_8 = $price_size_7 / 100;
	
	$price_size_10 = $tuxedo_suits_fabric_price_4 * 50;
	$price_size_11 = $price_size_10 / 100;
	
	$price_size_13 = $tuxedo_suits_fabric_price_5 * 50;
	$price_size_14 = $price_size_13 / 100;
	
	$price_size_16 = $tuxedo_suits_fabric_price_6 * 50;
	$price_size_17 = $price_size_16 / 100;
	
} else if (($tuxedo_suits_jacket_measurement_chest >= '64.5' && $tuxedo_suits_jacket_measurement_chest <= '68') || ($tuxedo_suits_jacket_measurement_waist_upper >= '64.5' && $tuxedo_suits_jacket_measurement_waist_upper <= '68') || ($tuxedo_suits_jacket_measurement_waist_lower >= '64.5' && $tuxedo_suits_jacket_measurement_waist_lower <= '68') || ($tuxedo_suits_jacket_measurement_hips >= '64.5' && $tuxedo_suits_jacket_measurement_hips <= '68')) {
	
	$price_size_1 = $tuxedo_suits_fabric_price_1 * 60;
	$price_size_2 = $price_size_1 / 100;
	
	$price_size_4 = $tuxedo_suits_fabric_price_2 * 60;
	$price_size_5 = $price_size_4 / 100;
	
	$price_size_7 = $tuxedo_suits_fabric_price_3 * 60;
	$price_size_8 = $price_size_7 / 100;
	
	$price_size_10 = $tuxedo_suits_fabric_price_4 * 60;
	$price_size_11 = $price_size_10 / 100;
	
	$price_size_13 = $tuxedo_suits_fabric_price_5 * 60;
	$price_size_14 = $price_size_13 / 100;
	
	$price_size_16 = $tuxedo_suits_fabric_price_6 * 60;
	$price_size_17 = $price_size_16 / 100;
	
}  else {
	
	$price_size_2 = 0;
	$price_size_5 = 0;
	$price_size_8 = 0;
	$price_size_11 = 0;
	$price_size_14 = 0;
	$price_size_17 = 0;
	
}

$tuxedo_suits_pants_measurement_waist = $_POST["tuxedo_suits_pants_measurement_waist"];
$tuxedo_suits_pants_measurement_hips = $_POST["tuxedo_suits_pants_measurement_hips"];

if (($tuxedo_suits_pants_measurement_waist >= '50' && $tuxedo_suits_pants_measurement_waist <= '52') || ($tuxedo_suits_pants_measurement_hips >= '50' && $tuxedo_suits_pants_measurement_hips <= '52')) {
	
	$price_size_18 = $tuxedo_suits_fabric_price_1 * 20;
	$price_size_19 = $price_size_18 / 100;
	
	$price_size_20 = $tuxedo_suits_fabric_price_2 * 20;
	$price_size_21 = $price_size_20 / 100;
	
	$price_size_22 = $tuxedo_suits_fabric_price_3 * 20;
	$price_size_23 = $price_size_22 / 100;
	
	$price_size_24 = $tuxedo_suits_fabric_price_4 * 20;
	$price_size_25 = $suits_size_24 / 100;
	
	$price_size_26 = $tuxedo_suits_fabric_price_5 * 20;
	$price_size_27 = $price_size_26 / 100;
	
	$price_size_28 = $tuxedo_suits_fabric_price_6 * 20;
	$price_size_29 = $price_size_28 / 100;
	
} else if (($tuxedo_suits_pants_measurement_waist >= '52.5' && $tuxedo_suits_pants_measurement_waist <= '56') || ($tuxedo_suits_pants_measurement_hips >= '52.5' && $tuxedo_suits_pants_measurement_hips <= '56')) {
	
	$price_size_18 = $tuxedo_suits_fabric_price_1 * 30;
	$price_size_19 = $price_size_18 / 100;
	
	$price_size_20 = $tuxedo_suits_fabric_price_2 * 30;
	$price_size_21 = $price_size_20 / 100;
	
	$price_size_22 = $tuxedo_suits_fabric_price_3 * 30;
	$price_size_23 = $price_size_22 / 100;
	
	$price_size_24 = $tuxedo_suits_fabric_price_4 * 30;
	$price_size_25 = $suits_size_24 / 100;
	
	$price_size_26 = $tuxedo_suits_fabric_price_5 * 30;
	$price_size_27 = $price_size_26 / 100;
	
	$price_size_28 = $tuxedo_suits_fabric_price_6 * 30;
	$price_size_29 = $price_size_28 / 100;
	
} else if (($tuxedo_suits_pants_measurement_waist >= '56.5' && $tuxedo_suits_pants_measurement_waist <= '60') || ($tuxedo_suits_pants_measurement_hips >= '56.5' && $tuxedo_suits_pants_measurement_hips <= '60')) {
	
	$price_size_18 = $tuxedo_suits_fabric_price_1 * 40;
	$price_size_19 = $price_size_18 / 100;
	
	$price_size_20 = $tuxedo_suits_fabric_price_2 * 40;
	$price_size_21 = $price_size_20 / 100;
	
	$price_size_22 = $tuxedo_suits_fabric_price_3 * 40;
	$price_size_23 = $price_size_22 / 100;
	
	$price_size_24 = $tuxedo_suits_fabric_price_4 * 40;
	$price_size_25 = $suits_size_24 / 100;
	
	$price_size_26 = $tuxedo_suits_fabric_price_5 * 40;
	$price_size_27 = $price_size_26 / 100;
	
	$price_size_28 = $tuxedo_suits_fabric_price_6 * 40;
	$price_size_29 = $price_size_28 / 100;
	
} else if (($tuxedo_suits_pants_measurement_waist >= '60.5' && $tuxedo_suits_pants_measurement_waist <= '64') || ($tuxedo_suits_pants_measurement_hips >= '60.5' && $tuxedo_suits_pants_measurement_hips <= '64')) {
	
	$price_size_18 = $tuxedo_suits_fabric_price_1 * 50;
	$price_size_19 = $price_size_18 / 100;
	
	$price_size_20 = $tuxedo_suits_fabric_price_2 * 50;
	$price_size_21 = $price_size_20 / 100;
	
	$price_size_22 = $tuxedo_suits_fabric_price_3 * 50;
	$price_size_23 = $price_size_22 / 100;
	
	$price_size_24 = $tuxedo_suits_fabric_price_4 * 50;
	$price_size_25 = $suits_size_24 / 100;
	
	$price_size_26 = $tuxedo_suits_fabric_price_5 * 50;
	$price_size_27 = $price_size_26 / 100;
	
	$price_size_28 = $tuxedo_suits_fabric_price_6 * 50;
	$price_size_29 = $price_size_28 / 100;
	
} else if (($tuxedo_suits_pants_measurement_waist >= '64.5' && $tuxedo_suits_pants_measurement_waist <= '68') || ($tuxedo_suits_pants_measurement_hips >= '64.5' && $tuxedo_suits_pants_measurement_hips <= '68')) {
	
	$price_size_18 = $tuxedo_suits_fabric_price_1 * 60;
	$price_size_19 = $price_size_18 / 100;
	
	$price_size_20 = $tuxedo_suits_fabric_price_2 * 60;
	$price_size_21 = $price_size_20 / 100;
	
	$price_size_22 = $tuxedo_suits_fabric_price_3 * 60;
	$price_size_23 = $price_size_22 / 100;
	
	$price_size_24 = $tuxedo_suits_fabric_price_4 * 60;
	$price_size_25 = $suits_size_24 / 100;
	
	$price_size_26 = $tuxedo_suits_fabric_price_5 * 60;
	$price_size_27 = $price_size_26 / 100;
	
	$price_size_28 = $tuxedo_suits_fabric_price_6 * 60;
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

$price_size_36 = $price_size_30 + $tuxedo_suits_fabric_price_1;
$price_size_37 = $price_size_31 + $tuxedo_suits_fabric_price_2;
$price_size_38 = $price_size_32 + $tuxedo_suits_fabric_price_3;
$price_size_39 = $price_size_33 + $tuxedo_suits_fabric_price_4;
$price_size_40 = $price_size_34 + $tuxedo_suits_fabric_price_5;
$price_size_41 = $price_size_35 + $tuxedo_suits_fabric_price_6;

/*BUTTON*/
$tuxedo_suits_jacket_button_number = $_POST["tuxedo_suits_jacket_button_number"];

$sql10 = " SELECT price FROM admin_buttons_suits WHERE buttonno = '$tuxedo_suits_jacket_button_number' ";
$query10 = mysql_db_query($dbname, $sql10) or die("Can't Query10");
$row10 = mysql_fetch_array($query10);
$tuxedo_suits_jacket_button_price = $row10["price"];

$tuxedo_suits_pants_button_number = $_POST["tuxedo_suits_pants_button_number"];

$sql11 = " SELECT price FROM admin_buttons_suits WHERE buttonno = '$tuxedo_suits_pants_button_number' ";
$query11 = mysql_db_query($dbname, $sql11) or die("Can't Query11");
$row11 = mysql_fetch_array($query11);
$tuxedo_suits_pants_button_price = $row11["price"];

$tuxedo_suits_pants_back_button_number = $_POST["tuxedo_suits_pants_back_button_number"];

$tuxedo_suits_button_price = $tuxedo_suits_jacket_button_price + $tuxedo_suits_pants_button_price;

$tuxedo_suits_button_price_1 = $price_size_36 + $tuxedo_suits_button_price;
$tuxedo_suits_button_price_2 = $price_size_37 + $tuxedo_suits_button_price;
$tuxedo_suits_button_price_3 = $price_size_38 + $tuxedo_suits_button_price;
$tuxedo_suits_button_price_4 = $price_size_39 + $tuxedo_suits_button_price;
$tuxedo_suits_button_price_5 = $price_size_40 + $tuxedo_suits_button_price;
$tuxedo_suits_button_price_6 = $price_size_41 + $tuxedo_suits_button_price;

$tuxedo_suits_embroidery_collar_initial_or_name = $_POST["tuxedo_suits_embroidery_collar_initial_or_name"];
if ($tuxedo_suits_embroidery_collar_initial_or_name == "") {
	$tuxedo_suits_embroidery_collar_initial_or_name_price = 0;
} else if ($tuxedo_suits_embroidery_collar_initial_or_name != "") {
	$sqlprice1 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Embroidery Collar Felt' ";
	$queryprice1 = mysql_db_query($dbname, $sqlprice1) or die("Can't QueryPrice1");
	$rowprice1 = mysql_fetch_array($queryprice1);
	$tuxedo_suits_embroidery_collar_initial_or_name_price_extra = $rowprice1["0"];
	$tuxedo_suits_embroidery_collar_initial_or_name_price = $tuxedo_suits_embroidery_collar_initial_or_name_price_extra;
}

$tuxedo_suits_brand = $_POST["tuxedo_suits_brand"];
if ($tuxedo_suits_brand == "0") {
	$tuxedo_suits_brand_price = 0;
} else if ($tuxedo_suits_brand != "0") {
	$sqlprice2 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Jacket Branding' ";
	$queryprice2 = mysql_db_query($dbname, $sqlprice2) or die("Can't QueryPrice2");
	$rowprice2 = mysql_fetch_array($queryprice2);
	$tuxedo_suits_brand_price_extra = $rowprice2["0"];
	$tuxedo_suits_brand_price = $tuxedo_suits_brand_price_extra;
}

$tuxedo_suits_pick_stitch = $_POST["tuxedo_suits_pick_stitch"];
$tuxedo_suits_pick_stitch_sleeves = $_POST["tuxedo_suits_pick_stitch_sleeves"];
if ($tuxedo_suits_pick_stitch == "0") {
	$tuxedo_suits_pick_stitch_sleeves_price = 0;
} else if ($tuxedo_suits_pick_stitch == "1" && $tuxedo_suits_pick_stitch_sleeves != "DEFAULT TONAL") {
	$sqlprice3 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Sleeves Pick Stitch' ";
	$queryprice3 = mysql_db_query($dbname, $sqlprice3) or die("Can't QueryPrice3");
	$rowprice3 = mysql_fetch_array($queryprice3);
	$tuxedo_suits_pick_stitch_sleeves_price_extra = $rowprice3["0"];
	$tuxedo_suits_pick_stitch_sleeves_price = $tuxedo_suits_pick_stitch_sleeves_price_extra;
}

$tuxedo_suits_pick_stitch_vest = $_POST["tuxedo_suits_pick_stitch_vest"];
if ($tuxedo_suits_pick_stitch == "0") {
	$tuxedo_suits_pick_stitch_vest_price = 0;
} else if ($tuxedo_suits_pick_stitch == "1" && $tuxedo_suits_pick_stitch_vest != "DEFAULT TONAL") {
	$sqlprice4 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Vent Pick Stitch' ";
	$queryprice4 = mysql_db_query($dbname, $sqlprice4) or die("Can't QueryPrice4");
	$rowprice4 = mysql_fetch_array($queryprice4);
	$tuxedo_suits_pick_stitch_vest_price_extra = $rowprice4["0"];
	$tuxedo_suits_pick_stitch_vest_price = $tuxedo_suits_pick_stitch_vest_price_extra;
}

$tuxedo_suits_elbow_patch = $_POST["tuxedo_suits_elbow_patch"];
if ($tuxedo_suits_elbow_patch == "") {
	$tuxedo_suits_elbow_patch_price = 0;
} else if ($tuxedo_suits_elbow_patch != "") {
	$sqlprice5 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Elbow Patch' ";
	$queryprice5 = mysql_db_query($dbname, $sqlprice5) or die("Can't QueryPrice5");
	$rowprice5 = mysql_fetch_array($queryprice5);
	$tuxedo_suits_elbow_patch_price_extra = $rowprice5["0"];
	$tuxedo_suits_elbow_patch_price = $tuxedo_suits_elbow_patch_price_extra;
}

$tuxedo_suits_canvas = $_POST["tuxedo_suits_canvas"];
if ($tuxedo_suits_canvas != "3") {
	$tuxedo_suits_canvas_price = 0;
} else if ($tuxedo_suits_canvas == "3") {
	$sqlprice6 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Full Canvas' ";
	$queryprice6 = mysql_db_query($dbname, $sqlprice6) or die("Can't QueryPrice6");
	$rowprice6 = mysql_fetch_array($queryprice6);
	$tuxedo_suits_canvas_price_extra = $rowprice6["0"];
	$tuxedo_suits_canvas_price = $tuxedo_suits_canvas_price_extra;
}

$tuxedo_suits_chest_pocket_satin_fabric = $_POST["tuxedo_suits_chest_pocket_satin_fabric"];
if ($tuxedo_suits_chest_pocket_satin_fabric == "") {
	$tuxedo_suits_chest_pocket_satin_fabric_price = 0;
} else if ($tuxedo_suits_chest_pocket_satin_fabric != "") {
	$sqlprice7 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Satin Option on Chest Pocket' ";
	$queryprice7 = mysql_db_query($dbname, $sqlprice7) or die("Can't QueryPrice7");
	$rowprice7 = mysql_fetch_array($queryprice7);
	$tuxedo_suits_chest_pocket_satin_fabric_price_extra = $rowprice7["0"];
	$tuxedo_suits_chest_pocket_satin_fabric_price = $tuxedo_suits_chest_pocket_satin_fabric_price_extra;
}

$tuxedo_suits_lower_pocket_satin_fabric = $_POST["tuxedo_suits_lower_pocket_satin_fabric"];
if ($tuxedo_suits_lower_pocket_satin_fabric == "") {
	$tuxedo_suits_lower_pocket_satin_fabric_price = 0;
} else if ($tuxedo_suits_lower_pocket_satin_fabric != "") {
	$sqlprice8 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Satin Option on Lower Pocket' ";
	$queryprice8 = mysql_db_query($dbname, $sqlprice8) or die("Can't QueryPrice8");
	$rowprice8 = mysql_fetch_array($queryprice8);
	$tuxedo_suits_lower_pocket_satin_fabric_price_extra = $rowprice8["0"];
	$tuxedo_suits_lower_pocket_satin_fabric_price = $tuxedo_suits_lower_pocket_satin_fabric_price_extra;
}

$tuxedo_suits_coin_pocket_inside = $_POST["tuxedo_suits_coin_pocket_inside"];
if ($tuxedo_suits_coin_pocket_inside != "1") {
	$tuxedo_suits_coin_pocket_inside_price = 0;
} else if ($tuxedo_suits_coin_pocket_inside == "1") {
	$sqlprice9 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Coin Pocket Inside' ";
	$queryprice9 = mysql_db_query($dbname, $sqlprice9) or die("Can't QueryPrice9");
	$rowprice9 = mysql_fetch_array($queryprice9);
	$tuxedo_suits_coin_pocket_inside_price_extra = $rowprice9["0"];
	$tuxedo_suits_coin_pocket_inside_price = $tuxedo_suits_coin_pocket_inside_price_extra;
}

$tuxedo_suits_suspender_buttons_inside = $_POST["tuxedo_suits_suspender_buttons_inside"];
if ($tuxedo_suits_suspender_buttons_inside != "1") {
	$tuxedo_suits_suspender_buttons_inside_price = 0;
} else if ($tuxedo_suits_suspender_buttons_inside == "1") {
	$sqlprice10 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Suspender Buttons Inside' ";
	$queryprice10 = mysql_db_query($dbname, $sqlprice10) or die("Can't QueryPrice10");
	$rowprice10 = mysql_fetch_array($queryprice10);
	$tuxedo_suits_suspender_buttons_inside_price_extra = $rowprice10["0"];
	$tuxedo_suits_suspender_buttons_inside_price = $tuxedo_suits_suspender_buttons_inside_price_extra;
}

$tuxedo_suits_split_tabs_back = $_POST["tuxedo_suits_split_tabs_back"];
if ($tuxedo_suits_split_tabs_back != "1") {
	$tuxedo_suits_split_tabs_back_price = 0;
} else if ($tuxedo_suits_split_tabs_back == "1") {
	$sqlprice11 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Split Tabs Back' ";
	$queryprice11 = mysql_db_query($dbname, $sqlprice11) or die("Can't QueryPrice11");
	$rowprice11 = mysql_fetch_array($queryprice11);
	$tuxedo_suits_split_tabs_back_price_extra = $rowprice11["0"];
	$tuxedo_suits_split_tabs_back_price = $tuxedo_suits_split_tabs_back_price_extra;
}

$tuxedo_suits_tuxedo_satin = $_POST["tuxedo_suits_tuxedo_satin"];
if ($tuxedo_suits_tuxedo_satin != "1") {
	$tuxedo_suits_tuxedo_satin_price = 0;
} else if ($tuxedo_suits_tuxedo_satin == "1") {
	$sqlprice12 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Tuxedo Satin on Side' ";
	$queryprice12 = mysql_db_query($dbname, $sqlprice12) or die("Can't QueryPrice12");
	$rowprice12 = mysql_fetch_array($queryprice12);
	$tuxedo_suits_tuxedo_satin_price_extra = $rowprice12["0"];
	$tuxedo_suits_tuxedo_satin_price = $tuxedo_suits_tuxedo_satin_price_extra;
}

$tuxedo_suits_tuxedo_satin_waist_band = $_POST["tuxedo_suits_tuxedo_satin_waist_band"];
if ($tuxedo_suits_tuxedo_satin_waist_band != "1") {
	$tuxedo_suits_tuxedo_satin_waist_band_price = 0;
} else if ($tuxedo_suits_tuxedo_satin_waist_band == "1") {
	$sqlprice13 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Tuxedo Satin Waist Band' ";
	$queryprice13 = mysql_db_query($dbname, $sqlprice13) or die("Can't QueryPrice13");
	$rowprice13 = mysql_fetch_array($queryprice13);
	$tuxedo_suits_tuxedo_satin_waist_band_price_extra = $rowprice13["0"];
	$tuxedo_suits_tuxedo_satin_waist_band_price = $tuxedo_suits_tuxedo_satin_waist_band_price_extra;
}

$tuxedo_suits_very_extended_waistband = $_POST["tuxedo_suits_very_extended_waistband"];
if ($tuxedo_suits_very_extended_waistband != "0") {
	$tuxedo_suits_very_extended_waistband_price = 0;
} else if ($tuxedo_suits_very_extended_waistband == "0") {
	$sqlprice14 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Very Extended Waistband' ";
	$queryprice14 = mysql_db_query($dbname, $sqlprice14) or die("Can't QueryPrice14");
	$rowprice14 = mysql_fetch_array($queryprice14);
	$tuxedo_suits_very_extended_waistband_price_extra = $rowprice14["0"];
	$tuxedo_suits_very_extended_waistband_price = $tuxedo_suits_very_extended_waistband_price_extra;
}

$tuxedo_suits_pants_brand = $_POST["tuxedo_suits_pants_brand"];
if ($tuxedo_suits_pants_brand == "0") {
	$tuxedo_suits_pants_brand_price = 0;
} else if ($tuxedo_suits_pants_brand != "0") {
	$sqlprice15 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Pants Branding' ";
	$queryprice15 = mysql_db_query($dbname, $sqlprice15) or die("Can't QueryPrice15");
	$rowprice15 = mysql_fetch_array($queryprice15);
	$tuxedo_suits_pants_brand_price_extra = $rowprice15["0"];
	$tuxedo_suits_pants_brand_price = $tuxedo_suits_pants_brand_price_extra;
}

$tuxedo_suits_price_1 = $tuxedo_suits_button_price_1 + $tuxedo_suits_embroidery_collar_initial_or_name_price + $tuxedo_suits_brand_price + $tuxedo_suits_pick_stitch_sleeves_price + $tuxedo_suits_pick_stitch_vest_price + $tuxedo_suits_elbow_patch_price + $tuxedo_suits_canvas_price + $tuxedo_suits_chest_pocket_satin_fabric_price +$tuxedo_suits_lower_pocket_satin_fabric_price + $tuxedo_suits_coin_pocket_inside_price + $tuxedo_suits_suspender_buttons_inside_price + $tuxedo_suits_split_tabs_back_price + $tuxedo_suits_tuxedo_satin_price + $tuxedo_suits_tuxedo_satin_waist_band_price + $tuxedo_suits_very_extended_waistband_price + $tuxedo_suits_pants_brand_price;

$tuxedo_suits_price_2 = $tuxedo_suits_button_price_2 + $tuxedo_suits_embroidery_collar_initial_or_name_price + $tuxedo_suits_brand_price + $tuxedo_suits_pick_stitch_sleeves_price + $tuxedo_suits_pick_stitch_vest_price + $tuxedo_suits_elbow_patch_price + $tuxedo_suits_canvas_price + $tuxedo_suits_canvas_price + $tuxedo_suits_chest_pocket_satin_fabric_price +$tuxedo_suits_lower_pocket_satin_fabric_price + $tuxedo_suits_coin_pocket_inside_price + $tuxedo_suits_suspender_buttons_inside_price + $tuxedo_suits_split_tabs_back_price + $tuxedo_suits_tuxedo_satin_price + $tuxedo_suits_tuxedo_satin_waist_band_price + $tuxedo_suits_very_extended_waistband_price + $tuxedo_suits_pants_brand_price;

$tuxedo_suits_price_3 = $tuxedo_suits_button_price_3 + $tuxedo_suits_embroidery_collar_initial_or_name_price + $tuxedo_suits_brand_price + $tuxedo_suits_pick_stitch_sleeves_price + $tuxedo_suits_pick_stitch_vest_price + $tuxedo_suits_elbow_patch_price + $tuxedo_suits_canvas_price + $tuxedo_suits_canvas_price + $tuxedo_suits_chest_pocket_satin_fabric_price +$tuxedo_suits_lower_pocket_satin_fabric_price + $tuxedo_suits_coin_pocket_inside_price + $tuxedo_suits_suspender_buttons_inside_price + $tuxedo_suits_split_tabs_back_price + $tuxedo_suits_tuxedo_satin_price + $tuxedo_suits_tuxedo_satin_waist_band_price + $tuxedo_suits_very_extended_waistband_price + $tuxedo_suits_pants_brand_price;

$tuxedo_suits_price_4 = $tuxedo_suits_button_price_4 + $tuxedo_suits_embroidery_collar_initial_or_name_price + $tuxedo_suits_brand_price + $tuxedo_suits_pick_stitch_sleeves_price + $tuxedo_suits_pick_stitch_vest_price + $tuxedo_suits_elbow_patch_price + $tuxedo_suits_canvas_price + $tuxedo_suits_canvas_price + $tuxedo_suits_chest_pocket_satin_fabric_price +$tuxedo_suits_lower_pocket_satin_fabric_price + $tuxedo_suits_coin_pocket_inside_price + $tuxedo_suits_suspender_buttons_inside_price + $tuxedo_suits_split_tabs_back_price + $tuxedo_suits_tuxedo_satin_price + $tuxedo_suits_tuxedo_satin_waist_band_price + $tuxedo_suits_very_extended_waistband_price + $tuxedo_suits_pants_brand_price;

$tuxedo_suits_price_5 = $tuxedo_suits_button_price_5 + $tuxedo_suits_embroidery_collar_initial_or_name_price + $tuxedo_suits_brand_price + $tuxedo_suits_pick_stitch_sleeves_price + $tuxedo_suits_pick_stitch_vest_price + $tuxedo_suits_elbow_patch_price + $tuxedo_suits_canvas_price + $tuxedo_suits_canvas_price + $tuxedo_suits_chest_pocket_satin_fabric_price +$tuxedo_suits_lower_pocket_satin_fabric_price + $tuxedo_suits_coin_pocket_inside_price + $tuxedo_suits_suspender_buttons_inside_price + $tuxedo_suits_split_tabs_back_price + $tuxedo_suits_tuxedo_satin_price + $tuxedo_suits_tuxedo_satin_waist_band_price + $tuxedo_suits_very_extended_waistband_price + $tuxedo_suits_pants_brand_price;

$tuxedo_suits_price_6 = $tuxedo_suits_button_price_6 + $tuxedo_suits_embroidery_collar_initial_or_name_price + $tuxedo_suits_brand_price + $tuxedo_suits_pick_stitch_sleeves_price + $tuxedo_suits_pick_stitch_vest_price + $tuxedo_suits_elbow_patch_price + $tuxedo_suits_canvas_price + $tuxedo_suits_canvas_price + $tuxedo_suits_chest_pocket_satin_fabric_price +$tuxedo_suits_lower_pocket_satin_fabric_price + $tuxedo_suits_coin_pocket_inside_price + $tuxedo_suits_suspender_buttons_inside_price + $tuxedo_suits_split_tabs_back_price + $tuxedo_suits_tuxedo_satin_price + $tuxedo_suits_tuxedo_satin_waist_band_price + $tuxedo_suits_very_extended_waistband_price + $tuxedo_suits_pants_brand_price;

/*CUSTOMER*/
$tuxedo_suits_customer_name = $_POST["tuxedo_suits_customer_name"];
$tuxedo_suits_order_no = $_POST["tuxedo_suits_order_no"];
$tuxedo_suits_order_date = date("m/d/Y");
$tuxedo_suits_delivery_date = $_POST["tuxedo_suits_delivery_date"];

/*CUSTOMIZE*/
$tuxedo_suits_tuxedo_style = $_POST["tuxedo_suits_tuxedo_style"];
$tuxedo_suits_satin_style = $_POST["tuxedo_suits_satin_style"];
$tuxedo_suits_collar_satin_style = $_POST["tuxedo_suits_collar_satin_style"];
$tuxedo_suits_lapel_satin_style = $_POST["tuxedo_suits_lapel_satin_style"];
$tuxedo_suits_half_satin_option = $_POST["tuxedo_suits_half_satin_option"];
$tuxedo_suits_lapel_style = $_POST["tuxedo_suits_lapel_style"];
$tuxedo_suits_lapel_width = $_POST["tuxedo_suits_lapel_width"];
$tuxedo_suits_lapel_move = $_POST["tuxedo_suits_lapel_move"];
$tuxedo_suits_lapel_color = $_POST["tuxedo_suits_lapel_color"];
$tuxedo_suits_real_lapel_boutonniere = $_POST["tuxedo_suits_real_lapel_boutonniere"];
$tuxedo_suits_vent_style = $_POST["tuxedo_suits_vent_style"];
$tuxedo_suits_pocket_style = $_POST["tuxedo_suits_pocket_style"];
$tuxedo_suits_chest_pocket = $_POST["tuxedo_suits_chest_pocket"];
$tuxedo_suits_chest_pocket_satin = $_POST["tuxedo_suits_chest_pocket_satin"];
$tuxedo_suits_chest_pocket_satin_color = $_POST["tuxedo_suits_chest_pocket_satin_color"];
$tuxedo_suits_chest_pocket_satin_fabric = $_POST["tuxedo_suits_chest_pocket_satin_fabric"];
$tuxedo_suits_lower_pocket_satin = $_POST["tuxedo_suits_lower_pocket_satin"];
$tuxedo_suits_lower_pocket_satin_color = $_POST["tuxedo_suits_lower_pocket_satin_color"];
$tuxedo_suits_lower_pocket_satin_fabric = $_POST["tuxedo_suits_lower_pocket_satin_fabric"];
$tuxedo_suits_shoulder_construction = $_POST["tuxedo_suits_shoulder_construction"];
$tuxedo_suits_sleeve_button = $_POST["tuxedo_suits_sleeve_button"];
$tuxedo_suits_cuff = $_POST["tuxedo_suits_cuff"];
$tuxedo_suits_all_sleevebutton_holes_color = $_POST["tuxedo_suits_all_sleevebutton_holes_color"];
$tuxedo_suits_contrast_last_sleevebutton_holes_color = $_POST["tuxedo_suits_contrast_last_sleevebutton_holes_color"];
$tuxedo_suits_contrast_last_sleevebutton_holes_button = $_POST["tuxedo_suits_contrast_last_sleevebutton_holes_button"];
$tuxedo_suits_lining_style = $_POST["tuxedo_suits_lining_style"];
$tuxedo_suits_canvas = $_POST["tuxedo_suits_canvas"];
$tuxedo_suits_jacket_button_number = $_POST["tuxedo_suits_jacket_button_number"];
$tuxedo_suits_jacket_thread_on_button = $_POST["tuxedo_suits_jacket_thread_on_button"];
$tuxedo_suits_jacket_button_hole_color = $_POST["tuxedo_suits_jacket_button_hole_color"];
$tuxedo_suits_pick_stitch = $_POST["tuxedo_suits_pick_stitch"];
$tuxedo_suits_pick_stitch_lapel_color = $_POST["tuxedo_suits_pick_stitch_lapel_color"];
$tuxedo_suits_pick_stitch_pocket_color = $_POST["tuxedo_suits_pick_stitch_pocket_color"];
$tuxedo_suits_pick_stitch_sleeves = $_POST["tuxedo_suits_pick_stitch_sleeves"];
$tuxedo_suits_pick_stitch_vest = $_POST["tuxedo_suits_pick_stitch_vest"];
$tuxedo_suits_embroidery_inside_initial_or_name = $_POST["tuxedo_suits_embroidery_inside_initial_or_name"];
$tuxedo_suits_embroidery_inside_color = $_POST["tuxedo_suits_embroidery_inside_color"];
$tuxedo_suits_embroidery_inside_design = $_POST["tuxedo_suits_embroidery_inside_design"];
$tuxedo_suits_embroidery_collar_initial_or_name = $_POST["tuxedo_suits_embroidery_collar_initial_or_name"];
$tuxedo_suits_embroidery_collar_color = $_POST["tuxedo_suits_embroidery_collar_color"];
$tuxedo_suits_embroidery_collar_design = $_POST["tuxedo_suits_embroidery_collar_design"];
$tuxedo_suits_brand = $_POST["tuxedo_suits_brand"];
$tuxedo_suits_elbow_patch = $_POST["tuxedo_suits_elbow_patch"];
$tuxedo_suits_collar_felt_color = $_POST["tuxedo_suits_collar_felt_color"];
$tuxedo_suits_front_pleat = $_POST["tuxedo_suits_front_pleat"];
$tuxedo_suits_front_pocket = $_POST["tuxedo_suits_front_pocket"];
$tuxedo_suits_back_pocket = $_POST["tuxedo_suits_back_pocket"];
$tuxedo_suits_no_back_pocket = $_POST["tuxedo_suits_no_back_pocket"];
$tuxedo_suits_pants_thread_on_button = $_POST["tuxedo_suits_pants_thread_on_button"];
$tuxedo_suits_pants_button_hole_color = $_POST["tuxedo_suits_pants_button_hole_color"];
$tuxedo_suits_fastening = $_POST["tuxedo_suits_fastening"];
$tuxedo_suits_fly_option = $_POST["tuxedo_suits_fly_option"];
$tuxedo_suits_fly_option_zip = $_POST["tuxedo_suits_fly_option_zip"];
$tuxedo_suits_band_edge_style = $_POST["tuxedo_suits_band_edge_style"];
$tuxedo_suits_very_extended_waistband = $_POST["tuxedo_suits_very_extended_waistband"];
$tuxedo_suits_waistband_width = $_POST["tuxedo_suits_waistband_width"];
$tuxedo_suits_pants_cuff = $_POST["tuxedo_suits_pants_cuff"];
$tuxedo_suits_pants_cuff_width = $_POST["tuxedo_suits_pants_cuff_width"];
$tuxedo_suits_belt = $_POST["tuxedo_suits_belt"];
$tuxedo_suits_pants_lining_style = $_POST["tuxedo_suits_pants_lining_style"];
$tuxedo_suits_embroidery_waist_initial_or_name = $_POST["tuxedo_suits_embroidery_waist_initial_or_name"];
$tuxedo_suits_embroidery_waist_color = $_POST["tuxedo_suits_embroidery_waist_color"];
$tuxedo_suits_embroidery_waist_design = $_POST["tuxedo_suits_embroidery_waist_design"];
$tuxedo_suits_embroidery_cuffs_initial_or_name = $_POST["tuxedo_suits_embroidery_cuffs_initial_or_name"];
$tuxedo_suits_embroidery_cuffs_color = $_POST["tuxedo_suits_embroidery_cuffs_color"];
$tuxedo_suits_embroidery_cuffs_design = $_POST["tuxedo_suits_embroidery_cuffs_design"];
$tuxedo_suits_pants_brand = $_POST["tuxedo_suits_pants_brand"];
$tuxedo_suits_coin_pocket_inside = $_POST["tuxedo_suits_coin_pocket_inside"];
$tuxedo_suits_suspender_buttons_inside = $_POST["tuxedo_suits_suspender_buttons_inside"];
$tuxedo_suits_split_tabs_back = $_POST["tuxedo_suits_split_tabs_back"];
$tuxedo_suits_tuxedo_satin = $_POST["tuxedo_suits_tuxedo_satin"];
$tuxedo_suits_tuxedo_satin_waist_band = $_POST["tuxedo_suits_tuxedo_satin_waist_band"];

/*MEASUREMENTS*/
$tuxedo_suits_jacket_measurement_sex = $_POST["tuxedo_suits_jacket_measurement_sex"];
$tuxedo_suits_jacket_measurement_fit = $_POST["tuxedo_suits_jacket_measurement_fit"];
$tuxedo_suits_jacket_measurement = $_POST["tuxedo_suits_jacket_measurement"];
$tuxedo_suits_jacket_measurement_jacket_length = $_POST["tuxedo_suits_jacket_measurement_jacket_length"];
$tuxedo_suits_jacket_measurement_back_lenght = $_POST["tuxedo_suits_jacket_measurement_back_lenght"];
$tuxedo_suits_jacket_measurement_shoulders = $_POST["tuxedo_suits_jacket_measurement_shoulders"];
$tuxedo_suits_jacket_measurement_neck = $_POST["tuxedo_suits_jacket_measurement_neck"];
$tuxedo_suits_jacket_measurement_ptp_front = $_POST["tuxedo_suits_jacket_measurement_ptp_front"];
$tuxedo_suits_jacket_measurement_ptp_back = $_POST["tuxedo_suits_jacket_measurement_ptp_back"];
$tuxedo_suits_jacket_measurement_arm_hole = $_POST["tuxedo_suits_jacket_measurement_arm_hole"];
$tuxedo_suits_jacket_measurement_biceps = $_POST["tuxedo_suits_jacket_measurement_biceps"];
$tuxedo_suits_jacket_measurement_sleeves_right = $_POST["tuxedo_suits_jacket_measurement_sleeves_right"];
$tuxedo_suits_jacket_measurement_sleeves_left = $_POST["tuxedo_suits_jacket_measurement_sleeves_left"];
$tuxedo_suits_jacket_measurement_wrist_right = $_POST["tuxedo_suits_jacket_measurement_wrist_right"];
$tuxedo_suits_jacket_measurement_wrist_left = $_POST["tuxedo_suits_jacket_measurement_wrist_left"];
$tuxedo_suits_jacket_measurement_first_button = $_POST["tuxedo_suits_jacket_measurement_first_button"];
$tuxedo_suits_jacket_measurement_shoulder_upper_wrist = $_POST["tuxedo_suits_jacket_measurement_shoulder_upper_wrist"];
$tuxedo_suits_jacket_measurement_shoulder_lower_wrist = $_POST["tuxedo_suits_jacket_measurement_shoulder_lower_wrist"];
$tuxedo_suits_pants_measurement_sex = $_POST["tuxedo_suits_pants_measurement_sex"];
$tuxedo_suits_pants_measurement_length = $_POST["tuxedo_suits_pants_measurement_length"];
$tuxedo_suits_pants_measurement_fit = $_POST["tuxedo_suits_pants_measurement_fit"];
$tuxedo_suits_pants_measurement = $_POST["tuxedo_suits_pants_measurement"];
$tuxedo_suits_pants_measurement_crotch_full = $_POST["tuxedo_suits_pants_measurement_crotch_full"];
$tuxedo_suits_pants_measurement_crotch_front = $_POST["tuxedo_suits_pants_measurement_crotch_front"];
$tuxedo_suits_pants_measurement_crotch_back = $_POST["tuxedo_suits_pants_measurement_crotch_back"];
$tuxedo_suits_pants_measurement_inseam_length = $_POST["tuxedo_suits_pants_measurement_inseam_length"];
$tuxedo_suits_pants_measurement_thighs = $_POST["tuxedo_suits_pants_measurement_thighs"];
$tuxedo_suits_pants_measurement_knees = $_POST["tuxedo_suits_pants_measurement_knees"];
$tuxedo_suits_pants_measurement_cuffs_ankle = $_POST["tuxedo_suits_pants_measurement_cuffs_ankle"];
$tuxedo_suits_pants_measurement_length_outleg = $_POST["tuxedo_suits_pants_measurement_length_outleg"];
$tuxedo_suits_pants_measurement_only_crotch = $_POST["tuxedo_suits_pants_measurement_only_crotch"];
$tuxedo_suits_pants_measurement_front_rise = $_POST["tuxedo_suits_pants_measurement_front_rise"];
$tuxedo_suits_pants_measurement_cuffs = $_POST["tuxedo_suits_pants_measurement_cuffs"];
$tuxedo_suits_measurement_jacket_shoulder = $_POST["tuxedo_suits_measurement_jacket_shoulder"];
$tuxedo_suits_measurement_jacket_waist = $_POST["tuxedo_suits_measurement_jacket_waist"];
$tuxedo_suits_measurement_jacket_chest = $_POST["tuxedo_suits_measurement_jacket_chest"];
$tuxedo_suits_measurement_pants_waist = $_POST["tuxedo_suits_measurement_pants_waist"];
$tuxedo_suits_measurement_pants_bottom = $_POST["tuxedo_suits_measurement_pants_bottom"];
$tuxedo_suits_body_front = $_POST["tuxedo_suits_body_front"];
$tuxedo_suits_body_left = $_POST["tuxedo_suits_body_left"];
$tuxedo_suits_body_right = $_POST["tuxedo_suits_body_right"];
$tuxedo_suits_body_back = $_POST["tuxedo_suits_body_back"];
$tuxedo_suits_remark = $_POST["tuxedo_suits_remark"];

/*ECT*/
$tuxedo_suits_date = date("m/d/Y");
$tuxedo_suits_time = date("H:i:s");
$tuxedo_suits_ip = $_POST['ip'];
$tuxedo_suits_status = T;

/*FABRIC 1*/
if ($tuxedo_suits_fabric_no_1 != "" && $tuxedo_suits_lining_no_1 != "") {

$sql11 = " SELECT MAX(id) FROM customize_order ";
$query11 = mysql_db_query($dbname, $sql11) or die("Can't Query11");
$row11 = mysql_fetch_array($query11);
$id_order = $row11[0] + 1 ;

$sql12 = " SELECT MAX(product_id) FROM customize_order";
$query12 = mysql_db_query($dbname, $sql12) or die("Can't Query12");
$row12 = mysql_fetch_array($query12);
$product_id = $row12[0] + 1 ;

$sql13 = " SELECT MAX(id) FROM customize_tuxedo_suits_design ";
$query13 = mysql_db_query($dbname, $sql13) or die("Can't Query13");
$row13 = mysql_fetch_array($query13);
$id_tuxedo_suits = $row13[0] + 1 ;

$sql14 = " INSERT INTO customize_order (id, order_id, product_id, order_reseller, order_order_no, order_name_customize, order_price, order_product, order_fabric_no, order_date, order_time, order_ip, order_status) VALUES ('$id_order', '$order_id', '$product_id', '$company_user', '$tuxedo_suits_order_no', '$tuxedo_suits_customer_name', '$tuxedo_suits_price_1', '$order_product', '$tuxedo_suits_fabric_no_1', '$tuxedo_suits_date', '$tuxedo_suits_time', '$tuxedo_suits_ip', '$tuxedo_suits_status') ";
$query14 = mysql_query($sql14) or die("Can't Query14");

$sql15 = " INSERT INTO customize_tuxedo_suits_design (id, order_id, product_id, tuxedo_suits_customer_name, tuxedo_suits_order_no, tuxedo_suits_order_date, tuxedo_suits_delivery_date, tuxedo_suits_fabric_no, tuxedo_suits_lining_no, tuxedo_suits_tuxedo_style, tuxedo_suits_satin_style, tuxedo_suits_collar_satin_style, tuxedo_suits_lapel_satin_style, tuxedo_suits_half_satin_option, tuxedo_suits_lapel_style, tuxedo_suits_lapel_width, tuxedo_suits_lapel_move, tuxedo_suits_lapel_color, tuxedo_suits_real_lapel_boutonniere, tuxedo_suits_vent_style, tuxedo_suits_pocket_style, tuxedo_suits_chest_pocket, tuxedo_suits_chest_pocket_satin, tuxedo_suits_chest_pocket_satin_color, tuxedo_suits_chest_pocket_satin_fabric, tuxedo_suits_lower_pocket_satin, tuxedo_suits_lower_pocket_satin_color, tuxedo_suits_lower_pocket_satin_fabric, tuxedo_suits_shoulder_construction, tuxedo_suits_sleeve_button, tuxedo_suits_cuff, tuxedo_suits_all_sleevebutton_holes_color, tuxedo_suits_contrast_last_sleevebutton_holes_color, tuxedo_suits_contrast_last_sleevebutton_holes_button, tuxedo_suits_lining_style, tuxedo_suits_canvas, tuxedo_suits_jacket_button_number, tuxedo_suits_jacket_thread_on_button, tuxedo_suits_jacket_button_hole_color, tuxedo_suits_pick_stitch, tuxedo_suits_pick_stitch_lapel_color, tuxedo_suits_pick_stitch_pocket_color, tuxedo_suits_pick_stitch_sleeves, tuxedo_suits_pick_stitch_vest, tuxedo_suits_embroidery_inside_initial_or_name, tuxedo_suits_embroidery_inside_color, tuxedo_suits_embroidery_inside_design, tuxedo_suits_embroidery_collar_initial_or_name, tuxedo_suits_embroidery_collar_color, tuxedo_suits_embroidery_collar_design, tuxedo_suits_brand, tuxedo_suits_elbow_patch, tuxedo_suits_collar_felt_color, tuxedo_suits_front_pleat, tuxedo_suits_front_pocket, tuxedo_suits_back_pocket, tuxedo_suits_no_back_pocket, tuxedo_suits_pants_back_button_number, tuxedo_suits_pants_button_number, tuxedo_suits_pants_thread_on_button, tuxedo_suits_pants_button_hole_color, tuxedo_suits_fastening, tuxedo_suits_fly_option, tuxedo_suits_fly_option_zip, tuxedo_suits_band_edge_style, tuxedo_suits_very_extended_waistband, tuxedo_suits_waistband_width, tuxedo_suits_pants_cuff, tuxedo_suits_pants_cuff_width, tuxedo_suits_belt, tuxedo_suits_pants_lining_style, tuxedo_suits_embroidery_waist_initial_or_name, tuxedo_suits_embroidery_waist_color, tuxedo_suits_embroidery_waist_design, tuxedo_suits_embroidery_cuffs_initial_or_name, tuxedo_suits_embroidery_cuffs_color, tuxedo_suits_embroidery_cuffs_design, tuxedo_suits_pants_brand, tuxedo_suits_coin_pocket_inside, tuxedo_suits_suspender_buttons_inside, tuxedo_suits_split_tabs_back, tuxedo_suits_tuxedo_satin, tuxedo_suits_tuxedo_satin_waist_band, tuxedo_suits_date, tuxedo_suits_time, tuxedo_suits_ip, tuxedo_suits_status) VALUES ('$id_tuxedo_suits', '$order_id', '$product_id', '$tuxedo_suits_customer_name', '$tuxedo_suits_order_no', '$tuxedo_suits_order_date', '$tuxedo_suits_delivery_date', '$tuxedo_suits_fabric_no_1', '$tuxedo_suits_lining_no_1', '$tuxedo_suits_tuxedo_style', '$tuxedo_suits_satin_style', '$tuxedo_suits_collar_satin_style', '$tuxedo_suits_lapel_satin_style', '$tuxedo_suits_half_satin_option', '$tuxedo_suits_lapel_style', '$tuxedo_suits_lapel_width', '$tuxedo_suits_lapel_move', '$tuxedo_suits_lapel_color', '$tuxedo_suits_real_lapel_boutonniere', '$tuxedo_suits_vent_style', '$tuxedo_suits_pocket_style', '$tuxedo_suits_chest_pocket', '$tuxedo_suits_chest_pocket_satin', '$tuxedo_suits_chest_pocket_satin_color', '$tuxedo_suits_chest_pocket_satin_fabric', '$tuxedo_suits_lower_pocket_satin', '$tuxedo_suits_lower_pocket_satin_color', '$tuxedo_suits_lower_pocket_satin_fabric', '$tuxedo_suits_shoulder_construction', '$tuxedo_suits_sleeve_button', '$tuxedo_suits_cuff', '$tuxedo_suits_all_sleevebutton_holes_color', '$tuxedo_suits_contrast_last_sleevebutton_holes_color', '$tuxedo_suits_contrast_last_sleevebutton_holes_button', '$tuxedo_suits_lining_style', '$tuxedo_suits_canvas', '$tuxedo_suits_jacket_button_number', '$tuxedo_suits_jacket_thread_on_button', '$tuxedo_suits_jacket_button_hole_color', '$tuxedo_suits_pick_stitch', '$tuxedo_suits_pick_stitch_lapel_color', '$tuxedo_suits_pick_stitch_pocket_color', '$tuxedo_suits_pick_stitch_sleeves', '$tuxedo_suits_pick_stitch_vest', '$tuxedo_suits_embroidery_inside_initial_or_name', '$tuxedo_suits_embroidery_inside_color', '$tuxedo_suits_embroidery_inside_design', '$tuxedo_suits_embroidery_collar_initial_or_name', '$tuxedo_suits_embroidery_collar_color', '$tuxedo_suits_embroidery_collar_design', '$tuxedo_suits_brand', '$tuxedo_suits_elbow_patch', '$tuxedo_suits_collar_felt_color', '$tuxedo_suits_front_pleat', '$tuxedo_suits_front_pocket', '$tuxedo_suits_back_pocket', '$tuxedo_suits_no_back_pocket', '$tuxedo_suits_pants_back_button_number', '$tuxedo_suits_pants_button_number', '$tuxedo_suits_pants_thread_on_button', '$tuxedo_suits_pants_button_hole_color', '$tuxedo_suits_fastening', '$tuxedo_suits_fly_option', '$tuxedo_suits_fly_option_zip', '$tuxedo_suits_band_edge_style', '$tuxedo_suits_very_extended_waistband', '$tuxedo_suits_waistband_width', '$tuxedo_suits_pants_cuff', '$tuxedo_suits_pants_cuff_width', '$tuxedo_suits_belt', '$tuxedo_suits_pants_lining_style', '$tuxedo_suits_embroidery_waist_initial_or_name', '$tuxedo_suits_embroidery_waist_color', '$tuxedo_suits_embroidery_waist_design', '$tuxedo_suits_embroidery_cuffs_initial_or_name', '$tuxedo_suits_embroidery_cuffs_color', '$tuxedo_suits_embroidery_cuffs_design', '$tuxedo_suits_pants_brand', '$tuxedo_suits_coin_pocket_inside', '$tuxedo_suits_suspender_buttons_inside', '$tuxedo_suits_split_tabs_back', '$tuxedo_suits_tuxedo_satin', '$tuxedo_suits_tuxedo_satin_waist_band', '$tuxedo_suits_date', '$tuxedo_suits_time', '$tuxedo_suits_ip', '$tuxedo_suits_status') ";
$query15 = mysql_query($sql15) or die("Can't Query15");

$sql16 = " INSERT INTO customize_tuxedo_suits_measurements (id, order_id, product_id, tuxedo_suits_jacket_measurement_sex, tuxedo_suits_jacket_measurement_fit, tuxedo_suits_jacket_measurement, tuxedo_suits_jacket_measurement_jacket_length, tuxedo_suits_jacket_measurement_back_lenght, tuxedo_suits_jacket_measurement_chest, tuxedo_suits_jacket_measurement_waist_upper, tuxedo_suits_jacket_measurement_waist_lower, tuxedo_suits_jacket_measurement_hips, tuxedo_suits_jacket_measurement_shoulders, tuxedo_suits_jacket_measurement_neck, tuxedo_suits_jacket_measurement_ptp_front, tuxedo_suits_jacket_measurement_ptp_back, tuxedo_suits_jacket_measurement_arm_hole, tuxedo_suits_jacket_measurement_biceps, tuxedo_suits_jacket_measurement_sleeves_right, tuxedo_suits_jacket_measurement_sleeves_left, tuxedo_suits_jacket_measurement_wrist_right, tuxedo_suits_jacket_measurement_wrist_left, tuxedo_suits_jacket_measurement_first_button, tuxedo_suits_jacket_measurement_shoulder_upper_wrist, tuxedo_suits_jacket_measurement_shoulder_lower_wrist, tuxedo_suits_pants_measurement_sex, tuxedo_suits_pants_measurement_length, tuxedo_suits_pants_measurement_fit, tuxedo_suits_pants_measurement, tuxedo_suits_pants_measurement_waist, tuxedo_suits_pants_measurement_hips, tuxedo_suits_pants_measurement_crotch_full, tuxedo_suits_pants_measurement_crotch_front, tuxedo_suits_pants_measurement_crotch_back, tuxedo_suits_pants_measurement_inseam_length, tuxedo_suits_pants_measurement_thighs, tuxedo_suits_pants_measurement_knees, tuxedo_suits_pants_measurement_cuffs_ankle, tuxedo_suits_pants_measurement_length_outleg, tuxedo_suits_pants_measurement_only_crotch, tuxedo_suits_pants_measurement_front_rise, tuxedo_suits_pants_measurement_cuffs, tuxedo_suits_measurement_jacket_shoulder, tuxedo_suits_measurement_jacket_waist, tuxedo_suits_measurement_jacket_chest, tuxedo_suits_measurement_pants_waist, tuxedo_suits_measurement_pants_bottom, tuxedo_suits_remark, tuxedo_suits_date, tuxedo_suits_time, tuxedo_suits_ip, tuxedo_suits_status) VALUES ('$id_tuxedo_suits', '$order_id', '$product_id', '$tuxedo_suits_jacket_measurement_sex', '$tuxedo_suits_jacket_measurement_fit', '$tuxedo_suits_jacket_measurement', '$tuxedo_suits_jacket_measurement_jacket_length', '$tuxedo_suits_jacket_measurement_back_lenght', '$tuxedo_suits_jacket_measurement_chest', '$tuxedo_suits_jacket_measurement_waist_upper', '$tuxedo_suits_jacket_measurement_waist_lower', '$tuxedo_suits_jacket_measurement_hips', '$tuxedo_suits_jacket_measurement_shoulders', '$tuxedo_suits_jacket_measurement_neck', '$tuxedo_suits_jacket_measurement_ptp_front', '$tuxedo_suits_jacket_measurement_ptp_back', '$tuxedo_suits_jacket_measurement_arm_hole', '$tuxedo_suits_jacket_measurement_biceps', '$tuxedo_suits_jacket_measurement_sleeves_right', '$tuxedo_suits_jacket_measurement_sleeves_left', '$tuxedo_suits_jacket_measurement_wrist_right', '$tuxedo_suits_jacket_measurement_wrist_left', '$tuxedo_suits_jacket_measurement_first_button', '$tuxedo_suits_jacket_measurement_shoulder_upper_wrist', '$tuxedo_suits_jacket_measurement_shoulder_lower_wrist', '$tuxedo_suits_pants_measurement_sex', '$tuxedo_suits_pants_measurement_length', '$tuxedo_suits_pants_measurement_fit', '$tuxedo_suits_pants_measurement', '$tuxedo_suits_pants_measurement_waist', '$tuxedo_suits_pants_measurement_hips', '$tuxedo_suits_pants_measurement_crotch_full', '$tuxedo_suits_pants_measurement_crotch_front', '$tuxedo_suits_pants_measurement_crotch_back', '$tuxedo_suits_pants_measurement_inseam_length', '$tuxedo_suits_pants_measurement_thighs', '$tuxedo_suits_pants_measurement_knees', '$tuxedo_suits_pants_measurement_cuffs_ankle', '$tuxedo_suits_pants_measurement_length_outleg', '$tuxedo_suits_pants_measurement_only_crotch', '$tuxedo_suits_pants_measurement_front_rise', '$tuxedo_suits_pants_measurement_cuffs', '$tuxedo_suits_measurement_jacket_shoulder', '$tuxedo_suits_measurement_jacket_waist', '$tuxedo_suits_measurement_jacket_chest', '$tuxedo_suits_measurement_pants_waist', '$tuxedo_suits_measurement_pants_bottom', '$tuxedo_suits_remark', '$tuxedo_suits_date', '$tuxedo_suits_time', '$tuxedo_suits_ip', '$tuxedo_suits_status') ";
$query16 = mysql_query($sql16) or die("Can't Query16");

$path = "../../images/body/tuxedo_suits/front/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['tuxedo_suits_body_front']['name'];
	$tmp = $_FILES['tuxedo_suits_body_front']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$tuxedo_suits_body_front_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$tuxedo_suits_body_front_pic)){
				
				$sql17 = " UPDATE customize_tuxedo_suits_measurements SET tuxedo_suits_body_front = '".$tuxedo_suits_body_front_pic."', tuxedo_suits_date = '".$tuxedo_suits_date."', tuxedo_suits_time = '".$tuxedo_suits_time."', tuxedo_suits_ip = '".$tuxedo_suits_ip."', tuxedo_suits_status = '".$tuxedo_suits_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query17 = mysql_db_query($dbname, $sql17) or die("Can't Query17");
			}
    
	} else {
				$sql17 = " UPDATE customize_tuxedo_suits_measurements SET tuxedo_suits_date = '".$tuxedo_suits_date."', tuxedo_suits_time = '".$tuxedo_suits_time."', tuxedo_suits_ip = '".$tuxedo_suits_ip."', tuxedo_suits_status = '".$tuxedo_suits_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query17 = mysql_db_query($dbname, $sql17) or die("Can't Query17");
			}
	}
	
$path = "../../images/body/tuxedo_suits/left/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['tuxedo_suits_body_left']['name'];
	$tmp = $_FILES['tuxedo_suits_body_left']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$tuxedo_suits_body_left_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$tuxedo_suits_body_left_pic)){
				
				$sql18 = " UPDATE customize_tuxedo_suits_measurements SET tuxedo_suits_body_left = '".$tuxedo_suits_body_left_pic."', tuxedo_suits_date = '".$tuxedo_suits_date."', tuxedo_suits_time = '".$tuxedo_suits_time."', tuxedo_suits_ip = '".$tuxedo_suits_ip."', tuxedo_suits_status = '".$tuxedo_suits_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query18 = mysql_db_query($dbname, $sql18) or die("Can't Query18");
			}
    
	} else {
				$sql18 = " UPDATE customize_tuxedo_suits_measurements SET tuxedo_suits_date = '".$tuxedo_suits_date."', tuxedo_suits_time = '".$tuxedo_suits_time."', tuxedo_suits_ip = '".$tuxedo_suits_ip."', tuxedo_suits_status = '".$tuxedo_suits_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query18 = mysql_db_query($dbname, $sql18) or die("Can't Query18");
			}
	}
	
$path = "../../images/body/tuxedo_suits/right/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['tuxedo_suits_body_right']['name'];
	$tmp = $_FILES['tuxedo_suits_body_right']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$tuxedo_suits_body_right_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$tuxedo_suits_body_right_pic)){
				
				$sql19 = " UPDATE customize_tuxedo_suits_measurements SET tuxedo_suits_body_right = '".$tuxedo_suits_body_right_pic."', tuxedo_suits_date = '".$tuxedo_suits_date."', tuxedo_suits_time = '".$tuxedo_suits_time."', tuxedo_suits_ip = '".$tuxedo_suits_ip."', tuxedo_suits_status = '".$tuxedo_suits_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query19 = mysql_db_query($dbname, $sql19) or die("Can't Query19");
			}
    
	} else {
				$sql19 = " UPDATE customize_tuxedo_suits_measurements SET tuxedo_suits_date = '".$tuxedo_suits_date."', tuxedo_suits_time = '".$tuxedo_suits_time."', tuxedo_suits_ip = '".$tuxedo_suits_ip."', tuxedo_suits_status = '".$tuxedo_suits_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query19 = mysql_db_query($dbname, $sql19) or die("Can't Query19");
			}
	}
	
$path = "../../images/body/tuxedo_suits/back/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['tuxedo_suits_body_back']['name'];
	$tmp = $_FILES['tuxedo_suits_body_back']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$tuxedo_suits_body_back_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$tuxedo_suits_body_back_pic)){
				
				$sql20 = " UPDATE customize_tuxedo_suits_measurements SET tuxedo_suits_body_back = '".$tuxedo_suits_body_back_pic."', tuxedo_suits_date = '".$tuxedo_suits_date."', tuxedo_suits_time = '".$tuxedo_suits_time."', tuxedo_suits_ip = '".$tuxedo_suits_ip."', tuxedo_suits_status = '".$tuxedo_suits_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query20 = mysql_db_query($dbname, $sql20) or die("Can't Query20");
			}
    
	} else {
				$sql20 = " UPDATE customize_tuxedo_suits_measurements SET tuxedo_suits_date = '".$tuxedo_suits_date."', tuxedo_suits_time = '".$tuxedo_suits_time."', tuxedo_suits_ip = '".$tuxedo_suits_ip."', tuxedo_suits_status = '".$tuxedo_suits_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query20 = mysql_db_query($dbname, $sql20) or die("Can't Query20");
			}
	}

} else if ($tuxedo_suits_fabric_no_1 == "" || $tuxedo_suits_lining_no_1 == "") { }

/*FABRIC 2*/
if ($tuxedo_suits_fabric_no_2 != "" && $tuxedo_suits_lining_no_2 != "") {

$sql11 = " SELECT MAX(id) FROM customize_order ";
$query11 = mysql_db_query($dbname, $sql11) or die("Can't Query11");
$row11 = mysql_fetch_array($query11);
$id_order = $row11[0] + 1 ;

$sql12 = " SELECT MAX(product_id) FROM customize_order";
$query12 = mysql_db_query($dbname, $sql12) or die("Can't Query12");
$row12 = mysql_fetch_array($query12);
$product_id = $row12[0] + 1 ;

$sql13 = " SELECT MAX(id) FROM customize_tuxedo_suits_design ";
$query13 = mysql_db_query($dbname, $sql13) or die("Can't Query13");
$row13 = mysql_fetch_array($query13);
$id_tuxedo_suits = $row13[0] + 1 ;

$sql14 = " INSERT INTO customize_order (id, order_id, product_id, order_reseller, order_order_no, order_name_customize, order_price, order_product, order_fabric_no, order_date, order_time, order_ip, order_status) VALUES ('$id_order', '$order_id', '$product_id', '$company_user', '$tuxedo_suits_order_no', '$tuxedo_suits_customer_name', '$tuxedo_suits_price_2', '$order_product', '$tuxedo_suits_fabric_no_2', '$tuxedo_suits_date', '$tuxedo_suits_time', '$tuxedo_suits_ip', '$tuxedo_suits_status') ";
$query14 = mysql_query($sql14) or die("Can't Query14");

$sql15 = " INSERT INTO customize_tuxedo_suits_design (id, order_id, product_id, tuxedo_suits_customer_name, tuxedo_suits_order_no, tuxedo_suits_order_date, tuxedo_suits_delivery_date, tuxedo_suits_fabric_no, tuxedo_suits_lining_no, tuxedo_suits_tuxedo_style, tuxedo_suits_satin_style, tuxedo_suits_collar_satin_style, tuxedo_suits_lapel_satin_style, tuxedo_suits_half_satin_option, tuxedo_suits_lapel_style, tuxedo_suits_lapel_width, tuxedo_suits_lapel_move, tuxedo_suits_lapel_color, tuxedo_suits_real_lapel_boutonniere, tuxedo_suits_vent_style, tuxedo_suits_pocket_style, tuxedo_suits_chest_pocket, tuxedo_suits_chest_pocket_satin, tuxedo_suits_chest_pocket_satin_color, tuxedo_suits_chest_pocket_satin_fabric, tuxedo_suits_lower_pocket_satin, tuxedo_suits_lower_pocket_satin_color, tuxedo_suits_lower_pocket_satin_fabric, tuxedo_suits_shoulder_construction, tuxedo_suits_sleeve_button, tuxedo_suits_cuff, tuxedo_suits_all_sleevebutton_holes_color, tuxedo_suits_contrast_last_sleevebutton_holes_color, tuxedo_suits_contrast_last_sleevebutton_holes_button, tuxedo_suits_lining_style, tuxedo_suits_canvas, tuxedo_suits_jacket_button_number, tuxedo_suits_jacket_thread_on_button, tuxedo_suits_jacket_button_hole_color, tuxedo_suits_pick_stitch, tuxedo_suits_pick_stitch_lapel_color, tuxedo_suits_pick_stitch_pocket_color, tuxedo_suits_pick_stitch_sleeves, tuxedo_suits_pick_stitch_vest, tuxedo_suits_embroidery_inside_initial_or_name, tuxedo_suits_embroidery_inside_color, tuxedo_suits_embroidery_inside_design, tuxedo_suits_embroidery_collar_initial_or_name, tuxedo_suits_embroidery_collar_color, tuxedo_suits_embroidery_collar_design, tuxedo_suits_brand, tuxedo_suits_elbow_patch, tuxedo_suits_collar_felt_color, tuxedo_suits_front_pleat, tuxedo_suits_front_pocket, tuxedo_suits_back_pocket, tuxedo_suits_no_back_pocket, tuxedo_suits_pants_back_button_number, tuxedo_suits_pants_button_number, tuxedo_suits_pants_thread_on_button, tuxedo_suits_pants_button_hole_color, tuxedo_suits_fastening, tuxedo_suits_fly_option, tuxedo_suits_fly_option_zip, tuxedo_suits_band_edge_style, tuxedo_suits_very_extended_waistband, tuxedo_suits_waistband_width, tuxedo_suits_pants_cuff, tuxedo_suits_pants_cuff_width, tuxedo_suits_belt, tuxedo_suits_pants_lining_style, tuxedo_suits_embroidery_waist_initial_or_name, tuxedo_suits_embroidery_waist_color, tuxedo_suits_embroidery_waist_design, tuxedo_suits_embroidery_cuffs_initial_or_name, tuxedo_suits_embroidery_cuffs_color, tuxedo_suits_embroidery_cuffs_design, tuxedo_suits_pants_brand, tuxedo_suits_coin_pocket_inside, tuxedo_suits_suspender_buttons_inside, tuxedo_suits_split_tabs_back, tuxedo_suits_tuxedo_satin, tuxedo_suits_tuxedo_satin_waist_band, tuxedo_suits_date, tuxedo_suits_time, tuxedo_suits_ip, tuxedo_suits_status) VALUES ('$id_tuxedo_suits', '$order_id', '$product_id', '$tuxedo_suits_customer_name', '$tuxedo_suits_order_no', '$tuxedo_suits_order_date', '$tuxedo_suits_delivery_date', '$tuxedo_suits_fabric_no_2', '$tuxedo_suits_lining_no_2', '$tuxedo_suits_tuxedo_style', '$tuxedo_suits_satin_style', '$tuxedo_suits_collar_satin_style', '$tuxedo_suits_lapel_satin_style', '$tuxedo_suits_half_satin_option', '$tuxedo_suits_lapel_style', '$tuxedo_suits_lapel_width', '$tuxedo_suits_lapel_move', '$tuxedo_suits_lapel_color', '$tuxedo_suits_real_lapel_boutonniere', '$tuxedo_suits_vent_style', '$tuxedo_suits_pocket_style', '$tuxedo_suits_chest_pocket', '$tuxedo_suits_chest_pocket_satin', '$tuxedo_suits_chest_pocket_satin_color', '$tuxedo_suits_chest_pocket_satin_fabric', '$tuxedo_suits_lower_pocket_satin', '$tuxedo_suits_lower_pocket_satin_color', '$tuxedo_suits_lower_pocket_satin_fabric', '$tuxedo_suits_shoulder_construction', '$tuxedo_suits_sleeve_button', '$tuxedo_suits_cuff', '$tuxedo_suits_all_sleevebutton_holes_color', '$tuxedo_suits_contrast_last_sleevebutton_holes_color', '$tuxedo_suits_contrast_last_sleevebutton_holes_button', '$tuxedo_suits_lining_style', '$tuxedo_suits_canvas', '$tuxedo_suits_jacket_button_number', '$tuxedo_suits_jacket_thread_on_button', '$tuxedo_suits_jacket_button_hole_color', '$tuxedo_suits_pick_stitch', '$tuxedo_suits_pick_stitch_lapel_color', '$tuxedo_suits_pick_stitch_pocket_color', '$tuxedo_suits_pick_stitch_sleeves', '$tuxedo_suits_pick_stitch_vest', '$tuxedo_suits_embroidery_inside_initial_or_name', '$tuxedo_suits_embroidery_inside_color', '$tuxedo_suits_embroidery_inside_design', '$tuxedo_suits_embroidery_collar_initial_or_name', '$tuxedo_suits_embroidery_collar_color', '$tuxedo_suits_embroidery_collar_design', '$tuxedo_suits_brand', '$tuxedo_suits_elbow_patch', '$tuxedo_suits_collar_felt_color', '$tuxedo_suits_front_pleat', '$tuxedo_suits_front_pocket', '$tuxedo_suits_back_pocket', '$tuxedo_suits_no_back_pocket', '$tuxedo_suits_pants_back_button_number', '$tuxedo_suits_pants_button_number', '$tuxedo_suits_pants_thread_on_button', '$tuxedo_suits_pants_button_hole_color', '$tuxedo_suits_fastening', '$tuxedo_suits_fly_option', '$tuxedo_suits_fly_option_zip', '$tuxedo_suits_band_edge_style', '$tuxedo_suits_very_extended_waistband', '$tuxedo_suits_waistband_width', '$tuxedo_suits_pants_cuff', '$tuxedo_suits_pants_cuff_width', '$tuxedo_suits_belt', '$tuxedo_suits_pants_lining_style', '$tuxedo_suits_embroidery_waist_initial_or_name', '$tuxedo_suits_embroidery_waist_color', '$tuxedo_suits_embroidery_waist_design', '$tuxedo_suits_embroidery_cuffs_initial_or_name', '$tuxedo_suits_embroidery_cuffs_color', '$tuxedo_suits_embroidery_cuffs_design', '$tuxedo_suits_pants_brand', '$tuxedo_suits_coin_pocket_inside', '$tuxedo_suits_suspender_buttons_inside', '$tuxedo_suits_split_tabs_back', '$tuxedo_suits_tuxedo_satin', '$tuxedo_suits_tuxedo_satin_waist_band', '$tuxedo_suits_date', '$tuxedo_suits_time', '$tuxedo_suits_ip', '$tuxedo_suits_status') ";
$query15 = mysql_query($sql15) or die("Can't Query15");

$sql16 = " INSERT INTO customize_tuxedo_suits_measurements (id, order_id, product_id, tuxedo_suits_jacket_measurement_sex, tuxedo_suits_jacket_measurement_fit, tuxedo_suits_jacket_measurement, tuxedo_suits_jacket_measurement_jacket_length, tuxedo_suits_jacket_measurement_back_lenght, tuxedo_suits_jacket_measurement_chest, tuxedo_suits_jacket_measurement_waist_upper, tuxedo_suits_jacket_measurement_waist_lower, tuxedo_suits_jacket_measurement_hips, tuxedo_suits_jacket_measurement_shoulders, tuxedo_suits_jacket_measurement_neck, tuxedo_suits_jacket_measurement_ptp_front, tuxedo_suits_jacket_measurement_ptp_back, tuxedo_suits_jacket_measurement_arm_hole, tuxedo_suits_jacket_measurement_biceps, tuxedo_suits_jacket_measurement_sleeves_right, tuxedo_suits_jacket_measurement_sleeves_left, tuxedo_suits_jacket_measurement_wrist_right, tuxedo_suits_jacket_measurement_wrist_left, tuxedo_suits_jacket_measurement_first_button, tuxedo_suits_jacket_measurement_shoulder_upper_wrist, tuxedo_suits_jacket_measurement_shoulder_lower_wrist, tuxedo_suits_pants_measurement_sex, tuxedo_suits_pants_measurement_length, tuxedo_suits_pants_measurement_fit, tuxedo_suits_pants_measurement, tuxedo_suits_pants_measurement_waist, tuxedo_suits_pants_measurement_hips, tuxedo_suits_pants_measurement_crotch_full, tuxedo_suits_pants_measurement_crotch_front, tuxedo_suits_pants_measurement_crotch_back, tuxedo_suits_pants_measurement_inseam_length, tuxedo_suits_pants_measurement_thighs, tuxedo_suits_pants_measurement_knees, tuxedo_suits_pants_measurement_cuffs_ankle, tuxedo_suits_pants_measurement_length_outleg, tuxedo_suits_pants_measurement_only_crotch, tuxedo_suits_pants_measurement_front_rise, tuxedo_suits_pants_measurement_cuffs, tuxedo_suits_measurement_jacket_shoulder, tuxedo_suits_measurement_jacket_waist, tuxedo_suits_measurement_jacket_chest, tuxedo_suits_measurement_pants_waist, tuxedo_suits_measurement_pants_bottom, tuxedo_suits_remark, tuxedo_suits_date, tuxedo_suits_time, tuxedo_suits_ip, tuxedo_suits_status) VALUES ('$id_tuxedo_suits', '$order_id', '$product_id', '$tuxedo_suits_jacket_measurement_sex', '$tuxedo_suits_jacket_measurement_fit', '$tuxedo_suits_jacket_measurement', '$tuxedo_suits_jacket_measurement_jacket_length', '$tuxedo_suits_jacket_measurement_back_lenght', '$tuxedo_suits_jacket_measurement_chest', '$tuxedo_suits_jacket_measurement_waist_upper', '$tuxedo_suits_jacket_measurement_waist_lower', '$tuxedo_suits_jacket_measurement_hips', '$tuxedo_suits_jacket_measurement_shoulders', '$tuxedo_suits_jacket_measurement_neck', '$tuxedo_suits_jacket_measurement_ptp_front', '$tuxedo_suits_jacket_measurement_ptp_back', '$tuxedo_suits_jacket_measurement_arm_hole', '$tuxedo_suits_jacket_measurement_biceps', '$tuxedo_suits_jacket_measurement_sleeves_right', '$tuxedo_suits_jacket_measurement_sleeves_left', '$tuxedo_suits_jacket_measurement_wrist_right', '$tuxedo_suits_jacket_measurement_wrist_left', '$tuxedo_suits_jacket_measurement_first_button', '$tuxedo_suits_jacket_measurement_shoulder_upper_wrist', '$tuxedo_suits_jacket_measurement_shoulder_lower_wrist', '$tuxedo_suits_pants_measurement_sex', '$tuxedo_suits_pants_measurement_length', '$tuxedo_suits_pants_measurement_fit', '$tuxedo_suits_pants_measurement', '$tuxedo_suits_pants_measurement_waist', '$tuxedo_suits_pants_measurement_hips', '$tuxedo_suits_pants_measurement_crotch_full', '$tuxedo_suits_pants_measurement_crotch_front', '$tuxedo_suits_pants_measurement_crotch_back', '$tuxedo_suits_pants_measurement_inseam_length', '$tuxedo_suits_pants_measurement_thighs', '$tuxedo_suits_pants_measurement_knees', '$tuxedo_suits_pants_measurement_cuffs_ankle', '$tuxedo_suits_pants_measurement_length_outleg', '$tuxedo_suits_pants_measurement_only_crotch', '$tuxedo_suits_pants_measurement_front_rise', '$tuxedo_suits_pants_measurement_cuffs', '$tuxedo_suits_measurement_jacket_shoulder', '$tuxedo_suits_measurement_jacket_waist', '$tuxedo_suits_measurement_jacket_chest', '$tuxedo_suits_measurement_pants_waist', '$tuxedo_suits_measurement_pants_bottom', '$tuxedo_suits_remark', '$tuxedo_suits_date', '$tuxedo_suits_time', '$tuxedo_suits_ip', '$tuxedo_suits_status') ";
$query16 = mysql_query($sql16) or die("Can't Query16");

$path = "../../images/body/tuxedo_suits/front/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['tuxedo_suits_body_front']['name'];
	$tmp = $_FILES['tuxedo_suits_body_front']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$tuxedo_suits_body_front_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$tuxedo_suits_body_front_pic)){
				
				$sql17 = " UPDATE customize_tuxedo_suits_measurements SET tuxedo_suits_body_front = '".$tuxedo_suits_body_front_pic."', tuxedo_suits_date = '".$tuxedo_suits_date."', tuxedo_suits_time = '".$tuxedo_suits_time."', tuxedo_suits_ip = '".$tuxedo_suits_ip."', tuxedo_suits_status = '".$tuxedo_suits_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query17 = mysql_db_query($dbname, $sql17) or die("Can't Query17");
			}
    
	} else {
				$sql17 = " UPDATE customize_tuxedo_suits_measurements SET tuxedo_suits_date = '".$tuxedo_suits_date."', tuxedo_suits_time = '".$tuxedo_suits_time."', tuxedo_suits_ip = '".$tuxedo_suits_ip."', tuxedo_suits_status = '".$tuxedo_suits_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query17 = mysql_db_query($dbname, $sql17) or die("Can't Query17");
			}
	}
	
$path = "../../images/body/tuxedo_suits/left/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['tuxedo_suits_body_left']['name'];
	$tmp = $_FILES['tuxedo_suits_body_left']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$tuxedo_suits_body_left_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$tuxedo_suits_body_left_pic)){
				
				$sql18 = " UPDATE customize_tuxedo_suits_measurements SET tuxedo_suits_body_left = '".$tuxedo_suits_body_left_pic."', tuxedo_suits_date = '".$tuxedo_suits_date."', tuxedo_suits_time = '".$tuxedo_suits_time."', tuxedo_suits_ip = '".$tuxedo_suits_ip."', tuxedo_suits_status = '".$tuxedo_suits_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query18 = mysql_db_query($dbname, $sql18) or die("Can't Query18");
			}
    
	} else {
				$sql18 = " UPDATE customize_tuxedo_suits_measurements SET tuxedo_suits_date = '".$tuxedo_suits_date."', tuxedo_suits_time = '".$tuxedo_suits_time."', tuxedo_suits_ip = '".$tuxedo_suits_ip."', tuxedo_suits_status = '".$tuxedo_suits_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query18 = mysql_db_query($dbname, $sql18) or die("Can't Query18");
			}
	}
	
$path = "../../images/body/tuxedo_suits/right/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['tuxedo_suits_body_right']['name'];
	$tmp = $_FILES['tuxedo_suits_body_right']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$tuxedo_suits_body_right_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$tuxedo_suits_body_right_pic)){
				
				$sql19 = " UPDATE customize_tuxedo_suits_measurements SET tuxedo_suits_body_right = '".$tuxedo_suits_body_right_pic."', tuxedo_suits_date = '".$tuxedo_suits_date."', tuxedo_suits_time = '".$tuxedo_suits_time."', tuxedo_suits_ip = '".$tuxedo_suits_ip."', tuxedo_suits_status = '".$tuxedo_suits_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query19 = mysql_db_query($dbname, $sql19) or die("Can't Query19");
			}
    
	} else {
				$sql19 = " UPDATE customize_tuxedo_suits_measurements SET tuxedo_suits_date = '".$tuxedo_suits_date."', tuxedo_suits_time = '".$tuxedo_suits_time."', tuxedo_suits_ip = '".$tuxedo_suits_ip."', tuxedo_suits_status = '".$tuxedo_suits_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query19 = mysql_db_query($dbname, $sql19) or die("Can't Query19");
			}
	}
	
$path = "../../images/body/tuxedo_suits/back/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['tuxedo_suits_body_back']['name'];
	$tmp = $_FILES['tuxedo_suits_body_back']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$tuxedo_suits_body_back_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$tuxedo_suits_body_back_pic)){
				
				$sql20 = " UPDATE customize_tuxedo_suits_measurements SET tuxedo_suits_body_back = '".$tuxedo_suits_body_back_pic."', tuxedo_suits_date = '".$tuxedo_suits_date."', tuxedo_suits_time = '".$tuxedo_suits_time."', tuxedo_suits_ip = '".$tuxedo_suits_ip."', tuxedo_suits_status = '".$tuxedo_suits_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query20 = mysql_db_query($dbname, $sql20) or die("Can't Query20");
			}
    
	} else {
				$sql20 = " UPDATE customize_tuxedo_suits_measurements SET tuxedo_suits_date = '".$tuxedo_suits_date."', tuxedo_suits_time = '".$tuxedo_suits_time."', tuxedo_suits_ip = '".$tuxedo_suits_ip."', tuxedo_suits_status = '".$tuxedo_suits_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query20 = mysql_db_query($dbname, $sql20) or die("Can't Query20");
			}
	}

} else if ($tuxedo_suits_fabric_no_2 == "" || $tuxedo_suits_lining_no_2 == "") { }	

/*FABRIC 3*/
if ($tuxedo_suits_fabric_no_3 != "" && $tuxedo_suits_lining_no_3 != "") {

$sql11 = " SELECT MAX(id) FROM customize_order ";
$query11 = mysql_db_query($dbname, $sql11) or die("Can't Query11");
$row11 = mysql_fetch_array($query11);
$id_order = $row11[0] + 1 ;

$sql12 = " SELECT MAX(product_id) FROM customize_order";
$query12 = mysql_db_query($dbname, $sql12) or die("Can't Query12");
$row12 = mysql_fetch_array($query12);
$product_id = $row12[0] + 1 ;

$sql13 = " SELECT MAX(id) FROM customize_tuxedo_suits_design ";
$query13 = mysql_db_query($dbname, $sql13) or die("Can't Query13");
$row13 = mysql_fetch_array($query13);
$id_tuxedo_suits = $row13[0] + 1 ;

$sql14 = " INSERT INTO customize_order (id, order_id, product_id, order_reseller, order_order_no, order_name_customize, order_price, order_product, order_fabric_no, order_date, order_time, order_ip, order_status) VALUES ('$id_order', '$order_id', '$product_id', '$company_user', '$tuxedo_suits_order_no', '$tuxedo_suits_customer_name', '$tuxedo_suits_price_3', '$order_product', '$tuxedo_suits_fabric_no_3', '$tuxedo_suits_date', '$tuxedo_suits_time', '$tuxedo_suits_ip', '$tuxedo_suits_status') ";
$query14 = mysql_query($sql14) or die("Can't Query14");

$sql15 = " INSERT INTO customize_tuxedo_suits_design (id, order_id, product_id, tuxedo_suits_customer_name, tuxedo_suits_order_no, tuxedo_suits_order_date, tuxedo_suits_delivery_date, tuxedo_suits_fabric_no, tuxedo_suits_lining_no, tuxedo_suits_tuxedo_style, tuxedo_suits_satin_style, tuxedo_suits_collar_satin_style, tuxedo_suits_lapel_satin_style, tuxedo_suits_half_satin_option, tuxedo_suits_lapel_style, tuxedo_suits_lapel_width, tuxedo_suits_lapel_move, tuxedo_suits_lapel_color, tuxedo_suits_real_lapel_boutonniere, tuxedo_suits_vent_style, tuxedo_suits_pocket_style, tuxedo_suits_chest_pocket, tuxedo_suits_chest_pocket_satin, tuxedo_suits_chest_pocket_satin_color, tuxedo_suits_chest_pocket_satin_fabric, tuxedo_suits_lower_pocket_satin, tuxedo_suits_lower_pocket_satin_color, tuxedo_suits_lower_pocket_satin_fabric, tuxedo_suits_shoulder_construction, tuxedo_suits_sleeve_button, tuxedo_suits_cuff, tuxedo_suits_all_sleevebutton_holes_color, tuxedo_suits_contrast_last_sleevebutton_holes_color, tuxedo_suits_contrast_last_sleevebutton_holes_button, tuxedo_suits_lining_style, tuxedo_suits_canvas, tuxedo_suits_jacket_button_number, tuxedo_suits_jacket_thread_on_button, tuxedo_suits_jacket_button_hole_color, tuxedo_suits_pick_stitch, tuxedo_suits_pick_stitch_lapel_color, tuxedo_suits_pick_stitch_pocket_color, tuxedo_suits_pick_stitch_sleeves, tuxedo_suits_pick_stitch_vest, tuxedo_suits_embroidery_inside_initial_or_name, tuxedo_suits_embroidery_inside_color, tuxedo_suits_embroidery_inside_design, tuxedo_suits_embroidery_collar_initial_or_name, tuxedo_suits_embroidery_collar_color, tuxedo_suits_embroidery_collar_design, tuxedo_suits_brand, tuxedo_suits_elbow_patch, tuxedo_suits_collar_felt_color, tuxedo_suits_front_pleat, tuxedo_suits_front_pocket, tuxedo_suits_back_pocket, tuxedo_suits_no_back_pocket, tuxedo_suits_pants_back_button_number, tuxedo_suits_pants_button_number, tuxedo_suits_pants_thread_on_button, tuxedo_suits_pants_button_hole_color, tuxedo_suits_fastening, tuxedo_suits_fly_option, tuxedo_suits_fly_option_zip, tuxedo_suits_band_edge_style, tuxedo_suits_very_extended_waistband, tuxedo_suits_waistband_width, tuxedo_suits_pants_cuff, tuxedo_suits_pants_cuff_width, tuxedo_suits_belt, tuxedo_suits_pants_lining_style, tuxedo_suits_embroidery_waist_initial_or_name, tuxedo_suits_embroidery_waist_color, tuxedo_suits_embroidery_waist_design, tuxedo_suits_embroidery_cuffs_initial_or_name, tuxedo_suits_embroidery_cuffs_color, tuxedo_suits_embroidery_cuffs_design, tuxedo_suits_pants_brand, tuxedo_suits_coin_pocket_inside, tuxedo_suits_suspender_buttons_inside, tuxedo_suits_split_tabs_back, tuxedo_suits_tuxedo_satin, tuxedo_suits_tuxedo_satin_waist_band, tuxedo_suits_date, tuxedo_suits_time, tuxedo_suits_ip, tuxedo_suits_status) VALUES ('$id_tuxedo_suits', '$order_id', '$product_id', '$tuxedo_suits_customer_name', '$tuxedo_suits_order_no', '$tuxedo_suits_order_date', '$tuxedo_suits_delivery_date', '$tuxedo_suits_fabric_no_3', '$tuxedo_suits_lining_no_3', '$tuxedo_suits_tuxedo_style', '$tuxedo_suits_satin_style', '$tuxedo_suits_collar_satin_style', '$tuxedo_suits_lapel_satin_style', '$tuxedo_suits_half_satin_option', '$tuxedo_suits_lapel_style', '$tuxedo_suits_lapel_width', '$tuxedo_suits_lapel_move', '$tuxedo_suits_lapel_color', '$tuxedo_suits_real_lapel_boutonniere', '$tuxedo_suits_vent_style', '$tuxedo_suits_pocket_style', '$tuxedo_suits_chest_pocket', '$tuxedo_suits_chest_pocket_satin', '$tuxedo_suits_chest_pocket_satin_color', '$tuxedo_suits_chest_pocket_satin_fabric', '$tuxedo_suits_lower_pocket_satin', '$tuxedo_suits_lower_pocket_satin_color', '$tuxedo_suits_lower_pocket_satin_fabric', '$tuxedo_suits_shoulder_construction', '$tuxedo_suits_sleeve_button', '$tuxedo_suits_cuff', '$tuxedo_suits_all_sleevebutton_holes_color', '$tuxedo_suits_contrast_last_sleevebutton_holes_color', '$tuxedo_suits_contrast_last_sleevebutton_holes_button', '$tuxedo_suits_lining_style', '$tuxedo_suits_canvas', '$tuxedo_suits_jacket_button_number', '$tuxedo_suits_jacket_thread_on_button', '$tuxedo_suits_jacket_button_hole_color', '$tuxedo_suits_pick_stitch', '$tuxedo_suits_pick_stitch_lapel_color', '$tuxedo_suits_pick_stitch_pocket_color', '$tuxedo_suits_pick_stitch_sleeves', '$tuxedo_suits_pick_stitch_vest', '$tuxedo_suits_embroidery_inside_initial_or_name', '$tuxedo_suits_embroidery_inside_color', '$tuxedo_suits_embroidery_inside_design', '$tuxedo_suits_embroidery_collar_initial_or_name', '$tuxedo_suits_embroidery_collar_color', '$tuxedo_suits_embroidery_collar_design', '$tuxedo_suits_brand', '$tuxedo_suits_elbow_patch', '$tuxedo_suits_collar_felt_color', '$tuxedo_suits_front_pleat', '$tuxedo_suits_front_pocket', '$tuxedo_suits_back_pocket', '$tuxedo_suits_no_back_pocket', '$tuxedo_suits_pants_back_button_number', '$tuxedo_suits_pants_button_number', '$tuxedo_suits_pants_thread_on_button', '$tuxedo_suits_pants_button_hole_color', '$tuxedo_suits_fastening', '$tuxedo_suits_fly_option', '$tuxedo_suits_fly_option_zip', '$tuxedo_suits_band_edge_style', '$tuxedo_suits_very_extended_waistband', '$tuxedo_suits_waistband_width', '$tuxedo_suits_pants_cuff', '$tuxedo_suits_pants_cuff_width', '$tuxedo_suits_belt', '$tuxedo_suits_pants_lining_style', '$tuxedo_suits_embroidery_waist_initial_or_name', '$tuxedo_suits_embroidery_waist_color', '$tuxedo_suits_embroidery_waist_design', '$tuxedo_suits_embroidery_cuffs_initial_or_name', '$tuxedo_suits_embroidery_cuffs_color', '$tuxedo_suits_embroidery_cuffs_design', '$tuxedo_suits_pants_brand', '$tuxedo_suits_coin_pocket_inside', '$tuxedo_suits_suspender_buttons_inside', '$tuxedo_suits_split_tabs_back', '$tuxedo_suits_tuxedo_satin', '$tuxedo_suits_tuxedo_satin_waist_band', '$tuxedo_suits_date', '$tuxedo_suits_time', '$tuxedo_suits_ip', '$tuxedo_suits_status') ";
$query15 = mysql_query($sql15) or die("Can't Query15");

$sql16 = " INSERT INTO customize_tuxedo_suits_measurements (id, order_id, product_id, tuxedo_suits_jacket_measurement_sex, tuxedo_suits_jacket_measurement_fit, tuxedo_suits_jacket_measurement, tuxedo_suits_jacket_measurement_jacket_length, tuxedo_suits_jacket_measurement_back_lenght, tuxedo_suits_jacket_measurement_chest, tuxedo_suits_jacket_measurement_waist_upper, tuxedo_suits_jacket_measurement_waist_lower, tuxedo_suits_jacket_measurement_hips, tuxedo_suits_jacket_measurement_shoulders, tuxedo_suits_jacket_measurement_neck, tuxedo_suits_jacket_measurement_ptp_front, tuxedo_suits_jacket_measurement_ptp_back, tuxedo_suits_jacket_measurement_arm_hole, tuxedo_suits_jacket_measurement_biceps, tuxedo_suits_jacket_measurement_sleeves_right, tuxedo_suits_jacket_measurement_sleeves_left, tuxedo_suits_jacket_measurement_wrist_right, tuxedo_suits_jacket_measurement_wrist_left, tuxedo_suits_jacket_measurement_first_button, tuxedo_suits_jacket_measurement_shoulder_upper_wrist, tuxedo_suits_jacket_measurement_shoulder_lower_wrist, tuxedo_suits_pants_measurement_sex, tuxedo_suits_pants_measurement_length, tuxedo_suits_pants_measurement_fit, tuxedo_suits_pants_measurement, tuxedo_suits_pants_measurement_waist, tuxedo_suits_pants_measurement_hips, tuxedo_suits_pants_measurement_crotch_full, tuxedo_suits_pants_measurement_crotch_front, tuxedo_suits_pants_measurement_crotch_back, tuxedo_suits_pants_measurement_inseam_length, tuxedo_suits_pants_measurement_thighs, tuxedo_suits_pants_measurement_knees, tuxedo_suits_pants_measurement_cuffs_ankle, tuxedo_suits_pants_measurement_length_outleg, tuxedo_suits_pants_measurement_only_crotch, tuxedo_suits_pants_measurement_front_rise, tuxedo_suits_pants_measurement_cuffs, tuxedo_suits_measurement_jacket_shoulder, tuxedo_suits_measurement_jacket_waist, tuxedo_suits_measurement_jacket_chest, tuxedo_suits_measurement_pants_waist, tuxedo_suits_measurement_pants_bottom, tuxedo_suits_remark, tuxedo_suits_date, tuxedo_suits_time, tuxedo_suits_ip, tuxedo_suits_status) VALUES ('$id_tuxedo_suits', '$order_id', '$product_id', '$tuxedo_suits_jacket_measurement_sex', '$tuxedo_suits_jacket_measurement_fit', '$tuxedo_suits_jacket_measurement', '$tuxedo_suits_jacket_measurement_jacket_length', '$tuxedo_suits_jacket_measurement_back_lenght', '$tuxedo_suits_jacket_measurement_chest', '$tuxedo_suits_jacket_measurement_waist_upper', '$tuxedo_suits_jacket_measurement_waist_lower', '$tuxedo_suits_jacket_measurement_hips', '$tuxedo_suits_jacket_measurement_shoulders', '$tuxedo_suits_jacket_measurement_neck', '$tuxedo_suits_jacket_measurement_ptp_front', '$tuxedo_suits_jacket_measurement_ptp_back', '$tuxedo_suits_jacket_measurement_arm_hole', '$tuxedo_suits_jacket_measurement_biceps', '$tuxedo_suits_jacket_measurement_sleeves_right', '$tuxedo_suits_jacket_measurement_sleeves_left', '$tuxedo_suits_jacket_measurement_wrist_right', '$tuxedo_suits_jacket_measurement_wrist_left', '$tuxedo_suits_jacket_measurement_first_button', '$tuxedo_suits_jacket_measurement_shoulder_upper_wrist', '$tuxedo_suits_jacket_measurement_shoulder_lower_wrist', '$tuxedo_suits_pants_measurement_sex', '$tuxedo_suits_pants_measurement_length', '$tuxedo_suits_pants_measurement_fit', '$tuxedo_suits_pants_measurement', '$tuxedo_suits_pants_measurement_waist', '$tuxedo_suits_pants_measurement_hips', '$tuxedo_suits_pants_measurement_crotch_full', '$tuxedo_suits_pants_measurement_crotch_front', '$tuxedo_suits_pants_measurement_crotch_back', '$tuxedo_suits_pants_measurement_inseam_length', '$tuxedo_suits_pants_measurement_thighs', '$tuxedo_suits_pants_measurement_knees', '$tuxedo_suits_pants_measurement_cuffs_ankle', '$tuxedo_suits_pants_measurement_length_outleg', '$tuxedo_suits_pants_measurement_only_crotch', '$tuxedo_suits_pants_measurement_front_rise', '$tuxedo_suits_pants_measurement_cuffs', '$tuxedo_suits_measurement_jacket_shoulder', '$tuxedo_suits_measurement_jacket_waist', '$tuxedo_suits_measurement_jacket_chest', '$tuxedo_suits_measurement_pants_waist', '$tuxedo_suits_measurement_pants_bottom', '$tuxedo_suits_remark', '$tuxedo_suits_date', '$tuxedo_suits_time', '$tuxedo_suits_ip', '$tuxedo_suits_status') ";
$query16 = mysql_query($sql16) or die("Can't Query16");

$path = "../../images/body/tuxedo_suits/front/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['tuxedo_suits_body_front']['name'];
	$tmp = $_FILES['tuxedo_suits_body_front']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$tuxedo_suits_body_front_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$tuxedo_suits_body_front_pic)){
				
				$sql17 = " UPDATE customize_tuxedo_suits_measurements SET tuxedo_suits_body_front = '".$tuxedo_suits_body_front_pic."', tuxedo_suits_date = '".$tuxedo_suits_date."', tuxedo_suits_time = '".$tuxedo_suits_time."', tuxedo_suits_ip = '".$tuxedo_suits_ip."', tuxedo_suits_status = '".$tuxedo_suits_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query17 = mysql_db_query($dbname, $sql17) or die("Can't Query17");
			}
    
	} else {
				$sql17 = " UPDATE customize_tuxedo_suits_measurements SET tuxedo_suits_date = '".$tuxedo_suits_date."', tuxedo_suits_time = '".$tuxedo_suits_time."', tuxedo_suits_ip = '".$tuxedo_suits_ip."', tuxedo_suits_status = '".$tuxedo_suits_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query17 = mysql_db_query($dbname, $sql17) or die("Can't Query17");
			}
	}
	
$path = "../../images/body/tuxedo_suits/left/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['tuxedo_suits_body_left']['name'];
	$tmp = $_FILES['tuxedo_suits_body_left']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$tuxedo_suits_body_left_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$tuxedo_suits_body_left_pic)){
				
				$sql18 = " UPDATE customize_tuxedo_suits_measurements SET tuxedo_suits_body_left = '".$tuxedo_suits_body_left_pic."', tuxedo_suits_date = '".$tuxedo_suits_date."', tuxedo_suits_time = '".$tuxedo_suits_time."', tuxedo_suits_ip = '".$tuxedo_suits_ip."', tuxedo_suits_status = '".$tuxedo_suits_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query18 = mysql_db_query($dbname, $sql18) or die("Can't Query18");
			}
    
	} else {
				$sql18 = " UPDATE customize_tuxedo_suits_measurements SET tuxedo_suits_date = '".$tuxedo_suits_date."', tuxedo_suits_time = '".$tuxedo_suits_time."', tuxedo_suits_ip = '".$tuxedo_suits_ip."', tuxedo_suits_status = '".$tuxedo_suits_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query18 = mysql_db_query($dbname, $sql18) or die("Can't Query18");
			}
	}
	
$path = "../../images/body/tuxedo_suits/right/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['tuxedo_suits_body_right']['name'];
	$tmp = $_FILES['tuxedo_suits_body_right']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$tuxedo_suits_body_right_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$tuxedo_suits_body_right_pic)){
				
				$sql19 = " UPDATE customize_tuxedo_suits_measurements SET tuxedo_suits_body_right = '".$tuxedo_suits_body_right_pic."', tuxedo_suits_date = '".$tuxedo_suits_date."', tuxedo_suits_time = '".$tuxedo_suits_time."', tuxedo_suits_ip = '".$tuxedo_suits_ip."', tuxedo_suits_status = '".$tuxedo_suits_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query19 = mysql_db_query($dbname, $sql19) or die("Can't Query19");
			}
    
	} else {
				$sql19 = " UPDATE customize_tuxedo_suits_measurements SET tuxedo_suits_date = '".$tuxedo_suits_date."', tuxedo_suits_time = '".$tuxedo_suits_time."', tuxedo_suits_ip = '".$tuxedo_suits_ip."', tuxedo_suits_status = '".$tuxedo_suits_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query19 = mysql_db_query($dbname, $sql19) or die("Can't Query19");
			}
	}
	
$path = "../../images/body/tuxedo_suits/back/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['tuxedo_suits_body_back']['name'];
	$tmp = $_FILES['tuxedo_suits_body_back']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$tuxedo_suits_body_back_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$tuxedo_suits_body_back_pic)){
				
				$sql20 = " UPDATE customize_tuxedo_suits_measurements SET tuxedo_suits_body_back = '".$tuxedo_suits_body_back_pic."', tuxedo_suits_date = '".$tuxedo_suits_date."', tuxedo_suits_time = '".$tuxedo_suits_time."', tuxedo_suits_ip = '".$tuxedo_suits_ip."', tuxedo_suits_status = '".$tuxedo_suits_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query20 = mysql_db_query($dbname, $sql20) or die("Can't Query20");
			}
    
	} else {
				$sql20 = " UPDATE customize_tuxedo_suits_measurements SET tuxedo_suits_date = '".$tuxedo_suits_date."', tuxedo_suits_time = '".$tuxedo_suits_time."', tuxedo_suits_ip = '".$tuxedo_suits_ip."', tuxedo_suits_status = '".$tuxedo_suits_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query20 = mysql_db_query($dbname, $sql20) or die("Can't Query20");
			}
	}

} else if ($tuxedo_suits_fabric_no_3 == "" || $tuxedo_suits_lining_no_3 == "") { }

/*FABRIC 4*/
if ($tuxedo_suits_fabric_no_4 != "" && $tuxedo_suits_lining_no_4 != "") {

$sql11 = " SELECT MAX(id) FROM customize_order ";
$query11 = mysql_db_query($dbname, $sql11) or die("Can't Query11");
$row11 = mysql_fetch_array($query11);
$id_order = $row11[0] + 1 ;

$sql12 = " SELECT MAX(product_id) FROM customize_order";
$query12 = mysql_db_query($dbname, $sql12) or die("Can't Query12");
$row12 = mysql_fetch_array($query12);
$product_id = $row12[0] + 1 ;

$sql13 = " SELECT MAX(id) FROM customize_tuxedo_suits_design ";
$query13 = mysql_db_query($dbname, $sql13) or die("Can't Query13");
$row13 = mysql_fetch_array($query13);
$id_tuxedo_suits = $row13[0] + 1 ;

$sql14 = " INSERT INTO customize_order (id, order_id, product_id, order_reseller, order_order_no, order_name_customize, order_price, order_product, order_fabric_no, order_date, order_time, order_ip, order_status) VALUES ('$id_order', '$order_id', '$product_id', '$company_user', '$tuxedo_suits_order_no', '$tuxedo_suits_customer_name', '$tuxedo_suits_price_4', '$order_product', '$tuxedo_suits_fabric_no_4', '$tuxedo_suits_date', '$tuxedo_suits_time', '$tuxedo_suits_ip', '$tuxedo_suits_status') ";
$query14 = mysql_query($sql14) or die("Can't Query14");

$sql15 = " INSERT INTO customize_tuxedo_suits_design (id, order_id, product_id, tuxedo_suits_customer_name, tuxedo_suits_order_no, tuxedo_suits_order_date, tuxedo_suits_delivery_date, tuxedo_suits_fabric_no, tuxedo_suits_lining_no, tuxedo_suits_tuxedo_style, tuxedo_suits_satin_style, tuxedo_suits_collar_satin_style, tuxedo_suits_lapel_satin_style, tuxedo_suits_half_satin_option, tuxedo_suits_lapel_style, tuxedo_suits_lapel_width, tuxedo_suits_lapel_move, tuxedo_suits_lapel_color, tuxedo_suits_real_lapel_boutonniere, tuxedo_suits_vent_style, tuxedo_suits_pocket_style, tuxedo_suits_chest_pocket, tuxedo_suits_chest_pocket_satin, tuxedo_suits_chest_pocket_satin_color, tuxedo_suits_chest_pocket_satin_fabric, tuxedo_suits_lower_pocket_satin, tuxedo_suits_lower_pocket_satin_color, tuxedo_suits_lower_pocket_satin_fabric, tuxedo_suits_shoulder_construction, tuxedo_suits_sleeve_button, tuxedo_suits_cuff, tuxedo_suits_all_sleevebutton_holes_color, tuxedo_suits_contrast_last_sleevebutton_holes_color, tuxedo_suits_contrast_last_sleevebutton_holes_button, tuxedo_suits_lining_style, tuxedo_suits_canvas, tuxedo_suits_jacket_button_number, tuxedo_suits_jacket_thread_on_button, tuxedo_suits_jacket_button_hole_color, tuxedo_suits_pick_stitch, tuxedo_suits_pick_stitch_lapel_color, tuxedo_suits_pick_stitch_pocket_color, tuxedo_suits_pick_stitch_sleeves, tuxedo_suits_pick_stitch_vest, tuxedo_suits_embroidery_inside_initial_or_name, tuxedo_suits_embroidery_inside_color, tuxedo_suits_embroidery_inside_design, tuxedo_suits_embroidery_collar_initial_or_name, tuxedo_suits_embroidery_collar_color, tuxedo_suits_embroidery_collar_design, tuxedo_suits_brand, tuxedo_suits_elbow_patch, tuxedo_suits_collar_felt_color, tuxedo_suits_front_pleat, tuxedo_suits_front_pocket, tuxedo_suits_back_pocket, tuxedo_suits_no_back_pocket, tuxedo_suits_pants_back_button_number, tuxedo_suits_pants_button_number, tuxedo_suits_pants_thread_on_button, tuxedo_suits_pants_button_hole_color, tuxedo_suits_fastening, tuxedo_suits_fly_option, tuxedo_suits_fly_option_zip, tuxedo_suits_band_edge_style, tuxedo_suits_very_extended_waistband, tuxedo_suits_waistband_width, tuxedo_suits_pants_cuff, tuxedo_suits_pants_cuff_width, tuxedo_suits_belt, tuxedo_suits_pants_lining_style, tuxedo_suits_embroidery_waist_initial_or_name, tuxedo_suits_embroidery_waist_color, tuxedo_suits_embroidery_waist_design, tuxedo_suits_embroidery_cuffs_initial_or_name, tuxedo_suits_embroidery_cuffs_color, tuxedo_suits_embroidery_cuffs_design, tuxedo_suits_pants_brand, tuxedo_suits_coin_pocket_inside, tuxedo_suits_suspender_buttons_inside, tuxedo_suits_split_tabs_back, tuxedo_suits_tuxedo_satin, tuxedo_suits_tuxedo_satin_waist_band, tuxedo_suits_date, tuxedo_suits_time, tuxedo_suits_ip, tuxedo_suits_status) VALUES ('$id_tuxedo_suits', '$order_id', '$product_id', '$tuxedo_suits_customer_name', '$tuxedo_suits_order_no', '$tuxedo_suits_order_date', '$tuxedo_suits_delivery_date', '$tuxedo_suits_fabric_no_4', '$tuxedo_suits_lining_no_4', '$tuxedo_suits_tuxedo_style', '$tuxedo_suits_satin_style', '$tuxedo_suits_collar_satin_style', '$tuxedo_suits_lapel_satin_style', '$tuxedo_suits_half_satin_option', '$tuxedo_suits_lapel_style', '$tuxedo_suits_lapel_width', '$tuxedo_suits_lapel_move', '$tuxedo_suits_lapel_color', '$tuxedo_suits_real_lapel_boutonniere', '$tuxedo_suits_vent_style', '$tuxedo_suits_pocket_style', '$tuxedo_suits_chest_pocket', '$tuxedo_suits_chest_pocket_satin', '$tuxedo_suits_chest_pocket_satin_color', '$tuxedo_suits_chest_pocket_satin_fabric', '$tuxedo_suits_lower_pocket_satin', '$tuxedo_suits_lower_pocket_satin_color', '$tuxedo_suits_lower_pocket_satin_fabric', '$tuxedo_suits_shoulder_construction', '$tuxedo_suits_sleeve_button', '$tuxedo_suits_cuff', '$tuxedo_suits_all_sleevebutton_holes_color', '$tuxedo_suits_contrast_last_sleevebutton_holes_color', '$tuxedo_suits_contrast_last_sleevebutton_holes_button', '$tuxedo_suits_lining_style', '$tuxedo_suits_canvas', '$tuxedo_suits_jacket_button_number', '$tuxedo_suits_jacket_thread_on_button', '$tuxedo_suits_jacket_button_hole_color', '$tuxedo_suits_pick_stitch', '$tuxedo_suits_pick_stitch_lapel_color', '$tuxedo_suits_pick_stitch_pocket_color', '$tuxedo_suits_pick_stitch_sleeves', '$tuxedo_suits_pick_stitch_vest', '$tuxedo_suits_embroidery_inside_initial_or_name', '$tuxedo_suits_embroidery_inside_color', '$tuxedo_suits_embroidery_inside_design', '$tuxedo_suits_embroidery_collar_initial_or_name', '$tuxedo_suits_embroidery_collar_color', '$tuxedo_suits_embroidery_collar_design', '$tuxedo_suits_brand', '$tuxedo_suits_elbow_patch', '$tuxedo_suits_collar_felt_color', '$tuxedo_suits_front_pleat', '$tuxedo_suits_front_pocket', '$tuxedo_suits_back_pocket', '$tuxedo_suits_no_back_pocket', '$tuxedo_suits_pants_back_button_number', '$tuxedo_suits_pants_button_number', '$tuxedo_suits_pants_thread_on_button', '$tuxedo_suits_pants_button_hole_color', '$tuxedo_suits_fastening', '$tuxedo_suits_fly_option', '$tuxedo_suits_fly_option_zip', '$tuxedo_suits_band_edge_style', '$tuxedo_suits_very_extended_waistband', '$tuxedo_suits_waistband_width', '$tuxedo_suits_pants_cuff', '$tuxedo_suits_pants_cuff_width', '$tuxedo_suits_belt', '$tuxedo_suits_pants_lining_style', '$tuxedo_suits_embroidery_waist_initial_or_name', '$tuxedo_suits_embroidery_waist_color', '$tuxedo_suits_embroidery_waist_design', '$tuxedo_suits_embroidery_cuffs_initial_or_name', '$tuxedo_suits_embroidery_cuffs_color', '$tuxedo_suits_embroidery_cuffs_design', '$tuxedo_suits_pants_brand', '$tuxedo_suits_coin_pocket_inside', '$tuxedo_suits_suspender_buttons_inside', '$tuxedo_suits_split_tabs_back', '$tuxedo_suits_tuxedo_satin', '$tuxedo_suits_tuxedo_satin_waist_band', '$tuxedo_suits_date', '$tuxedo_suits_time', '$tuxedo_suits_ip', '$tuxedo_suits_status') ";
$query15 = mysql_query($sql15) or die("Can't Query15");

$sql16 = " INSERT INTO customize_tuxedo_suits_measurements (id, order_id, product_id, tuxedo_suits_jacket_measurement_sex, tuxedo_suits_jacket_measurement_fit, tuxedo_suits_jacket_measurement, tuxedo_suits_jacket_measurement_jacket_length, tuxedo_suits_jacket_measurement_back_lenght, tuxedo_suits_jacket_measurement_chest, tuxedo_suits_jacket_measurement_waist_upper, tuxedo_suits_jacket_measurement_waist_lower, tuxedo_suits_jacket_measurement_hips, tuxedo_suits_jacket_measurement_shoulders, tuxedo_suits_jacket_measurement_neck, tuxedo_suits_jacket_measurement_ptp_front, tuxedo_suits_jacket_measurement_ptp_back, tuxedo_suits_jacket_measurement_arm_hole, tuxedo_suits_jacket_measurement_biceps, tuxedo_suits_jacket_measurement_sleeves_right, tuxedo_suits_jacket_measurement_sleeves_left, tuxedo_suits_jacket_measurement_wrist_right, tuxedo_suits_jacket_measurement_wrist_left, tuxedo_suits_jacket_measurement_first_button, tuxedo_suits_jacket_measurement_shoulder_upper_wrist, tuxedo_suits_jacket_measurement_shoulder_lower_wrist, tuxedo_suits_pants_measurement_sex, tuxedo_suits_pants_measurement_length, tuxedo_suits_pants_measurement_fit, tuxedo_suits_pants_measurement, tuxedo_suits_pants_measurement_waist, tuxedo_suits_pants_measurement_hips, tuxedo_suits_pants_measurement_crotch_full, tuxedo_suits_pants_measurement_crotch_front, tuxedo_suits_pants_measurement_crotch_back, tuxedo_suits_pants_measurement_inseam_length, tuxedo_suits_pants_measurement_thighs, tuxedo_suits_pants_measurement_knees, tuxedo_suits_pants_measurement_cuffs_ankle, tuxedo_suits_pants_measurement_length_outleg, tuxedo_suits_pants_measurement_only_crotch, tuxedo_suits_pants_measurement_front_rise, tuxedo_suits_pants_measurement_cuffs, tuxedo_suits_measurement_jacket_shoulder, tuxedo_suits_measurement_jacket_waist, tuxedo_suits_measurement_jacket_chest, tuxedo_suits_measurement_pants_waist, tuxedo_suits_measurement_pants_bottom, tuxedo_suits_remark, tuxedo_suits_date, tuxedo_suits_time, tuxedo_suits_ip, tuxedo_suits_status) VALUES ('$id_tuxedo_suits', '$order_id', '$product_id', '$tuxedo_suits_jacket_measurement_sex', '$tuxedo_suits_jacket_measurement_fit', '$tuxedo_suits_jacket_measurement', '$tuxedo_suits_jacket_measurement_jacket_length', '$tuxedo_suits_jacket_measurement_back_lenght', '$tuxedo_suits_jacket_measurement_chest', '$tuxedo_suits_jacket_measurement_waist_upper', '$tuxedo_suits_jacket_measurement_waist_lower', '$tuxedo_suits_jacket_measurement_hips', '$tuxedo_suits_jacket_measurement_shoulders', '$tuxedo_suits_jacket_measurement_neck', '$tuxedo_suits_jacket_measurement_ptp_front', '$tuxedo_suits_jacket_measurement_ptp_back', '$tuxedo_suits_jacket_measurement_arm_hole', '$tuxedo_suits_jacket_measurement_biceps', '$tuxedo_suits_jacket_measurement_sleeves_right', '$tuxedo_suits_jacket_measurement_sleeves_left', '$tuxedo_suits_jacket_measurement_wrist_right', '$tuxedo_suits_jacket_measurement_wrist_left', '$tuxedo_suits_jacket_measurement_first_button', '$tuxedo_suits_jacket_measurement_shoulder_upper_wrist', '$tuxedo_suits_jacket_measurement_shoulder_lower_wrist', '$tuxedo_suits_pants_measurement_sex', '$tuxedo_suits_pants_measurement_length', '$tuxedo_suits_pants_measurement_fit', '$tuxedo_suits_pants_measurement', '$tuxedo_suits_pants_measurement_waist', '$tuxedo_suits_pants_measurement_hips', '$tuxedo_suits_pants_measurement_crotch_full', '$tuxedo_suits_pants_measurement_crotch_front', '$tuxedo_suits_pants_measurement_crotch_back', '$tuxedo_suits_pants_measurement_inseam_length', '$tuxedo_suits_pants_measurement_thighs', '$tuxedo_suits_pants_measurement_knees', '$tuxedo_suits_pants_measurement_cuffs_ankle', '$tuxedo_suits_pants_measurement_length_outleg', '$tuxedo_suits_pants_measurement_only_crotch', '$tuxedo_suits_pants_measurement_front_rise', '$tuxedo_suits_pants_measurement_cuffs', '$tuxedo_suits_measurement_jacket_shoulder', '$tuxedo_suits_measurement_jacket_waist', '$tuxedo_suits_measurement_jacket_chest', '$tuxedo_suits_measurement_pants_waist', '$tuxedo_suits_measurement_pants_bottom', '$tuxedo_suits_remark', '$tuxedo_suits_date', '$tuxedo_suits_time', '$tuxedo_suits_ip', '$tuxedo_suits_status') ";
$query16 = mysql_query($sql16) or die("Can't Query16");

$path = "../../images/body/tuxedo_suits/front/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['tuxedo_suits_body_front']['name'];
	$tmp = $_FILES['tuxedo_suits_body_front']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$tuxedo_suits_body_front_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$tuxedo_suits_body_front_pic)){
				
				$sql17 = " UPDATE customize_tuxedo_suits_measurements SET tuxedo_suits_body_front = '".$tuxedo_suits_body_front_pic."', tuxedo_suits_date = '".$tuxedo_suits_date."', tuxedo_suits_time = '".$tuxedo_suits_time."', tuxedo_suits_ip = '".$tuxedo_suits_ip."', tuxedo_suits_status = '".$tuxedo_suits_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query17 = mysql_db_query($dbname, $sql17) or die("Can't Query17");
			}
    
	} else {
				$sql17 = " UPDATE customize_tuxedo_suits_measurements SET tuxedo_suits_date = '".$tuxedo_suits_date."', tuxedo_suits_time = '".$tuxedo_suits_time."', tuxedo_suits_ip = '".$tuxedo_suits_ip."', tuxedo_suits_status = '".$tuxedo_suits_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query17 = mysql_db_query($dbname, $sql17) or die("Can't Query17");
			}
	}
	
$path = "../../images/body/tuxedo_suits/left/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['tuxedo_suits_body_left']['name'];
	$tmp = $_FILES['tuxedo_suits_body_left']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$tuxedo_suits_body_left_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$tuxedo_suits_body_left_pic)){
				
				$sql18 = " UPDATE customize_tuxedo_suits_measurements SET tuxedo_suits_body_left = '".$tuxedo_suits_body_left_pic."', tuxedo_suits_date = '".$tuxedo_suits_date."', tuxedo_suits_time = '".$tuxedo_suits_time."', tuxedo_suits_ip = '".$tuxedo_suits_ip."', tuxedo_suits_status = '".$tuxedo_suits_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query18 = mysql_db_query($dbname, $sql18) or die("Can't Query18");
			}
    
	} else {
				$sql18 = " UPDATE customize_tuxedo_suits_measurements SET tuxedo_suits_date = '".$tuxedo_suits_date."', tuxedo_suits_time = '".$tuxedo_suits_time."', tuxedo_suits_ip = '".$tuxedo_suits_ip."', tuxedo_suits_status = '".$tuxedo_suits_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query18 = mysql_db_query($dbname, $sql18) or die("Can't Query18");
			}
	}
	
$path = "../../images/body/tuxedo_suits/right/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['tuxedo_suits_body_right']['name'];
	$tmp = $_FILES['tuxedo_suits_body_right']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$tuxedo_suits_body_right_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$tuxedo_suits_body_right_pic)){
				
				$sql19 = " UPDATE customize_tuxedo_suits_measurements SET tuxedo_suits_body_right = '".$tuxedo_suits_body_right_pic."', tuxedo_suits_date = '".$tuxedo_suits_date."', tuxedo_suits_time = '".$tuxedo_suits_time."', tuxedo_suits_ip = '".$tuxedo_suits_ip."', tuxedo_suits_status = '".$tuxedo_suits_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query19 = mysql_db_query($dbname, $sql19) or die("Can't Query19");
			}
    
	} else {
				$sql19 = " UPDATE customize_tuxedo_suits_measurements SET tuxedo_suits_date = '".$tuxedo_suits_date."', tuxedo_suits_time = '".$tuxedo_suits_time."', tuxedo_suits_ip = '".$tuxedo_suits_ip."', tuxedo_suits_status = '".$tuxedo_suits_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query19 = mysql_db_query($dbname, $sql19) or die("Can't Query19");
			}
	}
	
$path = "../../images/body/tuxedo_suits/back/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['tuxedo_suits_body_back']['name'];
	$tmp = $_FILES['tuxedo_suits_body_back']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$tuxedo_suits_body_back_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$tuxedo_suits_body_back_pic)){
				
				$sql20 = " UPDATE customize_tuxedo_suits_measurements SET tuxedo_suits_body_back = '".$tuxedo_suits_body_back_pic."', tuxedo_suits_date = '".$tuxedo_suits_date."', tuxedo_suits_time = '".$tuxedo_suits_time."', tuxedo_suits_ip = '".$tuxedo_suits_ip."', tuxedo_suits_status = '".$tuxedo_suits_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query20 = mysql_db_query($dbname, $sql20) or die("Can't Query20");
			}
    
	} else {
				$sql20 = " UPDATE customize_tuxedo_suits_measurements SET tuxedo_suits_date = '".$tuxedo_suits_date."', tuxedo_suits_time = '".$tuxedo_suits_time."', tuxedo_suits_ip = '".$tuxedo_suits_ip."', tuxedo_suits_status = '".$tuxedo_suits_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query20 = mysql_db_query($dbname, $sql20) or die("Can't Query20");
			}
	}

} else if ($tuxedo_suits_fabric_no_4 == "" || $tuxedo_suits_lining_no_4 == "") { }

/*FABRIC 5*/
if ($tuxedo_suits_fabric_no_5 != "" && $tuxedo_suits_lining_no_5 != "") {
	
$sql11 = " SELECT MAX(id) FROM customize_order ";
$query11 = mysql_db_query($dbname, $sql11) or die("Can't Query11");
$row11 = mysql_fetch_array($query11);
$id_order = $row11[0] + 1 ;

$sql12 = " SELECT MAX(product_id) FROM customize_order";
$query12 = mysql_db_query($dbname, $sql12) or die("Can't Query12");
$row12 = mysql_fetch_array($query12);
$product_id = $row12[0] + 1 ;

$sql13 = " SELECT MAX(id) FROM customize_tuxedo_suits_design ";
$query13 = mysql_db_query($dbname, $sql13) or die("Can't Query13");
$row13 = mysql_fetch_array($query13);
$id_tuxedo_suits = $row13[0] + 1 ;

$sql14 = " INSERT INTO customize_order (id, order_id, product_id, order_reseller, order_order_no, order_name_customize, order_price, order_product, order_fabric_no, order_date, order_time, order_ip, order_status) VALUES ('$id_order', '$order_id', '$product_id', '$company_user', '$tuxedo_suits_order_no', '$tuxedo_suits_customer_name', '$tuxedo_suits_price_5', '$order_product', '$tuxedo_suits_fabric_no_5', '$tuxedo_suits_date', '$tuxedo_suits_time', '$tuxedo_suits_ip', '$tuxedo_suits_status') ";
$query14 = mysql_query($sql14) or die("Can't Query14");

$sql15 = " INSERT INTO customize_tuxedo_suits_design (id, order_id, product_id, tuxedo_suits_customer_name, tuxedo_suits_order_no, tuxedo_suits_order_date, tuxedo_suits_delivery_date, tuxedo_suits_fabric_no, tuxedo_suits_lining_no, tuxedo_suits_tuxedo_style, tuxedo_suits_satin_style, tuxedo_suits_collar_satin_style, tuxedo_suits_lapel_satin_style, tuxedo_suits_half_satin_option, tuxedo_suits_lapel_style, tuxedo_suits_lapel_width, tuxedo_suits_lapel_move, tuxedo_suits_lapel_color, tuxedo_suits_real_lapel_boutonniere, tuxedo_suits_vent_style, tuxedo_suits_pocket_style, tuxedo_suits_chest_pocket, tuxedo_suits_chest_pocket_satin, tuxedo_suits_chest_pocket_satin_color, tuxedo_suits_chest_pocket_satin_fabric, tuxedo_suits_lower_pocket_satin, tuxedo_suits_lower_pocket_satin_color, tuxedo_suits_lower_pocket_satin_fabric, tuxedo_suits_shoulder_construction, tuxedo_suits_sleeve_button, tuxedo_suits_cuff, tuxedo_suits_all_sleevebutton_holes_color, tuxedo_suits_contrast_last_sleevebutton_holes_color, tuxedo_suits_contrast_last_sleevebutton_holes_button, tuxedo_suits_lining_style, tuxedo_suits_canvas, tuxedo_suits_jacket_button_number, tuxedo_suits_jacket_thread_on_button, tuxedo_suits_jacket_button_hole_color, tuxedo_suits_pick_stitch, tuxedo_suits_pick_stitch_lapel_color, tuxedo_suits_pick_stitch_pocket_color, tuxedo_suits_pick_stitch_sleeves, tuxedo_suits_pick_stitch_vest, tuxedo_suits_embroidery_inside_initial_or_name, tuxedo_suits_embroidery_inside_color, tuxedo_suits_embroidery_inside_design, tuxedo_suits_embroidery_collar_initial_or_name, tuxedo_suits_embroidery_collar_color, tuxedo_suits_embroidery_collar_design, tuxedo_suits_brand, tuxedo_suits_elbow_patch, tuxedo_suits_collar_felt_color, tuxedo_suits_front_pleat, tuxedo_suits_front_pocket, tuxedo_suits_back_pocket, tuxedo_suits_no_back_pocket, tuxedo_suits_pants_back_button_number, tuxedo_suits_pants_button_number, tuxedo_suits_pants_thread_on_button, tuxedo_suits_pants_button_hole_color, tuxedo_suits_fastening, tuxedo_suits_fly_option, tuxedo_suits_fly_option_zip, tuxedo_suits_band_edge_style, tuxedo_suits_very_extended_waistband, tuxedo_suits_waistband_width, tuxedo_suits_pants_cuff, tuxedo_suits_pants_cuff_width, tuxedo_suits_belt, tuxedo_suits_pants_lining_style, tuxedo_suits_embroidery_waist_initial_or_name, tuxedo_suits_embroidery_waist_color, tuxedo_suits_embroidery_waist_design, tuxedo_suits_embroidery_cuffs_initial_or_name, tuxedo_suits_embroidery_cuffs_color, tuxedo_suits_embroidery_cuffs_design, tuxedo_suits_pants_brand, tuxedo_suits_coin_pocket_inside, tuxedo_suits_suspender_buttons_inside, tuxedo_suits_split_tabs_back, tuxedo_suits_tuxedo_satin, tuxedo_suits_tuxedo_satin_waist_band, tuxedo_suits_date, tuxedo_suits_time, tuxedo_suits_ip, tuxedo_suits_status) VALUES ('$id_tuxedo_suits', '$order_id', '$product_id', '$tuxedo_suits_customer_name', '$tuxedo_suits_order_no', '$tuxedo_suits_order_date', '$tuxedo_suits_delivery_date', '$tuxedo_suits_fabric_no_5', '$tuxedo_suits_lining_no_5', '$tuxedo_suits_tuxedo_style', '$tuxedo_suits_satin_style', '$tuxedo_suits_collar_satin_style', '$tuxedo_suits_lapel_satin_style', '$tuxedo_suits_half_satin_option', '$tuxedo_suits_lapel_style', '$tuxedo_suits_lapel_width', '$tuxedo_suits_lapel_move', '$tuxedo_suits_lapel_color', '$tuxedo_suits_real_lapel_boutonniere', '$tuxedo_suits_vent_style', '$tuxedo_suits_pocket_style', '$tuxedo_suits_chest_pocket', '$tuxedo_suits_chest_pocket_satin', '$tuxedo_suits_chest_pocket_satin_color', '$tuxedo_suits_chest_pocket_satin_fabric', '$tuxedo_suits_lower_pocket_satin', '$tuxedo_suits_lower_pocket_satin_color', '$tuxedo_suits_lower_pocket_satin_fabric', '$tuxedo_suits_shoulder_construction', '$tuxedo_suits_sleeve_button', '$tuxedo_suits_cuff', '$tuxedo_suits_all_sleevebutton_holes_color', '$tuxedo_suits_contrast_last_sleevebutton_holes_color', '$tuxedo_suits_contrast_last_sleevebutton_holes_button', '$tuxedo_suits_lining_style', '$tuxedo_suits_canvas', '$tuxedo_suits_jacket_button_number', '$tuxedo_suits_jacket_thread_on_button', '$tuxedo_suits_jacket_button_hole_color', '$tuxedo_suits_pick_stitch', '$tuxedo_suits_pick_stitch_lapel_color', '$tuxedo_suits_pick_stitch_pocket_color', '$tuxedo_suits_pick_stitch_sleeves', '$tuxedo_suits_pick_stitch_vest', '$tuxedo_suits_embroidery_inside_initial_or_name', '$tuxedo_suits_embroidery_inside_color', '$tuxedo_suits_embroidery_inside_design', '$tuxedo_suits_embroidery_collar_initial_or_name', '$tuxedo_suits_embroidery_collar_color', '$tuxedo_suits_embroidery_collar_design', '$tuxedo_suits_brand', '$tuxedo_suits_elbow_patch', '$tuxedo_suits_collar_felt_color', '$tuxedo_suits_front_pleat', '$tuxedo_suits_front_pocket', '$tuxedo_suits_back_pocket', '$tuxedo_suits_no_back_pocket', '$tuxedo_suits_pants_back_button_number', '$tuxedo_suits_pants_button_number', '$tuxedo_suits_pants_thread_on_button', '$tuxedo_suits_pants_button_hole_color', '$tuxedo_suits_fastening', '$tuxedo_suits_fly_option', '$tuxedo_suits_fly_option_zip', '$tuxedo_suits_band_edge_style', '$tuxedo_suits_very_extended_waistband', '$tuxedo_suits_waistband_width', '$tuxedo_suits_pants_cuff', '$tuxedo_suits_pants_cuff_width', '$tuxedo_suits_belt', '$tuxedo_suits_pants_lining_style', '$tuxedo_suits_embroidery_waist_initial_or_name', '$tuxedo_suits_embroidery_waist_color', '$tuxedo_suits_embroidery_waist_design', '$tuxedo_suits_embroidery_cuffs_initial_or_name', '$tuxedo_suits_embroidery_cuffs_color', '$tuxedo_suits_embroidery_cuffs_design', '$tuxedo_suits_pants_brand', '$tuxedo_suits_coin_pocket_inside', '$tuxedo_suits_suspender_buttons_inside', '$tuxedo_suits_split_tabs_back', '$tuxedo_suits_tuxedo_satin', '$tuxedo_suits_tuxedo_satin_waist_band', '$tuxedo_suits_date', '$tuxedo_suits_time', '$tuxedo_suits_ip', '$tuxedo_suits_status') ";
$query15 = mysql_query($sql15) or die("Can't Query15");

$sql16 = " INSERT INTO customize_tuxedo_suits_measurements (id, order_id, product_id, tuxedo_suits_jacket_measurement_sex, tuxedo_suits_jacket_measurement_fit, tuxedo_suits_jacket_measurement, tuxedo_suits_jacket_measurement_jacket_length, tuxedo_suits_jacket_measurement_back_lenght, tuxedo_suits_jacket_measurement_chest, tuxedo_suits_jacket_measurement_waist_upper, tuxedo_suits_jacket_measurement_waist_lower, tuxedo_suits_jacket_measurement_hips, tuxedo_suits_jacket_measurement_shoulders, tuxedo_suits_jacket_measurement_neck, tuxedo_suits_jacket_measurement_ptp_front, tuxedo_suits_jacket_measurement_ptp_back, tuxedo_suits_jacket_measurement_arm_hole, tuxedo_suits_jacket_measurement_biceps, tuxedo_suits_jacket_measurement_sleeves_right, tuxedo_suits_jacket_measurement_sleeves_left, tuxedo_suits_jacket_measurement_wrist_right, tuxedo_suits_jacket_measurement_wrist_left, tuxedo_suits_jacket_measurement_first_button, tuxedo_suits_jacket_measurement_shoulder_upper_wrist, tuxedo_suits_jacket_measurement_shoulder_lower_wrist, tuxedo_suits_pants_measurement_sex, tuxedo_suits_pants_measurement_length, tuxedo_suits_pants_measurement_fit, tuxedo_suits_pants_measurement, tuxedo_suits_pants_measurement_waist, tuxedo_suits_pants_measurement_hips, tuxedo_suits_pants_measurement_crotch_full, tuxedo_suits_pants_measurement_crotch_front, tuxedo_suits_pants_measurement_crotch_back, tuxedo_suits_pants_measurement_inseam_length, tuxedo_suits_pants_measurement_thighs, tuxedo_suits_pants_measurement_knees, tuxedo_suits_pants_measurement_cuffs_ankle, tuxedo_suits_pants_measurement_length_outleg, tuxedo_suits_pants_measurement_only_crotch, tuxedo_suits_pants_measurement_front_rise, tuxedo_suits_pants_measurement_cuffs, tuxedo_suits_measurement_jacket_shoulder, tuxedo_suits_measurement_jacket_waist, tuxedo_suits_measurement_jacket_chest, tuxedo_suits_measurement_pants_waist, tuxedo_suits_measurement_pants_bottom, tuxedo_suits_remark, tuxedo_suits_date, tuxedo_suits_time, tuxedo_suits_ip, tuxedo_suits_status) VALUES ('$id_tuxedo_suits', '$order_id', '$product_id', '$tuxedo_suits_jacket_measurement_sex', '$tuxedo_suits_jacket_measurement_fit', '$tuxedo_suits_jacket_measurement', '$tuxedo_suits_jacket_measurement_jacket_length', '$tuxedo_suits_jacket_measurement_back_lenght', '$tuxedo_suits_jacket_measurement_chest', '$tuxedo_suits_jacket_measurement_waist_upper', '$tuxedo_suits_jacket_measurement_waist_lower', '$tuxedo_suits_jacket_measurement_hips', '$tuxedo_suits_jacket_measurement_shoulders', '$tuxedo_suits_jacket_measurement_neck', '$tuxedo_suits_jacket_measurement_ptp_front', '$tuxedo_suits_jacket_measurement_ptp_back', '$tuxedo_suits_jacket_measurement_arm_hole', '$tuxedo_suits_jacket_measurement_biceps', '$tuxedo_suits_jacket_measurement_sleeves_right', '$tuxedo_suits_jacket_measurement_sleeves_left', '$tuxedo_suits_jacket_measurement_wrist_right', '$tuxedo_suits_jacket_measurement_wrist_left', '$tuxedo_suits_jacket_measurement_first_button', '$tuxedo_suits_jacket_measurement_shoulder_upper_wrist', '$tuxedo_suits_jacket_measurement_shoulder_lower_wrist', '$tuxedo_suits_pants_measurement_sex', '$tuxedo_suits_pants_measurement_length', '$tuxedo_suits_pants_measurement_fit', '$tuxedo_suits_pants_measurement', '$tuxedo_suits_pants_measurement_waist', '$tuxedo_suits_pants_measurement_hips', '$tuxedo_suits_pants_measurement_crotch_full', '$tuxedo_suits_pants_measurement_crotch_front', '$tuxedo_suits_pants_measurement_crotch_back', '$tuxedo_suits_pants_measurement_inseam_length', '$tuxedo_suits_pants_measurement_thighs', '$tuxedo_suits_pants_measurement_knees', '$tuxedo_suits_pants_measurement_cuffs_ankle', '$tuxedo_suits_pants_measurement_length_outleg', '$tuxedo_suits_pants_measurement_only_crotch', '$tuxedo_suits_pants_measurement_front_rise', '$tuxedo_suits_pants_measurement_cuffs', '$tuxedo_suits_measurement_jacket_shoulder', '$tuxedo_suits_measurement_jacket_waist', '$tuxedo_suits_measurement_jacket_chest', '$tuxedo_suits_measurement_pants_waist', '$tuxedo_suits_measurement_pants_bottom', '$tuxedo_suits_remark', '$tuxedo_suits_date', '$tuxedo_suits_time', '$tuxedo_suits_ip', '$tuxedo_suits_status') ";
$query16 = mysql_query($sql16) or die("Can't Query16");

$path = "../../images/body/tuxedo_suits/front/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['tuxedo_suits_body_front']['name'];
	$tmp = $_FILES['tuxedo_suits_body_front']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$tuxedo_suits_body_front_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$tuxedo_suits_body_front_pic)){
				
				$sql17 = " UPDATE customize_tuxedo_suits_measurements SET tuxedo_suits_body_front = '".$tuxedo_suits_body_front_pic."', tuxedo_suits_date = '".$tuxedo_suits_date."', tuxedo_suits_time = '".$tuxedo_suits_time."', tuxedo_suits_ip = '".$tuxedo_suits_ip."', tuxedo_suits_status = '".$tuxedo_suits_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query17 = mysql_db_query($dbname, $sql17) or die("Can't Query17");
			}
    
	} else {
				$sql17 = " UPDATE customize_tuxedo_suits_measurements SET tuxedo_suits_date = '".$tuxedo_suits_date."', tuxedo_suits_time = '".$tuxedo_suits_time."', tuxedo_suits_ip = '".$tuxedo_suits_ip."', tuxedo_suits_status = '".$tuxedo_suits_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query17 = mysql_db_query($dbname, $sql17) or die("Can't Query17");
			}
	}
	
$path = "../../images/body/tuxedo_suits/left/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['tuxedo_suits_body_left']['name'];
	$tmp = $_FILES['tuxedo_suits_body_left']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$tuxedo_suits_body_left_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$tuxedo_suits_body_left_pic)){
				
				$sql18 = " UPDATE customize_tuxedo_suits_measurements SET tuxedo_suits_body_left = '".$tuxedo_suits_body_left_pic."', tuxedo_suits_date = '".$tuxedo_suits_date."', tuxedo_suits_time = '".$tuxedo_suits_time."', tuxedo_suits_ip = '".$tuxedo_suits_ip."', tuxedo_suits_status = '".$tuxedo_suits_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query18 = mysql_db_query($dbname, $sql18) or die("Can't Query18");
			}
    
	} else {
				$sql18 = " UPDATE customize_tuxedo_suits_measurements SET tuxedo_suits_date = '".$tuxedo_suits_date."', tuxedo_suits_time = '".$tuxedo_suits_time."', tuxedo_suits_ip = '".$tuxedo_suits_ip."', tuxedo_suits_status = '".$tuxedo_suits_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query18 = mysql_db_query($dbname, $sql18) or die("Can't Query18");
			}
	}
	
$path = "../../images/body/tuxedo_suits/right/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['tuxedo_suits_body_right']['name'];
	$tmp = $_FILES['tuxedo_suits_body_right']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$tuxedo_suits_body_right_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$tuxedo_suits_body_right_pic)){
				
				$sql19 = " UPDATE customize_tuxedo_suits_measurements SET tuxedo_suits_body_right = '".$tuxedo_suits_body_right_pic."', tuxedo_suits_date = '".$tuxedo_suits_date."', tuxedo_suits_time = '".$tuxedo_suits_time."', tuxedo_suits_ip = '".$tuxedo_suits_ip."', tuxedo_suits_status = '".$tuxedo_suits_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query19 = mysql_db_query($dbname, $sql19) or die("Can't Query19");
			}
    
	} else {
				$sql19 = " UPDATE customize_tuxedo_suits_measurements SET tuxedo_suits_date = '".$tuxedo_suits_date."', tuxedo_suits_time = '".$tuxedo_suits_time."', tuxedo_suits_ip = '".$tuxedo_suits_ip."', tuxedo_suits_status = '".$tuxedo_suits_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query19 = mysql_db_query($dbname, $sql19) or die("Can't Query19");
			}
	}
	
$path = "../../images/body/tuxedo_suits/back/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['tuxedo_suits_body_back']['name'];
	$tmp = $_FILES['tuxedo_suits_body_back']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$tuxedo_suits_body_back_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$tuxedo_suits_body_back_pic)){
				
				$sql20 = " UPDATE customize_tuxedo_suits_measurements SET tuxedo_suits_body_back = '".$tuxedo_suits_body_back_pic."', tuxedo_suits_date = '".$tuxedo_suits_date."', tuxedo_suits_time = '".$tuxedo_suits_time."', tuxedo_suits_ip = '".$tuxedo_suits_ip."', tuxedo_suits_status = '".$tuxedo_suits_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query20 = mysql_db_query($dbname, $sql20) or die("Can't Query20");
			}
    
	} else {
				$sql20 = " UPDATE customize_tuxedo_suits_measurements SET tuxedo_suits_date = '".$tuxedo_suits_date."', tuxedo_suits_time = '".$tuxedo_suits_time."', tuxedo_suits_ip = '".$tuxedo_suits_ip."', tuxedo_suits_status = '".$tuxedo_suits_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query20 = mysql_db_query($dbname, $sql20) or die("Can't Query20");
			}
	}

} else if ($tuxedo_suits_fabric_no_5 == "" || $tuxedo_suits_lining_no_5 == "") { }

/*FABRIC 6*/
if ($tuxedo_suits_fabric_no_6 != "" && $tuxedo_suits_lining_no_6 != "") {

$sql11 = " SELECT MAX(id) FROM customize_order ";
$query11 = mysql_db_query($dbname, $sql11) or die("Can't Query11");
$row11 = mysql_fetch_array($query11);
$id_order = $row11[0] + 1 ;

$sql12 = " SELECT MAX(product_id) FROM customize_order";
$query12 = mysql_db_query($dbname, $sql12) or die("Can't Query12");
$row12 = mysql_fetch_array($query12);
$product_id = $row12[0] + 1 ;

$sql13 = " SELECT MAX(id) FROM customize_tuxedo_suits_design ";
$query13 = mysql_db_query($dbname, $sql13) or die("Can't Query13");
$row13 = mysql_fetch_array($query13);
$id_tuxedo_suits = $row13[0] + 1 ;

$sql14 = " INSERT INTO customize_order (id, order_id, product_id, order_reseller, order_order_no, order_name_customize, order_price, order_product, order_fabric_no, order_date, order_time, order_ip, order_status) VALUES ('$id_order', '$order_id', '$product_id', '$company_user', '$tuxedo_suits_order_no', '$tuxedo_suits_customer_name', '$tuxedo_suits_price_6', '$order_product', '$tuxedo_suits_fabric_no_6', '$tuxedo_suits_date', '$tuxedo_suits_time', '$tuxedo_suits_ip', '$tuxedo_suits_status') ";
$query14 = mysql_query($sql14) or die("Can't Query14");

$sql15 = " INSERT INTO customize_tuxedo_suits_design (id, order_id, product_id, tuxedo_suits_customer_name, tuxedo_suits_order_no, tuxedo_suits_order_date, tuxedo_suits_delivery_date, tuxedo_suits_fabric_no, tuxedo_suits_lining_no, tuxedo_suits_tuxedo_style, tuxedo_suits_satin_style, tuxedo_suits_collar_satin_style, tuxedo_suits_lapel_satin_style, tuxedo_suits_half_satin_option, tuxedo_suits_lapel_style, tuxedo_suits_lapel_width, tuxedo_suits_lapel_move, tuxedo_suits_lapel_color, tuxedo_suits_real_lapel_boutonniere, tuxedo_suits_vent_style, tuxedo_suits_pocket_style, tuxedo_suits_chest_pocket, tuxedo_suits_chest_pocket_satin, tuxedo_suits_chest_pocket_satin_color, tuxedo_suits_chest_pocket_satin_fabric, tuxedo_suits_lower_pocket_satin, tuxedo_suits_lower_pocket_satin_color, tuxedo_suits_lower_pocket_satin_fabric, tuxedo_suits_shoulder_construction, tuxedo_suits_sleeve_button, tuxedo_suits_cuff, tuxedo_suits_all_sleevebutton_holes_color, tuxedo_suits_contrast_last_sleevebutton_holes_color, tuxedo_suits_contrast_last_sleevebutton_holes_button, tuxedo_suits_lining_style, tuxedo_suits_canvas, tuxedo_suits_jacket_button_number, tuxedo_suits_jacket_thread_on_button, tuxedo_suits_jacket_button_hole_color, tuxedo_suits_pick_stitch, tuxedo_suits_pick_stitch_lapel_color, tuxedo_suits_pick_stitch_pocket_color, tuxedo_suits_pick_stitch_sleeves, tuxedo_suits_pick_stitch_vest, tuxedo_suits_embroidery_inside_initial_or_name, tuxedo_suits_embroidery_inside_color, tuxedo_suits_embroidery_inside_design, tuxedo_suits_embroidery_collar_initial_or_name, tuxedo_suits_embroidery_collar_color, tuxedo_suits_embroidery_collar_design, tuxedo_suits_brand, tuxedo_suits_elbow_patch, tuxedo_suits_collar_felt_color, tuxedo_suits_front_pleat, tuxedo_suits_front_pocket, tuxedo_suits_back_pocket, tuxedo_suits_no_back_pocket, tuxedo_suits_pants_back_button_number, tuxedo_suits_pants_button_number, tuxedo_suits_pants_thread_on_button, tuxedo_suits_pants_button_hole_color, tuxedo_suits_fastening, tuxedo_suits_fly_option, tuxedo_suits_fly_option_zip, tuxedo_suits_band_edge_style, tuxedo_suits_very_extended_waistband, tuxedo_suits_waistband_width, tuxedo_suits_pants_cuff, tuxedo_suits_pants_cuff_width, tuxedo_suits_belt, tuxedo_suits_pants_lining_style, tuxedo_suits_embroidery_waist_initial_or_name, tuxedo_suits_embroidery_waist_color, tuxedo_suits_embroidery_waist_design, tuxedo_suits_embroidery_cuffs_initial_or_name, tuxedo_suits_embroidery_cuffs_color, tuxedo_suits_embroidery_cuffs_design, tuxedo_suits_pants_brand, tuxedo_suits_coin_pocket_inside, tuxedo_suits_suspender_buttons_inside, tuxedo_suits_split_tabs_back, tuxedo_suits_tuxedo_satin, tuxedo_suits_tuxedo_satin_waist_band, tuxedo_suits_date, tuxedo_suits_time, tuxedo_suits_ip, tuxedo_suits_status) VALUES ('$id_tuxedo_suits', '$order_id', '$product_id', '$tuxedo_suits_customer_name', '$tuxedo_suits_order_no', '$tuxedo_suits_order_date', '$tuxedo_suits_delivery_date', '$tuxedo_suits_fabric_no_6', '$tuxedo_suits_lining_no_6', '$tuxedo_suits_tuxedo_style', '$tuxedo_suits_satin_style', '$tuxedo_suits_collar_satin_style', '$tuxedo_suits_lapel_satin_style', '$tuxedo_suits_half_satin_option', '$tuxedo_suits_lapel_style', '$tuxedo_suits_lapel_width', '$tuxedo_suits_lapel_move', '$tuxedo_suits_lapel_color', '$tuxedo_suits_real_lapel_boutonniere', '$tuxedo_suits_vent_style', '$tuxedo_suits_pocket_style', '$tuxedo_suits_chest_pocket', '$tuxedo_suits_chest_pocket_satin', '$tuxedo_suits_chest_pocket_satin_color', '$tuxedo_suits_chest_pocket_satin_fabric', '$tuxedo_suits_lower_pocket_satin', '$tuxedo_suits_lower_pocket_satin_color', '$tuxedo_suits_lower_pocket_satin_fabric', '$tuxedo_suits_shoulder_construction', '$tuxedo_suits_sleeve_button', '$tuxedo_suits_cuff', '$tuxedo_suits_all_sleevebutton_holes_color', '$tuxedo_suits_contrast_last_sleevebutton_holes_color', '$tuxedo_suits_contrast_last_sleevebutton_holes_button', '$tuxedo_suits_lining_style', '$tuxedo_suits_canvas', '$tuxedo_suits_jacket_button_number', '$tuxedo_suits_jacket_thread_on_button', '$tuxedo_suits_jacket_button_hole_color', '$tuxedo_suits_pick_stitch', '$tuxedo_suits_pick_stitch_lapel_color', '$tuxedo_suits_pick_stitch_pocket_color', '$tuxedo_suits_pick_stitch_sleeves', '$tuxedo_suits_pick_stitch_vest', '$tuxedo_suits_embroidery_inside_initial_or_name', '$tuxedo_suits_embroidery_inside_color', '$tuxedo_suits_embroidery_inside_design', '$tuxedo_suits_embroidery_collar_initial_or_name', '$tuxedo_suits_embroidery_collar_color', '$tuxedo_suits_embroidery_collar_design', '$tuxedo_suits_brand', '$tuxedo_suits_elbow_patch', '$tuxedo_suits_collar_felt_color', '$tuxedo_suits_front_pleat', '$tuxedo_suits_front_pocket', '$tuxedo_suits_back_pocket', '$tuxedo_suits_no_back_pocket', '$tuxedo_suits_pants_back_button_number', '$tuxedo_suits_pants_button_number', '$tuxedo_suits_pants_thread_on_button', '$tuxedo_suits_pants_button_hole_color', '$tuxedo_suits_fastening', '$tuxedo_suits_fly_option', '$tuxedo_suits_fly_option_zip', '$tuxedo_suits_band_edge_style', '$tuxedo_suits_very_extended_waistband', '$tuxedo_suits_waistband_width', '$tuxedo_suits_pants_cuff', '$tuxedo_suits_pants_cuff_width', '$tuxedo_suits_belt', '$tuxedo_suits_pants_lining_style', '$tuxedo_suits_embroidery_waist_initial_or_name', '$tuxedo_suits_embroidery_waist_color', '$tuxedo_suits_embroidery_waist_design', '$tuxedo_suits_embroidery_cuffs_initial_or_name', '$tuxedo_suits_embroidery_cuffs_color', '$tuxedo_suits_embroidery_cuffs_design', '$tuxedo_suits_pants_brand', '$tuxedo_suits_coin_pocket_inside', '$tuxedo_suits_suspender_buttons_inside', '$tuxedo_suits_split_tabs_back', '$tuxedo_suits_tuxedo_satin', '$tuxedo_suits_tuxedo_satin_waist_band', '$tuxedo_suits_date', '$tuxedo_suits_time', '$tuxedo_suits_ip', '$tuxedo_suits_status') ";
$query15 = mysql_query($sql15) or die("Can't Query15");

$sql16 = " INSERT INTO customize_tuxedo_suits_measurements (id, order_id, product_id, tuxedo_suits_jacket_measurement_sex, tuxedo_suits_jacket_measurement_fit, tuxedo_suits_jacket_measurement, tuxedo_suits_jacket_measurement_jacket_length, tuxedo_suits_jacket_measurement_back_lenght, tuxedo_suits_jacket_measurement_chest, tuxedo_suits_jacket_measurement_waist_upper, tuxedo_suits_jacket_measurement_waist_lower, tuxedo_suits_jacket_measurement_hips, tuxedo_suits_jacket_measurement_shoulders, tuxedo_suits_jacket_measurement_neck, tuxedo_suits_jacket_measurement_ptp_front, tuxedo_suits_jacket_measurement_ptp_back, tuxedo_suits_jacket_measurement_arm_hole, tuxedo_suits_jacket_measurement_biceps, tuxedo_suits_jacket_measurement_sleeves_right, tuxedo_suits_jacket_measurement_sleeves_left, tuxedo_suits_jacket_measurement_wrist_right, tuxedo_suits_jacket_measurement_wrist_left, tuxedo_suits_jacket_measurement_first_button, tuxedo_suits_jacket_measurement_shoulder_upper_wrist, tuxedo_suits_jacket_measurement_shoulder_lower_wrist, tuxedo_suits_pants_measurement_sex, tuxedo_suits_pants_measurement_length, tuxedo_suits_pants_measurement_fit, tuxedo_suits_pants_measurement, tuxedo_suits_pants_measurement_waist, tuxedo_suits_pants_measurement_hips, tuxedo_suits_pants_measurement_crotch_full, tuxedo_suits_pants_measurement_crotch_front, tuxedo_suits_pants_measurement_crotch_back, tuxedo_suits_pants_measurement_inseam_length, tuxedo_suits_pants_measurement_thighs, tuxedo_suits_pants_measurement_knees, tuxedo_suits_pants_measurement_cuffs_ankle, tuxedo_suits_pants_measurement_length_outleg, tuxedo_suits_pants_measurement_only_crotch, tuxedo_suits_pants_measurement_front_rise, tuxedo_suits_pants_measurement_cuffs, tuxedo_suits_measurement_jacket_shoulder, tuxedo_suits_measurement_jacket_waist, tuxedo_suits_measurement_jacket_chest, tuxedo_suits_measurement_pants_waist, tuxedo_suits_measurement_pants_bottom, tuxedo_suits_remark, tuxedo_suits_date, tuxedo_suits_time, tuxedo_suits_ip, tuxedo_suits_status) VALUES ('$id_tuxedo_suits', '$order_id', '$product_id', '$tuxedo_suits_jacket_measurement_sex', '$tuxedo_suits_jacket_measurement_fit', '$tuxedo_suits_jacket_measurement', '$tuxedo_suits_jacket_measurement_jacket_length', '$tuxedo_suits_jacket_measurement_back_lenght', '$tuxedo_suits_jacket_measurement_chest', '$tuxedo_suits_jacket_measurement_waist_upper', '$tuxedo_suits_jacket_measurement_waist_lower', '$tuxedo_suits_jacket_measurement_hips', '$tuxedo_suits_jacket_measurement_shoulders', '$tuxedo_suits_jacket_measurement_neck', '$tuxedo_suits_jacket_measurement_ptp_front', '$tuxedo_suits_jacket_measurement_ptp_back', '$tuxedo_suits_jacket_measurement_arm_hole', '$tuxedo_suits_jacket_measurement_biceps', '$tuxedo_suits_jacket_measurement_sleeves_right', '$tuxedo_suits_jacket_measurement_sleeves_left', '$tuxedo_suits_jacket_measurement_wrist_right', '$tuxedo_suits_jacket_measurement_wrist_left', '$tuxedo_suits_jacket_measurement_first_button', '$tuxedo_suits_jacket_measurement_shoulder_upper_wrist', '$tuxedo_suits_jacket_measurement_shoulder_lower_wrist', '$tuxedo_suits_pants_measurement_sex', '$tuxedo_suits_pants_measurement_length', '$tuxedo_suits_pants_measurement_fit', '$tuxedo_suits_pants_measurement', '$tuxedo_suits_pants_measurement_waist', '$tuxedo_suits_pants_measurement_hips', '$tuxedo_suits_pants_measurement_crotch_full', '$tuxedo_suits_pants_measurement_crotch_front', '$tuxedo_suits_pants_measurement_crotch_back', '$tuxedo_suits_pants_measurement_inseam_length', '$tuxedo_suits_pants_measurement_thighs', '$tuxedo_suits_pants_measurement_knees', '$tuxedo_suits_pants_measurement_cuffs_ankle', '$tuxedo_suits_pants_measurement_length_outleg', '$tuxedo_suits_pants_measurement_only_crotch', '$tuxedo_suits_pants_measurement_front_rise', '$tuxedo_suits_pants_measurement_cuffs', '$tuxedo_suits_measurement_jacket_shoulder', '$tuxedo_suits_measurement_jacket_waist', '$tuxedo_suits_measurement_jacket_chest', '$tuxedo_suits_measurement_pants_waist', '$tuxedo_suits_measurement_pants_bottom', '$tuxedo_suits_remark', '$tuxedo_suits_date', '$tuxedo_suits_time', '$tuxedo_suits_ip', '$tuxedo_suits_status') ";
$query16 = mysql_query($sql16) or die("Can't Query16");

$path = "../../images/body/tuxedo_suits/front/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['tuxedo_suits_body_front']['name'];
	$tmp = $_FILES['tuxedo_suits_body_front']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$tuxedo_suits_body_front_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$tuxedo_suits_body_front_pic)){
				
				$sql17 = " UPDATE customize_tuxedo_suits_measurements SET tuxedo_suits_body_front = '".$tuxedo_suits_body_front_pic."', tuxedo_suits_date = '".$tuxedo_suits_date."', tuxedo_suits_time = '".$tuxedo_suits_time."', tuxedo_suits_ip = '".$tuxedo_suits_ip."', tuxedo_suits_status = '".$tuxedo_suits_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query17 = mysql_db_query($dbname, $sql17) or die("Can't Query17");
			}
    
	} else {
				$sql17 = " UPDATE customize_tuxedo_suits_measurements SET tuxedo_suits_date = '".$tuxedo_suits_date."', tuxedo_suits_time = '".$tuxedo_suits_time."', tuxedo_suits_ip = '".$tuxedo_suits_ip."', tuxedo_suits_status = '".$tuxedo_suits_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query17 = mysql_db_query($dbname, $sql17) or die("Can't Query17");
			}
	}
	
$path = "../../images/body/tuxedo_suits/left/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['tuxedo_suits_body_left']['name'];
	$tmp = $_FILES['tuxedo_suits_body_left']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$tuxedo_suits_body_left_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$tuxedo_suits_body_left_pic)){
				
				$sql18 = " UPDATE customize_tuxedo_suits_measurements SET tuxedo_suits_body_left = '".$tuxedo_suits_body_left_pic."', tuxedo_suits_date = '".$tuxedo_suits_date."', tuxedo_suits_time = '".$tuxedo_suits_time."', tuxedo_suits_ip = '".$tuxedo_suits_ip."', tuxedo_suits_status = '".$tuxedo_suits_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query18 = mysql_db_query($dbname, $sql18) or die("Can't Query18");
			}
    
	} else {
				$sql18 = " UPDATE customize_tuxedo_suits_measurements SET tuxedo_suits_date = '".$tuxedo_suits_date."', tuxedo_suits_time = '".$tuxedo_suits_time."', tuxedo_suits_ip = '".$tuxedo_suits_ip."', tuxedo_suits_status = '".$tuxedo_suits_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query18 = mysql_db_query($dbname, $sql18) or die("Can't Query18");
			}
	}
	
$path = "../../images/body/tuxedo_suits/right/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['tuxedo_suits_body_right']['name'];
	$tmp = $_FILES['tuxedo_suits_body_right']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$tuxedo_suits_body_right_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$tuxedo_suits_body_right_pic)){
				
				$sql19 = " UPDATE customize_tuxedo_suits_measurements SET tuxedo_suits_body_right = '".$tuxedo_suits_body_right_pic."', tuxedo_suits_date = '".$tuxedo_suits_date."', tuxedo_suits_time = '".$tuxedo_suits_time."', tuxedo_suits_ip = '".$tuxedo_suits_ip."', tuxedo_suits_status = '".$tuxedo_suits_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query19 = mysql_db_query($dbname, $sql19) or die("Can't Query19");
			}
    
	} else {
				$sql19 = " UPDATE customize_tuxedo_suits_measurements SET tuxedo_suits_date = '".$tuxedo_suits_date."', tuxedo_suits_time = '".$tuxedo_suits_time."', tuxedo_suits_ip = '".$tuxedo_suits_ip."', tuxedo_suits_status = '".$tuxedo_suits_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query19 = mysql_db_query($dbname, $sql19) or die("Can't Query19");
			}
	}
	
$path = "../../images/body/tuxedo_suits/back/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['tuxedo_suits_body_back']['name'];
	$tmp = $_FILES['tuxedo_suits_body_back']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$tuxedo_suits_body_back_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$tuxedo_suits_body_back_pic)){
				
				$sql20 = " UPDATE customize_tuxedo_suits_measurements SET tuxedo_suits_body_back = '".$tuxedo_suits_body_back_pic."', tuxedo_suits_date = '".$tuxedo_suits_date."', tuxedo_suits_time = '".$tuxedo_suits_time."', tuxedo_suits_ip = '".$tuxedo_suits_ip."', tuxedo_suits_status = '".$tuxedo_suits_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query20 = mysql_db_query($dbname, $sql20) or die("Can't Query20");
			}
    
	} else {
				$sql20 = " UPDATE customize_tuxedo_suits_measurements SET tuxedo_suits_date = '".$tuxedo_suits_date."', tuxedo_suits_time = '".$tuxedo_suits_time."', tuxedo_suits_ip = '".$tuxedo_suits_ip."', tuxedo_suits_status = '".$tuxedo_suits_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query20 = mysql_db_query($dbname, $sql20) or die("Can't Query20");
			}
	}

} else if ($tuxedo_suits_fabric_no_6 == "" || $tuxedo_suits_lining_no_6 == "") { }

if ($tuxedo_suits_orderid != "") {
	
	$sql21 = " UPDATE customize_checkout SET checkout_company = '$company_user', checkout_order = '$tuxedo_suits_order_no', checkout_customer = '$tuxedo_suits_customer_name', checkout_date = '$tuxedo_suits_date', checkout_time = '$tuxedo_suits_time', checkout_ip = '$tuxedo_suits_ip', checkout_status = '$tuxedo_suits_status' WHERE checkout_orderid = '$order_id' ";
	$query21 = mysql_query($sql21) or die("Can't Query21");
	
} else if ($tuxedo_suits_orderid == "") {
	
	$sql21 = " INSERT INTO customize_checkout (id, checkout_company, checkout_order, checkout_orderid, checkout_customer, checkout_date, checkout_time, checkout_ip, checkout_status) VALUES ('$id_customize_checkout', '$company_user', '$tuxedo_suits_order_no', '$order_id', '$tuxedo_suits_customer_name', '$tuxedo_suits_date', '$tuxedo_suits_time', '$tuxedo_suits_ip', '$tuxedo_suits_status') ";
	$query21 = mysql_query($sql21) or die("Can't Query21");
	
}

if($query21) {
	
	echo " <script language='javascript'> window.location='../../../cart/single/index.php?orderid=".$order_id."'; </script> ";
	
}

mysql_close();
?>