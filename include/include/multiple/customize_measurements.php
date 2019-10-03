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

/*ORDER ID*/
$order_id = $_POST["item_orderid"];


/*JACKET CUSTOMER*/
$jacket_customer_name = $_POST["item_customer_name"];
$jacket_order_no = $_POST["item_order_no"];

/*JACKET MEASUREMENTS*/
$jacket_jacket_measurement_sex = $_POST["item_measurement_sex"];
$jacket_jacket_measurement_fit = $_POST["jacket_jacket_measurement_fit"];
$jacket_jacket_measurement = $_POST["item_measurement"];
$jacket_jacket_measurement_jacket_length = $_POST["jacket_jacket_measurement_jacket_length"];
$jacket_jacket_measurement_back_lenght = $_POST["jacket_jacket_measurement_back_lenght"];
$jacket_jacket_measurement_chest = $_POST["jacket_jacket_measurement_chest"];
$jacket_jacket_measurement_waist_upper = $_POST["jacket_jacket_measurement_waist_upper"];
$jacket_jacket_measurement_waist_lower = $_POST["jacket_jacket_measurement_waist_lower"];
$jacket_jacket_measurement_hips = $_POST["jacket_jacket_measurement_hips"];
$jacket_jacket_measurement_shoulders = $_POST["jacket_jacket_measurement_shoulders"];
$jacket_jacket_measurement_neck = $_POST["jacket_jacket_measurement_neck"];
$jacket_jacket_measurement_ptp_front = $_POST["jacket_jacket_measurement_ptp_front"];
$jacket_jacket_measurement_ptp_back = $_POST["jacket_jacket_measurement_ptp_back"];
$jacket_jacket_measurement_arm_hole = $_POST["jacket_jacket_measurement_arm_hole"];
$jacket_jacket_measurement_biceps = $_POST["jacket_jacket_measurement_biceps"];
$jacket_jacket_measurement_sleeves_right = $_POST["jacket_jacket_measurement_sleeves_right"];
$jacket_jacket_measurement_sleeves_left= $_POST["jacket_jacket_measurement_sleeves_left"];
$jacket_jacket_measurement_wrist_right = $_POST["jacket_jacket_measurement_wrist_right"];
$jacket_jacket_measurement_wrist_left = $_POST["jacket_jacket_measurement_wrist_left"];
$jacket_jacket_measurement_first_button = $_POST["jacket_jacket_measurement_first_button"];
$jacket_jacket_measurement_shoulder_upper_wrist = $_POST["jacket_jacket_measurement_shoulder_upper_wrist"];
$jacket_jacket_measurement_shoulder_lower_wrist = $_POST["jacket_jacket_measurement_shoulder_lower_wrist"];
$jacket_measurement_jacket_shoulder = $_POST["item_measurement_jacket_shoulder"];
$jacket_measurement_jacket_waist = $_POST["item_measurement_jacket_waist"];
$jacket_measurement_jacket_chest = $_POST["item_measurement_jacket_chest"];

/*JACKET ECT*/
$jacket_ip = $_POST['ip'];
$jacket_status = T;

/*JEANS CUSTOMER*/
$jeans_customer_name = $_POST["item_customer_name"];
$jeans_order_no = $_POST["item_order_no"];

/*JEANS MEASUREMENTS*/
$jeans_measurement_sex = $_POST["item_measurement_sex"];
$jeans_measurement = $_POST["item_measurement"];
$jeans_measurement_waist = $_POST["jeans_measurement_waist"];
$jeans_measurement_hips = $_POST["jeans_measurement_hips"];
$jeans_measurement_crotch = $_POST["jeans_measurement_crotch"];
$jeans_measurement_thighs = $_POST["jeans_measurement_thighs"];
$jeans_measurement_knees = $_POST["jeans_measurement_knees"];
$jeans_measurement_cuffs_ankle = $_POST["jeans_measurement_cuffs_ankle"];
$jeans_measurement_length_outleg = $_POST["jeans_measurement_length_outleg"];
$jeans_measurement_pants_waist = $_POST["item_measurement_pants_waist"];
$jeans_measurement_pants_bottom = $_POST["item_measurement_pants_bottom"];

/*JEANS ECT*/
$jeans_ip = $_POST['ip'];
$jeans_status = T;

/*OVERCOAT CUSTOMER*/
$overcoat_customer_name = $_POST["item_customer_name"];
$overcoat_order_no = $_POST["item_order_no"];
/*OVERCOAT MEASUREMENTS*/
$overcoat_overcoat_measurement_sex = $_POST["item_measurement_sex"];
$overcoat_overcoat_measurement_fit = $_POST["overcoat_overcoat_measurement_fit"];
$overcoat_overcoat_measurement = $_POST["item_measurement"];
$overcoat_overcoat_measurement_overcoat_length = $_POST["overcoat_overcoat_measurement_overcoat_length"];
$overcoat_overcoat_measurement_back_lenght = $_POST["overcoat_overcoat_measurement_back_lenght"];
$overcoat_overcoat_measurement_chest = $_POST["overcoat_overcoat_measurement_chest"];
$overcoat_overcoat_measurement_waist_upper = $_POST["overcoat_overcoat_measurement_waist_upper"];
$overcoat_overcoat_measurement_waist_lower = $_POST["overcoat_overcoat_measurement_waist_lower"];
$overcoat_overcoat_measurement_hips = $_POST["overcoat_overcoat_measurement_hips"];
$overcoat_overcoat_measurement_shoulders = $_POST["overcoat_overcoat_measurement_shoulders"];
$overcoat_overcoat_measurement_neck = $_POST["overcoat_overcoat_measurement_neck"];
$overcoat_overcoat_measurement_ptp_front = $_POST["overcoat_overcoat_measurement_ptp_front"];
$overcoat_overcoat_measurement_ptp_back = $_POST["overcoat_overcoat_measurement_ptp_back"];
$overcoat_overcoat_measurement_arm_hole = $_POST["overcoat_overcoat_measurement_arm_hole"];
$overcoat_overcoat_measurement_biceps = $_POST["overcoat_overcoat_measurement_biceps"];
$overcoat_overcoat_measurement_sleeves_right = $_POST["overcoat_overcoat_measurement_sleeves_right"];
$overcoat_overcoat_measurement_sleeves_left = $_POST["overcoat_overcoat_measurement_sleeves_left"];
$overcoat_overcoat_measurement_wrist_right = $_POST["overcoat_overcoat_measurement_wrist_right"];
$overcoat_overcoat_measurement_wrist_left = $_POST["overcoat_overcoat_measurement_wrist_left"];
$overcoat_measurement_overcoat_shoulder = $_POST["item_measurement_jacket_shoulder"];
$overcoat_measurement_overcoat_waist = $_POST["item_measurement_jacket_waist"];
$overcoat_measurement_overcoat_chest = $_POST["item_measurement_jacket_chest"];

/*OVERCOAT ECT*/
$overcoat_ip = $_POST['ip'];
$overcoat_status = T;

/*PANTS CUSTOMER*/
$pants_customer_name = $_POST["item_customer_name"];
$pants_order_no = $_POST["item_order_no"];

/*PANTS MEASUREMENTS*/
$pants_pants_measurement_sex = $_POST["item_measurement_sex"];
$pants_pants_measurement_length = $_POST["pants_pants_measurement_length"];
$pants_pants_measurement_fit = $_POST["pants_pants_measurement_fit"];
$pants_pants_measurement = $_POST["item_measurement"];
$pants_pants_measurement_waist = $_POST["pants_pants_measurement_waist"];
$pants_pants_measurement_hips = $_POST["pants_pants_measurement_hips"];
$pants_pants_measurement_crotch_full = $_POST["pants_pants_measurement_crotch_full"];
$pants_pants_measurement_crotch_front = $_POST["pants_pants_measurement_crotch_front"];
$pants_pants_measurement_crotch_back = $_POST["pants_pants_measurement_crotch_back"];
$pants_pants_measurement_inseam_length = $_POST["pants_pants_measurement_inseam_length"];
$pants_pants_measurement_thighs = $_POST["pants_pants_measurement_thighs"];
$pants_pants_measurement_knees = $_POST["pants_pants_measurement_knees"];
$pants_pants_measurement_cuffs_ankle = $_POST["pants_pants_measurement_cuffs_ankle"];
$pants_pants_measurement_length_outleg = $_POST["pants_pants_measurement_length_outleg"];
$pants_pants_measurement_only_crotch = $_POST["pants_pants_measurement_only_crotch"];
$pants_pants_measurement_front_rise = $_POST["pants_pants_measurement_front_rise"];
$pants_pants_measurement_cuffs = $_POST["pants_pants_measurement_cuffs"];
$pants_measurement_pants_waist = $_POST["item_measurement_pants_waist"];
$pants_measurement_pants_bottom = $_POST["item_measurement_pants_bottom"];

/*PANTS ECT*/
$pants_ip = $_POST['ip'];
$pants_status = T;

/*SHIRT CUSTOMER*/
$shirt_customer_name = $_POST["item_customer_name"];
$shirt_order_no = $_POST["item_order_no"];

/*SHIRT MEASUREMENTS*/
$shirt_measurement_sex = $_POST["item_measurement_sex"];
$shirt_measurement_sleeves = $_POST["shirt_measurement_sleeves"];
$shirt_measurement_fit = $_POST["shirt_measurement_fit"];
$shirt_measurement = $_POST["item_measurement"];
$shirt_measurement_shirt_length = $_POST["shirt_measurement_shirt_length"];
$shirt_measurement_chest = $_POST["shirt_measurement_chest"];
$shirt_measurement_waist_upper = $_POST["shirt_measurement_waist_upper"];
$shirt_measurement_waist_lower = $_POST["shirt_measurement_waist_lower"];
$shirt_measurement_hips = $_POST["shirt_measurement_hips"];
$shirt_measurement_shoulders = $_POST["shirt_measurement_shoulders"];
$shirt_measurement_sleeves_right = $_POST["shirt_measurement_sleeves_right"];
$shirt_measurement_sleeves_left = $_POST["shirt_measurement_sleeves_left"];
$shirt_measurement_neck = $_POST["shirt_measurement_neck"];
$shirt_measurement_biceps = $_POST["shirt_measurement_biceps"];
$shirt_measurement_wrist_right = $_POST["shirt_measurement_wrist_right"];
$shirt_measurement_wrist_left = $_POST["shirt_measurement_wrist_left"];
$shirt_measurement_back_length = $_POST["shirt_measurement_back_length"];
$shirt_measurement_forearm = $_POST["shirt_measurement_forearm"];
$shirt_measurement_shoulder = $_POST["item_measurement_jacket_shoulder"];
$shirt_measurement_waist = $_POST["item_measurement_jacket_waist"];
$shirt_measurement_chest_body = $_POST["item_measurement_jacket_chest"];

/*SHIRT ECT*/
$shirt_ip = $_POST['ip'];
$shirt_status = T;

/*SUITS CUSTOMER*/
$suits_customer_name = $_POST["item_customer_name"];
$suits_order_no = $_POST["item_order_no"];

/*SUITS MEASUREMENTS*/
$suits_jacket_measurement_sex = $_POST["item_measurement_sex"];
$suits_jacket_measurement_fit = $_POST["jacket_jacket_measurement_fit"];
$suits_jacket_measurement = $_POST["item_measurement"];
$suits_jacket_measurement_jacket_length = $_POST["jacket_jacket_measurement_jacket_length"];
$suits_jacket_measurement_back_lenght = $_POST["jacket_jacket_measurement_back_lenght"];
$suits_jacket_measurement_chest = $_POST["jacket_jacket_measurement_chest"];
$suits_jacket_measurement_waist_upper = $_POST["jacket_jacket_measurement_waist_upper"];
$suits_jacket_measurement_waist_lower = $_POST["jacket_jacket_measurement_waist_lower"];
$suits_jacket_measurement_hips = $_POST["jacket_jacket_measurement_hips"];
$suits_jacket_measurement_shoulders = $_POST["jacket_jacket_measurement_shoulders"];
$suits_jacket_measurement_neck = $_POST["jacket_jacket_measurement_neck"];
$suits_jacket_measurement_ptp_front = $_POST["jacket_jacket_measurement_ptp_front"];
$suits_jacket_measurement_ptp_back = $_POST["jacket_jacket_measurement_ptp_back"];
$suits_jacket_measurement_arm_hole = $_POST["jacket_jacket_measurement_arm_hole"];
$suits_jacket_measurement_biceps = $_POST["jacket_jacket_measurement_biceps"];
$suits_jacket_measurement_sleeves_right = $_POST["jacket_jacket_measurement_sleeves_right"];
$suits_jacket_measurement_sleeves_left = $_POST["jacket_jacket_measurement_sleeves_left"];
$suits_jacket_measurement_wrist_right = $_POST["jacket_jacket_measurement_wrist_right"];
$suits_jacket_measurement_wrist_left = $_POST["jacket_jacket_measurement_wrist_left"];
$suits_jacket_measurement_first_button = $_POST["jacket_jacket_measurement_first_button"];
$suits_jacket_measurement_shoulder_upper_wrist = $_POST["jacket_jacket_measurement_shoulder_upper_wrist"];
$suits_jacket_measurement_shoulder_lower_wrist = $_POST["jacket_jacket_measurement_shoulder_lower_wrist"];
$suits_pants_measurement_sex = $_POST["item_measurement_sex"];
$suits_pants_measurement_length = $_POST["pants_pants_measurement_length"];
$suits_pants_measurement_fit = $_POST["pants_pants_measurement_fit"];
$suits_pants_measurement = $_POST["item_measurement"];
$suits_pants_measurement_waist = $_POST["pants_pants_measurement_waist"];
$suits_pants_measurement_hips = $_POST["pants_pants_measurement_hips"];
$suits_pants_measurement_crotch_full = $_POST["pants_pants_measurement_crotch_full"];
$suits_pants_measurement_crotch_front = $_POST["pants_pants_measurement_crotch_front"];
$suits_pants_measurement_crotch_back = $_POST["pants_pants_measurement_crotch_back"];
$suits_pants_measurement_inseam_length = $_POST["pants_pants_measurement_inseam_length"];
$suits_pants_measurement_thighs = $_POST["pants_pants_measurement_thighs"];
$suits_pants_measurement_knees = $_POST["pants_pants_measurement_knees"];
$suits_pants_measurement_cuffs_ankle = $_POST["pants_pants_measurement_cuffs_ankle"];
$suits_pants_measurement_length_outleg = $_POST["pants_pants_measurement_length_outleg"];
$suits_pants_measurement_only_crotch = $_POST["pants_pants_measurement_only_crotch"];
$suits_pants_measurement_front_rise = $_POST["pants_pants_measurement_front_rise"];
$suits_pants_measurement_cuffs = $_POST["pants_pants_measurement_cuffs"];
$suits_measurement_jacket_shoulder = $_POST["item_measurement_jacket_shoulder"];
$suits_measurement_jacket_waist = $_POST["item_measurement_jacket_waist"];
$suits_measurement_jacket_chest = $_POST["item_measurement_jacket_chest"];
$suits_measurement_pants_waist = $_POST["item_measurement_pants_waist"];
$suits_measurement_pants_bottom = $_POST["item_measurement_pants_bottom"];

