<?
if(empty($_POST['ip'])){
	$_POST['ip'] = $_SERVER['REMOTE_ADDR'];
}
require('./phpip2country.class.php');

include('../../connect.php');

$option_category = $_POST["option_category"];
$option_name = $_POST["option_name"];
$sub_option_name = $_POST["sub_option_name"];
$option_image = $_POST["option_image"];
$option_admin = $_POST["option_admin"];
$option_date = date("m/d/Y");
$option_time = date("H:i:s");
$option_ip = $_POST['ip'];
$option_status = T;

$sql1 =	" SELECT MAX(id) FROM admin_option";
$query1 = mysql_db_query($dbname, $sql1) or die("Can't Query1");
$row1 = mysql_fetch_array($query1);
$id = $row1[0] + 1 ;

$path = "../../images/options/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['option_image']['name'];
	$tmp = $_FILES['option_image']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$option_image_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$option_image_pic)){
				$sql2 =	" INSERT INTO admin_option ('id', 'option_category', 'option_name', 'sub_option_name', 'option_image', 'option_admin', 'option_date', 'option_time', 'option_ip', 'option_status') VALUES ('".$id."', '".$option_name."', '".$sub_option_name."', '".$option_image."', '".$option_admin."', '".$option_date."', '".$option_time."', '".$option_ip."', '".$option_status."') ";
				$query2 = mysql_db_query($dbname, $sql2) or die("Can't Query2");
				echo " <script language='javascript'> window.location='../extra/viewextraadded.php'; </script> ";
				}
       } else {
         $sql2 =	" INSERT INTO admin_option ('id', 'option_category', 'option_name', 'sub_option_name', 'option_image', 'option_admin', 'option_date', 'option_time', 'option_ip', 'option_status') VALUES ('".$id."', '".$option_name."', '".$sub_option_name."', '".$option_image."', '".$option_admin."', '".$option_date."', '".$option_time."', '".$option_ip."', '".$option_status."') ";
		   $query2 = mysql_db_query($dbname, $sql2) or die("Can't Query2");
		   echo " <script language='javascript'> window.location='../extra/viewextraadded.php'; </script> ";
       }
}

mysql_close();
?>
