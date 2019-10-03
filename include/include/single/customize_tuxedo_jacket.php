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
$tuxedo_jacket_orderid = $_POST["tuxedo_jacket_orderid"];

if ($tuxedo_jacket_orderid != "") {
	
	$order_id = $tuxedo_jacket_orderid;
	
} else if ($tuxedo_jacket_orderid == "") {
	
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
$tuxedo_jacket_fabric_no_1 = $_POST["tuxedo_jacket_fabric_no_1"];
$tuxedo_jacket_lining_no_1 = $_POST["tuxedo_jacket_lining_no_1"];
$tuxedo_jacket_fabric_no_2 = $_POST["tuxedo_jacket_fabric_no_2"];
$tuxedo_jacket_lining_no_2 = $_POST["tuxedo_jacket_lining_no_2"];
$tuxedo_jacket_fabric_no_3 = $_POST["tuxedo_jacket_fabric_no_3"];
$tuxedo_jacket_lining_no_3 = $_POST["tuxedo_jacket_lining_no_3"];
$tuxedo_jacket_fabric_no_4 = $_POST["tuxedo_jacket_fabric_no_4"];
$tuxedo_jacket_lining_no_4 = $_POST["tuxedo_jacket_lining_no_4"];
$tuxedo_jacket_fabric_no_5 = $_POST["tuxedo_jacket_fabric_no_5"];
$tuxedo_jacket_lining_no_5 = $_POST["tuxedo_jacket_lining_no_5"];
$tuxedo_jacket_fabric_no_6 = $_POST["tuxedo_jacket_fabric_no_6"];
$tuxedo_jacket_lining_no_6 = $_POST["tuxedo_jacket_lining_no_6"];

$sql4 =	" SELECT * FROM admin_fabrics_tuxedo_jacket WHERE fabricno = '$tuxedo_jacket_fabric_no_1' ";
$query4 = mysql_db_query($dbname, $sql4) or die("Can't Query4");
$row4 = mysql_fetch_array($query4);
$fabrics_type = $row4["type"];
$fabrics_brand = $row4["brand"];

if ($row4["type"] != '') {

$sql01 = " SELECT `fabrictype_".$id_user."` FROM admin_fabrictype WHERE fabrictype_name = '$fabrics_type' AND fabrictype_product = 'Jacket' ";
$query01 = mysql_db_query($dbname, $sql01) or die("Can't Query01");
$row01 = mysql_fetch_array($query01);


$tuxedo_jacket_fabric_price_1 = $row01["0"];

} else if ($row4["brand"] != '') {
	
$sql02 = " SELECT `fabricbrand_".$id_user."` FROM admin_fabricbrand WHERE fabricbrand_name = '$fabrics_brand' AND fabricbrand_product = 'Jacket' ";
$query02 = mysql_db_query($dbname, $sql02) or die("Can't Query02");
$row02 = mysql_fetch_array($query02);	


$tuxedo_jacket_fabric_price_1 = $row02["0"];
	
}

$sql5 =	" SELECT * FROM admin_fabrics_tuxedo_jacket WHERE fabricno = '$tuxedo_jacket_fabric_no_2' ";
$query5 = mysql_db_query($dbname, $sql5) or die("Can't Query5");
$row5 = mysql_fetch_array($query5);
$fabrics_type = $row5["type"];
$fabrics_brand = $row5["brand"];

if ($row5["type"] != '') {

$sql03 = " SELECT `fabrictype_".$id_user."` FROM admin_fabrictype WHERE fabrictype_name = '$fabrics_type' AND fabrictype_product = 'Jacket' ";
$query03 = mysql_db_query($dbname, $sql03) or die("Can't Query03");
$row03 = mysql_fetch_array($query03);


$tuxedo_jacket_fabric_price_2 = $row03["0"];

} else if ($row5["brand"] != '') {
	
$sql04 = " SELECT `fabricbrand_".$id_user."` FROM admin_fabricbrand WHERE fabricbrand_name = '$fabrics_brand' AND fabricbrand_product = 'Jacket' ";
$query04 = mysql_db_query($dbname, $sql04) or die("Can't Query04");
$row04 = mysql_fetch_array($query04);	


$tuxedo_jacket_fabric_price_2 = $row04["0"];
	
}

$sql6 =	" SELECT * FROM admin_fabrics_tuxedo_jacket WHERE fabricno = '$tuxedo_jacket_fabric_no_3' ";
$query6 = mysql_db_query($dbname, $sql6) or die("Can't Query6");
$row6 = mysql_fetch_array($query6);
$fabrics_type = $row6["type"];
$fabrics_brand = $row6["brand"];

if ($row6["type"] != '') {

$sql05 = " SELECT `fabrictype_".$id_user."` FROM admin_fabrictype WHERE fabrictype_name = '$fabrics_type' AND fabrictype_product = 'Jacket' ";
$query05 = mysql_db_query($dbname, $sql05) or die("Can't Query05");
$row05 = mysql_fetch_array($query05);


$tuxedo_jacket_fabric_price_3 = $row05["0"];

} else if ($row6["brand"] != '') {
	
$sql06 = " SELECT `fabricbrand_".$id_user."` FROM admin_fabricbrand WHERE fabricbrand_name = '$fabrics_brand' AND fabricbrand_product = 'Jacket' ";
$query06 = mysql_db_query($dbname, $sql06) or die("Can't Query06");
$row06 = mysql_fetch_array($query06);	


$tuxedo_jacket_fabric_price_3 = $row06["0"];
	
}

$sql7 =	" SELECT * FROM admin_fabrics_tuxedo_jacket WHERE fabricno = '$tuxedo_jacket_fabric_no_4' ";
$query7 = mysql_db_query($dbname, $sql7) or die("Can't Query7");
$row7 = mysql_fetch_array($query7);
$fabrics_type = $row7["type"];
$fabrics_brand = $row7["brand"];

if ($row7["type"] != '') {

$sql07 = " SELECT `fabrictype_".$id_user."` FROM admin_fabrictype WHERE fabrictype_name = '$fabrics_type' AND fabrictype_product = 'Jacket' ";
$query07 = mysql_db_query($dbname, $sql07) or die("Can't Query07");
$row07 = mysql_fetch_array($query07);


$tuxedo_jacket_fabric_price_4 = $row07["0"];

} else if ($row7["brand"] != '') {
	
$sql08 = " SELECT `fabricbrand_".$id_user."` FROM admin_fabricbrand WHERE fabricbrand_name = '$fabrics_brand' AND fabricbrand_product = 'Jacket' ";
$query08 = mysql_db_query($dbname, $sql08) or die("Can't Query08");
$row08 = mysql_fetch_array($query08);

$sql008 = " SELECT `fabricbrand_".$id_user."` FROM admin_fabricbrand WHERE fabricbrand_name = '$fabrics_brand' AND fabricbrand_product = 'Jacket' ";
$query008 = mysql_db_query($dbname, $sql08) or die("Can't Query08");
$row008 = mysql_fetch_array($query008);	


$tuxedo_jacket_fabric_price_4 = $row08["0"];
	
}

$sql8 = " SELECT * FROM admin_fabrics_tuxedo_jacket WHERE fabricno = '$tuxedo_jacket_fabric_no_5' ";
$query8 = mysql_db_query($dbname, $sql8) or die("Can't Query8");
$row8 = mysql_fetch_array($query8);
$fabrics_type = $row8["type"];
$fabrics_brand = $row8["brand"];

if ($row8["type"] != '') {

$sql09 = " SELECT `fabrictype_".$id_user."` FROM admin_fabrictype WHERE fabrictype_name = '$fabrics_type' AND fabrictype_product = 'Jacket' ";
$query09 = mysql_db_query($dbname, $sql09) or die("Can't Query09");
$row09 = mysql_fetch_array($query09);

$sql009 = " SELECT `fabrictype_".$id_user."` FROM admin_fabrictype WHERE fabrictype_name = '$fabrics_type' AND fabrictype_product = 'Jacket' ";
$query009 = mysql_db_query($dbname, $sql009) or die("Can't Query009");
$row009 = mysql_fetch_array($query009);


$tuxedo_jacket_fabric_price_5 = $row09["0"];

} else if ($row8["brand"] != '') {
	
$sql010 = " SELECT `fabricbrand_".$id_user."` FROM admin_fabricbrand WHERE fabricbrand_name = '$fabrics_brand' AND fabricbrand_product = 'Jacket' ";
$query010 = mysql_db_query($dbname, $sql010) or die("Can't Query010");
$row010 = mysql_fetch_array($query010);	

$sql0010 = " SELECT `fabricbrand_".$id_user."` FROM admin_fabricbrand WHERE fabricbrand_name = '$fabrics_brand' AND fabricbrand_product = 'Jacket' ";
$query0010 = mysql_db_query($dbname, $sql0010) or die("Can't Query0010");
$row0010 = mysql_fetch_array($query0010);	


$tuxedo_jacket_fabric_price_5 = $row010["0"];
	
}

$sql9 = " SELECT * FROM admin_fabrics_tuxedo_jacket WHERE fabricno = '$tuxedo_jacket_fabric_no_6' ";
$query9 = mysql_db_query($dbname, $sql9) or die("Can't Query9");
$row9 = mysql_fetch_array($query9);
$fabrics_type = $row9["type"];
$fabrics_brand = $row9["brand"];

if ($row9["type"] != '') {

$sql011 = " SELECT `fabrictype_".$id_user."` FROM admin_fabrictype WHERE fabrictype_name = '$fabrics_type' AND fabrictype_product = 'Jacket' ";
$query011 = mysql_db_query($dbname, $sql011) or die("Can't Query011");
$row011 = mysql_fetch_array($query011);

$sql0011 = " SELECT `fabrictype_".$id_user."` FROM admin_fabrictype WHERE fabrictype_name = '$fabrics_type' AND fabrictype_product = 'Jacket' ";
$query0011 = mysql_db_query($dbname, $sql0011) or die("Can't Query0011");
$row0011 = mysql_fetch_array($query0011);



$tuxedo_jacket_fabric_price_6 = $row011["0"];

} else if ($row9["brand"] != '') {
	
$sql012 = " SELECT `fabricbrand_".$id_user."` FROM admin_fabricbrand WHERE fabricbrand_name = '$fabrics_brand' AND fabricbrand_product = 'Jacket' ";
$query012 = mysql_db_query($dbname, $sql012) or die("Can't Query012");
$row012 = mysql_fetch_array($query012);	

$sql0012 = " SELECT `fabricbrand_".$id_user."` FROM admin_fabricbrand WHERE fabricbrand_name = '$fabrics_brand' AND fabricbrand_product = 'Jacket' ";
$query0012 = mysql_db_query($dbname, $sql0012) or die("Can't Query0012");
$row0012 = mysql_fetch_array($query0012);	



$tuxedo_jacket_fabric_price_6 = $row012["0"];
	
}

/*OTHER PRICING PARAMETERS*/
$tuxedo_jacket_jacket_measurement_chest = $_POST["tuxedo_jacket_jacket_measurement_chest"];
$tuxedo_jacket_jacket_measurement_waist_upper = $_POST["tuxedo_jacket_jacket_measurement_waist_upper"];
$tuxedo_jacket_jacket_measurement_waist_lower = $_POST["tuxedo_jacket_jacket_measurement_waist_lower"];
$tuxedo_jacket_jacket_measurement_hips = $_POST["tuxedo_jacket_jacket_measurement_hips"];

if (($tuxedo_jacket_jacket_measurement_chest >= '50' && $tuxedo_jacket_jacket_measurement_chest <= '52') || ($tuxedo_jacket_jacket_measurement_waist_upper >= '50' && $tuxedo_jacket_jacket_measurement_waist_upper <= '52') || ($tuxedo_jacket_jacket_measurement_waist_lower >= '50' && $tuxedo_jacket_jacket_measurement_waist_lower <= '52') || ($tuxedo_jacket_jacket_measurement_hips >= '50' && $tuxedo_jacket_jacket_measurement_hips <= '52')) {
	
	$price_size_1 = $tuxedo_jacket_fabric_price_1 * 20;
	$price_size_2 = $price_size_1 / 100;
	$price_size_3 = $price_size_2 + $tuxedo_jacket_fabric_price_1;
	
	$price_size_4 = $tuxedo_jacket_fabric_price_2 * 20;
	$price_size_5 = $price_size_4 / 100;
	$price_size_6 = $price_size_5 + $tuxedo_jacket_fabric_price_2;
	
	$price_size_7 = $tuxedo_jacket_fabric_price_3 * 20;
	$price_size_8 = $price_size_7 / 100;
	$price_size_9 = $price_size_8 + $tuxedo_jacket_fabric_price_3;
	
	$price_size_10 = $tuxedo_jacket_fabric_price_4 * 20;
	$price_size_11 = $price_size_10 / 100;
	$price_size_12 = $price_size_11 + $tuxedo_jacket_fabric_price_4;
	
	$price_size_13 = $tuxedo_jacket_fabric_price_5 * 20;
	$price_size_14 = $price_size_13 / 100;
	$price_size_15 = $price_size_14 + $tuxedo_jacket_fabric_price_5;
	
	$price_size_16 = $tuxedo_jacket_fabric_price_6 * 20;
	$price_size_17 = $price_size_16 / 100;
	$price_size_18 = $price_size_17 + $tuxedo_jacket_fabric_price_6;
	
} else if (($tuxedo_jacket_jacket_measurement_chest >= '52.5' && $tuxedo_jacket_jacket_measurement_chest <= '56') || ($tuxedo_jacket_jacket_measurement_waist_upper >= '52.5' && $tuxedo_jacket_jacket_measurement_waist_upper <= '56') || ($tuxedo_jacket_jacket_measurement_waist_lower >= '52.5' && $tuxedo_jacket_jacket_measurement_waist_lower <= '56') || ($tuxedo_jacket_jacket_measurement_hips >= '52.5' && $tuxedo_jacket_jacket_measurement_hips <= '56')) {
	
	$price_size_1 = $tuxedo_jacket_fabric_price_1 * 30;
	$price_size_2 = $price_size_1 / 100;
	$price_size_3 = $price_size_2 + $tuxedo_jacket_fabric_price_1;
	
	$price_size_4 = $tuxedo_jacket_fabric_price_2 * 30;
	$price_size_5 = $price_size_4 / 100;
	$price_size_6 = $price_size_5 + $tuxedo_jacket_fabric_price_2;
	
	$price_size_7 = $tuxedo_jacket_fabric_price_3 * 30;
	$price_size_8 = $price_size_7 / 100;
	$price_size_9 = $price_size_8 + $tuxedo_jacket_fabric_price_3;
	
	$price_size_10 = $tuxedo_jacket_fabric_price_4 * 30;
	$price_size_11 = $price_size_10 / 100;
	$price_size_12 = $price_size_11 + $tuxedo_jacket_fabric_price_4;
	
	$price_size_13 = $tuxedo_jacket_fabric_price_5 * 30;
	$price_size_14 = $price_size_13 / 100;
	$price_size_15 = $price_size_14 + $tuxedo_jacket_fabric_price_5;
	
	$price_size_16 = $tuxedo_jacket_fabric_price_6 * 30;
	$price_size_17 = $price_size_16 / 100;
	$price_size_18 = $price_size_17 + $tuxedo_jacket_fabric_price_6;
	
} else if (($tuxedo_jacket_jacket_measurement_chest >= '56.5' && $tuxedo_jacket_jacket_measurement_chest <= '60') || ($tuxedo_jacket_jacket_measurement_waist_upper >= '56.5' && $tuxedo_jacket_jacket_measurement_waist_upper <= '60') || ($tuxedo_jacket_jacket_measurement_waist_lower >= '56.5' && $tuxedo_jacket_jacket_measurement_waist_lower <= '60') || ($tuxedo_jacket_jacket_measurement_hips >= '56.5' && $tuxedo_jacket_jacket_measurement_hips <= '60')) {
	
	$price_size_1 = $tuxedo_jacket_fabric_price_1 * 40;
	$price_size_2 = $price_size_1 / 100;
	$price_size_3 = $price_size_2 + $tuxedo_jacket_fabric_price_1;
	
	$price_size_4 = $tuxedo_jacket_fabric_price_2 * 40;
	$price_size_5 = $price_size_4 / 100;
	$price_size_6 = $price_size_5 + $tuxedo_jacket_fabric_price_2;
	
	$price_size_7 = $tuxedo_jacket_fabric_price_3 * 40;
	$price_size_8 = $price_size_7 / 100;
	$price_size_9 = $price_size_8 + $tuxedo_jacket_fabric_price_3;
	
	$price_size_10 = $tuxedo_jacket_fabric_price_4 * 40;
	$price_size_11 = $price_size_10 / 100;
	$price_size_12 = $price_size_11 + $tuxedo_jacket_fabric_price_4;
	
	$price_size_13 = $tuxedo_jacket_fabric_price_5 * 40;
	$price_size_14 = $price_size_13 / 100;
	$price_size_15 = $price_size_14 + $tuxedo_jacket_fabric_price_5;
	
	$price_size_16 = $tuxedo_jacket_fabric_price_6 * 40;
	$price_size_17 = $price_size_16 / 100;
	$price_size_18 = $price_size_17 + $tuxedo_jacket_fabric_price_6;
	
} else if (($tuxedo_jacket_jacket_measurement_chest >= '60.5' && $tuxedo_jacket_jacket_measurement_chest <= '64') || ($tuxedo_jacket_jacket_measurement_waist_upper >= '60.5' && $tuxedo_jacket_jacket_measurement_waist_upper <= '64') || ($tuxedo_jacket_jacket_measurement_waist_lower >= '60.5' && $tuxedo_jacket_jacket_measurement_waist_lower <= '64') || ($tuxedo_jacket_jacket_measurement_hips >= '60.5' && $tuxedo_jacket_jacket_measurement_hips <= '64')) {
	
	$price_size_1 = $tuxedo_jacket_fabric_price_1 * 50;
	$price_size_2 = $price_size_1 / 100;
	$price_size_3 = $price_size_2 + $tuxedo_jacket_fabric_price_1;
	
	$price_size_4 = $tuxedo_jacket_fabric_price_2 * 50;
	$price_size_5 = $price_size_4 / 100;
	$price_size_6 = $price_size_5 + $tuxedo_jacket_fabric_price_2;
	
	$price_size_7 = $tuxedo_jacket_fabric_price_3 * 50;
	$price_size_8 = $price_size_7 / 100;
	$price_size_9 = $price_size_8 + $tuxedo_jacket_fabric_price_3;
	
	$price_size_10 = $tuxedo_jacket_fabric_price_4 * 50;
	$price_size_11 = $price_size_10 / 100;
	$price_size_12 = $price_size_11 + $tuxedo_jacket_fabric_price_4;
	
	$price_size_13 = $tuxedo_jacket_fabric_price_5 * 50;
	$price_size_14 = $price_size_13 / 100;
	$price_size_15 = $price_size_14 + $tuxedo_jacket_fabric_price_5;
	
	$price_size_16 = $tuxedo_jacket_fabric_price_6 * 50;
	$price_size_17 = $price_size_16 / 100;
	$price_size_18 = $price_size_17 + $tuxedo_jacket_fabric_price_6;
	
} else if (($tuxedo_jacket_jacket_measurement_chest >= '64.5' && $tuxedo_jacket_jacket_measurement_chest <= '68') || ($tuxedo_jacket_jacket_measurement_waist_upper >= '64.5' && $tuxedo_jacket_jacket_measurement_waist_upper <= '68') || ($tuxedo_jacket_jacket_measurement_waist_lower >= '64.5' && $tuxedo_jacket_jacket_measurement_waist_lower <= '68') || ($tuxedo_jacket_jacket_measurement_hips >= '64.5' && $tuxedo_jacket_jacket_measurement_hips <= '68')) {
	
	$price_size_1 = $tuxedo_jacket_fabric_price_1 * 60;
	$price_size_2 = $price_size_1 / 100;
	$price_size_3 = $price_size_2 + $tuxedo_jacket_fabric_price_1;
	
	$price_size_4 = $tuxedo_jacket_fabric_price_2 * 60;
	$price_size_5 = $price_size_4 / 100;
	$price_size_6 = $price_size_5 + $tuxedo_jacket_fabric_price_2;
	
	$price_size_7 = $tuxedo_jacket_fabric_price_3 * 60;
	$price_size_8 = $price_size_7 / 100;
	$price_size_9 = $price_size_8 + $tuxedo_jacket_fabric_price_3;
	
	$price_size_10 = $tuxedo_jacket_fabric_price_4 * 60;
	$price_size_11 = $price_size_10 / 100;
	$price_size_12 = $price_size_11 + $tuxedo_jacket_fabric_price_4;
	
	$price_size_13 = $tuxedo_jacket_fabric_price_5 * 60;
	$price_size_14 = $price_size_13 / 100;
	$price_size_15 = $price_size_14 + $tuxedo_jacket_fabric_price_5;
	
	$price_size_16 = $tuxedo_jacket_fabric_price_6 * 60;
	$price_size_17 = $price_size_16 / 100;
	$price_size_18 = $price_size_17 + $tuxedo_jacket_fabric_price_6;
	
}  else {
	
	$price_size_3 = $tuxedo_jacket_fabric_price_1;
	$price_size_6 = $tuxedo_jacket_fabric_price_2;
	$price_size_9 = $tuxedo_jacket_fabric_price_3;
	$price_size_12 = $tuxedo_jacket_fabric_price_4;
	$price_size_15 = $tuxedo_jacket_fabric_price_5;
	$price_size_18 = $tuxedo_jacket_fabric_price_6;
	
}

/*BUTTON*/
$tuxedo_jacket_jacket_button_number = $_POST["tuxedo_jacket_jacket_button_number"];

$sql10 = " SELECT price FROM admin_buttons_suits WHERE buttonno = '$tuxedo_jacket_jacket_button_number' ";
$query10 = mysql_db_query($dbname, $sql10) or die("Can't Query10");
$row10 = mysql_fetch_array($query10);
$tuxedo_jacket_button_price = $row10["price"];

$tuxedo_jacket_button_price_1 = $price_size_3 + $tuxedo_jacket_button_price;
$tuxedo_jacket_button_price_2 = $price_size_6 + $tuxedo_jacket_button_price;
$tuxedo_jacket_button_price_3 = $price_size_9 + $tuxedo_jacket_button_price;
$tuxedo_jacket_button_price_4 = $price_size_12 + $tuxedo_jacket_button_price;
$tuxedo_jacket_button_price_5 = $price_size_15 + $tuxedo_jacket_button_price;
$tuxedo_jacket_button_price_6 = $price_size_18 + $tuxedo_jacket_button_price;

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

$tuxedo_jacket_price_2 = $tuxedo_jacket_button_price_2 + $tuxedo_jacket_embroidery_collar_initial_or_name_price + $tuxedo_jacket_brand_price + $tuxedo_jacket_pick_stitch_sleeves_price + $tuxedo_jacket_pick_stitch_vest_price + $tuxedo_jacket_elbow_patch_price + $tuxedo_jacket_canvas_price + $tuxedo_jacket_chest_pocket_satin_fabric_price + $tuxedo_jacket_lower_pocket_satin_fabric_price;

$tuxedo_jacket_price_3 = $tuxedo_jacket_button_price_3 + $tuxedo_jacket_embroidery_collar_initial_or_name_price + $tuxedo_jacket_brand_price + $tuxedo_jacket_pick_stitch_sleeves_price + $tuxedo_jacket_pick_stitch_vest_price + $tuxedo_jacket_elbow_patch_price + $tuxedo_jacket_canvas_price + $tuxedo_jacket_chest_pocket_satin_fabric_price + $tuxedo_jacket_lower_pocket_satin_fabric_price;

$tuxedo_jacket_price_4 = $tuxedo_jacket_button_price_4 + $tuxedo_jacket_embroidery_collar_initial_or_name_price + $tuxedo_jacket_brand_price + $tuxedo_jacket_pick_stitch_sleeves_price + $tuxedo_jacket_pick_stitch_vest_price + $tuxedo_jacket_elbow_patch_price + $tuxedo_jacket_canvas_price + $tuxedo_jacket_chest_pocket_satin_fabric_price + $tuxedo_jacket_lower_pocket_satin_fabric_price;

$tuxedo_jacket_price_5 = $tuxedo_jacket_button_price_5 + $tuxedo_jacket_embroidery_collar_initial_or_name_price + $tuxedo_jacket_brand_price + $tuxedo_jacket_pick_stitch_sleeves_price + $tuxedo_jacket_pick_stitch_vest_price + $tuxedo_jacket_elbow_patch_price + $tuxedo_jacket_canvas_price + $tuxedo_jacket_chest_pocket_satin_fabric_price + $tuxedo_jacket_lower_pocket_satin_fabric_price;

$tuxedo_jacket_price_6 = $tuxedo_jacket_button_price_6 + $tuxedo_jacket_embroidery_collar_initial_or_name_price + $tuxedo_jacket_brand_price + $tuxedo_jacket_pick_stitch_sleeves_price + $tuxedo_jacket_pick_stitch_vest_price + $tuxedo_jacket_elbow_patch_price + $tuxedo_jacket_canvas_price + $tuxedo_jacket_chest_pocket_satin_fabric_price + $tuxedo_jacket_lower_pocket_satin_fabric_price;

/*CUSTOMER*/
$tuxedo_jacket_customer_name = $_POST["tuxedo_jacket_customer_name"];
$tuxedo_jacket_order_no = $_POST["tuxedo_jacket_order_no"];
$tuxedo_jacket_order_date = date("m/d/Y");
$tuxedo_jacket_delivery_date = $_POST["tuxedo_jacket_delivery_date"];

/*CUSTOMIZE*/
$tuxedo_jacket_tuxedo_style = $_POST["tuxedo_jacket_tuxedo_style"];
$tuxedo_jacket_satin_style = $_POST["tuxedo_jacket_satin_style"];
$tuxedo_jacket_collar_satin_style = $_POST["tuxedo_jacket_collar_satin_style"];
$tuxedo_jacket_satin_style = $_POST["tuxedo_jacket_satin_style"];
$tuxedo_jacket_collar_satin_style = $_POST["tuxedo_jacket_collar_satin_style"];
$tuxedo_jacket_lapel_satin_style = $_POST["tuxedo_jacket_lapel_satin_style"];
$tuxedo_jacket_half_satin_option = $_POST["tuxedo_jacket_half_satin_option"];
$tuxedo_jacket_lapel_style = $_POST["tuxedo_jacket_lapel_style"];
$tuxedo_jacket_lapel_width = $_POST["tuxedo_jacket_lapel_width"];
$tuxedo_jacket_lapel_move = $_POST["tuxedo_jacket_lapel_move"];
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

/*FABRIC 1*/
if ($tuxedo_jacket_fabric_no_1 != "" && $tuxedo_jacket_lining_no_1 != "") {

$sql11 = " SELECT MAX(id) FROM customize_order ";
$query11 = mysql_db_query($dbname, $sql11) or die("Can't Query11");
$row11 = mysql_fetch_array($query11);
$id_order = $row11[0] + 1 ;

$sql12 = " SELECT MAX(product_id) FROM customize_order";
$query12 = mysql_db_query($dbname, $sql12) or die("Can't Query12");
$row12 = mysql_fetch_array($query12);
$product_id = $row12[0] + 1 ;

$sql13 = " SELECT MAX(id) FROM customize_tuxedo_jacket_design ";
$query13 = mysql_db_query($dbname, $sql13) or die("Can't Query13");
$row13 = mysql_fetch_array($query13);
$id_tuxedo_jacket = $row13[0] + 1 ;

$sql14 = " INSERT INTO customize_order (id, order_id, product_id, order_reseller, order_order_no, order_name_customize, order_price, order_product, order_fabric_no, order_date, order_time, order_ip, order_status) VALUES ('$id_order', '$order_id', '$product_id', '$company_user', '$tuxedo_jacket_order_no', '$tuxedo_jacket_customer_name', '$tuxedo_jacket_price_1', '$order_product', '$tuxedo_jacket_fabric_no_1', '$tuxedo_jacket_date', '$tuxedo_jacket_time', '$tuxedo_jacket_ip', '$tuxedo_jacket_status') ";
$query14 = mysql_query($sql14) or die("Can't Query14");

$sql15 = " INSERT INTO customize_tuxedo_jacket_design (id, order_id, product_id, tuxedo_jacket_customer_name, tuxedo_jacket_order_no, tuxedo_jacket_order_date, tuxedo_jacket_delivery_date, tuxedo_jacket_fabric_no, tuxedo_jacket_lining_no, tuxedo_jacket_tuxedo_style, tuxedo_jacket_satin_style, tuxedo_jacket_collar_satin_style, tuxedo_jacket_lapel_satin_style, tuxedo_jacket_half_satin_option, tuxedo_jacket_lapel_style, tuxedo_jacket_lapel_width, tuxedo_jacket_lapel_move, tuxedo_jacket_lapel_color, tuxedo_jacket_real_lapel_boutonniere, tuxedo_jacket_vent_style, tuxedo_jacket_pocket_style, tuxedo_jacket_chest_pocket, tuxedo_jacket_chest_pocket_satin, tuxedo_jacket_chest_pocket_satin_color, tuxedo_jacket_chest_pocket_satin_fabric, tuxedo_jacket_lower_pocket_satin, tuxedo_jacket_lower_pocket_satin_color, tuxedo_jacket_lower_pocket_satin_fabric, tuxedo_jacket_shoulder_construction, tuxedo_jacket_sleeve_button, tuxedo_jacket_cuff, tuxedo_jacket_all_sleevebutton_holes_color, tuxedo_jacket_contrast_last_sleevebutton_holes_color, tuxedo_jacket_contrast_last_sleevebutton_holes_button, tuxedo_jacket_lining_style, tuxedo_jacket_canvas, tuxedo_jacket_jacket_button_number, tuxedo_jacket_jacket_thread_on_button, tuxedo_jacket_jacket_button_hole_color, tuxedo_jacket_pick_stitch, tuxedo_jacket_pick_stitch_lapel_color, tuxedo_jacket_pick_stitch_pocket_color, tuxedo_jacket_pick_stitch_sleeves, tuxedo_jacket_pick_stitch_vest, tuxedo_jacket_embroidery_inside_initial_or_name, tuxedo_jacket_embroidery_inside_color, tuxedo_jacket_embroidery_inside_design, tuxedo_jacket_embroidery_collar_initial_or_name, tuxedo_jacket_embroidery_collar_color, tuxedo_jacket_embroidery_collar_design, tuxedo_jacket_brand, tuxedo_jacket_elbow_patch, tuxedo_jacket_collar_felt_color, tuxedo_jacket_date, tuxedo_jacket_time, tuxedo_jacket_ip, tuxedo_jacket_status) VALUES ('$id_tuxedo_jacket', '$order_id', '$product_id', '$tuxedo_jacket_customer_name', '$tuxedo_jacket_order_no', '$tuxedo_jacket_order_date', '$tuxedo_jacket_delivery_date', '$tuxedo_jacket_fabric_no_1', '$tuxedo_jacket_lining_no_1', '$tuxedo_jacket_tuxedo_style', '$tuxedo_jacket_satin_style', '$tuxedo_jacket_collar_satin_style', '$tuxedo_jacket_lapel_satin_style', '$tuxedo_jacket_half_satin_option', '$tuxedo_jacket_lapel_style', '$tuxedo_jacket_lapel_width', '$tuxedo_jacket_lapel_move', '$tuxedo_jacket_lapel_color', '$tuxedo_jacket_real_lapel_boutonniere', '$tuxedo_jacket_vent_style', '$tuxedo_jacket_pocket_style', '$tuxedo_jacket_chest_pocket', '$tuxedo_jacket_chest_pocket_satin', '$tuxedo_jacket_chest_pocket_satin_color', '$tuxedo_jacket_chest_pocket_satin_fabric', '$tuxedo_jacket_lower_pocket_satin', '$tuxedo_jacket_lower_pocket_satin_color', '$tuxedo_jacket_lower_pocket_satin_fabric', '$tuxedo_jacket_shoulder_construction', '$tuxedo_jacket_sleeve_button', '$tuxedo_jacket_cuff', '$tuxedo_jacket_all_sleevebutton_holes_color', '$tuxedo_jacket_contrast_last_sleevebutton_holes_color', '$tuxedo_jacket_contrast_last_sleevebutton_holes_button', '$tuxedo_jacket_lining_style', '$tuxedo_jacket_canvas', '$tuxedo_jacket_jacket_button_number', '$tuxedo_jacket_jacket_thread_on_button', '$tuxedo_jacket_jacket_button_hole_color', '$tuxedo_jacket_pick_stitch', '$tuxedo_jacket_pick_stitch_lapel_color', '$tuxedo_jacket_pick_stitch_pocket_color', '$tuxedo_jacket_pick_stitch_sleeves', '$tuxedo_jacket_pick_stitch_vest', '$tuxedo_jacket_embroidery_inside_initial_or_name', '$tuxedo_jacket_embroidery_inside_color', '$tuxedo_jacket_embroidery_inside_design', '$tuxedo_jacket_embroidery_collar_initial_or_name', '$tuxedo_jacket_embroidery_collar_color', '$tuxedo_jacket_embroidery_collar_design', '$tuxedo_jacket_brand', '$tuxedo_jacket_elbow_patch', '$tuxedo_jacket_collar_felt_color', '$tuxedo_jacket_date', '$tuxedo_jacket_time', '$tuxedo_jacket_ip', '$tuxedo_jacket_status') ";
$query15 = mysql_query($sql15) or die("Can't Query15");

$sql16 = " INSERT INTO customize_tuxedo_jacket_measurements (id, order_id, product_id, tuxedo_jacket_jacket_measurement_sex, tuxedo_jacket_jacket_measurement_fit, tuxedo_jacket_jacket_measurement, tuxedo_jacket_jacket_measurement_jacket_length, tuxedo_jacket_jacket_measurement_back_lenght, tuxedo_jacket_jacket_measurement_chest, tuxedo_jacket_jacket_measurement_waist_upper, tuxedo_jacket_jacket_measurement_waist_lower, tuxedo_jacket_jacket_measurement_hips, tuxedo_jacket_jacket_measurement_shoulders, tuxedo_jacket_jacket_measurement_neck, tuxedo_jacket_jacket_measurement_ptp_front, tuxedo_jacket_jacket_measurement_ptp_back, tuxedo_jacket_jacket_measurement_arm_hole, tuxedo_jacket_jacket_measurement_biceps, tuxedo_jacket_jacket_measurement_sleeves_right, tuxedo_jacket_jacket_measurement_sleeves_left, tuxedo_jacket_jacket_measurement_wrist_right, tuxedo_jacket_jacket_measurement_wrist_left, tuxedo_jacket_jacket_measurement_first_button, tuxedo_jacket_jacket_measurement_shoulder_upper_wrist, tuxedo_jacket_jacket_measurement_shoulder_lower_wrist, tuxedo_jacket_measurement_jacket_shoulder, tuxedo_jacket_measurement_jacket_waist, tuxedo_jacket_measurement_jacket_chest, tuxedo_jacket_remark, tuxedo_jacket_date, tuxedo_jacket_time, tuxedo_jacket_ip, tuxedo_jacket_status) VALUES ('$id_tuxedo_jacket', '$order_id', '$product_id', '$tuxedo_jacket_jacket_measurement_sex', '$tuxedo_jacket_jacket_measurement_fit', '$tuxedo_jacket_jacket_measurement', '$tuxedo_jacket_jacket_measurement_jacket_length', '$tuxedo_jacket_jacket_measurement_back_lenght', '$tuxedo_jacket_jacket_measurement_chest', '$tuxedo_jacket_jacket_measurement_waist_upper', '$tuxedo_jacket_jacket_measurement_waist_lower', '$tuxedo_jacket_jacket_measurement_hips', '$tuxedo_jacket_jacket_measurement_shoulders', '$tuxedo_jacket_jacket_measurement_neck', '$tuxedo_jacket_jacket_measurement_ptp_front', '$tuxedo_jacket_jacket_measurement_ptp_back', '$tuxedo_jacket_jacket_measurement_arm_hole', '$tuxedo_jacket_jacket_measurement_biceps', '$tuxedo_jacket_jacket_measurement_sleeves_right', '$tuxedo_jacket_jacket_measurement_sleeves_left', '$tuxedo_jacket_jacket_measurement_wrist_right', '$tuxedo_jacket_jacket_measurement_wrist_left', '$tuxedo_jacket_jacket_measurement_first_button', '$tuxedo_jacket_jacket_measurement_shoulder_upper_wrist', '$tuxedo_jacket_jacket_measurement_shoulder_lower_wrist', '$tuxedo_jacket_measurement_jacket_shoulder', '$tuxedo_jacket_measurement_jacket_waist', '$tuxedo_jacket_measurement_jacket_chest', '$tuxedo_jacket_remark', '$tuxedo_jacket_date', '$tuxedo_jacket_time', '$tuxedo_jacket_ip', '$tuxedo_jacket_status') ";
$query16 = mysql_query($sql16) or die("Can't Query16");

$path = "../../images/body/tuxedo_jacket/front/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['tuxedo_jacket_body_front']['name'];
	$tmp = $_FILES['tuxedo_jacket_body_front']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$tuxedo_jacket_body_front_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$tuxedo_jacket_body_front_pic)){
				
				$sql17 = " UPDATE customize_tuxedo_jacket_measurements SET tuxedo_jacket_body_front = '".$tuxedo_jacket_body_front_pic."', tuxedo_jacket_date = '".$tuxedo_jacket_date."', tuxedo_jacket_time = '".$tuxedo_jacket_time."', tuxedo_jacket_ip = '".$tuxedo_jacket_ip."', tuxedo_jacket_status = '".$tuxedo_jacket_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query17 = mysql_db_query($dbname, $sql17) or die("Can't Query17");
			}
    
	} else {
				$sql17 = " UPDATE customize_tuxedo_jacket_measurements SET tuxedo_jacket_date = '".$tuxedo_jacket_date."', tuxedo_jacket_time = '".$tuxedo_jacket_time."', tuxedo_jacket_ip = '".$tuxedo_jacket_ip."', tuxedo_jacket_status = '".$tuxedo_jacket_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query17 = mysql_db_query($dbname, $sql17) or die("Can't Query17");
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
				
				$sql18 = " UPDATE customize_tuxedo_jacket_measurements SET tuxedo_jacket_body_left = '".$tuxedo_jacket_body_left_pic."', tuxedo_jacket_date = '".$tuxedo_jacket_date."', tuxedo_jacket_time = '".$tuxedo_jacket_time."', tuxedo_jacket_ip = '".$tuxedo_jacket_ip."', tuxedo_jacket_status = '".$tuxedo_jacket_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query18 = mysql_db_query($dbname, $sql18) or die("Can't Query18");
			}
    
	} else {
				$sql18 = " UPDATE customize_tuxedo_jacket_measurements SET tuxedo_jacket_date = '".$tuxedo_jacket_date."', tuxedo_jacket_time = '".$tuxedo_jacket_time."', tuxedo_jacket_ip = '".$tuxedo_jacket_ip."', tuxedo_jacket_status = '".$tuxedo_jacket_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query18 = mysql_db_query($dbname, $sql18) or die("Can't Query18");
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
				
				$sql19 = " UPDATE customize_tuxedo_jacket_measurements SET tuxedo_jacket_body_right = '".$tuxedo_jacket_body_right_pic."', tuxedo_jacket_date = '".$tuxedo_jacket_date."', tuxedo_jacket_time = '".$tuxedo_jacket_time."', tuxedo_jacket_ip = '".$tuxedo_jacket_ip."', tuxedo_jacket_status = '".$tuxedo_jacket_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query19 = mysql_db_query($dbname, $sql19) or die("Can't Query19");
			}
    
	} else {
				$sql19 = " UPDATE customize_tuxedo_jacket_measurements SET tuxedo_jacket_date = '".$tuxedo_jacket_date."', tuxedo_jacket_time = '".$tuxedo_jacket_time."', tuxedo_jacket_ip = '".$tuxedo_jacket_ip."', tuxedo_jacket_status = '".$tuxedo_jacket_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query19 = mysql_db_query($dbname, $sql19) or die("Can't Query19");
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
				
				$sql20 = " UPDATE customize_tuxedo_jacket_measurements SET tuxedo_jacket_body_back = '".$tuxedo_jacket_body_back_pic."', tuxedo_jacket_date = '".$tuxedo_jacket_date."', tuxedo_jacket_time = '".$tuxedo_jacket_time."', tuxedo_jacket_ip = '".$tuxedo_jacket_ip."', tuxedo_jacket_status = '".$tuxedo_jacket_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query20 = mysql_db_query($dbname, $sql20) or die("Can't Query20");
			}
    
	} else {
				$sql20 = " UPDATE customize_tuxedo_jacket_measurements SET tuxedo_jacket_date = '".$tuxedo_jacket_date."', tuxedo_jacket_time = '".$tuxedo_jacket_time."', tuxedo_jacket_ip = '".$tuxedo_jacket_ip."', tuxedo_jacket_status = '".$tuxedo_jacket_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query20 = mysql_db_query($dbname, $sql20) or die("Can't Query20");
			}
	}

} else if ($tuxedo_jacket_fabric_no_1 == "" || $tuxedo_jacket_lining_no_1 == "") { }