/*SUITS ECT*/
$suits_ip = $_POST['ip'];
$suits_status = T;

/*SUITS WITH VEST CUSTOMER*/
$suits_with_vest_customer_name = $_POST["item_customer_name"];
$suits_with_vest_order_no = $_POST["item_order_no"];

/*SUITS WITH VEST MEASUREMENTS*/
$suits_with_vest_jacket_measurement_sex = $_POST["item_measurement_sex"];
$suits_with_vest_jacket_measurement_fit = $_POST["jacket_jacket_measurement_fit"];
$suits_with_vest_jacket_measurement = $_POST["item_measurement"];
$suits_with_vest_jacket_measurement_jacket_length = $_POST["jacket_jacket_measurement_jacket_length"];
$suits_with_vest_jacket_measurement_back_lenght = $_POST["jacket_jacket_measurement_back_lenght"];
$suits_with_vest_jacket_measurement_chest = $_POST["jacket_jacket_measurement_chest"];
$suits_with_vest_jacket_measurement_waist_upper = $_POST["jacket_jacket_measurement_waist_upper"];
$suits_with_vest_jacket_measurement_waist_lower = $_POST["jacket_jacket_measurement_waist_lower"];
$suits_with_vest_jacket_measurement_hips = $_POST["jacket_jacket_measurement_hips"];
$suits_with_vest_jacket_measurement_shoulders = $_POST["jacket_jacket_measurement_shoulders"];
$suits_with_vest_jacket_measurement_neck = $_POST["jacket_jacket_measurement_neck"];
$suits_with_vest_jacket_measurement_ptp_front = $_POST["jacket_jacket_measurement_ptp_front"];
$suits_with_vest_jacket_measurement_ptp_back = $_POST["jacket_jacket_measurement_ptp_back"];
$suits_with_vest_jacket_measurement_arm_hole = $_POST["jacket_jacket_measurement_arm_hole"];
$suits_with_vest_jacket_measurement_biceps = $_POST["jacket_jacket_measurement_biceps"];
$suits_with_vest_jacket_measurement_sleeves_right = $_POST["jacket_jacket_measurement_sleeves_right"];
$suits_with_vest_jacket_measurement_sleeves_left = $_POST["jacket_jacket_measurement_sleeves_left"];
$suits_with_vest_jacket_measurement_wrist_right = $_POST["jacket_jacket_measurement_wrist_right"];
$suits_with_vest_jacket_measurement_wrist_left = $_POST["jacket_jacket_measurement_wrist_left"];
$suits_with_vest_jacket_measurement_first_button = $_POST["jacket_jacket_measurement_first_button"];
$suits_with_vest_jacket_measurement_shoulder_upper_wrist = $_POST["jacket_jacket_measurement_shoulder_upper_wrist"];
$suits_with_vest_jacket_measurement_shoulder_lower_wrist = $_POST["jacket_jacket_measurement_shoulder_lower_wrist"];
$suits_with_vest_pants_measurement_sex = $_POST["item_measurement_sex"];
$suits_with_vest_pants_measurement_length = $_POST["pants_pants_measurement_length"];
$suits_with_vest_pants_measurement_fit = $_POST["pants_pants_measurement_fit"];
$suits_with_vest_pants_measurement = $_POST["item_measurement"];
$suits_with_vest_pants_measurement_waist = $_POST["pants_pants_measurement_waist"];
$suits_with_vest_pants_measurement_hips = $_POST["pants_pants_measurement_hips"];
$suits_with_vest_pants_measurement_crotch_full = $_POST["pants_pants_measurement_crotch_full"];
$suits_with_vest_pants_measurement_crotch_front = $_POST["pants_pants_measurement_crotch_front"];
$suits_with_vest_pants_measurement_crotch_back = $_POST["pants_pants_measurement_crotch_back"];

$suits_with_vest_pants_measurement_inseam_length = $_POST["pants_pants_measurement_inseam_length"];
$suits_with_vest_pants_measurement_thighs = $_POST["pants_pants_measurement_thighs"];
$suits_with_vest_pants_measurement_knees = $_POST["pants_pants_measurement_knees"];
$suits_with_vest_pants_measurement_cuffs_ankle = $_POST["pants_pants_measurement_cuffs_ankle"];
$suits_with_vest_pants_measurement_length_outleg = $_POST["pants_pants_measurement_length_outleg"];
$suits_with_vest_pants_measurement_only_crotch = $_POST["pants_pants_measurement_only_crotch"];
$suits_with_vest_pants_measurement_front_rise = $_POST["pants_pants_measurement_front_rise"];
$suits_with_vest_pants_measurement_cuffs = $_POST["pants_pants_measurement_cuffs"];
$suits_with_vest_vest_measurement_sex = $_POST["item_measurement_sex"];
$suits_with_vest_vest_measurement_fit = $_POST["vest_vest_measurement_fit"];
$suits_with_vest_vest_measurement = $_POST["item_measurement"];
$suits_with_vest_vest_measurement_vest_length = $_POST["vest_vest_measurement_vest_length"];
$suits_with_vest_vest_measurement_back_lenght = $_POST["vest_vest_measurement_back_lenght"];
$suits_with_vest_vest_measurement_chest = $_POST["vest_vest_measurement_chest"];
$suits_with_vest_vest_measurement_waist_upper = $_POST["vest_vest_measurement_waist_upper"];
$suits_with_vest_vest_measurement_waist_lower = $_POST["vest_vest_measurement_waist_lower"];
$suits_with_vest_vest_measurement_hips = $_POST["vest_vest_measurement_hips"];
$suits_with_vest_vest_measurement_shoulders = $_POST["vest_vest_measurement_shoulders"];
$suits_with_vest_vest_measurement_sleeves_right = $_POST["vest_vest_measurement_sleeves_right"];
$suits_with_vest_vest_measurement_sleeves_left = $_POST["vest_vest_measurement_sleeves_left"];
$suits_with_vest_vest_measurement_neck = $_POST["vest_vest_measurement_neck"];
$suits_with_vest_vest_measurement_ptp_front = $_POST["vest_vest_measurement_ptp_front"];
$suits_with_vest_vest_measurement_ptp_back = $_POST["vest_vest_measurement_ptp_back"];
$suits_with_vest_vest_measurement_arm_hole = $_POST["vest_vest_measurement_arm_hole"];
$suits_with_vest_vest_measurement_biceps = $_POST["vest_vest_measurement_biceps"];
$suits_with_vest_measurement_jacket_shoulder = $_POST["item_measurement_jacket_shoulder"];
$suits_with_vest_measurement_jacket_waist = $_POST["item_measurement_jacket_waist"];
$suits_with_vest_measurement_jacket_chest = $_POST["item_measurement_jacket_chest"];
$suits_with_vest_measurement_pants_waist = $_POST["item_measurement_pants_waist"];
$suits_with_vest_measurement_pants_bottom = $_POST["item_measurement_pants_bottom"];

/*SUITS WITH VEST ECT*/
$suits_with_vest_ip = $_POST['ip'];
$suits_with_vest_status = T;

/*TUXEDO JACKET CUSTOMER*/
$tuxedo_jacket_customer_name = $_POST["item_customer_name"];
$tuxedo_jacket_order_no = $_POST["item_order_no"];

/*TUXEDO JACKET MEASUREMENTS*/
$tuxedo_jacket_jacket_measurement_sex = $_POST["item_measurement_sex"];
$tuxedo_jacket_jacket_measurement_fit = $_POST["jacket_jacket_measurement_fit"];
$tuxedo_jacket_jacket_measurement = $_POST["item_measurement"];
$tuxedo_jacket_jacket_measurement_jacket_length = $_POST["jacket_jacket_measurement_jacket_length"];
$tuxedo_jacket_jacket_measurement_back_lenght = $_POST["jacket_jacket_measurement_back_lenght"];
$tuxedo_jacket_jacket_measurement_chest = $_POST["jacket_jacket_measurement_chest"];
$tuxedo_jacket_jacket_measurement_waist_upper = $_POST["jacket_jacket_measurement_waist_upper"];
$tuxedo_jacket_jacket_measurement_waist_lower = $_POST["jacket_jacket_measurement_waist_lower"];
$tuxedo_jacket_jacket_measurement_hips = $_POST["jacket_jacket_measurement_hips"];
$tuxedo_jacket_jacket_measurement_shoulders = $_POST["jacket_jacket_measurement_shoulders"];
$tuxedo_jacket_jacket_measurement_neck = $_POST["jacket_jacket_measurement_neck"];
$tuxedo_jacket_jacket_measurement_ptp_front = $_POST["jacket_jacket_measurement_ptp_front"];
$tuxedo_jacket_jacket_measurement_ptp_back = $_POST["jacket_jacket_measurement_ptp_back"];
$tuxedo_jacket_jacket_measurement_arm_hole = $_POST["jacket_jacket_measurement_arm_hole"];
$tuxedo_jacket_jacket_measurement_biceps = $_POST["jacket_jacket_measurement_biceps"];
$tuxedo_jacket_jacket_measurement_sleeves_right = $_POST["jacket_jacket_measurement_sleeves_right"];
$tuxedo_jacket_jacket_measurement_sleeves_left = $_POST["jacket_jacket_measurement_sleeves_left"];
$tuxedo_jacket_jacket_measurement_wrist_right = $_POST["jacket_jacket_measurement_wrist_right"];
$tuxedo_jacket_jacket_measurement_wrist_left = $_POST["jacket_jacket_measurement_wrist_left"];
$tuxedo_jacket_jacket_measurement_first_button = $_POST["jacket_jacket_measurement_first_button"];
$tuxedo_jacket_jacket_measurement_shoulder_upper_wrist = $_POST["jacket_jacket_measurement_shoulder_upper_wrist"];
$tuxedo_jacket_jacket_measurement_shoulder_lower_wrist = $_POST["jacket_jacket_measurement_shoulder_lower_wrist"];
$tuxedo_jacket_measurement_jacket_shoulder = $_POST["item_measurement_jacket_shoulder"];
$tuxedo_jacket_measurement_jacket_waist = $_POST["item_measurement_jacket_waist"];
$tuxedo_jacket_measurement_jacket_chest = $_POST["item_measurement_jacket_chest"];

/*TUXEDO JACKET ECT*/
$tuxedo_jacket_ip = $_POST['ip'];
$tuxedo_jacket_status = T;

/*TUXEDO SUITS CUSTOMER*/
$tuxedo_suits_customer_name = $_POST["item_customer_name"];
$tuxedo_suits_order_no = $_POST["item_order_no"];

