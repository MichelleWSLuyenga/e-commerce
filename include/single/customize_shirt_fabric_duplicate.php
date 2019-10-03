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

$order_id_same = $_POST["shirt_orderid"];
$product_id_same = $_POST["shirt_productid"];
	
$sql1 =	" SELECT * FROM customize_shirt_design WHERE order_id = '$order_id_same' AND product_id = '$product_id_same' ";
$query1 = mysql_db_query($dbname, $sql1) or die("Can't Query1");
$row1 = mysql_fetch_array($query1);

$sql2 =	" SELECT * FROM customize_shirt_measurements WHERE order_id = '$order_id_same' AND product_id = '$product_id_same' ";
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

$sql6 =	" SELECT MAX(id) FROM customize_shirt_design ";
$query6 = mysql_db_query($dbname, $sql6) or die("Can't Query6");
$row6 = mysql_fetch_array($query6);
$id_shirt = $row6[0] + 1 ;

/*FABRIC*/
$shirt_fabric_no_1 = $_POST["shirt_fabric_no_1"];

$sql001 = " SELECT * FROM admin_fabrics_shirt WHERE fabricno = '$shirt_fabric_no_1' ";
$query001 = mysql_db_query($dbname, $sql001) or die("Can't Query001");
$row001 = mysql_fetch_array($query001);
$fabrics_type = $row001["type"];
$fabrics_brand = $row001["brand"];

if ($row001["type"] != '') {

$sql01 = " SELECT `fabrictype_".$id_user."` FROM admin_fabrictype WHERE fabrictype_name = '$fabrics_type' AND fabrictype_product = 'Shirt' ";
$query01 = mysql_db_query($dbname, $sql01) or die("Can't Query01");
$row01 = mysql_fetch_array($query01);
$shirt_fabric_price_1 = $row01["0"];

} else if ($row001["brand"] != '') {
	
$sql02 = " SELECT `fabricbrand_".$id_user."` FROM admin_fabricbrand WHERE fabricbrand_name = '$fabrics_brand' AND fabricbrand_product = 'Shirt' ";
$query02 = mysql_db_query($dbname, $sql02) or die("Can't Query02");
$row02 = mysql_fetch_array($query02);	
$shirt_fabric_price_1 = $row02["0"];
	
}

/*OTHER PRICING PARAMETERS*/
$shirt_measurement_chest = $row1["shirt_measurement_chest"];
$shirt_measurement_waist_only = $row1["shirt_measurement_waist_only"];
$shirt_measurement_hips = $row1["shirt_measurement_hips"];

if (($shirt_measurement_chest >= '50' && $shirt_measurement_chest <= '52') || ($shirt_measurement_waist_only >= '50' && $shirt_measurement_waist_only <= '52') || ($shirt_measurement_hips >= '50' && $shirt_measurement_hips <= '52')) {
	
	$price_size_1 = $shirt_fabric_price_1 * 20;
	$price_size_2 = $price_size_1 / 100;
	$price_size_3 = $price_size_2 + $shirt_fabric_price_1;
	
} else if (($shirt_measurement_chest >= '52.5' && $shirt_measurement_chest <= '56') || ($shirt_measurement_waist_only >= '52.5' && $shirt_measurement_waist_only <= '56') || ($shirt_measurement_hips >= '52.5' && $shirt_measurement_hips <= '56')) {
	
	$price_size_1 = $shirt_fabric_price_1 * 30;
	$price_size_2 = $price_size_1 / 100;
	$price_size_3 = $price_size_2 + $shirt_fabric_price_1;
	
} else if (($shirt_measurement_chest >= '56.5' && $shirt_measurement_chest <= '60') || ($shirt_measurement_waist_only >= '56.5' && $shirt_measurement_waist_only <= '60') || ($shirt_measurement_hips >= '56.5' && $shirt_measurement_hips <= '60')) {
	
	$price_size_1 = $shirt_fabric_price_1 * 40;
	$price_size_2 = $price_size_1 / 100;
	$price_size_3 = $price_size_2 + $shirt_fabric_price_1;
	
} else if (($shirt_measurement_chest >= '60.5' && $shirt_measurement_chest <= '64') || ($shirt_measurement_waist_only >= '60.5' && $shirt_measurement_waist_only <= '64') || ($shirt_measurement_hips >= '60.5' && $shirt_measurement_hips <= '64')) {
	
	$price_size_1 = $shirt_fabric_price_1 * 50;
	$price_size_2 = $price_size_1 / 100;
	$price_size_3 = $price_size_2 + $shirt_fabric_price_1;
	
} else if (($shirt_measurement_chest >= '64.5' && $shirt_measurement_chest <= '68') || ($shirt_measurement_waist_only >= '64.5' && $shirt_measurement_waist_only <= '68') || ($shirt_measurement_hips >= '64.5' && $shirt_measurement_hips <= '68')) {
	
	$price_size_1 = $shirt_fabric_price_1 * 60;
	$price_size_2 = $price_size_1 / 100;
	$price_size_3 = $price_size_2 + $shirt_fabric_price_1;
	
}  else {
	
	$price_size_3 = $shirt_fabric_price_1;
	
}

/*BUTTON*/
$shirt_shirt_button_number = $row1["shirt_shirt_button_number"];

$sql002 = " SELECT price FROM admin_buttons_shirt WHERE buttonno = '$shirt_shirt_button_number' ";
$query002 = mysql_db_query($dbname, $sql002) or die("Can't Query002");
$row002 = mysql_fetch_array($query002);
$shirt_button_price = $row002["price"];

$shirt_button_price_1 = $price_size_3 + $shirt_button_price;

