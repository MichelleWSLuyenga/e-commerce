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

/*QTY*/
$jacket_qty = $_POST["jacket_qty"];
$jeans_qty = $_POST["jeans_qty"];
$overcoat_qty = $_POST["overcoat_qty"];
$pants_qty = $_POST["pants_qty"];
$shirt_qty = $_POST["shirt_qty"];
$suits_qty = $_POST["suits_qty"];
$suits_with_vest_qty = $_POST["suits_with_vest_qty"];
$ties_qty = $_POST["ties_qty"];
$tuxedo_jacket_qty = $_POST["tuxedo_jacket_qty"];
$tuxedo_suits_qty = $_POST["tuxedo_suits_qty"];
$tuxedo_with_vest_qty = $_POST["tuxedo_with_vest_qty"];
$vest_qty = $_POST["vest_qty"];

/*PRODUCT*/
$order_product_jacket = jacket;
$order_product_jeans = jeans;
$order_product_overcoat = overcoat;
$order_product_pants = pants;
$order_product_shirt = shirt;
$order_product_suits = suits;
$order_product_suits_with_vest = suits_with_vest;
$order_product_ties = ties;
$order_product_tuxedo_jacket = tuxedo_jacket;
$order_product_tuxedo_suits = tuxedo_suits;
$order_product_tuxedo_with_vest = tuxedo_with_vest;
$order_product_vest = vest;

/*ORDER ID*/
$item_orderid = $_POST["item_orderid"];

if ($item_orderid != "") {
	
	$order_id = $item_orderid;
	
} else if ($item_orderid == "") {
	
	$sql1 =	" SELECT MAX(order_id) FROM customize_order ";
	$query1 = mysql_db_query($dbname, $sql1) or die("Can't Query1");
	$row1 = mysql_fetch_array($query1);
	$order_id = $row1[0] + 1 ;
	
}

$sql2 =	" SELECT MAX(id) FROM customize_checkout ";
$query2 = mysql_db_query($dbname, $sql2) or die("Can't Query2");
$row2 = mysql_fetch_array($query2);
$id_customize_checkout = $row2[0] + 1 ;

/*ECT*/
$item_date = date("m/d/Y");
$item_time = date("H:i:s");
$item_ip = $_POST['ip'];
$item_status = T;

/*JACKET*/
if ($jacket_qty == "0") { } else if ($jacket_qty != "0") {
	
	$i = 1;
	
	while ($i <= $jacket_qty) {
		
    $sqljacket1 = " SELECT MAX(id) FROM customize_order ";
	$queryjacket1 = mysql_db_query($dbname, $sqljacket1) or die("Can't Queryjacket1");
	$rowjacket1 = mysql_fetch_array($queryjacket1);
	$id_order = $rowjacket1[0] + 1 ;

	$sqljacket2 = " SELECT MAX(product_id) FROM customize_order ";
	$queryjacket2 = mysql_db_query($dbname, $sqljacket2) or die("Can't Queryjacket2");
	$rowjacket2 = mysql_fetch_array($queryjacket2);
	$product_id = $rowjacket2[0] + 1 ;

	$sqljacket3 = " SELECT MAX(id) FROM customize_jacket_design ";
	$queryjacket3 = mysql_db_query($dbname, $sqljacket3) or die("Can't Queryjacket3");
	$rowjacket3 = mysql_fetch_array($queryjacket3);
	$id_jacket = $rowjacket3[0] + 1 ;

	$sqljacket4 = " INSERT INTO customize_order (id, order_id, product_id, order_reseller, order_product, order_date, order_time, order_ip, order_status) VALUES ('$id_order', '$order_id', '$product_id', '$company_user', '$order_product_jacket', '$item_date', '$item_time', '$item_ip', '$item_status') ";
	$queryjacket4 = mysql_query($sqljacket4) or die("Can't Queryjacket4");

	$sqljacket5 = " INSERT INTO customize_jacket_design (id, order_id, product_id, jacket_jacket_style, jacket_lapel_style, jacket_real_lapel_boutonniere, jacket_vent_style, jacket_pocket_style, jacket_chest_pocket, jacket_shoulder_construction, jacket_sleeve_button, jacket_cuff, jacket_lining_style, jacket_canvas, jacket_brand, jacket_date, jacket_time, jacket_ip, jacket_status) VALUES ('$id_jacket', '$order_id', '$product_id', 1, 1, 0, 1, 1, 0, 0, 4, 0, 1, 0, 0, '$item_date', '$item_time', '$item_ip', '$item_status') ";
	$queryjacket5 = mysql_query($sqljacket5) or die("Can't Queryjacket5");

	$sqljacket6 = " INSERT INTO customize_jacket_measurements (id, order_id, product_id, jacket_date, jacket_time, jacket_ip, jacket_status) VALUES ('$id_jacket', '$order_id', '$product_id', '$item_date', '$item_time', '$item_ip', '$item_status') ";
	$queryjacket6 = mysql_query($sqljacket6) or die("Can't Queryjacket6");
	
    $i++;
	}
}

