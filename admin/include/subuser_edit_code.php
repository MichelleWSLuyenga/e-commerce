<?
if(empty($_POST['ip'])){
	$_POST['ip'] = $_SERVER['REMOTE_ADDR'];
}
require('./phpip2country.class.php');

include('../../connect.php');

$id = $_POST["id"];
$admin_username = $_POST["admin_username"];
$admin_password = $_POST["admin_password"];
$admin_firstname = $_POST["admin_firstname"];
$admin_lastname = $_POST["admin_lastname"];
$admin_email = $_POST["admin_email"];
$admin_status_country = $_POST["admin_status_country"];
$admin_status_fabrictype = $_POST["admin_status_fabrictype"];
$admin_status_brandtype = $_POST["admin_status_brandtype"];
$admin_status_orders = $_POST["admin_status_orders"];
$admin_status_reports = $_POST["admin_status_reports"];
$admin_status_subuser = T;
$admin_admin = $_POST["admin_admin"];
$admin_date = date("m/d/Y");
$admin_time = date("H:i:s");
$admin_ip = $_POST['ip'];
$admin_status = T;

$sql1 = " UPDATE admin SET admin_username = '".$admin_username."', admin_password = '".$admin_password."', admin_firstname = '".$admin_firstname."', admin_lastname = '".$admin_lastname."', admin_email = '".$admin_email."', admin_status_country = '".$admin_status_country."', admin_status_fabrictype = '".$admin_status_fabrictype."', admin_status_brandtype = '".$admin_status_brandtype."', admin_status_orders = '".$admin_status_orders."', admin_status_reports = '".$admin_status_reports."', admin_status_subuser = '".$admin_status_subuser."', admin_admin = '".$admin_admin."', admin_date = '".$admin_date."', admin_time = '".$admin_time."', admin_ip = '".$admin_ip."', admin_status = '".$admin_status."' WHERE id = '$id' ";
$query1 = mysql_query($sql1) or die("Can't Query1");

if($query1) {
	
	echo " <script language='javascript'> window.location='../mail/mail_subuser.php?id=".$id."'; </script> ";
	
}

mysql_close();
?>