<?
include('../../connect.php');
$orderid = $_GET["order_id"];
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=order_invoice_$orderid.xls");
?>
<?
$user = $_GET["user"];
$sql0 =	" SELECT * FROM admin_reseller WHERE reseller_company = '$user' AND reseller_type = 'Admin' ";
$query0 = mysql_db_query($dbname, $sql0) or die("Can't Query0");
$row0 = mysql_fetch_array($query0);
$id_user = $row0["id"];
$country = $row0['reseller_country'];

$sqlcountry1 =	" SELECT * FROM admin_country WHERE country_name = '$country' ";
$querycountry1 = mysql_db_query($dbname, $sqlcountry1) or die("Can't QueryCountry1");
$rowcountry1 = mysql_fetch_array($querycountry1);
$currency = $rowcountry1['country_currency'];
?>
<html>
<body>
<?
	$strSQL1 = " SELECT * FROM customize_order WHERE order_id = '$orderid' AND order_status = 'T' ORDER BY id ASC "; 
	$objQuery1 = mysql_query($strSQL1) or die ("Error Query [".$strSQL1."]");
?>
<table width="1000" border="0"  align="center" cellpadding="0" cellspacing="0" style="border:1px solid black">
  <tr>
    <th width="600" height="40" valign="middle" align="center" style="border:1px solid black; vertical-align:middle;"><div style="font-size:14px;"><strong>PRODUCT</strong></div></th>
    <th width="400" height="40" valign="middle" align="center" style="border:1px solid black; vertical-align:middle;"><div style="font-size:14px;"><strong>Price</strong></div></th>
  </tr>
  <?
