<?
if(empty($_POST['ip'])){
	$_POST['ip'] = $_SERVER['REMOTE_ADDR'];
}
require('./phpip2country.class.php');

include('../../connect.php');

$id = $_POST["id"];
$buttons_product = $_POST["buttons_product"];
$buttons_type = $_POST["buttons_type"];
$buttons_buttonno = $_POST["buttons_buttonno"];
$buttons_description = $_POST["buttons_description"];
$buttons_price = 0;
$buttons_image = $_POST["buttons_image"];
$buttons_admin = $_POST["buttons_admin"];
$buttons_date = date("m/d/Y");
$buttons_time = date("H:i:s");
$buttons_ip = $_POST['ip'];
$buttons_status = T;

if($buttons_product == "Suit") {

$path = "../../images/buttons/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['buttons_image']['name'];
	$tmp = $_FILES['buttons_image']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$buttons_image_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$buttons_image_pic)){
				
				$sql2 =	" UPDATE admin_buttons_suits SET buttonno = '".$buttons_buttonno."', type = '".$buttons_type."', description = '".$buttons_description."', price = '".$buttons_price."', image = '".$buttons_image_pic."', buttons_admin = '".$buttons_admin."', buttons_date = '".$buttons_date."', buttons_time = '".$buttons_time."', buttons_ip = '".$buttons_ip."', buttons_status = '".$buttons_status."' WHERE id = '".$id."' ";
				$query2 = mysql_db_query($dbname, $sql2) or die("Can't Query2");
				
				echo " <script language='javascript'> window.location='../buttons/suit.php'; </script> ";
				}
       } else {
		   
           $sql2 =	" UPDATE admin_buttons_suits SET buttonno = '".$buttons_buttonno."', type = '".$buttons_type."', description = '".$buttons_description."', price = '".$buttons_price."', buttons_admin = '".$buttons_admin."', buttons_date = '".$buttons_date."', buttons_time = '".$buttons_time."', buttons_ip = '".$buttons_ip."', buttons_status = '".$buttons_status."' WHERE id = '".$id."' ";
		   $query2 = mysql_db_query($dbname, $sql2) or die("Can't Query2");
		   
		   echo " <script language='javascript'> window.location='../buttons/suit.php'; </script> ";
       }
}

} else if($buttons_product == "Shirt") {

$path = "../../images/buttons/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['buttons_image']['name'];
	$tmp = $_FILES['buttons_image']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$buttons_image_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$buttons_image_pic)){
				
				$sql2 =	" UPDATE admin_buttons_shirt SET buttonno = '".$buttons_buttonno."', type = '".$buttons_type."', description = '".$buttons_description."', price = '".$buttons_price."', image = '".$buttons_image_pic."', buttons_admin = '".$buttons_admin."', buttons_date = '".$buttons_date."', buttons_time = '".$buttons_time."', buttons_ip = '".$buttons_ip."', buttons_status = '".$buttons_status."' WHERE id = '".$id."' ";
				$query2 = mysql_db_query($dbname, $sql2) or die("Can't Query2");
				
				echo " <script language='javascript'> window.location='../buttons/shirt.php'; </script> ";
				}
       } else {
		   
           $sql2 =	" UPDATE admin_buttons_shirt SET buttonno = '".$buttons_buttonno."', type = '".$buttons_type."', description = '".$buttons_description."', price = '".$buttons_price."', buttons_admin = '".$buttons_admin."', buttons_date = '".$buttons_date."', buttons_time = '".$buttons_time."', buttons_ip = '".$buttons_ip."', buttons_status = '".$buttons_status."' WHERE id = '".$id."' ";
		   $query2 = mysql_db_query($dbname, $sql2) or die("Can't Query2");
		   
		   echo " <script language='javascript'> window.location='../buttons/shirt.php'; </script> ";
       }
}

} else if($buttons_product == "Overcoat") {

$path = "../../images/buttons/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['buttons_image']['name'];
	$tmp = $_FILES['buttons_image']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$buttons_image_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$buttons_image_pic)){
				
				$sql2 =	" UPDATE admin_buttons_overcoat SET buttonno = '".$buttons_buttonno."', type = '".$buttons_type."', description = '".$buttons_description."', price = '".$buttons_price."', image = '".$buttons_image_pic."', buttons_admin = '".$buttons_admin."', buttons_date = '".$buttons_date."', buttons_time = '".$buttons_time."', buttons_ip = '".$buttons_ip."', buttons_status = '".$buttons_status."' WHERE id = '".$id."' ";
				$query2 = mysql_db_query($dbname, $sql2) or die("Can't Query2");
				
				echo " <script language='javascript'> window.location='../buttons/overcoat.php'; </script> ";
				}
       } else {
		   
           $sql2 =	" UPDATE admin_buttons_overcoat SET buttonno = '".$buttons_buttonno."', type = '".$buttons_type."', description = '".$buttons_description."', price = '".$buttons_price."', buttons_admin = '".$buttons_admin."', buttons_date = '".$buttons_date."', buttons_time = '".$buttons_time."', buttons_ip = '".$buttons_ip."', buttons_status = '".$buttons_status."' WHERE id = '".$id."' ";
		   $query2 = mysql_db_query($dbname, $sql2) or die("Can't Query2");
		   
		   echo " <script language='javascript'> window.location='../buttons/overcoat.php'; </script> ";
       }
}

}

mysql_close();
?>