$shirt_contrast_inside_no_1 = $row1["shirt_contrast_inside_no_1"];
if ($shirt_contrast_inside_no_1 == "") {
	$shirt_contrast_inside_no_1_price = 0;
} else if ($shirt_contrast_inside_no_1 != "") {
	$sqlprice1 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Inside Contrast Collar' ";
	$queryprice1 = mysql_db_query($dbname, $sqlprice1) or die("Can't QueryPrice1");
	$rowprice1 = mysql_fetch_array($queryprice1);
	$shirt_contrast_inside_no_1_price_extra = $rowprice1["0"];
	$shirt_contrast_inside_no_1_price = $shirt_contrast_inside_no_1_price_extra;
}

$shirt_contrast_inside_no_2 = $row1["shirt_contrast_inside_no_2"];
if ($shirt_contrast_inside_no_2 == "") {
	$shirt_contrast_inside_no_2_price = 0;
} else if ($shirt_contrast_inside_no_2 != "") {
	$sqlprice2 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Inside Contrast Cuff' ";
	$queryprice2 = mysql_db_query($dbname, $sqlprice2) or die("Can't QueryPrice2");
	$rowprice2 = mysql_fetch_array($queryprice2);
	$shirt_contrast_inside_no_2_price_extra = $rowprice2["0"];
	$shirt_contrast_inside_no_2_price = $shirt_contrast_inside_no_2_price_extra;
}

$shirt_contrast_inside_no_3 = $row1["shirt_contrast_inside_no_3"];
if ($shirt_contrast_inside_no_3 == "") {
	$shirt_contrast_inside_no_3_price = 0;
} else if ($shirt_contrast_inside_no_3 != "") {
	$sqlprice3 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Inside Contrast Placket' ";
	$queryprice3 = mysql_db_query($dbname, $sqlprice3) or die("Can't QueryPrice3");
	$rowprice3 = mysql_fetch_array($queryprice3);
	$shirt_contrast_inside_no_3_price_extra = $rowprice3["0"];
	$shirt_contrast_inside_no_3_price = $shirt_contrast_inside_no_3_price_extra;
}

$shirt_contrast_outsite_no_1 = $row1["shirt_contrast_outsite_no_1"];
if ($shirt_contrast_outsite_no_1 == "") {
	$shirt_contrast_outsite_no_1_price = 0;
} else if ($shirt_contrast_outsite_no_1 != "") {
	$sqlprice4 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Outside Contrast Collar' ";
	$queryprice4 = mysql_db_query($dbname, $sqlprice4) or die("Can't QueryPrice4");
	$rowprice4 = mysql_fetch_array($queryprice4);
	$shirt_contrast_outsite_no_1_price_extra = $rowprice4["0"];
	$shirt_contrast_outsite_no_1_price = $shirt_contrast_outsite_no_1_price_extra;
}

$shirt_contrast_outsite_no_2 = $row1["shirt_contrast_outsite_no_2"];
if ($shirt_contrast_outsite_no_2 == "") {
	$shirt_contrast_outsite_no_2_price = 0;
} else if ($shirt_contrast_outsite_no_2 != "") {
	$sqlprice5 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Outside Contrast Cuff' ";
	$queryprice5 = mysql_db_query($dbname, $sqlprice5) or die("Can't QueryPrice5");
	$rowprice5 = mysql_fetch_array($queryprice5);
	$shirt_contrast_outsite_no_2_price_extra = $rowprice5["0"];
	$shirt_contrast_outsite_no_2_price = $shirt_contrast_outsite_no_2_price_extra;
}

$shirt_contrast_outsite_no_3 = $row1["shirt_contrast_outsite_no_3"];
if ($shirt_contrast_outsite_no_3 == "") {
	$shirt_contrast_outsite_no_3_price = 0;
} else if ($shirt_contrast_outsite_no_3 != "") {
	$sqlprice6 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Outside Contrast Placket' ";
	$queryprice6 = mysql_db_query($dbname, $sqlprice6) or die("Can't QueryPrice6");
	$rowprice6 = mysql_fetch_array($queryprice6);
	$shirt_contrast_outsite_no_3_price_extra = $rowprice6["0"];
	$shirt_contrast_outsite_no_3_price = $shirt_contrast_outsite_no_3_price_extra;
}

$shirt_shoulder_apaulletes = $row1["shirt_shoulder_apaulletes"];
if ($shirt_shoulder_apaulletes != "1") {
	$shirt_shoulder_apaulletes_price = 0;
} else if ($shirt_shoulder_apaulletes == "1") {
	$sqlprice7 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Shoulder Apaulletes' ";
	$queryprice7 = mysql_db_query($dbname, $sqlprice7) or die("Can't QueryPrice7");
	$rowprice7 = mysql_fetch_array($queryprice7);
	$shirt_shoulder_apaulletes_price_extra = $rowprice7["0"];
	$shirt_shoulder_apaulletes_price = $shirt_shoulder_apaulletes_price_extra;
}

$shirt_arm_loops = $row1["shirt_arm_loops"];
if ($shirt_arm_loops != "1") {
	$shirt_arm_loops_price = 0;
} else if ($shirt_arm_loops == "1") {
	$sqlprice8 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Arm Loops' ";
	$queryprice8 = mysql_db_query($dbname, $sqlprice8) or die("Can't QueryPrice8");
	$rowprice8 = mysql_fetch_array($queryprice8);
	$shirt_arm_loops_price_extra = $rowprice8["0"];
	$shirt_arm_loops_price = $shirt_arm_loops_price_extra;
}

$shirt_bottom = $row1["shirt_bottom"];
if ($shirt_bottom != "4") {
	$shirt_bottom_pentagon_price = 0;
} else if ($shirt_bottom == "4") {
	$sqlprice9 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Pentagon Gusset' ";
	$queryprice9 = mysql_db_query($dbname, $sqlprice9) or die("Can't QueryPrice9");
	$rowprice9 = mysql_fetch_array($queryprice9);
	$shirt_bottom_pentagon_price_extra = $rowprice9["0"];
	$shirt_bottom_pentagon_price = $shirt_bottom_pentagon_price_extra;
}

