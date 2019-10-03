<?
if(empty($_POST['ip'])){
	$_POST['ip'] = $_SERVER['REMOTE_ADDR'];
}
require('./phpip2country.class.php');

include('../../connect.php');

$category_name = $_POST["category_name"];
$category_admin = $_POST["category_admin"];
$category_image = $_POST["category_image"];
$category_date = date("m/d/Y");
$category_time = date("H:i:s");
$category_ip = $_POST['ip'];
$category_status = T;

$sql1 =	" SELECT MAX(id) FROM admin_category";
$query1 = mysql_db_query($dbname, $sql1) or die("Can't Query1");
$row1 = mysql_fetch_array($query1);
$id = $row1[0] + 1 ;

// File upload path
// $targetDir = "../../images/category/";
// $fileName = basename($_FILES["category_image"]["tmp_name"]);
// $targetFilePath = $targetDir . $fileName;
// $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

// if (count($_FILES) > 0) {
//     if (is_uploaded_file($_FILES['category_image']['tmp_name'])) {
//         require_once "connect.php";
//         $category_image = addslashes(file_get_contents($_FILES['category_image']['tmp_name']));
// //        $imageProperties = getimageSize($_FILES['category_image']['tmp_name']);
//
				$sql2 = " INSERT INTO admin_category (id, category_name, category_admin, category_image, category_date, category_time, category_ip, category_status) VALUES ('".$id."', '".$category_name."', '".$category_admin."', '".$category_image."', '".$category_date."', '".$category_time."', '".$category_ip."', '".$category_status."') ";
				$query2 = mysql_query($sql2) or die("Can't Query2");

				if($query2) {

					echo " <script language='javascript'> window.location='../category/'; </script> ";

				}
    // }
// }

mysql_close();
?>
