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

/*OTHER PRICING PARAMETERS*/
$vest_vest_measurement_chest = $_POST["vest_vest_measurement_chest"];
$vest_vest_measurement_waist_upper = $_POST["vest_vest_measurement_waist_upper"];
$vest_vest_measurement_waist_lower = $_POST["vest_vest_measurement_waist_lower"];
$vest_vest_measurement_hips = $_POST["vest_vest_measurement_hips"];

if (($vest_vest_measurement_chest >= '50' && $vest_vest_measurement_chest <= '52') || ($vest_vest_measurement_waist_upper >= '50' && $vest_vest_measurement_waist_upper <= '52') || ($vest_vest_measurement_waist_lower >= '50' && $vest_vest_measurement_waist_lower <= '52') || ($vest_vest_measurement_hips >= '50' && $vest_vest_measurement_hips <= '52')) {
	
	$price_size_1 = $vest_fabric_price_1 * 20;
	$price_size_2 = $price_size_1 / 100;
	$price_size_3 = $price_size_2 + $vest_fabric_price_1;
	
} else if (($vest_vest_measurement_chest >= '52.5' && $vest_vest_measurement_chest <= '56') || ($vest_vest_measurement_waist_upper >= '52.5' && $vest_vest_measurement_waist_upper <= '56') || ($vest_vest_measurement_waist_lower >= '52.5' && $vest_vest_measurement_waist_lower <= '56') || ($vest_vest_measurement_hips >= '52.5' && $vest_vest_measurement_hips <= '56')) {
	
	$price_size_1 = $vest_fabric_price_1 * 30;
	$price_size_2 = $price_size_1 / 100;
	$price_size_3 = $price_size_2 + $vest_fabric_price_1;
	
} else if (($vest_vest_measurement_chest >= '56.5' && $vest_vest_measurement_chest <= '60') || ($vest_vest_measurement_waist_upper >= '56.5' && $vest_vest_measurement_waist_upper <= '60') || ($vest_vest_measurement_waist_lower >= '56.5' && $vest_vest_measurement_waist_lower <= '60') || ($vest_vest_measurement_hips >= '56.5' && $vest_vest_measurement_hips <= '60')) {
	
	$price_size_1 = $vest_fabric_price_1 * 40;
	$price_size_2 = $price_size_1 / 100;
	$price_size_3 = $price_size_2 + $vest_fabric_price_1;
	
} else if (($vest_vest_measurement_chest >= '60.5' && $vest_vest_measurement_chest <= '64') || ($vest_vest_measurement_waist_upper >= '60.5' && $vest_vest_measurement_waist_upper <= '64') || ($vest_vest_measurement_waist_lower >= '60.5' && $vest_vest_measurement_waist_lower <= '64') || ($vest_vest_measurement_hips >= '60.5' && $vest_vest_measurement_hips <= '64')) {
	
	$price_size_1 = $vest_fabric_price_1 * 50;
	$price_size_2 = $price_size_1 / 100;
	$price_size_3 = $price_size_2 + $vest_fabric_price_1;
	
} else if (($vest_vest_measurement_chest >= '64.5' && $vest_vest_measurement_chest <= '68') || ($vest_vest_measurement_waist_upper >= '64.5' && $vest_vest_measurement_waist_upper <= '68') || ($vest_vest_measurement_waist_lower >= '64.5' && $vest_vest_measurement_waist_lower <= '68') || ($vest_vest_measurement_hips >= '64.5' && $vest_vest_measurement_hips <= '68')) {
	
	$price_size_1 = $vest_fabric_price_1 * 60;
	$price_size_2 = $price_size_1 / 100;
	$price_size_3 = $price_size_2 + $vest_fabric_price_1;
	
}  else {
	
	$price_size_3 = $vest_fabric_price_1;
	
}

/*BUTTON*/
$vest_vest_button_number = $_POST["vest_vest_button_number"];

$sql10 = " SELECT price FROM admin_buttons_suits WHERE buttonno = '$vest_vest_button_number' ";
$query10 = mysql_db_query($dbname, $sql10) or die("Can't Query10");
$row10 = mysql_fetch_array($query10);
$vest_button_price = $row10["price"];

$vest_price_1 = $price_size_3 + $vest_button_price;

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
$vest_vest_measurement_shoulders = $_POST["vest_vest_measurement_shoulders"];
$vest_vest_measurement_sleeves_right = $_POST["vest_vest_measurement_sleeves_right"];
$vest_vest_measurement_sleeves_left = $_POST["vest_vest_measurement_sleeves_left"];
$vest_vest_measurement_neck = $_POST["vest_vest_measurement_neck"];
$vest_vest_measurement_ptp_front = $_POST["vest_vest_measurement_ptp_front"];
$vest_vest_measurement_ptp_back = $_POST["vest_vest_measurement_ptp_back"];
$vest_vest_measurement_arm_hole = $_POST["vest_vest_measurement_arm_hole"];
$vest_vest_measurement_biceps = $_POST["vest_vest_measurement_biceps"];
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

