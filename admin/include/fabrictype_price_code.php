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
$id_41 = $_POST["id_41"];
$price_41 = $_POST["price_41"];
$id_42 = $_POST["id_42"];
$price_42 = $_POST["price_42"];
$id_43 = $_POST["id_43"];
$price_43 = $_POST["price_43"];
$id_44 = $_POST["id_44"];
$price_44 = $_POST["price_44"];
$id_45 = $_POST["id_45"];
$price_45 = $_POST["price_45"];
$id_46 = $_POST["id_46"];
$price_46 = $_POST["price_46"];
$id_47 = $_POST["id_47"];
$price_47 = $_POST["price_47"];
$id_48 = $_POST["id_48"];
$price_48 = $_POST["price_48"];
$id_49 = $_POST["id_49"];
$price_49 = $_POST["price_49"];
$id_50 = $_POST["id_50"];
$price_50 = $_POST["price_50"];
$id_51 = $_POST["id_51"];
$price_51 = $_POST["price_51"];
$id_52 = $_POST["id_52"];
$price_52 = $_POST["price_52"];
$id_53 = $_POST["id_53"];
$price_53 = $_POST["price_53"];
$id_54 = $_POST["id_54"];
$price_54 = $_POST["price_54"];
$id_55 = $_POST["id_55"];
$price_55 = $_POST["price_55"];
$id_56 = $_POST["id_56"];
$price_56 = $_POST["price_56"];
$id_57 = $_POST["id_57"];
$price_57 = $_POST["price_57"];
$id_58 = $_POST["id_58"];
$price_58 = $_POST["price_58"];
$id_59 = $_POST["id_59"];
$price_59 = $_POST["price_59"];
$id_60 = $_POST["id_60"];
$price_60 = $_POST["price_60"];
$id_61 = $_POST["id_61"];
$price_61 = $_POST["price_61"];
$id_62 = $_POST["id_62"];
$price_62 = $_POST["price_62"];
$id_63 = $_POST["id_63"];
$price_63 = $_POST["price_63"];
$id_64 = $_POST["id_64"];
$price_64 = $_POST["price_64"];
$id_65 = $_POST["id_65"];
$price_65 = $_POST["price_65"];
$id_66 = $_POST["id_66"];
$price_66 = $_POST["price_66"];
$id_67 = $_POST["id_67"];
$price_67 = $_POST["price_67"];
$id_68 = $_POST["id_68"];
$price_68 = $_POST["price_68"];
$id_69 = $_POST["id_69"];
$price_69 = $_POST["price_69"];
$id_70 = $_POST["id_70"];
$price_70 = $_POST["price_70"];
$id_71 = $_POST["id_71"];
$price_71 = $_POST["price_71"];
$id_72 = $_POST["id_72"];
$price_72 = $_POST["price_72"];
$id_73 = $_POST["id_73"];
$price_73 = $_POST["price_73"];
$id_74 = $_POST["id_74"];
$price_74 = $_POST["price_74"];
$id_75 = $_POST["id_75"];
$price_75 = $_POST["price_75"];
$id_76 = $_POST["id_76"];
$price_76 = $_POST["price_76"];
$id_77 = $_POST["id_77"];
$price_77 = $_POST["price_77"];
$id_78 = $_POST["id_78"];
$price_78 = $_POST["price_78"];
$id_79 = $_POST["id_79"];
$price_79 = $_POST["price_79"];
$id_80 = $_POST["id_80"];
$price_80 = $_POST["price_80"];
$id_81 = $_POST["id_81"];
$price_81 = $_POST["price_81"];
$id_82 = $_POST["id_82"];
$price_82 = $_POST["price_82"];
$id_83 = $_POST["id_83"];
$price_83 = $_POST["price_83"];
$id_84 = $_POST["id_84"];
$price_84 = $_POST["price_84"];
$id_85 = $_POST["id_85"];
$price_85 = $_POST["price_85"];
$id_86 = $_POST["id_86"];
$price_86 = $_POST["price_86"];
$id_87 = $_POST["id_87"];
$price_87 = $_POST["price_87"];
$id_88 = $_POST["id_88"];
$price_88 = $_POST["price_88"];
$id_89 = $_POST["id_89"];
$price_89 = $_POST["price_89"];
$id_90 = $_POST["id_90"];
$price_90 = $_POST["price_90"];
$id_91 = $_POST["id_91"];
$price_91 = $_POST["price_91"];
$id_92 = $_POST["id_92"];
$price_92 = $_POST["price_92"];
$id_93 = $_POST["id_93"];
$price_93 = $_POST["price_93"];
$id_94 = $_POST["id_94"];
$price_94 = $_POST["price_94"];
$id_95 = $_POST["id_95"];
$price_95 = $_POST["price_95"];
$id_96 = $_POST["id_96"];
$price_96 = $_POST["price_96"];
$id_97 = $_POST["id_97"];
$price_97 = $_POST["price_97"];
$id_98 = $_POST["id_98"];
$price_98 = $_POST["price_98"];
$id_99 = $_POST["id_99"];
$price_99 = $_POST["price_99"];

