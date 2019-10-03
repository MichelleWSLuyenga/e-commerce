<?
if(empty($_POST['ip'])){
	$_POST['ip'] = $_SERVER['REMOTE_ADDR'];
}
require('./phpip2country.class.php');

include('../../connect.php');

$reseller_id = $_POST["reseller_id"];

$id_1 = $_POST["id_1"];
$price_1 = $_POST["price_1"];
$id_2 = $_POST["id_2"];
$price_2 = $_POST["price_2"];
$id_3 = $_POST["id_3"];
$price_3 = $_POST["price_3"];
$id_4 = $_POST["id_4"];
$price_4 = $_POST["price_4"];
$id_5 = $_POST["id_5"];
$price_5 = $_POST["price_5"];
$id_6 = $_POST["id_6"];
$price_6 = $_POST["price_6"];
$id_7 = $_POST["id_7"];
$price_7 = $_POST["price_7"];
$id_8 = $_POST["id_8"];
$price_8 = $_POST["price_8"];
$id_9 = $_POST["id_9"];
$price_9 = $_POST["price_9"];
$id_10 = $_POST["id_10"];
$price_10 = $_POST["price_10"];
$id_11 = $_POST["id_11"];
$price_11 = $_POST["price_11"];
$id_12 = $_POST["id_12"];
$price_12 = $_POST["price_12"];
$id_13 = $_POST["id_13"];
$price_13 = $_POST["price_13"];
$id_14 = $_POST["id_14"];
$price_14 = $_POST["price_14"];
$id_15 = $_POST["id_15"];
$price_15 = $_POST["price_15"];
$id_16 = $_POST["id_16"];
$price_16 = $_POST["price_16"];
$id_17 = $_POST["id_17"];
$price_17 = $_POST["price_17"];
$id_18 = $_POST["id_18"];
$price_18 = $_POST["price_18"];
$id_19 = $_POST["id_19"];
$price_19 = $_POST["price_19"];
$id_20 = $_POST["id_20"];
$price_20 = $_POST["price_20"];
$id_21 = $_POST["id_21"];
$price_21 = $_POST["price_21"];
$id_22 = $_POST["id_22"];
$price_22 = $_POST["price_22"];
$id_23 = $_POST["id_23"];
$price_23 = $_POST["price_23"];
$id_24 = $_POST["id_24"];
$price_24 = $_POST["price_24"];
$id_25 = $_POST["id_25"];
$price_25 = $_POST["price_25"];
$id_26 = $_POST["id_26"];
$price_26 = $_POST["price_26"];
$id_27 = $_POST["id_27"];
$price_27 = $_POST["price_27"];
$id_28 = $_POST["id_28"];
$price_28 = $_POST["price_28"];
$id_29 = $_POST["id_29"];
$price_29 = $_POST["price_29"];
$id_30 = $_POST["id_30"];
$price_30 = $_POST["price_30"];
$id_31 = $_POST["id_31"];
$price_31 = $_POST["price_31"];
$id_32 = $_POST["id_32"];
$price_32 = $_POST["price_32"];
$id_33 = $_POST["id_33"];
$price_33 = $_POST["price_33"];
$id_34 = $_POST["id_34"];
$price_34 = $_POST["price_34"];
$id_35 = $_POST["id_35"];
$price_35 = $_POST["price_35"];
$id_36 = $_POST["id_36"];
$price_36 = $_POST["price_36"];
$id_37 = $_POST["id_37"];
$price_37 = $_POST["price_37"];
$id_38 = $_POST["id_38"];
$price_38 = $_POST["price_38"];
$id_39 = $_POST["id_39"];
$price_39 = $_POST["price_39"];
$id_40 = $_POST["id_40"];
$price_40 = $_POST["price_40"];

$sql1 = " UPDATE admin_extraoptions SET `extra_".$reseller_id."` = '".$price_1."' WHERE id = '$id_1' ";
$query1 = mysql_query($sql1) or die("Can't Query1");

$sql2 = " UPDATE admin_extraoptions SET `extra_".$reseller_id."` = '".$price_2."' WHERE id = '$id_2' ";
$query2 = mysql_query($sql2) or die("Can't Query2");

