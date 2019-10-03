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
	
$sql1 =	" SELECT * FROM customize_suits_design WHERE order_id = '$order_id_same' AND product_id = '$product_id_same' ";
$query1 = mysql_db_query($dbname, $sql1) or die("Can't Query1");
$row1 = mysql_fetch_array($query1);

$sql2 =	" SELECT * FROM customize_suits_measurements WHERE order_id = '$order_id_same' AND product_id = '$product_id_same' ";
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

$sql6 =	" SELECT MAX(id) FROM customize_suits_design ";
$query6 = mysql_db_query($dbname, $sql6) or die("Can't Query6");
$row6 = mysql_fetch_array($query6);
$id_suits = $row6[0] + 1 ;

/*FABRIC*/
$suits_fabric_no = $row1["suits_fabric_no"];
$suits_lining_no = $row1["suits_lining_no"];

/*PRICE*/
$order_price = $row3["order_price"];

/*BUTTON*/
$suits_jacket_button_number = $row1["suits_jacket_button_number"];
$suits_pants_button_number = $row1["suits_pants_button_number"];
$suits_pants_back_button_number = $row1["suits_pants_back_button_number"];

/*CUSTOMER*/
$suits_customer_name = $row1["suits_customer_name"];
$suits_order_no = $row1["suits_order_no"];
$suits_order_date = date("m/d/Y");
$suits_delivery_date = $row1["suits_delivery_date"];

/*CUSTOMIZE*/
$suits_jacket_style = $row1["suits_jacket_style"];
$suits_lapel_style = $row1["suits_lapel_style"];
$suits_lapel_width = $row1["suits_lapel_width"];
$suits_lapel_move = $row1["suits_lapel_move"];
$suits_lapel_color = $row1["suits_lapel_color"];
$suits_real_lapel_boutonniere = $row1["suits_real_lapel_boutonniere"];
$suits_vent_style = $row1["suits_vent_style"];
$suits_pocket_style = $row1["suits_pocket_style"];
$suits_chest_pocket = $row1["suits_chest_pocket"];
$suits_shoulder_construction = $row1["suits_shoulder_construction"];
$suits_sleeve_button = $row1["suits_sleeve_button"];
$suits_cuff = $row1["suits_cuff"];
$suits_all_sleevebutton_holes_color = $row1["suits_all_sleevebutton_holes_color"];
$suits_contrast_last_sleevebutton_holes_color = $row1["suits_contrast_last_sleevebutton_holes_color"];
$suits_contrast_last_sleevebutton_holes_button = $row1["suits_contrast_last_sleevebutton_holes_button"];
$suits_lining_style = $row1["suits_lining_style"];
$suits_canvas = $row1["suits_canvas"];
$suits_jacket_thread_on_button = $row1["suits_jacket_thread_on_button"];
$suits_jacket_button_hole_color = $row1["suits_jacket_button_hole_color"];
$suits_pick_stitch = $row1["suits_pick_stitch"];
$suits_pick_stitch_lapel_color = $row1["suits_pick_stitch_lapel_color"];
$suits_pick_stitch_pocket_color = $row1["suits_pick_stitch_pocket_color"];
$suits_pick_stitch_sleeves = $row1["suits_pick_stitch_sleeves"];
$suits_pick_stitch_vest = $row1["suits_pick_stitch_vest"];
$suits_embroidery_inside_initial_or_name = $row1["suits_embroidery_inside_initial_or_name"];
$suits_embroidery_inside_color = $row1["suits_embroidery_inside_color"];
$suits_embroidery_inside_design = $row1["suits_embroidery_inside_design"];
$suits_embroidery_collar_initial_or_name = $row1["suits_embroidery_collar_initial_or_name"];
$suits_embroidery_collar_color = $row1["suits_embroidery_collar_color"];
$suits_embroidery_collar_design = $row1["suits_embroidery_collar_design"];
$suits_brand = $row1["suits_brand"];
$suits_elbow_patch = $row1["suits_elbow_patch"];
$suits_collar_felt_color = $row1["suits_collar_felt_color"];
$suits_front_pleat = $row1["suits_front_pleat"];
$suits_front_pocket = $row1["suits_front_pocket"];
$suits_back_pocket = $row1["suits_back_pocket"];
$suits_no_back_pocket = $row1["suits_no_back_pocket"];
$suits_pants_thread_on_button = $row1["suits_pants_thread_on_button"];
$suits_pants_button_hole_color = $row1["suits_pants_button_hole_color"];
$suits_fastening = $row1["suits_fastening"];
$suits_fly_option = $row1["suits_fly_option"];
$suits_fly_option_zip = $row1["suits_fly_option_zip"];
$suits_band_edge_style = $row1["suits_band_edge_style"];
$suits_very_extended_waistband = $row1["suits_very_extended_waistband"];
$suits_waistband_width = $row1["suits_waistband_width"];
$suits_pants_cuff = $row1["suits_pants_cuff"];
$suits_pants_cuff_width = $row1["suits_pants_cuff_width"];
$suits_belt = $row1["suits_belt"];
$suits_pants_lining_style = $row1["suits_pants_lining_style"];
$suits_embroidery_waist_initial_or_name = $row1["suits_embroidery_waist_initial_or_name"];
$suits_embroidery_waist_color = $row1["suits_embroidery_waist_color"];
$suits_embroidery_waist_design = $row1["suits_embroidery_waist_design"];
$suits_embroidery_cuffs_initial_or_name = $row1["suits_embroidery_cuffs_initial_or_name"];
$suits_embroidery_cuffs_color = $row1["suits_embroidery_cuffs_color"];
$suits_embroidery_cuffs_design = $row1["suits_embroidery_cuffs_design"];
$suits_pants_brand = $row1["suits_pants_brand"];
$suits_coin_pocket_inside = $row1["suits_coin_pocket_inside"];
$suits_suspender_buttons_inside = $row1["suits_suspender_buttons_inside"];
$suits_split_tabs_back = $row1["suits_split_tabs_back"];
$suits_tuxedo_satin = $row1["suits_tuxedo_satin"];
$suits_tuxedo_satin_waist_band = $row1["suits_tuxedo_satin_waist_band"];

