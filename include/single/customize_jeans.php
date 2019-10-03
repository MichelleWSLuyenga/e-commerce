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

$order_product = jeans;
$jeans_orderid = $_POST["jeans_orderid"];

if ($jeans_orderid != "") {
	
	$order_id = $jeans_orderid;
	
} else if ($jeans_orderid == "") {
	
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
$jeans_fabric_no_1 = $_POST["jeans_fabric_no_1"];
$jeans_fabric_no_2 = $_POST["jeans_fabric_no_2"];
$jeans_fabric_no_3 = $_POST["jeans_fabric_no_3"];
$jeans_fabric_no_4 = $_POST["jeans_fabric_no_4"];
$jeans_fabric_no_5 = $_POST["jeans_fabric_no_5"];
$jeans_fabric_no_6 = $_POST["jeans_fabric_no_6"];

$sql4 =	" SELECT * FROM admin_fabrics_jeans WHERE fabricno = '$jeans_fabric_no_1' ";
$query4 = mysql_db_query($dbname, $sql4) or die("Can't Query4");
$row4 = mysql_fetch_array($query4);
$fabrics_type = $row4["type"];
$fabrics_brand = $row4["brand"];

if ($row4["type"] != '') {

$sql01 = " SELECT `fabrictype_".$id_user."` FROM admin_fabrictype WHERE fabrictype_name = '$fabrics_type' AND fabrictype_product = 'Jeans' ";
$query01 = mysql_db_query($dbname, $sql01) or die("Can't Query01");
$row01 = mysql_fetch_array($query01);
$jeans_fabric_price_1 = $row01["0"];

} else if ($row4["brand"] != '') {
	
$sql02 = " SELECT `fabricbrand_".$id_user."` FROM admin_fabricbrand WHERE fabricbrand_name = '$fabrics_brand' AND fabricbrand_product = 'Jeans' ";
$query02 = mysql_db_query($dbname, $sql02) or die("Can't Query02");
$row02 = mysql_fetch_array($query02);	
$jeans_fabric_price_1 = $row02["0"];
	
}

$sql5 =	" SELECT * FROM admin_fabrics_jeans WHERE fabricno = '$jeans_fabric_no_2' ";
$query5 = mysql_db_query($dbname, $sql5) or die("Can't Query5");
$row5 = mysql_fetch_array($query5);
$fabrics_type = $row5["type"];
$fabrics_brand = $row5["brand"];

if ($row5["type"] != '') {

$sql03 = " SELECT `fabrictype_".$id_user."` FROM admin_fabrictype WHERE fabrictype_name = '$fabrics_type' AND fabrictype_product = 'Jeans' ";
$query03 = mysql_db_query($dbname, $sql03) or die("Can't Query03");
$row03 = mysql_fetch_array($query03);
$jeans_fabric_price_2 = $row03["0"];

} else if ($row5["brand"] != '') {
	
$sql04 = " SELECT `fabricbrand_".$id_user."` FROM admin_fabricbrand WHERE fabricbrand_name = '$fabrics_brand' AND fabricbrand_product = 'Jeans' ";
$query04 = mysql_db_query($dbname, $sql04) or die("Can't Query04");
$row04 = mysql_fetch_array($query04);	
$jeans_fabric_price_2 = $row04["0"];
	
}

$sql6 =	" SELECT * FROM admin_fabrics_jeans WHERE fabricno = '$jeans_fabric_no_3' ";
$query6 = mysql_db_query($dbname, $sql6) or die("Can't Query6");
$row6 = mysql_fetch_array($query6);
$fabrics_type = $row6["type"];
$fabrics_brand = $row6["brand"];

if ($row6["type"] != '') {

$sql05 = " SELECT `fabrictype_".$id_user."` FROM admin_fabrictype WHERE fabrictype_name = '$fabrics_type' AND fabrictype_product = 'Jeans' ";
$query05 = mysql_db_query($dbname, $sql05) or die("Can't Query05");
$row05 = mysql_fetch_array($query05);
$jeans_fabric_price_3 = $row05["0"];

} else if ($row6["brand"] != '') {
	
$sql06 = " SELECT `fabricbrand_".$id_user."` FROM admin_fabricbrand WHERE fabricbrand_name = '$fabrics_brand' AND fabricbrand_product = 'Jeans' ";
$query06 = mysql_db_query($dbname, $sql06) or die("Can't Query06");
$row06 = mysql_fetch_array($query06);	
$jeans_fabric_price_3 = $row06["0"];
	
}

$sql7 =	" SELECT * FROM admin_fabrics_jeans WHERE fabricno = '$jeans_fabric_no_4' ";
$query7 = mysql_db_query($dbname, $sql7) or die("Can't Query7");
$row7 = mysql_fetch_array($query7);
$fabrics_type = $row7["type"];
$fabrics_brand = $row7["brand"];

if ($row7["type"] != '') {

$sql07 = " SELECT `fabrictype_".$id_user."` FROM admin_fabrictype WHERE fabrictype_name = '$fabrics_type' AND fabrictype_product = 'Jeans' ";
$query07 = mysql_db_query($dbname, $sql07) or die("Can't Query07");
$row07 = mysql_fetch_array($query07);
$jeans_fabric_price_4 = $row07["0"];

} else if ($row7["brand"] != '') {
	
$sql08 = " SELECT `fabricbrand_".$id_user."` FROM admin_fabricbrand WHERE fabricbrand_name = '$fabrics_brand' AND fabricbrand_product = 'Jeans' ";
$query08 = mysql_db_query($dbname, $sql08) or die("Can't Query08");
$row08 = mysql_fetch_array($query08);	
$jeans_fabric_price_4 = $row08["0"];
	
}

$sql8 = " SELECT * FROM admin_fabrics_jeans WHERE fabricno = '$jeans_fabric_no_5' ";
$query8 = mysql_db_query($dbname, $sql8) or die("Can't Query8");
$row8 = mysql_fetch_array($query8);
$fabrics_type = $row8["type"];
$fabrics_brand = $row8["brand"];

if ($row8["type"] != '') {

$sql09 = " SELECT `fabrictype_".$id_user."` FROM admin_fabrictype WHERE fabrictype_name = '$fabrics_type' AND fabrictype_product = 'Jeans' ";
$query09 = mysql_db_query($dbname, $sql09) or die("Can't Query09");
$row09 = mysql_fetch_array($query09);
$jeans_fabric_price_5 = $row09["0"];

} else if ($row8["brand"] != '') {
	
$sql010 = " SELECT `fabricbrand_".$id_user."` FROM admin_fabricbrand WHERE fabricbrand_name = '$fabrics_brand' AND fabricbrand_product = 'Jeans' ";
$query010 = mysql_db_query($dbname, $sql010) or die("Can't Query010");
$row010 = mysql_fetch_array($query010);	
$jeans_fabric_price_5 = $row010["0"];
	
}

$sql9 = " SELECT * FROM admin_fabrics_jeans WHERE fabricno = '$jeans_fabric_no_6' ";
$query9 = mysql_db_query($dbname, $sql9) or die("Can't Query9");
$row9 = mysql_fetch_array($query9);
$fabrics_type = $row9["type"];
$fabrics_brand = $row9["brand"];

if ($row9["type"] != '') {

$sql011 = " SELECT `fabrictype_".$id_user."` FROM admin_fabrictype WHERE fabrictype_name = '$fabrics_type' AND fabrictype_product = 'Jeans' ";
$query011 = mysql_db_query($dbname, $sql011) or die("Can't Query011");
$row011 = mysql_fetch_array($query011);
$jeans_fabric_price_6 = $row011["0"];

} else if ($row9["brand"] != '') {
	
$sql012 = " SELECT `fabricbrand_".$id_user."` FROM admin_fabricbrand WHERE fabricbrand_name = '$fabrics_brand' AND fabricbrand_product = 'Jeans' ";
$query012 = mysql_db_query($dbname, $sql012) or die("Can't Query012");
$row012 = mysql_fetch_array($query012);	
$jeans_fabric_price_6 = $row012["0"];
	
}

/*OTHER PRICING PARAMETERS*/
$jeans_measurement_waist = $_POST["jeans_measurement_waist"];
$jeans_measurement_hips = $_POST["jeans_measurement_hips"];

if (($jeans_measurement_waist >= '50' && $jeans_measurement_waist <= '52') || ($jeans_measurement_hips >= '50' && $jeans_measurement_hips <= '52')) {
	
	$price_size_1 = $jeans_fabric_price_1 * 20;
	$price_size_2 = $price_size_1 / 100;
	$price_size_3 = $price_size_2 + $jeans_fabric_price_1;
	
	$price_size_4 = $jeans_fabric_price_2 * 20;
	$price_size_5 = $price_size_4 / 100;
	$price_size_6 = $price_size_5 + $jeans_fabric_price_2;
	
	$price_size_7 = $jeans_fabric_price_3 * 20;
	$price_size_8 = $price_size_7 / 100;
	$price_size_9 = $price_size_8 + $jeans_fabric_price_3;
	
	$price_size_10 = $jeans_fabric_price_4 * 20;
	$price_size_11 = $price_size_10 / 100;
	$price_size_12 = $price_size_11 + $jeans_fabric_price_4;
	
	$price_size_13 = $jeans_fabric_price_5 * 20;
	$price_size_14 = $price_size_13 / 100;
	$price_size_15 = $price_size_14 + $jeans_fabric_price_5;
	
	$price_size_16 = $jeans_fabric_price_6 * 20;
	$price_size_17 = $price_size_16 / 100;
	$price_size_18 = $price_size_17 + $jeans_fabric_price_6;
	
} else if (($jeans_measurement_waist >= '52.5' && $jeans_measurement_waist <= '56') || ($jeans_measurement_hips >= '52.5' && $jeans_measurement_hips <= '56')) {
	
	$price_size_1 = $jeans_fabric_price_1 * 30;
	$price_size_2 = $price_size_1 / 100;
	$price_size_3 = $price_size_2 + $jeans_fabric_price_1;
	
	$price_size_4 = $jeans_fabric_price_2 * 30;
	$price_size_5 = $price_size_4 / 100;
	$price_size_6 = $price_size_5 + $jeans_fabric_price_2;
	
	$price_size_7 = $jeans_fabric_price_3 * 30;
	$price_size_8 = $price_size_7 / 100;
	$price_size_9 = $price_size_8 + $jeans_fabric_price_3;
	
	$price_size_10 = $jeans_fabric_price_4 * 30;
	$price_size_11 = $price_size_10 / 100;
	$price_size_12 = $price_size_11 + $jeans_fabric_price_4;
	
	$price_size_13 = $jeans_fabric_price_5 * 30;
	$price_size_14 = $price_size_13 / 100;
	$price_size_15 = $price_size_14 + $jeans_fabric_price_5;
	
	$price_size_16 = $jeans_fabric_price_6 * 30;
	$price_size_17 = $price_size_16 / 100;
	$price_size_18 = $price_size_17 + $jeans_fabric_price_6;
	
} else if (($jeans_measurement_waist >= '56.5' && $jeans_measurement_waist <= '60') || ($jeans_measurement_hips >= '56.5' && $jeans_measurement_hips <= '60')) {
	
	$price_size_1 = $jeans_fabric_price_1 * 40;
	$price_size_2 = $price_size_1 / 100;
	$price_size_3 = $price_size_2 + $jeans_fabric_price_1;
	
	$price_size_4 = $jeans_fabric_price_2 * 40;
	$price_size_5 = $price_size_4 / 100;
	$price_size_6 = $price_size_5 + $jeans_fabric_price_2;
	
	$price_size_7 = $jeans_fabric_price_3 * 40;
	$price_size_8 = $price_size_7 / 100;
	$price_size_9 = $price_size_8 + $jeans_fabric_price_3;
	
	$price_size_10 = $jeans_fabric_price_4 * 40;
	$price_size_11 = $price_size_10 / 100;
	$price_size_12 = $price_size_11 + $jeans_fabric_price_4;
	
	$price_size_13 = $jeans_fabric_price_5 * 40;
	$price_size_14 = $price_size_13 / 100;
	$price_size_15 = $price_size_14 + $jeans_fabric_price_5;
	
	$price_size_16 = $jeans_fabric_price_6 * 40;
	$price_size_17 = $price_size_16 / 100;
	$price_size_18 = $price_size_17 + $jeans_fabric_price_6;
	
} else if (($jeans_measurement_waist >= '60.5' && $jeans_measurement_waist <= '64') || ($jeans_measurement_hips >= '60.5' && $jeans_measurement_hips <= '64')) {
	
	$price_size_1 = $jeans_fabric_price_1 * 50;
	$price_size_2 = $price_size_1 / 100;
	$price_size_3 = $price_size_2 + $jeans_fabric_price_1;
	
	$price_size_4 = $jeans_fabric_price_2 * 50;
	$price_size_5 = $price_size_4 / 100;
	$price_size_6 = $price_size_5 + $jeans_fabric_price_2;
	
	$price_size_7 = $jeans_fabric_price_3 * 50;
	$price_size_8 = $price_size_7 / 100;
	$price_size_9 = $price_size_8 + $jeans_fabric_price_3;
	
	$price_size_10 = $jeans_fabric_price_4 * 50;
	$price_size_11 = $price_size_10 / 100;
	$price_size_12 = $price_size_11 + $jeans_fabric_price_4;
	
	$price_size_13 = $jeans_fabric_price_5 * 50;
	$price_size_14 = $price_size_13 / 100;
	$price_size_15 = $price_size_14 + $jeans_fabric_price_5;
	
	$price_size_16 = $jeans_fabric_price_6 * 50;
	$price_size_17 = $price_size_16 / 100;
	$price_size_18 = $price_size_17 + $jeans_fabric_price_6;
	
} else if (($jeans_measurement_waist >= '64.5' && $jeans_measurement_waist <= '68') || ($jeans_measurement_hips >= '64.5' && $jeans_measurement_hips <= '68')) {
	
	$price_size_1 = $jeans_fabric_price_1 * 60;
	$price_size_2 = $price_size_1 / 100;
	$price_size_3 = $price_size_2 + $jeans_fabric_price_1;
	
	$price_size_4 = $jeans_fabric_price_2 * 60;
	$price_size_5 = $price_size_4 / 100;
	$price_size_6 = $price_size_5 + $jeans_fabric_price_2;
	
	$price_size_7 = $jeans_fabric_price_3 * 60;
	$price_size_8 = $price_size_7 / 100;
	$price_size_9 = $price_size_8 + $jeans_fabric_price_3;
	
	$price_size_10 = $jeans_fabric_price_4 * 60;
	$price_size_11 = $price_size_10 / 100;
	$price_size_12 = $price_size_11 + $jeans_fabric_price_4;
	
	$price_size_13 = $jeans_fabric_price_5 * 60;
	$price_size_14 = $price_size_13 / 100;
	$price_size_15 = $price_size_14 + $jeans_fabric_price_5;
	
	$price_size_16 = $jeans_fabric_price_6 * 60;
	$price_size_17 = $price_size_16 / 100;
	$price_size_18 = $price_size_17 + $jeans_fabric_price_6;
	
}  else {
	
	$price_size_3 = $jeans_fabric_price_1;
	$price_size_6 = $jeans_fabric_price_2;
	$price_size_9 = $jeans_fabric_price_3;
	$price_size_12 = $jeans_fabric_price_4;
	$price_size_15 = $jeans_fabric_price_5;
	$price_size_18 = $jeans_fabric_price_6;
	
}

$jeans_price_1 = $price_size_3;
$jeans_price_2 = $price_size_6;
$jeans_price_3 = $price_size_9;
$jeans_price_4 = $price_size_12;
$jeans_price_5 = $price_size_15;
$jeans_price_6 = $price_size_18;

/*MY PRICES*/

$sqlmy4 =	" SELECT * FROM admin_fabrics_jeans WHERE fabricno = '$jeans_fabric_no_1' ";
$querymy4 = mysql_db_query($dbname, $sqlmy4) or die("Can't Querymy4");
$rowmy4 = mysql_fetch_array($querymy4);
$fabrics_my_type = $rowmy4["type"];
$fabrics_my_brand = $rowmy4["brand"];

if ($rowmy4["type"] != '') {

$sqlmy01 = " SELECT `fabrictypereseller_".$id_user."` FROM admin_fabrictype WHERE fabrictype_name = '$fabrics_my_type' AND fabrictype_product = 'Jeans' ";
$querymy01 = mysql_db_query($dbname, $sqlmy01) or die("Can't Querymy01");
$rowmy01 = mysql_fetch_array($querymy01);
$jeans_fabric_my_price_1 = $rowmy01["0"];

} else if ($rowmy4["brand"] != '') {
	
$sqlmy02 = " SELECT `fabricbrand_".$id_user."` FROM admin_fabricbrand WHERE fabricbrand_name = '$fabrics_my_brand' AND fabricbrand_product = 'Jeans' ";
$querymy02 = mysql_db_query($dbname, $sqlmy02) or die("Can't Querymy02");
$rowmy02 = mysql_fetch_array($querymy02);	
$jeans_fabric_my_price_1 = $rowmy02["0"];
	
}

$sqlmy5 = " SELECT * FROM admin_fabrics_jeans WHERE fabricno = '$jeans_fabric_no_2' ";
$querymy5 = mysql_db_query($dbname, $sqlmy5) or die("Can't Querymy5");
$rowmy5 = mysql_fetch_array($querymy5);
$fabrics_my_type = $rowmy5["type"];
$fabrics_my_brand = $rowmy5["brand"];

if ($rowmy5["type"] != '') {

$sqlmy03 = " SELECT `fabrictypereseller_".$id_user."` FROM admin_fabrictype WHERE fabrictype_name = '$fabrics_my_type' AND fabrictype_product = 'Jeans' ";
$querymy03 = mysql_db_query($dbname, $sqlmy03) or die("Can't Querymy03");
$rowmy03 = mysql_fetch_array($querymy03);
$jeans_fabric_my_price_2 = $rowmy03["0"];

} else if ($rowmy5["brand"] != '') {
	
$sqlmy04 = " SELECT `fabricbrand_".$id_user."` FROM admin_fabricbrand WHERE fabricbrand_name = '$fabrics_my_brand' AND fabricbrand_product = 'Jeans' ";
$querymy04 = mysql_db_query($dbname, $sqlmy04) or die("Can't Querymy04");
$rowmy04 = mysql_fetch_array($querymy04);	
$jeans_fabric_my_price_2 = $rowmy04["0"];
	
}

$sqlmy6 =	" SELECT * FROM admin_fabrics_jeans WHERE fabricno = '$jeans_fabric_no_3' ";
$querymy6 = mysql_db_query($dbname, $sqlmy6) or die("Can't Querymy6");
$rowmy6 = mysql_fetch_array($querymy6);
$fabrics_my_type = $rowmy6["type"];
$fabrics_my_brand = $rowmy6["brand"];

if ($rowmy6["type"] != '') {

$sqlmy05 = " SELECT `fabrictypereseller_".$id_user."` FROM admin_fabrictype WHERE fabrictype_name = '$fabrics_my_type' AND fabrictype_product = 'Jeans' ";
$querymy05 = mysql_db_query($dbname, $sqlmy05) or die("Can't Querymy05");
$rowmy05 = mysql_fetch_array($querymy05);
$jeans_fabric_my_price_3 = $rowmy05["0"];

} else if ($rowmy6["brand"] != '') {
	
$sqlmy06 = " SELECT `fabricbrand_".$id_user."` FROM admin_fabricbrand WHERE fabricbrand_name = '$fabrics_my_brand' AND fabricbrand_product = 'Jeans' ";
$querymy06 = mysql_db_query($dbname, $sqlmy06) or die("Can't Querymy06");
$rowmy06 = mysql_fetch_array($querymy06);	
$jeans_fabric_my_price_3 = $rowmy06["0"];
	
}

$sqlmy7 = " SELECT * FROM admin_fabrics_jeans WHERE fabricno = '$jeans_fabric_no_4' ";
$querymy7 = mysql_db_query($dbname, $sqlmy7) or die("Can't Querymy7");
$rowmy7 = mysql_fetch_array($querymy7);
$fabrics_my_type = $rowmy7["type"];
$fabrics_my_brand = $rowmy7["brand"];

if ($rowmy7["type"] != '') {

$sqlmy07 = " SELECT `fabrictypereseller_".$id_user."` FROM admin_fabrictype WHERE fabrictype_name = '$fabrics_my_type' AND fabrictype_product = 'Jeans' ";
$querymy07 = mysql_db_query($dbname, $sqlmy07) or die("Can't Querymy07");
$rowmy07 = mysql_fetch_array($querymy07);
$jeans_fabric_my_price_4 = $rowmy07["0"];

} else if ($rowmy7["brand"] != '') {
	
$sqlmy08 = " SELECT `fabricbrand_".$id_user."` FROM admin_fabricbrand WHERE fabricbrand_name = '$fabrics_my_brand' AND fabricbrand_product = 'Jeans' ";
$querymy08 = mysql_db_query($dbname, $sqlmy08) or die("Can't Querymy08");
$rowmy08 = mysql_fetch_array($querymy08);	
$jeans_fabric_my_price_4 = $rowmy08["0"];
	
}

$sqlmy8 = " SELECT * FROM admin_fabrics_jeans WHERE fabricno = '$jeans_fabric_no_5' ";
$querymy8 = mysql_db_query($dbname, $sqlmy8) or die("Can't Querymy8");
$rowmy8 = mysql_fetch_array($querymy8);
$fabrics_my_type = $rowmy8["type"];
$fabrics_my_brand = $rowmy8["brand"];

if ($rowmy8["type"] != '') {

$sqlmy09 = " SELECT `fabrictypereseller_".$id_user."` FROM admin_fabrictype WHERE fabrictype_name = '$fabrics_my_type' AND fabrictype_product = 'Jeans' ";
$querymy09 = mysql_db_query($dbname, $sqlmy09) or die("Can't Querymy09");
$rowmy09 = mysql_fetch_array($querymy09);
$jeans_fabric_my_price_5 = $rowmy09["0"];

} else if ($rowmy8["brand"] != '') {
	
$sqlmy010 = " SELECT `fabricbrand_".$id_user."` FROM admin_fabricbrand WHERE fabricbrand_name = '$fabrics_my_brand' AND fabricbrand_product = 'Jeans' ";
$querymy010 = mysql_db_query($dbname, $sqlmy010) or die("Can't Querymy010");
$rowmy010 = mysql_fetch_array($querymy010);	
$jeans_fabric_my_price_5 = $rowmy010["0"];
	
}

$sqlmy9 = " SELECT * FROM admin_fabrics_jeans WHERE fabricno = '$jeans_fabric_no_6' ";
$querymy9 = mysql_db_query($dbname, $sqlmy9) or die("Can't Querymy9");
$rowmy9 = mysql_fetch_array($querymy9);
$fabrics_my_type = $rowmy9["type"];
$fabrics_my_brand = $rowmy9["brand"];

if ($rowmy9["type"] != '') {

$sqlmy011 = " SELECT `fabrictypereseller_".$id_user."` FROM admin_fabrictype WHERE fabrictype_name = '$fabrics_my_type' AND fabrictype_product = 'Jeans' ";
$querymy011 = mysql_db_query($dbname, $sqlmy011) or die("Can't Querymy011");
$rowmy011 = mysql_fetch_array($querymy011);
$jeans_fabric_my_price_6 = $rowmy011["0"];

} else if ($rowmy9["brand"] != '') {
	
$sqlmy012 = " SELECT `fabricbrand_".$id_user."` FROM admin_fabricbrand WHERE fabricbrand_name = '$fabrics_my_brand' AND fabricbrand_product = 'Jeans' ";
$querymy012 = mysql_db_query($dbname, $sqlmy012) or die("Can't Querymy012");
$rowmy012 = mysql_fetch_array($querymy012);	
$jeans_fabric_my_price_6 = $rowmy012["0"];
	
}

/*OTHER PRICING PARAMETERS*/
$jeans_measurement_waist = $_POST["jeans_measurement_waist"];
$jeans_measurement_hips = $_POST["jeans_measurement_hips"];

if (($jeans_measurement_waist >= '50' && $jeans_measurement_waist <= '52') || ($jeans_measurement_hips >= '50' && $jeans_measurement_hips <= '52')) {
	
	$price_my_size_1 = $jeans_fabric_my_price_1 * 20;
	$price_my_size_2 = $price_my_size_1 / 100;
	$price_my_size_3 = $price_my_size_2 + $jeans_fabric_my_price_1;
	
	$price_my_size_4 = $jeans_fabric_my_price_2 * 20;
	$price_my_size_5 = $price_my_size_4 / 100;
	$price_my_size_6 = $price_my_size_5 + $jeans_fabric_my_price_2;
	
	$price_my_size_7 = $jeans_fabric_my_price_3 * 20;
	$price_my_size_8 = $price_my_size_7 / 100;
	$price_my_size_9 = $price_my_size_8 + $jeans_fabric_my_price_3;
	
	$price_my_size_10 = $jeans_fabric_my_price_4 * 20;
	$price_my_size_11 = $price_my_size_10 / 100;
	$price_my_size_12 = $price_my_size_11 + $jeans_fabric_my_price_4;
	
	$price_my_size_13 = $jeans_fabric_my_price_5 * 20;
	$price_my_size_14 = $price_my_size_13 / 100;
	$price_my_size_15 = $price_my_size_14 + $jeans_fabric_my_price_5;
	
	$price_my_size_16 = $jeans_fabric_my_price_6 * 20;
	$price_my_size_17 = $price_my_size_16 / 100;
	$price_my_size_18 = $price_my_size_17 + $jeans_fabric_my_price_6;
	
} else if (($jeans_measurement_waist >= '52.5' && $jeans_measurement_waist <= '56') || ($jeans_measurement_hips >= '52.5' && $jeans_measurement_hips <= '56')) {
	
	$price_my_size_1 = $jeans_fabric_my_price_1 * 30;
	$price_my_size_2 = $price_my_size_1 / 100;
	$price_my_size_3 = $price_my_size_2 + $jeans_fabric_my_price_1;
	
	$price_my_size_4 = $jeans_fabric_my_price_2 * 30;
	$price_my_size_5 = $price_my_size_4 / 100;
	$price_my_size_6 = $price_my_size_5 + $jeans_fabric_my_price_2;
	
	$price_my_size_7 = $jeans_fabric_my_price_3 * 30;
	$price_my_size_8 = $price_my_size_7 / 100;
	$price_my_size_9 = $price_my_size_8 + $jeans_fabric_my_price_3;
	
	$price_my_size_10 = $jeans_fabri_myc_price_4 * 30;
	$price_my_size_11 = $price_my_size_10 / 100;
	$price_my_size_12 = $price_my_size_11 + $jeans_fabric_my_price_4;
	
	$price_my_size_13 = $jeans_fabric_my_price_5 * 30;
	$price_my_size_14 = $price_my_size_13 / 100;
	$price_my_size_15 = $price_my_size_14 + $jeans_fabric_my_price_5;
	
	$price_my_size_16 = $jeans_fabric_my_price_6 * 30;
	$price_my_size_17 = $price_my_size_16 / 100;
	$price_my_size_18 = $price_my_size_17 + $jeans_fabric_my_price_6;
	
} else if (($jeans_measurement_waist >= '56.5' && $jeans_measurement_waist <= '60') || ($jeans_measurement_hips >= '56.5' && $jeans_measurement_hips <= '60')) {
	
	$price_my_size_1 = $jeans_fabric_my_price_1 * 40;
	$price_my_size_2 = $price_my_size_1 / 100;
	$price_my_size_3 = $price_my_size_2 + $jeans_fabric_my_price_1;
	
	$price_my_size_4 = $jeans_fabric_my_price_2 * 40;
	$price_my_size_5 = $price_my_size_4 / 100;
	$price_my_size_6 = $price_my_size_5 + $jeans_fabric_my_price_2;
	
	$price_my_size_7 = $jeans_fabric_my_price_3 * 40;
	$price_my_size_8 = $price_my_size_7 / 100;
	$price_my_size_9 = $price_my_size_8 + $jeans_fabric_my_price_3;
	
	$price_my_size_10 = $jeans_fabric_my_price_4 * 40;
	$price_my_size_11 = $price_my_size_10 / 100;
	$price_my_size_12 = $price_my_size_11 + $jeans_fabric_my_price_4;
	
	$price_my_size_13 = $jeans_fabric_my_price_5 * 40;
	$price_my_size_14 = $price_my_size_13 / 100;
	$price_my_size_15 = $price_my_size_14 + $jeans_fabric_my_price_5;
	
	$price_my_size_16 = $jeans_fabric_my_price_6 * 40;
	$price_my_size_17 = $price_my_size_16 / 100;
	$price_my_size_18 = $price_my_size_17 + $jeans_fabric_my_price_6;
	
} else if (($jeans_measurement_waist >= '60.5' && $jeans_measurement_waist <= '64') || ($jeans_measurement_hips >= '60.5' && $jeans_measurement_hips <= '64')) {
	
	$price_my_size_1 = $jeans_fabric_my_price_1 * 50;
	$price_my_size_2 = $price_my_size_1 / 100;
	$price_my_size_3 = $price_my_size_2 + $jeans_fabric_my_price_1;
	
	$price_my_size_4 = $jeans_fabric_my_price_2 * 50;
	$price_my_size_5 = $price_my_size_4 / 100;
	$price_my_size_6 = $price_my_size_5 + $jeans_fabric_my_price_2;
	
	$price_my_size_7 = $jeans_fabric_my_price_3 * 50;
	$price_my_size_8 = $price_my_size_7 / 100;
	$price_my_size_9 = $price_my_size_8 + $jeans_fabric_my_price_3;
	
	$price_my_size_10 = $jeans_fabric_my_price_4 * 50;
	$price_my_size_11 = $price_my_size_10 / 100;
	$price_my_size_12 = $price_my_size_11 + $jeans_fabric_my_price_4;
	
	$price_my_size_13 = $jeans_fabric_my_price_5 * 50;
	$price_my_size_14 = $price_my_size_13 / 100;
	$price_my_size_15 = $price_my_size_14 + $jeans_fabric_my_price_5;
	
	$price_my_size_16 = $jeans_fabric_my_price_6 * 50;
	$price_my_size_17 = $price_my_size_16 / 100;
	$price_my_size_18 = $price_my_size_17 + $jeans_fabric_my_price_6;
	
} else if (($jeans_measurement_waist >= '64.5' && $jeans_measurement_waist <= '68') || ($jeans_measurement_hips >= '64.5' && $jeans_measurement_hips <= '68')) {
	
	$price_my_size_1 = $jeans_fabric_my_price_1 * 60;
	$price_my_size_2 = $price_my_size_1 / 100;
	$price_my_size_3 = $price_my_size_2 + $jeans_fabric_my_price_1;
	
	$price_my_size_4 = $jeans_fabric_my_price_2 * 60;
	$price_my_size_5 = $price_my_size_4 / 100;
	$price_my_size_6 = $price_my_size_5 + $jeans_fabric_my_price_2;
	
	$price_my_size_7 = $jeans_fabric_my_price_3 * 60;
	$price_my_size_8 = $price_my_size_7 / 100;
	$price_my_size_9 = $price_my_size_8 + $jeans_fabric_my_price_3;
	
	$price_my_size_10 = $jeans_fabric_my_price_4 * 60;
	$price_my_size_11 = $price_my_size_10 / 100;
	$price_my_size_12 = $price_my_size_11 + $jeans_fabric_my_price_4;
	
	$price_my_size_13 = $jeans_fabric_my_price_5 * 60;
	$price_my_size_14 = $price_my_size_13 / 100;
	$price_my_size_15 = $price_my_size_14 + $jeans_fabric_my_price_5;
	
	$price_my_size_16 = $jeans_fabric_my_price_6 * 60;
	$price_my_size_17 = $price_my_size_16 / 100;
	$price_my_size_18 = $price_my_size_17 + $jeans_fabric_my_price_6;
	
}  else {
	
	$price_my_size_3 = $jeans_fabric_my_price_1;
	$price_my_size_6 = $jeans_fabric_my_price_2;
	$price_my_size_9 = $jeans_fabric_my_price_3;
	$price_my_size_12 = $jeans_fabric_my_price_4;
	$price_my_size_15 = $jeans_fabric_my_price_5;
	$price_my_size_18 = $jeans_fabric_my_price_6;
	
}

$jeans_my_price_1 = $price_my_size_3;
$jeans_my_price_2 = $price_my_size_6;
$jeans_my_price_3 = $price_my_size_9;
$jeans_my_price_4 = $price_my_size_12;
$jeans_my_price_5 = $price_my_size_15;
$jeans_my_price_6 = $price_my_size_18;

/*CUSTOMER*/
$jeans_customer_name = $_POST["jeans_customer_name"];
$jeans_order_no = $_POST["jeans_order_no"];
$jeans_order_date = date("m/d/Y");
$jeans_delivery_date = $_POST["jeans_delivery_date"];

/*CUSTOMIZE*/
$jeans_pocketing = $_POST["jeans_pocketing"];
$jeans_front_pocket = $_POST["jeans_front_pocket"];
$jeans_back_pocket = $_POST["jeans_back_pocket"];
$jeans_coin_pocket = $_POST["jeans_coin_pocket"];
$jeans_fly = $_POST["jeans_fly"];
$jeans_embroidery = $_POST["jeans_embroidery"];
$jeans_embroidery_initial_or_name = $_POST["jeans_embroidery_initial_or_name"];
$jeans_embroidery_position = $_POST["jeans_embroidery_position"];
$jeans_leather_patch = $_POST["jeans_leather_patch"];
$jeans_thread = $_POST["jeans_thread"];
$jeans_buttons = $_POST["jeans_buttons"];
$jeans_fitting = $_POST["jeans_fitting"];
$jeans_wash = $_POST["jeans_wash"];

/*MEASUREMENTS*/
$jeans_measurement_sex = $_POST["jeans_measurement_sex"];
$jeans_measurement = $_POST["jeans_measurement"];
$jeans_measurement_crotch = $_POST["jeans_measurement_crotch"];
$jeans_measurement_thighs = $_POST["jeans_measurement_thighs"];
$jeans_measurement_knees = $_POST["jeans_measurement_knees"];
$jeans_measurement_cuffs = $_POST["jeans_measurement_cuffs"];
$jeans_measurement_length_outleg = $_POST["jeans_measurement_length_outleg"];
$jeans_measurement_pants_waist = $_POST["jeans_measurement_pants_waist"];
$jeans_measurement_pants_bottom = $_POST["jeans_measurement_pants_bottom"];
$jeans_body_front = $_POST["jeans_body_front"];
$jeans_body_left = $_POST["jeans_body_left"];
$jeans_body_right = $_POST["jeans_body_right"];
$jeans_body_back = $_POST["jeans_body_back"];
$jeans_remark = $_POST["jeans_remark"];

/*ECT*/
$jeans_date = date("m/d/Y");
$jeans_time = date("H:i:s");
$jeans_ip = $_POST['ip'];
$jeans_status = T;

/*FABRIC 1*/
if ($jeans_fabric_no_1 != "") {

$sql11 = " SELECT MAX(id) FROM customize_order ";
$query11 = mysql_db_query($dbname, $sql11) or die("Can't Query11");
$row11 = mysql_fetch_array($query11);
$id_order = $row11[0] + 1 ;

$sql12 =	" SELECT MAX(product_id) FROM customize_order";
$query12 = mysql_db_query($dbname, $sql12) or die("Can't Query12");
$row12 = mysql_fetch_array($query12);
$product_id = $row12[0] + 1 ;

$sql13 =	" SELECT MAX(id) FROM customize_jeans_design ";
$query13 = mysql_db_query($dbname, $sql13) or die("Can't Query13");
$row13 = mysql_fetch_array($query13);
$id_jeans = $row13[0] + 1 ;

$sql14 = " INSERT INTO customize_order (id, order_id, product_id, order_reseller, order_order_no, order_name_customize, order_my_price, order_price, order_product, order_fabric_no, order_date, order_time, order_ip, order_status) VALUES ('$id_order', '$order_id', '$product_id', '$company_user', '$jeans_order_no', '$jeans_customer_name', '$jeans_my_price_1', '$jeans_price_1', '$order_product', '$jeans_fabric_no_1', '$jeans_date', '$jeans_time', '$jeans_ip', '$jeans_status') ";
$query14 = mysql_query($sql14) or die("Can't Query14");

$sql15 = " INSERT INTO customize_jeans_design (id, order_id, product_id, jeans_customer_name, jeans_order_no, jeans_order_date, jeans_delivery_date, jeans_fabric_no, jeans_pocketing, jeans_front_pocket, jeans_back_pocket, jeans_coin_pocket, jeans_fly, jeans_embroidery, jeans_embroidery_initial_or_name, jeans_embroidery_position, jeans_leather_patch, jeans_thread, jeans_buttons, jeans_fitting, jeans_wash, jeans_date, jeans_time, jeans_ip, jeans_status) VALUES ('$id_jeans', '$order_id', '$product_id', '$jeans_customer_name', '$jeans_order_no', '$jeans_order_date', '$jeans_delivery_date', '$jeans_fabric_no_1', '$jeans_pocketing', '$jeans_front_pocket', '$jeans_back_pocket', '$jeans_coin_pocket', '$jeans_fly', '$jeans_embroidery', '$jeans_embroidery_initial_or_name', '$jeans_embroidery_position', '$jeans_leather_patch', '$jeans_thread', '$jeans_buttons', '$jeans_fitting', '$jeans_wash', '$jeans_date', '$jeans_time', '$jeans_ip', '$jeans_status') ";
$query15 = mysql_query($sql15) or die("Can't Query15");

$sql16 = " INSERT INTO customize_jeans_measurements (id, order_id, product_id, jeans_measurement_sex, jeans_measurement, jeans_measurement_waist, jeans_measurement_hips, jeans_measurement_crotch, jeans_measurement_thighs, jeans_measurement_knees, jeans_measurement_cuffs, jeans_measurement_length_outleg, jeans_measurement_pants_waist, jeans_measurement_pants_bottom, jeans_remark, jeans_date, jeans_time, jeans_ip, jeans_status) VALUES ('$id_jeans', '$order_id', '$product_id', '$jeans_measurement_sex', '$jeans_measurement', '$jeans_measurement_waist', '$jeans_measurement_hips', '$jeans_measurement_crotch', '$jeans_measurement_thighs', '$jeans_measurement_knees', '$jeans_measurement_cuffs', '$jeans_measurement_length_outleg', '$jeans_measurement_pants_waist', '$jeans_measurement_pants_bottom', '$jeans_remark', '$jeans_date', '$jeans_time', '$jeans_ip', '$jeans_status') ";
$query16 = mysql_query($sql16) or die("Can't Query16");

$path = "../../images/body/jeans/front/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['jeans_body_front']['name'];
	$tmp = $_FILES['jeans_body_front']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$jeans_body_front_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$jeans_body_front_pic)){
				
				$sql17 = " UPDATE customize_jeans_measurements SET jeans_body_front = '".$jeans_body_front_pic."', jeans_date = '".$jeans_date."', jeans_time = '".$jeans_time."', jeans_ip = '".$jeans_ip."', jeans_status = '".$jeans_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query17 = mysql_db_query($dbname, $sql17) or die("Can't Query17");
			}
    
	} else {
				$sql17 = " UPDATE customize_jeans_measurements SET jeans_date = '".$jeans_date."', jeans_time = '".$jeans_time."', jeans_ip = '".$jeans_ip."', jeans_status = '".$jeans_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query17 = mysql_db_query($dbname, $sql17) or die("Can't Query17");
			}
	}
	
