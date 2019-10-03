<?
if(empty($_POST['ip'])){
	$_POST['ip'] = $_SERVER['REMOTE_ADDR'];
}
require('./phpip2country.class.php');

include('../../connect.php');

$id = $_POST["id"];
$lining_type = $_POST["lining_type"];
$lining_brand = $_POST["lining_brand"];
$lining_number = $_POST["lining_number"];
$lining_color = $_POST["lining_color"];
$lining_pattern = $_POST["lining_pattern"];
$lining_image = $_POST["lining_image"];
$lining_admin = $_POST["lining_admin"];
$lining_date = date("m/d/Y");
$lining_time = date("H:i:s");
$lining_ip = $_POST['ip'];
$lining_status = T;

$path = "../../images/fabrics/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['lining_image']['name'];
	$tmp = $_FILES['lining_image']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$lining_image_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$lining_image_pic)){
				$sql2 =	" UPDATE admin_fabrics_lining SET type = '".$lining_type."', brand = '".$lining_brand."', fabricno = '".$lining_number."', color = '".$lining_color."', pattern = '".$lining_pattern."', image = '".$lining_image_pic."', fabrics_admin = '".$lining_admin."', fabrics_date = '".$lining_date."', fabrics_time = '".$lining_time."', fabrics_ip = '".$lining_ip."', fabrics_status = '".$lining_status."' WHERE id = '$id' ";
				$query2 = mysql_db_query($dbname, $sql2) or die("Can't Query2");
				echo " <script language='javascript'> window.location='../lining/view.php'; </script> ";
				}
       } else {
           $sql2 =	" UPDATE admin_fabrics_lining SET type = '".$lining_type."', brand = '".$lining_brand."', fabricno = '".$lining_number."', color = '".$lining_color."', pattern = '".$lining_pattern."', fabrics_admin = '".$lining_admin."', fabrics_date = '".$lining_date."', fabrics_time = '".$lining_time."', fabrics_ip = '".$lining_ip."', fabrics_status = '".$lining_status."' WHERE id = '$id' ";
		   $query2 = mysql_db_query($dbname, $sql2) or die("Can't Query2");
		   echo " <script language='javascript'> window.location='../lining/view.php'; </script> ";
       }
}

mysql_close();
?>