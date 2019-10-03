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

$order_product = vest;
$vest_orderid = $_POST["vest_orderid"];

if ($vest_orderid != "") {
	
	$order_id = $vest_orderid;
	
} else if ($vest_orderid == "") {
	
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
$vest_fabric_no_1 = $_POST["vest_fabric_no_1"];
$vest_lining_no_1 = $_POST["vest_lining_no_1"];
$vest_fabric_no_2 = $_POST["vest_fabric_no_2"];
$vest_lining_no_2 = $_POST["vest_lining_no_2"];
$vest_fabric_no_3 = $_POST["vest_fabric_no_3"];
$vest_lining_no_3 = $_POST["vest_lining_no_3"];
$vest_fabric_no_4 = $_POST["vest_fabric_no_4"];
$vest_lining_no_4 = $_POST["vest_lining_no_4"];
$vest_fabric_no_5 = $_POST["vest_fabric_no_5"];
$vest_lining_no_5 = $_POST["vest_lining_no_5"];
$vest_fabric_no_6 = $_POST["vest_fabric_no_6"];
$vest_lining_no_6 = $_POST["vest_lining_no_6"];

$sql4 =	" SELECT * FROM admin_fabrics_vest WHERE fabricno = '$vest_fabric_no_1' ";
$query4 = mysql_db_query($dbname, $sql4) or die("Can't Query4");
$row4 = mysql_fetch_array($query4);
$fabrics_type = $row4["type"];
$fabrics_brand = $row4["brand"];

if ($row4["type"] != '') {

$sql01 = " SELECT `fabrictype_".$id_user."` FROM admin_fabrictype WHERE fabrictype_name = '$fabrics_type' AND fabrictype_product = 'Vest' ";
$query01 = mysql_db_query($dbname, $sql01) or die("Can't Query01");
$row01 = mysql_fetch_array($query01);
$vest_fabric_price_1 = $row01["0"];

} else if ($row4["brand"] != '') {
	
$sql02 = " SELECT `fabricbrand_".$id_user."` FROM admin_fabricbrand WHERE fabricbrand_name = '$fabrics_brand' AND fabricbrand_product = 'Vest' ";
$query02 = mysql_db_query($dbname, $sql02) or die("Can't Query02");
$row02 = mysql_fetch_array($query02);	
$vest_fabric_price_1 = $row02["0"];
	
}

$sql5 =	" SELECT * FROM admin_fabrics_vest WHERE fabricno = '$vest_fabric_no_2' ";
$query5 = mysql_db_query($dbname, $sql5) or die("Can't Query5");
$row5 = mysql_fetch_array($query5);
$fabrics_type = $row5["type"];
$fabrics_brand = $row5["brand"];

if ($row5["type"] != '') {

$sql03 = " SELECT `fabrictype_".$id_user."` FROM admin_fabrictype WHERE fabrictype_name = '$fabrics_type' AND fabrictype_product = 'Vest' ";
$query03 = mysql_db_query($dbname, $sql03) or die("Can't Query03");
$row03 = mysql_fetch_array($query03);
$vest_fabric_price_2 = $row03["0"];

} else if ($row5["brand"] != '') {
	
$sql04 = " SELECT `fabricbrand_".$id_user."` FROM admin_fabricbrand WHERE fabricbrand_name = '$fabrics_brand' AND fabricbrand_product = 'Vest' ";
$query04 = mysql_db_query($dbname, $sql04) or die("Can't Query04");
$row04 = mysql_fetch_array($query04);	
$vest_fabric_price_2 = $row04["0"];
	
}

$sql6 =	" SELECT * FROM admin_fabrics_vest WHERE fabricno = '$vest_fabric_no_3' ";
$query6 = mysql_db_query($dbname, $sql6) or die("Can't Query6");
$row6 = mysql_fetch_array($query6);
$fabrics_type = $row6["type"];
$fabrics_brand = $row6["brand"];

if ($row6["type"] != '') {

$sql05 = " SELECT `fabrictype_".$id_user."` FROM admin_fabrictype WHERE fabrictype_name = '$fabrics_type' AND fabrictype_product = 'Vest' ";
$query05 = mysql_db_query($dbname, $sql05) or die("Can't Query05");
$row05 = mysql_fetch_array($query05);
$vest_fabric_price_3 = $row05["0"];

} else if ($row6["brand"] != '') {
	
$sql06 = " SELECT `fabricbrand_".$id_user."` FROM admin_fabricbrand WHERE fabricbrand_name = '$fabrics_brand' AND fabricbrand_product = 'Vest' ";
$query06 = mysql_db_query($dbname, $sql06) or die("Can't Query06");
$row06 = mysql_fetch_array($query06);	
$vest_fabric_price_3 = $row06["0"];
	
}

$sql7 =	" SELECT * FROM admin_fabrics_vest WHERE fabricno = '$vest_fabric_no_4' ";
$query7 = mysql_db_query($dbname, $sql7) or die("Can't Query7");
$row7 = mysql_fetch_array($query7);
$fabrics_type = $row7["type"];
$fabrics_brand = $row7["brand"];

if ($row7["type"] != '') {

$sql07 = " SELECT `fabrictype_".$id_user."` FROM admin_fabrictype WHERE fabrictype_name = '$fabrics_type' AND fabrictype_product = 'Vest' ";
$query07 = mysql_db_query($dbname, $sql07) or die("Can't Query07");
$row07 = mysql_fetch_array($query07);
$vest_fabric_price_4 = $row07["0"];

} else if ($row7["brand"] != '') {
	
$sql08 = " SELECT `fabricbrand_".$id_user."` FROM admin_fabricbrand WHERE fabricbrand_name = '$fabrics_brand' AND fabricbrand_product = 'Vest' ";
$query08 = mysql_db_query($dbname, $sql08) or die("Can't Query08");
$row08 = mysql_fetch_array($query08);	
$vest_fabric_price_4 = $row08["0"];
	
}

$sql8 = " SELECT * FROM admin_fabrics_vest WHERE fabricno = '$vest_fabric_no_5' ";
$query8 = mysql_db_query($dbname, $sql8) or die("Can't Query8");
$row8 = mysql_fetch_array($query8);
$fabrics_type = $row8["type"];
$fabrics_brand = $row8["brand"];

if ($row8["type"] != '') {

$sql09 = " SELECT `fabrictype_".$id_user."` FROM admin_fabrictype WHERE fabrictype_name = '$fabrics_type' AND fabrictype_product = 'Vest' ";
$query09 = mysql_db_query($dbname, $sql09) or die("Can't Query09");
$row09 = mysql_fetch_array($query09);
$vest_fabric_price_5 = $row09["0"];

} else if ($row8["brand"] != '') {
	
$sql010 = " SELECT `fabricbrand_".$id_user."` FROM admin_fabricbrand WHERE fabricbrand_name = '$fabrics_brand' AND fabricbrand_product = 'Vest' ";
$query010 = mysql_db_query($dbname, $sql010) or die("Can't Query010");
$row010 = mysql_fetch_array($query010);	
$vest_fabric_price_5 = $row010["0"];
	
}

$sql9 = " SELECT * FROM admin_fabrics_vest WHERE fabricno = '$vest_fabric_no_6' ";
$query9 = mysql_db_query($dbname, $sql9) or die("Can't Query9");
$row9 = mysql_fetch_array($query9);
$fabrics_type = $row9["type"];
$fabrics_brand = $row9["brand"];

if ($row9["type"] != '') {

$sql011 = " SELECT `fabrictype_".$id_user."` FROM admin_fabrictype WHERE fabrictype_name = '$fabrics_type' AND fabrictype_product = 'Vest' ";
$query011 = mysql_db_query($dbname, $sql011) or die("Can't Query011");
$row011 = mysql_fetch_array($query011);
$vest_fabric_price_6 = $row011["0"];

} else if ($row9["brand"] != '') {
	
$sql012 = " SELECT `fabricbrand_".$id_user."` FROM admin_fabricbrand WHERE fabricbrand_name = '$fabrics_brand' AND fabricbrand_product = 'Vest' ";
$query012 = mysql_db_query($dbname, $sql012) or die("Can't Query012");
$row012 = mysql_fetch_array($query012);	
$vest_fabric_price_6 = $row012["0"];
	
}

/*OTHER PRICING PARAMETERS*/
$vest_vest_measurement_chest = $_POST["vest_vest_measurement_chest"];
$vest_vest_measurement_waist_only = $_POST["vest_vest_measurement_waist_only"];
$vest_vest_measurement_hips = $_POST["vest_vest_measurement_hips"];

if (($vest_vest_measurement_chest >= '50' && $vest_vest_measurement_chest <= '52') || ($vest_vest_measurement_waist_only >= '50' && $vest_vest_measurement_waist_only <= '52') || ($vest_vest_measurement_hips >= '50' && $vest_vest_measurement_hips <= '52')) {
	
	$price_size_1 = $vest_fabric_price_1 * 20;
	$price_size_2 = $price_size_1 / 100;
	$price_size_3 = $price_size_2 + $vest_fabric_price_1;
	
	$price_size_4 = $vest_fabric_price_2 * 20;
	$price_size_5 = $price_size_4 / 100;
	$price_size_6 = $price_size_5 + $vest_fabric_price_2;
	
	$price_size_7 = $vest_fabric_price_3 * 20;
	$price_size_8 = $price_size_7 / 100;
	$price_size_9 = $price_size_8 + $vest_fabric_price_3;
	
	$price_size_10 = $vest_fabric_price_4 * 20;
	$price_size_11 = $price_size_10 / 100;
	$price_size_12 = $price_size_11 + $vest_fabric_price_4;
	
	$price_size_13 = $vest_fabric_price_5 * 20;
	$price_size_14 = $price_size_13 / 100;
	$price_size_15 = $price_size_14 + $vest_fabric_price_5;
	
	$price_size_16 = $vest_fabric_price_6 * 20;
	$price_size_17 = $price_size_16 / 100;
	$price_size_18 = $price_size_17 + $vest_fabric_price_6;
	
} else if (($vest_vest_measurement_chest >= '52.5' && $vest_vest_measurement_chest <= '56') || ($vest_vest_measurement_waist_only >= '52.5' && $vest_vest_measurement_waist_only <= '56') || ($vest_vest_measurement_hips >= '52.5' && $vest_vest_measurement_hips <= '56')) {
	
	$price_size_1 = $vest_fabric_price_1 * 30;
	$price_size_2 = $price_size_1 / 100;
	$price_size_3 = $price_size_2 + $vest_fabric_price_1;
	
	$price_size_4 = $vest_fabric_price_2 * 30;
	$price_size_5 = $price_size_4 / 100;
	$price_size_6 = $price_size_5 + $vest_fabric_price_2;
	
	$price_size_7 = $vest_fabric_price_3 * 30;
	$price_size_8 = $price_size_7 / 100;
	$price_size_9 = $price_size_8 + $vest_fabric_price_3;
	
	$price_size_10 = $vest_fabric_price_4 * 30;
	$price_size_11 = $price_size_10 / 100;
	$price_size_12 = $price_size_11 + $vest_fabric_price_4;
	
	$price_size_13 = $vest_fabric_price_5 * 30;
	$price_size_14 = $price_size_13 / 100;
	$price_size_15 = $price_size_14 + $vest_fabric_price_5;
	
	$price_size_16 = $vest_fabric_price_6 * 30;
	$price_size_17 = $price_size_16 / 100;
	$price_size_18 = $price_size_17 + $vest_fabric_price_6;
	
} else if (($vest_vest_measurement_chest >= '56.5' && $vest_vest_measurement_chest <= '60') || ($vest_vest_measurement_waist_only >= '56.5' && $vest_vest_measurement_waist_only <= '60') || ($vest_vest_measurement_hips >= '56.5' && $vest_vest_measurement_hips <= '60')) {
	
	$price_size_1 = $vest_fabric_price_1 * 40;
	$price_size_2 = $price_size_1 / 100;
	$price_size_3 = $price_size_2 + $vest_fabric_price_1;
	
	$price_size_4 = $vest_fabric_price_2 * 40;
	$price_size_5 = $price_size_4 / 100;
	$price_size_6 = $price_size_5 + $vest_fabric_price_2;
	
	$price_size_7 = $vest_fabric_price_3 * 40;
	$price_size_8 = $price_size_7 / 100;
	$price_size_9 = $price_size_8 + $vest_fabric_price_3;
	
	$price_size_10 = $vest_fabric_price_4 * 40;
	$price_size_11 = $price_size_10 / 100;
	$price_size_12 = $price_size_11 + $vest_fabric_price_4;
	
	$price_size_13 = $vest_fabric_price_5 * 40;
	$price_size_14 = $price_size_13 / 100;
	$price_size_15 = $price_size_14 + $vest_fabric_price_5;
	
	$price_size_16 = $vest_fabric_price_6 * 40;
	$price_size_17 = $price_size_16 / 100;
	$price_size_18 = $price_size_17 + $vest_fabric_price_6;
	
} else if (($vest_vest_measurement_chest >= '60.5' && $vest_vest_measurement_chest <= '64') || ($vest_vest_measurement_waist_only >= '60.5' && $vest_vest_measurement_waist_only <= '64') || ($vest_vest_measurement_hips >= '60.5' && $vest_vest_measurement_hips <= '64')) {
	
	$price_size_1 = $vest_fabric_price_1 * 50;
	$price_size_2 = $price_size_1 / 100;
	$price_size_3 = $price_size_2 + $vest_fabric_price_1;
	
	$price_size_4 = $vest_fabric_price_2 * 50;
	$price_size_5 = $price_size_4 / 100;
	$price_size_6 = $price_size_5 + $vest_fabric_price_2;
	
	$price_size_7 = $vest_fabric_price_3 * 50;
	$price_size_8 = $price_size_7 / 100;
	$price_size_9 = $price_size_8 + $vest_fabric_price_3;
	
	$price_size_10 = $vest_fabric_price_4 * 50;
	$price_size_11 = $price_size_10 / 100;
	$price_size_12 = $price_size_11 + $vest_fabric_price_4;
	
	$price_size_13 = $vest_fabric_price_5 * 50;
	$price_size_14 = $price_size_13 / 100;
	$price_size_15 = $price_size_14 + $vest_fabric_price_5;
	
	$price_size_16 = $vest_fabric_price_6 * 50;
	$price_size_17 = $price_size_16 / 100;
	$price_size_18 = $price_size_17 + $vest_fabric_price_6;
	
} else if (($vest_vest_measurement_chest >= '64.5' && $vest_vest_measurement_chest <= '68') || ($vest_vest_measurement_waist_only >= '64.5' && $vest_vest_measurement_waist_only <= '68') || ($vest_vest_measurement_hips >= '64.5' && $vest_vest_measurement_hips <= '68')) {
	
	$price_size_1 = $vest_fabric_price_1 * 60;
	$price_size_2 = $price_size_1 / 100;
	$price_size_3 = $price_size_2 + $vest_fabric_price_1;
	
	$price_size_4 = $vest_fabric_price_2 * 60;
	$price_size_5 = $price_size_4 / 100;
	$price_size_6 = $price_size_5 + $vest_fabric_price_2;
	
	$price_size_7 = $vest_fabric_price_3 * 60;
	$price_size_8 = $price_size_7 / 100;
	$price_size_9 = $price_size_8 + $vest_fabric_price_3;
	
	$price_size_10 = $vest_fabric_price_4 * 60;
	$price_size_11 = $price_size_10 / 100;
	$price_size_12 = $price_size_11 + $vest_fabric_price_4;
	
	$price_size_13 = $vest_fabric_price_5 * 60;
	$price_size_14 = $price_size_13 / 100;
	$price_size_15 = $price_size_14 + $vest_fabric_price_5;
	
	$price_size_16 = $vest_fabric_price_6 * 60;
	$price_size_17 = $price_size_16 / 100;
	$price_size_18 = $price_size_17 + $vest_fabric_price_6;
	
}  else {
	
	$price_size_3 = $vest_fabric_price_1;
	$price_size_6 = $vest_fabric_price_2;
	$price_size_9 = $vest_fabric_price_3;
	$price_size_12 = $vest_fabric_price_4;
	$price_size_15 = $vest_fabric_price_5;
	$price_size_18 = $vest_fabric_price_6;
	
}

/*BUTTON*/
$vest_vest_button_number = $_POST["vest_vest_button_number"];

$sql10 = " SELECT price FROM admin_buttons_suits WHERE buttonno = '$vest_vest_button_number' ";
$query10 = mysql_db_query($dbname, $sql10) or die("Can't Query10");
$row10 = mysql_fetch_array($query10);
$vest_button_price = $row10["price"];

$vest_price_1 = $price_size_3 + $vest_button_price;
$vest_price_2 = $price_size_6 + $vest_button_price;
$vest_price_3 = $price_size_9 + $vest_button_price;
$vest_price_4 = $price_size_12 + $vest_button_price;
$vest_price_5 = $price_size_15 + $vest_button_price;
$vest_price_6 = $price_size_18 + $vest_button_price;

/*MY PRICES*/

$sqlmy4 = " SELECT * FROM admin_fabrics_vest WHERE fabricno = '$vest_fabric_no_1' ";
$querymy4 = mysql_db_query($dbname, $sqlmy4) or die("Can't Querymy4");
$rowmy4 = mysql_fetch_array($querymy4);
$fabrics_my_type = $rowmy4["type"];
$fabrics_my_brand = $rowmy4["brand"];

if ($rowmy4["type"] != '') {

$sqlmy01 = " SELECT `fabrictypereseller_".$id_user."` FROM admin_fabrictype WHERE fabrictype_name = '$fabrics_my_type' AND fabrictype_product = 'Vest' ";
$querymy01 = mysql_db_query($dbname, $sqlmy01) or die("Can't Querymy01");
$rowmy01 = mysql_fetch_array($querymy01);
$vest_fabric_my_price_1 = $rowmy01["0"];

} else if ($rowmy4["brand"] != '') {
	
$sqlmy02 = " SELECT `fabricbrand_".$id_user."` FROM admin_fabricbrand WHERE fabricbrand_name = '$fabrics_my_brand' AND fabricbrand_product = 'Vest' ";
$querymy02 = mysql_db_query($dbname, $sqlmy02) or die("Can't Querymy02");
$rowmy02 = mysql_fetch_array($querymy02);	
$vest_fabric_my_price_1 = $rowmy02["0"];
	
}

$sqlmy5 = " SELECT * FROM admin_fabrics_vest WHERE fabricno = '$vest_fabric_no_2' ";
$querymy5 = mysql_db_query($dbname, $sqlmy5) or die("Can't Querymy5");
$rowmy5 = mysql_fetch_array($querymy5);
$fabrics_my_type = $rowmy5["type"];
$fabrics_my_brand = $rowmy5["brand"];

if ($rowmy5["type"] != '') {

$sqlmy03 = " SELECT `fabrictypereseller_".$id_user."` FROM admin_fabrictype WHERE fabrictype_name = '$fabrics_my_type' AND fabrictype_product = 'Vest' ";
$querymy03 = mysql_db_query($dbname, $sqlmy03) or die("Can't Querymy03");
$rowmy03 = mysql_fetch_array($querymy03);
$vest_fabric_my_price_2 = $rowmy03["0"];

} else if ($rowmy5["brand"] != '') {
	
$sqlmy04 = " SELECT `fabricbrand_".$id_user."` FROM admin_fabricbrand WHERE fabricbrand_name = '$fabrics_my_brand' AND fabricbrand_product = 'Vest' ";
$querymy04 = mysql_db_query($dbname, $sqlmy04) or die("Can't Querymy04");
$rowmy04 = mysql_fetch_array($querymy04);	
$vest_fabric_my_price_2 = $rowmy04["0"];
	
}

$sqlmy6 = " SELECT * FROM admin_fabrics_vest WHERE fabricno = '$vest_fabric_no_3' ";
$querymy6 = mysql_db_query($dbname, $sqlmy6) or die("Can't Querymy6");
$rowmy6 = mysql_fetch_array($querymy6);
$fabrics_my_type = $rowmy6["type"];
$fabrics_my_brand = $rowmy6["brand"];

if ($rowmy6["type"] != '') {

$sqlmy05 = " SELECT `fabrictypereseller_".$id_user."` FROM admin_fabrictype WHERE fabrictype_name = '$fabrics_my_type' AND fabrictype_product = 'Vest' ";
$querymy05 = mysql_db_query($dbname, $sqlmy05) or die("Can't Querymy05");
$rowmy05 = mysql_fetch_array($querymy05);
$vest_fabric_my_price_3 = $rowmy05["0"];

} else if ($rowmy6["brand"] != '') {
	
$sqlmy06 = " SELECT `fabricbrand_".$id_user."` FROM admin_fabricbrand WHERE fabricbrand_name = '$fabrics_my_brand' AND fabricbrand_product = 'Vest' ";
$querymy06 = mysql_db_query($dbname, $sqlmy06) or die("Can't Querymy06");
$rowmy06 = mysql_fetch_array($querymy06);	
$vest_fabric_my_price_3 = $rowmy06["0"];
	
}

$sqlmy7 = " SELECT * FROM admin_fabrics_vest WHERE fabricno = '$vest_fabric_no_4' ";
$querymy7 = mysql_db_query($dbname, $sqlmy7) or die("Can't Querymy7");
$rowmy7 = mysql_fetch_array($querymy7);
$fabrics_my_type = $rowmy7["type"];
$fabrics_my_brand = $rowmy7["brand"];

if ($rowmy7["type"] != '') {

$sqlmy07 = " SELECT `fabrictypereseller_".$id_user."` FROM admin_fabrictype WHERE fabrictype_name = '$fabrics_my_type' AND fabrictype_product = 'Vest' ";
$querymy07 = mysql_db_query($dbname, $sqlmy07) or die("Can't Querymy07");
$rowmy07 = mysql_fetch_array($querymy07);
$vest_fabric_my_price_4 = $rowmy07["0"];

} else if ($rowmy7["brand"] != '') {
	
$sqlmy08 = " SELECT `fabricbrand_".$id_user."` FROM admin_fabricbrand WHERE fabricbrand_name = '$fabrics_my_brand' AND fabricbrand_product = 'Vest' ";
$querymy08 = mysql_db_query($dbname, $sqlmy08) or die("Can't Querymy08");
$rowmy08 = mysql_fetch_array($querymy08);	
$vest_fabric_my_price_4 = $rowmy08["0"];
	
}

$sqlmy8 = " SELECT * FROM admin_fabrics_vest WHERE fabricno = '$vest_fabric_no_5' ";
$querymy8 = mysql_db_query($dbname, $sqlmy8) or die("Can't Querymy8");
$rowmy8 = mysql_fetch_array($querymy8);
$fabrics_my_type = $rowmy8["type"];
$fabrics_my_brand = $rowmy8["brand"];

if ($rowmy8["type"] != '') {

$sqlmy09 = " SELECT `fabrictypereseller_".$id_user."` FROM admin_fabrictype WHERE fabrictype_name = '$fabrics_my_type' AND fabrictype_product = 'Vest' ";
$querymy09 = mysql_db_query($dbname, $sqlmy09) or die("Can't Querymy09");
$rowmy09 = mysql_fetch_array($querymy09);
$vest_fabric_my_price_5 = $rowmy09["0"];

} else if ($rowmy8["brand"] != '') {
	
$sqlmy010 = " SELECT `fabricbrand_".$id_user."` FROM admin_fabricbrand WHERE fabricbrand_name = '$fabrics_my_brand' AND fabricbrand_product = 'Vest' ";
$querymy010 = mysql_db_query($dbname, $sqlmy010) or die("Can't Querymy010");
$rowmy010 = mysql_fetch_array($querymy010);	
$vest_fabric_my_price_5 = $rowmy010["0"];
	
}

$sqlmy9 = " SELECT * FROM admin_fabrics_vest WHERE fabricno = '$vest_fabric_no_6' ";
$querymy9 = mysql_db_query($dbname, $sqlmy9) or die("Can't Querymy9");
$rowmy9 = mysql_fetch_array($querymy9);
$fabrics_my_type = $rowmy9["type"];
$fabrics_my_brand = $rowmy9["brand"];

if ($rowmy9["type"] != '') {

$sqlmy011 = " SELECT `fabrictypereseller_".$id_user."` FROM admin_fabrictype WHERE fabrictype_name = '$fabrics_my_type' AND fabrictype_product = 'Vest' ";
$querymy011 = mysql_db_query($dbname, $sqlmy011) or die("Can't Querymy011");
$rowmy011 = mysql_fetch_array($querymy011);
$vest_fabric_my_price_6 = $rowmy011["0"];

} else if ($rowmy9["brand"] != '') {
	
$sqlmy012 = " SELECT `fabricbrand_".$id_user."` FROM admin_fabricbrand WHERE fabricbrand_name = '$fabrics_my_brand' AND fabricbrand_product = 'Vest' ";
$querymy012 = mysql_db_query($dbname, $sqlmy012) or die("Can't Querymy012");
$rowmy012 = mysql_fetch_array($querymy012);	
$vest_fabric_my_price_6 = $rowmy012["0"];
	
}

/*OTHER PRICING PARAMETERS*/
$vest_vest_measurement_chest = $_POST["vest_vest_measurement_chest"];
$vest_vest_measurement_waist_only = $_POST["vest_vest_measurement_waist_only"];
$vest_vest_measurement_hips = $_POST["vest_vest_measurement_hips"];

if (($vest_vest_measurement_chest >= '50' && $vest_vest_measurement_chest <= '52') || ($vest_vest_measurement_waist_only >= '50' && $vest_vest_measurement_waist_only <= '52') || ($vest_vest_measurement_hips >= '50' && $vest_vest_measurement_hips <= '52')) {
	
	$price_my_size_1 = $vest_fabric_my_price_1 * 20;
	$price_my_size_2 = $price_my_size_1 / 100;
	$price_my_size_3 = $price_my_size_2 + $vest_fabric_my_price_1;
	
	$price_my_size_4 = $vest_fabric_my_price_2 * 20;
	$price_my_size_5 = $price_my_size_4 / 100;
	$price_my_size_6 = $price_my_size_5 + $vest_fabric_my_price_2;
	
	$price_my_size_7 = $vest_fabric_my_price_3 * 20;
	$price_my_size_8 = $price_my_size_7 / 100;
	$price_my_size_9 = $price_my_size_8 + $vest_fabric_my_price_3;
	
	$price_my_size_10 = $vest_fabric_my_price_4 * 20;
	$price_my_size_11 = $price_my_size_10 / 100;
	$price_my_size_12 = $price_my_size_11 + $vest_fabric_my_price_4;
	
	$price_my_size_13 = $vest_fabric_my_price_5 * 20;
	$price_my_size_14 = $price_my_size_13 / 100;
	$price_my_size_15 = $price_my_size_14 + $vest_fabric_my_price_5;
	
	$price_my_size_16 = $vest_fabric_my_price_6 * 20;
	$price_my_size_17 = $price_my_size_16 / 100;
	$price_my_size_18 = $price_my_size_17 + $vest_fabric_my_price_6;
	
} else if (($vest_vest_measurement_chest >= '52.5' && $vest_vest_measurement_chest <= '56') || ($vest_vest_measurement_waist_only >= '52.5' && $vest_vest_measurement_waist_only <= '56') || ($vest_vest_measurement_hips >= '52.5' && $vest_vest_measurement_hips <= '56')) {
	
	$price_my_size_1 = $vest_fabric_my_price_1 * 30;
	$price_my_size_2 = $price_my_size_1 / 100;
	$price_my_size_3 = $price_my_size_2 + $vest_fabric_my_price_1;
	
	$price_my_size_4 = $vest_fabric_my_price_2 * 30;
	$price_my_size_5 = $price_my_size_4 / 100;
	$price_my_size_6 = $price_my_size_5 + $vest_fabric_my_price_2;
	
	$price_my_size_7 = $vest_fabric_my_price_3 * 30;
	$price_my_size_8 = $price_my_size_7 / 100;
	$price_my_size_9 = $price_my_size_8 + $vest_fabric_my_price_3;
	
	$price_my_size_10 = $vest_fabric_my_price_4 * 30;
	$price_my_size_11 = $price_my_size_10 / 100;
	$price_my_size_12 = $price_my_size_11 + $vest_fabric_my_price_4;
	
	$price_my_size_13 = $vest_fabric_my_price_5 * 30;
	$price_my_size_14 = $price_my_size_13 / 100;
	$price_my_size_15 = $price_my_size_14 + $vest_fabric_my_price_5;
	
	$price_my_size_16 = $vest_fabric_my_price_6 * 30;
	$price_my_size_17 = $price_my_size_16 / 100;
	$price_my_size_18 = $price_my_size_17 + $vest_fabric_my_price_6;
	
} else if (($vest_vest_measurement_chest >= '56.5' && $vest_vest_measurement_chest <= '60') || ($vest_vest_measurement_waist_only >= '56.5' && $vest_vest_measurement_waist_only <= '60') || ($vest_vest_measurement_hips >= '56.5' && $vest_vest_measurement_hips <= '60')) {
	
	$price_my_size_1 = $vest_fabric_my_price_1 * 40;
	$price_my_size_2 = $price_my_size_1 / 100;
	$price_my_size_3 = $price_my_size_2 + $vest_fabric_my_price_1;
	
	$price_my_size_4 = $vest_fabric_my_price_2 * 40;
	$price_my_size_5 = $price_my_size_4 / 100;
	$price_my_size_6 = $price_my_size_5 + $vest_fabric_my_price_2;
	
	$price_my_size_7 = $vest_fabric_my_price_3 * 40;
	$price_my_size_8 = $price_my_size_7 / 100;
	$price_my_size_9 = $price_my_size_8 + $vest_fabric_my_price_3;
	
	$price_my_size_10 = $vest_fabric_my_price_4 * 40;
	$price_my_size_11 = $price_my_size_10 / 100;
	$price_my_size_12 = $price_my_size_11 + $vest_fabric_my_price_4;
	
	$price_my_size_13 = $vest_fabric_my_price_5 * 40;
	$price_my_size_14 = $price_my_size_13 / 100;
	$price_my_size_15 = $price_my_size_14 + $vest_fabric_my_price_5;
	
	$price_my_size_16 = $vest_fabric_my_price_6 * 40;
	$price_my_size_17 = $price_my_size_16 / 100;
	$price_my_size_18 = $price_my_size_17 + $vest_fabric_my_price_6;
	
} else if (($vest_vest_measurement_chest >= '60.5' && $vest_vest_measurement_chest <= '64') || ($vest_vest_measurement_waist_only >= '60.5' && $vest_vest_measurement_waist_only <= '64') || ($vest_vest_measurement_hips >= '60.5' && $vest_vest_measurement_hips <= '64')) {
	
	$price_my_size_1 = $vest_fabric_my_price_1 * 50;
	$price_my_size_2 = $price_my_size_1 / 100;
	$price_my_size_3 = $price_my_size_2 + $vest_fabric_my_price_1;
	
	$price_my_size_4 = $vest_fabric_my_price_2 * 50;
	$price_my_size_5 = $price_my_size_4 / 100;
	$price_my_size_6 = $price_my_size_5 + $vest_fabric_my_price_2;
	
	$price_my_size_7 = $vest_fabric_my_price_3 * 50;
	$price_my_size_8 = $price_my_size_7 / 100;
	$price_my_size_9 = $price_my_size_8 + $vest_fabric_my_price_3;
	
	$price_my_size_10 = $vest_fabric_my_price_4 * 50;
	$price_my_size_11 = $price_my_size_10 / 100;
	$price_my_size_12 = $price_my_size_11 + $vest_fabric_my_price_4;
	
	$price_my_size_13 = $vest_fabric_my_price_5 * 50;
	$price_my_size_14 = $price_my_size_13 / 100;
	$price_my_size_15 = $price_my_size_14 + $vest_fabric_my_price_5;
	
	$price_my_size_16 = $vest_fabric_my_price_6 * 50;
	$price_my_size_17 = $price_my_size_16 / 100;
	$price_my_size_18 = $price_my_size_17 + $vest_fabric_my_price_6;
	
} else if (($vest_vest_measurement_chest >= '64.5' && $vest_vest_measurement_chest <= '68') || ($vest_vest_measurement_waist_only >= '64.5' && $vest_vest_measurement_waist_only <= '68') || ($vest_vest_measurement_hips >= '64.5' && $vest_vest_measurement_hips <= '68')) {
	
	$price_my_size_1 = $vest_fabric_my_price_1 * 60;
	$price_my_size_2 = $price_my_size_1 / 100;
	$price_my_size_3 = $price_my_size_2 + $vest_fabric_my_price_1;
	
	$price_my_size_4 = $vest_fabric_my_price_2 * 60;
	$price_my_size_5 = $price_my_size_4 / 100;
	$price_my_size_6 = $price_my_size_5 + $vest_fabric_my_price_2;
	
	$price_my_size_7 = $vest_fabric_my_price_3 * 60;
	$price_my_size_8 = $price_my_size_7 / 100;
	$price_my_size_9 = $price_my_size_8 + $vest_fabric_my_price_3;
	
	$price_my_size_10 = $vest_fabric_my_price_4 * 60;
	$price_my_size_11 = $price_my_size_10 / 100;
	$price_my_size_12 = $price_my_size_11 + $vest_fabric_my_price_4;
	
	$price_my_size_13 = $vest_fabric_my_price_5 * 60;
	$price_my_size_14 = $price_my_size_13 / 100;
	$price_my_size_15 = $price_my_size_14 + $vest_fabric_my_price_5;
	
	$price_my_size_16 = $vest_fabric_my_price_6 * 60;
	$price_my_size_17 = $price_my_size_16 / 100;
	$price_my_size_18 = $price_my_size_17 + $vest_fabric_my_price_6;
	
}  else {
	
	$price_my_size_3 = $vest_fabric_my_price_1;
	$price_my_size_6 = $vest_fabric_my_price_2;
	$price_my_size_9 = $vest_fabric_my_price_3;
	$price_my_size_12 = $vest_fabric_my_price_4;
	$price_my_size_15 = $vest_fabric_my_price_5;
	$price_my_size_18 = $vest_fabric_my_price_6;
	
}

/*BUTTON*/
$vest_vest_button_number = $_POST["vest_vest_button_number"];

$sql10 = " SELECT price FROM admin_buttons_suits WHERE buttonno = '$vest_vest_button_number' ";
$query10 = mysql_db_query($dbname, $sql10) or die("Can't Query10");
$row10 = mysql_fetch_array($query10);
$vest_button_my_price = $row10["price"];

$vest_my_price_1 = $price_my_size_3 + $vest_button_my_price;
$vest_my_price_2 = $price_my_size_6 + $vest_button_my_price;
$vest_my_price_3 = $price_my_size_9 + $vest_button_my_price;
$vest_my_price_4 = $price_my_size_12 + $vest_button_my_price;
$vest_my_price_5 = $price_my_size_15 + $vest_button_my_price;
$vest_my_price_6 = $price_my_size_18 + $vest_button_my_price;

/*CUSTOMER*/
$vest_customer_name = $_POST["vest_customer_name"];
$vest_order_no = $_POST["vest_order_no"];
$vest_order_date = date("m/d/Y");
$vest_delivery_date = $_POST["vest_delivery_date"];

/*CUSTOMIZE*/
$vest_vest_button = $_POST["vest_vest_button"];
$vest_vest_lapel_style = $_POST["vest_vest_lapel_style"];
$vest_vest_chest_pocket = $_POST["vest_vest_chest_pocket"];
$vest_vest_bottom_pocket = $_POST["vest_vest_bottom_pocket"];
$vest_vest_bottom_of_vest = $_POST["vest_vest_bottom_of_vest"];
$vest_vest_belt_at_back = $_POST["vest_vest_belt_at_back"];
$vest_vest_lining_option = $_POST["vest_vest_lining_option"];
$vest_vest_thread_on_button = $_POST["vest_vest_thread_on_button"];
$vest_vest_button_hole_color = $_POST["vest_vest_button_hole_color"];

/*MEASUREMENTS*/
$vest_vest_measurement_sex = $_POST["vest_vest_measurement_sex"];
$vest_vest_measurement_fit = $_POST["vest_vest_measurement_fit"];
$vest_vest_measurement = $_POST["vest_vest_measurement"];
$vest_vest_measurement_vest_length = $_POST["vest_vest_measurement_vest_length"];
$vest_vest_measurement_back_lenght = $_POST["vest_vest_measurement_back_lenght"];
$vest_vest_measurement_neck = $_POST["vest_vest_measurement_neck"];
$vest_vest_measurement_ptp_front = $_POST["vest_vest_measurement_ptp_front"];
$vest_vest_measurement_ptp_back = $_POST["vest_vest_measurement_ptp_back"];
$vest_vest_measurement_arm_hole = $_POST["vest_vest_measurement_arm_hole"];
$vest_measurement_jacket_shoulder = $_POST["vest_measurement_jacket_shoulder"];
$vest_measurement_jacket_waist = $_POST["vest_measurement_jacket_waist"];
$vest_measurement_jacket_chest = $_POST["vest_measurement_jacket_chest"];
$vest_body_front = $_POST["vest_body_front"];
$vest_body_left = $_POST["vest_body_left"];
$vest_body_right = $_POST["vest_body_right"];
$vest_body_back = $_POST["vest_body_back"];
$vest_remark = $_POST["vest_remark"];

/*ECT*/
$vest_date = date("m/d/Y");
$vest_time = date("H:i:s");
$vest_ip = $_POST['ip'];
$vest_status = T;

/*FABRIC 1*/
if ($vest_fabric_no_1 != "" && $vest_lining_no_1 != "") {

$sql11 = " SELECT MAX(id) FROM customize_order ";
$query11 = mysql_db_query($dbname, $sql11) or die("Can't Query11");
$row11 = mysql_fetch_array($query11);
$id_order = $row11[0] + 1 ;

$sql12 = " SELECT MAX(product_id) FROM customize_order";
$query12 = mysql_db_query($dbname, $sql12) or die("Can't Query12");
$row12 = mysql_fetch_array($query12);
$product_id = $row12[0] + 1 ;

$sql13 = " SELECT MAX(id) FROM customize_vest_design ";
$query13 = mysql_db_query($dbname, $sql13) or die("Can't Query13");
$row13 = mysql_fetch_array($query13);
$id_vest = $row13[0] + 1 ;

$sql14 = " INSERT INTO customize_order (id, order_id, product_id, order_reseller, order_order_no, order_name_customize, order_my_price, order_price, order_product, order_fabric_no, order_date, order_time, order_ip, order_status) VALUES ('$id_order', '$order_id', '$product_id', '$company_user', '$vest_order_no', '$vest_customer_name', '$vest_my_price_1', '$vest_price_1', '$order_product', '$vest_fabric_no_1', '$vest_date', '$vest_time', '$vest_ip', '$vest_status') ";
$query14 = mysql_query($sql14) or die("Can't Query14");

$sql15 = " INSERT INTO customize_vest_design (id, order_id, product_id, vest_customer_name, vest_order_no, vest_order_date, vest_delivery_date, vest_fabric_no, vest_lining_no, vest_vest_button, vest_vest_lapel_style, vest_vest_chest_pocket, vest_vest_bottom_pocket, vest_vest_bottom_of_vest, vest_vest_belt_at_back, vest_vest_lining_option, vest_vest_button_number, vest_vest_thread_on_button, vest_vest_button_hole_color, vest_date, vest_time, vest_ip, vest_status) VALUES ('$id_vest', '$order_id', '$product_id', '$vest_customer_name', '$vest_order_no', '$vest_order_date', '$vest_delivery_date', '$vest_fabric_no_1', '$vest_lining_no_1', '$vest_vest_button', '$vest_vest_lapel_style', '$vest_vest_chest_pocket', '$vest_vest_bottom_pocket', '$vest_vest_bottom_of_vest', '$vest_vest_belt_at_back', '$vest_vest_lining_option', '$vest_vest_button_number', '$vest_vest_thread_on_button', '$vest_vest_button_hole_color', '$vest_date', '$vest_time', '$vest_ip', '$vest_status') ";
$query15 = mysql_query($sql15) or die("Can't Query15");

$sql16 = " INSERT INTO customize_vest_measurements (id, order_id, product_id, vest_vest_measurement_sex, vest_vest_measurement_fit, vest_vest_measurement, vest_vest_measurement_vest_length, vest_vest_measurement_back_lenght, vest_vest_measurement_chest, vest_vest_measurement_waist_only, vest_vest_measurement_hips, vest_vest_measurement_neck, vest_vest_measurement_ptp_front, vest_vest_measurement_ptp_back, vest_vest_measurement_arm_hole, vest_measurement_jacket_shoulder, vest_measurement_jacket_waist, vest_measurement_jacket_chest, vest_remark, vest_date, vest_time, vest_ip, vest_status) VALUES ('$id_vest', '$order_id', '$product_id', '$vest_vest_measurement_sex', '$vest_vest_measurement_fit', '$vest_vest_measurement', '$vest_vest_measurement_vest_length', '$vest_vest_measurement_back_lenght', '$vest_vest_measurement_chest', '$vest_vest_measurement_waist_only', '$vest_vest_measurement_hips', '$vest_vest_measurement_neck', '$vest_vest_measurement_ptp_front', '$vest_vest_measurement_ptp_back', '$vest_vest_measurement_arm_hole', '$vest_measurement_jacket_shoulder', '$vest_measurement_jacket_waist', '$vest_measurement_jacket_chest', '$vest_remark', '$vest_date', '$vest_time', '$vest_ip', '$vest_status') ";
$query16 = mysql_query($sql16) or die("Can't Query16");

$path = "../../images/body/vest/front/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['vest_body_front']['name'];
	$tmp = $_FILES['vest_body_front']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$vest_body_front_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$vest_body_front_pic)){
				
				$sql17 = " UPDATE customize_vest_measurements SET vest_body_front = '".$vest_body_front_pic."', vest_date = '".$vest_date."', vest_time = '".$vest_time."', vest_ip = '".$vest_ip."', vest_status = '".$vest_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query17 = mysql_db_query($dbname, $sql17) or die("Can't Query17");
			}
    
	} else {
				$sql17 = " UPDATE customize_vest_measurements SET vest_date = '".$vest_date."', vest_time = '".$vest_time."', vest_ip = '".$vest_ip."', vest_status = '".$vest_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query17 = mysql_db_query($dbname, $sql17) or die("Can't Query17");
			}
	}
	
