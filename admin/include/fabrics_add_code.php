<?
if(empty($_POST['ip'])){
	$_POST['ip'] = $_SERVER['REMOTE_ADDR'];
}
require('./phpip2country.class.php');

include('../../connect.php');

$fabrics_jacket = $_POST["fabrics_jacket"];
$fabrics_jeans = $_POST["fabrics_jeans"];
$fabrics_overcoat = $_POST["fabrics_overcoat"];
$fabrics_pants = $_POST["fabrics_pants"];
$fabrics_shirt = $_POST["fabrics_shirt"];
$fabrics_suits = $_POST["fabrics_suits"];
$fabrics_vest = $_POST["fabrics_vest"];
$fabrics_type = $_POST["fabrics_type"];
$fabrics_brand = $_POST["fabrics_brand"];
$fabrics_number = $_POST["fabrics_number"];
$fabrics_color = $_POST["fabrics_color"];
$fabrics_pattern = $_POST["fabrics_pattern"];
$fabrics_image = $_POST["fabrics_image"];
$fabrics_admin = $_POST["fabrics_admin"];
$fabrics_date = date("m/d/Y");
$fabrics_time = date("H:i:s");
$fabrics_ip = $_POST['ip'];
$fabrics_status = T;

if($fabrics_jacket == "jacket") {
	
$sql1 =	" SELECT MAX(id) FROM admin_fabrics_jacket ";
$query1 = mysql_db_query($dbname, $sql1) or die("Can't Query1");
$row1 = mysql_fetch_array($query1);
$id = $row1[0] + 1 ;

$path = "../../images/fabrics/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['fabrics_image']['name'];
	$tmp = $_FILES['fabrics_image']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$fabrics_image_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$fabrics_image_pic)){
				$sql2 =	" INSERT INTO admin_fabrics_jacket (id, type, brand, fabricno, color, pattern, image, fabrics_admin, fabrics_date, fabrics_time, fabrics_ip, fabrics_status) VALUES ('".$id."', '".$fabrics_type."', '".$fabrics_brand."', '".$fabrics_number."', '".$fabrics_color."', '".$fabrics_pattern."', '".$fabrics_image_pic."', '".$fabrics_admin."', '".$fabrics_date."', '".$fabrics_time."', '".$fabrics_ip."', '".$fabrics_status."') ";
				$query2 = mysql_db_query($dbname, $sql2) or die("Can't Query2");
				echo " <script language='javascript'> window.location='../fabrics/'; </script> ";
				}
       } else {
           $sql2 =	" INSERT INTO admin_fabrics_jacket (id, type, brand, fabricno, color, pattern, image, fabrics_admin, fabrics_date, fabrics_time, fabrics_ip, fabrics_status) VALUES ('".$id."', '".$fabrics_type."', '".$fabrics_brand."', '".$fabrics_number."', '".$fabrics_color."', '".$fabrics_pattern."', '".$fabrics_image."', '".$fabrics_admin."', '".$fabrics_date."', '".$fabrics_time."', '".$fabrics_ip."', '".$fabrics_status."') ";
		   $query2 = mysql_db_query($dbname, $sql2) or die("Can't Query2");
		   echo " <script language='javascript'> window.location='../fabrics/'; </script> ";
       }
}	

} 

if($fabrics_jeans == "jeans") {
	
$sql1 =	" SELECT MAX(id) FROM admin_fabrics_jeans ";
$query1 = mysql_db_query($dbname, $sql1) or die("Can't Query1");
$row1 = mysql_fetch_array($query1);
$id = $row1[0] + 1 ;

$path = "../../images/fabrics/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['fabrics_image']['name'];
	$tmp = $_FILES['fabrics_image']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$fabrics_image_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$fabrics_image_pic)){
				$sql2 =	" INSERT INTO admin_fabrics_jeans (id, type, brand, fabricno, color, pattern, image, fabrics_admin, fabrics_date, fabrics_time, fabrics_ip, fabrics_status) VALUES ('".$id."', '".$fabrics_type."', '".$fabrics_brand."', '".$fabrics_number."', '".$fabrics_color."', '".$fabrics_pattern."', '".$fabrics_image_pic."', '".$fabrics_admin."', '".$fabrics_date."', '".$fabrics_time."', '".$fabrics_ip."', '".$fabrics_status."') ";
				$query2 = mysql_db_query($dbname, $sql2) or die("Can't Query2");
				echo " <script language='javascript'> window.location='../fabrics/'; </script> ";
				}
       } else {
           $sql2 =	" INSERT INTO admin_fabrics_jeans (id, type, brand, fabricno, color, pattern, image, fabrics_admin, fabrics_date, fabrics_time, fabrics_ip, fabrics_status) VALUES ('".$id."', '".$fabrics_type."', '".$fabrics_brand."', '".$fabrics_number."', '".$fabrics_color."', '".$fabrics_pattern."', '".$fabrics_image."', '".$fabrics_admin."', '".$fabrics_date."', '".$fabrics_time."', '".$fabrics_ip."', '".$fabrics_status."') ";
		   $query2 = mysql_db_query($dbname, $sql2) or die("Can't Query2");
		   echo " <script language='javascript'> window.location='../fabrics/'; </script> ";
       }
}	
	
} 

