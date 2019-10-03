<?
if(empty($_POST['ip'])){
	$_POST['ip'] = $_SERVER['REMOTE_ADDR'];
}
require('./phpip2country.class.php');

include('../../connect.php');

/*RESELLER*/
$user_id = $_POST["user_id"];
$user_name = $_POST["user_name"];

$order_id_same = $_GET["orderid"];
$product_id_same = $_GET["productid"];
	
$sql1 =	" SELECT * FROM customize_vest_design WHERE order_id = '$order_id_same' AND product_id = '$product_id_same' ";
$query1 = mysql_db_query($dbname, $sql1) or die("Can't Query1");
$row1 = mysql_fetch_array($query1);

$sql2 =	" SELECT * FROM customize_vest_measurements WHERE order_id = '$order_id_same' AND product_id = '$product_id_same' ";
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

$sql6 =	" SELECT MAX(id) FROM customize_vest_design ";
$query6 = mysql_db_query($dbname, $sql6) or die("Can't Query6");
$row6 = mysql_fetch_array($query6);
$id_vest = $row6[0] + 1 ;

/*FABRIC*/
$vest_fabric_no = $row1["vest_fabric_no"];
$vest_lining_no = $row1["vest_lining_no"];

/*PRICE*/
$order_price = $row3["order_price"];

/*BUTTON*/
$vest_vest_button_number = $row1["vest_vest_button_number"];

/*CUSTOMER*/
$vest_customer_name = $row1["vest_customer_name"];
$vest_order_no = $row1["vest_order_no"];
$vest_order_date = date("m/d/Y");
$vest_delivery_date = $row1["vest_delivery_date"];

/*CUSTOMIZE*/
$vest_vest_button = $row1["vest_vest_button"];
$vest_vest_lapel_style = $row1["vest_vest_lapel_style"];
$vest_vest_chest_pocket = $row1["vest_vest_chest_pocket"];
$vest_vest_bottom_pocket = $row1["vest_vest_bottom_pocket"];
$vest_vest_bottom_of_vest = $row1["vest_vest_bottom_of_vest"];
$vest_vest_belt_at_back = $row1["vest_vest_belt_at_back"];
$vest_vest_lining_option = $row1["vest_vest_lining_option"];
$vest_vest_thread_on_button = $row1["vest_vest_thread_on_button"];
$vest_vest_button_hole_color = $row1["vest_vest_button_hole_color"];

/*MEASUREMENTS*/
$vest_vest_measurement_sex = $row2["vest_vest_measurement_sex"];
$vest_vest_measurement_fit = $row2["vest_vest_measurement_fit"];
$vest_vest_measurement = $row2["vest_vest_measurement"];
$vest_vest_measurement_vest_length = $row2["vest_vest_measurement_vest_length"];
$vest_vest_measurement_back_lenght = $row2["vest_vest_measurement_back_lenght"];
$vest_vest_measurement_chest = $row2["vest_vest_measurement_chest"];
$vest_vest_measurement_waist_upper = $row2["vest_vest_measurement_waist_upper"];
$vest_vest_measurement_waist_lower = $row2["vest_vest_measurement_waist_lower"];
$vest_vest_measurement_hips = $row2["vest_vest_measurement_hips"];
$vest_vest_measurement_shoulders = $row2["vest_vest_measurement_shoulders"];
$vest_vest_measurement_sleeves_right = $row2["vest_vest_measurement_sleeves_right"];
$vest_vest_measurement_sleeves_left = $row2["vest_vest_measurement_sleeves_left"];
$vest_vest_measurement_neck = $row2["vest_vest_measurement_neck"];
$vest_vest_measurement_ptp_front = $row2["vest_vest_measurement_ptp_front"];
$vest_vest_measurement_ptp_back = $row2["vest_vest_measurement_ptp_back"];
$vest_vest_measurement_arm_hole = $row2["vest_vest_measurement_arm_hole"];
$vest_vest_measurement_biceps = $row2["vest_vest_measurement_biceps"];
$vest_measurement_jacket_shoulder = $row2["vest_measurement_jacket_shoulder"];
$vest_measurement_jacket_waist = $row2["vest_measurement_jacket_waist"];
$vest_measurement_jacket_chest = $row2["vest_measurement_jacket_chest"];
$vest_remark = $row2["vest_remark"];

