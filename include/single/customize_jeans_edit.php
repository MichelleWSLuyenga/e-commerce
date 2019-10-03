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
$order_id = $_POST["jeans_orderid"];
$product_id = $_POST["jeans_productid"];

/*FABRIC*/
$jeans_fabric_no_1 = $_POST["jeans_fabric_no_1"];

$sql1 =	" SELECT * FROM admin_fabrics_jeans WHERE fabricno = '$jeans_fabric_no_1' ";
$query1 = mysql_db_query($dbname, $sql1) or die("Can't Query1");
$row1 = mysql_fetch_array($query1);
$fabrics_type = $row1["type"];
$fabrics_brand = $row1["brand"];

if ($row1["type"] != '') {

$sql01 = " SELECT `fabrictype_".$id_user."` FROM admin_fabrictype WHERE fabrictype_name = '$fabrics_type' AND fabrictype_product = 'Jeans' ";
$query01 = mysql_db_query($dbname, $sql01) or die("Can't Query01");
$row01 = mysql_fetch_array($query01);
$jeans_fabric_price_1 = $row01["0"];

} else if ($row1["brand"] != '') {
	
$sql02 = " SELECT `fabricbrand_".$id_user."` FROM admin_fabricbrand WHERE fabricbrand_name = '$fabrics_brand' AND fabricbrand_product = 'Jeans' ";
$query02 = mysql_db_query($dbname, $sql02) or die("Can't Query02");
$row02 = mysql_fetch_array($query02);	
$jeans_fabric_price_1 = $row02["0"];
	
}

/*OTHER PRICING PARAMETERS*/
$jeans_measurement_waist = $_POST["jeans_measurement_waist"];
$jeans_measurement_hips = $_POST["jeans_measurement_hips"];

if (($jeans_measurement_waist >= '50' && $jeans_measurement_waist <= '52') || ($jeans_measurement_hips >= '50' && $jeans_measurement_hips <= '52')) {
	
	$price_size_1 = $jeans_fabric_price_1 * 20;
	$price_size_2 = $price_size_1 / 100;
	$price_size_3 = $price_size_2 + $jeans_fabric_price_1;
	
} else if (($jeans_measurement_waist >= '52.5' && $jeans_measurement_waist <= '56') || ($jeans_measurement_hips >= '52.5' && $jeans_measurement_hips <= '56')) {
	
	$price_size_1 = $jeans_fabric_price_1 * 30;
	$price_size_2 = $price_size_1 / 100;
	$price_size_3 = $price_size_2 + $jeans_fabric_price_1;
	
} else if (($jeans_measurement_waist >= '56.5' && $jeans_measurement_waist <= '60') || ($jeans_measurement_hips >= '56.5' && $jeans_measurement_hips <= '60')) {
	
	$price_size_1 = $jeans_fabric_price_1 * 40;
	$price_size_2 = $price_size_1 / 100;
	$price_size_3 = $price_size_2 + $jeans_fabric_price_1;
	
} else if (($jeans_measurement_waist >= '60.5' && $jeans_measurement_waist <= '64') || ($jeans_measurement_hips >= '60.5' && $jeans_measurement_hips <= '64')) {
	
	$price_size_1 = $jeans_fabric_price_1 * 50;
	$price_size_2 = $price_size_1 / 100;
	$price_size_3 = $price_size_2 + $jeans_fabric_price_1;
	
} else if (($jeans_measurement_waist >= '64.5' && $jeans_measurement_waist <= '68') || ($jeans_measurement_hips >= '64.5' && $jeans_measurement_hips <= '68')) {
	
	$price_size_1 = $jeans_fabric_price_1 * 60;
	$price_size_2 = $price_size_1 / 100;
	$price_size_3 = $price_size_2 + $jeans_fabric_price_1;
	
}  else {
	
	$price_size_3 = $jeans_fabric_price_1;
	
}

$jeans_price_1 = $price_size_3;

/*MY PRICES*/

$sqlmy1 = " SELECT * FROM admin_fabrics_jeans WHERE fabricno = '$jeans_fabric_no_1' ";
$querymy1 = mysql_db_query($dbname, $sqlmy1) or die("Can't Querymy1");
$rowmy1 = mysql_fetch_array($querymy1);
$fabrics_my_type = $rowmy1["type"];
$fabrics_my_brand = $rowmy1["brand"];