/*TUXEDO SUITS MEASUREMENTS*/
$tuxedo_suits_jacket_measurement_sex = $_POST["item_measurement_sex"];
$tuxedo_suits_jacket_measurement_fit = $_POST["jacket_jacket_measurement_fit"];
$tuxedo_suits_jacket_measurement = $_POST["item_measurement"];
$tuxedo_suits_jacket_measurement_jacket_length = $_POST["jacket_jacket_measurement_jacket_length"];
$tuxedo_suits_jacket_measurement_back_lenght = $_POST["jacket_jacket_measurement_back_lenght"];
$tuxedo_suits_jacket_measurement_chest = $_POST["jacket_jacket_measurement_chest"];
$tuxedo_suits_jacket_measurement_waist_upper = $_POST["jacket_jacket_measurement_waist_upper"];
$tuxedo_suits_jacket_measurement_waist_lower = $_POST["jacket_jacket_measurement_waist_lower"];
$tuxedo_suits_jacket_measurement_hips = $_POST["jacket_jacket_measurement_hips"];
$tuxedo_suits_jacket_measurement_shoulders = $_POST["jacket_jacket_measurement_shoulders"];
$tuxedo_suits_jacket_measurement_neck = $_POST["jacket_jacket_measurement_neck"];
$tuxedo_suits_jacket_measurement_ptp_front = $_POST["jacket_jacket_measurement_ptp_front"];
$tuxedo_suits_jacket_measurement_ptp_back = $_POST["jacket_jacket_measurement_ptp_back"];
$tuxedo_suits_jacket_measurement_arm_hole = $_POST["jacket_jacket_measurement_arm_hole"];
$tuxedo_suits_jacket_measurement_biceps = $_POST["jacket_jacket_measurement_biceps"];
$tuxedo_suits_jacket_measurement_sleeves_right = $_POST["jacket_jacket_measurement_sleeves_right"];
$tuxedo_suits_jacket_measurement_sleeves_left = $_POST["jacket_jacket_measurement_sleeves_left"];
$tuxedo_suits_jacket_measurement_wrist_right = $_POST["jacket_jacket_measurement_wrist_right"];
$tuxedo_suits_jacket_measurement_wrist_left = $_POST["jacket_jacket_measurement_wrist_left"];
$tuxedo_suits_jacket_measurement_first_button = $_POST["jacket_jacket_measurement_first_button"];
$tuxedo_suits_jacket_measurement_shoulder_upper_wrist = $_POST["jacket_jacket_measurement_shoulder_upper_wrist"];
$tuxedo_suits_jacket_measurement_shoulder_lower_wrist = $_POST["jacket_jacket_measurement_shoulder_lower_wrist"];
$tuxedo_suits_pants_measurement_sex = $_POST["item_measurement_sex"];
$tuxedo_suits_pants_measurement_length = $_POST["pants_pants_measurement_length"];
$tuxedo_suits_pants_measurement_fit = $_POST["pants_pants_measurement_fit"];
$tuxedo_suits_pants_measurement = $_POST["item_measurement"];
$tuxedo_suits_pants_measurement_waist = $_POST["pants_pants_measurement_waist"];
$tuxedo_suits_pants_measurement_hips = $_POST["pants_pants_measurement_hips"];
$tuxedo_suits_pants_measurement_crotch_full = $_POST["pants_pants_measurement_crotch_full"];
$tuxedo_suits_pants_measurement_crotch_front = $_POST["pants_pants_measurement_crotch_front"];
$tuxedo_suits_pants_measurement_crotch_back = $_POST["pants_pants_measurement_crotch_back"];
$tuxedo_suits_pants_measurement_inseam_length = $_POST["pants_pants_measurement_inseam_length"];
$tuxedo_suits_pants_measurement_thighs = $_POST["pants_pants_measurement_thighs"];
$tuxedo_suits_pants_measurement_knees = $_POST["pants_pants_measurement_knees"];
$tuxedo_suits_pants_measurement_cuffs_ankle = $_POST["pants_pants_measurement_cuffs_ankle"];
$tuxedo_suits_pants_measurement_length_outleg = $_POST["pants_pants_measurement_length_outleg"];
$tuxedo_suits_pants_measurement_only_crotch = $_POST["pants_pants_measurement_only_crotch"];
$tuxedo_suits_pants_measurement_front_rise = $_POST["pants_pants_measurement_front_rise"];
$tuxedo_suits_pants_measurement_cuffs = $_POST["pants_pants_measurement_cuffs"];
$tuxedo_suits_measurement_jacket_shoulder = $_POST["item_measurement_jacket_shoulder"];
$tuxedo_suits_measurement_jacket_waist = $_POST["item_measurement_jacket_waist"];
$tuxedo_suits_measurement_jacket_chest = $_POST["item_measurement_jacket_chest"];
$tuxedo_suits_measurement_pants_waist = $_POST["item_measurement_pants_waist"];
$tuxedo_suits_measurement_pants_bottom = $_POST["item_measurement_pants_bottom"];

/*TUXEDO SUITS ECT*/
$tuxedo_suits_ip = $_POST['ip'];
$tuxedo_suits_status = T;

/*TUXEDO WITH VEST CUSTOMER*/
$tuxedo_with_vest_customer_name = $_POST["item_customer_name"];
$tuxedo_with_vest_order_no = $_POST["item_order_no"];

/*TUXEDO WITH VEST MEASUREMENTS*/
$tuxedo_with_vest_jacket_measurement_sex = $_POST["item_measurement_sex"];
$tuxedo_with_vest_jacket_measurement_fit = $_POST["jacket_jacket_measurement_fit"];
$tuxedo_with_vest_jacket_measurement = $_POST["item_measurement"];
$tuxedo_with_vest_jacket_measurement_jacket_length = $_POST["jacket_jacket_measurement_jacket_length"];
$tuxedo_with_vest_jacket_measurement_back_lenght = $_POST["jacket_jacket_measurement_back_lenght"];
$tuxedo_with_vest_jacket_measurement_chest = $_POST["jacket_jacket_measurement_chest"];
$tuxedo_with_vest_jacket_measurement_waist_upper = $_POST["jacket_jacket_measurement_waist_upper"];
$tuxedo_with_vest_jacket_measurement_waist_lower = $_POST["jacket_jacket_measurement_waist_lower"];
$tuxedo_with_vest_jacket_measurement_hips = $_POST["jacket_jacket_measurement_hips"];
$tuxedo_with_vest_jacket_measurement_shoulders = $_POST["jacket_jacket_measurement_shoulders"];
$tuxedo_with_vest_jacket_measurement_neck = $_POST["jacket_jacket_measurement_neck"];
$tuxedo_with_vest_jacket_measurement_ptp_front = $_POST["jacket_jacket_measurement_ptp_front"];
$tuxedo_with_vest_jacket_measurement_ptp_back = $_POST["jacket_jacket_measurement_ptp_back"];
$tuxedo_with_vest_jacket_measurement_arm_hole = $_POST["jacket_jacket_measurement_arm_hole"];
$tuxedo_with_vest_jacket_measurement_biceps = $_POST["jacket_jacket_measurement_biceps"];
$tuxedo_with_vest_jacket_measurement_sleeves_right = $_POST["jacket_jacket_measurement_sleeves_right"];
$tuxedo_with_vest_jacket_measurement_sleeves_left = $_POST["jacket_jacket_measurement_sleeves_left"];
$tuxedo_with_vest_jacket_measurement_wrist_right = $_POST["jacket_jacket_measurement_wrist_right"];
$tuxedo_with_vest_jacket_measurement_wrist_left = $_POST["jacket_jacket_measurement_wrist_left"];
$tuxedo_with_vest_jacket_measurement_first_button = $_POST["jacket_jacket_measurement_first_button"];
$tuxedo_with_vest_jacket_measurement_shoulder_upper_wrist = $_POST["jacket_jacket_measurement_shoulder_upper_wrist"];
$tuxedo_with_vest_jacket_measurement_shoulder_lower_wrist = $_POST["jacket_jacket_measurement_shoulder_lower_wrist"];
$tuxedo_with_vest_pants_measurement_sex = $_POST["item_measurement_sex"];
$tuxedo_with_vest_pants_measurement_length = $_POST["pants_pants_measurement_length"];
$tuxedo_with_vest_pants_measurement_fit = $_POST["pants_pants_measurement_fit"];
$tuxedo_with_vest_pants_measurement = $_POST["item_measurement"];
$tuxedo_with_vest_pants_measurement_waist = $_POST["pants_pants_measurement_waist"];
$tuxedo_with_vest_pants_measurement_hips = $_POST["pants_pants_measurement_hips"];
$tuxedo_with_vest_pants_measurement_crotch_full = $_POST["pants_pants_measurement_crotch_full"];
$tuxedo_with_vest_pants_measurement_crotch_front = $_POST["pants_pants_measurement_crotch_front"];
$tuxedo_with_vest_pants_measurement_crotch_back = $_POST["pants_pants_measurement_crotch_back"];
$tuxedo_with_vest_pants_measurement_inseam_length = $_POST["pants_pants_measurement_inseam_length"];
$tuxedo_with_vest_pants_measurement_thighs = $_POST["pants_pants_measurement_thighs"];
$tuxedo_with_vest_pants_measurement_knees = $_POST["pants_pants_measurement_knees"];
$tuxedo_with_vest_pants_measurement_cuffs_ankle = $_POST["pants_pants_measurement_cuffs_ankle"];
$tuxedo_with_vest_pants_measurement_length_outleg = $_POST["pants_pants_measurement_length_outleg"];
$tuxedo_with_vest_pants_measurement_only_crotch = $_POST["pants_pants_measurement_only_crotch"];
$tuxedo_with_vest_pants_measurement_front_rise = $_POST["pants_pants_measurement_front_rise"];
$tuxedo_with_vest_pants_measurement_cuffs = $_POST["pants_pants_measurement_cuffs"];
$tuxedo_with_vest_vest_measurement_sex = $_POST["item_measurement_sex"];
$tuxedo_with_vest_vest_measurement_fit = $_POST["vest_vest_measurement_fit"];
$tuxedo_with_vest_vest_measurement = $_POST["item_measurement"];
$tuxedo_with_vest_vest_measurement_vest_length = $_POST["vest_vest_measurement_vest_length"];
$tuxedo_with_vest_vest_measurement_back_lenght = $_POST["vest_vest_measurement_back_lenght"];
$tuxedo_with_vest_vest_measurement_chest = $_POST["vest_vest_measurement_chest"];
$tuxedo_with_vest_vest_measurement_waist_upper = $_POST["vest_vest_measurement_waist_upper"];
$tuxedo_with_vest_vest_measurement_waist_lower = $_POST["vest_vest_measurement_waist_lower"];
$tuxedo_with_vest_vest_measurement_hips = $_POST["vest_vest_measurement_hips"];
$tuxedo_with_vest_vest_measurement_shoulders = $_POST["vest_vest_measurement_shoulders"];
$tuxedo_with_vest_vest_measurement_sleeves_right = $_POST["vest_vest_measurement_sleeves_right"];
$tuxedo_with_vest_vest_measurement_sleeves_left = $_POST["vest_vest_measurement_sleeves_left"];
$tuxedo_with_vest_vest_measurement_neck = $_POST["vest_vest_measurement_neck"];
$tuxedo_with_vest_vest_measurement_ptp_front = $_POST["vest_vest_measurement_ptp_front"];
$tuxedo_with_vest_vest_measurement_ptp_back = $_POST["vest_vest_measurement_ptp_back"];
$tuxedo_with_vest_vest_measurement_arm_hole = $_POST["vest_vest_measurement_arm_hole"];
$tuxedo_with_vest_vest_measurement_biceps = $_POST["vest_vest_measurement_biceps"];
$tuxedo_with_vest_measurement_jacket_shoulder = $_POST["item_measurement_jacket_shoulder"];
$tuxedo_with_vest_measurement_jacket_waist = $_POST["item_measurement_jacket_waist"];
$tuxedo_with_vest_measurement_jacket_chest = $_POST["item_measurement_jacket_chest"];
$tuxedo_with_vest_measurement_pants_waist = $_POST["item_measurement_pants_waist"];
$tuxedo_with_vest_measurement_pants_bottom = $_POST["item_measurement_pants_bottom"];

/*TUXEDO WITH VEST ECT*/
$tuxedo_with_vest_ip = $_POST['ip'];
$tuxedo_with_vest_status = T;

/*VEST CUSTOMER*/
$vest_customer_name = $_POST["item_customer_name"];
$vest_order_no = $_POST["item_order_no"];

/*VEST MEASUREMENTS*/
$vest_vest_measurement_sex = $_POST["vest_vest_measurement_sex"];
$vest_vest_measurement_fit = $_POST["vest_vest_measurement_fit"];
$vest_vest_measurement = $_POST["vest_vest_measurement"];
$vest_vest_measurement_vest_length = $_POST["vest_vest_measurement_vest_length"];
$vest_vest_measurement_back_lenght = $_POST["vest_vest_measurement_back_lenght"];
$vest_vest_measurement_chest = $_POST["vest_vest_measurement_chest"];
$vest_vest_measurement_waist_upper = $_POST["vest_vest_measurement_waist_upper"];
$vest_vest_measurement_waist_lower = $_POST["vest_vest_measurement_waist_lower"];
$vest_vest_measurement_hips = $_POST["vest_vest_measurement_hips"];
$vest_vest_measurement_shoulders = $_POST["vest_vest_measurement_shoulders"];
$vest_vest_measurement_sleeves_right = $_POST["vest_vest_measurement_sleeves_right"];
$vest_vest_measurement_sleeves_left = $_POST["vest_vest_measurement_sleeves_left"];
$vest_vest_measurement_neck = $_POST["vest_vest_measurement_neck"];
$vest_vest_measurement_ptp_front = $_POST["vest_vest_measurement_ptp_front"];
$vest_vest_measurement_ptp_back = $_POST["vest_vest_measurement_ptp_back"];
$vest_vest_measurement_arm_hole = $_POST["vest_vest_measurement_arm_hole"];
$vest_vest_measurement_biceps = $_POST["vest_vest_measurement_biceps"];
$vest_measurement_jacket_shoulder = $_POST["item_measurement_jacket_shoulder"];
$vest_measurement_jacket_waist = $_POST["item_measurement_jacket_waist"];
$vest_measurement_jacket_chest = $_POST["item_measurement_jacket_chest"];

/*VEST ECT*/
$vest_ip = $_POST['ip'];
$vest_status = T;

/*CLIENT BODY POSTURE - PICTURES*/
$item_body_front = $_POST["item_body_front"];
$item_body_left = $_POST["item_body_left"];
$item_body_right = $_POST["item_body_right"];
$item_body_back = $_POST["item_body_back"];

$sql1 = " UPDATE customize_jacket_design SET jacket_customer_name = '$jacket_customer_name', jacket_order_no = '$jacket_order_no' WHERE order_id = '$order_id' AND jacket_status = '$jacket_status' ";
$query1 = mysql_query($sql1) or die("Can't Query1");

