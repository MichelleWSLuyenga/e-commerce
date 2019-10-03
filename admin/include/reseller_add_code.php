<?
if(empty($_POST['ip'])){
	$_POST['ip'] = $_SERVER['REMOTE_ADDR'];
}
require('./phpip2country.class.php');

include('../../connect.php');

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

$sql1 =	" SELECT MAX(id) FROM admin_reseller";
$query1 = mysql_db_query($dbname, $sql1) or die("Can't Query1");
$row1 = mysql_fetch_array($query1);
$id = $row1[0] + 1 ;

if ($reseller_type == 'Admin') { 

$sql2 = " INSERT INTO admin_reseller (id, reseller_type, reseller_company, reseller_firstname, reseller_lastname, reseller_email, reseller_phone, reseller_username, reseller_password, reseller_show_price, reseller_address, reseller_city, reseller_state, reseller_country, reseller_zipcode, reseller_order_font, reseller_order_number, reseller_admin, reseller_date, reseller_time, reseller_ip, reseller_status) VALUES ('".$id."', '".$reseller_type."', '".$reseller_company."', '".$reseller_firstname."', '".$reseller_lastname."', '".$reseller_email."', '".$reseller_phone."', '".$reseller_username."', '".$reseller_password."', '".$reseller_show_price."', '".$reseller_address."', '".$reseller_city."', '".$reseller_state."', '".$reseller_country."', '".$reseller_zipcode."', '".$reseller_order_font."', '".$reseller_order_number."', '".$reseller_admin."', '".$reseller_date."', '".$reseller_time."', '".$reseller_ip."', '".$reseller_status."') ";
$query2 = mysql_query($sql2) or die("Can't Query2");

$sql3 = " INSERT INTO admin_uploadcategory (id, uploadcategory_reseller, uploadcategory_admin, uploadcategory_date, uploadcategory_time, uploadcategory_ip, uploadcategory_status) VALUES ('".$id."', '".$reseller_company."', '".$reseller_admin."', '".$reseller_date."', '".$reseller_time."', '".$reseller_ip."', '".$reseller_status."') ";
$query3 = mysql_query($sql3) or die("Can't Query3");

$sql4 = " INSERT INTO admin_uploadlogo (id, uploadlogo_reseller, uploadlogo_admin, uploadlogo_date, uploadlogo_time, uploadlogo_ip, uploadlogo_status) VALUES ('".$id."', '".$reseller_company."', '".$reseller_admin."', '".$reseller_date."', '".$reseller_time."', '".$reseller_ip."', '".$reseller_status."') ";
$query4 = mysql_query($sql4) or die("Can't Query4");

} else if ($reseller_type == 'Sub-admin') { 

$sql2 = " INSERT INTO admin_reseller (id, reseller_type, reseller_company, reseller_firstname, reseller_lastname, reseller_email, reseller_phone, reseller_username, reseller_password, reseller_show_price, reseller_address, reseller_city, reseller_state, reseller_country, reseller_zipcode, reseller_order_font, reseller_order_number, reseller_admin, reseller_date, reseller_time, reseller_ip, reseller_status) VALUES ('".$id."', '".$reseller_type."', '".$reseller_company."', '".$reseller_firstname."', '".$reseller_lastname."', '".$reseller_email."', '".$reseller_phone."', '".$reseller_username."', '".$reseller_password."', '".$reseller_show_price."', '".$reseller_address."', '".$reseller_city."', '".$reseller_state."', '".$reseller_country."', '".$reseller_zipcode."', '".$reseller_order_font."', '".$reseller_order_number."', '".$reseller_admin."', '".$reseller_date."', '".$reseller_time."', '".$reseller_ip."', '".$reseller_status."') ";
$query2 = mysql_query($sql2) or die("Can't Query2");

}

$sql5 = " ALTER TABLE admin_fabrictype ADD `fabrictype_".$id."` VARCHAR(100) NOT NULL AFTER fabrictype_name ";
$query5 = mysql_query($sql5) or die("Can't Query5");

$sql6 = " ALTER TABLE admin_fabricbrand ADD `fabricbrand_".$id."` VARCHAR(100) NOT NULL AFTER fabricbrand_name ";
$query6 = mysql_query($sql6) or die("Can't Query6");

$sql7 = " ALTER TABLE admin_parameter ADD `parameter_".$id."` VARCHAR(100) NOT NULL AFTER parameter_name ";
$query7 = mysql_query($sql7) or die("Can't Query7");

$sql8 = " ALTER TABLE admin_extraoptions ADD `extra_".$id."` VARCHAR(100) NOT NULL AFTER extra_name ";
$query8 = mysql_query($sql8) or die("Can't Query8");

if($query8) {
	
	echo " <script language='javascript'> window.location='../mail/mail_reseller.php?id=".$id."'; </script> ";
	
}

mysql_close();
?>