$shirt_bottom = $row1["shirt_bottom"];
if ($shirt_bottom != "5") {
	$shirt_bottom_triangle_price = 0;
} else if ($shirt_bottom == "5") {
	$sqlprice10 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Triangle Gusset' ";
	$queryprice10 = mysql_db_query($dbname, $sqlprice10) or die("Can't QueryPrice10");
	$rowprice10 = mysql_fetch_array($queryprice10);
	$shirt_bottom_triangle_price_extra = $rowprice10["0"];
	$shirt_bottom_triangle_price = $shirt_bottom_triangle_price_extra;
}

$shirt_initial_or_name = $row1["shirt_initial_or_name"];
$shirt_position = $_POST["shirt_position"];
if ($shirt_position != "1" || $shirt_initial_or_name == "") {
	$shirt_position_cuffs_price = 0;
} else if ($shirt_position == "1" && $shirt_initial_or_name != "") {
	$sqlprice11 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Embroidery Cuffs' ";
	$queryprice11 = mysql_db_query($dbname, $sqlprice11) or die("Can't QueryPrice11");
	$rowprice11 = mysql_fetch_array($queryprice11);
	$shirt_position_cuffs_price_extra = $rowprice11["0"];
	$shirt_position_cuffs_price = $shirt_position_cuffs_price_extra;
}

$shirt_position = $row1["shirt_position"];
if ($shirt_position != "2" || $shirt_initial_or_name == "") {
	$shirt_position_chest_price = 0;
} else if ($shirt_position == "2" && $shirt_initial_or_name != "") {
	$sqlprice12 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Embroidery Chest' ";
	$queryprice12 = mysql_db_query($dbname, $sqlprice12) or die("Can't QueryPrice12");
	$rowprice12 = mysql_fetch_array($queryprice12);
	$shirt_position_chest_price_extra = $rowprice12["0"];
	$shirt_position_chest_price = $shirt_position_chest_price_extra;
}

$shirt_position = $row1["shirt_position"];
if ($shirt_position != "3" || $shirt_initial_or_name == "") {
	$shirt_position_insidecollar_price = 0;
} else if ($shirt_position == "3" && $shirt_initial_or_name != "") {
	$sqlprice13 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Embroidery Inside Collar' ";
	$queryprice13 = mysql_db_query($dbname, $sqlprice13) or die("Can't QueryPrice13");
	$rowprice13 = mysql_fetch_array($queryprice13);
	$shirt_position_insidecollar_price_extra = $rowprice13["0"];
	$shirt_position_insidecollar_price = $shirt_position_insidecollar_price_extra;
}

$shirt_position = $row1["shirt_position"];
if ($shirt_position != "4" || $shirt_initial_or_name == "") {
	$shirt_position_outsidebackcollar_price = 0;
} else if ($shirt_position == "4" && $shirt_initial_or_name != "") {
	$sqlprice14 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Embroidery Outside Back Collar' ";
	$queryprice14 = mysql_db_query($dbname, $sqlprice14) or die("Can't QueryPrice14");
	$rowprice14 = mysql_fetch_array($queryprice14);
	$shirt_position_outsidebackcollar_price_extra = $rowprice14["0"];
	$shirt_position_outsidebackcollar_price = $shirt_position_outsidebackcollar_price_extra;
}

$shirt_position = $row1["shirt_position"];
if ($shirt_position != "5" || $shirt_initial_or_name == "") {
	$shirt_position_insideyoke_price = 0;
} else if ($shirt_position == "5" && $shirt_initial_or_name != "") {
	$sqlprice15 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Embroidery Inside Yoke' ";
	$queryprice15 = mysql_db_query($dbname, $sqlprice15) or die("Can't QueryPrice15");
	$rowprice15 = mysql_fetch_array($queryprice15);
	$shirt_position_insideyoke_price_extra = $rowprice15["0"];
	$shirt_position_insideyoke_price = $shirt_position_insideyoke_price_extra;
}

$shirt_position = $row1["shirt_position"];
if ($shirt_position != "6" || $shirt_initial_or_name == "") {
	$shirt_position_stomach_price = 0;
} else if ($shirt_position == "6" && $shirt_initial_or_name != "") {
	$sqlprice16 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Embroidery Stomach' ";
	$queryprice16 = mysql_db_query($dbname, $sqlprice16) or die("Can't QueryPrice16");
	$rowprice16 = mysql_fetch_array($queryprice16);
	$shirt_position_stomach_price_extra = $rowprice16["0"];
	$shirt_position_stomach_price = $shirt_position_stomach_price_extra;
}

$shirt_position = $row1["shirt_position"];
if ($shirt_position != "7" || $shirt_initial_or_name == "") {
	$shirt_position_bottom_price = 0;
} else if ($shirt_position == "7" && $shirt_initial_or_name != "") {
	$sqlprice17 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Embroidery Bottom' ";
	$queryprice17 = mysql_db_query($dbname, $sqlprice17) or die("Can't QueryPrice17");
	$rowprice17 = mysql_fetch_array($queryprice17);
	$shirt_position_bottom_price_extra = $rowprice17["0"];
	$shirt_position_bottom_price = $shirt_position_bottom_price_extra;
}

$shirt_brand = $row1["shirt_brand"];
if ($shirt_brand == "0") {
	$shirt_brand_price = 0;
} else if ($shirt_brand != "0") {
	$sqlprice18 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Shirt Branding' ";
	$queryprice18 = mysql_db_query($dbname, $sqlprice18) or die("Can't QueryPrice18");
	$rowprice18 = mysql_fetch_array($queryprice18);
	$shirt_brand_price_extra = $rowprice18["0"];
	$shirt_brand_price = $shirt_brand_price_extra;
}

