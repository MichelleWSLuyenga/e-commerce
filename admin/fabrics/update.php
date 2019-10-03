<?
include('../../connect.php');

$id = $_GET["id"];
$fabrics_product = $_GET["fabrics_product"];
$fabrics_status = $_GET["fabrics_status"];

if($fabrics_status == "T") {
   $status = F;	
} else if($fabrics_status == "F") {
   $status = T;	
}

if($fabrics_product == "jacket") {
	
$sql1 = " UPDATE admin_fabrics_jacket SET fabrics_status = '$status' WHERE id = '$id' ";
$query1 = mysql_query($sql1) or die("Can't Query1");	
echo " <script language='javascript'> window.location='jacket.php'; </script> ";
	
} 

if($fabrics_product == "jeans") {
	
$sql1 = " UPDATE admin_fabrics_jeans SET fabrics_status = '$status' WHERE id = '$id' ";
$query1 = mysql_query($sql1) or die("Can't Query1");
echo " <script language='javascript'> window.location='jeans.php'; </script> ";	

} 

if($fabrics_product == "overcoat") {	

$sql1 = " UPDATE admin_fabrics_overcoat SET fabrics_status = '$status' WHERE id = '$id' ";
$query1 = mysql_query($sql1) or die("Can't Query1");
echo " <script language='javascript'> window.location='overcoat.php'; </script> ";

} 

if($fabrics_product == "pants") {

$sql1 = " UPDATE admin_fabrics_pants SET fabrics_status = '$status' WHERE id = '$id' ";
$query1 = mysql_query($sql1) or die("Can't Query1");
echo " <script language='javascript'> window.location='pants.php'; </script> ";	
	
} 

if($fabrics_product == "shirt") {
	
$sql1 = " UPDATE admin_fabrics_shirt SET fabrics_status = '$status' WHERE id = '$id' ";
$query1 = mysql_query($sql1) or die("Can't Query1");
echo " <script language='javascript'> window.location='shirt.php'; </script> ";
	
} 

if($fabrics_product == "suits") {

$sql1 = " UPDATE admin_fabrics_suits SET fabrics_status = '$status' WHERE id = '$id' ";
$query1 = mysql_query($sql1) or die("Can't Query1");
echo " <script language='javascript'> window.location='suit.php'; </script> ";	
	
} 

if($fabrics_product == "vest") {

$sql1 = " UPDATE admin_fabrics_vest SET fabrics_status = '$status' WHERE id = '$id' ";
$query1 = mysql_query($sql1) or die("Can't Query1");
echo " <script language='javascript'> window.location='vest.php'; </script> ";
	
}					


mysql_close();
?>