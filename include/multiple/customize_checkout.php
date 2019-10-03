<?
if(empty($_POST['ip'])){
	$_POST['ip'] = $_SERVER['REMOTE_ADDR'];
}
require('./phpip2country.class.php');

include('../../connect.php');

$sql =	" SELECT MAX(id) FROM customize_checkout ";
$query = mysql_db_query($dbname, $sql) or die("Can't Query");
$row = mysql_fetch_array($query);

$id = $row[0] + 1 ;
$checkout_company = $_POST["checkout_company"];
$checkout_name = $_POST["checkout_name"];
$checkout_lastname = $_POST["checkout_lastname"];
$checkout_address = $_POST["checkout_address"];
$checkout_city = $_POST["checkout_city"];
$checkout_state = $_POST["checkout_state"];
$checkout_country = $_POST["checkout_country"];
$checkout_zipcode = $_POST["checkout_zipcode"];
$checkout_email = $_POST["checkout_email"];
$checkout_phone = $_POST["checkout_phone"];
$checkout_message = $_POST["checkout_message"];
$checkout_my_price = $_POST["checkout_my_price"];
$checkout_price = $_POST["checkout_price"];
$checkout_orderid = $_POST["checkout_orderid"];
$checkout_status_save = save;
$checkout_status_process = Pending;
$checkout_status_payment = Unpaid;
$checkout_date = date("m/d/Y");
$checkout_time = date("H:i:s");
$checkout_ip = $_POST['ip'];
$checkout_status = T;

$sql1 = " UPDATE customize_checkout SET checkout_company = '$checkout_company', checkout_name = '$checkout_name', checkout_lastname = '$checkout_lastname', checkout_address = '$checkout_address', checkout_city = '$checkout_city', checkout_state = '$checkout_state', checkout_country = '$checkout_country', checkout_zipcode = '$checkout_zipcode', checkout_email = '$checkout_email', checkout_phone = '$checkout_phone', checkout_message = '$checkout_message', checkout_my_price = '$checkout_my_price', checkout_price = '$checkout_price', checkout_orderid = '$checkout_orderid', checkout_date = '$checkout_date', checkout_time = '$checkout_time', checkout_ip = '$checkout_ip', checkout_status = '$checkout_status' WHERE checkout_orderid = '$checkout_orderid' ";
$query1 = mysql_query($sql1) or die("Can't Query1");

$sql2 = " SELECT COUNT(order_product) FROM customize_order WHERE order_id = '$checkout_orderid' AND order_product = 'jacket' AND order_status = 'T' ";
$query2 = mysql_query($sql2) or die("Can't Query2");
$row2 = mysql_fetch_array($query2);
$product_jacket = $row2['COUNT(order_product)'];

$sql3 = " SELECT COUNT(order_product) FROM customize_order WHERE order_id = '$checkout_orderid' AND order_product = 'jeans' AND order_status = 'T' ";
$query3 = mysql_query($sql3) or die("Can't Query3");
$row3 = mysql_fetch_array($query3);
$product_jeans = $row3['COUNT(order_product)'];

$sql4 = " SELECT COUNT(order_product) FROM customize_order WHERE order_id = '$checkout_orderid' AND order_product = 'overcoat' AND order_status = 'T' ";
$query4 = mysql_query($sql4) or die("Can't Query4");
$row4 = mysql_fetch_array($query4);
$product_overcoat = $row4['COUNT(order_product)'];

$sql5 = " SELECT COUNT(order_product) FROM customize_order WHERE order_id = '$checkout_orderid' AND order_product = 'pants' AND order_status = 'T' ";
$query5 = mysql_query($sql5) or die("Can't Query5");
$row5 = mysql_fetch_array($query5);
$product_pants = $row5['COUNT(order_product)'];

$sql6 = " SELECT COUNT(order_product) FROM customize_order WHERE order_id = '$checkout_orderid' AND order_product = 'shirt' AND order_status = 'T' ";
$query6 = mysql_query($sql6) or die("Can't Query6");
$row6 = mysql_fetch_array($query6);
$product_shirt = $row6['COUNT(order_product)'];

$sql7 = " SELECT COUNT(order_product) FROM customize_order WHERE order_id = '$checkout_orderid' AND order_product = 'suits' AND order_status = 'T' ";
$query7 = mysql_query($sql7) or die("Can't Query7");
$row7 = mysql_fetch_array($query7);
$product_suits = $row7['COUNT(order_product)'];

$sql8 = " SELECT COUNT(order_product) FROM customize_order WHERE order_id = '$checkout_orderid' AND order_product = 'suits_with_vest' AND order_status = 'T' ";
$query8 = mysql_query($sql8) or die("Can't Query8");
$row8 = mysql_fetch_array($query8);
$product_suits_with_vest = $row8['COUNT(order_product)'];