$shirt_price_1 = $shirt_button_price_1 + $shirt_contrast_inside_no_1_price + $shirt_contrast_inside_no_2_price + $shirt_contrast_inside_no_3_price + $shirt_contrast_outsite_no_1_price + $shirt_contrast_outsite_no_2_price + $shirt_contrast_outsite_no_3_price + $shirt_shoulder_apaulletes_price + $shirt_arm_loops_price + $shirt_bottom_pentagon_price + $shirt_bottom_triangle_price + $shirt_position_cuffs_price + $shirt_position_chest_price + $shirt_position_insidecollar_price + $shirt_position_outsidebackcollar_price + $shirt_position_insideyoke_price + $shirt_position_stomach_price + $shirt_position_bottom_price + $shirt_brand_price;

/*MY PRICES*/

$sqlmy1 = " SELECT * FROM admin_fabrics_shirt WHERE fabricno = '$shirt_fabric_no_1' ";
$querymy1 = mysql_db_query($dbname, $sqlmy1) or die("Can't Querymy1");
$rowmy1 = mysql_fetch_array($querymy1);
$fabrics_my_type = $rowmy1["type"];
$fabrics_my_brand = $rowmy1["brand"];

if ($rowmy1["type"] != '') {

$sqlmy01 = " SELECT `fabrictypereseller_".$id_user."` FROM admin_fabrictype WHERE fabrictype_name = '$fabrics_my_type' AND fabrictype_product = 'Shirt' ";
$querymy01 = mysql_db_query($dbname, $sqlmy01) or die("Can't Querymy01");
$rowmy01 = mysql_fetch_array($querymy01);
$shirt_fabric_my_price_1 = $rowmy01["0"];

} else if ($rowmy1["brand"] != '') {
	
$sqlmy02 = " SELECT `fabricbrand_".$id_user."` FROM admin_fabricbrand WHERE fabricbrand_name = '$fabrics_my_brand' AND fabricbrand_product = 'Shirt' ";
$querymy02 = mysql_db_query($dbname, $sqlmy02) or die("Can't Querymy02");
$rowmy02 = mysql_fetch_array($querymy02);	
$shirt_fabric_my_price_1 = $rowmy02["0"];
	
}

/*OTHER PRICING PARAMETERS*/
$shirt_measurement_chest = $_POST["shirt_measurement_chest"];
$shirt_measurement_waist_only = $_POST["shirt_measurement_waist_only"];
$shirt_measurement_hips = $_POST["shirt_measurement_hips"];

if (($shirt_measurement_chest >= '50' && $shirt_measurement_chest <= '52') || ($shirt_measurement_waist_only >= '50' && $shirt_measurement_waist_only <= '52') || ($shirt_measurement_hips >= '50' && $shirt_measurement_hips <= '52')) {
	
	$price_my_size_1 = $shirt_fabric_my_price_1 * 20;
	$price_my_size_2 = $price_my_size_1 / 100;
	$price_my_size_3 = $price_my_size_2 + $shirt_fabric_my_price_1;
	
} else if (($shirt_measurement_chest >= '52.5' && $shirt_measurement_chest <= '56') || ($shirt_measurement_waist_only >= '52.5' && $shirt_measurement_waist_only <= '56') || ($shirt_measurement_hips >= '52.5' && $shirt_measurement_hips <= '56')) {
	
	$price_my_size_1 = $shirt_fabric_my_price_1 * 30;
	$price_my_size_2 = $price_my_size_1 / 100;
	$price_my_size_3 = $price_my_size_2 + $shirt_fabric_my_price_1;
	
} else if (($shirt_measurement_chest >= '56.5' && $shirt_measurement_chest <= '60') || ($shirt_measurement_waist_only >= '56.5' && $shirt_measurement_waist_only <= '60') || ($shirt_measurement_hips >= '56.5' && $shirt_measurement_hips <= '60')) {
	
	$price_my_size_1 = $shirt_fabric_my_price_1 * 40;
	$price_my_size_2 = $price_my_size_1 / 100;
	$price_my_size_3 = $price_my_size_2 + $shirt_fabric_my_price_1;
	
} else if (($shirt_measurement_chest >= '60.5' && $shirt_measurement_chest <= '64') || ($shirt_measurement_waist_only >= '60.5' && $shirt_measurement_waist_only <= '64') || ($shirt_measurement_hips >= '60.5' && $shirt_measurement_hips <= '64')) {
	
	$price_my_size_1 = $shirt_fabric_my_price_1 * 50;
	$price_my_size_2 = $price_my_size_1 / 100;
	$price_my_size_3 = $price_my_size_2 + $shirt_fabric_my_price_1;
	
} else if (($shirt_measurement_chest >= '64.5' && $shirt_measurement_chest <= '68') || ($shirt_measurement_waist_only >= '64.5' && $shirt_measurement_waist_only <= '68') || ($shirt_measurement_hips >= '64.5' && $shirt_measurement_hips <= '68')) {
	
	$price_my_size_1 = $shirt_fabric_my_price_1 * 60;
	$price_my_size_2 = $price_my_size_1 / 100;
	$price_my_size_3 = $price_my_size_2 + $shirt_fabric_my_price_1;
	
}  else {
	
	$price_my_size_3 = $shirt_fabric_my_price_1;
	
}

/*BUTTON*/
$shirt_shirt_button_number = $_POST["shirt_shirt_button_number"];

$sql2 = " SELECT price FROM admin_buttons_shirt WHERE buttonno = '$shirt_shirt_button_number' ";
$query2 = mysql_db_query($dbname, $sql2) or die("Can't Query2");
$row2 = mysql_fetch_array($query2);
$shirt_button_my_price = $row2["price"];

$shirt_button_my_price_1 = $price_my_size_3 + $shirt_button_my_price;

$shirt_contrast_inside_no_1 = $_POST["shirt_contrast_inside_no_1"];
if ($shirt_contrast_inside_no_1 == "") {
	$shirt_contrast_inside_no_1_price = 0;
} else if ($shirt_contrast_inside_no_1 != "") {
	$sqlprice1 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Inside Contrast Collar' ";
	$queryprice1 = mysql_db_query($dbname, $sqlprice1) or die("Can't QueryPrice1");
	$rowprice1 = mysql_fetch_array($queryprice1);
	$shirt_contrast_inside_no_1_my_price_extra = $rowprice1["0"];
	$shirt_contrast_inside_no_1_my_price = $shirt_contrast_inside_no_1_my_price_extra;
}