$sql2 = " UPDATE customize_jacket_measurements SET jacket_jacket_measurement_sex = '$jacket_jacket_measurement_sex', jacket_jacket_measurement_fit = '$jacket_jacket_measurement_fit', jacket_jacket_measurement = '$jacket_jacket_measurement', jacket_jacket_measurement_jacket_length = '$jacket_jacket_measurement_jacket_length', jacket_jacket_measurement_back_lenght = '$jacket_jacket_measurement_back_lenght', jacket_jacket_measurement_chest = '$jacket_jacket_measurement_chest', jacket_jacket_measurement_waist_upper = '$jacket_jacket_measurement_waist_upper', jacket_jacket_measurement_waist_lower = '$jacket_jacket_measurement_waist_lower', jacket_jacket_measurement_hips = '$jacket_jacket_measurement_hips', jacket_jacket_measurement_shoulders = '$jacket_jacket_measurement_shoulders', jacket_jacket_measurement_neck = '$jacket_jacket_measurement_neck', jacket_jacket_measurement_ptp_front = '$jacket_jacket_measurement_ptp_front', jacket_jacket_measurement_ptp_back = '$jacket_jacket_measurement_ptp_back', jacket_jacket_measurement_arm_hole = '$jacket_jacket_measurement_arm_hole', jacket_jacket_measurement_biceps = '$jacket_jacket_measurement_biceps', jacket_jacket_measurement_sleeves_right = '$jacket_jacket_measurement_sleeves_right', jacket_jacket_measurement_sleeves_left = '$jacket_jacket_measurement_sleeves_left', jacket_jacket_measurement_wrist_right = '$jacket_jacket_measurement_wrist_right', jacket_jacket_measurement_wrist_left = '$jacket_jacket_measurement_wrist_left', jacket_jacket_measurement_first_button = '$jacket_jacket_measurement_first_button', jacket_jacket_measurement_shoulder_upper_wrist = '$jacket_jacket_measurement_shoulder_upper_wrist', jacket_jacket_measurement_shoulder_lower_wrist = '$jacket_jacket_measurement_shoulder_lower_wrist', jacket_measurement_jacket_shoulder = '$jacket_measurement_jacket_shoulder', jacket_measurement_jacket_waist = '$jacket_measurement_jacket_waist', jacket_measurement_jacket_chest = '$jacket_measurement_jacket_chest', jacket_ip = '$jacket_ip' WHERE order_id = '$order_id' AND jacket_status = '$jacket_status' ";
$query2 = mysql_query($sql2) or die("Can't Query2");

$sql3 = " UPDATE customize_jeans_design SET jeans_customer_name = '$jeans_customer_name', jeans_order_no = '$jeans_order_no' WHERE order_id = '$order_id' AND jeans_status = '$jeans_status' ";
$query3 = mysql_query($sql3) or die("Can't Query3");

$sql4 = " UPDATE customize_jeans_measurements SET jeans_measurement_sex = '$jeans_measurement_sex', jeans_measurement = '$jeans_measurement', jeans_measurement_waist = '$jeans_measurement_waist', jeans_measurement_hips = '$jeans_measurement_hips', jeans_measurement_crotch = '$jeans_measurement_crotch', jeans_measurement_thighs = '$jeans_measurement_thighs', jeans_measurement_knees = '$jeans_measurement_knees', jeans_measurement_cuffs_ankle = '$jeans_measurement_cuffs_ankle', jeans_measurement_length_outleg = '$jeans_measurement_length_outleg', jeans_measurement_pants_waist = '$jeans_measurement_pants_waist', jeans_measurement_pants_bottom = '$jeans_measurement_pants_bottom', jeans_ip = '$jeans_ip' WHERE order_id = '$order_id' AND jeans_status = '$jeans_status' ";
$query4 = mysql_query($sql4) or die("Can't Query4");

$sql5 = " UPDATE customize_overcoat_design SET overcoat_customer_name = '$overcoat_customer_name', overcoat_order_no = '$overcoat_order_no' WHERE order_id = '$order_id' AND overcoat_status = '$overcoat_status' ";
$query5 = mysql_query($sql5) or die("Can't Query5");

$sql6 = " UPDATE customize_overcoat_measurements SET overcoat_overcoat_measurement_sex = '$overcoat_overcoat_measurement_sex', overcoat_overcoat_measurement_fit = '$overcoat_overcoat_measurement_fit', overcoat_overcoat_measurement = '$overcoat_overcoat_measurement', overcoat_overcoat_measurement_overcoat_length = '$overcoat_overcoat_measurement_overcoat_length', overcoat_overcoat_measurement_back_lenght = '$overcoat_overcoat_measurement_back_lenght', overcoat_overcoat_measurement_chest = '$overcoat_overcoat_measurement_chest', overcoat_overcoat_measurement_waist_upper = '$overcoat_overcoat_measurement_waist_upper', overcoat_overcoat_measurement_waist_lower = '$overcoat_overcoat_measurement_waist_lower', overcoat_overcoat_measurement_hips = '$overcoat_overcoat_measurement_hips', overcoat_overcoat_measurement_shoulders = '$overcoat_overcoat_measurement_shoulders', overcoat_overcoat_measurement_neck = '$overcoat_overcoat_measurement_neck', overcoat_overcoat_measurement_ptp_front = '$overcoat_overcoat_measurement_ptp_front', overcoat_overcoat_measurement_ptp_back = '$overcoat_overcoat_measurement_ptp_back', overcoat_overcoat_measurement_arm_hole = '$overcoat_overcoat_measurement_arm_hole', overcoat_overcoat_measurement_biceps = '$overcoat_overcoat_measurement_biceps', overcoat_overcoat_measurement_sleeves_right = '$overcoat_overcoat_measurement_sleeves_right', overcoat_overcoat_measurement_sleeves_left = '$overcoat_overcoat_measurement_sleeves_left', overcoat_overcoat_measurement_wrist_right = '$overcoat_overcoat_measurement_wrist_right', overcoat_overcoat_measurement_wrist_left = '$overcoat_overcoat_measurement_wrist_left', overcoat_measurement_overcoat_shoulder = '$overcoat_measurement_overcoat_shoulder', overcoat_measurement_overcoat_waist = '$overcoat_measurement_overcoat_waist', overcoat_measurement_overcoat_chest = '$overcoat_measurement_overcoat_chest', overcoat_ip = '$overcoat_ip' WHERE order_id = '$order_id' AND overcoat_status = '$overcoat_status' ";
$query6 = mysql_query($sql6) or die("Can't Query6");

$sql7 = " UPDATE customize_pants_design SET pants_customer_name = '$pants_customer_name', pants_order_no = '$pants_order_no' WHERE order_id = '$order_id' AND pants_status = '$pants_status' ";
$query7 = mysql_query($sql7) or die("Can't Query7");

$sql8 = " UPDATE customize_pants_measurements SET pants_pants_measurement_sex = '$pants_pants_measurement_sex', pants_pants_measurement_length = '$pants_pants_measurement_length', pants_pants_measurement_fit = '$pants_pants_measurement_fit', pants_pants_measurement = '$pants_pants_measurement', pants_pants_measurement_waist = '$pants_pants_measurement_waist', pants_pants_measurement_hips = '$pants_pants_measurement_hips', pants_pants_measurement_crotch_full = '$pants_pants_measurement_crotch_full', pants_pants_measurement_crotch_front = '$pants_pants_measurement_crotch_front', pants_pants_measurement_crotch_back = '$pants_pants_measurement_crotch_back', pants_pants_measurement_inseam_length = '$pants_pants_measurement_inseam_length', pants_pants_measurement_thighs = '$pants_pants_measurement_thighs', pants_pants_measurement_knees = '$pants_pants_measurement_knees', pants_pants_measurement_cuffs_ankle = '$pants_pants_measurement_cuffs_ankle', pants_pants_measurement_length_outleg = '$pants_pants_measurement_length_outleg', pants_pants_measurement_only_crotch = '$pants_pants_measurement_only_crotch', pants_pants_measurement_front_rise = '$pants_pants_measurement_front_rise', pants_pants_measurement_cuffs = '$pants_pants_measurement_cuffs', pants_measurement_pants_waist = '$pants_measurement_pants_waist', pants_measurement_pants_bottom = '$pants_measurement_pants_bottom', pants_ip = '$pants_ip' WHERE order_id = '$order_id' AND pants_status = '$pants_status' ";
$query8 = mysql_query($sql8) or die("Can't Query8");

$sql9 = " UPDATE customize_shirt_design SET shirt_customer_name = '$shirt_customer_name', shirt_order_no = '$shirt_order_no' WHERE order_id = '$order_id' AND shirt_status = '$shirt_status' ";
$query9 = mysql_query($sql9) or die("Can't Query9");

$sql10 = " UPDATE customize_shirt_measurements SET shirt_measurement_sex = '$shirt_measurement_sex', shirt_measurement_sleeves = '$shirt_measurement_sleeves', shirt_measurement_fit = '$shirt_measurement_fit', shirt_measurement = '$shirt_measurement', shirt_measurement_shirt_length = '$shirt_measurement_shirt_length', shirt_measurement_chest = '$shirt_measurement_chest', shirt_measurement_waist_upper = '$shirt_measurement_waist_upper', shirt_measurement_waist_lower = '$shirt_measurement_waist_lower', shirt_measurement_hips = '$shirt_measurement_hips', shirt_measurement_shoulders = '$shirt_measurement_shoulders', shirt_measurement_sleeves_right = '$shirt_measurement_sleeves_right', shirt_measurement_sleeves_left = '$shirt_measurement_sleeves_left', shirt_measurement_neck = '$shirt_measurement_neck', shirt_measurement_biceps = '$shirt_measurement_biceps', shirt_measurement_wrist_right = '$shirt_measurement_wrist_right', shirt_measurement_wrist_left = '$shirt_measurement_wrist_left', shirt_measurement_back_length = '$shirt_measurement_back_length', shirt_measurement_forearm = '$shirt_measurement_forearm', shirt_measurement_shoulder = '$shirt_measurement_shoulder', shirt_measurement_waist = '$shirt_measurement_waist', shirt_measurement_chest_body = '$shirt_measurement_chest_body', shirt_ip = '$shirt_ip' WHERE order_id = '$order_id' AND shirt_status = '$shirt_status' ";
$query10 = mysql_query($sql10) or die("Can't Query10");

$sql11 = " UPDATE customize_suits_design SET suits_customer_name = '$suits_customer_name', suits_order_no = '$suits_order_no' WHERE order_id = '$order_id' AND suits_status = '$suits_status' ";
$query11 = mysql_query($sql11) or die("Can't Query11");

$sql12 = " UPDATE customize_suits_measurements SET suits_jacket_measurement_sex = '$suits_jacket_measurement_sex', suits_jacket_measurement_fit = '$suits_jacket_measurement_fit', suits_jacket_measurement = '$suits_jacket_measurement', suits_jacket_measurement_jacket_length = '$suits_jacket_measurement_jacket_length', suits_jacket_measurement_back_lenght = '$suits_jacket_measurement_back_lenght', suits_jacket_measurement_chest = '$suits_jacket_measurement_chest', suits_jacket_measurement_waist_upper = '$suits_jacket_measurement_waist_upper', suits_jacket_measurement_waist_lower = '$suits_jacket_measurement_waist_lower', suits_jacket_measurement_hips = '$suits_jacket_measurement_hips', suits_jacket_measurement_shoulders = '$suits_jacket_measurement_shoulders', suits_jacket_measurement_neck = '$suits_jacket_measurement_neck', suits_jacket_measurement_ptp_front = '$suits_jacket_measurement_ptp_front', suits_jacket_measurement_ptp_back = '$suits_jacket_measurement_ptp_back', suits_jacket_measurement_arm_hole = '$suits_jacket_measurement_arm_hole', suits_jacket_measurement_biceps = '$suits_jacket_measurement_biceps', suits_jacket_measurement_sleeves_right = '$suits_jacket_measurement_sleeves_right', suits_jacket_measurement_sleeves_left = '$suits_jacket_measurement_sleeves_left', suits_jacket_measurement_wrist_right = '$suits_jacket_measurement_wrist_right', suits_jacket_measurement_wrist_left = '$suits_jacket_measurement_wrist_left', suits_jacket_measurement_first_button = '$suits_jacket_measurement_first_button', suits_jacket_measurement_shoulder_upper_wrist = '$suits_jacket_measurement_shoulder_upper_wrist', suits_jacket_measurement_shoulder_lower_wrist = '$suits_jacket_measurement_shoulder_lower_wrist', suits_pants_measurement_sex = '$suits_pants_measurement_sex', suits_pants_measurement_length = '$suits_pants_measurement_length', suits_pants_measurement_fit = '$suits_pants_measurement_fit', suits_pants_measurement = '$suits_pants_measurement', suits_pants_measurement_waist = '$suits_pants_measurement_waist', suits_pants_measurement_hips = '$suits_pants_measurement_hips', suits_pants_measurement_crotch_full = '$suits_pants_measurement_crotch_full', suits_pants_measurement_crotch_front = '$suits_pants_measurement_crotch_front', suits_pants_measurement_crotch_back = '$suits_pants_measurement_crotch_back' , suits_pants_measurement_inseam_length = '$suits_pants_measurement_inseam_length', suits_pants_measurement_thighs = '$suits_pants_measurement_thighs', suits_pants_measurement_knees = '$suits_pants_measurement_knees', suits_pants_measurement_cuffs_ankle = '$suits_pants_measurement_cuffs_ankle', suits_pants_measurement_length_outleg = '$suits_pants_measurement_length_outleg', suits_pants_measurement_only_crotch = '$suits_pants_measurement_only_crotch', suits_pants_measurement_front_rise = '$suits_pants_measurement_front_rise', suits_pants_measurement_cuffs = '$suits_pants_measurement_cuffs', suits_measurement_jacket_shoulder = '$suits_measurement_jacket_shoulder', suits_measurement_jacket_waist = '$suits_measurement_jacket_waist', suits_measurement_jacket_chest = '$suits_measurement_jacket_chest', suits_measurement_pants_waist = '$suits_measurement_pants_waist' , suits_measurement_pants_bottom = '$suits_measurement_pants_bottom', suits_ip = '$suits_ip' WHERE order_id = '$order_id' AND suits_status = '$suits_status' ";
$query12 = mysql_query($sql12) or die("Can't Query12");

$sql13 = " UPDATE customize_suits_with_vest_design SET suits_with_vest_customer_name = '$suits_with_vest_customer_name', suits_with_vest_order_no = '$suits_with_vest_order_no' WHERE order_id = '$order_id' AND suits_with_vest_status = '$suits_with_vest_status' ";
$query13 = mysql_query($sql13) or die("Can't Query13");

