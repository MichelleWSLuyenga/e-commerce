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

$order_id_same = $_GET["orderid"];
$product_id_same = $_GET["productid"];
	
$sql1 =	" SELECT * FROM customize_suits_with_vest_design WHERE order_id = '$order_id_same' AND product_id = '$product_id_same' ";
$query1 = mysql_db_query($dbname, $sql1) or die("Can't Query1");
$row1 = mysql_fetch_array($query1);

$sql2 =	" SELECT * FROM customize_suits_with_vest_measurements WHERE order_id = '$order_id_same' AND product_id = '$product_id_same' ";
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

$sql6 =	" SELECT MAX(id) FROM customize_suits_with_vest_design ";
$query6 = mysql_db_query($dbname, $sql6) or die("Can't Query6");
$row6 = mysql_fetch_array($query6);
$id_suits_with_vest = $row6[0] + 1 ;

/*FABRIC*/
$suits_with_vest_fabric_no = $row1["suits_with_vest_fabric_no"];
$suits_with_vest_lining_no = $row1["suits_with_vest_lining_no"];

/*PRICE*/
$order_my_price = $row3["order_my_price"];
$order_price = $row3["order_price"];

/*BUTTON*/
$suits_with_vest_jacket_button_number = $row1["suits_with_vest_jacket_button_number"];
$suits_with_vest_pants_button_number = $row1["suits_with_vest_pants_button_number"];
$suits_with_vest_pants_back_button = $row1["suits_with_vest_pants_back_button"];
$suits_with_vest_pants_back_button_number = $row1["suits_with_vest_pants_back_button_number"];
$suits_with_vest_vest_button_number = $row1["suits_with_vest_vest_button_number"];

/*CUSTOMER*/
$suits_with_vest_customer_name = $row1["suits_with_vest_customer_name"];
$suits_with_vest_order_no = $row1["suits_with_vest_order_no"];
$suits_with_vest_order_date = date("m/d/Y");
$suits_with_vest_delivery_date = $row1["suits_with_vest_delivery_date"];