$shirt_contrast_inside_no_2 = $_POST["shirt_contrast_inside_no_2"];
if ($shirt_contrast_inside_no_2 == "") {
	$shirt_contrast_inside_no_2_price = 0;
} else if ($shirt_contrast_inside_no_2 != "") {
	$sqlprice2 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Inside Contrast Cuff' ";
	$queryprice2 = mysql_db_query($dbname, $sqlprice2) or die("Can't QueryPrice2");
	$rowprice2 = mysql_fetch_array($queryprice2);
	$shirt_contrast_inside_no_2_my_price_extra = $rowprice2["0"];
	$shirt_contrast_inside_no_2_my_price = $shirt_contrast_inside_no_2_my_price_extra;
}

$shirt_contrast_inside_no_3 = $_POST["shirt_contrast_inside_no_3"];
if ($shirt_contrast_inside_no_3 == "") {
	$shirt_contrast_inside_no_3_price = 0;
} else if ($shirt_contrast_inside_no_3 != "") {
	$sqlprice3 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Inside Contrast Placket' ";
	$queryprice3 = mysql_db_query($dbname, $sqlprice3) or die("Can't QueryPrice3");
	$rowprice3 = mysql_fetch_array($queryprice3);
	$shirt_contrast_inside_no_3_my_price_extra = $rowprice3["0"];
	$shirt_contrast_inside_no_3_my_price = $shirt_contrast_inside_no_3_my_price_extra;
}

$shirt_contrast_outsite_no_1 = $_POST["shirt_contrast_outsite_no_1"];
if ($shirt_contrast_outsite_no_1 == "") {
	$shirt_contrast_outsite_no_1_price = 0;
} else if ($shirt_contrast_outsite_no_1 != "") {
	$sqlprice4 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Outside Contrast Collar' ";
	$queryprice4 = mysql_db_query($dbname, $sqlprice4) or die("Can't QueryPrice4");
	$rowprice4 = mysql_fetch_array($queryprice4);
	$shirt_contrast_outsite_no_1_my_price_extra = $rowprice4["0"];
	$shirt_contrast_outsite_no_1_my_price = $shirt_contrast_outsite_no_1_my_price_extra;
}

$shirt_contrast_outsite_no_2 = $_POST["shirt_contrast_outsite_no_2"];
if ($shirt_contrast_outsite_no_2 == "") {
	$shirt_contrast_outsite_no_2_price = 0;
} else if ($shirt_contrast_outsite_no_2 != "") {
	$sqlprice5 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Outside Contrast Cuff' ";
	$queryprice5 = mysql_db_query($dbname, $sqlprice5) or die("Can't QueryPrice5");
	$rowprice5 = mysql_fetch_array($queryprice5);
	$shirt_contrast_outsite_no_2_my_price_extra = $rowprice5["0"];
	$shirt_contrast_outsite_no_2_my_price = $shirt_contrast_outsite_no_2_my_price_extra;
}

$shirt_contrast_outsite_no_3 = $_POST["shirt_contrast_outsite_no_3"];
if ($shirt_contrast_outsite_no_3 == "") {
	$shirt_contrast_outsite_no_3_price = 0;
} else if ($shirt_contrast_outsite_no_3 != "") {
	$sqlprice6 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Outside Contrast Placket' ";
	$queryprice6 = mysql_db_query($dbname, $sqlprice6) or die("Can't QueryPrice6");
	$rowprice6 = mysql_fetch_array($queryprice6);
	$shirt_contrast_outsite_no_3_my_price_extra = $rowprice6["0"];
	$shirt_contrast_outsite_no_3_my_price = $shirt_contrast_outsite_no_3_my_price_extra;
}

$shirt_shoulder_apaulletes = $_POST["shirt_shoulder_apaulletes"];
if ($shirt_shoulder_apaulletes != "1") {
	$shirt_shoulder_apaulletes_price = 0;
} else if ($shirt_shoulder_apaulletes == "1") {
	$sqlprice7 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Shoulder Apaulletes' ";
	$queryprice7 = mysql_db_query($dbname, $sqlprice7) or die("Can't QueryPrice7");
	$rowprice7 = mysql_fetch_array($queryprice7);
	$shirt_shoulder_apaulletes_my_price_extra = $rowprice7["0"];
	$shirt_shoulder_apaulletes_my_price = $shirt_shoulder_apaulletes_my_price_extra;
}

$shirt_arm_loops = $_POST["shirt_arm_loops"];
if ($shirt_arm_loops != "1") {
	$shirt_arm_loops_price = 0;
} else if ($shirt_arm_loops == "1") {
	$sqlprice8 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Arm Loops' ";
	$queryprice8 = mysql_db_query($dbname, $sqlprice8) or die("Can't QueryPrice8");
	$rowprice8 = mysql_fetch_array($queryprice8);
	$shirt_arm_loops_my_price_extra = $rowprice8["0"];
	$shirt_arm_loops_my_price = $shirt_arm_loops_my_price_extra;
}

$shirt_bottom = $_POST["shirt_bottom"];
if ($shirt_bottom != "4") {
	$shirt_bottom_pentagon_price = 0;
} else if ($shirt_bottom == "4") {
	$sqlprice9 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Pentagon Gusset' ";
	$queryprice9 = mysql_db_query($dbname, $sqlprice9) or die("Can't QueryPrice9");
	$rowprice9 = mysql_fetch_array($queryprice9);
	$shirt_bottom_pentagon_my_price_extra = $rowprice9["0"];
	$shirt_bottom_pentagon_my_price = $shirt_bottom_pentagon_my_price_extra;
}