$sql14 = " UPDATE customize_suits_with_vest_measurements SET suits_with_vest_jacket_measurement_sex = '$suits_with_vest_jacket_measurement_sex', suits_with_vest_jacket_measurement_fit = '$suits_with_vest_jacket_measurement_fit', suits_with_vest_jacket_measurement = '$suits_with_vest_jacket_measurement', suits_with_vest_jacket_measurement_jacket_length = '$suits_with_vest_jacket_measurement_jacket_length', suits_with_vest_jacket_measurement_back_lenght = '$suits_with_vest_jacket_measurement_back_lenght', suits_with_vest_jacket_measurement_chest = '$suits_with_vest_jacket_measurement_chest', suits_with_vest_jacket_measurement_waist_upper = '$suits_with_vest_jacket_measurement_waist_upper', suits_with_vest_jacket_measurement_waist_lower = '$suits_with_vest_jacket_measurement_waist_lower', suits_with_vest_jacket_measurement_hips = '$suits_with_vest_jacket_measurement_hips', suits_with_vest_jacket_measurement_shoulders = '$suits_with_vest_jacket_measurement_shoulders', suits_with_vest_jacket_measurement_neck = '$suits_with_vest_jacket_measurement_neck', suits_with_vest_jacket_measurement_ptp_front = '$suits_with_vest_jacket_measurement_ptp_front', suits_with_vest_jacket_measurement_ptp_back = '$suits_with_vest_jacket_measurement_ptp_back', suits_with_vest_jacket_measurement_arm_hole = '$suits_with_vest_jacket_measurement_arm_hole', suits_with_vest_jacket_measurement_biceps = '$suits_with_vest_jacket_measurement_biceps', suits_with_vest_jacket_measurement_sleeves_right = '$suits_with_vest_jacket_measurement_sleeves_right', suits_with_vest_jacket_measurement_sleeves_left = '$suits_with_vest_jacket_measurement_sleeves_left', suits_with_vest_jacket_measurement_wrist_right = '$suits_with_vest_jacket_measurement_wrist_right', suits_with_vest_jacket_measurement_wrist_left = '$suits_with_vest_jacket_measurement_wrist_left', suits_with_vest_jacket_measurement_first_button = '$suits_with_vest_jacket_measurement_first_button', suits_with_vest_jacket_measurement_shoulder_upper_wrist = '$suits_with_vest_jacket_measurement_shoulder_upper_wrist', suits_with_vest_jacket_measurement_shoulder_lower_wrist = '$suits_with_vest_jacket_measurement_shoulder_lower_wrist', suits_with_vest_pants_measurement_sex = '$suits_with_vest_pants_measurement_sex', suits_with_vest_pants_measurement_length = '$suits_with_vest_pants_measurement_length', suits_with_vest_pants_measurement_fit = '$suits_with_vest_pants_measurement_fit', suits_with_vest_pants_measurement = '$suits_with_vest_pants_measurement', suits_with_vest_pants_measurement_waist = '$suits_with_vest_pants_measurement_waist', suits_with_vest_pants_measurement_hips = '$suits_with_vest_pants_measurement_hips', suits_with_vest_pants_measurement_crotch_full = '$suits_with_vest_pants_measurement_crotch_full', suits_with_vest_pants_measurement_crotch_front = '$suits_with_vest_pants_measurement_crotch_front', suits_with_vest_pants_measurement_crotch_back = '$suits_with_vest_pants_measurement_crotch_back', suits_with_vest_pants_measurement_inseam_length = '$suits_with_vest_pants_measurement_inseam_length', suits_with_vest_pants_measurement_thighs = '$suits_with_vest_pants_measurement_thighs', suits_with_vest_pants_measurement_knees = '$suits_with_vest_pants_measurement_knees', suits_with_vest_pants_measurement_cuffs_ankle = '$suits_with_vest_pants_measurement_cuffs_ankle', suits_with_vest_pants_measurement_length_outleg = '$suits_with_vest_pants_measurement_length_outleg', suits_with_vest_pants_measurement_only_crotch = '$suits_with_vest_pants_measurement_only_crotch', suits_with_vest_pants_measurement_front_rise = '$suits_with_vest_pants_measurement_front_rise', suits_with_vest_pants_measurement_cuffs = '$suits_with_vest_pants_measurement_cuffs', suits_with_vest_vest_measurement_sex = '$suits_with_vest_vest_measurement_sex', suits_with_vest_vest_measurement_fit = '$suits_with_vest_vest_measurement_fit', suits_with_vest_vest_measurement = '$suits_with_vest_vest_measurement', suits_with_vest_vest_measurement_vest_length = '$suits_with_vest_vest_measurement_vest_length' , suits_with_vest_vest_measurement_back_lenght = '$suits_with_vest_vest_measurement_back_lenght', suits_with_vest_vest_measurement_chest = '$suits_with_vest_vest_measurement_chest', suits_with_vest_vest_measurement_waist_upper = '$suits_with_vest_vest_measurement_waist_upper', suits_with_vest_vest_measurement_waist_lower = '$suits_with_vest_vest_measurement_waist_lower', suits_with_vest_vest_measurement_hips = '$suits_with_vest_vest_measurement_hips', suits_with_vest_vest_measurement_shoulders = '$suits_with_vest_vest_measurement_shoulders', suits_with_vest_vest_measurement_sleeves_right = '$suits_with_vest_vest_measurement_sleeves_right', suits_with_vest_vest_measurement_sleeves_left = '$suits_with_vest_vest_measurement_sleeves_left', suits_with_vest_vest_measurement_neck = '$suits_with_vest_vest_measurement_neck', suits_with_vest_vest_measurement_ptp_front = '$suits_with_vest_vest_measurement_ptp_front', suits_with_vest_vest_measurement_ptp_back = '$suits_with_vest_vest_measurement_ptp_back', suits_with_vest_vest_measurement_arm_hole = '$suits_with_vest_vest_measurement_arm_hole', suits_with_vest_vest_measurement_biceps = '$suits_with_vest_vest_measurement_biceps', suits_with_vest_measurement_jacket_shoulder = '$suits_with_vest_measurement_jacket_shoulder', suits_with_vest_measurement_jacket_waist = '$suits_with_vest_measurement_jacket_waist', suits_with_vest_measurement_jacket_chest = '$suits_with_vest_measurement_jacket_chest' , suits_with_vest_measurement_pants_waist = '$suits_with_vest_measurement_pants_waist', suits_with_vest_measurement_pants_bottom = '$suits_with_vest_measurement_pants_bottom', suits_with_vest_ip = '$suits_with_vest_ip' WHERE order_id = '$order_id' AND suits_with_vest_status = '$suits_with_vest_status' ";
$query14 = mysql_query($sql14) or die("Can't Query14");

$sql15 = " UPDATE customize_tuxedo_jacket_design SET tuxedo_jacket_customer_name = '$tuxedo_jacket_customer_name', tuxedo_jacket_order_no = '$tuxedo_jacket_order_no' WHERE order_id = '$order_id' AND tuxedo_jacket_status = '$tuxedo_jacket_status' ";
$query15 = mysql_query($sql15) or die("Can't Query15");

$sql16 = " UPDATE customize_tuxedo_jacket_measurements SET tuxedo_jacket_jacket_measurement_sex = '$tuxedo_jacket_jacket_measurement_sex', tuxedo_jacket_jacket_measurement_fit = '$tuxedo_jacket_jacket_measurement_fit', tuxedo_jacket_jacket_measurement = '$tuxedo_jacket_jacket_measurement', tuxedo_jacket_jacket_measurement_jacket_length = '$tuxedo_jacket_jacket_measurement_jacket_length', tuxedo_jacket_jacket_measurement_back_lenght = '$tuxedo_jacket_jacket_measurement_back_lenght', tuxedo_jacket_jacket_measurement_chest = '$tuxedo_jacket_jacket_measurement_chest', tuxedo_jacket_jacket_measurement_waist_upper = '$tuxedo_jacket_jacket_measurement_waist_upper', tuxedo_jacket_jacket_measurement_waist_lower = '$tuxedo_jacket_jacket_measurement_waist_lower', tuxedo_jacket_jacket_measurement_hips = '$tuxedo_jacket_jacket_measurement_hips', tuxedo_jacket_jacket_measurement_shoulders = '$tuxedo_jacket_jacket_measurement_shoulders', tuxedo_jacket_jacket_measurement_neck = '$tuxedo_jacket_jacket_measurement_neck', tuxedo_jacket_jacket_measurement_ptp_front = '$tuxedo_jacket_jacket_measurement_ptp_front', tuxedo_jacket_jacket_measurement_ptp_back = '$tuxedo_jacket_jacket_measurement_ptp_back', tuxedo_jacket_jacket_measurement_arm_hole = '$tuxedo_jacket_jacket_measurement_arm_hole', tuxedo_jacket_jacket_measurement_biceps = '$tuxedo_jacket_jacket_measurement_biceps', tuxedo_jacket_jacket_measurement_sleeves_right = '$tuxedo_jacket_jacket_measurement_sleeves_right', tuxedo_jacket_jacket_measurement_sleeves_left = '$tuxedo_jacket_jacket_measurement_sleeves_left', tuxedo_jacket_jacket_measurement_wrist_right = '$tuxedo_jacket_jacket_measurement_wrist_right', tuxedo_jacket_jacket_measurement_wrist_left = '$tuxedo_jacket_jacket_measurement_wrist_left', tuxedo_jacket_jacket_measurement_first_button = '$tuxedo_jacket_jacket_measurement_first_button', tuxedo_jacket_jacket_measurement_shoulder_upper_wrist = '$tuxedo_jacket_jacket_measurement_shoulder_upper_wrist', tuxedo_jacket_jacket_measurement_shoulder_lower_wrist = '$tuxedo_jacket_jacket_measurement_shoulder_lower_wrist', tuxedo_jacket_measurement_jacket_shoulder = '$tuxedo_jacket_measurement_jacket_shoulder', tuxedo_jacket_measurement_jacket_waist = '$tuxedo_jacket_measurement_jacket_waist', tuxedo_jacket_measurement_jacket_chest = '$tuxedo_jacket_measurement_jacket_chest', tuxedo_jacket_ip = '$tuxedo_jacket_ip' WHERE order_id = '$order_id' AND tuxedo_jacket_status = '$tuxedo_jacket_status' ";
$query16 = mysql_query($sql16) or die("Can't Query16");

$sql17 = " UPDATE customize_tuxedo_suits_design SET tuxedo_suits_customer_name = '$tuxedo_suits_customer_name', tuxedo_suits_order_no = '$tuxedo_suits_order_no' WHERE order_id = '$order_id' AND tuxedo_suits_status = '$tuxedo_suits_status' ";
$query17 = mysql_query($sql17) or die("Can't Query17");

$sql18 = " UPDATE customize_tuxedo_suits_measurements SET tuxedo_suits_jacket_measurement_sex = '$tuxedo_suits_jacket_measurement_sex', tuxedo_suits_jacket_measurement_fit = '$tuxedo_suits_jacket_measurement_fit', tuxedo_suits_jacket_measurement = '$tuxedo_suits_jacket_measurement', tuxedo_suits_jacket_measurement_jacket_length = '$tuxedo_suits_jacket_measurement_jacket_length', tuxedo_suits_jacket_measurement_back_lenght = '$tuxedo_suits_jacket_measurement_back_lenght', tuxedo_suits_jacket_measurement_chest = '$tuxedo_suits_jacket_measurement_chest', tuxedo_suits_jacket_measurement_waist_upper = '$tuxedo_suits_jacket_measurement_waist_upper', tuxedo_suits_jacket_measurement_waist_lower = '$tuxedo_suits_jacket_measurement_waist_lower', tuxedo_suits_jacket_measurement_hips = '$tuxedo_suits_jacket_measurement_hips', tuxedo_suits_jacket_measurement_shoulders = '$tuxedo_suits_jacket_measurement_shoulders', tuxedo_suits_jacket_measurement_neck = '$tuxedo_suits_jacket_measurement_neck', tuxedo_suits_jacket_measurement_ptp_front = '$tuxedo_suits_jacket_measurement_ptp_front', tuxedo_suits_jacket_measurement_ptp_back = '$tuxedo_suits_jacket_measurement_ptp_back', tuxedo_suits_jacket_measurement_arm_hole = '$tuxedo_suits_jacket_measurement_arm_hole', tuxedo_suits_jacket_measurement_biceps = '$tuxedo_suits_jacket_measurement_biceps', tuxedo_suits_jacket_measurement_sleeves_right = '$tuxedo_suits_jacket_measurement_sleeves_right', tuxedo_suits_jacket_measurement_sleeves_left = '$tuxedo_suits_jacket_measurement_sleeves_left', tuxedo_suits_jacket_measurement_wrist_right = '$tuxedo_suits_jacket_measurement_wrist_right', tuxedo_suits_jacket_measurement_wrist_left = '$tuxedo_suits_jacket_measurement_wrist_left', tuxedo_suits_jacket_measurement_first_button = '$tuxedo_suits_jacket_measurement_first_button', tuxedo_suits_jacket_measurement_shoulder_upper_wrist = '$tuxedo_suits_jacket_measurement_shoulder_upper_wrist', tuxedo_suits_jacket_measurement_shoulder_lower_wrist = '$tuxedo_suits_jacket_measurement_shoulder_lower_wrist', tuxedo_suits_pants_measurement_sex = '$tuxedo_suits_pants_measurement_sex', tuxedo_suits_pants_measurement_length = '$tuxedo_suits_pants_measurement_length', tuxedo_suits_pants_measurement_fit = '$tuxedo_suits_pants_measurement_fit', tuxedo_suits_pants_measurement = '$tuxedo_suits_pants_measurement', tuxedo_suits_pants_measurement_waist = '$tuxedo_suits_pants_measurement_waist', tuxedo_suits_pants_measurement_hips = '$tuxedo_suits_pants_measurement_hips', tuxedo_suits_pants_measurement_crotch_full = '$tuxedo_suits_pants_measurement_crotch_full', tuxedo_suits_pants_measurement_crotch_front = '$tuxedo_suits_pants_measurement_crotch_front', tuxedo_suits_pants_measurement_crotch_back = '$tuxedo_suits_pants_measurement_crotch_back', tuxedo_suits_pants_measurement_inseam_length = '$tuxedo_suits_pants_measurement_inseam_length', tuxedo_suits_pants_measurement_thighs = '$tuxedo_suits_pants_measurement_thighs', tuxedo_suits_pants_measurement_knees = '$tuxedo_suits_pants_measurement_knees', tuxedo_suits_pants_measurement_cuffs_ankle = '$tuxedo_suits_pants_measurement_cuffs_ankle', tuxedo_suits_pants_measurement_length_outleg = '$tuxedo_suits_pants_measurement_length_outleg', tuxedo_suits_pants_measurement_only_crotch = '$tuxedo_suits_pants_measurement_only_crotch', tuxedo_suits_pants_measurement_front_rise = '$tuxedo_suits_pants_measurement_front_rise', tuxedo_suits_pants_measurement_cuffs = '$tuxedo_suits_pants_measurement_cuffs', tuxedo_suits_measurement_jacket_shoulder = '$tuxedo_suits_measurement_jacket_shoulder', tuxedo_suits_measurement_jacket_waist = '$tuxedo_suits_measurement_jacket_waist', tuxedo_suits_measurement_jacket_chest = '$tuxedo_suits_measurement_jacket_chest', tuxedo_suits_measurement_pants_waist = '$tuxedo_suits_measurement_pants_waist', tuxedo_suits_measurement_pants_bottom = '$tuxedo_suits_measurement_pants_bottom', tuxedo_suits_ip = '$tuxedo_suits_ip' WHERE order_id = '$order_id' AND tuxedo_suits_status = '$tuxedo_suits_status' ";
$query18 = mysql_query($sql18) or die("Can't Query18");