/*FABRIC 2*/
if ($tuxedo_jacket_fabric_no_2 != "" && $tuxedo_jacket_lining_no_2 != "") {

$sql11 = " SELECT MAX(id) FROM customize_order ";
$query11 = mysql_db_query($dbname, $sql11) or die("Can't Query11");
$row11 = mysql_fetch_array($query11);
$id_order = $row11[0] + 1 ;

$sql12 = " SELECT MAX(product_id) FROM customize_order";
$query12 = mysql_db_query($dbname, $sql12) or die("Can't Query12");
$row12 = mysql_fetch_array($query12);
$product_id = $row12[0] + 1 ;

$sql13 = " SELECT MAX(id) FROM customize_tuxedo_jacket_design ";
$query13 = mysql_db_query($dbname, $sql13) or die("Can't Query13");
$row13 = mysql_fetch_array($query13);
$id_tuxedo_jacket = $row13[0] + 1 ;

$sql14 = " INSERT INTO customize_order (id, order_id, product_id, order_reseller, order_order_no, order_name_customize, order_price, order_product, order_fabric_no, order_date, order_time, order_ip, order_status) VALUES ('$id_order', '$order_id', '$product_id', '$company_user', '$tuxedo_jacket_order_no', '$tuxedo_jacket_customer_name', '$tuxedo_jacket_price_2', '$order_product', '$tuxedo_jacket_fabric_no_2', '$tuxedo_jacket_date', '$tuxedo_jacket_time', '$tuxedo_jacket_ip', '$tuxedo_jacket_status') ";
$query14 = mysql_query($sql14) or die("Can't Query14");

$sql15 = " INSERT INTO customize_tuxedo_jacket_design (id, order_id, product_id, tuxedo_jacket_customer_name, tuxedo_jacket_order_no, tuxedo_jacket_order_date, tuxedo_jacket_delivery_date, tuxedo_jacket_fabric_no, tuxedo_jacket_lining_no, tuxedo_jacket_tuxedo_style, tuxedo_jacket_satin_style, tuxedo_jacket_collar_satin_style, tuxedo_jacket_lapel_satin_style, tuxedo_jacket_half_satin_option, tuxedo_jacket_lapel_style, tuxedo_jacket_lapel_width, tuxedo_jacket_lapel_move, tuxedo_jacket_lapel_color, tuxedo_jacket_real_lapel_boutonniere, tuxedo_jacket_vent_style, tuxedo_jacket_pocket_style, tuxedo_jacket_chest_pocket, tuxedo_jacket_chest_pocket_satin, tuxedo_jacket_chest_pocket_satin_color, tuxedo_jacket_chest_pocket_satin_fabric, tuxedo_jacket_lower_pocket_satin, tuxedo_jacket_lower_pocket_satin_color, tuxedo_jacket_lower_pocket_satin_fabric, tuxedo_jacket_shoulder_construction, tuxedo_jacket_sleeve_button, tuxedo_jacket_cuff, tuxedo_jacket_all_sleevebutton_holes_color, tuxedo_jacket_contrast_last_sleevebutton_holes_color, tuxedo_jacket_contrast_last_sleevebutton_holes_button, tuxedo_jacket_lining_style, tuxedo_jacket_canvas, tuxedo_jacket_jacket_button_number, tuxedo_jacket_jacket_thread_on_button, tuxedo_jacket_jacket_button_hole_color, tuxedo_jacket_pick_stitch, tuxedo_jacket_pick_stitch_lapel_color, tuxedo_jacket_pick_stitch_pocket_color, tuxedo_jacket_pick_stitch_sleeves, tuxedo_jacket_pick_stitch_vest, tuxedo_jacket_embroidery_inside_initial_or_name, tuxedo_jacket_embroidery_inside_color, tuxedo_jacket_embroidery_inside_design, tuxedo_jacket_embroidery_collar_initial_or_name, tuxedo_jacket_embroidery_collar_color, tuxedo_jacket_embroidery_collar_design, tuxedo_jacket_brand, tuxedo_jacket_elbow_patch, tuxedo_jacket_collar_felt_color, tuxedo_jacket_date, tuxedo_jacket_time, tuxedo_jacket_ip, tuxedo_jacket_status) VALUES ('$id_tuxedo_jacket', '$order_id', '$product_id', '$tuxedo_jacket_customer_name', '$tuxedo_jacket_order_no', '$tuxedo_jacket_order_date', '$tuxedo_jacket_delivery_date', '$tuxedo_jacket_fabric_no_2', '$tuxedo_jacket_lining_no_2', '$tuxedo_jacket_tuxedo_style', '$tuxedo_jacket_satin_style', '$tuxedo_jacket_collar_satin_style', '$tuxedo_jacket_lapel_satin_style', '$tuxedo_jacket_half_satin_option', '$tuxedo_jacket_lapel_style', '$tuxedo_jacket_lapel_width', '$tuxedo_jacket_lapel_move', '$tuxedo_jacket_lapel_color', '$tuxedo_jacket_real_lapel_boutonniere', '$tuxedo_jacket_vent_style', '$tuxedo_jacket_pocket_style', '$tuxedo_jacket_chest_pocket', '$tuxedo_jacket_chest_pocket_satin', '$tuxedo_jacket_chest_pocket_satin_color', '$tuxedo_jacket_chest_pocket_satin_fabric', '$tuxedo_jacket_lower_pocket_satin', '$tuxedo_jacket_lower_pocket_satin_color', '$tuxedo_jacket_lower_pocket_satin_fabric', '$tuxedo_jacket_shoulder_construction', '$tuxedo_jacket_sleeve_button', '$tuxedo_jacket_cuff', '$tuxedo_jacket_all_sleevebutton_holes_color', '$tuxedo_jacket_contrast_last_sleevebutton_holes_color', '$tuxedo_jacket_contrast_last_sleevebutton_holes_button', '$tuxedo_jacket_lining_style', '$tuxedo_jacket_canvas', '$tuxedo_jacket_jacket_button_number', '$tuxedo_jacket_jacket_thread_on_button', '$tuxedo_jacket_jacket_button_hole_color', '$tuxedo_jacket_pick_stitch', '$tuxedo_jacket_pick_stitch_lapel_color', '$tuxedo_jacket_pick_stitch_pocket_color', '$tuxedo_jacket_pick_stitch_sleeves', '$tuxedo_jacket_pick_stitch_vest', '$tuxedo_jacket_embroidery_inside_initial_or_name', '$tuxedo_jacket_embroidery_inside_color', '$tuxedo_jacket_embroidery_inside_design', '$tuxedo_jacket_embroidery_collar_initial_or_name', '$tuxedo_jacket_embroidery_collar_color', '$tuxedo_jacket_embroidery_collar_design', '$tuxedo_jacket_brand', '$tuxedo_jacket_elbow_patch', '$tuxedo_jacket_collar_felt_color', '$tuxedo_jacket_date', '$tuxedo_jacket_time', '$tuxedo_jacket_ip', '$tuxedo_jacket_status') ";
$query15 = mysql_query($sql15) or die("Can't Query15");

$sql16 = " INSERT INTO customize_tuxedo_jacket_measurements (id, order_id, product_id, tuxedo_jacket_jacket_measurement_sex, tuxedo_jacket_jacket_measurement_fit, tuxedo_jacket_jacket_measurement, tuxedo_jacket_jacket_measurement_jacket_length, tuxedo_jacket_jacket_measurement_back_lenght, tuxedo_jacket_jacket_measurement_chest, tuxedo_jacket_jacket_measurement_waist_upper, tuxedo_jacket_jacket_measurement_waist_lower, tuxedo_jacket_jacket_measurement_hips, tuxedo_jacket_jacket_measurement_shoulders, tuxedo_jacket_jacket_measurement_neck, tuxedo_jacket_jacket_measurement_ptp_front, tuxedo_jacket_jacket_measurement_ptp_back, tuxedo_jacket_jacket_measurement_arm_hole, tuxedo_jacket_jacket_measurement_biceps, tuxedo_jacket_jacket_measurement_sleeves_right, tuxedo_jacket_jacket_measurement_sleeves_left, tuxedo_jacket_jacket_measurement_wrist_right, tuxedo_jacket_jacket_measurement_wrist_left, tuxedo_jacket_jacket_measurement_first_button, tuxedo_jacket_jacket_measurement_shoulder_upper_wrist, tuxedo_jacket_jacket_measurement_shoulder_lower_wrist, tuxedo_jacket_measurement_jacket_shoulder, tuxedo_jacket_measurement_jacket_waist, tuxedo_jacket_measurement_jacket_chest, tuxedo_jacket_remark, tuxedo_jacket_date, tuxedo_jacket_time, tuxedo_jacket_ip, tuxedo_jacket_status) VALUES ('$id_tuxedo_jacket', '$order_id', '$product_id', '$tuxedo_jacket_jacket_measurement_sex', '$tuxedo_jacket_jacket_measurement_fit', '$tuxedo_jacket_jacket_measurement', '$tuxedo_jacket_jacket_measurement_jacket_length', '$tuxedo_jacket_jacket_measurement_back_lenght', '$tuxedo_jacket_jacket_measurement_chest', '$tuxedo_jacket_jacket_measurement_waist_upper', '$tuxedo_jacket_jacket_measurement_waist_lower', '$tuxedo_jacket_jacket_measurement_hips', '$tuxedo_jacket_jacket_measurement_shoulders', '$tuxedo_jacket_jacket_measurement_neck', '$tuxedo_jacket_jacket_measurement_ptp_front', '$tuxedo_jacket_jacket_measurement_ptp_back', '$tuxedo_jacket_jacket_measurement_arm_hole', '$tuxedo_jacket_jacket_measurement_biceps', '$tuxedo_jacket_jacket_measurement_sleeves_right', '$tuxedo_jacket_jacket_measurement_sleeves_left', '$tuxedo_jacket_jacket_measurement_wrist_right', '$tuxedo_jacket_jacket_measurement_wrist_left', '$tuxedo_jacket_jacket_measurement_first_button', '$tuxedo_jacket_jacket_measurement_shoulder_upper_wrist', '$tuxedo_jacket_jacket_measurement_shoulder_lower_wrist', '$tuxedo_jacket_measurement_jacket_shoulder', '$tuxedo_jacket_measurement_jacket_waist', '$tuxedo_jacket_measurement_jacket_chest', '$tuxedo_jacket_remark', '$tuxedo_jacket_date', '$tuxedo_jacket_time', '$tuxedo_jacket_ip', '$tuxedo_jacket_status') ";
$query16 = mysql_query($sql16) or die("Can't Query16");

$path = "../../images/body/tuxedo_jacket/front/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['tuxedo_jacket_body_front']['name'];
	$tmp = $_FILES['tuxedo_jacket_body_front']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$tuxedo_jacket_body_front_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$tuxedo_jacket_body_front_pic)){
				
				$sql17 = " UPDATE customize_tuxedo_jacket_measurements SET tuxedo_jacket_body_front = '".$tuxedo_jacket_body_front_pic."', tuxedo_jacket_date = '".$tuxedo_jacket_date."', tuxedo_jacket_time = '".$tuxedo_jacket_time."', tuxedo_jacket_ip = '".$tuxedo_jacket_ip."', tuxedo_jacket_status = '".$tuxedo_jacket_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query17 = mysql_db_query($dbname, $sql17) or die("Can't Query17");
			}
    
	} else {
				$sql17 = " UPDATE customize_tuxedo_jacket_measurements SET tuxedo_jacket_date = '".$tuxedo_jacket_date."', tuxedo_jacket_time = '".$tuxedo_jacket_time."', tuxedo_jacket_ip = '".$tuxedo_jacket_ip."', tuxedo_jacket_status = '".$tuxedo_jacket_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query17 = mysql_db_query($dbname, $sql17) or die("Can't Query17");
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
				
				$sql18 = " UPDATE customize_tuxedo_jacket_measurements SET tuxedo_jacket_body_left = '".$tuxedo_jacket_body_left_pic."', tuxedo_jacket_date = '".$tuxedo_jacket_date."', tuxedo_jacket_time = '".$tuxedo_jacket_time."', tuxedo_jacket_ip = '".$tuxedo_jacket_ip."', tuxedo_jacket_status = '".$tuxedo_jacket_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query18 = mysql_db_query($dbname, $sql18) or die("Can't Query18");
			}
    
	} else {
				$sql18 = " UPDATE customize_tuxedo_jacket_measurements SET tuxedo_jacket_date = '".$tuxedo_jacket_date."', tuxedo_jacket_time = '".$tuxedo_jacket_time."', tuxedo_jacket_ip = '".$tuxedo_jacket_ip."', tuxedo_jacket_status = '".$tuxedo_jacket_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query18 = mysql_db_query($dbname, $sql18) or die("Can't Query18");
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
				
				$sql19 = " UPDATE customize_tuxedo_jacket_measurements SET tuxedo_jacket_body_right = '".$tuxedo_jacket_body_right_pic."', tuxedo_jacket_date = '".$tuxedo_jacket_date."', tuxedo_jacket_time = '".$tuxedo_jacket_time."', tuxedo_jacket_ip = '".$tuxedo_jacket_ip."', tuxedo_jacket_status = '".$tuxedo_jacket_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query19 = mysql_db_query($dbname, $sql19) or die("Can't Query19");
			}
    
	} else {
				$sql19 = " UPDATE customize_tuxedo_jacket_measurements SET tuxedo_jacket_date = '".$tuxedo_jacket_date."', tuxedo_jacket_time = '".$tuxedo_jacket_time."', tuxedo_jacket_ip = '".$tuxedo_jacket_ip."', tuxedo_jacket_status = '".$tuxedo_jacket_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query19 = mysql_db_query($dbname, $sql19) or die("Can't Query19");
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
				
				$sql20 = " UPDATE customize_tuxedo_jacket_measurements SET tuxedo_jacket_body_back = '".$tuxedo_jacket_body_back_pic."', tuxedo_jacket_date = '".$tuxedo_jacket_date."', tuxedo_jacket_time = '".$tuxedo_jacket_time."', tuxedo_jacket_ip = '".$tuxedo_jacket_ip."', tuxedo_jacket_status = '".$tuxedo_jacket_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query20 = mysql_db_query($dbname, $sql20) or die("Can't Query20");
			}
    
	} else {
				$sql20 = " UPDATE customize_tuxedo_jacket_measurements SET tuxedo_jacket_date = '".$tuxedo_jacket_date."', tuxedo_jacket_time = '".$tuxedo_jacket_time."', tuxedo_jacket_ip = '".$tuxedo_jacket_ip."', tuxedo_jacket_status = '".$tuxedo_jacket_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query20 = mysql_db_query($dbname, $sql20) or die("Can't Query20");
			}
	}

} else if ($tuxedo_jacket_fabric_no_2 == "" || $tuxedo_jacket_lining_no_2 == "") { }	