$sql3 = " UPDATE admin_extraoptions SET `extra_".$reseller_id."` = '".$price_3."' WHERE id = '$id_3' ";
$query3 = mysql_query($sql3) or die("Can't Query3");

$sql4 = " UPDATE admin_extraoptions SET `extra_".$reseller_id."` = '".$price_4."' WHERE id = '$id_4' ";
$query4 = mysql_query($sql4) or die("Can't Query4");

$sql5 = " UPDATE admin_extraoptions SET `extra_".$reseller_id."` = '".$price_5."' WHERE id = '$id_5' ";
$query5 = mysql_query($sql5) or die("Can't Query5");

$sql6 = " UPDATE admin_extraoptions SET `extra_".$reseller_id."` = '".$price_6."' WHERE id = '$id_6' ";
$query6 = mysql_query($sql6) or die("Can't Query6");

$sql7 = " UPDATE admin_extraoptions SET `extra_".$reseller_id."` = '".$price_7."' WHERE id = '$id_7' ";
$query7 = mysql_query($sql7) or die("Can't Query7");

$sql8 = " UPDATE admin_extraoptions SET `extra_".$reseller_id."` = '".$price_8."' WHERE id = '$id_8' ";
$query8 = mysql_query($sql8) or die("Can't Query8");

$sql9 = " UPDATE admin_extraoptions SET `extra_".$reseller_id."` = '".$price_9."' WHERE id = '$id_9' ";
$query9 = mysql_query($sql9) or die("Can't Query9");

$sql10 = " UPDATE admin_extraoptions SET `extra_".$reseller_id."` = '".$price_10."' WHERE id = '$id_10' ";
$query10 = mysql_query($sql10) or die("Can't Query10");

$sql11 = " UPDATE admin_extraoptions SET `extra_".$reseller_id."` = '".$price_11."' WHERE id = '$id_11' ";
$query11 = mysql_query($sql11) or die("Can't Query11");

$sql12 = " UPDATE admin_extraoptions SET `extra_".$reseller_id."` = '".$price_12."' WHERE id = '$id_12' ";
$query12 = mysql_query($sql12) or die("Can't Query12");

$sql13 = " UPDATE admin_extraoptions SET `extra_".$reseller_id."` = '".$price_13."' WHERE id = '$id_13' ";
$query13 = mysql_query($sql13) or die("Can't Query13");

$sql14 = " UPDATE admin_extraoptions SET `extra_".$reseller_id."` = '".$price_14."' WHERE id = '$id_14' ";
$query14 = mysql_query($sql14) or die("Can't Query14");

$sql15 = " UPDATE admin_extraoptions SET `extra_".$reseller_id."` = '".$price_15."' WHERE id = '$id_15' ";
$query15 = mysql_query($sql15) or die("Can't Query15");

$sql16 = " UPDATE admin_extraoptions SET `extra_".$reseller_id."` = '".$price_16."' WHERE id = '$id_16' ";
$query16 = mysql_query($sql16) or die("Can't Query16");

$sql17 = " UPDATE admin_extraoptions SET `extra_".$reseller_id."` = '".$price_17."' WHERE id = '$id_17' ";
$query17 = mysql_query($sql17) or die("Can't Query17");

$sql18 = " UPDATE admin_extraoptions SET `extra_".$reseller_id."` = '".$price_18."' WHERE id = '$id_18' ";
$query18 = mysql_query($sql18) or die("Can't Query18");

$sql19 = " UPDATE admin_extraoptions SET `extra_".$reseller_id."` = '".$price_19."' WHERE id = '$id_19' ";
$query19 = mysql_query($sql19) or die("Can't Query19");

$sql20 = " UPDATE admin_extraoptions SET `extra_".$reseller_id."` = '".$price_20."' WHERE id = '$id_20' ";
$query20 = mysql_query($sql20) or die("Can't Query20");

$sql21 = " UPDATE admin_extraoptions SET `extra_".$reseller_id."` = '".$price_21."' WHERE id = '$id_21' ";
$query21 = mysql_query($sql21) or die("Can't Query21");