$path = "../../images/body/vest/left/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['vest_body_left']['name'];
	$tmp = $_FILES['vest_body_left']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$vest_body_left_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$vest_body_left_pic)){
				
				$sql18 = " UPDATE customize_vest_measurements SET vest_body_left = '".$vest_body_left_pic."', vest_date = '".$vest_date."', vest_time = '".$vest_time."', vest_ip = '".$vest_ip."', vest_status = '".$vest_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query18 = mysql_db_query($dbname, $sql18) or die("Can't Query18");
			}
    
	} else {
				$sql18 = " UPDATE customize_vest_measurements SET vest_date = '".$vest_date."', vest_time = '".$vest_time."', vest_ip = '".$vest_ip."', vest_status = '".$vest_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query18 = mysql_db_query($dbname, $sql18) or die("Can't Query18");
			}
	}
	
$path = "../../images/body/vest/right/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['vest_body_right']['name'];
	$tmp = $_FILES['vest_body_right']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$vest_body_right_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$vest_body_right_pic)){
				
				$sql19 = " UPDATE customize_vest_measurements SET vest_body_right = '".$vest_body_right_pic."', vest_date = '".$vest_date."', vest_time = '".$vest_time."', vest_ip = '".$vest_ip."', vest_status = '".$vest_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query19 = mysql_db_query($dbname, $sql19) or die("Can't Query19");
			}
    
	} else {
				$sql19 = " UPDATE customize_vest_measurements SET vest_date = '".$vest_date."', vest_time = '".$vest_time."', vest_ip = '".$vest_ip."', vest_status = '".$vest_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query19 = mysql_db_query($dbname, $sql19) or die("Can't Query19");
			}
	}
	
