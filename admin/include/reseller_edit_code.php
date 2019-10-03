<?
if(empty($_POST['ip'])){
	$_POST['ip'] = $_SERVER['REMOTE_ADDR'];
}
require('./phpip2country.class.php');

include('../../connect.php');

$id = $_POST["id"];
$reseller_type = $_POST["reseller_type"];
$reseller_company = $_POST["reseller_company"];
$reseller_firstname = $_POST["reseller_firstname"];
$reseller_lastname = $_POST["reseller_lastname"];
$reseller_email = $_POST["reseller_email"];
$reseller_phone = $_POST["reseller_phone"];
$reseller_username = $_POST["reseller_username"];
$reseller_password = $_POST["reseller_password"];
$reseller_address = $_POST["reseller_address"];
$reseller_city = $_POST["reseller_city"];
$reseller_state = $_POST["reseller_state"];
$reseller_country = $_POST["reseller_country"];
$reseller_zipcode = $_POST["reseller_zipcode"];
$reseller_show_price = $_POST["reseller_show_price"];
$reseller_order_font = $_POST["reseller_order_font"];
$reseller_order_number = $_POST["reseller_order_number"];
$reseller_admin = $_POST["reseller_admin"];
$reseller_date = date("m/d/Y");
$reseller_time = date("H:i:s");
$reseller_ip = $_POST['ip'];
$reseller_status = T;

$sql1 = " UPDATE admin_reseller SET reseller_type = '".$reseller_type."', reseller_company = '".$reseller_company."', reseller_firstname = '".$reseller_firstname."', reseller_lastname = '".$reseller_lastname."', reseller_email = '".$reseller_email."', reseller_phone = '".$reseller_phone."', reseller_username = '".$reseller_username."', reseller_password = '".$reseller_password."', reseller_show_price = '".$reseller_show_price."', reseller_address = '".$reseller_address."', reseller_city = '".$reseller_city."', reseller_state = '".$reseller_state."', reseller_country = '".$reseller_country."', reseller_zipcode = '".$reseller_zipcode."', reseller_order_font = '".$reseller_order_font."', reseller_order_number = '".$reseller_order_number."', reseller_admin = '".$reseller_admin."', reseller_date = '".$reseller_date."', reseller_time = '".$reseller_time."', reseller_ip = '".$reseller_ip."', reseller_status = '".$reseller_status."' WHERE id = '$id' ";
$query1 = mysql_query($sql1) or die("Can't Query1");

if($query1) {
	
	echo " <script language='javascript'> window.location='../reseller/view.php'; </script> ";
	
}

mysql_close();
?>