$sql1 = " UPDATE admin_fabrictype SET `fabrictype_".$reseller_id."` = '".$price_1."' WHERE id = '$id_1' ";
$query1 = mysql_query($sql1) or die("Can't Query1");

$sql2 = " UPDATE admin_fabrictype SET `fabrictype_".$reseller_id."` = '".$price_2."' WHERE id = '$id_2' ";
$query2 = mysql_query($sql2) or die("Can't Query2");

$sql3 = " UPDATE admin_fabrictype SET `fabrictype_".$reseller_id."` = '".$price_3."' WHERE id = '$id_3' ";
$query3 = mysql_query($sql3) or die("Can't Query3");

$sql4 = " UPDATE admin_fabrictype SET `fabrictype_".$reseller_id."` = '".$price_4."' WHERE id = '$id_4' ";
$query4 = mysql_query($sql4) or die("Can't Query4");

$sql5 = " UPDATE admin_fabrictype SET `fabrictype_".$reseller_id."` = '".$price_5."' WHERE id = '$id_5' ";
$query5 = mysql_query($sql5) or die("Can't Query5");

$sql6 = " UPDATE admin_fabrictype SET `fabrictype_".$reseller_id."` = '".$price_6."' WHERE id = '$id_6' ";
$query6 = mysql_query($sql6) or die("Can't Query6");

$sql7 = " UPDATE admin_fabrictype SET `fabrictype_".$reseller_id."` = '".$price_7."' WHERE id = '$id_7' ";
$query7 = mysql_query($sql7) or die("Can't Query7");

$sql8 = " UPDATE admin_fabrictype SET `fabrictype_".$reseller_id."` = '".$price_8."' WHERE id = '$id_8' ";
$query8 = mysql_query($sql8) or die("Can't Query8");

$sql9 = " UPDATE admin_fabrictype SET `fabrictype_".$reseller_id."` = '".$price_9."' WHERE id = '$id_9' ";
$query9 = mysql_query($sql9) or die("Can't Query9");

$sql10 = " UPDATE admin_fabrictype SET `fabrictype_".$reseller_id."` = '".$price_10."' WHERE id = '$id_10' ";
$query10 = mysql_query($sql10) or die("Can't Query10");

$sql11 = " UPDATE admin_fabrictype SET `fabrictype_".$reseller_id."` = '".$price_11."' WHERE id = '$id_11' ";
$query11 = mysql_query($sql11) or die("Can't Query11");

$sql12 = " UPDATE admin_fabrictype SET `fabrictype_".$reseller_id."` = '".$price_12."' WHERE id = '$id_12' ";
$query12 = mysql_query($sql12) or die("Can't Query12");

$sql13 = " UPDATE admin_fabrictype SET `fabrictype_".$reseller_id."` = '".$price_13."' WHERE id = '$id_13' ";
$query13 = mysql_query($sql13) or die("Can't Query13");

$sql14 = " UPDATE admin_fabrictype SET `fabrictype_".$reseller_id."` = '".$price_14."' WHERE id = '$id_14' ";
$query14 = mysql_query($sql14) or die("Can't Query14");

$sql15 = " UPDATE admin_fabrictype SET `fabrictype_".$reseller_id."` = '".$price_15."' WHERE id = '$id_15' ";
$query15 = mysql_query($sql15) or die("Can't Query15");

$sql16 = " UPDATE admin_fabrictype SET `fabrictype_".$reseller_id."` = '".$price_16."' WHERE id = '$id_16' ";
$query16 = mysql_query($sql16) or die("Can't Query16");

$sql17 = " UPDATE admin_fabrictype SET `fabrictype_".$reseller_id."` = '".$price_17."' WHERE id = '$id_17' ";
$query17 = mysql_query($sql17) or die("Can't Query17");

$sql18 = " UPDATE admin_fabrictype SET `fabrictype_".$reseller_id."` = '".$price_18."' WHERE id = '$id_18' ";
$query18 = mysql_query($sql18) or die("Can't Query18");