$sql19 = " UPDATE customize_tuxedo_with_vest_design SET tuxedo_with_vest_customer_name = '$tuxedo_with_vest_customer_name', tuxedo_with_vest_order_no = '$tuxedo_with_vest_order_no' WHERE order_id = '$order_id' AND tuxedo_with_vest_status = '$tuxedo_with_vest_status' ";
$query19 = mysql_query($sql19) or die("Can't Query19");

$sql20 = " UPDATE customize_tuxedo_with_vest_measurements SET tuxedo_with_vest_jacket_measurement_sex = '$tuxedo_with_vest_jacket_measurement_sex', tuxedo_with_vest_jacket_measurement_fit = '$tuxedo_with_vest_jacket_measurement_fit', tuxedo_with_vest_jacket_measurement = '$tuxedo_with_vest_jacket_measurement', tuxedo_with_vest_jacket_measurement_jacket_length = '$tuxedo_with_vest_jacket_measurement_jacket_length', tuxedo_with_vest_jacket_measurement_back_lenght = '$tuxedo_with_vest_jacket_measurement_back_lenght', tuxedo_with_vest_jacket_measurement_chest = '$tuxedo_with_vest_jacket_measurement_chest', tuxedo_with_vest_jacket_measurement_waist_upper = '$tuxedo_with_vest_jacket_measurement_waist_upper', tuxedo_with_vest_jacket_measurement_waist_lower = '$tuxedo_with_vest_jacket_measurement_waist_lower', tuxedo_with_vest_jacket_measurement_hips = '$tuxedo_with_vest_jacket_measurement_hips', tuxedo_with_vest_jacket_measurement_shoulders = '$tuxedo_with_vest_jacket_measurement_shoulders', tuxedo_with_vest_jacket_measurement_neck = '$tuxedo_with_vest_jacket_measurement_neck', tuxedo_with_vest_jacket_measurement_ptp_front = '$tuxedo_with_vest_jacket_measurement_ptp_front', tuxedo_with_vest_jacket_measurement_ptp_back = '$tuxedo_with_vest_jacket_measurement_ptp_back', tuxedo_with_vest_jacket_measurement_arm_hole = '$tuxedo_with_vest_jacket_measurement_arm_hole', tuxedo_with_vest_jacket_measurement_biceps = '$tuxedo_with_vest_jacket_measurement_biceps', tuxedo_with_vest_jacket_measurement_sleeves_right = '$tuxedo_with_vest_jacket_measurement_sleeves_right', tuxedo_with_vest_jacket_measurement_sleeves_left = '$tuxedo_with_vest_jacket_measurement_sleeves_left', tuxedo_with_vest_jacket_measurement_wrist_right = '$tuxedo_with_vest_jacket_measurement_wrist_right', tuxedo_with_vest_jacket_measurement_wrist_left = '$tuxedo_with_vest_jacket_measurement_wrist_left', tuxedo_with_vest_jacket_measurement_first_button = '$tuxedo_with_vest_jacket_measurement_first_button', tuxedo_with_vest_jacket_measurement_shoulder_upper_wrist = '$tuxedo_with_vest_jacket_measurement_shoulder_upper_wrist', tuxedo_with_vest_jacket_measurement_shoulder_lower_wrist = '$tuxedo_with_vest_jacket_measurement_shoulder_lower_wrist', tuxedo_with_vest_pants_measurement_sex = '$tuxedo_with_vest_pants_measurement_sex', tuxedo_with_vest_pants_measurement_length = '$tuxedo_with_vest_pants_measurement_length', tuxedo_with_vest_pants_measurement_fit = '$tuxedo_with_vest_pants_measurement_fit', tuxedo_with_vest_pants_measurement = '$tuxedo_with_vest_pants_measurement', tuxedo_with_vest_pants_measurement_waist = '$tuxedo_with_vest_pants_measurement_waist', tuxedo_with_vest_pants_measurement_hips = '$tuxedo_with_vest_pants_measurement_hips', tuxedo_with_vest_pants_measurement_crotch_full = '$tuxedo_with_vest_pants_measurement_crotch_full', tuxedo_with_vest_pants_measurement_crotch_front = '$tuxedo_with_vest_pants_measurement_crotch_front', tuxedo_with_vest_pants_measurement_crotch_back = '$tuxedo_with_vest_pants_measurement_crotch_back', tuxedo_with_vest_pants_measurement_inseam_length = '$tuxedo_with_vest_pants_measurement_inseam_length', tuxedo_with_vest_pants_measurement_thighs = '$tuxedo_with_vest_pants_measurement_thighs', tuxedo_with_vest_pants_measurement_knees = '$tuxedo_with_vest_pants_measurement_knees', tuxedo_with_vest_pants_measurement_cuffs_ankle = '$tuxedo_with_vest_pants_measurement_cuffs_ankle', tuxedo_with_vest_pants_measurement_length_outleg = '$tuxedo_with_vest_pants_measurement_length_outleg', tuxedo_with_vest_pants_measurement_only_crotch = '$tuxedo_with_vest_pants_measurement_only_crotch', tuxedo_with_vest_pants_measurement_front_rise = '$tuxedo_with_vest_pants_measurement_front_rise', tuxedo_with_vest_pants_measurement_cuffs = '$tuxedo_with_vest_pants_measurement_cuffs', tuxedo_with_vest_vest_measurement_sex = '$tuxedo_with_vest_vest_measurement_sex', tuxedo_with_vest_vest_measurement_fit = '$tuxedo_with_vest_vest_measurement_fit', tuxedo_with_vest_vest_measurement = '$tuxedo_with_vest_vest_measurement', tuxedo_with_vest_vest_measurement_vest_length = '$tuxedo_with_vest_vest_measurement_vest_length', tuxedo_with_vest_vest_measurement_back_lenght = '$tuxedo_with_vest_vest_measurement_back_lenght', tuxedo_with_vest_vest_measurement_chest = '$tuxedo_with_vest_vest_measurement_chest', tuxedo_with_vest_vest_measurement_waist_upper = '$tuxedo_with_vest_vest_measurement_waist_upper', tuxedo_with_vest_vest_measurement_waist_lower = '$tuxedo_with_vest_vest_measurement_waist_lower', tuxedo_with_vest_vest_measurement_hips = '$tuxedo_with_vest_vest_measurement_hips', tuxedo_with_vest_vest_measurement_shoulders = '$tuxedo_with_vest_vest_measurement_shoulders', tuxedo_with_vest_vest_measurement_sleeves_right = '$tuxedo_with_vest_vest_measurement_sleeves_right', tuxedo_with_vest_vest_measurement_sleeves_left = '$tuxedo_with_vest_vest_measurement_sleeves_left', tuxedo_with_vest_vest_measurement_neck = '$tuxedo_with_vest_vest_measurement_neck', tuxedo_with_vest_vest_measurement_ptp_front = '$tuxedo_with_vest_vest_measurement_ptp_front', tuxedo_with_vest_vest_measurement_ptp_back = '$tuxedo_with_vest_vest_measurement_ptp_back', tuxedo_with_vest_vest_measurement_arm_hole = '$tuxedo_with_vest_vest_measurement_arm_hole', tuxedo_with_vest_vest_measurement_biceps = '$tuxedo_with_vest_vest_measurement_biceps', tuxedo_with_vest_measurement_jacket_shoulder = '$tuxedo_with_vest_measurement_jacket_shoulder', tuxedo_with_vest_measurement_jacket_waist = '$tuxedo_with_vest_measurement_jacket_waist', tuxedo_with_vest_measurement_jacket_chest = '$tuxedo_with_vest_measurement_jacket_chest', tuxedo_with_vest_measurement_pants_waist = '$tuxedo_with_vest_measurement_pants_waist', tuxedo_with_vest_measurement_pants_bottom = '$tuxedo_with_vest_measurement_pants_bottom', tuxedo_with_vest_ip = '$tuxedo_with_vest_ip' WHERE order_id = '$order_id' AND tuxedo_with_vest_status = '$tuxedo_with_vest_status' ";
$query20 = mysql_query($sql20) or die("Can't Query20");

$sql21 = " UPDATE customize_vest_design SET vest_customer_name = '$vest_customer_name', vest_order_no = '$vest_order_no' WHERE order_id = '$order_id' AND vest_status = '$vest_status' ";
$query21 = mysql_query($sql21) or die("Can't Query21");

$sql22 = " UPDATE customize_vest_measurements SET vest_vest_measurement_sex = '$vest_vest_measurement_sex', vest_vest_measurement_fit = '$vest_vest_measurement_fit', vest_vest_measurement = '$vest_vest_measurement', vest_vest_measurement_vest_length = '$vest_vest_measurement_vest_length', vest_vest_measurement_back_lenght = '$vest_vest_measurement_back_lenght', vest_vest_measurement_chest = '$vest_vest_measurement_chest', vest_vest_measurement_waist_upper = '$vest_vest_measurement_waist_upper', vest_vest_measurement_waist_lower = '$vest_vest_measurement_waist_lower', vest_vest_measurement_hips = '$vest_vest_measurement_hips', vest_vest_measurement_shoulders = '$vest_vest_measurement_shoulders', vest_vest_measurement_sleeves_right = '$vest_vest_measurement_sleeves_right', vest_vest_measurement_sleeves_left = '$vest_vest_measurement_sleeves_left', vest_vest_measurement_neck = '$vest_vest_measurement_neck', vest_vest_measurement_ptp_front = '$vest_vest_measurement_ptp_front', vest_vest_measurement_ptp_back = '$vest_vest_measurement_ptp_back', vest_vest_measurement_arm_hole = '$vest_vest_measurement_arm_hole', vest_vest_measurement_biceps = '$vest_vest_measurement_biceps', vest_measurement_jacket_shoulder = '$vest_measurement_jacket_shoulder', vest_measurement_jacket_waist = '$vest_measurement_jacket_waist', vest_measurement_jacket_chest = '$vest_measurement_jacket_chest', vest_ip = '$vest_ip' WHERE order_id = '$order_id' AND vest_status = '$vest_status' ";
$query22 = mysql_query($sql22) or die("Can't Query22");