/*FABRIC 3*/
if ($tuxedo_jacket_fabric_no_3 != "" && $tuxedo_jacket_lining_no_3 != "") {

$sql11 = " SELECT MAX(id) FROM customize_order ";
$query11 = mysql_db_query($dbname, $sql11) or die("Can't Query11");
$row11 = mysql_fetch_array($query11);
$id_order = $row11[0] + 1 ;

$sql12 = " SELECT MAX(product_id) FROM customize_order";
$query12 = mysql_db_query($dbname, $sql12) or die("Can't Query12");
$row12 = mysql_fetch_array($query12);
$product_id = $row12[0] + 1 ;

$sql13 = " SELECT MAX(id) FROM customize_tuxedo_jacket_design ";
$query13 = mysql_db_query($dbname, $sql13) or die("Can't Query13");
$row13 = mysql_fetch_array($query13);
$id_tuxedo_jacket = $row13[0] + 1 ;

$sql14 = " INSERT INTO customize_order (id, order_id, product_id, order_reseller, order_order_no, order_name_customize, order_price, order_product, order_fabric_no, order_date, order_time, order_ip, order_status) VALUES ('$id_order', '$order_id', '$product_id', '$company_user', '$tuxedo_jacket_order_no', '$tuxedo_jacket_customer_name', '$tuxedo_jacket_price_3', '$order_product', '$tuxedo_jacket_fabric_no_3', '$tuxedo_jacket_date', '$tuxedo_jacket_time', '$tuxedo_jacket_ip', '$tuxedo_jacket_status') ";
$query14 = mysql_query($sql14) or die("Can't Query14");

$sql15 = " INSERT INTO customize_tuxedo_jacket_design (id, order_id, product_id, tuxedo_jacket_customer_name, tuxedo_jacket_order_no, tuxedo_jacket_order_date, tuxedo_jacket_delivery_date, tuxedo_jacket_fabric_no, tuxedo_jacket_lining_no, tuxedo_jacket_tuxedo_style, tuxedo_jacket_satin_style, tuxedo_jacket_collar_satin_style, tuxedo_jacket_lapel_satin_style, tuxedo_jacket_half_satin_option, tuxedo_jacket_lapel_style, tuxedo_jacket_lapel_width, tuxedo_jacket_lapel_move, tuxedo_jacket_lapel_color, tuxedo_jacket_real_lapel_boutonniere, tuxedo_jacket_vent_style, tuxedo_jacket_pocket_style, tuxedo_jacket_chest_pocket, tuxedo_jacket_chest_pocket_satin, tuxedo_jacket_chest_pocket_satin_color, tuxedo_jacket_chest_pocket_satin_fabric, tuxedo_jacket_lower_pocket_satin, tuxedo_jacket_lower_pocket_satin_color, tuxedo_jacket_lower_pocket_satin_fabric, tuxedo_jacket_shoulder_construction, tuxedo_jacket_sleeve_button, tuxedo_jacket_cuff, tuxedo_jacket_all_sleevebutton_holes_color, tuxedo_jacket_contrast_last_sleevebutton_holes_color, tuxedo_jacket_contrast_last_sleevebutton_holes_button, tuxedo_jacket_lining_style, tuxedo_jacket_canvas, tuxedo_jacket_jacket_button_number, tuxedo_jacket_jacket_thread_on_button, tuxedo_jacket_jacket_button_hole_color, tuxedo_jacket_pick_stitch, tuxedo_jacket_pick_stitch_lapel_color, tuxedo_jacket_pick_stitch_pocket_color, tuxedo_jacket_pick_stitch_sleeves, tuxedo_jacket_pick_stitch_vest, tuxedo_jacket_embroidery_inside_initial_or_name, tuxedo_jacket_embroidery_inside_color, tuxedo_jacket_embroidery_inside_design, tuxedo_jacket_embroidery_collar_initial_or_name, tuxedo_jacket_embroidery_collar_color, tuxedo_jacket_embroidery_collar_design, tuxedo_jacket_brand, tuxedo_jacket_elbow_patch, tuxedo_jacket_collar_felt_color, tuxedo_jacket_date, tuxedo_jacket_time, tuxedo_jacket_ip, tuxedo_jacket_status) VALUES ('$id_tuxedo_jacket', '$order_id', '$product_id', '$tuxedo_jacket_customer_name', '$tuxedo_jacket_order_no', '$tuxedo_jacket_order_date', '$tuxedo_jacket_delivery_date', '$tuxedo_jacket_fabric_no_3', '$tuxedo_jacket_lining_no_3', '$tuxedo_jacket_tuxedo_style', '$tuxedo_jacket_satin_style', '$tuxedo_jacket_collar_satin_style', '$tuxedo_jacket_lapel_satin_style', '$tuxedo_jacket_half_satin_option', '$tuxedo_jacket_lapel_style', '$tuxedo_jacket_lapel_width', '$tuxedo_jacket_lapel_move', '$tuxedo_jacket_lapel_color', '$tuxedo_jacket_real_lapel_boutonniere', '$tuxedo_jacket_vent_style', '$tuxedo_jacket_pocket_style', '$tuxedo_jacket_chest_pocket', '$tuxedo_jacket_chest_pocket_satin', '$tuxedo_jacket_chest_pocket_satin_color', '$tuxedo_jacket_chest_pocket_satin_fabric', '$tuxedo_jacket_lower_pocket_satin', '$tuxedo_jacket_lower_pocket_satin_color', '$tuxedo_jacket_lower_pocket_satin_fabric', '$tuxedo_jacket_shoulder_construction', '$tuxedo_jacket_sleeve_button', '$tuxedo_jacket_cuff', '$tuxedo_jacket_all_sleevebutton_holes_color', '$tuxedo_jacket_contrast_last_sleevebutton_holes_color', '$tuxedo_jacket_contrast_last_sleevebutton_holes_button', '$tuxedo_jacket_lining_style', '$tuxedo_jacket_canvas', '$tuxedo_jacket_jacket_button_number', '$tuxedo_jacket_jacket_thread_on_button', '$tuxedo_jacket_jacket_button_hole_color', '$tuxedo_jacket_pick_stitch', '$tuxedo_jacket_pick_stitch_lapel_color', '$tuxedo_jacket_pick_stitch_pocket_color', '$tuxedo_jacket_pick_stitch_sleeves', '$tuxedo_jacket_pick_stitch_vest', '$tuxedo_jacket_embroidery_inside_initial_or_name', '$tuxedo_jacket_embroidery_inside_color', '$tuxedo_jacket_embroidery_inside_design', '$tuxedo_jacket_embroidery_collar_initial_or_name', '$tuxedo_jacket_embroidery_collar_color', '$tuxedo_jacket_embroidery_collar_design', '$tuxedo_jacket_brand', '$tuxedo_jacket_elbow_patch', '$tuxedo_jacket_collar_felt_color', '$tuxedo_jacket_date', '$tuxedo_jacket_time', '$tuxedo_jacket_ip', '$tuxedo_jacket_status') ";
$query15 = mysql_query($sql15) or die("Can't Query15");

$sql16 = " INSERT INTO customize_tuxedo_jacket_measurements (id, order_id, product_id, tuxedo_jacket_jacket_measurement_sex, tuxedo_jacket_jacket_measurement_fit, tuxedo_jacket_jacket_measurement, tuxedo_jacket_jacket_measurement_jacket_length, tuxedo_jacket_jacket_measurement_back_lenght, tuxedo_jacket_jacket_measurement_chest, tuxedo_jacket_jacket_measurement_waist_upper, tuxedo_jacket_jacket_measurement_waist_lower, tuxedo_jacket_jacket_measurement_hips, tuxedo_jacket_jacket_measurement_shoulders, tuxedo_jacket_jacket_measurement_neck, tuxedo_jacket_jacket_measurement_ptp_front, tuxedo_jacket_jacket_measurement_ptp_back, tuxedo_jacket_jacket_measurement_arm_hole, tuxedo_jacket_jacket_measurement_biceps, tuxedo_jacket_jacket_measurement_sleeves_right, tuxedo_jacket_jacket_measurement_sleeves_left, tuxedo_jacket_jacket_measurement_wrist_right, tuxedo_jacket_jacket_measurement_wrist_left, tuxedo_jacket_jacket_measurement_first_button, tuxedo_jacket_jacket_measurement_shoulder_upper_wrist, tuxedo_jacket_jacket_measurement_shoulder_lower_wrist, tuxedo_jacket_measurement_jacket_shoulder, tuxedo_jacket_measurement_jacket_waist, tuxedo_jacket_measurement_jacket_chest, tuxedo_jacket_remark, tuxedo_jacket_date, tuxedo_jacket_time, tuxedo_jacket_ip, tuxedo_jacket_status) VALUES ('$id_tuxedo_jacket', '$order_id', '$product_id', '$tuxedo_jacket_jacket_measurement_sex', '$tuxedo_jacket_jacket_measurement_fit', '$tuxedo_jacket_jacket_measurement', '$tuxedo_jacket_jacket_measurement_jacket_length', '$tuxedo_jacket_jacket_measurement_back_lenght', '$tuxedo_jacket_jacket_measurement_chest', '$tuxedo_jacket_jacket_measurement_waist_upper', '$tuxedo_jacket_jacket_measurement_waist_lower', '$tuxedo_jacket_jacket_measurement_hips', '$tuxedo_jacket_jacket_measurement_shoulders', '$tuxedo_jacket_jacket_measurement_neck', '$tuxedo_jacket_jacket_measurement_ptp_front', '$tuxedo_jacket_jacket_measurement_ptp_back', '$tuxedo_jacket_jacket_measurement_arm_hole', '$tuxedo_jacket_jacket_measurement_biceps', '$tuxedo_jacket_jacket_measurement_sleeves_right', '$tuxedo_jacket_jacket_measurement_sleeves_left', '$tuxedo_jacket_jacket_measurement_wrist_right', '$tuxedo_jacket_jacket_measurement_wrist_left', '$tuxedo_jacket_jacket_measurement_first_button', '$tuxedo_jacket_jacket_measurement_shoulder_upper_wrist', '$tuxedo_jacket_jacket_measurement_shoulder_lower_wrist', '$tuxedo_jacket_measurement_jacket_shoulder', '$tuxedo_jacket_measurement_jacket_waist', '$tuxedo_jacket_measurement_jacket_chest', '$tuxedo_jacket_remark', '$tuxedo_jacket_date', '$tuxedo_jacket_time', '$tuxedo_jacket_ip', '$tuxedo_jacket_status') ";
$query16 = mysql_query($sql16) or die("Can't Query16");

$path = "../../images/body/tuxedo_jacket/front/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['tuxedo_jacket_body_front']['name'];
	$tmp = $_FILES['tuxedo_jacket_body_front']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$tuxedo_jacket_body_front_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$tuxedo_jacket_body_front_pic)){
				
				$sql17 = " UPDATE customize_tuxedo_jacket_measurements SET tuxedo_jacket_body_front = '".$tuxedo_jacket_body_front_pic."', tuxedo_jacket_date = '".$tuxedo_jacket_date."', tuxedo_jacket_time = '".$tuxedo_jacket_time."', tuxedo_jacket_ip = '".$tuxedo_jacket_ip."', tuxedo_jacket_status = '".$tuxedo_jacket_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query17 = mysql_db_query($dbname, $sql17) or die("Can't Query17");
			}
    
	} else {
				$sql17 = " UPDATE customize_tuxedo_jacket_measurements SET tuxedo_jacket_date = '".$tuxedo_jacket_date."', tuxedo_jacket_time = '".$tuxedo_jacket_time."', tuxedo_jacket_ip = '".$tuxedo_jacket_ip."', tuxedo_jacket_status = '".$tuxedo_jacket_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query17 = mysql_db_query($dbname, $sql17) or die("Can't Query17");
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
				
				$sql18 = " UPDATE customize_tuxedo_jacket_measurements SET tuxedo_jacket_body_left = '".$tuxedo_jacket_body_left_pic."', tuxedo_jacket_date = '".$tuxedo_jacket_date."', tuxedo_jacket_time = '".$tuxedo_jacket_time."', tuxedo_jacket_ip = '".$tuxedo_jacket_ip."', tuxedo_jacket_status = '".$tuxedo_jacket_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query18 = mysql_db_query($dbname, $sql18) or die("Can't Query18");
			}
    
	} else {
				$sql18 = " UPDATE customize_tuxedo_jacket_measurements SET tuxedo_jacket_date = '".$tuxedo_jacket_date."', tuxedo_jacket_time = '".$tuxedo_jacket_time."', tuxedo_jacket_ip = '".$tuxedo_jacket_ip."', tuxedo_jacket_status = '".$tuxedo_jacket_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query18 = mysql_db_query($dbname, $sql18) or die("Can't Query18");
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
				
				$sql19 = " UPDATE customize_tuxedo_jacket_measurements SET tuxedo_jacket_body_right = '".$tuxedo_jacket_body_right_pic."', tuxedo_jacket_date = '".$tuxedo_jacket_date."', tuxedo_jacket_time = '".$tuxedo_jacket_time."', tuxedo_jacket_ip = '".$tuxedo_jacket_ip."', tuxedo_jacket_status = '".$tuxedo_jacket_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query19 = mysql_db_query($dbname, $sql19) or die("Can't Query19");
			}
    
	} else {
				$sql19 = " UPDATE customize_tuxedo_jacket_measurements SET tuxedo_jacket_date = '".$tuxedo_jacket_date."', tuxedo_jacket_time = '".$tuxedo_jacket_time."', tuxedo_jacket_ip = '".$tuxedo_jacket_ip."', tuxedo_jacket_status = '".$tuxedo_jacket_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query19 = mysql_db_query($dbname, $sql19) or die("Can't Query19");
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
				
				$sql20 = " UPDATE customize_tuxedo_jacket_measurements SET tuxedo_jacket_body_back = '".$tuxedo_jacket_body_back_pic."', tuxedo_jacket_date = '".$tuxedo_jacket_date."', tuxedo_jacket_time = '".$tuxedo_jacket_time."', tuxedo_jacket_ip = '".$tuxedo_jacket_ip."', tuxedo_jacket_status = '".$tuxedo_jacket_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query20 = mysql_db_query($dbname, $sql20) or die("Can't Query20");
			}
    
	} else {
				$sql20 = " UPDATE customize_tuxedo_jacket_measurements SET tuxedo_jacket_date = '".$tuxedo_jacket_date."', tuxedo_jacket_time = '".$tuxedo_jacket_time."', tuxedo_jacket_ip = '".$tuxedo_jacket_ip."', tuxedo_jacket_status = '".$tuxedo_jacket_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query20 = mysql_db_query($dbname, $sql20) or die("Can't Query20");
			}
	}

} else if ($tuxedo_jacket_fabric_no_3 == "" || $tuxedo_jacket_lining_no_3 == "") { }

