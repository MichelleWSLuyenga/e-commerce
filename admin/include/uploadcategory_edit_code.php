<?
if(empty($_POST['ip'])){
	$_POST['ip'] = $_SERVER['REMOTE_ADDR'];
}
require('./phpip2country.class.php');

include('../../connect.php');

$category_id = $_POST["category_id"];

$id = $_POST["id"];
$category_name = $_POST["category_name"];
$category_image = $_POST["category_image"];
$category_admin = $_POST["category_admin"];
$category_date = date("m/d/Y");
$category_time = date("H:i:s");
$category_ip = $_POST['ip'];
$category_status = T;

$path = "../../images/category/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['category_image']['name'];
	$tmp = $_FILES['category_image']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$category_image_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$category_image_pic)){
				$sql2 =	" UPDATE admin_category SET category_name = '".$category_name."', category_".$category_id." = '".$category_image_pic."', category_admin = '".$category_admin."', category_date = '".$category_date."', category_time = '".$category_time."', category_ip = '".$category_ip."', category_status = '".$category_status."' WHERE id = '".$id."' ";
				$query2 = mysql_db_query($dbname, $sql2) or die("Can't Query2");
				echo " <script language='javascript'> alert('Record saved successfully'); window.location='../category/'; </script> ";
				}
       } else {
           $sql2 =	"UPDATE admin_category SET category_name = '".$category_name."', category_admin = '".$category_admin."', category_date = '".$category_date."', category_time = '".$category_time."', category_ip = '".$category_ip."', category_status = '".$category_status."' WHERE id = '".$id."' ";
		   $query2 = mysql_db_query($dbname, $sql2) or die("Can't Query2");
		   echo " <script language='javascript'> alert('Record saved successfully'); window.location='../category/'; </script> ";
       }
}

mysql_close();
?>