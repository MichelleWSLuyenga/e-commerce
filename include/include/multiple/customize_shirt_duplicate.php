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
$shirt_fabric_no = $row1["shirt_fabric_no"];

/*PRICE*/
$order_price = $row3["order_price"];

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
$shirt_measurement_waist_upper = $row2["shirt_measurement_waist_upper"];
$shirt_measurement_waist_lower = $row2["shirt_measurement_waist_lower"];
$shirt_measurement_hips = $row2["shirt_measurement_hips"];
$shirt_measurement_shoulders = $row2["shirt_measurement_shoulders"];
$shirt_measurement_sleeves_right = $row2["shirt_measurement_sleeves_right"];
$shirt_measurement_sleeves_left = $row2["shirt_measurement_sleeves_left"];
$shirt_measurement_neck = $row2["shirt_measurement_neck"];
$shirt_measurement_biceps = $row2["shirt_measurement_biceps"];
$shirt_measurement_wrist_right = $row2["shirt_measurement_wrist_right"];
$shirt_measurement_wrist_left = $row2["shirt_measurement_wrist_left"];
$shirt_measurement_back_length = $row2["shirt_measurement_back_length"];
$shirt_measurement_forearm = $row2["shirt_measurement_forearm"];
$shirt_measurement_shoulder = $row2["shirt_measurement_shoulder"];
$shirt_measurement_waist = $row2["shirt_measurement_waist"];
$shirt_measurement_chest_body = $row2["shirt_measurement_chest_body"];
$shirt_remark = $row2["shirt_remark"];

/*ECT*/
$shirt_date = date("m/d/Y");
$shirt_time = date("H:i:s");
$shirt_ip = $_POST['ip'];
$shirt_status = T;

/*PRODUCT*/
$order_product = $row3['order_product'];

$sql7 =	" INSERT INTO customize_order (id, order_id, product_id, order_price, order_product, order_fabric_no, order_date, order_time, order_ip, order_status) VALUES ('$id_order', '$order_id_same', '$product_id', '$order_price', '$order_product', '$shirt_fabric_no', '$shirt_date', '$shirt_time', '$shirt_ip', '$shirt_status') ";
$query7 = mysql_query($sql7) or die("Can't Query7");

$sql8 = " INSERT INTO customize_shirt_design (id, order_id, product_id, shirt_customer_name, shirt_order_no, shirt_order_date, shirt_delivery_date, shirt_fabric_no, shirt_collar_style, shirt_collar_button_option, shirt_collar_stay_a, shirt_collar_stay_b, shirt_size_of_collar_option, shirt_size_of_back_collar_size_of_band, shirt_cuff_style, shirt_placket, shirt_yoke_style, shirt_back, shirt_pocket, shirt_no_pocket, shirt_bottom, shirt_shirt_button_number, shirt_collar_button_hole_color, shirt_cuff_button_hole_color, shirt_thread_on_color, shirt_contrast, shirt_contrast_inside_no_1, shirt_contrast_inside_no_2, shirt_contrast_inside_no_3, shirt_inside_placket, shirt_contrast_outsite_no_1, shirt_contrast_outsite_no_2, shirt_contrast_outsite_no_3, shirt_outsite_placket, shirt_piping_option, shirt_piping_option_yes, shirt_piping_option_yes_color, shirt_piping_option_yes_fabric, shirt_shoulder_apaulletes, shirt_arm_loops, shirt_position, shirt_design, shirt_initial_or_name, shirt_embroidery_color, shirt_brand, shirt_date, shirt_time, shirt_ip, shirt_status) VALUES ('$id_shirt', '$order_id_same', '$product_id', '$shirt_customer_name', '$shirt_order_no', '$shirt_order_date', '$shirt_delivery_date', '$shirt_fabric_no', '$shirt_collar_style', '$shirt_collar_button_option', '$shirt_collar_stay_a', '$shirt_collar_stay_b', '$shirt_size_of_collar_option', '$shirt_size_of_back_collar_size_of_band', '$shirt_cuff_style', '$shirt_placket', '$shirt_yoke_style', '$shirt_back', '$shirt_pocket', '$shirt_no_pocket', '$shirt_bottom', '$shirt_shirt_button_number', '$shirt_collar_button_hole_color', '$shirt_cuff_button_hole_color', '$shirt_thread_on_color', '$shirt_contrast', '$shirt_contrast_inside_no_1', '$shirt_contrast_inside_no_2', '$shirt_contrast_inside_no_3', '$shirt_inside_placket', '$shirt_contrast_outsite_no_1', '$shirt_contrast_outsite_no_2', '$shirt_contrast_outsite_no_3', '$shirt_outsite_placket', '$shirt_piping_option', '$shirt_piping_option_yes', '$shirt_piping_option_yes_color', '$shirt_piping_option_yes_fabric', '$shirt_shoulder_apaulletes', '$shirt_arm_loops', '$shirt_position', '$shirt_design', '$shirt_initial_or_name', '$shirt_embroidery_color', '$shirt_brand', '$shirt_date', '$shirt_time', '$shirt_ip', '$shirt_status') ";
$query8 = mysql_query($sql8) or die("Can't Query8");

$sql9 = " INSERT INTO customize_shirt_measurements (id, order_id, product_id, shirt_measurement_sex, shirt_measurement_sleeves, shirt_measurement_fit, shirt_measurement, shirt_measurement_shirt_length, shirt_measurement_chest, shirt_measurement_waist_upper, shirt_measurement_waist_lower, shirt_measurement_hips, shirt_measurement_shoulders, shirt_measurement_sleeves_right, shirt_measurement_sleeves_left, shirt_measurement_neck, shirt_measurement_biceps, shirt_measurement_wrist_right, shirt_measurement_wrist_left, shirt_measurement_back_length, shirt_measurement_forearm, shirt_measurement_shoulder, shirt_measurement_waist, shirt_measurement_chest_body, shirt_remark, shirt_date, shirt_time, shirt_ip, shirt_status) VALUES ('$id_shirt', '$order_id_same', '$product_id', '$shirt_measurement_sex', '$shirt_measurement_sleeves', '$shirt_measurement_fit', '$shirt_measurement', '$shirt_measurement_shirt_length', '$shirt_measurement_chest', '$shirt_measurement_waist_upper', '$shirt_measurement_waist_lower', '$shirt_measurement_hips', '$shirt_measurement_shoulders', '$shirt_measurement_sleeves_right', '$shirt_measurement_sleeves_left', '$shirt_measurement_neck', '$shirt_measurement_biceps', '$shirt_measurement_wrist_right', '$shirt_measurement_wrist_left', '$shirt_measurement_back_length', '$shirt_measurement_forearm', '$shirt_measurement_shoulder', '$shirt_measurement_waist', '$shirt_measurement_chest_body', '$shirt_remark', '$shirt_date', '$shirt_time', '$shirt_ip', '$shirt_status') ";
$query9 = mysql_query($sql9) or die("Can't Query9");

if($query9) {
	
	echo " <script language='javascript'> window.location='../../../cart/multiple/index.php?orderid=".$order_id_same."'; </script> ";
	
}

mysql_close();
?>