$path = "../../images/body/vest/back/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['vest_body_back']['name'];
	$tmp = $_FILES['vest_body_back']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$vest_body_back_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$vest_body_back_pic)){
				
				$sql20 = " UPDATE customize_vest_measurements SET vest_body_back = '".$vest_body_back_pic."', vest_date = '".$vest_date."', vest_time = '".$vest_time."', vest_ip = '".$vest_ip."', vest_status = '".$vest_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query20 = mysql_db_query($dbname, $sql20) or die("Can't Query20");
			}
    
	} else {
				$sql20 = " UPDATE customize_vest_measurements SET vest_date = '".$vest_date."', vest_time = '".$vest_time."', vest_ip = '".$vest_ip."', vest_status = '".$vest_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query20 = mysql_db_query($dbname, $sql20) or die("Can't Query20");
			}
	}

} else if ($vest_fabric_no_1 == "" || $vest_lining_no_1 == "") { }

/*FABRIC 2*/
if ($vest_fabric_no_2 != "" && $vest_lining_no_2 != "") {

$sql11 = " SELECT MAX(id) FROM customize_order ";
$query11 = mysql_db_query($dbname, $sql11) or die("Can't Query11");
$row11 = mysql_fetch_array($query11);
$id_order = $row11[0] + 1 ;

$sql12 = " SELECT MAX(product_id) FROM customize_order";
$query12 = mysql_db_query($dbname, $sql12) or die("Can't Query12");
$row12 = mysql_fetch_array($query12);
$product_id = $row12[0] + 1 ;

$sql13 = " SELECT MAX(id) FROM customize_vest_design ";
$query13 = mysql_db_query($dbname, $sql13) or die("Can't Query13");
$row13 = mysql_fetch_array($query13);
$id_vest = $row13[0] + 1 ;

$sql14 = " INSERT INTO customize_order (id, order_id, product_id, order_reseller, order_order_no, order_name_customize, order_my_price, order_price, order_product, order_fabric_no, order_date, order_time, order_ip, order_status) VALUES ('$id_order', '$order_id', '$product_id', '$company_user', '$vest_order_no', '$vest_customer_name', '$vest_my_price_2', '$vest_price_2', '$order_product', '$vest_fabric_no_2', '$vest_date', '$vest_time', '$vest_ip', '$vest_status') ";
$query14 = mysql_query($sql14) or die("Can't Query14");

$sql15 = " INSERT INTO customize_vest_design (id, order_id, product_id, vest_customer_name, vest_order_no, vest_order_date, vest_delivery_date, vest_fabric_no, vest_lining_no, vest_vest_button, vest_vest_lapel_style, vest_vest_chest_pocket, vest_vest_bottom_pocket, vest_vest_bottom_of_vest, vest_vest_belt_at_back, vest_vest_lining_option, vest_vest_button_number, vest_vest_thread_on_button, vest_vest_button_hole_color, vest_date, vest_time, vest_ip, vest_status) VALUES ('$id_vest', '$order_id', '$product_id', '$vest_customer_name', '$vest_order_no', '$vest_order_date', '$vest_delivery_date', '$vest_fabric_no_2', '$vest_lining_no_2', '$vest_vest_button', '$vest_vest_lapel_style', '$vest_vest_chest_pocket', '$vest_vest_bottom_pocket', '$vest_vest_bottom_of_vest', '$vest_vest_belt_at_back', '$vest_vest_lining_option', '$vest_vest_button_number', '$vest_vest_thread_on_button', '$vest_vest_button_hole_color', '$vest_date', '$vest_time', '$vest_ip', '$vest_status') ";
$query15 = mysql_query($sql15) or die("Can't Query15");

$sql16 = " INSERT INTO customize_vest_measurements (id, order_id, product_id, vest_vest_measurement_sex, vest_vest_measurement_fit, vest_vest_measurement, vest_vest_measurement_vest_length, vest_vest_measurement_back_lenght, vest_vest_measurement_chest, vest_vest_measurement_waist_only, vest_vest_measurement_hips, vest_vest_measurement_neck, vest_vest_measurement_ptp_front, vest_vest_measurement_ptp_back, vest_vest_measurement_arm_hole, vest_measurement_jacket_shoulder, vest_measurement_jacket_waist, vest_measurement_jacket_chest, vest_remark, vest_date, vest_time, vest_ip, vest_status) VALUES ('$id_vest', '$order_id', '$product_id', '$vest_vest_measurement_sex', '$vest_vest_measurement_fit', '$vest_vest_measurement', '$vest_vest_measurement_vest_length', '$vest_vest_measurement_back_lenght', '$vest_vest_measurement_chest', '$vest_vest_measurement_waist_only', '$vest_vest_measurement_hips', '$vest_vest_measurement_neck', '$vest_vest_measurement_ptp_front', '$vest_vest_measurement_ptp_back', '$vest_vest_measurement_arm_hole', '$vest_measurement_jacket_shoulder', '$vest_measurement_jacket_waist', '$vest_measurement_jacket_chest', '$vest_remark', '$vest_date', '$vest_time', '$vest_ip', '$vest_status') ";
$query16 = mysql_query($sql16) or die("Can't Query16");

$path = "../../images/body/vest/front/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['vest_body_front']['name'];
	$tmp = $_FILES['vest_body_front']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$vest_body_front_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$vest_body_front_pic)){
				
				$sql17 = " UPDATE customize_vest_measurements SET vest_body_front = '".$vest_body_front_pic."', vest_date = '".$vest_date."', vest_time = '".$vest_time."', vest_ip = '".$vest_ip."', vest_status = '".$vest_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query17 = mysql_db_query($dbname, $sql17) or die("Can't Query17");
			}
    
	} else {
				$sql17 = " UPDATE customize_vest_measurements SET vest_date = '".$vest_date."', vest_time = '".$vest_time."', vest_ip = '".$vest_ip."', vest_status = '".$vest_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query17 = mysql_db_query($dbname, $sql17) or die("Can't Query17");
			}
	}
	
