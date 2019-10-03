<?
if(empty($_POST['ip'])){
	$_POST['ip'] = $_SERVER['REMOTE_ADDR'];
}
require('./phpip2country.class.php');

include('../../connect.php');

$parameter_measurement = $_POST["parameter_measurement"];
$parameter_measurement_num = $_POST["parameter_measurement_num"];
$parameter_category = $_POST["parameter_category"];
$parameter_name = $_POST["parameter_name"];
$parameter_admin = $_POST["parameter_admin"];
$parameter_date = date("m/d/Y");
$parameter_time = date("H:i:s");
$parameter_ip = $_POST['ip'];
$parameter_status = T;

$sql1 =	" SELECT MAX(id) FROM admin_parameter";
$query1 = mysql_db_query($dbname, $sql1) or die("Can't Query1");
$row1 = mysql_fetch_array($query1);
$id = $row1[0] + 1 ;

$sql2 = " INSERT INTO admin_parameter (id, parameter_measurement, parameter_measurement_num, parameter_category, parameter_name, parameter_admin, parameter_date, parameter_time, parameter_ip, parameter_status) VALUES ('".$id."', '".$parameter_measurement."', '".$parameter_measurement_num."', '".$parameter_category."', '".$parameter_name."', '".$parameter_admin."', '".$parameter_date."', '".$parameter_time."', '".$parameter_ip."', '".$parameter_status."') ";
$query2 = mysql_query($sql2) or die("Can't Query2");

if($query2) {

	echo " <script language='javascript'> window.location='../parameter/'; </script> ";

}

mysql_close();
?>
