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

$order_product = shirt;
$shirt_orderid = $_POST["shirt_orderid"];

if ($shirt_orderid != "") {
	
	$order_id = $shirt_orderid;
	
} else if ($shirt_orderid == "") {
	
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
$shirt_fabric_no_1 = $_POST["shirt_fabric_no_1"];

$sql4 =	" SELECT * FROM admin_fabrics_shirt WHERE fabricno = '$shirt_fabric_no_1' ";
$query4 = mysql_db_query($dbname, $sql4) or die("Can't Query4");
$row4 = mysql_fetch_array($query4);
$fabrics_type = $row4["type"];
$fabrics_brand = $row4["brand"];

if ($row4["type"] != '') {

$sql01 = " SELECT `fabrictype_".$id_user."` FROM admin_fabrictype WHERE fabrictype_name = '$fabrics_type' AND fabrictype_product = 'Shirt' ";
$query01 = mysql_db_query($dbname, $sql01) or die("Can't Query01");
$row01 = mysql_fetch_array($query01);
$shirt_fabric_price_1 = $row01["0"];

} else if ($row4["brand"] != '') {
	
$sql02 = " SELECT `fabricbrand_".$id_user."` FROM admin_fabricbrand WHERE fabricbrand_name = '$fabrics_brand' AND fabricbrand_product = 'Shirt' ";
$query02 = mysql_db_query($dbname, $sql02) or die("Can't Query02");
$row02 = mysql_fetch_array($query02);	
$shirt_fabric_price_1 = $row02["0"];
	
}

/*OTHER PRICING PARAMETERS*/
$shirt_measurement_chest = $_POST["shirt_measurement_chest"];
$shirt_measurement_waist_only = $_POST["shirt_measurement_waist_only"];
$shirt_measurement_hips = $_POST["shirt_measurement_hips"];

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
$shirt_shirt_button_number = $_POST["shirt_shirt_button_number"];

$sql10 = " SELECT price FROM admin_buttons_shirt WHERE buttonno = '$shirt_shirt_button_number' ";
$query10 = mysql_db_query($dbname, $sql10) or die("Can't Query10");
$row10 = mysql_fetch_array($query10);
$shirt_button_price = $row10["price"];

$shirt_button_price_1 = $price_size_3 + $shirt_button_price;

$shirt_contrast_inside_no_1 = $_POST["shirt_contrast_inside_no_1"];
if ($shirt_contrast_inside_no_1 == "") {
	$shirt_contrast_inside_no_1_price = 0;
} else if ($shirt_contrast_inside_no_1 != "") {
	$sqlprice1 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Inside Contrast Collar' ";
	$queryprice1 = mysql_db_query($dbname, $sqlprice1) or die("Can't QueryPrice1");
	$rowprice1 = mysql_fetch_array($queryprice1);
	$shirt_contrast_inside_no_1_price_extra = $rowprice1["0"];
	$shirt_contrast_inside_no_1_price = $shirt_contrast_inside_no_1_price_extra;
}

$shirt_contrast_inside_no_2 = $_POST["shirt_contrast_inside_no_2"];
if ($shirt_contrast_inside_no_2 == "") {
	$shirt_contrast_inside_no_2_price = 0;
} else if ($shirt_contrast_inside_no_2 != "") {
	$sqlprice2 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Inside Contrast Cuff' ";
	$queryprice2 = mysql_db_query($dbname, $sqlprice2) or die("Can't QueryPrice2");
	$rowprice2 = mysql_fetch_array($queryprice2);
	$shirt_contrast_inside_no_2_price_extra = $rowprice2["0"];
	$shirt_contrast_inside_no_2_price = $shirt_contrast_inside_no_2_price_extra;
}

$shirt_contrast_inside_no_3 = $_POST["shirt_contrast_inside_no_3"];
if ($shirt_contrast_inside_no_3 == "") {
	$shirt_contrast_inside_no_3_price = 0;
} else if ($shirt_contrast_inside_no_3 != "") {
	$sqlprice3 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Inside Contrast Placket' ";
	$queryprice3 = mysql_db_query($dbname, $sqlprice3) or die("Can't QueryPrice3");
	$rowprice3 = mysql_fetch_array($queryprice3);
	$shirt_contrast_inside_no_3_price_extra = $rowprice3["0"];
	$shirt_contrast_inside_no_3_price = $shirt_contrast_inside_no_3_price_extra;
}

$shirt_contrast_outsite_no_1 = $_POST["shirt_contrast_outsite_no_1"];
if ($shirt_contrast_outsite_no_1 == "") {
	$shirt_contrast_outsite_no_1_price = 0;
} else if ($shirt_contrast_outsite_no_1 != "") {
	$sqlprice4 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Outside Contrast Collar' ";
	$queryprice4 = mysql_db_query($dbname, $sqlprice4) or die("Can't QueryPrice4");
	$rowprice4 = mysql_fetch_array($queryprice4);
	$shirt_contrast_outsite_no_1_price_extra = $rowprice4["0"];
	$shirt_contrast_outsite_no_1_price = $shirt_contrast_outsite_no_1_price_extra;
}

$shirt_contrast_outsite_no_2 = $_POST["shirt_contrast_outsite_no_2"];
if ($shirt_contrast_outsite_no_2 == "") {
	$shirt_contrast_outsite_no_2_price = 0;
} else if ($shirt_contrast_outsite_no_2 != "") {
	$sqlprice5 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Outside Contrast Cuff' ";
	$queryprice5 = mysql_db_query($dbname, $sqlprice5) or die("Can't QueryPrice5");
	$rowprice5 = mysql_fetch_array($queryprice5);
	$shirt_contrast_outsite_no_2_price_extra = $rowprice5["0"];
	$shirt_contrast_outsite_no_2_price = $shirt_contrast_outsite_no_2_price_extra;
}

$shirt_contrast_outsite_no_3 = $_POST["shirt_contrast_outsite_no_3"];
if ($shirt_contrast_outsite_no_3 == "") {
	$shirt_contrast_outsite_no_3_price = 0;
} else if ($shirt_contrast_outsite_no_3 != "") {
	$sqlprice6 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Outside Contrast Placket' ";
	$queryprice6 = mysql_db_query($dbname, $sqlprice6) or die("Can't QueryPrice6");
	$rowprice6 = mysql_fetch_array($queryprice6);
	$shirt_contrast_outsite_no_3_price_extra = $rowprice6["0"];
	$shirt_contrast_outsite_no_3_price = $shirt_contrast_outsite_no_3_price_extra;
}

$shirt_shoulder_apaulletes = $_POST["shirt_shoulder_apaulletes"];
if ($shirt_shoulder_apaulletes != "1") {
	$shirt_shoulder_apaulletes_price = 0;
} else if ($shirt_shoulder_apaulletes == "1") {
	$sqlprice7 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Shoulder Apaulletes' ";
	$queryprice7 = mysql_db_query($dbname, $sqlprice7) or die("Can't QueryPrice7");
	$rowprice7 = mysql_fetch_array($queryprice7);
	$shirt_shoulder_apaulletes_price_extra = $rowprice7["0"];
	$shirt_shoulder_apaulletes_price = $shirt_shoulder_apaulletes_price_extra;
}

$shirt_arm_loops = $_POST["shirt_arm_loops"];
if ($shirt_arm_loops != "1") {
	$shirt_arm_loops_price = 0;
} else if ($shirt_arm_loops == "1") {
	$sqlprice8 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Arm Loops' ";
	$queryprice8 = mysql_db_query($dbname, $sqlprice8) or die("Can't QueryPrice8");
	$rowprice8 = mysql_fetch_array($queryprice8);
	$shirt_arm_loops_price_extra = $rowprice8["0"];
	$shirt_arm_loops_price = $shirt_arm_loops_price_extra;
}

$shirt_bottom = $_POST["shirt_bottom"];
if ($shirt_bottom != "4") {
	$shirt_bottom_pentagon_price = 0;
} else if ($shirt_bottom == "4") {
	$sqlprice9 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Pentagon Gusset' ";
	$queryprice9 = mysql_db_query($dbname, $sqlprice9) or die("Can't QueryPrice9");
	$rowprice9 = mysql_fetch_array($queryprice9);
	$shirt_bottom_pentagon_price_extra = $rowprice9["0"];
	$shirt_bottom_pentagon_price = $shirt_bottom_pentagon_price_extra;
}

$shirt_bottom = $_POST["shirt_bottom"];
if ($shirt_bottom != "5") {
	$shirt_bottom_triangle_price = 0;
} else if ($shirt_bottom == "5") {
	$sqlprice10 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Triangle Gusset' ";
	$queryprice10 = mysql_db_query($dbname, $sqlprice10) or die("Can't QueryPrice10");
	$rowprice10 = mysql_fetch_array($queryprice10);
	$shirt_bottom_triangle_price_extra = $rowprice10["0"];
	$shirt_bottom_triangle_price = $shirt_bottom_triangle_price_extra;
}

$shirt_initial_or_name = $_POST["shirt_initial_or_name"];
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

$shirt_position = $_POST["shirt_position"];
if ($shirt_position != "2" || $shirt_initial_or_name == "") {
	$shirt_position_chest_price = 0;
} else if ($shirt_position == "2" && $shirt_initial_or_name != "") {
	$sqlprice12 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Embroidery Chest' ";
	$queryprice12 = mysql_db_query($dbname, $sqlprice12) or die("Can't QueryPrice12");
	$rowprice12 = mysql_fetch_array($queryprice12);
	$shirt_position_chest_price_extra = $rowprice12["0"];
	$shirt_position_chest_price = $shirt_position_chest_price_extra;
}

$shirt_position = $_POST["shirt_position"];
if ($shirt_position != "3" || $shirt_initial_or_name == "") {
	$shirt_position_insidecollar_price = 0;
} else if ($shirt_position == "3" && $shirt_initial_or_name != "") {
	$sqlprice13 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Embroidery Inside Collar' ";
	$queryprice13 = mysql_db_query($dbname, $sqlprice13) or die("Can't QueryPrice13");
	$rowprice13 = mysql_fetch_array($queryprice13);
	$shirt_position_insidecollar_price_extra = $rowprice13["0"];
	$shirt_position_insidecollar_price = $shirt_position_insidecollar_price_extra;
}

$shirt_position = $_POST["shirt_position"];
if ($shirt_position != "4" || $shirt_initial_or_name == "") {
	$shirt_position_outsidebackcollar_price = 0;
} else if ($shirt_position == "4" && $shirt_initial_or_name != "") {
	$sqlprice14 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Embroidery Outside Back Collar' ";
	$queryprice14 = mysql_db_query($dbname, $sqlprice14) or die("Can't QueryPrice14");
	$rowprice14 = mysql_fetch_array($queryprice14);
	$shirt_position_outsidebackcollar_price_extra = $rowprice14["0"];
	$shirt_position_outsidebackcollar_price = $shirt_position_outsidebackcollar_price_extra;
}

$shirt_position = $_POST["shirt_position"];
if ($shirt_position != "5" || $shirt_initial_or_name == "") {
	$shirt_position_insideyoke_price = 0;
} else if ($shirt_position == "5" && $shirt_initial_or_name != "") {
	$sqlprice15 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Embroidery Inside Yoke' ";
	$queryprice15 = mysql_db_query($dbname, $sqlprice15) or die("Can't QueryPrice15");
	$rowprice15 = mysql_fetch_array($queryprice15);
	$shirt_position_insideyoke_price_extra = $rowprice15["0"];
	$shirt_position_insideyoke_price = $shirt_position_insideyoke_price_extra;
}

$shirt_position = $_POST["shirt_position"];
if ($shirt_position != "6" || $shirt_initial_or_name == "") {
	$shirt_position_stomach_price = 0;
} else if ($shirt_position == "6" && $shirt_initial_or_name != "") {
	$sqlprice16 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Embroidery Stomach' ";
	$queryprice16 = mysql_db_query($dbname, $sqlprice16) or die("Can't QueryPrice16");
	$rowprice16 = mysql_fetch_array($queryprice16);
	$shirt_position_stomach_price_extra = $rowprice16["0"];
	$shirt_position_stomach_price = $shirt_position_stomach_price_extra;
}

$shirt_position = $_POST["shirt_position"];
if ($shirt_position != "7" || $shirt_initial_or_name == "") {
	$shirt_position_bottom_price = 0;
} else if ($shirt_position == "7" && $shirt_initial_or_name != "") {
	$sqlprice17 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Embroidery Bottom' ";
	$queryprice17 = mysql_db_query($dbname, $sqlprice17) or die("Can't QueryPrice17");
	$rowprice17 = mysql_fetch_array($queryprice17);
	$shirt_position_bottom_price_extra = $rowprice17["0"];
	$shirt_position_bottom_price = $shirt_position_bottom_price_extra;
}

$shirt_brand = $_POST["shirt_brand"];
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

/*CUSTOMER*/
$shirt_customer_name = $_POST["shirt_customer_name"];
$shirt_order_no = $_POST["shirt_order_no"];
$shirt_order_date = date("m/d/Y");
$shirt_delivery_date = $_POST["shirt_delivery_date"];

/*CUSTOMIZE*/
$shirt_collar_style = $_POST["shirt_collar_style"];
$shirt_collar_button_option = $_POST["shirt_collar_button_option"];
$shirt_collar_stay_a = $_POST["shirt_collar_stay_a"];
$shirt_collar_stay_b = $_POST["shirt_collar_stay_b"];
$shirt_size_of_collar_option = $_POST["shirt_size_of_collar_option"];
$shirt_size_of_back_collar_size_of_band = $_POST["shirt_size_of_back_collar_size_of_band"];
$shirt_cuff_style = $_POST["shirt_cuff_style"];
$shirt_placket = $_POST["shirt_placket"];
$shirt_yoke_style = $_POST["shirt_yoke_style"];
$shirt_back = $_POST["shirt_back"];
$shirt_pocket = $_POST["shirt_pocket"];
$shirt_no_pocket = $_POST["shirt_no_pocket"];
$shirt_bottom = $_POST["shirt_bottom"];
$shirt_shirt_button_number = $_POST["shirt_shirt_button_number"];
$shirt_collar_button_hole_color = $_POST["shirt_collar_button_hole_color"];
$shirt_cuff_button_hole_color = $_POST["shirt_cuff_button_hole_color"];
$shirt_thread_on_color = $_POST["shirt_thread_on_color"];
$shirt_contrast = $_POST["shirt_contrast"];
$shirt_contrast_inside_no_1 = $_POST["shirt_contrast_inside_no_1"];
$shirt_contrast_inside_no_2 = $_POST["shirt_contrast_inside_no_2"];
$shirt_contrast_inside_no_3 = $_POST["shirt_contrast_inside_no_3"];
$shirt_inside_placket = $_POST["shirt_inside_placket"];
$shirt_contrast_outsite_no_1 = $_POST["shirt_contrast_outsite_no_1"];
$shirt_contrast_outsite_no_2 = $_POST["shirt_contrast_outsite_no_2"];
$shirt_contrast_outsite_no_3 = $_POST["shirt_contrast_outsite_no_3"];
$shirt_outsite_placket = $_POST["shirt_outsite_placket"];
$shirt_piping_option = $_POST["shirt_piping_option"];
$shirt_piping_option_yes = $_POST["shirt_piping_option_yes"];
$shirt_piping_option_yes_color = $_POST["shirt_piping_option_yes_color"];
$shirt_piping_option_yes_fabric = $_POST["shirt_piping_option_yes_fabric"];
$shirt_shoulder_apaulletes = $_POST["shirt_shoulder_apaulletes"];
$shirt_arm_loops = $_POST["shirt_arm_loops"];
$shirt_position = $_POST["shirt_position"];
$shirt_design = $_POST["shirt_design"];
$shirt_initial_or_name = $_POST["shirt_initial_or_name"];
$shirt_embroidery_color = $_POST["shirt_embroidery_color"];
$shirt_brand = $_POST["shirt_brand"];


/*MEASUREMENTS*/
$shirt_measurement_sex = $_POST["shirt_measurement_sex"];
$shirt_measurement_sleeves = $_POST["shirt_measurement_sleeves"];
$shirt_measurement_fit = $_POST["shirt_measurement_fit"];
$shirt_measurement = $_POST["shirt_measurement"];
$shirt_measurement_shirt_length = $_POST["shirt_measurement_shirt_length"];
$shirt_measurement_shoulders = $_POST["shirt_measurement_shoulders"];
$shirt_measurement_sleeves_right = $_POST["shirt_measurement_sleeves_right"];
$shirt_measurement_sleeves_left = $_POST["shirt_measurement_sleeves_left"];
$shirt_measurement_neck = $_POST["shirt_measurement_neck"];
$shirt_measurement_biceps = $_POST["shirt_measurement_biceps"];
$shirt_measurement_back_length = $_POST["shirt_measurement_back_length"];
$shirt_measurement_forearm = $_POST["shirt_measurement_forearm"];
$shirt_measurement_cuff_right = $_POST["shirt_measurement_cuff_right"];
$shirt_measurement_cuff_left = $_POST["shirt_measurement_cuff_left"];
$shirt_measurement_arm_hole = $_POST["shirt_measurement_arm_hole"];
$shirt_measurement_shoulder = $_POST["shirt_measurement_shoulder"];
$shirt_measurement_waist = $_POST["shirt_measurement_waist"];
$shirt_measurement_chest_body = $_POST["shirt_measurement_chest_body"];
$shirt_body_front = $_POST["shirt_body_front"];
$shirt_body_left = $_POST["shirt_body_left"];
$shirt_body_right = $_POST["shirt_body_right"];
$shirt_body_back = $_POST["shirt_body_back"];
$shirt_remark = $_POST["shirt_remark"];

/*ECT*/
$shirt_date = date("m/d/Y");
$shirt_time = date("H:i:s");
$shirt_ip = $_POST['ip'];
$shirt_status = T;

/*FABRIC 1*/
if ($shirt_fabric_no_1 != "") {

$sql11 = " SELECT MAX(id) FROM customize_order ";
$query11 = mysql_db_query($dbname, $sql11) or die("Can't Query11");
$row11 = mysql_fetch_array($query11);
$id_order = $row11[0] + 1 ;

$sql12 =	" SELECT MAX(product_id) FROM customize_order";
$query12 = mysql_db_query($dbname, $sql12) or die("Can't Query12");
$row12 = mysql_fetch_array($query12);
$product_id = $row12[0] + 1 ;

$sql13 =	" SELECT MAX(id) FROM customize_shirt_design ";
$query13 = mysql_db_query($dbname, $sql13) or die("Can't Query13");
$row13 = mysql_fetch_array($query13);
$id_shirt = $row13[0] + 1 ;

$sql14 = " INSERT INTO customize_order (id, order_id, product_id, order_reseller, order_order_no, order_name_customize, order_my_price, order_price, order_product, order_fabric_no, order_date, order_time, order_ip, order_status) VALUES ('$id_order', '$order_id', '$product_id', '$company_user', '$shirt_order_no', '$shirt_customer_name', '$shirt_my_price_1', '$shirt_price_1', '$order_product', '$shirt_fabric_no_1', '$shirt_date', '$shirt_time', '$shirt_ip', '$shirt_status') ";
$query14 = mysql_query($sql14) or die("Can't Query14");

$sql15 = " INSERT INTO customize_shirt_design (id, order_id, product_id, shirt_customer_name, shirt_order_no, shirt_order_date, shirt_delivery_date, shirt_fabric_no, shirt_collar_style, shirt_collar_button_option, shirt_collar_stay_a, shirt_collar_stay_b, shirt_size_of_collar_option, shirt_size_of_back_collar_size_of_band, shirt_cuff_style, shirt_placket, shirt_yoke_style, shirt_back, shirt_pocket, shirt_no_pocket, shirt_bottom, shirt_shirt_button_number, shirt_collar_button_hole_color, shirt_cuff_button_hole_color, shirt_thread_on_color, shirt_contrast, shirt_contrast_inside_no_1, shirt_contrast_inside_no_2, shirt_contrast_inside_no_3, shirt_inside_placket, shirt_contrast_outsite_no_1, shirt_contrast_outsite_no_2, shirt_contrast_outsite_no_3, shirt_outsite_placket, shirt_piping_option, shirt_piping_option_yes, shirt_piping_option_yes_color, shirt_piping_option_yes_fabric, shirt_shoulder_apaulletes, shirt_arm_loops, shirt_position, shirt_design, shirt_initial_or_name, shirt_embroidery_color, shirt_brand, shirt_date, shirt_time, shirt_ip, shirt_status) VALUES ('$id_shirt', '$order_id', '$product_id', '$shirt_customer_name', '$shirt_order_no', '$shirt_order_date', '$shirt_delivery_date', '$shirt_fabric_no_1', '$shirt_collar_style', '$shirt_collar_button_option', '$shirt_collar_stay_a', '$shirt_collar_stay_b', '$shirt_size_of_collar_option', '$shirt_size_of_back_collar_size_of_band', '$shirt_cuff_style', '$shirt_placket', '$shirt_yoke_style', '$shirt_back', '$shirt_pocket', '$shirt_no_pocket', '$shirt_bottom', '$shirt_shirt_button_number', '$shirt_collar_button_hole_color', '$shirt_cuff_button_hole_color', '$shirt_thread_on_color', '$shirt_contrast', '$shirt_contrast_inside_no_1', '$shirt_contrast_inside_no_2', '$shirt_contrast_inside_no_3', '$shirt_inside_placket', '$shirt_contrast_outsite_no_1', '$shirt_contrast_outsite_no_2', '$shirt_contrast_outsite_no_3', '$shirt_outsite_placket', '$shirt_piping_option', '$shirt_piping_option_yes', '$shirt_piping_option_yes_color', '$shirt_piping_option_yes_fabric', '$shirt_shoulder_apaulletes', '$shirt_arm_loops', '$shirt_position', '$shirt_design', '$shirt_initial_or_name', '$shirt_embroidery_color', '$shirt_brand', '$shirt_date', '$shirt_time', '$shirt_ip', '$shirt_status') ";
$query15 = mysql_query($sql15) or die("Can't Query15");

$sql16 = " INSERT INTO customize_shirt_measurements (id, order_id, product_id, shirt_measurement_sex, shirt_measurement_sleeves, shirt_measurement_fit, shirt_measurement, shirt_measurement_shirt_length, shirt_measurement_chest, shirt_measurement_waist_only, shirt_measurement_hips, shirt_measurement_shoulders, shirt_measurement_sleeves_right, shirt_measurement_sleeves_left, shirt_measurement_neck, shirt_measurement_biceps, shirt_measurement_back_length, shirt_measurement_forearm, shirt_measurement_cuff_right, shirt_measurement_cuff_left, shirt_measurement_arm_hole, shirt_measurement_shoulder, shirt_measurement_waist, shirt_measurement_chest_body, shirt_remark, shirt_date, shirt_time, shirt_ip, shirt_status) VALUES ('$id_shirt', '$order_id', '$product_id', '$shirt_measurement_sex', '$shirt_measurement_sleeves', '$shirt_measurement_fit', '$shirt_measurement', '$shirt_measurement_shirt_length', '$shirt_measurement_chest', '$shirt_measurement_waist_only', '$shirt_measurement_hips', '$shirt_measurement_shoulders', '$shirt_measurement_sleeves_right', '$shirt_measurement_sleeves_left', '$shirt_measurement_neck', '$shirt_measurement_biceps', '$shirt_measurement_back_length', '$shirt_measurement_forearm', '$shirt_measurement_cuff_right', '$shirt_measurement_cuff_left', '$shirt_measurement_arm_hole', '$shirt_measurement_shoulder', '$shirt_measurement_waist', '$shirt_measurement_chest_body', '$shirt_remark', '$shirt_date', '$shirt_time', '$shirt_ip', '$shirt_status') ";
$query16 = mysql_query($sql16) or die("Can't Query16");

$path = "../../images/body/shirt/front/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['shirt_body_front']['name'];
	$tmp = $_FILES['shirt_body_front']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$shirt_body_front_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$shirt_body_front_pic)){
				
				$sql17 = " UPDATE customize_shirt_measurements SET shirt_body_front = '".$shirt_body_front_pic."', shirt_date = '".$shirt_date."', shirt_time = '".$shirt_time."', shirt_ip = '".$shirt_ip."', shirt_status = '".$shirt_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query17 = mysql_db_query($dbname, $sql17) or die("Can't Query17");
			}
    
	} else {
				$sql17 = " UPDATE customize_shirt_measurements SET shirt_date = '".$shirt_date."', shirt_time = '".$shirt_time."', shirt_ip = '".$shirt_ip."', shirt_status = '".$shirt_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query17 = mysql_db_query($dbname, $sql17) or die("Can't Query17");
			}
	}
	