$strSQL1 = " SELECT * FROM customize_order WHERE order_id = '$orderid' AND order_status = 'T' ORDER BY id ASC "; 
$objQuery1 = mysql_query($strSQL1) or die ("Error Query [".$strSQL1."]");
?>
  <? while($objResult1 = mysql_fetch_array($objQuery1)) { ?>
  <tr>
    <td width="600" height="40" valign="middle" align="left" style="border:1px solid black; vertical-align:middle;"><? 
	$fabric = $objResult1["order_fabric_no"]; 
	$order_product = $objResult1["order_product"];
	?>
      <? if ($order_product == "jacket") { ?>
      <?
    $strSQL2 = " SELECT * FROM admin_fabrics_jacket WHERE fabricno = '$fabric' "; 
	$objQuery2 = mysql_query($strSQL2) or die ("Error Query [".$strSQL2."]");
	$objResult2 = mysql_fetch_array($objQuery2);
	?>
      <div style="font-size:14px;"><strong>&nbsp;&nbsp;Jacket
        <?=$objResult2["color"]?>
        <?=$objResult2["pattern"]?>
        </strong></div>
      <br>
      <?
				  $order_id = $objResult1["order_id"]; 
				  $product_id = $objResult1["product_id"];
				  $sql00 =	" SELECT * FROM customize_jacket_design WHERE order_id = '$order_id' AND product_id = '$product_id' ";
				  $query00 = mysql_db_query($dbname, $sql00) or die("Can't Query00");
				  $row00 = mysql_fetch_array($query00);
				  ?>
      <table width="600" style="vertical-align:middle;">
        <?
				  $jacket_fabric_no = $objResult2["fabricno"];
                  $sql01 =	" SELECT * FROM admin_fabrics_jacket WHERE fabricno = '$jacket_fabric_no' ";
				  $query01 = mysql_db_query($dbname, $sql01) or die("Can't Query01");
				  $row01 = mysql_fetch_array($query01);
				  $fabrics_type = $row01["type"];
				  $fabrics_brand = $row01["brand"];
				  
				  if ($row01["type"] != '') {
				  $sql001 = " SELECT `fabrictype_".$id_user."` FROM admin_fabrictype WHERE fabrictype_name = '$fabrics_type' AND fabrictype_product = 'Jacket' ";
				  $query001 = mysql_db_query($dbname, $sql001) or die("Can't Query001");
				  $row001 = mysql_fetch_array($query001);
				  $jacket_fabric_price = $row001["0"];
				  
				  } else if ($row01["brand"] != '') {
				  $sql002 = " SELECT `fabricbrand_".$id_user."` FROM admin_fabricbrand WHERE fabricbrand_name = '$fabrics_brand' AND fabricbrand_product = 'Jacket' ";
				  $query002 = mysql_db_query($dbname, $sql002) or die("Can't Query002");
				  $row002 = mysql_fetch_array($query002);	
				  $jacket_fabric_price = $row002["0"];
				  }
				  ?>
        <tr>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">&nbsp;&nbsp;Fabric Number :
              <?=$objResult2["fabricno"]?>
            </div></td>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
              <?=$currency?>
              <?=$jacket_fabric_price?>
            </div></td>
        </tr>
        <?
                  $jacket_jacket_button_number = $row00["jacket_jacket_button_number"];
				  $sql03 = " SELECT price FROM admin_buttons_suits WHERE buttonno = '$jacket_jacket_button_number' ";
				  $query03 = mysql_db_query($dbname, $sql03) or die("Can't Query03");
				  $row03 = mysql_fetch_array($query03);
				  ?>
        <tr>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">&nbsp;&nbsp;Button Number :
              <?=$row00["jacket_jacket_button_number"]?>
            </div></td>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
              <?=$currency?>
              <?=$row03["price"]?>
            </div></td>
        </tr>
        <?
                  $jacket_embroidery_collar_initial_or_name = $row00["jacket_embroidery_collar_initial_or_name"];
				  if ($jacket_embroidery_collar_initial_or_name == "") {
				  $jacket_embroidery_collar_initial_or_name_price = 0;
				  } else if ($jacket_embroidery_collar_initial_or_name != "") {
				  $sqlprice1 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Embroidery Collar Felt' ";
				  $queryprice1 = mysql_db_query($dbname, $sqlprice1) or die("Can't QueryPrice1");
				  $rowprice1 = mysql_fetch_array($queryprice1);
				  $jacket_embroidery_collar_initial_or_name_price_extra = $rowprice1["0"];
				  $jacket_embroidery_collar_initial_or_name_price = $jacket_embroidery_collar_initial_or_name_price_extra;
				  }
				  ?>
        <? if($jacket_embroidery_collar_initial_or_name_price == "0") { ?>
        <? } else if($jacket_embroidery_collar_initial_or_name_price != "0") { ?>
        <tr>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">&nbsp;&nbsp;Embroidery Collar Felt </div></td>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
              <?=$currency?>
              <?=$jacket_embroidery_collar_initial_or_name_price?>
            </div></td>
        </tr>
        <? } ?>
        <?
                  $jacket_brand = $row00["jacket_brand"];
				  if ($jacket_brand == "0") {
				  $jacket_brand_price = 0;
				  } else if ($jacket_brand != "0") {
				  $sqlprice2 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Jacket Branding' ";
				  $queryprice2 = mysql_db_query($dbname, $sqlprice2) or die("Can't QueryPrice2");
				  $rowprice2 = mysql_fetch_array($queryprice2);
				  $jacket_brand_price_extra = $rowprice2["0"];
				  $jacket_brand_price = $jacket_brand_price_extra;
				  }
				  ?>
        <? if($jacket_brand_price == "0") { ?>
        <? } else if($jacket_brand_price != "0") { ?>
        <tr>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">&nbsp;&nbsp;Jacket Branding </div></td>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
              <?=$currency?>
              <?=$jacket_brand_price?>
            </div></td>
        </tr>
        <? } ?>
        <?
                  $jacket_pick_stitch = $row00["jacket_pick_stitch"];
				  $jacket_pick_stitch_sleeves = $row00["jacket_pick_stitch_sleeves"];
				  if ($jacket_pick_stitch == "0") {
				  $jacket_pick_stitch_sleeves_price = 0;
				  } else if ($jacket_pick_stitch == "1" && $jacket_pick_stitch_sleeves != "DEFAULT TONAL") {
				  $sqlprice3 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Sleeves Pick Stitch' ";
				  $queryprice3 = mysql_db_query($dbname, $sqlprice3) or die("Can't QueryPrice3");
				  $rowprice3 = mysql_fetch_array($queryprice3);
				  $jacket_pick_stitch_sleeves_price_extra = $rowprice3["0"];
				  $jacket_pick_stitch_sleeves_price = $jacket_pick_stitch_sleeves_price_extra;
				  }
				  ?>
        <? if($jacket_pick_stitch_sleeves_price == "0") { ?>
        <? } else if($jacket_pick_stitch_sleeves_price != "0") { ?>
        <tr>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">&nbsp;&nbsp;Sleeves Pick Stitch </div></td>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
              <?=$currency?>
              <?=$jacket_pick_stitch_sleeves_price?>
            </div></td>
        </tr>
        <? } ?>
        <?
                  $jacket_pick_stitch = $row00["jacket_pick_stitch"];
				  $jacket_pick_stitch_vest = $row00["jacket_pick_stitch_vest"];
				  if ($jacket_pick_stitch == "0") {
				  $jacket_pick_stitch_vest_price = 0;
				  } else if ($jacket_pick_stitch == "1" && $jacket_pick_stitch_vest != "DEFAULT TONAL") {
				  $sqlprice4 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Vent Pick Stitch' ";
				  $queryprice4 = mysql_db_query($dbname, $sqlprice4) or die("Can't QueryPrice4");
				  $rowprice4 = mysql_fetch_array($queryprice4);
				  $jacket_pick_stitch_vest_price_extra = $rowprice4["0"];
				  $jacket_pick_stitch_vest_price = $jacket_pick_stitch_vest_price_extra;
				  }
				  ?>
        <? if($jacket_pick_stitch_vest_price == "0") { ?>
        <? } else if($jacket_pick_stitch_vest_price != "0") { ?>
        <tr>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">&nbsp;&nbsp;Vent Pick Stitch </div></td>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
              <?=$currency?>
              <?=$jacket_pick_stitch_vest_price?>
            </div></td>
        </tr>
        <? } ?>
        <?
				  $jacket_elbow_patch = $row00["jacket_elbow_patch"];
				  if ($jacket_elbow_patch == "") {
				  $jacket_elbow_patch_price = 0;
				  } else if ($jacket_elbow_patch != "") {
				  $sqlprice5 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Elbow Patch' ";
				  $queryprice5 = mysql_db_query($dbname, $sqlprice5) or die("Can't QueryPrice5");
				  $rowprice5 = mysql_fetch_array($queryprice5);
				  $jacket_elbow_patch_price_extra = $rowprice5["0"];
				  $jacket_elbow_patch_price = $jacket_elbow_patch_price_extra;
				  }
				  ?>
        <? if($jacket_elbow_patch_price == "0") { ?>
        <? } else if($jacket_elbow_patch_price != "0") { ?>
        <tr>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">&nbsp;&nbsp;Elbow Patch </div></td>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
              <?=$currency?>
              <?=$jacket_elbow_patch_price?>
            </div></td>
        </tr>
        <? } ?>
        <?
				  $jacket_canvas = $row00["jacket_canvas"];
				  if ($jacket_canvas != "3") {
				  $jacket_canvas_price = 0;
				  } else if ($jacket_canvas == "3") {
				  $sqlprice6 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Full Canvas' ";
				  $queryprice6 = mysql_db_query($dbname, $sqlprice6) or die("Can't QueryPrice6");
				  $rowprice6 = mysql_fetch_array($queryprice6);
				  $jacket_canvas_price_extra = $rowprice6["0"];
				  $jacket_canvas_price = $jacket_canvas_price_extra;
				  }
				  ?>
        <? if($jacket_canvas_price == "0") { ?>
        <? } else if($jacket_canvas_price != "0") { ?>
        <tr>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">&nbsp;&nbsp;Full Canvas </div></td>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
              <?=$currency?>
              <?=$jacket_canvas_price?>
            </div></td>
        </tr>
        <? } ?>
      </table>
      <? } else if ($order_product == "jeans") { ?>
      <?
    $strSQL2 = " SELECT * FROM admin_fabrics_jeans WHERE fabricno = '$fabric' "; 
	$objQuery2 = mysql_query($strSQL2) or die ("Error Query [".$strSQL2."]");
	$objResult2 = mysql_fetch_array($objQuery2);
	?>
      <div style="font-size:14px;"><strong>&nbsp;&nbsp;Jeans
        <?=$objResult2["color"]?>
        <?=$objResult2["pattern"]?>
        </strong></div>
      <br>
      <?
				  $order_id = $objResult1["order_id"]; 
				  $product_id = $objResult1["product_id"];
				  $sql00 =	" SELECT * FROM customize_jeans_design WHERE order_id = '$order_id' AND product_id = '$product_id' ";
				  $query00 = mysql_db_query($dbname, $sql00) or die("Can't Query00");
				  $row00 = mysql_fetch_array($query00);
				  ?>
      <table width="600" style="vertical-align:middle;">
        <?
				  $jeans_fabric_no = $objResult2["fabricno"];
                  $sql01 =	" SELECT * FROM admin_fabrics_jeans WHERE fabricno = '$jeans_fabric_no' ";
				  $query01 = mysql_db_query($dbname, $sql01) or die("Can't Query01");
				  $row01 = mysql_fetch_array($query01);
				  $fabrics_type = $row01["type"];
				  $fabrics_brand = $row01["brand"];
				  
				  if ($row01["type"] != '') {
				  $sql001 = " SELECT `fabrictype_".$id_user."` FROM admin_fabrictype WHERE fabrictype_name = '$fabrics_type' AND fabrictype_product = 'Jeans' ";
				  $query001 = mysql_db_query($dbname, $sql001) or die("Can't Query001");
				  $row001 = mysql_fetch_array($query001);
				  $jeans_fabric_price = $row001["0"];
				  
				  } else if ($row01["brand"] != '') {
				  $sql002 = " SELECT `fabricbrand_".$id_user."` FROM admin_fabricbrand WHERE fabricbrand_name = '$fabrics_brand' AND fabricbrand_product = 'Jeans' ";
				  $query002 = mysql_db_query($dbname, $sql002) or die("Can't Query002");
				  $row002 = mysql_fetch_array($query002);	
				  $jeans_fabric_price = $row002["0"];
				  }
				  ?>
        <tr>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">&nbsp;&nbsp;Fabric Number :
              <?=$objResult2["fabricno"]?>
            </div></td>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
              <?=$currency?>
              <?=$jeans_fabric_price?>
            </div></td>
        </tr>
      </table>
      <? } else if ($order_product == "overcoat") { ?>
      <?
   $strSQL2 = " SELECT * FROM admin_fabrics_overcoat WHERE fabricno = '$fabric' "; 
   $objQuery2 = mysql_query($strSQL2) or die ("Error Query [".$strSQL2."]");
   $objResult2 = mysql_fetch_array($objQuery2);
   ?>
      <div style="font-size:14px;"><strong>&nbsp;&nbsp;Overcoat
        <?=$objResult2["color"]?>
        <?=$objResult2["pattern"]?>
        </strong></div>
      <br>
      <?
				  $order_id = $objResult1["order_id"]; 
				  $product_id = $objResult1["product_id"];
				  $sql00 =	" SELECT * FROM customize_overcoat_design WHERE order_id = '$order_id' AND product_id = '$product_id' ";
				  $query00 = mysql_db_query($dbname, $sql00) or die("Can't Query00");
				  $row00 = mysql_fetch_array($query00);
				  ?>
      <table width="600" style="vertical-align:middle;">
        <?
				  $overcoat_fabric_no = $objResult2["fabricno"];
                  $sql01 =	" SELECT * FROM admin_fabrics_overcoat WHERE fabricno = '$overcoat_fabric_no' ";
				  $query01 = mysql_db_query($dbname, $sql01) or die("Can't Query01");
				  $row01 = mysql_fetch_array($query01);
				  $fabrics_type = $row01["type"];
				  $fabrics_brand = $row01["brand"];
				  
				  if ($row01["type"] != '') {
				  $sql001 = " SELECT `fabrictype_".$id_user."` FROM admin_fabrictype WHERE fabrictype_name = '$fabrics_type' AND fabrictype_product = 'Overcoat' ";
				  $query001 = mysql_db_query($dbname, $sql001) or die("Can't Query001");
				  $row001 = mysql_fetch_array($query001);
				  $overcoat_fabric_price = $row001["0"];
				  
				  } else if ($row01["brand"] != '') {
				  $sql002 = " SELECT `fabricbrand_".$id_user."` FROM admin_fabricbrand WHERE fabricbrand_name = '$fabrics_brand' AND fabricbrand_product = 'Overcoat' ";
				  $query002 = mysql_db_query($dbname, $sql002) or die("Can't Query002");
				  $row002 = mysql_fetch_array($query002);	
				  $overcoat_fabric_price = $row002["0"];
				  }
				  ?>
        <tr>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">&nbsp;&nbsp;Fabric Number :
              <?=$objResult2["fabricno"]?>
            </div></td>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
              <?=$currency?>
              <?=$overcoat_fabric_price?>
            </div></td>
        </tr>
        <?
                  $overcoat_overcoat_button_number = $row00["overcoat_overcoat_button_number"];
				  $sql03 = " SELECT price FROM admin_buttons_overcoat WHERE buttonno = '$overcoat_overcoat_button_number' ";
				  $query03 = mysql_db_query($dbname, $sql03) or die("Can't Query03");
				  $row03 = mysql_fetch_array($query03);
				  ?>
        <tr>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">&nbsp;&nbsp;Button Number :
              <?=$row00["overcoat_overcoat_button_number"]?>
            </div></td>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
              <?=$currency?>
              <?=$row03["price"]?>
            </div></td>
        </tr>
        <?
                  $overcoat_sleeve_button = $row00["overcoat_sleeve_button"];
				  if ($overcoat_sleeve_button == "1") {
				  $overcoat_sleeve_button_price = 0;
				  } else if ($overcoat_sleeve_button == "2") {
				  $sqlprice1 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Sleeve Button Tape' ";
				  $queryprice1 = mysql_db_query($dbname, $sqlprice1) or die("Can't QueryPrice1");
				  $rowprice1 = mysql_fetch_array($queryprice1);
				  $overcoat_sleeve_button_price_extra = $rowprice1["0"];
				  $overcoat_sleeve_button_price = $overcoat_sleeve_button_price_extra;
				  }
				  ?>
        <? if($overcoat_sleeve_button_price == "0") { ?>
        <? } else if($overcoat_sleeve_button_price != "0") { ?>
        <tr>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">&nbsp;&nbsp;Sleeve Button Tape </div></td>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
              <?=$currency?>
              <?=$overcoat_sleeve_button_price?>
            </div></td>
        </tr>
        <? } ?>
        <?
                  $overcoat_apaulettes = $row00["overcoat_apaulettes"];
				  if ($overcoat_apaulettes != "0") {
				  $overcoat_apaulettes_price = 0;
				  } else if ($overcoat_apaulettes == "0") {
				  $sqlprice2 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Shoulder Apaulettes' ";
				  $queryprice2 = mysql_db_query($dbname, $sqlprice2) or die("Can't QueryPrice2");
				  $rowprice2 = mysql_fetch_array($queryprice2);
				  $overcoat_apaulettes_price_extra = $rowprice2["0"];
				  $overcoat_apaulettes_price = $overcoat_apaulettes_price_extra;
				  }
				  ?>
        <? if($overcoat_apaulettes_price == "0") { ?>
        <? } else if($overcoat_apaulettes_price != "0") { ?>
        <tr>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">&nbsp;&nbsp;Shoulder Apaulettes </div></td>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
              <?=$currency?>
              <?=$overcoat_apaulettes_price?>
            </div></td>
        </tr>
        <? } ?>
        <?
				  $overcoat_belt = $row00["overcoat_belt"];
				  if ($overcoat_belt != "1") {
				  $overcoat_belt_loose_price = 0;
			      } else if ($overcoat_belt == "1") {
				  $sqlprice3 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Belt Loose' ";
				  $queryprice3 = mysql_db_query($dbname, $sqlprice3) or die("Can't QueryPrice3");
				  $rowprice3 = mysql_fetch_array($queryprice3);
				  $overcoat_belt_loose_price_extra = $rowprice3["0"];
				  $overcoat_belt_loose_price = $overcoat_belt_loose_price_extra;
				  }
				  ?>
        <? if($overcoat_belt_loose_price == "0") { ?>
        <? } else if($overcoat_belt_loose_price != "0") { ?>
        <tr>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">&nbsp;&nbsp;Belt Loose </div></td>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
              <?=$currency?>
              <?=$overcoat_belt_loose_price?>
            </div></td>
        </tr>
        <? } ?>
        <?
				  $overcoat_belt = $row00["overcoat_belt"];
				  if ($overcoat_belt != "2") {
				  $overcoat_belt_sewed_price = 0;
				  } else if ($overcoat_belt == "2") {
				  $sqlprice4 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Belt Sewed' ";
				  $queryprice4 = mysql_db_query($dbname, $sqlprice4) or die("Can't QueryPrice4");
				  $rowprice4 = mysql_fetch_array($queryprice4);
				  $overcoat_belt_sewed_price_extra = $rowprice4["0"];
				  $overcoat_belt_sewed_price = $overcoat_belt_sewed_price_extra;
				  }
				  ?>
        <? if($overcoat_belt_sewed_price == "0") { ?>
        <? } else if($overcoat_belt_sewed_price != "0") { ?>
        <tr>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">&nbsp;&nbsp;Belt Sewed </div></td>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
              <?=$currency?>
              <?=$overcoat_belt_sewed_price?>
            </div></td>
        </tr>
        <? } ?>
      </table>
      <? } else if ($order_product == "pants") { ?>
      <?
   $strSQL2 = " SELECT * FROM admin_fabrics_pants WHERE fabricno = '$fabric' "; 
   $objQuery2 = mysql_query($strSQL2) or die ("Error Query [".$strSQL2."]");
   $objResult2 = mysql_fetch_array($objQuery2);
   ?>
      <div style="font-size:14px;"><strong>&nbsp;&nbsp;Pants
        <?=$objResult2["color"]?>
        <?=$objResult2["pattern"]?>
        </strong></div>
      <br>
      <?
				  $order_id = $objResult1["order_id"]; 
				  $product_id = $objResult1["product_id"];
				  $sql00 =	" SELECT * FROM customize_pants_design WHERE order_id = '$order_id' AND product_id = '$product_id' ";
				  $query00 = mysql_db_query($dbname, $sql00) or die("Can't Query00");
				  $row00 = mysql_fetch_array($query00);
				  ?>
      <table width="600" style="vertical-align:middle;">
        <?
				  $pants_fabric_no = $objResult2["fabricno"];
                  $sql01 =	" SELECT * FROM admin_fabrics_pants WHERE fabricno = '$pants_fabric_no' ";
				  $query01 = mysql_db_query($dbname, $sql01) or die("Can't Query01");
				  $row01 = mysql_fetch_array($query01);
				  $fabrics_type = $row01["type"];
				  $fabrics_brand = $row01["brand"];
				  
				  if ($row01["type"] != '') {
				  $sql001 = " SELECT `fabrictype_".$id_user."` FROM admin_fabrictype WHERE fabrictype_name = '$fabrics_type' AND fabrictype_product = 'Pants' ";
				  $query001 = mysql_db_query($dbname, $sql001) or die("Can't Query001");
				  $row001 = mysql_fetch_array($query001);
				  $pants_fabric_price = $row001["0"];
				  
				  } else if ($row01["brand"] != '') {
				  $sql002 = " SELECT `fabricbrand_".$id_user."` FROM admin_fabricbrand WHERE fabricbrand_name = '$fabrics_brand' AND fabricbrand_product = 'Pants' ";
				  $query002 = mysql_db_query($dbname, $sql002) or die("Can't Query002");
				  $row002 = mysql_fetch_array($query002);	
				  $pants_fabric_price = $row002["0"];
				  }
				  ?>
        <tr>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">&nbsp;&nbsp;Fabric Number :
              <?=$objResult2["fabricno"]?>
            </div></td>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
              <?=$currency?>
              <?=$pants_fabric_price?>
            </div></td>
        </tr>
        <?
                  $pants_pants_button_number = $row00["pants_pants_button_number"];
				  $sql03 = " SELECT price FROM admin_buttons_suits WHERE buttonno = '$pants_pants_button_number' ";
				  $query03 = mysql_db_query($dbname, $sql03) or die("Can't Query03");
				  $row03 = mysql_fetch_array($query03);
				  ?>
        <tr>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">&nbsp;&nbsp;Button Number :
              <?=$row00["pants_pants_button_number"]?>
            </div></td>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
              <?=$currency?>
              <?=$row03["price"]?>
            </div></td>
        </tr>
        <?
                  $pants_coin_pocket_inside = $row00["pants_coin_pocket_inside"];
				  if ($pants_coin_pocket_inside != "1") {
				  $pants_coin_pocket_inside_price = 0;
				  } else if ($pants_coin_pocket_inside == "1") {
				  $sqlprice1 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Coin Pocket Inside' ";
				  $queryprice1 = mysql_db_query($dbname, $sqlprice1) or die("Can't QueryPrice1");
				  $rowprice1 = mysql_fetch_array($queryprice1);
				  $pants_coin_pocket_inside_price_extra = $rowprice1["0"];
				  $pants_coin_pocket_inside_price = $pants_coin_pocket_inside_price_extra;
				  }
				  ?>
        <? if($pants_coin_pocket_inside_price == "0") { ?>
        <? } else if($pants_coin_pocket_inside_price != "0") { ?>
        <tr>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">&nbsp;&nbsp;Coin Pocket Inside </div></td>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
              <?=$currency?>
              <?=$pants_coin_pocket_inside_price?>
            </div></td>
        </tr>
        <? } ?>
        <?
                  $pants_suspender_buttons_inside = $row00["pants_suspender_buttons_inside"];
				  if ($pants_suspender_buttons_inside != "1") {
				  $pants_suspender_buttons_inside_price = 0;
				  } else if ($pants_suspender_buttons_inside == "1") {
				  $sqlprice2 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Suspender Buttons Inside' ";
				  $queryprice2 = mysql_db_query($dbname, $sqlprice2) or die("Can't QueryPrice2");
				  $rowprice2 = mysql_fetch_array($queryprice2);
				  $pants_suspender_buttons_inside_price_extra = $rowprice2["0"];
				  $pants_suspender_buttons_inside_price = $pants_suspender_buttons_inside_price_extra;
			      }
				  ?>
        <? if($pants_suspender_buttons_inside_price == "0") { ?>
        <? } else if($pants_suspender_buttons_inside_price != "0") { ?>
        <tr>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">&nbsp;&nbsp;Suspender Buttons Inside </div></td>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
              <?=$currency?>
              <?=$pants_suspender_buttons_inside_price?>
            </div></td>
        </tr>
        <? } ?>
        <?
				  $pants_split_tabs_back = $row00["pants_split_tabs_back"];
				  if ($pants_split_tabs_back != "1") {
				  $pants_split_tabs_back_price = 0;
				  } else if ($pants_split_tabs_back == "1") {
				  $sqlprice3 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Split Tabs Back' ";
				  $queryprice3 = mysql_db_query($dbname, $sqlprice3) or die("Can't QueryPrice3");
				  $rowprice3 = mysql_fetch_array($queryprice3);
				  $pants_split_tabs_back_price_extra = $rowprice3["0"];
				  $pants_split_tabs_back_price = $pants_split_tabs_back_price_extra;
				  }
				  ?>
        <? if($pants_split_tabs_back_price == "0") { ?>
        <? } else if($pants_split_tabs_back_price != "0") { ?>
        <tr>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">&nbsp;&nbsp;Split Tabs Back </div></td>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
              <?=$currency?>
              <?=$pants_split_tabs_back_price?>
            </div></td>
        </tr>
        <? } ?>
        <?
				  $pants_tuxedo_satin = $row00["pants_tuxedo_satin"];
				  if ($pants_tuxedo_satin != "1") {
				  $pants_tuxedo_satin_price = 0;
				  } else if ($pants_tuxedo_satin == "1") {
				  $sqlprice4 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Tuxedo Satin on Side' ";
				  $queryprice4 = mysql_db_query($dbname, $sqlprice4) or die("Can't QueryPrice4");
				  $rowprice4 = mysql_fetch_array($queryprice4);
				  $pants_tuxedo_satin_price_extra = $rowprice4["0"];
				  $pants_tuxedo_satin_price = $pants_tuxedo_satin_price_extra;
				  }
				  ?>
        <? if($pants_tuxedo_satin_price == "0") { ?>
        <? } else if($pants_tuxedo_satin_price != "0") { ?>
        <tr>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">&nbsp;&nbsp;Tuxedo Satin on Side </div></td>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
              <?=$currency?>
              <?=$pants_tuxedo_satin_price?>
            </div></td>
        </tr>
        <? } ?>
        <?
				  $pants_tuxedo_satin_waist_band = $row00["pants_tuxedo_satin_waist_band"];
				  if ($pants_tuxedo_satin_waist_band != "1") {
				  $pants_tuxedo_satin_waist_band_price = 0;
				  } else if ($pants_tuxedo_satin_waist_band == "1") {
				  $sqlprice5 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Tuxedo Satin Waist Band' ";
				  $queryprice5 = mysql_db_query($dbname, $sqlprice5) or die("Can't QueryPrice5");
				  $rowprice5 = mysql_fetch_array($queryprice5);
				  $pants_tuxedo_satin_waist_band_price_extra = $rowprice5["0"];
				  $pants_tuxedo_satin_waist_band_price = $pants_tuxedo_satin_waist_band_price_extra;
				  }
				  ?>
        <? if($pants_tuxedo_satin_waist_band_price == "0") { ?>
        <? } else if($pants_tuxedo_satin_waist_band_price != "0") { ?>
        <tr>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">&nbsp;&nbsp;Tuxedo Satin Waist Band </div></td>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
              <?=$currency?>
              <?=$pants_tuxedo_satin_waist_band_price?>
            </div></td>
        </tr>
        <? } ?>
        <?
				  $pants_very_extended_waistband = $row00["pants_very_extended_waistband"];
				  if ($pants_very_extended_waistband != "0") {
				  $pants_very_extended_waistband_price = 0;
				  } else if ($pants_very_extended_waistband == "0") {
				  $sqlprice6 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Very Extended Waistband' ";
				  $queryprice6 = mysql_db_query($dbname, $sqlprice6) or die("Can't QueryPrice6");
				  $rowprice6 = mysql_fetch_array($queryprice6);
				  $pants_very_extended_waistband_price_extra = $rowprice6["0"];
				  $pants_very_extended_waistband_price = $pants_very_extended_waistband_price_extra;
				  }
				  ?>
        <? if($pants_very_extended_waistband_price == "0") { ?>
        <? } else if($pants_very_extended_waistband_price != "0") { ?>
        <tr>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">&nbsp;&nbsp;Very Extended Waistband </div></td>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
              <?=$currency?>
              <?=$pants_very_extended_waistband_price?>
            </div></td>
        </tr>
        <? } ?>
        <?
				  $pants_pants_brand = $row00["pants_pants_brand"];
				  if ($pants_pants_brand == "0") {
				  $pants_pants_brand_price = 0;
				  } else if ($pants_pants_brand != "0") {
				  $sqlprice7 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Pants Branding' ";
				  $queryprice7 = mysql_db_query($dbname, $sqlprice7) or die("Can't QueryPrice7");
				  $rowprice7 = mysql_fetch_array($queryprice7);
				  $pants_pants_brand_price_extra = $rowprice7["0"];
				  $pants_pants_brand_price = $pants_pants_brand_price_extra;
				  }
				  ?>
        <? if($pants_pants_brand_price == "0") { ?>
        <? } else if($pants_pants_brand_price != "0") { ?>
        <tr>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">&nbsp;&nbsp;Pants Branding </div></td>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
              <?=$currency?>
              <?=$pants_pants_brand_price?>
            </div></td>
        </tr>
        <? } ?>
      </table>
      <? } else if ($order_product == "shirt") { ?>
      <?
   $strSQL2 = " SELECT * FROM admin_fabrics_shirt WHERE fabricno = '$fabric' "; 
   $objQuery2 = mysql_query($strSQL2) or die ("Error Query [".$strSQL2."]");
   $objResult2 = mysql_fetch_array($objQuery2);
   ?>
      <div style="font-size:14px;"><strong>&nbsp;&nbsp;Shirt
        <?=$objResult2["color"]?>
        <?=$objResult2["pattern"]?>
        </strong></div>
      <br>
      <?
				  $order_id = $objResult1["order_id"]; 
				  $product_id = $objResult1["product_id"];
				  $sql00 =	" SELECT * FROM customize_shirt_design WHERE order_id = '$order_id' AND product_id = '$product_id' ";
				  $query00 = mysql_db_query($dbname, $sql00) or die("Can't Query00");
				  $row00 = mysql_fetch_array($query00);
				  ?>
      <table width="600" style="vertical-align:middle;">
        <?
				  $shirt_fabric_no = $objResult2["fabricno"];
                  $sql01 =	" SELECT * FROM admin_fabrics_shirt WHERE fabricno = '$shirt_fabric_no' ";
				  $query01 = mysql_db_query($dbname, $sql01) or die("Can't Query01");
				  $row01 = mysql_fetch_array($query01);
				  $fabrics_type = $row01["type"];
				  $fabrics_brand = $row01["brand"];
				  
				  if ($row01["type"] != '') {
				  $sql001 = " SELECT `fabrictype_".$id_user."` FROM admin_fabrictype WHERE fabrictype_name = '$fabrics_type' AND fabrictype_product = 'Shirt' ";
				  $query001 = mysql_db_query($dbname, $sql001) or die("Can't Query001");
				  $row001 = mysql_fetch_array($query001);
				  $shirt_fabric_price = $row001["0"];
				  
				  } else if ($row01["brand"] != '') {
				  $sql002 = " SELECT `fabricbrand_".$id_user."` FROM admin_fabricbrand WHERE fabricbrand_name = '$fabrics_brand' AND fabricbrand_product = 'Shirt' ";
				  $query002 = mysql_db_query($dbname, $sql002) or die("Can't Query002");
				  $row002 = mysql_fetch_array($query002);	
				  $shirt_fabric_price = $row002["0"];
				  }
				  ?>
        <tr>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">&nbsp;&nbsp;Fabric Number :
              <?=$objResult2["fabricno"]?>
            </div></td>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
              <?=$currency?>
              <?=$shirt_fabric_price?>
            </div></td>
        </tr>
        <?
                  $shirt_shirt_button_number = $row00["shirt_shirt_button_number"];
				  $sql03 = " SELECT price FROM admin_buttons_shirt WHERE buttonno = '$shirt_shirt_button_number' ";
				  $query03 = mysql_db_query($dbname, $sql03) or die("Can't Query03");
				  $row03 = mysql_fetch_array($query03);
				  ?>
        <tr>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">&nbsp;&nbsp;Button Number :
              <?=$row00["shirt_shirt_button_number"]?>
            </div></td>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
              <?=$currency?>
              <?=$row03["price"]?>
            </div></td>
        </tr>
        <?
                  $shirt_contrast_inside_no_1 = $row00["shirt_contrast_inside_no_1"];
				  if ($shirt_contrast_inside_no_1 == "") {
				  $shirt_contrast_inside_no_1_price = 0;
				  } else if ($shirt_contrast_inside_no_1 != "") {
				  $sqlprice1 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Inside Contrast Collar' ";
				  $queryprice1 = mysql_db_query($dbname, $sqlprice1) or die("Can't QueryPrice1");
				  $rowprice1 = mysql_fetch_array($queryprice1);
				  $shirt_contrast_inside_no_1_price_extra = $rowprice1["0"];
				  $shirt_contrast_inside_no_1_price = $shirt_contrast_inside_no_1_price_extra;
				  }
				  ?>
        <? if($shirt_contrast_inside_no_1_price == "0") { ?>
        <? } else if($shirt_contrast_inside_no_1_price != "0") { ?>
        <tr>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">&nbsp;&nbsp;Inside Contrast Collar </div></td>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
              <?=$currency?>
              <?=$shirt_contrast_inside_no_1_price?>
            </div></td>
        </tr>
        <? } ?>
        <?
                  $shirt_contrast_inside_no_2 = $row00["shirt_contrast_inside_no_2"];
				  if ($shirt_contrast_inside_no_2 == "") {
				  $shirt_contrast_inside_no_2_price = 0;
			      } else if ($shirt_contrast_inside_no_2 != "") {
				  $sqlprice2 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Inside Contrast Cuff' ";
				  $queryprice2 = mysql_db_query($dbname, $sqlprice2) or die("Can't QueryPrice2");
				  $rowprice2 = mysql_fetch_array($queryprice2);
				  $shirt_contrast_inside_no_2_price_extra = $rowprice2["0"];
				  $shirt_contrast_inside_no_2_price = $shirt_contrast_inside_no_2_price_extra;
				  }
				  ?>
        <? if($shirt_contrast_inside_no_2_price == "0") { ?>
        <? } else if($shirt_contrast_inside_no_2_price != "0") { ?>
        <tr>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">&nbsp;&nbsp;Inside Contrast Cuff </div></td>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
              <?=$currency?>
              <?=$shirt_contrast_inside_no_2_price?>
            </div></td>
        </tr>
        <? } ?>
        <?
				  $shirt_contrast_inside_no_3 = $row00["shirt_contrast_inside_no_3"];
				  if ($shirt_contrast_inside_no_3 == "") {
				  $shirt_contrast_inside_no_3_price = 0;
				  } else if ($shirt_contrast_inside_no_3 != "") {
				  $sqlprice3 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Inside Contrast Placket' ";
				  $queryprice3 = mysql_db_query($dbname, $sqlprice3) or die("Can't QueryPrice3");
				  $rowprice3 = mysql_fetch_array($queryprice3);
				  $shirt_contrast_inside_no_3_price_extra = $rowprice3["0"];
				  $shirt_contrast_inside_no_3_price = $shirt_contrast_inside_no_3_price_extra;
				  }
				  ?>
        <? if($shirt_contrast_inside_no_3_price == "0") { ?>
        <? } else if($shirt_contrast_inside_no_3_price != "0") { ?>
        <tr>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">&nbsp;&nbsp;Inside Contrast Placket </div></td>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
              <?=$currency?>
              <?=$shirt_contrast_inside_no_3_price?>
            </div></td>
        </tr>
        <? } ?>
        <?
				  $shirt_contrast_outsite_no_1 = $row00["shirt_contrast_outsite_no_1"];
				  if ($shirt_contrast_outsite_no_1 == "") {
				  $shirt_contrast_outsite_no_1_price = 0;
				  } else if ($shirt_contrast_outsite_no_1 != "") {
				  $sqlprice4 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Outside Contrast Collar' ";
				  $queryprice4 = mysql_db_query($dbname, $sqlprice4) or die("Can't QueryPrice4");
				  $rowprice4 = mysql_fetch_array($queryprice4);
				  $shirt_contrast_outsite_no_1_price_extra = $rowprice4["0"];
				  $shirt_contrast_outsite_no_1_price = $shirt_contrast_outsite_no_1_price_extra;
				  }
				  ?>
        <? if($shirt_contrast_outsite_no_1_price == "0") { ?>
        <? } else if($shirt_contrast_outsite_no_1_price != "0") { ?>
        <tr>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">&nbsp;&nbsp;Outside Contrast Collar </div></td>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
              <?=$currency?>
              <?=$shirt_contrast_outsite_no_1_price?>
            </div></td>
        </tr>
        <? } ?>
        <?
				  $shirt_contrast_outsite_no_2 = $row00["shirt_contrast_outsite_no_2"];
				  if ($shirt_contrast_outsite_no_2 == "") {
				  $shirt_contrast_outsite_no_2_price = 0;
				  } else if ($shirt_contrast_outsite_no_2 != "") {
				  $sqlprice5 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Outside Contrast Cuff' ";
				  $queryprice5 = mysql_db_query($dbname, $sqlprice5) or die("Can't QueryPrice5");
				  $rowprice5 = mysql_fetch_array($queryprice5);
				  $shirt_contrast_outsite_no_2_price_extra = $rowprice5["0"];
				  $shirt_contrast_outsite_no_2_price = $shirt_contrast_outsite_no_2_price_extra;
				  }
				  ?>
        <? if($shirt_contrast_outsite_no_2_price == "0") { ?>
        <? } else if($shirt_contrast_outsite_no_2_price != "0") { ?>
        <tr>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">&nbsp;&nbsp;Outside Contrast Cuff </div></td>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
              <?=$currency?>
              <?=$shirt_contrast_outsite_no_2_price?>
            </div></td>
        </tr>
        <? } ?>
        <?
				  $shirt_contrast_outsite_no_3 = $row00["shirt_contrast_outsite_no_3"];
				  if ($shirt_contrast_outsite_no_3 == "") {
				  $shirt_contrast_outsite_no_3_price = 0;
				  } else if ($shirt_contrast_outsite_no_3 != "") {
				  $sqlprice6 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Outside Contrast Placket' ";
				  $queryprice6 = mysql_db_query($dbname, $sqlprice6) or die("Can't QueryPrice6");
				  $rowprice6 = mysql_fetch_array($queryprice6);
				  $shirt_contrast_outsite_no_3_price_extra = $rowprice6["0"];
				  $shirt_contrast_outsite_no_3_price = $shirt_contrast_outsite_no_3_price_extra;
				  }
				  ?>
        <? if($shirt_contrast_outsite_no_3_price == "0") { ?>
        <? } else if($shirt_contrast_outsite_no_3_price != "0") { ?>
        <tr>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">&nbsp;&nbsp;Outside Contrast Placket </div></td>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
              <?=$currency?>
              <?=$shirt_contrast_outsite_no_3_price?>
            </div></td>
        </tr>
        <? } ?>
        <?
				  $shirt_shoulder_apaulletes = $row00["shirt_shoulder_apaulletes"];
				  if ($shirt_shoulder_apaulletes != "1") {
				  $shirt_shoulder_apaulletes_price = 0;
				  } else if ($shirt_shoulder_apaulletes == "1") {
				  $sqlprice7 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Shoulder Apaulletes' ";
				  $queryprice7 = mysql_db_query($dbname, $sqlprice7) or die("Can't QueryPrice7");
				  $rowprice7 = mysql_fetch_array($queryprice7);
				  $shirt_shoulder_apaulletes_price_extra = $rowprice7["0"];
				  $shirt_shoulder_apaulletes_price = $shirt_shoulder_apaulletes_price_extra;
				  }
				  ?>
        <? if($shirt_shoulder_apaulletes_price == "0") { ?>
        <? } else if($shirt_shoulder_apaulletes_price != "0") { ?>
        <tr>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">&nbsp;&nbsp;Shoulder Apaulletes </div></td>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
              <?=$currency?>
              <?=$shirt_shoulder_apaulletes_price?>
            </div></td>
        </tr>
        <? } ?>
        <?
				  $shirt_arm_loops = $row00["shirt_arm_loops"];
				  if ($shirt_arm_loops != "1") {
				  $shirt_arm_loops_price = 0;
				  } else if ($shirt_arm_loops == "1") {
				  $sqlprice8 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Arm Loops' ";
				  $queryprice8 = mysql_db_query($dbname, $sqlprice8) or die("Can't QueryPrice8");
				  $rowprice8 = mysql_fetch_array($queryprice8);
				  $shirt_arm_loops_price_extra = $rowprice8["0"];
				  $shirt_arm_loops_price = $shirt_arm_loops_price_extra;
				  }
				  ?>
        <? if($shirt_arm_loops_price == "0") { ?>
        <? } else if($shirt_arm_loops_price != "0") { ?>
        <tr>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">&nbsp;&nbsp;Arm Loops </div></td>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
              <?=$currency?>
              <?=$shirt_arm_loops_price?>
            </div></td>
        </tr>
        <? } ?>
        <?
				  $shirt_bottom = $row00["shirt_bottom"];
				  if ($shirt_bottom != "4") {
				  $shirt_bottom_pentagon_price = 0;
				  } else if ($shirt_bottom == "4") {
				  $sqlprice9 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Pentagon Gusset' ";
				  $queryprice9 = mysql_db_query($dbname, $sqlprice9) or die("Can't QueryPrice9");
				  $rowprice9 = mysql_fetch_array($queryprice9);
				  $shirt_bottom_pentagon_price_extra = $rowprice9["0"];
				  $shirt_bottom_pentagon_price = $shirt_bottom_pentagon_price_extra;
				  }
				  ?>
        <? if($shirt_bottom_pentagon_price == "0") { ?>
        <? } else if($shirt_bottom_pentagon_price != "0") { ?>
        <tr>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">&nbsp;&nbsp;Pentagon Gusset </div></td>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
              <?=$currency?>
              <?=$shirt_bottom_pentagon_price?>
            </div></td>
        </tr>
        <? } ?>
        <?
				  $shirt_bottom = $row00["shirt_bottom"];
				  if ($shirt_bottom != "5") {
				  $shirt_bottom_triangle_price = 0;
				  } else if ($shirt_bottom == "5") {
				  $sqlprice10 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Triangle Gusset' ";
				  $queryprice10 = mysql_db_query($dbname, $sqlprice10) or die("Can't QueryPrice10");
				  $rowprice10 = mysql_fetch_array($queryprice10);
				  $shirt_bottom_triangle_price_extra = $rowprice10["0"];
				  $shirt_bottom_triangle_price = $shirt_bottom_triangle_price_extra;
				  }
				  ?>
        <? if($shirt_bottom_triangle_price == "0") { ?>
        <? } else if($shirt_bottom_triangle_price != "0") { ?>
        <tr>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">&nbsp;&nbsp;Triangle Gusset </div></td>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
              <?=$currency?>
              <?=$shirt_bottom_triangle_price?>
            </div></td>
        </tr>
        <? } ?>
        <?
				  $shirt_initial_or_name = $row00["shirt_initial_or_name"];
				  $shirt_position = $row00["shirt_position"];
				  if ($shirt_position != "1" || $shirt_initial_or_name == "") {
				  $shirt_position_cuffs_price = 0;
				  } else if ($shirt_position == "1" && $shirt_initial_or_name != "") {
				  $sqlprice11 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Embroidery Cuffs' ";
				  $queryprice11 = mysql_db_query($dbname, $sqlprice11) or die("Can't QueryPrice11");
				  $rowprice11 = mysql_fetch_array($queryprice11);
				  $shirt_position_cuffs_price_extra = $rowprice11["0"];
				  $shirt_position_cuffs_price = $shirt_position_cuffs_price_extra;
				  }
				  ?>
        <? if($shirt_position_cuffs_price == "0") { ?>
        <? } else if($shirt_position_cuffs_price != "0") { ?>
        <tr>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">&nbsp;&nbsp;Embroidery Cuffs </div></td>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
              <?=$currency?>
              <?=$shirt_position_cuffs_price?>
            </div></td>
        </tr>
        <? } ?>
        <?
				  $shirt_initial_or_name = $row00["shirt_initial_or_name"];
				  $shirt_position = $row00["shirt_position"];
				  if ($shirt_position != "2" || $shirt_initial_or_name == "") {
				  $shirt_position_chest_price = 0;
				  } else if ($shirt_position == "2" && $shirt_initial_or_name != "") {
				  $sqlprice12 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Embroidery Chest' ";
				  $queryprice12 = mysql_db_query($dbname, $sqlprice12) or die("Can't QueryPrice12");
				  $rowprice12 = mysql_fetch_array($queryprice12);
				  $shirt_position_chest_price_extra = $rowprice12["0"];
				  $shirt_position_chest_price = $shirt_position_chest_price_extra;
				  }
				  ?>
        <? if($shirt_position_chest_price == "0") { ?>
        <? } else if($shirt_position_chest_price != "0") { ?>
        <tr>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">&nbsp;&nbsp;Embroidery Chest </div></td>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
              <?=$currency?>
              <?=$shirt_position_chest_price?>
            </div></td>
        </tr>
        <? } ?>
        <?
				  $shirt_initial_or_name = $row00["shirt_initial_or_name"];
				  $shirt_position = $row00["shirt_position"];
				  if ($shirt_position != "3" || $shirt_initial_or_name == "") {
				  $shirt_position_insidecollar_price = 0;
				  } else if ($shirt_position == "3" && $shirt_initial_or_name != "") {
				  $sqlprice13 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Embroidery Inside Collar' ";
				  $queryprice13 = mysql_db_query($dbname, $sqlprice13) or die("Can't QueryPrice13");
				  $rowprice13 = mysql_fetch_array($queryprice13);
				  $shirt_position_insidecollar_price_extra = $rowprice13["0"];
				  $shirt_position_insidecollar_price = $shirt_position_insidecollar_price_extra;
				  }
				  ?>
        <? if($shirt_position_insidecollar_price == "0") { ?>
        <? } else if($shirt_position_insidecollar_price != "0") { ?>
        <tr>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">&nbsp;&nbsp;Embroidery Inside Collar </div></td>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
              <?=$currency?>
              <?=$shirt_position_insidecollar_price?>
            </div></td>
        </tr>
        <? } ?>
        <?
				  $shirt_initial_or_name = $row00["shirt_initial_or_name"];
				  $shirt_position = $row00["shirt_position"];
				  if ($shirt_position != "4" || $shirt_initial_or_name == "") {
				  $shirt_position_outsidebackcollar_price = 0;
				  } else if ($shirt_position == "4" && $shirt_initial_or_name != "") {
				  $sqlprice14 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Embroidery Outside Back Collar' ";
				  $queryprice14 = mysql_db_query($dbname, $sqlprice14) or die("Can't QueryPrice14");
				  $rowprice14 = mysql_fetch_array($queryprice14);
				  $shirt_position_outsidebackcollar_price_extra = $rowprice14["0"];
				  $shirt_position_outsidebackcollar_price = $shirt_position_outsidebackcollar_price_extra;
				  }
				  ?>
        <? if($shirt_position_outsidebackcollar_price == "0") { ?>
        <? } else if($shirt_position_outsidebackcollar_price != "0") { ?>
        <tr>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">&nbsp;&nbsp;Embroidery Outside Back Collar </div></td>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
              <?=$currency?>
              <?=$shirt_position_outsidebackcollar_price?>
            </div></td>
        </tr>
        <? } ?>
        <?
				  $shirt_initial_or_name = $row00["shirt_initial_or_name"];
				  $shirt_position = $row00["shirt_position"];
				  if ($shirt_position != "5" || $shirt_initial_or_name == "") {
				  $shirt_position_insideyoke_price = 0;
				  } else if ($shirt_position == "5" && $shirt_initial_or_name != "") {
				  $sqlprice15 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Embroidery Inside Yoke' ";
				  $queryprice15 = mysql_db_query($dbname, $sqlprice15) or die("Can't QueryPrice15");
				  $rowprice15 = mysql_fetch_array($queryprice15);
				  $shirt_position_insideyoke_price_extra = $rowprice15["0"];
				  $shirt_position_insideyoke_price = $shirt_position_insideyoke_price_extra;
				  }
				  ?>
        <? if($shirt_position_insideyoke_price == "0") { ?>
        <? } else if($shirt_position_insideyoke_price != "0") { ?>
        <tr>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">&nbsp;&nbsp;Embroidery Inside Yoke </div></td>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
              <?=$currency?>
              <?=$shirt_position_insideyoke_price?>
            </div></td>
        </tr>
        <? } ?>
        <?
				  $shirt_initial_or_name = $row00["shirt_initial_or_name"];
				  $shirt_position = $row00["shirt_position"];
				  if ($shirt_position != "6" || $shirt_initial_or_name == "") {
				  $shirt_position_stomach_price = 0;
				  } else if ($shirt_position == "6" && $shirt_initial_or_name != "") {
				  $sqlprice16 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Embroidery Stomach' ";
				  $queryprice16 = mysql_db_query($dbname, $sqlprice16) or die("Can't QueryPrice16");
				  $rowprice16 = mysql_fetch_array($queryprice16);
				  $shirt_position_stomach_price_extra = $rowprice16["0"];
				  $shirt_position_stomach_price = $shirt_position_stomach_price_extra;
			      }
				  ?>
        <? if($shirt_position_stomach_price == "0") { ?>
        <? } else if($shirt_position_stomach_price != "0") { ?>
        <tr>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">&nbsp;&nbsp;Embroidery Stomach </div></td>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
              <?=$currency?>
              <?=$shirt_position_stomach_price?>
            </div></td>
        </tr>
        <? } ?>
        <?
				  $shirt_initial_or_name = $row00["shirt_initial_or_name"];
				  $shirt_position = $row00["shirt_position"];
				  if ($shirt_position != "7" || $shirt_initial_or_name == "") {
				  $shirt_position_bottom_price = 0;
				  } else if ($shirt_position == "7" && $shirt_initial_or_name != "") {
				  $sqlprice17 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Embroidery Bottom' ";
				  $queryprice17 = mysql_db_query($dbname, $sqlprice17) or die("Can't QueryPrice17");
				  $rowprice17 = mysql_fetch_array($queryprice17);
				  $shirt_position_bottom_price_extra = $rowprice17["0"];
				  $shirt_position_bottom_price = $shirt_position_bottom_price_extra;
				  }
				  ?>
        <? if($shirt_position_bottom_price == "0") { ?>
        <? } else if($shirt_position_bottom_price != "0") { ?>
        <tr>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">&nbsp;&nbsp;Embroidery Bottom </div></td>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
              <?=$currency?>
              <?=$shirt_position_bottom_price?>
            </div></td>
        </tr>
        <? } ?>
        <?
				  $shirt_brand = $row00["shirt_brand"];
				  if ($shirt_brand == "0") {
				  $shirt_brand_price = 0;
				  } else if ($shirt_brand != "0") {
				  $sqlprice18 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Shirt Branding' ";
				  $queryprice18 = mysql_db_query($dbname, $sqlprice18) or die("Can't QueryPrice18");
				  $rowprice18 = mysql_fetch_array($queryprice18);
				  $shirt_brand_price_extra = $rowprice18["0"];
				  $shirt_brand_price = $shirt_brand_price_extra;
				  }
				  ?>
        <? if($shirt_brand_price == "0") { ?>
        <? } else if($shirt_brand_price != "0") { ?>
        <tr>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">&nbsp;&nbsp;Shirt Branding </div></td>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
              <?=$currency?>
              <?=$shirt_brand_price?>
            </div></td>
        </tr>
        <? } ?>
      </table>
      <? } else if ($order_product == "suits") { ?>
      <?
   $strSQL2 = " SELECT * FROM admin_fabrics_suits WHERE fabricno = '$fabric' "; 
   $objQuery2 = mysql_query($strSQL2) or die ("Error Query [".$strSQL2."]");
   $objResult2 = mysql_fetch_array($objQuery2);
   ?>
      <div style="font-size:14px;"><strong>&nbsp;&nbsp;Suits
        <?=$objResult2["color"]?>
        <?=$objResult2["pattern"]?>
        </strong></div>
      <br>
      <?
				  $order_id = $objResult1["order_id"]; 
				  $product_id = $objResult1["product_id"];
				  $sql00 =	" SELECT * FROM customize_suits_design WHERE order_id = '$order_id' AND product_id = '$product_id' ";
				  $query00 = mysql_db_query($dbname, $sql00) or die("Can't Query00");
				  $row00 = mysql_fetch_array($query00);
				  ?>
      <table width="600" style="vertical-align:middle;">
        <?
				  $suits_fabric_no = $objResult2["fabricno"];
                  $sql01 =	" SELECT * FROM admin_fabrics_suits WHERE fabricno = '$suits_fabric_no' ";
				  $query01 = mysql_db_query($dbname, $sql01) or die("Can't Query01");
				  $row01 = mysql_fetch_array($query01);
				  $fabrics_type = $row01["type"];
				  $fabrics_brand = $row01["brand"];
				  
				  if ($row01["type"] != '') {
				  $sql001 = " SELECT `fabrictype_".$id_user."` FROM admin_fabrictype WHERE fabrictype_name = '$fabrics_type' AND fabrictype_product = 'Suits' ";
				  $query001 = mysql_db_query($dbname, $sql001) or die("Can't Query001");
				  $row001 = mysql_fetch_array($query001);
				  $suits_fabric_price = $row001["0"];
				  
				  } else if ($row01["brand"] != '') {
				  $sql002 = " SELECT `fabricbrand_".$id_user."` FROM admin_fabricbrand WHERE fabricbrand_name = '$fabrics_brand' AND fabricbrand_product = 'Suits' ";
				  $query002 = mysql_db_query($dbname, $sql002) or die("Can't Query002");
				  $row002 = mysql_fetch_array($query002);	
				  $suits_fabric_price = $row002["0"];
				  }
				  ?>
        <tr>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">&nbsp;&nbsp;Fabric Number :
              <?=$objResult2["fabricno"]?>
            </div></td>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
              <?=$currency?>
              <?=$suits_fabric_price?>
            </div></td>
        </tr>
        <?
                  $suits_jacket_button_number = $row00["suits_jacket_button_number"];
				  $sql03 = " SELECT price FROM admin_buttons_suits WHERE buttonno = '$suits_jacket_button_number' ";
				  $query03 = mysql_db_query($dbname, $sql03) or die("Can't Query03");
				  $row03 = mysql_fetch_array($query03);
				  ?>
        <tr>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">&nbsp;&nbsp;Jacket Button Number :
              <?=$row00["suits_jacket_button_number"]?>
            </div></td>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
              <?=$currency?>
              <?=$row03["price"]?>
            </div></td>
        </tr>
        <?
                  $suits_pants_button_number = $row00["suits_pants_button_number"];
				  $sql04 = " SELECT price FROM admin_buttons_suits WHERE buttonno = '$suits_pants_button_number' ";
				  $query04 = mysql_db_query($dbname, $sql04) or die("Can't Query04");
				  $row04 = mysql_fetch_array($query04);
				  ?>
        <tr>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">&nbsp;&nbsp;Pants Button Number :
              <?=$row00["suits_pants_button_number"]?>
            </div></td>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
              <?=$currency?>
              <?=$row04["price"]?>
            </div></td>
        </tr>
        <?
                  $suits_embroidery_collar_initial_or_name = $row00["suits_embroidery_collar_initial_or_name"];
				  if ($suits_embroidery_collar_initial_or_name == "") {
				  $suits_embroidery_collar_initial_or_name_price = 0;
				  } else if ($suits_embroidery_collar_initial_or_name != "") {
				  $sqlprice1 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Embroidery Collar Felt' ";
				  $queryprice1 = mysql_db_query($dbname, $sqlprice1) or die("Can't QueryPrice1");
				  $rowprice1 = mysql_fetch_array($queryprice1);
				  $suits_embroidery_collar_initial_or_name_price_extra = $rowprice1["0"];
				  $suits_embroidery_collar_initial_or_name_price = $suits_embroidery_collar_initial_or_name_price_extra;
				  }
				  ?>
        <? if($suits_embroidery_collar_initial_or_name_price == "0") { ?>
        <? } else if($suits_embroidery_collar_initial_or_name_price != "0") { ?>
        <tr>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">&nbsp;&nbsp;Embroidery Collar Felt </div></td>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
              <?=$currency?>
              <?=$suits_embroidery_collar_initial_or_name_price?>
            </div></td>
        </tr>
        <? } ?>
        <?
                  $suits_brand = $row00["suits_brand"];
				  if ($suits_brand == "0") {
				  $suits_brand_price = 0;
				  } else if ($suits_brand != "0") {
				  $sqlprice2 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Jacket Branding' ";
				  $queryprice2 = mysql_db_query($dbname, $sqlprice2) or die("Can't QueryPrice2");
				  $rowprice2 = mysql_fetch_array($queryprice2);
				  $suits_brand_price_extra = $rowprice2["0"];
				  $suits_brand_price = $suits_brand_price_extra;
				  }
				  ?>
        <? if($suits_brand_price == "0") { ?>
        <? } else if($suits_brand_price != "0") { ?>
        <tr>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">&nbsp;&nbsp;Jacket Branding </div></td>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
              <?=$currency?>
              <?=$suits_brand_price?>
            </div></td>
        </tr>
        <? } ?>
        <?
                  $suits_pick_stitch = $row00["suits_pick_stitch"];
				  $suits_pick_stitch_sleeves = $row00["suits_pick_stitch_sleeves"];
				  if ($suits_pick_stitch == "0") {
				  $suits_pick_stitch_sleeves_price = 0;
				  } else if ($suits_pick_stitch == "1" && $suits_pick_stitch_sleeves != "DEFAULT TONAL") {
				  $sqlprice3 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Sleeves Pick Stitch' ";
				  $queryprice3 = mysql_db_query($dbname, $sqlprice3) or die("Can't QueryPrice3");
				  $rowprice3 = mysql_fetch_array($queryprice3);
				  $suits_pick_stitch_sleeves_price_extra = $rowprice3["0"];
				  $suits_pick_stitch_sleeves_price = $suits_pick_stitch_sleeves_price_extra;
				  }
				  ?>
        <? if($suits_pick_stitch_sleeves_price == "0") { ?>
        <? } else if($suits_pick_stitch_sleeves_price != "0") { ?>
        <tr>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">&nbsp;&nbsp;Sleeves Pick Stitch </div></td>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
              <?=$currency?>
              <?=$suits_pick_stitch_sleeves_price?>
            </div></td>
        </tr>
        <? } ?>
        <?
                  $suits_pick_stitch = $row00["suits_pick_stitch"];
				  $suits_pick_stitch_vest = $row00["suits_pick_stitch_vest"];
				  if ($suits_pick_stitch == "0") {
				  $suits_pick_stitch_vest_price = 0;
				  } else if ($suits_pick_stitch == "1" && $suits_pick_stitch_vest != "DEFAULT TONAL") {
				  $sqlprice4 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Vent Pick Stitch' ";
				  $queryprice4 = mysql_db_query($dbname, $sqlprice4) or die("Can't QueryPrice4");
				  $rowprice4 = mysql_fetch_array($queryprice4);
				  $suits_pick_stitch_vest_price_extra = $rowprice4["0"];
				  $suits_pick_stitch_vest_price = $suits_pick_stitch_vest_price_extra;
				  }
				  ?>
        <? if($suits_pick_stitch_vest_price == "0") { ?>
        <? } else if($suits_pick_stitch_vest_price != "0") { ?>
        <tr>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">&nbsp;&nbsp;Vent Pick Stitch </div></td>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
              <?=$currency?>
              <?=$suits_pick_stitch_vest_price?>
            </div></td>
        </tr>
        <? } ?>
        <?
				  $suits_elbow_patch = $row00["suits_elbow_patch"];
				  if ($suits_elbow_patch == "") {
				  $suits_elbow_patch_price = 0;
				  } else if ($suits_elbow_patch != "") {
				  $sqlprice5 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Elbow Patch' ";
				  $queryprice5 = mysql_db_query($dbname, $sqlprice5) or die("Can't QueryPrice5");
				  $rowprice5 = mysql_fetch_array($queryprice5);
				  $suits_elbow_patch_price_extra = $rowprice5["0"];
				  $suits_elbow_patch_price = $suits_elbow_patch_price_extra;
				  }
				  ?>
        <? if($suits_elbow_patch_price == "0") { ?>
        <? } else if($suits_elbow_patch_price != "0") { ?>
        <tr>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">&nbsp;&nbsp;Elbow Patch </div></td>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
              <?=$currency?>
              <?=$suits_elbow_patch_price?>
            </div></td>
        </tr>
        <? } ?>
        <?
				  $suits_canvas = $row00["suits_canvas"];
				  if ($suits_canvas != "3") {
				  $suits_canvas_price = 0;
				  } else if ($suits_canvas == "3") {
				  $sqlprice6 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Full Canvas' ";
				  $queryprice6 = mysql_db_query($dbname, $sqlprice6) or die("Can't QueryPrice6");
				  $rowprice6 = mysql_fetch_array($queryprice6);
				  $suits_canvas_price_extra = $rowprice6["0"];
				  $suits_canvas_price = $suits_canvas_price_extra;
				  }
				  ?>
        <? if($suits_canvas_price == "0") { ?>
        <? } else if($suits_canvas_price != "0") { ?>
        <tr>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">&nbsp;&nbsp;Full Canvas </div></td>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
              <?=$currency?>
              <?=$suits_canvas_price?>
            </div></td>
        </tr>
        <? } ?>
        <?
				  $suits_coin_pocket_inside = $row00["suits_coin_pocket_inside"];
				  if ($suits_coin_pocket_inside != "1") {
				  $suits_coin_pocket_inside_price = 0;
				  } else if ($suits_coin_pocket_inside == "1") {
				  $sqlprice7 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Coin Pocket Inside' ";
				  $queryprice7 = mysql_db_query($dbname, $sqlprice7) or die("Can't QueryPrice7");
				  $rowprice7 = mysql_fetch_array($queryprice7);
				  $suits_coin_pocket_inside_price_extra = $rowprice7["0"];
				  $suits_coin_pocket_inside_price = $suits_coin_pocket_inside_price_extra;
				  }
				  ?>
        <? if($suits_coin_pocket_inside_price == "0") { ?>
        <? } else if($suits_coin_pocket_inside_price != "0") { ?>
        <tr>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">&nbsp;&nbsp;Coin Pocket Inside </div></td>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
              <?=$currency?>
              <?=$suits_coin_pocket_inside_price?>
            </div></td>
        </tr>
        <? } ?>
        <?
				  $suits_suspender_buttons_inside = $row00["suits_suspender_buttons_inside"];
				  if ($suits_suspender_buttons_inside != "1") {
				  $suits_suspender_buttons_inside_price = 0;
				  } else if ($suits_suspender_buttons_inside == "1") {
				  $sqlprice8 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Suspender Buttons Inside' ";
				  $queryprice8 = mysql_db_query($dbname, $sqlprice8) or die("Can't QueryPrice8");
				  $rowprice8 = mysql_fetch_array($queryprice8);
				  $suits_suspender_buttons_inside_price_extra = $rowprice8["0"];
				  $suits_suspender_buttons_inside_price = $suits_suspender_buttons_inside_price_extra;
				  }
				  ?>
        <? if($suits_suspender_buttons_inside_price == "0") { ?>
        <? } else if($suits_suspender_buttons_inside_price != "0") { ?>
        <tr>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">&nbsp;&nbsp;Suspender Buttons Inside </div></td>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
              <?=$currency?>
              <?=$suits_suspender_buttons_inside_price?>
            </div></td>
        </tr>
        <? } ?>
        <?
				  $suits_split_tabs_back = $row00["suits_split_tabs_back"];
				  if ($suits_split_tabs_back != "1") {
				  $suits_split_tabs_back_price = 0;
				  } else if ($suits_split_tabs_back == "1") {
				  $sqlprice9 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Split Tabs Back' ";
				  $queryprice9 = mysql_db_query($dbname, $sqlprice9) or die("Can't QueryPrice9");
				  $rowprice9 = mysql_fetch_array($queryprice9);
				  $suits_split_tabs_back_price_extra = $rowprice9["0"];
				  $suits_split_tabs_back_price = $suits_split_tabs_back_price_extra;
				  }
				  ?>
        <? if($suits_split_tabs_back_price == "0") { ?>
        <? } else if($suits_split_tabs_back_price != "0") { ?>
        <tr>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">&nbsp;&nbsp;Split Tabs Back </div></td>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
              <?=$currency?>
              <?=$suits_split_tabs_back_price?>
            </div></td>
        </tr>
        <? } ?>
        <?
				  $suits_tuxedo_satin = $row00["suits_tuxedo_satin"];
				  if ($suits_tuxedo_satin != "1") {
				  $suits_tuxedo_satin_price = 0;
				  } else if ($suits_tuxedo_satin == "1") {
				  $sqlprice10 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Tuxedo Satin on Side' ";
				  $queryprice10 = mysql_db_query($dbname, $sqlprice10) or die("Can't QueryPrice10");
				  $rowprice10 = mysql_fetch_array($queryprice10);
				  $suits_tuxedo_satin_price_extra = $rowprice10["0"];
				  $suits_tuxedo_satin_price = $suits_tuxedo_satin_price_extra;
				  }
				  ?>
        <? if($suits_tuxedo_satin_price == "0") { ?>
        <? } else if($suits_tuxedo_satin_price != "0") { ?>
        <tr>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">&nbsp;&nbsp;Tuxedo Satin on Side </div></td>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
              <?=$currency?>
              <?=$suits_tuxedo_satin_price?>
            </div></td>
        </tr>
        <? } ?>
        <?
				  $suits_tuxedo_satin_waist_band = $row00["suits_tuxedo_satin_waist_band"];
				  if ($suits_tuxedo_satin_waist_band != "1") {
				  $suits_tuxedo_satin_waist_band_price = 0;
				  } else if ($suits_tuxedo_satin_waist_band == "1") {
				  $sqlprice11 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Tuxedo Satin Waist Band' ";
				  $queryprice11 = mysql_db_query($dbname, $sqlprice11) or die("Can't QueryPrice11");
				  $rowprice11 = mysql_fetch_array($queryprice11);
				  $suits_tuxedo_satin_waist_band_price_extra = $rowprice11["0"];
				  $suits_tuxedo_satin_waist_band_price = $suits_tuxedo_satin_waist_band_price_extra;
				  }
				  ?>
        <? if($suits_tuxedo_satin_waist_band_price == "0") { ?>
        <? } else if($suits_tuxedo_satin_waist_band_price != "0") { ?>
        <tr>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">&nbsp;&nbsp;Tuxedo Satin Waist Band </div></td>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
              <?=$currency?>
              <?=$suits_tuxedo_satin_waist_band_price?>
            </div></td>
        </tr>
        <? } ?>
        <?
				  $suits_very_extended_waistband = $row00["suits_very_extended_waistband"];
				  if ($suits_very_extended_waistband != "0") {
				  $suits_very_extended_waistband_price = 0;
				  } else if ($suits_very_extended_waistband == "0") {
				  $sqlprice12 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Very Extended Waistband' ";
				  $queryprice12 = mysql_db_query($dbname, $sqlprice12) or die("Can't QueryPrice12");
				  $rowprice12 = mysql_fetch_array($queryprice12);
				  $suits_very_extended_waistband_price_extra = $rowprice12["0"];
				  $suits_very_extended_waistband_price = $suits_very_extended_waistband_price_extra;
				  }
				  ?>
        <? if($suits_very_extended_waistband_price == "0") { ?>
        <? } else if($suits_very_extended_waistband_price != "0") { ?>
        <tr>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">&nbsp;&nbsp;Very Extended Waistband </div></td>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
              <?=$currency?>
              <?=$suits_very_extended_waistband_price?>
            </div></td>
        </tr>
        <? } ?>
        <?
				  $suits_pants_brand = $row00["suits_pants_brand"];
				  if ($suits_pants_brand == "0") {
				  $suits_pants_brand_price = 0;
				  } else if ($suits_pants_brand != "0") {
				  $sqlprice13 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Pants Branding' ";
				  $queryprice13 = mysql_db_query($dbname, $sqlprice13) or die("Can't QueryPrice13");
				  $rowprice13 = mysql_fetch_array($queryprice13);
				  $suits_pants_brand_price_extra = $rowprice13["0"];
				  $suits_pants_brand_price = $suits_pants_brand_price_extra;
				  }
				  ?>
        <? if($suits_pants_brand_price == "0") { ?>
        <? } else if($suits_pants_brand_price != "0") { ?>
        <tr>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">&nbsp;&nbsp;Pants Branding </div></td>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
              <?=$currency?>
              <?=$suits_pants_brand_price?>
            </div></td>
        </tr>
        <? } ?>
      </table>
      <? } else if ($order_product == "suits_with_vest") { ?>
      <?
   $strSQL2 = " SELECT * FROM admin_fabrics_suits_with_vest WHERE fabricno = '$fabric' "; 
   $objQuery2 = mysql_query($strSQL2) or die ("Error Query [".$strSQL2."]");
   $objResult2 = mysql_fetch_array($objQuery2);
   ?>
      <div style="font-size:14px;"><strong>&nbsp;&nbsp;Suits With Vest
        <?=$objResult2["color"]?>
        <?=$objResult2["pattern"]?>
        </strong></div>
      <br>
      <?
				  $order_id = $objResult1["order_id"]; 
				  $product_id = $objResult1["product_id"];
				  $sql00 =	" SELECT * FROM customize_suits_with_vest_design WHERE order_id = '$order_id' AND product_id = '$product_id' ";
				  $query00 = mysql_db_query($dbname, $sql00) or die("Can't Query00");
				  $row00 = mysql_fetch_array($query00);
				  ?>
      <table width="600" style="vertical-align:middle;">
        <?
				  $suits_with_vest_fabric_no = $objResult2["fabricno"];
                  $sql01 =	" SELECT * FROM admin_fabrics_suits_with_vest WHERE fabricno = '$suits_with_vest_fabric_no' ";
				  $query01 = mysql_db_query($dbname, $sql01) or die("Can't Query01");
				  $row01 = mysql_fetch_array($query01);
				  $fabrics_type = $row01["type"];
				  $fabrics_brand = $row01["brand"];
				  
				  if ($row01["type"] != '') {
				  $sql001 = " SELECT `fabrictype_".$id_user."` FROM admin_fabrictype WHERE fabrictype_name = '$fabrics_type' AND fabrictype_product = 'Suits' ";
				  $query001 = mysql_db_query($dbname, $sql001) or die("Can't Query001");
				  $row001 = mysql_fetch_array($query001);
				  
				  $sql0001 = " SELECT `fabrictype_".$id_user."` FROM admin_fabrictype WHERE fabrictype_name = '$fabrics_type' AND fabrictype_product = 'Vest' ";
				  $query0001 = mysql_db_query($dbname, $sql0001) or die("Can't Query0001");
				  $row0001 = mysql_fetch_array($query0001);

				  $suits_fabric_price = $row001["0"];
				  $vest_fabric_price = $row0001["0"];
				  
				  $suits_with_vest_fabric_price = $suits_fabric_price + $vest_fabric_price;
				  } else if ($row01["brand"] != '') {	  
				  $sql002 = " SELECT `fabricbrand_".$id_user."` FROM admin_fabricbrand WHERE fabricbrand_name = '$fabrics_brand' AND fabricbrand_product = 'Suits' ";
				  $query002 = mysql_db_query($dbname, $sql002) or die("Can't Query002");
				  $row002 = mysql_fetch_array($query002);	
				  
				  $sql0002 = " SELECT `fabricbrand_".$id_user."` FROM admin_fabricbrand WHERE fabricbrand_name = '$fabrics_brand' AND fabricbrand_product = 'Vest' ";
				  $query0002 = mysql_db_query($dbname, $sql0002) or die("Can't Query0002");
				  $row0002 = mysql_fetch_array($query0002);	
				  
				  $suits_fabric_price = $row002["0"];
				  $vest_fabric_price = $row0002["0"];
				  
				  $suits_with_vest_fabric_price = $suits_fabric_price + $vest_fabric_price;
				  }
				  ?>
        <tr>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">&nbsp;&nbsp;Fabric Number :
              <?=$objResult2["fabricno"]?>
            </div></td>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
              <?=$currency?>
              <?=$suits_with_vest_fabric_price?>
            </div></td>
        </tr>
        <?
                  $suits_with_vest_jacket_button_number = $row00["suits_with_vest_jacket_button_number"];
				  $sql03 = " SELECT price FROM admin_buttons_suits WHERE buttonno = '$suits_with_vest_jacket_button_number' ";
				  $query03 = mysql_db_query($dbname, $sql03) or die("Can't Query03");
				  $row03 = mysql_fetch_array($query03);
				  ?>
        <tr>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">&nbsp;&nbsp;Jacket Button Number :
              <?=$row00["suits_with_vest_jacket_button_number"]?>
            </div></td>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
              <?=$currency?>
              <?=$row03["price"]?>
            </div></td>
        </tr>
        <?
                  $suits_with_vest_pants_button_number = $row00["suits_with_vest_pants_button_number"];
				  $sql04 = " SELECT price FROM admin_buttons_suits WHERE buttonno = '$suits_with_vest_pants_button_number' ";
				  $query04 = mysql_db_query($dbname, $sql04) or die("Can't Query04");
				  $row04 = mysql_fetch_array($query04);
				  ?>
        <tr>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">&nbsp;&nbsp;Pants Button Number :
              <?=$row00["suits_with_vest_pants_button_number"]?>
            </div></td>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
              <?=$currency?>
              <?=$row04["price"]?>
            </div></td>
        </tr>
        <?
                  $suits_with_vest_vest_button_number = $row00["suits_with_vest_vest_button_number"];
				  $sql05 = " SELECT price FROM admin_buttons_suits WHERE buttonno = '$suits_with_vest_vest_button_number' ";
				  $query05 = mysql_db_query($dbname, $sql05) or die("Can't Query05");
				  $row05 = mysql_fetch_array($query05);
				  ?>
        <tr>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">&nbsp;&nbsp;Vest Button Number :
              <?=$row00["suits_with_vest_vest_button_number"]?>
            </div></td>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
              <?=$currency?>
              <?=$row05["price"]?>
            </div></td>
        </tr>
        <?
                  $suits_with_vest_embroidery_collar_initial_or_name = $row00["suits_with_vest_embroidery_collar_initial_or_name"];
				  if ($suits_with_vest_embroidery_collar_initial_or_name == "") {
				  $suits_with_vest_embroidery_collar_initial_or_name_price = 0;
				  } else if ($suits_with_vest_embroidery_collar_initial_or_name != "") {
				  $sqlprice1 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Embroidery Collar Felt' ";
				  $queryprice1 = mysql_db_query($dbname, $sqlprice1) or die("Can't QueryPrice1");
				  $rowprice1 = mysql_fetch_array($queryprice1);
				  $suits_with_vest_embroidery_collar_initial_or_name_price_extra = $rowprice1["0"];
				  $suits_with_vest_embroidery_collar_initial_or_name_price = $suits_with_vest_embroidery_collar_initial_or_name_price_extra;
				  }
				  ?>
        <? if($suits_with_vest_embroidery_collar_initial_or_name_price == "0") { ?>
        <? } else if($suits_with_vest_embroidery_collar_initial_or_name_price != "0") { ?>
        <tr>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">&nbsp;&nbsp;Embroidery Collar Felt </div></td>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
              <?=$currency?>
              <?=$suits_with_vest_embroidery_collar_initial_or_name_price?>
            </div></td>
        </tr>
        <? } ?>
        <?
                  $suits_with_vest_brand = $row00["suits_with_vest_brand"];
				  if ($suits_with_vest_brand == "0") {
				  $suits_with_vest_brand_price = 0;
				  } else if ($suits_with_vest_brand != "0") {
				  $sqlprice2 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Jacket Branding' ";
				  $queryprice2 = mysql_db_query($dbname, $sqlprice2) or die("Can't QueryPrice2");
				  $rowprice2 = mysql_fetch_array($queryprice2);
				  $suits_with_vest_brand_price_extra = $rowprice2["0"];
				  $suits_with_vest_brand_price = $suits_with_vest_brand_price_extra;
				  }
				  ?>
        <? if($suits_with_vest_brand_price == "0") { ?>
        <? } else if($suits_with_vest_brand_price != "0") { ?>
        <tr>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">&nbsp;&nbsp;Jacket Branding </div></td>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
              <?=$currency?>
              <?=$suits_with_vest_brand_price?>
            </div></td>
        </tr>
        <? } ?>
        <?
                  $suits_with_vest_pick_stitch = $row00["suits_with_vest_pick_stitch"];
				  $suits_with_vest_pick_stitch_sleeves = $row00["suits_with_vest_pick_stitch_sleeves"];
				  if ($suits_with_vest_pick_stitch == "0") {
				  $suits_with_vest_pick_stitch_sleeves_price = 0;
				  } else if ($suits_with_vest_pick_stitch == "1" && $suits_with_vest_pick_stitch_sleeves != "DEFAULT TONAL") {
				  $sqlprice3 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Sleeves Pick Stitch' ";
				  $queryprice3 = mysql_db_query($dbname, $sqlprice3) or die("Can't QueryPrice3");
				  $rowprice3 = mysql_fetch_array($queryprice3);
				  $suits_with_vest_pick_stitch_sleeves_price_extra = $rowprice3["0"];
				  $suits_with_vest_pick_stitch_sleeves_price = $suits_with_vest_pick_stitch_sleeves_price_extra;
				  }
				  ?>
        <? if($suits_with_vest_pick_stitch_sleeves_price == "0") { ?>
        <? } else if($suits_with_vest_pick_stitch_sleeves_price != "0") { ?>
        <tr>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">&nbsp;&nbsp;Sleeves Pick Stitch </div></td>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
              <?=$currency?>
              <?=$suits_with_vest_pick_stitch_sleeves_price?>
            </div></td>
        </tr>
        <? } ?>
        <?
                  $suits_with_vest_pick_stitch = $row00["suits_with_vest_pick_stitch"];
				  $suits_with_vest_pick_stitch_vest = $row00["suits_with_vest_pick_stitch_vest"];
				  if ($suits_with_vest_pick_stitch == "0") {
				  $suits_with_vest_pick_stitch_vest_price = 0;
				  } else if ($suits_with_vest_pick_stitch == "1" && $suits_with_vest_pick_stitch_vest != "DEFAULT TONAL") {
				  $sqlprice4 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Vent Pick Stitch' ";
				  $queryprice4 = mysql_db_query($dbname, $sqlprice4) or die("Can't QueryPrice4");
				  $rowprice4 = mysql_fetch_array($queryprice4);
				  $suits_with_vest_pick_stitch_vest_price_extra = $rowprice4["0"];
				  $suits_with_vest_pick_stitch_vest_price = $suits_with_vest_pick_stitch_vest_price_extra;
				  }
				  ?>
        <? if($suits_with_vest_pick_stitch_vest_price == "0") { ?>
        <? } else if($suits_with_vest_pick_stitch_vest_price != "0") { ?>
        <tr>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">&nbsp;&nbsp;Vent Pick Stitch </div></td>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
              <?=$currency?>
              <?=$suits_with_vest_pick_stitch_vest_price?>
            </div></td>
        </tr>
        <? } ?>
        <?
				  $suits_with_vest_elbow_patch = $row00["suits_with_vest_elbow_patch"];
				  if ($suits_with_vest_elbow_patch == "") {
				  $suits_with_vest_elbow_patch_price = 0;
				  } else if ($suits_with_vest_elbow_patch != "") {
				  $sqlprice5 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Elbow Patch' ";
				  $queryprice5 = mysql_db_query($dbname, $sqlprice5) or die("Can't QueryPrice5");
				  $rowprice5 = mysql_fetch_array($queryprice5);
				  $suits_with_vest_elbow_patch_price_extra = $rowprice5["0"];
				  $suits_with_vest_elbow_patch_price = $suits_with_vest_elbow_patch_price_extra;
				  }
				  ?>
        <? if($suits_with_vest_elbow_patch_price == "0") { ?>
        <? } else if($suits_with_vest_elbow_patch_price != "0") { ?>
        <tr>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">&nbsp;&nbsp;Elbow Patch </div></td>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
              <?=$currency?>
              <?=$suits_with_vest_elbow_patch_price?>
            </div></td>
        </tr>
        <? } ?>
        <?
				  $suits_with_vest_canvas = $row00["suits_with_vest_canvas"];
				  if ($suits_with_vest_canvas != "3") {
				  $suits_with_vest_canvas_price = 0;
				  } else if ($jacket_canvas == "3") {
				  $sqlprice6 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Full Canvas' ";
				  $queryprice6 = mysql_db_query($dbname, $sqlprice6) or die("Can't QueryPrice6");
				  $rowprice6 = mysql_fetch_array($queryprice6);
				  $suits_with_vest_canvas_price_extra = $rowprice6["0"];
				  $suits_with_vest_canvas_price = $suits_with_vest_canvas_price_extra;
				  }
				  ?>
        <? if($suits_with_vest_canvas_price == "0") { ?>
        <? } else if($suits_with_vest_canvas_price != "0") { ?>
        <tr>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">&nbsp;&nbsp;Full Canvas </div></td>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
              <?=$currency?>
              <?=$suits_with_vest_canvas_price?>
            </div></td>
        </tr>
        <? } ?>
        <?
				  $suits_with_vest_coin_pocket_inside = $row00["suits_with_vest_coin_pocket_inside"];
				  if ($suits_with_vest_coin_pocket_inside != "1") {
				  $suits_with_vest_coin_pocket_inside_price = 0;
				  } else if ($suits_with_vest_coin_pocket_inside == "1") {
				  $sqlprice7 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Coin Pocket Inside' ";
				  $queryprice7 = mysql_db_query($dbname, $sqlprice7) or die("Can't QueryPrice7");
				  $rowprice7 = mysql_fetch_array($queryprice7);
				  $suits_with_vest_coin_pocket_inside_price_extra = $rowprice7["0"];
				  $suits_with_vest_coin_pocket_inside_price = $suits_with_vest_coin_pocket_inside_price_extra;
				  }
				  ?>
        <? if($suits_with_vest_coin_pocket_inside_price == "0") { ?>
        <? } else if($suits_with_vest_coin_pocket_inside_price != "0") { ?>
        <tr>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">&nbsp;&nbsp;Coin Pocket Inside </div></td>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
              <?=$currency?>
              <?=$suits_with_vest_coin_pocket_inside_price?>
            </div></td>
        </tr>
        <? } ?>
        <?
				  $suits_with_vest_suspender_buttons_inside = $row00["suits_with_vest_suspender_buttons_inside"];
				  if ($suits_with_vest_suspender_buttons_inside != "1") {
				  $suits_with_vest_suspender_buttons_inside_price = 0;
			 	  } else if ($suits_with_vest_suspender_buttons_inside == "1") {
				  $sqlprice8 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Suspender Buttons Inside' ";
				  $queryprice8 = mysql_db_query($dbname, $sqlprice8) or die("Can't QueryPrice8");
				  $rowprice8 = mysql_fetch_array($queryprice8);
				  $suits_with_vest_suspender_buttons_inside_price_extra = $rowprice8["0"];
				  $suits_with_vest_suspender_buttons_inside_price = $suits_with_vest_suspender_buttons_inside_price_extra;
				  }
				  ?>
        <? if($suits_with_vest_suspender_buttons_inside_price == "0") { ?>
        <? } else if($suits_with_vest_suspender_buttons_inside_price != "0") { ?>
        <tr>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">&nbsp;&nbsp;Suspender Buttons Inside </div></td>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
              <?=$currency?>
              <?=$suits_with_vest_suspender_buttons_inside_price?>
            </div></td>
        </tr>
        <? } ?>
        <?
				  $suits_with_vest_split_tabs_back = $row00["suits_with_vest_split_tabs_back"];
				  if ($suits_with_vest_split_tabs_back != "1") {
				  $suits_with_vest_split_tabs_back_price = 0;
				  } else if ($suits_with_vest_split_tabs_back == "1") {
				  $sqlprice9 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Split Tabs Back' ";
				  $queryprice9 = mysql_db_query($dbname, $sqlprice9) or die("Can't QueryPrice9");
				  $rowprice9 = mysql_fetch_array($queryprice9);
				  $suits_with_vest_split_tabs_back_price_extra = $rowprice9["0"];
				  $suits_with_vest_split_tabs_back_price = $suits_with_vest_split_tabs_back_price_extra;
				  }
				  ?>
        <? if($suits_with_vest_split_tabs_back_price == "0") { ?>
        <? } else if($suits_with_vest_split_tabs_back_price != "0") { ?>
        <tr>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">&nbsp;&nbsp;Split Tabs Back </div></td>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
              <?=$currency?>
              <?=$suits_with_vest_split_tabs_back_price?>
            </div></td>
        </tr>
        <? } ?>
        <?
				  $suits_with_vest_tuxedo_satin = $row00["suits_with_vest_tuxedo_satin"];
				  if ($suits_with_vest_tuxedo_satin != "1") {
				  $suits_with_vest_tuxedo_satin_price = 0;
				  } else if ($suits_with_vest_tuxedo_satin == "1") {
				  $sqlprice10 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Tuxedo Satin on Side' ";
				  $queryprice10 = mysql_db_query($dbname, $sqlprice10) or die("Can't QueryPrice10");
				  $rowprice10 = mysql_fetch_array($queryprice10);
				  $suits_with_vest_tuxedo_satin_price_extra = $rowprice10["0"];
				  $suits_with_vest_tuxedo_satin_price = $suits_with_vest_tuxedo_satin_price_extra;
				  }
				  ?>
        <? if($suits_with_vest_tuxedo_satin_price == "0") { ?>
        <? } else if($suits_with_vest_tuxedo_satin_price != "0") { ?>
        <tr>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">&nbsp;&nbsp;Tuxedo Satin on Side </div></td>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
              <?=$currency?>
              <?=$suits_with_vest_tuxedo_satin_price?>
            </div></td>
        </tr>
        <? } ?>
        <?
				  $suits_with_vest_tuxedo_satin_waist_band = $row00["suits_with_vest_tuxedo_satin_waist_band"];
				  if ($suits_with_vest_tuxedo_satin_waist_band != "1") {
				  $suits_with_vest_tuxedo_satin_waist_band_price = 0;
				  } else if ($suits_with_vest_tuxedo_satin_waist_band == "1") {
				  $sqlprice11 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Tuxedo Satin Waist Band' ";
				  $queryprice11 = mysql_db_query($dbname, $sqlprice11) or die("Can't QueryPrice11");
				  $rowprice11 = mysql_fetch_array($queryprice11);
				  $suits_with_vest_tuxedo_satin_waist_band_price_extra = $rowprice11["0"];
				  $suits_with_vest_tuxedo_satin_waist_band_price = $suits_with_vest_tuxedo_satin_waist_band_price_extra;
				  }
				  ?>
        <? if($suits_with_vest_tuxedo_satin_waist_band_price == "0") { ?>
        <? } else if($suits_with_vest_tuxedo_satin_waist_band_price != "0") { ?>
        <tr>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">&nbsp;&nbsp;Tuxedo Satin Waist Band </div></td>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
              <?=$currency?>
              <?=$suits_with_vest_tuxedo_satin_waist_band_price?>
            </div></td>
        </tr>
        <? } ?>
        <?
				  $suits_with_vest_very_extended_waistband = $row00["suits_with_vest_very_extended_waistband"];
				  if ($suits_with_vest_very_extended_waistband != "0") {
				  $suits_with_vest_very_extended_waistband_price = 0;
				  } else if ($suits_with_vest_very_extended_waistband == "0") {
				  $sqlprice12 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Very Extended Waistband' ";

				  $queryprice12 = mysql_db_query($dbname, $sqlprice12) or die("Can't QueryPrice12");
				  $rowprice12 = mysql_fetch_array($queryprice12);
				  $suits_with_vest_very_extended_waistband_price_extra = $rowprice12["0"];
				  $suits_with_vest_very_extended_waistband_price = $suits_with_vest_very_extended_waistband_price_extra;
				  }
				  ?>
        <? if($suits_with_vest_very_extended_waistband_price == "0") { ?>
        <? } else if($suits_with_vest_very_extended_waistband_price != "0") { ?>
        <tr>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">&nbsp;&nbsp;Very Extended Waistband </div></td>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
              <?=$currency?>
              <?=$suits_with_vest_very_extended_waistband_price?>
            </div></td>
        </tr>
        <? } ?>
        <?
				  $suits_with_vest_pants_brand = $row00["suits_with_vest_pants_brand"];
				  if ($suits_with_vest_pants_brand == "0") {
				  $suits_with_vest_pants_brand_price = 0;
				  } else if ($suits_with_vest_pants_brand != "0") {
				  $sqlprice13 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Pants Branding' ";
				  $queryprice13 = mysql_db_query($dbname, $sqlprice13) or die("Can't QueryPrice13");
				  $rowprice13 = mysql_fetch_array($queryprice13);
				  $suits_with_vest_pants_brand_price_extra = $rowprice13["0"];
				  $suits_with_vest_pants_brand_price = $suits_with_vest_pants_brand_price_extra;
				  }
				  ?>
        <? if($suits_with_vest_pants_brand_price == "0") { ?>
        <? } else if($suits_with_vest_pants_brand_price != "0") { ?>
        <tr>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">&nbsp;&nbsp;Pants Branding </div></td>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
              <?=$currency?>
              <?=$suits_with_vest_pants_brand_price?>
            </div></td>
        </tr>
        <? } ?>
      </table>
      <? } else if ($order_product == "ties") { ?>
      <?
   $strSQL2 = " SELECT * FROM admin_fabrics_ties WHERE fabricno = '$fabric' "; 
   $objQuery2 = mysql_query($strSQL2) or die ("Error Query [".$strSQL2."]");
   $objResult2 = mysql_fetch_array($objQuery2);
   ?>
      <div style="font-size:14px;"><strong>&nbsp;&nbsp;Ties
        <?=$objResult2["color"]?>
        <?=$objResult2["pattern"]?>
        <?=$objResult2["design"]?>
        </strong></div>
      <div style="font-size:14px;"><strong>&nbsp;&nbsp;Fabric Number
        <?=$objResult2["fabricno"]?>
        </strong></div>
      <? } else if ($order_product == "tuxedo_jacket") { ?>
      <?
   $strSQL2 = " SELECT * FROM admin_fabrics_tuxedo_jacket WHERE fabricno = '$fabric' "; 
   $objQuery2 = mysql_query($strSQL2) or die ("Error Query [".$strSQL2."]");
   $objResult2 = mysql_fetch_array($objQuery2);
   ?>
      <div style="font-size:14px;"><strong>&nbsp;&nbsp;Tuxedo Jacket
        <?=$objResult2["color"]?>
        <?=$objResult2["pattern"]?>
        </strong></div>
      <br>
      <?
				  $order_id = $objResult1["order_id"]; 
				  $product_id = $objResult1["product_id"];
				  $sql00 =	" SELECT * FROM customize_tuxedo_jacket_design WHERE order_id = '$order_id' AND product_id = '$product_id' ";
				  $query00 = mysql_db_query($dbname, $sql00) or die("Can't Query00");
				  $row00 = mysql_fetch_array($query00);
				  ?>
      <table width="600" style="vertical-align:middle;">
        <?
				  $tuxedo_jacket_fabric_no = $objResult2["fabricno"];
                  $sql01 =	" SELECT * FROM admin_fabrics_tuxedo_jacket WHERE fabricno = '$tuxedo_jacket_fabric_no' ";
				  $query01 = mysql_db_query($dbname, $sql01) or die("Can't Query01");
				  $row01 = mysql_fetch_array($query01);
				  $fabrics_type = $row01["type"];
				  $fabrics_brand = $row01["brand"];
				  
				  if ($row01["type"] != '') {
				  $sql001 = " SELECT `fabrictype_".$id_user."` FROM admin_fabrictype WHERE fabrictype_name = '$fabrics_type' AND fabrictype_product = 'Jacket' ";
				  $query001 = mysql_db_query($dbname, $sql001) or die("Can't Query001");
				  $row001 = mysql_fetch_array($query001);
				  $tuxedo_jacket_fabric_price = $row001["0"];
				  
				  } else if ($row01["brand"] != '') {
				  $sql002 = " SELECT `fabricbrand_".$id_user."` FROM admin_fabricbrand WHERE fabricbrand_name = '$fabrics_brand' AND fabricbrand_product = 'Jacket' ";
				  $query002 = mysql_db_query($dbname, $sql002) or die("Can't Query002");
				  $row002 = mysql_fetch_array($query002);	
				  $tuxedo_jacket_fabric_price = $row002["0"];
				  }
				  ?>
        <tr>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">&nbsp;&nbsp;Fabric Number :
              <?=$objResult2["fabricno"]?>
            </div></td>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
              <?=$currency?>
              <?=$tuxedo_jacket_fabric_price?>
            </div></td>
        </tr>
        <?
                  $tuxedo_jacket_jacket_button_number = $row00["tuxedo_jacket_jacket_button_number"];
				  $sql03 = " SELECT price FROM admin_buttons_suits WHERE buttonno = '$tuxedo_jacket_jacket_button_number' ";
				  $query03 = mysql_db_query($dbname, $sql03) or die("Can't Query03");
				  $row03 = mysql_fetch_array($query03);
				  ?>
        <tr>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">&nbsp;&nbsp;Button Number :
              <?=$row00["tuxedo_jacket_jacket_button_number"]?>
            </div></td>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
              <?=$currency?>
              <?=$row03["price"]?>
            </div></td>
        </tr>
        <?
                  $tuxedo_jacket_embroidery_collar_initial_or_name = $row00["tuxedo_jacket_embroidery_collar_initial_or_name"];
				  if ($tuxedo_jacket_embroidery_collar_initial_or_name == "") {
				  $tuxedo_jacket_embroidery_collar_initial_or_name_price = 0;
				  } else if ($tuxedo_jacket_embroidery_collar_initial_or_name != "") {
				  $sqlprice1 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Embroidery Collar Felt' ";
				  $queryprice1 = mysql_db_query($dbname, $sqlprice1) or die("Can't QueryPrice1");
				  $rowprice1 = mysql_fetch_array($queryprice1);
				  $tuxedo_jacket_embroidery_collar_initial_or_name_price_extra = $rowprice1["0"];
				  $tuxedo_jacket_embroidery_collar_initial_or_name_price = $tuxedo_jacket_embroidery_collar_initial_or_name_price_extra;
				  }
				  ?>
        <? if($tuxedo_jacket_embroidery_collar_initial_or_name_price == "0") { ?>
        <? } else if($tuxedo_jacket_embroidery_collar_initial_or_name_price != "0") { ?>
        <tr>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">&nbsp;&nbsp;Embroidery Collar Felt </div></td>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
              <?=$currency?>
              <?=$tuxedo_jacket_embroidery_collar_initial_or_name_price?>
            </div></td>
        </tr>
        <? } ?>
        <?
                  $tuxedo_jacket_brand = $row00["tuxedo_jacket_brand"];
				  if ($tuxedo_jacket_brand == "0") {
				  $tuxedo_jacket_brand_price = 0;
				  } else if ($tuxedo_jacket_brand != "0") {
				  $sqlprice2 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Jacket Branding' ";
				  $queryprice2 = mysql_db_query($dbname, $sqlprice2) or die("Can't QueryPrice2");
				  $rowprice2 = mysql_fetch_array($queryprice2);
				  $tuxedo_jacket_brand_price_extra = $rowprice2["0"];
				  $tuxedo_jacket_brand_price = $tuxedo_jacket_brand_price_extra;
				  }
				  ?>
        <? if($tuxedo_jacket_brand_price == "0") { ?>
        <? } else if($tuxedo_jacket_brand_price != "0") { ?>
        <tr>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">&nbsp;&nbsp;Jacket Branding </div></td>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
              <?=$currency?>
              <?=$tuxedo_jacket_brand_price?>
            </div></td>
        </tr>
        <? } ?>
        <?
                  $tuxedo_jacket_pick_stitch = $row00["tuxedo_jacket_pick_stitch"];
				  $tuxedo_jacket_pick_stitch_sleeves = $row00["tuxedo_jacket_pick_stitch_sleeves"];
				  if ($tuxedo_jacket_pick_stitch == "0") {
				  $tuxedo_jacket_pick_stitch_sleeves_price = 0;
				  } else if ($tuxedo_jacket_pick_stitch == "1" && $tuxedo_jacket_pick_stitch_sleeves != "DEFAULT TONAL") {
				  $sqlprice3 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Sleeves Pick Stitch' ";
				  $queryprice3 = mysql_db_query($dbname, $sqlprice3) or die("Can't QueryPrice3");
				  $rowprice3 = mysql_fetch_array($queryprice3);
				  $tuxedo_jacket_pick_stitch_sleeves_price_extra = $rowprice3["0"];
				  $tuxedo_jacket_pick_stitch_sleeves_price = $tuxedo_jacket_pick_stitch_sleeves_price_extra;
				  }
				  ?>
        <? if($tuxedo_jacket_pick_stitch_sleeves_price == "0") { ?>
        <? } else if($tuxedo_jacket_pick_stitch_sleeves_price != "0") { ?>
        <tr>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">&nbsp;&nbsp;Sleeves Pick Stitch </div></td>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
              <?=$currency?>
              <?=$tuxedo_jacket_pick_stitch_sleeves_price?>
            </div></td>
        </tr>
        <? } ?>
        <?
                  $tuxedo_jacket_pick_stitch = $row00["tuxedo_jacket_pick_stitch"];
				  $tuxedo_jacket_pick_stitch_vest = $row00["tuxedo_jacket_pick_stitch_vest"];
				  if ($tuxedo_jacket_pick_stitch == "0") {
				  $tuxedo_jacket_pick_stitch_vest_price = 0;
				  } else if ($tuxedo_jacket_pick_stitch == "1" && $tuxedo_jacket_pick_stitch_vest != "DEFAULT TONAL") {
				  $sqlprice4 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Vent Pick Stitch' ";
				  $queryprice4 = mysql_db_query($dbname, $sqlprice4) or die("Can't QueryPrice4");
				  $rowprice4 = mysql_fetch_array($queryprice4);
				  $tuxedo_jacket_pick_stitch_vest_price_extra = $rowprice4["0"];
				  $tuxedo_jacket_pick_stitch_vest_price = $tuxedo_jacket_pick_stitch_vest_price_extra;
				  }
				  ?>
        <? if($tuxedo_jacket_pick_stitch_vest_price == "0") { ?>
        <? } else if($tuxedo_jacket_pick_stitch_vest_price != "0") { ?>
        <tr>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">&nbsp;&nbsp;Vent Pick Stitch </div></td>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
              <?=$currency?>
              <?=$tuxedo_jacket_pick_stitch_vest_price?>
            </div></td>
        </tr>
        <? } ?>
        <?
				  $tuxedo_jacket_elbow_patch = $row00["tuxedo_jacket_elbow_patch"];
				  if ($tuxedo_jacket_elbow_patch == "") {
				  $tuxedo_jacket_elbow_patch_price = 0;
				  } else if ($tuxedo_jacket_elbow_patch != "") {
				  $sqlprice5 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Elbow Patch' ";
				  $queryprice5 = mysql_db_query($dbname, $sqlprice5) or die("Can't QueryPrice5");
				  $rowprice5 = mysql_fetch_array($queryprice5);
				  $tuxedo_jacket_elbow_patch_price_extra = $rowprice5["0"];
				  $tuxedo_jacket_elbow_patch_price = $tuxedo_jacket_elbow_patch_price_extra;
				  }
				  ?>
        <? if($tuxedo_jacket_elbow_patch_price == "0") { ?>
        <? } else if($tuxedo_jacket_elbow_patch_price != "0") { ?>
        <tr>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">&nbsp;&nbsp;Elbow Patch </div></td>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
              <?=$currency?>
              <?=$tuxedo_jacket_elbow_patch_price?>
            </div></td>
        </tr>
        <? } ?>
        <?
				  $tuxedo_jacket_canvas = $row00["tuxedo_jacket_canvas"];
				  if ($tuxedo_jacket_canvas != "3") {
				  $tuxedo_jacket_canvas_price = 0;
				  } else if ($tuxedo_jacket_canvas == "3") {
				  $sqlprice6 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Full Canvas' ";
				  $queryprice6 = mysql_db_query($dbname, $sqlprice6) or die("Can't QueryPrice6");
				  $rowprice6 = mysql_fetch_array($queryprice6);
				  $tuxedo_jacket_canvas_price_extra = $rowprice6["0"];
				  $tuxedo_jacket_canvas_price = $tuxedo_jacket_canvas_price_extra;
				  }
				  ?>
        <? if($tuxedo_jacket_canvas_price == "0") { ?>
        <? } else if($tuxedo_jacket_canvas_price != "0") { ?>
        <tr>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">&nbsp;&nbsp;Full Canvas </div></td>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
              <?=$currency?>
              <?=$tuxedo_jacket_canvas_price?>
            </div></td>
        </tr>
        <? } ?>
        <?
				  $tuxedo_jacket_chest_pocket_satin_fabric = $row00["tuxedo_jacket_chest_pocket_satin_fabric"];
				  if ($tuxedo_jacket_chest_pocket_satin_fabric == "") {
				  $tuxedo_jacket_chest_pocket_satin_fabric_price = 0;
				  } else if ($tuxedo_jacket_chest_pocket_satin_fabric != "") {
				  $sqlprice7 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Satin Option on Chest Pocket' ";
				  $queryprice7 = mysql_db_query($dbname, $sqlprice7) or die("Can't QueryPrice7");
				  $rowprice7 = mysql_fetch_array($queryprice7);
				  $tuxedo_jacket_chest_pocket_satin_fabric_price_extra = $rowprice7["0"];
				  $tuxedo_jacket_chest_pocket_satin_fabric_price = $tuxedo_jacket_chest_pocket_satin_fabric_price_extra;
				  }
				  ?>
        <? if($tuxedo_jacket_chest_pocket_satin_fabric_price == "0") { ?>
        <? } else if($tuxedo_jacket_chest_pocket_satin_fabric_price != "0") { ?>
        <tr>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">&nbsp;&nbsp;Satin Option on Chest Pocket </div></td>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
              <?=$currency?>
              <?=$tuxedo_jacket_chest_pocket_satin_fabric_price?>
            </div></td>
        </tr>
        <? } ?>
        <?
				  $tuxedo_jacket_lower_pocket_satin_fabric = $row00["tuxedo_jacket_lower_pocket_satin_fabric"];
				  if ($tuxedo_jacket_lower_pocket_satin_fabric == "") {
				  $tuxedo_jacket_lower_pocket_satin_fabric_price = 0;
				  } else if ($tuxedo_jacket_lower_pocket_satin_fabric != "") {
				  $sqlprice8 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Satin Option on Lower Pocket' ";
				  $queryprice8 = mysql_db_query($dbname, $sqlprice8) or die("Can't QueryPrice8");
				  $rowprice8 = mysql_fetch_array($queryprice8);
				  $tuxedo_jacket_lower_pocket_satin_fabric_price_extra = $rowprice8["0"];
				  $tuxedo_jacket_lower_pocket_satin_fabric_price = $tuxedo_jacket_lower_pocket_satin_fabric_price_extra;
				  }
				  ?>
        <? if($tuxedo_jacket_lower_pocket_satin_fabric_price == "0") { ?>
        <? } else if($tuxedo_jacket_lower_pocket_satin_fabric_price != "0") { ?>
        <tr>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">&nbsp;&nbsp;Satin Option on Lower Pocket </div></td>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
              <?=$currency?>
              <?=$tuxedo_jacket_lower_pocket_satin_fabric_price?>
            </div></td>
        </tr>
        <? } ?>
      </table>
      <? } else if ($order_product == "tuxedo_suits") { ?>
      <?
   $strSQL2 = " SELECT * FROM admin_fabrics_tuxedo_suits WHERE fabricno = '$fabric' "; 
   $objQuery2 = mysql_query($strSQL2) or die ("Error Query [".$strSQL2."]");
   $objResult2 = mysql_fetch_array($objQuery2);
   ?>
      <div style="font-size:14px;"><strong>&nbsp;&nbsp;Tuxedo Suits
        <?=$objResult2["color"]?>
        <?=$objResult2["pattern"]?>
        </strong></div>
      <br>
      <?
				  $order_id = $objResult1["order_id"]; 
				  $product_id = $objResult1["product_id"];
				  $sql00 =	" SELECT * FROM customize_tuxedo_suits_design WHERE order_id = '$order_id' AND product_id = '$product_id' ";
				  $query00 = mysql_db_query($dbname, $sql00) or die("Can't Query00");
				  $row00 = mysql_fetch_array($query00);
				  ?>
      <table width="600" style="vertical-align:middle;">
        <?
				  $tuxedo_suits_fabric_no = $objResult2["fabricno"];
                  $sql01 =	" SELECT * FROM admin_fabrics_tuxedo_suits WHERE fabricno = '$tuxedo_suits_fabric_no' ";
				  $query01 = mysql_db_query($dbname, $sql01) or die("Can't Query01");
				  $row01 = mysql_fetch_array($query01);
				  $fabrics_type = $row01["type"];
				  $fabrics_brand = $row01["brand"];
				  
				  if ($row01["type"] != '') {
				  $sql001 = " SELECT `fabrictype_".$id_user."` FROM admin_fabrictype WHERE fabrictype_name = '$fabrics_type' AND fabrictype_product = 'Suits' ";
				  $query001 = mysql_db_query($dbname, $sql001) or die("Can't Query001");
				  $row001 = mysql_fetch_array($query001);
				  $tuxedo_suits_fabric_price = $row001["0"];
				  
				  } else if ($row01["brand"] != '') {
				  $sql002 = " SELECT `fabricbrand_".$id_user."` FROM admin_fabricbrand WHERE fabricbrand_name = '$fabrics_brand' AND fabricbrand_product = 'Suits' ";
				  $query002 = mysql_db_query($dbname, $sql002) or die("Can't Query002");
				  $row002 = mysql_fetch_array($query002);	
				  $tuxedo_suits_fabric_price = $row002["0"];
				  }
				  ?>
        <tr>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">&nbsp;&nbsp;Fabric Number :
              <?=$objResult2["fabricno"]?>
            </div></td>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
              <?=$currency?>
              <?=$tuxedo_suits_fabric_price?>
            </div></td>
        </tr>
        <?
                  $tuxedo_suits_jacket_button_number = $row00["tuxedo_suits_jacket_button_number"];
				  $sql03 = " SELECT price FROM admin_buttons_suits WHERE buttonno = '$tuxedo_suits_jacket_button_number' ";
				  $query03 = mysql_db_query($dbname, $sql03) or die("Can't Query03");
				  $row03 = mysql_fetch_array($query03);
				  ?>
        <tr>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">&nbsp;&nbsp;Jacket Button Number :
              <?=$row00["tuxedo_suits_jacket_button_number"]?>
            </div></td>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
              <?=$currency?>
              <?=$row03["price"]?>
            </div></td>
        </tr>
        <?
                  $tuxedo_suits_pants_button_number = $row00["tuxedo_suits_pants_button_number"];
				  $sql04 = " SELECT price FROM admin_buttons_suits WHERE buttonno = '$tuxedo_suits_pants_button_number' ";
				  $query04 = mysql_db_query($dbname, $sql04) or die("Can't Query04");
				  $row04 = mysql_fetch_array($query04);
				  ?>
        <tr>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">&nbsp;&nbsp;Pants Button Number :
              <?=$row00["tuxedo_suits_pants_button_number"]?>
            </div></td>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
              <?=$currency?>
              <?=$row04["price"]?>
            </div></td>
        </tr>
        <?
                  $tuxedo_suits_embroidery_collar_initial_or_name = $row00["tuxedo_suits_embroidery_collar_initial_or_name"];
				  if ($tuxedo_suits_embroidery_collar_initial_or_name == "") {
				  $tuxedo_suits_embroidery_collar_initial_or_name_price = 0;
				  } else if ($tuxedo_suits_embroidery_collar_initial_or_name != "") {
				  $sqlprice1 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Embroidery Collar Felt' ";
				  $queryprice1 = mysql_db_query($dbname, $sqlprice1) or die("Can't QueryPrice1");
				  $rowprice1 = mysql_fetch_array($queryprice1);
				  $tuxedo_suits_embroidery_collar_initial_or_name_price_extra = $rowprice1["0"];
				  $tuxedo_suits_embroidery_collar_initial_or_name_price = $tuxedo_suits_embroidery_collar_initial_or_name_price_extra;
				  }
				  ?>
        <? if($tuxedo_suits_embroidery_collar_initial_or_name_price == "0") { ?>
        <? } else if($tuxedo_suits_embroidery_collar_initial_or_name_price != "0") { ?>
        <tr>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">&nbsp;&nbsp;Embroidery Collar Felt </div></td>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
              <?=$currency?>
              <?=$tuxedo_suits_embroidery_collar_initial_or_name_price?>
            </div></td>
        </tr>
        <? } ?>
        <?
                  $tuxedo_suits_brand = $row00["tuxedo_suits_brand"];
				  if ($tuxedo_suits_brand == "0") {
				  $tuxedo_suits_brand_price = 0;
				  } else if ($tuxedo_suits_brand != "0") {
				  $sqlprice2 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Jacket Branding' ";
				  $queryprice2 = mysql_db_query($dbname, $sqlprice2) or die("Can't QueryPrice2");
				  $rowprice2 = mysql_fetch_array($queryprice2);
				  $tuxedo_suits_brand_price_extra = $rowprice2["0"];
				  $tuxedo_suits_brand_price = $tuxedo_suits_brand_price_extra;
				  }
				  ?>
        <? if($tuxedo_suits_brand_price == "0") { ?>
        <? } else if($tuxedo_suits_brand_price != "0") { ?>
        <tr>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">&nbsp;&nbsp;Jacket Branding </div></td>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
              <?=$currency?>
              <?=$tuxedo_suits_brand_price?>
            </div></td>
        </tr>
        <? } ?>
        <?
                  $tuxedo_suits_pick_stitch = $row00["tuxedo_suits_pick_stitch"];
				  $tuxedo_suits_pick_stitch_sleeves = $row00["tuxedo_suits_pick_stitch_sleeves"];
				  if ($tuxedo_suits_pick_stitch == "0") {
				  $tuxedo_suits_pick_stitch_sleeves_price = 0;
				  } else if ($tuxedo_suits_pick_stitch == "1" && $tuxedo_suits_pick_stitch_sleeves != "DEFAULT TONAL") {
				  $sqlprice3 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Sleeves Pick Stitch' ";
				  $queryprice3 = mysql_db_query($dbname, $sqlprice3) or die("Can't QueryPrice3");
				  $rowprice3 = mysql_fetch_array($queryprice3);
				  $tuxedo_suits_pick_stitch_sleeves_price_extra = $rowprice3["0"];
				  $tuxedo_suits_pick_stitch_sleeves_price = $tuxedo_suits_pick_stitch_sleeves_price_extra;
				  }
				  ?>
        <? if($tuxedo_suits_pick_stitch_sleeves_price == "0") { ?>
        <? } else if($tuxedo_suits_pick_stitch_sleeves_price != "0") { ?>
        <tr>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">&nbsp;&nbsp;Sleeves Pick Stitch </div></td>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
              <?=$currency?>
              <?=$tuxedo_suits_pick_stitch_sleeves_price?>
            </div></td>
        </tr>
        <? } ?>
        <?
                  $tuxedo_suits_pick_stitch = $row00["tuxedo_suits_pick_stitch"];
				  $tuxedo_suits_pick_stitch_vest = $row00["tuxedo_suits_pick_stitch_vest"];
				  if ($tuxedo_suits_pick_stitch == "0") {
				  $tuxedo_suits_pick_stitch_vest_price = 0;
				  } else if ($tuxedo_suits_pick_stitch == "1" && $tuxedo_suits_pick_stitch_vest != "DEFAULT TONAL") {
				  $sqlprice4 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Vent Pick Stitch' ";
				  $queryprice4 = mysql_db_query($dbname, $sqlprice4) or die("Can't QueryPrice4");
				  $rowprice4 = mysql_fetch_array($queryprice4);
				  $tuxedo_suits_pick_stitch_vest_price_extra = $rowprice4["0"];
				  $tuxedo_suits_pick_stitch_vest_price = $tuxedo_suits_pick_stitch_vest_price_extra;
				  }
				  ?>
        <? if($tuxedo_suits_pick_stitch_vest_price == "0") { ?>
        <? } else if($tuxedo_suits_pick_stitch_vest_price != "0") { ?>
        <tr>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">&nbsp;&nbsp;Vent Pick Stitch </div></td>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
              <?=$currency?>
              <?=$tuxedo_suits_pick_stitch_vest_price?>
            </div></td>
        </tr>
        <? } ?>
        <?
				  $tuxedo_suits_elbow_patch = $row00["tuxedo_suits_elbow_patch"];
				  if ($tuxedo_suits_elbow_patch == "") {
				  $tuxedo_suits_elbow_patch_price = 0;
				  } else if ($tuxedo_suits_elbow_patch != "") {
				  $sqlprice5 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Elbow Patch' ";
				  $queryprice5 = mysql_db_query($dbname, $sqlprice5) or die("Can't QueryPrice5");
				  $rowprice5 = mysql_fetch_array($queryprice5);
				  $tuxedo_suits_elbow_patch_price_extra = $rowprice5["0"];
				  $tuxedo_suits_elbow_patch_price = $tuxedo_suits_elbow_patch_price_extra;
				  }
				  ?>
        <? if($tuxedo_suits_elbow_patch_price == "0") { ?>
        <? } else if($tuxedo_suits_elbow_patch_price != "0") { ?>
        <tr>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">&nbsp;&nbsp;Elbow Patch </div></td>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
              <?=$currency?>
              <?=$tuxedo_suits_elbow_patch_price?>
            </div></td>
        </tr>
        <? } ?>
        <?
				  $tuxedo_suits_canvas = $row00["tuxedo_suits_canvas"];
				  if ($tuxedo_suits_canvas != "3") {
				  $tuxedo_suits_canvas_price = 0;
				  } else if ($tuxedo_suits_canvas == "3") {
				  $sqlprice6 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Full Canvas' ";
				  $queryprice6 = mysql_db_query($dbname, $sqlprice6) or die("Can't QueryPrice6");
				  $rowprice6 = mysql_fetch_array($queryprice6);
				  $tuxedo_suits_canvas_price_extra = $rowprice6["0"];
				  $tuxedo_suits_canvas_price = $tuxedo_suits_canvas_price_extra;
				  }
				  ?>
        <? if($tuxedo_suits_canvas_price == "0") { ?>
        <? } else if($tuxedo_suits_canvas_price != "0") { ?>
        <tr>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">&nbsp;&nbsp;Full Canvas </div></td>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
              <?=$currency?>
              <?=$tuxedo_suits_canvas_price?>
            </div></td>
        </tr>
        <? } ?>
        <?
				  $tuxedo_suits_chest_pocket_satin_fabric = $row00["tuxedo_suits_chest_pocket_satin_fabric"];
				  if ($tuxedo_suits_chest_pocket_satin_fabric == "") {
				  $tuxedo_suits_chest_pocket_satin_fabric_price = 0;
				  } else if ($tuxedo_suits_chest_pocket_satin_fabric != "") {
				  $sqlprice7 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Satin Option on Chest Pocket' ";
				  $queryprice7 = mysql_db_query($dbname, $sqlprice7) or die("Can't QueryPrice7");
				  $rowprice7 = mysql_fetch_array($queryprice7);
				  $tuxedo_suits_chest_pocket_satin_fabric_price_extra = $rowprice7["0"];
				  $tuxedo_suits_chest_pocket_satin_fabric_price = $tuxedo_suits_chest_pocket_satin_fabric_price_extra;
				  }
				  ?>
        <? if($tuxedo_suits_chest_pocket_satin_fabric_price == "0") { ?>
        <? } else if($tuxedo_suits_chest_pocket_satin_fabric_price != "0") { ?>
        <tr>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">&nbsp;&nbsp;Satin Option on Chest Pocket </div></td>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
              <?=$currency?>
              <?=$tuxedo_suits_chest_pocket_satin_fabric_price?>
            </div></td>
        </tr>
        <? } ?>
        <?
				  $tuxedo_suits_lower_pocket_satin_fabric = $row00["tuxedo_suits_lower_pocket_satin_fabric"];
				  if ($tuxedo_suits_lower_pocket_satin_fabric == "") {
				  $tuxedo_suits_lower_pocket_satin_fabric_price = 0;
				  } else if ($tuxedo_suits_lower_pocket_satin_fabric != "") {
				  $sqlprice8 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Satin Option on Lower Pocket' ";
				  $queryprice8 = mysql_db_query($dbname, $sqlprice8) or die("Can't QueryPrice8");
				  $rowprice8 = mysql_fetch_array($queryprice8);
				  $tuxedo_suits_lower_pocket_satin_fabric_price_extra = $rowprice8["0"];
				  $tuxedo_suits_lower_pocket_satin_fabric_price = $tuxedo_suits_lower_pocket_satin_fabric_price_extra;
				  }
				  ?>
        <? if($tuxedo_suits_lower_pocket_satin_fabric_price == "0") { ?>
        <? } else if($tuxedo_suits_lower_pocket_satin_fabric_price != "0") { ?>
        <tr>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">&nbsp;&nbsp;Satin Option on Lower Pocket </div></td>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
              <?=$currency?>
              <?=$tuxedo_suits_lower_pocket_satin_fabric_price?>
            </div></td>
        </tr>
        <? } ?>
        <?
				  $tuxedo_suits_coin_pocket_inside = $row00["tuxedo_suits_coin_pocket_inside"];
				  if ($tuxedo_suits_coin_pocket_inside != "1") {
				  $tuxedo_suits_coin_pocket_inside_price = 0;
				  } else if ($tuxedo_suits_coin_pocket_inside == "1") {
				  $sqlprice9 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Coin Pocket Inside' ";
				  $queryprice9 = mysql_db_query($dbname, $sqlprice9) or die("Can't QueryPrice9");
				  $rowprice9 = mysql_fetch_array($queryprice9);
				  $tuxedo_suits_coin_pocket_inside_price_extra = $rowprice9["0"];
				  $tuxedo_suits_coin_pocket_inside_price = $tuxedo_suits_coin_pocket_inside_price_extra;
				  }
				  ?>
        <? if($tuxedo_suits_coin_pocket_inside_price == "0") { ?>
        <? } else if($tuxedo_suits_coin_pocket_inside_price != "0") { ?>
        <tr>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">&nbsp;&nbsp;Coin Pocket Inside </div></td>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
              <?=$currency?>
              <?=$tuxedo_suits_coin_pocket_inside_price?>
            </div></td>
        </tr>
        <? } ?>
        <?
				  $tuxedo_suits_suspender_buttons_inside = $row00["tuxedo_suits_suspender_buttons_inside"];
				  if ($tuxedo_suits_suspender_buttons_inside != "1") {
				  $tuxedo_suits_suspender_buttons_inside_price = 0;
				  } else if ($tuxedo_suits_suspender_buttons_inside == "1") {
				  $sqlprice10 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Suspender Buttons Inside' ";
				  $queryprice10 = mysql_db_query($dbname, $sqlprice10) or die("Can't QueryPrice10");
				  $rowprice10 = mysql_fetch_array($queryprice10);
				  $tuxedo_suits_suspender_buttons_inside_price_extra = $rowprice10["0"];
				  $tuxedo_suits_suspender_buttons_inside_price = $tuxedo_suits_suspender_buttons_inside_price_extra;
				  }
				  ?>
        <? if($tuxedo_suits_suspender_buttons_inside_price == "0") { ?>
        <? } else if($tuxedo_suits_suspender_buttons_inside_price != "0") { ?>
        <tr>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">&nbsp;&nbsp;Suspender Buttons Inside </div></td>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
              <?=$currency?>
              <?=$tuxedo_suits_suspender_buttons_inside_price?>
            </div></td>
        </tr>
        <? } ?>
        <?
				  $tuxedo_suits_split_tabs_back = $row00["tuxedo_suits_split_tabs_back"];
				  if ($tuxedo_suits_split_tabs_back != "1") {
				  $tuxedo_suits_split_tabs_back_price = 0;
				  } else if ($tuxedo_suits_split_tabs_back == "1") {
				  $sqlprice11 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Split Tabs Back' ";
				  $queryprice11 = mysql_db_query($dbname, $sqlprice11) or die("Can't QueryPrice11");
				  $rowprice11 = mysql_fetch_array($queryprice11);
				  $tuxedo_suits_split_tabs_back_price_extra = $rowprice11["0"];
				  $tuxedo_suits_split_tabs_back_price = $tuxedo_suits_split_tabs_back_price_extra;
				  }
				  ?>
        <? if($tuxedo_suits_split_tabs_back_price == "0") { ?>
        <? } else if($tuxedo_suits_split_tabs_back_price != "0") { ?>
        <tr>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">&nbsp;&nbsp;Split Tabs Back </div></td>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
              <?=$currency?>
              <?=$tuxedo_suits_split_tabs_back_price?>
            </div></td>
        </tr>
        <? } ?>
        <?
				  $tuxedo_suits_tuxedo_satin = $row00["tuxedo_suits_tuxedo_satin"];
				  if ($tuxedo_suits_tuxedo_satin != "1") {
				  $tuxedo_suits_tuxedo_satin_price = 0;
				  } else if ($tuxedo_suits_tuxedo_satin == "1") {
				  $sqlprice12 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Tuxedo Satin on Side' ";
				  $queryprice12 = mysql_db_query($dbname, $sqlprice12) or die("Can't QueryPrice12");
				  $rowprice12 = mysql_fetch_array($queryprice12);
				  $tuxedo_suits_tuxedo_satin_price_extra = $rowprice12["0"];
				  $tuxedo_suits_tuxedo_satin_price = $tuxedo_suits_tuxedo_satin_price_extra;
				  }
				  ?>
        <? if($tuxedo_suits_tuxedo_satin_price == "0") { ?>
        <? } else if($tuxedo_suits_tuxedo_satin_price != "0") { ?>
        <tr>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">&nbsp;&nbsp;Tuxedo Satin on Side </div></td>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
              <?=$currency?>
              <?=$tuxedo_suits_tuxedo_satin_price?>
            </div></td>
        </tr>
        <? } ?>
        <?
				  $tuxedo_suits_tuxedo_satin_waist_band = $row00["tuxedo_suits_tuxedo_satin_waist_band"];
				  if ($tuxedo_suits_tuxedo_satin_waist_band != "1") {
				  $tuxedo_suits_tuxedo_satin_waist_band_price = 0;
				  } else if ($tuxedo_suits_tuxedo_satin_waist_band == "1") {
				  $sqlprice13 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Tuxedo Satin Waist Band' ";
				  $queryprice13 = mysql_db_query($dbname, $sqlprice13) or die("Can't QueryPrice13");
				  $rowprice13 = mysql_fetch_array($queryprice13);
				  $tuxedo_suits_tuxedo_satin_waist_band_price_extra = $rowprice13["0"];
				  $tuxedo_suits_tuxedo_satin_waist_band_price = $tuxedo_suits_tuxedo_satin_waist_band_price_extra;
				  }
				  ?>
        <? if($tuxedo_suits_tuxedo_satin_waist_band_price == "0") { ?>
        <? } else if($tuxedo_suits_tuxedo_satin_waist_band_price != "0") { ?>
        <tr>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">&nbsp;&nbsp;Tuxedo Satin Waist Band </div></td>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
              <?=$currency?>
              <?=$tuxedo_suits_tuxedo_satin_waist_band_price?>
            </div></td>
        </tr>
        <? } ?>
        <?
				  $tuxedo_suits_very_extended_waistband = $row00["tuxedo_suits_very_extended_waistband"];
				  if ($tuxedo_suits_very_extended_waistband != "0") {
				  $tuxedo_suits_very_extended_waistband_price = 0;
			 	  } else if ($tuxedo_suits_very_extended_waistband == "0") {
				  $sqlprice14 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Very Extended Waistband' ";
				  $queryprice14 = mysql_db_query($dbname, $sqlprice14) or die("Can't QueryPrice14");
				  $rowprice14 = mysql_fetch_array($queryprice14);
				  $tuxedo_suits_very_extended_waistband_price_extra = $rowprice14["0"];
				  $tuxedo_suits_very_extended_waistband_price = $tuxedo_suits_very_extended_waistband_price_extra;
				  }
				  ?>
        <? if($tuxedo_suits_very_extended_waistband_price == "0") { ?>
        <? } else if($tuxedo_suits_very_extended_waistband_price != "0") { ?>
        <tr>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">&nbsp;&nbsp;Very Extended Waistband </div></td>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
              <?=$currency?>
              <?=$tuxedo_suits_very_extended_waistband_price?>
            </div></td>
        </tr>
        <? } ?>
        <?
				  $tuxedo_suits_pants_brand = $row00["tuxedo_suits_pants_brand"];
				  if ($tuxedo_suits_pants_brand == "0") {
				  $tuxedo_suits_pants_brand_price = 0;
				  } else if ($tuxedo_suits_pants_brand != "0") {
				  $sqlprice15 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Pants Branding' ";
				  $queryprice15 = mysql_db_query($dbname, $sqlprice15) or die("Can't QueryPrice15");
				  $rowprice15 = mysql_fetch_array($queryprice15);
				  $tuxedo_suits_pants_brand_price_extra = $rowprice15["0"];
				  $tuxedo_suits_pants_brand_price = $tuxedo_suits_pants_brand_price_extra;
				  }
				  ?>
        <? if($tuxedo_suits_pants_brand_price == "0") { ?>
        <? } else if($tuxedo_suits_pants_brand_price != "0") { ?>
        <tr>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">&nbsp;&nbsp;Pants Branding </div></td>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
              <?=$currency?>
              <?=$tuxedo_suits_pants_brand_price?>
            </div></td>
        </tr>
        <? } ?>
      </table>
      <? } else if ($order_product == "tuxedo_with_vest") { ?>
      <?
   $strSQL2 = " SELECT * FROM admin_fabrics_tuxedo_with_vest WHERE fabricno = '$fabric' "; 
   $objQuery2 = mysql_query($strSQL2) or die ("Error Query [".$strSQL2."]");
   $objResult2 = mysql_fetch_array($objQuery2);
   ?>
      <div style="font-size:14px;"><strong>&nbsp;&nbsp;Tuxedo With Vest
        <?=$objResult2["color"]?>
        <?=$objResult2["pattern"]?>
        </strong></div>
      <br>
      <?
				  $order_id = $objResult1["order_id"]; 
				  $product_id = $objResult1["product_id"];
				  $sql00 =	" SELECT * FROM customize_tuxedo_with_vest_design WHERE order_id = '$order_id' AND product_id = '$product_id' ";
				  $query00 = mysql_db_query($dbname, $sql00) or die("Can't Query00");
				  $row00 = mysql_fetch_array($query00);
				  ?>
      <table width="600" style="vertical-align:middle;">
        <?
				  $tuxedo_with_vest_fabric_no = $objResult2["fabricno"];
                  $sql01 =	" SELECT * FROM admin_fabrics_tuxedo_with_vest WHERE fabricno = '$tuxedo_with_vest_fabric_no' ";
				  $query01 = mysql_db_query($dbname, $sql01) or die("Can't Query01");
				  $row01 = mysql_fetch_array($query01);
				  $fabrics_type = $row01["type"];
				  $fabrics_brand = $row01["brand"];
				  
				  if ($row01["type"] != '') {
				  $sql001 = " SELECT `fabrictype_".$id_user."` FROM admin_fabrictype WHERE fabrictype_name = '$fabrics_type' AND fabrictype_product = 'Suits' ";
				  $query001 = mysql_db_query($dbname, $sql001) or die("Can't Query001");
				  $row001 = mysql_fetch_array($query001);
				  
				  $sql0001 = " SELECT `fabrictype_".$id_user."` FROM admin_fabrictype WHERE fabrictype_name = '$fabrics_type' AND fabrictype_product = 'Vest' ";
				  $query0001 = mysql_db_query($dbname, $sql0001) or die("Can't Query0001");
				  $row0001 = mysql_fetch_array($query0001);
				  
				  $suits_fabric_price = $row001["0"];
				  $vest_fabric_price = $row0001["0"];
				  
				  $tuxedo_with_vest_fabric_price = $suits_fabric_price + $vest_fabric_price;
				  
				  } else if ($row01["brand"] != '') {
				  $sql002 = " SELECT `fabricbrand_".$id_user."` FROM admin_fabricbrand WHERE fabricbrand_name = '$fabrics_brand' AND fabricbrand_product = 'Suits' ";
				  $query002 = mysql_db_query($dbname, $sql002) or die("Can't Query002");
				  $row002 = mysql_fetch_array($query002);	
				  
				  $sql0002 = " SELECT `fabricbrand_".$id_user."` FROM admin_fabricbrand WHERE fabricbrand_name = '$fabrics_brand' AND fabricbrand_product = 'Vest' ";
				  $query0002 = mysql_db_query($dbname, $sql0002) or die("Can't Query0002");
				  $row0002 = mysql_fetch_array($query0002);	
				  
				  $suits_fabric_price = $row002["0"];
				  $vest_fabric_price = $row0002["0"];
				  
				  $tuxedo_with_vest_fabric_price = $suits_fabric_price + $vest_fabric_price;

				  }
				  ?>
        <tr>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">&nbsp;&nbsp;Fabric Number :
              <?=$objResult2["fabricno"]?>
            </div></td>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
              <?=$currency?>
              <?=$tuxedo_with_vest_fabric_price?>
            </div></td>
        </tr>
        <?
                  $tuxedo_with_vest_jacket_button_number = $row00["tuxedo_with_vest_jacket_button_number"];
				  $sql03 = " SELECT price FROM admin_buttons_suits WHERE buttonno = '$tuxedo_with_vest_jacket_button_number' ";
				  $query03 = mysql_db_query($dbname, $sql03) or die("Can't Query03");
				  $row03 = mysql_fetch_array($query03);
				  ?>
        <tr>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">&nbsp;&nbsp;Jacket Button Number :
              <?=$row00["tuxedo_with_vest_jacket_button_number"]?>
            </div></td>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
              <?=$currency?>
              <?=$row03["price"]?>
            </div></td>
        </tr>
        <?
                  $tuxedo_with_vest_pants_button_number = $row00["tuxedo_with_vest_pants_button_number"];
				  $sql04 = " SELECT price FROM admin_buttons_suits WHERE buttonno = '$tuxedo_with_vest_pants_button_number' ";
				  $query04 = mysql_db_query($dbname, $sql04) or die("Can't Query04");
				  $row04 = mysql_fetch_array($query04);
				  ?>
        <tr>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">&nbsp;&nbsp;Pants Button Number :
              <?=$row00["tuxedo_with_vest_pants_button_number"]?>
            </div></td>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
              <?=$currency?>
              <?=$row04["price"]?>
            </div></td>
        </tr>
        <?
                  $tuxedo_with_vest_vest_button_number = $row00["tuxedo_with_vest_vest_button_number"];
				  $sql05 = " SELECT price FROM admin_buttons_suits WHERE buttonno = '$tuxedo_with_vest_vest_button_number' ";
				  $query05 = mysql_db_query($dbname, $sql05) or die("Can't Query05");
				  $row05 = mysql_fetch_array($query05);
				  ?>
        <tr>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">&nbsp;&nbsp;Vest Button Number :
              <?=$row00["tuxedo_with_vest_vest_button_number"]?>
            </div></td>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
              <?=$currency?>
              <?=$row05["price"]?>
            </div></td>
        </tr>
        <?
                  $tuxedo_with_vest_embroidery_collar_initial_or_name = $row00["tuxedo_with_vest_embroidery_collar_initial_or_name"];
				  if ($tuxedo_with_vest_embroidery_collar_initial_or_name == "") {
				  $tuxedo_with_vest_embroidery_collar_initial_or_name_price = 0;
				  } else if ($tuxedo_with_vest_embroidery_collar_initial_or_name != "") {
				  $sqlprice1 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Embroidery Collar Felt' ";
				  $queryprice1 = mysql_db_query($dbname, $sqlprice1) or die("Can't QueryPrice1");
				  $rowprice1 = mysql_fetch_array($queryprice1);
				  $tuxedo_with_vest_embroidery_collar_initial_or_name_price_extra = $rowprice1["0"];
				  $tuxedo_with_vest_embroidery_collar_initial_or_name_price = $tuxedo_with_vest_embroidery_collar_initial_or_name_price_extra;
				  }
				  ?>
        <? if($tuxedo_with_vest_embroidery_collar_initial_or_name_price == "0") { ?>
        <? } else if($tuxedo_with_vest_embroidery_collar_initial_or_name_price != "0") { ?>
        <tr>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">&nbsp;&nbsp;Embroidery Collar Felt </div></td>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
              <?=$currency?>
              <?=$tuxedo_with_vest_embroidery_collar_initial_or_name_price?>
            </div></td>
        </tr>
        <? } ?>
        <?
                  $tuxedo_with_vest_brand = $row00["tuxedo_with_vest_brand"];
				  if ($tuxedo_with_vest_brand == "0") {
				  $tuxedo_with_vest_brand_price = 0;
				  } else if ($tuxedo_with_vest_brand != "0") {
				  $sqlprice2 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Jacket Branding' ";
				  $queryprice2 = mysql_db_query($dbname, $sqlprice2) or die("Can't QueryPrice2");
				  $rowprice2 = mysql_fetch_array($queryprice2);
				  $tuxedo_with_vest_brand_price_extra = $rowprice2["0"];
				  $tuxedo_with_vest_brand_price = $tuxedo_with_vest_brand_price_extra;
				  }
				  ?>
        <? if($tuxedo_with_vest_brand_price == "0") { ?>
        <? } else if($tuxedo_with_vest_brand_price != "0") { ?>
        <tr>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">&nbsp;&nbsp;Jacket Branding </div></td>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
              <?=$currency?>
              <?=$tuxedo_with_vest_brand_price?>
            </div></td>
        </tr>
        <? } ?>
        <?
                  $tuxedo_with_vest_pick_stitch = $row00["tuxedo_with_vest_pick_stitch"];
				  $tuxedo_with_vest_pick_stitch_sleeves = $row00["tuxedo_with_vest_pick_stitch_sleeves"];
				  if ($tuxedo_with_vest_pick_stitch == "0") {
				  $tuxedo_with_vest_pick_stitch_sleeves_price = 0;
				  } else if ($tuxedo_with_vest_pick_stitch == "1" && $tuxedo_with_vest_pick_stitch_sleeves != "DEFAULT TONAL") {
				  $sqlprice3 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Sleeves Pick Stitch' ";
				  $queryprice3 = mysql_db_query($dbname, $sqlprice3) or die("Can't QueryPrice3");
				  $rowprice3 = mysql_fetch_array($queryprice3);
				  $tuxedo_with_vest_pick_stitch_sleeves_price_extra = $rowprice3["0"];
				  $tuxedo_with_vest_pick_stitch_sleeves_price = $tuxedo_with_vest_pick_stitch_sleeves_price_extra;
				  }
				  ?>
        <? if($tuxedo_with_vest_pick_stitch_sleeves_price == "0") { ?>
        <? } else if($tuxedo_with_vest_pick_stitch_sleeves_price != "0") { ?>
        <tr>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">&nbsp;&nbsp;Sleeves Pick Stitch </div></td>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
              <?=$currency?>
              <?=$tuxedo_with_vest_pick_stitch_sleeves_price?>
            </div></td>
        </tr>
        <? } ?>
        <?
                  $tuxedo_with_vest_pick_stitch = $row00["tuxedo_with_vest_pick_stitch"];
				  $tuxedo_with_vest_pick_stitch_vest = $row00["tuxedo_with_vest_pick_stitch_vest"];
				  if ($tuxedo_with_vest_pick_stitch == "0") {
				  $tuxedo_with_vest_pick_stitch_vest_price = 0;
				  } else if ($tuxedo_with_vest_pick_stitch == "1" && $tuxedo_with_vest_pick_stitch_vest != "DEFAULT TONAL") {
				  $sqlprice4 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Vent Pick Stitch' ";
				  $queryprice4 = mysql_db_query($dbname, $sqlprice4) or die("Can't QueryPrice4");
				  $rowprice4 = mysql_fetch_array($queryprice4);
				  $tuxedo_with_vest_pick_stitch_vest_price_extra = $rowprice4["0"];
				  $tuxedo_with_vest_pick_stitch_vest_price = $tuxedo_with_vest_pick_stitch_vest_price_extra;
				  }
				  ?>
        <? if($tuxedo_with_vest_pick_stitch_vest_price == "0") { ?>
        <? } else if($tuxedo_with_vest_pick_stitch_vest_price != "0") { ?>
        <tr>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">&nbsp;&nbsp;Vent Pick Stitch </div></td>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
              <?=$currency?>
              <?=$tuxedo_with_vest_pick_stitch_vest_price?>
            </div></td>
        </tr>
        <? } ?>
        <?
				  $tuxedo_with_vest_elbow_patch = $row00["tuxedo_with_vest_elbow_patch"];
				  if ($tuxedo_with_vest_elbow_patch == "") {
				  $tuxedo_with_vest_elbow_patch_price = 0;
				  } else if ($tuxedo_with_vest_elbow_patch != "") {
				  $sqlprice5 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Elbow Patch' ";
				  $queryprice5 = mysql_db_query($dbname, $sqlprice5) or die("Can't QueryPrice5");
				  $rowprice5 = mysql_fetch_array($queryprice5);
				  $tuxedo_with_vest_elbow_patch_price_extra = $rowprice5["0"];
				  $tuxedo_with_vest_elbow_patch_price = $tuxedo_with_vest_elbow_patch_price_extra;
				  }
				  ?>
        <? if($tuxedo_with_vest_elbow_patch_price == "0") { ?>
        <? } else if($tuxedo_with_vest_elbow_patch_price != "0") { ?>
        <tr>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">&nbsp;&nbsp;Elbow Patch </div></td>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
              <?=$currency?>
              <?=$tuxedo_with_vest_elbow_patch_price?>
            </div></td>
        </tr>
        <? } ?>
        <?
				  $tuxedo_with_vest_canvas = $row00["tuxedo_with_vest_canvas"];
				  if ($tuxedo_with_vest_canvas != "3") {
				  $tuxedo_with_vest_canvas_price = 0;
				  } else if ($tuxedo_with_vest_canvas == "3") {
				  $sqlprice6 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Full Canvas' ";
				  $queryprice6 = mysql_db_query($dbname, $sqlprice6) or die("Can't QueryPrice6");
				  $rowprice6 = mysql_fetch_array($queryprice6);
				  $tuxedo_with_vest_canvas_price_extra = $rowprice6["0"];
				  $tuxedo_with_vest_canvas_price = $tuxedo_with_vest_canvas_price_extra;
				  }
				  ?>
        <? if($tuxedo_with_vest_canvas_price == "0") { ?>
        <? } else if($tuxedo_with_vest_canvas_price != "0") { ?>
        <tr>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">&nbsp;&nbsp;Full Canvas </div></td>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
              <?=$currency?>
              <?=$tuxedo_with_vest_canvas_price?>
            </div></td>
        </tr>
        <? } ?>
        <?
				  $tuxedo_with_vest_chest_pocket_satin_fabric = $row00["tuxedo_with_vest_chest_pocket_satin_fabric"];
				  if ($tuxedo_with_vest_chest_pocket_satin_fabric == "") {
				  $tuxedo_with_vest_chest_pocket_satin_fabric_price = 0;
				  } else if ($tuxedo_jacket_chest_pocket_satin_fabric != "") {
				  $sqlprice7 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Satin Option on Chest Pocket' ";
				  $queryprice7 = mysql_db_query($dbname, $sqlprice7) or die("Can't QueryPrice7");
				  $rowprice7 = mysql_fetch_array($queryprice7);
				  $tuxedo_with_vest_chest_pocket_satin_fabric_price_extra = $rowprice7["0"];
				  $tuxedo_with_vest_chest_pocket_satin_fabric_price = $tuxedo_with_vest_chest_pocket_satin_fabric_price_extra;
				  }
				  ?>
        <? if($tuxedo_with_vest_chest_pocket_satin_fabric_price == "0") { ?>
        <? } else if($tuxedo_with_vest_chest_pocket_satin_fabric_price != "0") { ?>
        <tr>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">&nbsp;&nbsp;Satin Option on Chest Pocket </div></td>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
              <?=$currency?>
              <?=$tuxedo_with_vest_chest_pocket_satin_fabric_price?>
            </div></td>
        </tr>
        <? } ?>
        <?
				  $tuxedo_with_vest_lower_pocket_satin_fabric = $row00["tuxedo_with_vest_lower_pocket_satin_fabric"];
				  if ($tuxedo_with_vest_lower_pocket_satin_fabric == "") {
				  $tuxedo_with_vest_lower_pocket_satin_fabric_price = 0;
				  } else if ($tuxedo_with_vest_lower_pocket_satin_fabric != "") {
				  $sqlprice8 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Satin Option on Lower Pocket' ";
				  $queryprice8 = mysql_db_query($dbname, $sqlprice8) or die("Can't QueryPrice8");
				  $rowprice8 = mysql_fetch_array($queryprice8);
				  $tuxedo_with_vest_lower_pocket_satin_fabric_price_extra = $rowprice8["0"];
				  $tuxedo_with_vest_lower_pocket_satin_fabric_price = $tuxedo_with_vest_lower_pocket_satin_fabric_price_extra;
				  }
				  ?>
        <? if($tuxedo_with_vest_lower_pocket_satin_fabric_price == "0") { ?>
        <? } else if($tuxedo_with_vest_lower_pocket_satin_fabric_price != "0") { ?>
        <tr>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">&nbsp;&nbsp;Satin Option on Lower Pocket </div></td>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
              <?=$currency?>
              <?=$tuxedo_with_vest_lower_pocket_satin_fabric_price?>
            </div></td>
        </tr>
        <? } ?>
        <?
				  $tuxedo_with_vest_coin_pocket_inside = $row00["tuxedo_with_vest_coin_pocket_inside"];
				  if ($tuxedo_with_vest_coin_pocket_inside != "1") {
				  $tuxedo_with_vest_coin_pocket_inside_price = 0;
				  } else if ($tuxedo_with_vest_coin_pocket_inside == "1") {
				  $sqlprice9 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Coin Pocket Inside' ";
				  $queryprice9 = mysql_db_query($dbname, $sqlprice9) or die("Can't QueryPrice9");
				  $rowprice9 = mysql_fetch_array($queryprice9);
				  $tuxedo_with_vest_coin_pocket_inside_price_extra = $rowprice9["0"];
				  $tuxedo_with_vest_coin_pocket_inside_price = $tuxedo_with_vest_coin_pocket_inside_price_extra;
				  }
				  ?>
        <? if($tuxedo_with_vest_coin_pocket_inside_price == "0") { ?>
        <? } else if($tuxedo_with_vest_coin_pocket_inside_price != "0") { ?>
        <tr>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">&nbsp;&nbsp;Coin Pocket Inside </div></td>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
              <?=$currency?>
              <?=$tuxedo_with_vest_coin_pocket_inside_price?>
            </div></td>
        </tr>
        <? } ?>
        <?
				  $tuxedo_with_vest_suspender_buttons_inside = $row00["tuxedo_with_vest_suspender_buttons_inside"];
				  if ($tuxedo_with_vest_suspender_buttons_inside != "1") {
				  $tuxedo_with_vest_suspender_buttons_inside_price = 0;
				  } else if ($tuxedo_with_vest_suspender_buttons_inside == "1") {
				  $sqlprice10 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Suspender Buttons Inside' ";
				  $queryprice10 = mysql_db_query($dbname, $sqlprice10) or die("Can't QueryPrice10");
				  $rowprice10= mysql_fetch_array($queryprice10);
				  $tuxedo_with_vest_suspender_buttons_inside_price_extra = $rowprice10["0"];
				  $tuxedo_with_vest_suspender_buttons_inside_price = $tuxedo_with_vest_suspender_buttons_inside_price_extra;
				  }
				  ?>
        <? if($tuxedo_with_vest_suspender_buttons_inside_price == "0") { ?>
        <? } else if($tuxedo_with_vest_suspender_buttons_inside_price != "0") { ?>
        <tr>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">&nbsp;&nbsp;Suspender Buttons Inside </div></td>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
              <?=$currency?>
              <?=$tuxedo_with_vest_suspender_buttons_inside_price?>
            </div></td>
        </tr>
        <? } ?>
        <?
				  $tuxedo_with_vest_split_tabs_back = $row00["tuxedo_with_vest_split_tabs_back"];
				  if ($tuxedo_with_vest_split_tabs_back != "1") {
				  $tuxedo_with_vest_split_tabs_back_price = 0;
				  } else if ($tuxedo_with_vest_split_tabs_back == "1") {
				  $sqlprice11 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Split Tabs Back' ";
				  $queryprice11 = mysql_db_query($dbname, $sqlprice11) or die("Can't QueryPrice11");
				  $rowprice11 = mysql_fetch_array($queryprice11);
				  $tuxedo_with_vest_split_tabs_back_price_extra = $rowprice11["0"];
				  $tuxedo_with_vest_split_tabs_back_price = $tuxedo_with_vest_split_tabs_back_price_extra;
				  }
				  ?>
        <? if($tuxedo_with_vest_split_tabs_back_price == "0") { ?>
        <? } else if($tuxedo_with_vest_split_tabs_back_price != "0") { ?>
        <tr>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">&nbsp;&nbsp;Split Tabs Back </div></td>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
              <?=$currency?>
              <?=$tuxedo_with_vest_split_tabs_back_price?>
            </div></td>
        </tr>
        <? } ?>
        <?
				  $tuxedo_with_vest_tuxedo_satin = $row00["tuxedo_with_vest_tuxedo_satin"];
				  if ($tuxedo_with_vest_tuxedo_satin != "1") {
				  $tuxedo_with_vest_tuxedo_satin_price = 0;
				  } else if ($tuxedo_with_vest_tuxedo_satin == "1") {
				  $sqlprice12 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Tuxedo Satin on Side' ";
				  $queryprice12 = mysql_db_query($dbname, $sqlprice12) or die("Can't QueryPrice12");
				  $rowprice12 = mysql_fetch_array($queryprice12);
				  $tuxedo_with_vest_tuxedo_satin_price_extra = $rowprice12["0"];
				  $tuxedo_with_vest_tuxedo_satin_price = $tuxedo_with_vest_tuxedo_satin_price_extra;
				  }
				  ?>
        <? if($tuxedo_with_vest_tuxedo_satin_price == "0") { ?>
        <? } else if($tuxedo_with_vest_tuxedo_satin_price != "0") { ?>
        <tr>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">&nbsp;&nbsp;Tuxedo Satin on Side </div></td>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
              <?=$currency?>
              <?=$tuxedo_with_vest_tuxedo_satin_price?>
            </div></td>
        </tr>
        <? } ?>
        <?
				  $tuxedo_with_vest_tuxedo_satin_waist_band = $row00["tuxedo_with_vest_tuxedo_satin_waist_band"];
				  if ($tuxedo_with_vest_tuxedo_satin_waist_band != "1") {
				  $tuxedo_with_vest_tuxedo_satin_waist_band_price = 0;
				  } else if ($tuxedo_with_vest_tuxedo_satin_waist_band == "1") {
				  $sqlprice13 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Tuxedo Satin Waist Band' ";
				  $queryprice13 = mysql_db_query($dbname, $sqlprice13) or die("Can't QueryPrice13");
				  $rowprice13 = mysql_fetch_array($queryprice13);
				  $tuxedo_with_vest_tuxedo_satin_waist_band_price_extra = $rowprice13["0"];
				  $tuxedo_with_vest_tuxedo_satin_waist_band_price = $tuxedo_with_vest_tuxedo_satin_waist_band_price_extra;

				  }
				  ?>
        <? if($tuxedo_with_vest_tuxedo_satin_waist_band_price == "0") { ?>
        <? } else if($tuxedo_with_vest_tuxedo_satin_waist_band_price != "0") { ?>
        <tr>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">&nbsp;&nbsp;Tuxedo Satin Waist Band </div></td>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
              <?=$currency?>
              <?=$tuxedo_with_vest_tuxedo_satin_waist_band_price?>
            </div></td>
        </tr>
        <? } ?>
        <?
				  $tuxedo_with_vest_very_extended_waistband = $row00["tuxedo_with_vest_very_extended_waistband"];
				  if ($tuxedo_with_vest_very_extended_waistband != "0") {
				  $tuxedo_with_vest_very_extended_waistband_price = 0;
				  } else if ($tuxedo_with_vest_very_extended_waistband == "0") {
				  $sqlprice14 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Very Extended Waistband' ";
				  $queryprice14 = mysql_db_query($dbname, $sqlprice14) or die("Can't QueryPrice14");
				  $rowprice14 = mysql_fetch_array($queryprice14);
				  $tuxedo_with_vest_very_extended_waistband_price_extra = $rowprice14["0"];
				  $tuxedo_with_vest_very_extended_waistband_price = $tuxedo_with_vest_very_extended_waistband_price_extra;
				  }
				  ?>
        <? if($tuxedo_with_vest_very_extended_waistband_price == "0") { ?>
        <? } else if($tuxedo_with_vest_very_extended_waistband_price != "0") { ?>
        <tr>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">&nbsp;&nbsp;Very Extended Waistband </div></td>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
              <?=$currency?>
              <?=$tuxedo_with_vest_very_extended_waistband_price?>
            </div></td>
        </tr>
        <? } ?>
        <?
				  $tuxedo_with_vest_pants_brand = $row00["tuxedo_with_vest_pants_brand"];
				  if ($tuxedo_with_vest_pants_brand == "0") {
				  $tuxedo_with_vest_pants_brand_price = 0;
				  } else if ($tuxedo_with_vest_pants_brand != "0") {
				  $sqlprice15 = " SELECT `extra_".$id_user."` FROM admin_extraoptions WHERE extra_name = 'Pants Branding' ";
				  $queryprice15 = mysql_db_query($dbname, $sqlprice15) or die("Can't QueryPrice15");
				  $rowprice15 = mysql_fetch_array($queryprice15);
				  $tuxedo_with_vest_pants_brand_price_extra = $rowprice15["0"];
				  $tuxedo_with_vest_pants_brand_price = $tuxedo_with_vest_pants_brand_price_extra;
				  }
				  ?>
        <? if($tuxedo_with_vest_pants_brand_price == "0") { ?>
        <? } else if($tuxedo_with_vest_pants_brand_price != "0") { ?>
        <tr>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">&nbsp;&nbsp;Pants Branding </div></td>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
              <?=$currency?>
              <?=$tuxedo_with_vest_pants_brand_price?>
            </div></td>
        </tr>
        <? } ?>
      </table>
      <? } else if ($order_product == "vest") { ?>
      <?
   $strSQL2 = " SELECT * FROM admin_fabrics_vest WHERE fabricno = '$fabric' "; 
   $objQuery2 = mysql_query($strSQL2) or die ("Error Query [".$strSQL2."]");
   $objResult2 = mysql_fetch_array($objQuery2);
   ?>
      <div style="font-size:14px;"><strong>&nbsp;&nbsp;Vest
        <?=$objResult2["color"]?>
        <?=$objResult2["pattern"]?>
        </strong></div>
      <br>
      <?
				  $order_id = $objResult1["order_id"]; 
				  $product_id = $objResult1["product_id"];
				  $sql00 =	" SELECT * FROM customize_vest_design WHERE order_id = '$order_id' AND product_id = '$product_id' ";
				  $query00 = mysql_db_query($dbname, $sql00) or die("Can't Query00");
				  $row00 = mysql_fetch_array($query00);
				  ?>
      <table width="600" style="vertical-align:middle;">
        <?
				  $vest_fabric_no = $objResult2["fabricno"];
                  $sql01 =	" SELECT * FROM admin_fabrics_vest WHERE fabricno = '$vest_fabric_no' ";
				  $query01 = mysql_db_query($dbname, $sql01) or die("Can't Query01");
				  $row01 = mysql_fetch_array($query01);
				  $fabrics_type = $row01["type"];
				  $fabrics_brand = $row01["brand"];
				  
				  if ($row01["type"] != '') {
				  $sql001 = " SELECT `fabrictype_".$id_user."` FROM admin_fabrictype WHERE fabrictype_name = '$fabrics_type' AND fabrictype_product = 'Vest' ";
				  $query001 = mysql_db_query($dbname, $sql001) or die("Can't Query001");
				  $row001 = mysql_fetch_array($query001);
				  $vest_fabric_price = $row001["0"];
				  
				  } else if ($row01["brand"] != '') {
				  $sql002 = " SELECT `fabricbrand_".$id_user."` FROM admin_fabricbrand WHERE fabricbrand_name = '$fabrics_brand' AND fabricbrand_product = 'Vest' ";
				  $query002 = mysql_db_query($dbname, $sql002) or die("Can't Query002");
				  $row002 = mysql_fetch_array($query002);	
				  $vest_fabric_price = $row002["0"];
				  }
				  ?>
        <tr>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">&nbsp;&nbsp;Fabric Number :
              <?=$objResult2["fabricno"]?>
            </div></td>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
              <?=$currency?>
              <?=$vest_fabric_price?>
            </div></td>
        </tr>
        <?
                  $vest_vest_button_number = $row00["vest_vest_button_number"];
				  $sql03 = " SELECT price FROM admin_buttons_suits WHERE buttonno = '$vest_vest_button_number' ";
				  $query03 = mysql_db_query($dbname, $sql03) or die("Can't Query03");
				  $row03 = mysql_fetch_array($query03);
				  ?>
        <tr>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">&nbsp;&nbsp;Button Number :
              <?=$row00["vest_vest_button_number"]?>
            </div></td>
          <td width="500" style="vertical-align:middle;"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
              <?=$currency?>
              <?=$row03["price"]?>
            </div></td>
        </tr>
      </table>
      <? } ?></td>
    <td width="400" height="40" valign="middle" align="left" style="border:1px solid black; vertical-align:middle;"><div style="font-size:14px;"><strong>&nbsp;&nbsp;
        <?=$currency?>
        <?=$objResult1["order_price"]?>
        </strong></div></td>
  </tr>
  <? } ?>
  <tr>
    <td width="600" height="40" valign="middle" align="right" style="border:1px solid black; vertical-align:middle;"><div style="font-size:14px;"><strong>Total &nbsp;&nbsp;</strong></div></td>
    <td width="400" height="40" valign="middle" align="left" style="border:1px solid black; vertical-align:middle;"><?
    $strSQL3 = " SELECT SUM(order_price) FROM customize_order WHERE order_id = '$orderid' AND order_status = 'T' ";
	$objQuery3 = mysql_query($strSQL3) or die("Can't Query3");
	$objResult3 = mysql_fetch_array($objQuery3); 
	?>
      <div style="font-size:14px;"><strong>&nbsp;&nbsp;
        <?=$currency?>
        <?=$objResult3["SUM(order_price)"]?>
        </strong></div></td>
  </tr>
</table>
</body>
</html>