$path = "../../images/body/jeans/left/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['jeans_body_left']['name'];
	$tmp = $_FILES['jeans_body_left']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$jeans_body_left_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$jeans_body_left_pic)){
				
				$sql18 = " UPDATE customize_jeans_measurements SET jeans_body_left = '".$jeans_body_left_pic."', jeans_date = '".$jeans_date."', jeans_time = '".$jeans_time."', jeans_ip = '".$jeans_ip."', jeans_status = '".$jeans_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query18 = mysql_db_query($dbname, $sql18) or die("Can't Query18");
			}
    
	} else {
				$sql18 = " UPDATE customize_jeans_measurements SET jeans_date = '".$jeans_date."', jeans_time = '".$jeans_time."', jeans_ip = '".$jeans_ip."', jeans_status = '".$jeans_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query18 = mysql_db_query($dbname, $sql18) or die("Can't Query18");
			}
	}
	
$path = "../../images/body/jeans/right/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['jeans_body_right']['name'];
	$tmp = $_FILES['jeans_body_right']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$jeans_body_right_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$jeans_body_right_pic)){
				
				$sql19 = " UPDATE customize_jeans_measurements SET jeans_body_right = '".$jeans_body_right_pic."', jeans_date = '".$jeans_date."', jeans_time = '".$jeans_time."', jeans_ip = '".$jeans_ip."', jeans_status = '".$jeans_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query19 = mysql_db_query($dbname, $sql19) or die("Can't Query19");
			}
    
	} else {
				$sql19 = " UPDATE customize_jeans_measurements SET jeans_date = '".$jeans_date."', jeans_time = '".$jeans_time."', jeans_ip = '".$jeans_ip."', jeans_status = '".$jeans_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query19 = mysql_db_query($dbname, $sql19) or die("Can't Query19");
			}
	}
	