$sql22 = " UPDATE admin_extraoptions SET `extra_".$reseller_id."` = '".$price_22."' WHERE id = '$id_22' ";
$query22 = mysql_query($sql22) or die("Can't Query22");

$sql23 = " UPDATE admin_extraoptions SET `extra_".$reseller_id."` = '".$price_23."' WHERE id = '$id_23' ";
$query23 = mysql_query($sql23) or die("Can't Query23");

$sql24 = " UPDATE admin_extraoptions SET `extra_".$reseller_id."` = '".$price_24."' WHERE id = '$id_24' ";
$query24 = mysql_query($sql24) or die("Can't Query24");

$sql25 = " UPDATE admin_extraoptions SET `extra_".$reseller_id."` = '".$price_25."' WHERE id = '$id_25' ";
$query25 = mysql_query($sql25) or die("Can't Query25");

$sql26 = " UPDATE admin_extraoptions SET `extra_".$reseller_id."` = '".$price_26."' WHERE id = '$id_26' ";
$query26 = mysql_query($sql26) or die("Can't Query26");

$sql27 = " UPDATE admin_extraoptions SET `extra_".$reseller_id."` = '".$price_27."' WHERE id = '$id_27' ";
$query27 = mysql_query($sql27) or die("Can't Query27");

$sql28 = " UPDATE admin_extraoptions SET `extra_".$reseller_id."` = '".$price_28."' WHERE id = '$id_28' ";
$query28 = mysql_query($sql28) or die("Can't Query28");

$sql29 = " UPDATE admin_extraoptions SET `extra_".$reseller_id."` = '".$price_29."' WHERE id = '$id_29' ";
$query29 = mysql_query($sql29) or die("Can't Query29");

$sql30 = " UPDATE admin_extraoptions SET `extra_".$reseller_id."` = '".$price_30."' WHERE id = '$id_30' ";
$query30 = mysql_query($sql30) or die("Can't Query30");

$sql31 = " UPDATE admin_extraoptions SET `extra_".$reseller_id."` = '".$price_31."' WHERE id = '$id_31' ";
$query31 = mysql_query($sql31) or die("Can't Query31");

$sql32 = " UPDATE admin_extraoptions SET `extra_".$reseller_id."` = '".$price_32."' WHERE id = '$id_32' ";
$query32 = mysql_query($sql32) or die("Can't Query32");

$sql33 = " UPDATE admin_extraoptions SET `extra_".$reseller_id."` = '".$price_33."' WHERE id = '$id_33' ";
$query33 = mysql_query($sql33) or die("Can't Query33");

$sql34 = " UPDATE admin_extraoptions SET `extra_".$reseller_id."` = '".$price_34."' WHERE id = '$id_34' ";
$query34 = mysql_query($sql34) or die("Can't Query34");

$sql35 = " UPDATE admin_extraoptions SET `extra_".$reseller_id."` = '".$price_35."' WHERE id = '$id_35' ";
$query35 = mysql_query($sql35) or die("Can't Query35");

$sql36 = " UPDATE admin_extraoptions SET `extra_".$reseller_id."` = '".$price_36."' WHERE id = '$id_36' ";
$query36 = mysql_query($sql36) or die("Can't Query36");

$sql37 = " UPDATE admin_extraoptions SET `extra_".$reseller_id."` = '".$price_37."' WHERE id = '$id_37' ";
$query37 = mysql_query($sql37) or die("Can't Query37");

$sql38 = " UPDATE admin_extraoptions SET `extra_".$reseller_id."` = '".$price_38."' WHERE id = '$id_38' ";
$query38 = mysql_query($sql38) or die("Can't Query38");

$sql39 = " UPDATE admin_extraoptions SET `extra_".$reseller_id."` = '".$price_39."' WHERE id = '$id_39' ";
$query39 = mysql_query($sql39) or die("Can't Query39");

$sql40 = " UPDATE admin_extraoptions SET `extra_".$reseller_id."` = '".$price_40."' WHERE id = '$id_40' ";
$query40 = mysql_query($sql40) or die("Can't Query40");

if($query40) {
	
	echo " <script language='javascript'> window.location='../reseller/extraoption_price.php?id=".$reseller_id."'; </script> ";
	
}

mysql_close();
?>