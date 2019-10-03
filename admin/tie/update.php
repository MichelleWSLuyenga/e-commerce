<?
include('../../connect.php');

$id = $_GET["id"];
$fabrics_status = $_GET["tie_status"];

if($fabrics_status == "T") {
   $status = F;	
} else if($fabrics_status == "F") {
   $status = T;	
}

$sql1 = " UPDATE admin_fabrics_ties SET fabrics_status = '$status' WHERE id = '$id' ";
$query1 = mysql_query($sql1) or die("Can't Query1");

if($query1) {
	
	echo " <script language='javascript'> window.location='view.php'; </script> ";
	
}

mysql_close();
?>