/*JEANS*/
if ($jeans_qty == "0") { } else if ($jeans_qty != "0") {
	
	$i = 1;
	
	while ($i <= $jeans_qty) {
		
    $sqljeans1 = " SELECT MAX(id) FROM customize_order ";
	$queryjeans1 = mysql_db_query($dbname, $sqljeans1) or die("Can't Queryjeans1");
	$rowjeans1 = mysql_fetch_array($queryjeans1);
	$id_order = $rowjeans1[0] + 1 ;

	$sqljeans2 = " SELECT MAX(product_id) FROM customize_order ";
	$queryjeans2 = mysql_db_query($dbname, $sqljeans2) or die("Can't Queryjeans2");
	$rowjeans2 = mysql_fetch_array($queryjeans2);
	$product_id = $rowjeans2[0] + 1 ;

	$sqljeans3 = " SELECT MAX(id) FROM customize_jeans_design ";
	$queryjeans3 = mysql_db_query($dbname, $sqljeans3) or die("Can't Queryjeans3");
	$rowjeans3 = mysql_fetch_array($queryjeans3);
	$id_jeans = $rowjeans3[0] + 1 ;

	$sqljeans4 = " INSERT INTO customize_order (id, order_id, product_id, order_reseller, order_product, order_date, order_time, order_ip, order_status) VALUES ('$id_order', '$order_id', '$product_id', '$company_user', '$order_product_jeans', '$item_date', '$item_time', '$item_ip', '$item_status') ";
	$queryjeans4 = mysql_query($sqljeans4) or die("Can't Queryjeans4");

	$sqljeans5 = " INSERT INTO customize_jeans_design (id, order_id, product_id, jeans_pocketing, jeans_front_pocket, jeans_back_pocket, jeans_coin_pocket, jeans_fly, jeans_embroidery_position, jeans_leather_patch, jeans_thread, jeans_buttons, jeans_fitting, jeans_wash, jeans_date, jeans_time, jeans_ip, jeans_status) VALUES ('$id_jeans', '$order_id', '$product_id', 1, 1, 1, 1, 1, 1, 0, 1, 1, 1, 1, '$item_date', '$item_time', '$item_ip', '$item_status') ";
	$queryjeans5 = mysql_query($sqljeans5) or die("Can't Queryjeans5");

	$sqljeans6 = " INSERT INTO customize_jeans_measurements (id, order_id, product_id, jeans_date, jeans_time, jeans_ip, jeans_status) VALUES ('$id_jeans', '$order_id', '$product_id', '$item_date', '$item_time', '$item_ip', '$item_status') ";
	$queryjeans6 = mysql_query($sqljeans6) or die("Can't Queryjeans6");
	
    $i++;
	}
}

/*OVERCOAT*/
if ($overcoat_qty == "0") { } else if ($overcoat_qty != "0") {
	
	$i = 1;
	
	while ($i <= $overcoat_qty) {
		
    $sqlovercoat1 = " SELECT MAX(id) FROM customize_order ";
	$queryovercoat1 = mysql_db_query($dbname, $sqlovercoat1) or die("Can't Queryovercoat1");
	$rowovercoat1 = mysql_fetch_array($queryovercoat1);
	$id_order = $rowovercoat1[0] + 1 ;

	$sqlovercoat2 = " SELECT MAX(product_id) FROM customize_order ";
	$queryovercoat2 = mysql_db_query($dbname, $sqlovercoat2) or die("Can't Queryovercoat2");
	$rowovercoat2 = mysql_fetch_array($queryovercoat2);
	$product_id = $rowovercoat2[0] + 1 ;

	$sqlovercoat3 = " SELECT MAX(id) FROM customize_overcoat_design ";
	$queryovercoat3 = mysql_db_query($dbname, $sqlovercoat3) or die("Can't Queryovercoat3");
	$rowovercoat3 = mysql_fetch_array($queryovercoat3);
	$id_overcoat = $rowovercoat3[0] + 1 ;

	$sqlovercoat4 = " INSERT INTO customize_order (id, order_id, product_id, order_reseller, order_product, order_date, order_time, order_ip, order_status) VALUES ('$id_order', '$order_id', '$product_id', '$company_user', '$order_product_overcoat', '$item_date', '$item_time', '$item_ip', '$item_status') ";
	$queryovercoat4 = mysql_query($sqlovercoat4) or die("Can't Queryovercoat4");

	$sqlovercoat5 = " INSERT INTO customize_overcoat_design (id, order_id, product_id, overcoat_overcoat_style, overcoat_lapel_style, overcoat_shoulder_construction, overcoat_real_lapel_boutonniere, overcoat_pocket_style, overcoat_chest_pocket, overcoat_sleeve_button, overcoat_cuff, overcoat_belt, overcoat_vent_style, overcoat_lining_style, overcoat_date, overcoat_time, overcoat_ip, overcoat_status) VALUES ('$id_overcoat', '$order_id', '$product_id', 1, 1, 0, 0, 1, 0, 1, 0, 1, 1, 1, '$item_date', '$item_time', '$item_ip', '$item_status') ";
	$queryovercoat5 = mysql_query($sqlovercoat5) or die("Can't Queryovercoat5");

	$sqlovercoat6 = " INSERT INTO customize_overcoat_measurements (id, order_id, product_id, overcoat_date, overcoat_time, overcoat_ip, overcoat_status) VALUES ('$id_overcoat', '$order_id', '$product_id', '$item_date', '$item_time', '$item_ip', '$item_status') ";
	$queryovercoat6 = mysql_query($sqlovercoat6) or die("Can't Queryovercoat6");
	
    $i++;
	}
}