$sql9 = " SELECT COUNT(order_product) FROM customize_order WHERE order_id = '$checkout_orderid' AND order_product = 'ties' AND order_status = 'T' ";
$query9 = mysql_query($sql9) or die("Can't Query9");
$row9 = mysql_fetch_array($query9);
$product_ties = $row9['COUNT(order_product)'];

$sql10 = " SELECT COUNT(order_product) FROM customize_order WHERE order_id = '$checkout_orderid' AND order_product = 'tuxedo_jacket' AND order_status = 'T' ";
$query10 = mysql_query($sql10) or die("Can't Query10");
$row10 = mysql_fetch_array($query10);
$product_tuxedo_jacket = $row10['COUNT(order_product)'];

$sql11 = " SELECT COUNT(order_product) FROM customize_order WHERE order_id = '$checkout_orderid' AND order_product = 'tuxedo_suits' AND order_status = 'T' ";
$query11 = mysql_query($sql11) or die("Can't Query11");
$row11 = mysql_fetch_array($query11);
$product_tuxedo_suits = $row11['COUNT(order_product)'];

$sql12 = " SELECT COUNT(order_product) FROM customize_order WHERE order_id = '$checkout_orderid' AND order_product = 'tuxedo_with_vest' AND order_status = 'T' ";
$query12 = mysql_query($sql12) or die("Can't Query12");
$row12 = mysql_fetch_array($query12);
$product_tuxedo_with_vest = $row12['COUNT(order_product)'];

$sql13 = " SELECT COUNT(order_product) FROM customize_order WHERE order_id = '$checkout_orderid' AND order_product = 'vest' AND order_status = 'T' ";
$query13 = mysql_query($sql13) or die("Can't Query13");
$row13 = mysql_fetch_array($query13);
$product_vest = $row13['COUNT(order_product)'];

$sql14 = " UPDATE customize_checkout SET checkout_jacket = '$product_jacket', checkout_jeans = '$product_jeans', checkout_overcoat = '$product_overcoat', checkout_pants = '$product_pants', checkout_shirt = '$product_shirt', checkout_suits = '$product_suits', checkout_suits_with_vest = '$product_suits_with_vest', checkout_ties = '$product_ties', checkout_tuxedo_jacket = '$product_tuxedo_jacket', checkout_tuxedo_suits = '$product_tuxedo_suits', checkout_tuxedo_with_vest = '$product_tuxedo_with_vest', checkout_vest = '$product_vest' WHERE checkout_orderid = '$checkout_orderid' ";
$query14 = mysql_query($sql14) or die("Can't Query14");

$sql15 = " UPDATE customize_checkout SET checkout_status_save = '$checkout_status_save', checkout_status_process = '$checkout_status_process', checkout_status_payment = '$checkout_status_payment' WHERE checkout_orderid = '$checkout_orderid' ";
$query15 = mysql_query($sql15) or die("Can't Query15");

$sql16 = " SELECT MAX(checkout_number) FROM customize_checkout WHERE checkout_company = '$checkout_company' ";
$query16 = mysql_db_query($dbname, $sql16) or die("Can't Query16");
$row16 = mysql_fetch_array($query16);

if ($row16['MAX(checkout_number)'] == "0") {
	
	$sql17 = " SELECT reseller_order_number FROM admin_reseller WHERE reseller_company = '$checkout_company' AND reseller_type = 'Admin' ";
	$query17 = mysql_db_query($dbname, $sql17) or die("Can't Query17");
	$row17 = mysql_fetch_array($query17);
	$product_number = $row17[0];
	
} else if ($row16['MAX(checkout_number)'] != "0") {
	
	$sql17 = " SELECT MAX(checkout_number) FROM customize_checkout WHERE checkout_company = '$checkout_company' ";
	$query17 = mysql_db_query($dbname, $sql17) or die("Can't Query17");
	$row17 = mysql_fetch_array($query17);
	$product_number = $row17[0] + 1 ;
	
}

$sql18 = " SELECT reseller_order_font FROM admin_reseller WHERE reseller_company = '$checkout_company' AND reseller_type = 'Admin' ";
$query18 = mysql_query($sql18) or die("Can't Query18");
$row18 = mysql_fetch_array($query18);
$product_reseller = $row18['reseller_order_font'];

$sql19 = " UPDATE customize_checkout SET checkout_invoice = '$product_reseller', checkout_number = '$product_number' WHERE checkout_orderid = '$checkout_orderid' ";
$query19 = mysql_query($sql19) or die("Can't Query19");

if($query19) {
	
	echo " <script language='javascript'> window.location='../../placeorder/multiple/'; </script> ";
	
}

mysql_close();
?>