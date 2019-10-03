<?
if(empty($_POST['ip'])){
	$_POST['ip'] = $_SERVER['REMOTE_ADDR'];
}
require('./phpip2country.class.php');

include('../../connect.php');

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

$sql1 =	" SELECT MAX(id) FROM admin_fabrics_lining";
$query1 = mysql_db_query($dbname, $sql1) or die("Can't Query1");
$row1 = mysql_fetch_array($query1);
$id = $row1[0] + 1 ;

$path = "../../images/tie/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['tie_image']['name'];
	$tmp = $_FILES['tie_image']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$tie_image_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$tie_image_pic)){
				$sql2 =	" INSERT INTO admin_fabrics_ties (id, fabricno, color, pattern, design, width, length, image, fabrics_admin, fabrics_date, fabrics_time, fabrics_ip, fabrics_status) VALUES ('".$id."', '".$tie_number."', '".$tie_color."', '".$tie_pattern."', '".$tie_design."', '".$tie_width."', '".$tie_length."', '".$tie_image_pic."', '".$tie_admin."', '".$tie_date."', '".$tie_time."', '".$tie_ip."', '".$tie_status."') ";
				$query2 = mysql_db_query($dbname, $sql2) or die("Can't Query2");
				echo " <script language='javascript'> window.location='../tie/view.php'; </script> ";
				}
       } else {
           $sql2 =	" INSERT INTO admin_fabrics_ties (id, fabricno, color, pattern, design, width, length, image, fabrics_admin, fabrics_date, fabrics_time, fabrics_ip, fabrics_status) VALUES ('".$id."', '".$tie_number."', '".$tie_color."', '".$tie_pattern."', '".$tie_design."', '".$tie_width."', '".$tie_length."', '".$tie_image."', '".$tie_admin."', '".$tie_date."', '".$tie_time."', '".$tie_ip."', '".$tie_status."') ";
		   $query2 = mysql_db_query($dbname, $sql2) or die("Can't Query2");
		   echo " <script language='javascript'> window.location='../tie/view.php'; </script> ";
       }
}

mysql_close();
?>