/*PANTS*/
if ($pants_qty == "0") { } else if ($pants_qty != "0") {
	
	$i = 1;
	
	while ($i <= $pants_qty) {
		
    $sqlpants1 = " SELECT MAX(id) FROM customize_order ";
	$querypants1 = mysql_db_query($dbname, $sqlpants1) or die("Can't Querypants1");
	$rowpants1 = mysql_fetch_array($querypants1);
	$id_order = $rowpants1[0] + 1 ;

	$sqlpants2 = " SELECT MAX(product_id) FROM customize_order ";
	$querypants2 = mysql_db_query($dbname, $sqlpants2) or die("Can't Querypants2");
	$rowpants2 = mysql_fetch_array($querypants2);
	$product_id = $rowpants2[0] + 1 ;

	$sqlpants3 = " SELECT MAX(id) FROM customize_pants_design ";
	$querypants3 = mysql_db_query($dbname, $sqlpants3) or die("Can't Querypants3");
	$rowpants3 = mysql_fetch_array($querypants3);
	$id_pants = $rowpants3[0] + 1 ;

	$sqlpants4 = " INSERT INTO customize_order (id, order_id, product_id, order_reseller, order_product, order_date, order_time, order_ip, order_status) VALUES ('$id_order', '$order_id', '$product_id', '$company_user', '$order_product_pants', '$item_date', '$item_time', '$item_ip', '$item_status') ";
	$querypants4 = mysql_query($sqlpants4) or die("Can't Querypants4");

	$sqlpants5 = " INSERT INTO customize_pants_design (id, order_id, product_id, pants_front_pleat, pants_front_pocket, pants_back_pocket, pants_no_back_pocket, pants_fastening, pants_fly_option, pants_band_edge_style, pants_waistband_width, pants_cuff, pants_belt, pants_pants_lining_style, pants_pants_brand, pants_date, pants_time, pants_ip, pants_status) VALUES ('$id_pants', '$order_id', '$product_id', 1, 1, 1, 0, 1, 1, 1, 1, 1, 1, 0, 0, '$item_date', '$item_time', '$item_ip', '$item_status') ";
	$querypants5 = mysql_query($sqlpants5) or die("Can't Querypants5");

	$sqlpants6 = " INSERT INTO customize_pants_measurements (id, order_id, product_id, pants_date, pants_time, pants_ip, pants_status) VALUES ('$id_pants', '$order_id', '$product_id', '$item_date', '$item_time', '$item_ip', '$item_status') ";
	$querypants6 = mysql_query($sqlpants6) or die("Can't Querypants6");
	
    $i++;
	}
}

/*SHIRT*/
if ($shirt_qty == "0") { } else if ($shirt_qty != "0") {
	
	$i = 1;
	
	while ($i <= $shirt_qty) {
		
    $sqlshirt1 = " SELECT MAX(id) FROM customize_order ";
	$queryshirt1 = mysql_db_query($dbname, $sqlshirt1) or die("Can't Queryshirt1");
	$rowshirt1 = mysql_fetch_array($queryshirt1);
	$id_order = $rowshirt1[0] + 1 ;

	$sqlshirt2 = " SELECT MAX(product_id) FROM customize_order ";
	$queryshirt2 = mysql_db_query($dbname, $sqlshirt2) or die("Can't Queryshirt2");
	$rowshirt2 = mysql_fetch_array($queryshirt2);
	$product_id = $rowshirt2[0] + 1 ;

	$sqlshirt3 = " SELECT MAX(id) FROM customize_shirt_design ";
	$queryshirt3 = mysql_db_query($dbname, $sqlshirt3) or die("Can't Queryshirt3");
	$rowshirt3 = mysql_fetch_array($queryshirt3);
	$id_shirt = $rowshirt3[0] + 1 ;

	$sqlshirt4 = " INSERT INTO customize_order (id, order_id, product_id, order_reseller, order_product, order_date, order_time, order_ip, order_status) VALUES ('$id_order', '$order_id', '$product_id', '$company_user', '$order_product_shirt', '$item_date', '$item_time', '$item_ip', '$item_status') ";
	$queryshirt4 = mysql_query($sqlshirt4) or die("Can't Queryshirt4");

	$sqlshirt5 = " INSERT INTO customize_shirt_design (id, order_id, product_id, shirt_collar_style, shirt_collar_button_option, shirt_cuff_style, shirt_placket, shirt_yoke_style, shirt_back, shirt_pocket, shirt_no_pocket, shirt_bottom, shirt_brand, shirt_date, shirt_time, shirt_ip, shirt_status) VALUES ('$id_shirt', '$order_id', '$product_id', 1, 1, 1, 1, 1, 2, 0, 0, 1, 0, '$item_date', '$item_time', '$item_ip', '$item_status') ";
	$queryshirt5 = mysql_query($sqlshirt5) or die("Can't Queryshirt5");

	$sqlshirt6 = " INSERT INTO customize_shirt_measurements (id, order_id, product_id, shirt_date, shirt_time, shirt_ip, shirt_status) VALUES ('$id_shirt', '$order_id', '$product_id', '$item_date', '$item_time', '$item_ip', '$item_status') ";
	$queryshirt6 = mysql_query($sqlshirt6) or die("Can't Queryshirt6");
	
    $i++;
	}
}