$path = "../../images/body/vest/left/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['vest_body_left']['name'];
	$tmp = $_FILES['vest_body_left']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$vest_body_left_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$vest_body_left_pic)){
				
				$sql18 = " UPDATE customize_vest_measurements SET vest_body_left = '".$vest_body_left_pic."', vest_date = '".$vest_date."', vest_time = '".$vest_time."', vest_ip = '".$vest_ip."', vest_status = '".$vest_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query18 = mysql_db_query($dbname, $sql18) or die("Can't Query18");
			}
    
	} else {
				$sql18 = " UPDATE customize_vest_measurements SET vest_date = '".$vest_date."', vest_time = '".$vest_time."', vest_ip = '".$vest_ip."', vest_status = '".$vest_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query18 = mysql_db_query($dbname, $sql18) or die("Can't Query18");
			}
	}
	
$path = "../../images/body/vest/right/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['vest_body_right']['name'];
	$tmp = $_FILES['vest_body_right']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$vest_body_right_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$vest_body_right_pic)){
				
				$sql19 = " UPDATE customize_vest_measurements SET vest_body_right = '".$vest_body_right_pic."', vest_date = '".$vest_date."', vest_time = '".$vest_time."', vest_ip = '".$vest_ip."', vest_status = '".$vest_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query19 = mysql_db_query($dbname, $sql19) or die("Can't Query19");
			}
    
	} else {
				$sql19 = " UPDATE customize_vest_measurements SET vest_date = '".$vest_date."', vest_time = '".$vest_time."', vest_ip = '".$vest_ip."', vest_status = '".$vest_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query19 = mysql_db_query($dbname, $sql19) or die("Can't Query19");
			}
	}
	