/*FABRIC 4*/
if ($tuxedo_jacket_fabric_no_4 != "" && $tuxedo_jacket_lining_no_4 != "") {

$sql11 = " SELECT MAX(id) FROM customize_order ";
$query11 = mysql_db_query($dbname, $sql11) or die("Can't Query11");
$row11 = mysql_fetch_array($query11);
$id_order = $row11[0] + 1 ;

$sql12 = " SELECT MAX(product_id) FROM customize_order";
$query12 = mysql_db_query($dbname, $sql12) or die("Can't Query12");
$row12 = mysql_fetch_array($query12);
$product_id = $row12[0] + 1 ;

$sql13 = " SELECT MAX(id) FROM customize_tuxedo_jacket_design ";
$query13 = mysql_db_query($dbname, $sql13) or die("Can't Query13");
$row13 = mysql_fetch_array($query13);
$id_tuxedo_jacket = $row13[0] + 1 ;

$sql14 = " INSERT INTO customize_order (id, order_id, product_id, order_reseller, order_order_no, order_name_customize, order_price, order_product, order_fabric_no, order_date, order_time, order_ip, order_status) VALUES ('$id_order', '$order_id', '$product_id', '$company_user', '$tuxedo_jacket_order_no', '$tuxedo_jacket_customer_name', '$tuxedo_jacket_price_4', '$order_product', '$tuxedo_jacket_fabric_no_4', '$tuxedo_jacket_date', '$tuxedo_jacket_time', '$tuxedo_jacket_ip', '$tuxedo_jacket_status') ";
$query14 = mysql_query($sql14) or die("Can't Query14");

$sql15 = " INSERT INTO customize_tuxedo_jacket_design (id, order_id, product_id, tuxedo_jacket_customer_name, tuxedo_jacket_order_no, tuxedo_jacket_order_date, tuxedo_jacket_delivery_date, tuxedo_jacket_fabric_no, tuxedo_jacket_lining_no, tuxedo_jacket_tuxedo_style, tuxedo_jacket_satin_style, tuxedo_jacket_collar_satin_style, tuxedo_jacket_lapel_satin_style, tuxedo_jacket_half_satin_option, tuxedo_jacket_lapel_style, tuxedo_jacket_lapel_width, tuxedo_jacket_lapel_move, tuxedo_jacket_lapel_color, tuxedo_jacket_real_lapel_boutonniere, tuxedo_jacket_vent_style, tuxedo_jacket_pocket_style, tuxedo_jacket_chest_pocket, tuxedo_jacket_chest_pocket_satin, tuxedo_jacket_chest_pocket_satin_color, tuxedo_jacket_chest_pocket_satin_fabric, tuxedo_jacket_lower_pocket_satin, tuxedo_jacket_lower_pocket_satin_color, tuxedo_jacket_lower_pocket_satin_fabric, tuxedo_jacket_shoulder_construction, tuxedo_jacket_sleeve_button, tuxedo_jacket_cuff, tuxedo_jacket_all_sleevebutton_holes_color, tuxedo_jacket_contrast_last_sleevebutton_holes_color, tuxedo_jacket_contrast_last_sleevebutton_holes_button, tuxedo_jacket_lining_style, tuxedo_jacket_canvas, tuxedo_jacket_jacket_button_number, tuxedo_jacket_jacket_thread_on_button, tuxedo_jacket_jacket_button_hole_color, tuxedo_jacket_pick_stitch, tuxedo_jacket_pick_stitch_lapel_color, tuxedo_jacket_pick_stitch_pocket_color, tuxedo_jacket_pick_stitch_sleeves, tuxedo_jacket_pick_stitch_vest, tuxedo_jacket_embroidery_inside_initial_or_name, tuxedo_jacket_embroidery_inside_color, tuxedo_jacket_embroidery_inside_design, tuxedo_jacket_embroidery_collar_initial_or_name, tuxedo_jacket_embroidery_collar_color, tuxedo_jacket_embroidery_collar_design, tuxedo_jacket_brand, tuxedo_jacket_elbow_patch, tuxedo_jacket_collar_felt_color, tuxedo_jacket_date, tuxedo_jacket_time, tuxedo_jacket_ip, tuxedo_jacket_status) VALUES ('$id_tuxedo_jacket', '$order_id', '$product_id', '$tuxedo_jacket_customer_name', '$tuxedo_jacket_order_no', '$tuxedo_jacket_order_date', '$tuxedo_jacket_delivery_date', '$tuxedo_jacket_fabric_no_4', '$tuxedo_jacket_lining_no_4', '$tuxedo_jacket_tuxedo_style', '$tuxedo_jacket_satin_style', '$tuxedo_jacket_collar_satin_style', '$tuxedo_jacket_lapel_satin_style', '$tuxedo_jacket_half_satin_option', '$tuxedo_jacket_lapel_style', '$tuxedo_jacket_lapel_width', '$tuxedo_jacket_lapel_move', '$tuxedo_jacket_lapel_color', '$tuxedo_jacket_real_lapel_boutonniere', '$tuxedo_jacket_vent_style', '$tuxedo_jacket_pocket_style', '$tuxedo_jacket_chest_pocket', '$tuxedo_jacket_chest_pocket_satin', '$tuxedo_jacket_chest_pocket_satin_color', '$tuxedo_jacket_chest_pocket_satin_fabric', '$tuxedo_jacket_lower_pocket_satin', '$tuxedo_jacket_lower_pocket_satin_color', '$tuxedo_jacket_lower_pocket_satin_fabric', '$tuxedo_jacket_shoulder_construction', '$tuxedo_jacket_sleeve_button', '$tuxedo_jacket_cuff', '$tuxedo_jacket_all_sleevebutton_holes_color', '$tuxedo_jacket_contrast_last_sleevebutton_holes_color', '$tuxedo_jacket_contrast_last_sleevebutton_holes_button', '$tuxedo_jacket_lining_style', '$tuxedo_jacket_canvas', '$tuxedo_jacket_jacket_button_number', '$tuxedo_jacket_jacket_thread_on_button', '$tuxedo_jacket_jacket_button_hole_color', '$tuxedo_jacket_pick_stitch', '$tuxedo_jacket_pick_stitch_lapel_color', '$tuxedo_jacket_pick_stitch_pocket_color', '$tuxedo_jacket_pick_stitch_sleeves', '$tuxedo_jacket_pick_stitch_vest', '$tuxedo_jacket_embroidery_inside_initial_or_name', '$tuxedo_jacket_embroidery_inside_color', '$tuxedo_jacket_embroidery_inside_design', '$tuxedo_jacket_embroidery_collar_initial_or_name', '$tuxedo_jacket_embroidery_collar_color', '$tuxedo_jacket_embroidery_collar_design', '$tuxedo_jacket_brand', '$tuxedo_jacket_elbow_patch', '$tuxedo_jacket_collar_felt_color', '$tuxedo_jacket_date', '$tuxedo_jacket_time', '$tuxedo_jacket_ip', '$tuxedo_jacket_status') ";
$query15 = mysql_query($sql15) or die("Can't Query15");

$sql16 = " INSERT INTO customize_tuxedo_jacket_measurements (id, order_id, product_id, tuxedo_jacket_jacket_measurement_sex, tuxedo_jacket_jacket_measurement_fit, tuxedo_jacket_jacket_measurement, tuxedo_jacket_jacket_measurement_jacket_length, tuxedo_jacket_jacket_measurement_back_lenght, tuxedo_jacket_jacket_measurement_chest, tuxedo_jacket_jacket_measurement_waist_upper, tuxedo_jacket_jacket_measurement_waist_lower, tuxedo_jacket_jacket_measurement_hips, tuxedo_jacket_jacket_measurement_shoulders, tuxedo_jacket_jacket_measurement_neck, tuxedo_jacket_jacket_measurement_ptp_front, tuxedo_jacket_jacket_measurement_ptp_back, tuxedo_jacket_jacket_measurement_arm_hole, tuxedo_jacket_jacket_measurement_biceps, tuxedo_jacket_jacket_measurement_sleeves_right, tuxedo_jacket_jacket_measurement_sleeves_left, tuxedo_jacket_jacket_measurement_wrist_right, tuxedo_jacket_jacket_measurement_wrist_left, tuxedo_jacket_jacket_measurement_first_button, tuxedo_jacket_jacket_measurement_shoulder_upper_wrist, tuxedo_jacket_jacket_measurement_shoulder_lower_wrist, tuxedo_jacket_measurement_jacket_shoulder, tuxedo_jacket_measurement_jacket_waist, tuxedo_jacket_measurement_jacket_chest, tuxedo_jacket_remark, tuxedo_jacket_date, tuxedo_jacket_time, tuxedo_jacket_ip, tuxedo_jacket_status) VALUES ('$id_tuxedo_jacket', '$order_id', '$product_id', '$tuxedo_jacket_jacket_measurement_sex', '$tuxedo_jacket_jacket_measurement_fit', '$tuxedo_jacket_jacket_measurement', '$tuxedo_jacket_jacket_measurement_jacket_length', '$tuxedo_jacket_jacket_measurement_back_lenght', '$tuxedo_jacket_jacket_measurement_chest', '$tuxedo_jacket_jacket_measurement_waist_upper', '$tuxedo_jacket_jacket_measurement_waist_lower', '$tuxedo_jacket_jacket_measurement_hips', '$tuxedo_jacket_jacket_measurement_shoulders', '$tuxedo_jacket_jacket_measurement_neck', '$tuxedo_jacket_jacket_measurement_ptp_front', '$tuxedo_jacket_jacket_measurement_ptp_back', '$tuxedo_jacket_jacket_measurement_arm_hole', '$tuxedo_jacket_jacket_measurement_biceps', '$tuxedo_jacket_jacket_measurement_sleeves_right', '$tuxedo_jacket_jacket_measurement_sleeves_left', '$tuxedo_jacket_jacket_measurement_wrist_right', '$tuxedo_jacket_jacket_measurement_wrist_left', '$tuxedo_jacket_jacket_measurement_first_button', '$tuxedo_jacket_jacket_measurement_shoulder_upper_wrist', '$tuxedo_jacket_jacket_measurement_shoulder_lower_wrist', '$tuxedo_jacket_measurement_jacket_shoulder', '$tuxedo_jacket_measurement_jacket_waist', '$tuxedo_jacket_measurement_jacket_chest', '$tuxedo_jacket_remark', '$tuxedo_jacket_date', '$tuxedo_jacket_time', '$tuxedo_jacket_ip', '$tuxedo_jacket_status') ";
$query16 = mysql_query($sql16) or die("Can't Query16");

$path = "../../images/body/tuxedo_jacket/front/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['tuxedo_jacket_body_front']['name'];
	$tmp = $_FILES['tuxedo_jacket_body_front']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$tuxedo_jacket_body_front_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$tuxedo_jacket_body_front_pic)){
				
				$sql17 = " UPDATE customize_tuxedo_jacket_measurements SET tuxedo_jacket_body_front = '".$tuxedo_jacket_body_front_pic."', tuxedo_jacket_date = '".$tuxedo_jacket_date."', tuxedo_jacket_time = '".$tuxedo_jacket_time."', tuxedo_jacket_ip = '".$tuxedo_jacket_ip."', tuxedo_jacket_status = '".$tuxedo_jacket_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query17 = mysql_db_query($dbname, $sql17) or die("Can't Query17");
			}
    
	} else {
				$sql17 = " UPDATE customize_tuxedo_jacket_measurements SET tuxedo_jacket_date = '".$tuxedo_jacket_date."', tuxedo_jacket_time = '".$tuxedo_jacket_time."', tuxedo_jacket_ip = '".$tuxedo_jacket_ip."', tuxedo_jacket_status = '".$tuxedo_jacket_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query17 = mysql_db_query($dbname, $sql17) or die("Can't Query17");
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
				
				$sql18 = " UPDATE customize_tuxedo_jacket_measurements SET tuxedo_jacket_body_left = '".$tuxedo_jacket_body_left_pic."', tuxedo_jacket_date = '".$tuxedo_jacket_date."', tuxedo_jacket_time = '".$tuxedo_jacket_time."', tuxedo_jacket_ip = '".$tuxedo_jacket_ip."', tuxedo_jacket_status = '".$tuxedo_jacket_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query18 = mysql_db_query($dbname, $sql18) or die("Can't Query18");
			}
    
	} else {
				$sql18 = " UPDATE customize_tuxedo_jacket_measurements SET tuxedo_jacket_date = '".$tuxedo_jacket_date."', tuxedo_jacket_time = '".$tuxedo_jacket_time."', tuxedo_jacket_ip = '".$tuxedo_jacket_ip."', tuxedo_jacket_status = '".$tuxedo_jacket_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query18 = mysql_db_query($dbname, $sql18) or die("Can't Query18");
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
				
				$sql19 = " UPDATE customize_tuxedo_jacket_measurements SET tuxedo_jacket_body_right = '".$tuxedo_jacket_body_right_pic."', tuxedo_jacket_date = '".$tuxedo_jacket_date."', tuxedo_jacket_time = '".$tuxedo_jacket_time."', tuxedo_jacket_ip = '".$tuxedo_jacket_ip."', tuxedo_jacket_status = '".$tuxedo_jacket_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query19 = mysql_db_query($dbname, $sql19) or die("Can't Query19");
			}
    
	} else {
				$sql19 = " UPDATE customize_tuxedo_jacket_measurements SET tuxedo_jacket_date = '".$tuxedo_jacket_date."', tuxedo_jacket_time = '".$tuxedo_jacket_time."', tuxedo_jacket_ip = '".$tuxedo_jacket_ip."', tuxedo_jacket_status = '".$tuxedo_jacket_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query19 = mysql_db_query($dbname, $sql19) or die("Can't Query19");
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
				
				$sql20 = " UPDATE customize_tuxedo_jacket_measurements SET tuxedo_jacket_body_back = '".$tuxedo_jacket_body_back_pic."', tuxedo_jacket_date = '".$tuxedo_jacket_date."', tuxedo_jacket_time = '".$tuxedo_jacket_time."', tuxedo_jacket_ip = '".$tuxedo_jacket_ip."', tuxedo_jacket_status = '".$tuxedo_jacket_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query20 = mysql_db_query($dbname, $sql20) or die("Can't Query20");
			}
    
	} else {
				$sql20 = " UPDATE customize_tuxedo_jacket_measurements SET tuxedo_jacket_date = '".$tuxedo_jacket_date."', tuxedo_jacket_time = '".$tuxedo_jacket_time."', tuxedo_jacket_ip = '".$tuxedo_jacket_ip."', tuxedo_jacket_status = '".$tuxedo_jacket_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query20 = mysql_db_query($dbname, $sql20) or die("Can't Query20");
			}
	}

} else if ($tuxedo_jacket_fabric_no_4 == "" || $tuxedo_jacket_lining_no_4 == "") { }