/*CUSTOMIZE*/
$suits_with_vest_jacket_style = $row1["suits_with_vest_jacket_style"];
$suits_with_vest_lapel_style = $row1["suits_with_vest_lapel_style"];
$suits_with_vest_lapel_width = $row1["suits_with_vest_lapel_width"];
$suits_with_vest_lapel_color = $row1["suits_with_vest_lapel_color"];
$suits_real_lapel_boutonniere = $row1["suits_real_lapel_boutonniere"];
$suits_with_vest_real_lapel_boutonniere = $row1["suits_with_vest_real_lapel_boutonniere"];
$suits_with_vest_vent_style = $row1["suits_with_vest_vent_style"];
$suits_with_vest_pocket_style = $row1["suits_with_vest_pocket_style"];
$suits_with_vest_chest_pocket = $row1["suits_with_vest_chest_pocket"];
$suits_with_vest_shoulder_construction = $row1["suits_with_vest_shoulder_construction"];
$suits_with_vest_sleeve_button = $row1["suits_with_vest_sleeve_button"];
$suits_with_vest_cuff = $row1["suits_with_vest_cuff"];
$suits_with_vest_all_sleevebutton_holes_color = $row1["suits_with_vest_all_sleevebutton_holes_color"];
$suits_with_vest_contrast_last_sleevebutton_holes_color = $row1["suits_with_vest_contrast_last_sleevebutton_holes_color"];
$suits_with_vest_contrast_last_sleevebutton_holes_button = $row1["suits_with_vest_contrast_last_sleevebutton_holes_button"];
$suits_with_vest_lining_style = $row1["suits_with_vest_lining_style"];
$suits_with_vest_canvas = $row1["suits_with_vest_canvas"];
$suits_with_vest_jacket_thread_on_button = $row1["suits_with_vest_jacket_thread_on_button"];
$suits_with_vest_jacket_button_hole_color = $row1["suits_with_vest_jacket_button_hole_color"];
$suits_with_vest_pick_stitch = $row1["suits_with_vest_pick_stitch"];
$suits_with_vest_pick_stitch_lapel_color = $row1["suits_with_vest_pick_stitch_lapel_color"];
$suits_with_vest_pick_stitch_pocket_color = $row1["suits_with_vest_pick_stitch_pocket_color"];
$suits_with_vest_pick_stitch_sleeves = $row1["suits_with_vest_pick_stitch_vest"];
$suits_with_vest_pick_stitch_vest = $row1["suits_with_vest_pick_stitch_vest"];
$suits_with_vest_embroidery_inside_initial_or_name = $row1["suits_with_vest_embroidery_inside_initial_or_name"];
$suits_with_vest_embroidery_inside_color = $row1["suits_with_vest_embroidery_inside_color"];
$suits_with_vest_embroidery_inside_design = $row1["suits_with_vest_embroidery_inside_design"];
$suits_with_vest_embroidery_collar_initial_or_name = $row1["suits_with_vest_embroidery_collar_initial_or_name"];
$suits_with_vest_embroidery_collar_color = $row1["suits_with_vest_embroidery_collar_color"];
$suits_with_vest_embroidery_collar_design = $row1["suits_with_vest_embroidery_collar_design"];
$suits_with_vest_brand = $row1["suits_with_vest_brand"];
$suits_with_vest_elbow_patch = $row1["suits_with_vest_elbow_patch"];
$suits_with_vest_collar_felt_color = $row1["suits_with_vest_collar_felt_color"];
$suits_with_vest_front_pleat = $row1["suits_with_vest_front_pleat"];
$suits_with_vest_front_pocket = $row1["suits_with_vest_front_pocket"];
$suits_with_vest_back_pocket = $row1["suits_with_vest_back_pocket"];
$suits_with_vest_no_back_pocket = $row1["suits_with_vest_no_back_pocket"];
$suits_with_vest_pants_thread_on_button = $row1["suits_with_vest_pants_thread_on_button"];
$suits_with_vest_pants_button_hole_color = $row1["suits_with_vest_pants_button_hole_color"];
$suits_with_vest_fastening = $row1["suits_with_vest_fastening"];
$suits_with_vest_fly_option = $row1["suits_with_vest_fly_option"];
$suits_with_vest_fly_option_zip = $row1["suits_with_vest_fly_option_zip"];
$suits_with_vest_band_edge_style = $row1["suits_with_vest_band_edge_style"];
$suits_with_vest_very_extended_waistband = $row1["suits_with_vest_very_extended_waistband"];
$suits_with_vest_waistband_width = $row1["suits_with_vest_waistband_width"];
$suits_with_vest_pants_cuff = $row1["suits_with_vest_pants_cuff"];
$suits_with_vest_pants_cuff_width = $row1["suits_with_vest_pants_cuff_width"];
$suits_with_vest_belt = $row1["suits_with_vest_belt"];
$suits_with_vest_pants_lining_style = $row1["suits_with_vest_pants_lining_style"];
$suits_with_vest_embroidery_waist_initial_or_name = $row1["suits_with_vest_embroidery_waist_initial_or_name"];
$suits_with_vest_embroidery_waist_color = $row1["suits_with_vest_embroidery_waist_color"];
$suits_with_vest_embroidery_waist_design = $row1["suits_with_vest_embroidery_waist_design"];
$suits_with_vest_embroidery_cuffs_initial_or_name = $row1["suits_with_vest_embroidery_cuffs_initial_or_name"];
$suits_with_vest_embroidery_cuffs_color = $row1["suits_with_vest_embroidery_cuffs_color"];
$suits_with_vest_embroidery_cuffs_design = $row1["suits_with_vest_embroidery_cuffs_design"];
$suits_with_vest_pants_brand = $row1["suits_with_vest_pants_brand"];
$suits_with_vest_coin_pocket_inside = $row1["suits_with_vest_coin_pocket_inside"];
$suits_with_vest_suspender_buttons_inside = $row1["suits_with_vest_suspender_buttons_inside"];
$suits_with_vest_split_tabs_back = $row1["suits_with_vest_split_tabs_back"];
$suits_with_vest_tuxedo_satin = $row1["suits_with_vest_tuxedo_satin"];
$suits_with_vest_tuxedo_satin_waist_band = $row1["suits_with_vest_tuxedo_satin_waist_band"];
$suits_with_vest_internal_waistband_color = $row1["suits_with_vest_internal_waistband_color"];
$suits_with_vest_vest_button = $row1["suits_with_vest_vest_button"];
$suits_with_vest_vest_lapel_style = $row1["suits_with_vest_vest_lapel_style"];
$suits_with_vest_vest_chest_pocket = $row1["suits_with_vest_vest_chest_pocket"];
$suits_with_vest_vest_bottom_pocket = $row1["suits_with_vest_vest_bottom_pocket"];
$suits_with_vest_vest_bottom_of_vest = $row1["suits_with_vest_vest_bottom_of_vest"];
$suits_with_vest_vest_belt_at_back = $row1["suits_with_vest_vest_belt_at_back"];
$suits_with_vest_vest_lining_option = $row1["suits_with_vest_vest_lining_option"];
$suits_with_vest_vest_thread_on_button = $row1["suits_with_vest_vest_thread_on_button"];
$suits_with_vest_vest_button_hole_color = $row1["suits_with_vest_vest_button_hole_color"];