$path = "../../images/body/front/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['item_body_front']['name'];
	$tmp = $_FILES['item_body_front']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$item_body_front_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$item_body_front_pic)){
				
				$sql23 = " UPDATE customize_jacket_measurements SET jacket_body_front = '".$item_body_front_pic."', jacket_ip = '".$jacket_ip."', jacket_status = '".$jacket_status."' WHERE order_id = '".$order_id."' ";
				$query23 = mysql_db_query($dbname, $sql23) or die("Can't Query23");
				
				$sql24 = " UPDATE customize_jeans_measurements SET jeans_body_front = '".$item_body_front_pic."', jeans_ip = '".$jeans_ip."', jeans_status = '".$jeans_status."' WHERE order_id = '".$order_id."' ";
				$query24 = mysql_db_query($dbname, $sql24) or die("Can't Query24");
				
				$sql25 = " UPDATE customize_overcoat_measurements SET overcoat_body_front = '".$item_body_front_pic."', overcoat_ip = '".$overcoat_ip."', overcoat_status = '".$overcoat_status."' WHERE order_id = '".$order_id."' ";
				$query25 = mysql_db_query($dbname, $sql25) or die("Can't Query25");
				
				$sql26 = " UPDATE customize_pants_measurements SET pants_body_front = '".$item_body_front_pic."', pants_ip = '".$pants_ip."', pants_status = '".$pants_status."' WHERE order_id = '".$order_id."' ";
				$query26 = mysql_db_query($dbname, $sql26) or die("Can't Query26");
				
				$sql27 = " UPDATE customize_shirt_measurements SET shirt_body_front = '".$item_body_front_pic."', shirt_ip = '".$shirt_ip."', shirt_status = '".$shirt_status."' WHERE order_id = '".$order_id."' ";
				$query27 = mysql_db_query($dbname, $sql27) or die("Can't Query27");
				
				$sql28 = " UPDATE customize_suits_measurements SET suits_body_front = '".$item_body_front_pic."', suits_ip = '".$suits_ip."', suits_status = '".$suits_status."' WHERE order_id = '".$order_id."' ";
				$query28 = mysql_db_query($dbname, $sql28) or die("Can't Query28");
				
				$sql29 = " UPDATE customize_suits_with_vest_measurements SET suits_with_vest_body_front = '".$item_body_front_pic."', suits_with_vest_ip = '".$suits_with_vest_ip."', suits_with_vest_status = '".$suits_with_vest_status."' WHERE order_id = '".$order_id."' ";
				$query29 = mysql_db_query($dbname, $sql29) or die("Can't Query29");
				
				$sql30 = " UPDATE customize_tuxedo_jacket_measurements SET tuxedo_jacket_body_front = '".$item_body_front_pic."', tuxedo_jacket_ip = '".$tuxedo_jacket_ip."', tuxedo_jacket_status = '".$tuxedo_jacket_status."' WHERE order_id = '".$order_id."' ";
				$query30 = mysql_db_query($dbname, $sql30) or die("Can't Query30");
				
				$sql31 = " UPDATE customize_tuxedo_suits_measurements SET tuxedo_suits_body_front = '".$item_body_front_pic."', tuxedo_suits_ip = '".$tuxedo_suits_ip."', tuxedo_suits_status = '".$tuxedo_suits_status."' WHERE order_id = '".$order_id."' ";
				$query31 = mysql_db_query($dbname, $sql31) or die("Can't Query31");
				
				$sql32 = " UPDATE customize_tuxedo_with_vest_measurements SET tuxedo_with_vest_body_front = '".$item_body_front_pic."', tuxedo_with_vest_ip = '".$tuxedo_with_vest_ip."', tuxedo_with_vest_status = '".$tuxedo_with_vest_status."' WHERE order_id = '".$order_id."' ";
				$query32 = mysql_db_query($dbname, $sql32) or die("Can't Query32");
				
				$sql33 = " UPDATE customize_vest_measurements SET vest_body_front = '".$item_body_front_pic."', vest_ip = '".$vest_ip."', vest_status = '".$vest_status."' WHERE order_id = '".$order_id."' ";
				$query33 = mysql_db_query($dbname, $sql33) or die("Can't Query33");
			}
    
	} else {
				$sql23 = " UPDATE customize_jacket_measurements SET jacket_ip = '".$jacket_ip."', jacket_status = '".$jacket_status."' WHERE order_id = '".$order_id."' ";
				$query23 = mysql_db_query($dbname, $sql23) or die("Can't Query23");
				
				$sql24 = " UPDATE customize_jeans_measurements SET jeans_ip = '".$jeans_ip."', jeans_status = '".$jeans_status."' WHERE order_id = '".$order_id."' ";
				$query24 = mysql_db_query($dbname, $sql24) or die("Can't Query24");
				
				$sql25 = " UPDATE customize_overcoat_measurements SET overcoat_ip = '".$overcoat_ip."', overcoat_status = '".$overcoat_status."' WHERE order_id = '".$order_id."' ";
				$query25 = mysql_db_query($dbname, $sql25) or die("Can't Query25");
				
				$sql26 = " UPDATE customize_pants_measurements SET pants_ip = '".$pants_ip."', pants_status = '".$pants_status."' WHERE order_id = '".$order_id."' ";
				$query26 = mysql_db_query($dbname, $sql26) or die("Can't Query26");
				
				$sql27 = " UPDATE customize_shirt_measurements SET shirt_ip = '".$shirt_ip."', shirt_status = '".$shirt_status."' WHERE order_id = '".$order_id."' ";
				$query27 = mysql_db_query($dbname, $sql27) or die("Can't Query27");
				
				$sql28 = " UPDATE customize_suits_measurements SET suits_ip = '".$suits_ip."', suits_status = '".$suits_status."' WHERE order_id = '".$order_id."' ";
				$query28 = mysql_db_query($dbname, $sql28) or die("Can't Query28");
				
				$sql29 = " UPDATE customize_suits_with_vest_measurements SET suits_with_vest_ip = '".$suits_with_vest_ip."', suits_with_vest_status = '".$suits_with_vest_status."' WHERE order_id = '".$order_id."' ";
				$query29 = mysql_db_query($dbname, $sql29) or die("Can't Query29");
				
				$sql30 = " UPDATE customize_tuxedo_jacket_measurements SET tuxedo_jacket_ip = '".$tuxedo_jacket_ip."', tuxedo_jacket_status = '".$tuxedo_jacket_status."' WHERE order_id = '".$order_id."' ";
				$query30 = mysql_db_query($dbname, $sql30) or die("Can't Query30");
				
				$sql31 = " UPDATE customize_tuxedo_suits_measurements SET tuxedo_suits_ip = '".$tuxedo_suits_ip."', tuxedo_suits_status = '".$tuxedo_suits_status."' WHERE order_id = '".$order_id."' ";
				$query31 = mysql_db_query($dbname, $sql31) or die("Can't Query31");
				
				$sql32 = " UPDATE customize_tuxedo_with_vest_measurements SET tuxedo_with_vest_ip = '".$tuxedo_with_vest_ip."', tuxedo_with_vest_status = '".$tuxedo_with_vest_status."' WHERE order_id = '".$order_id."' ";
				$query32 = mysql_db_query($dbname, $sql32) or die("Can't Query32");
				
				$sql33 = " UPDATE customize_vest_measurements SET vest_ip = '".$vest_ip."', vest_status = '".$vest_status."' WHERE order_id = '".$order_id."' ";
				$query33 = mysql_db_query($dbname, $sql33) or die("Can't Query33");
			}
	}
	
$path = "../../images/body/left/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['item_body_left']['name'];
	$tmp = $_FILES['item_body_left']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$item_body_left_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$item_body_left_pic)){
				
				$sql34 = " UPDATE customize_jacket_measurements SET jacket_body_left = '".$item_body_left_pic."', jacket_ip = '".$jacket_ip."', jacket_status = '".$jacket_status."' WHERE order_id = '".$order_id."' ";
				$query34 = mysql_db_query($dbname, $sql34) or die("Can't Query34");
				
				$sql35 = " UPDATE customize_jeans_measurements SET jeans_body_left = '".$item_body_left_pic."', jeans_ip = '".$jeans_ip."', jeans_status = '".$jeans_status."' WHERE order_id = '".$order_id."' ";
				$query35 = mysql_db_query($dbname, $sql35) or die("Can't Query35");
				
				$sql36 = " UPDATE customize_overcoat_measurements SET overcoat_body_left = '".$item_body_left_pic."', overcoat_ip = '".$overcoat_ip."', overcoat_status = '".$overcoat_status."' WHERE order_id = '".$order_id."' ";
				$query36 = mysql_db_query($dbname, $sql36) or die("Can't Query36");
				
				$sql37 = " UPDATE customize_pants_measurements SET pants_body_left = '".$item_body_left_pic."', pants_ip = '".$pants_ip."', pants_status = '".$pants_status."' WHERE order_id = '".$order_id."' ";
				$query37 = mysql_db_query($dbname, $sql37) or die("Can't Query37");
				
				$sql38 = " UPDATE customize_shirt_measurements SET shirt_body_left = '".$item_body_left_pic."', shirt_ip = '".$shirt_ip."', shirt_status = '".$shirt_status."' WHERE order_id = '".$order_id."' ";
				$query38 = mysql_db_query($dbname, $sql38) or die("Can't Query38");
				
				$sql39 = " UPDATE customize_suits_measurements SET suits_body_left = '".$item_body_left_pic."', suits_ip = '".$suits_ip."', suits_status = '".$suits_status."' WHERE order_id = '".$order_id."' ";
				$query39 = mysql_db_query($dbname, $sql39) or die("Can't Query39");
				
				$sql40 = " UPDATE customize_suits_with_vest_measurements SET suits_with_vest_body_left = '".$item_body_left_pic."', suits_with_vest_ip = '".$suits_with_vest_ip."', suits_with_vest_status = '".$suits_with_vest_status."' WHERE order_id = '".$order_id."' ";
				$query40 = mysql_db_query($dbname, $sql40) or die("Can't Query40");
				
				$sql41 = " UPDATE customize_tuxedo_jacket_measurements SET tuxedo_jacket_body_left = '".$item_body_left_pic."', tuxedo_jacket_ip = '".$tuxedo_jacket_ip."', tuxedo_jacket_status = '".$tuxedo_jacket_status."' WHERE order_id = '".$order_id."' ";
				$query41 = mysql_db_query($dbname, $sql41) or die("Can't Query41");
				
				$sql42 = " UPDATE customize_tuxedo_suits_measurements SET tuxedo_suits_body_left = '".$item_body_left_pic."', tuxedo_suits_ip = '".$tuxedo_suits_ip."', tuxedo_suits_status = '".$tuxedo_suits_status."' WHERE order_id = '".$order_id."' ";
				$query42 = mysql_db_query($dbname, $sql42) or die("Can't Query42");
				
				$sql43 = " UPDATE customize_tuxedo_with_vest_measurements SET tuxedo_with_vest_body_left = '".$item_body_left_pic."', tuxedo_with_vest_ip = '".$tuxedo_with_vest_ip."', tuxedo_with_vest_status = '".$tuxedo_with_vest_status."' WHERE order_id = '".$order_id."' ";
				$query43 = mysql_db_query($dbname, $sql43) or die("Can't Query43");
				
				$sql44 = " UPDATE customize_vest_measurements SET vest_body_left = '".$item_body_left_pic."', vest_ip = '".$vest_ip."', vest_status = '".$vest_status."' WHERE order_id = '".$order_id."' ";
				$query44 = mysql_db_query($dbname, $sql44) or die("Can't Query44");
			}
    
	} else {
				$sql34 = " UPDATE customize_jacket_measurements SET jacket_ip = '".$jacket_ip."', jacket_status = '".$jacket_status."' WHERE order_id = '".$order_id."' ";
				$query34 = mysql_db_query($dbname, $sql34) or die("Can't Query34");
				
				$sql35 = " UPDATE customize_jeans_measurements SET jeans_ip = '".$jeans_ip."', jeans_status = '".$jeans_status."' WHERE order_id = '".$order_id."' ";
				$query35 = mysql_db_query($dbname, $sql35) or die("Can't Query35");
				
				$sql36 = " UPDATE customize_overcoat_measurements SET overcoat_ip = '".$overcoat_ip."', overcoat_status = '".$overcoat_status."' WHERE order_id = '".$order_id."' ";
				$query36 = mysql_db_query($dbname, $sql36) or die("Can't Query36");
				
				$sql37 = " UPDATE customize_pants_measurements SET pants_ip = '".$pants_ip."', pants_status = '".$pants_status."' WHERE order_id = '".$order_id."' ";
				$query37 = mysql_db_query($dbname, $sql37) or die("Can't Query37");
				
				$sql38 = " UPDATE customize_shirt_measurements SET shirt_ip = '".$shirt_ip."', shirt_status = '".$shirt_status."' WHERE order_id = '".$order_id."' ";
				$query38 = mysql_db_query($dbname, $sql38) or die("Can't Query38");
				
				$sql39 = " UPDATE customize_suits_measurements SET suits_ip = '".$suits_ip."', suits_status = '".$suits_status."' WHERE order_id = '".$order_id."' ";
				$query39 = mysql_db_query($dbname, $sql39) or die("Can't Query39");
				
				$sql40 = " UPDATE customize_suits_with_vest_measurements SET suits_with_vest_ip = '".$suits_with_vest_ip."', suits_with_vest_status = '".$suits_with_vest_status."' WHERE order_id = '".$order_id."' ";
				$query40 = mysql_db_query($dbname, $sql40) or die("Can't Query40");
				
				$sql41 = " UPDATE customize_tuxedo_jacket_measurements SET tuxedo_jacket_ip = '".$tuxedo_jacket_ip."', tuxedo_jacket_status = '".$tuxedo_jacket_status."' WHERE order_id = '".$order_id."' ";
				$query41 = mysql_db_query($dbname, $sql41) or die("Can't Query41");
				
				$sql42 = " UPDATE customize_tuxedo_suits_measurements SET tuxedo_suits_ip = '".$tuxedo_suits_ip."', tuxedo_suits_status = '".$tuxedo_suits_status."' WHERE order_id = '".$order_id."' ";
				$query42 = mysql_db_query($dbname, $sql42) or die("Can't Query42");
				
				$sql43 = " UPDATE customize_tuxedo_with_vest_measurements SET tuxedo_with_vest_ip = '".$tuxedo_with_vest_ip."', tuxedo_with_vest_status = '".$tuxedo_with_vest_status."' WHERE order_id = '".$order_id."' ";
				$query43 = mysql_db_query($dbname, $sql43) or die("Can't Query43");
				
				$sql44 = " UPDATE customize_vest_measurements SET vest_ip = '".$vest_ip."', vest_status = '".$vest_status."' WHERE order_id = '".$order_id."' ";
				$query44 = mysql_db_query($dbname, $sql44) or die("Can't Query44");
			}
	}	
	