/*SUITS*/
if ($suits_qty == "0") { } else if ($suits_qty != "0") {
	
	$i = 1;
	
	while ($i <= $suits_qty) {
		
    $sqlsuits1 = " SELECT MAX(id) FROM customize_order ";
	$querysuits1 = mysql_db_query($dbname, $sqlsuits1) or die("Can't Querysuits1");
	$rowsuits1 = mysql_fetch_array($querysuits1);
	$id_order = $rowsuits1[0] + 1 ;

	$sqlsuits2 = " SELECT MAX(product_id) FROM customize_order ";
	$querysuits2 = mysql_db_query($dbname, $sqlsuits2) or die("Can't Querysuits2");
	$rowsuits2 = mysql_fetch_array($querysuits2);
	$product_id = $rowsuits2[0] + 1 ;

	$sqlsuits3 = " SELECT MAX(id) FROM customize_suits_design ";
	$querysuits3 = mysql_db_query($dbname, $sqlsuits3) or die("Can't Querysuits3");
	$rowsuits3 = mysql_fetch_array($querysuits3);
	$id_suits = $rowsuits3[0] + 1 ;

	$sqlsuits4 = " INSERT INTO customize_order (id, order_id, product_id, order_reseller, order_product, order_date, order_time, order_ip, order_status) VALUES ('$id_order', '$order_id', '$product_id', '$company_user', '$order_product_suits', '$item_date', '$item_time', '$item_ip', '$item_status') ";
	$querysuits4 = mysql_query($sqlsuits4) or die("Can't Querysuits4");

	$sqlsuits5 = " INSERT INTO customize_suits_design (id, order_id, product_id, suits_jacket_style, suits_lapel_style, suits_real_lapel_boutonniere, suits_vent_style, suits_pocket_style, suits_chest_pocket, suits_shoulder_construction, suits_sleeve_button, suits_cuff, suits_lining_style, suits_canvas, suits_brand, suits_front_pleat, suits_front_pocket, suits_back_pocket, suits_no_back_pocket, suits_fastening, suits_fly_option, suits_band_edge_style, suits_waistband_width, suits_pants_cuff, suits_belt, suits_pants_lining_style, suits_pants_brand, suits_date, suits_time, suits_ip, suits_status) VALUES ('$id_suits', '$order_id', '$product_id', 1, 1, 0, 1, 1, 0, 0, 4, 0, 1, 0, 0, 1, 1, 1, 0, 1, 1, 1, 1, 1, 1, 0, 0, '$item_date', '$item_time', '$item_ip', '$item_status') ";
	$querysuits5 = mysql_query($sqlsuits5) or die("Can't Querysuits5");

	$sqlsuits6 = " INSERT INTO customize_suits_measurements (id, order_id, product_id, suits_date, suits_time, suits_ip, suits_status) VALUES ('$id_suits', '$order_id', '$product_id', '$item_date', '$item_time', '$item_ip', '$item_status') ";
	$querysuits6 = mysql_query($sqlsuits6) or die("Can't Querysuits6");
	
    $i++;
	}
}