$path = "../../images/body/jeans/back/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['jeans_body_back']['name'];
	$tmp = $_FILES['jeans_body_back']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$jeans_body_back_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$jeans_body_back_pic)){
				
				$sql20 = " UPDATE customize_jeans_measurements SET jeans_body_back = '".$jeans_body_back_pic."', jeans_date = '".$jeans_date."', jeans_time = '".$jeans_time."', jeans_ip = '".$jeans_ip."', jeans_status = '".$jeans_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query20 = mysql_db_query($dbname, $sql20) or die("Can't Query20");
			}
    
	} else {
				$sql20 = " UPDATE customize_jeans_measurements SET jeans_date = '".$jeans_date."', jeans_time = '".$jeans_time."', jeans_ip = '".$jeans_ip."', jeans_status = '".$jeans_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query20 = mysql_db_query($dbname, $sql20) or die("Can't Query20");
			}
	}

} else if ($jeans_fabric_no_1 == "") { }

/*FABRIC 2*/
if ($jeans_fabric_no_2 != "") {

$sql11 = " SELECT MAX(id) FROM customize_order ";
$query11 = mysql_db_query($dbname, $sql11) or die("Can't Query11");
$row11 = mysql_fetch_array($query11);
$id_order = $row11[0] + 1 ;

$sql12 =	" SELECT MAX(product_id) FROM customize_order";
$query12 = mysql_db_query($dbname, $sql12) or die("Can't Query12");
$row12 = mysql_fetch_array($query12);
$product_id = $row12[0] + 1 ;

$sql13 =	" SELECT MAX(id) FROM customize_jeans_design ";
$query13 = mysql_db_query($dbname, $sql13) or die("Can't Query13");
$row13 = mysql_fetch_array($query13);
$id_jeans = $row13[0] + 1 ;

$sql14 = " INSERT INTO customize_order (id, order_id, product_id, order_reseller, order_order_no, order_name_customize, order_my_price, order_price, order_product, order_fabric_no, order_date, order_time, order_ip, order_status) VALUES ('$id_order', '$order_id', '$product_id', '$company_user', '$jeans_order_no', '$jeans_customer_name', '$jeans_my_price_2', '$jeans_price_2', '$order_product', '$jeans_fabric_no_2', '$jeans_date', '$jeans_time', '$jeans_ip', '$jeans_status') ";
$query14 = mysql_query($sql14) or die("Can't Query14");

$sql15 = " INSERT INTO customize_jeans_design (id, order_id, product_id, jeans_customer_name, jeans_order_no, jeans_order_date, jeans_delivery_date, jeans_fabric_no, jeans_pocketing, jeans_front_pocket, jeans_back_pocket, jeans_coin_pocket, jeans_fly, jeans_embroidery, jeans_embroidery_initial_or_name, jeans_embroidery_position, jeans_leather_patch, jeans_thread, jeans_buttons, jeans_fitting, jeans_wash, jeans_date, jeans_time, jeans_ip, jeans_status) VALUES ('$id_jeans', '$order_id', '$product_id', '$jeans_customer_name', '$jeans_order_no', '$jeans_order_date', '$jeans_delivery_date', '$jeans_fabric_no_2', '$jeans_pocketing', '$jeans_front_pocket', '$jeans_back_pocket', '$jeans_coin_pocket', '$jeans_fly', '$jeans_embroidery', '$jeans_embroidery_initial_or_name', '$jeans_embroidery_position', '$jeans_leather_patch', '$jeans_thread', '$jeans_buttons', '$jeans_fitting', '$jeans_wash', '$jeans_date', '$jeans_time', '$jeans_ip', '$jeans_status') ";
$query15 = mysql_query($sql15) or die("Can't Query15");

$sql16 = " INSERT INTO customize_jeans_measurements (id, order_id, product_id, jeans_measurement_sex, jeans_measurement, jeans_measurement_waist, jeans_measurement_hips, jeans_measurement_crotch, jeans_measurement_thighs, jeans_measurement_knees, jeans_measurement_cuffs, jeans_measurement_length_outleg, jeans_measurement_pants_waist, jeans_measurement_pants_bottom, jeans_remark, jeans_date, jeans_time, jeans_ip, jeans_status) VALUES ('$id_jeans', '$order_id', '$product_id', '$jeans_measurement_sex', '$jeans_measurement', '$jeans_measurement_waist', '$jeans_measurement_hips', '$jeans_measurement_crotch', '$jeans_measurement_thighs', '$jeans_measurement_knees', '$jeans_measurement_cuffs', '$jeans_measurement_length_outleg', '$jeans_measurement_pants_waist', '$jeans_measurement_pants_bottom', '$jeans_remark', '$jeans_date', '$jeans_time', '$jeans_ip', '$jeans_status') ";
$query16 = mysql_query($sql16) or die("Can't Query16");

$path = "../../images/body/jeans/front/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['jeans_body_front']['name'];
	$tmp = $_FILES['jeans_body_front']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$jeans_body_front_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$jeans_body_front_pic)){
				
				$sql17 = " UPDATE customize_jeans_measurements SET jeans_body_front = '".$jeans_body_front_pic."', jeans_date = '".$jeans_date."', jeans_time = '".$jeans_time."', jeans_ip = '".$jeans_ip."', jeans_status = '".$jeans_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query17 = mysql_db_query($dbname, $sql17) or die("Can't Query17");
			}
    
	} else {
				$sql17 = " UPDATE customize_jeans_measurements SET jeans_date = '".$jeans_date."', jeans_time = '".$jeans_time."', jeans_ip = '".$jeans_ip."', jeans_status = '".$jeans_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query17 = mysql_db_query($dbname, $sql17) or die("Can't Query17");
			}
	}
	
