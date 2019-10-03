<?php
if(empty($_POST['ip'])){
	$_POST['ip'] = $_SERVER['REMOTE_ADDR'];
}
require('./phpip2country.class.php');

include('../../connect.php');

//$ids = implode(",",$_POST["ids"]);
$id = $_POST["id"];
$fabrictype_category = implode(",",$_POST["fabrictype_category"]);
$fabricbrand_category = implode(",",$_POST["fabricbrand_category"]);
$category_category = $_POST["category_category"];
$assign_admin = $_POST["assign_admin"];
$assign_date = date("m/d/Y");
$assign_time = date("H:i:s");
$assign_ip = $_POST['ip'];
$assign_status = T;

$sql1 =	" SELECT MAX(id) FROM admin_assign";
$query1 = mysql_db_query($dbname, $sql1) or die("Can't Query1");
$row1 = mysql_fetch_array($query1);
$id = $row1[0] + 1 ;

$sql2 = " INSERT INTO admin_assign (id, fabrictype_category, fabricbrand_category, category_category, assign_admin, assign_date, assign_time, assign_ip, assign_status) VALUES ('".$id."', '".$fabrictype_category."', '".$fabricbrand_category."', '".$category_category."', '".$assign_admin."', '".$assign_date."', '".$assign_time."', '".$assign_ip."', '".$assign_status."') ";
$query2 = mysql_query($sql2) or die("Can't Query2");

if($query2) {

	echo " <script language='javascript'> window.location='../assign/'; </script> ";

}

mysql_close();
?>