/*ECT*/
$vest_date = date("m/d/Y");
$vest_time = date("H:i:s");
$vest_ip = $_POST['ip'];
$vest_status = T;

/*PRODUCT*/
$order_product = $row3['order_product'];

$sql7 =	" INSERT INTO customize_order (id, order_id, product_id, order_price, order_product, order_fabric_no, order_date, order_time, order_ip, order_status) VALUES ('$id_order', '$order_id_same', '$product_id', '$order_price', '$order_product', '$vest_fabric_no', '$vest_date', '$vest_time', '$vest_ip', '$vest_status') ";
$query7 = mysql_query($sql7) or die("Can't Query7");

$sql8 = " INSERT INTO customize_vest_design (id, order_id, product_id, vest_customer_name, vest_order_no, vest_order_date, vest_delivery_date, vest_fabric_no, vest_lining_no, vest_vest_button, vest_vest_lapel_style, vest_vest_chest_pocket, vest_vest_bottom_pocket, vest_vest_bottom_of_vest, vest_vest_belt_at_back, vest_vest_lining_option, vest_vest_button_number, vest_vest_thread_on_button, vest_vest_button_hole_color, vest_date, vest_time, vest_ip, vest_status) VALUES ('$id_vest', '$order_id_same', '$product_id', '$vest_customer_name', '$vest_order_no', '$vest_order_date', '$vest_delivery_date', '$vest_fabric_no', '$vest_lining_no', '$vest_vest_button', '$vest_vest_lapel_style', '$vest_vest_chest_pocket', '$vest_vest_bottom_pocket', '$vest_vest_bottom_of_vest', '$vest_vest_belt_at_back', '$vest_vest_lining_option', '$vest_vest_button_number', '$vest_vest_thread_on_button', '$vest_vest_button_hole_color', '$vest_date', '$vest_time', '$vest_ip', '$vest_status') ";
$query8 = mysql_query($sql8) or die("Can't Query8");

$sql9 = " INSERT INTO customize_vest_measurements (id, order_id, product_id, vest_vest_measurement_sex, vest_vest_measurement_fit, vest_vest_measurement, vest_vest_measurement_vest_length, vest_vest_measurement_back_lenght, vest_vest_measurement_chest, vest_vest_measurement_waist_upper, vest_vest_measurement_waist_lower, vest_vest_measurement_hips, vest_vest_measurement_shoulders, vest_vest_measurement_sleeves_right, vest_vest_measurement_sleeves_left, vest_vest_measurement_neck, vest_vest_measurement_ptp_front, vest_vest_measurement_ptp_back, vest_vest_measurement_arm_hole, vest_vest_measurement_biceps, vest_measurement_jacket_shoulder, vest_measurement_jacket_waist, vest_measurement_jacket_chest, vest_remark, vest_date, vest_time, vest_ip, vest_status) VALUES ('$id_vest', '$order_id_same', '$product_id', '$vest_vest_measurement_sex', '$vest_vest_measurement_fit', '$vest_vest_measurement', '$vest_vest_measurement_vest_length', '$vest_vest_measurement_back_lenght', '$vest_vest_measurement_chest', '$vest_vest_measurement_waist_upper', '$vest_vest_measurement_waist_lower', '$vest_vest_measurement_hips', '$vest_vest_measurement_shoulders', '$vest_vest_measurement_sleeves_right', '$vest_vest_measurement_sleeves_left', '$vest_vest_measurement_neck', '$vest_vest_measurement_ptp_front', '$vest_vest_measurement_ptp_back', '$vest_vest_measurement_arm_hole', '$vest_vest_measurement_biceps', '$vest_measurement_jacket_shoulder', '$vest_measurement_jacket_waist', '$vest_measurement_jacket_chest', '$vest_remark', '$vest_date', '$vest_time', '$vest_ip', '$vest_status') ";
$query9 = mysql_query($sql9) or die("Can't Query9");

if($query9) {
	
	echo " <script language='javascript'> window.location='../../../cart/multiple/index.php?orderid=".$order_id_same."'; </script> ";
	
}

mysql_close();
?>