$path = "../../images/body/jeans/left/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['jeans_body_left']['name'];
	$tmp = $_FILES['jeans_body_left']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$jeans_body_left_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$jeans_body_left_pic)){
				
				$sql18 = " UPDATE customize_jeans_measurements SET jeans_body_left = '".$jeans_body_left_pic."', jeans_date = '".$jeans_date."', jeans_time = '".$jeans_time."', jeans_ip = '".$jeans_ip."', jeans_status = '".$jeans_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query18 = mysql_db_query($dbname, $sql18) or die("Can't Query18");
			}
    
	} else {
				$sql18 = " UPDATE customize_jeans_measurements SET jeans_date = '".$jeans_date."', jeans_time = '".$jeans_time."', jeans_ip = '".$jeans_ip."', jeans_status = '".$jeans_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query18 = mysql_db_query($dbname, $sql18) or die("Can't Query18");
			}
	}
	
$path = "../../images/body/jeans/right/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['jeans_body_right']['name'];
	$tmp = $_FILES['jeans_body_right']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$jeans_body_right_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$jeans_body_right_pic)){
				
				$sql19 = " UPDATE customize_jeans_measurements SET jeans_body_right = '".$jeans_body_right_pic."', jeans_date = '".$jeans_date."', jeans_time = '".$jeans_time."', jeans_ip = '".$jeans_ip."', jeans_status = '".$jeans_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query19 = mysql_db_query($dbname, $sql19) or die("Can't Query19");
			}
    
	} else {
				$sql19 = " UPDATE customize_jeans_measurements SET jeans_date = '".$jeans_date."', jeans_time = '".$jeans_time."', jeans_ip = '".$jeans_ip."', jeans_status = '".$jeans_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query19 = mysql_db_query($dbname, $sql19) or die("Can't Query19");
			}
	}
	