$sql19 = " UPDATE admin_fabrictype SET `fabrictype_".$reseller_id."` = '".$price_19."' WHERE id = '$id_19' ";
$query19 = mysql_query($sql19) or die("Can't Query19");

$sql20 = " UPDATE admin_fabrictype SET `fabrictype_".$reseller_id."` = '".$price_20."' WHERE id = '$id_20' ";
$query20 = mysql_query($sql20) or die("Can't Query20");

$sql21 = " UPDATE admin_fabrictype SET `fabrictype_".$reseller_id."` = '".$price_21."' WHERE id = '$id_21' ";
$query21 = mysql_query($sql21) or die("Can't Query21");

$sql22 = " UPDATE admin_fabrictype SET `fabrictype_".$reseller_id."` = '".$price_22."' WHERE id = '$id_22' ";
$query22 = mysql_query($sql22) or die("Can't Query22");

$sql23 = " UPDATE admin_fabrictype SET `fabrictype_".$reseller_id."` = '".$price_23."' WHERE id = '$id_23' ";
$query23 = mysql_query($sql23) or die("Can't Query23");

$sql24 = " UPDATE admin_fabrictype SET `fabrictype_".$reseller_id."` = '".$price_24."' WHERE id = '$id_24' ";
$query24 = mysql_query($sql24) or die("Can't Query24");

$sql25 = " UPDATE admin_fabrictype SET `fabrictype_".$reseller_id."` = '".$price_25."' WHERE id = '$id_25' ";
$query25 = mysql_query($sql25) or die("Can't Query25");

$sql26 = " UPDATE admin_fabrictype SET `fabrictype_".$reseller_id."` = '".$price_26."' WHERE id = '$id_26' ";
$query26 = mysql_query($sql26) or die("Can't Query26");

$sql27 = " UPDATE admin_fabrictype SET `fabrictype_".$reseller_id."` = '".$price_27."' WHERE id = '$id_27' ";
$query27 = mysql_query($sql27) or die("Can't Query27");

$sql28 = " UPDATE admin_fabrictype SET `fabrictype_".$reseller_id."` = '".$price_28."' WHERE id = '$id_28' ";
$query28 = mysql_query($sql28) or die("Can't Query28");

$sql29 = " UPDATE admin_fabrictype SET `fabrictype_".$reseller_id."` = '".$price_29."' WHERE id = '$id_29' ";
$query29 = mysql_query($sql29) or die("Can't Query29");

$sql30 = " UPDATE admin_fabrictype SET `fabrictype_".$reseller_id."` = '".$price_30."' WHERE id = '$id_30' ";
$query30 = mysql_query($sql30) or die("Can't Query30");

$sql31 = " UPDATE admin_fabrictype SET `fabrictype_".$reseller_id."` = '".$price_31."' WHERE id = '$id_31' ";
$query31 = mysql_query($sql31) or die("Can't Query31");

$sql32 = " UPDATE admin_fabrictype SET `fabrictype_".$reseller_id."` = '".$price_32."' WHERE id = '$id_32' ";
$query32 = mysql_query($sql32) or die("Can't Query32");

$sql33 = " UPDATE admin_fabrictype SET `fabrictype_".$reseller_id."` = '".$price_33."' WHERE id = '$id_33' ";
$query33 = mysql_query($sql33) or die("Can't Query33");

$sql34 = " UPDATE admin_fabrictype SET `fabrictype_".$reseller_id."` = '".$price_34."' WHERE id = '$id_34' ";
$query34 = mysql_query($sql34) or die("Can't Query34");

$sql35 = " UPDATE admin_fabrictype SET `fabrictype_".$reseller_id."` = '".$price_35."' WHERE id = '$id_35' ";
$query35 = mysql_query($sql35) or die("Can't Query35");

$sql36 = " UPDATE admin_fabrictype SET `fabrictype_".$reseller_id."` = '".$price_36."' WHERE id = '$id_36' ";
$query36 = mysql_query($sql36) or die("Can't Query36");

$sql37 = " UPDATE admin_fabrictype SET `fabrictype_".$reseller_id."` = '".$price_37."' WHERE id = '$id_37' ";
$query37 = mysql_query($sql37) or die("Can't Query37");

$sql38 = " UPDATE admin_fabrictype SET `fabrictype_".$reseller_id."` = '".$price_38."' WHERE id = '$id_38' ";
$query38 = mysql_query($sql38) or die("Can't Query38");

