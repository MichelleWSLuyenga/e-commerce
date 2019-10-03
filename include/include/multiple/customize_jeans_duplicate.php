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
	
$sql1 =	" SELECT * FROM customize_jeans_design WHERE order_id = '$order_id_same' AND product_id = '$product_id_same' ";
$query1 = mysql_db_query($dbname, $sql1) or die("Can't Query1");
$row1 = mysql_fetch_array($query1);

$sql2 =	" SELECT * FROM customize_jeans_measurements WHERE order_id = '$order_id_same' AND product_id = '$product_id_same' ";
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

$sql6 =	" SELECT MAX(id) FROM customize_jeans_design ";
$query6 = mysql_db_query($dbname, $sql6) or die("Can't Query6");
$row6 = mysql_fetch_array($query6);
$id_jeans = $row6[0] + 1 ;

/*FABRIC*/
$jeans_fabric_no = $row1["jeans_fabric_no"];

/*PRICE*/
$order_price = $row3["order_price"];

/*CUSTOMER*/
$jeans_customer_name = $row1["jeans_customer_name"];
$jeans_order_no = $row1["jeans_order_no"];
$jeans_order_date = date("m/d/Y");
$jeans_delivery_date = $row1["jeans_delivery_date"];

/*CUSTOMIZE*/
$jeans_pocketing = $row1["jeans_pocketing"];
$jeans_front_pocket = $row1["jeans_front_pocket"];
$jeans_back_pocket = $row1["jeans_back_pocket"];
$jeans_coin_pocket = $row1["jeans_coin_pocket"];
$jeans_fly = $row1["jeans_fly"];
$jeans_embroidery = $row1["jeans_embroidery"];
$jeans_embroidery_initial_or_name = $row1["jeans_embroidery_initial_or_name"];
$jeans_embroidery_position = $row1["jeans_embroidery_position"];
$jeans_leather_patch = $row1["jeans_leather_patch"];
$jeans_thread = $row1["jeans_thread"];
$jeans_buttons = $row1["jeans_buttons"];
$jeans_fitting = $row1["jeans_fitting"];
$jeans_wash = $row1["jeans_wash"];

/*MEASUREMENTS*/
$jeans_measurement_sex = $row2["jeans_measurement_sex"];
$jeans_measurement = $row2["jeans_measurement"];
$jeans_measurement_waist = $row2["jeans_measurement_waist"];
$jeans_measurement_hips = $row2["jeans_measurement_hips"];
$jeans_measurement_crotch= $row2["jeans_measurement_crotch"];
$jeans_measurement_thighs = $row2["jeans_measurement_thighs"];
$jeans_measurement_knees = $row2["jeans_measurement_knees"];
$jeans_measurement_cuffs_ankle = $row2["jeans_measurement_cuffs_ankle"];
$jeans_measurement_length_outleg = $row2["jeans_measurement_length_outleg"];
$jeans_measurement_pants_waist = $row2["jeans_measurement_pants_waist"];
$jeans_measurement_pants_bottom = $row2["jeans_measurement_pants_bottom"];
$jeans_remark = $row2["jeans_remark"];

/*ECT*/
$jeans_date = date("m/d/Y");
$jeans_time = date("H:i:s");
$jeans_ip = $_POST['ip'];
$jeans_status = T;

/*PRODUCT*/
$order_product = $row3['order_product'];

$sql7 =	" INSERT INTO customize_order (id, order_id, product_id, order_price, order_product, order_fabric_no, order_date, order_time, order_ip, order_status) VALUES ('$id_order', '$order_id_same', '$product_id', '$order_price', '$order_product', '$jeans_fabric_no', '$jeans_date', '$jeans_time', '$jeans_ip', '$jeans_status') ";
$query7 = mysql_query($sql7) or die("Can't Query7");

$sql8 = " INSERT INTO customize_jeans_design (id, order_id, product_id, jeans_customer_name, jeans_order_no, jeans_order_date, jeans_delivery_date, jeans_fabric_no, jeans_pocketing, jeans_front_pocket, jeans_back_pocket, jeans_coin_pocket, jeans_fly, jeans_embroidery, jeans_embroidery_initial_or_name, jeans_embroidery_position, jeans_leather_patch, jeans_thread, jeans_buttons, jeans_fitting, jeans_wash, jeans_date, jeans_time, jeans_ip, jeans_status) VALUES ('$id_jeans', '$order_id_same', '$product_id', '$jeans_customer_name', '$jeans_order_no', '$jeans_order_date', '$jeans_delivery_date', '$jeans_fabric_no', '$jeans_pocketing', '$jeans_front_pocket', '$jeans_back_pocket', '$jeans_coin_pocket', '$jeans_fly', '$jeans_embroidery', '$jeans_embroidery_initial_or_name', '$jeans_embroidery_position', '$jeans_leather_patch', '$jeans_thread', '$jeans_buttons', '$jeans_fitting', '$jeans_wash', '$jeans_date', '$jeans_time', '$jeans_ip', '$jeans_status') ";
$query8 = mysql_query($sql8) or die("Can't Query8");

$sql9 = " INSERT INTO customize_jeans_measurements (id, order_id, product_id, jeans_measurement_sex, jeans_measurement, jeans_measurement_waist, jeans_measurement_hips, jeans_measurement_crotch, jeans_measurement_thighs, jeans_measurement_knees, jeans_measurement_cuffs_ankle, jeans_measurement_length_outleg, jeans_measurement_pants_waist, jeans_measurement_pants_bottom, jeans_remark, jeans_date, jeans_time, jeans_ip, jeans_status) VALUES ('$id_jeans', '$order_id_same', '$product_id', '$jeans_measurement_sex', '$jeans_measurement', '$jeans_measurement_waist', '$jeans_measurement_hips', '$jeans_measurement_crotch', '$jeans_measurement_thighs', '$jeans_measurement_knees', '$jeans_measurement_cuffs_ankle', '$jeans_measurement_length_outleg', '$jeans_measurement_pants_waist', '$jeans_measurement_pants_bottom', '$jeans_remark', '$jeans_date', '$jeans_time', '$jeans_ip', '$jeans_status') ";
$query9 = mysql_query($sql9) or die("Can't Query9");

if($query9) {
	
	echo " <script language='javascript'> window.location='../../../cart/multiple/index.php?orderid=".$order_id_same."'; </script> ";
	
}

mysql_close();
?>