$path = "../../images/body/jeans/back/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['jeans_body_back']['name'];
	$tmp = $_FILES['jeans_body_back']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$jeans_body_back_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$jeans_body_back_pic)){
				
				$sql20 = " UPDATE customize_jeans_measurements SET jeans_body_back = '".$jeans_body_back_pic."', jeans_date = '".$jeans_date."', jeans_time = '".$jeans_time."', jeans_ip = '".$jeans_ip."', jeans_status = '".$jeans_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query20 = mysql_db_query($dbname, $sql20) or die("Can't Query20");
			}
    
	} else {
				$sql20 = " UPDATE customize_jeans_measurements SET jeans_date = '".$jeans_date."', jeans_time = '".$jeans_time."', jeans_ip = '".$jeans_ip."', jeans_status = '".$jeans_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query20 = mysql_db_query($dbname, $sql20) or die("Can't Query20");
			}
	}

} else if ($jeans_fabric_no_2 == "") { }	

/*FABRIC 3*/
if ($jeans_fabric_no_3 != "") {

$sql11 = " SELECT MAX(id) FROM customize_order ";
$query11 = mysql_db_query($dbname, $sql11) or die("Can't Query11");
$row11 = mysql_fetch_array($query11);
$id_order = $row11[0] + 1 ;

$sql12 =	" SELECT MAX(product_id) FROM customize_order";
$query12 = mysql_db_query($dbname, $sql12) or die("Can't Query12");
$row12 = mysql_fetch_array($query12);
$product_id = $row12[0] + 1 ;

$sql13 =	" SELECT MAX(id) FROM customize_jeans_design ";
$query13 = mysql_db_query($dbname, $sql13) or die("Can't Query13");
$row13 = mysql_fetch_array($query13);
$id_jeans = $row13[0] + 1 ;

$sql14 = " INSERT INTO customize_order (id, order_id, product_id, order_reseller, order_order_no, order_name_customize, order_my_price, order_price, order_product, order_fabric_no, order_date, order_time, order_ip, order_status) VALUES ('$id_order', '$order_id', '$product_id', '$company_user', '$jeans_order_no', '$jeans_customer_name', '$jeans_my_price_3', '$jeans_price_3', '$order_product', '$jeans_fabric_no_3', '$jeans_date', '$jeans_time', '$jeans_ip', '$jeans_status') ";
$query14 = mysql_query($sql14) or die("Can't Query14");

$sql15 = " INSERT INTO customize_jeans_design (id, order_id, product_id, jeans_customer_name, jeans_order_no, jeans_order_date, jeans_delivery_date, jeans_fabric_no, jeans_pocketing, jeans_front_pocket, jeans_back_pocket, jeans_coin_pocket, jeans_fly, jeans_embroidery, jeans_embroidery_initial_or_name, jeans_embroidery_position, jeans_leather_patch, jeans_thread, jeans_buttons, jeans_fitting, jeans_wash, jeans_date, jeans_time, jeans_ip, jeans_status) VALUES ('$id_jeans', '$order_id', '$product_id', '$jeans_customer_name', '$jeans_order_no', '$jeans_order_date', '$jeans_delivery_date', '$jeans_fabric_no_3', '$jeans_pocketing', '$jeans_front_pocket', '$jeans_back_pocket', '$jeans_coin_pocket', '$jeans_fly', '$jeans_embroidery', '$jeans_embroidery_initial_or_name', '$jeans_embroidery_position', '$jeans_leather_patch', '$jeans_thread', '$jeans_buttons', '$jeans_fitting', '$jeans_wash', '$jeans_date', '$jeans_time', '$jeans_ip', '$jeans_status') ";
$query15 = mysql_query($sql15) or die("Can't Query15");

$sql16 = " INSERT INTO customize_jeans_measurements (id, order_id, product_id, jeans_measurement_sex, jeans_measurement, jeans_measurement_waist, jeans_measurement_hips, jeans_measurement_crotch, jeans_measurement_thighs, jeans_measurement_knees, jeans_measurement_cuffs, jeans_measurement_length_outleg, jeans_measurement_pants_waist, jeans_measurement_pants_bottom, jeans_remark, jeans_date, jeans_time, jeans_ip, jeans_status) VALUES ('$id_jeans', '$order_id', '$product_id', '$jeans_measurement_sex', '$jeans_measurement', '$jeans_measurement_waist', '$jeans_measurement_hips', '$jeans_measurement_crotch', '$jeans_measurement_thighs', '$jeans_measurement_knees', '$jeans_measurement_cuffs', '$jeans_measurement_length_outleg', '$jeans_measurement_pants_waist', '$jeans_measurement_pants_bottom', '$jeans_remark', '$jeans_date', '$jeans_time', '$jeans_ip', '$jeans_status') ";
$query16 = mysql_query($sql16) or die("Can't Query16");

$path = "../../images/body/jeans/front/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['jeans_body_front']['name'];
	$tmp = $_FILES['jeans_body_front']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$jeans_body_front_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$jeans_body_front_pic)){
				
				$sql17 = " UPDATE customize_jeans_measurements SET jeans_body_front = '".$jeans_body_front_pic."', jeans_date = '".$jeans_date."', jeans_time = '".$jeans_time."', jeans_ip = '".$jeans_ip."', jeans_status = '".$jeans_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query17 = mysql_db_query($dbname, $sql17) or die("Can't Query17");
			}
    
	} else {
				$sql17 = " UPDATE customize_jeans_measurements SET jeans_date = '".$jeans_date."', jeans_time = '".$jeans_time."', jeans_ip = '".$jeans_ip."', jeans_status = '".$jeans_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query17 = mysql_db_query($dbname, $sql17) or die("Can't Query17");
			}
	}
	