/*FABRIC 5*/
if ($tuxedo_jacket_fabric_no_5 != "" && $tuxedo_jacket_lining_no_5 != "") {
	
$sql11 = " SELECT MAX(id) FROM customize_order ";
$query11 = mysql_db_query($dbname, $sql11) or die("Can't Query11");
$row11 = mysql_fetch_array($query11);
$id_order = $row11[0] + 1 ;

$sql12 = " SELECT MAX(product_id) FROM customize_order";
$query12 = mysql_db_query($dbname, $sql12) or die("Can't Query12");
$row12 = mysql_fetch_array($query12);
$product_id = $row12[0] + 1 ;

$sql13 = " SELECT MAX(id) FROM customize_tuxedo_jacket_design ";
$query13 = mysql_db_query($dbname, $sql13) or die("Can't Query13");
$row13 = mysql_fetch_array($query13);
$id_tuxedo_jacket = $row13[0] + 1 ;

$sql14 = " INSERT INTO customize_order (id, order_id, product_id, order_reseller, order_order_no, order_name_customize, order_price, order_product, order_fabric_no, order_date, order_time, order_ip, order_status) VALUES ('$id_order', '$order_id', '$product_id', '$company_user', '$tuxedo_jacket_order_no', '$tuxedo_jacket_customer_name', '$tuxedo_jacket_price_5', '$order_product', '$tuxedo_jacket_fabric_no_5', '$tuxedo_jacket_date', '$tuxedo_jacket_time', '$tuxedo_jacket_ip', '$tuxedo_jacket_status') ";
$query14 = mysql_query($sql14) or die("Can't Query14");

$sql15 = " INSERT INTO customize_tuxedo_jacket_design (id, order_id, product_id, tuxedo_jacket_customer_name, tuxedo_jacket_order_no, tuxedo_jacket_order_date, tuxedo_jacket_delivery_date, tuxedo_jacket_fabric_no, tuxedo_jacket_lining_no, tuxedo_jacket_tuxedo_style, tuxedo_jacket_satin_style, tuxedo_jacket_collar_satin_style, tuxedo_jacket_lapel_satin_style, tuxedo_jacket_half_satin_option, tuxedo_jacket_lapel_style, tuxedo_jacket_lapel_width, tuxedo_jacket_lapel_move, tuxedo_jacket_lapel_color, tuxedo_jacket_real_lapel_boutonniere, tuxedo_jacket_vent_style, tuxedo_jacket_pocket_style, tuxedo_jacket_chest_pocket, tuxedo_jacket_chest_pocket_satin, tuxedo_jacket_chest_pocket_satin_color, tuxedo_jacket_chest_pocket_satin_fabric, tuxedo_jacket_lower_pocket_satin, tuxedo_jacket_lower_pocket_satin_color, tuxedo_jacket_lower_pocket_satin_fabric, tuxedo_jacket_shoulder_construction, tuxedo_jacket_sleeve_button, tuxedo_jacket_cuff, tuxedo_jacket_all_sleevebutton_holes_color, tuxedo_jacket_contrast_last_sleevebutton_holes_color, tuxedo_jacket_contrast_last_sleevebutton_holes_button, tuxedo_jacket_lining_style, tuxedo_jacket_canvas, tuxedo_jacket_jacket_button_number, tuxedo_jacket_jacket_thread_on_button, tuxedo_jacket_jacket_button_hole_color, tuxedo_jacket_pick_stitch, tuxedo_jacket_pick_stitch_lapel_color, tuxedo_jacket_pick_stitch_pocket_color, tuxedo_jacket_pick_stitch_sleeves, tuxedo_jacket_pick_stitch_vest, tuxedo_jacket_embroidery_inside_initial_or_name, tuxedo_jacket_embroidery_inside_color, tuxedo_jacket_embroidery_inside_design, tuxedo_jacket_embroidery_collar_initial_or_name, tuxedo_jacket_embroidery_collar_color, tuxedo_jacket_embroidery_collar_design, tuxedo_jacket_brand, tuxedo_jacket_elbow_patch, tuxedo_jacket_collar_felt_color, tuxedo_jacket_date, tuxedo_jacket_time, tuxedo_jacket_ip, tuxedo_jacket_status) VALUES ('$id_tuxedo_jacket', '$order_id', '$product_id', '$tuxedo_jacket_customer_name', '$tuxedo_jacket_order_no', '$tuxedo_jacket_order_date', '$tuxedo_jacket_delivery_date', '$tuxedo_jacket_fabric_no_5', '$tuxedo_jacket_lining_no_5', '$tuxedo_jacket_tuxedo_style', '$tuxedo_jacket_satin_style', '$tuxedo_jacket_collar_satin_style', '$tuxedo_jacket_lapel_satin_style', '$tuxedo_jacket_half_satin_option', '$tuxedo_jacket_lapel_style', '$tuxedo_jacket_lapel_width', '$tuxedo_jacket_lapel_move', '$tuxedo_jacket_lapel_color', '$tuxedo_jacket_real_lapel_boutonniere', '$tuxedo_jacket_vent_style', '$tuxedo_jacket_pocket_style', '$tuxedo_jacket_chest_pocket', '$tuxedo_jacket_chest_pocket_satin', '$tuxedo_jacket_chest_pocket_satin_color', '$tuxedo_jacket_chest_pocket_satin_fabric', '$tuxedo_jacket_lower_pocket_satin', '$tuxedo_jacket_lower_pocket_satin_color', '$tuxedo_jacket_lower_pocket_satin_fabric', '$tuxedo_jacket_shoulder_construction', '$tuxedo_jacket_sleeve_button', '$tuxedo_jacket_cuff', '$tuxedo_jacket_all_sleevebutton_holes_color', '$tuxedo_jacket_contrast_last_sleevebutton_holes_color', '$tuxedo_jacket_contrast_last_sleevebutton_holes_button', '$tuxedo_jacket_lining_style', '$tuxedo_jacket_canvas', '$tuxedo_jacket_jacket_button_number', '$tuxedo_jacket_jacket_thread_on_button', '$tuxedo_jacket_jacket_button_hole_color', '$tuxedo_jacket_pick_stitch', '$tuxedo_jacket_pick_stitch_lapel_color', '$tuxedo_jacket_pick_stitch_pocket_color', '$tuxedo_jacket_pick_stitch_sleeves', '$tuxedo_jacket_pick_stitch_vest', '$tuxedo_jacket_embroidery_inside_initial_or_name', '$tuxedo_jacket_embroidery_inside_color', '$tuxedo_jacket_embroidery_inside_design', '$tuxedo_jacket_embroidery_collar_initial_or_name', '$tuxedo_jacket_embroidery_collar_color', '$tuxedo_jacket_embroidery_collar_design', '$tuxedo_jacket_brand', '$tuxedo_jacket_elbow_patch', '$tuxedo_jacket_collar_felt_color', '$tuxedo_jacket_date', '$tuxedo_jacket_time', '$tuxedo_jacket_ip', '$tuxedo_jacket_status') ";
$query15 = mysql_query($sql15) or die("Can't Query15");

$sql16 = " INSERT INTO customize_tuxedo_jacket_measurements (id, order_id, product_id, tuxedo_jacket_jacket_measurement_sex, tuxedo_jacket_jacket_measurement_fit, tuxedo_jacket_jacket_measurement, tuxedo_jacket_jacket_measurement_jacket_length, tuxedo_jacket_jacket_measurement_back_lenght, tuxedo_jacket_jacket_measurement_chest, tuxedo_jacket_jacket_measurement_waist_upper, tuxedo_jacket_jacket_measurement_waist_lower, tuxedo_jacket_jacket_measurement_hips, tuxedo_jacket_jacket_measurement_shoulders, tuxedo_jacket_jacket_measurement_neck, tuxedo_jacket_jacket_measurement_ptp_front, tuxedo_jacket_jacket_measurement_ptp_back, tuxedo_jacket_jacket_measurement_arm_hole, tuxedo_jacket_jacket_measurement_biceps, tuxedo_jacket_jacket_measurement_sleeves_right, tuxedo_jacket_jacket_measurement_sleeves_left, tuxedo_jacket_jacket_measurement_wrist_right, tuxedo_jacket_jacket_measurement_wrist_left, tuxedo_jacket_jacket_measurement_first_button, tuxedo_jacket_jacket_measurement_shoulder_upper_wrist, tuxedo_jacket_jacket_measurement_shoulder_lower_wrist, tuxedo_jacket_measurement_jacket_shoulder, tuxedo_jacket_measurement_jacket_waist, tuxedo_jacket_measurement_jacket_chest, tuxedo_jacket_remark, tuxedo_jacket_date, tuxedo_jacket_time, tuxedo_jacket_ip, tuxedo_jacket_status) VALUES ('$id_tuxedo_jacket', '$order_id', '$product_id', '$tuxedo_jacket_jacket_measurement_sex', '$tuxedo_jacket_jacket_measurement_fit', '$tuxedo_jacket_jacket_measurement', '$tuxedo_jacket_jacket_measurement_jacket_length', '$tuxedo_jacket_jacket_measurement_back_lenght', '$tuxedo_jacket_jacket_measurement_chest', '$tuxedo_jacket_jacket_measurement_waist_upper', '$tuxedo_jacket_jacket_measurement_waist_lower', '$tuxedo_jacket_jacket_measurement_hips', '$tuxedo_jacket_jacket_measurement_shoulders', '$tuxedo_jacket_jacket_measurement_neck', '$tuxedo_jacket_jacket_measurement_ptp_front', '$tuxedo_jacket_jacket_measurement_ptp_back', '$tuxedo_jacket_jacket_measurement_arm_hole', '$tuxedo_jacket_jacket_measurement_biceps', '$tuxedo_jacket_jacket_measurement_sleeves_right', '$tuxedo_jacket_jacket_measurement_sleeves_left', '$tuxedo_jacket_jacket_measurement_wrist_right', '$tuxedo_jacket_jacket_measurement_wrist_left', '$tuxedo_jacket_jacket_measurement_first_button', '$tuxedo_jacket_jacket_measurement_shoulder_upper_wrist', '$tuxedo_jacket_jacket_measurement_shoulder_lower_wrist', '$tuxedo_jacket_measurement_jacket_shoulder', '$tuxedo_jacket_measurement_jacket_waist', '$tuxedo_jacket_measurement_jacket_chest', '$tuxedo_jacket_remark', '$tuxedo_jacket_date', '$tuxedo_jacket_time', '$tuxedo_jacket_ip', '$tuxedo_jacket_status') ";
$query16 = mysql_query($sql16) or die("Can't Query16");

$path = "../../images/body/tuxedo_jacket/front/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['tuxedo_jacket_body_front']['name'];
	$tmp = $_FILES['tuxedo_jacket_body_front']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$tuxedo_jacket_body_front_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$tuxedo_jacket_body_front_pic)){
				
				$sql17 = " UPDATE customize_tuxedo_jacket_measurements SET tuxedo_jacket_body_front = '".$tuxedo_jacket_body_front_pic."', tuxedo_jacket_date = '".$tuxedo_jacket_date."', tuxedo_jacket_time = '".$tuxedo_jacket_time."', tuxedo_jacket_ip = '".$tuxedo_jacket_ip."', tuxedo_jacket_status = '".$tuxedo_jacket_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query17 = mysql_db_query($dbname, $sql17) or die("Can't Query17");
			}
    
	} else {
				$sql17 = " UPDATE customize_tuxedo_jacket_measurements SET tuxedo_jacket_date = '".$tuxedo_jacket_date."', tuxedo_jacket_time = '".$tuxedo_jacket_time."', tuxedo_jacket_ip = '".$tuxedo_jacket_ip."', tuxedo_jacket_status = '".$tuxedo_jacket_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query17 = mysql_db_query($dbname, $sql17) or die("Can't Query17");
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
				
				$sql18 = " UPDATE customize_tuxedo_jacket_measurements SET tuxedo_jacket_body_left = '".$tuxedo_jacket_body_left_pic."', tuxedo_jacket_date = '".$tuxedo_jacket_date."', tuxedo_jacket_time = '".$tuxedo_jacket_time."', tuxedo_jacket_ip = '".$tuxedo_jacket_ip."', tuxedo_jacket_status = '".$tuxedo_jacket_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query18 = mysql_db_query($dbname, $sql18) or die("Can't Query18");
			}
    
	} else {
				$sql18 = " UPDATE customize_tuxedo_jacket_measurements SET tuxedo_jacket_date = '".$tuxedo_jacket_date."', tuxedo_jacket_time = '".$tuxedo_jacket_time."', tuxedo_jacket_ip = '".$tuxedo_jacket_ip."', tuxedo_jacket_status = '".$tuxedo_jacket_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query18 = mysql_db_query($dbname, $sql18) or die("Can't Query18");
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
				
				$sql19 = " UPDATE customize_tuxedo_jacket_measurements SET tuxedo_jacket_body_right = '".$tuxedo_jacket_body_right_pic."', tuxedo_jacket_date = '".$tuxedo_jacket_date."', tuxedo_jacket_time = '".$tuxedo_jacket_time."', tuxedo_jacket_ip = '".$tuxedo_jacket_ip."', tuxedo_jacket_status = '".$tuxedo_jacket_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query19 = mysql_db_query($dbname, $sql19) or die("Can't Query19");
			}
    
	} else {
				$sql19 = " UPDATE customize_tuxedo_jacket_measurements SET tuxedo_jacket_date = '".$tuxedo_jacket_date."', tuxedo_jacket_time = '".$tuxedo_jacket_time."', tuxedo_jacket_ip = '".$tuxedo_jacket_ip."', tuxedo_jacket_status = '".$tuxedo_jacket_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query19 = mysql_db_query($dbname, $sql19) or die("Can't Query19");
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
				
				$sql20 = " UPDATE customize_tuxedo_jacket_measurements SET tuxedo_jacket_body_back = '".$tuxedo_jacket_body_back_pic."', tuxedo_jacket_date = '".$tuxedo_jacket_date."', tuxedo_jacket_time = '".$tuxedo_jacket_time."', tuxedo_jacket_ip = '".$tuxedo_jacket_ip."', tuxedo_jacket_status = '".$tuxedo_jacket_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query20 = mysql_db_query($dbname, $sql20) or die("Can't Query20");
			}
    
	} else {
				$sql20 = " UPDATE customize_tuxedo_jacket_measurements SET tuxedo_jacket_date = '".$tuxedo_jacket_date."', tuxedo_jacket_time = '".$tuxedo_jacket_time."', tuxedo_jacket_ip = '".$tuxedo_jacket_ip."', tuxedo_jacket_status = '".$tuxedo_jacket_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query20 = mysql_db_query($dbname, $sql20) or die("Can't Query20");
			}
	}

} else if ($tuxedo_jacket_fabric_no_5 == "" || $tuxedo_jacket_lining_no_5 == "") { }