/*MEASUREMENTS*/
$suits_with_vest_jacket_measurement_sex = $row2["suits_with_vest_jacket_measurement_sex"];
$suits_with_vest_jacket_measurement_fit = $row2["suits_with_vest_jacket_measurement_fit"];
$suits_with_vest_jacket_measurement = $row2["suits_with_vest_jacket_measurement"];
$suits_with_vest_jacket_measurement_jacket_length = $row2["suits_with_vest_jacket_measurement_jacket_length"];
$suits_with_vest_jacket_measurement_back_lenght = $row2["suits_with_vest_jacket_measurement_back_lenght"];
$suits_with_vest_jacket_measurement_chest = $row2["suits_with_vest_jacket_measurement_chest"];
$suits_with_vest_jacket_measurement_waist_only = $row2["suits_with_vest_jacket_measurement_waist_only"];
$suits_with_vest_jacket_measurement_hips = $row2["suits_with_vest_jacket_measurement_hips"];
$suits_with_vest_jacket_measurement_shoulders = $row2["suits_with_vest_jacket_measurement_shoulders"];
$suits_with_vest_jacket_measurement_neck = $row2["suits_with_vest_jacket_measurement_neck"];
$suits_with_vest_jacket_measurement_ptp_front = $row2["suits_with_vest_jacket_measurement_ptp_front"];
$suits_with_vest_jacket_measurement_ptp_back = $row2["suits_with_vest_jacket_measurement_ptp_back"];
$suits_with_vest_jacket_measurement_arm_hole = $row2["suits_with_vest_jacket_measurement_arm_hole"];
$suits_with_vest_jacket_measurement_biceps = $row2["suits_with_vest_jacket_measurement_biceps"];
$suits_with_vest_jacket_measurement_sleeves_right = $row2["suits_with_vest_jacket_measurement_sleeves_right"];
$suits_with_vest_jacket_measurement_sleeves_left = $row2["suits_with_vest_jacket_measurement_sleeves_left"];
$suits_with_vest_jacket_measurement_wrist_right = $row2["suits_with_vest_jacket_measurement_wrist_right"];
$suits_with_vest_jacket_measurement_wrist_left = $row2["suits_with_vest_jacket_measurement_wrist_left"];
$suits_with_vest_jacket_measurement_first_button = $row2["suits_with_vest_jacket_measurement_first_button"];
$suits_with_vest_jacket_measurement_shoulder_upper_wrist = $row2["suits_with_vest_jacket_measurement_shoulder_upper_wrist"];
$suits_with_vest_jacket_measurement_shoulder_lower_wrist = $row2["suits_with_vest_jacket_measurement_shoulder_lower_wrist"];
$suits_with_vest_pants_measurement_sex = $row2["suits_with_vest_pants_measurement_sex"];
$suits_with_vest_pants_measurement_length = $row2["suits_with_vest_pants_measurement_length"];
$suits_with_vest_pants_measurement_fit = $row2["suits_with_vest_pants_measurement_fit"];
$suits_with_vest_pants_measurement = $row2["suits_with_vest_pants_measurement"];
$suits_with_vest_pants_measurement_waist = $row2["suits_with_vest_pants_measurement_waist"];
$suits_with_vest_pants_measurement_hips = $row2["suits_with_vest_pants_measurement_hips"];
$suits_with_vest_pants_measurement_crotch_full = $row2["suits_with_vest_pants_measurement_crotch_full"];
$suits_with_vest_pants_measurement_crotch_front = $row2["suits_with_vest_pants_measurement_crotch_front"];
$suits_with_vest_pants_measurement_crotch_back = $row2["suits_with_vest_pants_measurement_crotch_back"];
$suits_with_vest_pants_measurement_inseam_length = $row2["suits_with_vest_pants_measurement_inseam_length"];
$suits_with_vest_pants_measurement_thighs = $row2["suits_with_vest_pants_measurement_thighs"];
$suits_with_vest_pants_measurement_knees = $row2["suits_with_vest_pants_measurement_knees"];
$suits_with_vest_pants_measurement_length_outleg = $row2["suits_with_vest_pants_measurement_length_outleg"];
$suits_with_vest_pants_measurement_front_rise = $row2["suits_with_vest_pants_measurement_front_rise"];
$suits_with_vest_pants_measurement_cuffs = $row2["suits_with_vest_pants_measurement_cuffs"];
$suits_with_vest_vest_measurement_sex = $row2["suits_with_vest_vest_measurement_sex"];
$suits_with_vest_vest_measurement_fit = $row2["suits_with_vest_vest_measurement_fit"];
$suits_with_vest_vest_measurement = $row2["suits_with_vest_vest_measurement"];
$suits_with_vest_vest_measurement_vest_length = $row2["suits_with_vest_vest_measurement_vest_length"];
$suits_with_vest_vest_measurement_back_lenght = $row2["suits_with_vest_vest_measurement_back_lenght"];
$suits_with_vest_vest_measurement_chest = $row2["suits_with_vest_vest_measurement_chest"];
$suits_with_vest_vest_measurement_waist_only = $row2["suits_with_vest_vest_measurement_waist_only"];
$suits_with_vest_vest_measurement_hips = $row2["suits_with_vest_vest_measurement_hips"];
$suits_with_vest_vest_measurement_neck = $row2["suits_with_vest_vest_measurement_neck"];
$suits_with_vest_vest_measurement_ptp_front = $row2["suits_with_vest_vest_measurement_ptp_front"];
$suits_with_vest_vest_measurement_ptp_back = $row2["suits_with_vest_vest_measurement_ptp_back"];
$suits_with_vest_vest_measurement_arm_hole = $row2["suits_with_vest_vest_measurement_arm_hole"];
$suits_with_vest_measurement_jacket_shoulder = $row2["suits_with_vest_measurement_jacket_shoulder"];
$suits_with_vest_measurement_jacket_waist = $row2["suits_with_vest_measurement_jacket_waist"];
$suits_with_vest_measurement_jacket_chest = $row2["suits_with_vest_measurement_jacket_chest"];
$suits_with_vest_measurement_pants_waist = $row2["suits_with_vest_measurement_pants_waist"];
$suits_with_vest_measurement_pants_bottom = $row2["suits_with_vest_measurement_pants_bottom"];
$suits_with_vest_body_front = $row2["suits_with_vest_body_front"];
$suits_with_vest_body_left = $row2["suits_with_vest_body_left"];
$suits_with_vest_body_right = $row2["suits_with_vest_body_right"];
$suits_with_vest_body_back = $row2["suits_with_vest_body_back"];
$suits_with_vest_jacket_remark = $row2["suits_with_vest_jacket_remark"];
$suits_with_vest_pants_remark = $row2["suits_with_vest_pants_remark"];
$suits_with_vest_vest_remark = $row2["suits_with_vest_vest_remark"];