$shirt_bottom = $_POST["shirt_bottom"];
if ($shirt_bottom != "5") {
	$shirt_bottom_triangle_price = 0;
} else if ($shirt_bottom == "5") {
	$sqlprice10 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Triangle Gusset' ";
	$queryprice10 = mysql_db_query($dbname, $sqlprice10) or die("Can't QueryPrice10");
	$rowprice10 = mysql_fetch_array($queryprice10);
	$shirt_bottom_triangle_my_price_extra = $rowprice10["0"];
	$shirt_bottom_triangle_my_price = $shirt_bottom_triangle_my_price_extra;
}

$shirt_initial_or_name = $_POST["shirt_initial_or_name"];
$shirt_position = $_POST["shirt_position"];
if ($shirt_position != "1" || $shirt_initial_or_name == "") {
	$shirt_position_cuffs_price = 0;
} else if ($shirt_position == "1" && $shirt_initial_or_name != "") {
	$sqlprice11 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Embroidery Cuffs' ";
	$queryprice11 = mysql_db_query($dbname, $sqlprice11) or die("Can't QueryPrice11");
	$rowprice11 = mysql_fetch_array($queryprice11);
	$shirt_position_cuffs_my_price_extra = $rowprice11["0"];
	$shirt_position_cuffs_my_price = $shirt_position_cuffs_my_price_extra;
}

$shirt_position = $_POST["shirt_position"];
if ($shirt_position != "2" || $shirt_initial_or_name == "") {
	$shirt_position_chest_price = 0;
} else if ($shirt_position == "2" && $shirt_initial_or_name != "") {
	$sqlprice12 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Embroidery Chest' ";
	$queryprice12 = mysql_db_query($dbname, $sqlprice12) or die("Can't QueryPrice12");
	$rowprice12 = mysql_fetch_array($queryprice12);
	$shirt_position_chest_my_price_extra = $rowprice12["0"];
	$shirt_position_chest_my_price = $shirt_position_chest_my_price_extra;
}

$shirt_position = $_POST["shirt_position"];
if ($shirt_position != "3" || $shirt_initial_or_name == "") {
	$shirt_position_insidecollar_price = 0;
} else if ($shirt_position == "3" && $shirt_initial_or_name != "") {
	$sqlprice13 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Embroidery Inside Collar' ";
	$queryprice13 = mysql_db_query($dbname, $sqlprice13) or die("Can't QueryPrice13");
	$rowprice13 = mysql_fetch_array($queryprice13);
	$shirt_position_insidecollar_my_price_extra = $rowprice13["0"];
	$shirt_position_insidecollar_my_price = $shirt_position_insidecollar_my_price_extra;
}

$shirt_position = $_POST["shirt_position"];
if ($shirt_position != "4" || $shirt_initial_or_name == "") {
	$shirt_position_outsidebackcollar_price = 0;
} else if ($shirt_position == "4" && $shirt_initial_or_name != "") {
	$sqlprice14 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Embroidery Outside Back Collar' ";
	$queryprice14 = mysql_db_query($dbname, $sqlprice14) or die("Can't QueryPrice14");
	$rowprice14 = mysql_fetch_array($queryprice14);
	$shirt_position_outsidebackcollar_my_price_extra = $rowprice14["0"];
	$shirt_position_outsidebackcollar_my_price = $shirt_position_outsidebackcollar_my_price_extra;
}

$shirt_position = $_POST["shirt_position"];
if ($shirt_position != "5" || $shirt_initial_or_name == "") {
	$shirt_position_insideyoke_price = 0;
} else if ($shirt_position == "5" && $shirt_initial_or_name != "") {
	$sqlprice15 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Embroidery Inside Yoke' ";
	$queryprice15 = mysql_db_query($dbname, $sqlprice15) or die("Can't QueryPrice15");
	$rowprice15 = mysql_fetch_array($queryprice15);
	$shirt_position_insideyoke_my_price_extra = $rowprice15["0"];
	$shirt_position_insideyoke_my_price = $shirt_position_insideyoke_my_price_extra;
}

$shirt_position = $_POST["shirt_position"];
if ($shirt_position != "6" || $shirt_initial_or_name == "") {
	$shirt_position_stomach_price = 0;
} else if ($shirt_position == "6" && $shirt_initial_or_name != "") {
	$sqlprice16 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Embroidery Stomach' ";
	$queryprice16 = mysql_db_query($dbname, $sqlprice16) or die("Can't QueryPrice16");
	$rowprice16 = mysql_fetch_array($queryprice16);
	$shirt_position_stomach_my_price_extra = $rowprice16["0"];
	$shirt_position_stomach_my_price = $shirt_position_stomach_my_price_extra;
}

$shirt_position = $_POST["shirt_position"];
if ($shirt_position != "7" || $shirt_initial_or_name == "") {
	$shirt_position_bottom_price = 0;
} else if ($shirt_position == "7" && $shirt_initial_or_name != "") {
	$sqlprice17 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Embroidery Bottom' ";
	$queryprice17 = mysql_db_query($dbname, $sqlprice17) or die("Can't QueryPrice17");
	$rowprice17 = mysql_fetch_array($queryprice17);
	$shirt_position_bottom_my_price_extra = $rowprice17["0"];
	$shirt_position_bottom_my_price = $shirt_position_bottom_my_price_extra;
}

$shirt_brand = $_POST["shirt_brand"];
if ($shirt_brand == "0") {
	$shirt_brand_price = 0;
} else if ($shirt_brand != "0") {
	$sqlprice18 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Shirt Branding' ";
	$queryprice18 = mysql_db_query($dbname, $sqlprice18) or die("Can't QueryPrice18");
	$rowprice18 = mysql_fetch_array($queryprice18);
	$shirt_brand_my_price_extra = $rowprice18["0"];
	$shirt_brand_my_price = $shirt_brand_my_price_extra;
}