/*MEASUREMENTS*/
$suits_jacket_measurement_sex = $row2["suits_jacket_measurement_sex"];
$suits_jacket_measurement_fit = $row2["suits_jacket_measurement_fit"];
$suits_jacket_measurement = $row2["suits_jacket_measurement"];
$suits_jacket_measurement_jacket_length = $row2["suits_jacket_measurement_jacket_length"];
$suits_jacket_measurement_back_lenght = $row2["suits_jacket_measurement_back_lenght"];
$suits_jacket_measurement_chest = $row2["suits_jacket_measurement_chest"];
$suits_jacket_measurement_waist_upper = $row2["suits_jacket_measurement_waist_upper"];
$suits_jacket_measurement_waist_lower = $row2["suits_jacket_measurement_waist_lower"];
$suits_jacket_measurement_hips = $row2["suits_jacket_measurement_hips"];
$suits_jacket_measurement_shoulders = $row2["suits_jacket_measurement_shoulders"];
$suits_jacket_measurement_neck = $row2["suits_jacket_measurement_neck"];
$suits_jacket_measurement_ptp_front = $row2["suits_jacket_measurement_ptp_front"];
$suits_jacket_measurement_ptp_back = $row2["suits_jacket_measurement_ptp_back"];
$suits_jacket_measurement_arm_hole = $row2["suits_jacket_measurement_arm_hole"];
$suits_jacket_measurement_biceps = $row2["suits_jacket_measurement_biceps"];
$suits_jacket_measurement_sleeves_right = $row2["suits_jacket_measurement_sleeves_right"];
$suits_jacket_measurement_sleeves_left = $row2["suits_jacket_measurement_sleeves_left"];
$suits_jacket_measurement_wrist_right = $row2["suits_jacket_measurement_wrist_right"];
$suits_jacket_measurement_wrist_left = $row2["suits_jacket_measurement_wrist_left"];
$suits_jacket_measurement_first_button = $row2["suits_jacket_measurement_first_button"];
$suits_jacket_measurement_shoulder_upper_wrist = $row2["suits_jacket_measurement_shoulder_upper_wrist"];
$suits_jacket_measurement_shoulder_lower_wrist = $row2["suits_jacket_measurement_shoulder_lower_wrist"];
$suits_pants_measurement_sex = $row2["suits_pants_measurement_sex"];
$suits_pants_measurement_length = $row2["suits_pants_measurement_length"];
$suits_pants_measurement_fit = $row2["suits_pants_measurement_fit"];
$suits_pants_measurement = $row2["suits_pants_measurement"];
$suits_pants_measurement_waist = $row2["suits_pants_measurement_waist"];
$suits_pants_measurement_hips = $row2["suits_pants_measurement_hips"];
$suits_pants_measurement_crotch_full = $row2["suits_pants_measurement_crotch_full"];
$suits_pants_measurement_crotch_front = $row2["suits_pants_measurement_crotch_front"];
$suits_pants_measurement_crotch_back = $row2["suits_pants_measurement_crotch_back"];
$suits_pants_measurement_inseam_length = $row2["suits_pants_measurement_inseam_length"];
$suits_pants_measurement_thighs = $row2["suits_pants_measurement_thighs"];
$suits_pants_measurement_knees = $row2["suits_pants_measurement_knees"];
$suits_pants_measurement_cuffs_ankle = $row2["suits_pants_measurement_cuffs_ankle"];
$suits_pants_measurement_length_outleg = $row2["suits_pants_measurement_length_outleg"];
$suits_pants_measurement_only_crotch = $row2["suits_pants_measurement_only_crotch"];
$suits_pants_measurement_front_rise = $row2["suits_pants_measurement_front_rise"];
$suits_pants_measurement_cuffs = $row2["suits_pants_measurement_cuffs"];
$suits_measurement_jacket_shoulder = $row2["suits_measurement_jacket_shoulder"];
$suits_measurement_jacket_waist = $row2["suits_measurement_jacket_waist"];
$suits_measurement_jacket_chest = $row2["suits_measurement_jacket_chest"];
$suits_measurement_pants_waist = $row2["suits_measurement_pants_waist"];
$suits_measurement_pants_bottom = $row2["suits_measurement_pants_bottom"];
$suits_remark = $row2["suits_remark"];

