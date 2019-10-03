<?
include('../../connect.php');

$order_id = $_GET["orderid"];
$product_id = $_GET["productid"];
$order_page = $_GET["order_page"];
$order_product = $_GET["order_product"];
$order_status = F;

$sql1 = " UPDATE customize_order SET order_status = '$order_status' WHERE order_id='$order_id' AND product_id='$product_id' ";
$query1 = mysql_query($sql1) or die("Can't Query1");

if ($order_product == "jacket") {

$sql2 = " UPDATE customize_order SET order_status = '$order_status' WHERE order_id='$order_id' AND product_id='$product_id' ";
$query2 = mysql_query($sql2) or die("Can't Query2");

$sql3 = " UPDATE customize_jacket_design SET jacket_status = '$order_status' WHERE order_id='$order_id' AND product_id='$product_id' ";
$query3 = mysql_query($sql3) or die("Can't Query3");

$sql4 = " UPDATE customize_jacket_measurements SET jacket_status = '$order_status' WHERE order_id='$order_id' AND product_id='$product_id' ";
$query4 = mysql_query($sql4) or die("Can't Query4");

} else if ($order_product == "jeans") {

$sql2 = " UPDATE customize_order SET order_status = '$order_status' WHERE order_id='$order_id' AND product_id='$product_id' ";
$query2 = mysql_query($sql2) or die("Can't Query2");

$sql3 = " UPDATE customize_jeans_design SET jeans_status = '$order_status' WHERE order_id='$order_id' AND product_id='$product_id' ";
$query3 = mysql_query($sql3) or die("Can't Query3");

$sql4 = " UPDATE customize_jeans_measurements SET jeans_status = '$order_status' WHERE order_id='$order_id' AND product_id='$product_id' ";
$query4 = mysql_query($sql4) or die("Can't Query4");	
	
} else if ($order_product == "overcoat") {

$sql2 = " UPDATE customize_order SET order_status = '$order_status' WHERE order_id='$order_id' AND product_id='$product_id' ";
$query2 = mysql_query($sql2) or die("Can't Query2");

$sql3 = " UPDATE customize_overcoat_design SET overcoat_status = '$order_status' WHERE order_id='$order_id' AND product_id='$product_id' ";
$query3 = mysql_query($sql3) or die("Can't Query3");

$sql4 = " UPDATE customize_overcoat_measurements SET overcoat_status = '$order_status' WHERE order_id='$order_id' AND product_id='$product_id' ";
$query4 = mysql_query($sql4) or die("Can't Query4");	

} else if ($order_product == "pants") {

$sql2 = " UPDATE customize_order SET order_status = '$order_status' WHERE order_id='$order_id' AND product_id='$product_id' ";
$query2 = mysql_query($sql2) or die("Can't Query2");

$sql3 = " UPDATE customize_pants_design SET pants_status = '$order_status' WHERE order_id='$order_id' AND product_id='$product_id' ";
$query3 = mysql_query($sql3) or die("Can't Query3");

$sql4 = " UPDATE customize_pants_measurements SET pants_status = '$order_status' WHERE order_id='$order_id' AND product_id='$product_id' ";
$query4 = mysql_query($sql4) or die("Can't Query4");	

} else if ($order_product == "shirt") {	

$sql2 = " UPDATE customize_order SET order_status = '$order_status' WHERE order_id='$order_id' AND product_id='$product_id' ";
$query2 = mysql_query($sql2) or die("Can't Query2");

$sql3 = " UPDATE customize_shirt_design SET shirt_status = '$order_status' WHERE order_id='$order_id' AND product_id='$product_id' ";
$query3 = mysql_query($sql3) or die("Can't Query3");

$sql4 = " UPDATE customize_shirt_measurements SET shirt_status = '$order_status' WHERE order_id='$order_id' AND product_id='$product_id' ";
$query4 = mysql_query($sql4) or die("Can't Query4");

} else if ($order_product == "suits") {

$sql2 = " UPDATE customize_order SET order_status = '$order_status' WHERE order_id='$order_id' AND product_id='$product_id' ";
$query2 = mysql_query($sql2) or die("Can't Query2");

$sql3 = " UPDATE customize_suits_design SET suits_status = '$order_status' WHERE order_id='$order_id' AND product_id='$product_id' ";
$query3 = mysql_query($sql3) or die("Can't Query3");

$sql4 = " UPDATE customize_suits_measurements SET suits_status = '$order_status' WHERE order_id='$order_id' AND product_id='$product_id' ";
$query4 = mysql_query($sql4) or die("Can't Query4");	
		
} else if ($order_product == "suits_with_vest") {

$sql2 = " UPDATE customize_order SET order_status = '$order_status' WHERE order_id='$order_id' AND product_id='$product_id' ";
$query2 = mysql_query($sql2) or die("Can't Query2");

$sql3 = " UPDATE customize_suits_with_vest_design SET suits_with_vest_status = '$order_status' WHERE order_id='$order_id' AND product_id='$product_id' ";
$query3 = mysql_query($sql3) or die("Can't Query3");

$sql4 = " UPDATE customize_suits_with_vest_measurements SET suits_with_vest_status = '$order_status' WHERE order_id='$order_id' AND product_id='$product_id' ";
$query4 = mysql_query($sql4) or die("Can't Query4");

} else if ($order_product == "ties") {

$sql2 = " UPDATE customize_order SET order_status = '$order_status' WHERE order_id='$order_id' AND product_id='$product_id' ";
$query2 = mysql_query($sql2) or die("Can't Query2");

$sql4 = " UPDATE customize_ties_design SET ties_status = '$order_status' WHERE order_id='$order_id' AND product_id='$product_id' ";
$query4 = mysql_query($sql4) or die("Can't Query4");
	
} else if ($order_product == "tuxedo_jacket") {

$sql2 = " UPDATE customize_order SET order_status = '$order_status' WHERE order_id='$order_id' AND product_id='$product_id' ";
$query2 = mysql_query($sql2) or die("Can't Query2");

$sql3 = " UPDATE customize_tuxedo_jacket_design SET tuxedo_jacket_status = '$order_status' WHERE order_id='$order_id' AND product_id='$product_id' ";
$query3 = mysql_query($sql3) or die("Can't Query3");

$sql4 = " UPDATE customize_tuxedo_jacket_measurements SET tuxedo_jacket_status = '$order_status' WHERE order_id='$order_id' AND product_id='$product_id' ";
$query4 = mysql_query($sql4) or die("Can't Query4");	
	
} else if ($order_product == "tuxedo_suits") {
	
$sql2 = " UPDATE customize_order SET order_status = '$order_status' WHERE order_id='$order_id' AND product_id='$product_id' ";
$query2 = mysql_query($sql2) or die("Can't Query2");

$sql3 = " UPDATE customize_tuxedo_suits_design SET tuxedo_suits_status = '$order_status' WHERE order_id='$order_id' AND product_id='$product_id' ";
$query3 = mysql_query($sql3) or die("Can't Query3");

$sql4 = " UPDATE customize_tuxedo_suits_measurements SET tuxedo_suits_status = '$order_status' WHERE order_id='$order_id' AND product_id='$product_id' ";
$query4 = mysql_query($sql4) or die("Can't Query4");	
	
} else if ($order_product == "tuxedo_with_vest") {

$sql2 = " UPDATE customize_order SET order_status = '$order_status' WHERE order_id='$order_id' AND product_id='$product_id' ";
$query2 = mysql_query($sql2) or die("Can't Query2");

$sql3 = " UPDATE customize_tuxedo_with_vest_design SET tuxedo_with_vest_status = '$order_status' WHERE order_id='$order_id' AND product_id='$product_id' ";
$query3 = mysql_query($sql3) or die("Can't Query3");

$sql4 = " UPDATE customize_tuxedo_with_vest_measurements SET tuxedo_with_vest_status = '$order_status' WHERE order_id='$order_id' AND product_id='$product_id' ";
$query4 = mysql_query($sql4) or die("Can't Query4");

} else if ($order_product == "vest") {

$sql2 = " UPDATE customize_order SET order_status = '$order_status' WHERE order_id='$order_id' AND product_id='$product_id' ";
$query2 = mysql_query($sql2) or die("Can't Query2");

$sql3 = " UPDATE customize_vest_design SET vest_status = '$order_status' WHERE order_id='$order_id' AND product_id='$product_id' ";
$query3 = mysql_query($sql3) or die("Can't Query3");

$sql4 = " UPDATE customize_vest_measurements SET vest_status = '$order_status' WHERE order_id='$order_id' AND product_id='$product_id' ";
$query4 = mysql_query($sql4) or die("Can't Query4");		
	
}

if($query4) {
	
	echo " <script language='javascript'> window.location='../../../cart/single/index.php?orderid=".$order_id."'; </script> ";
	
}

mysql_close();
?>