$shirt_my_price_1 = $shirt_button_my_price_1 + $shirt_contrast_inside_no_1_my_price + $shirt_contrast_inside_no_2_my_price + $shirt_contrast_inside_no_3_my_price + $shirt_contrast_outsite_no_1_my_price + $shirt_contrast_outsite_no_2_my_price + $shirt_contrast_outsite_no_3_my_price + $shirt_shoulder_apaulletes_my_price + $shirt_arm_loops_my_price + $shirt_bottom_pentagon_my_price + $shirt_bottom_triangle_my_price + $shirt_position_cuffs_my_price + $shirt_position_chest_my_price + $shirt_position_insidecollar_my_price + $shirt_position_outsidebackcollar_my_price + $shirt_position_insideyoke_my_price + $shirt_position_stomach_my_price + $shirt_position_bottom_my_price + $shirt_brand_my_price;

/*BUTTON*/
$shirt_shirt_button_number = $row1["shirt_shirt_button_number"];

/*CUSTOMER*/
$shirt_customer_name = $row1["shirt_customer_name"];
$shirt_order_no = $row1["shirt_order_no"];
$shirt_order_date = date("m/d/Y");
$shirt_delivery_date = $row1["shirt_delivery_date"];

/*CUSTOMIZE*/
$shirt_collar_style = $row1["shirt_collar_style"];
$shirt_collar_button_option = $row1["shirt_collar_button_option"];
$shirt_collar_stay_a = $row1["shirt_collar_stay_a"];
$shirt_collar_stay_b = $row1["shirt_collar_stay_b"];
$shirt_size_of_collar_option = $row1["shirt_size_of_collar_option"];
$shirt_size_of_back_collar_size_of_band = $row1["shirt_size_of_back_collar_size_of_band"];
$shirt_cuff_style = $row1["shirt_cuff_style"];
$shirt_placket = $row1["shirt_placket"];
$shirt_yoke_style = $row1["shirt_yoke_style"];
$shirt_back = $row1["shirt_back"];
$shirt_pocket = $row1["shirt_pocket"];
$shirt_no_pocket = $row1["shirt_no_pocket"];
$shirt_bottom = $row1["shirt_bottom"];
$shirt_shirt_button_number = $row1["shirt_shirt_button_number"];
$shirt_collar_button_hole_color = $row1["shirt_collar_button_hole_color"];
$shirt_cuff_button_hole_color = $row1["shirt_cuff_button_hole_color"];
$shirt_thread_on_color = $row1["shirt_thread_on_color"];
$shirt_contrast = $row1["shirt_contrast"];
$shirt_contrast_inside_no_1 = $row1["shirt_contrast_inside_no_1"];
$shirt_contrast_inside_no_2 = $row1["shirt_contrast_inside_no_2"];
$shirt_contrast_inside_no_3 = $row1["shirt_contrast_inside_no_3"];
$shirt_inside_placket = $row1["shirt_inside_placket"];
$shirt_contrast_outsite_no_1 = $row1["shirt_contrast_outsite_no_1"];
$shirt_contrast_outsite_no_2 = $row1["shirt_contrast_outsite_no_2"];
$shirt_contrast_outsite_no_3 = $row1["shirt_contrast_outsite_no_3"];
$shirt_outsite_placket = $row1["shirt_outsite_placket"];
$shirt_piping_option = $row1["shirt_piping_option"];
$shirt_piping_option_yes = $row1["shirt_piping_option_yes"];
$shirt_piping_option_yes_color = $row1["shirt_piping_option_yes_color"];
$shirt_piping_option_yes_fabric = $row1["shirt_piping_option_yes_fabric"];
$shirt_shoulder_apaulletes = $row1["shirt_shoulder_apaulletes"];
$shirt_arm_loops = $row1["shirt_arm_loops"];
$shirt_position = $row1["shirt_position"];
$shirt_design = $row1["shirt_design"];
$shirt_initial_or_name = $row1["shirt_initial_or_name"];
$shirt_embroidery_color = $row1["shirt_embroidery_color"];
$shirt_brand = $row1["shirt_brand"];


/*MEASUREMENTS*/
$shirt_measurement_sex = $row2["shirt_measurement_sex"];
$shirt_measurement_sleeves = $row2["shirt_measurement_sleeves"];
$shirt_measurement_fit = $row2["shirt_measurement_fit"];
$shirt_measurement = $row2["shirt_measurement"];
$shirt_measurement_shirt_length = $row2["shirt_measurement_shirt_length"];
$shirt_measurement_chest = $row2["shirt_measurement_chest"];
$shirt_measurement_waist_only = $row2["shirt_measurement_waist_only"];
$shirt_measurement_hips = $row2["shirt_measurement_hips"];
$shirt_measurement_shoulders = $row2["shirt_measurement_shoulders"];
$shirt_measurement_sleeves_right = $row2["shirt_measurement_sleeves_right"];
$shirt_measurement_sleeves_left = $row2["shirt_measurement_sleeves_left"];
$shirt_measurement_neck = $row2["shirt_measurement_neck"];
$shirt_measurement_biceps = $row2["shirt_measurement_biceps"];
$shirt_measurement_back_length = $row2["shirt_measurement_back_length"];
$shirt_measurement_forearm = $row2["shirt_measurement_forearm"];
$shirt_measurement_cuff_right = $row2["shirt_measurement_cuff_right"];
$shirt_measurement_cuff_left = $row2["shirt_measurement_cuff_left"];
$shirt_measurement_arm_hole = $row2["shirt_measurement_arm_hole"];
$shirt_measurement_shoulder = $row2["shirt_measurement_shoulder"];
$shirt_measurement_waist = $row2["shirt_measurement_waist"];
$shirt_measurement_chest_body = $row2["shirt_measurement_chest_body"];
$shirt_body_front = $row2["shirt_body_front"];
$shirt_body_left = $row2["shirt_body_left"];
$shirt_body_right = $row2["shirt_body_right"];
$shirt_body_back = $row2["shirt_body_back"];
$shirt_remark = $row2["shirt_remark"];