$path = "../../images/body/shirt/left/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['shirt_body_left']['name'];
	$tmp = $_FILES['shirt_body_left']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$shirt_body_left_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$shirt_body_left_pic)){
				
				$sql18 = " UPDATE customize_shirt_measurements SET shirt_body_left = '".$shirt_body_left_pic."', shirt_date = '".$shirt_date."', shirt_time = '".$shirt_time."', shirt_ip = '".$shirt_ip."', shirt_status = '".$shirt_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query18 = mysql_db_query($dbname, $sql18) or die("Can't Query18");
			}
    
	} else {
				$sql18 = " UPDATE customize_shirt_measurements SET shirt_date = '".$shirt_date."', shirt_time = '".$shirt_time."', shirt_ip = '".$shirt_ip."', shirt_status = '".$shirt_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query18 = mysql_db_query($dbname, $sql18) or die("Can't Query18");
			}
	}
	
$path = "../../images/body/shirt/right/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['shirt_body_right']['name'];
	$tmp = $_FILES['shirt_body_right']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$shirt_body_right_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$shirt_body_right_pic)){
				
				$sql19 = " UPDATE customize_shirt_measurements SET shirt_body_right = '".$shirt_body_right_pic."', shirt_date = '".$shirt_date."', shirt_time = '".$shirt_time."', shirt_ip = '".$shirt_ip."', shirt_status = '".$shirt_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query19 = mysql_db_query($dbname, $sql19) or die("Can't Query19");
			}
    
	} else {
				$sql19 = " UPDATE customize_shirt_measurements SET shirt_date = '".$shirt_date."', shirt_time = '".$shirt_time."', shirt_ip = '".$shirt_ip."', shirt_status = '".$shirt_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query19 = mysql_db_query($dbname, $sql19) or die("Can't Query19");
			}
	}
	