/*ECT*/
$suits_with_vest_date = date("m/d/Y");
$suits_with_vest_time = date("H:i:s");
$suits_with_vest_ip = $_POST['ip'];
$suits_with_vest_status = T;

/*PRODUCT*/
$order_product = $row3['order_product'];

$sql7 =	" INSERT INTO customize_order (id, order_id, product_id, order_reseller, order_order_no, order_name_customize, order_my_price, order_price, order_product, order_fabric_no, order_date, order_time, order_ip, order_status) VALUES ('$id_order', '$order_id_same', '$product_id', '$company_user', '$suits_with_vest_order_no', '$suits_with_vest_customer_name', '$order_my_price', '$order_price', '$order_product', '$suits_with_vest_fabric_no', '$suits_with_vest_date', '$suits_with_vest_time', '$suits_with_vest_ip', '$suits_with_vest_status') ";
$query7 = mysql_query($sql7) or die("Can't Query7");

$sql8 = " INSERT INTO customize_suits_with_vest_design (id, order_id, product_id, suits_with_vest_customer_name, suits_with_vest_order_no, suits_with_vest_order_date, suits_with_vest_delivery_date, suits_with_vest_fabric_no, suits_with_vest_lining_no, suits_with_vest_jacket_style, suits_with_vest_lapel_style, suits_with_vest_lapel_width, suits_with_vest_lapel_color, suits_with_vest_real_lapel_boutonniere, suits_with_vest_vent_style, suits_with_vest_pocket_style, suits_with_vest_chest_pocket, suits_with_vest_shoulder_construction, suits_with_vest_sleeve_button, suits_with_vest_cuff, suits_with_vest_all_sleevebutton_holes_color, suits_with_vest_contrast_last_sleevebutton_holes_color, suits_with_vest_contrast_last_sleevebutton_holes_button, suits_with_vest_lining_style, suits_with_vest_canvas, suits_with_vest_jacket_button_number, suits_with_vest_jacket_thread_on_button, suits_with_vest_jacket_button_hole_color, suits_with_vest_pick_stitch, suits_with_vest_pick_stitch_lapel_color, suits_with_vest_pick_stitch_pocket_color, suits_with_vest_pick_stitch_sleeves, suits_with_vest_pick_stitch_vest, suits_with_vest_embroidery_inside_initial_or_name, suits_with_vest_embroidery_inside_color, suits_with_vest_embroidery_inside_design, suits_with_vest_embroidery_collar_initial_or_name, suits_with_vest_embroidery_collar_color, suits_with_vest_embroidery_collar_design, suits_with_vest_brand, suits_with_vest_elbow_patch, suits_with_vest_collar_felt_color, suits_with_vest_front_pleat, suits_with_vest_front_pocket, suits_with_vest_back_pocket, suits_with_vest_no_back_pocket, suits_with_vest_pants_back_button, suits_with_vest_pants_back_button_number, suits_with_vest_pants_button_number, suits_with_vest_pants_thread_on_button, suits_with_vest_pants_button_hole_color, suits_with_vest_fastening, suits_with_vest_fly_option, suits_with_vest_fly_option_zip, suits_with_vest_band_edge_style, suits_with_vest_very_extended_waistband, suits_with_vest_waistband_width, suits_with_vest_pants_cuff, suits_with_vest_pants_cuff_width, suits_with_vest_belt, suits_with_vest_pants_lining_style, suits_with_vest_embroidery_waist_initial_or_name, suits_with_vest_embroidery_waist_color, suits_with_vest_embroidery_waist_design, suits_with_vest_embroidery_cuffs_initial_or_name, suits_with_vest_embroidery_cuffs_color, suits_with_vest_embroidery_cuffs_design, suits_with_vest_pants_brand, suits_with_vest_coin_pocket_inside, suits_with_vest_suspender_buttons_inside, suits_with_vest_split_tabs_back, suits_with_vest_tuxedo_satin, suits_with_vest_tuxedo_satin_waist_band, suits_with_vest_internal_waistband_color, suits_with_vest_vest_button, suits_with_vest_vest_lapel_style, suits_with_vest_vest_chest_pocket, suits_with_vest_vest_bottom_pocket, suits_with_vest_vest_bottom_of_vest, suits_with_vest_vest_belt_at_back, suits_with_vest_vest_lining_option, suits_with_vest_vest_button_number, suits_with_vest_vest_thread_on_button, suits_with_vest_vest_button_hole_color, suits_with_vest_date, suits_with_vest_time, suits_with_vest_ip, suits_with_vest_status) VALUES (
'$id_suits_with_vest', '$order_id_same', '$product_id', '$suits_with_vest_customer_name', '$suits_with_vest_order_no', '$suits_with_vest_order_date', '$suits_with_vest_delivery_date', '$suits_with_vest_fabric_no', '$suits_with_vest_lining_no', '$suits_with_vest_jacket_style', '$suits_with_vest_lapel_style', '$suits_with_vest_lapel_width', '$suits_with_vest_lapel_color', '$suits_with_vest_real_lapel_boutonniere', '$suits_with_vest_vent_style', '$suits_with_vest_pocket_style', '$suits_with_vest_chest_pocket', '$suits_with_vest_shoulder_construction', '$suits_with_vest_sleeve_button', '$suits_with_vest_cuff', '$suits_with_vest_all_sleevebutton_holes_color', '$suits_with_vest_contrast_last_sleevebutton_holes_color', '$suits_with_vest_contrast_last_sleevebutton_holes_button', '$suits_with_vest_lining_style', '$suits_with_vest_canvas', '$suits_with_vest_jacket_button_number', '$suits_with_vest_jacket_thread_on_button', '$suits_with_vest_jacket_button_hole_color', '$suits_with_vest_pick_stitch', '$suits_with_vest_pick_stitch_lapel_color', '$suits_with_vest_pick_stitch_pocket_color', '$suits_with_vest_pick_stitch_sleeves', '$suits_with_vest_pick_stitch_vest', '$suits_with_vest_embroidery_inside_initial_or_name', '$suits_with_vest_embroidery_inside_color', '$suits_with_vest_embroidery_inside_design', '$suits_with_vest_embroidery_collar_initial_or_name', '$suits_with_vest_embroidery_collar_color', '$suits_with_vest_embroidery_collar_design', '$suits_with_vest_brand', '$suits_with_vest_elbow_patch', '$suits_with_vest_collar_felt_color', '$suits_with_vest_front_pleat', '$suits_with_vest_front_pocket', '$suits_with_vest_back_pocket', '$suits_with_vest_no_back_pocket', '$suits_with_vest_pants_back_button', '$suits_with_vest_pants_back_button_number', '$suits_with_vest_pants_button_number', '$suits_with_vest_pants_thread_on_button', '$suits_with_vest_pants_button_hole_color', '$suits_with_vest_fastening', '$suits_with_vest_fly_option', '$suits_with_vest_fly_option_zip', '$suits_with_vest_band_edge_style', '$suits_with_vest_very_extended_waistband', '$suits_with_vest_waistband_width', '$suits_with_vest_pants_cuff', '$suits_with_vest_pants_cuff_width', '$suits_with_vest_belt', '$suits_with_vest_pants_lining_style', '$suits_with_vest_embroidery_waist_initial_or_name', '$suits_with_vest_embroidery_waist_color', '$suits_with_vest_embroidery_waist_design', '$suits_with_vest_embroidery_cuffs_initial_or_name', '$suits_with_vest_embroidery_cuffs_color', '$suits_with_vest_embroidery_cuffs_design', '$suits_with_vest_pants_brand', '$suits_with_vest_coin_pocket_inside', '$suits_with_vest_suspender_buttons_inside', '$suits_with_vest_split_tabs_back', '$suits_with_vest_tuxedo_satin', '$suits_with_vest_tuxedo_satin_waist_band', '$suits_with_vest_internal_waistband_color', '$suits_with_vest_vest_button', '$suits_with_vest_vest_lapel_style', '$suits_with_vest_vest_chest_pocket', '$suits_with_vest_vest_bottom_pocket', '$suits_with_vest_vest_bottom_of_vest', '$suits_with_vest_vest_belt_at_back', '$suits_with_vest_vest_lining_option', '$suits_with_vest_vest_button_number', '$suits_with_vest_vest_thread_on_button', '$suits_with_vest_vest_button_hole_color', '$suits_with_vest_date', '$suits_with_vest_time', '$suits_with_vest_ip', '$suits_with_vest_status') ";
$query8 = mysql_query($sql8) or die("Can't Query8");