$path = "../../images/body/vest/back/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['vest_body_back']['name'];
	$tmp = $_FILES['vest_body_back']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$vest_body_back_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$vest_body_back_pic)){
				
				$sql20 = " UPDATE customize_vest_measurements SET vest_body_back = '".$vest_body_back_pic."', vest_date = '".$vest_date."', vest_time = '".$vest_time."', vest_ip = '".$vest_ip."', vest_status = '".$vest_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query20 = mysql_db_query($dbname, $sql20) or die("Can't Query20");
			}
    
	} else {
				$sql20 = " UPDATE customize_vest_measurements SET vest_date = '".$vest_date."', vest_time = '".$vest_time."', vest_ip = '".$vest_ip."', vest_status = '".$vest_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query20 = mysql_db_query($dbname, $sql20) or die("Can't Query20");
			}
	}

} else if ($vest_fabric_no_2 == "" || $vest_lining_no_2 == "") { }	

/*FABRIC 3*/
if ($vest_fabric_no_3 != "" && $vest_lining_no_3 != "") {

$sql11 = " SELECT MAX(id) FROM customize_order ";
$query11 = mysql_db_query($dbname, $sql11) or die("Can't Query11");
$row11 = mysql_fetch_array($query11);
$id_order = $row11[0] + 1 ;

$sql12 = " SELECT MAX(product_id) FROM customize_order";
$query12 = mysql_db_query($dbname, $sql12) or die("Can't Query12");
$row12 = mysql_fetch_array($query12);
$product_id = $row12[0] + 1 ;

$sql13 = " SELECT MAX(id) FROM customize_vest_design ";
$query13 = mysql_db_query($dbname, $sql13) or die("Can't Query13");
$row13 = mysql_fetch_array($query13);
$id_vest = $row13[0] + 1 ;

$sql14 = " INSERT INTO customize_order (id, order_id, product_id, order_reseller, order_order_no, order_name_customize, order_my_price, order_price, order_product, order_fabric_no, order_date, order_time, order_ip, order_status) VALUES ('$id_order', '$order_id', '$product_id', '$company_user', '$vest_order_no', '$vest_customer_name', '$vest_my_price_3', '$vest_price_3', '$order_product', '$vest_fabric_no_3', '$vest_date', '$vest_time', '$vest_ip', '$vest_status') ";
$query14 = mysql_query($sql14) or die("Can't Query14");

$sql15 = " INSERT INTO customize_vest_design (id, order_id, product_id, vest_customer_name, vest_order_no, vest_order_date, vest_delivery_date, vest_fabric_no, vest_lining_no, vest_vest_button, vest_vest_lapel_style, vest_vest_chest_pocket, vest_vest_bottom_pocket, vest_vest_bottom_of_vest, vest_vest_belt_at_back, vest_vest_lining_option, vest_vest_button_number, vest_vest_thread_on_button, vest_vest_button_hole_color, vest_date, vest_time, vest_ip, vest_status) VALUES ('$id_vest', '$order_id', '$product_id', '$vest_customer_name', '$vest_order_no', '$vest_order_date', '$vest_delivery_date', '$vest_fabric_no_3', '$vest_lining_no_3', '$vest_vest_button', '$vest_vest_lapel_style', '$vest_vest_chest_pocket', '$vest_vest_bottom_pocket', '$vest_vest_bottom_of_vest', '$vest_vest_belt_at_back', '$vest_vest_lining_option', '$vest_vest_button_number', '$vest_vest_thread_on_button', '$vest_vest_button_hole_color', '$vest_date', '$vest_time', '$vest_ip', '$vest_status') ";
$query15 = mysql_query($sql15) or die("Can't Query15");

$sql16 = " INSERT INTO customize_vest_measurements (id, order_id, product_id, vest_vest_measurement_sex, vest_vest_measurement_fit, vest_vest_measurement, vest_vest_measurement_vest_length, vest_vest_measurement_back_lenght, vest_vest_measurement_chest, vest_vest_measurement_waist_only, vest_vest_measurement_hips, vest_vest_measurement_neck, vest_vest_measurement_ptp_front, vest_vest_measurement_ptp_back, vest_vest_measurement_arm_hole, vest_measurement_jacket_shoulder, vest_measurement_jacket_waist, vest_measurement_jacket_chest, vest_remark, vest_date, vest_time, vest_ip, vest_status) VALUES ('$id_vest', '$order_id', '$product_id', '$vest_vest_measurement_sex', '$vest_vest_measurement_fit', '$vest_vest_measurement', '$vest_vest_measurement_vest_length', '$vest_vest_measurement_back_lenght', '$vest_vest_measurement_chest', '$vest_vest_measurement_waist_only', '$vest_vest_measurement_hips', '$vest_vest_measurement_neck', '$vest_vest_measurement_ptp_front', '$vest_vest_measurement_ptp_back', '$vest_vest_measurement_arm_hole', '$vest_measurement_jacket_shoulder', '$vest_measurement_jacket_waist', '$vest_measurement_jacket_chest', '$vest_remark', '$vest_date', '$vest_time', '$vest_ip', '$vest_status') ";
$query16 = mysql_query($sql16) or die("Can't Query16");

$path = "../../images/body/vest/front/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['vest_body_front']['name'];
	$tmp = $_FILES['vest_body_front']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$vest_body_front_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$vest_body_front_pic)){
				
				$sql17 = " UPDATE customize_vest_measurements SET vest_body_front = '".$vest_body_front_pic."', vest_date = '".$vest_date."', vest_time = '".$vest_time."', vest_ip = '".$vest_ip."', vest_status = '".$vest_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query17 = mysql_db_query($dbname, $sql17) or die("Can't Query17");
			}
    
	} else {
				$sql17 = " UPDATE customize_vest_measurements SET vest_date = '".$vest_date."', vest_time = '".$vest_time."', vest_ip = '".$vest_ip."', vest_status = '".$vest_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query17 = mysql_db_query($dbname, $sql17) or die("Can't Query17");
			}
	}
	
