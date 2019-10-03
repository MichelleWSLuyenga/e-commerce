<?
if(empty($_POST['ip'])){
	$_POST['ip'] = $_SERVER['REMOTE_ADDR'];
}
require('./phpip2country.class.php');

include('../../connect.php');

$id = $_POST["id"];
$uploadlogo_image = $_POST["uploadlogo_image"];
$uploadlogo_admin = $_POST["uploadlogo_admin"];
$uploadlogo_date = date("m/d/Y");
$uploadlogo_time = date("H:i:s");
$uploadlogo_ip = $_POST['ip'];
$uploadlogo_status = T;

$path = "../../images/logo/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['uploadlogo_image']['name'];
	$tmp = $_FILES['uploadlogo_image']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$uploadlogo_image_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$uploadlogo_image_pic)){
				$sql2 =	" UPDATE admin_uploadlogo SET uploadlogo_image = '".$uploadlogo_image_pic."', uploadlogo_admin = '".$uploadlogo_admin."', uploadlogo_date = '".$uploadlogo_date."', uploadlogo_time = '".$uploadlogo_time."', uploadlogo_ip = '".$uploadlogo_ip."', uploadlogo_status = '".$uploadlogo_status."' WHERE id = '$id' ";
				$query2 = mysql_db_query($dbname, $sql2) or die("Can't Query2");
				echo " <script language='javascript'> alert('Record saved successfully'); window.location='../logo/'; </script> ";
				}
       } else {
           $sql2 =	" UPDATE admin_uploadlogo SET uploadlogo_admin = '".$uploadlogo_admin."', uploadlogo_date = '".$uploadlogo_date."', uploadlogo_time = '".$uploadlogo_time."', uploadlogo_ip = '".$uploadlogo_ip."', uploadlogo_status = '".$uploadlogo_status."' WHERE id = '$id' ";
		   $query2 = mysql_db_query($dbname, $sql2) or die("Can't Query2");
		   echo " <script language='javascript'> alert('Record saved successfully'); window.location='../logo/'; </script> ";
       }
}

mysql_close();
?>