/*ECT*/
$suits_date = date("m/d/Y");
$suits_time = date("H:i:s");
$suits_ip = $_POST['ip'];
$suits_status = T;

/*PRODUCT*/
$order_product = $row3['order_product'];

$sql7 =	" INSERT INTO customize_order (id, order_id, product_id, order_price, order_product, order_fabric_no, order_date, order_time, order_ip, order_status) VALUES ('$id_order', '$order_id_same', '$product_id', '$order_price', '$order_product', '$suits_fabric_no', '$suits_date', '$suits_time', '$suits_ip', '$suits_status') ";
$query7 = mysql_query($sql7) or die("Can't Query7");

$sql8 = " INSERT INTO customize_suits_design (id, order_id, product_id, suits_customer_name, suits_order_no, suits_order_date, suits_delivery_date, suits_fabric_no, suits_lining_no, suits_jacket_style, suits_lapel_style, suits_lapel_width, suits_lapel_move, suits_lapel_color, suits_real_lapel_boutonniere, suits_vent_style, suits_pocket_style, suits_chest_pocket, suits_shoulder_construction, suits_sleeve_button, suits_cuff, suits_all_sleevebutton_holes_color, suits_contrast_last_sleevebutton_holes_color, suits_contrast_last_sleevebutton_holes_button, suits_lining_style, suits_canvas, suits_jacket_button_number, suits_jacket_thread_on_button, suits_jacket_button_hole_color, suits_pick_stitch, suits_pick_stitch_lapel_color, suits_pick_stitch_pocket_color, suits_pick_stitch_sleeves, suits_pick_stitch_vest, suits_embroidery_inside_initial_or_name, suits_embroidery_inside_color, suits_embroidery_inside_design, suits_embroidery_collar_initial_or_name, suits_embroidery_collar_color, suits_embroidery_collar_design, suits_brand, suits_elbow_patch, suits_collar_felt_color, suits_front_pleat, suits_front_pocket, suits_back_pocket, suits_no_back_pocket, suits_pants_back_button_number, suits_pants_button_number, suits_pants_thread_on_button, suits_pants_button_hole_color, suits_fastening, suits_fly_option, suits_fly_option_zip, suits_band_edge_style, suits_very_extended_waistband, suits_waistband_width, suits_pants_cuff, suits_pants_cuff_width, suits_belt, suits_pants_lining_style, suits_embroidery_waist_initial_or_name, suits_embroidery_waist_color, suits_embroidery_waist_design, suits_embroidery_cuffs_initial_or_name, suits_embroidery_cuffs_color, suits_embroidery_cuffs_design, suits_pants_brand, suits_coin_pocket_inside, suits_suspender_buttons_inside, suits_split_tabs_back, suits_tuxedo_satin, suits_tuxedo_satin_waist_band, suits_date, suits_time, suits_ip, suits_status) VALUES ('$id_suits', '$order_id_same', '$product_id', '$suits_customer_name', '$suits_order_no', '$suits_order_date', '$suits_delivery_date', '$suits_fabric_no', '$suits_lining_no', '$suits_jacket_style', '$suits_lapel_style', '$suits_lapel_width', '$suits_lapel_move', '$suits_lapel_color', '$suits_real_lapel_boutonniere', '$suits_vent_style', '$suits_pocket_style', '$suits_chest_pocket', '$suits_shoulder_construction', '$suits_sleeve_button', '$suits_cuff', '$suits_all_sleevebutton_holes_color', '$suits_contrast_last_sleevebutton_holes_color', '$suits_contrast_last_sleevebutton_holes_button', '$suits_lining_style', '$suits_canvas', '$suits_jacket_button_number', '$suits_jacket_thread_on_button', '$suits_jacket_button_hole_color', '$suits_pick_stitch', '$suits_pick_stitch_lapel_color', '$suits_pick_stitch_pocket_color', '$suits_pick_stitch_sleeves', '$suits_pick_stitch_vest', '$suits_embroidery_inside_initial_or_name', '$suits_embroidery_inside_color', '$suits_embroidery_inside_design', '$suits_embroidery_collar_initial_or_name', '$suits_embroidery_collar_color', '$suits_embroidery_collar_design', '$suits_brand', '$suits_elbow_patch', '$suits_collar_felt_color', '$suits_front_pleat', '$suits_front_pocket', '$suits_back_pocket', '$suits_no_back_pocket', '$suits_pants_back_button_number', '$suits_pants_button_number', '$suits_pants_thread_on_button', '$suits_pants_button_hole_color', '$suits_fastening', '$suits_fly_option', '$suits_fly_option_zip', '$suits_band_edge_style', '$suits_very_extended_waistband', '$suits_waistband_width', '$suits_pants_cuff', '$suits_pants_cuff_width', '$suits_belt', '$suits_pants_lining_style', '$suits_embroidery_waist_initial_or_name', '$suits_embroidery_waist_color', '$suits_embroidery_waist_design', '$suits_embroidery_cuffs_initial_or_name', '$suits_embroidery_cuffs_color', '$suits_embroidery_cuffs_design', '$suits_pants_brand', '$suits_coin_pocket_inside', '$suits_suspender_buttons_inside', '$suits_split_tabs_back', '$suits_tuxedo_satin', '$suits_tuxedo_satin_waist_band', '$suits_date', '$suits_time', '$suits_ip', '$suits_status') ";
$query8 = mysql_query($sql8) or die("Can't Query8");

