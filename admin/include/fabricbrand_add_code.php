<?
if(empty($_POST['ip'])){
	$_POST['ip'] = $_SERVER['REMOTE_ADDR'];
}
require('./phpip2country.class.php');

include('../../connect.php');

$fabricbrand_product_1 = Jacket;
$fabricbrand_product_2 = Jeans;
$fabricbrand_product_3 = Overcoat;
$fabricbrand_product_4 = Pants;
$fabricbrand_product_5 = Shirt;
$fabricbrand_product_6 = Suits;
$fabricbrand_product_7 = Ties;
$fabricbrand_product_8 = Vest;
$fabricbrand_product_9 = Lining;
$fabricbrand_name = $_POST["fabricbrand_name"];
$fabricbrand_category = $_POST["fabricbrand_category"]
$fabricbrand_admin = $_POST["fabricbrand_admin"];
$fabricbrand_date = date("m/d/Y");
$fabricbrand_time = date("H:i:s");
$fabricbrand_ip = $_POST['ip'];
$fabricbrand_status = T;

$sql1 =	" SELECT MAX(id) FROM admin_fabricbrand";
$query1 = mysql_db_query($dbname, $sql1) or die("Can't Query1");
$row1 = mysql_fetch_array($query1);
$id_1 = $row1[0] + 1 ;

$sql2 = " INSERT INTO admin_fabricbrand (id, fabricbrand_id, fabricbrand_product, fabricbrand_name, fabricbrand_category, fabricbrand_admin, fabricbrand_date, fabricbrand_time, fabricbrand_ip, fabricbrand_status) VALUES ('".$id_1."', '".$id_1."', '".$fabricbrand_product_1."', '".$fabricbrand_name."', '".$fabricbrand_admin."', '".$fabricbrand_date."', '".$fabricbrand_time."', '".$fabricbrand_ip."', '".$fabricbrand_status."') ";
$query2 = mysql_query($sql2) or die("Can't Query2");

$sql3 =	" SELECT MAX(id) FROM admin_fabricbrand";
$query3 = mysql_db_query($dbname, $sql3) or die("Can't Query3");
$row3 = mysql_fetch_array($query3);
$id_2 = $row3[0] + 1 ;

$sql4 = " INSERT INTO admin_fabricbrand (id, fabricbrand_id, fabricbrand_product, fabricbrand_name, fabricbrand_category, fabricbrand_admin, fabricbrand_date, fabricbrand_time, fabricbrand_ip, fabricbrand_status) VALUES ('".$id_2."', '".$id_1."', '".$fabricbrand_product_2."', '".$fabricbrand_name."', '".$fabricbrand_admin."', '".$fabricbrand_date."', '".$fabricbrand_time."', '".$fabricbrand_ip."', '".$fabricbrand_status."') ";
$query4 = mysql_query($sql4) or die("Can't Query4");

$sql5 =	" SELECT MAX(id) FROM admin_fabricbrand";
$query5 = mysql_db_query($dbname, $sql5) or die("Can't Query5");
$row5 = mysql_fetch_array($query5);
$id_3 = $row5[0] + 1 ;

$sql6 = " INSERT INTO admin_fabricbrand (id, fabricbrand_id, fabricbrand_product, fabricbrand_name, fabricbrand_category, fabricbrand_admin, fabricbrand_date, fabricbrand_time, fabricbrand_ip, fabricbrand_status) VALUES ('".$id_3."', '".$id_1."', '".$fabricbrand_product_3."', '".$fabricbrand_name."', '".$fabricbrand_admin."', '".$fabricbrand_date."', '".$fabricbrand_time."', '".$fabricbrand_ip."', '".$fabricbrand_status."') ";
$query6 = mysql_query($sql6) or die("Can't Query6");

$sql7 =	" SELECT MAX(id) FROM admin_fabricbrand";
$query7 = mysql_db_query($dbname, $sql7) or die("Can't Query7");
$row7 = mysql_fetch_array($query7);
$id_4 = $row7[0] + 1 ;

$sql8 = " INSERT INTO admin_fabricbrand (id, fabricbrand_id, fabricbrand_product, fabricbrand_name, fabricbrand_category, fabricbrand_admin, fabricbrand_date, fabricbrand_time, fabricbrand_ip, fabricbrand_status) VALUES ('".$id_4."', '".$id_1."', '".$fabricbrand_product_4."', '".$fabricbrand_name."', '".$fabricbrand_admin."', '".$fabricbrand_date."', '".$fabricbrand_time."', '".$fabricbrand_ip."', '".$fabricbrand_status."') ";
$query8 = mysql_query($sql8) or die("Can't Query8");