/*FABRIC 6*/
if ($tuxedo_jacket_fabric_no_6 != "" && $tuxedo_jacket_lining_no_6 != "") {

$sql11 = " SELECT MAX(id) FROM customize_order ";
$query11 = mysql_db_query($dbname, $sql11) or die("Can't Query11");
$row11 = mysql_fetch_array($query11);
$id_order = $row11[0] + 1 ;

$sql12 = " SELECT MAX(product_id) FROM customize_order";
$query12 = mysql_db_query($dbname, $sql12) or die("Can't Query12");
$row12 = mysql_fetch_array($query12);
$product_id = $row12[0] + 1 ;

$sql13 = " SELECT MAX(id) FROM customize_tuxedo_jacket_design ";
$query13 = mysql_db_query($dbname, $sql13) or die("Can't Query13");
$row13 = mysql_fetch_array($query13);
$id_tuxedo_jacket = $row13[0] + 1 ;

$sql14 = " INSERT INTO customize_order (id, order_id, product_id, order_reseller, order_order_no, order_name_customize, order_price, order_product, order_fabric_no, order_date, order_time, order_ip, order_status) VALUES ('$id_order', '$order_id', '$product_id', '$company_user', '$tuxedo_jacket_order_no', '$tuxedo_jacket_customer_name', '$tuxedo_jacket_price_6', '$order_product', '$tuxedo_jacket_fabric_no_6', '$tuxedo_jacket_date', '$tuxedo_jacket_time', '$tuxedo_jacket_ip', '$tuxedo_jacket_status') ";
$query14 = mysql_query($sql14) or die("Can't Query14");

$sql15 = " INSERT INTO customize_tuxedo_jacket_design (id, order_id, product_id, tuxedo_jacket_customer_name, tuxedo_jacket_order_no, tuxedo_jacket_order_date, tuxedo_jacket_delivery_date, tuxedo_jacket_fabric_no, tuxedo_jacket_lining_no, tuxedo_jacket_tuxedo_style, tuxedo_jacket_satin_style, tuxedo_jacket_collar_satin_style, tuxedo_jacket_lapel_satin_style, tuxedo_jacket_half_satin_option, tuxedo_jacket_lapel_style, tuxedo_jacket_lapel_width, tuxedo_jacket_lapel_move, tuxedo_jacket_lapel_color, tuxedo_jacket_real_lapel_boutonniere, tuxedo_jacket_vent_style, tuxedo_jacket_pocket_style, tuxedo_jacket_chest_pocket, tuxedo_jacket_chest_pocket_satin, tuxedo_jacket_chest_pocket_satin_color, tuxedo_jacket_chest_pocket_satin_fabric, tuxedo_jacket_lower_pocket_satin, tuxedo_jacket_lower_pocket_satin_color, tuxedo_jacket_lower_pocket_satin_fabric, tuxedo_jacket_shoulder_construction, tuxedo_jacket_sleeve_button, tuxedo_jacket_cuff, tuxedo_jacket_all_sleevebutton_holes_color, tuxedo_jacket_contrast_last_sleevebutton_holes_color, tuxedo_jacket_contrast_last_sleevebutton_holes_button, tuxedo_jacket_lining_style, tuxedo_jacket_canvas, tuxedo_jacket_jacket_button_number, tuxedo_jacket_jacket_thread_on_button, tuxedo_jacket_jacket_button_hole_color, tuxedo_jacket_pick_stitch, tuxedo_jacket_pick_stitch_lapel_color, tuxedo_jacket_pick_stitch_pocket_color, tuxedo_jacket_pick_stitch_sleeves, tuxedo_jacket_pick_stitch_vest, tuxedo_jacket_embroidery_inside_initial_or_name, tuxedo_jacket_embroidery_inside_color, tuxedo_jacket_embroidery_inside_design, tuxedo_jacket_embroidery_collar_initial_or_name, tuxedo_jacket_embroidery_collar_color, tuxedo_jacket_embroidery_collar_design, tuxedo_jacket_brand, tuxedo_jacket_elbow_patch, tuxedo_jacket_collar_felt_color, tuxedo_jacket_date, tuxedo_jacket_time, tuxedo_jacket_ip, tuxedo_jacket_status) VALUES ('$id_tuxedo_jacket', '$order_id', '$product_id', '$tuxedo_jacket_customer_name', '$tuxedo_jacket_order_no', '$tuxedo_jacket_order_date', '$tuxedo_jacket_delivery_date', '$tuxedo_jacket_fabric_no_6', '$tuxedo_jacket_lining_no_6', '$tuxedo_jacket_tuxedo_style', '$tuxedo_jacket_satin_style', '$tuxedo_jacket_collar_satin_style', '$tuxedo_jacket_lapel_satin_style', '$tuxedo_jacket_half_satin_option', '$tuxedo_jacket_lapel_style', '$tuxedo_jacket_lapel_width', '$tuxedo_jacket_lapel_move', '$tuxedo_jacket_lapel_color', '$tuxedo_jacket_real_lapel_boutonniere', '$tuxedo_jacket_vent_style', '$tuxedo_jacket_pocket_style', '$tuxedo_jacket_chest_pocket', '$tuxedo_jacket_chest_pocket_satin', '$tuxedo_jacket_chest_pocket_satin_color', '$tuxedo_jacket_chest_pocket_satin_fabric', '$tuxedo_jacket_lower_pocket_satin', '$tuxedo_jacket_lower_pocket_satin_color', '$tuxedo_jacket_lower_pocket_satin_fabric', '$tuxedo_jacket_shoulder_construction', '$tuxedo_jacket_sleeve_button', '$tuxedo_jacket_cuff', '$tuxedo_jacket_all_sleevebutton_holes_color', '$tuxedo_jacket_contrast_last_sleevebutton_holes_color', '$tuxedo_jacket_contrast_last_sleevebutton_holes_button', '$tuxedo_jacket_lining_style', '$tuxedo_jacket_canvas', '$tuxedo_jacket_jacket_button_number', '$tuxedo_jacket_jacket_thread_on_button', '$tuxedo_jacket_jacket_button_hole_color', '$tuxedo_jacket_pick_stitch', '$tuxedo_jacket_pick_stitch_lapel_color', '$tuxedo_jacket_pick_stitch_pocket_color', '$tuxedo_jacket_pick_stitch_sleeves', '$tuxedo_jacket_pick_stitch_vest', '$tuxedo_jacket_embroidery_inside_initial_or_name', '$tuxedo_jacket_embroidery_inside_color', '$tuxedo_jacket_embroidery_inside_design', '$tuxedo_jacket_embroidery_collar_initial_or_name', '$tuxedo_jacket_embroidery_collar_color', '$tuxedo_jacket_embroidery_collar_design', '$tuxedo_jacket_brand', '$tuxedo_jacket_elbow_patch', '$tuxedo_jacket_collar_felt_color', '$tuxedo_jacket_date', '$tuxedo_jacket_time', '$tuxedo_jacket_ip', '$tuxedo_jacket_status') ";
$query15 = mysql_query($sql15) or die("Can't Query15");

$sql16 = " INSERT INTO customize_tuxedo_jacket_measurements (id, order_id, product_id, tuxedo_jacket_jacket_measurement_sex, tuxedo_jacket_jacket_measurement_fit, tuxedo_jacket_jacket_measurement, tuxedo_jacket_jacket_measurement_jacket_length, tuxedo_jacket_jacket_measurement_back_lenght, tuxedo_jacket_jacket_measurement_chest, tuxedo_jacket_jacket_measurement_waist_upper, tuxedo_jacket_jacket_measurement_waist_lower, tuxedo_jacket_jacket_measurement_hips, tuxedo_jacket_jacket_measurement_shoulders, tuxedo_jacket_jacket_measurement_neck, tuxedo_jacket_jacket_measurement_ptp_front, tuxedo_jacket_jacket_measurement_ptp_back, tuxedo_jacket_jacket_measurement_arm_hole, tuxedo_jacket_jacket_measurement_biceps, tuxedo_jacket_jacket_measurement_sleeves_right, tuxedo_jacket_jacket_measurement_sleeves_left, tuxedo_jacket_jacket_measurement_wrist_right, tuxedo_jacket_jacket_measurement_wrist_left, tuxedo_jacket_jacket_measurement_first_button, tuxedo_jacket_jacket_measurement_shoulder_upper_wrist, tuxedo_jacket_jacket_measurement_shoulder_lower_wrist, tuxedo_jacket_measurement_jacket_shoulder, tuxedo_jacket_measurement_jacket_waist, tuxedo_jacket_measurement_jacket_chest, tuxedo_jacket_remark, tuxedo_jacket_date, tuxedo_jacket_time, tuxedo_jacket_ip, tuxedo_jacket_status) VALUES ('$id_tuxedo_jacket', '$order_id', '$product_id', '$tuxedo_jacket_jacket_measurement_sex', '$tuxedo_jacket_jacket_measurement_fit', '$tuxedo_jacket_jacket_measurement', '$tuxedo_jacket_jacket_measurement_jacket_length', '$tuxedo_jacket_jacket_measurement_back_lenght', '$tuxedo_jacket_jacket_measurement_chest', '$tuxedo_jacket_jacket_measurement_waist_upper', '$tuxedo_jacket_jacket_measurement_waist_lower', '$tuxedo_jacket_jacket_measurement_hips', '$tuxedo_jacket_jacket_measurement_shoulders', '$tuxedo_jacket_jacket_measurement_neck', '$tuxedo_jacket_jacket_measurement_ptp_front', '$tuxedo_jacket_jacket_measurement_ptp_back', '$tuxedo_jacket_jacket_measurement_arm_hole', '$tuxedo_jacket_jacket_measurement_biceps', '$tuxedo_jacket_jacket_measurement_sleeves_right', '$tuxedo_jacket_jacket_measurement_sleeves_left', '$tuxedo_jacket_jacket_measurement_wrist_right', '$tuxedo_jacket_jacket_measurement_wrist_left', '$tuxedo_jacket_jacket_measurement_first_button', '$tuxedo_jacket_jacket_measurement_shoulder_upper_wrist', '$tuxedo_jacket_jacket_measurement_shoulder_lower_wrist', '$tuxedo_jacket_measurement_jacket_shoulder', '$tuxedo_jacket_measurement_jacket_waist', '$tuxedo_jacket_measurement_jacket_chest', '$tuxedo_jacket_remark', '$tuxedo_jacket_date', '$tuxedo_jacket_time', '$tuxedo_jacket_ip', '$tuxedo_jacket_status') ";
$query16 = mysql_query($sql16) or die("Can't Query16");

$path = "../../images/body/tuxedo_jacket/front/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['tuxedo_jacket_body_front']['name'];
	$tmp = $_FILES['tuxedo_jacket_body_front']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$tuxedo_jacket_body_front_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$tuxedo_jacket_body_front_pic)){
				
				$sql17 = " UPDATE customize_tuxedo_jacket_measurements SET tuxedo_jacket_body_front = '".$tuxedo_jacket_body_front_pic."', tuxedo_jacket_date = '".$tuxedo_jacket_date."', tuxedo_jacket_time = '".$tuxedo_jacket_time."', tuxedo_jacket_ip = '".$tuxedo_jacket_ip."', tuxedo_jacket_status = '".$tuxedo_jacket_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query17 = mysql_db_query($dbname, $sql17) or die("Can't Query17");
			}
    
	} else {
				$sql17 = " UPDATE customize_tuxedo_jacket_measurements SET tuxedo_jacket_date = '".$tuxedo_jacket_date."', tuxedo_jacket_time = '".$tuxedo_jacket_time."', tuxedo_jacket_ip = '".$tuxedo_jacket_ip."', tuxedo_jacket_status = '".$tuxedo_jacket_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query17 = mysql_db_query($dbname, $sql17) or die("Can't Query17");
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
				
				$sql18 = " UPDATE customize_tuxedo_jacket_measurements SET tuxedo_jacket_body_left = '".$tuxedo_jacket_body_left_pic."', tuxedo_jacket_date = '".$tuxedo_jacket_date."', tuxedo_jacket_time = '".$tuxedo_jacket_time."', tuxedo_jacket_ip = '".$tuxedo_jacket_ip."', tuxedo_jacket_status = '".$tuxedo_jacket_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query18 = mysql_db_query($dbname, $sql18) or die("Can't Query18");
			}
    
	} else {
				$sql18 = " UPDATE customize_tuxedo_jacket_measurements SET tuxedo_jacket_date = '".$tuxedo_jacket_date."', tuxedo_jacket_time = '".$tuxedo_jacket_time."', tuxedo_jacket_ip = '".$tuxedo_jacket_ip."', tuxedo_jacket_status = '".$tuxedo_jacket_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query18 = mysql_db_query($dbname, $sql18) or die("Can't Query18");
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
				
				$sql19 = " UPDATE customize_tuxedo_jacket_measurements SET tuxedo_jacket_body_right = '".$tuxedo_jacket_body_right_pic."', tuxedo_jacket_date = '".$tuxedo_jacket_date."', tuxedo_jacket_time = '".$tuxedo_jacket_time."', tuxedo_jacket_ip = '".$tuxedo_jacket_ip."', tuxedo_jacket_status = '".$tuxedo_jacket_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query19 = mysql_db_query($dbname, $sql19) or die("Can't Query19");
			}
    
	} else {
				$sql19 = " UPDATE customize_tuxedo_jacket_measurements SET tuxedo_jacket_date = '".$tuxedo_jacket_date."', tuxedo_jacket_time = '".$tuxedo_jacket_time."', tuxedo_jacket_ip = '".$tuxedo_jacket_ip."', tuxedo_jacket_status = '".$tuxedo_jacket_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query19 = mysql_db_query($dbname, $sql19) or die("Can't Query19");
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
				
				$sql20 = " UPDATE customize_tuxedo_jacket_measurements SET tuxedo_jacket_body_back = '".$tuxedo_jacket_body_back_pic."', tuxedo_jacket_date = '".$tuxedo_jacket_date."', tuxedo_jacket_time = '".$tuxedo_jacket_time."', tuxedo_jacket_ip = '".$tuxedo_jacket_ip."', tuxedo_jacket_status = '".$tuxedo_jacket_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query20 = mysql_db_query($dbname, $sql20) or die("Can't Query20");
			}
    
	} else {
				$sql20 = " UPDATE customize_tuxedo_jacket_measurements SET tuxedo_jacket_date = '".$tuxedo_jacket_date."', tuxedo_jacket_time = '".$tuxedo_jacket_time."', tuxedo_jacket_ip = '".$tuxedo_jacket_ip."', tuxedo_jacket_status = '".$tuxedo_jacket_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query20 = mysql_db_query($dbname, $sql20) or die("Can't Query20");
			}
	}

} else if ($tuxedo_jacket_fabric_no_6 == "" || $tuxedo_jacket_lining_no_6 == "") { }