$path = "../../images/body/shirt/back/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['shirt_body_back']['name'];
	$tmp = $_FILES['shirt_body_back']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$shirt_body_back_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$shirt_body_back_pic)){
				
				$sql20 = " UPDATE customize_shirt_measurements SET shirt_body_back = '".$shirt_body_back_pic."', shirt_date = '".$shirt_date."', shirt_time = '".$shirt_time."', shirt_ip = '".$shirt_ip."', shirt_status = '".$shirt_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query20 = mysql_db_query($dbname, $sql20) or die("Can't Query20");
			}
    
	} else {
				$sql20 = " UPDATE customize_shirt_measurements SET shirt_date = '".$shirt_date."', shirt_time = '".$shirt_time."', shirt_ip = '".$shirt_ip."', shirt_status = '".$shirt_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query20 = mysql_db_query($dbname, $sql20) or die("Can't Query20");
			}
	}

} else if ($shirt_fabric_no_1 == "") { }

if ($shirt_orderid != "") {
	
	$sql21 = " UPDATE customize_checkout SET checkout_company = '$company_user', checkout_order = '$shirt_order_no', checkout_date = '$shirt_date', checkout_time = '$shirt_time', checkout_ip = '$shirt_ip', checkout_status = '$shirt_status' WHERE checkout_orderid = '$order_id' ";
	$query21 = mysql_query($sql21) or die("Can't Query21");
	
} else if ($shirt_orderid == "") {
	
	$sql21 = " INSERT INTO customize_checkout (id, checkout_company, checkout_order, checkout_orderid, checkout_date, checkout_time, checkout_ip, checkout_status) VALUES ('$id_customize_checkout', '$company_user', '$shirt_order_no', '$order_id', '$shirt_date', '$shirt_time', '$shirt_ip', '$shirt_status') ";
	$query21 = mysql_query($sql21) or die("Can't Query21");
	
}

if($query21) {
	
	echo " <script language='javascript'> window.location='../../cart/single/index.php?orderid=".$order_id."'; </script> ";
	
}

mysql_close();
?>