/*SUITS_WITH_VEST*/
if ($suits_with_vest_qty == "0") { } else if ($suits_with_vest_qty != "0") {
	
	$i = 1;
	
	while ($i <= $suits_with_vest_qty) {
		
    $sqlsuits_with_vest1 = " SELECT MAX(id) FROM customize_order ";
	$querysuits_with_vest1 = mysql_db_query($dbname, $sqlsuits_with_vest1) or die("Can't Querysuits_with_vest1");
	$rowsuits_with_vest1 = mysql_fetch_array($querysuits_with_vest1);
	$id_order = $rowsuits_with_vest1[0] + 1 ;

	$sqlsuits_with_vest2 = " SELECT MAX(product_id) FROM customize_order ";
	$querysuits_with_vest2 = mysql_db_query($dbname, $sqlsuits_with_vest2) or die("Can't Querysuits_with_vest2");
	$rowsuits_with_vest2 = mysql_fetch_array($querysuits_with_vest2);
	$product_id = $rowsuits_with_vest2[0] + 1 ;

	$sqlsuits_with_vest3 = " SELECT MAX(id) FROM customize_suits_with_vest_design ";
	$querysuits_with_vest3 = mysql_db_query($dbname, $sqlsuits_with_vest3) or die("Can't Querysuits_with_vest3");
	$rowsuits_with_vest3 = mysql_fetch_array($querysuits_with_vest3);
	$id_suits_with_vest = $rowsuits_with_vest3[0] + 1 ;

	$sqlsuits_with_vest4 = " INSERT INTO customize_order (id, order_id, product_id, order_reseller, order_product, order_date, order_time, order_ip, order_status) VALUES ('$id_order', '$order_id', '$product_id', '$company_user', '$order_product_suits_with_vest', '$item_date', '$item_time', '$item_ip', '$item_status') ";
	$querysuits_with_vest4 = mysql_query($sqlsuits_with_vest4) or die("Can't Querysuits_with_vest4");

	$sqlsuits_with_vest5 = " INSERT INTO customize_suits_with_vest_design (id, order_id, product_id, suits_with_vest_jacket_style, suits_with_vest_lapel_style, suits_with_vest_real_lapel_boutonniere, suits_with_vest_vent_style, suits_with_vest_pocket_style, suits_with_vest_chest_pocket, suits_with_vest_shoulder_construction, suits_with_vest_sleeve_button, suits_with_vest_cuff, suits_with_vest_lining_style, suits_with_vest_canvas, suits_with_vest_brand, suits_with_vest_front_pleat, suits_with_vest_front_pocket, suits_with_vest_back_pocket, suits_with_vest_no_back_pocket, suits_with_vest_fastening, suits_with_vest_fly_option, suits_with_vest_band_edge_style, suits_with_vest_waistband_width, suits_with_vest_pants_cuff, suits_with_vest_belt, suits_with_vest_pants_lining_style, suits_with_vest_pants_brand, suits_with_vest_vest_button, suits_with_vest_vest_lapel_style, suits_with_vest_vest_chest_pocket, suits_with_vest_vest_bottom_pocket, suits_with_vest_vest_bottom_of_vest, suits_with_vest_vest_belt_at_back, suits_with_vest_date, suits_with_vest_time, suits_with_vest_ip, suits_with_vest_status) VALUES ('$id_suits_with_vest', '$order_id', '$product_id', 1, 1, 0, 1, 1, 0, 0, 4, 0, 1, 0, 0, 1, 1, 1, 0, 1, 1, 1, 1, 1, 1, 0, 0, 1, 1, 1, 1, 1, 1, '$item_date', '$item_time', '$item_ip', '$item_status') ";
	$querysuits_with_vest5 = mysql_query($sqlsuits_with_vest5) or die("Can't Querysuits_with_vest5");

	$sqlsuits_with_vest6 = " INSERT INTO customize_suits_with_vest_measurements (id, order_id, product_id, suits_with_vest_date, suits_with_vest_time, suits_with_vest_ip, suits_with_vest_status) VALUES ('$id_suits_with_vest', '$order_id', '$product_id', '$item_date', '$item_time', '$item_ip', '$item_status') ";
	$querysuits_with_vest6 = mysql_query($sqlsuits_with_vest6) or die("Can't Querysuits_with_vest6");
	
    $i++;
	}
}

/*ties*/
if ($ties_qty == "0") { } else if ($ties_qty != "0") {
	
	$i = 1;
	
	while ($i <= $ties_qty) {
		
    $sqlties1 = " SELECT MAX(id) FROM customize_order ";
	$queryties1 = mysql_db_query($dbname, $sqlties1) or die("Can't Queryties1");
	$rowties1 = mysql_fetch_array($queryties1);
	$id_order = $rowties1[0] + 1 ;

	$sqlties2 = " SELECT MAX(product_id) FROM customize_order ";
	$queryties2 = mysql_db_query($dbname, $sqlties2) or die("Can't Queryties2");
	$rowties2 = mysql_fetch_array($queryties2);
	$product_id = $rowties2[0] + 1 ;

	$sqlties3 = " SELECT MAX(id) FROM customize_ties_design ";
	$queryties3 = mysql_db_query($dbname, $sqlties3) or die("Can't Queryties3");
	$rowties3 = mysql_fetch_array($queryties3);
	$id_ties = $rowties3[0] + 1 ;

	$sqlties4 = " INSERT INTO customize_order (id, order_id, product_id, order_reseller, order_product, order_date, order_time, order_ip, order_status) VALUES ('$id_order', '$order_id', '$product_id', '$company_user', '$order_product_ties', '$item_date', '$item_time', '$item_ip', '$item_status') ";
	$queryties4 = mysql_query($sqlties4) or die("Can't Queryties4");

	$sqlties5 = " INSERT INTO customize_ties_design (id, order_id, product_id, ties_date, ties_time, ties_ip, ties_status) VALUES ('$id_ties', '$order_id', '$product_id', '$item_date', '$item_time', '$item_ip', '$item_status') ";
	$queryties5 = mysql_query($sqlties5) or die("Can't Queryties5");
	
    $i++;
	}
}