/*ECT*/
$shirt_date = date("m/d/Y");
$shirt_time = date("H:i:s");
$shirt_ip = $_POST['ip'];
$shirt_status = T;

/*PRODUCT*/
$order_product = $row3['order_product'];

$sql7 =	" INSERT INTO customize_order (id, order_id, product_id, order_reseller, order_order_no, order_name_customize, order_my_price, order_price, order_product, order_fabric_no, order_date, order_time, order_ip, order_status) VALUES ('$id_order', '$order_id_same', '$product_id', '$company_user', '$shirt_order_no', '$shirt_customer_name', '$shirt_my_price_1', '$shirt_price_1', '$order_product', '$shirt_fabric_no_1', '$shirt_date', '$shirt_time', '$shirt_ip', '$shirt_status') ";
$query7 = mysql_query($sql7) or die("Can't Query7");

$sql8 = " INSERT INTO customize_shirt_design (id, order_id, product_id, shirt_customer_name, shirt_order_no, shirt_order_date, shirt_delivery_date, shirt_fabric_no, shirt_collar_style, shirt_collar_button_option, shirt_collar_stay_a, shirt_collar_stay_b, shirt_size_of_collar_option, shirt_size_of_back_collar_size_of_band, shirt_cuff_style, shirt_placket, shirt_yoke_style, shirt_back, shirt_pocket, shirt_no_pocket, shirt_bottom, shirt_shirt_button_number, shirt_collar_button_hole_color, shirt_cuff_button_hole_color, shirt_thread_on_color, shirt_contrast, shirt_contrast_inside_no_1, shirt_contrast_inside_no_2, shirt_contrast_inside_no_3, shirt_inside_placket, shirt_contrast_outsite_no_1, shirt_contrast_outsite_no_2, shirt_contrast_outsite_no_3, shirt_outsite_placket, shirt_piping_option, shirt_piping_option_yes, shirt_piping_option_yes_color, shirt_piping_option_yes_fabric, shirt_shoulder_apaulletes, shirt_arm_loops, shirt_position, shirt_design, shirt_initial_or_name, shirt_embroidery_color, shirt_brand, shirt_date, shirt_time, shirt_ip, shirt_status) VALUES ('$id_shirt', '$order_id_same', '$product_id', '$shirt_customer_name', '$shirt_order_no', '$shirt_order_date', '$shirt_delivery_date', '$shirt_fabric_no_1', '$shirt_collar_style', '$shirt_collar_button_option', '$shirt_collar_stay_a', '$shirt_collar_stay_b', '$shirt_size_of_collar_option', '$shirt_size_of_back_collar_size_of_band', '$shirt_cuff_style', '$shirt_placket', '$shirt_yoke_style', '$shirt_back', '$shirt_pocket', '$shirt_no_pocket', '$shirt_bottom', '$shirt_shirt_button_number', '$shirt_collar_button_hole_color', '$shirt_cuff_button_hole_color', '$shirt_thread_on_color', '$shirt_contrast', '$shirt_contrast_inside_no_1', '$shirt_contrast_inside_no_2', '$shirt_contrast_inside_no_3', '$shirt_inside_placket', '$shirt_contrast_outsite_no_1', '$shirt_contrast_outsite_no_2', '$shirt_contrast_outsite_no_3', '$shirt_outsite_placket', '$shirt_piping_option', '$shirt_piping_option_yes', '$shirt_piping_option_yes_color', '$shirt_piping_option_yes_fabric', '$shirt_shoulder_apaulletes', '$shirt_arm_loops', '$shirt_position', '$shirt_design', '$shirt_initial_or_name', '$shirt_embroidery_color', '$shirt_brand', '$shirt_date', '$shirt_time', '$shirt_ip', '$shirt_status') ";
$query8 = mysql_query($sql8) or die("Can't Query8");

$sql9 = " INSERT INTO customize_shirt_measurements (id, order_id, product_id, shirt_measurement_sex, shirt_measurement_sleeves, shirt_measurement_fit, shirt_measurement, shirt_measurement_shirt_length, shirt_measurement_chest, shirt_measurement_waist_only, shirt_measurement_hips, shirt_measurement_shoulders, shirt_measurement_sleeves_right, shirt_measurement_sleeves_left, shirt_measurement_neck, shirt_measurement_biceps, shirt_measurement_back_length, shirt_measurement_forearm, shirt_measurement_cuff_right, shirt_measurement_cuff_left, shirt_measurement_arm_hole, shirt_measurement_shoulder, shirt_measurement_waist, shirt_measurement_chest_body, shirt_body_front, shirt_body_left, shirt_body_right, shirt_body_back, shirt_remark, shirt_date, shirt_time, shirt_ip, shirt_status) VALUES ('$id_shirt', '$order_id_same', '$product_id', '$shirt_measurement_sex', '$shirt_measurement_sleeves', '$shirt_measurement_fit', '$shirt_measurement', '$shirt_measurement_shirt_length', '$shirt_measurement_chest', '$shirt_measurement_waist_only', '$shirt_measurement_hips', '$shirt_measurement_shoulders', '$shirt_measurement_sleeves_right', '$shirt_measurement_sleeves_left', '$shirt_measurement_neck', '$shirt_measurement_biceps', '$shirt_measurement_back_length', '$shirt_measurement_forearm', '$shirt_measurement_cuff_right', '$shirt_measurement_cuff_left', '$shirt_measurement_arm_hole', '$shirt_measurement_shoulder', '$shirt_measurement_waist', '$shirt_measurement_chest_body', '$shirt_body_front', '$shirt_body_left', '$shirt_body_right', '$shirt_body_back', '$shirt_remark', '$shirt_date', '$shirt_time', '$shirt_ip', '$shirt_status') ";
$query9 = mysql_query($sql9) or die("Can't Query9");

if($query9) {
	
	echo " <script language='javascript'> window.location='../../cart/single/index.php?orderid=".$order_id_same."'; </script> ";
	
}

mysql_close();
?>