if($fabrics_overcoat == "overcoat") {
	
$sql1 =	" SELECT MAX(id) FROM admin_fabrics_overcoat ";
$query1 = mysql_db_query($dbname, $sql1) or die("Can't Query1");
$row1 = mysql_fetch_array($query1);
$id = $row1[0] + 1 ;	

$path = "../../images/fabrics/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['fabrics_image']['name'];
	$tmp = $_FILES['fabrics_image']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$fabrics_image_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$fabrics_image_pic)){
				$sql2 =	" INSERT INTO admin_fabrics_overcoat (id, type, brand, fabricno, color, pattern, image, fabrics_admin, fabrics_date, fabrics_time, fabrics_ip, fabrics_status) VALUES ('".$id."', '".$fabrics_type."', '".$fabrics_brand."', '".$fabrics_number."', '".$fabrics_color."', '".$fabrics_pattern."', '".$fabrics_image_pic."', '".$fabrics_admin."', '".$fabrics_date."', '".$fabrics_time."', '".$fabrics_ip."', '".$fabrics_status."') ";
				$query2 = mysql_db_query($dbname, $sql2) or die("Can't Query2");
				echo " <script language='javascript'> window.location='../fabrics/'; </script> ";
				}
       } else {
           $sql2 =	" INSERT INTO admin_fabrics_overcoat (id, type, brand, fabricno, color, pattern, image, fabrics_admin, fabrics_date, fabrics_time, fabrics_ip, fabrics_status) VALUES ('".$id."', '".$fabrics_type."', '".$fabrics_brand."', '".$fabrics_number."', '".$fabrics_color."', '".$fabrics_pattern."', '".$fabrics_image."', '".$fabrics_admin."', '".$fabrics_date."', '".$fabrics_time."', '".$fabrics_ip."', '".$fabrics_status."') ";
		   $query2 = mysql_db_query($dbname, $sql2) or die("Can't Query2");
		   echo " <script language='javascript'> window.location='../fabrics/'; </script> ";
       }
}	
	
} 

if($fabrics_pants == "pants") {
	
$sql1 =	" SELECT MAX(id) FROM admin_fabrics_pants ";
$query1 = mysql_db_query($dbname, $sql1) or die("Can't Query1");
$row1 = mysql_fetch_array($query1);
$id = $row1[0] + 1 ;	

$path = "../../images/fabrics/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['fabrics_image']['name'];
	$tmp = $_FILES['fabrics_image']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$fabrics_image_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$fabrics_image_pic)){
				$sql2 =	" INSERT INTO admin_fabrics_pants (id, type, brand, fabricno, color, pattern, image, fabrics_admin, fabrics_date, fabrics_time, fabrics_ip, fabrics_status) VALUES ('".$id."', '".$fabrics_type."', '".$fabrics_brand."', '".$fabrics_number."', '".$fabrics_color."', '".$fabrics_pattern."', '".$fabrics_image_pic."', '".$fabrics_admin."', '".$fabrics_date."', '".$fabrics_time."', '".$fabrics_ip."', '".$fabrics_status."') ";
				$query2 = mysql_db_query($dbname, $sql2) or die("Can't Query2");
				echo " <script language='javascript'> window.location='../fabrics/'; </script> ";
				}
       } else {
           $sql2 =	" INSERT INTO admin_fabrics_pants (id, type, brand, fabricno, color, pattern, image, fabrics_admin, fabrics_date, fabrics_time, fabrics_ip, fabrics_status) VALUES ('".$id."', '".$fabrics_type."', '".$fabrics_brand."', '".$fabrics_number."', '".$fabrics_color."', '".$fabrics_pattern."', '".$fabrics_image."', '".$fabrics_admin."', '".$fabrics_date."', '".$fabrics_time."', '".$fabrics_ip."', '".$fabrics_status."') ";
		   $query2 = mysql_db_query($dbname, $sql2) or die("Can't Query2");
		   echo " <script language='javascript'> window.location='../fabrics/'; </script> ";
       }
}	
	
} 