$sql14 = " INSERT INTO customize_order (id, order_id, product_id, order_reseller, order_order_no, order_name_customize, order_price, order_product, order_fabric_no, order_date, order_time, order_ip, order_status) VALUES ('$id_order', '$order_id', '$product_id', '$company_user', '$vest_order_no', '$vest_customer_name', '$vest_price_1', '$order_product', '$vest_fabric_no_1', '$vest_date', '$vest_time', '$vest_ip', '$vest_status') ";
$query14 = mysql_query($sql14) or die("Can't Query14");

$sql15 = " INSERT INTO customize_vest_design (id, order_id, product_id, vest_customer_name, vest_order_no, vest_order_date, vest_delivery_date, vest_fabric_no, vest_lining_no, vest_vest_button, vest_vest_lapel_style, vest_vest_chest_pocket, vest_vest_bottom_pocket, vest_vest_bottom_of_vest, vest_vest_belt_at_back, vest_vest_lining_option, vest_vest_button_number, vest_vest_thread_on_button, vest_vest_button_hole_color, vest_date, vest_time, vest_ip, vest_status) VALUES ('$id_vest', '$order_id', '$product_id', '$vest_customer_name', '$vest_order_no', '$vest_order_date', '$vest_delivery_date', '$vest_fabric_no_1', '$vest_lining_no_1', '$vest_vest_button', '$vest_vest_lapel_style', '$vest_vest_chest_pocket', '$vest_vest_bottom_pocket', '$vest_vest_bottom_of_vest', '$vest_vest_belt_at_back', '$vest_vest_lining_option', '$vest_vest_button_number', '$vest_vest_thread_on_button', '$vest_vest_button_hole_color', '$vest_date', '$vest_time', '$vest_ip', '$vest_status') ";
$query15 = mysql_query($sql15) or die("Can't Query15");

$sql16 = " INSERT INTO customize_vest_measurements (id, order_id, product_id, vest_vest_measurement_sex, vest_vest_measurement_fit, vest_vest_measurement, vest_vest_measurement_vest_length, vest_vest_measurement_back_lenght, vest_vest_measurement_chest, vest_vest_measurement_waist_upper, vest_vest_measurement_waist_lower, vest_vest_measurement_hips, vest_vest_measurement_shoulders, vest_vest_measurement_sleeves_right, vest_vest_measurement_sleeves_left, vest_vest_measurement_neck, vest_vest_measurement_ptp_front, vest_vest_measurement_ptp_back, vest_vest_measurement_arm_hole, vest_vest_measurement_biceps, vest_measurement_jacket_shoulder, vest_measurement_jacket_waist, vest_measurement_jacket_chest, vest_remark, vest_date, vest_time, vest_ip, vest_status) VALUES ('$id_vest', '$order_id', '$product_id', '$vest_vest_measurement_sex', '$vest_vest_measurement_fit', '$vest_vest_measurement', '$vest_vest_measurement_vest_length', '$vest_vest_measurement_back_lenght', '$vest_vest_measurement_chest', '$vest_vest_measurement_waist_upper', '$vest_vest_measurement_waist_lower', '$vest_vest_measurement_hips', '$vest_vest_measurement_shoulders', '$vest_vest_measurement_sleeves_right', '$vest_vest_measurement_sleeves_left', '$vest_vest_measurement_neck', '$vest_vest_measurement_ptp_front', '$vest_vest_measurement_ptp_back', '$vest_vest_measurement_arm_hole', '$vest_vest_measurement_biceps', '$vest_measurement_jacket_shoulder', '$vest_measurement_jacket_waist', '$vest_measurement_jacket_chest', '$vest_remark', '$vest_date', '$vest_time', '$vest_ip', '$vest_status') ";
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

if ($vest_orderid != "") {
	
	$sql21 = " UPDATE customize_checkout SET checkout_company = '$company_user', checkout_order = '$vest_order_no', checkout_date = '$vest_date', checkout_time = '$vest_time', checkout_ip = '$vest_ip', checkout_status = '$vest_status' WHERE checkout_orderid = '$order_id' ";
	$query21 = mysql_query($sql21) or die("Can't Query21");
	
} else if ($vest_orderid == "") {
	
	$sql21 = " INSERT INTO customize_checkout (id, checkout_company, checkout_order, checkout_orderid, checkout_date, checkout_time, checkout_ip, checkout_status) VALUES ('$id_customize_checkout', '$company_user', '$vest_order_no', '$order_id', '$vest_date', '$vest_time', '$vest_ip', '$vest_status') ";
	$query21 = mysql_query($sql21) or die("Can't Query21");
	
}

if($query21) {
	
	echo " <script language='javascript'> window.location='../../../cart/single/index.php?orderid=".$order_id."'; </script> ";
	
}

mysql_close();
?>