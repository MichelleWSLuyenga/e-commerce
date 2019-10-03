<?
if(empty($_POST['ip'])){
	$_POST['ip'] = $_SERVER['REMOTE_ADDR'];
}
require('./phpip2country.class.php');

include('../../connect.php');

$id = $_POST["id"];
$tie_number = $_POST["tie_number"];
$tie_color = $_POST["tie_color"];
$tie_pattern = $_POST["tie_pattern"];
$tie_design = $_POST["tie_design"];
$tie_width = $_POST["tie_width"];
$tie_length = $_POST["tie_length"];
$tie_image = $_POST["tie_image"];
$tie_admin = $_POST["tie_admin"];
$tie_date = date("m/d/Y");
$tie_time = date("H:i:s");
$tie_ip = $_POST['ip'];
$tie_status = T;

$path = "../../images/ties/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['tie_image']['name'];
	$tmp = $_FILES['tie_image']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$tie_image_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$tie_image_pic)){
				$sql2 =	" UPDATE admin_fabrics_ties SET fabricno = '".$tie_number."', color = '".$tie_color."', pattern = '".$tie_pattern."', design = '".$tie_design."', width = '".$tie_width."', length = '".$tie_length."', image = '".$tie_image_pic."', fabrics_admin = '".$tie_admin."', fabrics_date = '".$tie_date."', fabrics_time = '".$tie_time."', fabrics_ip = '".$tie_ip."', fabrics_status = '".$tie_status."' WHERE id = '".$id."' ";
				$query2 = mysql_db_query($dbname, $sql2) or die("Can't Query2");
				echo " <script language='javascript'> window.location='../tie/view.php'; </script> ";
				}
       } else {
           $sql2 =	" UPDATE admin_fabrics_ties SET fabricno = '".$tie_number."', color = '".$tie_color."', pattern = '".$tie_pattern."', design = '".$tie_design."', width = '".$tie_width."', length = '".$tie_length."', fabrics_admin = '".$tie_admin."', fabrics_date = '".$tie_date."', fabrics_time = '".$tie_time."', fabrics_ip = '".$tie_ip."', fabrics_status = '".$tie_status."' WHERE id = '".$id."' ";
		   $query2 = mysql_db_query($dbname, $sql2) or die("Can't Query2");
		   echo " <script language='javascript'> window.location='../tie/view.php'; </script> ";
       }
}

mysql_close();
?>