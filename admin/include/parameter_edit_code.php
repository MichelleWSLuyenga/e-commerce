<?
if(empty($_POST['ip'])){
	$_POST['ip'] = $_SERVER['REMOTE_ADDR'];
}
require('./phpip2country.class.php');

include('../../connect.php');

$id = $_POST["id"];
$parameter_measurement = $_POST["parameter_measurement"];
$parameter_measurement_num = $_POST["parameter_measurement_num"];
$parameter_category = $_POST["parameter_category"];
$parameter_name = $_POST["parameter_name"];
$parameter_admin = $_POST["parameter_admin"];
$parameter_date = date("m/d/Y");
$parameter_time = date("H:i:s");
$parameter_ip = $_POST['ip'];
$parameter_status = T;

$sql1 = " UPDATE admin_parameter SET parameter_measurement = '".$parameter_measurement."', parameter_measurement_num = '".$parameter_measurement_num."', parameter_category = '".$parameter_category."', parameter_name = '".$parameter_name."', parameter_admin = '".$parameter_admin."', parameter_date = '".$parameter_date."', parameter_time = '".$parameter_time."', parameter_ip = '".$parameter_ip."', parameter_status = '".$parameter_status."' WHERE id = '$id' ";
$query1 = mysql_query($sql1) or die("Can't Query1");

if($query1) {
	
	echo " <script language='javascript'> window.location='../parameter/'; </script> ";
	
}

mysql_close();
?>