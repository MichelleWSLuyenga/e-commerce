<?
include('../../connect.php');

$id = $_POST["id"];
$reseller_username = $_POST["reseller_username"];
$reseller_password = $_POST["reseller_password"];
$reseller_firstname = $_POST["reseller_firstname"];
$reseller_lastname = $_POST["reseller_lastname"];
$reseller_email = $_POST["reseller_email"];
$reseller_status = T;

$sql1 =	" UPDATE admin_reseller SET reseller_username = '".$reseller_username."', reseller_password = '".$reseller_password."', reseller_firstname = '".$reseller_firstname."', reseller_lastname = '".$reseller_lastname."', reseller_email = '".$reseller_email."', reseller_status = '".$reseller_status."' WHERE id = '".$id."' ";
$query1 = mysql_query($sql1) or die("Can't Query1");

if($query1) {
	
	echo " <script language='javascript'> alert('Record saved successfully'); window.location='../home.php'; </script> ";
	
}	

mysql_close();
?>