$sql9 =	" SELECT MAX(id) FROM admin_fabricbrand";
$query9 = mysql_db_query($dbname, $sql9) or die("Can't Query9");
$row9 = mysql_fetch_array($query9);
$id_5 = $row9[0] + 1 ;

$sql10 = " INSERT INTO admin_fabricbrand (id, fabricbrand_id, fabricbrand_product, fabricbrand_name, fabricbrand_category, fabricbrand_admin, fabricbrand_date, fabricbrand_time, fabricbrand_ip, fabricbrand_status) VALUES ('".$id_5."', '".$id_1."', '".$fabricbrand_product_5."', '".$fabricbrand_name."', '".$fabricbrand_admin."', '".$fabricbrand_date."', '".$fabricbrand_time."', '".$fabricbrand_ip."', '".$fabricbrand_status."') ";
$query10 = mysql_query($sql10) or die("Can't Query10");

$sql11 = " SELECT MAX(id) FROM admin_fabricbrand";
$query11 = mysql_db_query($dbname, $sql11) or die("Can't Query11");
$row11 = mysql_fetch_array($query11);
$id_6 = $row11[0] + 1 ;

$sql12 = " INSERT INTO admin_fabricbrand (id, fabricbrand_id, fabricbrand_product, fabricbrand_name, fabricbrand_category, fabricbrand_admin, fabricbrand_date, fabricbrand_time, fabricbrand_ip, fabricbrand_status) VALUES ('".$id_6."', '".$id_1."', '".$fabricbrand_product_6."', '".$fabricbrand_name."', '".$fabricbrand_admin."', '".$fabricbrand_date."', '".$fabricbrand_time."', '".$fabricbrand_ip."', '".$fabricbrand_status."') ";
$query12 = mysql_query($sql12) or die("Can't Query12");

$sql13 = " SELECT MAX(id) FROM admin_fabricbrand";
$query13 = mysql_db_query($dbname, $sql13) or die("Can't Query13");
$row13 = mysql_fetch_array($query13);
$id_7 = $row13[0] + 1 ;

$sql14 = " INSERT INTO admin_fabricbrand (id, fabricbrand_id, fabricbrand_product, fabricbrand_name, fabricbrand_category, fabricbrand_admin, fabricbrand_date, fabricbrand_time, fabricbrand_ip, fabricbrand_status) VALUES ('".$id_7."', '".$id_1."', '".$fabricbrand_product_7."', '".$fabricbrand_name."', '".$fabricbrand_admin."', '".$fabricbrand_date."', '".$fabricbrand_time."', '".$fabricbrand_ip."', '".$fabricbrand_status."') ";
$query14 = mysql_query($sql14) or die("Can't Query14");

$sql15 = " SELECT MAX(id) FROM admin_fabricbrand";
$query15 = mysql_db_query($dbname, $sql15) or die("Can't Query15");
$row15 = mysql_fetch_array($query15);
$id_8 = $row15[0] + 1 ;

$sql16 = " INSERT INTO admin_fabricbrand (id, fabricbrand_id, fabricbrand_product, fabricbrand_name, fabricbrand_category, fabricbrand_admin, fabricbrand_date, fabricbrand_time, fabricbrand_ip, fabricbrand_status) VALUES ('".$id_8."', '".$id_1."', '".$fabricbrand_product_8."', '".$fabricbrand_name."', '".$fabricbrand_admin."', '".$fabricbrand_date."', '".$fabricbrand_time."', '".$fabricbrand_ip."', '".$fabricbrand_status."') ";
$query16 = mysql_query($sql16) or die("Can't Query16");

$sql17 = " SELECT MAX(id) FROM admin_fabricbrand";
$query17 = mysql_db_query($dbname, $sql17) or die("Can't Query17");
$row17 = mysql_fetch_array($query17);
$id_9 = $row17[0] + 1 ;

$sql18 = " INSERT INTO admin_fabricbrand (id, fabricbrand_id, fabricbrand_product, fabricbrand_name, fabricbrand_category, fabricbrand_admin, fabricbrand_date, fabricbrand_time, fabricbrand_ip, fabricbrand_status) VALUES ('".$id_9."', '".$id_1."', '".$fabricbrand_product_9."', '".$fabricbrand_name."', '".$fabricbrand_admin."', '".$fabricbrand_date."', '".$fabricbrand_time."', '".$fabricbrand_ip."', '".$fabricbrand_status."') ";
$query18 = mysql_query($sql18) or die("Can't Query18");

if($query18) {

	echo " <script language='javascript'> window.location='../fabricbrand/'; </script> ";

}

mysql_close();
?>