$path = "../../images/body/vest/left/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['vest_body_left']['name'];
	$tmp = $_FILES['vest_body_left']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$vest_body_left_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$vest_body_left_pic)){
				
				$sql18 = " UPDATE customize_vest_measurements SET vest_body_left = '".$vest_body_left_pic."', vest_date = '".$vest_date."', vest_time = '".$vest_time."', vest_ip = '".$vest_ip."', vest_status = '".$vest_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query18 = mysql_db_query($dbname, $sql18) or die("Can't Query18");
			}
    
	} else {
				$sql18 = " UPDATE customize_vest_measurements SET vest_date = '".$vest_date."', vest_time = '".$vest_time."', vest_ip = '".$vest_ip."', vest_status = '".$vest_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query18 = mysql_db_query($dbname, $sql18) or die("Can't Query18");
			}
	}
	
$path = "../../images/body/vest/right/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['vest_body_right']['name'];
	$tmp = $_FILES['vest_body_right']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$vest_body_right_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$vest_body_right_pic)){
				
				$sql19 = " UPDATE customize_vest_measurements SET vest_body_right = '".$vest_body_right_pic."', vest_date = '".$vest_date."', vest_time = '".$vest_time."', vest_ip = '".$vest_ip."', vest_status = '".$vest_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query19 = mysql_db_query($dbname, $sql19) or die("Can't Query19");
			}
    
	} else {
				$sql19 = " UPDATE customize_vest_measurements SET vest_date = '".$vest_date."', vest_time = '".$vest_time."', vest_ip = '".$vest_ip."', vest_status = '".$vest_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query19 = mysql_db_query($dbname, $sql19) or die("Can't Query19");
			}
	}
	
$path = "../../images/body/vest/back/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['vest_body_back']['name'];
	$tmp = $_FILES['vest_body_back']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$vest_body_back_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$vest_body_back_pic)){
				
				$sql20 = " UPDATE customize_vest_measurements SET vest_body_back = '".$vest_body_back_pic."', vest_date = '".$vest_date."', vest_time = '".$vest_time."', vest_ip = '".$vest_ip."', vest_status = '".$vest_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query20 = mysql_db_query($dbname, $sql20) or die("Can't Query20");
			}
    
	} else {
				$sql20 = " UPDATE customize_vest_measurements SET vest_date = '".$vest_date."', vest_time = '".$vest_time."', vest_ip = '".$vest_ip."', vest_status = '".$vest_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query20 = mysql_db_query($dbname, $sql20) or die("Can't Query20");
			}
	}

} else if ($vest_fabric_no_3 == "" || $vest_lining_no_3 == "") { }

/*FABRIC 4*/
if ($vest_fabric_no_4 != "" && $vest_lining_no_4 != "") {

$sql11 = " SELECT MAX(id) FROM customize_order ";
$query11 = mysql_db_query($dbname, $sql11) or die("Can't Query11");
$row11 = mysql_fetch_array($query11);
$id_order = $row11[0] + 1 ;

$sql12 = " SELECT MAX(product_id) FROM customize_order";
$query12 = mysql_db_query($dbname, $sql12) or die("Can't Query12");
$row12 = mysql_fetch_array($query12);
$product_id = $row12[0] + 1 ;

$sql13 = " SELECT MAX(id) FROM customize_vest_design ";
$query13 = mysql_db_query($dbname, $sql13) or die("Can't Query13");
$row13 = mysql_fetch_array($query13);
$id_vest = $row13[0] + 1 ;

$sql14 = " INSERT INTO customize_order (id, order_id, product_id, order_reseller, order_order_no, order_name_customize, order_my_price, order_price, order_product, order_fabric_no, order_date, order_time, order_ip, order_status) VALUES ('$id_order', '$order_id', '$product_id', '$company_user', '$vest_order_no', '$vest_customer_name', '$vest_my_price_4', '$vest_price_4', '$order_product', '$vest_fabric_no_4', '$vest_date', '$vest_time', '$vest_ip', '$vest_status') ";
$query14 = mysql_query($sql14) or die("Can't Query14");

$sql15 = " INSERT INTO customize_vest_design (id, order_id, product_id, vest_customer_name, vest_order_no, vest_order_date, vest_delivery_date, vest_fabric_no, vest_lining_no, vest_vest_button, vest_vest_lapel_style, vest_vest_chest_pocket, vest_vest_bottom_pocket, vest_vest_bottom_of_vest, vest_vest_belt_at_back, vest_vest_lining_option, vest_vest_button_number, vest_vest_thread_on_button, vest_vest_button_hole_color, vest_date, vest_time, vest_ip, vest_status) VALUES ('$id_vest', '$order_id', '$product_id', '$vest_customer_name', '$vest_order_no', '$vest_order_date', '$vest_delivery_date', '$vest_fabric_no_4', '$vest_lining_no_4', '$vest_vest_button', '$vest_vest_lapel_style', '$vest_vest_chest_pocket', '$vest_vest_bottom_pocket', '$vest_vest_bottom_of_vest', '$vest_vest_belt_at_back', '$vest_vest_lining_option', '$vest_vest_button_number', '$vest_vest_thread_on_button', '$vest_vest_button_hole_color', '$vest_date', '$vest_time', '$vest_ip', '$vest_status') ";
$query15 = mysql_query($sql15) or die("Can't Query15");

$sql16 = " INSERT INTO customize_vest_measurements (id, order_id, product_id, vest_vest_measurement_sex, vest_vest_measurement_fit, vest_vest_measurement, vest_vest_measurement_vest_length, vest_vest_measurement_back_lenght, vest_vest_measurement_chest, vest_vest_measurement_waist_only, vest_vest_measurement_hips, vest_vest_measurement_neck, vest_vest_measurement_ptp_front, vest_vest_measurement_ptp_back, vest_vest_measurement_arm_hole, vest_measurement_jacket_shoulder, vest_measurement_jacket_waist, vest_measurement_jacket_chest, vest_remark, vest_date, vest_time, vest_ip, vest_status) VALUES ('$id_vest', '$order_id', '$product_id', '$vest_vest_measurement_sex', '$vest_vest_measurement_fit', '$vest_vest_measurement', '$vest_vest_measurement_vest_length', '$vest_vest_measurement_back_lenght', '$vest_vest_measurement_chest', '$vest_vest_measurement_waist_only', '$vest_vest_measurement_hips', '$vest_vest_measurement_neck', '$vest_vest_measurement_ptp_front', '$vest_vest_measurement_ptp_back', '$vest_vest_measurement_arm_hole', '$vest_measurement_jacket_shoulder', '$vest_measurement_jacket_waist', '$vest_measurement_jacket_chest', '$vest_remark', '$vest_date', '$vest_time', '$vest_ip', '$vest_status') ";
$query16 = mysql_query($sql16) or die("Can't Query16");

$path = "../../images/body/vest/front/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['vest_body_front']['name'];
	$tmp = $_FILES['vest_body_front']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$vest_body_front_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$vest_body_front_pic)){
				
				$sql17 = " UPDATE customize_vest_measurements SET vest_body_front = '".$vest_body_front_pic."', vest_date = '".$vest_date."', vest_time = '".$vest_time."', vest_ip = '".$vest_ip."', vest_status = '".$vest_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query17 = mysql_db_query($dbname, $sql17) or die("Can't Query17");
			}
    
	} else {
				$sql17 = " UPDATE customize_vest_measurements SET vest_date = '".$vest_date."', vest_time = '".$vest_time."', vest_ip = '".$vest_ip."', vest_status = '".$vest_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query17 = mysql_db_query($dbname, $sql17) or die("Can't Query17");
			}
	}
	