if ($rowmy1["type"] != '') {

$sqlmy01 = " SELECT `fabrictypereseller_".$id_user."` FROM admin_fabrictype WHERE fabrictype_name = '$fabrics_my_type' AND fabrictype_product = 'Jeans' ";
$querymy01 = mysql_db_query($dbname, $sqlmy01) or die("Can't Querymy01");
$rowmy01 = mysql_fetch_array($querymy01);
$jeans_fabric_my_price_1 = $rowmy01["0"];

} else if ($rowmy1["brand"] != '') {
	
$sqlmy02 = " SELECT `fabricbrand_".$id_user."` FROM admin_fabricbrand WHERE fabricbrand_name = '$fabrics_my_brand' AND fabricbrand_product = 'Jeans' ";
$querymy02 = mysql_db_query($dbname, $sqlmy02) or die("Can't Querymy02");
$rowmy02 = mysql_fetch_array($querymy02);	
$jeans_fabric_my_price_1 = $rowmy02["0"];
	
}

/*OTHER PRICING PARAMETERS*/
$jeans_measurement_waist = $_POST["jeans_measurement_waist"];
$jeans_measurement_hips = $_POST["jeans_measurement_hips"];

if (($jeans_measurement_waist >= '50' && $jeans_measurement_waist <= '52') || ($jeans_measurement_hips >= '50' && $jeans_measurement_hips <= '52')) {
	
	$price_my_size_1 = $jeans_my_fabric_price_1 * 20;
	$price_my_size_2 = $price_my_size_1 / 100;
	$price_my_size_3 = $price_my_size_2 + $jeans_fabric_my_price_1;
	
} else if (($jeans_measurement_waist >= '52.5' && $jeans_measurement_waist <= '56') || ($jeans_measurement_hips >= '52.5' && $jeans_measurement_hips <= '56')) {
	
	$price_my_size_1 = $jeans_fabric_my_price_1 * 30;
	$price_my_size_2 = $price_my_size_1 / 100;
	$price_my_size_3 = $price_my_size_2 + $jeans_fabric_my_price_1;
	
} else if (($jeans_measurement_waist >= '56.5' && $jeans_measurement_waist <= '60') || ($jeans_measurement_hips >= '56.5' && $jeans_measurement_hips <= '60')) {
	
	$price_my_size_1 = $jeans_fabric_my_price_1 * 40;
	$price_my_size_2 = $price_my_size_1 / 100;
	$price_my_size_3 = $price_my_size_2 + $jeans_fabric_my_price_1;
	
} else if (($jeans_measurement_waist >= '60.5' && $jeans_measurement_waist <= '64') || ($jeans_measurement_hips >= '60.5' && $jeans_measurement_hips <= '64')) {
	
	$price_my_size_1 = $jeans_fabric_my_price_1 * 50;
	$price_my_size_2 = $price_my_size_1 / 100;
	$price_my_size_3 = $price_my_size_2 + $jeans_fabric_my_price_1;
	
} else if (($jeans_measurement_waist >= '64.5' && $jeans_measurement_waist <= '68') || ($jeans_measurement_hips >= '64.5' && $jeans_measurement_hips <= '68')) {
	
	$price_my_size_1 = $jeans_fabric_my_price_1 * 60;
	$price_my_size_2 = $price_my_size_1 / 100;
	$price_my_size_3 = $price_my_size_2 + $jeans_fabric_my_price_1;
	
}  else {
	
	$price_my_size_3 = $jeans_fabric_my_price_1;
	
}

$jeans_my_price_1 = $price_my_size_3;

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

$sql3 =	" UPDATE customize_order SET order_reseller = '$company_user', order_order_no = '$jeans_order_no', order_name_customize = '$jeans_customer_name', order_my_price = '$jeans_my_price_1', order_price = '$jeans_price_1', order_product = '$order_product', order_fabric_no = '$jeans_fabric_no_1', order_date = '$jeans_date', order_time = '$jeans_time', order_ip = '$jeans_ip', order_status = '$jeans_status' WHERE order_id = '$order_id' AND product_id = '$product_id' ";
$query3 = mysql_query($sql3) or die("Can't Query3");

$sql4 = " UPDATE customize_jeans_design SET jeans_customer_name = '$jeans_customer_name', jeans_order_no = '$jeans_order_no', jeans_order_date = '$jeans_order_date', jeans_delivery_date = '$jeans_delivery_date', jeans_fabric_no = '$jeans_fabric_no_1', jeans_pocketing = '$jeans_pocketing', jeans_front_pocket = '$jeans_front_pocket', jeans_back_pocket = '$jeans_back_pocket', jeans_coin_pocket = '$jeans_coin_pocket', jeans_fly = '$jeans_fly', jeans_embroidery = '$jeans_embroidery', jeans_embroidery_initial_or_name = '$jeans_embroidery_initial_or_name', jeans_embroidery_position = '$jeans_embroidery_position', jeans_leather_patch = '$jeans_leather_patch', jeans_thread = '$jeans_thread', jeans_buttons = '$jeans_buttons', jeans_fitting = '$jeans_fitting', jeans_wash = '$jeans_wash', jeans_date = '$jeans_date', jeans_time = '$jeans_time', jeans_ip = '$jeans_ip', jeans_status = '$jeans_status' WHERE order_id = '$order_id' AND product_id = '$product_id' ";
$query4 = mysql_query($sql4) or die("Can't Query4");

