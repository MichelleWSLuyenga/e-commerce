<?
include('../../connect.php');
$orderid = $_GET["order_id"];
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=order_invoice.xls");
?>
<?
$user = $_GET["user"];
$sql0 =	" SELECT * FROM admin_reseller WHERE reseller_company = '$user' AND reseller_type = 'Admin' ";
$query0 = mysql_db_query($dbname, $sql0) or die("Can't Query0");
$row0 = mysql_fetch_array($query0);
$id_user = $row0["id"];

$sql1 = " SELECT * FROM customize_checkout WHERE checkout_orderid = ".$orderid." ";
$query1 = mysql_db_query($dbname, $sql1) or die("Can't Query1");
$row1 = mysql_fetch_array($query1);
$country = $row1['checkout_country'];

if ($country == 'Austria') {
		
$currency = '€';	
		
} else if ($country == 'Australia') {
	
$currency = '$';
		
} else if ($country == 'Belgium') {
		
$currency = '€';	
		
} else if ($country == 'Canada') {
		
$currency = '$';	
		
} else if ($country == 'Denmark') {
		
$currency = 'DKK';	
		
} else if ($country == 'Germany') {
		
$currency = '€';	
		
} else if ($country == 'Italy') {
		
$currency = '€';	
		
} else if ($country == 'Netherlands') {
		
$currency = '€';	
		
} else if ($country == 'Norway') {
		
$currency = 'NOK';	
		
} else if ($country == 'Sweden') {
		
$currency = 'SEK';	
		
} else if ($country == 'Switzerland') {
		
$currency = '€';	
		
} else if ($country == 'Thailand') {
		
$currency = '฿';	
		
} else if ($country == 'UK') {
		
$currency = '£';	
		
} else if ($country == 'US') {	
	
$currency = '$';
		
}
?>
<html>
<body>
<?
	$strSQL1 = " SELECT * FROM customize_order WHERE order_id = '$orderid' AND order_status = 'T' ORDER BY id ASC "; 
	$objQuery1 = mysql_query($strSQL1) or die ("Error Query [".$strSQL1."]");