/*TUXEDO_JACKET*/
if ($tuxedo_jacket_qty == "0") { } else if ($tuxedo_jacket_qty != "0") {
	
	$i = 1;
	
	while ($i <= $tuxedo_jacket_qty) {
		
    $sqltuxedo_jacket1 = " SELECT MAX(id) FROM customize_order ";
	$querytuxedo_jacket1 = mysql_db_query($dbname, $sqltuxedo_jacket1) or die("Can't Querytuxedo_jacket1");
	$rowtuxedo_jacket1 = mysql_fetch_array($querytuxedo_jacket1);
	$id_order = $rowtuxedo_jacket1[0] + 1 ;

	$sqltuxedo_jacket2 = " SELECT MAX(product_id) FROM customize_order ";
	$querytuxedo_jacket2 = mysql_db_query($dbname, $sqltuxedo_jacket2) or die("Can't Querytuxedo_jacket2");
	$rowtuxedo_jacket2 = mysql_fetch_array($querytuxedo_jacket2);
	$product_id = $rowtuxedo_jacket2[0] + 1 ;

	$sqltuxedo_jacket3 = " SELECT MAX(id) FROM customize_tuxedo_jacket_design ";
	$querytuxedo_jacket3 = mysql_db_query($dbname, $sqltuxedo_jacket3) or die("Can't Querytuxedo_jacket3");
	$rowtuxedo_jacket3 = mysql_fetch_array($querytuxedo_jacket3);
	$id_tuxedo_jacket = $rowtuxedo_jacket3[0] + 1 ;

	$sqltuxedo_jacket4 = " INSERT INTO customize_order (id, order_id, product_id, order_reseller, order_product, order_date, order_time, order_ip, order_status) VALUES ('$id_order', '$order_id', '$product_id', '$company_user', '$order_product_tuxedo_jacket', '$item_date', '$item_time', '$item_ip', '$item_status') ";
	$querytuxedo_jacket4 = mysql_query($sqltuxedo_jacket4) or die("Can't Querytuxedo_jacket4");

	$sqltuxedo_jacket5 = " INSERT INTO customize_tuxedo_jacket_design (id, order_id, product_id, tuxedo_jacket_jacket_style, tuxedo_jacket_lapel_style, tuxedo_jacket_real_lapel_boutonniere, tuxedo_jacket_vent_style, tuxedo_jacket_pocket_style, tuxedo_jacket_chest_pocket, tuxedo_jacket_shoulder_construction, tuxedo_jacket_sleeve_button, tuxedo_jacket_cuff, tuxedo_jacket_lining_style, tuxedo_jacket_canvas, tuxedo_jacket_brand, tuxedo_jacket_date, tuxedo_jacket_time, tuxedo_jacket_ip, tuxedo_jacket_status) VALUES ('$id_tuxedo_jacket', '$order_id', '$product_id', 1, 1, 0, 1, 1, 0, 0, 4, 0, 1, 0, 0, '$item_date', '$item_time', '$item_ip', '$item_status') ";
	$querytuxedo_jacket5 = mysql_query($sqltuxedo_jacket5) or die("Can't Querytuxedo_jacket5");

	$sqltuxedo_jacket6 = " INSERT INTO customize_tuxedo_jacket_measurements (id, order_id, product_id, tuxedo_jacket_date, tuxedo_jacket_time, tuxedo_jacket_ip, tuxedo_jacket_status) VALUES ('$id_tuxedo_jacket', '$order_id', '$product_id', '$item_date', '$item_time', '$item_ip', '$item_status') ";
	$querytuxedo_jacket6 = mysql_query($sqltuxedo_jacket6) or die("Can't Querytuxedo_jacket6");
	
    $i++;
	}
}

/*TUXEDO_SUITS*/
if ($tuxedo_suits_qty == "0") { } else if ($tuxedo_suits_qty != "0") {
	
	$i = 1;
	
	while ($i <= $tuxedo_suits_qty) {
		
    $sqltuxedo_suits1 = " SELECT MAX(id) FROM customize_order ";
	$querytuxedo_suits1 = mysql_db_query($dbname, $sqltuxedo_suits1) or die("Can't Querytuxedo_suits1");
	$rowtuxedo_suits1 = mysql_fetch_array($querytuxedo_suits1);
	$id_order = $rowtuxedo_suits1[0] + 1 ;

	$sqltuxedo_suits2 = " SELECT MAX(product_id) FROM customize_order ";
	$querytuxedo_suits2 = mysql_db_query($dbname, $sqltuxedo_suits2) or die("Can't Querytuxedo_suits2");
	$rowtuxedo_suits2 = mysql_fetch_array($querytuxedo_suits2);
	$product_id = $rowtuxedo_suits2[0] + 1 ;

	$sqltuxedo_suits3 = " SELECT MAX(id) FROM customize_tuxedo_suits_design ";
	$querytuxedo_suits3 = mysql_db_query($dbname, $sqltuxedo_suits3) or die("Can't Querytuxedo_suits3");
	$rowtuxedo_suits3 = mysql_fetch_array($querytuxedo_suits3);
	$id_tuxedo_suits = $rowtuxedo_suits3[0] + 1 ;

	$sqltuxedo_suits4 = " INSERT INTO customize_order (id, order_id, product_id, order_reseller, order_product, order_date, order_time, order_ip, order_status) VALUES ('$id_order', '$order_id', '$product_id', '$company_user', '$order_product_tuxedo_suits', '$item_date', '$item_time', '$item_ip', '$item_status') ";
	$querytuxedo_suits4 = mysql_query($sqltuxedo_suits4) or die("Can't Querytuxedo_suits4");

	$sqltuxedo_suits5 = " INSERT INTO customize_tuxedo_suits_design (id, order_id, product_id, tuxedo_suits_jacket_style, tuxedo_suits_lapel_style, tuxedo_suits_real_lapel_boutonniere, tuxedo_suits_vent_style, tuxedo_suits_pocket_style, tuxedo_suits_chest_pocket, tuxedo_suits_shoulder_construction, tuxedo_suits_sleeve_button, tuxedo_suits_cuff, tuxedo_suits_lining_style, tuxedo_suits_canvas, tuxedo_suits_brand, tuxedo_suits_front_pleat, tuxedo_suits_front_pocket, tuxedo_suits_back_pocket, tuxedo_suits_no_back_pocket, tuxedo_suits_fastening, tuxedo_suits_fly_option, tuxedo_suits_band_edge_style, tuxedo_suits_waistband_width, tuxedo_suits_pants_cuff, tuxedo_suits_belt, tuxedo_suits_pants_lining_style, tuxedo_suits_pants_brand, tuxedo_suits_date, tuxedo_suits_time, tuxedo_suits_ip, tuxedo_suits_status) VALUES ('$id_tuxedo_suits', '$order_id', '$product_id', 1, 1, 0, 1, 1, 0, 0, 4, 0, 1, 0, 0, 1, 1, 1, 0, 1, 1, 1, 1, 1, 1, 0, 0, '$item_date', '$item_time', '$item_ip', '$item_status') ";
	$querytuxedo_suits5 = mysql_query($sqltuxedo_suits5) or die("Can't Querytuxedo_suits5");

	$sqltuxedo_suits6 = " INSERT INTO customize_tuxedo_suits_measurements (id, order_id, product_id, tuxedo_suits_date, tuxedo_suits_time, tuxedo_suits_ip, tuxedo_suits_status) VALUES ('$id_tuxedo_suits', '$order_id', '$product_id', '$item_date', '$item_time', '$item_ip', '$item_status') ";
	$querytuxedo_suits6 = mysql_query($sqltuxedo_suits6) or die("Can't Querytuxedo_suits6");
	
    $i++;
	}
}

