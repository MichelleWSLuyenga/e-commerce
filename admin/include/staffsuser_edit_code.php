<?
if(empty($_POST['ip'])){
	$_POST['ip'] = $_SERVER['REMOTE_ADDR'];
}
require('./phpip2country.class.php');

include('../../connect.php');

$id = $_POST["id"];
$reseller_type = $_POST["reseller_type"];
$reseller_company = $_POST["reseller_company"];
$reseller_username = $_POST["reseller_username"];
$reseller_password = $_POST["reseller_password"];
$reseller_firstname = $_POST["reseller_firstname"];
$reseller_lastname = $_POST["reseller_lastname"];
$reseller_email = $_POST["reseller_email"];
$reseller_status_logo = $_POST["reseller_status_logo"];
$reseller_status_category_picture = $_POST["reseller_status_category_picture"];
$reseller_status_orders = $_POST["reseller_status_orders"];
$reseller_status_report = $_POST["reseller_status_report"];
$reseller_status_categorywise_sale_report = $_POST["reseller_status_categorywise_sale_report"];
$reseller_status_staffsuser = $_POST["reseller_status_staffsuser"];
$reseller_status_report_payment_received = $_POST["reseller_status_report_payment_received"];
$reseller_status_report_payment_pending = $_POST["reseller_status_report_payment_pending"];
$reseller_status_report_total_sales = $_POST["reseller_status_report_total_sales"];
$reseller_status_report_pending_orders = $_POST["reseller_status_report_pending_orders"];
$reseller_status_report_inprocess_orders = $_POST["reseller_status_report_inprocess_orders"];
$reseller_status_report_completed_orders = $_POST["reseller_status_report_completed_orders"];
$reseller_admin = $_POST["reseller_admin"];
$reseller_date = date("m/d/Y");
$reseller_time = date("H:i:s");
$reseller_ip = $_POST['ip'];
$reseller_status = T;

$sql1 = " UPDATE admin_reseller SET reseller_type = '".$reseller_type."', reseller_company = '".$reseller_company."', reseller_username = '".$reseller_username."', reseller_password = '".$reseller_password."', reseller_firstname = '".$reseller_firstname."', reseller_lastname = '".$reseller_lastname."', reseller_email = '".$reseller_email."', reseller_status_logo = '".$reseller_status_logo."', reseller_status_category_picture = '".$reseller_status_category_picture."', reseller_status_orders = '".$reseller_status_orders."', reseller_status_report = '".$reseller_status_report."', reseller_status_categorywise_sale_report = '".$reseller_status_categorywise_sale_report."', reseller_status_staffsuser = '".$reseller_status_staffsuser."', reseller_status_report_payment_received = '".$reseller_status_report_payment_received."', reseller_status_report_payment_pending = '".$reseller_status_report_payment_pending."', reseller_status_report_total_sales = '".$reseller_status_report_total_sales."', reseller_status_report_pending_orders = '".$reseller_status_report_pending_orders."', reseller_status_report_inprocess_orders = '".$reseller_status_report_inprocess_orders."', reseller_status_report_completed_orders = '".$reseller_status_report_completed_orders."', reseller_admin = '".$reseller_admin."', reseller_date = '".$reseller_date."', reseller_time = '".$reseller_time."', reseller_ip = '".$reseller_ip."', reseller_status = '".$reseller_status."' WHERE id = '$id' ";
$query1 = mysql_query($sql1) or die("Can't Query1");

if($query1) {
	
	echo " <script language='javascript'> alert('Record saved successfully'); window.location='../mail/mail_staffsuser.php?id=".$id."'; </script> ";
	
}

mysql_close();
?>