$path = "../../images/body/vest/left/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['vest_body_left']['name'];
	$tmp = $_FILES['vest_body_left']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$vest_body_left_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$vest_body_left_pic)){
				
				$sql18 = " UPDATE customize_vest_measurements SET vest_body_left = '".$vest_body_left_pic."', vest_date = '".$vest_date."', vest_time = '".$vest_time."', vest_ip = '".$vest_ip."', vest_status = '".$vest_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query18 = mysql_db_query($dbname, $sql18) or die("Can't Query18");
			}
    
	} else {
				$sql18 = " UPDATE customize_vest_measurements SET vest_date = '".$vest_date."', vest_time = '".$vest_time."', vest_ip = '".$vest_ip."', vest_status = '".$vest_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query18 = mysql_db_query($dbname, $sql18) or die("Can't Query18");
			}
	}
	
$path = "../../images/body/vest/right/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['vest_body_right']['name'];
	$tmp = $_FILES['vest_body_right']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$vest_body_right_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$vest_body_right_pic)){
				
				$sql19 = " UPDATE customize_vest_measurements SET vest_body_right = '".$vest_body_right_pic."', vest_date = '".$vest_date."', vest_time = '".$vest_time."', vest_ip = '".$vest_ip."', vest_status = '".$vest_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query19 = mysql_db_query($dbname, $sql19) or die("Can't Query19");
			}
    
	} else {
				$sql19 = " UPDATE customize_vest_measurements SET vest_date = '".$vest_date."', vest_time = '".$vest_time."', vest_ip = '".$vest_ip."', vest_status = '".$vest_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query19 = mysql_db_query($dbname, $sql19) or die("Can't Query19");
			}
	}
	
$path = "../../images/body/vest/back/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['vest_body_back']['name'];
	$tmp = $_FILES['vest_body_back']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$vest_body_back_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$vest_body_back_pic)){
				
				$sql20 = " UPDATE customize_vest_measurements SET vest_body_back = '".$vest_body_back_pic."', vest_date = '".$vest_date."', vest_time = '".$vest_time."', vest_ip = '".$vest_ip."', vest_status = '".$vest_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query20 = mysql_db_query($dbname, $sql20) or die("Can't Query20");
			}
    
	} else {
				$sql20 = " UPDATE customize_vest_measurements SET vest_date = '".$vest_date."', vest_time = '".$vest_time."', vest_ip = '".$vest_ip."', vest_status = '".$vest_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query20 = mysql_db_query($dbname, $sql20) or die("Can't Query20");
			}
	}

} else if ($vest_fabric_no_4 == "" || $vest_lining_no_4 == "") { }

/*FABRIC 5*/
if ($vest_fabric_no_5 != "" && $vest_lining_no_5 != "") {
	
$sql11 = " SELECT MAX(id) FROM customize_order ";
$query11 = mysql_db_query($dbname, $sql11) or die("Can't Query11");
$row11 = mysql_fetch_array($query11);
$id_order = $row11[0] + 1 ;

$sql12 = " SELECT MAX(product_id) FROM customize_order";
$query12 = mysql_db_query($dbname, $sql12) or die("Can't Query12");
$row12 = mysql_fetch_array($query12);
$product_id = $row12[0] + 1 ;

$sql13 = " SELECT MAX(id) FROM customize_vest_design ";
$query13 = mysql_db_query($dbname, $sql13) or die("Can't Query13");
$row13 = mysql_fetch_array($query13);
$id_vest = $row13[0] + 1 ;

$sql14 = " INSERT INTO customize_order (id, order_id, product_id, order_reseller, order_order_no, order_name_customize, order_my_price, order_price, order_product, order_fabric_no, order_date, order_time, order_ip, order_status) VALUES ('$id_order', '$order_id', '$product_id', '$company_user', '$vest_order_no', '$vest_customer_name', '$vest_my_price_5', '$vest_price_5', '$order_product', '$vest_fabric_no_5', '$vest_date', '$vest_time', '$vest_ip', '$vest_status') ";
$query14 = mysql_query($sql14) or die("Can't Query14");

$sql15 = " INSERT INTO customize_vest_design (id, order_id, product_id, vest_customer_name, vest_order_no, vest_order_date, vest_delivery_date, vest_fabric_no, vest_lining_no, vest_vest_button, vest_vest_lapel_style, vest_vest_chest_pocket, vest_vest_bottom_pocket, vest_vest_bottom_of_vest, vest_vest_belt_at_back, vest_vest_lining_option, vest_vest_button_number, vest_vest_thread_on_button, vest_vest_button_hole_color, vest_date, vest_time, vest_ip, vest_status) VALUES ('$id_vest', '$order_id', '$product_id', '$vest_customer_name', '$vest_order_no', '$vest_order_date', '$vest_delivery_date', '$vest_fabric_no_5', '$vest_lining_no_5', '$vest_vest_button', '$vest_vest_lapel_style', '$vest_vest_chest_pocket', '$vest_vest_bottom_pocket', '$vest_vest_bottom_of_vest', '$vest_vest_belt_at_back', '$vest_vest_lining_option', '$vest_vest_button_number', '$vest_vest_thread_on_button', '$vest_vest_button_hole_color', '$vest_date', '$vest_time', '$vest_ip', '$vest_status') ";
$query15 = mysql_query($sql15) or die("Can't Query15");

$sql16 = " INSERT INTO customize_vest_measurements (id, order_id, product_id, vest_vest_measurement_sex, vest_vest_measurement_fit, vest_vest_measurement, vest_vest_measurement_vest_length, vest_vest_measurement_back_lenght, vest_vest_measurement_chest, vest_vest_measurement_waist_only, vest_vest_measurement_hips, vest_vest_measurement_neck, vest_vest_measurement_ptp_front, vest_vest_measurement_ptp_back, vest_vest_measurement_arm_hole, vest_measurement_jacket_shoulder, vest_measurement_jacket_waist, vest_measurement_jacket_chest, vest_remark, vest_date, vest_time, vest_ip, vest_status) VALUES ('$id_vest', '$order_id', '$product_id', '$vest_vest_measurement_sex', '$vest_vest_measurement_fit', '$vest_vest_measurement', '$vest_vest_measurement_vest_length', '$vest_vest_measurement_back_lenght', '$vest_vest_measurement_chest', '$vest_vest_measurement_waist_only', '$vest_vest_measurement_hips', '$vest_vest_measurement_neck', '$vest_vest_measurement_ptp_front', '$vest_vest_measurement_ptp_back', '$vest_vest_measurement_arm_hole', '$vest_measurement_jacket_shoulder', '$vest_measurement_jacket_waist', '$vest_measurement_jacket_chest', '$vest_remark', '$vest_date', '$vest_time', '$vest_ip', '$vest_status') ";
$query16 = mysql_query($sql16) or die("Can't Query16");

$path = "../../images/body/vest/front/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['vest_body_front']['name'];
	$tmp = $_FILES['vest_body_front']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$vest_body_front_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$vest_body_front_pic)){
				
				$sql17 = " UPDATE customize_vest_measurements SET vest_body_front = '".$vest_body_front_pic."', vest_date = '".$vest_date."', vest_time = '".$vest_time."', vest_ip = '".$vest_ip."', vest_status = '".$vest_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query17 = mysql_db_query($dbname, $sql17) or die("Can't Query17");
			}
    
	} else {
				$sql17 = " UPDATE customize_vest_measurements SET vest_date = '".$vest_date."', vest_time = '".$vest_time."', vest_ip = '".$vest_ip."', vest_status = '".$vest_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query17 = mysql_db_query($dbname, $sql17) or die("Can't Query17");
			}
	}
	
$path = "../../images/body/vest/left/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['vest_body_left']['name'];
	$tmp = $_FILES['vest_body_left']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$vest_body_left_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$vest_body_left_pic)){
				
				$sql18 = " UPDATE customize_vest_measurements SET vest_body_left = '".$vest_body_left_pic."', vest_date = '".$vest_date."', vest_time = '".$vest_time."', vest_ip = '".$vest_ip."', vest_status = '".$vest_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query18 = mysql_db_query($dbname, $sql18) or die("Can't Query18");
			}
    
	} else {
				$sql18 = " UPDATE customize_vest_measurements SET vest_date = '".$vest_date."', vest_time = '".$vest_time."', vest_ip = '".$vest_ip."', vest_status = '".$vest_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query18 = mysql_db_query($dbname, $sql18) or die("Can't Query18");
			}
	}
	