$path = "../../images/body/right/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['item_body_right']['name'];
	$tmp = $_FILES['item_body_right']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$item_body_right_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$item_body_right_pic)){
				
				$sql45 = " UPDATE customize_jacket_measurements SET jacket_body_right = '".$item_body_right_pic."', jacket_ip = '".$jacket_ip."', jacket_status = '".$jacket_status."' WHERE order_id = '".$order_id."' ";
				$query45 = mysql_db_query($dbname, $sql45) or die("Can't Query45");
				
				$sql46 = " UPDATE customize_jeans_measurements SET jeans_body_right = '".$item_body_right_pic."', jeans_ip = '".$jeans_ip."', jeans_status = '".$jeans_status."' WHERE order_id = '".$order_id."' ";
				$query46 = mysql_db_query($dbname, $sql46) or die("Can't Query46");
				
				$sql47 = " UPDATE customize_overcoat_measurements SET overcoat_body_right = '".$item_body_right_pic."', overcoat_ip = '".$overcoat_ip."', overcoat_status = '".$overcoat_status."' WHERE order_id = '".$order_id."' ";
				$query47 = mysql_db_query($dbname, $sql47) or die("Can't Query47");
				
				$sql48 = " UPDATE customize_pants_measurements SET pants_body_right = '".$item_body_right_pic."', pants_ip = '".$pants_ip."', pants_status = '".$pants_status."' WHERE order_id = '".$order_id."' ";
				$query48 = mysql_db_query($dbname, $sql48) or die("Can't Query48");
				
				$sql49 = " UPDATE customize_shirt_measurements SET shirt_body_right = '".$item_body_right_pic."', shirt_ip = '".$shirt_ip."', shirt_status = '".$shirt_status."' WHERE order_id = '".$order_id."' ";
				$query49 = mysql_db_query($dbname, $sql49) or die("Can't Query49");
				
				$sql50 = " UPDATE customize_suits_measurements SET suits_body_right = '".$item_body_right_pic."', suits_ip = '".$suits_ip."', suits_status = '".$suits_status."' WHERE order_id = '".$order_id."' ";
				$query50 = mysql_db_query($dbname, $sql50) or die("Can't Query50");
				
				$sql51 = " UPDATE customize_suits_with_vest_measurements SET suits_with_vest_body_right = '".$item_body_right_pic."', suits_with_vest_ip = '".$suits_with_vest_ip."', suits_with_vest_status = '".$suits_with_vest_status."' WHERE order_id = '".$order_id."' ";
				$query51 = mysql_db_query($dbname, $sql51) or die("Can't Query51");
				
				$sql52 = " UPDATE customize_tuxedo_jacket_measurements SET tuxedo_jacket_body_right = '".$item_body_right_pic."', tuxedo_jacket_ip = '".$tuxedo_jacket_ip."', tuxedo_jacket_status = '".$tuxedo_jacket_status."' WHERE order_id = '".$order_id."' ";
				$query52 = mysql_db_query($dbname, $sql52) or die("Can't Query52");
				
				$sql53 = " UPDATE customize_tuxedo_suits_measurements SET tuxedo_suits_body_right = '".$item_body_right_pic."', tuxedo_suits_ip = '".$tuxedo_suits_ip."', tuxedo_suits_status = '".$tuxedo_suits_status."' WHERE order_id = '".$order_id."' ";
				$query53 = mysql_db_query($dbname, $sql53) or die("Can't Query53");
				
				$sql54 = " UPDATE customize_tuxedo_with_vest_measurements SET tuxedo_with_vest_body_right = '".$item_body_right_pic."', tuxedo_with_vest_ip = '".$tuxedo_with_vest_ip."', tuxedo_with_vest_status = '".$tuxedo_with_vest_status."' WHERE order_id = '".$order_id."' ";
				$query54 = mysql_db_query($dbname, $sql54) or die("Can't Query54");
				
				$sql55 = " UPDATE customize_vest_measurements SET vest_body_right = '".$item_body_right_pic."', vest_ip = '".$vest_ip."', vest_status = '".$vest_status."' WHERE order_id = '".$order_id."' ";
				$query55 = mysql_db_query($dbname, $sql55) or die("Can't Query55");
			}
    
	} else {
				$sql45 = " UPDATE customize_jacket_measurements SET jacket_ip = '".$jacket_ip."', jacket_status = '".$jacket_status."' WHERE order_id = '".$order_id."' ";
				$query45 = mysql_db_query($dbname, $sql45) or die("Can't Query45");
				
				$sql46 = " UPDATE customize_jeans_measurements SET jeans_ip = '".$jeans_ip."', jeans_status = '".$jeans_status."' WHERE order_id = '".$order_id."' ";
				$query46 = mysql_db_query($dbname, $sql46) or die("Can't Query46");
				
				$sql47 = " UPDATE customize_overcoat_measurements SET overcoat_ip = '".$overcoat_ip."', overcoat_status = '".$overcoat_status."' WHERE order_id = '".$order_id."' ";
				$query47 = mysql_db_query($dbname, $sql47) or die("Can't Query47");
				
				$sql48 = " UPDATE customize_pants_measurements SET pants_ip = '".$pants_ip."', pants_status = '".$pants_status."' WHERE order_id = '".$order_id."' ";
				$query48 = mysql_db_query($dbname, $sql48) or die("Can't Query48");
				
				$sql49 = " UPDATE customize_shirt_measurements SET shirt_ip = '".$shirt_ip."', shirt_status = '".$shirt_status."' WHERE order_id = '".$order_id."' ";
				$query49 = mysql_db_query($dbname, $sql49) or die("Can't Query49");
				
				$sql50 = " UPDATE customize_suits_measurements SET suits_ip = '".$suits_ip."', suits_status = '".$suits_status."' WHERE order_id = '".$order_id."' ";
				$query50 = mysql_db_query($dbname, $sql50) or die("Can't Query50");
				
				$sql51 = " UPDATE customize_suits_with_vest_measurements SET suits_with_vest_ip = '".$suits_with_vest_ip."', suits_with_vest_status = '".$suits_with_vest_status."' WHERE order_id = '".$order_id."' ";
				$query51 = mysql_db_query($dbname, $sql51) or die("Can't Query51");
				
				$sql52 = " UPDATE customize_tuxedo_jacket_measurements SET tuxedo_jacket_ip = '".$tuxedo_jacket_ip."', tuxedo_jacket_status = '".$tuxedo_jacket_status."' WHERE order_id = '".$order_id."' ";
				$query52 = mysql_db_query($dbname, $sql52) or die("Can't Query52");
				
				$sql53 = " UPDATE customize_tuxedo_suits_measurements SET tuxedo_suits_ip = '".$tuxedo_suits_ip."', tuxedo_suits_status = '".$tuxedo_suits_status."' WHERE order_id = '".$order_id."' ";
				$query53 = mysql_db_query($dbname, $sql53) or die("Can't Query53");
				
				$sql54 = " UPDATE customize_tuxedo_with_vest_measurements SET tuxedo_with_vest_ip = '".$tuxedo_with_vest_ip."', tuxedo_with_vest_status = '".$tuxedo_with_vest_status."' WHERE order_id = '".$order_id."' ";
				$query54 = mysql_db_query($dbname, $sql54) or die("Can't Query54");
				
				$sql55 = " UPDATE customize_vest_measurements SET vest_ip = '".$vest_ip."', vest_status = '".$vest_status."' WHERE order_id = '".$order_id."' ";
				$query55 = mysql_db_query($dbname, $sql55) or die("Can't Query55");
			}
	}	
	
$path = "../../images/body/back/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['item_body_back']['name'];
	$tmp = $_FILES['item_body_back']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$item_body_back_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$item_body_back_pic)){
				
				$sql56 = " UPDATE customize_jacket_measurements SET jacket_body_back = '".$item_body_back_pic."', jacket_ip = '".$jacket_ip."', jacket_status = '".$jacket_status."' WHERE order_id = '".$order_id."' ";
				$query56 = mysql_db_query($dbname, $sql56) or die("Can't Query56");
				
				$sql57 = " UPDATE customize_jeans_measurements SET jeans_body_back = '".$item_body_back_pic."', jeans_ip = '".$jeans_ip."', jeans_status = '".$jeans_status."' WHERE order_id = '".$order_id."' ";
				$query57 = mysql_db_query($dbname, $sql57) or die("Can't Query57");
				
				$sql58 = " UPDATE customize_overcoat_measurements SET overcoat_body_back = '".$item_body_back_pic."', overcoat_ip = '".$overcoat_ip."', overcoat_status = '".$overcoat_status."' WHERE order_id = '".$order_id."' ";
				$query58 = mysql_db_query($dbname, $sql58) or die("Can't Query58");
				
				$sql59 = " UPDATE customize_pants_measurements SET pants_body_back = '".$item_body_back_pic."', pants_ip = '".$pants_ip."', pants_status = '".$pants_status."' WHERE order_id = '".$order_id."' ";
				$query59 = mysql_db_query($dbname, $sql59) or die("Can't Query59");
				
				$sql60 = " UPDATE customize_shirt_measurements SET shirt_body_back = '".$item_body_back_pic."', shirt_ip = '".$shirt_ip."', shirt_status = '".$shirt_status."' WHERE order_id = '".$order_id."' ";
				$query60 = mysql_db_query($dbname, $sql60) or die("Can't Query60");
				
				$sql61 = " UPDATE customize_suits_measurements SET suits_body_back = '".$item_body_back_pic."', suits_ip = '".$suits_ip."', suits_status = '".$suits_status."' WHERE order_id = '".$order_id."' ";
				$query61 = mysql_db_query($dbname, $sql61) or die("Can't Query61");
				
				$sql62 = " UPDATE customize_suits_with_vest_measurements SET suits_with_vest_body_back = '".$item_body_back_pic."', suits_with_vest_ip = '".$suits_with_vest_ip."', suits_with_vest_status = '".$suits_with_vest_status."' WHERE order_id = '".$order_id."' ";
				$query62 = mysql_db_query($dbname, $sql62) or die("Can't Query62");
				
				$sql63 = " UPDATE customize_tuxedo_jacket_measurements SET tuxedo_jacket_body_back = '".$item_body_back_pic."', tuxedo_jacket_ip = '".$tuxedo_jacket_ip."', tuxedo_jacket_status = '".$tuxedo_jacket_status."' WHERE order_id = '".$order_id."' ";
				$query63 = mysql_db_query($dbname, $sql63) or die("Can't Query63");
				
				$sql64 = " UPDATE customize_tuxedo_suits_measurements SET tuxedo_suits_body_back = '".$item_body_back_pic."', tuxedo_suits_ip = '".$tuxedo_suits_ip."', tuxedo_suits_status = '".$tuxedo_suits_status."' WHERE order_id = '".$order_id."' ";
				$query64 = mysql_db_query($dbname, $sql64) or die("Can't Query64");
				
				$sql65 = " UPDATE customize_tuxedo_with_vest_measurements SET tuxedo_with_vest_body_back = '".$item_body_back_pic."', tuxedo_with_vest_ip = '".$tuxedo_with_vest_ip."', tuxedo_with_vest_status = '".$tuxedo_with_vest_status."' WHERE order_id = '".$order_id."' ";
				$query65 = mysql_db_query($dbname, $sql65) or die("Can't Query65");
				
				$sql66 = " UPDATE customize_vest_measurements SET vest_body_back = '".$item_body_back_pic."', vest_ip = '".$vest_ip."', vest_status = '".$vest_status."' WHERE order_id = '".$order_id."' ";
				$query66 = mysql_db_query($dbname, $sql66) or die("Can't Query66");
			}
    
	} else {
				$sql56 = " UPDATE customize_jacket_measurements SET jacket_ip = '".$jacket_ip."', jacket_status = '".$jacket_status."' WHERE order_id = '".$order_id."' ";
				$query56 = mysql_db_query($dbname, $sql56) or die("Can't Query56");
				
				$sql57 = " UPDATE customize_jeans_measurements SET jeans_ip = '".$jeans_ip."', jeans_status = '".$jeans_status."' WHERE order_id = '".$order_id."' ";
				$query57 = mysql_db_query($dbname, $sql57) or die("Can't Query57");
				
				$sql58 = " UPDATE customize_overcoat_measurements SET overcoat_ip = '".$overcoat_ip."', overcoat_status = '".$overcoat_status."' WHERE order_id = '".$order_id."' ";
				$query58 = mysql_db_query($dbname, $sql58) or die("Can't Query58");
				
				$sql59 = " UPDATE customize_pants_measurements SET pants_ip = '".$pants_ip."', pants_status = '".$pants_status."' WHERE order_id = '".$order_id."' ";
				$query59 = mysql_db_query($dbname, $sql59) or die("Can't Query59");
				
				$sql60 = " UPDATE customize_shirt_measurements SET shirt_ip = '".$shirt_ip."', shirt_status = '".$shirt_status."' WHERE order_id = '".$order_id."' ";
				$query60 = mysql_db_query($dbname, $sql60) or die("Can't Query60");
				
				$sql61 = " UPDATE customize_suits_measurements SET suits_ip = '".$suits_ip."', suits_status = '".$suits_status."' WHERE order_id = '".$order_id."' ";
				$query61 = mysql_db_query($dbname, $sql61) or die("Can't Query61");
				
				$sql62 = " UPDATE customize_suits_with_vest_measurements SET suits_with_vest_ip = '".$suits_with_vest_ip."', suits_with_vest_status = '".$suits_with_vest_status."' WHERE order_id = '".$order_id."' ";
				$query62 = mysql_db_query($dbname, $sql62) or die("Can't Query62");
				
				$sql63 = " UPDATE customize_tuxedo_jacket_measurements SET tuxedo_jacket_ip = '".$tuxedo_jacket_ip."', tuxedo_jacket_status = '".$tuxedo_jacket_status."' WHERE order_id = '".$order_id."' ";
				$query63 = mysql_db_query($dbname, $sql63) or die("Can't Query63");
				
				$sql64 = " UPDATE customize_tuxedo_suits_measurements SET tuxedo_suits_ip = '".$tuxedo_suits_ip."', tuxedo_suits_status = '".$tuxedo_suits_status."' WHERE order_id = '".$order_id."' ";
				$query64 = mysql_db_query($dbname, $sql64) or die("Can't Query64");
				
				$sql65 = " UPDATE customize_tuxedo_with_vest_measurements SET tuxedo_with_vest_ip = '".$tuxedo_with_vest_ip."', tuxedo_with_vest_status = '".$tuxedo_with_vest_status."' WHERE order_id = '".$order_id."' ";
				$query65 = mysql_db_query($dbname, $sql65) or die("Can't Query65");
				
				$sql66 = " UPDATE customize_vest_measurements SET vest_ip = '".$vest_ip."', vest_status = '".$vest_status."' WHERE order_id = '".$order_id."' ";
				$query66 = mysql_db_query($dbname, $sql66) or die("Can't Query66");
			}
	}	

$sql67 = " UPDATE customize_checkout SET checkout_order = '$jacket_order_no' WHERE checkout_orderid = '$order_id' ";
$query67 = mysql_query($sql67) or die("Can't Query67");

if($query67) {
	
	echo " <script language='javascript'> window.location='../../../checkout/multiple/index.php?orderid=".$order_id."'; </script> ";
	
}

mysql_close();
?>