if ($tuxedo_jacket_orderid != "") {
	
	$sql21 = " UPDATE customize_checkout SET checkout_company = '$company_user', checkout_order = '$tuxedo_jacket_order_no', checkout_customer = '$tuxedo_jacket_customer_name', checkout_date = '$tuxedo_jacket_date', checkout_time = '$tuxedo_jacket_time', checkout_ip = '$tuxedo_jacket_ip', checkout_status = '$tuxedo_jacket_status' WHERE checkout_orderid = '$order_id' ";
	$query21 = mysql_query($sql21) or die("Can't Query21");
	
} else if ($tuxedo_jacket_orderid == "") {
	
	$sql21 = " INSERT INTO customize_checkout (id, checkout_company, checkout_order, checkout_orderid, checkout_customer, checkout_date, checkout_time, checkout_ip, checkout_status) VALUES ('$id_customize_checkout', '$company_user', '$tuxedo_jacket_order_no', '$order_id', '$tuxedo_jacket_customer_name', '$tuxedo_jacket_date', '$tuxedo_jacket_time', '$tuxedo_jacket_ip', '$tuxedo_jacket_status') ";
	$query21 = mysql_query($sql21) or die("Can't Query21");
	
}

if($query21) {
	
	echo " <script language='javascript'> window.location='../../../cart/single/index.php?orderid=".$order_id."'; </script> ";
	
}

mysql_close();
?>