$path = "../../images/body/jeans/left/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['jeans_body_left']['name'];
	$tmp = $_FILES['jeans_body_left']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$jeans_body_left_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$jeans_body_left_pic)){
				
				$sql18 = " UPDATE customize_jeans_measurements SET jeans_body_left = '".$jeans_body_left_pic."', jeans_date = '".$jeans_date."', jeans_time = '".$jeans_time."', jeans_ip = '".$jeans_ip."', jeans_status = '".$jeans_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query18 = mysql_db_query($dbname, $sql18) or die("Can't Query18");
			}
    
	} else {
				$sql18 = " UPDATE customize_jeans_measurements SET jeans_date = '".$jeans_date."', jeans_time = '".$jeans_time."', jeans_ip = '".$jeans_ip."', jeans_status = '".$jeans_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query18 = mysql_db_query($dbname, $sql18) or die("Can't Query18");
			}
	}
	
$path = "../../images/body/jeans/right/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['jeans_body_right']['name'];
	$tmp = $_FILES['jeans_body_right']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$jeans_body_right_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$jeans_body_right_pic)){
				
				$sql19 = " UPDATE customize_jeans_measurements SET jeans_body_right = '".$jeans_body_right_pic."', jeans_date = '".$jeans_date."', jeans_time = '".$jeans_time."', jeans_ip = '".$jeans_ip."', jeans_status = '".$jeans_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query19 = mysql_db_query($dbname, $sql19) or die("Can't Query19");
			}
    
	} else {
				$sql19 = " UPDATE customize_jeans_measurements SET jeans_date = '".$jeans_date."', jeans_time = '".$jeans_time."', jeans_ip = '".$jeans_ip."', jeans_status = '".$jeans_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query19 = mysql_db_query($dbname, $sql19) or die("Can't Query19");
			}
	}
	
$path = "../../images/body/jeans/back/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['jeans_body_back']['name'];
	$tmp = $_FILES['jeans_body_back']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$jeans_body_back_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$jeans_body_back_pic)){
				
				$sql20 = " UPDATE customize_jeans_measurements SET jeans_body_back = '".$jeans_body_back_pic."', jeans_date = '".$jeans_date."', jeans_time = '".$jeans_time."', jeans_ip = '".$jeans_ip."', jeans_status = '".$jeans_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query20 = mysql_db_query($dbname, $sql20) or die("Can't Query20");
			}
    
	} else {
				$sql20 = " UPDATE customize_jeans_measurements SET jeans_date = '".$jeans_date."', jeans_time = '".$jeans_time."', jeans_ip = '".$jeans_ip."', jeans_status = '".$jeans_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query20 = mysql_db_query($dbname, $sql20) or die("Can't Query20");
			}
	}

} else if ($jeans_fabric_no_3 == "") { }

/*FABRIC 4*/
if ($jeans_fabric_no_4 != "") {

$sql11 = " SELECT MAX(id) FROM customize_order ";
$query11 = mysql_db_query($dbname, $sql11) or die("Can't Query11");
$row11 = mysql_fetch_array($query11);
$id_order = $row11[0] + 1 ;

$sql12 =	" SELECT MAX(product_id) FROM customize_order";
$query12 = mysql_db_query($dbname, $sql12) or die("Can't Query12");
$row12 = mysql_fetch_array($query12);
$product_id = $row12[0] + 1 ;

$sql13 =	" SELECT MAX(id) FROM customize_jeans_design ";
$query13 = mysql_db_query($dbname, $sql13) or die("Can't Query13");
$row13 = mysql_fetch_array($query13);
$id_jeans = $row13[0] + 1 ;

$sql14 = " INSERT INTO customize_order (id, order_id, product_id, order_reseller, order_order_no, order_name_customize, order_my_price, order_price, order_product, order_fabric_no, order_date, order_time, order_ip, order_status) VALUES ('$id_order', '$order_id', '$product_id', '$company_user', '$jeans_order_no', '$jeans_customer_name', '$jeans_my_price_4', '$jeans_price_4', '$order_product', '$jeans_fabric_no_4', '$jeans_date', '$jeans_time', '$jeans_ip', '$jeans_status') ";
$query14 = mysql_query($sql14) or die("Can't Query14");

$sql15 = " INSERT INTO customize_jeans_design (id, order_id, product_id, jeans_customer_name, jeans_order_no, jeans_order_date, jeans_delivery_date, jeans_fabric_no, jeans_pocketing, jeans_front_pocket, jeans_back_pocket, jeans_coin_pocket, jeans_fly, jeans_embroidery, jeans_embroidery_initial_or_name, jeans_embroidery_position, jeans_leather_patch, jeans_thread, jeans_buttons, jeans_fitting, jeans_wash, jeans_date, jeans_time, jeans_ip, jeans_status) VALUES ('$id_jeans', '$order_id', '$product_id', '$jeans_customer_name', '$jeans_order_no', '$jeans_order_date', '$jeans_delivery_date', '$jeans_fabric_no_4', '$jeans_pocketing', '$jeans_front_pocket', '$jeans_back_pocket', '$jeans_coin_pocket', '$jeans_fly', '$jeans_embroidery', '$jeans_embroidery_initial_or_name', '$jeans_embroidery_position', '$jeans_leather_patch', '$jeans_thread', '$jeans_buttons', '$jeans_fitting', '$jeans_wash', '$jeans_date', '$jeans_time', '$jeans_ip', '$jeans_status') ";
$query15 = mysql_query($sql15) or die("Can't Query15");

$sql16 = " INSERT INTO customize_jeans_measurements (id, order_id, product_id, jeans_measurement_sex, jeans_measurement, jeans_measurement_waist, jeans_measurement_hips, jeans_measurement_crotch, jeans_measurement_thighs, jeans_measurement_knees, jeans_measurement_cuffs, jeans_measurement_length_outleg, jeans_measurement_pants_waist, jeans_measurement_pants_bottom, jeans_remark, jeans_date, jeans_time, jeans_ip, jeans_status) VALUES ('$id_jeans', '$order_id', '$product_id', '$jeans_measurement_sex', '$jeans_measurement', '$jeans_measurement_waist', '$jeans_measurement_hips', '$jeans_measurement_crotch', '$jeans_measurement_thighs', '$jeans_measurement_knees', '$jeans_measurement_cuffs', '$jeans_measurement_length_outleg', '$jeans_measurement_pants_waist', '$jeans_measurement_pants_bottom', '$jeans_remark', '$jeans_date', '$jeans_time', '$jeans_ip', '$jeans_status') ";
$query16 = mysql_query($sql16) or die("Can't Query16");

$path = "../../images/body/jeans/front/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['jeans_body_front']['name'];
	$tmp = $_FILES['jeans_body_front']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$jeans_body_front_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$jeans_body_front_pic)){
				
				$sql17 = " UPDATE customize_jeans_measurements SET jeans_body_front = '".$jeans_body_front_pic."', jeans_date = '".$jeans_date."', jeans_time = '".$jeans_time."', jeans_ip = '".$jeans_ip."', jeans_status = '".$jeans_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query17 = mysql_db_query($dbname, $sql17) or die("Can't Query17");
			}
    
	} else {
				$sql17 = " UPDATE customize_jeans_measurements SET jeans_date = '".$jeans_date."', jeans_time = '".$jeans_time."', jeans_ip = '".$jeans_ip."', jeans_status = '".$jeans_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query17 = mysql_db_query($dbname, $sql17) or die("Can't Query17");
			}
	}
	