if($fabrics_shirt == "shirt") {
	
$sql1 =	" SELECT MAX(id) FROM admin_fabrics_shirt ";
$query1 = mysql_db_query($dbname, $sql1) or die("Can't Query1");
$row1 = mysql_fetch_array($query1);
$id = $row1[0] + 1 ;	

$path = "../../images/fabrics/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['fabrics_image']['name'];
	$tmp = $_FILES['fabrics_image']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$fabrics_image_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$fabrics_image_pic)){
				$sql2 =	" INSERT INTO admin_fabrics_shirt (id, type, brand, fabricno, color, pattern, image, fabrics_admin, fabrics_date, fabrics_time, fabrics_ip, fabrics_status) VALUES ('".$id."', '".$fabrics_type."', '".$fabrics_brand."', '".$fabrics_number."', '".$fabrics_color."', '".$fabrics_pattern."', '".$fabrics_image_pic."', '".$fabrics_admin."', '".$fabrics_date."', '".$fabrics_time."', '".$fabrics_ip."', '".$fabrics_status."') ";
				$query2 = mysql_db_query($dbname, $sql2) or die("Can't Query2");
				echo " <script language='javascript'> window.location='../fabrics/'; </script> ";
				}
       } else {
           $sql2 =	" INSERT INTO admin_fabrics_shirt (id, type, brand, fabricno, color, pattern, image, fabrics_admin, fabrics_date, fabrics_time, fabrics_ip, fabrics_status) VALUES ('".$id."', '".$fabrics_type."', '".$fabrics_brand."', '".$fabrics_number."', '".$fabrics_color."', '".$fabrics_pattern."', '".$fabrics_image."', '".$fabrics_admin."', '".$fabrics_date."', '".$fabrics_time."', '".$fabrics_ip."', '".$fabrics_status."') ";
		   $query2 = mysql_db_query($dbname, $sql2) or die("Can't Query2");
		   echo " <script language='javascript'> window.location='../fabrics/'; </script> ";
       }
}	
	
} 

if($fabrics_suits == "suits") {
	
$sql1 =	" SELECT MAX(id) FROM admin_fabrics_suits ";
$query1 = mysql_db_query($dbname, $sql1) or die("Can't Query1");
$row1 = mysql_fetch_array($query1);
$id = $row1[0] + 1 ;	

$path = "../../images/fabrics/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['fabrics_image']['name'];
	$tmp = $_FILES['fabrics_image']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$fabrics_image_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$fabrics_image_pic)){
				$sql2 =	" INSERT INTO admin_fabrics_suits (id, type, brand, fabricno, color, pattern, image, fabrics_admin, fabrics_date, fabrics_time, fabrics_ip, fabrics_status) VALUES ('".$id."', '".$fabrics_type."', '".$fabrics_brand."', '".$fabrics_number."', '".$fabrics_color."', '".$fabrics_pattern."', '".$fabrics_image_pic."', '".$fabrics_admin."', '".$fabrics_date."', '".$fabrics_time."', '".$fabrics_ip."', '".$fabrics_status."') ";
				$query2 = mysql_db_query($dbname, $sql2) or die("Can't Query2");
				echo " <script language='javascript'> window.location='../fabrics/'; </script> ";
				}
       } else {
           $sql2 =	" INSERT INTO admin_fabrics_suits (id, type, brand, fabricno, color, pattern, image, fabrics_admin, fabrics_date, fabrics_time, fabrics_ip, fabrics_status) VALUES ('".$id."', '".$fabrics_type."', '".$fabrics_brand."', '".$fabrics_number."', '".$fabrics_color."', '".$fabrics_pattern."', '".$fabrics_image."', '".$fabrics_admin."', '".$fabrics_date."', '".$fabrics_time."', '".$fabrics_ip."', '".$fabrics_status."') ";
		   $query2 = mysql_db_query($dbname, $sql2) or die("Can't Query2");
		   echo " <script language='javascript'> window.location='../fabrics/'; </script> ";
       }
}	
	
} 

if($fabrics_vest == "vest") {
	
$sql1 =	" SELECT MAX(id) FROM admin_fabrics_vest ";
$query1 = mysql_db_query($dbname, $sql1) or die("Can't Query1");
$row1 = mysql_fetch_array($query1);
$id = $row1[0] + 1 ;	

$path = "../../images/fabrics/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['fabrics_image']['name'];
	$tmp = $_FILES['fabrics_image']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$fabrics_image_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$fabrics_image_pic)){
				$sql2 =	" INSERT INTO admin_fabrics_vest (id, type, brand, fabricno, color, pattern, image, fabrics_admin, fabrics_date, fabrics_time, fabrics_ip, fabrics_status) VALUES ('".$id."', '".$fabrics_type."', '".$fabrics_brand."', '".$fabrics_number."', '".$fabrics_color."', '".$fabrics_pattern."', '".$fabrics_image_pic."', '".$fabrics_admin."', '".$fabrics_date."', '".$fabrics_time."', '".$fabrics_ip."', '".$fabrics_status."') ";
				$query2 = mysql_db_query($dbname, $sql2) or die("Can't Query2");
				echo " <script language='javascript'> window.location='../fabrics/'; </script> ";
				}
       } else {
           $sql2 =	" INSERT INTO admin_fabrics_vest (id, type, brand, fabricno, color, pattern, image, fabrics_admin, fabrics_date, fabrics_time, fabrics_ip, fabrics_status) VALUES ('".$id."', '".$fabrics_type."', '".$fabrics_brand."', '".$fabrics_number."', '".$fabrics_color."', '".$fabrics_pattern."', '".$fabrics_image."', '".$fabrics_admin."', '".$fabrics_date."', '".$fabrics_time."', '".$fabrics_ip."', '".$fabrics_status."') ";
		   $query2 = mysql_db_query($dbname, $sql2) or die("Can't Query2");
		   echo " <script language='javascript'> window.location='../fabrics/'; </script> ";
       }
}	
	
}

mysql_close();
?>