/*TUXEDO_WITH_VEST*/
if ($tuxedo_with_vest_qty == "0") { } else if ($tuxedo_with_vest_qty != "0") {
	
	$i = 1;
	
	while ($i <= $tuxedo_with_vest_qty) {
		
    $sqltuxedo_with_vest1 = " SELECT MAX(id) FROM customize_order ";
	$querytuxedo_with_vest1 = mysql_db_query($dbname, $sqltuxedo_with_vest1) or die("Can't Querytuxedo_with_vest1");
	$rowtuxedo_with_vest1 = mysql_fetch_array($querytuxedo_with_vest1);
	$id_order = $rowtuxedo_with_vest1[0] + 1 ;

	$sqltuxedo_with_vest2 = " SELECT MAX(product_id) FROM customize_order ";
	$querytuxedo_with_vest2 = mysql_db_query($dbname, $sqltuxedo_with_vest2) or die("Can't Querytuxedo_with_vest2");
	$rowtuxedo_with_vest2 = mysql_fetch_array($querytuxedo_with_vest2);
	$product_id = $rowtuxedo_with_vest2[0] + 1 ;

	$sqltuxedo_with_vest3 = " SELECT MAX(id) FROM customize_tuxedo_with_vest_design ";
	$querytuxedo_with_vest3 = mysql_db_query($dbname, $sqltuxedo_with_vest3) or die("Can't Querytuxedo_with_vest3");
	$rowtuxedo_with_vest3 = mysql_fetch_array($querytuxedo_with_vest3);
	$id_tuxedo_with_vest = $rowtuxedo_with_vest3[0] + 1 ;

	$sqltuxedo_with_vest4 = " INSERT INTO customize_order (id, order_id, product_id, order_reseller, order_product, order_date, order_time, order_ip, order_status) VALUES ('$id_order', '$order_id', '$product_id', '$company_user', '$order_product_tuxedo_with_vest', '$item_date', '$item_time', '$item_ip', '$item_status') ";
	$querytuxedo_with_vest4 = mysql_query($sqltuxedo_with_vest4) or die("Can't Querytuxedo_with_vest4");

	$sqltuxedo_with_vest5 = " INSERT INTO customize_tuxedo_with_vest_design (id, order_id, product_id, tuxedo_with_vest_jacket_style, tuxedo_with_vest_lapel_style, tuxedo_with_vest_real_lapel_boutonniere, tuxedo_with_vest_vent_style, tuxedo_with_vest_pocket_style, tuxedo_with_vest_chest_pocket, tuxedo_with_vest_shoulder_construction, tuxedo_with_vest_sleeve_button, tuxedo_with_vest_cuff, tuxedo_with_vest_lining_style, tuxedo_with_vest_canvas, tuxedo_with_vest_brand, tuxedo_with_vest_front_pleat, tuxedo_with_vest_front_pocket, tuxedo_with_vest_back_pocket, tuxedo_with_vest_no_back_pocket, tuxedo_with_vest_fastening, tuxedo_with_vest_fly_option, tuxedo_with_vest_band_edge_style, tuxedo_with_vest_waistband_width, tuxedo_with_vest_pants_cuff, tuxedo_with_vest_belt, tuxedo_with_vest_pants_lining_style, tuxedo_with_vest_pants_brand, tuxedo_with_vest_vest_button, tuxedo_with_vest_vest_lapel_style, tuxedo_with_vest_vest_chest_pocket, tuxedo_with_vest_vest_bottom_pocket, tuxedo_with_vest_vest_bottom_of_vest, tuxedo_with_vest_vest_belt_at_back, tuxedo_with_vest_date, tuxedo_with_vest_time, tuxedo_with_vest_ip, tuxedo_with_vest_status) VALUES ('$id_tuxedo_with_vest', '$order_id', '$product_id', 1, 1, 0, 1, 1, 0, 0, 4, 0, 1, 0, 0, 1, 1, 1, 0, 1, 1, 1, 1, 1, 1, 0, 0, 1, 1, 1, 1, 1, 1, '$item_date', '$item_time', '$item_ip', '$item_status') ";
	$querytuxedo_with_vest5 = mysql_query($sqltuxedo_with_vest5) or die("Can't Querytuxedo_with_vest5");

	$sqltuxedo_with_vest6 = " INSERT INTO customize_tuxedo_with_vest_measurements (id, order_id, product_id, tuxedo_with_vest_date, tuxedo_with_vest_time, tuxedo_with_vest_ip, tuxedo_with_vest_status) VALUES ('$id_tuxedo_with_vest', '$order_id', '$product_id', '$item_date', '$item_time', '$item_ip', '$item_status') ";
	$querytuxedo_with_vest6 = mysql_query($sqltuxedo_with_vest6) or die("Can't Querytuxedo_with_vest6");
	
    $i++;
	}
}