$path = "../../images/body/jeans/left/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['jeans_body_left']['name'];
	$tmp = $_FILES['jeans_body_left']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$jeans_body_left_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$jeans_body_left_pic)){
				
				$sql18 = " UPDATE customize_jeans_measurements SET jeans_body_left = '".$jeans_body_left_pic."', jeans_date = '".$jeans_date."', jeans_time = '".$jeans_time."', jeans_ip = '".$jeans_ip."', jeans_status = '".$jeans_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query18 = mysql_db_query($dbname, $sql18) or die("Can't Query18");
			}
    
	} else {
				$sql18 = " UPDATE customize_jeans_measurements SET jeans_date = '".$jeans_date."', jeans_time = '".$jeans_time."', jeans_ip = '".$jeans_ip."', jeans_status = '".$jeans_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query18 = mysql_db_query($dbname, $sql18) or die("Can't Query18");
			}
	}
	
$path = "../../images/body/jeans/right/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['jeans_body_right']['name'];
	$tmp = $_FILES['jeans_body_right']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$jeans_body_right_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$jeans_body_right_pic)){
				
				$sql19 = " UPDATE customize_jeans_measurements SET jeans_body_right = '".$jeans_body_right_pic."', jeans_date = '".$jeans_date."', jeans_time = '".$jeans_time."', jeans_ip = '".$jeans_ip."', jeans_status = '".$jeans_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query19 = mysql_db_query($dbname, $sql19) or die("Can't Query19");
			}
    
	} else {
				$sql19 = " UPDATE customize_jeans_measurements SET jeans_date = '".$jeans_date."', jeans_time = '".$jeans_time."', jeans_ip = '".$jeans_ip."', jeans_status = '".$jeans_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query19 = mysql_db_query($dbname, $sql19) or die("Can't Query19");
			}
	}
	
$path = "../../images/body/jeans/back/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['jeans_body_back']['name'];
	$tmp = $_FILES['jeans_body_back']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$jeans_body_back_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$jeans_body_back_pic)){
				
				$sql20 = " UPDATE customize_jeans_measurements SET jeans_body_back = '".$jeans_body_back_pic."', jeans_date = '".$jeans_date."', jeans_time = '".$jeans_time."', jeans_ip = '".$jeans_ip."', jeans_status = '".$jeans_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query20 = mysql_db_query($dbname, $sql20) or die("Can't Query20");
			}
    
	} else {
				$sql20 = " UPDATE customize_jeans_measurements SET jeans_date = '".$jeans_date."', jeans_time = '".$jeans_time."', jeans_ip = '".$jeans_ip."', jeans_status = '".$jeans_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query20 = mysql_db_query($dbname, $sql20) or die("Can't Query20");
			}
	}

} else if ($jeans_fabric_no_4 == "") { }

/*FABRIC 5*/
if ($jeans_fabric_no_5 != "") {
	
$sql11 = " SELECT MAX(id) FROM customize_order ";
$query11 = mysql_db_query($dbname, $sql11) or die("Can't Query11");
$row11 = mysql_fetch_array($query11);
$id_order = $row11[0] + 1 ;

$sql12 =	" SELECT MAX(product_id) FROM customize_order";
$query12 = mysql_db_query($dbname, $sql12) or die("Can't Query12");
$row12 = mysql_fetch_array($query12);
$product_id = $row12[0] + 1 ;

$sql13 =	" SELECT MAX(id) FROM customize_jeans_design ";
$query13 = mysql_db_query($dbname, $sql13) or die("Can't Query13");
$row13 = mysql_fetch_array($query13);
$id_jeans = $row13[0] + 1 ;

$sql14 = " INSERT INTO customize_order (id, order_id, product_id, order_reseller, order_order_no, order_name_customize, order_my_price, order_price, order_product, order_fabric_no, order_date, order_time, order_ip, order_status) VALUES ('$id_order', '$order_id', '$product_id', '$company_user', '$jeans_order_no', '$jeans_customer_name', '$jeans_my_price_5', '$jeans_price_5', '$order_product', '$jeans_fabric_no_5', '$jeans_date', '$jeans_time', '$jeans_ip', '$jeans_status') ";
$query14 = mysql_query($sql14) or die("Can't Query14");

$sql15 = " INSERT INTO customize_jeans_design (id, order_id, product_id, jeans_customer_name, jeans_order_no, jeans_order_date, jeans_delivery_date, jeans_fabric_no, jeans_pocketing, jeans_front_pocket, jeans_back_pocket, jeans_coin_pocket, jeans_fly, jeans_embroidery, jeans_embroidery_initial_or_name, jeans_embroidery_position, jeans_leather_patch, jeans_thread, jeans_buttons, jeans_fitting, jeans_wash, jeans_date, jeans_time, jeans_ip, jeans_status) VALUES ('$id_jeans', '$order_id', '$product_id', '$jeans_customer_name', '$jeans_order_no', '$jeans_order_date', '$jeans_delivery_date', '$jeans_fabric_no_5', '$jeans_pocketing', '$jeans_front_pocket', '$jeans_back_pocket', '$jeans_coin_pocket', '$jeans_fly', '$jeans_embroidery', '$jeans_embroidery_initial_or_name', '$jeans_embroidery_position', '$jeans_leather_patch', '$jeans_thread', '$jeans_buttons', '$jeans_fitting', '$jeans_wash', '$jeans_date', '$jeans_time', '$jeans_ip', '$jeans_status') ";
$query15 = mysql_query($sql15) or die("Can't Query15");

$sql16 = " INSERT INTO customize_jeans_measurements (id, order_id, product_id, jeans_measurement_sex, jeans_measurement, jeans_measurement_waist, jeans_measurement_hips, jeans_measurement_crotch, jeans_measurement_thighs, jeans_measurement_knees, jeans_measurement_cuffs, jeans_measurement_length_outleg, jeans_measurement_pants_waist, jeans_measurement_pants_bottom, jeans_remark, jeans_date, jeans_time, jeans_ip, jeans_status) VALUES ('$id_jeans', '$order_id', '$product_id', '$jeans_measurement_sex', '$jeans_measurement', '$jeans_measurement_waist', '$jeans_measurement_hips', '$jeans_measurement_crotch', '$jeans_measurement_thighs', '$jeans_measurement_knees', '$jeans_measurement_cuffs', '$jeans_measurement_length_outleg', '$jeans_measurement_pants_waist', '$jeans_measurement_pants_bottom', '$jeans_remark', '$jeans_date', '$jeans_time', '$jeans_ip', '$jeans_status') ";
$query16 = mysql_query($sql16) or die("Can't Query16");

$path = "../../images/body/jeans/front/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['jeans_body_front']['name'];
	$tmp = $_FILES['jeans_body_front']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$jeans_body_front_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$jeans_body_front_pic)){
				
				$sql17 = " UPDATE customize_jeans_measurements SET jeans_body_front = '".$jeans_body_front_pic."', jeans_date = '".$jeans_date."', jeans_time = '".$jeans_time."', jeans_ip = '".$jeans_ip."', jeans_status = '".$jeans_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query17 = mysql_db_query($dbname, $sql17) or die("Can't Query17");
			}
    
	} else {
				$sql17 = " UPDATE customize_jeans_measurements SET jeans_date = '".$jeans_date."', jeans_time = '".$jeans_time."', jeans_ip = '".$jeans_ip."', jeans_status = '".$jeans_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query17 = mysql_db_query($dbname, $sql17) or die("Can't Query17");
			}
	}
	
$path = "../../images/body/jeans/left/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['jeans_body_left']['name'];
	$tmp = $_FILES['jeans_body_left']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$jeans_body_left_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$jeans_body_left_pic)){
				
				$sql18 = " UPDATE customize_jeans_measurements SET jeans_body_left = '".$jeans_body_left_pic."', jeans_date = '".$jeans_date."', jeans_time = '".$jeans_time."', jeans_ip = '".$jeans_ip."', jeans_status = '".$jeans_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query18 = mysql_db_query($dbname, $sql18) or die("Can't Query18");
			}
    
	} else {
				$sql18 = " UPDATE customize_jeans_measurements SET jeans_date = '".$jeans_date."', jeans_time = '".$jeans_time."', jeans_ip = '".$jeans_ip."', jeans_status = '".$jeans_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query18 = mysql_db_query($dbname, $sql18) or die("Can't Query18");
			}
	}
	