$sql39 = " UPDATE admin_fabrictype SET `fabrictype_".$reseller_id."` = '".$price_39."' WHERE id = '$id_39' ";
$query39 = mysql_query($sql39) or die("Can't Query39");

$sql40 = " UPDATE admin_fabrictype SET `fabrictype_".$reseller_id."` = '".$price_40."' WHERE id = '$id_40' ";
$query40 = mysql_query($sql40) or die("Can't Query40");

$sql41 = " UPDATE admin_fabrictype SET `fabrictype_".$reseller_id."` = '".$price_41."' WHERE id = '$id_41' ";
$query41 = mysql_query($sql41) or die("Can't Query41");

$sql42 = " UPDATE admin_fabrictype SET `fabrictype_".$reseller_id."` = '".$price_42."' WHERE id = '$id_42' ";
$query42 = mysql_query($sql42) or die("Can't Query42");

$sql43 = " UPDATE admin_fabrictype SET `fabrictype_".$reseller_id."` = '".$price_43."' WHERE id = '$id_43' ";
$query43 = mysql_query($sql43) or die("Can't Query43");

$sql44 = " UPDATE admin_fabrictype SET `fabrictype_".$reseller_id."` = '".$price_44."' WHERE id = '$id_44' ";
$query44 = mysql_query($sql44) or die("Can't Query44");

$sql45 = " UPDATE admin_fabrictype SET `fabrictype_".$reseller_id."` = '".$price_45."' WHERE id = '$id_45' ";
$query45 = mysql_query($sql45) or die("Can't Query45");

$sql46 = " UPDATE admin_fabrictype SET `fabrictype_".$reseller_id."` = '".$price_46."' WHERE id = '$id_46' ";
$query46 = mysql_query($sql46) or die("Can't Query46");

$sql47 = " UPDATE admin_fabrictype SET `fabrictype_".$reseller_id."` = '".$price_47."' WHERE id = '$id_47' ";
$query47 = mysql_query($sql47) or die("Can't Query47");

$sql48 = " UPDATE admin_fabrictype SET `fabrictype_".$reseller_id."` = '".$price_48."' WHERE id = '$id_48' ";
$query48 = mysql_query($sql48) or die("Can't Query48");

$sql49 = " UPDATE admin_fabrictype SET `fabrictype_".$reseller_id."` = '".$price_49."' WHERE id = '$id_49' ";
$query49 = mysql_query($sql49) or die("Can't Query49");

$sql50 = " UPDATE admin_fabrictype SET `fabrictype_".$reseller_id."` = '".$price_50."' WHERE id = '$id_50' ";
$query50 = mysql_query($sql50) or die("Can't Query50");

$sql51 = " UPDATE admin_fabrictype SET `fabrictype_".$reseller_id."` = '".$price_51."' WHERE id = '$id_51' ";
$query51 = mysql_query($sql51) or die("Can't Query51");

$sql52 = " UPDATE admin_fabrictype SET `fabrictype_".$reseller_id."` = '".$price_52."' WHERE id = '$id_52' ";
$query52 = mysql_query($sql52) or die("Can't Query52");

$sql53 = " UPDATE admin_fabrictype SET `fabrictype_".$reseller_id."` = '".$price_53."' WHERE id = '$id_53' ";
$query53 = mysql_query($sql53) or die("Can't Query53");

$sql54 = " UPDATE admin_fabrictype SET `fabrictype_".$reseller_id."` = '".$price_54."' WHERE id = '$id_54' ";
$query54 = mysql_query($sql54) or die("Can't Query54");

$sql55 = " UPDATE admin_fabrictype SET `fabrictype_".$reseller_id."` = '".$price_55."' WHERE id = '$id_55' ";
$query55 = mysql_query($sql55) or die("Can't Query55");

$sql56 = " UPDATE admin_fabrictype SET `fabrictype_".$reseller_id."` = '".$price_56."' WHERE id = '$id_56' ";
$query56 = mysql_query($sql56) or die("Can't Query56");

$sql57 = " UPDATE admin_fabrictype SET `fabrictype_".$reseller_id."` = '".$price_57."' WHERE id = '$id_57' ";
$query57 = mysql_query($sql57) or die("Can't Query57");

$sql58 = " UPDATE admin_fabrictype SET `fabrictype_".$reseller_id."` = '".$price_58."' WHERE id = '$id_58' ";
$query58 = mysql_query($sql58) or die("Can't Query58");

