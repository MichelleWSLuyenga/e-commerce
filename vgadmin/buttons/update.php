<?
include('../../connect.php');

$id = $_GET["id"];
$buttons_product = $_GET["buttons_product"];
$buttons_status = $_GET["buttons_status"];

if($buttons_status == "T") {
   $status = F;	
} else if($buttons_status == "F") {
   $status = T;	
}

if($buttons_product == "jacket") {
	
$sql1 = " UPDATE admin_buttons_jacket SET buttons_status = '$status' WHERE id = '$id' ";
$query1 = mysql_query($sql1) or die("Can't Query1");
echo " <script language='javascript'> window.location='jacket.php'; </script> ";
	
}

if($buttons_product == "overcoat") {	

$sql1 = " UPDATE admin_buttons_overcoat SET buttons_status = '$status' WHERE id = '$id' ";
$query1 = mysql_query($sql1) or die("Can't Query1");
echo " <script language='javascript'> window.location='overcoat.php'; </script> ";

} 

if($buttons_product == "pants") {

$sql1 = " UPDATE admin_buttons_pants SET buttons_status = '$status' WHERE id = '$id' ";
$query1 = mysql_query($sql1) or die("Can't Query1");
echo " <script language='javascript'> window.location='pants.php'; </script> ";
	
} 

if($buttons_product == "shirt") {
	
$sql1 = " UPDATE admin_buttons_shirt SET buttons_status = '$status' WHERE id = '$id' ";
$query1 = mysql_query($sql1) or die("Can't Query1");
echo " <script language='javascript'> window.location='shirt.php'; </script> ";
	
} 

if($buttons_product == "suits") {

$sql1 = " UPDATE admin_buttons_suits SET buttons_status = '$status' WHERE id = '$id' ";
$query1 = mysql_query($sql1) or die("Can't Query1");
echo " <script language='javascript'> window.location='suit.php'; </script> ";
	
} 

if($buttons_product == "vest") {

$sql1 = " UPDATE admin_buttons_vest SET buttons_status = '$status' WHERE id = '$id' ";
$query1 = mysql_query($sql1) or die("Can't Query1");
echo " <script language='javascript'> window.location='vest.php'; </script> ";
	
}

mysql_close();
?>