/*VEST*/
if ($vest_qty == "0") { } else if ($vest_qty != "0") {
	
	$i = 1;
	
	while ($i <= $vest_qty) {
		
    $sqlvest1 = " SELECT MAX(id) FROM customize_order ";
	$queryvest1 = mysql_db_query($dbname, $sqlvest1) or die("Can't Queryvest1");
	$rowvest1 = mysql_fetch_array($queryvest1);
	$id_order = $rowvest1[0] + 1 ;

	$sqlvest2 = " SELECT MAX(product_id) FROM customize_order ";
	$queryvest2 = mysql_db_query($dbname, $sqlvest2) or die("Can't Queryvest2");
	$rowvest2 = mysql_fetch_array($queryvest2);
	$product_id = $rowvest2[0] + 1 ;

	$sqlvest3 = " SELECT MAX(id) FROM customize_vest_design ";
	$queryvest3 = mysql_db_query($dbname, $sqlvest3) or die("Can't Queryvest3");
	$rowvest3 = mysql_fetch_array($queryvest3);
	$id_vest = $rowvest3[0] + 1 ;

	$sqlvest4 = " INSERT INTO customize_order (id, order_id, product_id, order_reseller, order_product, order_date, order_time, order_ip, order_status) VALUES ('$id_order', '$order_id', '$product_id', '$company_user', '$order_product_vest', '$item_date', '$item_time', '$item_ip', '$item_status') ";
	$queryvest4 = mysql_query($sqlvest4) or die("Can't Queryvest4");

	$sqlvest5 = " INSERT INTO customize_vest_design (id, order_id, product_id, vest_vest_button, vest_vest_lapel_style, vest_vest_chest_pocket, vest_vest_bottom_pocket, vest_vest_bottom_of_vest, vest_vest_belt_at_back, vest_date, vest_time, vest_ip, vest_status) VALUES ('$id_vest', '$order_id', '$product_id', 1, 1, 1, 1, 1, 1, '$item_date', '$item_time', '$item_ip', '$item_status') ";
	$queryvest5 = mysql_query($sqlvest5) or die("Can't Queryvest5");

	$sqlvest6 = " INSERT INTO customize_vest_measurements (id, order_id, product_id, vest_date, vest_time, vest_ip, vest_status) VALUES ('$id_vest', '$order_id', '$product_id', '$item_date', '$item_time', '$item_ip', '$item_status') ";
	$queryvest6 = mysql_query($sqlvest6) or die("Can't Queryvest6");
	
    $i++;
	}
}

if ($item_orderid != "") {
	
	$sql21 = " UPDATE customize_checkout SET checkout_company = '$company_user', checkout_date = '$item_date', checkout_time = '$item_time', checkout_ip = '$item_ip', checkout_status = '$item_status' WHERE checkout_orderid = '$order_id' ";
	$query21 = mysql_query($sql21) or die("Can't Query21");
	
} else if ($item_orderid == "") {
	
	
	$sql21 = " INSERT INTO customize_checkout (id, checkout_company, checkout_orderid, checkout_date, checkout_time, checkout_ip, checkout_status) VALUES ('$id_customize_checkout', '$company_user', '$order_id', '$item_date', '$item_time', '$item_ip', '$item_status') ";
	$query21 = mysql_query($sql21) or die("Can't Query21");
	
}

if($query21) {
	
	echo " <script language='javascript'> window.location='../../../cart/multiple/index.php?orderid=".$order_id."'; </script> ";
	
}

mysql_close();
?>