$sql59 = " UPDATE admin_fabrictype SET `fabrictype_".$reseller_id."` = '".$price_59."' WHERE id = '$id_59' ";
$query59 = mysql_query($sql59) or die("Can't Query59");

$sql60 = " UPDATE admin_fabrictype SET `fabrictype_".$reseller_id."` = '".$price_60."' WHERE id = '$id_60' ";
$query60 = mysql_query($sql60) or die("Can't Query60");

$sql61 = " UPDATE admin_fabrictype SET `fabrictype_".$reseller_id."` = '".$price_61."' WHERE id = '$id_61' ";
$query61 = mysql_query($sql61) or die("Can't Query61");

$sql62 = " UPDATE admin_fabrictype SET `fabrictype_".$reseller_id."` = '".$price_62."' WHERE id = '$id_62' ";
$query62 = mysql_query($sql62) or die("Can't Query62");

$sql63 = " UPDATE admin_fabrictype SET `fabrictype_".$reseller_id."` = '".$price_63."' WHERE id = '$id_63' ";
$query63 = mysql_query($sql63) or die("Can't Query63");

$sql64 = " UPDATE admin_fabrictype SET `fabrictype_".$reseller_id."` = '".$price_64."' WHERE id = '$id_64' ";
$query64 = mysql_query($sql64) or die("Can't Query64");

$sql65 = " UPDATE admin_fabrictype SET `fabrictype_".$reseller_id."` = '".$price_65."' WHERE id = '$id_65' ";
$query65 = mysql_query($sql65) or die("Can't Query65");

$sql66 = " UPDATE admin_fabrictype SET `fabrictype_".$reseller_id."` = '".$price_66."' WHERE id = '$id_66' ";
$query66 = mysql_query($sql66) or die("Can't Query66");

$sql67 = " UPDATE admin_fabrictype SET `fabrictype_".$reseller_id."` = '".$price_67."' WHERE id = '$id_67' ";
$query67 = mysql_query($sql67) or die("Can't Query67");

$sql68 = " UPDATE admin_fabrictype SET `fabrictype_".$reseller_id."` = '".$price_68."' WHERE id = '$id_68' ";
$query68 = mysql_query($sql68) or die("Can't Query68");

$sql70 = " UPDATE admin_fabrictype SET `fabrictype_".$reseller_id."` = '".$price_70."' WHERE id = '$id_70' ";
$query70 = mysql_query($sql70) or die("Can't Query70");

$sql71 = " UPDATE admin_fabrictype SET `fabrictype_".$reseller_id."` = '".$price_71."' WHERE id = '$id_71' ";
$query71 = mysql_query($sql71) or die("Can't Query71");

$sql72 = " UPDATE admin_fabrictype SET `fabrictype_".$reseller_id."` = '".$price_72."' WHERE id = '$id_72' ";
$query72 = mysql_query($sql72) or die("Can't Query72");

$sql73 = " UPDATE admin_fabrictype SET `fabrictype_".$reseller_id."` = '".$price_73."' WHERE id = '$id_73' ";
$query73 = mysql_query($sql73) or die("Can't Query73");

$sql74 = " UPDATE admin_fabrictype SET `fabrictype_".$reseller_id."` = '".$price_74."' WHERE id = '$id_74' ";
$query74 = mysql_query($sql74) or die("Can't Query74");

$sql75 = " UPDATE admin_fabrictype SET `fabrictype_".$reseller_id."` = '".$price_75."' WHERE id = '$id_75' ";
$query75 = mysql_query($sql75) or die("Can't Query75");

$sql76 = " UPDATE admin_fabrictype SET `fabrictype_".$reseller_id."` = '".$price_76."' WHERE id = '$id_76' ";
$query76 = mysql_query($sql76) or die("Can't Query76");

$sql77 = " UPDATE admin_fabrictype SET `fabrictype_".$reseller_id."` = '".$price_77."' WHERE id = '$id_77' ";
$query77 = mysql_query($sql77) or die("Can't Query77");

$sql78 = " UPDATE admin_fabrictype SET `fabrictype_".$reseller_id."` = '".$price_78."' WHERE id = '$id_78' ";
$query78 = mysql_query($sql78) or die("Can't Query78");

$sql79 = " UPDATE admin_fabrictype SET `fabrictype_".$reseller_id."` = '".$price_79."' WHERE id = '$id_79' ";
$query79 = mysql_query($sql79) or die("Can't Query79");

$sql80 = " UPDATE admin_fabrictype SET `fabrictype_".$reseller_id."` = '".$price_80."' WHERE id = '$id_80' ";
$query80 = mysql_query($sql80) or die("Can't Query80");

