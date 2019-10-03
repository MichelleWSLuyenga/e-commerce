<?
if(empty($_POST['ip'])){
	$_POST['ip'] = $_SERVER['REMOTE_ADDR'];
}
require('./phpip2country.class.php');

include('../../connect.php');

$id = $_POST["id"];
$orderform_item = $_POST["orderform_item"];
$orderform_file = $_POST["orderform_file"];
$orderform_admin = $_POST["orderform_admin"];
$orderform_date = date("m/d/Y");
$orderform_time = date("H:i:s");
$orderform_ip = $_POST['ip'];
$orderform_status = T;

$path = "../../images/orderform/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['orderform_file']['name'];
	$tmp = $_FILES['orderform_file']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$orderform_file_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$orderform_file_pic)){
				
				$sql2 =	" UPDATE admin_orderform SET orderform_item = '".$orderform_item."', orderform_file = '".$orderform_file_pic."', orderform_admin = '".$orderform_admin."', orderform_date = '".$orderform_date."', orderform_time = '".$orderform_time."', orderform_ip = '".$orderform_ip."', orderform_status = '".$orderform_status."' WHERE id = '".$id."' ";
				$query2 = mysql_db_query($dbname, $sql2) or die("Can't Query2");
				
				echo " <script language='javascript'> window.location='../orderform/'; </script> ";
				}
       } else {
		   
           $sql2 =	" UPDATE admin_orderform SET orderform_item = '".$orderform_item."', orderform_admin = '".$orderform_admin."', orderform_date = '".$orderform_date."', orderform_time = '".$orderform_time."', orderform_ip = '".$orderform_ip."', orderform_status = '".$orderform_status."' WHERE id = '".$id."' ";
		   $query2 = mysql_db_query($dbname, $sql2) or die("Can't Query2");
		   
		   echo " <script language='javascript'> window.location='../orderform/'; </script> ";
       }
}

mysql_close();
?>