$sql9 = " INSERT INTO customize_suits_measurements (id, order_id, product_id, suits_jacket_measurement_sex, suits_jacket_measurement_fit, suits_jacket_measurement, suits_jacket_measurement_jacket_length, suits_jacket_measurement_back_lenght, suits_jacket_measurement_chest, suits_jacket_measurement_waist_upper, suits_jacket_measurement_waist_lower, suits_jacket_measurement_hips, suits_jacket_measurement_shoulders, suits_jacket_measurement_neck, suits_jacket_measurement_ptp_front, suits_jacket_measurement_ptp_back, suits_jacket_measurement_arm_hole, suits_jacket_measurement_biceps, suits_jacket_measurement_sleeves_right, suits_jacket_measurement_sleeves_left, suits_jacket_measurement_wrist_right, suits_jacket_measurement_wrist_left, suits_jacket_measurement_first_button, suits_jacket_measurement_shoulder_upper_wrist, suits_jacket_measurement_shoulder_lower_wrist, suits_pants_measurement_sex, suits_pants_measurement_length, suits_pants_measurement_fit, suits_pants_measurement, suits_pants_measurement_waist, suits_pants_measurement_hips, suits_pants_measurement_crotch_full, suits_pants_measurement_crotch_front, suits_pants_measurement_crotch_back, suits_pants_measurement_inseam_length, suits_pants_measurement_thighs, suits_pants_measurement_knees, suits_pants_measurement_cuffs_ankle, suits_pants_measurement_length_outleg, suits_pants_measurement_only_crotch, suits_pants_measurement_front_rise, suits_pants_measurement_cuffs, suits_measurement_jacket_shoulder, suits_measurement_jacket_waist, suits_measurement_jacket_chest, suits_measurement_pants_waist, suits_measurement_pants_bottom, suits_remark, suits_date, suits_time, suits_ip, suits_status) VALUES ('$id_suits', '$order_id_same', '$product_id', '$suits_jacket_measurement_sex', '$suits_jacket_measurement_fit', '$suits_jacket_measurement', '$suits_jacket_measurement_jacket_length', '$suits_jacket_measurement_back_lenght', '$suits_jacket_measurement_chest', '$suits_jacket_measurement_waist_upper', '$suits_jacket_measurement_waist_lower', '$suits_jacket_measurement_hips', '$suits_jacket_measurement_shoulders', '$suits_jacket_measurement_neck', '$suits_jacket_measurement_ptp_front', '$suits_jacket_measurement_ptp_back', '$suits_jacket_measurement_arm_hole', '$suits_jacket_measurement_biceps', '$suits_jacket_measurement_sleeves_right', '$suits_jacket_measurement_sleeves_left', '$suits_jacket_measurement_wrist_right', '$suits_jacket_measurement_wrist_left', '$suits_jacket_measurement_first_button', '$suits_jacket_measurement_shoulder_upper_wrist', '$suits_jacket_measurement_shoulder_lower_wrist', '$suits_pants_measurement_sex', '$suits_pants_measurement_length', '$suits_pants_measurement_fit', '$suits_pants_measurement', '$suits_pants_measurement_waist', '$suits_pants_measurement_hips', '$suits_pants_measurement_crotch_full', '$suits_pants_measurement_crotch_front', '$suits_pants_measurement_crotch_back', '$suits_pants_measurement_inseam_length', '$suits_pants_measurement_thighs', '$suits_pants_measurement_knees', '$suits_pants_measurement_cuffs_ankle', '$suits_pants_measurement_length_outleg', '$suits_pants_measurement_only_crotch', '$suits_pants_measurement_front_rise', '$suits_pants_measurement_cuffs', '$suits_measurement_jacket_shoulder', '$suits_measurement_jacket_waist', '$suits_measurement_jacket_chest', '$suits_measurement_pants_waist', '$suits_measurement_pants_bottom', '$suits_remark', '$suits_date', '$suits_time', '$suits_ip', '$suits_status') ";
$query9 = mysql_query($sql9) or die("Can't Query9");

if($query9) {
	
	echo " <script language='javascript'> window.location='../../../cart/multiple/index.php?orderid=".$order_id_same."'; </script> ";
	
}

mysql_close();
?>