$path = "../../images/body/vest/right/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['vest_body_right']['name'];
	$tmp = $_FILES['vest_body_right']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$vest_body_right_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$vest_body_right_pic)){
				
				$sql19 = " UPDATE customize_vest_measurements SET vest_body_right = '".$vest_body_right_pic."', vest_date = '".$vest_date."', vest_time = '".$vest_time."', vest_ip = '".$vest_ip."', vest_status = '".$vest_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query19 = mysql_db_query($dbname, $sql19) or die("Can't Query19");
			}
    
	} else {
				$sql19 = " UPDATE customize_vest_measurements SET vest_date = '".$vest_date."', vest_time = '".$vest_time."', vest_ip = '".$vest_ip."', vest_status = '".$vest_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query19 = mysql_db_query($dbname, $sql19) or die("Can't Query19");
			}
	}
	
$path = "../../images/body/vest/back/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['vest_body_back']['name'];
	$tmp = $_FILES['vest_body_back']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$vest_body_back_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$vest_body_back_pic)){
				
				$sql20 = " UPDATE customize_vest_measurements SET vest_body_back = '".$vest_body_back_pic."', vest_date = '".$vest_date."', vest_time = '".$vest_time."', vest_ip = '".$vest_ip."', vest_status = '".$vest_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query20 = mysql_db_query($dbname, $sql20) or die("Can't Query20");
			}
    
	} else {
				$sql20 = " UPDATE customize_vest_measurements SET vest_date = '".$vest_date."', vest_time = '".$vest_time."', vest_ip = '".$vest_ip."', vest_status = '".$vest_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query20 = mysql_db_query($dbname, $sql20) or die("Can't Query20");
			}
	}

} else if ($vest_fabric_no_5 == "" || $vest_lining_no_5 == "") { }

/*FABRIC 6*/
if ($vest_fabric_no_6 != "" && $vest_lining_no_6 != "") {

$sql11 = " SELECT MAX(id) FROM customize_order ";
$query11 = mysql_db_query($dbname, $sql11) or die("Can't Query11");
$row11 = mysql_fetch_array($query11);
$id_order = $row11[0] + 1 ;

$sql12 = " SELECT MAX(product_id) FROM customize_order";
$query12 = mysql_db_query($dbname, $sql12) or die("Can't Query12");
$row12 = mysql_fetch_array($query12);
$product_id = $row12[0] + 1 ;

$sql13 = " SELECT MAX(id) FROM customize_vest_design ";
$query13 = mysql_db_query($dbname, $sql13) or die("Can't Query13");
$row13 = mysql_fetch_array($query13);
$id_vest = $row13[0] + 1 ;

$sql14 = " INSERT INTO customize_order (id, order_id, product_id, order_reseller, order_order_no, order_name_customize, order_my_price, order_price, order_product, order_fabric_no, order_date, order_time, order_ip, order_status) VALUES ('$id_order', '$order_id', '$product_id', '$company_user', '$vest_order_no', '$vest_customer_name', '$vest_my_price_6', '$vest_price_6', '$order_product', '$vest_fabric_no_6', '$vest_date', '$vest_time', '$vest_ip', '$vest_status') ";
$query14 = mysql_query($sql14) or die("Can't Query14");

$sql15 = " INSERT INTO customize_vest_design (id, order_id, product_id, vest_customer_name, vest_order_no, vest_order_date, vest_delivery_date, vest_fabric_no, vest_lining_no, vest_vest_button, vest_vest_lapel_style, vest_vest_chest_pocket, vest_vest_bottom_pocket, vest_vest_bottom_of_vest, vest_vest_belt_at_back, vest_vest_lining_option, vest_vest_button_number, vest_vest_thread_on_button, vest_vest_button_hole_color, vest_date, vest_time, vest_ip, vest_status) VALUES ('$id_vest', '$order_id', '$product_id', '$vest_customer_name', '$vest_order_no', '$vest_order_date', '$vest_delivery_date', '$vest_fabric_no_6', '$vest_lining_no_6', '$vest_vest_button', '$vest_vest_lapel_style', '$vest_vest_chest_pocket', '$vest_vest_bottom_pocket', '$vest_vest_bottom_of_vest', '$vest_vest_belt_at_back', '$vest_vest_lining_option', '$vest_vest_button_number', '$vest_vest_thread_on_button', '$vest_vest_button_hole_color', '$vest_date', '$vest_time', '$vest_ip', '$vest_status') ";
$query15 = mysql_query($sql15) or die("Can't Query15");

$sql16 = " INSERT INTO customize_vest_measurements (id, order_id, product_id, vest_vest_measurement_sex, vest_vest_measurement_fit, vest_vest_measurement, vest_vest_measurement_vest_length, vest_vest_measurement_back_lenght, vest_vest_measurement_chest, vest_vest_measurement_waist_only, vest_vest_measurement_hips, vest_vest_measurement_neck, vest_vest_measurement_ptp_front, vest_vest_measurement_ptp_back, vest_vest_measurement_arm_hole, vest_measurement_jacket_shoulder, vest_measurement_jacket_waist, vest_measurement_jacket_chest, vest_remark, vest_date, vest_time, vest_ip, vest_status) VALUES ('$id_vest', '$order_id', '$product_id', '$vest_vest_measurement_sex', '$vest_vest_measurement_fit', '$vest_vest_measurement', '$vest_vest_measurement_vest_length', '$vest_vest_measurement_back_lenght', '$vest_vest_measurement_chest', '$vest_vest_measurement_waist_only', '$vest_vest_measurement_hips', '$vest_vest_measurement_neck', '$vest_vest_measurement_ptp_front', '$vest_vest_measurement_ptp_back', '$vest_vest_measurement_arm_hole', '$vest_measurement_jacket_shoulder', '$vest_measurement_jacket_waist', '$vest_measurement_jacket_chest', '$vest_remark', '$vest_date', '$vest_time', '$vest_ip', '$vest_status') ";
$query16 = mysql_query($sql16) or die("Can't Query16");

$path = "../../images/body/vest/front/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['vest_body_front']['name'];
	$tmp = $_FILES['vest_body_front']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$vest_body_front_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$vest_body_front_pic)){
				
				$sql17 = " UPDATE customize_vest_measurements SET vest_body_front = '".$vest_body_front_pic."', vest_date = '".$vest_date."', vest_time = '".$vest_time."', vest_ip = '".$vest_ip."', vest_status = '".$vest_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query17 = mysql_db_query($dbname, $sql17) or die("Can't Query17");
			}
    
	} else {
				$sql17 = " UPDATE customize_vest_measurements SET vest_date = '".$vest_date."', vest_time = '".$vest_time."', vest_ip = '".$vest_ip."', vest_status = '".$vest_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query17 = mysql_db_query($dbname, $sql17) or die("Can't Query17");
			}
	}
	
$path = "../../images/body/vest/left/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['vest_body_left']['name'];
	$tmp = $_FILES['vest_body_left']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$vest_body_left_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$vest_body_left_pic)){
				
				$sql18 = " UPDATE customize_vest_measurements SET vest_body_left = '".$vest_body_left_pic."', vest_date = '".$vest_date."', vest_time = '".$vest_time."', vest_ip = '".$vest_ip."', vest_status = '".$vest_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query18 = mysql_db_query($dbname, $sql18) or die("Can't Query18");
			}
    
	} else {
				$sql18 = " UPDATE customize_vest_measurements SET vest_date = '".$vest_date."', vest_time = '".$vest_time."', vest_ip = '".$vest_ip."', vest_status = '".$vest_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query18 = mysql_db_query($dbname, $sql18) or die("Can't Query18");
			}
	}
	
$path = "../../images/body/vest/right/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['vest_body_right']['name'];
	$tmp = $_FILES['vest_body_right']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$vest_body_right_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$vest_body_right_pic)){
				
				$sql19 = " UPDATE customize_vest_measurements SET vest_body_right = '".$vest_body_right_pic."', vest_date = '".$vest_date."', vest_time = '".$vest_time."', vest_ip = '".$vest_ip."', vest_status = '".$vest_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query19 = mysql_db_query($dbname, $sql19) or die("Can't Query19");
			}
    
	} else {
				$sql19 = " UPDATE customize_vest_measurements SET vest_date = '".$vest_date."', vest_time = '".$vest_time."', vest_ip = '".$vest_ip."', vest_status = '".$vest_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query19 = mysql_db_query($dbname, $sql19) or die("Can't Query19");
			}
	}
	
$path = "../../images/body/vest/back/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['vest_body_back']['name'];
	$tmp = $_FILES['vest_body_back']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$vest_body_back_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$vest_body_back_pic)){
				
				$sql20 = " UPDATE customize_vest_measurements SET vest_body_back = '".$vest_body_back_pic."', vest_date = '".$vest_date."', vest_time = '".$vest_time."', vest_ip = '".$vest_ip."', vest_status = '".$vest_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query20 = mysql_db_query($dbname, $sql20) or die("Can't Query20");
			}
    
	} else {
				$sql20 = " UPDATE customize_vest_measurements SET vest_date = '".$vest_date."', vest_time = '".$vest_time."', vest_ip = '".$vest_ip."', vest_status = '".$vest_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query20 = mysql_db_query($dbname, $sql20) or die("Can't Query20");
			}
	}

} else if ($vest_fabric_no_6 == "" || $vest_lining_no_6 == "") { }

if ($vest_orderid != "") {
	
	$sql21 = " UPDATE customize_checkout SET checkout_company = '$company_user', checkout_order = '$vest_order_no', checkout_customer = '$vest_customer_name', checkout_date = '$vest_date', checkout_time = '$vest_time', checkout_ip = '$vest_ip', checkout_status = '$vest_status' WHERE checkout_orderid = '$order_id' ";
	$query21 = mysql_query($sql21) or die("Can't Query21");
	
} else if ($vest_orderid == "") {
	
	$sql21 = " INSERT INTO customize_checkout (id, checkout_company, checkout_order, checkout_orderid, checkout_customer, checkout_date, checkout_time, checkout_ip, checkout_status) VALUES ('$id_customize_checkout', '$company_user' , '$vest_order_no', '$order_id', '$vest_customer_name', '$vest_date', '$vest_time', '$vest_ip', '$vest_status') ";
	$query21 = mysql_query($sql21) or die("Can't Query21");
	
}

if($query21) {
	
	echo " <script language='javascript'> window.location='../../cart/multiple/index.php?orderid=".$order_id."'; </script> ";
	
}

mysql_close();
?>