$sql81 = " UPDATE admin_fabrictype SET `fabrictype_".$reseller_id."` = '".$price_81."' WHERE id = '$id_81' ";
$query81 = mysql_query($sql81) or die("Can't Query81");

$sql82 = " UPDATE admin_fabrictype SET `fabrictype_".$reseller_id."` = '".$price_82."' WHERE id = '$id_82' ";
$query82 = mysql_query($sql82) or die("Can't Query82");

$sql83 = " UPDATE admin_fabrictype SET `fabrictype_".$reseller_id."` = '".$price_83."' WHERE id = '$id_83' ";
$query83 = mysql_query($sql83) or die("Can't Query83");

$sql84 = " UPDATE admin_fabrictype SET `fabrictype_".$reseller_id."` = '".$price_84."' WHERE id = '$id_84' ";
$query84 = mysql_query($sql84) or die("Can't Query84");

$sql85 = " UPDATE admin_fabrictype SET `fabrictype_".$reseller_id."` = '".$price_85."' WHERE id = '$id_85' ";
$query85 = mysql_query($sql85) or die("Can't Query85");

$sql86 = " UPDATE admin_fabrictype SET `fabrictype_".$reseller_id."` = '".$price_86."' WHERE id = '$id_86' ";
$query86 = mysql_query($sql86) or die("Can't Query86");

$sql87 = " UPDATE admin_fabrictype SET `fabrictype_".$reseller_id."` = '".$price_87."' WHERE id = '$id_87' ";
$query87 = mysql_query($sql87) or die("Can't Query87");

$sql88 = " UPDATE admin_fabrictype SET `fabrictype_".$reseller_id."` = '".$price_88."' WHERE id = '$id_88' ";
$query88 = mysql_query($sql88) or die("Can't Query88");

$sql89 = " UPDATE admin_fabrictype SET `fabrictype_".$reseller_id."` = '".$price_89."' WHERE id = '$id_89' ";
$query89 = mysql_query($sql89) or die("Can't Query89");

$sql90 = " UPDATE admin_fabrictype SET `fabrictype_".$reseller_id."` = '".$price_90."' WHERE id = '$id_90' ";
$query90 = mysql_query($sql90) or die("Can't Query90");

$sql91 = " UPDATE admin_fabrictype SET `fabrictype_".$reseller_id."` = '".$price_91."' WHERE id = '$id_91' ";
$query91 = mysql_query($sql91) or die("Can't Query91");

$sql92 = " UPDATE admin_fabrictype SET `fabrictype_".$reseller_id."` = '".$price_92."' WHERE id = '$id_92' ";
$query92 = mysql_query($sql92) or die("Can't Query92");

$sql93 = " UPDATE admin_fabrictype SET `fabrictype_".$reseller_id."` = '".$price_93."' WHERE id = '$id_93' ";
$query93 = mysql_query($sql93) or die("Can't Query93");

$sql94 = " UPDATE admin_fabrictype SET `fabrictype_".$reseller_id."` = '".$price_94."' WHERE id = '$id_94' ";
$query94 = mysql_query($sql94) or die("Can't Query94");

$sql95 = " UPDATE admin_fabrictype SET `fabrictype_".$reseller_id."` = '".$price_95."' WHERE id = '$id_95' ";
$query95 = mysql_query($sql95) or die("Can't Query95");

$sql96 = " UPDATE admin_fabrictype SET `fabrictype_".$reseller_id."` = '".$price_96."' WHERE id = '$id_96' ";
$query96 = mysql_query($sql96) or die("Can't Query96");

$sql97 = " UPDATE admin_fabrictype SET `fabrictype_".$reseller_id."` = '".$price_97."' WHERE id = '$id_97' ";
$query97 = mysql_query($sql97) or die("Can't Query97");

$sql98 = " UPDATE admin_fabrictype SET `fabrictype_".$reseller_id."` = '".$price_98."' WHERE id = '$id_98' ";
$query98 = mysql_query($sql98) or die("Can't Query98");

$sql99 = " UPDATE admin_fabrictype SET `fabrictype_".$reseller_id."` = '".$price_99."' WHERE id = '$id_99' ";
$query99 = mysql_query($sql99) or die("Can't Query99");

if($query99) {
	
	echo " <script language='javascript'> window.location='../reseller/fabrictype_price.php?id=".$reseller_id."'; </script> ";
	
}

mysql_close();
?>