<?
include('../../connect.php');

$id = $_GET["id"];
$fabrics_product = $_GET["lining_product"];
$fabrics_status = $_GET["lining_status"];

if($fabrics_status == "T") {
   $status = F;	
} else if($fabrics_status == "F") {
   $status = T;	
}

if($fabrics_product == "jacket") {

$sql1 = " UPDATE admin_lining_jacket SET fabrics_status = '$status' WHERE id = '$id' ";
$query1 = mysql_query($sql1) or die("Can't Query1");
echo " <script language='javascript'> window.location='jacket.php'; </script> ";	
	
}

if($fabrics_product == "overcoat") {

$sql1 = " UPDATE admin_lining_overcoat SET fabrics_status = '$status' WHERE id = '$id' ";
$query1 = mysql_query($sql1) or die("Can't Query1");
echo " <script language='javascript'> window.location='overcoat.php'; </script> ";	
	
} 

if($fabrics_product == "pants") {

$sql1 = " UPDATE admin_lining_pants SET fabrics_status = '$status' WHERE id = '$id' ";
$query1 = mysql_query($sql1) or die("Can't Query1");
echo " <script language='javascript'> window.location='pants.php'; </script> ";	
	
}

if($fabrics_product == "suits") {
	
$sql1 = " UPDATE admin_lining_suits SET fabrics_status = '$status' WHERE id = '$id' ";
$query1 = mysql_query($sql1) or die("Can't Query1");
echo " <script language='javascript'> window.location='suit.php'; </script> ";	
	
} 

if($fabrics_product == "vest") {	

$sql1 = " UPDATE admin_lining_vest SET fabrics_status = '$status' WHERE id = '$id' ";
$query1 = mysql_query($sql1) or die("Can't Query1");
echo " <script language='javascript'> window.location='vest.php'; </script> ";	

}

mysql_close();
?>