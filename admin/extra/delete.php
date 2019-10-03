<?
include('../../connect.php');

$id = $_GET["id"];
$option_status = F;

$sql2 = " UPDATE admin_option SET option_status = '$option_status' WHERE id = '$id' ";
$query2 = mysql_query($sql2) or die("Can't Query2");

if($query2) {

	echo " <script language='javascript'> window.location='index.php'; </script> ";

}

mysql_close();
?>