$sql9 = " INSERT INTO customize_suits_with_vest_measurements (id, order_id, product_id, suits_with_vest_jacket_measurement_sex, suits_with_vest_jacket_measurement_fit, suits_with_vest_jacket_measurement, suits_with_vest_jacket_measurement_jacket_length, suits_with_vest_jacket_measurement_back_lenght, suits_with_vest_jacket_measurement_chest, suits_with_vest_jacket_measurement_waist_only, suits_with_vest_jacket_measurement_hips, suits_with_vest_jacket_measurement_shoulders, suits_with_vest_jacket_measurement_neck, suits_with_vest_jacket_measurement_ptp_front, suits_with_vest_jacket_measurement_ptp_back, suits_with_vest_jacket_measurement_arm_hole, suits_with_vest_jacket_measurement_biceps, suits_with_vest_jacket_measurement_sleeves_right, suits_with_vest_jacket_measurement_sleeves_left, suits_with_vest_jacket_measurement_wrist_right, suits_with_vest_jacket_measurement_wrist_left, suits_with_vest_jacket_measurement_first_button, suits_with_vest_jacket_measurement_shoulder_upper_wrist, suits_with_vest_jacket_measurement_shoulder_lower_wrist, suits_with_vest_pants_measurement_sex, suits_with_vest_pants_measurement_length, suits_with_vest_pants_measurement_fit, suits_with_vest_pants_measurement, suits_with_vest_pants_measurement_waist, suits_with_vest_pants_measurement_hips, suits_with_vest_pants_measurement_crotch_full, suits_with_vest_pants_measurement_crotch_front, suits_with_vest_pants_measurement_crotch_back, suits_with_vest_pants_measurement_inseam_length, suits_with_vest_pants_measurement_thighs, suits_with_vest_pants_measurement_knees, suits_with_vest_pants_measurement_length_outleg, suits_with_vest_pants_measurement_front_rise, suits_with_vest_pants_measurement_cuffs, suits_with_vest_vest_measurement_sex, suits_with_vest_vest_measurement_fit, suits_with_vest_vest_measurement, suits_with_vest_vest_measurement_vest_length, suits_with_vest_vest_measurement_back_lenght, suits_with_vest_vest_measurement_chest, suits_with_vest_vest_measurement_waist_only, suits_with_vest_vest_measurement_hips, suits_with_vest_vest_measurement_neck, suits_with_vest_vest_measurement_ptp_front, suits_with_vest_vest_measurement_ptp_back, suits_with_vest_vest_measurement_arm_hole, suits_with_vest_measurement_jacket_shoulder, suits_with_vest_measurement_jacket_waist, suits_with_vest_measurement_jacket_chest, suits_with_vest_measurement_pants_waist, suits_with_vest_measurement_pants_bottom, suits_with_vest_body_front, suits_with_vest_body_left, suits_with_vest_body_right, suits_with_vest_body_back, suits_with_vest_jacket_remark, suits_with_vest_pants_remark, suits_with_vest_vest_remark, suits_with_vest_date, suits_with_vest_time, suits_with_vest_ip, suits_with_vest_status) VALUES ('$id_suits_with_vest', '$order_id_same', '$product_id', '$suits_with_vest_jacket_measurement_sex', '$suits_with_vest_jacket_measurement_fit', '$suits_with_vest_jacket_measurement', '$suits_with_vest_jacket_measurement_jacket_length', '$suits_with_vest_jacket_measurement_back_lenght', '$suits_with_vest_jacket_measurement_chest', '$suits_with_vest_jacket_measurement_waist_only', '$suits_with_vest_jacket_measurement_hips', '$suits_with_vest_jacket_measurement_shoulders', '$suits_with_vest_jacket_measurement_neck', '$suits_with_vest_jacket_measurement_ptp_front', '$suits_with_vest_jacket_measurement_ptp_back', '$suits_with_vest_jacket_measurement_arm_hole', '$suits_with_vest_jacket_measurement_biceps', '$suits_with_vest_jacket_measurement_sleeves_right', '$suits_with_vest_jacket_measurement_sleeves_left', '$suits_with_vest_jacket_measurement_wrist_right', '$suits_with_vest_jacket_measurement_wrist_left', '$suits_with_vest_jacket_measurement_first_button', '$suits_with_vest_jacket_measurement_shoulder_upper_wrist', '$suits_with_vest_jacket_measurement_shoulder_lower_wrist', '$suits_with_vest_pants_measurement_sex', '$suits_with_vest_pants_measurement_length', '$suits_with_vest_pants_measurement_fit', '$suits_with_vest_pants_measurement', '$suits_with_vest_pants_measurement_waist', '$suits_with_vest_pants_measurement_hips', '$suits_with_vest_pants_measurement_crotch_full', '$suits_with_vest_pants_measurement_crotch_front', '$suits_with_vest_pants_measurement_crotch_back', '$suits_with_vest_pants_measurement_inseam_length', '$suits_with_vest_pants_measurement_thighs', '$suits_with_vest_pants_measurement_knees', '$suits_with_vest_pants_measurement_length_outleg', '$suits_with_vest_pants_measurement_front_rise', '$suits_with_vest_pants_measurement_cuffs', '$suits_with_vest_vest_measurement_sex', '$suits_with_vest_vest_measurement_fit', '$suits_with_vest_vest_measurement', '$suits_with_vest_vest_measurement_vest_length', '$suits_with_vest_vest_measurement_back_lenght', '$suits_with_vest_vest_measurement_chest', '$suits_with_vest_vest_measurement_waist_only', '$suits_with_vest_vest_measurement_hips', '$suits_with_vest_vest_measurement_neck', '$suits_with_vest_vest_measurement_ptp_front', '$suits_with_vest_vest_measurement_ptp_back', '$suits_with_vest_vest_measurement_arm_hole', '$suits_with_vest_measurement_jacket_shoulder', '$suits_with_vest_measurement_jacket_waist', '$suits_with_vest_measurement_jacket_chest', '$suits_with_vest_measurement_pants_waist', '$suits_with_vest_measurement_pants_bottom', '$suits_with_vest_body_front', '$suits_with_vest_body_left', '$suits_with_vest_body_right', '$suits_with_vest_body_back', '$suits_with_vest_jacket_remark', '$suits_with_vest_pants_remark', '$suits_with_vest_vest_remark', '$suits_with_vest_date', '$suits_with_vest_time', '$suits_with_vest_ip', '$suits_with_vest_status') ";
$query9 = mysql_query($sql9) or die("Can't Query9");

if($query9) {
	
	echo " <script language='javascript'> window.location='../../cart/multiple/index.php?orderid=".$order_id_same."'; </script> ";
	
}

mysql_close();
?>