$sql5 = " UPDATE customize_jeans_measurements SET jeans_measurement_sex = '$jeans_measurement_sex', jeans_measurement = '$jeans_measurement', jeans_measurement_waist = '$jeans_measurement_waist', jeans_measurement_hips = '$jeans_measurement_hips', jeans_measurement_crotch = '$jeans_measurement_crotch', jeans_measurement_thighs = '$jeans_measurement_thighs', jeans_measurement_knees = '$jeans_measurement_knees', jeans_measurement_cuffs = '$jeans_measurement_cuffs', jeans_measurement_length_outleg = '$jeans_measurement_length_outleg', jeans_measurement_pants_waist = '$jeans_measurement_pants_waist', jeans_measurement_pants_bottom = '$jeans_measurement_pants_bottom', jeans_remark = '$jeans_remark', jeans_date = '$jeans_date', jeans_time = '$jeans_time', jeans_ip = '$jeans_ip', jeans_status = '$jeans_status' WHERE order_id = '$order_id' AND product_id = '$product_id' ";
$query5 = mysql_query($sql5) or die("Can't Query5");

$path = "../../images/body/jeans/front/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['jeans_body_front']['name'];
	$tmp = $_FILES['jeans_body_front']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$jeans_body_front_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$jeans_body_front_pic)){
				
				$sql6 = " UPDATE customize_jeans_measurements SET jeans_body_front = '".$jeans_body_front_pic."', jeans_date = '".$jeans_date."', jeans_time = '".$jeans_time."', jeans_ip = '".$jeans_ip."', jeans_status = '".$jeans_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query6 = mysql_db_query($dbname, $sql6) or die("Can't Query6");
			}
    
	} else {
				$sql6 = " UPDATE customize_jeans_measurements SET jeans_date = '".$jeans_date."', jeans_time = '".$jeans_time."', jeans_ip = '".$jeans_ip."', jeans_status = '".$jeans_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query6 = mysql_db_query($dbname, $sql6) or die("Can't Query6");
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
				
				$sql7 = " UPDATE customize_jeans_measurements SET jeans_body_left = '".$jeans_body_left_pic."', jeans_date = '".$jeans_date."', jeans_time = '".$jeans_time."', jeans_ip = '".$jeans_ip."', jeans_status = '".$jeans_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query7 = mysql_db_query($dbname, $sql7) or die("Can't Query7");
			}
    
	} else {
				$sql7 = " UPDATE customize_jeans_measurements SET jeans_date = '".$jeans_date."', jeans_time = '".$jeans_time."', jeans_ip = '".$jeans_ip."', jeans_status = '".$jeans_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query7 = mysql_db_query($dbname, $sql7) or die("Can't Query7");
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
				
				$sql8 = " UPDATE customize_jeans_measurements SET jeans_body_right = '".$jeans_body_right_pic."', jeans_date = '".$jeans_date."', jeans_time = '".$jeans_time."', jeans_ip = '".$jeans_ip."', jeans_status = '".$jeans_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query8 = mysql_db_query($dbname, $sql8) or die("Can't Query8");
			}
    
	} else {
				$sql8 = " UPDATE customize_jeans_measurements SET jeans_date = '".$jeans_date."', jeans_time = '".$jeans_time."', jeans_ip = '".$jeans_ip."', jeans_status = '".$jeans_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query8 = mysql_db_query($dbname, $sql8) or die("Can't Query8");
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
				
				$sql9 = " UPDATE customize_jeans_measurements SET jeans_body_back = '".$jeans_body_back_pic."', jeans_date = '".$jeans_date."', jeans_time = '".$jeans_time."', jeans_ip = '".$jeans_ip."', jeans_status = '".$jeans_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
				$query9 = mysql_db_query($dbname, $sql9) or die("Can't Query9");
			}
    
	} else {
				$sql9 = " UPDATE customize_jeans_measurements SET jeans_date = '".$jeans_date."', jeans_time = '".$jeans_time."', jeans_ip = '".$jeans_ip."', jeans_status = '".$jeans_status."' WHERE order_id = '".$order_id."' AND product_id = '".$product_id."' ";
		   		$query9 = mysql_db_query($dbname, $sql9) or die("Can't Query9");
			}
	}

if($query9) {
	
	echo " <script language='javascript'> window.location='../../cart/single/index.php?orderid=".$order_id."'; </script> ";
	
}

mysql_close();
?>