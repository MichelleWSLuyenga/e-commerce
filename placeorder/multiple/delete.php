<?
include('../../connect.php');

$order_id = $_GET["orderid"];
$product_status = F;

$sql1 = " UPDATE customize_checkout SET checkout_status = '$product_status' WHERE checkout_orderid = '$order_id' ";
$query1 = mysql_query($sql1) or die("Can't Query1");

$sql2 = " UPDATE customize_order SET order_status = '$product_status' WHERE order_id = '$order_id' ";
$query2 = mysql_query($sql2) or die("Can't Query2");

$sql3 = " UPDATE customize_jacket_design SET jacket_status = '$product_status' WHERE order_id = '$order_id' ";
$query3 = mysql_query($sql3) or die("Can't Query3");

$sql4 = " UPDATE customize_jacket_measurements SET jacket_status = '$product_status' WHERE order_id = '$order_id' ";
$query4 = mysql_query($sql4) or die("Can't Query4");

$sql5 = " UPDATE customize_jeans_design SET jeans_status = '$product_status' WHERE order_id = '$order_id' ";
$query5 = mysql_query($sql5) or die("Can't Query5");

$sql6 = " UPDATE customize_jeans_measurements SET jeans_status = '$product_status' WHERE order_id = '$order_id' ";
$query6 = mysql_query($sql6) or die("Can't Query6");

$sql7 = " UPDATE customize_overcoat_design SET overcoat_status = '$product_status' WHERE order_id = '$order_id' ";
$query7 = mysql_query($sql7) or die("Can't Query7");

$sql8 = " UPDATE customize_overcoat_measurements SET overcoat_status = '$product_status' WHERE order_id = '$order_id' ";
$query8 = mysql_query($sql8) or die("Can't Query8");

$sql9 = " UPDATE customize_pants_design SET pants_status = '$product_status' WHERE order_id = '$order_id' ";
$query9 = mysql_query($sql9) or die("Can't Query9");

$sql10 = " UPDATE customize_pants_measurements SET pants_status = '$product_status' WHERE order_id = '$order_id' ";
$query10 = mysql_query($sql10) or die("Can't Query10");

$sql11 = " UPDATE customize_shirt_design SET shirt_status = '$product_status' WHERE order_id = '$order_id' ";
$query11 = mysql_query($sql11) or die("Can't Query11");

$sql12 = " UPDATE customize_shirt_measurements SET shirt_status = '$product_status' WHERE order_id = '$order_id' ";
$query12 = mysql_query($sql12) or die("Can't Query12");

$sql13 = " UPDATE customize_suits_design SET suits_status = '$product_status' WHERE order_id = '$order_id' ";
$query13 = mysql_query($sql13) or die("Can't Query13");

$sql14 = " UPDATE customize_suits_measurements SET suits_status = '$product_status' WHERE order_id = '$order_id' ";
$query14 = mysql_query($sql14) or die("Can't Query14");

$sql15 = " UPDATE customize_suits_with_vest_design SET suits_with_vest_status = '$product_status' WHERE order_id = '$order_id' ";
$query15 = mysql_query($sql15) or die("Can't Query15");

$sql16 = " UPDATE customize_suits_with_vest_measurements SET suits_with_vest_status = '$product_status' WHERE order_id = '$order_id' ";
$query16 = mysql_query($sql16) or die("Can't Query16");

$sql17 = " UPDATE customize_ties_design SET ties_status = '$product_status' WHERE order_id = '$order_id' ";
$query17 = mysql_query($sql17) or die("Can't Query17");

$sql18 = " UPDATE customize_tuxedo_jacket_design SET tuxedo_jacket_status = '$product_status' WHERE order_id = '$order_id' ";
$query18 = mysql_query($sql18) or die("Can't Query18");

$sql19 = " UPDATE customize_tuxedo_jacket_measurements SET tuxedo_jacket_status = '$product_status' WHERE order_id = '$order_id' ";
$query19 = mysql_query($sql19) or die("Can't Query19");

$sql20 = " UPDATE customize_tuxedo_suits_design SET tuxedo_suits_status = '$product_status' WHERE order_id = '$order_id' ";
$query20 = mysql_query($sql20) or die("Can't Query20");

$sql21 = " UPDATE customize_tuxedo_suits_measurements SET tuxedo_suits_status = '$product_status' WHERE order_id = '$order_id' ";
$query21 = mysql_query($sql21) or die("Can't Query21");

$sql22 = " UPDATE customize_tuxedo_with_vest_design SET tuxedo_with_vest_status = '$product_status' WHERE order_id = '$order_id' ";
$query22 = mysql_query($sql22) or die("Can't Query22");

$sql23 = " UPDATE customize_tuxedo_with_vest_measurements SET tuxedo_with_vest_status = '$product_status' WHERE order_id = '$order_id' ";
$query23 = mysql_query($sql23) or die("Can't Query23");

$sql24 = " UPDATE customize_vest_design SET vest_status = '$product_status' WHERE order_id = '$order_id' ";
$query24 = mysql_query($sql24) or die("Can't Query24");

$sql25 = " UPDATE customize_vest_measurements SET vest_status = '$product_status' WHERE order_id = '$order_id' ";
$query25 = mysql_query($sql25) or die("Can't Query25");

if($query25) {
	
	echo " <script language='javascript'> window.location='index.php'; </script> ";
	
}

mysql_close();
?>