$path = "../../images/body/jeans/right/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['jeans_body_right']['name'];
	$tmp = $_FILES['jeans_body_right']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$jeans_body_right_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$jeans_body_right_pic)){
				
				$sql19 = " UPDATE customize_jeans_measurements SET jeans_body_right = '".$jeans_body_right_pic."', jeans_date = '".$jeans_date."', jeans_time = '".$jeans_time."', jeans_ip = '".$jeans_ip."', jeans_status = '".$jeans_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query19 = mysql_db_query($dbname, $sql19) or die("Can't Query19");
			}
    
	} else {
				$sql19 = " UPDATE customize_jeans_measurements SET jeans_date = '".$jeans_date."', jeans_time = '".$jeans_time."', jeans_ip = '".$jeans_ip."', jeans_status = '".$jeans_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query19 = mysql_db_query($dbname, $sql19) or die("Can't Query19");
			}
	}
	
$path = "../../images/body/jeans/back/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['jeans_body_back']['name'];
	$tmp = $_FILES['jeans_body_back']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$jeans_body_back_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$jeans_body_back_pic)){
				
				$sql20 = " UPDATE customize_jeans_measurements SET jeans_body_back = '".$jeans_body_back_pic."', jeans_date = '".$jeans_date."', jeans_time = '".$jeans_time."', jeans_ip = '".$jeans_ip."', jeans_status = '".$jeans_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query20 = mysql_db_query($dbname, $sql20) or die("Can't Query20");
			}
    
	} else {
				$sql20 = " UPDATE customize_jeans_measurements SET jeans_date = '".$jeans_date."', jeans_time = '".$jeans_time."', jeans_ip = '".$jeans_ip."', jeans_status = '".$jeans_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query20 = mysql_db_query($dbname, $sql20) or die("Can't Query20");
			}
	}

} else if ($jeans_fabric_no_5 == "") { }

/*FABRIC 6*/
if ($jeans_fabric_no_6 != "") {

$sql11 = " SELECT MAX(id) FROM customize_order ";
$query11 = mysql_db_query($dbname, $sql11) or die("Can't Query11");
$row11 = mysql_fetch_array($query11);
$id_order = $row11[0] + 1 ;

$sql12 =	" SELECT MAX(product_id) FROM customize_order";
$query12 = mysql_db_query($dbname, $sql12) or die("Can't Query12");
$row12 = mysql_fetch_array($query12);
$product_id = $row12[0] + 1 ;

$sql13 =	" SELECT MAX(id) FROM customize_jeans_design ";
$query13 = mysql_db_query($dbname, $sql13) or die("Can't Query13");
$row13 = mysql_fetch_array($query13);
$id_jeans = $row13[0] + 1 ;

$sql14 = " INSERT INTO customize_order (id, order_id, product_id, order_reseller, order_order_no, order_name_customize, order_my_price, order_price, order_product, order_fabric_no, order_date, order_time, order_ip, order_status) VALUES ('$id_order', '$order_id', '$product_id', '$company_user', '$jeans_order_no', '$jeans_customer_name', '$jeans_my_price_6', '$jeans_price_6', '$order_product', '$jeans_fabric_no_6', '$jeans_date', '$jeans_time', '$jeans_ip', '$jeans_status') ";
$query14 = mysql_query($sql14) or die("Can't Query14");

$sql15 = " INSERT INTO customize_jeans_design (id, order_id, product_id, jeans_customer_name, jeans_order_no, jeans_order_date, jeans_delivery_date, jeans_fabric_no, jeans_pocketing, jeans_front_pocket, jeans_back_pocket, jeans_coin_pocket, jeans_fly, jeans_embroidery, jeans_embroidery_initial_or_name, jeans_embroidery_position, jeans_leather_patch, jeans_thread, jeans_buttons, jeans_fitting, jeans_wash, jeans_date, jeans_time, jeans_ip, jeans_status) VALUES ('$id_jeans', '$order_id', '$product_id', '$jeans_customer_name', '$jeans_order_no', '$jeans_order_date', '$jeans_delivery_date', '$jeans_fabric_no_6', '$jeans_pocketing', '$jeans_front_pocket', '$jeans_back_pocket', '$jeans_coin_pocket', '$jeans_fly', '$jeans_embroidery', '$jeans_embroidery_initial_or_name', '$jeans_embroidery_position', '$jeans_leather_patch', '$jeans_thread', '$jeans_buttons', '$jeans_fitting', '$jeans_wash', '$jeans_date', '$jeans_time', '$jeans_ip', '$jeans_status') ";
$query15 = mysql_query($sql15) or die("Can't Query15");

$sql16 = " INSERT INTO customize_jeans_measurements (id, order_id, product_id, jeans_measurement_sex, jeans_measurement, jeans_measurement_waist, jeans_measurement_hips, jeans_measurement_crotch, jeans_measurement_thighs, jeans_measurement_knees, jeans_measurement_cuffs, jeans_measurement_length_outleg, jeans_measurement_pants_waist, jeans_measurement_pants_bottom, jeans_remark, jeans_date, jeans_time, jeans_ip, jeans_status) VALUES ('$id_jeans', '$order_id', '$product_id', '$jeans_measurement_sex', '$jeans_measurement', '$jeans_measurement_waist', '$jeans_measurement_hips', '$jeans_measurement_crotch', '$jeans_measurement_thighs', '$jeans_measurement_knees', '$jeans_measurement_cuffs', '$jeans_measurement_length_outleg', '$jeans_measurement_pants_waist', '$jeans_measurement_pants_bottom', '$jeans_remark', '$jeans_date', '$jeans_time', '$jeans_ip', '$jeans_status') ";
$query16 = mysql_query($sql16) or die("Can't Query16");

$path = "../../images/body/jeans/front/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['jeans_body_front']['name'];
	$tmp = $_FILES['jeans_body_front']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$jeans_body_front_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$jeans_body_front_pic)){
				
				$sql17 = " UPDATE customize_jeans_measurements SET jeans_body_front = '".$jeans_body_front_pic."', jeans_date = '".$jeans_date."', jeans_time = '".$jeans_time."', jeans_ip = '".$jeans_ip."', jeans_status = '".$jeans_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query17 = mysql_db_query($dbname, $sql17) or die("Can't Query17");
			}
    
	} else {
				$sql17 = " UPDATE customize_jeans_measurements SET jeans_date = '".$jeans_date."', jeans_time = '".$jeans_time."', jeans_ip = '".$jeans_ip."', jeans_status = '".$jeans_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query17 = mysql_db_query($dbname, $sql17) or die("Can't Query17");
			}
	}
	
$path = "../../images/body/jeans/left/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['jeans_body_left']['name'];
	$tmp = $_FILES['jeans_body_left']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$jeans_body_left_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$jeans_body_left_pic)){
				
				$sql18 = " UPDATE customize_jeans_measurements SET jeans_body_left = '".$jeans_body_left_pic."', jeans_date = '".$jeans_date."', jeans_time = '".$jeans_time."', jeans_ip = '".$jeans_ip."', jeans_status = '".$jeans_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query18 = mysql_db_query($dbname, $sql18) or die("Can't Query18");
			}
    
	} else {
				$sql18 = " UPDATE customize_jeans_measurements SET jeans_date = '".$jeans_date."', jeans_time = '".$jeans_time."', jeans_ip = '".$jeans_ip."', jeans_status = '".$jeans_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query18 = mysql_db_query($dbname, $sql18) or die("Can't Query18");
			}
	}
	
$path = "../../images/body/jeans/right/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['jeans_body_right']['name'];
	$tmp = $_FILES['jeans_body_right']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$jeans_body_right_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$jeans_body_right_pic)){
				
				$sql19 = " UPDATE customize_jeans_measurements SET jeans_body_right = '".$jeans_body_right_pic."', jeans_date = '".$jeans_date."', jeans_time = '".$jeans_time."', jeans_ip = '".$jeans_ip."', jeans_status = '".$jeans_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query19 = mysql_db_query($dbname, $sql19) or die("Can't Query19");
			}
    
	} else {
				$sql19 = " UPDATE customize_jeans_measurements SET jeans_date = '".$jeans_date."', jeans_time = '".$jeans_time."', jeans_ip = '".$jeans_ip."', jeans_status = '".$jeans_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query19 = mysql_db_query($dbname, $sql19) or die("Can't Query19");
			}
	}
	
$path = "../../images/body/jeans/back/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['jeans_body_back']['name'];
	$tmp = $_FILES['jeans_body_back']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$jeans_body_back_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$jeans_body_back_pic)){
				
				$sql20 = " UPDATE customize_jeans_measurements SET jeans_body_back = '".$jeans_body_back_pic."', jeans_date = '".$jeans_date."', jeans_time = '".$jeans_time."', jeans_ip = '".$jeans_ip."', jeans_status = '".$jeans_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query20 = mysql_db_query($dbname, $sql20) or die("Can't Query20");
			}
    
	} else {
				$sql20 = " UPDATE customize_jeans_measurements SET jeans_date = '".$jeans_date."', jeans_time = '".$jeans_time."', jeans_ip = '".$jeans_ip."', jeans_status = '".$jeans_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query20 = mysql_db_query($dbname, $sql20) or die("Can't Query20");
			}
	}

} else if ($jeans_fabric_no_6 == "") { }

if ($jeans_orderid != "") {
	
	$sql21 = " UPDATE customize_checkout SET checkout_company = '$company_user', checkout_order = '$jeans_order_no', checkout_customer = '$jeans_customer_name', checkout_date = '$jeans_date', checkout_time = '$jeans_time', checkout_ip = '$jeans_ip', checkout_status = '$jeans_status' WHERE checkout_orderid = '$order_id' ";
	$query21 = mysql_query($sql21) or die("Can't Query21");
	
} else if ($jeans_orderid == "") {
	
	$sql21 = " INSERT INTO customize_checkout (id, checkout_company, checkout_order, checkout_orderid, checkout_customer, checkout_date, checkout_time, checkout_ip, checkout_status) VALUES ('$id_customize_checkout', '$company_user', '$jeans_order_no', '$order_id', '$jeans_customer_name', '$jeans_date', '$jeans_time', '$jeans_ip', '$jeans_status') ";
	$query21 = mysql_query($sql21) or die("Can't Query21");
	
}

if($query21) {
	
	echo " <script language='javascript'> window.location='../../cart/single/index.php?orderid=".$order_id."'; </script> ";
	
}

mysql_close();
?>