?>
<table width="1000" border="1">
  <tr>
    <th width="600" height="35" valign="middle" align="center" style="border:1px solid black; vertical-align:middle;"> <div style="font-size:14px"><strong>PRODUCT</strong></div>
    </th>
    <th width="400" height="35" valign="middle" align="center" style="border:1px solid black; vertical-align:middle;"> <div style="font-size:14px"><strong>Price</strong></div>
    </th>
  </tr>
  <? while($objResult1 = mysql_fetch_array($objQuery1)) { ?>
  <tr>
    <td width="600" height="35" valign="middle" align="left" style="border:1px solid black"><? 
	$fabric = $objResult1["order_fabric_no"]; 
	$order_product = $objResult1["order_product"];
	?>
      <? if ($order_product == "jacket") { ?>
      <?
    $strSQL2 = " SELECT * FROM admin_fabrics_jacket WHERE fabricno = '$fabric' "; 
	$objQuery2 = mysql_query($strSQL2) or die ("Error Query [".$strSQL2."]");
	$objResult2 = mysql_fetch_array($objQuery2);
	?>
      <div style="font-size:14px"><strong>&nbsp;&nbsp;Jacket
        <?=$objResult2["color"]?>
        <?=$objResult2["pattern"]?>
        </strong></div>
      <div style="font-size:14px">&nbsp;&nbsp;Fabric Number
        <?=$objResult2["fabricno"]?>
      </div>
      <? } else if ($order_product == "jeans") { ?>
      <?
    $strSQL2 = " SELECT * FROM admin_fabrics_jeans WHERE fabricno = '$fabric' "; 
	$objQuery2 = mysql_query($strSQL2) or die ("Error Query [".$strSQL2."]");
	$objResult2 = mysql_fetch_array($objQuery2);
	?>
      <div style="font-size:14px"><strong>&nbsp;&nbsp;Jeans
        <?=$objResult2["color"]?>
        <?=$objResult2["pattern"]?>
        </strong></div>
      <div style="font-size:14px">&nbsp;&nbsp;Fabric Number
        <?=$objResult2["fabricno"]?>
      </div>
      <? } else if ($order_product == "overcoat") { ?>
      <?
   $strSQL2 = " SELECT * FROM admin_fabrics_overcoat WHERE fabricno = '$fabric' "; 
   $objQuery2 = mysql_query($strSQL2) or die ("Error Query [".$strSQL2."]");
   $objResult2 = mysql_fetch_array($objQuery2);
   ?>
      <div style="font-size:14px"><strong>&nbsp;&nbsp;Overcoat
        <?=$objResult2["color"]?>
        <?=$objResult2["pattern"]?>
        </strong></div>
      <div style="font-size:14px">&nbsp;&nbsp;Fabric Number
        <?=$objResult2["fabricno"]?>
      </div>
      <? } else if ($order_product == "pants") { ?>
      <?
   $strSQL2 = " SELECT * FROM admin_fabrics_pants WHERE fabricno = '$fabric' "; 
   $objQuery2 = mysql_query($strSQL2) or die ("Error Query [".$strSQL2."]");
   $objResult2 = mysql_fetch_array($objQuery2);
   ?>
      <div style="font-size:14px"><strong>&nbsp;&nbsp;Pants
        <?=$objResult2["color"]?>
        <?=$objResult2["pattern"]?>
        </strong></div>
      <div style="font-size:14px">&nbsp;&nbsp;Fabric Number
        <?=$objResult2["fabricno"]?>
      </div>
      <? } else if ($order_product == "shirt") { ?>
      <?
   $strSQL2 = " SELECT * FROM admin_fabrics_shirt WHERE fabricno = '$fabric' "; 
   $objQuery2 = mysql_query($strSQL2) or die ("Error Query [".$strSQL2."]");
   $objResult2 = mysql_fetch_array($objQuery2);
   ?>
      <div style="font-size:14px"><strong>&nbsp;&nbsp;Shirt
        <?=$objResult2["color"]?>
        <?=$objResult2["pattern"]?>
        </strong></div>
      <div style="font-size:14px">&nbsp;&nbsp;Fabric Number
        <?=$objResult2["fabricno"]?>
      </div>
      <? } else if ($order_product == "suits") { ?>
      <?
   $strSQL2 = " SELECT * FROM admin_fabrics_suits WHERE fabricno = '$fabric' "; 
   $objQuery2 = mysql_query($strSQL2) or die ("Error Query [".$strSQL2."]");
   $objResult2 = mysql_fetch_array($objQuery2);
   ?>
      <div style="font-size:14px"><strong>&nbsp;&nbsp;Suits
        <?=$objResult2["color"]?>
        <?=$objResult2["pattern"]?>
        </strong></div>
      <div style="font-size:14px">&nbsp;&nbsp;Fabric Number
        <?=$objResult2["fabricno"]?>
      </div>
      <? } else if ($order_product == "suits_with_vest") { ?>
      <?
   $strSQL2 = " SELECT * FROM admin_fabrics_suits_with_vest WHERE fabricno = '$fabric' "; 
   $objQuery2 = mysql_query($strSQL2) or die ("Error Query [".$strSQL2."]");
   $objResult2 = mysql_fetch_array($objQuery2);
   ?>
      <div style="font-size:14px"><strong>&nbsp;&nbsp;Suits With Vest
        <?=$objResult2["color"]?>
        <?=$objResult2["pattern"]?>
        </strong></div>
      <div style="font-size:14px">&nbsp;&nbsp;Fabric Number
        <?=$objResult2["fabricno"]?>
      </div>
      <? } else if ($order_product == "ties") { ?>
      <?
   $strSQL2 = " SELECT * FROM admin_fabrics_ties WHERE fabricno = '$fabric' "; 
   $objQuery2 = mysql_query($strSQL2) or die ("Error Query [".$strSQL2."]");
   $objResult2 = mysql_fetch_array($objQuery2);
   ?>
      <div style="font-size:14px"><strong>&nbsp;&nbsp;Ties
        <?=$objResult2["color"]?>
        <?=$objResult2["pattern"]?>
        <?=$objResult2["design"]?>
        </strong></div>
      <div style="font-size:14px">&nbsp;&nbsp;Fabric Number
        <?=$objResult2["fabricno"]?>
      </div>
      <? } else if ($order_product == "tuxedo_jacket") { ?>
      <?
   $strSQL2 = " SELECT * FROM admin_fabrics_tuxedo_jacket WHERE fabricno = '$fabric' "; 
   $objQuery2 = mysql_query($strSQL2) or die ("Error Query [".$strSQL2."]");
   $objResult2 = mysql_fetch_array($objQuery2);
   ?>
      <div style="font-size:14px"><strong>&nbsp;&nbsp;Tuxedo Jacket
        <?=$objResult2["color"]?>
        <?=$objResult2["pattern"]?>
        </strong></div>
      <div style="font-size:14px">&nbsp;&nbsp;Fabric Number
        <?=$objResult2["fabricno"]?>
      </div>
      <? } else if ($order_product == "tuxedo_suits") { ?>
      <?
   $strSQL2 = " SELECT * FROM admin_fabrics_tuxedo_suits WHERE fabricno = '$fabric' "; 
   $objQuery2 = mysql_query($strSQL2) or die ("Error Query [".$strSQL2."]");
   $objResult2 = mysql_fetch_array($objQuery2);
   ?>
      <div style="font-size:14px"><strong>&nbsp;&nbsp;Tuxedo Suits
        <?=$objResult2["color"]?>
        <?=$objResult2["pattern"]?>
        </strong></div>
      <div style="font-size:14px">&nbsp;&nbsp;Fabric Number
        <?=$objResult2["fabricno"]?>
      </div>
      <? } else if ($order_product == "tuxedo_with_vest") { ?>
      <?
   $strSQL2 = " SELECT * FROM admin_fabrics_tuxedo_with_vest WHERE fabricno = '$fabric' "; 
   $objQuery2 = mysql_query($strSQL2) or die ("Error Query [".$strSQL2."]");
   $objResult2 = mysql_fetch_array($objQuery2);
   ?>
      <div style="font-size:14px"><strong>&nbsp;&nbsp;Tuxedo With Vest
        <?=$objResult2["color"]?>
        <?=$objResult2["pattern"]?>
        </strong></div>
      <div style="font-size:14px">&nbsp;&nbsp;Fabric Number
        <?=$objResult2["fabricno"]?>
      </div>
      <? } else if ($order_product == "vest") { ?>
      <?
   $strSQL2 = " SELECT * FROM admin_fabrics_vest WHERE fabricno = '$fabric' "; 
   $objQuery2 = mysql_query($strSQL2) or die ("Error Query [".$strSQL2."]");
   $objResult2 = mysql_fetch_array($objQuery2);
   ?>
      <div style="font-size:14px"><strong>&nbsp;&nbsp;Vest
        <?=$objResult2["color"]?>
        <?=$objResult2["pattern"]?>
        </strong></div>
      <div style="font-size:14px">&nbsp;&nbsp;Fabric Number
        <?=$objResult2["fabricno"]?>
      </div>
      <? } ?></td>
    <td width="400" height="35" valign="middle" align="left" style="border:1px solid black"><div style="font-size:14px"><strong>&nbsp;&nbsp;</strong></div>
      <div style="font-size:14px">&nbsp;&nbsp;
        <?=$currency?>
        <?=$objResult1["order_price"]?>
      </div></td>
  </tr>
  <? } ?>
  <tr>
    <td width="600" height="35" valign="middle" align="right" style="border:1px solid black"><div style="font-size:14px"><strong>Total &nbsp;&nbsp;</strong></div></td>
    <td width="400" height="35" valign="middle" align="left" style="border:1px solid black"><?
    $strSQL3 = " SELECT SUM(order_price) FROM customize_order WHERE order_id = '$orderid' AND order_status = 'T' ";
	$objQuery3 = mysql_query($strSQL3) or die("Can't Query3");
	$objResult3 = mysql_fetch_array($objQuery3); 
	?>
      <div style="font-size:14px"><strong>&nbsp;&nbsp;
        <?=$currency?>
        <?=number_format($objResult3["SUM(order_price)"])?>
        </strong></div></td>
  </tr>
</table>
</body>
</html>