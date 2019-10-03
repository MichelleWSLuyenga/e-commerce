<?
if(empty($_POST['ip'])){
	$_POST['ip'] = $_SERVER['REMOTE_ADDR'];
}
require('./phpip2country.class.php');

include('../../connect.php');

$id = $_POST["id"];
$category_name = $_POST["category_name"];
$category_admin = $_POST["category_admin"];
$category_image = $_POST["category_image"];
$category_date = date("m/d/Y");
$category_time = date("H:i:s");
$category_ip = $_POST['ip'];
$category_status = T;

$sql1 = " UPDATE admin_category SET category_name = '".$category_name."', category_admin = '".$category_admin."', category_date = '".$category_date."', category_time = '".$category_time."', category_ip = '".$category_ip."', category_status = '".$category_status."' WHERE id = '$id' ";
$query1 = mysql_query($sql1) or die("Can't Query1");

if($query1) {

	echo " <script language='javascript'> window.location='../category/'; </script> ";

}

mysql_close();
?>
